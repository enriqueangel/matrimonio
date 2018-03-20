<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Crypt;

use App\Usuario;
use App\Cliente;

class UsuarioSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $usuario = Usuario::create([
            'nombres' => 'enrique',
            'apellidos' => 'angel',
            'dni' => '123456',
            'direccion' => 'asdfasdf',
        ]);
        
        Cliente::create([
            'correo' => 'enriqe.angel.596@gmail.com',
            'password' => bcrypt('123456'),
            'id_usuario' => $usuario->id,
            'id_tipo' => 1,
        ]);
        
        $usuario2 = Usuario::create([
            'nombres' => 'enrique',
            'apellidos' => 'londoño',
            'dni' => '1234567',
            'direccion' => 'asdfasdf',
        ]);
        
        Cliente::create([
            'correo' => 'enriqe@gmail.com',
            'password' => bcrypt('123456'),
            'id_usuario' => $usuario2->id,
            'id_tipo' => 2,
        ]);
    }
}
