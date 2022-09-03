<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Imagen_de_cabania extends Model
{
	protected $guarded = ['id'];    

    public function cabania()
    {
        return $this->belongsTo('App\Cabania');
    }

    protected $table = 'imagenes_de_cabania';
}
