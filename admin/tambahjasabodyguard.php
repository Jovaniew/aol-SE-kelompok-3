<div class="row">
    <div class="col-md-12 mb-4">
        <div class="card shadow mb-4">
            <div class="card-header py-3 d-flex flex-row align-items-center justify-content-between">
                <h6 class="m-0 font-weight-bold text-primary">Tambah Bodyguard</h6>
            </div>
            <div class="card-body">
                <form method="post" enctype="multipart/form-data">
                    <div class="form-group">
                        <label>Judul</label>
                        <input type="text" class="form-control" name="judul" required>
                    </div>
                    <div class="form-group">
                        <label>Harga (Rp)</label>
                        <input type="number" class="form-control" name="harga" required>
                    </div>
                    <div class="form-group">
                        <label>Syarat</label>
                        <textarea name="syarat" id="syarat" class="form-control"></textarea>
                    </div>
                    <div class="form-group">
                        <label>Durasi </label>
                        <input type="text" class="form-control" name="durasi" required>
                    </div>

                    <div class="form-group">
                        <label>Rating Bintang</label>
                        <select class="form-control" name="rating" required>
                            <option value="">Pilih Rating</option>
                            <option value="1">1 Bintang</option>
                            <option value="2">2 Bintang</option>
                            <option value="3">3 Bintang</option>
                            <option value="4">4 Bintang</option>
                            <option value="5">5 Bintang</option>
                        </select>
                    </div>

                    <div class="form-group">
                        <label>Foto (Optional)</label>
                        <input type="file" class="form-control" name="foto">
                    </div>

                    <button class="btn btn-primary" name="save"><i class="fas fa-save"></i> Simpan</button>
                </form>
            </div>
        </div>
    </div>
</div>

<script>
CKEDITOR.replace('syarat');
</script>

<?php
if (isset($_POST['save'])) {
	$judul     = $_POST['judul'];
	$harga   = $_POST['harga'];
	$syarat   = $_POST['syarat'];
	$durasi  = $_POST['durasi'];
	$namafoto = null;
	$rating  = $_POST['rating'];

	if (isset($_FILES['foto']) && $_FILES['foto']['error'] === UPLOAD_ERR_OK) {
		$lokasifoto = $_FILES['foto']['tmp_name'];
		$ekstensi = pathinfo($_FILES['foto']['name'], PATHINFO_EXTENSION);
		$namafoto = uniqid('jasabodyguard_', true) . '.' . $ekstensi;

		move_uploaded_file($lokasifoto, "../foto/" . $namafoto);
	}

	$koneksi->query("INSERT INTO jasabodyguard (judul, harga, syarat, durasi, foto, rating)
            VALUES ('$judul', '$harga', '$syarat', '$durasi', '$namafoto','$rating')");

	echo "<script>alert('jasabodyguard Berhasil Ditambahkan');</script>";
	echo "<script>location='index.php?halaman=jasabodyguard';</script>";
}
?>