-- phpMyAdmin SQL Dump
-- version 5.0.4
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Mar 06, 2021 at 04:26 PM
-- Server version: 10.4.17-MariaDB
-- PHP Version: 7.4.13

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `shay_b_labn`
--

-- --------------------------------------------------------

--
-- Table structure for table `availables`
--

CREATE TABLE `availables` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `consultant_id` bigint(20) UNSIGNED NOT NULL,
  `available_date` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `available_time` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `availables`
--

INSERT INTO `availables` (`id`, `consultant_id`, `available_date`, `available_time`, `created_at`, `updated_at`) VALUES
(1, 2, '2021-02-21', '19:39:00', '2021-02-21 07:38:30', '2021-02-21 08:10:40'),
(3, 2, '2021-02-26', '13:39:00', '2021-02-21 07:38:30', '2021-02-21 07:38:30'),
(4, 2, '2021-02-24', '13:39:00', '2021-02-21 07:38:30', '2021-02-21 07:38:30'),
(5, 2, '2021-02-28', '14:12:00', '2021-02-21 08:10:50', '2021-02-21 08:10:50'),
(6, 2, '2021-02-21', '17:18:00', '2021-02-21 11:15:37', '2021-02-21 11:15:37'),
(7, 4, 'Sunday', '10:00', '2021-03-06 13:25:28', '2021-03-06 13:25:28'),
(8, 4, 'Sunday', '12:00', '2021-03-06 13:25:28', '2021-03-06 13:25:28'),
(9, 4, 'Sunday', '15:00', '2021-03-06 13:25:28', '2021-03-06 13:25:28'),
(10, 4, 'Sunday', '17:00', '2021-03-06 13:25:28', '2021-03-06 13:25:28'),
(11, 4, 'Tuesday', '13:00', '2021-03-06 13:25:28', '2021-03-06 13:25:28'),
(12, 4, 'Tuesday', '14:30', '2021-03-06 13:25:28', '2021-03-06 13:25:28'),
(13, 4, 'Tuesday', '16:30', '2021-03-06 13:25:28', '2021-03-06 13:25:28'),
(14, 4, 'Tuesday', '20:30', '2021-03-06 13:25:28', '2021-03-06 13:25:28'),
(15, 4, 'Wednesday', '15:30', '2021-03-06 13:25:28', '2021-03-06 13:25:28'),
(16, 4, 'Wednesday', '16:00', '2021-03-06 13:25:28', '2021-03-06 13:25:28'),
(17, 4, 'Wednesday', '21:30', '2021-03-06 13:25:28', '2021-03-06 13:25:28'),
(18, 4, 'Wednesday', '22:30', '2021-03-06 13:25:28', '2021-03-06 13:25:28'),
(19, 4, 'Thursday', '15:30', '2021-03-06 13:25:28', '2021-03-06 13:25:28'),
(20, 4, 'Thursday', '21:30', '2021-03-06 13:25:28', '2021-03-06 13:25:28');

-- --------------------------------------------------------

--
-- Table structure for table `categories`
--

CREATE TABLE `categories` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `image` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `sort` int(11) DEFAULT 1,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `categories`
--

INSERT INTO `categories` (`id`, `image`, `sort`, `created_at`, `updated_at`) VALUES
(1, 'CnbR2jBacvgsU8iwn8SKrrwZkZ9DICA1JTnlKfde.jpg', 1, '2021-03-06 07:03:46', '2021-03-06 07:03:46');

-- --------------------------------------------------------

--
-- Table structure for table `category_translations`
--

CREATE TABLE `category_translations` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `locale` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `category_id` bigint(20) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `category_translations`
--

INSERT INTO `category_translations` (`id`, `name`, `locale`, `category_id`, `created_at`, `updated_at`) VALUES
(1, 'Kimberley Travis', 'ar', 1, '2021-03-06 07:03:46', '2021-03-06 07:03:46'),
(2, 'Alyssa Thomas', 'en', 1, '2021-03-06 07:03:46', '2021-03-06 07:03:46');

-- --------------------------------------------------------

--
-- Table structure for table `clients`
--

CREATE TABLE `clients` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `mobile` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `email` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `image` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `gender` enum('male','female') COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `status` enum('married','single','engaged','detached') COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `password` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `age` varchar(250) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `api_token` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `fcm_token` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `locale` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT 'en',
  `facebook_id` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `google_id` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `clients`
--

