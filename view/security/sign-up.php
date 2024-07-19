<?php
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $ope = 'register';
    $p_correo_electronico = $_POST['email'];
    $p_nombre = $_POST['name'];
    $p_contrasena = $_POST['password'];
    //Validar
    try {
        $data = [
            'ope' => $ope,
            'correo_electronico' => $p_correo_electronico,
            'nombre' =>  $p_nombre,
            'contrasena' => $p_contrasena,
        ];
        $context = stream_context_create([
            'http' => [
                'method' => 'POST',
                'header' => 'Content-Type: application/json',
                'content' => json_encode($data),
            ]
        ]);
        $url = HTTP_BASE . "/controller/LoginController.php";
        $response = file_get_contents($url, false, $context);
        $result = json_decode($response, true);
        if ($result["ESTADO"]) {
            echo "<script>alert('Se realizo la operacion de manera Exitosa');</script>";
        } else {
            echo "<script>alert('Hubo un problema, Contactarse con el Administrador de Sistemas');</script>";
        }
    } catch (Exception $e) {
        echo "<script>alert('Hubo un problema, Contactarse con el Administrador de Sistemas');</script>";
    }
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="utf-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <link rel="apple-touch-icon" sizes="76x76" href="<?php echo URL_RESOURCES."/lib/argon-dashboard/"; ?>/assets/img/apple-icon.png">
  <link rel="icon" type="image/png" href="<?php echo URL_RESOURCES."/lib/argon-dashboard/"; ?>/assets/img/favicon.png">
  <title>
    Sign up - Bank System
  </title>
  <!--     Fonts and icons     -->
  <link href="https://fonts.googleapis.com/css?family=Open+Sans:300,400,600,700" rel="stylesheet" />
  <!-- Nucleo Icons -->
  <link href="<?php echo URL_RESOURCES."/lib/argon-dashboard/"; ?>/assets/css/nucleo-icons.css" rel="stylesheet" />
  <link href="<?php echo URL_RESOURCES."/lib/argon-dashboard/"; ?>/assets/css/nucleo-svg.css" rel="stylesheet" />
  <!-- Font Awesome Icons -->
  <script src="https://kit.fontawesome.com/42d5adcbca.js" crossorigin="anonymous"></script>
  <link href="<?php echo URL_RESOURCES."/lib/argon-dashboard/"; ?>/assets/css/nucleo-svg.css" rel="stylesheet" />
  <!-- CSS Files -->
  <link id="pagestyle" href="<?php echo URL_RESOURCES."/lib/argon-dashboard/"; ?>/assets/css/argon-dashboard.css?v=2.0.4" rel="stylesheet" />  
</head>

