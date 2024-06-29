<?php
session_start();
// menangkap data yang di kirim dari form
include '../koneksi/koneksi.php';

$id_daftar_sma = $_POST['id_daftar_sma'];
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

if(isset($_SESSION['login_admin']))
    {
        mysqli_query($koneksi,"update tb_daftar_sma set nama_sma='$nama_sma', alamat_sma='$alamat_sma', link_google_maps='$link_google_maps', lattitue='$lattitude', longitude='$longitude', deskripsi_sma='$deskripsi_sma', jumlah_siswa='$jumlah_siswa', jumlah_guru='$jumlah_guru',
        nama_kepsek='$nama_kepsek', jurusan='$jurusan', prestasi='$prestasi', link_sekolah='$link_sekolah', nomor_kontak='$nomor_kontak', eskul='$eskul' where id_daftar_sma='$id_daftar_sma' ");
        header("location:../admin/halaman-utama-admin?ubah=berhasil");
    }
else
    {
        header("location:../admin/halaman-utama-admin?ubah=gagal");
    }

?>