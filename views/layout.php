<?php

if (!isset($_SESSION)) {
    session_start();
}
    
    $rol = $_SESSION['rol'] ?? null;


?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Scouting</title>
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Fredoka:wght@300;400;600&family=Josefin+Sans:wght@200;400;600;700&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css" integrity="sha512-9usAa10IRO0HhonpyAIVpjrylPvoDwiPUiKdWk5t3PyolY1cOd4DSE0Ga+ri4AuTroPR5aQvXU9xC6qOPnzFeg==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    
    <link rel="stylesheet" href="../../build/css/app.css">

    <script src="https://cdnjs.cloudflare.com/ajax/libs/gsap/3.9.1/gsap.min.js" integrity="sha512-H6cPm97FAsgIKmlBA4s774vqoN24V5gSQL4yBTDOY2su2DeXZVhQPxFK4P6GPdnZqM9fg1G3cMv5wD7e6cFLZQ==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/zepto/1.2.0/zepto.min.js" integrity="sha512-BrvVYNhKh6yST24E5DY/LopLO5d+8KYmIXyrpBIJ2PK+CyyJw/cLSG/BfJomWLC1IblNrmiJWGlrGueKLd/Ekw==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>

</head>
<body>

    <div class="container">
        <div class="navigation">

        <?php if ($rol === 'administrador'): ?>
            <ul>
                <li>
                    <a href="/"> 
                        <span class="icon"><i class="fa-solid fa-house-user"></i></span>
                        <span class="title">Inicio</span>
                    </a>

                    </li>

                <li>
                    <a href="/admin/scouts">
                        <span class="icon"><i class="fa-solid fa-house"></i></span>
                        <span class="title">Scouts</span>
                    </a>
                </li>

                <li>
                    <a href="galeria">
                        <span class="icon"><i class="fa-brands fa-angellist"></i></span>
                        <span class="title">Jefes</span>
                    </a>
                </li>

                <li>
                    <a href="jefes">
                        <span class="icon"><i class="fa-regular fa-calendar-xmark"></i></span>
                        <span class="title">Eventos</span>
                    </a>
                </li>


                <li>
                    <a href="login">
                        <span class="icon"><i class="fa-solid fa-user-group"></i></span>
                        <span class="title">Unidades</span>
                    </a>
                </li>

                <li>
                    <a href="/logout">
                        <span class="icon"><i class="fa-solid fa-arrow-right-from-bracket"></i></span>
                        <span class="title">Cerrar sesion</span>
                    </a>
                </li>

            </ul>

            <?php else: ?>
                <ul>
                <li>
                    <a href="/"> 
                        <span class="icon"><i class="fa-solid fa-house-user"></i></span>
                        <span class="title">Inicio</span>
                    </a>

                    </li>

                <li>
                    <a href="nosotros">
                        <span class="icon"><i class="fa-solid fa-house"></i></span>
                        <span class="title">Quienes somos?</span>
                    </a>
                </li>

                <li>
                    <a href="galeria">
                        <span class="icon"><i class="fa-brands fa-wolf-pack-battalion"></i></span>
                        <span class="title">Galeria</span>
                    </a>
                </li>

                <li>
                    <a href="jefes">
                        <span class="icon"><i class="fa-brands fa-angellist"></i></span>
                        <span class="title">Nuestros jefes</span>
                    </a>
                </li>


                <li>
                    <a href="login">
                        <span class="icon"><i class="fa-solid fa-tree"></i></span>
                        <span class="title">Administradores</span>
                    </a>
                </li>

            </ul>


                <?php endif; ?>
        </div>

        <!--Seccion del main-->

        <main class="main">
            <div class="header">
                <div class="toggle">
                    <i class="fa-solid fa-bars"></i>
                </div>

                <div class="tittle-main">
                    <h1>Grupo scout tercero Guacirí</h1>
                </div>

                <div class="social-media">
                    <div class="item">
                        <a href="https://www.facebook.com/Grupo-Scout-Tercero-Guacir%C3%AD-101558291225560"><i class="fa-brands fa-facebook"></i></a>
                    </div>

                    <div class="item">
                        <a href="https://www.instagram.com/gruposcout.3roguaciri/"><i class="fa-brands fa-instagram-square"></i></a>
                    </div>
                </div>
                
            </div>

            <?php echo $contenido; ?>

        </main>


        

    </div>


    <script src="../../build/js/bundle.min.js"></script>    

    
</body>
</html>