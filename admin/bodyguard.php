<?php
if ($_SESSION['admin']['level'] == 'Admin') {
?>
<div class="d-sm-flex align-items-center justify-content-between mb-4">
    <a href="index.php?halaman=tambahbodyguard" class="btn btn-sm btn-primary shadow-sm float-right pull-right"><i
            class="fas fa-plus fa-sm text-white-50"></i> Tambah bodyguard</a>
</div>
<?php
}
?>
<div class="row">
    <div class="col-md-12 mb-4">
        <div class="card shadow mb-4">
            <div class="card-header py-3 d-flex flex-row align-items-center justify-content-between">
                <h6 class="m-0 font-weight-bold text-primary">Data bodyguard</h6>
            </div>
            <div class="card-body">
                <table class="table table-bordered table-striped" id="table">
                    <thead class="bg-ungu text-white">
                        <tr>
                            <th>No</th>
                            <th>Nama</th>
                            <th>Foto</th>
                            <th>Harga</th>
                            <th>Rating</th>
                            <?php if ($_SESSION['admin']['level'] == 'Admin') { ?>
                            <th>Aksi</th>
                            <?php } ?>
                        </tr>
                    </thead>
                    <tbody>
                        <?php
						$nomor = 1;
						$ambil = $koneksi->query("SELECT *
                            FROM bodyguard");
						while ($pecah = $ambil->fetch_assoc()) {
							$today = new DateTime();
							$birthDate = new DateTime($pecah['tanggallahir']);
							$umur = $today->diff($birthDate)->y;
						?>
                        <tr>
                            <td><?php echo $nomor; ?></td>
                            <td><?php echo $pecah['nama']; ?></td>
                            <!-- <td><?php echo $pecah['jeniskelamin']; ?></td>
								<td><?php echo $pecah['tempatlahir'] . ', ' . date('d-m-Y', strtotime($pecah['tanggallahir'])); ?></td>
								<td><?php echo $umur . ' tahun'; ?></td> -->
                            <td><img src="../foto/<?php echo $pecah['foto']; ?>" width="100px"
                                    style="border-radius: 10px;"></td>
                            <td>Rp <?php echo number_format($pecah['harga'], 0, ',', '.'); ?></td>
                            <!-- <td><?php echo $pecah['email']; ?></td>
								<td><?php echo $pecah['telepon']; ?></td> -->
                            <td>
                                <?php
								$rating_value = intval($pecah['rating']);
								for ($i = 1; $i <= 5; $i++) {
									if ($i <= $rating_value) {
										echo '<i class="fas fa-star text-warning"></i>'; 
									} else {
										echo '<i class="far fa-star text-secondary"></i>'; 
									}
								}
								?>
                            </td>
                            <?php if ($_SESSION['admin']['level'] == 'Admin') { ?>
                            <td>
                                <a href="index.php?halaman=ubahbodyguard&id=<?php echo $pecah['idbodyguard']; ?>"
                                    class="btn btn-warning m-1">Ubah</a>
                                <a href="index.php?halaman=hapusbodyguard&id=<?php echo $pecah['idbodyguard']; ?>"
                                    class="btn btn-danger m-1"
                                    onclick="return confirm('Apakah Anda Yakin Ingin Menghapus Data?')">Hapus</a>
                            </td>
                            <?php } ?>
                        </tr>
                        <?php $nomor++;
						} ?>
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>