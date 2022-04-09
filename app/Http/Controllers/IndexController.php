<?php

namespace App\Http\Controllers;

use App\Models\Blog;
use App\Models\Category;
use Inertia\Inertia;

class IndexController extends Controller
{
    public $data;

    public function __construct()
    {
        $blogs = Blog::query()
            ->orderBy('created_at', 'desc')
            ->with(['user', 'category'])
            ->get();

        $blogs_data = $blogs
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
        $blog
            ->load(['user', 'category'])
            ->append(['thumbnail_url', 'formatted_date']);

        return Inertia::render('Show', $this->data->put('blog', $blog->toArray())->toArray());
    }

    public function category(Category $category)
    {
        $blogs = $category
            ->blogs()
            ->orderBy('created_at', 'desc')
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
                ];
            });

        return Inertia::render('Category', $this->data->put('blogs', $blogs->toArray())->put('category', $category)->toArray());
    }

    public function search(string $searchQuery)
    {
        $blogs = Blog::query()
            ->orderBy('created_at', 'desc')
            ->where('title', 'like', "%$searchQuery%")
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
                ];
            });

        return Inertia::render('Search', $this->data->put('blogs', $blogs->toArray())->put('searchQuery', $searchQuery)->toArray());
    }
}
