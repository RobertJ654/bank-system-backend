<?php
// Define el controlador por defecto para la aplicación
define("CONTROLADOR_DEFECTO", "Usuarios");

// Define la acción por defecto para la aplicación
define("ACCION_DEFECTO", "index");

// Ruta base del sistema de archivos del servidor
define("RUTA_BASE", $_SERVER['DOCUMENT_ROOT'] . "/");

// URL base de la aplicación web
define("HTTP_BASE", "http://127.0.0.1/bank");

// Directorios específicos dentro de la estructura de la aplicación
define('ROOT_DIR', RUTA_BASE . 'bank');
define('ROOT_CORE', RUTA_BASE . 'bank/core');
define('ROOT_UPLOAD', RUTA_BASE . 'bank/uploads');
define('ROOT_VIEW', RUTA_BASE . 'bank/view');
define('ROOT_REPORT', RUTA_BASE . 'bank/reports');
define('ROOT_REPORT_DOWN', RUTA_BASE . 'bank/reports_download');

// URL de recursos públicos accesibles desde el navegador
define("URL_RESOURCES", HTTP_BASE . "/public/");

// Clave secreta para la generación y validación de tokens JWT
define('SECRET_KEY', 'MIEMPRESA.MBmxKMdsfsdffghY7d55sghvTlB1kytftrstews232u6575tdyhrdjyAjB3uNasdasd0g6ZDdOXpz21');

// Algoritmo utilizado para firmar el token JWT
define('ALGORITHM', 'HS256');
?>
