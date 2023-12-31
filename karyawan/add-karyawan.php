<?php 

session_start();

if (!isset($_SESSION['username'])) {
    header('location:../auth/login.php');
    exit;
}

require_once "../config.php";

$title = "Tambah Karyawan - RSKM" ;
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
    <i class="fa-solid fa-circle-exclamation"></i> Tambah karyawan gagal, NIK sudah ada
    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
    </div>';
} 
if ($msg == 'added') {
    $alert = '<div class="alert alert-success alert-dismissible fade show" role="alert">
    <i class="fa-solid fa-circle-check"></i> Tambah karyawan berhasil..
    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
    </div>';
}


?>


<div id="layoutSidenav_content">
                <main>
                    <div class="container-fluid px-4">
                        <h1 class="mt-4">Tambah Karyawan</h1>
                        <ol class="breadcrumb mb-4">
                            <li class="breadcrumb-item"><a href="../index.php">Home</a></li>
                            <li class="breadcrumb-item"><a href="karyawan.php">Karyawan</a></li>
                            <li class="breadcrumb-item active">Tambah Karyawan</li>
                        </ol>
                        <form action="proses-karyawan.php" method="POST" enctype="multipart/form-data">
                            <?php if ($msg != '') {
                                echo $alert;
                            } ?>
                        <div class="card">
                            <div class="card-header">
                                <span class="h5 my-2"><i class="fa-solid fa-plus"></i>Tambah Karyawan</span>
                                <button type="submit" name="simpan" class="btn btn-primary float-end"><i class="fa-solid fa-floppy-disk"></i>Simpan</button>
                                <button type="reset" name="reset" class="btn btn-danger float-end me-1"><i class="fa-solid fa-xmark"></i> Reset</button>
                            </div>
                            <div class="card-body">
                                <div class="row">
                                    <div class="col-8">
                                        <div class="mb-3 row">
                                            <label for="nik" class="col-sm-2 col-form-label">NIK</label>
                                            <label for="nik" class="col-sm-1 col-form-label">:</label>
                                        <div class="col-sm-9" style="margin-left: -50px;">
                                            <input type="text" name="nik" class="form-control-plaintext border-bottom ps-2" id="nik" value="" required>
                                        </div>
                                        </div>
                                        <div class="mb-3 row">
                                            <label for="nama" class="col-sm-2 col-form-label">Nama</label>
                                            <label for="nik" class="col-sm-1 col-form-label">:</label>
                                        <div class="col-sm-9" style="margin-left: -50px;">
                                            <input type="text" name="nama" class="form-control-plaintext border-bottom ps-2" id="nik" value="" required>
                                        </div> 
                                        </div>
                                        <div class="mb-3 row">
                                            <label for="unit" class="col-sm-2 col-form-label">Unit</label>
                                            <label for="nik" class="col-sm-1 col-form-label">:</label>
                                        <div class="col-sm-9" style="margin-left: -50px;">
                                            <select name="unit" id="unit" class="form-select border-0 border-buttom" required>
                                            <option value="" selected disabled>--Pilih unit--</option>
                                            <?php
                                            
                                            $queryUnit = mysqli_query($koneksi, "SELECT * FROM tbl_unit WHERE statusaktif = 'Ya'");
                                            while ($data = mysqli_fetch_array($queryUnit)){
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