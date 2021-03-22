<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateTrasladosTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('traslados', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('id_paciente');
            $table->string('nombre_paciente');
            $table->unsignedBigInteger('id_doctor_ant');
            $table->string('nombre_doctor_ant');
            $table->unsignedBigInteger('id_doctor_act');
            $table->timestamps();

            $table->foreign('id_paciente')
            ->references('identificacion')
            ->on('pacientes')
            ->onDelete('cascade');

            $table->foreign('id_doctor_ant')
            ->references('id')
            ->on('users')
            ->onDelete('cascade');

            $table->foreign('id_doctor_act')
            ->references('id')
            ->on('users')
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
        Schema::dropIfExists('traslados');
    }
}
