<?php

    use App\Http\Controllers\Web\CartController;
    use App\Http\Controllers\Web\DashboardController;
    use App\Http\Controllers\Web\FrontendController;
    use App\Http\Controllers\Web\ProfileController;
    use Illuminate\Support\Facades\Route;

//========================== Home Page ===========================================
    Route::get('/', [FrontendController::class, 'index'])->name('home');
//=========================== Home Page ==========================================
//Route::get('/dashboard', function () {
//    return view('dashboard');
//})->middleware(['auth', 'verified'])->name('dashboard');
//=============================================================


//===================================Profile Route==========================================
    Route::middleware(['auth'])->group(function () {
        Route::get('/dashboard', [DashboardController::class, 'index'])->name('dashboard');
//    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
        Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
        Route::put('/profile/password', [ProfileController::class, 'updatePassword'])->name('profile.update.password');
        Route::post('/profile/avatar', [ProfileController::class, 'updateAvatar'])->name('profile.update.avatar');
//    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
    });
//===================================Profile Route==========================================


//Route::group(['middleware' => 'auth'],function (){
//    Route::put('/profile',[ProfileController::class,'store'])->name('dashboard');
//});

//===================================== show product details =============================================
    Route::get('/product/{slug}', [FrontendController::class, 'showProduct'])->name('product.show');
//===================================== show product details =============================================

//=====================================  product model =============================================
    Route::get('/load-product-model/{productId}', [FrontendController::class, 'loadProductModel'])->name('load-product-model');
//=====================================  product model =============================================

//===================================== add product to cart model =============================================
    Route::post('/add-to-cart', [CartController::class, 'addToCart'])->name('add-to-cart');
//=====================================  add product to cart model =============================================

//=====================================  get product from cart model =============================================
    Route::get('/get-cart-products', [CartController::class,'getCartProducts'])->name('get-cart-products');
//=====================================  get product from cart model =============================================

//=====================================  delete product from cart model =============================================
    Route::get('/cart-product-remove/{rowId}',[CartController::class,'cartProductRemove'])->name('cart-product-remove');
//=====================================  delete product from cart model =============================================


    require __DIR__ . '/auth.php';


