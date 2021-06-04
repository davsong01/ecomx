-- phpMyAdmin SQL Dump
-- version 5.0.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: May 19, 2021 at 11:21 AM
-- Server version: 10.4.11-MariaDB
-- PHP Version: 7.3.14

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `ccl`
--

-- --------------------------------------------------------

--
-- Table structure for table `categories`
--

CREATE TABLE `categories` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `type` enum('Booking','Credit') COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `categories`
--

INSERT INTO `categories` (`id`, `type`, `created_at`, `updated_at`, `deleted_at`) VALUES
(1, 'Booking', '2021-04-30 03:25:40', '2021-04-30 03:25:40', NULL),
(2, 'Credit', '2021-04-30 03:25:40', '2021-04-30 03:25:40', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `collections`
--

CREATE TABLE `collections` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `edition_id` int(11) NOT NULL,
  `agent_id` int(11) NOT NULL,
  `amount_collected` int(11) NOT NULL,
  `unit_price` int(11) NOT NULL,
  `date_collected` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `editions`
--

CREATE TABLE `editions` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `volume_id` int(11) NOT NULL,
  `edition_id` int(10) UNSIGNED NOT NULL,
  `quantity` int(11) NOT NULL DEFAULT 0,
  `in_stock` int(11) NOT NULL,
  `production_date` date NOT NULL DEFAULT '2021-05-17',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `editions`
--

INSERT INTO `editions` (`id`, `volume_id`, `edition_id`, `quantity`, `in_stock`, `production_date`, `created_at`, `updated_at`, `deleted_at`) VALUES
(7212, 29, 156, 3850, 1955, '2021-04-24', '2021-04-30 06:13:14', '2021-05-18 11:50:50', NULL),
(7474, 29, 157, 2840, 1300, '2021-04-25', '2021-04-30 06:45:15', '2021-05-17 06:53:25', NULL),
(7475, 29, 158, 3960, 2010, '2021-04-26', '2021-05-01 06:08:06', '2021-05-18 10:26:06', NULL),
(7476, 29, 159, 3910, 2095, '2021-04-27', '2021-05-01 06:08:37', '2021-05-18 11:51:16', NULL),
(7477, 29, 160, 3970, 1610, '2021-04-28', '2021-05-01 06:09:10', '2021-05-05 04:47:37', NULL),
(7478, 29, 161, 3970, 2050, '2021-04-29', '2021-05-01 06:10:01', '2021-05-05 01:19:48', NULL),
(7479, 29, 162, 3990, 2050, '2021-04-30', '2021-05-01 06:10:36', '2021-05-05 01:40:40', NULL),
(7480, 29, 163, 3940, 1610, '2021-05-01', '2021-05-05 02:27:57', '2021-05-28 20:04:50', NULL),
(7481, 29, 164, 3940, 2410, '2021-05-01', '2021-05-05 02:27:57', '2021-05-18 11:53:13', NULL),
(7482, 29, 165, 3940, 2070, '2021-05-01', '2021-05-05 02:27:57', '2021-05-05 04:21:02', NULL),
(8300, 29, 166, 3940, 2020, '2021-05-01', '2021-05-05 02:42:02', '2021-05-05 04:38:11', NULL),
(8301, 29, 167, 2890, 2885, '2021-05-02', '2021-05-05 02:43:19', '2021-05-28 20:07:43', NULL),
(8302, 29, 168, 4050, 4050, '2021-05-03', '2021-05-05 02:44:05', '2021-05-05 02:44:05', NULL),
(8303, 29, 169, 4000, 3987, '2021-05-04', '2021-05-05 02:44:40', '2021-05-28 20:06:52', NULL);

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
(3, '2020_12_02_144538_create_zones_table', 1),
(4, '2020_12_02_145140_create_categories_table', 1),
(5, '2020_12_02_150752_create_editions_table', 1),
(6, '2020_12_02_160949_create_collections_table', 1),
(7, '2020_12_02_161605_create_returns_table', 1),
(8, '2020_12_02_161821_create_payments_table', 1),
(9, '2021_01_07_104112_create_volumes_table', 1),
(10, '2021_01_17_225920_create_payment_logs_table', 1),
(11, '2021_02_16_162212_create_settings_table', 1);

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
-- Table structure for table `payments`
--

CREATE TABLE `payments` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `edition_id` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `agent_id` int(11) NOT NULL,
  `amount` int(11) NOT NULL,
  `b_f` int(11) DEFAULT NULL,
  `wallet_balance` int(11) DEFAULT NULL,
  `payment_method` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `bank_name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `cashier_id` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `payment_date` datetime DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `payment_logs`
--

CREATE TABLE `payment_logs` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `agent_id` int(11) NOT NULL,
  `edition_id` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `type` enum('topup','topup_deleted','collection','collection_deleted','return','return_deleted') COLLATE utf8mb4_unicode_ci NOT NULL,
  `cashier_id` int(11) NOT NULL,
  `amount` int(11) NOT NULL,
  `quantity` int(11) DEFAULT NULL,
  `wallet_balance` int(11) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `returns`
--

CREATE TABLE `returns` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `edition_id` int(11) NOT NULL,
  `collection_id` int(11) NOT NULL,
  `agent_id` int(11) DEFAULT NULL,
  `user_id` int(11) NOT NULL,
  `amount_returned` int(11) NOT NULL,
  `unit_price` int(11) NOT NULL,
  `date_returned` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `settings`
--

CREATE TABLE `settings` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `publication_price` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `settings`
--

INSERT INTO `settings` (`id`, `publication_price`, `created_at`, `updated_at`) VALUES
(1, '65', '2021-04-30 03:25:39', '2021-04-30 05:15:35');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `username` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `email_verified_at` timestamp NULL DEFAULT NULL,
  `password` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `role` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `avatar` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `zone_id` int(11) DEFAULT NULL,
  `category_id` int(11) DEFAULT NULL,
  `categories` longtext CHARACTER SET utf8mb4 COLLATE utf8mb4_bin DEFAULT NULL CHECK (json_valid(`categories`)),
  `phone` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `address` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `wallet` int(11) NOT NULL DEFAULT 0,
  `remember_token` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `name`, `username`, `email`, `email_verified_at`, `password`, `role`, `avatar`, `zone_id`, `category_id`, `categories`, `phone`, `address`, `wallet`, `remember_token`, `created_at`, `updated_at`, `deleted_at`) VALUES
(1, 'Super Admin', 'badboy01', 'davsong01@gmail.com', NULL, '$2y$10$GB2Rk5T.YiWLNpZPzW/j6u6BPBXrvx.DBUApTQT1gqpVNqhKQD6pi', 'Super', NULL, NULL, NULL, NULL, NULL, NULL, 0, NULL, '2021-04-30 03:25:39', '2021-04-30 05:40:03', NULL),
(7, 'ADEIYE ABIODUN', 'adeiyeabbey48@yahoo.com', 'adeiyeabbey48@yahoo.com', NULL, '$2y$10$O9BSyJTTt4GiU8CM1HAtYuVpD3D5GUFXmgtRhTwOgoOKMxwpjaYBq', 'Admin', NULL, NULL, NULL, '[\"1\",\"2\"]', NULL, NULL, 0, 'I040G3rnYgy7cVq9bU7jNrnyeOO3Qg01rncZf6RE91TdFEPvMUY5uhZtXfxU', '2021-04-30 05:31:26', '2021-04-30 07:43:59', NULL),
(8, 'samson onifade', 'samsonshameleon', 'samsonshameleon@gmail.com', NULL, '$2y$10$rZfYw/XkV4g/fcC8OX0J8uucf0nohBq6arpvsWs215mK2UBSeVSm.', 'Entry', NULL, NULL, NULL, '[\"2\"]', NULL, NULL, 0, 'lRmu2vLe6qGWIkljuqTIyn0JDKiStUWWWSX2unobpFMoJUOmDrchXFFBceb4', '2021-04-30 05:35:05', '2021-04-30 05:35:05', NULL),
(9, 'Abosede Oyeleke', 'oyeleke', 'oyelekesabosede@gmail.com', NULL, '$2y$10$5udgIi9SZzzH29WQrlSF5.wVmS5jfimdYX.zMVvhB5H1ra9drRG6m', 'Super', NULL, NULL, NULL, '[\"1\",\"2\"]', NULL, NULL, 0, NULL, '2021-04-30 05:42:27', '2021-04-30 05:42:27', NULL),
(10, 'ADEKOLAPO', 'Ayinde001', 'bello.ibaheem@gmail.com', NULL, '$2y$10$WV4zyU3ns/1Ctekn/ZcZROAluZJYl/EAag9vuaTLwA.GlO4iccZZW', 'Cashier', NULL, NULL, NULL, '[\"1\",\"2\"]', NULL, NULL, 0, 'PM5Zun40L9sNZY6Ma8Nu3hBurJcK6eNksKhAZmHoYTRkI6F0l58H1nNDtSRy', '2021-04-30 05:45:41', '2021-04-30 05:47:28', NULL),
(11, 'GOLDEK', 'GOLDEK', NULL, NULL, '$2y$10$SbPNhnspR0aDm.gBshuKCOAL4icULU2FG5ZdKpyiXeb0MYvEQZei6', 'Agent', NULL, 16, 1, NULL, '08023872011', NULL, 0, NULL, '2021-04-30 06:51:43', '2021-04-30 06:51:43', NULL),
(12, 'ADEKIGBE', 'ADEKIGBE', NULL, NULL, '$2y$10$TGyZfr4LFv4DXQ/i8FO.fOEkorx950krSEDvJOX13YVoxP1jVx5bu', 'Agent', NULL, 16, 2, NULL, '08036919000', NULL, 0, NULL, '2021-04-30 06:54:26', '2021-05-17 07:53:03', NULL),
(13, 'ETO', 'ETO', 'ETO', NULL, '$2y$10$bzUWvSCOKiAUnB6mAJE33eq1/jbWPFFmCbsa5VLrt63tZgEUDcw2K', 'Agent', NULL, 16, 2, NULL, '07038328759', NULL, 0, NULL, '2021-04-30 06:56:53', '2021-05-05 05:32:47', NULL),
(14, 'UPRISING', 'UPRISING', NULL, NULL, '$2y$10$9a1LRSHj0MVlZUNAeH/j4eJp9WE4eR7s1NQIq0lDPG7ZxaYW422rS', 'Agent', NULL, 3, 1, NULL, '08033553691', NULL, 0, NULL, '2021-04-30 06:57:32', '2021-04-30 06:57:32', NULL),
(15, 'ARABIS', 'ARABIS', 'arabis@yahoo.com', NULL, '$2y$10$lrhkqZ7B5h2P34FhUVGpN.FSOXOENJHy.1arbqzbvc53FftCE8qYy', 'Agent', NULL, 16, 1, NULL, '08072011155', NULL, 0, NULL, '2021-04-30 06:57:53', '2021-04-30 07:33:22', NULL),
(16, 'YEMI VENTURES', 'YEMI VENTURES', 'YEMI', NULL, '$2y$10$zglGlta8EAvG4SNyuWBYjOFPgtmCW5jzCFb/t5wpTfk9AuhhOX1tm', 'Agent', NULL, 15, 2, NULL, '08132511607', NULL, 0, NULL, '2021-04-30 06:59:37', '2021-05-05 04:34:43', NULL),
(17, 'MARTINS', 'SUNSHINE', NULL, NULL, '$2y$10$NkcHMyzT6bj4KXEChAaLTONoMez1s9EEoZKrEoETJDOINzZoslLki', 'Agent', NULL, 3, 1, NULL, '09035686669', NULL, 0, NULL, '2021-04-30 07:00:40', '2021-04-30 07:00:40', NULL),
(18, 'GOOD NEWS', 'GOOD NEWS', 'GOODNEWS', NULL, '$2y$10$Mwhw7ot7/5Y1YL3JhVXWgOsfPVLlFwSdyF4XRyrvNxJFVDCmJMcuW', 'Agent', NULL, 11, 2, NULL, '08024247370', NULL, 0, NULL, '2021-04-30 07:01:28', '2021-05-05 04:36:24', NULL),
(19, 'STAINLESS', 'STAINLESS', NULL, NULL, '$2y$10$5OBUDROftAVhXZzlgwisbOkbs1vzkdqRpZnptXek5gDiPWfJ/NIG.', 'Agent', NULL, 11, 1, NULL, '09075380971', NULL, 0, NULL, '2021-04-30 07:02:26', '2021-04-30 07:02:26', NULL),
(20, 'T.KENNETH', 'T.KENNETH', NULL, NULL, '$2y$10$c6dyyUyiOYXWmgrKpaAIC.a4YlgqJ9FtDy4NOjfiRnDaUExTeJiPO', 'Agent', NULL, 3, 2, NULL, '08057860374', NULL, 0, NULL, '2021-04-30 07:04:53', '2021-05-05 04:11:24', NULL),
(21, 'DEBORAH OLUWATIMILEHIN', 'PRECIOUS', NULL, NULL, '$2y$10$9RU7pcyVQ5wjyf8fUZw81.st3xQpZ4eeb4kHO2KGKNrmsXOtVm7gm', 'Agent', NULL, 11, 1, NULL, '07067041380', NULL, 0, NULL, '2021-04-30 07:05:22', '2021-04-30 07:05:22', NULL),
(22, 'U.GODWILL', 'U.GODWILL', NULL, NULL, '$2y$10$VvjThSexn8IskZm/47m0HuJJwAHu.25DJSxQcV6XCCHy17MLoFLgi', 'Agent', NULL, 3, 2, NULL, '08033327086', NULL, 0, NULL, '2021-04-30 07:06:44', '2021-05-05 04:11:41', NULL),
(23, 'ASI NEWS', 'ASI NEWS', 'ASINEWS', NULL, '$2y$10$Ubd1qGq1I4Y6WFbNpA7dC.OSDjfippYpUOoD0DESfcV/TuOVblv/.', 'Agent', NULL, 7, 2, NULL, '08033005557', NULL, 0, NULL, '2021-04-30 07:07:33', '2021-05-05 04:36:46', NULL),
(24, 'OSAGBEK', 'OSAGBEK', 'DARE', NULL, '$2y$10$QushDPF.pMuFKz/foBPTxu/UIQ3qF9fvmMOEcZ3I0ui5tGogDnLCC', 'Agent', NULL, 7, 2, NULL, '08024430004', NULL, 0, NULL, '2021-04-30 07:08:48', '2021-05-05 04:37:06', NULL),
(25, 'ANAYO', 'AMICABLE', NULL, NULL, '$2y$10$lJ6O0jReJOSeOUwDy8C.hu.b.qVRgt1uRTItXqthGVKnN61.4n.ce', 'Agent', NULL, 3, 1, NULL, '08139288720', NULL, 0, NULL, '2021-04-30 07:09:30', '2021-04-30 07:09:30', NULL),
(26, 'PETERSON', 'PETERSON', NULL, NULL, '$2y$10$74bvlupo8kS.WvYSdOv2Ru47zq8VHYYiGTSISvq5mRBDB5ZtBdNBC', 'Agent', NULL, 7, 1, NULL, '09079050890', NULL, 0, NULL, '2021-04-30 07:10:44', '2021-04-30 07:10:44', NULL),
(27, 'GAFTO', 'GAFTO', 'GAFTO@EMAIL.COM', NULL, '$2y$10$ZxKNUzniHJO9iW3hceWjCufJ8Q1lssaOtLnTBkzShdixIO09SHM/K', 'Agent', NULL, 3, 2, NULL, '08023161973', NULL, 0, NULL, '2021-04-30 07:11:08', '2021-05-05 04:12:50', NULL),
(28, 'G.URHOMA', 'G.URHOMA', NULL, NULL, '$2y$10$X3xKrLcnpowBlZnPY9HoqezySSP1lLbm7eBlGRomZp4gnvlSe6BIi', 'Agent', NULL, 7, 1, NULL, '09079050890', NULL, 0, NULL, '2021-04-30 07:12:31', '2021-04-30 07:12:31', NULL),
(29, 'AMALSCO', 'AMALSCO', NULL, NULL, '$2y$10$jFJJKJU1EaTRQbQojcpTwuItUbUGBl4UxObC64EWyqYzTzd69fEry', 'Agent', NULL, 3, 1, NULL, '08028515923', NULL, 0, NULL, '2021-04-30 07:12:41', '2021-04-30 07:12:41', NULL),
(30, 'YUSUF', 'YUSUF', NULL, NULL, '$2y$10$0k8hn9c0kq4Zpq1XAEj72.GPDbDr6nd9tfk.o3vPUUT8sBpknQd0i', 'Agent', NULL, 7, 1, NULL, '09079050890', NULL, 0, NULL, '2021-04-30 07:13:24', '2021-04-30 07:13:24', NULL),
(31, 'DE PROPH', 'DE PROPH', NULL, NULL, '$2y$10$z8XU28rYgzNb.iOOAMoQROb0.NCZ8Bx/Wc1Xy0kgLW.Gd7Hqi2kSq', 'Agent', NULL, 12, 1, NULL, '09027984684', NULL, 0, NULL, '2021-04-30 07:15:21', '2021-05-05 05:52:21', NULL),
(32, 'CAMPBELL', 'CAMPBELL', NULL, NULL, '$2y$10$YXDseMECRlfJlTLJ50n6cOQDkFpHussECcyZybZhoNcdXR6Gdgl92', 'Agent', NULL, 3, 2, NULL, '08063510999', NULL, 0, NULL, '2021-04-30 07:15:27', '2021-05-05 04:13:07', NULL),
(33, 'URENMI', 'URENMI', NULL, NULL, '$2y$10$T5CfWFfHkyvYFNmgPge8J.3q8f1fA4fkkUCGdIlY1Sc0HM/CP0WwC', 'Agent', NULL, 5, 1, NULL, '08087653066', NULL, 0, NULL, '2021-04-30 07:17:04', '2021-04-30 07:17:04', NULL),
(34, 'GOD\'S OWN', 'GOD\'S OWN', 'MARTINS@EMAIL.COM', NULL, '$2y$10$pY/vVwE.4PP5W7LN5Q9efOyReeCH7rO6pCpm1NzSXUyoVjrqggcW.', 'Agent', NULL, 3, 2, NULL, '09035686669', NULL, 0, NULL, '2021-04-30 07:17:41', '2021-05-05 04:14:37', NULL),
(35, 'OKUSON', 'OKUSON', NULL, NULL, '$2y$10$RKqKVQfLJ2hnKBXPcwrjZezQx3YImcNwxOQKaPeeAcDl9hZPLTY/G', 'Agent', NULL, 6, 1, NULL, '08060366397', NULL, 0, NULL, '2021-04-30 07:18:18', '2021-04-30 07:18:18', NULL),
(36, 'ONI AND SON', 'ONI AND SON', NULL, NULL, '$2y$10$FtnDp7sUIsfPjMFYiJTMpuWQl09eZZcgi5Avo0Pl.Zd4ULVgTfyKW', 'Agent', NULL, 6, 1, NULL, '08027818016', NULL, 0, NULL, '2021-04-30 07:18:55', '2021-04-30 07:18:55', NULL),
(37, 'TUNJI', 'TUNJI', NULL, NULL, '$2y$10$2dWQTgpbUlVM3e2sJXX9e.epRqZXAr7Qytr0wrrfDnn/Vx8eWp2xy', 'Agent', NULL, 3, 2, NULL, '08023223482', NULL, 0, NULL, '2021-04-30 07:19:23', '2021-05-05 04:14:55', NULL),
(38, 'BABS', 'BABS', 'BABS@yahoo.com', NULL, '$2y$10$E9Q/1LaKCrbzjxrGufHJzeTxdn7b5lJi9R1/0YeW/9pRugrQ0jN3y', 'Agent', NULL, 6, 2, NULL, '09093931095', NULL, 0, NULL, '2021-04-30 07:19:53', '2021-05-05 04:38:11', NULL),
(39, 'FAKIRA', 'FAKIRA', NULL, NULL, '$2y$10$y0xb1QhTyDYAcOhDJH99wOB2rXFscS7tdNfizSq9JqUIKLkcaoCWS', 'Agent', NULL, 3, 1, NULL, '08117911777', NULL, 0, NULL, '2021-04-30 07:20:33', '2021-04-30 07:20:33', NULL),
(40, 'PRINCE', 'PRINCE', NULL, NULL, '$2y$10$jlOwfVlCl0Ftv/tE9G3HVe9o/UvqLOi/5yaDgyHNOykIk8ZSfwJYS', 'Agent', NULL, 6, 1, NULL, '08165589799', NULL, 0, NULL, '2021-04-30 07:21:02', '2021-04-30 07:21:02', NULL),
(41, 'TUNDE OLA', 'TUNDE OLA', NULL, NULL, '$2y$10$XdGc0aWnoMhv2Mgt63.T9uklXaZ.zZlbgMMsNwCk/zcQOeAGfFyG.', 'Agent', NULL, 3, 2, NULL, '08023435318', NULL, 0, NULL, '2021-04-30 07:21:48', '2021-05-05 04:15:13', NULL),
(42, 'EWOSCO', 'EWOSCO', NULL, NULL, '$2y$10$gijjcQoK8lmuGiX3/uPAsuYdPfGZg9GksMS97Nef4SZCbNGTize0G', 'Agent', NULL, 6, 1, NULL, '08080252367', NULL, 0, NULL, '2021-04-30 07:22:20', '2021-04-30 07:22:20', NULL),
(43, 'EMMANUEL', 'EMMANUEL', NULL, NULL, '$2y$10$V1L1j6ytpiXutarQXHA3c.gct9aAZnzagS/tN938Q7pT54LdXgQoS', 'Agent', NULL, 6, 1, NULL, '08080252367', NULL, 0, NULL, '2021-04-30 07:23:08', '2021-04-30 07:23:08', NULL),
(44, 'J.O. BAMISHE', 'BAMISHE', NULL, NULL, '$2y$10$L2tlcOnG7rEtsb/vhcqSnuFVDbRM4pIJACV4nXXc7W54M/1vmaF5u', 'Agent', NULL, 3, 1, NULL, '09084824059', NULL, 0, NULL, '2021-04-30 07:23:32', '2021-04-30 07:23:32', NULL),
(45, 'BARTH VIVIAN', 'BARTH VIVIAN', NULL, NULL, '$2y$10$e7wJN8Hp2r/uhW/OQSVgp.F2GHo.l7P6pHU5jyQzECX7kZK62hv8i', 'Agent', NULL, 6, 1, NULL, '08034557620', NULL, 0, NULL, '2021-04-30 07:24:24', '2021-04-30 07:24:24', NULL),
(46, 'KAMOLI', 'ODUS', NULL, NULL, '$2y$10$4BaMW9XcCEeLNb3QMGrL4eDEBdZydvDP01SoZa4MF1rEk1dAjY4wG', 'Agent', NULL, 3, 1, NULL, '08066359177', NULL, 0, NULL, '2021-04-30 07:25:03', '2021-04-30 07:25:03', NULL),
(47, 'HAMMED ALEJO', 'SOLIK KAY', NULL, NULL, '$2y$10$O0tjQGl3qXRrUstgar2wbug/7oaVSS5wpS2/EB3QTixVUVfNVeOzS', 'Agent', NULL, 6, 1, NULL, '08080252367', NULL, 0, NULL, '2021-04-30 07:25:07', '2021-04-30 07:25:07', NULL),
(48, 'SALAM', 'SALAM', 'SLAM', NULL, '$2y$10$Wk52WGz0hAZTHPrioXyeyORewe1wabj0w5d0RPPQGjln2TgpwF2jO', 'Agent', NULL, 8, 2, NULL, '08022211071', NULL, 0, NULL, '2021-04-30 07:26:24', '2021-05-05 04:24:41', NULL),
(49, 'ADEMERCY', 'ADEMERCY', NULL, NULL, '$2y$10$U8oxEyRg9qetkKgQEYwmKeQzSxmSI/4tq8YqbGuDunHexhNcdt37C', 'Agent', NULL, 4, 2, NULL, '07030060309', NULL, 0, NULL, '2021-04-30 07:26:38', '2021-05-05 04:20:03', NULL),
(50, 'MOSES', 'MOSES', NULL, NULL, '$2y$10$DQKRXRoPdtrb4lYGXFWVOOQjR3OufFykDVzVG26GrugpyncLy/wI.', 'Agent', NULL, 8, 1, NULL, '08026782168', NULL, 0, NULL, '2021-04-30 07:27:08', '2021-04-30 07:27:08', NULL),
(51, 'TONEX', 'TONEX', NULL, NULL, '$2y$10$761h6t/Ln4P.YZ4R0xkXE.kMuzLReehzq4iaG/IraBW/kG2Bha0FK', 'Agent', NULL, 4, 1, NULL, '08130533634', NULL, 0, NULL, '2021-04-30 07:27:27', '2021-04-30 07:27:27', NULL),
(52, 'MURPHY', 'MURPHY', NULL, NULL, '$2y$10$p/NzTwGmc0MZY2JjKmpWGeEbq1F/83W3bnTzUtBufLRwgp2kcnL3e', 'Agent', NULL, 10, 2, NULL, '08023595079', NULL, 0, NULL, '2021-04-30 07:29:32', '2021-05-05 04:55:25', NULL),
(53, 'DR. EHISCO', 'EHISCO', NULL, NULL, '$2y$10$O.Cc/1dIQBtiCrvyvrLwfOVetS6m0OBcBberNffiUkWvMeKGmLc0K', 'Agent', NULL, 4, 1, NULL, '08059812484', NULL, 0, NULL, '2021-04-30 07:30:20', '2021-04-30 07:30:20', NULL),
(54, 'FRANK', 'FRANK', NULL, NULL, '$2y$10$BPD4NLwptTzNo3V8XBl.VeQcWAIp4Jhn2hDSRg6d9r7YxPGHnM4cC', 'Agent', NULL, 10, 2, NULL, '08034141817', NULL, 0, NULL, '2021-04-30 07:30:30', '2021-05-05 04:02:41', NULL),
(55, 'U.D.N', 'U.D.N', NULL, NULL, '$2y$10$7SCNvhzr.Jz.bZS5vTbe..w87L3V5sPtTkl1dcTacL/fzS1y2FkS2', 'Agent', NULL, 4, 2, NULL, '07087064924', NULL, 0, NULL, '2021-04-30 07:31:15', '2021-05-05 04:20:23', NULL),
(56, 'ELDER OBETECH', 'OBETECH', NULL, NULL, '$2y$10$T4PzvEKNiIq78.E2bm9i3Oio01NMzw2pT9uM3lMjJNPd/5q1AOX.G', 'Agent', NULL, 4, 2, NULL, '08023411107', NULL, 0, NULL, '2021-04-30 07:33:57', '2021-05-05 04:20:43', NULL),
(57, 'SHOLA MOSCO', 'SHOLA MOSCO', NULL, NULL, '$2y$10$AxOV/LtNf1eDCbfhZ0ruw.7j363TWpeL.vq79SrOXTnGSPhWGDIq.', 'Agent', NULL, 13, 1, NULL, '08053642764', NULL, 0, NULL, '2021-04-30 07:35:12', '2021-04-30 07:35:12', NULL),
(58, 'MARY VENTURES', 'MARY VENTURES', NULL, NULL, '$2y$10$ZYr56VFxl3tiwPeMayMIJeMTa4tBUzmQM9r7d764okPhKD2.RXPYC', 'Agent', NULL, 4, 1, NULL, '08161670540', NULL, 0, NULL, '2021-04-30 07:36:09', '2021-04-30 07:36:09', NULL),
(59, 'ADEGOKE', 'ADEGOKE', NULL, NULL, '$2y$10$bRzETF4WECYMN9Be30XybuISE25o.hEQ3nWHzZ1mF1.N.A65Y8CVy', 'Agent', NULL, 13, 1, NULL, '08066664080', NULL, 0, NULL, '2021-04-30 07:36:11', '2021-04-30 07:36:11', NULL),
(60, 'BILLY VENTURE', 'BILLY VENTURE', NULL, NULL, '$2y$10$hrOHrDA42FHcmrN8VLW0Lu1nxXks1QEAplrOaln5YVHnhcwCvnvtu', 'Agent', NULL, 13, 1, NULL, '08066664080', NULL, 0, NULL, '2021-04-30 07:36:41', '2021-04-30 07:36:41', NULL),
(61, 'ATANDA', 'ATANDA', NULL, NULL, '$2y$10$3ee40P6whR/1jWObDuJtw.2Pv6JYwrmbGvlCqcSfa6e.emGsGISx2', 'Agent', NULL, 4, 2, NULL, '07065094444', NULL, 0, NULL, '2021-04-30 07:37:15', '2021-05-05 04:21:02', NULL),
(62, 'FABULOUS', 'FABULOUS', NULL, NULL, '$2y$10$laWu7pKGWSpHQTnYqcVRUuZl9fkI6cK7K3WZyoIyND4vGKDHPWbwe', 'Agent', NULL, 13, 1, NULL, '07043646443', NULL, 0, NULL, '2021-04-30 07:37:52', '2021-04-30 07:37:52', NULL),
(63, 'ADEWUNMI', 'ADEWUNMI', NULL, NULL, '$2y$10$O.gagX7CVziRv.QB69CS1ui1ZvG5jtOOTy.nCENkZ3yuhIL5ZrHRq', 'Agent', NULL, 4, 2, NULL, '07062884910', NULL, 0, NULL, '2021-04-30 07:38:03', '2021-05-05 04:21:20', NULL),
(64, 'DAMILOLA', 'DAMILOLA', NULL, NULL, '$2y$10$WjCIuNOfH2wWR6JbOv0h..neJr/fXSEhwnbZWl86qWVmJSPe.TA6a', 'Agent', NULL, 12, 1, NULL, '08066664080', NULL, 0, NULL, '2021-04-30 07:38:27', '2021-04-30 07:38:27', NULL),
(65, 'JUMOKE', 'JUMOKE', NULL, NULL, '$2y$10$fMmEeqh8AvTGXzjNQgMfNO/748g4Ja8IZHcU8mUNO.S8TuM.nlG2G', 'Agent', NULL, 4, 1, NULL, '08161670540', NULL, 0, NULL, '2021-04-30 07:38:36', '2021-04-30 07:38:36', NULL),
(66, 'ALBERT ASI', 'ASI AIRPORT', NULL, NULL, '$2y$10$JhJ1l.ujPv6ophXReec9vOGWEUn5UAlOnERmsqKI5i0dhOINBf4e2', 'Agent', NULL, 4, 1, NULL, '08161670540', NULL, 0, NULL, '2021-04-30 07:40:59', '2021-04-30 07:40:59', NULL),
(67, 'IBUKUN', 'IBUKUN', 'IBUKUN@yahoo.com', NULL, '$2y$10$HACUWj7VNqbKFzAbdER8De23PgJ2kVc/RxiMEmeWOWzkTLOPgZN5W', 'Agent', NULL, 4, 2, NULL, '0803503537', NULL, 0, NULL, '2021-04-30 07:46:18', '2021-05-05 04:21:41', NULL),
(68, 'AKINBUNMI', 'AKINBUNMI', NULL, NULL, '$2y$10$7kcp7esLica0BNEZLJ/LzeHc8ySrfKQ3koffC9gvLX9F2ozlui06a', 'Agent', NULL, 4, 1, NULL, '08161670540', NULL, 0, NULL, '2021-04-30 07:51:38', '2021-04-30 07:51:38', NULL),
(69, 'ESSIEN', 'ESSIEN', NULL, NULL, '$2y$10$5m7FxLLr8kuCyDsbmsS6CeSRhsQ/1G7svf2Y7irRsB//hMfvMztZ6', 'Agent', NULL, 4, 1, NULL, '07038334752', NULL, 0, NULL, '2021-04-30 07:53:36', '2021-04-30 07:53:36', NULL),
(70, 'OLADUNBI', 'OLADUNBI', NULL, NULL, '$2y$10$ejwf4R2I45xMdR5HSP2s1eOG.ISwY6XN7wsQ9i8lUi6VQkMu21s9a', 'Agent', NULL, 9, 1, NULL, '08061265805', NULL, 0, NULL, '2021-04-30 07:54:03', '2021-04-30 07:54:03', NULL),
(71, 'OLA OLU', 'OLA OLU', NULL, NULL, '$2y$10$WGf.ay2iu1T926dKUnlW/uXHQ.RLNSWczTDTGWEFtJjoZgffeo/SG', 'Agent', NULL, 9, 2, NULL, '07069663386', NULL, 0, NULL, '2021-04-30 07:54:53', '2021-05-05 04:07:01', NULL),
(72, 'TUNES', 'TUNES', NULL, NULL, '$2y$10$T81C1nAjl7SArbC2oynCJOkqH0HpQACbQm8XqynfVzb73Zxbm2xL6', 'Agent', NULL, 9, 2, NULL, '08061265805', NULL, 0, NULL, '2021-04-30 07:56:06', '2021-05-05 04:08:06', NULL),
(73, 'FASHOLA', 'FASHOLA', NULL, NULL, '$2y$10$sUwrV8B6ZhK3As86O5OOteDG.yn9x3ePvymh/kCpHTctR/mbi0MX.', 'Agent', NULL, 9, 2, NULL, '08028445722', NULL, 0, NULL, '2021-04-30 07:57:32', '2021-05-05 04:09:00', NULL),
(74, 'TALABOSE', 'TALABOSE', NULL, NULL, '$2y$10$LWeJ3o4UMvBgK6Yzhw6pWOC58O5Q2gCXZvL6MMf3C9yOpvllRW9he', 'Agent', NULL, 9, 2, NULL, '07061186100', NULL, 0, NULL, '2021-04-30 07:58:09', '2021-05-05 04:09:44', NULL),
(75, 'BUSOLA', 'BUSOLA', NULL, NULL, '$2y$10$4O4VUDKq9su4WNqu1/fgHeNWz3P8StpHSVkN7NBWlPsu4EcPdS2Q.', 'Agent', NULL, 9, 1, NULL, '08061265805', NULL, 0, NULL, '2021-04-30 07:58:54', '2021-04-30 07:58:54', NULL),
(76, 'D SENT', 'D SENT', 'DSENT@yahoo.com', NULL, '$2y$10$QdUZ5EK4qXPn078mbfGx5etf2hyFOlfqd8hdIj9Nx/K9zznUaTrpq', 'Agent', NULL, 9, 1, NULL, '08061265805', NULL, 0, NULL, '2021-04-30 08:00:02', '2021-05-01 06:39:12', NULL),
(77, 'OLUSANYA', 'OLUSANYA', NULL, NULL, '$2y$10$KGZBPXr1QgnroXEKXoX0he9JG89Ed8bSKq45DMduwe5pP87SahOtK', 'Agent', NULL, 9, 1, NULL, '08061265805', NULL, 0, NULL, '2021-04-30 08:00:36', '2021-04-30 08:00:36', NULL),
(79, 'UZORSON', 'UZORSON', NULL, NULL, '$2y$10$fkKSFHi6dVCYIbqexPwwOeElhvksDDsQW2f2EegJF9Z3ZbUlDYSNu', 'Agent', NULL, 9, 2, NULL, '08072336188', NULL, 0, NULL, '2021-04-30 08:02:53', '2021-05-05 04:10:23', NULL),
(80, 'THUNDER', 'THUNDER', NULL, NULL, '$2y$10$jRSG7T1mRiDkOqUboKO/Uevgf5BGXqYh1WrsCuKpUxP1SySSSpYHi', 'Agent', NULL, 9, 2, NULL, '08028445722', NULL, 0, NULL, '2021-05-01 06:25:08', '2021-05-05 04:10:05', NULL),
(81, 'KIGBE', 'KIGBE', 'KIGBE@YAHOO.COM', NULL, '$2y$10$x5C0oBre7MlMMNQMBQN6l.SzfT1vtLv59Qp7x/5KKFki66lTMaH8u', 'Agent', NULL, 14, 2, NULL, '09079050890', NULL, 0, NULL, '2021-05-01 07:00:37', '2021-05-05 04:35:25', NULL),
(82, 'New Agent', 'newagent', 'noemail@gmail.com', NULL, '$2y$10$HLNKX7l5lx6yX0tShJM9J.ERT5aeIrioRa1ZO7b/F9qjpeGdNAtTS', 'Agent', NULL, 3, 2, NULL, '09090', NULL, 0, NULL, '2021-05-17 06:35:18', '2021-05-28 20:07:43', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `volumes`
--

CREATE TABLE `volumes` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `zones`
--

CREATE TABLE `zones` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `zones`
--

INSERT INTO `zones` (`id`, `name`, `created_at`, `updated_at`, `deleted_at`) VALUES
(3, 'LAGOS', '2021-04-30 05:55:23', '2021-04-30 05:55:23', NULL),
(4, 'OSHODI', '2021-04-30 05:55:39', '2021-04-30 05:55:39', NULL),
(5, 'CELE EXPRESS', '2021-04-30 06:04:39', '2021-04-30 06:04:39', NULL),
(6, 'CELE MILE2', '2021-04-30 06:04:59', '2021-04-30 06:04:59', NULL),
(7, 'FIRST GATE', '2021-04-30 06:05:12', '2021-04-30 06:05:12', NULL),
(8, 'IJAYE', '2021-04-30 06:05:28', '2021-04-30 06:05:28', NULL),
(9, 'IKEJA', '2021-04-30 06:05:38', '2021-04-30 06:05:38', NULL),
(10, 'MARYLAND', '2021-04-30 06:06:19', '2021-04-30 06:06:19', NULL),
(11, 'JIBOWU', '2021-04-30 06:06:31', '2021-04-30 06:06:31', NULL),
(12, 'SANGO', '2021-04-30 06:06:44', '2021-04-30 06:06:44', NULL),
(13, 'KETU', '2021-04-30 06:46:20', '2021-04-30 06:46:20', NULL),
(14, 'IKOTUN', '2021-04-30 06:46:31', '2021-04-30 06:46:31', NULL),
(15, 'IKORODU', '2021-04-30 06:46:41', '2021-04-30 06:46:41', NULL),
(16, 'IPAJA', '2021-04-30 06:47:58', '2021-04-30 06:47:58', NULL);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `categories`
--
ALTER TABLE `categories`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `categories_type_unique` (`type`);

--
-- Indexes for table `collections`
--
ALTER TABLE `collections`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `editions`
--
ALTER TABLE `editions`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `migrations`
--
ALTER TABLE `migrations`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `password_resets`
--
ALTER TABLE `password_resets`
  ADD KEY `password_resets_email_index` (`email`);

--
-- Indexes for table `payments`
--
ALTER TABLE `payments`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `payment_logs`
--
ALTER TABLE `payment_logs`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `returns`
--
ALTER TABLE `returns`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `settings`
--
ALTER TABLE `settings`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `users_username_unique` (`username`);

--
-- Indexes for table `volumes`
--
ALTER TABLE `volumes`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `zones`
--
ALTER TABLE `zones`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `categories`
--
ALTER TABLE `categories`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `collections`
--
ALTER TABLE `collections`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=369;

--
-- AUTO_INCREMENT for table `editions`
--
ALTER TABLE `editions`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8304;

--
-- AUTO_INCREMENT for table `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT for table `payments`
--
ALTER TABLE `payments`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=32;

--
-- AUTO_INCREMENT for table `payment_logs`
--
ALTER TABLE `payment_logs`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=418;

--
-- AUTO_INCREMENT for table `returns`
--
ALTER TABLE `returns`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT for table `settings`
--
ALTER TABLE `settings`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=83;

--
-- AUTO_INCREMENT for table `volumes`
--
ALTER TABLE `volumes`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `zones`
--
ALTER TABLE `zones`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=17;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
