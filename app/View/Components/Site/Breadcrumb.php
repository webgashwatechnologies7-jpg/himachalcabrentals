<?php

namespace App\View\Components\Site;

use Illuminate\View\Component;

class Breadcrumb extends Component
{
    public $middle;
    public $title;
    public $subTitle;
    public $subUrl;

    /**
     * Create a new component instance.
     *
     * @return void
     */
    public function __construct($middle = false, $title = 'Title', $subTitle = '', $subUrl = '')
    {
        $this->middle = $middle;
        $this->title = $title;
        $this->subTitle = $subTitle;
        $this->subUrl = $subUrl;
    }

    /**
     * Get the view / contents that represent the component.
     *
     * @return \Illuminate\Contracts\View\View|\Closure|string
     */
    public function render()
    {
        return view('components.site.breadcrumb');
    }
}
