<?php

namespace Model;

class Crud{
    //database
    protected static $db;
    protected static $tabla = '';
    protected static $columnas = [];

    //errores
    protected static $errores = [];


    public function crear(){

        $datos = $this;
        $datos = get_object_vars($datos);//convertimos el objeto a un array

        //hacemos la validacion por si el campo es nulo
        $valores = array_values($datos);
        $keys = array_keys($datos);

        foreach($datos as $key =>$value){
            if(empty($datos[$key])){

                unset($datos[$key]);
                // echo "<pre>";
                // var_dump($datos[$key]);
                // echo "</pre>";
            }
        }



        $sql = "INSERT INTO ". static::$tabla. "( ";
        $sql .= join(", ", array_keys($datos)); //join une elementos de un array a nuestro string
        $sql .= " ) VALUES ('";
        $sql.= join("', '", array_values($datos)) . "')";
        
        $query = self::$db->prepare($sql);
        
        $result=$query->execute();

    }

    public static function eliminar($id){

    }
    
    public static function getErrores(){
        return static::$errores;
    }

    public static function setDb($database){
        return self::$db = $database;
    }


    public static function all(){
        $sql = "SELECT * FROM ".static::$tabla;

        $resultado = self::consultarDB($sql);

        return $resultado;
    }

    public static function consultarDB($sql){
        //consultar a la base de datos
        $query = self::$db->prepare($sql);

        $query->execute();

        //creamos el array de los objetos
        $array = [];

        //crear el array con objetos
        while($row = $query->fetchObject()){
            $array[] = self::crearObjeto($row);
        }

        return $array;
    }

    public static function crearObjeto($row){

        $objeto = new static;
        //creamos el objeto para introducir en el array
        foreach($row as $key => $value){
            if(property_exists($objeto, $key)){
                $objeto->$key = $value;
            }
        }

        return $objeto;

    }

    //setear imagenes
    public function setImagen($imagen){
        if(!empty($this->id)){
            $this->eliminarImagen();
        }

        if($imagen){
            $this->foto = $imagen;
        }
    }

    public function eliminarImagen(){
        $existeArchivoScout = file_exists(IMAGENES_SCOUTS.$this->foto);
      
        if ($existeArchivoScout) {
            unlink(IMAGENES_SCOUTS.$this->foto);
        }
    }

}