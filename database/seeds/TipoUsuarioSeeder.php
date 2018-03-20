<?php

use Illuminate\Database\Seeder;

use App\Tipo_Usuario;

class TipoUsuarioSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Tipo_Usuario::create([
            'tipo' => 'admin',
        ]);
        
        Tipo_Usuario::create([
            'tipo' => 'cliente',
        ]);
    }
}
