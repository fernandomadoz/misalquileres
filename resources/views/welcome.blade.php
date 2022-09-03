<?php
$rol_de_usuario_id = Auth::user()->rol_de_usuario_id;
use \App\Http\Controllers\GenericController; 
$gCon = new GenericController;

use App\Empresa;


if (Auth::user()->empresa_id <> '') {
  $Empresa = Empresa::where('id', Auth::user()->empresa_id)->first();
  $nombre = $Empresa->nombre;
}
else {
  $nombre = Auth::user()->name;  
}
?>


@extends('layouts.backend')



@section('contenido')

  <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
  <!-- Bootstrap 3.3.7 -->
  <link rel="stylesheet" href="<?php echo env('PATH_PUBLIC')?>bower_components/bootstrap/dist/css/bootstrap.min.css">
  <!-- Font Awesome -->
  <link rel="stylesheet" href="<?php echo env('PATH_PUBLIC')?>bower_components/font-awesome/css/font-awesome.min.css">
  <!-- Ionicons -->
  <link rel="stylesheet" href="<?php echo env('PATH_PUBLIC')?>bower_components/Ionicons/css/ionicons.min.css">
  <!-- DataTables -->
  <link rel="stylesheet" href="<?php echo env('PATH_PUBLIC')?>bower_components/datatables.net-bs/css/dataTables.bootstrap.min.css">
  <!-- Theme style -->
  <link rel="stylesheet" href="<?php echo env('PATH_PUBLIC')?>dist/css/AdminLTE.min.css">
  <!-- AdminLTE Skins. Choose a skin from the css/skins
       folder instead of downloading all of them to reduce the load. -->
  <link rel="stylesheet" href="<?php echo env('PATH_PUBLIC')?>dist/css/skins/_all-skins.min.css">

  <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
  <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
  <!--[if lt IE 9]>
  <script src="https://oss.maxcdn.com/html5shiv/3.7.3/html5shiv.min.js"></script>
  <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
  <![endif]-->

  <!-- Google Font -->
  <link rel="stylesheet"
        href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,600,700,300italic,400italic,600italic">

    <!-- Content Header (Page header) -->
    <section class="content-header">
      <h1>
        Inicio
        <small><?php echo $nombre ?></small>
      </h1>
      <ol class="breadcrumb">
        <li class="active">Inicio</li>
      </ol>
    </section>

    <!-- Main content -->
    <section class="content">
      <div class="row">
        <?php if ($rol_de_usuario_id <> '') { ?>
          <div class="col-xs-12">

            <br>

            <?php 
            $i = 0;
            if ($Reservas_Alarmas <> null) {
              $i++;
              ?>
              <?php if ($cant_alarmas > 0 ) { ?>
                <!-- RESERVAS ALARMAS -->
                  <div class="col-xs-12">
                    <div class="box">
                      <div class="box-header">
                        <h3 class="box-title">
                          <span data-toggle="tooltip" title="" class="badge bg-green" data-original-title="3 New Messages"><?php echo $cant_alarmas ?></span>
                          ALARMAS: Próximos Chek-in</h3>

                          <div class="box-tools pull-right">
                            <button type="button" class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-minus"></i>
                            </button>
                          </div>

                      </div>
                      <!-- /.box-header -->
                      <div class="box-body">
                        <table id="table_sol_alarmas_<?php echo $i ?>" class="table table-bordered table-striped" style="max-width: 500px" >
                          <thead>
                          <tr>
                            <th><?php echo __('Cabaña') ?></th>
                            <th><?php echo __('Cliente') ?></th>
                            <th><?php echo __('Saldo') ?></th>
                            <th><?php echo __('Ingreso') ?></th>
                            <th><?php echo __('Egreso') ?></th>
                            <th><?php echo __('Personas') ?></th>
                            <th><?php echo __('Vehiculo') ?></th>
                          </tr>
                          </thead>
                          <tbody>
                          <?php foreach ($Reservas_Alarmas as $Reserva) { ?>
                          <tr>
                              <td><?php echo __($Reserva->Cabania->nombre); ?></td>
                              <td>
                                <?php echo $Reserva->Cliente->nombre; ?> <?php echo $Reserva->Cliente->apellido; ?>
                                <p><?php echo $Reserva->Cliente->email_correo; ?></p>
                                <?php 
                                $celular =  $Reserva->Cliente->celular;
                                $telefono_2 =  $Reserva->Cliente->telefono_2;
                                $telefono = $celular;
                                if ($telefono_2 <> '') {
                                  $telefono .= ' | '.$telefono_2;
                                }
                                ?>
                                <p>Tel: <?php echo $telefono; ?></p>
                                <?php 
                                if ($celular <> '') {
                                  $celular_wa = $gCon->celular_wa($celular, '549');
                                  echo $gCon->btn_enviar_wa($celular_wa);
                                }
                                ?>
                                
                              </td>
                              <td><?php echo $Reserva->saldo(); ?></td>
                              <td><?php echo $gCon->FormatoFecha($Reserva->fecha_de_ingreso); ?> <?php echo $gCon->FormatoHora($Reserva->hora_de_ingreso); ?></td>
                              <td><?php echo $gCon->FormatoFecha($Reserva->fecha_de_egreso); ?> <?php echo $gCon->FormatoHora($Reserva->hora_de_egreso); ?></td>
                              <td><?php echo $Reserva->cantidad_de_personas; ?></td>
                              <td><?php echo $Reserva->vehiculo; ?></td>
                          </tr>
                          <?php } ?>
                        </tbody>
                        </table>
                      </div>
                      <!-- /.box-body -->
                    </div>
                    <!-- /.box -->
                  </div>
                  <br>

                  <!-- DataTables -->

                  <script>
                    $(function () {
                      $('#table_sol_alarmas_<?php echo $i ?>').DataTable({
                        'language': {
                          'autoWidth': true,
                              'lengthMenu': 'Mostrar _MENU_ Registros por pagina',
                              'search': 'Buscar',
                              'zeroRecords': 'No hay resultados para la busqueda',
                              'info': 'Mostrando Pagina _PAGE_ de _PAGES_',
                              'infoEmpty': 'No hay registros',
                              'paginate': {
                                  'first':      'Primero',
                                  'last':       'Ultimo',
                                  'next':       'Siguiente',
                                  'previous':   'Anterior'
                              },
                              'infoFiltered': '(filtrado en _MAX_ registros totales)'
                          },
                          'order': [[ 1, 'asc' ]],
                          'columnDefs': [{ "width": "100px", "targets": 0 }], 
                      })
                    })
                  </script>
                <!-- RESERVAS ALARMAS  -->
              <?php } ?>
            <?php } ?>





          <?php } 
          else { ?>

              <div class="alert alert-warning alert-dismissible">
                <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
                <h4><i class="icon fa fa-warning"></i> Alerta!</h4>
                <p><strong>Su usuario a&uacute;n no ha sido autorizado. Debe solicitarlo a su vendedor. Sinó <a href="https://api.whatsapp.com/send?phone=5493447414048&text=Hola%20me%20he%20registrado%20en%20misalquileres.com.ar%20y%20quisiera%20solicitar%20me%20habiliten%20en%20la%20plataforma"> haga click aquí y eníenos un mensaje para ayudarlo</a> </strong></p>
              </div>

          <?php } ?>

        </div>
        <!-- /.col -->
      </div>
      <!-- /.row -->
    </section>
    <!-- /.content -->

<!-- DataTables -->
<script src="<?php echo env('PATH_PUBLIC')?>bower_components/datatables.net/js/jquery.dataTables.min.js"></script>
<script src="<?php echo env('PATH_PUBLIC')?>bower_components/datatables.net-bs/js/dataTables.bootstrap.min.js"></script>



@endsection
