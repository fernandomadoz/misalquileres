<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Imagen_de_venta extends Model
{
	protected $guarded = ['id'];    

    public function venta()
    {
        return $this->belongsTo('App\Venta');
    }

    protected $table = 'imagenes_de_ventas';
}