<body class="">
  <!-- Navbar -->
  <nav class="navbar navbar-expand-lg position-absolute top-0 z-index-3 w-100 shadow-none my-3 navbar-transparent mt-4">
    <div class="container">
      <a class="navbar-brand font-weight-bolder ms-lg-0 ms-3 text-white" href="<?php echo HTTP_BASE;?>">
        Bank System
      </a>
      <button class="navbar-toggler shadow-none ms-2" type="button" data-bs-toggle="collapse" data-bs-target="#navigation" aria-controls="navigation" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon mt-2">
          <span class="navbar-toggler-bar bar1"></span>
          <span class="navbar-toggler-bar bar2"></span>
          <span class="navbar-toggler-bar bar3"></span>
        </span>
      </button>
      <div class="collapse navbar-collapse" id="navigation">
        <ul class="navbar-nav mx-auto">
          <li class="nav-item">
            <a class="nav-link d-flex align-items-center me-2 active" aria-current="page" href="">
              <i class="fa fa-chart-pie opacity-6  me-1"></i>
              Dashboard
            </a>
          </li>
          <li class="nav-item">
            <a class="nav-link me-2" href="">
              <i class="fas fa-user-circle opacity-6  me-1"></i>
              Sign Up
            </a>
          </li>
          <li class="nav-item">
            
            <!-- Cambiamos de pestaña a sign-in -->
            <a class="nav-link me-2" href="<?php echo HTTP_BASE;?>/sign-in">
              <i class="fas fa-key opacity-6  me-1"></i>
              Sign In
            </a>

          </li>
        </ul>
      </div>
      <a class="navbar-brand font-weight-bolder ms-lg-0 ms-3 text-white" href="">
        About Us
      </a>
    </div>
  </nav>
  <!-- End Navbar -->
  <main class="main-content  mt-0">
    <div class="page-header align-items-start min-vh-50 pt-5 pb-11 m-3 border-radius-lg" style="background-image: url('https://raw.githubusercontent.com/creativetimofficial/public-assets/master/argon-dashboard-pro/assets/img/signup-cover.jpg'); background-position: top;">
      <span class="mask bg-gradient-dark opacity-6"></span>
      <div class="container">
        <div class="row justify-content-center">
          <div class="col-lg-5 text-center mx-auto">
            <h1 class="text-white mb-2 mt-5">Welcome!</h1>
            <p class="text-lead text-white">Use these awesome forms to login or create new account in your project for free.</p>
          </div>
        </div>
      </div>
    </div>
    <div class="container">
      <div class="row mt-lg-n10 mt-md-n11 mt-n10 justify-content-center">
        
        <!-- Ajustamos el ancho del formulario del Formulario -->
        <div class="col-xl-6 col-lg-8 col-md-10 mx-auto">
          <div class="card z-index-0">
            <div class="card-header text-center pt-4">
              <h5>Register</h5>
            </div>

            <!-- Inicio del Formulario -->
            <form action="" method="post">

              <div class="card-body">
                <p class="text-uppercase text-sm">User Information</p>
                <div class="row">
                <div class="col-md-8">
                    <div class="form-group">
                      <label for="example-text-input" class="form-control-label">Name</label>
                      <input class="form-control" type="text" onfocus="focused(this)" onfocusout="defocused(this)" placeholder="Name" name="name">
                    </div>
                  </div>
                  <div class="col-md-10">
                    <div class="form-group">
                      <label for="example-text-input" class="form-control-label">Email address</label>
                      <input class="form-control" type="email" onfocus="focused(this)" onfocusout="defocused(this)" placeholder="Email address" name="email">
                    </div>
                  </div>
                </div>

                <hr class="horizontal dark">

                <p class="text-uppercase text-sm">security</p>
                <div class="row">
                  <div class="col-md-8">
                    <div class="form-group">
                      <label for="example-text-input" class="form-control-label">Password</label>
                      <input class="form-control" type="password" onfocus="focused(this)" onfocusout="defocused(this)" placeholder="Password" name="password">
                    </div>
                  </div>
                </div>
                
              </div>


              <div class="form-check form-check-info text-start">
                <label class="form-check-label" for="flexCheckDefault">
                  I agree the <a href="javascript:;" class="text-dark font-weight-bolder">Terms and Conditions</a>
                </label>
              </div>
              <div class="text-center">
                <button type="submit" class="btn bg-gradient-dark w-100 my-4 mb-2">Sign up</button>
              </div>
              <p class="text-sm mt-3 mb-0">Already have an account? <a href="<?php echo HTTP_BASE;?>/sign-in" class="text-dark font-weight-bolder">Sign in</a></p>
            
            </form>
            <!-- Fin del Formulario -->

          </div>
        </div>
      </div>
    </div>
  </main>
  <!-- -------- START FOOTER 3 w/ COMPANY DESCRIPTION WITH LINKS & SOCIAL ICONS & COPYRIGHT ------- -->
  <footer class="footer py-5">
    <div class="container">
      <div class="row">
        <div class="col-lg-8 mb-4 mx-auto text-center">
          <a href="javascript:;" target="_blank" class="text-secondary me-xl-5 me-3 mb-sm-0 mb-2">
            Company
          </a>
          <a href="javascript:;" target="_blank" class="text-secondary me-xl-5 me-3 mb-sm-0 mb-2">
            About Us
          </a>
          <a href="javascript:;" target="_blank" class="text-secondary me-xl-5 me-3 mb-sm-0 mb-2">
            Team
          </a>
          <a href="javascript:;" target="_blank" class="text-secondary me-xl-5 me-3 mb-sm-0 mb-2">
            Products
          </a>
          <a href="javascript:;" target="_blank" class="text-secondary me-xl-5 me-3 mb-sm-0 mb-2">
            Blog
          </a>
          <a href="javascript:;" target="_blank" class="text-secondary me-xl-5 me-3 mb-sm-0 mb-2">
            Pricing
          </a>
        </div>
        <div class="col-lg-8 mx-auto text-center mb-4 mt-2">
          <a href="javascript:;" target="_blank" class="text-secondary me-xl-4 me-4">
            <span class="text-lg fab fa-dribbble"></span>
          </a>
          <a href="javascript:;" target="_blank" class="text-secondary me-xl-4 me-4">
            <span class="text-lg fab fa-twitter"></span>
          </a>
          <a href="javascript:;" target="_blank" class="text-secondary me-xl-4 me-4">
            <span class="text-lg fab fa-instagram"></span>
          </a>
          <a href="javascript:;" target="_blank" class="text-secondary me-xl-4 me-4">
            <span class="text-lg fab fa-pinterest"></span>
          </a>
          <a href="javascript:;" target="_blank" class="text-secondary me-xl-4 me-4">
            <span class="text-lg fab fa-github"></span>
          </a>
        </div>
      </div>
      <div class="row">
        <div class="col-8 mx-auto text-center mt-1">
          <p class="mb-0 text-secondary">
            Copyright © <script>
              document.write(new Date().getFullYear())
            </script> Soft by Creative Tim.
          </p>
        </div>
      </div>
    </div>
  </footer>
  <!-- -------- END FOOTER 3 w/ COMPANY DESCRIPTION WITH LINKS & SOCIAL ICONS & COPYRIGHT ------- -->
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


  <script src="https://cdn.jsdelivr.net/npm/flatpickr"></script>

</body>

</html>