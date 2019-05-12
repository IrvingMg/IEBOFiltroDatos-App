<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Coincidencias extends Model
{
    //TODO: Cambiar campos de la tabla
    protected $fillable = [
        'afiliacion',
        'nombre',
        'matricula',
        'fec_mvto',
        'curp',
        'matricula',
        'semestre',
        'num_p',
        'nom_p'
    ];
}
