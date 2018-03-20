<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Tipo_Usuario extends Model
{
    use SoftDeletes;
    
    protected $table = 'tipoUsuario';

    protected $fillable = ['id', 'tipo'];
    
    protected $dates = ['deleted_at'];
    
    public function cliente(){
        return $this->hasOne('App\Cliente', 'id_tipo', 'id');
    }
}
