<?php

session_start();

if (!isset ($_SESSION ['username'] )) {
    header('location:../auth/login.php');
    exit;
}

require_once "../config.php";
$title = "Karyawan - RSKM" ;
require_once "../template/header.php";
require_once "../template/navbar.php";
require_once "../template/sidebar.php";

if (isset($_GET['msg'])) {
    $msg = $_GET['msg'];
} else {
    $msg = "";
}
$alert = '';

if ($msg == 'deleted') {
    $alert = '<div class="alert alert-warning alert-dismissible fade show" role="alert">
    <i class="fa-solid fa-circle-exclamation"></i> Data karyawan berhasil di hapus..
    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
    </div>';
} 
if ($msg == 'error') {
    $alert = '<div class="alert alert-success alert-dismissible fade show" role="alert">
    <i class="fa-solid fa-circle-check"></i> Data karyawan gagal dihapus..
    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
    </div>';
}
if ($msg == 'updated') {
    $alert = '<div class="alert alert-success alert-dismissible fade show" role="alert">
    <i class="fa-solid fa-circle-check"></i> Data karyawan berhasil diperbarui..
    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
    </div>';
}
if ($msg == 'cancel') {
    $alert = '<div class="alert alert-anger alert-dismissible fade show" role="alert">
    <i class="fa-solid fa-circle-xmark"></i> Data karyawan gagal diperbarui, nik sudah ada
    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
    </div>';
} 
?>

<div id="layoutSidenav_content">
                <main>
                    <div class="container-fluid px-4">
                        <h1 class="mt-4">Karyawan</h1>
                        <ol class="breadcrumb mb-4">
                            <li class="breadcrumb-item"><a href="../index.php">Home</a> </li>
                            <li class="breadcrumb-item active">Karyawan</li>
                        </ol>
                    </div>
                    <div class="card">
                    <div class="card-header">
                        <span class = "h5 my-2" ><i class="fa-solid fa-list"></i>Data Karyawan</span>
                        <a href="<?= $main_url?>karyawan/add-karyawan.php" class="btn btn-sm btn-primary float-end"><i class="fa-solid fa-plus"></i>Tambah</a>
                    </div>
                    <div class="card-body">
                    <form action="karyawan.php" method="POST" enctype="multipart/form-data">
                            <?php if ($msg != '') {
                                echo $alert;
                            } ?>
                    <table class="table table-hover" id="datatablesSimple">
                        <thead>
                            <tr>
                            <th scope="col">No</th>
                            <th scope="col"><center>NIK</center></th>
                            <th scope="col"><center>Nama</center></th>
                            <th scope="col"><center>Unit</center></th>
                            <th scope="col"><center>Jumlah Jam Pelatihan</center></th>
                            <th scope="col"><center>Operasi</center></th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php
                            $no = 1;
                            $queryKaryawan = mysqli_query($koneksi, "SELECT * FROM tbl_karyawan");
                            while ($data = mysqli_fetch_array($queryKaryawan)){
                                $id = $data['id'];
                            ?>
                            <tr>
                            <th scope="row"><?= $no++ ?></th>
                            <td><?= $data['nik'] ?></td>
                            <td><?= $data['nama'] ?></td>
                            <td><?= $data['unit'] ?></td>
                            <td><?= $data['jumlahjam'] ?></td>
                            <td align="center">
                                <a href="edit-karyawan.php?id=<?= $data['id'] ?>" class="btn btn-sm btn-warning" title="Update Karyawan"><i class="fa-solid fa-pen-to-square"></i></a>
                                <button type="button" class="btn btn-sm btn-danger" id="btnHapus" title="Hapus karyawan" data-id="<?= $id ?>" ><i class="fa-solid fa-trash"></i></button>
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
                        <form action="proses-karyawan.php" method="POST" enctype="multipart/form-data">
                        <button type="button" name="btnDelete" class="btn btn-secondary" data-bs-dismiss="modal">Batal</button>
                            <a href="hapus-karyawan.php?id=<?= $id ?>" class="btn btn-primary">Ya</a>
                        </div>
                        </div>
                    </div>
                </div>
                            </form>
                        </table>
                    </div>
</div>
                        </div>
                </main>


<script>
    $(document).ready(function(){
        $(document).on('click', "#btnHapus", function(){
            $('#mdlHapus').modal('show');
            let idKaryawan = $(this).data('id');
            $('#mdlHapus').attr("href", "hapus-karyawan.php?id=" + idKaryawan);
        })
    })
</script>




<?php 

    require_once "../template/footer.php"

?>