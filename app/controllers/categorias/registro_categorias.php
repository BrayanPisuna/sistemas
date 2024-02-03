<?php

include ('../../config.php');

$nombre_categoria = $_POST['nombre_categoria'];

// Preparar la sentencia con marcadores de posición
$sentencia = $conn->prepare("INSERT INTO categoria (nombre_categoria) 
VALUES (:nombre_categoria)");

// Vincular los valores a los marcadores de posición
$sentencia->bindParam(':nombre_categoria', $nombre_categoria, PDO::PARAM_STR);
// Ejecutar la sentencia
if ($sentencia->execute()){
    session_start();
    $_SESSION['mensaje_exito']="Categoria Registrado";
?>

<script>
    location.href =" <?php echo $URL;?>/categorias";
</script>

<?php
    //header('Location: ' . $url . '/categorias/');
}else{
    session_start();
    $_SESSION['mensaje_usuario']="Error no se pudo registrar";
   // header('Location: ' . $url . '/categorias');
}

?>