INSERT INTO `clients` (`id`, `name`, `mobile`, `email`, `image`, `gender`, `status`, `password`, `age`, `api_token`, `fcm_token`, `locale`, `facebook_id`, `google_id`, `created_at`, `updated_at`) VALUES
(2, 'Mohamed Eid update', '01015690452', NULL, '15091933761613908937.png', 'male', 'single', '$2y$10$0PLLtrRkCvevBxvEFBoLmeIgcEASPVYSKU4h2KyNKAJsaaDQFjaDi', '2010-2-2', '9PYNQFy9Dk4Dhjk2E84lhJ54K0AbKkhb310gcJtvsEkiiZGsMFa9ZCOVptVqE6kOQWWMjKUyBzz4gaJz7xrhD81xf5K65wmT1mQZ', '12345678', 'en', NULL, NULL, '2021-02-21 10:02:18', '2021-02-25 13:35:50'),
(3, 'ahmed', '0155101611', NULL, '608716471614011240.png', 'male', 'single', '$2y$10$gLWdOuhEKq5Y2L2zg9IjqeZtOE.17VLZWr.TBp2eGepxciDfZ20by', '2010-2-2', 'oPjjTU28VUN8I9IxmE0wx2ReeyfGdbPxsdvlEWyiLPoENS5unBgZEQ4iiCDBRVNn74320BnEUVc7NLtahnVRq9DIqvkMoz6eZUem', NULL, 'en', NULL, NULL, '2021-02-22 21:27:20', '2021-02-28 21:02:31'),
(4, 'Mohamed Eid', '010101010', NULL, '3374323031614071586.png', 'male', 'single', '$2y$10$0frNiTz119oQbIBagx3Ye.Ha6fak3xn9J2uxL5jXUfw4GxcolpSt.', '22-12-1998', '5JIcIUP9QjB8KGrzpBelSWB4HNtpDJ4tRXTJcKJs6dyPESnFBj0lfVaztdZXuMFeWfukTM1ygarAiccqLOJ6RUKZxk6ouBvWYFh2', NULL, 'en', NULL, NULL, '2021-02-23 14:13:06', '2021-02-23 14:13:06'),
(5, 'Mohamed Eid', '01551016557', NULL, '7758441411614073561.png', 'male', 'single', '$2y$10$ij6/SY2wmDWaQd/rp376u.n3h8HLLiyl.pPGbK1chBrUBLe5p/GkK', '22-12-1998', 'EYJZKy2VS65jQM8k2dWZ1OwqDUWAwtnHR1M8T52eIvLCFo7FRQUjKnZZmr4BAtMzmp16zP5TDLeLpejyux7CibKSymQs3EzGgMjf', NULL, 'en', NULL, NULL, '2021-02-23 14:46:01', '2021-02-23 14:46:01'),
(6, 'Mohamed Eid', '0101596045211', NULL, '16881317621614075962.png', 'male', 'single', '$2y$10$jJk1bjCh80NgTyl9VShf6unnSN2XhvhS93Z5vZ1av9.nJZqIo/G3y', '22-12-1998', 'hqdtBEpsf5cfbiLsNM2iMXSWzyY7MM367SgPm6xoCZ4bTcV4QUK8OmdDLcs8QtYdiDV5zFfbiS4g22qCzqeX9Y7cJD8Ut6hyTOpw', NULL, 'en', NULL, NULL, '2021-02-23 15:26:03', '2021-02-23 15:26:03'),
(7, 'Mohamed Eid', '01015960477', NULL, '16997913431614076043.png', 'male', 'single', '$2y$10$LN8I2Ed8Q6a7uxFOVZlP5ORP242zeb7R7oP4UaSvUHfyWgyhssEm.', '22-12-1997', 'e2JqgvzjyvQlI14XOUEVVJEdsxGHSxA3qk2753NbRS4d3tQwVK0X3dTYAiIaWBIAY3N3nXgClcGitQC8DyQB9gNEbcCM5uxENjj4', NULL, 'en', NULL, NULL, '2021-02-23 15:27:23', '2021-02-23 15:27:23'),
(8, 'Mohamed Eid', '0101596048', NULL, '4148817861614076065.png', 'male', 'single', '$2y$10$a0tMPStJ9YlaJlEBIyRx4e.XR4D9Gr79myAt0vqOtCReoFpcTx2Tq', '22-12-1997', 'T7wID4N9RzsCUcnyBwDAZ7PUo0RPt08u5IQJ4Kxu6axKiA6itLT1ICu3vqtTqLS0GEeTgwaccJhHyC39k7kNALwsoOnpXWidiPf4', NULL, 'en', NULL, NULL, '2021-02-23 15:27:45', '2021-02-23 15:27:45'),
(9, 'ahmed', '01024015013', NULL, NULL, 'male', 'single', '$2y$10$vPB5Z1xk5KBtEE8u5tu2OuxU7USZZpgYqXCqit/FRuXy0qE/WYAnq', '28-9-2027', 'Mi9bSfxINL2878kw82QuKIzPHCP5wHw12smgmFWAKk3HT9m0S5i6JcI8ZQZ2AVLsmgv0yBZjbBCduFxEE3fGhBPATj1IskGgfbhO', NULL, 'en', NULL, NULL, '2021-02-23 16:37:48', '2021-02-23 16:37:48'),
(10, 'kahrba', '01551016887', NULL, NULL, 'male', 'single', '$2y$10$s82cHLyK48Xet5e43ed/HeMoh3O6mNz7GrjZ8L.lzGf2zFYzmxVvC', '27-8-2032', 'mv1WqfYuBYqCfAHUGBrUQSbtErDsNrsZpDxrpKzTuGTV4wLzwsBRaQ2Xmcb8VhaufXeDRAvcy2eQbnONw1dpDSN10UL2StaNztcu', NULL, 'en', NULL, NULL, '2021-02-23 16:49:12', '2021-02-24 13:25:52'),
(11, 'kahrba', '01019390010', NULL, NULL, 'male', 'single', '$2y$10$/O7kqzrvmcyXQRU3iBgqIefocAelYIZdPHH9UvvAwWg9miFqYNEjW', '24-12-2039', 'EpV9TezqdfTxDBpESNH4TgqFtdG10Z7aLt8O4Cqs4sKqVOEMxHp9uplDp0OcywARfW043Hox8J9JaWjxawdFSPx6OGDmCiiOhtSM', NULL, 'en', NULL, NULL, '2021-02-23 17:40:57', '2021-02-23 17:40:57'),
(15, 'ahmed', '0155106888', NULL, NULL, 'male', 'married', '$2y$10$wYTUlAg/S0I5OgmFgVh/nuRHgO1i/OowOwe2SIa.KU1xxkFEBxEUO', '27-7-2031', 'P8xKpqFgVXmlQH8TTmYU19slEcVppP1k0sp2PCzGLVTXlV2i0WufvzFdRWqkCo0giTzqhOccfovl5RnpJY6YetnUX0rGyCefLtp9', NULL, 'en', NULL, NULL, '2021-02-28 19:50:51', '2021-02-28 19:50:51'),
(16, 'kahraba', '0155101610', 'ahmedibrahim1310@icloud.com', NULL, 'male', 'single', '$2y$10$3zJzLT.0FcyvliLKNnsHxO74P76bSsUUDRoJKtqDzuXQrNbFdH5/O', '1-5-1998', 'aoNPbTPS2kuXtxkMEovvravOEGoDDkjHrOrK9HpmUxP9zpgjyMZR67B8VuDnvqGwGH25TdPHuJycKTKhj0LTinx7Vydp7h6bgGER', NULL, 'en', NULL, NULL, '2021-02-28 20:28:42', '2021-03-01 15:12:58');

-- --------------------------------------------------------

--
-- Table structure for table `consultants`
--

CREATE TABLE `consultants` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `image` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `phone` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `experince` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `lat` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `lng` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `map_link` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `rate` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT '0',
  `badges` longtext CHARACTER SET utf8mb4 COLLATE utf8mb4_bin DEFAULT NULL CHECK (json_valid(`badges`)),
  `cost` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `discount` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT '0',
  `comession` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT '0',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `consultants`
--

INSERT INTO `consultants` (`id`, `image`, `phone`, `experince`, `lat`, `lng`, `map_link`, `rate`, `badges`, `cost`, `discount`, `comession`, `created_at`, `updated_at`) VALUES
(1, 'YYtjkkshu7v1vqMtyNxF7R2d9GiMo5N5b2fB9uYq.jpg', '+1 (461) 239-7796', '5', '30.043358522243096', '31.226291681939692', 'https://g.page/TechnoMasr?share', '3.25', '[\"selected_badge\",\"recent_badge\",\"our_stars_badge\",\"certificated\"]', '500', '0', '0', '2021-02-21 07:28:04', '2021-02-28 09:49:36'),
(2, 'PZcp3UhHsVO7XDy3P7uJM7dWW6MhTBXWBDedL0wV.jpg', '01015960452', '5', '30.0444196', '31.2357116', NULL, '0', '[\"our_stars_badge\"]', '500', '10', '0', '2021-02-21 07:38:30', '2021-02-28 09:24:11'),
(3, 'Oez46obi264aj6n54tZKLv7eMIPjyoKmJjzZw02c.jpg', '+1 (415) 298-2743', '7', '31.040948299999997', '31.378470399999998', 'https://g.page/TechnoMasr?share', '0', '[\"recent_badge\",\"our_stars_badge\",\"certificated\"]', '20', '0', '2', '2021-02-28 09:08:55', '2021-02-28 09:08:55'),
(4, 'L8LXWvqS7hH3bX3ky21nEHWnKsxtOtYpQM9WvMBG.png', '+1 (355) 432-9647', '5', '31.023347293118196', '31.366714227786243', 'https://g.page/TechnoMasr?share', '0', '[\"selected_badge\",\"recent_badge\",\"our_stars_badge\"]', '500', '0', '2', '2021-03-06 13:25:28', '2021-03-06 13:25:28');

