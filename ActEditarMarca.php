<?php
session_start();
include_once 'DB/Marca.php';
include_once 'DB/MarcaDB.php';


$message = "";

$id = null;
$nombre = null;


if (isset($_POST['txtNombre']) && isset($_GET["id"])) {
  $id = $_GET['id'];
  $nombre = $_POST['txtNombre'];

  if (($id && $nombre) != "") {


    $marca = new Marca();
    $marcaDB = new MarcaDB();

    $marca->id = $id;
    $marca->nombre = $nombre;

    $ok = $marcaDB->editar($marca);
  } else {
    $message = "Debe ingresar todos los datos";
    $ok = false;
  }
}



if ($ok) {
  $_SESSION['message'] = '<div class="alert alert-success">Editado correctamente</div>';
} else {
  $_SESSION['message'] = '<div class="alert alert-danger">Error al editar</div>';
}



header("Location: EditarMarca.php?id=" . $id);
