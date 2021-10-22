<?php

use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class ProcedureMostrarPedidos extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        DB::unprepared
        ("
        CREATE PROCEDURE mostrar_pedido (no_pedido bigint)
        BEGIN

        SELECT 
        pedidos.id, 
        mesas.nombre_mesa,

        (SELECT JSON_ARRAYAGG(JSON_OBJECT('platillo',platillos.nombre_platillo, 'cambios',detalle_pedidos.cambios, 'cantidad', detalle_pedidos.cantidad )) FROM detalle_pedidos JOIN platillos on detalle_pedidos.id_platillo = platillos.id WHERE detalle_pedidos.id_pedido = pedidos.id) orden
        FROM pedidos
        JOIN mesas on pedidos.mesa = mesas.id WHERE pedidos.id = no_pedido;

        END");
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        DB::unprepared("DROP procedure if exist mostrar_pedido");
    }
}
