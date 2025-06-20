<?php
session_start();
include 'koneksi.php';

?>
<!doctype html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <title>GuardIn</title>
    <link
        href="https://fonts.googleapis.com/css?family=Open+Sans:300,300i,400,400i,600,600i,700,700i,800,800i&display=swap"
        rel="stylesheet">
    <link rel="stylesheet" href="assets/css/bootstrap.min.css">
    <link rel="stylesheet" href="assets/css/all.min.css">
    <link rel="stylesheet" href="assets/css/animate.css">
    <link rel="stylesheet" href="assets/plugins/slider/css/owl.carousel.min.css">
    <link rel="stylesheet" href="assets/plugins/slider/css/owl.theme.default.css">
    <link rel="stylesheet" type="text/css" href="assets/css/style.css" />
    <link rel="icon" href="foto/iconfav.png" type="image/x-icon">
    <link rel="shortcut icon" href="foto/iconfav.png" type="image/x-icon">

    <style>
    .form-login-body .login-desk .loginform {
        background-color: #4A0083 !important;
    }
    </style>
</head>

<body class="form-login-body">
    <div class="container mt-5">
        <div class="row">
            <div class="col-lg-10 mx-auto login-desk">
                <div class="row">
                    <div class="col-md-7 detail-box">
                        <center>
                            <!-- <img class="logo" src="home/img/logo.png" alt=""> -->
                        </center>
                        <div class="detailsh">
                            <img class="help" style="height: 300px;object-fit: cover;" src="foto/bodyguard.png" alt="">
                            <h3>GuardIn</h3>
                            <!-- <p>Kreasi kerajinan Anak muda bangsa dengan mengedepankan budaya Indonesia</p> -->
                        </div>
                    </div>
                    <div class="col-md-5 loginform">
                        <h4>Selamat Datang</h4>
                        <p>Silahkan Login</p>
                        <div class="login-det">
                            <form method="post">
                                <div class="form-row">
                                    <label for="">Email</label>
                                    <div class="input-group mb-3">
                                        <div class="input-group-prepend">
                                            <span class="input-group-text" id="basic-addon1">
                                                <i class="far fa-user text-dark"></i>
                                            </span>
                                        </div>
                                        <input type="email" class="form-control" name="email" aria-label="Username"
                                            aria-describedby="basic-addon1" style="color: black !important;">
                                    </div>
                                </div>
                                <div class="form-row">
                                    <label for="">Password</label>
                                    <div class="input-group mb-3">
                                        <div class="input-group-prepend">
                                            <span class="input-group-text" id="basic-addon1">
                                                <i class="fas fa-lock text-dark"></i>
                                            </span>
                                        </div>
                                        <input type="password" class="form-control text-dark" name="password"
                                            aria-label="Username" aria-describedby="basic-addon1"
                                            style="color: black !important;">
                                    </div>
                                </div>
                                <button type="submit" class="btn btn-sm btn-danger" name="simpan">Login</button>
                            </form>
                            <?php
							if (isset($_POST["simpan"])) {
								$email = $_POST["email"];
								$password = $_POST["password"];
								$ambil = $koneksi->query("SELECT * FROM pengguna WHERE email='$email' AND password='$password' LIMIT 1");
								$akunyangcocok = $ambil->num_rows;

								if ($akunyangcocok == 1) {
									$akun = $ambil->fetch_assoc();

									if ($akun['level'] == "Pelanggan") {
										$_SESSION["pengguna"] = $akun;
										echo "<script>alert('Anda sukses login');</script>";
										echo "<script>location ='index.php';</script>";
									} elseif ($akun['level'] == "Admin") {
										$_SESSION['admin'] = $akun;
										echo "<script>alert('Anda sukses login');</script>";
										echo "<script>location ='admin/index.php';</script>";
									} elseif ($akun['level'] == "Pengacara") {
										$_SESSION['admin'] = $akun;
										echo "<script>alert('Anda sukses login');</script>";
										echo "<script>location ='admin/index.php';</script>";
									}
								} else {
									echo "<script>alert('Anda gagal login, Cek akun Anda');</script>";
									echo "<script>location ='login.php';</script>";
								}
							}
							?>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</body>

<script src="assets/js/jquery-3.2.1.min.js"></script>
<script src="assets/js/popper.min.js"></script>
<script src="assets/js/bootstrap.min.js"></script>
<script src="assets/plugins/scroll-fixed/jquery-scrolltofixed-min.js"></script>
<script src="assets/plugins/slider/js/owl.carousel.min.js"></script>
<script src="assets/js/script.js"></script>

</html>