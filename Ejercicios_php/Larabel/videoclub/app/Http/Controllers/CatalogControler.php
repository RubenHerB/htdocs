<?php

namespace App\Http\Controllers;
use Illuminate\Http\Request;
use App\Models\Movie;

class CatalogControler extends Controller
{
    public function getHome(){
    return redirect()->action([CatalogControler::class, 'getIndex']);
    }

    public function getIndex(){
        $arrayPeliculas= Movie::all();
        return view("catalog.index",compact('arrayPeliculas'));
        }
        


        function showProfile($id){

        }


    public function getShow($id)
{
    $arrayPeliculas= Movie::find($id);
return view('catalog.show',array('pelicula'=>$arrayPeliculas));
}

public function getCreate(){
    return view('catalog.create');
}

public function getEdit($id){
    $arrayPeliculas= Movie::find($id);
    return view('catalog.edit',array('pelicula'=>$arrayPeliculas));
    
}

public function store(){
    $peli = new Movie;
    $peli->title = $_REQUEST->post('title');

    $peli->save();
}
}
