<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Respuesta extends Model
{
    //constructor
    protected $fillable = ['valoracion', 'pregunta_id'];

    public function pregunta()
    {
        return $this->belongsTo('App\Pregunta');
    }

}
