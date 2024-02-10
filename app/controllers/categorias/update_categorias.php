<?php

include('../../config.php');

$nombre_categoria = $_GET['nombre_categoria'];
$id_categoria = $_GET['id_categoria'];

// Comprobar que el ID de nombre_categoria existe
$sql = "SELECT * FROM categoria WHERE id_categoria = :id_categoria";
$query = $conn->prepare($sql);
$query->bindParam(':id_categoria', $id_categoria, PDO::PARAM_STR);
$query->execute();

if ($query->rowCount() == 0) {
    session_start();
    $_SESSION['mensaje_error'] = 'El ID de nombre_categoria no existe';
    header('Location: ' . $URL . '/categoria/update.php?id=' . $id_categoria);
    exit;
}

// Actualizar el nombre_categoria
$sentencia = $conn->prepare("UPDATE categoria 
SET nombre_categoria=:nombre_categoria
WHERE id_categoria = :id_categoria");
$sentencia->bindParam(':id_categoria', $id_categoria, PDO::PARAM_STR);
$sentencia->bindParam(':nombre_categoria', $nombre_categoria, PDO::PARAM_STR);

// Ejecutar la sentencia
if ($sentencia->execute()) {
    session_start();
    $_SESSION['mensaje_exito'] = 'Nombre Categoria Actualizado';
?>

<script>
    location.href =" <?php echo $URL;?>/categorias";
</script>

<?php
    session_start();
    $_SESSION['mensaje_error'] = 'Error no se pudo actualizar en la base de datos';
    //header('Location:' . $URL . '/categoria/update.php?id=' . $id_categoria);
}

?>