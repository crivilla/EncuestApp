<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Paciente extends Model
{
    protected $fillable = [
        'name','apellidos','DNI','email', 'password',
    ];
}
