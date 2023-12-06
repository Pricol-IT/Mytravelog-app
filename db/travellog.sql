-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Dec 06, 2023 at 05:16 AM
-- Server version: 10.4.28-MariaDB
-- PHP Version: 8.2.4

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `travellog`
--

-- --------------------------------------------------------

--
-- Table structure for table `accomadations`
--

CREATE TABLE `accomadations` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `trip_id` bigint(20) UNSIGNED NOT NULL,
  `tripid` varchar(255) NOT NULL,
  `location` varchar(255) NOT NULL,
  `checkin` datetime NOT NULL,
  `checkout` datetime NOT NULL,
  `status` varchar(255) NOT NULL DEFAULT 'pending',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `accomadations`
--

INSERT INTO `accomadations` (`id`, `trip_id`, `tripid`, `location`, `checkin`, `checkout`, `status`, `created_at`, `updated_at`) VALUES
(3, 5, '20230005', 'Coimbatore', '2023-11-26 17:38:00', '2023-11-28 17:38:00', 'pending', '2023-11-24 06:39:03', '2023-11-24 06:39:03'),
(4, 8, '20230008', 'Mumbai', '2023-11-29 09:15:00', '2023-11-30 10:15:00', 'pending', '2023-11-26 23:16:58', '2023-11-26 23:16:58'),
(5, 15, '20230015', 'Bangalore', '2023-12-06 18:44:00', '2023-12-08 12:45:00', 'pending', '2023-12-05 01:48:56', '2023-12-05 01:48:56');

-- --------------------------------------------------------

--
-- Table structure for table `admins`
--

CREATE TABLE `admins` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `email_verified_at` timestamp NULL DEFAULT NULL,
  `password` varchar(255) NOT NULL,
  `image` varchar(255) NOT NULL DEFAULT 'images/default.jpg',
  `remember_token` varchar(100) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `admins`
--

