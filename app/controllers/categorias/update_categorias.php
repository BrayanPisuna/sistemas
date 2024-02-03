<?php

include('../../config.php');

$id_categoria = $_POST['id_categoria'];
$nombre_categoria = $_POST['nombre_categoria'];

// Actualizar el nombre_categoria
$sentencia = $conn->prepare("UPDATE categoria 
SET nombre_categoria=:nombre_categoria
WHERE id_categoria = :id_categoria");

$sentencia->bindParam(':nombre_categoria', $nombre_categoria, PDO::PARAM_STR);

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