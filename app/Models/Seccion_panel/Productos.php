<?php

namespace App\Models\Seccion_panel;

use Illuminate\Database\Eloquent\Model;

class Productos extends Model
{
    protected $table = 'productos';
    protected $primaryKey = 'id_producto';
    public $timestamps = true;
    protected $fillable = [
        'nombre_producto', 'url_img_producto', 'id_categoria', 'stock_productos', 'precio_compra', 'precio_venta'
    ];
}
