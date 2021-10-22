<?php

namespace App\Http\Controllers;

use App\Models\Pedido;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;

class PedidoController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $pedidos = DB::select("CALL vista_pedi2()");
        return view('pedidos.pedidos')->with('pedidos',$pedidos);
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
        $sql = 'CALL registrar_pedido(:id_usuario, :id_mesa, :datos_cliente, :lista_platillos)';
        $parametros = array(
            'datos_cliente' => $request->get('post-datosCliente'),
            'id_mesa' => $request->get('post-mesa'),
            'lista_platillos' => $request->get('post-platillos'),
            'id_usuario' => Auth::id()

        );

        $response = DB::select($sql,$parametros);
        return response()->json($response[0]);

    }

    public function pedidoexist($idpedido)
    {
        $sql = 'CALL seleccionar_pedido(:idPedido)';
        $parametros = array(
            'idPedido' => $idpedido
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
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
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
        //
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
