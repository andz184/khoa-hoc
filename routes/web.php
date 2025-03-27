<?php


use Illuminate\Support\Facades\Route;
use App\Http\Controllers\homecontroller;



Route::get('/', [homeController::class, 'index'])->name('index');
Route::get('/cource', [homeController::class, 'cource'])->name('cource');
Route::get('/cource-detail', [homeController::class, 'courceDetail'])->name('cource-detail');
Route::get('/learn', [homeController::class, 'homeLearn'])->name('home-learn');

