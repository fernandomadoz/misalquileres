<?php

namespace App\Http\Controllers;
use App\Empresa;
use App\Cabania;
use App\Venta;
use App\Imagen_de_cabania;
use App\Imagen_de_venta;

use Auth;
use Mail;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Schema;
use Illuminate\Support\Facades\DB;
use App\Http\Controllers\GenericController;
use App\Mail\NotificacionEmail;

class SiteController extends Controller
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

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Http\Response
     */



    public function index($empresa_id)
    {   
        $Empresa = Empresa::find($empresa_id);
        $Cabanias = Cabania::where("empresa_id", $empresa_id)->get();
        $Ventas = Venta::where("empresa_id", $empresa_id)->get();

        $mostrar_ventas = 'NO';
        if (count($Ventas) > 0) {
            $mostrar_ventas = 'SI';
        }
        //$Imagenes_de_cabania = Imagen_de_cabania::whereRaw('cabania_id = '.$cabania_id)->get();
        

        return View('site/index')
        ->with('Empresa', $Empresa)
        ->with('Cabanias', $Cabanias)
        ->with('Ventas', $Ventas)
        ->with('mostrar_ventas', $mostrar_ventas);
    }

    public function verPropiedad($tipo, $id)
    {   
        if ($tipo == 'a') {
            $Propiedad = Cabania::find($id);
            $Imagenes = Imagen_de_cabania::where('cabania_id', $id)->get();
        }
        if ($tipo == 'v') {
            $Propiedad = Venta::find($id);
            $Imagenes = Imagen_de_venta::where('venta_id', $id)->get();
        }

        $Empresa = Empresa::find($Propiedad->empresa_id);
        return View('site/ver-propiedad')
        ->with('Empresa', $Empresa)
        ->with('Imagenes', $Imagenes)
        ->with('Propiedad', $Propiedad);
    }



}
