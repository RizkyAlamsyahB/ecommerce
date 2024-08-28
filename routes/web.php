<?php

use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\DetailController;
use App\Http\Controllers\LandingController;
use App\Http\Controllers\Admin\BrandController;
use App\Http\Controllers\Admin\CategoryController;
use App\Http\Controllers\Admin\ProductsController;
use App\Http\Controllers\Admin\PromotionController;

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

Route::get('/', [LandingController::class, 'index']);

Auth::routes(['verify' => true]);

Route::get('/home', [HomeController::class, 'index'])->name('home')->middleware('verified');
Route::resource('categories', CategoryController::class);
Route::get('categories/data', [CategoryController::class, 'getData'])->name('categories.getData');
Route::resource('brands', BrandController::class);
Route::resource('products', ProductsController::class);
Route::resource('promotions', PromotionController::class);
Route::get('/product/{id}', [DetailController::class, 'show'])->name('detail');
