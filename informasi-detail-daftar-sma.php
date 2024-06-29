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
                <h2 align="center">Detail Data</h2>
        </div>
        
            <table class="table">
              <?php 
                include 'koneksi/koneksi.php';
                $id_daftar_sma = $_GET['id_daftar_sma'];
                $data_detail = mysqli_query($koneksi,"select * from tb_daftar_sma where id_daftar_sma='$id_daftar_sma' limit 1");
                while($d = mysqli_fetch_array($data_detail)){ ?>
              <tr>
                  <td>Nama Sekolah</td><td><?php echo $d['nama_sma']; ?></td>
              </tr>
              <tr>
                  <td>Kepala Sekolah</td><td><?php echo $d['nama_kepsek']; ?></td>
              </tr>
              <tr>
                  <td>Alamat</td><td><?php echo $d['alamat_sma']; ?></td>
              </tr>
              <tr>
                  <td>Gambar</td><td><img src="gambar_profil_sma/<?php echo $d['foto_profil_sma']; ?>" width="200px" height="200px" alt="gambar_profil"></td>
              </tr>
              <tr>
                  <td>Lokasi</td><td><a href="<?php echo $d['link_google_maps']; ?>" target="_blank" class="btn btn-warning">Lihat Di Google</a></td>
              </tr>
              <tr>
                  <td>Profil</td><td><?php echo $d['deskripsi_sma']; ?></td>
              </tr>
              <tr>
                  <td>Jumlah Siswa</td><td><?php echo $d['jumlah_siswa']; ?></td>
              </tr>
              <tr>
                  <td>Jumlah Guru</td><td><?php echo $d['jumlah_guru']; ?></td>
              </tr>
              <tr>
                  <td>Jurusan yang tersedia</td><td><?php echo $d['jurusan']; ?></td>
              </tr>
              <tr>
                  <td>Ektrakurikuler yang tersedia</td><td><?php echo $d['eskul']; ?></td>
              </tr>
              <tr>
                  <td>Prestasi</td><td><?php echo $d['prestasi']; ?></td>
              </tr>
              <tr>
                  <td>Nomor Kontak</td><td><?php echo $d['nomor_kontak']; ?></td>
              </tr>
              <tr>
                  <td>Link Sekolah</td><td><a href="<?php echo $d['link_sekolah']; ?>" target="_blank" class="btn btn-warning">Lihat Web Sekolah</a></td>
              </tr>
              <?php } ?>
            </table>

            <br>

            <table class="table">
              <tr>
                <td align="center"><b>Daftar Fasilitas</b></td>
              </tr>
              <?php 
                include 'koneksi/koneksi.php';
                $id_daftar_sma = $_GET['id_daftar_sma'];
                $data_fasilitas = mysqli_query($koneksi,"select * from tb_fasilitas_sma where id_daftar_sma='$id_daftar_sma' ");
                while($d_fasilitas = mysqli_fetch_array($data_fasilitas)){ ?>
              <tr>
                  <td align="center"><?php echo $d_fasilitas['nama_fasilitas']; ?></td>
              </tr>
              <tr>
                  <td align="center"><img src="gambar_fasilitas_sma/<?php echo $d_fasilitas['gambar_fasilitas']; ?>" width="400px" height="400px" alt="gambar_profil"></td>
              </tr>
              <?php } ?>
            </table>
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