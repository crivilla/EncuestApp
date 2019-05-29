<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Encuesta extends Model
{

    //constructor
    protected $fillable = ['titulo', 'fechainicio', 'fechafinal', 'ambito_id'];


    //devuelve el medico que esta relacionado con la encuesta
    public function medico()
    {
        return $this->belongsTo('App\Medico');
    }

    // devuelve a que ambito al que pertenece la encuesta

    public function ambito()
    {
        return $this->belongsTo('App\Ambito');
    }


    //devuelve todas las encuestas que tiene un ambita
    public function preguntas()
    {
        return $this->hasMany('App\Pregunta');
    }

}
