<html>
<title>LAPORAN PEMESANAN</title>
<style type="text/css">
    body {
        -webkit-print-color-adjust: exact;
        print-color-adjust: exact;
        padding: 50px;
    }

    #table {
        font-family: "Trebuchet MS", Arial, Helvetica, sans-serif;
        border-collapse: collapse;
    }

    #table td,
    #table th {
        padding: 8px;
        padding-top: 15px;
    }

    #table tr {
        padding-top: 15px;
        padding-bottom: 15px;
    }

    #table tr:nth-child(even) {
        background-color: #f2f2f2;
    }

    #table th {
        padding-top: 15px;
        padding-bottom: 15px;
        text-align: left;
        background-color: #4CAF50;
        color: white;
    }

    .biru {
        background-color: #06bbcc;
        color: white;
    }

    @page {
        size: auto;
        margin: 0;
    }

    .card {
        border: 1px solid #ddd;
        padding: 20px;
        margin-bottom: 20px;
        border-radius: 5px;
    }

    .card-header {
        background-color: #4CAF50;
        color: white;
        padding: 10px;
        font-size: 18px;
        font-weight: bold;
    }

    .table {
        width: 100%;
        border-collapse: collapse;
        margin-top: 20px;
    }

    .table th,
    .table td {
        border: 1px solid #ddd;
        padding: 10px;
        text-align: left;
    }

    .table th {
        background-color: #4CAF50;
        color: white;
    }

    .table img {
        max-width: 100px;
        max-height: 100px;
    }

    .text-right {
        text-align: right;
    }
</style>
<?php
include('../koneksi.php');
// Ambil ID pesanan dari parameter
$idpenjualan = $_GET['id'];

// Query untuk mendapatkan detail pesanan
$ambil = $koneksi->query("SELECT * FROM pemesanan 
    JOIN pengguna ON pemesanan.id = pengguna.id 
    WHERE pemesanan.idpenjualan = '$idpenjualan'");
$detail = $ambil->fetch_assoc();

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

<body>
    <center>
        <table width="500px">
            <tr>
                <td style="padding-right:5px"><img src="../foto/logo.png" width="125"></td>
                <td>
                    <font size="6"><b>Anwar Tailor</b></font><br>
                    <font size="2">Jalan Babakan Tarogong no 443/196B, RT 10 /RW 04. Kel. Babakan Asih Kec. Bojongloa Kaler Kota Bandung, 40232.
                    </font><br>
    </center>
    </td>
    </tr>
    </table>
    <br>
    <center>
        <h4>
            <b>DETAIL DATA PESANAN</b>
        </h4>
    </center>
    <br>
    <div class="card">
        <div class="card-header">Detail Pesanan</div>
        <p><strong>Nama Pemesan:</strong> <?= htmlspecialchars($detail['nama']) ?></p>
        <p><strong>Tanggal Pemesanan:</strong> <?= tanggal($detail['tanggalbeli']) ?></p>
        <p><strong>Total Pembayaran:</strong> Rp. <?= number_format($detail['totalbeli'] + $detail['ongkir']) ?></p>
        <p><strong>Status Pemesanan:</strong> <?= htmlspecialchars($detail['statusbeli']) ?></p>
    </div>

    <table class="table">
        <thead>
            <tr>
                <th>No</th>
                <th>Nama Produk</th>
                <th>Jumlah</th>
                <th>Ukuran</th>
                <th>Jenis Jasa</th>
                <th>Gambar</th>
            </tr>
        </thead>
        <tbody>
            <?php
            $nomor = 1;
            $ambilproduk = $koneksi->query("SELECT * FROM penjualan 
                JOIN produk ON penjualan.idproduk = produk.idproduk 
                WHERE penjualan.idpenjualan = '$idpenjualan'");
            while ($produk = $ambilproduk->fetch_assoc()) { ?>
                <tr>
                    <td><?= $nomor++ ?></td>
                    <td><?= htmlspecialchars($produk['namaproduk']) ?></td>
                    <td><?= $produk['jumlah'] ?></td>
                    <td><?= $produk['ukuran'] ?></td>
                    <td><?= $produk['panjang'] ?></td>
                    <td>
                        <?php
                        if ($produk['jenis'] != 'Custom') {
                        ?>
                            <img src="../foto/<?= htmlspecialchars($produk['fotoproduk']) ?>" alt="Gambar Produk">
                        <?php } else {
                        ?>
                            <img src="../foto/<?= $produk['customerfoto'] ?>" alt="Gambar Produk">
                        <?php } ?>
                    </td>
                </tr>
            <?php } ?>
        </tbody>
    </table>
</body>
<script>
    window.print();
</script>

</html>