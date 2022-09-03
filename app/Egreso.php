<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Egreso extends Model
{
	protected $guarded = ['id'];    

    public function clasificacion_de_egreso()
    {
        return $this->belongsTo('App\Clasificacion_de_egreso');
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
