<?php

include('../app/config.php');
include('../layout/sesion.php');
include('../layout/parte1.php');
include('../app/controllers/usuarios/listado_usuarios.php');

if( isset( $_SESSION['mensaje_exito'])){
    $respuesta = $_SESSION['mensaje_exito'];
    ?>
    <script>
      Swal.fire({
        position: 'top-center',
        icon: 'success',
        title: '<?php echo $respuesta;?>',
        showConfirmButton: false,
        timer: 1500
      })
      </script>
  <?php
    unset($_SESSION['mensaje_exito']);

}
?>



<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <div class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1 class="m-0">Lista de Usuarios</h1>
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
                    <h3 class="card-title">Usuarios Registrados</h3>
                    <div class="card-tools">
                        <button type="button" class="btn btn-tool" data-card-widget="collapse"><i class="fas fa-minus"></i>
                        </button>
                    </div>
                    <!-- /.card-tools -->
                </div>
                <!-- /.card-header -->
                <div class="card-body" style="display: block;">
                    <table id="tableusuarios" class="table table-bordered table-striped"> 
                        <thead class="thead-dark">
                            <tr>
                                <th scope="col">#</th>
                                <th scope="col">Nombre</th>
                                <th scope="col">Email</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php
                            $contador =0;
                            foreach($usuarios_datos as $usuarios_datos){?>
                            <tr>
                                <td><?php echo $contador = $contador+1;?></td>
                                <td><?php echo $usuarios_datos['usu_nombres'];?></td>
                                <td><?php echo $usuarios_datos['usu_email'];?></td>
                            </tr>
                            <?php
                            }                            
                            ?>
                        </tbody>
                    </table>
                </div>
                <!-- /.card-body -->
            </div>



        </div><!-- /.container-fluid -->
    </div>
    <!-- /.content -->
</div>
<!-- /.content-wrapper -->

<?php

include('../layout/parte2.php');

?>


<script>
  $(function () {
    $("#tableusuarios").DataTable({
      "responsive": true, "lengthChange": false, "autoWidth": false,
      "buttons": ["copy", "csv", "excel", "pdf", "print", "colvis"]
    }).buttons().container().appendTo('#tableusuarios_wrapper .col-md-6:eq(0)');
    
  });
</script>