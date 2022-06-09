<?php

namespace App\View\Components;

use App\Models\Blog;
use App\Models\Category;
use Illuminate\View\Component;

class GuestLayout extends Component
{
    /**
     * Get the view / contents that represents the component.
     *
     * @return \Illuminate\View\View
     */
    public function render()
    {
        return view('layouts.guest', [
            'latest_blogs' => Blog::query()
                ->withCount(['views', 'likes'])
                ->orderByDesc('created_at')
                ->get()
                ->take(5),
            'categories' => Category::query()
                ->with('blogs')
                ->withCount('blogs')
                ->get(),
        ]);
    }
}