-- --------------------------------------------------------

--
-- Table structure for table `consultant_translations`
--

CREATE TABLE `consultant_translations` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `address` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `bio` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `locale` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `consultant_id` bigint(20) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `consultant_translations`
--

INSERT INTO `consultant_translations` (`id`, `name`, `address`, `bio`, `locale`, `consultant_id`, `created_at`, `updated_at`) VALUES
(1, 'تست', 'Placeat eveniet du', '<p>aaaaaaaaaaaaaaaaaaaaaaa</p>', 'ar', 1, '2021-02-21 07:28:04', '2021-02-21 07:28:04'),
(2, 'test', 'Facere commodo iure', '<p>aaaaaaaaaaaaaaaaaaaaaaaaaaa</p>', 'en', 1, '2021-02-21 07:28:04', '2021-02-21 07:28:04'),
(3, 'لماذا نحن هنا', 'Placeat eveniet du', '<p>aaaaaaaaaaaaaaaa</p>', 'ar', 2, '2021-02-21 07:38:30', '2021-02-21 07:38:30'),
(4, 'bla bla bla', 'Facere commodo iure', '<p>aaaaaaaaaaaaaaaa</p>', 'en', 2, '2021-02-21 07:38:30', '2021-02-21 07:38:30'),
(5, 'Sonya Donovan', 'Eaque voluptates sus', '<p>شسبشسب</p>', 'ar', 3, '2021-02-28 09:08:55', '2021-02-28 09:08:55'),
(6, 'Yoshi Maldonado', 'Placeat neque qui r', '<p>بسشبشسب</p>', 'en', 3, '2021-02-28 09:08:55', '2021-02-28 09:08:55'),
(7, 'جون', 'Placeat eveniet du', '<p>حجر ةرقه مقصحجر ةرقه مقصحجر ةرقه مقصحجر ةرقه مقص</p>', 'ar', 4, '2021-03-06 13:25:28', '2021-03-06 13:25:28'),
(8, 'jhon', 'Facere commodo iure', '<p>حجر ةرقه مقصحجر ةرقه مقصحجر ةرقه مقص</p>', 'en', 4, '2021-03-06 13:25:28', '2021-03-06 13:25:28');

-- --------------------------------------------------------

--
-- Table structure for table `courses`
--

CREATE TABLE `courses` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `instructor_id` bigint(20) UNSIGNED DEFAULT NULL,
  `category_id` bigint(20) UNSIGNED NOT NULL,
  `user_id` bigint(20) UNSIGNED NOT NULL,
  `image` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `type` enum('online','offline') COLLATE utf8mb4_unicode_ci NOT NULL,
  `active` tinyint(1) DEFAULT 0,
  `rate` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT '0',
  `price` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT '0',
  `discount` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT '0',
  `discount_message` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `courses`
--

INSERT INTO `courses` (`id`, `instructor_id`, `category_id`, `user_id`, `image`, `type`, `active`, `rate`, `price`, `discount`, `discount_message`, `created_at`, `updated_at`) VALUES
(2, 1, 1, 1, '2BXM0KO5lNYpwwiFd31eFcXeqF5kTc53h9rpMxho.jpg', 'offline', 0, '0', '550', '0', NULL, '2021-03-06 07:22:14', '2021-03-06 07:22:14'),
(3, 1, 1, 1, 'dvq9YVpZk429Ij0QaHZG9P1xOizJWsu5Ta68kGou.jpg', 'offline', 0, '0', '550', '0', NULL, '2021-03-06 07:23:01', '2021-03-06 07:23:01');

-- --------------------------------------------------------

--
-- Table structure for table `course_translations`
--

CREATE TABLE `course_translations` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `description` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `locale` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `course_id` bigint(20) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `course_translations`
--

INSERT INTO `course_translations` (`id`, `name`, `description`, `locale`, `course_id`, `created_at`, `updated_at`) VALUES
(3, 'كورس 11', '<p>بيو بيو بيو</p>', 'ar', 2, '2021-03-06 07:22:14', '2021-03-06 07:22:14'),
(4, 'course 1', '<p>لماذا نحن هناا ؟</p>', 'en', 2, '2021-03-06 07:22:14', '2021-03-06 07:22:14'),
(5, 'كورس 11', '<p>بيو بيو بيو</p>', 'ar', 3, '2021-03-06 07:23:01', '2021-03-06 07:23:01'),
(6, 'course 1', '<p>لماذا نحن هناا ؟</p>', 'en', 3, '2021-03-06 07:23:01', '2021-03-06 07:23:01');

-- --------------------------------------------------------

--
-- Table structure for table `events`
--

CREATE TABLE `events` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `instructor_id` bigint(20) UNSIGNED DEFAULT NULL,
  `user_id` bigint(20) UNSIGNED NOT NULL,
  `image` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `start_date` date NOT NULL,
  `start_time` time NOT NULL,
  `end_date` date NOT NULL,
  `end_time` time NOT NULL,
  `duration` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `video` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `type` enum('online','offline') COLLATE utf8mb4_unicode_ci NOT NULL,
  `price` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT '0',
  `discount` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT '0',
  `discount_message` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `events`
--

INSERT INTO `events` (`id`, `instructor_id`, `user_id`, `image`, `start_date`, `start_time`, `end_date`, `end_time`, `duration`, `video`, `type`, `price`, `discount`, `discount_message`, `created_at`, `updated_at`) VALUES
(1, 1, 1, 'naT3r3vLPTxoQ95UGf0eUoW4Dg1UPkbJsCQ4L4s1.jpg', '2013-09-07', '07:53:00', '2004-04-19', '06:03:00', 'Officia qui amet ad', 'Doloribus elit id r', 'offline', '477', '88', 'Ratione totam deseru', '2021-03-06 08:19:21', '2021-03-06 08:30:20'),
(2, 1, 1, 'hiUTNczlfnGayfpWlmy7sTVsu0aWsx8agMOkPpsi.jpg', '1988-05-27', '04:46:00', '2002-04-23', '08:25:00', 'Lorem assumenda volu', 'Error in eveniet ma', 'offline', '287', '11', 'Voluptas dolorem sed', '2021-03-06 08:19:40', '2021-03-06 08:19:40');

