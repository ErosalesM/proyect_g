@extends('layouts.plantillabase')


@section('contenido')
    <section id="mu-gallery">
        <div class="container">
            <button type="button" style="float: left;" class="btn btn-secondary">
                <a class="text-white" href="/recibos">Ver Recibos</a>
            </button>
            <div class="row">
                <div class="col-md-12 misPedidos">
                    <div class="mu-gallery-area">
                        <div class="mu-title">
                            <span class="mu-subtitle">Pedidos</span>
                            <h2>a Preparar</h2>
                        </div>
                        <div class="row" id="pedidoProceso">
                            @foreach ($pedidos as $pedido)
                            <div class="col-md-4">
                            <div class="panel panel-info">
                                <div class="panel-heading">Pedido de Mesa: <label>{{ $pedido->nombre_mesa}}</label></div>
                                <div class="panel-body">
                                  Mesa: <label> {{ $pedido->nombre_mesa}}</label>
                                  <div class="detalles" >
                                  <table class="table table-success text-center table-fixed" >
                                      <thead>
                                      <tr style="width: 315px">
                                          <th class="text-center" style="width: 30px" >Cant. </th>
                                          <th class="text-center" style="width: 130px" >Platillo </th>                                      
                                          <th class="text-center" style="width: 165px" >Cambios</th>
                                      </tr>
                                      </thead>
                                      <tbody >
                                        
                                      @foreach (json_decode($pedido->orden) as $detalle)
                                      <tr style="width: 315px">
                                          <td style="width: 50px">{{$detalle->cantidad}}</td>
                                          <td style="width: 120px">{{$detalle->platillo}}</td>
                                          <td style="width: 150px">{{$detalle->cambios}}</td>
                                      </tr> 
                                      @endforeach
                                    </tbody>
                                  </table>
                                </div>
                                </div>
                                <div class="panel-footer ">
                                    <button type="butyton" class="btn btn-success">Finalizar Pedido </button>
                                    <button type="button" class="btn btn-danger text-right"><i class="bi bi-trash-fill"></i>Eliminar</button>
                                </div>
                            </div>
                            </div>
                            @endforeach
                        </div>
                    </div>
                </div>
            </div>
        </div>

    </section>
    {{-- @section('js')
    <script src="{{ asset('js/scriptsmine/pedido.js') }}"></script>
    @endsection --}}
@endsection
