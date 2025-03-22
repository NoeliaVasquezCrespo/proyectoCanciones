<?php

namespace App\Models;
use Illuminate\Database\Eloquent\Model;

class Cancion extends Model
{
    protected $table = 'cancion';

    protected $fillable = ['nombre_cancion', 'portada', 'artista', 'anio', 'playlist'];

    public $timestamps = false;
}