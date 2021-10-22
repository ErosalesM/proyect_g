<?php

use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class TipoPagoInsert extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        DB::table('tipo_pago')->insert([
            [
                "id" => 1,
                "nombre_tipo" => 'Efectivo'
            ],
            [
                "id" => 2,
                "nombre_tipo" => 'Pago con Tarjeta'
            ]
        ]);
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        DB::statement("
        
            DELETE FROM tipo_pago 
        
        ");
    }
}
