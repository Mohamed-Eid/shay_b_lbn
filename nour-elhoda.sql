-- phpMyAdmin SQL Dump
-- version 5.0.4
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Feb 18, 2021 at 04:02 PM
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
-- Database: `nour-elhoda`
--

-- --------------------------------------------------------

--
-- Table structure for table `articles`
--

CREATE TABLE `articles` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `header` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `image` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `articles`
--

INSERT INTO `articles` (`id`, `header`, `image`, `created_at`, `updated_at`) VALUES
(3, 'VQCiZQ1ZY7qniv1lgLWdInaiG8gkpSYMvCvtLiU4.jpg', 'aM6RfCSfkpmWaRtb1Arc9Fv0GTFesPzoczlEFN2R.jpg', '2021-02-14 11:02:04', '2021-02-14 11:02:04'),
(4, 'CscJCVAoE0YHnfZDZ2xIy1y8CoTjDgyXlMe6wMe8.jpg', 'ZZgmZemLnrsFJwZPAJlfrIBK8OHkzbYThoMn1xvw.jpg', '2021-02-18 07:54:31', '2021-02-18 07:54:31'),
(5, '7QDVMRiGO6IWqIVaePkfEWju8oXBqqUWimE4RO0c.jpg', 'Wt2TQwyhiRRNoQchNdffLY4JsD5ENX2v8iCBF2bi.jpg', '2021-02-18 07:54:33', '2021-02-18 07:54:33');

-- --------------------------------------------------------

--
-- Table structure for table `article_translations`
--

CREATE TABLE `article_translations` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `description` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `locale` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `article_id` bigint(20) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `article_translations`
--

INSERT INTO `article_translations` (`id`, `name`, `description`, `locale`, `article_id`, `created_at`, `updated_at`) VALUES
(5, 'Janna Leon', '<p><br>لوريم إيبسوم(Lorem Ipsum) هو ببساطة نص شكلي (بمعنى أن الغاية هي الشكل وليس المحتوى) ويُستخدم في صناعات المطابع ودور النشر. كان لوريم إيبسوم ولايزال المعيار للنص الشكلي منذ القرن الخامس عشر عندما قامت مطبعة مجهولة برص مجموعة من الأحرف بشكل عشوائي أخذتها من نص، لتكوّن كتيّب بمثابة دليل أو مرجع شكلي لهذه الأحرف. خمسة قرون من الزمن لم تقضي على هذا النص، بل انه حتى صار مستخدماً وبشكله الأصلي في الطباعة والتنضيد الإلكتروني. انتشر بشكل كبير في ستينيّات هذا القرن مع إصدار رقائق \"ليتراسيت\" (Letraset) البلاستيكية تحوي مقاطع من هذا النص، وعاد لينتشر مرة أخرى مؤخراَ مع ظهور برامج النشر الإلكتروني مثل \"ألدوس بايج مايكر\" (Aldus PageMaker) والتي حوت أيضاً على نسخ من نص لوريم إيبسوم.</p>', 'ar', 3, '2021-02-14 11:02:04', '2021-02-16 10:59:47'),
(6, 'Wylie Mosley', '<p><strong>Lorem Ipsum</strong> is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry\'s standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged. It was popularised in the 1960s with the release of Letraset sheets containing Lorem Ipsum passages, and more recently with desktop publishing software like Aldus PageMaker including versions of Lorem Ipsum.</p>', 'en', 3, '2021-02-14 11:02:04', '2021-02-16 10:59:47'),
(7, 'تستشش', '<p>لوريم إيبسوم(Lorem Ipsum) هو ببساطة نص شكلي (بمعنى أن الغاية هي الشكل وليس المحتوى) ويُستخدم في صناعات المطابع ودور النشر. كان لوريم إيبسوم ولايزال المعيار للنص الشكلي منذ القرن الخامس عشر عندما قامت مطبعة مجهولة برص مجموعة من الأحرف بشكل عشوائي أخذتها من نص، لتكوّن كتيّب بمثابة دليل أو مرجع شكلي لهذه الأحرف. خمسة قرون من الزمن لم تقضي على هذا النص، بل انه حتى صار مستخدماً وبشكله الأصلي في الطباعة والتنضيد الإلكتروني. انتشر بشكل كبير في ستينيّات هذا القرن مع إصدار رقائق \"ليتراسيت\" (Letraset) البلاستيكية تحوي مقاطع من هذا النص، وعاد لينتشر مرة أخرى مؤخراَ مع ظهور برامج النشر الإلكتروني مثل \"ألدوس بايج مايكر\" (Aldus PageMaker) والتي حوت أيضاً على نسخ من نص لوريم إيبسوم.</p>', 'ar', 4, '2021-02-18 07:54:31', '2021-02-18 07:54:31'),
(8, 'testشش', '<p><strong>Lorem Ipsum</strong> is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry\'s standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged. It was popularised in the 1960s with the release of Letraset sheets containing Lorem Ipsum passages, and more recently with desktop publishing software like Aldus PageMaker including versions of Lorem Ipsum.</p>', 'en', 4, '2021-02-18 07:54:31', '2021-02-18 07:54:31'),
(9, 'تست', '<p>لوريم إيبسوم(Lorem Ipsum) هو ببساطة نص شكلي (بمعنى أن الغاية هي الشكل وليس المحتوى) ويُستخدم في صناعات المطابع ودور النشر. كان لوريم إيبسوم ولايزال المعيار للنص الشكلي منذ القرن الخامس عشر عندما قامت مطبعة مجهولة برص مجموعة من الأحرف بشكل عشوائي أخذتها من نص، لتكوّن كتيّب بمثابة دليل أو مرجع شكلي لهذه الأحرف. خمسة قرون من الزمن لم تقضي على هذا النص، بل انه حتى صار مستخدماً وبشكله الأصلي في الطباعة والتنضيد الإلكتروني. انتشر بشكل كبير في ستينيّات هذا القرن مع إصدار رقائق \"ليتراسيت\" (Letraset) البلاستيكية تحوي مقاطع من هذا النص، وعاد لينتشر مرة أخرى مؤخراَ مع ظهور برامج النشر الإلكتروني مثل \"ألدوس بايج مايكر\" (Aldus PageMaker) والتي حوت أيضاً على نسخ من نص لوريم إيبسوم.</p>', 'ar', 5, '2021-02-18 07:54:33', '2021-02-18 07:54:33'),
(10, 'Sierra Hall', '<p><strong>Lorem Ipsum</strong> is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry\'s standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged. It was popularised in the 1960s with the release of Letraset sheets containing Lorem Ipsum passages, and more recently with desktop publishing software like Aldus PageMaker including versions of Lorem Ipsum.</p>', 'en', 5, '2021-02-18 07:54:33', '2021-02-18 07:54:33');

