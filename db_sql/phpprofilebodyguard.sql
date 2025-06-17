-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1:3308
-- Waktu pembuatan: 07 Jun 2025 pada 08.38
-- Versi server: 10.4.32-MariaDB
-- Versi PHP: 8.2.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `phpprofilebodyguard`
--

-- --------------------------------------------------------

--
-- Struktur dari tabel `bodyguard`
--

CREATE TABLE `bodyguard` (
  `idbodyguard` int(11) NOT NULL,
  `idpengguna` int(11) NOT NULL,
  `nama` varchar(250) NOT NULL,
  `jeniskelamin` varchar(250) NOT NULL,
  `tanggallahir` date NOT NULL,
  `tempatlahir` varchar(255) NOT NULL,
  `foto` text NOT NULL,
  `harga` varchar(255) NOT NULL,
  `deskripsi` text NOT NULL,
  `rating` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data untuk tabel `bodyguard`
--

INSERT INTO `bodyguard` (`idbodyguard`, `idpengguna`, `nama`, `jeniskelamin`, `tanggallahir`, `tempatlahir`, `foto`, `harga`, `deskripsi`, `rating`) VALUES
(9, 0, 'Alex Ferguso', '', '0000-00-00', '', 'bodyguard_683ede538efbb2.69737016.jfif', '1000000', '<p><strong>Perlindungan Fisik:</strong> Melindungi klien dari serangan fisik, penculikan, pengintaian, atau bentuk ancaman langsung lainnya. Ini mungkin melibatkan penempatan diri di antara klien dan potensi bahaya.</p>\r\n', '4'),
(10, 0, 'Sugeng', '', '0000-00-00', '', 'bodyguard_683ede7adfb616.55378589.jpg', '20000000', '<p><strong>Perencanaan Keamanan:</strong> Mengembangkan dan menerapkan rencana keamanan yang komprehensif, termasuk rute aman, prosedur darurat, dan koordinasi dengan penegak hukum atau tim keamanan lainnya.</p>\r\n', '5'),
(11, 0, 'Trisno ', '', '0000-00-00', '', 'bodyguard_683ede9bc21cd4.08020223.webp', '3000000', '<p><strong>Keahlian Khusus:</strong> Seringkali memiliki keahlian dalam pertahanan diri, seni bela diri, penanganan senjata (jika diizinkan), pertolongan pertama, mengemudi defensif, dan komunikasi krisis.</p>\r\n', '5'),
(12, 0, 'Mulyono', '', '0000-00-00', '', 'bodyguard_683edeba284bc8.74951696.webp', '4000000', '<p><strong>Diskreasi dan Profesionalisme:</strong> Menjaga kerahasiaan informasi klien dan bertindak dengan profesionalisme tinggi, seringkali berbaur dengan lingkungan klien tanpa menarik perhatian yang tidak diinginkan.</p>\r\n', '5');

-- --------------------------------------------------------

--
-- Struktur dari tabel `booking`
--

CREATE TABLE `booking` (
  `idbooking` int(11) NOT NULL,
  `idpengacara` int(11) NOT NULL,
  `notransaksi` text NOT NULL,
  `id` int(11) NOT NULL,
  `tanggalbooking` date NOT NULL,
  `catatan` text NOT NULL,
  `statusbeli` text NOT NULL,
  `waktu` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data untuk tabel `booking`
--

INSERT INTO `booking` (`idbooking`, `idpengacara`, `notransaksi`, `id`, `tanggalbooking`, `catatan`, `statusbeli`, `waktu`) VALUES
(10, 3, '#20250415170925', 24, '2025-04-15', 'pak saya ada kasus ketahuan maling mangga tetangga saya', 'Selesai', '2025-04-15 17:09:25');

-- --------------------------------------------------------

--
-- Struktur dari tabel `jasabodyguard`
--

CREATE TABLE `jasabodyguard` (
  `idjasabodyguard` int(11) NOT NULL,
  `judul` varchar(255) NOT NULL,
  `harga` int(11) NOT NULL,
  `syarat` text NOT NULL,
  `durasi` varchar(255) NOT NULL,
  `foto` varchar(255) DEFAULT NULL,
  `rating` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data untuk tabel `jasabodyguard`
--

INSERT INTO `jasabodyguard` (`idjasabodyguard`, `judul`, `harga`, `syarat`, `durasi`, `foto`, `rating`) VALUES
(20, 'Pengawalan', 30000000, '<p>Memberikan pengawalan ekstra dengan menggunakan senjata api laras panjang</p>\r\n', '40', 'jasabodyguard_683edf5a02adc1.62781494.jpg', '5');

-- --------------------------------------------------------

--
-- Struktur dari tabel `pembayaran`
--

CREATE TABLE `pembayaran` (
  `idpembayaran` int(11) NOT NULL,
  `idbooking` int(11) NOT NULL,
  `nama` text NOT NULL,
  `tanggaltransfer` text NOT NULL,
  `tanggal` datetime NOT NULL,
  `bukti` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data untuk tabel `pembayaran`
--

INSERT INTO `pembayaran` (`idpembayaran`, `idbooking`, `nama`, `tanggaltransfer`, `tanggal`, `bukti`) VALUES
(3, 10, 'Fahrul Adib', '2025-04-15', '2025-04-15 00:00:00', '20250415170945logo_optimized_50.png');

-- --------------------------------------------------------

--
-- Struktur dari tabel `pembayaranrekening`
--

CREATE TABLE `pembayaranrekening` (
  `idpembayaranrekening` int(11) NOT NULL,
  `namapembayaran` text NOT NULL,
  `norek` text NOT NULL,
  `atasnama` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data untuk tabel `pembayaranrekening`
--

INSERT INTO `pembayaranrekening` (`idpembayaranrekening`, `namapembayaran`, `norek`, `atasnama`) VALUES
(3, '  Transfer Bank BCA', '0083530291', 'Anwar Musadad'),
(4, '  Transfer Bank Mandiri', '1730013464640', 'Anwar Musadad'),
(5, '  Transfer Bank Seabank', '901289930320', 'Anwar Musadad'),
(6, 'Dana', '085179740603', 'Anwar Musadad');

-- --------------------------------------------------------

--
-- Struktur dari tabel `pengguna`
--

CREATE TABLE `pengguna` (
  `id` int(11) NOT NULL,
  `nama` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `password` text NOT NULL,
  `alamat` text NOT NULL,
  `telepon` varchar(20) NOT NULL,
  `fotoprofil` varchar(255) NOT NULL,
  `level` text NOT NULL,
  `forgot_password_token` text DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Dumping data untuk tabel `pengguna`
--

INSERT INTO `pengguna` (`id`, `nama`, `email`, `password`, `alamat`, `telepon`, `fotoprofil`, `level`, `forgot_password_token`) VALUES
(1, 'Administrator', 'admin@gmail.com', 'admin', 'Jalan Babakan Tarogong no 443/196b', '0812345678', 'Untitled.png', 'Admin', NULL),
(24, 'Fahrul Adib', 'fahruladib9@gmail.com', '123', 'Banyuasin', '082282076702', 'Untitled.png', 'Pelanggan', NULL),
(25, 'Feby Saputra', 'feby@gmail.com', '123', 'Banyuasin', '082673828283', 'pengacara_67fb11e82bf7f2.10344520.jpg', 'Pengacara', NULL),
(26, 'Ketut Diastu, S.H., M.H.', '', '', '', '', 'Untitled.png', 'Pengacara', NULL);

--
-- Indexes for dumped tables
--

--
-- Indeks untuk tabel `bodyguard`
--
ALTER TABLE `bodyguard`
  ADD PRIMARY KEY (`idbodyguard`);

--
-- Indeks untuk tabel `booking`
--
ALTER TABLE `booking`
  ADD PRIMARY KEY (`idbooking`),
  ADD KEY `id` (`id`);

--
-- Indeks untuk tabel `jasabodyguard`
--
ALTER TABLE `jasabodyguard`
  ADD PRIMARY KEY (`idjasabodyguard`);

--
-- Indeks untuk tabel `pembayaran`
--
ALTER TABLE `pembayaran`
  ADD PRIMARY KEY (`idpembayaran`),
  ADD KEY `idbeli` (`idbooking`);

--
-- Indeks untuk tabel `pembayaranrekening`
--
ALTER TABLE `pembayaranrekening`
  ADD PRIMARY KEY (`idpembayaranrekening`);

--
-- Indeks untuk tabel `pengguna`
--
ALTER TABLE `pengguna`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT untuk tabel yang dibuang
--

--
-- AUTO_INCREMENT untuk tabel `bodyguard`
--
ALTER TABLE `bodyguard`
  MODIFY `idbodyguard` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT untuk tabel `booking`
--
ALTER TABLE `booking`
  MODIFY `idbooking` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT untuk tabel `jasabodyguard`
--
ALTER TABLE `jasabodyguard`
  MODIFY `idjasabodyguard` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=21;

--
-- AUTO_INCREMENT untuk tabel `pembayaran`
--
ALTER TABLE `pembayaran`
  MODIFY `idpembayaran` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT untuk tabel `pembayaranrekening`
--
ALTER TABLE `pembayaranrekening`
  MODIFY `idpembayaranrekening` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT untuk tabel `pengguna`
--
ALTER TABLE `pengguna`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=27;

--
-- Ketidakleluasaan untuk tabel pelimpahan (Dumped Tables)
--

--
-- Ketidakleluasaan untuk tabel `booking`
--
ALTER TABLE `booking`
  ADD CONSTRAINT `booking_ibfk_1` FOREIGN KEY (`id`) REFERENCES `pengguna` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Ketidakleluasaan untuk tabel `pembayaran`
--
ALTER TABLE `pembayaran`
  ADD CONSTRAINT `pembayaran_ibfk_1` FOREIGN KEY (`idbooking`) REFERENCES `booking` (`idbooking`) ON DELETE CASCADE ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
