<?php 

 $sql_roles = "SELECT * FROM roles";
 $query_roles = $conn->prepare($sql_roles);
 $query_roles->execute();
 $roles_datos = $query_roles->fetchAll(PDO::FETCH_ASSOC);

?>