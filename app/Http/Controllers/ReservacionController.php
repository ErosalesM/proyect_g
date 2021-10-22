<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Reservacion;
use Illuminate\Support\Facades\DB;


class ReservacionController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function __construct(){
        $this->middleware('auth');
    }
    
    public function index()
    {
        $reservaciones = DB::select("SELECT * FROM creservaciones");
        return view('reservaciones.reservacion')->with('reservaciones',$reservaciones);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $mesas = DB::select("SELECT * FROM mesas"); 
        return view('reservaciones.create')->with('mesas',$mesas);;
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $reservaciones = new Reservacion();
        $reservaciones->id_cliente = $request->get('nombre');
        $reservaciones->fecha = $request->get('fecha');
        $reservaciones->hora = $request->get('hora');
        $reservaciones->mesa = $request->get('mesas');
        $reservaciones->numero_personas = $request->get('npersona');
        $reservaciones->descripcion = $request->get('descripcion');
       

        $reservaciones->save();

        return redirect('/reservacion');
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
        $mesas = DB::select("SELECT * FROM mesas");
        $reservacion = Reservacion::find($id);
        return view('reservaciones.edit', compact('mesas', 'reservacion'));
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
        $reservacion = Reservacion::find($id);
        $reservacion->id_cliente = $request->get('nombre');
        $reservacion->fecha = $request->get('fecha');
        $reservacion->hora = $request->get('hora');
        $reservacion->mesa = $request->get('mesas');
        $reservacion->numero_personas = $request->get('npersona');
        $reservacion->descripcion = $request->get('descripcion');
        $reservacion->save();

        return redirect('/reservacion');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $cliente = Reservacion::find($id);
        $cliente->delete();
        return redirect('/reservacion');
    }
}
