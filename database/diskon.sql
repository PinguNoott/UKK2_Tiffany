-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Feb 20, 2025 at 06:16 AM
-- Server version: 10.4.24-MariaDB
-- PHP Version: 7.4.29

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `diskon`
--

-- --------------------------------------------------------

--
-- Table structure for table `transaksi`
--

CREATE TABLE `transaksi` (
  `id` int(11) NOT NULL,
  `harga` decimal(10,2) NOT NULL,
  `diskon` decimal(5,2) NOT NULL,
  `total_harga` decimal(10,2) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `transaksi`
--

INSERT INTO `transaksi` (`id`, `harga`, `diskon`, `total_harga`) VALUES
(1, '20000.00', '20.00', '16000.00'),
(2, '20000.00', '20.00', '16000.00'),
(3, '20000.00', '20.00', '16000.00'),
(4, '20000.00', '20.00', '16000.00'),
(5, '20000.00', '20.00', '16000.00'),
(6, '99999999.99', '20.00', '99999999.99'),
(7, '99999999.99', '20.00', '99999999.99'),
(8, '99999999.99', '20.00', '99999999.99'),
(9, '99999999.99', '40.00', '99999999.99'),
(10, '99999999.99', '40.00', '99999999.99'),
(11, '99999999.99', '40.00', '99999999.99'),
(12, '99999999.99', '50.00', '99999999.99'),
(13, '99999999.99', '50.00', '99999999.99'),
(14, '99999999.99', '20.00', '99999999.99'),
(15, '99999999.99', '20.00', '99999999.99'),
(16, '99999999.99', '20.00', '99999999.99'),
(17, '99999999.99', '20.00', '99999999.99'),
(18, '99999999.99', '20.00', '99999999.99'),
(19, '99999999.99', '20.00', '99999999.99'),
(20, '99999999.99', '20.00', '99999999.99'),
(21, '99999999.99', '30.00', '99999999.99'),
(22, '99999999.99', '50.00', '99999999.99'),
(23, '99999999.99', '50.00', '99999999.99'),
(24, '99999999.99', '50.00', '99999999.99'),
(25, '99999999.99', '50.00', '99999999.99'),
(26, '99999999.99', '50.00', '99999999.99');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `transaksi`
--
ALTER TABLE `transaksi`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `transaksi`
--
ALTER TABLE `transaksi`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=27;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
