<?php

use Core\App;
use Core\Router;
use Core\Request;
use App\Controllers\HomeController;

define('BASE_URL', '/proyecto');

require "vendor/autoload.php";

$query = require 'Core/bootstrap.php';


use Pecee\SimpleRouter\SimpleRouter;
use Illuminate\Database\Capsule\Manager as Capsule;

$capsule = new Capsule;

$db = App::get('config')['database'];

$capsule->addConnection([
    'driver' => $db['type'],
    'host' => $db['host'],
    'database' => $db['database'],
    'username' => $db['user'],
    'password' => $db['password'],
    'charset' => 'utf8',
    'collation' => 'utf8_unicode_ci',
    'prefix' => '',
]);

$capsule->setAsGlobal();
$capsule->bootEloquent();

$canciones = Capsule::table('cancion')->get();


$rutas = require 'routes.php';

