<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Ejercicio extends Model
{
    //Creo los campos rellenables
    use HasFactory;

    //Defino dichos campos
    protected $fillable = ['nombre', 'descripcion', 'duracion', 'categoria'];

}
