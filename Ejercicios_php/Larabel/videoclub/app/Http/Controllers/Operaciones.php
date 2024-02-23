<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class operaciones extends Controller
{
public function suma( $a, $b)
{
    return view("Suma.php",array("suma"=>($a+$b)));
}

public function resta(Request $request,  $a, $b)
{
echo $a-$b;
}

public function div(Request $request,  $a, $b)
{
echo $a/$b;
}

public function mult(Request $request,  $a, $b)
{
echo $a*$b;
}

}