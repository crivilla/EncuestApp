<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreatePreguntasTable extends Migration
{

    public function up()
    {
        Schema::create('preguntas', function (Blueprint $table) {
            $table->increments('id');
            $table->string('enunciado');
            $table->enum('tipo',['valoracion0a10', 'valoracion0a5']);
            $table->unsignedInteger('encuesta_id');
            $table->foreign('encuesta_id')->references('id')->on('encuestas')->onDelete('cascade');

        });

    }

    public function down()
    {
        Schema::dropIfExists('preguntas');
    }
}
