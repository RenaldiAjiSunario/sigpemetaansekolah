<?php 
// mengaktifkan session php
session_start();
 
// menghubungkan dengan koneksi
include 'koneksi.php';
 
// menangkap data yang dikirim dari form
$username = mysqli_real_escape_string($koneksi, $_POST['username']);
$password = mysqli_real_escape_string($koneksi, md5($_POST['password']));
 
// menyeleksi data admin dengan username dan password yang sesuai
$data = mysqli_query($koneksi,"select * from tb_user where username='$username' and password='$password'");

$data2 = mysqli_query($koneksi,"select nama_lengkap from tb_user where username='$username' and password='$password'");

$data3 = mysqli_query($koneksi,"select id_user from tb_user where username='$username' and password='$password'");
 
// menghitung jumlah data yang ditemukan
$cek = mysqli_num_rows($data);
if($cek > 0){
$_SESSION['login_admin'] = $username;

while($row2=mysqli_fetch_array($data2)){
	$rowtipe2 = $row2['nama_lengkap'];
}
$_SESSION['nama_lengkap'] = $rowtipe2;

while($row3=mysqli_fetch_array($data3)){
	$rowtipe3 = $row3['id_user'];
}
$_SESSION['id_user'] = $rowtipe3;

header("location:admin/halaman-utama-admin?login=berhasil");
}else{
header("location:login?login=gagal");
}
?>