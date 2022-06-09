<?php

namespace App\View\Components;

use App\Models\Blog;
use Illuminate\View\Component;

class Post extends Component
{
    public $blog;

    /**
     * Create a new component instance.
     *
     * @param \App\Models\Blog $blog
     * @return void
     */
    public function __construct(Blog $blog)
    {
        $this->blog = $blog;
    }

    /**
     * Get the view / contents that represent the component.
     *
     * @return \Illuminate\Contracts\View\View|\Closure|string
     */
    public function render()
    {
        return view('components.post');
    }
}
