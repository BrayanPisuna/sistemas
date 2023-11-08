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
                    <h1 class="m-0">Eliminar Usuario</h1>
                </div><!-- /.col -->

            </div><!-- /.row -->
        </div><!-- /.container-fluid -->
    </div>
    <!-- /.content-header -->


    <!-- Main content -->
    <div class="content">
        <div class="container-fluid">


            <div class="card card-danger">
                <div class="card-header">
                    <h3 class="card-title">¿Estas seguro de elimiar al usuario?</h3>
                    <div class="card-tools">
                        <button type="button" class="btn btn-tool" data-card-widget="collapse"><i class="fas fa-minus"></i>
                        </button>
                    </div>
                    <!-- /.card-tools -->
                </div>
                <!-- /.card-header -->
                <div class="card-body" style="display: block;">
                    
                <form action="../app/controllers/usuarios/create.php" method="post">
                        <div class="form-group">
                            <label>Nombres</label>
                            <input type="text" class="form-control" name="nombres" aria-describedby="Nombre" required >
                        </div>
                        <div class="form-group">
                            <label for="exampleInputEmail1">Email Empresarial</label>
                            <input type="email" class="form-control" name="email" aria-describedby="emailHelp" required>
                        </div>
                        <div class="form-group">
                            <label for="exampleInputPassword1">Contraseña</label>
                            <input type="password" name="password_user" class="form-control"  required>
                        </div>
                        <div class="form-group">
                            <label for="exampleInputPassword1">Verificar Contraseña</label>
                            <input type="password" name="password_repeat" class="form-control" required>
                        </div>
                        <a href="index.php" class="btn btn-primary">Cancelar</a>
                        <button type="submit" class="btn btn-primary">Guardar</button>
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
