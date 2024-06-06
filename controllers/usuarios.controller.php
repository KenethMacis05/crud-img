<?php
include_once "../models/conexion.model.php";
include_once "../models/usuarios.model.php";

$objUser = new Usuarios();

//crear
if (isset($_POST['nombre']) && !isset($_POST['btn-modificar'])) {
    $nombre = $_POST['nombre'];
    try {
        $imagen = addslashes((file_get_contents($_FILES['imagen']['tmp_name'])));
    } catch (\Throwable $th) {
        $imagen = '';
    }

    $resultado = $objUser->create($nombre, $imagen) ? "/index.php?create=1" : "/index.php?create=0";
    header("Location: " . $resultado);
}

//actualizar todo
if (isset($_POST['btn-modificar']) &&!empty($_FILES['imagen']['tmp_name'])) {
    $id = $_POST['id'];
    $nombre = $_POST['nombre'];
    $imagen = addslashes(file_get_contents($_FILES['imagen']['tmp_name']));

    $resultado = $objUser->updateTodo($id, $nombre, $imagen)? "/index.php?update=1" : "/index.php?update=0";
    header("Location: ". $resultado);
}

// actualizar nombre
if (isset($_POST['btn-modificar'])) {
    $id = $_POST['id'];
    $nombre = $_POST['nombre'];

    $resultado = $objUser->update($id, $nombre) ? "/index.php?update=1" : "/index.php?update=0";
    header("Location: " . $resultado);
}

//eliminar imagen
if (isset($_POST['btn-eliminarIMG'])) {
    $id = $_POST['id'];

    $resultado = $objUser->updateIMG($id) ? "/index.php?update=1" : "/index.php?update=0";
    header("Location: " . $resultado);
}

//eliminar
if (isset($_GET['delete'])) {
    $id = $_GET['delete'];

    $resultado = $objUser->delete($id)? "/index.php?delete=1" : "/index.php?delete=0";
    header("Location: ". $resultado);
    exit;
}
?>