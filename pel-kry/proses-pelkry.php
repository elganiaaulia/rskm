<?php 

session_start();

if (!isset($_SESSION['username'])) {
    header("location:../auth/login.php");
    exit;
}

require_once "../config.php";


if(isset($_POST['simpan'])) {
    $id             = $_POST['id'];
    $periode        = $_POST['periode'];
    $karyawan       = $_POST['karyawan'];
    $idPeriode      = $_POST['periode'];
    $sqlPeriode     = mysqli_query($koneksi, "SELECT * FROM tbl_periode WHERE id = $idPeriode");
    $data           = mysqli_fetch_array($sqlPeriode);
    $nm_periode     = $data['nama'];
    $idKaryawan      = $_POST['karyawan'];
    $sqlKaryawan     = mysqli_query($koneksi, "SELECT * FROM tbl_karyawan WHERE id = $idKaryawan");
    $data           = mysqli_fetch_array($sqlKaryawan);
    $nm_karyawan     = $data['nama'];

    mysqli_query($koneksi, "INSERT INTO tbl_pelkry(id_karyawan, nm_karyawan, id_periode, nm_periode) VALUES ('$idKaryawan', '$nm_karyawan', '$idPeriode', '$nm_periode')");
        header('location:pel-kry.php?msg=added');

}
if (isset($_POST['update'])) {
    $idPeriode      = $_POST['periode'];
    $sqlPeriode     = mysqli_query($koneksi, "SELECT * FROM tbl_periode WHERE id = $idPeriode");
    $data           = mysqli_fetch_array($sqlPeriode);
    $nm_periode     = $data['nama'];
    $idKaryawan     = $_POST['karyawan'];
    $sqlKaryawan    = mysqli_query($koneksi, "SELECT * FROM tbl_karyawan WHERE id = $idKaryawan");
    $data           = mysqli_fetch_array($sqlKaryawan);
    $nm_karyawan    = $data['nama'];
    
    mysqli_query($koneksi, "UPDATE tbl_pelkry  SET id_periode = '$idPeriode', nm_periode = '$nm_periode', id_karyawan = '$idKaryawan', nm_karyawan = '$nm_karyawan' WHERE id = '$id'");
    header('location:pel-kry.php?msg=updated');
    return;
}
?>