<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\CustomerController;
use App\Http\Controllers\MenuController;
use App\Http\Controllers\OrderController;

Route::get('/', [LoginController::class, 'showFormLogin'])->middleware('guest')->name('login');
Route::post('/', [LoginController::class, 'authenticate']);
Route::get('dashboard', [LoginController::class, 'dashboard'])->middleware('auth');
Route::get('signout', [LoginController::class, 'signOut'])->name('signout');
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
// Route::resource('menu', MenuController::class);
// Route::prefix('customer')->group(function () {
//     Route::get('/index', [CustomerController::class, 'index']);
//     Route::get('/create', [CustomerController::class, 'create']);
//     Route::post('/store', [CustomerController::class, 'store']);
//     Route::get('/edit/{id}', [CustomerController::class, 'edit']);
//     Route::post('/update/{id}', [CustomerController::class, 'update']);
//     Route::get('/destroy/{id}', [CustomerController::class, 'destroy']);
// });
// Route::get('/', function () {
//     return view('welcome');
// });
Route::middleware('role:admin,kasir')->group(function () {
    Route::prefix('customer')->group(function () {
        Route::get('/index', [CustomerController::class, 'index']);
        Route::get('/create', [CustomerController::class, 'create']);
        Route::post('/store', [CustomerController::class, 'store']);
        Route::get('/edit/{id}', [CustomerController::class, 'edit']);
        Route::post('/update/{id}', [CustomerController::class, 'update']);
        Route::get('/destroy/{id}', [CustomerController::class, 'destroy']);
    });
});

Route::prefix('order')->group(function () {
    Route::get('/index', [OrderController::class, 'index']);
    Route::get('/create', [OrderController::class, 'create']);
    Route::post('/store', [OrderController::class, 'store']);
    Route::get('/show/{order}', [OrderController::class, 'show']);
    Route::get('/edit/{order}', [OrderController::class, 'edit']);
    Route::post('/update/{order}', [OrderController::class, 'update']);
    Route::get('/destroy/{order}', [OrderController::class, 'destroy']);
});

Route::middleware('role:admin')->group(function () {
    Route::resource('menu', MenuController::class);
});
