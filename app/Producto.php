<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Producto extends Model
{
    use SoftDeletes;
    
    protected $table = 'productos';

    protected $fillable = ['id', 'nombre', 'descripcion', 'imagen', 'precio', 'id_categoria'];
    
    protected $dates = ['deleted_at'];
    
    public function categoria(){
        return $this->belongsTo('App\Categoria', 'id', 'id_categoria');
    }
}
