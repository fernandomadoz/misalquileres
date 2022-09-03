@extends('layouts.backend')

@section('contenido')

<?php 
if (!isset($paso)) {
  $paso = 1;
}

$steps = 6;
$width_step = 19.5; 
$width_progress_bar = $width_step*($paso-1);

$url_btn_volver = 'javascript:window.history.back();';

if ($paso == 1) {
  $url = env('PATH_PUBLIC').'Reservas/crear/listar-clientes-para-seleccion';
  $titulo = 'Seleccione el Cliente';
}
if ($paso == 2) {
  $titulo = 'Indique la Forma de Pago';

  $anticipo = 0;
  if ($Reserva->anticipo > 0) {
    $anticipo = $Reserva->anticipo;
  }

  if ($Reserva->sino_contado == '') {
    $sino_contado = 'SI';
  }
  else {
    $sino_contado = $Reserva->sino_contado;
  }

  $cuotas_anticipo = 1;
  if ($Reserva->cuotas_anticipo > 0) {
    $cuotas_anticipo = $Reserva->cuotas_anticipo;
  }

  if ($Reserva->fecha_de_contrato <> '') {
    $fecha_de_contrato = 'moment("'.$Reserva->fecha_de_contrato.'").format("DD/MM/YYYY")';
    $fecha_de_contrato_modal = $fecha_de_contrato;
    $habilitar_imprimir_contrato = 'true';
  }
  else {
    $fecha_de_contrato = "null";
    $fecha_de_contrato_modal = "moment().format('DD/MM/YYYY')";
    $habilitar_imprimir_contrato = 'false';
  }


  if ($Reserva->fecha_de_cancelacion_del_anticipo <> '') {
    $fecha_de_cancelacion_del_anticipo = 'moment("'.$Reserva->fecha_de_cancelacion_del_anticipo.'").toDate()';
  }
  else {
    $fecha_de_cancelacion_del_anticipo = "null";
  }

  $max_cant_cuotas_contrato = 72;
  if (isset($Reserva->Lista_de_precio)) {    
    $lista_de_precio_id = $Reserva->Lista_de_precio->id;
    $forma_de_pago_id = $Reserva->Lista_de_precio->Forma_de_pago->id;
    if ($lista_de_precio_id == 1) {
      $mostrar_calcular_cuotas_contrato = 'false';
    }
    if ($lista_de_precio_id == 2) {
      $mostrar_calcular_cuotas_contrato = 'true';
      $max_cant_cuotas_contrato = 12;
      $a_distribuir = $Reserva->valor_total/2;
    }
    if ($lista_de_precio_id == 3) {
      $mostrar_calcular_cuotas_contrato = 'true';
      $a_distribuir = $Reserva->valor_total;
    }
    if ($lista_de_precio_id == 4) {
      $mostrar_calcular_cuotas_contrato = 'true';
      $a_distribuir = $Reserva->valor_total - $anticipo;
    }
  }
  else {
    $lista_de_precio_id = 'null';
    $forma_de_pago_id =  'null';
  }
  



}
if ($paso == 5) {
  $url_btn_volver = env('PATH_PUBLIC').'Reservas/crear/elegir-forma-de-pago/'.$reserva_id;
  $titulo = 'Resumen de la Reserva (id: '.$reserva_id.')';
}
if ($paso == 6) {
  $titulo = 'Envio de Reserva (id: '.$reserva_id.')';
}

use \App\Http\Controllers\GenericController; 
$gCont = new GenericController;

$rol_de_usuario_id = Auth::user()->rol_de_usuario_id;
?>

<style>
.wrapper {
background-color: white !important;
}
</style>


<!-- vue.js -->
<script src="<?php echo env('PATH_PUBLIC')?>js/vue/vue.js"></script>
<script src="<?php echo env('PATH_PUBLIC')?>js/vee-validate/dist/vee-validate.js"></script>
<script src="<?php echo env('PATH_PUBLIC')?>js/vee-validate/dist/locale/es.js"></script>
<script type="text/javascript" src="<?php echo env('PATH_PUBLIC')?>js/vue-form-generator/vfg.js"></script>
<link rel="stylesheet" type="text/css" href="<?php echo env('PATH_PUBLIC')?>js/vue-form-generator/vfg.css">

