<?php
session_start();
// menangkap data yang di kirim dari form
include '../koneksi/koneksi.php';

$id_user = $_POST['id_user'];
$username = $_POST['username'];
$password = md5($_POST['password']);
$tipe_user = $_POST['tipe_user'];
$nama_lengkap = $_POST['nama_lengkap'];
$foto_user = "user.png";

if(isset($_SESSION['login_admin']))
    {
        mysqli_query($koneksi,"update tb_user set username='$username', password='$password', tipe_user='$tipe_user', nama_lengkap='$nama_lengkap', foto_user='$foto_user' where id_user='$id_user' ");
        header("location:../admin/data-user?ubah=berhasil");
    }
else
    {
        header("location:../admin/data-user?ubah=gagal");
    }

?>