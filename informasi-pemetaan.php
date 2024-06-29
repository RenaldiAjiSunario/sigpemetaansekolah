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
<style>
    #map {
    height: 600px;
    width: 100%;
    }
</style>

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
          <li><a class="nav-link scrollto active" href="pemetaan">Pemetaan</a></li>
          <li><a class="nav-link scrollto" href="login">Login</a></li>
        </ul>
        <i class="bi bi-list mobile-nav-toggle"></i>
      </nav><!-- .navbar -->

    </div>
  </header><!-- End Header -->

  <main id="main">

    <!-- ======= PEMETAAN ======= -->
    <section id="daftar-berita" class="featured-services">
    <div class="container" data-aos="fade-up">
    <div id="map"></div>
    <script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyDxJ4kY-RO_57Cbq0-l3P2jXd1W0MfSJbc&callback=GMPStart" async defer></script>
    <script type="text/javascript">   
        
        let map;
        let infoWindow;
        let mapOptions;
        let bounds;
    
        function GMPStart(){
            // infoWindow ini digunakan untuk menampilkan pop-up diatas marker terkait lokasi markernya
            infoWindow = new google.maps.InfoWindow;
            //  Variabel berisi properti tipe peta yang bisa diubah-ubah
            mapOptions = {
            mapTypeId: google.maps.MapTypeId.ROADMAP,
            minZoom: 13.5,
            styles: [
                {
                    featureType: "poi",
                    elementType: "labels",
                    stylers: [{ visibility: "off" }]
                },
                {
                    featureType: "transit",
                    elementType: "labels",
                    stylers: [{ visibility: "off" }]
                }
            ]
            }; 
            // Deklarasi untuk melakukan load map Google Maps API
            map = new google.maps.Map(document.getElementById('map'), mapOptions);      
            // Variabel untuk menyimpan batas kordinat
            bounds = new google.maps.LatLngBounds();
            // Pengambilan data dari database MySQL
            <?php
                // Sesuaikan dengan database yang sudah Anda buat diawal
                include "koneksi/koneksi.php";
                $data_pemetaan = mysqli_query($koneksi,"select * from tb_daftar_sma");
                while ($d_pemetaan = mysqli_fetch_array($data_pemetaan)) {
                    $nama = $d_pemetaan["nama_sma"];
                    $lat  = $d_pemetaan["lattitue"];
                    $long = $d_pemetaan["longitude"];
                    $id = $d_pemetaan["id_daftar_sma"];
                    $foto = $d_pemetaan["foto_profil_sekolah"];
                    $icon = "<img src=foto_profil_sekolah/$foto width=100% height=200px>";
                    $link = "<a href=detail-daftar-sma?id_daftar_sma=$id> $nama </a>";
                    $alamat = $d_pemetaan["alamat_sma"];
                    $jalan = "<p> $alamat </p>";
                    $br = "<br>";
                    echo "addMarker($lat, $long, '$icon.$br.$link.$jalan') \n";
                }
            ?>
            // Proses membuat marker 
            var location;
            var marker;
            function addMarker(lat, lng, info){
                location = new google.maps.LatLng(lat, lng);
                bounds.extend(location);
                marker = new google.maps.Marker({
                    map: map,
                    position: location,
                    animation: google.maps.Animation.BOUNCE
                });       
                map.fitBounds(bounds);
                bindInfoWindow(marker, map, infoWindow, info);
            }
            // Proses ini dapat menampilkan informasi lokasi Kota/Kab ketika diklik dari masing-masing markernya
            function bindInfoWindow(marker, map, infoWindow, html){
                google.maps.event.addListener(marker, 'click', function() {
                infoWindow.setContent(html);
                infoWindow.open(map, marker);
            });
            }
        }
    </script>
    </div>
    </section><!-- End PEMETAAN -->

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