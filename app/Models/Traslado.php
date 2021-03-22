<?php

namespace App\Models;


use Illuminate\Database\Eloquent\Model;

class Traslado extends Model
{
    

    protected $fillable = ['id_paciente','nombre_paciente', 'id_doctor_ant', 'nombre_doctor_ant', 'id_doctor_act'];
}
