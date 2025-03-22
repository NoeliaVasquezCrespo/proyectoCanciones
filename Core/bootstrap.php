<?php

session_start();

use Core\App;
use Core\Database\Conexion;
use Core\Database\GeneradorConsultas;

App::set('config', require 'config.php');
$config = App::get('config');

App::set('database', new GeneradorConsultas(
    Conexion::conectar($config['database'])
));

if($config['error']) {
    ini_set('display_errors', 1);
    ini_set('display_startup_errors', 1);
    error_reporting(E_ALL);
}
