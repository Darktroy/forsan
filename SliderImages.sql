-- phpMyAdmin SQL Dump
-- version 4.9.1
-- https://www.phpmyadmin.net/
--
-- Host: localhost
-- Generation Time: Apr 04, 2020 at 10:09 PM
-- Server version: 10.4.8-MariaDB
-- PHP Version: 7.3.11

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `forsan`
--

-- --------------------------------------------------------

--
-- Table structure for table `SliderImages`
--

CREATE TABLE `SliderImages` (
  `SliderImages_id` int(5) NOT NULL,
  `name` varchar(256) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `updated_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `SliderImages`
--

INSERT INTO `SliderImages` (`SliderImages_id`, `name`, `created_at`, `updated_at`) VALUES
(1, '1.jpg', '2020-04-04 19:38:16', '0000-00-00 00:00:00'),
(2, '2.jpg', '2020-04-04 19:38:16', '0000-00-00 00:00:00'),
(3, '3.jpg', '2020-04-04 19:38:25', '0000-00-00 00:00:00'),
(4, '4.jpg', '2020-04-04 19:38:32', '0000-00-00 00:00:00');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `SliderImages`
--
ALTER TABLE `SliderImages`
  ADD PRIMARY KEY (`SliderImages_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `SliderImages`
--
ALTER TABLE `SliderImages`
  MODIFY `SliderImages_id` int(5) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
