<?php

namespace Model;
use Model\Crud;

class Admin extends Crud{
    //base de datos
    protected static $tabla = 'tblUsuarios';
    protected static $columnas = ['doc_identidad', 'nombres', 'apellidos', 'correo', 'telefono', 'contrasena', 'rol', 'unidad', 'descripcion', 'foto'];

    //errores
    protected static $errores = [];

    public $doc_identidad;
    public $nombres;
    public $apellidos;
    public $correo;
    public $telefono;
    public $contrasena;
    public $rol;
    public $unidad;
    public $descripcion;
    public $foto;

    public function __construct($args = []){
        $this->doc_identidad = $args['doc_identidad'] ?? null;
        $this->nombres = $args['nombres'] ?? '';
        $this->apellidos = $args['apellidos'] ?? '';
        $this->correo = $args['correo'] ?? '';
        $this->telefono = $args['telefono'] ?? '';
        $this->contrasena = $args['contrasena'] ?? '';
        $this->rol = $args['rol'] ?? '';
        $this->unidad = $args['unidad'] ?? '';
        $this->descripcion = $args['descripcion'] ?? '';
        $this->foto = $args['foto'] ?? '';
    }

    public function validar(){
        if(!$this->correo){
            self::$errores[] = "El correo es obligatorio";
        }

        if(!$this->contrasena){
            self::$errores[] = "La contraseña es obligatoria";
        }

        return self::$errores;
    }

    public function validarUsuario(){
        $sql = "SELECT * FROM tblUsuarios WHERE correo = '".$this->correo."' LIMIT 1";
        
        $query=self::$db->prepare($sql);

        $query -> execute();

        if(!$query->rowCount()){
            self::$errores[] = "El usuario no existe";
            return;
        }else{
            $resultado = $query->fetchObject();
            return $resultado; 
        }
    }

    public function verificarPassword($resultado){
        $usuario = password_verify($this->contrasena, $resultado->contrasena);
        if(!$usuario){
            self::$errores[] = "La contraseña es incorrecta";
        }

        return $usuario;
    }

    public function autenticarUsuario($resultado){
        session_start();
        $_SESSION['usuario'] = $resultado ->doc_identidad;
        $_SESSION['correo'] = $resultado -> correo;
        $_SESSION['nombres'] = $resultado -> nombres;

        if($resultado->rol === '1'){
            $_SESSION['rol'] = 'administrador';
        }

        header("Location: /");

    }

}