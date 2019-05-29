<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Pregunta extends Model
{
    //constructor
    protected $fillable = ['enunciado', 'tipo', 'titulo'];


    //devuelve la encuesta a la que pertenece la pregunta
    public function encuesta()
    {
        return $this->belongsTo('App\Encuesta');
    }



}
