<?php

namespace App\View\Components\Site\Home;

use App\Models\Section;
use Illuminate\View\Component;

class Destination extends Component
{
    /**
     * Create a new component instance.
     *
     * @return void
     */
    public $section;
    public $show = false;

    public function __construct($section)
    {
        $this->section = $section;
    }

    /**
     * Get the view / contents that represent the component.
     *
     * @return \Illuminate\Contracts\View\View|\Closure|string
     */
    public function render()
    {
        $section = $this->section;
        $model = app($this->section->model);
        if ($section && $model) {
            $data = $model->withCount('tourPackages')->where('is_active', \App\Models\Destination::IS_ACTIVE_YES)->limit(6)->get();
            $this->show = $data ? true : false;
            return view('components.site.home.v2.destination', compact('data', 'section'));
        }
    }
}
