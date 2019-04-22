-- phpMyAdmin SQL Dump
-- version 4.8.5
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Waktu pembuatan: 20 Apr 2019 pada 09.50
-- Versi server: 10.1.38-MariaDB
-- Versi PHP: 7.3.2

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `stpi`
--

-- --------------------------------------------------------

--
-- Struktur dari tabel `amc`
--

CREATE TABLE `amc` (
  `amc_id` int(11) NOT NULL,
  `amc_name` varchar(255) NOT NULL,
  `created_at` datetime NOT NULL,
  `updated_at` datetime NOT NULL,
  `created_by` int(11) NOT NULL,
  `updated_by` int(11) NOT NULL,
  `is_active` tinyint(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data untuk tabel `amc`
--

INSERT INTO `amc` (`amc_id`, `amc_name`, `created_at`, `updated_at`, `created_by`, `updated_by`, `is_active`) VALUES
(1, 'sepatu', '2019-04-05 07:20:18', '2019-04-05 07:20:18', 1, 1, 1);

-- --------------------------------------------------------

--
-- Struktur dari tabel `avseg`
--

CREATE TABLE `avseg` (
  `avseg_id` int(11) NOT NULL,
  `avseg_name` varchar(255) NOT NULL,
  `created_at` datetime NOT NULL,
  `updated_at` datetime NOT NULL,
  `created_by` int(11) NOT NULL,
  `updated_by` int(11) NOT NULL,
  `is_active` tinyint(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `avseg`
--

INSERT INTO `avseg` (`avseg_id`, `avseg_name`, `created_at`, `updated_at`, `created_by`, `updated_by`, `is_active`) VALUES
(1, 'piring', '2019-04-18 10:45:15', '2019-04-18 10:45:15', 1, 1, 1),
(2, 'sendal', '2019-04-19 08:30:30', '2019-04-19 08:30:30', 1, 1, 1);

-- --------------------------------------------------------

--
-- Struktur dari tabel `bangland`
--

CREATE TABLE `bangland` (
  `bangland_id` int(11) NOT NULL,
  `bangland_name` varchar(255) NOT NULL,
  `created_at` datetime NOT NULL,
  `updated_at` datetime NOT NULL,
  `created_by` int(11) NOT NULL,
  `updated_by` int(11) NOT NULL,
  `is_active` tinyint(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data untuk tabel `bangland`
--

INSERT INTO `bangland` (`bangland_id`, `bangland_name`, `created_at`, `updated_at`, `created_by`, `updated_by`, `is_active`) VALUES
(1, 'kursi', '2019-04-05 07:19:57', '2019-04-05 07:19:57', 1, 1, 1);

-- --------------------------------------------------------

--
-- Struktur dari tabel `elband`
--

CREATE TABLE `elband` (
  `elband_id` int(11) NOT NULL,
  `elband_name` varchar(255) NOT NULL,
  `created_at` datetime NOT NULL,
  `updated_at` datetime NOT NULL,
  `created_by` int(11) NOT NULL,
  `updated_by` int(11) NOT NULL,
  `is_active` tinyint(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data untuk tabel `elband`
--

INSERT INTO `elband` (`elband_id`, `elband_name`, `created_at`, `updated_at`, `created_by`, `updated_by`, `is_active`) VALUES
(1, 'kunci', '2019-04-05 06:41:35', '2019-04-05 15:15:37', 1, 2, 1),
(2, 'meja', '2019-04-05 15:42:33', '2019-04-05 15:42:33', 2, 2, 1);

-- --------------------------------------------------------

--
-- Struktur dari tabel `listrik`
--

CREATE TABLE `listrik` (
  `listrik_id` int(11) NOT NULL,
  `listrik_name` varchar(255) NOT NULL,
  `created_at` datetime NOT NULL,
  `updated_at` datetime NOT NULL,
  `created_by` int(11) NOT NULL,
  `updated_by` int(11) NOT NULL,
  `is_active` tinyint(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data untuk tabel `listrik`
--

INSERT INTO `listrik` (`listrik_id`, `listrik_name`, `created_at`, `updated_at`, `created_by`, `updated_by`, `is_active`) VALUES
(1, 'kabel', '2019-04-05 06:41:46', '2019-04-05 06:41:46', 1, 1, 1);

-- --------------------------------------------------------

--
-- Struktur dari tabel `mon_amc`
--

CREATE TABLE `mon_amc` (
  `id` int(11) NOT NULL,
  `amc_id` int(11) NOT NULL,
  `tanggal` date NOT NULL,
  `amc_personil` int(5) NOT NULL,
  `amc_status` varchar(20) NOT NULL,
  `amc_keterangan` varchar(55) NOT NULL,
  `teknisi_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `mon_amc`
--

INSERT INTO `mon_amc` (`id`, `amc_id`, `tanggal`, `amc_personil`, `amc_status`, `amc_keterangan`, `teknisi_id`) VALUES
(1, 1, '0000-00-00', 4, 'serviceable', 'siap', 4),
(2, 1, '2019-04-20', 10, 'unserviceable', 'tidak bagus', 3);

-- --------------------------------------------------------

--
-- Struktur dari tabel `mon_avseg`
--

CREATE TABLE `mon_avseg` (
  `id` int(11) NOT NULL,
  `avseg_id` int(11) NOT NULL,
  `tanggal` date NOT NULL,
  `avseg_personil` int(5) NOT NULL,
  `avseg_status` varchar(20) NOT NULL,
  `avseg_keterangan` varchar(55) NOT NULL,
  `teknisi_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `mon_avseg`
--

INSERT INTO `mon_avseg` (`id`, `avseg_id`, `tanggal`, `avseg_personil`, `avseg_status`, `avseg_keterangan`, `teknisi_id`) VALUES
(1, 1, '2019-04-20', 5, 'serviceable', 'bagus', 1),
(1, 2, '2019-04-20', 5, 'unserviceable', 'gagal juga', 1);

-- --------------------------------------------------------

--
-- Struktur dari tabel `mon_bangland`
--

CREATE TABLE `mon_bangland` (
  `id` int(11) NOT NULL,
  `bangland_id` int(11) NOT NULL,
  `tanggal` date NOT NULL,
  `bangland_personil` int(10) NOT NULL,
  `bangland_status` varchar(20) NOT NULL,
  `bangland_keterangan` varchar(55) NOT NULL,
  `teknisi_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Struktur dari tabel `mon_elband`
--

CREATE TABLE `mon_elband` (
  `id` int(11) NOT NULL,
  `elband_id` int(11) NOT NULL,
  `tanggal` date NOT NULL,
  `elband_personil` int(20) NOT NULL,
  `elband_status` varchar(20) NOT NULL,
  `elband_keterangan` varchar(55) NOT NULL,
  `teknisi_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Struktur dari tabel `mon_listrik`
--

CREATE TABLE `mon_listrik` (
  `id` int(11) NOT NULL,
  `listrik_id` int(11) NOT NULL,
  `tanggal` date NOT NULL,
  `listrik_personil` int(10) NOT NULL,
  `listrik_status` varchar(20) NOT NULL,
  `listrik_keterangan` varchar(55) NOT NULL,
  `teknisi_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Struktur dari tabel `mon_pkppk`
--

CREATE TABLE `mon_pkppk` (
  `id` int(11) NOT NULL,
  `pkppk_id` int(11) NOT NULL,
  `tanggal` date NOT NULL,
  `pkppk_personil` int(11) NOT NULL,
  `pkppk_status` varchar(20) NOT NULL,
  `pkppk_keterangan` varchar(55) NOT NULL,
  `teknisi_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Struktur dari tabel `pkppk`
--

CREATE TABLE `pkppk` (
  `pkppk_id` int(11) NOT NULL,
  `pkppk_name` varchar(255) NOT NULL,
  `created_at` datetime NOT NULL,
  `updated_at` datetime NOT NULL,
  `created_by` int(11) NOT NULL,
  `updated_by` int(11) NOT NULL,
  `is_active` tinyint(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data untuk tabel `pkppk`
--

INSERT INTO `pkppk` (`pkppk_id`, `pkppk_name`, `created_at`, `updated_at`, `created_by`, `updated_by`, `is_active`) VALUES
(1, 'motor', '2019-04-05 07:20:09', '2019-04-05 07:20:09', 1, 1, 1);

-- --------------------------------------------------------

--
-- Struktur dari tabel `teknisi`
--

CREATE TABLE `teknisi` (
  `teknisi_id` int(11) NOT NULL,
  `teknisi_name` varchar(255) NOT NULL,
  `created_at` datetime NOT NULL,
  `updated_at` datetime NOT NULL,
  `created_by` int(11) NOT NULL,
  `updated_by` int(11) NOT NULL,
  `is_active` tinyint(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data untuk tabel `teknisi`
--

INSERT INTO `teknisi` (`teknisi_id`, `teknisi_name`, `created_at`, `updated_at`, `created_by`, `updated_by`, `is_active`) VALUES
(1, 'Agus', '2019-04-05 06:44:05', '2019-04-05 06:44:05', 1, 1, 1),
(3, 'Idham', '2019-04-05 06:44:22', '2019-04-05 06:44:22', 1, 1, 1),
(4, 'ekoAs', '2019-04-17 18:49:17', '2019-04-17 18:49:17', 1, 1, 1);

-- --------------------------------------------------------

--
-- Struktur dari tabel `user`
--

CREATE TABLE `user` (
  `user_id` int(11) NOT NULL,
  `nama` varchar(255) NOT NULL,
  `username` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL,
  `level` varchar(20) NOT NULL,
  `created_at` datetime NOT NULL,
  `updated_at` datetime NOT NULL,
  `created_by` int(11) NOT NULL,
  `updated_by` int(11) NOT NULL,
  `is_active` tinyint(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `user`
--

INSERT INTO `user` (`user_id`, `nama`, `username`, `password`, `level`, `created_at`, `updated_at`, `created_by`, `updated_by`, `is_active`) VALUES
(1, 'agus ', 'agus ', '827ccb0eea8a706c4c34a16891f84e7b', 'ADMIN', '2019-03-31 00:00:00', '2019-03-31 00:00:00', 1, 1, 1),
(2, 'eko', 'eko', '827ccb0eea8a706c4c34a16891f84e7b', 'BANGLAND', '2019-04-05 00:00:00', '2019-04-18 11:18:02', 0, 1, 1),
(3, 'tiar', 'tiar', '827ccb0eea8a706c4c34a16891f84e7b', 'ELBAND', '2019-04-18 08:46:45', '2019-04-18 08:46:45', 1, 1, 1),
(4, 'Topik', 'Topik', '827ccb0eea8a706c4c34a16891f84e7b', 'AVSEG', '2019-04-18 10:10:13', '2019-04-18 10:10:13', 1, 1, 1),
(5, 'pujiyati', 'pujiyati', '827ccb0eea8a706c4c34a16891f84e7b', 'LISTRIK', '2019-04-18 11:16:04', '2019-04-18 11:16:04', 1, 1, 1),
(6, 'herul', 'herul', '827ccb0eea8a706c4c34a16891f84e7b', 'PKPPK', '2019-04-18 11:19:36', '2019-04-18 11:19:36', 1, 1, 1),
(7, 'budi', 'budi', '827ccb0eea8a706c4c34a16891f84e7b', 'AMC', '2019-04-18 11:21:32', '2019-04-18 11:21:32', 1, 1, 1);

--
-- Indexes for dumped tables
--

--
-- Indeks untuk tabel `amc`
--
ALTER TABLE `amc`
  ADD PRIMARY KEY (`amc_id`);

--
-- Indeks untuk tabel `avseg`
--
ALTER TABLE `avseg`
  ADD PRIMARY KEY (`avseg_id`);

--
-- Indeks untuk tabel `bangland`
--
ALTER TABLE `bangland`
  ADD PRIMARY KEY (`bangland_id`);

--
-- Indeks untuk tabel `elband`
--
ALTER TABLE `elband`
  ADD PRIMARY KEY (`elband_id`);

--
-- Indeks untuk tabel `listrik`
--
ALTER TABLE `listrik`
  ADD PRIMARY KEY (`listrik_id`);

--
-- Indeks untuk tabel `mon_amc`
--
ALTER TABLE `mon_amc`
  ADD PRIMARY KEY (`id`,`amc_id`);

--
-- Indeks untuk tabel `mon_avseg`
--
ALTER TABLE `mon_avseg`
  ADD PRIMARY KEY (`id`,`avseg_id`);

--
-- Indeks untuk tabel `mon_bangland`
--
ALTER TABLE `mon_bangland`
  ADD PRIMARY KEY (`id`,`bangland_id`);

--
-- Indeks untuk tabel `mon_elband`
--
ALTER TABLE `mon_elband`
  ADD PRIMARY KEY (`id`,`elband_id`);

--
-- Indeks untuk tabel `mon_listrik`
--
ALTER TABLE `mon_listrik`
  ADD PRIMARY KEY (`id`,`listrik_id`);

--
-- Indeks untuk tabel `mon_pkppk`
--
ALTER TABLE `mon_pkppk`
  ADD PRIMARY KEY (`id`,`pkppk_id`);

--
-- Indeks untuk tabel `pkppk`
--
ALTER TABLE `pkppk`
  ADD PRIMARY KEY (`pkppk_id`);

--
-- Indeks untuk tabel `teknisi`
--
ALTER TABLE `teknisi`
  ADD PRIMARY KEY (`teknisi_id`);

--
-- Indeks untuk tabel `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`user_id`);

--
-- AUTO_INCREMENT untuk tabel yang dibuang
--

--
-- AUTO_INCREMENT untuk tabel `avseg`
--
ALTER TABLE `avseg`
  MODIFY `avseg_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
