<?php

namespace App\Http\Controllers;
use App\Reserva;
use App\Cliente;
use App\Cabania;
use App\Ingreso;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Schema;
use Illuminate\Support\Facades\DB;
use App\Http\Controllers\GenericController;
use Auth;
use Session;
use App;
use QrCode;



class ReservaController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        //$this->middleware('auth');
    }



    public function calendarioDeReservas($cabania_id)
    {

        $Cabania = Cabania::find($cabania_id);

        if ($Cabania <> null) {
            $titulo = $Cabania->nombre;
        }
        else {
            $titulo = 'Todas las cabañas';
        }

        if ($cabania_id == 0) {       
            $Reservas = DB::table('reservas as r')
            ->select(DB::Raw('r.id, c.nombre cabania, r.fecha_de_ingreso, r.hora_de_ingreso, r.fecha_de_egreso, r.hora_de_egreso, cl.nombre, cl.apellido, c.colpick_color, r.importe_total - r.reserva_cobrada as saldo'))
            ->join('cabanias as c', 'c.id', '=', 'r.cabania_id')
            ->join('clientes as cl', 'cl.id', '=', 'r.cliente_id')
            ->where('c.empresa_id', Auth::user()->empresa_id)
            ->get();
        }
        else {                
            $Reservas = DB::table('reservas as r')
            ->select(DB::Raw('r.id, c.nombre cabania, r.fecha_de_ingreso, r.hora_de_ingreso, r.fecha_de_egreso, r.hora_de_egreso, cl.nombre, cl.apellido, c.colpick_color, r.importe_total - r.reserva_cobrada as saldo'))
            ->join('cabanias as c', 'c.id', '=', 'r.cabania_id')
            ->join('clientes as cl', 'cl.id', '=', 'r.cliente_id')
            ->where('r.cabania_id', $cabania_id)
            ->get();
        }
        //dd($Reservas);
        return View('reservas/calendario-de-reservas')
        ->with('titulo', $titulo)
        ->with('cabania_id', $cabania_id)
        ->with('Reservas', $Reservas);       
    }





    public function reservaABM()
    {
        $GenericController = new GenericController();

        $gen_modelo = $_POST['gen_modelo'];
        $gen_accion = $_POST['gen_accion'];
        $gen_id = $_POST['gen_id'];
        $gen_opcion = $_POST['gen_opcion'];
        $gen_seteo = unserialize(stripslashes($_POST['gen_seteo']));

        $gen_campos_a_ocultar = ['empresa_id'];  
        $gen_seteo['gen_campos_a_ocultar'] = $gen_campos_a_ocultar;

        $no_mostrar_campos_abm = ['empresa_id'];
        $no_mostrar_campos_abm_mas = '';

        if ($gen_opcion > 0) {
            $Opcion = Opcion::where('id', $gen_opcion)->get();
            // Traigo los campos a Ocultar
            $no_mostrar_campos_abm_mas = $Opcion[0]->no_mostrar_campos_abm;
        }            

        if (isset($gen_seteo['no_mostrar_campos_abm'])) {
            $no_mostrar_campos_abm_mas = $gen_seteo['no_mostrar_campos_abm'];
        }

        if ($no_mostrar_campos_abm_mas <> '') {
            $array_no_mostrar_campos_abm_mas = explode('|', $no_mostrar_campos_abm_mas);
            foreach ($array_no_mostrar_campos_abm_mas as $no_mostrar_campo) {
                array_push($no_mostrar_campos_abm, $no_mostrar_campo);  
            } 
        }

        if (isset($gen_seteo['filtros_por_campo'])) {
          $filtros_por_campo = $gen_seteo['filtros_por_campo'];
        }
        else {
          $filtros_por_campo = array();  
        }


        if (isset($gen_seteo['filtros_rel'])) {
            $filtros_rel = $gen_seteo['filtros_rel'];
        }
        else {
          $filtros_rel = array();  
        }

        $gen_permisos = [
            'C',
            'R',
            'U',
            'D'
            ];

        $etiqueta_btn_gen_accion = '';
        if ($gen_accion == 'a') {
            $gen_fila = [];
            $etiqueta_btn_gen_accion = 'Insertar';

            
            $cabania_id = $gen_seteo['filtros_por_campo']['cabania_id'];
            $Cabania = Cabania::find($cabania_id);
            $importe_por_noche = $Cabania->importe_por_noche;

            $fecha_de_ingreso = $_POST['fecha_de_ingreso'];
            $fecha_de_egreso = $_POST['fecha_de_egreso'];
            $nro_de_noches = $_POST['nro_de_noches'];

            $importe_total = $importe_por_noche * $nro_de_noches;
            

            $gen_fila['original']['cabania_id'] = $cabania_id;
            $gen_fila['original']['cliente_id'] = null;
            $gen_fila['original']['fecha_de_ingreso'] = $fecha_de_ingreso;
            $gen_fila['original']['hora_de_ingreso'] = null;
            $gen_fila['original']['fecha_de_egreso'] = $fecha_de_egreso;
            $gen_fila['original']['hora_de_egreso'] = null;
            $gen_fila['original']['nro_de_noches'] = $nro_de_noches;
            $gen_fila['original']['cantidad_de_personas'] = null;
            $gen_fila['original']['importe_por_noche'] = $importe_por_noche;
            $gen_fila['original']['importe_total'] = $importe_total;
            $gen_fila['original']['reserva_cobrada'] = null;
            $gen_fila['original']['caja_id'] = null;
            $gen_fila['original']['vehiculo'] = null;
            $gen_fila['original']['patente'] = null;
            $gen_fila['original']['observaciones'] = null;
            $gen_fila['original']['user_id'] = null;
            $gen_fila['original']['comision'] = null;
            $gen_fila['original']['comision_cobrada'] = null;
            $gen_fila['original']['medio_de_cobro_id'] = null;
            $gen_fila['original']['otro_medio_de_cobro'] = null;
            $gen_fila['original']['empresa_id'] = null;
            $gen_fila['original']['rtf_observaciones'] = null;
            //dd($gen_fila['original']);
        }
        else {
            $gen_fila = call_user_func(array($this->dirModel($gen_modelo), 'find'), $gen_id);    
        }

        if ($gen_accion == 'm') {
            $etiqueta_btn_gen_accion = 'Modificar';
        }        
        
        if ($gen_accion == 'b') {
            $etiqueta_btn_gen_accion = 'Eliminar';
        }
        //$gen_campos = $this->traer_campos($gen_modelo, ['empresa_id']);
        $schema_vfg = $GenericController->traerCamposSchemaVFG($gen_modelo, $gen_accion, $gen_fila, $no_mostrar_campos_abm, $filtros_por_campo, $filtros_rel);

        return View('genericas/func_abm')
        //->with('gen_campos', $gen_campos)
        ->with('gen_modelo', $gen_modelo)
        ->with('gen_fila', $gen_fila)
        ->with('gen_seteo', $gen_seteo)
        ->with('gen_accion', $gen_accion)
        ->with('gen_id', $gen_id)
        ->with('gen_permisos', $gen_permisos)
        ->with('gen_opcion', $gen_opcion)
        ->with('etiqueta_btn_gen_accion', $etiqueta_btn_gen_accion)
        ->with('schema_vfg', $schema_vfg);       
    }


    protected function dirModel($gen_modelo) {
        $dirmodel = 'App\gen_modelo';
        $dirmodel = str_replace("gen_modelo", $gen_modelo, $dirmodel);
        return $dirmodel;
    }




    public function listadoDeReservas()
    {
        $gen_modelo = 'Reserva';
        $gen_opcion = 0;
        $acciones_extra = array();
        $gen_seteo['gen_url_siguiente'] = 'back';

        $gen_campos_a_ocultar = array('id', 'hora_de_ingreso', 'hora_de_egreso', 'nro_de_noches', 'vehiculo', 'patente', 'comision', 'comision_cobrada', 'medio_de_cobro_id', 'otro_medio_de_cobro', 'empresa_id', 'rtf_observaciones');
        if ($gen_opcion > 0) {
            $Opcion = Opcion::where('id', $gen_opcion)->get();

            // Traigo los campos a Ocultar
            $campos_a_ocultar_array = explode('|', $Opcion[0]->no_listar_campos);
            foreach ($campos_a_ocultar_array as $campos_a_ocultar) {
                array_push($gen_campos_a_ocultar, $campos_a_ocultar);  
            }

            // Traigo las acciones extra
            $acciones_extra = explode('|', $Opcion[0]->acciones_extra);

        }        
        $GenericController = new GenericController();
        $gen_campos = $GenericController->traer_campos($gen_modelo, $gen_campos_a_ocultar);
        $gen_permisos = [
            'D',
            'R',
            ];

        $gen_filas = Reserva::whereRaw('cabania_id in (Select id From cabanias Where empresa_id = '.Auth::user()->empresa_id.')')->get();

        //$gen_filas = call_user_func(array($this->dirModel($gen_modelo), 'all'), '*');
        //$gen_fila = call_user_func(array($this->dirModel($gen_modelo), 'find'), $gen_id);    

        $gen_nombre_tb_mostrar = $GenericController->nombreDeTablaAMostrar($gen_modelo);

        return View('genericas/func_list')
        ->with('gen_campos', $gen_campos)
        ->with('gen_modelo', $gen_modelo)
        ->with('gen_filas', $gen_filas)
        ->with('gen_seteo', $gen_seteo)
        ->with('gen_permisos', $gen_permisos)
        ->with('gen_opcion', $gen_opcion)
        ->with('gen_nombre_tb_mostrar', $gen_nombre_tb_mostrar)
        ->with('acciones_extra', $acciones_extra);       
    }




    public function crearReservaElegirCliente($cliente_id)
    {   
        //Session::put('cliente_id', $cliente_id);

        $Reserva = new Reserva;
        $Reserva->cliente_id = $cliente_id;
        $Reserva->user_id = Auth::user()->id;
        $Reserva->empresa_id = Auth::user()->empresa_id;
        $Reserva->save();

        $nombre_del_cliente = "Cliente: ".$Reserva->Cliente->nombre.' '.$Reserva->Cliente->apellido;
        $pasos_info = array($nombre_del_cliente);
        
        return View('reservas/reserva-asistente')
        ->with('Reserva', $Reserva)
        ->with('paso', 2)
        ->with('pasos_info', $pasos_info);               
    }



    public function editarReserva($id)
    {   

        $Reserva = Reserva::find($id);

        return View('reservas/reserva')
        ->with('Reserva', $Reserva);               
    }


    public function voucherReservaPrint($id, $hash) 
    {
        $Reserva = Reserva::find($id);

        $dir_imagen_url = '';

        if (md5(ENV('PREFIJO_HASH').$id) == $hash) {

            $hash = md5(ENV('PREFIJO_HASH').$id);
            $url_qrcode = ENV('PATH_PUBLIC').'voucher-reserva/'.$id.'/'.$hash;
            //echo $url_qrcode;
            $dir_imagen = env('PATH_PUBLIC_INTERNO').'qrcode/voucher-reserva-'.$id.'.png';
            $dir_imagen_url = env('PATH_PUBLIC').'qrcode/voucher-reserva-'.$id.'.png';

            QrCode::format('png');
            QrCode::size(200);
            QrCode::generate($url_qrcode, $dir_imagen);

            if ($Reserva->empresa->logo == '') {
                $dir_img_logo = env('PATH_PUBLIC').'/img/logo.png';
            }
            else {
                $dir_img_logo = env('PATH_PUBLIC').'/img/'.$Reserva->Empresa->logo;
            }

            return View('reservas/voucher-reserva')
            ->with('Reserva', $Reserva)
            ->with('dir_imagen_url', $dir_imagen_url)
            ->with('dir_img_logo', $dir_img_logo);  
        }
        else {
            echo 'ERROR';
        }            
    }


    public function reciboDePagoPrint($id) 
    {
        $Ingreso = Ingreso::find($id);

        $dir_imagen_url = '';
        $hash = md5(ENV('PREFIJO_HASH').$id);
        $url_qrcode = ENV('PATH_PUBLIC').'recibo-de-pago-cliente/'.$id.'/'.$hash;
        //echo $url_qrcode;
        $dir_imagen = env('PATH_PUBLIC_INTERNO').'qrcode/recibo-de-pago-'.$id.'.png';
        $dir_imagen_url = env('PATH_PUBLIC').'qrcode/recibo-de-pago-'.$id.'.png';
        $url_volver = env('PATH_PUBLIC').'Reservas/editar/'.$Ingreso->reserva->id;

        QrCode::format('png');
        QrCode::size(200);
        QrCode::generate($url_qrcode, $dir_imagen);


        if ($Ingreso->reserva->empresa->logo == '') {
            $dir_img_logo = env('PATH_PUBLIC').'/img/logo.png';
        }
        else {
            $dir_img_logo = env('PATH_PUBLIC').'/img/'.$Ingreso->Reserva->Empresa->logo;
        }

        return View('reservas/recibo-de-pago')
        ->with('Ingreso', $Ingreso)
        ->with('dir_imagen_url', $dir_imagen_url)
        ->with('url_qrcode', $url_qrcode)
        ->with('url_volver', $url_volver)
        ->with('dir_img_logo', $dir_img_logo);           
    }


    public function reciboDePagoClientePrint($id, $hash) 
    {
        $Ingreso = Ingreso::find($id);

        $dir_imagen_url = '';

        if (md5(ENV('PREFIJO_HASH').$id) == $hash) {

            $hash = md5(ENV('PREFIJO_HASH').$id);
            $url_qrcode = ENV('PATH_PUBLIC').'recibo-de-pago/'.$id.'/'.$hash;
            //echo $url_qrcode;
            $dir_imagen = env('PATH_PUBLIC_INTERNO').'qrcode/recibo-de-pago-'.$id.'.png';
            $dir_imagen_url = env('PATH_PUBLIC').'qrcode/recibo-de-pago-'.$id.'.png';

            QrCode::format('png');
            QrCode::size(200);
            QrCode::generate($url_qrcode, $dir_imagen);

            if ($Ingreso->reserva->empresa->logo == '') {
                $dir_img_logo = env('PATH_PUBLIC').'/img/logo.png';
            }
            else {
                $dir_img_logo = env('PATH_PUBLIC').'/img/'.$Ingreso->Reserva->Empresa->logo;
            }

            return View('reservas/recibo-de-pago')
            ->with('Ingreso', $Ingreso)
            ->with('dir_imagen_url', $dir_imagen_url)
            ->with('url_qrcode', $url_qrcode)
            ->with('dir_img_logo', $dir_img_logo);  
        }
        else {
            echo 'ERROR';
        }            
    }


}

