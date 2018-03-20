<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Usuario extends Model
{
    use SoftDeletes;
    
    protected $table = 'usuarios';

    protected $fillable = ['id', 'nombres', 'apellidos', 'dni', 'direccion'];
    
    protected $dates = ['deleted_at'];
    
    public function cliente(){
        return $this->hasOne('App\Cliente', 'id_usuario', 'id');
    }
    
    public function camarero(){
        return $this->hasOne('App\Camarero', 'id_usuario', 'id');
    }
    
    public function invitado(){
        return $this->hasOne('App\Invitado', 'id_usuario', 'id');
    }
}
