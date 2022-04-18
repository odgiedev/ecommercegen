<?php

use App\Http\Controllers\MainController;
use App\Http\Controllers\UserController;
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

Route::get('/', [MainController::class, 'index']);
Route::get('/products/{id}', [MainController::class, 'show']);
Route::get('/products/edit/{id}', [MainController::class, 'update'])->middleware('auth');
Route::put('/products/edit/{id}', [MainController::class, 'updateStore'])->middleware('auth');
Route::delete('/products/delete/{id}', [MainController::class, 'destroy'])->middleware('auth');
Route::get('/products', [MainController::class, 'product']);
Route::post('/products/create', [MainController::class, 'store'])->middleware('auth');

Route::get('/search', [MainController::class, 'search']);

Route::get('/cart', [MainController::class, 'cart'])->middleware('auth');
Route::post('/cart/{id}', [UserController::class, 'cartStore'])->middleware('auth');
Route::post('/cart/unset/{id}', [UserController::class, 'cartUnset'])->middleware('auth');

Route::get('/dashboard', [UserController::class, 'dashboard'])->middleware('auth');
Route::get('/login', [UserController::class, 'login'])->name('login');
Route::post('/login', [UserController::class, 'loginAuth']);
Route::post('/logout', [UserController::class, 'logout'])->middleware('auth');
Route::get('/register', [UserController::class, 'register']);
Route::post('/users/create', [UserController::class, 'store']);
