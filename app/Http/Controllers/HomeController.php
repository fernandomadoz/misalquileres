<?php

namespace App\Http\Controllers;
use App\User;
use App\Cabania;
use App\Reserva;


use Auth;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Schema;
use Illuminate\Support\Facades\DB;
use App\Http\Controllers\ExtController;



class HomeController extends Controller
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
    public function index()
    {   
        //$Solicitudes = Solicitud::all();

        $registros_home = $this->registros_home();

        return View('welcome')
        ->with('Reservas_Alarmas', $registros_home['Reservas_Alarmas'])
        ->with('cant_alarmas', $registros_home['cant_alarmas']);
    }



    public function miCuenta()
    {   
        $user_id = Auth::user()->id;
        $User = User::find($user_id);

        return View('mi-cuenta')
        ->with('User', $User)
        ->with('cant_campanias', $cant_campanias)
        ->with('cant_inscripciones', $cant_inscripciones)
        ->with('cant_asistentes', $cant_asistentes);
    }


    public function notificaciones()
    {   
        $cant_solicitudes = 0;

        $registros_home = $this->registros_home();

        $cant_solicitudes = $registros_home['cant_alarmas'];
        return $cant_solicitudes;
    }





    public function registros_home() {

        $Reservas_Alarmas = null;
        $cant_alarmas = 0;
        
        if (Auth::user()->empresa_id <> '') {
            $Reservas_Alarmas = Reserva::whereRaw('(DATEDIFF(fecha_de_ingreso, NOW()) between 0 AND 3) AND cabania_id IN (SELECT id FROM cabanias WHERE empresa_id = '.Auth::user()->empresa_id.')')->get();
        }

        if ($Reservas_Alarmas <> null) {
            $cant_alarmas = count($Reservas_Alarmas);
        }
        
        $array_registros_home =[
            'Reservas_Alarmas' => $Reservas_Alarmas,
            'cant_alarmas' => $cant_alarmas
        ];
        
        return $array_registros_home;


    }

    public function get_idiomas()
    {
        $idiomas = Idioma::all();

        $array = array();
        foreach ($idiomas as $idioma) {
            $array[$idioma->id] = $idioma->idioma;
        }

        return $array;
    }

    public function test($inscripcion_id)
    {
        $Inscripcion = Inscripcion::find($inscripcion_id);
        $url_whatsapp = $Inscripcion->url_whatsapp();
        $test = $url_whatsapp['pedido_de_confirmacion'];

        echo $test;

    }


    public function get_cabanias()
    {
        $Cabanias = Cabania::where('empresa_id', Auth::user()->empresa_id);

        $array = array();
        foreach ($Cabanias as $Cabania) {
            $array[$Cabania->id] = $Cabania->nombre_de_cabania;
        }

        return $array;
    }

}
