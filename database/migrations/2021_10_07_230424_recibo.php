<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class Recibo extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('recibos', function (Blueprint $table) {
            $table->id();
            $table->date('fecha_recibo');
            $table->bigInteger('cliente')->unsigned();
            $table->bigInteger('id_pedido')->unsigned();
            $table->bigInteger('tipo_pago')->unsigned()->nullable();

            $table->foreign('cliente')->references('id')->on('clientes');
            $table->foreign('id_pedido')->references('id')->on('pedidos');
            $table->foreign('tipo_pago')->references('id')->on('tipo_pago');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('recibos');
    }
}
