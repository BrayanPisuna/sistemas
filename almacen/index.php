<?php

include('../app/config.php');
include('../layout/sesion.php');
include('../layout/parte1.php');
include('../app/controllers/almacen/listado_productos.php');

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
    <div class="card-body" style="display: block;">
                    <table id="tablaequipo" class="table table-bordered table-striped"> 
                        <thead class="thead-dark">
                            <tr>
                                <th scope="col">#</th>
                                <th scope="col">Código</th>
                                <th scope="col">Nombre</th>                                
                                <th scope="col">Descripción</th>
                                <th scope="col">Stock</th>
                                <th scope="col">Stock Mínimo</th>
                                <th scope="col">Stock Máximo</th>
                                <th scope="col">Fecha Ingreso</th>
                                <th scope="col">Email</th>
                                <th scope="col">Acción</th>                                
                            </tr>
                        </thead>
                        <tbody>
                            <?php
                            $contador =0;
                            foreach($productos_datos as $productos_datos){ ?>
                                <tr>
                                    <td> <?php echo $contador = $contador+ 1;?> </td>
                                    <td> <?php echo $productos_datos ['alm_codigo'];?> </td>
                                    <td> <?php echo $productos_datos ['alm_nombre'];?> </td>
                                    <td> <?php echo $productos_datos ['alm_descripcion'];?> </td>
                                    <td> <?php echo $productos_datos ['alm_stock'];?> </td>
                                    <td> <?php echo $productos_datos ['alm_stockmin'];?> </td>
                                    <td> <?php echo $productos_datos ['alm_stockmax'];?> </td>
                                    <td> <?php echo $productos_datos ['alm_fechaingreso'];?> </td>
                                    <td> <?php echo $productos_datos ['usu_email'];?> </td>
                                </tr>
                                <td>
                                    <center>
                                    <div class="btn-group">
                                    
                                    <a href="update.php?id=<?php echo $id_almacen;?>" class="btn  bg-success" ><i class="fas fa-edit"></i> Editar</a>
                        
                                    </center>
                                    </div>
                            <?php
                            }                            
                            ?>
                        </tbody>
                    </table>
                </div>
        <!-- /.container-fluid -->
    </div>
    <!-- /.content -->
</div>
<!-- /.content-wrapper -->

<?php

include('../layout/parte2.php');

?>

<script>
  $(function () {
    $("#tablaequipo").DataTable({
        
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
    }).buttons().container().appendTo('#tableusuarios_wrapper .col-md-6:eq(0)');
  });


</script>
