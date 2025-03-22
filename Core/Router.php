<?php

namespace Core;
use Exception;

class Router
{
    protected $rutas = [];

    public function registrar(array $rutas)
    {
        $this->rutas = $rutas;
    }

    public function manejar($url)
    {
        if (array_key_exists($url, $this->rutas)) {
            $controlador = $this->rutas[$url][0];
            $metodo      = $this->rutas[$url][1];

            $controlador = "App\\Controllers\\{$controlador}";

            if(!class_exists($controlador)){
                throw new Exception("El controlador {$controlador} no existe.");
            }

            if(!method_exists($controlador, $metodo))
            {
                throw new Exception("El método {$metodo} no existe en el controlador: {$controlador}.");
            }

            return (new $controlador)->$metodo();
        }

        die("Ruta no encontrado");
    }
}
