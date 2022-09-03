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
    <!--  ************************************************************  * Intro section  ************************************************************ -->
    <section class="pos-rel pd-0" id="home">
      <div class="swiper-gallery">
        <!-- Large images -->
        <div class="swiper-container gallery-top vh100">
          <div class="swiper-wrapper">
            <!-- Slide -->
            <?php 
            foreach ($Cabanias as $Cabania) {
              if ($Cabania->img_imagen_principal <> '') {
            ?>
            <div class="swiper-slide flex-cl" data-slide-bg="<?php echo $Cabania->img_imagen_principal ?>">
              <div class="container caption-left align-l">
                <div class="caption delay-0-3s typo-light pos-rel z1 pd-tiny bg-dark max-px-w400 shadow-large"> <strong class="pos-abs t0 r0 tag-text bg-secondary">Alquiler</strong>
                  <h2 class="title small"><a href="http://themeforest.net/item/rgen-landing-pages/13244840?ref=R_GENESIS"><?php echo $Cabania->nombre ?> <span style="font-size: 17px; color: grey"><?php echo $Cabania->ciudad ?></span></a></h2>
                  <hr class="light mr-tb-10">
                  <p class="mr-0">
                    <?php  ?> 
                    <?php 
                    
                    if ($Cabania->descripcion <> '') {
                      echo $Cabania->descripcion.'<hr class="light mr-tb-10">';
                    }

                    $caracteristicas = '';

                    if ($Cabania->camas <> '') {
                      $caracteristicas .= $Cabania->camas.' Camas ';
                      }
                    if ($Cabania->banios <> '') {
                      $caracteristicas .= $Cabania->banios.' Baños ';
                      }
                    if ($Cabania->superficie <> '') {
                      $caracteristicas .= $Cabania->superficie.' m<sup>2</sup> ';
                      }

                    if ($caracteristicas <> '') {
                      echo $caracteristicas.'<hr class="light mr-tb-10">';
                      }

                    ?>
                       
                  </p>
                  <p class="fs36 txt-secondary"><?php echo $gCon->FormatoMoneda($Cabania->importe_por_noche); ?> x Día</p> <a href="<?php echo env('PATH_PUBLIC')?>propiedad/a/<?php echo $Cabania->id ?>" class="btn btn-secondary small popup-contact">Ver Mas</a>
                </div>
              </div>
            </div> <!-- Slide -->
            <?php 
              } 
            }
            ?>
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
    <!--  ************************************************************  * Content section  ************************************************************ -->
    <section class="pos-rel pd-tb-mini" data-rgen-sm="pd-tb-small align-c" id="about">
      <div class="container txt-dark">

      </div> <!-- ================================= = Background holder ================================= -->
      <div class="bg-holder full-wh z0">
        <!-- Overlay --> <b data-bgholder="overlay" class="full-wh z5" data-bgcolor="rgba(45, 51, 69, 0)"></b> <!-- Parallax image -->
        <div data-bgholder="parallax" class="full-wh z2"></div> <!-- Background image --> <b data-bgholder="bg-img" class="full-wh bg-cover bg-cc z1"></b>
      </div>
    </section> <!-- ************** END : Content section **************  -->
    <!--  ************************************************************  * Product section  ************************************************************ -->
    <section class="pos-rel pd-0 pd-tb-small bg-gray" data-rgen-sm="pd-tb-small align-c">
      <!-- Tab structure -->
      <div class="tabs-auto tab-style3 xlarge" data-pn-active="animated fadeIn" data-tb-normal="txt-white" data-tb-active="bg-glass-dark-08 txt-secondary">
        <ul class="tb-list align-c bg-dark ">
          <?php if ($mostrar_ventas == 'SI') { ?>
          <li class="tb">Todo</li>
          <li class="tb">Ventas</li>
          <?php } ?>
          <li class="tb">Alquileres</li>
        </ul><!-- /.tb-list -->
        <div class="tb-content pd-0">
          <?php if ($mostrar_ventas == 'SI') { ?>
            <!-- TODOS -->
            <div class="tb-pn">
              <div class="container pd-tb-small" data-rgen-sm="pd-tb-small">
                <!--=================================       = carousel-widget       ==================================-->
                <div class="carousel-widget ctrl-1">
                  <div class="owl-carousel" data-items="1" data-margin="30" data-xs-items="1" data-sm-items="1" data-md-items="1" data-lg-items="1" data-dots="true" data-autoplay="false" data-center="true" data-nav="true">

                    <?php foreach ($Ventas as $Venta) { ?>
                      <div class="item pd-micro">
                        <div class="row shadow-tiny">
                          <div class="col-md-6"> <a href="<?php echo env('PATH_PUBLIC')?>propiedad/v/<?php echo $Venta->id ?>"><img src="<?php echo $Venta->img_imagen_principal ?>" alt="Image"></a> </div><!-- // END : column //  -->
                          <div class="col-md-6 bg-white">
                            <div class="pd-mini pos-rel" data-rgen-sm="pd-30"> <small class="tag-text pos-abs r0 t0 fs14 bg-default">Venta</small>
                              <h2 class="title small mr-b-30" data-rgen-sm="small"> <a href="<?php echo env('PATH_PUBLIC')?>propiedad/v/<?php echo $Venta->id ?>" target="_blank"><?php echo $Venta->titulo ?></a> </h2>
                              <p><?php echo $Venta->descripcion ?></p>
                              <!--hr class="mr-tb-10">
                              <div class="fs16"> <i class="fa fa-bed"></i> 4 Bed, &nbsp;&nbsp; <i class="fa fa-tint"></i> 2 Bath, &nbsp;&nbsp; <i class="fa fa-building-o"></i> 1908 Sq Ft </div-->
                              <hr class="mr-tb-10">
                              <div class="row gt20 middle-md">
                                <div class="col-md-6 txt-primary" data-rgen-sm="mr-b-20"> <strong class="fs30" data-rgen-sm="fs20">$<?php echo $Venta->importe_de_venta ?></strong> </div><!-- // END : column //  -->
                                <div class="col-md-6 align-r" data-rgen-sm="align-c"> <a href="<?php echo env('PATH_PUBLIC')?>propiedad/v/<?php echo $Venta->id ?>" class="btn btn-primary small bdr-2 bold-4">Ver Mas</a> </div><!-- // END : column //  -->
                              </div><!-- // END : row //  -->
                            </div>
                          </div><!-- // END : column //  -->
                        </div><!-- // END : row //  -->
                      </div><!-- /.item -->
                    <?php } ?>

                    <?php foreach ($Cabanias as $Cabania) { ?>
                      <div class="item pd-micro">
                        <div class="row shadow-tiny">
                          <div class="col-md-6"> <a href="<a href="<?php echo env('PATH_PUBLIC')?>propiedad/a/<?php echo $Cabania->id ?>"><img src="<?php echo $Cabania->img_imagen_principal ?>" alt="Image"></a> </div><!-- // END : column //  -->
                          <div class="col-md-6 bg-white">
                            <div class="pd-mini pos-rel" data-rgen-sm="pd-30"> <small class="tag-text pos-abs r0 t0 fs14 bg-default">Alquiler</small>
                              <h2 class="title small mr-b-30" data-rgen-sm="small"> <a href="<?php echo env('PATH_PUBLIC')?>propiedad/a/<?php echo $Cabania->id ?>" target="_blank"><?php echo $Cabania->nombre ?> <span style="font-size: 17px; color: grey"><?php echo $Cabania->ciudad ?></span></a> </h2>
                              <p><?php echo $Cabania->descripcion ?></p>
                              <!--hr class="mr-tb-10">
                              <div class="fs16"> <i class="fa fa-bed"></i> 4 Bed, &nbsp;&nbsp; <i class="fa fa-tint"></i> 2 Bath, &nbsp;&nbsp; <i class="fa fa-building-o"></i> 1908 Sq Ft </div-->
                              <hr class="mr-tb-10">
                              <div class="row gt20 middle-md">
                                <div class="col-md-6 txt-primary" data-rgen-sm="mr-b-20"> <strong class="fs30" data-rgen-sm="fs20"><?php echo $gCon->FormatoMoneda($Cabania->importe_por_noche); ?> x Día</strong> </div><!-- // END : column //  -->
                                <div class="col-md-6 align-r" data-rgen-sm="align-c"> <a href="<?php echo env('PATH_PUBLIC')?>propiedad/a/<?php echo $Cabania->id ?>" target="_blank" class="btn btn-primary small bdr-2 bold-4">Mas info</a> </div><!-- // END : column //  -->
                              </div><!-- // END : row //  -->
                            </div>
                          </div><!-- // END : column //  -->
                        </div><!-- // END : row //  -->
                      </div><!-- /.item -->
                    <?php } ?>

                  </div><!-- /.owl-carousel -->
                </div><!-- /.carousel-widget -->
              </div>
            </div>

            <!-- VENTAS -->
            <div class="tb-pn">
              <div class="container pd-tb-small" data-rgen-sm="pd-tb-small">
                <ul class="rw eq3 gt30 mb10">
                  <?php foreach ($Ventas as $Venta) { ?>
                    <li class="cl">
                      <div class="info-obj img-t hov-shadow-medium bdr-1 bdr-glass hov-bdr-op-3 anim">
                        <div class="img pos-rel"> <span class="tag-text pos-abs r2 t2 fs11 z1">Venta</span> <strong class="fs16 bg-secondary txt-white pos-abs z1 b2 l2 lh-3 align-c shadow-mini pd-tb-10 pd-lr-20">$<?php echo $Venta->importe_de_venta ?></strong> <a href="<?php echo env('PATH_PUBLIC')?>propiedad/v/<?php echo $Venta->id ?>"><img src="<?php echo $Venta->img_imagen_principal ?>" alt="product image"></a> </div>
                        <div class="info pd-tiny bg-white">
                          <h3 class="title mini"><?php echo $Venta->titulo ?></h3>
                          <p class="mr-0"><?php echo $Venta->descripcion ?></p>
                          <!--hr class="mr-tb-10">
                          <div class="fs14"> <i class="fa fa-bed"></i> 4 Bed, &nbsp;&nbsp; <i class="fa fa-tint"></i> 2 Bath, &nbsp;&nbsp; <i class="fa fa-building-o"></i> 1908 Sq Ft </div-->
                          <hr class="mr-tb-10"> <a href="<?php echo env('PATH_PUBLIC')?>propiedad/v/<?php echo $Venta->id ?>" class="btn btn-dark small">Ver Mas</a>
                        </div>
                      </div><!-- info box -->
                    </li><!-- // END : column //  -->
                  <?php } ?>
                </ul><!-- // END : row //  -->
              </div>
            </div>
          <?php } ?>

            <!-- ALQUILERES -->
            <div class="tb-pn">
              <div class="container pd-tb-small" data-rgen-sm="pd-tb-small">
                <ul class="rw eq3 gt30 mb10">
                  <?php foreach ($Cabanias as $Cabania) { ?>
                    <li class="cl">
                      <div class="info-obj img-t hov-shadow-medium bdr-1 bdr-glass hov-bdr-op-3 anim">
                        <div class="img pos-rel"> <span class="tag-text pos-abs r2 t2 fs11 z1">Alquileres</span> <strong class="fs16 bg-secondary txt-white pos-abs z1 b2 l2 lh-3 align-c shadow-mini pd-tb-10 pd-lr-20"><?php echo $gCon->FormatoMoneda($Cabania->importe_por_noche); ?> x Día</strong> <a href="<?php echo env('PATH_PUBLIC')?>propiedad/a/<?php echo $Cabania->id ?>"><img src="<?php echo $Cabania->img_imagen_principal ?>" alt="product image" style="width: 100%"></a> </div>
                        <div class="info pd-tiny bg-white">
                          <h3 class="title mini"><?php echo $Cabania->nombre ?> <span style="font-size: 17px; color: grey"><?php echo $Cabania->ciudad ?></span></h3>
                          <p class="mr-0"><?php echo $Cabania->descripcion ?></p>
                          <!--hr class="mr-tb-10">
                          <div class="fs14"> <i class="fa fa-bed"></i> 4 Bed, &nbsp;&nbsp; <i class="fa fa-tint"></i> 2 Bath, &nbsp;&nbsp; <i class="fa fa-building-o"></i> 1908 Sq Ft </div-->
                          <hr class="mr-tb-10"> <a href="<?php echo env('PATH_PUBLIC')?>propiedad/a/<?php echo $Cabania->id ?>" class="btn btn-dark small">Ver Mas</a>
                        </div>
                      </div><!-- info box -->
                    </li><!-- // END : column //  -->
                  <?php } ?>
                </ul><!-- // END : row //  -->
              </div>
            </div>

        </div><!-- / tab content wrapper -->
      </div><!-- / tabs-auto -->
    </section> <!-- ************** END : Product section **************  -->
    <!--  ************************************************************  * Call to action section  ************************************************************ -->
    <section class="pd-tb-mini bg-secondary pos-rel" data-rgen-sm="pd-tb-small align-c">
      <div class="container typo-light">
        <div class="row gt20 middle-md">
          <div class="col-md-5" data-rgen-sm="mr-b-30" data-animate-in="fadeInLeft">
            <h2 class="title" data-rgen-sm="medium">Queres que te ayudemos?</h2>
            <h3 class="title-sub small mr-0" data-rgen-sm="small">Llamanos a este numero o envianos un whatsapp haciendo click en el botón.</h3>
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
    <!--  ************************************************************  * Testimonial section  ************************************************************ -->
    <!-- ************** END : Testimonial section **************  -->
    <!--  ************************************************************  * Brand logo sections  ************************************************************ -->
    <!-- ************** END : Brand logo sections **************  -->
    <!--  ************************************************************  * Download section  ************************************************************ -->



@endsection
