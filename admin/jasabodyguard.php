<?php

if ($_SESSION['admin']['level'] != 'Admin') {
	header('Location: /');
	exit();
}
?>

<div class="d-sm-flex align-items-center justify-content-between mb-4">
    <a href="index.php?halaman=tambahjasabodyguard" class="btn btn-sm btn-primary shadow-sm float-right pull-right"><i
            class="fas fa-plus fa-sm text-white-50"></i> Tambah Jasa Bodyguard</a>
</div>
<div class="row">
    <div class="col-md-12 mb-4">
        <div class="card shadow mb-4">
            <div class="card-header py-3 d-flex flex-row align-items-center justify-content-between">
                <h6 class="m-0 font-weight-bold text-primary">Data Bodyguard</h6>
            </div>
            <div class="card-body">
                <table class="table table-bordered table-striped" id="table2">
                    <thead class="bg-ungu text-white">
                        <tr>
                            <th>No</th>
                            <th>Judul</th>
                            <th>Harga</th>
                            <th>Durasi</th>
                            <th>Rating</th>
                            <th>Foto</th>
                            <th>Aksi</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php
						$nomor = 1;
						$ambil = $koneksi->query("SELECT * FROM jasabodyguard");
						?>

                        <?php while ($pecah = $ambil->fetch_assoc()) : ?>
                        <tr>
                            <td><?php echo $nomor; ?></td>
                            <td><?php echo $pecah['judul']; ?></td>
                            <td>Rp <?php echo number_format($pecah['harga'], 0, ',', '.'); ?></td>
                            <td><?php echo $pecah['durasi']; ?></td>
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
                            <td>
                                <img src="../foto/<?php echo $pecah['foto']; ?>" width="100px"
                                    style="border-radius: 10px;">
                            </td>
                            <td>
                                <a href="index.php?halaman=ubahjasabodyguard&id=<?php echo $pecah['idjasabodyguard']; ?>"
                                    class="btn btn-warning m-1">Ubah</a>
                                <a href="index.php?halaman=hapusjasabodyguard&id=<?php echo $pecah['idjasabodyguard']; ?>"
                                    class="btn btn-danger m-1"
                                    onclick="return confirm('Apakah Anda Yakin Ingin Menghapus Data?')">Hapus</a>
                            </td>
                        </tr>
                        <?php
            $nomor++;
        endwhile ?>
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>