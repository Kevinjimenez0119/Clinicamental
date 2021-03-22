<?php

namespace App\Models;


use Illuminate\Database\Eloquent\Model;

class Contacto extends Model
{
   

    protected $fillable = ['telefono', 'direccion', 'ciudad', 'recidencia', 'id_paciente'];
}
