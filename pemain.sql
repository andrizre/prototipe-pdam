-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Waktu pembuatan: 30 Des 2023 pada 03.37
-- Versi server: 10.4.21-MariaDB
-- Versi PHP: 7.4.24

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `pemain`
--

-- --------------------------------------------------------

--
-- Struktur dari tabel `pemain`
--

CREATE TABLE `pemain` (
  `id` int(11) NOT NULL,
  `nama` varchar(250) NOT NULL,
  `npm` varchar(64) NOT NULL,
  `alamat` varchar(128) NOT NULL,
  `tanggal` varchar(64) NOT NULL,
  `meteran` varchar(128) NOT NULL,
  `pemakaian` varchar(128) NOT NULL,
  `tarif` varchar(128) NOT NULL,
  `tagihan` varchar(24) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `pemain`
--

INSERT INTO `pemain` (`id`, `nama`, `npm`, `alamat`, `tanggal`, `meteran`, `pemakaian`, `tarif`, `tagihan`) VALUES
(1, 'Andrian Rizky', '3211', 'Pasireungit RT/05 RW/02', 'Desember', '100-300', '200', 'Rp, 200.000', 'Lunas'),
(2, 'Raihan Herlambang', '321108', 'Pasireungit', 'Desember', '100-300', '200', 'Rp, 20.000', 'Lunas');

-- --------------------------------------------------------

--
-- Struktur dari tabel `user`
--

CREATE TABLE `user` (
  `id` int(11) NOT NULL,
  `username` varchar(50) NOT NULL,
  `password` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data untuk tabel `user`
--

INSERT INTO `user` (`id`, `username`, `password`) VALUES
(2, 'admin', '$2a$10$MnbFAxpKKx2TMgn.zr.0eebGDtQr7w.w3Goi0QW2eUb1qWVzEBJGO'),
(3, 'user', '$2y$10$87WTueh8Yjn/IWAZpcV0R.n72mHpj7FG/uVpt8Axk.UKsgT4kJF4u'),
(4, 'admin', '$2a$10$MnbFAxpKKx2TMgn.zr.0eebGDtQr7w.w3Goi0QW2eUb1qWVzEBJGO');

--
-- Indexes for dumped tables
--

--
-- Indeks untuk tabel `pemain`
--
ALTER TABLE `pemain`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT untuk tabel yang dibuang
--

--
-- AUTO_INCREMENT untuk tabel `pemain`
--
ALTER TABLE `pemain`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT untuk tabel `user`
--
ALTER TABLE `user`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
