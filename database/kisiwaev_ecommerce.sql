-- phpMyAdmin SQL Dump
-- version 4.9.7
-- https://www.phpmyadmin.net/
--
-- Host: localhost:3306
-- Generation Time: Nov 07, 2022 at 04:42 AM
-- Server version: 5.7.40
-- PHP Version: 7.4.30

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `kisiwaev_ecommerce`
--

-- --------------------------------------------------------

--
-- Table structure for table `activity_logs`
--

CREATE TABLE `activity_logs` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `user_id` varchar(200) COLLATE utf8mb4_unicode_ci NOT NULL,
  `activity` varchar(200) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `activity_logs`
--

INSERT INTO `activity_logs` (`id`, `user_id`, `activity`, `created_at`, `updated_at`) VALUES
(1, '6', 'User Logged in at 2022-11-05 16:20:29', '2022-11-06 21:35:41', '2022-11-06 21:35:41'),
(2, '6', 'User Logged in at 2022-11-05 16:20:29', '2022-11-06 21:44:29', '2022-11-06 21:44:29'),
(3, '6', 'User Checked Out products from cart', '2022-11-06 21:45:06', '2022-11-06 21:45:06'),
(4, '6', 'User tried to place order for transaction: Testing stk push on sandbox with timestamp: 20221106211121', '2022-11-06 21:45:21', '2022-11-06 21:45:21'),
(5, '6', 'User Checked Out products from cart', '2022-11-06 21:45:22', '2022-11-06 21:45:22'),
(6, '6', 'User Checked Out products from cart', '2022-11-06 21:45:43', '2022-11-06 21:45:43'),
(7, '6', 'User Checked Out products from cart', '2022-11-06 21:45:51', '2022-11-06 21:45:51'),
(8, '6', 'User searched for a product m in Desktops category', '2022-11-06 21:46:50', '2022-11-06 21:46:50'),
(9, '6', 'User searched for a product \'HP\' in  category', '2022-11-06 21:48:03', '2022-11-06 21:48:03'),
(10, '6', 'User searched for a product \'HP\' in Monitors category', '2022-11-06 21:50:36', '2022-11-06 21:50:36'),
(11, '6', 'User searched for a product \'HP\' in all categories', '2022-11-06 21:51:02', '2022-11-06 21:51:02'),
(12, '6', 'Added HP in Laptops category to cart', '2022-11-06 21:51:38', '2022-11-06 21:51:38'),
(13, '6', 'User searched for a product \'HP\' in all categories', '2022-11-06 21:52:35', '2022-11-06 21:52:35'),
(14, '6', 'Added HP in Laptops category to cart', '2022-11-06 21:52:38', '2022-11-06 21:52:38'),
(15, '6', 'User searched for a product \'HP\' in all categories', '2022-11-06 21:53:51', '2022-11-06 21:53:51'),
(16, '6', 'User searched for a product \'HP\' in all categories', '2022-11-06 21:54:17', '2022-11-06 21:54:17'),
(17, '6', 'Removed HP in Laptops category from cart', '2022-11-06 21:54:47', '2022-11-06 21:54:47'),
(18, '6', 'User searched for a product \'HP\' in all categories', '2022-11-06 21:54:55', '2022-11-06 21:54:55'),
(19, '6', 'User Checked Out products from cart', '2022-11-06 21:55:48', '2022-11-06 21:55:48'),
(20, '6', 'User tried to place order for transaction: Testing stk push on sandbox with timestamp: 20221106211153', '2022-11-06 21:55:54', '2022-11-06 21:55:54'),
(21, '6', 'User Checked Out products from cart', '2022-11-06 21:55:55', '2022-11-06 21:55:55'),
(22, '6', 'User Checked Out products from cart', '2022-11-06 21:56:12', '2022-11-06 21:56:12'),
(23, '6', 'User tried to place order for transaction: Testing stk push on sandbox with timestamp: 20221106211118', '2022-11-06 21:56:19', '2022-11-06 21:56:19'),
(24, '6', 'User Checked Out products from cart', '2022-11-06 21:56:19', '2022-11-06 21:56:19'),
(25, '6', 'User searched for a product \'\' in Monitors category', '2022-11-06 21:58:21', '2022-11-06 21:58:21'),
(26, '6', 'User searched for a productin Desktops category', '2022-11-06 22:00:38', '2022-11-06 22:00:38'),
(27, '6', 'User searched for a product \'Canon\' in Cameras category', '2022-11-06 22:01:17', '2022-11-06 22:01:17'),
(28, '6', 'User searched for a product in Earphones category', '2022-11-06 22:01:30', '2022-11-06 22:01:30'),
(29, '6', 'User Logged in at 2022-11-05 16:20:29', '2022-11-06 22:06:45', '2022-11-06 22:06:45'),
(30, '6', 'User Logged in at 2022-11-05 16:20:29', '2022-11-06 22:06:59', '2022-11-06 22:06:59'),
(31, '6', 'User Logged in at 2022-11-05 16:20:29', '2022-11-06 22:07:01', '2022-11-06 22:07:01'),
(32, '6', 'User Logged in at 2022-11-05 16:20:29', '2022-11-06 22:07:04', '2022-11-06 22:07:04'),
(33, '6', 'User Logged in at 2022-11-05 16:20:29', '2022-11-06 22:07:19', '2022-11-06 22:07:19'),
(34, '6', 'User Logged in at 2022-11-05 16:20:29', '2022-11-06 22:07:37', '2022-11-06 22:07:37'),
(35, '6', 'User searched for a product in Desktops category', '2022-11-06 22:08:40', '2022-11-06 22:08:40'),
(36, '6', 'User Checked Out products from cart', '2022-11-06 22:08:59', '2022-11-06 22:08:59'),
(37, '6', 'Removed HP in Laptops category from cart', '2022-11-06 22:09:09', '2022-11-06 22:09:09'),
(38, '6', 'User Checked Out products from cart', '2022-11-06 22:09:10', '2022-11-06 22:09:10'),
(39, '6', 'User tried to place order for transaction: Testing stk push on sandbox with timestamp: 20221106221128', '2022-11-06 22:09:29', '2022-11-06 22:09:29'),
(40, '6', 'User Checked Out products from cart', '2022-11-06 22:09:30', '2022-11-06 22:09:30'),
(41, '6', 'User Logged in at 2022-11-05 16:20:29', '2022-11-06 22:09:57', '2022-11-06 22:09:57'),
(42, '6', 'User Logged in at 2022-11-05 16:20:29', '2022-11-06 22:10:15', '2022-11-06 22:10:15'),
(43, '6', 'User Logged in at 2022-11-05 16:20:29', '2022-11-07 03:47:02', '2022-11-07 03:47:02'),
(44, '6', 'Added HP in Laptops category to cart', '2022-11-07 03:47:10', '2022-11-07 03:47:10'),
(45, '6', 'User Logged in at 2022-11-05 16:20:29', '2022-11-07 03:47:11', '2022-11-07 03:47:11'),
(46, '6', 'User Logged in at 2022-11-05 16:20:29', '2022-11-07 03:47:45', '2022-11-07 03:47:45'),
(47, '6', 'Added Dell in Desktops category to cart', '2022-11-07 03:47:51', '2022-11-07 03:47:51'),
(48, '6', 'User Logged in at 2022-11-05 16:20:29', '2022-11-07 03:47:52', '2022-11-07 03:47:52'),
(49, '6', 'Removed HP in Laptops category from cart', '2022-11-07 03:47:58', '2022-11-07 03:47:58'),
(50, '6', 'User Logged in at 2022-11-05 16:20:29', '2022-11-07 03:47:58', '2022-11-07 03:47:58'),
(51, '6', 'User Checked Out products from cart', '2022-11-07 03:48:09', '2022-11-07 03:48:09'),
(52, '6', 'User Checked Out products from cart', '2022-11-07 03:48:53', '2022-11-07 03:48:53'),
(53, '6', 'User Checked Out products from cart', '2022-11-07 03:49:30', '2022-11-07 03:49:30'),
(54, '6', 'Removed Dell in Desktops category from cart', '2022-11-07 03:49:34', '2022-11-07 03:49:34'),
(55, '6', 'User Checked Out products from cart', '2022-11-07 03:49:34', '2022-11-07 03:49:34'),
(56, '6', 'User Checked Out products from cart', '2022-11-07 03:50:37', '2022-11-07 03:50:37'),
(57, '6', 'Removed Dell in Desktops category from cart', '2022-11-07 03:50:42', '2022-11-07 03:50:42'),
(58, '6', 'User Checked Out products from cart', '2022-11-07 03:50:42', '2022-11-07 03:50:42'),
(59, '6', 'Added Dell in Desktops category to cart', '2022-11-07 03:51:05', '2022-11-07 03:51:05'),
(60, '6', 'Added HP in Laptops category to cart', '2022-11-07 03:51:34', '2022-11-07 03:51:34'),
(61, '6', 'Removed HP in Laptops category from cart', '2022-11-07 03:51:40', '2022-11-07 03:51:40'),
(62, '6', 'Removed Dell in Desktops category from cart', '2022-11-07 03:52:10', '2022-11-07 03:52:10'),
(63, '6', 'Added Asus in Laptops category to cart', '2022-11-07 03:52:56', '2022-11-07 03:52:56'),
(64, '6', 'Added HP in Laptops category to cart', '2022-11-07 03:53:47', '2022-11-07 03:53:47'),
(65, '6', 'Added Dell in Desktops category to cart', '2022-11-07 03:54:31', '2022-11-07 03:54:31'),
(66, '6', 'Removed Asus in Laptops category from cart', '2022-11-07 03:54:38', '2022-11-07 03:54:38'),
(67, '6', 'Removed HP in Laptops category from cart', '2022-11-07 03:55:26', '2022-11-07 03:55:26'),
(68, '6', 'User Checked Out products from cart', '2022-11-07 03:55:43', '2022-11-07 03:55:43'),
(69, '6', 'Removed Dell in Desktops category from cart', '2022-11-07 03:55:46', '2022-11-07 03:55:46'),
(70, '6', 'User Checked Out products from cart', '2022-11-07 03:55:47', '2022-11-07 03:55:47'),
(71, '6', 'User Checked Out products from cart', '2022-11-07 03:56:38', '2022-11-07 03:56:38'),
(72, '6', 'Added HP in Laptops category to cart', '2022-11-07 03:56:44', '2022-11-07 03:56:44'),
(73, '6', 'Added Asus in Laptops category to cart', '2022-11-07 03:56:48', '2022-11-07 03:56:48'),
(74, '6', 'User Checked Out products from cart', '2022-11-07 03:56:53', '2022-11-07 03:56:53'),
(75, '6', 'Removed HP in Laptops category from cart', '2022-11-07 03:56:57', '2022-11-07 03:56:57'),
(76, '6', 'User Checked Out products from cart', '2022-11-07 03:56:58', '2022-11-07 03:56:58'),
(77, '6', 'User Checked Out products from cart', '2022-11-07 03:57:57', '2022-11-07 03:57:57'),
(78, '6', 'Removed Asus in Laptops category from cart', '2022-11-07 03:58:00', '2022-11-07 03:58:00'),
(79, '6', 'User Checked Out products from cart', '2022-11-07 03:58:00', '2022-11-07 03:58:00'),
(80, '6', 'User Checked Out products from cart', '2022-11-07 03:59:40', '2022-11-07 03:59:40'),
(81, '6', 'User Checked Out products from cart', '2022-11-07 04:00:26', '2022-11-07 04:00:26'),
(82, '6', 'User Checked Out products from cart', '2022-11-07 04:01:52', '2022-11-07 04:01:52'),
(83, '6', 'User Checked Out products from cart', '2022-11-07 04:03:43', '2022-11-07 04:03:43'),
(84, '6', 'User Checked Out products from cart', '2022-11-07 04:04:12', '2022-11-07 04:04:12'),
(85, '6', 'User Checked Out products from cart', '2022-11-07 04:04:41', '2022-11-07 04:04:41'),
(86, '6', 'User Checked Out products from cart', '2022-11-07 04:05:12', '2022-11-07 04:05:12'),
(87, '6', 'Added Dell in Desktops category to cart', '2022-11-07 04:05:23', '2022-11-07 04:05:23'),
(88, '6', 'User Checked Out products from cart', '2022-11-07 04:05:28', '2022-11-07 04:05:28'),
(89, '6', 'Removed Dell in Desktops category from cart', '2022-11-07 04:05:36', '2022-11-07 04:05:36'),
(90, '6', 'User Checked Out products from cart', '2022-11-07 04:05:37', '2022-11-07 04:05:37'),
(91, '6', 'User Checked Out products from cart', '2022-11-07 04:06:34', '2022-11-07 04:06:34'),
(92, '6', 'Added Dell in Laptops category to cart', '2022-11-07 04:07:00', '2022-11-07 04:07:00'),
(93, '6', 'User Checked Out products from cart', '2022-11-07 04:07:04', '2022-11-07 04:07:04'),
(94, '6', 'Removed Dell in Laptops category from cart', '2022-11-07 04:07:14', '2022-11-07 04:07:14'),
(95, '6', 'User Checked Out products from cart', '2022-11-07 04:07:14', '2022-11-07 04:07:14'),
(96, '6', 'User searched for a product \'TFT\' in Monitors category', '2022-11-07 04:07:52', '2022-11-07 04:07:52'),
(97, '6', 'User searched for a product in all categories', '2022-11-07 04:08:11', '2022-11-07 04:08:11'),
(98, '6', 'User searched for a product \'HP\' in all categories', '2022-11-07 04:08:17', '2022-11-07 04:08:17'),
(99, '6', 'Added HP in Laptops category to cart', '2022-11-07 04:08:25', '2022-11-07 04:08:25'),
(100, '6', 'Added HP in Laptops category to cart', '2022-11-07 04:09:13', '2022-11-07 04:09:13'),
(101, '6', 'Added HP in Laptops category to cart', '2022-11-07 04:09:16', '2022-11-07 04:09:16'),
(102, '6', 'Added HP in Laptops category to cart', '2022-11-07 04:10:34', '2022-11-07 04:10:34'),
(103, '6', 'Removed HP in Laptops category from cart', '2022-11-07 04:10:43', '2022-11-07 04:10:43'),
(104, '6', 'Removed HP in Laptops category from cart', '2022-11-07 04:10:48', '2022-11-07 04:10:48'),
(105, '6', 'Removed HP in Laptops category from cart', '2022-11-07 04:10:52', '2022-11-07 04:10:52'),
(106, '6', 'User Checked Out products from cart', '2022-11-07 04:10:58', '2022-11-07 04:10:58'),
(107, '6', 'User searched for a product \'HP\' in all categories', '2022-11-07 04:11:19', '2022-11-07 04:11:19'),
(108, '6', 'Added HP in Laptops category to cart', '2022-11-07 04:11:23', '2022-11-07 04:11:23'),
(109, '6', 'User searched for a product \'HP\' in all categories', '2022-11-07 04:13:46', '2022-11-07 04:13:46'),
(110, '6', 'User searched for a product \'HP\' in all categories', '2022-11-07 04:14:21', '2022-11-07 04:14:21'),
(111, '6', 'Added HP in Laptops category to cart', '2022-11-07 04:14:24', '2022-11-07 04:14:24'),
(112, '6', 'User searched for a product \'HP\' in all categories', '2022-11-07 04:15:21', '2022-11-07 04:15:21'),
(113, '6', 'Added HP in Laptops category to cart', '2022-11-07 04:15:26', '2022-11-07 04:15:26'),
(114, '6', 'User searched for a product in Desktops category', '2022-11-07 04:18:15', '2022-11-07 04:18:15'),
(115, '6', 'Added Dell in Desktops category to cart', '2022-11-07 04:18:20', '2022-11-07 04:18:20'),
(116, '6', 'User searched for a product in Desktops category', '2022-11-07 04:18:22', '2022-11-07 04:18:22'),
(117, '6', 'User searched for a product in Desktops category', '2022-11-07 04:19:48', '2022-11-07 04:19:48'),
(118, '6', 'User searched for a product in Desktops category', '2022-11-07 04:20:20', '2022-11-07 04:20:20'),
(119, '6', 'User searched for a product in Desktops category', '2022-11-07 04:21:27', '2022-11-07 04:21:27'),
(120, '6', 'Removed Dell in Desktops category from cart', '2022-11-07 04:22:22', '2022-11-07 04:22:22'),
(121, '6', 'User searched for a product in Desktops category', '2022-11-07 04:22:30', '2022-11-07 04:22:30'),
(122, '6', 'User searched for a product in Desktops category', '2022-11-07 04:25:39', '2022-11-07 04:25:39'),
(123, '6', 'User searched for a product in Desktops category', '2022-11-07 04:25:52', '2022-11-07 04:25:52'),
(124, '6', 'User searched for a product in Earphones category', '2022-11-07 04:26:15', '2022-11-07 04:26:15'),
(125, '6', 'User searched for a product in Desktops category', '2022-11-07 04:26:22', '2022-11-07 04:26:22'),
(126, '6', 'User searched for a product in Desktops category', '2022-11-07 04:28:37', '2022-11-07 04:28:37'),
(127, '6', 'User searched for a product in Desktops category', '2022-11-07 04:29:30', '2022-11-07 04:29:30'),
(128, '6', 'Added Dell in Desktops category to cart', '2022-11-07 04:29:49', '2022-11-07 04:29:49'),
(129, '6', 'User searched for a product in Desktops category', '2022-11-07 04:29:50', '2022-11-07 04:29:50'),
(130, '6', 'Removed HP in Laptops category from cart', '2022-11-07 04:31:07', '2022-11-07 04:31:07'),
(131, '6', 'User searched for a product in Desktops category', '2022-11-07 04:31:07', '2022-11-07 04:31:07'),
(132, '6', 'Added Dell in Laptops category to cart', '2022-11-07 04:32:15', '2022-11-07 04:32:15'),
(133, '6', 'User Checked Out products from cart', '2022-11-07 04:34:25', '2022-11-07 04:34:25'),
(134, '6', 'Removed HP in Laptops category from cart', '2022-11-07 04:35:36', '2022-11-07 04:35:36'),
(135, '6', 'User Checked Out products from cart', '2022-11-07 04:35:36', '2022-11-07 04:35:36'),
(136, '6', 'Removed Dell in Laptops category from cart', '2022-11-07 04:35:48', '2022-11-07 04:35:48'),
(137, '6', 'User Checked Out products from cart', '2022-11-07 04:35:49', '2022-11-07 04:35:49'),
(138, '6', 'Removed HP in Laptops category from cart', '2022-11-07 04:35:55', '2022-11-07 04:35:55'),
(139, '6', 'User Checked Out products from cart', '2022-11-07 04:35:56', '2022-11-07 04:35:56'),
(140, '6', 'Removed HP in Laptops category from cart', '2022-11-07 04:36:06', '2022-11-07 04:36:06'),
(141, '6', 'User Checked Out products from cart', '2022-11-07 04:36:06', '2022-11-07 04:36:06'),
(142, '6', 'Removed Dell in Desktops category from cart', '2022-11-07 04:36:18', '2022-11-07 04:36:18'),
(143, '6', 'User Checked Out products from cart', '2022-11-07 04:36:18', '2022-11-07 04:36:18'),
(144, '6', 'Added Dell in Desktops category to cart', '2022-11-07 04:36:31', '2022-11-07 04:36:31'),
(145, '6', 'User searched for a product \'Dell\' in Desktops category', '2022-11-07 04:36:38', '2022-11-07 04:36:38'),
(146, '6', 'Added Dell in Desktops category to cart', '2022-11-07 04:36:43', '2022-11-07 04:36:43'),
(147, '6', 'User searched for a product \'Dell\' in Desktops category', '2022-11-07 04:36:43', '2022-11-07 04:36:43'),
(148, '6', 'Removed Dell in Desktops category from cart', '2022-11-07 04:36:55', '2022-11-07 04:36:55'),
(149, '6', 'User searched for a product \'Dell\' in Desktops category', '2022-11-07 04:36:55', '2022-11-07 04:36:55'),
(150, '6', 'User searched for a product \'m\' in Monitors category', '2022-11-07 04:37:03', '2022-11-07 04:37:03');

