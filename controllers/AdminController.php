<?php 
namespace Controllers;
use MVC\Router;
use Model\Scouts;
class AdminController{

    // public static function index(Router $router){

    //     $router->render('admin/index', [

    //     ]);
    // }

    public static function scouts(Router $router){
        $scouts = Scouts::obtenerEspecifico();
        
        $router->render('/scouts/admin', [
            'scouts' => $scouts
        ]);
    }

    public static function logout(){
        session_start();
    
        $_SESSION=[];

        header("Location: /");
    }
}