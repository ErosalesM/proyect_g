<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;
use Illuminate\Support\Facades\DB;

class EstadoMesaInsert extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        DB::table('estado_mesa')->insert([
            [
                "id" => 1,
                "nombre_estado" => 'Disponible'
            ],
            [
                "id" => 2,
                "nombre_estado" => 'Ocupada'
            ],
            [
                "id" => 3,
                "nombre_estado" => 'Reservada'
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
        
            DELETE FROM estado_mesa   
        
        ");
    }
}
