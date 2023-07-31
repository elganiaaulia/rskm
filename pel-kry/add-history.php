<?php

session_start();

if (!isset($_SESSION['username'])) {
    header('location:../auth/login.php');
    exit;
}

require_once "../config.php";

$title = "Tambah Pelatihan Karyawan - RSKM";
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
            <h1 class="mt-4">Update Pelatihan Karyawan</h1>
            <ol class="breadcrumb mb-4">
                <li class="breadcrumb-item"><a href="../index.php">Home</a></li>
                <li class="breadcrumb-item"><a href="pel-kry.php">Pelatihan Karyawan</a></li>
                <!-- <li class="breadcrumb-item"><a href="edit-pelkry.php">Tampil Pelatihan Karyawan</a></li> -->
                <li class="breadcrumb-item active">Update Pelatihan Karyawan</li>
            </ol>
            <form action="proses-pelkry.php" method="POST" enctype="multipart/form-data">
                <?php if ($msg != '') {
                    echo $alert;
                } ?>
                <div class="card">
                    <div class="card-header">
                        <span class="h5 my-2"><i class="fa-solid fa-plus"></i>Tambah Pelatihan</span>
                        <button href="<?= $main_url ?>add-pelkry.php" type="submit" name="simpanhistory" class="btn btn-primary float-end"><i class="fa-solid fa-floppy-disk"></i>Simpan</button>
                        <button type="reset" name="reset" class="btn btn-danger float-end me-1"><i class="fa-solid fa-xmark"></i> Reset</button>
                    </div>
                    <div class="card-body">
                        <div class="row">
                            <div class="col-12">
                                <div class="mb-4 row">
                                    <label for="nama" class="col-sm-2 col-form-label">Pelatihan</label>
                                    <label for="nama" class="col-sm-1 col-form-label">:</label>
                                    <div class="col-sm-5" style="margin-left: -60px;">
                                        <select class="form-select " name="namapelatihan" id="namapelatihan" required>
                                            <option value="-" selected>- Pilih Nama Pelatihan -</option>
                                            <?php
                                            $query = mysqli_query($koneksi, "SELECT * FROM tbl_pelatihan ORDER BY nama ASC");
                                            while ($data = mysqli_fetch_array($query)) {
                                                echo "<option value='" . $data['nama'] . "'>" . $data['nama'] . "</option>";
                                            }
                                            ?>
                                        </select>
                                    </div>
                                </div>
                                <div class="mb-4 row">
                                    <label for="tgl" class="col-sm-2 col-form-label">Tanggal Pelatihan</label>
                                    <label for="tgl" class="col-sm-1 col-form-label">:</label>
                                    <div class="col-sm-5" style="margin-left: -60px;">
                                        <select name="tgl_mulai" id="tgl_mulai" class="form-select border-0 border-buttom" required disabled>
                                            <option value="-">--pilih tanggal mulai--</option>
                                        </select>
                                    </div>
                                </div>
                                <div class="mb-4 row">
                                    <label for="durasi" class="col-sm-2 col-form-label">Durasi</label>
                                    <label for="durasi" class="col-sm-1 col-form-label">:</label>
                                    <div class="col-sm-5" style="margin-left: -60px;">
                                        <select class="form-select" name="jumlah_jam" id="jumlah_jam" required disabled>
                                            <option value="-">--pilih durasi--</option>
                                        </select>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
        </div>
        </form>
</div>
</main>
<script>

$(document).ready(function(){
    $('#namapelatihan').change(function(){
        var nm = $(this).val();
        $.ajax({
            type : 'POST',
            url : 'get_tglmulai.php',
            data : {
                nm : nm
            },
            success:function(response){
                console.log("success:" + response)
                $("#tgl_mulai").prop("disabled", false).html(response);
                $("#jumlah_jam").prop("disabled", false).html("<option value='-'>--Pilih durasi--</option>");
            }
        })
    })
})



</script>


<!-- <script>
    function get_tglmulai(data) {
        var id = "id=" + data;
        $.ajax({
            type: 'POST',
            url: 'get_tglmulai.php',
            data: id,
            success: function(hasil) {
                $("#tgl_mulai").html(hasil);
                $("#jumlah_jam").html('<option value="-">= Pilih Jumlah Jam/Durasi =</option>');
            }
        });
    }

    function getjumlahjam(durasi) {
        var id = "id=" + durasi;
        $.ajax({
            type: 'POST',
            url: 'getJumlahJam.php',
            data: id,
            success: function(hasil) {
                $("#jumlah_jam").html(hasil);
                $("#jumlah_jam").html('<option value="-">= Pilih Jumlah Jam/Durasi =</option>');
            }
        });
    }
</script> -->
<?php

require_once "../template/footer.php"

?>