<?php
session_start();
// menangkap data yang di kirim dari form
include '../koneksi/koneksi.php';

$id_user = $_GET['id_user'];

if(isset($_SESSION['login_admin']))
    {
        mysqli_query($koneksi,"delete from tb_user where id_user='$id_user' ");
        header("location:../admin/data-user?hapus=berhasil");
    }
else
    {
        header("location:../admin/data-user?hapus=gagal");
    }

?>