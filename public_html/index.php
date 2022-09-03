<!DOCTYPE html>
<!-- 
Template Name: A-Future HTML
Version: 1.0.0
Author: Webstrot
-->
<!--[if IE 8]> <html lang="en" class="ie8 no-js"> <![endif]-->
<!--[if IE 9]> <html lang="en" class="ie9 no-js"> <![endif]-->
<html lang="es">

<head>
    <meta charset="ISO-8859-1">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title> Mis Alquileres - Software de gestión para alquiler de cabañas</title>
    <!-- Place favicon.ico in the root directory -->
    <link rel="icon" type="image/png" sizes="16x16" href="images/favicon.png">

    <!-- font-awesome -->
    <link href="css/font-awesome.min.css" rel="stylesheet">
    <link href="css/fonts.css" rel="stylesheet">
    <!-- Bootstrap -->
    <link href="css/bootstrap.min.css" rel="stylesheet">
    <!-- Animation Css -->
    <link href="css/animate.css" rel="stylesheet">
    <!-- Magnific Popup Css -->
    <link href="css/magnific-popup.css" rel="stylesheet">
    <!-- Owl Carousel -->
    <link href="css/owl.theme.default.css" rel="stylesheet">
    <link href="css/owl.carousel.css" rel="stylesheet">
    <!-- Style CSS -->
    <link href="css/homepage_style_3.css" rel="stylesheet">

      <!-- Facebook Pixel Code -->
      <script>
        !function(f,b,e,v,n,t,s)
        {if(f.fbq)return;n=f.fbq=function(){n.callMethod?
        n.callMethod.apply(n,arguments):n.queue.push(arguments)};
        if(!f._fbq)f._fbq=n;n.push=n;n.loaded=!0;n.version='2.0';
        n.queue=[];t=b.createElement(e);t.async=!0;
        t.src=v;s=b.getElementsByTagName(e)[0];
        s.parentNode.insertBefore(t,s)}(window, document,'script',
        'https://connect.facebook.net/en_US/fbevents.js');
        fbq('init', '1841346882665859');
        fbq('track', 'PageView');
      </script>
      <noscript><img height="1" width="1" style="display:none"
        src="https://www.facebook.com/tr?id=1841346882665859&ev=PageView&noscript=1"
      /></noscript>
      <!-- End Facebook Pixel Code -->
      
      <!-- Global site tag (gtag.js) - Google Analytics -->
      <script async src="https://www.googletagmanager.com/gtag/js?id=UA-2692113-11"></script>
      <script>
        window.dataLayer = window.dataLayer || [];
        function gtag(){dataLayer.push(arguments);}
        gtag('js', new Date());

        gtag('config', 'UA-2692113-11');
      </script>

</head>

