<?php 
require_once "../config.php";

$id = $_GET['id'];
$query = "DELETE FROM tbl_karyawan WHERE id = '$id' ";
$result = mysqli_query($koneksi,$query);

if ($result) {
    header("location:karyawan.php?msg=deleted");
        exit();
}else {
    header("location:karyawan.php?msg=error");
        exit();
}
?>