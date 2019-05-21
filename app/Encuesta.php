<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Encuesta extends Model
{
    // devuelve a que ambito pertenece la encuesta

    public function ambito()
    {
        return $this->belongsTo('App\Ambito');
    }
}
