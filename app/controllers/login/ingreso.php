<?php

include ('../../config.php');

$email = $_POST['email'];
$password = $_POST['password'];

$sql = "SELECT * FROM usuarios WHERE usu_email = :email";
$query = $conn->prepare($sql);
$query->bindParam(':email', $email, PDO::PARAM_STR);
$query->execute();
$usuario = $query->fetch(PDO::FETCH_ASSOC);

if ($usuario) {
    if (password_verify($password, $usuario['usu_password'])) {
        session_start();
        $_SESSION['sesion_email'] = $email;
        header('Location: ' . $URL . '/index.php');
    } else {
        session_start();
        $_SESSION['mensaje'] = "Error datos incorrectos";
        header('Location: ' . $URL . '/login/login.php');
    }
} else {
    session_start();
    $_SESSION['mensaje'] = "Error usuario no encontrado";
    header('Location: ' . $URL . '/login/login.php');
}

?>