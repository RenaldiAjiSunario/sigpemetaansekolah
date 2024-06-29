<?php
session_start();
// menangkap data yang di kirim dari form
include '../koneksi/koneksi.php';

$id_daftar_sma = $_POST['id_daftar_sma'];
$id_fasilitas_sma = null;
$nama_fasilitas = $_POST['nama_fasilitas'];

$folder = '../gambar_fasilitas_sma/';
$name_f = $_FILES['gambar_fasilitas']['name'];
$file_extension = pathinfo($name_f, PATHINFO_EXTENSION);
$new_file_name = date('dmYHis') . '.' . $file_extension;
$gambar_fasilitas = $new_file_name;
$sumber_f = $_FILES['gambar_fasilitas']['tmp_name'];
move_uploaded_file($sumber_f, $folder.$gambar_fasilitas);


if(isset($_SESSION['login_admin']))
    {
        mysqli_query($koneksi,"insert into tb_fasilitas_sma values(null, '$nama_fasilitas', '$gambar_fasilitas', '$id_daftar_sma' )");
        header("location:../admin/data-fasilitas?id_daftar_sma=$id_daftar_sma");
    }
else
    {
        header("location:../admin/data-fasilitas?tambah=gagal");
    }

?>