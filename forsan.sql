-- phpMyAdmin SQL Dump
-- version 4.9.0.1
-- https://www.phpmyadmin.net/
--
-- Host: localhost
-- Generation Time: Mar 18, 2020 at 02:55 PM
-- Server version: 10.3.15-MariaDB
-- PHP Version: 7.3.6

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
-- Table structure for table `failed_jobs`
--

CREATE TABLE `failed_jobs` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `connection` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `queue` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `payload` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `exception` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `failed_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `migrations`
--

CREATE TABLE `migrations` (
  `id` int(10) UNSIGNED NOT NULL,
  `migration` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `batch` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `migrations`
--

INSERT INTO `migrations` (`id`, `migration`, `batch`) VALUES
(1, '2014_10_12_000000_create_users_table', 1),
(2, '2016_06_01_000001_create_oauth_auth_codes_table', 1),
(3, '2016_06_01_000002_create_oauth_access_tokens_table', 1),
(4, '2016_06_01_000003_create_oauth_refresh_tokens_table', 1),
(5, '2016_06_01_000004_create_oauth_clients_table', 1),
(6, '2016_06_01_000005_create_oauth_personal_access_clients_table', 1),
(7, '2019_08_19_000000_create_failed_jobs_table', 1);

-- --------------------------------------------------------

--
-- Table structure for table `oauth_access_tokens`
--

CREATE TABLE `oauth_access_tokens` (
  `id` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL,
  `user_id` bigint(20) UNSIGNED DEFAULT NULL,
  `client_id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `scopes` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `revoked` tinyint(1) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `expires_at` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `oauth_access_tokens`
--

INSERT INTO `oauth_access_tokens` (`id`, `user_id`, `client_id`, `name`, `scopes`, `revoked`, `created_at`, `updated_at`, `expires_at`) VALUES
('0585f87c7dfbe16f025dbf55d463d58087fc30e51e81c37364ca985809f14ef598b1856dc1fa4c5d', 1, 1, 'TutsForWeb', '[]', 0, '2020-03-17 14:37:03', '2020-03-17 14:37:03', '2021-03-17 16:37:03'),
('48d1c2f405e346efe2745bfda6061429dc1da99def0ac3db9ad1f0eb4b8adecc9e8759d24f5699d5', 4, 1, 'TutsForWeb', '[]', 0, '2020-03-17 11:16:20', '2020-03-17 11:16:20', '2021-03-17 13:16:20'),
('5658e3f23f8c8d2b76d98581e0decdb38987ffd1da3c7477deab170f9192acef3cd71eb1b7c71d9c', 3, 1, 'TutsForWeb', '[]', 0, '2020-03-17 09:12:56', '2020-03-17 09:12:56', '2021-03-17 11:12:56'),
('73a3fcc146d56b4c030b26db15ee421539af94fc1f22af7e50235fa629a52bdf4ff458ca0052108a', NULL, 1, 'TutsForWeb', '[]', 0, '2020-03-18 09:04:16', '2020-03-18 09:04:16', '2021-03-18 11:04:16'),
('7f29dc2ef1035e01394422ef6609c2d76c3c30f5e372b53f932c963c543daba0720212b04983bec4', 1, 1, 'TutsForWeb', '[]', 0, '2020-03-17 04:55:53', '2020-03-17 04:55:53', '2021-03-17 06:55:53'),
('8a3a7776b7dbd0c8bd2c2392e34913cf88b350de0951d67ac2be77da32cdc779ac26d02bc6a1c51b', 2, 1, 'TutsForWeb', '[]', 0, '2020-03-17 09:12:19', '2020-03-17 09:12:19', '2021-03-17 11:12:19'),
('8cf2dc6326e21fd6ef6c1b97110e0bee4b089f5bedade39b51f41d6b0e1c5132e13efb3cdfd80679', 8, 1, 'TutsForWeb', '[]', 0, '2020-03-17 11:45:58', '2020-03-17 11:45:58', '2021-03-17 13:45:58'),
('8dc46c43e52503691d46144b6f33b0b534cf23e8d935c0958ed41299784a4bc5f09be0affd748f1d', 8, 1, 'TutsForWeb', '[]', 0, '2020-03-17 14:30:07', '2020-03-17 14:30:07', '2021-03-17 16:30:07'),
('a7ea8f24486cce26e232fbe37e5c2348d01598d9f7f9568899c236d7680c39ff7cab8034b3780aa5', 1, 1, 'TutsForWeb', '[]', 0, '2020-03-17 14:30:37', '2020-03-17 14:30:37', '2021-03-17 16:30:37'),
('abb36c70fefc6ca29d57a56978521dcb24feb16c4ba891f4853884b422576e2ab4a803ca313cf7f4', 6, 1, 'TutsForWeb', '[]', 0, '2020-03-17 11:43:30', '2020-03-17 11:43:30', '2021-03-17 13:43:30'),
('b33d93943abdf4b0c1b04cfc3abbf5d2eb4e561f47f43047cef20217105a55e9dc36e0d083f097c5', 8, 1, 'TutsForWeb', '[]', 0, '2020-03-17 14:29:57', '2020-03-17 14:29:57', '2021-03-17 16:29:57'),
('ba39b4e9325f9aee18a66bba06b2f4983eb653cf232ef128bafff690cbfa7cc0eef5f45df5b25663', 7, 1, 'TutsForWeb', '[]', 0, '2020-03-17 11:45:18', '2020-03-17 11:45:18', '2021-03-17 13:45:18'),
('dc1ffbc304a054dd77722fa918072b080cce82f79e1c22f74157ec1c91daffaa4e69011a56ff3839', 5, 1, 'TutsForWeb', '[]', 0, '2020-03-17 11:42:14', '2020-03-17 11:42:14', '2021-03-17 13:42:14'),
('e50e52ef267faf915c69a0586fab3dfbce7497c74f95ec40104dc58f84c8cd3afc9d573b2c7784b9', 1, 1, 'TutsForWeb', '[]', 0, '2020-03-18 09:08:38', '2020-03-18 09:08:38', '2021-03-18 11:08:38'),
('fddfe312aaf8afee6ea6e4cf71deb4a13e613f2c5b762e4ccdf4d6f66e4d1dc27123858d2c268311', 1, 1, 'TutsForWeb', '[]', 0, '2020-03-17 14:39:15', '2020-03-17 14:39:15', '2021-03-17 16:39:15');

