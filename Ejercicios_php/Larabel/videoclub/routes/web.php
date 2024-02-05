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
    return 'Pantalla principal';
});
Route::get('login', function () {
    return 'Login usuario';
});
Route::get('logout', function () {
    return 'Logout usuario';
});
Route::get('catalog', function () {
    return 'Listado películas';
});
Route::get('catalog/show/{id}', function ($id=null) {
    return 'Vista detalle película '.$id;
});
Route::get('catalog/create', function () {
    return 'Añadir pelicula';
});
Route::get('catalog/edit/{id}', function ($id=null) {
    return 'Modificar película '.$id    ;
});