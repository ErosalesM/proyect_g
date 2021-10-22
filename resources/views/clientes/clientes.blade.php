@extends('layouts.plantillabase')

@section('css')

    {{-- <link href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" rel="stylesheet"> --}}
<link href="https://cdn.datatables.net/1.11.1/css/dataTables.bootstrap.min.css" rel="stylesheet">
@endsection

@section('contenido')
    <section id="mu-about-us">
        <div class="container">

            <a  style="float: left;" class="btn btn-primary" href="/clientes/create" >
                Agregar nuevo Cliente
            </a>

            <div class="mu-title">
                <span class="mu-subtitle">Listado de </span>
                <h2>Clientes</h2>
            </div>

        
            <table id="clientes" class="table table-success table-striped table-bordered text-center">
                <thead>
                    <tr>
                        <th class="text-center" scope="col">Nombres</th>
                        <th class="text-center" scope="col">Apellidos</th>
                        <th class="text-center" scope="col">Telefono</th>
                        <th class="text-center" scope="col">Correo Electrónico</th>
                        <th class="text-center" scope="col">NIT</th>
                        <th class="text-center" scope="col">Acciones</th>
                    </tr>
                </thead>

                <tbody>
                    @foreach ($clientes as $cliente)
                    <tr>
                        <td>{{$cliente->nombre_cliente}} </td>
                        <td>{{$cliente->apellido_cliente}} </td>
                        <td>{{$cliente->telefono}} </td>
                        <td>{{$cliente->correo}} </td>
                        <td>{{$cliente->nit}} </td>
                        <td>
                            <form class="formEliminar"  action=" {{route('clientes.destroy', $cliente->id) }} " method="POST">
                            <a href="/clientes/{{$cliente->id}}/edit" class="btn btn-success" ><i class="bi bi-pencil-square"></i>Editar</a>
                           @csrf
                           @method('DELETE')
                            <button type="submit" class="btn btn-danger"><i class="bi bi-trash-fill"></i>Eliminar</button>
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
                    $('#clientes').DataTable();
                });
            </script>
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
                            confirmButtonText: 'Confirmar'
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
{{-- <div class="modal" tabindex="-1" id="modal-editcliente">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <div class="mu-title">
                    <span class="mu-subtitle">Editar información</span>
                    <h2>del Cliente</h2>
                </div>
            </div>
            <div class="modal-body">
                <form action="/clientes" method="POST">
                @csrf
                    <div class="form-row">
                        <div class="form-group col-md-6">
                            <label for="name" class="text-left">Nombres</label>
                            <input type="text" class="form-control" placeholder="First name">
                            
                        </div>
                        <div class="form-group col-md-6">
                          <label for="name" class="text-left">Apellidos</label>
                          <input type="text" class="form-control" placeholder="Last name">
                          
                      </div>
                      </div>
              <div class="form-row">
                  <div class="form-group col-md-4">
                    <label for="name" class="text-left">Telefono</label>
                    <input type="phone" class="form-control" placeholder="12345678">
                    
                  </div>
                  <div class="form-group col-md-4">
                      <label for="name" class="text-left">Correo Electrónico</label>
                      <input type="email" class="form-control" placeholder="example@outlook.es">
                      
                    </div>
                    <div class="form-group col-md-4">
                      <label for="name" class="text-left">NIT</label>
                      <input type="number" class="form-control" placeholder="1234567">
                      
                    </div>
              </div>              
          </form>    
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
        <button type="button" class="btn btn-primary">Save changes</button>
      </div>
    </div>
  </div>
</div> --}}
{{-- <div class="modal" tabindex="-1" id="modal-nuevocliente">
  <div class="modal-dialog">
      <div class="modal-content">
          <div class="modal-header">
              <div class="mu-title">
                  <span class="mu-subtitle">Agregar información</span>
                  <h2>del Cliente</h2>
              </div>
          </div>
          <div class="modal-body">
              <form action="/clientes" method="POST">
                @csrf
                  <div class="form-row">
                      <div class="form-group col-md-6">
                          <label for="name" class="text-left">Nombres</label>
                          <input type="text" name="nombres" class="form-control" placeholder="First name">
                          
                      </div>
                      <div class="form-group col-md-6">
                        <label for="name" class="text-left">Apellidos</label>
                        <input type="text" name="apellidos" class="form-control" placeholder="Last name">
                        
                    </div>
                    </div>
            <div class="form-row">
                <div class="form-group col-md-4">
                  <label for="name" class="text-left">Telefono</label>
                  <input type="phone" name="telefono" class="form-control" placeholder="12345678">
                  
                </div>
                <div class="form-group col-md-4">
                    <label for="name" class="text-left">Correo Electrónico</label>
                    <input type="email" name="correo" class="form-control" placeholder="example@outlook.es">
                    
                  </div>
                  <div class="form-group col-md-4">
                    <label for="name" class="text-left">NIT</label>
                    <input type="number" name="nit" class="form-control" placeholder="1234567">
                    
                  </div>
            </div>              
        </form>    
    </div>
    <div class="modal-footer">
      <a href="/clientes" class="btn btn-secondary" data-dismiss="modal" tabindex="5">Cancelar</a>
      <button type="submit" class="btn btn-primary" tabindex="4">Ingresar</button>
    </div>
  </div>
</div>
</div> --}}
@endsection

