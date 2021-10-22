<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Schema;

class ProcedureRegistrarPedido extends Migration
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
CREATE PROCEDURE registrar_pedido (id_usuario bigint,id_mesa bigint,datos_cliente text, lista_platillos json)
BEGIN

DECLARE numero_pedido bigint DEFAULT 0;
DECLARE platillo json DEFAULT null;
DECLARE i int DEFAULT 0;
DECLARE idPlato bigint DEFAULT 0;
DECLARE cantidadPlato int DEFAULT 0;
DECLARE cambiosPlato text DEFAULT null;
DECLARE fechaPedido date DEFAULT null;
DECLARE nombreCliente text DEFAULT null;
DECLARE apellidoCliente text DEFAULT null;
DECLARE nitCliente text DEFAULT null;
DECLARE idCliente bigint DEFAULT 0;

DECLARE EXIT HANDLER FOR SQLEXCEPTION
BEGIN SELECT 1 as error; ROLLBACK; END;


START TRANSACTION;

INSERT into pedidos (id_usuario,mesa) VALUES (id_usuario,id_mesa); SELECT LAST_INSERT_ID() into numero_pedido;

WHILE i < JSON_LENGTH(lista_platillos) DO
 
 SELECT JSON_EXTRACT(lista_platillos,CONCAT('$[',i,']')) INTO platillo;
 SELECT JSON_EXTRACT(platillo,'$.id') INTO idPlato;
 SELECT JSON_EXTRACT(platillo,'$.cantidad') INTO cantidadPlato;
 SELECT JSON_EXTRACT(platillo,'$.cambios') INTO cambiosPlato;
 
 INSERT INTO detalle_pedidos (id_pedido, id_platillo,cantidad,cambios) VALUES (numero_pedido, idPlato, cantidadPlato, cambiosPlato);
 
 SELECT i + 1 INTO i;
END WHILE;

SELECT date (now()) INTO fechaPedido;
IF datos_cliente = 'false' THEN

INSERT INTO recibos (fecha_recibo,cliente,id_pedido) VALUES (fechaPedido,1, numero_pedido);
ELSE

SELECT REPLACE(JSON_EXTRACT(datos_cliente,'$.nombre'),'\"','') INTO nombreCliente;
SELECT REPLACE(JSON_EXTRACT(datos_cliente,'$.apellido'),'\"','') INTO apellidoCliente;
SELECT REPLACE(JSON_EXTRACT(datos_cliente,'$.nit'),'\"','') INTO nitCliente;

INSERT INTO clientes (nombre_cliente, apellido_cliente, nit) VALUES (nombreCliente, apellidoCliente, nitCliente);SELECT LAST_INSERT_ID() into idCliente;
INSERT INTO recibos (fecha_recibo,cliente,id_pedido) VALUES (fechaPedido,idCliente, numero_pedido);
end if;

COMMIT;
SELECT numero_pedido as success;

END ");
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        DB::unprepared("DROP procedure if exist registrar_pedido");
    }
}
