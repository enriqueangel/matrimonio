<?php

use App\Cliente;
use App\Usuario;

$user = Cliente::find(Session::get('id'));
$usuario = Usuario::find($user->id_usuario);

?>

@component('mail::message')
# Regalo

El regalo que debes traer para la boda de {{ $usuario->nombres }} {{ $usuario->apellidos }} es: {{ $regalo }}.
Le corresponde en la mesa {{ $mesa }}

@endcomponent
