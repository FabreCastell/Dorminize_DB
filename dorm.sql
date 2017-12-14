-- phpMyAdmin SQL Dump
-- version 4.6.5.2
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Dec 14, 2017 at 09:51 AM
-- Server version: 10.1.21-MariaDB
-- PHP Version: 7.1.1

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `dorm`
--

-- --------------------------------------------------------

--
-- Table structure for table `bills`
--

CREATE TABLE `bills` (
  `invoice_number` int(10) UNSIGNED NOT NULL,
  `elec_unit` double(8,2) NOT NULL,
  `water_unit` double(8,2) NOT NULL,
  `date` date DEFAULT NULL,
  `status` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `client_ssn` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `room_id` int(10) UNSIGNED DEFAULT NULL,
  `dorm_id` int(10) UNSIGNED DEFAULT NULL,
  `updated_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `bills`
--

INSERT INTO `bills` (`invoice_number`, `elec_unit`, `water_unit`, `date`, `status`, `client_ssn`, `room_id`, `dorm_id`, `updated_at`, `created_at`) VALUES
(43, 5.00, 5.00, '2017-01-01', 'unpaid', '111', 1, 1, '2017-12-14 00:06:46', '2017-12-14 00:06:46'),
(44, 2.00, 2.00, '2018-01-01', 'unpaid', '4652', 12, 5, '2017-12-14 00:51:18', '2017-12-14 00:51:17');

-- --------------------------------------------------------

--
-- Table structure for table `clients`
--

CREATE TABLE `clients` (
  `ssn` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `job` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `previous_address` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `clients`
--

INSERT INTO `clients` (`ssn`, `name`, `job`, `previous_address`, `created_at`, `updated_at`) VALUES
('111', 'prayuth', 'prime', 'bkk', '2017-12-13 23:56:16', '2017-12-13 23:56:16'),
('258963', 'client', 'eng', 'bkk', '2017-12-14 01:08:26', '2017-12-14 01:08:26'),
('4522', 'winner', 'student', 'cnx', '2017-12-14 00:17:29', '2017-12-14 00:17:29'),
('4652', 'com', 'student', 'cnx', '2017-12-14 00:17:52', '2017-12-14 00:17:52'),
('589', 'Tape', 'eng', 'bkk', '2017-12-14 00:58:17', '2017-12-14 00:58:17');

-- --------------------------------------------------------

--
-- Table structure for table `clients_rooms`
--

CREATE TABLE `clients_rooms` (
  `client_ssn` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `room_id` int(10) UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `clients_rooms`
--

INSERT INTO `clients_rooms` (`client_ssn`, `room_id`) VALUES
('111', 1);

-- --------------------------------------------------------

--
-- Table structure for table `dorms`
--

CREATE TABLE `dorms` (
  `id` int(10) UNSIGNED NOT NULL,
  `name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `location` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `building_amt` int(11) NOT NULL,
  `room_amt` int(11) NOT NULL,
  `elec_unit_cost` int(11) NOT NULL,
  `water_unit_cost` int(11) NOT NULL,
  `description` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `rule` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `pic_dest` text COLLATE utf8mb4_unicode_ci,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `owner_ssn` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `dorms`
--

INSERT INTO `dorms` (`id`, `name`, `location`, `building_amt`, `room_amt`, `elec_unit_cost`, `water_unit_cost`, `description`, `rule`, `pic_dest`, `created_at`, `updated_at`, `owner_ssn`) VALUES
(1, 'dorm', 'cmu', 2, 20, 5, 5, '', '', NULL, NULL, NULL, '123'),
(5, 'engfah', 'cnx', 1, 100, 7, 20, '', '', NULL, NULL, NULL, '123');

-- --------------------------------------------------------

--
-- Table structure for table `dorm_expenses`
--

CREATE TABLE `dorm_expenses` (
  `id` int(10) UNSIGNED NOT NULL,
  `date` date NOT NULL,
  `water_cost` double(8,2) NOT NULL,
  `elec_cost` double(8,2) NOT NULL,
  `dorm_id` int(10) UNSIGNED NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `updated_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `dorm_expenses`
--

INSERT INTO `dorm_expenses` (`id`, `date`, `water_cost`, `elec_cost`, `dorm_id`, `created_at`, `updated_at`) VALUES
(1, '2016-01-01', 500.00, 500.00, 1, '2017-12-14 07:09:37', '0000-00-00 00:00:00'),
(8, '2017-12-13', 600.00, 1200.00, 5, '2017-12-14 07:18:51', '0000-00-00 00:00:00'),
(9, '1017-01-01', 5.00, 5.00, 5, '2017-12-14 00:45:42', '2017-12-14 00:45:42');

-- --------------------------------------------------------

--
-- Table structure for table `furnitures`
--

CREATE TABLE `furnitures` (
  `id` int(10) UNSIGNED NOT NULL,
  `name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `description` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `quantity` int(11) NOT NULL,
  `cost` double(8,2) NOT NULL,
  `buy_date` datetime NOT NULL,
  `change_date` datetime NOT NULL,
  `pic_dest` text COLLATE utf8mb4_unicode_ci,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `dorm_id` int(10) UNSIGNED DEFAULT NULL,
  `room_id` int(10) UNSIGNED DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `furnitures`
--

INSERT INTO `furnitures` (`id`, `name`, `description`, `quantity`, `cost`, `buy_date`, `change_date`, `pic_dest`, `created_at`, `updated_at`, `dorm_id`, `room_id`) VALUES
(1, 'chairs', '', 100, 1000.00, '2016-01-01 00:00:00', '2017-01-04 00:00:00', NULL, NULL, NULL, 1, 1),
(21, 'table', '', 10, 50000.00, '2015-12-03 00:00:00', '2017-12-04 00:00:00', NULL, NULL, NULL, 5, 1),
(22, 'chairs', 'maple chair', 15, 6000.00, '2017-08-09 00:00:00', '2017-12-01 00:00:00', NULL, NULL, NULL, 1, 1);

-- --------------------------------------------------------

--
-- Table structure for table `migrations`
--

CREATE TABLE `migrations` (
  `id` int(10) UNSIGNED NOT NULL,
  `migration` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `batch` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `migrations`
--

INSERT INTO `migrations` (`id`, `migration`, `batch`) VALUES
(1, '2014_10_12_000000_create_users_table', 1),
(2, '2014_10_12_100000_create_password_resets_table', 1),
(3, '2017_11_06_092811_create_owners_table', 1),
(4, '2017_11_06_092812_create_clients_table', 1),
(5, '2017_11_06_093542_create_dorms_table', 1),
(6, '2017_11_06_093543_create_dorm_expenses_table', 1),
(7, '2017_11_06_093544_create_staffs_table', 1),
(8, '2017_11_06_093548_create_room_types_table', 1),
(9, '2017_11_06_093549_create_rooms_table', 1),
(10, '2017_11_06_093550_create_bills_table', 1),
(11, '2017_11_06_094236_create_furnitures_table', 1),
(12, '2017_11_08_165800_create_clients_rooms_table', 1);

-- --------------------------------------------------------

--
-- Table structure for table `owners`
--

CREATE TABLE `owners` (
  `ssn` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `owners`
--

INSERT INTO `owners` (`ssn`, `name`, `created_at`, `updated_at`) VALUES
('123', 'our', NULL, NULL),
('12345667', 'asdasd', '2017-12-14 00:56:17', '2017-12-14 00:56:17'),
('486', 'win', '2017-12-14 00:21:05', '2017-12-14 00:21:05'),
('5599', 'owner', '2017-12-14 01:00:26', '2017-12-14 01:00:26');

-- --------------------------------------------------------

--
-- Table structure for table `password_resets`
--

CREATE TABLE `password_resets` (
  `email` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `token` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `rooms`
--

CREATE TABLE `rooms` (
  `id` int(10) UNSIGNED NOT NULL,
  `number` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `status` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `checkin_date` datetime NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `type_id` int(10) UNSIGNED DEFAULT NULL,
  `dorm_id` int(10) UNSIGNED DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `rooms`
--

INSERT INTO `rooms` (`id`, `number`, `status`, `checkin_date`, `created_at`, `updated_at`, `type_id`, `dorm_id`) VALUES
(1, '1', 'ว่าง', '2016-01-01 00:00:00', NULL, NULL, 7, 1),
(12, '2', 'ไม่ว่าง', '2016-01-02 00:00:00', '2017-12-14 00:28:23', '2017-12-14 00:28:23', 7, 5);

-- --------------------------------------------------------

--
-- Table structure for table `room_types`
--

CREATE TABLE `room_types` (
  `id` int(10) UNSIGNED NOT NULL,
  `name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `size` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `deposit` int(11) NOT NULL,
  `rental_price` int(11) NOT NULL,
  `pic_dest` text COLLATE utf8mb4_unicode_ci,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `room_types`
--

INSERT INTO `room_types` (`id`, `name`, `size`, `deposit`, `rental_price`, `pic_dest`, `created_at`, `updated_at`) VALUES
(7, 'fan', '10', 10, 2000, '1', '2017-12-14 00:04:50', '2017-12-14 00:04:50'),
(8, 'air', '50', 10000, 6000, '5', '2017-12-14 00:52:33', '2017-12-14 00:52:33');

-- --------------------------------------------------------

--
-- Table structure for table `staffs`
--

CREATE TABLE `staffs` (
  `id` int(11) NOT NULL,
  `ssn` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `position` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `gender` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `work_hour` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `phone_number` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `salary` int(11) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `dorm_id` int(10) UNSIGNED DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `staffs`
--

INSERT INTO `staffs` (`id`, `ssn`, `name`, `position`, `gender`, `work_hour`, `phone_number`, `salary`, `created_at`, `updated_at`, `dorm_id`) VALUES
(1, '123845321578', 'Michale', 'guard', 'male', '', '', 5000, NULL, NULL, 1),
(8, '7846212345987', 'Rachale', 'guard', 'female', '', '0822878921', 6500, NULL, NULL, 1);

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` int(10) UNSIGNED NOT NULL,
  `name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `password` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `status` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `ssn` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `remember_token` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `name`, `email`, `password`, `status`, `ssn`, `remember_token`, `created_at`, `updated_at`) VALUES
(5, 'our', 'our@mail.com', '$2y$10$JxBDO69udR/4ZFCafNWvDeYuRILUSUcKzSy/Vd6Z5A02W0sQLBnuS', 'client', '111', '6o1sfotUWoNOFFnkdrpXCT6F7krAJm4ipIehA8OyuLiTy8IhCbSXRG1CuKDd', '2017-12-13 23:56:16', '2017-12-13 23:56:16'),
(6, 'asdasd', 'asd@asd.asd', '$2y$10$RxEi9viYzvDMn2vf9owSNe/t8Oldt643.Io7UI4u6SKnAQN6pqy1C', 'owner', '12345667', 'd7PrqFw4Lek9qPB5dnuXoQWJfMvRenDfcbeQD6SqlxRmIx8wZAZMdFXh27cf', '2017-12-14 00:56:17', '2017-12-14 00:56:17'),
(7, 'Tape', 'dd@mail.com', '$2y$10$VSWtvbuAR5Mzw61Jk.kVYO.FL01UhWBOLo9MUB3jes6zMGd4eKBWy', 'client', '589', 'KQLSr36pz9l5Yk7hpRlZGEdThgbh2i8t40ZtAuxNlSprM1BoTlWGLjMRhceG', '2017-12-14 00:58:17', '2017-12-14 00:58:17'),
(8, 'owner', 'owner@mail.com', '$2y$10$Qso0Ng0Ks.VLcEmSWCvDLOIpo2ugGeqNoIrEwkPzqFcyGKFtSe2b6', 'owner', '5599', 'KRqfooRNgM1R4owExNq8pGmRAr4hvVNsebgRxG75j20rTFiyShhAlY5L2x3R', '2017-12-14 01:00:26', '2017-12-14 01:00:26'),
(9, 'client', 'client@mail.com', '$2y$10$9f9AWJ3dBgMoQDkHXVKYUeorFErXWEO7fbbRIj1a5rPMqwsFKJhPm', 'client', '258963', 'Om3wJd3Tdo93trHiKPHyVPvPvCPz2eGHIYPZ02XVU65tXoiK2f7vSefWZkpo', '2017-12-14 01:08:26', '2017-12-14 01:08:26');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `bills`
--
ALTER TABLE `bills`
  ADD PRIMARY KEY (`invoice_number`),
  ADD KEY `bills_client_ssn_foreign` (`client_ssn`),
  ADD KEY `bills_room_id_foreign` (`room_id`),
  ADD KEY `bills_dorm_id_foreign` (`dorm_id`);

--
-- Indexes for table `clients`
--
ALTER TABLE `clients`
  ADD PRIMARY KEY (`ssn`);

--
-- Indexes for table `clients_rooms`
--
ALTER TABLE `clients_rooms`
  ADD PRIMARY KEY (`client_ssn`,`room_id`),
  ADD KEY `clients_rooms_room_id_foreign` (`room_id`);

--
-- Indexes for table `dorms`
--
ALTER TABLE `dorms`
  ADD PRIMARY KEY (`id`),
  ADD KEY `dorms_owner_ssn_foreign` (`owner_ssn`);

--
-- Indexes for table `dorm_expenses`
--
ALTER TABLE `dorm_expenses`
  ADD PRIMARY KEY (`id`),
  ADD KEY `dorm_expenses_dorm_id_foreign` (`dorm_id`);

--
-- Indexes for table `furnitures`
--
ALTER TABLE `furnitures`
  ADD PRIMARY KEY (`id`),
  ADD KEY `furnitures_dorm_id_foreign` (`dorm_id`),
  ADD KEY `furnitures_room_id_foreign` (`room_id`);

--
-- Indexes for table `migrations`
--
ALTER TABLE `migrations`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `owners`
--
ALTER TABLE `owners`
  ADD PRIMARY KEY (`ssn`);

--
-- Indexes for table `password_resets`
--
ALTER TABLE `password_resets`
  ADD KEY `password_resets_email_index` (`email`);

--
-- Indexes for table `rooms`
--
ALTER TABLE `rooms`
  ADD PRIMARY KEY (`id`),
  ADD KEY `rooms_type_id_foreign` (`type_id`),
  ADD KEY `rooms_dorm_id_foreign` (`dorm_id`);

--
-- Indexes for table `room_types`
--
ALTER TABLE `room_types`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `staffs`
--
ALTER TABLE `staffs`
  ADD PRIMARY KEY (`ssn`),
  ADD UNIQUE KEY `id` (`id`),
  ADD KEY `staffs_dorm_id_foreign` (`dorm_id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `users_email_unique` (`email`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `bills`
--
ALTER TABLE `bills`
  MODIFY `invoice_number` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=45;
--
-- AUTO_INCREMENT for table `dorms`
--
ALTER TABLE `dorms`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;
--
-- AUTO_INCREMENT for table `dorm_expenses`
--
ALTER TABLE `dorm_expenses`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;
--
-- AUTO_INCREMENT for table `furnitures`
--
ALTER TABLE `furnitures`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=23;
--
-- AUTO_INCREMENT for table `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;
--
-- AUTO_INCREMENT for table `rooms`
--
ALTER TABLE `rooms`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;
--
-- AUTO_INCREMENT for table `room_types`
--
ALTER TABLE `room_types`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;
--
-- AUTO_INCREMENT for table `staffs`
--
ALTER TABLE `staffs`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;
--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;
--
-- Constraints for dumped tables
--

--
-- Constraints for table `bills`
--
ALTER TABLE `bills`
  ADD CONSTRAINT `bills_client_ssn_foreign` FOREIGN KEY (`client_ssn`) REFERENCES `clients` (`ssn`),
  ADD CONSTRAINT `bills_dorm_id_foreign` FOREIGN KEY (`dorm_id`) REFERENCES `dorms` (`id`),
  ADD CONSTRAINT `bills_room_id_foreign` FOREIGN KEY (`room_id`) REFERENCES `rooms` (`id`);

--
-- Constraints for table `clients_rooms`
--
ALTER TABLE `clients_rooms`
  ADD CONSTRAINT `clients_rooms_client_ssn_foreign` FOREIGN KEY (`client_ssn`) REFERENCES `clients` (`ssn`),
  ADD CONSTRAINT `clients_rooms_room_id_foreign` FOREIGN KEY (`room_id`) REFERENCES `rooms` (`id`);

--
-- Constraints for table `dorms`
--
ALTER TABLE `dorms`
  ADD CONSTRAINT `dorms_owner_ssn_foreign` FOREIGN KEY (`owner_ssn`) REFERENCES `owners` (`ssn`);

--
-- Constraints for table `dorm_expenses`
--
ALTER TABLE `dorm_expenses`
  ADD CONSTRAINT `dorm_expenses_dorm_id_foreign` FOREIGN KEY (`dorm_id`) REFERENCES `dorms` (`id`);

--
-- Constraints for table `furnitures`
--
ALTER TABLE `furnitures`
  ADD CONSTRAINT `furnitures_dorm_id_foreign` FOREIGN KEY (`dorm_id`) REFERENCES `dorms` (`id`),
  ADD CONSTRAINT `furnitures_room_id_foreign` FOREIGN KEY (`room_id`) REFERENCES `rooms` (`id`);

--
-- Constraints for table `rooms`
--
ALTER TABLE `rooms`
  ADD CONSTRAINT `rooms_dorm_id_foreign` FOREIGN KEY (`dorm_id`) REFERENCES `dorms` (`id`),
  ADD CONSTRAINT `rooms_type_id_foreign` FOREIGN KEY (`type_id`) REFERENCES `room_types` (`id`);

--
-- Constraints for table `staffs`
--
ALTER TABLE `staffs`
  ADD CONSTRAINT `staffs_dorm_id_foreign` FOREIGN KEY (`dorm_id`) REFERENCES `dorms` (`id`);

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
