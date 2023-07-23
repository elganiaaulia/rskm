<?php 

session_start();

if (!isset($_SESSION['username'])) {
    header('location:../auth/login.php');
    exit;
}

require_once "../config.php";

$title = "Tambah Pelatihan - RSKM" ;
require_once "../template/header.php";
require_once "../template/navbar.php";
require_once "../template/sidebar.php";

if (isset($_GET['msg'])) {
    $msg = $_GET['msg'];
} else {
    $msg = "";
}
$alert = '';
if ($msg == 'cancel') {
    $alert = '<div class="alert alert-warning alert-dismissible fade show" role="alert">
    <i class="fa-solid fa-circle-exclamation"></i> Tambah pelatihan gagal
    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
    </div>';
} 
if ($msg == 'added') {
    $alert = '<div class="alert alert-success alert-dismissible fade show" role="alert">
    <i class="fa-solid fa-circle-check"></i> Tambah pelatihan berhasil..
    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
    </div>';
}


?>

<div id="layoutSidenav_content">
                <main>
                    <div class="container-fluid px-4">
                        <h1 class="mt-4">Tambah Pelatihan</h1>
                        <ol class="breadcrumb mb-4">
                            <li class="breadcrumb-item"><a href="../index.php">Home</a></li>
                            <li class="breadcrumb-item"><a href="pelatihan.php">Pelatihan</a></li>
                            <li class="breadcrumb-item active">Tambah Pelatihan</li>
                        </ol>
                        <form action="proses-pelatihan.php" method="POST" enctype="multipart/form-data">
                            <?php if ($msg != '') {
                                echo $alert;
                            } ?>
                        <div class="card">
                            <div class="card-header">
                                <span class="h5 my-2"><i class="fa-solid fa-plus"></i>Tambah Pelatihan</span>
                                <button type="submit" name="simpan" class="btn btn-primary float-end"><i class="fa-solid fa-floppy-disk"></i>Simpan</button>
                                <button type="reset" name="reset" class="btn btn-danger float-end me-1"><i class="fa-solid fa-xmark"></i> Reset</button>
                            </div>
                            <div class="card-body">
                                <div class="row">
                                    <div class="col-8">
                                        <div class="mb-3 row">
                                            <label for="nama" class="col-sm-2 col-form-label">Nama</label>
                                            <label for="nama" class="col-sm-1 col-form-label">:</label>
                                        <div class="col-sm-9" style="margin-left: -50px;">
                                            <input type="text" name="nama" class="form-control-plaintext border-bottom ps-2" id="nama" value="" required>
                                        </div> 
                                        </div>
                                        <div class="mb-3 row">
                                            <label for="karyawan" class="col-sm-2 col-form-label">Karyawan</label>
                                            <label for="nama" class="col-sm-1 col-form-label">:</label>
                                        <div class="col-sm-9" style="margin-left: -50px;">
                                        <select name="karyawan" id="karyawan" class="form-select border-0 border-buttom" required>
                                            <option value="" selected disabled>--karyawan--</option>
                                            <?php

                                            $queryKaryawan = mysqli_query($koneksi, "SELECT * FROM tbl_karyawan WHERE nama = '$nama'");
                                            while ($data = mysqli_fetch_array($queryKaryawan)){
                                                $id = $data['id'];
                                                $nama = $data['nama'];
                                            ?>
                                            <option value="<?= $id?>"><?= $nama ?></option>
                                            <?php
                                            }
                                            ?>
                                        </select>
                                        </div> 
                                        </div>
                                        <div class="mb-3 row">
                                            <label for="periode" class="col-sm-2 col-form-label">Periode</label>
                                            <label for="nama" class="col-sm-1 col-form-label">:</label>
                                        <div class="col-sm-9" style="margin-left: -50px;">
                                            <input type="text" name="periode" class="form-control-plaintext border-bottom ps-2" id="periode" value="" required>
                                        </div> 
                                        </div>
                                        <div class="mb-3 row">
                                            <label for="nama" class="col-sm-2 col-form-label">Tanggal Mulai</label>
                                            <label for="nama" class="col-sm-1 col-form-label">:</label>
                                        <div class="col-sm-9" style="margin-left: -50px;">
                                            <input type="date" name="tgl_mulai" class="form-control-plaintext border-bottom ps-2" id="nama" value="" required>
                                        </div> 
                                        </div>
                                        <div class="mb-3 row">
                                            <label for="nama" class="col-sm-2 col-form-label">Tanggal Selesai</label>
                                            <label for="nama" class="col-sm-1 col-form-label">:</label>
                                        <div class="col-sm-9" style="margin-left: -50px;">
                                            <input type="date" name="tgl_selesai" class="form-control-plaintext border-bottom ps-2" id="nama" value="" required>
                                        </div> 
                                        </div>
                                        <div class="mb-3 row">
                                            <label for="jumlah_jam" class="col-sm-2 col-form-label">Jumlah Jam</label>
                                            <label for="nama" class="col-sm-1 col-form-label">:</label>
                                        <div class="col-sm-9" style="margin-left: -50px;">
                                            <input type="text" name="jumlah_jam" class="form-control-plaintext border-bottom ps-2" id="jumlah_jam" value="" required>
                                        </div> 
                                        </div><div class="mb-3 row">
                                            <label for="bukti" class="col-sm-2 col-form-label">Bukti</label>
                                            <label for="nama" class="col-sm-1 col-form-label">:</label>
                                        <div class="col-sm-9" style="margin-left: -50px;">
                                            <input type="file" name="bukti" class="form-control-plaintext border-bottom ps-2" id="bukti" value="" required>
                                        </div> 
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        </form>
                    </div>
                </main>
</div>
<?php 

require_once "../template/footer.php"

?>