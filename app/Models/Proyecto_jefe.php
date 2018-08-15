<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Proyecto_jefe extends Model
{
    protected $table="proy_jefe";

    protected $primaryKey = 'id_proy_jefe';

	// Atributos que se pueden asignar de manera masiva.
	protected $fillable = array('');

    protected $hidden=['created_at','updated_at','deleted_at'];
    //protected $dates=['fecha_inicio','fecha_fin'];
}
