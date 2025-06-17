<?php
session_start();
include 'koneksi.php';
include 'header.php';
// $keyword = !empty($_POST['keyword']) ? $_POST['keyword'] : "";
?>
<style>
.card-body .d-flex.align-items-center.mb-2 {
    margin-bottom: 0.5rem;
    /* Contoh: Tambah margin bawah */
}

.card-rating-overlay .fas.fa-star,
.card-rating-overlay .far.fa-star {
    color: #ffc107;
}

.card .position-relative img {
    filter: brightness(1);
}
</style>


<div class="container-fluid page-header py-6 wow fadeIn" data-wow-delay="0.1s">
    <div class="container text-center pt-5 pb-3">
        <h1 class="display-4 text-dark animated slideInDown mb-3">Pilihan Kami</h1>
        <div class="row justify-content-center align-items-center">
            <div class="col-lg-6 col-md-8 col-sm-10">
                <p class="mb-2 text-dark py-3 text-wrap">Bodyguard atau pengawal pribadi adalah seseorang yang bertugas
                    melindungi
                    individu dari potensi ancaman,
                    seperti serangan fisik, penculikan, penguntitan, atau tindakan kriminal lainnya.
                </p>
            </div>
        </div>
        <nav aria-label="breadcrumb animated slideInDown">
            <ol class="breadcrumb justify-content-center mb-0">
                <li class="breadcrumb-item"><a class="text-dark" href="#">Home</a></li>
                <li class="breadcrumb-item text-primary active" aria-current="page">Katalog</li>
            </ol>
        </nav>
    </div>
</div>

<div class="container-xxl py-6">
    <div class="container py-5">
        <div class="row g-4">
            <?php
        include 'koneksi.php'; // pastikan file koneksi sesuai
        $query = $koneksi->query("SELECT * FROM bodyguard");

        while ($row = $query->fetch_assoc()):
        ?>
            <div class="col-12 col-md-6 col-lg-4 d-flex align-items-stretch">
                <div class="card w-100 border-0 shadow rounded-4">
                    <div class="position-relative" style="height: 250px; overflow: hidden;">
                        <a href="bodyguarddetail.php?id=<?= $row['idbodyguard'] ?>">
                            <img src="foto/<?= $row['foto'] ?>" alt="<?= $row['nama'] ?>" class="w-100 h-100 img-fluid"
                                style="object-fit: cover; filter: brightness(0.95);">
                        </a>
                    </div>
                    <div class="card-body d-flex flex-column justify-content-between">
                        <div class="mb-3">
                            <h5 class="card-title fw-bold text-dark"><?= $row['nama'] ?></h5>

                            <div class="mb-2 text-warning">
                                <?php
                                $rating = isset($row['rating']) ? (int)$row['rating'] : 4;
                                for ($i = 1; $i <= 5; $i++) {
                                    echo $i <= $rating ? '<i class="fas fa-star"></i>' : '<i class="far fa-star"></i>';
                                }
                                ?>
                                <small class="text-muted ms-2">(<?= $rating ?> Ratings)</small>
                            </div>

                            <p class="text-muted mb-1" style="font-size: 14px;"><?= $row['deskripsi'] ?></p>
                            <h6 class="text-danger fw-semibold mt-2">Rp<?= number_format($row["harga"], 0, ',', '.') ?>
                            </h6>
                        </div>

                        <a href="" class="btn btn-danger rounded-pill w-100 mt-auto">
                            Pesan
                        </a>
                    </div>
                </div>
            </div>
            <?php endwhile; ?>
        </div>
    </div>

</div>


<?php include 'footer.php'; ?>