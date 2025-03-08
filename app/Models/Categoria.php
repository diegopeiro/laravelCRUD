<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Categoria extends Model
{
    //Creo los campos rellenables
    use HasFactory;

    //Campos de la tabla 
    protected $fillable = ['nombre','descripcion','musculos_trabaja','nivel_fatiga'];

    // Relación 1 a N: Una categoría tiene muchos ejercicios
    public function ejercicios()
    {
        return $this->hasMany(Ejercicio::class, 'id');
    }


}
