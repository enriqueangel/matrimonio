<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Crypt;

use Auth;
use Session;
use Redirect;

use App\Usuario;
use App\Cliente;

use Laracasts\Flash\Flash;

use App\Http\Requests;
use App\Http\Controllers\Controller;

class Cuenta extends Controller
{
    public function login(Request $request){
        $user = array(
            'correo' => $request->correo,
            'password' => $request->password,
        );
        
        if(Auth::attempt($user, true)){
            $user_data = Auth::user();
            Session::put('id', $user_data->id);
            Session::put('correo', $user_data->correo);
            Session::put('tipo', $user_data->id_tipo);
          
            if($user_data->id_tipo == 1){
                return Redirect::route('principal');
            } elseif($user_data->id_tipo == 2){
                return Redirect::route('principal');
            }
        } else {
            flash('Correo o contraseña erronea.')->error();
            return Redirect::route('login');
        }
    }
    
    public function registro(Request $request){
        $correo = Cliente::where('correo', $request->correo)
            ->first();
            
        $dni = Usuario::where('dni', $request->dni)
            ->first();
        
        if(count($correo) == 0 && count($dni) == 0){
            $usuario = Usuario::create([
                'nombres' => $request->nombre,
                'apellidos' => $request->apellido,
                'dni' => $request->dni,
                'direccion' => $request->direccion,
            ]);
            
            $cliente = Cliente::create([
                'correo' => $request->correo,
                'password' => bcrypt($request->password),
                'id_usuario' => $usuario->id,
                'id_tipo' => 2,
            ]);
            
            flash('Registro creado.')->success();
            return Redirect::route('registro');
            
        } else {
            flash('El correo o DNI ya existe.')->error();
            return Redirect::route('registro');
        }
    }
    
    public function logout(){
        Session::flush();
        Auth::logout();
        return Redirect::route('principal');
    }
}
