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

?>
@extends('layouts.site')



@section('contenido')

    <section class="pd-tb-mini bg-secondary pos-rel" data-rgen-sm="pd-tb-small align-c" style="margin-top: 60px">
      <div class="container typo-light">
        <div class="row gt20 middle-md">
          <div class="col-md-5" data-rgen-sm="mr-b-30" data-animate-in="fadeInLeft">
            <h2 class="title" data-rgen-sm="medium"><?php echo $Propiedad->nombre ?><span style="font-size: 25px; color: yellow"><?php echo $Propiedad->ciudad ?></span></h2>
            <h3 class="title-sub small mr-0" data-rgen-sm="small">
              <?php 
                    
                    $caracteristicas = '';

                    if ($Propiedad->camas <> '') {
                      $caracteristicas .= $Propiedad->camas.' Camas |';
                      }
                    if ($Propiedad->banios <> '') {
                      $caracteristicas .= $Propiedad->banios.' Baños |';
                      }
                    if ($Propiedad->superficie <> '') {
                      $caracteristicas .= $Propiedad->superficie.' m<sup>2</sup> ';
                      }

                    if ($caracteristicas <> '') {
                      echo $caracteristicas.'<hr class="light mr-tb-10">';
                      }

                    ?>
            </h3>
            <p class="mr-0">
                    
                    <?php 
                    
                    if ($Propiedad->descripcion <> '') {
                      echo $Propiedad->descripcion.'<hr class="light mr-tb-10">';
                    }

                    ?>
          </div><!-- // END : column //  -->
          <div class="col-md-3 offset-md-1" data-rgen-sm="mr-b-30" data-animate-in="fadeInRight">
            <div class="info-obj img-l g10 mini mid mr-0" data-rgen-sm="img-t">
              <img src="<?php echo env('PATH_PUBLIC')?>/img/whatsapp-icon.png" style="float: left" >
              <div class="info">
                <p class="mr-0 title-sub small">Llamadas / WhatsApp</p>
                <h3 class="mr-0 title small"><?php echo $celular ?></h3>
              </div>
            </div><!-- info box -->
          </div><!-- // END : column //  -->
          <div class="col-md-3" data-animate-in="fadeInRight|0.1"> 
            <?php 
            $codigo_tel = '549';
            $texto = 'Hola '.$nombre_usuario_celular.', quisiera consultarles por... ';                  
            $etiqueta = 'Envianos un WhatsApp';
            $class_btn = 'btn btn-white solid bdr-2 block';
            $class_icon = 'fa fa-whatsapp';
            $style_btn = 'Background-color: white; color: #000';

            echo $gCon->btn_enviar_wa($celular, $codigo_tel, $texto, $etiqueta, $class_btn, $class_icon, $style_btn);
            ?>

          </div><!-- // END : column //  -->
        </div><!-- // END : row //  -->
      </div><!-- container -->
      <!-- ================================= = Background holder ================================= -->
      <div class="bg-holder full-wh z0">
        <!-- Overlay --> <b data-bgholder="overlay" class="full-wh z5" data-bgcolor="rgba(45, 51, 69, 0)"></b> <!-- Parallax image -->
        <div data-bgholder="parallax" class="full-wh z2"></div> <!-- Background image --> <b data-bgholder="bg-img" class="full-wh bg-cover bg-cc z1"></b>
      </div>
    </section> <!-- ************** END : Call to action section **************  -->


    <section class="pos-rel pd-0" id="home">
      <div class="swiper-gallery">
        <!-- Large images -->
        <div class="swiper-container gallery-top vh100">
          <div class="swiper-wrapper">
            <!-- Slide -->
            <?php if ($Propiedad->img_imagen_principal <> '') { ?>
            <div class="swiper-slide flex-cl" data-slide-bg="<?php echo $Propiedad->img_imagen_principal ?>">
            </div> <!-- Slide -->
            <?php } ?>
            <?php foreach ($Imagenes as $Imagen) { ?>
            <div class="swiper-slide flex-cl" data-slide-bg="<?php echo $Imagen->img_imagen ?>">
            </div> <!-- Slide -->
            <?php } ?>
          </div><!-- /.swiper-wrapper -->
          <!-- Navigation buttons -->
          <div class="swiper-button-prev"><i class="fa fa-angle-left"></i></div>
          <div class="swiper-button-next"><i class="fa fa-angle-right"></i></div>
        </div><!-- /Large images -->
        <!-- Thumb images -->
        <div class="swiper-container gallery-thumbs sm-hide bg-glass-dark-07">
          <div class="swiper-wrapper"> </div><!-- /.swiper-wrapper --> <b class="full-wh bg-glass-dark-03"></b>
        </div><!-- /.Thumb images -->
      </div><!-- /.swiper-gallery -->
    </section> <!-- ************** END : Intro section **************  -->




@endsection
