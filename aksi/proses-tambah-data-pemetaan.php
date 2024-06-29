<?php
session_start();
// menangkap data yang di kirim dari form
include '../koneksi/koneksi.php';

$id_daftar_sma = null;
$nama_sma = $_POST['nama_sma'];
$alamat_sma = $_POST['alamat_sma'];
$link_google_maps = $_POST['link_google_maps'];
$lattitude = $_POST['lattitude'];
$longitude = $_POST['longitude'];
$deskripsi_sma = $_POST['deskripsi_sma'];
$jumlah_siswa = $_POST['jumlah_siswa'];
$jumlah_guru = $_POST['jumlah_guru'];
$nama_kepsek = $_POST['nama_kepsek'];
$jurusan = $_POST['jurusan'];
$prestasi = $_POST['prestasi'];
$link_sekolah = $_POST['link_sekolah'];
$nomor_kontak = $_POST['nomor_kontak'];
$eskul = $_POST['eskul'];

$folder = '../gambar_profil_sma/';
$name_f = $_FILES['foto_profil_sma']['name'];
$file_extension = pathinfo($name_f, PATHINFO_EXTENSION);
$new_file_name = date('dmYHis') . '.' . $file_extension;
$foto_profil_sma = $new_file_name;
$sumber_f = $_FILES['foto_profil_sma']['tmp_name'];
move_uploaded_file($sumber_f, $folder.$foto_profil_sma);

$folder2 = '../foto_profil_sekolah/';
$name_f2 = $_FILES['foto_profil_sekolah']['name'];
$file_extension2 = pathinfo($name_f2, PATHINFO_EXTENSION);
$new_file_name2 = date('dmYHis') . '.' . $file_extension2;
$foto_profil_sekolah = $new_file_name2;
$sumber_f2 = $_FILES['foto_profil_sekolah']['tmp_name'];
move_uploaded_file($sumber_f2, $folder2.$foto_profil_sekolah);

if(isset($_SESSION['login_admin']))
    {
        mysqli_query($koneksi,"insert into tb_daftar_sma values(null, '$nama_sma', '$alamat_sma', '$link_google_maps', '$lattitude', '$longitude', '$foto_profil_sma', '$deskripsi_sma', '$jumlah_siswa', '$jumlah_guru', '$foto_profil_sekolah',
         '$nama_kepsek', '$jurusan', '$prestasi', '$link_sekolah', '$nomor_kontak', '$eskul',)");
        header("location:../admin/halaman-utama-admin?tambah=berhasil");
    }
else
    {
        header("location:../admin/halaman-utama-admin?tambah=gagal");
    }

?>