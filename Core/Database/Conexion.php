<?php

namespace Core\Database;
use PDO;
use PDOException;

class Conexion
{
    public static function conectar($config){
        try {
            return  new PDO(
                "{$config['type']}:host={$config['host']};dbname={$config['database']}",
                $config['user'],
                $config['password']
            );
        } catch (PDOException $error) {
            die('Error de conexión a la base de datos: ' . $error->getMessage());
        }
    }
    
}