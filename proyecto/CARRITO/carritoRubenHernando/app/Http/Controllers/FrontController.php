<?php

namespace App\Http\Controllers;

use App\Models\Product;
use Illuminate\Http\Request;

class FrontController extends Controller
{
    public function productos(){
        $products = Product::all();
        return view('portfolio.productos',compact('products'));
    }
}
