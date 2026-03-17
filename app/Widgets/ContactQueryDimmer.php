<?php

namespace App\Widgets;

use App\Models\Contact;
use App\Models\Enquiry;
use Illuminate\Support\Facades\Auth;
use TCG\Voyager\Widgets\BaseDimmer;

class ContactQueryDimmer extends BaseDimmer
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
        $count = Contact::query()->where('status', Enquiry::STATUS_OPEN)->count();
        $string = trans_choice('Contact Queries', $count);

        return view('voyager::dimmer', array_merge($this->config, [
            'icon' => 'voyager-chat',
            'title' => "{$string}",
            'text' => "{$count}",
            'button' => [
                'text' => __('voyager::dimmer.page_link_text'),
                'link' => route('voyager.contacts.index'),
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
        return Auth::user()->can('browse', app('App\Models\Contact'));
    }
}
