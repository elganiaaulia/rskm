<?php 

//koneksi
$koneksi = mysqli_connect("localhost", "root", "", "db_rskm") ;

//cek koneksi
// if (mysqli_connect_errno()) {
//     echo "gagal koneksi ke database";
// } else {
//     echo "berhasil masuk database" ;
// }


//url induk
$main_url = "http://localhost/rskm/";
$title = "Dashboard - RSKM" ;
?>