-- --------------------------------------------------------

--
-- Table structure for table `company_heighlights`
--

CREATE TABLE `company_heighlights` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `image` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `type` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `company_heighlights`
--

INSERT INTO `company_heighlights` (`id`, `image`, `type`, `created_at`, `updated_at`) VALUES
(2, 'ZPnF5ZQITRvVKOJLzrGTEUBbKHi6gDEDBKlq68x7.png', NULL, '2021-02-15 12:55:11', '2021-02-15 12:55:11'),
(4, 'yqdIxTudYrREk6C9a4R6XjVKQUffgdhePgCMewRJ.png', NULL, '2021-02-15 12:58:19', '2021-02-15 12:58:19'),
(5, 'PThKNVISAmjGYRm42ejaipG0GLKBbMGTG1nkiTY5.png', 'home', '2021-02-15 12:59:09', '2021-02-15 12:59:09'),
(6, 'aM27FuDBhTra0bwKFodmZx7JmSGD22B4dj8rX8Yu.png', 'home', '2021-02-16 06:46:17', '2021-02-16 06:46:17');

-- --------------------------------------------------------

--
-- Table structure for table `company_heighlight_translations`
--

CREATE TABLE `company_heighlight_translations` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `locale` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `company_heighlight_id` bigint(20) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `company_heighlight_translations`
--

INSERT INTO `company_heighlight_translations` (`id`, `name`, `locale`, `company_heighlight_id`, `created_at`, `updated_at`) VALUES
(3, 'تست 2', 'ar', 2, '2021-02-15 12:55:11', '2021-02-15 12:55:11'),
(4, 'test 12', 'en', 2, '2021-02-15 12:55:11', '2021-02-15 12:55:11'),
(7, 'aas', 'ar', 4, '2021-02-15 12:58:19', '2021-02-15 12:58:19'),
(8, 'asf', 'en', 4, '2021-02-15 12:58:19', '2021-02-15 12:58:19'),
(9, 'a456aaaaaaaaaaaaaaa', 'ar', 5, '2021-02-15 12:59:09', '2021-02-16 06:46:07'),
(10, 'aaaa46aaaaaaaaaaaaa', 'en', 5, '2021-02-15 12:59:09', '2021-02-16 06:46:07'),
(11, '444', 'ar', 6, '2021-02-16 06:46:17', '2021-02-16 06:46:17'),
(12, '444', 'en', 6, '2021-02-16 06:46:17', '2021-02-16 06:46:17');

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
-- Table structure for table `gallaries`
--

CREATE TABLE `gallaries` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `image` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `gallaries`
--

INSERT INTO `gallaries` (`id`, `image`, `created_at`, `updated_at`) VALUES
(3, 'UrrH0ayn5ITzfelYWhTcEyAUbX0DZIhjPA63Q4cY.jpg', '2021-02-18 10:28:23', '2021-02-18 10:41:17'),
(4, 'u1eYRuWTGuhrPwBV82dV94drnPYAIBi68X0F3iTj.jpg', '2021-02-18 11:17:44', '2021-02-18 11:17:44'),
(5, 'z5GqeSEHPv91ulCGgHumy20jY0DJfP03HMPDIBlP.jpg', '2021-02-18 11:18:11', '2021-02-18 11:18:11');

-- --------------------------------------------------------

--
-- Table structure for table `gallary_translations`
--

CREATE TABLE `gallary_translations` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `locale` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `gallary_id` bigint(20) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `gallary_translations`
--

INSERT INTO `gallary_translations` (`id`, `name`, `locale`, `gallary_id`, `created_at`, `updated_at`) VALUES
(5, 'تستaa', 'ar', 3, '2021-02-18 10:28:23', '2021-02-18 10:39:35'),
(6, 'testaa', 'en', 3, '2021-02-18 10:28:23', '2021-02-18 10:39:38'),
(7, 'تستa', 'ar', 4, '2021-02-18 11:17:44', '2021-02-18 11:17:44'),
(8, 'testa', 'en', 4, '2021-02-18 11:17:44', '2021-02-18 11:17:44'),
(9, 'تستaaa', 'ar', 5, '2021-02-18 11:18:11', '2021-02-18 11:18:11'),
(10, 'testaaa', 'en', 5, '2021-02-18 11:18:11', '2021-02-18 11:18:11');

-- --------------------------------------------------------

--
-- Table structure for table `heighlights`
--

CREATE TABLE `heighlights` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `image` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `product_id` bigint(20) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `heighlights`
--

INSERT INTO `heighlights` (`id`, `image`, `product_id`, `created_at`, `updated_at`) VALUES
(1, 'DaflHcXGFwc0tt9RcH3OB8O92xVzSTk79RXl103L.jpg', 1, '2021-02-14 12:50:33', '2021-02-16 10:54:57');

-- --------------------------------------------------------

--
-- Table structure for table `heighlight_translations`
--

CREATE TABLE `heighlight_translations` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `locale` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `heighlight_id` bigint(20) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `heighlight_translations`
--

INSERT INTO `heighlight_translations` (`id`, `name`, `locale`, `heighlight_id`, `created_at`, `updated_at`) VALUES
(1, 'تست هايلايتس', 'ar', 1, '2021-02-14 12:50:33', '2021-02-15 06:03:58'),
(2, 'Levi Benton', 'en', 1, '2021-02-14 12:50:33', '2021-02-14 12:50:33');

