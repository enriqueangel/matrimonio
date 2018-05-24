<?php

namespace App\Http\Controllers;

use DateTime;
use Session;
use Redirect;

use App\Usuario;
use App\Carrito;
use App\Sala;
use App\Mesa;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class Pagos extends Controller
{
    public function getObtenerinformacionpago($monto){
        $api_key="4Vj8eK4rloUd272L48hsrarnUA"; // EN produccion UqhF0CaMZv5wv8Oza0dES91wXW
		$user = Session::get('correo');
		
		$total = intval($monto);
	    
        $descripcion= "Compra presupuestada para la boda.";
        $fecha=new DateTime();
// 		date_add($fecha, date_interval_create_from_date_string($horapagar.' hours'));
		$format= $fecha->format('Y-m-d H:m:s');
	
		$codigo						=$format;
		
		$info_pago					=  new \stdClass();
		$info_pago->merchantId		= "508029"; // En produccion 726072
		$info_pago->accountId		= "512321"; // En produccion 730999
		$info_pago->description		= $descripcion;
		$info_pago->referenceCode	= $codigo;
		$info_pago->amount			= $total;
		$info_pago->tax				= "0";
		$info_pago->taxReturnBase	= "0";
		$info_pago->currency		= "COP";
		$info_pago->signature		= md5($api_key."~".$info_pago->merchantId."~".$info_pago->referenceCode."~".$total."~COP");
		$info_pago->test			= "1"; // En produccion 0
		$info_pago->buyerEmail		=  $user;
		$info_pago->responseUrl		= "http://prueba-laravel-enriqeangel.c9users.io/pagos/respuesta/";
		$info_pago->confirmationUrl	= "http://prueba-laravel-enriqeangel.c9users.io/pagos/confirmacion/";
			
		return response()->json($info_pago);
    }
    
    public function compra(Request $request){
    	$productos = json_decode($request->productos);
    	$bandera = 0;
    	// dd($productos);
    	
    	foreach ($productos as $producto) {
    		if($producto->categoria == 7){
    			if($bandera == 0){
    				$sala = Sala::create([
    					'capacidad' => 1,
					]);
    				
    				Carrito::create([
    					'estado' => 'mesas',
    					'precio' => 0,
    					'id_sala' => $sala->id,
    					'id_cliente' => Session::get('id')
					]);
					
					$bandera = 1;
					
					Session::put('estado', 'mesas');
    			}
    			
    			$e = 0;
    			for ($i = 1; $i <= $producto->count; $i++) {
    				$capacidad = 0;
    				$e++;
    				
    				#Mesa #1
    				if($producto->id == 9)
    					$capacidad = 8;
    				
    				#Mesa #2 y #3
    				if($producto->id == 10 || $producto->id == 11)
    					$capacidad = 12;
    				
    				#Mesa #4 y #5
    				if($producto->id == 12 || $producto->id == 13)
    					$capacidad = 10;
    				
    				#Mesa #6
    				if($producto->id == 18)
    					$capacidad = 15;
    				
    				#Mesa #7
    				if($producto->id == 19)
    					$capacidad = 13;
    					
    				
    				 Mesa::create([
    				 	'capacidad' => $capacidad,
    				 	'numero' => $e,
    				 	'id_sala' => $sala->id,
				 	]);
    			}
    			
    		}
    	}
    	
    	if($bandera == 0){
    		$sala = Sala::create([
				'capacidad' => 1,
			]);
			
			Carrito::create([
				'estado' => 'pago',
				'precio' => 0,
				'id_sala' => $sala->id,
				'id_cliente' => Session::get('id')
			]);
    	}
    	
    	Session::flash('aviso', 'Compra aprobada!');
    	return Redirect::route('principal');
    }
}
