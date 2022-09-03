<?php

namespace App\Http\Controllers;
use App\Venta;
use App\Imagen_de_venta;

use Auth;
use Mail;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Schema;
use Illuminate\Support\Facades\DB;
use App\Http\Controllers\GenericController;
use App\Mail\NotificacionEmail;

class VentaController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Http\Response
     */



    public function imagenesDeVenta($venta_id)
    {   
        $Venta = Venta::find($venta_id);
        $Imagenes_de_venta = Imagen_de_venta::whereRaw('venta_id = '.$venta_id)->get();
        
        return View('ventas/imagenes')
        ->with('venta_id', $venta_id)
        ->with('Venta', $Venta)
        ->with('Imagenes_de_venta', $Imagenes_de_venta);
    }



    public function crearListaVenta()
    {
        $gen_modelo = 'Imagen_de_venta';
        $gen_opcion = 0;
        $acciones_extra = array();
        $venta_id = $_POST['venta_id'];
        $gen_seteo['filtros_por_campo'] = array('venta_id' => $venta_id);
        $gen_seteo['gen_url_siguiente'] = 'back';

        $gen_campos_a_ocultar = array('id', 'empresa_id', 'venta_id');
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
            'C',
            'R',
            'U',
            'D'
            ];

        $gen_filas = Imagen_de_venta::where('venta_id', $venta_id)->get();

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

}
