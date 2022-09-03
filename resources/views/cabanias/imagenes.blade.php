@extends('layouts.backend')

@section('contenido')


<div id="cabania" style="padding: 15px;">
  <!-- Default box -->
  <div class="box">
    <div class="box-header with-border">
      <h3 class="box-title">Cabaña: <?php echo $Cabania['nombre'] ?></h3>

    </div>
    <div class="box-body" style="">       
    <!-- /.box-body -->
      <div class="col-lg-6">
        <div class="col-lg-12">
         <div class="callout callout-info">
            <p><?php echo $Cabania['rtf_caracteristicas'] ?></p>
          </div>
        </div>        
          <div class="col-lg-12">
            <div id="carousel-example-generic" class="carousel slide" data-ride="carousel" data-interval="999999999">
              <ol class="carousel-indicators">
                <li data-target="#carousel-example-generic" data-slide-to="0" class="active"></li>
                <li data-target="#carousel-example-generic" data-slide-to="1"></li>
                <?php 
                $i = 0;
                foreach ($Imagenes_de_cabania as $Imagen) {
                  $i++;
                ?>
                <li data-target="#carousel-example-generic" data-slide-to="<?php echo $i ?>" class=""></li>
                <?php } ?>
              </ol>
              <div class="carousel-inner">
                <div class="item active">
                  <img src="<?php echo $Cabania['img_imagen_principal'] ?>">
                </div>
                <?php foreach ($Imagenes_de_cabania as $Imagen_de_cabania) { ?>
                <div class="item">
                  <img src="<?php echo $Imagen_de_cabania['img_imagen'] ?>">
                </div>
                <?php } ?>
              </div>
              <a class="left carousel-control" href="#carousel-example-generic" data-slide="prev">
                <span class="fa fa-angle-left"></span>
              </a>
              <a class="right carousel-control" href="#carousel-example-generic" data-slide="next">
                <span class="fa fa-angle-right"></span>
              </a>
            </div>
          </div>
      </div>   

    <div class="col-lg-6">
      <div id="composicion"></div>
    </div>

    </div>
    <!-- /.box -->

  </div>
</div>


          
          




<script type="text/javascript">



$.ajax({
  url: '<?php echo env('PATH_PUBLIC')?>crearlistacabania',
  type: 'POST',
  dataType: 'html',
  async: true,
  data:{
    _token: "{{ csrf_token() }}",
    cabania_id: '<?php echo $cabania_id ?>'
  },
  success: function success(data, status) {        
    $("#composicion").html(data);
  },
  error: function error(xhr, textStatus, errorThrown) {
      alert(errorThrown);
  }
});
</script>

@endsection
