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
    $idUnit     = $_POST['unit'];
    $sqlUnit    = mysqli_query($koneksi, "SELECT * FROM tbl_unit WHERE id = $idUnit");
    $data       = mysqli_fetch_array($sqlUnit);
    $namaUnit   = $data['nama'];

    $cekNik = mysqli_query($koneksi, "SELECT nik FROM tbl_karyawan WHERE nik = '$nik'");
    if (mysqli_num_rows($cekNik) > 0) {
        header('location:karyawan.php?msg=cancel2');
        return;
    }

    mysqli_query($koneksi, "INSERT INTO tbl_karyawan (nik, nama, id_unit, unit) VALUES ('$nik','$nama','$idUnit', '$namaUnit')");

    header('location:karyawan.php?msg=added');
    return;
}

if (isset($_POST['update'])) {
    $id         = $_POST['id'];
    $nik        = htmlspecialchars($_POST['nik']);
    $nama       = htmlspecialchars($_POST['nama']);
    $idUnit     = $_POST['unit'];
    $sqlUnit    = mysqli_query($koneksi, "SELECT * FROM tbl_unit WHERE id = $idUnit");
    $data       = mysqli_fetch_array($sqlUnit);
    $namaUnit   = $data['nama'];
    $jam        = $_POST['jam'];
    
    
    // echo("<script type='text/javascript'> console.log($id);</script>");
    
    $sqlKaryawan = mysqli_query($koneksi, "SELECT * FROM tbl_karyawan WHERE id = $id");
    $data = mysqli_fetch_array($sqlKaryawan);
    $curNIK     = $data['nik'];
    $curNama    = $data['nama'];
    $curUnit    = $data['unit'];
    $curJam     = $data['jumlahjam'];
    
    $nikcondition = 0 ;
    if ($nik !== $curNIK) {
        $newNIK = mysqli_query($koneksi, "SELECT nik FROM tbl_karyawan WHERE nik = $nik");
        $nikcondition = mysqli_num_rows($newNIK) ;
    }

    if ($nik !== $curNIK or $nama !== $curNama or $unit !== $curUnit or $jam !== $curJam) {
        if ($nikcondition > 0 ) {
            header('location:karyawan.php?msg=cancel');
            return;
        }
        mysqli_query($koneksi, "UPDATE tbl_karyawan SET
                            nik         = '$nik',
                            nama        = '$nama',
                            unit        = '$namaUnit' ,
                            id_unit     = '$idUnit',
                            jumlahjam   = '$jam'
                            WHERE id    =  $id
                        ");


    header("location:karyawan.php?msg=updated");
    return;

    }

    if (isset($_POST['simpanimport'])) {
        $err        = "";
        $ekstensi   = "";
        $success    = "";

        $file_name  = $_FILES['import']['name'];
        $file_data  = $_FILES['import']['tmp_name'];
        
        if (empty($file_name)){
            $err .= "<li>Silahkan masukkan file </li>";
        }else{
            $ekstensi   = pathinfo($file_name)['extension'];
        }

        $ekstensi_allowed = array("xls","xlsx");
        if(!in_array($ekstensi,$ekstensi_allowed)){
            $err .="<li>Silahkan masukkan file tipe xls, atau xlsx. File yang kamu masukkan <b>$file_name</b> memiliki tipe <b>$ekstensi</b></li>";
        }
    }
}

?>