<body>

    <a href="javascript:" id="return-to-top"><i class="fa fa-angle-up"></i></a>

    <!-- Preloader -->
    <div id="preloader">
        <div id="status">
            <div class="status-mes"></div>
        </div>
    </div>
    <!--Slider area start here-->
    <div class="slider_main_wrapper">
        <!-- header start -->
        <div class="header">
            <div class="main_menu_wrapper hidden-xs hidden-sm">
            <nav class="navbar mega-menu navbar-default">
                <!-- Brand and toggle get grouped for better mobile display -->
                <div class="container">
                    <div class="navbar-header hidden-xs hidden-sm">
                        <a class="navbar-brand" href="index.php"><img src="images/logo_white.png" alt=""></a>
                    </div>
                    <!-- Collect the nav links, forms, and other content for toggling -->
                    <div class="collapse navbar-collapse">
                        <ul class="nav navbar-nav navbar-right">
                            <li class="active dropdown">
                                <a href="#contacto" >
                                        Contacto
                                    </a>
                            </li>
                            <li class="active dropdown">
                                <a href="#productos" >
                                        Software
                                    </a>
                            </li>
                            <li class="active dropdown">
                                <a href="gestor/" >
                                    <button class="btn btn-default" type="button" style="margin-top: -5px">
                                        Ingresar
                                    </button>
                                </a>
                            </li>

                            <li class="active dropdown sombra">
                                <a href="https://api.whatsapp.com/send?phone=5493804201747&text=Hola%20quisiera%20consultar%20por%20..." target="blank">
                                    Whatsapp
                                        <img src="img/whatsapp-gruvial.png" style="height: 45px; margin-top: -20px" alt="whatsapp gruvial"><span style="margin-top: -40px;font-size: 22px"> 3804201747</span>
                                    </a>
                            </li>
                            <li class="active dropdown">
                                
                                <div class="about_text_wrapper_btn">
                                    <a href="https://api.whatsapp.com/send?phone=5493804201747&text=Hola%20quisiera%20solicitar%20presupuesto%20para%20...">
                                        <button class="btn btn-default" type="button" style="margin-top: 15px">                                        
                                            Solicitar Presupuesto
                                        </button>
                                    </a>                                    
                                </div>
                            </li>

                        </ul>

                    </div>
                    <!-- /.navbar-collapse -->
                </div>
            </nav>
        </div>
        <!-- .site-nav -->
        <div class="mobail_menu_main visible-xs visible-sm">
            <div class="navbar-header">
                <div class="container">
                    <div class="row">
                        <div class="col-lg-6 col-sm-6 col-md-6 col-xs-6">
                            <a class="navbar-brand" href="index.php"><img src="images/logo_white.png" alt=""></a>
                        </div>
                        <div class="col-lg-6 col-sm-6 col-md-6 col-xs-6">
                            <button type="button" class="navbar-toggle collapsed" aria-expanded="false">
                                <span class="sr-only">Toggle navigation</span>
                                <span class="icon-bar"></span>
                                <span class="icon-bar"></span>
                                <span class="icon-bar"></span>
                            </button>
                        </div>
                    </div>
                </div>
            </div>
            <div id="sidebar">
                <a class="sidebar_logo" href="index.php"><img src="images/logo.png" alt=""></a>
                <div id="toggle_close">&times;</div>
                <div id='cssmenu'>
                    <ul>
                        <li>
                            <a href="#contacto">Contacto</a>
                        </li>
                        <li>
                            <a href="#productos">Software</a>
                        </li>
                        <li>
                            <a href="gestor/">Ingresar</a>
                        </li>

                        <li >
                            <a href="https://api.whatsapp.com/send?phone=5493804201747&text=Hola%20quisiera%20consultar%20por%20...">
                                Whatsapp
                                    <img src="img/whatsapp-gruvial.png" style="height: 45px" alt="whatsapp gruvial"><span style="font-size: 22px"> 3804201747</span>
                                </a>
                        </li>

                        <li>                            
                            <a href="https://api.whatsapp.com/send?phone=5493804201747&text=Hola%20quisiera%20solicitar%20presupuesto%20para%20...">
                                <button class="btn btn-default" type="button" style="margin-top: 10px">                                        
                                    Solicitar Presupuesto
                                </button>
                            </a>      
                        </li>

                    </ul>
                </div>
            </div>
        </div>
        </div>
        <!-- header end -->
		
		<div id="carousel-example-generic" class="carousel slide" data-ride="carousel">
			<div class="carousel-inner" role="listbox">
				<div class="item active">
                       <div class="carousel-captions caption-1">
                            <div class="container">
                                <div class="row">
                                    <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                                        <div class="content">
                                            <h1 class="wow fadeInUp animated sombra" data-wow-delay="0.1s">Administras Cabañas y necesitas ayuda para organizarte?</h1>

                                            <p class="wow fadeInUp animated" data-wow-delay="0.4s">Llevas tus anotaciones en cuadernos y archivos excel?<br>
