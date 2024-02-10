<?php

include('../app/config.php');
include('../layout/sesion.php');
include('../layout/parte1.php');

include('../app/controllers/almacen/listar_productos.php');

if( isset( $_SESSION['mensaje_exito'])){
    $respuesta = $_SESSION['mensaje_exito'];
    ?>
    <script>
      Swal.fire({
        position: 'top-center',
        icon: 'success',
        title: '<?php echo $respuesta;?>',
        showConfirmButton: false,
        timer: 3500
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
                    <h1 class="m-0">Lista de Equipos</h1>
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
                    <h3 class="card-title">Equipos Registrados</h3>
                    <div class="card-tools">
                        <button type="button" class="btn btn-tool" data-card-widget="collapse"><i class="fas fa-minus"></i>
                        </button>
                    </div>
                    <!-- /.card-tools -->
                </div>
                <!-- /.card-header -->
                <div class="card-body" style="display: block;">
                    <table id="tableequipos" class="table table-bordered table-striped"> 
                        <thead class="">
                            <tr>
                                <th><center>#</center></th>
                                <th><center>Código</center></th>
                                <th><center>Nombre</center></th>                                
                                <th><center>Descripción</center></th>
                                <th><center>Stock</center></th>
                                <th><center>Stock Min</center></th>
                                <th><center>Stock Max</center></th>
                                <th><center>Fecha</center></th>
                                <th><center>Email</center></th>
                                <th><center>Accion</center></th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php
                            $contador =0;
                            foreach($productos_datos as $productos_dato){?>
                                <tr>
                                    <td> <?php echo $contador = $contador+ 1;?> </td>
                                    <td> <?php echo $productos_dato ['alm_codigo'];?> </td>
                                    <td> <?php echo $productos_dato ['alm_nombre'];?> </td>
                                    <td> <?php echo $productos_dato ['alm_descripcion'];?> </td>
                                    <td> <?php echo $productos_dato ['alm_stock'];?> </td>
                                    <td> <?php echo $productos_dato ['alm_stockmin'];?> </td>
                                    <td> <?php echo $productos_dato ['alm_stockmax'];?> </td>    
                                    <td> <?php echo $productos_dato ['alm_fechaingreso'];?> </td>                             
                                    <td> <?php echo $productos_dato ['usu_email'];?> </td>
                                    <td>
                                    <center>
                                    <div class="btn-group">
                                        <a href="update.php?id=<?php echo $id_usuario;?>" class="btn  bg-success" ><i class="fas fa-edit"></i> Editar</a>
                                    </center>
                                    </div>
                                </td>
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
    $("#tableequipos").DataTable({
        
          "language": {
              "emptyTable": "No hay información",
              "decimal": "",
              "info": "Mostrando _START_ a _END_ de _TOTAL_ Equipos",
              "infoEmpty": "Mostrando 0 to 0 of 0 Equipos",
              "infoFiltered": "(Filtrado de MAX total Equipos)",
              "infoPostFix": "",
              "thousands": ",",
              "lengthMenu": "Mostrar _MENU_ Equipos",
              "loadingRecords": "Cargando...",
              "processing": "Procesando...",
              "search": "Buscador:",
              "zeroRecords": "Sin resultados encontrados",
              "paginate": {
                  "first": "Primero",
                  "last": "Ultimo",
                  "next": "Siguiente",
                  "previous": "Anterior"
              }
             },
      "responsive": true, "lengthChange": true, "autoWidth": false,
      buttons: [{
                extend: 'collection',
                text: 'Reportes',
                orientation: 'landscape',
                buttons: [{
                    text: 'copiar',
                    extend: 'copy',
                }, {
                    extend: 'pdf',
                }, {
                    extend: 'csv',
                }, {
                    extend: 'excel',
                }, {
                    text: 'Imprimir',
                    extend: 'print'
                }
            ]
            },
            {
                extend: 'colvis',
                text: 'Vista de Columna',
                collectionLayout: 'fixed three-column'
            }

        ],
    }).buttons().container().appendTo('#tableequipos_wrapper .col-md-6:eq(0)');
  });
</script>
