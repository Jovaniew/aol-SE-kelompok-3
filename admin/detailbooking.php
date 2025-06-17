<?php
// error_reporting(E_ALL);
// ini_set('display_errors', 1);
$ambil = $koneksi->query("SELECT * FROM booking JOIN pengguna
	ON booking.id=pengguna.id
	WHERE booking.idbooking='$_GET[id]'");
$detail = $ambil->fetch_assoc();
$id = $_GET['id'];

// Fetch lawyer details
$ambilPengacara = $koneksi->query("SELECT * FROM pengacara WHERE idpengacara='$detail[idpengacara]'");
$pengacara = $ambilPengacara->fetch_assoc();
?>
<div class="row">
	<div class="col-md-12 mb-4">
		<div class="card shadow mb-4">
			<div class="card-header py-3 d-flex flex-row align-items-center justify-content-between">
				<h6 class="m-0 font-weight-bold text-primary">Detail Booking</h6>
			</div>
			<div class="card-body">
				<div class="row">
					<div class="col-md-6">
						<h3>Informasi Booking</h3>
						<hr>
						<strong>ID BOOKING: <?php echo $detail['idbooking']; ?></strong><br>
						<strong>NO TRANSAKSI: <?php echo $detail['notransaksi']; ?></strong><br>
						Tanggal Booking : <?= tanggal(date('Y-m-d', strtotime($detail['tanggalbooking']))) ?><br>
						Waktu : <?php echo $detail['waktu']; ?><br>
						Status : <?php echo $detail['statusbeli']; ?><br>
					</div>
					<div class="col-md-6">
						<h3>Informasi Klien</h3>
						<hr>
						<strong>NAMA : <?php echo $detail['nama']; ?></strong><br>
						Telepon : <?php echo $detail['telepon']; ?><br>
						Email : <?php echo $detail['email']; ?><br>
						Alamat : <?php echo $detail['alamat']; ?><br>
						Catatan : <?php echo $detail['catatan']; ?><br>
					</div>
				</div>
				<br>
				<div class="row">
					<div class="col-md-12">
						<h3>Informasi Pengacara</h3>
						<hr>
						<div class="row">
							<div class="col-md-3">
								<?php if (!empty($pengacara['foto'])): ?>
									<img src="../foto/<?php echo $pengacara['foto']; ?>" class="img-fluid" alt="Foto Pengacara">
								<?php else: ?>
									<p>Tidak ada foto</p>
								<?php endif; ?>
							</div>
							<div class="col-md-9">
								<strong>NAMA : <?php echo $pengacara['nama']; ?></strong><br>
								Jenis Kelamin : <?php echo $pengacara['jeniskelamin']; ?><br>
								Tanggal Lahir : <?= tanggal(date('Y-m-d', strtotime($pengacara['tanggallahir']))) ?><br>
								Tempat Lahir : <?php echo $pengacara['tempatlahir']; ?><br>
								Biaya Konsultasi : Rp. <?php echo number_format($pengacara['harga']); ?><br>
							</div>
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>
</div>

<?php
$idbooking = $_GET['id'];

$am = $koneksi->query("SELECT * FROM booking WHERE idbooking='$idbooking'");
$det = $am->fetch_assoc(); ?>
<?php
$ambil = $koneksi->query("SELECT * FROM pembayaran WHERE idbooking='$idbooking'");
$detail = $ambil->fetch_assoc();
?>
<div class="row">
	<?php if ($det['statusbeli'] != "Selesai" && $det['statusbeli'] != "Belum Bayar") { ?>
		<div class="col-md-12 mb-4">
			<div class="card shadow mb-4">
				<div class="card-header py-3 d-flex flex-row align-items-center justify-content-between">
					<h6 class="m-0 font-weight-bold text-primary">Konfirmasi</h6>
				</div>
				<div class="card-body">
					<div class="row">
						<div class="col-md-12">

							<?php if ($detail) : ?>
								<table class="table">
									<tr>
										<th>Nama</th>
										<th><?php echo $detail['nama'] ?></th>
									</tr>
									<tr>
										<th>Tanggal Transfer</th>
										<th><?= tanggal(date('Y-m-d', strtotime($detail['tanggaltransfer']))) ?></th>
									</tr>
									<tr>
										<th>Tanggal Upload Bukti Pembayaran</th>
										<th><?= tanggal(date('Y-m-d', strtotime($detail['tanggal']))) ?></th>
									</tr>
								</table>
							<?php endif; ?>
							<form method="post">
								<div class="form-group">
									<label>Status</label>
									<select class="form-control" name="statusbeli">
										<?php
										if ($det['statusbeli'] == "Menunggu Konfirmasi Admin") {
										?>
											<option <?php if ($det['statusbeli'] == 'Belum Bayar') echo 'selected'; ?> value="Belum Bayar">Terima Booking</option>
											<option <?php if ($det['statusbeli'] == 'Booking Di Tolak') echo 'selected'; ?> value="Booking Di Tolak">Booking Di Tolak</option>
										<?php
										} else {
										?>
											<option <?php if ($det['statusbeli'] == 'Sudah Upload Bukti Pembayaran') echo 'selected'; ?> value="Sudah Upload Bukti Pembayaran">Belum di Konfirmasi</option>
											<option <?php if ($det['statusbeli'] == 'Di Tolak') echo 'selected'; ?> value="Di Tolak">Booking Di Tolak</option>
											<option <?php if ($det['statusbeli'] == 'Di Terima') echo 'selected'; ?> value="Di Terima">Booking Di Terima</option>
											<option <?php if ($det['statusbeli'] == 'Selesai') echo 'selected'; ?> value="Selesai">Selesai</option>
										<?php } ?>
									</select>
								</div>
								<button class="btn btn-primary float-right pull-right" name="proses">Simpan</button>
								<br>
							</form>
						</div>
					</div>
				</div>
			</div>
		</div>
	<?php } ?>
	<?php if ($detail) : ?>
		<div class="col-md-12 mb-4">
			<div class="card shadow mb-4">
				<div class="card-header py-3 d-flex flex-row align-items-center justify-content-between">
					<h6 class="m-0 font-weight-bold text-primary">Bukti Pembayaran</h6>
				</div>
				<div class="card-body">
					<div class="row">
						<div class="col-md-12">
							<?php if ($detail['bukti']) : ?>
								<img width="50%" src="../foto/<?php echo htmlspecialchars($detail['bukti']); ?>" alt="Bukti Pembayaran" class="img-responsive">
							<?php else : ?>
								<p>-</p>
							<?php endif; ?>
						</div>
					</div>
				</div>
			</div>
		</div>
	<?php endif ?>
</div>

<?php
if (isset($_POST["proses"])) {
	$statusbeli = $_POST["statusbeli"];

	// Ambil status beli sebelumnya
	$statusSebelumnya = $koneksi->query("SELECT statusbeli FROM booking WHERE idbooking='$idbooking'");
	$dataStatusSebelumnya = $statusSebelumnya->fetch_assoc();
	$statusSebelumnya = $dataStatusSebelumnya['statusbeli'];

	$koneksi->query("UPDATE booking SET statusbeli='$statusbeli' WHERE idbooking='$idbooking'");

	echo "<script>alert('Status Booking Berhasil Diupdate')</script>";
	echo "<script>location='index.php?halaman=booking';</script>";
}
?>