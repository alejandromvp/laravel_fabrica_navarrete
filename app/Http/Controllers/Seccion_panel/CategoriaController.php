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
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //return $categorias = Categoria::all()->orderBy('created_at', 'DESC');
        return $categorias = DB::select("select * from categorias ORDER BY created_at DESC");
        
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
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

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $validator = Validator::make($request->all(), [
            'descripcion' => 'required|unique:categorias,descripcion'
        ]);

        if ($validator->fails()) {
            return response()->json(['error' => $validator->errors()], 401);
        }
        
        //$categoria = Categoria::find($id);
        $categoria = Categoria::where('id_categoria', $id)->first();
        $categoria->descripcion = $request->descripcion;
        $categoria->updated_at = Carbon::now();
        $categoria->save();
        return $categoria;

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $categoria = Categoria::find($id);
        $categoria->delete();
    }
}