-- --------------------------------------------------------

--
-- Table structure for table `carts`
--

CREATE TABLE `carts` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `user_id` varchar(200) COLLATE utf8mb4_unicode_ci NOT NULL,
  `product_id` varchar(200) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `carts`
--

INSERT INTO `carts` (`id`, `user_id`, `product_id`, `created_at`, `updated_at`) VALUES
(17, '5', '3', '2022-11-05 13:31:35', '2022-11-05 13:31:35'),
(69, '6', '4', '2022-11-07 04:36:43', '2022-11-07 04:36:43'),
(31, '7', '5', '2022-11-06 03:52:48', '2022-11-06 03:52:48'),
(32, '7', '2', '2022-11-06 04:04:21', '2022-11-06 04:04:21'),
(33, '7', '3', '2022-11-06 04:13:27', '2022-11-06 04:13:27'),
(34, '7', '4', '2022-11-06 05:13:46', '2022-11-06 05:13:46'),
(38, '3', '4', '2022-11-06 17:21:53', '2022-11-06 17:21:53');

-- --------------------------------------------------------

--
-- Table structure for table `categories`
--

CREATE TABLE `categories` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `category_name` varchar(200) COLLATE utf8mb4_unicode_ci NOT NULL,
  `category_code` varchar(200) COLLATE utf8mb4_unicode_ci NOT NULL,
  `category_image` varchar(200) COLLATE utf8mb4_unicode_ci NOT NULL,
  `no_of_products` int(11) NOT NULL DEFAULT '0',
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `categories`
--

