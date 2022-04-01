-- phpMyAdmin SQL Dump
-- version 4.8.5
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Waktu pembuatan: 20 Jan 2022 pada 06.57
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
-- Database: `db_koperasi`
--

-- --------------------------------------------------------

--
-- Struktur dari tabel `admin`
--

CREATE TABLE `admin` (
  `id_admin` int(11) NOT NULL,
  `username` varchar(50) NOT NULL,
  `password` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `admin`
--

INSERT INTO `admin` (`id_admin`, `username`, `password`) VALUES
(1, 'admin', '123456');

-- --------------------------------------------------------

--
-- Struktur dari tabel `anggota`
--

CREATE TABLE `anggota` (
  `id_anggota` varchar(11) NOT NULL,
  `nama_anggota` varchar(50) NOT NULL,
  `pekerjaan_anggota` varchar(50) NOT NULL,
  `no_telpon` varchar(20) NOT NULL,
  `tanggal_lahir` date NOT NULL,
  `tanggal_daftar` date NOT NULL,
  `alamat_anggota` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `anggota`
--

INSERT INTO `anggota` (`id_anggota`, `nama_anggota`, `pekerjaan_anggota`, `no_telpon`, `tanggal_lahir`, `tanggal_daftar`, `alamat_anggota`) VALUES
('KP001', 'Anton', 'Freelancer', '085655211', '1988-09-12', '2022-01-11', 'Kp.Dangdeur'),
('KP002', 'Udin', 'Wiraswasta', '08211222332', '1970-12-06', '2022-01-12', 'Kp.Cariu');

-- --------------------------------------------------------

--
-- Struktur dari tabel `angsuran`
--

CREATE TABLE `angsuran` (
  `no_transaksi` varchar(11) NOT NULL,
  `no_pinjaman` varchar(20) NOT NULL,
  `angsuran_ke` int(20) NOT NULL,
  `jatuh_tempo` date NOT NULL,
  `tanggal_bayar` date DEFAULT NULL,
  `terlambat` varchar(20) NOT NULL,
  `denda` int(20) NOT NULL,
  `total_bayar` int(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `angsuran`
--

INSERT INTO `angsuran` (`no_transaksi`, `no_pinjaman`, `angsuran_ke`, `jatuh_tempo`, `tanggal_bayar`, `terlambat`, `denda`, `total_bayar`) VALUES
('AG001', 'PJ001', 1, '2022-02-12', '2022-01-12', '0 Hari', 0, 91667),
('AG002', 'PJ001', 2, '2022-03-12', '2022-01-12', '0 Hari', 0, 91667),
('AG003', 'PJ001', 3, '2022-04-12', '2022-01-19', '0 Hari', 0, 91667),
('AG004', 'PJ001', 4, '2022-05-12', '2022-01-19', '0 Hari', 0, 91667),
('AG005', 'PJ001', 5, '2022-06-12', '2022-01-19', '0 Hari', 0, 91667);

-- --------------------------------------------------------

--
-- Struktur dari tabel `pinjaman`
--

CREATE TABLE `pinjaman` (
  `no_pinjaman` varchar(20) NOT NULL,
  `tanggal_pinjaman` date NOT NULL,
  `nama_anggota` varchar(50) NOT NULL,
  `jumlah_pinjaman` int(20) NOT NULL,
  `tenor` varchar(10) NOT NULL,
  `bunga` varchar(10) NOT NULL,
  `jumlah_angsuran` int(20) NOT NULL,
  `status` varchar(20) NOT NULL DEFAULT 'belum lunas'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `pinjaman`
--

INSERT INTO `pinjaman` (`no_pinjaman`, `tanggal_pinjaman`, `nama_anggota`, `jumlah_pinjaman`, `tenor`, `bunga`, `jumlah_angsuran`, `status`) VALUES
('PJ001', '2022-01-12', 'Udin', 500000, '6', '10%', 91667, 'belum lunas');

-- --------------------------------------------------------

--
-- Struktur dari tabel `simpanan`
--

CREATE TABLE `simpanan` (
  `no_transaksi` varchar(11) NOT NULL,
  `nama_anggota` varchar(20) NOT NULL,
  `jumlah_simpanan` int(20) NOT NULL,
  `tanggal_simpanan` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `simpanan`
--

INSERT INTO `simpanan` (`no_transaksi`, `nama_anggota`, `jumlah_simpanan`, `tanggal_simpanan`) VALUES
('SP001', 'Udin', 250000, '2022-01-12'),
('SP002', 'Udin', 350000, '2022-01-12');

-- --------------------------------------------------------

--
-- Struktur dari tabel `staff`
--

CREATE TABLE `staff` (
  `id_staff` varchar(11) NOT NULL,
  `nama_staff` varchar(50) NOT NULL,
  `no_telpon` int(20) NOT NULL,
  `jabatan` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Indexes for dumped tables
--

--
-- Indeks untuk tabel `admin`
--
ALTER TABLE `admin`
  ADD PRIMARY KEY (`id_admin`);

--
-- Indeks untuk tabel `anggota`
--
ALTER TABLE `anggota`
  ADD PRIMARY KEY (`id_anggota`);

--
-- Indeks untuk tabel `angsuran`
--
ALTER TABLE `angsuran`
  ADD PRIMARY KEY (`no_transaksi`);

--
-- Indeks untuk tabel `pinjaman`
--
ALTER TABLE `pinjaman`
  ADD PRIMARY KEY (`no_pinjaman`);

--
-- Indeks untuk tabel `simpanan`
--
ALTER TABLE `simpanan`
  ADD PRIMARY KEY (`no_transaksi`);

--
-- Indeks untuk tabel `staff`
--
ALTER TABLE `staff`
  ADD PRIMARY KEY (`id_staff`);

--
-- AUTO_INCREMENT untuk tabel yang dibuang
--

--
-- AUTO_INCREMENT untuk tabel `admin`
--
ALTER TABLE `admin`
  MODIFY `id_admin` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
