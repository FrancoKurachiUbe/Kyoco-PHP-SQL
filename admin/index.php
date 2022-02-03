<?php
/* session_start();
require_once __DIR__ . '/../clases/Conexion.php';
require_once __DIR__ . '/../clases/Producto.php';
require_once __DIR__ . '/../rutas/rutas.php'; */

require_once __DIR__ . '/../rutas/init.php';
require_once RUTA_RAIZ . '/rutas/rutas.php';

$rutas = getRutasAdmin();

$vista = $_GET['s'] ?? 'login';

if(!isset($rutas[$vista])) {
    $vista = '404';
}

$autenticacion = new Autenticacion();

$requiereAutenticacion = $rutas[$vista]['autenticacion'] ?? false;
if($requiereAutenticacion && !$autenticacion->estaAutenticado()) {
    // Lo pateamos al login.
    $_SESSION['mensaje_error'] = "Esta acción requiere de haber iniciado sesión.";
    header("Location: index.php?s=login");
    exit;
}

$mensajeExito = $_SESSION['mensaje_exito'] ?? null;
$mensajeError = $_SESSION['mensaje_error'] ?? null;
unset($_SESSION['mensaje_exito'], $_SESSION['mensaje_error']);
?>
<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="../css/bootstrap/css/bootstrap.min.css">
    <link rel="stylesheet" href="../css/estilo.css">
    <link rel="icon" href="../img/icons/Kyoco-title.png" type="image/png">
    <title>Panel de Kyoco:: <?= $rutas[$vista]['title'];?></title>
</head>
<body>
<header class="fondo ">
    <div class="row">
        <nav class=" navbar navbar-expand-lg navbar-light">
            <div class="container-fluid">
                <?php
                    if($autenticacion->estaAutenticado()):
                ?>
                <a  class=" d-flex justify-content-center logo-head" href="index.php?s=home"><span class="visually-hidden">Kyoco</span></a>
                <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNavAltMarkup" aria-controls="navbarNavAltMarkup" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
                </button>
                <div class=" collapse navbar-collapse" id="navbarNavAltMarkup">
                    <div class="navbar-nav">
                        <a class="nav-link active text-light h5" aria-current="page" href="index.php?s=home">Home</a>
                        <a class="nav-link text-light h5" href="index.php?s=productos">Productos</a>
                        <a class="nav-link text-light h5" href="index.php?s=producto-nuevo">Cargar</a>
                    </div>
                    <form id="minicarrito" action="acciones/auth-cerrar-sesion.php" method="post">
                                    <button class="btn bg-light " type="submit">Cerrar sesión</button>
                    </form>
                </div>
                <?php
                    endif;
                ?>  
            </div>
            </nav>
    </div>
</header>
<div>
    <?php
        if($mensajeExito !== null):
        ?>
        <div class="msg-success"><?= $mensajeExito;?></div>
        <?php
        endif;
        ?>
        <?php
        if($mensajeError !== null):
        ?>
        <div class="msg-error"><?= $mensajeError;?></div>
        <?php
        endif;
    ?>
        <!-- <header id="main-header">
            <p class="brand">Kyoco</p>
            <p>Panel de Administración</p>
        </header> -->
        <!-- <nav id="main-nav">
            <div class="container-fixed">
                <ul>
                    <li><a href="index.php?s=home">Home</a></li>
                    <li><a href="index.php?s=productos">producto</a></li>
                </ul>
            </div>
        </nav> -->
    <?php
    // Incluimos la sección que queremos mostrar, usando el valor de la variable $vista.
    require __DIR__ . '/vistas/' . $vista . '.php';
    ?>
</div>
<footer class="pb-1 pt-1">
    <div class=" container pl-4">
        <div class="foot mt-4" >
            <a  class="logo-footer " href="#"><span class="visually-hidden">Kyoco</span></a>  
        </div>
        
        <div class="mt-4 row">
            <div class="col-sm-6 col-md-5">
                <ul class="redes  mb-4">    
                    <li><a href="#" class="face"><span class="visually-hidden">Facebook</span></a></li>
                    <li><a href="#" class="insta"><span class="visually-hidden">Instagram</span></a></li>
                    <li><a href="#" class="youtube"><span class="visually-hidden">Youtube</span></a></li>
                </ul>
            </div>
                
            <div class="col-sm-6 col-md-7 m-auto">
                <ul class="info">
                    <li><a href="" class="gmail"></a>info@kyoco.com</li>
                    <li class="mt-4"><a href="#" class="mapa"></a>Buenos Aires, Argentina</li>
                </ul>
            </div>
        </div>
        <p class="text-light mt-2">Copyright©Franco Kurachi Ubé</p>
    </div>
</footer>
    <script src="../css/bootstrap/js/bootstrap.bundle.js"></script>
</body>
</html>
