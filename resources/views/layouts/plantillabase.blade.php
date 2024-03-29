<!DOCTYPE html>
<html lang="es-en">

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Bistro | INICIO</title>

    <!-- Favicon -->


    <link rel="shortcut icon" href="{{ asset('img/favicon.ico') }}" type="image/x-icon">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.5.0/font/bootstrap-icons.css">
    <!-- Font awesome -->
    <link href="{{ asset('css/font-awesome.css') }}" rel="stylesheet">
    <!-- Bootstrap -->
    <link href="{{ asset('css/bootstrap.css') }}" rel="stylesheet">
    <!-- Slick slider -->
    <link rel="stylesheet" type="text/css" href="{{ asset('css/slick.css') }}">
    <!-- Date Picker -->
    <link rel="stylesheet" type="text/css" href="{{ asset('css/bootstrap-datepicker.css') }} ">
    <!-- Gallery Lightbox -->
    <link href="{{ asset('css/magnific-popup.css') }}" rel="stylesheet">
    <!-- Theme color -->
    <link id="switcher" href=" {{ asset('css/theme-color/default-theme.css') }}" rel="stylesheet">

    <!-- Main style sheet -->
    <link href="{{ asset('css/style.css') }}" rel="stylesheet">
    @yield('css')

    <!-- Google Fonts -->

    <!-- Prata for body  -->
    <link href='https://fonts.googleapis.com/css?family=Prata' rel='stylesheet' type='text/css'>
    <!-- Tangerine for small title -->
    <link href='https://fonts.googleapis.com/css?family=Tangerine' rel='stylesheet' type='text/css'>
    <!-- Open Sans for title -->
    <link href='https://fonts.googleapis.com/css?family=Open+Sans' rel='stylesheet' type='text/css'>


    <!-- HTML5 shim and Respond.js for IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
      <script src="https://oss.maxcdn.com/html5shiv/3.7.2/html5shiv.min.js"></script>
      <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
    <![endif]-->

</head>

<body>
    <!--START SCROLL TOP BUTTON -->
    <a class="scrollToTop" href="#">
        <i class="fa fa-angle-up"></i>
    </a>
    <!-- END SCROLL TOP BUTTON -->

    <!-- Start header section -->
    <header id="mu-header">
        <nav class="navbar navbar-default mu-main-navbar" role="navigation">
            <div class="container">
                <div class="navbar-header">
                    <!-- FOR MOBILE VIEW COLLAPSED BUTTON -->
                    <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#navbar"
                        aria-expanded="false" aria-controls="navbar">
                        <span class="sr-only">Toggle navigation</span>
                        <span class="icon-bar"></span>
                        <span class="icon-bar"></span>
                        <span class="icon-bar"></span>
                        
                    </button>

                    <!-- LOGO -->

                    <!--  Text based logo  -->
                    <!-- <a class="navbar-brand" href="inicio.html">Bistro<span>Ristorante</span></a> -->

                    <!--  Image based logo  -->
                    <a class="navbar-brand" href="/inicio"><img src="{{ asset('img/bistro.png') }}"
                            alt="Logo img"></a>

                </div>
                <div id="navbar" class="navbar-collapse collapse">
                    
                    <ul id="top-menu" class="nav navbar-nav navbar-right mu-main-nav">
                        <li><a  onclick="llamarModal()" class="btn"><i class="bi bi-cart-fill"></i> Mis pedidos <span style="margin-left: 4px" class="label label-danger pull-right pedido-notificacion"></span></a></li>
                        <li><a href="/inicio">INICIO</a></li>
                        <li><a href="/menu">MENU</a></li>
                        <li><a href="/reservacion">RESERVACIONES</a></li>
                        <li><a href="pedidos">PEDIDOS</a></li>
                        <li><a href="ventas">REPORTE DE VENTAS</a></li>
                        <li><a href="clientes">CLIENTES</a></li>
                        <li><a href="usuarios">USUARIOS</a></li>
                    </ul>
                        

                </div>
                <!--/.nav-collapse -->
               
            </div>
        </nav>
    </header>
    <!-- End header section -->
    @yield('contenido')


    <!-- Start Footer -->
    <footer id="mu-footer">
        <div class="container">
            <div class="row">
                <div class="col-md-12">
                    <div class="mu-footer-area">
                        <div class="mu-footer-social">
                            <a href="#"><span class="fa fa-facebook"></span></a>
                            <a href="#"><span class="fa fa-twitter"></span></a>
                            <a href="#"><span class="fa fa-google-plus"></span></a>
                            <a href="#"><span class="fa fa-linkedin"></span></a>
                            <a href="#"><span class="fa fa-youtube"></span></a>
                        </div>
                        <div class="mu-footer-copyright">
                            <p>&copy; Copyright <a rel="nofollow" href="http://markups.io">markups.io</a>. All right
                                reserved.</p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </footer>
    <!-- End Footer -->



    <!-- jQuery library -->
    <script src="{{ asset('js/jquery.min.js') }} "></script>
    <!-- Include all compiled plugins (below), or include individual files as needed -->
    <script src="{{ asset('js/bootstrap.js') }}"></script>

    <script src="//cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    <!-- Slick slider -->
    <script type="text/javascript" src="{{ asset('js/slick.js') }}"></script>
    <!-- Counter -->
    <script type="text/javascript" src="{{ asset('js/simple-animated-counter.js') }}"></script>
    <!-- Gallery Lightbox -->
    <script type="text/javascript" src="{{ asset('js/jquery.magnific-popup.min.js') }}"></script>
    <!-- Date Picker -->
    <script type="text/javascript" src="{{ asset('js/bootstrap-datepicker.js') }}"></script>
    <!-- Ajax contact form  -->
    <script type="text/javascript" src="{{ asset('js/app.js') }}"></script>

    <script src="{{ asset('js/scriptsmine/usuarios.js') }}"></script>
    
    

    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.0.0/jquery.min.js"
        integrity="sha384-THPy051/pYDQGanwU6poAc/hOdQxjnOEXzbT+OuUAFqNqFjL+4IGLBgCJC3ZOShY" crossorigin="anonymous">
    </script>

    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"
        integrity="sha384-Tc5IQib027qvyjSMfHjOMaLkfuWVxZxUPnCJA7l2mCWNIpG9mGCD8wGNIcPD7Txa" crossorigin="anonymous">
    </script>
    <!-- Custom js -->
    <script src="{{ asset('js/custom.js') }}"></script>
    <script src="{{ asset('js/scriptsmine/modal.js') }}"></script>
    {{-- <script src="{{ asset('js/scriptsmine/menu.js') }}"></script> --}}
    @yield('js')
    
</body>

</html>
