
<?php 
use \App\Http\Controllers\GenericController; 
$gCon = new GenericController;
?>
@extends('layouts.backend')

@section('contenido')


<!-- fullCalendar -->
<link rel="stylesheet" href="<?php echo env('PATH_PUBLIC')?>bower_components/fullcalendar-4.2.0/packages/core/main.css">
<link rel="stylesheet" href="<?php echo env('PATH_PUBLIC')?>bower_components/fullcalendar-4.2.0/packages/daygrid/main.css">
  
<br>

<div class="col-xs-12 col-lg-12">

  <div class="box">
    <div class="box-header">
      <h3 class="box-title"><?php echo $titulo; ?></h3>
    </div>
    <!-- /.box-header -->
    <div class="box-body">


      <div class="col-xs-12 col-lg-9">
        <div class="box box-primary">
          <div class="box-body no-padding">
            <!-- THE CALENDAR -->
            <div id="calendario" style="cursor: pointer;"></div>
          </div>
          <!-- /.box-body -->
        </div>
        <!-- /. box -->
      </div>

    </div>
    <!-- /.box-body -->
  </div>
  <!-- /.box -->
</div>


<!-- DataTables -->

  


<!-- fullCalendar -->
<script src="<?php echo env('PATH_PUBLIC')?>bower_components/moment/moment.js"></script>
<script src="<?php echo env('PATH_PUBLIC')?>bower_components/fullcalendar-4.2.0/packages/core/main.js"></script>  
<script src="<?php echo env('PATH_PUBLIC')?>bower_components/fullcalendar-4.2.0/packages/daygrid/main.js"></script>  
<script src="<?php echo env('PATH_PUBLIC')?>bower_components/fullcalendar-4.2.0/packages/core/locales/es.js"></script>
<script src="<?php echo env('PATH_PUBLIC')?>bower_components/fullcalendar-4.2.0/packages/interaction/main.js"></script>   
      
    <script>

      document.addEventListener('DOMContentLoaded', function() {
        var calendarEl = document.getElementById('calendario');

        var calendar = new FullCalendar.Calendar(calendarEl, {
          plugins: ['interaction',  'dayGrid' ],
          locale: 'es',
          selectable: true,
          <?php if ($cabania_id > 0) { ?>
          select: function(info) {
            $('#modal-abm').modal('show')
            fecha_de_ingreso = info.startStr
            ingreso = new Date(info.endStr)
            var fecha1 = moment(info.startStr);
            var fecha2 = moment(info.endStr);

            fecha_de_egreso = fecha2.subtract(1, 'd')
            fecha_de_egreso = fecha_de_egreso.format("YYYY-MM-DD")

            nro_de_noches = fecha2.diff(fecha1, 'days');

            crearABM_reserva('a', null, fecha_de_ingreso, fecha_de_egreso, nro_de_noches)
            //alert('selected ' + info.startStr + ' to ' + info.endStr);
          },
          <?php } ?>

          events: [

          <?php foreach ($Reservas as $Reserva) { ?>
            {
              id: '<?php echo $Reserva->id ?>',
              title: '<?php echo $Reserva->nombre.' '.$Reserva->apellido.' (Saldo: '.$gCon->FormatoMoneda($Reserva->saldo).')' ?>',
              start: '<?php echo $Reserva->fecha_de_ingreso ?> <?php echo $Reserva->hora_de_ingreso ?>',
              end: '<?php echo $Reserva->fecha_de_egreso ?> <?php echo $Reserva->hora_de_egreso ?>',
              backgroundColor: '<?php echo $Reserva->colpick_color ?>',
              borderColor: '<?php echo $Reserva->colpick_color ?>'
            }, 
          <?php } ?>

          ],

          eventClick: function(info) {
              window.location.href = "<?php echo env('PATH_PUBLIC')?>Reservas/editar/"+info.event.id;
              //$('#modal-abm').modal('show')
              //crearABM_reserva('m', info.event.id, null, null, null)
          },


        });

        calendar.render();
      });

    </script>
<!-- Page specific script -->



<!-- MODAL ABM -->
  <div class="modal modal fade" id="modal-abm">
    <div class="modal-dialog">
      <div class="modal-content">
        <div class="modal-header">
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span></button>
          <h4 class="modal-title"><div id="modal-titulo">Reserva</div></h4>
        </div>
        <div class="modal-body" id="modal-bodi-abm">

        </div>

      </div>
      <!-- /.modal-content -->
    </div>
    <!-- /.modal-dialog -->
  </div>
<!-- MODAL ABM -->

<!-- FUNCIONES ABM RESERVA -->
  <?php 

    $gen_seteo = array(
        'filtros_por_campo' => null,
        'no_mostrar_campos_abm' => 'user_id|empresa_id|medio_de_cobro_id|otro_medio_de_cobro',
        'gen_url_siguiente' => env('PATH_PUBLIC').'Reservas/editar/nro_de_id',
        'filtros_rel' => array(
            'cliente_id' => 
              [
                'campos' => ['empresa_id'],
                'valores' => [[Auth::user()->empresa_id, NULL]]
              ],
            'caja_id' => 
              [
                'campos' => ['empresa_id'],
                'valores' => [[Auth::user()->empresa_id, NULL]]
              ]
            ),
      );

    if ($cabania_id > 0) {
      $gen_seteo['filtros_por_campo'] = ['cabania_id' => $cabania_id];
    }

  ?>   
       
  <script type="text/javascript">

    function crearABM_reserva(gen_accion, gen_id = null, fecha_de_ingreso = null, fecha_de_egreso = null, nro_de_noches = null) {

      gen_seteo = '<?php echo serialize($gen_seteo) ?>'
      $.ajax({
        url: '<?php echo env('PATH_PUBLIC') ?>abm-reserva',
        type: 'POST',
        dataType: 'html',
        async: true,
        data:{
          _token: "{{ csrf_token() }}",
          gen_modelo: 'Reserva',
          gen_seteo: gen_seteo,
          gen_opcion: '',
          gen_accion: gen_accion,
          gen_id: gen_id,
          fecha_de_ingreso: fecha_de_ingreso,
          fecha_de_egreso: fecha_de_egreso,
          nro_de_noches: nro_de_noches
        },
        success: function success(data, status) {        
          $("#modal-bodi-abm").html(data);

        },
        error: function error(xhr, textStatus, errorThrown) {
            alert(errorThrown);
        }
      });
    }

  </script>
<!-- FUNCIONES ABM RESERVA -->      




@endsection
