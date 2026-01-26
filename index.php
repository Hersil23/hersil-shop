<?php
/**
 * Archivo de entrada principal
 * Redirige todas las peticiones a la carpeta public
 */
ob_start();

$uri = $_SERVER['REQUEST_URI'];

if (strpos($uri, '/public') === 0) {
    return false;
}

require_once __DIR__ . '/public/index.php';