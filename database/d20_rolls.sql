-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Aug 20, 2024 at 07:45 PM
-- Server version: 10.4.32-MariaDB
-- PHP Version: 8.2.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `d20_rolls`
--

-- --------------------------------------------------------

--
-- Table structure for table `rolls`
--

CREATE TABLE `rolls` (
  `id` int(11) NOT NULL,
  `roll_result` int(11) NOT NULL,
  `timestamp` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `rolls`
--

INSERT INTO `rolls` (`id`, `roll_result`, `timestamp`) VALUES
(1, 12, '2024-08-20 17:20:54'),
(2, 2, '2024-08-20 17:30:31'),
(3, 17, '2024-08-20 17:31:45'),
(4, 5, '2024-08-20 17:31:50'),
(5, 7, '2024-08-20 17:32:51'),
(6, 15, '2024-08-20 17:32:54'),
(7, 7, '2024-08-20 17:32:58'),
(8, 2, '2024-08-20 17:34:23'),
(9, 20, '2024-08-20 17:34:26'),
(10, 9, '2024-08-20 17:34:36'),
(11, 20, '2024-08-20 17:34:38'),
(12, 18, '2024-08-20 17:34:40'),
(13, 1, '2024-08-20 17:34:46');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `rolls`
--
ALTER TABLE `rolls`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `rolls`
--
ALTER TABLE `rolls`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
