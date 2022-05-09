-- phpMyAdmin SQL Dump
-- version 5.0.4
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: May 09, 2022 at 07:27 PM
-- Server version: 10.4.16-MariaDB
-- PHP Version: 7.4.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `klp9_wp`
--

-- --------------------------------------------------------

--
-- Table structure for table `alternatif`
--

CREATE TABLE `alternatif` (
  `kd_alt` int(11) NOT NULL,
  `nm_alt` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `alternatif`
--

INSERT INTO `alternatif` (`kd_alt`, `nm_alt`) VALUES
(1, 'Tirta Sari'),
(2, 'Pondok Aciak Jaya'),
(3, 'Ampera Bukan Dia'),
(4, 'Warung Buk Lis'),
(5, 'Lidah Bagoyang');

-- --------------------------------------------------------

--
-- Table structure for table `bobot`
--

CREATE TABLE `bobot` (
  `kd_bobot` int(11) NOT NULL,
  `nilai` double NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `bobot`
--

INSERT INTO `bobot` (`kd_bobot`, `nilai`) VALUES
(1, 4),
(2, 5),
(3, 3),
(4, 2),
(5, 3);

-- --------------------------------------------------------

--
-- Table structure for table `data`
--

CREATE TABLE `data` (
  `kd_data` int(11) NOT NULL,
  `kd_alt` int(11) NOT NULL,
  `kd_kri` int(11) NOT NULL,
  `nilai` double NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `data`
--

INSERT INTO `data` (`kd_data`, `kd_alt`, `kd_kri`, `nilai`) VALUES
(1, 1, 1, 3),
(2, 1, 2, 3),
(3, 1, 3, 2),
(4, 1, 4, 3),
(5, 1, 5, 3),
(6, 2, 1, 4),
(7, 2, 2, 3),
(8, 2, 3, 2),
(9, 2, 4, 4),
(10, 2, 5, 3),
(11, 3, 1, 2),
(12, 3, 2, 1),
(13, 3, 3, 2),
(14, 3, 4, 3),
(15, 3, 5, 1),
(16, 4, 1, 2),
(17, 4, 2, 2),
(18, 4, 3, 2),
(19, 4, 4, 2),
(20, 4, 5, 2),
(21, 5, 1, 3),
(22, 5, 2, 2),
(23, 5, 3, 3),
(24, 5, 4, 2),
(25, 5, 5, 2);

-- --------------------------------------------------------

--
-- Table structure for table `kriteria`
--

CREATE TABLE `kriteria` (
  `kd_kri` int(11) NOT NULL,
  `nm_kri` varchar(100) NOT NULL,
  `atribut` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `kriteria`
--

INSERT INTO `kriteria` (`kd_kri`, `nm_kri`, `atribut`) VALUES
(1, 'Variasi Menu', 'benefit'),
(2, 'Harga', 'cost'),
(3, 'Jarak', 'cost'),
(4, 'Daya Tampung', 'benefit'),
(5, 'Fasilitas', 'benefit');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `alternatif`
--
ALTER TABLE `alternatif`
  ADD PRIMARY KEY (`kd_alt`);

--
-- Indexes for table `bobot`
--
ALTER TABLE `bobot`
  ADD PRIMARY KEY (`kd_bobot`);

--
-- Indexes for table `data`
--
ALTER TABLE `data`
  ADD PRIMARY KEY (`kd_data`);

--
-- Indexes for table `kriteria`
--
ALTER TABLE `kriteria`
  ADD PRIMARY KEY (`kd_kri`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
