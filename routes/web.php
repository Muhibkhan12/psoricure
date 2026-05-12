<?php

use App\Http\Controllers\AdminController;
use Illuminate\Support\Facades\Route;

Route::get('/home', function () {
    return view('index');
});
Route::get('/products', function (){
    return  view('products');
});
Route::get('/contact', function(){
    return view('contact');
});

Route::prefix('admin')->group(function(){
    Route::get('/dashboard',[AdminController::class,'adminDashboard']);
    Route::get('/analytics',[AdminController::class,'adminAnalytics']);
    Route::get('/products',[AdminController::class,'adminProducts']);
    Route::get('/orders',[AdminController::class,'ordersPage']);
});