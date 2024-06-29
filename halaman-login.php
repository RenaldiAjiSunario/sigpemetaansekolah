<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="utf-8">
  <meta content="width=device-width, initial-scale=1.0" name="viewport">

  <title>SIG Pemetaan Sekolah Kotamobagu</title>
  <meta content="" name="description">
  <meta content="" name="keywords">

  <!-- Favicons -->
  <link href="assets/img/favicon.jpg" rel="icon">
  <link href="assets/img/apple-touch-icon.jpg" rel="apple-touch-icon">

  <!-- Google Fonts -->
  <link href="https://fonts.googleapis.com/css?family=Open+Sans:300,300i,400,400i,600,600i,700,700i|Roboto:300,300i,400,400i,500,500i,600,600i,700,700i|Poppins:300,300i,400,400i,500,500i,600,600i,700,700i" rel="stylesheet">

  <!-- Vendor CSS Files -->
  <link href="assets/vendor/aos/aos.css" rel="stylesheet">
  <link href="assets/vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">
  <link href="assets/vendor/bootstrap-icons/bootstrap-icons.css" rel="stylesheet">
  <link href="assets/vendor/boxicons/css/boxicons.min.css" rel="stylesheet">
  <link href="assets/vendor/glightbox/css/glightbox.min.css" rel="stylesheet">
  <link href="assets/vendor/swiper/swiper-bundle.min.css" rel="stylesheet">

  <!-- Template Main CSS File -->
  <link href="assets/css/style.css" rel="stylesheet">

  <!-- =======================================================
  * Template Name: BizLand - v3.10.0
  * Template URL: https://bootstrapmade.com/bizland-bootstrap-business-template/
  * Author: BootstrapMade.com
  * License: https://bootstrapmade.com/license/
  ======================================================== -->
</head>

<body>

  <!-- ======= Top Bar ======= -->
  <section id="topbar" class="d-flex align-items-center">
    <div class="container d-flex justify-content-center justify-content-md-between">
      <div class="contact-info d-flex align-items-center">
      </div>
      <div class="social-links d-none d-md-flex align-items-center">
      </div>
    </div>
  </section>

  <!-- ======= Header ======= -->
  <header id="header" class="d-flex align-items-center">
    <div class="container d-flex align-items-center justify-content-between">

      <!-- Uncomment below if you prefer to use an image logo -->
      <a href="welcome" class="logo"><img src="logoktg.jpg" alt=""></a>
      &nbsp;&nbsp;&nbsp;
      <h1 class="logo"><a href="welcome">Sistem Informasi Geografis Sekolah Kotamobagu</a></h1>

      <nav id="navbar" class="navbar">
      <ul>
          <li><a class="nav-link scrollto" href="welcome">Beranda</a></li>
          <li><a class="nav-link scrollto" href="daftar-sma-kotamobagu">Daftar Sekolah</a></li>
          <li><a class="nav-link scrollto" href="pemetaan">Pemetaan</a></li>
          <li><a class="nav-link scrollto active" href="login">Login</a></li>
        </ul>
        <i class="bi bi-list mobile-nav-toggle"></i>
      </nav><!-- .navbar -->

    </div>
  </header><!-- End Header -->

  <main id="main">

    <!-- ======= PROFIL DESA ======= -->
    <section id="daftar-berita" class="featured-services">
      <div class="container" data-aos="fade-up">
        <div class="container col-lg-5 col-md-6">
          <?php
          error_reporting(0);
          $login=$_GET['login'];
          if($login == 'gagal')
              {
                echo "<div class='alert alert-danger' role='alert'>";
                echo "<h4 align='center'> Username atau Password Salah </h4>";
                echo "</div>";
              }
          ?>
            <div class="section-title">
                <h2>Halaman Login</h2>
            </div>
          <form action="masuk-admin" class="form-control" method="post">
            <table class="table table-borderless">
                <tr align="center">
                    <td><b>Username</b></td>
                </tr>
                <tr align="center">
                    <td><input type="text" class="form-control" name="username" id="username" placeholder="masukan username anda"></td>
                </tr>
                <tr align="center">
                    <td><b>Password</b></td>
                </tr>
                <tr align="center">
                    <td><input type="password" class="form-control"  name="password" id="password" placeholder="masukan password anda"></td>
                </tr>
                <tr align="center">
                  <td><input type="submit" class="btn btn-warning" value="Login"></td>
                </tr>
            </table>
          </form>

      </div>
    </section><!-- End PROFIL DESA -->

  </main><!-- End #main -->

  <!-- ======= Footer ======= -->
  <footer id="footer">

    <div class="container py-4">
      <div class="copyright">
        &copy; Copyright <strong> <?php echo date("Y"); ?></strong>. All Rights Reserved
      </div>
      <div class="credits">
      </div>
    </div>
  </footer><!-- End Footer -->

  <div id="preloader"></div>
  <a href="#" class="back-to-top d-flex align-items-center justify-content-center"><i class="bi bi-arrow-up-short"></i></a>

  <!-- Vendor JS Files -->
  <script src="assets/vendor/purecounter/purecounter_vanilla.js"></script>
  <script src="assets/vendor/aos/aos.js"></script>
  <script src="assets/vendor/bootstrap/js/bootstrap.bundle.min.js"></script>
  <script src="assets/vendor/glightbox/js/glightbox.min.js"></script>
  <script src="assets/vendor/isotope-layout/isotope.pkgd.min.js"></script>
  <script src="assets/vendor/swiper/swiper-bundle.min.js"></script>
  <script src="assets/vendor/waypoints/noframework.waypoints.js"></script>
  <script src="assets/vendor/php-email-form/validate.js"></script>

  <!-- Template Main JS File -->
  <script src="assets/js/main.js"></script>

</body>

</html>