Tenes problemas con la registración de señas, depositos y cobros?<br>
Hay cosas que no registras o no sabes donde las registraste?</p>
                                            <a href="#productos" class="tran3s banner-button wow fadeInUp animated hvr-bounce-to-right" data-wow-delay="0.7s"> Mas info</a>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                </div>      
                <div class="item">
					<div class="carousel-captions caption-2">
						 <div class="container">
                                <div class="row">
                                    <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                                        <div class="content">
                                            <h1 class="wow fadeInUp animated sombra" data-wow-delay="0.1s">Te presentamos misalquileres.com.ar</h1>
											<p class="wow fadeInUp animated" data-wow-delay="0.4s">El sistema en la nube que te hace mas facil la tarea de gestionar tu complejo de cabañas </p>
                                            <a href="#productos" class="tran3s banner-button wow fadeInUp animated hvr-bounce-to-right" data-wow-delay="0.7s"> Mas info</a>
                                        </div>
                                    </div>
                                </div>
                            </div>
					</div>
                 </div>
                 <div class="item">
					<div class="carousel-captions caption-3">
						 <div class="container">
                                <div class="row">
                                    <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                                        <div class="content">
                                            <h1 class="wow fadeInUp animated sombra" data-wow-delay="0.1s">Ademas:</h1>
											<p class="wow fadeInUp animated" data-wow-delay="0.4s">Registración de consumos, gastos, pagos, señas y comisiones<br>
                                                Informes estadísticos, reportes de Ingresos, Egresos, etc.<br>
                                            Alarmas y notificaciones de check-ins próximos para estar preparado</p>
                                            <a href="#productos" class="tran3s banner-button wow fadeInUp animated hvr-bounce-to-right" data-wow-delay="0.7s"> Mas info</a>
                                        </div>
                                    </div>
                                </div>
                            </div>
					</div>		
                 </div>
				 
				<!-- Nevigation --> 
				<div class="carousel-nevigation">
					<a class="prev" href="#carousel-example-generic" role="button" data-slide="prev">
						<i class="fa fa-angle-left" aria-hidden="true"></i>
					</a>
					<a class="next" href="#carousel-example-generic" role="button" data-slide="next">
						<i class="fa fa-angle-right" aria-hidden="true"></i>
					</a>
				</div>
						
				<!-- Indicators --> 
				<ol class="carousel-indicators">
					<li data-target="#carousel-example-generic" data-slide-to="0" class="active">
						<span></span>
					</li>
					<li data-target="#carousel-example-generic" data-slide-to="1">
					<span></span>
					</li>
					<li data-target="#carousel-example-generic" data-slide-to="2" class="">
						<span></span>
					</li>
				</ol>
			</div>
		</div>
        
    </div>
    <!--Slider area end here-->



    <!-- slider_bottom_wrapper start -->
    <div class="slider_bottom_wrapper">
        <div class="container">
            <div class="row">
                <div class="col-lg-8 col-md-12 col-xs-12 col-sm-12 col-lg-offset-2">
                    <div class="section_heading">
                        <h2>Bienvenido al Futuro</h2>
                        <span class="bordered-icon"><i class="fa fa-circle-o"></i></span>
                    </div>
                    <div class="section_content">
                        <p>Hola, te presentamos misalquileres.com.ar<br>
                        El sistema en la nube que te hace mas facil la tarea de gestionar tu complejo de cabañas .</p>
                        <p>Totalmente adaptado a moviles, PC y Tablets</p>
                    </div>
                </div>
                <div class="col-lg-12 col-md-12 col-xs-12 col-sm-12">
                    <div class="slider_bottom_image wow  fadeInUp  animated" data-wow-duration="0.7s" style="visibility: visible; animation-duration: 0.7s; animation-name: fadeInUp;">
                        <img class="img-responsive" src="img/about_img.jpg" alt="global-img">
                    </div>
                </div>

            </div>
        </div>
    </div>
    <!-- slider_bottom_wrapper end -->

    <!-- slider_bottom_wrapper start -->
    <a name="productos">
        <div class="slider_bottom_wrapper">
            <div class="container">
                <div class="row">
                    <div class="col-lg-8 col-md-12 col-xs-12 col-sm-12 col-lg-offset-2">
                        <div class="section_heading">
                            <h2>Conoce las características de nuestro Software</h2>
                            <h3>Los requerimientos para el funcionamiento son mínimos solo debe tener un navegador Web.</h3>
                            <span class="bordered-icon"><i class="fa fa-circle-o"></i></span>
                        </div>
                        <div class="section_content">
                            <p>Interfaz de usuario: amigable, simple, intuitiva y rápida.</p>
                        </div>
                    </div>
                    <div class="col-lg-12 col-md-12 col-xs-12 col-sm-12">
                        <div class="slider_bottom_image wow  fadeInUp  animated" data-wow-duration="0.7s" style="visibility: visible; animation-duration: 0.7s; animation-name: fadeInUp;">
                            <iframe width="600" height="415" src="https://www.youtube.com/embed/0T_2LsCrmzg" frameborder="0" allow="accelerometer; autoplay; encrypted-media; gyroscope; picture-in-picture" allowfullscreen></iframe>

                            <a href="https://api.whatsapp.com/send?phone=5493804201747&text=Hola%20quisiera%20consultar%20por%20el%20software%20mis%20alquileres%20..." >
                                <div class="about_text_wrapper_btn">
                                    <button class="btn_read_more" type="button">Empezar</button>
                                </div>
                            </a>
                            <br><br>
                        </div>
                    </div>

                            

                </div>
            </div>
        </div>
    </a>
    <!-- slider_bottom_wrapper end -->


    <!-- features_wrapper start -->
    <div class="features_wrapper">
        <div class="container">
            <div class="row">
                <div class="col-lg-3 col-md-3 col-xs-12 col-sm-6">
                    <div class="icon_text pink_icon">
                        <i class="fa fa-cloud" aria-hidden="true"></i>
                        <h4 class="text-center"><a href="#">Software en la Nube</a></h4>
                        <p class="text-center">Sistemas sobre plataforma Web accesible desde cualquier lugar las 24hs y los 365 días del año.</p>
                    </div>
                </div>
                <div class="col-lg-3 col-md-3 col-xs-12 col-sm-6">
                    <div class="icon_text blue_icon">
                        <i class="fa fa-eye" aria-hidden="true"></i>
                        <h4 class="text-center"><a href="#">100% Responsive</a></h4>
                        <p class="text-center">Accesible desde Smart-Phones, Computadoras de Escritorio, Laptops, Tablets, y demás dispositivos inteligentes con navegador.</p>
                    </div>
                </div>
                <div class="col-lg-3 col-md-3 col-xs-12 col-sm-6">
                    <div class="icon_text light_blue_icon">
                        <i class="fa fa-star" aria-hidden="true"></i>
                        <h4 class="text-center"><a href="#">Mesa de Ayuda</a></h4>
                        <p class="text-center">Asistencia técnica y mesa de ayuda para ayudarte en todo momento.</p>
                    </div>
                </div>
                <div class="col-lg-3 col-md-3 col-xs-12 col-sm-6">
                    <div class="icon_text purple_icon">
                        <i class="fa fa-user" aria-hidden="true"></i>
                        <h4 class="text-center"><a href="#">Amigable al Usuario</a></h4>
                        <p class="text-center">Interfaz de usuario: amigable, simple, intuitiva y rápida.</p>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- features_wrapper end -->

    <!-- aboutus_bg_wrapper start -->
    <div class="aboutus_bg_wrapper">
        <div class="container">
            <div class="row">
                <div class="col-lg-6 col-md-6 col-xs-12 col-sm-12">
                    <div class="image_wrapper">
                        <img class="img-responsive" src="img/mockup.png" alt="about-img">
                    </div>
                </div>
                <div class="col-lg-6 col-md-6 col-xs-12 col-sm-12">
                    <div class="text_wrapper">
                        <div class="icon_wrapper">
                            <div class="icon_img_wrapper">
                                <div class="icon_img">
                                    <i class="fa fa-qrcode" aria-hidden="true"></i>
                                </div>
                            </div>
                            <div class="icon_content">
                                <h4><a href="#">Tecnología de códigos QR</a></h4>
                                <p>Vouchers y Recibos protegidos contra adulteraciones (protegidos por QR). </p>
                            </div>
                        </div>
                        <div class="icon_wrapper">
                            <div class="icon_img_wrapper">
                                <div class="icon_img">
                                    <i class="fa fa-ticket" aria-hidden="true"></i>
                                </div>
                            </div>
                            <div class="icon_content">
                                <h4><a href="#">Generación Automática</a></h4>
                                <p>Vouchers de reserva<br>
                                    Recibos de pago<br>
                                    Calendario de Ocupación. 
                                </p>
                            </div>
                        </div>
                        <div class="icon_wrapper">
                            <div class="icon_img_wrapper">
                                <div class="icon_img">
                                    <i class="fa fa-line-chart" aria-hidden="true"></i>
                                </div>
                            </div>
                            <div class="icon_content">
                                <h4><a href="#">Ademas</a></h4>
                                <p>Registración de consumos, gastos, pagos, señas y comisiones.<br>
                                    Informes estadísticos, reportes de Ingresos, Egresos, etc.<br>
                                    Alarmas y notificaciones de check-ins próximos para estar preparado  
                                </p>
                            </div>
                        </div>

                            <a href="https://api.whatsapp.com/send?phone=5493804201747&text=Hola%20quisiera%20consultar%20por%20el%20software%20mis%20alquileres%20..." >
                                <div class="about_text_wrapper_btn">
                                    <button class="btn btn-lg btn-default" type="button">Empezar</button>
                                </div>
                            </a>
                            <br><br>
                    </div>
                </div>

            </div>
        </div>

    </div>
    <!-- aboutus_bg_wrapper end -->


    <!-- team_member_section start -->
    <div class="team_member_section">
        <div class="container">
            <div class="row">
                <div class="col-lg-8 col-md-12 col-xs-12 col-sm-12 col-lg-offset-2">
                    <div class="section_heading">
                        <h2>Integración TOTAL con WHATSAPP</h2>
                        <span class="bordered-icon"><i class="fa fa-circle-o"></i></span><br>
                        <img class="img-circle" src="img/whatsapp-img.png" alt="Image">
                    </div>
                    <div class="section_content">
                        <p>Nuestro software está integrado con las funcionalidades de envio de mensajes de WhatsApp, para que la comunicación con tus Cliente sea lo mas fluida y sencilla posible.</p>
                        <p>Sin correos que no llegan, ni demoras, todo en el acto.</p>
                    </div>
                </div>
                <div class="col-lg-12 col-md-12 col-xs-12 col-sm-12">
                    <div class="team_member_slider">
                        <div class="owl-carousel owl-theme">

                            <div class="items">
                                <div class="thumbnail clearfix">
                                    <img class="img-circle" src="img/ticket.png" alt="Image">
                                    
                                    <div class="caption">
                                        <h4><a href="#">Vouchers</a></h4>
                                        <h5>(Whatsapp)</h5>
                                        <p>El sistema genera automáticamente los Vouchers de la reserva, y podes enviarlos mediante tu WhatsApp</p>
                                    </div>
                                </div>
                            </div>

                            <div class="item">
                                <div class="thumbnail clearfix">
                                    <a href="#"><img class="img-circle" src="img/qrcode.png" alt="Image">
                                    </a>
                                    <div class="caption">
                                        <h4><a href="#">Tecnología QR</a></h4>
                                        <h5>(Código de validación)</h5>
                                        <p>Todos los comprovantes, recibos y vouchers cuentan con su correspondiente código QR de validación.</p>
                                    </div>
                                </div>
                            </div>

                            <div class="items">
                                <div class="thumbnail clearfix">
                                    <img class="img-circle" src="img/factura.png" alt="Image">
                                    
                                    <div class="caption">
                                        <h4><a href="#">Recibos</a></h4>
                                        <h5>(Whatsapp)</h5>
                                        <p>El sistema genera automáticamente recibos digitales para todos los pagos, señas, adelantos y gastos del cliente</p>
                                    </div>
                                </div>
                            </div>

                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- team_member_section end -->

    <!-- aboutus_section start -->
    <div class="aboutus_section">
        <br><br><br><br><br>
        <div class="about_image_wrapper">
            <img class="img-responsive" src="img/about_img.jpg" alt="global-img" style="width: 647px; height: 372px">
        </div>
        <div class="about_text_wrapper">
            <h2>Mis alquileres</h2>
            <p>Desarrollado con tecnología de última generación</p>
            <ul>
                <li><span><i class="fa fa-thumbs-o-up" aria-hidden="true"></i></span><a href="#">Multi-usuario: Sistema con identificación mediante usuario y password. Multi usuario y con diferentes roles.</a>
                </li>
                <li><span><i class="fa fa-thumbs-o-up" aria-hidden="true"></i></span><a href="#">Resguardo y Backup de Datos: Servicio de respaldo de archivos y copias de seguridad.</a>
                </li>
                <li><span><i class="fa fa-thumbs-o-up" aria-hidden="true"></i></span><a href="#">Sin inversión de infraestructura: No requiere de inversión tecnológica para su instalación y puesta en marcha.
