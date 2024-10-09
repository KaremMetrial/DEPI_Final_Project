<?php

use App\Http\Controllers\Admin\AdminController;
use App\Http\Controllers\Admin\CategoryController;
use App\Http\Controllers\Admin\ProfileController;
use App\Http\Controllers\Admin\SliderController;
use App\Http\Controllers\Admin\WhyChooseUsController;
use Illuminate\Support\Facades\Route;

// Define the route for the dashboard
Route::get('/dashboard', [AdminController::class, 'index'])->name('dashboard');

//===================================  Admin profile ==================================
Route::get('/profile', [ProfileController::class, 'index'])->name('profile');
Route::put('/profile', [ProfileController::class, 'updateProfile'])->name('profile.update');
Route::put('/profile/password',[ProfileController::class,'updatePassword'])->name('profile.update.password');
//===================================  Admin profile ==================================

//======================================Slider=========================================
Route::resource('/slider',SliderController::class);
//======================================Slider=========================================

//====================================== Category =========================================
Route::resource('/category',CategoryController::class);
//====================================== Category =========================================

