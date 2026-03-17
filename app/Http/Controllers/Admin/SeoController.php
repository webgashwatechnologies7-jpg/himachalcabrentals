<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Carbon;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Str;
use Psr\Http\Message\UriInterface;
use Spatie\Sitemap\SitemapGenerator;
use Spatie\Sitemap\Tags\Url;
use TCG\Voyager\Models\DataType;
use TCG\Voyager\Models\Setting;

class SeoController extends Controller
{
    public function index($slug)
    {
        $dataType = DataType::query()->where('slug', $slug)->first();
        if (!$dataType) {
            abort(404);
        }
        return view('admin.seo.index', compact('dataType'));
    }

    public function browse(Request $request, $slug)
    {
        $dataType = DataType::query()->where('slug', $slug)->first();
        if (!$dataType) {
            abort(404);
        }
        $model = app($dataType->model_name);
        $columns = [
            0 => 'title',
            1 => 'seo_title'
        ];
        $titleWhere = 'title';
        if ($dataType->model_name == 'TCG\Voyager\Models\Category') {
            $columns[0] = 'name';
            $titleWhere = 'name';
        }

        $totalData = $model::count();
        $totalFiltered = $totalData;
        $limit = $request->input('length');
        $start = $request->input('start');
        $order = $columns[$request->input('order.0.column')];
        $dir = $request->input('order.0.dir');
        if (empty($request->input('search.value'))) {
            $posts = $model::offset($start)
                ->limit($limit)
                ->orderBy($order, $dir)
                ->get();
        } else {
            $search = $request->input('search.value');

            $posts = $model::where('id', 'LIKE', "%{$search}%")
                ->orWhere('seo_title', 'LIKE', "%{$search}%")
                ->orWhere('slug', 'LIKE', "%{$search}%")
                ->orWhere($titleWhere, 'LIKE', "%{$search}%")
                ->offset($start)
                ->limit($limit)
                ->orderBy($order, $dir)
                ->get();

            $totalFiltered = $model::where('id', 'LIKE', "%{$search}%")
                ->orWhere('seo_title', 'LIKE', "%{$search}%")
                ->orWhere('slug', 'LIKE', "%{$search}%")
                ->orWhere($titleWhere, 'LIKE', "%{$search}%")
                ->count();
        }
        $data = [];
        if (!empty($posts)) {
            foreach ($posts as $post) {
                $edit = route('seo.slug.edit', ['slug' => $slug, 'id' => $post->id]);

                $nestedData['title'] = $post->name ? $post->name : $post->title;
                $nestedData['seo_title'] = $post->seo_title;
                $nestedData['slug'] = $post->slug;
                $nestedData['options'] = "<a href='{$edit}' class='btn btn-sm btn-primary edit' title='Edit'><i class='voyager-edit'></i><span class='hidden-xs hidden-sm'>Edit</span></a>";
                $data[] = $nestedData;

            }
        }

        $json_data = [
            "draw" => intval($request->input('draw')),
            "recordsTotal" => intval($totalData),
            "recordsFiltered" => intval($totalFiltered),
            "data" => $data
        ];

        echo json_encode($json_data);

    }

    public function edit($slug, $id)
    {
        $dataType = DataType::query()->where('slug', $slug)->first();
        if (!$dataType) {
            abort(404);
        }
        $model = app($dataType->model_name);
        $data = $model->find($id);
        if (!$data) {
            abort(404);
        }
        return view('admin.seo.edit', compact('data', 'dataType'));
    }

    public function update(Request $request, $slug, $id)
    {
        $dataType = DataType::query()->where('slug', $slug)->first();
        if (!$dataType) {
            abort(404);
        }
        $model = app($dataType->model_name);
        $data = $model->find($id);
        if (!$data) {
            abort(404);
        }
        $data->seo_title = $request->has('seo_title') ? $request->get('seo_title') : $data->seo_title;
        $data->meta_description = $request->has('meta_description') ? $request->get('meta_description') : $data->meta_description;
        $data->meta_keywords = $request->has('meta_keywords') ? $request->get('meta_keywords') : $data->meta_keywords;
        $data->alt_title = $request->has('alt_title') ? $request->get('alt_title') : $data->alt_title;
        $data->slug = $request->has('slug') ? $request->get('slug') : $data->slug;
        if ($data->save()) {
            $redirect = redirect()->route('seo.slug.browse', ['slug' => $slug]);
            return $redirect->with([
                'message' => __('voyager::generic.successfully_updated') . " {$dataType->getTranslatedAttribute('display_name_singular')}",
                'alert-type' => 'success',
            ]);
        }
        abort(500);
    }

