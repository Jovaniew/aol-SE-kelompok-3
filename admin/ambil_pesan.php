<?php
session_start();
include '../koneksi.php';

// Ambil ID Pengguna dan ID Pengacara
$idpengguna = $_SESSION['admin']['id'];
$iduser = $_GET['idpengguna']; // ID pengguna yang ingin dikonsultasikan

// Query untuk mengambil pesan berdasarkan ID Pengguna dan ID Pengacara
$query = $koneksi->query("
    SELECT * FROM chat 
    WHERE (from_user_id = '$idpengguna' AND to_user_id = '$iduser') 
    OR (from_user_id = '$iduser' AND to_user_id = '$idpengguna')
    ORDER BY timestamp ASC
");

// Menyusun data pesan dalam bentuk array
$pesan = [];
while ($row = $query->fetch_assoc()) {
    $pesan[] = [
        'idchat' => $row['idchat'],
        'from_user_id' => $row['from_user_id'],
        'to_user_id' => $row['to_user_id'],
        'kirimpesan' => $row['kirimpesan'],
        'timestamp' => $row['timestamp'],
        'status' => $row['status'],
        'gambar' => $row['gambar'] ? '../uploads/' . $row['gambar'] : ''
    ];
}

// Mengembalikan data pesan dalam format JSON
echo json_encode($pesan);
