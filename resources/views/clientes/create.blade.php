@extends('layouts.plantillabase')


@section('contenido')
    <section id="mu-about-us">
        <div class="container">
          <div class="mu-title">
            <span class="mu-subtitle">Agregar información</span>
            <h2>del Cliente</h2>
        </div>

        <form action ="/clientes" method ="POST">
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
        <div class="form-row" >
            <div class="mb-3 text-right">
              <a href="/clientes" class="btn btn-danger" tabindex="5" ><i class="bi bi-x-lg"></i> Cancelar<a>
              <button type="submit" class="btn btn-primary" tabindex="4"><i class="bi bi-plus-lg"></i> Agregar</button>
            </div>
        </div>
          
          </form>

        </div>
    </section>

        @endsection
