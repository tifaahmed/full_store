-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1:3306
-- Generation Time: 10 يناير 2024 الساعة 19:38
-- إصدار الخادم: 10.6.14-MariaDB-cll-lve
-- PHP Version: 7.2.34

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `u182721273_gravity`
--

-- --------------------------------------------------------

--
-- بنية الجدول `about`
--

CREATE TABLE `about` (
  `id` int(11) NOT NULL,
  `vendor_id` int(11) NOT NULL,
  `about_content` longtext NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `updated_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- إرجاع أو استيراد بيانات الجدول `about`
--

INSERT INTO `about` (`id`, `vendor_id`, `about_content`, `created_at`, `updated_at`) VALUES
(1, 1, '<p><big><strong>About Us</strong></big></p>\r\n\r\n<p>&nbsp;</p>\r\n\r\n<p>&quot;Sed ut perspiciatis unde omnis iste natus error sit voluptatem accusantium doloremque laudantium, totam rem aperiam, eaque ipsa quae ab illo inventore veritatis et quasi architecto beatae vitae dicta sunt explicabo. Nemo enim ipsam voluptatem quia voluptas sit aspernatur aut odit aut fugit, sed quia consequuntur magni dolores eos qui ratione voluptatem sequi nesciunt. Neque porro quisquam est, qui dolorem ipsum quia dolor sit amet, consectetur, adipisci velit, sed quia non numquam eius modi tempora incidunt ut labore et dolore magnam aliquam quaerat voluptatem. Ut enim ad minima veniam, quis nostrum exercitationem ullam corporis suscipit laboriosam, nisi ut aliquid ex ea commodi consequatur? Quis autem vel eum iure reprehenderit qui in ea voluptate velit esse quam nihil molestiae consequatur, vel illum qui dolorem eum fugiat quo voluptas nulla pariatur?&quot;</p>\r\n\r\n<p>&nbsp;</p>\r\n\r\n<p>&quot;Sed ut perspiciatis unde omnis iste natus error sit voluptatem accusantium doloremque laudantium, totam rem aperiam, eaque ipsa quae ab illo inventore veritatis et quasi architecto beatae vitae dicta sunt explicabo. Nemo enim ipsam voluptatem quia voluptas sit aspernatur aut odit aut fugit, sed quia consequuntur magni dolores eos qui ratione voluptatem sequi nesciunt. Neque porro quisquam est, qui dolorem ipsum quia dolor sit amet, consectetur, adipisci velit, sed quia non numquam eius modi tempora incidunt ut labore et dolore magnam aliquam quaerat voluptatem. Ut enim ad minima veniam, quis nostrum exercitationem ullam corporis suscipit laboriosam, nisi ut aliquid ex ea commodi consequatur? Quis autem vel eum iure reprehenderit qui in ea voluptate velit esse quam nihil molestiae consequatur, vel illum qui dolorem eum fugiat quo voluptas nulla pariatur?&quot;</p>\r\n\r\n<p>&nbsp;</p>\r\n\r\n<p>&quot;Sed ut perspiciatis unde omnis iste natus error sit voluptatem accusantium doloremque laudantium, totam rem aperiam, eaque ipsa quae ab illo inventore veritatis et quasi architecto beatae vitae dicta sunt explicabo. Nemo enim ipsam voluptatem quia voluptas sit aspernatur aut odit aut fugit, sed quia consequuntur magni dolores eos qui ratione voluptatem sequi nesciunt. Neque porro quisquam est, qui dolorem ipsum quia dolor sit amet, consectetur, adipisci velit, sed quia non numquam eius modi tempora incidunt ut labore et dolore magnam aliquam quaerat voluptatem. Ut enim ad minima veniam, quis nostrum exercitationem ullam corporis suscipit laboriosam, nisi ut aliquid ex ea commodi consequatur? Quis autem vel eum iure reprehenderit qui in ea voluptate velit esse quam nihil molestiae consequatur, vel illum qui dolorem eum fugiat quo voluptas nulla pariatur?&quot;</p>\r\n\r\n<p>&nbsp;</p>\r\n\r\n<p>&quot;Sed ut perspiciatis unde omnis iste natus error sit voluptatem accusantium doloremque laudantium, totam rem aperiam, eaque ipsa quae ab illo inventore veritatis et quasi architecto beatae vitae dicta sunt explicabo. Nemo enim ipsam voluptatem quia voluptas sit aspernatur aut odit aut fugit, sed quia consequuntur magni dolores eos qui ratione voluptatem sequi nesciunt. Neque porro quisquam est, qui dolorem ipsum quia dolor sit amet, consectetur, adipisci velit, sed quia non numquam eius modi tempora incidunt ut labore et dolore magnam aliquam quaerat voluptatem. Ut enim ad minima veniam, quis nostrum exercitationem ullam corporis suscipit laboriosam, nisi ut aliquid ex ea commodi consequatur? Quis autem vel eum iure reprehenderit qui in ea voluptate velit esse quam nihil molestiae consequatur, vel illum qui dolorem eum fugiat quo voluptas nulla pariatur?&quot;</p>\r\n\r\n<p>&nbsp;</p>\r\n\r\n<p>&quot;Sed ut perspiciatis unde omnis iste natus error sit voluptatem accusantium doloremque laudantium, totam rem aperiam, eaque ipsa quae ab illo inventore veritatis et quasi architecto beatae vitae dicta sunt explicabo. Nemo enim ipsam voluptatem quia voluptas sit aspernatur aut odit aut fugit, sed quia consequuntur magni dolores eos qui ratione voluptatem sequi nesciunt. Neque porro quisquam est, qui dolorem ipsum quia dolor sit amet, consectetur, adipisci velit, sed quia non numquam eius modi tempora incidunt ut labore et dolore magnam aliquam quaerat voluptatem. Ut enim ad minima veniam, quis nostrum exercitationem ullam corporis suscipit laboriosam, nisi ut aliquid ex ea commodi consequatur? Quis autem vel eum iure reprehenderit qui in ea voluptate velit esse quam nihil molestiae consequatur, vel illum qui dolorem eum fugiat quo voluptas nulla pariatur?&quot;</p>\r\n\r\n<p>&nbsp;</p>\r\n\r\n<p>&quot;Sed ut perspiciatis unde omnis iste natus error sit voluptatem accusantium doloremque laudantium, totam rem aperiam, eaque ipsa quae ab illo inventore veritatis et quasi architecto beatae vitae dicta sunt explicabo. Nemo enim ipsam voluptatem quia voluptas sit aspernatur aut odit aut fugit, sed quia consequuntur magni dolores eos qui ratione voluptatem sequi nesciunt. Neque porro quisquam est, qui dolorem ipsum quia dolor sit amet, consectetur, adipisci velit, sed quia non numquam eius modi tempora incidunt ut labore et dolore magnam aliquam quaerat voluptatem. Ut enim ad minima veniam, quis nostrum exercitationem ullam corporis suscipit laboriosam, nisi ut aliquid ex ea commodi consequatur? Quis autem vel eum iure reprehenderit qui in ea voluptate velit esse quam nihil molestiae consequatur, vel illum qui dolorem eum fugiat quo voluptas nulla pariatur?&quot;</p>\r\n\r\n<p>&nbsp;</p>\r\n\r\n<p>&quot;Sed ut perspiciatis unde omnis iste natus error sit voluptatem accusantium doloremque laudantium, totam rem aperiam, eaque ipsa quae ab illo inventore veritatis et quasi architecto beatae vitae dicta sunt explicabo. Nemo enim ipsam voluptatem quia voluptas sit aspernatur aut odit aut fugit, sed quia consequuntur magni dolores eos qui ratione voluptatem sequi nesciunt. Neque porro quisquam est, qui dolorem ipsum quia dolor sit amet, consectetur, adipisci velit, sed quia non numquam eius modi tempora incidunt ut labore et dolore magnam aliquam quaerat voluptatem. Ut enim ad minima veniam, quis nostrum exercitationem ullam corporis suscipit laboriosam, nisi ut aliquid ex ea commodi consequatur? Quis autem vel eum iure reprehenderit qui in ea voluptate velit esse quam nihil molestiae consequatur, vel illum qui dolorem eum fugiat quo voluptas nulla pariatur?&quot;</p>', '2023-07-25 01:45:37', '2023-07-25 01:45:37');

-- --------------------------------------------------------

--
-- بنية الجدول `area`
--

CREATE TABLE `area` (
  `id` int(11) NOT NULL,
  `city_id` int(11) NOT NULL,
  `area` varchar(255) NOT NULL,
  `is_deleted` int(11) NOT NULL DEFAULT 2 COMMENT '1=Yes,2=No',
  `is_available` int(11) NOT NULL DEFAULT 1 COMMENT '1=Yes,2=No	',
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `updated_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb3 COLLATE=utf8mb3_unicode_ci;

--
-- إرجاع أو استيراد بيانات الجدول `area`
--

INSERT INTO `area` (`id`, `city_id`, `area`, `is_deleted`, `is_available`, `created_at`, `updated_at`) VALUES
(1, 1, 'sharq', 2, 1, '2023-09-08 16:44:13', '2023-09-08 16:44:13');

-- --------------------------------------------------------

--
-- بنية الجدول `banner_image`
--

CREATE TABLE `banner_image` (
  `id` int(10) UNSIGNED NOT NULL,
  `vendor_id` int(11) NOT NULL,
  `banner_image` varchar(255) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- إرجاع أو استيراد بيانات الجدول `banner_image`
--

INSERT INTO `banner_image` (`id`, `vendor_id`, `banner_image`, `created_at`, `updated_at`) VALUES
(1, 3, 'banner-658263a5ae57a.jpg', '2023-09-08 21:56:37', '2023-12-20 06:46:45'),
(2, 5, 'banner-6579396507cf2.jpeg', '2023-12-13 07:56:05', '2023-12-13 07:56:05'),
(3, 24, 'banner-658351b669c23.jpg', '2023-12-20 23:42:30', '2023-12-20 23:42:30');

-- --------------------------------------------------------

--
-- بنية الجدول `blogs`
--

CREATE TABLE `blogs` (
  `id` int(10) UNSIGNED NOT NULL,
  `vendor_id` int(11) NOT NULL,
  `slug` varchar(255) NOT NULL,
  `title` varchar(255) NOT NULL,
  `image` varchar(255) NOT NULL,
  `description` longtext NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- إرجاع أو استيراد بيانات الجدول `blogs`
--

INSERT INTO `blogs` (`id`, `vendor_id`, `slug`, `title`, `image`, `description`, `created_at`, `updated_at`) VALUES
(1, 24, 'sadad', 'sadad', 'blog-658351e814ada.jpeg', '<p>addad</p>', '2023-12-20 23:43:20', '2023-12-20 23:43:20');

-- --------------------------------------------------------

--
-- بنية الجدول `branches`
--

CREATE TABLE `branches` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `vendor_id` int(10) UNSIGNED DEFAULT NULL,
  `name` text DEFAULT NULL,
  `deliveryarea_id` int(11) DEFAULT NULL,
  `is_active` tinyint(1) NOT NULL DEFAULT 1,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `latitude` varchar(255) DEFAULT NULL,
  `longitude` varchar(255) DEFAULT NULL,
  `address` text DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- إرجاع أو استيراد بيانات الجدول `branches`
--

INSERT INTO `branches` (`id`, `vendor_id`, `name`, `deliveryarea_id`, `is_active`, `created_at`, `updated_at`, `latitude`, `longitude`, `address`) VALUES
(1, 5, '{\"ar\":\"\\u0627\\u0644\\u0633\\u0627\\u0644\\u0645\\u064a\\u0629\",\"en\":\"Salmyia\"}', 4, 1, '2023-12-31 05:04:32', '2023-12-31 05:05:13', NULL, NULL, NULL),
(2, 5, '{\"ar\":\"\\u062d\\u0648\\u0644\\u064a\",\"en\":\"Hawalli\"}', 5, 1, '2023-12-31 05:04:56', '2023-12-31 05:04:56', NULL, NULL, NULL);

-- --------------------------------------------------------

--
-- بنية الجدول `carts`
--

CREATE TABLE `carts` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `vendor_id` int(11) NOT NULL,
  `user_id` int(11) DEFAULT NULL,
  `session_id` varchar(255) NOT NULL,
  `item_id` bigint(20) UNSIGNED NOT NULL,
  `item_name` varchar(255) DEFAULT NULL,
  `item_image` varchar(255) DEFAULT NULL,
  `item_price` varchar(255) NOT NULL,
  `tax` varchar(255) DEFAULT NULL,
  `extras_id` varchar(255) DEFAULT NULL,
  `extras_name` varchar(255) DEFAULT NULL,
  `extras_price` varchar(255) DEFAULT NULL,
  `qty` int(11) NOT NULL,
  `price` varchar(255) NOT NULL,
  `variants_id` varchar(255) DEFAULT NULL,
  `variants_name` varchar(255) DEFAULT NULL,
  `variants_price` varchar(255) DEFAULT NULL,
  `is_available` int(11) NOT NULL DEFAULT 1 COMMENT '1 = Yes . 2 = No',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- إرجاع أو استيراد بيانات الجدول `carts`
--

INSERT INTO `carts` (`id`, `vendor_id`, `user_id`, `session_id`, `item_id`, `item_name`, `item_image`, `item_price`, `tax`, `extras_id`, `extras_name`, `extras_price`, `qty`, `price`, `variants_id`, `variants_name`, `variants_price`, `is_available`, `created_at`, `updated_at`) VALUES
(4, 5, NULL, 'wWDBUGmxwvq3BoEwhCxzI20a4VsLIY7SiDBFbSlF', 3, 'zzzz', 'item-6500bee5abefc.jpg', '10', '10', NULL, NULL, NULL, 1, '10', NULL, NULL, NULL, 1, '2023-09-12 19:42:48', '2023-09-12 19:42:48'),
(5, 5, NULL, 'wWDBUGmxwvq3BoEwhCxzI20a4VsLIY7SiDBFbSlF', 2, 'products  Name', 'item-6500beae62e2b.jpg', '10', '10', NULL, NULL, NULL, 1, '10', NULL, NULL, NULL, 1, '2023-09-12 19:42:50', '2023-09-12 19:42:50'),
(6, 4, NULL, 'utvW0Yd4mXk5j7aJTTrh7H50ZGUqBOTcwroAks1z', 8, 'فلفل ألوان', 'item-6500ce1494802.jpg', '5', '0', NULL, NULL, NULL, 2, '5', NULL, NULL, NULL, 1, '2023-09-12 20:47:43', '2023-09-12 20:47:43'),
(7, 4, NULL, 'hLKXYORuoe2oFyIMzM9yDUTvR9uBmxhkApGtOyc6', 5, 'بطاطس', 'item-6500cdbb3572b.jpg', '5', '0', NULL, NULL, NULL, 1, '5', NULL, NULL, NULL, 1, '2023-09-12 21:04:26', '2023-09-12 21:04:26'),
(8, 4, NULL, 'LVNHf9Z2zf9k6ab6CSaYbbSTviuZ547j8upFk3Cg', 4, 'طماطم', 'item-6500cd9e7b58b.jpg', '5', '0', NULL, NULL, NULL, 3, '5', NULL, NULL, NULL, 1, '2023-09-12 21:23:40', '2023-09-12 21:23:40'),
(9, 4, NULL, 'LVNHf9Z2zf9k6ab6CSaYbbSTviuZ547j8upFk3Cg', 5, 'بطاطس', 'item-6500cdbb3572b.jpg', '5', '0', NULL, NULL, NULL, 1, '5', NULL, NULL, NULL, 1, '2023-09-12 21:51:06', '2023-09-12 21:51:06'),
(10, 4, NULL, 'hLKXYORuoe2oFyIMzM9yDUTvR9uBmxhkApGtOyc6', 5, 'بطاطس', 'item-6500cdbb3572b.jpg', '5', '0', NULL, NULL, NULL, 4, '5', NULL, NULL, NULL, 1, '2023-09-12 21:52:04', '2023-09-12 21:52:04'),
(11, 4, NULL, 'pn4BN331dyN0X6iPACkYAzHyE3ONWOflANcjwEGG', 11, 'خوخ', 'item-6500d0f903487.jpg', '5', '0', NULL, NULL, NULL, 1, '5', NULL, NULL, NULL, 1, '2023-09-13 14:26:52', '2023-09-13 14:26:52'),
(23, 4, NULL, 'Ih5o4pHOtYvnmmeRWCwsv5Rp74BX9DxgKUv7LbpN', 5, 'بطاطس', 'item-6500cdbb3572b.jpg', '5', '0', NULL, NULL, NULL, 4, '5', NULL, NULL, NULL, 1, '2023-09-15 18:43:45', '2023-09-15 18:43:45'),
(26, 5, NULL, 'J2pJ5bRR2elayslvw43DhgZAVdjnu9NEItCb9Nj2', 2, 'milk', 'item-6505422f057c1.png', '10', '0', NULL, NULL, NULL, 1, '10', NULL, NULL, NULL, 1, '2023-09-16 05:55:51', '2023-09-16 05:55:51'),
(27, 5, NULL, 'J2pJ5bRR2elayslvw43DhgZAVdjnu9NEItCb9Nj2', 3, 'bread', 'item-6500bee5abefc.jpg', '10', '0', NULL, NULL, NULL, 1, '10', NULL, NULL, NULL, 1, '2023-09-16 05:55:53', '2023-09-16 05:55:53'),
(28, 5, NULL, 'Qz4iBrgYaPzdms8ysUou7X75CcyHerNLyeA6sc1Z', 3, 'bread', 'item-6500bee5abefc.jpg', '10', '0', NULL, NULL, NULL, 1, '10', NULL, NULL, NULL, 1, '2023-09-16 06:17:34', '2023-09-16 06:17:34'),
(29, 5, NULL, 'wEpO6XuOzLUQsP7xp4SSQox1Rld9kNLDGXK3FbBc', 2, 'milk', 'item-6505422f057c1.png', '10', '0', NULL, NULL, NULL, 2, '10', NULL, NULL, NULL, 1, '2023-09-16 10:17:43', '2023-09-16 10:17:51'),
(30, 5, NULL, 'wEpO6XuOzLUQsP7xp4SSQox1Rld9kNLDGXK3FbBc', 3, 'bread', 'item-6500bee5abefc.jpg', '10', '0', NULL, NULL, NULL, 1, '10', NULL, NULL, NULL, 1, '2023-09-16 10:17:44', '2023-09-16 10:17:44'),
(31, 5, NULL, 'OpIqEyff6Grq7zfhyj2aGrmEYtUZtmXI4UwINyAr', 2, 'milk', 'item-6505422f057c1.png', '10', '0', NULL, NULL, NULL, 1, '10', NULL, NULL, NULL, 1, '2023-09-16 20:53:31', '2023-09-16 20:53:31'),
(32, 5, NULL, 'OpIqEyff6Grq7zfhyj2aGrmEYtUZtmXI4UwINyAr', 3, 'bread', 'item-6500bee5abefc.jpg', '10', '0', NULL, NULL, NULL, 1, '10', NULL, NULL, NULL, 1, '2023-09-16 20:53:32', '2023-09-16 20:53:32'),
(33, 5, NULL, '8OknwwbnSnSK7u5Vewtq5NH5PRLfMoBR18fwCpkj', 3, 'bread', 'item-6500bee5abefc.jpg', '10', '0', NULL, NULL, NULL, 1, '10', NULL, NULL, NULL, 1, '2023-09-18 19:05:17', '2023-09-18 19:05:17'),
(34, 5, NULL, '8OknwwbnSnSK7u5Vewtq5NH5PRLfMoBR18fwCpkj', 2, 'milk', 'item-6505422f057c1.png', '10', '0', NULL, NULL, NULL, 1, '10', NULL, NULL, NULL, 1, '2023-09-18 19:05:18', '2023-09-18 19:05:18'),
(35, 5, NULL, 'KtSsIX1hwoFXCnKSA3wZgiqleodrRbmJTyUTQGkE', 2, 'milk', 'item-6505422f057c1.png', '10', '0', NULL, NULL, NULL, 2, '10', NULL, NULL, NULL, 1, '2023-10-03 17:39:12', '2023-10-03 17:39:12'),
(36, 5, NULL, 'zZpCikNp3wSrJ9k032ZcqQYTgh01cwyyS7SZYwlM', 2, 'milk', 'item-651ecd16bdd67.jpg', '10', '0', NULL, NULL, NULL, 1, '10', NULL, NULL, NULL, 1, '2023-10-07 22:27:16', '2023-10-07 22:27:16'),
(37, 5, NULL, '3PVXfoRuxtZ8bUnTBYFz5tVMpNYCRkWe0SanS9sx', 2, 'milk', 'item-651ecd16bdd67.jpg', '10', '0', NULL, NULL, NULL, 1, '10', NULL, NULL, NULL, 1, '2023-10-07 22:34:43', '2023-10-07 22:34:43'),
(38, 5, NULL, 'Io8aMWZf0lcSQ2nB3SnR13ZLw05ConUxYedbXZX6', 2, 'milk', 'item-651ecd16bdd67.jpg', '10', '0', NULL, NULL, NULL, 1, '10', NULL, NULL, NULL, 1, '2023-10-09 18:00:07', '2023-10-09 18:00:07'),
(39, 5, NULL, '0Hfqr8XupSnxYNUz4wcMribG3MJlrXs6lV2vzKBv', 17, 'برجر', 'item-65200de99589f.jpg', '5', '0', NULL, NULL, NULL, 1, '5', NULL, NULL, NULL, 1, '2023-10-13 18:28:14', '2023-10-13 18:28:14'),
(42, 5, NULL, 'kOIDIj2bl07CgLFs8zy4CQBtVIHcbyiwU7tpemsP', 3, 'bread', 'item-651ecd41ec19f.jpg', '10', '0', '3', '10', '10', 1, '20', NULL, NULL, NULL, 1, '2023-10-14 20:17:14', '2023-10-14 20:17:14'),
(44, 5, NULL, '38CDrfYdge2odNw9K50mzmeSVvivOQliOlJFzG88', 17, 'برجر', 'item-65200de99589f.jpg', '5', '0', NULL, NULL, NULL, 1, '5', NULL, NULL, NULL, 1, '2023-10-14 20:34:59', '2023-10-14 20:34:59'),
(50, 5, NULL, 'JggP6IuXDkI9CR2XXE9A90i7f8ecMlS1fPLsToJ9', 2, 'milk', 'item-651ecd16bdd67.jpg', '10', '0', NULL, NULL, NULL, 1, '10', NULL, NULL, NULL, 1, '2023-10-16 13:17:47', '2023-10-16 13:17:47'),
(51, 5, NULL, 'JggP6IuXDkI9CR2XXE9A90i7f8ecMlS1fPLsToJ9', 2, 'milk', 'item-651ecd16bdd67.jpg', '10', '0', NULL, NULL, NULL, 1, '10', NULL, NULL, NULL, 1, '2023-10-16 13:17:48', '2023-10-16 13:17:48'),
(52, 5, NULL, 'JggP6IuXDkI9CR2XXE9A90i7f8ecMlS1fPLsToJ9', 17, 'برجر', 'item-65200de99589f.jpg', '5', '0', NULL, NULL, NULL, 1, '5', NULL, NULL, NULL, 1, '2023-10-16 13:17:50', '2023-10-16 13:17:50'),
(53, 5, NULL, '11KuLfK2IpWPoI9BQW0kWwtzu18axBKURyn5TCDG', 2, 'milk', 'item-651ecd16bdd67.jpg', '10', '0', NULL, NULL, NULL, 1, '10', NULL, NULL, NULL, 1, '2023-10-19 01:12:36', '2023-10-19 01:12:36'),
(54, 5, NULL, 'xXFWJgRkZXCdye30WkfryVDwFiZlgHQQHxZ8D3Bs', 3, 'bread', 'item-651ecd41ec19f.jpg', '10', '0', NULL, NULL, NULL, 1, '10', NULL, NULL, NULL, 1, '2023-10-20 17:55:48', '2023-10-20 17:55:48'),
(55, 5, NULL, 'xXFWJgRkZXCdye30WkfryVDwFiZlgHQQHxZ8D3Bs', 2, 'milk', 'item-651ecd16bdd67.jpg', '10', '0', NULL, NULL, NULL, 1, '10', NULL, NULL, NULL, 1, '2023-10-20 17:55:50', '2023-10-20 17:55:50'),
(56, 5, NULL, 'xXFWJgRkZXCdye30WkfryVDwFiZlgHQQHxZ8D3Bs', 3, 'bread', 'item-651ecd41ec19f.jpg', '10', '0', NULL, NULL, NULL, 1, '10', NULL, NULL, NULL, 1, '2023-10-20 18:06:35', '2023-10-20 18:06:35'),
(57, 5, NULL, 'xXFWJgRkZXCdye30WkfryVDwFiZlgHQQHxZ8D3Bs', 2, 'milk', 'item-651ecd16bdd67.jpg', '10', '0', NULL, NULL, NULL, 1, '10', NULL, NULL, NULL, 1, '2023-10-20 18:06:36', '2023-10-20 18:06:36'),
(58, 5, NULL, 'DRpu39MHNyBDj8TC1rD8AtJh7pOcwRQ0xlAZaL2V', 3, 'bread', 'item-651ecd41ec19f.jpg', '10', '0', NULL, NULL, NULL, 1, '10', NULL, NULL, NULL, 1, '2023-10-20 18:42:56', '2023-10-20 18:42:56'),
(60, 5, NULL, 'IB6QsL1O2TMguAK98B52NnLimlkeJAtm6FcBR5a5', 2, 'milk', 'item-651ecd16bdd67.jpg', '10', '0', NULL, NULL, NULL, 1, '10', NULL, NULL, NULL, 1, '2023-10-25 18:47:41', '2023-10-25 18:47:41'),
(61, 5, NULL, 'MPFgDs1hOgv3l7SgdA44CB5IQayY3VS5oIiYk6k7', 3, 'bread', 'item-651ecd41ec19f.jpg', '10', '0', NULL, NULL, NULL, 1, '10', NULL, NULL, NULL, 1, '2023-10-27 03:31:27', '2023-10-27 03:31:27'),
(62, 5, NULL, 'KAmaIaMly3PsFCWKnQAP0EAdm2gRKvUwXAhK2EPH', 2, 'milk', 'item-651ecd16bdd67.jpg', '10', '0', NULL, NULL, NULL, 1, '10', NULL, NULL, NULL, 1, '2023-10-29 05:10:40', '2023-10-29 05:10:40'),
(65, 5, NULL, 'jzZQxDgEYbnxmMalASyuU2GVg89NAYtFEhf9QKwb', 3, 'bread', 'item-651ecd41ec19f.jpg', '10', '0', NULL, NULL, NULL, 1, '10', NULL, NULL, NULL, 1, '2023-11-01 23:12:20', '2023-11-01 23:12:20'),
(66, 5, NULL, 'whdzk2vYw98h7JZQRuBp9K3D5qmIcrBeGOgsMy4N', 2, 'milk', 'item-651ecd16bdd67.jpg', '10', '0', NULL, NULL, NULL, 1, '10', NULL, NULL, NULL, 1, '2023-11-01 23:26:36', '2023-11-01 23:26:36'),
(68, 5, NULL, 'qp0l2UpelmQCmj6REj2Rh1mnNAvD39788w8ejwKf', 2, 'milk', 'item-651ecd16bdd67.jpg', '10', '0', NULL, NULL, NULL, 1, '10', NULL, NULL, NULL, 1, '2023-11-04 15:20:46', '2023-11-04 15:20:46'),
(71, 5, NULL, 'lKAwn3z4pVnrbRAVU1SccC0f1XM0SRBzs7mXVcIg', 17, 'برجر', 'item-65200de99589f.jpg', '5', '0', NULL, NULL, NULL, 1, '5', NULL, NULL, NULL, 1, '2023-11-05 04:48:47', '2023-11-05 04:48:47'),
(72, 5, NULL, 'lKAwn3z4pVnrbRAVU1SccC0f1XM0SRBzs7mXVcIg', 3, 'bread', 'item-651ecd41ec19f.jpg', '10', '0', NULL, NULL, NULL, 1, '10', NULL, NULL, NULL, 1, '2023-11-05 04:48:49', '2023-11-05 04:48:49'),
(73, 5, NULL, 'bpoDyMTOohuhGmQuNg4YGfPqyGM681exmAUZ17Mv', 2, 'milk', 'item-651ecd16bdd67.jpg', '10', '0', NULL, NULL, NULL, 1, '10', NULL, NULL, NULL, 1, '2023-11-09 01:21:10', '2023-11-09 01:21:10'),
(75, 5, 11, '', 2, 'milk', 'item-651ecd16bdd67.jpg', '10', '0', NULL, NULL, NULL, 1, '10', NULL, NULL, NULL, 1, '2023-11-14 07:14:20', '2023-11-14 07:14:20'),
(76, 5, 11, '', 17, 'برجر', 'item-65200de99589f.jpg', '5', '0', NULL, NULL, NULL, 1, '5', NULL, NULL, NULL, 1, '2023-11-14 07:14:30', '2023-11-14 07:14:30'),
(77, 5, NULL, 'zo2nbUQvRGx5rZo9UJqidkOxufKU0ywfr8WRGLcH', 2, 'milk', 'item-651ecd16bdd67.jpg', '10', '0', NULL, NULL, NULL, 1, '10', NULL, NULL, NULL, 1, '2023-11-17 23:41:16', '2023-11-17 23:41:16'),
(79, 5, NULL, 'a7p2PzgLQon5pqqa5gBCPQgWaxY25YoWtmwqU8UZ', 2, 'milk', 'item-651ecd16bdd67.jpg', '10', '0', NULL, NULL, NULL, 1, '10', NULL, NULL, NULL, 1, '2023-11-18 01:04:42', '2023-11-18 01:06:38'),
(81, 5, NULL, 'zo2nbUQvRGx5rZo9UJqidkOxufKU0ywfr8WRGLcH', 3, 'bread', 'item-651ecd41ec19f.jpg', '10', '0', NULL, NULL, NULL, 1, '10', NULL, NULL, NULL, 1, '2023-11-18 01:12:48', '2023-11-18 01:12:48'),
(82, 5, NULL, 'zo2nbUQvRGx5rZo9UJqidkOxufKU0ywfr8WRGLcH', 2, 'milk', 'item-651ecd16bdd67.jpg', '10', '0', NULL, NULL, NULL, 1, '10', NULL, NULL, NULL, 1, '2023-11-18 01:12:50', '2023-11-18 01:12:50'),
(83, 5, NULL, 'zo2nbUQvRGx5rZo9UJqidkOxufKU0ywfr8WRGLcH', 2, 'milk', 'item-651ecd16bdd67.jpg', '10', '0', NULL, NULL, NULL, 1, '10', NULL, NULL, NULL, 1, '2023-11-18 01:12:54', '2023-11-18 01:12:54'),
(86, 5, NULL, 'mn9lgOsgojJhn1Qr11wQXB4qTnlg92qm1PrM1DuW', 2, 'milk', 'item-651ecd16bdd67.jpg', '10', '0', NULL, NULL, NULL, 1, '10', NULL, NULL, NULL, 1, '2023-11-19 03:02:06', '2023-11-19 03:02:06'),
(87, 5, NULL, 'Vy2nRSSlWjCI4uMy4RvzvOUS72KMu4NtwUgFVia7', 2, 'milk', 'item-651ecd16bdd67.jpg', '10', '0', NULL, NULL, NULL, 1, '10', NULL, NULL, NULL, 1, '2023-11-19 03:03:15', '2023-11-19 03:03:15'),
(89, 5, 12, '', 3, 'bread', 'item-651ecd41ec19f.jpg', '10', '0', NULL, NULL, NULL, 1, '10', NULL, NULL, NULL, 1, '2023-11-20 02:49:35', '2023-11-20 02:49:35'),
(92, 5, NULL, 'hPtb6IrzpcCPN53d0AUFgOtB8imys5z19OXFpuQV', 2, 'milk', 'item-651ecd16bdd67.jpg', '5', '0', NULL, NULL, NULL, 1, '5', NULL, NULL, NULL, 1, '2023-11-21 18:51:57', '2023-11-21 18:51:57'),
(93, 5, NULL, 'aH6D8QPUUKjTGJZzs8spl0HAj3MtKxXjnFhHB11r', 2, 'milk', 'item-651ecd16bdd67.jpg', '5', '0', NULL, NULL, NULL, 1, '5', NULL, NULL, NULL, 1, '2023-11-21 19:35:17', '2023-11-21 19:35:17'),
(94, 5, NULL, 'HA7VQdLYw5r83lZHb6FQh3Usahdz9g7pz5ZnPMaF', 17, 'برجر', 'item-65200de99589f.jpg', '5', '0', NULL, NULL, NULL, 1, '5', NULL, NULL, NULL, 1, '2023-11-23 03:11:18', '2023-11-23 03:11:18'),
(95, 5, NULL, 'HA7VQdLYw5r83lZHb6FQh3Usahdz9g7pz5ZnPMaF', 17, 'برجر', 'item-65200de99589f.jpg', '5', '0', NULL, NULL, NULL, 1, '5', NULL, NULL, NULL, 1, '2023-11-23 03:11:20', '2023-11-23 03:11:20'),
(96, 5, NULL, 'AewzPkJ507zw6i7OuhpHNSIjxuvaBDQV5nYoxu2r', 3, 'bread', 'item-651ecd41ec19f.jpg', '10', '0', NULL, NULL, NULL, 2, '10', NULL, NULL, NULL, 1, '2023-11-24 10:19:55', '2023-11-24 10:20:11'),
(97, 5, NULL, '5zGI5qK7duYR0CxkwiN7tIie3pgsZKQbsjoLSm9R', 3, 'bread', 'item-651ecd41ec19f.jpg', '10', '0', NULL, NULL, NULL, 1, '10', NULL, NULL, NULL, 1, '2023-12-06 01:08:56', '2023-12-06 01:08:56'),
(98, 5, NULL, '5zGI5qK7duYR0CxkwiN7tIie3pgsZKQbsjoLSm9R', 2, 'milk', 'item-651ecd16bdd67.jpg', '5', '0', NULL, NULL, NULL, 1, '5', NULL, NULL, NULL, 1, '2023-12-06 01:08:59', '2023-12-06 01:08:59'),
(99, 5, 15, '', 3, 'bread', 'item-651ecd41ec19f.jpg', '10', '0', NULL, NULL, NULL, 1, '10', NULL, NULL, NULL, 1, '2023-12-06 03:27:58', '2023-12-06 03:27:58'),
(100, 5, NULL, 'S6e3b2WPyJUtZEueUuZOrm79m2IrJwDbnkpl9BFq', 17, 'برجر', 'item-65200de99589f.jpg', '5', '0', NULL, NULL, NULL, 1, '5', NULL, NULL, NULL, 1, '2023-12-06 14:22:03', '2023-12-06 14:22:03'),
(101, 5, NULL, 'NiHbiuw4Rt02zDmGs6m5h4iv4PGp7rT0vxRSBwAY', 3, 'bread', 'item-651ecd41ec19f.jpg', '10', '0', NULL, NULL, NULL, 1, '10', NULL, NULL, NULL, 1, '2023-12-06 17:33:06', '2023-12-06 17:33:06'),
(102, 5, NULL, '2Z0L6CsMuDheA6DfTQ9E8DrDUEX7qXMQONPlLdoy', 3, 'bread', 'item-651ecd41ec19f.jpg', '10', '0', NULL, NULL, NULL, 1, '10', NULL, NULL, NULL, 1, '2023-12-06 17:33:18', '2023-12-06 17:33:18'),
(103, 5, NULL, 'LZBu0XhOFUOOSIlMKz0YGXLnm3H5zjNRN1lOpeOU', 3, 'bread', 'item-651ecd41ec19f.jpg', '10', '0', NULL, NULL, NULL, 1, '10', NULL, NULL, NULL, 1, '2023-12-07 00:45:30', '2023-12-07 00:45:30'),
(105, 5, NULL, 'LZBu0XhOFUOOSIlMKz0YGXLnm3H5zjNRN1lOpeOU', 3, 'bread', 'item-651ecd41ec19f.jpg', '10', '0', NULL, NULL, NULL, 1, '10', NULL, NULL, NULL, 1, '2023-12-07 00:45:36', '2023-12-07 00:45:36'),
(106, 5, NULL, 'Z6iT4h0nQVXQSUvgv5lBbjbkcNAblD5H8KiN1ZwY', 3, 'bread', 'item-651ecd41ec19f.jpg', '10', '0', NULL, NULL, NULL, 1, '10', NULL, NULL, NULL, 1, '2023-12-08 23:05:21', '2023-12-08 23:05:21'),
(107, 5, NULL, 'DAnxOZ1vOtCudKVCuC3P2rnnGGtRUQSdMqw9XutT', 2, 'milk', 'item-651ecd16bdd67.jpg', '5', '0', NULL, NULL, NULL, 1, '5', NULL, NULL, NULL, 1, '2023-12-10 21:23:17', '2023-12-10 21:23:17'),
(109, 5, NULL, 'loCrnfa6xd301K1xB8PlNGTnR7moygN5rGv2HvO1', 3, 'bread', 'item-651ecd41ec19f.jpg', '10', '0', NULL, NULL, NULL, 1, '10', NULL, NULL, NULL, 1, '2023-12-12 22:01:06', '2023-12-12 22:01:06'),
(112, 5, NULL, 'GktfFzhQVxFSoeRh1pOgl9QYxoy4BYhOobniNhnB', 3, 'bread', 'item-651ecd41ec19f.jpg', '10', '0', NULL, NULL, NULL, 1, '10', NULL, NULL, NULL, 1, '2023-12-12 22:34:26', '2023-12-12 22:34:26'),
(113, 5, NULL, '2BjqaKzBFLMohwgASTEhyC8IJG1I1BNgaoMjmV8R', 3, 'برجر لحم', 'item-6579363acd741.jpg', '10', '0', NULL, NULL, NULL, 1, '10', NULL, NULL, NULL, 1, '2023-12-14 00:03:23', '2023-12-14 00:03:23'),
(114, 5, 17, '', 2, 'برجر', 'item-6578d2914b008.jpg', '5', '0', NULL, NULL, NULL, 1, '5', NULL, NULL, NULL, 1, '2023-12-14 00:24:26', '2023-12-14 00:24:26'),
(115, 5, NULL, '2BjqaKzBFLMohwgASTEhyC8IJG1I1BNgaoMjmV8R', 21, 'pasta', 'item-657a1fe55809a.jpg', '5', '0', NULL, NULL, NULL, 1, '5', NULL, NULL, NULL, 1, '2023-12-14 00:40:45', '2023-12-14 00:40:45'),
(116, 5, NULL, '2BjqaKzBFLMohwgASTEhyC8IJG1I1BNgaoMjmV8R', 20, 'beef burger', 'item-657a1dd340a7d.jpg', '5', '0', NULL, NULL, NULL, 1, '5', NULL, NULL, NULL, 1, '2023-12-14 00:41:59', '2023-12-14 00:41:59'),
(118, 5, NULL, 'pgxlyHF9S2VBqdHVDXTPXVr5QCVkGpEgBx09MFqU', 20, 'beef burger', 'item-657a1dd340a7d.jpg', '5', '0', NULL, NULL, NULL, 1, '5', NULL, NULL, NULL, 1, '2023-12-14 13:53:59', '2023-12-14 13:53:59'),
(119, 5, NULL, 'AXr69y20tgUhREnA1EZEYDsd8uBCGgiWmJf0dSpe', 20, 'beef burger', 'item-657a1dd340a7d.jpg', '5', '0', NULL, NULL, NULL, 1, '5', NULL, NULL, NULL, 1, '2023-12-15 00:40:57', '2023-12-15 00:40:57'),
(120, 5, NULL, 'AXr69y20tgUhREnA1EZEYDsd8uBCGgiWmJf0dSpe', 3, 'beef burger', 'item-6579363acd741.jpg', '10', '0', NULL, NULL, NULL, 1, '10', NULL, NULL, NULL, 1, '2023-12-15 00:41:04', '2023-12-15 00:41:04'),
(121, 5, NULL, 'AXr69y20tgUhREnA1EZEYDsd8uBCGgiWmJf0dSpe', 3, 'beef burger', 'item-6579363acd741.jpg', '10', '0', NULL, NULL, NULL, 1, '10', NULL, NULL, NULL, 1, '2023-12-15 00:41:12', '2023-12-15 00:41:12'),
(122, 5, NULL, 'AXr69y20tgUhREnA1EZEYDsd8uBCGgiWmJf0dSpe', 3, 'beef burger', 'item-6579363acd741.jpg', '10', '0', NULL, NULL, NULL, 2, '10', NULL, NULL, NULL, 1, '2023-12-15 00:41:15', '2023-12-15 00:41:43'),
(128, 3, NULL, 'XGqqE447NoQQIIJtVbEV7mIXoa93ObOY38BKgjLC', 38, 'kunafa', 'item-65824f6eca466.jpg', '8', '0', NULL, NULL, NULL, 1, '8', NULL, NULL, NULL, 1, '2023-12-20 05:45:07', '2023-12-20 05:45:07'),
(130, 3, NULL, 'XGqqE447NoQQIIJtVbEV7mIXoa93ObOY38BKgjLC', 41, 'coockies', 'item-658250913d18a.jpg', '8', '0', NULL, NULL, NULL, 1, '8', NULL, NULL, NULL, 1, '2023-12-20 05:52:16', '2023-12-20 05:52:16'),
(133, 5, NULL, '443BUUBhqDrfpFDddkE1LHdMs3Qq93lIsKWbhZwa', 21, 'pasta', 'item-657a1fe55809a.jpg', '5', '0', NULL, NULL, NULL, 1, '5', NULL, NULL, NULL, 1, '2023-12-20 23:31:07', '2023-12-20 23:31:07'),
(134, 5, NULL, 'T8yD1akUmb6OFEuDnIJSeHOy304AubnEbmUSvU4F', 2, 'box', 'item-6578d2914b008.jpg', '5', '0', NULL, NULL, NULL, 1, '5', NULL, NULL, NULL, 1, '2023-12-21 18:33:54', '2023-12-21 18:33:54'),
(135, 5, NULL, 'pjzTihk00NiwPMkqFKgGcaW7ULzBNaoAam6NlxSW', 19, 'Chicken burger', 'item-6578dc1b3e77b.jpg', '7', '0', '4, 5, 6', '[object Object], [object Object], [object Object]', '0.25, 0.25, 0.25', 1, '0.75', '6', '[object Object]', '0', 1, '2023-12-23 03:12:42', '2023-12-23 03:12:42'),
(136, 5, NULL, 'pjzTihk00NiwPMkqFKgGcaW7ULzBNaoAam6NlxSW', 19, 'Chicken burger', 'item-6578dc1b3e77b.jpg', '7', '0', NULL, NULL, NULL, 1, '7', '5', '[object Object]', '7', 1, '2023-12-23 03:13:38', '2023-12-23 03:13:38'),
(137, 5, NULL, 'pUXZfPAh7C7zZQ60IXh4oVgPta86lgAAuMWl9dSl', 49, 'دبل برجر', 'item-65870dbf87d6d.jpg', '7', '0', NULL, NULL, NULL, 1, '7', '7', 'big', '7', 1, '2023-12-23 23:06:07', '2023-12-23 23:06:07'),
(138, 18, NULL, 'ZFCLaksQimO6ejEHCV1o758fxoiHN3ZaS0ircBwm', 53, 'بصل احمر', 'item-6588109d58743.JPG', '32', '0', NULL, NULL, NULL, 2, '32', NULL, NULL, NULL, 1, '2023-12-24 19:06:20', '2023-12-24 19:07:03'),
(139, 5, NULL, 'Q6NUObZIarn89p9utZZr4j2AOQEmz0RhvJSYnolP', 3, 'beef burger', 'item-6579363acd741.jpg', '10', '0', NULL, NULL, NULL, 1, '10', NULL, NULL, NULL, 1, '2023-12-26 03:53:33', '2023-12-26 03:53:33'),
(140, 5, NULL, 'dhXGHNJkQsCTim9FjDdDZvWCmY9WpL7UrInX0ecB', 20, 'beef burger', 'item-657a1dd340a7d.jpg', '5', '0', NULL, NULL, NULL, 1, '5', NULL, NULL, NULL, 1, '2023-12-26 12:29:16', '2023-12-26 12:29:16'),
(141, 5, NULL, 'dhXGHNJkQsCTim9FjDdDZvWCmY9WpL7UrInX0ecB', 3, 'beef burger', 'item-6579363acd741.jpg', '10', '0', NULL, NULL, NULL, 1, '10', NULL, NULL, NULL, 1, '2023-12-26 12:30:42', '2023-12-26 12:30:42'),
(142, 5, NULL, 'jRW8fwr71m9aWnt2vUXDV42sXyJ664Juyv0DEIpN', 17, 'Chicken burger', 'item-6578d3e32a2b1.jpg', '5', '0', NULL, NULL, NULL, 1, '5', NULL, NULL, NULL, 1, '2023-12-26 18:51:36', '2023-12-26 18:51:36'),
(143, 5, NULL, 'o8EfWP1Kd4PpGpmRgEBQM19a5DzNNAEE57jCu5DI', 3, 'beef burger', 'item-6579363acd741.jpg', '10', '0', NULL, NULL, NULL, 1, '10', NULL, NULL, NULL, 1, '2024-01-01 00:02:04', '2024-01-01 00:02:04'),
(144, 5, NULL, '65IXiYzdqVUzkcNUzdyVTfVter6ZdfR7EczZfEA8', 3, 'beef burger', 'item-6579363acd741.jpg', '10', '0', NULL, NULL, NULL, 1, '10', NULL, NULL, NULL, 1, '2024-01-01 00:08:50', '2024-01-01 00:08:50'),
(145, 5, NULL, 'HbcuJziL60BpXmwIGv7pu0p8dw3VETU3Uyak7P9X', 2, 'box', 'item-6578d2914b008.jpg', '5', '0', NULL, NULL, NULL, 1, '5', NULL, NULL, NULL, 1, '2024-01-01 00:12:08', '2024-01-01 00:12:08'),
(146, 5, NULL, 'XsZTKYX9u9Ko8lleww5BKuU3vjLzgE8ZhDNW8Iwv', 3, 'beef burger', 'item-6579363acd741.jpg', '10', '0', NULL, NULL, NULL, 1, '10', NULL, NULL, NULL, 1, '2024-01-05 14:16:40', '2024-01-05 14:16:40'),
(147, 5, NULL, 'OZzEakZHUPm2H9xy4YlfWuxlilCRgjjbgji017AK', 3, 'beef burger', 'item-6579363acd741.jpg', '10', '0', NULL, NULL, NULL, 1, '10', NULL, NULL, NULL, 1, '2024-01-07 22:22:44', '2024-01-07 22:22:44'),
(148, 5, NULL, '3LHL1hHx3dInXwccNLXfYXJVEhCc6sv1gs9u51Z7', 20, 'beef burger', 'item-657a1dd340a7d.jpg', '5', '0', NULL, NULL, NULL, 1, '5', NULL, NULL, NULL, 1, '2024-01-08 07:16:33', '2024-01-08 07:16:33'),
(149, 5, NULL, 'yimCjnebVMPvjcycI6PNotl69dqM69yMGK3ryn8Q', 2, 'box', 'item-6578d2914b008.jpg', '5', '0', NULL, NULL, NULL, 1, '5', NULL, NULL, NULL, 1, '2024-01-10 21:42:40', '2024-01-10 21:42:40');

-- --------------------------------------------------------

--
-- بنية الجدول `categories`
--

CREATE TABLE `categories` (
  `id` int(10) UNSIGNED NOT NULL,
  `vendor_id` int(11) NOT NULL,
  `reorder_id` int(11) NOT NULL,
  `name` varchar(255) NOT NULL,
  `slug` varchar(255) NOT NULL,
  `image` text DEFAULT NULL,
  `is_available` tinyint(1) NOT NULL DEFAULT 1 COMMENT '1=Yes,2=No',
  `is_deleted` tinyint(1) NOT NULL DEFAULT 2 COMMENT '1=Yes,2=No',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- إرجاع أو استيراد بيانات الجدول `categories`
--

INSERT INTO `categories` (`id`, `vendor_id`, `reorder_id`, `name`, `slug`, `image`, `is_available`, `is_deleted`, `created_at`, `updated_at`) VALUES
(1, 3, 0, '{\"ar\":\"برجر\",\"en\":\"Eastern sweets\"}', 'eastern-sweets-ELPN1', 'category-64fb973cdeb5c.jpg', 1, 2, '2023-09-08 21:50:52', '2023-12-20 05:01:41'),
(2, 5, 0, '{\"ar\":\"برجر\",\"en\":\"burger\"}', 'burger-GFG0F', 'category-65793a6bcff7c.jpg', 1, 2, '2023-09-12 19:40:02', '2023-12-21 22:15:55'),
(3, 4, 0, '{\"ar\":\"خضار\",\"en\":\"burger\"}', 'khdar-xc8yO', 'category-6500ca305d5ef.png', 1, 2, '2023-09-12 20:29:36', '2023-09-12 20:29:36'),
(4, 4, 0, '{\"ar\":\"فاكهة\",\"en\":\"burger\"}', 'fakh-CmicO', 'category-6500ca3d6903f.png', 1, 2, '2023-09-12 20:29:49', '2023-09-12 20:29:49'),
(5, 5, 0, '{\"ar\":\"\\u062f\\u062c\\u0627\\u062c\",\"en\":\"chicken\"}', 'chicken-Zd465', 'category-65793a7a2dadd.jpg', 1, 2, '2023-10-06 13:33:31', '2023-12-21 22:17:13'),
(6, 5, 0, 'test 3', 'test-3-ljiqF', 'category-65200cc962406.png', 1, 1, '2023-10-06 13:34:01', '2023-12-13 07:57:06'),
(7, 5, 0, 'test 4', 'test-4-ZBmUr', 'category-65200cdb73270.png', 1, 1, '2023-10-06 13:34:19', '2023-12-13 07:57:10'),
(8, 5, 0, 'test 5', 'test-5-RPDa1', 'category-657375e3e64ac.png', 1, 1, '2023-12-08 23:00:35', '2023-12-13 07:59:52'),
(9, 5, 0, '{\"ar\":\"فاكهة\",\"en\":\"test 6\"}', 'test-6-GI8Uu', 'category-6573761b67ba4.jpg', 1, 1, '2023-12-08 23:01:31', '2023-12-13 08:00:04'),
(10, 5, 0, '{\"ar\":\"\\u0644\\u062d\\u0645\",\"en\":\"beef\"}', 'beef-QG0s4', 'category-65793a89b98ab.jpg', 1, 2, '2023-12-08 23:02:37', '2023-12-21 22:17:22'),
(11, 5, 0, '{\"ar\":\"\\u0628\\u064a\\u062a\\u0632\\u0627\",\"en\":\"pizza\"}', 'pizza-Wp59e', 'category-657a1e1ea1d16.jpg', 1, 2, '2023-12-14 00:11:58', '2023-12-21 22:17:33'),
(12, 5, 0, '{\"ar\":\"\\u0645\\u0643\\u0631\\u0648\\u0646\\u0629\",\"en\":\"pasta\"}', 'pasta-dPIsZ', 'category-657a1eaa661ad.jpeg', 1, 2, '2023-12-14 00:14:18', '2023-12-21 22:17:43'),
(13, 5, 0, '{\"ar\":\"\\u0634\\u0627\\u0648\\u0631\\u0645\\u0627\",\"en\":\"shawarma\"}', 'shawarma-5t66D', 'category-657a1ec33d1c2.jpeg', 1, 2, '2023-12-14 00:14:43', '2023-12-21 22:18:27'),
(14, 5, 0, '{\"ar\":\"\\u0645\\u0634\\u0631\\u0648\\u0628\\u0627\\u062a\",\"en\":\"Drinks\"}', 'drinks-QTM8B', 'category-657a1ef70b1c8.jpeg', 1, 2, '2023-12-14 00:15:35', '2023-12-21 22:18:38'),
(15, 18, 0, '{\"ar\":\"\\u062e\\u0636\\u0631\\u0648\\u0627\\u062a\",\"en\":\"Vegetables\"}', 'vegetables-lfFUU', 'category-657a28e3638f8.JPG', 1, 2, '2023-12-14 00:57:55', '2023-12-23 01:25:04'),
(16, 19, 0, 'Eastern sweets', 'eastern-sweets-4paC0', 'category-6581bb676d570.jpeg', 1, 2, '2023-12-19 18:48:55', '2023-12-19 18:48:55'),
(17, 19, 0, 'Western sweets', 'western-sweets-ZlLXF', 'category-6581bc135c45d.jpg', 1, 2, '2023-12-19 18:51:47', '2023-12-19 18:51:47'),
(18, 19, 0, 'birthdays', 'birthdays-6fd91', 'category-6581bc65151c0.jpeg', 1, 2, '2023-12-19 18:53:09', '2023-12-19 18:53:09'),
(19, 19, 0, 'coockies', 'coockies-jcFXN', 'category-6581bc7b0167c.jpeg', 1, 2, '2023-12-19 18:53:31', '2023-12-19 18:53:31'),
(20, 19, 0, 'cupcake', 'cupcake-LnWBd', 'category-6581bca93a7ec.jpg', 1, 2, '2023-12-19 18:54:17', '2023-12-19 18:54:17'),
(21, 19, 0, 'cheesecake', 'cheesecake-hlFbk', 'category-6581bcbd50a80.jpeg', 1, 2, '2023-12-19 18:54:37', '2023-12-19 18:54:37'),
(22, 18, 0, '{\"ar\":\"\\u0641\\u0648\\u0627\\u0643\\u0629\",\"en\":\"Fruits\"}', 'fruits-0mz49', 'category-658219988c675.jpg', 1, 2, '2023-12-20 01:30:48', '2023-12-23 01:25:36'),
(23, 18, 0, 'جاهز', 'gahz-LhhgN', 'category-658219b138ff9.jpg', 1, 2, '2023-12-20 01:31:13', '2023-12-20 01:31:13'),
(24, 18, 0, 'عروض', 'aarod-t42bl', 'category-658219d11a4ac.jpeg', 1, 2, '2023-12-20 01:31:45', '2023-12-20 01:31:45'),
(25, 3, 0, '{\"ar\":\"\\u062d\\u0644\\u0648\\u064a\\u0627\\u062a \\u063a\\u0631\\u0628\\u064a\\u0629\",\"en\":\"Western sweets\"}', 'western-sweets-4IaZp', 'category-65824b16ac5a2.jpeg', 1, 2, '2023-12-20 05:01:58', '2023-12-21 22:21:46'),
(26, 3, 0, '{\"ar\":\"\\u062d\\u0641\\u0644\\u0627\\u062a\",\"en\":\"Birthday\"}', 'birthday-nREvk', 'category-65824b38167a9.jpeg', 1, 2, '2023-12-20 05:02:32', '2023-12-21 22:22:16'),
(27, 3, 0, '{\"ar\":\"\\u0643\\u0648\\u0643\\u064a\\u0632\",\"en\":\"Coockies\"}', 'coockies-eWfSq', 'category-65824b5ee1363.jpeg', 1, 2, '2023-12-20 05:03:10', '2023-12-21 22:22:56'),
(28, 3, 0, '{\"ar\":\"\\u0643\\u0628 \\u0643\\u064a\\u0643\",\"en\":\"cup cake\"}', 'cup-cake-X8nON', 'category-65824b76cc14b.jpeg', 1, 2, '2023-12-20 05:03:34', '2023-12-21 22:23:19'),
(29, 3, 0, '{\"ar\":\"\\u062a\\u0634\\u064a\\u0632 \\u0643\\u064a\\u0643\",\"en\":\"Cheese cake\"}', 'cheese-cake-qSJ6S', 'category-65824b89eff35.jpeg', 1, 2, '2023-12-20 05:03:53', '2023-12-21 22:23:41'),
(30, 3, 0, '{\"ar\":\"\\u062c\\u064a\\u0644\\u064a\",\"en\":\"jelly\"}', 'jelly-1KxLI', 'category-6582518cb97c3.jpeg', 1, 2, '2023-12-20 05:29:32', '2023-12-21 22:23:58'),
(31, 20, 0, 'qqqq', 'qqqq-12eMI', 'category-65834ed0500c0.jpeg', 1, 2, '2023-12-20 23:30:08', '2023-12-20 23:30:08'),
(32, 24, 0, 'cupcake', 'cupcake-v1IkA', 'category-6583517dac77d.jpeg', 1, 2, '2023-12-20 23:41:33', '2023-12-20 23:41:33'),
(33, 25, 0, '{\"ar\":\"sss\",\"en\":\"sss\"}', 'sss-rEqyF', 'category-658d9672a5d99.jpg', 1, 2, '2023-12-28 18:38:26', '2023-12-28 18:38:26');

-- --------------------------------------------------------

--
-- بنية الجدول `city`
--

CREATE TABLE `city` (
  `id` int(11) NOT NULL,
  `name` varchar(255) NOT NULL,
  `is_deleted` int(11) NOT NULL DEFAULT 2 COMMENT '1=Yes,2=No',
  `is_available` int(11) NOT NULL DEFAULT 1 COMMENT '1=Yes,2=No',
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `updated_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb3 COLLATE=utf8mb3_unicode_ci;

--
-- إرجاع أو استيراد بيانات الجدول `city`
--

INSERT INTO `city` (`id`, `name`, `is_deleted`, `is_available`, `created_at`, `updated_at`) VALUES
(1, 'kuwait city', 2, 1, '2023-09-08 16:43:58', '2023-09-08 17:26:07'),
(2, 'Hawalli', 2, 1, '2023-09-08 17:26:24', '2023-09-08 17:26:24'),
(3, 'Al-Jahraa', 2, 1, '2023-09-08 17:26:41', '2023-09-08 17:26:41'),
(4, 'Mubarak Al-Kabier', 2, 1, '2023-09-08 17:27:20', '2023-09-08 17:27:20'),
(5, 'Farwaniya', 2, 1, '2023-09-08 17:27:37', '2023-09-08 17:27:37'),
(6, 'Al-Ahmadi', 2, 1, '2023-09-08 17:27:53', '2023-09-08 17:27:53');

-- --------------------------------------------------------

--
-- بنية الجدول `contacts`
--

CREATE TABLE `contacts` (
  `id` int(10) UNSIGNED NOT NULL,
  `vendor_id` int(11) NOT NULL,
  `name` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `mobile` varchar(255) NOT NULL,
  `message` longtext NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- بنية الجدول `coupons`
--

CREATE TABLE `coupons` (
  `id` int(11) NOT NULL,
  `vendor_id` int(11) NOT NULL,
  `name` varchar(255) NOT NULL,
  `code` varchar(255) NOT NULL,
  `type` int(11) DEFAULT NULL,
  `price` varchar(255) NOT NULL,
  `active_from` varchar(255) NOT NULL,
  `active_to` varchar(255) NOT NULL,
  `limit` int(11) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `updated_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- إرجاع أو استيراد بيانات الجدول `coupons`
--

INSERT INTO `coupons` (`id`, `vendor_id`, `name`, `code`, `type`, `price`, `active_from`, `active_to`, `limit`, `created_at`, `updated_at`) VALUES
(1, 5, 'milk', '123456', NULL, '10', '2023-01-01', '2024-01-01', 4, '2023-09-16 05:51:59', '2023-12-12 23:13:14');

-- --------------------------------------------------------

--
-- بنية الجدول `coupon_items`
--

CREATE TABLE `coupon_items` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `coupon_id` int(11) NOT NULL COMMENT 'onDelete cascade',
  `item_id` int(11) NOT NULL COMMENT 'onDelete cascade',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- بنية الجدول `custom_domain`
--

CREATE TABLE `custom_domain` (
  `id` int(11) NOT NULL,
  `vendor_id` int(11) NOT NULL,
  `requested_domain` text NOT NULL,
  `current_domain` text DEFAULT NULL,
  `status` int(11) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `updated_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- إرجاع أو استيراد بيانات الجدول `custom_domain`
--

INSERT INTO `custom_domain` (`id`, `vendor_id`, `requested_domain`, `current_domain`, `status`, `created_at`, `updated_at`) VALUES
(2, 19, '2no.birds.re', '-', 1, '2023-12-19 22:52:47', '2024-01-07 23:50:02'),
(3, 3, 'food-control.org', '-', 1, '2023-12-23 17:55:49', '2024-01-07 23:49:56'),
(4, 5, '-', 'test.birds.re', 2, '2023-12-31 23:58:20', '2024-01-08 19:41:47'),
(5, 18, '-', 'chapatikumar.com', 2, '2024-01-07 23:59:34', '2024-01-08 01:11:58');

-- --------------------------------------------------------

--
-- بنية الجدول `deliveryareas`
--

CREATE TABLE `deliveryareas` (
  `id` int(11) NOT NULL,
  `vendor_id` int(11) NOT NULL,
  `name` varchar(255) NOT NULL,
  `price` float NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `updated_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `delivery_time` varchar(255) DEFAULT NULL,
  `coordinates` text DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- إرجاع أو استيراد بيانات الجدول `deliveryareas`
--

INSERT INTO `deliveryareas` (`id`, `vendor_id`, `name`, `price`, `created_at`, `updated_at`, `delivery_time`, `coordinates`) VALUES
(1, 3, 'ahmad', 2, '2023-09-08 22:10:23', '2023-09-08 22:10:23', NULL, NULL),
(2, 4, 'منطقه ك', 10, '2023-09-13 20:11:05', '2023-09-13 20:11:05', NULL, NULL),
(3, 4, 'منطقه ك', 10, '2023-09-13 20:11:06', '2023-09-13 20:11:06', NULL, NULL),
(4, 5, 'ابو حليفة', 0.25, '2023-10-09 18:04:56', '2023-12-06 03:07:36', '(20m)', '[{\"lat\":30.1859567412175,\"lng\":31.54963787875902},{\"lat\":30.08960863365854,\"lng\":30.946119392736072},{\"lat\":29.99234884837257,\"lng\":31.018024052007313},{\"lat\":30.040136212402064,\"lng\":31.238244140966053},{\"lat\":30.031219634140747,\"lng\":31.30669411502611},{\"lat\":29.970714341296105,\"lng\":32.33179148517382}]'),
(5, 5, 'ayoun', 0.25, '2023-10-15 10:31:51', '2023-12-06 02:58:32', '(50m)', '[{\"lat\":30.199730630021882,\"lng\":31.95975088929304},{\"lat\":30.18489321131604,\"lng\":31.873748539439525},{\"lat\":30.159812893173775,\"lng\":31.89760947083601}]'),
(6, 5, 'سلوى', 0.25, '2023-12-08 22:51:27', '2023-12-08 22:54:06', '20', '[{\"lat\":29.331272468306093,\"lng\":48.08011982829714},{\"lat\":29.3302087845682,\"lng\":48.08136591998516},{\"lat\":29.328693503286445,\"lng\":48.08318982211529},{\"lat\":29.327571058191296,\"lng\":48.08439145175396},{\"lat\":29.326396360065413,\"lng\":48.08520000830515},{\"lat\":29.324931314435297,\"lng\":48.085307470549424},{\"lat\":29.32462502760251,\"lng\":48.08423559038806},{\"lat\":29.32556042639222,\"lng\":48.08133880465198},{\"lat\":29.326140369333658,\"lng\":48.07775537340808},{\"lat\":29.327711811052374,\"lng\":48.07796995012927},{\"lat\":29.329067389445974,\"lng\":48.07859222262073},{\"lat\":29.329609898157692,\"lng\":48.07887117235828},{\"lat\":29.330582665172145,\"lng\":48.079622190882446}]'),
(7, 5, 'المشروع الأمريكي', 5, '2023-12-12 22:03:51', '2023-12-12 22:04:34', '30', '[{\"lat\":29.8558442761826,\"lng\":31.30078478755263},{\"lat\":29.831127371020333,\"lng\":31.254779538529192},{\"lat\":29.80312734633798,\"lng\":31.28876849116591},{\"lat\":29.815323702830458,\"lng\":31.333909422293686},{\"lat\":29.83885329358532,\"lng\":31.32978954924681}]'),
(8, 18, 'جبن', 5, '2023-12-14 00:58:15', '2023-12-14 00:58:15', '30', NULL),
(9, 5, 'sss', 5, '2023-12-20 23:31:55', '2023-12-20 23:32:57', '30', '[{\"lat\":29.34956669684187,\"lng\":48.09335215532414},{\"lat\":29.345077761552375,\"lng\":48.078245954152266},{\"lat\":29.33984042046911,\"lng\":48.05764658891789},{\"lat\":29.342533943781966,\"lng\":48.05009348833195},{\"lat\":29.347022991122913,\"lng\":48.040308789845625},{\"lat\":29.349865952163526,\"lng\":48.034300641652266},{\"lat\":29.352738282487014,\"lng\":48.030180378489845},{\"lat\":29.353636017869178,\"lng\":48.02228395515},{\"lat\":29.344848854146527,\"lng\":48.004705341104895},{\"lat\":29.341117055603675,\"lng\":48.00061192806365},{\"lat\":29.322559971291174,\"lng\":48.01211324031951},{\"lat\":29.30759212114438,\"lng\":48.02309956844451},{\"lat\":29.310735551798036,\"lng\":48.04575887020232},{\"lat\":29.317770498134497,\"lng\":48.05743184383513},{\"lat\":29.32315863962507,\"lng\":48.06515660579802},{\"lat\":29.32630159073161,\"lng\":48.07528462703826},{\"lat\":29.324056635537893,\"lng\":48.08627095516326},{\"lat\":29.32345797247443,\"lng\":48.089360859948414},{\"lat\":29.344409088752982,\"lng\":48.097085621911305}]'),
(10, 5, 'salmyia', 0.5, '2023-12-31 05:05:53', '2023-12-31 05:06:22', '30', '[{\"lat\":29.354015759503486,\"lng\":48.093893341057885},{\"lat\":29.351023288620308,\"lng\":48.0781004943782},{\"lat\":29.34563661954455,\"lng\":48.06024771117507},{\"lat\":29.341895709602458,\"lng\":48.04582815551101},{\"lat\":29.362219978546428,\"lng\":48.03269498539575},{\"lat\":29.347327338975244,\"lng\":48.00042264652856},{\"lat\":29.319694948417407,\"lng\":48.00967757807949},{\"lat\":29.311312987461115,\"lng\":48.016544033157615},{\"lat\":29.307421128687366,\"lng\":48.05310790644863},{\"lat\":29.307499980722454,\"lng\":48.095770354004074},{\"lat\":29.329202666633456,\"lng\":48.10933160278337},{\"lat\":29.339977457123588,\"lng\":48.11310815307634},{\"lat\":29.351648861682804,\"lng\":48.109503264160324},{\"lat\":29.355539032804113,\"lng\":48.101263518066574}]'),
(11, 5, 'mostafa', 10, '2023-12-31 23:19:49', '2023-12-31 23:19:49', '33333', '[{\"lat\":25.99780409375245,\"lng\":55.31811702789019},{\"lat\":24.242213730099653,\"lng\":53.15930355132769},{\"lat\":24.53738664989108,\"lng\":57.96582210601519}]');

-- --------------------------------------------------------

--
-- بنية الجدول `extras`
--

CREATE TABLE `extras` (
  `id` int(11) NOT NULL,
  `item_id` int(11) NOT NULL,
  `name` varchar(255) NOT NULL,
  `price` float NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `updated_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- إرجاع أو استيراد بيانات الجدول `extras`
--

INSERT INTO `extras` (`id`, `item_id`, `name`, `price`, `created_at`, `updated_at`) VALUES
(2, 2, '{\"ar\":\"\\u062c\\u0628\\u0646\",\"en\":\"cheeese\"}', 0.25, '2023-09-12 23:40:30', '2023-12-14 00:04:53'),
(3, 3, '{\"ar\":\"\\u062c\\u0628\\u0646\",\"en\":\"cheeese\"}', 10, '2023-09-12 23:41:25', '2023-12-14 00:02:49'),
(4, 19, '{\"ar\":\"\\u062c\\u0628\\u0646\",\"en\":\"cheeese\"}', 0.25, '2023-12-13 02:18:03', '2023-12-23 23:04:45'),
(5, 19, '{\"ar\":\"\\u0635\\u0648\\u0635\",\"en\":\"sause\"}', 0.25, '2023-12-13 02:18:03', '2023-12-23 23:04:45'),
(6, 19, '{\"ar\":\"\\u0628\\u0637\\u0627\\u0637\",\"en\":\"fries\"}', 0.25, '2023-12-13 02:18:03', '2023-12-23 23:04:45'),
(7, 30, '{\"ar\":\"\\u062c\\u0628\\u0646\",\"en\":\"cheese\"}', 0.25, '2023-12-22 03:16:04', '2023-12-22 03:18:14'),
(8, 49, '{\"ar\":\"\\u062c\\u0628\\u0646\",\"en\":\"cheese\"}', 0.25, '2023-12-23 20:41:35', '2023-12-23 19:48:53');

-- --------------------------------------------------------

--
-- بنية الجدول `failed_jobs`
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
-- بنية الجدول `faqs`
--

CREATE TABLE `faqs` (
  `id` int(11) NOT NULL,
  `vendor_id` int(11) NOT NULL,
  `question` varchar(255) NOT NULL,
  `answer` longtext NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `updated_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- بنية الجدول `favorite`
--

CREATE TABLE `favorite` (
  `id` bigint(20) NOT NULL,
  `user_id` bigint(20) NOT NULL,
  `item_id` bigint(20) NOT NULL,
  `vendor_id` bigint(20) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- إرجاع أو استيراد بيانات الجدول `favorite`
--

INSERT INTO `favorite` (`id`, `user_id`, `item_id`, `vendor_id`, `created_at`, `updated_at`) VALUES
(6, 17, 3, 5, '2023-12-15 00:49:48', '2023-12-15 00:49:48'),
(7, 17, 2, 5, '2023-12-15 00:49:50', '2023-12-15 00:49:50'),
(8, 17, 23, 5, '2023-12-15 00:49:59', '2023-12-15 00:49:59'),
(9, 13, 20, 5, '2024-01-05 14:25:49', '2024-01-05 14:25:49'),
(10, 13, 49, 5, '2024-01-05 14:25:52', '2024-01-05 14:25:52'),
(11, 13, 2, 5, '2024-01-05 14:25:54', '2024-01-05 14:25:54'),
(12, 13, 44, 3, '2024-01-05 14:29:15', '2024-01-05 14:29:15');

-- --------------------------------------------------------

--
-- بنية الجدول `features`
--

CREATE TABLE `features` (
  `id` int(11) NOT NULL,
  `vendor_id` int(11) NOT NULL,
  `title` varchar(255) NOT NULL,
  `description` longtext NOT NULL,
  `image` varchar(255) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `updated_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- إرجاع أو استيراد بيانات الجدول `features`
--

INSERT INTO `features` (`id`, `vendor_id`, `title`, `description`, `image`, `created_at`, `updated_at`) VALUES
(1, 1, 'hello 1', 'hello hello', 'feature-64fb95f76e738.jpeg', '2023-09-08 21:45:27', '2023-09-08 21:45:27');

-- --------------------------------------------------------

--
-- بنية الجدول `footerfeatures`
--

CREATE TABLE `footerfeatures` (
  `id` int(10) UNSIGNED NOT NULL,
  `vendor_id` int(11) NOT NULL,
  `icon` varchar(255) NOT NULL,
  `title` text NOT NULL,
  `description` text NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- بنية الجدول `items`
--

CREATE TABLE `items` (
  `id` int(11) NOT NULL,
  `vendor_id` int(11) NOT NULL,
  `reorder_id` int(11) NOT NULL,
  `cat_id` int(11) NOT NULL,
  `item_name` text NOT NULL,
  `description` text NOT NULL,
  `item_price` float NOT NULL,
  `item_original_price` float DEFAULT NULL,
  `image` varchar(255) DEFAULT NULL,
  `tax` float DEFAULT 0,
  `slug` text DEFAULT NULL,
  `is_available` int(11) NOT NULL DEFAULT 1,
  `has_variants` int(11) NOT NULL DEFAULT 2,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `updated_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `start_time` time DEFAULT '00:00:01',
  `end_time` time DEFAULT '23:59:00'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- إرجاع أو استيراد بيانات الجدول `items`
--

INSERT INTO `items` (`id`, `vendor_id`, `reorder_id`, `cat_id`, `item_name`, `description`, `item_price`, `item_original_price`, `image`, `tax`, `slug`, `is_available`, `has_variants`, `created_at`, `updated_at`, `start_time`, `end_time`) VALUES
(2, 5, 9, 2, '{\"ar\":\"برجر\",\"en\":\"box\"}', '{\"ar\":\"\\u0637\\u0639\\u0645\\u064c \\u0645\\u0645\\u064a\\u0651\\u0632 \\u062d\\u064a\\u062b \\u0623\\u0646\\u0647 \\u064a\\u0639\\u062f \\u0645\\u0646 \\u0627\\u0644\\u0648\\u062c\\u0628\\u0627\\u062a \\u0627\\u0644\\u0644\\u0630\\u064a\\u0630\\u0629 \\u0627\\u0644\\u062a\\u064a \\u062a\\u062a\\u0645\\u064a\\u0651\\u0632 \\u0628\\u0637\\u0639\\u0645 \\u0631\\u0627\\u0626\\u0639 \\u063a\\u064a\\u0631 \\u0645\\u0634\\u0627\\u0628\\u0647 \\u0644\\u0623\\u064a\\u0651 \\u0637\\u0639\\u0645 \\u0622\\u062e\\u0631 \\u0645\\u0646 \\u0627\\u0644\\u0648\\u062c\\u0628\\u0627\\u062a \\u0627\\u0644\\u0633\\u0651\\u0631\\u064a\\u0639\\u0629. \\u064a\\u062d\\u0627\\u0641\\u0638 \\u0639\\u0644\\u0649 \\u0643\\u062a\\u0644\\u0629 \\u0627\\u0644\\u0639\\u0636\\u0644\\u0627\\u062a \\u0648\\u064a\\u0639\\u0645\\u0644 \\u0639\\u0644\\u0649 \\u062a\\u062d\\u0633\\u064a\\u0646\\u0647\\u0627\",\"en\":\"is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry\'s standard dummy\"}', 5, 0, NULL, 0, 'box-CVD8x', 1, 2, '2023-09-12 23:40:30', '2023-12-23 19:53:08', '00:00:01', '23:59:00'),
(3, 5, 7, 2, '{\"ar\":\"\\u0628\\u0631\\u062c\\u0631 \\u0644\\u062d\\u0645\",\"en\":\"beef burger\"}', '{\"ar\":\"\\u0637\\u0639\\u0645\\u064c \\u0645\\u0645\\u064a\\u0651\\u0632 \\u062d\\u064a\\u062b \\u0623\\u0646\\u0647 \\u064a\\u0639\\u062f \\u0645\\u0646 \\u0627\\u0644\\u0648\\u062c\\u0628\\u0627\\u062a \\u0627\\u0644\\u0644\\u0630\\u064a\\u0630\\u0629 \\u0627\\u0644\\u062a\\u064a \\u062a\\u062a\\u0645\\u064a\\u0651\\u0632 \\u0628\\u0637\\u0639\\u0645 \\u0631\\u0627\\u0626\\u0639 \\u063a\\u064a\\u0631 \\u0645\\u0634\\u0627\\u0628\\u0647 \\u0644\\u0623\\u064a\\u0651 \\u0637\\u0639\\u0645 \\u0622\\u062e\\u0631 \\u0645\\u0646 \\u0627\\u0644\\u0648\\u062c\\u0628\\u0627\\u062a \\u0627\\u0644\\u0633\\u0651\\u0631\\u064a\\u0639\\u0629. \\u221a\\u064a\\u062d\\u0627\\u0641\\u0638 \\u0639\\u0644\\u0649 \\u0643\\u062a\\u0644\\u0629 \\u0627\\u0644\\u0639\\u0636\\u0644\\u0627\\u062a \\u0648\\u064a\\u0639\\u0645\\u0644 \\u0639\\u0644\\u0649 \\u062a\\u062d\\u0633\\u064a\\u0646\\u0647\\u0627\",\"en\":\"is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry\'s standard dummy\"}', 10, 0, NULL, 0, 'beef-burger-WLeXB', 1, 2, '2023-09-12 23:41:25', '2023-12-23 23:17:08', '00:00:01', '23:59:00'),
(4, 4, 0, 3, '{\"ar\":\"برجر\",\"en\":\"box\"}', 'طماطم متنقية بالحبة', 5, 5, NULL, 0, 'tmatm-9CYri', 1, 2, '2023-09-13 00:44:14', '2023-09-13 00:44:14', '00:00:01', '23:59:00'),
(5, 4, 0, 3, '{\"ar\":\"برجر\",\"en\":\"box\"}', 'بطاطس متنقية بالحبة', 5, 5, NULL, 0, 'btats-6lai4', 1, 2, '2023-09-13 00:44:43', '2023-09-13 00:44:43', '00:00:01', '23:59:00'),
(6, 4, 0, 3, '{\"ar\":\"برجر\",\"en\":\"box\"}', 'ليمون متنقية بالحبة', 5, 5, NULL, 0, 'lymon-03irm', 1, 2, '2023-09-13 00:45:14', '2023-09-13 00:45:14', '00:00:01', '23:59:00'),
(7, 4, 0, 3, '{\"ar\":\"حضار \",\"en\":\"box\"}', 'خيار متنقية بالحبة', 5, 5, NULL, 0, 'hdar-qGxud', 1, 2, '2023-09-13 00:45:43', '2023-09-13 00:45:43', '00:00:01', '23:59:00'),
(8, 4, 0, 3, ' {\"ar\":\"فلفل ألوان \",\"en\":\"box\"}', 'فلفل ألوان متنقية بالحبة', 5, 5, NULL, 0, 'flfl-aloan-xadBB', 1, 2, '2023-09-13 00:46:12', '2023-09-13 00:46:12', '00:00:01', '23:59:00'),
(9, 4, 0, 3, '{\"ar\":\"باذنجان \",\"en\":\"box\"}', 'باذنجان متنقية بالحبة', 5, 5, NULL, 0, 'bathngan-psaJw', 1, 2, '2023-09-13 00:46:48', '2023-09-13 00:46:48', '00:00:01', '23:59:00'),
(10, 4, 0, 4, '{\"ar\":\"بطيخ  \",\"en\":\"box\"}', 'بطيخ متنقي بالحبة', 5, 5, NULL, 0, 'btykh-ufGPY', 1, 2, '2023-09-13 00:58:04', '2023-09-13 00:58:04', '00:00:01', '23:59:00'),
(11, 4, 0, 4, '{\"ar\":\"خوخ\",\"en\":\"box\"}', 'خوخ متنقي بالحبة', 5, 5, NULL, 0, 'khokh-bXugu', 1, 2, '2023-09-13 00:58:33', '2023-09-13 00:58:33', '00:00:01', '23:59:00'),
(12, 4, 0, 4, '{\"ar\":\"كيوي  \",\"en\":\"box\"}', 'كيوي متنقي بالحبة', 5, 5, NULL, 0, 'kyoy-Mragq', 1, 2, '2023-09-13 00:58:58', '2023-09-13 00:58:58', '00:00:01', '23:59:00'),
(13, 4, 0, 4, '{\"ar\":\"موز \",\"en\":\"box\"}', 'موز متنقي بالحبة', 5, 5, NULL, 0, 'moz-SSy2q', 1, 2, '2023-09-13 00:59:30', '2023-09-13 00:59:30', '00:00:01', '23:59:00'),
(14, 4, 0, 4, '{\"ar\":\"فراولة\",\"en\":\"box\"}', 'فراولة متنقية بالحبة', 5, 5, NULL, 0, 'fraol-QgTp4', 1, 2, '2023-09-13 01:00:03', '2023-09-13 01:00:03', '00:00:01', '23:59:00'),
(15, 4, 0, 4, '{\"ar\":\"شمام\",\"en\":\"box\"}', 'شمام متنقي بالحبة', 5, 5, NULL, 0, 'shmam-UqLEB', 1, 2, '2023-09-13 01:00:26', '2023-09-13 01:00:26', '00:00:01', '23:59:00'),
(17, 5, 10, 5, '{\"ar\":\"\\u0628\\u0631\\u062c\\u0631 \\u062f\\u062c\\u0627\\u062c\",\"en\":\"Chicken burger\"}', '{\"ar\":\"\\u0637\\u0639\\u0645\\u064c \\u0645\\u0645\\u064a\\u0651\\u0632 \\u062d\\u064a\\u062b \\u0623\\u0646\\u0647 \\u064a\\u0639\\u062f \\u0645\\u0646 \\u0627\\u0644\\u0648\\u062c\\u0628\\u0627\\u062a \\u0627\\u0644\\u0644\\u0630\\u064a\\u0630\\u0629 \\u0627\\u0644\\u062a\\u064a \\u062a\\u062a\\u0645\\u064a\\u0651\\u0632 \\u0628\\u0637\\u0639\\u0645 \\u0631\\u0627\\u0626\\u0639 \\u063a\\u064a\\u0631 \\u0645\\u0634\\u0627\\u0628\\u0647 \\u0644\\u0623\\u064a\\u0651 \\u0637\\u0639\\u0645 \\u0622\\u062e\\u0631 \\u0645\\u0646 \\u0627\\u0644\\u0648\\u062c\\u0628\\u0627\\u062a \\u0627\\u0644\\u0633\\u0651\\u0631\\u064a\\u0639\\u0629. \\u064a\\u062d\\u0627\\u0641\\u0638 \\u0639\\u0644\\u0649 \\u0643\\u062a\\u0644\\u0629 \\u0627\\u0644\\u0639\\u0636\\u0644\\u0627\\u062a \\u0648\\u064a\\u0639\\u0645\\u0644 \\u0639\\u0644\\u0649 \\u062a\\u062d\\u0633\\u064a\\u0646\\u0647\\u0627\",\"en\":\"is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry\'s standard dummy\"}', 5, 0, NULL, 0, 'chicken-burger-n8z2W', 1, 2, '2023-10-06 17:38:49', '2023-12-23 19:53:08', '00:00:01', '23:59:00'),
(19, 5, 2, 10, '{\"ar\":\"\\u0628\\u0631\\u062c\\u0631 \\u062f\\u062c\\u0627\\u062c\",\"en\":\"Chicken burger1111111111\"}', '{\"ar\":\"\\u0637\\u0639\\u0645\\u064c \\u0645\\u0645\\u064a\\u0651\\u0632 \\u062d\\u064a\\u062b \\u0623\\u0646\\u0647 \\u064a\\u0639\\u062f \\u0645\\u0646 \\u0627\\u0644\\u0648\\u062c\\u0628\\u0627\\u062a \\u0627\\u0644\\u0644\\u0630\\u064a\\u0630\\u0629 \\u0627\\u0644\\u062a\\u064a \\u062a\\u062a\\u0645\\u064a\\u0651\\u0632 \\u0628\\u0637\\u0639\\u0645 \\u0631\\u0627\\u0626\\u0639 \\u063a\\u064a\\u0631 \\u0645\\u0634\\u0627\\u0628\\u0647 \\u0644\\u0623\\u064a\\u0651 \\u0637\\u0639\\u0645 \\u0622\\u062e\\u0631 \\u0645\\u0646 \\u0627\\u0644\\u0648\\u062c\\u0628\\u0627\\u062a \\u0627\\u0644\\u0633\\u0651\\u0631\\u064a\\u0639\\u0629. \\u221a\\u064a\\u062d\\u0627\\u0641\\u0638 \\u0639\\u0644\\u0649 \\u0643\\u062a\\u0644\\u0629 \\u0627\\u0644\\u0639\\u0636\\u0644\\u0627\\u062a \\u0648\\u064a\\u0639\\u0645\\u0644 \\u0639\\u0644\\u0649 \\u062a\\u062d\\u0633\\u064a\\u0646\\u0647\\u0627\",\"en\":\"is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry\'s standard dummy\"}', 7, 5, NULL, 0, 'chicken-burger-uwGch', 1, 1, '2023-12-13 02:18:03', '2023-12-23 22:14:02', '00:01:00', '22:17:00'),
(20, 5, 1, 2, '{\"en\":\"beef burger\"}', '{\"ar\":\"\\u0637\\u0639\\u0645\\u064c \\u0645\\u0645\\u064a\\u0651\\u0632 \\u062d\\u064a\\u062b \\u0623\\u0646\\u0647 \\u064a\\u0639\\u062f \\u0645\\u0646 \\u0627\\u0644\\u0648\\u062c\\u0628\\u0627\\u062a \\u0627\\u0644\\u0644\\u0630\\u064a\\u0630\\u0629 \\u0627\\u0644\\u062a\\u064a \\u062a\\u062a\\u0645\\u064a\\u0651\\u0632 \\u0628\\u0637\\u0639\\u0645 \\u0631\\u0627\\u0626\\u0639 \\u063a\\u064a\\u0631 \\u0645\\u0634\\u0627\\u0628\\u0647 \\u0644\\u0623\\u064a\\u0651 \\u0637\\u0639\\u0645 \\u0622\\u062e\\u0631 \\u0645\\u0646 \\u0627\\u0644\\u0648\\u062c\\u0628\\u0627\\u062a \\u0627\\u0644\\u0633\\u0651\\u0631\\u064a\\u0639\\u0629. \\u221a\\u064a\\u062d\\u0627\\u0641\\u0638 \\u0639\\u0644\\u0649 \\u0643\\u062a\\u0644\\u0629 \\u0627\\u0644\\u0639\\u0636\\u0644\\u0627\\u062a \\u0648\\u064a\\u0639\\u0645\\u0644 \\u0639\\u0644\\u0649 \\u062a\\u062d\\u0633\\u064a\\u0646\\u0647\\u0627\",\"en\":\"is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry\'s standard dummy\"}', 5, 5, NULL, 0, 'beef-burger-IstP2', 1, 2, '2023-12-14 01:10:43', '2023-12-23 19:53:08', '00:10:00', '21:10:00'),
(21, 5, 3, 12, '{\"en\":\"pasta\"}', '{\"ar\":\"\\u0637\\u0639\\u0645\\u064c \\u0645\\u0645\\u064a\\u0651\\u0632 \\u062d\\u064a\\u062b \\u0623\\u0646\\u0647 \\u064a\\u0639\\u062f \\u0645\\u0646 \\u0627\\u0644\\u0648\\u062c\\u0628\\u0627\\u062a \\u0627\\u0644\\u0644\\u0630\\u064a\\u0630\\u0629 \\u0627\\u0644\\u062a\\u064a \\u062a\\u062a\\u0645\\u064a\\u0651\\u0632 \\u0628\\u0637\\u0639\\u0645 \\u0631\\u0627\\u0626\\u0639 \\u063a\\u064a\\u0631 \\u0645\\u0634\\u0627\\u0628\\u0647 \\u0644\\u0623\\u064a\\u0651 \\u0637\\u0639\\u0645 \\u0622\\u062e\\u0631 \\u0645\\u0646 \\u0627\\u0644\\u0648\\u062c\\u0628\\u0627\\u062a \\u0627\\u0644\\u0633\\u0651\\u0631\\u064a\\u0639\\u0629. \\u221a\\u064a\\u062d\\u0627\\u0641\\u0638 \\u0639\\u0644\\u0649 \\u0643\\u062a\\u0644\\u0629 \\u0627\\u0644\\u0639\\u0636\\u0644\\u0627\\u062a \\u0648\\u064a\\u0639\\u0645\\u0644 \\u0639\\u0644\\u0649 \\u062a\\u062d\\u0633\\u064a\\u0646\\u0647\\u0627\",\"en\":\"is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry\'s standard dummy\"}', 5, 7, NULL, 0, 'pasta-gUDf4', 1, 2, '2023-12-14 01:19:33', '2023-12-23 19:53:08', '00:02:00', '12:17:00'),
(22, 5, 4, 13, '{\"en\":\"beef burger\"}', '{\"ar\":\"\\u0637\\u0639\\u0645\\u064c \\u0645\\u0645\\u064a\\u0651\\u0632 \\u062d\\u064a\\u062b \\u0623\\u0646\\u0647 \\u064a\\u0639\\u062f \\u0645\\u0646 \\u0627\\u0644\\u0648\\u062c\\u0628\\u0627\\u062a \\u0627\\u0644\\u0644\\u0630\\u064a\\u0630\\u0629 \\u0627\\u0644\\u062a\\u064a \\u062a\\u062a\\u0645\\u064a\\u0651\\u0632 \\u0628\\u0637\\u0639\\u0645 \\u0631\\u0627\\u0626\\u0639 \\u063a\\u064a\\u0631 \\u0645\\u0634\\u0627\\u0628\\u0647 \\u0644\\u0623\\u064a\\u0651 \\u0637\\u0639\\u0645 \\u0622\\u062e\\u0631 \\u0645\\u0646 \\u0627\\u0644\\u0648\\u062c\\u0628\\u0627\\u062a \\u0627\\u0644\\u0633\\u0651\\u0631\\u064a\\u0639\\u0629. \\u221a\\u064a\\u062d\\u0627\\u0641\\u0638 \\u0639\\u0644\\u0649 \\u0643\\u062a\\u0644\\u0629 \\u0627\\u0644\\u0639\\u0636\\u0644\\u0627\\u062a \\u0648\\u064a\\u0639\\u0645\\u0644 \\u0639\\u0644\\u0649 \\u062a\\u062d\\u0633\\u064a\\u0646\\u0647\\u0627\",\"en\":\"is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry\'s standard dummy\"}', 5, 7, NULL, 0, 'beef-burger-ecucq', 1, 2, '2023-12-14 01:33:05', '2023-12-23 19:53:08', '00:32:00', '12:32:00'),
(23, 5, 5, 10, '{\"en\":\"shawarma\",\"ar\":\"\\u0634\\u0627\\u0648\\u0631\\u0645\\u0627\"}', '{\"ar\":\"\\u0637\\u0639\\u0645\\u064c \\u0645\\u0645\\u064a\\u0651\\u0632 \\u062d\\u064a\\u062b \\u0623\\u0646\\u0647 \\u064a\\u0639\\u062f \\u0645\\u0646 \\u0627\\u0644\\u0648\\u062c\\u0628\\u0627\\u062a \\u0627\\u0644\\u0644\\u0630\\u064a\\u0630\\u0629 \\u0627\\u0644\\u062a\\u064a \\u062a\\u062a\\u0645\\u064a\\u0651\\u0632 \\u0628\\u0637\\u0639\\u0645 \\u0631\\u0627\\u0626\\u0639 \\u063a\\u064a\\u0631 \\u0645\\u0634\\u0627\\u0628\\u0647 \\u0644\\u0623\\u064a\\u0651 \\u0637\\u0639\\u0645 \\u0622\\u062e\\u0631 \\u0645\\u0646 \\u0627\\u0644\\u0648\\u062c\\u0628\\u0627\\u062a \\u0627\\u0644\\u0633\\u0651\\u0631\\u064a\\u0639\\u0629. \\u221a\\u064a\\u062d\\u0627\\u0641\\u0638 \\u0639\\u0644\\u0649 \\u0643\\u062a\\u0644\\u0629 \\u0627\\u0644\\u0639\\u0636\\u0644\\u0627\\u062a \\u0648\\u064a\\u0639\\u0645\\u0644 \\u0639\\u0644\\u0649 \\u062a\\u062d\\u0633\\u064a\\u0646\\u0647\\u0627\",\"en\":\"is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry\'s standard dummy\"}', 5, 7, NULL, 0, 'shawarma-4GgzH', 1, 2, '2023-12-14 01:35:19', '2023-12-23 19:53:08', '00:34:00', '23:35:00'),
(24, 5, 6, 11, '{\"en\":\"Pepperoni pizza\"}', '{\"ar\":\"\\u0637\\u0639\\u0645\\u064c \\u0645\\u0645\\u064a\\u0651\\u0632 \\u062d\\u064a\\u062b \\u0623\\u0646\\u0647 \\u064a\\u0639\\u062f \\u0645\\u0646 \\u0627\\u0644\\u0648\\u062c\\u0628\\u0627\\u062a \\u0627\\u0644\\u0644\\u0630\\u064a\\u0630\\u0629 \\u0627\\u0644\\u062a\\u064a \\u062a\\u062a\\u0645\\u064a\\u0651\\u0632 \\u0628\\u0637\\u0639\\u0645 \\u0631\\u0627\\u0626\\u0639 \\u063a\\u064a\\u0631 \\u0645\\u0634\\u0627\\u0628\\u0647 \\u0644\\u0623\\u064a\\u0651 \\u0637\\u0639\\u0645 \\u0622\\u062e\\u0631 \\u0645\\u0646 \\u0627\\u0644\\u0648\\u062c\\u0628\\u0627\\u062a \\u0627\\u0644\\u0633\\u0651\\u0631\\u064a\\u0639\\u0629. \\u221a\\u064a\\u062d\\u0627\\u0641\\u0638 \\u0639\\u0644\\u0649 \\u0643\\u062a\\u0644\\u0629 \\u0627\\u0644\\u0639\\u0636\\u0644\\u0627\\u062a \\u0648\\u064a\\u0639\\u0645\\u0644 \\u0639\\u0644\\u0649 \\u062a\\u062d\\u0633\\u064a\\u0646\\u0647\\u0627\",\"en\":\"is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry\'s standard dummy\"}', 5, 7, NULL, 0, 'pepperoni-pizza-bLgAl', 1, 2, '2023-12-14 01:36:37', '2023-12-23 19:53:08', '00:36:00', '12:36:00'),
(25, 18, 0, 15, '{\"en\":\"tomato\",\"ar\":\"\\u0637\\u0645\\u0627\\u0637\\u0645\"}', '{\"ar\":\"1 \\u0643\\u064a\\u0644\\u0648\",\"en\":\"1 Kilo\"}', 10, NULL, NULL, 0, 'tomato-6495D', 2, 2, '2023-12-14 02:04:04', '2023-12-24 17:51:34', '00:00:00', '23:59:00'),
(26, 19, 0, 18, '{\"en\":\"pistachio cake\",\"ar\":\"ssssssssss\"}', '{\"ar\":\"is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry\'s standard dummy\",\"en\":\"\\u0643\\u064a\\u0643 \\u0627\\u0644\\u0641\\u0633\\u062a\\u0642 \\u0645\\u063a\\u0637\\u0627\\u0629 \\u0628\\u0627\\u0644\\u0643\\u0631\\u064a\\u0645\\u0629 \\u0648\\u0627\\u0644\\u0641\\u0631\\u0627\\u0648\\u0644\\u0629 \\u0645\\u0646 \\u0645\\u0627\\u0631\\u0643\\u064a\\u062a ... \\u0644\\u0627 \\u064a\\u0641\\u0634\\u0644 \\u0627\\u0644\\u0643\\u064a\\u0643 \\u0623\\u0628\\u062f\\u0627 \\u0641\\u064a \\u062c\\u0645\\u0639 \\u0627\\u0644\\u0623\\u062d\\u0628\\u0627\\u0621 \\u0645\\u0639\\u0627 \\u0633\\u0648\\u0627\\u0621 \\u0627\\u062d\\u062a\\u0641\\u0627\\u0644\\u064b\\u0627 \\u0628\\u0645\\u0646\\u0627\\u0633\\u0628\\u0629 \\u0645\\u0627 \\u0627\\u0648 \\u0628\\u062f\\u0648\\u0646 \\u0645\\u0646\\u0627\\u0633\\u0628\\u0629\"}', 7, 0, NULL, 0, 'pistachio-cake-Xz8d9', 1, 2, '2023-12-19 19:59:49', '2023-12-19 23:05:46', '18:22:00', '12:46:00'),
(27, 19, 0, 18, '{\"en\":\"Vanilla cake\"}', '{\"ar\":\"\\u0643\\u064a\\u0643 \\u0627\\u0644\\u0641\\u0633\\u062a\\u0642 \\u0645\\u063a\\u0637\\u0627\\u0629 \\u0628\\u0627\\u0644\\u0643\\u0631\\u064a\\u0645\\u0629 \\u0648\\u0627\\u0644\\u0641\\u0631\\u0627\\u0648\\u0644\\u0629 \\u0645\\u0646 \\u0645\\u0627\\u0631\\u0643\\u064a\\u062a ... \\u0644\\u0627 \\u064a\\u0641\\u0634\\u0644 \\u0627\\u0644\\u0643\\u064a\\u0643 \\u0623\\u0628\\u062f\\u0627 \\u0641\\u064a \\u062c\\u0645\\u0639 \\u0627\\u0644\\u0623\\u062d\\u0628\\u0627\\u0621 \\u0645\\u0639\\u0627 \\u0633\\u0648\\u0627\\u0621 \\u0627\\u062d\\u062a\\u0641\\u0627\\u0644\\u064b\\u0627 \\u0628\\u0645\\u0646\\u0627\\u0633\\u0628\\u0629 \\u0645\\u0627 \\u0627\\u0648 \\u0628\\u062f\\u0648\\u0646 \\u0645\\u0646\\u0627\\u0633\\u0628\\u0629\",\"en\":\"is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry\'s standard dummy\"}', 5, NULL, NULL, 0, 'vanilla-cake-AYQk1', 1, 2, '2023-12-19 20:01:47', '2023-12-19 20:01:47', '19:01:00', '07:01:00'),
(28, 19, 0, 18, '{\"en\":\"Strawberry cake\"}', '{\"ar\":\"\\u0643\\u064a\\u0643 \\u0627\\u0644\\u0641\\u0633\\u062a\\u0642 \\u0645\\u063a\\u0637\\u0627\\u0629 \\u0628\\u0627\\u0644\\u0643\\u0631\\u064a\\u0645\\u0629 \\u0648\\u0627\\u0644\\u0641\\u0631\\u0627\\u0648\\u0644\\u0629 \\u0645\\u0646 \\u0645\\u0627\\u0631\\u0643\\u064a\\u062a ... \\u0644\\u0627 \\u064a\\u0641\\u0634\\u0644 \\u0627\\u0644\\u0643\\u064a\\u0643 \\u0623\\u0628\\u062f\\u0627 \\u0641\\u064a \\u062c\\u0645\\u0639 \\u0627\\u0644\\u0623\\u062d\\u0628\\u0627\\u0621 \\u0645\\u0639\\u0627 \\u0633\\u0648\\u0627\\u0621 \\u0627\\u062d\\u062a\\u0641\\u0627\\u0644\\u064b\\u0627 \\u0628\\u0645\\u0646\\u0627\\u0633\\u0628\\u0629 \\u0645\\u0627 \\u0627\\u0648 \\u0628\\u062f\\u0648\\u0646 \\u0645\\u0646\\u0627\\u0633\\u0628\\u0629\",\"en\":\"is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry\'s standard dummy\"}', 8, NULL, NULL, 0, 'strawberry-cake-LcZAm', 1, 2, '2023-12-19 20:03:10', '2023-12-19 20:03:10', '19:02:00', '07:02:00'),
(29, 19, 0, 18, '{\"en\":\"Blueberry cake\"}', '{\"ar\":\"\\u0643\\u064a\\u0643 \\u0627\\u0644\\u0641\\u0633\\u062a\\u0642 \\u0645\\u063a\\u0637\\u0627\\u0629 \\u0628\\u0627\\u0644\\u0643\\u0631\\u064a\\u0645\\u0629 \\u0648\\u0627\\u0644\\u0641\\u0631\\u0627\\u0648\\u0644\\u0629 \\u0645\\u0646 \\u0645\\u0627\\u0631\\u0643\\u064a\\u062a ... \\u0644\\u0627 \\u064a\\u0641\\u0634\\u0644 \\u0627\\u0644\\u0643\\u064a\\u0643 \\u0623\\u0628\\u062f\\u0627 \\u0641\\u064a \\u062c\\u0645\\u0639 \\u0627\\u0644\\u0623\\u062d\\u0628\\u0627\\u0621 \\u0645\\u0639\\u0627 \\u0633\\u0648\\u0627\\u0621 \\u0627\\u062d\\u062a\\u0641\\u0627\\u0644\\u064b\\u0627 \\u0628\\u0645\\u0646\\u0627\\u0633\\u0628\\u0629 \\u0645\\u0627 \\u0627\\u0648 \\u0628\\u062f\\u0648\\u0646 \\u0645\\u0646\\u0627\\u0633\\u0628\\u0629\",\"en\":\"is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry\'s standard dummy\"}', 8, NULL, NULL, 0, 'blueberry-cake-GBqLg', 1, 2, '2023-12-19 20:05:00', '2023-12-19 20:05:00', '19:03:00', '07:03:00'),
(30, 3, 0, 26, '{\"en\":\"Strawberry cake\",\"ar\":\"\\u0643\\u064a\\u0643 \\u0641\\u0631\\u0627\\u0648\\u0644\\u0629\"}', '{\"ar\":\"\\u0627\\u0644\\u0641\\u0637\\u0648\\u0631 \\u0644\\u0627 \\u064a\\u0643\\u062a\\u0645\\u0644 \\u0628\\u062f\\u0648\\u0646 \\u0642\\u0637\\u0639 \\u0627\\u0644\\u0647\\u0648\\u062a \\u0643\\u064a\\u0643 \\u0627\\u0644\\u0637\\u0631\\u064a\\u0629 \\u0628\\u0627\\u0644\\u0632\\u0628\\u062f\\u0629. \\u062f\\u0644\\u0644 \\u0646\\u0641\\u0633\\u0643 \\u0648\\u0627\\u0639\\u0637\\u0647\\u0627 \\u0627\\u0644\\u062f\\u0641\\u0639\\u0629 \\u0627\\u0644\\u0635\\u0628\\u0627\\u062d\\u064a\\u0629 \\u0627\\u0644\\u0642\\u0648\\u064a\\u0629 \\u0627\\u0644\\u062a\\u064a \\u062a\\u062d\\u062a\\u0627\\u062c\\u0647\\u0627 \\u0645\\u0639 \\u0641\\u0637\\u0648\\u0631 \\u0633\\u0631\\u064a\\u0639 \\u0645\\u0646 \\u0645\\u0627\\u0643\\u062f\\u0648\\u0646\\u0627\\u0644\\u062f\\u0632. \\u0627\\u0639\\u0631\\u0641 \\u0627\\u0644\\u0645\\u0632\\u064a\\u062f \\u0647\\u0646\\u0627.\",\"en\":\"is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry\'s standard dummy\"}', 7, 5, NULL, 0, 'strawberry-cake-I6rSq', 1, 1, '2023-12-20 07:35:56', '2023-12-22 03:18:14', '00:05:00', '23:05:00'),
(31, 3, 0, 26, '{\"en\":\"Pistachio cake\",\"ar\":\"\\u0643\\u064a\\u0643 \\u0641\\u0633\\u062a\\u0642\"}', '{\"ar\":\"\\u0627\\u0644\\u0641\\u0637\\u0648\\u0631 \\u0644\\u0627 \\u064a\\u0643\\u062a\\u0645\\u0644 \\u0628\\u062f\\u0648\\u0646 \\u0642\\u0637\\u0639 \\u0627\\u0644\\u0647\\u0648\\u062a \\u0643\\u064a\\u0643 \\u0627\\u0644\\u0637\\u0631\\u064a\\u0629 \\u0628\\u0627\\u0644\\u0632\\u0628\\u062f\\u0629. \\u062f\\u0644\\u0644 \\u0646\\u0641\\u0633\\u0643 \\u0648\\u0627\\u0639\\u0637\\u0647\\u0627 \\u0627\\u0644\\u062f\\u0641\\u0639\\u0629 \\u0627\\u0644\\u0635\\u0628\\u0627\\u062d\\u064a\\u0629 \\u0627\\u0644\\u0642\\u0648\\u064a\\u0629 \\u0627\\u0644\\u062a\\u064a \\u062a\\u062d\\u062a\\u0627\\u062c\\u0647\\u0627 \\u0645\\u0639 \\u0641\\u0637\\u0648\\u0631 \\u0633\\u0631\\u064a\\u0639 \\u0645\\u0646 \\u0645\\u0627\\u0643\\u062f\\u0648\\u0646\\u0627\\u0644\\u062f\\u0632. \\u0627\\u0639\\u0631\\u0641 \\u0627\\u0644\\u0645\\u0632\\u064a\\u062f \\u0647\\u0646\\u0627.\",\"en\":\"is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry\'s standard dummy\"}', 8, 0, NULL, 0, 'pistachio-cake-4nrO8', 1, 2, '2023-12-20 07:37:16', '2023-12-22 02:49:37', '00:06:00', '23:06:00'),
(32, 3, 0, 26, '{\"en\":\"Blueberry cake\",\"ar\":\"\\u0643\\u064a\\u0643 \\u062a\\u0648\\u062a\"}', '{\"ar\":\"\\u0627\\u0644\\u0641\\u0637\\u0648\\u0631 \\u0644\\u0627 \\u064a\\u0643\\u062a\\u0645\\u0644 \\u0628\\u062f\\u0648\\u0646 \\u0642\\u0637\\u0639 \\u0627\\u0644\\u0647\\u0648\\u062a \\u0643\\u064a\\u0643 \\u0627\\u0644\\u0637\\u0631\\u064a\\u0629 \\u0628\\u0627\\u0644\\u0632\\u0628\\u062f\\u0629. \\u062f\\u0644\\u0644 \\u0646\\u0641\\u0633\\u0643 \\u0648\\u0627\\u0639\\u0637\\u0647\\u0627 \\u0627\\u0644\\u062f\\u0641\\u0639\\u0629 \\u0627\\u0644\\u0635\\u0628\\u0627\\u062d\\u064a\\u0629 \\u0627\\u0644\\u0642\\u0648\\u064a\\u0629 \\u0627\\u0644\\u062a\\u064a \\u062a\\u062d\\u062a\\u0627\\u062c\\u0647\\u0627 \\u0645\\u0639 \\u0641\\u0637\\u0648\\u0631 \\u0633\\u0631\\u064a\\u0639 \\u0645\\u0646 \\u0645\\u0627\\u0643\\u062f\\u0648\\u0646\\u0627\\u0644\\u062f\\u0632. \\u0627\\u0639\\u0631\\u0641 \\u0627\\u0644\\u0645\\u0632\\u064a\\u062f \\u0647\\u0646\\u0627.\",\"en\":\"is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry\'s standard dummy\"}', 8, 0, NULL, 0, 'blueberry-cake-EdKnh', 1, 2, '2023-12-20 07:39:01', '2023-12-22 02:49:59', '00:08:00', '23:08:00'),
(33, 3, 0, 26, '{\"en\":\"banana cake\",\"ar\":\"\\u0643\\u064a\\u0643 \\u0645\\u0648\\u0632\"}', '{\"ar\":\"is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry\'s standard dummy\",\"en\":\"\\u0627\\u0644\\u0641\\u0637\\u0648\\u0631 \\u0644\\u0627 \\u064a\\u0643\\u062a\\u0645\\u0644 \\u0628\\u062f\\u0648\\u0646 \\u0642\\u0637\\u0639 \\u0627\\u0644\\u0647\\u0648\\u062a \\u0643\\u064a\\u0643 \\u0627\\u0644\\u0637\\u0631\\u064a\\u0629 \\u0628\\u0627\\u0644\\u0632\\u0628\\u062f\\u0629. \\u062f\\u0644\\u0644 \\u0646\\u0641\\u0633\\u0643 \\u0648\\u0627\\u0639\\u0637\\u0647\\u0627 \\u0627\\u0644\\u062f\\u0641\\u0639\\u0629 \\u0627\\u0644\\u0635\\u0628\\u0627\\u062d\\u064a\\u0629 \\u0627\\u0644\\u0642\\u0648\\u064a\\u0629 \\u0627\\u0644\\u062a\\u064a \\u062a\\u062d\\u062a\\u0627\\u062c\\u0647\\u0627 \\u0645\\u0639 \\u0641\\u0637\\u0648\\u0631 \\u0633\\u0631\\u064a\\u0639 \\u0645\\u0646 \\u0645\\u0627\\u0643\\u062f\\u0648\\u0646\\u0627\\u0644\\u062f\\u0632. \\u0627\\u0639\\u0631\\u0641 \\u0627\\u0644\\u0645\\u0632\\u064a\\u062f \\u0647\\u0646\\u0627.\"}', 8, 0, NULL, 0, 'banana-cake-69VPj', 1, 2, '2023-12-20 07:43:54', '2023-12-22 02:50:11', '00:13:00', '23:13:00'),
(34, 3, 0, 28, '{\"en\":\"choco cupcake\",\"ar\":\"\\u0643\\u0628 \\u0643\\u064a\\u0643 \\u0634\\u0648\\u0643\\u0648\"}', '{\"ar\":\"\\u0627\\u0644\\u0641\\u0637\\u0648\\u0631 \\u0644\\u0627 \\u064a\\u0643\\u062a\\u0645\\u0644 \\u0628\\u062f\\u0648\\u0646 \\u0642\\u0637\\u0639 \\u0627\\u0644\\u0647\\u0648\\u062a \\u0643\\u064a\\u0643 \\u0627\\u0644\\u0637\\u0631\\u064a\\u0629 \\u0628\\u0627\\u0644\\u0632\\u0628\\u062f\\u0629. \\u062f\\u0644\\u0644 \\u0646\\u0641\\u0633\\u0643 \\u0648\\u0627\\u0639\\u0637\\u0647\\u0627 \\u0627\\u0644\\u062f\\u0641\\u0639\\u0629 \\u0627\\u0644\\u0635\\u0628\\u0627\\u062d\\u064a\\u0629 \\u0627\\u0644\\u0642\\u0648\\u064a\\u0629 \\u0627\\u0644\\u062a\\u064a \\u062a\\u062d\\u062a\\u0627\\u062c\\u0647\\u0627 \\u0645\\u0639 \\u0641\\u0637\\u0648\\u0631 \\u0633\\u0631\\u064a\\u0639 \\u0645\\u0646 \\u0645\\u0627\\u0643\\u062f\\u0648\\u0646\\u0627\\u0644\\u062f\\u0632. \\u0627\\u0639\\u0631\\u0641 \\u0627\\u0644\\u0645\\u0632\\u064a\\u062f \\u0647\\u0646\\u0627.\",\"en\":\"is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry\'s standard dummy\"}', 8, 0, NULL, 0, 'choco-cupcake-vLi6l', 1, 2, '2023-12-20 07:45:42', '2023-12-22 02:50:28', '00:15:00', '23:15:00'),
(35, 3, 0, 28, '{\"en\":\"Strawberry cupcake\",\"ar\":\"\\u0643\\u0628 \\u0643\\u064a\\u0643 \\u0641\\u0631\\u0627\\u0648\\u0644\\u0629\"}', '{\"ar\":\"\\u0627\\u0644\\u0641\\u0637\\u0648\\u0631 \\u0644\\u0627 \\u064a\\u0643\\u062a\\u0645\\u0644 \\u0628\\u062f\\u0648\\u0646 \\u0642\\u0637\\u0639 \\u0627\\u0644\\u0647\\u0648\\u062a \\u0643\\u064a\\u0643 \\u0627\\u0644\\u0637\\u0631\\u064a\\u0629 \\u0628\\u0627\\u0644\\u0632\\u0628\\u062f\\u0629. \\u062f\\u0644\\u0644 \\u0646\\u0641\\u0633\\u0643 \\u0648\\u0627\\u0639\\u0637\\u0647\\u0627 \\u0627\\u0644\\u062f\\u0641\\u0639\\u0629 \\u0627\\u0644\\u0635\\u0628\\u0627\\u062d\\u064a\\u0629 \\u0627\\u0644\\u0642\\u0648\\u064a\\u0629 \\u0627\\u0644\\u062a\\u064a \\u062a\\u062d\\u062a\\u0627\\u062c\\u0647\\u0627 \\u0645\\u0639 \\u0641\\u0637\\u0648\\u0631 \\u0633\\u0631\\u064a\\u0639 \\u0645\\u0646 \\u0645\\u0627\\u0643\\u062f\\u0648\\u0646\\u0627\\u0644\\u062f\\u0632. \\u0627\\u0639\\u0631\\u0641 \\u0627\\u0644\\u0645\\u0632\\u064a\\u062f \\u0647\\u0646\\u0627.\",\"en\":\"is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry\'s standard dummy\"}', 8, 0, NULL, 0, 'strawberry-cupcake-S6q2M', 1, 2, '2023-12-20 07:46:55', '2023-12-22 02:50:39', '00:16:00', '23:16:00'),
(36, 3, 0, 28, '{\"en\":\"Pistachio cupcake\",\"ar\":\"\\u0643\\u0628 \\u0643\\u064a\\u0643 \\u0641\\u0633\\u062a\\u0642\"}', '{\"ar\":\"\\u0627\\u0644\\u0641\\u0637\\u0648\\u0631 \\u0644\\u0627 \\u064a\\u0643\\u062a\\u0645\\u0644 \\u0628\\u062f\\u0648\\u0646 \\u0642\\u0637\\u0639 \\u0627\\u0644\\u0647\\u0648\\u062a \\u0643\\u064a\\u0643 \\u0627\\u0644\\u0637\\u0631\\u064a\\u0629 \\u0628\\u0627\\u0644\\u0632\\u0628\\u062f\\u0629. \\u062f\\u0644\\u0644 \\u0646\\u0641\\u0633\\u0643 \\u0648\\u0627\\u0639\\u0637\\u0647\\u0627 \\u0627\\u0644\\u062f\\u0641\\u0639\\u0629 \\u0627\\u0644\\u0635\\u0628\\u0627\\u062d\\u064a\\u0629 \\u0627\\u0644\\u0642\\u0648\\u064a\\u0629 \\u0627\\u0644\\u062a\\u064a \\u062a\\u062d\\u062a\\u0627\\u062c\\u0647\\u0627 \\u0645\\u0639 \\u0641\\u0637\\u0648\\u0631 \\u0633\\u0631\\u064a\\u0639 \\u0645\\u0646 \\u0645\\u0627\\u0643\\u062f\\u0648\\u0646\\u0627\\u0644\\u062f\\u0632. \\u0627\\u0639\\u0631\\u0641 \\u0627\\u0644\\u0645\\u0632\\u064a\\u062f \\u0647\\u0646\\u0627.\",\"en\":\"is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry\'s standard dummy\"}', 8, 0, NULL, 0, 'pistachio-cupcake-TScEW', 1, 2, '2023-12-20 07:47:50', '2023-12-22 02:51:00', '00:17:00', '23:17:00'),
(37, 3, 0, 28, '{\"en\":\"Avocado cupcake\",\"ar\":\"\\u0643\\u0628 \\u0643\\u064a\\u0643 \\u0623\\u0641\\u0648\\u0643\\u0627\\u062f\\u0648\"}', '{\"ar\":\"\\u0627\\u0644\\u0641\\u0637\\u0648\\u0631 \\u0644\\u0627 \\u064a\\u0643\\u062a\\u0645\\u0644 \\u0628\\u062f\\u0648\\u0646 \\u0642\\u0637\\u0639 \\u0627\\u0644\\u0647\\u0648\\u062a \\u0643\\u064a\\u0643 \\u0627\\u0644\\u0637\\u0631\\u064a\\u0629 \\u0628\\u0627\\u0644\\u0632\\u0628\\u062f\\u0629. \\u062f\\u0644\\u0644 \\u0646\\u0641\\u0633\\u0643 \\u0648\\u0627\\u0639\\u0637\\u0647\\u0627 \\u0627\\u0644\\u062f\\u0641\\u0639\\u0629 \\u0627\\u0644\\u0635\\u0628\\u0627\\u062d\\u064a\\u0629 \\u0627\\u0644\\u0642\\u0648\\u064a\\u0629 \\u0627\\u0644\\u062a\\u064a \\u062a\\u062d\\u062a\\u0627\\u062c\\u0647\\u0627 \\u0645\\u0639 \\u0641\\u0637\\u0648\\u0631 \\u0633\\u0631\\u064a\\u0639 \\u0645\\u0646 \\u0645\\u0627\\u0643\\u062f\\u0648\\u0646\\u0627\\u0644\\u062f\\u0632. \\u0627\\u0639\\u0631\\u0641 \\u0627\\u0644\\u0645\\u0632\\u064a\\u062f \\u0647\\u0646\\u0627.\",\"en\":\"is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry\'s standard dummy\"}', 8, 0, NULL, 0, 'avocado-cupcake-uvTOR', 1, 2, '2023-12-20 07:48:45', '2023-12-21 19:33:40', '05:18:00', '23:18:00'),
(38, 3, 0, 1, '{\"en\":\"kunafa\",\"ar\":\"\\u0643\\u0646\\u0627\\u0641\\u0629\"}', '{\"ar\":\"\\u0627\\u0644\\u0641\\u0637\\u0648\\u0631 \\u0644\\u0627 \\u064a\\u0643\\u062a\\u0645\\u0644 \\u0628\\u062f\\u0648\\u0646 \\u0642\\u0637\\u0639 \\u0627\\u0644\\u0647\\u0648\\u062a \\u0643\\u064a\\u0643 \\u0627\\u0644\\u0637\\u0631\\u064a\\u0629 \\u0628\\u0627\\u0644\\u0632\\u0628\\u062f\\u0629. \\u062f\\u0644\\u0644 \\u0646\\u0641\\u0633\\u0643 \\u0648\\u0627\\u0639\\u0637\\u0647\\u0627 \\u0627\\u0644\\u062f\\u0641\\u0639\\u0629 \\u0627\\u0644\\u0635\\u0628\\u0627\\u062d\\u064a\\u0629 \\u0627\\u0644\\u0642\\u0648\\u064a\\u0629 \\u0627\\u0644\\u062a\\u064a \\u062a\\u062d\\u062a\\u0627\\u062c\\u0647\\u0627 \\u0645\\u0639 \\u0641\\u0637\\u0648\\u0631 \\u0633\\u0631\\u064a\\u0639 \\u0645\\u0646 \\u0645\\u0627\\u0643\\u062f\\u0648\\u0646\\u0627\\u0644\\u062f\\u0632. \\u0627\\u0639\\u0631\\u0641 \\u0627\\u0644\\u0645\\u0632\\u064a\\u062f \\u0647\\u0646\\u0627.\",\"en\":\"is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry\'s standard dummy\"}', 8, 0, NULL, 0, 'kunafa-GkMgq', 1, 2, '2023-12-20 07:50:30', '2023-12-22 02:51:13', '00:20:00', '23:20:00'),
(39, 3, 0, 1, '{\"en\":\"Basbousa\",\"ar\":\"\\u0628\\u0633\\u0628\\u0648\\u0633\\u0629\"}', '{\"ar\":\"\\u0627\\u0644\\u0641\\u0637\\u0648\\u0631 \\u0644\\u0627 \\u064a\\u0643\\u062a\\u0645\\u0644 \\u0628\\u062f\\u0648\\u0646 \\u0642\\u0637\\u0639 \\u0627\\u0644\\u0647\\u0648\\u062a \\u0643\\u064a\\u0643 \\u0627\\u0644\\u0637\\u0631\\u064a\\u0629 \\u0628\\u0627\\u0644\\u0632\\u0628\\u062f\\u0629. \\u062f\\u0644\\u0644 \\u0646\\u0641\\u0633\\u0643 \\u0648\\u0627\\u0639\\u0637\\u0647\\u0627 \\u0627\\u0644\\u062f\\u0641\\u0639\\u0629 \\u0627\\u0644\\u0635\\u0628\\u0627\\u062d\\u064a\\u0629 \\u0627\\u0644\\u0642\\u0648\\u064a\\u0629 \\u0627\\u0644\\u062a\\u064a \\u062a\\u062d\\u062a\\u0627\\u062c\\u0647\\u0627 \\u0645\\u0639 \\u0641\\u0637\\u0648\\u0631 \\u0633\\u0631\\u064a\\u0639 \\u0645\\u0646 \\u0645\\u0627\\u0643\\u062f\\u0648\\u0646\\u0627\\u0644\\u062f\\u0632. \\u0627\\u0639\\u0631\\u0641 \\u0627\\u0644\\u0645\\u0632\\u064a\\u062f \\u0647\\u0646\\u0627.\",\"en\":\"is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry\'s standard dummy\"}', 8, 0, NULL, 0, 'basbousa-BDZWZ', 1, 2, '2023-12-20 07:51:30', '2023-12-22 02:51:25', '00:21:00', '23:21:00'),
(40, 3, 0, 1, '{\"en\":\"Tulumba\",\"ar\":\"\\u0628\\u0644\\u062d \\u0627\\u0644\\u0634\\u0627\\u0645\"}', '{\"ar\":\"\\u0627\\u0644\\u0641\\u0637\\u0648\\u0631 \\u0644\\u0627 \\u064a\\u0643\\u062a\\u0645\\u0644 \\u0628\\u062f\\u0648\\u0646 \\u0642\\u0637\\u0639 \\u0627\\u0644\\u0647\\u0648\\u062a \\u0643\\u064a\\u0643 \\u0627\\u0644\\u0637\\u0631\\u064a\\u0629 \\u0628\\u0627\\u0644\\u0632\\u0628\\u062f\\u0629. \\u062f\\u0644\\u0644 \\u0646\\u0641\\u0633\\u0643 \\u0648\\u0627\\u0639\\u0637\\u0647\\u0627 \\u0627\\u0644\\u062f\\u0641\\u0639\\u0629 \\u0627\\u0644\\u0635\\u0628\\u0627\\u062d\\u064a\\u0629 \\u0627\\u0644\\u0642\\u0648\\u064a\\u0629 \\u0627\\u0644\\u062a\\u064a \\u062a\\u062d\\u062a\\u0627\\u062c\\u0647\\u0627 \\u0645\\u0639 \\u0641\\u0637\\u0648\\u0631 \\u0633\\u0631\\u064a\\u0639 \\u0645\\u0646 \\u0645\\u0627\\u0643\\u062f\\u0648\\u0646\\u0627\\u0644\\u062f\\u0632. \\u0627\\u0639\\u0631\\u0641 \\u0627\\u0644\\u0645\\u0632\\u064a\\u062f \\u0647\\u0646\\u0627.\",\"en\":\"is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry\'s standard dummy\"}', 8, 0, NULL, 0, 'tulumba-O9urZ', 1, 2, '2023-12-20 07:53:07', '2023-12-22 02:51:40', '00:22:00', '23:22:00'),
(41, 3, 0, 27, '{\"en\":\"coockies\",\"ar\":\"\\u0643\\u0648\\u0643\\u064a\\u0632\"}', '{\"ar\":\"\\u0627\\u0644\\u0641\\u0637\\u0648\\u0631 \\u0644\\u0627 \\u064a\\u0643\\u062a\\u0645\\u0644 \\u0628\\u062f\\u0648\\u0646 \\u0642\\u0637\\u0639 \\u0627\\u0644\\u0647\\u0648\\u062a \\u0643\\u064a\\u0643 \\u0627\\u0644\\u0637\\u0631\\u064a\\u0629 \\u0628\\u0627\\u0644\\u0632\\u0628\\u062f\\u0629. \\u062f\\u0644\\u0644 \\u0646\\u0641\\u0633\\u0643 \\u0648\\u0627\\u0639\\u0637\\u0647\\u0627 \\u0627\\u0644\\u062f\\u0641\\u0639\\u0629 \\u0627\\u0644\\u0635\\u0628\\u0627\\u062d\\u064a\\u0629 \\u0627\\u0644\\u0642\\u0648\\u064a\\u0629 \\u0627\\u0644\\u062a\\u064a \\u062a\\u062d\\u062a\\u0627\\u062c\\u0647\\u0627 \\u0645\\u0639 \\u0641\\u0637\\u0648\\u0631 \\u0633\\u0631\\u064a\\u0639 \\u0645\\u0646 \\u0645\\u0627\\u0643\\u062f\\u0648\\u0646\\u0627\\u0644\\u062f\\u0632. \\u0627\\u0639\\u0631\\u0641 \\u0627\\u0644\\u0645\\u0632\\u064a\\u062f \\u0647\\u0646\\u0627.\",\"en\":\"is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry\'s standard dummy\"}', 8, 0, NULL, 0, 'coockies-Z7vE8', 1, 2, '2023-12-20 07:55:21', '2023-12-21 19:35:05', '05:25:00', '23:25:00'),
(42, 3, 0, 27, '{\"en\":\"chocolate coockies\",\"ar\":\"\\u0643\\u0648\\u0643\\u064a\\u0632 \\u0634\\u0648\\u0643\\u0648\\u0644\\u0627\\u062a\\u0647\"}', '{\"ar\":\"\\u0627\\u0644\\u0641\\u0637\\u0648\\u0631 \\u0644\\u0627 \\u064a\\u0643\\u062a\\u0645\\u0644 \\u0628\\u062f\\u0648\\u0646 \\u0642\\u0637\\u0639 \\u0627\\u0644\\u0647\\u0648\\u062a \\u0643\\u064a\\u0643 \\u0627\\u0644\\u0637\\u0631\\u064a\\u0629 \\u0628\\u0627\\u0644\\u0632\\u0628\\u062f\\u0629. \\u062f\\u0644\\u0644 \\u0646\\u0641\\u0633\\u0643 \\u0648\\u0627\\u0639\\u0637\\u0647\\u0627 \\u0627\\u0644\\u062f\\u0641\\u0639\\u0629 \\u0627\\u0644\\u0635\\u0628\\u0627\\u062d\\u064a\\u0629 \\u0627\\u0644\\u0642\\u0648\\u064a\\u0629 \\u0627\\u0644\\u062a\\u064a \\u062a\\u062d\\u062a\\u0627\\u062c\\u0647\\u0627 \\u0645\\u0639 \\u0641\\u0637\\u0648\\u0631 \\u0633\\u0631\\u064a\\u0639 \\u0645\\u0646 \\u0645\\u0627\\u0643\\u062f\\u0648\\u0646\\u0627\\u0644\\u062f\\u0632. \\u0627\\u0639\\u0631\\u0641 \\u0627\\u0644\\u0645\\u0632\\u064a\\u062f \\u0647\\u0646\\u0627.\",\"en\":\"is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry\'s standard dummy\"}', 8, 0, NULL, 0, 'chocolate-coockies-go5r3', 1, 2, '2023-12-20 07:56:17', '2023-12-21 19:35:29', '05:26:00', '23:26:00'),
(43, 3, 0, 29, '{\"en\":\"Strawberry cheesecake\",\"ar\":\"\\u062a\\u0634\\u064a\\u0632 \\u0643\\u064a\\u0643 \\u0641\\u0631\\u0627\\u0648\\u0644\\u0629\"}', '{\"ar\":\"\\u0627\\u0644\\u0641\\u0637\\u0648\\u0631 \\u0644\\u0627 \\u064a\\u0643\\u062a\\u0645\\u0644 \\u0628\\u062f\\u0648\\u0646 \\u0642\\u0637\\u0639 \\u0627\\u0644\\u0647\\u0648\\u062a \\u0643\\u064a\\u0643 \\u0627\\u0644\\u0637\\u0631\\u064a\\u0629 \\u0628\\u0627\\u0644\\u0632\\u0628\\u062f\\u0629. \\u062f\\u0644\\u0644 \\u0646\\u0641\\u0633\\u0643 \\u0648\\u0627\\u0639\\u0637\\u0647\\u0627 \\u0627\\u0644\\u062f\\u0641\\u0639\\u0629 \\u0627\\u0644\\u0635\\u0628\\u0627\\u062d\\u064a\\u0629 \\u0627\\u0644\\u0642\\u0648\\u064a\\u0629 \\u0627\\u0644\\u062a\\u064a \\u062a\\u062d\\u062a\\u0627\\u062c\\u0647\\u0627 \\u0645\\u0639 \\u0641\\u0637\\u0648\\u0631 \\u0633\\u0631\\u064a\\u0639 \\u0645\\u0646 \\u0645\\u0627\\u0643\\u062f\\u0648\\u0646\\u0627\\u0644\\u062f\\u0632. \\u0627\\u0639\\u0631\\u0641 \\u0627\\u0644\\u0645\\u0632\\u064a\\u062f \\u0647\\u0646\\u0627.\",\"en\":\"is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry\'s standard dummy\"}', 8, 0, NULL, 0, 'strawberry-cheesecake-BreY9', 1, 2, '2023-12-20 07:58:36', '2023-12-21 19:35:54', '05:28:00', '23:28:00'),
(44, 3, 0, 30, '{\"en\":\"Strawberry jelly\",\"ar\":\"\\u062c\\u064a\\u0644\\u064a \\u0641\\u0631\\u0627\\u0648\\u0644\\u0629\"}', '{\"ar\":\"\\u0627\\u0644\\u0641\\u0637\\u0648\\u0631 \\u0644\\u0627 \\u064a\\u0643\\u062a\\u0645\\u0644 \\u0628\\u062f\\u0648\\u0646 \\u0642\\u0637\\u0639 \\u0627\\u0644\\u0647\\u0648\\u062a \\u0643\\u064a\\u0643 \\u0627\\u0644\\u0637\\u0631\\u064a\\u0629 \\u0628\\u0627\\u0644\\u0632\\u0628\\u062f\\u0629. \\u062f\\u0644\\u0644 \\u0646\\u0641\\u0633\\u0643 \\u0648\\u0627\\u0639\\u0637\\u0647\\u0627 \\u0627\\u0644\\u062f\\u0641\\u0639\\u0629 \\u0627\\u0644\\u0635\\u0628\\u0627\\u062d\\u064a\\u0629 \\u0627\\u0644\\u0642\\u0648\\u064a\\u0629 \\u0627\\u0644\\u062a\\u064a \\u062a\\u062d\\u062a\\u0627\\u062c\\u0647\\u0627 \\u0645\\u0639 \\u0641\\u0637\\u0648\\u0631 \\u0633\\u0631\\u064a\\u0639 \\u0645\\u0646 \\u0645\\u0627\\u0643\\u062f\\u0648\\u0646\\u0627\\u0644\\u062f\\u0632. \\u0627\\u0639\\u0631\\u0641 \\u0627\\u0644\\u0645\\u0632\\u064a\\u062f \\u0647\\u0646\\u0627.\",\"en\":\"is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry\'s standard dummy\"}', 8, 0, NULL, 0, 'strawberry-jelly-bZymg', 1, 2, '2023-12-20 08:00:37', '2023-12-22 02:53:37', '00:30:00', '23:30:00'),
(45, 3, 0, 30, '{\"en\":\"jelly beans\",\"ar\":\"\\u062d\\u0628\\u0627\\u062a \\u062c\\u064a\\u0644\\u064a\"}', '{\"ar\":\"\\u0627\\u0644\\u0641\\u0637\\u0648\\u0631 \\u0644\\u0627 \\u064a\\u0643\\u062a\\u0645\\u0644 \\u0628\\u062f\\u0648\\u0646 \\u0642\\u0637\\u0639 \\u0627\\u0644\\u0647\\u0648\\u062a \\u0643\\u064a\\u0643 \\u0627\\u0644\\u0637\\u0631\\u064a\\u0629 \\u0628\\u0627\\u0644\\u0632\\u0628\\u062f\\u0629. \\u062f\\u0644\\u0644 \\u0646\\u0641\\u0633\\u0643 \\u0648\\u0627\\u0639\\u0637\\u0647\\u0627 \\u0627\\u0644\\u062f\\u0641\\u0639\\u0629 \\u0627\\u0644\\u0635\\u0628\\u0627\\u062d\\u064a\\u0629 \\u0627\\u0644\\u0642\\u0648\\u064a\\u0629 \\u0627\\u0644\\u062a\\u064a \\u062a\\u062d\\u062a\\u0627\\u062c\\u0647\\u0627 \\u0645\\u0639 \\u0641\\u0637\\u0648\\u0631 \\u0633\\u0631\\u064a\\u0639 \\u0645\\u0646 \\u0645\\u0627\\u0643\\u062f\\u0648\\u0646\\u0627\\u0644\\u062f\\u0632. \\u0627\\u0639\\u0631\\u0641 \\u0627\\u0644\\u0645\\u0632\\u064a\\u062f \\u0647\\u0646\\u0627.\",\"en\":\"is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry\'s standard dummy\"}', 8, 0, NULL, 0, 'jelly-beans-QR7id', 1, 2, '2023-12-20 08:01:37', '2023-12-22 02:52:39', '00:31:00', '23:31:00'),
(46, 20, 0, 31, '{\"en\":\"sssssss\"}', '{\"ar\":\"222222\",\"en\":\"222222222\"}', 10, 10, NULL, 2222220, 'sssssss-rlSij', 1, 2, '2023-12-21 00:31:03', '2023-12-21 00:31:03', '12:01:00', '23:49:00'),
(47, 20, 0, 31, '{\"en\":\"\\u0628\\u0631\\u062c\\u0631 \\u0644\\u062d\\u0645\",\"ar\":\"\\u0628\\u0631\\u062c\\u0631 \\u0644\\u062d\\u0645\"}', '{\"ar\":\"\\u0628\\u0631\\u062c\\u0631 \\u0644\\u062d\\u0645\",\"en\":\"\\u0628\\u0631\\u062c\\u0631 \\u0644\\u062d\\u0645\"}', 8, 0, NULL, 0, 'brgr-lhm-8h187', 1, 2, '2023-12-21 00:36:24', '2023-12-20 23:37:09', '12:01:00', '11:35:00'),
(48, 24, 0, 32, '{\"en\":\"\\u0628\\u0631\\u062c\\u0631 \\u0644\\u062d\\u0645\"}', '{\"ar\":\"\\u0628\\u0631\\u062c\\u0631 \\u0644\\u062d\\u0645\",\"en\":\"\\u0628\\u0631\\u062c\\u0631 \\u0644\\u062d\\u0645\"}', 5, NULL, NULL, 0, 'brgr-lhm-6Iyc1', 1, 2, '2023-12-21 00:42:10', '2023-12-21 00:42:10', '23:41:00', '11:41:00'),
(49, 5, 8, 2, '{\"en\":\"bauble burger\",\"ar\":\"\\u062f\\u0628\\u0644 \\u0628\\u0631\\u062c\\u0631\"}', '{\"ar\":\"\\u0628\\u0631\\u062c\\u0631 \\u0643\\u0646\\u062c \\u0647\\u0648 \\u0645\\u0637\\u0639\\u0645 \\u0641\\u064a \\u0627\\u0644\\u0643\\u0648\\u064a\\u062a \\u064a\\u0642\\u062f\\u0645 \\u0623\\u0643\\u0644\\u0627\\u062a \\u0645\\u0646 \\u0627\\u0644\\u0645\\u0637\\u0628\\u062e \\u0628\\u0631\\u062c\\u0631 \\u0648\\u064a\\u0648\\u0635\\u0644 \\u0625\\u0644\\u0649 \\u0627\\u0644\\u0632\\u0647\\u0631\\u0627\\u0621, \\u0635\\u0628\\u0627\\u062d \\u0627\\u0644\\u0623\\u062d\\u0645\\u062f  \\u0648 \\u0627\\u0628\\u0648\\u062d\\u0644\\u064a\\u0641\\u0629. \\u0645\\u0646 \\u0627\\u0644\\u0623\\u0637\\u0628\\u0627\\u0642 \\u0627\\u0644\\u0623\\u0643\\u062b\\u0631 \\u0645\\u0628\\u064a\\u0639\\u0627\\u064b \\u060c \\u0644\\u0643\\u0646 \\u0644\\u062f\\u064a\\u0647\\u0645 \\u062e\\u064a\\u0627\\u0631\\u0627\\u062a \\u0623\\u062e\\u0631\\u0649 \\u0645\\u062b\\u0644 .\",\"en\":\"is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry\'s standard dummy\"}', 7, 5, NULL, 0, 'bauble-burger-qtfKN', 1, 1, '2023-12-23 20:41:35', '2023-12-23 23:17:08', '00:34:00', '23:59:00'),
(50, 18, 0, 15, '{\"en\":\"potato\",\"ar\":\"\\u0628\\u0637\\u0627\\u0637\\u0633\"}', '{\"ar\":\"1 \\u0643\\u064a\\u0644\\u0648\",\"en\":\"1 Kilo\"}', 20, NULL, NULL, 0, 'btats-k6RLH', 1, 2, '2023-12-24 12:56:49', '2023-12-24 14:10:44', '00:00:00', '23:59:00'),
(52, 18, 0, 15, '{\"en\":\"White Onion\",\"ar\":\"\\u0628\\u0635\\u0644 \\u0627\\u0628\\u064a\\u0636\"}', '{\"ar\":\"1 \\u0643\\u064a\\u0644\\u0648\",\"en\":\"1 Kilo\"}', 32, NULL, NULL, 0, 'white-onion-A7T8d', 1, 2, '2023-12-24 13:02:02', '2023-12-24 14:11:16', '00:00:00', '23:59:00'),
(53, 18, 0, 15, '{\"en\":\"Red Onion\",\"ar\":\"\\u0628\\u0635\\u0644 \\u0627\\u062d\\u0645\\u0631\"}', '{\"ar\":\"1 \\u0643\\u064a\\u0644\\u0648\",\"en\":\"1 Kilo\"}', 32, NULL, NULL, 0, 'red-onion-BGJu1', 1, 2, '2023-12-24 13:06:05', '2023-12-24 14:11:42', '00:00:00', '23:59:00'),
(54, 18, 0, 15, '{\"en\":\"Green peas\",\"ar\":\"\\u0628\\u0633\\u0644\\u0629\"}', '{\"ar\":\"1 \\u0643\\u064a\\u0644\\u0648\",\"en\":\"1 Kilo\"}', 35, NULL, NULL, 0, 'green-peas-TWUMK', 1, 2, '2023-12-24 13:09:03', '2023-12-24 14:12:01', '00:00:00', '23:59:00'),
(55, 18, 0, 15, '{\"en\":\"Grean Beans\"}', '{\"ar\":\"1 \\u0643\\u064a\\u0644\\u0648\",\"en\":\"1 Kilo\"}', 15, NULL, NULL, 0, 'grean-beans-7IF6W', 1, 2, '2023-12-24 13:14:00', '2023-12-24 13:14:00', '00:00:00', '23:59:00'),
(56, 18, 0, 15, '{\"en\":\"zucchini\"}', '{\"ar\":\"1 \\u0643\\u064a\\u0644\\u0648\",\"en\":\"1 Kilo\"}', 20, NULL, NULL, 0, 'zucchini-51sid', 1, 2, '2023-12-24 13:16:02', '2023-12-24 13:16:02', '00:00:00', '23:59:00');

-- --------------------------------------------------------

--
-- بنية الجدول `item_images`
--

CREATE TABLE `item_images` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `item_id` bigint(20) UNSIGNED NOT NULL,
  `image` varchar(255) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- إرجاع أو استيراد بيانات الجدول `item_images`
--

INSERT INTO `item_images` (`id`, `item_id`, `image`, `created_at`, `updated_at`) VALUES
(4, 4, 'item-6500cd9e7b58b.jpg', '2023-09-13 00:44:14', '2023-09-13 00:44:14'),
(5, 5, 'item-6500cdbb3572b.jpg', '2023-09-13 00:44:43', '2023-09-13 00:44:43'),
(6, 6, 'item-6500cdda84cdb.jpg', '2023-09-13 00:45:14', '2023-09-13 00:45:14'),
(7, 7, 'item-6500cdf7b7ee4.jpg', '2023-09-13 00:45:43', '2023-09-13 00:45:43'),
(8, 8, 'item-6500ce1494802.jpg', '2023-09-13 00:46:12', '2023-09-13 00:46:12'),
(9, 9, 'item-6500ce389d3c5.jpg', '2023-09-13 00:46:48', '2023-09-13 00:46:48'),
(10, 10, 'item-6500d0dc57229.jpg', '2023-09-13 00:58:04', '2023-09-13 00:58:04'),
(11, 11, 'item-6500d0f903487.jpg', '2023-09-13 00:58:33', '2023-09-13 00:58:33'),
(12, 12, 'item-6500d11252808.jpg', '2023-09-13 00:58:58', '2023-09-13 00:58:58'),
(13, 13, 'item-6500d1325583d.jpg', '2023-09-13 00:59:30', '2023-09-13 00:59:30'),
(14, 14, 'item-6500d153e3bef.jpg', '2023-09-13 01:00:03', '2023-09-13 01:00:03'),
(15, 15, 'item-6500d16a39d3b.jpg', '2023-09-13 01:00:26', '2023-09-13 01:00:26'),
(16, 2, 'item-6578d2914b008.jpg', '2023-09-16 05:50:39', '2023-12-13 00:37:21'),
(17, 2, 'item-651eccdbaa8e0.jpg', '2023-10-05 14:48:59', '2023-10-05 14:48:59'),
(18, 3, 'item-6579363acd741.jpg', '2023-10-05 14:51:01', '2023-12-13 07:42:34'),
(20, 17, 'item-6578d3e32a2b1.jpg', '2023-10-06 17:38:49', '2023-12-13 00:42:59'),
(22, 19, 'item-6578dc1b3e77b.jpg', '2023-12-13 02:18:03', '2023-12-13 02:18:03'),
(23, 20, 'item-657a1dd340a7d.jpg', '2023-12-14 01:10:43', '2023-12-14 01:10:43'),
(24, 21, 'item-657a1fe55809a.jpg', '2023-12-14 01:19:33', '2023-12-14 01:19:33'),
(25, 22, 'item-657a23116eac0.jpg', '2023-12-14 01:33:05', '2023-12-14 01:33:05'),
(26, 23, 'item-657a239733c7b.jpg', '2023-12-14 01:35:19', '2023-12-14 01:35:19'),
(27, 24, 'item-657a23e5af547.jpg', '2023-12-14 01:36:37', '2023-12-14 01:36:37'),
(28, 25, 'item-65880f299fc8e.JPG', '2023-12-14 02:04:04', '2023-12-24 13:59:53'),
(29, 26, 'item-6581bdf53a9bb.jpg', '2023-12-19 19:59:49', '2023-12-19 19:59:49'),
(30, 27, 'item-6581be6b1c10c.jpg', '2023-12-19 20:01:47', '2023-12-19 20:01:47'),
(31, 28, 'item-6581bebea67f1.jpg', '2023-12-19 20:03:10', '2023-12-19 20:03:10'),
(32, 29, 'item-6581bf2ccb4b9.jpg', '2023-12-19 20:05:00', '2023-12-19 20:05:00'),
(33, 30, 'item-65824c0437a96.jpg', '2023-12-20 07:35:56', '2023-12-20 07:35:56'),
(34, 31, 'item-65824c5472881.jpg', '2023-12-20 07:37:16', '2023-12-20 07:37:16'),
(35, 32, 'item-65824cbd999f8.jpg', '2023-12-20 07:39:01', '2023-12-20 07:39:01'),
(36, 33, 'item-65824de2962e0.jpg', '2023-12-20 07:43:54', '2023-12-20 07:43:54'),
(37, 34, 'item-65824e4e1022b.jpg', '2023-12-20 07:45:42', '2023-12-20 07:45:42'),
(38, 35, 'item-65824e979f4a2.jpg', '2023-12-20 07:46:55', '2023-12-20 07:46:55'),
(39, 36, 'item-65824ece2e0af.jpg', '2023-12-20 07:47:50', '2023-12-20 07:47:50'),
(40, 37, 'item-65824f059a16f.jpg', '2023-12-20 07:48:45', '2023-12-20 07:48:45'),
(41, 38, 'item-65824f6eca466.jpg', '2023-12-20 07:50:30', '2023-12-20 07:50:30'),
(42, 39, 'item-65824faa4fe19.jpg', '2023-12-20 07:51:30', '2023-12-20 07:51:30'),
(43, 40, 'item-6582500b32994.jpg', '2023-12-20 07:53:07', '2023-12-20 07:53:07'),
(44, 41, 'item-658250913d18a.jpg', '2023-12-20 07:55:21', '2023-12-20 07:55:21'),
(45, 42, 'item-658250c9a07b8.jpg', '2023-12-20 07:56:17', '2023-12-20 07:56:17'),
(46, 43, 'item-6582515471c8d.jpg', '2023-12-20 07:58:36', '2023-12-20 07:58:36'),
(47, 44, 'item-658251cd7dab4.jpg', '2023-12-20 08:00:37', '2023-12-20 08:00:37'),
(48, 45, 'item-658252091dcc3.jpg', '2023-12-20 08:01:37', '2023-12-20 08:01:37'),
(49, 46, 'item-65834f07993ff.jpeg', '2023-12-21 00:31:03', '2023-12-21 00:31:03'),
(50, 47, 'item-6583504860a9c.jpg', '2023-12-21 00:36:24', '2023-12-21 00:36:24'),
(51, 48, 'item-658351a247ed7.jpeg', '2023-12-21 00:42:10', '2023-12-21 00:42:10'),
(52, 49, 'item-65870dbf87d6d.jpg', '2023-12-23 20:41:35', '2023-12-23 20:41:35'),
(53, 50, 'item-65880e717fd47.JPG', '2023-12-24 12:56:49', '2023-12-24 12:56:49'),
(55, 52, 'item-65880faa9f41d.JPG', '2023-12-24 13:02:02', '2023-12-24 13:02:02'),
(56, 53, 'item-6588109d58743.JPG', '2023-12-24 13:06:05', '2023-12-24 13:06:05'),
(57, 54, 'item-6588114fb94e4.JPG', '2023-12-24 13:09:03', '2023-12-24 13:09:03'),
(58, 55, 'item-65881278994e6.JPG', '2023-12-24 13:14:00', '2023-12-24 13:14:00'),
(59, 56, 'item-658812f2aa7d3.JPG', '2023-12-24 13:16:02', '2023-12-24 13:16:02');

-- --------------------------------------------------------

--
-- بنية الجدول `languages`
--

CREATE TABLE `languages` (
  `id` int(10) UNSIGNED NOT NULL,
  `code` varchar(255) NOT NULL,
  `name` varchar(255) NOT NULL,
  `image` varchar(255) NOT NULL,
  `layout` int(11) NOT NULL DEFAULT 1 COMMENT '1=ltr,2=rtl',
  `is_default` int(11) NOT NULL DEFAULT 2 COMMENT '1 = yes , 2 = no',
  `is_available` int(11) NOT NULL DEFAULT 1 COMMENT '1=yes,2=no',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- إرجاع أو استيراد بيانات الجدول `languages`
--

INSERT INTO `languages` (`id`, `code`, `name`, `image`, `layout`, `is_default`, `is_available`, `created_at`, `updated_at`) VALUES
(1, 'en', 'English', 'flag-64d6042139e60.png', 1, 1, 1, '2022-12-13 05:15:46', '2023-08-14 03:14:59'),
(2, 'ar', 'Arabic', 'flag-64fb5e1f700d8.jpg', 2, 2, 1, '2023-09-08 17:47:11', '2023-09-08 17:47:11');

-- --------------------------------------------------------

--
-- بنية الجدول `migrations`
--

CREATE TABLE `migrations` (
  `id` int(10) UNSIGNED NOT NULL,
  `migration` varchar(255) NOT NULL,
  `batch` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- إرجاع أو استيراد بيانات الجدول `migrations`
--

INSERT INTO `migrations` (`id`, `migration`, `batch`) VALUES
(1, '2014_10_12_000000_create_users_table', 1),
(2, '2021_12_20_101946_create_settings_table', 2),
(3, '2021_12_20_121616_create_categories_table', 3),
(4, '2021_12_22_072131_create_cuisines_table', 4),
(5, '2021_12_23_065134_create_menuses_table', 5),
(6, '2014_10_12_100000_create_password_resets_table', 6),
(7, '2019_08_19_000000_create_failed_jobs_table', 6),
(8, '2019_12_14_000001_create_personal_access_tokens_table', 6),
(9, '2022_11_14_051836_create_banner_image_table', 6),
(10, '2022_11_14_053221_create_banner_image_table', 7),
(11, '2023_09_14_124647_create_coupon_items_table', 8),
(13, '2023_09_30_131954_create_permission_tables', 9),
(14, '2023_10_06_000000_add_columns_to_settings_table', 10),
(15, '2023_10_11_000000_add_columns_to_orders_table', 10),
(16, '2023_10_14_000000_add_columns_to_orders_table', 10),
(17, '2023_10_26_000000_add_columns_to_items_table', 10),
(18, '2023_11_12_050426_create_user_addresses_table', 1),
(19, '2023_11_12_050426_create_user_addresses_table', 1),
(20, '2023_11_19_000000_add_columns_to_deliveryareas_table', 11),
(21, '2023_12_04_000000_add_columns_to_settings_table', 11),
(22, '2023_12_07_000000_add_columns_to_user_addresses_table', 11),
(23, '2023_12_27_050426_create_branches_table', 11),
(24, '2023_12_31_000000_add_columns_to_orders_table', 11),
(25, '2024_01_4_050426_add_columns_to_branches_table', 12);

-- --------------------------------------------------------

--
-- بنية الجدول `model_has_permissions`
--

CREATE TABLE `model_has_permissions` (
  `permission_id` bigint(20) UNSIGNED NOT NULL,
  `model_type` varchar(255) NOT NULL,
  `model_id` bigint(20) UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- بنية الجدول `model_has_roles`
--

CREATE TABLE `model_has_roles` (
  `role_id` bigint(20) UNSIGNED NOT NULL,
  `model_type` varchar(255) NOT NULL,
  `model_id` bigint(20) UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- إرجاع أو استيراد بيانات الجدول `model_has_roles`
--

INSERT INTO `model_has_roles` (`role_id`, `model_type`, `model_id`) VALUES
(2, 'App\\Models\\User', 1),
(6, 'App\\Models\\User', 6),
(6, 'App\\Models\\User', 7),
(6, 'App\\Models\\User', 21),
(6, 'App\\Models\\User', 23),
(8, 'App\\Models\\User', 2),
(8, 'App\\Models\\User', 3),
(8, 'App\\Models\\User', 4),
(8, 'App\\Models\\User', 5),
(8, 'App\\Models\\User', 18),
(8, 'App\\Models\\User', 19),
(8, 'App\\Models\\User', 20),
(8, 'App\\Models\\User', 22),
(8, 'App\\Models\\User', 24),
(8, 'App\\Models\\User', 25);

-- --------------------------------------------------------

--
-- بنية الجدول `orders`
--

CREATE TABLE `orders` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `vendor_id` int(11) NOT NULL,
  `user_id` int(11) DEFAULT NULL,
  `order_number` varchar(100) NOT NULL,
  `payment_type` int(11) NOT NULL,
  `payment_id` text DEFAULT NULL,
  `sub_total` varchar(255) NOT NULL,
  `tax` varchar(255) DEFAULT NULL,
  `grand_total` varchar(255) NOT NULL,
  `order_type` int(11) NOT NULL DEFAULT 1 COMMENT '1 = Delivery (Dine_in - POS) , 2 = Pickup (TakeAway -POS)\r\n3 = Dine In (Front)',
  `table_id` int(11) DEFAULT NULL,
  `address` varchar(255) DEFAULT NULL,
  `pincode` varchar(10) DEFAULT NULL,
  `building` varchar(255) DEFAULT NULL,
  `landmark` varchar(255) DEFAULT NULL,
  `delivery_area` varchar(255) DEFAULT NULL,
  `delivery_charge` varchar(50) DEFAULT NULL,
  `discount_amount` varchar(255) DEFAULT NULL,
  `couponcode` varchar(255) DEFAULT NULL,
  `order_notes` text DEFAULT NULL,
  `customer_name` text DEFAULT NULL,
  `customer_email` text DEFAULT NULL,
  `mobile` text DEFAULT NULL,
  `delivery_date` varchar(255) DEFAULT NULL,
  `delivery_time` varchar(255) DEFAULT NULL,
  `order_from` varchar(255) DEFAULT NULL,
  `status` int(11) NOT NULL COMMENT '1  = pending , 2 = processing , 3 = deliverd , 4 = cancelled',
  `is_notification` int(11) NOT NULL DEFAULT 1 COMMENT '1 = Unread , 2 = Read',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `block` text DEFAULT NULL,
  `street` text DEFAULT NULL,
  `house_num` text DEFAULT NULL,
  `latitude` text DEFAULT NULL,
  `longitude` text DEFAULT NULL,
  `branch_id` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- إرجاع أو استيراد بيانات الجدول `orders`
--

INSERT INTO `orders` (`id`, `vendor_id`, `user_id`, `order_number`, `payment_type`, `payment_id`, `sub_total`, `tax`, `grand_total`, `order_type`, `table_id`, `address`, `pincode`, `building`, `landmark`, `delivery_area`, `delivery_charge`, `discount_amount`, `couponcode`, `order_notes`, `customer_name`, `customer_email`, `mobile`, `delivery_date`, `delivery_time`, `order_from`, `status`, `is_notification`, `created_at`, `updated_at`, `block`, `street`, `house_num`, `latitude`, `longitude`, `branch_id`) VALUES
(1, 3, NULL, 'Y4OV4GFHHV', 1, NULL, '2.5', '0', '4.5', 1, NULL, 'Kuwait, Salmyia . Salem Almubarik St, Kuwait, Jahra 5st', '20001', 'asads', 'dfgh', 'ahmad', '2', '0', NULL, NULL, 'ahmad abdelaziz', 'ahmad.abdelaziz92@live.com', '55140309', '2023-09-12', '12:00 PM - 01:00 PM', NULL, 5, 1, '2023-09-09 03:40:54', '2023-09-08 22:11:58', '', '', '', '', '', NULL),
(2, 3, NULL, '7M2QYAU2YJ', 1, NULL, '2.5', '0', '4.5', 1, NULL, 'sdfg', '32', 'sdfg', 'fgh', 'ahmad', '2', '0', NULL, NULL, 'sdfgh', 'ah@2df.com', '31456875', '2023-09-27', '10:00 AM - 11:00 AM', NULL, 1, 1, '2023-09-09 05:34:42', '2023-09-09 05:34:42', '', '', '', '', '', NULL),
(3, 4, NULL, '6IQYVAX5CW', 1, NULL, '65', '0', '75', 1, NULL, 'ك', NULL, NULL, NULL, 'منطقه ك', '10', '0', NULL, NULL, 'Kareem Farouq', 'kareem.farouq123@gmail.com', '01030817839', '2023-09-14', '04:00 PM - 05:00 PM', NULL, 5, 1, '2023-09-14 00:13:30', '2023-09-13 20:17:27', '', '', '', '', '', NULL),
(4, 5, NULL, 'S7ZTCZ393U', 1, NULL, '20', '0', '20.25', 1, NULL, NULL, '2222', NULL, NULL, 'ابو حليفة', '0.25', '0', NULL, 'ضضض', '222', 'tifa.ahmed23@gmail.com', '222', NULL, NULL, NULL, 2, 1, '2023-10-15 00:39:18', '2023-12-12 22:17:06', '222', '22', '2222', '30.0588', '31.2268', NULL),
(5, 5, NULL, 'WDZ4A5XG0X', 1, NULL, '10', '0', '10', 1, NULL, NULL, NULL, NULL, NULL, 'ابو حليفة', '0', '0', NULL, NULL, 'ahmad abdelaziz', 'a@a.com', '55801615', NULL, NULL, NULL, 1, 1, '2023-10-15 00:39:42', '2023-10-15 00:39:42', NULL, NULL, NULL, NULL, NULL, NULL),
(6, 5, NULL, 'ZW2AXQ0AVC', 1, NULL, '10', '0', '10.25', 1, NULL, NULL, NULL, NULL, NULL, 'ابو حليفة', '0.25', '0', NULL, NULL, 'ahmad abdelaziz', 'a@a.com', '55801615', NULL, NULL, NULL, 1, 1, '2023-10-15 00:41:17', '2023-10-15 00:41:17', NULL, NULL, NULL, NULL, NULL, NULL),
(7, 5, NULL, '5GUFR9LSQO', 1, NULL, '20', '0', '20.25', 1, NULL, NULL, NULL, NULL, NULL, 'ابو حليفة', '0.25', '0', NULL, NULL, 'aaa', 'z@a.com', '545654', NULL, NULL, NULL, 1, 1, '2023-10-15 14:29:13', '2023-10-15 14:29:13', '5', '4', '3', '29.3645', '47.9889', NULL),
(8, 5, NULL, 'KP0KSFTRUG', 1, NULL, '5', '0', '5', 2, NULL, '', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'walk-in customer', NULL, NULL, '2023-10-15', NULL, 'pos', 2, 2, '2023-10-15 14:30:40', '2023-10-15 14:30:40', NULL, NULL, NULL, NULL, NULL, NULL),
(9, 5, NULL, 'B70PN1RNWH', 1, NULL, '17', '0', '17.25', 1, NULL, NULL, '13265', NULL, NULL, 'ابو حليفة', '0.25', '0', NULL, NULL, 'ahmad abdelaziz', 'a@a.com', '55801615', NULL, NULL, NULL, 1, 1, '2023-10-30 07:54:52', '2023-10-30 07:54:52', '7', 'Ww', '23', '29.3471697', '48.0878922', NULL),
(10, 5, 12, 'MQJCW2SDDZ', 1, NULL, '5', '0', '5.25', 1, NULL, 'Address', '123456', '10', '10', 'ayoun', '0.25', '0', NULL, '11111111', 'mostafa', 'tifa.ahmed23@gmail.com', '01157751549', NULL, NULL, NULL, 1, 1, '2023-11-19 03:41:56', '2023-11-19 03:41:56', '10', '10', '10', '30.06200040392259', '31.372102098364252', NULL),
(11, 5, NULL, 'M7Y6SAZ2L6', 1, NULL, '10', '0', '10.25', 1, NULL, 'Kuwait, Jahra 5st', '55200', '1', 'كافيه ديجول', 'ابو حليفة', '0.25', '0', NULL, NULL, 'Mahmoud', 'ahmad.abdelazi2@live.com', '55140309', NULL, NULL, NULL, 2, 1, '2023-11-21 01:14:57', '2023-11-21 00:23:03', '7', 'Kuwait, Salmyia . Salem Almubarik St, Kuwait, Jahra 5st', NULL, NULL, NULL, NULL),
(12, 5, NULL, '7ZLJOL8C4U', 1, NULL, '5', '0', '5', 2, NULL, '', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'walk-in customer', NULL, NULL, '2023-12-12', NULL, 'pos', 2, 2, '2023-12-12 22:59:36', '2023-12-12 22:59:36', NULL, NULL, NULL, NULL, NULL, NULL),
(13, 5, NULL, 'RIJVUA6EQO', 1, NULL, '20', '0', '20.25', 1, NULL, NULL, NULL, 'as', 'as', 'ابو حليفة', '0.25', '0', '123456', NULL, 'aaa', 'a.f@d.com', '55140309', NULL, NULL, NULL, 5, 1, '2023-12-12 23:13:13', '2023-12-12 22:21:15', '3', 'sds', '33', NULL, NULL, NULL),
(14, 5, NULL, '7KXBV3S2J0', 1, NULL, '15', '0', '15', 2, NULL, '', '', '', '', NULL, '0.00', '0', NULL, NULL, 'ahmad abdelaziz', 'a@a.com', '55801615', NULL, NULL, NULL, 1, 1, '2023-12-19 18:02:57', '2023-12-19 18:02:57', NULL, NULL, NULL, NULL, NULL, NULL),
(15, 5, NULL, '1U0Y82UP01', 1, NULL, '5', '0', '5', 2, NULL, '', '', '', '', NULL, '0.00', '0', NULL, NULL, 'ahmad abdelaziz', 'a@a.com', '55801615', NULL, NULL, NULL, 1, 1, '2023-12-19 18:05:10', '2023-12-19 18:05:10', NULL, NULL, NULL, NULL, NULL, NULL),
(16, 3, NULL, 'C3RMCUOKMW', 1, NULL, '24', '0', '24', 2, NULL, '', '', '', '', NULL, '0.00', '0', NULL, NULL, 'ahmad abdelaziz', 'a@a.com', '55801615', NULL, NULL, NULL, 1, 1, '2023-12-20 08:13:16', '2023-12-20 08:13:16', NULL, NULL, NULL, NULL, NULL, NULL),
(17, 3, NULL, 'UGS4VGHS5B', 0, NULL, '16', '0', '16', 2, NULL, '', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'walk-in customer', NULL, NULL, '2023-12-20', NULL, 'pos', 2, 2, '2023-12-20 08:19:30', '2023-12-20 08:19:30', NULL, NULL, NULL, NULL, NULL, NULL),
(18, 3, NULL, '4XWE1Z2AF9', 1, NULL, '16', '0', '16', 2, NULL, '', '', '', '', NULL, '0.00', '0', NULL, NULL, 'ahmad abdelaziz', 'a@a.com', '55801615', NULL, NULL, NULL, 1, 1, '2023-12-20 08:55:32', '2023-12-20 08:55:32', NULL, NULL, NULL, NULL, NULL, NULL);

-- --------------------------------------------------------

--
-- بنية الجدول `order_details`
--

CREATE TABLE `order_details` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `order_id` bigint(20) UNSIGNED DEFAULT NULL,
  `item_id` bigint(20) UNSIGNED DEFAULT NULL,
  `item_name` varchar(255) DEFAULT NULL,
  `item_image` varchar(255) DEFAULT NULL,
  `extras_id` varchar(255) DEFAULT NULL,
  `extras_name` varchar(255) DEFAULT NULL,
  `extras_price` varchar(255) DEFAULT NULL,
  `price` varchar(255) NOT NULL,
  `variants_id` varchar(255) DEFAULT NULL,
  `variants_name` varchar(255) DEFAULT NULL,
  `variants_price` varchar(255) DEFAULT NULL,
  `qty` varchar(255) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- إرجاع أو استيراد بيانات الجدول `order_details`
--

INSERT INTO `order_details` (`id`, `order_id`, `item_id`, `item_name`, `item_image`, `extras_id`, `extras_name`, `extras_price`, `price`, `variants_id`, `variants_name`, `variants_price`, `qty`, `created_at`, `updated_at`) VALUES
(1, 1, 1, 'box', 'item-64fb97bf71212.jpg', NULL, NULL, NULL, '2.5', '1', 'cheese', '2.5', '1', '2023-09-09 03:40:54', '2023-09-09 03:40:54'),
(2, 2, 1, 'box', 'item-64fb97bf71212.jpg', NULL, NULL, NULL, '2.5', '1', 'cheese', '2.5', '1', '2023-09-09 05:34:42', '2023-09-09 05:34:42'),
(3, 3, 4, 'طماطم', 'item-6500cd9e7b58b.jpg', NULL, NULL, NULL, '5', NULL, NULL, NULL, '1', '2023-09-14 00:13:30', '2023-09-14 00:13:30'),
(4, 3, 6, 'ليمون', 'item-6500cdda84cdb.jpg', NULL, NULL, NULL, '5', NULL, NULL, NULL, '1', '2023-09-14 00:13:30', '2023-09-14 00:13:30'),
(5, 3, 5, 'بطاطس', 'item-6500cdbb3572b.jpg', NULL, NULL, NULL, '5', NULL, NULL, NULL, '1', '2023-09-14 00:13:30', '2023-09-14 00:13:30'),
(6, 3, 7, 'حضار', 'item-6500cdf7b7ee4.jpg', NULL, NULL, NULL, '5', NULL, NULL, NULL, '1', '2023-09-14 00:13:30', '2023-09-14 00:13:30'),
(7, 3, 8, 'فلفل ألوان', 'item-6500ce1494802.jpg', NULL, NULL, NULL, '5', NULL, NULL, NULL, '1', '2023-09-14 00:13:30', '2023-09-14 00:13:30'),
(8, 3, 4, 'طماطم', 'item-6500cd9e7b58b.jpg', NULL, NULL, NULL, '5', NULL, NULL, NULL, '1', '2023-09-14 00:13:30', '2023-09-14 00:13:30'),
(9, 3, 5, 'بطاطس', 'item-6500cdbb3572b.jpg', NULL, NULL, NULL, '5', NULL, NULL, NULL, '1', '2023-09-14 00:13:30', '2023-09-14 00:13:30'),
(10, 3, 6, 'ليمون', 'item-6500cdda84cdb.jpg', NULL, NULL, NULL, '5', NULL, NULL, NULL, '1', '2023-09-14 00:13:30', '2023-09-14 00:13:30'),
(11, 3, 7, 'حضار', 'item-6500cdf7b7ee4.jpg', NULL, NULL, NULL, '5', NULL, NULL, NULL, '1', '2023-09-14 00:13:30', '2023-09-14 00:13:30'),
(12, 3, 10, 'بطيخ', 'item-6500d0dc57229.jpg', NULL, NULL, NULL, '5', NULL, NULL, NULL, '2', '2023-09-14 00:13:30', '2023-09-14 00:13:30'),
(13, 3, 11, 'خوخ', 'item-6500d0f903487.jpg', NULL, NULL, NULL, '5', NULL, NULL, NULL, '2', '2023-09-14 00:13:30', '2023-09-14 00:13:30'),
(14, 4, 2, 'milk', 'item-651ecd16bdd67.jpg', NULL, NULL, NULL, '10', NULL, NULL, NULL, '1', '2023-10-15 00:39:18', '2023-10-15 00:39:18'),
(15, 4, 3, 'bread', 'item-651ecd41ec19f.jpg', NULL, NULL, NULL, '10', NULL, NULL, NULL, '1', '2023-10-15 00:39:18', '2023-10-15 00:39:18'),
(16, 5, 2, 'milk', 'item-651ecd16bdd67.jpg', NULL, NULL, NULL, '10', NULL, NULL, NULL, '1', '2023-10-15 00:39:42', '2023-10-15 00:39:42'),
(17, 6, 2, 'milk', 'item-651ecd16bdd67.jpg', NULL, NULL, NULL, '10', NULL, NULL, NULL, '1', '2023-10-15 00:41:17', '2023-10-15 00:41:17'),
(18, 7, 17, 'برجر', 'item-65200de99589f.jpg', NULL, NULL, NULL, '5', NULL, NULL, NULL, '1', '2023-10-15 14:29:13', '2023-10-15 14:29:13'),
(19, 7, 17, 'برجر', 'item-65200de99589f.jpg', NULL, NULL, NULL, '5', NULL, NULL, NULL, '1', '2023-10-15 14:29:13', '2023-10-15 14:29:13'),
(20, 7, 2, 'milk', 'item-651ecd16bdd67.jpg', NULL, NULL, NULL, '10', NULL, NULL, NULL, '1', '2023-10-15 14:29:13', '2023-10-15 14:29:13'),
(21, 8, 17, 'برجر', 'item-65200de99589f.jpg', NULL, NULL, NULL, '5', NULL, NULL, NULL, '1', '2023-10-15 14:30:40', '2023-10-15 14:30:40'),
(22, 9, 2, 'milk', 'item-651ecd16bdd67.jpg', NULL, NULL, NULL, '10', NULL, NULL, NULL, '1', '2023-10-30 07:54:52', '2023-10-30 07:54:52'),
(23, 9, 18, 'برجر 3', 'item-65200e0b131d3.jpg', NULL, NULL, NULL, '7', NULL, NULL, NULL, '1', '2023-10-30 07:54:52', '2023-10-30 07:54:52'),
(24, 10, 17, 'برجر', 'item-65200de99589f.jpg', NULL, NULL, NULL, '5', NULL, NULL, NULL, '1', '2023-11-19 03:41:56', '2023-11-19 03:41:56'),
(25, 11, 3, 'bread', 'item-651ecd41ec19f.jpg', NULL, NULL, NULL, '10', NULL, NULL, NULL, '1', '2023-11-21 01:14:57', '2023-11-21 01:14:57'),
(26, 12, 16, 'برجر', 'item-651ed3ffb098e.jpg', NULL, NULL, NULL, '5', NULL, NULL, NULL, '1', '2023-12-12 22:59:36', '2023-12-12 22:59:36'),
(27, 13, 3, 'bread', 'item-651ecd41ec19f.jpg', '3', '10', '10', '10', NULL, NULL, NULL, '1', '2023-12-12 23:13:13', '2023-12-12 23:13:13'),
(28, 14, 3, 'beef burger', 'item-6579363acd741.jpg', NULL, NULL, NULL, '10', NULL, NULL, NULL, '1', '2023-12-19 18:02:57', '2023-12-19 18:02:57'),
(29, 14, 17, 'Chicken burger', 'item-6578d3e32a2b1.jpg', NULL, NULL, NULL, '5', NULL, NULL, NULL, '1', '2023-12-19 18:02:57', '2023-12-19 18:02:57'),
(30, 15, 17, 'برجر دجاج', 'item-6578d3e32a2b1.jpg', NULL, NULL, NULL, '5', NULL, NULL, NULL, '1', '2023-12-19 18:05:10', '2023-12-19 18:05:10'),
(31, 16, 38, 'kunafa', 'item-65824f6eca466.jpg', NULL, NULL, NULL, '8', NULL, NULL, NULL, '1', '2023-12-20 08:13:16', '2023-12-20 08:13:16'),
(32, 16, 38, 'kunafa', 'item-65824f6eca466.jpg', NULL, NULL, NULL, '8', NULL, NULL, NULL, '2', '2023-12-20 08:13:16', '2023-12-20 08:13:16'),
(33, 17, 41, 'coockies', 'item-658250913d18a.jpg', NULL, NULL, NULL, '8', NULL, NULL, NULL, '2', '2023-12-20 08:19:30', '2023-12-20 08:19:30'),
(34, 18, 39, 'Basbousa', 'item-65824faa4fe19.jpg', NULL, NULL, NULL, '8', NULL, NULL, NULL, '1', '2023-12-20 08:55:32', '2023-12-20 08:55:32'),
(35, 18, 38, 'kunafa', 'item-65824f6eca466.jpg', NULL, NULL, NULL, '8', NULL, NULL, NULL, '1', '2023-12-20 08:55:32', '2023-12-20 08:55:32');

-- --------------------------------------------------------

--
-- بنية الجدول `password_resets`
--

CREATE TABLE `password_resets` (
  `email` varchar(255) NOT NULL,
  `token` varchar(255) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- بنية الجدول `payments`
--

CREATE TABLE `payments` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `vendor_id` int(11) DEFAULT NULL,
  `payment_name` varchar(255) NOT NULL,
  `currency` varchar(255) DEFAULT '',
  `image` varchar(255) NOT NULL,
  `public_key` text DEFAULT NULL,
  `secret_key` text DEFAULT NULL,
  `encryption_key` text DEFAULT NULL,
  `environment` int(11) NOT NULL,
  `bank_name` text DEFAULT NULL,
  `account_number` varchar(255) DEFAULT NULL,
  `account_holder_name` varchar(255) DEFAULT NULL,
  `bank_ifsc_code` varchar(255) DEFAULT NULL,
  `is_available` int(11) NOT NULL,
  `is_activate` int(11) NOT NULL DEFAULT 1 COMMENT '1=Yes,2=No',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- إرجاع أو استيراد بيانات الجدول `payments`
--

INSERT INTO `payments` (`id`, `vendor_id`, `payment_name`, `currency`, `image`, `public_key`, `secret_key`, `encryption_key`, `environment`, `bank_name`, `account_number`, `account_holder_name`, `bank_ifsc_code`, `is_available`, `is_activate`, `created_at`, `updated_at`) VALUES
(1, 1, 'COD', '', 'cod.png', NULL, NULL, '', 1, NULL, NULL, NULL, NULL, 2, 1, '2021-09-02 19:36:58', '2023-01-19 08:29:26'),
(2, 1, 'RazorPay', 'INR', 'razorpay.png', 'rzp_test_4r8y0wDMkrUDFn', 'nEDuJlpL3x2BqHxYlQBYtrto', '', 1, NULL, NULL, NULL, NULL, 2, 1, '2021-09-02 19:36:58', '2023-09-08 21:40:13'),
(3, 1, 'Stripe', 'USD', 'stripe.png', 'pk_test_51IjNgIJwZppK21ZQa6e7ZVOImwJ2auI54TD6xHici94u7DD5mhGf1oaBiDyL9mX7PbN5nt6Weap4tmGWLRIrslCu00d8QgQ3nI', 'sk_test_51IjNgIJwZppK21ZQK85uLARMdhtuuhA81PB24VDfiqSW8SXQZKrZzvbpIkigEb27zZPBMF4UEG7PK9587Xresuc000x8CdE22A', '', 1, NULL, NULL, NULL, NULL, 2, 1, '2021-09-02 19:36:58', '2023-12-22 21:12:44'),
(4, 1, 'Flutterwave', 'NGN', 'flutterwave.png', 'FLWPUBK_TEST-61c94068c4a44548a771cc7cf9548d05-X', 'FLWSECK_TEST-1140781769b7bd5cfd6b3fb6d5704017-X', 'FLWSECK_TEST863a39eb1475', 1, NULL, NULL, NULL, NULL, 2, 1, '2021-10-21 12:58:05', '2023-09-08 21:40:30'),
(5, 1, 'Paystack', 'GHS', 'paystack.png', 'pk_test_8a6a139a3bae6e41cbbbc41f4d7b65d4da9f7967', 'sk_test_6ab143b6f0c2a209373adeef55a64411c1a91ae9', '', 1, NULL, NULL, NULL, NULL, 2, 1, '2021-10-21 12:58:12', '2023-09-08 21:40:23'),
(6, 1, 'Banktransfer', '', 'banktransfer.png', NULL, NULL, '', 0, NULL, NULL, NULL, NULL, 1, 1, '2021-10-21 12:58:12', '2023-09-08 21:40:13'),
(7, 1, 'Mercadopago', 'R$', 'mercadopago.png', '-', 'APP_USR-3693146734015792-042811-c6deca56df8ac66e83efb5334c46110c-126508225', '', 1, NULL, NULL, NULL, NULL, 2, 1, '2021-10-21 12:58:12', '2023-09-08 21:40:36'),
(8, 1, 'PayPal', 'USD', 'paypal.png', 'AcRx7vvy79nbNxBemacGKmnnRe_CtxkItyspBS_eeMIPREwfCEIfPg1uX-bdqPrS_ZFGocxEH_SJRrIJ', 'EGtgNkjt3I5lkhEEzicdot8gVH_PcFiKxx6ZBiXpVrp4QLDYcVQQMLX6MMG_fkS9_H0bwmZzBovb4jLP', '', 1, NULL, NULL, NULL, NULL, 2, 1, '2021-10-21 12:58:12', '2023-12-22 23:59:04'),
(9, 1, 'MyFatoorah', 'KWT', 'myfatoorah.png', '', 'rLtt6JWvbUHDDhsZnfpAhpYk4dxYDQkbcPTyGaKp2TYqQgG7FGZ5Th_WD53Oq8Ebz6A53njUoo1w3pjU1D4vs_ZMqFiz_j0urb_BH9Oq9VZoKFoJEDAbRZepGcQanImyYrry7Kt6MnMdgfG5jn4HngWoRdKduNNyP4kzcp3mRv7x00ahkm9LAK7ZRieg7k1PDAnBIOG3EyVSJ5kK4WLMvYr7sCwHbHcu4A5WwelxYK0GMJy37bNAarSJDFQsJ2ZvJjvMDmfWwDVFEVe_5tOomfVNt6bOg9mexbGjMrnHBnKnZR1vQbBtQieDlQepzTZMuQrSuKn-t5XZM7V6fCW7oP-uXGX-sMOajeX65JOf6XVpk29DP6ro8WTAflCDANC193yof8-f5_EYY-3hXhJj7RBXmizDpneEQDSaSz5sFk0sV5qPcARJ9zGG73vuGFyenjPPmtDtXtpx35A-BVcOSBYVIWe9kndG3nclfefjKEuZ3m4jL9Gg1h2JBvmXSMYiZtp9MR5I6pvbvylU_PP5xJFSjVTIz7IQSjcVGO41npnwIxRXNRxFOdIUHn0tjQ-7LwvEcTXyPsHXcMD8WtgBh-wxR8aKX7WPSsT1O8d8reb2aR7K3rkV3K82K_0OgawImEpwSvp9MNKynEAJQS6ZHe_J_l77652xwPNxMRTMASk1ZsJL', '', 1, NULL, NULL, NULL, NULL, 1, 1, '2021-10-21 12:58:12', '2023-08-09 14:02:47'),
(10, 1, 'toyyibpay', 'RM', 'toyyibpay.png', 'ts75iszg', 'luieh2jt-8hpa-m2xv-wrkv-ejrfvhjppnsj', '', 1, NULL, NULL, NULL, NULL, 2, 1, '2021-10-21 12:58:12', '2023-12-22 23:59:20'),
(11, 2, 'COD', '', 'cod.png', '-', '-', '-', 1, NULL, NULL, NULL, NULL, 1, 2, '2023-09-08 22:14:35', '2023-12-22 21:16:19'),
(12, 2, 'RazorPay', 'INR', 'razorpay.png', '-', '-', '-', 1, NULL, NULL, NULL, NULL, 1, 2, '2023-09-08 22:14:35', '2023-12-22 21:16:19'),
(13, 2, 'Stripe', 'USD', 'stripe.png', '-', '-', '-', 1, NULL, NULL, NULL, NULL, 1, 2, '2023-09-08 22:14:35', '2023-12-22 21:16:19'),
(14, 2, 'Flutterwave', 'NGN', 'flutterwave.png', '-', '-', '-', 1, NULL, NULL, NULL, NULL, 1, 2, '2023-09-08 22:14:35', '2023-12-22 21:16:19'),
(15, 2, 'Paystack', 'GHS', 'paystack.png', '-', '-', '-', 1, NULL, NULL, NULL, NULL, 1, 2, '2023-09-08 22:14:35', '2023-12-22 21:16:19'),
(16, 2, 'Mercadopago', 'R$', 'mercadopago.png', '-', '-', '-', 1, NULL, NULL, NULL, NULL, 1, 2, '2023-09-08 22:14:35', '2023-12-22 21:16:19'),
(17, 2, 'PayPal', 'USD', 'paypal.png', '-', '-', '-', 1, NULL, NULL, NULL, NULL, 1, 2, '2023-09-08 22:14:35', '2023-12-22 23:59:04'),
(18, 2, 'MyFatoorah', 'KWT', 'myfatoorah.png', '-', '-', '-', 1, NULL, NULL, NULL, NULL, 1, 1, '2023-09-08 22:14:35', '2023-09-08 22:14:35'),
(19, 2, 'toyyibpay', 'RM', 'toyyibpay.png', '-', '-', '-', 1, NULL, NULL, NULL, NULL, 1, 2, '2023-09-08 22:14:35', '2023-12-22 23:59:20'),
(20, 3, 'COD', '', 'cod.png', '-', '-', '-', 1, NULL, NULL, NULL, NULL, 1, 2, '2023-09-08 22:15:18', '2023-12-22 21:16:19'),
(21, 3, 'RazorPay', 'INR', 'razorpay.png', '-', '-', '', 1, NULL, NULL, NULL, NULL, 2, 2, '2023-09-08 22:15:18', '2023-12-22 21:16:19'),
(22, 3, 'Stripe', 'USD', 'stripe.png', '-', '-', '', 1, NULL, NULL, NULL, NULL, 2, 2, '2023-09-08 22:15:18', '2023-12-22 21:16:19'),
(23, 3, 'Flutterwave', 'NGN', 'flutterwave.png', '-', '-', '-', 1, NULL, NULL, NULL, NULL, 2, 2, '2023-09-08 22:15:18', '2023-12-22 21:16:19'),
(24, 3, 'Paystack', 'GHS', 'paystack.png', '-', '-', '', 1, NULL, NULL, NULL, NULL, 2, 2, '2023-09-08 22:15:18', '2023-12-22 21:16:19'),
(25, 3, 'Mercadopago', 'R$', 'mercadopago.png', '-', '-', '', 1, NULL, NULL, NULL, NULL, 2, 2, '2023-09-08 22:15:18', '2023-12-22 21:16:19'),
(26, 3, 'PayPal', 'USD', 'paypal.png', '-', '-', '', 1, NULL, NULL, NULL, NULL, 2, 2, '2023-09-08 22:15:18', '2023-12-22 23:59:04'),
(27, 3, 'MyFatoorah', 'KWT', 'myfatoorah.png', '-', '-', '', 1, NULL, NULL, NULL, NULL, 1, 1, '2023-09-08 22:15:18', '2023-12-20 05:40:19'),
(28, 3, 'toyyibpay', 'RM', 'toyyibpay.png', '-', '-', '', 1, NULL, NULL, NULL, NULL, 2, 2, '2023-09-08 22:15:18', '2023-12-22 23:59:20'),
(29, 4, 'COD', '', 'cod.png', '-', '-', '-', 1, NULL, NULL, NULL, NULL, 1, 2, '2023-09-12 12:30:50', '2023-12-22 21:16:19'),
(30, 4, 'RazorPay', 'INR', 'razorpay.png', '-', '-', '', 1, NULL, NULL, NULL, NULL, 2, 2, '2023-09-12 12:30:50', '2023-12-22 21:16:19'),
(31, 4, 'Stripe', 'USD', 'stripe.png', '-', '-', '', 1, NULL, NULL, NULL, NULL, 2, 2, '2023-09-12 12:30:50', '2023-12-22 21:16:19'),
(32, 4, 'Flutterwave', 'NGN', 'flutterwave.png', '-', '-', '-', 1, NULL, NULL, NULL, NULL, 2, 2, '2023-09-12 12:30:50', '2023-12-22 21:16:19'),
(33, 4, 'Paystack', 'GHS', 'paystack.png', '-', '-', '', 1, NULL, NULL, NULL, NULL, 2, 2, '2023-09-12 12:30:50', '2023-12-22 21:16:19'),
(34, 4, 'Mercadopago', 'R$', 'mercadopago.png', '-', '-', '', 1, NULL, NULL, NULL, NULL, 2, 2, '2023-09-12 12:30:50', '2023-12-22 21:16:19'),
(35, 4, 'PayPal', 'USD', 'paypal.png', '-', '-', '', 1, NULL, NULL, NULL, NULL, 2, 2, '2023-09-12 12:30:50', '2023-12-22 23:59:04'),
(36, 4, 'MyFatoorah', 'KWT', 'myfatoorah.png', '-', '-', '', 1, NULL, NULL, NULL, NULL, 2, 1, '2023-09-12 12:30:50', '2023-09-12 08:32:54'),
(37, 4, 'toyyibpay', 'RM', 'toyyibpay.png', '-', '-', '', 1, NULL, NULL, NULL, NULL, 2, 2, '2023-09-12 12:30:50', '2023-12-22 23:59:20'),
(38, 5, 'COD', '', 'payment-6578b0a93cfa4.png', '-', '-', '', 1, NULL, NULL, NULL, NULL, 1, 2, '2023-09-12 19:01:09', '2023-12-22 21:16:19'),
(39, 5, 'RazorPay', 'INR', 'razorpay.png', '-', '-', '', 1, NULL, NULL, NULL, NULL, 2, 2, '2023-09-12 19:01:09', '2023-12-22 21:16:19'),
(40, 5, 'Stripe', 'USD', 'stripe.png', '-', '-', '', 1, NULL, NULL, NULL, NULL, 2, 2, '2023-09-12 19:01:09', '2023-12-22 21:16:19'),
(41, 5, 'Flutterwave', 'NGN', 'flutterwave.png', '-', '-', '-', 1, NULL, NULL, NULL, NULL, 2, 2, '2023-09-12 19:01:09', '2023-12-22 21:16:19'),
(42, 5, 'Paystack', 'GHS', 'paystack.png', '-', '-', '', 1, NULL, NULL, NULL, NULL, 2, 2, '2023-09-12 19:01:09', '2023-12-22 21:16:19'),
(43, 5, 'Mercadopago', 'R$', 'mercadopago.png', '-', '-', '', 1, NULL, NULL, NULL, NULL, 2, 2, '2023-09-12 19:01:09', '2023-12-22 21:16:19'),
(44, 5, 'PayPal', 'USD', 'paypal.png', '-', '-', '', 1, NULL, NULL, NULL, NULL, 2, 2, '2023-09-12 19:01:09', '2023-12-22 23:59:04'),
(45, 5, 'MyFatoorah', 'KWT', 'payment-6578b099d0a68.png', '-', 'rLtt6JWvbUHDDhsZnfpAhpYk4dxYDQkbcPTyGaKp2TYqQgG7FGZ5Th_WD53Oq8Ebz6A53njUoo1w3pjU1D4vs_ZMqFiz_j0urb_BH9Oq9VZoKFoJEDAbRZepGcQanImyYrry7Kt6MnMdgfG5jn4HngWoRdKduNNyP4kzcp3mRv7x00ahkm9LAK7ZRieg7k1PDAnBIOG3EyVSJ5kK4WLMvYr7sCwHbHcu4A5WwelxYK0GMJy37bNAarSJDFQsJ2ZvJjvMDmfWwDVFEVe_5tOomfVNt6bOg9mexbGjMrnHBnKnZR1vQbBtQieDlQepzTZMuQrSuKn-t5XZM7V6fCW7oP-uXGX-sMOajeX65JOf6XVpk29DP6ro8WTAflCDANC193yof8-f5_EYY-3hXhJj7RBXmizDpneEQDSaSz5sFk0sV5qPcARJ9zGG73vuGFyenjPPmtDtXtpx35A-BVcOSBYVIWe9kndG3nclfefjKEuZ3m4jL9Gg1h2JBvmXSMYiZtp9MR5I6pvbvylU_PP5xJFSjVTIz7IQSjcVGO41npnwIxRXNRxFOdIUHn0tjQ-7LwvEcTXyPsHXcMD8WtgBh-wxR8aKX7WPSsT1O8d8reb2aR7K3rkV3K82K_0OgawImEpwSvp9MNKynEAJQS6ZHe_J_l77652xwPNxMRTMASk1ZsJL', '', 2, NULL, NULL, NULL, NULL, 1, 1, '2023-09-12 19:01:09', '2023-12-26 12:30:10'),
(46, 5, 'toyyibpay', 'RM', 'toyyibpay.png', '-', '-', '', 1, NULL, NULL, NULL, NULL, 2, 2, '2023-09-12 19:01:09', '2023-12-22 23:59:20'),
(47, 18, 'COD', '', 'cod.png', '-', '-', '-', 1, NULL, NULL, NULL, NULL, 1, 2, '2023-12-14 01:52:03', '2023-12-22 21:16:19'),
(48, 18, 'RazorPay', 'INR', 'razorpay.png', '-', '-', '-', 1, NULL, NULL, NULL, NULL, 1, 2, '2023-12-14 01:52:03', '2023-12-22 21:16:19'),
(49, 18, 'Stripe', 'USD', 'stripe.png', '-', '-', '-', 1, NULL, NULL, NULL, NULL, 1, 2, '2023-12-14 01:52:03', '2023-12-22 21:16:19'),
(50, 18, 'Flutterwave', 'NGN', 'flutterwave.png', '-', '-', '-', 1, NULL, NULL, NULL, NULL, 1, 2, '2023-12-14 01:52:03', '2023-12-22 21:16:19'),
(51, 18, 'Paystack', 'GHS', 'paystack.png', '-', '-', '-', 1, NULL, NULL, NULL, NULL, 1, 2, '2023-12-14 01:52:03', '2023-12-22 21:16:19'),
(52, 18, 'Mercadopago', 'R$', 'mercadopago.png', '-', '-', '-', 1, NULL, NULL, NULL, NULL, 1, 2, '2023-12-14 01:52:03', '2023-12-22 21:16:19'),
(53, 18, 'PayPal', 'USD', 'paypal.png', '-', '-', '-', 1, NULL, NULL, NULL, NULL, 1, 2, '2023-12-14 01:52:03', '2023-12-22 23:59:04'),
(54, 18, 'MyFatoorah', 'KWT', 'myfatoorah.png', '-', '-', '-', 1, NULL, NULL, NULL, NULL, 1, 1, '2023-12-14 01:52:03', '2023-12-14 01:52:03'),
(55, 18, 'toyyibpay', 'RM', 'toyyibpay.png', '-', '-', '-', 1, NULL, NULL, NULL, NULL, 1, 2, '2023-12-14 01:52:03', '2023-12-22 23:59:20'),
(56, 19, 'COD', '', 'cod.png', '-', '-', '-', 1, NULL, NULL, NULL, NULL, 1, 2, '2023-12-19 18:37:33', '2023-12-22 21:16:19'),
(57, 19, 'RazorPay', 'INR', 'razorpay.png', '-', '-', '-', 1, NULL, NULL, NULL, NULL, 1, 2, '2023-12-19 18:37:33', '2023-12-22 21:16:19'),
(58, 19, 'Stripe', 'USD', 'stripe.png', '-', '-', '-', 1, NULL, NULL, NULL, NULL, 1, 2, '2023-12-19 18:37:33', '2023-12-22 21:16:19'),
(59, 19, 'Flutterwave', 'NGN', 'flutterwave.png', '-', '-', '-', 1, NULL, NULL, NULL, NULL, 1, 2, '2023-12-19 18:37:33', '2023-12-22 21:16:19'),
(60, 19, 'Paystack', 'GHS', 'paystack.png', '-', '-', '-', 1, NULL, NULL, NULL, NULL, 1, 2, '2023-12-19 18:37:33', '2023-12-22 21:16:19'),
(61, 19, 'Mercadopago', 'R$', 'mercadopago.png', '-', '-', '-', 1, NULL, NULL, NULL, NULL, 1, 2, '2023-12-19 18:37:33', '2023-12-22 21:16:19'),
(62, 19, 'PayPal', 'USD', 'paypal.png', '-', '-', '-', 1, NULL, NULL, NULL, NULL, 1, 2, '2023-12-19 18:37:33', '2023-12-22 23:59:04'),
(63, 19, 'MyFatoorah', 'KWT', 'myfatoorah.png', '-', '-', '-', 1, NULL, NULL, NULL, NULL, 1, 1, '2023-12-19 18:37:33', '2023-12-19 18:37:33'),
(64, 19, 'toyyibpay', 'RM', 'toyyibpay.png', '-', '-', '-', 1, NULL, NULL, NULL, NULL, 1, 2, '2023-12-19 18:37:33', '2023-12-22 23:59:20'),
(65, 20, 'COD', '', 'cod.png', '-', '-', '-', 1, NULL, NULL, NULL, NULL, 1, 2, '2023-12-20 02:35:38', '2023-12-22 21:16:19'),
(66, 20, 'RazorPay', 'INR', 'razorpay.png', '-', '-', '-', 1, NULL, NULL, NULL, NULL, 1, 2, '2023-12-20 02:35:38', '2023-12-22 21:16:19'),
(67, 20, 'Stripe', 'USD', 'stripe.png', '-', '-', '-', 1, NULL, NULL, NULL, NULL, 1, 2, '2023-12-20 02:35:38', '2023-12-22 21:16:19'),
(68, 20, 'Flutterwave', 'NGN', 'flutterwave.png', '-', '-', '-', 1, NULL, NULL, NULL, NULL, 1, 2, '2023-12-20 02:35:38', '2023-12-22 21:16:19'),
(69, 20, 'Paystack', 'GHS', 'paystack.png', '-', '-', '-', 1, NULL, NULL, NULL, NULL, 1, 2, '2023-12-20 02:35:38', '2023-12-22 21:16:19'),
(70, 20, 'Mercadopago', 'R$', 'mercadopago.png', '-', '-', '-', 1, NULL, NULL, NULL, NULL, 1, 2, '2023-12-20 02:35:38', '2023-12-22 21:16:19'),
(71, 20, 'PayPal', 'USD', 'paypal.png', '-', '-', '-', 1, NULL, NULL, NULL, NULL, 1, 2, '2023-12-20 02:35:38', '2023-12-22 23:59:04'),
(72, 20, 'MyFatoorah', 'KWT', 'myfatoorah.png', '-', '-', '-', 1, NULL, NULL, NULL, NULL, 1, 1, '2023-12-20 02:35:38', '2023-12-20 02:35:38'),
(73, 20, 'toyyibpay', 'RM', 'toyyibpay.png', '-', '-', '-', 1, NULL, NULL, NULL, NULL, 1, 2, '2023-12-20 02:35:38', '2023-12-22 23:59:20'),
(74, 22, 'COD', '', 'cod.png', '-', '-', '-', 1, NULL, NULL, NULL, NULL, 1, 2, '2023-12-21 00:17:20', '2023-12-22 21:16:19'),
(75, 22, 'RazorPay', 'INR', 'razorpay.png', '-', '-', '-', 1, NULL, NULL, NULL, NULL, 1, 2, '2023-12-21 00:17:20', '2023-12-22 21:16:19'),
(76, 22, 'Stripe', 'USD', 'stripe.png', '-', '-', '-', 1, NULL, NULL, NULL, NULL, 1, 2, '2023-12-21 00:17:20', '2023-12-22 21:16:19'),
(77, 22, 'Flutterwave', 'NGN', 'flutterwave.png', '-', '-', '-', 1, NULL, NULL, NULL, NULL, 1, 2, '2023-12-21 00:17:20', '2023-12-22 21:16:19'),
(78, 22, 'Paystack', 'GHS', 'paystack.png', '-', '-', '-', 1, NULL, NULL, NULL, NULL, 1, 2, '2023-12-21 00:17:20', '2023-12-22 21:16:19'),
(79, 22, 'Mercadopago', 'R$', 'mercadopago.png', '-', '-', '-', 1, NULL, NULL, NULL, NULL, 1, 2, '2023-12-21 00:17:20', '2023-12-22 21:16:19'),
(80, 22, 'PayPal', 'USD', 'paypal.png', '-', '-', '-', 1, NULL, NULL, NULL, NULL, 1, 2, '2023-12-21 00:17:20', '2023-12-22 23:59:04'),
(81, 22, 'MyFatoorah', 'KWT', 'myfatoorah.png', '-', '-', '-', 1, NULL, NULL, NULL, NULL, 1, 1, '2023-12-21 00:17:20', '2023-12-21 00:17:20'),
(82, 22, 'toyyibpay', 'RM', 'toyyibpay.png', '-', '-', '-', 1, NULL, NULL, NULL, NULL, 1, 2, '2023-12-21 00:17:20', '2023-12-22 23:59:20'),
(83, 24, 'COD', '', 'cod.png', '-', '-', '-', 1, NULL, NULL, NULL, NULL, 1, 2, '2023-12-21 00:40:35', '2023-12-22 21:16:19'),
(84, 24, 'RazorPay', 'INR', 'razorpay.png', '-', '-', '-', 1, NULL, NULL, NULL, NULL, 1, 2, '2023-12-21 00:40:35', '2023-12-22 21:16:19'),
(85, 24, 'Stripe', 'USD', 'stripe.png', '-', '-', '-', 1, NULL, NULL, NULL, NULL, 1, 2, '2023-12-21 00:40:35', '2023-12-22 21:16:19'),
(86, 24, 'Flutterwave', 'NGN', 'flutterwave.png', '-', '-', '-', 1, NULL, NULL, NULL, NULL, 1, 2, '2023-12-21 00:40:35', '2023-12-22 21:16:19'),
(87, 24, 'Paystack', 'GHS', 'paystack.png', '-', '-', '-', 1, NULL, NULL, NULL, NULL, 1, 2, '2023-12-21 00:40:35', '2023-12-22 21:16:19'),
(88, 24, 'Mercadopago', 'R$', 'mercadopago.png', '-', '-', '-', 1, NULL, NULL, NULL, NULL, 1, 2, '2023-12-21 00:40:35', '2023-12-22 21:16:19'),
(89, 24, 'PayPal', 'USD', 'paypal.png', '-', '-', '-', 1, NULL, NULL, NULL, NULL, 1, 2, '2023-12-21 00:40:35', '2023-12-22 23:59:04'),
(90, 24, 'MyFatoorah', 'KWT', 'myfatoorah.png', '-', '-', '-', 1, NULL, NULL, NULL, NULL, 1, 1, '2023-12-21 00:40:35', '2023-12-21 00:40:35'),
(91, 24, 'toyyibpay', 'RM', 'toyyibpay.png', '-', '-', '-', 1, NULL, NULL, NULL, NULL, 1, 2, '2023-12-21 00:40:35', '2023-12-22 23:59:20'),
(92, 25, 'COD', '', 'cod.png', '-', '-', '-', 1, NULL, NULL, NULL, NULL, 1, 2, '2023-12-28 19:37:29', '2023-12-28 19:37:29'),
(93, 25, 'RazorPay', 'INR', 'razorpay.png', '-', '-', '-', 1, NULL, NULL, NULL, NULL, 1, 2, '2023-12-28 19:37:29', '2023-12-28 19:37:29'),
(94, 25, 'Stripe', 'USD', 'stripe.png', '-', '-', '-', 1, NULL, NULL, NULL, NULL, 1, 2, '2023-12-28 19:37:29', '2023-12-28 19:37:29'),
(95, 25, 'Flutterwave', 'NGN', 'flutterwave.png', '-', '-', '-', 1, NULL, NULL, NULL, NULL, 1, 2, '2023-12-28 19:37:29', '2023-12-28 19:37:29'),
(96, 25, 'Paystack', 'GHS', 'paystack.png', '-', '-', '-', 1, NULL, NULL, NULL, NULL, 1, 2, '2023-12-28 19:37:29', '2023-12-28 19:37:29'),
(97, 25, 'Mercadopago', 'R$', 'mercadopago.png', '-', '-', '-', 1, NULL, NULL, NULL, NULL, 1, 2, '2023-12-28 19:37:29', '2023-12-28 19:37:29'),
(98, 25, 'PayPal', 'USD', 'paypal.png', '-', '-', '-', 1, NULL, NULL, NULL, NULL, 1, 2, '2023-12-28 19:37:29', '2023-12-28 19:37:29'),
(99, 25, 'MyFatoorah', 'KWT', 'myfatoorah.png', '-', '-', '-', 1, NULL, NULL, NULL, NULL, 1, 1, '2023-12-28 19:37:29', '2023-12-28 19:37:29'),
(100, 25, 'toyyibpay', 'RM', 'toyyibpay.png', '-', '-', '-', 1, NULL, NULL, NULL, NULL, 1, 2, '2023-12-28 19:37:29', '2023-12-28 19:37:29');

-- --------------------------------------------------------

--
-- بنية الجدول `permissions`
--

CREATE TABLE `permissions` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) NOT NULL,
  `page` varchar(255) NOT NULL,
  `action` varchar(255) NOT NULL,
  `guard_name` varchar(255) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- إرجاع أو استيراد بيانات الجدول `permissions`
--

INSERT INTO `permissions` (`id`, `name`, `page`, `action`, `guard_name`, `created_at`, `updated_at`) VALUES
(38, 'apps view', 'apps', 'view', 'web', '2023-10-03 08:37:43', '2023-10-03 08:37:43'),
(39, 'settings view', 'settings', 'view', 'web', '2023-10-03 08:37:43', '2023-10-03 08:37:43'),
(40, 'administrators view', 'administrators', 'view', 'web', '2023-10-03 08:37:43', '2023-10-03 08:37:43'),
(41, 'plan view', 'plan', 'view', 'web', '2023-10-03 08:37:43', '2023-10-03 08:37:43'),
(42, 'payment view', 'payment', 'view', 'web', '2023-10-03 08:37:43', '2023-10-03 08:37:43'),
(43, 'inquiries view', 'inquiries', 'view', 'web', '2023-10-03 08:37:43', '2023-10-03 08:37:43'),
(44, 'subscribers view', 'subscribers', 'view', 'web', '2023-10-03 08:37:43', '2023-10-03 08:37:43'),
(45, 'privacy-policy view', 'privacy-policy', 'view', 'web', '2023-10-03 08:37:43', '2023-10-03 08:37:43'),
(46, 'refund-policy view', 'refund-policy', 'view', 'web', '2023-10-03 08:37:43', '2023-10-03 08:37:43'),
(47, 'terms-conditions view', 'terms-conditions', 'view', 'web', '2023-10-03 08:37:43', '2023-10-03 08:37:43'),
(48, 'aboutus view', 'aboutus', 'view', 'web', '2023-10-03 08:37:43', '2023-10-03 08:37:43'),
(49, 'users view', 'users', 'view', 'web', '2023-10-03 08:37:43', '2023-10-03 08:37:43'),
(50, 'faqs view', 'faqs', 'view', 'web', '2023-10-03 08:37:43', '2023-10-03 08:37:43'),
(51, 'features view', 'features', 'view', 'web', '2023-10-03 08:37:43', '2023-10-03 08:37:43'),
(52, 'testimonials view', 'testimonials', 'view', 'web', '2023-10-03 08:37:43', '2023-10-03 08:37:43'),
(53, 'cities view', 'cities', 'view', 'web', '2023-10-03 08:37:43', '2023-10-03 08:37:43'),
(54, 'areas view', 'areas', 'view', 'web', '2023-10-03 08:37:43', '2023-10-03 08:37:43'),
(55, 'promotionalbanners view', 'promotionalbanners', 'view', 'web', '2023-10-03 08:37:43', '2023-10-03 08:37:43'),
(56, 'language-settings view', 'language-settings', 'view', 'web', '2023-10-03 08:37:43', '2023-10-03 08:37:43'),
(57, 'custom_domain view', 'custom_domain', 'view', 'web', '2023-10-03 08:37:43', '2023-10-03 08:37:43'),
(58, 'blogs view', 'blogs', 'view', 'web', '2023-10-03 08:37:43', '2023-10-03 08:37:43');

-- --------------------------------------------------------

--
-- بنية الجدول `personal_access_tokens`
--

CREATE TABLE `personal_access_tokens` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `tokenable_type` varchar(255) NOT NULL,
  `tokenable_id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) NOT NULL,
  `token` varchar(64) NOT NULL,
  `abilities` text DEFAULT NULL,
  `last_used_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- بنية الجدول `plans`
--

CREATE TABLE `plans` (
  `id` int(11) NOT NULL,
  `name` text NOT NULL,
  `description` longtext NOT NULL,
  `features` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `price` float NOT NULL,
  `themes_id` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `plan_type` int(11) NOT NULL COMMENT '1 = duration, 2 = days',
  `duration` varchar(255) NOT NULL COMMENT '1=1 month\r\n2=3 month\r\n3=6 month\r\n4=1\r\n year\r\n5 = Lifetime\r\n\r\n',
  `days` int(11) NOT NULL,
  `order_limit` int(11) NOT NULL,
  `appointment_limit` int(11) NOT NULL,
  `custom_domain` int(11) NOT NULL COMMENT '1=yes,2=no',
  `google_analytics` int(11) NOT NULL COMMENT '1=yes,2=no',
  `coupons` int(11) NOT NULL DEFAULT 2,
  `blogs` int(11) NOT NULL DEFAULT 2,
  `social_logins` int(11) NOT NULL DEFAULT 2,
  `sound_notification` int(11) NOT NULL DEFAULT 2,
  `whatsapp_message` int(11) NOT NULL DEFAULT 2,
  `telegram_message` int(11) NOT NULL DEFAULT 2,
  `pos` int(11) NOT NULL DEFAULT 2,
  `tableqr` int(11) NOT NULL DEFAULT 2,
  `vendor_app` int(11) NOT NULL,
  `is_available` int(11) DEFAULT 1 COMMENT '1=Yes\r\n2=No\r\n',
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `updated_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- بنية الجدول `privacypolicy`
--

CREATE TABLE `privacypolicy` (
  `id` int(11) NOT NULL,
  `vendor_id` int(11) NOT NULL,
  `privacypolicy_content` longtext NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `updated_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- إرجاع أو استيراد بيانات الجدول `privacypolicy`
--

INSERT INTO `privacypolicy` (`id`, `vendor_id`, `privacypolicy_content`, `created_at`, `updated_at`) VALUES
(1, 1, '<p><big><strong>Privacy Policy</strong></big></p>\r\n\r\n<p>&nbsp;</p>\r\n\r\n<p>&quot;Sed ut perspiciatis unde omnis iste natus error sit voluptatem accusantium doloremque laudantium, totam rem aperiam, eaque ipsa quae ab illo inventore veritatis et quasi architecto beatae vitae dicta sunt explicabo. Nemo enim ipsam voluptatem quia voluptas sit aspernatur aut odit aut fugit, sed quia consequuntur magni dolores eos qui ratione voluptatem sequi nesciunt. Neque porro quisquam est, qui dolorem ipsum quia dolor sit amet, consectetur, adipisci velit, sed quia non numquam eius modi tempora incidunt ut labore et dolore magnam aliquam quaerat voluptatem. Ut enim ad minima veniam, quis nostrum exercitationem ullam corporis suscipit laboriosam, nisi ut aliquid ex ea commodi consequatur? Quis autem vel eum iure reprehenderit qui in ea voluptate velit esse quam nihil molestiae consequatur, vel illum qui dolorem eum fugiat quo voluptas nulla pariatur?&quot;</p>\r\n\r\n<p>&nbsp;</p>\r\n\r\n<p>&quot;Sed ut perspiciatis unde omnis iste natus error sit voluptatem accusantium doloremque laudantium, totam rem aperiam, eaque ipsa quae ab illo inventore veritatis et quasi architecto beatae vitae dicta sunt explicabo. Nemo enim ipsam voluptatem quia voluptas sit aspernatur aut odit aut fugit, sed quia consequuntur magni dolores eos qui ratione voluptatem sequi nesciunt. Neque porro quisquam est, qui dolorem ipsum quia dolor sit amet, consectetur, adipisci velit, sed quia non numquam eius modi tempora incidunt ut labore et dolore magnam aliquam quaerat voluptatem. Ut enim ad minima veniam, quis nostrum exercitationem ullam corporis suscipit laboriosam, nisi ut aliquid ex ea commodi consequatur? Quis autem vel eum iure reprehenderit qui in ea voluptate velit esse quam nihil molestiae consequatur, vel illum qui dolorem eum fugiat quo voluptas nulla pariatur?&quot;</p>\r\n\r\n<p>&nbsp;</p>\r\n\r\n<p>&quot;Sed ut perspiciatis unde omnis iste natus error sit voluptatem accusantium doloremque laudantium, totam rem aperiam, eaque ipsa quae ab illo inventore veritatis et quasi architecto beatae vitae dicta sunt explicabo. Nemo enim ipsam voluptatem quia voluptas sit aspernatur aut odit aut fugit, sed quia consequuntur magni dolores eos qui ratione voluptatem sequi nesciunt. Neque porro quisquam est, qui dolorem ipsum quia dolor sit amet, consectetur, adipisci velit, sed quia non numquam eius modi tempora incidunt ut labore et dolore magnam aliquam quaerat voluptatem. Ut enim ad minima veniam, quis nostrum exercitationem ullam corporis suscipit laboriosam, nisi ut aliquid ex ea commodi consequatur? Quis autem vel eum iure reprehenderit qui in ea voluptate velit esse quam nihil molestiae consequatur, vel illum qui dolorem eum fugiat quo voluptas nulla pariatur?&quot;</p>\r\n\r\n<p>&nbsp;</p>\r\n\r\n<p>&quot;Sed ut perspiciatis unde omnis iste natus error sit voluptatem accusantium doloremque laudantium, totam rem aperiam, eaque ipsa quae ab illo inventore veritatis et quasi architecto beatae vitae dicta sunt explicabo. Nemo enim ipsam voluptatem quia voluptas sit aspernatur aut odit aut fugit, sed quia consequuntur magni dolores eos qui ratione voluptatem sequi nesciunt. Neque porro quisquam est, qui dolorem ipsum quia dolor sit amet, consectetur, adipisci velit, sed quia non numquam eius modi tempora incidunt ut labore et dolore magnam aliquam quaerat voluptatem. Ut enim ad minima veniam, quis nostrum exercitationem ullam corporis suscipit laboriosam, nisi ut aliquid ex ea commodi consequatur? Quis autem vel eum iure reprehenderit qui in ea voluptate velit esse quam nihil molestiae consequatur, vel illum qui dolorem eum fugiat quo voluptas nulla pariatur?&quot;</p>\r\n\r\n<p>&nbsp;</p>\r\n\r\n<p>&quot;Sed ut perspiciatis unde omnis iste natus error sit voluptatem accusantium doloremque laudantium, totam rem aperiam, eaque ipsa quae ab illo inventore veritatis et quasi architecto beatae vitae dicta sunt explicabo. Nemo enim ipsam voluptatem quia voluptas sit aspernatur aut odit aut fugit, sed quia consequuntur magni dolores eos qui ratione voluptatem sequi nesciunt. Neque porro quisquam est, qui dolorem ipsum quia dolor sit amet, consectetur, adipisci velit, sed quia non numquam eius modi tempora incidunt ut labore et dolore magnam aliquam quaerat voluptatem. Ut enim ad minima veniam, quis nostrum exercitationem ullam corporis suscipit laboriosam, nisi ut aliquid ex ea commodi consequatur? Quis autem vel eum iure reprehenderit qui in ea voluptate velit esse quam nihil molestiae consequatur, vel illum qui dolorem eum fugiat quo voluptas nulla pariatur?&quot;</p>\r\n\r\n<p>&nbsp;</p>\r\n\r\n<p>&quot;Sed ut perspiciatis unde omnis iste natus error sit voluptatem accusantium doloremque laudantium, totam rem aperiam, eaque ipsa quae ab illo inventore veritatis et quasi architecto beatae vitae dicta sunt explicabo. Nemo enim ipsam voluptatem quia voluptas sit aspernatur aut odit aut fugit, sed quia consequuntur magni dolores eos qui ratione voluptatem sequi nesciunt. Neque porro quisquam est, qui dolorem ipsum quia dolor sit amet, consectetur, adipisci velit, sed quia non numquam eius modi tempora incidunt ut labore et dolore magnam aliquam quaerat voluptatem. Ut enim ad minima veniam, quis nostrum exercitationem ullam corporis suscipit laboriosam, nisi ut aliquid ex ea commodi consequatur? Quis autem vel eum iure reprehenderit qui in ea voluptate velit esse quam nihil molestiae consequatur, vel illum qui dolorem eum fugiat quo voluptas nulla pariatur?&quot;</p>\r\n\r\n<p>&nbsp;</p>\r\n\r\n<p>&quot;Sed ut perspiciatis unde omnis iste natus error sit voluptatem accusantium doloremque laudantium, totam rem aperiam, eaque ipsa quae ab illo inventore veritatis et quasi architecto beatae vitae dicta sunt explicabo. Nemo enim ipsam voluptatem quia voluptas sit aspernatur aut odit aut fugit, sed quia consequuntur magni dolores eos qui ratione voluptatem sequi nesciunt. Neque porro quisquam est, qui dolorem ipsum quia dolor sit amet, consectetur, adipisci velit, sed quia non numquam eius modi tempora incidunt ut labore et dolore magnam aliquam quaerat voluptatem. Ut enim ad minima veniam, quis nostrum exercitationem ullam corporis suscipit laboriosam, nisi ut aliquid ex ea commodi consequatur? Quis autem vel eum iure reprehenderit qui in ea voluptate velit esse quam nihil molestiae consequatur, vel illum qui dolorem eum fugiat quo voluptas nulla pariatur?&quot;</p>', '2023-07-25 01:45:14', '2023-07-25 01:45:14');

-- --------------------------------------------------------

--
-- بنية الجدول `promotionalbanner`
--

CREATE TABLE `promotionalbanner` (
  `id` int(11) NOT NULL,
  `vendor_id` int(11) NOT NULL,
  `image` varchar(255) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `updated_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb3 COLLATE=utf8mb3_unicode_ci;

--
-- إرجاع أو استيراد بيانات الجدول `promotionalbanner`
--

INSERT INTO `promotionalbanner` (`id`, `vendor_id`, `image`, `created_at`, `updated_at`) VALUES
(1, 3, 'promotion-64fb98e3d2085.jpeg', '2023-09-08 21:57:55', '2023-09-08 21:57:55'),
(2, 2, 'promotion-64fb9904c5395.jpeg', '2023-09-08 21:58:28', '2023-09-08 21:58:28'),
(3, 2, 'promotion-64fb9ad981ca9.jpg', '2023-09-08 22:06:17', '2023-09-08 22:06:17');

-- --------------------------------------------------------

--
-- بنية الجدول `refund_policy`
--

CREATE TABLE `refund_policy` (
  `id` int(11) NOT NULL,
  `vendor_id` int(11) NOT NULL,
  `refund_policy_content` longtext NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `updated_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- إرجاع أو استيراد بيانات الجدول `refund_policy`
--

INSERT INTO `refund_policy` (`id`, `vendor_id`, `refund_policy_content`, `created_at`, `updated_at`) VALUES
(1, 1, '<p><big><strong>Refund Policy</strong></big></p>\r\n\r\n<p>&nbsp;</p>\r\n\r\n<p>&quot;Sed ut perspiciatis unde omnis iste natus error sit voluptatem accusantium doloremque laudantium, totam rem aperiam, eaque ipsa quae ab illo inventore veritatis et quasi architecto beatae vitae dicta sunt explicabo. Nemo enim ipsam voluptatem quia voluptas sit aspernatur aut odit aut fugit, sed quia consequuntur magni dolores eos qui ratione voluptatem sequi nesciunt. Neque porro quisquam est, qui dolorem ipsum quia dolor sit amet, consectetur, adipisci velit, sed quia non numquam eius modi tempora incidunt ut labore et dolore magnam aliquam quaerat voluptatem. Ut enim ad minima veniam, quis nostrum exercitationem ullam corporis suscipit laboriosam, nisi ut aliquid ex ea commodi consequatur? Quis autem vel eum iure reprehenderit qui in ea voluptate velit esse quam nihil molestiae consequatur, vel illum qui dolorem eum fugiat quo voluptas nulla pariatur?&quot;</p>\r\n\r\n<p>&nbsp;</p>\r\n\r\n<p>&quot;Sed ut perspiciatis unde omnis iste natus error sit voluptatem accusantium doloremque laudantium, totam rem aperiam, eaque ipsa quae ab illo inventore veritatis et quasi architecto beatae vitae dicta sunt explicabo. Nemo enim ipsam voluptatem quia voluptas sit aspernatur aut odit aut fugit, sed quia consequuntur magni dolores eos qui ratione voluptatem sequi nesciunt. Neque porro quisquam est, qui dolorem ipsum quia dolor sit amet, consectetur, adipisci velit, sed quia non numquam eius modi tempora incidunt ut labore et dolore magnam aliquam quaerat voluptatem. Ut enim ad minima veniam, quis nostrum exercitationem ullam corporis suscipit laboriosam, nisi ut aliquid ex ea commodi consequatur? Quis autem vel eum iure reprehenderit qui in ea voluptate velit esse quam nihil molestiae consequatur, vel illum qui dolorem eum fugiat quo voluptas nulla pariatur?&quot;</p>\r\n\r\n<p>&nbsp;</p>\r\n\r\n<p>&quot;Sed ut perspiciatis unde omnis iste natus error sit voluptatem accusantium doloremque laudantium, totam rem aperiam, eaque ipsa quae ab illo inventore veritatis et quasi architecto beatae vitae dicta sunt explicabo. Nemo enim ipsam voluptatem quia voluptas sit aspernatur aut odit aut fugit, sed quia consequuntur magni dolores eos qui ratione voluptatem sequi nesciunt. Neque porro quisquam est, qui dolorem ipsum quia dolor sit amet, consectetur, adipisci velit, sed quia non numquam eius modi tempora incidunt ut labore et dolore magnam aliquam quaerat voluptatem. Ut enim ad minima veniam, quis nostrum exercitationem ullam corporis suscipit laboriosam, nisi ut aliquid ex ea commodi consequatur? Quis autem vel eum iure reprehenderit qui in ea voluptate velit esse quam nihil molestiae consequatur, vel illum qui dolorem eum fugiat quo voluptas nulla pariatur?&quot;</p>\r\n\r\n<p>&nbsp;</p>\r\n\r\n<p>&quot;Sed ut perspiciatis unde omnis iste natus error sit voluptatem accusantium doloremque laudantium, totam rem aperiam, eaque ipsa quae ab illo inventore veritatis et quasi architecto beatae vitae dicta sunt explicabo. Nemo enim ipsam voluptatem quia voluptas sit aspernatur aut odit aut fugit, sed quia consequuntur magni dolores eos qui ratione voluptatem sequi nesciunt. Neque porro quisquam est, qui dolorem ipsum quia dolor sit amet, consectetur, adipisci velit, sed quia non numquam eius modi tempora incidunt ut labore et dolore magnam aliquam quaerat voluptatem. Ut enim ad minima veniam, quis nostrum exercitationem ullam corporis suscipit laboriosam, nisi ut aliquid ex ea commodi consequatur? Quis autem vel eum iure reprehenderit qui in ea voluptate velit esse quam nihil molestiae consequatur, vel illum qui dolorem eum fugiat quo voluptas nulla pariatur?&quot;</p>\r\n\r\n<p>&nbsp;</p>\r\n\r\n<p>&quot;Sed ut perspiciatis unde omnis iste natus error sit voluptatem accusantium doloremque laudantium, totam rem aperiam, eaque ipsa quae ab illo inventore veritatis et quasi architecto beatae vitae dicta sunt explicabo. Nemo enim ipsam voluptatem quia voluptas sit aspernatur aut odit aut fugit, sed quia consequuntur magni dolores eos qui ratione voluptatem sequi nesciunt. Neque porro quisquam est, qui dolorem ipsum quia dolor sit amet, consectetur, adipisci velit, sed quia non numquam eius modi tempora incidunt ut labore et dolore magnam aliquam quaerat voluptatem. Ut enim ad minima veniam, quis nostrum exercitationem ullam corporis suscipit laboriosam, nisi ut aliquid ex ea commodi consequatur? Quis autem vel eum iure reprehenderit qui in ea voluptate velit esse quam nihil molestiae consequatur, vel illum qui dolorem eum fugiat quo voluptas nulla pariatur?&quot;</p>\r\n\r\n<p>&nbsp;</p>\r\n\r\n<p>&quot;Sed ut perspiciatis unde omnis iste natus error sit voluptatem accusantium doloremque laudantium, totam rem aperiam, eaque ipsa quae ab illo inventore veritatis et quasi architecto beatae vitae dicta sunt explicabo. Nemo enim ipsam voluptatem quia voluptas sit aspernatur aut odit aut fugit, sed quia consequuntur magni dolores eos qui ratione voluptatem sequi nesciunt. Neque porro quisquam est, qui dolorem ipsum quia dolor sit amet, consectetur, adipisci velit, sed quia non numquam eius modi tempora incidunt ut labore et dolore magnam aliquam quaerat voluptatem. Ut enim ad minima veniam, quis nostrum exercitationem ullam corporis suscipit laboriosam, nisi ut aliquid ex ea commodi consequatur? Quis autem vel eum iure reprehenderit qui in ea voluptate velit esse quam nihil molestiae consequatur, vel illum qui dolorem eum fugiat quo voluptas nulla pariatur?&quot;</p>\r\n\r\n<p>&nbsp;</p>\r\n\r\n<p>&quot;Sed ut perspiciatis unde omnis iste natus error sit voluptatem accusantium doloremque laudantium, totam rem aperiam, eaque ipsa quae ab illo inventore veritatis et quasi architecto beatae vitae dicta sunt explicabo. Nemo enim ipsam voluptatem quia voluptas sit aspernatur aut odit aut fugit, sed quia consequuntur magni dolores eos qui ratione voluptatem sequi nesciunt. Neque porro quisquam est, qui dolorem ipsum quia dolor sit amet, consectetur, adipisci velit, sed quia non numquam eius modi tempora incidunt ut labore et dolore magnam aliquam quaerat voluptatem. Ut enim ad minima veniam, quis nostrum exercitationem ullam corporis suscipit laboriosam, nisi ut aliquid ex ea commodi consequatur? Quis autem vel eum iure reprehenderit qui in ea voluptate velit esse quam nihil molestiae consequatur, vel illum qui dolorem eum fugiat quo voluptas nulla pariatur?&quot;</p>', '2023-07-25 01:30:29', '2023-07-25 01:30:29');

-- --------------------------------------------------------

--
-- بنية الجدول `roles`
--

CREATE TABLE `roles` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) NOT NULL,
  `guard_name` varchar(255) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- إرجاع أو استيراد بيانات الجدول `roles`
--

INSERT INTO `roles` (`id`, `name`, `guard_name`, `created_at`, `updated_at`) VALUES
(2, 'super admin', 'web', '2023-09-30 17:42:51', '2023-09-30 17:42:51'),
(6, 'admin', 'web', '2023-09-30 18:10:57', '2023-09-30 18:10:57'),
(7, 'customer', 'web', '2023-09-30 18:10:57', '2023-09-30 18:10:57'),
(8, 'store', 'web', '2023-09-30 18:10:57', '2023-09-30 18:10:57');

-- --------------------------------------------------------

--
-- بنية الجدول `role_has_permissions`
--

CREATE TABLE `role_has_permissions` (
  `permission_id` bigint(20) UNSIGNED NOT NULL,
  `role_id` bigint(20) UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- إرجاع أو استيراد بيانات الجدول `role_has_permissions`
--

INSERT INTO `role_has_permissions` (`permission_id`, `role_id`) VALUES
(38, 2),
(38, 6),
(39, 2),
(39, 6),
(40, 2),
(40, 6),
(41, 2),
(41, 6),
(42, 2),
(42, 6),
(43, 2),
(43, 6),
(44, 2),
(44, 6),
(45, 2),
(45, 6),
(46, 2),
(46, 6),
(47, 2),
(47, 6),
(48, 2),
(48, 6),
(49, 2),
(49, 6),
(50, 2),
(50, 6),
(51, 2),
(51, 6),
(52, 2),
(52, 6),
(53, 2),
(53, 6),
(54, 2),
(54, 6),
(55, 2),
(55, 6),
(56, 2),
(56, 6),
(57, 2),
(57, 6),
(58, 2),
(58, 6);

-- --------------------------------------------------------

--
-- بنية الجدول `settings`
--

CREATE TABLE `settings` (
  `id` int(10) UNSIGNED NOT NULL,
  `vendor_id` int(11) NOT NULL,
  `currency` varchar(255) NOT NULL,
  `currency_position` varchar(255) NOT NULL,
  `maintenance_mode` int(11) DEFAULT 2 COMMENT '1 = yes, 2 = no',
  `checkout_login_required` int(11) DEFAULT 2 COMMENT '1 = Yes , 2 = No',
  `logo` varchar(255) NOT NULL DEFAULT 'default-logo.png',
  `favicon` varchar(255) NOT NULL DEFAULT 'default_favicon.png',
  `delivery_type` varchar(10) NOT NULL,
  `timezone` varchar(255) NOT NULL,
  `address` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `description` text DEFAULT NULL,
  `contact` varchar(255) NOT NULL,
  `copyright` varchar(255) NOT NULL,
  `website_title` varchar(255) NOT NULL,
  `meta_title` varchar(255) NOT NULL,
  `meta_description` text NOT NULL,
  `og_image` varchar(255) NOT NULL DEFAULT 'og_image.png',
  `mail_driver` varchar(255) DEFAULT NULL,
  `mail_host` varchar(255) DEFAULT NULL,
  `mail_port` varchar(255) DEFAULT NULL,
  `mail_username` varchar(255) DEFAULT NULL,
  `mail_password` varchar(255) DEFAULT NULL,
  `mail_encryption` varchar(255) DEFAULT NULL,
  `mail_fromaddress` varchar(255) DEFAULT NULL,
  `mail_fromname` varchar(255) DEFAULT NULL,
  `facebook_link` varchar(255) NOT NULL,
  `twitter_link` varchar(255) NOT NULL,
  `instagram_link` varchar(255) NOT NULL,
  `linkedin_link` varchar(255) NOT NULL,
  `whatsapp_widget` longtext DEFAULT NULL,
  `whatsapp_message` longtext NOT NULL,
  `telegram_message` longtext DEFAULT NULL,
  `telegram_access_token` text DEFAULT NULL,
  `telegram_chat_id` text DEFAULT NULL,
  `item_message` text NOT NULL,
  `language` int(11) NOT NULL DEFAULT 1,
  `template` int(11) NOT NULL DEFAULT 1,
  `template_type` int(11) NOT NULL DEFAULT 1 COMMENT '1 for Grid , 2 for List	',
  `primary_color` varchar(255) NOT NULL DEFAULT '#171a29',
  `secondary_color` varchar(255) NOT NULL DEFAULT '#171a29',
  `landing_website_title` varchar(255) DEFAULT NULL,
  `custom_domain` text DEFAULT NULL,
  `cname_title` text DEFAULT NULL,
  `cname_text` text DEFAULT NULL,
  `interval_time` varchar(255) NOT NULL,
  `interval_type` int(11) NOT NULL,
  `time_format` int(11) NOT NULL DEFAULT 1 COMMENT '1=Yes,2=No',
  `banner` varchar(255) NOT NULL DEFAULT 'default-banner.png',
  `tracking_id` varchar(255) DEFAULT NULL,
  `view_id` varchar(255) DEFAULT NULL,
  `firebase` longtext DEFAULT NULL,
  `cover_image` varchar(255) NOT NULL DEFAULT 'default-cover.png',
  `notification_sound` varchar(255) NOT NULL DEFAULT 'notification.mp3',
  `recaptcha_version` varchar(255) DEFAULT NULL,
  `facebook_client_id` text DEFAULT NULL,
  `facebook_client_secret` text DEFAULT NULL,
  `facebook_redirect_url` text DEFAULT NULL,
  `google_client_id` text DEFAULT NULL,
  `google_client_secret` text DEFAULT NULL,
  `google_redirect_url` text DEFAULT NULL,
  `google_recaptcha_site_key` varchar(255) DEFAULT NULL,
  `google_recaptcha_secret_key` varchar(255) DEFAULT NULL,
  `score_threshold` varchar(255) DEFAULT NULL,
  `cookie_text` text DEFAULT NULL,
  `cookie_button_text` text DEFAULT NULL,
  `facebook_login` int(11) NOT NULL DEFAULT 2 COMMENT '1 = Yes , 2 = No',
  `google_login` int(11) NOT NULL DEFAULT 2 COMMENT '1 = Yes , 2 = No',
  `subscribe_background` varchar(255) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `pixel_header` longtext DEFAULT NULL,
  `pixel_footer` longtext DEFAULT NULL,
  `home_background_color` varchar(255) DEFAULT NULL,
  `footer_background` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- إرجاع أو استيراد بيانات الجدول `settings`
--

INSERT INTO `settings` (`id`, `vendor_id`, `currency`, `currency_position`, `maintenance_mode`, `checkout_login_required`, `logo`, `favicon`, `delivery_type`, `timezone`, `address`, `email`, `description`, `contact`, `copyright`, `website_title`, `meta_title`, `meta_description`, `og_image`, `mail_driver`, `mail_host`, `mail_port`, `mail_username`, `mail_password`, `mail_encryption`, `mail_fromaddress`, `mail_fromname`, `facebook_link`, `twitter_link`, `instagram_link`, `linkedin_link`, `whatsapp_widget`, `whatsapp_message`, `telegram_message`, `telegram_access_token`, `telegram_chat_id`, `item_message`, `language`, `template`, `template_type`, `primary_color`, `secondary_color`, `landing_website_title`, `custom_domain`, `cname_title`, `cname_text`, `interval_time`, `interval_type`, `time_format`, `banner`, `tracking_id`, `view_id`, `firebase`, `cover_image`, `notification_sound`, `recaptcha_version`, `facebook_client_id`, `facebook_client_secret`, `facebook_redirect_url`, `google_client_id`, `google_client_secret`, `google_redirect_url`, `google_recaptcha_site_key`, `google_recaptcha_secret_key`, `score_threshold`, `cookie_text`, `cookie_button_text`, `facebook_login`, `google_login`, `subscribe_background`, `created_at`, `updated_at`, `pixel_header`, `pixel_footer`, `home_background_color`, `footer_background`) VALUES
(1, 1, 'KD', 'left', 2, 2, 'logo-64fb5d32742c4.png', 'favicon-64fb5d16d594d.png', '', 'Asia/Dubai', 'kuwait ciy, sharq', 'info@birds.re', NULL, '+96555140309', 'Copyright © 2023 BirdsMedia. All Rights Reserved', 'Birds SaaS | Admin', 'Birds SaaS - Multi Restaurant Online Food Ordering System SaaS', 'Birds SaaS – Your Ultimate Multi-Restaurant Online Food Ordering System! Simplify the dining experience for both customers and restaurants with our innovative SaaS solution. Seamlessly order your favorite dishes from multiple restaurants through WhatsApp, enjoying a hassle-free process from menu browsing to payment', 'default-og_image.png', 'smtp', 'smtp.gmail.com', '587', 'Mail Username', 'Mail Password', 'tls', 'hello@example.com', 'Gravity', 'https://www.facebook.com/', 'https://twitter.com/', 'https://www.instagram.com/', 'https://www.linkedin.com/in/', '', '', NULL, NULL, NULL, '', 1, 1, 1, '#1786fd', '#ffea00', 'Birds for Restaurants', '-', 'Read All Instructions Carefully Before Sending Custom Domain Request', '<p>If you&#39;re using cPanel or Plesk then you need to manually add custom domain in your server with the same root directory as the script&#39;s installation&nbsp;and user need to point their custom domain A record with your server IP. Example : 68.178.145.4</p>', '', 0, 1, '', 'tracking_id', 'view_id', '', '', '', 'v2', 'Facebook Client Id', 'Facebook Client Secret', 'Facebook Redirect URL', 'Google Client Id', 'Google Client Secret', 'Google Redirect URL', 'google_recaptcha_site_key', 'google_recaptcha_secret_key', '0.5', 'Your experience on this site will be improved by allowing cookies.', 'I Agree', 2, 2, NULL, NULL, '2023-09-08 21:43:55', NULL, NULL, NULL, NULL),
(6, 2, 'INR', 'left', 2, 2, 'default.png', 'favicon_default.png', '1,2', 'Asia/Kolkata', 'Your address', 'youremail@gmail.com', 'Your description', 'Your contact', 'Copyright © 2023 Gravity Infotech. All Rights Reserved', 'Your store name', 'Your store name', 'Description', 'default-og_image.png', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'Your facebook page link', 'Your twitter page link', 'Your instagram page link', 'Your linkedin page link', NULL, 'Hi, \nI would like to place an order 👇\n*{delivery_type}* Order No: {order_no}\n---------------------------\n{item_variable}\n---------------------------\n👉Subtotal : {sub_total}\n👉Tax : {total_tax}\n👉Delivery charge : {delivery_charge}\n👉Discount : - {discount_amount}\n---------------------------\n📃 Total : {grand_total}\n---------------------------\n📄 Comment : {notes}\n\n✅ Customer Info\n\nCustomer name : {customer_name}\nCustomer phone : {customer_mobile}\n\n📍 Delivery Details\n\nAddress : {address}, {building}, {landmark}, {postal_code}\n\n---------------------------\nDate : {date}\nTime : {time}\n---------------------------\n💳 Payment type :\n{payment_type}\n\n{store_name} will confirm your order upon receiving the message.\n\nTrack your order 👇\n{track_order_url}\n\nClick here for next order 👇\n{store_url}', 'Hi, \nI would like to place an order 👇\n*{delivery_type}* Order No: {order_no}\n---------------------------\n{item_variable}\n---------------------------\n👉Subtotal : {sub_total}\n👉Tax : {total_tax}\n👉Delivery charge : {delivery_charge}\n👉Discount : - {discount_amount}\n---------------------------\n📃 Total : {grand_total}\n---------------------------\n📄 Comment : {notes}\n\n✅ Customer Info\n\nCustomer name : {customer_name}\nCustomer phone : {customer_mobile}\n\n📍 Delivery Details\n\nAddress : {address}, {building}, {landmark}, {postal_code}\n\n---------------------------\nDate : {date}\nTime : {time}\n---------------------------\n💳 Payment type :\n{payment_type}\n\n{store_name} will confirm your order upon receiving the message.\n\nTrack your order 👇\n{track_order_url}\n\nClick here for next order 👇\n{store_url}', NULL, NULL, '🔵 {qty} X {item_name} {variantsdata} - {item_price}', 1, 4, 2, '#6783f4', '#e57171', NULL, NULL, NULL, NULL, '1', 2, 1, 'default-banner.png', NULL, NULL, NULL, 'default-cover.png', 'notification.mp3', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 2, 2, NULL, '2023-09-08 22:14:35', '2023-12-20 23:26:12', NULL, NULL, '#ffebeb', '[\"#e56666\",\"#f58484\"]'),
(7, 3, 'KD', 'right', 2, 2, 'logo-65824ab2ae807.svg', 'favicon-65846af85bed4.jpg', '1,2', 'Africa/Addis_Ababa', 'Your address', 'youremail@gmail.com', 'Your description', '+96555140309', 'Copyright © 2023 BirdsMedia. All Rights Reserved', 'Your store name', 'batoolsweets', 'Description', 'og_image-65846a4ee2c6f.jpg', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'Your facebook page link', 'Your twitter page link', 'Your instagram page link', 'Your linkedin page link', NULL, 'Hi, \r\nI would like to place an order 👇\r\n*{delivery_type}* Order No: {order_no}\r\n---------------------------\r\n{item_variable}\r\n---------------------------\r\n👉Subtotal : {sub_total}\r\n👉Tax : {total_tax}\r\n👉Delivery charge : {delivery_charge}\r\n👉Discount : - {discount_amount}\r\n---------------------------\r\n📃 Total : {grand_total}\r\n---------------------------\r\n📄 Comment : {notes}\r\n\r\n✅ Customer Info\r\n\r\nCustomer name : {customer_name}\r\nCustomer phone : {customer_mobile}\r\n\r\n📍 Delivery Details\r\n\r\nAddress : {address}, {building}, {landmark}, {postal_code}\r\n\r\n---------------------------\r\nDate : {date}\r\nTime : {time}\r\n---------------------------\r\n💳 Payment type :\r\n{payment_type}\r\n\r\n{store_name} will confirm your order upon receiving the message.\r\n\r\nTrack your order 👇\r\n{track_order_url}\r\n\r\nClick here for next order 👇\r\n{store_url}', 'Hi, \nI would like to place an order 👇\n*{delivery_type}* Order No: {order_no}\n---------------------------\n{item_variable}\n---------------------------\n👉Subtotal : {sub_total}\n👉Tax : {total_tax}\n👉Delivery charge : {delivery_charge}\n👉Discount : - {discount_amount}\n---------------------------\n📃 Total : {grand_total}\n---------------------------\n📄 Comment : {notes}\n\n✅ Customer Info\n\nCustomer name : {customer_name}\nCustomer phone : {customer_mobile}\n\n📍 Delivery Details\n\nAddress : {address}, {building}, {landmark}, {postal_code}\n\n---------------------------\nDate : {date}\nTime : {time}\n---------------------------\n💳 Payment type :\n{payment_type}\n\n{store_name} will confirm your order upon receiving the message.\n\nTrack your order 👇\n{track_order_url}\n\nClick here for next order 👇\n{store_url}', NULL, NULL, '🔵 {qty} X {item_name} {variantsdata} - {item_price}', 1, 4, 2, '#ff61a0', '#48ad61', NULL, '-', NULL, NULL, '1', 2, 1, 'banner-658262f5c4f54.jpg', NULL, NULL, '', 'cover-658263039cfd7.jpg', 'notification.mp3', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 2, 2, 'subscribe_bg-6582525c4d4b6.jpg', '2023-09-08 22:15:18', '2024-01-07 23:49:56', NULL, NULL, '#fbeaf1', '[\"#ff61a0\",\"#ff61a0\"]'),
(8, 4, 'ج.م', 'right', 2, 2, 'logo-6500d5e001981.png', 'favicon_default.png', '1', 'Asia/Dubai', 'حدائق الأهرام', 'youremail@gmail.com', NULL, 'Your contact', 'Copyright © 2023 BirdsMedia. All Rights Reserved', 'n2ily', 'Your store name', 'Description', 'default-og_image.png', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'Your facebook page link', 'Your twitter page link', 'Your instagram page link', 'Your linkedin page link', NULL, 'Hi, \nI would like to place an order 👇\n*{delivery_type}* Order No: {order_no}\n---------------------------\n{item_variable}\n---------------------------\n👉Subtotal : {sub_total}\n👉Tax : {total_tax}\n👉Delivery charge : {delivery_charge}\n👉Discount : - {discount_amount}\n---------------------------\n📃 Total : {grand_total}\n---------------------------\n📄 Comment : {notes}\n\n✅ Customer Info\n\nCustomer name : {customer_name}\nCustomer phone : {customer_mobile}\n\n📍 Delivery Details\n\nAddress : {address}, {building}, {landmark}, {postal_code}\n\n---------------------------\nDate : {date}\nTime : {time}\n---------------------------\n💳 Payment type :\n{payment_type}\n\n{store_name} will confirm your order upon receiving the message.\n\nTrack your order 👇\n{track_order_url}\n\nClick here for next order 👇\n{store_url}', 'Hi, \nI would like to place an order 👇\n*{delivery_type}* Order No: {order_no}\n---------------------------\n{item_variable}\n---------------------------\n👉Subtotal : {sub_total}\n👉Tax : {total_tax}\n👉Delivery charge : {delivery_charge}\n👉Discount : - {discount_amount}\n---------------------------\n📃 Total : {grand_total}\n---------------------------\n📄 Comment : {notes}\n\n✅ Customer Info\n\nCustomer name : {customer_name}\nCustomer phone : {customer_mobile}\n\n📍 Delivery Details\n\nAddress : {address}, {building}, {landmark}, {postal_code}\n\n---------------------------\nDate : {date}\nTime : {time}\n---------------------------\n💳 Payment type :\n{payment_type}\n\n{store_name} will confirm your order upon receiving the message.\n\nTrack your order 👇\n{track_order_url}\n\nClick here for next order 👇\n{store_url}', NULL, NULL, '🔵 {qty} X {item_name} {variantsdata} - {item_price}', 1, 4, 2, '#22ce95', '#22ce95', NULL, NULL, NULL, NULL, '1', 2, 1, 'banner-6500d468a070f.jpg', NULL, NULL, '', 'default-cover.png', 'notification.mp3', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 2, 2, 'subscribe_bg-6500d4b033640.jpg', '2023-09-12 12:30:50', '2023-12-20 02:35:06', NULL, NULL, NULL, '[\"#bdffe9\",\"#22ce95\"]'),
(9, 5, 'KD', 'left', 2, 2, 'logo-6581a1e17a507.svg', 'favicon_default.png', '1,2', 'Asia/Dubai', 'Your address', 'youremail@gmail.com', 'Your description', '55801615', 'Copyright © 2023 BirdsMedia. All Rights Reserved', 'Your store name', 'Your store name', 'Description', 'default-og_image.png', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'Your facebook page link', 'Your twitter page link', 'Your instagram page link', 'Your linkedin page link', NULL, 'Hi, \r\nI would like to place an order 👇\r\n*{delivery_type}* Order No: {order_no}\r\n---------------------------\r\n{item_variable}\r\n---------------------------\r\n👉Subtotal : {sub_total}\r\n👉Tax : {total_tax}\r\n👉Delivery charge : {delivery_charge}\r\n👉Discount : - {discount_amount}\r\n---------------------------\r\n📃 Total : {grand_total}\r\n---------------------------\r\n📄 Comment : {notes}\r\n\r\n✅ Customer Info\r\n\r\nCustomer name : {customer_name}\r\nCustomer phone : {customer_mobile}\r\n\r\n📍 Delivery Details\r\n\r\nAddress : {address}, {building}, {landmark}, {postal_code}\r\n\r\n---------------------------\r\nDate : {date}\r\nTime : {time}\r\n---------------------------\r\n💳 Payment type :\r\n{payment_type}\r\n\r\n{store_name} will confirm your order upon receiving the message.\r\n\r\nTrack your order 👇\r\n{track_order_url}\r\n\r\nClick here for next order 👇\r\n{store_url}', 'Hi, \nI would like to place an order 👇\n*{delivery_type}* Order No: {order_no}\n---------------------------\n{item_variable}\n---------------------------\n👉Subtotal : {sub_total}\n👉Tax : {total_tax}\n👉Delivery charge : {delivery_charge}\n👉Discount : - {discount_amount}\n---------------------------\n📃 Total : {grand_total}\n---------------------------\n📄 Comment : {notes}\n\n✅ Customer Info\n\nCustomer name : {customer_name}\nCustomer phone : {customer_mobile}\n\n📍 Delivery Details\n\nAddress : {address}, {building}, {landmark}, {postal_code}\n\n---------------------------\nDate : {date}\nTime : {time}\n---------------------------\n💳 Payment type :\n{payment_type}\n\n{store_name} will confirm your order upon receiving the message.\n\nTrack your order 👇\n{track_order_url}\n\nClick here for next order 👇\n{store_url}', NULL, NULL, '🔵 {qty} X {item_name} {variantsdata} - {item_price}', 1, 4, 2, '#fd3f3f', '#fb5b5b', NULL, 'test.birds.re', NULL, NULL, '1', 2, 1, 'banner-652af60508ebe.jpeg', NULL, NULL, '', 'cover-652af605092fa.jpeg', 'notification.mp3', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 2, 2, 'subscribe_bg-652af605095f3.jpeg', '2023-09-12 19:01:09', '2024-01-08 19:41:47', '<!-- Meta Pixel Code -->\r\n<script>\r\n!function(f,b,e,v,n,t,s)\r\n{if(f.fbq)return;n=f.fbq=function(){n.callMethod?\r\nn.callMethod.apply(n,arguments):n.queue.push(arguments)};\r\nif(!f._fbq)f._fbq=n;n.push=n;n.loaded=!0;n.version=\'2.0\';\r\nn.queue=[];t=b.createElement(e);t.async=!0;\r\nt.src=v;s=b.getElementsByTagName(e)[0];\r\ns.parentNode.insertBefore(t,s)}(window, document,\'script\',\r\n\'https://connect.facebook.net/en_US/fbevents.js\');\r\nfbq(\'init\', \'2313586402158211\');\r\nfbq(\'track\', \'PageView\');\r\n</script>\r\n<noscript><img height=\"1\" width=\"1\" style=\"display:none\"\r\nsrc=\"https://www.facebook.com/tr?id=2313586402158211&ev=PageView&noscript=1\"\r\n/></noscript>\r\n<!-- End Meta Pixel Code -->\r\n\r\n\r\n<!-- Snap Pixel Code -->\r\n<script type=\'text/javascript\'>\r\n(function(e,t,n){if(e.snaptr)return;var a=e.snaptr=function()\r\n{a.handleRequest?a.handleRequest.apply(a,arguments):a.queue.push(arguments)};\r\na.queue=[];var s=\'script\';r=t.createElement(s);r.async=!0;\r\nr.src=n;var u=t.getElementsByTagName(s)[0];\r\nu.parentNode.insertBefore(r,u);})(window,document,\r\n\'https://sc-static.net/scevent.min.js\');\r\n\r\nsnaptr(\'init\', \'13777996-c80d-499e-91d7-1431f6c38100\', {\r\n\'user_email\': \'_INSERT_USER_EMAIL_\'\r\n});\r\n\r\nsnaptr(\'track\', \'PAGE_VIEW\');\r\n\r\n</script>\r\n<!-- End Snap Pixel Code -->', NULL, '#fff5f5', '[\"#fd3f3f\",\"#fd3f3f\"]'),
(10, 18, 'KD', 'left', 2, 2, 'logo-658218f177cd8.svg', 'favicon_default.png', '1,2', 'Africa/Cairo', 'Your address', 'youremail@gmail.com', 'Your description', 'Your contact', 'Copyright © 2023 BirdsMedia. All Rights Reserved', 'Your store name', 'Your store name', 'Description', 'default-og_image.png', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'Your facebook page link', 'Your twitter page link', 'Your instagram page link', 'Your linkedin page link', NULL, 'Hi, \r\nI would like to place an order 👇\r\n*{delivery_type}* Order No: {order_no}\r\n---------------------------\r\n{item_variable}\r\n---------------------------\r\n👉Subtotal : {sub_total}\r\n👉Tax : {total_tax}\r\n👉Delivery charge : {delivery_charge}\r\n👉Discount : - {discount_amount}\r\n---------------------------\r\n📃 Total : {grand_total}\r\n---------------------------\r\n📄 Comment : {notes}\r\n\r\n✅ Customer Info\r\n\r\nCustomer name : {customer_name}\r\nCustomer phone : {customer_mobile}\r\n\r\n📍 Delivery Details\r\n\r\nAddress : {address}, {building}, {landmark}, {postal_code}\r\n\r\n---------------------------\r\nDate : {date}\r\nTime : {time}\r\n---------------------------\r\n💳 Payment type :\r\n{payment_type}\r\n\r\n{store_name} will confirm your order upon receiving the message.\r\n\r\nTrack your order 👇\r\n{track_order_url}\r\n\r\nClick here for next order 👇\r\n{store_url}', 'Hi, \r\nI would like to place an order 👇\r\n*{delivery_type}* Order No: {order_no}\r\n---------------------------\r\n{item_variable}\r\n---------------------------\r\n👉Subtotal : {sub_total}\r\n👉Tax : {total_tax}\r\n👉Delivery charge : {delivery_charge}\r\n👉Discount : - {discount_amount}\r\n---------------------------\r\n📃 Total : {grand_total}\r\n---------------------------\r\n📄 Comment : {notes}\r\n\r\n✅ Customer Info\r\n\r\nCustomer name : {customer_name}\r\nCustomer phone : {customer_mobile}\r\n\r\n📍 Delivery Details\r\n\r\nAddress : {address}, {building}, {landmark}, {postal_code}\r\n\r\n---------------------------\r\nDate : {date}\r\nTime : {time}\r\n---------------------------\r\n💳 Payment type :\r\n{payment_type}\r\n\r\n{store_name} will confirm your order upon receiving the message.\r\n\r\nTrack your order 👇\r\n{track_order_url}\r\n\r\nClick here for next order 👇\r\n{store_url}', NULL, NULL, '🔵 {qty} X {item_name} {variantsdata} - {item_price}', 1, 4, 2, '#57bc68', '#186d3d', NULL, 'chapatikumar.com', NULL, NULL, '1', 2, 1, 'banner-6582197c364e1.jpeg', NULL, NULL, '', 'default-cover.png', 'notification.mp3', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 2, 2, NULL, '2023-12-14 01:52:03', '2024-01-08 01:11:58', NULL, NULL, '#f0fff8', '[\"#57bc68\",\"#8eec9d\"]'),
(11, 19, 'KD', 'left', 2, 2, 'logo-6581c524cf319.svg', 'favicon_default.png', '1,2', 'Asia/Dubai', 'Your address', 'batool@gmail.com', 'Your description', 'Your contact', 'Copyright © 2023 BirdsMedia. All Rights Reserved', 'Your store name', 'Your store name', 'Description', 'default-og_image.png', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'Your facebook page link', 'Your twitter page link', 'Your instagram page link', 'Your linkedin page link', NULL, 'Hi, \r\nI would like to place an order 👇\r\n*{delivery_type}* Order No: {order_no}\r\n---------------------------\r\n{item_variable}\r\n---------------------------\r\n👉Subtotal : {sub_total}\r\n👉Tax : {total_tax}\r\n👉Delivery charge : {delivery_charge}\r\n👉Discount : - {discount_amount}\r\n---------------------------\r\n📃 Total : {grand_total}\r\n---------------------------\r\n📄 Comment : {notes}\r\n\r\n✅ Customer Info\r\n\r\nCustomer name : {customer_name}\r\nCustomer phone : {customer_mobile}\r\n\r\n📍 Delivery Details\r\n\r\nAddress : {address}, {building}, {landmark}, {postal_code}\r\n\r\n---------------------------\r\nDate : {date}\r\nTime : {time}\r\n---------------------------\r\n💳 Payment type :\r\n{payment_type}\r\n\r\n{store_name} will confirm your order upon receiving the message.\r\n\r\nTrack your order 👇\r\n{track_order_url}\r\n\r\nClick here for next order 👇\r\n{store_url}', 'Hi, \r\nI would like to place an order 👇\r\n*{delivery_type}* Order No: {order_no}\r\n---------------------------\r\n{item_variable}\r\n---------------------------\r\n👉Subtotal : {sub_total}\r\n👉Tax : {total_tax}\r\n👉Delivery charge : {delivery_charge}\r\n👉Discount : - {discount_amount}\r\n---------------------------\r\n📃 Total : {grand_total}\r\n---------------------------\r\n📄 Comment : {notes}\r\n\r\n✅ Customer Info\r\n\r\nCustomer name : {customer_name}\r\nCustomer phone : {customer_mobile}\r\n\r\n📍 Delivery Details\r\n\r\nAddress : {address}, {building}, {landmark}, {postal_code}\r\n\r\n---------------------------\r\nDate : {date}\r\nTime : {time}\r\n---------------------------\r\n💳 Payment type :\r\n{payment_type}\r\n\r\n{store_name} will confirm your order upon receiving the message.\r\n\r\nTrack your order 👇\r\n{track_order_url}\r\n\r\nClick here for next order 👇\r\n{store_url}', NULL, NULL, '🔵 {qty} X {item_name} {variantsdata} - {item_price}', 1, 4, 2, '#1D5B79', '#69ddf2', NULL, '-', NULL, NULL, '1', 2, 1, 'banner-6581c4cb307c6.jpg', NULL, NULL, '', 'default-cover.png', 'notification.mp3', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 2, 2, NULL, '2023-12-19 18:37:33', '2024-01-07 23:50:02', NULL, NULL, '#fff0f0', '[\"#ff9494\",\"#1D5B79\"]'),
(12, 20, 'KD', 'left', 2, 2, 'logo-65821b8ecd8ec.svg', 'favicon_default.png', '1,2', 'Asia/Dubai', 'Your address', 'youremail@gmail.com', 'Your description', 'Your contact', 'Copyright © 2023 BirdsMedia. All Rights Reserved', 'Your store name', 'Your store name', 'Description', 'default-og_image.png', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'Your facebook page link', 'Your twitter page link', 'Your instagram page link', 'Your linkedin page link', NULL, 'Hi, \r\nI would like to place an order 👇\r\n*{delivery_type}* Order No: {order_no}\r\n---------------------------\r\n{item_variable}\r\n---------------------------\r\n👉Subtotal : {sub_total}\r\n👉Tax : {total_tax}\r\n👉Delivery charge : {delivery_charge}\r\n👉Discount : - {discount_amount}\r\n---------------------------\r\n📃 Total : {grand_total}\r\n---------------------------\r\n📄 Comment : {notes}\r\n\r\n✅ Customer Info\r\n\r\nCustomer name : {customer_name}\r\nCustomer phone : {customer_mobile}\r\n\r\n📍 Delivery Details\r\n\r\nAddress : {address}, {building}, {landmark}, {postal_code}\r\n\r\n---------------------------\r\nDate : {date}\r\nTime : {time}\r\n---------------------------\r\n💳 Payment type :\r\n{payment_type}\r\n\r\n{store_name} will confirm your order upon receiving the message.\r\n\r\nTrack your order 👇\r\n{track_order_url}\r\n\r\nClick here for next order 👇\r\n{store_url}', 'Hi, \r\nI would like to place an order 👇\r\n*{delivery_type}* Order No: {order_no}\r\n---------------------------\r\n{item_variable}\r\n---------------------------\r\n👉Subtotal : {sub_total}\r\n👉Tax : {total_tax}\r\n👉Delivery charge : {delivery_charge}\r\n👉Discount : - {discount_amount}\r\n---------------------------\r\n📃 Total : {grand_total}\r\n---------------------------\r\n📄 Comment : {notes}\r\n\r\n✅ Customer Info\r\n\r\nCustomer name : {customer_name}\r\nCustomer phone : {customer_mobile}\r\n\r\n📍 Delivery Details\r\n\r\nAddress : {address}, {building}, {landmark}, {postal_code}\r\n\r\n---------------------------\r\nDate : {date}\r\nTime : {time}\r\n---------------------------\r\n💳 Payment type :\r\n{payment_type}\r\n\r\n{store_name} will confirm your order upon receiving the message.\r\n\r\nTrack your order 👇\r\n{track_order_url}\r\n\r\nClick here for next order 👇\r\n{store_url}', NULL, NULL, '🔵 {qty} X {item_name} {variantsdata} - {item_price}', 1, 4, 2, '#ff85c0', '#6096B4', NULL, NULL, NULL, NULL, '1', 2, 1, 'banner-65821afd4e09c.jpg', NULL, NULL, '', 'default-cover.png', 'notification.mp3', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 2, 2, NULL, '2023-12-20 02:35:38', '2023-12-20 01:39:10', NULL, NULL, '#fff0f9', '[null,null]'),
(13, 22, 'KD', 'left', 2, 2, 'default.png', 'favicon_default.png', '1,2', 'Asia/Dubai', 'Your address', 'youremail@gmail.com', 'Your description', 'Your contact', 'Copyright © 2023 BirdsMedia. All Rights Reserved', 'Your store name', 'Your store name', 'Description', 'default-og_image.png', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'Your facebook page link', 'Your twitter page link', 'Your instagram page link', 'Your linkedin page link', NULL, 'Hi, \r\nI would like to place an order 👇\r\n*{delivery_type}* Order No: {order_no}\r\n---------------------------\r\n{item_variable}\r\n---------------------------\r\n👉Subtotal : {sub_total}\r\n👉Tax : {total_tax}\r\n👉Delivery charge : {delivery_charge}\r\n👉Discount : - {discount_amount}\r\n---------------------------\r\n📃 Total : {grand_total}\r\n---------------------------\r\n📄 Comment : {notes}\r\n\r\n✅ Customer Info\r\n\r\nCustomer name : {customer_name}\r\nCustomer phone : {customer_mobile}\r\n\r\n📍 Delivery Details\r\n\r\nAddress : {address}, {building}, {landmark}, {postal_code}\r\n\r\n---------------------------\r\nDate : {date}\r\nTime : {time}\r\n---------------------------\r\n💳 Payment type :\r\n{payment_type}\r\n\r\n{store_name} will confirm your order upon receiving the message.\r\n\r\nTrack your order 👇\r\n{track_order_url}\r\n\r\nClick here for next order 👇\r\n{store_url}', 'Hi, \r\nI would like to place an order 👇\r\n*{delivery_type}* Order No: {order_no}\r\n---------------------------\r\n{item_variable}\r\n---------------------------\r\n👉Subtotal : {sub_total}\r\n👉Tax : {total_tax}\r\n👉Delivery charge : {delivery_charge}\r\n👉Discount : - {discount_amount}\r\n---------------------------\r\n📃 Total : {grand_total}\r\n---------------------------\r\n📄 Comment : {notes}\r\n\r\n✅ Customer Info\r\n\r\nCustomer name : {customer_name}\r\nCustomer phone : {customer_mobile}\r\n\r\n📍 Delivery Details\r\n\r\nAddress : {address}, {building}, {landmark}, {postal_code}\r\n\r\n---------------------------\r\nDate : {date}\r\nTime : {time}\r\n---------------------------\r\n💳 Payment type :\r\n{payment_type}\r\n\r\n{store_name} will confirm your order upon receiving the message.\r\n\r\nTrack your order 👇\r\n{track_order_url}\r\n\r\nClick here for next order 👇\r\n{store_url}', NULL, NULL, '🔵 {qty} X {item_name} {variantsdata} - {item_price}', 1, 4, 3, '#ee2f2f', '#e53434', NULL, NULL, NULL, NULL, '1', 2, 1, 'default-banner.png', NULL, NULL, NULL, 'default-cover.png', 'notification.mp3', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 2, 2, NULL, '2023-12-21 00:17:20', '2023-12-20 23:20:18', NULL, NULL, '#ffe5e5', '[\"#ee4444\",\"#dc5050\"]'),
(14, 24, 'KD', 'left', 2, 2, 'logo-658352645cd22.svg', 'favicon_default.png', '1,2', 'Asia/Dubai', 'Your address', 'youremail@gmail.com', 'Your description', 'Your contact', 'Copyright © 2023 BirdsMedia. All Rights Reserved', 'Your store name', 'Your store name', 'Description', 'default-og_image.png', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'Your facebook page link', 'Your twitter page link', 'Your instagram page link', 'Your linkedin page link', NULL, 'Hi, \r\nI would like to place an order 👇\r\n*{delivery_type}* Order No: {order_no}\r\n---------------------------\r\n{item_variable}\r\n---------------------------\r\n👉Subtotal : {sub_total}\r\n👉Tax : {total_tax}\r\n👉Delivery charge : {delivery_charge}\r\n👉Discount : - {discount_amount}\r\n---------------------------\r\n📃 Total : {grand_total}\r\n---------------------------\r\n📄 Comment : {notes}\r\n\r\n✅ Customer Info\r\n\r\nCustomer name : {customer_name}\r\nCustomer phone : {customer_mobile}\r\n\r\n📍 Delivery Details\r\n\r\nAddress : {address}, {building}, {landmark}, {postal_code}\r\n\r\n---------------------------\r\nDate : {date}\r\nTime : {time}\r\n---------------------------\r\n💳 Payment type :\r\n{payment_type}\r\n\r\n{store_name} will confirm your order upon receiving the message.\r\n\r\nTrack your order 👇\r\n{track_order_url}\r\n\r\nClick here for next order 👇\r\n{store_url}', 'Hi, \r\nI would like to place an order 👇\r\n*{delivery_type}* Order No: {order_no}\r\n---------------------------\r\n{item_variable}\r\n---------------------------\r\n👉Subtotal : {sub_total}\r\n👉Tax : {total_tax}\r\n👉Delivery charge : {delivery_charge}\r\n👉Discount : - {discount_amount}\r\n---------------------------\r\n📃 Total : {grand_total}\r\n---------------------------\r\n📄 Comment : {notes}\r\n\r\n✅ Customer Info\r\n\r\nCustomer name : {customer_name}\r\nCustomer phone : {customer_mobile}\r\n\r\n📍 Delivery Details\r\n\r\nAddress : {address}, {building}, {landmark}, {postal_code}\r\n\r\n---------------------------\r\nDate : {date}\r\nTime : {time}\r\n---------------------------\r\n💳 Payment type :\r\n{payment_type}\r\n\r\n{store_name} will confirm your order upon receiving the message.\r\n\r\nTrack your order 👇\r\n{track_order_url}\r\n\r\nClick here for next order 👇\r\n{store_url}', NULL, NULL, '🔵 {qty} X {item_name} {variantsdata} - {item_price}', 1, 4, 2, '#244beb', '#52c2ff', NULL, NULL, NULL, NULL, '1', 2, 1, 'default-banner.png', NULL, NULL, NULL, 'default-cover.png', 'notification.mp3', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 2, 2, NULL, '2023-12-21 00:40:35', '2023-12-20 23:45:24', NULL, NULL, '#ffebeb', '[\"#ee3f3f\",\"#f04242\"]'),
(15, 25, 'KD', 'left', 2, 2, 'default.png', 'favicon_default.png', '1,2', 'Asia/Dubai', 'Your address', 'youremail@gmail.com', 'Your description', 'Your contact', 'Copyright © 2023 BirdsMedia. All Rights Reserved', 'Your store name', 'Your store name', 'Description', 'default-og_image.png', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'Your facebook page link', 'Your twitter page link', 'Your instagram page link', 'Your linkedin page link', NULL, 'Hi, \nI would like to place an order 👇\n*{delivery_type}* Order No: {order_no}\n---------------------------\n{item_variable}\n---------------------------\n👉Subtotal : {sub_total}\n👉Tax : {total_tax}\n👉Delivery charge : {delivery_charge}\n👉Discount : - {discount_amount}\n---------------------------\n📃 Total : {grand_total}\n---------------------------\n📄 Comment : {notes}\n\n✅ Customer Info\n\nCustomer name : {customer_name}\nCustomer phone : {customer_mobile}\n\n📍 Delivery Details\n\nAddress : {address}, {building}, {landmark}, {postal_code}\n\n---------------------------\nDate : {date}\nTime : {time}\n---------------------------\n💳 Payment type :\n{payment_type}\n\n{store_name} will confirm your order upon receiving the message.\n\nTrack your order 👇\n{track_order_url}\n\nClick here for next order 👇\n{store_url}', 'Hi, \nI would like to place an order 👇\n*{delivery_type}* Order No: {order_no}\n---------------------------\n{item_variable}\n---------------------------\n👉Subtotal : {sub_total}\n👉Tax : {total_tax}\n👉Delivery charge : {delivery_charge}\n👉Discount : - {discount_amount}\n---------------------------\n📃 Total : {grand_total}\n---------------------------\n📄 Comment : {notes}\n\n✅ Customer Info\n\nCustomer name : {customer_name}\nCustomer phone : {customer_mobile}\n\n📍 Delivery Details\n\nAddress : {address}, {building}, {landmark}, {postal_code}\n\n---------------------------\nDate : {date}\nTime : {time}\n---------------------------\n💳 Payment type :\n{payment_type}\n\n{store_name} will confirm your order upon receiving the message.\n\nTrack your order 👇\n{track_order_url}\n\nClick here for next order 👇\n{store_url}', NULL, NULL, '🔵 {qty} X {item_name} {variantsdata} - {item_price}', 1, 1, 1, '#181D31', '#6096B4', NULL, NULL, NULL, NULL, '1', 2, 1, 'default-banner.png', NULL, NULL, NULL, 'default-cover.png', 'notification.mp3', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 2, 2, NULL, '2023-12-28 19:37:29', '2023-12-28 19:37:29', NULL, NULL, NULL, NULL);

-- --------------------------------------------------------

--
-- بنية الجدول `subscribers`
--

CREATE TABLE `subscribers` (
  `id` int(10) UNSIGNED NOT NULL,
  `vendor_id` int(11) NOT NULL,
  `email` varchar(255) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- إرجاع أو استيراد بيانات الجدول `subscribers`
--

INSERT INTO `subscribers` (`id`, `vendor_id`, `email`, `created_at`, `updated_at`) VALUES
(1, 1, 'hDiMki.thjcjbp@tonetics.biz', '2023-12-15 12:41:58', '2023-12-15 12:41:58'),
(2, 1, 'EomOiP.thtdhjt@tonetics.biz', '2023-12-15 17:34:29', '2023-12-15 17:34:29'),
(3, 1, 'XIxrmD.ttdqhbh@tonetics.biz', '2023-12-16 06:45:01', '2023-12-16 06:45:01'),
(4, 1, 'Udjxjo.ttwbcpq@tonetics.biz', '2023-12-16 12:12:34', '2023-12-16 12:12:34'),
(5, 1, 'AXoWXn.tbtbbtp@tonetics.biz', '2023-12-17 08:58:33', '2023-12-17 08:58:33'),
(6, 1, 'yBCHkE.tcpcmtw@tonetics.biz', '2023-12-18 04:08:24', '2023-12-18 04:08:24'),
(7, 1, 'VKtpnz.tpdjmqw@tonetics.biz', '2023-12-18 12:14:01', '2023-12-18 12:14:01'),
(8, 1, 'JXYzXk.tpcbbbq@tonetics.biz', '2023-12-18 14:39:39', '2023-12-18 14:39:39'),
(9, 1, 'FnsEjM.tpwjcdm@tonetics.biz', '2023-12-18 16:29:14', '2023-12-18 16:29:14'),
(10, 1, 'yxHWvb.twdphdm@tonetics.biz', '2023-12-19 00:30:11', '2023-12-19 00:30:11');

-- --------------------------------------------------------

--
-- بنية الجدول `systemaddons`
--

CREATE TABLE `systemaddons` (
  `id` int(11) NOT NULL,
  `name` varchar(255) NOT NULL,
  `unique_identifier` varchar(255) NOT NULL,
  `version` varchar(20) NOT NULL,
  `activated` int(11) NOT NULL,
  `image` varchar(255) NOT NULL,
  `type` int(11) DEFAULT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `updated_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- إرجاع أو استيراد بيانات الجدول `systemaddons`
--

INSERT INTO `systemaddons` (`id`, `name`, `unique_identifier`, `version`, `activated`, `image`, `type`, `created_at`, `updated_at`) VALUES
(1, 'Google Analytics', 'google_analytics', '3.0', 1, 'google_analytics.jpg', NULL, '2023-09-07 13:44:07', '2023-09-07 13:44:07'),
(2, 'Blogs', 'blog', '3.0', 1, 'blog.jpg', NULL, '2023-09-07 13:44:10', '2023-09-07 13:44:10'),
(3, 'Coupons', 'coupon', '3.0', 1, 'coupons.jpg', NULL, '2023-09-07 13:44:13', '2023-09-07 13:44:13'),
(4, 'Custom Domain', 'custom_domain', '3.0', 1, 'custom_domain.jpg', NULL, '2023-09-07 13:44:17', '2023-09-07 13:44:17'),
(5, 'Multiple Languages', 'language', '3.0', 1, 'language.jpg', NULL, '2023-09-07 13:44:20', '2023-09-07 13:44:20'),
(6, 'Subscription', 'subscription', '3.0', 1, 'subscription.jpg', NULL, '2023-09-07 13:44:24', '2023-09-07 13:44:24'),
(7, 'Multiple Themes', 'template', '3.0', 1, 'template.jpg', NULL, '2023-09-07 13:44:27', '2023-09-07 13:44:27'),
(8, 'POS', 'pos', '3.0', 1, 'pos.jpg', NULL, '2023-09-07 13:44:46', '2023-09-07 13:44:46'),
(9, 'Myfatoorah', 'myfatoorah', '3.0', 1, 'myfatoorah.jpg', NULL, '2023-09-07 13:46:53', '2023-09-07 13:46:53');

-- --------------------------------------------------------

--
-- بنية الجدول `tableqr`
--

CREATE TABLE `tableqr` (
  `id` int(11) NOT NULL,
  `vendor_id` int(11) NOT NULL,
  `area_id` int(11) NOT NULL COMMENT ' ',
  `name` varchar(255) NOT NULL,
  `size` bigint(20) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- بنية الجدول `table_area`
--

CREATE TABLE `table_area` (
  `id` int(11) NOT NULL,
  `vendor_id` int(11) NOT NULL,
  `name` varchar(255) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- بنية الجدول `table_book`
--

CREATE TABLE `table_book` (
  `id` int(11) NOT NULL,
  `vendor_id` int(11) NOT NULL,
  `event` varchar(255) NOT NULL,
  `people` bigint(20) NOT NULL,
  `event_date` varchar(255) NOT NULL,
  `event_time` varchar(255) NOT NULL,
  `name` varchar(255) NOT NULL,
  `mobile` bigint(20) NOT NULL,
  `email` varchar(255) NOT NULL,
  `notes` text DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- إرجاع أو استيراد بيانات الجدول `table_book`
--

INSERT INTO `table_book` (`id`, `vendor_id`, `event`, `people`, `event_date`, `event_time`, `name`, `mobile`, `email`, `notes`, `created_at`, `updated_at`) VALUES
(1, 3, 'efdsf', 85, '2023-09-13', '06:53', 'ahmad abdelaziz', 55140309, 'ahmad.abdelaziz92@live.com', NULL, '2023-09-09 01:54:04', '2023-09-09 01:54:04');

-- --------------------------------------------------------

--
-- بنية الجدول `terms`
--

CREATE TABLE `terms` (
  `id` int(11) NOT NULL,
  `vendor_id` int(11) NOT NULL,
  `terms_content` longtext NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `updated_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- إرجاع أو استيراد بيانات الجدول `terms`
--

INSERT INTO `terms` (`id`, `vendor_id`, `terms_content`, `created_at`, `updated_at`) VALUES
(1, 1, '<p><big><strong>Terms & Conditions</strong></big></p>\r\n\r\n<p>&nbsp;</p>\r\n\r\n<p>&quot;Sed ut perspiciatis unde omnis iste natus error sit voluptatem accusantium doloremque laudantium, totam rem aperiam, eaque ipsa quae ab illo inventore veritatis et quasi architecto beatae vitae dicta sunt explicabo. Nemo enim ipsam voluptatem quia voluptas sit aspernatur aut odit aut fugit, sed quia consequuntur magni dolores eos qui ratione voluptatem sequi nesciunt. Neque porro quisquam est, qui dolorem ipsum quia dolor sit amet, consectetur, adipisci velit, sed quia non numquam eius modi tempora incidunt ut labore et dolore magnam aliquam quaerat voluptatem. Ut enim ad minima veniam, quis nostrum exercitationem ullam corporis suscipit laboriosam, nisi ut aliquid ex ea commodi consequatur? Quis autem vel eum iure reprehenderit qui in ea voluptate velit esse quam nihil molestiae consequatur, vel illum qui dolorem eum fugiat quo voluptas nulla pariatur?&quot;</p>\r\n\r\n<p>&nbsp;</p>\r\n\r\n<p>&quot;Sed ut perspiciatis unde omnis iste natus error sit voluptatem accusantium doloremque laudantium, totam rem aperiam, eaque ipsa quae ab illo inventore veritatis et quasi architecto beatae vitae dicta sunt explicabo. Nemo enim ipsam voluptatem quia voluptas sit aspernatur aut odit aut fugit, sed quia consequuntur magni dolores eos qui ratione voluptatem sequi nesciunt. Neque porro quisquam est, qui dolorem ipsum quia dolor sit amet, consectetur, adipisci velit, sed quia non numquam eius modi tempora incidunt ut labore et dolore magnam aliquam quaerat voluptatem. Ut enim ad minima veniam, quis nostrum exercitationem ullam corporis suscipit laboriosam, nisi ut aliquid ex ea commodi consequatur? Quis autem vel eum iure reprehenderit qui in ea voluptate velit esse quam nihil molestiae consequatur, vel illum qui dolorem eum fugiat quo voluptas nulla pariatur?&quot;</p>\r\n\r\n<p>&nbsp;</p>\r\n\r\n<p>&quot;Sed ut perspiciatis unde omnis iste natus error sit voluptatem accusantium doloremque laudantium, totam rem aperiam, eaque ipsa quae ab illo inventore veritatis et quasi architecto beatae vitae dicta sunt explicabo. Nemo enim ipsam voluptatem quia voluptas sit aspernatur aut odit aut fugit, sed quia consequuntur magni dolores eos qui ratione voluptatem sequi nesciunt. Neque porro quisquam est, qui dolorem ipsum quia dolor sit amet, consectetur, adipisci velit, sed quia non numquam eius modi tempora incidunt ut labore et dolore magnam aliquam quaerat voluptatem. Ut enim ad minima veniam, quis nostrum exercitationem ullam corporis suscipit laboriosam, nisi ut aliquid ex ea commodi consequatur? Quis autem vel eum iure reprehenderit qui in ea voluptate velit esse quam nihil molestiae consequatur, vel illum qui dolorem eum fugiat quo voluptas nulla pariatur?&quot;</p>\r\n\r\n<p>&nbsp;</p>\r\n\r\n<p>&quot;Sed ut perspiciatis unde omnis iste natus error sit voluptatem accusantium doloremque laudantium, totam rem aperiam, eaque ipsa quae ab illo inventore veritatis et quasi architecto beatae vitae dicta sunt explicabo. Nemo enim ipsam voluptatem quia voluptas sit aspernatur aut odit aut fugit, sed quia consequuntur magni dolores eos qui ratione voluptatem sequi nesciunt. Neque porro quisquam est, qui dolorem ipsum quia dolor sit amet, consectetur, adipisci velit, sed quia non numquam eius modi tempora incidunt ut labore et dolore magnam aliquam quaerat voluptatem. Ut enim ad minima veniam, quis nostrum exercitationem ullam corporis suscipit laboriosam, nisi ut aliquid ex ea commodi consequatur? Quis autem vel eum iure reprehenderit qui in ea voluptate velit esse quam nihil molestiae consequatur, vel illum qui dolorem eum fugiat quo voluptas nulla pariatur?&quot;</p>\r\n\r\n<p>&nbsp;</p>\r\n\r\n<p>&quot;Sed ut perspiciatis unde omnis iste natus error sit voluptatem accusantium doloremque laudantium, totam rem aperiam, eaque ipsa quae ab illo inventore veritatis et quasi architecto beatae vitae dicta sunt explicabo. Nemo enim ipsam voluptatem quia voluptas sit aspernatur aut odit aut fugit, sed quia consequuntur magni dolores eos qui ratione voluptatem sequi nesciunt. Neque porro quisquam est, qui dolorem ipsum quia dolor sit amet, consectetur, adipisci velit, sed quia non numquam eius modi tempora incidunt ut labore et dolore magnam aliquam quaerat voluptatem. Ut enim ad minima veniam, quis nostrum exercitationem ullam corporis suscipit laboriosam, nisi ut aliquid ex ea commodi consequatur? Quis autem vel eum iure reprehenderit qui in ea voluptate velit esse quam nihil molestiae consequatur, vel illum qui dolorem eum fugiat quo voluptas nulla pariatur?&quot;</p>\r\n\r\n<p>&nbsp;</p>\r\n\r\n<p>&quot;Sed ut perspiciatis unde omnis iste natus error sit voluptatem accusantium doloremque laudantium, totam rem aperiam, eaque ipsa quae ab illo inventore veritatis et quasi architecto beatae vitae dicta sunt explicabo. Nemo enim ipsam voluptatem quia voluptas sit aspernatur aut odit aut fugit, sed quia consequuntur magni dolores eos qui ratione voluptatem sequi nesciunt. Neque porro quisquam est, qui dolorem ipsum quia dolor sit amet, consectetur, adipisci velit, sed quia non numquam eius modi tempora incidunt ut labore et dolore magnam aliquam quaerat voluptatem. Ut enim ad minima veniam, quis nostrum exercitationem ullam corporis suscipit laboriosam, nisi ut aliquid ex ea commodi consequatur? Quis autem vel eum iure reprehenderit qui in ea voluptate velit esse quam nihil molestiae consequatur, vel illum qui dolorem eum fugiat quo voluptas nulla pariatur?&quot;</p>\r\n\r\n<p>&nbsp;</p>\r\n\r\n<p>&quot;Sed ut perspiciatis unde omnis iste natus error sit voluptatem accusantium doloremque laudantium, totam rem aperiam, eaque ipsa quae ab illo inventore veritatis et quasi architecto beatae vitae dicta sunt explicabo. Nemo enim ipsam voluptatem quia voluptas sit aspernatur aut odit aut fugit, sed quia consequuntur magni dolores eos qui ratione voluptatem sequi nesciunt. Neque porro quisquam est, qui dolorem ipsum quia dolor sit amet, consectetur, adipisci velit, sed quia non numquam eius modi tempora incidunt ut labore et dolore magnam aliquam quaerat voluptatem. Ut enim ad minima veniam, quis nostrum exercitationem ullam corporis suscipit laboriosam, nisi ut aliquid ex ea commodi consequatur? Quis autem vel eum iure reprehenderit qui in ea voluptate velit esse quam nihil molestiae consequatur, vel illum qui dolorem eum fugiat quo voluptas nulla pariatur?&quot;</p>', '2023-07-25 01:45:28', '2023-07-25 01:45:28'),
(2, 5, '<h1>Super fast WhatsApp orde</h1>\r\n\r\n<p>Leverage WhatsApp as platform to accept orders. Create a digital menu for your Restaurant or Bar. Share with your clients and let them order via Mobile</p>\r\n\r\n<h1>Super fast WhatsApp orde</h1>\r\n\r\n<p>Leverage WhatsApp as platform to accept orders. Create a digital menu for your Restaurant or Bar. Share with your clients and let them order via Mobile</p>\r\n\r\n<h1>Super fast WhatsApp orde</h1>\r\n\r\n<p>Leverage WhatsApp as platform to accept orders. Create a digital menu for your Restaurant or Bar. Share with your clients and let them order via Mobile</p>\r\n\r\n<h1>Super fast WhatsApp orde</h1>\r\n\r\n<p>Leverage WhatsApp as platform to accept orders. Create a digital menu for your Restaurant or Bar. Share with your clients and let them order via Mobile</p>\r\n\r\n<h1>Super fast WhatsApp orde</h1>\r\n\r\n<p>Leverage WhatsApp as platform to accept orders. Create a digital menu for your Restaurant or Bar. Share with your clients and let them order via Mobile</p>\r\n\r\n<h1>Super fast WhatsApp orde</h1>\r\n\r\n<p>Leverage WhatsApp as platform to accept orders. Create a digital menu for your Restaurant or Bar. Share with your clients and let them order via Mobile</p>', '2023-12-31 02:53:14', '2023-12-31 02:53:14');

-- --------------------------------------------------------

--
-- بنية الجدول `testimonials`
--

CREATE TABLE `testimonials` (
  `id` int(11) NOT NULL,
  `vendor_id` int(11) NOT NULL,
  `star` int(11) NOT NULL,
  `description` longtext NOT NULL,
  `name` varchar(255) NOT NULL,
  `image` varchar(255) NOT NULL,
  `position` varchar(255) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `updated_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- بنية الجدول `timings`
--

CREATE TABLE `timings` (
  `id` int(11) NOT NULL,
  `vendor_id` int(11) NOT NULL,
  `day` varchar(50) NOT NULL,
  `open_time` varchar(30) NOT NULL,
  `break_start` varchar(255) NOT NULL,
  `break_end` varchar(255) NOT NULL,
  `close_time` varchar(30) NOT NULL,
  `is_always_close` tinyint(1) NOT NULL COMMENT '1 For Yes, 2 For No',
  `created_at` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  `updated_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- إرجاع أو استيراد بيانات الجدول `timings`
--

INSERT INTO `timings` (`id`, `vendor_id`, `day`, `open_time`, `break_start`, `break_end`, `close_time`, `is_always_close`, `created_at`, `updated_at`) VALUES
(1, 2, 'Monday', '09:00 AM', '01:00 PM', '02:00 PM', '09:00 PM', 2, '2023-09-08 22:14:35', '2023-09-08 22:14:35'),
(2, 2, 'Tuesday', '09:00 AM', '01:00 PM', '02:00 PM', '09:00 PM', 2, '2023-09-08 22:14:35', '2023-09-08 22:14:35'),
(3, 2, 'Wednesday', '09:00 AM', '01:00 PM', '02:00 PM', '09:00 PM', 2, '2023-09-08 22:14:35', '2023-09-08 22:14:35'),
(4, 2, 'Thursday', '09:00 AM', '01:00 PM', '02:00 PM', '09:00 PM', 2, '2023-09-08 22:14:35', '2023-09-08 22:14:35'),
(5, 2, 'Friday', '09:00 AM', '01:00 PM', '02:00 PM', '09:00 PM', 2, '2023-09-08 22:14:35', '2023-09-08 22:14:35'),
(6, 2, 'Saturday', '09:00 AM', '01:00 PM', '02:00 PM', '09:00 PM', 2, '2023-09-08 22:14:35', '2023-09-08 22:14:35'),
(7, 2, 'Sunday', '09:00 AM', '01:00 PM', '02:00 PM', '09:00 PM', 2, '2023-09-08 22:14:35', '2023-09-08 22:14:35'),
(8, 3, 'Monday', '09:00 AM', '', '', '09:00 PM', 2, '2023-09-09 01:50:25', '2023-09-09 01:50:25'),
(9, 3, 'Tuesday', '09:00 AM', '', '', '09:00 PM', 2, '2023-09-09 01:50:25', '2023-09-09 01:50:25'),
(10, 3, 'Wednesday', '09:00 AM', '', '', '09:00 PM', 2, '2023-09-09 01:50:25', '2023-09-09 01:50:25'),
(11, 3, 'Thursday', '09:00 AM', '', '', '09:00 PM', 2, '2023-09-09 01:50:25', '2023-09-09 01:50:25'),
(12, 3, 'Friday', '09:00 AM', '', '', '09:00 PM', 2, '2023-09-09 01:50:25', '2023-09-09 01:50:25'),
(13, 3, 'Saturday', '09:00 AM', '', '', '09:00 PM', 2, '2023-09-09 01:50:25', '2023-09-09 01:50:25'),
(14, 3, 'Sunday', '09:00 AM', '', '', '09:00 PM', 2, '2023-09-09 01:50:25', '2023-09-09 01:50:25'),
(15, 4, 'Monday', '09:00 AM', '01:00 PM', '02:00 PM', '09:00 PM', 2, '2023-09-12 12:30:50', '2023-09-12 12:30:50'),
(16, 4, 'Tuesday', '09:00 AM', '01:00 PM', '02:00 PM', '09:00 PM', 2, '2023-09-12 12:30:50', '2023-09-12 12:30:50'),
(17, 4, 'Wednesday', '09:00 AM', '01:00 PM', '02:00 PM', '09:00 PM', 2, '2023-09-12 12:30:50', '2023-09-12 12:30:50'),
(18, 4, 'Thursday', '09:00 AM', '01:00 PM', '02:00 PM', '09:00 PM', 2, '2023-09-12 12:30:50', '2023-09-12 12:30:50'),
(19, 4, 'Friday', '09:00 AM', '01:00 PM', '02:00 PM', '09:00 PM', 2, '2023-09-12 12:30:50', '2023-09-12 12:30:50'),
(20, 4, 'Saturday', '09:00 AM', '01:00 PM', '02:00 PM', '09:00 PM', 2, '2023-09-12 12:30:50', '2023-09-12 12:30:50'),
(21, 4, 'Sunday', '09:00 AM', '01:00 PM', '02:00 PM', '09:00 PM', 2, '2023-09-12 12:30:50', '2023-09-12 12:30:50'),
(22, 5, 'Monday', '09:00 AM', '01:00 PM', '02:00 PM', '09:00 PM', 2, '2023-09-12 19:01:09', '2023-09-12 19:01:09'),
(23, 5, 'Tuesday', '09:00 AM', '01:00 PM', '02:00 PM', '09:00 PM', 2, '2023-09-12 19:01:09', '2023-09-12 19:01:09'),
(24, 5, 'Wednesday', '09:00 AM', '01:00 PM', '02:00 PM', '09:00 PM', 2, '2023-09-12 19:01:09', '2023-09-12 19:01:09'),
(25, 5, 'Thursday', '09:00 AM', '01:00 PM', '02:00 PM', '09:00 PM', 2, '2023-09-12 19:01:09', '2023-09-12 19:01:09'),
(26, 5, 'Friday', '09:00 AM', '01:00 PM', '02:00 PM', '09:00 PM', 2, '2023-09-12 19:01:09', '2023-09-12 19:01:09'),
(27, 5, 'Saturday', '09:00 AM', '01:00 PM', '02:00 PM', '09:00 PM', 2, '2023-09-12 19:01:09', '2023-09-12 19:01:09'),
(28, 5, 'Sunday', '09:00 AM', '01:00 PM', '02:00 PM', '09:00 PM', 2, '2023-09-12 19:01:09', '2023-09-12 19:01:09'),
(29, 18, 'Monday', '09:00 AM', '01:00 PM', '02:00 PM', '09:00 PM', 2, '2023-12-14 01:52:03', '2023-12-14 01:52:03'),
(30, 18, 'Tuesday', '09:00 AM', '01:00 PM', '02:00 PM', '09:00 PM', 2, '2023-12-14 01:52:03', '2023-12-14 01:52:03'),
(31, 18, 'Wednesday', '09:00 AM', '01:00 PM', '02:00 PM', '09:00 PM', 2, '2023-12-14 01:52:03', '2023-12-14 01:52:03'),
(32, 18, 'Thursday', '09:00 AM', '01:00 PM', '02:00 PM', '09:00 PM', 2, '2023-12-14 01:52:03', '2023-12-14 01:52:03'),
(33, 18, 'Friday', '09:00 AM', '01:00 PM', '02:00 PM', '09:00 PM', 2, '2023-12-14 01:52:03', '2023-12-14 01:52:03'),
(34, 18, 'Saturday', '09:00 AM', '01:00 PM', '02:00 PM', '09:00 PM', 2, '2023-12-14 01:52:03', '2023-12-14 01:52:03'),
(35, 18, 'Sunday', '09:00 AM', '01:00 PM', '02:00 PM', '09:00 PM', 2, '2023-12-14 01:52:03', '2023-12-14 01:52:03'),
(36, 19, 'Monday', '09:00 AM', '01:00 PM', '02:00 PM', '09:00 PM', 2, '2023-12-19 18:37:33', '2023-12-19 18:37:33'),
(37, 19, 'Tuesday', '09:00 AM', '01:00 PM', '02:00 PM', '09:00 PM', 2, '2023-12-19 18:37:33', '2023-12-19 18:37:33'),
(38, 19, 'Wednesday', '09:00 AM', '01:00 PM', '02:00 PM', '09:00 PM', 2, '2023-12-19 18:37:33', '2023-12-19 18:37:33'),
(39, 19, 'Thursday', '09:00 AM', '01:00 PM', '02:00 PM', '09:00 PM', 2, '2023-12-19 18:37:33', '2023-12-19 18:37:33'),
(40, 19, 'Friday', '09:00 AM', '01:00 PM', '02:00 PM', '09:00 PM', 2, '2023-12-19 18:37:33', '2023-12-19 18:37:33'),
(41, 19, 'Saturday', '09:00 AM', '01:00 PM', '02:00 PM', '09:00 PM', 2, '2023-12-19 18:37:33', '2023-12-19 18:37:33'),
(42, 19, 'Sunday', '09:00 AM', '01:00 PM', '02:00 PM', '09:00 PM', 2, '2023-12-19 18:37:33', '2023-12-19 18:37:33'),
(43, 20, 'Monday', '09:00 AM', '01:00 PM', '02:00 PM', '09:00 PM', 2, '2023-12-20 02:35:38', '2023-12-20 02:35:38'),
(44, 20, 'Tuesday', '09:00 AM', '01:00 PM', '02:00 PM', '09:00 PM', 2, '2023-12-20 02:35:38', '2023-12-20 02:35:38'),
(45, 20, 'Wednesday', '09:00 AM', '01:00 PM', '02:00 PM', '09:00 PM', 2, '2023-12-20 02:35:38', '2023-12-20 02:35:38'),
(46, 20, 'Thursday', '09:00 AM', '01:00 PM', '02:00 PM', '09:00 PM', 2, '2023-12-20 02:35:38', '2023-12-20 02:35:38'),
(47, 20, 'Friday', '09:00 AM', '01:00 PM', '02:00 PM', '09:00 PM', 2, '2023-12-20 02:35:38', '2023-12-20 02:35:38'),
(48, 20, 'Saturday', '09:00 AM', '01:00 PM', '02:00 PM', '09:00 PM', 2, '2023-12-20 02:35:38', '2023-12-20 02:35:38'),
(49, 20, 'Sunday', '09:00 AM', '01:00 PM', '02:00 PM', '09:00 PM', 2, '2023-12-20 02:35:38', '2023-12-20 02:35:38'),
(50, 22, 'Monday', '09:00 AM', '01:00 PM', '02:00 PM', '09:00 PM', 2, '2023-12-21 00:17:20', '2023-12-21 00:17:20'),
(51, 22, 'Tuesday', '09:00 AM', '01:00 PM', '02:00 PM', '09:00 PM', 2, '2023-12-21 00:17:20', '2023-12-21 00:17:20'),
(52, 22, 'Wednesday', '09:00 AM', '01:00 PM', '02:00 PM', '09:00 PM', 2, '2023-12-21 00:17:20', '2023-12-21 00:17:20'),
(53, 22, 'Thursday', '09:00 AM', '01:00 PM', '02:00 PM', '09:00 PM', 2, '2023-12-21 00:17:20', '2023-12-21 00:17:20'),
(54, 22, 'Friday', '09:00 AM', '01:00 PM', '02:00 PM', '09:00 PM', 2, '2023-12-21 00:17:20', '2023-12-21 00:17:20'),
(55, 22, 'Saturday', '09:00 AM', '01:00 PM', '02:00 PM', '09:00 PM', 2, '2023-12-21 00:17:20', '2023-12-21 00:17:20'),
(56, 22, 'Sunday', '09:00 AM', '01:00 PM', '02:00 PM', '09:00 PM', 2, '2023-12-21 00:17:20', '2023-12-21 00:17:20'),
(57, 24, 'Monday', '09:00 AM', '01:00 PM', '02:00 PM', '09:00 PM', 2, '2023-12-21 00:40:35', '2023-12-21 00:40:35'),
(58, 24, 'Tuesday', '09:00 AM', '01:00 PM', '02:00 PM', '09:00 PM', 2, '2023-12-21 00:40:35', '2023-12-21 00:40:35'),
(59, 24, 'Wednesday', '09:00 AM', '01:00 PM', '02:00 PM', '09:00 PM', 2, '2023-12-21 00:40:35', '2023-12-21 00:40:35'),
(60, 24, 'Thursday', '09:00 AM', '01:00 PM', '02:00 PM', '09:00 PM', 2, '2023-12-21 00:40:35', '2023-12-21 00:40:35'),
(61, 24, 'Friday', '09:00 AM', '01:00 PM', '02:00 PM', '09:00 PM', 2, '2023-12-21 00:40:35', '2023-12-21 00:40:35'),
(62, 24, 'Saturday', '09:00 AM', '01:00 PM', '02:00 PM', '09:00 PM', 2, '2023-12-21 00:40:35', '2023-12-21 00:40:35'),
(63, 24, 'Sunday', '09:00 AM', '01:00 PM', '02:00 PM', '09:00 PM', 2, '2023-12-21 00:40:35', '2023-12-21 00:40:35'),
(64, 25, 'Monday', '09:00 AM', '01:00 PM', '02:00 PM', '09:00 PM', 2, '2023-12-28 19:37:29', '2023-12-28 19:37:29'),
(65, 25, 'Tuesday', '09:00 AM', '01:00 PM', '02:00 PM', '09:00 PM', 2, '2023-12-28 19:37:29', '2023-12-28 19:37:29'),
(66, 25, 'Wednesday', '09:00 AM', '01:00 PM', '02:00 PM', '09:00 PM', 2, '2023-12-28 19:37:29', '2023-12-28 19:37:29'),
(67, 25, 'Thursday', '09:00 AM', '01:00 PM', '02:00 PM', '09:00 PM', 2, '2023-12-28 19:37:29', '2023-12-28 19:37:29'),
(68, 25, 'Friday', '09:00 AM', '01:00 PM', '02:00 PM', '09:00 PM', 2, '2023-12-28 19:37:29', '2023-12-28 19:37:29'),
(69, 25, 'Saturday', '09:00 AM', '01:00 PM', '02:00 PM', '09:00 PM', 2, '2023-12-28 19:37:29', '2023-12-28 19:37:29'),
(70, 25, 'Sunday', '09:00 AM', '01:00 PM', '02:00 PM', '09:00 PM', 2, '2023-12-28 19:37:29', '2023-12-28 19:37:29');

-- --------------------------------------------------------

--
-- بنية الجدول `transactions`
--

CREATE TABLE `transactions` (
  `id` int(11) NOT NULL,
  `vendor_id` int(11) NOT NULL,
  `plan_id` int(11) NOT NULL,
  `plan_name` varchar(255) DEFAULT NULL,
  `payment_type` varchar(255) NOT NULL COMMENT 'payment_type = COD : 1,RazorPay : 2, Stripe : 3, Flutterwave : 4, Paystack : 5, Mercado Pago : 7, PayPal : 8, MyFatoorah : 9, toyyibpay : 10',
  `payment_id` varchar(255) DEFAULT NULL,
  `amount` float NOT NULL DEFAULT 0,
  `duration` varchar(255) NOT NULL COMMENT '1=1 Month,\r\n2=3Month\r\n3=6 Month\r\n4=1 Year',
  `days` int(11) DEFAULT NULL,
  `purchase_date` varchar(255) NOT NULL,
  `service_limit` varchar(255) NOT NULL,
  `appoinment_limit` varchar(255) NOT NULL,
  `custom_domain` int(11) NOT NULL COMMENT '1 = yes, 2 = no',
  `google_analytics` int(11) NOT NULL COMMENT '1 = yes, 2 = no',
  `coupons` int(11) NOT NULL DEFAULT 2,
  `blogs` int(11) NOT NULL DEFAULT 2,
  `social_logins` int(11) NOT NULL DEFAULT 2,
  `sound_notification` int(11) NOT NULL DEFAULT 2,
  `whatsapp_message` int(11) NOT NULL DEFAULT 2,
  `telegram_message` int(11) NOT NULL DEFAULT 2,
  `pos` int(11) NOT NULL DEFAULT 2,
  `tableqr` int(11) NOT NULL DEFAULT 2,
  `vendor_app` int(11) NOT NULL COMMENT '1 = Yes , 2 = No',
  `expire_date` varchar(255) NOT NULL,
  `themes_id` varchar(255) DEFAULT NULL,
  `screenshot` varchar(255) DEFAULT NULL,
  `status` int(11) NOT NULL COMMENT '1 = pending, 2 = yes/BankTransferAccepted,3=no/BankTransferDeclined',
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `updated_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- بنية الجدول `users`
--

CREATE TABLE `users` (
  `id` int(10) UNSIGNED NOT NULL,
  `name` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  `slug` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci DEFAULT NULL,
  `email` varchar(255) DEFAULT NULL,
  `mobile` varchar(255) DEFAULT NULL,
  `image` varchar(255) NOT NULL,
  `password` varchar(255) DEFAULT NULL,
  `google_id` varchar(255) DEFAULT NULL,
  `facebook_id` varchar(255) DEFAULT NULL,
  `login_type` varchar(255) NOT NULL,
  `type` tinyint(1) NOT NULL COMMENT '1=Admin,2=vendor,3=driver,4=User/Customer',
  `description` text DEFAULT NULL,
  `token` longtext DEFAULT NULL,
  `city_id` int(11) DEFAULT NULL,
  `area_id` int(11) DEFAULT NULL,
  `plan_id` varchar(255) DEFAULT NULL,
  `purchase_amount` varchar(255) DEFAULT NULL,
  `purchase_date` varchar(255) DEFAULT NULL,
  `available_on_landing` int(11) NOT NULL DEFAULT 2 COMMENT '1 = Yes , 2 = No',
  `payment_id` varchar(255) DEFAULT NULL,
  `payment_type` int(11) DEFAULT NULL,
  `free_plan` int(11) NOT NULL DEFAULT 0,
  `is_delivery` tinyint(1) DEFAULT NULL COMMENT '1=Yes,2=No',
  `allow_without_subscription` int(11) NOT NULL DEFAULT 2 COMMENT '1=Yes,2=No',
  `is_verified` tinyint(1) NOT NULL COMMENT '1=Yes,2=No',
  `is_available` tinyint(1) NOT NULL COMMENT '1=Yes,2=No',
  `remember_token` varchar(100) DEFAULT NULL,
  `license_type` text DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- إرجاع أو استيراد بيانات الجدول `users`
--

INSERT INTO `users` (`id`, `name`, `slug`, `email`, `mobile`, `image`, `password`, `google_id`, `facebook_id`, `login_type`, `type`, `description`, `token`, `city_id`, `area_id`, `plan_id`, `purchase_amount`, `purchase_date`, `available_on_landing`, `payment_id`, `payment_type`, `free_plan`, `is_delivery`, `allow_without_subscription`, `is_verified`, `is_available`, `remember_token`, `license_type`, `created_at`, `updated_at`) VALUES
(1, 'Admin', 'admin', 'admin@gmail.com', '1234567890', 'profile-64da130e5c43b.png', '$2y$10$BGzS523wDK3hKQO1iZb6Z.Y6AgATl.LXccaa.WhGzxNVnEJHoy5SC', NULL, NULL, 'normal', 1, NULL, 'cNjSsm-TREC9n58ZQeIDBL:APA91bHSLQ2S9VFhM2yGoQJG7d-noXkcsVXRQi8Y-XSUJIFZQgzF75Kbu5beKH8dGUZ9SqIND3yauVdcG6-SwcVjU4oIjpJUx5JC9cORZp-NvPtNkJT1IMLb0KgnN68UWAtzwvri8KqT', NULL, NULL, NULL, NULL, NULL, 2, NULL, NULL, 0, NULL, 2, 2, 2, NULL, 'Regular License', '2022-08-15 23:01:17', '2023-08-18 07:51:37'),
(2, 'ahmad abdelaziz', 'ahmad-abdelaziz', 'ahmad.abdelaziz92@live.com', '55140309', 'default.png', '$2y$10$cGeFcGPbQbS1ksMjld14h.kFltVdZCJKO0Jcz1JtLDrBSNsJG4fMC', '', '', 'normal', 2, NULL, '', 1, 1, '', '', '', 2, NULL, NULL, 0, NULL, 1, 2, 1, NULL, NULL, '2023-09-08 22:14:35', '2023-09-08 16:49:46'),
(3, 'abdelaziz', 'batolsweets', 'ahmadabdelaziz554@gmail.com', '55801615', 'default.png', '$2y$10$vXai695QxDxIRn3oyZQ65.j/WaRLCXojjw5YFshQ99RuKBKYh/0o6', '115817793901696506181', '', 'normal', 2, NULL, '', 1, 1, '', '', '', 2, NULL, NULL, 0, NULL, 1, 2, 1, NULL, NULL, '2023-09-08 22:15:18', '2023-12-21 19:37:21'),
(4, 'mohammed', 'mohammed', 'm@gmail.com', '50036909', 'default.png', '$2y$10$Bu4eIy95WhqknfEUj9u8kO5n7v6pW4W5C94n/ac.9r3uxAxA/6M2u', '', '', 'normal', 2, NULL, '', 1, 1, '', '', '', 2, NULL, NULL, 0, NULL, 1, 2, 1, NULL, NULL, '2023-09-12 12:30:49', '2023-09-12 08:31:15'),
(5, '2no', '2no', '2no@gmail.com', '1234741', 'default.png', '$2y$10$oCs//aSdQh9bV.0eQ3UIEeNwPyzU8kdaGsIcKHK599rrxE5GYLui2', '', '', 'normal', 2, NULL, '', 1, 1, '', '', '', 1, NULL, NULL, 0, NULL, 1, 2, 1, NULL, NULL, '2023-09-12 19:01:09', '2023-09-30 19:38:32'),
(6, 'mostafa', '218992', 'Harrodsschools@gmail.com', '11111111111111111111111', '', '$2y$10$BGzS523wDK3hKQO1iZb6Z.Y6AgATl.LXccaa.WhGzxNVnEJHoy5SC', NULL, NULL, 'normal', 1, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 2, NULL, NULL, 0, NULL, 1, 1, 1, NULL, NULL, '2023-10-01 21:07:07', '2023-10-01 21:07:07'),
(7, 'sss', '608409', 'adm@gmail.com', '50060610', 'default.png', '$2y$10$9diHAhHLpEwgRi1/Ag/9nedxIOYcTYLxP71LF/BuajoAd5DATp5qS', NULL, NULL, 'normal', 1, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 2, NULL, NULL, 0, NULL, 1, 1, 1, NULL, NULL, '2023-10-30 11:41:22', '2023-10-30 11:41:22'),
(8, '22222222', NULL, 'test.test@test.com', '+20331157751549', 'default.png', '$2y$10$/g6S9mhVU2DBvtOljuTXzuCQFK3WEmEoCBLwsTmgcXIid3FfiUpE6', NULL, NULL, 'normal', 3, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 2, NULL, NULL, 0, NULL, 2, 1, 1, NULL, NULL, '2023-11-08 03:11:39', '2023-11-08 03:11:39'),
(9, '1231111aaaaaaaaaa', NULL, 'admin222@gmail.com', '111111111111111', 'default.png', '$2y$10$/ikt3MZCVfDLUBTTbeMSiefqbzxOcH4ZAebdOE6G0PO6VtBMA9c.y', NULL, NULL, 'normal', 3, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 2, NULL, NULL, 0, NULL, 2, 1, 1, NULL, NULL, '2023-11-08 03:18:36', '2023-11-08 03:18:56'),
(10, 'ahmad abdelaziz', NULL, 'ahmad.abdelazi2@live.com', '55120369', 'default.png', '$2y$10$JmhGmCgPAFEAUkEYUi2im.4OnBhQYQahOHHVbqLE0.HMGeruGN7mO', NULL, NULL, 'normal', 3, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 2, NULL, NULL, 0, NULL, 2, 1, 1, NULL, NULL, '2023-11-09 00:18:35', '2023-11-09 00:18:35'),
(11, 'ahmad abdelaziz', NULL, 'ahmad.abdelazi92@live.com', '55801667', 'default.png', '$2y$10$MxKAriULKAIvDtz.cICkCu2VNBTpy08iTH/CGBdzhx4GuBGpIVndm', NULL, NULL, 'normal', 3, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 2, NULL, NULL, 0, NULL, 2, 1, 1, NULL, NULL, '2023-11-14 07:12:32', '2023-11-14 07:12:32'),
(12, 'tifa ahmed', NULL, 'sdprosolutions6@gmail.com', NULL, 'default.png', '$2y$10$0FqXG7zeY88E/mSqAkro3OSqjVaNKN3WwfwMWPmz8AaCg1LgXk20O', '108489549134904766873', NULL, 'google', 3, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 2, NULL, NULL, 0, NULL, 2, 1, 1, NULL, NULL, '2023-11-19 02:18:58', '2023-11-19 02:29:21'),
(13, 'Ahmad Abdelaziz', NULL, 'ahmadabdelaziz03@gmail.com', NULL, 'default.png', '$2y$10$ROP/la18Hs6blIA8L85/Ruxtfn0mm/CraHaU7pZLyVjTAc303gGvS', '109466091795640788317', NULL, 'google', 3, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 2, NULL, NULL, 0, NULL, 2, 1, 1, NULL, NULL, '2023-11-19 06:16:21', '2023-11-21 19:39:05'),
(14, 'Food Control', NULL, 'foodcontrolkw@gmail.com', NULL, 'default.png', '$2y$10$rqIrGwi3XAFDNfbD6SlnTe47dVyGXZVXnmnCIT2kOqTv3WmM4igzW', NULL, NULL, 'google', 3, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 2, NULL, NULL, 0, NULL, 2, 1, 1, NULL, NULL, '2023-11-20 07:33:49', '2023-11-20 07:33:49'),
(15, 'Dff', NULL, 'gg@gg.com', '01020886383', 'default.png', '$2y$10$FDnOYkyeQ6AtzkHU7odOIODnvSTDomP/ilzKTn0yc7BgyyMp70PxG', NULL, NULL, 'normal', 3, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 2, NULL, NULL, 0, NULL, 2, 1, 1, NULL, NULL, '2023-12-06 03:26:26', '2023-12-06 03:26:26'),
(16, 'birds media', NULL, 'birdsmediakw@gmail.com', NULL, 'default.png', '$2y$10$VXMimKaQrMg4WelwNvnqBevpbPfSLs6Ftndq46b3VX/Nug7bnUyq6', NULL, NULL, 'google', 3, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 2, NULL, NULL, 0, NULL, 2, 1, 1, NULL, NULL, '2023-12-12 22:18:33', '2023-12-12 22:18:33'),
(17, 'Tifa Ahmed', NULL, 'tifa.ahmed23@gmail.com', NULL, 'default.png', '$2y$10$3VPQ794lfxnglPownLEQsuN/7l2za6jiRivsUCbfvZ11bRdn6cqvS', '107298713217876871797', NULL, 'google', 3, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 2, NULL, NULL, 0, NULL, 2, 1, 1, NULL, NULL, '2023-12-13 23:44:03', '2023-12-15 00:10:45'),
(18, 'n2ily', 'n2ily', 'mh@gmail.com', '500500500', 'default.png', '$2y$10$YfSP.kuzhxwrJqtu1oajVuEO.CvGZTOQj63YOia1fkcnRuCUdfTMG', '', '', 'normal', 2, NULL, '', 1, 1, '', '', '', 2, NULL, NULL, 0, NULL, 1, 2, 1, NULL, NULL, '2023-12-14 01:52:03', '2023-12-14 00:57:02'),
(19, 'batoolsweets', 'batoolsweets', 'batool@gmail.com', '50060605', 'default.png', '$2y$10$w/W7K05f5E8Gf4MkPAQNnO3gyRk2uUHRl71Cn3SHm8WOvvnxN.u1C', '', '', 'normal', 2, NULL, '', 1, 1, '', '', '', 2, NULL, NULL, 0, NULL, 1, 2, 1, NULL, NULL, '2023-12-19 18:37:33', '2023-12-20 01:34:37'),
(20, 'bsweets', 'bsweets', 'b@gmail.com', '55120309', 'default.png', '$2y$10$W8yBD3fT0d2DW8zbyv.NdeqiAxIX/GLcZfAH3ro06kswnYAhcznbu', '', '', 'normal', 2, NULL, '', 1, 1, '', '', '', 2, NULL, NULL, 0, NULL, 1, 2, 1, NULL, NULL, '2023-12-20 02:35:38', '2023-12-20 01:35:51'),
(21, 'qqq', '176693', 'q@gmail.com', '33333333', 'default.png', '$2y$10$8Kqo97QiTFWdWtWEajFU2.MLQJnzb9fVi.3QOuaumogtCqedL.Xpq', NULL, NULL, 'normal', 1, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 2, NULL, NULL, 0, NULL, 1, 1, 1, NULL, NULL, '2023-12-20 23:16:34', '2023-12-20 23:16:34'),
(22, 'r', 'r', 'r@gmail.com', '34567890', 'default.png', '$2y$10$lW2PrGii8NfK60Jy4J9lP.tcF0x/hxAOAW8aVNslsMU28Pc7dOIY6', '', '', 'normal', 2, NULL, '', 1, 1, '', '', '', 2, NULL, NULL, 0, NULL, 1, 2, 2, NULL, NULL, '2023-12-21 00:17:20', '2023-12-21 22:20:09'),
(23, 'yy', '693460', 'yy@gmail.com', '7777777', 'default.png', '$2y$10$c5m17ytZTqnPLh/eOe9Fc.9UZpxx9blO56e4zuJSh2t7JKaH2CuMi', NULL, NULL, 'normal', 1, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 2, NULL, NULL, 0, NULL, 1, 1, 1, NULL, NULL, '2023-12-20 23:27:03', '2023-12-20 23:27:03'),
(24, 'a', 'a', 'a@gmail.com', '123456', 'default.png', '$2y$10$KISgEw8ruxhKLsIaSazV8eBtZpEViOvH1bGe8mvG/cmT6IDKu3pji', '', '', 'normal', 2, NULL, '', 1, 1, '', '', '', 2, NULL, NULL, 0, NULL, 1, 2, 2, NULL, NULL, '2023-12-21 00:40:35', '2023-12-21 22:20:03'),
(25, 'sss', 'sss', 'sss@gmail.com', '50050055', 'default.png', '$2y$10$YvLe32rbrjZbSREq7XkSA.Yu0bvuW1JPRM/3l/Y0sCKAxKLKcjWny', '', '', 'normal', 2, NULL, '', 1, 1, '', '', '', 2, NULL, NULL, 0, NULL, 1, 2, 1, NULL, NULL, '2023-12-28 19:37:29', '2023-12-28 18:38:00');

-- --------------------------------------------------------

--
-- بنية الجدول `user_addresses`
--

CREATE TABLE `user_addresses` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `user_id` int(10) UNSIGNED NOT NULL,
  `title` varchar(255) NOT NULL,
  `type` int(11) NOT NULL,
  `address` text NOT NULL,
  `house_num` varchar(255) NOT NULL,
  `street` varchar(255) NOT NULL,
  `block` varchar(255) NOT NULL,
  `pincode` varchar(255) NOT NULL,
  `building` varchar(255) NOT NULL,
  `landmark` varchar(255) NOT NULL,
  `delivery_area` varchar(255) NOT NULL,
  `latitude` varchar(255) NOT NULL,
  `longitude` varchar(255) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `is_active` tinyint(1) DEFAULT NULL,
  `vendor_id` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- إرجاع أو استيراد بيانات الجدول `user_addresses`
--

INSERT INTO `user_addresses` (`id`, `user_id`, `title`, `type`, `address`, `house_num`, `street`, `block`, `pincode`, `building`, `landmark`, `delivery_area`, `latitude`, `longitude`, `created_at`, `updated_at`, `is_active`, `vendor_id`) VALUES
(1, 12, 'المكتب', 2, 'Address', '10', '10', '10', '123456', '10', '10', '', '29.935435473509543', '31.175151269958516', '2023-11-19 02:32:44', '2023-11-21 19:46:44', 0, NULL),
(2, 12, 'المنزل', 0, '285F+P66، الأباجية، قسم الخليفة، محافظة القاهرة‬ 4412231، مصر', '222', '3', '222', '333', '33', '333', '', '30.018817509576813', '31.412601869628926', '2023-11-21 19:44:32', '2023-11-21 19:46:30', 1, NULL),
(3, 17, '1121', 0, '459G+GR، سقيل، مركز أوسيم، محافظة الجيزة 3831120، مصر', '121212', '1212', '121212', '1212', '1212', '1212', '', '30.1188125', '31.1770625', '2023-12-15 00:12:09', '2023-12-15 00:13:56', 0, 5),
(4, 17, '454545', 0, '8G2H5W95+P9', 'قف', '545', 'قفقف', '45454', 'قف', '454', '', '30.169262153572205', '31.907122696263905', '2023-12-15 00:13:00', '2023-12-15 00:13:00', 1, 5);

-- --------------------------------------------------------

--
-- بنية الجدول `variants`
--

CREATE TABLE `variants` (
  `id` int(11) NOT NULL,
  `item_id` int(11) NOT NULL,
  `name` varchar(255) NOT NULL,
  `price` float NOT NULL,
  `original_price` float NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `updated_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- إرجاع أو استيراد بيانات الجدول `variants`
--

INSERT INTO `variants` (`id`, `item_id`, `name`, `price`, `original_price`, `created_at`, `updated_at`) VALUES
(3, 30, '{\"ar\":\"\\u0643\\u0628\\u064a\\u0631\",\"en\":\"big\"}', 7, 5, '2023-12-22 03:16:04', '2023-12-22 03:18:14'),
(4, 30, '{\"ar\":\"\\u0635\\u063a\\u064a\\u0631\",\"en\":\"small\"}', 6, 5, '2023-12-22 03:16:04', '2023-12-22 03:18:14'),
(5, 19, '{\"ar\":\"\\u0643\\u0628\\u064a\\u0631\",\"en\":\"big\"}', 7, 5, '2023-12-23 03:08:14', '2023-12-23 23:04:45'),
(6, 19, '{\"ar\":\"\\u0635\\u063a\\u064a\\u0631\",\"en\":\"small\"}', 5, 5, '2023-12-23 03:11:56', '2023-12-23 23:04:45'),
(7, 49, '{\"ar\":\"\\u0643\\u0628\\u064a\\u0631\",\"en\":\"big\"}', 7, 5, '2023-12-23 20:41:35', '2023-12-23 19:48:53');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `about`
--
ALTER TABLE `about`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `area`
--
ALTER TABLE `area`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `banner_image`
--
ALTER TABLE `banner_image`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `blogs`
--
ALTER TABLE `blogs`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `branches`
--
ALTER TABLE `branches`
  ADD PRIMARY KEY (`id`),
  ADD KEY `branches_vendor_id_foreign` (`vendor_id`);

--
-- Indexes for table `carts`
--
ALTER TABLE `carts`
  ADD PRIMARY KEY (`id`),
  ADD KEY `cart_item_id_foreign` (`item_id`);

--
-- Indexes for table `categories`
--
ALTER TABLE `categories`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `city`
--
ALTER TABLE `city`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `contacts`
--
ALTER TABLE `contacts`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `coupons`
--
ALTER TABLE `coupons`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `coupon_items`
--
ALTER TABLE `coupon_items`
  ADD PRIMARY KEY (`id`),
  ADD KEY `coupon_items_coupon_id_foreign` (`coupon_id`),
  ADD KEY `coupon_items_item_id_foreign` (`item_id`);

--
-- Indexes for table `custom_domain`
--
ALTER TABLE `custom_domain`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `deliveryareas`
--
ALTER TABLE `deliveryareas`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `extras`
--
ALTER TABLE `extras`
  ADD PRIMARY KEY (`id`);

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
-- Indexes for table `favorite`
--
ALTER TABLE `favorite`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `features`
--
ALTER TABLE `features`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `footerfeatures`
--
ALTER TABLE `footerfeatures`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `items`
--
ALTER TABLE `items`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `item_images`
--
ALTER TABLE `item_images`
  ADD PRIMARY KEY (`id`),
  ADD KEY `item_images_item_id_foreign` (`item_id`);

--
-- Indexes for table `languages`
--
ALTER TABLE `languages`
  ADD PRIMARY KEY (`id`);

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
-- Indexes for table `orders`
--
ALTER TABLE `orders`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `order_details`
--
ALTER TABLE `order_details`
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
-- Indexes for table `plans`
--
ALTER TABLE `plans`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `privacypolicy`
--
ALTER TABLE `privacypolicy`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `promotionalbanner`
--
ALTER TABLE `promotionalbanner`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `refund_policy`
--
ALTER TABLE `refund_policy`
  ADD PRIMARY KEY (`id`);

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
-- Indexes for table `settings`
--
ALTER TABLE `settings`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `subscribers`
--
ALTER TABLE `subscribers`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `systemaddons`
--
ALTER TABLE `systemaddons`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tableqr`
--
ALTER TABLE `tableqr`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `table_area`
--
ALTER TABLE `table_area`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `table_book`
--
ALTER TABLE `table_book`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `terms`
--
ALTER TABLE `terms`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `testimonials`
--
ALTER TABLE `testimonials`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `timings`
--
ALTER TABLE `timings`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `transactions`
--
ALTER TABLE `transactions`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `user_addresses`
--
ALTER TABLE `user_addresses`
  ADD PRIMARY KEY (`id`),
  ADD KEY `user_addresses_user_id_foreign` (`user_id`);

--
-- Indexes for table `variants`
--
ALTER TABLE `variants`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `about`
--
ALTER TABLE `about`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `area`
--
ALTER TABLE `area`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `banner_image`
--
ALTER TABLE `banner_image`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `blogs`
--
ALTER TABLE `blogs`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `branches`
--
ALTER TABLE `branches`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `carts`
--
ALTER TABLE `carts`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=150;

--
-- AUTO_INCREMENT for table `categories`
--
ALTER TABLE `categories`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=34;

--
-- AUTO_INCREMENT for table `city`
--
ALTER TABLE `city`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `contacts`
--
ALTER TABLE `contacts`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `coupons`
--
ALTER TABLE `coupons`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `coupon_items`
--
ALTER TABLE `coupon_items`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `custom_domain`
--
ALTER TABLE `custom_domain`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `deliveryareas`
--
ALTER TABLE `deliveryareas`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT for table `extras`
--
ALTER TABLE `extras`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `failed_jobs`
--
ALTER TABLE `failed_jobs`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `faqs`
--
ALTER TABLE `faqs`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `favorite`
--
ALTER TABLE `favorite`
  MODIFY `id` bigint(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT for table `features`
--
ALTER TABLE `features`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `footerfeatures`
--
ALTER TABLE `footerfeatures`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `items`
--
ALTER TABLE `items`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=57;

--
-- AUTO_INCREMENT for table `item_images`
--
ALTER TABLE `item_images`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=60;

--
-- AUTO_INCREMENT for table `languages`
--
ALTER TABLE `languages`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=26;

--
-- AUTO_INCREMENT for table `orders`
--
ALTER TABLE `orders`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=19;

--
-- AUTO_INCREMENT for table `order_details`
--
ALTER TABLE `order_details`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=36;

--
-- AUTO_INCREMENT for table `payments`
--
ALTER TABLE `payments`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=101;

--
-- AUTO_INCREMENT for table `permissions`
--
ALTER TABLE `permissions`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=59;

--
-- AUTO_INCREMENT for table `personal_access_tokens`
--
ALTER TABLE `personal_access_tokens`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `plans`
--
ALTER TABLE `plans`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `privacypolicy`
--
ALTER TABLE `privacypolicy`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `promotionalbanner`
--
ALTER TABLE `promotionalbanner`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `refund_policy`
--
ALTER TABLE `refund_policy`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `roles`
--
ALTER TABLE `roles`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `settings`
--
ALTER TABLE `settings`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;

--
-- AUTO_INCREMENT for table `subscribers`
--
ALTER TABLE `subscribers`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT for table `systemaddons`
--
ALTER TABLE `systemaddons`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT for table `tableqr`
--
ALTER TABLE `tableqr`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `table_area`
--
ALTER TABLE `table_area`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `table_book`
--
ALTER TABLE `table_book`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `terms`
--
ALTER TABLE `terms`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `testimonials`
--
ALTER TABLE `testimonials`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `timings`
--
ALTER TABLE `timings`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=71;

--
-- AUTO_INCREMENT for table `transactions`
--
ALTER TABLE `transactions`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=26;

--
-- AUTO_INCREMENT for table `user_addresses`
--
ALTER TABLE `user_addresses`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `variants`
--
ALTER TABLE `variants`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- قيود الجداول المحفوظة
--

--
-- القيود للجدول `branches`
--
ALTER TABLE `branches`
  ADD CONSTRAINT `branches_vendor_id_foreign` FOREIGN KEY (`vendor_id`) REFERENCES `users` (`id`) ON DELETE CASCADE;

--
-- القيود للجدول `coupon_items`
--
ALTER TABLE `coupon_items`
  ADD CONSTRAINT `coupon_items_coupon_id_foreign` FOREIGN KEY (`coupon_id`) REFERENCES `coupons` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `coupon_items_item_id_foreign` FOREIGN KEY (`item_id`) REFERENCES `items` (`id`) ON DELETE CASCADE;

--
-- القيود للجدول `model_has_permissions`
--
ALTER TABLE `model_has_permissions`
  ADD CONSTRAINT `model_has_permissions_permission_id_foreign` FOREIGN KEY (`permission_id`) REFERENCES `permissions` (`id`) ON DELETE CASCADE;

--
-- القيود للجدول `model_has_roles`
--
ALTER TABLE `model_has_roles`
  ADD CONSTRAINT `model_has_roles_role_id_foreign` FOREIGN KEY (`role_id`) REFERENCES `roles` (`id`) ON DELETE CASCADE;

--
-- القيود للجدول `role_has_permissions`
--
ALTER TABLE `role_has_permissions`
  ADD CONSTRAINT `role_has_permissions_permission_id_foreign` FOREIGN KEY (`permission_id`) REFERENCES `permissions` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `role_has_permissions_role_id_foreign` FOREIGN KEY (`role_id`) REFERENCES `roles` (`id`) ON DELETE CASCADE;

--
-- القيود للجدول `user_addresses`
--
ALTER TABLE `user_addresses`
  ADD CONSTRAINT `user_addresses_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
