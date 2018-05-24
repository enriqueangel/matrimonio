<?php

use Illuminate\Database\Seeder;

use App\Categoria;

class CategoriaSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Categoria::create([
            'categoria' => 'Vestidos',
        ]);
        
        Categoria::create([
            'categoria' => 'Trajes',
        ]);
        
        Categoria::create([
            'categoria' => 'Flores',
        ]);
        
        Categoria::create([
            'categoria' => 'Anillos',
        ]);
        
        Categoria::create([
            'categoria' => 'Comida',
        ]);
        
        Categoria::create([
            'categoria' => 'Zapatos',
        ]);
        
        Categoria::create([
            'categoria' => 'Mesas',
        ]);
    }
}