-- --------------------------------------------------------

--
-- Table structure for table `event_features`
--

CREATE TABLE `event_features` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `event_id` bigint(20) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `event_features`
--

INSERT INTO `event_features` (`id`, `event_id`, `created_at`, `updated_at`) VALUES
(1, 1, '2021-03-06 08:19:21', '2021-03-06 08:19:21'),
(3, 2, '2021-03-06 08:19:40', '2021-03-06 08:19:40'),
(4, 2, '2021-03-06 08:19:40', '2021-03-06 08:19:40');

-- --------------------------------------------------------

--
-- Table structure for table `event_feature_translations`
--

CREATE TABLE `event_feature_translations` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `description` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `locale` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `event_feature_id` bigint(20) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `event_feature_translations`
--

INSERT INTO `event_feature_translations` (`id`, `name`, `description`, `locale`, `event_feature_id`, `created_at`, `updated_at`) VALUES
(1, 'Ishmael Phelps', 'Distinctio Officia', 'ar', 1, '2021-03-06 08:19:21', '2021-03-06 08:19:21'),
(2, 'Elmo Vincent', 'Et corporis molestia', 'en', 1, '2021-03-06 08:19:21', '2021-03-06 08:19:21'),
(5, 'Zephania Shannon', 'In ipsum qui error d', 'ar', 3, '2021-03-06 08:19:40', '2021-03-06 08:19:40'),
(6, 'Samantha Robinson', 'Animi neque esse s', 'en', 3, '2021-03-06 08:19:40', '2021-03-06 08:19:40'),
(7, 'Xyla Blake', 'Esse quia id rem sit', 'ar', 4, '2021-03-06 08:19:40', '2021-03-06 08:19:40'),
(8, 'Paul Harris', 'Quod consectetur qui', 'en', 4, '2021-03-06 08:19:40', '2021-03-06 08:19:40');

-- --------------------------------------------------------

--
-- Table structure for table `event_translations`
--

CREATE TABLE `event_translations` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `locale` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `event_id` bigint(20) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `event_translations`
--

INSERT INTO `event_translations` (`id`, `name`, `locale`, `event_id`, `created_at`, `updated_at`) VALUES
(1, 'Jolie Peck', 'ar', 1, '2021-03-06 08:19:21', '2021-03-06 08:19:21'),
(2, 'Tobias Pierce', 'en', 1, '2021-03-06 08:19:21', '2021-03-06 08:19:21'),
(3, 'Charlotte Wyatt', 'ar', 2, '2021-03-06 08:19:40', '2021-03-06 08:19:40'),
(4, 'Xavier Gordon', 'en', 2, '2021-03-06 08:19:40', '2021-03-06 08:19:40');

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
-- Table structure for table `features`
--

CREATE TABLE `features` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `course_id` bigint(20) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `features`
--

INSERT INTO `features` (`id`, `course_id`, `created_at`, `updated_at`) VALUES
(1, 3, '2021-03-06 07:23:01', '2021-03-06 07:23:01'),
(2, 3, '2021-03-06 07:23:01', '2021-03-06 07:23:01');

-- --------------------------------------------------------

--
-- Table structure for table `feature_translations`
--

CREATE TABLE `feature_translations` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `description` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `locale` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `feature_id` bigint(20) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `feature_translations`
--

INSERT INTO `feature_translations` (`id`, `name`, `description`, `locale`, `feature_id`, `created_at`, `updated_at`) VALUES
(1, 'ميزه 1aaa', 'وصف الميزهaa', 'ar', 1, '2021-03-06 07:23:01', '2021-03-06 07:39:27'),
(2, 'feature 1aa', 'وصفه الميزةaa', 'en', 1, '2021-03-06 07:23:01', '2021-03-06 07:39:27'),
(3, 'ميزه 2', 'بلا بلا بلا بلا بلا بلا بلا بلا بلا بلا', 'ar', 2, '2021-03-06 07:23:01', '2021-03-06 07:23:01'),
(4, 'feature 2', 'bla bla bla bla bla bla bla bla', 'en', 2, '2021-03-06 07:23:01', '2021-03-06 07:23:01');

-- --------------------------------------------------------

--
-- Table structure for table `instructors`
--

CREATE TABLE `instructors` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `image` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `instructors`
--

INSERT INTO `instructors` (`id`, `image`, `created_at`, `updated_at`) VALUES
(1, 'Y6ECTATR5Rjc7oyjWXUeelpw8lCSbYp5EttRVWgT.jpg', '2021-03-06 06:25:51', '2021-03-06 06:35:41');

-- --------------------------------------------------------

--
-- Table structure for table `instructor_translations`
--

CREATE TABLE `instructor_translations` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `bio` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `locale` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `instructor_id` bigint(20) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `instructor_translations`
--

