<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Reservacion extends Model
{
    use HasFactory;

    protected $table = "reservaciones";
    protected $fillable = [
        'id_reservacion',
        'id_cliente',
        'fecha',
        'hora',
        'mesa',
        'numero_personas',
        'descripcion',
    ];
    public $timestamps = false;
}
