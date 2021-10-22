<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Cliente extends Model
{
    use HasFactory;

    protected $table = "clientes";
    protected $fillable = [
        'nombre_cliente',
        'apellido_cliente',
        'nit',
        'telefono',
        'correo',
    ];
    public $timestamps = false;
}
