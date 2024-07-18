<!--   Agregamos el HEADER   -->
<?php require ROOT_VIEW.'/template/header.php'; ?>




<body class="g-sidenav-show   bg-gray-100">
  <div class="min-height-300 bg-gradient-dark position-absolute w-100"></div>



  <!--   Agregamos el componente SIDENAV   -->
  <aside class="sidenav bg-white navbar navbar-vertical navbar-expand-xs border-0 border-radius-xl my-3 fixed-start ms-4 " id="sidenav-main">
        
        <?php require ROOT_VIEW.'/template/sidenav.php'; ?>

        <li class="nav-item mt-3">
          <h6 class="ps-4 ms-2 text-uppercase text-xs font-weight-bolder opacity-6">Acceso Autorizado</h6>
        </li>
        <li class="nav-item">
          <a class="nav-link " href="<?php echo HTTP_BASE;?>/web/system/list" >
            <div class="icon icon-shape icon-sm border-radius-md text-center me-2 d-flex align-items-center justify-content-center">
              <i class="ni ni-calendar-grid-58 text-warning text-sm opacity-10"></i>
            </div>
            <span class="nav-link-text ms-1">Clientes</span>
          </a>
        </li>

    </aside>



  <main class="main-content position-relative border-radius-lg ">




  <!--   Agregamos el componente NAVBAR   -->
  <?php require ROOT_VIEW.'/template/navbar.php'; ?>




    <div class="container-fluid py-4">
      <div class="row">
        <div class="col-12">
          <div class="card mb-4">
            <div class="card-header pb-0">
              <h6>Tabla de clientes</h6>

              <div class="input-group">
              <span class="input-group-text text-body"><i class="fas fa-search" aria-hidden="true"></i></span>
              <input type="text" class="form-control" placeholder="Buscar en la tabla de clientes..." onfocus="focused(this)" onfocusout="defocused(this)">
            </div>

            </div>
            <div class="card-body px-0 pt-0 pb-2">
              <div class="table-responsive p-0">
                <table class="table align-items-center mb-0">
                  <thead>
                    <tr>
                      <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-10">Cliente</th>
                      <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-10 ps-2">Ubicación</th>
                      <th class="text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-10">Contacto</th>
                      <th class="text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-10">Estado</th>
                      <th class="text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-10">Registro</th>
                      <th class="text-secondary opacity-10"></th>
                    </tr>
                  </thead>
                  <tbody>
                    <?php foreach ($records as $fila) : ?>
                      <tr>
                        <td>
                          <div class="d-flex px-2 py-1">
                            <div>
                              <img src="<?php echo URL_RESOURCES."/lib/argon-dashboard/"; ?>/assets/img/team-2.jpg" class="avatar avatar-sm me-3" alt="user1">
                            </div>
                            <div class="d-flex flex-column justify-content-center">
                              <h6 class="mb-0 text-sm">John Michael</h6>
                              <p class="text-xs text-secondary mb-0">john@creative-tim.com</p>
                            </div>
                          </div>
                        </td>
                        <td>
                          <p class="text-xs font-weight-bold mb-0">Bld Mihail Kogalniceanu, nr. 8 Bl 1, Sc 1, Ap 09</p>
                          <p class="text-xs text-secondary mb-0">New York</p>
                        </td>
                        <td>
                          <p class="text-xs font-weight-bold mb-0">437300437300</p>
                          <p class="text-xs text-secondary mb-0">Personal</p>
                        </td>
                        <td class="align-middle text-center text-sm">
                          <span class="badge badge-sm bg-gradient-success">Activo</span>
                        </td>
                        <td class="align-middle text-center">
                          <span class="text-secondary text-xs font-weight-bold">23/04/18</span>
                        </td>
                        <td class="align-middle text-center">
                          <a href="" class="btn btn-success btn-sm">Ver</a>
                          <a href="" class="btn btn-secondary btn-sm">Editar</a>
                          <a href="" class="btn btn-danger btn-sm">Eliminar</a>
                        </td>
                      </tr>
                    <?php endforeach; ?>
                  </tbody>
                </table>
              </div>
            </div>
          </div>
        </div>
      </div>



      <!--   Agregamos el componente FOOTER   -->
      <?php require ROOT_VIEW.'/template/footer.php'; ?>
      


    </div>
  </main>
  
  



  <!--   Agregamos el componente SETTINGS   -->
  <?php require ROOT_VIEW.'/template/settings.php'; ?>




  <!--   Core JS Files   -->
  <script src="<?php echo URL_RESOURCES."/lib/argon-dashboard/"; ?>/assets/js/core/popper.min.js"></script>
  <script src="<?php echo URL_RESOURCES."/lib/argon-dashboard/"; ?>/assets/js/core/bootstrap.min.js"></script>
  <script src="<?php echo URL_RESOURCES."/lib/argon-dashboard/"; ?>/assets/js/plugins/perfect-scrollbar.min.js"></script>
  <script src="<?php echo URL_RESOURCES."/lib/argon-dashboard/"; ?>/assets/js/plugins/smooth-scrollbar.min.js"></script>
  <script>
    var win = navigator.platform.indexOf('Win') > -1;
    if (win && document.querySelector('#sidenav-scrollbar')) {
      var options = {
        damping: '0.5'
      }
      Scrollbar.init(document.querySelector('#sidenav-scrollbar'), options);
    }
  </script>
  <!-- Github buttons -->
  <script async defer src="https://buttons.github.io/buttons.js"></script>
  <!-- Control Center for Soft Dashboard: parallax effects, scripts for the example pages etc -->
  <script src="<?php echo URL_RESOURCES."/lib/argon-dashboard/"; ?>/assets/js/argon-dashboard.min.js?v=2.0.4"></script>
</body>

</html>