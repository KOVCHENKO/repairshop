-- phpMyAdmin SQL Dump
-- version 4.7.7
-- https://www.phpmyadmin.net/
--
-- Host: localhost
-- Generation Time: May 14, 2018 at 10:25 PM
-- Server version: 10.1.30-MariaDB
-- PHP Version: 7.2.1

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `repairshop`
--

-- --------------------------------------------------------

--
-- Table structure for table `autos`
--

CREATE TABLE `autos` (
  `id` int(10) UNSIGNED NOT NULL,
  `vin` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `reg_number` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `year` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `volume` double NOT NULL,
  `transmission` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `image` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `brand` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `autos`
--

INSERT INTO `autos` (`id`, `vin`, `reg_number`, `year`, `volume`, `transmission`, `image`, `created_at`, `updated_at`, `brand`) VALUES
(1, '123123123123', 'x066map', '2002', 2, 'автоматическая', 'dummy', '2018-05-14 14:39:52', '2018-05-14 14:39:52', 'Mazda'),
(2, '1231231231', 'xii56', '2000', 3, 'автоматическая', 'dummy', '2018-05-14 14:41:46', '2018-05-14 14:41:46', 'Audi');

-- --------------------------------------------------------

--
-- Table structure for table `masters`
--

CREATE TABLE `masters` (
  `id` int(10) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `position` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `rate` int(11) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `masters`
--

INSERT INTO `masters` (`id`, `name`, `position`, `rate`, `created_at`, `updated_at`) VALUES
(2, 'Петров', 'Петрович', 7, '2018-05-12 15:57:03', '2018-05-12 15:57:03'),
(4, '234', '345', 3, '2018-05-12 15:58:06', '2018-05-12 15:58:06');

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
(2, '2018_05_09_134604_create_masters_table', 2),
(3, '2018_05_12_200210_create_spares_table', 3),
(4, '2018_05_12_204133_create_auto_table', 4),
(5, '2018_05_12_204159_create_orders_table', 4),
(6, '2018_05_13_174716_create_services_table', 5),
(7, '2018_05_13_175524_create_services_spares_table', 5),
(8, '2018_05_13_175817_create_orders_services_table', 5),
(9, '2018_05_13_175940_create_orders_masters_table', 5),
(11, '2018_05_14_165919_edit_spares_table_add_units_column', 6),
(12, '2018_05_14_172723_edit_autos_table_add_d_brand_column', 7);

-- --------------------------------------------------------

--
-- Table structure for table `orders`
--

CREATE TABLE `orders` (
  `id` int(10) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `completion_date` date NOT NULL,
  `manager_id` int(10) UNSIGNED DEFAULT NULL,
  `customer_id` int(10) UNSIGNED DEFAULT NULL,
  `auto_id` int(10) UNSIGNED DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `orders_masters`
--

CREATE TABLE `orders_masters` (
  `id` int(10) UNSIGNED NOT NULL,
  `order_id` int(10) UNSIGNED DEFAULT NULL,
  `master_id` int(10) UNSIGNED DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `orders_services`
--

CREATE TABLE `orders_services` (
  `id` int(10) UNSIGNED NOT NULL,
  `order_id` int(10) UNSIGNED DEFAULT NULL,
  `service_id` int(10) UNSIGNED DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `services`
--

CREATE TABLE `services` (
  `id` int(10) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `description` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `cost` double NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `services`
--

INSERT INTO `services` (`id`, `name`, `description`, `cost`, `created_at`, `updated_at`) VALUES
(1, 'New', 'New', 9, '2018-05-14 06:59:20', '2018-05-14 06:59:20'),
(2, 'new 2', 'new 2', 4, '2018-05-14 06:59:58', '2018-05-14 06:59:58'),
(3, 'new 3', 'new 3', 25, '2018-05-14 08:17:53', '2018-05-14 08:17:53'),
(4, 'Ремонт двигателя', 'Ремонт двигателя', 100, '2018-05-14 14:59:59', '2018-05-14 14:59:59'),
(5, 'Покраска кузова', 'Покраска кузова', 100, '2018-05-14 15:00:14', '2018-05-14 15:00:14'),
(6, 'Замена форсунок', 'Замена форсунок', 100, '2018-05-14 15:00:23', '2018-05-14 15:00:23'),
(7, 'Установка молдингов', 'Установка молдингов', 200, '2018-05-14 15:00:42', '2018-05-14 15:00:42');

-- --------------------------------------------------------

--
-- Table structure for table `services_spares`
--

CREATE TABLE `services_spares` (
  `id` int(10) UNSIGNED NOT NULL,
  `spare_id` int(10) UNSIGNED DEFAULT NULL,
  `service_id` int(10) UNSIGNED DEFAULT NULL,
  `quantity` int(10) UNSIGNED DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `services_spares`
--

INSERT INTO `services_spares` (`id`, `spare_id`, `service_id`, `quantity`, `created_at`, `updated_at`) VALUES
(2, 1, 1, 1, NULL, NULL),
(6, 2, 2, 5, NULL, NULL),
(8, 1, 2, 4, NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `spares`
--

CREATE TABLE `spares` (
  `id` int(10) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `cost` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `quantity` int(11) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `unit` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `spares`
--

INSERT INTO `spares` (`id`, `name`, `cost`, `quantity`, `created_at`, `updated_at`, `unit`) VALUES
(1, 'Масло', '8', 1235, '2018-05-12 16:27:02', '2018-05-12 16:27:09', 'л'),
(2, 'Подшипники', '17', 123123123, '2018-05-14 08:31:33', '2018-05-14 08:31:33', 'шт'),
(3, 'Сальник', '28', 100, '2018-05-14 13:07:18', '2018-05-14 13:07:18', 'шт'),
(4, 'Кардан.вал', '15', 10, '2018-05-14 13:08:30', '2018-05-14 13:08:30', 'шт');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` int(10) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `login` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `password` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `role` enum('admin','customer') COLLATE utf8mb4_unicode_ci DEFAULT 'customer',
  `token` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `name`, `login`, `password`, `role`, `token`, `created_at`, `updated_at`) VALUES
(1, 'Ivan', 'login', 'pass', 'admin', '6a4bd902c82b167407cbff19623b11716ac2ca18', '2018-05-09 08:34:36', '2018-05-14 15:25:56'),
(2, 'Ковченок', 'Иль', 'пароль', 'customer', NULL, '2018-05-14 16:00:31', '2018-05-14 16:00:31'),
(3, '11', '1', '1', 'customer', NULL, '2018-05-14 16:01:43', '2018-05-14 16:01:43');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `autos`
--
ALTER TABLE `autos`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `masters`
--
ALTER TABLE `masters`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `migrations`
--
ALTER TABLE `migrations`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `orders`
--
ALTER TABLE `orders`
  ADD PRIMARY KEY (`id`),
  ADD KEY `orders_manager_id_foreign` (`manager_id`),
  ADD KEY `orders_customer_id_foreign` (`customer_id`),
  ADD KEY `orders_auto_id_foreign` (`auto_id`);

--
-- Indexes for table `orders_masters`
--
ALTER TABLE `orders_masters`
  ADD PRIMARY KEY (`id`),
  ADD KEY `orders_masters_order_id_foreign` (`order_id`),
  ADD KEY `orders_masters_master_id_foreign` (`master_id`);

--
-- Indexes for table `orders_services`
--
ALTER TABLE `orders_services`
  ADD PRIMARY KEY (`id`),
  ADD KEY `orders_services_order_id_foreign` (`order_id`),
  ADD KEY `orders_services_service_id_foreign` (`service_id`);

--
-- Indexes for table `services`
--
ALTER TABLE `services`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `services_spares`
--
ALTER TABLE `services_spares`
  ADD PRIMARY KEY (`id`),
  ADD KEY `services_spares_spare_id_foreign` (`spare_id`),
  ADD KEY `services_spares_service_id_foreign` (`service_id`);

--
-- Indexes for table `spares`
--
ALTER TABLE `spares`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `autos`
--
ALTER TABLE `autos`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `masters`
--
ALTER TABLE `masters`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT for table `orders`
--
ALTER TABLE `orders`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `orders_masters`
--
ALTER TABLE `orders_masters`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `orders_services`
--
ALTER TABLE `orders_services`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `services`
--
ALTER TABLE `services`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `services_spares`
--
ALTER TABLE `services_spares`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `spares`
--
ALTER TABLE `spares`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `orders`
--
ALTER TABLE `orders`
  ADD CONSTRAINT `orders_auto_id_foreign` FOREIGN KEY (`auto_id`) REFERENCES `autos` (`id`),
  ADD CONSTRAINT `orders_customer_id_foreign` FOREIGN KEY (`customer_id`) REFERENCES `users` (`id`),
  ADD CONSTRAINT `orders_manager_id_foreign` FOREIGN KEY (`manager_id`) REFERENCES `users` (`id`);

--
-- Constraints for table `orders_masters`
--
ALTER TABLE `orders_masters`
  ADD CONSTRAINT `orders_masters_master_id_foreign` FOREIGN KEY (`master_id`) REFERENCES `masters` (`id`),
  ADD CONSTRAINT `orders_masters_order_id_foreign` FOREIGN KEY (`order_id`) REFERENCES `orders` (`id`);

--
-- Constraints for table `orders_services`
--
ALTER TABLE `orders_services`
  ADD CONSTRAINT `orders_services_order_id_foreign` FOREIGN KEY (`order_id`) REFERENCES `orders` (`id`),
  ADD CONSTRAINT `orders_services_service_id_foreign` FOREIGN KEY (`service_id`) REFERENCES `services` (`id`);

--
-- Constraints for table `services_spares`
--
ALTER TABLE `services_spares`
  ADD CONSTRAINT `services_spares_service_id_foreign` FOREIGN KEY (`service_id`) REFERENCES `services` (`id`),
  ADD CONSTRAINT `services_spares_spare_id_foreign` FOREIGN KEY (`spare_id`) REFERENCES `spares` (`id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
