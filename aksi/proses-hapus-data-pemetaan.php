<?php
session_start();
// menangkap data yang di kirim dari form
include '../koneksi/koneksi.php';

$id_daftar_sma = $_GET['id_daftar_sma'];

if(isset($_SESSION['login_admin']))
    {
        mysqli_query($koneksi,"delete from tb_daftar_sma where id_daftar_sma='$id_daftar_sma' ");
        header("location:../admin/halaman-utama-admin?hapus=berhasil");
    }
else
    {
        header("location:../admin/halaman-utama-admin?hapus=gagal");
    }

?>