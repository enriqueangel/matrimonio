<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Sala extends Model
{
    use SoftDeletes;
    
    protected $table = 'salas';

    protected $fillable = ['id', 'capacidad'];
    
    protected $dates = ['deleted_at'];
    
    public function cliente(){
        return $this->hasOne('App\Carrito', 'id_sala', 'id');
    }
    
    public function mesa(){
        return $this->hasMany('App\Mesa', 'id_sala', 'id');
    }
}
