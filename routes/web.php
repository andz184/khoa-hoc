<?php

use App\Http\Controllers\ProfileController;
use App\Http\Controllers\HomeController;
use App\Http\Middleware\AdminMiddleware;
use Illuminate\Support\Facades\Route;

// Route công khai (không yêu cầu đăng nhập)
Route::get('/', [HomeController::class, 'index'])->name('index');
Route::get('/course', [HomeController::class, 'course'])->name('course');
Route::get('/course-detail', [HomeController::class, 'courceDetail'])->name('course-detail');

// Route yêu cầu xác thực (cho người dùng đã đăng nhập)
Route::middleware(['auth', 'verified'])->group(function () {
    // Route chung cho tất cả người dùng đã đăng nhập
    Route::get('/home', [HomeController::class, 'homeLearn'])->name('home-learn');
    Route::get('/list-course', [HomeController::class, 'listCourse'])->name('home-listcourse');
    Route::get('/watch-video', [HomeController::class, 'watchVideo'])->name('home-watchvideo');

    // Route quản lý profile (cho tất cả người dùng đã đăng nhập)
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});



Route::middleware(['auth', 'verified', AdminMiddleware::class])->group(function () {
    Route::get('/admin123', [HomeController::class, 'homeAdmin'])->name('dashboard');
});


// Route cho hệ thống xác thực
require __DIR__.'/auth.php';
