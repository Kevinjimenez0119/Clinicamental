<?php

namespace App\Models;


use Illuminate\Database\Eloquent\Model;

class paciente extends Model
{
    
    
    protected $primaryKey = 'identificacion';

    protected $fillable = ['identificacion','name', 'apellidos','genero','ocupacion','email', 'password','id_doctor'];
}
