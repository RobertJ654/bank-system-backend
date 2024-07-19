<?php
// Iniciamos la sesión
session_start();

// Incluimos los archivos necesarios
require_once './config/global.php';
require_once './core/HttpClient.php';

// Obtenemos la URL actual
$request = $_SERVER['REQUEST_URI'];
$request = parse_url($request, PHP_URL_PATH);
$segments = explode('/', trim($request, '/'));

// Función para cargar la página principal
function home() {
    // Incluimos la vista de la página principal
    require ROOT_DIR . '/view/home.php';
    exit;
}

// Función para verificar si el usuario está logueado
function verificarlogin() {
    if (!isset($_SESSION['login']['nombre'])) {
        // Redireccionamos al usuario al formulario de inicio de sesión si no está logueado
        echo '<script>window.location.href="' . HTTP_BASE . '/login"</script>';
    }
}

// Verificamos si la ruta comienza con 'bank'
if ($segments[0] === 'bank') {
    // Dependiendo del segundo segmento de la URL
    switch ($segments[1] ?? '') {
        case 'sign-in':
            // Cargamos la vista de inicio de sesión
            include ROOT_VIEW . '/security/sign-in.php';
            break;
        case 'sign-up':
            // Cargamos la vista de registro de usuario
            include ROOT_VIEW . '/security/sign-up.php';
            break;
        case 'logout':
            // Cerramos la sesión del usuario
            session_destroy();
            // Creamos una instancia del cliente HTTP y enviamos una solicitud POST para cerrar sesión en el controlador
            $clientindex = new HttpClient(HTTP_BASE);
            $result = $clientindex->post('/controller/LoginController.php',  [
                'ope' => 'logout',
            ]);
            // Redireccionamos al usuario al formulario de inicio de sesión
            echo '<script>window.location.href="' . HTTP_BASE . '/sign-in"</script>';
            break;
        case 'web':
            // Verificamos si el usuario está logueado para las páginas dentro de 'web'
            verificarlogin();
            // Dependiendo del tercer segmento de la URL
            switch ($segments[2] ?? '') {
                case 'customer':
                    // Cargamos la vista de clientes
                    include ROOT_VIEW . '/web/customer.php';
                    break;
                case 'system':
                    // Verificamos si el usuario está logueado para las páginas dentro de 'system'
                    verificarlogin();
                    // Dependiendo del cuarto segmento de la URL
                    switch ($segments[3] ?? '') {
                        case 'dashboard':
                            // Cargamos la vista de dashboard
                            include ROOT_VIEW . '/web/dashboard.php';
                            break;
                        case 'profile':
                            // Cargamos la vista de perfil
                            include ROOT_VIEW . '/web/profile.php';
                            break;
                        case 'list':
                            // Cargamos la vista de listado de bancos
                            require ROOT_VIEW . '/web/bank/list.php';
                            break;
                        case 'create':
                            // Cargamos la vista de creación de banco
                            require ROOT_VIEW . '/web/bank/create.php';
                            break;
                        case 'edit':
                            // Si se proporciona un quinto segmento, cargamos la vista de edición de banco
                            if (isset($segments[4])) {
                                $_GET['id'] = $segments[4];
                                require ROOT_VIEW . '/web/bank/edit.php';
                            } else {
                                // Si no se proporciona el ID, mostramos error 404
                                error404();
                            }
                            break;
                        case 'delete':
                            // Si se proporciona un quinto segmento, cargamos la vista de eliminación de banco
                            if (isset($segments[4])) {
                                $_GET['id'] = $segments[4];
                                require ROOT_VIEW . '/web/bank/delete.php';
                            } else {
                                // Si no se proporciona el ID, mostramos error 404
                                error404();
                            }
                            break;
                        case 'view':
                            // Si se proporciona un quinto segmento, cargamos la vista de visualización de banco
                            if (isset($segments[4])) {
                                $_GET['id'] = $segments[4];
                                require ROOT_VIEW . '/web/bank/view.php';
                            } else {
                                // Si no se proporciona el ID, mostramos error 404
                                error404();
                            }
                            break;
                        default:
                            // Cargamos la vista de página principal
                            include ROOT_VIEW . '/home.php';
                            break;
                    }
                    break;
                default:
                    // Cargamos la vista de página principal
                    home();
                    break;
            }
            break;
        default:
            // Cargamos la vista de página principal
            home();
            break;
    }
} else {
    // Si la ruta no comienza con 'bank', no hacemos nada
}
?>
