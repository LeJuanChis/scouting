<?php 

namespace Controllers;
use MVC\Router;

class PaginasController{
    public static function index(Router $router){

        $router->render('grupo/index', [
            
        ]);
    }

    public static function nosotros(Router $router){
        $router->render('grupo/nosotros', [

        ]);
    }

    public static function galeria(Router $router){
        $router->render('grupo/galeria', [

        ]);
    }

    public static function jefes(Router $router){
        $router->render('grupo/jefes', [

        ]);
    }
}