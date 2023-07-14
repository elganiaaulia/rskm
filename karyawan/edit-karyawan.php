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
                        <form action="karyawan.php" method="POST" enctype="multipart/form-data">
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
                                            <option value="Anggrek Nurse Pratama">Anggrek Nurse Pratama</option>
                                            <option value="Apotik Klinik KM Cilegon">Apotik Klinik KM Cilegon</option>
                                            <option value="Apotik Klinik KM Pandeglang">Apotik Klinik KM Pandeglang</option>
                                            <option value="Apotik Serang">Apotik Serang</option>
                                            <option value="Bidang Administrasi SDM & HI">Bidang Administrasi SDM & HI</option>
                                            <option value="Bidang Akuntansi Keuangan">Bidang Akuntansi Keuangan</option>
                                            <option value="Bidang Akuntansi Manajemen">Bidang Akuntansi Manajemen</option>
                                            <option value="Bidang Case Management Madya">Bidang Case Management Madya</option>
                                            <option value="Bidang Logistik">Bidang Logistik</option>
                                            <option value="Bidang Pemasaran & PKRS">Bidang Pemasaran & PKRS</option>
                                            <option value="Bidang Pemeliharaan Sarana & Umum">Bidang Pemeliharaan Sarana & Umum</option>
                                            <option value="Bidang Pengembangan SDM & Org">Bidang Pengembangan SDM & Org</option>
                                            <option value="Bidang Perbendaharaan">Bidang Perbendaharaan</option>
                                            <option value="Bidang Perdagangan Obat dan Alkes">Bidang Perdagangan Obat dan Alkes</option>
                                            <option value="Bidang Perenc. Strategis & Pengmb. Bisnis">Bidang Perenc. Strategis & Pengmb. Bisnis</option>
                                            <option value="Bidang PPI & Patient Safety">Bidang PPI & Patient Safety</option>
                                            <option value="Bidang QA & Sistem Manajemen">Bidang QA & Sistem Manajemen</option>
                                            <option value="Bidang Sistim Informasi">Bidang Sistim Informasi</option>
                                            <option value="Business Support">Business Support</option>
                                            <option value="Cath Lab">Cath Lab</option>
                                            <option value="Cempaka Nurse Pratama">Cempaka Nurse Pratama</option>
                                            <option value="Dental Therapist Nurse Pratama">Dental Therapist Nurse Pratama</option>
                                            <option value="Departemen Keuangan">Departemen Keuangan</option>
                                            <option value="Departemen Medical Center & PJK3">Departemen Medical Center & PJK3</option>
                                            <option value="Departemen Pelayanan Keperawatan">Departemen Pelayanan Keperawatan</option>
                                            <option value="Departemen Pelayanan Medis">Departemen Pelayanan Medis</option>
                                            <option value="Departemen Penunjang Pelayanan">Departemen Penunjang Pelayanan</option>
                                            <option value="Departemen SDM & Umum">Departemen SDM & Umum</option>
                                            <option value="Dept. Perencanaan Bisnis & Pemasaran">Dept. Perencanaan Bisnis & Pemasaran</option>
                                            <option value="Direktorat Rumah Sakit">Direktorat Rumah Sakit</option>
                                            <option value="Direktorat Utama">Direktorat Utama</option>
                                            <option value="Edelweiss Nurse Pratama">Edelweiss Nurse Pratama</option>
                                            <option value="Flamboyan Nurse Pratama">Flamboyan Nurse Pratama</option>
                                            <option value="Functional Medical Staff General Practitioners">Functional Medical Staff General Practitioners</option>
                                            <option value="Hyperbaric">Hyperbaric</option>
                                            <option value="ICU/ICCU Nurse Pratama">ICU/ICCU Nurse Pratama</option>
                                            <option value="Instalasi Rawat Inap I">Instalasi Rawat Inap I</option>
                                            <option value="Instalasi Rawat Inap II">Instalasi Rawat Inap II</option>
                                            <option value="Instalasi Rawat Jalan">Instalasi Rawat Jalan</option>
                                            <option value="Kepala Klinik KM Serang">Kepala Klinik KM Serang</option>
                                            <option value="Melati Nurse Pratama">Melati Nurse Pratama</option>
                                            <option value="Neurovascular (dr. Nilam)">Neurovascular (dr. Nilam)</option>
                                            <option value="Nutritionist Pratama">Nutritionist Pratama</option>
                                            <option value="Poli Endoscopy">Poli Endoscopy</option>
                                            <option value="Poli Gigi">Poli Gigi</option>
                                            <option value="Poli Umum Klinik KM Cilegon">Poli Umum Klinik KM Cilegon</option>
                                            <option value="Poli Umum Serang">Poli Umum Serang</option>
                                            <option value="Satuan Pengawasan Intern">Satuan Pengawasan Intern</option>
                                            <option value="Sekretaris Perusahaan">Sekretaris Perusahaan</option>
                                            <option value="Staff Account Receivable">Staff Account Receivable</option>
                                            <option value="Staff Asset &Inventory">Staff Asset &Inventory</option>
                                            <option value="Staff Cashier">Staff Cashier</option>
                                            <option value="Staff Clinical Pharmacy">Staff Clinical Pharmacy</option>
                                            <option value="Staff Corporate & Business Strategic Planning">Staff Corporate & Business Strategic Planning</option>
                                            <option value="Staff Inpatient Pharmacy UDD">Staff Inpatient Pharmacy UDD</option>
                                            <option value="Staff Medical Record Operation">Staff Medical Record Operation</option>
                                            <option value="Staff Pharmacy JKN">Staff Pharmacy JKN</option>
                                            <option value="Staff Radiodiagnostic Pratama">Staff Radiodiagnostic Pratama</option>
                                            <option value="Staff SEVP BS">Staff SEVP BS</option>
                                            <option value="Sub Sps. Fertilitas (dr. Rijal)">Sub Sps. Fertilitas (dr. Rijal)</option>
                                            <option value="Unit Anestesi">Unit Anestesi</option>
                                            <option value="Unit Bedah Sentral">Unit Bedah Sentral</option>
                                            <option value="Unit Farmasi">Unit Farmasi</option>
                                            <option value="Unit Gawat Darurat">Unit Gawat Darurat</option>
                                            <option value="Unit Gizi">Unit Gizi</option>
                                            <option value="Unit Hemodialisa">Unit Hemodialisa</option>
                                            <option value="Unit Laboratorium">Unit Laboratorium</option>
                                            <option value="Unit Medical Check Up">Unit Medical Check Up</option>
                                            <option value="Unit Perawatan Edelweiss">Unit Perawatan Edelweiss</option>
                                            <option value="Unit Perawatan II / Melati">Unit Perawatan II / Melati</option>
                                            <option value="Unit Perawatan III / Anggrek">Unit Perawatan III / Anggrek</option>
                                            <option value="Unit Perawatan Intensif (ICU/ICCU)">Unit Perawatan Intensif (ICU/ICCU)</option>
                                            <option value="Unit Perawatan IV / Cempaka">Unit Perawatan IV / Cempaka</option>
                                            <option value="Unit Perawatan Kebidanan & Bersalin/Asoka">Unit Perawatan Kebidanan & Bersalin/Asoka</option>
                                            <option value="Unit Perawatan Seruni">Unit Perawatan Seruni</option>
                                            <option value="Unit Perawatan V / W K">Unit Perawatan V / W K</option>
                                            <option value="Unit Perawatan VI / Flamboyan">Unit Perawatan VI / Flamboyan</option>
                                            <option value="Unit Perawatan VII / Alamanda">Unit Perawatan VII / Alamanda</option>
                                            <option value="Unit Radiologi">Unit Radiologi</option>
                                            <option value="Unit Rawat Jalan II">Unit Rawat Jalan II</option>
                                            <option value="Unit Rehabilitasi Medik">Unit Rehabilitasi Medik</option>
                                            <option value="Unit Rekam Medis">Unit Rekam Medis</option>
                                            <option value="Unit Sterilisasi Sentral & Gas Medik">Unit Sterilisasi Sentral & Gas Medik</option>
                                            <option value="Wijayakusuma Nurse Pratama">Wijayakusuma Nurse Pratama</option>
                                                </select>
                                        </div>
                                    </div>
                                    <div class="mb-3 row">
                                            <label for="jam" class="col-sm-2 col-form-label">Tambah Jam</label>
                                            <label for="nik" class="col-sm-1 col-form-label">:</label>
                                        <div class="col-sm-9" style="margin-left: -50px;">
                                            <input type="number" name="jam" class="form-control-plaintext border-bottom ps-2" id="nik" value="<?= $data['jam'] ?>">
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