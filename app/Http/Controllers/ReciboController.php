<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Models\Recibo;

class ReciboController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $tipos = DB::select("SELECT * FROM tipo_pago");
        $recibos = DB::select("SELECT recibos.id, recibos.fecha_recibo, concat(clientes.nombre_cliente,' ', clientes.apellido_cliente) as NOMBRES, clientes.NIT, tipo_pago.nombre_tipo 
        from recibos 
        join clientes on recibos.cliente = clientes.id 
        join pedidos on recibos.id_pedido = pedidos.id 
        LEFT JOIN tipo_pago on recibos.tipo_pago = tipo_pago.id ORDER BY recibos.id DESC");
        return view('recibos.recibos', compact('tipos','recibos'));
        
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        
    }

    public function detalles($noVenta)
    {
        $sql = 'CALL mostrar_recibo(:idRecibo)';
        $parametros = array(
            'idRecibo' => $noVenta
        );

        $response = DB::select($sql,$parametros);
        return response()->json($response[0]);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $recibo = Recibo::find($id);
        return response()->json($recibo);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $recibo = Recibo::find($id);
        return view('recibos.edit')->with('recibo',$recibo);

    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        // $recibo = Recibo::find($id);

        // $recibo->tipo_pago = $request->get('tipo_pago');
        
        // return redirect('/recibos');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