    public function viewRobots()
    {
        $content = File::get(base_path('robots.txt'));
        return view('admin.seo.robots', compact('content'));
    }

    public function updateRobots(Request $request)
    {
        if ($request->has('content')) {
            File::put(base_path('robots.txt'), $request->get('content'));
            $redirect = redirect()->route('robots.view');
            return $redirect->with([
                'message' => 'Contents updated successfully',
                'alert-type' => 'success',
            ]);
        }
        abort(500);
    }

    public function socialMediaIndex()
    {
        $mediaList = Setting::query()->where('key', 'like', 'social-media.%')
            ->orderBy('order', 'asc')->get();
        return view('admin.seo.social', compact('mediaList'));
    }

    public function socialMediaUpdate(Request $request)
    {
        $data = $request->except('_token');
        $message = 'Data updated successfully';
        $alert = 'success';
        if (count($data) > 0) {
            DB::beginTransaction();
            try {
                foreach ($data as $key => $value) {
                    if (Str::endsWith($key, '_option')) {
                        $optionKey = Str::before($key, '_option');
                        $setting = Setting::query()->find($optionKey);
                        if ($setting) {
                            $setting->details = json_encode(['nofollow' => $value]);
                            $setting->save();
                        }
                    } else {
                        $setting = Setting::query()->find($key);
                        if ($setting) {
                            $setting->value = $value;
                            $setting->save();
                        }
                    }
                }
                DB::commit();
            } catch (\Exception $exception) {
                DB::rollBack();
                $message = 'Error updating data';
                $alert = 'error';
            }
        }
        $redirect = redirect()->route('social.index');
        return $redirect->with([
            'message' => $message,
            'alert-type' => $alert,
        ]);
    }

    public function siteMapIndex()
    {
        $map = collect([]);
        if (file_exists(base_path('sitemap.xml'))) {
            $xmlFile = file_get_contents(base_path('sitemap.xml'));
            $xmlObject = simplexml_load_string($xmlFile);
            $jsonFormatData = json_encode($xmlObject);
            $result = json_decode($jsonFormatData, true);
            $map = $result['url'];
        }
        return view('admin.seo.sitemap', compact('map'));
    }

    public function generateSiteMap()
    {
        // modify this to your own needs
        $url = explode('/', config('app.url'));
        array_pop($url);
        $appurl = implode('/', $url);
        SitemapGenerator::create($appurl)->shouldCrawl(function (UriInterface $uri) {
            if (is_null($uri->getPath()) || empty($uri->getPath())) {
                return false;
            }
            return strpos($uri->getPath(), 'booking') === false;
        })->hasCrawled(function (Url $url) {
            $parse = parse_url($url->url, PHP_URL_QUERY);
            parse_str($parse, $output);
            $key = key($output);
            if ($key == 'page') {
                return;
            }
            if ($url->segments(1) == "") {
                $url->setPriority(1);
            }
            $url->setLastModificationDate(Carbon::now());
            return $url;
        })
            ->writeToFile(base_path('sitemap.xml'));

        $redirect = redirect()->route('sitemap.index');
        return $redirect->with([
            'message' => 'Sitemap updated',
            'alert-type' => 'success',
        ]);

    }

    public function removeSiteMap()
    {
        $data = [
            'message' => 'Sitemap removed',
            'alert-type' => 'success',
        ];
        $sitemapFilePath = base_path('sitemap.xml');
        if (File::exists($sitemapFilePath)) {
            $delete = File::delete($sitemapFilePath);
            if (!$delete) {
                $data['message'] = 'Error removing sitemap';
                $data['alert-type'] = 'error';
            }
        } else {
            $data['message'] = 'Unable to find sitemap';
            $data['alert-type'] = 'info';
        }
        $redirect = redirect()->route('sitemap.index');
        return $redirect->with($data);
    }
}
