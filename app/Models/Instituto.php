<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Instituto extends Model
{
    protected $table="inst";

    protected $primaryKey = 'id_inst';

	// Atributos que se pueden asignar de manera masiva.
	protected $fillable = array('nombre_inst','fecha_creacion','resolucion','sigla','obj_pri');

    protected $hidden=['created_at','updated_at','deleted_at'];
    //protected $dates=['fecha_inicio','fecha_fin'];
}
