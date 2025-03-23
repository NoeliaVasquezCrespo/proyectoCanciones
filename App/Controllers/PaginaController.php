<?php

namespace App\Controllers;

class PaginaController
{

    public function nosotros()
    {
        return view('nosotros');
    }

    public function contacto()
    {
        return view('contacto');
    }

    public function playlist()
    {
        return view('playlist');
    }
}