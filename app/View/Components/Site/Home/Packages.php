<?php

namespace App\View\Components\Site\Home;

use App\Models\Section;
use App\Models\TourPackage;
use Illuminate\View\Component;

class Packages extends Component
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
            $data = $model->select("id", "title", "slug", "description", "nights", "days", "base_price", "discount", "price_type", "image", "alt_title")->where('is_active', TourPackage::IS_ACTIVE_YES)->where('is_featured', TourPackage::IS_ACTIVE_YES)->limit(6)->get();
            $this->show = $data ? true : false;
            return view('components.site.home.v2.packages', compact('data', 'section'));
        }
    }
}
