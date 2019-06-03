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

    //devuelve todas las preguntas que tiene una encuesta
    public function preguntas()
    {
        return $this->hasMany('App\Pregunta');
    }

}
