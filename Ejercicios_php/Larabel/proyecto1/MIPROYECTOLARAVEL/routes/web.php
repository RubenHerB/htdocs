<?php

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

Route::get('/', function () {
    return view('welcome');
});

Route::get('holamundo',function () {
    return view('miprimeravista');
});

Route::get('segunda',function () {
    return 'Estoy creando una nueva ruta';
});
Route::get('segunda/nivel1',function () {
    return 'Estoy creando un nuevo nivel';
});

Route::get('tercera/{id}',function ($id) {
    return 'La tercera ruta recibe el numero '.$id;
});