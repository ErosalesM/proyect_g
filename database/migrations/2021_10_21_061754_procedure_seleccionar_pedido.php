<?php

use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class ProcedureSeleccionarPedido extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        DB::unprepared ("
        CREATE PROCEDURE seleccionar_pedido (idPedido int)
BEGIN

SELECT 
pedidos.id, 
mesas.nombre_mesa, 
recibos.tipo_pago, 
(SELECT JSON_ARRAYAGG(JSON_OBJECT('platillo',platillos.nombre_platillo,'precio', platillos.precio_venta, 'imagen', platillos.referencia, 'cambios',detalle_pedidos.cambios, 'cantidad', detalle_pedidos.cantidad )) FROM detalle_pedidos JOIN platillos on detalle_pedidos.id_platillo = platillos.id WHERE detalle_pedidos.id_pedido = pedidos.id) orden
FROM pedidos 
JOIN mesas on pedidos.mesa = mesas.id 
JOIN recibos on pedidos.id = recibos.id_pedido 
WHERE pedidos.id=idPedido AND recibos.tipo_pago IS null;

END
        ");
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        DB::unprepared("DROP procedure if exist seleccionar_pedido");
    }
}
