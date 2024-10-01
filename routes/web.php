<?php

use App\Http\Controllers\Admin\AdminController;
use App\Http\Controllers\Web\ProfileController;
use App\Http\Controllers\Web\DashboardController;
use App\Http\Controllers\Web\FrontendController;
use Illuminate\Support\Facades\Route;

Route::group([],function (){

});
Route::get('/', [FrontendController::class , 'index'])->name('home');
//
//Route::get('/dashboard', function () {
//    return view('dashboard');
//})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/dashboard',[DashboardController::class,'index'])->name('dashboard');
//    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::put('/profile/password',[ProfileController::class,'updatePassword'])->name('profile.update.password');
    Route::post('/profile/avatar', [ProfileController::class, 'updateAvatar'])->name('profile.update.avatar');

//    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

//Route::group(['middleware' => 'auth'],function (){
//    Route::put('/profile',[ProfileController::class,'store'])->name('dashboard');
//});


require __DIR__ . '/auth.php';


