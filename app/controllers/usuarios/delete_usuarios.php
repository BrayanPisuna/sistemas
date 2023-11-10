<?php

include('../../config.php');

$id_usuario = $_POST['id_usuario'];

// Comprobar que el ID de usuario existe
$sql = "SELECT * FROM usuarios WHERE id_usuario = :id_usuario";
$query = $conn->prepare($sql);
$query->bindParam(':id_usuario', $id_usuario, PDO::PARAM_STR);
$query->execute();

if ($query->rowCount() == 0) {
    session_start();
    $_SESSION['mensaje_error'] = 'El ID de usuario no existe';
    header('Location: ' . $URL . '/usuarios/');
    exit;
}

// Eliminar el usuario
$sentencia = $conn->prepare("DELETE FROM usuarios WHERE id_usuario = :id_usuario");
$sentencia->bindParam(':id_usuario', $id_usuario, PDO::PARAM_STR);
$sentencia->execute();

session_start();
$_SESSION['mensaje_exito'] = 'Usuario eliminado';
header('Location:' . $URL . '/usuarios/');

?>