INSERT INTO `admins` (`id`, `name`, `email`, `email_verified_at`, `password`, `image`, `remember_token`, `created_at`, `updated_at`) VALUES
(1, 'Admin', 'admin@pricol.com', NULL, '$2y$12$w8fgtpQIcmFvqUedLmyzFOv1Y8E3eMc24E9VoGpgNXipG87IES4rm', 'images/default.jpg', NULL, NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `advances`
--

CREATE TABLE `advances` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `trip_id` bigint(20) UNSIGNED NOT NULL,
  `tripid` varchar(255) NOT NULL,
  `amount` varchar(255) NOT NULL,
  `purpose` varchar(255) NOT NULL,
  `status` varchar(255) NOT NULL DEFAULT 'pending',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `buses`
--

CREATE TABLE `buses` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `trip_id` bigint(20) UNSIGNED NOT NULL,
  `tripid` varchar(255) NOT NULL,
  `origin` varchar(255) NOT NULL,
  `destination` varchar(255) NOT NULL,
  `trip_class` varchar(255) NOT NULL,
  `preferences` varchar(255) DEFAULT NULL,
  `preferred_date` datetime NOT NULL,
  `status` varchar(255) NOT NULL DEFAULT 'pending',
  `ticket` varchar(255) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `buses`
--

INSERT INTO `buses` (`id`, `trip_id`, `tripid`, `origin`, `destination`, `trip_class`, `preferences`, `preferred_date`, `status`, `ticket`, `created_at`, `updated_at`) VALUES
(1, 2, '20230002', 'Chennai', 'Erode', 'Sleeper', NULL, '2023-11-28 15:51:00', 'pending', NULL, '2023-11-24 04:52:26', '2023-11-24 04:52:26'),
(2, 7, '20230007', 'Coimbatore', 'Chennai', 'Sleeper', NULL, '2023-11-28 18:08:00', 'pending', NULL, '2023-11-24 07:08:50', '2023-11-24 07:08:50'),
(3, 8, '20230008', 'Mumbai', 'Pune', 'Seater AC', NULL, '2023-11-29 10:14:00', 'pending', NULL, '2023-11-26 23:16:58', '2023-11-26 23:16:58');

-- --------------------------------------------------------

--
-- Table structure for table `connectivities`
--

CREATE TABLE `connectivities` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `trip_id` bigint(20) UNSIGNED NOT NULL,
  `tripid` varchar(255) NOT NULL,
  `connection` varchar(255) NOT NULL,
  `status` varchar(255) NOT NULL DEFAULT 'pending',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `connectivities`
--

INSERT INTO `connectivities` (`id`, `trip_id`, `tripid`, `connection`, `status`, `created_at`, `updated_at`) VALUES
(3, 5, '20230005', 'sim provider', 'pending', '2023-11-24 06:39:03', '2023-11-24 06:39:03'),
(4, 6, '20230006', 'demo', 'pending', '2023-11-24 06:41:26', '2023-11-24 06:41:26');

-- --------------------------------------------------------

--
-- Table structure for table `failed_jobs`
--

CREATE TABLE `failed_jobs` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `uuid` varchar(255) NOT NULL,
  `connection` text NOT NULL,
  `queue` text NOT NULL,
  `payload` longtext NOT NULL,
  `exception` longtext NOT NULL,
  `failed_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `flights`
--

CREATE TABLE `flights` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `trip_id` bigint(20) UNSIGNED NOT NULL,
  `tripid` varchar(255) NOT NULL,
  `origin` varchar(255) NOT NULL,
  `destination` varchar(255) NOT NULL,
  `trip_class` varchar(255) NOT NULL,
  `preferences` varchar(255) DEFAULT NULL,
  `preferred_date` datetime NOT NULL,
  `status` varchar(255) NOT NULL DEFAULT 'pending',
  `ticket` varchar(255) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `flights`
--

INSERT INTO `flights` (`id`, `trip_id`, `tripid`, `origin`, `destination`, `trip_class`, `preferences`, `preferred_date`, `status`, `ticket`, `created_at`, `updated_at`) VALUES
(1, 1, '20230001', 'Mumbai', 'coimbatore', 'Economy', NULL, '2023-11-25 18:00:00', 'pending', NULL, '2023-11-24 03:13:45', '2023-11-24 03:13:45'),
(2, 2, '20230002', 'Mumbai', 'coimbatore', 'Economy', NULL, '2023-11-26 15:50:00', 'pending', NULL, '2023-11-24 04:52:26', '2023-11-24 04:52:26'),
(5, 5, '20230005', 'Mumbai', 'coimbatore', 'Premium', NULL, '2023-11-25 17:38:00', 'pending', NULL, '2023-11-24 06:39:03', '2023-11-24 06:39:03'),
(6, 8, '20230008', 'Coimbatore', 'Mumbai', 'Economy', NULL, '2023-11-28 12:11:00', 'pending', NULL, '2023-11-26 23:16:58', '2023-11-26 23:16:58'),
(7, 9, '20230009', 'Mumbai', 'coimbatore', 'Business', NULL, '2023-11-28 14:13:00', 'pending', NULL, '2023-11-27 03:13:54', '2023-11-27 03:13:54'),
(8, 10, '20230010', 'Coimbatore', 'Chennai', 'Business', NULL, '2023-11-29 12:23:00', 'pending', NULL, '2023-11-28 01:26:08', '2023-11-28 01:26:08'),
(10, 12, '20230012', 'chennai', 'coimbatore', 'Business', NULL, '2023-11-29 12:33:00', 'pending', NULL, '2023-11-28 01:33:50', '2023-11-28 01:33:50'),
(13, 15, '20230015', 'Mumbai', 'Bangalore', 'Business', NULL, '2023-12-06 12:43:00', 'pending', NULL, '2023-12-05 01:48:56', '2023-12-05 01:48:56'),
(14, 15, '20230015', 'Bangalore', 'coimbatore', 'Business', NULL, '2023-12-08 12:47:00', 'pending', NULL, '2023-12-05 01:48:56', '2023-12-05 01:48:56');

-- --------------------------------------------------------

--
-- Table structure for table `forexes`
--

CREATE TABLE `forexes` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `trip_id` bigint(20) UNSIGNED NOT NULL,
  `tripid` varchar(255) NOT NULL,
  `currency` varchar(255) NOT NULL,
  `amount` varchar(255) NOT NULL,
  `status` varchar(255) NOT NULL DEFAULT 'pending',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `forexes`
--

INSERT INTO `forexes` (`id`, `trip_id`, `tripid`, `currency`, `amount`, `status`, `created_at`, `updated_at`) VALUES
(1, 5, '20230005', 'USD', '10000', 'pending', '2023-11-24 06:39:03', '2023-11-24 06:39:03');

-- --------------------------------------------------------

--
-- Table structure for table `migrations`
--

CREATE TABLE `migrations` (
  `id` int(10) UNSIGNED NOT NULL,
  `migration` varchar(255) NOT NULL,
  `batch` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `migrations`
--

INSERT INTO `migrations` (`id`, `migration`, `batch`) VALUES
(1, '2014_10_12_000000_create_users_table', 1),
(2, '2014_10_12_100000_create_password_reset_tokens_table', 1),
(3, '2014_10_12_100000_create_password_resets_table', 1),
(4, '2019_08_19_000000_create_failed_jobs_table', 1),
(5, '2019_12_14_000001_create_personal_access_tokens_table', 1),
(6, '2023_11_22_091348_create_admins_table', 2),
(7, '2023_11_22_094019_create_permission_tables', 3),
(8, '2023_11_23_043650_create_trips_table', 4),
(9, '2023_11_24_060055_create_flights_table', 5),
(10, '2023_11_24_085914_create_trains_table', 6),
(11, '2023_11_24_085924_create_buses_table', 6),
(12, '2023_11_24_085934_create_taxis_table', 6),
(13, '2023_11_24_090058_create_accomadations_table', 6),
(15, '2023_11_24_090137_create_connectivities_table', 6),
(16, '2023_11_24_090155_create_forexes_table', 6),
(17, '2023_11_28_065041_create_notifications_table', 7),
(18, '2023_11_24_090114_create_advances_table', 8);

-- --------------------------------------------------------

--
-- Table structure for table `model_has_permissions`
--

CREATE TABLE `model_has_permissions` (
  `permission_id` bigint(20) UNSIGNED NOT NULL,
  `model_type` varchar(255) NOT NULL,
  `model_id` bigint(20) UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `model_has_roles`
--

CREATE TABLE `model_has_roles` (
  `role_id` bigint(20) UNSIGNED NOT NULL,
  `model_type` varchar(255) NOT NULL,
  `model_id` bigint(20) UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `notifications`
--

CREATE TABLE `notifications` (
  `id` char(36) NOT NULL,
  `type` varchar(255) NOT NULL,
  `notifiable_type` varchar(255) NOT NULL,
  `notifiable_id` bigint(20) UNSIGNED NOT NULL,
  `data` text NOT NULL,
  `read_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `notifications`
--

INSERT INTO `notifications` (`id`, `type`, `notifiable_type`, `notifiable_id`, `data`, `read_at`, `created_at`, `updated_at`) VALUES
('06877508-5994-4a74-ba15-8056b77b4d61', 'App\\Notifications\\Approver\\TripAddedNodification', 'App\\Models\\User', 2, '{\"title\":\"New Trip Created By User1\",\"url\":\"http:\\/\\/127.0.0.1:8000\\/approver\\/pendingtrip\"}', NULL, '2023-12-05 02:10:24', '2023-12-05 02:10:24'),
('4c5b94fe-452c-4dfa-94d9-05f127c8b1a4', 'App\\Notifications\\User\\NewTripNodification', 'App\\Models\\User', 1, '{\"title\":\"New Trip Submitted for Approval\",\"url\":\"http:\\/\\/127.0.0.1:8000\\/user\\/mytrip\"}', NULL, '2023-12-05 01:48:57', '2023-12-05 01:48:57'),
('9f0879ca-dbff-4e7f-83f0-564ce0040974', 'App\\Notifications\\Approver\\TripAddedNodification', 'App\\Models\\User', 2, '{\"title\":\"New Trip Created By User1\",\"url\":\"http:\\/\\/127.0.0.1:8000\\/approver\\/pendingtrip\"}', NULL, '2023-11-28 01:36:15', '2023-11-28 01:36:15'),
('ade782f8-2ea7-469c-87ba-b62122886a65', 'App\\Notifications\\User\\NewTripNodification', 'App\\Models\\User', 1, '{\"title\":\"New Trip Submitted for Approval\",\"url\":\"http:\\/\\/127.0.0.1:8000\\/user\\/mytrip\"}', NULL, '2023-12-05 02:10:24', '2023-12-05 02:10:24'),
('c5bcc5d9-b554-43ec-a7b6-37befea9264d', 'App\\Notifications\\Approver\\TripAddedNodification', 'App\\Models\\User', 2, '{\"title\":\"New Trip Created By User1\",\"url\":\"http:\\/\\/127.0.0.1:8000\\/approver\\/pendingtrip\"}', NULL, '2023-12-05 01:48:57', '2023-12-05 01:48:57'),
('dbc996f2-3217-495b-a2ea-5500acdc3daa', 'App\\Notifications\\User\\NewTripNodification', 'App\\Models\\User', 1, '{\"title\":\"New Trip Submitted for Approval\",\"url\":\"http:\\/\\/127.0.0.1:8000\\/user\\/mytrip\"}', NULL, '2023-11-28 01:36:15', '2023-11-28 01:36:15');

-- --------------------------------------------------------

--
-- Table structure for table `password_resets`
--

CREATE TABLE `password_resets` (
  `email` varchar(255) NOT NULL,
  `token` varchar(255) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `password_reset_tokens`
--

CREATE TABLE `password_reset_tokens` (
  `email` varchar(255) NOT NULL,
  `token` varchar(255) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `permissions`
--

CREATE TABLE `permissions` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) NOT NULL,
  `guard_name` varchar(255) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `personal_access_tokens`
--

CREATE TABLE `personal_access_tokens` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `tokenable_type` varchar(255) NOT NULL,
  `tokenable_id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) NOT NULL,
  `token` varchar(64) NOT NULL,
  `abilities` text DEFAULT NULL,
  `last_used_at` timestamp NULL DEFAULT NULL,
  `expires_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `roles`
--

CREATE TABLE `roles` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) NOT NULL,
  `guard_name` varchar(255) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `roles`
--

INSERT INTO `roles` (`id`, `name`, `guard_name`, `created_at`, `updated_at`) VALUES
(1, 'user', 'user', NULL, NULL),
(2, 'approver', 'approver', NULL, NULL);

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
-- Table structure for table `taxis`
--

CREATE TABLE `taxis` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `trip_id` bigint(20) UNSIGNED NOT NULL,
  `tripid` varchar(255) NOT NULL,
  `origin` varchar(255) NOT NULL,
  `destination` varchar(255) NOT NULL,
  `trip_taxi` varchar(255) DEFAULT NULL,
  `preferences` varchar(255) DEFAULT NULL,
  `preferred_date` datetime NOT NULL,
  `status` varchar(255) NOT NULL DEFAULT 'pending',
  `ticket` varchar(255) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `taxis`
--

INSERT INTO `taxis` (`id`, `trip_id`, `tripid`, `origin`, `destination`, `trip_taxi`, `preferences`, `preferred_date`, `status`, `ticket`, `created_at`, `updated_at`) VALUES
(1, 2, '20230002', 'Erode', 'Coimbatore', 'SUV', '', '2023-11-29 15:52:00', 'pending', NULL, '2023-11-24 04:52:26', '2023-11-24 04:52:26'),
(2, 6, '20230006', 'Mumbai', 'coimbatore', 'Hatchback', '', '2023-11-09 17:41:00', 'pending', NULL, '2023-11-24 06:41:26', '2023-11-24 06:41:26'),
(3, 10, '20230010', 'Airport', 'Mall', 'SUV', '', '2023-11-29 17:30:00', 'pending', NULL, '2023-11-28 01:26:08', '2023-11-28 01:26:08');

-- --------------------------------------------------------

--
-- Table structure for table `trains`
--

CREATE TABLE `trains` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `trip_id` bigint(20) UNSIGNED NOT NULL,
  `tripid` varchar(255) NOT NULL,
  `origin` varchar(255) NOT NULL,
  `destination` varchar(255) NOT NULL,
  `trip_class` varchar(255) NOT NULL,
  `preferences` varchar(255) DEFAULT NULL,
  `preferred_date` datetime NOT NULL,
  `status` varchar(255) NOT NULL DEFAULT 'pending',
  `ticket` varchar(255) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `trains`
--

INSERT INTO `trains` (`id`, `trip_id`, `tripid`, `origin`, `destination`, `trip_class`, `preferences`, `preferred_date`, `status`, `ticket`, `created_at`, `updated_at`) VALUES
(1, 2, '20230002', 'Coimbatore', 'Chennai', '1A', NULL, '2023-11-27 15:51:00', 'pending', NULL, '2023-11-24 04:52:26', '2023-11-24 04:52:26'),
(2, 7, '20230007', 'Mumbai', 'coimbatore', '2A', NULL, '2023-11-25 18:07:00', 'pending', NULL, '2023-11-24 07:08:50', '2023-11-24 07:08:50');

-- --------------------------------------------------------

--
-- Table structure for table `trips`
--

CREATE TABLE `trips` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `user_id` bigint(20) UNSIGNED NOT NULL,
  `tripid` varchar(255) NOT NULL,
  `tripname` varchar(255) NOT NULL,
  `from_date` date NOT NULL,
  `to_date` date NOT NULL,
  `purpose` varchar(255) DEFAULT NULL,
  `remarks` varchar(255) DEFAULT NULL,
  `status` varchar(255) NOT NULL DEFAULT 'pending',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `trips`
--

INSERT INTO `trips` (`id`, `user_id`, `tripid`, `tripname`, `from_date`, `to_date`, `purpose`, `remarks`, `status`, `created_at`, `updated_at`) VALUES
(1, 1, '20230001', 'Coimbatore Trip', '2023-11-25', '2023-11-28', 'Test Trip', NULL, 'approved', '2023-11-24 03:13:44', '2023-11-29 03:44:37'),
(2, 1, '20230002', 'Coimbatore Trip1', '2023-11-27', '2023-11-30', 'Test Trip', NULL, 'approved', '2023-11-24 04:52:25', '2023-11-27 04:29:00'),
(5, 1, '20230005', 'Coimbatore Trip', '2023-11-25', '2023-11-30', 'Test3 Trip', 'Flight Date', 'clarification', '2023-11-24 06:39:03', '2023-11-27 05:45:56'),
(6, 1, '20230006', 'Coimbatore Trip', '2023-11-17', '2023-11-16', 'office', NULL, 'approved', '2023-11-24 06:41:26', '2023-11-27 04:04:20'),
(7, 1, '20230007', 'New Trip', '2023-11-25', '2023-11-30', 'Office Trip', NULL, 'reject', '2023-11-24 07:08:50', '2023-11-27 04:11:36'),
(8, 1, '20230008', 'Mumbai', '2023-11-28', '2023-11-30', 'Office Trip', NULL, 'reject', '2023-11-26 23:16:58', '2023-11-27 04:29:12'),
(9, 2, '20230009', 'Mumbai Trip', '2023-11-28', '2023-11-30', 'Office Trip', NULL, 'approved', '2023-11-27 03:13:54', '2023-11-27 04:32:40'),
(10, 1, '20230010', 'Chennai', '2023-11-29', '2023-12-01', 'official Trip', NULL, 'pending', '2023-11-28 01:26:08', '2023-11-28 01:26:08'),
(12, 1, '20230012', 'Coimbatore Trip', '2023-11-29', '2023-11-30', 'Office Trip', NULL, 'pending', '2023-11-28 01:33:50', '2023-11-28 01:33:50'),
(15, 1, '20230015', 'Bangalore', '2023-12-06', '2023-12-09', 'Office Trip', NULL, 'approved', '2023-12-05 01:48:56', '2023-12-05 01:56:42'),
(16, 1, '20230016', 'demo', '2023-12-06', '2023-12-07', 'Test Trip', NULL, 'pending', '2023-12-05 02:10:24', '2023-12-05 02:10:24');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `email_verified_at` timestamp NULL DEFAULT NULL,
  `password` varchar(255) NOT NULL,
  `role` varchar(255) NOT NULL DEFAULT 'user',
  `remember_token` varchar(100) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `name`, `email`, `email_verified_at`, `password`, `role`, `remember_token`, `created_at`, `updated_at`) VALUES
