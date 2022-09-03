@extends('layouts.backend')

@section('contenido')


    <div class="col-lg-12">
      <div id="composicion"></div>
    </div>



<script type="text/javascript">



$.ajax({
  url: '<?php echo env('PATH_PUBLIC')?>reservas/listado-de-cabanias',
  type: 'POST',
  dataType: 'html',
  async: true,
  data:{
    _token: "{{ csrf_token() }}",
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
