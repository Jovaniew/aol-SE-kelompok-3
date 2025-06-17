<?php
include 'koneksi.php';

function rupiah($angka)
{
  $hasilrupiah = "Rp " . number_format($angka, 2, ',', '.');
  return $hasilrupiah;
}
function tanggal($tgl)
{
  $tanggal = substr($tgl, 8, 2);
  $bulan = getBulan(substr($tgl, 5, 2));
  $tahun = substr($tgl, 0, 4);
  return $tanggal . ' ' . $bulan . ' ' . $tahun;
}
function getBulan($bln)
{
  switch ($bln) {
    case 1:
      return "Januari";
      break;
    case 2:
      return "Februari";
      break;
    case 3:
      return "Maret";
      break;
    case 4:
      return "April";
      break;
    case 5:
      return "Mei";
      break;
    case 6:
      return "Juni";
      break;
    case 7:
      return "Juli";
      break;
    case 8:
      return "Agustus";
      break;
    case 9:
      return "September";
      break;
    case 10:
      return "Oktober";
      break;
    case 11:
      return "November";
      break;
    case 12:
      return "Desember";
      break;
  }
}
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <title>GuardIn</title>
    <meta content="width=device-width, initial-scale=1.0" name="viewport">
    <meta content="" name="keywords">
    <meta content="" name="description">

    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link
        href="https://fonts.googleapis.com/css2?family=Roboto:wght@400;500&family=Playfair+Display:wght@600;700&display=swap"
        rel="stylesheet">

    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.10.0/css/all.min.css" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.4.1/font/bootstrap-icons.css" rel="stylesheet">
    <link href="home/lib/animate/animate.min.css" rel="stylesheet">
    <link href="home/lib/owlcarousel/assets/owl.carousel.min.css" rel="stylesheet">
    <link href="home/css/bootstrap.min.css" rel="stylesheet">
    <link href="home/css/style.css" rel="stylesheet">
    <!-- set icon -->
    <link rel="icon" href="foto/iconfav.png" type="image/x-icon">
    <link rel="shortcut icon" href="foto/iconfav.png" type="image/x-icon">
    <link href="https://fonts.googleapis.com/css2?family=Montserrat:ital@1&display=swap" rel="stylesheet">
    <style>
    .whats-app {
        position: fixed;
        width: 50px;
        height: 50px;
        bottom: 40px;
        background-color: #25d366;
        color: #FFF;
        border-radius: 50px;
        text-align: center;
        font-size: 30px;
        box-shadow: 3px 4px 3px #999;
        right: 15px;
        /* Mengubah properti left menjadi right */
        z-index: 100;
    }

    .my-float {
        margin-top: 10px;
    }

    .random-icon {
        position: fixed;
        width: 50px;
        height: 50px;
        bottom: 100px;
        /* Atur posisi sesuai kebutuhan */
        background-color: #FFC107;
        /* Ubah warna sesuai kebutuhan */
        color: #FFF;
        border-radius: 50px;
        text-align: center;
        font-size: 30px;
        box-shadow: 3px 4px 3px #999;
        right: 15px;
        /* Mengatur posisi ke kanan */
        z-index: 100;
    }

    header {
        margin-left: 20px;
        ;

    }
    </style>
</head>

<body>
    <header class="container p-0">
        <section class="container-fluid">
            <div class="row d-flex">
                <div class="col-lg-2">
                    <a href="" style="color:black;">0812192109</a>
                </div>
                <div class="col-lg-2">
                    <a href="" class="mt-4" style="color:#610083;">guardin@gmail.com</a>
                </div>
            </div>
        </section>
    </header>
    <nav class="navbar navbar-expand-lg navbar-dark fixed-top py-lg-0 px-lg-5 wow fadeIn pt-4 bg-navbar text-night"
        data-wow-delay="0.1s">
        <a href="index.php" class="navbar-brand ms-4 ms-lg-0">
            <p style="font-family: 'Montserrat', sans-serif; font-style: italic; font-size: 3em; color: #610083;">
                GuardIn
            </p>
        </a>
        <button type="button" class="navbar-toggler me-4" data-bs-toggle="collapse" data-bs-target="#navbarCollapse">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarCollapse">
            <div class="navbar-nav ms-auto p-4 p-lg-0">
                <a href="index.php" class="nav-item nav-link">Home</a>
                <a href="katalog.php" class="nav-item nav-link">Katalog</a>
                <a href="aboutus.php" class="nav-item nav-link">Tentang Kami</a>
                <a href="galeri.php" class="nav-item nav-link">Galeri</a>
                <a href="kontakkami.php" class="nav-item nav-link">Kontak Kami</a>
                <?php
        if (isset($_SESSION["pengguna"])) { ?>
                <?php
          $id = $_SESSION["pengguna"]['id'];
          $ambil = $koneksi->query("SELECT *FROM pengguna WHERE id='$id'");
          $pecah = $ambil->fetch_assoc(); ?>
                <div class="nav-item dropdown">
                    <a href="#" class="nav-link dropdown-toggle" data-bs-toggle="dropdown">Akun</a>
                    <div class="dropdown-menu m-0">
                        <a href="akun.php" class="dropdown-item">Profil Akun</a>
                        <a href="riwayat.php" class="dropdown-item">Riwayat</a>
                        <a href="logout.php" class="dropdown-item">Keluar</a>
                    </div>
                </div>
                <?php } else { ?>
                <!-- <a href="daftar.php" class="nav-item nav-link">Daftar</a>
          <a href="login.php" class="nav-item nav-link">Login</a> -->
                <?php } ?>
            </div>
        </div>
    </nav>