-- --------------------------------------------------------

--
-- Table structure for table `images`
--

CREATE TABLE `images` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `image` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `gallary_id` bigint(20) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `images`
--

INSERT INTO `images` (`id`, `image`, `gallary_id`, `created_at`, `updated_at`) VALUES
(8, 'vrrkU8aUz2Csl31t7pxkYZUXIOxvCgiEabNAae6c.jpg', 3, '2021-02-18 10:28:23', '2021-02-18 10:28:23'),
(9, 'rfKAzUGMn5DKXcTdvFDxkUZNW9gkIEKvkXGqUezx.jpg', 3, '2021-02-18 10:28:23', '2021-02-18 10:28:23'),
(10, 'CT5PvHCUsUOmIYAS8gXJyxJykfQ8cv81XTNwgjam.jpg', 3, '2021-02-18 10:28:23', '2021-02-18 10:28:23'),
(11, 'PHf6oQbCr67SCsEOcQKlv45Mwr3OzRtEupyv2bOG.jpg', 3, '2021-02-18 10:28:23', '2021-02-18 10:28:23'),
(12, '8ySqSdqiFPFRf8f09J6Snnopr3hadbZR4HGxJ5EU.jpg', 3, '2021-02-18 10:28:23', '2021-02-18 10:28:23'),
(14, 'ZRE6mCzHW4Hr0SQ0mDqkMNBqZxCWZDrUdkUDnESN.jpg', 4, '2021-02-18 11:17:44', '2021-02-18 11:17:44'),
(15, 'oKcalWjIGdov9StJfOw3lCzaipyrtzIZHYApqrku.jpg', 4, '2021-02-18 11:17:44', '2021-02-18 11:17:44'),
(16, 'aTAIZpW64jJhIPs3apNfOdxmomMS2fPCapVIlMWu.jpg', 4, '2021-02-18 11:17:44', '2021-02-18 11:17:44'),
(17, 'z5pad1WYJ4F1eDR2042PMosInJu2TaIQZrG1Vdti.jpg', 4, '2021-02-18 11:17:44', '2021-02-18 11:17:44'),
(18, 'pCzOxuIyEYJKSjqISWJG6MU3X79RESKwwlqVwYjh.jpg', 4, '2021-02-18 11:17:44', '2021-02-18 11:17:44'),
(19, 'CqNA08KzIz885RnhwXT3Jqspnc6RX4u5KJY7HUX0.jpg', 4, '2021-02-18 11:17:44', '2021-02-18 11:17:44'),
(20, 'qhr1oPTVwJXOGgdO70eFBvUXzMkReBu4Pd4SRd4S.jpg', 5, '2021-02-18 11:18:11', '2021-02-18 11:18:11'),
(21, '10BByKfx5KWN2D0NVWvBVgyTABxLEuzpI8RtDWPb.jpg', 5, '2021-02-18 11:18:11', '2021-02-18 11:18:11'),
(22, 'xiNpj3OsNMcThWOrmDRB4BuuacS3NXjfigMl085L.jpg', 5, '2021-02-18 11:18:11', '2021-02-18 11:18:11'),
(23, '7X9FwFW760dDSghh6243OF8Oqdd74hNlZYPNMOJv.jpg', 5, '2021-02-18 11:18:11', '2021-02-18 11:18:11');

-- --------------------------------------------------------

--
-- Table structure for table `integrations`
--

CREATE TABLE `integrations` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `image` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `url` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `product_id` bigint(20) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `integrations`
--

INSERT INTO `integrations` (`id`, `image`, `url`, `product_id`, `created_at`, `updated_at`) VALUES
(1, 'LF1vDSPp5MJErNYRa4bz6e3mWBofWHjclRgrvTKD.jpg', 'Corrupti at sint vo', 1, '2021-02-14 12:50:33', '2021-02-16 10:55:31');

-- --------------------------------------------------------

--
-- Table structure for table `integration_translations`
--

CREATE TABLE `integration_translations` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `locale` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `integration_id` bigint(20) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `integration_translations`
--

INSERT INTO `integration_translations` (`id`, `name`, `locale`, `integration_id`, `created_at`, `updated_at`) VALUES
(1, 'تست انتجريشنز', 'ar', 1, '2021-02-14 12:50:33', '2021-02-15 06:04:08'),
(2, 'Cherokee Chang', 'en', 1, '2021-02-14 12:50:33', '2021-02-14 12:50:33');

-- --------------------------------------------------------

--
-- Table structure for table `investigations`
--

CREATE TABLE `investigations` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `project_id` bigint(20) UNSIGNED NOT NULL,
  `image` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `investigations`
--

INSERT INTO `investigations` (`id`, `project_id`, `image`, `created_at`, `updated_at`) VALUES
(31, 12, 'rbFNjjwIS0Yqghg9TFcRKpYOFlHLy05cVPxFxgZs.png', '2021-02-14 10:07:44', '2021-02-14 10:14:19'),
(33, 12, '44As5ywVNRdIITpPa3Dgg6jVSNpRa5S9TmJ7dkaN.png', '2021-02-14 10:14:44', '2021-02-14 10:14:44');

-- --------------------------------------------------------

--
-- Table structure for table `investigation_translations`
--

CREATE TABLE `investigation_translations` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `locale` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `investigation_id` bigint(20) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `investigation_translations`
--

INSERT INTO `investigation_translations` (`id`, `name`, `locale`, `investigation_id`, `created_at`, `updated_at`) VALUES
(61, 'aaaaaaaaaaaaaaaaa', 'ar', 31, '2021-02-14 10:07:44', '2021-02-14 10:13:49'),
(62, 'bbbbbbbbbbbbbbb', 'en', 31, '2021-02-14 10:07:44', '2021-02-14 10:13:49'),
(65, 'xx', 'ar', 33, '2021-02-14 10:14:44', '2021-02-14 10:14:44'),
(66, 'xx', 'en', 33, '2021-02-14 10:14:44', '2021-02-14 10:14:44');

