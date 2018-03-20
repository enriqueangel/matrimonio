<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Categoria extends Model
{
    use SoftDeletes;
    
    protected $table = 'categorias';

    protected $fillable = ['id', 'catergoria'];
    
    protected $dates = ['deleted_at'];
    
    public function producto(){
        return $this->hasOne('App\Producto', 'id_categoria', 'id');
    }
    
}
