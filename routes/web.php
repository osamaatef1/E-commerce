<?php

use App\Http\Controllers\CategoriesController;
use App\Http\Controllers\ProductsController;
use App\Http\Controllers\ReviewController;
use App\Models\Category;
use App\Models\Product;
use Illuminate\Support\Facades\Route;


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

//Route::get('/', function () {
//    return view('welcome');
//});

Route::get('/' ,[CategoriesController::class , 'index'] );


Route::get('/product/{cat_id?}',[ProductsController::class , 'GetProducts']);



Route::get('/category',[CategoriesController::class,'FilterProducts']);
Route::get('/reviews',[ReviewController::class,'index']);

Route::get('/addproduct',[ProductsController::class,'AddProduct']);
Route::get('/removeproduct/{id}',[ProductsController::class,'RemoveProduct']);
Route::post('/editproduct/{id}',[ProductsController::class,'EditProduct']);
Route::get('/edit/{id}',[ProductsController::class,'edit']);
Route::post('/storeproduct',[ProductsController::class,'storeproduct']);
Route::post('/addreview',[ReviewController::class,'addreview']);


