<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Videojuego extends Model
{
    protected $fillable = [
        'nombre',
        'genero',
        'plataforma',
        'fecha_lanzamiento',
        'precio',
        'imagen_url'
    ];

   
}
