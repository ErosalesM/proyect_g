@extends('layouts.plantillabase')

@section('css')
    {{-- <link href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" rel="stylesheet"> --}}
    <link href="https://cdn.datatables.net/1.11.1/css/dataTables.bootstrap.min.css" rel="stylesheet">
@endsection
@section('contenido')
<section id="mu-gallery">
    <div class="container">
      <div class="row">
        <div class="col-md-12">
          <div class="mu-gallery-area">
      
            <div class="mu-title">
              <br>
              <span class="mu-subtitle">Listado de</span>
              <h2>Recibos Registrados</h2>

              <table id="tablaplatillos" class="table table-striped table-bordered text-center">
                <thead>
                    <tr>
                        <th class="text-center" scope="col">No.</th>
                        <th class="text-center" scope="col">Fecha</th>
                        <th class="text-center" scope="col">Nombre del Cliente</th>                       
                        <th class="text-center" scope="col">NIT</th>
                        <th class="text-center" scope="col">Tipo Pago</th>
                        <th class="text-center" scope="col">Detalles</th>
                        <th class="text-center" scope="col">Acciones</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($recibos as $recibo)                                          
                    <tr>
                        <td>{{$recibo->id}}</td>
                        <td>{{$recibo->fecha_recibo}}</td>
                        <td>{{$recibo->NOMBRES}}</td>
                        <td>{{$recibo->NIT}}</td>
                        <td>{{$recibo->nombre_tipo}}</td>                   
                        <td><a onclick="DetalleRecibo('{{url('/recibos/detalles').'/'.$recibo->id}}')" role="button" class="btn btn-primary" data-toggle="modal" data-target="#detalleReciboModal">Detalles de recibo</a></td>
                          <td>
                            <a type="button" href="/recibos/{{ $recibo->id }}/edit" class="btn btn-success" data-toggle="modal" data-target="#addtipopago"><i class="bi bi-pencil-square"></i></a>
                                <button type="submit" class="btn btn-danger"><i class="bi bi-trash-fill"></i></button>
                        </td>
                    </tr>
                    @endforeach
                </tbody>
            </table>

            @section('js')
            <script src="{{ asset('js/scriptsmine/recibos.js') }}"></script>
            <script src="https://code.jquery.com/jquery-3.5.1.js"></script>
            <script src="https://cdn.datatables.net/1.11.1/js/jquery.dataTables.min.js"></script>
            <script src="https://cdn.datatables.net/1.11.1/js/dataTables.bootstrap.min.js"></script>
            <script>
                $(document).ready(function() {
                    $('#tablaplatillos').DataTable();
                });
            </script>
            @endsection

            </div>
          </div>
        </div>
      </div>
    </div>
    @include('modales.modaldetrecibo')
    @include('recibos.edit')
</section>

  @endsection