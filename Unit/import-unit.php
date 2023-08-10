<?php 

session_start();

if (!isset($_SESSION['username'])) {
    header('location:../auth/login.php');
    exit;
}

require_once "../config.php";

$title = "Import File - RSKM" ;
require_once "../template/header.php";
require_once "../template/navbar.php";
require_once "../template/sidebar.php";
?>

<div id="layoutSidenav_content">
                <main>
                    <div class="container-fluid px-4">
                        <h1 class="mt-4">Import File</h1>
                        <ol class="breadcrumb mb-4">
                            <li class="breadcrumb-item"><a href="../index.php">Home</a></li>
                            <li class="breadcrumb-item"><a href="unit.php">Unit</a></li>
                            <li class="breadcrumb-item active">Tambah Unit</li>
                        </ol>
                        <form action="proses-import.php" method="POST" enctype="multipart/form-data">
                            <!-- <?php if ($msg != '') {
                                echo $alert;
                            } ?> -->
                        <div class="card">
                            <div class="card-header">
                                <span class="h5 my-2"><i class="fa-solid fa-plus"></i> Import File Unit</span>
                                <button type="submit" name="simpanimport" class="btn btn-primary float-end">
                                    <i class="fa-solid fa-floppy-disk"></i> Upload File</button>
                            </div>
                            <div class="card-body">
                                <div class="row">
                                    <div class="col-8">
                                        <div class="mb-3 row">
                                            <label for="import" class="col-sm-2 col-form-label">Import File Unit</label>
                                            <label for="import" class="col-sm-1 col-form-label">:</label>
                                            <div class="col-sm-9" style="margin-left: -50px;">
                                                <input type="file" name="import" class="form-control-plaintext border-bottom ps-2" id="import" value="" required>
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