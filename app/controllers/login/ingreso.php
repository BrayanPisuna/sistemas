<?php

include ('../../config.php');

$email = $_POST['email'];
$password = $_POST['password'];


$contador=0;
$sql = "SELECT * FROM usuarios WHERE usu_email ='$email' AND usu_password = '$password'";
$query = $conn->prepare($sql);
$query->execute();
$usuarios = $query->fetchAll(PDO::FETCH_ASSOC);

foreach($usuarios as $usuario){
    $contador = $contador + 1;
   $email_tabla = $usuario['usu_email'];
   echo $nombres = $usuario['usu_nombres'];$nombres;
}

if($contador ==0){
    echo"Datos incorrectos vuelva a intentarlo";

}else{
    echo"Datos Correctos";
}

hola

?>

