<!-- Incluye el HEADER -->
<?php require ROOT_VIEW.'/template/header.php'; ?>

<?php
// Obtener el parámetro 'id' desde la URL
$pId = $_GET['id'] ?? null;
var_dump($_GET); // Depuración: imprime el contenido de $_GET

$record = null;

// Si se proporciona un 'id', hacer una solicitud para obtener los datos del cliente
if ($pId) {
    $url = HTTP_BASE . '/controller/CustomersController.php?ope=filterId&id=' . $pId;
    $response = file_get_contents($url);
    var_dump($response); // Depuración: imprime la respuesta de la solicitud

    // Decodificar la respuesta JSON obtenida
    $responseData = json_decode($response, true);

    // Si la respuesta es válida y el estado es 1 y los datos no están vacíos, asignar los datos del primer registro
    if ($responseData && $responseData['ESTADO'] == 1 && !empty($responseData['DATA'])) {
        $record = $responseData['DATA'][0];
    } else {
        $record = null;
    }
}
?>

<body class="g-sidenav-show bg-gray-100">
    <div class="position-absolute w-100 min-height-300 top-0" style="background-image: url('https://raw.githubusercontent.com/creativetimofficial/public-assets/master/argon-dashboard-pro/assets/img/profile-layout-header.jpg'); background-position-y: 50%;">
        <span class="mask bg-gradient-dark opacity-6"></span>
    </div>

    <!-- Incluye el componente SIDENAV -->
    <aside class="sidenav bg-white navbar navbar-vertical navbar-expand-xs border-0 border-radius-xl my-3 fixed-start ms-4 " id="sidenav-main">
        <?php require ROOT_VIEW.'/template/sidenav.php'; ?>

        <li class="nav-item mt-3">
            <h6 class="ps-4 ms-2 text-uppercase text-xs font-weight-bolder opacity-6">Acceso Autorizado</h6>
        </li>
        <li class="nav-item">
            <a class="nav-link " href="<?php echo HTTP_BASE;?>/web/system/list">
                <div class="icon icon-shape icon-sm border-radius-md text-center me-2 d-flex align-items-center justify-content-center">
                    <i class="ni ni-calendar-grid-58 text-warning text-sm opacity-10"></i>
                </div>
                <span class="nav-link-text ms-1">Clientes</span>
            </a>
        </li>
    </aside>

    <div class="main-content position-relative max-height-vh-100 h-100">
        <div class="card shadow-lg mx-4 card-profile-bottom">
            <div class="card-body p-3">
                <div class="row gx-4">
                    <div class="col-auto">
                        <div class="avatar avatar-xl position-relative">
                            <img src="<?php echo URL_RESOURCES."/lib/argon-dashboard/"; ?>/assets/img/team-2.jpg" alt="profile_image" class="w-100 border-radius-lg shadow-sm">
                        </div>
                    </div>
                    <div class="col-auto my-auto">
                        <div class="h-100">
                            <h5 class="mb-1">
                                Admin | <?php echo $_SESSION['login']['nombre']; ?>
                            </h5>
                            <p class="mb-0 font-weight-bold text-sm">
                                <a href="#" class="d-block"><?php echo $_SESSION['login']['correo_electronico']; ?></a>
                            </p>
                        </div>
                    </div>
                    <div class="col-lg-4 col-md-6 my-sm-auto ms-sm-auto me-sm-0 mx-auto mt-3">
                        <div class="nav-wrapper position-relative end-0">
                            <ul class="nav nav-pills nav-fill p-1" role="tablist">
                                <li class="nav-item">
                                    <a class="nav-link mb-0 px-0 py-1 active d-flex align-items-center justify-content-center " data-bs-toggle="tab" href="javascript:;" role="tab" aria-selected="true">
                                        <i class="ni ni-app"></i>
                                        <span class="ms-2">App</span>
                                    </a>
                                </li>
                                <li class="nav-item">
                                    <a class="nav-link mb-0 px-0 py-1 d-flex align-items-center justify-content-center " data-bs-toggle="tab" href="javascript:;" role="tab" aria-selected="false">
                                        <i class="ni ni-email-83"></i>
                                        <span class="ms-2">Mensajes</span>
                                    </a>
                                </li>
                                <li class="nav-item">
                                    <a class="nav-link mb-0 px-0 py-1 d-flex align-items-center justify-content-center " data-bs-toggle="tab" href="javascript:;" role="tab" aria-selected="false">
                                        <i class="ni ni-settings-gear-65"></i>
                                        <span class="ms-2">Ajustes</span>
                                    </a>
                                </li>
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <div class="container-fluid py-4">
            <div class="row">
                <div class="col-md-1"></div>
                <!-- Aquí inicia el view -->
                <div class="col-md-10">
                    <div class="card">
                        <div class="card-header pb-0">
                            <div class="d-flex align-items-center">
                                <p class="mb-0"><b>Ver Información de Cliente</b></p>
                                <a class="btn btn-success btn-sm ms-auto" href="<?php echo HTTP_BASE;?>/web/system/list">Volver</a>
                            </div>
                        </div>

                        <form action="" method="post">
                            <div class="card-body">
                                <p class="text-uppercase text-sm">Información de usuario</p>
                                <div class="row">
                                    <div class="col-md-8">
                                        <div class="form-group">
                                            <label for="id">Nro Registro</label>
                                            <input type="hidden" class="form-control" name="id" value="<?php echo $record['id']; ?>">
                                            <input type="text" class="form-control" value="<?php echo $record['id']; ?>" disabled>
                                        </div>
                                    </div>
                                    <div class="col-md-4">
                                        <div class="form-group">
                                            <label for="example-text-input" class="form-control-label">Fecha de registro</label>
                                            <input type="date" class="form-control" name="registration_date" required value="<?php echo $record['registration_date']; ?>" disabled>
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label for="example-text-input" class="form-control-label">Nombres</label>
                                            <input type="text" class="form-control" name="name" required value="<?php echo $record['name']; ?>" disabled>
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label for="example-text-input" class="form-control-label">Apellidos</label>
                                            <input class="form-control" type="text" name="lastname" required value="<?php echo $record['lastname']; ?>" disabled>
                                        </div>
                                    </div>
                                    <div class="col-md-8">
                                        <div class="form-group">
                                            <label for="example-text-input" class="form-control-label">Correo electrónico</label>
                                            <input class="form-control" type="email" name="email" required value="<?php echo $record['email']; ?>" disabled>
                                        </div>
                                    </div>
                                    <div class="col-md-4">
                                        <div class="form-group">
                                            <label for="example-text-input" class="form-control-label">Cumpleaños</label>
                                            <input class="form-control" type="date" name="birthday" required value="<?php echo $record['birthday']; ?>" disabled>
                                        </div>
                                    </div>
                                </div>
                                <hr class="horizontal dark">
                                <p class="text-uppercase text-sm">Información de contacto</p>
                                <div class="row">
                                    <div class="col-md-12">
                                        <div class="form-group">
                                            <label for="example-text-input" class="form-control-label">Dirección</label>
                                            <input class="form-control" type="text" name="address" required value="<?php echo $record['address']; ?>" disabled>
                                        </div>
                                    </div>
                                    <div class="col-md-8">
                                        <div class="form-group">
                                            <label for="example-text-input" class="form-control-label">Ciudad</label>
                                            <input class="form-control" type="text" name="city" required value="<?php echo $record['city']; ?>" disabled>
                                        </div>
                                    </div>
                                    <div class="col-md-4">
                                        <div class="form-group">
                                            <label for="example-text-input" class="form-control-label">Teléfono</label>
                                            <input class="form-control" type="text" name="phone" required value="<?php echo $record['phone']; ?>" disabled>
                                        </div>
                                    </div>
                                </div>
                                <hr class="horizontal dark">
                            </div>
                        </form>

                        <div class="card-header pb-0">
                            <div class="d-flex align-items-center">
                                <p class="mb-0 ms-auto"><b>Modo de sólo lectura</b></p>
                                <p class="mb-0 ms-auto"></p>
                            </div>
                        </div>
                        <hr class="horizontal dark">
                        <hr class="horizontal dark">
                        <hr class="horizontal dark">
                    </div>
                </div>
                <!-- Hasta aquí es el view -->

                <!-- Agregamos el FOOTER -->
                <?php require ROOT_VIEW.'/template/footer.php'; ?>
            </div>
        </div>
    </div>

    <!-- Agregamos el componente SETTINGS -->
    <?php require ROOT_VIEW.'/template/settings.php'; ?>

    <!-- Core JS Files -->
    <script src="<?php echo URL_RESOURCES."/lib/argon-dashboard/"; ?>/assets/js/core/popper.min.js"></script>
    <script src="<?php echo URL_RESOURCES."/lib/argon-dashboard/"; ?>/assets/js/core/bootstrap.min.js"></script>
    <script src="<?php echo URL_RESOURCES."/lib/argon-dashboard/"; ?>/assets/js/plugins/perfect-scrollbar.min.js"></script>
    <script src="<?php echo URL_RESOURCES."/lib/argon-dashboard/"; ?>/assets/js/plugins/smooth-scrollbar.min.js"></script>
    <script>
        var win = navigator.platform.indexOf('Win') > -1;
        if (win && document.querySelector('#sidenav-scrollbar')) {
            var options = {
                damping: '0.5'
            };
            Scrollbar.init(document.querySelector('#sidenav-scrollbar'), options);
        }
    </script>
    <!-- Github buttons -->
    <script async defer src="https://buttons.github.io/buttons.js"></script>
    <!-- Control Center for Soft Dashboard: parallax effects, scripts for the example pages etc -->
    <script src="<?php echo URL_RESOURCES."/lib/argon-dashboard/"; ?>/assets/js/argon-dashboard.min.js?v=2.0.4"></script>
</body>
</html>
