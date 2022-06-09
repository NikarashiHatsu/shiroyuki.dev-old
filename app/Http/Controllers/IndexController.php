<?php

namespace App\Http\Controllers;

use App\Models\Blog;
use App\Models\Category;
use App\Models\View;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\RateLimiter;

class IndexController extends Controller
{
    public function index()
    {
        $blogs = Blog::query()
            ->orderBy('created_at', 'desc')
            ->with(['user', 'category'])
            ->withCount('views')
            ->get();

        return view('blog.index', [
            'blogs' => $blogs,
        ]);
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

        return view('blog.show', [
            'blog' => $blog
                ->load(['user', 'category'])
                ->loadCount('views')
        ]);
    }

    public function category(Category $category)
    {
        return view('blog.category', [
            'category' => $category,
            'blogs' => $category
                ->blogs()
                ->orderBy('created_at', 'desc')
                ->withCount('views')
                ->with('user')
                ->get(),
        ]);
    }

    public function search(Request $request)
    {
        $request->validate([
            'search' => ['string'],
        ]);

        $search_query = $request->search;

        return view('blog.search', [
            'search_query' => $search_query,
            'blogs' => Blog::query()
                ->orderBy('created_at', 'desc')
                ->where('title', 'like', "%$search_query%")
                ->withCount('views')
                ->with(['user', 'category'])
                ->get(),
        ]);
    }
}
