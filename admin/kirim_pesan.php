<?php
session_start();
include '../koneksi.php';

// Cek apakah pengguna sudah login
if (!isset($_SESSION['admin'])) {
    echo "<script> alert('Anda belum login');</script>";
    echo "<script> location ='login.php';</script>";
}

// Ambil ID Pengguna dan ID Pengacara
$idpengacara = $_SESSION['admin']['id'];
$iduser = $_POST['idpengguna']; // ID pengguna yang dikonsultasikan

// Menangani upload gambar 
$gambar = '';
if (isset($_FILES['image']) && $_FILES['image']['error'] == 0) {
    $targetDir = "../uploads/";
    $targetFile = $targetDir . basename($_FILES["image"]["name"]);
    $imageFileType = strtolower(pathinfo($targetFile, PATHINFO_EXTENSION));

    // Cek apakah file gambar valid
    if (getimagesize($_FILES["image"]["tmp_name"]) !== false) {
        if (move_uploaded_file($_FILES["image"]["tmp_name"], $targetFile)) {
            $gambar = basename($_FILES["image"]["name"]);
        } else {
            $gambar = ''; // Jika upload gagal
        }
    } else {
        $gambar = ''; // Jika file bukan gambar
    }
}

// Insert pesan ke database
$message = $_POST['message'];
$query = $koneksi->prepare("INSERT INTO chat (from_user_id, to_user_id, kirimpesan, timestamp, status, gambar) VALUES (?, ?, ?, NOW(), 'unread', ?)");
$query->bind_param("iiss", $idpengacara, $iduser, $message, $gambar);
$query->execute();

echo "Pesan terkirim!";
