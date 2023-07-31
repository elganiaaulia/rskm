<?php

session_start();

if (!isset ($_SESSION ['username'] )) {
    header('location:../auth/login.php');
    exit;
}

require_once "../config.php";
$title = "Pelatihan Karyawan - RSKM" ;
require_once "../template/header.php";
require_once "../template/navbar.php";
require_once "../template/sidebar.php";

if (isset($_GET['msg'])) {
    $msg = $_GET['msg'];
} else {
    $msg = "";
}
$alert = '';

if ($msg == 'error') {
    $alert = '<div class="alert alert-success alert-dismissible fade show" role="alert">
    <i class="fa-solid fa-circle-check"></i> Data pelatihan gagal dihapus..
    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
    </div>';
}
if ($msg == 'updated') {
    $alert = '<div class="alert alert-success alert-dismissible fade show" role="alert">
    <i class="fa-solid fa-circle-check"></i> Data Pelatihan berhasil diperbarui..
    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
    </div>';
}
?>
<div id="layoutSidenav_content">
                <main>
                    <div class="container-fluid px-4">
                        <h1 class="mt-4">Pelatihan Karyawan</h1>
                        <ol class="breadcrumb mb-4">
                            <li class="breadcrumb-item"><a href="../index.php">Home</a> </li>
                            <li class="breadcrumb-item active">Pelatihan Karyawan</li>
                        </ol>
                    </div>
                    <div class="card">
                    <div class="card-header">
                        <span class = "h5 my-2" ><i class="fa-solid fa-list"></i>Pelatihan Karyawan</span>
                        <a href="<?= $main_url?>pel-kry/add-pelkry.php" class="btn btn-sm btn-primary float-end"><i class="fa-solid fa-plus"></i>Tambah</a>
                    </div>
                    <div class="card-body">
                    <form action="pel-kry.php" method="POST" enctype="multipart/form-data">
                            <?php if ($msg != '') {
                                echo $alert;
                            } ?>
                    <table class="table table-hover" id="datatablesSimple">
                        <thead>
                            <tr>
                            <th scope="col">No</th>
                            <th scope="col"><center>Periode</center></th>
                            <th scope="col"><center>Karyawan</center></th>
                            <th scope="col"><center>Unit</center></th>
                            <th scope="col"><center>Total Durasi</center></th>
                            <th scope="col"><center>Operasi</center></th>
                        </thead>
                        <tbody>
                            <?php
                            $no = 1;
                            $queryPelKry = mysqli_query($koneksi, "SELECT * FROM tbl_pelkry");
                            while ($data = mysqli_fetch_array($queryPelKry)){
                                $id = $data['id'];
                                
                            ?>
                            <tr>
                            <th scope="row"><?= $no++ ?></th>
                            <td><?= $data['nm_periode'] ?></td>
                            <td><?= $data['nm_karyawan'] ?></td>
                            <td><?= $data['unit'];?></td>
                            <td><?= $data['total_durasi'];?></td>
                            <td align="center">
                                <a href="edit-pelkry.php?id=<?= $data['id'] ?>" class="btn btn-sm btn-warning" title="Update Pelatihan Karyawan"><i class="fa-solid fa-pen-to-square"></i></a>
                                <button type="button" class="btn btn-sm btn-danger" id="btnHapus" title="Hapus Pelatihan " data-id="<?= $id ?>" ><i class="fa-solid fa-trash"></i></button>
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
                        <form action="proses-pelatihan.php" method="POST" enctype="multipart/form-data">
                        <button type="button" name="btnDelete" class="btn btn-secondary" data-bs-dismiss="modal">Batal</button>
                            <a href="hapus-pelkry.php?id=<?= $id ?>" class="btn btn-primary">Ya</a>
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
            let idPelatihan = $(this).data('id');
            $('#mdlHapus').attr("href", "hapus-pelatihan.php?id=" + idPelatihan);
        })
    })
</script>


<?php 

    require_once "../template/footer.php"

?>