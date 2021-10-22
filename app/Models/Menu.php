<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Menu extends Model
{
    use HasFactory;

    protected $table = "platillos";
    protected $fillable = ['nombre_platillo', 'descripcion_platillo', 'categoria', 'referencia', 'precio_costo', 'precio_venta',
    ];
    public $timestamps = false;
}
