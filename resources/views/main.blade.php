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
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css" integrity="sha384-MCw98/SFnGE8fJT3GXwEOngsV7Zt27NXFoaoApmYm81iuXoPkFOJwJ8ERdknLPMO" crossorigin="anonymous">
    <link href="css/bootstrap-select2.min.css" rel="stylesheet" />
    <link href="css/select2-bootstrap4.min.css" rel="stylesheet">
    <link href="css/sweetalert.css" rel="stylesheet">
    <link rel="stylesheet" type="text/css" href="css/font-awesome.min.css">
    <!--Fontawesome CDN-->
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.3.1/css/all.css" integrity="sha384-mzrmE5qonljUremFsqc01SB46JvROS7bZs3IO2EmfFsd15uHvIt+Y8vEf7N7fWAU" crossorigin="anonymous">
    <link href="css/bootstrap-tables.css{{ '?' . time() }}" rel="stylesheet">
    <link href="css/main_users.css{{ '?' . time() }}" rel="stylesheet">
</head>
<!-- /.head -->
<body>
    <span class="up fa fa-question-circle" data-html="true"  data-toggle="tooltip" data-placement="top" 
                    title="<span style='font-size=25px;'>CHAT DE AYUDA</span>"></span>
    <header>
        <div class="position">
            <nav class="navbar navbar-expand-lg navbar-light bg-light">
              <a class="navbar-brand" href="main">
                AV GROUP
                <img src="images/img-01.png" alt="AV Group" width="50" height="35" pix="100">
              </a>
              <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNavDropdown" aria-controls="navbarNavDropdown" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
              </button>
              <div class="collapse navbar-collapse" id="navbarNavDropdown">
                @if($profile_id == 1 || $profile_id == 3)
                    <ul class="navbar-nav ml-auto">
                        <li class="nav-item dropdown">
                            <a class="nav-link dropdown-toggle" href="#" id="navbarDropdownMenuLink" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                PRODUCTOS
                            </a>
                            <div class="dropdown-menu" aria-labelledby="navbarDropdownMenuLink">
                                <a class="dropdown-item navbar-main" href="user_main/form_product_add">Alta</a>
                                @if($free_pay == 1)
                                    <a class="dropdown-item navbar-main" href="user_main/form_product_update">Actualización</a>
                                    <a class="dropdown-item navbar-main" href="user_main/form_product_delete">Baja</a>
                                    <a class="dropdown-item navbar-main" href="user_main/form_product_active">Re-activar</a>
                                @endif
                            </div>
                        </li>
                        <li class="nav-item dropdown">
                            <a class="nav-link dropdown-toggle" href="#" id="navbarDropdownMenuLink" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                Proveedores
                            </a>
                            <div class="dropdown-menu" aria-labelledby="navbarDropdownMenuLink">
                                <a class="dropdown-item navbar-main" href="user_main/form_provider_add">Alta</a>
                                @if($free_pay == 1)
                                    <a class="dropdown-item navbar-main" href="user_main/form_provider_update">Actualización</a>
                                    <a class="dropdown-item navbar-main" href="user_main/form_provider_delete">Baja</a>
                                    <a class="dropdown-item navbar-main" href="user_main/form_provider_active">Re-activar</a>
                                @endif
                            </div>
                        </li>
                        <li class="nav-item dropdown">
                            <a class="nav-link dropdown-toggle" href="#" id="navbarDropdownMenuLink" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                Clientes
                            </a>
                            <div class="dropdown-menu" aria-labelledby="navbarDropdownMenuLink">
                                <a class="dropdown-item navbar-main" href="user_main/add_customer">Alta</a>
                                @if($free_pay == 1)
                                    <a class="dropdown-item navbar-main" href="user_main/form_customer_update">Actualización</a>
                                    <a class="dropdown-item navbar-main" href="user_main/form_customer_delete">Baja</a>
                                    <a class="dropdown-item navbar-main" href="user_main/form_customer_active">Re-activar</a>
                                @endif
                            </div>
                        </li>
                        @if($profile_id == 1)
                            <li class="nav-item dropdown">
                                <a class="nav-link dropdown-toggle" href="#" id="navbarDropdownMenuLink" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                    Usuarios Empresariales
                                </a>
                                <div class="dropdown-menu" aria-labelledby="navbarDropdownMenuLink">
                                    <a class="dropdown-item navbar-main" href="user_main/form_add_user">Alta</a>
                                </div>
                            </li>
                        @endif
                        @if($profile_id == 3 && $free_pay == 1 && $level == 1)
                            <li class="nav-item dropdown">
                                <a class="nav-link dropdown-toggle" href="#" id="navbarDropdownMenuLink" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                    Usuarios Empleados
                                </a>
                                <div class="dropdown-menu" aria-labelledby="navbarDropdownMenuLink">
                                    <a class="dropdown-item navbar-main" href="user_main/form_add_employed">Alta</a>
                                </div>
                            </li>
                        @endif
                        <li class="nav-item dropdown">
                            <a class="nav-link dropdown-toggle" href="#" id="navbarDropdownMenuLink" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                Envios
                            </a>
                            <div class="dropdown-menu dropdown-menu-right" aria-labelledby="navbarDropdownMenuLink">
                                <a class="dropdown-item navbar-main" href="user_main/form_table_routes">Ver envios</a>
                                <a class="dropdown-item navbar-main" href="user_main/form_add_delivery">Crear envio</a>
                                @if($free_pay == 1)
                                    <a class="dropdown-item navbar-main" href="user_main/form_add_routes">Agregar ruta a envio</a>
                                    <a class="dropdown-item navbar-main" href="user_main/form_active_delivery">Activar envio a ruta de entrega(s)</a>
                                    <a class="dropdown-item navbar-main" href="user_main/form_delivery_location">Localizar envio</a>
                                    <a class="dropdown-item navbar-main" href="user_main/form_routes_update">Actualizar estatus de ruta(s)</a>
                                    <a class="dropdown-item navbar-main" href="user_main/form_delivery_update">Terminar envio</a>
                                @endif
                            </div>
                        </li>
                        @if($free_pay == 1 && $profile_id == 3)
                            <li class="nav-item">
                                <a class="nav-link" href="dashboard">Graficas</a>
                            </li>
                        @endif
                        <li style="padding-top: 5px;">
                            <button class="btn btn-sm btn-outline-secondary session-close" type="button">Cerrar Sesión <i class="fas fa-sign-out-alt"></i></button>
                        </li>
                    </ul>
                @else
                    <ul class="navbar-nav ml-auto">
                        <li class="nav-item dropdown">
                            <a class="nav-link dropdown-toggle" href="#" id="navbarDropdownMenuLink" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                PERFIL
                            </a>
                            <div class="dropdown-menu" aria-labelledby="navbarDropdownMenuLink">
                                <a class="dropdown-item navbar-main" href="user_main/form_update_data">Actualizar mis datos</a>
                                <a class="dropdown-item navbar-main" href="user_main/form_account_delete">Darme de Baja</a>
                                <a class="dropdown-item navbar-main" href="user_main/form_pass_update">Cambiar contraseña</a>
                            </div>
                        </li>
                        <li class="nav-item dropdown">
                            <a class="nav-link dropdown-toggle" href="#" id="navbarDropdownMenuLink" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                Envios
                            </a>
                            <div class="dropdown-menu" aria-labelledby="navbarDropdownMenuLink">
                                <a class="dropdown-item navbar-main" href="user_main/form_table_routes">Ver mis envios</a>
                            </div>
                        </li>
                        <li style="padding-top: 5px;">
                            <button class="btn btn-sm btn-outline-secondary session-close" type="button">Cerrar Sesión <i class="fas fa-sign-out-alt"></i></button>
                        </li>
                    </ul>
                @endif
              </div>
            </nav>
        </div>
        
     </header>
    <!-- /.title -->
    @if($free_pay == 0 && $profile_id == 3)
        <div class="free-pay">
            Esta es una versión de gratuita, si desea comprar dar clic en el siguiente botón
            <button user_id="{{ $id }}" class="main_btn btn pay" style="margin-left: 30px;">Comprar&nbsp;&nbsp;<i class="fab fa-amazon-pay"></i></button>
        </div>
    @endif
    <div class="main-container">
        
        <!-- container -->
        
        @if(isset($dashboard))
            @include('dashboard')
        @else
            @include('form_table_routes')
        @endif
        
        <!-- /.container -->
    </div>
    <!-- Footer -->
    <footer>
        <!-- Bootstrap core JavaScript -->
        <script src="js/jquery.min.js"></script>
        <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>
        <script src="js/bootstrap-select2.min.js"></script>
        <script src="js/sweetalert.min.js"></script>
        <script src="js/jquery-tables.js"></script>
        <script src="js/bootstrap-tables.js"></script>
        <script src="js/bootstrap.bundle.min.js"></script>
        <script src="https://maps.googleapis.com/maps/api/js?&key=AIzaSyAOkgZFyOcxaWgjnApjaYiYY3h8cVzTS8w"></script>
        {{-- <script src="https://maps.googleapis.com/maps/api/js?&key=AIzaSyD-7Doc6MF_l48xiJOjDDwYkRFCiselgpY"></script> --}}
        
        <script src="js/main.js{{ '?' . time() }}"></script>

        <div class="footer">
            <p>AV GROUP Logística {{ date('Y') }}</p>
        </div>

    </footer>
    <!-- /.Footer -->

</body>

</html>
