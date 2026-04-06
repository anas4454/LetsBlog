<?php

use App\Http\Controllers\AdminController;
use App\Http\Controllers\BlogController;
use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;



Route::get('/', [BlogController::class , 'index'])->name('home');
Route::get('/blog/wishlist', [BlogController::class , 'wishlist'])->middleware('auth')->name('wishlist');


Route::get('/blog/{blog}', [BlogController::class , 'blogDetail'])->name('blog-detail');
Route::post('/blog/{id}/save', [BlogController::class , 'save'])->middleware('auth')->name('save-blog');

Route::post('/blog/{id}/unsave', [BlogController::class , 'unsave'])->middleware('auth')->name('unsave-blog');



Route::prefix('dashboard')->middleware("auth" , 'verified')->group(function(){
    Route::get('/', [AdminController::class , 'dashboard'])->name('dashboard');
    Route::get('/blog', [AdminController::class , 'blog'])->name('dashboard.blog');
    Route::get('/create-blog', [AdminController::class , 'createBlog'])->name('dashboard.create-blog');
    Route::post('/create-blog', [AdminController::class , 'storeBlog'])->name('dashboard.store-blog');
    Route::get('/delete-blog/{id}', [AdminController::class , 'deleteBlog'])->name('dashboard.delete-blog');
});



Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
     Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

require __DIR__.'/auth.php';
