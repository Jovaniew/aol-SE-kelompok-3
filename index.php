<?php
session_start();
include 'koneksi.php';
?>

<?php include 'header.php';
 ?>
<div class="container-fluid p-0 pb-5 wow fadeIn" data-wow-delay="0.1s">
    <div class="owl-carousel header-carousel position-relative">
        <div class="owl-carousel-item position-relative">
            <img class="img-fluid" style="height: 800px;object-fit: cover;" src="foto/bodyguard.png" alt="">
            <div class="owl-carousel-inner">
                <div class="container">
                    <div class="row justify-content-center text-center">
                        <div class="col-lg-8">
                            <h1 class="text-primary text-uppercase fw-bold mb-2">Selamat Datang Di</h1>
                            <h1 class="text-primary text-uppercase fw-bold mb-2">Website GuardIn</h1>
                            <p class="text-light fs-5 mb-4 pb-3">Temukan berbagai pilihan bodyguard yang akan memulai
                                dan menjaga hari Anda dengan sempurna.</p>
                            <a href="" class="btn btn-danger rounded-pill py-3 px-5">Lihat
                                BodyGuard</a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<div class="container-xxl py-2">
    <div class="container">
        <div class="row g-4 justify-content-center align-items-center">
            <div class="col-lg-12 mb-4 text-center">
                <h1 class="fw-bold"> Telusuri Body Guard</h1>
            </div>
            <div class="col-lg-4 col-md-6 mb-4">
                <div class="card-member elegant-card text-center ">
                    <h4 class="fw-bold text-dark mb-1">Pelatihan Bela Diri</h4>
                    <p class="text-dark fw-light" style="margin-top: 50px;"> Mengawal klien dalam berbagai aktivitas,
                        seperti perjalanan ke kantor, acara sosial, atau pertemuan bisnis.</p>
                    <button class="btn btn-danger">
                        Jelajahi Body Guard
                    </button>
                </div>
            </div>

            <div class="col-lg-4 col-md-6 mb-4">
                <div class="card-member elegant-card text-center ">
                    <h4 class="fw-bold text-dark mb-1">Kemampuan Menembak</h4>
                    <p class="text-dark fw-lighter" style="margin-top: 50px;">Selalu waspada terhadap lingkungan sekitar
                        untuk mengidentifikasi perilaku mencurigakan dan ancaman.
                    </p>
                    <button class="btn btn-danger">
                        Jelajahi Body Guard
                    </button>
                </div>
            </div>

            <div class="col-lg-4 col-md-6 mb-4">
                <div class="card-member elegant-card text-center ">
                    <h4 class="fw-bold text-dark mb-1">Analisis Resiko</h4>
                    <p class="text-dark fw-lighter" style="margin-top: 50px;">Melakukan penilaian terhadap potensi
                        ancaman yang mungkin dihadapi
                        klien dan merancang rencana keamanan yang sesuai.</p>
                    <div class="text-center">
                        <button class="btn btn-danger">
                            Jelajahi Body Guard
                        </button>
                    </div>
                </div>
            </div>

        </div>
    </div>
</div>

<div class="container-xxl py-6">
    <div class="container">
        <div class="row g-5">
            <div class="col-lg-6 wow fadeInUp" data-wow-delay="0.1s">
                <img class="img-fluid rounded" style="object-fit:cover;" src="foto/guard.webp" alt="">
            </div>
            <div class="col-lg-6 my-auto wow fadeInUp" data-wow-delay="0.5s">
                <div class="h-100">
                    <h1 class="display-6 mb-4">Kami Menyediakan </h1>
                    <h1 class="display-6 mb-4 -mt-4"> Jasa BodyGuard</h1>
                    <p>
                        Menawarkan layanan bodyguard harian dengan proses pemesanan mudah, harga terjangkau, dan sistem
                        pembayaran yang aman. Layanan tersedia 24 jam dan dapat dipesan melalui WhatsApp di
                        085311111678.
                    </p>
                    <button class="btn btn-success py-3" style="width:200px; border-radius:10px;">
                        <a href="" class="text-light">Baca Selengkapnya</a>
                    </button>
                </div>
            </div>
        </div>
    </div>
</div>

<div class="container-xxl py-6">
    <div class="container">
        <div class="row g-2">
            <div class="col-12 text-center mx-auto mb-5 wow fadeInUp" data-wow-delay="0.1s" style="max-width: 500px;">
                <p class="text-primary text-uppercase mb-2">BodyGuard</p>
                <h1 class="display-6 mb-4 text-center">Pilihan Body Guard</h1>
            </div>
        </div>
        <div class="row g-4">
            <?php
            $query_bodyguard = $koneksi->query("SELECT * FROM bodyguard ORDER BY idbodyguard DESC LIMIT 3");
            if ($query_bodyguard->num_rows > 0) {
                while ($data_bodyguard = $query_bodyguard->fetch_assoc()) {
                    ?>
            <div class="col-lg-4 col-md-6 wow fadeInUp" data-wow-delay="0.1s">
                <div class="custom-service-card rounded overflow-hidden h-100">
                    <div class="position-relative">
                        <img style="height: 400px; width:100%; object-fit: cover;" class="img-fluid"
                            src="foto/<?= htmlspecialchars($data_bodyguard['foto']) ?>" alt="Foto Bodyguard">
                        <div class="card-rating-info w-100 py-2 d-flex justify-content-start align-items-start">
                            <span class="text-warning me-2">
                                <?php
                                        $current_rating = intval($data_bodyguard['rating']);
                                        for ($i = 1; $i <= 5; $i++) {
                                            if ($i <= $current_rating) {
                                                echo '<i class="fas fa-star"></i>'; 
                                            } else {
                                                echo '<i class="far fa-star"></i>'; 
                                            }
                                        }
                                        ?>
                            </span>
                            <span class="text-muted small"><?= htmlspecialchars($current_rating) ?> Bintang</span>
                        </div>
                    </div>
                    <div class="p-4 text-center">
                        <h5 class="fw-bold mb-2"><?= htmlspecialchars($data_bodyguard['nama']) ?></h5>
                        <p class="mb-3"><?= $data_bodyguard['deskripsi'] ?> </p>
                        <div class="d-flex justify-content-between align-items-center mt-auto pt-3">
                            <h4 class="text-primary mb-0 me-2">
                                Rp<?= number_format($data_bodyguard['harga'], 0, ',', '.') ?></h4>
                            <button class="btn btn-primary">
                                <a href="" class="btn btn-purple rounded-pill px-4 py-2">Pesan</a>
                            </button>
                        </div>
                    </div>
                </div>
            </div>
            <?php
                }
            } else {
                echo '<div class="col-12 text-center"><p>Belum ada data Body Guard yang tersedia.</p></div>';
            }
            ?>
        </div>
    </div>
</div>

<?php
include 'footer.php';
?>