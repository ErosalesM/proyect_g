<?php

use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class ProcedureMostrarRecibo extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        DB::unprepared ("
CREATE PROCEDURE mostrar_recibo (idRecibo int)

BEGIN

SELECT 
recibos.id, 
recibos.fecha_recibo, 
concat(clientes.nombre_cliente,' ', clientes.apellido_cliente) as NOMBRES, 
clientes.NIT,
tipo_pago.nombre_tipo,
(SELECT JSON_ARRAYAGG(JSON_OBJECT('platillo', platillos.nombre_platillo, 'cantidad', detalle_pedidos.cantidad,'precio_unitario', platillos.precio_venta, 'total',(detalle_pedidos.cantidad*platillos.precio_venta))) FROM detalle_pedidos JOIN platillos on detalle_pedidos.id_platillo = platillos.id WHERE detalle_pedidos.id_pedido = pedidos.id) orden 
from recibos 
join clientes on recibos.cliente = clientes.id 
join pedidos on recibos.id_pedido = pedidos.id
LEFT JOIN tipo_pago on recibos.tipo_pago = tipo_pago.id

WHERE recibos.id = idRecibo;

END");
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        DB::unprepared("DROP procedure if exist mostrar_recibo");
    }
}
