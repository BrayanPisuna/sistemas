<?php

include('../app/config.php');
include('../layout/sesion.php');
include('../layout/parte1.php');
include('../app/controllers/categorias/listado_categorias.php');

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
                    <h1 class="m-0">Lista de Categorias</h1>
                </div><!-- /.col -->
                <button type="button" class="btn btn-default" data-toggle="modal" data-target="#modal-create">
                <i class="fa fa-plus"></i> Agregar Categoria
                </button>

            </div><!-- /.row -->
        </div><!-- /.container-fluid -->
    </div>
    <!-- /.content-header -->
    
    <!-- Main content -->
    <div class="content">
        <div class="container-fluid">

            <div class="card card-primary">
                <div class="card-header">
                    <h3 class="card-title">Categorias Registrados</h3>
                    <div class="card-tools">
                        <button type="button" class="btn btn-tool" data-card-widget="collapse"><i class="fas fa-minus"></i>
                        </button>
                    </div>
                    <!-- /.card-tools -->
                </div>
                <!-- /.card-header -->
                <div class="card-body">
                <table id="tableusuarios" class="table table-bordered table-striped">
                <thead>
                    <tr>
                        <th>Nro</th>
                        <th>Nombre Categoria</th>
                        <th>Acción</th>
                    </tr>
                </thead>
                <tbody>
                    <?php
                    $contador = 0;
                    foreach ($categorias_datos as $categorias_dato) {
                        $id_categoria = $categorias_dato['id_categoria'];
                        $nombre_categoria = $categorias_dato['nombre_categoria'];
                        $contador++;
                    ?>
                    <tr>
                        <td><?= $contador ?></td>
                        <td><?= $nombre_categoria ?></td>
                        <td>
                            <center>
                                <div class="btn-group">
                                    <button type="button" class="btn bg-success" data-toggle="modal" data-target="#modal-update<?= $id_categoria ?>">
                                        <i class="fas fa-edit"></i> Editar Categoria
                                    </button>
                                    <!-- MODAL PARA ACTULIZAR CATEGORIAS-->
                                    <div class="modal fade" id="modal-update<?= $id_categoria ?>">
                                        <div class="modal-dialog">
                                            <div class="modal-content">
                                                <div class="modal-header" style="background-color:#000080; color:white;">
                                                    <h4 class="modal-title">Actualizar Categoria</h4>
                                                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                        <span aria-hidden="true">&times;</span>
                                                    </button>
                                                </div>
                                                <div class="modal-body">
                                                    <div class="row">
                                                        <label for="">Nombre de la Categoría</label>
                                                        <input type="text" class="form-control" id="nombre_categoria<?= $id_categoria ?>" value="<?= $nombre_categoria ?>" />
                                                        <small id="lbl_update" style="display: none;">Este Campo es requerido</small>
                                                    </div>
                                                </div>
                                                <div class="modal-footer justify-content-between">
                                                    <button type="button" class="btn btn-default" data-dismiss="modal">Descartar</button>
                                                    <button type="button" class="btn btn-primary" id="btn_update<?= $id_categoria ?>">Actualizar</button>
                                                </div>
                                            </div>
                                            <!-- /.modal-content -->
                                        </div>
                                        <!-- /.modal-dialog -->
                                    </div>
                                    <script>
                                        $('#btn_update<?= $id_categoria ?>').click(function() {
                                            var nombre_categoria = $('#nombre_categoria<?= $id_categoria ?>').val();
                                            var id_categoria ='<?= $id_categoria ?>';       
                                            //alert(id_categoria);
                                            if(nombre_categoria == ""){
                                                $('#nombre_categoria<?= $id_categoria ?>').focus();
                                                    $('#lbl_update<?= $id_categoria ?>').css('display','block');
                                                    alert (nombre_categoria);
                                            } else {
                                                var url = "../app/controllers/categorias/update_categorias.php";
                                                $.get(url, {nombre_categoria:nombre_categoria, id_categoria:id_categoria}, function(datos) {
                                                // alert(url);
                                                    $('#respuesta_update<?= $id_categoria ?>').html(datos);
                                                });
                                            }
                                        });
                                    </script>

                                    <div id="respuesta_update<?= $id_categoria ?>"></div>
                                </center>
                            </td>
                        </tr>
                        <?php } ?>
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
        
          "language": {
              "emptyTable": "No hay información",
              "decimal": "",
              "info": "Mostrando _START_ a _END_ de _TOTAL_ Categoria",
              "infoEmpty": "Mostrando 0 to 0 of 0 Categoria",
              "infoFiltered": "(Filtrado de MAX total Categoria)",
              "infoPostFix": "",
              "thousands": ",",
              "lengthMenu": "Mostrar _MENU_ Categoria",
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

<!-- MODAL PARA REGISTRAR CATEGORIAS-->
<div class="modal fade" id="modal-create">
        <div class="modal-dialog">
          <div class="modal-content">
            <div class="modal-header">
              <h4 class="modal-title">Creación de una Nueva Categoria</h4>
              <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span>
              </button>
            </div>
            <div class="modal-body">
                <div class="row">
                    <label for="">Nombre de la Categoría</label>
                    <input type="text" class="form-control" id="nombre_categoria" required></input>
                    <small id="lbl_create" style="display: none;">Este Campo es requerido</small>
                </div>      
            </div>
            <div class="modal-footer justify-content-between">
              <button type="button" class="btn btn-default" data-dismiss="modal">Descartar</button>
              <button type="button" class="btn btn-primary" id="btn_create">Agregar</button>
            </div>
          </div>
          <!-- /.modal-content -->
        </div>
        <!-- /.modal-dialog -->
</div>

<script>
    $('#btn_create').click(function () {
        //alert ("OK");
        var nombre_categoria = $('#nombre_categoria').val();
        //alert (nombre_categoria);
        var datos = {
            nombre_categoria: nombre_categoria
        };

        if(nombre_categoria == ""){
            $('#nombre_categoria').focus();
            $('#lbl_create').css('display','block');
            //alert (nombre_categoria);
        } else {
            var url = "../app/controllers/categorias/registro_categorias.php";
            $.post(url, datos, function (respuesta) {
                // alert (nombre_categoria); // Esta alerta es opcional, puedes eliminarla si no es necesaria
                $('#respuesta').html(respuesta);
            });
        }        
    });
</script>


<div id="respuesta"></div>


