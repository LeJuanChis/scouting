<?php

function conectarDB(){
    $host= 'mysql:host=localhost;';
    $user = 'root';
    $password = '';
    $name='dbname=terceroguaciri';    

    $db = new PDO($host.$name, $user, $password);

    if(!$db){
        echo "Error de conexion";
    }else{
        
        return $db;
    }
}