<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use Redirect;

use App\Producto;
use App\Categoria;

use Laracasts\Flash\Flash;

use App\Http\Requests;
use App\Http\Controllers\Controller;

class Productos extends Controller
{
    
    public function saveImg($img){
        $nombre = pathinfo($img->getClientOriginalName(), PATHINFO_FILENAME);
        $aleatorio = chr(rand(65,90)) . chr(rand(65,90)) . chr(rand(65,90)) . chr(rand(65,90)); 
        $nombrearchivo = "producto".$aleatorio.$nombre.".png";
        \Storage::disk('local')->put($nombrearchivo, \File::get($img)); //Guardo la imagen en el disco local
        return $nombrearchivo;
    }
    
    public function agregarProducto(Request $request){
        // dd($request);
    
        if($request->hasFile('file'))
            $img = $this->saveImg($request->file('file'));
        else
            $img = '';
            
            
        $producto = Producto::create([
            'nombre' => $request->nombre,
            'descripcion' => $request->descripcion,
            'imagen' => '/archivos/'.$img,
            'precio' => $request->precio,
            'id_categoria' => $request->categoria,
        ]);
        
        flash('Producto guardado.')->success();
        return Redirect::route('agregarproducto');
    }
    
    public function productos(){
        $categorias = Categoria::All();
        $productos = Producto::All();
        return view('catalogo')->with('categorias', $categorias)
                ->with('productos', $productos);
    }

    public function catalogo(){
        $categorias = Categoria::All();
        $productos = Producto::All();
        return view('productos/lista')->with('categorias', $categorias)
                ->with('productos', $productos);
    }
    
    public function editarProducto(Request $request){
        // dd($request);   
        if($request->hasFile('file'))
            $img = $this->saveImg($request->file('file'));
        else
            $img = '';
            
        if($request->hasFile('file'))
            $producto = Producto::where('id', $request->id)
                ->update([
                    'nombre' => $request->nombre,
                    'descripcion' => $request->descripcion,
                    'imagen' => '/archivos/'.$img,
                    'precio' => $request->precio,
                    'id_categoria' => $request->categoria,
                ]);
        else
            $producto = Producto::where('id', $request->id)
                ->update([
                    'nombre' => $request->nombre,
                    'descripcion' => $request->descripcion,
                    'precio' => $request->precio,
                    'id_categoria' => $request->categoria,
                ]);
        
        flash('Producto modificado.')->success();
        return Redirect::route('productos');
    }
}
