<?php

namespace App\View\Components\Site\Home;

use Illuminate\View\Component;

class Slider extends Component
{
    /**
     * Create a new component instance.
     *
     * @return void
     */
    public function __construct()
    {
        //
    }

    /**
     * Get the view / contents that represent the component.
     *
     * @return \Illuminate\Contracts\View\View|\Closure|string
     */
    public function render()
    {
//        $sliders = \App\Models\Slider::query()->whereNot('order', 0)
//            ->orderBy('order', 'asc')
//            ->get();
        $slider = \App\Models\Slider::query()->select('image', 'title', 'headLine', 'tagLine', 'buttonText', 'buttonLink')
            ->where('order', 1)->first();
        //return view('components.site.home.slider', compact('sliders'));
        if ($slider) {
            return view('components.site.home.v2.slider', compact('slider'));
        }
    }
}
