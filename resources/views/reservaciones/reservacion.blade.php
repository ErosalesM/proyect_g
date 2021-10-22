@extends('layouts.plantillabase')

@section('css')
    {{-- <link href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" rel="stylesheet"> --}}
    <link href="https://cdn.datatables.net/1.11.1/css/dataTables.bootstrap.min.css" rel="stylesheet">
@endsection

@section('contenido')

    <section id="mu-about-us">
        <div class="container">

            <a type="button" style="float: left;" class="btn btn-primary" href="/reservacion/create">
                Agregar nueva Reservación
            </a>

            <div class="mu-title">
                <span class="mu-subtitle">Listado de </span>
                <h2>Reservaciones</h2>
            </div>

            <table id="reservaciones" class="table table-success table-striped table-bordered text-center">
                <thead>
                    <tr>
                        <th class="text-center" scope="col">#</th>
                        <th class="text-center" scope="col">Nombre del cliente</th>
                        <th class="text-center" scope="col">Fecha</th>
                        <th class="text-center" scope="col">Horario</th>
                        <th class="text-center" scope="col">Numero de Personas</th>
                        <th class="text-center" scope="col">Mesa</th>
                        <th class="text-center" scope="col">Descripción</th>
                        <th class="text-center" scope="col">Editar</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($reservaciones as $reservacion)
                        <tr>
                            <th scope="row">{{ $reservacion->id }}</th>
                            <td>{{ $reservacion->Nombre }}</td>
                            <td>{{ $reservacion->fecha }}</td>
                            <td>{{ $reservacion->hora }}</td>
                            <td>{{ $reservacion->numero_personas }}</td>
                            <td>{{ $reservacion->nombre_mesa }}</td>
                            <td>{{ $reservacion->descripcion }}</td>
                            <td>
                                <form class="formEliminar" action="{{ route('reservacion.destroy', $reservacion->id) }}" method="POST">
                                    <a type="button" href="/reservacion/{{ $reservacion->id }}/edit"
                                        class="btn btn-success"><i class="bi bi-pencil-square"></i></a>
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
                    $('#reservaciones').DataTable();
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

{{-- <div class="modal" tabindex="-1" id="modal-reserva">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">

                <div class="mu-title">
                    <span class="mu-subtitle">Editar</span>
                    <h2>Reservación</h2>
                </div>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <form>
                    <div class="form-group col-md-6">
                        <label for="exampleFormControlInput1">Nombres</label>
                        <input type="text" class="form-control" placeholder="Nombre Completo">
                    </div>

                    <div class="form-group col-md-6">
                        <label for="exampleFormControlInput1">Apellidos</label>
                        <input type="text" class="form-control" placeholder="Nombre Completo">
                    </div>

                    <div class="form-group col-md-6">
                        <label for="exampleFormControlInput1">Correo Electrónico</label>
                        <input type="email" class="form-control" placeholder="example@outlook.es">
                    </div>

                    <div class="form-group col-md-6">
                        <label for="exampleFormControlInput1">Número de telefono</label>
                        <input type="tel" class="form-control" placeholder="1234-6789">
                    </div>

                    <div class="form-group col-md-4">
                        <label for="exampleFormControlInput1">Fecha </label>
                        <input type="date" class="form-control" id="datepicker" placeholder="Fecha">
                    </div>
                    <div class="form-group col-md-4">
                        <label for="exampleFormControlInput1">Horario</label>
                        <input type="time" class="form-control" id="datepicker" placeholder="Fecha">
                    </div>

                    <div class="form-group col-md-4">
                        <label for="exampleFormControlInput1">Número de personas</label>
                        <select class="form-control">
                            <option value="0"> </option>
                            <option value="1 ">1 Person</option>
                            <option value="2 ">2 People</option>
                            <option value="3 People">3 People</option>
                            <option value="4 People">4 People</option>
                            <option value="5 People">5 People</option>
                            <option value="6 People">6 People</option>
                            <option value="7 People">7 People</option>
                            <option value="8 People">8 People</option>
                            <option value="9 People">9 People</option>
                            <option value="10 People">10 People</option>
                        </select>
                    </div>

                    <div class="form-group col-md-12">
                        <label for="exampleFormControlInput1">Descripción de la reservación</label>
                        <textarea class="form-control" cols="30" rows="10" placeholder="Descripción"></textarea>
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

<div class="modal" tabindex="-1" id="modal-nuevareserva">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">

                <div class="mu-title">
                    <span class="mu-subtitle">Agregar</span>
                    <h2>Reservación</h2>
                </div>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <form>
                    <div class="form-group col-md-6">
                        <label for="exampleFormControlInput1">Nombres</label>
                        <input type="text" class="form-control" placeholder="Nombre Completo">
                    </div>

                    <div class="form-group col-md-6">
                        <label for="exampleFormControlInput1">Apellidos</label>
                        <input type="text" class="form-control" placeholder="Nombre Completo">
                    </div>

                    <div class="form-group col-md-6">
                        <label for="exampleFormControlInput1">Correo Electrónico</label>
                        <input type="email" class="form-control" placeholder="example@outlook.es">
                    </div>

                    <div class="form-group col-md-6">
                        <label for="exampleFormControlInput1">Número de telefono</label>
                        <input type="tel" class="form-control" placeholder="1234-6789">
                    </div>

                    <div class="form-group col-md-4">
                        <label for="exampleFormControlInput1">Fecha </label>
                        <input type="date" class="form-control" id="datepicker" placeholder="Fecha">
                    </div>
                    <div class="form-group col-md-4">
                        <label for="exampleFormControlInput1">Horario</label>
                        <input type="time" class="form-control" id="datepicker" placeholder="Fecha">
                    </div>

                    <div class="form-group col-md-4">
                        <label for="exampleFormControlInput1">Número de personas</label>
                        <select class="form-control">
                            <option value="0"> </option>
                            <option value="1 Person">1 Person</option>
                            <option value="2 People">2 People</option>
                            <option value="3 People">3 People</option>
                            <option value="4 People">4 People</option>
                            <option value="5 People">5 People</option>
                            <option value="6 People">6 People</option>
                            <option value="7 People">7 People</option>
                            <option value="8 People">8 People</option>
                            <option value="9 People">9 People</option>
                            <option value="10 People">10 People</option>
                        </select>
                    </div>

                    <div class="form-group col-md-12">
                        <label for="exampleFormControlInput1">Descripción de la reservación</label>
                        <textarea class="form-control" cols="30" rows="10" placeholder="Descripción"></textarea>
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

@endsection
