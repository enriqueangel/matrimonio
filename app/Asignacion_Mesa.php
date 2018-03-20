<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Asignacion_Mesa extends Model
{
    use SoftDeletes;
    
    protected $table = 'asignacionMesa';

    protected $fillable = ['id', 'hora_inicio', 'hora_finalizacion', 'id_mesa', 'id_camarero'];
    
    protected $dates = ['deleted_at'];
    
    public function mesa(){
        return $this->belongsTo('App\Mesa', 'id', 'id_mesa');
    }

    public function camarero(){
        return $this->belongsTo('App\Camarero', 'id', 'id_camarero');
    }
}
