<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreBlogRequest;
use App\Http\Requests\UpdateBlogRequest;
use App\Models\Blog;
use App\Models\Category;
use Inertia\Inertia;

class BlogController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $blogs = Blog::query()
            ->with('user')
            ->withCount('comments')
            ->get();

        return Inertia::render('Blog/Index', [
            'blogs' => $blogs->append('thumbnail_url'),
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return Inertia::render('Blog/Create', [
            'categories' => Category::all(),
        ]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \App\Http\Requests\StoreBlogRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreBlogRequest $request)
    {
        try {
            $blog = Blog::create($request->validated());

            if ($request->hasFile('thumbnail')) {
                $blog->thumbnail = $request->file('thumbnail')->store('', config('filesystems.default'));
                $blog->update();
            }
        } catch (\Throwable $th) {
            return redirect()->back()->with([
                'alertType' => 'error',
                'alertMessage' => 'Terjadi kesalahan: ' . $th->getMessage(),
            ]);
        }

        return redirect()->back()->with([
            'alertType' => 'success',
            'alertMessage' => 'Berhasil menambah blog.',
        ]);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Blog  $blog
     * @return \Illuminate\Http\Response
     */
    public function show(Blog $blog)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Blog  $blog
     * @return \Illuminate\Http\Response
     */
    public function edit(Blog $blog)
    {
        return Inertia::render('Blog/Edit', [
            'blog' => $blog->append('thumbnail_url'),
            'categories' => Category::all(),
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\UpdateBlogRequest  $request
     * @param  \App\Models\Blog  $blog
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateBlogRequest $request, Blog $blog)
    {
        try {
            $blog->update($request->only([
                'title',
                'description',
                'category_id',
            ]));

            if ($request->hasFile('thumbnail')) {
                $blog->thumbnail = $request->file('thumbnail')->store('', config('filesystems.default'));
                $blog->update();
            }
        } catch (\Throwable $th) {
            return redirect()->back()->with([
                'alertType' => 'error',
                'alertMessage' => 'Terjadi kesalahan: ' . $th->getMessage(),
            ]);
        }

        return redirect()->back()->with([
            'alertType' => 'success',
            'alertMessage' => 'Berhasil memperbarui blog.',
        ]);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Blog  $blog
     * @return \Illuminate\Http\Response
     */
    public function destroy(Blog $blog)
    {
        try {
            $blog->delete();
        } catch (\Throwable $th) {
            return redirect()->back()->with([
                'alertType' => 'error',
                'alertMessage' => 'Terjadi kesalahan: ' . $th->getMessage(),
            ]);
        }

        return redirect()->back()->with([
            'alertType' => 'success',
            'alertMessage' => 'Berhasil menghapus blog.',
        ]);
    }
}
