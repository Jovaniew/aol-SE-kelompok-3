<?php
$idjasa = isset($_GET['id']) ? $_GET['id'] : '';

$result = $koneksi->query("SELECT * FROM jasabodyguard WHERE idjasabodyguard = '$idjasa'");
$data = $result->fetch_assoc();
if (!$data) {
	echo "<script>alert('jasabodyguard tidak ditemukan');</script>";
	echo "<script>location='index.php?halaman=jasabodyguard';</script>";
}

if (isset($_POST['save'])) {
	$judul     = $_POST['judul'];
	$harga   = $_POST['harga'];
	$syarat   = $_POST['syarat'];
	$durasi  = $_POST['durasi'];
    $rating = $_POST['rating'];

	$namafoto = $data['foto'];

	if (isset($_FILES['foto']) && $_FILES['foto']['error'] === UPLOAD_ERR_OK) {
		if ($namafoto && file_exists("../foto/$namafoto")) {
			unlink("../foto/$namafoto");
		}

		$lokasifoto = $_FILES['foto']['tmp_name'];

		$ekstensi = pathinfo($_FILES['foto']['name'], PATHINFO_EXTENSION);
		$namafoto = uniqid('jasabodyguard_', true) . '.' . $ekstensi;

		move_uploaded_file($lokasifoto, "../foto/" . $namafoto);
	}

	$koneksi->query("UPDATE jasabodyguard SET judul = '$judul', harga = '$harga', syarat = '$syarat', durasi = '$durasi', rating = '$rating', foto = '$namafoto' WHERE idjasabodyguard = '$data[idjasabodyguard]'");

	echo "<script>alert('jasabodyguard Berhasil Diubah');</script>";
	echo "<script>location='index.php?halaman=jasabodyguard';</script>";
}
?>

<div class="row">
    <div class="col-md-12 mb-4">
        <div class="card shadow mb-4">
            <div class="card-header py-3 d-flex flex-row align-items-center justify-content-between">
                <h6 class="m-0 font-weight-bold text-primary">Ubah Jasa Bodyguard</h6>
            </div>
            <div class="card-body">
                <form method="post" enctype="multipart/form-data">
                    <div class="form-group">
                        <label>Judul</label>
                        <input value="<?= htmlspecialchars($data['judul']) ?>" type="text" class="form-control"
                            name="judul" required>
                    </div>
                    <div class="form-group">
                        <label>Harga (Rp)</label>
                        <input value="<?= htmlspecialchars($data['harga']) ?>" type="number" class="form-control"
                            name="harga" required>
                    </div>
                    <div class="form-group">
                        <label>Syarat</label>
                        <textarea name="syarat" id="syarat"
                            class="form-control"><?= htmlspecialchars($data['syarat']) ?></textarea>
                    </div>
                    <div class="form-group">
                        <label>Durasi </label>
                        <input value="<?= htmlspecialchars($data['durasi']) ?>" type="text" class="form-control"
                            name="durasi" required>
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
                        <label>Foto (Optional)</label>
                        <input type="file" class="form-control" name="foto">
                        <?php if (!empty($data['foto'])) { ?> <img src="../foto/<?= htmlspecialchars($data['foto']) ?>"
                            width="100" class="mt-2" style="border-radius: 5px;">
                        <?php } else { ?>
                        <p class="mt-2 text-muted">Belum ada foto.</p>
                        <?php } ?>
                    </div>

                    <button class="btn btn-primary" name="save"><i class="fas fa-save"></i> Simpan Perubahan</button>
                </form>
            </div>
        </div>
    </div>
</div>

<script>
CKEDITOR.replace('syarat');
</script>