-- --------------------------------------------------------

--
-- Table structure for table `messages`
--

CREATE TABLE `messages` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `phone` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `subject` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `message` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `messages`
--

INSERT INTO `messages` (`id`, `name`, `email`, `phone`, `subject`, `message`, `created_at`, `updated_at`) VALUES
(1, 'test', 'test@test.com', '01015960452', 'aaaa', 'aaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaa', '2021-02-18 11:52:32', '2021-02-18 11:52:32'),
(2, 'test', 'test@test.com', '01015960452', 'aaa', 'aaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaa', '2021-02-18 11:53:21', '2021-02-18 11:53:21'),
(3, 'test', 'test@test.com', '01015960452', 'aaaa', 'aaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaa', '2021-02-18 12:03:30', '2021-02-18 12:03:30');

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
(41, '2021_02_18_134516_create_messages_table', 10);

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
-- Table structure for table `products`
--

CREATE TABLE `products` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `header` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `image` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `products`
--

INSERT INTO `products` (`id`, `header`, `image`, `created_at`, `updated_at`) VALUES
(1, 'uk5KhPqclXAMWlY2f4fDSckwhhYGvsgpw54Y4R1p.jpg', '19x4kmsdioJxjNzmAoJJNxPsQO8aP650iFoIjkH6.jpg', '2021-02-14 12:50:33', '2021-02-16 10:51:35'),
(2, 'JZ7EOYCnUgq6mynKhRFskaal2j8EYDgevhtVztZN.jpg', 'dvJjuZCcqdReQhY5yfJpJbQAtRLzKVdGyuxZUNkD.jpg', '2021-02-18 07:20:45', '2021-02-18 07:20:45'),
(3, 'DftlxzoTUrlnPkknAckXCuO8pB7h2nZHBfQprbNv.jpg', '8HMlnTx8QfSlzljqE23eZllZeYzUv1G6Z5IzpCae.jpg', '2021-02-18 07:21:14', '2021-02-18 07:21:14');

-- --------------------------------------------------------

--
-- Table structure for table `product_translations`
--

CREATE TABLE `product_translations` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `description` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `locale` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `product_id` bigint(20) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `product_translations`
--

INSERT INTO `product_translations` (`id`, `name`, `description`, `locale`, `product_id`, `created_at`, `updated_at`) VALUES
(1, 'Zena Davidson', '<p>sdg</p>', 'ar', 1, '2021-02-14 12:50:33', '2021-02-14 12:50:33'),
(2, 'Hammett Castillo', '<p>sdfgdsfg</p>', 'en', 1, '2021-02-14 12:50:33', '2021-02-14 12:50:33'),
(3, 'تست', '<p>لوريم إيبسوم(Lorem Ipsum) هو ببساطة نص شكلي (بمعنى أن الغاية هي الشكل وليس المحتوى) ويُستخدم في صناعات المطابع ودور النشر. كان لوريم إيبسوم ولايزال المعيار للنص الشكلي منذ القرن الخامس عشر عندما قامت مطبعة مجهولة برص مجموعة من الأحرف بشكل عشوائي أخذتها من نص، لتكوّن كتيّب بمثابة دليل أو مرجع شكلي لهذه الأحرف. خمسة قرون من الزمن لم تقضي على هذا النص، بل انه حتى صار مستخدماً وبشكله الأصلي في الطباعة والتنضيد الإلكتروني. انتشر بشكل كبير في ستينيّات هذا القرن مع إصدار رقائق \"ليتراسيت\" (Letraset) البلاستيكية تحوي مقاطع من هذا النص، وعاد لينتشر مرة أخرى مؤخراَ مع ظهور برامج النشر الإلكتروني مثل \"ألدوس بايج مايكر\" (Aldus PageMaker) والتي حوت أيضاً على نسخ من نص لوريم إيبسوم.</p>', 'ar', 2, '2021-02-18 07:20:45', '2021-02-18 07:20:45'),
(4, 'test', '<p><strong>Lorem Ipsum</strong> is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry\'s standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged. It was popularised in the 1960s with the release of Letraset sheets containing Lorem Ipsum passages, and more recently with desktop publishing software like Aldus PageMaker including versions of Lorem Ipsum.</p><p>&nbsp;</p><figure class=\"table\"><table><tbody><tr><td>&nbsp;</td><td>&nbsp;</td></tr><tr><td>&nbsp;</td><td>&nbsp;</td></tr><tr><td>&nbsp;</td><td>&nbsp;</td></tr></tbody></table></figure>', 'en', 2, '2021-02-18 07:20:45', '2021-02-18 07:32:57'),
(5, 'تستس', '<p><strong>Lorem Ipsum</strong> is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry\'s standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged. It was popularised in the 1960s with the release of Letraset sheets containing Lorem Ipsum passages, and more recently with desktop publishing software like Aldus PageMaker including versions of Lorem Ipsum.</p>', 'ar', 3, '2021-02-18 07:21:14', '2021-02-18 07:21:14'),
(6, 'testس', '<p><strong>Lorem Ipsum</strong> is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry\'s standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged. It was popularised in the 1960s with the release of Letraset sheets containing Lorem Ipsum passages, and more recently with desktop publishing software like Aldus PageMaker including versions of Lorem Ipsum.</p>', 'en', 3, '2021-02-18 07:21:14', '2021-02-18 07:21:14');

-- --------------------------------------------------------

--
-- Table structure for table `projects`
--

CREATE TABLE `projects` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `header` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `image` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `projects`
--

