<?php

use App\Http\Controllers\Admin\AdminController;
use App\Http\Controllers\Admin\CategoryController;
use App\Http\Controllers\Admin\ProductController;
use App\Http\Controllers\Admin\ProductGalleryController;
use App\Http\Controllers\Admin\ProductOptionController;
use App\Http\Controllers\Admin\ProductSizeController;
use App\Http\Controllers\Admin\ProfileController;
use App\Http\Controllers\Admin\SliderController;
use App\Http\Controllers\Admin\WhyChooseUsController;
use Illuminate\Support\Facades\Route;




// Define the route for the dashboard
Route::get('/dashboard', [AdminController::class, 'index'])->name('dashboard');




//===================================  Admin profile ==================================
Route::group(['prefix' => 'profile', 'controller' => ProfileController::class],function () {
    Route::get('/', 'index')->name('profile');
    Route::put('/update',  'updateProfile')->name('profile.update');
    Route::put('/password','updatePassword')->name('profile.update.password');
});
//Route::get('/profile', [ProfileController::class, 'index'])->name('profile');
//Route::put('/profile/update', [ProfileController::class, 'updateProfile'])->name('profile.update');
//Route::put('/profile/password',[ProfileController::class,'updatePassword'])->name('profile.update.password');
//===================================  Admin profile ==================================





//======================================Slider=========================================
//Route::resource('/slider',SliderController::class);
//======================================Slider=========================================
//====================================== Category =========================================
//Route::resource('/category',CategoryController::class);
//====================================== Category =========================================


Route::resources([
//======================================Slider=========================================
    '/slider' => SliderController::class,
//======================================Slider=========================================

//====================================== Category =========================================
    '/category' => CategoryController::class,
//====================================== Category =========================================

//====================================== Product =========================================
    '/product' => ProductController::class,
//====================================== Product =========================================

//====================================== Product Gallery =========================================
    '/product-gallery' => ProductGalleryController::class,
//====================================== Product Gallery =========================================

//====================================== Product Size =========================================
    '/product-size' => ProductSizeController::class,
//====================================== Product Size =========================================

//====================================== Product Option =========================================
    '/product-option' => ProductOptionController::class
//====================================== Product Option =========================================
]);
