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
    $sqlKaryawan     = mysqli_query($koneksi, "SELECT * FROM tbl_karyawan where id = $idKaryawan");
    $data            = mysqli_fetch_array($sqlKaryawan);
    $nm_karyawan     = $data['nama'];
    $idUnit          = $data['id_unit'];
    $unit          = $data['unit'];
    mysqli_query($koneksi, "INSERT INTO tbl_pelkry(id_karyawan, nm_karyawan, id_periode, nm_periode, id_unit, unit) VALUES ('$idKaryawan', '$nm_karyawan', '$idPeriode', '$nm_periode', '$idUnit', '$unit')");
        header('location:pel-kry.php?msg=added');

}
if (isset($_POST['update'])) {
    $id             = $_POST['id'];
    $periode        = $_POST['periode'];
    $karyawan       = $_POST['karyawan'];
    $idPeriode      = $_POST['periode'];
    $sqlPeriode     = mysqli_query($koneksi, "SELECT * FROM tbl_periode WHERE id = $idPeriode");
    $data           = mysqli_fetch_array($sqlPeriode);
    $nm_periode     = $data['nama'];

    $idKaryawan      = $_POST['karyawan'];
    $sqlKaryawan     = mysqli_query($koneksi, "SELECT * FROM tbl_karyawan where id = $idKaryawan");
    $data            = mysqli_fetch_array($sqlKaryawan);
    $nm_karyawan     = $data['nama'];
    $idUnit          = $data['id_unit'];
    $unit            = $data['unit'];
    
    mysqli_query($koneksi, "UPDATE tbl_pelkry  SET id_periode = '$idPeriode', nm_periode = '$nm_periode', id_karyawan = '$idKaryawan', nm_karyawan = '$nm_karyawan' WHERE id = '$id'");
    header('location:pel-kry.php?msg=updated');
    return;
}
if(isset($_POST['simpanhistory'])) {
    $idpelatihan   = $_POST['idpelatihan'];
    $idpelkry   = $_POST['idpelkry'];
    $sqlpelatihan     = mysqli_query($koneksi, "SELECT * FROM tbl_pelatihan where id = $idpelatihan");
    $data            = mysqli_fetch_array($sqlpelatihan);
    $nm_pelatihan = $data['nama'];
    $durasi = $data['jumlah_jam'];
    $tgl_mulai = $data['tgl_mulai'];
    $tgl_selesai = $data['tgl_selesai'];

    mysqli_query($koneksi, "INSERT INTO tbl_history (id_pelatihan, nm_pelatihan, id_pelkry, durasi, tgl_mulai, tgl_selesai) VALUES ('$idpelatihan', '$nm_pelatihan', $idpelkry, '$durasi', '$tgl_mulai', '$tgl_selesai')");
        header('location:pel-kry.php?msg=added');
}
?>