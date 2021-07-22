<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ProductController;
use App\Models\Product;
use App\Http\Controllers\ShoppingController;

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

Route::middleware(['auth'])->group(function(){
    Route::get('/dashboard', function(){
        return view('dashboard', ['products' => Product::latest()->paginate(3)]);
    })->name('dashboard');
    Route::get('/products/create', [ProductController::class,'create'])->name('products.create');
    Route::post('/products/store', [ProductController::class,'store'])->name('products.store');
    Route::get('/products', [ProductController::class,'index'])->name('products.index');
    Route::get('/products/{product:title}', [ProductController::class,'show'])->name('products.show');
    Route::get('/products/edit/{product:title}', [ProductController::class,'edit'])->name('products.edit');
    Route::post('/products/update/{product:title}', [ProductController::class,'update'])->name('products.update');
    Route::post('/products/delete/{product:title}', [ProductController::class,'delete'])->name('products.delete');

    Route::post('/shopping/store', [ShoppingController::class,'store'])->name('shopping.store');
    Route::post('/products/{rowId}/destroy', [ShoppingController::class,'destroy'])->name('shopping.destroy');
    Route::get('/cart', [ShoppingController::class,'index'])->name('shopping.index');
    Route::post('/products/{rowId}/update', [ShoppingController::class,'update'])->name('shopping.update');

    Route::get('/checkout', [ShoppingController::class,'checkout'])->name('shopping.checkout');
    Route::post('/payment', [ShoppingController::class,'payment'])->name('shopping.payment');
});

require __DIR__.'/auth.php';
