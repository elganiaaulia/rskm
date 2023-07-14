<?php 

session_start();

if (!isset ($_SESSION ['username'] )) {
    header('location:../auth/login.php');
    exit;
}

require_once "../config.php" ;

// jika tombol simpan ditekan
if (isset($_POST['simpan'])) {
    // ambil value elemen yang di posting
    $username = trim(htmlspecialchars($_POST['username']));
    $nama = trim(htmlspecialchars($_POST['nama']));
    $unit = $_POST['unit'];
    $password = md5($_POST['password']);
    // $password = 1234 ;
    // $pass = password_hash($password, PASSWORD_DEFAULT);

    //cek username
    $cekusername = mysqli_query($koneksi, "SELECT * FROM tbl_user WHERE username = '$username'"); 
    if (mysqli_num_rows($cekusername) > 0) {
        header('location:add-user.php?msg=cancel');
        return;
    }

    mysqli_query($koneksi, "INSERT INTO tbl_user (username, password, nama, unit) VALUES('$username', '$password', '$nama', '$unit')");
    
    header('location:add-user.php?msg=added');
    return;

    

}
?>