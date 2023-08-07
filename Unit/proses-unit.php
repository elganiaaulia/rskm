<?php 

session_start();

if (!isset($_SESSION['username'])) {
    header("location:../auth/login.php");
    exit;
}

require_once "../config.php";


if(isset($_POST['simpan'])) {
    $nama   = htmlspecialchars($_POST['nama']);
    $status   = $_POST['statusaktif'];

    $cekNama = mysqli_query($koneksi, "SELECT nama FROM tbl_unit WHERE nama = '$nama'");
    
    if (mysqli_num_rows($cekNama) > 0) {
        header('location:unit.php?msg=cancel');
    }else {
        mysqli_query($koneksi, "INSERT INTO tbl_unit(nama, statusaktif) VALUES ('$nama','$status')");
        header('location:unit.php?msg=added');
    }

}

if (isset($_POST['update'])) {
    $id         = $_POST['id'];
    $nama       = htmlspecialchars($_POST['nama']);
    $status     = $_POST['statusaktif'];
    
    mysqli_query($koneksi, "UPDATE tbl_unit SET nama = '$nama', statusaktif = '$status' WHERE id = '$id'");
    header('location:unit.php?msg=updated');
    return;

}


?>