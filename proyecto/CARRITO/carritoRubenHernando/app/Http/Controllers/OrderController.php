<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Cart;
use Auth;
use App\Product;
use App\Order;

class OrderController extends Controller
{
    public function grabarCompra(){
        $order=new Order();
        $order->cart=serialize(Cart::content());
        $order->direccion="desconocida";
        $order->nombre=Auth::user()->name();
        $order->idUsuario=Auth::user()->id();
    }
}