<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controlers\MoviesController;

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

// Route::get('/', function () {
//     return view('welcome');
// });

Route::get('holamundo',function () {
    return view('miprimeravista');
});

Route::get('segunda',function () {
    return 'Estoy creando una nueva ruta';
});
Route::get('segunda/nivel1',function () {
    return 'Estoy creando un nuevo nivel';
});

Route::get('tercera/{id?}',function ($id=1) {
    return 'La tercera ruta recibe el numero '.$id;
})->where('id', '[0-9]+');

Route::get('/', function()
{
return view('home', array('nombre' => 'Pedro','edad'=>32));
});
Route::get('/profile/{id}', function($id)
{
    $user= $id;
return view('user.profile', array('user' => $user));
});

Route::get('/colores/{id}', function($id)
{
return view('user.colores', array('n' => $id,'color'=>[1=>'rojo',2=>'verde',3=>'azul',4=>'amarillo']));
})->where('id', '[1-4]');

Route::get('/Suma/{a}/{b}', [operaciones::class, 'suma']);
Route::get('/Resta/{a}/{b}', [operaciones::class, 'resta']);
Route::get('/Div/{a}/{b}', [operaciones::class, 'div']);
Route::get('/Mullti/{a}/{b}', [operaciones::class, 'multi']);