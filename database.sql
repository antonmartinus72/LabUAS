-- phpMyAdmin SQL Dump
-- version 5.0.3
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jul 21, 2021 at 10:23 AM
-- Server version: 10.4.14-MariaDB
-- PHP Version: 7.4.11

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `kasrt`
--

-- --------------------------------------------------------

--
-- Table structure for table `iuran`
--

CREATE TABLE `iuran` (
  `id` int(11) NOT NULL,
  `keterangan` tinytext NOT NULL,
  `tanggal` date NOT NULL,
  `bulan` int(2) NOT NULL,
  `tahun` year(4) NOT NULL,
  `jumlah` decimal(10,2) NOT NULL,
  `warga_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `iuran`
--

INSERT INTO `iuran` (`id`, `keterangan`, `tanggal`, `bulan`, `tahun`, `jumlah`, `warga_id`) VALUES
(2, 'Iuran Januari', '2021-07-21', 1, 2021, '50000.00', 16),
(3, 'Iuran Februari', '2021-07-21', 2, 2021, '50000.00', 16),
(4, 'Iuran Januari', '2021-07-01', 1, 2021, '50000.00', 2);

-- --------------------------------------------------------

--
-- Table structure for table `warga`
--

CREATE TABLE `warga` (
  `id` int(11) NOT NULL,
  `nik` varchar(50) NOT NULL,
  `nama` varchar(200) NOT NULL,
  `kelamin` enum('L','P') NOT NULL,
  `alamat` tinytext NOT NULL,
  `no_rumah` varchar(10) NOT NULL,
  `status` tinyint(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `warga`
--

INSERT INTO `warga` (`id`, `nik`, `nama`, `kelamin`, `alamat`, `no_rumah`, `status`) VALUES
(2, '31148888', 'Suryono Ningrat', 'L', 'Perumahan Cikarang Baru', 'A3/5', 0),
(3, '31147823', 'Dewi Putri Lestari', 'P', 'Perumahan Cikarang Baru', 'A4/10', 1),
(4, '32134333', 'Suryono', 'L', 'Perumahan Cikarang Baru', 'A5/9', 1),
(5, '32123455', 'Kristanto Malik', 'L', 'Perumahan Cikarang Baru', 'A4/8', 0),
(6, '32312788', 'Ningsing Wahyuningsih', 'P', 'Perumahan Cikarang Baru', 'B2/3', 0),
(7, '31231333', 'Norman Leonardo', 'L', 'Perumahan Cikarang Baru', 'B3/3', 1),
(8, '31231555', 'Citra', 'P', 'Perumahan Cikarang Baru', 'A4/4', 0),
(16, '39987789', 'Rojak Anwar', 'L', 'Perumahan Cikarang Baru', 'A4/64', 1);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `iuran`
--
ALTER TABLE `iuran`
  ADD PRIMARY KEY (`id`),
  ADD KEY `warga_id` (`warga_id`);

--
-- Indexes for table `warga`
--
ALTER TABLE `warga`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `nik` (`nik`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `iuran`
--
ALTER TABLE `iuran`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `warga`
--
ALTER TABLE `warga`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=17;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `iuran`
--
ALTER TABLE `iuran`
  ADD CONSTRAINT `iuran_ibfk_1` FOREIGN KEY (`warga_id`) REFERENCES `warga` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
