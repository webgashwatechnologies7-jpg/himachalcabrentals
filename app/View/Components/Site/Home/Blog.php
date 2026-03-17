<?php

namespace App\View\Components\Site\Home;

use App\Models\Section;
use Illuminate\View\Component;
use TCG\Voyager\Models\Post;

class Blog extends Component
{
    /**
     * Create a new component instance.
     *
     * @return void
     */
    public $show = false;
    public $section;

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
            $data = $model->select('title', 'image', 'alt_title', 'category_id', 'slug', 'excerpt')->with('category:id,name')->where('status', Post::PUBLISHED)->where('featured', 1)->limit(3)->get();
            $this->show = $data ? true : false;
            return view('components.site.home.v2.blog', compact('data', 'section'));
        }
    }
}
