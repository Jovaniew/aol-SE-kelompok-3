<?php
session_start();
include 'koneksi.php';
?>

<?php
include 'header.php';
$keyword = !empty($_POST['keyword']) ? $_POST['keyword'] : "";
?>
<div class="container-fluid page-header py-6 wow fadeIn" data-wow-delay="0.1s">
    <div class="container text-center pt-5 pb-3">
        <h1 class="display-4 text-dark animated slideInDown mb-3">Galeri</h1>
        <div class="row justify-content-center align-items-center">
            <div class="col-lg-6 col-md-8 col-sm-10">
                <p class="mb-2 text-dark py-3 text-wrap">jasabodyguard atau pengawal pribadi adalah seseorang yang
                    bertugas
                    melindungi individu dari potensi ancaman, seperti serangan fisik, penculikan, penguntitan, atau
                    tindakan kriminal lainnya.
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
    <div class="container">
        <div class="text-center mx-auto mb-5 wow fadeInUp" data-wow-delay="0.1s" style="max-width: 500px;">
            <h1 class="display-6 mb-4">Cari Jasa Bodyguard</h1>
        </div>
        <div class="row mb-5">
            <div class="col-md-12">
                <form method="post">
                    <div class="row">
                        <div class="col-md-9 my-auto">
                            <div class="form-group">
                                <input type="text" name="keyword" value="<?= htmlspecialchars($keyword) ?>"
                                    placeholder="Masukkan judul atau harga jasa bodyguard" class="form-control">
                            </div>
                        </div>
                        <div class="col-md-3">
                            <button type="submit" name="cari" value="cari" class="btn btn-primary w-100"
                                style="padding:14px">Cari</button>
                        </div>
                    </div>
                </form>
            </div>
        </div>
        <div class="row g-4">
            <?php
        $keyword_safe = $koneksi->real_escape_string($keyword); // Sanitasi input untuk keamanan

        $ambil = $koneksi->query("
            SELECT * FROM jasabodyguard 
            WHERE 
                jasabodyguard.judul LIKE '%$keyword_safe%' 
                OR jasabodyguard.harga LIKE '%$keyword_safe%'
            ORDER BY idjasabodyguard DESC
        ");

        if ($ambil->num_rows > 0) { // Cek apakah ada hasil
            while ($jasabodyguard = $ambil->fetch_assoc()) {
                $idjasabodyguard = htmlspecialchars($jasabodyguard['idjasabodyguard']); // Pastikan ID di-escape
                $foto_src = htmlspecialchars($jasabodyguard['foto']); // Escape judul file foto
                $judul_jasabodyguard = htmlspecialchars($jasabodyguard['judul']); // Escape judul jasabodyguard
                $rating_value = isset($jasabodyguard['rating']) ? intval($jasabodyguard['rating']) : 0; // Ambil rating, default 0

                echo '
                <div class="col-lg-4 col-md-6 wow fadeInUp" data-wow-delay="0.1s">
                    <div class="team-item text-center rounded overflow-hidden">
                        <img style="height: 400px; width:100%; object-fit: cover;" class="img-fluid" src="foto/' . $foto_src . '" alt="Foto jasabodyguard">
                        
                        <div class="d-flex justify-content-center align-items-center py-2" style="background-color: #f8f9fa;">
                            <span class="text-warning me-2">';
                                for ($i = 1; $i <= 5; $i++) {
                                    if ($i <= $rating_value) {
                                        echo '<i class="fas fa-star"></i>'; // Bintang penuh
                                    } else {
                                        echo '<i class="far fa-star"></i>'; // Bintang kosong
                                    }
                                }
                echo '      </span>
                            <span class="text-muted small">' . $rating_value . ' Bintang</span>
                        </div>
                        <div class="team-text">
                            <div class="team-title">
                                <h5>' . $judul_jasabodyguard . '</h5>
                            </div>
                        </div>
                    </div>
                </div>';
            }
        } else {
            echo '<div class="col-12 text-center"><p>Tidak ada jasabodyguard yang ditemukan.</p></div>';
        }
        ?>
        </div>
    </div>
</div>

<?php include 'footer.php'; ?>