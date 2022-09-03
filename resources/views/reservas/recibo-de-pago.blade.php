<?php 
use \App\Http\Controllers\GenericController; 
$gCon = new GenericController;
?>
<!DOCTYPE html>
<html lang="es">

<head>
  
    <!-- Global site tag (gtag.js) - Google Analytics -->
    <script async src="https://www.googletagmanager.com/gtag/js?id=UA-46601315-3"></script>

    <!-- Title Page-->
    <title>Recibo de Pago Mis Alquileres</title>

    <!-- Icons font CSS-->
    <link href="<?php echo env('PATH_PUBLIC')?>templates/2/vendor/mdi-font/css/material-design-iconic-font.min.css" rel="stylesheet" media="all">
    <link href="<?php echo env('PATH_PUBLIC')?>templates/2/vendor/font-awesome-4.7/css/font-awesome.min.css" rel="stylesheet" media="all">
    <!-- Font special for pages-->
    <link href="https://fonts.googleapis.com/css?family=Poppins:100,100i,200,200i,300,300i,400,400i,500,500i,600,600i,700,700i,800,800i,900,900i" rel="stylesheet">

    <!-- Vendor CSS-->
    <link href="<?php echo env('PATH_PUBLIC')?>templates/2/vendor/select2/select2.min.css" rel="stylesheet" media="all">
    <link href="<?php echo env('PATH_PUBLIC')?>templates/2/vendor/datepicker/daterangepicker.css" rel="stylesheet" media="all">

    <!-- Main CSS-->
    <link href="<?php echo env('PATH_PUBLIC')?>templates/2/css/main.css" rel="stylesheet" media="all">

    <!-- Bootstrap 3.3.7 -->
    <link rel="stylesheet" href="<?php echo env('PATH_PUBLIC')?>bower_components/bootstrap/dist/css/bootstrap.min.css">

    <!-- vue.js -->
    <script src="<?php echo env('PATH_PUBLIC')?>js/vue/vue.js"></script>
    <script src="<?php echo env('PATH_PUBLIC')?>js/vee-validate/dist/vee-validate.js"></script>
    <script src="<?php echo env('PATH_PUBLIC')?>js/vee-validate/dist/locale/es.js"></script>
    <link rel="stylesheet" type="text/css" href="<?php echo env('PATH_PUBLIC')?>js/vue-form-generator/vfg.css">



</head>

<body>
    <div class="page-wrapper bg-gra-02 p-t-20 p-b-100 font-poppins">
      <center> <img class="sol-de-acuario-top img-responsive" src="<?php echo $dir_img_logo ?>" alt="Mis Alquileres" title="Mis Alquileres" style ="width: 200px"></center>
        <div class="wrapper wrapper--w960">
            <div class="card card-4">
                <div class="card-body">

                  <div class="row">

                    <div class="col-xs-12 col-md-6 col-lg-6">
                      <center>
                        <h2>Recibo de Pago</h2>
                        <p class="tit1_voucher"><?php echo $Ingreso->reserva->cliente->nombre ?> <?php echo $Ingreso->reserva->cliente->apellido ?> </p>
                        <p>Reserva: <?php echo $Ingreso->reserva->Cabania->nombre ?> | <?php echo $gCon->FormatoFecha($Ingreso->reserva->fecha_de_ingreso); ?> al <?php echo $gCon->FormatoFecha($Ingreso->reserva->fecha_de_egreso); ?> </p>


                        <div class="col-md-12 col-xs-12">
                          <table class="table table-hover">
                            <tbody>
                              <tr>
                                <td>Fecha</td>
                                <td><?php echo $gCon->FormatoFecha($Ingreso->fecha); ?></td>
                              </tr>
                              <tr>
                                <td>Detalle</td>
                                <td><?php echo $Ingreso->detalle ?></td>
                              </tr>
                              <tr>
                                <td>Importe</td>
                                <td><?php echo $gCon->FormatoMoneda($Ingreso->moneda_importe) ?></td>
                              </tr>
                            </tbody>
                          </table>
                        </div>


                      </center>
                    </div>

                    <div class="col-xs-12 col-md-6 col-lg-6">
                      <center><img src="<?php echo $dir_imagen_url ?>"></center>
                    </div>                    
                  </div>


                </div>

                    
                    

                            

              </div><hr>
            

            <?php if (isset($url_volver)) { ?>
              <div class="col-xs-12 col-md-6 col-lg-6">

                <?php 
                $codigo_tel = '549';
                $texto = 'Hola '.$Ingreso->Reserva->Cliente->nombre.', aqui te enviamos nuestro recibo de pago: '.$url_qrcode."\n\n" .'Agradecemos desde ya por elegirnos y te esperamos pronto por aqui.';                  
                $etiqueta = 'Enviar Recibo de Pago';
                $class_btn = 'btn btn-lg btn-danger';
                $class_icon = 'fa fa-qrcode';
                
                echo $gCon->btn_enviar_wa($Ingreso->Reserva->Cliente->celular, $codigo_tel, $texto, $etiqueta, $class_btn, $class_icon);

                ?>
                
                <a href="<?php echo $url_volver ?>">
                  <button type="button" class="btn btn-primary btn-lg" style="margin-left: 20px">Volver</button>
                </a>


              </div>
            <?php } ?>
            </div>

            

            

        </div>
    </div>

    <!-- Jquery JS-->
    <script src="<?php echo env('PATH_PUBLIC')?>templates/2/vendor/jquery/jquery.min.js"></script>
    <!-- Vendor JS-->
    <script src="<?php echo env('PATH_PUBLIC')?>templates/2/vendor/select2/select2.min.js"></script>
    <script src="<?php echo env('PATH_PUBLIC')?>templates/2/vendor/datepicker/moment.min.js"></script>
    <script src="<?php echo env('PATH_PUBLIC')?>templates/2/vendor/datepicker/daterangepicker.js"></script>

    <!-- Main JS-->
    <script src="<?php echo env('PATH_PUBLIC')?>templates/2/js/global.js"></script>

    <!-- Bootstrap 3.3.7 -->
    <script src="<?php echo env('PATH_PUBLIC')?>bower_components/bootstrap/dist/js/bootstrap.min.js"></script>

</body><!-- This templates was made by Colorlib (https://colorlib.com) -->

</html>
<!-- end document-->