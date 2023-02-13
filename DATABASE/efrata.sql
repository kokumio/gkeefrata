-- phpMyAdmin SQL Dump
-- version 4.9.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Waktu pembuatan: 26 Jan 2023 pada 08.58
-- Versi server: 10.4.8-MariaDB
-- Versi PHP: 7.3.11

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `efrata`
--

-- --------------------------------------------------------

--
-- Struktur dari tabel `bulanan`
--

CREATE TABLE `bulanan` (
  `id_user` int(20) NOT NULL,
  `id_pb` int(11) NOT NULL,
  `tgl_pb` date NOT NULL,
  `uraian_pb` varchar(200) NOT NULL,
  `masuk` int(11) NOT NULL,
  `waktu_pb` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Struktur dari tabel `dana_kas`
--

CREATE TABLE `dana_kas` (
  `id_user` int(20) NOT NULL,
  `id_kas` int(11) NOT NULL,
  `tgl_kas` date NOT NULL,
  `uraian_kas` varchar(200) NOT NULL,
  `masuk` int(11) NOT NULL,
  `keluar` int(11) NOT NULL,
  `jenis` enum('Masuk','Keluar') NOT NULL,
  `waktu` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `dana_kas`
--

INSERT INTO `dana_kas` (`id_user`, `id_kas`, `tgl_kas`, `uraian_kas`, `masuk`, `keluar`, `jenis`, `waktu`) VALUES
(0, 1, '2023-01-16', 'Dana Penopang', 0, 400000, 'Keluar', '2023-01-17 15:03:07'),
(2, 0, '2023-01-26', 'Parapah', 200000, 0, 'Masuk', '2023-01-26 07:53:47'),
(2, 0, '2023-01-26', 'Parapah', 200000, 0, 'Masuk', '2023-01-26 07:53:47');

-- --------------------------------------------------------

--
-- Struktur dari tabel `dana_sosial`
--

CREATE TABLE `dana_sosial` (
  `id_user` int(20) NOT NULL,
  `id_ds` int(11) NOT NULL,
  `tgl_ds` date NOT NULL,
  `uraian_ds` varchar(200) NOT NULL,
  `masuk` int(11) NOT NULL,
  `keluar` int(11) NOT NULL,
  `jenis` enum('Masuk','Keluar') NOT NULL,
  `waktu` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `dana_sosial`
--

INSERT INTO `dana_sosial` (`id_user`, `id_ds`, `tgl_ds`, `uraian_ds`, `masuk`, `keluar`, `jenis`, `waktu`) VALUES
(1, 0, '2023-01-02', 'Dana Penopang 5 Jiwa', 5000000, 0, 'Masuk', '2023-01-26 07:38:53'),
(2, 1, '2023-01-13', 'Kapakat I', 1000000, 0, 'Masuk', '2023-01-26 07:38:29'),
(1, 0, '2023-01-02', 'Dana Penopang 5 Jiwa', 5000000, 90000, 'Keluar', '2023-01-26 07:38:53'),
(2, 0, '2023-01-26', 'Dana Penopang 5 Jiwa', 0, 6000000, 'Keluar', '2023-01-26 07:54:32'),
(1, 0, '2023-01-25', 'Dana Penopang ', 200000, 0, 'Masuk', '2023-01-26 07:54:49');

-- --------------------------------------------------------

--
-- Struktur dari tabel `perpuluhan`
--

CREATE TABLE `perpuluhan` (
  `id_user` int(20) NOT NULL,
  `id_pul` int(11) NOT NULL,
  `tgl_pul` date NOT NULL,
  `uraian_pul` varchar(200) NOT NULL,
  `masuk` int(11) NOT NULL,
  `waktu_pul` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Struktur dari tabel `tb_pengguna`
--

CREATE TABLE `tb_pengguna` (
  `id_pengguna` int(11) NOT NULL,
  `nama_pengguna` varchar(30) NOT NULL,
  `username` varchar(20) NOT NULL,
  `password` varchar(20) NOT NULL,
  `level` enum('Administrator','Bendahara') NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `tb_pengguna`
--

INSERT INTO `tb_pengguna` (`id_pengguna`, `nama_pengguna`, `username`, `password`, `level`) VALUES
(1, 'Antoni Sephtianus', 'bendahara', 'bendahara', 'Bendahara'),
(2, 'Meisa', 'admin', 'admin', 'Administrator');

--
-- Indexes for dumped tables
--

--
-- Indeks untuk tabel `bulanan`
--
ALTER TABLE `bulanan`
  ADD PRIMARY KEY (`id_user`);

--
-- Indeks untuk tabel `perpuluhan`
--
ALTER TABLE `perpuluhan`
  ADD PRIMARY KEY (`id_user`);

--
-- Indeks untuk tabel `tb_pengguna`
--
ALTER TABLE `tb_pengguna`
  ADD PRIMARY KEY (`id_pengguna`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
