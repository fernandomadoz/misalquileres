<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use App\Http\Controllers\GenericController;

class Reserva extends Model
{
	protected $guarded = ['id'];    

    public function cliente()
    {
        return $this->belongsTo('App\Cliente');
    }

    public function empresa()
    {
        return $this->belongsTo('App\Empresa');
    }
    
    public function cabania()
    {
        return $this->belongsTo('App\Cabania');
    }

    public function caja()
    {
        return $this->belongsTo('App\Caja');
    }

    public function ingresos()
    {
        return $this->hasMany('App\Ingreso');
    }

    public function egresos()
    {
        return $this->hasMany('App\Egreso');
    }

    public function saldo()
    {
        $gCon = new GenericController;
        $saldo = $this->importe_total - $this->importeReserva() - $this->pagosCliente();
        $saldo = $saldo;
        return $saldo;
    }

    public function comisionCobrada()
    {
        if ($this->comision_cobrada > 0) {
            $comision_cobrada = $this->comision_cobrada;
        }
        else {
            $Egresos = $this->egresos();
            $comision_cobrada = $Egresos->where('clasificacion_de_egreso_id', 1)->sum('moneda_importe');
        }

        return $comision_cobrada;
    }

    public function pagosCliente()
    {
        $Ingresos = $this->ingresos();
        $pagos = $Ingresos->where('clasificacion_de_ingreso_id', 1)->sum('moneda_importe');
        return $pagos;
    }


    public function saldoComision()
    {
        $gCon = new GenericController;
        $saldo_comision = $this->comision - $this->comisionCobrada();
        $saldo_comision = $saldo_comision;

        return $saldo_comision;
    }


    public function importeReserva()
    {
        if ($this->reserva_cobrada > 0) {
            $reserva_cobrada = $this->reserva_cobrada;
        }
        else {
            $Ingresos = $this->ingresos();
            $reserva_cobrada = $Ingresos->where('clasificacion_de_ingreso_id', 2)->sum('moneda_importe');
        }

        return $reserva_cobrada;
    }

    public function url_voucher()
    {
        $hash = md5(ENV('PREFIJO_HASH').$this->id);
        $url = env('PATH_PUBLIC').'voucher-reserva/'.$this->id.'/'.$hash;
        return $url;
    }

}