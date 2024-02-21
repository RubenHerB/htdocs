<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class operaciones extends Controller
{
public function suma(Request $request,  $a, $b)
{
return $a+$b;
}

public function resta(Request $request,  $a, $b)
{
return $a-$b;
}

public function div(Request $request,  $a, $b)
{
return $a/$b;
}

public function mult(Request $request,  $a, $b)
{
return $a*$b;
}


}
