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
      <h1 class="logo"><a href="welcome">Sistem Informasi Geografis Sekolah SMA/SMK/MA seKotamobagu</a></h1>

      <nav id="navbar" class="navbar">
      <ul>
          <li><a class="nav-link scrollto active" href="welcome">Beranda</a></li>
          <li><a class="nav-link scrollto" href="daftar-sma-kotamobagu">Daftar Sekolah</a></li>
          <li><a class="nav-link scrollto" href="pemetaan">Pemetaan</a></li>
          <li><a class="nav-link scrollto" href="login">Login</a></li>
        </ul>
        <i class="bi bi-list mobile-nav-toggle"></i>
      </nav><!-- .navbar -->

    </div>
  </header><!-- End Header -->

  <!-- ======= Hero Section ======= -->
  <section id="hero" class="d-flex align-items-center">
    <div class="container" data-aos="zoom-out" data-aos-delay="100">
      <h1>Sistem Informasi Geografi <strong>Pemetaan</strong></h1>
      <h1>Sekolah SMA/SMK/MA sekotamobagu</h1>
      <div class="d-flex">
        <a href="pemetaan" class="btn-get-started scrollto">Jelajahi Sekarang</a>
      </div>
    </div>
  </section><!-- End Hero -->

  <main id="main">

    <!-- ======= DAFTAR SMA ======= -->
    <section id="daftar-berita" class="featured-services">
      <div class="container" data-aos="fade-up">
        
        <div class="section-title">
                <h2 align="center">Informasi Pemetaan Terbaru</h2>
        </div>
        
            <div class="row">
                <?php 
                include 'koneksi/koneksi.php';
                $batas = 4;
                $halaman = isset($_GET['halaman'])?(int)$_GET['halaman'] : 1;
                $halaman_awal = ($halaman>1) ? ($halaman * $batas) - $batas : 0;	
    
                $previous = $halaman - 1;
                $next = $halaman + 1;
                
                $data = mysqli_query($koneksi,"select * from tb_daftar_sma order by id_daftar_sma desc");
                $jumlah_data = mysqli_num_rows($data);
                $total_halaman = ceil($jumlah_data / $batas);
                
                $data_2 = mysqli_query($koneksi,"select * from tb_daftar_sma order by id_daftar_sma desc limit $halaman_awal, $batas");
                $nomor = $halaman_awal+1;
                while($d = mysqli_fetch_array($data_2)){ ?>
                <div class="col-md-6 col-lg-3 d-flex align-items-stretch mb-5 mb-lg-0">
                    <div class="icon-box" data-aos="fade-up" data-aos-delay="100">
                    <img src="gambar_profil_sma/<?php echo $d['foto_profil_sma']; ?>" width="100%" height="150px" alt="">
                    <h4 class="title"><a href="detail-daftar-sma?id_daftar_sma=<?php echo $d['id_daftar_sma']; ?>"><?php echo $d['nama_sma']; ?></a></h4>
                    <p class="description">
                      <?php echo substr($d['deskripsi_sma'], 0, 50);
                      echo "....";
                      ?>
                    </p>
                    <a class="btn btn-warning" href="detail-pemetaan?id_daftar_sma=<?php echo $d['id_daftar_sma']; ?>">Lihat Lokasi <i class="bi bi-geo-alt-fill"></i></a>
                    
                    </div>
                </div>
                <?php } ?>

            </div>
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

    <!-- ======= GALERI FOTO ======= -->
    <section id="galeri_foto" class="portfolio">
        <div class="container" data-aos="fade-up">

            <div class="section-title">
                <h2>Galeri Foto</h2>
            </div>
                <div class="row" data-aos="fade-up" data-aos-delay="100">
                    <div class="col-lg-12 d-flex justify-content-center">
                    </div>
                </div>

                <div class="row portfolio-container" data-aos="fade-up" data-aos-delay="200">
                <?php 
                include 'koneksi/koneksi.php';
                $data_galeri_foto = mysqli_query($koneksi,"select * from tb_daftar_sma order by id_daftar_sma desc limit 20");
                while($d_galeri_foto = mysqli_fetch_array($data_galeri_foto)){ ?>
                    <div class="col-lg-3 col-md-6 portfolio-item filter-app">
                        <img src="gambar_profil_sma/<?php echo $d_galeri_foto['foto_profil_sma']; ?>" width="300px" height="300px" class="img-fluid" alt="">
                            <div class="portfolio-info">
                                <p><?php echo $d_galeri_foto['nama_sma']; ?></p>
                            </div>
                    </div>
                <?php } ?>

                </div>
        </div>
    </section><!-- End GALERI FOTO -->

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