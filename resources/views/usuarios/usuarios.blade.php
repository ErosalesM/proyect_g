@extends('layouts.plantillabase')

@section('css')
    {{-- <link href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" rel="stylesheet"> --}}
    <link href="https://cdn.datatables.net/1.11.1/css/dataTables.bootstrap.min.css" rel="stylesheet">
@endsection

@section('contenido')
    <section id="mu-about-us">
        <div class="container">

            <button type="button" style="float: left;" class="btn btn-secondary" data-toggle="modal"
                data-target="#modal-nuevousuario">
                Agregar nuevo Usuario
            </button>

            <div class="mu-title">
                <span class="mu-subtitle">Listado de </span>
                <h2>Empleados</h2>
            </div>

            <table id="usuarios" class="table table-success table-striped table-bordered text-center">
                <thead>
                    <tr>
                        <th class="text-center" scope="col">#</th>
                        <th class="text-center" scope="col">Nombre del Usuario</th>
                        <th class="text-center" scope="col">Telefono</th>
                        <th class="text-center" scope="col">Puesto</th>
                        <th class="text-center" scope="col">Usuario</th>
                        {{-- <th class="text-center" scope="col">Contraseña</th> --}}
                        <th class="text-center" scope="col">Editar</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($usuarios as $usuario)
                    <tr>
                        <th scope="row">{{$usuario->id}}</th>
                        <td>{{$usuario->NOMBRE}}</td>
                        <td>{{$usuario->telefono}}</td>
                        <td>{{$usuario->nombre_puesto}}</td>
                        <td>{{$usuario->email}}</td>
                        {{-- <td>{{$usuario->password}}</td> --}}
                        <td>
                            <button type="button" class="btn btn-success" data-toggle="modal"
                                data-target="#modal-editusuario"><i class="bi bi-pencil-square"></i></button>
                            <button type="button" class="btn btn-danger"><i class="bi bi-trash-fill"></i></button>
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
                    $('#usuarios').DataTable();
                });
            </script>
        @endsection
    </div>
</section>

<div class="modal" tabindex="-1" id="modal-editusuario">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <div class="mu-title">
                    <span class="mu-subtitle">Editar información</span>
                    <h2>del Usuario</h2>
                </div>
            </div>
            <div class="modal-body">
                <form >
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
                        <div class="form-group col-md-6">
                            <label for="name" class="text-left">Telefono</label>
                            <input type="phone" class="form-control" placeholder="12345678">
                             
                        </div>
                        <div class="form-group col-md-6">
                            <label for="exampleFormControlInput1">Puesto</label>
                            <select class="custom-select form-control">
                              <option value="0"> </option>
                              <option value="1">1 Person</option>
                              <option value="2">2 People</option>
                              <option value="3">3 People</option>
                              <option value="4">4 People</option>
                             </select>  
                      </div>
                      </div>
              <div class="form-row">
                  <div class="form-group col-md-6">
                      <label for="name" class="text-left">Usuario </label>
                      <input type="email" class="form-control" placeholder="example@outlook.es">
                     
                    </div>
                    <div class="form-group col-md-6">
                      <label for="name" class="text-left">Contraseña </label>
                      <input type="password" class="form-control" placeholder="1234567">
                     
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
</div>

<div class="modal" tabindex="-1" id="modal-nuevousuario">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <div class="mu-title">
                    <span class="mu-subtitle">Agregar información</span>
                    <h2>del Usuario</h2>
                </div>
            </div>
            <div class="modal-body">
                <form >
                    <div class="form-row">
                        <div class="form-group col-md-6">
                            <label for="name" class="text-left">Nombres </label>
                            <input type="text" class="form-control" placeholder="First name">
                           
                        </div>
                        <div class="form-group col-md-6">
                          <label for="name" class="text-left">Apellidos </label>
                          <input type="text" class="form-control" placeholder="Last name">
                         
                      </div>
                      </div>
                      <div class="form-row">
                        <div class="form-group col-md-6">
                            <label for="name" class="text-left">Telefono </label>
                            <input type="phone" class="form-control" placeholder="12345678">
                              
                        </div>
                        <div class="form-group col-md-6">
                            <label for="exampleFormControlInput1">Puesto</label>
                            <select class="custom-select form-control">
                              <option value="0"> </option>
                              <option value="1">1 Person</option>
                              <option value="2">2 People</option>
                              <option value="3">3 People</option>
                              <option value="4">4 People</option>
                             </select>  
                      </div>
                      </div>
              <div class="form-row">
                  <div class="form-group col-md-6">
                      <label for="name" class="text-left">Usuario </label>
                      <input type="email" class="form-control" placeholder="example@outlook.es">
                     
                    </div>
                    <div class="form-group col-md-6">
                      <label for="name" class="text-left">Contraseña </label>
                      <input type="password" class="form-control" placeholder="1234567">
                     
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
</div>
@endsection
