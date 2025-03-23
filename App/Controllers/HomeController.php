<?php

namespace App\Controllers;

use App\Models\Cancion;

class HomeController
{

    public function index()
    {
        $canciones = Cancion::all();

        $cancionesAgregadas = Cancion::where('playlist', true)->get();

        $cancionesPendientes = Cancion::where('playlist', false)->get();

        return view('index', [
            'cancionesAgregadas' => $cancionesAgregadas,
            'cancionesPendientes'  => $cancionesPendientes
        ]);
    }
}