INSERT INTO `categories` (`id`, `category_name`, `category_code`, `category_image`, `no_of_products`, `created_at`, `updated_at`) VALUES
(1, 'Laptops', '35395', 'product01.png', 12, '2022-11-03 17:18:42', '2022-11-06 21:08:18'),
(2, 'Desktops', '92159', 'product07.png', 10, '2022-11-03 17:28:11', '2022-11-06 21:06:05'),
(3, 'Monitors', '44323', 'product04.png', 0, '2022-11-03 17:28:20', '2022-11-05 21:02:18'),
(4, 'Earphones', '35713', 'product05.png', 0, '2022-11-05 20:58:58', '2022-11-05 20:58:58'),
(5, 'Cameras', '52994', 'product09.png', 0, '2022-11-05 21:06:52', '2022-11-05 21:06:52');

-- --------------------------------------------------------

--
-- Table structure for table `failed_jobs`
--

CREATE TABLE `failed_jobs` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `uuid` varchar(200) COLLATE utf8mb4_unicode_ci NOT NULL,
  `connection` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `queue` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `payload` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `exception` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `failed_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `images`
--

CREATE TABLE `images` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `item_id` varchar(200) COLLATE utf8mb4_unicode_ci NOT NULL,
  `filename` varchar(200) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `images`
--

INSERT INTO `images` (`id`, `item_id`, `filename`, `created_at`, `updated_at`) VALUES
(1, '1', 'product06.png', '2022-11-03 15:31:54', '2022-11-03 22:43:00'),
(2, '1', 'product03.png', '2022-11-03 15:31:54', '2022-11-03 22:42:52'),
(3, '2', 'product01.png', '2022-11-03 16:50:44', '2022-11-03 16:50:44'),
(4, '2', 'product03.png', '2022-11-03 16:50:44', '2022-11-03 16:50:44'),
(5, '2', 'product06.png', '2022-11-03 16:50:44', '2022-11-03 16:50:44'),
(6, '3', 'product01.png', '2022-11-03 16:51:30', '2022-11-03 16:51:30'),
(7, '3', 'product03.png', '2022-11-03 16:51:30', '2022-11-03 16:51:30'),
(8, '3', 'product04.png', '2022-11-03 16:51:30', '2022-11-03 16:51:30'),
(9, '3', 'product06.png', '2022-11-03 16:51:30', '2022-11-03 16:51:30'),
(10, '4', 'product08.png', '2022-11-03 17:42:53', '2022-11-03 17:42:53'),
(11, '5', 'product07.png', '2022-11-03 18:58:00', '2022-11-03 18:58:00'),
(12, '6', 'product01.png', '2022-11-06 21:08:18', '2022-11-06 21:08:18'),
(13, '6', 'product06.png', '2022-11-06 21:08:18', '2022-11-06 21:08:18'),
(14, '6', 'product08.png', '2022-11-06 21:08:18', '2022-11-06 21:08:18'),
(15, '6', 'shop01.png', '2022-11-06 21:08:18', '2022-11-06 21:08:18');

-- --------------------------------------------------------

--
-- Table structure for table `migrations`
--

CREATE TABLE `migrations` (
  `id` int(10) UNSIGNED NOT NULL,
  `migration` varchar(200) COLLATE utf8mb4_unicode_ci NOT NULL,
  `batch` int(11) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `migrations`
--

INSERT INTO `migrations` (`id`, `migration`, `batch`) VALUES
(1, '2014_10_12_000000_create_users_table', 1),
(2, '2014_10_12_100000_create_password_resets_table', 1),
(3, '2014_10_12_200000_add_two_factor_columns_to_users_table', 1),
(4, '2019_08_19_000000_create_failed_jobs_table', 1),
(5, '2019_12_14_000001_create_personal_access_tokens_table', 1),
(6, '2022_09_09_110852_create_sessions_table', 1),
(7, '2022_11_03_114440_create_products_table', 1),
(8, '2022_11_03_114805_create_categories_table', 1),
(9, '2022_11_03_121843_create_categpries_table', 1),
(10, '2022_11_03_153242_create_images_table', 1),
(11, '2022_11_03_220445_create_carts_table', 2),
(12, '2022_11_05_110709_create_mpesa_transactions_table', 3);

-- --------------------------------------------------------

--
-- Table structure for table `mpesa_transactions`
--

CREATE TABLE `mpesa_transactions` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `TransactionType` varchar(200) COLLATE utf8mb4_unicode_ci NOT NULL,
  `TransID` varchar(200) COLLATE utf8mb4_unicode_ci NOT NULL,
  `TransTime` varchar(200) COLLATE utf8mb4_unicode_ci NOT NULL,
  `TransAmount` varchar(200) COLLATE utf8mb4_unicode_ci NOT NULL,
  `BusinessShortCode` varchar(200) COLLATE utf8mb4_unicode_ci NOT NULL,
  `BillRefNumber` varchar(200) COLLATE utf8mb4_unicode_ci NOT NULL,
  `InvoiceNumber` varchar(200) COLLATE utf8mb4_unicode_ci NOT NULL,
  `OrgAccountBalance` varchar(200) COLLATE utf8mb4_unicode_ci NOT NULL,
  `ThirdPartyTransID` varchar(200) COLLATE utf8mb4_unicode_ci NOT NULL,
  `MSISDN` varchar(200) COLLATE utf8mb4_unicode_ci NOT NULL,
  `FirstName` varchar(200) COLLATE utf8mb4_unicode_ci NOT NULL,
  `MiddleName` varchar(200) COLLATE utf8mb4_unicode_ci NOT NULL,
  `LastName` varchar(200) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `updated_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00'
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `password_resets`
--

