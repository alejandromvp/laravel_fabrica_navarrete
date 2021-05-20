<?php

namespace App\Http\Controllers\Seccion_panel;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Seccion_panel\Categoria;
use DB;
use Carbon\Carbon;
use Illuminate\Support\Facades\Validator;

class CategoriaController extends Controller
{

    public function index()
    {
        //return $categorias = Categoria::all()->orderBy('created_at', 'DESC');
        return $categorias = DB::select("select * from categorias ORDER BY created_at DESC");
    }

    public function create()
    {
        //
    }

    public function store(Request $request)
    {
        /* $validator = $request->validate([
            'descripcion' => ['required']
        ]); */
        $validator = Validator::make($request->all(), [
            'descripcion' => 'required|unique:categorias,descripcion'
        ]);
        
        if ($validator->fails()) {
            return response()->json(['error' => $validator->errors()], 401);
        }
        $categorias = new Categoria();
        $categorias->descripcion = $request->descripcion;
        $categorias->created_at = Carbon::now();
        $categorias->save();
        return $categorias;
    }


    public function show($id)
    {
        //
    }

    public function edit($id)
    {
        //
    }

    public function update(Request $request, $id)
    {
        $categoria = Categoria::where('id_categoria', $id)->first();
        $categoria->descripcion = $request->descripcion;
        $categoria->updated_at = Carbon::now();
        $categoria->save();
        return $categoria;

    }

    public function destroy($id)
    {
        $categoria = Categoria::find($id);
        $categoria->delete();
        return $categoria;
    }
}
