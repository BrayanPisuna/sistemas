<?php


include('../../config.php');

$rol = $_POST['rol'];

    // Preparar la sentencia con marcadores de posición
    $sentencia = $conn->prepare("INSERT INTO roles (rol) VALUES (:rol)");
    // Vincular los valores a los marcadores de posición
    $sentencia->bindParam(':rol', $rol, PDO::PARAM_STR);
    // Ejecutar la sentencia
   
   if ($sentencia->execute()){
    session_start();
    $_SESSION['mensaje_exito']="Rol Registrado";
    header('Location:'.$URL.'/roles/');
    }else{
    session_start();
    $_SESSION['mensaje_usuario']="Error no se pudo registrar";
    header('Location:'.$URL.'/roles/create.php');
   }
    

?>