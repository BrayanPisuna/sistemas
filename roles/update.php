<?php

include('../app/config.php');
include('../layout/sesion.php');
include('../layout/parte1.php');
include('../app/controllers/roles/update_roles.php');

if( isset($_SESSION['mensaje_error'])){

    $respuesta = $_SESSION['mensaje_error'];
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
?>
<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <div class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1 class="m-0">Actulizar Roles</h1>
                </div><!-- /.col -->

            </div><!-- /.row -->
        </div><!-- /.container-fluid -->
    </div>
    <!-- /.content-header -->


    <!-- Main content -->
    <div class="content">
        <div class="container-fluid">


            <div class="card card-success">
                <div class="card-header">
                    <h3 class="card-title">Llene los datos con cuidado</h3>
                    <div class="card-tools">
                        <button type="button" class="btn btn-tool" data-card-widget="collapse"><i class="fas fa-minus"></i>
                        </button>
                    </div>
                    <!-- /.card-tools -->
                </div>
                <!-- /.card-header -->
                <div class="card-body" style="display: block;">
                    
                <form action="../app/controllers/roles/update.php" method="post">

                        <input type="text" name="id_rol" value="<?php echo $id_rol_get;?>">  
                        <div class="form-group">
                            <label>Nombre del Rol</label>
                            <input type="text" class="form-control" name="rol" value="<?php echo $rol;?>" aria-describedby="Nombre" require>
                        </div>
                        <div class="form-group">
                            <a href="index.php" class="btn btn-primary">Cancelar</a>
                            <button type="submit" class="btn btn-primary">Actulizar</button>
                        </div>
                        
                </form>
                    


                </div>
                <!-- /.card-body -->
            </div>




            <!-- /.row -->
        </div><!-- /.container-fluid -->
    </div>
    <!-- /.content -->
</div>
<!-- /.content-wrapper -->



<?php

include('../layout/parte2.php');

?>
