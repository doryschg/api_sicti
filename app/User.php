<?php

namespace App;

use Illuminate\Notifications\Notifiable;
use Illuminate\Foundation\Auth\User as Authenticatable;

class User extends Authenticatable
{
    //use Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $table="usuario";

    //protected $primaryKey = 'id_usuario';

    // Atributos que se pueden asignar de manera masiva.
    protected $fillable = array('nombres','ap_pat','ap_mat','ci','ext','fecha_nac','sexo','celular','email','username','estado');

    protected $hidden=['created_at','updated_at','deleted_at','password'];
    //protected $dates=['fecha_inicio','fecha_fin'];

}
