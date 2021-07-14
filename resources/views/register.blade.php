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
        Logistica
    </title>

    <!-- Bootstrap core CSS -->
     <!--Bootsrap 4 CDN-->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css" integrity="sha384-MCw98/SFnGE8fJT3GXwEOngsV7Zt27NXFoaoApmYm81iuXoPkFOJwJ8ERdknLPMO" crossorigin="anonymous">
    <link rel="stylesheet" type="text/css" href="css/font-awesome.min.css">
    <!--Fontawesome CDN-->
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.3.1/css/all.css" integrity="sha384-mzrmE5qonljUremFsqc01SB46JvROS7bZs3IO2EmfFsd15uHvIt+Y8vEf7N7fWAU" crossorigin="anonymous">
     <link href="css/login.css{{ '?' . time() }}" rel="stylesheet">
</head>
<!-- /.head -->



<body>
    <div class="container" style="margin-bottom: 60px;">
        <div class="d-flex justify-content-center h-100">
            <div class="card card-register">
                <div class="card-header">
                    <h3>Registro</h3>
                    <div class="d-flex justify-content-end social_icon">
                        <a href="{{ url('/') }}"><span title="Regresar a Inicio"><i class="fas fa-home"></i></span></a>
                    </div>
                </div>
                <div class="card-body">
                    <div style="color: white; padding-bottom: 10px;">Su correo electrónico que registre será su usuario para ingresar a la página.</div>
                    <div class="result"></div>
                    @include('form_register')
                </div>
                <div class="card-footer">
                    <div class="d-flex justify-content-center links">
                        ¿Ya estas registrado?<a href="login">Iniciar sesión</a>
                    </div>
                </div>
            </div>
        </div>
    </div>
</body>
<footer>
        <!-- Bootstrap core JavaScript -->
        <script src="js/jquery.min.js"></script>
        <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>
        <script src="js/main.js{{ '?' . time() }}"></script>
</footer>

</html>
