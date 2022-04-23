<?php

namespace App\Http\Controllers;

use App\Models\Blog;
use App\Models\Category;
use App\Models\View;
use Illuminate\Support\Facades\RateLimiter;
use Inertia\Inertia;

class IndexController extends Controller
{
    public $data;

    public function __construct()
    {
        $blogs = Blog::query()
            ->orderBy('created_at', 'desc')
            ->with(['user', 'category'])
            ->withCount('views')
            ->get();

        $blogs_data = $blogs
            ->append(['thumbnail_url', 'formatted_date'])
            ->map(function($blog) {
                return [
                    'id' => $blog->id,
                    'slug' => $blog->slug,
                    'user' => $blog->user,
                    'title' => $blog->title,
                    'views_count' => $blog->views_count,
                    'category' => $blog->category->name,
                    'formattedDate' => $blog->formatted_date,
                    'thumbnail_url' => $blog->thumbnail_url,
                    'description' => $blog->description,
                ];
            });

        $data = collect([
            'blogs' => $blogs_data,
            'latestBlogs' => $blogs_data->take(5),
            'categories' => Category::query()
                ->with('blogs')
                ->withCount('blogs')
                ->get(),
        ]);

        $this->data = $data;
    }

    public function index()
    {
        return Inertia::render('Welcome', $this->data->toArray());
    }

    public function show(Blog $blog)
    {
        RateLimiter::attempt(
            'blog.view.' . $blog->id . '.ip:' . request()->ip(),
            $perMinute = 1,
            function() use($blog) {
                View::create([
                    'user_id' => auth()->user()->id ?? null,
                    'blog_id' => $blog->id,
                ]);
            },
            60 * 10 // 10 minutes per 1 view
        );

        $blog
            ->load(['user', 'category'])
            ->loadCount('views')
            ->append(['thumbnail_url', 'formatted_date']);

        return Inertia::render('Show', $this->data->put('blog', $blog->toArray())->toArray());
    }

    public function category(Category $category)
    {
        $blogs = $category
            ->blogs()
            ->orderBy('created_at', 'desc')
            ->withCount('views')
            ->with('user')
            ->get()
            ->append(['thumbnail_url', 'formatted_date'])
            ->map(function($blog) {
                return [
                    'id' => $blog->id,
                    'slug' => $blog->slug,
                    'user' => $blog->user,
                    'title' => $blog->title,
                    'category' => $blog->category->name,
                    'formattedDate' => $blog->formatted_date,
                    'thumbnail_url' => $blog->thumbnail_url,
                    'description' => $blog->description,
                    'views_count' => $blog->views_count,
                ];
            });

        return Inertia::render('Category', $this->data->put('blogs', $blogs->toArray())->put('category', $category)->toArray());
    }

    public function search(string $searchQuery)
    {
        $blogs = Blog::query()
            ->orderBy('created_at', 'desc')
            ->where('title', 'like', "%$searchQuery%")
            ->withCount('views')
            ->with(['user', 'category'])
            ->get()
            ->append(['thumbnail_url', 'formatted_date'])
            ->map(function($blog) {
                return [
                    'id' => $blog->id,
                    'slug' => $blog->slug,
                    'user' => $blog->user,
                    'title' => $blog->title,
                    'category' => $blog->category->name,
                    'formattedDate' => $blog->formatted_date,
                    'thumbnail_url' => $blog->thumbnail_url,
                    'description' => $blog->description,
                    'views_count' => $blog->views_count,
                ];
            });

        return Inertia::render('Search', $this->data->put('blogs', $blogs->toArray())->put('searchQuery', $searchQuery)->toArray());
    }
}
