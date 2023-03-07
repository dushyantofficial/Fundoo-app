-- phpMyAdmin SQL Dump
-- version 5.1.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jan 07, 2023 at 12:27 PM
-- Server version: 10.4.19-MariaDB
-- PHP Version: 7.4.19

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `fundoo_app_db`
--

-- --------------------------------------------------------

--
-- Table structure for table `assign_drivers`
--

CREATE TABLE `assign_drivers` (
  `id` int(10) UNSIGNED NOT NULL,
  `user_id` int(10) UNSIGNED NOT NULL,
  `driver_id` int(10) UNSIGNED DEFAULT NULL,
  `type` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `weekly_off` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `accomodation` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `work_time_from` datetime NOT NULL,
  `work_time_to` datetime NOT NULL,
  `from_date` datetime NOT NULL,
  `to_date` datetime NOT NULL,
  `salary` decimal(8,2) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `assign_drivers`
--

INSERT INTO `assign_drivers` (`id`, `user_id`, `driver_id`, `type`, `weekly_off`, `accomodation`, `work_time_from`, `work_time_to`, `from_date`, `to_date`, `salary`, `created_at`, `updated_at`, `deleted_at`) VALUES
(2, 324, 104, 'valet_parking', 'sunday', 'world', '2021-10-05 12:01:00', '2021-10-15 01:22:00', '2021-10-05 00:00:00', '2021-10-15 00:00:00', '15000.00', '2022-10-07 01:13:18', '2022-10-07 01:13:18', NULL),
(3, 192, 99, 'valet_parking', 'sunday', 'world', '2021-10-05 12:01:00', '2021-10-15 01:22:00', '2021-10-05 00:00:00', '2021-10-15 00:00:00', '15000.00', '2022-10-07 01:41:13', '2022-10-07 01:41:13', NULL),
(4, 192, 101, 'valet_parking', 'sunday', 'world', '2021-10-05 12:01:00', '2021-10-15 01:22:00', '2021-10-05 00:00:00', '2021-10-15 00:00:00', '15000.00', '2022-10-07 01:41:19', '2022-10-07 01:41:19', NULL),
(5, 227, 206, 'permanent', 'weekly', 'world', '2021-10-15 12:01:00', '2021-10-17 01:22:00', '2021-10-15 00:00:00', '2021-10-17 00:00:00', '17000.00', '2022-10-09 23:17:36', '2022-10-09 23:17:36', NULL),
(6, 279, 128, 'valet_parking', 'sunday', 'world', '2021-10-05 12:01:00', '2021-10-15 01:22:00', '2021-10-05 00:00:00', '2021-10-15 00:00:00', '15000.00', '2022-11-08 05:37:09', '2022-11-08 05:37:09', NULL),
(7, 279, 209, 'valet_parking', 'sunday', 'world', '2021-10-05 12:01:00', '2021-10-15 01:22:00', '2021-10-05 00:00:00', '2021-10-15 00:00:00', '15000.00', '2022-11-08 06:38:01', '2022-11-08 06:38:01', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `bookings`
--

CREATE TABLE `bookings` (
  `id` int(10) UNSIGNED NOT NULL,
  `customer_id` int(10) UNSIGNED NOT NULL,
  `driver_id` int(10) UNSIGNED DEFAULT NULL,
  `pickup_drop_or_temp` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `incity_or_out_city` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `live_or_advance` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `start_late` decimal(10,8) NOT NULL,
  `start_long` decimal(11,8) NOT NULL,
  `destination_late` decimal(10,8) NOT NULL,
  `destination_long` decimal(11,8) NOT NULL,
  `start_or_pickup_date` date NOT NULL,
  `start_or_pickup_time` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `end_or_drop_date` date NOT NULL,
  `end_or_drop_time` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `assign_driver_date` datetime DEFAULT NULL,
  `total_payment` decimal(8,2) NOT NULL,
  `picture_befor_start` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `picture_befor_end` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `cancel_reason` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `total_panelty` decimal(10,0) DEFAULT NULL,
  `reffer_amount` decimal(8,2) DEFAULT NULL,
  `status` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `city` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `state` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `address` varchar(500) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `destination_city` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT 'NULL',
  `destination_state` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT 'NULL',
  `destination_address` varchar(500) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL,
  `car_id` int(10) UNSIGNED DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `bookings`
--

INSERT INTO `bookings` (`id`, `customer_id`, `driver_id`, `pickup_drop_or_temp`, `incity_or_out_city`, `live_or_advance`, `start_late`, `start_long`, `destination_late`, `destination_long`, `start_or_pickup_date`, `start_or_pickup_time`, `end_or_drop_date`, `end_or_drop_time`, `assign_driver_date`, `total_payment`, `picture_befor_start`, `picture_befor_end`, `cancel_reason`, `total_panelty`, `reffer_amount`, `status`, `city`, `state`, `address`, `destination_city`, `destination_state`, `destination_address`, `created_at`, `updated_at`, `deleted_at`, `car_id`) VALUES
(5, 64, 134, 'pickup_drop', 'In City', 'advance_booking', '12.52000000', '21.33000000', '55.56000000', '48.56000000', '2022-07-30', '11:41:41', '2022-08-10', '19:41:41', '2022-07-30 08:11:28', '65000.00', NULL, NULL, NULL, '0', '0.00', 'on_going', 'Palanpur', 'Gujarat', 'Aroma Circle', 'Deesa', 'Gujarat', 'Deepak hotel', '2022-07-07 08:11:41', '2022-07-29 08:11:41', '2022-08-08 04:30:12', 0),
(8, 152, 207, 'temporary', 'Out City', 'advance_booking', '23.59000000', '72.37000000', '23.02000000', '72.57000000', '2022-08-10', '12:41:41', '2022-08-20', '08:23:23', '2022-08-25 08:11:28', '5000.00', NULL, NULL, NULL, '0', '10.50', 'completed', 'Dhanera', 'Gujarat', 'Near Kargil Hotel', 'Deesa', 'Gujarat', 'Deepak Hotel', '2022-08-14 23:29:33', '2022-10-06 23:46:12', NULL, 0),
(9, 146, 107, 'temporary', 'In City', 'live_booking', '23.59000000', '72.37000000', '23.02000000', '72.57000000', '2022-08-10', '12:41:41', '2022-08-20', '08:23:23', '2022-08-25 08:11:28', '18000.00', NULL, NULL, NULL, '0', '0.00', 'completed', 'Mehsana', 'Gujarat', 'Near Radhanpur Circle', 'Unjha', 'Gujarat', 'Near Siddhpur Highway', '2022-08-14 23:38:05', '2022-08-14 23:38:05', NULL, 0),
(10, 136, 285, 'temporary', 'Out City', 'advance_booking', '24.26000000', '72.19000000', '24.17000000', '72.43000000', '2022-08-10', '12:41:41', '2022-08-20', '08:23:23', '2022-08-25 08:11:28', '9000.00', NULL, NULL, NULL, '0', '0.00', 'on_going', 'Palanpur', 'Gujarat', 'Aroma Circle', 'Unjha', 'Gujarat', 'Near Siddhpur Highway', '2022-08-14 23:51:24', '2022-10-11 00:32:36', NULL, 0),
(11, 150, 142, 'pickup_drop', 'In City', 'live_booking', '21.17000000', '72.83000000', '19.08000000', '72.88000000', '2022-08-05', '11:41:41', '2022-08-15', '07:23:23', '2022-07-30 08:11:28', '32000.00', NULL, NULL, NULL, '0', '0.00', 'completed', 'Dhanera', 'Gujarat', 'Near Kargil Hotel', 'Deesa', 'Gujarat', 'Near Radhanpur Highway', '2022-08-15 00:10:18', '2022-08-15 00:10:18', NULL, 0),
(12, 88, 107, 'pickup_drop', 'In City', 'advance_booking', '21.17000000', '72.83000000', '19.08000000', '72.88000000', '2022-08-05', '11:41:41', '2022-08-15', '07:23:23', '2022-07-30 08:11:28', '15000.00', NULL, NULL, NULL, '0', '0.00', 'cancel', 'Siddhpur', 'Gujarat', 'Near Unjha Highway', 'Unjha', 'Gujarat', 'Near Sidddhpur Highway', '2022-08-15 00:11:01', '2022-08-15 00:11:01', NULL, 0),
(13, 72, 148, 'pickup_drop', 'Out City', 'live_booking', '24.26000000', '72.19000000', '24.19000000', '72.01000000', '2022-08-10', '12:41:41', '2022-08-20', '08:23:23', '2022-08-25 08:11:28', '10000.00', NULL, NULL, NULL, '0', '10.50', 'completed', 'Deesa', 'Gujarat', 'Deepak hotel', 'Siddhpur', 'Gujarat', 'Near Unjha Highway', '2022-08-15 00:17:19', '2022-08-15 00:17:19', NULL, 0),
(14, 64, 128, 'temporary', 'Out City', 'advance_booking', '24.26000000', '72.19000000', '23.59000000', '72.37000000', '2022-08-10', '12:41:41', '2022-08-20', '08:23:23', '2022-08-25 08:11:28', '16000.00', NULL, NULL, NULL, '0', '0.00', 'completed', 'Mehsana', 'Gujarat', 'Near Radhanpur Circle', 'Mehsana', 'Gujarat', 'Near Radhanpur Circle', '2022-08-15 00:22:01', '2022-08-15 00:22:01', '2022-08-09 04:35:08', 0),
(16, 73, 99, 'temporary', 'Out City', 'advance_booking', '24.17000000', '72.43000000', '23.80000000', '72.38000000', '2022-08-10', '12:41:41', '2022-08-20', '08:23:23', '2022-08-25 08:11:28', '39000.00', NULL, NULL, NULL, '0', '0.00', 'completed', 'Dhanera', 'Gujarat', 'Near Kargil Hotel', 'Palanpur', 'Gujarat', 'Aroma Circle', '2022-08-15 00:27:50', '2022-08-15 00:27:50', NULL, 0),
(17, 100, 148, 'pickup_drop', 'Out City', 'live_booking', '24.17000000', '72.43000000', '23.80000000', '72.38000000', '2022-08-10', '12:41:41', '2022-08-20', '08:23:23', '2022-08-25 08:11:28', '49999.00', NULL, NULL, NULL, '0', '0.00', 'on_going', 'Siddhpur', 'Gujarat', 'Near Unjha Highway', 'Unjha', 'Gujarat', 'Near Siddhpur Circle', '2022-08-15 00:27:51', '2022-08-22 05:46:17', NULL, 0),
(83, 219, 128, 'temporary', 'Out City', 'advance_booking', '24.17000000', '72.43000000', '23.80000000', '72.38000000', '2022-08-10', '12:41:41', '2022-08-20', '08:23:23', NULL, '209.15', NULL, 'OSTVVAegCEgAcSuRZ14yBMylizrvMdJI6YHbEzDi.ico', NULL, '0', '0.00', 'completed', 'Palanpur', 'Gujarat', 'Aroma Circle', 'Deesa', 'Gujarat', 'Near Siddhpur Highway', '2022-09-12 02:12:32', '2022-12-29 06:41:54', NULL, 0),
(107, 193, 128, 'temporary', 'In City', 'advance_booking', '21.55861000', '70.85267000', '24.17405100', '72.43309800', '2022-09-25', '06:41:41', '2022-09-26', '12:23:23', NULL, '1654.50', NULL, NULL, NULL, NULL, '10.50', 'completed', 'Deesa', 'Gujarat', 'Lorvada', 'Palanpur', 'Gujarat', 'Bihari bag', '2022-10-01 02:15:41', '2022-10-01 02:15:41', NULL, 1),
(108, 208, 286, 'pickup_drop', 'Out City', 'advance_booking', '21.55861000', '70.85267000', '24.17405100', '72.43309800', '2022-09-25', '06:41:41', '2022-09-26', '12:23:23', NULL, '1500.00', NULL, NULL, NULL, NULL, '10.50', 'completed', 'Deesa', 'Gujarat', 'Lorvada', 'Palanpur', 'Gujarat', 'Bihari bag', '2022-10-01 02:17:34', '2022-10-01 02:17:34', NULL, 1),
(110, 219, 148, 'temporary', 'Out City', 'advance_booking', '24.62955000', '72.75194000', '24.25850300', '72.19067400', '2022-09-25', '06:41:41', '2022-09-26', '12:23:23', NULL, '1654.50', NULL, NULL, NULL, NULL, '0.00', 'pending', 'Deesa', 'Gujarat', 'Lorvada', 'Palanpur', 'Gujarat', 'Bihari bag', '2022-10-01 02:56:01', '2022-10-01 02:56:01', NULL, 1),
(111, 219, 107, 'pickup_drop', 'In City', 'advance_booking', '21.55861000', '70.85267000', '24.17405100', '72.43309800', '2022-09-25', '06:41:41', '2022-09-26', '12:23:23', NULL, '1654.50', NULL, NULL, NULL, NULL, '0.00', 'on_going', 'Deesa', 'Gujarat', 'Lorvada', 'Palanpur', 'Gujarat', 'Bihari bag', '2022-10-01 02:57:09', '2022-10-01 02:57:09', NULL, 1),
(112, 219, 139, 'temporary', 'Out City', 'advance_booking', '21.55861000', '70.85267000', '24.17405100', '72.43309800', '2022-09-25', '06:41:41', '2022-09-26', '12:23:23', NULL, '1654.50', NULL, NULL, NULL, NULL, '10.50', 'completed', 'Deesa', 'Gujarat', 'Lorvada', 'Palanpur', 'Gujarat', 'Bihari bag', '2022-10-01 02:57:45', '2022-10-01 02:57:45', NULL, 1),
(113, 219, 99, 'pickup_drop', 'In City', 'advance_booking', '21.55861000', '70.85267000', '24.17405100', '72.43309800', '2022-09-25', '06:41:41', '2022-09-26', '12:23:23', NULL, '1654.50', NULL, NULL, NULL, NULL, '10.50', 'on_going', 'Deesa', 'Gujarat', 'Lorvada', 'Palanpur', 'Gujarat', 'Bihari bag', '2022-10-01 02:58:14', '2022-10-01 02:58:14', NULL, 1),
(115, 219, 194, 'temporary', 'Out City', 'live_booking', '21.55861000', '70.85267000', '24.17405100', '72.43309800', '2022-09-25', '06:41:41', '2022-09-26', '12:23:23', NULL, '1664.20', NULL, NULL, NULL, NULL, '10.50', 'completed', 'Deesa', 'Gujarat', 'Lorvada', 'Palanpur', 'Gujarat', 'Bihari bag', '2022-10-01 04:16:24', '2022-10-01 04:16:24', NULL, 1),
(116, 227, 328, 'pickup_drop', 'Out City', 'advance_booking', '21.55861000', '70.85267000', '24.17405100', '72.43309800', '2022-09-25', '06:41:41', '2022-09-26', '12:23:23', NULL, '1654.50', NULL, NULL, NULL, NULL, '10.50', 'on_going', 'Deesa', 'Gujarat', 'Lorvada', 'Palanpur', 'Gujarat', 'Bihari bag', '2022-10-01 04:18:42', '2022-10-01 04:18:42', NULL, 1);

-- --------------------------------------------------------

--
-- Table structure for table `carcompanies`
--

CREATE TABLE `carcompanies` (
  `id` int(10) UNSIGNED NOT NULL,
  `company_name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `status` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `carcompanies`
--

INSERT INTO `carcompanies` (`id`, `company_name`, `status`, `created_at`, `updated_at`, `deleted_at`) VALUES
(1, 'TATA', 'active', '2022-06-27 02:36:12', '2022-07-15 05:45:51', NULL),
(2, 'Jaguar', 'deactive', '2022-06-27 05:57:02', '2022-07-16 07:41:54', NULL),
(3, 'Maruti Suzuki', 'active', '2022-06-28 02:31:14', '2022-07-20 04:55:40', NULL),
(4, 'Roll\'s Roys', 'active', '2022-07-04 06:15:41', '2022-07-04 06:16:00', '2022-07-04 06:16:00'),
(5, 'srwe', 'active', '2022-07-04 06:16:52', '2022-07-04 06:17:08', '2022-07-04 06:17:08'),
(6, 'HONDA', 'active', '2022-07-14 07:46:21', '2022-07-15 06:36:11', NULL),
(7, 'Maruti', 'active', '2022-07-15 02:14:53', '2022-07-15 06:36:26', NULL),
(8, 'Audi', 'active', '2022-07-16 07:26:06', '2022-07-16 07:26:06', NULL),
(9, 'Mahindra', 'deactive', '2022-07-16 07:27:28', '2022-07-20 04:55:48', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `carmodels`
--

CREATE TABLE `carmodels` (
  `id` int(10) UNSIGNED NOT NULL,
  `company_id` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `model_name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `status` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `carmodels`
--

INSERT INTO `carmodels` (`id`, `company_id`, `model_name`, `status`, `created_at`, `updated_at`, `deleted_at`) VALUES
(1, '2', 'City', 'deactive', '2022-06-24 02:13:32', '2022-07-15 00:57:39', NULL),
(2, '1', 'TATA HEXA', 'active', '2022-06-27 02:36:34', '2022-07-15 00:21:17', NULL),
(3, '2', 'Jaguar', 'deactive', '2022-06-27 05:18:34', '2022-07-16 07:42:53', NULL),
(4, '3', 'my model new', 'active', '2022-07-14 05:26:30', '2022-07-15 06:35:15', NULL),
(5, '2', 'safari', 'deactive', '2022-07-14 05:27:27', '2022-07-15 05:46:27', NULL),
(6, '3', 'Creta', 'deactive', '2022-07-15 01:02:32', '2022-07-16 05:51:28', NULL),
(7, '7', 'TATA NEXON', 'deactive', '2022-07-15 23:46:04', '2022-07-15 23:46:27', '2022-07-15 23:46:27'),
(8, '8', 'Audi', 'active', '2022-07-16 07:28:27', '2022-07-16 07:28:27', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `caryears`
--

CREATE TABLE `caryears` (
  `id` int(10) UNSIGNED NOT NULL,
  `model_id` int(11) NOT NULL,
  `year` int(11) NOT NULL,
  `status` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `caryears`
--

INSERT INTO `caryears` (`id`, `model_id`, `year`, `status`, `created_at`, `updated_at`, `deleted_at`) VALUES
(3, 1, 2023, 'active', '2022-07-14 23:53:13', '2022-07-15 05:36:06', NULL),
(45, 3, 2010, 'deactive', '2022-06-27 02:36:53', '2022-07-04 05:08:54', NULL),
(48, 5, 2005, 'active', '2022-07-15 00:10:26', '2022-07-15 05:46:42', NULL),
(49, 1, 2022, 'active', '2022-07-15 00:36:10', '2022-07-15 06:34:21', NULL),
(50, 2, 2008, 'deactive', '2022-07-15 01:00:50', '2022-07-15 23:46:46', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `car_wash_details`
--

CREATE TABLE `car_wash_details` (
  `id` int(10) UNSIGNED NOT NULL,
  `customer_id` int(10) UNSIGNED NOT NULL,
  `driver_id` int(10) UNSIGNED NOT NULL,
  `car_id` int(10) UNSIGNED NOT NULL,
  `status` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `car_wash_details`
--

INSERT INTO `car_wash_details` (`id`, `customer_id`, `driver_id`, `car_id`, `status`, `created_at`, `updated_at`, `deleted_at`) VALUES
(11, 279, 104, 1, 'pending', '2022-11-17 23:22:29', '2022-11-17 23:22:29', NULL),
(12, 279, 128, 1, 'pending', '2022-12-13 06:33:00', '2022-12-13 06:33:00', NULL),
(13, 279, 128, 2, 'pending', '2022-12-13 06:37:06', '2022-12-13 06:37:06', NULL),
(14, 279, 128, 1, 'pending', '2022-12-13 06:37:17', '2022-12-13 06:37:17', NULL),
(15, 279, 128, 1, 'pending', '2022-12-13 06:52:02', '2022-12-13 06:52:02', NULL),
(16, 192, 104, 1, 'pending', '2022-12-13 07:24:22', '2022-12-13 07:24:22', NULL),
(17, 192, 104, 2, 'pending', '2022-12-13 07:33:45', '2022-12-13 07:33:45', NULL),
(18, 192, 104, 3, 'pending', '2022-12-13 07:33:52', '2022-12-13 07:33:52', NULL),
(19, 192, 104, 3, 'pending', '2022-12-13 10:43:30', '2022-12-13 10:43:30', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `cities`
--

CREATE TABLE `cities` (
  `id` int(10) UNSIGNED NOT NULL,
  `city_name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `pincode` int(11) NOT NULL,
  `status` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `state_id` int(11) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `cities`
--

INSERT INTO `cities` (`id`, `city_name`, `pincode`, `status`, `state_id`, `created_at`, `updated_at`, `deleted_at`) VALUES
(1, 'Palanpur', 385001, 'active', 1, '2022-07-16 06:57:39', '2022-07-16 06:57:39', NULL),
(2, 'Deesa', 385535, 'active', 1, '2022-07-16 06:57:48', '2022-07-16 06:57:48', NULL),
(3, 'Patan', 384265, 'active', 1, '2022-07-16 06:57:58', '2022-07-16 06:57:58', NULL),
(4, 'Amritsar', 143001, 'active', 3, '2022-07-16 06:58:24', '2022-07-16 06:58:37', NULL),
(5, 'Jaipur', 302001, 'active', 4, '2022-07-16 06:58:48', '2022-07-16 06:58:48', NULL),
(6, 'Firozabad', 283203, 'active', 2, '2022-07-16 06:59:46', '2022-07-16 06:59:46', NULL),
(7, 'Siri', 488441, 'active', 2, '2022-07-16 07:00:01', '2022-07-16 07:00:01', NULL),
(8, 'Mehrauli', 110030, 'active', 2, '2022-07-16 07:00:18', '2022-07-16 07:00:18', NULL),
(9, 'Ludhiana', 141001, 'active', 3, '2022-07-16 07:00:51', '2022-07-16 07:00:51', NULL),
(10, 'Jalandhar', 144001, 'active', 3, '2022-07-16 07:01:03', '2022-07-16 07:01:03', NULL),
(11, 'Udaipur', 313001, 'active', 4, '2022-07-16 07:01:37', '2022-07-16 07:01:37', NULL),
(12, 'Jodhpur', 342002, 'active', 4, '2022-07-16 07:01:52', '2022-07-18 00:58:42', NULL),
(13, 'Ahmedabad', 380001, 'active', 1, '2022-07-18 00:59:27', '2022-07-18 00:59:27', NULL),
(14, 'Surat', 395003, 'active', 1, '2022-07-18 01:00:02', '2022-07-18 01:00:02', NULL),
(15, 'Vadodara', 390001, 'active', 1, '2022-07-18 01:00:16', '2022-07-18 01:00:16', NULL),
(16, 'Rajkot', 360001, 'active', 1, '2022-07-18 01:01:02', '2022-07-18 01:01:02', NULL),
(17, 'Bhavnagar', 364001, 'active', 1, '2022-07-18 01:01:36', '2022-07-18 01:01:36', NULL),
(18, 'Gandhinagar', 382010, 'active', 1, '2022-07-18 01:01:54', '2022-07-18 01:01:54', NULL),
(19, 'Gandhidham', 370201, 'active', 1, '2022-07-18 01:02:11', '2022-07-18 01:02:11', NULL),
(20, 'Bhuj', 0, 'active', 1, '2022-07-18 01:02:46', '2022-07-18 01:02:46', NULL),
(21, 'Dahod', 0, 'active', 1, '2022-07-18 01:04:06', '2022-07-18 01:04:06', NULL),
(22, 'Mehsana', 0, 'active', 1, '2022-07-18 01:04:35', '2022-07-18 01:04:35', NULL),
(23, 'Sunam', 0, 'active', 3, '2022-07-18 01:10:51', '2022-07-18 01:10:51', NULL),
(24, 'Faridkot', 0, 'active', 3, '2022-07-18 01:11:07', '2022-07-18 01:11:07', NULL),
(25, 'Kapurthala', 0, 'active', 3, '2022-07-18 01:11:23', '2022-07-18 01:11:23', NULL),
(26, 'Rajpura', 0, 'active', 3, '2022-07-18 01:11:38', '2022-07-18 01:11:38', NULL),
(27, 'Phagwara', 0, 'active', 3, '2022-07-18 01:12:00', '2022-07-18 01:12:00', NULL),
(28, 'Khanna', 0, 'active', 3, '2022-07-18 01:12:20', '2022-07-18 01:12:20', NULL),
(29, 'Malerkotla', 0, 'active', 3, '2022-07-18 01:12:34', '2022-07-18 01:12:34', NULL),
(30, 'Moga', 0, 'active', 3, '2022-07-18 01:12:52', '2022-07-18 01:12:52', NULL),
(31, 'Pathankot', 0, 'active', 3, '2022-07-18 01:13:09', '2022-07-18 01:13:09', NULL),
(32, 'Batala', 0, 'active', 3, '2022-07-18 01:13:21', '2022-07-18 01:13:21', NULL),
(33, 'Bawana', 0, 'active', 2, '2022-07-18 01:16:13', '2022-07-18 01:16:13', NULL),
(34, 'Burari', 0, 'active', 2, '2022-07-18 01:16:42', '2022-07-18 01:16:42', NULL),
(35, 'Barwala', 0, 'active', 2, '2022-07-18 01:17:36', '2022-07-18 01:17:36', NULL),
(36, 'Asola', 0, 'active', 2, '2022-07-18 01:17:59', '2022-07-18 01:17:59', NULL),
(37, 'Ali Pur', 0, 'active', 2, '2022-07-18 01:18:17', '2022-07-18 01:18:17', NULL),
(38, 'Aali', 0, 'active', 2, '2022-07-18 01:18:37', '2022-07-18 01:18:37', NULL),
(39, 'Aya Nagar', 0, 'active', 2, '2022-07-18 01:19:02', '2022-07-18 01:19:02', NULL),
(40, 'Deoli', 0, 'active', 2, '2022-07-18 01:19:21', '2022-07-18 01:19:21', NULL),
(41, 'Jait Pur', 0, 'active', 2, '2022-07-18 01:19:39', '2022-07-18 01:19:39', NULL),
(42, 'Mustafabad', 0, 'active', 2, '2022-07-18 01:20:10', '2022-07-18 01:20:10', NULL),
(43, 'Ajmer', 0, 'active', 4, '2022-07-18 01:21:11', '2022-07-18 01:21:11', NULL),
(44, 'Ganganagar', 0, 'active', 4, '2022-07-18 01:21:44', '2022-07-18 01:21:44', NULL),
(45, 'Sikar', 0, 'active', 4, '2022-07-18 01:21:56', '2022-07-18 01:21:56', NULL),
(46, 'Pali', 0, 'active', 4, '2022-07-18 01:22:13', '2022-07-18 01:22:13', NULL),
(47, 'Gangapur City', 0, 'active', 4, '2022-07-18 01:22:29', '2022-07-18 01:22:29', NULL),
(48, 'Churu', 0, 'deactive', 4, '2022-07-18 01:22:51', '2022-07-21 00:03:53', NULL),
(49, 'Baran', 0, 'active', 4, '2022-07-18 01:23:10', '2022-07-18 01:23:10', NULL),
(50, 'Chittaurgarh', 0, 'active', 4, '2022-07-18 01:23:27', '2022-07-18 01:23:27', NULL),
(51, 'Makrana', 0, 'active', 4, '2022-07-18 01:23:43', '2022-08-02 23:58:07', '2022-08-02 23:58:07'),
(52, 'Nagaur', 0, 'active', 4, '2022-07-18 01:24:00', '2022-08-02 23:58:13', '2022-08-02 23:58:13'),
(53, 'ddfdfdf', 0, 'active', 2, '2022-07-28 01:05:35', '2022-07-28 01:05:35', NULL),
(54, 'Jodhpur', 0, 'active', 4, '2022-07-28 03:46:12', '2022-07-28 03:46:12', NULL),
(55, 'Hariyana', 244413, 'active', 3, '2022-07-30 02:55:21', '2022-09-12 00:31:09', NULL),
(56, 'Dhanera', 385310, 'active', 1, '2022-08-01 02:09:54', '2022-09-12 00:30:32', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `contactus`
--

CREATE TABLE `contactus` (
  `id` int(10) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `phone` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `message` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `customer_car_details`
--

CREATE TABLE `customer_car_details` (
  `id` int(10) UNSIGNED NOT NULL,
  `user_id` int(10) UNSIGNED NOT NULL,
  `company_name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `model_name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `year` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `manual_or_automatic` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `number_plate` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `car_photos` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `status` int(11) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `customer_car_details`
--

INSERT INTO `customer_car_details` (`id`, `user_id`, `company_name`, `model_name`, `year`, `manual_or_automatic`, `number_plate`, `car_photos`, `status`, `created_at`, `updated_at`, `deleted_at`) VALUES
(1, 219, 'Hero', 'City', '2022', 'Automatic', 'GJ.08 BC-7065', 'YstadMGdy8imxYWWICVYobDzDIVA3GLt5Gp8n8m3.jpg', 0, '2022-09-13 02:10:26', '2022-09-13 02:10:26', NULL),
(2, 279, 'Jaguar', 'Jaguar', '2021', 'Automatic', 'GJ.08 BC-7265', 'ieTjPEBQveQ0hk2xnerAqmNyWpIYnxVhl7Bb9d6Z.jpg', 0, '2022-09-13 02:12:33', '2022-09-13 02:12:33', NULL),
(3, 281, 'Roll\'s Roys', 'Roll\'s Roys', '2023', 'Automatic', 'GJ.08 BC-7985', '5ZdsRz1bBT6aVAIspHx1HObeCNs3TtR43hpTqCoV.jpg', 0, '2022-09-13 02:13:36', '2022-09-13 02:13:36', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `customer_extends`
--

CREATE TABLE `customer_extends` (
  `id` int(10) UNSIGNED NOT NULL,
  `user_id` int(10) UNSIGNED NOT NULL,
  `apartment` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `block_flat` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `pincode` int(11) DEFAULT NULL,
  `city` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `state` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `address_type` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `status` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL,
  `start_late` decimal(10,8) DEFAULT NULL,
  `start_long` decimal(11,8) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `customer_extends`
--

INSERT INTO `customer_extends` (`id`, `user_id`, `apartment`, `block_flat`, `pincode`, `city`, `state`, `address_type`, `status`, `created_at`, `updated_at`, `deleted_at`, `start_late`, `start_long`) VALUES
(1, 1, 'Vinay Park', 'Aburoad Highway', 382715, 'Mahesana', 'Gujarat', '12', 'active', '2022-07-06 22:49:38', '2022-07-07 00:31:11', '2022-08-25 12:58:38', '0.00000000', '0.00000000'),
(5, 5, 'Rajeshwari Park', 'Near Gathaman', 382460, 'Ahmedabad', 'Gujarat', 'home', 'active', '2022-07-08 04:29:48', '2022-09-03 07:17:17', NULL, '0.00000000', '0.00000000'),
(6, 21, 'Arbuda Park', 'Mehsana Highway', 385555, 'Deesa', 'Gujarat', '12', 'active', '2022-07-07 00:05:18', '2022-07-07 00:23:21', '2022-08-23 12:58:30', '0.00000000', '0.00000000'),
(7, 23, 'Vivekananda Society', 'Deesa Highway', 385001, 'Palanpur', 'Gujarat', '12', 'active', '2022-07-07 00:06:20', '2022-07-07 00:23:12', '2022-08-09 12:58:25', '0.00000000', '0.00000000'),
(8, 24, 'Naman Park', 'ABC Apartment', 391121, 'Vadodara', 'Gujarat', '23', 'active', '2022-07-07 00:30:12', '2022-07-07 03:17:19', '2022-08-15 12:58:42', '0.00000000', '0.00000000'),
(11, 35, 'Sundaram Society', 'Near Excellancy Hotel', 388270, 'Panch Mahals', 'Gujarat', 'home', 'active', '2022-07-07 06:54:10', '2022-07-15 23:51:01', NULL, '0.00000000', '0.00000000'),
(13, 44, 'Shiv Arcade', 'Aburoad Highway', 388130, 'Anand', 'Gujarat', 'office', 'deactive', '2022-07-08 02:07:06', '2022-07-15 06:41:54', NULL, '0.00000000', '0.00000000'),
(20, 72, 'Vinod Park', 'Near Hawai Pillar', 396060, 'Navsari', 'Gujarat', 'home', 'active', '2022-07-14 06:44:21', '2022-07-14 06:44:21', NULL, '0.00000000', '0.00000000'),
(21, 73, 'Somnath Society', 'Near College Road', 384265, 'Patan', 'Gujarat', 'home', 'active', '2022-07-14 06:47:40', '2022-07-31 23:11:29', NULL, '0.00000000', '0.00000000'),
(22, 74, 'Chandralok Society', 'Lionsclub Road', 383001, 'Sabarkantha', 'Gujarat', 'home', 'active', '2022-07-14 06:48:38', '2022-07-14 06:48:38', NULL, '0.00000000', '0.00000000'),
(23, 76, 'Vijay Park', 'Near Palanpur Highway', 370655, 'Kachchh', 'Gujarat', 'home', 'active', '2022-07-14 07:01:51', '2022-07-15 06:04:08', NULL, '0.00000000', '0.00000000'),
(29, 88, 'Shilp Arcade', '3\'rd Flour', 362268, 'Junagadh', 'Gujarat', 'office', 'active', '2022-07-16 04:28:16', '2022-09-01 23:12:41', NULL, '0.00000000', '0.00000000'),
(30, 100, 'Namaste Society', 'Near Bihari Baag', 388225, 'Kheda', 'Gujarat', 'home', 'deactive', '2022-07-18 05:16:51', '2022-07-18 05:16:51', NULL, '0.00000000', '0.00000000'),
(32, 105, 'Kismet Park', 'Near Mehsana Highway', 509210, 'Adilabad', 'Andhra Pradesh', 'home', 'active', '2022-07-21 00:34:02', '2022-07-21 00:34:02', NULL, '0.00000000', '0.00000000'),
(40, 117, 'Kishor Park', 'Near Gathaman', 521333, 'Krishna', 'Andhra Pradesh', 'home', 'active', '2022-07-26 06:17:15', '2022-07-26 06:17:15', NULL, '0.00000000', '0.00000000'),
(41, 136, 'Shiv Arcade', '3\'rd Flour', 802201, 'Bhojpur', 'Bihar', 'office', 'active', '2022-08-01 01:44:48', '2022-08-01 01:46:06', NULL, '0.00000000', '0.00000000'),
(42, 137, 'Shilp Arcade', '3\'rd Flour', 854336, 'Araria', 'Bihar', 'office', 'active', '2022-08-01 02:40:12', '2022-08-01 02:40:12', NULL, '0.00000000', '0.00000000'),
(46, 146, 'Shivnagar', 'Near Sports Club', 385001, 'Palanpur', 'Gujarat', 'home', 'active', '2022-08-10 07:28:30', '2022-10-13 02:51:54', NULL, '0.00000000', '0.00000000'),
(47, 150, 'Hinglaj Park', 'Deesa Highway', 803214, 'Patna', 'Bihar', 'home', 'active', '2022-08-12 02:43:06', '2022-08-12 02:43:06', NULL, '0.00000000', '0.00000000'),
(48, 151, 'Ramnagar', 'Near Gayatri Mandir', 326022, 'Jhalawar', 'Rajasthan', 'home', 'active', '2022-08-12 02:44:02', '2022-08-12 02:44:02', NULL, '0.00000000', '0.00000000'),
(49, 152, 'Somnath Society', 'Lionsclub Road', 322702, '	Sawai Madhopur', 'Rajasthan', 'home', 'active', '2022-08-12 02:45:04', '2022-08-12 02:45:04', NULL, '0.00000000', '0.00000000'),
(53, 161, 'Namaste Society', 'Near Palanpur Highway', 322240, 'Dausa', 'Rajasthan', 'home', 'active', '2022-08-22 05:10:41', '2022-08-22 05:10:41', NULL, '0.00000000', '0.00000000'),
(55, 163, 'Kismet Park', 'Near College Road', 335501, 'Hanumangarh', 'Rajasthan', 'home', 'active', '2022-08-22 05:44:08', '2022-08-22 05:44:08', NULL, '0.00000000', '0.00000000'),
(56, 164, 'Chandralok Society', 'Near Mehsana Highway', 332701, 'Sikar', 'Rajasthan', 'home', 'active', '2022-08-22 05:45:50', '2022-08-22 05:45:50', NULL, '0.00000000', '0.00000000'),
(57, 165, 'Shiv Arcade', 'Near Aroma Circle, Deesa Highway', 321611, 'Karauli', 'Rajasthan', 'office', 'active', '2022-08-22 05:49:42', '2022-08-22 05:49:42', NULL, '0.00000000', '0.00000000'),
(58, 166, 'Maharaja Park', 'Near Hawai Pillar', 333021, 'Jhujhunu', 'Rajasthan', 'office', 'active', '2022-08-22 05:50:03', '2022-08-22 05:50:03', NULL, '0.00000000', '0.00000000'),
(59, 167, 'Vijay Park', 'Near Sports Club', 323603, 'Bundi	', 'Rajasthan', 'office', 'active', '2022-08-22 05:50:58', '2022-08-22 05:50:58', NULL, '0.00000000', '0.00000000'),
(60, 168, 'Vinay Park', 'Aburoad Highway', 306302, 'Pali', 'Rajasthan', 'office', 'active', '2022-08-22 05:51:15', '2022-08-22 05:51:15', NULL, '0.00000000', '0.00000000'),
(61, 169, 'Satyam Park', 'Near Bihari Baag', 325217, 'Baran', 'Rajasthan', 'office', 'active', '2022-08-22 05:52:39', '2022-08-22 05:52:39', NULL, '0.00000000', '0.00000000'),
(62, 170, 'Gurudev Society', 'Near Excellancy Hotel', 328041, 'Dholpur', 'Rajasthan', 'office', 'active', '2022-08-22 05:54:26', '2022-08-22 05:54:26', NULL, '0.00000000', '0.00000000'),
(63, 171, 'Rajeshwari Park', 'Near Mehsana Highway', 331403, 'Churu', 'Rajasthan', 'office', 'active', '2022-08-22 05:54:54', '2022-08-22 05:54:54', NULL, '0.00000000', '0.00000000'),
(64, 172, 'Tirumala Residency', 'Near Palanpur Highway', 311402, 'Bhilwara', 'Rajasthan', 'office', 'active', '2022-08-22 05:57:02', '2022-08-22 05:57:02', NULL, '0.00000000', '0.00000000'),
(65, 173, 'Shivnagar', 'Near Aroma Circle, Deesa Highway', 327034, 'Banswara', 'Rajasthan', 'office', 'active', '2022-08-22 05:57:21', '2022-08-22 05:57:21', NULL, '0.00000000', '0.00000000'),
(66, 174, 'Vandana Banglows', 'Deesa Highway', 321411, 'Bharatpur', 'Rajasthan', 'home', 'active', '2022-08-22 06:05:59', '2022-08-22 06:05:59', NULL, '0.00000000', '0.00000000'),
(67, 175, 'Tirupati Township', 'Near Excellancy Hotel', 313611, 'Udaipur', 'Rajasthan', 'home', 'active', '2022-08-22 06:06:13', '2022-08-22 06:06:13', NULL, '0.00000000', '0.00000000'),
(68, 176, 'Jalaram Banglows', 'Near Bihari Baag', 305002, 'Ajmer', 'Rajasthan', 'home', 'active', '2022-08-22 06:06:47', '2022-08-22 06:06:47', NULL, '0.00000000', '0.00000000'),
(69, 177, 'Navjivan Park', 'Aburoad Highway', 345001, 'Jaisalmer', 'Rajasthan', 'home', 'active', '2022-08-22 06:09:35', '2022-08-22 06:09:35', NULL, '0.00000000', '0.00000000'),
(70, 178, 'Pink City', 'Near Sports Club', 341025, 'Nagaur', 'Rajasthan', 'home', 'active', '2022-08-22 06:12:11', '2022-08-22 06:12:11', NULL, '0.00000000', '0.00000000'),
(71, 179, 'N.R.Park', 'Near Hawai Pillar', 343041, 'Jalor', 'Rajasthan', 'home', 'active', '2022-08-22 06:12:59', '2022-08-22 06:12:59', NULL, '0.00000000', '0.00000000'),
(78, 192, 'Golden Park', 'Shiv Arcade', 312615, 'Chittorgarh', 'Rajasthan', 'home', 'active', '2022-08-23 06:06:14', '2022-08-23 06:06:14', NULL, '0.00000000', '0.00000000'),
(82, 208, 'Vivekananda Society', 'Near Mehsana Highway', 342311, 'Jodhpur', 'Rajasthan', 'home', 'active', '2022-08-26 02:03:16', '2022-08-26 02:03:16', NULL, '0.00000000', '0.00000000'),
(83, 210, 'Navrang Park', 'Shiv Arcade', 325001, 'Kota', 'Rajasthan', 'office', 'active', '2022-08-29 00:31:05', '2022-08-29 00:31:05', NULL, '0.00000000', '0.00000000'),
(84, 219, 'Radhika Flat', '101', 385535, 'Deesa', 'Gujarat', 'other', 'active', '2022-08-30 01:23:54', '2022-10-20 06:16:20', NULL, '12.00000000', '21.00000000'),
(85, 224, 'Sundaram Society', 'Near Aroma Circle, Deesa Highway', 307026, 'Sirohi', 'Rajasthan', NULL, 'active', '2022-09-01 05:26:53', '2022-09-01 05:26:53', NULL, '0.00000000', '0.00000000'),
(87, 227, '12', '1', 385535, '1', '1', 'home', 'active', '2022-09-05 02:32:02', '2022-11-25 09:22:34', NULL, NULL, NULL),
(88, 146, 'Bihari bag,Domino\'s Pizza', '2nd floor', 385001, 'Palanpur', 'Gujarat', 'office', 'active', '2022-09-13 04:21:24', '2022-09-13 04:21:24', NULL, '0.00000000', '0.00000000'),
(89, 146, 'Sai bag,college road,deesa', '3rd floor', 385535, 'Deesa', 'Gujarat', 'other', 'active', '2022-09-13 04:26:21', '2022-09-13 04:26:21', NULL, '0.00000000', '0.00000000'),
(94, 276, 'Shiv Arcade', 'Near Gayatri Mandir', 385535, 'Deesa', 'Gujarat', 'home', 'active', '2022-10-01 04:07:50', '2022-10-01 04:07:50', NULL, NULL, NULL),
(96, 279, 'Shiv Arcade', 'Near  Ramnagar', 385535, 'Deesa', 'Gujarat', 'home', 'active', '2022-10-01 04:11:04', '2022-10-01 04:11:04', NULL, NULL, NULL),
(97, 280, 'Gayatri Mandir', 'Near  Ramnagar', 385535, 'Deesa', 'Gujarat', 'home', 'active', '2022-10-01 04:13:07', '2022-10-01 04:13:07', NULL, NULL, NULL),
(98, 281, 'Shilp Arcade', 'Near Gayatri Mandir', 385535, 'Palanpur', 'Gujarat', 'home', 'active', '2022-10-01 04:19:26', '2022-10-01 04:19:26', NULL, NULL, NULL),
(99, 323, '89', '56', 382254, 'Palanpur', 'Gujarat', 'home', 'active', '2022-12-12 12:39:24', '2022-12-12 12:39:24', NULL, NULL, NULL),
(100, 324, 'dfgdf', 'fgfdg', 384151, 'siddhpur', 'GUJARAT', 'home', 'active', '2022-12-13 05:06:52', '2022-12-13 05:06:52', NULL, NULL, NULL),
(101, 328, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `daily_reportings`
--

CREATE TABLE `daily_reportings` (
  `id` int(10) UNSIGNED NOT NULL,
  `assign_driver_id` int(10) UNSIGNED NOT NULL,
  `check_in` datetime DEFAULT NULL,
  `check_out` datetime DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `daily_reportings`
--

INSERT INTO `daily_reportings` (`id`, `assign_driver_id`, `check_in`, `check_out`, `created_at`, `updated_at`, `deleted_at`) VALUES
(1, 128, '2022-08-05 05:17:53', '2022-08-05 05:17:59', '2022-08-04 23:47:53', '2022-08-04 23:47:59', NULL),
(2, 128, '2022-08-05 05:18:28', '2022-08-05 05:41:47', '2022-05-04 23:48:28', '2022-08-04 00:11:47', NULL),
(3, 128, '2022-08-05 05:42:41', '2022-08-06 05:46:49', '2022-06-06 00:12:41', '2022-08-06 00:16:49', NULL),
(6, 128, '2022-08-06 06:40:23', '2022-08-06 06:41:03', '2022-08-06 01:10:23', '2022-08-06 01:11:03', NULL),
(7, 128, '2022-08-09 10:26:19', '2022-08-09 11:23:50', '2022-08-09 04:56:19', '2022-08-09 05:53:50', NULL),
(8, 74, '2022-08-09 06:34:14', '2022-08-10 06:48:20', '2022-08-10 01:04:14', '2022-08-10 01:18:20', NULL),
(9, 117, '2022-08-10 06:49:14', '2022-08-10 06:49:28', '2022-08-10 01:19:14', '2022-08-10 01:19:28', NULL),
(10, 206, '2022-08-21 17:21:58', '2022-11-20 17:04:08', '2022-11-20 02:29:17', '2022-11-20 02:29:17', NULL),
(12, 206, '2022-11-20 11:49:20', '2022-11-20 11:49:24', '2022-11-20 06:19:20', '2022-11-20 06:19:24', NULL),
(13, 206, '2022-11-21 11:52:42', '2022-11-21 11:52:45', '2022-11-21 06:22:42', '2022-11-21 06:22:45', NULL),
(16, 128, '2022-11-22 06:07:51', '2022-11-22 06:08:16', '2022-11-22 00:37:51', '2022-11-22 00:38:16', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `driver_categories`
--

CREATE TABLE `driver_categories` (
  `id` int(10) UNSIGNED NOT NULL,
  `user_id` int(10) UNSIGNED DEFAULT NULL,
  `category_name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `category_key` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `driver_categories`
--

INSERT INTO `driver_categories` (`id`, `user_id`, `category_name`, `category_key`, `created_at`, `updated_at`, `deleted_at`) VALUES
(1, 1, 'Permanent new', '1', '2022-06-25 07:32:18', '2022-07-29 07:31:19', NULL),
(2, NULL, 'Temporary', '4', '2022-07-15 02:07:05', '2022-07-18 05:15:06', NULL),
(3, NULL, 'Valet Parking', '2', '2022-07-15 02:42:46', '2022-07-18 05:15:33', NULL),
(4, NULL, 'PickUp-Drop', '12', '2022-07-16 07:28:01', '2022-07-18 05:16:07', NULL),
(5, NULL, 'ASSMABLE2', '2', '2022-07-16 07:28:21', '2022-07-18 05:16:12', '2022-07-18 05:16:12');

-- --------------------------------------------------------

--
-- Table structure for table `driver_extendeds`
--

CREATE TABLE `driver_extendeds` (
  `id` int(10) UNSIGNED NOT NULL,
  `user_id` int(10) UNSIGNED DEFAULT NULL,
  `aditional_contact_no` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `expriance` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `post_ads_appartment` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `post_ads_block_flat` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `post_ads_proof` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `post_ads_pincode` int(11) DEFAULT NULL,
  `post_ads_city` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `post_ads_state` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `post_ads_type` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `resi_ads_type` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `resi_ads_apartment` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `resi_ads_block_flate` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `resi_ads_pincode` int(11) DEFAULT NULL,
  `resi_ads_city` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `resi_ads_state` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `resi_ads_proof` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `license` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `license_status` int(11) DEFAULT 0,
  `driving_licence_reject_reason` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `aadhar_card` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `aadhar_card_status` int(11) DEFAULT 0,
  `aadhar_card_reject_reason` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `pancard` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `pancard_status` int(11) DEFAULT 0,
  `pancard_reject_reason` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `light_bill` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `light_bill_status` int(11) DEFAULT 0,
  `light_bill_reject_reason` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `language_known` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `monthly_salary` decimal(8,2) DEFAULT NULL,
  `work_type` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `multi_work_type` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `work_time` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `work_station` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `is_kyc_verify` int(11) DEFAULT NULL,
  `driver_type` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `vehicle_type` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `select_vehicle_type` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `account_number` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `account_holder_name` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `ifsc_code` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `branch_name` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL,
  `post_ads_late` decimal(10,8) DEFAULT NULL,
  `post_ads_long` decimal(11,8) DEFAULT NULL,
  `resi_ads_late` decimal(10,8) DEFAULT NULL,
  `resi_ads_long` decimal(11,8) DEFAULT NULL,
  `current_location` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `driver_extendeds`
--

INSERT INTO `driver_extendeds` (`id`, `user_id`, `aditional_contact_no`, `expriance`, `post_ads_appartment`, `post_ads_block_flat`, `post_ads_proof`, `post_ads_pincode`, `post_ads_city`, `post_ads_state`, `post_ads_type`, `resi_ads_type`, `resi_ads_apartment`, `resi_ads_block_flate`, `resi_ads_pincode`, `resi_ads_city`, `resi_ads_state`, `resi_ads_proof`, `license`, `license_status`, `driving_licence_reject_reason`, `aadhar_card`, `aadhar_card_status`, `aadhar_card_reject_reason`, `pancard`, `pancard_status`, `pancard_reject_reason`, `light_bill`, `light_bill_status`, `light_bill_reject_reason`, `language_known`, `monthly_salary`, `work_type`, `multi_work_type`, `work_time`, `work_station`, `is_kyc_verify`, `driver_type`, `vehicle_type`, `select_vehicle_type`, `account_number`, `account_holder_name`, `ifsc_code`, `branch_name`, `created_at`, `updated_at`, `deleted_at`, `post_ads_late`, `post_ads_long`, `resi_ads_late`, `resi_ads_long`, `current_location`) VALUES
(2, 16, '9586958695', '6.79', 'Veer Krupa Society', 'Near Palanpur Highway', 'Tulips.jpg', 385001, '1', '1', 'number', NULL, 'palanpur', 'yes', 385001, '1', '1', 'Hydrangeas.jpg', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '[\"gujarati\",\"hindi\",\"english\",\"punjabi\"]', '10000.00', 'valet_parking', '', '', 'yes', 12, '', '', '[\"tempo\",\"bus\",\"hydra_crane\"]', '', '', '', '', '2022-07-01 04:15:24', '2022-07-05 05:30:05', '2022-07-05 05:30:05', '0.00000000', '0.00000000', '0.00000000', '0.00000000', NULL),
(14, 104, '9898989898', NULL, 'Ramnagar Society', 'Near Dhanera Highway', 'Yhnq47a9J1JHOJcAjQhKoosBDNqR2loXClBugo4m.png', 385001, 'Palanpur', 'Gujarat', NULL, NULL, 'Ramnagar Society', 'Near Dhanera Highway', 385001, 'Palanpur', 'Gujarat', '7yBL0KFhpuzsWVddtHme8TUHsydU2J8tUGTml4uM.png', 'ezvNTg3lx2Wo06NAtG0MBS0grwJ1yimBwtjG0ZTq.png', 1, NULL, 'XXu7Z5jGxrImuV87VNHpk0K0JqlOb85d2sK2yBcS.png', 1, NULL, 'oC1OfRUYyM8Ple4n5jrSH8HGQTu9bfCM2G8cetVj.png', 1, NULL, 'MPxSiIM9k2nrc6R92dWA0r5BZNxwNEOGdEIt8r27.png', 1, NULL, '[\"gujarati\",\"hindi\",\"english\",\"sindhi\",\"tamil\",\"telugu\"]', '10000.00', 'permanent', '[\"permanent\"]', 'day', 'yes', NULL, 'car_driver', 'manual', '[\"tempo\",\"hydra_crane\",\"tractor\"]', NULL, NULL, NULL, NULL, '2022-07-05 06:54:55', '2022-11-18 01:24:32', NULL, '0.00000000', '0.00000000', '0.00000000', '0.00000000', NULL),
(21, 5, '9586958695', NULL, 'Viraj Society', 'Near Chhapi Highway', 'wZik4Y5eWXV7fZS9a5hODquUEHMZp6ZmtjxYCbwN.png', 385001, 'Deesa', 'Gujarat', NULL, NULL, 'Viraj Society', 'Near Chhapi Highway', 385001, 'Deesa', 'Gujarat', 'X4FPlZvVRx97mhA30FrTDad02Q1t8jMkaFnUU9Iu.png', 'YPcghaZjMGblnKfQ3ZF8eqOVS9XGhHr8UTbwt3PM.png', NULL, NULL, 'dh9Kd9pFHulDnM9RIpCdlubCmfdyJUpZreXyKq0O.png', NULL, NULL, '1OqrlXXVhoWX4ZJmyvILrWtEUr3I7nhCWwT2BOH5.png', NULL, NULL, 'd2CNBxKVCVE6g9JIvQ93upMVrnijwlln6CrA1O60.png', NULL, NULL, '[\"gujarati\",\"hindi\",\"english\",\"bengali\",\"konkani\",\"malayalam\",\"sindhi\",\"tamil\"]', '10000.00', 'temporary', '[\"temporary\"]', 'day', 'yes', NULL, 'car_driver', 'manual', '[\"tempo\",\"bus\",\"hydra_crane\"]', NULL, NULL, NULL, NULL, '2022-07-05 07:40:08', '2022-10-11 01:36:41', NULL, '0.00000000', '0.00000000', '0.00000000', '0.00000000', NULL),
(28, 130, '9586958695', NULL, 'Happy Narsary', 'Near Palanpur Highway', 'hScJvJMRSpChuFpDQUq0kMOmrF9Cq4tPIJz5of1G.png', 385535, 'Deesa', 'Gujarat', 'home', 'home', 'Happy Narsary', 'Near Palanpur Highway', 385535, 'Deesa', 'Gujarat', 'BvP5WReC5Rcv0xKoxLaNdJ2rCGvK2qmxG8jyAZzS.png', 'CouMvlY9e2I1XZFNAoQTmdnq6SnNT9HmtgvFNlg4.png', NULL, NULL, 'h8Pkau38LY77MSqoKgpToJ2HPdXt5fRdiqfzXfWo.png', NULL, NULL, 'I2tkoYnZd1DCqU1gy5S4BUkG04X09LWTFmtAJyV6.png', NULL, NULL, '6epG54igE4blJ9gD9zwcNDsdWO70Vx0kKNxmJmJl.png', NULL, NULL, '[\"gujarati\",\"hindi\",\"english\",\"punjabi\"]', '15000.00', 'temporary', '[\"permanent\",\"temporary\"]', 'day', 'yes', NULL, 'car_driver', 'manual', '[\"truck\",\"hydra_crane\",\"tractor\"]', NULL, NULL, NULL, NULL, '2022-07-06 07:51:03', '2022-10-07 06:56:34', NULL, '0.00000000', '0.00000000', '0.00000000', '0.00000000', NULL),
(33, 131, '9878487514', NULL, 'N.R.Park', 'Block No-B-15, Near Palanpur Highway', 'Iqp9XGXnqfHdUYtqem8FaSmZbWIzJL2y5wYKImpw.png', 385001, 'Palanpur', 'Gujarat', NULL, NULL, 'N.R.Park', 'Block No-B-15, Near Palanpur Highway', 385001, 'Palanpur', 'Gujarat', 'qQXdPzEiKyumxizIdSdzqUL0mbMips5TsVsH0G7D.png', 'kqPY5CJNJKEAtnPAIeG0FOJGXzcZSmCYqtczS0Wu.png', NULL, NULL, 'D7zpiUnIqCWZ3lU3igfktFCc9DtwuOrE4ydnwuAS.png', NULL, NULL, 'XlW7lTOPuPcAT7Uqx6agSOcGbYaIdOVKVpyZZ2sx.png', NULL, NULL, 'kJDqNppGpHCW3DZLJsB4k2gr1M2OI1wPHR0bNZuI.png', NULL, NULL, '[\"gujarati\",\"hindi\",\"english\",\"punjabi\"]', '10000.00', 'temporary', '[\"temporary\"]', 'day', 'yes', NULL, 'car_driver', 'manual', '[\"tempo\",\"hydra_crane\"]', NULL, NULL, NULL, NULL, '2022-07-06 08:07:56', '2022-10-11 01:46:08', NULL, '0.00000000', '0.00000000', '0.00000000', '0.00000000', NULL),
(35, 132, '9878451542', NULL, 'Happy Narsary', '12behind Domino\'s Pizza,', 'x64aSTIfs2fQQBSYIosgHMjFauH8qDmqkaZ0bv8p.png', 385001, 'Palanpur', 'Gujarat', NULL, NULL, 'Happy Narsary', '12behind Domino\'s Pizza,', 385001, 'Palanpur', 'Gujarat', 'IlDFUTNv40EfAlCQ2EOF0uT90UDFt3rVSG9MLqwd.png', 'ume8J1d7WmEykXprc1f7nDqwqOEb4arMerU7JfS9.png', NULL, NULL, 'Bq9dJgUMmLkZ4AneTiDvomS3e5KCAJlhYNHwqCyb.png', NULL, NULL, 'xrhCxku3Ywq4cWrWhwYd73VbSx1iQWVcy3tr5LGs.png', NULL, NULL, 'Mny1pwZzhm0tlbpvQZ8zmZHxGdHnuKneXc7KhryB.png', NULL, NULL, '[\"gujarati\",\"hindi\",\"english\",\"punjabi\"]', '20000.00', 'pickup-drop', '[\"pickup-drop\"]', 'day', 'yes', NULL, 'car_driver', 'manual', '[\"bus\",\"truck\",\"hydra_crane\"]', NULL, NULL, NULL, NULL, '2022-07-06 23:05:50', '2022-10-11 01:46:39', NULL, '0.00000000', '0.00000000', '0.00000000', '0.00000000', NULL),
(40, 134, '9865321124', NULL, 'Bajrang Nagar', 'Block No-15, Near Ahmedabad Highway', 'JT53y2uy4rZp29YHrlX3I0al0IiJ73HDY3kKAegg.png', 385535, 'Deesa', 'Gujarat', NULL, NULL, 'Bajrang Nagar', 'Block No-15, Near Ahmedabad Highway', 385535, 'Deesa', 'Gujarat', 'm95mbLBNvUO2jfPdEoX4wKvoV6lItrTWDPR3XUGe.png', 'ELhnCCBO0gFP7FkKPCJiPYITq4zFlyOtuecuQyoK.png', NULL, NULL, 'Fcfy16UoJuRNuvVXbvalj4jHGQE8qIMFBlHSN2pT.png', NULL, NULL, 'GoG15BKqmBDlgYtgjeRHr1HwCNQjMBB0opfpcdgt.png', NULL, NULL, 'Pkk2HkYAiJzIsNbtsBKNrWhMqNd9uGC5sN3WY9Jc.png', NULL, NULL, '[\"gujarati\",\"hindi\",\"english\",\"punjabi\"]', '20000.00', 'temporary', '[\"temporary\"]', 'day', 'yes', NULL, 'car_driver', 'manual', '[\"tempo\",\"bus\",\"tractor\"]', NULL, NULL, NULL, NULL, '2022-07-06 23:10:46', '2022-10-11 01:47:16', NULL, '0.00000000', '0.00000000', '0.00000000', '0.00000000', NULL),
(47, 5, '8451242320', NULL, 'Velu Nagar', '11', 'JLtOrZXR3PjdVgdE8rJmeU53jXNc7EmSVBoLzfUi.jpg', 385001, '1', '1', NULL, NULL, 'Velu Nagar', '11', 385001, NULL, NULL, 'I4kkzbjdmMkWrGH3vxjfzbR1JLUh6FZUmHewVqtc.jpg', 'ELhnCCBO0gFP7FkKPCJiPYITq4zFlyOtuecuQyoK.png', NULL, NULL, 'bPBhmeeMsTWCaN2gyzBPMGK3QS4PyZVguLBpkFCF.png', NULL, NULL, 'LHD7okbT1weXQD5Qk3423fDIwFUzoi03PRXpTbk0.png', NULL, NULL, 'igXOnbObymMjYx8tMjbwTx2GDP0LL1LdR68sMLJy.png', NULL, NULL, '[\"gujarati\",\"hindi\",\"english\",\"punjabi\"]', '10000.00', 'pickup-drop', '', '', 'home', NULL, '', '', '[\"tempo\",\"bus\",\"hydra_crane\"]', '', '', '', '', '2022-07-07 03:19:59', '2022-07-07 03:19:59', NULL, '0.00000000', '0.00000000', '0.00000000', '0.00000000', NULL),
(91, 99, '7548142435', NULL, 'Vinay Park', 'Near Chhapi Highway', 'MDiAJUtSTqGXDV7gNKP9mJ0txnYgljb2VAChRba4.png', 385535, 'Deesa', 'Gujarat', NULL, NULL, 'Vinay Park', 'Near Chhapi Highway', 385535, 'Deesa', 'Gujarat', 'FBxZajUjdxsmrBGEKML6khO6UhvyaoX4GTuJeAGq.png', 'dMKk5xEJVoWKiMDYwwmimnfZQ5oLIXyH6IMYH5rc.png', 1, NULL, 'YFlxKzFlDeKeaoCc5ndb68UA4mJcEUEfc0t15OtE.png', 1, NULL, 'jea9UtXqX4ApC1rBbQur4320i43OncbOCnvOfPFF.png', 1, NULL, 'igXOnbObymMjYx8tMjbwTx2GDP0LL1LdR68sMLJy.png', 1, NULL, '[\"english\",\"gujarati\"]', '15000.00', 'temporary', '[\"temporary\"]', 'night', 'yes', NULL, 'both', 'manual', '[\"tempo\",\"bus\",\"truck\"]', '12345678901212', 'Dushyant Parmar', 'UNIO1245', 'Deesa123', '2022-07-18 04:39:07', '2022-11-30 20:04:19', NULL, '0.00000000', '0.00000000', '0.00000000', '0.00000000', NULL),
(92, 101, '9575486845', NULL, 'The Great Ideas', 'Near Bihari Baag, Aburoad Highway', '6XL8paFNBPoVr6W3ugRWVF8HvwBvNs699IZ3l8NI.png', 385001, 'Palanpur', 'Gujarat', NULL, NULL, 'The Great Ideas', 'Near Bihari Baag, Aburoad Highway', 385001, 'Palanpur', 'Gujarat', 'wvlC8KIy7G7J5NRzZfhXsvvD8LTZr7eaVZ1shJLk.png', 'g59fWF4mwAqxJflztyniyt2J1nSACusA4Ri2KCKc.png', 1, NULL, '3P7RJCrzHkBuRWQgjKK6jTf4e9Zhhv233gdfSKiv.png', 1, NULL, 'fwBdRqiyrVLTnX7tck5sWUfdLoRNwX4OAUzAgT8o.png', 1, NULL, 'igXOnbObymMjYx8tMjbwTx2GDP0LL1LdR68sMLJy.png', 1, NULL, '[\"gujarati\",\"hindi\",\"marathi\"]', '15000.00', 'temporary', '[\"valet_parking\"]', 'day', 'no', NULL, 'commercial_driver', 'automatic', '[\"tempo\",\"bus\",\"t..ractor\"]', NULL, NULL, NULL, NULL, '2022-07-19 02:08:29', '2022-11-07 04:18:34', NULL, '0.00000000', '0.00000000', '0.00000000', '0.00000000', NULL),
(94, 104, '9125154232', NULL, 'jaso', '12', 'lJ6fXTY639frEKaaD3xh9SsWUnHDWTYk7z6ldH1u.png', 385001, '1', '1', NULL, NULL, 'jaso', '12', 385001, '1', '1', 'DbDxFfdSsjTghRYRRKWuZz2vDzfkpdBFfAECXcAr.png', 'j8wQ5f8VRsdbnhLVUdM7iDkT7W5OFKpc7eUa9F4G.png', NULL, NULL, 'YdTW7D1K2EakxERwYC5SAUMo0KUOCGAhpxqyJU6D.png', NULL, NULL, 'BjSE2pRFtGtZ9ykRDaZGD3G7MFocoKjO5TTpILH0.png', NULL, NULL, 'BpeLjTL480LojvtfvSwOzc4e6jZHzQhu51D9VHIb.png', NULL, NULL, '[\"gujarati\",\"hindi\",\"english\",\"bengali\",\"marathi\",\"kannada\",\"konkani\",\"malayalam\",\"oriya\",\"punjabi\"]', '10000.00', 'pickup-drop', '', 'day', 'yes', NULL, 'car_driver', 'manual', '[\"tempo\"]', '12345567845', 'jaso', '12545', 'jaso', '2022-07-20 06:24:14', '2022-08-03 04:06:24', NULL, '0.00000000', '0.00000000', '0.00000000', '0.00000000', NULL),
(96, 107, '9320157584', NULL, 'Near Hawai Pillar', 'Deepak Hotel  Road', 'G8M6FbTiNkJKaNxXk0dOcjb0uMu4wJpT1tmgxJvm.png', 385535, 'Deesa', 'Gujarat', NULL, NULL, 'Near Hawai Pillar', 'Deepak Hotel  Road', 385535, 'Deesa', 'Gujarat', 'AGfSzPjDaVQ0jZgURtk1KBAqh0zikci0JWMcLzVc.png', 'NYJByZ00L42gzAe3cr6hAQx6RFlaOCc5Ezxceexj.png', NULL, NULL, 'H0fdML1VSBul7R6eJ2Pv6oTo246SmT5fWgF0eCmC.png', NULL, NULL, 'aPU8YaZThsC95mBjLBeYnklL4merQUVs0F9ChEcU.png', NULL, NULL, 'Os60qCYhugEunzbdJOTJh3wjePrziYE6fupdv8nV.png', NULL, NULL, '[\"gujarati\",\"hindi\"]', '5000.00', 'valet_parking', '[\"valet_parking\"]', 'day', 'yes', NULL, 'car_driver', 'manual', '[\"tractor\"]', '4554521545211', 'faisu', '543432', 'faisu', '2022-07-21 23:20:45', '2022-10-11 01:44:59', NULL, '0.00000000', '0.00000000', '0.00000000', '0.00000000', NULL),
(107, 128, '9985222331', '5 year', 'new', 'new', 'thTHGaOTl1ebCMVuDSbRHd5c7rK4g1jJ4TovdIfL.jpg', 385536, 'new', 'new', 'new', 'new', 'new1', 'new', 385536, 'new', 'new', 'UEc8hKgzQm5tnfeUev8RGeSQwEFhgxrptXWsvlgy.jpg', 'a6vLEAJJmIS02TTWdFQMrLUjKVe6mNvtFF4yVeLA.jpg', 1, 'new', 'GPAkemt4hS6FKQnY9Bg3bu8IuqJlMwKKJo5Em2xb.jpg', 1, 'new', 'Q6ocJotBSlW24dKjU8uFJimWXU1JBD041Rf7N0Ok.jpg', 1, 'new', 'AUAsx4mZmv9b4mVw2LBgOzY8b4GCT7jpbYBxLbJ5.jpg', 1, 'new', '[\"hindi\",\"english\"]', '15000.00', 'permentnew', 'new2', 'day', 'new', 1, 'car_driver', 'both', '[\"truck\",\"bus\"]', 'new', 'new', '01', 'khodla', '2022-07-28 04:50:24', '2022-12-15 12:51:42', NULL, '1.00000000', '1.00000000', '1.00000000', '1.00000000', NULL),
(110, 131, '9797979797', NULL, 'Shilp Arcade, Near Bihari Baag', 'Behind Domino\'s, 3\'rd Flour', '0yVzU6aQ2mSnva3sw726dFSqWVezgzcFcUTMIlCa.png', 385001, '1', '1', NULL, NULL, 'Shilp Arcade, Near Bihari Baag', 'Behind Domino\'s, 3\'rd Flour', 385001, '1', '1', 'pL6taaeoyQdtfU5r8n0O5qrsmyQeJwpaeVl6VThj.png', 'i2b78wEYzxn7sruuxhPkOPP2sXw2AGF0XgO6I73m.png', NULL, NULL, 'KuGLhubvS3slR7NXrD4SugG0asL3ApiPFgdfn0vz.png', NULL, NULL, 'l7lTGVPNIDnORaWwmEYpW69LbCkt62DKiL7LFPAC.png', NULL, NULL, 'jfo6hklqcEi0GGiEA2Yc3qnvCigrGHN2TMqj2kDt.png', NULL, NULL, '[\"gujarati\",\"hindi\",\"english\",\"punjabi\"]', '12000.00', 'permanent', '', 'day', 'yes', NULL, 'car_driver', 'manual', '[\"tempo\",\"bus\",\"truck\"]', '78978978978978', 'Jaswant Mali', 'BARB0MAIN', 'BOB', '2022-08-01 00:49:17', '2022-08-03 05:02:31', NULL, '0.00000000', '0.00000000', '0.00000000', '0.00000000', NULL),
(111, 132, '9191919191', NULL, 'Shiv Arcade', '3\'rd Flour', 'VF6vIhz3HRIrgDM9QAN27NXSsKlXPj0JROZxilKU.png', 385001, '1', '1', NULL, NULL, 'Shiv Arcade', '3\'rd Flour', 385001, '1', '1', 'kclC3LhxQVtOU0Nib9s7bNJ4fsXAak3ntzARzpdr.png', 'NEWaSJXrMSZ9IAdpR8dC43KuawSlpNAiFCsFL3ya.png', 1, NULL, 'obsSHvdpMoJF9bG3hISCBqPdtdP8ngdxr8XdBQlV.png', 1, NULL, 'Wb0Emvs5qWTngqP9kw6hg3XCWXyzUg18iDDqTsS3.png', 1, NULL, 'FGnEp6VjjpkPs6w60Gzbc5ghPm2fyxSEjrbTEZ74.png', 1, NULL, '[\"gujarati\",\"hindi\"]', '10000.00', 'temporary', '', 'night', 'yes', 1, 'car_driver', 'manual', '[\"tempo\",\"tractor\"]', '98989898989898', 'Paresh Mali', 'BARB0MAIN', 'ICICI', '2022-08-01 01:06:31', '2022-08-03 03:49:43', NULL, '0.00000000', '0.00000000', '0.00000000', '0.00000000', NULL),
(113, 134, '9595959595', NULL, 'Shiv Arcade', '3\'rd Flour', 'QgCwX6E2xuh4Ljf0fqIIULpMYsuzDehg9TPbMkdF.png', 385001, '1', '1', NULL, NULL, 'Shiv Arcade', '3\'rd Flour', 385001, '1', '1', 'osD3LkoGC1FAwkqso3BwUmNWleShrKf93ax17Pob.png', '7uIO9IKsp1JxGTJG7svChTKfgTLyfeKAC4AT0soE.png', NULL, NULL, 'zMYSHPuRff7dVtZikepDFL0W2TOFWT797gs989kH.png', NULL, NULL, 'AMSELR3fprAwGmc66m2uI6uOJL8gzEuS6uA8pcPm.png', NULL, NULL, '5JSuhNXRwn8JxL6xR01KyjR16fZrVqeM5EXGC08O.png', NULL, NULL, '[\"gujarati\",\"hindi\",\"english\"]', '15000.00', 'valet_parking', '', 'day', 'yes', NULL, 'car_driver', 'manual', '[\"bus\",\"hydra_crane\",\"tractor\"]', '987987987987987', 'Sunil Darji', 'BARB0MAIN', 'SBI', '2022-08-01 01:15:22', '2022-08-03 03:46:52', NULL, '0.00000000', '0.00000000', '0.00000000', '0.00000000', NULL),
(116, 139, '9797979797', NULL, 'Shilp Arcade', '3\'rd Flour', 'syst6sxRcxjGEBYJfbgRu8x1e2fdnwOVa1ejijf3.png', 385001, 'Palanpur', 'Gujarat', NULL, NULL, 'Shilp Arcade', '3\'rd Flour', 385001, 'Palanpur', 'Gujarat', 'MHnoyjn7AjcBOIElsDV6fwhVrzGxQwWFHYyUdprz.png', 'cYkLS95sjlczkBfUoLnxpLxKaTtMak94r2aFrozL.png', NULL, 'name not cleare', 'kszsbyRaptXAUoK0r9QddDSHuNORDFXuoAPCTRnf.png', 1, NULL, 'NZvHVZ1O2Z6q0dhoJAaTe98HCx8Lbq9TVP8R7Egl.png', 1, NULL, 'sj3JJjpCF0MOJ5DWliyf27q4cLCkyBmb14BHvRk9.png', 1, NULL, '[\"gujarati\",\"hindi\",\"english\"]', '15000.00', 'temporary', '[\"temporary\"]', 'day', 'yes', NULL, 'commercial_driver', 'automatic', '[\"tempo\",\"bus\",\"truck\"]', '97979797979797', 'Vinod Darji', 'BARB0MAIN', 'BOB', '2022-08-01 02:50:11', '2022-10-11 01:47:45', NULL, '0.00000000', '0.00000000', '0.00000000', '0.00000000', NULL),
(118, 141, '7575757575', NULL, 'Shilp Arcade', '3\'rd Flour', 'ElsNkR967r2bh6QM2aNda9qKnPjzmDqaUkqJTkpL.png', 385001, 'Palanpur', 'Gujarat', NULL, NULL, 'Shilp Arcade', '3\'rd Flour', 385001, 'Palanpur', 'Gujarat', '5k4IDNvXBgcEMwnG9DaPwZE5WNfLvmV46oeDfVCT.png', 'N5WuT4qORJISNY4D83eztrV8lU9AXn1WvAWpJqal.png', 1, NULL, '8lO1hhjYa8eMuqTaFRDZesSqd35iiIHORuZecnFc.png', 1, NULL, 'p4YCA2nDvZZbdUX3X3CWVklGrSG1jZpjzFLQE29J.png', 1, NULL, 'b7bOyXcV9qBMPM11iCBH7B1tCbvtNnWiIEho5A5X.png', 1, NULL, '[\"gujarati\",\"hindi\",\"english\"]', '15000.00', 'pickup-drop', '[\"pickup-drop\"]', 'night', 'yes', 1, 'both', 'both', '[\"bus\",\"truck\",\"tractor\"]', '40123568481542', 'Vimal Thakor', 'BARB0MAIN', 'ICICI', '2022-08-01 03:00:33', '2022-10-11 01:48:15', NULL, '0.00000000', '0.00000000', '0.00000000', '0.00000000', NULL),
(119, 142, '9429420045', NULL, 'Hinglaj Society', 'Flat No 12, Near Mehsana Highway', 'Jc7TB3bJLzVbgFqP5YYQKIo9yEtkVhIisf4MpGsj.png', 385535, 'Deesa', 'Gujarat', NULL, NULL, 'Hinglaj Society', 'Flat No 12, Near Mehsana Highway', 385535, 'Deesa', 'Gujarat', 'Jc7TB3bJLzVbgFqP5YYQKIo9yEtkVhIisf4MpGsj.png', 'Jc7TB3bJLzVbgFqP5YYQKIo9yEtkVhIisf4MpGsj.png', NULL, NULL, 'Jc7TB3bJLzVbgFqP5YYQKIo9yEtkVhIisf4MpGsj.png', NULL, NULL, 'Jc7TB3bJLzVbgFqP5YYQKIo9yEtkVhIisf4MpGsj.png', NULL, NULL, 'Jc7TB3bJLzVbgFqP5YYQKIo9yEtkVhIisf4MpGsj.png', NULL, NULL, '[\"gujarati\",\"hindi\",\"english\",\"punjabi\"]', '150000.00', 'pickup-drop', '[\"pickup-drop\"]', 'day', 'yes', NULL, 'car_driver', 'manual', '[\"tempo\",\"bus\"]', '94226262692', 'snehal vyas', 'SBI94966', 'SBI', '2022-08-08 01:11:46', '2022-10-11 01:49:05', NULL, '0.00000000', '0.00000000', '0.00000000', '0.00000000', NULL),
(121, 148, '9865321245', NULL, 'Arbuda Nagar', 'Near Ahmedabad Highway', 'WUw3Z6uWZXORWDnSbvaqVeQstCoaSpKIAEw0DrTK.png', 385001, 'Palanpur', 'Gujarat', 'home', 'rhome', 'Arbuda Nagar', 'Near Ahmedabad Highway', 385001, 'Palanpur', 'Gujarat', 'iwoDvBaPWtmdbHv1KavVHX4JA3FXxzDWL9kaOA8I.png', '2G30HJeWJMZBAPOKDjB2TRCmDA78WDFeA675YVnh.png', 1, NULL, '4OIgw4WnVShnNt1B8qQP6j5tjXX4SbySjTSrePb3.png', 1, NULL, 'fZ2u7gLGQX4h8Bk3zmzGWfjBW7rwrjqv1V0rtrYB.png', 1, NULL, 'UpuOS6HLyi7yeTrX2DXt76xZKYNknlFVgF9psMMF.png', 1, NULL, '[\"gujarati\",\"hindi\",\"english\",\"punjabi\"]', '10000.00', 'permanent', '[\"permanent\"]', 'day', 'yes', 1, 'car_driver', 'manual', '[\"tempo\",\"bus\",\"truck\",\"hydra_crane\",\"tractor\"]', NULL, NULL, NULL, NULL, '2022-08-12 01:20:04', '2022-10-11 01:49:38', NULL, '0.00000000', '0.00000000', '0.00000000', '0.00000000', NULL),
(125, 181, '1234569912', NULL, 'Saptarshi Banglows', 'Near  Patan Highway', '3XqbBRew5FFpAzRfm5qw4vnZo1yMK8PnjQizzjeE.jpg', 385535, 'Deesa', 'Gujarat', 'home', 'rhome', 'Saptarshi Banglows', 'Near  Patan Highway', 385535, 'Deesa', 'Gujarat', 'nyp3dD2jVgM4TjekfPvsfgQ4KGyJrh4JrWLSxnsF.png', 'xqJfjs29oqZSrF5d1My7jax1tJtjGyHDFSmZ6f3w.jpg', NULL, NULL, '5t2D0Di0LCde14TyQnn19JcOC9ip68qD8clUjYNZ.jpg', NULL, NULL, 'xwA4Xr5FfvLabdr2d0e8yfwpothHSItGmVOKPNCp.webp', NULL, NULL, '3bHRjqYxTwrFhvTDshmY8KquYuDpRrXwCEho5aSm.jpg', NULL, NULL, '[\"gujarati\",\"hindi\",\"english\",\"bengali\",\"marathi\"]', '15002.00', 'permanent', '[\"permanent\"]', 'day', 'yes', NULL, 'car_driver', 'manual', '[\"tempo\",\"bus\",\"truck\",\"tractor\"]', '9865321245789865', 'Dushyant Parmar', 'SBIN0021615', 'STATE BANK OF INDIA', '2022-08-22 07:04:24', '2022-10-11 01:51:38', NULL, '0.00000000', '0.00000000', '0.00000000', '0.00000000', NULL),
(130, 194, '1122334455', NULL, 'Tirupati Township', 'Near Ranpur Road', 'U4UwL0qb9ifFZMVfTcZgFUSkgSdW78ufpRwcvxQp.png', 385535, 'Deesa', 'Gujarat', 'home', 'rhome', 'Tirupati Township', 'Near Ranpur Road', 385535, 'Deesa', 'Gujarat', '2uJj7ofr3EGHrGNosGjuekvvQo9X79eo2Z6559Ml.png', 'gpkLjf1a2NcX8hIYxiSAtvFIuZ98AE2IMPhKc89c.png', 1, NULL, '4wpRVdr6k2Ml9PqsIAqZqBtPyhSmMavhGnFr06YE.png', 1, NULL, 'qWJqdlwRfTjm2qqxqte4AuMfTVGo0kfY6RCsqxm4.png', 1, NULL, '4Ux7zdmdS3aIAOuC2LApmW4wYY7GbbAu5hGq9pXe.png', 1, NULL, '[\"gujarati\",\"hindi\",\"english\",\"bengali\",\"marathi\"]', '15000.00', 'valet_parking', '[\"permanent\",\"temporary\",\"valet_parking\"]', 'night', 'no', 0, 'both', 'both', '[\"tempo\",\"bus\",\"hydra_crane\"]', NULL, NULL, NULL, NULL, '2022-08-23 23:56:31', '2022-11-12 01:09:14', NULL, '0.00000000', '0.00000000', '0.00000000', '0.00000000', NULL),
(140, 206, '5544332211', NULL, 'Chandralok Society', 'Near Lions Hall Road', 'rYHNIFqJj74uvCnw87pvqznRQCmFHlmQvtMM37DW.png', 385535, 'Deesa', 'Gujarat', NULL, NULL, 'Chandralok Society', 'Near Lions Hall Road', 385535, 'Deesa', 'Gujarat', 'wlKMEV2X0BkvIW2mv02bOx3qLswr3qD6I7U6sl98.png', 'Il5BQf5rgcXIO0iNPj5lUwXMAdL6kkwCCk1x0rH6.png', 1, NULL, 'AEWUBorbxoVAEyRUFp9S99JkV2V5DYADwl6m2ldX.png', 1, NULL, 'KG1xf9f8K7x97HMxqa9Isc25KVTnFDQCQ5dQ1P5V.png', 1, NULL, 'tshjt2rTPW82YrtVY7EX61FoYX4INWfxftdIIgZt.png', 1, NULL, '[\"gujarati\",\"hindi\",\"english\",\"bengali\"]', '15000.00', 'permanent', '[\"permanent\"]', 'day', 'yes', NULL, 'car_driver', 'manual', '[\"tempo\",\"bus\",\"tractor\"]', NULL, NULL, NULL, NULL, '2022-08-25 23:49:53', '2022-10-12 00:42:31', NULL, '0.00000000', '0.00000000', '0.00000000', '0.00000000', NULL),
(141, 207, '9874561256', NULL, 'N.R Park', 'Near Chandralok Road', 'GFxs4wEiAcn45dvswHWEH1qZ5VpqRsZY1xhuFvJF.png', 385535, 'Deesa', 'Gujarat', 'home', 'rhome', 'N.R Park', 'Near Chandralok Road', 385535, 'Deesa', 'Gujarat', 'qi2UCjS8HyrJ3V9TXtCZsWEyQfslzKKegg0Hux1f.jpg', 'zPkisqXMYOloJyB6uwCnk9rCwY2VYJgi9gdNq8KL.jpg', 1, NULL, 'd24KQbbEd8hxSVt8BT8lnMiPvceWrRkIW6JSeeFY.jpg', 1, NULL, 'rwoVLfYr17d6x4Fa6fKE9WoVnSbLe089p9qnq9R3.webp', 1, NULL, 'sKP5Ec9x3ezR3Ar6PGgajSgqEaI17eLdMrTtH1Zg.jpg', 1, NULL, '[\"gujarati\",\"hindi\",\"english\"]', '150000.00', 'temporary', '[\"temporary\"]', 'day', 'yes', NULL, 'commercial_driver', 'manual', '[\"tempo\",\"bus\",\"hydra_crane\"]', '123456790', 'Hitesh Kumar.m', 'UBNI0159852', 'Surat', '2022-08-26 00:42:44', '2022-10-19 01:53:48', NULL, '0.00000000', '0.00000000', '0.00000000', '0.00000000', NULL),
(142, 209, '8523571592', NULL, 'Shiv Arcade', '3\'rd Flour', 'RHmdqRaJMDcR5divdYCge1FLCKDVUSGXikAyJYbM.png', 355001, 'Palanpur', 'Gujarat', 'home', 'rhome', 'Shiv Arcade', '3\'rd Flour', 355001, 'Palanpur', 'Gujarat', 'y0DOFWGPvGOTwhz8fowHNEKjNm9Ifk4uA2vljDZz.png', 'TZfCvzMJYBglnH89VsbFSkkTJNB07zpjkjDUZt1u.png', 1, NULL, '3GYwlddRA5hpQvpTBc5sPZmZ6XYVMMI4XzzJ8UkH.png', 1, NULL, 'vWJOzAhPULcRXfVdj7btBeG7DnWQdPtr0cD3qee3.png', 1, NULL, 'Dhbj0L468wW2fVGveG2qrGgt6lhuZXXgNbUIDIpH.png', 1, NULL, '[\"gujarati\",\"hindi\",\"english\"]', '15000.00', 'permanent', '[\"permanent\"]', 'day', 'yes', NULL, 'car_driver', 'manual', '[\"tempo\",\"bus\",\"tractor\"]', '1324657986', 'Vinamra', 'SBIN012354', 'Surat', '2022-08-26 07:21:46', '2022-10-11 01:58:45', NULL, '0.00000000', '0.00000000', '0.00000000', '0.00000000', NULL),
(144, 216, '1122334456', NULL, 'Pitru Krupa Park', 'Near Aroma Circle', 'http://192.168.1.12//fundoo-app/public/storage/admin/images/hjN1aLBXGkuQga2IDxo0rl0WEjfrWfcHIYpLouMX.png', 385001, 'Palanpur', 'Gujarat', 'home', 'rhome', 'Pitru Krupa Park', 'Near Aroma Circle', 385001, 'Palanpur', 'Gujarat', 'http://192.168.1.12//fundoo-app/public/storage/admin/images/TSPA1itzwpNUnotcxfhgRLTWL9zDQUHZm7rTUIgV.png', 'http://192.168.1.12//fundoo-app/public/storage/admin/images/EOVMTnkqQVhrhReFp9IadskQq0mimyOyzgsdkqom.png', 1, NULL, 'http://192.168.1.12//fundoo-app/public/storage/admin/images/EqoEGy8iwkjC5s6ty67HLpQV2uE5cUM49LJ3AiCn.png', 1, NULL, 'http://192.168.1.12//fundoo-app/public/storage/admin/images/ZBqldRYjDiVtO29NS2e7n5HbIeM2wlmdPRvEIzz4.png', 1, NULL, 'http://192.168.1.12//fundoo-app/public/storage/admin/images/ap4spSMh7DuJ1k61A7qIXxgulg8uTB7wJobz1UHa.png', 1, NULL, '[\"gujarati\",\"hindi\",\"english\"]', '15000.00', 'permanent', '[\"permanent\"]', 'day', 'no', NULL, 'car_driver', 'both', '[\"tempo\",\"bus\",\"hydra_crane\"]', '112336554', 'Dushyant', 'UBIN018568', 'Union Bank Of India', '2022-08-29 03:02:24', '2022-11-12 02:10:48', NULL, '0.00000000', '0.00000000', '0.00000000', '0.00000000', NULL),
(145, 217, '3322116655', NULL, 'Somnath Township', 'Near  Hawai Pillar', 'kq603a0keW8X19jhZQuCVvFcMY7hxi0yNdISw4DD.jpg', 385001, 'Palanpur', 'Gujarat', 'home', 'rhome', 'Somnath Township', 'Near  Hawai Pillar', 385001, 'Palanpur', 'Gujarat', 'ScdSbWq698fvhty6tcQdy5bi5YUUGq4ZBauMmzJL.png', 'l7r27uAFMmhznF8v5nq8rI0cS1J5WcgKvxT7gwx7.jpg', 0, NULL, 'YlC6fT8HHqTVCc2QiD2UDbCFYY4NRveg9emKJfZV.png', 0, NULL, 'tDaUpxeHNdLneXDgR6pwYaHcn7A4jiusP4oKNbDH.jpg', 0, NULL, 'lytrnKnSzspgBuojS4HYHSNiri5hVWp8t3zra5Vq.jpg', 0, NULL, '[\"gujarati\",\"hindi\",\"english\"]', '15000.00', 'permanent', '[\"permanent\"]', 'day', 'no', NULL, 'car_driver', 'both', '[\"tempo\",\"bus\",\"hydra_crane\"]', '112336554', 'Dushyant', 'UBIN018568', 'Union Bank Of India', '2022-08-29 03:20:10', '2022-10-11 02:06:12', NULL, '0.00000000', '0.00000000', '0.00000000', '0.00000000', NULL),
(151, 225, '3579512486', NULL, 'Vinay Park', 'Near Ahmedabad Highway', 'wleB0KW8C3vBqDe5l597dLDe7X7WOVHq9uCnTYOJ.png', 385001, 'Palanpur', 'Gujarat', NULL, NULL, 'Vinay Park', 'Near Ahmedabad Highway', 385001, 'Palanpur', 'Gujarat', 'KzgCArRZittY5q67mGveUBiPY2t03sfAuZDxIzqn.png', NULL, 0, NULL, NULL, 0, NULL, NULL, 0, NULL, NULL, 0, NULL, '[\"gujarati\",\"hindi\",\"english\"]', '20000.00', 'permanent', '[\"permanent\"]', 'day', 'yes', NULL, 'car_driver', 'manual', '[\"tempo\",\"bus\",\"hydra_crane\"]', NULL, NULL, NULL, NULL, '2022-09-02 02:08:28', '2022-10-11 02:13:07', NULL, '0.00000000', '0.00000000', '0.00000000', '0.00000000', NULL),
(155, 284, '9865321524', NULL, 'Vinay Park', 'Near Ahmedabad Highway', 'cHBWsN6k69HWYIDSIXBchaWZY8gUs8881c8voRyy.png', 385001, 'Palanpur', 'Gujarat', NULL, NULL, 'Vinay Park', 'Near Ahmedabad Highway', 385001, 'Palanpur', 'Gujarat', 'RAGvAdzSMD5PmCX9mUuVgodRHblVggCoSsSj4cbn.png', 'PpgLBmHVzi3iXdRUnKGot84606lCzO99pYVL5xGV.png', 0, NULL, 'tJOArDbvoNoXrn7tst7UofVP6U0jBKbJio9u9LMi.png', 0, 'bbn', 'tiqNdWRlFhO9nO9s2koD0wFdQWxkUj11uuY2eqCu.png', 0, NULL, 'RjT9h5CnLMuZLhFBizsLMh7bVMLKrmxvUnl3QyMo.png', 0, NULL, '[\"gujarati\",\"hindi\",\"english\"]', '20000.00', 'pickup-drop', '[\"permanent\",\"pickup-drop\"]', 'day', 'yes', NULL, 'car_driver', 'manual', '[\"tempo\",\"bus\",\"tractor\"]', NULL, NULL, NULL, NULL, '2022-10-01 04:58:36', '2022-10-03 04:01:10', NULL, NULL, NULL, NULL, NULL, NULL),
(156, 285, '9015963870', NULL, 'Shilp Arcade', 'Near Kargil, Deesa Highway', 'rHrppGHTWiaGDpBHnkFxCdhnrHJECbMmIl45Jyol.png', 385001, 'Palanpur', 'Gujarat', NULL, NULL, 'Shilp Arcade', 'Near Kargil, Deesa Highway', 385001, 'Palanpur', 'Gujarat', 'ujroR7AnPOWCmetiNoRGh91KRKaZfB9SAj6SSgF1.png', 'LpOb6jHYhGtpU0DzcqzCq4DTpFZwcYbwr7R7YDHC.png', 1, NULL, 'xnL86dMagWcyTRWtdiRUQE6di5ythCUa17BFAJfe.png', 0, 'dfgdg', 'ePlnsnrPHpHlYIhAceVEbjdxDVFya2quBzcacjAw.png', 1, NULL, 'Q1Y1qBZJ4G0l8J1wWRYSJEEbQIl5SxdCluimNvkp.png', 1, NULL, '[\"gujarati\",\"hindi\",\"english\"]', '20000.00', 'pickup-drop', '[\"pickup-drop\"]', 'day', 'yes', NULL, 'commercial_driver', 'manual', '[\"tempo\",\"truck\",\"hydra_crane\"]', NULL, NULL, NULL, NULL, '2022-10-01 05:03:12', '2022-10-12 01:35:07', NULL, NULL, NULL, NULL, NULL, NULL),
(157, 286, '7895450120', NULL, 'Shilp Arcade', 'Near Dipak Highway', '8CoHMKjPJqjr7jWnPjRLcr5uGNTPBoAuTFGimPsj.png', 385535, 'Deesa', 'Gujarat', NULL, NULL, 'Shilp Arcade', 'Near Dipak Highway', 385535, 'Deesa', 'Gujarat', '8CoHMKjPJqjr7jWnPjRLcr5uGNTPBoAuTFGimPsj.png', 'aDhcGpnmmKQdBte2ni5dDStnEsJh0NoYv3MTcvFd.png', 1, NULL, 'MZL1MdU8tOQerH14iEQIWtaI78gMBZ5jxb6ESVVr.png', 1, NULL, 'fJKzIgyTvAI8ax9HF4FGggIvmyM3bm2dQNvV2oHh.png', 1, NULL, 'qJgZPXQXLwTvNyxs0Uu9awPdbXJ3D4ucSwDR7RYV.png', 1, NULL, '[\"gujarati\",\"hindi\",\"english\"]', '15000.00', 'permanent', '[\"permanent\"]', 'day', 'yes', NULL, 'commercial_driver', 'automatic', '[\"bus\",\"truck\"]', NULL, NULL, NULL, NULL, '2022-10-01 05:07:29', '2022-10-19 23:19:01', NULL, NULL, NULL, NULL, NULL, NULL),
(158, 287, '9586201357', NULL, 'Vinay Park', '3\'rd Flour', 'http://192.168.1.12//fundoo-app/public/storage/admin/images/4hVi648xnDuWsNuFfYmzoxVfPEPhElmMLgZkisYs.png', 385535, 'Deesa', 'Gujarat', NULL, NULL, 'Vinay Park', '3\'rd Flour', 385535, 'Deesa', 'Gujarat', 'http://192.168.1.12//fundoo-app/public/storage/admin/images/8wJvwXgiaIO9t46Mp1kOQUrA0EtHU2jupNt9UyX4.png', 'http://192.168.1.12//fundoo-app/public/storage/admin/images/7hNXx1GtMi2rfSsExqenVPpKxgPUKitWdrfHdHt9.png', 0, NULL, 'http://192.168.1.12//fundoo-app/public/storage/admin/images/G6PPNUKLoBrU6WdKXkpTpAZ5KqBuQFwNWRBwm6gq.png', 0, NULL, 'http://192.168.1.12//fundoo-app/public/storage/admin/images/ivq18oVfxhz0kTrWuIdgW62c4FiWhZUWvLF7kNQk.png', 0, NULL, 'http://192.168.1.12//fundoo-app/public/storage/admin/images/9P9c6DG8EgSGDBxz2nEU8fJYs5asIKjx3NigRQhh.png', 0, NULL, '[\"gujarati\",\"hindi\",\"english\"]', '15000.00', 'permanent', '[\"permanent\"]', 'day', 'yes', NULL, 'car_driver', 'manual', NULL, NULL, NULL, NULL, NULL, '2022-10-21 01:06:01', '2022-11-12 04:13:05', NULL, NULL, NULL, NULL, NULL, NULL),
(159, 290, '6401020305', NULL, 'Vinay Park', '3\'rd Flour', NULL, 385535, 'Deesa', 'Gujarat', NULL, NULL, 'Vinay Park', '3\'rd Flour', 385535, 'Deesa', 'Gujarat', NULL, NULL, 0, NULL, NULL, 0, NULL, NULL, 0, NULL, NULL, 0, NULL, '[\"gujarati\",\"hindi\",\"english\"]', '15000.00', 'permanent', '[\"permanent\",\"temporary\"]', 'day', 'yes', NULL, 'commercial_driver', NULL, '[\"bus\",\"hydra_crane\"]', NULL, NULL, NULL, NULL, '2022-10-21 01:41:28', '2022-10-21 02:34:44', NULL, NULL, NULL, NULL, NULL, NULL),
(160, 291, '9201030204', NULL, 'Tirupati Township', 'Near Palanpur Highway', 'BYrCyShkhlrFanYCCRg2fMDtMjLa8vjhw0bvoOCY.png', 385535, 'Deesa', 'Gujarat', NULL, NULL, 'Tirupati Township', 'Near Palanpur Highway', 385535, 'Deesa', 'Gujarat', 'nSsJXjVFY31ycojczAb8mjnce9XzH2yklQ4iJNBD.png', 'WJYt135BHq16aWeGxr1tR9k3nYgWKlX3iIFKtIzx.png', 0, NULL, 'GU9aTVVFu39aBeYpEGz9GpQ8M8aAAGfaf6vHH44G.png', 0, NULL, 'SPwt3hinz3qM1OXbjDQp7JrHdNbKVimVYZ0BFvX2.png', 0, NULL, 'z1JZgS2tEJib854pdHT73tKLbrLYcg3CHmQfM622.png', 0, NULL, '[\"gujarati\",\"hindi\"]', NULL, 'pickup-drop', '\"NULL\"', 'day', 'yes', NULL, 'commercial_driver', NULL, '[\"bus\",\"truck\",\"hydra_crane\"]', NULL, NULL, NULL, NULL, '2022-10-21 01:52:27', '2022-10-21 02:34:01', NULL, NULL, NULL, NULL, NULL, NULL),
(161, 292, '9536865412', NULL, 'Shilp Arcade', 'Near Ahmedabad Highway', NULL, 385535, 'Deesa', 'Gujarat', NULL, NULL, 'Shilp Arcade', 'Near Ahmedabad Highway', 385535, 'Deesa', 'Gujarat', NULL, NULL, 0, NULL, NULL, 0, NULL, NULL, 0, NULL, NULL, 0, NULL, '[\"gujarati\",\"hindi\"]', NULL, 'valet_parking', '[\"temporary\",\"valet_parking\"]', 'day', 'yes', NULL, 'car_driver', 'manual', NULL, NULL, NULL, NULL, NULL, '2022-10-21 02:06:06', '2022-10-21 02:23:27', NULL, NULL, NULL, NULL, NULL, NULL),
(162, 293, '7414253695', NULL, 'Vinay Park', '3\'rd Flour', 'T3IsaURMfliSc1hMS6pamqwEK516hkOLDqoHysCk.png', 385535, 'Deesa', 'Gujarat', NULL, NULL, 'Vinay Park', '3\'rd Flour', 385535, 'Deesa', 'Gujarat', '9KCQeO9PRC2nBpbcIkZuR8mItItvCqbCir6mNvGx.png', 'SEykwn5QQkWmmJXEWvqI8VExskwcYCXFTZPJcgXq.png', 0, NULL, 'xQJtOcU9AatGAcW2I3XCClFIWhgiISDFse6FegYS.png', 0, NULL, 'cB7EZq9D6BUmsLCwF6ve7P7EXM62n521qSeYR9f5.png', 0, NULL, 'rXlcsY9E3MENr13CgoELlody0lPuponVXIzQHc0x.png', 0, NULL, '[\"gujarati\",\"hindi\",\"english\"]', NULL, 'temporary', '[\"permanent\",\"temporary\"]', 'day', 'yes', NULL, 'commercial_driver', NULL, '[\"bus\",\"truck\"]', NULL, NULL, NULL, NULL, '2022-10-21 02:10:27', '2022-10-21 02:22:59', NULL, NULL, NULL, NULL, NULL, NULL),
(163, 294, '8501020304', NULL, 'Shilp Arcade', 'behind Domino\'s Pizza,', '5ucz2SwcY0ECyN93G4XqC8UVolwzPij7voVQVdZf.png', 385001, 'Palanpur', 'Gujarat', NULL, NULL, 'Shilp Arcade', 'behind Domino\'s Pizza,', 385001, 'Palanpur', 'Gujarat', '2X9Cuol2psZOXsGyF8Xl7FtZUrW54mfO7xTXZbuz.png', 'clJhwgMtLjJb35bzJsn9hmEXQupdR9GkzzTz2cwH.png', 0, NULL, 'uM7dCosx4atyZySzRlTch1NFTJR1Fyq69ndM7Lzu.png', 0, NULL, '1vm4BClKgUFW5Ka78NSR72urzJ3Dnw87esNL6yWQ.png', 0, NULL, '9iCEhzqrirDYEim7a9ObESHWp65jGzQRn7aPmNF8.png', 0, NULL, '[\"gujarati\",\"hindi\",\"english\"]', '15000.00', 'valet_parking', NULL, 'day', 'yes', NULL, 'commercial_driver', NULL, '[\"bus\",\"truck\",\"hydra_crane\"]', NULL, NULL, NULL, NULL, '2022-10-21 02:19:59', '2022-10-21 03:09:01', NULL, NULL, NULL, NULL, NULL, NULL),
(164, 295, '8515357595', NULL, 'Shilp Arcade', '3\'rd Flour', NULL, 385535, 'Deesa', 'Gujarat', NULL, NULL, 'Shilp Arcade', '3\'rd Flour', 385535, 'Deesa', 'Gujarat', NULL, NULL, 0, NULL, NULL, 0, NULL, NULL, 0, NULL, NULL, 0, NULL, '[\"gujarati\",\"hindi\",\"english\"]', NULL, 'temporary', '[\"permanent\"]', 'day', 'yes', NULL, 'commercial_driver', NULL, '[\"tempo\",\"bus\",\"truck\"]', NULL, NULL, NULL, NULL, '2022-10-21 02:41:30', '2022-10-21 02:41:58', NULL, NULL, NULL, NULL, NULL, NULL),
(165, 296, '9586254555', NULL, 'Vinay Park', '3\'rd Flour', NULL, 384151, 'siddhpur', 'GUJARAT', NULL, NULL, 'Vinay Park', '3\'rd Flour', 384151, 'siddhpur', 'GUJARAT', NULL, NULL, 0, NULL, NULL, 0, NULL, NULL, 0, NULL, NULL, 0, NULL, '[\"hindi\",\"english\"]', '150000.00', 'permanent', NULL, 'day', 'yes', NULL, 'commercial_driver', NULL, '[\"bus\",\"truck\",\"hydra_crane\"]', NULL, NULL, NULL, NULL, '2022-10-21 02:53:37', '2022-10-21 02:53:37', NULL, NULL, NULL, NULL, NULL, NULL),
(166, 297, '9586201478', NULL, 'Vinay Park', '3\'rd Flour', NULL, 384151, 'siddhpur', 'GUJARAT', NULL, NULL, 'Vinay Park', '3\'rd Flour', 384151, 'siddhpur', 'GUJARAT', NULL, NULL, 0, NULL, NULL, 0, NULL, NULL, 0, NULL, NULL, 0, NULL, '[\"gujarati\",\"english\"]', NULL, 'temporary', NULL, 'day', 'yes', NULL, 'car_driver', 'automatic', NULL, NULL, NULL, NULL, NULL, '2022-10-21 03:03:13', '2022-10-21 03:03:13', NULL, NULL, NULL, NULL, NULL, NULL),
(167, 299, '9586154235', NULL, 'Vinay Park', '3\'rd Flour', NULL, 384151, 'siddhpur', 'GUJARAT', NULL, NULL, 'Vinay Park', '3\'rd Flour', 384151, 'siddhpur', 'GUJARAT', NULL, NULL, 0, NULL, NULL, 0, NULL, NULL, 0, NULL, NULL, 0, NULL, '[\"gujarati\",\"hindi\",\"english\"]', NULL, 'temporary', NULL, 'day', 'yes', NULL, 'car_driver', 'both', NULL, NULL, NULL, NULL, NULL, '2022-10-21 03:42:38', '2022-10-21 03:42:38', NULL, NULL, NULL, NULL, NULL, NULL),
(168, 300, '8855663322', NULL, 'Vinay Park', '3\'rd Flour', NULL, 385535, 'Deesa', 'Gujarat', NULL, NULL, 'Vinay Park', '3\'rd Flour', 385535, 'Deesa', 'Gujarat', NULL, NULL, 0, NULL, NULL, 0, NULL, NULL, 0, NULL, NULL, 0, NULL, '[\"gujarati\",\"hindi\",\"english\"]', NULL, 'temporary', NULL, 'day', 'yes', NULL, 'commercial_driver', NULL, '[\"tempo\",\"bus\",\"truck\",\"hydra_crane\"]', NULL, NULL, NULL, NULL, '2022-10-21 03:59:21', '2022-10-21 03:59:21', NULL, NULL, NULL, NULL, NULL, NULL),
(169, 301, '9955448811', NULL, 'Shiv Arcade', 'behind Domino\'s Pizza,', NULL, 385535, 'Deesa', 'Gujarat', NULL, NULL, 'Shiv Arcade', 'behind Domino\'s Pizza,', 385535, 'Deesa', 'Gujarat', NULL, NULL, 0, NULL, NULL, 0, NULL, NULL, 0, NULL, NULL, 0, NULL, '[\"gujarati\",\"hindi\",\"english\"]', NULL, 'temporary', NULL, 'day', 'yes', NULL, 'commercial_driver', NULL, '[\"tempo\",\"bus\",\"truck\"]', NULL, NULL, NULL, NULL, '2022-10-21 04:01:33', '2022-10-21 04:01:33', NULL, NULL, NULL, NULL, NULL, NULL),
(170, 302, '7455663355', NULL, 'Vinay Park', '3\'rd Flour', NULL, 385535, 'Deesa', 'Gujarat', NULL, NULL, 'Vinay Park', '3\'rd Flour', 385535, 'Deesa', 'Gujarat', NULL, NULL, 0, NULL, NULL, 0, NULL, NULL, 0, NULL, NULL, 0, NULL, '[\"gujarati\",\"hindi\",\"english\"]', '15000.00', 'permanent', '[\"permanent\"]', 'day', 'yes', NULL, 'commercial_driver', NULL, '[\"bus\",\"truck\",\"hydra_crane\"]', NULL, NULL, NULL, NULL, '2022-10-21 05:23:43', '2022-10-21 05:28:20', NULL, NULL, NULL, NULL, NULL, NULL),
(171, 303, '8798765458', NULL, 'Vinay Park', '3\'rd Flour', NULL, 385535, 'Deesa', 'Gujarat', NULL, NULL, 'Vinay Park', '3\'rd Flour', 385535, 'Deesa', 'Gujarat', NULL, NULL, 0, NULL, NULL, 0, NULL, NULL, 0, NULL, NULL, 0, NULL, '[\"gujarati\",\"hindi\",\"english\"]', '20000.00', 'permanent', '[\"permanent\"]', 'day', 'yes', NULL, 'commercial_driver', NULL, '[\"tempo\",\"bus\",\"truck\"]', NULL, NULL, NULL, NULL, '2022-10-21 05:47:01', '2022-10-21 05:47:31', NULL, NULL, NULL, NULL, NULL, NULL),
(172, 304, '7755330012', NULL, 'Shiv Arcade', '3\'rd Flour', NULL, 385535, 'Deesa', 'Gujarat', NULL, NULL, 'Shiv Arcade', '3\'rd Flour', 385535, 'Deesa', 'Gujarat', NULL, NULL, 0, NULL, NULL, 0, NULL, NULL, 0, NULL, NULL, 0, NULL, '[\"gujarati\",\"hindi\",\"english\"]', NULL, 'temporary', '[\"temporary\",\"valet_parking\"]', 'day', 'yes', NULL, 'car_driver', 'both', NULL, NULL, NULL, NULL, NULL, '2022-10-21 06:29:27', '2022-10-21 06:49:09', NULL, NULL, NULL, NULL, NULL, NULL),
(173, 305, '8855220033', NULL, 'Vinay Park', 'behind Domino\'s Pizza,', NULL, 385535, 'Palanpur', 'Gujarat', NULL, NULL, 'Vinay Park', 'behind Domino\'s Pizza,', 385535, 'Palanpur', 'Gujarat', NULL, NULL, 0, NULL, NULL, 0, NULL, NULL, 0, NULL, NULL, 0, NULL, '[\"gujarati\",\"hindi\",\"english\"]', '30000.00', 'permanent', NULL, 'day', 'yes', NULL, 'commercial_driver', NULL, '[\"tempo\",\"truck\",\"hydra_crane\"]', NULL, NULL, NULL, NULL, '2022-10-21 06:30:58', '2022-10-21 06:30:58', NULL, NULL, NULL, NULL, NULL, NULL),
(174, 306, '7822113355', NULL, 'Shilp Arcade', '3\'rd Flour', 'http://192.168.1.12//fundoo-app/public/storage/admin/images/iqXvPX3PpgphVWDhfthnpV33SAiShP0SueSdQPNH.png', 385535, 'Deesa', 'Gujarat', NULL, NULL, 'Shilp Arcade', '3\'rd Flour', 385535, 'Deesa', 'Gujarat', 'http://192.168.1.12//fundoo-app/public/storage/admin/images/FEhfvIMSE8bBe0R3Th2UhooYEwcqmMm4s9abBNIZ.png', 'http://192.168.1.12//fundoo-app/public/storage/admin/images/m6HppL3csbRG2SReEl028a4sY6KV6uyt5RHC39JU.png', 0, NULL, 'http://192.168.1.12//fundoo-app/public/storage/admin/images/2vuPWzwSJo9zYQx0SZ1TRK1YM4YeKnXr2KqAysHZ.png', 0, NULL, 'http://192.168.1.12//fundoo-app/public/storage/admin/images/xssZkxewnzmPSTdoii7EAKh2nuwziHl60yiTUfBR.png', 0, NULL, 'http://192.168.1.12//fundoo-app/public/storage/admin/images/hW3PNT3WNjZSsL1KYF7vnNFrclwAccoW6gtJnsvT.png', 0, NULL, '[\"gujarati\",\"hindi\",\"english\"]', NULL, 'pickup-drop', '[\"permanent\",\"temporary\"]', 'day', 'yes', NULL, 'both', 'manual', '[\"bus\",\"hydra_crane\",\"tractor\"]', NULL, NULL, NULL, NULL, '2022-10-21 06:32:23', '2022-11-22 11:50:27', NULL, NULL, NULL, NULL, NULL, NULL),
(175, 307, '6699887744', NULL, 'Shiv Arcade', 'behind Domino\'s Pizza,', NULL, 385001, 'Palanpur', 'Gujarat', NULL, NULL, 'Shiv Arcade', 'behind Domino\'s Pizza,', 385001, 'Palanpur', 'Gujarat', NULL, NULL, 0, NULL, NULL, 0, NULL, NULL, 0, NULL, NULL, 0, NULL, '[\"gujarati\",\"hindi\",\"english\",\"bengali\",\"marathi\"]', NULL, 'temporary', NULL, 'day', 'yes', NULL, 'car_driver', 'both', NULL, NULL, NULL, NULL, NULL, '2022-10-21 06:33:57', '2022-10-21 06:37:01', NULL, NULL, NULL, NULL, NULL, NULL),
(176, 308, '9922003366', NULL, 'Vinay Park', '3\'rd Flour', 'http://192.168.1.12//fundoo-app/public/storage/admin/images/S4WHjGUFHinplIwslyMGFNl8sRIg5r9R8UC5qAcr.png', 385535, 'Deesa', 'Gujarat', NULL, NULL, 'Vinay Park', '3\'rd Flour', 385535, 'Deesa', 'Gujarat', 'http://192.168.1.12//fundoo-app/public/storage/admin/images/G0PEuPc46WmTpbv09NBDcjbX8u5umDuuUrlb2dLO.png', 'http://192.168.1.12//fundoo-app/public/storage/admin/images/ugen0IGL8W8yCXFOP6JvOdlsmoacxwmN730XIrmJ.png', 0, NULL, 'http://192.168.1.12//fundoo-app/public/storage/admin/images/Nn76f0qdNZmpo18ev1lL1ldOqP6xWbz8XJ9zL69U.png', 0, NULL, 'http://192.168.1.12//fundoo-app/public/storage/admin/images/as1WvATmA47Zy0RWwSYXLLQ6xi3HLP0apmeJWz95.png', 0, NULL, 'http://192.168.1.12//fundoo-app/public/storage/admin/images/cB4jywZtIN7uJeJyseo2PM6DhHazt2m7xTJGNdEW.png', 0, NULL, '[\"gujarati\",\"hindi\",\"english\",\"bengali\",\"marathi\"]', '18000.00', 'valet_parking', '[\"permanent\",\"valet_parking\"]', 'day', 'yes', NULL, 'commercial_driver', NULL, '[\"tempo\",\"bus\",\"truck\",\"hydra_crane\"]', NULL, NULL, NULL, NULL, '2022-10-21 06:35:36', '2022-11-21 04:16:23', NULL, NULL, NULL, NULL, NULL, NULL),
(177, 309, '3300224477', NULL, 'Shilp Arcade', 'Near Ahmedabad Highway', 'http://localhost/public/admin/images/icon-admin-sidebar.png', 385001, 'Palanpur', 'Gujarat', NULL, NULL, 'Shilp Arcade', 'Near Ahmedabad Highway', 385001, 'Palanpur', 'Gujarat', 'http://localhost/public/admin/images/user-icon.png', 'http://localhost/public/admin/images/logo.png', 0, NULL, 'http://192.168.1.12/public/admin/images/user-icon.png', 0, NULL, 'http://localhost/public/admin/images/icon-admin-sidebar.png', 0, NULL, 'http://localhost/public/admin/images/login-bg.png', 0, NULL, '[\"gujarati\",\"hindi\",\"english\"]', '20000.00', 'permanent', '[\"permanent\",\"temporary\"]', 'day', 'yes', NULL, 'commercial_driver', NULL, '[\"bus\",\"truck\",\"hydra_crane\"]', NULL, NULL, NULL, NULL, '2022-11-03 04:22:23', '2022-11-03 04:22:23', NULL, NULL, NULL, NULL, NULL, NULL),
(178, 310, '9900227755', NULL, 'Shilp Arcade', 'behind Domino\'s Pizza,', 'NmuyYLmEjgiL2QzZYCOHmIH9N9hdVqBeAstavhYh.png', 385001, 'Palanpur', 'Gujarat', NULL, NULL, 'Shilp Arcade', 'behind Domino\'s Pizza,', 385001, 'Palanpur', 'Gujarat', 'UT0yjCa5sJUxoQqfIMGz0sBA8V6Qskxa25wS3RcH.png', 'http://192.168.1.12/fundoo-app/public/storage/admin/images/S3JKMbY07wWWyMa7jxeYnFl8Vgl1NjSNTRhpRhtl.png', 0, NULL, 'http://192.168.1.12/fundoo-app/public/storage/admin/images/k9q6Fu3DgzId5iX6YyAUEEdOsfJdoDa1iYNdril2.png', 0, NULL, 'http://192.168.1.12/fundoo-app/public/storage/admin/images/0iTUGQNZUe2Fr6WlDwVDksOM1c0VyMQqHLezWSDH.png', 0, NULL, 'http://192.168.1.12/fundoo-app/public/storage/admin/images/hU4LUCkUrfmLZsGHZNq88koXA8FcybTTSrEc0zih.png', 0, NULL, '[\"gujarati\",\"hindi\"]', '15000.00', 'permanent', '[\"permanent\",\"valet_parking\"]', 'day', 'yes', NULL, 'commercial_driver', NULL, '[\"bus\",\"truck\",\"hydra_crane\"]', NULL, NULL, NULL, NULL, '2022-11-03 04:31:18', '2022-11-03 05:33:41', NULL, NULL, NULL, NULL, NULL, NULL),
(182, 314, '7755886633', NULL, 'Shilp Arcade', 'Near Ahmedabad Highway', 'EM84LKfmDuWq3KNyAYW4JPf4lKVftaHSL8rsYySW.png', 385001, 'Palanpur', 'Gujarat', NULL, NULL, 'Shilp Arcade', 'Near Ahmedabad Highway', 385001, 'Palanpur', 'Gujarat', '0tkikReOzpkoUT7SrnOwGNfGF575g4FCWXlHFrr7.png', 'http://192.168.1.12/fundoo-app/public/storage/admin/images/STYgd7VezFogtHmA7y5i8Tekj0lpyTjNZPlC6Iet.png', 0, NULL, 'http://192.168.1.12/fundoo-app/public/storage/admin/images/egRZBcongQ8NtLP8Mqrtw5iLxa0JhQiesKIoSHFe.png', 0, NULL, 'http://192.168.1.12/fundoo-app/public/storage/admin/images/wS43mo4NqD3lEehmFVRUHd9QzPWTx0SImIlg2NoZ.png', 0, NULL, 'http://192.168.1.12/fundoo-app/public/storage/admin/images/YnkCNWUoOhOAFmexVPlG54W6WhyX0YYWNnbEfcTQ.png', 0, NULL, '[\"gujarati\",\"hindi\",\"english\"]', '15000.00', 'permanent', '[\"permanent\",\"temporary\"]', 'day', 'yes', NULL, 'both', 'manual', '[\"tempo\",\"bus\",\"truck\",\"hydra_crane\"]', NULL, NULL, NULL, NULL, '2022-11-03 05:24:43', '2022-11-07 04:50:59', NULL, NULL, NULL, NULL, NULL, NULL),
(183, 315, '8521203275', NULL, '32', '23', 'http://192.168.1.12/fundoo-app/public/storage/admin/images/Or0rNRCyxkdGS6nkN4sbfhY8zQfetLCFS3PGsFnC.png', 385001, '1', '1', NULL, NULL, '1', '2', 385001, '1', '1', 'http://192.168.1.12/fundoo-app/public/storage/admin/images/6ZD0aOT8XLOEkY0IvGxcGNhSVagamvP826cQtQRt.png', 'http://192.168.1.12/fundoo-app/public/storage/admin/images/5IeME2THGrtK85KhW39VhjFlxW5xo2DjyUbWThpa.png', 1, NULL, 'http://192.168.1.12/fundoo-app/public/storage/admin/images/klEQ9OVqHq1K4zw1Q2grmuhL630jmmZOcm2QKNGu.png', 1, NULL, 'http://192.168.1.12/fundoo-app/public/storage/admin/images/eqvAQTtdm5L5Amk1greabfBu1309v1bIsFUFl6ZW.png', 1, NULL, 'http://192.168.1.12/fundoo-app/public/storage/admin/images/UnE2Kzp0Fq466VyMAZcjAQ5Qw0tfQbkdyQ2GjtUD.png', 1, NULL, '[\"hindi\",\"english\"]', '18000.00', 'temporary', '[\"permanent\",\"temporary\"]', 'night', 'yes', NULL, 'car_driver', 'both', '[\"tempo\"]', NULL, NULL, NULL, NULL, '2022-11-03 06:25:29', '2022-11-12 01:06:09', NULL, NULL, NULL, NULL, NULL, NULL),
(184, 316, '9012326545', NULL, 'Somnath Township', 'Near Hawai Pillar', 'http://192.168.1.12//fundoo-app/public/storage/admin/images/yyNdo9pobw1rtkzBD77d3ODWECW734h8lrkEjcKk.png', 385001, 'Deesa', 'Gujarat', NULL, NULL, 'Somnath Township', 'Near Hawai Pillar', 385001, 'Deesa', 'Gujarat', 'http://192.168.1.12//fundoo-app/public/storage/admin/images/4ABdA5PIZ3qwNDoRjFlde2QwrrktINv0QW4i6ZuI.png', 'http://192.168.1.12//fundoo-app/public/storage/admin/images/2iR4IbfJVvR9FA8T2yyWNptIaxcuIoHjHLyddALU.png', 0, NULL, 'http://192.168.1.12//fundoo-app/public/storage/admin/images/VU1FR5SqJD16wuxSFFpY1HXpuI7MVcT2PEwOrXgH.png', 0, NULL, 'http://192.168.1.12//fundoo-app/public/storage/admin/images/qxuzJba1xTEmC6NbtpFcnIOWTXitfpLxAsg5hbEJ.png', 0, NULL, 'http://192.168.1.12//fundoo-app/public/storage/admin/images/bp0rXT0eU02MCnqHQ3npMrpbg6RLmTBmMb34pMVA.png', 0, NULL, '[\"gujarati\",\"hindi\",\"marathi\"]', '18000.00', 'permanent', '[\"permanent\",\"event_valet_parking\"]', 'night', 'yes', NULL, 'car_driver', 'both', '[\"tempo\"]', '1234567890', 'Sharwan', 'SBIN0010973', 'SBI', '2022-11-07 05:27:14', '2022-12-12 04:44:21', NULL, NULL, NULL, NULL, NULL, NULL),
(185, 317, '8515246535', NULL, 'Vinay Park', '3\'rd Flour', 'http://localhost//fundoo-app/public/storage/admin/images/NAEduOI3GsMtE6mVzZbf6seB7O1iiaN26AHhlIou.png', 384151, 'siddhpur', 'GUJARAT', NULL, NULL, 'Vinay Park', '3\'rd Flour', 384151, 'siddhpur', 'GUJARAT', 'http://localhost//fundoo-app/public/storage/admin/images/ozLoAzfHTEQOvgO3E0wdhyUDZa40wAbM90vaX1dk.png', 'http://192.168.1.12///fundoo-app/public/storage/admin/images/qJEmXVvRagon0RdRvYXZEWi87OBpU4F6i8NpQ0AH.png', 0, NULL, 'http://192.168.1.12/fundoo-app/public/storage/admin/images/bMoFKIpRjuE55er1OlO3DgqDrZ34t5iibfTuJdvg.png', 0, NULL, 'http://192.168.1.12///fundoo-app/public/storage/admin/images/cJbuOmXecmTrk1LUzMvhMxCGDuHhHvlNLYJT8Wf6.png', 0, NULL, 'http://192.168.1.12///fundoo-app/public/storage/admin/images/f4aKGYlAXGOEksFyZIkb6J8u8A966dAUpSBH9qQy.png', 0, NULL, '[\"gujarati\",\"hindi\"]', '100000.00', 'permanent', '[\"temporary\"]', 'day', 'yes', NULL, 'both', 'automatic', '[\"tempo\",\"bus\"]', NULL, NULL, NULL, NULL, '2022-12-12 04:57:43', '2022-12-12 10:27:17', NULL, NULL, NULL, NULL, NULL, NULL),
(186, 318, '8515246535', NULL, 'Vinay Park', '3\'rd Flour', 'http://192.168.1.12///fundoo-app/public/storage/admin/images/qGNnjYsDExIaMw1Ki5BSwx9cETOjkKKr39HapUeg.png', 384151, 'siddhpur', 'GUJARAT', NULL, NULL, 'Vinay Park', '3\'rd Flour', 384151, 'siddhpur', 'GUJARAT', 'http://192.168.1.12///fundoo-app/public/storage/admin/images/TgxHCUWZ0BQImWj7VVuRbLQ3uhMmh7hBS0CBpbzR.png', 'http://192.168.1.12///fundoo-app/public/storage/admin/images/hBJnJWPeYODy9jtQ5fnHUJWG9ynTMmCDdNulONLt.png', 0, NULL, 'http://192.168.1.12///fundoo-app/public/storage/admin/images/wMPjZ9CHG64oPXH8Kc2grMSI993jDPMaXwRAU3gi.png', 0, NULL, 'http://192.168.1.12///fundoo-app/public/storage/admin/images/4RyG5itAijnfhpeGadyu5qz5UB0aGltgzbsCYjqd.png', 0, NULL, 'http://192.168.1.12///fundoo-app/public/storage/admin/images/rzGC7CyY7t7GtOxjcEeu7zx6gItVrZVGysPTbK8e.png', 0, NULL, '[\"gujarati\",\"english\"]', NULL, 'temporary', '[\"valet_parking\"]', 'day', 'yes', NULL, 'commercial_driver', NULL, '[\"tempo\",\"bus\",\"truck\"]', NULL, NULL, NULL, NULL, '2022-12-12 10:29:38', '2022-12-12 10:30:06', NULL, NULL, NULL, NULL, NULL, NULL),
(187, 319, '8515246555', NULL, 'Vinay Park', 'Near Ahmedabad Highway', 'http://192.168.1.12///fundoo-app/public/storage/admin/images/GxmS7kjfzBh1ClVAJoLfEMp9MvzJ5NqksotJ5aX2.png', 384151, 'siddhpur', 'GUJARAT', NULL, NULL, 'Vinay Park', 'Near Ahmedabad Highway', 384151, 'siddhpur', 'GUJARAT', 'http://192.168.1.12///fundoo-app/public/storage/admin/images/rLWatd9WgmGP0SNlNyTH2mZ0j1QMwhK9ZfZCeHQI.png', 'http://192.168.1.12///fundoo-app/public/storage/admin/images/D1ui03jzPd1BulcACVPumvPAkhOzx0Mrz4m2Bv67.png', 1, NULL, 'http://192.168.1.12///fundoo-app/public/storage/admin/images/IBIap6q17F68usKcx4RhbWAdCibwZYdlnfNMaRZm.png', 1, NULL, 'http://192.168.1.12///fundoo-app/public/storage/admin/images/HMYibhmeGhPSmR6lzXXAFqtr0ShBZUe6fF40VHeT.png', 1, NULL, 'http://192.168.1.12///fundoo-app/public/storage/admin/images/mmJk24dnzckLhQywwIOUwFLN5n1Qw7Y3LYP7FEI7.png', 1, NULL, '[\"hindi\",\"english\"]', '100000.00', 'temporary', '[\"temporary\"]', 'day', 'yes', NULL, 'both', 'both', '[\"tempo\"]', NULL, NULL, NULL, NULL, '2022-12-12 11:38:20', '2022-12-12 12:28:28', NULL, NULL, NULL, NULL, NULL, NULL),
(188, 320, '8515246530', NULL, 'Vinay Park', 'Near Ahmedabad Highway', 'http://192.168.1.12/fundoo-app//fundoo-app/public/storage/admin/images/HLjCNIuoLLdzgDBTnZBeiU68fjd0p5Ee8aybQnhb.png', 384151, 'siddhpur', 'GUJARAT', NULL, NULL, 'Vinay Park', 'Near Ahmedabad Highway', 384151, 'siddhpur', 'GUJARAT', 'http://192.168.1.12/fundoo-app//fundoo-app/public/storage/admin/images/ERoPiG7KXQ6Ar9sVkBhUsC3s3YaBF6yaBtDWooHq.png', 'http://192.168.1.12/fundoo-app//public/storage/admin/images/CKBRZ8Xn8qWJTOLxR3gqglfStJlyLfMgIu9T849f.png', 0, NULL, 'http://192.168.1.12/fundoo-app//public/storage/admin/images/IiSIaW3ng3yhDMoL2HyK3EcAvGdb6EwSd8Kwlr9b.png', 0, NULL, 'http://192.168.1.12/fundoo-app//public/storage/admin/images/p9lCkWuovng4QFnYLYMvgWAIt1QGzeqDfs8q2Sp3.png', 0, NULL, 'http://192.168.1.12/fundoo-app//public/storage/admin/images/6XpDtf7xr7KZIFtte6IL3YVgXkGToGcpYKGRUhsC.png', 0, NULL, '[\"gujarati\",\"hindi\"]', NULL, 'valet_parking', '[\"pickup-drop\"]', 'day', 'yes', NULL, 'both', 'manual', '[\"tempo\"]', NULL, NULL, NULL, NULL, '2022-12-12 12:03:40', '2022-12-12 12:29:22', NULL, NULL, NULL, NULL, NULL, NULL),
(189, 321, '8515247535', NULL, 'gdrh', 'hghg', 'http://192.168.1.12/fundoo-app//public/storage/admin/images/KIvs8NLl2ApB9k1Sbc5T9HNp5BZQ3L3p0PYw5X8z.png', 384151, 'siddhpur', 'GUJARAT', NULL, NULL, 'gdrh', 'hghg', 384151, 'siddhpur', 'GUJARAT', 'http://192.168.1.12/fundoo-app//public/storage/admin/images/4jhIBHzGDBh4U5MBiPWHlEINLn6WydZrPT3PDoxQ.png', 'http://192.168.1.12/fundoo-app//public/storage/admin/images/oiR1auHXJl8ns22u3hFCPaYDLJAWcJdyNEcEKD5O.png', 1, NULL, 'http://192.168.1.12/fundoo-app//public/storage/admin/images/8kGzGKZR6MD12m4fh8jCz8CoDJ4438mYM6IDz4bE.jpg', 1, NULL, 'http://192.168.1.12/fundoo-app//public/storage/admin/images/zLmzFOFTyvXkM5ptb0vVrKJM4IaIU3ptOOi0GvwD.png', 1, NULL, 'http://192.168.1.12/fundoo-app//public/storage/admin/images/E3QWmbkdTWoGNd07IyqxtbT4jBraTjVTrooTYXC7.png', 1, NULL, '[\"hindi\",\"english\"]', '10000.00', 'permanent', '[\"temporary\"]', 'day', 'yes', NULL, 'both', 'manual', '[\"tempo\"]', NULL, NULL, NULL, NULL, '2022-12-12 12:11:00', '2022-12-12 12:27:16', NULL, NULL, NULL, NULL, NULL, NULL);
INSERT INTO `driver_extendeds` (`id`, `user_id`, `aditional_contact_no`, `expriance`, `post_ads_appartment`, `post_ads_block_flat`, `post_ads_proof`, `post_ads_pincode`, `post_ads_city`, `post_ads_state`, `post_ads_type`, `resi_ads_type`, `resi_ads_apartment`, `resi_ads_block_flate`, `resi_ads_pincode`, `resi_ads_city`, `resi_ads_state`, `resi_ads_proof`, `license`, `license_status`, `driving_licence_reject_reason`, `aadhar_card`, `aadhar_card_status`, `aadhar_card_reject_reason`, `pancard`, `pancard_status`, `pancard_reject_reason`, `light_bill`, `light_bill_status`, `light_bill_reject_reason`, `language_known`, `monthly_salary`, `work_type`, `multi_work_type`, `work_time`, `work_station`, `is_kyc_verify`, `driver_type`, `vehicle_type`, `select_vehicle_type`, `account_number`, `account_holder_name`, `ifsc_code`, `branch_name`, `created_at`, `updated_at`, `deleted_at`, `post_ads_late`, `post_ads_long`, `resi_ads_late`, `resi_ads_long`, `current_location`) VALUES
(190, 322, '1234565689', NULL, 'new ap', '56', NULL, 385001, 'palanpur', 'gujarat', NULL, NULL, 'new ap', '56', 385001, 'palanpur', 'gujarat', 'http://192.168.1.12/fundoo-app//public/storage/admin/images/vM2dAc4qX1m0DMvs59Ufjy8QERHSSt2u1QMeiAGF.jpg', 'http://192.168.1.12/fundoo-app//public/storage/admin/images/fCzQQdEbkMIj0PYC0B5aOYnlROUHkKpIkZ5P1N4O.jpg', 1, NULL, 'http://192.168.1.12/fundoo-app//public/storage/admin/images/Gx3n1UFWrEZmRu2asANO5RQBl7jKLnaamKAGQUFt.jpg', 1, NULL, 'http://192.168.1.12/fundoo-app//public/storage/admin/images/VPWACzHpYcNPxicmuy0OjcklJSfnty7xfW360Gdh.jpg', 1, NULL, NULL, 0, NULL, '[\"gujarati\",\"hindi\"]', NULL, 'permanent', '[\"temporary\",\"pickup-drop\"]', 'day', 'yes', NULL, 'commercial_driver', NULL, '[\"tempo\",\"bus\",\"truck\",\"hydra_crane\"]', NULL, NULL, NULL, NULL, '2022-12-12 12:33:44', '2022-12-12 12:34:13', NULL, NULL, NULL, NULL, NULL, NULL),
(191, 325, '9863256320', NULL, 'Vinay Park', '3\'rd Flour', 'http://192.168.1.12/fundoo-app//public/storage/admin/images/oOu2dAp4oIC2fgRSQD0jS4X1UgD2iDyeysHPdVnx.png', 384151, 'siddhpur', 'GUJARAT', NULL, NULL, 'Vinay Park', '3\'rd Flour', 384151, 'siddhpur', 'GUJARAT', 'http://192.168.1.12/fundoo-app//public/storage/admin/images/1JDVTPWjDOBMWJpoExXW5h4b52Nu6SUDjx4Nr2jD.png', 'http://192.168.1.12/fundoo-app//public/storage/admin/images/WzI1SLOSdoSmsE9STOwYUOKc8Bb3Z08UvxL2qarA.png', 0, NULL, 'http://192.168.1.12/fundoo-app//public/storage/admin/images/lVRylTW9TrNnF2AuxvvEDzLxJ2k0107fdeQVkuAf.png', 0, NULL, 'http://192.168.1.12/fundoo-app//public/storage/admin/images/5JVVMxeDAgP1HQU28jnj4uTGCyxMYWYzsAl8ZBPU.png', 0, NULL, 'http://192.168.1.12/fundoo-app//public/storage/admin/images/oLtmw6SEXrQncQzxvqo2hTqmDHtFhwMI5US5dJJW.png', 0, NULL, '[\"gujarati\",\"hindi\"]', '100000.00', 'permanent', '[\"permanent\"]', 'day', 'yes', NULL, 'both', 'both', '[\"tempo\",\"bus\"]', NULL, NULL, NULL, NULL, '2022-12-13 05:19:41', '2022-12-13 05:19:41', NULL, NULL, NULL, NULL, NULL, NULL),
(192, 326, '9632569876', NULL, 'Vinay Park', '3\'rd Flour', 'LPUCF8ARdpRJvhMpSjQUxYR7NHllpD3nETlYYEKt.png', 384151, 'siddhpur', 'GUJARAT', NULL, NULL, 'Vinay Park', '3\'rd Flour', 384151, 'siddhpur', 'GUJARAT', 'A5np2sfgBbQQz82iKp5qO43zDt6Nj58dxcSGE9ZB.png', '1UHe87Vev2NsTLxRNtKy0bVVQ4WHangGJBRVo5sc.png', 0, NULL, 'm8MJHipbGiI9paSivpm9UKpidoUoJNh3pxZfJCdF.png', 0, NULL, 'W9XGwWhH3Ys1AdNDWqAqASaQoUcNqCVVwpnfsRIZ.png', 0, NULL, 'ClOfWMpMOaEgNTJxrYfXnCXbrEi3OwTXwFUx9vZO.png', 0, NULL, '[\"hindi\",\"bengali\"]', NULL, 'temporary', NULL, 'day', 'yes', NULL, 'both', 'both', '[\"tempo\",\"tractor\"]', NULL, NULL, NULL, NULL, '2022-12-13 05:21:29', '2022-12-13 05:21:29', NULL, NULL, NULL, NULL, NULL, NULL),
(193, 327, '8963210358', NULL, 'Vinay Park', 'behind Domino\'s Pizza,', 'R7DGSbqC7bajBSVFvCN5y8pHatCwmKkdr7WfnBYz.png', 385001, 'Palanpur', 'Gujarat', NULL, NULL, 'Vinay Park', 'behind Domino\'s Pizza,', 385001, 'Palanpur', 'Gujarat', 'DTp8ICLXZgkRqzm4WGxDgxMpmuY2gbkg9aXe5K5A.png', 'SuD2eI7mzqG5zk4lCKJmp3Scf5Fvs6jCmJdZX9OQ.png', 0, NULL, 'liqwF2dUHXr2ZVFG4d3HWZi3tHYF5HpKLs3Bm70Q.png', 0, NULL, 'icxq9FIRHoUlxQKXtuD1iRQcsUFeYkyhZK3yP08D.png', 0, NULL, 'fgOYrO8t9I8hmmSyJ0pwjM9ao9pAGEYan5QcYRMp.png', 0, NULL, '[\"gujarati\",\"hindi\"]', '100000.00', 'valet_parking', NULL, 'day', 'yes', NULL, 'both', 'both', '[\"tempo\",\"bus\",\"truck\"]', NULL, NULL, NULL, NULL, '2022-12-13 05:23:51', '2022-12-13 05:23:51', NULL, NULL, NULL, NULL, NULL, NULL),
(194, 328, '9632587400', NULL, 'Vinay Park', '3\'rd Flour', 'xcht4qwwOUZyf0jxFQsoFIfbtvka146L71B0yL2v.png', 384151, 'siddhpur', 'GUJARAT', NULL, NULL, 'Vinay Park', '3\'rd Flour', 384151, 'siddhpur', 'GUJARAT', '1h1rlXFTeBOOf8HqG7PUwFjx8sIuEt3qmsjD68IP.png', 'http://192.168.1.12/fundoo-app//public/storage/admin/images/g1cTIlNrD2DAtCzhLgQmrWejlpCvgnGzUGlRRrU7.jpg', 0, NULL, 'http://192.168.1.12/fundoo-app//public/storage/admin/images/dZ7JmYwGRIHkbdGN0xYn0PxoeuHPFo6pzC8FCkPN.jpg', 0, NULL, 'http://192.168.1.12/fundoo-app//public/storage/admin/images/5fuVO7AhFvKAh8Jv0HRwkO1S7vl8jNqTFf8ULvne.jpg', 0, NULL, 'http://192.168.1.12/fundoo-app//public/storage/admin/images/aN5oKWoRkjDC9qvJr5czEAGFwj8NgnbYmnFpM9Br.jpg', 0, NULL, '[\"hindi\",\"english\"]', NULL, 'pickup-drop', NULL, 'day', 'yes', NULL, 'both', 'both', '[\"tempo\",\"bus\",\"truck\"]', NULL, NULL, NULL, NULL, '2022-12-13 05:26:29', '2022-12-22 11:50:56', NULL, NULL, NULL, NULL, NULL, 'palanpur');

-- --------------------------------------------------------

--
-- Table structure for table `failed_jobs`
--

CREATE TABLE `failed_jobs` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `uuid` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `connection` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `queue` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `payload` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `exception` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `failed_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `faqs`
--

CREATE TABLE `faqs` (
  `id` int(10) UNSIGNED NOT NULL,
  `question` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `answer` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `status` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `faqs`
--

INSERT INTO `faqs` (`id`, `question`, `answer`, `status`, `created_at`, `updated_at`, `deleted_at`) VALUES
(1, '1.What are common FAQ questions?', '<p>As you can see, FAQ questions are essential for any organization, and if you want to know how to do FAQ and build the content of the list of FAQ questions, dive in.</p>', 'active', '2022-10-11 01:50:00', '2022-10-11 01:51:10', NULL),
(2, '2.How do you start a FAQ?', '<p>The key steps to creating a strong, effective FAQ page include: Gathering your most common questions from your email, staff, and customer support lines. Writing the answers using clear, easy-to-understand language. Organizing the questions on a page with clear navigation</p>', 'active', '2022-10-11 01:50:26', '2022-10-11 01:51:25', NULL),
(3, '3.How do you display FAQ?', '<div class=\"co8aDb\" role=\"heading\" aria-level=\"3\"><strong>How to Create a User-Friendly FAQ Page in 7 Steps</strong></div>\r\n<div class=\"RqBzHd\">\r\n<ol class=\"X5LH0c\">\r\n<li class=\"TrT0Xe\">Research your most frequently asked questions. ...</li>\r\n<li class=\"TrT0Xe\">Curate your questions into categories. ...</li>\r\n<li class=\"TrT0Xe\">Keep your answers clear and concise. ...</li>\r\n<li class=\"TrT0Xe\">Include search navigation. ...</li>\r\n<li class=\"TrT0Xe\">Use internal links. ...</li>\r\n<li class=\"TrT0Xe\">Use Schema Markup on Your FAQ Page. ...</li>\r\n<li class=\"TrT0Xe\">Continue to update and expand your FAQs. ...</li>\r\n<li class=\"TrT0Xe\">Track and monitor performance.</li>\r\n</ol>\r\n</div>', 'active', '2022-10-11 01:52:12', '2022-10-11 01:52:26', NULL),
(4, '4.What should FAQ contain?', '<p>An FAQ page (short for Frequently Asked Question page) is a part of your website that&nbsp;<strong>provides answers to common questions, assuages concerns, and overcomes objections</strong>. It\'s a space where customers can delve into the finer details of your product or service, away from your sales-focused landing pages and homepage</p>', 'active', '2022-10-11 01:53:01', '2022-10-11 01:53:01', NULL),
(5, '5.What is FAQ short?', '<p><strong>frequently asked question</strong>, frequently asked questions &mdash;used to refer to a list of answers to typical questions that users of a Web site might ask.</p>', 'active', '2022-10-11 01:53:34', '2022-10-11 01:53:34', NULL),
(6, 'testing', '<p>fdgfgfgg</p>', 'active', '2022-12-10 07:31:40', '2022-12-10 07:31:56', '2022-12-10 07:31:56'),
(7, 'my question', '<p>my answer</p>', 'active', '2022-12-10 07:33:38', '2022-12-10 07:33:46', '2022-12-10 07:33:46'),
(8, 'testing', '<p>my</p>', 'active', '2022-12-10 07:39:11', '2022-12-10 07:39:39', '2022-12-10 07:39:39'),
(9, 'testing', '<p>gfhfhh</p>', 'active', '2022-12-13 05:28:52', '2022-12-13 05:28:52', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `fuel_details`
--

CREATE TABLE `fuel_details` (
  `id` int(10) UNSIGNED NOT NULL,
  `assign_driver_id` int(10) UNSIGNED NOT NULL,
  `fuel_litter` decimal(8,2) NOT NULL,
  `fuel_type` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `rate` decimal(8,2) NOT NULL,
  `total_amount` decimal(8,2) NOT NULL,
  `date` date NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL,
  `time` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `fuel_details`
--

INSERT INTO `fuel_details` (`id`, `assign_driver_id`, `fuel_litter`, `fuel_type`, `rate`, `total_amount`, `date`, `created_at`, `updated_at`, `deleted_at`, `time`) VALUES
(2, 148, '12.00', 'Petrol', '75.00', '900.00', '2022-07-06', '2022-08-05 03:47:03', '2022-08-05 03:47:03', NULL, '00:00:00'),
(3, 128, '12.00', 'Diesel', '80.00', '960.00', '2022-07-06', '2022-08-05 03:56:18', '2022-08-05 03:56:18', NULL, '00:00:00'),
(4, 148, '5.20', 'Petrol', '100.00', '520.00', '2022-07-06', '2022-08-05 03:57:01', '2022-08-05 03:57:01', NULL, '00:00:00'),
(5, 148, '5.20', 'Diesel', '100.00', '520.00', '2022-07-06', '2022-08-05 06:55:17', '2022-08-05 06:55:17', NULL, '00:00:00'),
(6, 128, '5.20', 'Petrol', '86.00', '446.68', '2022-07-06', '2022-08-05 06:56:43', '2022-08-05 06:56:43', NULL, '00:00:00'),
(7, 148, '7.10', 'Diesel', '100.00', '710.00', '2022-06-07', '2022-08-05 23:17:28', '2022-08-05 23:17:28', NULL, '00:00:00'),
(8, 128, '22.00', 'Petrol', '75.00', '1650.00', '2022-08-06', '2022-08-05 23:19:53', '2022-08-05 23:19:53', NULL, '00:00:00'),
(9, 148, '15.20', 'Diesel', '10.00', '152.00', '2022-08-06', '2022-08-05 23:22:01', '2022-08-05 23:22:01', NULL, '00:00:00'),
(11, 128, '16.00', 'Petrol', '11.00', '176.00', '2022-06-08', '2022-08-06 00:51:19', '2022-08-06 00:51:19', NULL, '00:00:00'),
(12, 148, '23.00', 'Diesel', '73.00', '1667.50', '2022-06-08', '2022-08-06 00:52:47', '2022-08-06 00:52:47', NULL, '00:00:00'),
(13, 128, '100.00', 'Petrol', '80.00', '8000.00', '2022-08-06', '2022-08-06 01:13:24', '2022-08-06 01:13:24', NULL, '00:00:00'),
(14, 148, '5.20', 'Diesel', '86.00', '446.68', '2022-07-06', '2022-08-06 01:19:22', '2022-08-06 01:19:22', NULL, '00:00:00'),
(15, 128, '5.20', 'Petrol', '16.00', '80.60', '2022-07-06', '2022-08-06 01:20:02', '2022-08-06 01:20:02', NULL, '00:00:00'),
(16, 128, '5.20', 'Diesel', '15.50', '80.60', '2022-07-06', '2022-08-06 01:23:51', '2022-08-06 01:23:51', NULL, '00:00:00'),
(17, 128, '73.00', 'Petrol', '72.50', '5292.50', '2022-08-06', '2022-08-06 01:35:34', '2022-08-06 01:35:34', NULL, '00:00:00'),
(18, 128, '73.50', 'Diesel', '72.00', '5292.00', '2022-08-06', '2022-08-06 01:36:57', '2022-08-06 01:36:57', NULL, '00:00:00'),
(20, 74, '15.00', 'Petrol', '25.00', '375.00', '2022-08-10', '2022-08-10 01:23:03', '2022-08-10 01:23:03', NULL, '00:00:00'),
(21, 74, '15.54', 'Diesel', '25.65', '398.60', '2022-08-10', '2022-08-10 01:24:50', '2022-08-10 01:24:50', NULL, '00:00:00'),
(22, 74, '55.65', 'Petrol', '20.45', '1138.04', '2022-08-12', '2022-08-12 02:26:47', '2022-08-12 02:26:47', NULL, '00:00:00'),
(23, 128, '5.20', 'Petrol', '15.50', '80.60', '2022-07-06', '2022-09-12 07:04:45', '2022-09-12 07:04:45', NULL, '00:00:00'),
(24, 128, '5.20', NULL, '15.50', '80.60', '2022-07-06', '2022-12-14 13:16:24', '2022-12-14 13:16:24', NULL, NULL),
(25, 128, '7.20', NULL, '20.20', '145.44', '2022-07-14', '2022-12-14 13:17:16', '2022-12-14 13:17:16', NULL, NULL),
(26, 128, '7.20', NULL, '20.20', '145.44', '2022-07-14', '2022-12-14 13:17:28', '2022-12-14 13:17:28', NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `help__lines`
--

CREATE TABLE `help__lines` (
  `id` int(10) UNSIGNED NOT NULL,
  `reason` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `nots` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `user_id` int(10) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `help__lines`
--

INSERT INTO `help__lines` (`id`, `reason`, `nots`, `user_id`, `created_at`, `updated_at`, `deleted_at`) VALUES
(1, 'Driver car dose not proper drive', 'nothing', 128, '2022-07-29 00:58:43', '2022-08-02 23:56:09', '2022-08-02 23:56:09'),
(2, 'Driver car dose not proper drive', 'nothing', 128, '2022-07-29 01:00:23', '2022-07-29 07:28:44', '2022-07-29 07:28:44'),
(3, 'Driver car dose not proper drive', 'nothing', 128, '2022-07-29 01:00:24', '2022-08-22 05:54:38', '2022-08-22 05:54:38'),
(4, 'Driver car dose not proper drive', 'nothing', 128, '2022-07-29 01:00:25', '2022-07-29 01:00:25', NULL),
(5, 'Driver car dose not proper drive', 'nothing', 128, '2022-07-29 01:00:26', '2022-07-29 01:00:26', NULL),
(6, 'Driver car dose not proper drive', 'nothing', 128, '2022-07-29 01:05:49', '2022-07-29 01:05:49', NULL),
(7, 'Driver car dose not proper drive', 'nothing', 128, '2022-07-29 01:06:50', '2022-07-29 02:32:23', '2022-07-29 02:32:23'),
(8, 'Driver car dose not proper drive', 'nothing', 128, '2022-07-29 01:12:31', '2022-07-29 02:31:02', '2022-07-29 02:31:02'),
(9, 'Driver car dose not proper drive', 'nothing', 128, '2022-07-29 04:57:33', '2022-07-29 04:57:33', NULL),
(14, 'Driver car dose not proper drive', 'nothing', 128, '2022-08-27 05:18:30', '2022-08-27 05:18:30', NULL),
(15, 'Driver car dose not proper drive', 'nothing', 128, '2022-08-27 05:18:49', '2022-08-27 05:18:49', NULL),
(16, 'ikluiku', 'kuikuik', 128, '2022-12-12 06:44:21', '2022-12-12 06:44:21', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `leave_details`
--

CREATE TABLE `leave_details` (
  `id` int(10) UNSIGNED NOT NULL,
  `assign_driver_id` int(10) UNSIGNED NOT NULL,
  `from_date` datetime NOT NULL,
  `to_date` datetime NOT NULL,
  `leave_type` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `status` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `remark` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `leave_details`
--

INSERT INTO `leave_details` (`id`, `assign_driver_id`, `from_date`, `to_date`, `leave_type`, `status`, `remark`, `created_at`, `updated_at`, `deleted_at`) VALUES
(2, 327, '2022-08-05 07:02:52', '2022-08-08 08:02:52', 'Half Leave', 'cancel', 'Going to mumbai', '2022-08-05 04:18:17', '2023-01-04 09:14:13', NULL),
(3, 327, '2022-09-05 00:00:00', '2022-09-08 00:00:00', 'Full Leave', 'pending', 'Going to Delhi', '2023-09-08 04:19:06', '2022-08-05 04:19:06', NULL),
(4, 150, '2022-09-05 00:00:00', '2022-09-08 00:00:00', 'Half Leave', 'approve', 'Going to Delhi', '2022-08-05 06:57:06', '2022-08-05 06:57:06', NULL),
(9, 128, '2022-08-06 00:00:00', '2022-08-12 00:00:00', 'Full Leave', 'approve', 'Going to Deesa', '2022-08-05 23:53:40', '2022-08-05 23:53:40', NULL),
(10, 327, '2022-07-06 00:00:00', '2022-07-09 00:00:00', 'Full Leave', 'cancel', 'Going to Ahemadabad', '2022-12-31 23:54:21', '2022-08-05 23:54:21', NULL),
(11, 327, '2023-01-01 16:46:00', '2023-01-01 00:00:00', 'Half Leave', 'cancel', 'Going to Palanpur', '2023-01-01 00:46:21', '2023-01-01 00:46:11', NULL),
(13, 148, '2022-08-06 00:00:00', '2022-08-08 00:00:00', 'Full Leave', 'pending', 'Going to Mahesana', '2022-08-06 00:49:00', '2022-08-06 00:49:00', NULL),
(14, 327, '2022-03-08 00:00:00', '2022-03-12 00:00:00', 'Half Leave', 'pending', 'Going to Ambaji', '2022-11-05 01:15:59', '2022-08-06 01:15:59', NULL),
(15, 148, '2022-08-10 00:00:00', '2022-08-10 00:00:00', 'Full Leave', 'approve', 'Going to Dwarka', '2022-08-10 01:30:34', '2022-08-10 01:30:34', NULL),
(16, 148, '2022-08-12 00:00:00', '2022-08-12 00:00:00', 'Full Leave', 'approve', 'Going To Beyt Dwarka', '2022-08-12 02:38:05', '2022-08-12 02:38:05', NULL),
(17, 128, '2022-08-12 00:00:00', '2022-08-12 00:00:00', 'Half Leave', 'cancel', 'Going To Palanpur', '2023-08-03 02:38:59', '2022-08-12 02:38:59', NULL),
(19, 128, '2022-09-05 00:00:00', '2022-09-08 00:00:00', 'Full Leave', 'approve', 'Going to Delhi', '2023-09-01 02:35:38', '2022-09-01 02:35:38', NULL),
(20, 128, '2022-11-09 00:00:00', '2022-11-11 00:00:00', 'Full Leave', 'approve', 'Going to Ambaji', '2020-11-04 01:27:46', '2022-11-20 23:15:40', NULL);

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
(2, '2014_10_12_100000_create_password_resets_table', 1),
(3, '2019_08_19_000000_create_failed_jobs_table', 1),
(5, '2022_06_23_073248_create_setting_table', 3),
(16, '2022_06_23_110520_create_pages_table', 4),
(17, '2022_06_23_135915_create_states_table', 4),
(18, '2022_06_23_150828_create_cities_table', 4),
(19, '2022_06_23_151744_create_carcompanies_table', 4),
(20, '2022_06_23_152058_create_carmodels_table', 4),
(21, '2022_06_23_152529_create_caryears_table', 4),
(22, '2022_06_23_153958_create_offercodes_table', 4),
(23, '2022_06_23_155132_create_staticdatas_table', 4),
(26, '2022_06_25_074626_create_driver_extendeds_table', 5),
(27, '2022_06_25_075038_create_driver_categories_table', 6),
(28, '2022_06_25_075414_create_customer_extends_table', 7),
(29, '2022_06_25_080051_create_customer_car_details_table', 8),
(30, '2022_06_25_080912_create_permanent_inquiries_table', 9),
(31, '2022_06_25_090001_create_assign_drivers_table', 10),
(32, '2022_06_25_090223_create_daily_reportings_table', 11),
(33, '2022_06_25_090405_create_salaries_table', 12),
(34, '2022_06_25_090633_create_leave_details_table', 13),
(35, '2022_06_25_091044_create_fuel_details_table', 14),
(36, '2022_06_25_091442_create_out_o_f_statoindetails_table', 15),
(37, '2016_06_01_000001_create_oauth_auth_codes_table', 16),
(38, '2016_06_01_000002_create_oauth_access_tokens_table', 16),
(39, '2016_06_01_000003_create_oauth_refresh_tokens_table', 16),
(40, '2016_06_01_000004_create_oauth_clients_table', 16),
(41, '2016_06_01_000005_create_oauth_personal_access_clients_table', 16),
(42, '2022_07_04_124121_add_column_to_users_table', 16),
(43, '2022_07_29_060748_create_help__lines_table', 17),
(44, '2022_07_29_073351_create_user__ratings_table', 18),
(45, '2022_07_29_075921_create_user_retings_table', 19),
(46, '2022_07_30_054706_create_bookings_table', 20),
(47, '2022_04_10_064532_create_permission_tables', 21),
(48, '2022_04_11_053555_create_departments_table', 21),
(49, '2022_04_11_060352_create_classes_table', 21),
(50, '2022_04_11_063800_create_materials_table', 21),
(51, '2022_04_11_072749_create_news_table', 21),
(52, '2022_04_11_075927_create_settings_table', 21),
(53, '2022_04_14_103857_create_galleries_table', 21),
(54, '2022_04_16_160233_create_management_members_table', 21),
(55, '2022_04_16_171027_create_faculty_members_table', 21),
(56, '2022_04_17_091242_create_admission_table', 21),
(57, '2022_04_17_095012_create_admission_detail_table', 21),
(58, '2022_04_28_072634_create_document_masters_table', 21),
(59, '2022_05_01_061428_create_placements_table', 21),
(60, '2022_05_03_052412_create_sliders_table', 21),
(61, '2022_05_04_071540_create_routes_table', 21),
(62, '2022_05_04_113646_create_inquries_table', 21),
(63, '2022_05_05_091749_create_testimonials_table', 21),
(64, '2022_05_06_073604_create_course_subjects_table', 21),
(65, '2022_05_07_092240_create_route_details_table', 21),
(66, '2022_05_17_042754_create_contactus_table', 21),
(67, '2022_05_19_062735_create_event_activities_table', 21),
(68, '2022_05_19_094236_create_important_links_table', 21),
(69, '2022_06_02_081838_create_important_link_subject_table', 21),
(70, '2022_06_04_055251_create_setting_popup_table', 21),
(71, '2022_06_07_065705_create_regular_activity_table', 21),
(72, '2022_06_07_070010_create_pgi_job_fair_table', 21),
(73, '2022_06_21_055640_create_placement_companys_table', 21),
(74, '2022_06_21_055830_create_placement_graphs_table', 21),
(75, '2022_06_21_061051_create_placement_year_wise_graphs_table', 21),
(76, '2022_06_22_094936_create_industry_visits_table', 21),
(77, '2022_08_06_125817_create_careers_table', 21),
(78, '2022_08_20_105230_add_column_device_token', 22),
(79, '2022_08_20_110727_create_notifications_table', 22),
(80, '2022_08_23_083152_add_county_code_to_users_table', 23),
(81, '2022_09_01_075202_add_time_to_fuel_details_table', 24),
(82, '2022_09_27_073033_create_car_wash_details_table', 25),
(83, '2022_09_29_055107_create_notifications_table', 26),
(84, '2022_10_11_062320_create_faqs_table', 27);

-- --------------------------------------------------------

--
-- Table structure for table `model_has_permissions`
--

CREATE TABLE `model_has_permissions` (
  `permission_id` bigint(20) UNSIGNED NOT NULL,
  `model_type` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `model_id` bigint(20) UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `model_has_roles`
--

CREATE TABLE `model_has_roles` (
  `role_id` bigint(20) UNSIGNED NOT NULL,
  `model_type` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `model_id` bigint(20) UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `notifications`
--

CREATE TABLE `notifications` (
  `id` int(10) UNSIGNED NOT NULL,
  `user_id` int(10) UNSIGNED NOT NULL,
  `type` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `type_id` int(10) UNSIGNED DEFAULT NULL,
  `title` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `body` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `read_at` timestamp NULL DEFAULT NULL ON UPDATE current_timestamp(),
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `notifications`
--

INSERT INTO `notifications` (`id`, `user_id`, `type`, `type_id`, `title`, `body`, `read_at`, `created_at`, `updated_at`) VALUES
(5, 219, 'Booking', 107, 'New Advance-Trip Booked', 'A new advance_booking&nbspIn City&nbsptemporary&nbsptrip book by <a href=\"http://192.168.1.12/fundoo-app/public/admin/customer-dashboard?id=219\">Ravi\'</a>\' for date 01-10-2022', '2022-10-18 06:45:00', '2022-10-18 02:15:41', '2022-10-01 02:47:08'),
(6, 219, 'Booking', 108, 'New Advance-Trip Booked', 'A new advance_booking&nbspIn City&nbsptemporary&nbsptrip book by <a href=\"http://192.168.1.12/fundoo-app/public/admin/customer-dashboard?id=219\">Ravi\'</a>\' for date 01-10-2022', '2022-10-18 06:45:04', '2022-10-17 02:17:34', '2022-10-01 02:47:08'),
(11, 219, 'Booking', 115, 'New Live-Trip Booked', 'A new live_booking&nbspIn City&nbsptemporary&nbsptrip book by <a href=\"http://192.168.1.12/fundoo-app/public/admin/customer-dashboard?id=219\">Ravi\'</a>\' for date 01-10-2022', '2022-10-11 07:32:19', '2022-10-08 04:16:24', '2022-10-01 04:16:59'),
(12, 219, 'Booking', 116, 'New Advance-Trip Booked', 'A new advance_booking&nbspIn City&nbsptemporary&nbsptrip book by <a href=\"http://192.168.1.12/fundoo-app/public/admin/customer-dashboard?id=219\">Ravi\'</a>\' for date 01-10-2022', '2022-10-11 07:32:04', '2022-10-06 04:18:42', '2022-10-01 04:29:50'),
(13, 219, 'Booking', 116, 'New Advance-Trip Booked', 'A new advance_booking&nbspIn City&nbsptemporary&nbsptrip book by <a href=\"http://192.168.1.12/fundoo-app/public/admin/customer-dashboard?id=219\">Ravi\'</a>\' for date 01-10-2022', '2022-10-11 09:37:13', '2022-10-08 04:30:00', '2022-10-01 04:30:09'),
(14, 194, 'Driver', NULL, 'Profile Update', 'Driver <a href=\"http://192.168.1.12/fundoo-app/public/admin/driver-dashboard?id=194\">Hardik LLLL\'</a>\' Updated his profile.', '2022-10-01 04:36:06', '2022-10-01 04:36:02', '2022-10-01 04:36:06'),
(15, 1, 'Driver', NULL, 'Driver Registered', 'New driver  <a href=\"http://192.168.1.12/fundoo-app/public/admin/driver-dashboard?id=1\">Admin\'</a>\'is registered for permanent', '2022-10-03 04:14:26', '2022-10-01 04:58:36', '2022-10-03 04:14:26'),
(16, 1, 'Driver', NULL, 'Driver Registered', 'New driver  <a href=\"http://192.168.1.12/fundoo-app/public/admin/driver-dashboard?id=1\">Admin\'</a>\'is registered for valet_parking', '2022-10-03 04:14:26', '2022-10-01 05:03:12', '2022-10-03 04:14:26'),
(17, 1, 'Driver', NULL, 'Driver Registered', 'New driver  <a href=\"http://192.168.1.12/fundoo-app/public/admin/driver-dashboard?id=1\">Admin\'</a>\'is registered for permanent', '2022-10-03 04:14:26', '2022-10-01 05:07:29', '2022-10-03 04:14:26'),
(18, 194, 'Driver', NULL, 'Profile Update', 'Driver <a href=\"http://192.168.1.12/fundoo-app/public/admin/driver-dashboard?id=194\">Hardik LLLL\'</a>\' Updated his profile.', '2022-10-03 04:14:26', '2022-10-02 23:04:57', '2022-10-03 04:14:26'),
(19, 285, 'Driver', NULL, 'Profile Update', 'Driver <a href=\"http://192.168.1.12/fundoo-app/public/admin/driver-dashboard?id=285\">Prashant\'</a>\' Updated his profile.', '2022-10-03 04:14:26', '2022-10-02 23:05:22', '2022-10-03 04:14:26'),
(20, 284, 'Driver', NULL, 'Profile Update', 'Driver <a href=\"http://192.168.1.12/fundoo-app/public/admin/driver-dashboard?id=284\">Kiran\'</a>\' Updated his profile.', '2022-10-03 04:14:26', '2022-10-02 23:05:43', '2022-10-03 04:14:26'),
(21, 284, 'Driver', NULL, 'Profile Update', 'Driver <a href=\"http://192.168.1.12/fundoo-app/public/admin/driver-dashboard?id=284\">Kiran\'</a>\' Updated his profile.', '2022-10-03 06:18:53', '2022-10-03 05:46:22', '2022-10-03 06:18:53'),
(22, 227, 'Customer', NULL, 'Profile Update', 'Customer <a href=\"http://192.168.1.12/fundoo-app/public/admin/customer-dashboard?id=227\">Dipak\'</a>\'Updated his profile', '2022-10-06 02:45:48', '2022-10-04 01:49:21', '2022-10-06 02:45:48'),
(23, 227, 'Customer', NULL, 'Profile Update', 'Customer <a href=\"http://192.168.1.12/fundoo-app/public/admin/customer-dashboard?id=227\">Dipak\'</a>\'Updated his profile', '2022-10-06 02:45:48', '2022-10-04 01:54:47', '2022-10-06 02:45:48'),
(24, 286, 'Driver', NULL, 'Profile Update', 'Driver <a href=\"http://192.168.1.12/fundoo-app/public/admin/driver-dashboard?id=286\">Vinod\'</a>\' Updated his profile.', '2022-10-06 02:45:48', '2022-10-04 06:08:16', '2022-10-06 02:45:48'),
(25, 286, 'Driver', NULL, 'Profile Update', 'Driver <a href=\"http://192.168.1.12/fundoo-app/public/admin/driver-dashboard?id=286\">Vinod\'</a>\' Updated his profile.', '2022-10-06 02:45:48', '2022-10-04 06:13:24', '2022-10-06 02:45:48'),
(26, 286, 'Driver', NULL, 'Profile Update', 'Driver <a href=\"http://192.168.1.12/fundoo-app/public/admin/driver-dashboard?id=286\">Vinod\'</a>\' Updated his profile.', '2022-10-06 02:45:48', '2022-10-04 06:14:45', '2022-10-06 02:45:48'),
(27, 286, 'Driver', NULL, 'Profile Update', 'Driver <a href=\"http://192.168.1.12/fundoo-app/public/admin/driver-dashboard?id=286\">Vinod\'</a>\' Updated his profile.', '2022-10-06 02:45:48', '2022-10-04 06:15:21', '2022-10-06 02:45:48'),
(28, 286, 'Driver', NULL, 'Profile Update', 'Driver <a href=\"http://192.168.1.12/fundoo-app/public/admin/driver-dashboard?id=286\">Vinod\'</a>\' Updated his profile.', '2022-10-06 02:45:48', '2022-10-04 06:17:27', '2022-10-06 02:45:48'),
(29, 286, 'Driver', NULL, 'Profile Update', 'Driver <a href=\"http://192.168.1.12/fundoo-app/public/admin/driver-dashboard?id=286\">Vinod\'</a>\' Updated his profile.', '2022-10-06 02:45:48', '2022-10-04 06:18:59', '2022-10-06 02:45:48'),
(30, 286, 'Driver', NULL, 'Profile Update', 'Driver <a href=\"http://192.168.1.12/fundoo-app/public/admin/driver-dashboard?id=286\">Vinod\'</a>\' Updated his profile.', '2022-10-06 02:45:48', '2022-10-04 06:19:10', '2022-10-06 02:45:48'),
(31, 286, 'Driver', NULL, 'Profile Update', 'Driver <a href=\"http://192.168.1.12/fundoo-app/public/admin/driver-dashboard?id=286\">Vinod\'</a>\' Updated his profile.', '2022-10-06 02:45:48', '2022-10-04 06:19:22', '2022-10-06 02:45:48'),
(32, 286, 'Driver', NULL, 'Profile Update', 'Driver <a href=\"http://192.168.1.12/fundoo-app/public/admin/driver-dashboard?id=286\">Vinod\'</a>\' Updated his profile.', '2022-10-06 02:45:48', '2022-10-04 06:19:41', '2022-10-06 02:45:48'),
(33, 281, 'Customer', NULL, 'Profile Update', 'Customer <a href=\"http://192.168.1.12/fundoo-app/public/admin/customer-dashboard?id=281\">Kaushik\'</a>\'Updated his profile', '2022-10-06 02:45:48', '2022-10-06 02:45:38', '2022-10-06 02:45:48'),
(34, 286, 'Driver', NULL, 'Profile Update', 'Driver <a href=\"http://192.168.1.12/fundoo-app/public/admin/driver-dashboard?id=286\">Vinod\'</a>\' Updated his profile.', '2022-10-07 04:05:23', '2022-10-06 04:24:55', '2022-10-07 04:05:23'),
(35, 286, 'Driver', NULL, 'Profile Update', 'Driver <a href=\"http://192.168.1.12/fundoo-app/public/admin/driver-dashboard?id=286\">Vinod\'</a>\' Updated his profile.', '2022-10-07 04:05:23', '2022-10-06 04:58:57', '2022-10-07 04:05:23'),
(36, 285, 'Driver', NULL, 'Profile Update', 'Driver <a href=\"http://192.168.1.12/fundoo-app/public/admin/driver-dashboard?id=285\">Prashant\'</a>\' Updated his profile.', '2022-10-07 04:05:23', '2022-10-06 05:20:45', '2022-10-07 04:05:23'),
(37, 286, 'Driver', NULL, 'Profile Update', 'Driver <a href=\"http://192.168.1.12/fundoo-app/public/admin/driver-dashboard?id=286\">Vinod\'</a>\' Updated his profile.', '2022-10-07 04:05:23', '2022-10-06 06:17:59', '2022-10-07 04:05:23'),
(38, 286, 'Driver', NULL, 'Profile Update', 'Driver <a href=\"http://192.168.1.12/fundoo-app/public/admin/driver-dashboard?id=286\">Vinod\'</a>\' Updated his profile.', '2022-10-07 04:05:23', '2022-10-06 06:35:31', '2022-10-07 04:05:23'),
(39, 286, 'Driver', NULL, 'Profile Update', 'Driver <a href=\"http://192.168.1.12/fundoo-app/public/admin/driver-dashboard?id=286\">Vinod\'</a>\' Updated his profile.', '2022-10-07 04:05:23', '2022-10-06 06:35:54', '2022-10-07 04:05:23'),
(40, 286, 'Driver', NULL, 'Profile Update', 'Driver <a href=\"http://192.168.1.12/fundoo-app/public/admin/driver-dashboard?id=286\">Vinod\'</a>\' Updated his profile.', '2022-10-07 04:05:23', '2022-10-06 06:36:25', '2022-10-07 04:05:23'),
(41, 130, 'Driver', NULL, 'Profile Update', 'Driver <a href=\"http://192.168.1.12/fundoo-app/public/admin/driver-dashboard?id=130\">Dushyant\'</a>\' Updated his profile.', '2022-10-07 05:45:53', '2022-10-07 05:37:07', '2022-10-07 05:45:53'),
(42, 130, 'Driver', NULL, 'Profile Update', 'Driver <a href=\"http://192.168.1.12/fundoo-app/public/admin/driver-dashboard?id=130\">Dushyant\'</a>\' Updated his profile.', '2022-10-07 06:59:38', '2022-10-07 06:15:28', '2022-10-07 06:59:38'),
(43, 286, 'Driver', NULL, 'Profile Update', 'Driver <a href=\"http://192.168.1.12/fundoo-app/public/admin/driver-dashboard?id=286\">Vinod\'</a>\' Updated his profile.', '2022-10-07 06:59:38', '2022-10-07 06:16:20', '2022-10-07 06:59:38'),
(44, 286, 'Driver', NULL, 'Profile Update', 'Driver <a href=\"http://192.168.1.12/fundoo-app/public/admin/driver-dashboard?id=286\">Vinod\'</a>\' Updated his profile.', '2022-10-07 06:59:38', '2022-10-07 06:16:58', '2022-10-07 06:59:38'),
(45, 286, 'Driver', NULL, 'Profile Update', 'Driver <a href=\"http://192.168.1.12/fundoo-app/public/admin/driver-dashboard?id=286\">Vinod\'</a>\' Updated his profile.', '2022-10-07 06:59:38', '2022-10-07 06:20:05', '2022-10-07 06:59:38'),
(46, 99, 'Driver', NULL, 'Profile Update', 'Driver <a href=\"http://192.168.1.12/fundoo-app/public/admin/driver-dashboard?id=99\">Rajesh\'</a>\' Updated his profile.', '2022-10-07 06:59:38', '2022-10-07 06:23:17', '2022-10-07 06:59:38'),
(47, 130, 'Driver', NULL, 'Profile Update', 'Driver <a href=\"http://192.168.1.12/fundoo-app/public/admin/driver-dashboard?id=130\">Dushyant\'</a>\' Updated his profile.', '2022-10-07 06:59:38', '2022-10-07 06:56:34', '2022-10-07 06:59:38'),
(48, 5, 'Driver', NULL, 'Profile Update', 'Driver <a href=\"http://192.168.1.12/fundoo-app/public/admin/driver-dashboard?id=5\">Dushyant11\'</a>\' Updated his profile.', '2022-10-11 03:41:22', '2022-10-11 01:36:41', '2022-10-11 03:41:22'),
(50, 99, 'Driver', NULL, 'Profile Update', 'Driver <a href=\"http://192.168.1.12/fundoo-app/public/admin/driver-dashboard?id=99\">Rajesh\'</a>\' Updated his profile.', '2022-10-11 03:41:22', '2022-10-11 01:41:54', '2022-10-11 03:41:22'),
(51, 101, 'Driver', NULL, 'Profile Update', 'Driver <a href=\"http://192.168.1.12/fundoo-app/public/admin/driver-dashboard?id=101\">Dushyant\'</a>\' Updated his profile.', '2022-10-11 03:41:22', '2022-10-11 01:42:41', '2022-10-11 03:41:22'),
(52, 104, 'Driver', NULL, 'Profile Update', 'Driver <a href=\"http://192.168.1.12/fundoo-app/public/admin/driver-dashboard?id=104\">Jasu\'</a>\' Updated his profile.', '2022-10-11 03:41:22', '2022-10-11 01:43:47', '2022-10-11 03:41:22'),
(53, 107, 'Driver', NULL, 'Profile Update', 'Driver <a href=\"http://192.168.1.12/fundoo-app/public/admin/driver-dashboard?id=107\">faisu\'</a>\' Updated his profile.', '2022-10-11 03:41:22', '2022-10-11 01:44:59', '2022-10-11 03:41:22'),
(54, 131, 'Driver', NULL, 'Profile Update', 'Driver <a href=\"http://192.168.1.12/fundoo-app/public/admin/driver-dashboard?id=131\">Jaswant\'</a>\' Updated his profile.', '2022-10-11 03:41:22', '2022-10-11 01:46:08', '2022-10-11 03:41:22'),
(55, 132, 'Driver', NULL, 'Profile Update', 'Driver <a href=\"http://192.168.1.12/fundoo-app/public/admin/driver-dashboard?id=132\">Paresh\'</a>\' Updated his profile.', '2022-10-11 03:41:22', '2022-10-11 01:46:39', '2022-10-11 03:41:22'),
(56, 134, 'Driver', NULL, 'Profile Update', 'Driver <a href=\"http://192.168.1.12/fundoo-app/public/admin/driver-dashboard?id=134\">Sunil\'</a>\' Updated his profile.', '2022-10-11 03:41:22', '2022-10-11 01:47:16', '2022-10-11 03:41:22'),
(57, 139, 'Driver', NULL, 'Profile Update', 'Driver <a href=\"http://192.168.1.12/fundoo-app/public/admin/driver-dashboard?id=139\">Vinod\'</a>\' Updated his profile.', '2022-10-11 03:41:22', '2022-10-11 01:47:45', '2022-10-11 03:41:22'),
(58, 141, 'Driver', NULL, 'Profile Update', 'Driver <a href=\"http://192.168.1.12/fundoo-app/public/admin/driver-dashboard?id=141\">Vimal\'</a>\' Updated his profile.', '2022-10-11 03:41:22', '2022-10-11 01:48:15', '2022-10-11 03:41:22'),
(59, 142, 'Driver', NULL, 'Profile Update', 'Driver <a href=\"http://192.168.1.12/fundoo-app/public/admin/driver-dashboard?id=142\">Ramesh\'</a>\' Updated his profile.', '2022-10-11 03:41:22', '2022-10-11 01:48:57', '2022-10-11 03:41:22'),
(60, 142, 'Driver', NULL, 'Profile Update', 'Driver <a href=\"http://192.168.1.12/fundoo-app/public/admin/driver-dashboard?id=142\">Ramesh\'</a>\' Updated his profile.', '2022-10-11 03:41:22', '2022-10-11 01:49:05', '2022-10-11 03:41:22'),
(61, 148, 'Driver', NULL, 'Profile Update', 'Driver <a href=\"http://192.168.1.12/fundoo-app/public/admin/driver-dashboard?id=148\">Kishan\'</a>\' Updated his profile.', '2022-10-11 03:41:22', '2022-10-11 01:49:38', '2022-10-11 03:41:22'),
(62, 181, 'Driver', NULL, 'Profile Update', 'Driver <a href=\"http://192.168.1.12/fundoo-app/public/admin/driver-dashboard?id=181\">ghg\'</a>\' Updated his profile.', '2022-10-11 03:41:22', '2022-10-11 01:51:38', '2022-10-11 03:41:22'),
(63, 194, 'Driver', NULL, 'Profile Update', 'Driver <a href=\"http://192.168.1.12/fundoo-app/public/admin/driver-dashboard?id=194\">Hardik LL\'</a>\' Updated his profile.', '2022-10-11 03:41:22', '2022-10-11 01:54:21', '2022-10-11 03:41:22'),
(64, 194, 'Driver', NULL, 'Profile Update', 'Driver <a href=\"http://192.168.1.12/fundoo-app/public/admin/driver-dashboard?id=194\">Hardik LL\'</a>\' Updated his profile.', '2022-10-11 03:41:22', '2022-10-11 01:54:38', '2022-10-11 03:41:22'),
(65, 206, 'Driver', NULL, 'Profile Update', 'Driver <a href=\"http://192.168.1.12/fundoo-app/public/admin/driver-dashboard?id=206\">Hardik\'</a>\' Updated his profile.', '2022-10-11 03:41:22', '2022-10-11 01:56:46', '2022-10-11 03:41:22'),
(66, 207, 'Driver', NULL, 'Profile Update', 'Driver <a href=\"http://192.168.1.12/fundoo-app/public/admin/driver-dashboard?id=207\">Hitesh\'</a>\' Updated his profile.', '2022-10-11 03:41:22', '2022-10-11 01:58:11', '2022-10-11 03:41:22'),
(67, 209, 'Driver', NULL, 'Profile Update', 'Driver <a href=\"http://192.168.1.12/fundoo-app/public/admin/driver-dashboard?id=209\">Vinamra\'</a>\' Updated his profile.', '2022-10-11 03:41:22', '2022-10-11 01:58:45', '2022-10-11 03:41:22'),
(68, 216, 'Driver', NULL, 'Profile Update', 'Driver <a href=\"http://192.168.1.12/fundoo-app/public/admin/driver-dashboard?id=216\">Hardik LL\'</a>\' Updated his profile.', '2022-10-11 03:41:22', '2022-10-11 02:00:23', '2022-10-11 03:41:22'),
(69, 217, 'Driver', NULL, 'Profile Update', 'Driver <a href=\"http://192.168.1.12/fundoo-app/public/admin/driver-dashboard?id=217\">Hardik\'</a>\' Updated his profile.', '2022-10-11 03:41:22', '2022-10-11 02:06:12', '2022-10-11 03:41:22'),
(70, 225, 'Driver', NULL, 'Profile Update', 'Driver <a href=\"http://192.168.1.12/fundoo-app/public/admin/driver-dashboard?id=225\">Savan\'</a>\' Updated his profile.', '2022-10-11 03:41:22', '2022-10-11 02:13:07', '2022-10-11 03:41:22'),
(71, 284, 'Driver', NULL, 'Profile Update', 'Driver <a href=\"http://192.168.1.12/fundoo-app/public/admin/driver-dashboard?id=284\">Kiran\'</a>\' Updated his profile.', '2022-10-11 03:41:22', '2022-10-11 02:14:36', '2022-10-11 03:41:22'),
(72, 285, 'Driver', NULL, 'Profile Update', 'Driver <a href=\"http://192.168.1.12/fundoo-app/public/admin/driver-dashboard?id=285\">Prashant\'</a>\' Updated his profile.', '2022-10-11 03:41:22', '2022-10-11 02:15:08', '2022-10-11 03:41:22'),
(73, 285, 'Driver', NULL, 'Profile Update', 'Driver <a href=\"http://192.168.1.12/fundoo-app/public/admin/driver-dashboard?id=285\">Prashant\'</a>\' Updated his profile.', '2022-10-11 03:41:22', '2022-10-11 02:27:17', '2022-10-11 03:41:22'),
(74, 206, 'Driver', NULL, 'Profile Update', 'Driver <a href=\"http://192.168.1.12/fundoo-app/public/admin/driver-dashboard?id=206\">Hardik\'</a>\' Updated his profile.', '2022-10-12 02:06:55', '2022-10-12 00:43:00', '2022-10-12 02:06:55'),
(75, 206, 'Driver', NULL, 'Profile Update', 'Driver <a href=\"http://192.168.1.12/fundoo-app/public/admin/driver-dashboard?id=206\">Hardik\'</a>\' Updated his profile.', '2022-10-12 02:06:55', '2022-10-12 00:43:13', '2022-10-12 02:06:55'),
(76, 216, 'Driver', NULL, 'Profile Update', 'Driver <a href=\"http://192.168.1.12/fundoo-app/public/admin/driver-dashboard?id=216\">Hardik LL\'</a>\' Updated his profile.', '2022-10-12 02:06:55', '2022-10-12 00:44:39', '2022-10-12 02:06:55'),
(77, 285, 'Driver', NULL, 'Profile Update', 'Driver <a href=\"http://192.168.1.12/fundoo-app/public/admin/driver-dashboard?id=285\">Prashant\'</a>\' Updated his profile.', '2022-10-12 02:06:55', '2022-10-12 00:46:41', '2022-10-12 02:06:55'),
(78, 285, 'Driver', NULL, 'Profile Update', 'Driver <a href=\"http://192.168.1.12/fundoo-app/public/admin/driver-dashboard?id=285\">Prashant\'</a>\' Updated his profile.', '2022-10-12 02:06:55', '2022-10-12 00:47:01', '2022-10-12 02:06:55'),
(79, 146, 'Customer', NULL, 'Profile Update', 'Customer <a href=\"http://192.168.1.12/fundoo-app/public/admin/customer-dashboard?id=146\">jas\'</a>\'Updated his profile', '2022-10-13 07:20:56', '2022-10-13 02:51:54', '2022-10-13 07:20:56'),
(80, 146, 'Customer', NULL, 'Profile Update', 'Customer <a href=\"http://192.168.1.12/fundoo-app/public/admin/customer-dashboard?id=146\">jas\'</a>\'Updated his profile', '2022-10-13 07:20:56', '2022-10-13 02:51:54', '2022-10-13 07:20:56'),
(81, 280, 'Customer', NULL, 'Profile Update', 'Customer <a href=\"http://192.168.1.12/fundoo-app/public/admin/customer-dashboard?id=280\">Paresh\'</a>\'Updated his profile', '2022-10-20 04:03:57', '2022-10-19 01:09:46', '2022-10-20 04:03:57'),
(82, 281, 'Customer', NULL, 'Profile Update', 'Customer <a href=\"http://192.168.1.12/fundoo-app/public/admin/customer-dashboard?id=281\">Kaushik\'</a>\'Updated his profile', '2022-10-20 04:03:57', '2022-10-19 01:09:57', '2022-10-20 04:03:57'),
(83, 219, 'Customer', NULL, 'Customer Registered', 'New Customer  <a href=\"http://192.168.1.12/fundoo-app/public/admin/customer-dashboard?id=219\">Ravi\'</a>\' registered. ', '2022-10-20 04:03:57', '2022-10-19 05:39:33', '2022-10-20 04:03:57'),
(84, 219, 'Customer', NULL, 'Profile Update', 'Customer <a href=\"http://192.168.1.12/fundoo-app/public/admin/customer-dashboard?id=219\">Ravi\'</a>\'Updated his profile', '2022-10-20 04:03:57', '2022-10-19 05:50:11', '2022-10-20 04:03:57'),
(85, 219, 'Customer', NULL, 'Profile Update', 'Customer <a href=\"http://192.168.1.12/fundoo-app/public/admin/customer-dashboard?id=219\">Ravi\'</a>\'Updated his profile', '2022-10-20 04:03:57', '2022-10-19 05:59:43', '2022-10-20 04:03:57'),
(86, 219, 'Customer', NULL, 'Profile Update', 'Customer <a href=\"http://192.168.1.12/fundoo-app/public/admin/customer-dashboard?id=219\">\'</a>\'Updated his profile', '2022-10-20 04:03:57', '2022-10-19 06:00:23', '2022-10-20 04:03:57'),
(87, 219, 'Customer', NULL, 'Profile Update', 'Customer <a href=\"http://192.168.1.12/fundoo-app/public/admin/customer-dashboard?id=219\">\'</a>\'Updated his profile', '2022-10-20 04:03:57', '2022-10-19 06:35:18', '2022-10-20 04:03:57'),
(88, 219, 'Customer', NULL, 'Profile Update', 'Customer <a href=\"http://192.168.1.12/fundoo-app/public/admin/customer-dashboard?id=219\">Ravi\'</a>\'Updated his profile', '2022-10-20 04:03:57', '2022-10-19 06:35:47', '2022-10-20 04:03:57'),
(89, 286, 'Driver', NULL, 'Profile Update', 'Driver <a href=\"http://192.168.1.12/fundoo-app/public/admin/driver-dashboard?id=286\">Vinod\'</a>\' Updated his profile.', '2022-10-20 04:03:57', '2022-10-19 23:19:01', '2022-10-20 04:03:57'),
(90, 219, 'Customer', NULL, 'Profile Update', 'Customer <a href=\"http://192.168.1.12/fundoo-app/public/admin/customer-dashboard?id=219\">Ravi\'</a>\'Updated his profile', '2022-10-21 23:16:42', '2022-10-20 06:16:20', '2022-10-21 23:16:42'),
(91, 1, 'Driver', NULL, 'Driver Registered', 'New driver  <a href=\"http://192.168.1.12/fundoo-app/public/admin/driver-dashboard?id=1\">Admin\'</a>\'is registered for permanent', '2022-10-21 23:16:42', '2022-10-21 01:06:01', '2022-10-21 23:16:42'),
(92, 293, 'Driver', NULL, 'Profile Update', 'Driver <a href=\"http://192.168.1.12/fundoo-app/public/admin/driver-dashboard?id=293\">Yatin\'</a>\' Updated his profile.', '2022-10-21 23:16:42', '2022-10-21 02:22:59', '2022-10-21 23:16:42'),
(93, 292, 'Driver', NULL, 'Profile Update', 'Driver <a href=\"http://192.168.1.12/fundoo-app/public/admin/driver-dashboard?id=292\">Aakash\'</a>\' Updated his profile.', '2022-10-21 23:16:42', '2022-10-21 02:23:27', '2022-10-21 23:16:42'),
(94, 287, 'Driver', NULL, 'Profile Update', 'Driver <a href=\"http://192.168.1.12/fundoo-app/public/admin/driver-dashboard?id=287\">Divyam\'</a>\' Updated his profile.', '2022-10-21 23:16:42', '2022-10-21 02:28:30', '2022-10-21 23:16:42'),
(95, 290, 'Driver', NULL, 'Profile Update', 'Driver <a href=\"http://192.168.1.12/fundoo-app/public/admin/driver-dashboard?id=290\">Bharat\'</a>\' Updated his profile.', '2022-10-21 23:16:42', '2022-10-21 02:34:44', '2022-10-21 23:16:42'),
(96, 1, 'Driver', NULL, 'Driver Registered', 'New driver  <a href=\"http://192.168.1.12/fundoo-app/public/admin/driver-dashboard?id=1\">Admin\'</a>\'is registered for temporary', '2022-10-21 23:16:42', '2022-10-21 02:41:30', '2022-10-21 23:16:42'),
(97, 295, 'Driver', NULL, 'Profile Update', 'Driver <a href=\"http://192.168.1.12/fundoo-app/public/admin/driver-dashboard?id=295\">Vinod\'</a>\' Updated his profile.', '2022-10-21 23:16:42', '2022-10-21 02:41:58', '2022-10-21 23:16:42'),
(98, 1, 'Driver', NULL, 'Driver Registered', 'New driver  <a href=\"http://192.168.1.12/fundoo-app/public/admin/driver-dashboard?id=1\">Admin\'</a>\'is registered for permanent', '2022-10-21 23:16:42', '2022-10-21 05:23:43', '2022-10-21 23:16:42'),
(99, 302, 'Driver', NULL, 'Profile Update', 'Driver <a href=\"http://192.168.1.12/fundoo-app/public/admin/driver-dashboard?id=302\">Dhruv\'</a>\' Updated his profile.', '2022-10-21 23:16:42', '2022-10-21 05:28:20', '2022-10-21 23:16:42'),
(100, 302, 'Driver', NULL, 'Profile Update', 'Driver <a href=\"http://192.168.1.12/fundoo-app/public/admin/driver-dashboard?id=302\">Dhruv\'</a>\' Updated his profile.', '2022-10-21 23:16:42', '2022-10-21 05:38:48', '2022-10-21 23:16:42'),
(101, 302, 'Driver', NULL, 'Profile Update', 'Driver <a href=\"http://192.168.1.12/fundoo-app/public/admin/driver-dashboard?id=302\">Dhruv\'</a>\' Updated his profile.', '2022-10-21 23:16:42', '2022-10-21 05:39:41', '2022-10-21 23:16:42'),
(102, 302, 'Driver', NULL, 'Profile Update', 'Driver <a href=\"http://192.168.1.12/fundoo-app/public/admin/driver-dashboard?id=302\">Dhruv\'</a>\' Updated his profile.', '2022-10-21 23:16:42', '2022-10-21 05:40:39', '2022-10-21 23:16:42'),
(103, 1, 'Driver', NULL, 'Driver Registered', 'New driver  <a href=\"http://192.168.1.12/fundoo-app/public/admin/driver-dashboard?id=1\">Admin\'</a>\'is registered for Please Select Work Category', '2022-10-21 23:16:42', '2022-10-21 05:47:01', '2022-10-21 23:16:42'),
(104, 303, 'Driver', NULL, 'Profile Update', 'Driver <a href=\"http://192.168.1.12/fundoo-app/public/admin/driver-dashboard?id=303\">rter\'</a>\' Updated his profile.', '2022-10-21 23:16:42', '2022-10-21 05:47:12', '2022-10-21 23:16:42'),
(105, 303, 'Driver', NULL, 'Profile Update', 'Driver <a href=\"http://192.168.1.12/fundoo-app/public/admin/driver-dashboard?id=303\">rter\'</a>\' Updated his profile.', '2022-10-21 23:16:42', '2022-10-21 05:47:31', '2022-10-21 23:16:42'),
(106, 1, 'Driver', NULL, 'Driver Registered', 'New driver  <a href=\"http://192.168.1.12/fundoo-app/public/admin/driver-dashboard?id=1\">Admin\'</a>\'is registered for temporary', '2022-10-21 23:16:42', '2022-10-21 06:29:27', '2022-10-21 23:16:42'),
(107, 304, 'Driver', NULL, 'Profile Update', 'Driver <a href=\"http://192.168.1.12/fundoo-app/public/admin/driver-dashboard?id=304\">Vikram\'</a>\' Updated his profile.', '2022-10-21 23:16:42', '2022-10-21 06:49:09', '2022-10-21 23:16:42'),
(108, 308, 'Driver', NULL, 'Profile Update', 'Driver <a href=\"http://192.168.1.12/fundoo-app/public/admin/driver-dashboard?id=308\">Hiren\'</a>\' Updated his profile.', '2022-11-03 03:57:36', '2022-10-21 23:34:46', '2022-11-03 03:57:36'),
(109, 308, 'Driver', NULL, 'Profile Update', 'Driver <a href=\"http://192.168.1.12/fundoo-app/public/admin/driver-dashboard?id=308\">Hiren\'</a>\' Updated his profile.', '2022-11-03 03:57:36', '2022-10-21 23:36:55', '2022-11-03 03:57:36'),
(110, 308, 'Driver', NULL, 'Profile Update', 'Driver <a href=\"http://192.168.1.12/fundoo-app/public/admin/driver-dashboard?id=308\">Hiren\'</a>\' Updated his profile.', '2022-11-03 03:57:36', '2022-10-30 23:24:35', '2022-11-03 03:57:36'),
(111, 128, 'Driver', NULL, 'Driver Registered', 'New driver  <a href=\"http://192.168.1.12/fundoo-app/public/admin/driver-dashboard?id=128\">Hardik LLLL\'</a>\'is registered for parmanent', '2022-11-03 03:57:36', '2022-11-03 01:35:17', '2022-11-03 03:57:36'),
(112, 128, 'Driver', NULL, 'Driver Registered', 'New driver  <a href=\"http://192.168.1.12/fundoo-app/public/admin/driver-dashboard?id=128\">Hardik LLLL\'</a>\'is registered for parmanent', '2022-11-03 03:57:36', '2022-11-03 02:05:30', '2022-11-03 03:57:36'),
(113, 128, 'Driver', NULL, 'Profile Update', 'Driver <a href=\"http://192.168.1.12/fundoo-app/public/admin/driver-dashboard?id=128\">Dipk LLLL\'</a>\' Updated his profile.', '2022-11-03 03:57:36', '2022-11-03 02:18:42', '2022-11-03 03:57:36'),
(114, 128, 'Driver', NULL, 'Profile Update', 'Driver <a href=\"http://192.168.1.12/fundoo-app/public/admin/driver-dashboard?id=128\">Dipk LLLL\'</a>\' Updated his profile.', '2022-11-03 03:57:36', '2022-11-03 02:35:30', '2022-11-03 03:57:36'),
(115, 1, 'Driver', NULL, 'Driver Registered', 'New driver  <a href=\"http://192.168.1.12/fundoo-app/public/admin/driver-dashboard?id=1\">Admin\'</a>\'is registered for permanent', '2022-11-21 04:12:29', '2022-11-03 04:22:23', '2022-11-21 04:12:29'),
(116, 1, 'Driver', NULL, 'Driver Registered', 'New driver  <a href=\"http://192.168.1.12/fundoo-app/public/admin/driver-dashboard?id=1\">Admin\'</a>\'is registered for Please Select Work Category', '2022-11-21 04:12:29', '2022-11-03 04:31:18', '2022-11-21 04:12:29'),
(117, 310, 'Driver', NULL, 'Profile Update', 'Driver <a href=\"http://192.168.1.12/fundoo-app/public/admin/driver-dashboard?id=310\">Vijendra\'</a>\' Updated his profile.', '2022-11-21 04:12:29', '2022-11-03 04:40:58', '2022-11-21 04:12:29'),
(118, 1, 'Driver', NULL, 'Driver Registered', 'New driver  <a href=\"http://192.168.1.12/fundoo-app/public/admin/driver-dashboard?id=1\">Admin\'</a>\'is registered for pickup-drop', '2022-11-21 04:12:29', '2022-11-03 04:43:45', '2022-11-21 04:12:29'),
(119, 1, 'Driver', NULL, 'Driver Registered', 'New driver  <a href=\"http://192.168.1.12/fundoo-app/public/admin/driver-dashboard?id=1\">Admin\'</a>\'is registered for permanent', '2022-11-21 04:12:29', '2022-11-03 04:53:05', '2022-11-21 04:12:29'),
(120, 1, 'Driver', NULL, 'Driver Registered', 'New driver  <a href=\"http://192.168.1.12/fundoo-app/public/admin/driver-dashboard?id=1\">Admin\'</a>\'is registered for permanent', '2022-11-21 04:12:29', '2022-11-03 05:06:53', '2022-11-21 04:12:29'),
(121, 1, 'Driver', NULL, 'Driver Registered', 'New driver  <a href=\"http://192.168.1.12/fundoo-app/public/admin/driver-dashboard?id=1\">Admin\'</a>\'is registered for permanent', '2022-11-21 04:12:29', '2022-11-03 05:24:43', '2022-11-21 04:12:29'),
(122, 314, 'Driver', NULL, 'Profile Update', 'Driver <a href=\"http://192.168.1.12/fundoo-app/public/admin/driver-dashboard?id=314\">Pankaj\'</a>\' Updated his profile.', '2022-11-21 04:12:29', '2022-11-03 05:27:29', '2022-11-21 04:12:29'),
(123, 314, 'Driver', NULL, 'Profile Update', 'Driver <a href=\"http://192.168.1.12/fundoo-app/public/admin/driver-dashboard?id=314\">Pankaj\'</a>\' Updated his profile.', '2022-11-21 04:12:29', '2022-11-03 05:29:43', '2022-11-21 04:12:29'),
(124, 314, 'Driver', NULL, 'Profile Update', 'Driver <a href=\"http://192.168.1.12/fundoo-app/public/admin/driver-dashboard?id=314\">Pankaj\'</a>\' Updated his profile.', '2022-11-21 04:12:29', '2022-11-03 05:29:55', '2022-11-21 04:12:29'),
(125, 310, 'Driver', NULL, 'Profile Update', 'Driver <a href=\"http://192.168.1.12/fundoo-app/public/admin/driver-dashboard?id=310\">Vijendra\'</a>\' Updated his profile.', '2022-11-21 04:12:29', '2022-11-03 05:33:41', '2022-11-21 04:12:29'),
(126, 128, 'Driver', NULL, 'Driver Registered', 'New driver  <a href=\"http://192.168.1.12/fundoo-app/public/admin/driver-dashboard?id=128\">Dipk LLLL\'</a>\'is registered for parmanent', '2022-11-21 04:12:29', '2022-11-03 05:42:32', '2022-11-21 04:12:29'),
(127, 128, 'Driver', NULL, 'Driver Registered', 'New driver  <a href=\"http://192.168.1.12/fundoo-app/public/admin/driver-dashboard?id=128\">Jatin\'</a>\'is registered for parmanent', '2022-11-21 04:12:29', '2022-11-03 05:52:00', '2022-11-21 04:12:29'),
(128, 128, 'Driver', NULL, 'Profile Update', 'Driver <a href=\"http://192.168.1.12/fundoo-app/public/admin/driver-dashboard?id=128\">Suresh\'</a>\' Updated his profile.', '2022-11-21 04:12:29', '2022-11-03 05:53:01', '2022-11-21 04:12:29'),
(129, 128, 'Driver', NULL, 'Profile Update', 'Driver <a href=\"http://192.168.1.12/fundoo-app/public/admin/driver-dashboard?id=128\">Suresh\'</a>\' Updated his profile.', '2022-11-21 04:12:29', '2022-11-03 05:56:58', '2022-11-21 04:12:29'),
(130, 128, 'Driver', NULL, 'Profile Update', 'Driver <a href=\"http://192.168.1.12/fundoo-app/public/admin/driver-dashboard?id=128\">Suresh\'</a>\' Updated his profile.', '2022-11-21 04:12:29', '2022-11-03 06:09:37', '2022-11-21 04:12:29'),
(131, 128, 'Driver', NULL, 'Profile Update', 'Driver <a href=\"http://192.168.1.12/fundoo-app/public/admin/driver-dashboard?id=128\">Suresh\'</a>\' Updated his profile.', '2022-11-21 04:12:29', '2022-11-03 06:15:43', '2022-11-21 04:12:29'),
(132, 128, 'Driver', NULL, 'Profile Update', 'Driver <a href=\"http://192.168.1.12/fundoo-app/public/admin/driver-dashboard?id=128\">Suresh\'</a>\' Updated his profile.', '2022-11-21 04:12:29', '2022-11-03 06:17:06', '2022-11-21 04:12:29'),
(133, 128, 'Driver', NULL, 'Profile Update', 'Driver <a href=\"http://192.168.1.12/fundoo-app/public/admin/driver-dashboard?id=128\">Suresh\'</a>\' Updated his profile.', '2022-11-21 04:12:29', '2022-11-03 06:17:24', '2022-11-21 04:12:29'),
(134, 315, 'Driver', NULL, 'Driver Registered', 'New driver  <a href=\"http://192.168.1.12/fundoo-app/public/admin/driver-dashboard?id=315\">\'</a>\'is registered for parmanent', '2022-11-21 04:12:29', '2022-11-03 06:33:09', '2022-11-21 04:12:29'),
(135, 315, 'Driver', NULL, 'Driver Registered', 'New driver  <a href=\"http://192.168.1.12/fundoo-app/public/admin/driver-dashboard?id=315\">Pritam\'</a>\'is registered for parmanent', '2022-11-21 04:12:29', '2022-11-03 06:37:49', '2022-11-21 04:12:29'),
(136, 315, 'Driver', NULL, 'Driver Registered', 'New driver  <a href=\"http://192.168.1.12/fundoo-app/public/admin/driver-dashboard?id=315\">Pritam\'</a>\'is registered for parmanent', '2022-11-21 04:12:29', '2022-11-03 06:41:59', '2022-11-21 04:12:29'),
(137, 315, 'Driver', NULL, 'Profile Update', 'Driver <a href=\"http://192.168.1.12/fundoo-app/public/admin/driver-dashboard?id=315\">Mahesh\'</a>\' Updated his profile.', '2022-11-21 04:12:29', '2022-11-03 06:57:02', '2022-11-21 04:12:29'),
(138, 315, 'Driver', NULL, 'Driver Registered', 'New driver  <a href=\"http://192.168.1.12/fundoo-app/public/admin/driver-dashboard?id=315\">Mahesh\'</a>\'is registered for parmanent', '2022-11-21 04:12:29', '2022-11-03 07:03:23', '2022-11-21 04:12:29'),
(139, 315, 'Driver', NULL, 'Driver Registered', 'New driver  <a href=\"http://192.168.1.12/fundoo-app/public/admin/driver-dashboard?id=315\">Pritam\'</a>\'is registered for parmanent', '2022-11-21 04:12:29', '2022-11-03 07:06:08', '2022-11-21 04:12:29'),
(140, 315, 'Driver', NULL, 'Driver Registered', 'New driver  <a href=\"http://192.168.1.12/fundoo-app/public/admin/driver-dashboard?id=315\">Pritam\'</a>\'is registered for parmanent', '2022-11-21 04:12:29', '2022-11-03 07:06:36', '2022-11-21 04:12:29'),
(141, 315, 'Driver', NULL, 'Driver Registered', 'New driver  <a href=\"http://192.168.1.12/fundoo-app/public/admin/driver-dashboard?id=315\">Pritam\'</a>\'is registered for parmanent', '2022-11-21 04:12:29', '2022-11-03 07:08:56', '2022-11-21 04:12:29'),
(142, 315, 'Driver', NULL, 'Driver Registered', 'New driver  <a href=\"http://192.168.1.12/fundoo-app/public/admin/driver-dashboard?id=315\">Pritam\'</a>\'is registered for parmanent', '2022-11-21 04:12:29', '2022-11-03 07:11:14', '2022-11-21 04:12:29'),
(143, 315, 'Driver', NULL, 'Profile Update', 'Driver <a href=\"http://192.168.1.12/fundoo-app/public/admin/driver-dashboard?id=315\">Pritam\'</a>\' Updated his profile.', '2022-11-21 04:12:29', '2022-11-03 07:14:28', '2022-11-21 04:12:29'),
(144, 315, 'Driver', NULL, 'Driver Registered', 'New driver  <a href=\"http://192.168.1.12/fundoo-app/public/admin/driver-dashboard?id=315\">Pritam\'</a>\'is registered for parmanent', '2022-11-21 04:12:29', '2022-11-03 07:30:27', '2022-11-21 04:12:29'),
(145, 101, 'Driver', NULL, 'Profile Update', 'Driver <a href=\"http://192.168.1.12/fundoo-app/public/admin/driver-dashboard?id=101\">Dushyant\'</a>\' Updated his profile.', '2022-11-21 04:12:29', '2022-11-07 04:17:14', '2022-11-21 04:12:29'),
(146, 101, 'Driver', NULL, 'Profile Update', 'Driver <a href=\"http://192.168.1.12/fundoo-app/public/admin/driver-dashboard?id=101\">Dushyant\'</a>\' Updated his profile.', '2022-11-21 04:12:29', '2022-11-07 04:18:34', '2022-11-21 04:12:29'),
(147, 314, 'Driver', NULL, 'Profile Update', 'Driver <a href=\"http://192.168.1.12/fundoo-app/public/admin/driver-dashboard?id=314\">Pankaj\'</a>\' Updated his profile.', '2022-11-21 04:12:29', '2022-11-07 04:50:59', '2022-11-21 04:12:29'),
(148, 316, 'Driver', NULL, 'Driver Registered', 'New driver  <a href=\"http://192.168.1.12/fundoo-app/public/admin/driver-dashboard?id=316\">\'</a>\'is registered for parmanent', '2022-11-21 04:12:29', '2022-11-07 05:31:24', '2022-11-21 04:12:29'),
(149, 316, 'Driver', NULL, 'Driver Registered', 'New driver  <a href=\"http://192.168.1.12/fundoo-app/public/admin/driver-dashboard?id=316\">Sharwan\'</a>\'is registered for parmanent', '2022-11-21 04:12:29', '2022-11-07 05:34:42', '2022-11-21 04:12:29'),
(150, 316, 'Driver', NULL, 'Driver Registered', 'New driver  <a href=\"http://192.168.1.12/fundoo-app/public/admin/driver-dashboard?id=316\">Sharwan\'</a>\'is registered for parmanent', '2022-11-21 04:12:29', '2022-11-07 05:35:02', '2022-11-21 04:12:29'),
(151, 316, 'Driver', NULL, 'Driver Registered', 'New driver  <a href=\"http://192.168.1.12/fundoo-app/public/admin/driver-dashboard?id=316\">Sharwan\'</a>\'is registered for parmanent', '2022-11-21 04:12:29', '2022-11-07 05:38:20', '2022-11-21 04:12:29'),
(152, 316, 'Driver', NULL, 'Driver Registered', 'New driver  <a href=\"http://192.168.1.12/fundoo-app/public/admin/driver-dashboard?id=316\">Sharwan\'</a>\'is registered for parmanent', '2022-11-21 04:12:29', '2022-11-07 05:39:44', '2022-11-21 04:12:29'),
(153, 316, 'Driver', NULL, 'Driver Registered', 'New driver  <a href=\"http://192.168.1.12/fundoo-app/public/admin/driver-dashboard?id=316\">Sharwan\'</a>\'is registered for parmanent', '2022-11-21 04:12:29', '2022-11-07 05:40:37', '2022-11-21 04:12:29'),
(154, 316, 'Driver', NULL, 'Driver Registered', 'New driver  <a href=\"http://192.168.1.12/fundoo-app/public/admin/driver-dashboard?id=316\">Sharwan\'</a>\'is registered for parmanent', '2022-11-21 04:12:29', '2022-11-07 06:17:34', '2022-11-21 04:12:29'),
(155, 316, 'Driver', NULL, 'Driver Registered', 'New driver  <a href=\"http://192.168.1.12/fundoo-app/public/admin/driver-dashboard?id=316\">Sharwan\'</a>\'is registered for parmanent', '2022-11-21 04:12:29', '2022-11-07 06:18:44', '2022-11-21 04:12:29'),
(156, 316, 'Driver', NULL, 'Profile Update', 'Driver <a href=\"http://192.168.1.12/fundoo-app/public/admin/driver-dashboard?id=316\">Sharwan\'</a>\' Updated his profile.', '2022-11-21 04:12:29', '2022-11-07 07:18:56', '2022-11-21 04:12:29'),
(157, 315, 'Driver', NULL, 'Profile Update', 'Driver <a href=\"http://192.168.1.12/fundoo-app/public/admin/driver-dashboard?id=315\">Pritam\'</a>\' Updated his profile.', '2022-11-21 04:12:29', '2022-11-07 07:19:08', '2022-11-21 04:12:29'),
(158, 216, 'Driver', NULL, 'Profile Update', 'Driver <a href=\"http://192.168.1.12/fundoo-app/public/admin/driver-dashboard?id=216\">Hardik LL\'</a>\' Updated his profile.', '2022-11-21 04:12:29', '2022-11-12 02:09:24', '2022-11-21 04:12:29'),
(159, 216, 'Driver', NULL, 'Profile Update', 'Driver <a href=\"http://192.168.1.12/fundoo-app/public/admin/driver-dashboard?id=216\">Hardik LL\'</a>\' Updated his profile.', '2022-11-21 04:12:29', '2022-11-12 02:10:48', '2022-11-21 04:12:29'),
(160, 287, 'Driver', NULL, 'Profile Update', 'Driver <a href=\"http://192.168.1.12/fundoo-app/public/admin/driver-dashboard?id=287\">Divyam\'</a>\' Updated his profile.', '2022-11-21 04:12:29', '2022-11-12 04:13:05', '2022-11-21 04:12:29'),
(161, 281, 'Customer', NULL, 'Profile Update', 'Customer <a href=\"http://localhost/fundoo-app/public/admin/customer-dashboard?id=281\">Kaushik123\'</a>\'Updated his profile', '2022-11-21 04:12:29', '2022-11-17 06:14:37', '2022-11-21 04:12:29'),
(162, 128, 'Driver', NULL, 'Profile Update', 'Driver <a href=\"http://192.168.1.12/fundoo-app/public/admin/driver-dashboard?id=128\">Suresh\'</a>\' Updated his profile.', '2022-11-21 04:12:29', '2022-11-20 23:22:34', '2022-11-21 04:12:29'),
(163, 128, 'Driver', NULL, 'Profile Update', 'Driver <a href=\"http://192.168.1.12/fundoo-app/public/admin/driver-dashboard?id=128\">Suresh\'</a>\' Updated his profile.', '2022-11-21 04:12:29', '2022-11-20 23:23:01', '2022-11-21 04:12:29'),
(164, 308, 'Driver', NULL, 'Profile Update', 'Driver <a href=\"http://192.168.1.12/fundoo-app/public/admin/driver-dashboard?id=308\">Hiren\'</a>\' Updated his profile.', '2022-11-21 04:17:25', '2022-11-21 04:16:23', '2022-11-21 04:17:25'),
(165, 316, 'Driver', NULL, 'Profile Update', 'Driver <a href=\"http://192.168.1.12/fundoo-app/public/admin/driver-dashboard?id=316\">Sharwan\'</a>\' Updated his profile.', '2022-11-26 07:43:49', '2022-11-22 11:37:20', '2022-11-26 07:43:49'),
(166, 306, 'Driver', NULL, 'Profile Update', 'Driver <a href=\"http://192.168.1.12/fundoo-app/public/admin/driver-dashboard?id=306\">Kuldeep\'</a>\' Updated his profile.', '2022-11-26 07:43:49', '2022-11-22 11:50:27', '2022-11-26 07:43:49'),
(167, 227, 'Customer', NULL, 'Customer Registered', 'New Customer  <a href=\"http://192.168.1.12/fundoo-app/public/admin/customer-dashboard?id=227\">Dipak\'</a>\' registered. ', '2022-11-26 07:43:49', '2022-11-24 08:05:03', '2022-11-26 07:43:49'),
(168, 227, 'Customer', NULL, 'Customer Registered', 'New Customer  <a href=\"http://192.168.1.12/fundoo-app/public/admin/customer-dashboard?id=227\">Hasmukh\'</a>\' registered. ', '2022-11-26 07:43:49', '2022-11-24 08:05:28', '2022-11-26 07:43:49'),
(169, 227, 'Customer', NULL, 'Customer Registered', 'New Customer  <a href=\"http://192.168.1.12/fundoo-app/public/admin/customer-dashboard?id=227\">Hasmukh\'</a>\' registered. ', '2022-11-26 07:43:49', '2022-11-24 08:05:38', '2022-11-26 07:43:49'),
(170, 227, 'Customer', NULL, 'Customer Registered', 'New Customer  <a href=\"http://192.168.1.12/fundoo-app/public/admin/customer-dashboard?id=227\">Hasmukh\'</a>\' registered. ', '2022-11-26 07:43:49', '2022-11-24 08:08:47', '2022-11-26 07:43:49'),
(171, 227, 'Customer', NULL, 'Customer Registered', 'New Customer  <a href=\"http://192.168.1.12/fundoo-app/public/admin/customer-dashboard?id=227\">Hasmukh\'</a>\' registered. ', '2022-11-26 07:43:49', '2022-11-24 08:09:22', '2022-11-26 07:43:49'),
(172, 227, 'Customer', NULL, 'Customer Registered', 'New Customer  <a href=\"http://192.168.1.12/fundoo-app/public/admin/customer-dashboard?id=227\">Hasmukh\'</a>\' registered. ', '2022-11-26 07:43:49', '2022-11-24 08:16:37', '2022-11-26 07:43:49'),
(173, 227, 'Customer', NULL, 'Customer Registered', 'New Customer  <a href=\"http://192.168.1.12/fundoo-app/public/admin/customer-dashboard?id=227\">Hasmukh\'</a>\' registered. ', '2022-11-26 07:43:49', '2022-11-24 08:16:55', '2022-11-26 07:43:49'),
(174, 227, 'Customer', NULL, 'Customer Registered', 'New Customer  <a href=\"http://192.168.1.12/fundoo-app/public/admin/customer-dashboard?id=227\">Hasmukh\'</a>\' registered. ', '2022-11-26 07:43:49', '2022-11-24 08:18:23', '2022-11-26 07:43:49'),
(175, 227, 'Customer', NULL, 'Customer Registered', 'New Customer  <a href=\"http://192.168.1.12/fundoo-app/public/admin/customer-dashboard?id=227\">Hasmukh\'</a>\' registered. ', '2022-11-26 07:43:49', '2022-11-24 08:18:42', '2022-11-26 07:43:49'),
(176, 227, 'Customer', NULL, 'Customer Registered', 'New Customer  <a href=\"http://192.168.1.12/fundoo-app/public/admin/customer-dashboard?id=227\">Hasmukh\'</a>\' registered. ', '2022-11-26 07:43:49', '2022-11-24 09:49:58', '2022-11-26 07:43:49'),
(177, 227, 'Customer', NULL, 'Customer Registered', 'New Customer  <a href=\"http://192.168.1.12/fundoo-app/public/admin/customer-dashboard?id=227\">Hasmukh\'</a>\' registered. ', '2022-11-26 07:43:49', '2022-11-24 09:50:23', '2022-11-26 07:43:49'),
(178, 227, 'Customer', NULL, 'Customer Registered', 'New Customer  <a href=\"http://192.168.1.12/fundoo-app/public/admin/customer-dashboard?id=227\">Hasmukh\'</a>\' registered. ', '2022-11-26 07:43:49', '2022-11-24 10:18:48', '2022-11-26 07:43:49'),
(179, 227, 'Customer', NULL, 'Customer Registered', 'New Customer  <a href=\"http://192.168.1.12/fundoo-app/public/admin/customer-dashboard?id=227\">Hasmukh\'</a>\' registered. ', '2022-11-26 07:43:49', '2022-11-24 10:21:33', '2022-11-26 07:43:49'),
(180, 227, 'Customer', NULL, 'Customer Registered', 'New Customer  <a href=\"http://192.168.1.12/fundoo-app/public/admin/customer-dashboard?id=227\">Hasmukh\'</a>\' registered. ', '2022-11-26 07:43:49', '2022-11-24 10:21:55', '2022-11-26 07:43:49'),
(181, 227, 'Customer', NULL, 'Customer Registered', 'New Customer  <a href=\"http://192.168.1.12/fundoo-app/public/admin/customer-dashboard?id=227\">Hasmukh\'</a>\' registered. ', '2022-11-26 07:43:49', '2022-11-24 11:15:48', '2022-11-26 07:43:49'),
(182, 227, 'Customer', NULL, 'Customer Registered', 'New Customer  <a href=\"http://192.168.1.12/fundoo-app/public/admin/customer-dashboard?id=227\">Hasmukh\'</a>\' registered. ', '2022-11-26 07:43:49', '2022-11-24 11:16:08', '2022-11-26 07:43:49'),
(183, 227, 'Customer', NULL, 'Customer Registered', 'New Customer  <a href=\"http://192.168.1.12/fundoo-app/public/admin/customer-dashboard?id=227\">Hasmukh\'</a>\' registered. ', '2022-11-26 07:43:49', '2022-11-24 11:16:37', '2022-11-26 07:43:49'),
(184, 227, 'Customer', NULL, 'Customer Registered', 'New Customer  <a href=\"http://192.168.1.12/fundoo-app/public/admin/customer-dashboard?id=227\">Hasmukh\'</a>\' registered. ', '2022-11-26 07:43:49', '2022-11-24 11:17:29', '2022-11-26 07:43:49'),
(185, 227, 'Customer', NULL, 'Customer Registered', 'New Customer  <a href=\"http://192.168.1.12/fundoo-app/public/admin/customer-dashboard?id=227\">Hasmukh\'</a>\' registered. ', '2022-11-26 07:43:49', '2022-11-24 11:17:31', '2022-11-26 07:43:49'),
(186, 227, 'Customer', NULL, 'Customer Registered', 'New Customer  <a href=\"http://192.168.1.12/fundoo-app/public/admin/customer-dashboard?id=227\">Hasmukh\'</a>\' registered. ', '2022-11-26 07:43:49', '2022-11-24 11:17:50', '2022-11-26 07:43:49'),
(187, 227, 'Customer', NULL, 'Customer Registered', 'New Customer  <a href=\"http://192.168.1.12/fundoo-app/public/admin/customer-dashboard?id=227\">Hasmukh\'</a>\' registered. ', '2022-11-26 07:43:49', '2022-11-24 11:19:34', '2022-11-26 07:43:49'),
(188, 227, 'Customer', NULL, 'Customer Registered', 'New Customer  <a href=\"http://192.168.1.12/fundoo-app/public/admin/customer-dashboard?id=227\">Hasmukh\'</a>\' registered. ', '2022-11-26 07:43:49', '2022-11-24 11:22:00', '2022-11-26 07:43:49'),
(189, 227, 'Customer', NULL, 'Customer Registered', 'New Customer  <a href=\"http://192.168.1.12/fundoo-app/public/admin/customer-dashboard?id=227\">Hasmukh\'</a>\' registered. ', '2022-11-26 07:43:49', '2022-11-24 11:23:34', '2022-11-26 07:43:49'),
(190, 227, 'Customer', NULL, 'Customer Registered', 'New Customer  <a href=\"http://192.168.1.12/fundoo-app/public/admin/customer-dashboard?id=227\">Hasmukh\'</a>\' registered. ', '2022-11-26 07:43:49', '2022-11-24 11:24:59', '2022-11-26 07:43:49'),
(191, 227, 'Customer', NULL, 'Customer Registered', 'New Customer  <a href=\"http://192.168.1.12/fundoo-app/public/admin/customer-dashboard?id=227\">Hasmukh\'</a>\' registered. ', '2022-11-26 07:43:49', '2022-11-24 11:25:40', '2022-11-26 07:43:49'),
(192, 227, 'Customer', NULL, 'Customer Registered', 'New Customer  <a href=\"http://192.168.1.12/fundoo-app/public/admin/customer-dashboard?id=227\">Hasmukh\'</a>\' registered. ', '2022-11-26 07:43:49', '2022-11-24 11:27:04', '2022-11-26 07:43:49'),
(193, 227, 'Customer', NULL, 'Customer Registered', 'New Customer  <a href=\"http://192.168.1.12/fundoo-app/public/admin/customer-dashboard?id=227\">Hasmukh\'</a>\' registered. ', '2022-11-26 07:43:49', '2022-11-25 09:22:34', '2022-11-26 07:43:49'),
(194, 99, 'Driver', NULL, 'Profile Update', 'Driver <a href=\"http://192.168.1.12/fundoo-app/public/admin/driver-dashboard?id=99\">Rajesh\'</a>\' Updated his profile.', '2022-12-02 05:05:59', '2022-11-30 19:53:47', '2022-12-02 05:05:59'),
(195, 99, 'Driver', NULL, 'Profile Update', 'Driver <a href=\"http://192.168.1.12/fundoo-app/public/admin/driver-dashboard?id=99\">Rajesh\'</a>\' Updated his profile.', '2022-12-02 05:05:59', '2022-11-30 19:56:37', '2022-12-02 05:05:59'),
(196, 99, 'Driver', NULL, 'Profile Update', 'Driver <a href=\"http://192.168.1.12/fundoo-app/public/admin/driver-dashboard?id=99\">Rajesh\'</a>\' Updated his profile.', '2022-12-02 05:05:59', '2022-11-30 19:57:20', '2022-12-02 05:05:59'),
(197, 99, 'Driver', NULL, 'Profile Update', 'Driver <a href=\"http://192.168.1.12/fundoo-app/public/admin/driver-dashboard?id=99\">Rajesh\'</a>\' Updated his profile.', '2022-12-02 05:05:59', '2022-11-30 19:57:27', '2022-12-02 05:05:59'),
(198, 99, 'Driver', NULL, 'Profile Update', 'Driver <a href=\"http://192.168.1.12/fundoo-app/public/admin/driver-dashboard?id=99\">Rajesh\'</a>\' Updated his profile.', '2022-12-02 05:05:59', '2022-11-30 19:57:42', '2022-12-02 05:05:59'),
(199, 99, 'Driver', NULL, 'Profile Update', 'Driver <a href=\"http://192.168.1.12/fundoo-app/public/admin/driver-dashboard?id=99\">Rajesh\'</a>\' Updated his profile.', '2022-12-02 05:05:59', '2022-11-30 19:58:23', '2022-12-02 05:05:59'),
(200, 99, 'Driver', NULL, 'Profile Update', 'Driver <a href=\"http://192.168.1.12/fundoo-app/public/admin/driver-dashboard?id=99\">Rajesh\'</a>\' Updated his profile.', '2022-12-02 05:05:59', '2022-11-30 19:58:28', '2022-12-02 05:05:59'),
(201, 99, 'Driver', NULL, 'Profile Update', 'Driver <a href=\"http://192.168.1.12/fundoo-app/public/admin/driver-dashboard?id=99\">Rajesh\'</a>\' Updated his profile.', '2022-12-02 05:05:59', '2022-11-30 19:58:34', '2022-12-02 05:05:59'),
(202, 99, 'Driver', NULL, 'Profile Update', 'Driver <a href=\"http://192.168.1.12/fundoo-app/public/admin/driver-dashboard?id=99\">Rajesh\'</a>\' Updated his profile.', '2022-12-02 05:05:59', '2022-11-30 19:59:12', '2022-12-02 05:05:59'),
(203, 99, 'Driver', NULL, 'Profile Update', 'Driver <a href=\"http://192.168.1.12/fundoo-app/public/admin/driver-dashboard?id=99\">Rajesh\'</a>\' Updated his profile.', '2022-12-02 05:05:59', '2022-11-30 20:00:08', '2022-12-02 05:05:59'),
(204, 99, 'Driver', NULL, 'Profile Update', 'Driver <a href=\"http://192.168.1.12/fundoo-app/public/admin/driver-dashboard?id=99\">Rajesh\'</a>\' Updated his profile.', '2022-12-02 05:05:59', '2022-11-30 20:00:48', '2022-12-02 05:05:59'),
(205, 99, 'Driver', NULL, 'Profile Update', 'Driver <a href=\"http://192.168.1.12/fundoo-app/public/admin/driver-dashboard?id=99\">Rajesh\'</a>\' Updated his profile.', '2022-12-02 05:05:59', '2022-11-30 20:00:58', '2022-12-02 05:05:59'),
(206, 99, 'Driver', NULL, 'Profile Update', 'Driver <a href=\"http://192.168.1.12/fundoo-app/public/admin/driver-dashboard?id=99\">Rajesh\'</a>\' Updated his profile.', '2022-12-02 05:05:59', '2022-11-30 20:01:02', '2022-12-02 05:05:59'),
(207, 316, 'Driver', NULL, 'Profile Update', 'Driver <a href=\"http://192.168.1.12/fundoo-app/public/admin/driver-dashboard?id=316\">Sharwan\'</a>\' Updated his profile.', '2023-01-02 04:23:17', '2022-12-11 10:22:00', '2023-01-02 04:23:17'),
(208, 316, 'Driver', NULL, 'Profile Update', 'Driver <a href=\"http://192.168.1.12/fundoo-app/public/admin/driver-dashboard?id=316\">Sharwan\'</a>\' Updated his profile.', '2023-01-02 04:23:17', '2022-12-12 04:42:57', '2023-01-02 04:23:17'),
(209, 316, 'Driver', NULL, 'Profile Update', 'Driver <a href=\"http://192.168.1.12/fundoo-app/public/admin/driver-dashboard?id=316\">Sharwan\'</a>\' Updated his profile.', '2023-01-02 04:23:17', '2022-12-12 04:44:21', '2023-01-02 04:23:17'),
(210, 1, 'Driver', NULL, 'Driver Registered', 'New driver  <a href=\"http://192.168.1.12/fundoo-app/public/admin/driver-dashboard?id=1\">Admin\'</a>\'is registered for permanent', '2023-01-02 04:23:17', '2022-12-12 04:57:43', '2023-01-02 04:23:17'),
(211, 317, 'Driver', NULL, 'Profile Update', 'Driver <a href=\"http://192.168.1.12/fundoo-app/public/admin/driver-dashboard?id=317\">jas\'</a>\' Updated his profile.', '2023-01-02 04:23:17', '2022-12-12 06:51:33', '2023-01-02 04:23:17'),
(212, 317, 'Driver', NULL, 'Profile Update', 'Driver <a href=\"http://192.168.1.12/fundoo-app/public/admin/driver-dashboard?id=317\">jas\'</a>\' Updated his profile.', '2023-01-02 04:23:17', '2022-12-12 09:52:29', '2023-01-02 04:23:17'),
(213, 317, 'Driver', NULL, 'Profile Update', 'Driver <a href=\"http://192.168.1.12/fundoo-app/public/admin/driver-dashboard?id=317\">jas\'</a>\' Updated his profile.', '2023-01-02 04:23:17', '2022-12-12 09:59:20', '2023-01-02 04:23:17');
INSERT INTO `notifications` (`id`, `user_id`, `type`, `type_id`, `title`, `body`, `read_at`, `created_at`, `updated_at`) VALUES
(214, 317, 'Driver', NULL, 'Profile Update', 'Driver <a href=\"http://192.168.1.12/fundoo-app/public/admin/driver-dashboard?id=317\">jas\'</a>\' Updated his profile.', '2023-01-02 04:23:17', '2022-12-12 10:01:20', '2023-01-02 04:23:17'),
(215, 317, 'Driver', NULL, 'Profile Update', 'Driver <a href=\"http://192.168.1.12/fundoo-app/public/admin/driver-dashboard?id=317\">jas\'</a>\' Updated his profile.', '2023-01-02 04:23:17', '2022-12-12 10:27:17', '2023-01-02 04:23:17'),
(216, 1, 'Driver', NULL, 'Driver Registered', 'New driver  <a href=\"http://192.168.1.12/fundoo-app/public/admin/driver-dashboard?id=1\">Admin\'</a>\'is registered for temporary', '2023-01-02 04:23:17', '2022-12-12 10:29:38', '2023-01-02 04:23:17'),
(217, 318, 'Driver', NULL, 'Profile Update', 'Driver <a href=\"http://192.168.1.12/fundoo-app/public/admin/driver-dashboard?id=318\">rajesh\'</a>\' Updated his profile.', '2023-01-02 04:23:17', '2022-12-12 10:30:06', '2023-01-02 04:23:17'),
(218, 1, 'Driver', NULL, 'Driver Registered', 'New driver  <a href=\"http://192.168.1.12/fundoo-app/public/admin/driver-dashboard?id=1\">Admin\'</a>\'is registered for permanent', '2023-01-02 04:23:17', '2022-12-12 11:38:20', '2023-01-02 04:23:17'),
(219, 319, 'Driver', NULL, 'Profile Update', 'Driver <a href=\"http://192.168.1.12/fundoo-app/public/admin/driver-dashboard?id=319\">test\'</a>\' Updated his profile.', '2023-01-02 04:23:17', '2022-12-12 11:40:08', '2023-01-02 04:23:17'),
(220, 1, 'Driver', NULL, 'Driver Registered', 'New driver  <a href=\"http://192.168.1.12/fundoo-app/public/admin/driver-dashboard?id=1\">Admin\'</a>\'is registered for permanent', '2023-01-02 04:23:17', '2022-12-12 12:03:40', '2023-01-02 04:23:17'),
(221, 320, 'Driver', NULL, 'Profile Update', 'Driver <a href=\"http://192.168.1.12/fundoo-app/public/admin/driver-dashboard?id=320\">efrsdff\'</a>\' Updated his profile.', '2023-01-02 04:23:17', '2022-12-12 12:06:50', '2023-01-02 04:23:17'),
(222, 1, 'Driver', NULL, 'Driver Registered', 'New driver  <a href=\"http://192.168.1.12/fundoo-app/public/admin/driver-dashboard?id=1\">Admin\'</a>\'is registered for permanent', '2023-01-02 04:23:17', '2022-12-12 12:11:00', '2023-01-02 04:23:17'),
(223, 321, 'Driver', NULL, 'Profile Update', 'Driver <a href=\"http://localhost/fundoo-app/public/admin/driver-dashboard?id=321\">Test SubCustomergfh\'</a>\' Updated his profile.', '2023-01-02 04:23:17', '2022-12-12 12:26:53', '2023-01-02 04:23:17'),
(224, 319, 'Driver', NULL, 'Profile Update', 'Driver <a href=\"http://localhost/fundoo-app/public/admin/driver-dashboard?id=319\">test\'</a>\' Updated his profile.', '2023-01-02 04:23:17', '2022-12-12 12:28:28', '2023-01-02 04:23:17'),
(225, 320, 'Driver', NULL, 'Profile Update', 'Driver <a href=\"http://localhost/fundoo-app/public/admin/driver-dashboard?id=320\">demo name\'</a>\' Updated his profile.', '2023-01-02 04:23:17', '2022-12-12 12:28:49', '2023-01-02 04:23:17'),
(226, 320, 'Driver', NULL, 'Profile Update', 'Driver <a href=\"http://localhost/fundoo-app/public/admin/driver-dashboard?id=320\">demo name\'</a>\' Updated his profile.', '2023-01-02 04:23:17', '2022-12-12 12:29:22', '2023-01-02 04:23:17'),
(227, 1, 'Driver', NULL, 'Driver Registered', 'New driver  <a href=\"http://localhost/fundoo-app/public/admin/driver-dashboard?id=1\">Admin\'</a>\'is registered for permanent', '2023-01-02 04:23:17', '2022-12-12 12:33:44', '2023-01-02 04:23:17'),
(228, 322, 'Driver', NULL, 'Profile Update', 'Driver <a href=\"http://localhost/fundoo-app/public/admin/driver-dashboard?id=322\">new Bharat\'</a>\' Updated his profile.', '2023-01-02 04:23:17', '2022-12-12 12:34:54', '2023-01-02 04:23:17'),
(229, 323, 'Customer', NULL, 'Customer Registered', 'New Customer  <a href=\'http://localhost/fundoo-app/public/admin/customer-dashboard?323\'>323</a> registered by <a href=\'http://localhost/fundoo-app/public/admin/customer-dashboard?1\'>snehal vyas</a>.', '2023-01-02 04:23:17', '2022-12-12 12:39:24', '2023-01-02 04:23:17'),
(230, 324, 'Customer', NULL, 'Customer Registered', 'New Customer  <a href=\'http://192.168.1.12/fundoo-app/public/admin/customer-dashboard?324\'>324</a> registered by <a href=\'http://192.168.1.12/fundoo-app/public/admin/customer-dashboard?1\'>snehal vyas</a>.', '2023-01-02 04:23:17', '2022-12-13 05:06:52', '2023-01-02 04:23:17'),
(231, 1, 'Driver', NULL, 'Driver Registered', 'New driver  <a href=\"http://192.168.1.12/fundoo-app/public/admin/driver-dashboard?id=1\">Jaypalsinh\'</a>\'is registered for permanent', '2023-01-02 04:23:17', '2022-12-13 05:19:41', '2023-01-02 04:23:17'),
(232, 328, 'Driver', NULL, 'Profile Update', 'Driver <a href=\"http://192.168.1.12/fundoo-app/public/admin/driver-dashboard?id=328\">pick\'</a>\' Updated his profile.', '2023-01-02 04:23:17', '2022-12-13 06:24:43', '2023-01-02 04:23:17'),
(233, 128, 'Driver', NULL, 'Profile Update', 'Driver <a href=\"http://192.168.1.12/fundoo-app/public/admin/driver-dashboard?id=128\">Suresh\'</a>\' Updated his profile.', '2023-01-02 04:23:17', '2022-12-15 06:38:12', '2023-01-02 04:23:17'),
(234, 128, 'Driver', NULL, 'Profile Update', 'Driver <a href=\"http://192.168.1.12/fundoo-app/public/admin/driver-dashboard?id=128\">Suresh\'</a>\' Updated his profile.', '2023-01-02 04:23:17', '2022-12-15 06:43:05', '2023-01-02 04:23:17'),
(235, 128, 'Driver', NULL, 'Profile Update', 'Driver <a href=\"http://192.168.1.12/fundoo-app/public/admin/driver-dashboard?id=128\">Suresh\'</a>\' Updated his profile.', '2023-01-02 04:23:17', '2022-12-15 10:49:34', '2023-01-02 04:23:17'),
(236, 128, 'Driver', NULL, 'Profile Update', 'Driver <a href=\"http://192.168.1.12/fundoo-app/public/admin/driver-dashboard?id=128\">Suresh\'</a>\' Updated his profile.', '2023-01-02 04:23:17', '2022-12-15 10:52:21', '2023-01-02 04:23:17'),
(237, 128, 'Driver', NULL, 'Profile Update', 'Driver <a href=\"http://192.168.1.12/fundoo-app/public/admin/driver-dashboard?id=128\">jas\'</a>\' Updated his profile.', '2023-01-02 04:23:17', '2022-12-15 10:53:15', '2023-01-02 04:23:17'),
(238, 128, 'Driver', NULL, 'Profile Update', 'Driver <a href=\"http://192.168.1.12/fundoo-app/public/admin/driver-dashboard?id=128\">jas\'</a>\' Updated his profile.', '2023-01-02 04:23:17', '2022-12-15 10:55:10', '2023-01-02 04:23:17'),
(239, 128, 'Driver', NULL, 'Profile Update', 'Driver <a href=\"http://192.168.1.12/fundoo-app/public/admin/driver-dashboard?id=128\">jas\'</a>\' Updated his profile.', '2023-01-02 04:23:17', '2022-12-15 10:57:30', '2023-01-02 04:23:17'),
(240, 128, 'Driver', NULL, 'Profile Update', 'Driver <a href=\"http://192.168.1.12/fundoo-app/public/admin/driver-dashboard?id=128\">jas\'</a>\' Updated his profile.', '2023-01-02 04:23:17', '2022-12-15 10:58:00', '2023-01-02 04:23:17'),
(241, 128, 'Driver', NULL, 'Profile Update', 'Driver <a href=\"http://192.168.1.12/fundoo-app/public/admin/driver-dashboard?id=128\">jas\'</a>\' Updated his profile.', '2023-01-02 04:23:17', '2022-12-15 10:58:48', '2023-01-02 04:23:17'),
(242, 128, 'Driver', NULL, 'Profile Update', 'Driver <a href=\"http://192.168.1.12/fundoo-app/public/admin/driver-dashboard?id=128\">jas\'</a>\' Updated his profile.', '2023-01-02 04:23:17', '2022-12-15 11:06:13', '2023-01-02 04:23:17'),
(243, 128, 'Driver', NULL, 'Profile Update', 'Driver <a href=\"http://192.168.1.12/fundoo-app/public/admin/driver-dashboard?id=128\">jas\'</a>\' Updated his profile.', '2023-01-02 04:23:17', '2022-12-15 11:06:30', '2023-01-02 04:23:17'),
(244, 128, 'Driver', NULL, 'Profile Update', 'Driver <a href=\"http://192.168.1.12/fundoo-app/public/admin/driver-dashboard?id=128\">jas\'</a>\' Updated his profile.', '2023-01-02 04:23:17', '2022-12-15 11:12:20', '2023-01-02 04:23:17'),
(245, 128, 'Driver', NULL, 'Profile Update', 'Driver <a href=\"http://192.168.1.12/fundoo-app/public/admin/driver-dashboard?id=128\">jas\'</a>\' Updated his profile.', '2023-01-02 04:23:17', '2022-12-15 11:13:05', '2023-01-02 04:23:17'),
(246, 128, 'Driver', NULL, 'Profile Update', 'Driver <a href=\"http://192.168.1.12/fundoo-app/public/admin/driver-dashboard?id=128\">jas\'</a>\' Updated his profile.', '2023-01-02 04:23:17', '2022-12-15 11:15:35', '2023-01-02 04:23:17'),
(247, 128, 'Driver', NULL, 'Profile Update', 'Driver <a href=\"http://192.168.1.12/fundoo-app/public/admin/driver-dashboard?id=128\">jas\'</a>\' Updated his profile.', '2023-01-02 04:23:17', '2022-12-15 11:17:58', '2023-01-02 04:23:17'),
(248, 128, 'Driver', NULL, 'Profile Update', 'Driver <a href=\"http://192.168.1.12/fundoo-app/public/admin/driver-dashboard?id=128\">jas\'</a>\' Updated his profile.', '2023-01-02 04:23:17', '2022-12-15 11:20:19', '2023-01-02 04:23:17'),
(249, 128, 'Driver', NULL, 'Profile Update', 'Driver <a href=\"http://192.168.1.12/fundoo-app/public/admin/driver-dashboard?id=128\">jas\'</a>\' Updated his profile.', '2023-01-02 04:23:17', '2022-12-15 11:21:52', '2023-01-02 04:23:17'),
(250, 128, 'Driver', NULL, 'Profile Update', 'Driver <a href=\"http://192.168.1.12/fundoo-app/public/admin/driver-dashboard?id=128\">jas\'</a>\' Updated his profile.', '2023-01-02 04:23:17', '2022-12-15 11:26:52', '2023-01-02 04:23:17'),
(251, 128, 'Driver', NULL, 'Profile Update', 'Driver <a href=\"http://192.168.1.12/fundoo-app/public/admin/driver-dashboard?id=128\">jas\'</a>\' Updated his profile.', '2023-01-02 04:23:17', '2022-12-15 11:46:23', '2023-01-02 04:23:17'),
(252, 128, 'Driver', NULL, 'Profile Update', 'Driver <a href=\"http://192.168.1.12/fundoo-app/public/admin/driver-dashboard?id=128\">jas\'</a>\' Updated his profile.', '2023-01-02 04:23:17', '2022-12-15 12:33:57', '2023-01-02 04:23:17'),
(253, 128, 'Driver', NULL, 'Profile Update', 'Driver <a href=\"http://192.168.1.12/fundoo-app/public/admin/driver-dashboard?id=128\">jasthakor\'</a>\' Updated his profile.', '2023-01-02 04:23:17', '2022-12-15 12:35:26', '2023-01-02 04:23:17'),
(254, 128, 'Driver', NULL, 'Profile Update', 'Driver <a href=\"http://192.168.1.12/fundoo-app/public/admin/driver-dashboard?id=128\">jasthakor\'</a>\' Updated his profile.', '2023-01-02 04:23:17', '2022-12-15 12:39:02', '2023-01-02 04:23:17'),
(255, 128, 'Driver', NULL, 'Profile Update', 'Driver <a href=\"http://192.168.1.12/fundoo-app/public/admin/driver-dashboard?id=128\">jasthakor\'</a>\' Updated his profile.', '2023-01-02 04:23:17', '2022-12-15 12:41:33', '2023-01-02 04:23:17'),
(256, 327, 'Driver', NULL, 'Profile Update', 'Driver <a href=\"http://192.168.1.12/fundoo-app/public/admin/driver-dashboard?id=128\">jasthakor\'</a>\' Updated his profile.', '2023-01-03 07:50:51', '0000-00-00 00:00:00', '2023-01-02 11:47:13'),
(257, 327, 'Driver', NULL, 'Profile Update', 'Driver <a href=\"http://192.168.1.12/fundoo-app/public/admin/driver-dashboard?id=128\">jasthakor\'</a>\' Updated his profile.', '2023-01-06 12:18:21', '2023-01-03 12:44:38', '2023-01-02 11:53:15'),
(258, 327, 'Driver', NULL, 'Profile Update', 'Driver <a href=\"http://192.168.1.12/fundoo-app/public/admin/driver-dashboard?id=128\">jasthakor\'</a>\' Updated his profile.', '2023-01-06 12:18:25', '2023-01-04 12:45:56', '2023-01-02 11:53:15'),
(259, 327, 'Driver', NULL, 'Profile Update', 'Driver <a href=\"http://192.168.1.12/fundoo-app/public/admin/driver-dashboard?id=128\">jasthakor\'</a>\' Updated his profile.', '2023-01-06 12:18:38', '2023-01-04 12:47:59', '2023-01-04 05:09:29'),
(260, 324, 'Driver', NULL, 'Profile Update', 'Driver <a href=\"http://192.168.1.12/fundoo-app/public/admin/driver-dashboard?id=128\">jasthakor\'</a>\' Updated his profile.', '2023-01-06 12:36:09', '2023-01-03 12:49:26', '2023-01-04 05:09:29'),
(261, 324, 'Driver', NULL, 'Profile Update', 'Driver <a href=\"http://192.168.1.12/fundoo-app/public/admin/driver-dashboard?id=128\">jasthakor\'</a>\' Updated his profile.', '2023-01-06 12:36:13', '2023-01-01 12:51:12', '2023-01-04 05:09:29'),
(262, 327, 'Driver', NULL, 'Profile Update', 'Driver <a href=\"http://192.168.1.12/fundoo-app/public/admin/driver-dashboard?id=128\">jasthakor\'</a>\' Updated his profile.', '2023-01-03 13:14:42', '2022-12-15 12:51:42', '2023-01-03 13:14:42');

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
('00912e54b219d59c0fab12a045c6858115e876195bff41247058a78ac6ab61f0cbb5833324f0a397', 1, 1, 'FundooApp', '[]', 0, '2022-07-27 04:20:11', '2022-07-27 04:20:11', '2023-07-27 09:50:11'),
('020d3a092d7c8b718f5132cad69dfc30feec2a6cb5d1b9b92925582d4f131e4ce06b492a11420ec0', 1, 1, 'FundooApp', '[]', 0, '2022-07-27 04:38:33', '2022-07-27 04:38:33', '2023-07-27 10:08:33'),
('02bb308d551c8d9684cb88f728051bc30b0fd6a98904c34389a6d4528749a6c555c9e48cf03f872f', 128, 1, 'FundooApp', '[]', 0, '2022-08-25 04:40:50', '2022-08-25 04:40:50', '2023-08-25 10:10:50'),
('0519eed274ded611477a9fc58e73a4382d180d27d54a8146ddabd28a7f6433867199a2514a884df2', 227, 1, 'FundooApp', '[]', 0, '2022-10-06 04:29:56', '2022-10-06 04:29:56', '2023-10-06 09:59:56'),
('0541f52a98b48602f417cdb028565555622c344b7752599d69682851c16a2cac23d1a91a0ed11166', 146, 1, 'FundooApp', '[]', 0, '2022-09-05 23:47:02', '2022-09-05 23:47:02', '2023-09-06 05:17:02'),
('061f65b777a25c6205e13de9ce9d4559089f9e80969823d303d7e534d8750cda7dd0ac7ab56d04dc', 316, 1, 'FundooApp', '[]', 0, '2022-11-08 03:45:41', '2022-11-08 03:45:41', '2023-11-08 09:15:41'),
('0652ad79035d2d735a2cf44052687958f6c52b6339d199b365e5b224480dba6209b138122eea1e80', 35, 1, 'FundooApp', '[]', 0, '2022-11-23 06:58:07', '2022-11-23 06:58:07', '2023-11-23 12:28:07'),
('065b4366253c6e568048f555c81bcc2a8e9fd132b5cc24f83854b4898bc6c9e1175a611439cfd22d', 128, 1, 'FundooApp', '[]', 0, '2022-11-30 13:20:06', '2022-11-30 13:20:06', '2023-11-30 18:50:06'),
('06aa25cf5cf3a5af770e4dfebf07ed6dde03670b710dc188ef168f9430354d63b0990873ffed2de6', 5, 1, 'FundooApp', '[]', 0, '2022-08-02 04:48:44', '2022-08-02 04:48:44', '2023-08-02 10:18:44'),
('06eea25693ca6e737807a03e8dcb66d3d22a5e66138abf4a9283d17eecc50d21df81d503e7a3cc43', 328, 1, 'FundooApp', '[]', 0, '2023-01-02 11:22:54', '2023-01-02 11:22:54', '2024-01-02 16:52:54'),
('072068118c66e44bd2bfb98c2039f4f0dc50a109f1e335c659a6adaa055e847922a284c37a06cebd', 204, 1, 'FundooApp', '[]', 0, '2022-08-25 05:57:44', '2022-08-25 05:57:44', '2023-08-25 11:27:44'),
('0800c0ad9b9cc9bfbf9e56d2a3abf57397d090df62f8ee734fc47e88b58050b10ef513aefe15f22c', 102, 1, 'FundooApp', '[]', 0, '2022-09-27 02:24:10', '2022-09-27 02:24:10', '2023-09-27 07:54:10'),
('093c1dd33dddd97a02a0e4b8a00225c7644d633656637a42ffb19f02e974358a7e54c9aad078ed95', 144, 1, 'FundooApp', '[]', 0, '2022-08-19 02:03:10', '2022-08-19 02:03:10', '2023-08-19 07:33:10'),
('09872e7442448d4c1fd5c755200bc3fd462fc38f8fdcef0839a96fb897d38b5acc9c0765fb26ac40', 327, 1, 'FundooApp', '[]', 0, '2023-01-03 06:16:17', '2023-01-03 06:16:17', '2024-01-03 11:46:17'),
('09a8e209914e369e25a40cd01fcf5f25e9a00d7212ca4a8856db373c434c25a1edcd4a15878f5252', 1, 1, 'FundooApp', '[]', 0, '2022-07-27 02:09:18', '2022-07-27 02:09:18', '2023-07-27 07:39:18'),
('0a10b76239f3f4e33eb563083b2c033e63ebaf527f272c5e358c4b082699ceddad78038fdbf2aaf8', 128, 1, 'FundooApp', '[]', 0, '2022-08-25 04:52:55', '2022-08-25 04:52:55', '2023-08-25 10:22:55'),
('0a37f60032188143910f44124c26105b70624ee2022c6052e631c41cb5c78537f744493c5f9ca1d3', 128, 1, 'FundooApp', '[]', 0, '2022-08-25 07:24:58', '2022-08-25 07:24:58', '2023-08-25 12:54:58'),
('0a5d947177d802f393a144b0e021c8457259188dde036c104340b1302b066363590d7281e6dcb242', 219, 1, 'FundooApp', '[]', 0, '2022-12-09 07:29:40', '2022-12-09 07:29:40', '2023-12-09 12:59:40'),
('0a7f154f07dd42d7c22ebe65a9259b372871c770011e8594e795ce6f53d5853bf944b421eb7692e9', 122, 1, 'FundooApp', '[]', 0, '2022-07-27 02:04:45', '2022-07-27 02:04:45', '2023-07-27 07:34:45'),
('0ae6eb0a2b9c77101800f469270157e2e4e0af422b7e9af0cd8a9658b4f8b4df5cf5c6179b52bc18', 144, 1, 'FundooApp', '[]', 0, '2022-08-19 02:11:24', '2022-08-19 02:11:24', '2023-08-19 07:41:24'),
('0cb3fc19098c3853c8c9a1ab155e509f2d73ba441956ed4fd18506c3f5c1ad82d53d681b74ad9810', 1, 1, 'FundooApp', '[]', 0, '2022-07-27 05:07:08', '2022-07-27 05:07:08', '2023-07-27 10:37:08'),
('0df28789c4f1f91e732948335ba4b7ddd137e34eeef135b51452f65585b75120f581cedbba4e3473', 116, 1, 'FundooApp', '[]', 0, '2022-07-26 06:08:26', '2022-07-26 06:08:26', '2023-07-26 11:38:26'),
('0f96af48ccdc8b8a82b45874d7b59b46dd18e24867700e76d821ca80af58be500356ac0b3bb9828f', 146, 1, 'FundooApp', '[]', 0, '2022-08-10 07:29:17', '2022-08-10 07:29:17', '2023-08-10 12:59:17'),
('10ce429922b56a529659c29c9f61b08106c6ff25e343a8743c21aea818a2c93324c91166ac72ab5f', 35, 1, 'FundooApp', '[]', 0, '2022-12-15 13:15:39', '2022-12-15 13:15:39', '2023-12-15 18:45:39'),
('113917d2e4d4c3be92afbc7311928bb8859da0583bd0de5fe89a02f7ca7a3f480f16acb3fb84c976', 194, 1, 'FundooApp', '[]', 0, '2022-08-24 06:26:54', '2022-08-24 06:26:54', '2023-08-24 11:56:54'),
('118da0c2d806c03f5d0adf484badf206466f29ca54d894e2e044be16287e53b27bd4c18ef5325e1d', 122, 1, 'FundooApp', '[]', 0, '2022-07-27 07:14:38', '2022-07-27 07:14:38', '2023-07-27 12:44:38'),
('12a45d9467c3c4f1f2767fadf6e7166d7b6fe3b0bbc2876e6e67b6a3a685ea761ad32953ea0a7206', 1, 1, 'FundooApp', '[]', 0, '2022-07-27 05:12:27', '2022-07-27 05:12:27', '2023-07-27 10:42:27'),
('13e7be74f51aa5c9fe720e43fe99ad464f5cfd5818b1d78bc4b7aa446f3be91d24ca831160b842e2', 144, 1, 'FundooApp', '[]', 0, '2022-09-27 02:17:12', '2022-09-27 02:17:12', '2023-09-27 07:47:12'),
('1436139703394c4a1ddb8b320c6f3f9f014cdac6dba98d90886dded0fb1a5ad231cd372320e50b50', 102, 1, 'FundooApp', '[]', 0, '2022-09-23 02:58:32', '2022-09-23 02:58:32', '2023-09-23 08:28:32'),
('150dea26ab23cea45456c8f7c073ec80793d31589a7a8098f7ccea502f2c428da9be3e96b4fdb933', 229, 1, 'FundooApp', '[]', 0, '2022-09-14 06:29:46', '2022-09-14 06:29:46', '2023-09-14 11:59:46'),
('157f0f00d6227cf73635ecee4c3ccea28fd80069911bd9bddb7f869d95f48b684e419b44f738482e', 328, 1, 'FundooApp', '[]', 0, '2022-12-23 11:16:35', '2022-12-23 11:16:35', '2023-12-23 16:46:35'),
('15acc2f9bcf5a9e63afc81de289169876b0b93550c9e2fa9df6aa4482591221dfc23a472aab00c97', 209, 1, 'FundooApp', '[]', 0, '2022-08-26 23:43:55', '2022-08-26 23:43:55', '2023-08-27 05:13:55'),
('15ee7f93d7bcfd7b637ef683abf280644f83b1cbf0fcb4fbe8975c12b03d587ad8d428ef201f6269', 128, 1, 'FundooApp', '[]', 0, '2022-08-25 07:57:31', '2022-08-25 07:57:31', '2023-08-25 13:27:31'),
('15f2ed5510465ea4acb147a6fbe75bf81891f7ff80068f1be5e7a625eabb3dc9e55102aa0c93e11e', 122, 1, 'FundooApp', '[]', 0, '2022-07-27 23:46:35', '2022-07-27 23:46:35', '2023-07-28 05:16:35'),
('160cec7eabbb32397b0fea367a85b36ddae8ee2988065035ab03316e521cf14c580be2cb11a14c05', 1, 1, 'FundooApp', '[]', 0, '2022-07-27 05:11:35', '2022-07-27 05:11:35', '2023-07-27 10:41:35'),
('18c51007b7b92a00f6a988235f4e8de5d03c3e7f0b058edc4c4c8b00e0e517bb2fa519086ac5c85d', 204, 1, 'FundooApp', '[]', 0, '2022-08-25 05:58:24', '2022-08-25 05:58:24', '2023-08-25 11:28:24'),
('18c86005485fdd08bd97347233f660ab42eac570339ec7e845e8262b38d2f456aac519e6ea633c45', 128, 1, 'FundooApp', '[]', 0, '2022-08-12 02:26:16', '2022-08-12 02:26:16', '2023-08-12 07:56:16'),
('1951a485472234f47adfc9548a0b067d1362153526bcba4aa58aa654d289d682912235ce3da4f32e', 102, 1, 'FundooApp', '[]', 0, '2022-09-27 02:24:45', '2022-09-27 02:24:45', '2023-09-27 07:54:45'),
('19861c43306526f657ec33a9c48ccbfcd838930de7a0584956e2f08f74bc89e5a00366b11c61e25c', 1, 1, 'FundooApp', '[]', 0, '2022-07-27 04:58:20', '2022-07-27 04:58:20', '2023-07-27 10:28:20'),
('1a5680034b6064ed03fb8f3b71b718fbc40500df789e5c5d2fa63dbd76350ebfd7d9640672d8a9a7', 146, 1, 'FundooApp', '[]', 0, '2022-08-12 23:18:59', '2022-08-12 23:18:59', '2023-08-13 04:48:59'),
('1ab82cb2cb788bfd680404856f222bb84bb0f315691a1071498607f019c7c0123d658e8f194bc6a0', 203, 1, 'FundooApp', '[]', 0, '2022-08-25 06:04:27', '2022-08-25 06:04:27', '2023-08-25 11:34:27'),
('1b6ac840a07f6a606f8c1609bc50a8f75d0f81539bf841f028482b5d9fffc1640597ebf9712e3145', 121, 1, 'FundooApp', '[]', 0, '2022-07-27 01:33:01', '2022-07-27 01:33:01', '2023-07-27 07:03:01'),
('1b77ea6ca7a838a16e4a058b074a18ac9cad348a827acccf36fa619bf6a5555bba5792813a556963', 35, 1, 'FundooApp', '[]', 0, '2022-12-21 09:21:37', '2022-12-21 09:21:37', '2023-12-21 14:51:37'),
('1ba3e1ce26937f1a5b0f3a291ef618cd691908ec9a60deb796daa47cd50b4f703a7dc60386d7bac3', 35, 1, 'FundooApp', '[]', 0, '2022-12-13 07:19:52', '2022-12-13 07:19:52', '2023-12-13 12:49:52'),
('1c31dffa85f2f17f8459a09de72fc1702bbfa8b3b0f2de67c6ad7d9a32a76b6e1f020d456a98b2b1', 226, 1, 'FundooApp', '[]', 0, '2022-09-03 05:52:59', '2022-09-03 05:52:59', '2023-09-03 11:22:59'),
('1d9420bc019b558afaa51ae5223bedd121163288145da9333256df968547afc9afe08bd9d3b85fc2', 225, 1, 'FundooApp', '[]', 0, '2022-09-03 04:42:59', '2022-09-03 04:42:59', '2023-09-03 10:12:59'),
('1e232240af0fc7d21cfd0907c8b5ee62788effc20901c3724a6b6516a80218b123aab229e15f587e', 128, 1, 'FundooApp', '[]', 0, '2022-12-15 05:01:35', '2022-12-15 05:01:35', '2023-12-15 10:31:35'),
('1f6b2d9a17195d35aeaa28333b1196ab8e7c39ce510ae6a42baea87d03098fc224302bd2abe6e867', 1, 1, 'FundooApp', '[]', 0, '2022-07-27 05:12:12', '2022-07-27 05:12:12', '2023-07-27 10:42:12'),
('20a2ea9e5b00b3bb62cc9e83a58de1979aa2a0092133fbce9d6b445725f2b1da0146b49552edb7a2', 181, 1, 'FundooApp', '[]', 0, '2022-08-24 06:35:54', '2022-08-24 06:35:54', '2023-08-24 12:05:54'),
('20d7c5563366e79a3094fef4c70faaee0826c78132c4984dcbda64c78b0dc1b6ebe7688b29fb465c', 219, 1, 'FundooApp', '[]', 0, '2022-09-02 03:00:26', '2022-09-02 03:00:26', '2023-09-02 08:30:26'),
('21948077401bbe5190b32829a998d4e9376c933a50c32e6ec931c03050605f649719ae1e7b9f9a69', 316, 1, 'FundooApp', '[]', 0, '2022-11-30 10:39:46', '2022-11-30 10:39:46', '2023-11-30 16:09:46'),
('22273cc6b5c304957a4a5a2f55a7b42d9541a8cc718b02c3514c9167a51088da008d1956827bee51', 108, 1, 'FundooApp', '[]', 0, '2022-07-26 04:13:47', '2022-07-26 04:13:47', '2023-07-26 09:43:47'),
('2322f17c2926b15d97247c1bce35b99a5febcbf859feebe6f688a44e4ded4ae21d05f4d9a3fac3e4', 144, 1, 'FundooApp', '[]', 0, '2022-09-29 05:01:38', '2022-09-29 05:01:38', '2023-09-29 10:31:38'),
('239efc34c3a369290b91ec50d22c4823adff45843bbcbac49c773d7b4b0648c3dcbff62bf839f3be', 144, 1, 'FundooApp', '[]', 0, '2022-09-16 23:59:10', '2022-09-16 23:59:10', '2023-09-17 05:29:10'),
('245f5ea44cbbc82e52df59209fa59f8e659d3eee19416c648c1e2ad718a28d3d08d31859cd8deb59', 122, 1, 'FundooApp', '[]', 0, '2022-07-28 01:39:37', '2022-07-28 01:39:37', '2023-07-28 07:09:37'),
('250374ed6b9a012c462a549943e24ffabf269b2c282176c76ed0a88e9ab07d6a0eb4ad6019353611', 122, 1, 'FundooApp', '[]', 0, '2022-07-27 02:43:35', '2022-07-27 02:43:35', '2023-07-27 08:13:35'),
('253c72f910872bf3bf7e120120ca12ac849f53b40a36340240067e817fa07f7dba1a41efa24048cf', 109, 1, 'FundooApp', '[]', 0, '2022-07-26 04:25:14', '2022-07-26 04:25:14', '2023-07-26 09:55:14'),
('25c730b474e42484dd22fc08aafafdd0d959cf85027335e3e66e5a3b5e95c689c5199f5ffa0021f8', 122, 1, 'FundooApp', '[]', 0, '2022-07-28 00:26:27', '2022-07-28 00:26:27', '2023-07-28 05:56:27'),
('264c533a72aff2b44751be46a6f65ea6134b40438bd18d93228cfcb08d104727011da102b1284b67', 185, 1, 'FundooApp', '[]', 0, '2022-08-23 04:56:40', '2022-08-23 04:56:40', '2023-08-23 10:26:40'),
('2670b8c742df894a61b3177acbcfd8847f370a1d29b232946c69f89e54ef2b53d32ffc39ef0ba4de', 197, 1, 'FundooApp', '[]', 0, '2022-08-29 12:19:59', '2022-08-29 12:19:59', '2023-08-29 17:49:59'),
('26966a3dc0f9e31d36c81aecc36b18a2be3c26857791b8a7590f5bd88ebe0fe048b1c046375757bd', 128, 1, 'FundooApp', '[]', 0, '2022-08-05 00:45:05', '2022-08-05 00:45:05', '2023-08-05 06:15:05'),
('26c90d9d0d13bce50f1cd3208e5e52546b063ce5a41a21ca6a0823f18b9119a9a8663b598556712b', 128, 1, 'FundooApp', '[]', 0, '2022-11-22 00:20:17', '2022-11-22 00:20:17', '2023-11-22 05:50:17'),
('26dab1eb010dd52f6929669b5912292fc50c7376593f05a9d6a86f9ee2764ef1f328619275acc3c4', 141, 1, 'FundooApp', '[]', 0, '2022-08-06 05:56:08', '2022-08-06 05:56:08', '2023-08-06 11:26:08'),
('27243a96bef73d8e47f8b3406e46fa39111c91b52c3acabbef725fb77550d2bbf7d06b4876457f3b', 117, 1, 'FundooApp', '[]', 0, '2022-07-26 23:40:17', '2022-07-26 23:40:17', '2023-07-27 05:10:17'),
('2811b2446abb05a68ca40ff998b31ae7d970dfd1028f9be4a728de0de6fcf6aca3ad8bc3f1116bd8', 144, 1, 'FundooApp', '[]', 0, '2022-08-13 05:29:46', '2022-08-13 05:29:46', '2023-08-13 10:59:46'),
('293510f6821d7620a160605b7ea4ec5297c5f055c0432e6febfce07c60a5d8aef20938be44893227', 1, 1, 'FundooApp', '[]', 0, '2022-07-27 05:10:32', '2022-07-27 05:10:32', '2023-07-27 10:40:32'),
('29693adb17f76cfaf9ec1a78d51a171c14f505173df7fdcf5c1817f82b35a92af6768787843365e5', 128, 1, 'FundooApp', '[]', 0, '2022-08-01 01:05:40', '2022-08-01 01:05:40', '2023-08-01 06:35:40'),
('29ca7ac0e8390125bd93db5e9cc0065889ed9286c7297b910ee1a454072fd6235c8750b9b884fb84', 128, 1, 'FundooApp', '[]', 0, '2022-07-29 00:04:26', '2022-07-29 00:04:26', '2023-07-29 05:34:26'),
('2a555f957709ef034c3523400c236e0a4039d93db5936080eeb7ab81cf5ed412189433920d89cf99', 144, 1, 'FundooApp', '[]', 0, '2022-08-12 23:09:26', '2022-08-12 23:09:26', '2023-08-13 04:39:26'),
('2be712bcb994b0e1a8f3295216c137805115773e0260edb223c638bc499acdf9038739ad02abcaec', 128, 1, 'FundooApp', '[]', 0, '2022-07-28 23:33:06', '2022-07-28 23:33:06', '2023-07-29 05:03:06'),
('2c4064bef875d2c0a82ef41d861720751084e1dc5a7c2eaf929d413bf088711c8718f4700d8d173c', 128, 1, 'FundooApp', '[]', 0, '2022-07-28 06:48:41', '2022-07-28 06:48:41', '2023-07-28 12:18:41'),
('2d84364e158d70ca2a7604581dbd607b1e2bc1574a99bcbfa19f6127f13e60f5c2ca799c708c6afc', 3, 1, 'FundooApp', '[]', 0, '2022-08-15 07:01:12', '2022-08-15 07:01:12', '2023-08-15 12:31:12'),
('2e64cf7b8f0afa8d2fc96c40555813499d6f199fa3690c0c8fec714f8871c0eb12e1b0ba7cf6fafb', 194, 1, 'FundooApp', '[]', 0, '2022-08-24 06:27:28', '2022-08-24 06:27:28', '2023-08-24 11:57:28'),
('2f1a56ca83324e223d92fb5fa52038207994d3dde333a8636c266fe1ae181464ee31f6396aed14dc', 128, 1, 'FundooApp', '[]', 0, '2022-08-13 05:23:49', '2022-08-13 05:23:49', '2023-08-13 10:53:49'),
('312378a4437717765c8e8ee813619c841392521df4beba06571f5738b947401e9f20a3b5971c7e56', 108, 1, 'FundooApp', '[]', 0, '2022-07-26 04:50:38', '2022-07-26 04:50:38', '2023-07-26 10:20:38'),
('32d42fc86049fd5bbf806d25598ef69f1672d583e196757507ed36335df81ad45d93a29238cb4d50', 104, 1, 'FundooApp', '[]', 0, '2022-12-13 07:35:29', '2022-12-13 07:35:29', '2023-12-13 13:05:29'),
('332e778be8bdc501158087ba7baf0c441fa06d9343f975d60dafc2dc4eb1de9b85a2bb657d0fcb0c', 185, 1, 'FundooApp', '[]', 0, '2022-08-23 04:29:19', '2022-08-23 04:29:19', '2023-08-23 09:59:19'),
('343ee581fbf9249ed42386cd633199717480dadce7799da419eaa6992a09349cc14fc4c0cf1f7874', 204, 1, 'FundooApp', '[]', 0, '2022-08-25 05:56:34', '2022-08-25 05:56:34', '2023-08-25 11:26:34'),
('344416d2be12e80dcea126f11c326b74278d16730272cff63e19ac7153273b77a236c2ec22be40e7', 144, 1, 'FundooApp', '[]', 0, '2022-08-09 01:44:40', '2022-08-09 01:44:40', '2023-08-09 07:14:40'),
('34925af35da5cc74385c36db64c5b8d837ed3387de0d2430b7ab5c0835f3e0ebe3c76d1e155e3053', 128, 1, 'FundooApp', '[]', 0, '2022-08-03 00:30:24', '2022-08-03 00:30:24', '2023-08-03 06:00:24'),
('34f4b7c84dc6a58b203a2b722622710feb5972dc61a5096b27941925ed37df8a3e035a0642229fb2', 3, 1, 'FundooApp', '[]', 0, '2022-08-19 00:22:31', '2022-08-19 00:22:31', '2023-08-19 05:52:31'),
('35642acbcffe831ae21cee772ba16e9beb85f21b5dba81e253310f208de9c8ca01955b6c9bdb6448', 128, 1, 'FundooApp', '[]', 0, '2022-07-28 06:48:55', '2022-07-28 06:48:55', '2023-07-28 12:18:55'),
('363a9cee61ff1d3553e24cbb6835c5a39fea92976a12bb04d18c4c2bc77efa28c3ad8cbe7bd1bf5e', 316, 1, 'FundooApp', '[]', 0, '2022-11-09 01:09:03', '2022-11-09 01:09:03', '2023-11-09 06:39:03'),
('3679d2beff7a42571a224c93a55ab65459fd4308233325728584467ac300658a3032055dafbb7638', 1, 1, 'FundooApp', '[]', 0, '2022-07-27 05:17:22', '2022-07-27 05:17:22', '2023-07-27 10:47:22'),
('391fbf88a79e91ee3b2ed2eebc06413e671863bc671f1c218683fb08d0f39ae224b42c5996ca6ac8', 121, 1, 'FundooApp', '[]', 0, '2022-07-27 01:50:36', '2022-07-27 01:50:36', '2023-07-27 07:20:36'),
('3a8d8356cb8afa0df038453164782ef473bbc6d5c730968d75f7c0fe222cfdbffcb4f21dc274a9f0', 127, 1, 'FundooApp', '[]', 0, '2022-07-28 01:13:02', '2022-07-28 01:13:02', '2023-07-28 06:43:02'),
('3b48ab7d7f3ed187f7a5c843353f0b103ede4885bf66ce0b121a1ea8e5f6e242628f5eee135aa0bf', 219, 1, 'FundooApp', '[]', 0, '2022-08-30 02:05:48', '2022-08-30 02:05:48', '2023-08-30 07:35:48'),
('3c51cc2e04c504c61c1feb31098fa02d3ded13e7a78ddec4e3ae28a388d80c1cadbdc32741bd6863', 1, 1, 'FundooApp', '[]', 0, '2022-07-27 06:25:23', '2022-07-27 06:25:23', '2023-07-27 11:55:23'),
('3d7e87aa012e3c3c0a1b2f8c5b86accaa61b64491c453c85f0cb7a06d2c2e310b6710ee399a89256', 104, 1, 'FundooApp', '[]', 0, '2022-08-28 02:28:23', '2022-08-28 02:28:23', '2023-08-28 07:58:23'),
('3dbeedf27feb729e5e4f9c9b5ed4e22087c42ddbaf830cc783ad4f4d0d8479e0757e7e68de82e11a', 144, 1, 'FundooApp', '[]', 0, '2022-08-10 01:34:29', '2022-08-10 01:34:29', '2023-08-10 07:04:29'),
('3e457d746429bbfff2e18e2484c1fa0261dd5fb052464ee392002db7d3c7614a20862f7201688f6d', 3, 1, 'FundooApp', '[]', 0, '2022-08-15 07:05:08', '2022-08-15 07:05:08', '2023-08-15 12:35:08'),
('3e9daad87cedd506199260a0075b3f037bda5227c15bd0c2696eb42d76b3c7633502ce594bc3a17e', 146, 1, 'FundooApp', '[]', 0, '2022-09-13 04:19:00', '2022-09-13 04:19:00', '2023-09-13 09:49:00'),
('3f155ba41aac82666f81fb6fd46a81eccf0a462f479e603bb909f8889fe1a4447a12937f122a14ce', 128, 1, 'FundooApp', '[]', 0, '2022-08-25 07:46:15', '2022-08-25 07:46:15', '2023-08-25 13:16:15'),
('3f3d2a8c5e7d6e68205adbd10f2d72dc84996e183689c6fa31e437430c63a95264efc7cf3ef842b1', 225, 1, 'FundooApp', '[]', 0, '2022-09-02 23:52:19', '2022-09-02 23:52:19', '2023-09-03 05:22:19'),
('3f6d44987f7c14e16f083f6a03d2bb1955617692c5a263cadb4b6c86d6a55266b6c84b6f91327a39', 185, 1, 'FundooApp', '[]', 0, '2022-08-23 04:54:39', '2022-08-23 04:54:39', '2023-08-23 10:24:39'),
('4015e9557a0d85a9954554a83489c7c7a564e24957575990b3c6fcd06adf1ee9f676a892603f74a0', 128, 1, 'FundooApp', '[]', 0, '2022-07-28 06:54:07', '2022-07-28 06:54:07', '2023-07-28 12:24:07'),
('41202cca1b1c64cd4230b2dfacb229fb99d77020eddddb248da5e4a40d951cc5c121118e063f92b6', 3, 1, 'FundooApp', '[]', 0, '2022-08-19 02:11:42', '2022-08-19 02:11:42', '2023-08-19 07:41:42'),
('4165745fca5d9396af820c17ba546e4d55c31950d1cd36489f0f4cb286e1403be103e573331d3333', 225, 1, 'FundooApp', '[]', 0, '2022-09-05 00:48:56', '2022-09-05 00:48:56', '2023-09-05 06:18:56'),
('41d3299c2aea96902157e008dd4f3828afc5eabbb54ee4192547dcc7d1cb6279d91404c0e9b0660a', 194, 1, 'FundooApp', '[]', 0, '2022-08-24 04:05:24', '2022-08-24 04:05:24', '2023-08-24 09:35:24'),
('423720bbb574b7ce778469aeb44de6e2e4ac443b37b61cdb47c3103e7a33f57f76543b53657ab7ff', 144, 1, 'FundooApp', '[]', 0, '2022-08-22 06:28:06', '2022-08-22 06:28:06', '2023-08-22 11:58:06'),
('42700bbb868669a38db6334aea13b89fab2204d1616c5b25281ef635bfdf9b54c4ea41409a8821ba', 128, 1, 'FundooApp', '[]', 0, '2022-07-29 00:20:55', '2022-07-29 00:20:55', '2023-07-29 05:50:55'),
('42f045dc2d9ebb79ed545414ee8ad57c94eadd4c2dd22799429b6a2ab327fba6b8725918b212c2fe', 99, 1, 'FundooApp', '[]', 0, '2022-11-30 19:50:21', '2022-11-30 19:50:21', '2023-12-01 01:20:21'),
('43243cd41ee663098539eca9f763ee4a46082e716f2cd9670c1c7e24848d9b137fdf96b63135d0a7', 227, 1, 'FundooApp', '[]', 0, '2022-11-24 08:04:40', '2022-11-24 08:04:40', '2023-11-24 13:34:40'),
('44347018b234eaf661f4e62070659d7db5d2f33384318afa9b46629a0216262c03506f93ca6fb896', 279, 1, 'FundooApp', '[]', 0, '2022-12-13 07:21:15', '2022-12-13 07:21:15', '2023-12-13 12:51:15'),
('452f457b49af755572527b25c3d96b9aee0d5aca63629ea3a011ed2c6f45d1f065c42a8f589055a8', 3, 1, 'FundooApp', '[]', 0, '2022-08-15 07:07:46', '2022-08-15 07:07:46', '2023-08-15 12:37:46'),
('453ac9b7c4d6962a7b03571773a226d04c8f39c8e20a58c8ae394162defb5ba4b6a2024d6c8b9d7f', 102, 1, 'FundooApp', '[]', 0, '2022-09-27 02:26:51', '2022-09-27 02:26:51', '2023-09-27 07:56:51'),
('45fb3c046c3b2729b4b2bf1b491864c73a6743f0331f20b32cb25faa1cf67fe6a97d803d159a94bc', 128, 1, 'FundooApp', '[]', 0, '2022-08-25 07:21:49', '2022-08-25 07:21:49', '2023-08-25 12:51:49'),
('4637d537ffd6a78c23d75b6b5e0298542e381e33e64e78b8085b43850cb5afc96ba2a38f574a6b2b', 128, 1, 'FundooApp', '[]', 0, '2022-08-09 01:58:36', '2022-08-09 01:58:36', '2023-08-09 07:28:36'),
('472ae5cdb90e743cecdcc7a9ebafdfc143f0e4ab21b24ae8d46c78765f89a34190dc0216708dfd0e', 124, 1, 'FundooApp', '[]', 0, '2022-07-28 01:06:36', '2022-07-28 01:06:36', '2023-07-28 06:36:36'),
('47772f6f0538e9e32237ded93a4b489893f548c2ffb570413cdf5319d6e7961fbc9a813c08d721f6', 152, 1, 'FundooApp', '[]', 0, '2022-08-12 02:45:04', '2022-08-12 02:45:04', '2023-08-12 08:15:04'),
('47b7e04150e48cccd6fefa50ce03e6908b8c964bf786550cd8e17ad2d4bace097768223d59c050cb', 128, 1, 'FundooApp', '[]', 0, '2022-12-13 07:23:28', '2022-12-13 07:23:28', '2023-12-13 12:53:28'),
('48290579ae42f18f63dd6d845e33bbcd6d2e2411864456edf445e0b775ba8e076380f91af1fb96dc', 148, 1, 'FundooApp', '[]', 0, '2022-08-12 01:20:04', '2022-08-12 01:20:04', '2023-08-12 06:50:04'),
('484eb6c651a52f1a94fc64beee2c88692d33b06e0deed12514d4303d3d039f0f5889d775684ca67a', 227, 1, 'FundooApp', '[]', 0, '2022-12-21 09:23:49', '2022-12-21 09:23:49', '2023-12-21 14:53:49'),
('48ebd0d6316f99db70ef1c2cab74a7b738d0a441dd068c091d64a5bf5ca8c6e60320f7e18f85ab19', 128, 1, 'FundooApp', '[]', 0, '2022-07-28 23:17:07', '2022-07-28 23:17:07', '2023-07-29 04:47:07'),
('4a961bc5df5f5dc48152791953f8407e98530261774785dbdea7718abc0a3e2713cc64fe8301c618', 144, 1, 'FundooApp', '[]', 0, '2022-08-20 01:02:47', '2022-08-20 01:02:47', '2023-08-20 06:32:47'),
('4b307a062b3774446c2ceec4c8ad006eabbe065bbb31a8cd239142661ecdba8cad0a934f5c5ba7cc', 279, 1, 'FundooApp', '[]', 0, '2022-12-15 13:18:22', '2022-12-15 13:18:22', '2023-12-15 18:48:22'),
('4b37ef30b3be475882276c580c65d4432dff119f12df49e3514cd75b6378eaad76800a0a8553d7e4', 3, 1, 'FundooApp', '[]', 0, '2022-08-19 05:01:30', '2022-08-19 05:01:30', '2023-08-19 10:31:30'),
('4b4c50fee262a599957459c615f3f1cd8b42d52916bb3050d54fdcf316783cd26ef67beeba5284d4', 219, 1, 'FundooApp', '[]', 0, '2022-12-09 07:50:24', '2022-12-09 07:50:24', '2023-12-09 13:20:24'),
('4bd4960be641d25e3992f729ffb9c52a53f93e30f8d9ea37cff85778bfe55fbe9fe497cc89343233', 5, 1, 'FundooApp', '[]', 0, '2022-07-30 01:52:08', '2022-07-30 01:52:08', '2023-07-30 07:22:08'),
('4c9f5bb1054ca31e968cf2e395e2925ad113a1456136dfd783d1acd835c77284168bfccaf5e67dba', 197, 1, 'FundooApp', '[]', 0, '2022-08-24 06:44:06', '2022-08-24 06:44:06', '2023-08-24 12:14:06'),
('4ca9f782a5ac595b82e9b8e0a7bd33cb7134f1fa1209c68537e1c7ce134026d751415e91c061259b', 144, 1, 'FundooApp', '[]', 0, '2022-08-26 01:38:25', '2022-08-26 01:38:25', '2023-08-26 07:08:25'),
('4cece8931e095ee61fd5e85ef9cc286cb8ca09883a083151596b59b78f69beabff76ad00123c75a8', 227, 1, 'FundooApp', '[]', 0, '2022-10-04 00:45:49', '2022-10-04 00:45:49', '2023-10-04 06:15:49'),
('4ced09924756beb146d347864a27ce0203627f876d84ad83433c75ae778d6eea5f3f7abd7e911343', 185, 1, 'FundooApp', '[]', 0, '2022-08-23 04:33:38', '2022-08-23 04:33:38', '2023-08-23 10:03:38'),
('4d231246a2087b53cbd7be71a13367ea62131032c00de140971de78d240d216cee2c23d9b9d5a289', 158, 1, 'FundooApp', '[]', 0, '2022-09-05 05:47:06', '2022-09-05 05:47:06', '2023-09-05 11:17:06'),
('4d87356331d94156b49ea8eec3e91399138f3ceb4d78d45d33e4d641f441fab5a9d856be138fb198', 219, 1, 'FundooApp', '[]', 0, '2022-08-31 01:27:36', '2022-08-31 01:27:36', '2023-08-31 06:57:36'),
('4dfd26a139d7b77f3c4ae223b475edad0988d9578528f4d0c5937ad9661871ac987fdba9078ed56f', 35, 1, 'FundooApp', '[]', 0, '2022-12-10 04:44:44', '2022-12-10 04:44:44', '2023-12-10 10:14:44'),
('4e24636578ae56ff2bb572c543314de95151fdc1c8bb727cc0d4f37e75ccf3de02930aedd15399a5', 117, 1, 'FundooApp', '[]', 0, '2022-07-26 06:29:15', '2022-07-26 06:29:15', '2023-07-26 11:59:15'),
('4e58c39cc36ffe58975e0744862970af20f331df49764f947d8ad925aed628b24510b350f5867c57', 1, 1, 'FundooApp', '[]', 0, '2022-08-29 06:08:04', '2022-08-29 06:08:04', '2023-08-29 11:38:04'),
('4ea6fd02387d6a88cf439fe48f8a74afe7c85e40400a96d26fe84d8813e305542df0fe350d8fcafd', 227, 1, 'FundooApp', '[]', 0, '2022-10-04 00:59:21', '2022-10-04 00:59:21', '2023-10-04 06:29:21'),
('4f31ea03bd61f01d39ff05adc3464850e401d0bb63642fb4aaa1b4162e6805668bea663f73e1ce2a', 227, 1, 'FundooApp', '[]', 0, '2022-11-24 08:16:35', '2022-11-24 08:16:35', '2023-11-24 13:46:35'),
('4f7f9bbf4e2eebf015d60e5196ae28217a83a6f5ba8b5a2687d3ff7b0b48a44e72b1a57ffaa9ecf9', 3, 1, 'FundooApp', '[]', 0, '2022-08-19 04:53:23', '2022-08-19 04:53:23', '2023-08-19 10:23:23'),
('4fbd9b38cace232bfc209dd79ded97b2ed2f4e72db9eb75f143b823f9c79c1f06e0ada6ce286a985', 144, 1, 'FundooApp', '[]', 0, '2022-09-05 05:43:05', '2022-09-05 05:43:05', '2023-09-05 11:13:05'),
('5048519b83253b56bdd18f07d22c1496ef1e0940648945d96d8e0dcda38629c2e1f5f302ecb0b342', 149, 1, 'FundooApp', '[]', 0, '2022-08-12 01:47:19', '2022-08-12 01:47:19', '2023-08-12 07:17:19'),
('51157009f9e2effece64ba101b0a896a4a3ec5882533c9881f8fd9ded7f8adf355f2e15f9b0b5506', 144, 1, 'FundooApp', '[]', 0, '2022-08-15 07:27:07', '2022-08-15 07:27:07', '2023-08-15 12:57:07'),
('5159c99ba8ba881fff24c562dc31469a787621bfe006445c5a27050e55c567f619ae1ea0a1013fc1', 128, 1, 'FundooApp', '[]', 0, '2022-12-05 09:00:18', '2022-12-05 09:00:18', '2023-12-05 14:30:18'),
('518f50f53b7c79b8d36a86a84c1ab99e91bcb9d2b4bb4e554b90f4d61327feeb2ad2143b950b614a', 115, 1, 'FundooApp', '[]', 0, '2022-07-26 06:01:27', '2022-07-26 06:01:27', '2023-07-26 11:31:27'),
('51a3c04193594bb4c7dc58c8b9fc6c1fb57899c46c5d323da1553048af97c68d30ed667bf7f8d75b', 5, 1, 'FundooApp', '[]', 0, '2022-08-02 04:50:51', '2022-08-02 04:50:51', '2023-08-02 10:20:51'),
('532581300f74d7c9cca62755d64782cb3803e34f681f4f156f771ad39ba651d39516f193f18ea4d1', 128, 1, 'FundooApp', '[]', 0, '2022-08-12 01:01:13', '2022-08-12 01:01:13', '2023-08-12 06:31:13'),
('5393b72791eccf558d8397ee6fa273591c5d805ed5c62e82bbca8e2036e0bd9c303d865f3d33d8ca', 1, 1, 'FundooApp', '[]', 0, '2022-07-29 00:06:07', '2022-07-29 00:06:07', '2023-07-29 05:36:07'),
('54f1f6ed0214aa2e082d7f23256fd83194d7bdeb3a7bf76e69a79a9ecf6c973945f54a715f480ad0', 3, 1, 'FundooApp', '[]', 0, '2022-08-19 00:24:52', '2022-08-19 00:24:52', '2023-08-19 05:54:52'),
('54fa7bbcb5595f5a755178e4988ce1082184603e27585d82ee5b9f91296b0666d5cdb7b0c52ad8e2', 279, 1, 'FundooApp', '[]', 0, '2022-12-15 13:27:41', '2022-12-15 13:27:41', '2023-12-15 18:57:41'),
('54fb3e60dc4bdee82eda8de6ca85185cf7a2e7b7e93aa844b3c0340ffaf161f34265411b0ea77c6b', 122, 1, 'FundooApp', '[]', 0, '2022-07-27 23:18:53', '2022-07-27 23:18:53', '2023-07-28 04:48:53'),
('54ffb4b20fb5e5d42d619eba392f71e38b168ae60a5729d862efaa7c89732e562460559606d63e2a', 104, 1, 'FundooApp', '[]', 0, '2022-12-13 07:39:11', '2022-12-13 07:39:11', '2023-12-13 13:09:11'),
('55d819cdf358b0cb7d34c8a5734e18b8eff4d2cd6e6cebcf9c24390e63cc87836b37cb8d7dec111b', 185, 1, 'FundooApp', '[]', 0, '2022-08-23 04:26:36', '2022-08-23 04:26:36', '2023-08-23 09:56:36'),
('56711338c6565f6e998efbafb2fde778f92bc7d383238ff10b6da5a8caa609d5e095e2458fbbe3f8', 144, 1, 'FundooApp', '[]', 0, '2022-08-24 06:19:42', '2022-08-24 06:19:42', '2023-08-24 11:49:42'),
('56d3b0c71853d5d07537f01ff7a5e146c2b47469ae659620ee04108d16455a53908dbf2a21af57cd', 328, 1, 'FundooApp', '[]', 0, '2022-12-21 06:08:08', '2022-12-21 06:08:08', '2023-12-21 11:38:08'),
('57abca604f66e0e3ff0b69c2c49498437c2acc2aa8d7436c3847fb381f3884113420a35987145de8', 128, 1, 'FundooApp', '[]', 0, '2022-08-25 06:17:00', '2022-08-25 06:17:00', '2023-08-25 11:47:00'),
('57ef886c9215bf91febf6d39d3b4f9a246048a05983ed3178b557057ae3b402afc91ea6cd12e7198', 324, 1, 'FundooApp', '[]', 0, '2023-01-02 12:35:50', '2023-01-02 12:35:50', '2024-01-02 18:05:50'),
('5859862a541a49ffb1d6b291df6343a163518b89e966844095ceeb1ab4ad6d231a49160bbae85652', 210, 1, 'FundooApp', '[]', 0, '2022-08-29 00:42:53', '2022-08-29 00:42:53', '2023-08-29 06:12:53'),
('5859c8b060c031181fbf60bd1988c5ab0de8688ac33f144a5fef44bab0d455fa10b7faedf28bdecf', 146, 1, 'FundooApp', '[]', 0, '2022-09-05 05:48:33', '2022-09-05 05:48:33', '2023-09-05 11:18:33'),
('5887abed25c4b580d91ef119aa746ab93b5168d027fefe1189e35a501425c0882ad8c9a15b2ff3f5', 225, 1, 'FundooApp', '[]', 0, '2022-09-02 04:24:27', '2022-09-02 04:24:27', '2023-09-02 09:54:27'),
('594a558c9aa09b0b7a0e9001a18eb31c10015c188daa6100a5f73d30a984a4565edb4117726bfb80', 197, 1, 'FundooApp', '[]', 0, '2022-08-24 06:48:13', '2022-08-24 06:48:13', '2023-08-24 12:18:13'),
('59b0854a1acda9b110058a0c6fe2940bbfe8b487e8bf035de0ef1429eb3637b160a01824c93a761e', 128, 1, 'FundooApp', '[]', 0, '2022-08-03 00:19:28', '2022-08-03 00:19:28', '2023-08-03 05:49:28'),
('5a0a01c4529bee2f74274574a8e413f4df7d1563496550f99f12cf36e089af9d6d308983a6ee8861', 145, 1, 'FundooApp', '[]', 0, '2022-08-10 02:06:35', '2022-08-10 02:06:35', '2023-08-10 07:36:35'),
('5a4a24167a4d6c0d27055adcf4a279d18cdaf911662b29dbe11a2df1d5c1e7b6fdcdb4d4f4c871d0', 219, 1, 'FundooApp', '[]', 0, '2022-12-14 12:59:53', '2022-12-14 12:59:53', '2023-12-14 18:29:53'),
('5ab56dd4793faca39e5936262e9cacfaa50d7e0b2a8afeeb65480dac0a2feca906d1ccd27826f5f0', 101, 1, 'FundooApp', '[]', 0, '2022-11-07 04:13:54', '2022-11-07 04:13:54', '2023-11-07 09:43:54'),
('5ab78099f8ff1f37a33897ef592566b856c5b29c579867f193d09a1d558371d0d3b9697ecd1ff79f', 128, 1, 'FundooApp', '[]', 0, '2022-07-29 00:04:15', '2022-07-29 00:04:15', '2023-07-29 05:34:15'),
('5ae268dac89302e4df8ac5a3be9c5a4a3641a25d31198b6e312a082b39c3d5175a1635690b107c66', 35, 1, 'FundooApp', '[]', 0, '2022-12-09 10:17:23', '2022-12-09 10:17:23', '2023-12-09 15:47:23'),
('5b4af9048ddd34da39a0573c2fb068aa0db3ea435a93d497e659215f51e468586124b02cfb311401', 119, 1, 'FundooApp', '[]', 0, '2022-07-27 01:27:01', '2022-07-27 01:27:01', '2023-07-27 06:57:01'),
('5c2594f935cdea3dae1d79a31e28c4a84e6ed4ae57f3827b5163a17e71b2478e21bd572155ea4af6', 219, 1, 'FundooApp', '[]', 0, '2022-08-30 01:29:28', '2022-08-30 01:29:28', '2023-08-30 06:59:28'),
('5c40c746bdf9734cde808cdb2fcee82b35931a40a40a56d5017982b251ad607cd5d999307150502a', 197, 1, 'FundooApp', '[]', 0, '2022-08-24 08:14:32', '2022-08-24 08:14:32', '2023-08-24 13:44:32'),
('5d6f07c07e040015ad0ecde876750305a145e07f2e31a656f2aadbfe331471b01710c1b068e86b64', 324, 1, 'FundooApp', '[]', 0, '2023-01-04 08:00:56', '2023-01-04 08:00:56', '2024-01-04 13:30:56'),
('5e13746a7b1166b9308a90ab7d5ea55e5b2a59e47eca14b5b95fcdf92d5169d1d674969179fbc52e', 128, 1, 'FundooApp', '[]', 0, '2022-08-12 23:16:58', '2022-08-12 23:16:58', '2023-08-13 04:46:58'),
('5e338fcc86e3c45fc3e657f58a84f62d074bcc20212791487d389a368e6942606b3fe6a9ef2be239', 128, 1, 'FundooApp', '[]', 0, '2022-07-29 00:03:56', '2022-07-29 00:03:56', '2023-07-29 05:33:56'),
('5ebccf2eb30458448f8aa00f7e8cdafd22e8d984add8c29c16043a5913cd86f4bc9d5103c4f3ca57', 194, 1, 'FundooApp', '[]', 0, '2022-08-24 06:33:11', '2022-08-24 06:33:11', '2023-08-24 12:03:11'),
('5f1548628485c82bc03146e91ddbfe599e4bb3423ea20c610f33c58f31736f00d8a5a60cd49c9386', 3, 1, 'FundooApp', '[]', 0, '2022-08-19 05:25:07', '2022-08-19 05:25:07', '2023-08-19 10:55:07'),
('60f3e0d0549fc9d2b3380d386d6d08fcf45ea1e92fb25fd41e8f1dfdd20c5a41df7f127ca6096a4f', 3, 1, 'FundooApp', '[]', 0, '2022-08-19 00:17:19', '2022-08-19 00:17:19', '2023-08-19 05:47:19'),
('613204292e89864cda66a9ba514ad72e7eb751ccf2c13e175c06e710633e7e48b2860c7175e8eb39', 225, 1, 'FundooApp', '[]', 0, '2022-09-05 00:46:53', '2022-09-05 00:46:53', '2023-09-05 06:16:53'),
('6155a77d06bec95d8710d9694b77add91c4c1a2f523ce94093b7e2222dda1694632226fb83cf957d', 128, 1, 'FundooApp', '[]', 0, '2022-11-08 04:04:38', '2022-11-08 04:04:38', '2023-11-08 09:34:38'),
('6340d15c68c6ec8c3d6bcfae87a84d836f2c6800ab9b2edd80f8c60a81bab7a76944bac3d11bce8d', 117, 1, 'FundooApp', '[]', 0, '2022-07-26 06:17:15', '2022-07-26 06:17:15', '2023-07-26 11:47:15'),
('638148b231335d70620740118d99d05428f097588efe0d9a3d33e46826e4eef51f76c49801a8ee5a', 279, 1, 'FundooApp', '[]', 0, '2022-12-21 06:06:16', '2022-12-21 06:06:16', '2023-12-21 11:36:16'),
('639e95b422d7b606301a4186797d6a33075414662510e39caf2f6ebf4f8519d3cbd72f672469cd21', 197, 1, 'FundooApp', '[]', 0, '2022-08-24 06:41:18', '2022-08-24 06:41:18', '2023-08-24 12:11:18'),
('64ea1d1eb0ecf9a685d34d902cd32e159b85cf9a31c39de4e9ef0705130fc2bd5f5ce9672a0b6d94', 3, 1, 'FundooApp', '[]', 0, '2022-08-19 05:15:33', '2022-08-19 05:15:33', '2023-08-19 10:45:33'),
('6530c34a6d2f09fb76504041ecbd4a201b3fabda60806a0b053258789466388f4036b371b009835a', 108, 1, 'FundooApp', '[]', 0, '2022-07-26 04:14:29', '2022-07-26 04:14:29', '2023-07-26 09:44:29'),
('660fd9d6893ed17d1305e154793d69940306191b6611240e0fb20c562e51f14da21dfde6fee28cc4', 197, 1, 'FundooApp', '[]', 0, '2022-08-28 02:15:07', '2022-08-28 02:15:07', '2023-08-28 07:45:07'),
('667d8f91f0f0cf9ffe9cb7a79b7d31056f7e240a33e1a16c538c31cf397fdba6903c3e48c0ecefe8', 158, 1, 'FundooApp', '[]', 0, '2022-09-05 05:42:03', '2022-09-05 05:42:03', '2023-09-05 11:12:03'),
('6735114a2552cc040f58fb619d0c5408ee6f893e7bdcd84e3433ffae71cfed7f6f5340067e0a2d98', 104, 1, 'FundooApp', '[]', 0, '2022-12-13 07:24:05', '2022-12-13 07:24:05', '2023-12-13 12:54:05'),
('674649bc7e18a03ff992f54f287f05da09929c05f54802b179c9d878dae2a5b0e8c082400d32a8f1', 1, 1, 'FundooApp', '[]', 0, '2022-07-27 05:11:34', '2022-07-27 05:11:34', '2023-07-27 10:41:34'),
('67884f982da2799a71b826403a3391bceb137283fcb3925b8ed693d55da5f8aa347c47b331d2361c', 185, 1, 'FundooApp', '[]', 0, '2022-08-23 04:33:48', '2022-08-23 04:33:48', '2023-08-23 10:03:48'),
('683cc7eea70a73a278edaa5dd27faad08b8facdadc2230f358d0d11f071c52a8998535a830e6b60a', 1, 1, 'FundooApp', '[]', 0, '2022-07-27 04:51:30', '2022-07-27 04:51:30', '2023-07-27 10:21:30'),
('68a613f1aabe120bfdc2a35ca194bfb95ad85f05151d862110b0bd8bd73b230469415102065ca0b8', 327, 1, 'FundooApp', '[]', 0, '2023-01-03 11:43:21', '2023-01-03 11:43:21', '2024-01-03 17:13:21'),
('68e1759b38a7a28c17ecb108e338456a6f13f9125cb9f04a1c9a6c3d4327a3b4142e356e3cf97726', 225, 1, 'FundooApp', '[]', 0, '2022-09-03 04:50:43', '2022-09-03 04:50:43', '2023-09-03 10:20:43'),
('69ef7e2f0681e93c54b904792cff310bd0d2ce70efb4bea537d5c964846203f2e54ba469be43cde1', 102, 1, 'FundooApp', '[]', 0, '2022-09-27 02:23:03', '2022-09-27 02:23:03', '2023-09-27 07:53:03'),
('6a1b6a539e16948c9956ef0f5b7a7042c45514f72ee3b1ee9a25cfa795bb0ba22fdaa8f53a41ce9b', 128, 1, 'FundooApp', '[]', 0, '2022-07-29 00:04:01', '2022-07-29 00:04:01', '2023-07-29 05:34:01'),
('6b70478b999b3056f83f4c9b02015955badb08596dbeaccbf54c68fee99b8fb098f5fe81f8a3a7cc', 128, 1, 'FundooApp', '[]', 0, '2022-07-28 06:54:35', '2022-07-28 06:54:35', '2023-07-28 12:24:35'),
('6c6c57989fe403b6c0c95d5ad9796b7e12ec902a41bebdbfd1b58e6f2fb4ae191d29468a7c3faa4c', 192, 1, 'FundooApp', '[]', 0, '2022-10-04 00:48:05', '2022-10-04 00:48:05', '2023-10-04 06:18:05'),
('6ca36dfd9b401fb78ea7ad95bfcfa16aa2421a87319ccdfa1af6889d4c399ec5237a53ad58358eb7', 16, 1, 'FundooApp', '[]', 0, '2022-11-17 23:54:26', '2022-11-17 23:54:26', '2023-11-18 05:24:26'),
('6e73c4886013fac08c831d12dd6e265645c37d3659610df174fa6b2db4bfe06ac55e4ce68a58eee2', 197, 1, 'FundooApp', '[]', 0, '2022-08-24 07:45:25', '2022-08-24 07:45:25', '2023-08-24 13:15:25'),
('6eb8b107c8499a8f77ed891b7836c3344998a8d8f9c53101057b884acafcbad5796e91fbf7261f07', 125, 1, 'FundooApp', '[]', 0, '2022-07-28 01:09:46', '2022-07-28 01:09:46', '2023-07-28 06:39:46'),
('6fabf55b3072de7c3777c7297542264028d952dfc130ecfa9295d7f06e88af864e1e36ca0097944e', 1, 1, 'FundooApp', '[]', 0, '2022-07-26 03:55:14', '2022-07-26 03:55:14', '2023-07-26 09:25:14'),
('6fe4e8deaf5a108972e25ce11daae40cd60d972a5a8d17ada6d8a9e0b45c8a0f55b70f4a63b146a1', 122, 1, 'FundooApp', '[]', 0, '2022-07-27 02:21:32', '2022-07-27 02:21:32', '2023-07-27 07:51:32'),
('6fe8f74fab85ce6e1f46b05114d029070f5e311f07df18ba861bab9ea1c7d620e56a11f083894a90', 144, 1, 'FundooApp', '[]', 0, '2022-09-05 05:44:21', '2022-09-05 05:44:21', '2023-09-05 11:14:21'),
('7107e69198e57ad7950ca0b1f31c2f175c3d52830a2f12252f34e77c7280e02593298b378632492e', 328, 1, 'FundooApp', '[]', 0, '2023-01-02 11:17:56', '2023-01-02 11:17:56', '2024-01-02 16:47:56'),
('7191cd38d97bed6964eb2ecc19097e6f4b3a3d1637405a44b2caefe2d180b5b38c6fff40cf747167', 128, 1, 'FundooApp', '[]', 0, '2022-07-28 06:53:18', '2022-07-28 06:53:18', '2023-07-28 12:23:18'),
('72080c76223a7594ccfc5df37b4f67016c083a630f89d9d30efb2bdd19df4dcec98ddaa031af2349', 1, 1, 'FundooApp', '[]', 0, '2022-07-27 04:54:21', '2022-07-27 04:54:21', '2023-07-27 10:24:21'),
('727e48f949fa24e407fe359cd31669e6190fcb06b4d5f91812d800407dbb07c27abd059a4906ddac', 324, 1, 'FundooApp', '[]', 0, '2023-01-02 12:37:02', '2023-01-02 12:37:02', '2024-01-02 18:07:02'),
('72f72ab9b2db2317bc170adbc5c519554b90591ed4831a796ceb57d05dd4831122cf997e5eaec6c9', 194, 1, 'FundooApp', '[]', 0, '2022-08-24 06:27:49', '2022-08-24 06:27:49', '2023-08-24 11:57:49'),
('73acff63c1f281eea78dc83c0bbede8c08700ca3fd907e33a33e704b8051446c7911fd9742016c94', 1, 1, 'FundooApp', '[]', 0, '2022-07-27 05:02:40', '2022-07-27 05:02:40', '2023-07-27 10:32:40'),
('741e06ae77719bed45288d3eadbd848f360f1558a3b32d430d600ccab20b1c9392bc7b5c6d74cda3', 324, 1, 'FundooApp', '[]', 0, '2023-01-03 11:26:20', '2023-01-03 11:26:20', '2024-01-03 16:56:20'),
('748010f8b1b68d1cc68c477ee82bf694d6170197086dff286faceffe346b7a56299eed9b4fd293e9', 128, 1, 'FundooApp', '[]', 0, '2022-08-10 02:00:03', '2022-08-10 02:00:03', '2023-08-10 07:30:03'),
('750cf1714732e8f3b5907241276e6aef7d761529fac5679854d4628fef87c15dfa514a3def7efb5c', 149, 1, 'FundooApp', '[]', 0, '2022-08-12 01:24:11', '2022-08-12 01:24:11', '2023-08-12 06:54:11'),
('7626f9c26d11321f9b492671e010e20dfd2bc5ae300a2e1b1160f52892017c8cf40be5d6684470cd', 219, 1, 'FundooApp', '[]', 0, '2022-12-15 13:10:44', '2022-12-15 13:10:44', '2023-12-15 18:40:44'),
('77826debb5a87d39f02504e475249712abaca8f4ab6c27a249ead6a3bb561271f2ceaa291054fd2f', 128, 1, 'FundooApp', '[]', 0, '2022-11-25 07:58:04', '2022-11-25 07:58:04', '2023-11-25 13:28:04'),
('77bef8e9b6efd6438c6b918a86289fd7322adef3e5b34b35204e6a4b953f599c99633005484423f4', 128, 1, 'FundooApp', '[]', 0, '2022-08-02 00:31:48', '2022-08-02 00:31:48', '2023-08-02 06:01:48'),
('7829668113575022cce0f74f80c75dd7bf62dc02db2d4251533023457fc531a80eb5f4b166313879', 225, 1, 'FundooApp', '[]', 0, '2022-09-30 00:13:31', '2022-09-30 00:13:31', '2023-09-30 05:43:31'),
('78a6de60edeb3eb7e257e3afa72eced9e691c9daf549f0efea81fa4c35e02efdd2cb7e1aa434be1a', 144, 1, 'FundooApp', '[]', 0, '2022-08-22 06:30:20', '2022-08-22 06:30:20', '2023-08-22 12:00:20'),
('791f1d42d72b638c058ced6e59f1cb9b169f6480da8712ba6c58aca181c0dcdc1094ba77a949d585', 128, 1, 'FundooApp', '[]', 0, '2022-07-29 00:04:05', '2022-07-29 00:04:05', '2023-07-29 05:34:05'),
('7974ec109dcdb6465a1c4795b532b5af51b72035f0675a3064616b300520a348e17e43a97baae19a', 144, 1, 'FundooApp', '[]', 0, '2022-08-09 02:07:47', '2022-08-09 02:07:47', '2023-08-09 07:37:47'),
('7b13de069fb0195c81012ef83a91a448125e0c02c33b15ee4882570d1eb27d64ccad3160284d187a', 117, 1, 'FundooApp', '[]', 0, '2022-07-26 06:29:51', '2022-07-26 06:29:51', '2023-07-26 11:59:51'),
('7b3b98eee6dfb4e4f294c9b5a9451af21786ca68a23c37263a22990195dcda4f6710dfbefb19e78f', 225, 1, 'FundooApp', '[]', 0, '2022-09-03 04:28:45', '2022-09-03 04:28:45', '2023-09-03 09:58:45'),
('7b3c261aa70265296b30a599a5466231fb716ee154a65c39797df83200292a47a448ae3c4c7d7fb3', 3, 1, 'FundooApp', '[]', 0, '2022-08-18 23:53:04', '2022-08-18 23:53:04', '2023-08-19 05:23:04'),
('7c065dfc3383a3aa7f0b12316e7c6c6e4e031d82a3eb67ea46c9c014407b9a61e917fd4800e192a1', 197, 1, 'FundooApp', '[]', 0, '2022-08-29 08:26:53', '2022-08-29 08:26:53', '2023-08-29 13:56:53'),
('7e316312861a3f27da7794827f86d9215ec3daf6bef5f942882a848a29f95a19a6d4a955ca2b12a6', 122, 1, 'FundooApp', '[]', 0, '2022-07-27 07:11:58', '2022-07-27 07:11:58', '2023-07-27 12:41:58'),
('7e3caf6e818ab3e45966e9cc31b7e7a319599bd71c604b467835b7187560ecc7a9d814e90c581ce2', 219, 1, 'FundooApp', '[]', 0, '2022-12-13 06:59:21', '2022-12-13 06:59:21', '2023-12-13 12:29:21'),
('7eb4462dc79111b54bceb2e37b7c7f0e40d1f508047ae0a41dc50ed7ec37ad6ba3882a462ee06dba', 1, 1, 'FundooApp', '[]', 0, '2022-07-27 04:59:56', '2022-07-27 04:59:56', '2023-07-27 10:29:56'),
('7eb9ed5c96fe8c92876b59ea823c696090c8813e58839469b3d5062ac842dff15dedd21f3fd26a31', 144, 1, 'FundooApp', '[]', 0, '2022-08-09 02:08:40', '2022-08-09 02:08:40', '2023-08-09 07:38:40'),
('7f37598861d98bdd86e093c59565928af6ca943d49e698a1e562e50df003ab9e48337d7e4910f343', 315, 1, 'FundooApp', '[]', 0, '2022-11-08 03:53:19', '2022-11-08 03:53:19', '2023-11-08 09:23:19'),
('7f942e3ce505866d29576dbfe02477ca0144305b12f76fd1d6a5e42967874213ea14efa74f56ccde', 1, 1, 'FundooApp', '[]', 0, '2022-07-27 05:02:39', '2022-07-27 05:02:39', '2023-07-27 10:32:39'),
('80879810d5c200e9b96afa9e09bb90c32f3d6a77c864832945134c0fccb319d9bc17ec1559d1bd3f', 316, 1, 'FundooApp', '[]', 0, '2022-11-07 05:29:15', '2022-11-07 05:29:15', '2023-11-07 10:59:15'),
('80f3b253fe728ecee1a24d043530a69d57794a68a7248955d0cc7c0a863734c01df494219ce55235', 144, 1, 'FundooApp', '[]', 0, '2022-08-09 02:08:50', '2022-08-09 02:08:50', '2023-08-09 07:38:50'),
('81db434bf56a8bd15975b26946df32b100876b90346a4403d4df33995fca99b51c6e9e3464d4ce22', 35, 1, 'FundooApp', '[]', 0, '2022-12-21 06:58:40', '2022-12-21 06:58:40', '2023-12-21 12:28:40'),
('8287943f62412c7b8d95987c5b2e14f6a8bdc0b61d594adda6b6edc8fecf5109439911b4f5c69ab8', 144, 1, 'FundooApp', '[]', 0, '2022-08-19 00:30:22', '2022-08-19 00:30:22', '2023-08-19 06:00:22'),
('82e9695e3ca8b33ab99a6cfa78315d2676aa9d07efc331e4654774478faf522f0b628f22707c3de9', 102, 1, 'FundooApp', '[]', 0, '2022-09-16 04:26:57', '2022-09-16 04:26:57', '2023-09-16 09:56:57'),
('832b402935a411fe25a94a0b7694cc53b3b23e25f90f07939929c01205939f0b1e68e669492b61dd', 35, 1, 'FundooApp', '[]', 0, '2022-12-10 04:43:22', '2022-12-10 04:43:22', '2023-12-10 10:13:22'),
('83a9843dc3ad640d34e9636281c6755fb204b19bd9db50d5b3def883c4e3de5403de24611b421169', 194, 1, 'FundooApp', '[]', 0, '2022-08-24 06:15:44', '2022-08-24 06:15:44', '2023-08-24 11:45:44'),
('83ad60053fd47500c3f341afb150f800b12874074effc84082072a58cdbed1c3f020aface4739e7d', 104, 1, 'FundooApp', '[]', 0, '2022-11-22 07:33:31', '2022-11-22 07:33:31', '2023-11-22 13:03:31'),
('842217bbe0ea1e2f99227c9c610e4d7c2f215421fde0ab91aeee89566314ea4451e822edb84d040f', 145, 1, 'FundooApp', '[]', 1, '2022-08-10 02:09:19', '2022-08-10 02:09:19', '2023-08-10 07:39:19'),
('84bc62330af3e99098140e918b6b1e8dc76fb102a6a6c583e6f2ff006a4501f983233d1a744749fb', 197, 1, 'FundooApp', '[]', 0, '2022-08-24 08:15:25', '2022-08-24 08:15:25', '2023-08-24 13:45:25'),
('84d9a7b6b356485e3831e1d356104e6c3f40da5dfdfdcc0f89400d54d02fe43b077642e76a5c5b0b', 197, 1, 'FundooApp', '[]', 0, '2022-08-24 06:44:24', '2022-08-24 06:44:24', '2023-08-24 12:14:24'),
('860fa45d6ef88098f3cc922fbc3387a36cabdcb031a1d760f540ad45d99551e2fb354035cc9e9b4e', 128, 1, 'FundooApp', '[]', 0, '2022-08-25 08:01:48', '2022-08-25 08:01:48', '2023-08-25 13:31:48'),
('86d69abf0d44cdfceb06a940f67db1ceb3624d93385129b4742cc556c892523388fb9724ec17cc49', 113, 1, 'FundooApp', '[]', 0, '2022-07-26 05:54:56', '2022-07-26 05:54:56', '2023-07-26 11:24:56'),
('876d4174e510d4ccf3098a34789b79c2e43d2ae224dc86089b7d43f5d49071b6221ec7e386d6dec2', 1, 1, 'FundooApp', '[]', 0, '2022-07-27 04:19:03', '2022-07-27 04:19:03', '2023-07-27 09:49:03'),
('87cff1a886935e7e95207af8178c0e4f3795dce1090a3c57edee5a9b9143fb222607236d8eb83f27', 225, 1, 'FundooApp', '[]', 0, '2022-09-29 23:09:08', '2022-09-29 23:09:08', '2023-09-30 04:39:08'),
('88f182e8f92e40c01b740e4a78d4103a14e930bbcc833aeee72febf990a08a00ce1e3fe6f34a8e0a', 144, 1, 'FundooApp', '[]', 0, '2022-08-15 02:36:08', '2022-08-15 02:36:08', '2023-08-15 08:06:08'),
('895e687b4c7071e8f4f0c842c15ce25534a3ab3831f087d7872ef2f2f28303d9763720e837f1b838', 225, 1, 'FundooApp', '[]', 0, '2022-09-02 02:08:53', '2022-09-02 02:08:53', '2023-09-02 07:38:53'),
('89931d0d87da6c67329bf05243fc7d65a1ea4cb823c2d747f525fff094996a363f046c88009feca0', 279, 1, 'FundooApp', '[]', 0, '2022-12-13 07:00:36', '2022-12-13 07:00:36', '2023-12-13 12:30:36'),
('89c0e30cd1231de6c2ed2f0c0735ff77bfca16337cae3605636eca5405a4bc8581677bef5e19cdd1', 1, 1, 'FundooApp', '[]', 0, '2022-07-27 05:04:08', '2022-07-27 05:04:08', '2023-07-27 10:34:08'),
('8a3ecc81ad2ccd6d06ef1fb317ef13c2bef9d4633509eb8a3e1c8499ed1b0e5f1f0df7a0013b816b', 197, 1, 'FundooApp', '[]', 0, '2022-08-24 06:42:35', '2022-08-24 06:42:35', '2023-08-24 12:12:35'),
('8af7458aa66f76bdbf624b6e58fd7e1676fa2f32614c60d3497844ad90fb5c12f60b3f319d7cb4e7', 128, 1, 'FundooApp', '[]', 0, '2022-09-29 01:20:36', '2022-09-29 01:20:36', '2023-09-29 06:50:36'),
('8b2afe0c9e76df1284a12f50247bdbb7ca9fe56a8c128069051aaf4375e2c4476d74597fe27a2f19', 158, 1, 'FundooApp', '[]', 0, '2022-09-05 05:44:29', '2022-09-05 05:44:29', '2023-09-05 11:14:29'),
('8b56cbba4959080317de4a11595c09987f53aba74d44fbb773f5705cdf6a9a8d1bbe0c7fa13ebd99', 1, 1, 'FundooApp', '[]', 0, '2022-07-27 04:14:32', '2022-07-27 04:14:32', '2023-07-27 09:44:32'),
('8cbdd7694e62f46aa80b2312543200a36455efa4f3a78c07f33e949e36263e45a8672128507c7939', 129, 1, 'FundooApp', '[]', 0, '2022-07-28 23:55:21', '2022-07-28 23:55:21', '2023-07-29 05:25:21'),
('8cdef9d94666ff43872260eebe78532dcc722786e29587db987fd83e2f370d8e995731d9d7259fe9', 122, 1, 'FundooApp', '[]', 1, '2022-07-27 22:44:43', '2022-07-27 22:44:43', '2023-07-28 04:14:43'),
('8d0405f8fe4149cbf862caf26ceb1bcf6baafbe9bc99e3725e7e0b538a36f026cb8bb57ebf46bb20', 144, 1, 'FundooApp', '[]', 0, '2022-08-22 06:30:55', '2022-08-22 06:30:55', '2023-08-22 12:00:55'),
('8d12bc3e415b30b8d2705f5513fbaab16a285c46010f717cd142011280a6a4fd61a27830c9118fcd', 144, 1, 'FundooApp', '[]', 0, '2022-08-22 06:30:56', '2022-08-22 06:30:56', '2023-08-22 12:00:56'),
('8edaa33a1306e8d6c9a4e4c4b4547959644f3cd6155f5e3355d9ab1ffea60477c3f47baabb8954e6', 123, 1, 'FundooApp', '[]', 0, '2022-07-28 01:04:22', '2022-07-28 01:04:22', '2023-07-28 06:34:22'),
('8f3dc86fd99bec53b9024b9d6952d8fe8f5ebc055badb44c96353654eb72be04e36e0d95774a8dc4', 228, 1, 'FundooApp', '[]', 0, '2022-09-10 01:45:22', '2022-09-10 01:45:22', '2023-09-10 07:15:22'),
('8f76c429c7152a3c9c2d170db402e188f7ff90f5a4713bf7e81e46ad81bbb27abae0714341506ef7', 144, 1, 'FundooApp', '[]', 0, '2022-09-20 01:20:09', '2022-09-20 01:20:09', '2023-09-20 06:50:09'),
('90394d8145b83044a262028779c998a367129843dcdbad1bff2e9442510a0fea86f75a7f88b4d47a', 1, 1, 'FundooApp', '[]', 0, '2022-07-28 04:35:22', '2022-07-28 04:35:22', '2023-07-28 10:05:22'),
('90a92a101d0d8c6d22543feb0d8c91e19f3e7ffce321655b6a2999854dfbd9babbd311f9b5ca3763', 1, 1, 'FundooApp', '[]', 0, '2022-07-28 05:03:00', '2022-07-28 05:03:00', '2023-07-28 10:33:00'),
('91295083f094d1cdf974be99dc171493565d65b676ed77ea561ed60dfb4bf5361f8c1ba391d2bbe3', 194, 1, 'FundooApp', '[]', 0, '2022-08-24 06:33:11', '2022-08-24 06:33:11', '2023-08-24 12:03:11'),
('9159865ed092a6db74d6ed7b2f101aa88e2e32bc7dd38e421ea20870d742bc439105d627b0556022', 128, 1, 'FundooApp', '[]', 0, '2022-07-28 06:51:31', '2022-07-28 06:51:31', '2023-07-28 12:21:31'),
('918de02e270fa9a05a11fec57004b6a487bdfe566e7bbf836c5bc5f36fed5577881138e21219c42d', 128, 1, 'FundooApp', '[]', 0, '2022-08-10 01:09:44', '2022-08-10 01:09:44', '2023-08-10 06:39:44'),
('91dc491d6048a9020c76157df70fba1e6ac1a21c1b65618fdfc093fc6ec03677f0c7c09705e91acd', 209, 1, 'FundooApp', '[]', 0, '2022-08-26 07:22:07', '2022-08-26 07:22:07', '2023-08-26 12:52:07'),
('932f90e1fdf7d9b6c35bf1964ebd5a56cab8afc5d5a917719484b2cd32a1d2cc322cab1230fa4b59', 1, 1, 'FundooApp', '[]', 0, '2022-07-27 05:12:08', '2022-07-27 05:12:08', '2023-07-27 10:42:08'),
('9398eaeb128e6219d91a1f785bb5920416de23562e6165f0a22b6798a96cdc0da3bdac8cf1c1ce22', 1, 1, 'FundooApp', '[]', 0, '2022-07-27 05:06:30', '2022-07-27 05:06:30', '2023-07-27 10:36:30'),
('949bb2e069836ed221ee5f5860b87fb403433d983551269b99be12cca364461dbb3adf81133aa785', 327, 1, 'FundooApp', '[]', 0, '2023-01-04 04:30:23', '2023-01-04 04:30:23', '2024-01-04 10:00:23'),
('956376ce67397610a310ca5f17dc0b8a9eeb301335a4707d6d112431758c58923f4a7979af0c523d', 1, 1, 'FundooApp', '[]', 0, '2022-07-27 04:43:26', '2022-07-27 04:43:26', '2023-07-27 10:13:26'),
('95b903c38d12646e9e75ccd81587e2c9b426dd58f830105382ac9e2c76eb72952333c614d9ac6952', 197, 1, 'FundooApp', '[]', 0, '2022-08-24 06:42:13', '2022-08-24 06:42:13', '2023-08-24 12:12:13'),
('9651a7483955735b14c63031cea828e3c99a435a752089d21fb40ebe7051b0ca1a5b39036a077328', 3, 1, 'FundooApp', '[]', 0, '2022-07-29 07:13:23', '2022-07-29 07:13:23', '2023-07-29 12:43:23'),
('973ee717b8d6a7da41e06f3ccc6b68811ec29fa4d33c8aac9a780ee9e12c5d1a3c066b45f792eda1', 219, 1, 'FundooApp', '[]', 0, '2022-11-30 10:24:52', '2022-11-30 10:24:52', '2023-11-30 15:54:52'),
('9757f1f4d6949b9ceb8a2dd2a1984b31c56d0ccdeebe1c8ff54fb6d8079a485982869057d7b9ae01', 328, 1, 'FundooApp', '[]', 0, '2022-12-28 07:31:18', '2022-12-28 07:31:18', '2023-12-28 13:01:18'),
('97714ff75817f37b072b7207981844b5f21685497e4712b064275aeafc4d48d341030db727a7424e', 141, 1, 'FundooApp', '[]', 0, '2022-08-29 00:17:20', '2022-08-29 00:17:20', '2023-08-29 05:47:20'),
('979990fe3e8cc153a9982792f84dd450fd20456de010239df9f37f104e32074494604cff2c81ec69', 185, 1, 'FundooApp', '[]', 0, '2022-08-23 04:27:58', '2022-08-23 04:27:58', '2023-08-23 09:57:58'),
('97b10d1a32b31aff605588cb6ba66e397ab376413d9200833dc974e9c59c6843c1b4233187fbfc97', 3, 1, 'FundooApp', '[]', 0, '2022-07-29 06:26:44', '2022-07-29 06:26:44', '2023-07-29 11:56:44'),
('97e7ff38a0b1def9d371d697c747d6ad032e03468e300e6d536e3de9934ab5305d8f4b7044964aeb', 204, 1, 'FundooApp', '[]', 0, '2022-08-25 05:59:25', '2022-08-25 05:59:25', '2023-08-25 11:29:25'),
('98273404b2cb30f3989498ab13311af5b8ecdd4c08636dfcfd890ec5790286a1a225ea7cbb22204a', 227, 1, 'FundooApp', '[]', 0, '2022-12-21 07:00:09', '2022-12-21 07:00:09', '2023-12-21 12:30:09'),
('9880699e3d0c90f3d9fb5ade0f01c47b12e60637bb946f2f0e3980aae260da960c908680ddbb7130', 1, 1, 'FundooApp', '[]', 0, '2022-07-27 05:06:28', '2022-07-27 05:06:28', '2023-07-27 10:36:28'),
('98ba4dd410cfa3affd5d8f477799333c821827882b034b5dcf45d30ec2c5b8509ac71a025b4a7852', 146, 1, 'FundooApp', '[]', 0, '2022-09-16 23:58:35', '2022-09-16 23:58:35', '2023-09-17 05:28:35'),
('9a1a2126768722d2d187988b464ccad3985185dd69e7646607ff0b03db6d4cc044ca7095e4c032e5', 204, 1, 'FundooApp', '[]', 0, '2022-08-25 05:53:38', '2022-08-25 05:53:38', '2023-08-25 11:23:38'),
('9ad95b28becddc3598f136933f4e140846930ef71906037d5431a6021f91ba944af85ae9ea7e763f', 203, 1, 'FundooApp', '[]', 0, '2022-08-25 06:34:53', '2022-08-25 06:34:53', '2023-08-25 12:04:53'),
('9b916b5bf4f2a7a9a3aecc2c8354829010b23c174e94456a98beb69a43b855449b454ed591ec53ff', 185, 1, 'FundooApp', '[]', 0, '2022-08-23 04:54:09', '2022-08-23 04:54:09', '2023-08-23 10:24:09'),
('9b975448705de7cd030931d1ab874fd624670b63282e22582e21edf983f1b88157dc3122033e5c0a', 128, 1, 'FundooApp', '[]', 0, '2022-07-28 05:08:32', '2022-07-28 05:08:32', '2023-07-28 10:38:32');
INSERT INTO `oauth_access_tokens` (`id`, `user_id`, `client_id`, `name`, `scopes`, `revoked`, `created_at`, `updated_at`, `expires_at`) VALUES
('9bc3fd4468bfef9f8b90ab36c89cd49f717de664d09aa68727801fe4451db805b7bc083da87e225a', 324, 1, 'FundooApp', '[]', 0, '2023-01-06 12:16:18', '2023-01-06 12:16:18', '2024-01-06 17:46:18'),
('9c9a024b01e7ec9092b37f1ceb87b93d2379beb1253268e1c3e9d14a724d391e7b9c62e9615c6cf7', 101, 1, 'FundooApp', '[]', 0, '2022-11-09 01:11:06', '2022-11-09 01:11:06', '2023-11-09 06:41:06'),
('9dda2b1b8fd21fa47252bf138584be7974d20e1169e75a349e0237480675336874b814f8397ad8d3', 3, 1, 'FundooApp', '[]', 0, '2022-08-20 00:25:21', '2022-08-20 00:25:21', '2023-08-20 05:55:21'),
('9df0cad3c903e5ca7740ec97813368badc637d69c10596b12272e4bf29826fd6b1588fa24a32a59b', 1, 1, 'FundooApp', '[]', 0, '2022-07-27 04:49:30', '2022-07-27 04:49:30', '2023-07-27 10:19:30'),
('9f4eafb71283d532f42a4d9fe36dfff0d0d06af69f5646197e3076321140db1eeab8dacbb46c41e5', 219, 1, 'FundooApp', '[]', 0, '2022-12-14 11:31:24', '2022-12-14 11:31:24', '2023-12-14 17:01:24'),
('a02c17bdc32292841b7b3fee2ccad48b37c91ebaf2df93972031b46d7f3f1b54100528aee88618ce', 144, 1, 'FundooApp', '[]', 0, '2022-09-26 06:08:55', '2022-09-26 06:08:55', '2023-09-26 11:38:55'),
('a138824d143e948543888895869795bcec78d8f51300f8b87e4870723a390e8a4b4d05aec4d867a3', 128, 1, 'FundooApp', '[]', 0, '2022-12-14 12:59:04', '2022-12-14 12:59:04', '2023-12-14 18:29:04'),
('a14253f8989dbe18b060de8961e53f7b14fc5ace0bf9b0f0183480e9f2e4da45aca16a3e7468f1ea', 128, 1, 'FundooApp', '[]', 0, '2022-08-09 02:01:27', '2022-08-09 02:01:27', '2023-08-09 07:31:27'),
('a2ed431d675f3b4c5ba3b5efc7d12540e032f4cc2a0ff1adde60444834b0171a8972c4986bbd730e', 1, 1, 'FundooApp', '[]', 0, '2022-07-27 04:53:59', '2022-07-27 04:53:59', '2023-07-27 10:23:59'),
('a32f56a032c0ca15d41de8320de62d70ff0899d8290aff6f963629094bca984e4d0855ec89401b64', 1, 1, 'FundooApp', '[]', 0, '2022-07-27 05:00:58', '2022-07-27 05:00:58', '2023-07-27 10:30:58'),
('a3464779a2f0dc2103e0889f3606471d643e033d79d2e140980275ab2dd6331ab94b02ccf34d64fe', 128, 1, 'FundooApp', '[]', 0, '2022-07-28 06:48:57', '2022-07-28 06:48:57', '2023-07-28 12:18:57'),
('a380c87b30115f60769741406eb5d6ea40a9073807bed1c583e96ffd95141518137ee565204e7bb3', 150, 1, 'FundooApp', '[]', 0, '2022-08-12 02:43:06', '2022-08-12 02:43:06', '2023-08-12 08:13:06'),
('a392c56f857fcb117241553641e13519e3080e6f5576c3dcc44b3da1e8d520f3a8e404b294ddf0fb', 128, 1, 'FundooApp', '[]', 0, '2022-07-28 06:52:41', '2022-07-28 06:52:41', '2023-07-28 12:22:41'),
('a4e0dc614132f3e1538b1bf9552c60b2526b3c5bf90f02d4ad3f11c03f9687190fe518eb3353061b', 204, 1, 'FundooApp', '[]', 0, '2022-08-25 05:59:43', '2022-08-25 05:59:43', '2023-08-25 11:29:43'),
('a551a583ccd688ec266d0ca368ce425bb03be53f37c94576629c6430fdf62a1b96f4edc9f781e42c', 128, 1, 'FundooApp', '[]', 0, '2022-12-15 06:37:59', '2022-12-15 06:37:59', '2023-12-15 12:07:59'),
('a561694e2b9a1825285d9e352f5831569a1220cc6632a1a6f53f0de0b69abdf059fba09d50df7338', 328, 1, 'FundooApp', '[]', 0, '2022-12-22 11:49:57', '2022-12-22 11:49:57', '2023-12-22 17:19:57'),
('a563616164136945f1a27b81f0a03e3ff6560ba5eb56dcbc2d2f99d514ed2e5c895b003b8e04624e', 1, 1, 'FundooApp', '[]', 0, '2022-07-28 02:59:04', '2022-07-28 02:59:04', '2023-07-28 08:29:04'),
('a67c11c429b88f4da0be8772ba87a420eea7043299d11a7f48200836adbd62679446735218748453', 3, 1, 'FundooApp', '[]', 0, '2022-08-19 05:00:38', '2022-08-19 05:00:38', '2023-08-19 10:30:38'),
('a70f3f465ee454ebb7db396b90b98247e6ab48675951faa7ce019001109626f398c6851cf822c215', 185, 1, 'FundooApp', '[]', 0, '2022-08-23 04:53:47', '2022-08-23 04:53:47', '2023-08-23 10:23:47'),
('a7d19592d299f2808adba7c9e7278961a5f5357ae1edd6ddfef945dadd8b2a04255c3f8dabefe83f', 144, 1, 'FundooApp', '[]', 1, '2022-08-09 02:10:10', '2022-08-09 02:10:10', '2023-08-09 07:40:10'),
('a856b0f0dd74d2291f359b89f23c143aa5edc25c23aa2199ded018c7a6db15a0190f14a029211851', 158, 1, 'FundooApp', '[]', 0, '2022-09-05 05:45:32', '2022-09-05 05:45:32', '2023-09-05 11:15:32'),
('a8dbbd1a8ff1d7606a3df989f149ed7a3f58d58227935d191c704d822d2ae9a1def5a81a40c5aecd', 128, 1, 'FundooApp', '[]', 0, '2022-08-12 04:00:31', '2022-08-12 04:00:31', '2023-08-12 09:30:31'),
('aa5d609ca3d555562a73ca0dd07dcedcb5c7ce64fdca0cf99cb49f4c0844784a22bf5969f5e13dd0', 121, 1, 'FundooApp', '[]', 0, '2022-07-27 01:44:51', '2022-07-27 01:44:51', '2023-07-27 07:14:51'),
('ab8c4cfa001459bb9dae6b81f146dd0edcb7b7aedb6d887986189c01452ba3d48a0441fcbb6cfb3d', 128, 1, 'FundooApp', '[]', 0, '2022-08-25 07:45:11', '2022-08-25 07:45:11', '2023-08-25 13:15:11'),
('ac3f0792d0fdf8eb5ee8475a3b769370f20d0c402d2a01062517a06d73463586bc8873281b789d97', 150, 1, 'FundooApp', '[]', 0, '2022-12-15 13:23:06', '2022-12-15 13:23:06', '2023-12-15 18:53:06'),
('ae7f510c0926182319ba3c1b5b1d2885a9657b1fe411f52bb202fee296fd7320fbf2c12a8c34678b', 219, 1, 'FundooApp', '[]', 0, '2022-12-13 10:48:55', '2022-12-13 10:48:55', '2023-12-13 16:18:55'),
('ae80d3ac68ed0473239a9667e994bf842b09c7be8006609d67dd4f4d25477723a4b2612d0e78d90e', 219, 1, 'FundooApp', '[]', 0, '2022-12-14 10:37:41', '2022-12-14 10:37:41', '2023-12-14 16:07:41'),
('ae8b0f9d7c7b9a4e7fd04c3aabe6974e5c11327947ea5c49b256f72582cdf60d05bbcf2ff3c93c61', 128, 1, 'FundooApp', '[]', 0, '2022-08-10 00:54:34', '2022-08-10 00:54:34', '2023-08-10 06:24:34'),
('aec80f787b6e74b8f86ac4270cad8c37fa54c26dde548eac7e8e395b97a6532a5173dc52ef4b4378', 144, 1, 'FundooApp', '[]', 0, '2022-09-29 23:20:47', '2022-09-29 23:20:47', '2023-09-30 04:50:47'),
('aef65dedf412d00a74a297f0646f6c1c1b6f380e5cc7a32ca25a3c5062262e96abc9d541661fe7ff', 104, 1, 'FundooApp', '[]', 0, '2022-11-30 12:43:08', '2022-11-30 12:43:08', '2023-11-30 18:13:08'),
('b2779ff835a6f59a46cf5b9c7e569a69df2da4edae17147f0042cce370d2bc1b3c2d3bf17cd3f753', 197, 1, 'FundooApp', '[]', 0, '2022-08-26 04:38:51', '2022-08-26 04:38:51', '2023-08-26 10:08:51'),
('b3275491a3252ecaf9c0f61e0213eef793fcec0864544ea903c5620ddc9c75e98de5374481834278', 3, 1, 'FundooApp', '[]', 0, '2022-08-19 00:24:34', '2022-08-19 00:24:34', '2023-08-19 05:54:34'),
('b34bed95a458c5ce605cda67b62dd7e3ca863ceab292ac39f774534d6480dc1d8c22a1440a772a2f', 122, 1, 'FundooApp', '[]', 0, '2022-07-27 23:19:19', '2022-07-27 23:19:19', '2023-07-28 04:49:19'),
('b363f2da33f0e132841cdbe995240d32ed7333fbea46f1dbdd8f8ddedf08c9a37ce72b95a489ab3c', 279, 1, 'FundooApp', '[]', 0, '2022-12-15 13:21:17', '2022-12-15 13:21:17', '2023-12-15 18:51:17'),
('b388820cac0e5734d07330907d10f29da5d2cb57e4b732959cbddf627f7f84d162956cf330f5ac95', 197, 1, 'FundooApp', '[]', 0, '2022-08-28 02:11:00', '2022-08-28 02:11:00', '2023-08-28 07:41:00'),
('b3b9465a178c534bd5567901b0e5de6e913169bc71cd8aa5a66949862c2cb27a14ba59baffedd1e1', 128, 1, 'FundooApp', '[]', 0, '2022-08-01 23:42:53', '2022-08-01 23:42:53', '2023-08-02 05:12:53'),
('b4443d455c3107b080ff448295685a0bd6ee892c03de9af21b7f9e1760eef812fde70e5f993e1ad0', 324, 1, 'FundooApp', '[]', 0, '2023-01-04 04:31:37', '2023-01-04 04:31:37', '2024-01-04 10:01:37'),
('b582b8e5b13f1e5fa8a06c859138d45a65a1e004a020ca241caef486d4ed4d7660bb74ad0e44b3f5', 101, 1, 'FundooApp', '[]', 0, '2022-11-07 04:14:35', '2022-11-07 04:14:35', '2023-11-07 09:44:35'),
('b680b44b21e69610fbf5b970f0c4c373a6af572e8a5bde8d56d15fdb598bda2489f5823f4fb03aa9', 128, 1, 'FundooApp', '[]', 0, '2022-08-25 04:37:34', '2022-08-25 04:37:34', '2023-08-25 10:07:34'),
('b69318d453d1ab5315bb26a8eb3ba691d6923596cedf482ba65f8d909d974e2210ae6395c4b3bbd5', 114, 1, 'FundooApp', '[]', 0, '2022-07-26 05:58:31', '2022-07-26 05:58:31', '2023-07-26 11:28:31'),
('b7072430c291e04903863e0457fe0d2dd303e4af299f63c054452c138eb7ec6e333954c4c4a5f556', 102, 1, 'FundooApp', '[]', 0, '2022-09-20 00:40:50', '2022-09-20 00:40:50', '2023-09-20 06:10:50'),
('b734cf91ad098be5d864e6f0c43c86e5b8182bb63d2450ebb3d649926b4414a0839248af8f1ce5d7', 158, 1, 'FundooApp', '[]', 0, '2022-09-05 05:42:14', '2022-09-05 05:42:14', '2023-09-05 11:12:14'),
('b7d84b8f7b383c60f78a3e5d8e4e3923208c93c111d729b9675291a7020a6cdfc065a0052c5c9411', 144, 1, 'FundooApp', '[]', 0, '2022-09-27 02:19:55', '2022-09-27 02:19:55', '2023-09-27 07:49:55'),
('b8c7ffa551e10a9090da636a0b762daf25173bbb0519bfe65ef43a3f3346a41c22c7a59e9faa7440', 128, 1, 'FundooApp', '[]', 0, '2022-11-18 06:57:52', '2022-11-18 06:57:52', '2023-11-18 12:27:52'),
('b996c1ad024afefbd4878c3062b05a8efc5f168801908754db80c0ba11a83aa9f43ab165f06b531c', 1, 1, 'FundooApp', '[]', 0, '2022-08-29 03:20:10', '2022-08-29 03:20:10', '2023-08-29 08:50:10'),
('bafde4a6400a26987fc4c116042e9330d19d6e08b0f2e299786e9fc9239efca5c3d66d55c3489320', 197, 1, 'FundooApp', '[]', 0, '2022-08-27 01:20:25', '2022-08-27 01:20:25', '2023-08-27 06:50:25'),
('bbbe6cc3eef093ddecf0aedd66851cd58ac843170ac10b87d7166634c834dcf7536ebccbb42122cc', 144, 1, 'FundooApp', '[]', 0, '2022-08-12 01:11:15', '2022-08-12 01:11:15', '2023-08-12 06:41:15'),
('bbf73e9338fc5569614ed7bcb3420889daf4fee2fef6a142a55c63a9247d5066411e9329144bdeea', 181, 1, 'FundooApp', '[]', 0, '2022-08-24 06:37:05', '2022-08-24 06:37:05', '2023-08-24 12:07:05'),
('bc23a5dcc2358d505c85d034cd433ea69a4d68aae43b81be1ac4ef0cc495032fc0b18ab9f0ec3e70', 128, 1, 'FundooApp', '[]', 0, '2022-08-05 23:08:00', '2022-08-05 23:08:00', '2023-08-06 04:38:00'),
('bc87252adad640a5a0641d32621ab867b95acfb2a2f254e2d2a665795b98fc82890c1c571e6fc18b', 3, 1, 'FundooApp', '[]', 0, '2022-08-19 02:08:02', '2022-08-19 02:08:02', '2023-08-19 07:38:02'),
('bcffb9a950c742f448ab027ece0dbeab6edfd8137fdef9b57608d92ff428ff8a3f00b4267a3ad853', 315, 1, 'FundooApp', '[]', 0, '2022-11-03 06:27:57', '2022-11-03 06:27:57', '2023-11-03 11:57:57'),
('bd4aed6dbab9fb2596371c62a3d0c3c9808ab3ff02482f95895cac3ea04181f7f35081678b130734', 146, 1, 'FundooApp', '[]', 0, '2022-08-12 02:45:16', '2022-08-12 02:45:16', '2023-08-12 08:15:16'),
('bd8a6c20438f01e050775909bd5063e84efd6b38562d443d2c30174ba80e2e9c02d514f2e881d1a5', 203, 1, 'FundooApp', '[]', 0, '2022-08-25 06:16:08', '2022-08-25 06:16:08', '2023-08-25 11:46:08'),
('be0ee6789709563c6f941017ea4b52907c91a379b58be786f289d7305cacc77c5b67c524e1885966', 1, 1, 'FundooApp', '[]', 0, '2022-07-27 05:06:55', '2022-07-27 05:06:55', '2023-07-27 10:36:55'),
('bebfdb9f67962792f809b9815b30a9d183ebeb66c32702524f0246eb1fb0cb2c3699091067669b0f', 197, 1, 'FundooApp', '[]', 0, '2022-08-24 06:47:06', '2022-08-24 06:47:06', '2023-08-24 12:17:06'),
('bec7879a0c262373333e543489f23a2905fe54d927ad58821c010bdf1ccd3f760552a6fe97dc82f0', 324, 1, 'FundooApp', '[]', 0, '2023-01-06 07:53:58', '2023-01-06 07:53:58', '2024-01-06 13:23:58'),
('bf631e1a8177b9631e19cb31099bbd1487d609b8725cc8a89d8ce29c18c1820a395e10b1c7dcf7d9', 181, 1, 'FundooApp', '[]', 0, '2022-08-24 06:34:20', '2022-08-24 06:34:20', '2023-08-24 12:04:20'),
('bf6d7da20d8d38e91bc44e21292e85439a8138c94b8c885bc92c9470218793e7a0537043167923b5', 1, 1, 'FundooApp', '[]', 0, '2022-07-26 03:53:43', '2022-07-26 03:53:43', '2023-07-26 09:23:43'),
('bfe95c026013f98adb80ebbc45125dbf07318612ac42e978844bdff76fe0abe2e8896ac3db99c0c0', 185, 1, 'FundooApp', '[]', 0, '2022-08-23 04:28:24', '2022-08-23 04:28:24', '2023-08-23 09:58:24'),
('c0952d22483e31f2d4a5c0ce53d14c897d66ea4c753b021de307354202b423e6263be755d80b4ec0', 144, 1, 'FundooApp', '[]', 0, '2022-08-09 02:09:16', '2022-08-09 02:09:16', '2023-08-09 07:39:16'),
('c0b3ee0d2f0efede68b5766235f783943dbd870ae707481035b560dbf5ab8e3ab4f661e2ca5149be', 128, 1, 'FundooApp', '[]', 0, '2022-11-30 12:44:28', '2022-11-30 12:44:28', '2023-11-30 18:14:28'),
('c2247c21888387cf7d4c289d5aa220cedbe0ef950ad01cc31fa10e65789bb1817418f5554606954b', 128, 1, 'FundooApp', '[]', 0, '2022-08-26 01:28:22', '2022-08-26 01:28:22', '2023-08-26 06:58:22'),
('c2c2c09bac011666d686ad132e92a645602de0530481838a014f431d502b1145303ef19cfd725ed8', 181, 1, 'FundooApp', '[]', 0, '2022-08-24 06:36:32', '2022-08-24 06:36:32', '2023-08-24 12:06:32'),
('c3170ebfa3b661fb8d1f10f8d9c7fdb46a56dc283c61d0f692d574ddbb0b6903cb74e96b9bf6b767', 197, 1, 'FundooApp', '[]', 0, '2022-08-28 02:26:04', '2022-08-28 02:26:04', '2023-08-28 07:56:04'),
('c357f27589b5cc526a1a33da90f40dc259b020708596a8de9987d8b8f3d49b920532e3aa6c29b452', 197, 1, 'FundooApp', '[]', 0, '2022-08-24 06:44:04', '2022-08-24 06:44:04', '2023-08-24 12:14:04'),
('c3f4af01bd84412f224c06998bba9bb62df74bfc9c87663aedd827ea0c4c7e6c2846fd9a704f3499', 3, 1, 'FundooApp', '[]', 0, '2022-08-15 07:03:27', '2022-08-15 07:03:27', '2023-08-15 12:33:27'),
('c4619ebb6c17a9f71cc2161054fb68fe669eff1c7d9f1b4fae4a06e2818df2920bfdb2a6f675a4d9', 1, 1, 'FundooApp', '[]', 0, '2022-08-23 23:56:32', '2022-08-23 23:56:32', '2023-08-24 05:26:32'),
('c4af5ba0317f711255752b4d7cf4339ded043992378bc417b3131db97cfd3127d79118189966f51b', 128, 1, 'FundooApp', '[]', 0, '2022-08-25 07:33:25', '2022-08-25 07:33:25', '2023-08-25 13:03:25'),
('c4e446f0f9d56484114939c9e1f080a04fa5794c5334eaac9454d9331b2f4b6afadddedac10226a3', 181, 1, 'FundooApp', '[]', 0, '2022-08-24 06:36:32', '2022-08-24 06:36:32', '2023-08-24 12:06:32'),
('c58ebac0980fe216427bd85dc73a6e427bc30ef108cc9944207681aa1d376afae92c308883d985ef', 327, 1, 'FundooApp', '[]', 0, '2023-01-06 12:34:08', '2023-01-06 12:34:08', '2024-01-06 18:04:08'),
('c60701705f9eb193e0c0b7ca09b33a1e35f6f328d97b90963f8a36d908c7e967f3142938a3195981', 128, 1, 'FundooApp', '[]', 0, '2022-08-25 07:46:57', '2022-08-25 07:46:57', '2023-08-25 13:16:57'),
('c7b10f02e9bd546a7f07f7516bebecb632f5cf94cf01de49028bb3870091757b0fc4ac3afa1daa9e', 144, 1, 'FundooApp', '[]', 0, '2022-08-19 02:06:23', '2022-08-19 02:06:23', '2023-08-19 07:36:23'),
('c85a7dc2f56cead37766f14c1ca9aa54081ecc9e60b3c1329b66174d34a84d6b9a1e7d40574d3d68', 194, 1, 'FundooApp', '[]', 0, '2022-08-24 06:30:23', '2022-08-24 06:30:23', '2023-08-24 12:00:23'),
('c8b59a23ba946ceb2ef7fffdbfb9b8c38b50b7b9a6d66a39eea0f05aac55bbeefae58d9beb1ec77f', 144, 1, 'FundooApp', '[]', 0, '2022-09-05 00:49:20', '2022-09-05 00:49:20', '2023-09-05 06:19:20'),
('c92fae39dee0f329d156633933b7c054a87382181447de148af7d2ee3d81e591b45ba19ac5612791', 35, 1, 'FundooApp', '[]', 0, '2022-12-09 10:18:59', '2022-12-09 10:18:59', '2023-12-09 15:48:59'),
('c95f370fb132630916aafa0530bd802aa3aabbf93b91dc370f6d2192a79f14a7da0a068325bf81fb', 35, 1, 'FundooApp', '[]', 0, '2022-12-21 09:18:32', '2022-12-21 09:18:32', '2023-12-21 14:48:32'),
('c9862072b428b7e41123a8a90c439e06f2bb995a4f4cbcce4aa9b41a170463bfc88667d6bb071704', 35, 1, 'FundooApp', '[]', 0, '2022-11-22 07:37:30', '2022-11-22 07:37:30', '2023-11-22 13:07:30'),
('ca27dfab07dd016fd184c003d03ece7628b391ee10d95f1d1b7ddddbfbb51c8fbc555b03ab45ac20', 1, 1, 'FundooApp', '[]', 0, '2022-07-27 06:46:19', '2022-07-27 06:46:19', '2023-07-27 12:16:19'),
('cc36fa2bbe27b41d203e6c8a1660da3969a9c79a0952d35cc2e488d3f40e31e49ba1678d4a52ae2c', 128, 1, 'FundooApp', '[]', 0, '2022-12-27 11:02:04', '2022-12-27 11:02:04', '2023-12-27 16:32:04'),
('ccba0770caf42022c31021e1995c8d14b45d9f4b060d4311c68aad43a36f87adaaee59f9b196cc90', 225, 1, 'FundooApp', '[]', 0, '2022-09-03 08:20:40', '2022-09-03 08:20:40', '2023-09-03 13:50:40'),
('cd1147ca1a4cf3b0d70ef0053ea3306d4b525be299e1de6fd0672b153b81f6f380b18c267d6c3603', 324, 1, 'FundooApp', '[]', 0, '2023-01-02 11:50:16', '2023-01-02 11:50:16', '2024-01-02 17:20:16'),
('cd53673340b13a44a62190e3c70763cbf54a429565da4164be6c9da16c18f8dbf16e5642db0802c9', 1, 1, 'FundooApp', '[]', 0, '2022-07-27 05:11:40', '2022-07-27 05:11:40', '2023-07-27 10:41:40'),
('cd53b3bec41252a763373f941212634c8201681a50e243b3776a7cd6e60b9f30a3fc1511fc356804', 219, 1, 'FundooApp', '[]', 0, '2022-09-01 06:55:41', '2022-09-01 06:55:41', '2023-09-01 12:25:41'),
('cec1ce4f07f64afc6c57cf6def243b9dd5c615e5578450300dc3e81ec2cf1eae17dffb0c08425dd3', 181, 1, 'FundooApp', '[]', 0, '2022-08-24 06:35:54', '2022-08-24 06:35:54', '2023-08-24 12:05:54'),
('cf7e1c096ee57f882647cbd36fdf365a2cbb6a95fbcf85d3b152f32cd65c3ae2cbc25fd87c11c854', 122, 1, 'FundooApp', '[]', 1, '2022-07-27 07:14:45', '2022-07-27 07:14:45', '2023-07-27 12:44:45'),
('d038ac94a66cff397866ee850164dd22a23c6dc8606382205a2f3433b4a07f0ab80fdaa89a53a20f', 315, 1, 'FundooApp', '[]', 0, '2022-11-03 06:41:25', '2022-11-03 06:41:25', '2023-11-03 12:11:25'),
('d0971f6be9d29cfa8def2de8e585ecd03996dc95b56915aab7f93086465eea21b08638317a91c928', 122, 1, 'FundooApp', '[]', 0, '2022-07-27 07:14:33', '2022-07-27 07:14:33', '2023-07-27 12:44:33'),
('d1131902ddb3b6babbe8cef75dc2a5f7b3c55545ebdb3678ab90be533c3ecd3095c96bb141dfa37d', 128, 1, 'FundooApp', '[]', 0, '2022-08-25 07:56:20', '2022-08-25 07:56:20', '2023-08-25 13:26:20'),
('d19beb0a2ba737961ea173979754d8698331440dfe1978c48e78b365586ba570ed02dacc0bdb89e7', 101, 1, 'FundooApp', '[]', 0, '2022-11-07 04:13:36', '2022-11-07 04:13:36', '2023-11-07 09:43:36'),
('d3878575c34e85cd0ec78fcc40d9d9536cd10ce81b67c3eb4ef18ec2f6626c551d392425af4000b5', 3, 1, 'FundooApp', '[]', 0, '2022-07-29 06:26:32', '2022-07-29 06:26:32', '2023-07-29 11:56:32'),
('d3abae8ea44047226347bd22e3777a90126d007c7df92f1639b7488e14015155779e9d2d964ac4d5', 128, 1, 'FundooApp', '[]', 0, '2022-07-28 06:52:05', '2022-07-28 06:52:05', '2023-07-28 12:22:05'),
('d4c7e73981e4bddc769ac0fb92407c2c659d6aa8e1a23bd6ffebc5d9288d4c35ef85b8f7028be6b1', 3, 1, 'FundooApp', '[]', 0, '2022-08-19 00:18:48', '2022-08-19 00:18:48', '2023-08-19 05:48:48'),
('d4f3b375e1780de82e69ff095b0aee6f8af7de535e9b122420876df48f727f9ec83f954233dbb210', 1, 1, 'FundooApp', '[]', 0, '2022-07-28 01:40:20', '2022-07-28 01:40:20', '2023-07-28 07:10:20'),
('d555117faff75f19a502dbf11694271a0d22d313e70d63721a06be7cc45f02166ed4933308a39103', 1, 1, 'FundooApp', '[]', 0, '2022-07-27 05:01:47', '2022-07-27 05:01:47', '2023-07-27 10:31:47'),
('d5844d296a988ccc19ca056c31c087241c7139138125c9877a497b17855bcf1b82a458f641a91f62', 128, 1, 'FundooApp', '[]', 0, '2022-08-10 01:13:12', '2022-08-10 01:13:12', '2023-08-10 06:43:12'),
('d5f6b93f8325ccbc6f40517cb64973d0796e2850d3eeae2a575830ee49c1c4d02cacbe60b463e5cf', 197, 1, 'FundooApp', '[]', 0, '2022-08-24 06:41:33', '2022-08-24 06:41:33', '2023-08-24 12:11:33'),
('d67f5bf354e1089b8fbc0b29a3ecc3b9246be44bce9c0e988f0711f8c6592d2282e9e64d33742e0a', 324, 1, 'FundooApp', '[]', 0, '2023-01-03 05:05:00', '2023-01-03 05:05:00', '2024-01-03 10:35:00'),
('d6bbfd605e600d78370f96a1fe91f23021f5c754c62dc4ce477c830513e5719eb304ca02648fd948', 5, 1, 'FundooApp', '[]', 0, '2022-07-26 03:58:14', '2022-07-26 03:58:14', '2023-07-26 09:28:14'),
('d71b15b39d11a94f3d9efc2ed5b5f2cb2694cf4b9a00ab0e60c8c91cc5da2417f1927924ec40ce82', 52, 1, 'FundooApp', '[]', 0, '2022-08-15 07:10:39', '2022-08-15 07:10:39', '2023-08-15 12:40:39'),
('d7c13237f4f68355881db8bac6603f2e64313de6a5a47a75f5629db085d36d944ff9915299d9ff5c', 122, 1, 'FundooApp', '[]', 1, '2022-07-27 23:10:24', '2022-07-27 23:10:24', '2023-07-28 04:40:24'),
('d813f22f3a66c9a4b57da3a847cb79053a80205fb6f2e9f6b5c35cdf35c45b30e91b309ebb94ef0e', 181, 1, 'FundooApp', '[]', 0, '2022-08-24 06:34:20', '2022-08-24 06:34:20', '2023-08-24 12:04:20'),
('d833239e4f548a01faeda7d3681044333286b24cd087d4f90240656ab242e5b3909cb57e12d4befd', 122, 1, 'FundooApp', '[]', 0, '2022-07-27 23:20:25', '2022-07-27 23:20:25', '2023-07-28 04:50:25'),
('d8572e6aacf2d80b923e03efa9fb147dd6a2a139ee9b81c92f6fc41e8f80821ce3ce8db9fe13639f', 327, 1, 'FundooApp', '[]', 0, '2023-01-06 07:29:21', '2023-01-06 07:29:21', '2024-01-06 12:59:21'),
('d891f7de24c66587e73ce8dc24844a684d160ad590c1488a9b36dce86f7e025a375d45c0bff98a11', 128, 1, 'FundooApp', '[]', 0, '2022-07-28 04:50:24', '2022-07-28 04:50:24', '2023-07-28 10:20:24'),
('d8934b4e0df5b95898bf8184f7c626041e3ea3deda0f30fd028c8fa00a4c0bd1c9d9eaf1d9012036', 185, 1, 'FundooApp', '[]', 0, '2022-08-23 04:29:16', '2022-08-23 04:29:16', '2023-08-23 09:59:16'),
('d8fe823d72fdfb18613abfec22740148e063509d2924ea88d18a35bd4ea1ccef412791af939d3a06', 219, 1, 'FundooApp', '[]', 0, '2022-12-09 07:45:38', '2022-12-09 07:45:38', '2023-12-09 13:15:38'),
('da4e9c748b9040e7f00ac935bc09ab8165948633ca8ac75076a3ae3498df02b66d454bdd1543d248', 3, 1, 'FundooApp', '[]', 0, '2022-07-29 06:29:24', '2022-07-29 06:29:24', '2023-07-29 11:59:24'),
('daacd7ff59bab8480507ebce3f01de79e4bb0cfec3bc06ee96ef3b38610e54605243b189e51628a3', 146, 1, 'FundooApp', '[]', 0, '2022-08-12 07:10:32', '2022-08-12 07:10:32', '2023-08-12 12:40:32'),
('db2bc4811e1673a784e28b98b98a4e708b09b5814f70402197c7f2ce83496f168fb0d9bf3250cb59', 128, 1, 'FundooApp', '[]', 0, '2022-08-25 05:51:26', '2022-08-25 05:51:26', '2023-08-25 11:21:26'),
('dc1766ffebecdfca47376d7ac4a5cb6d65b4a4b081e93fbf7e23942f93dc58ba398984a7089eaa52', 328, 1, 'FundooApp', '[]', 0, '2022-12-28 07:31:51', '2022-12-28 07:31:51', '2023-12-28 13:01:51'),
('dc313945a5b62ebdc8491b869d217c8ef12c9d595cba6c14e43a1e36f08f109d9bbd152954279778', 128, 1, 'FundooApp', '[]', 0, '2022-08-25 07:44:43', '2022-08-25 07:44:43', '2023-08-25 13:14:43'),
('dc3918a38a66ba1247f389c7174645305f902635c981e8f1eb5922e9aafea0a2181e5bb6ac1b93fe', 3, 1, 'FundooApp', '[]', 0, '2022-07-29 06:25:54', '2022-07-29 06:25:54', '2023-07-29 11:55:54'),
('dcf826601d54b9a808b88d95f6e60b3d1ba81cd6fbb50db209ffe188c8d942a574c0c9f7fd521789', 327, 1, 'FundooApp', '[]', 0, '2023-01-04 05:10:14', '2023-01-04 05:10:14', '2024-01-04 10:40:14'),
('ddd19951586199bcc22ef5238e632c89a36cda35b15bf8e71fdf896ff42ca4d71ef93c7990b17cea', 3, 1, 'FundooApp', '[]', 0, '2022-07-30 02:05:44', '2022-07-30 02:05:44', '2023-07-30 07:35:44'),
('de056a7b08070110fe5e3684b29b0414f3ac75e9918df698d27323a6cecc5ffbffef8afcf3476fe0', 128, 1, 'FundooApp', '[]', 0, '2022-08-09 01:57:45', '2022-08-09 01:57:45', '2023-08-09 07:27:45'),
('de487afec757966111372ef4e2560d804045f25d097ad8256861c272f04e767be8718bcdb869c9f5', 128, 1, 'FundooApp', '[]', 0, '2022-11-09 01:12:45', '2022-11-09 01:12:45', '2023-11-09 06:42:45'),
('df6b7086899216198d54285d57408de3b0db01df98c69df3ac4868ce878250f07cd507319fbca0ff', 122, 1, 'FundooApp', '[]', 0, '2022-07-27 02:06:33', '2022-07-27 02:06:33', '2023-07-27 07:36:33'),
('e0c54d96cd75ae47650391a08c872bc7d6435b6a5ccff6d901da4d71763d7a4c96d55d6e4908e92d', 197, 1, 'FundooApp', '[]', 0, '2022-08-24 07:40:17', '2022-08-24 07:40:17', '2023-08-24 13:10:17'),
('e10186c3e8665e81509024fcaa2d66121b218d65adbdacc839acc9d3e9ff9e02ebdd13fe9f73ce95', 101, 1, 'FundooApp', '[]', 0, '2022-11-09 01:08:33', '2022-11-09 01:08:33', '2023-11-09 06:38:33'),
('e28f3b6718ec1fcf6572c00ac689f70e724cce8466200a400fd18bd6cdf170d0ce0de52e19832b45', 128, 1, 'FundooApp', '[]', 0, '2022-12-14 10:40:01', '2022-12-14 10:40:01', '2023-12-14 16:10:01'),
('e2afa764e0da702eca19cb77caa34a6fcbc2c76ad969f3ae01279bc9c96683ea1143dccd6239b124', 122, 1, 'FundooApp', '[]', 0, '2022-07-28 01:37:08', '2022-07-28 01:37:08', '2023-07-28 07:07:08'),
('e37ef3fc739b63f46d64db9790bb17fa5865564dc57d0259fe1caf59005e03b10c844e0c8e08f824', 128, 1, 'FundooApp', '[]', 0, '2022-07-28 23:21:10', '2022-07-28 23:21:10', '2023-07-29 04:51:10'),
('e50b6e58a880536b96c827a42379a4a95edad886d5e12127e97efdf7464a2cc859836d8c730b9457', 111, 1, 'FundooApp', '[]', 0, '2022-07-26 05:50:42', '2022-07-26 05:50:42', '2023-07-26 11:20:42'),
('e511931c12b1aee3745c1b48c91c6084513cd6e68f68b6e9abd21df17784013a4d66f4f50a1b02fd', 147, 1, 'FundooApp', '[]', 0, '2022-08-12 01:17:14', '2022-08-12 01:17:14', '2023-08-12 06:47:14'),
('e65c9f9de05397e8803a20580abe54c9d3203c4afacfaf584b4852c3be34f19615eaf520f6eb745a', 1, 1, 'FundooApp', '[]', 0, '2022-07-27 04:25:13', '2022-07-27 04:25:13', '2023-07-27 09:55:13'),
('e66d5310c805917024023f7f89c87ae966728cd302c749942fee677692b4f327c3791d6ba34a53d1', 1, 1, 'FundooApp', '[]', 0, '2022-07-29 00:06:21', '2022-07-29 00:06:21', '2023-07-29 05:36:21'),
('e6df5bf5af5a92fdab751797cd3aff1896aa7abac4cddaec67ece841d2d0806fd15a0b474837af5a', 1, 1, 'FundooApp', '[]', 0, '2022-07-27 05:04:06', '2022-07-27 05:04:06', '2023-07-27 10:34:06'),
('e717a619adeaa2f2bc31ccae4f80436094f64a0b3ece20da064a2f73bd91a13de9d5d14d05d3f645', 1, 1, 'FundooApp', '[]', 0, '2022-07-27 04:54:57', '2022-07-27 04:54:57', '2023-07-27 10:24:57'),
('e73746153ea02e3f7e9aed4f908b812ad291b6b59f829a28938e59b2b689577907960aa3cc35dccc', 35, 1, 'FundooApp', '[]', 0, '2022-12-08 11:38:13', '2022-12-08 11:38:13', '2023-12-08 17:08:13'),
('e7f535aecb2b7e1e713eeb1616efcb5d28c2741f78180d8b00ce10f7e6c66a13ca717e860bf2e825', 197, 1, 'FundooApp', '[]', 0, '2022-08-27 04:01:21', '2022-08-27 04:01:21', '2023-08-27 09:31:21'),
('e81628fae920f7454909da7780d705ac8605bf6a23fc879cd1baaf5d3c3f52a119e3d9a30f0ab786', 146, 1, 'FundooApp', '[]', 0, '2022-08-12 02:45:33', '2022-08-12 02:45:33', '2023-08-12 08:15:33'),
('e8526015e76a07687658e0ffcfbafba7e4200d6e5e1b2cb2187baf1ceefb47797b14c40282bd3d98', 128, 1, 'FundooApp', '[]', 0, '2022-08-25 07:23:09', '2022-08-25 07:23:09', '2023-08-25 12:53:09'),
('e979a2b8d842ee545955578af641d61dfc989b0dbf8761e586dd59cdfcb969c25de8d0c275fa3dcd', 120, 1, 'FundooApp', '[]', 0, '2022-07-27 01:32:09', '2022-07-27 01:32:09', '2023-07-27 07:02:09'),
('e99a94cdbd32391e589ad21913eacc87d09e146e4e28845aee4ea5630f8b91ae39172066c62cb1c8', 122, 1, 'FundooApp', '[]', 0, '2022-07-27 02:20:39', '2022-07-27 02:20:39', '2023-07-27 07:50:39'),
('e9c2198d32e51e7dc9a43c4f191f7db96c153c5fb0ad1be376cdc1fdb1ecdb9b453590d29004c104', 227, 1, 'FundooApp', '[]', 0, '2022-11-21 04:21:59', '2022-11-21 04:21:59', '2023-11-21 09:51:59'),
('eae5b1624f53fa196c96acbacfd77a947ca9c183140df58fc4f1f832291503a871b004269b21ff44', 128, 1, 'FundooApp', '[]', 0, '2022-07-29 00:19:11', '2022-07-29 00:19:11', '2023-07-29 05:49:11'),
('eb4f70021bae4e3dfe8d4dfe175ca0a4a7ace446db149b4912268a29596c7a1c037ab7a3c768d451', 128, 1, 'FundooApp', '[]', 0, '2022-08-09 01:56:54', '2022-08-09 01:56:54', '2023-08-09 07:26:54'),
('ec02fb21eea14f48a21cc9d8c1280cfcfc464668400d1159acdc98f415cbcf919bb28d95b8f1c4e7', 151, 1, 'FundooApp', '[]', 0, '2022-08-12 02:44:02', '2022-08-12 02:44:02', '2023-08-12 08:14:02'),
('ec6fa5e60d1266b26dda8db8e9754820c2fba7498161f5a2ddf369e0b228f3f136eb0827f1c2d92d', 194, 1, 'FundooApp', '[]', 0, '2022-11-30 10:31:03', '2022-11-30 10:31:03', '2023-11-30 16:01:03'),
('ed685df43293231b3e5e309b35bd903c7f03b491df7e99b09124c5039cf62a7c9e88ced7937cfa2f', 144, 1, 'FundooApp', '[]', 0, '2022-08-15 22:51:43', '2022-08-15 22:51:43', '2023-08-16 04:21:43'),
('ee34b759f98a43552a33253d8ca71a09cd40ec27a3d72f8729d7b0320d7482c8e2cf3241339c0c5e', 104, 1, 'FundooApp', '[]', 0, '2022-11-17 23:55:53', '2022-11-17 23:55:53', '2023-11-18 05:25:53'),
('ee4dcd2841923cfee174a413ca419e640d9b141bebc8337e3e9f3e6fbec60201b5f9d570715d2ac9', 128, 1, 'FundooApp', '[]', 0, '2022-08-10 01:17:40', '2022-08-10 01:17:40', '2023-08-10 06:47:40'),
('ee70d773acde5929be551c3326027f310735689fff223c7a588919acb1350b949cb55fa18aad1602', 197, 1, 'FundooApp', '[]', 0, '2022-08-29 08:21:01', '2022-08-29 08:21:01', '2023-08-29 13:51:01'),
('ee7994d9bdd7a4845d037c8ee37c517fcd7cd1d6227128d2be9abbf95488eeaefcd7bb106508a7b1', 108, 1, 'FundooApp', '[]', 0, '2022-07-26 04:05:57', '2022-07-26 04:05:57', '2023-07-26 09:35:57'),
('eeb00e47efbd0efb49ee982022b403ccf8f918cdf0b281dedb1525b17fac5f7173c831562aa7d641', 3, 1, 'FundooApp', '[]', 0, '2022-07-30 02:29:38', '2022-07-30 02:29:38', '2023-07-30 07:59:38'),
('ef29117e4cae67e56ccc8ed00de588dcc86b933c1941d1ef905024e6ea19ba48c47b2c19ac964f01', 5, 1, 'FundooApp', '[]', 0, '2022-08-15 07:12:29', '2022-08-15 07:12:29', '2023-08-15 12:42:29'),
('f06808e0ac8134f25a35e8ca1661f77b97da519cf2ee39530b7ec9ba1084694b6165f07b5356c573', 122, 1, 'FundooApp', '[]', 0, '2022-07-27 01:53:50', '2022-07-27 01:53:50', '2023-07-27 07:23:50'),
('f0e609c1dbd4690508fbefb9f88227ac8cebe89b974a234f570998036f49e9b95dfeaec67686816d', 122, 1, 'FundooApp', '[]', 1, '2022-07-27 07:19:39', '2022-07-27 07:19:39', '2023-07-27 12:49:39'),
('f14024d89e59371b23976b416f5ed1e06f710c2f7a56a27dc64f2951bedce23855c7813550190342', 128, 1, 'FundooApp', '[]', 0, '2022-11-30 10:32:25', '2022-11-30 10:32:25', '2023-11-30 16:02:25'),
('f329096fb92f91533127e1184cc36fa806a46347b7b250402630ebb9101bbb1a282cf8955422bdf8', 1, 1, 'FundooApp', '[]', 1, '2022-07-28 01:42:56', '2022-07-28 01:42:56', '2023-07-28 07:12:56'),
('f39280ebf8bbcbf50ac20a94aa918bacca6cb54846d2d6ae226ddd631b01a9ec38a63ebee10aa5cf', 1, 1, 'FundooApp', '[]', 0, '2022-07-27 04:54:30', '2022-07-27 04:54:30', '2023-07-27 10:24:30'),
('f3e909c4d00e3c509843462ccbe0fecf48868d64815d59515be8ef6d0a4c0e0e23f46bd6e0e971f4', 3, 1, 'FundooApp', '[]', 0, '2022-07-29 06:26:56', '2022-07-29 06:26:56', '2023-07-29 11:56:56'),
('f4ce3599198bae4e388764c460444d68acac75f27930462da8401ee117e8e081ed7cb4a27c801157', 128, 1, 'FundooApp', '[]', 0, '2022-07-29 00:12:58', '2022-07-29 00:12:58', '2023-07-29 05:42:58'),
('f526676a08eaec8dd08faccab1b7d506946973220b18eeeb417e06d9a24f2ee24b5eba0fdb33c2e3', 1, 1, 'FundooApp', '[]', 0, '2022-08-29 03:02:24', '2022-08-29 03:02:24', '2023-08-29 08:32:24'),
('f54262a77ee0679f5c6d0a599e16e330b068c2033a34f09b0795f3d90dd05f367357e05b22a65d2b', 112, 1, 'FundooApp', '[]', 0, '2022-07-26 05:51:33', '2022-07-26 05:51:33', '2023-07-26 11:21:33'),
('f5e37ee2f8806198611cbe950e6d8947dc3776cba093dabf53cadc9fabf5f50d43963a6447366fd6', 185, 1, 'FundooApp', '[]', 0, '2022-08-23 04:56:31', '2022-08-23 04:56:31', '2023-08-23 10:26:31'),
('f600f3c28c2032cc40b24f691b2ccda6fefc33f1a9be5602edd9eec85b0f785c77c618c72f823dbd', 128, 1, 'FundooApp', '[]', 0, '2022-07-29 00:04:24', '2022-07-29 00:04:24', '2023-07-29 05:34:24'),
('f6ff1421377edd496863791510fb32562aa2fc8d3a505c35065671eea33b68d1fd3a89dfdef355d1', 128, 1, 'FundooApp', '[]', 0, '2022-07-28 23:33:42', '2022-07-28 23:33:42', '2023-07-29 05:03:42'),
('f710dd32fbad3604cde6d8809d0a8e69ad9f2789b12ab6286b6d44c21f2f48365de3afac36ddf5d1', 1, 1, 'FundooApp', '[]', 0, '2022-07-28 04:26:29', '2022-07-28 04:26:29', '2023-07-28 09:56:29'),
('f749c129d177fa5e7fa44fc805f8ca266c5a59721e0c9ef801076da924c0370dc596ad3427d2fb99', 219, 1, 'FundooApp', '[]', 0, '2022-10-01 02:04:55', '2022-10-01 02:04:55', '2023-10-01 07:34:55'),
('f77857fd1d003f5300843b21f13595e6386b2bc5b8e57f66e633e7a518f83b102aa9c7eb93a41670', 110, 1, 'FundooApp', '[]', 0, '2022-07-26 05:47:48', '2022-07-26 05:47:48', '2023-07-26 11:17:48'),
('f77bc90d65636703a2052a03cb7369e87fee9c9f4be1d16993d95d2e33ca8d7cb56333142842c8cf', 146, 1, 'FundooApp', '[]', 0, '2022-08-10 07:28:30', '2022-08-10 07:28:30', '2023-08-10 12:58:30'),
('f8b0fa79c8497350e5b0c0b2b666cabaa41b29e848278c2fa4ff2eef90eb626cd1ebb8fe7250c654', 1, 1, 'FundooApp', '[]', 0, '2022-07-27 04:20:40', '2022-07-27 04:20:40', '2023-07-27 09:50:40'),
('f8cec4fe7fac0c273b9cfd401cd9bd3edc08c742f490eda3e45dae24f202bf9c26f3b04b06f25501', 128, 1, 'FundooApp', '[]', 0, '2022-08-09 01:59:53', '2022-08-09 01:59:53', '2023-08-09 07:29:53'),
('f9e56a00aa3370beb32f70298d7f910e93c3a296bf4a657a0c99659bf224306dbe77952f356325b4', 1, 1, 'FundooApp', '[]', 0, '2022-07-27 05:01:53', '2022-07-27 05:01:53', '2023-07-27 10:31:53'),
('fa320ff005ead377599e11e3b87c7da2d0f8d0f583cd56b4d973f5e8fcf6023305e3ee5f8e3a9020', 327, 1, 'FundooApp', '[]', 0, '2023-01-02 12:18:24', '2023-01-02 12:18:24', '2024-01-02 17:48:24'),
('fac8e6ab155b945a8f57492f72ada5c62cbc947075d06c611282523df579a43cf80a2079e21d3de7', 1, 1, 'FundooApp', '[]', 1, '2022-07-27 06:29:34', '2022-07-27 06:29:34', '2023-07-27 11:59:34'),
('fcb8ecda864facfb824b61b3db972e95080bc7bd890e2e061d2fbde0edb74b8fd5d90f630b99100b', 197, 1, 'FundooApp', '[]', 0, '2022-08-24 06:39:40', '2022-08-24 06:39:40', '2023-08-24 12:09:40'),
('fdb1a1a052a47c702db9d34386b5cb09662b57dd144f40a102c65c4de9e9f44dc32210e0f7e5473c', 324, 1, 'FundooApp', '[]', 0, '2023-01-03 13:08:50', '2023-01-03 13:08:50', '2024-01-03 18:38:50'),
('fde6146cc04f6f9358b363ed366361f72ff36ffbd8ee1c7bc7b4360564e9bcd8d5ac79e23437f23a', 324, 1, 'FundooApp', '[]', 0, '2023-01-06 09:22:44', '2023-01-06 09:22:44', '2024-01-06 14:52:44'),
('fe03d7129ef2d7e928ad2311f6dcad32c3e3cdeeca4edab73bcea6e5eaea660b395cdd4e252f7bf9', 206, 1, 'FundooApp', '[]', 0, '2022-11-21 05:15:01', '2022-11-21 05:15:01', '2023-11-21 10:45:01'),
('ff61c6c58b6582435e62aa6f255d95974d77e6fefae31454aded1cecbe7b5f0dcfeb2c7dac84f46b', 126, 1, 'FundooApp', '[]', 0, '2022-07-28 01:11:48', '2022-07-28 01:11:48', '2023-07-28 06:41:48'),
('ffec3dfbd6330065f213d75296939f61e2d8827362d15041a42dc27bf06f4cc2616e1a49a0a34bfa', 328, 1, 'FundooApp', '[]', 0, '2022-12-21 06:52:38', '2022-12-21 06:52:38', '2023-12-21 12:22:38');

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
  `provider` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
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

INSERT INTO `oauth_clients` (`id`, `user_id`, `name`, `secret`, `provider`, `redirect`, `personal_access_client`, `password_client`, `revoked`, `created_at`, `updated_at`) VALUES
(1, NULL, 'Fundoo Personal Access Client', 'zRsfHiWTfZY28zPcRJCsn0LUXwta7CWHby2UfXwS', NULL, 'http://localhost', 1, 0, 0, '2022-07-21 04:10:42', '2022-07-21 04:10:42'),
(2, NULL, 'Fundoo Password Grant Client', 'fsvgX0QXHoJAfzXrxSIZ0hvIA3mSslWwF9vI9084', 'users', 'http://localhost', 0, 1, 0, '2022-07-21 04:10:42', '2022-07-21 04:10:42');

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
(1, 1, '2022-07-21 04:10:42', '2022-07-21 04:10:42');

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
-- Table structure for table `offercodes`
--

CREATE TABLE `offercodes` (
  `id` int(10) UNSIGNED NOT NULL,
  `offer_code` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `valid_to` datetime NOT NULL,
  `per_user_limit` int(11) NOT NULL,
  `status` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `offercodes`
--

INSERT INTO `offercodes` (`id`, `offer_code`, `valid_to`, `per_user_limit`, `status`, `created_at`, `updated_at`, `deleted_at`) VALUES
(1, 'FUNDOO001', '2022-12-01 00:00:00', 10, 'active', '2022-06-27 04:31:51', '2022-06-27 06:56:45', '2022-06-27 06:56:45'),
(2, 'FUNDOO001', '2022-12-01 14:18:22', 10, 'active', '2022-06-27 04:32:27', '2022-07-15 07:13:53', NULL),
(3, 'Fun5625', '2023-01-01 00:00:00', 66, 'active', '2022-07-15 23:44:41', '2022-07-15 23:45:32', '2022-07-15 23:45:32'),
(4, 'FUNDOO002', '2022-07-02 14:18:22', 12, 'deactive', '2022-07-16 07:24:40', '2022-07-16 07:40:24', NULL),
(5, 'FUNDOO003', '2022-07-11 14:18:22', 15, 'active', '2022-07-16 07:25:13', '2022-07-16 07:40:06', NULL),
(6, 'FUNDOO004', '2022-07-13 14:18:22', 15, 'active', '2022-07-16 07:26:00', '2022-07-16 07:26:00', NULL),
(7, 'FUNDOO005', '2022-07-16 14:18:22', 15, 'deactive', '2022-07-16 07:26:39', '2022-07-16 07:27:07', NULL),
(8, 'FUNDOO006', '2022-08-01 06:00:00', 20, 'active', '2022-08-01 02:01:58', '2022-08-01 02:02:31', NULL),
(9, 'new', '2022-08-01 00:00:00', 20, 'active', '2022-12-13 05:28:26', '2022-12-13 05:28:26', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `out_o_f_statoindetails`
--

CREATE TABLE `out_o_f_statoindetails` (
  `id` int(10) UNSIGNED NOT NULL,
  `assign_driver_id` int(10) UNSIGNED NOT NULL,
  `from_date` date NOT NULL,
  `to_date` date NOT NULL,
  `from_time` datetime NOT NULL,
  `to_time` datetime NOT NULL,
  `location` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `late` decimal(8,2) NOT NULL,
  `longe` decimal(8,2) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `out_o_f_statoindetails`
--

INSERT INTO `out_o_f_statoindetails` (`id`, `assign_driver_id`, `from_date`, `to_date`, `from_time`, `to_time`, `location`, `late`, `longe`, `created_at`, `updated_at`, `deleted_at`) VALUES
(1, 128, '2022-08-04', '2022-08-15', '2022-08-12 11:31:01', '2022-08-15 11:31:01', 'Palanpur', '12.10', '5.20', '2022-08-12 04:08:00', '2022-08-12 04:08:00', NULL),
(2, 128, '2022-08-16', '2022-08-17', '2022-08-16 11:31:01', '2022-08-17 11:31:01', 'Deesa', '12.10', '5.20', '2022-08-12 04:08:59', '2022-08-12 04:08:59', NULL),
(3, 206, '2022-08-12', '2022-08-12', '2022-08-12 00:00:00', '2022-08-12 00:00:00', 'palanpur', '12.65', '48.12', '2022-08-12 07:26:42', '2022-08-12 07:26:42', NULL),
(4, 206, '2022-08-16', '2022-08-17', '2022-08-16 11:31:01', '2022-08-17 11:31:01', 'Deesa', '12.10', '5.20', '2022-12-21 09:24:06', '2022-12-21 09:24:06', NULL),
(5, 206, '2022-08-16', '2022-08-17', '2022-08-16 11:31:01', '2022-08-17 11:31:01', 'Deesa', '12.10', '5.20', '2022-12-21 09:27:09', '2022-12-21 09:27:09', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `pages`
--

CREATE TABLE `pages` (
  `id` int(10) UNSIGNED NOT NULL,
  `page_title` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `description` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `status` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `pages`
--

INSERT INTO `pages` (`id`, `page_title`, `description`, `status`, `created_at`, `updated_at`, `deleted_at`) VALUES
(1, 'FAQ', '<table id=\"dataTableBuilder\" class=\"table table-striped table-bordered dataTable no-footer\" role=\"grid\" width=\"100%\" aria-describedby=\"dataTableBuilder_info\">\r\n<tbody>\r\n<tr class=\"odd\" role=\"row\">\r\n<td>\r\n<p>We, Kreatik Seals are prominent manufacturers of high quality Mechanical Seals. Our product line includes Component Mechanical Seal, Bellow Mechanical Seal, and Cartridge Mechanical Seal. Owing to the qualitative fabrication, our range is widely known among the clients for its attributes such as dimensional accuracy, robustness, high tolerance capacity, leakage proofing, optimum performance, simple usability, rugged design, smooth finishing, high efficiency and longer shelf life, these products are made available in several technical specifications. Apart from this, all our offered mechanical seals are quality assured against the industry set parameters to ensure their quality.</p>\r\n</td>\r\n</tr>\r\n</tbody>\r\n</table>', 'active', '2022-06-24 00:45:42', '2022-08-22 05:54:09', NULL),
(2, 'About Us', '<table id=\"dataTableBuilder\" class=\"table table-striped table-bordered dataTable no-footer\" role=\"grid\" width=\"100%\" aria-describedby=\"dataTableBuilder_info\">\r\n<tbody>\r\n<tr class=\"odd\" role=\"row\">\r\n<td>\r\n<p>We, Kreatik Seals are prominent manufacturers of high quality Mechanical Seals. Our product line includes Component Mechanical Seal, Bellow Mechanical Seal, and Cartridge Mechanical Seal. Owing to the qualitative fabrication, our range is widely known among the clients for its attributes such as dimensional accuracy, robustness, high tolerance capacity, leakage proofing, optimum performance, simple usability, rugged design, smooth finishing, high efficiency and longer shelf life, these products are made available in several technical specifications. Apart from this, all our offered mechanical seals are quality assured against the industry set parameters to ensure their quality.</p>\r\n</td>\r\n</tr>\r\n</tbody>\r\n</table>', 'active', '2022-07-05 01:14:46', '2022-07-05 01:39:07', NULL),
(3, 'Privacy policy', '<table id=\"dataTableBuilder\" class=\"table table-striped table-bordered dataTable no-footer\" role=\"grid\" width=\"100%\" aria-describedby=\"dataTableBuilder_info\">\r\n<tbody>\r\n<tr class=\"odd\" role=\"row\">\r\n<td>\r\n<p>We, Kreatik Seals are prominent manufacturers of high quality Mechanical Seals. Our product line includes Component Mechanical Seal, Bellow Mechanical Seal, and Cartridge Mechanical Seal. Owing to the qualitative fabrication, our range is widely known among the clients for its attributes such as dimensional accuracy, robustness, high tolerance capacity, leakage proofing, optimum performance, simple usability, rugged design, smooth finishing, high efficiency and longer shelf life, these products are made available in several technical specifications. Apart from this, all our offered mechanical seals are quality assured against the industry set parameters to ensure their quality.</p>\r\n</td>\r\n</tr>\r\n</tbody>\r\n</table>', 'active', '2022-07-05 05:18:02', '2022-07-18 00:58:09', NULL),
(4, 'Terms & Condition', '<table id=\"dataTableBuilder\" class=\"table table-striped table-bordered dataTable no-footer\" style=\"height: 211px;\" role=\"grid\" width=\"100%\" aria-describedby=\"dataTableBuilder_info\">\r\n<tbody>\r\n<tr class=\"odd\" style=\"height: 211px;\" role=\"row\">\r\n<td style=\"height: 211px;\">\r\n<p>We, Kreatik Seals are prominent manufacturers of high quality Mechanical Seals. Our product line includes Component Mechanical Seal, Bellow Mechanical Seal, and Cartridge Mechanical Seal. Owing to the qualitative fabrication, our range is widely known among the clients for its attributes such as dimensional accuracy, robustness, high tolerance capacity, leakage proofing, optimum performance, simple usability, rugged design, smooth finishing, high efficiency and longer shelf life, these products are made available in several technical specifications. Apart from this, all our offered mechanical seals are quality assured against the industry set parameters to ensure their quality.</p>\r\n</td>\r\n</tr>\r\n</tbody>\r\n</table>', 'active', '2022-07-05 05:18:40', '2022-08-02 23:56:34', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `password_resets`
--

CREATE TABLE `password_resets` (
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `token` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `permanent_inquiries`
--

CREATE TABLE `permanent_inquiries` (
  `id` int(10) UNSIGNED NOT NULL,
  `user_id` int(10) UNSIGNED NOT NULL,
  `salary_start` decimal(8,2) NOT NULL,
  `salary_end` decimal(8,2) NOT NULL,
  `weekly_off` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `accomodation` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `need_local_person` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `work_time_from` datetime DEFAULT NULL,
  `work_time_to` datetime DEFAULT NULL,
  `status` varchar(11) COLLATE utf8mb4_unicode_ci NOT NULL,
  `type` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `no_of_drivers` int(11) DEFAULT NULL,
  `from_date` date DEFAULT NULL,
  `to_date` date DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `permanent_inquiries`
--

INSERT INTO `permanent_inquiries` (`id`, `user_id`, `salary_start`, `salary_end`, `weekly_off`, `accomodation`, `need_local_person`, `work_time_from`, `work_time_to`, `status`, `type`, `no_of_drivers`, `from_date`, `to_date`, `created_at`, `updated_at`, `deleted_at`) VALUES
(1, 227, '17000.00', '22500.00', 'weekly', 'world', 'local', '2021-10-15 12:01:00', '2021-10-17 01:22:00', 'completed', 'permanent', NULL, '2021-10-15', '2021-10-17', '2022-10-06 05:12:58', '2022-10-09 23:17:36', NULL),
(2, 227, '17000.00', '22500.00', 'weekly', 'world', 'local', '2021-10-15 12:01:00', '2021-10-17 01:22:00', 'completed', 'permanent', NULL, '2021-10-15', '2021-10-17', '2022-10-06 05:13:01', '2022-10-07 00:42:29', NULL),
(3, 227, '17000.00', '22500.00', 'weekly', 'world', 'local', '2021-10-15 12:01:00', '2021-10-17 01:22:00', 'completed', 'permanent', NULL, '2021-10-15', '2021-10-17', '2022-10-06 05:13:02', '2022-10-06 05:19:01', NULL),
(4, 192, '15000.00', '20000.00', 'sunday', 'world', 'local', '2021-10-05 12:01:00', '2021-10-15 01:22:00', 'completed', 'valet_parking', 0, '2021-10-05', '2021-10-15', '2022-10-06 05:13:37', '2022-10-07 01:13:19', NULL),
(5, 279, '15000.00', '20000.00', 'sunday', 'world', 'local', '2021-10-05 12:01:00', '2021-10-15 01:22:00', 'completed', 'valet_parking', 0, '2021-10-05', '2021-10-15', '2022-10-06 05:13:48', '2022-11-08 06:38:01', NULL),
(6, 192, '15000.00', '20000.00', 'sunday', 'world', 'local', '2021-10-05 12:01:00', '2021-10-15 01:22:00', 'completed', 'valet_parking', 0, '2021-10-05', '2021-10-15', '2022-10-06 05:13:53', '2022-10-07 01:41:19', NULL),
(7, 219, '17000.00', '22500.00', 'weekly', 'world', 'local', '2021-10-15 12:01:00', '2021-10-17 01:22:00', 'pending', 'permanent', NULL, '2021-10-15', '2021-10-17', '2022-10-13 02:14:07', '2022-10-13 02:14:07', NULL),
(8, 273, '17000.00', '22500.00', 'weekly', 'world', 'local', '2021-10-15 12:01:00', '2021-10-17 01:22:00', 'pending', 'permanent', NULL, '2021-10-15', '2021-10-17', '2022-10-13 02:14:08', '2022-10-13 02:14:08', NULL),
(9, 275, '15000.00', '20000.00', 'sunday', 'world', 'local', '2021-10-05 12:01:00', '2021-10-15 01:22:00', 'pending', 'valet_parking', 1, '2021-10-05', '2021-10-15', '2022-10-13 02:14:13', '2022-10-13 02:14:13', NULL),
(10, 276, '15000.00', '20000.00', 'sunday', 'world', 'local', '2021-10-05 12:01:00', '2021-10-15 01:22:00', 'pending', 'valet_parking', 1, '2021-10-05', '2021-10-15', '2022-10-13 02:14:14', '2022-10-13 02:14:14', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `permissions`
--

CREATE TABLE `permissions` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `guard_name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `roles`
--

CREATE TABLE `roles` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `guard_name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `role_has_permissions`
--

CREATE TABLE `role_has_permissions` (
  `permission_id` bigint(20) UNSIGNED NOT NULL,
  `role_id` bigint(20) UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `salaries`
--

CREATE TABLE `salaries` (
  `id` int(10) UNSIGNED NOT NULL,
  `assign_driver_id` int(10) UNSIGNED NOT NULL,
  `amount` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `date` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `type` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `paid_unpaid` int(11) NOT NULL DEFAULT 1,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `salaries`
--

INSERT INTO `salaries` (`id`, `assign_driver_id`, `amount`, `date`, `type`, `paid_unpaid`, `created_at`, `updated_at`, `deleted_at`) VALUES
(1, 128, '25000.00', '0000-00-00', 'online', 1, '2022-08-05 09:53:23', '2022-09-03 06:51:05', NULL),
(2, 128, '15500.00', '2022-05-08', 'online', 1, '2022-08-31 09:54:31', '2022-08-31 09:54:31', NULL),
(4, 225, '18000.00', '2022-07-01', 'online', 1, '2022-09-02 06:12:05', '2022-09-02 06:12:05', NULL),
(5, 128, '18000.00', '2022-10-15', 'online', 1, '2022-10-14 00:20:07', '2022-10-14 00:20:07', NULL),
(6, 206, '15000.00', '2022-11-21', 'online', 1, '2022-11-21 04:26:16', '2022-11-21 04:26:16', NULL),
(7, 104, '25000.00', '2022-11-22', 'online', 1, '2022-11-22 07:40:01', '2022-11-22 07:40:01', NULL),
(8, 107, '20000.00', '2022-10-22', 'online', 1, '2022-11-22 07:42:19', '2022-11-22 07:42:19', NULL),
(9, 128, '20000', '2022-12-14', 'online', 1, '2022-12-14 11:32:56', '2022-12-14 11:32:56', NULL),
(10, 128, '27000', '2022-12-10', 'online', 1, '2022-12-14 11:37:21', '2022-12-14 11:37:21', NULL),
(11, 128, '29000', '2022-12-11', 'online', 1, NULL, NULL, NULL),
(12, 128, '24000', '2022-12-14', 'online', 1, NULL, NULL, NULL),
(13, 128, '24000', '2022-12-14', 'online', 1, NULL, NULL, NULL),
(14, 128, '31000', '1970-01-01', 'online', 1, '2022-12-14 11:58:39', '2022-12-14 11:58:39', NULL),
(15, 128, '21000', '2022-10-12', 'online', 1, '2022-12-14 12:23:02', '2022-12-14 12:23:02', NULL),
(16, 128, '23000', '15-12-2022', 'online', 1, '2022-12-14 12:41:19', '2022-12-14 12:41:19', NULL),
(17, 128, '29000', '19-12-2022', 'online', 1, '2022-12-14 12:41:57', '2022-12-14 12:41:57', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `setting`
--

CREATE TABLE `setting` (
  `id` int(10) UNSIGNED NOT NULL,
  `app_logo` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `intro_screen_one_img` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `intro_screen_one_title` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `intro_screen_one_desc` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `intro_screen_two_img` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `intro_screen_two_title` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `intro_screen_two_desc` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `intro_screen_three_img` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `intro_screen_three_title` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `intro_screen_three_desc` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `refer_comission_amt` decimal(8,2) NOT NULL,
  `pagination_limit` int(11) NOT NULL,
  `helpline_number` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `helpline_email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `km_rate` decimal(10,2) NOT NULL,
  `per_km_panelty_rate` decimal(6,2) NOT NULL,
  `created_at` datetime NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  `updated_at` datetime DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `setting`
--

INSERT INTO `setting` (`id`, `app_logo`, `intro_screen_one_img`, `intro_screen_one_title`, `intro_screen_one_desc`, `intro_screen_two_img`, `intro_screen_two_title`, `intro_screen_two_desc`, `intro_screen_three_img`, `intro_screen_three_title`, `intro_screen_three_desc`, `refer_comission_amt`, `pagination_limit`, `helpline_number`, `helpline_email`, `km_rate`, `per_km_panelty_rate`, `created_at`, `updated_at`, `deleted_at`) VALUES
(1, '1aRpeVyVpGALjUG5uyiTGslq1lyM5EUUyneMLRCl.png', 'VkeN7hKfCC5XhVfkCRuzUBwMVNzWQVpT8M9Z2Fqc.png', 'demo 1', '<p>demo 1</p>', 'MxQYohpQBUJzakFkJ3gZ7gc9v43t1E9vUDBXffuW.jpg', 'demo 2', '<p>demo 2</p>', 'ME3RW2ptX5Xhm28MwxT2gOqmQgqZXVTFsHxkZDb4.jpg', 'demo 3', '<p>demo 3</p>', '10.50', 10, '9429420049', 'vyas339@gmail.com', '5.00', '2.50', '2022-09-19 14:00:27', '2022-09-19 08:30:27', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `setting_popup`
--

CREATE TABLE `setting_popup` (
  `id` int(10) UNSIGNED NOT NULL,
  `popup_title` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `popup_image` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `status` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `states`
--

CREATE TABLE `states` (
  `id` int(10) UNSIGNED NOT NULL,
  `state_name` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `status` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `states`
--

INSERT INTO `states` (`id`, `state_name`, `status`, `created_at`, `updated_at`, `deleted_at`) VALUES
(1, 'Gujarat', 'active', '2022-06-27 02:32:41', '2022-07-15 03:53:43', NULL),
(2, 'Delhi', 'deactive', '2022-06-28 05:24:17', '2022-07-29 07:58:19', NULL),
(3, 'Punjab', 'deactive', '2022-06-30 06:56:21', '2022-08-01 00:20:34', NULL),
(4, 'Rajasthan', 'active', '2022-07-07 02:15:05', '2022-08-01 00:20:20', NULL),
(5, 'Goa', 'active', '2022-07-16 07:30:07', '2022-07-16 07:30:07', NULL),
(6, 'Madhya Pradesh', 'active', '2022-07-16 07:30:51', '2022-07-16 07:30:51', NULL),
(7, 'Tripura', 'active', '2022-07-16 07:31:09', '2022-07-16 07:31:09', NULL),
(8, 'Keral', 'deactive', '2022-08-01 02:08:13', '2022-08-01 02:08:32', NULL),
(9, 'sdfsdfsdf', 'active', '2022-08-02 23:57:24', '2022-08-02 23:57:51', '2022-08-02 23:57:51');

-- --------------------------------------------------------

--
-- Table structure for table `staticdatas`
--

CREATE TABLE `staticdatas` (
  `id` int(10) UNSIGNED NOT NULL,
  `key_lable` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `value_lable` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `status` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `staticdatas`
--

INSERT INTO `staticdatas` (`id`, `key_lable`, `value_lable`, `status`, `created_at`, `updated_at`, `deleted_at`) VALUES
(1, '1', '12', 'deactive', '2022-06-27 04:46:20', '2022-07-04 06:29:05', '2022-07-04 06:29:05'),
(2, '2', '23', 'deactive', '2022-07-04 04:39:17', '2022-07-15 05:48:54', NULL),
(3, '3', '33', 'active', '2022-07-04 04:42:00', '2022-07-16 07:33:03', NULL),
(4, '1', '15', 'active', '2022-07-16 07:32:10', '2022-07-16 07:32:10', NULL),
(5, '4', '28', 'active', '2022-07-16 07:32:21', '2022-07-16 07:32:21', NULL),
(6, '5', '30', 'deactive', '2022-07-16 07:32:42', '2022-07-16 07:32:42', NULL),
(7, '6', '25', 'active', '2022-08-01 02:13:27', '2022-08-01 02:13:27', NULL),
(8, 'test', '25', 'active', '2022-12-13 05:29:22', '2022-12-13 05:29:22', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` int(20) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `email` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `email_verified_at` timestamp NULL DEFAULT NULL,
  `password` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `first_name` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `middle_name` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `last_name` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `mobile_no` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `gender` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `role` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `status` varchar(10) COLLATE utf8mb4_unicode_ci NOT NULL,
  `city` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `pincode` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `lati` decimal(8,6) DEFAULT NULL COMMENT '	use this in api for find near by driver',
  `state` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `date_of_birth` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `longi` decimal(9,6) DEFAULT NULL COMMENT 'use this in api for find near by driver',
  `is_online` int(9) DEFAULT 1,
  `reffer_by` int(9) DEFAULT NULL,
  `is_assigned` int(9) DEFAULT NULL,
  `profile_image` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `reffral_code` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `verify_user` int(9) DEFAULT 0,
  `is_doc_verified` int(11) NOT NULL DEFAULT 0,
  `remember_token` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `device_token` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `country_code` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `name`, `email`, `email_verified_at`, `password`, `first_name`, `middle_name`, `last_name`, `mobile_no`, `gender`, `role`, `status`, `city`, `pincode`, `lati`, `state`, `date_of_birth`, `longi`, `is_online`, `reffer_by`, `is_assigned`, `profile_image`, `reffral_code`, `verify_user`, `is_doc_verified`, `remember_token`, `created_at`, `updated_at`, `device_token`, `country_code`) VALUES
(1, 'snehal vyas', 'admin@admin.com', NULL, '$2y$10$XJl/pJRWE0z3L6f.OlJAjeTicCh7pjrB9DUY1eQ9bCfot0ShoHoJ2', 'Jaypalsinh', 's', '', '8078485724', 'male', 'ADMIN', 'active', 'Deesa', '385001', '12.000000', 'Gujarat', '2022-07-10', '0.000000', 0, 74, 0, 'qGO6XiUVWjtGxqbfGbbZqpbOAi6T5MI4vxVbiiRM.png', '', 0, 0, NULL, '2022-06-22 01:32:52', '2022-11-02 07:19:35', 'xUqfzj1x7f0F8bpQNYyjIf13zRGHEQQNozy2QizP', ''),
(5, 'Dushyant', 'dushyant@gmail.com', NULL, '$2y$10$PJF2eFMqcaW6vviOUoMDkeNvqX4xw9nZhhECv.ZQiIexpadR/FU1a', 'Dushyant11', 'Dashrath Bhai', 'Chhatraliya1', '9586958623', 'male', 'DRIVER', 'active', 'palanpur', '385001', '24.174051', 'Gujarat', '2022-12-12', '72.433098', 1, NULL, NULL, '7CU4OvGmBqpwiRRp3f3mN5EEs0eOTZ77YlT28ZJs.png', NULL, 1, 1, NULL, '2022-07-06 22:50:00', '2022-10-11 01:36:41', NULL, ''),
(13, 'dinesh', 'ds@gmail.com', NULL, NULL, 'gjhgjh', 'jhgjh', 'jhgjh', '8748571564', NULL, NULL, '', 'Deesa', NULL, '21.000000', 'Gujarat', '2022-11-11', NULL, NULL, NULL, NULL, 'WUMNpDe7usqhWcA6FKis7bkhe9MaErT08wsMUMPs.png', NULL, NULL, 0, NULL, '2022-07-06 23:37:10', '2022-07-06 23:37:10', NULL, ''),
(16, 'daya', 'ds11@gmail.com', NULL, NULL, 'gjhgjh', 'jhgjh', 'jhgjh', '8542103568', NULL, 'DRIVER', '', 'Palanpur', NULL, '23.022505', 'Gujarat', '2022-11-11', '72.571365', 1, NULL, NULL, 'EjCiLCsNtqFUB1xBPmKWQu0QchcZXY36xFkACyf7.png', NULL, 1, 0, NULL, '2022-07-06 23:39:04', '2022-07-06 23:39:04', NULL, ''),
(18, 'ganesh', 'gd@gmail.com', NULL, NULL, 'Hello', 'jkl', 'jkl', '4851243565', NULL, NULL, '', 'Deesa', NULL, '12.000000', 'Gujarat', '1202-12-12', NULL, NULL, NULL, NULL, 'vhzJCvVyxYdgio4dl7EFmkvmnnBGpfxDzZ3QUkWE.jpg', NULL, NULL, 0, NULL, '2022-07-06 23:46:56', '2022-07-06 23:46:56', NULL, ''),
(21, '', 'gd12@gmail.com', NULL, NULL, 'dfg', 'dfg', 'dg', '7458963512', NULL, NULL, '', 'Palanpur', NULL, '12.000000', 'Gujarat', '2222-12-12', NULL, NULL, NULL, NULL, 'k5vpnzJHH2p7epGy5rhe1CdJ1YrSDOs94L4DF3pO.png', NULL, NULL, 0, NULL, '2022-07-07 00:05:18', '2022-07-07 00:05:18', NULL, ''),
(23, '', 'gd123@gmail.com', NULL, NULL, 'dfg', 'dfg', 'dg', '9865327154', NULL, NULL, '', 'Deesa', NULL, '12.000000', 'Gujarat', '2222-12-12', NULL, NULL, NULL, NULL, 'XPyTxVFz1DPMZvqoiiyt1szsyayW5wKSNeYixEej.png', NULL, NULL, 0, NULL, '2022-07-07 00:06:20', '2022-07-07 00:06:20', NULL, ''),
(24, '', 'vyas339@gmail.com', NULL, NULL, 'Snehal', 'p', 'Vyas', '9429420045', NULL, NULL, '', 'Palanpur', NULL, '11.000000', 'Gujarat', '2022-07-07', NULL, NULL, NULL, NULL, 'Jra96Dw6CFlSkeOjrJb49sEg9K884maUZZ36cUr2.png', NULL, NULL, 0, NULL, '2022-07-07 00:30:12', '2022-07-07 00:30:12', NULL, ''),
(26, '', 'mayank@gmail.com', NULL, NULL, 'mayank', 'thakor', 'thakor', '9856741420', NULL, NULL, '', 'Deesa', NULL, NULL, 'Gujarat', '2022-07-07', NULL, NULL, NULL, NULL, NULL, NULL, NULL, 0, NULL, '2022-07-07 03:56:38', '2022-07-07 03:56:38', NULL, ''),
(35, NULL, 'priyank@gmail.com', NULL, NULL, 'Priyank', 'Haresh Bhai', 'Darji', '9874556120', 'male', 'CUSTOMER', 'active', 'Palanpur', '123456', '24.174051', 'Gujarat', '2202-02-12', '72.433098', 1, NULL, NULL, 'mptdTW0oHNrQCrMsfIkq2BEPDrinpu6pTxakg8xk.png', NULL, 1, 0, NULL, '2022-07-07 06:54:10', '2022-07-16 03:39:48', NULL, ''),
(44, NULL, 'ronak@gmail.com', NULL, NULL, 'jas', 'thakor', 'thakor', '9874561230', 'other', 'CUSTOMER', 'deactive', 'Deesa', '385001', NULL, 'Gujarat', '2022-07-15', NULL, NULL, NULL, NULL, '6kpdjRHb0MnMpM3KtFcZyRsCC6wpRBO9EMPgmHOU.png', NULL, NULL, 0, NULL, '2022-07-08 02:07:05', '2022-07-16 03:40:36', NULL, ''),
(52, NULL, 'piyush12@gmail.com', NULL, NULL, 'piyush12', 'thakor', 'thakor', '9865987548', NULL, NULL, '', 'Palanpur', '385535', NULL, 'Gujarat', '2022-07-11', NULL, NULL, NULL, NULL, 'qeFbZRMopn89uWMGVr44Mxn035nJLNnfRVcvy6BL.jpg', NULL, NULL, 0, NULL, '2022-07-11 03:42:03', '2022-07-11 03:42:03', NULL, ''),
(64, NULL, 'kiran123@gmail.com', NULL, NULL, 'kiran123', 'thakor', 'thakor', '9632356982', 'male', 'CUSTOMER', '', 'Deesa', '385510', NULL, 'Gujarat', '2022-07-13', NULL, NULL, NULL, NULL, NULL, NULL, NULL, 0, NULL, '2022-07-13 04:07:36', '2022-07-13 04:08:15', NULL, ''),
(72, NULL, 'sdff@gmail.com', NULL, NULL, 'dsfsd', 'sdfsd', 'sdfsd', '8745896548', 'male', 'CUSTOMER', '', 'Palanpur', '385535', NULL, 'Gujarat', '2022-07-01', NULL, NULL, NULL, NULL, NULL, NULL, NULL, 0, NULL, '2022-07-14 06:44:21', '2022-07-14 06:44:21', NULL, ''),
(73, NULL, 'dipak@gmail.com', NULL, NULL, 'Dipak', 'kumar', 'Mali', '7548689525', 'male', 'CUSTOMER', 'active', 'Deesa', '385001', NULL, 'Gujarat', '2022-07-15', NULL, NULL, NULL, NULL, NULL, 'tk7ahp', NULL, 0, NULL, '2022-07-14 06:47:40', '2022-07-31 23:12:28', NULL, ''),
(74, NULL, 'fgd@gmail.com', NULL, NULL, 'fdgd', 'dfg', 'dfg', '6585754857', 'male', 'CUSTOMER', '', 'Palanpur', '132465', NULL, 'Gujarat', '2022-07-01', NULL, NULL, NULL, NULL, NULL, 'zcb8dt', NULL, 0, NULL, '2022-07-14 06:48:38', '2022-07-14 06:48:38', NULL, ''),
(76, NULL, 'gsdf@gmail.com', NULL, NULL, 'demoname', 'fghgf', 'hfgh', '8525451424', 'male', 'CUSTOMER', 'active', 'Deesa', '132465', NULL, 'Gujarat', '2022-07-02', NULL, NULL, NULL, NULL, NULL, 'p9ikoy', NULL, 0, NULL, '2022-07-14 07:01:51', '2022-07-15 06:04:08', NULL, ''),
(88, NULL, 'vivek1237@gmail.com', NULL, NULL, 'Vivek', 'kumar', 'Thakor', '7586421537', 'male', 'CUSTOMER', 'active', 'Palanpur', '385001', NULL, 'Gujarat', '2022-07-09', NULL, NULL, NULL, NULL, '3s9sjkvrwOpPryXKbocoka2w0oQxX06sftpsJhPB.png', 'vcyqb4', NULL, 0, NULL, '2022-07-16 04:28:16', '2022-09-02 05:38:46', NULL, ''),
(99, NULL, 'jkl32@gmail.com', NULL, NULL, 'Rajesh', 'Bhai', 'Solanki', '7548142435', 'male', 'DRIVER', 'active', 'Deesa', '385535', '23.022505', 'Gujarat', '2020-02-12', '72.571365', 1, 286, NULL, 'V7UtLvTPgTgUtZMQu0AanVwm6UQwZvLlh2EGVNRg.png', 'agb08i', 1, 1, NULL, '2022-07-18 04:39:07', '2022-10-12 04:41:05', NULL, ''),
(100, NULL, 'kiran1@gmail.com', NULL, NULL, 'kiran', 'thakor', 'thakor', '9632587410', 'male', 'CUSTOMER', 'deactive', 'Palanpur', '385510', NULL, 'Gujarat', '2022-07-18', NULL, NULL, NULL, NULL, NULL, '3wy5op', NULL, 0, NULL, '2022-07-18 05:16:51', '2022-07-18 05:16:51', NULL, ''),
(101, NULL, 'dushyant9898@gmail.com', NULL, NULL, 'Dushyant', 'Dashrath bhai', 'Chhatraliya', '9575486845', 'male', 'DRIVER', 'active', 'Palanpur', '385001', '23.587961', 'Gujarat', '2020-02-12', '72.369324', 1, 5, NULL, '11uN9CBCwfUDyhuEEI1fAOjgD8V7lSoi0W7Jhvmy.png', 'h10fda', 1, 1, NULL, '2022-07-19 02:08:29', '2022-11-09 01:08:33', NULL, ''),
(104, NULL, 'jasu@gmail.com', NULL, NULL, 'Jasu', 'Bhai', 'Thakor', '9898989898', 'male', 'DRIVER', 'deactive', 'Palanpur', '385001', NULL, 'Gujarat', '2022-07-20', NULL, NULL, NULL, NULL, 'IpdyEflqLkEhM8hPLTF1ocgRpjy94WpV5iOO437b.png', 'ol21w9', 1, 1, NULL, '2022-07-20 06:24:14', '2022-10-07 01:14:14', NULL, ''),
(105, NULL, 'naresh@gmail.com', NULL, NULL, 'naresh', 'ramesh Bhai', 'darji', '9575412401', 'male', 'CUSTOMER', 'active', 'Deesa', '385001', NULL, 'Gujarat', '2022-07-21', NULL, NULL, NULL, NULL, 'zKhayQJ0D1gvzSETn0hyAf9ErwDUGW9EPF4k3eH9.jpg', 'ne4xyw', NULL, 0, NULL, '2022-07-21 00:34:02', '2022-07-21 00:34:26', NULL, ''),
(107, NULL, 'faisu@gmail.com', NULL, NULL, 'faisu', 'Piyush Bhai', 'thakor', '9898989898', 'male', 'DRIVER', 'deactive', 'Deesa', '385535', NULL, 'Gujarat', '2022-07-22', NULL, NULL, NULL, NULL, 'p5CWk70yYrzNaXpUP8esn2tOXoNL7GRDqgXjp6qe.png', 'yb9cza', NULL, 0, NULL, '2022-07-21 23:20:45', '2022-10-11 01:44:59', NULL, ''),
(117, NULL, 'dushyany1@gmail.com', NULL, '$2y$10$OFvJzXbu9zscmkYnNampD.i8Ioi80QP1miOWuiAXi5M14CZgxoBl2', 'Dushyant', 'Dashrath bhai', 'Dashrath bhai', '6858754895', 'male', 'CUSTOMER', 'active', 'Deesa', '355535', NULL, 'Gujarat', '2022-08-10', NULL, NULL, NULL, NULL, 'BmeWeroqNIuJ5Frt99bkSNGA23nwCbi4NlyR4pqD.jpg', 'sx13dq', NULL, 0, NULL, '2022-07-26 06:17:15', '2022-07-26 06:17:15', NULL, ''),
(128, 'jasubhai', 'jas@gmail.com', NULL, '12345678', 'jasthakor', 'khodliya', 'thakor', '9393939393', 'male', 'DRIVER', 'active', 'Palanpur', '385001', NULL, 'Gujarat', '2000-02-20', NULL, 1, 130, NULL, 'DhRdtaHvnC8KLqzQ3A9iel5zC1nkC46SY01pQ0FG.png', '5o7nyv', 1, 1, NULL, '2022-07-28 04:50:24', '2022-12-15 12:35:26', NULL, NULL),
(130, NULL, 'dushyant12@gmail.com', NULL, NULL, 'Dushyant', 'kumar', 'Parmar', '9586958695', 'male', 'DRIVER', 'active', 'Deesa', '385535', NULL, 'Gujarat', '1998-08-01', NULL, NULL, NULL, NULL, 'tqFsURGmzyRIZfQvZ9T6f9HYe4zLL5Z1Hf6zXlop.png', 'xht5zc', NULL, 0, NULL, '2022-07-31 23:21:23', '2022-10-07 06:56:34', NULL, ''),
(131, NULL, 'jaswant@gmail.com', NULL, NULL, 'Jaswant', 'Kumar', 'Mali', '9636251542', 'male', 'DRIVER', 'active', 'Palanpur', '385001', NULL, 'Gujarat', '1992-12-31', NULL, NULL, NULL, NULL, 'r1XxmLyf26JljQn37OWf5eTk2zTSx0QNcYTfHXdE.png', 'tdgzvy', NULL, 0, NULL, '2022-08-01 00:49:17', '2022-08-16 00:31:03', NULL, ''),
(132, NULL, 'paresh@gmail.com', NULL, NULL, 'Paresh', 'kumar', 'Mali', '9878451542', 'male', 'DRIVER', 'active', 'Palanpur', '385001', NULL, 'Gujarat', '1998-06-01', NULL, NULL, NULL, NULL, 'YfGCwWnrawVPcrPnIGqrg65Noczq5LEXhl6Xe9Q5.png', 'gfmaec', 1, 0, NULL, '2022-08-01 01:06:31', '2022-10-11 01:46:39', NULL, ''),
(134, NULL, 'sunil12@gmail.com', NULL, NULL, 'Sunil', 'kumar', 'Darji', '9865321124', 'male', 'DRIVER', 'active', 'Deesa', '385535', NULL, 'Gujarat', '1999-07-02', NULL, NULL, 148, NULL, 'EhXx6jkhjkU1p2htdvvqewHG44lHaYh0sLcoS1tU.png', '1v5dkm', NULL, 0, NULL, '2022-08-01 01:15:22', '2022-10-11 01:47:16', NULL, ''),
(136, NULL, 'vinay@gmail.com', NULL, NULL, 'Vinay', 'kumar', 'Rathore', '9999999999', 'male', 'CUSTOMER', 'active', 'Deesa', '385535', NULL, 'Gujarat', '1997-06-01', NULL, NULL, NULL, NULL, 'iXEFJaOOzadnJmP6Ni47SSoHBVshXqB6LzzKCQjp.png', '8ip50t', NULL, 0, NULL, '2022-08-01 01:44:48', '2022-08-01 01:46:06', NULL, ''),
(137, NULL, 'vikram@gmail.com', NULL, NULL, 'Vikram', 'kumar', 'Soni', '9999999999', 'male', 'CUSTOMER', 'active', 'Palanpur', '385001', NULL, 'Gujarat', '1997-06-01', NULL, NULL, NULL, NULL, '7x1UPjtvVMO1ymWCc5NbCH6no4UVnNUfD6XcekwR.png', 'ctjy1x', NULL, 0, NULL, '2022-08-01 02:40:12', '2022-08-01 02:40:12', NULL, ''),
(139, NULL, 'vinod@gmail.com', NULL, NULL, 'Vinod', 'kumar', 'Darji', '9797979797', 'male', 'DRIVER', 'active', 'Palanpur', '385001', NULL, 'Gujarat', '1999-07-01', NULL, NULL, 148, NULL, 'QVZ0KLcFWYMSQSSuzT3QkUEo681LNsrK1JVsIogN.png', 'i1g32h', NULL, 0, NULL, '2022-08-01 02:50:11', '2022-10-11 01:47:45', NULL, ''),
(141, NULL, 'vimal@gmail.com', NULL, '$2y$10$HOC6zWQYZXkkDoIGG2zya.b4i3bi/5.wg/UlY8sJx2WSnc7c5RvfS', 'Vimal', 'Kumar', 'Parmar', '7575757575', 'male', 'DRIVER', 'active', 'Palanpur', '385001', NULL, 'Gujarat', '2000-07-01', NULL, NULL, NULL, NULL, 'OUY7uCq5pTsXuneEfSDfe9tOyAfWdzbfCSrvpM0q.png', 'b6ls3m', NULL, 0, NULL, '2022-08-01 03:00:33', '2022-08-30 01:25:14', NULL, ''),
(142, NULL, 'ramesh@gmail.com', NULL, NULL, 'Ramesh', 'Kumar', 'Mali', '9429420045', 'male', 'DRIVER', 'active', 'Deesa', '385535', NULL, 'Gujarat', '2022-08-01', NULL, NULL, NULL, NULL, NULL, 'pdimxq', NULL, 0, NULL, '2022-08-08 01:11:46', '2022-10-11 01:48:57', NULL, ''),
(146, NULL, 'jas@jas.com', NULL, '$2y$10$EJwvQDaq.8rT3WAHVCo4zuydQdVtzeUtYhIJkzoiwcWPTdz6YssVq', 'jas', 'Rahul Bhai', 'Thakor', '9125354575', 'male', 'CUSTOMER', 'active', 'Palanpur', '385001', NULL, 'Gujarat', '2022-08-10', NULL, NULL, 192, NULL, 'rJSL64HHTH6JvVuHUQsZf3RdJlmX4CbhPBqg5I4o.png', '62n8qr', 1, 0, NULL, '2022-08-10 07:28:30', '2022-10-13 02:51:54', NULL, ''),
(148, NULL, 'kishan@gmail.com', NULL, '$2y$10$qR/OhV2M9uoI0uqF8Rg/K.1MrSbB6Dsbm7HPMWhHcxXpL7E/bDt3S', 'Kishan', 'Lala Bhai', 'Thakor', '9685451524', 'male', 'DRIVER', 'active', 'Palanpur', '385001', NULL, 'Gujarat', '2022-08-12', NULL, NULL, 128, NULL, NULL, '62ki0p', NULL, 1, NULL, '2022-08-12 01:20:04', '2022-10-11 01:49:38', NULL, ''),
(150, NULL, 'prakash@jas.com', NULL, '$2y$10$uLd18rvgrb/JR26Uxf76luH25ukq2rzewCx0.zD1iXNu9S9kE.qDS', 'Prakash', 'Rahul Bhai', 'Thakor', '9878451215', 'male', 'CUSTOMER', 'active', 'Palanpur', '385001', NULL, 'Gujarat', '2022-08-10', NULL, NULL, 192, NULL, NULL, 'j2qtok', 1, 0, NULL, '2022-08-12 02:43:06', '2022-08-12 02:43:06', NULL, ''),
(151, NULL, 'pankaj@jas.com', NULL, '$2y$10$jbqJ.fyMVAz3lOUMI8EOLOIZyB9/4hIAwfFugINUxD0Hz7G8LiCeK', 'Gaju Bhai', 'Kanti Bhai', 'Thakor', '9865321245', 'male', 'CUSTOMER', 'active', 'Deesa', '385001', NULL, 'Gujarat', '2022-08-10', NULL, NULL, 192, NULL, NULL, 'd6q59f', 1, 0, NULL, '2022-08-12 02:44:02', '2022-08-12 02:44:02', NULL, ''),
(152, NULL, 'jaydip@jas.com', NULL, '$2y$10$9x80KViAeSZgBTHUjYdgAOFsFlv6s9SX97Ezj3hK5YmM5poaWvXmK', 'Ganesh Bhai', 'Bhikha Bhai', 'Thakor', '6584596523', 'male', 'CUSTOMER', 'active', 'Palanpur', '385001', NULL, 'Gujarat', '2022-08-10', NULL, NULL, 219, NULL, NULL, 'koy2d7', 1, 0, NULL, '2022-08-12 02:45:04', '2022-08-12 02:45:04', NULL, ''),
(153, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '9586958696', NULL, NULL, 'active', 'Deesa', '385001', NULL, 'Gujarat', '2022-08-10', NULL, NULL, NULL, NULL, NULL, NULL, NULL, 0, NULL, '2022-08-19 02:43:11', '2022-08-19 02:43:11', NULL, ''),
(158, NULL, NULL, NULL, NULL, 'Paresh', 'kumar', 'Parmar', '8545124566', NULL, 'CUSTOMER', 'active', 'Deesa', '385001', NULL, 'Gujarat', '2022-08-10', NULL, NULL, NULL, NULL, NULL, 'ra95jf', NULL, 0, NULL, '2022-08-19 03:40:33', '2022-08-19 03:40:33', NULL, ''),
(161, NULL, 'rajesh999@gmail.com', NULL, NULL, 'rajesh', 'm', 'balecha', '1245678904', 'male', 'CUSTOMER', 'active', 'Palanpur', '385535', NULL, 'Gujarat', '2022-08-23', NULL, NULL, NULL, NULL, NULL, 'rcwbd2', NULL, 0, NULL, '2022-08-22 05:10:41', '2022-08-22 05:10:41', NULL, ''),
(163, NULL, 'fgf@gmail.com', NULL, NULL, 'gfhg', 'fh', 'fghf', '1324567890', 'male', 'CUSTOMER', 'active', 'Palanpur', '13654', NULL, 'Gujarat', '2022-08-06', NULL, NULL, NULL, NULL, NULL, 'zxfhqr', NULL, 0, NULL, '2022-08-22 05:44:08', '2022-08-22 05:44:08', NULL, ''),
(164, NULL, 'fdh@gmail.com', NULL, NULL, 'fg', 'dfg', 'fd', '1324798310', 'male', 'CUSTOMER', 'active', 'Deesa', '12346', NULL, 'Gujarat', '2022-08-05', NULL, NULL, NULL, NULL, NULL, '7fa3cg', NULL, 0, NULL, '2022-08-22 05:45:50', '2022-08-22 05:45:50', NULL, ''),
(165, NULL, 'gh@gmail.com', NULL, NULL, 'fg', 'fd', 'fdgf', '1234567890', 'male', 'CUSTOMER', 'active', 'Palanpur', '132687', NULL, 'Gujarat', '2022-08-13', NULL, NULL, NULL, NULL, NULL, 'o8fzbm', NULL, 0, NULL, '2022-08-22 05:49:42', '2022-08-22 05:49:42', NULL, ''),
(166, NULL, 'ght@gmail.com', NULL, NULL, 'fg', 'fd', 'fdgf', '1234567890', 'male', 'CUSTOMER', 'active', 'Deesa', '132687', NULL, 'Gujarat', '2022-08-13', NULL, NULL, NULL, NULL, NULL, 'ytjorc', NULL, 0, NULL, '2022-08-22 05:50:03', '2022-08-22 05:50:03', NULL, ''),
(167, NULL, 'ghtr@gmail.com', NULL, NULL, 'fg', 'fd', 'fdgf', '1234567890', 'male', 'CUSTOMER', 'active', 'Palanpur', '132687', NULL, 'Gujarat', '2022-08-13', NULL, NULL, NULL, NULL, NULL, 'xgzi07', NULL, 0, NULL, '2022-08-22 05:50:58', '2022-08-22 05:50:58', NULL, ''),
(168, NULL, 'ghtr6@gmail.com', NULL, NULL, 'fg', 'fd', 'fdgf', '1234567890', 'male', 'CUSTOMER', 'active', 'Deesa', '132687', NULL, 'Gujarat', '2022-08-13', NULL, NULL, NULL, NULL, NULL, 'l8gxjh', NULL, 0, NULL, '2022-08-22 05:51:15', '2022-08-22 05:51:15', NULL, ''),
(169, NULL, 'ghtr60@gmail.com', NULL, NULL, 'fg', 'fd', 'fdgf', '1234567890', 'male', 'CUSTOMER', 'active', 'Palanpur', '132687', NULL, 'Gujarat', '2022-08-13', NULL, NULL, NULL, NULL, NULL, 'h4mzc0', NULL, 0, NULL, '2022-08-22 05:52:39', '2022-08-22 05:52:39', NULL, ''),
(170, NULL, 'ghtr602@gmail.com', NULL, NULL, 'fg', 'fd', 'fdgf', '1234567890', 'male', 'CUSTOMER', 'active', 'Palanpur', '132687', NULL, 'Gujarat', '2022-08-13', NULL, NULL, NULL, NULL, NULL, 'q4bxky', NULL, 0, NULL, '2022-08-22 05:54:26', '2022-08-22 05:54:26', NULL, ''),
(171, NULL, 'ghtr6022@gmail.com', NULL, NULL, 'fg', 'fd', 'fdgf', '1234567890', 'male', 'CUSTOMER', 'active', 'Deesa', '132687', NULL, 'Gujarat', '2022-08-13', NULL, NULL, NULL, NULL, NULL, 'l0n6mz', NULL, 0, NULL, '2022-08-22 05:54:54', '2022-08-22 05:54:54', NULL, ''),
(172, NULL, 'ghtr23@gmail.com', NULL, NULL, 'fg', 'fd', 'fdgf', '1234567890', 'male', 'CUSTOMER', 'active', 'Palanpur', '132687', NULL, 'Gujarat', '2022-08-13', NULL, NULL, NULL, NULL, NULL, '79vds0', NULL, 0, NULL, '2022-08-22 05:57:02', '2022-08-22 05:57:02', NULL, ''),
(173, NULL, 'ghtr223@gmail.com', NULL, NULL, 'fg', 'fd', 'fdgf', '1234567890', 'male', 'CUSTOMER', 'active', 'Palanpur', '132687', NULL, 'Gujarat', '2022-08-13', NULL, NULL, NULL, NULL, NULL, 'thwji4', NULL, 0, NULL, '2022-08-22 05:57:21', '2022-08-22 05:57:21', NULL, ''),
(174, NULL, 'hfd@gmail.com', NULL, NULL, 'fg', 'fdg', 'fdg', '1324567890', 'male', 'CUSTOMER', 'active', 'Deesa', '123465', NULL, 'Gujarat', '2022-08-18', NULL, NULL, NULL, NULL, NULL, 'r8b5ze', NULL, 0, NULL, '2022-08-22 06:05:59', '2022-08-22 06:05:59', NULL, ''),
(175, NULL, 'hfd41@gmail.com', NULL, NULL, 'fg', 'fdg', 'fdg', '1324567890', 'male', 'CUSTOMER', 'active', 'Palanpur', '123465', NULL, 'Gujarat', '2022-08-18', NULL, NULL, NULL, NULL, NULL, 'je134x', NULL, 0, NULL, '2022-08-22 06:06:13', '2022-08-22 06:06:13', NULL, ''),
(176, NULL, 'hfd412@gmail.com', NULL, NULL, 'fg', 'fdg', 'fdg', '1324567890', 'male', 'CUSTOMER', 'active', 'Palanpur', '123465', NULL, 'Gujarat', '2022-08-18', NULL, NULL, NULL, NULL, NULL, '1t8m0i', NULL, 0, NULL, '2022-08-22 06:06:47', '2022-08-22 06:06:47', NULL, ''),
(177, NULL, 'hfd4125@gmail.com', NULL, NULL, 'fg', 'fdg', 'fdg', '1324567890', 'male', 'CUSTOMER', 'active', 'Deesa', '123465', NULL, 'Gujarat', '2022-08-18', NULL, NULL, NULL, NULL, NULL, '5mxo2n', NULL, 0, NULL, '2022-08-22 06:09:35', '2022-08-22 06:09:35', NULL, ''),
(178, NULL, 'hfd41252@gmail.com', NULL, NULL, 'fg', 'fdg', 'fdg', '1324567890', 'male', 'CUSTOMER', 'active', 'Palanpur', '123465', NULL, 'Gujarat', '2022-08-18', NULL, NULL, NULL, NULL, NULL, 'd826mt', NULL, 0, NULL, '2022-08-22 06:12:11', '2022-08-22 06:12:11', NULL, ''),
(179, NULL, 'hfd43@gmail.com', NULL, NULL, 'fg', 'fdg', 'fdg', '1324567890', 'male', 'CUSTOMER', 'active', 'Palanpur', '123465', NULL, 'Gujarat', '2022-08-18', NULL, NULL, NULL, NULL, NULL, '2s8xzw', NULL, 0, NULL, '2022-08-22 06:12:59', '2022-08-22 06:12:59', NULL, ''),
(181, NULL, 'hjkl@gmail.com', NULL, NULL, 'ghg', 'fgh', 'fgh', '1234569912', 'male', 'DRIVER', 'active', 'Deesa', '385535', NULL, 'Gujarat', '2022-08-04', NULL, NULL, 286, NULL, NULL, 'eqk4vi', NULL, 0, NULL, '2022-08-22 07:04:24', '2022-08-22 07:04:24', NULL, ''),
(186, NULL, 'nirmal@gmail.com', NULL, NULL, NULL, NULL, NULL, '8545124556', NULL, 'CUSTOMER', 'active', 'Palanpur', NULL, NULL, 'Gujarat', '2022-08-10', NULL, NULL, NULL, NULL, NULL, 'z2390n', NULL, 0, NULL, '2022-08-23 05:48:07', '2022-08-23 05:48:07', NULL, '91'),
(192, 'Gautam', 'gautam@gmail.com', NULL, NULL, 'Gautam', 'Kumar', 'Mali', '8545124528', 'male', 'CUSTOMER', 'active', 'Deesa', '385535', NULL, 'Gujarat', '2022-08-10', NULL, NULL, NULL, NULL, NULL, '8zlfc0', 1, 0, NULL, '2022-08-23 06:06:14', '2022-08-23 06:06:14', NULL, '91'),
(193, NULL, 'vyas30039@gmail.com', NULL, NULL, 'Snehal', 'Ideas', 'Vyas', '9429420049', 'male', 'CUSTOMER', 'active', 'Deesa', '385001', NULL, 'Gujarat', '2022-08-01', NULL, NULL, 219, NULL, NULL, 'rb42et', NULL, 0, NULL, '2022-08-23 06:39:48', '2022-08-23 06:39:48', NULL, NULL),
(194, NULL, 'hardik@gmail.com', NULL, '$2y$10$KOP6/KUFy8l6uRiDRd/bceQXbF.5FRAHBKLrdXZ7lsVqlu9OaCEJO', 'Hardik LL', 'Mansukh bhai', 'lllllll', '1122334455', 'male', 'DRIVER', 'active', 'Deesa', '385535', NULL, 'Gujarat', '2022-02-22', NULL, NULL, 286, NULL, NULL, 'twpyj3', 1, 1, NULL, '2022-08-23 23:56:31', '2022-11-12 01:09:14', NULL, NULL),
(206, NULL, 'hardikkumar@gmail.com', NULL, NULL, 'Hardik', 'M', 'Dabhi', '5544332211', 'male', 'DRIVER', 'deactive', 'Deesa', '385535', NULL, 'Gujarat', '2022-08-05', NULL, NULL, 128, NULL, '21Rb5YJJMtkkessUjkkmZ4QiKruF3GrHC7FHmjFR.png', 'i51ayq', 1, 1, NULL, '2022-08-25 23:49:53', '2022-10-12 00:43:13', NULL, NULL),
(207, 'Hitesh', 'hiteshkumar12@gmail.com', NULL, NULL, 'Hitesh', 'Jaytilal', 'Chauhan', '9874561256', 'male', 'DRIVER', 'active', 'Deesa', '385535', NULL, 'Gujarat', '2022-08-27', NULL, NULL, NULL, NULL, '9Yk2z7kJErxm8L2yAxiLFm5KNkdZxiiDxIqgmldi.png', 'a6q0bw', 1, 1, NULL, '2022-08-26 00:42:44', '2022-10-11 01:58:11', NULL, NULL),
(208, NULL, 'sanjay@gmail.com', NULL, NULL, 'Sanjay', 'Vinod Bhai', 'Makvana', '9988776655', 'male', 'CUSTOMER', 'active', 'Deesa', '385535', NULL, 'Gujarat', '2022-08-27', NULL, NULL, 219, NULL, NULL, 'fa2wrc', 0, 0, NULL, '2022-08-26 02:03:16', '2022-08-26 02:03:16', NULL, NULL),
(209, NULL, 'vinamra@gmail.com', NULL, NULL, 'Vinamra', 'kumar', 'Parmar', '8523571592', 'male', 'DRIVER', 'active', 'Palanpur', '355001', NULL, 'Gujarat', '2022-08-25', NULL, NULL, NULL, NULL, 'qNk5zUIZtsFOO9WZZHTEL2sdamDdal3t1TR6JMDh.png', 'cx4w6f', 1, 1, NULL, '2022-08-26 07:21:46', '2022-08-29 06:36:55', NULL, '91'),
(210, NULL, 'jivan@gmail.com', NULL, NULL, NULL, NULL, NULL, '9971856234', NULL, 'CUSTOMER', 'active', 'Deesa', NULL, NULL, 'Gujarat', '2022-08-10', NULL, 1, NULL, NULL, NULL, 'zqel5f', 0, 0, NULL, '2022-08-29 00:31:05', '2022-08-29 00:31:05', NULL, '91'),
(216, NULL, 'hardikdesai@gmail.com', NULL, '$2y$10$GZzs2OSSKes7RTVuI9h5S.QH6gQkf/g9rXcS9ie0n/Jdu6D9cmxei', 'Hardik LL', 'Mansukh bhai', 'lllllll', '1122334456', 'male', 'DRIVER', 'active', 'Palanpur', '385001', NULL, 'Gujarat', '2022-02-20', NULL, 1, NULL, NULL, 'QvH0Art2snMaQ6dFAHrBYb5vsIygjfVNt0DQlhts.png', 'fgjz42', 1, 1, NULL, '2022-08-29 03:02:24', '2022-11-12 02:09:24', NULL, NULL),
(217, NULL, 'hardik123@gmail.com', NULL, '$2y$10$dcfJFCPQHiMwGPjsLXHh4e/QJEfjLHDm5JLfTV6Pp0JHWi7UxPce.', 'Hardik', 'Mansukh bhai', 'Parmar', '3322116655', 'male', 'DRIVER', 'active', 'Palanpur', '385001', NULL, 'Gujarat', '2022-02-20', NULL, 1, NULL, NULL, 'tjMBOz6Fy218gXQQ9zTwjB32b7FHmRMojgmHk3Ej.png', '6oksv7', 1, 0, NULL, '2022-08-29 03:20:10', '2022-10-11 02:06:12', NULL, NULL),
(219, NULL, 'ravi@gmail.com', NULL, '11223344', 'Ravi', 'Hanshraj bhai', 'Makvana', '1122558336', 'male', 'CUSTOMER', 'active', 'palanpur', '385535', '24.174051', 'Gujarat', '2022-10-01', '72.433098', 1, 74, NULL, NULL, 'jf4ws6', 1, 0, NULL, '2022-08-30 01:23:54', '2022-11-08 04:03:53', NULL, '91'),
(224, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '8545124555', NULL, 'CUSTOMER', 'active', 'Palanpur', NULL, NULL, 'Gujarat', '2022-08-10', NULL, 1, NULL, NULL, NULL, 'xaezlk', 0, 0, NULL, '2022-09-01 05:26:53', '2022-09-01 05:26:53', NULL, '91'),
(225, NULL, 'savan1234@gmail.com', NULL, NULL, 'Savan', 'Kumar', 'Mali', '9905230142', 'male', 'DRIVER', 'active', 'Palanpur', '385001', NULL, 'Gujarat', '2022-08-10', NULL, 1, NULL, NULL, 'dYYKbmmLw0JjE1LbDaXVOtPUtUBTlDvi7MoWfNo1.png', 'hgl62j', 0, 0, NULL, '2022-09-02 02:08:28', '2022-10-11 02:13:07', NULL, '91'),
(227, NULL, NULL, NULL, NULL, 'Hasmukh', 'Sankar bhai', 'Makvana', '9856321245', 'male', 'CUSTOMER', 'active', 'Palanpur', '385535', NULL, 'Gujarat', '2022-02-22', NULL, 1, 219, NULL, 'GbCpXVAC0t8M3dZEH5G99vQIqg1nLE21Qj9H6yU3.png', 'jtfw3z', 1, 0, NULL, '2022-09-05 02:32:02', '2022-11-25 09:22:34', NULL, '91'),
(273, NULL, 'chahat@gmail.com', NULL, NULL, 'Chahat', 'Kumar', 'Mali', '8523645102', 'male', 'CUSTOMER', 'active', 'Deesa', '385535', NULL, 'Gujarat', '2022-10-12', NULL, 1, NULL, NULL, 'Fp96QIR8VhoJkUqAAm5n3OWBnRDjiH3LwopYYRxU.png', 'h62kp1', 1, 0, NULL, '2022-10-01 04:02:02', '2022-10-01 04:02:02', NULL, NULL),
(275, NULL, 'chahat123@gmail.com', NULL, NULL, 'Chahat', 'Kumar', 'Mali', '8521478520', 'male', 'CUSTOMER', 'active', 'Deesa', '385535', NULL, 'Gujarat', '1997-05-02', NULL, 1, NULL, NULL, 'cbGgYjb7owpkAbv4IMec3r6hTPwOz34pOSVNqwbI.png', '52korx', 1, 0, NULL, '2022-10-01 04:03:23', '2022-10-01 04:03:23', NULL, NULL),
(276, NULL, 'rajesh123@gmail.com', NULL, NULL, 'Rajesh', 'Kumar', 'Thakor', '8486214003', 'male', 'CUSTOMER', 'active', 'Deesa', '385535', NULL, 'Gujarat', '1998-07-01', NULL, 1, NULL, NULL, 'Vm7yo1LGD4RQPoyMrPPlHN7hVSHFI0FZQoCCumvo.png', 'j4o3yw', 1, 0, NULL, '2022-10-01 04:07:50', '2022-10-01 04:07:50', NULL, NULL),
(279, NULL, 'jaswant1112@gmail.com', NULL, NULL, 'Jaswant', 'Bhai', 'Khodaliya', '9586351502', 'male', 'CUSTOMER', 'active', 'Deesa', '385535', NULL, 'Gujarat', '1994-03-01', NULL, 1, NULL, NULL, '321zAt176Sd25ZZVCwAZqqelxdVJWQQ9bkSrVeh0.png', '8s45en', 1, 0, NULL, '2022-10-01 04:11:04', '2022-10-01 04:11:04', NULL, NULL),
(280, NULL, 'paresh123@gmail.com', NULL, NULL, 'Paresh', 'Kumar', 'Mali', '9137700120', 'male', 'CUSTOMER', 'active', 'Deesa', '385535', NULL, 'Gujarat', '1996-07-01', NULL, 1, NULL, NULL, 'n5HLNJhnU8d9QTmDMl3cZuTlLjXFVrfLRZRrXT19.png', 'mfrslq', 1, 0, NULL, '2022-10-01 04:13:07', '2022-10-19 01:09:46', NULL, NULL),
(281, NULL, 'kaushik@gmail.com', NULL, NULL, 'Kaushik123', 'Kumar', 'Patel', '9586152403', 'male', 'CUSTOMER', 'active', 'Palanpur', '385535', NULL, 'Gujarat', '1999-01-02', NULL, 1, NULL, NULL, 'wcacnOZZY1vtOHYlrgm7zHOLN8zmXaXTZWTjeUIT.png', 'zgki0n', 1, 0, NULL, '2022-10-01 04:19:26', '2022-11-17 06:14:37', NULL, NULL),
(284, 'Kiran', 'kiranthakor123@gmail.com', NULL, NULL, 'Kiran', 'Bhai', 'Thakor', '9865354575', 'male', 'DRIVER', 'active', 'Palanpur', '385001', NULL, 'Gujarat', '1998-06-01', NULL, 1, NULL, NULL, 'CJJkN1ZhzDGRXTyKtX5iwxAopqC4ou17ivUcy8CS.png', 'csnykp', 1, 0, NULL, '2022-10-01 04:58:36', '2022-10-03 04:01:10', NULL, NULL),
(285, 'Prashant', 'prashant123@gmail.com', NULL, NULL, 'Prashant', 'Kumar', 'Kashyap', '9015963870', 'male', 'DRIVER', 'active', 'Palanpur', '385001', NULL, 'Gujarat', '1999-02-01', NULL, 1, NULL, NULL, 'kFeZZHAnuUDpOYcGWuTlMosgn63A9dY8UvIG3gUO.png', '18h6jy', 1, 0, NULL, '2022-10-01 05:03:12', '2022-10-19 01:40:59', NULL, NULL),
(286, 'Vinod', 'vinod123@gmail.com', NULL, NULL, 'Vinod', 'Kumar', 'Parmar', '7895450120', 'male', 'DRIVER', 'active', 'Deesa', '385535', NULL, 'Gujarat', '1997-03-01', NULL, 1, 128, NULL, 'NNmZqPeqJBwQ1GK8Bxg9OJgAbejyJ21p7kBMbLnX.png', '12nrzi', 1, 1, NULL, '2022-10-01 05:07:29', '2022-10-02 23:33:14', NULL, NULL),
(287, 'Divyam', 'divyam123@gmail.com', NULL, NULL, 'Divyam', 'Kumar', 'Parmar', '9512475682', 'male', 'DRIVER', 'active', 'Deesa', '385535', NULL, 'Gujarat', '1996-06-01', NULL, 1, NULL, NULL, '5MvG6jOPtvb9j51siki2HYkgCON62KYUeBQsvEKZ.png', 'f3vk8d', 1, 1, NULL, '2022-10-21 01:06:01', '2022-10-21 01:06:01', NULL, NULL),
(288, NULL, 'sfsd@fd.hbf', NULL, NULL, 'dfvsdff', 'fddsfs', 'fsdf', '9586754810', 'male', 'DRIVER', 'active', 'fgdfg', '385535', NULL, 'fdg', '1995-01-01', NULL, 1, NULL, NULL, 'ImzjR0ShB1K7NEL6Q103wcegKbPkFG8wk90gkhGm.png', 'jg8yr3', 0, 0, NULL, '2022-10-21 01:28:29', '2022-10-21 01:28:29', NULL, NULL),
(289, NULL, 'dfgd@reter.ter', NULL, NULL, 'ghf', 'bgdfg', 'fgdfg', '9568754814', 'male', 'DRIVER', 'active', 'Deesa', '385535', NULL, 'Gujarat', '1998-06-01', NULL, 1, NULL, NULL, NULL, '3r7e4b', 0, 0, NULL, '2022-10-21 01:40:45', '2022-10-21 01:40:45', NULL, NULL),
(290, NULL, 'bharat123@gmail.com', NULL, NULL, 'Bharat', 'Kumar', 'Soni', '9568754814', 'male', 'DRIVER', 'active', 'Deesa', '385535', NULL, 'Gujarat', '1998-06-01', NULL, 1, NULL, NULL, NULL, 'o3ezyw', 1, 0, NULL, '2022-10-21 01:41:28', '2022-10-21 02:34:44', NULL, NULL),
(291, NULL, 'pavan@gmail.com', NULL, NULL, 'Pavan', 'Kumar', 'Mali', '7412589514', 'male', 'DRIVER', 'active', 'Deesa', '385535', NULL, 'Gujarat', '2022-10-01', NULL, 1, NULL, NULL, 'NJXMlBbPtW5A4FuIc0NVgDfR5E5lIqNKIzhEVBL9.png', 'cd4mf6', 1, 0, NULL, '2022-10-21 01:52:27', '2022-10-21 01:52:27', NULL, NULL),
(292, NULL, 'aakash123@gmail.com', NULL, NULL, 'Aakash', 'Kumar', 'Solanki', '7412589512', 'male', 'DRIVER', 'active', 'Deesa', '385535', NULL, 'Gujarat', '1997-06-01', NULL, 1, NULL, NULL, NULL, 'ry9q8p', 1, 0, NULL, '2022-10-21 02:06:06', '2022-10-21 02:06:06', NULL, NULL),
(293, NULL, 'rtyr@yrt.yr', NULL, NULL, 'Yatin', 'kumar', 'Soni', '8514256321', 'male', 'DRIVER', 'active', 'Deesa', '385535', NULL, 'Gujarat', '1999-01-01', NULL, 1, NULL, NULL, 'J0AtrXGR4VgvUUUimPRUC8mlgKSjS1DH5Qbe2c4x.png', '5c1p9r', 1, 0, NULL, '2022-10-21 02:10:27', '2022-10-21 02:22:59', NULL, NULL),
(294, NULL, 'vinamra123@gmai.com', NULL, NULL, 'Vinamra', 'Kumar', 'Darji', '9586120358', 'male', 'DRIVER', 'active', 'Palanpur', '385001', NULL, 'Gujarat', '1998-05-11', NULL, 1, NULL, NULL, 'hnIGAJAZ4yK7eZPAqtVdOtmfpqs4BQSrudleWTpM.png', 'fh8x43', 1, 0, NULL, '2022-10-21 02:19:59', '2022-10-21 02:19:59', NULL, NULL),
(295, 'Vinod', 'vinod1234@gmail.com', NULL, NULL, 'Vinod', 'Kumar', 'Soni', '8504050607', 'male', 'DRIVER', 'active', 'Deesa', '385535', NULL, 'Gujarat', '1998-09-01', NULL, 1, NULL, NULL, 'WxqGa69laYo2pevtszhwhvXbg4EtOIJZ9F2aMsMp.png', '3bdaoq', 1, 0, NULL, '2022-10-21 02:41:30', '2022-10-21 02:41:30', NULL, NULL),
(296, NULL, 'ifsc_code@gmail.com', NULL, NULL, 'Test SubCustomer', 'gtfg', 'Testifsc_code', '01454455445', 'male', 'DRIVER', 'active', 'siddhpur', '384151', NULL, 'GUJARAT', '2022-10-14', NULL, 1, NULL, NULL, NULL, 'taord5', 1, 0, NULL, '2022-10-21 02:53:37', '2022-10-21 02:53:37', NULL, NULL),
(297, NULL, 'ifsc_code123@gmail.com', NULL, NULL, 'Test SubCustomer', 'sdasd', 'Testifsc_code', '01454455445', 'male', 'DRIVER', 'active', 'siddhpur', '384151', NULL, 'GUJARAT', '1998-08-01', NULL, 1, NULL, NULL, NULL, 'efq1sb', 1, 0, NULL, '2022-10-21 03:03:13', '2022-10-21 03:03:13', NULL, NULL),
(298, NULL, 'ifsc_code9878@gmail.com', NULL, NULL, 'Test SubCustomer', 'Kumar', 'Testifsc_code', '9586754800', 'male', 'DRIVER', 'active', 'siddhpur', '384151', NULL, 'GUJARAT', '1998-08-01', NULL, 1, NULL, NULL, NULL, 'zicf06', 1, 0, NULL, '2022-10-21 03:41:53', '2022-10-21 03:41:53', NULL, NULL),
(299, NULL, 'ifsc_code9878423@gmail.com', NULL, NULL, 'Test SubCustomer', 'Kumar', 'Testifsc_code', '9586754800', 'male', 'DRIVER', 'active', 'siddhpur', '384151', NULL, 'GUJARAT', '1998-08-01', NULL, 1, NULL, NULL, NULL, 'xtarev', 1, 0, NULL, '2022-10-21 03:42:38', '2022-10-21 03:42:38', NULL, NULL),
(300, NULL, 'vikrant123@gmail.com', NULL, NULL, 'Vikrant', 'Kumar', 'Soni', '9566554477', 'male', 'DRIVER', 'active', 'Deesa', '385535', NULL, 'Gujarat', '1998-09-01', NULL, 1, NULL, NULL, NULL, 'bnlxs6', 1, 0, NULL, '2022-10-21 03:59:21', '2022-10-21 03:59:21', NULL, NULL),
(301, NULL, 'satyen123@gmail.com', NULL, NULL, 'Satyen', 'Kumar', 'Soni', '7755332211', 'male', 'DRIVER', 'active', 'Deesa', '385535', NULL, 'Gujarat', '1993-09-01', NULL, 1, NULL, NULL, NULL, '8ywi9d', 1, 0, NULL, '2022-10-21 04:01:33', '2022-10-21 04:01:33', NULL, NULL),
(302, 'Dhruv', 'druv12@gmail.com', NULL, NULL, 'Dhruv', 'Kumar', 'Mali', '9898556624', 'male', 'DRIVER', 'active', 'Deesa', '385535', NULL, 'Gujarat', '2022-10-01', NULL, 1, NULL, NULL, NULL, 'weo95b', 1, 0, NULL, '2022-10-21 05:23:43', '2022-10-21 05:23:43', NULL, NULL),
(303, 'rter', 'rtre@yyhf.hrth', NULL, NULL, 'rter', 'erter', 'erter', '9879879879', 'male', 'DRIVER', 'active', 'Deesa', '385535', NULL, 'Gujarat', '1998-01-01', NULL, 1, NULL, NULL, NULL, 'gcoy56', 1, 0, NULL, '2022-10-21 05:47:01', '2022-10-21 05:47:01', NULL, NULL),
(304, 'Vikram', 'vikramsuthar@gmail.com', NULL, NULL, 'Vikram', 'Kumar', 'Suthar', '9865221100', 'male', 'DRIVER', 'active', 'Deesa', '385535', NULL, 'Gujarat', '1998-09-01', NULL, 1, NULL, NULL, NULL, '68dpmv', 1, 0, NULL, '2022-10-21 06:29:27', '2022-10-21 06:29:27', NULL, NULL),
(305, NULL, 'sanjaysuthar@gmail.com', NULL, NULL, 'Sanjay', 'Kumar', 'Suthar', '9966554400', 'male', 'DRIVER', 'active', 'Palanpur', '385535', NULL, 'Gujarat', '1992-07-01', NULL, 1, NULL, NULL, NULL, '41dxq0', 1, 0, NULL, '2022-10-21 06:30:58', '2022-10-21 06:30:58', NULL, NULL),
(306, NULL, 'kuldeepdarji@gmail.com', NULL, NULL, 'Kuldeep', 'Kumar', 'Darji', '9415352200', 'male', 'DRIVER', 'active', 'Deesa', '385535', NULL, 'Gujarat', '1996-05-01', NULL, 1, NULL, NULL, '44Yuzms5CStk1OZIIz4oVCDStqb2ir9wrJXtxZkT.png', '480erj', 1, 0, NULL, '2022-10-21 06:32:23', '2022-11-22 11:50:27', NULL, NULL),
(307, NULL, 'rajeshdarji@gmail.com', NULL, NULL, 'Rajesh', 'Kumar', 'Darji', '8754552266', 'male', 'DRIVER', 'active', 'Palanpur', '385001', NULL, 'Gujarat', '1998-06-01', NULL, 1, NULL, NULL, NULL, 'vgi4k7', 1, 0, NULL, '2022-10-21 06:33:57', '2022-10-21 06:33:57', NULL, NULL),
(308, NULL, 'hirenbhati@gmail.com', NULL, NULL, 'Hiren', 'Kumar', 'Bhati', '9565124522', 'male', 'DRIVER', 'active', 'Deesa', '385535', NULL, 'Gujarat', '1998-09-01', NULL, 1, NULL, NULL, 'KQIdJIxVcCioi7c1nPInM0V1EGfKknPTksK7wDnS.png', '6lgnyq', 1, 0, NULL, '2022-10-21 06:35:36', '2022-10-30 23:24:35', NULL, NULL),
(309, 'Lokesh', 'lokeshsolanki@gmail.com', NULL, NULL, 'Lokesh', 'Kumar', 'Solanki', '9955220044', 'male', 'DRIVER', 'active', 'Palanpur', '385001', NULL, 'Gujarat', '1999-07-02', NULL, 1, NULL, NULL, 'rJB0AJ2fi0TqSSWCvadbwxTJuNX2QlnE1UoGEAwz.png', '78b2m5', 1, 0, NULL, '2022-11-03 04:22:23', '2022-11-03 04:22:23', NULL, NULL),
(310, 'Vijendra', 'vijendrabhati@gmail.com', NULL, NULL, 'Vijendra', 'Kumar', 'Bhati', '8855114422', 'male', 'DRIVER', 'active', 'Palanpur', '385001', NULL, 'Gujarat', '2001-06-01', NULL, 1, NULL, NULL, 'k5UduWWINph8brNGPIOHALNf2ev6e3uR3miuxknQ.png', '359fcr', 1, 0, NULL, '2022-11-03 04:31:18', '2022-11-03 05:33:41', NULL, NULL),
(314, 'Pankaj', 'pankajsoni@gmail.com', NULL, NULL, 'Pankaj', 'Kumar', 'Solanki', '9588662214', 'male', 'DRIVER', 'active', 'Palanpur', '385001', NULL, 'Gujarat', '1998-09-01', NULL, 1, NULL, NULL, 'xLcQJulaAo4RLju4hsPIHhJNjQGQFvYqSlfzR7yx.png', '8jdwoi', 1, 0, NULL, '2022-11-03 05:24:43', '2022-11-03 05:24:43', NULL, NULL),
(315, NULL, 'pritamkumar@gmail.com', NULL, '$2y$10$K0GNXNvD2lbw2EpYR3Y4B.MEfAGEeQDUf0X.1LUoisBVjmWMGNyiq', 'Pritam', 'Kumar', 'Soni', '9955442200', 'male', 'DRIVER', 'active', '1', '385001', NULL, '1', '2022-02-02', NULL, 1, 74, NULL, 'jxz3ZgaZl6KTF69AulrGG70tOAfbMXDB9drz1EcT.png', 'bah5zk', 1, 1, NULL, '2022-11-03 06:25:29', '2022-11-12 01:06:09', NULL, NULL),
(316, NULL, 'sajankumar@gmail.com', NULL, '$2y$10$0JvzPqMccw5qu0b3LZXsFOtxNBVkYUYuUqtn5Zf88fBfu7KWo2Vne', 'Sharwan', 'Kumar', 'Prajapati', '9586227744', 'male', 'DRIVER', 'active', 'Deesa', '385001', NULL, 'Gujarat', '1998-02-02', NULL, 1, 5, NULL, 'J4fMdA7aj3swUnuainCVcIrT2YsTafOadisaUc2f.png', 'dbjnx4', 1, 0, NULL, '2022-11-07 05:27:14', '2022-11-08 03:45:40', NULL, NULL),
(317, 'jas', 'jas@gmil.com', NULL, NULL, 'jas', 'khodaliya', 'fdsf', '9874563210', 'male', 'DRIVER', 'active', 'siddhpur', '384151', NULL, 'GUJARAT', '2022-12-05', NULL, 1, NULL, NULL, NULL, 'tlz9bs', 1, 0, NULL, '2022-12-12 04:57:42', '2022-12-12 04:57:42', NULL, NULL),
(318, 'rajesh', 'rajesh12345@gmail.com', NULL, NULL, 'rajesh', 'thakor', 'thakor', '9632587896', 'male', 'DRIVER', 'active', 'siddhpur', '384151', NULL, 'GUJARAT', '2022-12-06', NULL, 1, NULL, NULL, 'SMpLl5pjpVQzeb6o7lCwpy4XYZOznFASv5oO2Adm.png', 'zf4n1b', 1, 0, NULL, '2022-12-12 10:29:38', '2022-12-12 10:29:38', NULL, NULL),
(319, 'test', 'fgdgde@gmail.com', NULL, NULL, 'test', 'test', 'test', '0145445549', 'male', 'DRIVER', 'active', 'siddhpur', '384151', NULL, 'GUJARAT', '2022-12-05', NULL, 1, NULL, NULL, 'W9DL2AbLItRC8QfteoF5gLSng9n4goynjMbcKKdH.png', '259671', 1, 1, NULL, '2022-12-12 11:38:20', '2022-12-12 12:27:45', NULL, NULL),
(320, 'efrsdff', 'hbgfhbvge@gmail.com', NULL, NULL, 'demo name', 'fdgfdgfdg', 'gfgf', '0145445445', 'male', 'DRIVER', 'active', 'siddhpur', '384151', NULL, 'GUJARAT', '2022-12-05', NULL, 1, NULL, NULL, '7NfekW4mVvzxCBZ0rNYimhyw1gMRdRjRWCTLnKUT.png', 'dvbcre', 1, 0, NULL, '2022-12-12 12:03:40', '2022-12-12 12:28:49', NULL, NULL),
(321, 'Test SubCustomergfh', 'hgjgjgjdbfbvf@gmail.com', NULL, NULL, 'Test SubCustomergfh', 'gfhgfh', 'Testifsc_code', '0145445544', 'male', 'DRIVER', 'active', 'siddhpur', '384151', NULL, 'GUJARAT', '2022-12-12', NULL, 1, NULL, NULL, '6j4o7o5E2DAC2USU9x43WsVtiihur6zmhjvl4CiO.png', 't2snqx', 1, 1, NULL, '2022-12-12 12:11:00', '2022-12-12 12:27:16', NULL, NULL),
(322, 'new Bharat', 'new@gmail.com', NULL, NULL, 'new Bharat', 's', 'prajapati', '6352104626', 'male', 'DRIVER', 'active', 'palanpur', '385001', NULL, 'gujarat', '1998-12-25', NULL, 1, NULL, NULL, NULL, '3jxf0t', 1, 0, NULL, '2022-12-12 12:33:44', '2022-12-12 12:34:54', NULL, NULL),
(323, NULL, 'add@gmail.com', NULL, NULL, 'adduser', 'u', 'adduser', '8956234523', 'male', 'CUSTOMER', 'active', 'Palanpur', '382254', NULL, 'Gujarat', '1995-05-04', NULL, 1, NULL, NULL, 'X5tQDbXdaTLcCTScfqpxRe3NbpDYxbBTylEPbaMD.jpg', 'vcodex', 0, 0, NULL, '2022-12-12 12:39:24', '2022-12-12 12:39:24', NULL, NULL),
(324, NULL, 'testing12345@gmail.com', NULL, NULL, 'testing12345', 'testing12345', 'testing12345', '9632563980', 'male', 'CUSTOMER', 'active', 'siddhpur', '384151', NULL, 'GUJARAT', '2022-12-12', NULL, 1, NULL, NULL, 'qkTfa5pr5wFINAaeuNhxRq8ak6d1TLjLi5l8xTPx.png', '7gaywl', 1, 0, NULL, '2022-12-13 05:06:52', '2022-12-13 05:06:52', NULL, NULL),
(325, 'testnew1', 'test1237890@gmail.com', NULL, NULL, 'testnew1', 'test1', 'test1', '9632569761', 'male', 'DRIVER', 'active', 'siddhpur', '384151', NULL, 'GUJARAT', '2022-12-13', NULL, 1, NULL, NULL, 'OHe0zpxVUSLZlM6LzuNIejiNofjyY0r7wZw8hUFw.png', '6f9xrt', 1, 0, NULL, '2022-12-13 05:19:41', '2022-12-13 05:19:41', NULL, NULL),
(326, NULL, 'temptest@gmail.com', NULL, NULL, 'temptest', 'temptest', 'temptest', '6302156325', 'male', 'DRIVER', 'active', 'siddhpur', '384151', NULL, 'GUJARAT', '2022-12-05', NULL, 1, NULL, NULL, 'dkmCzQQXiLK6IfcqAIXqGZhJrMaUSuST3TE48U7E.png', '5q9pmn', 1, 0, NULL, '2022-12-13 05:21:29', '2022-12-13 05:21:29', NULL, NULL),
(327, NULL, 'valest@gmail.com', NULL, NULL, 'valattest', 'valattest', 'valattest', '9632356985', 'male', 'DRIVER', 'active', 'Palanpur', '385001', NULL, 'Gujarat', '2022-12-06', NULL, 1, NULL, NULL, 'CFhRvjr1YKrGYOldfLIKwkC9ZtSGm9ztUZQoJLES.png', '96xdz4', 1, 0, NULL, '2022-12-13 05:23:51', '2022-12-13 05:23:51', NULL, NULL),
(328, NULL, 'pick@gmail.com', NULL, NULL, 'pick', 'pick', 'pick', '9632583310', 'male', 'DRIVER', 'active', 'Surat', '384151', '72.240000', 'Gujarat', '2022-12-12', '72.240000', 1, NULL, NULL, 'BJ8HQZmeao6lBJc22SGJFTzDsX4NvkSYq8JeAgmB.png', 'lac1jz', 1, 0, NULL, '2022-12-13 05:26:29', '2022-12-28 11:37:23', NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `user_retings`
--

CREATE TABLE `user_retings` (
  `id` int(10) UNSIGNED NOT NULL,
  `rated_to` int(10) UNSIGNED NOT NULL,
  `rated_by` int(10) UNSIGNED NOT NULL,
  `star` int(11) NOT NULL,
  `coment` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `status` int(11) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `user_retings`
--

INSERT INTO `user_retings` (`id`, `rated_to`, `rated_by`, `star`, `coment`, `status`, `created_at`, `updated_at`, `deleted_at`) VALUES
(19, 225, 64, 4, 'Nice', 1, '2022-08-01 09:40:02', '2022-08-06 09:40:02', NULL),
(25, 128, 150, 3, 'Great', 1, NULL, NULL, NULL),
(26, 128, 100, 2, 'Slow Driving', 1, NULL, NULL, NULL),
(27, 128, 136, 4, 'Great Driving', 1, NULL, NULL, NULL),
(28, 328, 128, 5, 'done', 0, '2022-12-27 11:04:37', '2022-12-27 11:04:37', NULL),
(29, 219, 128, 5, 'done', 1, '2022-12-29 06:41:54', '2022-12-29 06:41:54', NULL);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `assign_drivers`
--
ALTER TABLE `assign_drivers`
  ADD PRIMARY KEY (`id`),
  ADD KEY `assign_drivers_driver_id_foreign` (`driver_id`),
  ADD KEY `assign_drivers_user_id_foreign` (`user_id`);

--
-- Indexes for table `bookings`
--
ALTER TABLE `bookings`
  ADD PRIMARY KEY (`id`),
  ADD KEY `bookings_customer_id_foreign` (`customer_id`),
  ADD KEY `bookings_driver_id_foreign` (`driver_id`);

--
-- Indexes for table `carcompanies`
--
ALTER TABLE `carcompanies`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `carmodels`
--
ALTER TABLE `carmodels`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `caryears`
--
ALTER TABLE `caryears`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `car_wash_details`
--
ALTER TABLE `car_wash_details`
  ADD PRIMARY KEY (`id`),
  ADD KEY `car_wash_details_customer_id_foreign` (`customer_id`),
  ADD KEY `car_wash_details_driver_id_foreign` (`driver_id`),
  ADD KEY `car_wash_details_car_id_foreign` (`car_id`);

--
-- Indexes for table `cities`
--
ALTER TABLE `cities`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `contactus`
--
ALTER TABLE `contactus`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `customer_car_details`
--
ALTER TABLE `customer_car_details`
  ADD PRIMARY KEY (`id`),
  ADD KEY `customer_car_details_company_id_foreign` (`company_name`),
  ADD KEY `customer_car_details_model_id_foreign` (`model_name`),
  ADD KEY `customer_car_details_year_id_foreign` (`year`),
  ADD KEY `customer_car_details_user_id_foreign` (`user_id`);

--
-- Indexes for table `customer_extends`
--
ALTER TABLE `customer_extends`
  ADD PRIMARY KEY (`id`),
  ADD KEY `customer_extends_user_id_foreign` (`user_id`);

--
-- Indexes for table `daily_reportings`
--
ALTER TABLE `daily_reportings`
  ADD PRIMARY KEY (`id`),
  ADD KEY `daily_reportings_assign_driver_id_foreign` (`assign_driver_id`);

--
-- Indexes for table `driver_categories`
--
ALTER TABLE `driver_categories`
  ADD PRIMARY KEY (`id`),
  ADD KEY `driver_categories_user_id_foreign` (`user_id`);

--
-- Indexes for table `driver_extendeds`
--
ALTER TABLE `driver_extendeds`
  ADD PRIMARY KEY (`id`),
  ADD KEY `user_id` (`user_id`);

--
-- Indexes for table `failed_jobs`
--
ALTER TABLE `failed_jobs`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `failed_jobs_uuid_unique` (`uuid`);

--
-- Indexes for table `faqs`
--
ALTER TABLE `faqs`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `fuel_details`
--
ALTER TABLE `fuel_details`
  ADD PRIMARY KEY (`id`),
  ADD KEY `fuel_details_assign_driver_id_foreign` (`assign_driver_id`);

--
-- Indexes for table `help__lines`
--
ALTER TABLE `help__lines`
  ADD PRIMARY KEY (`id`),
  ADD KEY `help__lines_user_id_foreign` (`user_id`);

--
-- Indexes for table `leave_details`
--
ALTER TABLE `leave_details`
  ADD PRIMARY KEY (`id`),
  ADD KEY `leave_details_assign_driver_id_foreign` (`assign_driver_id`);

--
-- Indexes for table `migrations`
--
ALTER TABLE `migrations`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `model_has_permissions`
--
ALTER TABLE `model_has_permissions`
  ADD PRIMARY KEY (`permission_id`,`model_id`,`model_type`),
  ADD KEY `model_has_permissions_model_id_model_type_index` (`model_id`,`model_type`);

--
-- Indexes for table `model_has_roles`
--
ALTER TABLE `model_has_roles`
  ADD PRIMARY KEY (`role_id`,`model_id`,`model_type`),
  ADD KEY `model_has_roles_model_id_model_type_index` (`model_id`,`model_type`);

--
-- Indexes for table `notifications`
--
ALTER TABLE `notifications`
  ADD PRIMARY KEY (`id`),
  ADD KEY `notifications_user_id_foreign` (`user_id`),
  ADD KEY `booking_id` (`type_id`);

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
  ADD PRIMARY KEY (`id`),
  ADD KEY `oauth_refresh_tokens_access_token_id_index` (`access_token_id`);

--
-- Indexes for table `offercodes`
--
ALTER TABLE `offercodes`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `out_o_f_statoindetails`
--
ALTER TABLE `out_o_f_statoindetails`
  ADD PRIMARY KEY (`id`),
  ADD KEY `out_o_f_statoindetails_assign_driver_id_foreign` (`assign_driver_id`);

--
-- Indexes for table `pages`
--
ALTER TABLE `pages`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `password_resets`
--
ALTER TABLE `password_resets`
  ADD KEY `password_resets_email_index` (`email`);

--
-- Indexes for table `permanent_inquiries`
--
ALTER TABLE `permanent_inquiries`
  ADD PRIMARY KEY (`id`),
  ADD KEY `permanent_inquiries_user_id_foreign` (`user_id`);

--
-- Indexes for table `permissions`
--
ALTER TABLE `permissions`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `permissions_name_guard_name_unique` (`name`,`guard_name`);

--
-- Indexes for table `roles`
--
ALTER TABLE `roles`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `roles_name_guard_name_unique` (`name`,`guard_name`);

--
-- Indexes for table `role_has_permissions`
--
ALTER TABLE `role_has_permissions`
  ADD PRIMARY KEY (`permission_id`,`role_id`),
  ADD KEY `role_has_permissions_role_id_foreign` (`role_id`);

--
-- Indexes for table `salaries`
--
ALTER TABLE `salaries`
  ADD PRIMARY KEY (`id`),
  ADD KEY `salaries_assign_driver_id_foreign` (`assign_driver_id`);

--
-- Indexes for table `setting`
--
ALTER TABLE `setting`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `setting_popup`
--
ALTER TABLE `setting_popup`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `states`
--
ALTER TABLE `states`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `staticdatas`
--
ALTER TABLE `staticdatas`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `users_email_unique` (`email`);

--
-- Indexes for table `user_retings`
--
ALTER TABLE `user_retings`
  ADD PRIMARY KEY (`id`),
  ADD KEY `user_retings_rated_by_foreign` (`rated_by`),
  ADD KEY `user_retings_rated_to_foreign` (`rated_to`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `assign_drivers`
--
ALTER TABLE `assign_drivers`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `bookings`
--
ALTER TABLE `bookings`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=117;

--
-- AUTO_INCREMENT for table `carcompanies`
--
ALTER TABLE `carcompanies`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT for table `carmodels`
--
ALTER TABLE `carmodels`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `caryears`
--
ALTER TABLE `caryears`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=51;

--
-- AUTO_INCREMENT for table `car_wash_details`
--
ALTER TABLE `car_wash_details`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=20;

--
-- AUTO_INCREMENT for table `cities`
--
ALTER TABLE `cities`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=57;

--
-- AUTO_INCREMENT for table `contactus`
--
ALTER TABLE `contactus`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `customer_car_details`
--
ALTER TABLE `customer_car_details`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `customer_extends`
--
ALTER TABLE `customer_extends`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=102;

--
-- AUTO_INCREMENT for table `daily_reportings`
--
ALTER TABLE `daily_reportings`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=17;

--
-- AUTO_INCREMENT for table `driver_categories`
--
ALTER TABLE `driver_categories`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `driver_extendeds`
--
ALTER TABLE `driver_extendeds`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=197;

--
-- AUTO_INCREMENT for table `failed_jobs`
--
ALTER TABLE `failed_jobs`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `faqs`
--
ALTER TABLE `faqs`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT for table `fuel_details`
--
ALTER TABLE `fuel_details`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=27;

--
-- AUTO_INCREMENT for table `help__lines`
--
ALTER TABLE `help__lines`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=17;

--
-- AUTO_INCREMENT for table `leave_details`
--
ALTER TABLE `leave_details`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=21;

--
-- AUTO_INCREMENT for table `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=85;

--
-- AUTO_INCREMENT for table `notifications`
--
ALTER TABLE `notifications`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=263;

--
-- AUTO_INCREMENT for table `oauth_clients`
--
ALTER TABLE `oauth_clients`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `oauth_personal_access_clients`
--
ALTER TABLE `oauth_personal_access_clients`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `offercodes`
--
ALTER TABLE `offercodes`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT for table `out_o_f_statoindetails`
--
ALTER TABLE `out_o_f_statoindetails`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `pages`
--
ALTER TABLE `pages`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `permanent_inquiries`
--
ALTER TABLE `permanent_inquiries`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT for table `permissions`
--
ALTER TABLE `permissions`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `roles`
--
ALTER TABLE `roles`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `salaries`
--
ALTER TABLE `salaries`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=18;

--
-- AUTO_INCREMENT for table `setting`
--
ALTER TABLE `setting`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `setting_popup`
--
ALTER TABLE `setting_popup`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `states`
--
ALTER TABLE `states`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT for table `staticdatas`
--
ALTER TABLE `staticdatas`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=329;

--
-- AUTO_INCREMENT for table `user_retings`
--
ALTER TABLE `user_retings`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=30;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `assign_drivers`
--
ALTER TABLE `assign_drivers`
  ADD CONSTRAINT `assign_drivers_driver_id_foreign` FOREIGN KEY (`driver_id`) REFERENCES `users` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `assign_drivers_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `bookings`
--
ALTER TABLE `bookings`
  ADD CONSTRAINT `bookings_customer_id_foreign` FOREIGN KEY (`customer_id`) REFERENCES `users` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `bookings_driver_id_foreign` FOREIGN KEY (`driver_id`) REFERENCES `users` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `car_wash_details`
--
ALTER TABLE `car_wash_details`
  ADD CONSTRAINT `car_wash_details_car_id_foreign` FOREIGN KEY (`car_id`) REFERENCES `customer_car_details` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `car_wash_details_customer_id_foreign` FOREIGN KEY (`customer_id`) REFERENCES `users` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `car_wash_details_driver_id_foreign` FOREIGN KEY (`driver_id`) REFERENCES `users` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `customer_extends`
--
ALTER TABLE `customer_extends`
  ADD CONSTRAINT `customer_extends_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `daily_reportings`
--
ALTER TABLE `daily_reportings`
  ADD CONSTRAINT `daily_reportings_assign_driver_id_foreign` FOREIGN KEY (`assign_driver_id`) REFERENCES `users` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `driver_categories`
--
ALTER TABLE `driver_categories`
  ADD CONSTRAINT `driver_categories_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `driver_extendeds`
--
ALTER TABLE `driver_extendeds`
  ADD CONSTRAINT `driver_extendeds_ibfk_1` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `fuel_details`
--
ALTER TABLE `fuel_details`
  ADD CONSTRAINT `fuel_details_assign_driver_id_foreign` FOREIGN KEY (`assign_driver_id`) REFERENCES `users` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `help__lines`
--
ALTER TABLE `help__lines`
  ADD CONSTRAINT `help__lines_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `leave_details`
--
ALTER TABLE `leave_details`
  ADD CONSTRAINT `leave_details_assign_driver_id_foreign` FOREIGN KEY (`assign_driver_id`) REFERENCES `users` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `model_has_permissions`
--
ALTER TABLE `model_has_permissions`
  ADD CONSTRAINT `model_has_permissions_permission_id_foreign` FOREIGN KEY (`permission_id`) REFERENCES `permissions` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `model_has_roles`
--
ALTER TABLE `model_has_roles`
  ADD CONSTRAINT `model_has_roles_role_id_foreign` FOREIGN KEY (`role_id`) REFERENCES `roles` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `notifications`
--
ALTER TABLE `notifications`
  ADD CONSTRAINT `notifications_ibfk_1` FOREIGN KEY (`type_id`) REFERENCES `bookings` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `notifications_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `out_o_f_statoindetails`
--
ALTER TABLE `out_o_f_statoindetails`
  ADD CONSTRAINT `out_o_f_statoindetails_assign_driver_id_foreign` FOREIGN KEY (`assign_driver_id`) REFERENCES `users` (`id`);

--
-- Constraints for table `permanent_inquiries`
--
ALTER TABLE `permanent_inquiries`
  ADD CONSTRAINT `permanent_inquiries_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `role_has_permissions`
--
ALTER TABLE `role_has_permissions`
  ADD CONSTRAINT `role_has_permissions_permission_id_foreign` FOREIGN KEY (`permission_id`) REFERENCES `permissions` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `role_has_permissions_role_id_foreign` FOREIGN KEY (`role_id`) REFERENCES `roles` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `salaries`
--
ALTER TABLE `salaries`
  ADD CONSTRAINT `salaries_assign_driver_id_foreign` FOREIGN KEY (`assign_driver_id`) REFERENCES `users` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `user_retings`
--
ALTER TABLE `user_retings`
  ADD CONSTRAINT `user_retings_rated_by_foreign` FOREIGN KEY (`rated_by`) REFERENCES `users` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `user_retings_rated_to_foreign` FOREIGN KEY (`rated_to`) REFERENCES `users` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