INSERT INTO `projects` (`id`, `header`, `image`, `created_at`, `updated_at`) VALUES
(10, 'OlqPyhjIgNGUWR0v6wc3TnGoivIlexmho5jcbOC6.png', 'MBzUQUbDWp5ne4mzxUlxiuIiBTIEkVIMF60jIPyT.jpg', '2021-02-14 07:15:52', '2021-02-16 12:10:40'),
(11, '11LlM81O4OhcgDNAiHcBpz3ZZ0AmzU0uDU8gFp6q.png', 'utMOzsNK1qbFlIzUBFTpVrtatvOqGtMGfsMpPBBN.jpg', '2021-02-14 07:33:24', '2021-02-16 12:10:52'),
(12, '4dmnwhn6eHRcylJi7IAHRMSTaLLf0Bx8aFVzcfaZ.png', '8AJJ549BBEh05dwKWQzVcFE7gdFHEH5xfXMGqKEP.jpg', '2021-02-14 09:52:00', '2021-02-16 12:11:06'),
(13, 'yCItOfptIHq0t8prHQV7mNtO17vyNzBiG8R1ZRwn.png', '2TZzREJcdk1RBSRgi8su3OYt1x9Tfv2wdxRrifXZ.jpg', '2021-02-14 09:53:32', '2021-02-16 12:11:20');

-- --------------------------------------------------------

--
-- Table structure for table `project_translations`
--

CREATE TABLE `project_translations` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `description` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `locale` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `project_id` bigint(20) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `project_translations`
--

INSERT INTO `project_translations` (`id`, `name`, `description`, `locale`, `project_id`, `created_at`, `updated_at`) VALUES
(17, 'تست', '<p>aaaaaaaa</p>', 'ar', 10, '2021-02-14 07:15:52', '2021-02-14 07:15:52'),
(18, 'test', '<p>bbbbbbbbb</p>', 'en', 10, '2021-02-14 07:15:52', '2021-02-14 07:15:52'),
(19, 'تست', '<p>4856</p>', 'ar', 11, '2021-02-14 07:33:24', '2021-02-14 07:33:24'),
(20, 'test', '<p>654</p>', 'en', 11, '2021-02-14 07:33:24', '2021-02-14 07:33:24'),
(21, 'تستش', '<p>aaa</p>', 'ar', 12, '2021-02-14 09:52:00', '2021-02-14 10:07:14'),
(22, 'testش', '<p>bbbb</p>', 'en', 12, '2021-02-14 09:52:00', '2021-02-14 10:07:14'),
(23, 'Trevor Mcmillan', '<p>aaa</p>', 'ar', 13, '2021-02-14 09:53:32', '2021-02-14 09:53:32'),
(24, 'test', '<p>aaaa</p>', 'en', 13, '2021-02-14 09:53:32', '2021-02-14 09:53:32');

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
(1, 'facebook', 'contact', 'www.facebook.com', 'text', NULL, NULL, '2021-02-15 07:51:25'),
(2, 'twitter', 'contact', 'www.twitter.com', 'text', NULL, NULL, NULL),
(3, 'youtube', 'contact', 'www.youtube.com', 'text', NULL, NULL, NULL),
(4, 'instagram', 'contact', 'www.instagram.com', 'text', NULL, NULL, NULL),
(5, 'address_1', 'address', '1st branch', 'text', NULL, NULL, NULL),
(6, 'address_1_address', 'contact', 'feeen', 'text', 5, NULL, NULL),
(7, 'address_1_phone', 'contact', '0101010', 'text', 5, NULL, NULL),
(8, 'address_1_email', 'contact', 'a@a.com', 'text', 5, NULL, NULL),
(9, 'address_1_active', 'contact', '1', 'text', 5, NULL, '2021-02-15 08:19:39'),
(10, 'address_2', 'address', '2st branch', 'text', NULL, NULL, '2021-02-15 08:21:29'),
(11, 'address_2_address', 'contact', NULL, 'text', 10, NULL, NULL),
(12, 'address_2_phone', 'contact', NULL, 'text', 10, NULL, NULL),
(13, 'address_2_email', 'contact', NULL, 'text', 10, NULL, NULL),
(14, 'address_2_active', 'contact', '0', 'text', 10, NULL, '2021-02-18 11:42:42'),
(15, 'address_3', 'address', '3rd brach', 'text', NULL, NULL, '2021-02-15 08:21:29'),
(16, 'address_3_address', 'contact', NULL, 'text', 15, NULL, NULL),
(17, 'address_3_phone', 'contact', NULL, 'text', 15, NULL, NULL),
(18, 'address_3_email', 'contact', NULL, 'text', 15, NULL, NULL),
(19, 'address_3_active', 'contact', '0', 'text', 15, NULL, '2021-02-15 08:21:29'),
(20, 'map', 'contact', '<iframe src=\"https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d110532.89549083744!2d31.30329406893522!3d30.032468600716175!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x14583c1380cba7ef%3A0xd541260e9e06978d!2sNasr%20City%2C%20Cairo%20Governorate!5e0!3m2!1sen!2seg!4v1601175174423!5m2!1sen!2seg\" frameborder=\"0\" style=\"border:0;\" allowfullscreen=\"\" aria-hidden=\"false\" tabindex=\"0\"></iframe>', 'text', NULL, NULL, '2021-02-15 08:23:21'),
(21, 'about_image', 'about', 'Mjru6CEFSx99xHqzA0TeL4DZnU2WWh5ElMuCKmTt.jpg', 'image', NULL, NULL, '2021-02-15 11:22:43'),
(22, 'about_header_image', 'about', 'oMXSCblB0aFlhxUpj779YROGoKlifbjuSGR7knSD.jpg', 'image', NULL, NULL, '2021-02-15 11:05:48'),
(23, 'about_description', 'about', NULL, 'text', NULL, NULL, NULL),
(24, 'about_goals', 'about', NULL, 'text', NULL, NULL, NULL),
(25, 'home_video', 'home', 'https://www.youtube.com/watch?v=tI_tIZFyKBw', 'text', NULL, NULL, '2021-02-15 13:05:15'),
(26, 'brief', 'home', '35xjNKHAgqs0BHYxDvuleCvL5pL2u8Zrpkyk0fcu.jpg', 'image', NULL, NULL, '2021-02-16 07:09:56');

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
(1, '<p>لوريم إيبسوم(Lorem Ipsum) هو ببساطة نص شكلي (بمعنى أن الغاية هي الشكل وليس المحتوى) ويُستخدم في صناعات المطابع ودور النشر. كان لوريم إيبسوم ولايزال المعيار للنص الشكلي منذ القرن الخامس عشر عندما قامت مطبعة مجهولة برص مجموعة من الأحرف بشكل عشوائي أخذتها من نص، لتكوّن كتيّب بمثابة دليل أو مرجع شكلي لهذه الأحرف. خمسة قرون من الزمن لم تقضي على هذا النص، بل انه حتى صار مستخدماً وبشكله الأصلي في الطباعة والتنضيد الإلكتروني. انتشر بشكل كبير في ستينيّات هذا القرن مع إصدار رقائق \"ليتراسيت\" (Letraset) البلاستيكية تحوي مقاطع من هذا النص، وعاد لينتشر مرة أخرى مؤخراَ مع ظهور برامج النشر الإلكتروني مثل \"ألدوس بايج مايكر\" (Aldus PageMaker) والتي حوت أيضاً على نسخ من نص لوريم إيبسوم.</p>', 'ar', 23, '2021-02-15 11:05:46', '2021-02-15 11:05:46'),
(2, '<p><strong>Lorem Ipsum</strong> is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry\'s standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged. It was popularised in the 1960s with the release of Letraset sheets containing Lorem Ipsum passages, and more recently with desktop publishing software like Aldus PageMaker including versions of Lorem Ipsum.</p>', 'en', 23, '2021-02-15 11:05:46', '2021-02-15 11:05:46'),
(3, '<p>لوريم إيبسوم(Lorem Ipsum) هو ببساطة نص شكلي (بمعنى أن الغاية هي الشكل وليس المحتوى) ويُستخدم في صناعات المطابع ودور النشر. كان لوريم إيبسوم ولايزال المعيار للنص الشكلي منذ القرن الخامس عشر عندما قامت مطبعة مجهولة برص مجموعة من الأحرف بشكل عشوائي أخذتها من نص، لتكوّن كتيّب بمثابة دليل أو مرجع شكلي لهذه الأحرف. خمسة قرون من الزمن لم تقضي على هذا النص، بل انه حتى صار مستخدماً وبشكله الأصلي في الطباعة والتنضيد الإلكتروني. انتشر بشكل كبير في ستينيّات هذا القرن مع إصدار رقائق \"ليتراسيت\" (Letraset) البلاستيكية تحوي مقاطع من هذا النص، وعاد لينتشر مرة أخرى مؤخراَ مع ظهور برامج النشر الإلكتروني مثل \"ألدوس بايج مايكر\" (Aldus PageMaker) والتي حوت أيضاً على نسخ من نص لوريم إيبسوم.</p>', 'ar', 24, '2021-02-15 11:05:46', '2021-02-15 11:05:46'),
(4, '<p><strong>Lorem Ipsum</strong> is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry\'s standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged. It was popularised in the 1960s with the release of Letraset sheets containing Lorem Ipsum passages, and more recently with desktop publishing software like Aldus PageMaker including versions of Lorem Ipsum.</p>', 'en', 24, '2021-02-15 11:05:46', '2021-02-15 11:05:46'),
(5, 'تست', 'ar', 25, '2021-02-16 06:59:17', '2021-02-16 06:59:17'),
(6, 'test', 'en', 25, '2021-02-16 06:59:17', '2021-02-16 06:59:17'),
(7, '<p>Lorem ipsum dolor sit amet consectetur, adipisicing elit. Dolorum laudantium quisquam aspernatur repellat illum eius! Impedit perspiciatis accusamus inventore animi ullam iusto ipsam, enim blanditiis magnam. Ipsum enim error fuga. Dolorum laudantium quisquam aspernatur repellat illum eius! Impedit perspiciatis accusamus inventore animi ullam iusto ipsam, enim blanditiis magnam. Ipsum enim error fuga.</p>', 'ar', 26, '2021-02-16 07:08:51', '2021-02-16 07:08:51'),
(8, '<p>Lorem ipsum dolor sit amet consectetur, adipisicing elit. Dolorum laudantium quisquam aspernatur repellat illum eius! Impedit perspiciatis accusamus inventore animi ullam iusto ipsam, enim blanditiis magnam. Ipsum enim error fuga. Dolorum laudantium quisquam aspernatur repellat illum eius! Impedit perspiciatis accusamus inventore animi ullam iusto ipsam, enim blanditiis magnam. Ipsum enim error fuga.</p>', 'en', 26, '2021-02-16 07:08:51', '2021-02-16 07:08:51');

