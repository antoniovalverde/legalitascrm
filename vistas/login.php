<?php
	// Seccion Login Usuario
	include_once("./auxiliares/funciones.inc");
?>

<!DOCTYPE html>
<html lang="es">

<head>

    <title>LUMAR CRM - Login</title>

    <!-- Custom fonts for this template-->
    <link href="./libs/fontawesome/css/all.min.css" rel="stylesheet" type="text/css">
    <link
        href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i"
        rel="stylesheet">

    <!-- Custom styles for this template-->
    <link href="./libs/sbadmin/css/sb-admin-2.min.css" rel="stylesheet">

</head>

<body class="bg-gradient-primary">

    <div class="container">

        <!-- Outer Row -->
        <div class="row justify-content-center">

            <div class="col-xl-10 col-lg-12 col-md-9">

                <div class="card o-hidden border-0 shadow-lg my-5">
                    <div class="card-body p-0">
                        <!-- Nested Row within Card Body -->
                        <div class="row">
                            <div class="col-lg-6 d-none d-lg-block bg-login-image"></div>
                            <div class="col-lg-6">
                                <div class="p-5">
                                    <div class="text-center">
                                        <h1 class="h4 text-gray-900 mb-4">Bienvenido!</h1>
                                    </div>
                                    <form class="user" action='' method="POST">
                                        <div class="form-group">
                                            <input type="text" class="form-control form-control-user" name="usuario" id="usuario" aria-describedby="emailHelp" placeholder="Introduzca Usuario"> &nbsp; <?= muestraErrorUsuario($error) ?>
                                        </div>
                                        <div class="form-group">
                                            <input type="password" class="form-control form-control-user" name="password" id="password" placeholder="Introduzca la contraseña"> &nbsp; <?= muestraErrorPassword($error) ?>
                                        </div>
                                        <input type="submit" class="btn btn-primary btn-user btn-block" name="entrar" value="ENTRAR">
                                        <hr>
                                    </form>
                                    <hr>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- Bootstrap core JavaScript-->
    <script src="./libs/jquery/jquery.min.js"></script>
    <script src="./libs/bootstrap/js/bootstrap.bundle.min.js"></script>

    <!-- Custom scripts for all pages-->
    <script src="./libs/sbadmin/js/sb-admin-2.min.js"></script>

</body>

</html>