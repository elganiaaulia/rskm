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

$id = $_GET['id'];

$queryPeriode = mysqli_query($koneksi, "SELECT * FROM tbl_periode WHERE id = $id");
$data = mysqli_fetch_array($queryPeriode);


?>

<div id="layoutSidenav_content">
                <main>
                    <div class="container-fluid px-4">
                        <h1 class="mt-4">Update Periode</h1>
                        <ol class="breadcrumb mb-4">
                            <li class="breadcrumb-item"><a href="../index.php">Home</a></li>
                            <li class="breadcrumb-item"><a href="periode.php">Periode</a></li>
                            <li class="breadcrumb-item active">Update Periode</li>
                        </ol>
                        <form action="proses-periode.php" method="POST" enctype="multipart/form-data">
                        <div class="card">
                            <div class="card-header">
                                <span class="h5 my-2"><i class="fa-solid fa-pen-to-square"></i>Update Periode</span>
                                <button type="submit" name="update" class="btn btn-primary float-end"><i class="fa-solid fa-floppy-disk"></i>Update</button>
                            <div class="card-body">
                                <div class="row">
                                    <div class="col-8">
                                        <input type="hidden" name="id" value="<?= $data['id'] ?>">
                                        <div class="mb-3 row">
                                            <label for="nama" class="col-sm-2 col-form-label">Nama</label>
                                            <label for="nama" class="col-sm-1 col-form-label">:</label>
                                        <div class="col-sm-9" style="margin-left: -50px;">
                                            <input type="text" name="nama" class="form-control-plaintext border-bottom ps-2" id="nik" value="<?= $data['nama'] ?>" required>
                                        </div> 
                                        </div>
                                        <div class="mb-3 row">
                                            <label for="nama" class="col-sm-2 col-form-label">Tanggal Mulai</label>
                                            <label for="nama" class="col-sm-1 col-form-label">:</label>
                                        <div class="col-sm-9" style="margin-left: -50px;">
                                            <input type="date" name="nama" class="form-control-plaintext border-bottom ps-2" id="nama" value="" required>
                                        </div> 
                                        </div>
                                        <div class="mb-3 row">
                                            <label for="nama" class="col-sm-2 col-form-label">Tanggal Selesai</label>
                                            <label for="nama" class="col-sm-1 col-form-label">:</label>
                                        <div class="col-sm-9" style="margin-left: -50px;">
                                            <input type="date" name="nama" class="form-control-plaintext border-bottom ps-2" id="nama" value="" required>
                                        </div> 
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