<?php 

//koneksi
$koneksi = mysqli_connect("localhost", "root", "", "db_rskm") ;
function koneksiDB(){
    $host = "localhost";
    $username = "root";
    $password = "";
    $db = "db_rskm";
    $koneksi = mysqli_connect($host, $username, $password, $db);
    if (!$koneksi){
        die ("koneksi database gagal".mysqli_connect_error());
    }else{
        return $koneksi;
    }
}


//cek koneksi
// if (mysqli_connect_errno()) {
//     echo "gagal koneksi ke database";
// } else {
//     echo "berhasil masuk database" ;
// }


//url induk
$main_url = "http://localhost/rskm/";
$title = "Dashboard - RSKM" ;
function select_tglmulai($id){
    $query = "SELECT * FROM tbl_pelatihan WHERE id = $id";
    $result = mysqli_query(koneksiDB(), $query);
    // $row = mysqli_fetch_assoc($result);
    return $result;
}
function selectAllData(){
    $query = "SELECT * FROM tbl_pelatihan";
    $result = mysqli_query(koneksiDB(), $query);
    return $result;
}
function selectjumlahjam($jumlah_jam){
    $query = "SELECT * FROM tbl_pelatihan WHERE id = '$jumlah_jam'" ;
    $result = mysqli_query(koneksiDB(), $query);
    return $result;
}
?>