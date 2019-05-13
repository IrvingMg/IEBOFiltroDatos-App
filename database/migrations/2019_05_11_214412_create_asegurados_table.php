<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateAseguradosTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('asegurados', function (Blueprint $table) {
            $table->string('afiliacion');
            $table->string('nombre');
            $table->string('mvto');
            $table->string('fec_mvto');
            $table->string('salario');
            $table->string('iden_trab');
            $table->string('subr_serv');
            $table->string('umf');
            $table->string('tipo_jorn_sem');
            $table->string('id_huelga');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('asegurados');
    }
}
