<?php

include('../../config.php');
    
    $id_usuario = $_POST['id_usuario'];

    // Preparar la sentencia con marcadores de posición
    $sentencia = $conn->prepare("DELETE FROM usuarios WHERE id_usuario = :id_usuario");
    // Vincular los valores a los marcadores de posición
    $sentencia->bindParam(':id_usuario', $id_usuario, PDO::PARAM_STR);
    // Ejecutar la sentencia
    $sentencia->execute();
    session_start();
    $_SESSION['mensaje_exito']="Usuario Eliminado";
    header('Location:'.$URL.'/usuarios/');

?>