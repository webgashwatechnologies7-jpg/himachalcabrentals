<?php

namespace App\View\Components\Site\Home;

use App\Models\Cab;
use Illuminate\View\Component;

class Cabs extends Component
{
    public $show = false;
    public $section;

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
            $data = $model->select('id', 'title', 'seats', 'fuel_type', 'ac_type', 'image', 'rent_per_day', 'image_alt_title')->where('is_active', Cab::IS_ACTIVE_YES)->limit(3)->get();
            $this->show = $data ? true : false;
            return view('components.site.home.v2.cabs', compact('data', 'section'));
        }

    }
}
