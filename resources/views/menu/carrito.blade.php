@extends('layouts.plantillabase')

@section('css')
    <link href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" rel="stylesheet">
    <link href="https://cdn.datatables.net/1.11.1/css/dataTables.bootstrap.min.css" rel="stylesheet">
@endsection

@section('contenido')
    <section id="mu-about-us">
        <div class="container">
            <a  class="btn btn-primary" href="{{ route('tableplatos.create') }}">Agregar nuevo Platillo </a>

            <div class="mu-title">
                <span class="mu-subtitle">Listado de </span>
                <h2>Pedidos</h2>
            </div>

            <table id="tablaplatillos" class="table table-success table-striped table-bordered text-center">
                <thead>
                    <tr>
                        <th class="text-center" scope="col">#</th>
                        <th class="text-center" scope="col">Nombre del platillo</th>
                        <th class="text-center" scope="col">Descripción</th>
                        <th class="text-center" scope="col">Cantidad</th>
                    </tr>
                </thead>
                <tbody class="tbody">
                    
                </tbody>
            </table>

        @section('js')
            
            <script src="https://code.jquery.com/jquery-3.5.1.js"></script>
            <script src="{{ asset('js/scriptsmine/script.js') }}"></script>
            
        @endsection
    
</section>



@endsection
