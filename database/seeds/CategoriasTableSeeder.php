<?php

use Illuminate\Database\Seeder;
use App\Models\Seccion_panel\Categoria;

class CategoriasTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Categoria::create([
            'descripcion' => 'ADOQUINES'
        ]);
        Categoria::create([
            'descripcion' => 'BLOQUES'
        ]);
        Categoria::create([
            'descripcion' => 'PANDERETAS'
        ]);
        Categoria::create([
            'descripcion' => 'PASTELONES'
        ]);
        Categoria::create([
            'descripcion' => 'SOLERAS'
        ]);
        Categoria::create([
            'descripcion' => 'BASES DE CASAS'
        ]);
        Categoria::create([
            'descripcion' => 'CÁMARAS ELÉCTRICAS'
        ]);
        Categoria::create([
            'descripcion' => 'CUBREMEDIDOR'
        ]);
        
    }
}
