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
    <div class="container">
        <div class="d-flex justify-content-center h-100">
            <div class="card">
                <div class="card-header">
                    <h3>Inicio de Sesión</h3>
                    <div class="d-flex justify-content-end social_icon">
                        <a href="{{ url('/') }}"><span title="Regresar a Inicio"><i class="fas fa-home"></i></span></a>
                    </div>
                </div>
                <div class="card-body">
                    <div class="result"></div>
                    <form class="form_login" action="login_access">
                        <div class="input-group form-group">
                            <div class="input-group-prepend">
                                <span class="input-group-text"><i class="fas fa-user"></i></span>
                            </div>
                            <input type="text" class="form-control" name="user" placeholder="USUARIO" required="required">
                            
                        </div>
                        <div class="input-group form-group">
                            <div class="input-group-prepend">
                                <span class="input-group-text"><i class="fas fa-key"></i></span>
                            </div>
                            <input type="password" name="password" class="form-control" placeholder="CONTRASEÑA" required="required">
                        </div>
                        <br>
                        <div class="form-group">
                            <a href="#" class="btn float-right login_btn">Entrar<i style="padding-left:5px;" class="fa fa-send"></i></a>
                        </div>
                    </form>
                </div>
                <div class="card-footer">
                    <div class="d-flex justify-content-center links">
                        ¿No esta registrado?<a href="register">Registrar</a>
                    </div>
                    {{-- <div class="d-flex justify-content-center">
                        <a href="#">¿Olvido su contraseña?</a>
                    </div> --}}
                </div>
            </div>
        </div>
    </div>
</body>
<footer>
        <!-- Bootstrap core JavaScript -->
        <script src="js/jquery.min.js"></script>
        <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>
        <script src="js/login.js{{ '?' . time() }}"></script>
</footer>

</html>