(1, 'User1', 'user@pricol.com', NULL, '$2y$12$w8fgtpQIcmFvqUedLmyzFOv1Y8E3eMc24E9VoGpgNXipG87IES4rm', 'user', NULL, '2023-11-22 04:54:21', '2023-11-22 04:54:21'),
(2, 'Approver', 'approver@pricol.com', NULL, '$2y$12$/EQin4EsqUz4mt3Rog4/SuWqOsj5y6vumaeJeoBnGiW2WSuyOP0mu', 'approver', NULL, '2023-11-27 01:11:12', '2023-11-27 01:11:12');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `accomadations`
--
ALTER TABLE `accomadations`
  ADD PRIMARY KEY (`id`),
  ADD KEY `accomadations_trip_id_foreign` (`trip_id`);

--
-- Indexes for table `admins`
--
ALTER TABLE `admins`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `admins_email_unique` (`email`);

--
-- Indexes for table `advances`
--
ALTER TABLE `advances`
  ADD PRIMARY KEY (`id`),
  ADD KEY `advances_trip_id_foreign` (`trip_id`);

--
-- Indexes for table `buses`
--
ALTER TABLE `buses`
  ADD PRIMARY KEY (`id`),
  ADD KEY `buses_trip_id_foreign` (`trip_id`);

