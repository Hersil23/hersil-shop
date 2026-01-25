<?php
/**
 * Archivo de configuración general
 * Funciones auxiliares y constantes globales
 */

// Iniciar sesión si no está iniciada
if (session_status() === PHP_SESSION_NONE) {
    session_start();
}

// Cargar variables de entorno
require_once __DIR__ . '/database.php';

// Cargar el .env manualmente si no se ha cargado
if (!isset($_ENV['APP_URL'])) {
    $envFile = __DIR__ . '/../.env';
    if (file_exists($envFile)) {
        $lines = file($envFile, FILE_IGNORE_NEW_LINES | FILE_SKIP_EMPTY_LINES);
        foreach ($lines as $line) {
            if (strpos(trim($line), '#') === 0) continue;
            list($key, $value) = explode('=', $line, 2);
            $_ENV[trim($key)] = trim($value);
        }
    }
}

// Definir constantes
// En producción, APP_URL debe ser https://tienda.twistpro.net
define('BASE_URL', $_ENV['APP_URL'] ?? 'https://tienda.twistpro.net');
define('APP_NAME', $_ENV['APP_NAME'] ?? 'Hersil Shop');

// Función para redirigir
function redirect($url) {
    header("Location: " . BASE_URL . $url);
    exit();
}

// Función para verificar si el usuario está logueado
function isLoggedIn() {
    return isset($_SESSION['user_id']);
}

// Función para verificar si el usuario es administrador
function isAdmin() {
    return isset($_SESSION['user_rol']) && $_SESSION['user_rol'] === 'administrador';
}

// Función para obtener el usuario actual
function getCurrentUser() {
    if (!isLoggedIn()) {
        return null;
    }
    
    return [
        'id' => $_SESSION['user_id'] ?? null,
        'nombre' => $_SESSION['user_nombre'] ?? '',
        'apellido' => $_SESSION['user_apellido'] ?? '',
        'correo' => $_SESSION['user_correo'] ?? '',
        'rol' => $_SESSION['user_rol'] ?? 'usuario'
    ];
}

// Función para sanitizar datos
function sanitize($data) {
    return htmlspecialchars(strip_tags(trim($data)));
}

// Función para validar email
function isValidEmail($email) {
    return filter_var($email, FILTER_VALIDATE_EMAIL);
}

// Zona horaria
date_default_timezone_set('America/Caracas');
?>