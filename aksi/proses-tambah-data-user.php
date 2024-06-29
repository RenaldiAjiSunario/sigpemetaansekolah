<?php
session_start();
// menangkap data yang di kirim dari form
include '../koneksi/koneksi.php';

$id_user = null;
$username = $_POST['username'];
$password = md5($_POST['password']);
$tipe_user = $_POST['tipe_user'];
$nama_lengkap = $_POST['nama_lengkap'];
$foto_user = "user.png";

if(isset($_SESSION['login_admin']))
    {
        mysqli_query($koneksi,"insert into tb_user values(null, '$username', '$password', '$tipe_user', '$nama_lengkap', '$foto_user' )");
        header("location:../admin/data-user?tambah=berhasil");
    }
else
    {
        header("location:../admin/data-user?tambah=gagal");
    }

?>