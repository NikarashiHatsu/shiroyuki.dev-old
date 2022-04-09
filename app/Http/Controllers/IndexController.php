<?php

namespace App\Http\Controllers;

use App\Models\Blog;
use App\Models\Category;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use Inertia\Inertia;

class IndexController extends Controller
{
    public function index()
    {
        $blogs = Blog::query()
            ->with(['user', 'category'])
            ->get();
        $blogs_data = $blogs
            ->append('thumbnail_url')
            ->map(function($blog) {
                return [
                    'id' => $blog->id,
                    'slug' => $blog->slug,
                    'user' => $blog->user,
                    'title' => $blog->title,
                    'category' => $blog->category->name,
                    'formattedDate' => $blog->created_at->isoFormat('LL'),
                    'thumbnail_url' => $blog->thumbnail_url,
                    'description' => $blog->description,
                ];
            });

        return Inertia::render('Welcome', [
            'canLogin' => Route::has('login'),
            'canRegister' => Route::has('register'),
            'categories' => Category::withCount('blogs')->get(),
            'blogs' => $blogs_data,
            'latestBlogs' => $blogs_data->take(5),
        ]);
    }
}
