<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class MesasAsignadas extends Model
{
    use SoftDeletes;
    
    protected $table = 'asignacionmesas';

    protected $fillable = ['id', 'hora_inicio', 'hora_finalizacion', 'id_mesa', 'id_camarero'];
    
    protected $dates = ['deleted_at'];
}
