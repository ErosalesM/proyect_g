@extends('layouts.plantillabase')

@section('css')
    {{-- <link href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" rel="stylesheet"> --}}
    <link href="https://cdn.datatables.net/1.11.1/css/dataTables.bootstrap.min.css" rel="stylesheet">
@endsection

@section('contenido')
    <section id="mu-about-us">
        <div class="container">
            <div class="dropdown">
                <button class="btn btn-primary dropdown-toggle" type="button" id="dropdownMenuButton" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                  Agregar Nuevo Item   <i class="bi bi-caret-down-fill"></i>
                  </button>
            <ul class="dropdown-menu" aria-labelledby="dropdownMenu4">
                <li role="separator" class="divider"></li>
                <li><a href="{{ route('tableplatos.create') }}">Nuevo Platillo </a></li>
                <li role="separator" class="divider"></li>
                <li><a href="#" data-toggle="modal" data-target="#categoriaModal">Nueva Categoria de Comida</a></li>
                <li role="separator" class="divider"></li>
              </ul>
            </div>
            

            <div class="mu-title">
                <span class="mu-subtitle">Listado de </span>
                <h2>Platillos del Menú</h2>
            </div>

            <table id="tablaplatillos" class="table table-success table-striped table-bordered text-center">
                <thead>
                    <tr>
                        <th class="text-center" scope="col">Nombre del platillo</th>
                        <th class="text-center" scope="col">Descripción</th>
                        <th class="text-center" scope="col">Categoria</th>
                        <th class="text-center" scope="col">Precio Venta</th>
                        <th class="text-center" scope="col">Referencia </th>
                        <th class="text-center" scope="col">Acciones</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($platillos as $platillo)                                          
                    <tr>
                        <td>{{$platillo->nombre_platillo}}</td>
                        <td>{{$platillo->descripcion_platillo}}</td>
                        <td>{{$platillo->nombre_categoria}}</td>
                        <td>{{$platillo->precio_venta}}</td>
                        <td>
                            <img src="/imagen/{{ $platillo->referencia }}" width="60px">
                        </td>
                        <td>
                            <a href="{{ route('tableplatos.edit', $platillo->id)}}"  class="btn btn-success"><i class="bi bi-pencil-square"></i></a>
                            <form  class="formEliminar" action=" {{route('tableplatos.destroy', $platillo->id) }} " method="POST">
                            @csrf
                            @method('DELETE')
                                <button type="submit" class="btn btn-danger"><i class="bi bi-trash-fill"></i></button>
                            </form>
                        </td>
                    </tr>
                    @endforeach
                </tbody>
            </table>

        @section('js')
            <script src="https://code.jquery.com/jquery-3.5.1.js"></script>
            <script src="https://cdn.datatables.net/1.11.1/js/jquery.dataTables.min.js"></script>
            <script src="https://cdn.datatables.net/1.11.1/js/dataTables.bootstrap.min.js"></script>
            <script>
                $(document).ready(function() {
                    $('#tablaplatillos').DataTable();
                });
            </script>
            <script src="{{ asset('js/scriptsmine/recibos.js') }}"></script>

<script>
    (function () {
  'use strict'
  //debemos crear la clase formEliminar dentro del form del boton borrar
  //recordar que cada registro a eliminar esta contenido en un form  
  var forms = document.querySelectorAll('.formEliminar')
  Array.prototype.slice.call(forms)
    .forEach(function (form) {
      form.addEventListener('submit', function (event) {        
          event.preventDefault()
          event.stopPropagation()        
          Swal.fire({
                title: '¿Confirma la eliminación del registro?',        
                icon: 'info',
                showCancelButton: true,
                confirmButtonColor: 'green',
                cancelButtonColor: 'red',
                confirmButtonText: 'Confirmar',
                cancelButtonText: 'Cancelar',
            }).then((result) => {
                if (result.isConfirmed) {
                    this.submit();
                    Swal.fire('¡Eliminado!', 'El registro ha sido eliminado exitosamente.','success');
                }
            })                      
      }, false)
    })
})()
</script>
        @endsection
    </div> 
</section>

@include('modales.modalcategorias')
  
@endsection
