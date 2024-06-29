<?php
session_start();
// menangkap data yang di kirim dari form
include '../koneksi/koneksi.php';

$id_fasilitas_sma = $_GET['id_fasilitas_sma'];

if(isset($_SESSION['login_admin']))
    {
        mysqli_query($koneksi,"delete from tb_fasilitas_sma where id_fasilitas_sma='$id_fasilitas_sma' ");
        header("location:../admin/halaman-utama-admin?hapus=berhasil");
    }
else
    {
        header("location:../admin/halaman-utama-admin?hapus=gagal");
    }

?>