</a>
                </li>
                <li><span><i class="fa fa-thumbs-o-up" aria-hidden="true"></i></span><a href="#">Requerimientos: Los requerimientos para el funcionamiento son mínimos solo debe tener un navegador Web.</a>
                </li>                
            </ul>
            <!--div class="about_text_wrapper_btn">
                <button class="btn_read_more" type="button">About Us</button>
            </div-->
        </div>
    </div>
    <!-- aboutus_section end -->



    <!-- pricing_section start -->
    <div class="pricing_section">
        <div class="container">
            <div class="row">
                <div class="col-lg-4 col-sm-4 col-md-4 col-xs-12">
                    <div class="pricing-table-default">
                        <div class="pricing-head-blue text-center">
                            <span class="price">Precio</span>
                            <h3>Por el precio no te preocupes, el costo mas bajo del mercado</h3><br>
                            <a href="https://api.whatsapp.com/send?phone=5493804201747&text=Hola%20quisiera%20consultar%20por%20el%20software%20mis%20alquileres%20..." class="btn btn-default">Empezar</a>
                        </div>
                    </div>
                    <!-- /.pricing-table-wrapper -->
                </div>
                <!-- /.col-sm-4 -->

                <div class="col-lg-4 col-sm-4 col-md-4 col-xs-12">
                    <div class="pricing-table-default pink-bg-table">
                        <div class="pricing-head-pink text-center">
                            <span class="price">Gratis</span>
                            <h3>Obtene 1 mes de prueba totalmente gratuito</h3><br>
                            <a href="https://api.whatsapp.com/send?phone=5493804201747&text=Hola%20quisiera%20consultar%20por%20el%20software%20mis%20alquileres%20..." class="btn btn-default">Empezar</a>
                        </div>
                    </div>
                    <!-- /.pricing-table-wrapper -->
                </div>
                <!-- /.col-sm-4 -->

                <div class="col-lg-4 col-sm-4 col-md-4 col-xs-12">
                    <div class="pricing-table-default green-bg-table">
                        <div class="pricing-head-green text-center">
                            <span class="price">Apurate</span>
                            <h3>Que estas esperando. Simplifica tu negocio</h3><br>
                            <a href="https://api.whatsapp.com/send?phone=5493804201747&text=Hola%20quisiera%20consultar%20por%20el%20software%20mis%20alquileres%20..." class="btn btn-default">Empezar</a>
                        </div>
                    </div>
                    <!-- /.pricing-table-wrapper -->
                </div>
                <!-- /.col-sm-4 -->

            </div>
            <!-- /.row -->
        </div>
        <!-- /.container -->
    </div>
    <!-- pricing_section end -->




    <!-- footer-section start -->
    <footer class="footer_section">
        <div class="container">
            <div class="row">
                <div class="col-md-4 col-sm-12">
                    <div class="footer_widget">
                        <h3><a id="contacto"></a>Cont&aacute;ctenos</h3>

                        <p>Comun&iacute;quese con nosotros</p>

                        <address class="footer_address">
                          <ul>
                            <li> <i class="fa fa-envelope-o"></i> <a href="mailto:info@magnusmultimedios.com.ar">info@magnusmultimedios.com.ar</a></li>
                            <li> <i class="fa fa-phone"></i> <span class="phone"><a href="tel:+54-9380-4201747">Cel: 380-15-420-1747</a> <a href="https://api.whatsapp.com/send?phone=5493804201747&text=Hola%20quisiera%20consultar%20por%20...">(WhatsApp click aqu&iacute;)</a></span> </li>
                          </ul>
                        </address>
                        

                    </div>
                </div>
                <!-- /.col-md-4 -->
                <div class="col-md-8 col-sm-12">
                    <div class="footer_widget">

                    </div>
                </div>
                <!-- /.col-md-8 -->


            </div>
            <!-- /.row -->
        </div>
        <!-- /.container -->
    </footer>
    <!-- footer_section end -->

    <!-- copyright_section start -->
    <div class="copyright_section">
        <div class="container">
            <div class="row">
                <div class="col-lg-12 col-md-12 col-xs-12 col-sm-12">
                    <div class="copyright_content">
                        <p>© Creado por: <a href="http://www.magnusmultimedios.com.ar/"> magnusmultimedios.com.ar </a> - todos los derechos reservados</p>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- /.copyright_section end -->

    <!-- Bootstrap core JavaScript
    ================================================== -->
    <!-- Placed at the end of the document so the pages load faster -->

    <!-- Bootstrap js -->
    <script src="js/jquery.min.js"></script>
    <script src="js/bootstrap.min.js"></script>
    <!-- Magnific Popup js -->
    <script src="js/jquery.magnific-popup.js"></script>
    <!-- Owl Carousel js -->
    <script src="js/owl.carousel.js"></script>
    <!-- Portfolio js -->
    <script src="js/jquery.inview.min.js"></script>
    <script src="js/jquery.shuffle.min.js"></script>
	<script src="js/portfolio.js"></script>
    <!-- Counter Pie Chart js -->
    <script src="js/jquery.easypiechart.min.js"></script>
	<!-- wow js -->
    <script src="js/wow.js"></script>
    <!-- homepage js -->
    <script src="js/homepage.js"></script>
    <!-- Custom js -->
    <script src="js/custom.js"></script>
    <!-- slider custom js Start -->


</body>

</html>