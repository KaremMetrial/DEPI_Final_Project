<?php

use App\Http\Controllers\Admin\AdminController;
use App\Http\Controllers\Admin\ProfileController;
use Illuminate\Support\Facades\Route;

// Define the route for the dashboard
Route::get('/dashboard', [AdminController::class, 'index'])->name('dashboard');

// Define the route for the Admin profile page
Route::get('/profile', [ProfileController::class, 'index'])->name('profile');
Route::put('/profile', [ProfileController::class, 'updateProfile'])->name('profile.update');
Route::put('profile/password',[ProfileController::class,'updatePassword'])->name('profile.update.password');
