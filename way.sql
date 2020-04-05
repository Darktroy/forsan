-- phpMyAdmin SQL Dump
-- version 4.9.1
-- https://www.phpmyadmin.net/
--
-- Host: localhost
-- Generation Time: Apr 05, 2020 at 01:41 PM
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
-- Table structure for table `way`
--

CREATE TABLE `way` (
  `way_id` int(4) NOT NULL,
  `name_ar` varchar(64) NOT NULL,
  `name_en` varchar(64) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `way`
--

INSERT INTO `way` (`way_id`, `name_ar`, `name_en`, `created_at`, `updated_at`) VALUES
(1, 'ذهاب فقط', 'Going', '2020-04-05 11:36:44', NULL),
(2, 'رجوع فقط', 'Back', '2020-04-05 11:36:44', NULL),
(3, 'ذهاب و عوده', 'go & back', '2020-04-05 11:37:06', NULL);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `way`
--
ALTER TABLE `way`
  ADD PRIMARY KEY (`way_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `way`
--
ALTER TABLE `way`
  MODIFY `way_id` int(4) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
