@extends('layouts.loginbase')

@section('contenido')
<form class="form-register">
    @csrf
        <div class="p-4 mb-4 fondo text-white">
            <img class="mb-4" src="{{ asset('img/bistro.png') }}" alt="" width="300" height="150">
            <h1 class="h3 mb-3 font-weight-normal">Registrar nuevo usuario</h1>
            <div class="form-row">
                <div class="form-group col-md-6">
                    <label for="name" class="text-left">Nombres</label>
                    <input type="name" name="nombres" class="form-control" placeholder="First name">
                </div>
                <div class="form-group col-md-6">
                    <label for="last name" class="text-left">Apellidos</label>
                    <input type="name" name="apellidos"class="form-control" placeholder="Last name">

                </div>
            </div>
            <div class="form-row">
                <div class="form-group col-md-6">
                    <label for="phone" class="text-left">Teléfono</label>
                    <input type="phone" name="telefono" class="form-control" placeholder="Phone">
                </div>
                <div class="form-group col-md-6">
                    <label for="exampleFormControlInput1">Puesto</label>
                    <select name="puesto" class="form-control">
                        <option value="">Seleccione su puesto </option>
                        <option value="1">Administrador</option>
                        <option value="2">Mesero</option>
                        <option value="3">Cocinero</option>
                    </select>
                </div>
            </div>
            <div class="form-row">
                <div class="form-group col-md-6">
                    <label for="user" class="text-left">Usuario</label>
                    <input type="email" name="correo" class="form-control" placeholder="User">
                </div>
                <div class="form-group col-md-6">
                    <label for="password" class="text-left">Contraseña</label>
                    <input type="password" name="password1" class="form-control" placeholder="Password">
                </div>
            </div>
            <div class="form-row">
                <div class="form-group col-md-6">
                    <label for="user" class="text-left">Confirmar contraseña</label>
                    <input type="password" name="password2" class="form-control" placeholder="Confirm Password">

                </div>
                <div class="col">
                    <label for="user">
                    </label>
                </div>
            </div>
            <div class="form-row">
                <div class="form-group col-md-6">
                    <button class="btn btn-lg btn-success" onclick="registrar_usuario('{{url('registrar/guardar')}}')" type="button">
                        Registrar
                    </button>
                </div>
                <div class="form-group col-md-6">
                    <a href="/" class="btn btn-lg btn-danger text-white" type="button">
                        
                        Cancelar
                    </a>
                </div>
            </div>
        </div>
    </form>
    @endsection