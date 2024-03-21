<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Order extends Model
{
    use HasFactory;
    protected $fillable=["idUsuario","carrito","direccion","nombre","id_pago"];
    public function user(){
        return $this->belongsTo('App\Models\User');
    }
}
