<?php 
$sql_productos = "SELECT 
                        a.*, 
                        cat.id_categoria as id_categoria, 
                        u.usu_email as usu_email
                  FROM 
                        almacen as a 
                  INNER JOIN 
                        categoria as cat 
                  ON 
                        a.id_categoria = cat.id_categoria  
                  INNER JOIN 
                        usuarios as u 
                  ON 
                        u.id_usuario = a.id_usuario";
 
$query_productos = $conn->prepare($sql_productos);
$query_productos->execute();
$productos_datos = $query_productos->fetchAll(PDO::FETCH_ASSOC);
?>
