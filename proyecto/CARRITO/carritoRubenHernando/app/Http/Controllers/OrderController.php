<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Cart;
use Auth;
use App\Models\Product;
use App\Models\Order;

class OrderController extends Controller
{
        
    
    public function comprar(){
        if (Auth::check()){
            $order=new Order();
        $order->cart=serialize(Cart::content());
        $order->direccion="N/A";
        $order->nombre=Auth::user()->name;
        $order->idUsuario=Auth::user()->id;
        $order->id_pago="N/A";

        Auth::user()->orders()->save($order);
        Cart::destroy();
        return redirect('/productos')->with("success", "Compra realizada");
        }else{
            return redirect()->back()->with("deny","Debes iniciar sesion antes de realizar una compra");
        }
    }
}
