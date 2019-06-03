<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateRespuestasTable extends Migration
{

    public function up()
    {
        Schema::create('respuestas', function (Blueprint $table) {
            $table->increments('id');
            $table->timestamps();
            $table->unsignedInteger('pregunta_id');
            $table->enum('valoracion',['0','1','2','3','4','5','6','7','8','9',10]);
        });
    }

    public function down()
    {
        Schema::dropIfExists('respuestas');
    }
}
