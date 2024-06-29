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
          <li><a class="nav-link scrollto active" href="daftar-sma-kotamobagu">Daftar Sekolah</a></li>
          <li><a class="nav-link scrollto" href="pemetaan">Pemetaan</a></li>
          <li><a class="nav-link scrollto" href="login">Login</a></li>
        </ul>
        <i class="bi bi-list mobile-nav-toggle"></i>
      </nav><!-- .navbar -->

    </div>
  </header><!-- End Header -->

  <main id="main">

    <!-- ======= DAFTAR SMA ======= -->
    <section id="daftar-berita" class="featured-services">
      <div class="container" data-aos="fade-up">
        
        <div class="section-title">
                <h2 align="center">Daftar Sekolah Terdata</h2>
        </div>
        
            <table class="table">
              <tr>
                <th>No.</th><th>Nama</th><th>Lokasi</th></th><th>Detail</th>
              </tr>
              <?php 
                include 'koneksi/koneksi.php';
                $batas = 20;
                $halaman = isset($_GET['halaman'])?(int)$_GET['halaman'] : 1;
                $halaman_awal = ($halaman>1) ? ($halaman * $batas) - $batas : 0;	
    
                $previous = $halaman - 1;
                $next = $halaman + 1;
                
                $data = mysqli_query($koneksi,"select * from tb_daftar_sma");
                $jumlah_data = mysqli_num_rows($data);
                $total_halaman = ceil($jumlah_data / $batas);
                
                $data_2 = mysqli_query($koneksi,"select * from tb_daftar_sma limit $halaman_awal, $batas");
                $nomor = $halaman_awal+1;
                $no = 1;
                while($d = mysqli_fetch_array($data_2)){ ?>
              <tr>
                <td><?php echo $no ++ ?></td><td><?php echo $d['nama_sma']; ?></td>
                <td><a href="detail-pemetaan?id_daftar_sma=<?php echo $d['id_daftar_sma']; ?>" class="btn btn-warning">Lokasi<i class="bi bi-geo-alt-fill"></i></a></td>
                <td><a href="detail-daftar-sma?id_daftar_sma=<?php echo $d['id_daftar_sma']; ?>" class="btn btn-success">Lihat Profil</a></td>
              </tr>
              <?php } ?>
            </table>
            
            <br></br>
            <ul class="pagination justify-content-center">
                <li><a class="btn btn-warning" <?php if($halaman > 1){ echo 'href="?halaman=$Previous"'; } ?>>Sebelumnya</a></li>
                    <?php for($x=1;$x<=$total_halaman;$x++){ ?>
                        &nbsp;<li><a class="btn btn-warning" href="?halaman=<?php echo $x ?>"><?php echo $x; ?></a></li>&nbsp;
                    <?php } ?>				
                <li><a  class="btn btn-warning" <?php if($halaman < $total_halaman) { echo 'href="?halaman=$next"'; } ?>> Selanjutnya </a></li>
            </ul>
      </div>
    </section><!-- End DAFTAR SMA -->

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