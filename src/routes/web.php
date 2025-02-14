<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ProductController;
use App\Http\Livewire\Register;

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

Route::get('/', function () {
    return view('welcome');
});

Route::get('/products', [ProductController::class, 'index'])->name('products');

Route::get('/products/search', [ProductController::class, 'search']);

Route::get('/products/register', [ProductController::class, 'register'])->name('product.register');

Route::get('/products/{id}', [ProductController::class, 'detail'])->name('product.detail');

Route::patch('/products/{id}/update', [ProductController::class, 'update']);

Route::post('products/register', [ProductController::class, 'store']);

Route::post('/products/{id}/delete', [ProductController::class, 'delete']);