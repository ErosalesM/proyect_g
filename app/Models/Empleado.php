<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Empleado extends Model
{
    use HasFactory;
    protected $table = "empleados";
    protected $fillable = [
        'id_empleados',
        'nombre_empleado',
        'apellido_empleado',
        'telefono',
        'id_puesto',
    ];
    public $timestamps = false;
}
