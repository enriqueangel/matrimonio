<?php

namespace App;

use Illuminate\Auth\Authenticatable;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Auth\Passwords\CanResetPassword;
use Illuminate\Foundation\Auth\Access\Authorizable;
use Illuminate\Contracts\Auth\Authenticatable as AuthenticatableContract;
use Illuminate\Contracts\Auth\Access\Authorizable as AuthorizableContract;
use Illuminate\Contracts\Auth\CanResetPassword as CanResetPasswordContract;

class Cliente extends Model  implements AuthenticatableContract, AuthorizableContract, CanResetPasswordContract
{
    use Authenticatable, Authorizable, CanResetPassword, SoftDeletes;
    
    protected $table = 'clientes';

    protected $fillable = ['id', 'correo', 'id_usuario', 'id_tipo', 'password'];
    
    protected $hidden = ['password', 'remember_token'];
    
    protected $dates = ['deleted_at'];
    
    public function tipoUsuario(){
        return $this->belongsTo('App\Tipo_Usuario', 'id', 'id_tipo');
    }
    
    public function usuario(){
        return $this->belongsTo('App\Usuario', 'id', 'id_usuario');
    }
    
    public function carrito(){
        return $this->hasMany('App\Carrito', 'id_cliente', 'id');
    }
    
    public function invitado(){
        return $this->hasMany('App\Invitado', 'id_cliente', 'id');
    }
}
