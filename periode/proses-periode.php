<?php 

session_start();

if (!isset($_SESSION['username'])) {
    header("location:../auth/login.php");
    exit;
}

require_once "../config.php";


if(isset($_POST['simpan'])) {
    $nama       = htmlspecialchars($_POST['nama']);
    $tglmulai   = $_POST['tgl_mulai'];
    $tglselesai = $_POST['tgl_selesai'];

    mysqli_query($koneksi, "INSERT INTO tbl_periode(nama, tgl_mulai, tgl_selesai) VALUES ('$nama', '$tglmulai', '$tglselesai')");
        header('location:periode.php?msg=added');

}
if (isset($_POST['update'])) {
    $id         = $_POST['id'];
    $nama       = htmlspecialchars($_POST['nama']);
    $tglmulai     = $_POST['tgl_mulai'];
    $tglselesai = $_POST['tgl_selesai'];
    
    mysqli_query($koneksi, "UPDATE tbl_periode  SET nama = '$nama', tgl_mulai = '$tglmulai', tgl_selesai = '$tglselesai' WHERE id = '$id'");
    header('location:periode.php?msg=updated');
    return;

}
?>