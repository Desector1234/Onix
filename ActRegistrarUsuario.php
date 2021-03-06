<?php
session_start();

include_once 'DB/Usuario.php';
include_once 'DB/UsuarioDB.php';


$ok = true;
$message = null;

$usuario = new Usuario();
$usuarioDB = new UsuarioDB();

$txtRut = null;
$txtNombre = null;
$txtApellido = null;
$txtContrasena = null;
$txtCorreo = null;
$txtNroTelefonico = null;
$tipoUsuarioId = null;

if (
    isset($_POST['txtRut']) && isset($_POST['txtNombre']) && isset($_POST['txtApellido'])
    && isset($_POST['txtContrasena']) && isset($_POST['txtCorreo'])
    && isset($_POST['txtNroTelefonico'])
) {
    $txtRut =  $_POST['txtRut'];
    $txtNombre = $_POST['txtNombre'];
    $txtApellido =  $_POST['txtApellido'];
    $txtContrasena =  $_POST['txtContrasena'];;
    $txtCorreo =  $_POST['txtCorreo'];;
    $txtNroTelefonico =  $_POST['txtNroTelefonico'];



    if (($txtRut && $txtNombre && $txtApellido && $txtContrasena &&
        $txtCorreo && $txtNroTelefonico) != "") {
        $usuario->id = 0;
        $usuario->rut = $txtRut;
        $usuario->nombre = $txtNombre;
        $usuario->apellido = $txtApellido;
        $usuario->contrasena = $txtContrasena;
        $usuario->correo = $txtCorreo;
        $usuario->nroTelefonico = $txtNroTelefonico;
        $usuario->tipoUsuario_id = 7; //Cliente normal

        $ok = $usuarioDB->crear($usuario);
    } else {
        $message = "Debe ingresar todos los datos";
        $ok = false;
    }
}


if ($ok) {

    $_SESSION['message'] = '<div class="alert alert-success">
  Usuario Registrado Correctamente
  </div>';
} else {

    $_SESSION['message'] = '<div class="alert alert-danger">No creado</div>';
}

header("Location: IngresarNuevoUsuario.php");
