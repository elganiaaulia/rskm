<div id="layoutSidenav">
            <div id="layoutSidenav_nav">
                <nav class="sb-sidenav accordion bg-light" id="sidenavAccordion">
                    <div class="sb-sidenav-menu">
                        <div class="nav">
                            <div class="sb-sidenav-menu-heading">Home</div>
                            <a class="nav-link" href="<?= $main_url?>index.php">
                                <div class="sb-nav-link-icon"><i class="fas fa-tachometer-alt"></i></div>
                                Dashboard
                            </a>
                            <hr class="mb-0">
                            <div class="sb-sidenav-menu-heading">Admin</div>
                            <a class="nav-link" href="<?= $main_url ?>user/add-user.php">
                                <div class="sb-nav-link-icon"><i class="fa-solid fa-user"></i></div>
                                User
                            </a>
                            <a class="nav-link" href="<?= $main_url ?>user/password.php">
                                <div class="sb-nav-link-icon"><i class="fa-solid fa-key"></i></div>
                                Ganti Password
                            </a>
                            <div class="sb-sidenav-menu-heading">Data</div>
                            <!-- <a class="nav-link" href="<?= $main_url?>index.php">
                                <div class="sb-nav-link-icon"><i class="fa-duotone fa-folder-gear"></i></i></div>
                                Admin
                            </a> -->
                            <a class="nav-link" href="<?= $main_url ?>pel-kry/pel-kry.php">
                                <div class="sb-nav-link-icon"><i class="fa-solid fa-users-viewfinder"></i></div>
                                Pelatihan Karyawan
                            </a>
                            <a class="nav-link" href="<?= $main_url ?>karyawan/karyawan.php">
                                <div class="sb-nav-link-icon"><i class="fa-regular fa-user"></i></div>
                                Karyawan
                            </a>
                            <a class="nav-link" href="<?= $main_url ?>unit/unit.php">
                                <div class="sb-nav-link-icon"><i class="fa-solid fa-people-roof"></i></div>
                                Unit
                            </a>
                            <a class="nav-link" href="<?= $main_url ?>periode/periode.php">
                                <div class="sb-nav-link-icon"><i class="fa-solid fa-calendar-days"></i></div>
                                Periode
                            </a>
                            <a class="nav-link" href="<?= $main_url ?>pelatihan/pelatihan.php">
                                <div class="sb-nav-link-icon"><i class="fa-solid fa-receipt"></i></div>
                                Pelatihan
                            </a>
                            <a class="nav-link" href="<?= $main_url?>index.php">
                                <div class="sb-nav-link-icon"><i class="fa-solid fa-book"></i></div>
                                Hasil
                            </a>
                            <hr class="mb-0">
                        </div>
                    </div>
                    <div class="sb-sidenav-footer border">
                        <div class="small">Logged in as:</div>
                        <?= $_SESSION ['username'];?>
                    </div>
                </nav>
            </div>