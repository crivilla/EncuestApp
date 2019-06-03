<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateEncuestasTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('encuestas', function (Blueprint $table) {
            $table->increments('id');
            $table->timestamps();
            $table->string('titulo');
            $table->dateTime('fechainicio');
            $table->dateTime('fechafinal');
            $table->unsignedInteger('ambito_id');
            $table->foreign('ambito_id')->references('id')->on('ambitos')->onDelete('cascade');

            /*$table->enum('Ambito',['ProfesionalesMedicos', 'Instalaciones','Servcios','PersonalAAdministrativo']); */
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('encuestas');
    }
}
