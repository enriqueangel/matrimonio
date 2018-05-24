<?php

namespace App\Http\Controllers;

use Auth;
use Session;
use Redirect;
use Mail;

use App\Mesa;
use App\Camarero;
use App\Usuario;
use App\Invitado;
use App\Carrito;
use App\Regalo;
use App\MesasAsignadas;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Http\Controllers\Sns;

class Mesas extends Controller
{
    public function lista(){
        $mesas = Carrito::join('salas', 'carrito.id_sala', '=', 'salas.id')
            ->join('mesas', 'salas.id', '=', 'mesas.id_sala')
            ->where('carrito.id_cliente', Session::get('id'))
            ->get();
        
        return view('mesas.lista')->with('mesas', $mesas);
    }
    
    public function informacion($id){
        $mesa = Mesa::find($id);
        $invitados = Invitado::join('regalos', 'invitados.id', '=', 'regalos.id_invitado')
            ->join('usuarios', 'invitados.id_usuario', '=', 'usuarios.id')
            ->where('invitados.id_cliente', Session::get('id'))
            ->where('invitados.id_mesa', $id)
            ->get();
            
        $meseros = Camarero::join('usuarios', 'camareros.id_usuario', '=', 'usuarios.id')
            ->join('asignacionmesas', 'camareros.id', '=', 'id_camarero')
            ->where('asignacionmesas.id_mesa', $id)
            ->get();
            
        return view('mesas.informacion')
            ->with('mesa', $mesa)
            ->with('invitados', $invitados)
            ->with('meseros', $meseros);
    }
    
    public function meseros($id){
        $camareros = Camarero::join('usuarios', 'camareros.id_usuario', '=', 'usuarios.id')
	        ->get();
	        
	    return view('mesas.meseros')
	        ->with('meseros', $camareros)
	        ->with('mesa', $id);
    }
    
    public function invitados($id){
        $invitados = Invitado::join('usuarios', 'invitados.id_usuario', '=', 'usuarios.id')
            ->whereNull('invitados.id_mesa')
            ->where('invitados.id_cliente', Session::get('id'))
            ->get();
        return view('mesas.invitados')
            ->with('invitados', $invitados)
            ->with('mesa', $id);
    }
    
    public function acomodarInvitado(Request $request){
        
        Invitado::where('id_usuario', $request->invitado)->update([
            'id_mesa' => $request->mesa
        ]);
        
        $invitado = Invitado::where('id_usuario', $request->invitado)->first();
        $usuario = Usuario::find($request->invitado);
        
        Regalo::create([
            'tipo' => $request->regalo,
            'descripcion' => $request->regalo,
            'id_invitado' => $invitado->id,
        ]);
        
        Mail::to($invitado->correo)->send(new \App\Mail\Regalo($request->regalo, $request->mesa));
        
        return Redirect::route('informacionmesa', $request->mesa);
    }
    
    public function asignarMeseros(Request $request){
        
        foreach ($request->mesero as $mesero) {
            $camarero = Camarero::where('id_usuario', $mesero)->first();
            
            MesasAsignadas::create([
                'hora_inicio' => 'asfasdfas', 
                'hora_finalizacion' => 'asdfasdf',
                'id_mesa' => $request->mesa, 
                'id_camarero' => $camarero->id
            ]);
        }
        
        return Redirect::route('informacionmesa', $request->mesa);
    }
}
