<?php 

namespace Model;

class Scouts extends Crud{
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
        $this->telefono = empty($args['telefono']) ? null : $args['telefono'];
        $this->contrasena = $args['contrasena'] ?? '';
        $this->rol = $args['rol'] ?? '';
        $this->unidad = empty($args['unidad']) ? null : $args['unidad'];
        $this->descripcion = empty($args['descripcion']) ? null : $args['descripcion'];
        $this->foto = empty($args['foto']) ? null : null;
    }
    //CONSULTAS ESPECIFICAS QUE NO PODEMOS LLAMAR CON EL CRUD

    public static function obtenerEspecifico(){
        $sql = "SELECT us.doc_identidad, CONCAT(us.nombres, ' ', us.apellidos) as nombre, us.telefono, un.nombre as unidad, rl.nombre as rol ";
        $sql .= "FROM tblusuarios as us Inner Join tblunidad as un on us.unidad = un.codigo Inner Join tblroles as rl on us.rol = rl.codigo";

        $resultados = self::consultasEspecificas($sql);
        return $resultados;
    }

    public static function consultasEspecificas($sql){
        //consultar a la base de datos
        $query = self::$db->prepare($sql);

        $query->execute();

        //creamos el array de los objetos
        $array = [];

        //crear el array con objetos
        while($row = $query->fetchObject()){
            $array[] = $row;
        }

        return $array;
    }

    public function validar(){
        if(!$this->doc_identidad){
            self::$errores[] = 'El documento de identidad es obligatorio';
        }

        if(!$this->nombres){
            self::$errores[] = 'El nombre es obligatorio';
        }

        if(!$this->apellidos){
            self::$errores[] = 'Los apellidos son obligatorios';
        }

        if(!$this->correo){
            self::$errores[] = 'El correo es obligatorio';
        }

        if(!$this->rol){
            self::$errores[] = 'El rol es obligatorio';
        }

        return self::$errores;
        
    }

    public function setContrasena($contrasena){
        $this->contrasena = $contrasena;
    }



}