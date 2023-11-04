<?php


include('../../config.php');

$nombres = $_POST['nombres'];
$email = $_POST['email'];
$password_user = $_POST['password_user'];
$password_repeat= $_POST['password_repeat'];

if ($password_user == $password_repeat) {
    $password_repeat = password_hash($password_user, PASSWORD_DEFAULT);
    
    // Preparar la sentencia con marcadores de posición
    $sentencia = $conn->prepare("INSERT INTO usuarios (usu_nombres, usu_email, usu_password) 
                                VALUES (:nombres, :email, :password_user)");

    // Vincular los valores a los marcadores de posición
    $sentencia->bindParam(':nombres', $nombres, PDO::PARAM_STR);
    $sentencia->bindParam(':email', $email, PDO::PARAM_STR);
    $sentencia->bindParam(':password_user', $password_repeat, PDO::PARAM_STR); // Usar $password_repeat

    // Ejecutar la sentencia
    $sentencia->execute();
} else {
    echo "Error: Las contraseñas no son iguales";
}
?>