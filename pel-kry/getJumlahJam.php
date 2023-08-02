<?php 

require_once "../config.php";

if (isset($_POST['nm']) && isset($_POST['tgl_mulai'])) {
    $nama_pelatihan = $_POST['nm'];
    $tgl_mulai = $_POST['tgl_mulai'];

    $query = mysqli_query($koneksi, "SELECT jumlah_jam FROM tbl_pelatihan WHERE nama = '$nama_pelatihan' AND tgl_mulai = '$tgl_mulai'");
    echo "<option value='-'>--Pilih durasi--</option>";
    while ($data = mysqli_fetch_array($query)){
        echo "<option value='" . $data['jumlah_jam'] . "'>" . $data['jumlah_jam'] . "</option>";
    }
}

?>