<?php
session_start();
if (isset($_SESSION['sesion_email'])) {
  //echo "si existesesion  " .$_SESSION['sesion_email'];
  $email_sesion = $_SESSION['sesion_email'];
  $sql = "SELECT * FROM usuarios WHERE usu_email = :email";
  $query = $conn->prepare($sql);
  $query->bindParam(':email', $email_sesion, PDO::PARAM_STR);
  $query->execute();
  $usuarios = $query->fetchAll(PDO::FETCH_ASSOC);

  if (count($usuarios) > 0) {
      // El usuario se encontró en la base de datos, puedes realizar acciones aquí si es necesario.
      foreach ($usuarios as $usuario) {
          $nombres_sesion = $usuario['usu_nombres'];
      }
    }
}
   else 
{
  echo "no existe seion";
  header('Location: ' . $URL . '/login/login.php');
}

?>