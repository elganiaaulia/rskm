<?php 
require_once "../config.php";

$id = $_GET['id'];
$query = "DELETE FROM tbl_history where id = '$id' ";
$result = mysqli_query($koneksi,$query) or die("Failed to execute query");


if ($result) {
    header("location:pel-kry.php?msg=deleted");
        exit();
}else {
    header("location:pel-kry.php?msg=error");

        exit();
}

?>