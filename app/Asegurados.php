<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Asegurados extends Model
{
    protected $fillable = [
        'afiliacion',
        'nombre',
        'mvto',
        'fec_mvto',
        'salario',
        'iden_trab',
        'subr_serv',
        'umf',
        'tipo_jorn_sem',
        'id_huelga'
    ];
}
