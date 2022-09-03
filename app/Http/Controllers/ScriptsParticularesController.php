<?php

namespace App\Http\Controllers;
use App\Idioma;
use App\Solicitud;
use Illuminate\Http\Request;

class ScriptsParticularesController extends Controller
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
    public function scripts_particulares($gen_modelo, $filtros_por_campo)
    {
        $printJavaScript = '<script type="text/javascript">';
        $printJavaScript .= '$(document).ready(function() {';

        if ($gen_modelo == 'Reserva') {          

            $printJavaScript .= "if ($('#gen_accion').val() == 'a') {";
            //no funciona esta linea
            $printJavaScript .= "$('#hora_de_ingreso').val('');";
            $printJavaScript .= "$('#hora_de_egreso').val('');";
            $printJavaScript .= '}';

            

        } 
        
        $printJavaScript .= '});';
        $printJavaScript .= '</script>';

        echo $printJavaScript;
    }

}