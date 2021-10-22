<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;
use Illuminate\Support\Facades\DB;

class PuestosInsert extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        DB::table('puesto')->insert([
            [
                "id" => 1,
                "nombre_puesto" => 'Administrador'
            ],
            [
                "id" => 2,
                "nombre_puesto" => 'Mesero'
            ],
            [
                "id" => 3,
                "nombre_puesto" => 'Cocinero'
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
        
            DELETE FROM puesto   
        
        ");
    }
}
