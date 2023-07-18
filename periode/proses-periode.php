<?php 

session_start();

if (!isset($_SESSION['username'])) {
    header("location:../auth/login.php");
    exit;
}

require_once "../config.php";


if(isset($_POST['simpan'])) {
    $nama   = htmlspecialchars($_POST['nama']);
    // $tglmulai   = $_POST['tgl_mulai'];
    // $tglselesai = $_POST['tgl_selesai'];

    $cekNama = mysqli_query($koneksi, "SELECT nama FROM tbl_unit WHERE nama = '$nama'");
    
    if (mysqli_num_rows($cekNama) > 0) {
        header('location:unit.php?msg=cancel');
    }else {
        mysqli_query($koneksi, "INSERT INTO tbl_unit(nama) VALUES ('$nama')");
        header('location:unit.php?msg=added');
    }

}
?>