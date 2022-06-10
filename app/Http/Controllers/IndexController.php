<?php

namespace App\Http\Controllers;

use App\Enums\BlogEnums;
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
            ->where('status', BlogEnums::PUBLISHED->name)
            ->orderBy('created_at', 'desc')
            ->with(['user', 'category'])
            ->withCount(['views', 'likes', 'comments' => function($query) {
                $query->where('is_approved', true);
            }])
            ->paginate(12);

        return view('blog.index', [
            'blogs' => $blogs,
        ]);
    }

    public function show(Blog $blog)
    {
        abort_if(
            $blog->status === BlogEnums::DRAFT->name ||
            $blog->status === BlogEnums::ARCHIVED->name, 404);

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
                ->loadCount(['views', 'comments' => function($query) {
                    $query->where('is_approved', true);
                }])
        ]);
    }

    public function category(Category $category)
    {
        return view('blog.category', [
            'category' => $category,
            'blogs' => $category
                ->blogs()
                ->where('status', BlogEnums::PUBLISHED->name)
                ->orderBy('created_at', 'desc')
                ->withCount(['views', 'likes'])
                ->with('user')
                ->paginate(12),
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
                ->where('status', BlogEnums::PUBLISHED->name)
                ->withCount(['views', 'likes'])
                ->with(['user', 'category'])
                ->paginate(12),
        ]);
    }
}
