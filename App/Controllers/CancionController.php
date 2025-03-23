<?php

namespace App\Controllers;

use App\Models\Cancion;
use Core\Database\Validador;

class CancionController 
{
    public function agregar()
    {
        $reglas = [
            'nombre_cancion' => 'required',
            'portada' => 'required|url',
            'artista' => 'required',
            'anio' => 'required|min:4|max:4|numeric',
        ];
        
        $mensajes = [
            'nombre_cancion' => [
                'required' => 'El nombre de la canción es requerido',
            ],
            'portada' => [
                'required' => 'URL de la portada es requerida',
                'url' => 'Debe ser una URL válida'
            ],
            'artista' => [
                'required' => 'El artista o grupo es requerido',
            ],
            'anio' => [
                'required' => 'El año de lanzamiento de la canción es requerido',
                'min' => 'El año debe ser de 4 digitos',
                'max' => 'El año debe ser de 4 digitos',
                'numeric' => 'El campo de año sólo debe contener números'
            ], 
        ];
        
        $validador = new Validador();
        $validador->setReglas($reglas, $mensajes);
        
        if ($validador->validar($_POST)) 
        {
            Cancion::insert(
                [
                    'nombre_cancion' => $_POST['nombre_cancion'],
                    'portada' => $_POST[ 'portada'],
                    'artista' => $_POST['artista'],
                    'anio' => $_POST['anio'],
                ]
            );
            return redirect(BASE_URL);
        } else {
            $_SESSION['errores'] = $validador->getErrores();
            return redirect(BASE_URL);
        }
    }

    public function actualizar($id)
    {
        $cancion = Cancion::find($id);
        $cancion->update(
            [
                'playlist' => $_POST['playlist']
            ]
        );
        return redirect(BASE_URL);
    }

    public function eliminar($id)
    {
        $cancion = Cancion::find($id);
        $cancion->delete();

        return redirect(BASE_URL);
    }

}