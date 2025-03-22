<?php

namespace Core;

use App\Models\Usuario;

class Auth
{

    public static function login($email, $password)
    {
        $usuario = Usuario::where('email', $email)->first();
        if (!empty($usuario) && password_verify($password, $usuario->password)) {
            
            static::iniciarSesion();
            $_SESSION['email'] = $usuario->email;
            $_SESSION['nombre'] = $usuario->nombre;
            $_SESSION['apellido'] = $usuario->apellido;
            $_SESSION['id']     = $usuario->id;

            return true;
        }
        return false;
    }

    public static function verificar()
    {
        static::iniciarSesion();
        if (empty($_SESSION['id']))
            return false;
        else
            return true;
    }


    public static function iniciarSesion()
    {
        if(empty(session_id()))
        {
            session_start();
        }
    }

    public static function cerrarSesion()
    {
        static::iniciarSesion();
        session_destroy();
    }
}
