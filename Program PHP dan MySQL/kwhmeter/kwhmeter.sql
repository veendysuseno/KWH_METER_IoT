-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Oct 08, 2022 at 02:32 PM
-- Server version: 10.4.25-MariaDB
-- PHP Version: 8.0.23

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `kwhmeter`
--

-- --------------------------------------------------------

--
-- Table structure for table `data`
--

CREATE TABLE `data` (
  `id` int(255) NOT NULL,
  `tanggal` varchar(50) NOT NULL,
  `waktu` varchar(50) NOT NULL,
  `voltage` double NOT NULL,
  `current` double NOT NULL,
  `power` double NOT NULL,
  `energy` double NOT NULL,
  `freq` double NOT NULL,
  `pf` double NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `data`
--

INSERT INTO `data` (`id`, `tanggal`, `waktu`, `voltage`, `current`, `power`, `energy`, `freq`, `pf`) VALUES
(2, '13-08-2022', '19:20:21', 220.45, 0.5, 80.12, 23.12, 60, 1),
(4, '10-8-2022', '18:22:31', 219.12, 0.1, 45, 0.02, 50, 0.3),
(5, '10-8-2022', '18:22:31', 219.12, 0.1, 45, 0.02, 50, 0.3),
(6, '10-8-2022', '18:22:31', 219.12, 0.1, 45, 0.02, 50, 0.3),
(7, '10-8-2022', '18:22:31', 219.12, 0.1, 45, 0.02, 50, 0.3),
(8, '10-8-2022', '18:22:31', 219.12, 0.1, 45, 0.02, 50, 0.3),
(9, '10-8-2022', '18:22:31', 219.12, 0.1, 45, 0.02, 50, 2.4);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `data`
--
ALTER TABLE `data`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `data`
--
ALTER TABLE `data`
  MODIFY `id` int(255) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
