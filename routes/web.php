<?php

use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', [\App\Http\Controllers\SiteController::class, 'index'])->name('site.home');
Route::get('blog/{slug}', [\App\Http\Controllers\SiteController::class, 'blogPost'])->name('site.blogPost');
Route::get('destination/{slug}', [\App\Http\Controllers\SiteController::class, 'destination'])->name('site.destination');
Route::get('tour-category/{slug}', [\App\Http\Controllers\SiteController::class, 'tourCategory'])->name('site.tourCategory');
Route::get('tour-package/{slug}', [\App\Http\Controllers\SiteController::class, 'tourPackage'])->name('site.tourPackage');

Route::post('submit-query', [\App\Http\Controllers\SiteController::class, 'submitQuery'])->name('site.submit-query');
Route::post('submit-plan', [\App\Http\Controllers\SiteController::class, 'submitPlan'])->name('site.submit-plan');
Route::post('submit-cab', [\App\Http\Controllers\SiteController::class, 'submitCab'])->name('site.submit-cab');
Route::post('submit-package', [\App\Http\Controllers\SiteController::class, 'submitPackage'])->name('site.submit-package');
Route::post('submit-contact', [\App\Http\Controllers\SiteController::class, 'submitContact'])->name('site.submit-contact');
Route::post('submit-call', [\App\Http\Controllers\SiteController::class, 'submitCall'])->name('site.submit-call');
Route::post('submit-news', [\App\Http\Controllers\SiteController::class, 'submitNews'])->name('site.submit-news');

Route::group(['prefix' => 'cms'], function () {
    Voyager::routes();
    Route::middleware(['admin.user'])->group(function () {
        Route::prefix('seo')->group(function () {
            Route::get('/{slug}', [\App\Http\Controllers\Admin\SeoController::class, 'index'])->name('seo.slug');
            Route::post('/{slug}', [\App\Http\Controllers\Admin\SeoController::class, 'browse'])->name('seo.slug.browse');
            Route::get('/{slug}/{id}', [\App\Http\Controllers\Admin\SeoController::class, 'edit'])->name('seo.slug.edit');
            Route::patch('/{slug}/{id}', [\App\Http\Controllers\Admin\SeoController::class, 'update'])->name('seo.slug.update');
        });
        Route::get('static-pages', [\App\Http\Controllers\PageController::class, 'staticPage'])->name('staticPage.index');
        Route::post('static-pages-get', [\App\Http\Controllers\PageController::class, 'staticPageBrowse'])->name('staticPage.browse');
        Route::get('robots', [\App\Http\Controllers\Admin\SeoController::class, 'viewRobots'])->name('robots.view');
        Route::post('update-robots', [\App\Http\Controllers\Admin\SeoController::class, 'updateRobots'])->name('robots.update');
        Route::get('social-media', [\App\Http\Controllers\Admin\SeoController::class, 'socialMediaIndex'])->name('social.index');
        Route::post('social-media-update', [\App\Http\Controllers\Admin\SeoController::class, 'socialMediaUpdate'])->name('social.update');
        Route::get('sitemap', [\App\Http\Controllers\Admin\SeoController::class, 'siteMapIndex'])->name('sitemap.index');
        Route::get('generate-sitemap', [\App\Http\Controllers\Admin\SeoController::class, 'generateSiteMap'])->name('sitemap.generate');
        Route::get('remove-sitemap', [\App\Http\Controllers\Admin\SeoController::class, 'removeSiteMap'])->name('sitemap.remove');
    });
});
Route::get('optimize-images', [\App\Http\Controllers\Admin\ImageController::class, 'index'])->name('images.optimize');
Route::any('{any}', [\App\Http\Controllers\SiteController::class, 'allRoutes'])->where('any', '.*');
