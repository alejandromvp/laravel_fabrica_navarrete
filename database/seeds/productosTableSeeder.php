<?php

use Illuminate\Database\Seeder;
use App\Models\Seccion_panel\Productos;

class productosTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Productos::create([
            'nombre_producto' => 'Adocreto Panal',
            'url_img_producto' => 'http://vibradosnavarrete.cl/wp-content/uploads/2019/09/adocreto-panal-1024x768.jpg',
            'id_categoria' => 1,
            'stock_productos'=> 10,
            'precio_compra'=> 14990,
            'precio_venta'=> 22900
        ]);
        Productos::create([
            'nombre_producto' => 'Adocreto Trebol',
            'url_img_producto' => 'http://vibradosnavarrete.cl/wp-content/uploads/2019/09/adocreto-trebol-1024x768.jpg',
            'id_categoria' => 1,
            'stock_productos'=> 10,
            'precio_compra'=> 11200,
            'precio_venta'=> 19500
        ]);
        Productos::create([
            'nombre_producto' => 'Adocreto Recto',
            'url_img_producto' => 'http://vibradosnavarrete.cl/wp-content/uploads/2019/09/adocreto-recto-borde-1024x768.jpg',
            'id_categoria' => 1,
            'stock_productos'=> 10,
            'precio_compra'=> 17990,
            'precio_venta'=> 25900
        ]);
    }
}
