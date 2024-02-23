<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\CatalogControler;

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

Route::get('/', [CatalogControler::class, 'getHome']);
Route::get('catalog', [CatalogControler::class, 'getIndex']);
Route::get('catalog/show/{id}', [CatalogControler::class, 'getShow']);

Route::get('user/{id}', [CatalogControler::class, 'showProfile']);


