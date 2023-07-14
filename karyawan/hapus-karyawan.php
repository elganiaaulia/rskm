<?php 
require_once "../config.php";

$id = $_GET['id'];
$query = "DELETE FROM tbl_karyawan where id = '$id' ";
$result = mysqli_query($koneksi,$query) or die("Failed to execute query " );


if ($result) {
    header("location:karyawan.php?msg=deleted");
        exit();
}else {
    header("location:karyawan.php?msg=error");

        exit();
}



// session_start();

// if (!isset($_SESSION['username'])) {
//     header('location:../auth/login.php');
//     exit;
// }
// if (isset($_GET["id"])) {
//     $id = $_GET['id'];
//     $hapus = mysqli_query($koneksi, "DELETE FROM tbl_karyawan WHERE id = '$id'");
    
//     if ($hapus) {
//         // echo "<script>alert('Data Berhasil Dihapus!')</script>";
//         header("location:karyawan.php?msg=deleted");
//         exit();
//     } else {
//         // echo "<script>alert('Data Gagal Dihapus!')</script>";
//         header("location:karyawan.php?msg=error");
//         exit();
//     }
    

// }


// if (isset($_GET["id"])) {
//     $id = $_GET["id"];

//     $stmt = mysqli_prepare($koneksi, "DELETE FROM tbl_karyawan WHERE id = ?");
//     mysqli_stmt_bind_param($stmt, "i", $id);
//     mysqli_stmt_execute($stmt);
//     mysqli_stmt_close($stmt);
// }





// header("location:karyawan.php?msg=deleted");

?>