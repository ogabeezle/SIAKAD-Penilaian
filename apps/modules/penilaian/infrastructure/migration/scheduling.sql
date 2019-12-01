-- phpMyAdmin SQL Dump
-- version 4.9.1
-- https://www.phpmyadmin.net/
--
-- Host: localhost:3306
-- Waktu pembuatan: 28 Nov 2019 pada 06.21
-- Versi server: 5.7.24
-- Versi PHP: 7.2.19

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `scheduling`
--

-- --------------------------------------------------------

--
-- Struktur dari tabel `aktivitas_mengajar`
--

CREATE TABLE `aktivitas_mengajar` (
  `id_dosen` int(10) UNSIGNED NOT NULL,
  `id_kelas` int(10) UNSIGNED NOT NULL,
  `sks_mengajar` int(11) NOT NULL,
  `rencana_tatap_muka` int(11) NOT NULL,
  `realisasi_tatap_muka` int(11) DEFAULT NULL,
  `validasi_tatap_muka` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Struktur dari tabel `dosen`
--

CREATE TABLE `dosen` (
  `id` int(10) UNSIGNED AUTO_INCREMENT NOT NULL,
  `nama` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Struktur dari tabel `jadwal_kelas`
--

CREATE TABLE `jadwal_kelas` (
  `id` int(10) UNSIGNED AUTO_INCREMENT NOT NULL,
  `id_kelas` int(10) UNSIGNED NOT NULL,
  `id_periode_kuliah` int(10) UNSIGNED NOT NULL,
  `id_prasarana` int(10) UNSIGNED NOT NULL,
  `hari` int(10) UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Struktur dari tabel `kelas`
--

CREATE TABLE `kelas` (
  `id` int(10) UNSIGNED AUTO_INCREMENT NOT NULL,
  `id_semester` int(10) UNSIGNED NOT NULL,
  `id_mata_kuliah` int(10) UNSIGNED NOT NULL,
  `nama` varchar(100) NOT NULL,
  `nama_inggris` varchar(100) NOT NULL,
  `daya_tampung` int(11) NOT NULL,
  `jumlah_terisi` int(11) NOT NULL,
  `sks_kelas` int(11) NOT NULL,
  `rencana_tatap_muka` int(11) NOT NULL,
  `realisasi_tatap_muka` int(11) NOT NULL,
  `kelas_jarak_jauh` tinyint(1) NOT NULL,
  `validasi_tatap_muka` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Struktur dari tabel `kuliah`
--

CREATE TABLE `kuliah` (
  `nrp_mahasiswa` char(20) NOT NULL,
  `id_kelas` int(10) UNSIGNED NOT NULL,
  `nilai_angka` int(11) NOT NULL,
  `nilai_huruf` char(2) NOT NULL,
  `lulus` tinyint(1) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Struktur dari tabel `mahasiswa`
--

CREATE TABLE `mahasiswa` (
  `nrp` char(20) NOT NULL,
  `nama` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Struktur dari tabel `mata_kuliah`
--

CREATE TABLE `mata_kuliah` (
  `id` int(10) UNSIGNED AUTO_INCREMENT NOT NULL,
  `kode_matkul` char(10) NOT NULL,
  `nama` varchar(100) NOT NULL,
  `nama_inggris` varchar(100) NOT NULL,
  `sks` int(11) NOT NULL,
  `deskripsi` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Struktur dari tabel `periode_kuliah`
--

CREATE TABLE `periode_kuliah` (
  `id` int(10) UNSIGNED AUTO_INCREMENT NOT NULL,
  `mulai` int(11) NOT NULL,
  `selesai` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Struktur dari tabel `prasarana`
--

CREATE TABLE `prasarana` (
  `id` int(10) UNSIGNED AUTO_INCREMENT NOT NULL,
  `nama` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Struktur dari tabel `semester`
--

CREATE TABLE `semester` (
  `id` int(10) UNSIGNED AUTO_INCREMENT NOT NULL,
  `nama` varchar(100) NOT NULL,
  `singkatan` varchar(10) NOT NULL,
  `tahun_ajaran` int(11) NOT NULL,
  `semester` int(11) NOT NULL,
  `aktif` tinyint(1) NOT NULL,
  `tanggal_mulai` int(11) DEFAULT NULL,
  `tanggal_selesai` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Indexes for dumped tables
--

--
-- Indeks untuk tabel `aktivitas_mengajar`
--
ALTER TABLE `aktivitas_mengajar`
  ADD UNIQUE KEY `id_dosen` (`id_dosen`),
  ADD UNIQUE KEY `id_kelas` (`id_kelas`);


/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
