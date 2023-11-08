<?php

include ('../../config.php');

$email = $_POST['email'];
$password = $_POST['password'];

$contador = 0;
$sql = "SELECT * FROM usuarios WHERE usu_email = :email";
$query = $conn->prepare($sql);
$query->bindParam(':email', $email, PDO::PARAM_STR);
$query->execute();
$usuarios = $query->fetchAll(PDO::FETCH_ASSOC);

foreach ($usuarios as $usuario) {
    $contador = $contador + 1;
    $email_tabla = $usuario['usu_email'];
    $nombres = $usuario['usu_nombres'];
    echo $password_user_table = $usuario['usu_password'];
}

if ($contador > 1 && password_verify($password, $password_user_table)) {
    echo "Datos Correctos";
    session_start();
    $_SESSION['sesion_email'] = $email;
    header('Location: ' . $URL . '/index.php');
} else {
    echo "Datos incorrectos, vuelva a intentarlo";
    session_start();
    $_SESSION['mensaje'] = "Error datos incorrectos";
    header('Location: ' . $URL . '/login/login.php');
}
?>

