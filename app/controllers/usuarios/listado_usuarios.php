<?php 

 $sql_usuarios = "SELECT us.id_usuario as id_usuario, us.usu_nombres as usu_nombres, us.usu_email as usu_email, 
                    rol.rol as rol FROM usuarios as us INNER JOIN roles as rol on us.id_rol = rol.id_rol";
 
 $query_usuarios = $conn->prepare($sql_usuarios);
 $query_usuarios ->execute();
 $usuarios_datos = $query_usuarios->fetchAll(PDO::FETCH_ASSOC);

?>