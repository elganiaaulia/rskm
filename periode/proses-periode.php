<?php 

session_start();

if (!isset($_SESSION['username'])) {
    header("location:../auth/login.php");
    exit;
}

require_once "../config.php";


if(isset($_POST['simpan'])) {
    $nama   = htmlspecialchars($_POST['nama']);
    $tglmulai   = $_POST['tgl_mulai'];
    $tglselesai = $_POST['tgl_selesai'];

    mysqli_query($koneksi, "INSERT INTO tbl_periode(nama) VALUES ('$nama')");
        header('location:periode.php?msg=added');

}
?>