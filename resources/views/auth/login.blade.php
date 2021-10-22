@extends('layouts.loginbase')

@section('contenido')


    @if (session('status'))
        <div class="mb-4 font-medium text-sm text-green-600">
            {{ session('status') }}
        </div>
    @endif

    <form class="form-signin" method="POST" action="{{ route('login') }}">
        <div class="p-2 mb-2 fondo text-white">
            <img class="mb-4" src="{{ asset('img/bistro.png') }}" alt="" width="300" height="150">
            <h1 class="h3 mb-3 font-weight-normal">Iniciar Sesión</h1>
            @csrf
            <div>
                <x-jet-label for="email" class="sr-only" value="{{ __('Email') }}" />
                <x-jet-input id="email" placeholder="Usuario" class="form-control" type="email" name="email" :value="old('email')" required
                    autofocus />
            </div>

            <div class="mt-4">
                <x-jet-label for="password" class="sr-only" value="{{ __('Password') }}" />
                <x-jet-input id="password" placeholder="Contraseña" class="form-control" type="password" name="password" required
                    autocomplete="current-password" />
            </div>

            <div class="block mt-4">
                <label for="remember_me" class="flex items-center">
                    <x-jet-checkbox id="remember_me" name="remember" />
                    <span class="ml-2 text-sm text-gray-600">{{ __('Remember me') }}</span>
                </label>
            </div>

            <div class="flex items-center justify-end mt-4">
                <x-jet-button class="btn btn-lg btn-success">
                    {{ __('Ingresar') }}
                </x-jet-button>
                <br></br>
                @if (Route::has('password.request'))
                    <a class="underline text-sm text-white" href="{{ route('password.request') }}">
                        {{ __('Forgot your password?') }}
                    </a>

                    <a type="button" class="text-white" href="/registrar">
                        <p class="mt-5 mb-3 text-white" >Registrar nuevo usuario</p>
                      </a>
                @endif

                
            </div>
        </div>
    </form>
@endsection
