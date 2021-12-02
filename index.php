<?php
require_once __DIR__ . '/clases/Conexion.php';
require_once __DIR__ . '/clases/Producto.php';
require_once __DIR__ . '/rutas/rutas.php';
$rutas = getRutasSitio();

$src = $_GET['s'] ?? 'home';

if(!isset($rutas[$src])) {
    $src = '404';
}
?>
<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="css/bootstrap/css/bootstrap.min.css">
    <link rel="stylesheet" href="css/estilo.css">
    <link rel="icon" href="img/icons/Kyoco-title.png" type="image/png">
    <title>Kyoco | <?= $rutas[$src]['title'] ?></title>
</head>
<body>
<header class="fondo ">
        <div class="row">
            <nav class="navbar navbar-expand-lg navbar-light">
                <div class="container-fluid">
                  <a  class=" d-flex justify-content-center logo-head" href="index.php?s=home"><span class="visually-hidden">Kyoco</span></a>
                  <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNavAltMarkup" aria-controls="navbarNavAltMarkup" aria-expanded="false" aria-label="Toggle navigation">
                    <span class="navbar-toggler-icon"></span>
                  </button>
                  <div class=" collapse navbar-collapse" id="navbarNavAltMarkup">
                    <div class="navbar-nav">
                      <a class="nav-link active text-light h5" aria-current="page" href="index.php?s=home">Home</a>
                      <a class="nav-link text-light h5" href="index.php?s=productos">Productos</a>
                      <a class="nav-link text-light h5" href="index.php?s=contacto">Contacto</a>
                    </div>
                    <!-- <form id="minicarrito" action="acciones/auth-cerrar-sesion.php" method="post">
                                    <button class="btn bg-light " type="submit">Iniciar sesión</button>
                                    <button class="btn bg-light " type="submit">Registrarse</button>
                    </form> -->
                  </div>
                </div>
              </nav>
        </div>
    </header>
    <?php
        require __DIR__ . '/src/' . $src . ".php";
    ?>
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
    <script src="css/bootstrap/js/bootstrap.bundle.js"></script>
</body>
</html>