-- --------------------------------------------------------

--
-- Table structure for table `sliders`
--

CREATE TABLE `sliders` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `image` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `sliders`
--

INSERT INTO `sliders` (`id`, `image`, `created_at`, `updated_at`) VALUES
(4, 'YyRbiC9UdaefMI8UTPOVhQ7Qm3etO7Swoib6dAHo.jpg', '2021-02-16 06:45:49', '2021-02-16 06:45:49'),
(5, 'IedAmVyj5JoIiyJmlaLbhIs8QmGFEG6cL1W90iEj.jpg', '2021-02-16 06:45:49', '2021-02-16 06:45:49'),
(6, 'bIeQ9JzGy9Hk32FOQogzfjHqZfuIen7ej0HvUpNV.jpg', '2021-02-16 06:45:49', '2021-02-16 06:45:49'),
(7, 'pR9hWbXCiqtotpUQie3WNIjSY5Nt1zVhPlW4hwq0.jpg', '2021-02-16 06:45:49', '2021-02-16 06:45:49'),
(8, 'VKyL8SqvQJ4xXgJu9ncQtySaUxAyzGKILMoxbLWc.jpg', '2021-02-16 06:45:49', '2021-02-16 06:45:49');

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
(2, 'Nevada Dunlap', 'hopofew@mailinator.com', NULL, '$2y$10$LM1SltTG65Wy0Sjr/dPMzexAuRuM8.llb.LH18PTYAEqJkUkFoK2K', NULL, '2021-02-10 10:15:33', '2021-02-10 11:10:10');

-- --------------------------------------------------------

--
-- Table structure for table `videos`
--

