<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Categoria; 


/*Los seeders sirven para poblar la base de datos con datos de prueba o ficticios
para comprobar que todo funciona correctamente*/

class CategoriaSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run()
    {
        //Tipos de categoría
        Categoria::create(['nombre' => 'Fuerza']);
        Categoria::create(['nombre' => 'Resistencia']);
        Categoria::create(['nombre' => 'Movilidad']);
        Categoria::create(['nombre' => 'Pliometría']);

    }
}
