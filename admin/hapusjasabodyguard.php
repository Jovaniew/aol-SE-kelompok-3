<?php

$ambil = $koneksi->query("SELECT * FROM jasabodyguard WHERE idjasabodyguard='$_GET[id]'");
$pecah = $ambil->fetch_assoc();
$foto = $pecah['foto'];

if (file_exists("../foto/$foto")) {
	unlink("../foto/$foto");
}

$koneksi->query("DELETE FROM jasabodyguard WHERE idjasabodyguard='$_GET[id]'");

echo "<script>alert('jasabodyguard Berhasil Dihapus');</script>";
echo "<script>location='index.php?halaman=jasabodyguard';</script>";