<?php 

session_start();

if (!isset($_SESSION['username'])) {
    header("location:../auth/login.php");
    exit;
}

require_once "../config.php";

if(isset($_POST['simpan'])) {
    $nik    = htmlspecialchars($_POST['nik']);
    $nama   = htmlspecialchars($_POST['nama']);
    $unit   = $_POST['unit'];

    $cekNik = mysqli_query($koneksi, "SELECT nik FROM tbl_karyawan WHERE nik = '$nik'");
    if (mysqli_num_rows($cekNik) > 0) {
        header('location:karyawan.php?msg=cancel');
        return;
    }

    mysqli_query($koneksi, "INSERT INTO tbl_karyawan (nik, nama, unit) VALUES ('$nik','$nama','$unit')");

    header('location:karyawan.php?msg=added');
    return;
}

if (isset($_POST['update'])) {
    $id     = $_POST['id'];
    $nik    = htmlspecialchars($_POST['nik']);
    $nama   = htmlspecialchars($_POST['nama']);
    $unit   = $_POST['unit'];
    $jam    = $_POST['jam'];

    $sqlKaryawan = mysqli_query($koneksi, "SELECT * FROM tbl_karyawan WHERE id = $id");
    $data = mysqli_fetch_array($sqlKaryawan);
    $curNIK = $data['nik'];

    $newNIK = mysqli_query($koneksi, "SELECT nik FROM tbl_karyawan WHERE nik = $nik");

    if ($nik !== $curNIK) {
        if (mysqli_num_rows($newNIK) > 0) {
            header('location:karyawan.php?msg=cancel');
            return;
        }
        mysqli_query($koneksi, "UPDATE tbl_karyawan SET
                            nik = '$nik',
                            nama = '$nama',
                            unit = '$unit'
                            WHERE id = $id
                        ");

    header("location:karyawan.php?msg=updated");
    return;

    }

    
}

?>