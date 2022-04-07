<?php 

namespace Controllers;
use MVC\Router;
use Model\Admin;

class LoginController{

    public static function login(Router $router){

        //debuguear($_POST);
        $errores = Admin::getErrores();
        $resultado=null;
        if($_SERVER['REQUEST_METHOD'] === 'POST'){
            
            $auth = new Admin($_POST);
            
            $errores = $auth ->validar();

            if(!$errores){
                $resultado= $auth -> validarUsuario();

                if($resultado){
                    $usuario = $auth ->verificarPassword($resultado);

                    if($usuario){
                        $auth -> autenticarUsuario($resultado);
                    }else{
                        $errores = Admin::getErrores();
                    }
                }else{
                    $errores = Admin::getErrores();
                }
            }
        }

        

        $router->render('admin/login', [
            'errores' =>  $errores
        ]);
    }
}