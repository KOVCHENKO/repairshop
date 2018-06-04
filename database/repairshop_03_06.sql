-- phpMyAdmin SQL Dump
-- version 4.7.7
-- https://www.phpmyadmin.net/
--
-- Host: localhost
-- Generation Time: Jun 03, 2018 at 09:08 AM
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
  `vin` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `reg_number` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `year` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `volume` double NOT NULL,
  `transmission` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `image` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `brand` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `pts` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `mileage` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `frame` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `autos`
--

INSERT INTO `autos` (`id`, `vin`, `reg_number`, `year`, `volume`, `transmission`, `image`, `created_at`, `updated_at`, `brand`, `pts`, `mileage`, `frame`) VALUES
(1, 'KL1UF756E6B195928', 'c065mk78rus', '2002', 1.7, 'автоматическая', '910247.png', '2018-05-14 14:39:52', '2018-05-14 14:39:52', 'Mazda', NULL, NULL, NULL),
(2, 'KL3UF756E6B195928', 'c055mk30rus', '2000', 1.4, 'автоматическая', '318967.jpg', '2018-05-14 14:41:46', '2018-05-28 07:50:47', 'Mazda', NULL, NULL, NULL),
(5, 'FF1UF756E6B195928', 'c008mk30rus', '2005', 2.5, 'автоматическая', '939625.jpeg', '2018-05-28 07:21:23', '2018-05-28 07:50:33', 'Lada', NULL, NULL, NULL),
(6, 'x123456789123456', 'c070mk30rus', '2000', 2.5, 'механическая', '166878.jpg', '2018-05-28 07:41:37', '2018-05-28 07:41:37', 'Mazda', NULL, NULL, NULL),
(7, 'AA1A567AAAA678888', 'x879mk30rus', '2002', 1.6, 'механическая', '764365.jpeg', '2018-05-28 07:55:08', '2018-05-28 07:55:08', 'Toyota', NULL, NULL, NULL),
(9, 'KL1UF756E6B195777', 'c065mk05rus', '2002', 5, 'автоматическая', '394669.jpg', '2018-05-28 12:28:04', '2018-06-01 06:43:42', 'Ferrari', NULL, '1000000', 'Седан'),
(10, NULL, 'a090aa30rus', '1999', 4, 'автоматическая', NULL, '2018-06-01 06:44:45', '2018-06-01 06:44:45', 'Gaz', NULL, NULL, NULL);

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
(2, 'Петров Петр Перович', 'Кузовные работы', 600, '2018-05-12 15:57:03', '2018-05-28 12:25:35'),
(4, 'Иванов Иван Иванович', 'Электрик', 600, '2018-05-12 15:58:06', '2018-05-28 08:03:11'),
(5, 'Сидоров Петр', 'Подсобный рабочий', 300, '2018-05-28 12:25:56', '2018-05-28 12:25:56');

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
(12, '2018_05_14_172723_edit_autos_table_add_d_brand_column', 7),
(13, '2018_05_27_065450_edit_orders_table_add_cost_column', 8),
(14, '2018_05_27_084311_edit_orders_masters_table_add_labor_hours_column', 9),
(15, '2018_05_27_090141_edit_orders_table_add_status_column', 10),
(16, '2018_06_01_102416_edit_users_table_add_phone_number', 11),
(17, '2018_06_01_102921_edit_autos_table_add_columns', 12);

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
  `updated_at` timestamp NULL DEFAULT NULL,
  `total_cost` int(11) DEFAULT NULL,
  `status` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `orders`
--

INSERT INTO `orders` (`id`, `name`, `completion_date`, `manager_id`, `customer_id`, `auto_id`, `created_at`, `updated_at`, `total_cost`, `status`) VALUES
(23, 'Заказ №23', '2018-05-23', 1, 2, 1, '2018-04-19 04:53:20', '2018-05-28 04:53:20', 595, 'Создан'),
(24, 'Заказ №24', '2018-05-10', 1, 2, 1, '2018-04-19 04:53:20', '2018-05-28 05:24:32', 305, 'Создан'),
(25, 'Заказ №25', '2018-05-20', 6, 2, 7, '2018-04-19 04:53:20', '2018-05-28 12:32:05', 3336, 'Завершен'),
(26, 'Заказ №26', '2018-05-12', 6, 7, 6, '2018-04-19 04:53:20', '2018-05-28 08:31:20', 3270, 'Завершен'),
(27, 'Заказ №27', '2018-05-20', 6, 10, 9, '2018-04-19 04:53:20', '2018-05-28 12:29:52', 2642, 'Создан');

-- --------------------------------------------------------

--
-- Table structure for table `orders_masters`
--

