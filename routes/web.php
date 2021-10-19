<?php

use App\Http\Controllers\ProductController;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});

// admin routes
Route::group([
    'middleware'=> ['auth'],
    'prefix' => 'admin',
    'namespace' => 'App\Http\Controllers\Admin'
], function () {
    Route::get('/dashboard', 'DashboardController@teste')->name('dashboard');
        
    Route::get('/financeiro', function () {
        return view('welcome');
    })->name('financeiro');
    
    Route::get('/produtos', function () {
        return view('welcome');
    })->name('produtos');
    
    Route::get('/', function () {
        return redirect()->route('dashboard');
    });
});

Route::resource('products', ProductController::class);