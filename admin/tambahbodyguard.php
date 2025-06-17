<div class="row">
    <div class="col-md-12 mb-4">
        <div class="card shadow mb-4">
            <div class="card-header py-3 d-flex flex-row align-items-center justify-content-between">
                <h6 class="m-0 font-weight-bold text-primary">Tambah bodyguard</h6>
            </div>
            <div class="card-body">
                <form method="post" enctype="multipart/form-data">
                    <div class="form-group">
                        <label>Nama bodyguard</label>
                        <input type="text" class="form-control" name="nama" required>
                    </div>
                    <div class="form-group">
                        <label>Harga (Rp)</label>
                        <input type="number" class="form-control" name="harga" required>
                    </div>
                    <div class="form-group">
                        <label>Deskripsi</label>
                        <textarea class="form-control" name="deskripsi" id="deskripsi" rows="10"></textarea>
                        <script>
                        CKEDITOR.replace('deskripsi');
                        </script>
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
                        <label>Foto bodyguard</label>
                        <input type="file" class="form-control" name="foto" required>
                    </div>
                    <button class="btn btn-primary" name="save"><i class="fas fa-save"></i> Simpan</button>
                </form>
            </div>
        </div>
    </div>
</div>

<?php
if (isset($_POST['save'])) {
	$nama     = $_POST['nama'];
	$deskripsi     = $_POST['deskripsi'];
	$harga    = $_POST['harga'];
	$rating = $_POST['rating'];
	$lokasifoto = $_FILES['foto']['tmp_name'];
	$ekstensi = pathinfo($_FILES['foto']['name'], PATHINFO_EXTENSION);
	$namafoto = uniqid('bodyguard_', true) . '.' . $ekstensi;

	move_uploaded_file($lokasifoto, "../foto/" . $namafoto);

	$koneksi->query("INSERT INTO bodyguard (nama, deskripsi, harga, rating, foto)
            VALUES ('$nama', '$deskripsi', '$harga', '$rating', '$namafoto')");

	echo "<script>alert('bodyguard Berhasil Ditambahkan');</script>";
	echo "<script>location='index.php?halaman=bodyguard';</script>";
	// }
}
?>