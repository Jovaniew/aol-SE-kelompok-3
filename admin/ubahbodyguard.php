<?php
// Ambil ID bodyguard dari URL
$idbodyguard = isset($_GET['id']) ? $_GET['id'] : '';

// Ambil data bodyguard dan pengguna berdasarkan ID
$result = $koneksi->query("SELECT * FROM bodyguard WHERE idbodyguard = '$idbodyguard'");
$data = $result->fetch_assoc();

// Jika data tidak ditemukan, arahkan kembali
if (!$data) {
	echo "<script>alert('bodyguard tidak ditemukan');</script>";
	echo "<script>location='index.php?halaman=bodyguard';</script>";
}

if (isset($_POST['save'])) {
	// Data bodyguard
	$nama     = $_POST['nama'];
	// $jenkel   = $_POST['jeniskelamin'];
	// $tempat   = $_POST['tempatlahir'];
	// $tanggal  = $_POST['tanggallahir'];
	$harga    = $_POST['harga'];
	$deskripsi    = $_POST['deskripsi'];
	$rating = $_POST['rating'];

	// Data Pengguna
	// $email         = $_POST['email'];
	// $password      = $_POST['password'] ? $_POST['password'] : $data['password']; // Enkripsi password jika ada perubahan
	// $alamat        = $_POST['alamat'];
	// $telepon       = $_POST['telepon'];

	// Cek apakah email sudah digunakan
	// $email_check = $koneksi->query("SELECT * FROM pengguna WHERE email = '$email' AND id != '" . $data['idpengguna'] . "'");
	// if ($email_check->num_rows > 0) {
	// 	echo "<script>alert('Email sudah digunakan oleh pengguna lain!');</script>";
	// } else {
	// Foto bodyguard
	if ($_FILES['foto']['name']) {
		$lokasifoto = $_FILES['foto']['tmp_name'];
		$ekstensi = pathinfo($_FILES['foto']['name'], PATHINFO_EXTENSION);
		$namafoto = uniqid('bodyguard_', true) . '.' . $ekstensi;
		move_uploaded_file($lokasifoto, "../foto/" . $namafoto);
	} else {
		$namafoto = $data['foto']; // Jika foto tidak diubah, tetap menggunakan foto lama
	}

	// Update data pengguna
	// $koneksi->query("UPDATE pengguna SET nama = '$nama', email = '$email', password = '$password', alamat = '$alamat', telepon = '$telepon', fotoprofil = '$namafoto' WHERE id = '" . $data['idpengguna'] . "'");

	// Update data bodyguard
	$koneksi->query("UPDATE bodyguard SET nama = '$nama', deskripsi = '$deskripsi', harga = '$harga', rating = '$rating', foto = '$namafoto' WHERE idbodyguard = '$idbodyguard'");
	// $koneksi->query("UPDATE bodyguard SET nama = '$nama', jeniskelamin = '$jenkel', tempatlahir = '$tempat', tanggallahir = '$tanggal', harga = '$harga', foto = '$namafoto' WHERE idbodyguard = '$idbodyguard'");

	echo "<script>alert('bodyguard Berhasil Diubah');</script>";
	echo "<script>location='index.php?halaman=bodyguard';</script>";
	// }
}
?>

<div class="row">
    <div class="col-md-12 mb-4">
        <div class="card shadow mb-4">
            <div class="card-header py-3 d-flex flex-row align-items-center justify-content-between">
                <h6 class="m-0 font-weight-bold text-primary">Ubah bodyguard</h6>
            </div>
            <div class="card-body">
                <form method="post" enctype="multipart/form-data">
                    <!-- Form Data bodyguard -->
                    <div class="form-group">
                        <label>Nama bodyguard</label>
                        <input type="text" class="form-control" name="nama" value="<?= $data['nama'] ?>" required>
                    </div>
                    <!-- <div class="form-group">
						<label>Jenis Kelamin</label>
						<select class="form-control" name="jeniskelamin" required>
							<option value="Laki-laki" <?= $data['jeniskelamin'] == 'Laki-laki' ? 'selected' : '' ?>>Laki-laki</option>
							<option value="Perempuan" <?= $data['jeniskelamin'] == 'Perempuan' ? 'selected' : '' ?>>Perempuan</option>
						</select>
					</div>
					<div class="form-group">
						<label>Tempat Lahir</label>
						<input type="text" class="form-control" name="tempatlahir" value="<?= $data['tempatlahir'] ?>" required>
					</div>
					<div class="form-group">
						<label>Tanggal Lahir</label>
						<input type="date" class="form-control" name="tanggallahir" value="<?= $data['tanggallahir'] ?>" required>
					</div> -->
                    <div class="form-group">
                        <label>Harga (Rp)</label>
                        <input type="number" class="form-control" name="harga" value="<?= $data['harga'] ?>" required>
                    </div>
                    <div class="form-group">
                        <label>Deskripsi</label>
                        <textarea class="form-control" name="deskripsi" id="deskripsi"
                            rows="10"><?= $data['deskripsi'] ?></textarea>
                        <script>
                        CKEDITOR.replace('deskripsi');
                        </script>
                    </div>
                    <div class="form-group">
                        <label>Rating Bintang</label>
                        <select class="form-control" name="rating" required>
                            <option value="">Pilih Rating</option>
                            <?php
                                $current_rating = isset($data['rating']) ? intval($data['rating']) : 0;
                                for ($i = 1; $i <= 5; $i++) {
                                    $selected = ($i == $current_rating) ? 'selected' : '';
                                    echo "<option value='{$i}' {$selected}>{$i} Bintang</option>";
                                }
                                ?>
                        </select>
                    </div>
                    <div class="form-group">
                        <label>Foto bodyguard</label>
                        <input type="file" class="form-control" name="foto">
                        <?php if ($data['foto']) { ?>
                        <img src="../foto/<?= $data['foto'] ?>" width="100" class="mt-2">
                        <?php } ?>
                    </div>
                    <!-- 
					<h5>Data Pengguna</h5>

					<div class="form-group">
						<label>Email</label>
						<input type="email" class="form-control" name="email" value="<?= $data['email'] ?>" required>
					</div>
					<div class="form-group">
						<label>Password (Kosongkan jika tidak ingin mengganti)</label>
						<input type="password" class="form-control" name="password">
					</div>
					<div class="form-group">
						<label>Alamat</label>
						<input type="text" class="form-control" name="alamat" value="<?= $data['alamat'] ?>" required>
					</div>
					<div class="form-group">
						<label>Telepon</label>
						<input type="text" class="form-control" name="telepon" value="<?= $data['telepon'] ?>" required>
					</div> -->

                    <button class="btn btn-primary" name="save"><i class="fas fa-save"></i> Simpan</button>
                </form>
            </div>
        </div>
    </div>
</div>