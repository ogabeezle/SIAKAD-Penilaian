-- phpMyAdmin SQL Dump
-- version 4.8.5
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Dec 15, 2019 at 04:02 PM
-- Server version: 10.1.38-MariaDB
-- PHP Version: 7.3.4

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `penilaian`
--
CREATE DATABASE IF NOT EXISTS `penilaian`;
USE `penilaian`;
-- --------------------------------------------------------

--
-- Table structure for table `aktivitas_mengajar`
--

CREATE TABLE `aktivitas_mengajar` (
  `dosen_id` varchar(50) NOT NULL,
  `kelas_id` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `aktivitas_mengajar`
--

INSERT INTO `aktivitas_mengajar` (`dosen_id`, `kelas_id`) VALUES
('dosen1', 'kelas1');
INSERT INTO `aktivitas_mengajar` (`dosen_id`, `kelas_id`) VALUES
('dosen1', 'kelas2');

-- --------------------------------------------------------

--
-- Table structure for table `dosen`
--

CREATE TABLE `dosen` (
  `id` varchar(50) NOT NULL,
  `nama` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `dosen`
--

INSERT INTO `dosen` (`id`, `nama`) VALUES
('dosen1', 'bapak dosen1');

-- --------------------------------------------------------

--
-- Table structure for table `evaluasi_pembelajaran`
--

CREATE TABLE `evaluasi_pembelajaran` (
  `kelas_id` varchar(50) NOT NULL,
  `dosen_id` varchar(50) NOT NULL,
  `jumlah_penilaian` int(11) NOT NULL,
  `nama_evaluasi_1` varchar(20) NOT NULL,
  `persentase_1` decimal(10,2) NOT NULL,
  `nama_evaluasi_2` varchar(20) NOT NULL,
  `persentase_2` decimal(10,2) NOT NULL,
  `nama_evaluasi_3` varchar(20) NOT NULL,
  `persentase_3` decimal(10,2) NOT NULL,
  `nama_evaluasi_4` varchar(20) NOT NULL,
  `persentase_4` decimal(10,2) NOT NULL,
  `nama_evaluasi_5` varchar(20) NOT NULL,
  `persentase_5` decimal(10,2) NOT NULL,
  `nama_evaluasi_6` varchar(20) NOT NULL,
  `persentase_6` decimal(10,2) NOT NULL,
  `nama_evaluasi_7` varchar(20) NOT NULL,
  `persentase_7` decimal(10,2) NOT NULL,
  `nama_evaluasi_8` varchar(20) NOT NULL,
  `persentase_8` decimal(10,2) NOT NULL,
  `is_fixed` tinyint(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `evaluasi_pembelajaran`
--

INSERT INTO `evaluasi_pembelajaran` (`kelas_id`, `dosen_id`, `jumlah_penilaian`, `nama_evaluasi_1`, `persentase_1`, `nama_evaluasi_2`, `persentase_2`, `nama_evaluasi_3`, `persentase_3`, `nama_evaluasi_4`, `persentase_4`, `nama_evaluasi_5`, `persentase_5`, `nama_evaluasi_6`, `persentase_6`, `nama_evaluasi_7`, `persentase_7`, `nama_evaluasi_8`, `persentase_8`, `is_fixed`) VALUES
('kelas1', 'dosen1', 107, 'UTS', '14.00', 'EAS', '14.00', 'eval3', '14.00', 'eval4', '13.00', 'eval5', '13.00', 'eval6', '13.00', 'eval7', '13.00', 'eval8', '13.00', 1),
('kelas2', 'dosen1', 107, 'eval1', '14.00', 'eval2', '14.00', 'eval3', '14.00', 'eval4', '13.00', 'eval5', '13.00', 'eval6', '13.00', 'eval7', '13.00', 'eval8', '13.00', 1);

-- --------------------------------------------------------

--
-- Table structure for table `kelas`
--

CREATE TABLE `kelas` (
  `id` varchar(50) NOT NULL,
  `semester_id` varchar(50) NOT NULL,
  `mata_kuliah_id` varchar(50) NOT NULL,
  `nama` varchar(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `kelas`
--

INSERT INTO `kelas` (`id`, `semester_id`, `mata_kuliah_id`, `nama`) VALUES
('kelas1', 'semester1', 'matakuliah1', 'kelas 1');
INSERT INTO `kelas` (`id`, `semester_id`, `mata_kuliah_id`, `nama`) VALUES
('kelas2', 'semester1', 'matakuliah2', 'kelas 2');

-- --------------------------------------------------------

--
-- Table structure for table `kuliah`
--

CREATE TABLE `kuliah` (
  `nrp` varchar(20) NOT NULL,
  `kelas_id` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `mahasiswa`
--

CREATE TABLE `mahasiswa` (
  `nrp` varchar(20) NOT NULL,
  `nama` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `mahasiswa`
--

INSERT INTO `mahasiswa` (`nrp`, `nama`) VALUES
('5116100097', 'michael'),
('5116100006', 'rahadian'),
('5116100016', 'taufiq');

-- --------------------------------------------------------

--
-- Table structure for table `mata_kuliah`
--

CREATE TABLE `mata_kuliah` (
  `id` varchar(50) NOT NULL,
  `nama` varchar(50) NOT NULL,
  `kode_matkul` varchar(10) NOT NULL,
  `sks` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `mata_kuliah`
--

INSERT INTO `mata_kuliah` (`id`, `nama`, `kode_matkul`, `sks`) VALUES
('matakuliah1', 'matakuliah 1', 'mk1', 4);
INSERT INTO `mata_kuliah` (`id`, `nama`, `kode_matkul`, `sks`) VALUES
('matakuliah2', 'matakuliah 2', 'mk2', 4);

-- --------------------------------------------------------

--
-- Table structure for table `nilai`
--

CREATE TABLE `nilai` (
  `id` varchar(50) NOT NULL,
  `nilai_numerik` decimal(4,2) NOT NULL,
  `nilai_huruf` varchar(5) NOT NULL,
  `batas_atas` decimal(5,2) NOT NULL,
  `batas_bawah` decimal(5,2) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

insert into `nilai`(`id`,`nilai_numerik`,`nilai_huruf`,`batas_atas`,`batas_bawah`) values(1,4,'A',100,86);
insert into `nilai`(`id`,`nilai_numerik`,`nilai_huruf`,`batas_atas`,`batas_bawah`) values(2,3.5,'AB',86,80);
insert into `nilai`(`id`,`nilai_numerik`,`nilai_huruf`,`batas_atas`,`batas_bawah`) values(3,3,'B',80,75);
insert into `nilai`(`id`,`nilai_numerik`,`nilai_huruf`,`batas_atas`,`batas_bawah`) values(4,2.5,'BC',75,61);
insert into `nilai`(`id`,`nilai_numerik`,`nilai_huruf`,`batas_atas`,`batas_bawah`) values(5,2,'C',61,55);
insert into `nilai`(`id`,`nilai_numerik`,`nilai_huruf`,`batas_atas`,`batas_bawah`) values(6,1,'D',55,50);
insert into `nilai`(`id`,`nilai_numerik`,`nilai_huruf`,`batas_atas`,`batas_bawah`) values(7,0,'E',50,0);
-- --------------------------------------------------------

--
-- Table structure for table `nilai_evaluasi_pembelajaran`
--

CREATE TABLE `nilai_evaluasi_pembelajaran` (
  `mahasiswa_id` varchar(50) NOT NULL,
  `kelas_id` varchar(50) NOT NULL,
  `nilai_1` decimal(10,0) NOT NULL,
  `nilai_2` decimal(10,0) NOT NULL,
  `nilai_3` decimal(10,0) NOT NULL,
  `nilai_4` decimal(10,0) NOT NULL,
  `nilai_5` decimal(10,0) NOT NULL,
  `nilai_6` decimal(10,0) NOT NULL,
  `nilai_7` decimal(10,0) NOT NULL,
  `nilai_8` decimal(10,0) NOT NULL,
  `nilai_angka` decimal(10,0) NOT NULL,
  `nilai_huruf` varchar(5) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `nilai_evaluasi_pembelajaran`
--

INSERT INTO `nilai_evaluasi_pembelajaran` (`mahasiswa_id`, `kelas_id`, `nilai_1`, `nilai_2`, `nilai_3`, `nilai_4`, `nilai_5`, `nilai_6`, `nilai_7`, `nilai_8`, `nilai_angka`, `nilai_huruf`) VALUES
('5116100097', 'kelas1', '90', '80', '80', '80', '80', '80', '80', '80', '0', 'AB'),
('5116100006', 'kelas1', '80', '80', '80', '80', '80', '80', '80', '80', '80', 'AB');
INSERT INTO `nilai_evaluasi_pembelajaran` (`mahasiswa_id`, `kelas_id`, `nilai_1`, `nilai_2`, `nilai_3`, `nilai_4`, `nilai_5`, `nilai_6`, `nilai_7`, `nilai_8`, `nilai_angka`, `nilai_huruf`) VALUES
('5116100097', 'kelas2', '90', '80', '80', '80', '80', '80', '80', '80', '0', 'AB'),
('5116100016', 'kelas2', '80', '80', '80', '80', '80', '80', '80', '80', '80', 'AB');

-- --------------------------------------------------------

--
-- Table structure for table `semester`
--

CREATE TABLE `semester` (
  `id` varchar(50) NOT NULL,
  `tahun_ajaran` int(11) NOT NULL,
  `semester` tinyint(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `semester`
--

INSERT INTO `semester` (`id`, `tahun_ajaran`, `semester`) VALUES
('semester1', 2019, 0);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `dosen`
--
ALTER TABLE `dosen`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `evaluasi_pembelajaran`
--
ALTER TABLE `evaluasi_pembelajaran`
  ADD PRIMARY KEY (`kelas_id`);

--
-- Indexes for table `kelas`
--
ALTER TABLE `kelas`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `mahasiswa`
--
ALTER TABLE `mahasiswa`
  ADD PRIMARY KEY (`nrp`);

--
-- Indexes for table `mata_kuliah`
--
ALTER TABLE `mata_kuliah`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `nilai`
--
ALTER TABLE `nilai`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `semester`
--
ALTER TABLE `semester`
  ADD PRIMARY KEY (`id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