<script src="https://cdn.jsdelivr.net/vue.resource/1.3.1/vue-resource.min.js"></script>

<link rel="stylesheet" type="text/css" href="<?php echo env('PATH_PUBLIC')?>js/bootstrap-select/css/bootstrap-select.min.css">
<script type="text/javascript" src="<?php echo env('PATH_PUBLIC')?>js/bootstrap-select/js/bootstrap-select.min.js"></script>

<!-- bootstrap slider -->
<link rel="stylesheet" href="<?php echo env('PATH_PUBLIC')?>plugins/bootstrap-slider/slider.css">

<link rel="stylesheet" href="<?php echo env('PATH_PUBLIC')?>css/style.css">


<!-- moment.min.js -->
<script src="<?php echo env('PATH_PUBLIC')?>js/Moment/moment.min.js"></script>
<!-- datetimepicker.js -->
<script src="<?php echo env('PATH_PUBLIC')?>js/bootstrap-datetimepicker/build/js/bootstrap-datetimepicker.min.js"></script>
<link rel="stylesheet" type="text/css" href="<?php echo env('PATH_PUBLIC')?>js/bootstrap-datetimepicker/build/css/bootstrap-datetimepicker.css">



<!-- Content Header (Page header) -->
<section class="content-header">
<h1>
  Nueva Soliciud
  <small>Asistente</small>
</h1>
<ol class="breadcrumb">
  <li><a href="<?php echo env('PATH_PUBLIC')?>"><i class="fa fa-home"></i> Home</a></li>
  <li><a href="<?php echo env('PATH_PUBLIC')?>Reservas/list">Reservas</a></li>
  <li class="active">Nueva Reserva</li>
</ol>
</section>