INSERT INTO `instructor_translations` (`id`, `name`, `bio`, `locale`, `instructor_id`, `created_at`, `updated_at`) VALUES
(1, 'تستaa', '<p>&nbsp;بايووووووووووووووو بايووووووووووووووو بايووووووووووووووو بايووووووووووووووو بايووووووووووووووو بايووووووووووووووو بايووووووووووووووو بايووووووووووووووو بايووووووووووووووو بايووووووووووووووو بايووووووووووووووو بايووووووووووووووو بايووووووووووووووو بايووووووووووووووو بايووووووووووووووو بايووووووووووووووو بايووووووووووووووو بايووووووووووووووو بايووووووووووووووو بايووووووووووووووو بايووووووووووووووو بايووووووووووووووو بايووووووووووووووو بايووووووووووووووو بايووووووووووووووو بايووووووووووووووو بايووووووووووووووو بايووووووووووووووو بايووووووووووووووو بايووووووووووووووو بايووووووووووووووو بايووووووووووووووو بايووووووووووووووو بايووووووووووووووو بايووووووووووووووو بايووووووووووووووو بايووووووووووووووو بايووووووووووووووو بايووووووووووووووو بايووووووووووووووو بايووووووووووووووو بايووووووووووووووو بايووووووووووووووو بايووووووووووووووو بايووووووووووووووو بايووووووووووووووو بايووووووووووووووو بايووووووووووووووو بايوووووووووووووووaaaaaa</p>', 'ar', 1, '2021-03-06 06:25:51', '2021-03-06 06:35:41'),
(2, 'testaa', '<p>bio&nbsp;bio&nbsp;bio&nbsp;bio&nbsp;bio&nbsp;bio&nbsp;bio&nbsp;bio&nbsp;bio&nbsp;bio&nbsp;bio&nbsp;bio&nbsp;bio&nbsp;bio&nbsp;bio&nbsp;bio&nbsp;bio&nbsp;bio&nbsp;bio&nbsp;bio&nbsp;bio&nbsp;bio&nbsp;bio&nbsp;bio&nbsp;bio&nbsp;bio&nbsp;bio&nbsp;bio&nbsp;bio&nbsp;bio&nbsp;bio&nbsp;bio&nbsp;bio&nbsp;bio&nbsp;bio&nbsp;bio&nbsp;bio&nbsp;bio&nbsp;bio&nbsp;bio&nbsp;bio&nbsp;bio&nbsp;bio&nbsp;bio&nbsp;bio&nbsp;bio&nbsp;bio&nbsp;bio&nbsp;bio&nbsp;bio&nbsp;bio&nbsp;bio&nbsp;bio&nbsp;bio&nbsp;bio&nbsp;bio&nbsp;bio&nbsp;bio&nbsp;bio&nbsp;bio&nbsp;bio&nbsp;bio&nbsp;bio&nbsp;bio&nbsp;bio&nbsp;bio&nbsp;bio&nbsp;bio&nbsp;bio&nbsp;bio&nbsp;bio&nbsp;bio&nbsp;bio&nbsp;bio&nbsp;bio&nbsp;bio&nbsp;bio&nbsp;bio&nbsp;bio&nbsp;bio&nbsp;bio&nbsp;bio&nbsp;bio&nbsp;bio&nbsp;bio&nbsp;bio&nbsp;bio&nbsp;bio&nbsp;bio&nbsp;bio&nbsp;bio&nbsp;bio&nbsp;bio&nbsp;bio&nbsp;bio&nbsp;bio&nbsp;bio&nbsp;bio&nbsp;bio&nbsp;bio&nbsp;bio&nbsp;bio&nbsp;bio&nbsp;bio&nbsp;bio&nbsp;bio&nbsp;bio&nbsp;bio&nbsp;bio&nbsp;bio&nbsp;bio&nbsp;bio&nbsp;bio&nbsp;bio&nbsp;bio&nbsp;bio&nbsp;bio&nbsp;bio&nbsp;bio aaaaaaa</p>', 'en', 1, '2021-03-06 06:25:51', '2021-03-06 06:35:41');

-- --------------------------------------------------------

--
-- Table structure for table `lessons`
--

CREATE TABLE `lessons` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `url` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `duration` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT '00:00:00',
  `status` enum('visitors','enrollers') COLLATE utf8mb4_unicode_ci NOT NULL,
  `course_id` bigint(20) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `lessons`
--

INSERT INTO `lessons` (`id`, `url`, `duration`, `status`, `course_id`, `created_at`, `updated_at`) VALUES
(1, 'https://www.youtube.com/watch?v=ob61a_pcKv0', '21:58:45', 'visitors', 3, '2021-03-06 08:57:20', '2021-03-06 09:03:36');

-- --------------------------------------------------------

--
-- Table structure for table `lesson_translations`
--

CREATE TABLE `lesson_translations` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `locale` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `lesson_id` bigint(20) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `lesson_translations`
--

INSERT INTO `lesson_translations` (`id`, `name`, `locale`, `lesson_id`, `created_at`, `updated_at`) VALUES
(1, 'تستaaa', 'ar', 1, '2021-03-06 08:57:20', '2021-03-06 09:03:36'),
(2, 'testaa', 'en', 1, '2021-03-06 08:57:20', '2021-03-06 09:03:36');

-- --------------------------------------------------------

--
-- Table structure for table `messages`
--

CREATE TABLE `messages` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `message` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `messages`
--

INSERT INTO `messages` (`id`, `name`, `email`, `message`, `created_at`, `updated_at`) VALUES
(2, 'tes', 'rr@rr.com', 'bla bla bla bla bla bla bla bla bla bla bla bla bla bla bla bla bla bla bla bla bla bla bla bla bla bla bla bla bla bla bla bla bla bla bla bla', '2021-02-28 10:32:07', '2021-02-28 10:32:07'),
(3, 'ahmed', 'a@a com', 'ahsadfff', '2021-02-28 19:54:30', '2021-02-28 19:54:30');

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
(4, '2021_02_10_132409_create_projects_table', 2),
(5, '2021_02_10_132429_create_project_translations_table', 2),
(10, '2021_02_13_103352_create_videos_table', 3),
(11, '2021_02_13_104220_create_video_translations_table', 3),
(12, '2021_02_13_112821_create_investigations_table', 3),
(13, '2021_02_13_112840_create_investigation_translations_table', 3),
(14, '2021_02_13_120755_create_articles_table', 4),
(15, '2021_02_13_120810_create_article_translations_table', 4),
(22, '2021_02_14_131843_create_products_table', 5),
(23, '2021_02_14_132619_create_product_translations_table', 5),
(24, '2021_02_14_141350_create_heighlights_table', 5),
(25, '2021_02_14_141402_create_heighlight_translations_table', 5),
(26, '2021_02_14_141442_create_integrations_table', 5),
(27, '2021_02_14_141451_create_integration_translations_table', 5),
(28, '2021_02_15_084142_create_settings_table', 6),
(29, '2021_02_15_084253_create_setting_translations_table', 6),
(32, '2021_02_15_124506_create_company_heighlights_table', 7),
(33, '2021_02_15_124735_create_company_heighlight_translations_table', 7),
(34, '2021_02_15_150721_create_sliders_table', 8),
(38, '2021_02_18_115648_create_gallaries_table', 9),
(39, '2021_02_18_115845_create_gallary_translations_table', 9),
(40, '2021_02_18_115957_create_images_table', 9),
(41, '2021_02_18_134516_create_messages_table', 10),
(48, '2021_02_20_143721_create_consultantants_table', 11),
(49, '2021_02_20_145903_create_consultantant_translations_table', 11),
(52, '2021_02_21_085943_create_consultants_table', 12),
(53, '2021_02_21_090051_create_consultant_translations_table', 12),
(54, '2021_02_21_093200_create_availables_table', 13),
(56, '2021_02_21_102104_create_clients_table', 14),
(59, '2021_02_24_091043_create_visits_table', 15),
(62, '2021_02_25_090111_create_rates_table', 16),
(63, '2021_02_25_094702_create_requests_table', 17),
(64, '2021_02_28_122008_create_messages_table', 18),
(65, '2021_03_06_081141_create_instructors_table', 19),
(66, '2021_03_06_081304_create_instructor_translations_table', 19),
(71, '2021_03_06_084853_create_categories_table', 20),
(72, '2021_03_06_084903_create_category_translations_table', 20),
(73, '2021_03_06_084905_create_courses_table', 20),
(74, '2021_03_06_084906_create_course_translations_table', 20),
(75, '2021_03_06_085803_create_features_table', 20),
(76, '2021_03_06_085815_create_feature_translations_table', 20),
(81, '2021_03_06_094629_create_events_table', 21),
(82, '2021_03_06_094643_create_event_translations_table', 21),
(83, '2021_03_06_094655_create_event_features_table', 21),
(84, '2021_03_06_094705_create_event_feature_translations_table', 21),
(85, '2021_03_06_103507_create_lessons_table', 22),
(86, '2021_03_06_103526_create_lesson_translations_table', 22);

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
-- Table structure for table `rates`
--

