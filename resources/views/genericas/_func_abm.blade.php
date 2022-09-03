<?php 

// CAMPOS A OCULTAR
if (isset($gen_seteo['gen_campos_a_ocultar'])) {
  $gen_campos_a_ocultar = $gen_seteo['gen_campos_a_ocultar'];
}
else {
  $gen_campos_a_ocultar = [];  
}

// CAMPOS A OCULTAR
if (isset($gen_seteo['gen_url_siguiente'])) {
  $gen_url_siguiente = $gen_seteo['gen_url_siguiente'];
}
else {
  $gen_url_siguiente = '';  
}

//var_dump($gen_seteo);

// DESHABILITO CAMPOS SI ES BORRAR
if ($gen_accion == 'b') {
  $disabled = 'disabled="disabled"';
}
else {
  $disabled = '';  
}

if ($gen_accion == 'a') {
  $buttonTextSubmit = __('Insertar');
}
if ($gen_accion == 'm') {
  $buttonTextSubmit = __('Modificar');
}
if ($gen_accion == 'b') {
  $buttonTextSubmit = __('Eliminar');
}

$random_id_table = rand(0, 9999999);

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

<link rel="stylesheet" type="text/css" href="<?php echo env('PATH_PUBLIC')?>js/bootstrap-select/css/bootstrap-select.min.css">
<script type="text/javascript" src="<?php echo env('PATH_PUBLIC')?>js/bootstrap-select/js/bootstrap-select.min.js"></script>

<!-- CK Editor -->
<script src="<?php echo env('PATH_PUBLIC')?>bower_components/ckeditor/ckeditor.js"></script>


<!-- moment.min.js -->
<script src="<?php echo env('PATH_PUBLIC')?>js/Moment/moment.min.js"></script>
<script src="<?php echo env('PATH_PUBLIC')?>js/Moment/locale/es.js"></script>
<!-- datetimepicker.js -->
<script src="<?php echo env('PATH_PUBLIC')?>js/bootstrap-datetimepicker/build/js/bootstrap-datetimepicker.min.js"></script>
<link rel="stylesheet" type="text/css" href="<?php echo env('PATH_PUBLIC')?>js/bootstrap-datetimepicker/build/css/bootstrap-datetimepicker.css">


  <div class="panel-body">
    {!! Form::open(array
      (
      'action' => 'GenericController@store', 
      'role' => 'form',
      'method' => 'POST',
      'id' => "form_gen_modelo",
      'enctype' => 'multipart/form-data',
      'class' => 'form-horizontal',
      'ref' => 'form'
      )) 
    !!}

      <div id="app-func-abm_<?php echo $random_id_table ?>">
        <vue-form-generator @validated="onValidated" :schema="schema" :model="model" :options="formOptions"></vue-form-generator>      
        <input type="hidden" name="gen_modelo" value="<?php echo $gen_modelo ?>">
        <input type="hidden" name="gen_accion" value="<?php echo $gen_accion ?>">
        <input type="hidden" name="gen_id" value="<?php echo $gen_id ?>">
        <input type="hidden" name="gen_opcion" value="<?php echo $gen_opcion ?>">
        <input type="hidden" name="gen_url_siguiente" value="<?php echo $gen_url_siguiente ?>">
        <input type="hidden" name="gen_seteo" value='<?php echo serialize($gen_seteo) ?>'>
        
        <!--div class="col-lg-12">            
            <pre>@{{ $data }}</pre>
        </div-->  
        
      </div>

    {!! Form::close() !!}

  <!--div class="panel panel-default">
    <div class="panel-heading">Model</div>
    <div class="panel-body">
      <pre v-if="model" v-html="prettyJSON(model)"></pre>
    </div>
  </div-->

</div>


<script type="text/javascript">
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
  el: "#app-func-abm_<?php echo $random_id_table ?>",
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
      if (!isValid) {
          event.preventDefault();  
      }     
      console.log('isValid: '+isValid)
    }
  },

  data: {
    model: {
    <?php 
    foreach ($schema_vfg as $schema) {
      if (!in_array($schema['nombre'], $gen_campos_a_ocultar)) { 
        // ASIGNO EL VALOR DEL CAMPO SI ES MODIFICACION O BAJA
        echo $schema['nombre'].": ".$schema['valor_del_campo'].",";
      }
    }        
    ?>
      gen_modelo: '<?php echo $gen_modelo ?>',
      gen_accion: '<?php echo $gen_accion ?>',
      gen_id: '<?php echo $gen_id ?>',
      empresa_id: '1'    
    },
    schema: {
      fields: [
      <?php 
      foreach ($schema_vfg as $schema) {
        echo $schema['schema']; 
      }?>
        {
          type: "submit",
          label: "",
          buttonText: "<?php echo $buttonTextSubmit ?>",
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

</script>


<script type="text/javascript">

    $.fn.datepicker.dates['es'] = {
      days: ["<?php echo __('Domingo') ?>", "<?php echo __('Lunes') ?>", "<?php echo __('Martes') ?>", "<?php echo __('Miércoles') ?>", "<?php echo __('Jueves') ?>", "<?php echo __('Viernes') ?>", "<?php echo __('Sábado') ?>"],
      daysShort: ["Dom", "Lun", "Mar", "Mié", "Jue", "Vie", "Sáb"],
      daysMin: ["Do", "Lu", "Ma", "Mi", "Ju", "Vi", "Sa"],
      months: ["<?php echo __('Enero') ?>", "<?php echo __('Febrero') ?>", "<?php echo __('Marzo') ?>", "<?php echo __('Abril') ?>", "<?php echo __('Mayo') ?>", "<?php echo __('Junio') ?>", "<?php echo __('Julio') ?>", "<?php echo __('Agosto') ?>", "<?php echo __('Septiembre') ?>", "<?php echo __('Octubre') ?>", "<?php echo __('Noviembre') ?>", "<?php echo __('Diciembre') ?>"],
      monthsShort: ["Ene", "Feb", "Mar", "Abr", "May", "Jun", "Jul", "Ago", "Sep", "Oct", "Nov", "Dic"],
      today: "Hoy",
      monthsTitle: "Meses",
      clear: "Borrar",
      weekStart: 1,
      format: "dd/mm/yyyy"
    };

    //console.log($.fn.datepicker.defaults)

    //$.fn.datepicker.defaults.language = 'es';
    //$('#ultima_actualizacion').datepicker(null);
</script>



<!--script src="<?php echo env('PATH_PUBLIC')?>js/particulares/scripts_particulares.js"></script-->
<?php 
$filtros_por_campo = array();
if (isset($gen_seteo['filtros_por_campo'])) {
  $filtros_por_campo = $gen_seteo['filtros_por_campo'];
}
App::make('App\Http\Controllers\ScriptsParticularesController')->scripts_particulares($gen_modelo, $filtros_por_campo);
?>


<?php 
App::make('App\Http\Controllers\GenericController')->generarScriptTextareaParaRTF($gen_modelo);
?>
