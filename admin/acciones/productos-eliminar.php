<?php
require_once __DIR__ . '/../../rutas/init.php';

$id = $_POST['id'];

try {
    $producto = new Producto();
    $producto->eliminar($id);

    // Enviar un mensaje de éxito...
    $_SESSION['mensaje_exito'] = "¡Éxito! El producto fue eliminado correctamente.";
    header("Location: ../index.php?s=productos");
    exit;
} catch(Exception $e) {
    // Enviar un mensaje de error...
    $_SESSION['mensaje_error'] = "¡Ocurrió un error inesperado! El producto no pudo ser eliminado.";
    header("Location: ../index.php?s=productos");
    exit;
}