CREATE TABLE `rates` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `rate` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT '0',
  `comment` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `answer` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `client_id` bigint(20) UNSIGNED NOT NULL,
  `setting_id` bigint(20) UNSIGNED NOT NULL,
  `rateable_type` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `rateable_id` bigint(20) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `rates`
--

INSERT INTO `rates` (`id`, `rate`, `comment`, `answer`, `client_id`, `setting_id`, `rateable_type`, `rateable_id`, `created_at`, `updated_at`) VALUES
(1, '3', 'بلا بلا بلا', 'لماذا نحن هناااااااااااااااااااااا', 2, 27, 'App\\Consultant', 1, '2021-02-25 07:33:16', '2021-02-25 07:33:16'),
(2, '3.5', 'بلا بلا بلا', 'لماذا نحن هناااااااااااااااااااااا', 2, 27, 'App\\Consultant', 1, '2021-02-25 07:37:03', '2021-02-25 07:37:03');

-- --------------------------------------------------------

--
-- Table structure for table `requests`
--

CREATE TABLE `requests` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `phone` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `address` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `bio` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `requests`
--

INSERT INTO `requests` (`id`, `name`, `email`, `phone`, `address`, `bio`, `created_at`, `updated_at`) VALUES
(1, 'Tst', 'aa@aa.com', '654684756418', 'شارع المطااافيي', 'بلا بلا بلا بلا بلا بلا بلا بلا بلا بلا بلا بلا بلا بلا بلا بلا بلا بلا بلا بلا بلا بلا بلا بلا بلا بلا بلا بلا بلا بلا بلا بلا بلا بلا بلا بلا بلا بلا بلا بلا بلا بلا بلا بلا بلا بلا بلا بلا بلا بلا', '2021-02-25 07:54:52', '2021-02-25 07:54:52'),
(2, 'Tst', 'aa@aa.com', '654684756418a', 'شارع المطااافيي', 'بلا بلا بلا بلا بلا بلا بلا بلا بلا بلا بلا بلا بلا بلا بلا بلا بلا بلا بلا بلا بلا بلا بلا بلا بلا بلا بلا بلا بلا بلا بلا بلا بلا بلا بلا بلا بلا بلا بلا بلا بلا بلا بلا بلا بلا بلا بلا بلا بلا بلا', '2021-02-25 07:55:21', '2021-02-25 07:55:21'),
(3, 'Tst', 'aa@aa.com', '654684756418a', 'شارع المطااافيي', 'بلا بلا بلا بلا بلا بلا بلا بلا بلا بلا بلا بلا بلا بلا بلا بلا بلا بلا بلا بلا بلا بلا بلا بلا بلا بلا بلا بلا بلا بلا بلا بلا بلا بلا بلا بلا بلا بلا بلا بلا بلا بلا بلا بلا بلا بلا بلا بلا بلا بلا', '2021-02-25 07:55:33', '2021-02-25 07:55:33'),
(4, 'Tst', 'aa@aaa.com', '6546842', 'شارع المطااافيي', 'بلا بلا بلا بلا بلا بلا بلا بلا بلا بلا بلا بلا بلا بلا بلا بلا بلا بلا بلا بلا بلا بلا بلا بلا بلا بلا بلا بلا بلا بلا بلا بلا بلا بلا بلا بلا بلا بلا بلا بلا بلا بلا بلا بلا بلا بلا بلا بلا بلا بلا', '2021-02-25 07:56:08', '2021-02-25 07:56:08');

-- --------------------------------------------------------

--
-- Table structure for table `settings`
--

CREATE TABLE `settings` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `key` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `class` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `one_value` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `type` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `parent_id` bigint(20) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `settings`
--

INSERT INTO `settings` (`id`, `key`, `class`, `one_value`, `type`, `parent_id`, `created_at`, `updated_at`) VALUES
(27, 'rate_question', 'api', NULL, 'text', NULL, NULL, NULL),
(28, 'about', 'api', NULL, 'text', NULL, '2021-02-28 12:55:56', '2021-02-28 12:55:56'),
(29, 'about_image', 'about', 'XeU6diM8FJlkofCGK3q7CZq7LHJI4kaGHW2ODnXl.jpg', 'image', NULL, NULL, '2021-02-28 19:34:20');

-- --------------------------------------------------------

--
-- Table structure for table `setting_translations`
--

CREATE TABLE `setting_translations` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `value` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `locale` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `setting_id` bigint(20) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `setting_translations`
--

