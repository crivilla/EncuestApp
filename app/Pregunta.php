<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Pregunta extends Model
{
    //constructor
    protected $fillable = ['enunciado', 'tipo', 'encuesta_id'];


    //devuelve la encuesta a la que pertenece la pregunta
    public function encuesta()
    {
        return $this->belongsTo('App\Encuesta');
    }

    //devuelve todas las respuestas que tiene una pregunta
    public function respuestas()
    {
        return $this->hasMany('App\Respuesta');
    }

}