CREATE TABLE `password_resets` (
  `email` varchar(200) COLLATE utf8mb4_unicode_ci NOT NULL,
  `token` varchar(200) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `personal_access_tokens`
--

CREATE TABLE `personal_access_tokens` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `tokenable_type` varchar(200) COLLATE utf8mb4_unicode_ci NOT NULL,
  `tokenable_id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(200) COLLATE utf8mb4_unicode_ci NOT NULL,
  `token` varchar(64) COLLATE utf8mb4_unicode_ci NOT NULL,
  `abilities` text COLLATE utf8mb4_unicode_ci,
  `last_used_at` timestamp NULL DEFAULT NULL,
  `expires_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `products`
--

CREATE TABLE `products` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `product_name` varchar(200) COLLATE utf8mb4_unicode_ci NOT NULL,
  `product_brand` varchar(200) COLLATE utf8mb4_unicode_ci NOT NULL,
  `product_code` varchar(200) COLLATE utf8mb4_unicode_ci NOT NULL,
  `product_description` varchar(3000) COLLATE utf8mb4_unicode_ci NOT NULL,
  `product_details` varchar(2000) COLLATE utf8mb4_unicode_ci NOT NULL,
  `no_of_products` int(11) NOT NULL DEFAULT '0',
  `discount` varchar(200) COLLATE utf8mb4_unicode_ci NOT NULL,
  `product_old_price` varchar(200) COLLATE utf8mb4_unicode_ci NOT NULL,
  `product_new_price` varchar(200) COLLATE utf8mb4_unicode_ci NOT NULL,
  `active` int(11) NOT NULL DEFAULT '0',
  `rating` int(11) NOT NULL DEFAULT '0',
  `category_id` int(10) UNSIGNED DEFAULT NULL,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `products`
--

INSERT INTO `products` (`id`, `product_name`, `product_brand`, `product_code`, `product_description`, `product_details`, `no_of_products`, `discount`, `product_old_price`, `product_new_price`, `active`, `rating`, `category_id`, `created_at`, `updated_at`) VALUES
(1, 'Asus', 'Asus 2450', '39032898', 'Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat.', 'Lorem; Ipsum', 1, '0', '30000', '30000', 1, 0, 1, '2022-11-03 15:31:54', '2022-11-03 17:49:24'),
(2, 'Dell', 'Latitude 2450', '71680244', 'Good', 'ivjon', 1, '5', '50000', '47500', 1, 0, 1, '2022-11-03 16:50:44', '2022-11-03 17:51:29'),
(3, 'HP', 'Elitebook 8440p', '75524716', 'Great Design', 'Durable', 1, '25', '30000', '22500', 1, 0, 1, '2022-11-03 16:51:30', '2022-11-05 21:25:49'),
(4, 'Dell', 'TowerDesk 120', '79597014', 'Just pleasant', 'Good', 10, '5', '30000', '28500', 1, 0, 2, '2022-11-03 17:42:53', '2022-11-03 17:51:24'),
(5, 'Lenovo', 'Thinkpad S450', '22748890', 'Great Experienca', 'Quality', 3, '3', '50000', '48500', 1, 0, 1, '2022-11-03 18:58:00', '2022-11-05 21:25:58'),
(6, 'HP', 'Elitebook 457', '63771175', 'Good', 'Good', 6, '0', '39000', '39000', 1, 0, 1, '2022-11-06 21:08:18', '2022-11-06 21:08:41');

-- --------------------------------------------------------

--
-- Table structure for table `sessions`
--

CREATE TABLE `sessions` (
  `id` varchar(200) COLLATE utf8mb4_unicode_ci NOT NULL,
  `user_id` bigint(20) UNSIGNED DEFAULT NULL,
  `ip_address` varchar(45) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `user_agent` text COLLATE utf8mb4_unicode_ci,
  `payload` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `last_activity` int(11) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `sessions`
--

INSERT INTO `sessions` (`id`, `user_id`, `ip_address`, `user_agent`, `payload`, `last_activity`) VALUES
('sVE4D3TorwkCKfqKazss8blRC2LLI6lZcxUFAaD1', 6, '154.123.113.221', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/107.0.0.0 Safari/537.36', 'YTo1OntzOjY6Il90b2tlbiI7czo0MDoiOTQ1NmFBUjNzRFZSMUFjTXJHbnd4c1dtZU1HOEtRUURNRFpyNDVlcyI7czo5OiJfcHJldmlvdXMiO2E6MTp7czozOiJ1cmwiO3M6NDI6Imh0dHBzOi8va2lzaXdhZXZvdGluZy5jb20vZUNvbW1lcmNlL3B1YmxpYyI7fXM6NjoiX2ZsYXNoIjthOjI6e3M6Mzoib2xkIjthOjA6e31zOjM6Im5ldyI7YTowOnt9fXM6NTA6ImxvZ2luX3dlYl81OWJhMzZhZGRjMmIyZjk0MDE1ODBmMDE0YzdmNThlYTRlMzA5ODlkIjtpOjY7czoyMToicGFzc3dvcmRfaGFzaF9zYW5jdHVtIjtzOjYwOiIkMnkkMTAkdTBMcXZHV0Z0cmouV1phRTZDdTFFLmFJdDZacWxrOWRzdFNyT054N055THpqYy9qdG1YWmkiO30=', 1667795832);

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `first_name` varchar(200) COLLATE utf8mb4_unicode_ci NOT NULL,
  `middle_name` varchar(200) COLLATE utf8mb4_unicode_ci NOT NULL,
  `last_name` varchar(200) COLLATE utf8mb4_unicode_ci NOT NULL,
  `phone` varchar(200) COLLATE utf8mb4_unicode_ci NOT NULL,
  `address` varchar(200) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(200) COLLATE utf8mb4_unicode_ci NOT NULL,
  `usertype` varchar(200) COLLATE utf8mb4_unicode_ci NOT NULL,
  `password` varchar(200) COLLATE utf8mb4_unicode_ci NOT NULL,
  `two_factor_secret` text COLLATE utf8mb4_unicode_ci,
  `two_factor_recovery_codes` text COLLATE utf8mb4_unicode_ci,
  `two_factor_confirmed_at` timestamp NULL DEFAULT NULL,
  `active` varchar(200) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT '0',
  `remember_token` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `current_team_id` bigint(20) UNSIGNED DEFAULT NULL,
  `profile_photo_path` varchar(2048) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `first_name`, `middle_name`, `last_name`, `phone`, `address`, `email`, `usertype`, `password`, `two_factor_secret`, `two_factor_recovery_codes`, `two_factor_confirmed_at`, `active`, `remember_token`, `current_team_id`, `profile_photo_path`, `created_at`, `updated_at`) VALUES
(1, 'Khamala', 'Joel', 'Wanyoa', '+254729520665', '137 - 50208', 'khamalawanyoa@gmail.com', 'admin', '$2y$10$bFwuY8YdQXRX2usbBNrCMO0CaRWMR5xdnNRkZq.8rYyLbEzCGwUq6', NULL, NULL, NULL, '1', NULL, NULL, NULL, '2022-11-03 15:29:58', '2022-11-03 16:09:39'),
(2, 'IntelBrain', 'Company', 'Inc', '+254 718 006908', '123 - 00100', 'admin@intelbrain.com', 'admin', '$2y$10$y4KQrILALsWCerHhuDpBzu62li2EYkeEG5k2LoqmSyG/JGKTxAr9m', NULL, NULL, NULL, '1', '5ZPqL3hqF9M8BOfeNOOVlmFVy5LWlxjDhki1QnhSyPbqWSrtwOZDof2miEUc', NULL, NULL, '2022-11-03 17:58:23', '2022-11-06 20:57:41'),
(3, 'Kimani', 'Maina', 'Mulati', '+254 767757465', '52682', 'kimanimaina@gmail.com', 'customer', '$2y$10$Zp0v3gxMlbp7HS1DrYRKEOXTnWUhfNQ2tucrjFJp6x1z9vMG16AG6', NULL, NULL, NULL, '1', NULL, NULL, NULL, '2022-11-03 18:07:46', '2022-11-06 20:10:39'),
(4, 'James', 'Munialo', 'Mugeni', '+254 766775774', '141', 'munialo2@gmail.com', 'customer', '$2y$10$nmcggub3TUfYzus1/buzy.G7tsDdpisgchpIkCb9XYpdKkcMuy7R6', NULL, NULL, NULL, '0', NULL, NULL, NULL, '2022-11-03 20:07:43', '2022-11-03 20:07:43'),
(5, 'Limo', 'John', 'Wasilwa', '0765646473', '137 - 50208', 'limo@gmail.com', 'customer', '$2y$10$dozvwtLSACepxAd08Zz/KeueteTPbTg.vaIH4BifRBubkXr382mxO', NULL, NULL, NULL, '1', NULL, NULL, NULL, '2022-11-05 13:09:00', '2022-11-06 20:10:46'),
(6, 'Jackie', 'Masinde', 'Juma', '0729520665', '137 - 50208', 'jwanyoa@gmail.com', 'customer', '$2y$10$u0LqvGWFtrj.WZaE6Cu1E.aIt6Zqlk9dstSrONx7NyLzjc/jtmXZi', NULL, NULL, NULL, '1', NULL, NULL, NULL, '2022-11-05 16:20:29', '2022-11-06 21:11:32'),
(7, 'Evans', '.', 'Mulwa', '+254718006908', 'Nairobi, Lang\'ata, Makueni', 'evansmulwa4@gmail.com', 'customer', '$2y$10$LE/HhyvdQnc1tv8y1sP/gO67QnZ3EnpXkAXCx5dKEBn/8M0rMR6/S', NULL, NULL, NULL, '0', 'ovJ9MQSU2NynUDf8QX5v9oSnugJqcPv59Aws9MAFWZ2I8bsCLFOjjEZSrIAD', NULL, NULL, '2022-11-06 03:52:11', '2022-11-06 03:52:11');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `activity_logs`
--
ALTER TABLE `activity_logs`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `carts`
--
ALTER TABLE `carts`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `categories`
--
ALTER TABLE `categories`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `failed_jobs`
--
ALTER TABLE `failed_jobs`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `failed_jobs_uuid_unique` (`uuid`);

--
-- Indexes for table `images`
--
ALTER TABLE `images`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `migrations`
--
ALTER TABLE `migrations`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `mpesa_transactions`
--
ALTER TABLE `mpesa_transactions`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `password_resets`
--
ALTER TABLE `password_resets`
  ADD KEY `password_resets_email_index` (`email`);

--
-- Indexes for table `personal_access_tokens`
--
ALTER TABLE `personal_access_tokens`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `personal_access_tokens_token_unique` (`token`),
  ADD KEY `personal_access_tokens_tokenable_type_tokenable_id_index` (`tokenable_type`,`tokenable_id`);

--
-- Indexes for table `products`
--
ALTER TABLE `products`
  ADD PRIMARY KEY (`id`),
  ADD KEY `products_category_id_foreign` (`category_id`);

--
-- Indexes for table `sessions`
--
ALTER TABLE `sessions`
  ADD PRIMARY KEY (`id`),
  ADD KEY `sessions_user_id_index` (`user_id`),
  ADD KEY `sessions_last_activity_index` (`last_activity`);

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
-- AUTO_INCREMENT for table `activity_logs`
--
ALTER TABLE `activity_logs`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=151;

--
-- AUTO_INCREMENT for table `carts`
--
ALTER TABLE `carts`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=70;

--
-- AUTO_INCREMENT for table `categories`
--
ALTER TABLE `categories`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `failed_jobs`
--
ALTER TABLE `failed_jobs`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `images`
--
ALTER TABLE `images`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;

--
-- AUTO_INCREMENT for table `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT for table `mpesa_transactions`
--
ALTER TABLE `mpesa_transactions`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `personal_access_tokens`
--
ALTER TABLE `personal_access_tokens`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `products`
--
ALTER TABLE `products`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