INSERT INTO `setting_translations` (`id`, `value`, `locale`, `setting_id`, `created_at`, `updated_at`) VALUES
(9, 'لماذا نحن هنااا ؟', 'ar', 27, '2021-02-25 09:31:21', '2021-02-25 09:31:21'),
(10, 'why we r here ?', 'en', 27, '2021-02-25 09:31:21', '2021-02-25 09:31:21'),
(11, '<p><br>لوريم إيبسوم(Lorem Ipsum) هو ببساطة نص شكلي (بمعنى أن الغاية هي الشكل وليس المحتوى) ويُستخدم في صناعات المطابع ودور النشر. كان لوريم إيبسوم ولايزال المعيار للنص الشكلي منذ القرن الخامس عشر عندما قامت مطبعة مجهولة برص مجموعة من الأحرف بشكل عشوائي أخذتها من نص، لتكوّن كتيّب بمثابة دليل أو مرجع شكلي لهذه الأحرف. خمسة قرون من الزمن لم تقضي على هذا النص، بل انه حتى صار مستخدماً وبشكله الأصلي في الطباعة والتنضيد الإلكتروني. انتشر بشكل كبير في ستينيّات هذا القرن مع إصدار رقائق \"ليتراسيت\" (Letraset) البلاستيكية تحوي مقاطع من هذا النص، وعاد لينتشر مرة أخرى مؤخراَ مع ظهور برامج النشر الإلكتروني مثل \"ألدوس بايج مايكر\" (Aldus PageMaker) والتي حوت أيضاً على نسخ من نص لوريم إيبسوم.</p>', 'ar', 28, '2021-02-28 10:59:39', '2021-02-28 10:59:39'),
(12, '<p><strong>Lorem Ipsum</strong> is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry\'s standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged. It was popularised in the 1960s with the release of Letraset sheets containing Lorem Ipsum passages, and more recently with desktop publishing software like Aldus PageMaker including versions of Lorem Ipsum</p>', 'en', 28, '2021-02-28 10:59:39', '2021-02-28 10:59:39');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email_verified_at` timestamp NULL DEFAULT NULL,
  `password` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `remember_token` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `name`, `email`, `email_verified_at`, `password`, `remember_token`, `created_at`, `updated_at`) VALUES
(1, 'Mohamed Eid', 'test@test.com', NULL, '$2y$10$wl0hNfdjDHaPzg04cxTfwOqB09avt1JWZIin29ryLKazGZFS5eXp.', NULL, '2021-02-10 07:54:35', '2021-02-10 07:54:35'),
(2, 'Technomasr', 'test@technomasr.com', NULL, '$2y$10$IRP0IbGWz.Ge0P7D.Mw7EeqJRgtulB8ju99g6O4utXdy/F1D0PRBe', NULL, '2021-02-10 10:15:33', '2021-02-23 14:05:37'),
(4, 'Cally Manning', 'texo@mailinator.com', NULL, '$2y$10$..vhK.SLsF/d1Y/XwUCRbuOrfgyM8PgSKrjG/QeZ8VVwm/L.M1hXO', NULL, '2021-02-22 18:00:43', '2021-02-22 18:00:43');

-- --------------------------------------------------------

--
-- Table structure for table `visits`
--

CREATE TABLE `visits` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `consultant_id` bigint(20) UNSIGNED NOT NULL,
  `client_id` bigint(20) UNSIGNED NOT NULL,
  `available_id` bigint(20) UNSIGNED NOT NULL,
  `payment_method` enum('cash','credit') COLLATE utf8mb4_unicode_ci DEFAULT 'cash',
  `status` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `visits`
--

INSERT INTO `visits` (`id`, `consultant_id`, `client_id`, `available_id`, `payment_method`, `status`, `created_at`, `updated_at`) VALUES
(3, 2, 2, 1, 'cash', NULL, '2021-02-25 06:21:44', '2021-02-25 06:21:44'),
(4, 2, 2, 1, 'cash', NULL, '2021-02-25 06:23:16', '2021-02-25 06:23:16'),
(5, 2, 2, 1, 'cash', NULL, '2021-02-25 06:40:11', '2021-02-25 06:40:11'),
(7, 2, 2, 1, 'cash', NULL, '2021-02-25 06:40:26', '2021-02-25 06:40:26'),
(8, 1, 2, 1, 'cash', NULL, '2021-02-25 06:40:30', '2021-02-25 06:40:30'),
(9, 2, 2, 1, 'cash', NULL, '2021-02-25 06:40:35', '2021-02-25 06:40:35');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `availables`
--
ALTER TABLE `availables`
  ADD PRIMARY KEY (`id`),
  ADD KEY `availables_consultant_id_foreign` (`consultant_id`);

--
-- Indexes for table `categories`
--
ALTER TABLE `categories`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `category_translations`
--
ALTER TABLE `category_translations`
  ADD PRIMARY KEY (`id`),
  ADD KEY `category_translations_category_id_foreign` (`category_id`),
  ADD KEY `category_translations_locale_index` (`locale`);

--
-- Indexes for table `clients`
--
ALTER TABLE `clients`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `consultants`
--
ALTER TABLE `consultants`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `consultant_translations`
--
ALTER TABLE `consultant_translations`
  ADD PRIMARY KEY (`id`),
  ADD KEY `consultant_translations_consultant_id_foreign` (`consultant_id`),
  ADD KEY `consultant_translations_locale_index` (`locale`);

--
-- Indexes for table `courses`
--
ALTER TABLE `courses`
  ADD PRIMARY KEY (`id`),
  ADD KEY `courses_instructor_id_foreign` (`instructor_id`),
  ADD KEY `courses_category_id_foreign` (`category_id`),
  ADD KEY `courses_user_id_foreign` (`user_id`);

--
-- Indexes for table `course_translations`
--
ALTER TABLE `course_translations`
  ADD PRIMARY KEY (`id`),
  ADD KEY `course_translations_course_id_foreign` (`course_id`),
  ADD KEY `course_translations_locale_index` (`locale`);

--
-- Indexes for table `events`
--
ALTER TABLE `events`
  ADD PRIMARY KEY (`id`),
  ADD KEY `events_instructor_id_foreign` (`instructor_id`),
  ADD KEY `events_user_id_foreign` (`user_id`);

--
-- Indexes for table `event_features`
--
ALTER TABLE `event_features`
  ADD PRIMARY KEY (`id`),
  ADD KEY `event_features_event_id_foreign` (`event_id`);

--
-- Indexes for table `event_feature_translations`
--
ALTER TABLE `event_feature_translations`
  ADD PRIMARY KEY (`id`),
  ADD KEY `event_feature_translations_event_feature_id_foreign` (`event_feature_id`),
  ADD KEY `event_feature_translations_locale_index` (`locale`);

--
-- Indexes for table `event_translations`
--
ALTER TABLE `event_translations`
  ADD PRIMARY KEY (`id`),
  ADD KEY `event_translations_event_id_foreign` (`event_id`),
  ADD KEY `event_translations_locale_index` (`locale`);

--
-- Indexes for table `failed_jobs`
--
ALTER TABLE `failed_jobs`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `features`
--
ALTER TABLE `features`
  ADD PRIMARY KEY (`id`),
  ADD KEY `features_course_id_foreign` (`course_id`);

--
-- Indexes for table `feature_translations`
--
ALTER TABLE `feature_translations`
  ADD PRIMARY KEY (`id`),
  ADD KEY `feature_translations_feature_id_foreign` (`feature_id`),
  ADD KEY `feature_translations_locale_index` (`locale`);

--
-- Indexes for table `instructors`
--
ALTER TABLE `instructors`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `instructor_translations`
--
ALTER TABLE `instructor_translations`
  ADD PRIMARY KEY (`id`),
  ADD KEY `instructor_translations_instructor_id_foreign` (`instructor_id`),
  ADD KEY `instructor_translations_locale_index` (`locale`);

--
-- Indexes for table `lessons`
--
ALTER TABLE `lessons`
  ADD PRIMARY KEY (`id`),
  ADD KEY `lessons_course_id_foreign` (`course_id`);

--
-- Indexes for table `lesson_translations`
--
ALTER TABLE `lesson_translations`
  ADD PRIMARY KEY (`id`),
  ADD KEY `lesson_translations_lesson_id_foreign` (`lesson_id`),
  ADD KEY `lesson_translations_locale_index` (`locale`);

--
-- Indexes for table `messages`
--
ALTER TABLE `messages`
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
-- Indexes for table `rates`
--
ALTER TABLE `rates`
  ADD PRIMARY KEY (`id`),
  ADD KEY `rates_client_id_foreign` (`client_id`),
  ADD KEY `rates_setting_id_foreign` (`setting_id`),
  ADD KEY `rates_rateable_type_rateable_id_index` (`rateable_type`,`rateable_id`);

--
-- Indexes for table `requests`
--
ALTER TABLE `requests`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `settings`
--
ALTER TABLE `settings`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `setting_translations`
--
ALTER TABLE `setting_translations`
  ADD PRIMARY KEY (`id`),
  ADD KEY `setting_translations_setting_id_foreign` (`setting_id`),
  ADD KEY `setting_translations_locale_index` (`locale`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `users_email_unique` (`email`);

--
-- Indexes for table `visits`
--
ALTER TABLE `visits`
  ADD PRIMARY KEY (`id`),
  ADD KEY `visits_consultant_id_foreign` (`consultant_id`),
  ADD KEY `visits_client_id_foreign` (`client_id`),
  ADD KEY `visits_available_id_foreign` (`available_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `availables`
