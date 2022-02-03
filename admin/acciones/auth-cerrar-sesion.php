<?php
require_once __DIR__ . '/../../rutas/init.php';

$autentication = new Autenticacion();

$autentication->cerrarSesion();

$_SESSION['mensaje_exito'] = "Sesión cerrada correctamente.";
header("Location: ../index.php?s=login");
