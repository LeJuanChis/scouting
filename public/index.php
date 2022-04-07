<?php

include '../includes/app.php';

use MVC\Router;
use Controllers\PaginasController;
use Controllers\LoginController;
use Controllers\AdminController;
use Controllers\ScoutsController;

$router = new Router;

//RUTAS PUBLICAS
//rutas para get
$router -> get('/', [PaginasController::class, 'index']);
$router -> get('/nosotros', [PaginasController::class, 'nosotros']);
$router -> get('/galeria', [PaginasController::class, 'galeria']);
$router -> get('/jefes', [PaginasController::class, 'jefes']);
$router -> get('/login', [LoginController::class, 'login']);
$router -> post('/login', [LoginController::class, 'login']);
//RUTAS PRIVADAS

//$router -> get('/admin', [AdminController::class, 'index']);
$router -> get('/admin/scouts', [AdminController::class, 'scouts']);
$router -> get('/scouts/crear', [ScoutsController::class, 'crear']);
$router -> post('/scouts/crear', [ScoutsController::class, 'crear']);


$router -> get('/logout', [AdminController::class, 'logout']);
$router->rutas();

