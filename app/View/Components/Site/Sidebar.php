<?php

namespace App\View\Components\Site;

use Illuminate\View\Component;
use TCG\Voyager\Models\Category;
use TCG\Voyager\Models\Post;

class Sidebar extends Component
{
    public $exclude;

    /**
     * Create a new component instance.
     *
     * @return void
     */
    public function __construct($exclude)
    {
        $this->exclude = $exclude;
    }

    /**
     * Get the view / contents that represent the component.
     *
     * @return \Illuminate\Contracts\View\View|\Closure|string
     */
    public function render()
    {
        $posts = Post::query()->where('status', Post::PUBLISHED)
            ->whereNot('id', $this->exclude)->latest()->limit(3)->get();
        $categories = Category::query()->select('name', 'slug')->get();
        return view('components.site.sidebar', compact('posts', 'categories'));
    }
}