--
-- Indexes for table `connectivities`
--
ALTER TABLE `connectivities`
  ADD PRIMARY KEY (`id`),
  ADD KEY `connectivities_trip_id_foreign` (`trip_id`);

--
-- Indexes for table `failed_jobs`
--
ALTER TABLE `failed_jobs`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `failed_jobs_uuid_unique` (`uuid`);

--
-- Indexes for table `flights`
--
ALTER TABLE `flights`
  ADD PRIMARY KEY (`id`),
  ADD KEY `flights_trip_id_foreign` (`trip_id`);

--
-- Indexes for table `forexes`
--
ALTER TABLE `forexes`
  ADD PRIMARY KEY (`id`),
  ADD KEY `forexes_trip_id_foreign` (`trip_id`);

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
  ADD KEY `notifications_notifiable_type_notifiable_id_index` (`notifiable_type`,`notifiable_id`);

--
-- Indexes for table `password_resets`
--
ALTER TABLE `password_resets`
  ADD KEY `password_resets_email_index` (`email`);

--
-- Indexes for table `password_reset_tokens`
--
ALTER TABLE `password_reset_tokens`
  ADD PRIMARY KEY (`email`);

--
-- Indexes for table `permissions`
--
ALTER TABLE `permissions`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `permissions_name_guard_name_unique` (`name`,`guard_name`);

