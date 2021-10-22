@extends('layouts.plantillabase')


@section('contenido')
    <section id="mu-about-us">
        <div class="container">
            <div class="mu-title">
                <span class="mu-subtitle">Agregar nueva</span>
                <h2>Reservación </h2>
            </div>

            <form action="/reservacion" method="POST">
                @csrf
                <div class="row">
                    <div class="form-group col-md-6">
                        <label for="exampleFormControlInput1">Nombres</label>
                        <input type="text" class="form-control" name="nombre" placeholder="Nombre Completo">
                    </div>
                    <div class="form-group col-md-6">
                        <label for="exampleFormControlInput1">Fecha </label>
                        <input type="date" class="form-control" name="fecha" id="datepicker" placeholder="Fecha">
                    </div>
                </div>
                <div class="row">
                    <div class="form-group col-md-6">
                        <label for="exampleFormControlInput1">Horario</label>
                        <input type="time" class="form-control" name="hora"  id="datepicker" placeholder="Fecha">
                    </div>
                    <div class="form-group col-md-6">
                        <label for="exampleFormControlInput1">Numero de personas</label>
                        <input type="number" name="npersona"  class="form-control" >
                    </div>
                </div>
                <div class="row">
                    <div class="form-group col-md-6">
                        <label for="exampleFormControlInput1">Mesa</label>
                        <select name="mesas" class="form-control"> 
                            <option value=" ">Seleccione una opción</option>
                            @foreach ($mesas as $mesa)
                            <option value="{{$mesa->id}}">{{$mesa->nombre_mesa}}</option>                                
                            @endforeach                           
                        </select>
                    </div>
                    <div class="form-group col-md-6">
                        <label for="exampleFormControlInput1">Descripción de la reservación</label>
                        <textarea class="form-control" name="descripcion" placeholder="Descripción"></textarea>
                    </div>
                </div>
                <div class="form-row">
                    <div class="mb-3 text-right">
                        <a href="/reservacion" class="btn btn-danger" tabindex="5"><i class="bi bi-x-lg"></i> Cancelar<a>
                        <button type="submit" class="btn btn-primary" tabindex="4"><i class="bi bi-plus-lg"></i> Ingresar</button>
                    </div>
                </div>
            </form>
    </section>

@endsection
