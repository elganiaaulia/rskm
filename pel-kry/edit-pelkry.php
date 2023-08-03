<?php

session_start();

if (!isset($_SESSION['username'])) {
    header('location:../auth/login.php');
    exit;
}

require_once "../config.php";

$title = "Edit Pelatihan Karyawan - RSKM";
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
                <li class="breadcrumb-item active">Tampil Pelatihan Karyawan</li>
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
                                                while ($dataPeriode = mysqli_fetch_array($queryPeriode)) {
                                                    $id = $dataPeriode['id'];
                                                    $nama = $dataPeriode['nama'];
                                                    if ($id == $id_periode) {
                                                        $pilih = "selected";
                                                    } else {
                                                        $pilih = "";
                                                    }
                                                ?>
                                                    <option value="<?= $id ?>" <?= $pilih ?>><?= $nama ?></option>
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

                                                while ($dataKaryawan = mysqli_fetch_array($queryKaryawan)) {
                                                    $id = $dataKaryawan['id'];
                                                    $nama = $dataKaryawan['nama'];
                                                    if ($id == $id_karyawan) {
                                                        $pilih = "selected";
                                                    } else {
                                                        $pilih = "";
                                                    }
                                                ?>
                                                    <option value="<?= $id ?>" <?= $pilih ?>><?= $nama ?></option>
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
                                            $queryTotal = mysqli_query($koneksi, "SELECT SUM(durasi) AS TotalJam FROM tbl_history WHERE id_pelkry = $id");
                                            $dataTotal = mysqli_fetch_array($queryTotal);
                                            ?>
                                            <input type="text" name="totaljam" class="form-control" id="totaljam" value="<?= $dataTotal['TotalJam'] ?>" disabled>
                                        </div>
                                    </div>
                                </div>

                            </div>
                            <br>
                            <a href="add-history.php?id=<?= $id ?>" class="btn btn-primary float-end"><i class="fa-solid fa-plus"></i>Tambah</a>
                            <br><br>
                            <div class="row">
                                <div class="col-12-sm">
                                    <form action="proses-pelkry.php" method="POST" enctype="multipart/form-data">
                                        <table class="table table-hover" id="datatablesSimple">
                                            <thead>
                                                <tr>
                                                    <th scope="col">
                                                        <center>Nama Pelatihan</center>
                                                    </th>
                                                    <th scope="col">
                                                        <center>Tanggal Mulai</center>
                                                    </th>
                                                    <th scope="col">
                                                        <center>Tanggal Selesai</center>
                                                    </th>
                                                    <th scope="col">
                                                        <center>Durasi Pelatihan</center>
                                                    </th>
                                                    <th scope="col">
                                                        <center>Action</center>
                                                    </th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                                <?php
                                                $id = $_GET['id'];
                                                $queryHistory = mysqli_query($koneksi, "SELECT * FROM tbl_history WHERE id_pelkry='$id'");
                                                while ($data = mysqli_fetch_array($queryHistory)) {
                                                    $id = $data['id'];
                                                ?>
                                                    <tr>
                                                        <td><?= $data['nm_pelatihan'] ?></td>
                                                        <td><?= $data['tgl_mulai'] ?></td>
                                                        <td><?= $data['tgl_selesai'] ?></td>
                                                        <td><?= $data['durasi'] ?></td>
                                                        <td align="center">
                                                            <button type="button" class="btn btn-sm btn-danger" id="btnHapus" title="Hapus karyawan" data-id="<?= $id ?>"><i class="fa-solid fa-trash"></i></button>
                                                        </td>
                                                    </tr>
                                                <?php } ?>
                                            </tbody>
                                            <!-- modal hapus data -->
                                            <div class="modal" id="mdlHapus" tabindex="-1">
                                                <div class="modal-dialog">
                                                    <div class="modal-content">
                                                        <div class="modal-header">
                                                            <h5 class="modal-title">Konfirmasi</h5>
                                                            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                                        </div>
                                                        <div class="modal-body">
                                                            <p>Anda yakin ingin menghapus data ini?</p>
                                                        </div>
                                                        <div class="modal-footer">
                                                            <form action="proses-pelkry.php" method="POST" enctype="multipart/form-data">
                                                                <button type="button" name="btnDelete" class="btn btn-secondary" data-bs-dismiss="modal">Batal</button>
                                                                <a href="hapus-history.php?id=<?= $id ?>" class="btn btn-primary">Ya</a>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </table>
                                    </form>
                                </div>
                            </div>
                        </div>
                    </div>
            </form>
        </div>
    </main>
</div>

<script>
    $(document).ready(function() {
        $(document).on('click', "#btnHapus", function() {
            $('#mdlHapus').modal('show');
            let id_history = $(this).data('id');
            $('#mdlHapus').attr("href", "hapus-history.php?id=" + id_history);
        })
    })
</script>

<?php

require_once "../template/footer.php"

?>