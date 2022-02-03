<?php
session_start();

date_default_timezone_set('America/Argentina/Buenos_Aires');

const RUTA_RAIZ = __DIR__ . DIRECTORY_SEPARATOR . '..';

const RUTA_IMGS = RUTA_RAIZ . DIRECTORY_SEPARATOR . "img";

spl_autoload_register(function($className) {
    $filepath = RUTA_RAIZ . DIRECTORY_SEPARATOR . "clases" . DIRECTORY_SEPARATOR . $className . ".php";
    require_once $filepath;
});
