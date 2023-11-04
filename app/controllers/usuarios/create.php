<?php


include('../../config.php');

$nombres = $_POST['nombres'];
$email = $_POST['email'];
$password_user = $_POST['password_user'];
$password_repeat= $_POST['password_repeat'];
// Preparar la sentencia con marcadores de posición
$sentencia = $conn->prepare("INSERT INTO usuarios (usu_nombres, usu_email, usu_password) 
VALUES (:nombres, :email, :password_user)");

// Vincular los valores a los marcadores de posición
$sentencia->bindParam(':nombres', $nombres, PDO::PARAM_STR);
$sentencia->bindParam(':email', $email, PDO::PARAM_STR);
$sentencia->bindParam(':password_user', $password_user, PDO::PARAM_STR);
// Ejecutar la sentencia
$sentencia->execute();

?>