-- --------------------------------------------------------

--
-- Table structure for table `oauth_auth_codes`
--

CREATE TABLE `oauth_auth_codes` (
  `id` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL,
  `user_id` bigint(20) UNSIGNED NOT NULL,
  `client_id` bigint(20) UNSIGNED NOT NULL,
  `scopes` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `revoked` tinyint(1) NOT NULL,
  `expires_at` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `oauth_clients`
--

CREATE TABLE `oauth_clients` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `user_id` bigint(20) UNSIGNED DEFAULT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `secret` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `redirect` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `personal_access_client` tinyint(1) NOT NULL,
  `password_client` tinyint(1) NOT NULL,
  `revoked` tinyint(1) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `oauth_clients`
--

INSERT INTO `oauth_clients` (`id`, `user_id`, `name`, `secret`, `redirect`, `personal_access_client`, `password_client`, `revoked`, `created_at`, `updated_at`) VALUES
(1, NULL, 'Laravel Personal Access Client', 'GzmJCPBHxLk7kGF4469DYCZMoySu7iEk21mKItRY', 'http://localhost', 1, 0, 0, '2020-03-17 01:45:17', '2020-03-17 01:45:17'),
(2, NULL, 'Laravel Password Grant Client', '7nwwgFW3G3NviIUmvJBr848lkubqwpNujwdwoYIX', 'http://localhost', 0, 1, 0, '2020-03-17 01:45:17', '2020-03-17 01:45:17'),
(3, NULL, 'Laravel Password Grant Client', 'MOwHvZfi0HYhh8X5oatcp7HAqFgJNWeS2k2en4KC', 'http://localhost', 0, 1, 0, '2020-03-17 18:01:16', '2020-03-17 18:01:16');

-- --------------------------------------------------------

--
-- Table structure for table `oauth_personal_access_clients`
--

CREATE TABLE `oauth_personal_access_clients` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `client_id` bigint(20) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `oauth_personal_access_clients`
--

INSERT INTO `oauth_personal_access_clients` (`id`, `client_id`, `created_at`, `updated_at`) VALUES
(1, 1, '2020-03-17 01:45:17', '2020-03-17 01:45:17');

-- --------------------------------------------------------

--
-- Table structure for table `oauth_refresh_tokens`
--

CREATE TABLE `oauth_refresh_tokens` (
  `id` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL,
  `access_token_id` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL,
  `revoked` tinyint(1) NOT NULL,
  `expires_at` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `PaymentType`
--

CREATE TABLE `PaymentType` (
  `payment_type_id` int(5) NOT NULL,
  `name_ar` varchar(254) NOT NULL,
  `name_en` varchar(254) NOT NULL,
  `created_at` datetime NOT NULL DEFAULT current_timestamp(),
  `updated_at` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf16;

--
-- Dumping data for table `PaymentType`
--

INSERT INTO `PaymentType` (`payment_type_id`, `name_ar`, `name_en`, `created_at`, `updated_at`) VALUES
(1, 'تيست', 'test', '2020-03-18 13:39:38', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `SubscraptionUser`
--

CREATE TABLE `SubscraptionUser` (
  `SubscraptionUser_id` int(32) NOT NULL,
  `name` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `university_id` int(10) NOT NULL,
  `latitude` double(24,16) DEFAULT NULL,
  `longitude` double(24,16) DEFAULT NULL,
  `address` varchar(256) NOT NULL,
  `payment_type_id` int(10) NOT NULL,
  `mobile` varchar(64) NOT NULL,
  `created_at` datetime NOT NULL DEFAULT current_timestamp(),
  `updated_at` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf16;

-- --------------------------------------------------------

--
-- Table structure for table `SubscriptionType`
--

CREATE TABLE `SubscriptionType` (
  `SubscriptionType_id` int(24) NOT NULL,
  `name_ar` varchar(254) NOT NULL,
  `name_en` varchar(254) DEFAULT NULL,
  `subscription_amount` double(15,2) NOT NULL,
  `tax_amount` double(15,2) NOT NULL,
  `trans_amount` double(15,2) NOT NULL,
  `total_amount` double(15,2) NOT NULL DEFAULT 0.00,
  `created_at` datetime NOT NULL DEFAULT current_timestamp(),
  `updated_at` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf16;

--
-- Dumping data for table `SubscriptionType`
--

INSERT INTO `SubscriptionType` (`SubscriptionType_id`, `name_ar`, `name_en`, `subscription_amount`, `tax_amount`, `trans_amount`, `total_amount`, `created_at`, `updated_at`) VALUES
(1, 'تيست نوع الاشتراك', 'test Subscription Type', 123.00, 123.58, 222.00, 0.00, '2020-03-18 14:10:45', '2020-03-18 14:10:45');

-- --------------------------------------------------------

--
-- Table structure for table `university`
--

CREATE TABLE `university` (
  `university_id` int(12) NOT NULL,
  `name_ar` varchar(254) NOT NULL,
  `name_en` varchar(254) NOT NULL,
  `latitude` double(11,8) NOT NULL,
  `longitude` double(11,8) NOT NULL,
  `created_at` datetime NOT NULL DEFAULT current_timestamp(),
  `updated_at` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf16;

--
-- Dumping data for table `university`
--

INSERT INTO `university` (`university_id`, `name_ar`, `name_en`, `latitude`, `longitude`, `created_at`, `updated_at`) VALUES
(1, 'تيست جامعه', 'test university', 11.25520550, 31.55779988, '2020-03-18 09:00:44', '2019-08-04 12:51:44');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `user_id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email_verified_at` timestamp NULL DEFAULT NULL,
  `mobile` varchar(30) COLLATE utf8mb4_unicode_ci NOT NULL,
  `type` varchar(24) COLLATE utf8mb4_unicode_ci NOT NULL,
  `password` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `remember_token` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`user_id`, `name`, `email`, `email_verified_at`, `mobile`, `type`, `password`, `remember_token`, `created_at`, `updated_at`) VALUES
(1, 'Ali Shahin', 'a17032020@gmail.com', NULL, '05008922980', 'user', '$2y$10$mBF3UQBh/M5kDMO/aLZ3T.iV/0ZTVMgAE6z4XmI13waKl0lhFymhm', NULL, '2020-03-17 04:55:50', '2020-03-17 04:55:50'),
(2, 'Ali Shahin', 'a170320202@gmail.com', NULL, '05008922980', 'user', '$2y$10$IUPM/Txbqr69U3IGNodyaeyWMV1xjJdsrnaPJd9tk7yQKgKQiHDRa', NULL, '2020-03-17 09:12:16', '2020-03-17 09:12:16'),
(3, 'Ali Shahin', 'a170320202@gmail.com3', NULL, '05008922980', 'user', '$2y$10$pUw7kIoForuQJXyyMF8FdOvRcQJFMAnwULUIE5E9TgbY1mqTXK6Qi', NULL, '2020-03-17 09:12:56', '2020-03-17 09:12:56'),
(4, 'Ali Shahin', 'a170320202@gmail.co', NULL, '05008922980', 'user', '$2y$10$N6RyNWdC4JhMqVLfl4ghaOjEIwfwFUSeIvKKOdu.weofzBq4U1qh6', NULL, '2020-03-17 11:16:19', '2020-03-17 11:16:19'),
(5, 'Ali Shahin', 'a170320202@gmail.co3', NULL, '05008922980', 'user', '$2y$10$fsPIkXkGt2ljhRson1Tkmue.zTNbz2ggNKuT9a4srA6xqukMI.Goe', NULL, '2020-03-17 11:42:14', '2020-03-17 11:42:14'),
(6, 'Ali Shahin', 'a170320202@gmail.co4', NULL, '05008922980', 'user', '$2y$10$PM02S98.eXeU4TVP5K7p9epituEDxqG3vcnYU2oUB7cKeuDF7EoTm', NULL, '2020-03-17 11:43:30', '2020-03-17 11:43:30'),
(7, 'Ali Shahin', 'a170320202@gmail.co5', NULL, '05008922980', 'user', '$2y$10$QE9EH/xKJaRz8/WPA0.tCeElmBuBVWmyj2iokuIqUPp59cWJcNWZ2', NULL, '2020-03-17 11:45:18', '2020-03-17 11:45:18'),
(8, 'Ali Shahin', 'a170320202@gmail.co6', NULL, '05008922980', 'user', '$2y$10$W9aTYjF3.TqmT55D/Ey2/uUQwPeEyD1gwTpwE76Kg37TVLpklCB/u', NULL, '2020-03-17 11:45:58', '2020-03-17 11:45:58');

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
  `way` enum('go','back','go_and_back','') NOT NULL DEFAULT 'go_and_back',
  `period` enum('month','one semester','two semester','') NOT NULL DEFAULT 'one semester',
  `created_at` datetime NOT NULL DEFAULT current_timestamp(),
  `updated_at` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf16;

--
-- Indexes for dumped tables
--

--
-- Indexes for table `failed_jobs`
--
ALTER TABLE `failed_jobs`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `migrations`
--
ALTER TABLE `migrations`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `oauth_access_tokens`
--
ALTER TABLE `oauth_access_tokens`
  ADD PRIMARY KEY (`id`),
  ADD KEY `oauth_access_tokens_user_id_index` (`user_id`);

--
-- Indexes for table `oauth_auth_codes`
--
ALTER TABLE `oauth_auth_codes`
  ADD PRIMARY KEY (`id`),
  ADD KEY `oauth_auth_codes_user_id_index` (`user_id`);

--
-- Indexes for table `oauth_clients`
--
ALTER TABLE `oauth_clients`
  ADD PRIMARY KEY (`id`),
  ADD KEY `oauth_clients_user_id_index` (`user_id`);

--
-- Indexes for table `oauth_personal_access_clients`
--
ALTER TABLE `oauth_personal_access_clients`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `oauth_refresh_tokens`
--
ALTER TABLE `oauth_refresh_tokens`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `PaymentType`
--
ALTER TABLE `PaymentType`
  ADD PRIMARY KEY (`payment_type_id`);

--
-- Indexes for table `SubscraptionUser`
--
ALTER TABLE `SubscraptionUser`
  ADD PRIMARY KEY (`SubscraptionUser_id`);

--
-- Indexes for table `SubscriptionType`
--
ALTER TABLE `SubscriptionType`
  ADD PRIMARY KEY (`SubscriptionType_id`);

--
-- Indexes for table `university`
--
ALTER TABLE `university`
  ADD PRIMARY KEY (`university_id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`user_id`),
  ADD UNIQUE KEY `users_email_unique` (`email`);

--
-- Indexes for table `UserToSubscription`
--
ALTER TABLE `UserToSubscription`
  ADD PRIMARY KEY (`UserToSubscription_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `failed_jobs`
--
ALTER TABLE `failed_jobs`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `oauth_clients`
--
ALTER TABLE `oauth_clients`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `oauth_personal_access_clients`
--
ALTER TABLE `oauth_personal_access_clients`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `PaymentType`
--
ALTER TABLE `PaymentType`
  MODIFY `payment_type_id` int(5) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `SubscraptionUser`
--
ALTER TABLE `SubscraptionUser`
  MODIFY `SubscraptionUser_id` int(32) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;

--
-- AUTO_INCREMENT for table `SubscriptionType`
--
ALTER TABLE `SubscriptionType`
  MODIFY `SubscriptionType_id` int(24) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `university`
--
ALTER TABLE `university`
  MODIFY `university_id` int(12) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `user_id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `UserToSubscription`
--
ALTER TABLE `UserToSubscription`
  MODIFY `UserToSubscription_id` int(30) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
