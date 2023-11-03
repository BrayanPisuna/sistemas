<?php
$hostname = 'mysql:dbname=nombre_base_datos;host=localhost';
$usuario = 'nombre_usuario';
$contrasena = 'contraseña';

try {
   $conn = new PDO($hostname, $usuario, $contrasena);
   $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
   echo 'Conexión exitosa';
} catch(PDOException $err) {
   echo "ERROR: No se pudo conectar a la base de datos: " . $err->getMessage();
}
?>