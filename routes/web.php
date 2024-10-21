<?php

use App\Http\Controllers\Admin\AdminController;
use App\Http\Controllers\Web\ProfileController;
use App\Http\Controllers\Web\DashboardController;
use App\Http\Controllers\Web\FrontendController;
use Illuminate\Support\Facades\Route;

//========================== Home Page ===========================================
Route::get('/', [FrontendController::class , 'index'])->name('home');
//=========================== Home Page ==========================================
//Route::get('/dashboard', function () {
//    return view('dashboard');
//})->middleware(['auth', 'verified'])->name('dashboard');
//=============================================================


//===================================Profile Route==========================================
Route::middleware(['auth'])->group(function () {
    Route::get('/dashboard',[DashboardController::class,'index'])->name('dashboard');
//    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::put('/profile/password',[ProfileController::class,'updatePassword'])->name('profile.update.password');
    Route::post('/profile/avatar', [ProfileController::class, 'updateAvatar'])->name('profile.update.avatar');
//    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});
//===================================Profile Route==========================================


//Route::group(['middleware' => 'auth'],function (){
//    Route::put('/profile',[ProfileController::class,'store'])->name('dashboard');
//});

//===================================== show product details =============================================
Route::get('/product/{slug}', [FrontendController::class,'showProduct'])->name('product.show');
//===================================== show product details =============================================



require __DIR__ . '/auth.php';


