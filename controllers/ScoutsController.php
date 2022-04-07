<?php

namespace Controllers;

use MVC\Router;
use Model\Scouts;
use Intervention\Image\ImageManagerStatic as Image;

class ScoutsController
{
    public static function crear(Router $router)
    {
        $scout = new Scouts;
        $errores = Scouts::getErrores();
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            $scout = new Scouts($_POST['scout']);
            if ($_FILES['foto']['tmp_name']) {
                //realizar un resize a la imagen con intervetion
                $image = Image::make($_FILES['foto']['tmp_name'])->fit(1000, 800);
                //creamos un nombre unico para la imagen
                $nombreImagen = md5(uniqid(rand(), true)) . ".jpg";
                
                $scout ->setImagen($nombreImagen);
            }

   
         
            $errores=$scout->validar();
            
            if (empty($errores)) {
                //hasheamos la contraseña
                $contraseña = password_hash(self::crearContraseña(), PASSWORD_BCRYPT);

                //seteamos la contraseña
                $scout->setContrasena($contraseña);

                if ($scout->foto) {
                    //crear la carpeta para subir imagenes
                    //crear una carpeta
                    if (!is_dir(IMAGENES_SCOUTS)) { //vefiricamos si la crpeta no existe
                        mkdir(IMAGENES_SCOUTS); //creamos la carpeta con la ruta especificada
                    }
                    //guardar la imagen en el servidor con intervetion
                    $image->save(IMAGENES_SCOUTS . $nombreImagen);
                }
                $scout->crear();
            }
        }

        $router -> render('scouts/crear', [
            'errores' => $errores
        ]);
    }

    protected static function crearContraseña()
    {
        //generamos una contraseña aleatoria de 7 caracteres
        $contraseña = '';
        $longitud = 7;
        $pattern = "1234567890abcdefghijklmnopqrstuvwxyz";
        $max = strlen($pattern);
        for ($i = 0; $i<=$longitud; $i++) {
            $contraseña .= substr($pattern, mt_rand(0, $max), 1);
        }

        return $contraseña;
    }
}
