<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use Auth;
use Session;
use Redirect;

use App\Categoria;
use App\Producto;

use Laracasts\Flash\Flash;

use App\Http\Requests;
use App\Http\Controllers\Controller;

class Principal extends Controller
{
    public function principal(){
        $categorias = Categoria::All();
        $productos = Producto::All();
        return view('principal')->with('categorias', $categorias)
                ->with('productos', $productos);
    }
}