CREATE TABLE `orders_masters` (
  `id` int(10) UNSIGNED NOT NULL,
  `order_id` int(10) UNSIGNED DEFAULT NULL,
  `master_id` int(10) UNSIGNED DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `labor_hours` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `orders_masters`
--

INSERT INTO `orders_masters` (`id`, `order_id`, `master_id`, `created_at`, `updated_at`, `labor_hours`) VALUES
(16, 23, 2, NULL, NULL, 5),
(17, 24, 2, NULL, NULL, 5),
(18, 25, 2, NULL, NULL, 6),
(19, 26, 4, NULL, NULL, 5),
(20, 27, 5, NULL, NULL, 2);

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

--
-- Dumping data for table `orders_services`
--

INSERT INTO `orders_services` (`id`, `order_id`, `service_id`, `created_at`, `updated_at`) VALUES
(13, 23, 7, NULL, NULL),
(14, 23, 7, NULL, NULL),
(15, 24, 6, NULL, NULL),
(16, 25, 8, NULL, NULL),
(17, 26, 6, NULL, NULL),
(18, 27, 9, NULL, NULL),
(19, 27, 8, NULL, NULL);

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
(4, 'Ремонт двигателя', 'Ремонт двигателя', 100, '2018-05-14 14:59:59', '2018-05-14 14:59:59'),
(5, 'Покраска кузова', 'Покраска кузова', 100, '2018-05-14 15:00:14', '2018-05-14 15:00:14'),
(6, 'Замена форсунок', 'Замена форсунок', 100, '2018-05-14 15:00:23', '2018-05-14 15:00:23'),
(7, 'Установка молдингов', 'Установка молдингов', 200, '2018-05-14 15:00:42', '2018-05-14 15:00:42'),
(8, 'Замена поддона', 'Работы по замену поддона (кузовные работы)', 150, '2018-05-28 08:01:47', '2018-05-28 08:01:47'),
(9, 'Замена колес', 'Услуга предполагает замену колес автомобиля', 50, '2018-05-28 12:23:35', '2018-05-28 12:23:35');

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
(9, 4, 4, 1, NULL, NULL),
(10, 2, 4, 8, NULL, NULL),
(12, 5, 5, 2, NULL, NULL),
(13, 2, 6, 10, NULL, NULL),
(14, 6, 7, 4, NULL, NULL),
(15, 1, 8, 2, NULL, NULL),
(16, 2, 8, 10, NULL, NULL),
(17, 8, 9, 4, NULL, NULL),
(18, 3, 9, 2, NULL, NULL);

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
(1, 'Масло', '8', 296, '2018-05-12 16:27:02', '2018-05-28 12:29:51', 'л'),
(2, 'Подшипники', '17', 160, '2018-05-14 08:31:33', '2018-05-28 12:29:52', 'шт'),
(3, 'Сальник', '28', 98, '2018-05-14 13:07:18', '2018-05-28 12:29:51', 'шт'),
(4, 'Кардан.вал', '15', 10, '2018-05-14 13:08:30', '2018-05-14 13:08:30', 'шт'),
(5, 'Краска', '500', 20, '2018-05-27 04:58:06', '2018-05-27 04:58:06', 'л'),
(6, 'Молдинги', '20', 2, '2018-05-28 04:29:49', '2018-05-28 04:53:20', 'шт'),
(7, 'Фары', '1000', 8, '2018-05-28 08:02:30', '2018-05-28 08:02:35', 'шт'),
(8, 'Колесо', '400', 6, '2018-05-28 12:24:38', '2018-05-28 12:29:51', 'шт');

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
  `updated_at` timestamp NULL DEFAULT NULL,
  `phone` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `name`, `login`, `password`, `role`, `token`, `created_at`, `updated_at`, `phone`) VALUES
(1, 'Ivan', 'login', 'pass', 'admin', '214db705226f2341c1d91d49c4e0d64d251c2ece', '2018-05-09 08:34:36', '2018-05-28 12:09:05', NULL),
(2, 'Jane Doe', 'jane', 'doe', 'customer', '3d59ae0664875b9cf1d7d15cafea30926b84dc92', '2018-05-14 16:00:31', '2018-05-28 12:32:20', NULL),
(6, 'John Doe', 'john', 'doe', 'admin', 'b830009f67280590bdcaaa7c96c78c2512293de5', '2018-05-28 08:00:51', '2018-06-01 08:55:42', NULL),
(7, 'Andrew Lincoln', 'andrew', 'andrew', 'customer', '742d9f228df2bcf4e518abad8424e782700fa368', '2018-05-28 08:17:46', '2018-06-01 06:28:12', '87776677886'),
(9, 'John Smith', 'john', 'john', 'admin', NULL, '2018-05-28 12:22:13', '2018-05-28 12:22:28', NULL),
(10, 'Павел', 'pavel', 'pavel', 'customer', 'e7e5156fdaa3412ca04afcac8186245eebcc02a1', '2018-05-28 12:27:03', '2018-06-01 06:27:52', '89168785566');

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
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT for table `masters`
--
ALTER TABLE `masters`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=18;

--
-- AUTO_INCREMENT for table `orders`
--
ALTER TABLE `orders`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=28;

--
-- AUTO_INCREMENT for table `orders_masters`
--
ALTER TABLE `orders_masters`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=21;

--
-- AUTO_INCREMENT for table `orders_services`
--
ALTER TABLE `orders_services`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=20;

--
-- AUTO_INCREMENT for table `services`
--
ALTER TABLE `services`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT for table `services_spares`
--
ALTER TABLE `services_spares`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=19;

--
-- AUTO_INCREMENT for table `spares`
--
ALTER TABLE `spares`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

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
