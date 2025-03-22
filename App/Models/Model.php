<?php

namespace App\Models;
use Core\App;

class Model
{
    protected $propiedades = [];
    protected $tabla;

    public function __construct($propiedades = [])
    {
        $this->propiedades = $propiedades;
    }

    public static function insertar($propiedades)
    {
        $model = new static();  //  new Examen();
        $model->propiedades = $propiedades;
        $model->guardar();
        return $model;
    }

    public function guardar()
    {
        if(empty($this->tabla))
        {
            throw new Exception('La propiedad tabla no puede estar vacía.');
        }

        App::get('database')->insertar($this->tabla, $this->propiedades);
    }

    public function getTable()
    {
        return $this->tabla;
    }

    public function setPropiedades($propiedades)
    {
        $this->propiedades = array_merge($this->propiedades, $propiedades);
        return $this;
    }

    public static function buscar($id)
    {
        $model = new static();
        $propiedades = App::get('database')->buscar($model->getTable(), $id);  // 1
        $model->setPropiedades($propiedades);
        return $model;
    }

    public function actualizar($propiedades)
    {
        App::get('database')->actualizar($this->getTable(), $this->propiedades['id'], $propiedades);
        $this->setPropiedades($propiedades);
        return $this;
    }

    public function eliminar()
    {
        App::get('database')->eliminar($this->getTable(), $this->propiedades['id']);
        return $this;
    }

    public static function obtenerDatos()
    {
        $model = new static();
        $registros = App::get('database')->obtenerDatos($model->getTable());

        return array_map(function($registro){
            return new static($registro);
        }, $registros);
    }

    public function __get($name)
    {
        if(array_key_exists($name, $this->propiedades)){
            return $this->propiedades[$name];
        }

        throw new Exception("La propiedad {$name} no existe");
    }

    public static function buscarPor($parametros)
    {
        $model = new static();
        $registros = App::get('database')->buscarPor($model->getTable(), $parametros);

        return array_map(function($registro){
            return new static($registro);
        }, $registros);
    }

}
