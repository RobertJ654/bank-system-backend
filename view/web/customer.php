<!-- Agregamos el HEADER -->
<?php require ROOT_VIEW.'/template/header.php'; ?>

<body class="g-sidenav-show bg-gray-100">
    <div class="min-height-300 bg-dark position-absolute w-100"></div>

    <!-- Agregamos el componente SIDENAV -->
    <aside class="sidenav bg-white navbar navbar-vertical navbar-expand-xs border-0 border-radius-xl my-3 fixed-start ms-4" id="sidenav-main">
        <?php require ROOT_VIEW.'/template/sidenav.php'; ?>

        <li class="nav-item mt-3">
            <h6 class="ps-4 ms-2 text-uppercase text-xs font-weight-bolder opacity-6">Acceso Autorizado</h6>
        </li>

        <li class="nav-item">
            <a class="nav-link" href="<?php echo HTTP_BASE;?>/web/customer">
                <div class="icon icon-shape icon-sm border-radius-md text-center me-2 d-flex align-items-center justify-content-center">
                    <i class="ni ni-credit-card text-success text-sm opacity-10"></i>
                </div>
                <span class="nav-link-text ms-1">Transacciones</span>
            </a>
        </li>
    </aside>

    <main class="main-content position-relative border-radius-lg">

        <!-- Agregamos el componente NAVBAR -->
        <?php require ROOT_VIEW.'/template/navbar.php'; ?>

        <div class="container-fluid py-4">
            <div class="row">
                <div class="col-lg-8">
                    <div class="row">
                        <div class="col-xl-6 mb-xl-0 mb-4">
                            <div class="card bg-transparent shadow-xl">
                                <div class="overflow-hidden position-relative border-radius-xl" style="background-image: url('https://raw.githubusercontent.com/creativetimofficial/public-assets/master/argon-dashboard-pro/assets/img/card-visa.jpg');">
                                    <span class="mask bg-gradient-dark"></span>
                                    <div class="card-body position-relative z-index-1 p-3">
                                        <i class="fas fa-wifi text-white p-2"></i>
                                        <h5 class="text-white mt-4 mb-5 pb-2">4562&nbsp;&nbsp;&nbsp;1122&nbsp;&nbsp;&nbsp;4594&nbsp;&nbsp;&nbsp;7852</h5>
                                        <div class="d-flex">
                                            <div class="d-flex">
                                                <div class="me-4">
                                                    <p class="text-white text-sm opacity-8 mb-0">Card Holder</p>
                                                    <h6 class="text-white mb-0">Jack Peterson</h6>
                                                </div>
                                                <div>
                                                    <p class="text-white text-sm opacity-8 mb-0">Expires</p>
                                                    <h6 class="text-white mb-0">11/22</h6>
                                                </div>
                                            </div>
                                            <div class="ms-auto w-20 d-flex align-items-end justify-content-end">
                                                <img class="w-60 mt-2" src="<?php echo URL_RESOURCES."/lib/argon-dashboard/"; ?>/assets/img/logos/mastercard.png" alt="logo">
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-xl-6">
                            <div class="row">
                                <div class="col-md-6">
                                    <div class="card">
                                        <div class="card-header mx-4 p-3 text-center">
                                            <div class="icon icon-shape icon-lg bg-gradient-primary shadow text-center border-radius-lg">
                                                <i class="fas fa-landmark opacity-10"></i>
                                            </div>
                                        </div>
                                        <div class="card-body pt-0 p-3 text-center">
                                            <h6 class="text-center mb-0">Salary</h6>
                                            <span class="text-xs">Belong Interactive</span>
                                            <hr class="horizontal dark my-3">
                                            <h5 class="mb-0">+$2000</h5>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-6 mt-md-0 mt-4">
                                    <div class="card">
                                        <div class="card-header mx-4 p-3 text-center">
                                            <div class="icon icon-shape icon-lg bg-gradient-primary shadow text-center border-radius-lg">
                                                <i class="fab fa-paypal opacity-10"></i>
                                            </div>
                                        </div>
                                        <div class="card-body pt-0 p-3 text-center">
                                            <h6 class="text-center mb-0">Paypal</h6>
                                            <span class="text-xs">Freelance Payment</span>
                                            <hr class="horizontal dark my-3">
                                            <h5 class="mb-0">$455.00</h5>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-12 mb-lg-0 mb-4">
                            <div class="card mt-4">
                                <div class="card-header pb-0 p-3">
                                    <div class="row">
                                        <div class="col-6 d-flex align-items-center">
                                            <h6 class="mb-0">Payment Method</h6>
                                        </div>
                                        <div class="col-6 text-end">
                                            <a class="btn bg-gradient-dark mb-0" href="javascript:;"><i class="fas fa-plus"></i>&nbsp;&nbsp;Add New Card</a>
                                        </div>
                                    </div>
                                </div>
                                <div class="card-body p-3">
                                    <div class="row">
                                        <div class="col-md-6 mb-md-0 mb-4">
                                            <div class="card card-body border card-plain border-radius-lg d-flex align-items-center flex-row">
                                                <img class="w-10 me-3 mb-0" src="<?php echo URL_RESOURCES."/lib/argon-dashboard/"; ?>/assets/img/logos/mastercard.png" alt="logo">
                                                <h6 class="mb-0">****&nbsp;&nbsp;&nbsp;****&nbsp;&nbsp;&nbsp;****&nbsp;&nbsp;&nbsp;7852</h6>
                                                <i class="fas fa-pencil-alt ms-auto text-dark cursor-pointer" data-bs-toggle="tooltip" data-bs-placement="top" title="Edit Card"></i>
                                            </div>
                                        </div>
                                        <div class="col-md-6">
                                            <div class="card card-body border card-plain border-radius-lg d-flex align-items-center flex-row">
                                                <img class="w-10 me-3 mb-0" src="<?php echo URL_RESOURCES."/lib/argon-dashboard/"; ?>/assets/img/logos/visa.png" alt="logo">
                                                <h6 class="mb-0">****&nbsp;&nbsp;&nbsp;****&nbsp;&nbsp;&nbsp;****&nbsp;&nbsp;&nbsp;5248</h6>
                                                <i class="fas fa-pencil-alt ms-auto text-dark cursor-pointer" data-bs-toggle="tooltip" data-bs-placement="top" title="Edit Card"></i>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-lg-4">
                    <div class="card h-100">
                        <div class="card-header pb-0 p-3">
                            <div class="row">
                                <div class="col-6 d-flex align-items-center">
                                    <h6 class="mb-0">Invoices</h6>
                                </div>
                                <div class="col-6 text-end">
                                    <button class="btn btn-outline-primary btn-sm mb-0">View All</button>
                                </div>
                            </div>
                        </div>
                        <div class="card-body p-3 pb-0">
                            <ul class="list-group">
                                <li class="list-group-item border-0 d-flex justify-content-between ps-0 mb-2 border-radius-lg">
                                    <div class="d-flex flex-column">
                                        <h6 class="mb-1 text-dark font-weight-bold text-sm">March, 01, 2020</h6>
                                        <span class="text-xs">#MS-415646</span>
                                    </div>
                                    <div class="d-flex align-items-center text-sm">
                                        $180
                                        <button class="btn btn-link text-dark text-sm mb-0 px-0 ms-4"><i class="fas fa-file-pdf text-lg me-1"></i> PDF</button>
                                    </div>
                                </li>
                                <li class="list-group-item border-0 d-flex justify-content-between ps-0 mb-2 border-radius-lg">
                                    <div class="d-flex flex-column">
                                        <h6 class="text-dark mb-1 font-weight-bold text-sm">February, 10, 2021</h6>
                                        <span class="text-xs">#RV-126749</span>
                                    </div>
                                    <div class="d-flex align-items-center text-sm">
                                        $250
                                        <button class="btn btn-link text-dark text-sm mb-0 px-0 ms-4"><i class="fas fa-file-pdf text-lg me-1"></i> PDF</button>
                                    </div>
                                </li>
                                <li class="list-group-item border-0 d-flex justify-content-between ps-0 border-radius-lg">
                                    <div class="d-flex flex-column">
                                        <h6 class="text-dark mb-1 font-weight-bold text-sm">April, 05, 2019</h6>
                                        <span class="text-xs">#FB-212562</span>
                                    </div>
                                    <div class="d-flex align-items-center text-sm">
                                        $560
                                        <button class="btn btn-link text-dark text-sm mb-0 px-0 ms-4"><i class="fas fa-file-pdf text-lg me-1"></i> PDF</button>
                                    </div>
                                </li>
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <!-- Agregamos el FOOTER -->
        <?php require ROOT_VIEW.'/template/footer.php'; ?>

    </main>

    <!-- Componente SETTINGS -->
    <?php require ROOT_VIEW.'/template/settings.php'; ?>

    <!-- Scripts Core JS -->
    <script src="<?php echo URL_RESOURCES."/lib/argon-dashboard/"; ?>/assets/js/core/popper.min.js"></script>
    <script src="<?php echo URL_RESOURCES."/lib/argon-dashboard/"; ?>/assets/js/core/bootstrap.min.js"></script>
    <script src="<?php echo URL_RESOURCES."/lib/argon-dashboard/"; ?>/assets/js/plugins/perfect-scrollbar.min.js"></script>
    <script src="<?php echo URL_RESOURCES."/lib/argon-dashboard/"; ?>/assets/js/plugins/smooth-scrollbar.min.js"></script>
    <script>
        // Inicialización del scrollbar si se está en Windows
        var win = navigator.platform.indexOf('Win') > -1;
        if (win && document.querySelector('#sidenav-scrollbar')) {
            var options = {
                damping: '0.5'
            }
            Scrollbar.init(document.querySelector('#sidenav-scrollbar'), options);
        }
    </script>
    <!-- Botones de GitHub -->
    <script async defer src="https://buttons.github.io/buttons.js"></script>
    <!-- Control Center para Soft Dashboard: efectos parallax, scripts para las páginas de ejemplo, etc. -->
    <script src="<?php echo URL_RESOURCES."/lib/argon-dashboard/"; ?>/assets/js/argon-dashboard.min.js?v=2.0.4"></script>
</body>

<!-- Cerramos el HTML -->
</html>
