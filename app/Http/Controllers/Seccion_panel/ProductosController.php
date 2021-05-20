<?php

namespace App\Http\Controllers\Seccion_panel;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Seccion_panel\Productos;
use DB;
use Carbon\Carbon;
use Illuminate\Support\Facades\Validator;

class ProductosController extends Controller
{
    public function index()
    {
         //$productos = Productos::all();
         $productos = DB::table('productos')->leftjoin('categorias', 'productos.id_categoria', '=', 'categorias.id_categoria')
                    ->select('productos.id_producto' ,'productos.nombre_producto', 'productos.url_img_producto', 'categorias.descripcion as categoria_descripcion', 'productos.stock_productos', 'productos.precio_compra', 'productos.precio_venta')
                    ->orderBy('productos.updated_at', 'asc')
                    ->get();
         return $productos;
    }

    public function create()
    {
        //
    }

    public function store(Request $request)
    {
        //
    }

    public function show($id)
    {
      $productos = DB::table('productos')
                 ->where('id_producto', $id)
                 ->get();

      return $productos;
    }


    public function edit($id)
    {
        //
    }

    public function update(Request $request, $id)
    {
        //
    }

    public function destroy($id)
    {
        //
    }
}
