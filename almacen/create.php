<?php

include('../app/config.php');
include('../layout/sesion.php');
include('../layout/parte1.php');

include('../app/controllers/almacen/listar_productos.php');
include('../app/controllers/categorias/listado_categorias.php');

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
                    <h1 class="m-0">Registro de un nuevo Equipo</h1>
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
                    <form action="../app/controllers/almacen/create.php" method="post">

                    <div class="row">
                            <div class="col-sm-2">
                                <label>Código</label>
                                <input type="text" class="form-control" name="rol" aria-describedby="Nombre" required >
                            </div>
                            <div class="col-sm-4">
                                <label>Nombres del Equipo</label>
                                <input type="text" class="form-control" name="rol" aria-describedby="Nombre" required >
                            </div>

                            <div class="col-sm-6">
                                <label for="usuario">Usuario</label>
                                <input type="text" class="form-control" name="usuario" value="<?php echo $email_sesion; ?>" readonly>
                            </div>


                    </div>
                    <div class="row">
                            <div class="col-sm-2">
                                <label>Stock</label>
                                <input type="number" class="form-control" name="rol" aria-describedby="Nombre" required min="1">
                            </div>
                            <div class="col-sm-2">
                                <label>Stock Minimo</label>
                                <input type="number" class="form-control" name="rol" aria-describedby="Nombre" min="1" >
                            </div>
                            <div class="col-sm-2">
                                <label>Stock Máximo</label>
                                <input type="number" class="form-control" name="rol" aria-describedby="Nombre" min="1">
                            </div>
                            <div class="col-sm-4">
                                <label for="categoria">Categoría</label>
                                <div style="display: flex">
                                <select name="categoria" id="categoria" class="form-control" required>
                                    <?php foreach ($categorias_datos as $categorias_dato) { ?>
                                        <option value="<?php echo $categorias_dato['id_categoria']; ?>">  
                                            <?php echo $categorias_dato['nombre_categoria']; ?>
                                        </option>
                                    <?php } ?>
                                </select>
                                <a href="<?php echo $URL;?>/categorias" class="btn btn_primary"><i class="fa fa-plus"></i></a>
                            </div>
                            </div>
                            <div class="col-sm-2">
                                <label>Fecha</label>
                                <input type="date" class="form-control" name="rol" aria-describedby="Nombre">
                            </div>
                    </div>
                    <div class="row">
                            <div class="col-sm-12">
                                <label>Descripción del Equipo</label>
                                <input type="text" class="form-control" name="rol" aria-describedby="Nombre" required >
                            </div>
                    </div>
                    <br>
                    <div class="row">
                        <div class="form-group">
                             <a href="index.php" class="btn btn-primary">Cancelar</a>
                            <button type="submit" class="btn btn-primary">Guardar</button>
                        </div>
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