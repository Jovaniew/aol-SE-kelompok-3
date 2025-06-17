<?php
session_start();
include 'koneksi.php';

?>
<!doctype html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <title>Konsul Bodyguard</title>
    <link rel="shortcut icon" href="home/img/logo.png" type="image/x-icon">
    <link
        href="https://fonts.googleapis.com/css?family=Open+Sans:300,300i,400,400i,600,600i,700,700i,800,800i&display=swap"
        rel="stylesheet">
    <link rel="shortcut icon" href="home/img/logo.png">
    <link rel="stylesheet" href="assets/css/bootstrap.min.css">
    <link rel="stylesheet" href="assets/css/all.min.css">
    <link rel="stylesheet" href="assets/css/animate.css">
    <link rel="stylesheet" href="assets/plugins/slider/css/owl.carousel.min.css">
    <link rel="stylesheet" href="assets/plugins/slider/css/owl.theme.default.css">
    <link rel="stylesheet" type="text/css" href="assets/css/style.css" />

    <style>
    .form-daftar-body .login-desk .loginform {
        background-color: #4A0083 !important;
    }
    </style>
</head>

<body class="form-daftar-body">
    <div class="container">
        <div class="row">
            <div class="col-lg-10 mx-auto login-desk">
                <div class="row">
                    <div class="col-md-7 detail-box">
                        <div class="detailsh">
                            <img class="help" style="height: 300px;object-fit: cover;" src="home/img/bgee.jpg" alt="">
                            <h3>Konsul Bodyguard</h3>
                        </div>
                    </div>
                    <div class="col-md-5 loginform">
                        <h4>Selamat Datang</h4>
                        <p>Silahkan Login</p>
                        <div class="login-det">
                            <form method="post">
                                <div class="form-row">
                                    <label class="control-label mb-2">Nama</label>
                                    <input type="text" name="nama" class="form-control mb-2" required>
                                </div>
                                <div class="form-row">
                                    <label class="control-label mb-2">Email</label>
                                    <input type="email" name="email" class="form-control mb-2" required>
                                </div>
                                <div class="form-row">
                                    <label class="control-label mb-2">Password</label>
                                    <input type="password" name="password" class="form-control mb-2" required>
                                </div>
                                <div class="form-row">
                                    <label class="control-label mb-2">Alamat</label>
                                    <textarea class="form-control mb-2" name="alamat" required></textarea>
                                </div>
                                <div class="form-row">
                                    <label class="control-label mb-2">Telepon</label>
                                    <input type="text" name="telepon" class="form-control mb-2">
                                </div>

                                <button type="submit" class="btn btn-sm btn-danger mt-3" name="daftar">Daftar</button>
                            </form>
                            <?php
							if (isset($_POST["daftar"])) {
								$nama = $_POST['nama'];
								$email = $_POST['email'];
								$password = $_POST['password'];
								$alamat = $_POST['alamat'];
								$telepon = $_POST['telepon'];
								$nama_provinsi = $_POST['nama_provinsi'];
								$nama_distrik = $_POST['nama_distrik'];
								$ambil = $koneksi->query("SELECT*FROM pengguna 
							WHERE email='$email'");
								$yangcocok = $ambil->num_rows;
								if ($yangcocok == 1) {
									echo "<script>alert('Pendaftaran Gagal, email sudah ada')</script>";
									echo "<script>location='daftar.php';</script>";
								} else {
									$koneksi->query("INSERT INTO pengguna	(nama, email,  password, alamat, telepon, nama_provinsi, nama_distrik, fotoprofil, level)
								VALUES('$nama','$email','$password','$alamat','$telepon', '$nama_provinsi','$nama_distrik','Untitled.png','Pelanggan')");
									echo "<script>alert('Pendaftaran Berhasil')</script>";
									echo "<script>location='login.php';</script>";
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
<script>
$(document).ready(function() {
    $.ajax({
        type: 'post',
        url: 'dataprovinsi.php',
        success: function(hasil_provinsi) {
            $("select[name=nama_provinsi]").html(hasil_provinsi);
        }
    });

    $("select[name=nama_provinsi]").on("change", function() {
        var id_provinsi_terpilih = $("option:selected", this).attr("id_provinsi");
        $.ajax({
            type: 'post',
            url: 'datadistrik.php',
            data: 'id_provinsi=' + id_provinsi_terpilih,
            success: function(hasil_distrik) {
                $("select[name=nama_distrik]").html(hasil_distrik);
            }
        });
    });
});
</script>