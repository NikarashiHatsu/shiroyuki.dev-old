<?php

use Illuminate\Foundation\Application;
use Illuminate\Support\Facades\Route;
use Inertia\Inertia;

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

Route::get('/', function () {
    return Inertia::render('Welcome', [
        'canLogin' => Route::has('login'),
        'canRegister' => Route::has('register'),
        'laravelVersion' => Application::VERSION,
        'phpVersion' => PHP_VERSION,
    ]);
})->name('index');

Route::prefix('dashboard')
    ->as('dashboard.')
    ->middleware(['auth', 'verified'])
    ->group(function() {
        Route::inertia('/', 'Dashboard')->name('index');
        Route::inertia('/setting', 'Setting')->name('setting.index');
        Route::resources([
            'category' => \App\Http\Controllers\CategoryController::class,
            'comment' => \App\Http\Controllers\CommentController::class,
            'blog' => \App\Http\Controllers\BlogController::class,
            'user' => \App\Http\Controllers\UserController::class,
        ]);
    });

require __DIR__.'/auth.php';
