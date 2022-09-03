
<?php 
use \App\Http\Controllers\GenericController; 
$gCon = new GenericController;
?>
@extends('layouts.backend')

@section('contenido')

  <section class="content-header">
    <h1>
      Reserva
      <small><?php echo $Reserva->Cabania->nombre ?> | <?php echo $gCon->FormatoFecha($Reserva->fecha_de_ingreso); ?> al <?php echo $gCon->FormatoFecha($Reserva->fecha_de_egreso); ?></small>
    </h1>
  </section>

  <section class="content">
    <div class="row">



    <!-- RESERVA -->
      <div class="content">
        <div class="row">
          <div class="col-md-12 col-xs-12">
            <div class="box">
              <!-- /.box-header -->
              <div class="box-body no-padding">
                <div class="col-md-12 col-xs-12">

                  <div class="col-md-4 col-xs-12">
                    <table class="table table-hover">
                      <tbody>
                        <tr>
                          <td>Ingreso</td>
                          <td><?php echo $gCon->FormatoFecha($Reserva->fecha_de_ingreso); ?> <?php echo $gCon->FormatoHora($Reserva->hora_de_ingreso); ?></td>
                        </tr>
                        <tr>
                          <td>Egreso</td>
                          <td><?php echo $gCon->FormatoFecha($Reserva->fecha_de_egreso); ?> <?php echo $gCon->FormatoHora($Reserva->hora_de_egreso); ?></td>
                        </tr>
                      </tbody>
                    </table>
                  </div>

                  <div class="col-md-4 col-xs-12">
                    <table class="table table-hover">
                      <tbody>
                        <tr>
                          <td>Nro de Noches</td>
                          <td><?php echo $Reserva->nro_de_noches ?></td>
                        </tr>
                        <tr>
                          <td>Cantidad de Personas</td>
                          <td><?php echo $Reserva->cantidad_de_personas ?></td>
                        </tr>
                      </tbody>
                    </table>
                  </div>

                  <div class="col-md-4 col-xs-12">
                    <table class="table table-hover">
                      <tbody>
                        <tr>
                          <td>Vehiculo</td>
                          <td><?php echo $Reserva->vehiculo ?></td>
                        </tr>
                        <tr>
                          <td>Patente</td>
                          <td><?php echo $Reserva->patente ?></td>
                        </tr>
                      </tbody>
                    </table>
                  </div>

                  <div class="col-md-12 col-xs-12">
                    <table class="table table-hover">
                      <tbody>
                        <tr>
                          <td>Observaciones</td>
                          <td colspan="5"><?php echo $Reserva->observaciones ?></td>
                        </tr>
                      </tbody>
                    </table>
                  </div>

                </div>
              </div>
              <!-- /.box-body -->

                <div style="padding: 20px">
                  <button type="button" class="btn btn-primary btn-md" data-toggle="modal" data-target="#modal-solicitud-abm" onclick="crearABM_solicitud('Reserva', 'm', <?php echo $Reserva->id ?>, 3)">Modificar</button>

                  <?php 
                  $codigo_tel = '549';
                  $texto = 'Hola '.$Reserva->Cliente->nombre.', aqui te enviamos el voucher de tu reserva: '.$Reserva->url_voucher()."\n\n" .'Agradecemos desde ya por elegirnos y te esperamos pronto por aqui.';                  
                  $etiqueta = 'Enviar Voucher de Reserva';
                  $class_btn = 'btn btn-lg btn-danger pull-right';
                  $class_icon = 'fa fa-qrcode';
                  
                  echo $gCon->btn_enviar_wa($Reserva->Cliente->celular, $codigo_tel, $texto, $etiqueta, $class_btn, $class_icon);

                  ?>

                </div>
            </div>
          </div>
        </div>
      </div>
    <!-- RESERVA -->

      <div class="content">
        <div class="row">
          <!-- CLIENTE -->      
            <div class="col-md-4 col-xs-12">
                <!-- Widget: user widget style 1 -->
                <div class="box box-widget widget-user-2">
                  <!-- Add the bg color to the header using any of the bg-* classes -->
                  <div class="widget-user-header bg-yellow">
                    <div class="widget-user-image">
                      <?php 
                      if ($Reserva->Cliente->img_fotografia <> '') {
                        $img_avatar = $Reserva->Cliente->img_fotografia;
                      }
                      else {
                        $img_avatar = env('PATH_PUBLIC').'img/avatar-sin-imagen.png';  
                      }
                      ?>
                      <img class="img-circle" src="<?php echo $img_avatar ?>" alt="Cliente">
                    </div>
                    <!-- /.widget-user-image -->
                    <h3 class="widget-user-username"><?php echo $Reserva->Cliente->nombre ?> <?php echo $Reserva->Cliente->apellido ?></h3>
                    <h5 class="widget-user-desc">
                    <?php echo $gCon->btn_enviar_wa($Reserva->Cliente->celular); ?>
                    </h5>
                  </div>
                  <div class="box-footer no-padding">
                    <table class="table table-hover">
                      <tbody>
                        <tr>
                          <td></td>
                          <td><span class="glyphicon glyphicon-phone"></span> Celular</td>
                          <td><?php echo $Reserva->Cliente->celular ?></td>
                        </tr>
                        <tr>
                          <td></td>
                          <td><span class="glyphicon glyphicon-phone"></span> 2° Telefono</td>
                          <td><?php echo $Reserva->Cliente->telefono_2 ?></td>
                        </tr>
                        <tr>
                          <td></td>
                          <td><span class="glyphicon glyphicon-envelope"></span> Correo</td>
                          <td><?php echo $Reserva->Cliente->email_correo ?></td>
                        </tr>
                        <tr>
                          <td></td>
                          <td><span class="glyphicon glyphicon-map-marker"></span> Localidad</td>
                          <td><?php echo $Reserva->Cliente->localidad ?>, <?php echo $Reserva->Cliente->pais ?></td>
                        </tr>
                        <tr>
                          <td></td>                      
                          <td>
                            <button type="button" class="btn btn-primary btn-md" data-toggle="modal" data-target="#modal-solicitud-abm" onclick="crearABM_solicitud('Cliente', 'm', <?php echo $Reserva->cliente_id ?>, 1)"><?php echo __('Modificar Datos') ?></button>
                          </td>
                          <td>
                            <button type="button" class="btn btn-primary btn-md" data-toggle="modal" data-target="#modal-solicitud-abm" onclick="crearABM_solicitud('Reserva', 'm', <?php echo $Reserva->id ?>, 2)"><?php echo __('Cambiar Cliente') ?></button></td>
                        </tr>
                      </tbody>
                    </table>
                  </div>
                </div>
                <!-- /.widget-user -->
            </div>
          <!-- CLIENTE -->

          <!-- TOTALES -->
            <div class="col-md-4 col-xs-12">
                <!-- Widget: user widget style 1 -->
                <div class="box box-widget widget-user-2">
                  <!-- Add the bg color to the header using any of the bg-* classes -->
                  <div class="widget-user-header bg-green">
                    
                    <!-- /.widget-user-image -->
                    <h3 class="widget-user-username"><i class="fa fa-dollar" style="font-size: 65px"></i> Importes </h3>
                    
                  </div>
                  <div class="box-footer no-padding">
                    <table class="table table-hover">
                      <tbody>
                        <tr>
                          <td></td>
                          <td><i class="fa fa-dollar"></i> Importe Total</td>
                          <td><?php echo $gCon->FormatoMoneda($Reserva->importe_total); ?></td>
                        </tr>
                        <tr>
                          <td></td>
                          <td><i class="fa fa-moon-o"></i> Importe por noche</td>
                          <td><?php echo $gCon->FormatoMoneda($Reserva->importe_por_noche); ?></td>
                        </tr>
                        <tr>
                          <td></td>
                          <td><i class="fa fa-calendar-check-o"></i> Importe Reserva</td>
                          <td><?php echo $gCon->FormatoMoneda($Reserva->importeReserva()); ?></td>
                        </tr>
                        <tr>
                          <td></td>
                          <td><i class="fa fa-money"></i> Pagos del Cliente</td>
                          <td><?php echo $gCon->FormatoMoneda($Reserva->pagosCliente()); ?></td>
                        </tr>
                        <tr>
                          <td></td>
                          <td><i class="fa fa-user"></i> Comision</td>
                          <td><?php echo $gCon->FormatoMoneda($Reserva->comision); ?></td>
                        </tr>
                        <tr>
                          <td></td>
                          <td><i class="fa fa-user"></i> Comision Pagada</td>
                          <td><?php echo $gCon->FormatoMoneda($Reserva->comisionCobrada()); ?></td>
                        </tr>
                        <tr>
                          <td></td>
                          <td style="font-size: 20px">Saldo Comision</td>
                          <td><span class="badge bg-red" style="font-size: 20px"><?php echo $gCon->FormatoMoneda($Reserva->saldoComision()); ?></span></td>
                        </tr>                        
                        <tr>
                          <td></td>
                          <td style="font-size: 20px">Saldo Total</td>
                          <td><span class="badge bg-red" style="font-size: 20px"><?php echo $gCon->FormatoMoneda($Reserva->saldo()); ?></span></td>
                        </tr>
                      </tbody>
                    </table>
                  </div>
                </div>
                <!-- /.widget-user -->
            </div>
          <!-- TOTALES -->

          <!-- CABAÑA -->
            <div class="col-md-4 col-xs-12">
                <!-- Widget: user widget style 1 -->
                <div class="box box-widget widget-user-2">
                  <!-- Add the bg color to the header using any of the bg-* classes -->
                  <div class="widget-user-header bg-red">
                    
                    <!-- /.widget-user-image -->
                    <h3 class="widget-user-username"><i class="fa fa-home" style="font-size: 65px"></i> <?php echo $Reserva->Cabania->nombre ?></h3>
                    
                  </div>
                  <div class="box-footer no-padding">
                    <table class="table table-hover">
                      <tbody>
                        <tr>
                          <td></td>
                          <td><i class="fa fa-users"></i> Capacidad Maxima</td>
                          <td><?php echo $Reserva->Cabania->capacidad_maxima ?></td>
                        </tr>
                        <tr>
                          <td></td>
                          <td><i class="fa fa-dollar"></i> Importe por noche</td>
                          <td><?php echo $Reserva->Cabania->importe_por_noche ?></td>
                        </tr>
                        <tr>
                          <td></td>
                          <td><i class="fa fa-bed"></i> Camas</td>
                          <td><?php echo $Reserva->Cabania->camas ?></td>
                        </tr>
                        <tr>
                          <td></td>
                          <td><span class="glyphicon glyphicon-th-large"></span> Baños</td>
                          <td><?php echo $Reserva->Cabania->banios ?></td>
                        </tr>

                        <tr>
                          <td></td>
                          <td>
                            <button type="button" class="btn btn-primary btn-md" data-toggle="modal" data-target="#modal-solicitud-abm" onclick="crearABM_solicitud('Reserva', 'm', <?php echo $Reserva->id ?>, 4)"><?php echo __('Cambiar Cabaña') ?></button>
                          </td>
                          <td></td>
                        </tr>
                      </tbody>
                    </table>
                  </div>
                </div>
                <!-- /.widget-user -->
            </div>
          <!-- CABAÑA -->
        </div>
      </div>

      <!-- INGRESOS/EGRESOS -->
        <div class="col-md-12">
          <!-- Custom Tabs -->
          <div class="nav-tabs-custom">
            <ul class="nav nav-tabs">
              <li class="active"><a href="#tab_1" data-toggle="tab"><i class="fa fa-arrow-down"></i> Ingresos</a></li>
              <li><a href="#tab_2" data-toggle="tab"><i class="fa fa-arrow-up"></i> Egresos</a></li>
            </ul>
            <div class="tab-content">
              
              <!-- TAB INGRESOS -->
                <div class="tab-pane active" id="tab_1">  

                  <div id="list-ingresos" style="padding-bottom: 30px; "></div>

                  <?php 
                  $gen_seteo = array(
                    'acciones_extra' => array('Enviar Recibo,fa fa-file,recibo-de-pago'),
                    'gen_url_siguiente' => 'back', 
                    'gen_permisos' => ['C','R','U', 'D'],
                    'gen_campos_a_ocultar' => 'reserva_id',
                    'no_mostrar_campos_abm' => 'user_id',
                    'filtros_por_campo' => array(
                        'reserva_id' => $Reserva->id        
                        ),
                    'filtros_rel' => array(
                        'clasificacion_de_ingreso_id' => 
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
                    'filtro_where' => array('reserva_id', '=', $Reserva->id),
                    'mostrar_titulo' => 'NO',
                    'titulo' => '',
                    'tabla_condensada' => 'SI',
                    'table' => [
                      'contenedor' => 'NO',
                      'searching' => 'false',
                      'paging' => 'false',
                      'info' => 'false',
                      'pageLength' => 50
                      ]
                  );

                  ?>
                  <script type="text/javascript">
                    
                    $.ajax({
                      url: '<?php echo env('PATH_PUBLIC')?>crearlista',
                      type: 'POST',
                      dataType: 'html',
                      async: true,
                      data:{
                        _token: "{{ csrf_token() }}",
                        gen_modelo: 'Ingreso',
                        gen_seteo: '<?php echo serialize($gen_seteo) ?>',
                        gen_opcion: ''
                      },
                      success: function success(data, status) {        
                        $("#list-ingresos").html(data);
                      },
                      error: function error(xhr, textStatus, errorThrown) {
                          alert(errorThrown);
                      }
                    });
                  </script>  
                </div>
              <!-- TAB INGRESOS -->

              <!-- TAB EGRESOS -->
                <div class="tab-pane" id="tab_2">
                  <div id="list-egresos" style="padding-bottom: 30px; "></div>

                  <?php 
                  $gen_seteo = array(
                    'gen_url_siguiente' => 'back', 
                    'gen_permisos' => ['C','R','U', 'D'],
                    'gen_campos_a_ocultar' => 'reserva_id',
                    'no_mostrar_campos_abm' => 'user_id',
                    'filtros_por_campo' => array(
                        'reserva_id' => $Reserva->id        
                        ),
                    'filtros_rel' => array(
                        'clasificacion_de_egreso_id' => 
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
                    'filtro_where' => array('reserva_id', '=', $Reserva->id),
                    'mostrar_titulo' => 'NO',
                    'titulo' => '',
                    'tabla_condensada' => 'SI',
                    'table' => [
                      'contenedor' => 'NO',
                      'searching' => 'false',
                      'paging' => 'false',
                      'info' => 'false',
                      'pageLength' => 50
                      ]
                  );

                  ?>
                  <script type="text/javascript">
                    
                    $.ajax({
                      url: '<?php echo env('PATH_PUBLIC')?>crearlista',
                      type: 'POST',
                      dataType: 'html',
                      async: true,
                      data:{
                        _token: "{{ csrf_token() }}",
                        gen_modelo: 'Egreso',
                        gen_seteo: '<?php echo serialize($gen_seteo) ?>',
                        gen_opcion: ''
                      },
                      success: function success(data, status) {        
                        $("#list-egresos").html(data);
                      },
                      error: function error(xhr, textStatus, errorThrown) {
                          alert(errorThrown);
                      }
                    });
                  </script>  
                </div>
              <!-- TAB EGRESOS -->

            </div>
            <!-- /.tab-content -->
          </div>
          <!-- nav-tabs-custom -->
        </div>      
      <!-- INGRESOS/EGRESOS -->

      <!-- TOTALES -->

      <!-- TOTALES -->

      <!-- ACCIONES -->
      <!-- ACCIONES -->

    </div>
  </section>


<!-- MODAL ABM -->
  <div class="modal modal fade" id="modal-solicitud-abm">
    <div class="modal-dialog">
      <div class="modal-content">
        <div class="modal-header">
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span></button>
          <h4 class="modal-title"><div id="modal-titulo">Info Modal</div></h4>
        </div>
        <div class="modal-body" id="modal-bodi-abm">

        </div>

      </div>
      <!-- /.modal-content -->
    </div>
    <!-- /.modal-dialog -->
  </div>
<!-- MODAL ABM -->

<!-- FUNCIONES ABM Y MODIFICAR SOLICITUD -->
  <?php 
  $gen_url_siguiente = env('PATH_PUBLIC').'Reservas/editar/'.$Reserva->id;

  $gen_seteo_cliente_datos = array(
      'gen_url_siguiente' => $gen_url_siguiente, 
      'no_mostrar_campos_abm' => 'user_id|'
    );
  
  $gen_seteo_cliente = array(
      'gen_url_siguiente' => $gen_url_siguiente, 
      'no_mostrar_campos_abm' => 'user_id|cabania_id|fecha_de_ingreso|hora_de_ingreso|fecha_de_egreso|hora_de_egreso|nro_de_noches|cantidad_de_personas|importe_por_noche|importe_total|reserva_cobrada|vehiculo|patente|comision|comision_cobrada|medio_de_cobro_id|otro_medio_de_cobro|rtf_observaciones'
    );

  $gen_seteo_datos = array(
      'gen_url_siguiente' => $gen_url_siguiente, 
      'no_mostrar_campos_abm' => 'user_id|cliente_id|cabania_id|reserva_cobrada|comision_cobrada|medio_de_cobro_id|otro_medio_de_cobro'
    );

  $gen_seteo_cabania = array(
      'gen_url_siguiente' => $gen_url_siguiente, 
      'no_mostrar_campos_abm' => 'user_id|cliente_id|fecha_de_ingreso|hora_de_ingreso|fecha_de_egreso|hora_de_egreso|nro_de_noches|cantidad_de_personas|importe_por_noche|importe_total|reserva_cobrada|vehiculo|patente|comision|comision_cobrada|medio_de_cobro_id|otro_medio_de_cobro|rtf_observaciones'
    );

  ?>   
       
  <script type="text/javascript">

    function crearABM_solicitud(gen_modelo, gen_accion, gen_id = null, tipo) {
      if (tipo == 1) {
        gen_seteo = '<?php echo serialize($gen_seteo_cliente_datos) ?>'
      }
      if (tipo == 2) {
        gen_seteo = '<?php echo serialize($gen_seteo_cliente) ?>'
      }
      if (tipo == 3) {
        gen_seteo = '<?php echo serialize($gen_seteo_datos) ?>'
      }
      if (tipo == 4) {
        gen_seteo = '<?php echo serialize($gen_seteo_cabania) ?>'
      }

      $.ajax({
        url: '<?php echo env('PATH_PUBLIC') ?>crearabm',
        type: 'POST',
        dataType: 'html',
        async: true,
        data:{
          _token: "{{ csrf_token() }}",
          gen_modelo: gen_modelo,
          gen_seteo: gen_seteo,
          gen_opcion: '',
          gen_accion: gen_accion,
          gen_id: gen_id
        },
        success: function success(data, status) {        
          $("#modal-bodi-abm").html(data);
          if (gen_accion == 'a') {
            $("#modal-titulo").html('<?php echo __('Insertar') ?> '+gen_modelo);
          }
          if (gen_accion == 'm') {
            $("#modal-titulo").html('<?php echo __('Modificar') ?> '+gen_modelo);
          }
          if (gen_accion == 'b') {
            $("#modal-titulo").html('<?php echo __('Borrar') ?> '+gen_modelo);
          }

        },
        error: function error(xhr, textStatus, errorThrown) {
            alert(errorThrown);
        }
      });
    }

  </script>
<!-- FUNCIONES ABM Y MODIFICAR SOLICITUD -->      
   


<!-- DataTables -->

  





@endsection
