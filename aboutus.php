<?php
session_start();
include 'koneksi.php';
include 'header.php';
// $keyword = !empty($_POST['keyword']) ? $_POST['keyword'] : "";
?>
<style>
.card-body .d-flex.align-items-center.mb-2 {
    margin-bottom: 0.5rem;
}

.card-rating-overlay .fas.fa-star,
.card-rating-overlay .far.fa-star {
    color: #ffc107;
}

.card .position-relative img {
    filter: brightness(1);
}

.about-section {
    background-color: #ffffff;
    padding: 6rem 0;
    border-radius: 1rem;
    box-shadow: 0 0.5rem 1rem rgba(0, 0, 0, 0.08);
    margin-top: -50px;
    position: relative;
    z-index: 2;
}

.about-section h2 {
    color: #343a40;
    font-weight: 700;
    margin-bottom: 1.5rem;
}

.about-section p,
.about-section ul {
    color: #555;
    font-size: 1.05rem;
    line-height: 1.8;
    margin-bottom: 1rem;
}

.about-section ul {
    list-style: disc;
    padding-left: 1.5rem;
}

.about-section ul li {
    position: static;
    padding-left: 0;
    margin-bottom: 0.5rem;
}

.about-section .section-icon {
    color: #610083;
    font-size: 1.8em;
    margin-right: 10px;
}

.about-section .list-group-item {
    border: none;
    background-color: transparent;
    padding: 0.5rem 0;
    font-size: 1.05rem;
}

*/
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

<div class="container-fluid p-0 pb-5 wow fadeIn" data-wow-delay="0.1s">
    <div class="owl-carousel header-carousel position-relative">
        <div class="owl-carousel-item position-relative">
            <img class="img-fluid" style="height: 800px;object-fit: cover;" src="foto/bodyguard1.png" alt="">
            <div class="owl-carousel-inner">
                <div class="container">
                    <div class="row justify-content-center text-center">
                        <div class="col-lg-8">
                            <h1 class="text-light text-uppercase fw-bold mb-2">GuardIN</h1>
                            <h1 class="text-light text-uppercase fw-bold mb-2">Tentang Bodyguard Kami</h1>
                            <p class="text-light fs-5 mb-4 pb-3">Guardin adalah penyedia jasa bodyguard profesional yang
                                menawarkan layanan keamanan pribadi untuk individu, eksekutif, hingga acara penting.
                                Dengan tim pengawal terlatih dan berpengalaman, Guardin menjamin perlindungan maksimal,
                                kerahasiaan, serta respons cepat dalam berbagai situasi berisiko tinggi.
                            </p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<div class="container-xxl py-6">
    <div class="container about-section wow fadeInUp" data-wow-delay="0.1s">
        <div class="row justify-content-center">
            <div class="col-lg-10">
                <div class="mb-5">
                    <h2 class="d-flex align-items-center mb-3">
                        <i class="fas fa-lock section-icon"></i> Apa Itu GuardIN?
                    </h2>
                    <p>GuardIN adalah layanan profesional penyedia jasa bodyguard yang bertujuan memberikan perlindungan
                        maksimal bagi individu penting, tokoh publik, hingga eksekutif perusahaan. GuardIN hadir untuk
                        memastikan keamanan Anda dari berbagai risiko seperti serangan fisik, penculikan, penguntitan,
                        atau ancaman lainnya.</p>
                </div>

                <div class="mb-5">
                    <h2 class="d-flex align-items-center mb-3">
                        <i class="fas fa-shield-alt section-icon"></i> Layanan GuardIN
                    </h2>
                    <ul>
                        <li>Pengawalan pribadi untuk aktivitas harian atau acara khusus</li>
                        <li>Deteksi dan penanganan potensi ancaman secara proaktif</li>
                        <li>Perlindungan fisik langsung saat situasi darurat</li>
                        <li>Dukungan koordinasi dengan aparat atau tim keamanan lainnya</li>
                    </ul>
                </div>

                <div class="mb-5">
                    <h2 class="d-flex align-items-center mb-3">
                        <i class="fas fa-award section-icon"></i> Keunggulan GuardIN
                    </h2>
                    <ul>
                        <li>Personel terlatih dalam bela diri, protokol keamanan, dan evakuasi</li>
                        <li>Pengalaman menangani berbagai klien VIP dan situasi berisiko</li>
                        <li>Sikap profesional, sigap, dan menjaga kerahasiaan</li>
                        <li>Strategi perlindungan yang minim konfrontasi namun efektif</li>
                    </ul>
                </div>

                <div>
                    <h2 class="d-flex align-items-center mb-3">
                        <i class="fas fa-handshake section-icon"></i> Kenapa Pilih GuardIN?
                    </h2>
                    <p>GuardIN bukan sekadar jasa pengawal, tapi mitra keamanan terpercaya yang siap menjaga keselamatan
                        Anda dengan pendekatan yang cerdas, taktis, dan manusiawi.</p>
                </div>
            </div>
        </div>
    </div>
</div>

<?php include 'footer.php'; ?>