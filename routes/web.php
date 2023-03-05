<?php

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

Route::get('/', function () {
    return view('welcome');
});


Route::controller(ProductController::class)->group(function(){
    Route::get("/product" , "index")->name('Product_index');
    Route::get("/create" , "create")->name('Product_create');
    Route::post("/store" , "store")->name('Product_store');
    Route::get("/product/{id}" , "show")->name('Product_show');
    Route::get("/product/edit/{id}" , "edit")->name('Product_edit');
    Route::post("/update/{id}" , "update")->name('Product_update');
    Route::get("/destroy/{id}" , "destroy")->name('Product_destroy');
});
