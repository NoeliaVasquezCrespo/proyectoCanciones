<?php

namespace Core\Database;

use PDO;

class GeneradorConsultas
{
    public function __construct(
        protected $pdo
    ) {}

    public function obtenerDatos($tabla):array
    {
        $query = $this->pdo->prepare("SELECT * FROM {$tabla}");
        $query->execute();
        return $query-> fetchAll(PDO::FETCH_ASSOC);
    }
    
    public function insertar($tabla, $parametros)
    {
        $columnas = implode(", ", array_keys($parametros));
        $values = ":" . implode(", :", array_keys($parametros));

        $sql = "INSERT INTO {$tabla} ($columnas) VALUES($values)";

        try {
            $query = $this->pdo->prepare($sql);
            $query->execute($parametros);
        } catch (PDOException $e) {
            die($e->getMessage());
        }
    }

    public function actualizar($tabla, $id, $parametros)
    {
        $columnas = array_keys($parametros);
        $columnas = implode(", ", array_map(function ($columna) {
            return "$columna=:$columna";
        }, $columnas));

        $sql = "UPDATE {$tabla} SET $columnas WHERE id=:id";

        try {
            $query = $this->pdo->prepare($sql);
            $query->execute([...$parametros, 'id' => $id]);
        } catch (PDOException $e) {
            die($e->getMessage());
        }
    }

    public function eliminar($tabla, $id)
    {
        $sql = "DELETE FROM {$tabla} WHERE id=:id";

        try {
            $query = $this->pdo->prepare($sql);
            $query->execute(['id' => $id]);
        } catch (PDOException $e) {
            die($e->getMessage());
        }
    }
   
    public function buscar($tabla, $id)
    {
        $query = $this->pdo->prepare("SELECT * FROM {$tabla} WHERE id=:id LIMIT 0,1");
        $query->execute(['id' => $id]);
        return $query->fetch(PDO::FETCH_ASSOC);
    }

    public function buscarPor($tabla, $parametros)
    {
        $columnas = implode(" AND ", array_map(function ($columna) {
            return "$columna=:$columna";
        }, array_keys($parametros)));

        $sql = "SELECT * FROM {$tabla} WHERE {$columnas}";

        try {
            $query = $this->pdo->prepare($sql);
            $query->execute($parametros);
            return $query->fetchAll(PDO::FETCH_ASSOC);
        } catch (PDOException $e) {
            die($e->getMessage());
        }
    }
}