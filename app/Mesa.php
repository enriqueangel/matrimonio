<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Mesa extends Model
{
    use SoftDeletes;
    
    protected $table = 'mesas';

    protected $fillable = ['id', 'capacidad', 'numero', 'id_sala'];
    
    protected $dates = ['deleted_at'];
    
    public function sala(){
        return $this->belongsTo('App\Sala', 'id', 'id_sala');
    }
    
    public function asignacion(){
        return $this->hasMany('App\Asignacion_Mesa', 'id_mesa', 'id');
    }
    
    public function invitado(){
        return $this->hasMany('App\Invitado', 'id_mesa', 'id');
    }
}
