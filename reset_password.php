<?php
session_start();
include 'koneksi.php';

if (isset($_GET['token'])) {
    $token = $_GET['token'];

    // Cek token di database
    $ambil = $koneksi->query("SELECT * FROM pengguna WHERE forgot_password_token='$token' LIMIT 1");
    $akun = $ambil->fetch_assoc();

    if ($akun) {
        if (isset($_POST['reset_password'])) {
            $new_password = $_POST['new_password'];
            $confirm_password = $_POST['confirm_password'];

            // Validasi password
            if ($new_password == $confirm_password) {
                // Update password di database dan hapus token
                $koneksi->query("UPDATE pengguna SET password='$new_password', forgot_password_token=NULL WHERE forgot_password_token='$token'");

                echo "<script>alert('Password Anda telah berhasil direset. Silakan login menggunakan password baru.');</script>";
                echo "<script>location='login.php';</script>";
            } else {
                echo "<script>alert('Password dan konfirmasi password tidak cocok.');</script>";
            }
        }
    } else {
        echo "<script>alert('Token tidak valid atau sudah kadaluarsa.');</script>";
        echo "<script>location='login.php';</script>";
    }
}
?>

<!doctype html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <title>Reset Password - Konsul Pengacara</title>
    <link rel="shortcut icon" href="home/img/logo.png" type="image/x-icon">
    <link href="https://fonts.googleapis.com/css?family=Open+Sans:300,300i,400,400i,600,600i,700,700i,800,800i&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="assets/css/bootstrap.min.css">
    <link rel="stylesheet" href="assets/css/all.min.css">
    <link rel="stylesheet" href="assets/css/animate.css">
    <link rel="stylesheet" href="assets/plugins/slider/css/owl.carousel.min.css">
    <link rel="stylesheet" href="assets/plugins/slider/css/owl.theme.default.css">
    <link rel="stylesheet" type="text/css" href="assets/css/style.css" />

    <style>
        .form-login-body .login-desk .loginform {
            background-color: #4A0083 !important;
        }
    </style>
</head>

<body class="form-login-body">
    <div class="container">
        <div class="row">
            <div class="col-lg-10 mx-auto login-desk">
                <div class="row">
                    <div class="col-md-7 detail-box">
                        <center>
                            <img class="logo" src="home/img/logo.png" alt="">
                        </center>
                        <div class="detailsh">
                            <img class="help" style="height: 300px;object-fit: cover;" src="home/img/bgee.jpg" alt="">
                            <h3>Konsul Pengacara</h3>
                        </div>
                    </div>
                    <div class="col-md-5 loginform">
                        <h4>Reset Password</h4>
                        <p>Masukkan password baru Anda</p>
                        <div class="login-det">
                            <form method="post">
                                <div class="form-row">
                                    <label for="">Password Baru</label>
                                    <div class="input-group mb-3">
                                        <div class="input-group-prepend">
                                            <span class="input-group-text" id="basic-addon1">
                                                <i class="fas fa-lock text-dark"></i>
                                            </span>
                                        </div>
                                        <input type="password" class="form-control" name="new_password" placeholder="Password baru" required>
                                    </div>
                                </div>
                                <div class="form-row">
                                    <label for="">Konfirmasi Password</label>
                                    <div class="input-group mb-3">
                                        <div class="input-group-prepend">
                                            <span class="input-group-text" id="basic-addon1">
                                                <i class="fas fa-lock text-dark"></i>
                                            </span>
                                        </div>
                                        <input type="password" class="form-control" name="confirm_password" placeholder="Konfirmasi password baru" required>
                                    </div>
                                </div>
                                <button type="submit" class="btn btn-sm btn-danger" name="reset_password">Reset Password</button>
                            </form>
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