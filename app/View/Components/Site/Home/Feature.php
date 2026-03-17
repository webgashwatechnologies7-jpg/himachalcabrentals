<?php

namespace App\View\Components\Site\Home;

use App\Models\Section;
use Illuminate\View\Component;

class Feature extends Component
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
        if ($section != null) {
            $model = app($this->section->model);
        } else {
            $model = new \App\Models\Feature();
        }
        if ($model) {
            $data = $model->select('icon', 'title', 'tagLine', 'link')->where('is_active', \App\Models\Feature::IS_ACTIVE_YES)->limit(4)->get();
            $this->show = $data ? true : false;
            return view('components.site.home.v2.feature', compact('data', 'section'));
        }
    }
}
