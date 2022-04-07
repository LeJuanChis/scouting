<?php

namespace MVC;

class Router{

    //array con rutas
    public $rutasGET = [];
    public $rutasPOST = [];

    public function rutas(){
        $urlActual = $_SERVER['REQUEST_URI'];//obtenemos la url actual
        $metodo = $_SERVER['REQUEST_METHOD'];//obtenemos el metodo de request

        if($metodo === 'GET'){
            $urlActual = explode('?', $urlActual);
            $funcion = $this->rutasGET[$urlActual[0]] ?? null;//obtenemos la funcion asociada a la ruta
        }else{
            $urlActual = explode('?', $urlActual);
            $funcion = $this->rutasPOST[$urlActual[0]] ?? null;
        }

        if(isset($funcion)){
            
            call_user_func($funcion, $this); //llamamos la funcion asociada a la ruta
        }else{
            echo "No existe la pagina";
        }


    }

    public function get($url, $funcion){
        $this->rutasGET[$url] = $funcion;//llenamos el array de rutas get
    }

    public function post($url, $funcion){
        $this->rutasPOST[$url] = $funcion;//llenamos el array de rutas get
    }



    public static function render($ruta, $datos= []){

        foreach($datos as $key=>$value){
            $$key = $value;
        }

        ob_start();
        include __DIR__."/views/${ruta}.php";
        $contenido = ob_get_clean();
        include  __DIR__."/views/layout.php";
    }
}