--
-- Indexes for table `personal_access_tokens`
--
ALTER TABLE `personal_access_tokens`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `personal_access_tokens_token_unique` (`token`),
  ADD KEY `personal_access_tokens_tokenable_type_tokenable_id_index` (`tokenable_type`,`tokenable_id`);

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
-- Indexes for table `taxis`
--
ALTER TABLE `taxis`
  ADD PRIMARY KEY (`id`),
  ADD KEY `taxis_trip_id_foreign` (`trip_id`);

--
-- Indexes for table `trains`
--
ALTER TABLE `trains`
  ADD PRIMARY KEY (`id`),
  ADD KEY `trains_trip_id_foreign` (`trip_id`);

--
-- Indexes for table `trips`
--
ALTER TABLE `trips`
  ADD PRIMARY KEY (`id`),
  ADD KEY `trips_user_id_foreign` (`user_id`);

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
-- AUTO_INCREMENT for table `accomadations`
--
ALTER TABLE `accomadations`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `admins`
--
ALTER TABLE `admins`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `advances`
--
ALTER TABLE `advances`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `buses`
--
ALTER TABLE `buses`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `connectivities`
--
ALTER TABLE `connectivities`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `failed_jobs`
--
ALTER TABLE `failed_jobs`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `flights`
--
ALTER TABLE `flights`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;

