<?php
session_start();

include_once 'DB/TipoVehiculo.php';
include_once 'DB/TipoVehiculoDB.php';

$tipoVehiculo = new TipoVehiculo();
$TipoVehiculoDB = new TipoVehiculoDB();

$tipoVehiculoLista  = $TipoVehiculoDB->listar();



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
    <title>Rutas</title>

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

    <!--====== STYLESHEETS DATA-TABLE ======-->
    <link href="https://cdn.datatables.net/1.10.20/css/dataTables.material.min.css" rel="stylesheet">
    <link href="https://cdnjs.cloudflare.com/ajax/libs/material-design-lite/1.1.0/material.min.css" rel="stylesheet">

    <!--====== STYLESHEETS DATA-TABLE ======-->
    <script src="https://kit.fontawesome.com/d684b42b31.js" crossorigin="anonymous"></script>



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
    <style>
        body {
            color: black;
        }
    </style>

    <?php include 'nav.php' ?>


    <!--ABOUT AREA-->
    <section class="about-area colorful-bg section-padding">
        <div class="container">
            <div class="row">
                <div class="col-md-12 col-lg-12 col-sm-12 col-xs-12">
                    <div class="quote-form-area wow fadeIn">
                        <div class="row">
                            <div class="col-md-9">
                                <h3>Lista de tipos de vehiculo</h3>
                            </div>
                            <div class="col-md-3">
                                <div class="contact-area">
                                    <form action="IngresarTipoVehiculo.php">
                                        <button class="btn" type="submit"><i class=" fas fa-plus-square"></i> Agregar Tipo</button>
                                    </form>

                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <?php
                            if (isset($_SESSION['message']) && $_SESSION['message']) {
                                echo $_SESSION['message'];
                                unset($_SESSION['message']);
                            }
                            ?>
                        </div>

                        <table id="tbl" class="table" style="width:100%">
                            <thead>
                                <tr>
                                    <th>ID</th>
                                    <th>Nombre</th>
                                    <th>Administrar</th>
                                </tr>
                            </thead>
                            <tbody>

                                <?php
                                foreach ($tipoVehiculoLista as $tv) {

                                ?>
                                    <tr>
                                        <!-- datos de la tabla sacada de la base de datos -->
                                        <td><?php echo $tv->id ?></td>
                                        <td><?php echo $tv->nombre ?></td>
                                        <td>
                                            <a title="Editar" href="EditarTipoVehiculo.php?id=<?php echo $tv->id; ?>" class="btn"><i class="fas fa-edit"></i></a>
                                            <a onclick="deleteItem(<?php echo $tv->id; ?>)" title="Eliminar" class="btn"><i class="fas fa-trash-alt"></i></a>
                                        </td>


                                    </tr>
                                <?php
                                }
                                ?>
                            </tbody>

                        </table>

                    </div>
                </div>

            </div>

        </div>
    </section>
    <!--ABOUT AREA END-->

    <script>
        function deleteItem(id) {
            var ask = window.confirm("¿Está seguro que desea eliminar esto?");
            if (ask) {
                window.location.href = "ActEliminarTipoVehiculo.php?id=" + id;

            }
        }
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
    <!--===== DATA-TABLE=====-->
    <script src="https://cdn.datatables.net/1.10.20/js/jquery.dataTables.min.js"></script>
    <script src="https://cdn.datatables.net/1.10.20/js/dataTables.bootstrap4.min.js"></script>


    <script>
        $(window).on("ready", function() {
            alert();
            $("button").addClass("basicBTN");
        });
        $(document).ready(function() {
            $('#tbl').DataTable({
                "language": {
                    "url": "http://cdn.datatables.net/plug-ins/9dcbecd42ad/i18n/Spanish.json",
                },
                "lengthMenu": [
                    [10, 25, 50, -1],
                    [10, 25, 50, "All"]
                ],
                //ELIMINAR PARA MOSTRAR EL LENGHTMENU
                dom: 'Bfrtip',
                buttons: ['copy', 'excel', 'pdf']

            });

        });
    </script>

    <!--===== DATA-TABLE=====-->
    <script src="https://cdn.datatables.net/1.10.19/js/jquery.dataTables.min.js"></script>
    <script src="https://cdn.datatables.net/buttons/1.5.2/js/dataTables.buttons.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.1.36/pdfmake.min.js"></script>
    <script src="https://cdn.datatables.net/buttons/1.5.2/js/buttons.html5.min.js"></script>

</body>

</html>