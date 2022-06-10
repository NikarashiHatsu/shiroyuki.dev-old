<?php

namespace App\View\Components;

use App\Enums\BlogEnums;
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
                ->where('status', BlogEnums::PUBLISHED->name)
                ->withCount(['views', 'likes'])
                ->orderByDesc('created_at')
                ->get()
                ->take(5),
            'categories' => Category::query()
                ->with(['blogs' => function($query) {
                    $query->where('status', BlogEnums::PUBLISHED->name);
                }])
                ->withCount(['blogs' => function($query) {
                    $query->where('status', BlogEnums::PUBLISHED->name);
                }])
                ->get(),
        ]);
    }
}