--
-- AUTO_INCREMENT for table `forexes`
--
ALTER TABLE `forexes`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=19;

--
-- AUTO_INCREMENT for table `permissions`
--
ALTER TABLE `permissions`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `personal_access_tokens`
--
ALTER TABLE `personal_access_tokens`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `roles`
--
ALTER TABLE `roles`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `taxis`
--
ALTER TABLE `taxis`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `trains`
--
ALTER TABLE `trains`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `trips`
--
ALTER TABLE `trips`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=17;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `accomadations`
--
ALTER TABLE `accomadations`
  ADD CONSTRAINT `accomadations_trip_id_foreign` FOREIGN KEY (`trip_id`) REFERENCES `trips` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `advances`
--
ALTER TABLE `advances`
  ADD CONSTRAINT `advances_trip_id_foreign` FOREIGN KEY (`trip_id`) REFERENCES `trips` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `buses`
--
ALTER TABLE `buses`
  ADD CONSTRAINT `buses_trip_id_foreign` FOREIGN KEY (`trip_id`) REFERENCES `trips` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `connectivities`
--
ALTER TABLE `connectivities`
  ADD CONSTRAINT `connectivities_trip_id_foreign` FOREIGN KEY (`trip_id`) REFERENCES `trips` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `flights`
--
ALTER TABLE `flights`
  ADD CONSTRAINT `flights_trip_id_foreign` FOREIGN KEY (`trip_id`) REFERENCES `trips` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `forexes`
--
ALTER TABLE `forexes`
  ADD CONSTRAINT `forexes_trip_id_foreign` FOREIGN KEY (`trip_id`) REFERENCES `trips` (`id`) ON DELETE CASCADE;

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
-- Constraints for table `role_has_permissions`
--
ALTER TABLE `role_has_permissions`
  ADD CONSTRAINT `role_has_permissions_permission_id_foreign` FOREIGN KEY (`permission_id`) REFERENCES `permissions` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `role_has_permissions_role_id_foreign` FOREIGN KEY (`role_id`) REFERENCES `roles` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `taxis`
--
ALTER TABLE `taxis`
  ADD CONSTRAINT `taxis_trip_id_foreign` FOREIGN KEY (`trip_id`) REFERENCES `trips` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `trains`
--
ALTER TABLE `trains`
  ADD CONSTRAINT `trains_trip_id_foreign` FOREIGN KEY (`trip_id`) REFERENCES `trips` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `trips`
--
ALTER TABLE `trips`
  ADD CONSTRAINT `trips_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
