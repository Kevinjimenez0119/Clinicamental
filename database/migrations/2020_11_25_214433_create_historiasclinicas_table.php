<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateHistoriasclinicasTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('historiaclinicas', function (Blueprint $table) {
            $table->id();
            $table->string('medicamentos');
            $table->string('notas');
            $table->unsignedBigInteger('id_paciente');
            $table->unsignedBigInteger('id_tratamiento');
            $table->timestamps();

            $table->foreign('id_paciente')
            ->references('identificacion')
            ->on('pacientes')
            ->onDelete('cascade');
            $table->foreign('id_tratamiento')
            ->references('id')
            ->on('tratamientos')
            ->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('historiasclinicas');
    }
}
