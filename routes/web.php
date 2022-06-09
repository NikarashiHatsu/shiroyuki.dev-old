<?php

use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', [\App\Http\Controllers\IndexController::class, 'index'])->name('index');
Route::get('/blog/{blog:slug}', [\App\Http\Controllers\IndexController::class, 'show'])->name('show');
Route::get('/category/{category:name}', [\App\Http\Controllers\IndexController::class, 'category'])->name('category');
Route::get('/search', [\App\Http\Controllers\IndexController::class, 'search'])->name('search');

Route::prefix('dashboard')
    ->as('dashboard.')
    ->middleware(['auth', 'verified'])
    ->group(function() {
        Route::view('/', 'dashboard.index')->name('index');
        Route::view('/settings', 'dashboard.settings.index')->name('settings.index');
        Route::resources([
            'category' => \App\Http\Controllers\CategoryController::class,
            'comment' => \App\Http\Controllers\CommentController::class,
            'blog' => \App\Http\Controllers\BlogController::class,
            'user' => \App\Http\Controllers\UserController::class,
        ]);
    });

require __DIR__.'/auth.php';
