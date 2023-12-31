<?php

include('../app/config.php');
include('../layout/sesion.php');
include('../layout/parte1.php');
include('../app/controllers/usuarios/show_usuario.php');
?>



<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <div class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1 class="m-0">Datos del Usuario</h1>
                </div><!-- /.col -->

            </div><!-- /.row -->
        </div><!-- /.container-fluid -->
    </div>
    <!-- /.content-header -->


    <!-- Main content -->
    <div class="content">
        <div class="container-fluid">


            <div class="card card-primary">
                <div class="card-header">
                    <h3 class="card-title">Sus Datos son:</h3>
                    <div class="card-tools">
                        <button type="button" class="btn btn-tool" data-card-widget="collapse"><i class="fas fa-minus"></i>
                        </button>
                    </div>
                    <!-- /.card-tools -->
                </div>
                <!-- /.card-header -->
                <div class="card-body" style="display: block;">
                    
                        <div class="form-group">
                            <label>Nombres</label>
                            <input type="text" class="form-control" name="nombres" value="<?php echo $nombres;?>"  aria-describedby="Nombre" disabled >
                        </div>
                        <div class="form-group">
                            <label for="exampleInputEmail1">Email Empresarial</label>
                            <input type="email" class="form-control" name="email" value="<?php echo $email;?>" aria-describedby="emailHelp" disabled>
                        </div>
                        <div class="form-group">
                            <label for="exampleInputEmail1">Rol del Usuario</label>
                            <input type="text" class="form-control" name="rol" value="<?php echo $rol;?>" aria-describedby="emailHelp" disabled>
                        </div>
                        <a href="index.php" class="btn btn-primary">Volver  </a>
                        
                    


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
