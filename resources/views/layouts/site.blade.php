<?php

use \App\Http\Controllers\GenericController; 
$gCon = new GenericController;

$nombre = $Empresa->nombre;
$celular = $Empresa->celular;
$nombre_usuario_celular = $Empresa->nombre_usuario_celular;
$telefono = $Empresa->telefono;
$domicilio = $Empresa->domicilio;
$logo = $Empresa->logo;
$url_facebook = $Empresa->url_facebook;
$url_instagram = $Empresa->url_instagram;
$email = $Empresa->email_correo_electronico;
$url_youtube = $Empresa->url_youtube;
$url_twitter = $Empresa->url_twitter;

?>

<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title><?php echo $nombre ?></title>
  <!--pageMeta-->
  <!-- Lib CSS -->
  <link href="<?php echo env('PATH_PUBLIC')?>site/lib/bootstrap/css/bootstrap.css" rel="stylesheet">
  <link href="<?php echo env('PATH_PUBLIC')?>site/lib/bootstrap-datetimepicker/css/bootstrap-datetimepicker.min.css" rel="stylesheet">
  <link href="<?php echo env('PATH_PUBLIC')?>site/lib/owl-carousel/owl.css" rel="stylesheet">
  <link href="<?php echo env('PATH_PUBLIC')?>site/lib/Swiper/css/swiper.min.css" rel="stylesheet">
  <link href="<?php echo env('PATH_PUBLIC')?>site/lib/owl-carousel/assets/owl.carousel.min.css" rel="stylesheet">
  <link href="<?php echo env('PATH_PUBLIC')?>site/lib/vegas/vegas.min.css" rel="stylesheet">
  <link href="<?php echo env('PATH_PUBLIC')?>site/lib/Magnific-Popup/magnific-popup.css" rel="stylesheet">
  <link href="<?php echo env('PATH_PUBLIC')?>site/lib/sweetalert/sweetalert2.min.css" rel="stylesheet">
  <link href="<?php echo env('PATH_PUBLIC')?>site/lib/materialize-parallax/materialize-parallax.css" rel="stylesheet"> <!-- Icon fonts -->
  <link href="<?php echo env('PATH_PUBLIC')?>site/fonts/fontawesome-all.min.css" rel="stylesheet">
  <link href="<?php echo env('PATH_PUBLIC')?>site/fonts/pe-icon-7-stroke.css" rel="stylesheet">
  <link href="<?php echo env('PATH_PUBLIC')?>site/fonts/et-line-font.css" rel="stylesheet"> <!-- Template CSS -->
  <link href="<?php echo env('PATH_PUBLIC')?>site/css/animate.css" rel="stylesheet">
  <link href="<?php echo env('PATH_PUBLIC')?>site/css/main.css" rel="stylesheet">
  <link href="<?php echo env('PATH_PUBLIC')?>site/css/rgen-grids.css" rel="stylesheet">
  <link href="<?php echo env('PATH_PUBLIC')?>site/css/helper.css" rel="stylesheet">
  <link href="<?php echo env('PATH_PUBLIC')?>site/css/responsive.css" rel="stylesheet"> <!-- Theme color css -->
  <link href="<?php echo env('PATH_PUBLIC')?>site/css/themes/default.css" rel="stylesheet">
  <link href="<?php echo env('PATH_PUBLIC')?>site/css/template-custom.css" rel="stylesheet"> <!-- Favicons -->
  <link rel="icon" href="images/favicons/favicon.ico">
  <link rel="apple-touch-icon" href="<?php echo env('PATH_PUBLIC')?>site/images/favicons/apple-touch-icon.png">
  <link rel="apple-touch-icon" sizes="72x72" href="<?php echo env('PATH_PUBLIC')?>site/images/favicons/apple-touch-icon-72x72.png">
  <link rel="apple-touch-icon" sizes="114x114" href="<?php echo env('PATH_PUBLIC')?>site/images/favicons/apple-touch-icon-114x114.png"> <!-- HTML5 shim, for IE6-8 support of HTML5 elements. All other JS at the end of file. -->
  <!--[if lt IE 9]>  <script src="<?php echo env('PATH_PUBLIC')?>site/js/html5shiv.js"></script>  <script src="<?php echo env('PATH_PUBLIC')?>site/js/respond.min.js"></script>  <![endif]-->
  <!--[if IE 9 ]><script src="<?php echo env('PATH_PUBLIC')?>site/js/ie-matchmedia.js"></script><![endif]-->
  <!-- Font Awesome -->
  <link rel="stylesheet" href="<?php echo env('PATH_PUBLIC')?>bower_components/font-awesome/css/font-awesome.min.css">
  <!-- Ionicons -->
  <link rel="stylesheet" href="<?php echo env('PATH_PUBLIC')?>bower_components/Ionicons/css/ionicons.min.css">
  
</head>

