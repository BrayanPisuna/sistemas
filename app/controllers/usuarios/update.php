<?php


include('../../config.php');

$nombres = $_POST['nombres'];
$email = $_POST['email'];
$password_user = $_POST['password_user'];
$password_repeat= $_POST['password_repeat'];
$id_usuario = $_POST['id_usuario'];

if ($password_user == $password_repeat) {
    $password_repeat = password_hash($password_user, PASSWORD_DEFAULT);
    
    // Preparar la sentencia con marcadores de posición
    $sentencia = $conn->prepare("UPDATE usuarios 
    SET usu_nombres=:nombres,usu_email= :email ,usu_password=:password_user
    WHERE id_usuario = :id_usuario");

    // Vincular los valores a los marcadores de posición
    $sentencia->bindParam(':id_usuario', $id_usuario, PDO::PARAM_STR);
    $sentencia->bindParam(':nombres', $nombres, PDO::PARAM_STR);
    $sentencia->bindParam(':email', $email, PDO::PARAM_STR);
    $sentencia->bindParam(':password_user', $password_repeat, PDO::PARAM_STR); // Usar $password_repeat
    // Ejecutar la sentencia
    $sentencia->execute();
    session_start();
    $_SESSION['mensaje_exito']="Usuario Actulizado";
    header('Location:'.$URL.'/usuarios/');
} else {
    session_start();
    $_SESSION['mensaje_error']="Error las contraseñas no son iguales";
    header('Location:'.$URL.'/usuarios/update.php?id='.$id_usuario);

}
?>