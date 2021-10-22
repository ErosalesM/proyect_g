<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class Platillos extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('platillos', function (Blueprint $table) {
            $table->id();
            $table->string('nombre_platillo');
            $table->string('descripcion_platillo');
            $table->bigInteger('categoria')->unsigned();
            $table->string('referencia');
            $table->decimal('precio_costo');
            $table->decimal('precio_venta');

            $table->foreign('categoria')->references('id')->on('categorias_comida');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('platillos');
    }
}
