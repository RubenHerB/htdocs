<?php

namespace App\Http\Controllers;

use App\Models\Product;
use Illuminate\Http\Request;
use Cart;

class CartController extends Controller
{
    public function add(Request $request){
        $producto = Product::find($request->id); 
        if(empty($producto))
            return redirect('/productos');
        Cart::add(
            $producto->id,
            $producto->name,
            1,
            $producto->precio,
            ["image"=>$producto->imagen]
        );
        return redirect()->back()->with("success","Se ha agregado ".$producto->name." al carrito");
    }

    public function checkout(){
        return view('portfolio.checkout');
    }

    public function removeItem(Request $request){
        Cart::remove($request->id);
        return redirect()->back()->with("success","Se han eliminado todos los articulos del carrito");
    }


public function removeOne(Request $request){
    $num=Cart::get($request->id)->qty;
    $num--;
        Cart::update($request->id ,$num);
        return redirect()->back()->with("success","Se ha eliminado el articulo del carrito");
    }


public function clear(){
    Cart::destroy();
    return redirect()->back()->with("success","Se ha eliminado el contenido del carrito");
}
}