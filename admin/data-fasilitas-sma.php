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

    <title>Halaman admin SIG Pemetaan Sekolah Kotamobagu</title>

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
                    <form class="d-none d-sm-inline-block form-inline mr-auto ml-md-3 my-2 my-md-0 mw-100 navbar-search" action="cari-nama-sma" method="post">
                        <input type="text" name="nama_sma" id="nama_sma" class="form-control"> <input type="submit" class="btn btn-warning" value="cari nama">
                    </form>

                    <!-- Topbar Navbar -->
                    <ul class="navbar-nav ml-auto">

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
                    <div class="row">

                        <!-- Earnings (Monthly) Card Example -->
                        <div class="col-xl-3 col-md-6 mb-4">
                            <div class="card border-left-warning shadow h-100 py-2">
                                <div class="card-body">
                                    <div class="row no-gutters align-items-center">
                                        <div class="col mr-2">
                                            <div class="text-xs font-weight-bold text-warning text-uppercase mb-1">
                                                Jumlah Sekolah Terdata</div>
                                            <div class="h5 mb-0 font-weight-bold text-gray-800">
                                            <?php include '../koneksi/koneksi.php';
                                            $jumlah_sekolah = mysqli_query($koneksi,"select * from tb_daftar_sma");
                                            $d_jumlah_sekolah = mysqli_num_rows($jumlah_sekolah); ?>
                                            <?php echo $d_jumlah_sekolah; ?>
                                            </div>
                                        </div>
                                        <div class="col-auto">
                                            <i class="fa fa-star fa-2x text-gray-300"></i>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <!-- Earnings (Monthly) Card Example -->
                        <div class="col-xl-3 col-md-6 mb-4">
                            <div class="card border-left-warning shadow h-100 py-2">
                                <div class="card-body">
                                    <div class="row no-gutters align-items-center">
                                        <div class="col mr-2">
                                            <div class="text-xs font-weight-bold text-warning text-uppercase mb-1">
                                                Jumlah User Terdaftar</div>
                                            <div class="h5 mb-0 font-weight-bold text-gray-800">
                                            <?php include '../koneksi/koneksi.php';
                                            $jumlah_user = mysqli_query($koneksi,"select * from tb_user");
                                            $d_jumlah_user = mysqli_num_rows($jumlah_user); ?>
                                            <?php echo $d_jumlah_user; ?></div>
                                        </div>
                                        <div class="col-auto">
                                        <i class="fa fa-users fa-2x text-gray-300"></i>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>

                    </div>

                    <!-- Content Row -->
                    <?php
                    error_reporting(0);
                    $tambah=$_GET['tambah'];
                    $ubah=$_GET['ubah'];
                    $hapus=$_GET['hapus'];
                    if($tambah == 'berhasil')
                        {
                        echo "<div class='alert alert-success' role='alert'>";
                        echo "<h4 align='center'> Data Berhasil Ditambah </h4>";
                        echo "</div>";
                        }
                    elseif($tambah == 'gagal')
                        {
                        echo "<div class='alert alert-danger' role='alert'>";
                        echo "<h4 align='center'> Data Gagal Ditambah </h4>";
                        echo "</div>";
                        }
                    elseif($ubah == 'berhasil')
                        {
                        echo "<div class='alert alert-success' role='alert'>";
                        echo "<h4 align='center'> Data Berhasil Diubah </h4>";
                        echo "</div>";
                        }
                    elseif($ubah == 'gagal')
                        {
                        echo "<div class='alert alert-danger' role='alert'>";
                        echo "<h4 align='center'> Data Gagal Diubah </h4>";
                        echo "</div>";
                        }
                    elseif($hapus == 'berhasil')
                        {
                        echo "<div class='alert alert-warning' role='alert'>";
                        echo "<h4 align='center'> Data Terhapus </h4>";
                        echo "</div>";
                        }
                    ?>
                    <table class="table">
                    <tr>
                        <th>No.</th><th>Nama</th><th>Gambar</th><th colspan="2">Aksi</th>
                    </tr>
                    <?php 
                        include 'koneksi/koneksi.php';
                        $id_daftar_sma = $_GET['id_daftar_sma'];
                        $batas = 30;
                        $halaman = isset($_GET['halaman'])?(int)$_GET['halaman'] : 1;
                        $halaman_awal = ($halaman>1) ? ($halaman * $batas) - $batas : 0;	
            
                        $previous = $halaman - 1;
                        $next = $halaman + 1;
                        
                        $data = mysqli_query($koneksi,"select * from tb_fasilitas_sma where id_daftar_sma = '$id_daftar_sma'");
                        $jumlah_data = mysqli_num_rows($data);
                        $total_halaman = ceil($jumlah_data / $batas);
                        
                        $data_2 = mysqli_query($koneksi,"select * from tb_fasilitas_sma where id_daftar_sma = '$id_daftar_sma' order by id_fasilitas_sma desc limit $halaman_awal, $batas");
                        $nomor = $halaman_awal+1;
                        $no = 1;
                        while($d = mysqli_fetch_array($data_2)){ ?>
                    <tr>
                        <td><?php echo $no ++ ?></td>
                        <td><?php echo $d['nama_fasilitas']; ?></td>
                        <td><img src="../gambar_fasilitas_sma/<?php echo $d['gambar_fasilitas']; ?>" width="100px" height="120px" alt=""></td>
                        <td><a href="tambah-fasilitas?id_daftar_sma=<?php echo $d['id_daftar_sma']; ?>" class="btn btn-warning">Tambah Fasilitas</a></td>
                        <td><a href="hapus-data-fasilitas?id_fasilitas_sma=<?php echo $d['id_fasilitas_sma']; ?>" class="btn btn-danger" onclick="return confirm('Hapus Data ?');">Hapus</a></td>
                    </tr>
                    <?php } ?>
                    <tr>
                        <td colspan="5"><a href="tambah-fasilitas?id_daftar_sma=<?php echo $id_daftar_sma; ?>" class="btn btn-warning">Tambah Fasilitas</a></td>
                    </tr>
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