<?php
session_start();
require_once './config/global.php';
require_once './core/HttpClient.php';
$request = $_SERVER['REQUEST_URI'];
$request = parse_url($request, PHP_URL_PATH);
$segments = explode('/', trim($request, '/'));

function home() {
    //http_response_code(404);
    require ROOT_DIR . '/view/home.php';
    exit;
}

function verificarlogin() {
    if (!isset($_SESSION['login']['nombre'])) {
        echo '<script>window.location.href="' . HTTP_BASE . '/login"</script>';
    }
}

if ($segments[0] === 'bank') {
    switch ($segments[1] ?? '') {
        case 'sign-in':
            include ROOT_VIEW . '/security/sign-in.php';
            break;
        case 'sign-up':
            include ROOT_VIEW . '/security/sign-up.php';
            break;
        case 'logout':
            session_destroy();
            $clientindex = new HttpClient(HTTP_BASE);
            $result = $clientindex->post('/controller/LoginController.php',  [
                'ope' => 'logout',
            ]);
            echo '<script>window.location.href="' . HTTP_BASE . '/login"</script>';
            break;
        case 'web':
            
            //verificarlogin();
            switch ($segments[2] ?? '') {
                case 'customer':
                    include ROOT_VIEW . '/web/customer.php';
                    break;
                case 'system':
                    switch ($segments[3] ?? '') {
                        case 'dashboard':
                            include ROOT_VIEW . '/web/dashboard.php';
                            break;
                        case 'profile':
                            include ROOT_VIEW . '/web/profile.php';
                            break;
                        
                        case 'list':
                            require ROOT_VIEW . '/web/bank/list.php';
                            break;
                        case 'create':
                            require ROOT_VIEW . '/web/bank/create.php';
                            break;
                        case 'edit':
                            if (isset($segments[4])) {
                                $_GET['id'] = $segments[4];
                                require ROOT_VIEW . '/web/bank/edit.php';
                            } else {
                                error404();
                            }
                            break;
                        case 'delete':
                            if (isset($segments[4])) {
                                $_GET['id'] = $segments[4];
                                require ROOT_VIEW . '/web/bank/delete.php';
                            } else {
                                error404();
                            }
                            break;
                        case 'view':
                            if (isset($segments[4])) {
                                $_GET['id'] = $segments[4];
                                require ROOT_VIEW . '/web/bank/view.php';
                            } else {
                                error404();
                            }
                            break;
                        default:
                            home();
                            break;
                    }
                    break;
                default:
                    home();
                    break;
            }
            
            break;
        default:
            home();
            break;
    }
} else {
}
