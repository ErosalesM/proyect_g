@extends('layouts.plantillabase')

@section('contenido')
  <!-- Start slider  -->
  <section id="mu-slider">
        <div class="mu-slider-area">

            <!-- Top slider -->
            <div class="mu-top-slider">
                <!-- Top slider single slide -->
                <div class="mu-top-slider-single">
                    <img src="{{asset('img/slider/menu.jpg') }}" alt="img">
                    <!-- Top slider content -->
                    <div class="mu-top-slider-content">
                        <span class="mu-slider-small-title">Área de</span>
                        <h2 class="mu-slider-title">Menu </h2>
                        <p>En esta apartado podrás administrar todo lo relacionado al menú, como platillos, categorías,
                            entre otros</p>
                        <a href="/menu" class="mu-readmore-btn ">Ir a Menu</a>
                    </div>
                    <!-- / Top slider content -->
                </div>
                <!-- / Top slider single slide -->
            </div>
        </div>

        <div class="mu-slider-area">
            <!-- Top slider -->
            <div class="mu-top-slider">
                <!-- Top slider single slide -->
                <div class="mu-top-slider-single">
                    <img src="{{asset('img/slider/reservacion.jpg') }}" alt="img">
                    <!-- Top slider content -->
                    <div class="mu-top-slider-content">
                        <span class="mu-slider-small-title">Área de</span>
                        <h2 class="mu-slider-title">Reservaciones</h2>
                        <p>En el siguiente apartado podrás agregar nuevas reservaciones, editar registros existentes y
                            verificar las fechas en las cuales existen las reservaciones</p>
                        <a href="/reservacion" class="mu-readmore-btn ">Ir a Reservaciones</a>
                    </div>
                    <!-- / Top slider content -->
                </div>
                <!-- / Top slider single slide -->
            </div>
        </div>

        <div class="mu-slider-area">
            <!-- Top slider -->
            <div class="mu-top-slider">
                <!-- Top slider single slide -->
                <div class="mu-top-slider-single">
                    <img src="{{asset('img/slider/ventas.jpg') }}" alt="img">
                    <!-- Top slider content -->
                    <div class="mu-top-slider-content">
                        <span class="mu-slider-small-title">Área de </span>
                        <h2 class="mu-slider-title">Reporte de Ventas</h2>
                        <p>En esta parte podrás ver todo lo relacionado a ventas, consumo de productos, reportes, entre
                            otros</p>
                        <a href="/ventas" class="mu-readmore-btn ">Ir a Reportes</a>
                    </div>
                    <!-- / Top slider content -->
                </div>
                <!-- / Top slider single slide -->
            </div>
        </div>

        <div class="mu-slider-area">
            <!-- Top slider -->
            <div class="mu-top-slider">
                <!-- Top slider single slide -->
                <div class="mu-top-slider-single">
                    <img src="{{asset('img/slider/recibos.jpg') }}" alt="img">
                    <!-- Top slider content -->
                    <div class="mu-top-slider-content">
                        <span class="mu-slider-small-title">Área de</span>
                        <h2 class="mu-slider-title">Recibos</h2>
                        <p>En el siguiente apartado podrás llevar el control de recibos registrados y realizados por
                            partes de los clientes</p>
                        <a href="/pedidos" class="mu-readmore-btn ">Ir a Recibos</a>
                    </div>
                    <!-- / Top slider content -->
                </div>
                <!-- / Top slider single slide -->
            </div>
        </div>

        <div class="mu-slider-area">
            <!-- Top slider -->
            <div class="mu-top-slider">
                <!-- Top slider single slide -->
                <div class="mu-top-slider-single">
                    <img src="{{asset('img/slider/clientes.jpg') }}" alt="img">
                    <!-- Top slider content -->
                    <div class="mu-top-slider-content">
                        <span class="mu-slider-small-title">Bienvenidos a </span>
                        <h2 class="mu-slider-title">Clientes</h2>
                        <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Itaque voluptatem accusamus non
                            quidem, deleniti optio.</p>
                        <a href="/clientes" class="mu-readmore-btn ">Ir a Clientes</a>
                    </div>
                    <!-- / Top slider content -->
                </div>
                <!-- / Top slider single slide -->
            </div>
        </div>

        <div class="mu-slider-area">
            <!-- Top slider -->
            <div class="mu-top-slider">
                <!-- Top slider single slide -->
                <div class="mu-top-slider-single">
                    <img src="{{asset('img/slider/usuarios.jpg') }}" alt="img">
                    <!-- Top slider content -->
                    <div class="mu-top-slider-content">
                        <span class="mu-slider-small-title">Bienvenidos a </span>
                        <h2 class="mu-slider-title">Usuarios</h2>
                        <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Itaque voluptatem accusamus non
                            quidem, deleniti optio.</p>
                        <a href="/usuarios" class="mu-readmore-btn ">Ir a Usuarios</a>
                    </div>
                    <!-- / Top slider content -->
                </div>
                <!-- / Top slider single slide -->
            </div>
        </div>
    </section>
    <!-- End slider  -->

    {{-- <!-- Start Counter Section -->
    <section id="mu-counter">
        <div class="mu-counter-overlay">
            <div class="container">
                <div class="row">
                    <div class="col-md-12">
                        <div class="mu-counter-area">

                            <ul class="mu-counter-nav">

                                <li class="col-md-3 col-sm-3 col-xs-12">
                                    <div class="mu-single-counter">
                                        <span>Fresh</span>
                                        <h3><span class="counter-value" data-count="150">0</span><sup>+</sup></h3>
                                        <p>Breakfast Items</p>
                                    </div>
                                </li>

                                <li class="col-md-3 col-sm-3 col-xs-12">
                                    <div class="mu-single-counter">
                                        <span>Delicious</span>
                                        <h3><span class="counter-value" data-count="60">0</span><sup>+</sup></h3>
                                        <p>Lunch Items</p>
                                    </div>
                                </li>

                                <li class="col-md-3 col-sm-3 col-xs-12">
                                    <div class="mu-single-counter">
                                        <span>Hot</span>
                                        <h3><span class="counter-value" data-count="45">0</span><sup>+</sup></h3>
                                        <p>Coffee Items</p>
                                    </div>
                                </li>

                                <li class="col-md-3 col-sm-3 col-xs-12">
                                    <div class="mu-single-counter">
                                        <span>Satisfied</span>
                                        <h3><span class="counter-value" data-count="6560">0</span><sup>+</sup></h3>
                                        <p>Customers</p>
                                    </div>
                                </li>

                            </ul>

                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section> --}}
    <!-- End Counter Section -->
@endsection