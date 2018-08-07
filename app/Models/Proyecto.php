<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Proyecto extends Model
{
    
    protected $table="proy";

    protected $primaryKey = 'id_proy';

	// Atributos que se pueden asignar de manera masiva.
	protected $fillable = array('titulo_proy','tipo_inv','tipo_servicio','obj_gen','alcance','poblacion','resumen','porc_ejec','estado','area_proy','fecha_inicio','fecha_fin','circunscripcion','doc_pdf');

    protected $hidden=['created_at','updated_at','deleted_at'];
    protected $dates=['fecha_inicio','fecha_fin'];



}
