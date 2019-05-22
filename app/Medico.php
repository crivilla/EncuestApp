<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Medico extends Model
{
    //constructor
    protected $fillable = ['nombre', 'apellidos', 'especialidad', 'numcolegiado', 'email'];

    /*
    //devuelve la encuesta que esta relacionada con el medico
    public function encuesta()
    {
        return $this->belongsTo('App\Encuesta');
    }
    */
    //

    //devuelve todas las encuestas que tiene un medico
    public function encuestas()
    {
        return $this->hasMany('App\Encuesta');
    }

    //devuelve el nombre completo del médico
    public function getFullNameAttribute()
    {
        return $this->name . ' ' .$this->surname;
    }




}
