<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class CoincidenciasCurp extends Model
{
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