CREATE TABLE `videos` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `url` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `videoable_id` int(11) DEFAULT NULL,
  `videoable_type` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `videos`
--

INSERT INTO `videos` (`id`, `url`, `videoable_id`, `videoable_type`, `created_at`, `updated_at`) VALUES
(9, 'https://www.youtube.com/watch?v=guCwdHngTmM', 12, 'App\\Project', '2021-02-14 07:15:52', '2021-02-14 07:15:52'),
(15, 'https://www.youtube.com/watch?v=guCwdHngTmM', 12, 'App\\Project', '2021-02-14 10:38:36', '2021-02-14 10:38:36'),
(16, 'https://www.youtube.com/watch?v=guCwdHngTmM', 3, 'App\\Article', '2021-02-14 11:02:04', '2021-02-14 11:05:33'),
(23, 'https://www.youtube.com/watch?v=ob61a_pcKv0', NULL, NULL, '2021-02-18 08:52:33', '2021-02-18 08:52:33'),
(24, 'https://www.youtube.com/watch?v=R2Zx7VjVKcM', 3, 'App\\Project', '2021-02-18 08:52:54', '2021-02-18 08:52:54'),
(25, 'https://www.youtube.com/watch?v=ob61a_pcKv0', 4, 'App\\Article', '2021-02-18 08:53:33', '2021-02-18 08:53:33'),
(26, 'https://www.youtube.com/watch?v=afgspPgRQwM', 11, 'App\\Project', '2021-02-18 09:07:02', '2021-02-18 09:07:02');

-- --------------------------------------------------------

--
-- Table structure for table `video_translations`
--

CREATE TABLE `video_translations` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `locale` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `video_id` bigint(20) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `video_translations`
--

INSERT INTO `video_translations` (`id`, `name`, `locale`, `video_id`, `created_at`, `updated_at`) VALUES
(17, 'نيم', 'ar', 9, '2021-02-14 07:15:52', '2021-02-18 09:47:05'),
(18, 'bb', 'en', 9, '2021-02-14 07:15:52', '2021-02-14 07:15:52'),
(29, 'يوتوةيب فيديو', 'ar', 15, '2021-02-14 10:38:36', '2021-02-14 10:38:36'),
(30, 'Ivana Moon', 'en', 15, '2021-02-14 10:38:36', '2021-02-14 10:38:36'),
(31, 'Zena Obrienششش', 'ar', 16, '2021-02-14 11:02:04', '2021-02-14 11:05:33'),
(32, 'Lacy Underwoodشش', 'en', 16, '2021-02-14 11:02:04', '2021-02-14 11:05:33'),
(45, 'تست', 'ar', 23, '2021-02-18 08:52:33', '2021-02-18 08:52:33'),
(46, 'test', 'en', 23, '2021-02-18 08:52:33', '2021-02-18 08:52:33'),
(47, 'تست', 'ar', 24, '2021-02-18 08:52:54', '2021-02-18 08:52:54'),
(48, 'test', 'en', 24, '2021-02-18 08:52:54', '2021-02-18 08:52:54'),
(49, 'تست', 'ar', 25, '2021-02-18 08:53:33', '2021-02-18 08:53:33'),
(50, 'test', 'en', 25, '2021-02-18 08:53:33', '2021-02-18 08:53:33'),
(51, 'Rudyard Moore', 'ar', 26, '2021-02-18 09:07:02', '2021-02-18 09:07:02'),
(52, 'Wylie Rowland', 'en', 26, '2021-02-18 09:07:02', '2021-02-18 09:07:02');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `articles`
--
ALTER TABLE `articles`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `article_translations`
--
ALTER TABLE `article_translations`
  ADD PRIMARY KEY (`id`),
  ADD KEY `article_translations_article_id_foreign` (`article_id`),
  ADD KEY `article_translations_locale_index` (`locale`);

--
-- Indexes for table `company_heighlights`
--
ALTER TABLE `company_heighlights`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `company_heighlight_translations`
--
ALTER TABLE `company_heighlight_translations`
  ADD PRIMARY KEY (`id`),
  ADD KEY `company_heighlight_translations_company_heighlight_id_foreign` (`company_heighlight_id`),
  ADD KEY `company_heighlight_translations_locale_index` (`locale`);

--
-- Indexes for table `failed_jobs`
--
ALTER TABLE `failed_jobs`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `gallaries`
--
ALTER TABLE `gallaries`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `gallary_translations`
--
ALTER TABLE `gallary_translations`
  ADD PRIMARY KEY (`id`),
  ADD KEY `gallary_translations_gallary_id_foreign` (`gallary_id`),
  ADD KEY `gallary_translations_locale_index` (`locale`);

--
-- Indexes for table `heighlights`
--
ALTER TABLE `heighlights`
  ADD PRIMARY KEY (`id`),
  ADD KEY `heighlights_product_id_foreign` (`product_id`);

--
-- Indexes for table `heighlight_translations`
--
ALTER TABLE `heighlight_translations`
  ADD PRIMARY KEY (`id`),
  ADD KEY `heighlight_translations_heighlight_id_foreign` (`heighlight_id`),
  ADD KEY `heighlight_translations_locale_index` (`locale`);

--
-- Indexes for table `images`
--
ALTER TABLE `images`
  ADD PRIMARY KEY (`id`),
  ADD KEY `images_gallary_id_foreign` (`gallary_id`);

--
-- Indexes for table `integrations`
--
ALTER TABLE `integrations`
  ADD PRIMARY KEY (`id`),
  ADD KEY `integrations_product_id_foreign` (`product_id`);

--
-- Indexes for table `integration_translations`
--
ALTER TABLE `integration_translations`
  ADD PRIMARY KEY (`id`),
  ADD KEY `integration_translations_integration_id_foreign` (`integration_id`),
  ADD KEY `integration_translations_locale_index` (`locale`);

--
-- Indexes for table `investigations`
--
ALTER TABLE `investigations`
  ADD PRIMARY KEY (`id`),
  ADD KEY `investigations_project_id_foreign` (`project_id`);

