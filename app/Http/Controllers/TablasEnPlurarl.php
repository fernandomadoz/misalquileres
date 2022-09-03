<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class TablasEnPlurarl extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */

    public function tablasEnPlural() {

        $tb_plural_distintas = [
            "Medio_de_cobro" => "medios_de_cobro",
            "Clasificacion_de_egreso" => "clasificaciones_de_egreso",
            "Clasificacion_de_ingreso" => "clasificaciones_de_ingreso",
            "Egreso" => "egresos",
            "Ingreso" => "ingresos",
            "Opcion" => "opciones",
            "Imagen_de_cabania" => "imagenes_de_cabania",
            "Rol_de_usuario" => "roles_de_usuario",
            "Imagen_de_venta" => "imagenes_de_ventas",
        ];
        
        return $tb_plural_distintas;

    }


}
