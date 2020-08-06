<?php

namespace App\Models\Seccion_panel;

use Illuminate\Database\Eloquent\Model;

class Categoria extends Model
{
    protected $table = 'categorias';
    public $timestamps = true;
    protected $fillable = [
        'descripcion'
    ];
}
