@extends('layouts.plantillabase')


@section('contenido')
    <section id="mu-about-us">
        <div class="container">
            <div class="mu-title">
                <span class="mu-subtitle">Editar</span>
                <h2>Reservación </h2>
            </div>

            <form action="/reservacion/{{$reservacion->id}}" method="POST">
                @csrf
                @method('PUT')
                <div class="row">
                    <div class="form-group col-md-6">
                        <label for="exampleFormControlInput1">Nombres</label>
                        <input type="text" class="form-control" name="nombre" value="{{$reservacion->id_cliente}}" placeholder="Nombre Completo">
                    </div>

                    <div class="form-group col-md-6">
                        <label for="exampleFormControlInput1">Fecha </label>
                        <input type="date" class="form-control" name="fecha" value="{{$reservacion->fecha}}"  id="datepicker" placeholder="Fecha">
                    </div>
                </div>
                <div class="row">
                    <div class="form-group col-md-6">
                        <label for="exampleFormControlInput1">Horario</label>
                        <input type="time" class="form-control" name="hora" value="{{$reservacion->hora}}" id="datepicker" placeholder="Fecha">
                    </div>

                    <div class="form-group col-md-6">
                        <label for="exampleFormControlInput1">Numero de personas</label>
                        <input type="number" name="npersona" value="{{$reservacion->numero_personas}}" class="form-control" placeholder="1 ...">
                    </div>
                </div>
                <div class="row">
                    <div class="form-group col-md-6">
                        <label for="exampleFormControlInput1">Mesa</label>
                        <select name="mesas"  class="custom-select form-control">
                            <option value="{{$reservacion->mesa}}">Seleccionar</option>
                            @foreach ($mesas as $mesa)
                            <option value="{{$mesa->id}}">{{$mesa->nombre_mesa}}</option>                                
                            @endforeach 
                        </select>
                    </div>
                    <div class="form-group col-md-6">
                        <label for="exampleFormControlInput1">Descripción de la reservación</label>
                        <textarea class="form-control" name="descripcion" placeholder="Descripción">{{$reservacion->descripcion}}</textarea>
                    </div>
                </div>
                <div class="form-row">
                    <div class="mb-3 text-right">
                        <a href="/reservacion" class="btn btn-danger" tabindex="5"><i class="bi bi-x-lg"></i> Cancelar<a>
                        <button type="submit" class="btn btn-primary" tabindex="4"><i class="bi bi-pencil-square"></i> Guardar Cambios</button>
                    </div>
                </div>

            </form>

    </section>

@endsection
