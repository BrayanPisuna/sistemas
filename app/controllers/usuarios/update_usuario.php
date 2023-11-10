<?php

$id_usuario_get = $_GET['id'];

// Prepare the SQL statement
$sql_usuarios = "SELECT us.id_usuario AS id_usuario, us.usu_nombres AS usu_nombres, us.usu_email AS usu_email, rol.rol AS rol
                FROM usuarios AS us
                INNER JOIN roles AS rol ON us.id_rol = rol.id_rol
                WHERE us.id_usuario = ?";

// Bind the user ID to the prepared statement
$query_usuarios = $conn->prepare($sql_usuarios);
$query_usuarios->bindValue(1, $id_usuario_get, PDO::PARAM_INT);

// Execute the prepared statement
$query_usuarios->execute();

// Check if the user exists
if ($query_usuarios->rowCount() === 0) {
    // The user does not exist
    echo 'User does not exist.';
    exit;
}

// Fetch the user data
$usuario_datos = $query_usuarios->fetch(PDO::FETCH_ASSOC);

// Extract the user data
$nombres = $usuario_datos['usu_nombres'];
$email = $usuario_datos['usu_email'];
$rol = $usuario_datos['rol'];

?>



















?>