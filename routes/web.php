<?php

use App\Http\Controllers\AboutController;
use App\Http\Controllers\ContactController;
use Illuminate\Support\Facades\Route;


use App\Http\Controllers\ProfileController;
use App\Http\Controllers\FavoriteController;
use App\Http\Controllers\User\UserController;
use App\Http\Controllers\Admin\PostController;
use App\Http\Controllers\Admin\AdminController;

Route::get('/', function () {
    return view('welcome');
})->name('home');
Route::get('contact',[ContactController::class,'index'])->name('contact');
Route::get('about',[AboutController::class,'index'])->name('about');
Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

require __DIR__.'/auth.php';
//user routes
Route:: middleware(['auth','userMiddleware'])->group(function () {
    Route::get('dashboard',[UserController::class,'index'])->name('dashboard');
    Route::get('favorite',[FavoriteController::class,'index'])->name('user.favorite');
});

//admin routes
Route:: middleware(['auth','adminMiddleware'])->group(function () {
    Route::get('/admin/dashboard',[AdminController::class,'index'])->name('admin.dashboard');
   Route::get('/admin/posts', [PostController::class, 'index'])->name('admin.posts');
});
