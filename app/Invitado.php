<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Invitado extends Model
{
    use SoftDeletes;
    
    protected $table = 'invitados';

    protected $fillable = ['id', 'id_mesa', 'id_usuario', 'id_invitado', 'id_cliente', 'correo'];
    
    protected $dates = ['deleted_at'];
    
    public function mesa(){
        return $this->belongsTo('App\Mesa', 'id', 'id_mesa');
    }
    
    public function usuario(){
        return $this->belongsTo('App\Usuario', 'id', 'id_usuario');
    }
    
    public function cliente(){
        return $this->belongsTo('App\Cliente', 'id', 'id_cliente');
    }
    
    public function regalo(){
        return $this->hasOne('App\Regalos', 'id_invitado', 'id');
    }
}
