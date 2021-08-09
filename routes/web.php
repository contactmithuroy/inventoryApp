<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\BrandController;
use App\Http\Controllers\SizeController;
use App\Http\Controllers\ProductController;

/*
|----------------------------------------------------------------
| Web Routes
|----------------------------------------------------------------
*/

Route::get('/', function () {
    return view('welcome'); 
});

// temp route
Route::get('/template',function(){
    return view('dashboard');
});

Auth::routes();
Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

// Route::middleware(['auth:sanctum', 'verified'])->get('/dashboard', function () {
//     return view('dashboard');
// })->name('dashboard');

// Route::middleware(['auth:sanctum'])->group(function(){
   
// });


Route::resource('/admin/category',CategoryController::class);
Route::post('/admin/category/show/{id}',[CategoryController::class,'show'])->name('category.show');

Route::resource('/admin/brand',BrandController::class);
Route::post('/admin/brand/show/{id}',[BrandController::class,'show'])->name('brand.show');

Route::resource('/admin/size',SizeController::class);
Route::post('/admin/size/show/{id}',[SizeController::class,'show'])->name('size.show');

Route::resource('/admin/product',ProductController::class);
Route::post('/admin/product/show/{id}',[ProductController::class,'show'])->name('product.show');




// API ROUTE
Route::get('/api/categories',[CategoryController::class,'getCategoriesJson']);
Route::get('/api/brands',[BrandController::class,'getBrandJson']);
Route::get('/api/sizes',[SizeController::class,'getSizeJson']);



