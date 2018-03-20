<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Pedido extends Model
{
    use SoftDeletes;
    
    protected $table = 'pedidos';

    protected $fillable = ['id', 'id_producto', 'id_carrito'];
    
    protected $dates = ['deleted_at'];
    
    public function carrito(){
        return $this->belongsTo('App\Carrito', 'id', 'id_carrito');
    }
    
    public function producto(){
        return $this->belongsTo('App\Producto', 'id', 'id_producto');
    }
}
