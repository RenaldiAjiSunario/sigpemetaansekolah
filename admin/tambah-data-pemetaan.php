<?php
session_start();
if(isset($_SESSION['login_admin']))
{ ?>
<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">

      <!-- Favicons -->
  <link href="img/logo.jpg" rel="icon">
  <link href="img/logo.jpg" rel="apple-touch-icon">

    <title>Halaman admin SIG Pemetaan SMA Kotamobagu</title>

    <!-- Custom fonts for this template -->
    <link href="vendor/fontawesome-free/css/all.min.css" rel="stylesheet" type="text/css">
    <link
        href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i"
        rel="stylesheet">

    <!-- Custom styles for this template -->
    <link href="css/sb-admin-2.min.css" rel="stylesheet">
    
    <script src="https://kit.fontawesome.com/0def35247c.js" crossorigin="anonymous"></script>

    <!-- Custom styles for this page -->
    <link href="vendor/datatables/dataTables.bootstrap4.min.css" rel="stylesheet">
    <script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyDxJ4kY-RO_57Cbq0-l3P2jXd1W0MfSJbc&callback=initMap"></script>
    <script>
    // variabel global marker
    var marker;
    function taruhMarker(peta, posisiTitik){
        if( marker ){
        // pindahkan marker
        marker.setPosition(posisiTitik);
        } else {
        // buat marker baru
        marker = new google.maps.Marker({
            position: posisiTitik,
            map: peta
        });
        }
        // isi nilai koordinat ke form
        document.getElementById("lattitude").value = posisiTitik.lat();
        document.getElementById("longitude").value = posisiTitik.lng();
    }
    function initialize() {
    var propertiPeta = {
        center:new google.maps.LatLng(0.7467266066258432,124.31886901133892),
        zoom:15,
        mapTypeId:google.maps.MapTypeId.ROADMAP
    };
    var peta = new google.maps.Map(document.getElementById("googleMap"), propertiPeta);
    // even listner ketika peta diklik
    google.maps.event.addListener(peta, 'click', function(event) {
        taruhMarker(this, event.latLng);
    });
    }
    // event jendela di-load  
    google.maps.event.addDomListener(window, 'load', initialize);
    </script>
</head>

<body id="page-top">

    <!-- Page Wrapper -->
    <div id="wrapper">

        <!-- SIDEBAR -->
        <ul class="navbar-nav bg-gradient-warning sidebar sidebar-dark accordion" id="accordionSidebar">

            <!-- Sidebar - Brand -->
            <a class="sidebar-brand d-flex align-items-center justify-content-center" href="halaman-utama-admin">
                <div class="sidebar-brand-icon">
                <i class="fa fa-home" aria-hidden="true"></i>
                </div>
                <div class="sidebar-brand-text mx-3">SIG Pemetaan</div>
            </a>

            <!-- Divider -->
            <hr class="sidebar-divider my-0">

            <!-- Nav Item - Dashboard -->
            <li class="nav-item active">
                <a class="nav-link" href="halaman-utama-admin">
                    <i class="fas fa-fw fa-tachometer-alt"></i>
                    <span>Dashboard</span></a>
            </li>

            <!-- Divider -->
            <hr class="sidebar-divider">

            <!-- Heading -->
            <div class="sidebar-heading">
                Daftar Menu
            </div>

            <!-- DAFTAR MENU -->
            <li class="nav-item">
                <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapsePages1"
                    aria-expanded="true" aria-controls="collapsePages">
                    <i class="fa fa-list-alt" aria-hidden="true"></i>
                    <span>Kelola Data</span>
                </a>
                <div id="collapsePages1" class="collapse" aria-labelledby="headingPages" data-parent="#accordionSidebar">
                    <div class="bg-white py-2 collapse-inner rounded">
                        <h6 class="collapse-header">Daftar Submenu :</h6>
                        <a class="collapse-item" href="halaman-utama-admin">Data Pemetaan</a>
                        <a class="collapse-item" href="data-user">Data User</a>
                    </div>
                </div>
            </li>

            <!-- Divider -->
            <hr class="sidebar-divider d-none d-md-block">

            <!-- Sidebar Toggler (Sidebar) -->
            <div class="text-center d-none d-md-inline">
                <button class="rounded-circle border-0" id="sidebarToggle"></button>
            </div>


        </ul>
        <!-- End SIDEBAR -->

        <!-- KONTEN -->
        <div id="content-wrapper" class="d-flex flex-column">

            <!-- Main Content -->
            <div id="content">

                <!-- Topbar -->
                <nav class="navbar navbar-expand navbar-light bg-white topbar mb-4 static-top shadow">

                    <!-- Sidebar Toggle (Topbar) -->
                    <button id="sidebarToggleTop" class="btn btn-link d-md-none rounded-circle mr-3">
                        <i class="fa fa-bars"></i>
                    </button>

                    <!-- Topbar Search -->
                    <form class="d-none d-sm-inline-block form-inline mr-auto ml-md-3 my-2 my-md-0 mw-100 navbar-search">
                        <div class="input-group">
                            <input type="text" class="form-control bg-light border-0 small" placeholder="Search for..."
                                aria-label="Search" aria-describedby="basic-addon2">
                            <div class="input-group-append">
                                <button class="btn btn-warning" type="button">
                                    <i class="fas fa-search fa-sm"></i>
                                </button>
                            </div>
                        </div>
                    </form>

                    <!-- Topbar Navbar -->
                    <ul class="navbar-nav ml-auto">

                        <!-- Nav Item - Search Dropdown (Visible Only XS) -->
                        <li class="nav-item dropdown no-arrow d-sm-none">
                            <a class="nav-link dropdown-toggle" href="#" id="searchDropdown" role="button"
                                data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                <i class="fas fa-search fa-fw"></i>
                            </a>
                            <!-- Dropdown - Messages -->
                            <div class="dropdown-menu dropdown-menu-right p-3 shadow animated--grow-in"
                                aria-labelledby="searchDropdown">
                                <form class="form-inline mr-auto w-100 navbar-search">
                                    <div class="input-group">
                                        <input type="text" class="form-control bg-light border-0 small"
                                            placeholder="Search for..." aria-label="Search"
                                            aria-describedby="basic-addon2">
                                        <div class="input-group-append">
                                            <button class="btn btn-warning" type="button">
                                                <i class="fas fa-search fa-sm"></i>
                                            </button>
                                        </div>
                                    </div>
                                </form>
                            </div>
                        </li>

                        <div class="topbar-divider d-none d-sm-block"></div>

                        <!-- Nav Item - User Information -->
                        <li class="nav-item dropdown no-arrow">
                            <a class="nav-link dropdown-toggle" href="#" id="userDropdown" role="button"
                                data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                <span class="mr-2 d-none d-lg-inline text-gray-600 small"> <?php echo $_SESSION["nama_lengkap"]; ?> </span>
                                <img class="img-profile rounded-circle"
                                    src="foto_profil/user.png">
                            </a>
                            <!-- Dropdown - User Information -->
                            <div class="dropdown-menu dropdown-menu-right shadow animated--grow-in"
                                aria-labelledby="userDropdown">
                                <a class="dropdown-item" href="profil-admin">
                                    <i class="fas fa-user fa-sm fa-fw mr-2 text-gray-400"></i>
                                    Profil Admin
                                </a>
                                <a class="dropdown-item" href="admin-keluar">
                                    <i class="fas fa-sign-out-alt fa-sm fa-fw mr-2 text-gray-400"></i>
                                    Logout
                                </a>
                            </div>
                        </li>

                    </ul>

                </nav>
                <!-- End of Topbar -->

                <!-- Begin Page Content -->
                <div class="container-fluid">

                    <!-- Page Heading -->
                    <div class="d-sm-flex align-items-center justify-content-between mb-4">
                        <h1 class="h3 mb-0 text-gray-800">Dashboard</h1>
                    </div>
                    <?php
                    error_reporting(0);
                    $login=$_GET['login'];
                    if($login == 'berhasil')
                        {
                        echo "<div class='alert alert-success' role='alert'>";
                        echo "<h4 align='center'> Anda Berhasil Login ke Sistem Sebagai Admin </h4>";
                        echo "</div>";
                        }
                    ?>

                    <!-- Content Row -->

                        <form action="proses-tambah-pemetaan" method="post" enctype="multipart/form-data">
                        <table class="table">
                            <tr>
                                <td>Nama SMA</td><td><input type="text" id="nama_sma" name="nama_sma" class="form-control" placeholder="masukan nama SMA" required></td>
                            </tr>
                            <tr>
                                <td>Alamat</td><td><input type="text" id="alamat_sma" name="alamat_sma" class="form-control" placeholder="masukan alamat SMA" required></td>
                            </tr>
                            <tr>
                                <td>Link Google Maps</td><td><input type="text" id="link_google_maps" name="link_google_maps" class="form-control" placeholder="masukan link google maps" required></td>
                            </tr>
                            <tr>
                                <td>Deskripsi SMA</td><td><input type="text" id="deskripsi_sma" name="deskripsi_sma" class="form-control" placeholder="masukan Deskripsi SMA" required></td>
                            </tr>
                            <tr>
                                <td>Jumlah Siswa</td><td><input type="text" id="jumlah_siswa" name="jumlah_siswa" class="form-control" placeholder="masukan Jumlah Siswa" required></td>
                            </tr>
                            <tr>
                                <td>Jumlah Guru</td><td><input type="text" id="jumlah_guru" name="jumlah_guru" class="form-control" placeholder="masukan Jumlah Guru" required></td>
                            </tr>
                            <tr>
                                <td>Nama Kepala Sekolah</td><td><input type="text" id="nama_kepsek" name="nama_kepsek" class="form-control" placeholder="masukan Nama Kepala Sekolah" required></td>
                            </tr>
                            <tr>
                                <td>Jurusan</td><td><input type="text" id="jurusan" name="jurusan" class="form-control" placeholder="masukan Jurusan yang ada" required></td>
                            </tr>
                            <tr>
                                <td>Ekstrakurikuler</td><td><input type="text" id="eskul" name="eskul" class="form-control" placeholder="masukan Ekstrakurikuler yang ada" required></td>
                            </tr>
                            <tr>
                                <td>Prestasi</td><td><input type="text" id="prestasi" name="prestasi" class="form-control" placeholder="masukan Prestasi yang ada" required></td>
                            </tr>
                            <tr>
                                <td>Link Web Sekolah</td><td><input type="text" id="link_sekolah" name="link_sekolah" class="form-control" placeholder="masukan link web sekolah" required></td>
                            </tr>
                            <tr>
                                <td>Nomor Kontak</td><td><input type="text" id="nomor_kontak" name="nomor_kontak" class="form-control" placeholder="masukan nomor kontak" required></td>
                            </tr>
                            <tr>
                                <td>Upload Logo</td><td><input type="file" name="foto_profil_sma" required></td>
                            </tr>
                            <tr>
                                <td>Upload Foto Sekolah</td><td><input type="file" name="foto_profil_sekolah" required></td>
                            </tr>
                            <tr>
                                <td>Lattitude <input type="hidden" value="" id="lattitude" name="lattitude" placeholder="lattitude" class="form-control" required> </td>
                                <td>Longitude <input type="hidden" value="" id="longitude" name="longitude" placeholder="longitude" class="form-control" required> </td>
                            </tr>
                            <tr>
                                <td colspan="2"> Klik Pada Map Untuk Menentukan Lokasi</td>
                            </tr>
                            <tr>
                                <td colspan="2" align="center"><div id="googleMap" style="width:80%; height:400px;"></div></td>
                            </tr>
                            <tr>
                                <td colspan="2"><input type="submit" class="btn btn-warning" value="Simpan"></td>
                            </tr>
                        </table>
                        </form>

                </div>
                <!-- /.container-fluid -->

            </div>
            <!-- End of Main Content -->

            <!-- Footer -->
            <footer class="sticky-footer bg-white">
                <div class="container my-auto">
                    <div class="copyright text-center my-auto">
                        <span>Copyright &copy; SIG Pemetaan SMA Kotamobagu <?php echo date("Y") ?>  </span>
                    </div>
                </div>
            </footer>
            <!-- End of Footer -->

        </div>
        <!-- End KONTEN -->

    </div>
    <!-- End of Page Wrapper -->

    <!-- Scroll to Top Button-->
    <a class="scroll-to-top rounded" href="#page-top">
        <i class="fas fa-angle-up"></i>
    </a>

    <!-- Bootstrap core JavaScript-->
    <script src="vendor/jquery/jquery.min.js"></script>
    <script src="vendor/bootstrap/js/bootstrap.bundle.min.js"></script>

    <!-- Core plugin JavaScript-->
    <script src="vendor/jquery-easing/jquery.easing.min.js"></script>

    <!-- Custom scripts for all pages-->
    <script src="js/sb-admin-2.min.js"></script>

    <!-- Page level plugins -->
    <script src="vendor/datatables/jquery.dataTables.min.js"></script>
    <script src="vendor/datatables/dataTables.bootstrap4.min.js"></script>

    <!-- Page level custom scripts -->
    <script src="js/demo/datatables-demo.js"></script>

</body>

</html>
<?php } else { header("location:../welcome");} ?>