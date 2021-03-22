<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePacientesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('pacientes', function (Blueprint $table) {
            $table->id('identificacion');
            $table->timestamps();
            $table->string('name');
            $table->string('apellidos');
            $table->string('email')->unique();
            $table->string('password');
            $table->string('genero');
            $table->string('ocupacion');
            $table->unsignedBigInteger('id_doctor');


            $table->foreign('id_doctor')
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
        Schema::dropIfExists('pacientes');
    }
}
