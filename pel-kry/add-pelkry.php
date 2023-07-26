<?php 

session_start();

if (!isset($_SESSION['username'])) {
    header('location:../auth/login.php');
    exit;
}

require_once "../config.php";

$title = "Tambah Pelatihan Karyawan - RSKM" ;
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
                        <h1 class="mt-4">Tambah Pelatihan Karyawan</h1>
                        <ol class="breadcrumb mb-4">
                            <li class="breadcrumb-item"><a href="../index.php">Home</a></li>
                            <li class="breadcrumb-item"><a href="pel-kry.php">Pelatihan Karyawan</a></li>
                            <li class="breadcrumb-item active">Tambah Pelatihan Karyawan</li>
                        </ol>
                        <form action="proses-pelkry.php" method="POST" enctype="multipart/form-data">
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
                                            <label for="periode" class="col-sm-2 col-form-label">Periode</label>
                                            <label for="periode" class="col-sm-1 col-form-label">:</label>
                                        <div class="col-sm-9" style="margin-left: -50px;">
                                            <select name="periode" id="periode" class="form-select border-0 border-buttom" required>
                                            <option value="" selected disabled>--Pilih periode--</option>
                                            <?php
                                            $queryPelKry = mysqli_query($koneksi, "SELECT * FROM tbl_periode") or die (mysqli_error($koneksi));
                                            while ($data = mysqli_fetch_array($queryPelKry)){
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
                                            <label for="karyawan" class="col-sm-2 col-form-label">Karyawan</label>
                                            <label for="karyawan" class="col-sm-1 col-form-label">:</label>
                                        <div class="col-sm-9" style="margin-left: -50px;">
                                            <select name="karyawan" id="karyawan" class="form-select border-0 border-buttom" required>
                                            <option value="" selected disabled>--Karyawan--</option>
                                            <?php
                                            $queryPelKry = mysqli_query($koneksi, "SELECT * FROM tbl_karyawan") or die (mysqli_error($koneksi));
                                            while ($data = mysqli_fetch_array($queryPelKry)){
                                                $id = $data['id'];
                                                $nama = $data['nama'];
                                                $id_unit = $data['id_unit'];
                                                $nm_unit = $data['nm_unit'];

                                            ?>
                                            <option value="<?= $id ?>"><?= $nama ?></option>
                                           

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