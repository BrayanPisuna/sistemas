<?php

if( isset($_SESSION['mensaje'])){

$respuesta = $_SESSION['mensaje'];
?>
<script>
  Swal.fire({
    position: 'top-center',
    icon: 'error',
    title: '<?php echo $respuesta;?>',
    showConfirmButton: false,
    timer: 3500
  })
  </script>
<?php
unset($_SESSION['mensaje_error']);

}

?>