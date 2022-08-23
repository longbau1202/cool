<?php

use App\Http\Controllers\BrandController;
use App\Http\Controllers\loginController;
use App\Http\Controllers\ProductController;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::group(['prefix' => 'login'], function(){
    Route::get('/', [loginController::class, 'index'])->name('loginform');
    Route::post('/postlogin', [loginController::class, 'login'])->name('login');
    Route::get('/register-form', [loginController::class, 'register'])->name('register.form');
    Route::post('/register', [loginController::class, 'store'])->name('register');
    Route::get('/logout', [loginController::class, 'logout'])->name('logout');
});

Route::group(['middleware' => 'verfiy-role'], function() {
    Route::group(['prefix' => 'admin'], function() {
        Route::get('/', function () {
            return view('layout.master');
        })->name('home');

        Route::group(['prefix' => 'product'], function() {
            Route::get('/', [ProductController::class, 'index'])->name('product');
            Route::get('/get-product', [ProductController::class, 'getProducts'])->name('getProducts');

            Route::get('/create',[ProductController::class,'create'])->name('create');
            Route::post('/create',[ProductController::class,'store'])->name('create');

            Route::get('/detail/{id}',[ProductController::class,'show'])->name('show');

            Route::get('/edit/{id}',[ProductController::class,'edit'])->name('edit');
            Route::post('/edit/{id}',[ProductController::class,'update'])->name('update');

            Route::delete('/destroy/{id}',[ProductController::class,'destroy'])->name('destroy');
        });
        Route::group(['prefix' => 'makers'], function() {
            Route::get('/', [BrandController::class, 'index'])->name('maker');
            Route::get('/get-makers', [BrandController::class, 'getMakers'])->name('getMakers');

            Route::get('/create',[BrandController::class,'create'])->name('maker.create');
            Route::post('/create',[BrandController::class,'store'])->name('maker.store');

            Route::get('/detail/{id}',[BrandController::class,'show'])->name('maker.show');

            Route::get('/edit/{id}',[BrandController::class,'edit'])->name('maker.edit');
            Route::post('/edit/{id}',[BrandController::class,'update'])->name('maker.update');

            Route::delete('/destroy/{id}',[BrandController::class,'destroy'])->name('maker.destroy');
        });
    });
});

Route::group(['prefix' => 'member'], function() {
    Route::get('/', function () {
        return view('member.layout.master');
    })->name('member.home');
});
