<?php

use App\Cliente;
use App\Usuario;

$user = Cliente::find(Session::get('id'));
$usuario = Usuario::find($user->id_usuario);

?>

@component('mail::message')
# Invitacion

Has sido invitado a la boda de {{ $usuario->nombres }} {{ $usuario->apellidos }}

@endcomponent
