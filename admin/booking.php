<div class="row">
	<div class="col-md-12 mb-4">
		<div class="card shadow mb-4">
			<div class="card-header py-3 d-flex flex-row align-items-center justify-content-between">
				<h6 class="m-0 font-weight-bold text-primary">Data Booking</h6>
			</div>
			<div class="card-body">
				<table class="table table-bordered" id="table">
					<thead class="bg-ungu text-white">
						<tr>
							<th>No</th>
							<th>Nama Pengacara</th>
							<th>No Transaksi</th>
							<th>Tanggal Booking</th>
							<th>Catatan</th>
							<th>Status Booking</th>
							<th>Waktu</th>
							<?php
							if ($_SESSION['admin']['level'] == 'Admin' || $_SESSION['admin']['level'] == 'Pengacara') {
							?>
								<th>Aksi</th>
							<?php
							}
							?>
						</tr>
					</thead>
					<tbody>
						<?php $nomor = 1; ?>
						<?php
						// Cek level user yang login
						if ($_SESSION['admin']['level'] == 'Admin') {
							// Jika admin, ambil semua data
							$ambil = $koneksi->query("SELECT * FROM booking JOIN pengacara ON booking.idpengacara = pengacara.idpengacara JOIN pengguna ON booking.id = pengguna.id ORDER BY booking.tanggalbooking DESC, booking.idbooking DESC");
						} elseif ($_SESSION['admin']['level'] == 'Pengacara') {
							// Jika pengacara, ambil data sesuai dengan idpengacara yang login
							$idpengguna = $_SESSION['admin']['id'];

							$query = $koneksi->query("SELECT idpengacara FROM pengacara WHERE idpengguna = '$idpengguna'");
							$pecah = $query->fetch_assoc();
							$idpengacara = $pecah['idpengacara'];

							$ambil = $koneksi->query("SELECT * FROM booking JOIN pengacara ON booking.idpengacara = pengacara.idpengacara JOIN pengguna ON booking.id = pengguna.id WHERE booking.idpengacara = '$idpengacara' ORDER BY booking.tanggalbooking DESC, booking.idbooking DESC");
						}
						?>
						<?php while ($pecah = $ambil->fetch_assoc()) { ?>
							<tr>
								<td><?php echo $nomor; ?></td>
								<td><?php echo $pecah['nama']; ?></td>
								<td><?php echo $pecah['notransaksi']; ?></td>
								<td><?= tanggal(date('Y-m-d', strtotime($pecah['tanggalbooking']))) ?></td>
								<td><?php echo htmlspecialchars($pecah['catatan']); ?></td>
								<td><?php echo $pecah['statusbeli']; ?></td>
								<td><?php echo date('H:i:s', strtotime($pecah['waktu'])); ?></td>
								<?php
								if ($_SESSION['admin']['level'] == 'Admin' || $_SESSION['admin']['level'] == 'Pengacara') {
								?>
									<td>
										<a href="index.php?halaman=detailbooking&id=<?php echo $pecah['idbooking'] ?>" class="btn btn-info m-1">Detail</a>
										<a href="cetakbooking.php?id=<?php echo $pecah['idbooking'] ?>" class="btn btn-warning m-1">Cetak</a>
									</td>
								<?php
								}
								?>
							</tr>
							<?php $nomor++; ?>
						<?php } ?>
					</tbody>
				</table>
			</div>
		</div>
	</div>
</div>