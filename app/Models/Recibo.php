<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Recibo extends Model
{
    use HasFactory;

    protected $table = "recibos";
    protected $fillable = [
        'fecha_recibo',
        'cliente',
        'id_pedido',
        'tipo_pago',
    ];
    public $timestamps = false;
    
}
