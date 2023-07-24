<?php 

session_start();

if (!isset($_SESSION['username'])) {
    header('location:../auth/login.php');
    exit;
}

require_once "../config.php";

$title = "Edit Karyawan - RSKM" ;
require_once "../template/header.php";
require_once "../template/navbar.php";
require_once "../template/sidebar.php";

$id = $_GET['id'];

$queryKaryawan = mysqli_query($koneksi, "SELECT * FROM tbl_karyawan WHERE id = $id");
$data = mysqli_fetch_array($queryKaryawan);

?>


<div id="layoutSidenav_content">
                <main>
                    <div class="container-fluid px-4">
                        <h1 class="mt-4">Update Karyawan</h1>
                        <ol class="breadcrumb mb-4">
                            <li class="breadcrumb-item"><a href="../index.php">Home</a></li>
                            <li class="breadcrumb-item"><a href="karyawan.php">Karyawan</a></li>
                            <li class="breadcrumb-item active">Update Karyawan</li>
                        </ol>
                        <form action="proses-karyawan.php" method="POST" enctype="multipart/form-data">
                        <div class="card">
                            <div class="card-header">
                                <span class="h5 my-2"><i class="fa-solid fa-pen-to-square"></i>Update Karyawan</span>
                                <button type="submit" name="update" class="btn btn-primary float-end"><i class="fa-solid fa-floppy-disk"></i>Update</button>
                            <div class="card-body">
                                <div class="row">
                                    <div class="col-8">
                                        <input type="hidden" name="id" value="<?= $data['id'] ?>">
                                        <div class="mb-3 row">
                                            <label for="nik" class="col-sm-2 col-form-label">NIK</label>
                                            <label for="nik" class="col-sm-1 col-form-label">:</label>
                                        <div class="col-sm-9" style="margin-left: -50px;">
                                            <input type="text" name="nik" class="form-control-plaintext border-bottom ps-2" id="nik" value="<?= $data['nik'] ?>" required>
                                        </div>
                                        </div>
                                        <div class="mb-3 row">
                                            <label for="nama" class="col-sm-2 col-form-label">Nama</label>
                                            <label for="nik" class="col-sm-1 col-form-label">:</label>
                                        <div class="col-sm-9" style="margin-left: -50px;">
                                            <input type="text" name="nama" class="form-control-plaintext border-bottom ps-2" id="nik" value="<?= $data['nama'] ?>" required>
                                        </div> 
                                        </div>
                                        <div class="mb-3 row">
                                            <label for="unit" class="col-sm-2 col-form-label">Unit</label>
                                            <label for="nik" class="col-sm-1 col-form-label">:</label>
                                        <div class="col-sm-9" style="margin-left: -50px;">
                                            <select name="unit" id="unit" class="form-select border-0 border-buttom" required>
                                            <option value="" selected disabled>--Pilih unit--</option>
                                            <?php
                                            $id_unit = $data['id_unit'];
                                            $queryUnit = mysqli_query($koneksi, "SELECT * FROM tbl_unit WHERE statusaktif = 'Ya'");
                                            while ($data = mysqli_fetch_array($queryUnit)){
                                                $id = $data['id'];
                                                $nama = $data['nama'];

                                                if ($id == $id_unit) {
                                                    $pilih = "selected";
                                                } else {
                                                    $pilih = "";
                                                }
                                            ?>
                                            <option value="<?= $id?>" <?= $pilih?>><?= $nama ?></option>
                                            <?php
                                            }
                                            ?>
                                                </select>
                                        </div>
                                    </div>
                                    <div class="mb-3 row">
                                            <label for="jam" class="col-sm-2 col-form-label">Tambah Jam</label>
                                            <label for="nik" class="col-sm-1 col-form-label">:</label>
                                        <div class="col-sm-9" style="margin-left: -50px;">
                                            <input type="number" name="jam" class="form-control-plaintext border-bottom ps-2" id="nik" value="<?= $data['jumlahjam'] ?>">
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