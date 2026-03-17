<?php

namespace App\Widgets;

use App\Models\TourPackage;
use Illuminate\Support\Facades\Auth;
use TCG\Voyager\Facades\Voyager;
use TCG\Voyager\Widgets\BaseDimmer;

class PackageDimmer extends BaseDimmer
{
    /**
     * The configuration array.
     *
     * @var array
     */
    protected $config = [];

    /**
     * Treat this method as a controller action.
     * Return view() or other content to display.
     */
    public function run()
    {
        $count = TourPackage::query()->where('is_active', TourPackage::IS_ACTIVE_YES)->count();
        $string = trans_choice('Tour Packages', $count);

        return view('voyager::dimmer', array_merge($this->config, [
            'icon' => 'voyager-ship',
            'title' => "{$string}",
            'text' => "{$count}",
            'button' => [
                'text' => __('voyager::dimmer.page_link_text'),
                'link' => route('voyager.tour-packages.index'),
            ],
            'image' => voyager_asset('images/widget-backgrounds/03.jpg'),
        ]));
    }

    /**
     * Determine if the widget should be displayed.
     *
     * @return bool
     */
    public function shouldBeDisplayed()
    {
        return Auth::user()->can('browse', app('App\Models\TourPackage'));
    }
}
