<?php
include_once 'DB/TipoUsuarioDB.php';

//session_start();
//if (!isset($_SESSION['admin'])) {

$tipousuarioDB = new TipoUsuarioDB();

$id = 0;

if (isset($_GET["id"])) {
    $id = $_GET["id"];
}

$ok = $tipousuarioDB->eliminar($id);

if ($ok) {
    $_SESSION['message'] = '<div class="alert alert-success">Eliminado correctamente</div>';
} else {
    $_SESSION['message'] = '<div class="alert alert-danger">Error al eliminar</div>';
}

header("Location: listarTipoUsuario.php");
