<!DOCTYPE html>
<html lang="en">
<!-- head -->
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="Proyecto Logistica">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <link rel="shortcut icon" href="images/icon.png">
    <title>
        @section('title')
            Logistica
        @show
    </title>

    <!-- Bootstrap core CSS -->
    <link href="css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" type="text/css" href="css/font-awesome.min.css">
    <link href='https://fonts.googleapis.com/css?family=Open+Sans:300,600|Raleway:600,300|Josefin+Slab:400,700,600italic,600,400italic' rel='stylesheet' type='text/css'>
    <link rel="stylesheet" type="text/css" href="css/slick-team-slider.css{{ '?' . time() }}" />
    <link rel="stylesheet" type="text/css" href="css/style.css{{ '?' . time() }}">
    <link href="css/main.css{{ '?' . time() }}" rel="stylesheet">
</head>
<!-- /.head -->

<body>
    <header>
        @section('header')
            <div class="main-navigation navbar-fixed-top">
                <input type="hidden" id="type_navbar" value="{{ $type_navbar ?? '' }}">
                <nav class="navbar navbar-default">
                    <div class="container">
                        <div class="navbar-header">
                            <button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#myNavbar">
                                <span class="icon-bar"></span>
                                <span class="icon-bar"></span>
                                <span class="icon-bar"></span>
                            </button>
                            <figure>
                               
                            </figure>
                            <a class="navbar-brand" href="{{ url('/') }}">AV Group</a> <img src="images/img-01.png" alt="AV Group" width="50" height="35" pix="100">
                        </div>
                        <div class="collapse navbar-collapse" id="myNavbar">
                            <ul class="nav navbar-nav navbar-right">
                                <li id="index" class="navbar"><a href="{{ url('/') }}">Inicio</a></li>
                                <li id="services" class="navbar"><a href="services">Preguntas frecuentes</a></li>
                                <li id="team" class="navbar"><a href="team">Nuestro equipo</a></li>
                                <li id="contact" class="navbar"><a href="contact">Contacto</a></li>
                            </ul>
                        </div>
                    </div>
                </nav>
            </div>
        @show
    </header>
    <!-- /.title -->
    <div class="main-container">
        @section('container')
            <!-- container -->
            <div id="banner" class="section-padding">
                <div class="container">
                    <div class="row">
                        <div class="jumbotron">
                            <h1 class="small">Bienvenido a <span class="bold">AV Group</span></h1>
                            <p class="big">Software de Gestión de Transporte.</p>
                            <a href="login" class="btn btn-banner">Inicio de sesión<i class="fa fa-send"></i></a>
                            {{-- &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp;
                            <a href="register" class="btn btn-banner">Registro<i class="fa fa-send"></i></a> --}}
                        </div>
                    </div>
                </div>
            </div>
            <!-- /.container -->
        @show 
    </div>
    <!-- Footer -->
    <footer>
        <!-- Bootstrap core JavaScript -->
        <script src="js/jquery.min.js"></script>
        <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>
        <script src="js/main.js{{ '?' . time() }}"></script>

        @section('footer')
            <div class="cta-1">
                <div class="container">
                    <div class="row text-center white">
                        <h1 class="cta-title">Es un movimiento de poder total</h1>
                        <p class="cta-sub-title">Lanza Todo el potencial de tus operaciones con nuestro software de gestión de transporte!!</p>
                    </div>
                </div>
            </div>
        @show
    </footer>
    <!-- /.Footer -->

</body>

</html>
