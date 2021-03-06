<?php
session_start();
$mensaje = "Iniciar Sesión";
$link = "index.php";
// IF SESSION IS ON USE NAV otherwise USE NAVBASIC
if ((isset($_SESSION['usuario']) && $_SESSION['usuario'])) {
    header('Location: index.php');
}

?>
<!doctype html>
<!--[if lt IE 7]>      <html class="no-js lt-ie9 lt-ie8 lt-ie7" lang=""> <![endif]-->
<!--[if IE 7]>         <html class="no-js lt-ie9 lt-ie8" lang=""> <![endif]-->
<!--[if IE 8]>         <html class="no-js lt-ie9" lang=""> <![endif]-->
<!--[if gt IE 8]><!-->
<html class="no-js" lang="en">
<!--<![endif]-->

<head>
    <!--====== USEFULL META ======-->
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="Transportation & Agency Template is a simple Smooth transportation and Agency Based Template" />
    <meta name="keywords" content="Portfolio, Agency, Onepage, Html, Business, Blog, Parallax" />

    <!--====== TITLE TAG ======-->
    <title>Crear Cuenta</title>

    <!--====== FAVICON ICON =======-->
    <link rel="shortcut icon" href="img/favicon.ico" type="image/x-icon">
    <link rel="icon" href="img/favicon.ico" type="image/x-icon">

    <!--====== STYLESHEETS ======-->
    <link rel="stylesheet" href="css/normalize.css">
    <link rel="stylesheet" href="css/animate.css">
    <link rel="stylesheet" href="css/stellarnav.min.css">
    <link rel="stylesheet" href="css/owl.carousel.css">
    <link href="css/bootstrap.min.css" rel="stylesheet">
    <link href="css/font-awesome.min.css" rel="stylesheet">

    <!--====== MAIN STYLESHEETS ======-->
    <link href="style.css" rel="stylesheet">
    <link href="css/responsive.css" rel="stylesheet">

    <script src="js/vendor/modernizr-2.8.3.min.js"></script>
    <!--[if lt IE 9]>
        <script src="//oss.maxcdn.com/html5shiv/3.7.2/html5shiv.min.js"></script>
        <script src="//oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
        <![endif]-->
</head>

<body class="home-two">

    <!--[if lt IE 8]>
        <p class="browserupgrade">You are using an <strong>outdated</strong> browser. Please <a href="http://browsehappy.com/">upgrade your browser</a> to improve your experience.</p>
    <![endif]-->

    <?php include "navBasic.php" ?>

    <!--ABOUT AREA-->
    <section class="about-area section-padding">
        <div class="container">
            <div class="row">
                <div class="col-md-12 col-lg-12 col-sm-12 col-xs-12">
                    <div class="quote-form-area wow fadeIn">
                        <h3>Crear una cuenta nueva</h3>
                        <div class="row">
                            <?php
                            if (isset($_SESSION['message']) && $_SESSION['message']) {
                                echo $_SESSION['message'];
                                unset($_SESSION['message']);
                            }
                            ?>
                        </div>
                        <form class="quote-form" action="ActRegistrarUsuario.php" method="post">
                            <p class="width-full">
                                <input required type="text" name="txtRut" id="txtRut" placeholder="RUT" maxlength="20">
                            </p>
                            <p class="width-half">
                                <input required type="text" name="txtNombre" id="txtNombre" placeholder="Nombre" maxlength="45">
                                <input required class="pull-right" type="text" name="txtApellido" id="txtApellido" placeholder="Apellido" maxlength="45">
                            </p>
                            <p class="width-half">
                                <input required type="email" name="txtCorreo" id="txtCorreo" placeholder="Email" maxlength="45">
                                <input required class="pull-right" type="number" name="txtNroTelefonico" id="txtNroTelefonico" placeholder="N° Telefono" maxlength="10">
                            </p>
                            <p class="width-half">
                                <input required type="password" name="txtContrasena" id="txtContrasena" placeholder="Contraseña" maxlength="20">
                                <input required class="pull-right" type="password" name="txtContrasenaConf" id="txtContrasenaConf" placeholder="Confirme Contraseña" maxlength="20">
                            </p>
                            <button type="submit" id="agregar">Registrarse</button>
                    </div>
                </div>

            </div>
        </div>
    </section>


    <!--ABOUT AREA END-->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
    <script>
        $(document).ready(function() {
            var passCorrecto = false;
            $(document).on('click', '#agregar', function(e) {
                return passCorrecto;
                alert("Las contraseñas no coinciden");
            });

            $(document).on('focusout', '#txtContrasenaConf', function(e) {
                var password = $('#txtContrasena').val();
                var passwordConfirm = $('#txtContrasenaConf').val();
                if (password == passwordConfirm) {
                    passCorrecto = true;
                    $('#txtContrasenaConf').css("border", "0 none");
                    $('#txtContrasena').css("border", "0 none");

                } else {
                    $('#txtContrasenaConf').css("border", "1px solid red");
                    $('#txtContrasena').css("border", "1px solid red");

                    alert("Las contraseñas no coinciden");
                }

            });



        });
    </script>


    <!--====== SCRIPTS JS ======-->
    <script src="js/vendor/jquery-1.12.4.min.js"></script>
    <script src="js/vendor/bootstrap.min.js"></script>

    <!--====== PLUGINS JS ======-->
    <script src="js/vendor/jquery.easing.1.3.js"></script>
    <script src="js/vendor/jquery-migrate-1.2.1.min.js"></script>
    <script src="js/vendor/jquery.appear.js"></script>
    <script src="js/owl.carousel.min.js"></script>
    <script src="js/stellar.js"></script>
    <script src="js/wow.min.js"></script>
    <script src="js/stellarnav.min.js"></script>
    <script src="js/contact-form.js"></script>
    <script src="js/jquery.sticky.js"></script>

    <!--===== ACTIVE JS=====-->
    <script src="js/main.js"></script>
</body>

</html>