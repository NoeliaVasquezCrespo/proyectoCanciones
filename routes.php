<?php

use App\Controllers\HomeController;
use App\Controllers\LoginController;
use Pecee\SimpleRouter\SimpleRouter;
use App\Controllers\PaginaController;
use App\Controllers\CancionController;

SimpleRouter::get(BASE_URL .'/', [HomeController::class, 'index']);
SimpleRouter::get(BASE_URL .'/nosotros', [PaginaController::class, 'nosotros']);
SimpleRouter::get(BASE_URL .'/contacto', [PaginaController::class, 'contacto']);
SimpleRouter::get(BASE_URL .'/servicios', [PaginaController::class, 'servicios']);
SimpleRouter::post(BASE_URL .'/cancion/agregar', [CancionController::class, 'agregar']);
SimpleRouter::post(BASE_URL .'/cancion/actualizar/{id}', [CancionController::class, 'actualizar']);
SimpleRouter::post(BASE_URL .'/cancion/eliminar/{id}', [CancionController::class, 'eliminar']);
SimpleRouter::get(BASE_URL .'/login', [LoginController::class, 'index']);
SimpleRouter::post(BASE_URL .'/login', [LoginController::class, 'login']);
SimpleRouter::post(BASE_URL .'/cerrar-sesion', [LoginController::class, 'salir']);

SimpleRouter::start();
