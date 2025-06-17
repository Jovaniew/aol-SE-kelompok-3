<div class="row">
	<div class="col-md-12 mb-4">
		<div class="card shadow mb-4">
			<div class="card-header py-3 d-flex flex-row align-items-center justify-content-between">
				<h6 class="m-0 font-weight-bold text-primary">Data Member</h6>
			</div>
			<div class="card-body">
				<table class="table table-bordered" id="table">
					<thead class="bg-ungu text-white">
						<tr>
							<th>No</th>
							<th>Nama</th>
							<th>Email</th>
							<th>Telepon</th>
							<th>Alamat</th>
							<th>Aksi</th>
						</tr>
					</thead>
					<tbody>
						<?php
						// Ambil idpengguna dari session
						$idpengguna = $_SESSION['admin']['id'];

						// Ambil idpengacara berdasarkan idpengguna yang login
						$query = $koneksi->query("SELECT idpengacara FROM pengacara WHERE idpengguna = '$idpengguna'");
						$pecah = $query->fetch_assoc();
						$idpengacara = $pecah['idpengacara'];

						// Query untuk mengambil data pengguna yang sudah di-join dengan booking
						$nomor = 1;
						$ambil = $koneksi->query("
                            SELECT p.*, b.id AS booking_id 
                            FROM pengguna p
                            JOIN booking b ON p.id = b.id 
                            WHERE b.idpengacara = '$idpengacara' 
                            AND b.statusbeli = 'Di Terima'
                            AND p.level = 'Pelanggan'
                        ");

						// Menampilkan hasil query
						while ($pecah = $ambil->fetch_assoc()) {
						?>
							<tr>
								<td><?php echo $nomor; ?></td>
								<td><?php echo $pecah['nama']; ?></td>
								<td><?php echo $pecah['email']; ?></td>
								<td><?php echo $pecah['telepon']; ?></td>
								<td><?php echo $pecah['alamat']; ?></td>
								<td>
									<a href="index.php?halaman=konsultasi&id=<?php echo $pecah['id']; ?>" class="btn btn-primary">Konsultasi</a>
								</td>
							</tr>
						<?php
							$nomor++;
						}
						?>
					</tbody>
				</table>
			</div>
		</div>
	</div>
</div>