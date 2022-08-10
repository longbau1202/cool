<?php

use App\Http\Controllers\loginController;
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
Route::group(['prefix' => 'admin'], function() {
    Route::get('/', [loginController::class, 'index'])->name('admin');
    Route::post('/login', [loginController::class, 'login'])->name('admin.login');
    Route::get('/register-form', [loginController::class, 'register'])->name('admin.register.form');
    Route::post('/register', [loginController::class, 'store'])->name('admin.register');
    Route::get('/logout', [loginController::class, 'logout'])->name('admin.logout');
});

Route::get('/', function () {
    return view('welcome');
});
