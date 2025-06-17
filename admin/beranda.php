<?php
$bodyguard = $koneksi->query("SELECT * FROM bodyguard");
$jumlahbodyguard = $bodyguard->num_rows;

$member = $koneksi->query("SELECT * FROM pengguna WHERE level = 'Pelanggan'");
$jumlahmember = $member->num_rows;

$booking = $koneksi->query("SELECT * FROM booking");
$jumlahbooking = $booking->num_rows;

$tahunini = date('Y');
$bulanini = date('m');

$bulan = 1;
$penjualangrafik = array();
$bookinggrafik = array();
while ($bulan <= 12) {
    // Booking per bulan
    $bookingQuery = $koneksi->query("SELECT * FROM booking WHERE MONTH(tanggalbooking) = '$bulan' AND YEAR(tanggalbooking) = '$tahunini' AND statusbeli != 'Menunggu Konfirmasi Admin' AND statusbeli != 'Belum Bayar' AND statusbeli != 'Pesanan Di Tolak'");
    // Count the total number of bookings in this month
    $totalPenjualan = $bookingQuery->num_rows;  // Counting the rows in the query result
    $penjualangrafik[] = $totalPenjualan;
    $bulan++;
}
?>
<br>
<div class="row mb-3">
    <div class="col-md-12">
        <center>
            <img src="../foto/bodyguard.png" width="200px" height="200px;" style="border-radius: 10px">
        </center>
    </div>
</div>
<br>

<div class="row">
    <?php if ($_SESSION['admin']['level'] == "Admin") { ?>
    <div class="col-xl-6 col-md-6 mb-4">
        <div class="card border-left-info shadow h-100 py-2">
            <div class="card-body">
                <div class="row no-gutters align-items-center">
                    <div class="col mr-2">
                        <div class="text-xs font-weight-bold text-warning text-uppercase mb-1">
                            Jumlah bodyguard</div>
                        <div class="h5 mb-0 font-weight-bold text-gray-800"><?= $jumlahbodyguard ?></div>
                    </div>
                    <div class="col-auto">
                        <i class="fas fa-user-tie fa-2x text-gray-300"></i>
                    </div>
                </div>
                <a href="index.php?halaman=bodyguard" class="btn btn-primary mt-3 btn-sm">Lihat Selengkapnya</a>
            </div>
        </div>
    </div>
    <?php } ?>
    <div class="col-xl-6 col-md-6 mb-4">
        <div class="card border-left-info shadow h-100 py-2">
            <div class="card-body">
                <div class="row no-gutters align-items-center">
                    <div class="col mr-2">
                        <div class="text-xs font-weight-bold text-warning text-uppercase mb-1">
                            Jumlah Member</div>
                        <div class="h5 mb-0 font-weight-bold text-gray-800"><?= $jumlahmember ?></div>
                    </div>
                    <div class="col-auto">
                        <i class="fas fa-users fa-2x text-gray-300"></i>
                    </div>
                </div>
                <a href="index.php?halaman=pengguna" class="btn btn-primary mt-3 btn-sm">Lihat Selengkapnya</a>
            </div>
        </div>
    </div>
    <div class="col-xl-6 col-md-6 mb-4">
        <div class="card border-left-warning shadow h-100 py-2">
            <div class="card-body">
                <div class="row no-gutters align-items-center">
                    <div class="col mr-2">
                        <div class="text-xs font-weight-bold text-warning text-uppercase mb-1">
                            Jumlah Transaksi</div>
                        <div class="h5 mb-0 font-weight-bold text-gray-800"><?= $jumlahbooking ?></div>
                    </div>
                    <div class="col-auto">
                        <i class="fas fa-shopping-cart fa-2x text-gray-300"></i>
                    </div>
                </div>
                <a href="index.php?halaman=booking" class="btn btn-primary mt-3 btn-sm">Lihat Selengkapnya</a>
            </div>
        </div>
    </div>
</div>

<!-- Grafik Penjualan -->
<div class="row">
    <div class="col-xl-12 col-md-12 mb-4">
        <div class="card shadow mb-4">
            <div class="card-header py-3">
                <h6 class="m-0 font-weight-bold text-primary">Grafik Booking Per Bulan (Tahun <?php echo $tahunini; ?>)
                </h6>
            </div>
            <div class="card-body">
                <canvas id="penjualanGrafik" width="100%" height="50"></canvas>
            </div>
        </div>
    </div>
</div>

<script src="https://cdn.jsdelivr.net/npm/chart.js"></script>

<script>
var ctx = document.getElementById('penjualanGrafik').getContext('2d');
var chart = new Chart(ctx, {
    type: 'line', // Tipe grafik
    data: {
        labels: ['Jan', 'Feb', 'Mar', 'Apr', 'Mei', 'Jun', 'Jul', 'Aug', 'Sep', 'Okt', 'Nov', 'Des'],
        datasets: [{
            label: 'Total Booking (Transaksi)',
            data: <?php echo json_encode($penjualangrafik); ?>,
            backgroundColor: 'rgba(0, 123, 255, 0.2)',
            borderColor: 'rgba(0, 123, 255, 1)',
            borderWidth: 1
        }]
    },
    options: {
        responsive: true,
        scales: {
            y: {
                beginAtZero: true
            }
        }
    }
});
</script>