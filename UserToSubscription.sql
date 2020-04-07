-- phpMyAdmin SQL Dump
-- version 4.9.1
-- https://www.phpmyadmin.net/
--
-- Host: localhost
-- Generation Time: Apr 05, 2020 at 02:09 PM
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
-- Table structure for table `UserToSubscription`
--

CREATE TABLE `UserToSubscription` (
  `UserToSubscription_id` int(30) NOT NULL,
  `SubscraptionUser_id` int(30) NOT NULL,
  `SubscriptionType_id` int(10) NOT NULL,
  `PaymentType_id` int(10) NOT NULL,
  `start_date` date NOT NULL,
  `end_date` date DEFAULT NULL,
  `way_id` int(12) NOT NULL,
  `period_id` int(12) NOT NULL,
  `user_id` int(24) NOT NULL,
  `created_at` datetime NOT NULL DEFAULT current_timestamp(),
  `updated_at` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf16;

--
-- Dumping data for table `UserToSubscription`
--

INSERT INTO `UserToSubscription` (`UserToSubscription_id`, `SubscraptionUser_id`, `SubscriptionType_id`, `PaymentType_id`, `start_date`, `end_date`, `way_id`, `period_id`, `user_id`, `created_at`, `updated_at`) VALUES
(23, 32, 1, 1, '2019-08-15', NULL, 2, 1, 1, '2020-03-18 20:47:19', '2020-03-18 20:47:19'),
(24, 31, 1, 1, '2019-08-15', NULL, 2, 1, 1, '2020-03-18 20:53:01', '2020-03-18 20:53:01'),
(25, 31, 1, 1, '2019-03-19', NULL, 2, 1, 1, '2020-03-19 09:39:13', '2020-03-19 09:39:13'),
(26, 31, 1, 1, '2019-03-19', NULL, 2, 1, 1, '2020-03-19 09:40:35', '2020-03-19 09:40:35'),
(27, 31, 1, 1, '2019-03-19', NULL, 2, 1, 1, '2020-03-19 09:40:39', '2020-03-19 09:40:39'),
(28, 31, 1, 1, '2019-03-19', NULL, 2, 1, 1, '2020-03-19 09:40:42', '2020-03-19 09:40:42'),
(29, 31, 1, 1, '2019-03-19', NULL, 2, 1, 1, '2020-03-19 09:40:44', '2020-03-19 09:40:44'),
(30, 31, 1, 1, '2019-03-19', NULL, 2, 2, 1, '2020-03-19 09:40:47', '2020-03-19 09:56:28'),
(31, 31, 1, 1, '2019-03-19', NULL, 2, 1, 1, '2020-03-19 09:41:01', '2020-03-19 09:41:01');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `UserToSubscription`
--
ALTER TABLE `UserToSubscription`
  ADD PRIMARY KEY (`UserToSubscription_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `UserToSubscription`
--
ALTER TABLE `UserToSubscription`
  MODIFY `UserToSubscription_id` int(30) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=32;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
