<?php

use Illuminate\Support\Facades\Route;



Route::get('/', function () {
    return view('home');
});

Route::get('visitas', function () {
    return view('home');
});
Route::get('productos', [App\Http\Controllers\FrontController::class, 'productos']);

Route::post('cart/add', [App\Http\Controllers\CartController::class, 'add'])->name('add');
Route::get('cart/checkout', [App\Http\Controllers\CartController::class, 'checkout'])->name('checkout');
Route::get('cart/clear', [App\Http\Controllers\CartController::class, 'clear'])->name('clear');
Route::post('cart/removeitem', [App\Http\Controllers\CartController::class, 'removeItem'])->name('removeitem');
Route::post('cart/removeone', [App\Http\Controllers\CartController::class, 'removeOne'])->name('removeone');
Route::get('cart/comprar', [App\Http\Controllers\CartController::class, 'comprar'])->name('comprar');


Auth::routes();

Route::get('home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