<!-- Main content -->
<section class="content">
<div class="row">
  <div class="col-xs-12">
    <div class="box box-primary">

      <div class="box-header col-xs-12 col-md-2 col-lg-2" style="z-index: 1">
        <a href="<?php echo $url_btn_volver ?>">
          <button type="button" class="btn btn-success btn-lg"><i class="fa fa-step-backward"></i> Volver</button>
        </a>    
      </div>  

      <div class="box-header col-xs-12 col-md-10 col-lg-10" style="margin-bottom: 100px; width: 80%">

        <!-- SLIDER -->
        <div class="slider slider-horizontal" id="green" style="margin-top: 20px; margin-bottom: 50px;  margin-left: 20px; box-shadow: none; background: none">
          <div class="slider-track">
            <div class="slider-selection" style="left: 0%; width: <?php echo $width_progress_bar; ?>%;"></div>
            <!--div class="slider-handle min-slider-handle round">0</div-->
            <?php 
            $left_step = 0;
            for($i=1; $i<=$steps; $i++) { 
              if ($i > 1) {
                $left_step = $left_step+$width_step;  
              }
              
              if ($i <= $paso) {
                $class_slider_gris = '';
              }
              else {
                $class_slider_gris = 'slider-gris';
              }

            ?>
            <div class="slider-handle max-slider-handle round <?php echo $class_slider_gris; ?>" style="left: <?php echo $left_step; ?>%"><?php echo $i; ?>
              <div class="txt_paso_info"><br>
                <?php 
                if (isset($pasos_info[$i-1])) {
                  echo $pasos_info[$i-1];
                }
                ?>                    
              </div>
            </div>
            <?php } ?>
          </div>
        </div>

      </div>
      <!-- /.box-header -->
      <div class="col-xs-12 col-md-12 col-lg-12 box-body">
        <div class="row margin">
          <h2><?php echo $titulo; ?></h2>


          <div id="div-contenedor"></div>

            <?php if ($paso == 4) { ?>          

                <div class="panel-body">
                  {!! Form::open(array
                    (
                    'action' => 'ReservaController@GuardarFormaDePagoyResumenParaEnvio', 
                    'role' => 'form',
                    'method' => 'POST',
                    'id' => "form_gen_modelo",
                    'enctype' => 'multipart/form-data',
                    'class' => 'form-vertical',
                    'ref' => 'form'
                    )) 
                  !!}
                  <div id="app">                  
                    <div class="col-md-4 col-sm-6 col-xs-12">

                      <div class="vue-form-generator">
                        <fieldset>
                          <div class="form-group required field-selectEx">
                              <label for="fecha_de_vencimiento_de_la_reserva">Fecha de vencimiento de la reserva</label>
                              <div class='input-group date' id='datetimepicker1'>
                                  <input type="text" id="fecha_de_vencimiento_de_la_reserva" name="fecha_de_vencimiento_de_la_reserva" class="form-control" value="<?php echo $gCont->FormatoFecha($Reserva->fecha_de_vencimiento_de_la_reserva); ?>" />
                                  <span class="input-group-addon">
                                      <span class="glyphicon glyphicon-calendar"></span>
                                  </span>
                              </div>
                              <div class="vue-form-generator">
                                <div class="form-group error">
                                  <div class="errors help-block"><span id="fecha_de_vencimiento_de_la_reserva_error"></span></div>
                                </div>
                              </div>
                          </div>
                        </fieldset>
                        </div>

                        <vue-form-generator @validated="onValidated" :schema="schema" :model="model" :options="formOptions"></vue-form-generator>

                        <fieldset>
                          <div class="form-group required field-selectEx">
                              <div class="vue-form-generator">
                                <div class="form-group error">
                                  <div class="errors help-block"><span id="general_error"></span></div>
                                </div>
                              </div>
                          </div>
                        </fieldset>

                        <input type="hidden" name="reserva_id" value="<?php echo $reserva_id ?>">

                        <!--div class="col-lg-12">            
                            <pre>@{{ $data }}</pre>
                        </div--> 

                      </div>
                    </div>

                    <div class="col-md-1">
                    </div>

                    <div class="col-md-4 col-sm-6 col-xs-12">

                    <div id="app2">
                        <div class="info-box sombra bg-green">
                          <span class="info-box-icon"><i class="fa fa-dollar"></i></span>
                          <div class="info-box-content">
                            <span class="info-box-text">Precio Total</span>
                            <span class="info-box-number">
                              <?php 
                              $readonly = 'readonly="readonly"';
                              if ($rol_de_usuario_id < 3) {
                                $readonly = '';
                              }
                              ?>
                              <input class="form-control" type="number" min="0" name="valor_total" id="valor_total" <?php echo $readonly ?> step="0.01" min="0" value="<?php echo $Reserva->valor_total ?>">
                              <input type="hidden" name="total_de_metros_cuadrados" id="total_de_metros_cuadrados" value="<?php echo $total_de_metros_cuadrados ?>">
                              <input type="hidden" name="valor_total_calculado" id="valor_total_calculado">
                            </span>
                          </div>
                          <!-- /.info-box-content -->
                        </div>
                        <!-- /.info-box -->

                        <div class="vue-form-generator">
                          <div class="form-group error">
                            <div class="errors help-block"><span id="valor_total_error"></span></div>
                          </div>
                        </div>
                      </div>
                    </div>
                {!! Form::close() !!}
              </div>
          <?php } ?>

        </div>

        <?php if ($paso == 3) { ?>

          <div class="col-md-3 col-sm-6 col-xs-12">
            <div class="info-box sombra">
              <span class="info-box-icon"><i class="fa fa-home"></i></span>

              <div class="info-box-content">
                <span class="info-box-text">Superficie Total</span>
                <span class="info-box-number"><?php echo $total_de_metros_cuadrados?> m<sup>2</sup></span>
              </div>
              <!-- /.info-box-content -->
            </div>
            <!-- /.info-box -->
          </div>

          <a href="<?php echo env('PATH_PUBLIC')?>Reservas/crear/elegir-forma-de-pago/<?php echo $reserva_id?>">
            <button type="button" class="btn btn-success btn-lg center-block">Continuar</button>
          </a>
        <?php } ?>

        <?php if ($paso == 5) { ?>
        <br>
          <div class="col-md-6 col-sm-6 col-xs-12">
          <table class="table table-bordered tabla-datos-finales-asistente">
                <tbody>

                <tr>
                  <td>1.</td>
                  <td>Cliente</td>
                  <td><span class="badge bg-light-blue datos-finales-asistente"><?php echo $Reserva->Cliente->nombre ?> <?php echo $Reserva->Cliente->apellido ?></span><br>
                    <span class="badge bg-light-blue datos-finales-asistente"><?php echo $Reserva->Cliente->Tipo_de_documento->tipo_de_documento ?>: <?php echo $Reserva->Cliente->nro_de_documento ?></span><br>
                    <span class="badge bg-light-blue datos-finales-asistente">Domicilio: <?php echo $Reserva->Cliente->domicilio ?></span><br>
                    <span class="badge bg-light-blue datos-finales-asistente">Localidad: <?php echo $Reserva->Cliente->Localidad->localidad ?>, <?php echo $Reserva->Cliente->Localidad->Provincia->provincia ?>, <?php echo $Reserva->Cliente->Localidad->Provincia->Pais->pais ?></span><br>
                    <span class="badge bg-light-blue datos-finales-asistente">Tel Fijo: <?php echo $Reserva->Cliente->telefono_fijo ?> - Celular: <?php echo $Reserva->Cliente->telefono_fijo ?></span><br>
                    <span class="badge bg-light-blue datos-finales-asistente">Email: <?php echo $Reserva->Cliente->email_correo ?></span>
                  </td>
                </tr>

                <tr>
                  <td>2.</td>
                  <td>Modelo<br><?php echo $pasos_info[2] ?></td>
                  <td>
                    <span class="badge bg-light-blue datos-finales-asistente"><?php echo $Reserva->Modelo->modelo ?></span><br>
                  </td>
                </tr>

                <tr>
                  <td>3.</td>
                  <td><?php echo $pasos_info[2] ?></td>
                  <td>
                    <?php foreach ($ComponentesDeModeloReserva as $Componente) { ?> 
                    <span class="badge bg-light-blue datos-finales-asistente"><?php echo $Componente->Articulo->articulo ?> - <?php echo $gCont->formatoNumero($Componente->ancho, 'decimal'); ?> x <?php echo $gCont->formatoNumero($Componente->largo, 'decimal'); ?></span><br>
                    <?php } ?>
                  </td>
                </tr>

                <?php 

                if ($Reserva->anticipo == '') {
                  $anticipo = 0;
                }
                else {
                  $anticipo = $Reserva->anticipo;
                }

                if ($anticipo > 0) {
                  if($Reserva->sino_contado == 'SI') {
                    $detalle_anticipo = 'al Contado';
                  }
                  else {
                    $valor_de_cuota_anticipo = $Reserva->anticipo/$Reserva->cuotas_anticipo;
                    $valor_de_cuota_anticipo = $gCont->formatoNumero($valor_de_cuota_anticipo, 'decimal');
                    $detalle_anticipo = 'en '.$Reserva->cuotas_anticipo.' cuotas de $'.$valor_de_cuota_anticipo;  
                  }
                }
                else {
                  $detalle_anticipo = '';
                }
                ?>
                <tr>
                  <td>4.</td>
                  <td>Forma de Pago</td>
                  <td>
                    <span class="badge bg-green datos-finales-asistente">Valor Total: $ <?php echo $gCont->formatoNumero($Reserva->valor_total, 'decimal') ?></span><br>
                    <span class="badge bg-light-blue datos-finales-asistente">Forma de Pago: <?php echo $Reserva->lista_de_precio->lista_de_precio ?></span><br>
                    <span class="badge bg-light-blue datos-finales-asistente">Anticipo: $ <?php echo $gCont->formatoNumero($anticipo, 'decimal').' '.$detalle_anticipo ?></span><br>
                    <span class="badge bg-light-blue datos-finales-asistente">Vendedor: <?php echo $Reserva->vendedor->nombre ?></span><br>
                    <span class="badge bg-light-blue datos-finales-asistente"><?php echo $Reserva->observaciones ?></span><br>
                  </td>
                </tr>

              </tbody>
            </table>
            <div style="width: 100%">
              <a href="<?php echo env('PATH_PUBLIC')?>Reservas/crear/enviar-reserva/<?php echo $reserva_id?>">
                <button type="button" class="btn btn-success btn-lg">Enviar reserva para aprobacion</button>
              </a>
            </div>
          </div>

        <?php } ?>



        <?php if ($paso == 6) { ?>
          <br><br>
          <div class="alert alert-success alert-dismissible">
            <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
            <h4><i class="icon fa fa-check"></i> Felicitaciones!</h4>
            Reserva enviada satisfactoriamente.
          </div>
          <br><br><br>
          <a href="<?php echo env('PATH_PUBLIC')?>Reservas/crear">
            <button type="button" class="btn btn-success btn-lg center-block">Agregar nueva Reserva</button>
          </a>
        <?php } ?>

      </div>
    </div>
  </div>
