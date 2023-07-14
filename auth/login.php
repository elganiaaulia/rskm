<?php 

session_start();

if (isset ($_SESSION ['username'] )) {
    header('location:../index.php');
    exit;
}

require_once "../config.php" ;

?>

<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="utf-8" />
        <meta http-equiv="X-UA-Compatible" content="IE=edge" />
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
        <meta name="description" content="" />
        <meta name="author" content="" />
        <title>Login - RSKM</title>
        <link href="<?= $main_url?>assets/sb-admin/css/styles.css" rel="stylesheet" />
        <script src="https://use.fontawesome.com/releases/v6.3.0/js/all.js" crossorigin="anonymous"></script>
        <link rel="icon" type="image/x-icon" href= "<?= $main_url?>aseets/image/logo.png">

        <style> body { background-image: url(../assets/image/gedungrskm.png);
        background: size cover; background-repeat: no-repeat; background-position: center;}</style>
    </head>
    <body class="bg-primary">
        <div id="layoutAuthentication">
            <div id="layoutAuthentication_content">
                <main>
                    <div class="container mt-4 ">
                        <div class="row justify-content-center">
                            <div class="col-lg-5">
                                <div class="card shadow-lg border-0 rounded-lg mt-5 ">
                                    <div class="card-header"><h4 class="text-center font-weight-light my-4">Login - RSKM</h4></div>
                                    <div class="card-body">

                                        <form action="proses-login.php" method="POST">
                                            <div class="form-floating mb-3">
                                                <input class="form-control" id="username" name="name" type="text"  placeholder="username" autocomplete="off" required/>
                                                <label for="username">Username</label>
                                            </div>
                                            <div class="form-floating mb-3">
                                                <input class="form-control" id="inputPassword" name="password"  type="password" placeholder="Password" minlength="4"/>
                                                <label for="inputPassword">Password</label>
                                            </div>
                                                <button type="submit" name="login" class="btn btn-primary col-12 my-2">Login</button>
                                        </form>
                                    </div>
                                    <div class="card-footer text-center py-3">
                                        <div class="text-muted small">Copyright RSKM &copy; <?= date("Y")?></div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </main>
            </div>
        </div>
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js" crossorigin="anonymous"></script>
        <script src="<?= $main?>assets/sb-admin/js/scripts.js"></script>

        
    </body>
</html>