--
ALTER TABLE `availables`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=21;

--
-- AUTO_INCREMENT for table `categories`
--
ALTER TABLE `categories`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `category_translations`
--
ALTER TABLE `category_translations`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `clients`
--
ALTER TABLE `clients`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=17;

--
-- AUTO_INCREMENT for table `consultants`
--
ALTER TABLE `consultants`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `consultant_translations`
--
ALTER TABLE `consultant_translations`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `courses`
--
ALTER TABLE `courses`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `course_translations`
--
ALTER TABLE `course_translations`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `events`
--
ALTER TABLE `events`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `event_features`
--
ALTER TABLE `event_features`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `event_feature_translations`
--
ALTER TABLE `event_feature_translations`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `event_translations`
--
ALTER TABLE `event_translations`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `failed_jobs`
--
ALTER TABLE `failed_jobs`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `features`
--
ALTER TABLE `features`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `feature_translations`
--
ALTER TABLE `feature_translations`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `instructors`
--
ALTER TABLE `instructors`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `instructor_translations`
--
ALTER TABLE `instructor_translations`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `lessons`
--
ALTER TABLE `lessons`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `lesson_translations`
--
ALTER TABLE `lesson_translations`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `messages`
--
ALTER TABLE `messages`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=87;

--
-- AUTO_INCREMENT for table `rates`
--
ALTER TABLE `rates`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `requests`
--
ALTER TABLE `requests`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `settings`
--
ALTER TABLE `settings`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=30;

--
-- AUTO_INCREMENT for table `setting_translations`
--
ALTER TABLE `setting_translations`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `visits`
--
ALTER TABLE `visits`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `availables`
--
ALTER TABLE `availables`
  ADD CONSTRAINT `availables_consultant_id_foreign` FOREIGN KEY (`consultant_id`) REFERENCES `consultants` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `category_translations`
--
ALTER TABLE `category_translations`
  ADD CONSTRAINT `category_translations_category_id_foreign` FOREIGN KEY (`category_id`) REFERENCES `categories` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `consultant_translations`
--
ALTER TABLE `consultant_translations`
  ADD CONSTRAINT `consultant_translations_consultant_id_foreign` FOREIGN KEY (`consultant_id`) REFERENCES `consultants` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `courses`
--
ALTER TABLE `courses`
  ADD CONSTRAINT `courses_category_id_foreign` FOREIGN KEY (`category_id`) REFERENCES `categories` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `courses_instructor_id_foreign` FOREIGN KEY (`instructor_id`) REFERENCES `instructors` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `courses_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `course_translations`
--
ALTER TABLE `course_translations`
  ADD CONSTRAINT `course_translations_course_id_foreign` FOREIGN KEY (`course_id`) REFERENCES `courses` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `events`
--
ALTER TABLE `events`
  ADD CONSTRAINT `events_instructor_id_foreign` FOREIGN KEY (`instructor_id`) REFERENCES `instructors` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `events_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `event_features`
--
ALTER TABLE `event_features`
  ADD CONSTRAINT `event_features_event_id_foreign` FOREIGN KEY (`event_id`) REFERENCES `events` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `event_feature_translations`
--
ALTER TABLE `event_feature_translations`
  ADD CONSTRAINT `event_feature_translations_event_feature_id_foreign` FOREIGN KEY (`event_feature_id`) REFERENCES `event_features` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `event_translations`
--
ALTER TABLE `event_translations`
  ADD CONSTRAINT `event_translations_event_id_foreign` FOREIGN KEY (`event_id`) REFERENCES `events` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `features`
--
ALTER TABLE `features`
  ADD CONSTRAINT `features_course_id_foreign` FOREIGN KEY (`course_id`) REFERENCES `courses` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `feature_translations`
--
ALTER TABLE `feature_translations`
  ADD CONSTRAINT `feature_translations_feature_id_foreign` FOREIGN KEY (`feature_id`) REFERENCES `features` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `instructor_translations`
--
ALTER TABLE `instructor_translations`
  ADD CONSTRAINT `instructor_translations_instructor_id_foreign` FOREIGN KEY (`instructor_id`) REFERENCES `instructors` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `lessons`
--
ALTER TABLE `lessons`
  ADD CONSTRAINT `lessons_course_id_foreign` FOREIGN KEY (`course_id`) REFERENCES `courses` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `lesson_translations`
--
ALTER TABLE `lesson_translations`
  ADD CONSTRAINT `lesson_translations_lesson_id_foreign` FOREIGN KEY (`lesson_id`) REFERENCES `lessons` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `rates`
--
ALTER TABLE `rates`
  ADD CONSTRAINT `rates_client_id_foreign` FOREIGN KEY (`client_id`) REFERENCES `clients` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `rates_setting_id_foreign` FOREIGN KEY (`setting_id`) REFERENCES `settings` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `setting_translations`
--
ALTER TABLE `setting_translations`
  ADD CONSTRAINT `setting_translations_setting_id_foreign` FOREIGN KEY (`setting_id`) REFERENCES `settings` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `visits`
--
ALTER TABLE `visits`
  ADD CONSTRAINT `visits_available_id_foreign` FOREIGN KEY (`available_id`) REFERENCES `availables` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `visits_client_id_foreign` FOREIGN KEY (`client_id`) REFERENCES `clients` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `visits_consultant_id_foreign` FOREIGN KEY (`consultant_id`) REFERENCES `consultants` (`id`) ON DELETE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
