<?php 
require_once "../config.php";

$id = $_GET['id'];
$query = "DELETE FROM tbl_periode where id = '$id' ";
$result = mysqli_query($koneksi,$query) or die("Failed to execute query " );


if ($result) {
    header("location:periode.php?msg=deleted");
        exit();
}else {
    header("location:periode.php?msg=error");

        exit();
}

?>