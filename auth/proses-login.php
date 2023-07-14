<?php 
session_start() ; 
require_once "../config.php" ;

//jika tombol login ditekan
if (isset($_POST['login'])) {
    $username = $_POST['name']; 
    $password = md5($_POST['password']);

    $query = "SELECT * FROM tbl_user where username = '$username' and password = '$password' ";
    $ex = mysqli_query($koneksi,$query);
    $cek = mysqli_num_rows($ex);

    $hasil = mysqli_fetch_array($ex); 
    
    // echo $ex ;
    // echo $hasil ['unit'] ;
    // echo $cek;
    if ($cek > 0) {
        // session_start();
        // $array = mysqli_fetch_assoc($ex);
        $_SESSION['username'] = $hasil['username'];
        echo "login berhasil";

        header("location:../index.php");
    }else {
        echo "kombinasi password dan username tidak sesuai" ;
    }


}

?>


