<?php

namespace App\Models;


use Illuminate\Database\Eloquent\Model;

class Vital extends Model
{
 

    protected $fillable = ['altura','peso','rh','edad', 'id_hc'];
}
