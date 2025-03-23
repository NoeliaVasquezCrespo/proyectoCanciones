<?php

namespace App\Controllers;

use Core\Auth;

class LoginController
{

    public function index()
    {
        return view('formulario-login');
    }

    public function login()
    {
        Auth::login($_POST['email'], $_POST['password']);

        if (Auth::verificar()) {
            redirect(BASE_URL);
        } else {
            redirect(BASE_URL .'/login');
        }
    }

    public function salir()
    {
        Auth::cerrarSesion();
        redirect(BASE_URL .'/login');
    }
}
