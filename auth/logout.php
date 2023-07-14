<?php
session_start(); // Memulai sesi

// Hapus semua variabel sesi
session_unset();

// Hancurkan sesi
session_destroy();

// Alihkan pengguna ke halaman login atau halaman lainnya
header("location:../auth/login.php");
exit();
?>
