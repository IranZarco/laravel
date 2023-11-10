<?php

use App\Http\Controllers\ProductController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\ProductController2;
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

Route::get('/',[HomeController::class, 'home'])->name('raiz');

Route::get('products/list', [ProductController::class, 'index'])->name('products.index');

Route::get('product/create', [ProductController::class, 'create'])->name('products.create');

Route::post('products/guardar',[ProductController::class, 'store'])->name('products.store');

Route::post('products/update',[ProductController::class, 'update'])->name('products.update');

Route::get('/products/{id}/edit', [ProductController::class, 'edit'])->name('products.edit');

Route::get('/products/{id}/destroy', [ProductController::class, 'destroy'])->name('products.destroy');




Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

Route::middleware(['validar_rol'])->group(function(){
    Route::get('pruebaadmin', function(){
        dd('entra');
    });
});


Route::get('error/403', function(){
    return view('errors.403');
});
