<?php

// Ambil ID bodyguard dari parameter URL
$ambil = $koneksi->query("SELECT * FROM bodyguard WHERE idbodyguard='$_GET[id]'");
$pecah = $ambil->fetch_assoc();
$fotobodyguard = $pecah['foto'];

if (file_exists("../foto/$fotobodyguard")) {
	unlink("../foto/$fotobodyguard");
}

$koneksi->query("DELETE FROM bodyguard WHERE idbodyguard='$_GET[id]'");

echo "<script>alert('bodyguard Berhasil Dihapus');</script>";
echo "<script>location='index.php?halaman=bodyguard';</script>";