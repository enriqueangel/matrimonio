<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Regalo extends Model
{
    use SoftDeletes;
    
    protected $table = 'regalos';

    protected $fillable = ['id', 'tipo', 'descripcion', 'id_invitado'];
    
    protected $dates = ['deleted_at'];
    
    public function invitado(){
        return $this->hasOne('App\Invitado', 'id_invitado', 'id');
    }
}
