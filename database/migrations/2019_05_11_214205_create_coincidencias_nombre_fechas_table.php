<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateCoincidenciasNombreFechasTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('coincidencias_nombre_fechas', function (Blueprint $table) {
            $table->string('afiliacion');
            $table->string('nombre');
            $table->string('fec_mvto');
            $table->string('curp');
            $table->string('matricula');
            $table->string('semestre');
            $table->string('num_p');
            $table->string('nom_p');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('coincidencias_nombre_fechas');
    }
}
