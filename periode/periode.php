<?php

session_start();

if (!isset ($_SESSION ['username'] )) {
    header('location:../auth/login.php');
    exit;
}

require_once "../config.php";
$title = "Periode - RSKM" ;
require_once "../template/header.php";
require_once "../template/navbar.php";
require_once "../template/sidebar.php";


?>
<div id="layoutSidenav_content">
                <main>
                    <div class="container-fluid px-4">
                        <h1 class="mt-4">Periode</h1>
                        <ol class="breadcrumb mb-4">
                            <li class="breadcrumb-item"><a href="../index.php">Home</a> </li>
                            <li class="breadcrumb-item active">Periode</li>
                        </ol>
                    </div>
                    <div class="card">
                    <div class="card-header">
                        <span class = "h5 my-2" ><i class="fa-solid fa-list"></i> Periode</span>
                        <a href="<?= $main_url?>periode/add-periode.php" class="btn btn-sm btn-primary float-end"><i class="fa-solid fa-plus"></i>Tambah</a>
                    </div>
                    <div class="card-body">
                    <form action="periode.php" method="POST" enctype="multipart/form-data">
                            <!-- <?php if ($msg != '') {
                                echo $alert;
                            } ?> -->
                    <table class="table table-hover" id="datatablesSimple">
                        <thead>
                            <tr>
                            <th scope="col">No</th>
                            <th scope="col"><center>Nama</center></th>
                            <th scope="col"><center>Tanggal Mulai</center></th>
                            <th scope="col"><center>Tanggal Selesai</center></th>
                            <th scope="col"><center>Operasi</center></th>
                        </thead>
                        <tbody>
                            <?php
                            $no = 1;
                            $queryPeriode = mysqli_query($koneksi, "SELECT * FROM tbl_periode");
                            while ($data = mysqli_fetch_array($queryPeriode)){
                                $id = $data['id'];
                            ?>
                            <tr>
                            <th scope="row"><?= $no++ ?></th>
                            <td><?= $data['nama'] ?></td>
                            <td><?= $data['tgl_mulai'] ?></td>
                            <td><?= $data['tgl_selesai'] ?></td>
                            <td align="center">
                                <a href="edit-periode.php?id=<?= $data['id'] ?>" class="btn btn-sm btn-warning" title="Update Periode"><i class="fa-solid fa-pen-to-square"></i></a>
                                <button type="button" class="btn btn-sm btn-danger" id="btnHapus" title="Hapus Periode" data-id="<?= $id ?>" ><i class="fa-solid fa-trash"></i></button>
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
                        <form action="proses-periode.php" method="POST" enctype="multipart/form-data">
                        <button type="button" name="btnDelete" class="btn btn-secondary" data-bs-dismiss="modal">Batal</button>
                            <a href="hapus-periode.php?id=<?= $id ?>" class="btn btn-primary">Ya</a>
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
            let idPeriode = $(this).data('id');
            $('#mdlHapus').attr("href", "hapus-periode.php?id=" + idPeriode);
        })
    })
</script>


<?php 

    require_once "../template/footer.php"

?>