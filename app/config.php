<?php
$hostname = 'mysql:dbname=equipos;host=localhost';
$usuario = 'root';
$contrasena = '';

try {
   $conn = new PDO($hostname, $usuario, $contrasena);
   $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
   echo 'Conexión exitosa';
} catch(PDOException $err) {
   echo "ERROR: No se pudo conectar a la base de datos: " . $err->getMessage();
}
?>