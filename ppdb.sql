-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Waktu pembuatan: 06 Apr 2022 pada 12.02
-- Versi server: 10.4.22-MariaDB
-- Versi PHP: 8.1.2

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `ppdb`
--

-- --------------------------------------------------------

--
-- Struktur dari tabel `tbl_admin`
--

CREATE TABLE `tbl_admin` (
  `id_admin` int(11) NOT NULL,
  `nama` varchar(100) DEFAULT NULL,
  `email` varchar(50) DEFAULT NULL,
  `pass` varchar(100) DEFAULT NULL,
  `foto` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `tbl_admin`
--

INSERT INTO `tbl_admin` (`id_admin`, `nama`, `email`, `pass`, `foto`) VALUES
(2, 'halis', 'admin@gmail.com', 'admin', 'foto');

-- --------------------------------------------------------

--
-- Struktur dari tabel `tbl_kelas`
--

CREATE TABLE `tbl_kelas` (
  `id_kelas` int(11) NOT NULL,
  `kelas` varchar(30) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Struktur dari tabel `tbl_orangtua`
--

CREATE TABLE `tbl_orangtua` (
  `id_orgtua` int(11) NOT NULL,
  `id_siswa` int(11) NOT NULL,
  `nama_ayah` varchar(100) DEFAULT NULL,
  `nama_ibu` varchar(100) DEFAULT NULL,
  `alamat_orgtua` text DEFAULT NULL,
  `penghasilan` varchar(50) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Struktur dari tabel `tbl_pengunguman`
--

CREATE TABLE `tbl_pengunguman` (
  `id` int(11) NOT NULL,
  `judul` varchar(100) DEFAULT NULL,
  `pengunguman` text DEFAULT NULL,
  `tgl` date DEFAULT NULL,
  `admin` varchar(50) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `tbl_pengunguman`
--

INSERT INTO `tbl_pengunguman` (`id`, `judul`, `pengunguman`, `tgl`, `admin`) VALUES
(1, 'informasi ppdb', 'loremmmmmmmmmmmmmmmmmmmmmmmmmmmmmmmmmmmmmmm', '2022-03-16', 'halis');

-- --------------------------------------------------------

--
-- Struktur dari tabel `tbl_ruangan`
--

CREATE TABLE `tbl_ruangan` (
  `id_ruangan` int(11) NOT NULL,
  `id_kelas` int(11) NOT NULL,
  `id_siswa` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Struktur dari tabel `tbl_siswa`
--

CREATE TABLE `tbl_siswa` (
  `id_siswa` int(11) NOT NULL,
  `nopen` varchar(50) DEFAULT NULL,
  `namasiswa` varchar(100) DEFAULT NULL,
  `nisn` varchar(20) DEFAULT NULL,
  `jk` varchar(12) DEFAULT NULL,
  `telpon` varchar(12) DEFAULT NULL,
  `asalsekolah` varchar(50) DEFAULT NULL,
  `nilaiakhir` varchar(3) DEFAULT NULL,
  `statusreg` varchar(10) DEFAULT NULL,
  `tgldaftar` date DEFAULT NULL,
  `admindaftar` varchar(20) DEFAULT NULL,
  `statustes` varchar(15) DEFAULT NULL,
  `tgl_statustes` date DEFAULT NULL,
  `admin_statustes` varchar(20) DEFAULT NULL,
  `uplod` text DEFAULT NULL,
  `statusdaftarulang` varchar(20) DEFAULT NULL,
  `tgl_daftarulang` datetime DEFAULT current_timestamp(),
  `admin_daftarulang` varchar(100) DEFAULT NULL,
  `statusakhir` varchar(100) DEFAULT NULL,
  `tgl_statusakhir` date DEFAULT NULL,
  `adminstatusakhir` varchar(100) DEFAULT NULL,
  `catatan` varchar(100) DEFAULT NULL,
  `foto` varchar(50) DEFAULT NULL,
  `tempat_lahir` varchar(50) DEFAULT NULL,
  `tanggal_lahir` date DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Indexes for dumped tables
--

--
-- Indeks untuk tabel `tbl_admin`
--
ALTER TABLE `tbl_admin`
  ADD PRIMARY KEY (`id_admin`);

--
-- Indeks untuk tabel `tbl_kelas`
--
ALTER TABLE `tbl_kelas`
  ADD PRIMARY KEY (`id_kelas`);

--
-- Indeks untuk tabel `tbl_orangtua`
--
ALTER TABLE `tbl_orangtua`
  ADD PRIMARY KEY (`id_orgtua`),
  ADD KEY `tbl_orangtua_ibfk_1` (`id_siswa`);

--
-- Indeks untuk tabel `tbl_pengunguman`
--
ALTER TABLE `tbl_pengunguman`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `tbl_ruangan`
--
ALTER TABLE `tbl_ruangan`
  ADD PRIMARY KEY (`id_ruangan`),
  ADD KEY `ruangan_ibfk_1` (`id_siswa`),
  ADD KEY `ruangan_ibfk_2` (`id_kelas`);

--
-- Indeks untuk tabel `tbl_siswa`
--
ALTER TABLE `tbl_siswa`
  ADD PRIMARY KEY (`id_siswa`);

--
-- AUTO_INCREMENT untuk tabel yang dibuang
--

--
-- AUTO_INCREMENT untuk tabel `tbl_admin`
--
ALTER TABLE `tbl_admin`
  MODIFY `id_admin` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT untuk tabel `tbl_kelas`
--
ALTER TABLE `tbl_kelas`
  MODIFY `id_kelas` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;

--
-- AUTO_INCREMENT untuk tabel `tbl_orangtua`
--
ALTER TABLE `tbl_orangtua`
  MODIFY `id_orgtua` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=23;

--
-- AUTO_INCREMENT untuk tabel `tbl_pengunguman`
--
ALTER TABLE `tbl_pengunguman`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT untuk tabel `tbl_ruangan`
--
ALTER TABLE `tbl_ruangan`
  MODIFY `id_ruangan` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT untuk tabel `tbl_siswa`
--
ALTER TABLE `tbl_siswa`
  MODIFY `id_siswa` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=31;

--
-- Ketidakleluasaan untuk tabel pelimpahan (Dumped Tables)
--

--
-- Ketidakleluasaan untuk tabel `tbl_orangtua`
--
ALTER TABLE `tbl_orangtua`
  ADD CONSTRAINT `tbl_orangtua_ibfk_1` FOREIGN KEY (`id_siswa`) REFERENCES `tbl_siswa` (`id_siswa`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Ketidakleluasaan untuk tabel `tbl_ruangan`
--
ALTER TABLE `tbl_ruangan`
  ADD CONSTRAINT `tbl_ruangan_ibfk_1` FOREIGN KEY (`id_siswa`) REFERENCES `tbl_siswa` (`id_siswa`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `tbl_ruangan_ibfk_2` FOREIGN KEY (`id_kelas`) REFERENCES `tbl_kelas` (`id_kelas`) ON DELETE CASCADE ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
