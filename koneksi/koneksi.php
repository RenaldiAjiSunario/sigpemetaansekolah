<?php
$name_server = "localhost";
$user = "u808279297_db_sigpemetaan";
$password = "Sigpemetaanrenaldi123";
$database = "u808279297_db_sigpemetaan";

$koneksi = mysqli_connect($name_server, $user, $password, $database);
 
    //cek koneksi
    if (mysqli_connect_errno()){
        echo "Koneksi database mysqli gagal!!! : " . mysqli_connect_error();
    }
?>