<?php

require_once __DIR__ . '/../../rutas/init.php';

$email      = $_POST['email'];
$password   = $_POST['password'];

$autenticacion = new Autenticacion();

if($autenticacion->iniciarSesion($email, $password)) {
    $_SESSION['mensaje_exito'] = "Sesión iniciada correctamente.";
    header("Location: ../index.php?s=home");
    exit;
} else {
    $_SESSION['mensaje_error'] = "Las credenciales ingresadas no coinciden con nuestros registros.";
    $_SESSION['old_data'] = $_POST;
    header("Location: ../index.php?s=login");
    exit;
}