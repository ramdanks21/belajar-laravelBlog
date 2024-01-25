<?php

use App\Http\Controllers\ArticleController;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\BlogController;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\SlideController;
use Illuminate\Support\Facades\Route;

Route::get('/', [BlogController::class, 'index']);

// * request user dengan mengirim submit
Route::redirect('home', 'dashboard');
// * request user
Route::get('/login', [AuthController::class, 'index'])->name('login')->middleware('guest');
Route::post('/login', [AuthController::class, 'authenticate']);
Route::post('/logout', [AuthController::class, 'logout']);
Route::get('/dashboard', function () {
    return view('dashboard.layout.index')->with([
        'title' => 'About',
    ]);
})->middleware('auth');

Route::delete('/dashboard/slide/{id}/edit', [SlideController::class, 'destroy']);

Route::resource('/dashboard/slide', SlideController::class)->middleware('auth');
Route::resource('/dashboard/category', CategoryController::class)->middleware('auth');

Route::get('/slug-kategori', [CategoryController::class, 'getSlug'])->middleware('auth');
Route::get('/slug-artikel', [ArticleController::class, 'getSlug'])->middleware('auth');
// Route::get('/slug-category', [CategoryController::class, 'getSlug'])->middleware('auth');
Route::resource('/dashboard/artikel', ArticleController::class)->middleware('auth');
