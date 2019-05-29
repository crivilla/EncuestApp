<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Ambito extends Model
{
    //constructor
    protected $fillable = ['name'];


    //devuelve todas las encuestas que tiene un ambita   (!!!!!)
    public function encuestas()
    {
        return $this->hasMany('App\Encuesta'); // al revés
    }

}