--
-- Indexes for table `investigation_translations`
--
ALTER TABLE `investigation_translations`
  ADD PRIMARY KEY (`id`),
  ADD KEY `investigation_translations_investigation_id_foreign` (`investigation_id`),
  ADD KEY `investigation_translations_locale_index` (`locale`);

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
-- Indexes for table `products`
--
ALTER TABLE `products`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `product_translations`
--
ALTER TABLE `product_translations`
  ADD PRIMARY KEY (`id`),
  ADD KEY `product_translations_product_id_foreign` (`product_id`),
  ADD KEY `product_translations_locale_index` (`locale`);

--
-- Indexes for table `projects`
--
ALTER TABLE `projects`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `project_translations`
--
ALTER TABLE `project_translations`
  ADD PRIMARY KEY (`id`),
  ADD KEY `project_translations_project_id_foreign` (`project_id`),
  ADD KEY `project_translations_locale_index` (`locale`);

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
-- Indexes for table `sliders`
--
ALTER TABLE `sliders`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `users_email_unique` (`email`);

--
-- Indexes for table `videos`
--
ALTER TABLE `videos`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `video_translations`
--
ALTER TABLE `video_translations`
  ADD PRIMARY KEY (`id`),
  ADD KEY `video_translations_video_id_foreign` (`video_id`),
  ADD KEY `video_translations_locale_index` (`locale`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `articles`
--
ALTER TABLE `articles`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `article_translations`
--
ALTER TABLE `article_translations`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT for table `company_heighlights`
--
ALTER TABLE `company_heighlights`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `company_heighlight_translations`
--
ALTER TABLE `company_heighlight_translations`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT for table `failed_jobs`
--
ALTER TABLE `failed_jobs`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `gallaries`
--
ALTER TABLE `gallaries`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `gallary_translations`
--
ALTER TABLE `gallary_translations`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT for table `heighlights`
--
ALTER TABLE `heighlights`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `heighlight_translations`
--
ALTER TABLE `heighlight_translations`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `images`
--
ALTER TABLE `images`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=24;

--
-- AUTO_INCREMENT for table `integrations`
--
ALTER TABLE `integrations`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `integration_translations`
--
ALTER TABLE `integration_translations`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `investigations`
--
ALTER TABLE `investigations`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=34;

--
-- AUTO_INCREMENT for table `investigation_translations`
--
ALTER TABLE `investigation_translations`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=67;

--
-- AUTO_INCREMENT for table `messages`
--
ALTER TABLE `messages`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=42;

--
-- AUTO_INCREMENT for table `products`
--
ALTER TABLE `products`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `product_translations`
--
ALTER TABLE `product_translations`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `projects`
--
ALTER TABLE `projects`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;

--
-- AUTO_INCREMENT for table `project_translations`
--
ALTER TABLE `project_translations`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=25;

--
-- AUTO_INCREMENT for table `settings`
--
ALTER TABLE `settings`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=27;

--
-- AUTO_INCREMENT for table `setting_translations`
--
ALTER TABLE `setting_translations`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `sliders`
--
ALTER TABLE `sliders`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `videos`
--
ALTER TABLE `videos`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=27;

--
-- AUTO_INCREMENT for table `video_translations`
--
ALTER TABLE `video_translations`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=53;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `article_translations`
--
ALTER TABLE `article_translations`
  ADD CONSTRAINT `article_translations_article_id_foreign` FOREIGN KEY (`article_id`) REFERENCES `articles` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `company_heighlight_translations`
--
ALTER TABLE `company_heighlight_translations`
  ADD CONSTRAINT `company_heighlight_translations_company_heighlight_id_foreign` FOREIGN KEY (`company_heighlight_id`) REFERENCES `company_heighlights` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `gallary_translations`
--
ALTER TABLE `gallary_translations`
  ADD CONSTRAINT `gallary_translations_gallary_id_foreign` FOREIGN KEY (`gallary_id`) REFERENCES `gallaries` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `heighlights`
--
ALTER TABLE `heighlights`
  ADD CONSTRAINT `heighlights_product_id_foreign` FOREIGN KEY (`product_id`) REFERENCES `products` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `heighlight_translations`
--
ALTER TABLE `heighlight_translations`
  ADD CONSTRAINT `heighlight_translations_heighlight_id_foreign` FOREIGN KEY (`heighlight_id`) REFERENCES `heighlights` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `images`
--
ALTER TABLE `images`
  ADD CONSTRAINT `images_gallary_id_foreign` FOREIGN KEY (`gallary_id`) REFERENCES `gallaries` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `integrations`
--
ALTER TABLE `integrations`
  ADD CONSTRAINT `integrations_product_id_foreign` FOREIGN KEY (`product_id`) REFERENCES `products` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `integration_translations`
--
ALTER TABLE `integration_translations`
  ADD CONSTRAINT `integration_translations_integration_id_foreign` FOREIGN KEY (`integration_id`) REFERENCES `integrations` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `investigations`
--
ALTER TABLE `investigations`
  ADD CONSTRAINT `investigations_project_id_foreign` FOREIGN KEY (`project_id`) REFERENCES `projects` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `investigation_translations`
--
ALTER TABLE `investigation_translations`
  ADD CONSTRAINT `investigation_translations_investigation_id_foreign` FOREIGN KEY (`investigation_id`) REFERENCES `investigations` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `product_translations`
--
ALTER TABLE `product_translations`
  ADD CONSTRAINT `product_translations_product_id_foreign` FOREIGN KEY (`product_id`) REFERENCES `products` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `project_translations`
--
ALTER TABLE `project_translations`
  ADD CONSTRAINT `project_translations_project_id_foreign` FOREIGN KEY (`project_id`) REFERENCES `projects` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `setting_translations`
--
ALTER TABLE `setting_translations`
  ADD CONSTRAINT `setting_translations_setting_id_foreign` FOREIGN KEY (`setting_id`) REFERENCES `settings` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `video_translations`
--
ALTER TABLE `video_translations`
  ADD CONSTRAINT `video_translations_video_id_foreign` FOREIGN KEY (`video_id`) REFERENCES `videos` (`id`) ON DELETE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
