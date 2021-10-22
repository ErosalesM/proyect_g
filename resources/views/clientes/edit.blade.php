@extends('layouts.plantillabase')


@section('contenido')
    <section id="mu-about-us">
        <div class="container">
            <div class="mu-title">
                <span class="mu-subtitle">Editar información</span>
                <h2>del Cliente</h2>
            </div>

            <form action="/clientes/{{ $cliente->id }}" method="POST">
                @csrf
                @method('PUT')
                <div class="form-row">
                    <div class="form-group col-md-6">
                        <label for="name" class="text-left">Nombres</label>
                        <input type="text" name="nombres" class="form-control" value="{{ $cliente->nombre_cliente }}">
                    </div>
                    <div class="form-group col-md-6">
                        <label for="name" class="text-left">Apellidos</label>
                        <input type="text" name="apellidos" class="form-control" value="{{ $cliente->apellido_cliente }}">
                    </div>
                </div>
                <div class="form-row">
                    <div class="form-group col-md-4">
                        <label for="name" class="text-left">Telefono</label>
                        <input type="phone" name="telefono" class="form-control" value="{{ $cliente->telefono }}">
                    </div>
                    <div class="form-group col-md-4">
                        <label for="name" class="text-left">Correo Electrónico</label>
                        <input type="email" name="correo" class="form-control" value="{{ $cliente->correo }}">
                    </div>
                    <div class="form-group col-md-4">
                        <label for="name" class="text-left">NIT</label>
                        <input type="text" name="nit" class="form-control" value="{{ $cliente->nit }}">
                    </div>
                </div>
                <div class="form-row">
                    <div class="mb-8 text-right">
                        <a href="/clientes" class="btn btn-danger btncancelar" tabindex="5" type="submit"><i class="bi bi-x-lg"></i> Cancelar<a>
                        <button type="submit" class="btn btn-primary" tabindex="4"><i class="bi bi-pencil-square"></i> Guardar Cambios</button>
                    </div>
                </div>
            </form>      
        </div>
    </section>

@section('js')
<script>
    (function () {
  'use strict'
  //debemos crear la clase formEliminar dentro del form del boton borrar
  //recordar que cada registro a eliminar esta contenido en un form  
  var forms = document.querySelectorAll('.btncancelar')
  Array.prototype.slice.call(forms)
    .forEach(function (form) {
      form.addEventListener('submit', function (event) {        
          event.preventDefault()
          event.stopPropagation()        
          Swal.fire({
                title: '¿Confirma la eliminación del registro?',        
                icon: 'info',
                showCancelButton: true,
                confirmButtonColor: '#20c997',
                cancelButtonColor: '#6c757d',
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

@endsection
