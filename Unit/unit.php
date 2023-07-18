<?php

session_start();

if (!isset ($_SESSION ['username'] )) {
    header('location:../auth/login.php');
    exit;
}

require_once "../config.php";
$title = "Unit - RSKM" ;
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
    <i class="fa-solid fa-circle-exclamation"></i> Tambah unit gagal, unit sudah ada
    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
    </div>';
} 
if ($msg == 'added') {
    $alert = '<div class="alert alert-success alert-dismissible fade show" role="alert">
    <i class="fa-solid fa-circle-check"></i> Tambah unit berhasil..
    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
    </div>';
}
if ($msg == 'updated') {
    $alert = '<div class="alert alert-success alert-dismissible fade show" role="alert">
    <i class="fa-solid fa-circle-check"></i> Unit berhasil diperbarui..
    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
    </div>';
}


?>

<div id="layoutSidenav_content">
                <main>
                    <div class="container-fluid px-4">
                        <h1 class="mt-4">Unit</h1>
                        <ol class="breadcrumb mb-4">
                            <li class="breadcrumb-item"><a href="../index.php">Home</a> </li>
                            <li class="breadcrumb-item active">Unit</li>
                        </ol>
                    </div>
                    <div class="card">
                    <div class="card-header">
                        <span class = "h5 my-2" ><i class="fa-solid fa-list"></i>Unit</span>
                        <a href="<?= $main_url?>unit/add-unit.php" class="btn btn-sm btn-primary float-end"><i class="fa-solid fa-plus"></i>Tambah</a>
                    </div>
                    <div class="card-body">
                    <form action="unit.php" method="POST" enctype="multipart/form-data">
                            <?php if ($msg != '') {
                                echo $alert;
                            } ?>
                    <table class="table table-hover" id="datatablesSimple">
                        <thead>
                            <tr>
                            <th scope="col">No</th>
                            <th scope="col"><center>Nama</center></th>
                            <th scope="col"><center>Status Aktif</center></th>
                            <th scope="col"><center>Operator</center></th>
                        </thead>
                        <tbody>
                            <?php
                            $no = 1;
                            $queryUnit = mysqli_query($koneksi, "SELECT * FROM tbl_unit");
                            while ($data = mysqli_fetch_array($queryUnit)){
                                $id = $data['id'];
                            ?>
                            <tr>
                            <th scope="row"><?= $no++ ?></th>
                            <td><?= $data['nama'] ?></td>
                            <td><?= $data['statusaktif'] ?></td>
                            <td align="center">
                                <a href="edit-unit.php?id=<?= $data['id'] ?>" class="btn btn-sm btn-warning" title="Update Unit"><i class="fa-solid fa-pen-to-square"></i></a>
                                <button type="button" class="btn btn-sm btn-danger" id="btnHapus" title="Hapus unit" data-id="<?= $id ?>" ><i class="fa-solid fa-trash"></i></button>
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
                        <form action="proses-unit.php" method="POST" enctype="multipart/form-data">
                        <button type="button" name="btnDelete" class="btn btn-secondary" data-bs-dismiss="modal">Batal</button>
                            <a href="hapus-unit.php?id=<?= $id ?>" class="btn btn-primary">Ya</a>
                        </div>
                        </div>
                    </div>
                </div>
                            
                        </table>
                        </form>
                    </div>
</div>
                        </div>
                </main>


<script>
    $(document).ready(function(){
        $(document).on('click', "#btnHapus", function(){
            $('#mdlHapus').modal('show');
            let idUnit = $(this).data('id');
            $('#mdlHapus').attr("href", "hapus-unit.php?id=" + idUnit);
        })
    })
</script>


<?php 

    require_once "../template/footer.php"

?>