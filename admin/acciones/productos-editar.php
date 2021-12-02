<?php
require_once __DIR__ . '/../../rutas/init.php';

//echo "<pre>";
//print_r($_POST);
//print_r($_FILES);
//echo "</pre>";
//exit;

// 2.
$id                 = $_POST['id'];
$titulo             = $_POST['titulo'];
$descripcion        = $_POST['descripcion'];
$precio             = $_POST['precio'];
$imagen_descripcion = $_POST['imagen_descripcion'];
$imagen             = $_FILES['imagen'];

$validator = new ProductoCrearValidador($_POST);
$validator->ejecutar();

if($validator->hasErrors()) {
    $_SESSION['errores'] = $validator->getErrores();
    $_SESSION['old_data'] = $_POST;
    header("Location: ../index.php?s=productos-editar&id=" . $id);
    exit;
}

$producto = (new Producto())->traerPorPk($id);

if(!empty($imagen['tmp_name'])) {
    $nombreImagen = date('YmdHis_') . $imagen['name'];

    move_uploaded_file($imagen['tmp_name'], __DIR__ . '/../../img/producto/' . $nombreImagen);
} else {
    $nombreImagen = $producto->getImagen();
}

try {
    $producto = new Producto();
    $producto->editar($id, [
        'usuario_fk' => 1,
        'titulo' => $titulo,
        'descripcion' => $descripcion,
        'precio' => $precio,
        'imagen' => $nombreImagen,
        'imagen_descripcion' => $imagen_descripcion,
    ]);
    $_SESSION['mensaje_exito'] = "¡Éxito! El producto fue editado correctamente.";
    header("Location: ../index.php?s=productos");
    exit;
} catch(PDOException $e) {
    // Si ocurre un error con la base, podemos hacer un print_r de $e para ver el mensaje de la base.
    /* echo "<pre>";
    print_r($e);
    echo "</pre>";
    exit; */
    $_SESSION['mensaje_error'] = "¡Ocurrió un error inesperado! El producto no pudo ser editado.";
    header("Location: ../index.php?s=producto-editar&id=" . $id);
    exit;
}
