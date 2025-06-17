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
        <h1 class="display-4 text-dark animated slideInDown mb-3">Tentang Kami</h1>
        <div class="row justify-content-center align-items-center">
            <div class="col-lg-6 col-md-8 col-sm-10">
                <p class="mb-2 text-dark py-3 text-wrap">Bodyguard atau pengawal pribadi adalah seseorang yang bertugas
                    melindungi individu dari potensi ancaman, seperti serangan fisik, penculikan, penguntitan, atau
                    tindakan kriminal lainnya.
                </p>
            </div>
        </div>
        <nav aria-label="breadcrumb animated slideInDown">
            <ol class="breadcrumb justify-content-center mb-0">
                <li class="breadcrumb-item"><a class="text-dark" href="#">Home</a></li>
                <li class="breadcrumb-item text-primary active" aria-current="page">Tentang Kami</li>
            </ol>
        </nav>
    </div>
</div>

<div class="container-fluid">

</div>

<?php include 'footer.php'; ?>