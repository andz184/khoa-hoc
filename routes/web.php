<?php

use App\Http\Controllers\Admin\CategoryController;
use App\Http\Controllers\Admin\UserController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\HomeController;
use App\Http\Middleware\AdminMiddleware;
use App\Http\Controllers\Admin\CourseController;
use App\Http\Controllers\Admin\LessonController;
use App\Http\Controllers\Admin\UploadController;
use App\Http\Controllers\Admin\MediaController;
use App\Http\Controllers\Admin\ImageController;
use App\Http\Controllers\ImageUploadController;
use App\Http\Controllers\CourseEnrollmentController;
use App\Http\Controllers\WebhookController;
use App\Http\Controllers\PaymentController;
use Illuminate\Support\Facades\Route;

// Route công khai (không yêu cầu đăng nhập)
Route::middleware(['web'])->group(function () {
    Route::get('/', [HomeController::class, 'index'])->name('home');
    Route::get('/courses', [HomeController::class, 'course'])->name('course');
    Route::get('/course/{slug}', [HomeController::class, 'courceDetail'])->name('course-detail');

    // Route cho hệ thống xác thực
    require __DIR__.'/auth.php';
});

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

    // Category Routes
    Route::get('/admin123/categories', [CategoryController::class, 'index'])->name('admin.categories.index');
    Route::get('/admin123/categories/create', [CategoryController::class, 'create'])->name('admin.categories.create');
    Route::post('/admin123/categories', [CategoryController::class, 'store'])->name('admin.categories.store');
    Route::get('/admin123/categories/{category}/edit', [CategoryController::class, 'edit'])->name('admin.categories.edit');
    Route::put('/admin123/categories/{category}', [CategoryController::class, 'update'])->name('admin.categories.update');
    Route::delete('/admin123/categories/{category}', [CategoryController::class, 'destroy'])->name('admin.categories.destroy');
    Route::post('/admin123/categories/{category}/toggle-status', [CategoryController::class, 'toggleStatus'])->name('admin.categories.toggle-status');

    // Course Routes
    Route::get('/admin123/courses', [CourseController::class, 'index'])->name('admin.courses.index');
    Route::get('/admin123/courses/create', [CourseController::class, 'create'])->name('admin.courses.create');
    Route::post('/admin123/courses/store', [CourseController::class, 'store'])->name('admin.courses.store');
    Route::get('/admin123/courses/{course}/edit', [CourseController::class, 'edit'])->name('admin.courses.edit');
    Route::put('/admin123/courses/{course}', [CourseController::class, 'update'])->name('admin.courses.update');
    Route::delete('/admin123/courses/{course}', [CourseController::class, 'destroy'])->name('admin.courses.destroy');
    Route::post('/admin123/courses/{course}/toggle-status', [CourseController::class, 'toggleStatus'])->name('admin.courses.toggle-status');
    Route::post('/admin123/courses/{course}/toggle-registration', [CourseController::class, 'toggleRegistration'])->name('admin.courses.toggle-registration');

    Route::post('/admin123/upload/image', [UploadController::class, 'uploadImage'])
        ->name('admin.upload.image');

    // User Routes
    Route::get('/admin123/users', [UserController::class, 'index'])->name('admin.users.index');
    Route::get('/admin123/users/create', [UserController::class, 'create'])->name('admin.users.create');
    Route::post('/admin123/users', [UserController::class, 'store'])->name('admin.users.store');
    Route::get('/admin123/users/{user}/edit', [UserController::class, 'edit'])->name('admin.users.edit');
    Route::put('/admin123/users/{user}', [UserController::class, 'update'])->name('admin.users.update');
    Route::delete('/admin123/users/{user}', [UserController::class, 'destroy'])->name('admin.users.destroy');
    Route::post('/admin123/users/{user}/toggle-status', [UserController::class, 'toggleStatus'])->name('admin.users.toggle-status');

    // Media Library Routes
    Route::get('/admin123/media', [MediaController::class, 'index'])->name('admin.media.index');
    Route::post('/admin123/media/upload', [MediaController::class, 'upload'])->name('admin.media.upload');
});

Route::post('/upload-image', [ImageController::class, 'upload'])
    ->name('admin.image.upload');
Route::post('upload/image', [ImageUploadController::class, 'upload'])
    ->name('client.upload.image');

// Route cho đăng ký khóa học
Route::post('/enroll-course', [CourseEnrollmentController::class, 'enroll'])->name('enroll.course');

// Webhook route for payment notifications
Route::post('/webhook/payment', [WebhookController::class, 'handlePayment'])
    ->name('webhook.payment');

// Route cho đăng ký khóa học
Route::middleware(['auth'])->group(function () {
    Route::post('/payment/create/{course}', [PaymentController::class, 'createPayment'])->name('payment.create');
    Route::get('/payment/vnpay/return', [PaymentController::class, 'vnpayReturn'])->name('payment.vnpay.return');
});
