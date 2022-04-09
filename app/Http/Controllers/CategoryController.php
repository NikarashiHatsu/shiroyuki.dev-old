<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreCategoryRequest;
use App\Http\Requests\UpdateCategoryRequest;
use App\Models\Category;
use Inertia\Inertia;

class CategoryController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return Inertia::render('Category/Index', [
            'categories' => Category::withCount('blogs')->get(),
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return Inertia::render('Category/Create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \App\Http\Requests\StoreCategoryRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreCategoryRequest $request)
    {
        $data = $request->validated();

        try {
            Category::create($data);
        } catch (\Throwable $th) {
            return redirect()->back()->with([
                'alertType' => 'error',
                'alertMessage' => 'Terjadi kesalahan: ' . $th->getMessage(),
            ]);
        }

        return redirect()->back()->with([
            'alertType' => 'success',
            'alertMessage' => 'Berhasil menambah kategori.',
        ]);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Category  $category
     * @return \Illuminate\Http\Response
     */
    public function show(Category $category)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Category  $category
     * @return \Illuminate\Http\Response
     */
    public function edit(Category $category)
    {
        return Inertia::render('Category/Edit', [
            'category' => $category,
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\UpdateCategoryRequest  $request
     * @param  \App\Models\Category  $category
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateCategoryRequest $request, Category $category)
    {
        $data = $request->validated();

        try {
            $category->update($data);
        } catch (\Throwable $th) {
            return redirect()->back()->with([
                'alertType' => 'error',
                'alertMessage' => 'Terjadi kesalahan: ' . $th->getMessage(),
            ]);
        }

        return redirect()->back()->with([
            'alertType' => 'success',
            'alertMessage' => 'Berhasil memperbarui kategori.',
        ]);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Category  $category
     * @return \Illuminate\Http\Response
     */
    public function destroy(Category $category)
    {
        try {
            $category->delete();
        } catch (\Throwable $th) {
            return redirect()->back()->with([
                'alertType' => 'error',
                'alertMessage' => 'Terjadi kesalahan: ' . $th->getMessage(),
            ]);
        }

        return redirect()->back()->with([
            'alertType' => 'success',
            'alertMessage' => 'Berhasil menghapus kategori.',
        ]);
    }
}
