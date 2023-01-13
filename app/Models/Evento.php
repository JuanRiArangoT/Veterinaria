<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Evento extends Model
{
    use HasFactory;

    static $rules=[

        'id'=> 'required',
        'nombres'=> 'required',
        'apellidos'=> 'required',
        'title'=> 'required',
        'start'=> 'required',
        'end'=> 'required',
        'fecha' => 'required',
        'hora' => 'required',
    ];

    protected $fillable=['id', 'nombres', 'apellidos', 'title', 'start', 'end', 'fecha', 'hora'];
}
