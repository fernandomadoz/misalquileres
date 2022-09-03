<?php
namespace App\Http\Controllers;

//accionesPosteriores
use App\User;
use App\Cabania;
use App\Cliente;
use App\Venta;
use App\Medio_de_cobro;
use App\Caja;
use App\Feriado;
use App\Clasificacion_de_egreso;
use App\Clasificacion_de_ingreso;
use App\Ingreso;
use App\Egreso;
use App\Reserva;


use App\Http\Controllers\GenericController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Schema;
use Illuminate\Support\Facades\DB;
use App\Http\Controllers\NotificationController;
use App\Http\Controllers\ExtController;

use Auth;

class ParticularController extends Controller
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


    public function accionesAnteriores($modelo, $accion, $id, $request) {

        $acc_ant_errorInfo = array();
        $acc_ant_mensaje = array();
        $acc_ant_mensaje['error'] = false;

        $id = intval($id);

        

        // INICIO Reserva
        if($modelo == 'Reserva') {
            if ($accion == 'a' or $accion == 'm') {
                $gCon = new GenericController();
                
                $fecha_de_ingreso = $gCon->FormatoFecha($request->fecha_de_ingreso);
                $fecha_de_ingreso_con_hora = $fecha_de_ingreso.' '.$request->hora_de_ingreso.':00';
                $bd_fecha_de_ingreso = "STR_TO_DATE(CONCAT(fecha_de_ingreso, ' ', hora_de_ingreso, ':00'),'%Y-%m-%d %H:%i:%s')";
                $new_fecha_de_ingreso = "STR_TO_DATE('$fecha_de_ingreso_con_hora','%Y-%m-%d %H:%i:%s')";
                
                $fecha_de_egreso = $gCon->FormatoFecha($request->fecha_de_egreso);
                $fecha_de_egreso_con_hora = $fecha_de_egreso.' '.$request->hora_de_egreso.':00';
                $bd_fecha_de_egreso = "STR_TO_DATE(CONCAT(fecha_de_egreso, ' ', hora_de_egreso, ':00'),'%Y-%m-%d %H:%i:%s')";
                $new_fecha_de_egreso = "STR_TO_DATE('$fecha_de_egreso_con_hora','%Y-%m-%d %H:%i:%s')";

                $where_raw_fechas = "(($new_fecha_de_ingreso >= $bd_fecha_de_ingreso AND $new_fecha_de_ingreso <= $bd_fecha_de_egreso)";
                $where_raw_fechas .= " OR ($new_fecha_de_egreso >= $bd_fecha_de_ingreso AND $new_fecha_de_egreso <= $bd_fecha_de_egreso))";


                //STR_TO_DATE('2003-15-10 00:00:00','%Y-%m-%d %H:%i:%s');
                //dd("STR_TO_DATE(CAST(fecha_de_ingreso, ' ', hora_de_ingreso, ':00'),'%Y-%m-%d %H:%i:%s') >= STR_TO_DATE('$fecha_de_ingreso_con_hora','%Y-%m-%d %H:%i:%s') AND fecha_de_egreso <= '$fecha_de_ingreso'");
                
                //DB::enableQueryLog();

                $Reservas_superpuestas = Reserva::
                    where('cabania_id', $request->cabania_id)
                    ->whereRaw($where_raw_fechas)
                    ->get();

                //dd(DB::getQueryLog());

                //dd($Reservas_superpuestas);

                if (count($Reservas_superpuestas) > 0) {
                    $acc_ant_mensaje['error'] = true;
                    $acc_ant_mensaje['detalle'] = 'Esta Reserva se superpone con otra, verifique las fechas y horas de ingreso y egreso';
                    $acc_ant_mensaje['class'] = 'alert-danger';                    
                }
            }
        }
        // FIN Localidad

        

    
    return $acc_ant_mensaje;

    }

    public function accionesPosteriores($modelo, $accion, $id) {
        $id = intval($id);

        // INICIO User
        if($modelo == 'User') {
            if ($accion == 'm') {

                $User = User::find($id);

                if ($User->empresa <> '') {
                    $User->empresa_id = $User->empresa;
                    $User->save();          
                }
            }
        }
        // FIN User

        // INICIO Cabania
        if($modelo == 'Cabania') {
            if ($accion == 'a' and $id <> '-1') {
                $Cabania = Cabania::find($id);
                //dd($id);
                $Cabania->empresa_id = Auth::user()->empresa_id;
                $Cabania->save();          
            }
        }
        // FIN Cabania

        // INICIO Cliente
        if($modelo == 'Cliente') {
            //dd($id);
            if ($accion == 'a' and $id <> '-1') {
                $Cliente = Cliente::find($id);
                //dd($id);
                $Cliente->empresa_id = Auth::user()->empresa_id;
                $Cliente->save();          
            }
        }
        // FIN Cliente


        // INICIO Venta
        if($modelo == 'Venta') {
            if ($accion == 'a' and $id <> '-1') {
                $Venta = Venta::find($id);
                //dd($id);
                $Venta->empresa_id = Auth::user()->empresa_id;
                $Venta->save();          
            }
        }
        // FIN Venta


        // INICIO Medio_de_cobro
        if($modelo == 'Medio_de_cobro') {
            if ($accion == 'a' and $id <> '-1') {
                $Medio_de_cobro = Medio_de_cobro::find($id);
                //dd($id);
                $Medio_de_cobro->empresa_id = Auth::user()->empresa_id;
                $Medio_de_cobro->save();          
            }
        }
        // FIN Medio_de_cobro


        // INICIO Caja
        if($modelo == 'Caja') {
            if ($accion == 'a' and $id <> '-1') {
                $Caja = Caja::find($id);
                //dd($id);
                $Caja->empresa_id = Auth::user()->empresa_id;
                $Caja->save();          
            }
        }
        // FIN Caja


        // INICIO Feriado
        if($modelo == 'Feriado') {
            if ($accion == 'a' and $id <> '-1') {
                $Feriado = Feriado::find($id);
                //dd($id);
                $Feriado->empresa_id = Auth::user()->empresa_id;
                $Feriado->save();          
            }
        }
        // FIN Feriado


        // INICIO Clasificacion_de_egreso
        if($modelo == 'Clasificacion_de_egreso') {
            if ($accion == 'a' and $id <> '-1') {
                $Clasificacion_de_egreso = Clasificacion_de_egreso::find($id);
                //dd($id);
                $Clasificacion_de_egreso->empresa_id = Auth::user()->empresa_id;
                $Clasificacion_de_egreso->save();          
            }
        }
        // FIN Clasificacion_de_egreso


        // INICIO Clasificacion_de_ingreso
        if($modelo == 'Clasificacion_de_ingreso') {
            if ($accion == 'a' and $id <> '-1') {
                $Clasificacion_de_ingreso = Clasificacion_de_ingreso::find($id);
                //dd($id);
                $Clasificacion_de_ingreso->empresa_id = Auth::user()->empresa_id;
                $Clasificacion_de_ingreso->save();          
            }
        }
        // FIN Clasificacion_de_ingreso


        // INICIO Ingreso
        if($modelo == 'Ingreso') {
            if ($accion == 'a' and $id <> '-1') {
                $Ingreso = Ingreso::find($id);
                //dd($id);
                $Ingreso->user_id = Auth::user()->id;
                $Ingreso->save();          
            }
        }
        // FIN Ingreso


        // INICIO Egreso
        if($modelo == 'Egreso') {
            if ($accion == 'a' and $id <> '-1') {
                $Egreso = Egreso::find($id);
                //dd($id);
                $Egreso->user_id = Auth::user()->id;
                $Egreso->save();          
            }
        }
        // FIN Egreso


        // INICIO Reserva
        if($modelo == 'Reserva') {
            if ($accion == 'a' and $id <> '-1' and $id <> 0) {
                $Reserva = Reserva::find($id);
                //dd($id);
                $Reserva->user_id = Auth::user()->id;
                $Reserva->empresa_id = Auth::user()->empresa_id;
                $Reserva->save();          

                if ($Reserva->comision_cobrada > 0) {
                    $Egreso = New Egreso;                    
                    $Egreso->clasificacion_de_egreso_id = 1;
                    $now = new \DateTime();
                    $Egreso->fecha = $now->format('Y-m-d H:i:s');
                    $Egreso->moneda_importe = $Reserva->comision_cobrada;
                    $Egreso->reserva_id = $Reserva->id;
                    $Egreso->user_id = Auth::user()->id;
                    $Egreso->save();                    
                }      

                if ($Reserva->reserva_cobrada > 0) {
                    $Ingreso = New Ingreso;              
                    $Ingreso->clasificacion_de_ingreso_id = 2;                    
                    $now = new \DateTime();
                    $Ingreso->fecha = $now->format('Y-m-d H:i:s');
                    $Ingreso->moneda_importe = $Reserva->reserva_cobrada;
                    $Ingreso->reserva_id = $Reserva->id;
                    $Ingreso->user_id = Auth::user()->id;
                    $Ingreso->caja_id = 1;
                    $Ingreso->save();                    
                }
            }
        }
        // FIN Reserva



    }

}
