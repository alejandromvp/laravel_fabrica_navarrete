<?php

namespace App\Models\Seccion_panel;

use Illuminate\Database\Eloquent\Model;

class Categoria extends Model
{
    protected $table = 'categorias';
    protected $primaryKey = 'id_categoria';
    public $timestamps = true;
    protected $fillable = [
        'descripcion'
    ];
}
