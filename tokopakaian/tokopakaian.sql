-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jul 02, 2022 at 09:34 AM
-- Server version: 10.4.24-MariaDB
-- PHP Version: 8.1.6

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `tokopakaian`
--

-- --------------------------------------------------------

--
-- Table structure for table `admin`
--

CREATE TABLE `admin` (
  `id` int(11) NOT NULL,
  `username` varchar(50) CHARACTER SET latin1 DEFAULT NULL,
  `password` char(40) CHARACTER SET latin1 DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `admin`
--

INSERT INTO `admin` (`id`, `username`, `password`) VALUES
(1, 'rezaaagam', '1234');

-- --------------------------------------------------------

--
-- Table structure for table `pakaian`
--

CREATE TABLE `pakaian` (
  `id_pakaian` int(11) NOT NULL,
  `jenis_pakaian` varchar(50) CHARACTER SET latin1 DEFAULT NULL,
  `warna_pakaian` varchar(50) CHARACTER SET latin1 DEFAULT NULL,
  `ukuran_pakaian` varchar(50) CHARACTER SET latin1 DEFAULT NULL,
  `harga_pakaian` double DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `pakaian`
--

INSERT INTO `pakaian` (`id_pakaian`, `jenis_pakaian`, `warna_pakaian`, `ukuran_pakaian`, `harga_pakaian`) VALUES
(4, 'Baju Polos', 'Merah', 'L', 100000),
(5, 'Baju Polos', 'Hitam', 'XL', 150000);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `admin`
--
ALTER TABLE `admin`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `pakaian`
--
ALTER TABLE `pakaian`
  ADD PRIMARY KEY (`id_pakaian`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `admin`
--
ALTER TABLE `admin`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `pakaian`
--
ALTER TABLE `pakaian`
  MODIFY `id_pakaian` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
