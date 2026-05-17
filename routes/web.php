<?php

use App\Http\Controllers\AdminController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\ProductController;
use Illuminate\Support\Facades\Route;

Route::get('/', function(){
    return view('login');
})->name('login-page');
Route::get('/home', function () {
    return view('index');
})->name('home');
Route::get('/products', function (){
    return  view('products');
});
Route::get('/contact', function(){
    return view('contact');
});
Route::prefix('user')->group(function(){
    Route::post('/register',[AuthController::class,'createUser'])->name('register-user');
    Route::post('/login',[AuthController::class,'loginUser'])->name('user-login');
    Route::post('/logout',[AuthController::class,'logoutUser'])->name('logout-user');

    Route::get('/dashboard',[UserController::class,'showUserDashboard'])->name('user-dashboard');
    Route::get('/profile',[UserController::class,'showProfile'])->name('Userprofile-page');
    Route::get('/order',[UserController::class,'showOrderPage'])->name('orders-page');
});
Route::prefix('admin')->group(function(){
    Route::get('/dashboard',[AdminController::class,'adminDashboard']);
    Route::get('/analytics',[AdminController::class,'adminAnalytics']);
    Route::get('/addProducts',[AdminController::class,'adminProducts']);
    Route::get('/ManageProducts',[AdminController::class,'manageProducts']);
    Route::get('/customers',[AdminController::class,'customerPage']);
    Route::get('/orders',[AdminController::class,'ordersPage']);
});

Route::prefix('product')->group( function(){
    Route::post('/createProduct',[ProductController::class,'createProduct'])->name('add-products');
    Route::put('/updateProduct/{id} ',[ProductController::class,'updateProduct'])->name('update-product');
    Route::delete('/deleteProduct/{id}',[ProductController::class,'deleteProduct'])->name('delete-product');
});
