<title>Bistro | MENU</title>
@extends('layouts.plantillabase')

@section('contenido')

<section id="mu-restaurant-menu">
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <div class="mu-restaurant-menu-area">
                    <a class="btn btn-primary" href="/tableplatos">Editar Menú</a>
                    
                    <div class="mu-title">
                        <span class="mu-subtitle">Descubre</span>
                        <h2>NUESTRO MENU</h2>
                    </div>
                    
                    {{-- <div class="dropdown">
                        <button class="btn btn-primary dropdown-toggle" type="button" id="dropdownMenuButton"
                        data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                        Seleccione la Categoría de Platillo a ordenar <i class="bi bi-caret-down-fill"></i>
                    </button>
                    <ul class="dropdown-menu" aria-labelledby="dropdownMenu4">
                        @foreach ($categorias as $categoria)
                        <li role="separator" class="divider"></li>
                        <li><a href="{{ url('view-category/' . $categoria->nombre_categoria) }}">{{ $categoria->nombre_categoria }}
                        </a></li>
                        @endforeach
                    </ul>
                </div> --}}
                

                <div class="btn-group mu-restaurant-menu-category_list " role="group" aria-label="Basic example" id="">
                    <button type="button" class="btn btn-default dropdown-toggle dr-breakout-btn" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                    Buscar  <span class="caret"></span>
                    </button>
                    <ul class="dropdown-menu dr-breakout">
                    <li><a type="button" href="/menu" class="btn btn-warning category_item">Todos los Platillos</a></li>
                    @foreach ($categorias as $categoria)  
                    <li><a type="button" href="{{url('view-category/'.$categoria->nombre_categoria)}}" class="btn btn-warning category_item" >{{$categoria->nombre_categoria}} </a></li>
                    @endforeach
                    </ul>
                </div>

                <div class="mu-restaurant-menu-content">

                    {{-- <button onclick="llamarModal()">Prueba de modal</button> --}}
                            
                            {{-- <ul class="nav nav-tabs mu-restaurant-menu ">
                                <li class="active"><a href="#breakfast" data-toggle="tab">Desayunos</a></li>
                                <li><a type="button"  data-toggle="tab">Almuerzos</a></li>
                                <li><a href="#snacks" data-toggle="tab">Cenas</a></li>
                                <li><a href="#desserts" data-toggle="tab">Especialidades</a></li>
                                <li><a href="#drinks" data-toggle="tab">Bebidas</a></li>
                            </ul> --}}

                            <!-- Tab panes -->
                            <div class="tab-content">
                                <div class="tab-pane fade in active " id="breakfast">
                                    <div class="mu-tab-content-area ">
                                        <div class="row ">
                                            @foreach ($platillos as $platillo)
                                                <div class="col-md-6 ">
                                                    <div class="mu-tab-content-left">
                                                        <ul class="mu-menu-item-nav">
                                                            <li>
                                                                <div class="media">
                                                                    <div class="media-left">
                                                                        <a href="#"> <img src="/imagen/{{ $platillo->referencia }}" width="40px"></a>
                                                                    </div>
                                                                    <div class="media-body">
                                                                        <h4 class="media-heading">
                                                                            <a role="button"
                                                                                onclick="OrdenarPlatillo('{{ url('/menu/platillo') . '/' . $platillo->id }}')"
                                                                                data-toggle="modal"
                                                                                data-target="#ordenModal">{{ $platillo->nombre_platillo }}</a>
                                                                        </h4>
                                                                        <span
                                                                            class="mu-menu-price">Q.{{ $platillo->precio_venta }}</span>
                                                                        <p>{{ $platillo->descripcion_platillo }}</p>
                                                                    </div>
                                                                </div>
                                                            </li>
                                                        </ul>
                                                    </div>
                                                </div>
                                            @endforeach
                                        </div>
                                        {!! $platillos->links() !!}
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        @include('modales.modalplatillo')
        @include('modales.modalordenes')
        @include('modales.modaleditarordenes')
    </section>


@section('js')
    <script src="{{ asset('js/scriptsmine/menu.js') }}"></script>
    <script src="{{ asset('js/scriptsmine/script.js') }}"></script>
    <script>
        (function() {
            'use strict'
            //debemos crear la clase formEliminar dentro del form del boton borrar
            //recordar que cada registro a eliminar esta contenido en un form  
            var forms = document.querySelectorAll('.addplato')
            Array.prototype.slice.call(forms)
                .forEach(function(form) {
                    form.addEventListener('submit', function(event) {
                        event.preventDefault()
                        event.stopPropagation()
                        Swal.fire({
                            position: 'top-end',
                            icon: 'success',
                            title: 'Your work has been saved',
                            showConfirmButton: false,
                            timer: 1500
                        })
                    }, false)
                })
        })()
    </script>
@endsection

@endsection
