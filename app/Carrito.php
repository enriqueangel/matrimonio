<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Carrito extends Model
{
    use SoftDeletes;
    
    protected $table = 'carrito';

    protected $fillable = ['id', 'estado', 'precio', 'id_sala', 'id_cliente'];
    
    protected $dates = ['deleted_at'];
    
    public function sala(){
        return $this->belongsTo('App\Sala', 'id', 'id_sala');
    }
    
    public function cliente(){
        return $this->belongsTo('App\Cliente', 'id', 'id_cliente');
    }
    
    public function pedido(){
        return $this->hasMany('App\Pedido', 'id_carrito', 'id');
    }
}
