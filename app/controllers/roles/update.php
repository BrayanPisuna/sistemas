<?php

include('../../config.php');

$id_rol = $_POST['id_rol'];
$rol = $_POST['rol'];

// Comprobar que el ID de rol existe
$sql = "SELECT * FROM roles WHERE id_rol = :id_rol";
$query = $conn->prepare($sql);
$query->bindParam(':id_rol', $id_rol, PDO::PARAM_STR);
$query->execute();

if ($query->rowCount() == 0) {
    session_start();
    $_SESSION['mensaje_error'] = 'El ID de rol no existe';
    header('Location: ' . $URL . '/roles/update.php?id=' . $id_rol);
    exit;
}

// Actualizar el rol
$sentencia = $conn->prepare("UPDATE roles 
SET rol=:rol
WHERE id_rol = :id_rol");
$sentencia->bindParam(':id_rol', $id_rol, PDO::PARAM_STR);
$sentencia->bindParam(':rol', $rol, PDO::PARAM_STR);

// Ejecutar la sentencia
if ($sentencia->execute()) {
    session_start();
    $_SESSION['mensaje_exito'] = 'Rol actualizado';
    header('Location:' . $URL . '/roles/');
} else {
    session_start();
    $_SESSION['mensaje_error'] = 'Error no se pudo actualizar en la base de datos';
    header('Location:' . $URL . '/roles/update.php?id=' . $id_rol);
}

?>