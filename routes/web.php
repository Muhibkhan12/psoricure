<?php

use App\Http\Controllers\AdminController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\AuthController;

use Illuminate\Support\Facades\Route;

Route::get('/', function(){
    return view('login');
});
Route::get('/home', function () {
    return view('index');
});
Route::get('/products', function (){
    return  view('products');
});
Route::get('/contact', function(){
    return view('contact');
});
Route::prefix('user')->group(function(){
    Route::post('/register',[AuthController::class,'createUser'])->name('register-user');
    Route::post('/login',[AuthController::class,'loginUser'])->name('user-login');
});
Route::prefix('admin')->group(function(){
    Route::get('/dashboard',[AdminController::class,'adminDashboard']);
    Route::get('/analytics',[AdminController::class,'adminAnalytics']);
    Route::get('/addProducts',[AdminController::class,'adminProducts']);
    Route::get('/ManageProducts',[AdminController::class,'manageProducts']);
    Route::get('/customers',[AdminController::class,'customerPage']);
    Route::get('/orders',[AdminController::class,'ordersPage']);
});