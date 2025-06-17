<?php
include 'koneksi.php';
?>

<div class="container-fluid container-footer bg-dark text-light footer my-6 mb-0 py-5 wow fadeIn" data-wow-delay="0.1s">
    <div class="container py-5">
        <div class="row g-5">

            <div class="col-lg-3 col-md-6">
                <h4 class="mb-4"
                    style="font-family: 'Montserrat', sans-serif; font-style: italic; font-size: 2.5em; color: #610083;">
                    GuardIn
                </h4>
                <p>
                    Bodyguard adalah seseorang yang bertugas melindungi individu dari ancaman fisik seperti serangan,
                    penculikan, atau pelecehan.
                </p>
                <div class="d-flex mt-4"> <a class="social-icon-circle me-3" href="https://wa.me/6281292263232"
                        aria-label="Instagram"><i class="fab fa-instagram"></i></a>
                    <a class="social-icon-circle" href="https://facebook.com/guardin" aria-label="Facebook"><i
                            class="fab fa-facebook"></i></a>
                </div>
            </div>

            <div class="col-lg-3 col-md-6">
                <h4 class="text-light mb-4">Halaman</h4>
                <a class="btn btn-link" href="index.php">Home</a>
                <a class="btn btn-link" href="jasahukum.php">Katalog</a>
                <a class="btn btn-link" href="pengacara.php">Tentang Kami</a>
                <a class="btn btn-link" href="galeri.php">Galeri</a> <a class="btn btn-link" href="kontak.php">Kontak
                    Kami</a>
            </div>

            <div class="col-lg-3 col-md-6">
                <h4 class="text-light mb-4">Kontak</h4>
                <p class="mb-2"><i class="fas fa-phone-alt me-3"></i> <a href="tel:+6281281443480"
                        class="text-light text-decoration-none">0812-8144-3480</a></p>
                <p class="mb-2"><i class="fas fa-envelope me-3"></i> <a href="mailto:Guardin@gmail.com"
                        class="text-light text-decoration-none">Guardin@gmail.com</a></p>
            </div>

            <div class="col-lg-3 col-md-6">
                <h4 class="text-light mb-4">Galeri</h4>
                <div class="row g-2">
                    <?php
                        $query_foto_galeri = $koneksi->query("SELECT foto FROM bodyguard WHERE foto IS NOT NULL AND foto != '' ORDER BY idbodyguard DESC LIMIT 4");
                        if ($query_foto_galeri->num_rows > 0) {
                            $nomor_foto = 1; 
                            while ($data_foto = $query_foto_galeri->fetch_assoc()) {
                                ?>
                    <div class="col-6<?php if ($nomor_foto > 2) echo ' mt-2'; ?>">
                        <a href="foto/<?= htmlspecialchars($data_foto['foto']) ?>"
                            class="gallery-item d-block overflow-hidden rounded" data-lightbox="footer-gallery">
                            <img style="object-fit:cover; height:150px; width:200px;"
                                src="foto/<?= htmlspecialchars($data_foto['foto']) ?>" class="img-fluid"
                                alt="Galeri GuardIN <?= $nomor_foto ?>">
                        </a>
                    </div>
                    <?php
                                $nomor_foto++;
                            }
                        } else {
                            echo '<div class="col-12"><p class="text-light-50">Belum ada foto di galeri.</p></div>';
                        }
                        ?>
                </div>
            </div>

        </div>
    </div>
</div>

<div class="container-fluid copyright text-light py-4 wow fadeIn" data-wow-delay="0.1s">
    <div class="container">
        <div class="row">
            <div class="col-md-6 text-center text-md-start mb-3 mb-md-0">
                Copyright &copy; 2025 GuardIn
            </div>
        </div>
    </div>
</div>


<script src="https://code.jquery.com/jquery-3.4.1.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0/dist/js/bootstrap.bundle.min.js"></script>
<script src="home/lib/wow/wow.min.js"></script>
<script src="home/lib/easing/easing.min.js"></script>
<script src="home/lib/waypoints/waypoints.min.js"></script>
<script src="home/lib/counterup/counterup.min.js"></script>
<script src="home/lib/owlcarousel/owl.carousel.min.js"></script>
<script src="home/js/main.js"></script>
<script>
$(document).ready(function() {
    $('.scroll-button').click(function() {
        var target = $(this).data('scroll-to');
        var position = 0;

        if (target === 'middle') {
            position = $('.container').offset().top;
        } else if (target === 'bottom') {
            position = $(document).height();
        }

        $('html, body').animate({
            scrollTop: position
        }, 1000);
    });
});
</script>
</body>

</html>