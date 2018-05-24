<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use Session;
use Redirect;

use App\Usuario;
use App\Invitado;
use App\Camarero;

use Mail;
use Laracasts\Flash\Flash;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use App\Http\Controllers\Sns;

class Gestion extends Controller
{
    public function agregarInvitado(Request $request){
        if($request->id == 0){
            $dni = Usuario::where('dni', $request->dni)
                ->first();
                
            if(count($dni) == 0){
                $usuario = Usuario::create([
                    'nombres' => $request->nombre,
                    'apellidos' => $request->apellido,
                    'dni' => $request->dni,
                    'direccion' => $request->direccion,
                ]);
                
                $invitado = Invitado::create([
                    'correo' => $request->correo,
                    'id_usuario' => $usuario->id,
                    'id_cliente' => Session::get('id'),
                ]);
                
                Mail::to($request->correo)->send(new \App\Mail\Invitacion());
                
                flash('Invitado agregado')->success();
                return Redirect::route('agregarinvitado');
            } else {
                flash('El DNI ya existe.')->error();
                return Redirect::route('agregarinvitado');
            }
        } else {
            Usuario::where('id', $request->id)
                ->update([
                    'nombres' => $request->nombre,
                    'apellidos' => $request->apellido,
                    'dni' => $request->dni,
                    'direccion' => $request->direccion,
                ]);
                
            flash('Invitado modificado')->success();
            return Redirect::route('invitados');
        }
    }
    
    
    public function agregarCamarero(Request $request){
        if($request->id == 0){
            $dni = Usuario::where('dni', $request->dni)
                ->first();
                
            if(count($dni) == 0){
                $usuario = Usuario::create([
                    'nombres' => $request->nombre,
                    'apellidos' => $request->apellido,
                    'dni' => $request->dni,
                    'direccion' => $request->direccion,
                ]);
                
                $camarero = Camarero::create([
                    'id_usuario' => $usuario->id,
                ]);
                
                flash('Camarero agregado')->success();
                return Redirect::route('agregarmesero');
            } else {
                flash('El DNI ya existe.')->error();
                return Redirect::route('agregarmesero');
            }
        } else {
            Usuario::where('id', $request->id)
                ->update([
                    'nombres' => $request->nombre,
                    'apellidos' => $request->apellido,
                    'dni' => $request->dni,
                    'direccion' => $request->direccion,
                ]);
                
            flash('Camarero modificado')->success();
            return Redirect::route('agregarmesero');
        }
    }
    
    public function borrarInvitado($id){
        
    }
    
    public function borrarMesero($id){
        
    }
}
