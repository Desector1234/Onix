<?php
include_once 'DB/UsuarioDB.php';

//session_start();
//if (!isset($_SESSION['admin'])) {

$usuarioDB = new UsuarioDB();

$id = 0;

if (isset($_GET["id"])) {
    $id = $_GET["id"];
}

$ok = $usuarioDB->eliminar($id);
if ($ok) {
    echo "eliminado";
    // header("Location: eventos.php");
} else {
    echo "no eliminado";
    // header("Location: ver.php?id=" . $idEvento . "&eliminado=no");
}
//}
