<?php 

 $sql_usuarios = "SELECT * FROM usuarios";
 $query_usuarios = $conn->prepare($sql_usuarios);
 $query_usuarios ->execute();
 $usuarios_datos = $query_usuarios->fetchAll(PDO::FETCH_ASSOC);

?>