</div>
</section>

  
          
<?php if (isset($url)) { ?>
<script type="text/javascript">
$.ajax({
  url: '<?php echo $url?>',
  type: 'POST',
  dataType: 'html',
  async: true,
  data:{
    _token: "{{ csrf_token() }}"
  },
  success: function success(data, status) {        
    $("#div-contenedor").html(data);
  },
  error: function error(xhr, textStatus, errorThrown) {
      alert(errorThrown);
  }
});

</script>
<?php } ?>


<?php if ($paso == 4) { ?>
<script type="text/javascript">

  var app = new Vue({
    el: '#app2',
    data: {
      precio_total: 100
    }
  });


var VueFormGenerator = window.VueFormGenerator;

VueFormGenerator.validators.decimal = function(value, field, model) {
  if (typeof value !== 'undefined') {
    /*
    if (typeof value == 'string') {
      valor = Number(value.replace(",", "."));
    }
    else {
      valor = value;
    }
    */
    valor = value;
    if(isNaN(valor)) {
      return ["No es un valor decimal"];
    }
  }
  return [];
}

var vm = new Vue({
  el: "#app",
  components: {
    "vue-form-generator": VueFormGenerator.component
  },

  methods: {
    prettyJSON: function (json) {
      if (json) {
        json = JSON.stringify(json, undefined, 4);
        json = json.replace(/&/g, "&amp;").replace(/</g, "&lt;").replace(/>/g, "&gt;");
        return json.replace(/("(\\u[a-zA-Z0-9]{4}|\\[^u]|[^\\"])*"(\s*:)?|\b(true|false|null)\b|-?\d+(?:\.\d*)?(?:[eE][+\-]?\d+)?)/g, function (match) {
          var cls = "number";
          if (/^"/.test(match)) {
            if (/:$/.test(match)) {
              cls = "key";
            } else {
              cls = "string";
            }
          } else if (/true|false/.test(match)) {
            cls = "boolean";
          } else if (/null/.test(match)) {
            cls = "null";
          }
          return "<span class=\"" + cls + "\">" + match + "</span>";
        });
      }
    },
    onValidated(isValid, errors) {

      //console.log('isValid: '+isValid)
      var_app = vm["_data"]["model"]
      var general_error = ''
      $("#fecha_de_vencimiento_de_la_reserva_error").html('');
      $("#valor_total_error").html('');
      $("#general_error").html('');

      var fecha_de_vencimiento_de_la_reserva = $("#fecha_de_vencimiento_de_la_reserva").val();
      var valor_total = Number($("#valor_total").val());
      var valor_total_calculado = Number($("#valor_total_calculado").val());
      //event.preventDefault();  

      
      if(valor_total < valor_total_calculado) {
        console.log('error 1')
        $("#valor_total_error").html('El valor ingresado es menor al valor calculado por m<sup>2</sup>, valor m&iacute;nimo: '+valor_total_calculado);
        isValid = false;
      }

      if (var_app.mostrar_anticipo) {

        if(var_app.anticipo > valor_total) {
          console.log('error 2')
          $("#valor_total_error").html('El valor del anticipo no puede ser mayor al valor total de la propiedad');
          isValid = false;
        }

        if(var_app.anticipo < var_app.anticipo_minimo) {
          console.log('error 4')
          general_error = general_error + 'El valor del anticipo debe ser mayor a: '+var_app.anticipo_minimo+' <br>';
          isValid = false;
        }

        if(var_app.fecha_de_cancelacion_del_anticipo == null || !var_app.fecha_de_cancelacion_del_anticipo) {
          console.log('error 4')
          general_error = general_error + 'Debe completar la fecha de cancelación del anticipo<br>';
          isValid = false;
        }
      }

      if(fecha_de_vencimiento_de_la_reserva == '') {
        console.log('error 3')
        $("#fecha_de_vencimiento_de_la_reserva_error").html('Este campo es obligatorio');
        isValid = false;
      }

      if(general_error != '') {
        $("#general_error").html(general_error);
      }

      if (!isValid) {
          event.preventDefault();  
      }     


    }
  },

  data: {
    model: {
      anticipo: <?php echo $anticipo ?>,
      anticipo_minimo: <?php echo $parametro_anticipo_minimo ?>,
      observaciones: '<?php echo $Reserva->observaciones ?>',
      sino_contado: '<?php echo $sino_contado ?>',
      cuotas_anticipo: <?php echo $cuotas_anticipo ?>,
      mostrar_anticipo : false,
      lista_de_precio_id: <?php echo $lista_de_precio_id ?>,
      vendedor_id: null,
      forma_de_pago_id: <?php echo $forma_de_pago_id ?>,
      fecha_de_cancelacion_del_anticipo: <?php echo $fecha_de_cancelacion_del_anticipo ?>
    },
    schema: {
      fields: [

        {
          type: "selectEx",
          label: "Forma de Pago",
          model: "lista_de_precio_id",
          id: "lista_de_precio_id",
          required: true,
          disabled: false,
          inputName: "lista_de_precio_id",
          multi: "true",
          multiSelect: false,
          multiSelect: false,
          selectOptions: { 
            liveSearch: false, 
            size: 'auto' 
          },
          values: function() { 
            return [ 
              <?php 
              echo $valoresSchemaVFG_lista_de_precios;
              ?>            
              ] 
          },
          validator: VueFormGenerator.validators.required,
          onChanged(model, schema, event) {

            $.ajax({
              url: '<?php echo env('PATH_PUBLIC')?>traerValoresPrecio',
              type: 'POST',
              dataType: 'html',
              async: true,
              data:{
                _token: "{{ csrf_token() }}",
                lista_de_precio_id: $('select').val(),
                reserva_id: <?php echo $reserva_id ?>
              },
              success: function success(data, status) {     
                var resultado = data;
                var array_resultado = resultado.split('|');
                valor_total = Number(array_resultado[0]);
                model.forma_de_pago_id = Number(array_resultado[1]);

                $("#valor_total").val(valor_total);
                $("#valor_total_calculado").val(valor_total);
              },
              error: function error(xhr, textStatus, errorThrown) {
                  alert(errorThrown);
              }
            });


          },
        },

        {
          type: "input",       
          inputType: "number",     
          model: "anticipo",    
          label: "Anticipo",    
          required: true,    
          inputName: "anticipo",
          id: "anticipo",
          min: <?php echo $parametro_anticipo_minimo ?>,
          step: 1,
          visible(model) {
                var forma_de_pago_id = model.forma_de_pago_id;
                if (forma_de_pago_id == 1 || forma_de_pago_id == 3) {
                    model.mostrar_anticipo = false;
                    model.anticipo = 0;
                    $(".field-dateTimePicker").css("display", 'none');
                }
                if (forma_de_pago_id == 2 || forma_de_pago_id == 4) {
                    model.mostrar_anticipo = true;
                    $(".field-dateTimePicker").css("display", '');
                }
                return model.mostrar_anticipo;
            },
          validator: VueFormGenerator.validators.required
        },

        {
          type: "dateTimePicker",
          label: "Fecha de cancelacion del anticipo",
          model: "fecha_de_cancelacion_del_anticipo",
          id: "fecha_de_cancelacion_del_anticipo",
          inputName: "fecha_de_cancelacion_del_anticipo",
          required: false,
          placeholder: "",
          min: moment("2019-01-01").toDate(),
          max: moment("2050-01-01").toDate(),
          validator: VueFormGenerator.validators.date,

          dateTimePickerOptions: {
              format: "DD/MM/YYYY"
          },            

          onChanged: function(model, newVal, oldVal, field) {
              model.age = moment().year() - moment(newVal).year();
          }
        },


        {
          type: "switch", 
          model: "sino_contado",     
          label: "Contado",   
          id: "sino_contado_switch",  
          inputName: "sino_contado_switch",          
          textOn: "SI", textOff: "NO", valueOn: "SI", valueOff: "NO",
          visible(model) {
                if (model.anticipo > 0) {
                    mostrar = true;
                }
                else {
                    mostrar = false;
                }
                return mostrar;
            },
        },
        {
          type: "input", 
          inputType: "hidden", 
          model: "sino_contado",
          inputName: "sino_contado",          
          textOn: "SI", textOff: "NO", valueOn: "SI", valueOff: "NO",
          visible(model) {
                if (model.anticipo > 0) {
                    mostrar = true;
                }
                else {
                    mostrar = false;
                }
                return mostrar;
            },
        },
        {
          type: "input",       
          inputType: "number",     
          model: "cuotas_anticipo",    
          label: "Cantidad de Cuotas",    
          required: true,    
          inputName: "cuotas_anticipo",
          min: 1,
          id: "cuotas_anticipo",
          visible(model) {
              if (model.sino_contado == 'SI' || model.anticipo <= 0) {
                  mostrar = false;
              }
              else {
                  mostrar = true;
              }
              return mostrar;
          },
          onChanged(model, schema, event) {
            if (model.cuotas_anticipo > 0) {
              var monto_cuota_anticipo = Number(model.anticipo/model.cuotas_anticipo)
              if(!$("#monto_cuota_anticipo").length) {
                $("#cuotas_anticipo").after('<div id="monto_cuota_anticipo"></div>')
              }            
              $("#monto_cuota_anticipo").html("<p>Valor de la cuota: "+monto_cuota_anticipo.toFixed(2)+"</p>")
            }
            else {
               $("#monto_cuota_anticipo").html("")
            }
          },
          validator: VueFormGenerator.validators.required
        },


        {
          type: "selectEx",
          label: "Vendedor",
          model: "vendedor_id",
          id: "vendedor_id",
          required: true,
          disabled: false,
          inputName: "vendedor_id",
          multi: "true",
          multiSelect: false,
          multiSelect: false,
          selectOptions: { 
            liveSearch: false, 
            size: 'auto' 
          },
          values: function() { 
            return [ 
              <?php 
              echo $valoresSchemaVFG_vendedores;
              ?>            
              ] 
          },
          validator: VueFormGenerator.validators.required,
        },

        {         
          type: "textArea",       
          model: "observaciones",  
          id: "observaciones",  
          label: "Observaciones",   
          inputName: "observaciones", 
          required: false,    
          hint: "Max 250 caracteres",
          max: 250,
          placeholder: "",
          required: false,    
          rows: 4,
          validator: VueFormGenerator.validators.string
        },  
        {
          type: "submit",
          label: "",
          buttonText: "Continuar",
          validateBeforeSubmit: true
        }
      ]
    },


    formOptions: {
      validateAfterLoad: false,
      validateAfterChanged: false
    }
  }
});


$( document ).ready(function() {


  $.fn.datepicker.dates['es'] = {
    days: ["Domingo", "Lunes", "Martes", "Miércoles", "Jueves", "Viernes", "Sábado"],
    daysShort: ["Dom", "Lun", "Mar", "Mié", "Jue", "Vie", "Sáb"],
    daysMin: ["Do", "Lu", "Ma", "Mi", "Ju", "Vi", "Sa"],
    months: ["Enero", "Febrero", "Marzo", "Abril", "Mayo", "Junio", "Julio", "Agosto", "Septiembre", "Octubre", "Noviembre", "Diciembre"],
    monthsShort: ["Ene", "Feb", "Mar", "Abr", "May", "Jun", "Jul", "Ago", "Sep", "Oct", "Nov", "Dic"],
    today: "Hoy",
    monthsTitle: "Meses",
    clear: "Borrar",
    weekStart: 1,
    format: "dd/mm/yyyy"
  };

  
  $.fn.datepicker.defaults.language = 'es';

  $(".field-dateTimePicker").css("display", 'none');
  $("#datetimepicker1").datepicker({
      format: "dd/mm/yyyy"
  });



});


</script>


<?php } ?>

@endsection



