<?php

namespace App\Models;


use Illuminate\Database\Eloquent\Model;

class Historiaclinica extends Model
{
    

    protected $fillable = ['medicamentos','notas', 'id_paciente', 'id_tratamiento'];
}
