<?php
/* session_start();
require_once __DIR__ . '/../../clases/Conexion.php';
require_once __DIR__ . '/../../clases/Producto.php';
require_once __DIR__ . '/../../clases/ProductoCrearValidador.php'; */
require_once __DIR__ . '/../../rutas/init.php';


$titulo                 = $_POST['titulo'];
$descripcion            = $_POST['descripcion'];
$precio                 = $_POST['precio'];
$imagen_descripcion     = $_POST['imagen_descripcion'];
$imagen                 = $_FILES['imagen'];

$validator = new ProductoCrearValidador($_POST);
$validator->ejecutar();

if($validator->hasErrors()) {
    $_SESSION['errores'] = $validator->getErrores();
    
    $_SESSION['old_data'] = $_POST;
    header("Location: ../index.php?s=producto-nuevo");
    exit;
}

if(!empty($imagen['tmp_name'])) {
    // Vamos a generar un nombre único para el archivo. Para hacerlo simple, vamos a usar la fecha y
    // hora como prefijo del nombre original del archivo.
    $nombreImagen = date('YmdHis_') . $imagen['name'];
    move_uploaded_file($imagen['tmp_name'], __DIR__ . '/../../img/producto/' . $nombreImagen);
} else {
    $nombreImagen = '';
}

try {
    $producto = new Producto();
    $producto->crear([
        'usuario_fk' => 1,
        'titulo' => $titulo,
        'descripcion' => $descripcion,
        'imagen' => $nombreImagen,
        'imagen_descripcion' => $imagen_descripcion,
        'precio' => $precio,
    ]);
    $_SESSION['mensaje_exito'] = "¡Éxito! El producto fue publicado correctamente.";
    header("Location: ../index.php?s=productos");
} catch(PDOException $e) {
    $_SESSION['mensaje_error'] = "¡Ocurrió un error inesperado! El producto no pudo ser publicado.";
    header("Location: ../index.php?s=producto-nuevo");
    exit;
}