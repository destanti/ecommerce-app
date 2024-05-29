<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\CartController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\AboutController;
use App\Http\Controllers\CouponController;
use App\Http\Controllers\ReviewController;
use App\Http\Controllers\SosmedController;
use App\Http\Controllers\InvoiceController;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\CheckoutController;
use App\Http\Controllers\FrontendController;
use App\Http\Controllers\DashboardController;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::middleware('guest')->group(function () {
    Route::get('/login/admin', [AuthController::class, 'loginAdmin']);
    Route::post('/login/admin/authenticate', [AuthController::class, 'authenticateAdmin']);
    Route::get('/login', [FrontendController::class, 'login'])->name('login');
    Route::post('/login/authenticate', [FrontendController::class, 'authenticateCustomer']);
    Route::post('/register', [FrontendController::class, 'register']);
});



Route::get('/', [FrontendController::class, 'index']);
Route::get('/katalog/{kategori}', [FrontendController::class, 'katalog']);
Route::get('/detail/{product}', [FrontendController::class, 'detail']);
Route::get('/promo', [FrontendController::class, 'promo']);
Route::get('/search/{search}', [FrontendController::class, 'search']);



Route::middleware('auth')->group(function () {
    // untuk check apakah dia sudah log in
    Route::get('/logout', [FrontendController::class, 'logoutCustomer']);
    Route::get('/profile', [ProfileController::class, 'index']);
    Route::post('/profile/update/{user}', [ProfileController::class, 'update']);
    Route::get('/cart',[CartController::class,'index']);
    Route::post('/cart/add',[CartController::class,'add']);
    Route::post('/cart/qty',[CartController::class,'qty']);
    Route::get('/cart/destroy/{cart}',[CartController::class,'destroy']);
    Route::post('/checkout',[CheckoutController::class,'index']);
    Route::get('/invoice/{checkout}',[CheckoutController::class,'invoice']);
    Route::get('/cart/subtotal',[CartController::class,'subtotal']);
    Route::get('/cart/coupon/{coupon}',[CartController::class,'checkcoupon']);
    Route::post('/input-invoice', [CheckoutController::class, 'store']);
    Route::get('/count',[CartController::class,'countCart']);
    Route::get('/history', [FrontendController::class, 'history']);
    

    Route::middleware('check')->group(function () {
        // untuk check apakah dia adalah admin
        Route::get('/logout/admin', [AuthController::class, 'logoutAdmin']);
        Route::get('/dashboard', [DashboardController::class, 'index']);

        Route::get('/about', [AboutController::class, 'index']);
        Route::get('/about/create', [AboutController::class, 'create']);
        Route::post('about/store', [AboutController::class, 'store']);
        Route::get('/about/destroy/{about}', [AboutController::class, 'destroy']);
        Route::get('/about/edit/{about}', [AboutController::class, 'edit']);
        Route::post('/about/update/{about}', [AboutController::class, 'update']);

        Route::get('/sosmed', [SosmedController::class, 'index']);
        Route::get('/sosmed/create', [SosmedController::class, 'create']);
        Route::post('sosmed/store', [SosmedController::class, 'store']);
        Route::get('/sosmed/destroy/{sosmed}', [SosmedController::class, 'destroy']);
        Route::get('/sosmed/edit/{sosmed}', [SosmedController::class, 'edit']);
        Route::post('/sosmed/update/{sosmed}', [SosmedController::class, 'update']);

        Route::get('/category', [CategoryController::class, 'index']);
        Route::get('/category/create', [CategoryController::class, 'create']);
        Route::post('category/store', [CategoryController::class, 'store']);
        Route::get('/category/destroy/{category}', [CategoryController::class, 'destroy']);
        Route::get('/category/edit/{category}', [CategoryController::class, 'edit']);
        Route::post('/category/update/{category}', [CategoryController::class, 'update']);

        Route::get('/product', [ProductController::class, 'index']);
        Route::get('/product/create', [ProductController::class, 'create']);
        Route::post('product/store', [ProductController::class, 'store']);
        Route::get('/product/destroy/{product}', [ProductController::class, 'destroy']);
        Route::get('/product/edit/{product}', [ProductController::class, 'edit']);
        Route::post('/product/update/{product}', [ProductController::class, 'update']);

        Route::get('/user', [UserController::class, 'index']);
        Route::get('/user/create', [UserController::class, 'create']);
        Route::post('user/store', [UserController::class, 'store']);
        Route::get('/user/destroy/{user}', [UserController::class, 'destroy']);
        Route::get('/user/edit/{user}', [UserController::class, 'edit']);
        Route::post('/user/update/{user}', [UserController::class, 'update']);

        Route::get('/coupon', [CouponController::class, 'index']);
        Route::get('/coupon/create', [CouponController::class, 'create']);
        Route::post('coupon/store', [CouponController::class, 'store']);
        Route::get('/coupon/destroy/{coupon}', [CouponController::class, 'destroy']);
        Route::get('/coupon/edit/{coupon}', [CouponController::class, 'edit']);
        Route::post('/coupon/update/{coupon}', [CouponController::class, 'update']);

        Route::get('/checkouts', [InvoiceController::class, 'index']);
        Route::get('/checkouts/create', [InvoiceController::class, 'create']);
        Route::post('checkouts/store', [InvoiceController::class, 'store']);
        Route::get('/checkouts/destroy/{checkout}', [InvoiceController::class, 'destroy']);
        Route::get('/checkouts/show/{checkout}', [InvoiceController::class, 'show']);
        Route::post('/checkouts/update/{checkout}', [InvoiceController::class, 'update']);
        Route::post('/checkouts/edit/status', [InvoiceController::class, 'updateStatus']);

        Route::get('/review', [ReviewController::class, 'index']);
        Route::get('/review/show/{review}', [ReviewController::class, 'show']);
        Route::post('review/store', [ReviewController::class, 'store']);
        Route::get('/review/destroy/{review}', [ReviewController::class, 'destroy']);
       
    });
    


});
