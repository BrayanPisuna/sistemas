<?php

include('app/config.php');
include('layout/sesion.php');
include('layout/parte1.php');
include('app/controllers/usuarios/listado_usuarios.php');
include('app/controllers/usuarios/listado_roles.php');

?>

    <!-- Content Wrapper. Contains page content -->
    <div class="content-wrapper">
      <!-- Content Header (Page header) -->
      <div class="content-header">
        <div class="container-fluid">
          <div class="row mb-2">
            <div class="col-sm-6">
              <h1 class="m-0">Bienvenido al Sistema</h1>
            </div><!-- /.col -->
           
          </div><!-- /.row -->
        </div><!-- /.container-fluid -->
      </div>
      <!-- /.content-header -->


      <!-- Main content -->
      <div class="content">
        <div class="container-fluid">
        <div class="row">
          
          <!-- ./col -->
          
          <!-- ./col -->
          <div class="col-lg-3 col-6">
            <!-- small card -->
            <div class="small-box bg-warning">
              <div class="inner">
                <?php
                $contador_usuarios =0;
                foreach($usuarios_datos as $usuarios_dato){
                  $contador_usuarios = $contador_usuarios+1;
                }                
                ?>
                <h3><?php echo $contador_usuarios;?></h3>

                <p>Usuarios Registrados</p>
              </div>
              <a href="<?php echo $URL; ?>/usuarios">
              <div class="icon">
                <i class="fas fa-user-plus"></i>
              </div>
              <a href="<?php echo $URL; ?>/usuarios" class="small-box-footer">
                Más Detalle <i class="fas fa-arrow-circle-right"></i>
              </a>
            </div>
          </div>
          <!-- ./col -->
          <div class="col-lg-3 col-6">
            <!-- small card -->
            <div class="small-box bg-warning">
              <div class="inner">
                <?php
                $contador_roles =0;
                foreach($roles_datos as $roles_dato){
                  $contador_roles = $contador_roles+1;
                }                
                ?>
                <h3><?php echo $contador_roles;?></h3>

                <p>Roles Registrados</p>
              </div>
              <a href="<?php echo $URL; ?>/roles/create.php">
              <div class="icon">
                <i class="fas fa-user-plus"></i>
              </div>
              <a href="<?php echo $URL; ?>/roles" class="small-box-footer">
                Más Detalle <i class="fas fa-arrow-circle-right"></i>
              </a>
            </div>
          </div>
          <!-- ./col -->
        </div>
          <!-- /.row -->
        </div><!-- /.container-fluid -->
      </div>
      <!-- /.content -->
    </div>
    <!-- /.content-wrapper -->



<?php

include('layout/parte2.php');

?>