<?php

include ('../../config.php');

$id_categoria = $_POST['id_categoria'];
$nombre_categoria = $_POST['nombre_categoria'];

// Preparar la sentencia con marcadores de posición
$sentencia = $conn->prepare("UPDATE categoria 
                                SET nombre_categoria=:nombre_categoria
                                WHERE id_categoria = :id_categoria");

// Vincular los valores a los marcadores de posición
$sentencia->bindParam(':nombre_categoria', $nombre_categoria, PDO::PARAM_STR);
$sentencia->bindParam(':id_categoria', $id_categoria, PDO::PARAM_INT);

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