<?php

include_once "../config.php";

if (isset($_POST['id'])) {
    $idpelatihan = $_POST['id'];
    $query = mysqli_query($koneksi, "SELECT * FROM tbl_pelatihan WHERE id = '$idpelatihan' ORDER BY tgl_mulai ASC");
    $data = mysqli_fetch_array($query);
    
    $result ['tgl_mulai'] = $data['tgl_mulai'];
    $result ['tgl_selesai'] = $data['tgl_selesai'];
    $result ['jumlah_jam'] = $data['jumlah_jam'];
    
    $json = json_encode($result);
    echo $json;
}
?>