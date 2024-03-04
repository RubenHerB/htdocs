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

public function store(Request $request){
    if($request->post('title')!="" && $request->post('year')!="" && $request->post('director')!=""
    && $request->post('poster')!="" && $request->post('sypnosis')!=""){
    $peli = new Movie;
    $peli->title =$request->post('title');
    $peli->year =$request->post('year');
    $peli->director =$request->post('director');
    $peli->poster =$request->post('poster');
    $peli->synopsis =$request->post('synopsis');

    $peli->save();
    }
    return redirect()->route('catalog');
}
}