<body>
  <div class="page-loader"><b class="spinner"></b></div>
  <div id="page" data-linkscroll="y">
    <!--  ************************************************************  * Header  ************************************************************ -->
    <header class="main-head dark" data-bgcolor="rgba(0, 0, 0, 0.5)" data-glass="y" data-sticky="y">
      <div class="container pd-0 min-px-h80" data-rgen-sm="pd-lr-20 h-reset">
        <div class="row gt0 align-items-center head-row">
          <!--=================================     = Logo section     ==================================-->
          <div class="col-md-3 pos-rel"> <a class="nav-handle" data-nav=".m-content" data-navopen="pe-7s-more" data-navclose="pe-7s-close"><i class="pe-7s-more"></i></a>
            <div class="header-logo-wrp"> <a class="header-logo pd-tb-small" href="<?php echo env('PATH_PUBLIC')?>site/<?php echo $Empresa->id ?>"><img src="<?php echo env('PATH_PUBLIC')?>/img/<?php echo $logo ?>" alt="Brand logo"></a> </div>
          </div><!-- // END : Column //  -->
          <!--=================================     = Navigation links     ==================================-->
          <div class="col-md-9 align-r m-content">
            <ul class="row gt20 justify-content-md-end mr-0 align-items-center">
              <li class="col-md-auto">
                <nav class="menu-wrp align-l">
                  <ul class="menu">
                    <!--li class="menu-item"><a href="#properties">Propiedades</a></li-->
                  </ul><!-- // END : Navigation links //  -->
                </nav><!-- // END : Nav //  -->
              </li>
              
              <li class="col-md-auto" data-rgen-sm="pd-0 pd-t-10 align-c"> 

                <span class="txt-white mr-r-20 align-m fs16 bold-3">
                  <img src="<?php echo env('PATH_PUBLIC')?>/img/whatsapp-icon.png" style="float: left; width: 40px" >&nbsp; <?php echo $celular ?>
                </span>

                <li class="col-md-auto" style="float: left; width: 40px"> 
                  <?php 
                  $codigo_tel = '549';
                  $texto = 'Hola '.$nombre_usuario_celular.', quisiera consultarles por... ';                  
                  $etiqueta = 'Envianos un WhatsApp';
                  $class_btn = 'btn btn-lg btn-white mini';
                  $class_icon = 'fa fa-whatsapp';
                  $style_btn = 'Background-color: white; color: #000';

                  echo $gCon->btn_enviar_wa($celular, $codigo_tel, $texto, $etiqueta, $class_btn, $class_icon, $style_btn);
                  ?>
                </li>

              </li>
            </ul>
          </div><!-- // END : Column //  -->
        </div><!-- // END : row //  -->
      </div><!-- // END : container //  -->
    </header> <!-- ************** END : Header **************  -->


    @yield('contenido')


    <!--  ************************************************************  * Footer section  ************************************************************ -->
    <footer class="pos-rel pd-tb-small bg-dark" data-rgen-sm="pd-tb-small">
      <div class="container typo-light" data-rgen-sm="align-c">
        <div class="row gt20 mb20">
          <!--=================================     = Postal address     ==================================-->
          <div class="col-md-3" data-animate-in="fadeIn">
            <p><a href="#" class="inline-block max-px-w150"><img src="<?php echo env('PATH_PUBLIC')?>/img/<?php echo $logo ?>" class="max-px-w140" alt="logo"></a></p>
           
          </div><!-- // END : column //  -->
          <!--=================================     = Quick links     ==================================-->
          <div class="col-md-3" data-animate-in="fadeIn|0.1">
            <h3 class="title mini bold-n">Contáctenos</h3>
            <p class="op-05">
              <strong>Dirección:</strong> <?php echo $domicilio ?><br>
            <strong>Teléfono:</strong> <?php echo $telefono ?><br>
            <strong>Celular:</strong> <?php echo $celular ?><br>
            <strong>Correo Electrónico:</strong> <?php echo $email ?></p>

            <?php if ($url_facebook <> '') { ?>
              <a href="<?php echo $url_facebook ?>" target="_blank" class="sq30 fs16 mr-r-4 rd-2 bg-glass-light-01 iconbox btn-white"><i class="fab fa-facebook-f"></i></a>
            <?php } ?>
            <?php if ($url_twitter <> '') { ?>
              <a href="<?php echo $url_twitter ?>" target="_blank" class="sq30 fs16 mr-r-4 rd-2 bg-glass-light-01 iconbox btn-white"><i class="fab fa-twitter"></i></a>
            <?php } ?>
            <?php if ($url_instagram <> '') { ?>
              <a href="<?php echo $url_instagram ?>" target="_blank" class="sq30 fs16 mr-r-4 rd-2 bg-glass-light-01 iconbox btn-white"><i class="fab fa-instagram"></i></a>
            <?php } ?>
            <?php if ($url_youtube <> '') { ?>
              <a href="<?php echo $url_youtube ?>" target="_blank" class="sq30 fs16 mr-r-4 rd-2 bg-glass-light-01 iconbox btn-white"><i class="fab fa-youtube"></i></a>
            <?php } ?>
          </div>            
          </div><!-- // END : column //  -->
        <hr class="light">
        <p class="mr-0 op-05"><a href="https://www.magnusmultimedios.com.ar" target="_blank">Magnus Multimedios</a> © <span class="copyright-year"></span></p>
      </div> <!-- ================================= = Background holder ================================= -->
      <div class="bg-holder full-wh z0">
        <!-- Overlay --> <b data-bgholder="overlay" class="full-wh z5" data-bgcolor="rgba(45, 51, 69, 0)"></b> <!-- Parallax image -->
        <div data-bgholder="parallax" class="full-wh z2"></div> <!-- Background image --> <b data-bgholder="bg-img" class="full-wh bg-cover bg-cc z1"></b>
      </div>
    </footer><!-- / Footer section -->
    <!-- ************** END : Footer section **************  -->
    <!-- JavaScript -->
    <script>
      /* Use fonts with class name in sequence => f-1, f-2, f-3 .... */
      var fgroup = ['Open Sans:400,300,300italic,400italic,600,700,600italic,700italic,800,800italic', 'Montserrat:400,700', 'Rancho'];
    </script>
  </div> <!-- /#page -->
  <script src="<?php echo env('PATH_PUBLIC')?>site/js/webfonts.js" type="text/javascript"></script>
  <script src="<?php echo env('PATH_PUBLIC')?>site/lib/jquery/jquery-3.3.1.min.js" type="text/javascript"></script>
  <script src="<?php echo env('PATH_PUBLIC')?>site/lib/jquery/jquery-migrate-3.0.0.min.js" type="text/javascript"></script>
  <script src="<?php echo env('PATH_PUBLIC')?>site/lib/jquery/popper.min.js" type="text/javascript"></script>
  <script src="<?php echo env('PATH_PUBLIC')?>site/lib/bootstrap/js/bootstrap.min.js" type="text/javascript"></script>
  <script src="<?php echo env('PATH_PUBLIC')?>site/lib/jquery-smooth-scroll/jquery.smooth-scroll.min.js" type="text/javascript"></script>
  <script src="<?php echo env('PATH_PUBLIC')?>site/lib/jQuery-viewport-checker/jquery.viewportchecker.min.js" type="text/javascript"></script>
  <script src="<?php echo env('PATH_PUBLIC')?>site/lib/Swiper/js/swiper.min.js" type="text/javascript"></script>
  <script src="<?php echo env('PATH_PUBLIC')?>site/lib/owl-carousel/owl.js" type="text/javascript"></script>
  <script src="<?php echo env('PATH_PUBLIC')?>site/lib/Magnific-Popup/jquery.magnific-popup.min.js" type="text/javascript"></script>
  <script src="<?php echo env('PATH_PUBLIC')?>site/lib/isotope/imagesloaded.pkgd.min.js" type="text/javascript"></script>
  <script src="<?php echo env('PATH_PUBLIC')?>site/lib/isotope/isotope.pkgd.min.js" type="text/javascript"></script>
  <script src="<?php echo env('PATH_PUBLIC')?>site/lib/isotope/packery-mode.pkgd.min.js" type="text/javascript"></script>
  <script src="<?php echo env('PATH_PUBLIC')?>site/lib/jQuery-Countdown/jquery-countdown.js" type="text/javascript"></script>
  <script src="<?php echo env('PATH_PUBLIC')?>site/lib/sweetalert/sweetalert2.min.js" type="text/javascript"></script>
  <script src="<?php echo env('PATH_PUBLIC')?>site/lib/jquery-validation/jquery.validate.min.js" type="text/javascript"></script>
  <script src="<?php echo env('PATH_PUBLIC')?>site/lib/youtubebackground/jquery.youtubebackground.js" type="text/javascript"></script>
  <script src="<?php echo env('PATH_PUBLIC')?>site/lib/Vide/jquery.vide.min.js" type="text/javascript"></script>
  <script src="<?php echo env('PATH_PUBLIC')?>site/lib/vegas/vegas.min.js" type="text/javascript"></script>
  <script src="<?php echo env('PATH_PUBLIC')?>site/lib/materialize-parallax/materialize-parallax.js" type="text/javascript"></script>
  <script src="<?php echo env('PATH_PUBLIC')?>site/lib/countUp/countUp.js" type="text/javascript"></script>
  <script src="<?php echo env('PATH_PUBLIC')?>site/lib/stellar/jquery.stellar.min.js" type="text/javascript"></script>
  <script src="<?php echo env('PATH_PUBLIC')?>site/js/enquire.min.js" type="text/javascript"></script>
  <script src="<?php echo env('PATH_PUBLIC')?>site/js/main.js"></script>
</body>

</html>