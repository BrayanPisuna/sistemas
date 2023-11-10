<?php

include('../app/config.php');
include('../layout/sesion.php');
include('../layout/parte1.php');
include('../app/controllers/roles/listado_roles.php');

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

<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <div class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1 class="m-0">Registro de un nuevo Usuario</h1>
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
                    <h3 class="card-title">Llene los datos con cuidado</h3>
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
                            <label for="exampleInputEmail1">Rol del Usuario</label>
                            <select name="rol" id="" class="form-control">
                               <?php foreach ($roles_datos as $roles_dato){?>
                                <option value="<?php echo $roles_dato['id_rol'];?>">
                                               <?php echo $roles_dato['rol'];?>
                               </option>
                                <?php
                               }
                                ?>
                            </select>
                        </div>
                        <div class="form-group">
                            <label for="exampleInputPassword1">Contraseña</label>
                            <input type="password" name="password_user" class="form-control"  require minlength="3" maxlength="13">
                        </div>
                        <div class="form-group">
                            <label for="exampleInputPassword1">Verificar Contraseña</label>
                            <input type="password" name="password_repeat" class="form-control" require minlength="3" maxlength="13">
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