<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Camarero extends Model
{
    use SoftDeletes;
    
    protected $table = 'camareros';

    protected $fillable = ['id', 'id_usuario'];
    
    protected $dates = ['deleted_at'];
    
    public function usuario(){
        return $this->belongsTo('App\Usuario', 'id', 'id_usuario');
    }

    public function camarero(){
        return $this->hasMany('App\Asignacion_Mesa', 'id_camarero', 'id');
    }
}
