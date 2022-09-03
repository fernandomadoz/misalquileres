<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Ingreso extends Model
{
	protected $guarded = ['id'];    

    public function clasificacion_de_ingreso()
    {
        return $this->belongsTo('App\Clasificacion_de_ingreso');
    }

    public function user()
    {
        return $this->belongsTo('App\User');
    }

    public function caja()
    {
        return $this->belongsTo('App\Caja');
    }

    public function reserva()
    {
        return $this->belongsTo('App\Reserva');
    }
}
