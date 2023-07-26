<?php 

session_start();

if (!isset($_SESSION['username'])) {
    header('location:../auth/login.php');
    exit;
}

require_once "../config.php";

$title = "Edit Pelatihan Karyawan - RSKM" ;
require_once "../template/header.php";
require_once "../template/navbar.php";
require_once "../template/sidebar.php";

$id = $_GET['id'];

$queryPelKry = mysqli_query($koneksi, "SELECT * FROM tbl_pelkry WHERE id = $id");
$dataPelkry = mysqli_fetch_array($queryPelKry);

?>


<div id="layoutSidenav_content">
                <main>
                    <div class="container-fluid px-4">
                        <h1 class="mt-4">Update Pelatihan Karyawan</h1>
                        <ol class="breadcrumb mb-4">
                            <li class="breadcrumb-item"><a href="../index.php">Home</a></li>
                            <li class="breadcrumb-item"><a href="pel-kry.php">Pelatihan Karyawan</a></li>
                            <li class="breadcrumb-item active">Update Pelatihan Karyawan</li>
                        </ol>
                        <form action="proses-pelkry.php" method="POST" enctype="multipart/form-data">
                        <div class="card">
                            <div class="card-header">
                            <span class="h5 my-2 col-2-sm"></span>
                                <span class="h5 my-2"><i class="fa-solid fa-pen-to-square"></i>Update Pelatihan Karyawan</span>
                            <div class="card-body">
                                
                                <div class="row">
                                    <div class="col-8">
                                        <input type="hidden" name="id" value="<?= $data['id'] ?>">
                                        <div class="mb-3 row">
                                            <label for="periode" class="col-sm-2 col-form-label">Periode</label>
                                            <label for="periode" class="col-sm-1 col-form-label">:</label>
                                        <div class="col-sm-9" style="margin-left: -50px;">
                                            <select name="periode" id="periode" class="form-select border-0 border-buttom" disabled>
                                            <?php
                                            $id_periode = $dataPelkry['id_periode'];
                                            $queryPeriode = mysqli_query($koneksi, "SELECT * FROM tbl_periode");
                                            while ($dataPeriode = mysqli_fetch_array($queryPeriode)){
                                                $id = $dataPeriode['id'];
                                                $nama = $dataPeriode['nama'];
                                                if ($id == $id_periode) {
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
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-8">
                                        <div class="mb-3 row">
                                            <label for="karyawan" class="col-sm-2 col-form-label">Karyawan</label>
                                            <label for="karyawan" class="col-sm-1 col-form-label">:</label>
                                        <div class="col-sm-9" style="margin-left: -50px;">
                                            <select name="karyawan" id="karyawan" class="form-select border-0 border-buttom" disabled>
                                            <option value="" selected disabled>--Pilih--</option>
                                            <?php
                                            $id_karyawan = $dataPelkry['id_karyawan'];
                                            $queryKaryawan = mysqli_query($koneksi, "SELECT * FROM tbl_karyawan");
                                            
                                            while ($dataKaryawan = mysqli_fetch_array($queryKaryawan)){
                                                $id = $dataKaryawan['id'];
                                                $nama = $dataKaryawan['nama'];
                                                if ($id == $id_karyawan) {
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
                                    </div>

                                </div>
                                <div class="row">
                                    <div class="col-8">
                                        <div class="mb-3 row">
                                            <label for="karyawan" class="col-sm-2 col-form-label">Total Durasi Pelatihan</label>
                                            <label for="karyawan" class="col-sm-1 col-form-label">:</label>
                                            <div class="col-sm-9" style="margin-left: -50px;">
                                                <?php
                                                $id = $_GET['id'];
                                                $queryTotal = mysqli_query($koneksi, "SELECT SUM(jumlah_jam) AS TotalJam FROM tbl_pelatihan WHERE id_pelkry = $id");
                                                $dataTotal = mysqli_fetch_array($queryTotal);
                                                
                                                ?>
                                                <input type="text" name="totaljam" class="form-control" id="totaljam" value="<?=$dataTotal ['TotalJam']?>" required>
                                            </div>
                                        </div>
                                    </div>
                                    
                                </div>
                                <br>
                                <button type="submit" name="update" class="btn btn-primary float-end"><i class="fa-solid fa-floppy-disk"></i>Update</button>
                                <br><br>
                                <div class="row">
                                    <div class="col-12-sm">
                                    <table class="table table-hover" id="datatablesSimple">
                                        <thead>
                                            <tr>
                                            <th scope="col"><center>Nama Pelatihan</center></th>
                                            <th scope="col"><center>Jumlah Jam Pelatihan</center></th>
                                            <th scope="col"><center>Tanggal Pelatihan</center></th>
                                            <th scope="col"><center>Operasi</center></th>
                                            </tr>
                                        </thead>
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