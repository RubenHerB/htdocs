<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Operaciones;

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
    return view('home');
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
Route::get('catalog/show/{id?}', function ($id=null) {
    return 'Vista detalle película '.$id;
})->where('id', '[0-9]+');
Route::get('catalog/create', function () {
    return 'Añadir pelicula';
});
Route::get('catalog/edit/{id?}', function ($id=null) {
    return 'Modificar película '.$id    ;
})->where('id', '[0-9]+');

Route::get('Operaciones/Suma/{a}/{b}', [operaciones::class, 'suma']);
Route::get('Resta/{a}/{b}', [operaciones::class, 'resta']);
Route::get('Div/{a}/{b}', [operaciones::class, 'div']);
Route::get('Mullti/{a}/{b}', [operaciones::class, 'multi']);
