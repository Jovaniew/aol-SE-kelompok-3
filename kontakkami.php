<?php
session_start();
include 'koneksi.php';
?>

<?php
include 'header.php';
?>

<style>
.contact-form-card {
    background-color: #ffffff;
    border-radius: 1rem;
    box-shadow: 0 0.8rem 1.5rem rgba(0, 0, 0, 0.08);
    margin-top: -50px;
    position: relative;
    z-index: 2;
}

.contact-form-card .form-control {
    border: 1px solid #dee2e6;
    padding: 1rem 0.75rem;
    height: 58px;
    border-radius: 0.5rem;
}

.contact-form-card .form-control:focus {
    border-color: #610083;
    box-shadow: 0 0 0 0.25rem rgba(97, 0, 131, 0.25);
}

.contact-form-card .form-floating label {
    padding-top: 1.5rem;
    color: #6c757d;
}

.contact-form-card textarea.form-control {
    height: 150px !important;
    resize: vertical;
}

.contact-form-card h2 {
    color: #343a40;
    /* Warna teks gelap */
}

.contact-form-card p.text-muted {
    font-size: 1rem;
    color: #6c757d !important;
}

.info-box {
    border: 1px solid rgba(0, 0, 0, 0.08);
    transition: all 0.3s ease;
    background-color: #ffffff;
}

.info-box:hover {
    transform: translateY(-5px);
    box-shadow: 0 0.8rem 1.5rem rgba(0, 0, 0, 0.1) !important;
}

.info-box h5 {
    color: #610083;
    font-size: 1.25rem;
}

.info-box p {
    font-size: 1.05rem;
    color: #555;
}

.btn-danger:hover {
    background-color: red !important;
}


@media (max-width: 991.98px) {
    .page-header {
        min-height: 300px;
    }

    .page-header h1 {
        font-size: 2.5rem;
    }

    .contact-form-card {
        margin-top: 0;
    }

    .info-box {
        margin-bottom: 1.5rem;
    }
}

@media (max-width: 767.98px) {
    .page-header {
        min-height: 250px;
    }

    .contact-form-card {
        padding: 2rem;
    }

    .info-box {
        padding: 1.5rem;
    }
}

@media (max-width: 575.98px) {

    .page-header h1 {
        font-size: 2rem;
    }

    .page-header p {
        font-size: 1rem;
    }

    .btn-success {
        padding: 0.6rem 1.5rem;
        font-size: 0.9rem;
    }
}
</style>

<div class="container-xxl py-6 wow fadeIn" data-wow-delay="0.1s">
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-lg-8">
                <div class="contact-form-card rounded-4 shadow-lg p-5">
                    <div class="text-center mb-4">
                        <h2 class="display-6 fw-bold mb-3" style="color: #343a40;">Hubungi Kami</h2>
                        <p class="text-muted">Isi formulir di bawah ini untuk pertanyaan atau kebutuhan lainnya.</p>
                    </div>
                    <form action="#" method="POST">
                        <div class="row g-3">
                            <div class="col-md-6">
                                <div class="form-floating">
                                    <input type="text" class="form-control" id="name" name="name"
                                        placeholder="Masukkan nama Anda" required>
                                    <label for="name">Nama</label>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-floating">
                                    <input type="email" class="form-control" id="email" name="email"
                                        placeholder="Masukkan Email Anda" required>
                                    <label for="email">Email</label>
                                </div>
                            </div>
                            <div class="col-12">
                                <div class="form-floating">
                                    <input type="text" class="form-control" id="subject" name="subject"
                                        placeholder="Tulis Subjek" required>
                                    <label for="subject">Subjek</label>
                                </div>
                            </div>
                            <div class="col-12">
                                <div class="form-floating">
                                    <textarea class="form-control" placeholder="Tulis pesan Anda..." id="message"
                                        name="message" style="height: 150px" required></textarea>
                                    <label for="message">Pesan</label>
                                </div>
                            </div>
                            <div class="col-12 text-center">
                                <button class="btn btn-success py-3 px-5 rounded-pill" type="submit">Kirim</button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>

        <div class="row mt-5 justify-content-center text-center">
            <div class="col-lg-10">
                <div class="row g-4">
                    <div class="col-md-4">
                        <div class="info-box p-4 rounded-4 shadow-sm bg-white h-100">
                            <h5 class="fw-bold text-dark mb-3"><i class="fas fa-phone-alt me-2"></i> Nomor HP</h5>
                            <p class="mb-0">0812-8144-3480</p>
                        </div>
                    </div>
                    <div class="col-md-4">
                        <div class="info-box p-4 rounded-4 shadow-sm bg-white h-100">
                            <h5 class="fw-bold text-dark mb-3"><i class="fas fa-clock me-2"></i> Jam Buka</h5>
                            <p class="mb-0">24 Jam</p>
                        </div>
                    </div>
                    <div class="col-md-4">
                        <div class="info-box p-4 rounded-4 shadow-sm bg-white h-100">
                            <h5 class="fw-bold text-dark mb-3"><i class="fas fa-map-marker-alt me-2"></i> Lokasi</h5>
                            <p class="mb-1">Jl. Sudirman No. 10, Jakarta Pusat</p>
                            <p class="mb-0">Website: <a href="http://www.guardin.co.id"
                                    class="text-dark text-decoration-none">www.guardin.co.id</a></p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<?php
include 'footer.php';
?>