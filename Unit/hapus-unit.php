<?php 
require_once "../config.php";

$id = $_GET['id'];
$query = "DELETE FROM tbl_unit where id = '$id' ";
$result = mysqli_query($koneksi,$query) or die("Failed to execute query");


if ($result) {
    header("location:unit.php?msg=deleted");
        exit();
}else {
    header("location:unit.php?msg=error");

        exit();
}

?>