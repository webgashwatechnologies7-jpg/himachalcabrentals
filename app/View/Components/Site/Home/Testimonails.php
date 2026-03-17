<?php

namespace App\View\Components\Site\Home;

use App\Models\Testimonail;
use Illuminate\View\Component;

class Testimonails extends Component
{
    public $section;
    public $show = false;

    /**
     * Create a new component instance.
     *
     * @return void
     */
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
        if ($model) {
            $data = $model->select("name", "location", "review", "image")->where('is_active', Testimonail::IS_ACTIVE_YES)->limit(3)->get();
            $this->show = $data ? true : false;
            return view('components.site.home.v2.testimonails', compact('data', 'section'));
        }
    }
}
