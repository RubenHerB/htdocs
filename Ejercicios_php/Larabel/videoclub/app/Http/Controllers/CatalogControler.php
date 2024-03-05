<?php

namespace App\Http\Controllers;
use Illuminate\Http\Request;
use App\Models\Movie;
use App\Http\Middleware\VerifyCsrfToken;

class CatalogControler extends Controller
{
    public function getHome(){
        return redirect()->action([CatalogControler::class, 'getIndex']);
    }

    public function getIndex(){
        $arrayPeliculas= Movie::all();
        return view("catalog.index",compact('arrayPeliculas'));
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
        && $request->post('poster')!="" && $request->post('synopsis')!=""){
            $peli = new Movie;
            $peli->title =$request->post('title');
            $peli->year =$request->post('year');
            $peli->director =$request->post('director');
            $peli->poster =$request->post('poster');
            $peli->synopsis =$request->post('synopsis');
            $peli->save();
        }
        return redirect()->route('catalog.store')->with('success','La pelicula se ha grabado');
    }

    public function actualizar(Request $request,$id){
        if($request->post('title')!="" && $request->post('year')!="" && $request->post('director')!=""
        && $request->post('poster')!="" && $request->post('synopsis')!=""){
            $peli = Movie::find($id);
            $peli->title =$request->post('title');
            $peli->year =$request->post('year');
            $peli->director =$request->post('director');
            $peli->poster =$request->post('poster');
            $peli->synopsis =$request->post('synopsis');
            $peli->update();
        }
        return redirect()->route('catalog.update',$id)->with('success','La pelicula se ha actualizado');
    }

//Siguiente ejercicio
public function showProfile($id){

}

}
