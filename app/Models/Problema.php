<?php

namespace App\Models;


use Illuminate\Database\Eloquent\Model;

class Problema extends Model
{
    
    protected $fillable = ['enfermedad','descripcion', 'id_hc'];
}
