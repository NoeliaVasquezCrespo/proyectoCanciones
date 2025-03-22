<?php

namespace Core\Database;

class Validador
{
    private $reglas = [];
    private $errores = [];
    private $mensajes = [];

    public function setReglas(array $reglas, array $mensajes)
    {
        $this->reglas   = $reglas;
        $this->mensajes = $mensajes;
        return $this;
    }


    public function validar(array $datos)
    {
        $this->errores = [];

        foreach ($this->reglas as $campo => $campoReglas) {
            $valor = $datos[$campo] ?? null;
            $reglas = explode('|', $campoReglas);

            foreach ($reglas as $regla) {
                if ($this->aplicarReglas($regla, $valor, $campo) == false) {
                    break;
                }
            }
        }

        return empty($this->errores);
    }

    public function aplicarReglas($regla, $valor, $campo)
    {
        [$nombreRegla, $parametro] = array_pad(explode(':', $regla), 2, null); 

        switch ($nombreRegla) {
            case 'required':
                if (empty($valor) && $valor !== '0') {
                    $this->agregarError($campo, 'required', "El campo {$campo} es obligatorio.");
                    var_dump($valor);
                    return false;
                }
                break;

            case 'min': 
                if (mb_strlen((string) $valor) < (int) $parametro) {
                    $this->agregarError($campo, 'min', "El campo {$campo} debe tener al menos {$parametro} caracteres");
                    return false;
                }
                break;

            case 'max':
                if (mb_strlen((string) $valor) > (int) $parametro) {
                    $this->agregarError($campo, 'max', "El campo {$campo} debe tener al menos {$parametro} caracteres");
                    return false;
                }
                break;
            case 'url':
                if (!filter_var($valor, FILTER_VALIDATE_URL)) {
                    $this->agregarError($campo, 'url', "El campo {$campo} debe ser una URL válida.");
                    return false;
                }
                break;
                
            case 'numeric':
                if (!ctype_digit($valor)) {
                    $this->agregarError($campo, 'numeric', "El campo {$campo} solo debe ser números.");
                    return false;
                }
                break;
            
            default:
                $this->agregarError($campo, 'desconocido', "Regla de validación desconocido: {$nombreRegla}");
                return false;
        }

        return true;
    }

    public function agregarError(string $campo, string $regla, $mensaje)
    {
        $this->errores[$campo] = $this->mensajes[$campo][$regla] ?? $mensaje;
    }

    public function getErrores()
    {
        return $this->errores;
    }
}
