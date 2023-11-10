<?php

$id_usuario_get= $_GET['id'] ?? null;

if (array_key_exists('id', $_GET)) {
    $sql_usuarios = "SELECT us.id_usuario as id_usuario, us.usu_nombres as usu_nombres, us.usu_email as usu_email, rol.rol as rol FROM usuarios as us INNER JOIN roles as rol on us.id_rol = rol.id_rol WHERE us.id_usuario = ?";
    $query_usuarios = $conn->prepare($sql_usuarios);
    $query_usuarios->bindValue(1, $id_usuario_get, PDO::PARAM_INT);
    $query_usuarios->execute();

    $usuario_datos = $query_usuarios->fetch(PDO::FETCH_ASSOC);

    $nombres = $usuario_datos['usu_nombres'];
    $email = $usuario_datos['usu_email'];
    $rol = $usuario_datos['rol'];
}

?>