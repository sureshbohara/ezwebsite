-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Dec 02, 2024 at 09:12 PM
-- Server version: 10.4.22-MariaDB
-- PHP Version: 8.1.0

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `sameday`
--

-- --------------------------------------------------------

--
-- Table structure for table `admins`
--

CREATE TABLE `admins` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `role_id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `password` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `address` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `mobile` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `image` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `gender` enum('male','female','other') COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `info` longtext COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `status` tinyint(4) NOT NULL DEFAULT 0,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `admins`
--

INSERT INTO `admins` (`id`, `role_id`, `name`, `email`, `password`, `address`, `mobile`, `image`, `gender`, `info`, `status`, `created_at`, `updated_at`) VALUES
(1, 1, 'Super Admin', 'transport@same-daycourier.com', '$2y$10$W8VRcp4zcRvZDc7XB6duUOMTOYht6GPx6xfpsSE/Tvy/SYEx8Jyai', 'Pembroke House 8 St Christophers Pl Farnborough GU14 0NH', '0330 043 0093', '17326436751732562206logo.png', 'male', 'A fully dedicated transportation and delivery service provider operating all throughout the UK and Europe. Our aim is to provide simple, cost effective and reliable solutions to any type of logistical concern that you may come across in your business or industry. We operate with an extremely reliable transport network, with access to thousands of vehicles on a daily basis including anything from small vans through to lorries of all sizes and capacities as well as specialist vehicles such as HIAB, Cranes, Moffetts and Flatbeds.', 1, '2024-11-25 09:00:25', '2024-11-26 12:11:18'),
(2, 2, 'System Admin', 'admin@gmail.com', '$2y$10$Dz5fqybNYne/9Oks3F9Ct.pSX6BISeywrKpTuXmsKDZqPgxfudar2', 'Test Address', '1234567890', '', 'male', '', 1, '2024-11-25 09:00:25', '2024-11-25 09:00:25'),
(3, 3, 'Sales Manager', 'salesmanager@gmail.com', '$2y$10$NMlIopLQyUcome2DPIuJuu8gMMWOuSFFsrf9ENa8KD9sxxlIScOgq', 'Test Address', '', '', 'male', '', 1, '2024-11-25 09:00:25', '2024-11-25 09:00:25');

-- --------------------------------------------------------

--
-- Table structure for table `banners`
--

CREATE TABLE `banners` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `banner_title` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `banner_sub_title` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `description` longtext COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `image` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `banner_link` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `order_level` int(11) NOT NULL DEFAULT 0,
  `status` tinyint(4) NOT NULL DEFAULT 1,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `delivery_promises`
--

CREATE TABLE `delivery_promises` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `display_on` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `image` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `description` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `order_level` int(11) NOT NULL DEFAULT 0,
  `status` tinyint(4) NOT NULL DEFAULT 1,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `delivery_promises`
--

INSERT INTO `delivery_promises` (`id`, `display_on`, `name`, `image`, `description`, `order_level`, `status`, `created_at`, `updated_at`) VALUES
(3, 'default', 'Collect Within The Hour', '1732569681Collect Within The Hour.png', 'We aim to have a vehicle (applies to vans only) at collection within an hour of booking confirmation.', 1, 1, '2024-11-25 15:36:21', '2024-11-25 15:36:21'),
(4, 'default', 'Delivered Direct', '1732569709Delivered Direct.png', 'After collection all consignments are delivered direct with no unscheduled stops.', 2, 1, '2024-11-25 15:36:49', '2024-11-25 15:36:49'),
(5, 'default', 'Safe & Secure', '1732569740Safe-Secure.png', 'The van and driver will be dedicated to your load only, which will also be fully secured during transit.', 3, 1, '2024-11-25 15:37:20', '2024-11-25 15:37:20'),
(6, 'default', '24/7 Service', '173256979724-7-Service.png', 'We collect and deliver anytime during the day and through the night.', 4, 1, '2024-11-25 15:38:17', '2024-11-25 15:38:17'),
(7, 'default', 'Complete Updates', '1732569824Complete Updates.png', 'We monitor all our consignments throughout and updates are sent after pick up and delivery.', 5, 1, '2024-11-25 15:38:44', '2024-11-25 15:38:44'),
(8, 'default', 'Fully Insured', '1732569846Fully Insured.png', 'All your loads are fully insured and our goods in transit insurance cover goes up to £30,000.', 6, 1, '2024-11-25 15:39:06', '2024-11-25 15:39:06');

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
  `id` bigint(20) UNSIGNED NOT NULL,
  `display_on` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'default',
  `question` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `answer` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `order_level` int(11) NOT NULL DEFAULT 0,
  `status` tinyint(3) UNSIGNED NOT NULL DEFAULT 1,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `faqs`
--

INSERT INTO `faqs` (`id`, `display_on`, `question`, `answer`, `order_level`, `status`, `created_at`, `updated_at`) VALUES
(1, 'default', 'What is a \'Dedicated\' delivery?', 'This means the vehicle and driver is fully dedicated to your consignment only, no co-loading with anything or anyone else’s load. The consignment will be collected and delivered direct (ASAP) to the delivery destination.', 1, 1, '2024-11-26 12:02:05', '2024-11-26 12:02:09'),
(2, 'default', 'Do you do overnights, next day or 2-3 day delivery service?', 'No, ours is a dedicated transport service only so we don’t do any groupage type service such as overnights, next day or 2-3 days delivery. We can however collect on a specified day and time and then deliver following day if required as a dedicated consignment.', 2, 1, '2024-11-26 12:02:33', '2024-11-26 12:02:37'),
(3, 'default', 'Do you have insurance and what is your insurance cover?', 'Yes, all consignments are covered by our goods in transit insurance cover. The cover value goes up to £30k. Should you require higher coverage, we can also manage this on an ad hoc basis with our insurance supplier.', 3, 1, '2024-11-26 12:03:58', '2024-11-26 12:03:58'),
(4, 'default', 'Do you deliver to Europe and do you handle customs?', 'Yes we can provide dedicated or express delivery service to, from and within Europe. We can also handle all your customs clearance requirements.', 4, 1, '2024-11-26 12:04:18', '2024-11-26 12:04:18'),
(5, 'default', 'Do you do pallet delivery?', 'We don’t provide a pallet network type service (groupage) however we can collect and deliver any number of pallets using dedicated vehicles.', 5, 1, '2024-11-26 12:04:32', '2024-11-26 12:04:32'),
(6, 'default', 'How do I start booking jobs?', 'Please set up an account with us by clicking here and we will do the rest or send us a quote request below.', 6, 1, '2024-11-26 12:04:46', '2024-11-26 12:04:46'),
(7, 'default', 'Where can I find your terms and conditions?', 'Our full terms and conditions of carriage can be found here.', 7, 1, '2024-11-26 12:05:02', '2024-11-26 12:05:02');

-- --------------------------------------------------------

--
-- Table structure for table `fleets`
--

CREATE TABLE `fleets` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `display_on` enum('Vans','Vehicles') COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'Vans',
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `image` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `excerpt` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `passengers` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `bags` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `fleets_key` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `fleets_value` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `order_level` int(11) NOT NULL DEFAULT 0,
  `status` tinyint(3) UNSIGNED NOT NULL DEFAULT 1,
  `meta_keywords` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `meta_description` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `fleets`
--

INSERT INTO `fleets` (`id`, `display_on`, `name`, `image`, `excerpt`, `passengers`, `bags`, `fleets_key`, `fleets_value`, `order_level`, `status`, `meta_keywords`, `meta_description`, `created_at`, `updated_at`) VALUES
(1, 'Vans', 'SMALL VAN', '1732642399SMALL VAN.jpg', 'No side loading or tail lift options available', '10', '10', '[\"Internal Load Space\",\"Weight\",\"Pallets\"]', '[\"1.5 x 1.2 x 1.1 meters\",\"Up to 350 kgs\",\"1 x UK Standard or 1 x Euro\"]', 1, 1, 'SMALL VAN', 'No side loading or tail lift options available', '2024-11-26 11:48:19', '2024-11-26 11:58:15'),
(2, 'Vans', 'Pallets', '1732642546SWB VAN.jpg', 'No side loading or tail lift options available', '10', '10', '[\"Internal Load Space\",\"Weight\",\"Pallets\"]', '[\"2.4 x 1.2 x 1.3 meters\",\"Up to 800 kgs\",\"2 x UK Standard or 2 x Euro\"]', 2, 1, 'Pallets', 'No side loading or tail lift options available', '2024-11-26 11:50:46', '2024-11-26 11:50:46'),
(3, 'Vans', 'LWB VAN', '1732642609LWB VAN.jpg', 'No side loading or tail lift options available', '10', '10', '[\"Internal Load Space\",\"Weight\",\"Pallets\"]', '[\"3 x 1.2 x 1.7 meters\",\"Between 1000 - 1400 kgs\",\"3 x UK Standard or 4 x Euro\"]', 3, 1, 'LWB VAN', 'No side loading or tail lift options available', '2024-11-26 11:51:49', '2024-11-26 11:51:49'),
(4, 'Vans', 'XLWB VAN', '1732642669XLWB VAN.jpg', 'No side loading or tail lift options available', '10', '10', '[\"Internal Load Space\",\"Weight\",\"Pallets\"]', '[\"4.2 x 1.25 x 1.75 meters\",\"Between 1000 to 1250 kgs\",\"4 x UK Standard or 5 x Euro\"]', 4, 1, 'XLWB VAN', 'No side loading or tail lift options available', '2024-11-26 11:52:49', '2024-11-26 11:52:49'),
(5, 'Vans', 'LUTON VAN', '1732642734LUTON VAN.jpg', 'Side loading and/or tail lift options available', '10', '10', '[\"Internal Load Space\",\"Weight\",\"Pallets\"]', '[\"4 x 2 x 1.85 meters\",\"Between 800 to 1000 kgs\",\"4 x UK Standard or 5 x Euro\"]', 5, 1, 'LUTON VAN', 'Side loading and/or tail lift options available', '2024-11-26 11:53:54', '2024-11-26 11:53:54'),
(6, 'Vans', '7.5 TONNE LORRY', '173264280475 TONNE LORRY.jpg', 'Side loading and/or tail lift options available', '10', '10', '[\"Internal Load Space\",\"Weight\",\"Pallets\"]', '[\"6 x 2.3 x 2.2 meters\",\"Up to 2500 kgs\",\"10 x UK Standard or 14 x Euro\"]', 6, 1, '7.5 TONNE LORRY', 'Side loading and/or tail lift options available', '2024-11-26 11:55:04', '2024-11-26 11:55:04'),
(7, 'Vans', '18 TONNE LORRY', '173264286318 TONNE LORRY.jpg', 'Side loading and/or tail lift options available', '10', '10', '[\"Internal Load Space\",\"Weight\",\"Pallets\"]', '[\"7.5 x 2.4 x 2.5 meters\",\"Up to 9000 kgs\",\"14-16 x UK Standard or 16-18 x Euro\"]', 7, 1, '18 TONNE LORRY', 'Side loading and/or tail lift options available', '2024-11-26 11:56:03', '2024-11-26 11:56:03'),
(8, 'Vans', '26 TONNE LORRY', '173264291926 TONNE LORRY.jpg', 'Side loading and/or tail lift options available', '10', '10', '[\"Internal Load Space\",\"Weight\",\"Pallets\"]', '[\"7.5 x 2.4 x 2.5 meters\",\"Up to 15000 kgs\",\"14-16 x UK Standard or 16-18 x Euro\"]', 8, 1, '26 TONNE LORRY', 'Side loading and/or tail lift options available', '2024-11-26 11:56:59', '2024-11-26 11:56:59'),
(9, 'Vans', 'ARTIC LORRY', '1732642982ARTIC LORRY.jpg', 'Side loading and/or tail lift options available', '10', '10', '[\"Internal Load Space\",\"Weight\",\"Pallets\"]', '[\"13.5 x 2.4 x 2.7 meters\",\"Up to 24000 kgs\",\"26 x UK Standard or 32 x Euro\"]', 9, 1, 'ARTIC LORRY', 'Side loading and/or tail lift options available', '2024-11-26 11:58:02', '2024-11-26 11:58:02'),
(10, 'Vehicles', 'HIAB & CRANE', '1732643042HIAB and CRANE.jpg', 'For self loading, offloading and when your require extensive lifiting capacity.', '10', '10', NULL, NULL, 10, 1, 'HIAB & CRANE', 'For self loading, offloading and when your require extensive lifiting capacity.', '2024-11-26 11:59:02', '2024-11-26 11:59:02'),
(11, 'Vehicles', 'MOFFETT', '1732643083MOFFETT.jpg', 'Lorry equipped with a forklift for loading and unloading where on site facilities are restricted.', '10', '10', NULL, NULL, 11, 1, 'MOFFETT', 'Lorry equipped with a forklift for loading and unloading where on site facilities are restricted.', '2024-11-26 11:59:43', '2024-11-26 12:01:23'),
(12, 'Vehicles', 'FLATBEDS', '1732643110FLATBEDS.jpeg', 'For loads that are too high for our standard vehicles or when it needs to be lifted using a crane.', '10', '10', NULL, NULL, 13, 1, 'FLATBEDS', 'For loads that are too high for our standard vehicles or when it needs to be lifted using a crane.', '2024-11-26 12:00:10', '2024-11-26 12:00:10');

-- --------------------------------------------------------

--
-- Table structure for table `galleries`
--

CREATE TABLE `galleries` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `display_on` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'default',
  `image` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `alt` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `order_level` int(11) NOT NULL DEFAULT 0,
  `status` tinyint(3) UNSIGNED NOT NULL DEFAULT 1,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `menus`
--

CREATE TABLE `menus` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `display_on` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `menu_icon` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `url` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `parent_id` int(11) DEFAULT NULL,
  `order_level` int(11) NOT NULL DEFAULT 0,
  `is_cms_page` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'NO',
  `status` tinyint(4) NOT NULL DEFAULT 1,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `menus`
--

INSERT INTO `menus` (`id`, `display_on`, `name`, `menu_icon`, `url`, `parent_id`, `order_level`, `is_cms_page`, `status`, `created_at`, `updated_at`) VALUES
(2, 'Header Footer', 'Home', NULL, '/', NULL, 1, 'NO', 0, '2024-11-27 13:48:40', '2024-12-02 14:18:56'),
(3, 'Only Header', 'About Us', NULL, '#', NULL, 2, 'NO', 1, '2024-11-27 13:49:11', '2024-11-29 09:25:32'),
(4, 'Only Header', 'Transport Services', NULL, '#', NULL, 3, 'NO', 1, '2024-11-27 13:50:34', '2024-11-27 14:06:50'),
(5, 'Only Header', 'Same Day UK', NULL, 'same-day-uk', 4, 4, 'NO', 1, '2024-11-27 13:51:05', '2024-11-29 09:27:18'),
(6, 'Only Header', 'European Dedicated Transport', NULL, 'european-deliveries', 4, 5, 'NO', 1, '2024-11-27 14:08:56', '2024-11-29 09:27:26'),
(7, 'Only Header', 'Temperature Controlled Transport', NULL, 'refrigerated-vehicles', 4, 6, 'NO', 1, '2024-11-27 14:09:48', '2024-11-29 09:27:36'),
(8, 'Only Header', 'Hazardous Freight', NULL, 'hazardous-freight', 4, 7, 'NO', 1, '2024-11-27 14:10:13', '2024-11-29 09:27:45'),
(9, 'Only Header', 'HIAB, Crane & Moffet', NULL, 'hiab-moffett', 4, 8, 'NO', 1, '2024-11-27 14:10:48', '2024-11-29 09:27:59'),
(10, 'Only Header', 'Aircraft on Ground AOG', NULL, 'aog', 4, 9, 'NO', 1, '2024-11-27 14:11:13', '2024-11-29 09:28:11'),
(11, 'Only Header', 'FORS Transport', NULL, 'fors-transport', 4, 10, 'NO', 1, '2024-11-27 14:11:42', '2024-11-29 09:30:15'),
(12, 'Only Header', 'Delivery Services', NULL, '#', NULL, 11, 'NO', 1, '2024-11-27 14:12:52', '2024-11-29 09:24:30'),
(13, 'Only Header', 'Same Day Delivery', NULL, 'same-day-delivery', 12, 12, 'NO', 1, '2024-11-27 14:13:17', '2024-11-29 09:30:05'),
(14, 'Only Header', 'Timed Delivery', NULL, 'timed-delivery', 12, 13, 'NO', 1, '2024-11-27 14:13:43', '2024-11-29 09:32:08'),
(15, 'Only Header', 'Multi Drops Delivery', NULL, 'multi-drops', 12, 14, 'NO', 1, '2024-11-27 14:14:05', '2024-11-29 09:46:55'),
(16, 'Only Header', 'Vehicle & Driver Day Hire', NULL, 'vehicle-driver-day-hire', 12, 15, 'NO', 1, '2024-11-27 14:14:32', '2024-11-29 09:46:58'),
(17, 'Only Header', '2 Man Team Delivery', NULL, '2-man-team', 12, 16, 'NO', 1, '2024-11-27 14:15:33', '2024-11-29 09:46:59'),
(18, 'Only Header', 'Vehicles', NULL, '#', NULL, 17, 'NO', 1, '2024-11-27 14:15:55', '2024-11-29 09:24:09'),
(19, 'Only Header', 'Vans & Lorries', NULL, 'vans-lorries', 18, 18, 'NO', 1, '2024-11-27 14:16:22', '2024-11-29 09:47:04'),
(20, 'Only Header', 'Specialist Vehicles', NULL, 'specialist-vehicles', 18, 19, 'NO', 1, '2024-11-27 14:16:42', '2024-11-29 09:47:07'),
(21, 'Header Footer', 'FAQ\'s', NULL, 'faq', NULL, 20, 'NO', 1, '2024-11-27 14:17:18', '2024-11-27 14:17:18'),
(22, 'Header Footer', 'Contact Us', NULL, 'contact', NULL, 21, 'NO', 1, '2024-11-27 14:17:48', '2024-11-27 14:17:48'),
(23, 'Header Footer', 'What We Do', NULL, 'about-us', 3, 2, 'NO', 1, '2024-11-29 09:13:26', '2024-11-29 09:13:26'),
(24, 'Header Footer', 'Your Industry', NULL, 'industry-menu', 3, 2, 'NO', 1, '2024-11-29 09:14:04', '2024-11-29 09:27:06'),
(25, 'Only Footer', 'Opening Hours', NULL, 'opening-hours', NULL, 22, 'YES', 1, '2024-11-29 10:04:16', '2024-11-29 12:50:52'),
(26, 'Only Footer', 'Privacy Policy', NULL, 'privacy-policy', NULL, 23, 'YES', 1, '2024-11-29 10:05:09', '2024-11-29 12:50:50'),
(27, 'Only Footer', 'Terms of Carriage', NULL, 'terms-conditions-of-carriage', NULL, 24, 'YES', 1, '2024-11-29 10:25:53', '2024-11-29 12:50:44'),
(28, 'Only Footer', 'Website T&Cs', NULL, 'website-terms-conditions', NULL, 25, 'YES', 1, '2024-11-29 10:41:59', '2024-11-29 12:50:43'),
(29, 'Only Footer', 'Trade Account', NULL, 'trade-account', NULL, 26, 'YES', 1, '2024-11-29 11:43:17', '2024-11-29 12:50:42'),
(30, 'Only Footer', 'Make  Payment', NULL, 'make-a-payment', NULL, 27, 'YES', 1, '2024-11-29 13:20:44', '2024-11-29 13:21:13');

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
(2, '2014_10_12_100000_create_password_reset_tokens_table', 1),
(3, '2014_10_12_100000_create_password_resets_table', 1),
(4, '2019_08_19_000000_create_failed_jobs_table', 1),
(5, '2019_12_14_000001_create_personal_access_tokens_table', 1),
(6, '2024_08_06_222924_create_settings_table', 1),
(7, '2024_11_11_162318_create_admins_table', 1),
(8, '2024_11_13_155947_create_banners_table', 1),
(11, '2024_11_18_185524_create_faqs_table', 1),
(12, '2024_11_18_194947_create_galleries_table', 1),
(13, '2024_11_18_203717_create_pages_table', 1),
(14, '2024_11_20_185327_create_delivery_promises_table', 1),
(15, '2024_11_20_200055_create_fleets_table', 1),
(16, '2024_11_21_225228_create_why_chooses_table', 1),
(17, '2024_11_15_175550_create_reviews_table', 2),
(18, '2024_11_14_154837_create_services_table', 3),
(19, '2024_11_26_144905_create_subscribers_table', 4),
(20, '2024_11_27_170101_create_menus_table', 5);

-- --------------------------------------------------------

--
-- Table structure for table `pages`
--

CREATE TABLE `pages` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `display_on` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `slug` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `excerpt` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `description` longtext COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `image` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `order_level` int(11) NOT NULL DEFAULT 0,
  `template` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `page_list` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `meta_keywords` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `meta_description` longtext COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `status` tinyint(4) NOT NULL DEFAULT 1,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `pages`
--

INSERT INTO `pages` (`id`, `display_on`, `name`, `slug`, `excerpt`, `description`, `image`, `order_level`, `template`, `page_list`, `meta_keywords`, `meta_description`, `status`, `created_at`, `updated_at`) VALUES
(1, 'Footer', 'Opening Hours', 'opening-hours', 'For any quotes, bookings and other queries, please get in touch with us on:', '<div class=\"opening-hours col-md-12\">\r\n      <div class=\"col-md-6\" style=\"\">\r\n        <h1>Opening Hours</h1>\r\n\r\n        <p>For any quotes, bookings and other queries, please get in touch with us on:</p>\r\n\r\n        <ul>\r\n            <li>\r\n                <span class=\"contact-method\">T:</span>\r\n                <a href=\"tel:03300430093\">0330 043 0093</a>\r\n            </li>\r\n            <li>\r\n                <span class=\"contact-method\">E:</span>\r\n                <a href=\"mailto:transport@same-daycourier.com\">transport@same-daycourier.com</a>\r\n            </li>\r\n            <li>\r\n                <span class=\"contact-method\">M:</span>\r\n                <a href=\"https://wa.me/03300430093\">Send message via WhatsApp Business</a>\r\n            </li>\r\n        </ul>\r\n\r\n        <p>Our forthcoming bank holiday opening hours are regularly updated and can be found by <a href=\"#\">clicking here.</a></p>\r\n    </div>\r\n\r\n    <div class=\"col-md-6\" style=\"\">\r\n        <table class=\"hours-table\">\r\n            <thead>\r\n                <tr>\r\n                    <th>Day</th>\r\n                    <th>Opening Hours</th>\r\n                </tr>\r\n            </thead>\r\n            <tbody>\r\n                <tr>\r\n                    <td>Monday</td>\r\n                    <td>0800 - 2200</td>\r\n                </tr>\r\n                <tr>\r\n                    <td>Tuesday</td>\r\n                    <td>0800 - 2200</td>\r\n                </tr>\r\n                <tr>\r\n                    <td>Wednesday</td>\r\n                    <td>0800 - 2200</td>\r\n                </tr>\r\n                <tr>\r\n                    <td>Thursday</td>\r\n                    <td>0800 - 2200</td>\r\n                </tr>\r\n                <tr>\r\n                    <td>Friday</td>\r\n                    <td>0800 - 2200</td>\r\n                </tr>\r\n                <tr>\r\n                    <td>Saturday</td>\r\n                    <td>0900 - 2100</td>\r\n                </tr>\r\n                <tr>\r\n                    <td>Sunday</td>\r\n                    <td>0900 - 2100</td>\r\n                </tr>\r\n            </tbody>\r\n        </table>\r\n    </div>\r\n    </div>', NULL, 1, 'default', NULL, 'Opening Hours', 'For any quotes, bookings and other queries, please get in touch with us on:', 1, '2024-11-29 10:02:42', '2024-11-29 15:18:38'),
(2, 'default', 'Privacy Policy', 'privacy-policy', 'Website Privacy Policy', '<p>www.same-daycourier.com (the \"Site\") is owned and operated by Same Day Courier Europe Ltd. Same Day Courier Europe Ltd is the data controller and can be contacted at:</p><p><br></p><p>&nbsp;transport@same-daycourier.com</p><p>&nbsp;03300 430093</p><p>&nbsp;Pembroke House, 8 St Christophers Pl, Farnborough, GU14 0NH</p><p><br></p><p><b>Purpose</b></p><p>The purpose of this privacy policy (this \"Privacy Policy\") is to inform users of our Site of the following:</p><p>1.&nbsp; &nbsp;The personal data we will collect;</p><p>2.&nbsp; &nbsp;Use of collected data;</p><p>3.&nbsp; &nbsp;Who has access to the data collected; and</p><p>4.&nbsp; &nbsp;The rights of Site users.</p><p>This Privacy Policy applies in addition to the terms and conditions of our Site.</p><p><br></p><p><b>GDPR</b></p><p>For users in the European Union, we adhere to the Regulation (EU) 2016/679 of the European Parliament and of the Council of 27 April 2016, known as the General Data Protection Regulation (the \"GDPR\"). For users in the United Kingdom, we adhere to the GDPR as enshrined in the Data Protection Act 2018.</p><p>&nbsp;We have not appointed a Data Protection Officer as we do not fall within the categories of controllers and processors required to appoint a Data Protection Officer under Article 37 of the GDPR.</p><p><br></p><p><b>Consent</b></p><p>By using our Site users agree that they consent to:</p><p>1. The conditions set out in this Privacy Policy.</p><p>When the legal basis for us processing your personal data is that you have provided your consent to that processing, you may withdraw your consent at any time. If you withdraw your consent, it will not make processing which we completed before you withdrew your consent unlawful.</p><p>You can withdraw your consent by: Unsubscribing.</p><p><br></p><p><b>Legal Basis for Processing</b></p><p>&nbsp;We collect and process personal data about users in the EU only when we have a legal basis for doing so under Article 6 of the GDPR.</p><p>&nbsp;We rely on the following legal bases to collect and process the personal data of users in the EU:</p><p>1.&nbsp; &nbsp; &nbsp; Users have provided their consent to the processing of their data for one or more specific purposes; and</p><p>2.&nbsp; &nbsp; Processing of user personal data is necessary for us or a third pary to pursue a legitimate interest. Our legitimate interest is not overriden by the interests or fundamenal rights and freedoms of users. Our legitimate interest(s) are: Provide a service.</p><p><br></p><p><b>How We Use Personal Data</b></p><p>Data collected on our Site will only be used for the purposes specified in this Privacy Policy or indicated on the relevant pages of our Site. We will not use your data beyond what we disclose in this Privacy Policy.</p><p><br></p><p><b>Who We Share Personal Data With</b></p><p><b>Employees</b></p><p>We may disclose user data to any member of our organisation who reasonably needs access to user data to achieve the purposes set out in this Privacy Policy.</p><p><br></p><p><b>Other Disclosures</b></p><p>&nbsp;We will not sell or share your data with other third parties, except in the following cases:</p><p>1.&nbsp; If the law requires it;</p><p>2.&nbsp; &nbsp;If it is required for any legal proceeding;</p><p>3.&nbsp; &nbsp;To prove or protect our legal rights; and</p><p>4.&nbsp; &nbsp;To buyers or potential buyers of this company in the event that we seek to sell the company.</p><p><br></p><p>If you follow hyperlinks from our Site to another Site, please note that we are not responsible for and have no control over their privacy policies and practices.</p><p><br></p><p><b>How Long We Store Personal Data</b></p><p>User data will be stored until the purpose the data was collected for has been achieved.</p><p>You will be notified if your data is kept for longer than this period.</p><p><br></p><p><b>How We Protect Your Personal Data</b></p><p>All data is only accessible to our employees. Our employees are bound by strict confidentiality agreements and a breach of this agreement would result in the employee\'s termination.</p><p>While we take all reasonable precautions to ensure that user data is secure and that users are protected, there always remains the risk of harm. The Internet as a whole can be insecure at times and therefore we are unable to guarantee the security of user data beyond what is reasonably practical.</p><p><br></p><p><b>Your Rights as a User</b></p><p>Under the GDPR, you have the following rights:</p><p>1.&nbsp; &nbsp;Right to be informed;</p><p>2.&nbsp; &nbsp;Right of access;</p><p>3.&nbsp; &nbsp;Right to rectification;</p><p>4.&nbsp; &nbsp;Right to erasure;</p><p>5.&nbsp; &nbsp;Right to restrict processing;</p><p>6.&nbsp; &nbsp;Right to data portability; and</p><p>7.&nbsp; &nbsp;Right to object.</p><p><br></p><p><b>Children</b></p><p>We do not knowingly collect or use personal data from children under 16 years of age. If we learn that we have collected personal data from a child under 16 years of age, the personal data will be deleted as soon as possible. If a child under 16 years of age has provided us with personal data their parent or guardian may contact our privacy officer.</p><p><br></p><p>How to Access, Modify, Delete, or Challenge the Data Collected</p><p><br></p><p>If you would like to know if we have collected your personal data, how we have used your personal data, if we have disclosed your personal data and to who we disclosed your personal data, if you would like your data to be deleted or modified in any way, or if you would like to exercise any of your other rights under the GDPR, please contact our privacy officer here:</p><p>&nbsp;__________</p><p>&nbsp;________________________________________</p><p>&nbsp;________________________________________</p><p>&nbsp;________________________________________</p><p>How to Opt-Out of Data Collection, Use or Disclosure</p><p>In addition to the method(s) described in the How to Access, Modify, Delete, or Challenge the Data Collected section, we provide the following specific opt-out methods for the forms of collection, use, or disclosure of your personal data specified below:</p><p>1.&nbsp; &nbsp; &nbsp; Marketing emails. You can opt-out by clicking unsubscribe.</p><p><br></p><p>2.&nbsp; &nbsp; &nbsp; ___________________________________________________________</p><p>&nbsp;___________________________________________________________</p><p>&nbsp;___________________________________________________________</p><p>&nbsp;___________________________________________________________</p><p>&nbsp;___________________________________________________________</p><p>&nbsp;___________________________________________________________</p><p>&nbsp;___________________________________________________________</p><p>&nbsp;___________________________________________________________</p><p>&nbsp;___________________________________________________________</p><p>&nbsp;___________________________________________________________ You can opt-out by ___________________________________________________________</p><p>&nbsp;___________________________________________________________</p><p>&nbsp;___________________________________________________________</p><p>&nbsp;___________________________________________________________</p><p>&nbsp;___________________________________________________________</p><p>&nbsp;___________________________________________________________</p><p>&nbsp;___________________________________________________________</p><p>&nbsp;___________________________________________________________</p><p>&nbsp;___________________________________________________________</p><p>&nbsp;___________________________________________________________</p><p><br></p><p><b>Modifications</b></p><p>This Privacy Policy may be amended from time to time in order to maintain compliance with the law and to reflect any changes to our data collection process. When we amend this Privacy Policy we will update the \"Effective Date\" at the top of this Privacy Policy. We recommend that our users periodically review our Privacy Policy to ensure that they are notified of any updates. If necessary, we may notify users by email of changes to this Privacy Policy.</p><p><b>Complaints</b></p><p>&nbsp;If you have any complaints about how we process your personal data, please contact us through the contact methods listed in the Contact Information section so that we can, where possible, resolve the issue. If you feel we have not addressed your concern in a satisfactory manner you may contact a supervisory authority. You also have the right to directly make a complaint to a supervisory authority. You can lodge a complaint with a supervisory authority by contacting the Information Commissioner\'s Office in the UK.</p>', NULL, 2, 'default', NULL, 'Privacy Policy', 'Website Privacy Policy', 1, '2024-11-29 10:24:49', '2024-11-29 10:24:49'),
(3, 'default', 'Terms of Carriage', 'terms-conditions-of-carriage', 'Customer Terms & Conditions of Carriage', '<p>Same Day Courier Europe Ltd T/A Same Day Courier (hereinafter referred to as “the carrier”) is not a common carrier and accepts goods for carriage only upon that condition and the Conditions set out below. No servant or agent of the Carrier is permitted to alter or vary these Conditions in any way unless expressly authorised in writing to do so by a duly authorised person. If any part of these Conditions is incompatible with applicable legislation, such part shall, as regards the Contract, be overridden to that extent and no further.</p><p>1.&nbsp; &nbsp;Definitions</p><p>2.&nbsp; Application of Terms and Conditions</p><p>3.&nbsp; Bookings and Quotes</p><p>4.&nbsp; Parties and Sub-contracting</p><p>5.&nbsp; Dangerous Goods</p><p>6.&nbsp; &nbsp;Consignment and Delivery</p><p>7.&nbsp; &nbsp;Loading and Unloading</p><p>8.&nbsp; &nbsp;Consignment Notes</p><p><span style=\"background-color: rgba(var(--bs-light-rgb),var(--bs-bg-opacity)); font-weight: var(--bs-body-font-weight); text-align: var(--bs-body-text-align);\">9.&nbsp; &nbsp;Transit</span></p><p>10. Obligations of the Customer</p><p><span style=\"background-color: rgba(var(--bs-light-rgb),var(--bs-bg-opacity)); font-weight: var(--bs-body-font-weight); text-align: var(--bs-body-text-align);\">11. Undelivered or Unclaimed Consignments</span></p><p><span style=\"background-color: rgba(var(--bs-light-rgb),var(--bs-bg-opacity)); font-weight: var(--bs-body-font-weight); text-align: var(--bs-body-text-align);\">12.&nbsp; &nbsp;Carrier’s Charges</span></p><p>13.&nbsp; &nbsp;Cancellations</p><p>14.&nbsp; Liability for Loss and Damag</p><p>15.&nbsp; Fraud</p><p>16.&nbsp; Our Freight Liability</p><p>17.&nbsp; Compensation to the Carrier</p><p>18. Time Limits for Claims</p><p>19.&nbsp; Unreasonable Detention</p><p>20. Confidentiality</p><p>21. Law and Jurisdiction</p><p>22. General</p><p><b>1. Definitions</b></p><p>In these Conditions:</p><p>“Booking” means a booking for the carriage of a Consignment placed by a Customer with the Carrier via telephone, email or messaging services (such as text, WhatsApp etc.).</p><p>“Customer” means the person, organisation or company who contracts for the services of the Carrier.</p><p><br></p><p>“Carrier” means Same Day Courier Europe Ltd T/A Same Day Courier.</p><p>“Contract” means the contract of carriage between the Customer and the Carrier.</p><p>“Consignee” means the person or company to whom the Carrier delivers the Consignment.</p><p>“Consignment” means goods or property, whether or not contained in separate parcels, packages, containers or envelopes including any paper and documents, to be delivered by the Carrier for the Customer to the Consignee.</p><p>“Dangerous Goods” means goods set out in the Carriage of Dangerous Goods and Use of Transportable Pressure Equipment Regulations (CDG) and the European agreement “Accord européen relatif au transport international des marchandises dangereuses par route” (ADR), which together regulate the carriage of dangerous goods by road including, explosives, radioactive material, and any other goods presenting a similar hazard.</p><p>“Delivery Address” means the address for delivery of the Consignment notified to the Courier at the time of booking.</p><p>“Demurrage” means any cost or expense the Carrier suffers as a result of the improper, excessive or unreasonable detention of any vehicle, trailer, container or other equipment belonging to or under the control of the Carrier.</p><p>“Force Majeure Event” shall have the meaning set out in Condition 14(c).</p><p>“In writing” includes, unless otherwise agreed, the transmission of information by electronic, optical or similar means of communication, including, but not limited to, facsimile, electronic mail or electronic data interchange (EDI), provided that the information is readily accessible and durable so as to be usable for subsequent reference.</p><p><br></p><p><b>2. Application of Terms and Conditions&nbsp;</b></p><p>Our terms and conditions shall apply to all Bookings placed by the Customer with the Carrier and prevail over any uncertain terms or conditions contained, or referred to, in the customer’s purchase order, confirmation of order, acceptance of a quote, or implied by law, trade custom, practice or course of dealing.</p><p><b>3. Bookings and Quotes</b></p><p>a)&nbsp; &nbsp; &nbsp; &nbsp;All bookings shall be placed by the Customer to the Carrier by telephone, email or messaging services (such as text, WhatsApp etc.).</p><p>b)&nbsp; &nbsp; &nbsp; All quotes provided by the Carrier to the Customer shall be valid for a period of 7 days or such other period as the carrier may specify.</p><p>c)&nbsp; &nbsp; &nbsp; &nbsp;The Carrier reserves the right to refuse to accept any bookings.</p><p><br></p><p><b>4. Parties and Sub-contracting</b></p><p>a)&nbsp; &nbsp;The Customer warrants that they are either the owner of the consignment or is authorised by such owner to accept these conditions on such owner’s behalf.</p><p>b)&nbsp; &nbsp; &nbsp; The Carrier may employ the services of any other carrier for the purpose of fulfilling the contract in whole or in part and the name of every other such carrier shall be provided to the Customer upon request. The Carrier may at any time assign, mortgage, charge, delegate, declare a trust over or deal in any other manner with any or all of its rights and obligations under the contract, to the extent permitted by law.</p><p><b>5. Dangerous Goods</b></p><p>a)&nbsp; &nbsp;The Carrier shall not be obliged to carry any Dangerous Goods or Consignments.</p><p>b)&nbsp; &nbsp; The Customer is responsible for ascertaining if the contents of any Consignment are Dangerous Goods, are prohibited or are subject to restrictions or specific requirements either within the UK or the country of destination for international deliveries.</p><p>c)&nbsp; The Customer must not send or attempt to send a Consignment containing any Dangerous Goods, prohibited or restricted goods via the Carrier without disclosing this information to the Carrier.</p><p>d)&nbsp; &nbsp;If the Customer does send or attempt to send Dangerous Goods, prohibited or restricted goods the Customer may be liable to prosecution and shall indemnify and keep indemnified the Carrier and its employees, contractors, subcontractors and agents, against any loss or damage suffered or liability incurred as a result of such actions</p><p>e)&nbsp; &nbsp;If a Consignment containing any Dangerous Goods, prohibited or restricted goods is sent by the Customer, the Carrier may deal with the Consignment in its sole and absolute discretion (without incurring any liability whatsoever to the Customer or Recipient) including destroying or otherwise disposing of such Parcel or Consignment in whole or in part or returning the Consignment to the Customer, and shall be entitled to charge the Customer the cost of disposal and all other costs reasonably incurred and additionally the sum of £20, (or such sum as specified by the Carrier on its website) if it chooses to return the Consignment or any part of it.</p><p>f)&nbsp; &nbsp;The Carrier may, acting reasonably, add or remove items from the definition of prohibited goods or restricted goods (and may vary any applicable restrictions) without notice, by making the details of any such additions or deletions available on its website)</p><p>g)&nbsp; The Customer shall be liable to the Carrier its employees, subcontractors and agents for all loss, damage or injury arising out of the carriage of Dangerous Goods, prohibited or restricted goods, whether declared as such or not and all goods not properly packed and duly labelled (or not in compliance with any other specific requirements) to the extent that such loss, damage or injury is caused by the nature of those goods.</p><p>h)&nbsp; Dangerous Goods (prohibited and restricted goods) must be declared by the Customer and if the Carrier agrees to accept them for carriage they must be classified, packed, marked, labelled and documented in accordance with the statutory regulations for the carriage by road of the substance declared.</p><p>i) Transport Emergency Cards (Tremcards) or information in writing in the manner required by the relevant statutory provisions must be provided by the Customer in respect of each substance and must accompany the Consignment. The Carrier will ensure that the cards are appropriate to the load.</p><p>j)The Carrier reserves the right to open and inspect any Consignment.</p><p><br></p><p><b>6. Consignment and Delivery</b></p><p>a) The Customer will ensure that the Consignment is properly and safely packed and secure and safe to be carried, stored and transported.</p><p>b) The Customer shall ensure that the Consignment is securely and properly packed and labelled in accordance with any relevant legislation and in such a condition that it is not likely to cause injury or damage to person or property.</p><p>c) The Carrier will use all reasonable efforts to ensure Consignments are delivered in accordance with the time notified to the Customer, however, it is agreed that such times are estimates only and time shall not be of the essence for the purpose of this agreement.</p><p>d)&nbsp; When Consignments are to be collected from a Customer’s address the Customer will provide appropriate equipment and labour for loading the Consignment.</p><p>e) Delivery shall be deemed to be completed when the Carrier completes unloading of the Consignment to the Delivery Address, and a proof of delivery is obtained and a signature is obtained (POD). The driver who delivers the Consignment shall scan the POD and upload photographic evidence as required by the Carrier.</p><p><br></p><p><b>7. Loading and Unloading</b></p><p>a) Unless the Carrier has agreed in writing to the contrary with the Customer, The Carrier shall not be under any obligation to provide any plant, power or labour, other than that carried by the vehicle, required for loading or unloading the Consignment.</p><p>b) The Customer warrants that any special appliances or instructions required for loading or unloading the Consignment which are not carried by the vehicle will be provided by the Customer or on the Customer’s behalf.</p><p>c) The Customer shall ensure that any cranes, fork lift trucks, slings, chains or other equipment used in loading or unloading the vehicle are suitable for that purpose and will indemnify the Carrier against any and all consequences of failure of or unsuitability of such equipment.</p><p>d) The Customer shall ensure that there is adequate access to the loading and the unloading points and that the roadways to and from the public highway are of suitable material and that unloading will take place on good sound hardstanding, where there will be sufficient space to load or unload the vehicle in safety.</p><p>e) The Customer shall ensure that no loss or damage to any of the Carrier’s vehicles or trailers occurs whilst at the collection or delivery premises and shall be liable for any such damage.&nbsp;</p><p>f) The Carrier shall under no circumstances be liable to the Customer for any loss of, or damage to the Consignment or any property of the Customer in connection with or arising out of the Carrier’s use of any special equipment in the loading or unloading of the Consignment (other than that carried by the vehicle used by the Carrier).</p><p>g) The Customer shall indemnify the Carrier against all costs, expenses, injuries, losses, liability damages, claims, proceedings or legal costs which the Carrier may suffer as a result of the provision of assistance with loading or unloading.</p><p>h) The Customer shall indemnify the Carrier against all liability or loss or damage suffered or incurred (including but not limited to damage to the Carrier’s vehicle) as a result of the Carrier’s personnel complying with the instructions of the Customer or the Consignee or their servants or agents.</p><p>i) The Customer shall make available to the Carrier upon request details of any risk assessments which may have been carried out at the collection and/or delivery The responsibility for carrying out such risk assessments shall be that of the Customer and not of the Carrier.</p><p><br></p><p><b>8. Consignment Notes</b></p><p>a) The Carrier shall, if so required, sign a document prepared by the sender acknowledging the receipt of the Consignment but no such document shall be evidence of the condition or of the correctness of the declared nature, quantity, or weight of the Consignment at the time it is received by the Carrier and the burden of proving the condition of the Consignment on receipt by the Carrier and that the Consignment was of the nature, quantity or weight declared in the relevant document shall rest with the Customer.</p><p>b) The Customer shall, prior to or upon the completion of loading the Consignment, sign and forthwith deliver to the Carrier a consignment note stating; the Collection address, the Consignee and the Delivery Address; A complete and accurate description of the nature of the goods within the Consignment and the method of packing; The number of items, parcels, packages and/or containers in the Consignment; The gross weight of the goods within the Consignment or their quality otherwise expressed and any other information the Carrier may reasonably require.</p><p><b>9. Transit</b></p><p>a) Unless otherwise agreed expressly between the parties, transit shall commence when the Carrier takes possession of the Consignment whether at the point of collection or at the Carrier’s premises.</p><p><span style=\"background-color: rgba(var(--bs-light-rgb),var(--bs-bg-opacity)); font-weight: var(--bs-body-font-weight); text-align: var(--bs-body-text-align);\">b) Transit shall end when the Consignment is tendered at the Delivery Address provided at the time of booking by the Customer&nbsp;</span></p><p>c) Where a Consignment cannot be delivered (for whatever reason) or is held by the Carrier to await order or further instructions and such instructions are not given or the Consignment is not collected within 24 hours of notice being given to the Customer or such other time as the Carrier may nominate, then transit shall be deemed to end at the expiry of such time.</p><p>d) The Carrier shall be entitled to recover its charges in full for any delivery, which is unsuccessful due to incorrect or inadequate information provided by the Customer and in addition recover any expenses or losses it suffered or incurred in attempting to effect delivery.</p><p>e) The Consignment shall be at the sole risk of the Customer at all times when the Consignment is not in transit.</p><p>f) The Customer understands and accepts that the Carrier shall be entitled to open and examine any Consignment that the Carrier reasonably considers to be a security or health and safety risk&nbsp; and to take, at its sole discretion, such appropriate action thereafter.</p><p><b>10. Obligations of the Custome</b>r</p><p>a) The Customer warrants that the Consignment does not and will not cause pollution of the environment or harm to human health; require any official consent or licence to handle, possess, deal with or carry; at any time whilst in the care or control of the Carrier constitute waste (unless the Carrier has been previously advised otherwise); and that the Consignment is of a nature that can be legally transported in the United Kingdom.</p><p>b) The customer will comply, and will procure that all of its agents, employees and sub-contractors also comply, with any reasonable regulations of the Carrier relating to handling, health and safety, and security, of which they are notified or have been notified.</p><p>c) The customer will provide the Carrier with such information and materials as the Carrier may reasonably require in order to comply with its obligations under the Contract, and will ensure that such information is complete and accurate in all material respects.</p><p>d) If the Carrier’s performance of any of its obligations under the Contract is prevented, hindered or delayed by any act or omission of the Customer or by any failure by the Customer to perform any relevant obligation (“Customer Default”), then without limiting or affecting any other right or remedy available to it, the Carrier shall have the right to suspend performance of its obligations until the Customer remedies the Customer Default, and may rely on the Customer Default to relieve it from the performance of any of its obligations in each case to the extent the Customer Default prevents, hinders or delays the Supplier’s performance of any of its obligations.</p><p>e) The Carrier shall not be liable for any costs or losses sustained or incurred by the Customer arising directly or indirectly from the Carrier’s failure to perform or delay in performing any of its obligations as set out in this Condition 10(d); and</p><p>f)&nbsp; The Customer shall on written demand reimburse the Carrier for any costs or losses sustained or incurred by the Carrier arising directly or indirectly from the Customer Default.</p><p><br></p><p><b>11. Undelivered or Unclaimed Consignments</b></p><p><br></p><p>a) Where the Carrier is unable to effect delivery as requested by the Customer when making a Booking, or where transit has come to an end, the Carrier shall use its reasonable endeavours to notify the Customer and the Consignee of any undelivered or unclaimed Consignment. Unless the Consignment is collected from the Carrier by the Customer, or instructions are given for the disposal, onward carriage or return to the Customer of the Consignment, within 7 days of such notice being given (or such other time as the Carrier may nominate), title to the Consignment shall transfer to the Carrier and the Carrier may destroy or sell the Consignment as if it were the absolute owner. Where a Consignment is returned to the Customer by the Carrier or a Customer arranges for the onward carriage and delivery of the Consignment by the Carrier (excluding any return to the Customer), that return or onward carriage (as the case may be) shall be at the Customer’s sole cost and expense and shall be charged to the Customer (and the Customer shall pay) at the Carrier’s standard rates.</p><p>b) The Carrier shall use its reasonable endeavours to obtain what is in its view a reasonable price for the Consignment and shall use the proceeds of sale to discharge the Carrier’s expenses incurred in relation to the carriage, storage and sale or disposal of the Consignment. Any remaining amounts will be charged to the Customer and any proceeds will be paid over to the Customer upon its written request, upon which the Carrier shall be discharged from all liability in respect of the Consignment.</p><p><b>12. Carrier’s Charges</b></p><p>a) Charges shall be payable when due without deduction or deferment on account of any claim, counterclaim or set-off. The Customer shall pay the Carrier within the agreed payment terms agreed when setting up the respective accounts and the Carrier shall be entitled, without prejudice to any other right, the Carrier shall be entitled to charge interest and legal costs on any overdue sum from the due date until payment of the overdue sum, whether before or after judgement. Interest under this clause will accrue each day at the rate prescribed by the Late Payment of Commercial Debts (Interest) Act 1998 as amended from time to time.</p><p>b) If the Customer becomes insolvent or any sums owed by the Customer on any invoice or account with the Carrier become overdue for payment, any credit terms shall be cancelled with immediate effect and all invoices or accounts issued by the Carrier shall immediately be deemed due for payment and thereupon become payable.</p><p>c)&nbsp; Unless otherwise agreed with the Customer at the time of the booking, the Carrier shall not be required to obtain a signed or any other type of proof of delivery (including photographic proof) of the Consignment from the Consignee. Where the Carrier does agree at the time of booking to obtain such proof of delivery no payment shall however be withheld by the Customer where the Carrier is unable to provide a proof of delivery unless notification of non-delivery is received by the Carrier no more than 48 hours after the expected time of delivery of the Consignment and the Carrier is subsequently unable to evidence proof of delivery.</p><p>d) The Customer is entitled to cancel the collection of a Consignment at any time before the agreed collection time. If the Customer cancels the collection less than an hour before the agreed time, the Carrier reserves the right to charge a cancellation fee equivalent to 100% of the total agreed charge.</p><p>e) All bookings are subject to the following loading and unloading times, 30 minutes (van consignments) and 60 minutes (lorry consignments) each for collection and delivery. After the above allocated loading and unloading times end and the vehicle is still on site, the carrier reserves the right to charge waiting time fees as notified within our terms or service.</p><p>f) In the event that the Carrier provides services in addition to those originally agreed including (without limitation) providing services outside working hours, making deliveries to locations other than the Delivery Address or outside the time at which the Carrier is to collect or deliver the Consignment, the Carrier shall be entitled to be paid by the Customer such additional amount as represents the additional cost incurred together with a management charge.</p><p>g) The Customer shall not be entitled to withhold, deduct or set off against any amount due to the Carrier any sum which it alleges is due to it from the Carrier.</p><p>h) The Customer is responsible for ensuring that it has paid the appropriate charges. If at any time the Carrier determines that the Customer has not paid the appropriate charges then the Customer shall be liable to the Carrier for the difference between what the Customer initially paid and the amount which the Customer should have paid. The Carrier may at is discretion suspend any account that the Customer has with the Carrier until any unpaid amount is repaid, as well as take any other legal action the Carrier is entitled to in order to recover any unpaid amounts.</p><p><b>13. Cancellations</b></p><p>a) The Customer may cancel the order up to 24 hours before and receive a full refund by contacting the Carrier and providing the relevant order number connected to the Consignment.</p><p>b) If an order is cancelled within 24 hours of collection, the Carrier will endeavour to cancel the order and issue a refund where possible. If however, the Carrier is unable to cancel delivery without incurring costs, those costs shall be passed on to the Customer and in any case the Customer shall be unable to cancel the order and shall not be entitled to a refund if the Carrier has collected the Consignment or it has been dropped off/the label has been used.</p><p><b>14. Liability for Loss and Damage</b></p><p>a) The Carrier shall only be liable for loss or damage to or in connection with the Consignment howsoever or whensoever caused and whether or not caused or contributed to directly or indirectly by any act, omission, neglect, default or other wrongdoing on the part of the Carrier, its employees, contractors, subcontractors or agents if and to the extent that the Carrier has been negligent.</p><p>b) Subject to these Conditions the Carrier shall be liable for: physical loss, mis-delivery of or damage to living creatures, bullion, money, securities, stamps, precious metals or precious stones comprising the Consignment only if: the Carrier has specifically agreed in writing to carry any such items; and the Customer has agreed in writing to reimburse the Carrier in respect of all additional costs which result from the carriage of the said items; and the loss, mis-delivery or damage is occasioned during transit and is proved to be due to the negligence of the Carrier, its employees, contractors, subcontractors or agents;</p><p>c) Physical loss, mis-delivery of or damage to any other goods comprising the Consignment unless the same has arisen from a “Force Majeure Event” which shall mean any act(s), event(s), circumstances(s) or cause(s) the occurrence of which is beyond the reasonable control of the Carrier, including but not limited to: any consequences of war, invasion, act of foreign enemy, hostilities (whether war or not), civil war, rebellion, insurrection, terrorist act, military or usurped power or confiscation, requisition, or destruction or damage by or under the order of any government or public or local authority; seizure or forfeiture under legal process; error, act, omission, mis-statement or misrepresentation by the Customer or other owner of the Consignment or by servants or agents of either of them; inherent liability to wastage in bulk or weight, faulty design, latent defect or inherent defect, vice or natural deterioration of the Consignment; any special handling requirements in respect of the Consignment which have not been notified to the Carrier; insufficient or improper packing, labelling or addressing; riot, civil commotion, strike, lockout, general or partial stoppage or restraint of labour from whatever cause; fire, flood, storm, earthquake, pandemic, or epidemic; road congestion, road accidents, delays incurred at any delivery location or lack of delivery instructions from the Customer, vehicle breakdown; Consignee not taking or accepting delivery within a reasonable time after the Consignment has been tendered.</p><p>d) The Carrier shall not in any circumstances be liable for loss or damage arising after transit is deemed to have ended within the meaning of these conditions, whether or not caused or contributed to directly or indirectly by any act, omission, neglect, default or other wrongdoing on the part of the Carrier, its servants, agents or sub-contractors.</p><p>e)&nbsp; The Carrier shall not be liable for any loss or deterioration of, or damage to, or non-delivery, mis-delivery of any property (including the Consignment) or any other claim in any circumstances whatsoever, howsoever caused save to the extent that the same is caused by its wilful default or negligence.</p><p>f) Unless agreed otherwise, the Carrier shall not be obliged to insure the Consignment, and where it does so, will insure on the conditions set out by the Road Haulage Association and CMR. The Customer is responsible for insuring against all risks for the full insurable value.</p><p><br></p><p><b>15. Fraud</b></p><p>The Carrier shall not in any circumstances be liable in respect of a Consignment where there has been fraud on the part of the Customer or the owner, or the servants or agents of either, in respect of that Consignment, unless the fraud has been contributed to by the complicity of the Carrier or of any servant of the Carrier acting in the course of his employment.</p><p><b>16. Our Freight Liability</b></p><p>a) You are covered to the extent provided by our Policy for the following losses and liabilities arising from the provision of an Insured Service under an Insured Contract and / or Insured Convention, as specified in the Schedule, occurring within the Geographical Limits during the Period of Insurance.</p><p>b) Loss or Damage; You are covered for Your liability to any third party for physical loss of or damage to Goods or Mis-delivery of Goods, other than Consequential Loss and accidental delay.</p><p>c) Consequential Loss and Accidental Delay; You are covered for Your liability for Consequential Loss arising from: physical loss of or damage to Goods or Mis-delivery of Goods, provided that You are covered under this Policy; and accidental delay in the delivery of any Goods. We will not pay more than four (4) times the amount charged by You under the Insured Contract and / or Insured Convention or GBP 250,000, whichever is the least.</p><p>d) Contract Conditions Set Aside; You are covered for Your liability where You are not legally entitled to rely on all or any part of any defence or limitation of liability in the Insured Contract under which You contracted with Your customer. We will not pay more than GBP 500,000 any one Event.</p><p>e) Non-incorporation of Insured Contracts; You are covered for Your liability arising under the common law of England and Wales as a result of the provision of an Insured Service where; you inadvertently failed to incorporate an Insured Contract into the contract for the Insured Service with Your customer and where no Insured Convention applied; and you had an effective system in continuous use throughout the Period of Insurance to contract with Your customers under such Insured Contracts and the failure was the direct result of an isolated error or omission by You or any Employee. Where You did not have such a system in continuous use or You contracted on terms other than an Insured Contract, You are still covered but only to the extent that liability would have attached under the Insured Contract or the Insured Convention considered by Us to be the most appropriate. We will not pay more than GBP 500,000 any one Event.</p><p><br></p><p><b>17. Compensation to the Carrier</b></p><p>a) The Customer shall compensate the Carrier against all liabilities and costs incurred by the Carrier (including but not limited to claims, demands, proceedings, fines, penalties, damages, expenses and loss of or damage to the carrying vehicle and to other goods carried) by reason of any error, exclusion, inaccuracy or misrepresentation by the Customer or other owner of the Consignment or by any employee, contractor, subcontractor or agent, insufficient or improper packing, labelling or addressing of the Consignment or fraud as in Condition 15.</p><p>b) All claims and demands whatsoever (including for the avoidance of doubt claims alleging negligence), by whomsoever made and howsoever arising (including but not limited to claims caused by or arising out of the carriage of Dangerous Goods and claims made upon the Carrier by HM Customs and Excise in respect of dutiable goods consigned in bond) in excess of the liability of the Carrier under these Conditions in respect of any loss or damage whatsoever to, or in connection with, the Consignment whether or not caused or contributed to directly or indirectly by any act, omission, neglect, default or other wrongdoing on the part of the Carrier, its servants, agents or sub-contractors.</p><p>c) Any sensitive personal data, information and documents contained within a Consignment, including but not limited to names, addresses, bank details, signatures and dates of birth is entirely at the Customer ‘s risk and no compensation is available for these items. Data stored on electronic media, for example data disks, hard drives, magnetic tapes or pen drives must be suitably encrypted. The Customer shall compensate the Carrier against all actions, claims, proceedings and judgments together with costs incurred relating to loss, damage or disclosure of such data documents.</p><p><b>18. Time Limits for Claims</b></p><p>The Carrier shall not be liable for damage to the whole or any part of the Consignment, or physical loss, mis-delivery or non-delivery of part of the Consignment unless the Carrier has been negligent and the Customer has advised the Carrier in writing of the issue within seven days after completion of said consignment.</p><p><b>19. Unreasonable Detention</b></p><p>The Customer shall be liable to pay Demurrage for unreasonable detention of any vehicle, trailer, container or other equipment but the rights of the Carrier against any other person in respect thereof shall remain unaffected.</p><p><b>20. Confidentiality</b></p><p>a) Each party undertakes that it shall not at any time disclose to any person any confidential information concerning the business, affairs, customers, clients or suppliers of the other party, except as permitted by these Conditions.</p><p>b) Each party may disclose the other party’s confidential information: to its employees, officers, representatives, sub-contractors or advisers who need to know such information for the purposes of carrying out the party’s legal obligations; and as may be required by law, a court of competent jurisdiction or any governmental or regulatory authority.</p><p><br></p><p><b>21. Law and Jurisdiction</b></p><p>Each party irrevocably agrees that the courts of England and Wales shall have exclusive jurisdiction to settle any dispute or claim arising out of or in connection with this agreement or its subject matter or formation (including non-contractual disputes or claims).</p><p><b>22. General</b></p><p>a) Nothing in these Conditions (nor anything else), shall confer on any third party any benefit, nor the right to enforce any of these Conditions which that person would not have had but for the Contracts (Rights of Third Parties) Act 1999.</p><p>b) These conditions, and the documents and information on the websites referred to, constitute the entire agreement between the Carrier and the Customer. The Customer acknowledges that in agreeing to these conditions it has not relied on any representation or undertaking, whether oral or in writing, save as expressly incorporated therein.</p><p>c) If any provision of these conditions shall be found by any court or administrative body of competent jurisdiction to be invalid or unenforceable, such invalidity or unenforceability shall not affect the provisions of these Conditions which shall remain in full force and effect.</p><p>d) If any provision or part-provision of these Conditions is or becomes invalid, illegal or unenforceable, it shall be deemed modified to the minimum extent necessary to make it valid, legal and enforceable. If such modification is not possible, the relevant provision or part- provision shall be deemed deleted. Any modification to or deletion of a provision or part- provision under this clause shall not affect the validity and enforceability of the rest of these Conditions.</p><p>e) The Carrier and the Customer agree that they and/or anyone they employ and/or for who they are responsible will comply with any applicable anti-bribery or anti-money laundering laws and/or regulations in connection with these Conditions or related services.</p><p>f) The Carrier shall not be liable to the other for any delay or non-performance of the Services to the extent that such non-performance is due to a Force Majeure Event (including but not limited to any genuine circumstances outside of the reasonable control of either of the parties which were not reasonably foreseeable at the date of execution hereof which include war, insurrection, earthquake, riot, fire and flood, but excluding any change to guidelines, industry codes or regulations or industrial dispute).</p>', NULL, 3, 'default', NULL, 'Terms of Carriage', 'Customer Terms & Conditions of Carriage', 1, '2024-11-29 10:40:17', '2024-11-29 10:40:17');
INSERT INTO `pages` (`id`, `display_on`, `name`, `slug`, `excerpt`, `description`, `image`, `order_level`, `template`, `page_list`, `meta_keywords`, `meta_description`, `status`, `created_at`, `updated_at`) VALUES
(4, 'default', 'Website T&Cs', 'website-terms-conditions', 'Website Terms and Conditions', '<p>These terms and conditions (the \"Terms and Conditions\") govern the use of www.same-daycourier.com (the \"Site\"). This Site is owned and operated by Same Day Courier Europe Ltd. This Site is a business website.</p><p>&nbsp;</p><p>By using this Site, you indicate that you have read and understand these Terms and Conditions and agree to abide by them at all times.</p><p><br></p><p><b>Intellectual Property</b></p><p>&nbsp;All content published and made available on our Site is the property of Same Day Courier Europe Ltd and the Site\'s creators. This includes, but is not limited to images, text, logos, documents, downloadable files and anything that contributes to the composition of our Site.</p><p><br></p><p><b>Acceptable Use</b></p><p>As a user of our Site, you agree to use our Site legally, not to use our Site for illegal purposes, and not to:</p><p>Violate the intellectual property rights of the Site owners or any third party to the Site.</p><p>If we believe you are using our Site illegally or in a manner that violates these Terms and Conditions, we reserve the right to limit, suspend or terminate your access to our Site. We also reserve the right to take any legal steps necessary to prevent you from accessing our Site.</p><p><br></p><p><b>Accounts</b></p><p>When you create an account on our Site, you agree to the following:</p><p>You are solely responsible for your account and the security and privacy of your account, including passwords or sensitive information attached to that account; and</p><p>All personal information you provide to us through your account is up to date, accurate, and truthful and that you will update your personal information if it changes.</p><p>We reserve the right to suspend or terminate your account if you are using our Site illegally or if you violate these Terms and Conditions.</p><p><br></p><p><b>Limitation of Liability</b></p><p>Same Day Courier Europe Ltd and our directors, officers, agents, employees, subsidiaries, and affiliates will not be liable for any actions, claims, losses, damages, liabilities and expenses including legal fees from your use of the Site.</p><p><br></p><p><b>Indemnity</b></p><p>Except where prohibited by law, by using this Site you indemnify and hold harmless Same Day Courier Europe Ltd and our directors, officers, agents, employees, subsidiaries, and affiliates from any actions, claims, losses, damages, liabilities and expenses including legal fees arising out of your use of our Site or your violation of these Terms and Conditions.</p><p><br></p><p><b>Applicable Law</b></p><p>These Terms and Conditions are governed by the laws of the Country of England.</p><p><br></p><p><b>Severability</b></p><p>If at any time any of the provisions set forth in these Terms and Conditions are found to be inconsistent or invalid under applicable laws, those provisions will be deemed void and will be removed from these Terms and Conditions. All other provisions will not be affected by the removal and the rest of these Terms and Conditions will still be considered valid.</p><p><br></p><p><b>Changes</b></p><p>These Terms and Conditions may be amended from time to time in order to maintain compliance with the law and to reflect any changes to the way we operate our Site and the way we expect users to behave on our Site. We will notify users by email of changes to these Terms and Conditions or post a notice on our Site.</p><p><br></p><p><b>Contact Details</b></p><p>Please contact us if you have any questions or concerns. Our contact details are as follows:</p><p>&nbsp;</p><p>&nbsp;03300 430093</p><p>&nbsp;transport@same-daycourier.com</p><p>&nbsp;Pembroke House, 8 St Christophers Pl, Farnborough, GU14 0NH</p>', NULL, 5, 'default', NULL, 'Website T&Cs', 'Website Terms and Conditions', 1, '2024-11-29 10:43:58', '2024-11-29 10:43:58'),
(5, 'Footer', 'Trade Account', 'trade-account', 'Set Up An Account', '<p><b>Please fill in all the requested details and one of our transport team will be in touch very shortly.</b></p><p><br></p><p></p><p>Same Day Courier is committed to protecting and respecting your privacy, and we’ll only use your personal information to administer your account and to provide the products and services you requested from us. From time to time, we would like to contact you about our products and services, as well as other content that may be of interest to you.</p><p><br></p><p>You can unsubscribe from these communications at any time. By clicking submit below, you consent to allow Same Day Courier to store and process the personal information submitted above to provide you the content requested.</p><p><br></p><p><b>Our full terms and conditions of carriage can be found here.</b></p>', NULL, 6, 'right-side-form', NULL, 'Trade Account', 'Set Up An Account', 1, '2024-11-29 12:05:27', '2024-11-29 15:00:46'),
(6, 'Footer', 'Make A Payment.', 'make-a-payment', 'Please submit all the details below and include full amount including<br> VAT when submitting payment, thank you.', NULL, NULL, 7, 'full-width-form', NULL, 'Make A Payment.', 'Please submit all the details below and include full amount including VAT when submitting payment, thank you.', 1, '2024-11-29 12:07:06', '2024-11-29 14:42:46');

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
-- Table structure for table `password_reset_tokens`
--

CREATE TABLE `password_reset_tokens` (
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `token` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `permissions`
--

CREATE TABLE `permissions` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `role_id` bigint(20) UNSIGNED NOT NULL,
  `permission` longtext CHARACTER SET utf8mb4 COLLATE utf8mb4_bin NOT NULL CHECK (json_valid(`permission`)),
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `permissions`
--

INSERT INTO `permissions` (`id`, `role_id`, `permission`, `created_at`, `updated_at`) VALUES
(1, 1, '{\"user\":{\"add\":\"1\",\"edit\":\"1\",\"view\":\"1\",\"delete\":\"1\"},\"role\":{\"add\":\"1\",\"edit\":\"1\",\"view\":\"1\",\"delete\":\"1\"},\"permission\":{\"add\":\"1\",\"edit\":\"1\",\"view\":\"1\",\"delete\":\"1\"},\"setting\":{\"add\":\"1\",\"edit\":\"1\",\"view\":\"1\",\"delete\":\"1\"},\"menu\":{\"add\":\"1\",\"edit\":\"1\",\"view\":\"1\",\"delete\":\"1\"},\"banner\":{\"add\":\"1\",\"edit\":\"1\",\"view\":\"1\",\"delete\":\"1\"},\"service\":{\"add\":\"1\",\"edit\":\"1\",\"view\":\"1\",\"delete\":\"1\"},\"review\":{\"add\":\"1\",\"edit\":\"1\",\"view\":\"1\",\"delete\":\"1\"},\"faqs\":{\"add\":\"1\",\"edit\":\"1\",\"view\":\"1\",\"delete\":\"1\"},\"gallery\":{\"add\":\"1\",\"edit\":\"1\",\"view\":\"1\",\"delete\":\"1\"},\"page\":{\"add\":\"1\",\"edit\":\"1\",\"view\":\"1\",\"delete\":\"1\"},\"deliverypromise\":{\"add\":\"1\",\"edit\":\"1\",\"view\":\"1\",\"delete\":\"1\"},\"fleets\":{\"add\":\"1\",\"edit\":\"1\",\"view\":\"1\",\"delete\":\"1\"},\"whychoose\":{\"add\":\"1\",\"edit\":\"1\",\"view\":\"1\",\"delete\":\"1\"}}', '2024-11-25 09:00:25', '2024-11-27 11:47:32');

-- --------------------------------------------------------

--
-- Table structure for table `personal_access_tokens`
--

CREATE TABLE `personal_access_tokens` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `tokenable_type` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `tokenable_id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `token` varchar(64) COLLATE utf8mb4_unicode_ci NOT NULL,
  `abilities` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `last_used_at` timestamp NULL DEFAULT NULL,
  `expires_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `reviews`
--

CREATE TABLE `reviews` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `address` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `rating` int(11) NOT NULL,
  `review` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `content` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `image` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `display_on` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `order_level` int(11) NOT NULL DEFAULT 0,
  `status` tinyint(4) NOT NULL DEFAULT 1,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `reviews`
--

INSERT INTO `reviews` (`id`, `name`, `email`, `address`, `rating`, `review`, `content`, `image`, `display_on`, `order_level`, `status`, `created_at`, `updated_at`) VALUES
(1, 'XL Flooring Ltd', NULL, NULL, 4, 'The teams Same Day have always gone above and beyond to give our company exactly what we need..', 'precisely when we need it.We find the pricing very reasonable, with the ability to take passengers to the destination being a real benefit for us. We would highly recommend them to everyone seeking a service that stands out from the rest!', NULL, 'default', 1, 1, '2024-11-25 14:47:49', '2024-11-26 11:29:12'),
(2, 'Alexis Flooring.', NULL, NULL, 5, 'great service , prompt communication back and even when my clients moves times and dates Same days courier ...', 'adjust with no fuss ..brilliant service.', NULL, 'default', 2, 1, '2024-11-25 14:49:13', '2024-11-26 08:59:30'),
(3, 'Buteline Uk.', NULL, NULL, 5, 'Quotes generated in real quick time. Never had a job cancelled or in fulfilled. Great communication from office...', 'and all drivers helpful, very good rates. Highly recommended', NULL, 'default', 3, 1, '2024-11-25 14:49:52', '2024-11-25 14:49:52'),
(4, 'Carmen Homewood.', NULL, NULL, 5, 'I needed an urgent delivery to Carlisle and the service I received was first class. They collected within an hour and...', 'delivered in great time. The live tracking updates are really helpful and they are good value for money. I would certainly use again and would highly recommend. Thank you!', NULL, 'default', 4, 1, '2024-11-25 14:50:30', '2024-11-25 14:50:30'),
(5, 'Customer.', NULL, NULL, 4, 'First time using Same day and were amazing! Fast, effortless and very easy to work with we are currently setting up an...', 'account to make them priority external courier.', NULL, 'default', 5, 1, '2024-11-25 14:51:02', '2024-11-25 14:51:02'),
(6, 'Customer.', NULL, NULL, 4, 'First time using Same day and were amazing! Fast, effortless and very easy to work with we are currently setting up an...', 'account to make them priority external courier.', NULL, 'default', 6, 1, '2024-11-25 14:51:49', '2024-11-25 14:51:49'),
(7, 'Atlas Dies Ltd.', NULL, NULL, 5, 'We have been using Same Day for a few years now - and they never let us down. Very efficient company would highly ...', 'recommend- very competitive prices', NULL, 'default', 7, 1, '2024-11-25 14:53:05', '2024-11-26 09:00:15'),
(8, 'Customer.', NULL, NULL, 5, 'We have used Same Day a few times, the service is excellent, quick to quote. The arranging of deliveries is efficient...', 'and they keep you updated from collection to delivery.', NULL, 'default', 8, 1, '2024-11-25 14:53:27', '2024-11-25 14:53:27'),
(9, 'Paul Czorny.', NULL, NULL, 3, 'This company does exactly what you need and goes the extra mile with fast response times, constant updates from collection...', 'to point of delivery even if it falls outside the normal working hours, I had an urgent delivery which was collected at 3pm on a Friday from Newcastle and was delivered at 21.30pm that night in Portsmouth, I would recommend them to any company looking for a gold star service from start to finish', NULL, 'default', 9, 1, '2024-11-25 14:54:01', '2024-11-25 15:06:30');

-- --------------------------------------------------------

--
-- Table structure for table `roles`
--

CREATE TABLE `roles` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `status` tinyint(4) NOT NULL DEFAULT 1,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `roles`
--

INSERT INTO `roles` (`id`, `name`, `status`, `created_at`, `updated_at`) VALUES
(1, 'Super Admin', 1, '2024-11-25 09:00:25', '2024-11-25 09:00:25'),
(2, 'Admin', 1, '2024-11-25 09:00:25', '2024-11-25 09:00:25'),
(3, 'Sales Manager', 1, '2024-11-25 09:00:25', '2024-11-25 09:00:25'),
(4, 'Content Manager', 1, '2024-11-25 09:00:25', '2024-11-25 09:00:25');

-- --------------------------------------------------------

--
-- Table structure for table `services`
--

CREATE TABLE `services` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `whyChoose_ids` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `service_title` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `slug` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `service_sub_title` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `excerpt` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `description` longtext COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `display_on` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `image` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `feature_image` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `service_feature` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `order_level` int(11) NOT NULL DEFAULT 0,
  `status` tinyint(4) NOT NULL DEFAULT 1,
  `meta_keywords` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `meta_description` longtext COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `services`
--

INSERT INTO `services` (`id`, `whyChoose_ids`, `service_title`, `slug`, `service_sub_title`, `excerpt`, `description`, `display_on`, `image`, `feature_image`, `service_feature`, `order_level`, `status`, `meta_keywords`, `meta_description`, `created_at`, `updated_at`) VALUES
(1, '[\"7\",\"13\",\"14\",\"16\",\"26\",\"28\"]', 'Same Day UK', 'same-day-uk', 'For any urgent and time sensitive requirments.', 'Swift Solutions for Time-Sensitive Deliveries.', '<p><b>Same Day Specialists</b></p><p><b><br></b>\r\nUtilising a combination of knowledge, expertise and management, we are able to execute same day deliveries with great precision and efficiency.\r\nWe operate with a network of well over 4000 vehicles at our disposal which remain active nationwide on a 24 hour basis.\r\nTherefore, we can dispatch the required vehicle for pick up within an hour of your booking (applies to vans only) and deliver direct to the desired destination with no unscheduled stops. All our deliveries are fully dedicated so you can be rest assured that your goods will be delivered quickly, safely and securely.\r\nAll consignments are monitored from booking to collection all the way to delivery with proof of delivery provided on completion of your consignment.</p>', 'Transport', '1732572627Same Day Specialists.jpg', NULL, NULL, 1, 1, 'Same Day UK', 'Swift Solutions for Time-Sensitive Deliveries.', '2024-11-25 16:25:27', '2024-11-29 12:26:04'),
(2, '[\"17\",\"18\",\"19\",\"20\",\"21\",\"22\"]', 'European Dedicated Transport', 'european-deliveries', 'European Import & export service including customs.', 'Dedicated Import & Export Service Between The UK & EU.', '<b>A Dedicated European Service Between UK & EU </b><br>\n<p>We aim to provide a seamless service to ensure that all your EU shipments are fully taken care of from customs clearance all the way down to your specific transport needs.</p>\n<p>Our team of experts can take you through what can be a confusing and ever changing import and export process and help you reduce any potential interruption and delays at the borders.</p>\n<p>We have everything in place from a smooth customs process to an extremely reliable network of vehicles that travel between the UK and EU on a daily basis enabling us to provide you with a stress free service. </p>', 'Transport', '1732631968GettyImages.jpg', NULL, NULL, 2, 1, 'European Dedicated Transport', 'Dedicated Import & Export Service Between The UK & EU.', '2024-11-25 17:07:11', '2024-11-26 08:54:28'),
(3, '[\"13\",\"16\",\"23\",\"24\",\"25\",\"26\"]', 'Temperature Controlled Transport', 'refrigerated-vehicles', 'For any freight that requires a thermo-logistical service.', 'Cold Chain Confidence, from Start to Finish.', '<p><b>Innovative Temperature Controlled Transport Solutions</b></p><p>Introducing Same Day Courier\'s Temperature Controlled Transport Service – the ultimate solution for safeguarding the integrity of your sensitive goods. Our state-of-the-art fleet is equipped with advanced temperature monitoring and control systems, ensuring that your perishable items, pharmaceuticals, and other temperature-sensitive products are transported under optimal conditions. From start to finish, we maintain precise temperature control, providing a seamless and reliable cold chain for your valuable cargo. With our expertise in handling temperature-controlled shipments, you can trust us to deliver your goods in pristine condition, maintaining their quality and extending their shelf life. Experience peace of mind and uncompromising quality with Same Day Courier\'s Temperature Controlled Transport Service.</p>\r\n<p>We aim to provide a competitive, easy to book temperature controlled transport service that keeps you informed at every step, from booking confirmation, real-time ETA at the click of a button and PODs by email when your delivery is complete.</p><p></p>', 'Transport', '1732575324Temperature Controlled Transport.jpg', NULL, NULL, 3, 1, 'Temperature Controlled Transport', 'Cold Chain Confidence, from Start to Finish.', '2024-11-25 17:10:24', '2024-11-25 17:10:24'),
(4, '[\"13\",\"14\",\"16\",\"23\",\"26\",\"27\"]', 'Hazardous Freight', 'hazardous-freight', 'Fully compliant service for delivery of hazardous and/or dangerous goods.', 'ADR Solutions for Secure Transport of Hazardous Materials.', '<p><b>Dangerous &amp; Hazardous Freight Solutions</b></p><p><br>\r\n<p>At Same Day Courier, we understand the unique challenges and requirements of transporting hazardous freight. Safety is our utmost priority, which is why we offer a specialized hazardous freight transport service that ensures the secure and compliant delivery of dangerous goods.</p> \r\n<p>With our experienced team and advanced safety protocols, we handle a wide range of hazardous materials, including chemicals, gases, flammable substances, and more. </p>\r\n<p>Our dedicated fleet of vehicles is equipped with state-of-the-art safety features, ensuring that your hazardous freight is handled with the utmost care and transported in accordance with all relevant regulations.</p> \r\n<p>Trust us to deliver your hazardous goods safely, efficiently, and with the highest level of professionalism.</p>\r\n</p>', 'Transport', '1732575961Dangerous & Hazardous Freight Solutions.jpg', NULL, NULL, 4, 1, 'Hazardous Freight', 'ADR Solutions for Secure Transport of Hazardous Materials.', '2024-11-25 17:21:01', '2024-11-25 17:21:01'),
(5, '[\"13\",\"14\",\"16\",\"23\",\"24\",\"26\"]', 'HIAB, Crane & Moffett', 'hiab-moffett', 'Fully compliant service for delivery of hazardous and/or dangerous goods.', 'Specialist Vehicles For Abnormal, Heavy Loads With Loading, Offloading & Lifting Options.', '<b>Lifting Your Logistics to New Heights!</b><br>\r\n\r\n<p>When it comes to handling heavy and oversized loads with precision and efficiency, Same Day Courier\'s HIAB Transport Service stands out as your trusted partner. Our specialized fleet of HIAB-equipped vehicles, operated by skilled professionals, ensures seamless and safe transportation for even the most challenging loads.With our</p><p> <b>HIAB Transport Service, you can expect:</b></p><ol><li>Heavy Lifting Expertise: Our experienced operators are trained in the art of heavy lifting, utilizing state-of-the-art HIAB cranes to handle your cargo with utmost care and precision. Whether it\'s construction materials, machinery, or equipment, we have the expertise to lift and transport it securely.</li><li>Versatile Solutions: Our HIAB vehicles are equipped with versatile crane systems, offering a range of lifting capabilities. From maneuvering loads into tight spaces to reaching considerable heights, our HIAB Transport Service provides the flexibility needed to meet your specific requirements.</li><li>Efficient Deliveries: We understand that time is of the essence in the business world. Our HIAB Transport Service ensures efficient deliveries, as our skilled operators are trained to optimize lifting and loading processes. You can rely on us to meet your deadlines and keep your projects running smoothly.</li><li>Safety and Compliance: Safety is our top priority. We adhere to strict safety protocols, ensuring that your cargo is securely fastened and transported in accordance with industry standards. Our HIAB vehicles are regularly inspected and maintained to guarantee reliable performance and compliance with all regulations.</li><li>Tailored Solutions: We take a personalized approach to every project. Our team works closely with you to understand your unique requirements, ensuring that our HIAB Transport Service is tailored to your specific needs. We collaborate with you to develop a customized plan that maximizes efficiency and minimizes disruptions.</li></ol>', 'Transport', '1732576382HIAB Crane  Moffett.jpg', NULL, NULL, 5, 1, 'HIAB, Crane & Moffett', 'Specialist Vehicles For Abnormal, Heavy Loads With Loading, Offloading & Lifting Options.', '2024-11-25 17:28:02', '2024-11-25 17:28:02'),
(6, '[\"7\",\"13\",\"14\",\"16\",\"26\",\"28\"]', 'AOG (Aircraft On Ground)', 'aog', 'Self loading, unloading and lifting vehicles for abnormal and heavy loads.', 'Priority Delivery for Aviation: AOG Solutions You Can Trust.', '<p><b>AOG Service Adding Value To Your Supply Chain</b></p><p>Introducing Same Day Courier\'s AOG Transport Service: Your Solution for Urgent Aircraft-on-Ground Situations</p><p>When time is of the essence in the aviation industry, Same Day Courier\'s AOG Transport Service is here to provide swift and reliable solutions for Aircraft-on-Ground situations. We understand the critical nature of AOG incidents and the impact they can have on operations, passenger satisfaction, and revenue. That\'s why our specialized team is dedicated to delivering rapid response and seamless logistics to get your aircraft back in the sky as quickly as possible.&nbsp;</p><p>With our extensive experience and expertise in AOG transport, coupled with a nationwide network, you can trust us to handle your urgent aviation needs with the utmost professionalism and efficiency. From transporting essential spare parts and components to facilitating on-time deliveries to maintenance facilities, Same Day Courier\'s AOG Transport Service is your trusted partner in overcoming time-sensitive challenges in the aviation industry.</p>', 'Transport', '1732576583AOG.jpg', NULL, NULL, 6, 1, 'AOG (Aircraft On Ground)', 'Priority Delivery for Aviation: AOG Solutions You Can Trust.', '2024-11-25 17:31:23', '2024-11-25 17:31:23'),
(7, '[\"7\",\"13\",\"14\",\"16\",\"26\",\"28\"]', 'FORS Transport', 'fors-transport', 'Fully accredited FORS transport service.', 'Delivering with FORS: Quality, Safety, and Reliability', '<h3><b style=\"color:#1470AF;\">Experience the Advantage of Our FORS Transport Service.</b></h3>\n\n<p>By choosing our FORS-accredited transport service, you can expect nothing short of excellence. We adhere to rigorous industry best practices and continuously strive to improve our operations in terms of safety, efficiency, and environmental impact. Our fleet is equipped with state-of-the-art vehicles that meet stringent FORS standards, ensuring reliability, security, and compliance throughout the transportation process.</p>\n\n<p>Partnering with a FORS-accredited service provider like us provides you with several benefits. Firstly, you can trust that your consignments are handled by trained and competent professionals who prioritize safety at every step. Our drivers undergo comprehensive training and are regularly assessed to maintain their expertise in driving techniques and industry regulations.</p>\n\n<p>Secondly, our FORS accreditation means that we implement advanced technology and systems to monitor and manage our fleet operations effectively. This allows us to optimize routes, reduce emissions, and provide real-time tracking and updates for your valuable shipments. You can have complete visibility and peace of mind knowing that your deliveries are in capable hands.</p>\n\n\n<p>Lastly, our FORS transport service reflects our commitment to sustainability and environmental responsibility. We actively work towards reducing our carbon footprint by utilizing eco-friendly vehicles, implementing fuel-efficient practices, and embracing sustainable initiatives within our operations. By choosing our FORS-accredited service, you contribute to a greener future while enjoying reliable and efficient transport solutions.</p>', 'Transport', '1732576773FORS.png', NULL, NULL, 7, 1, 'FORS Transport', 'Delivering with FORS: Quality, Safety, and Reliability', '2024-11-25 17:34:33', '2024-11-25 17:34:33'),
(8, '', 'Same Day Delivery Service', 'same-day-delivery', NULL, 'With our Same Day delivery service, we take pride in providing swift and reliable solutions for your time-sensitive needs. Whether it\'s urgent documents, time-critical packages, or last-minute shipments, we\'ve got you covered.', '<p>&nbsp;Our experienced team and advanced logistics capabilities ensure that your items are picked up and delivered promptly, no matter the size or destination. With a focus on efficiency and customer satisfaction, we strive to exceed your expectations, making sure your deliveries reach their intended recipients on time, every time. Experience the convenience and peace of mind that comes with our same day delivery service, and let us handle your urgent shipments with speed and precision.</p>', 'Delivery', '1732577643Same Day Delivery Service.jpg', NULL, NULL, 8, 1, 'Same Day Delivery Service', 'With our Same Day delivery service, we take pride in providing swift and reliable solutions for your time-sensitive needs. Whether it\'s urgent documents, time-critical packages, or last-minute shipments, we\'ve got you covered.', '2024-11-25 17:49:03', '2024-11-25 17:49:03'),
(9, '', 'Timed Delivery', 'timed-delivery', NULL, 'We offer a Timed Delivery Service for those extremely time sensitive consignments that are to be collected and,', '<p>or delivered at very specific times. Bookings can be placed on the day or in advance with confirmed time slots for collection and delivery. For all bookings we can also provide driver and vehicle details up front for security and booking purposes.</p>', 'Delivery', '1732577721Timed Delivery Service.jpg', NULL, NULL, 9, 1, 'Timed Delivery', 'We offer a Timed Delivery Service for those extremely time sensitive consignments that are to be collected and,', '2024-11-25 17:50:21', '2024-11-25 17:50:21'),
(10, '', 'Multi Drops Delivery', 'multi-drops', NULL, 'Our multi drops service allows you to plan multiple deliveries using a dedicated vehicle enabling you to reduce costs and your carbon footprint where possible. Our transport team can work out the most efficient route and plan your deliveries depending on your specific needs and requirements.', '<br>', 'Delivery', '1732641860Multi Drops Delivery.jpg', NULL, NULL, 10, 1, 'Multi Drops Delivery', 'Our multi drops service allows you to plan multiple deliveries using a dedicated vehicle enabling you to reduce costs and your carbon footprint where possible. Our transport team can work out the most efficient route and plan your deliveries depending on your specific needs and requirements.', '2024-11-26 11:39:20', '2024-11-26 11:39:20'),
(11, '', 'Vehicle & Driver Day Hire', 'vehicle-driver-day-hire', NULL, 'Our vehicle and driver hire delivery service offers you the ultimate convenience and flexibility for all your transportation needs. Whether you require a vehicle and driver for event logistics, multi drops or any other purpose, we\'ve got you covered. With our half and/or full-day hire service, you have the freedom to plan your routes and make multiple deliveries to and from your depot, maximizing your productivity and efficiency. Experience the convenience and reliability of our vehicle and driver hire delivery service and let us take care of your transportation needs, so you can make the most of your day.', '<p><br></p>', 'Delivery', '1732642000Vehicle & Driver Day.jpg', NULL, NULL, 11, 1, 'Vehicle & Driver Day Hire', 'Our vehicle and driver hire delivery service offers you the ultimate convenience and flexibility for all your transportation needs. Whether you require a vehicle and driver for event logistics, multi drops or any other purpose, we\'ve got you covered. With our half and/or full-day hire service, you have the freedom to plan your routes and make multiple deliveries to and from your depot, maximizing your productivity and efficiency. Experience the convenience and reliability of our vehicle and driver hire delivery service and let us take care of your transportation needs, so you can make the most of your day.', '2024-11-26 11:41:40', '2024-11-26 11:41:40'),
(12, '[]', '2 Man Team Delivery', '2-man-team', NULL, 'Our two-man team delivery service is here to provide you with an exceptional level of service and care for your deliveries. With our dynamic duo, we ensure that your items are handled with utmost professionalism, efficiency, and attention to detail. Whether it\'s delicate furniture, heavy equipment, or any other valuable goods, our expert team will handle it with precision and expertise. From loading to unloading, our two-man team works seamlessly to ensure the safe and secure transport of your items. With double the manpower, we provide an extra level of assistance, making your delivery experience smooth and hassle-free. Trust in our two-man team delivery service for a reliable, efficient, and personalized solution for all your delivery needs.', NULL, 'Delivery', '1732642192Man Team Delivery.jpg', NULL, NULL, 12, 1, '2 Man Team Delivery', 'Our two-man team delivery service is here to provide you with an exceptional level of service and care for your deliveries. With our dynamic duo, we ensure that your items are handled with utmost professionalism, efficiency, and attention to detail. Whether it\'s delicate furniture, heavy equipment, or any other valuable goods, our expert team will handle it with precision and expertise. From loading to unloading, our two-man team works seamlessly to ensure the safe and secure transport of your items. With double the manpower, we provide an extra level of assistance, making your delivery experience smooth and hassle-free. Trust in our two-man team delivery service for a reliable, efficient, and personalized solution for all your delivery needs.', '2024-11-26 11:44:52', '2024-11-26 11:44:52');

-- --------------------------------------------------------

--
-- Table structure for table `settings`
--

CREATE TABLE `settings` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `system_name` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `email` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `email1` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `phone` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `phone1` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `address` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `opening_hr` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `facebook` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `twitter` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `linkedin` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `instagram` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `youtube` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `tiktok` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `google_map` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `favicon` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `logo` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `loader` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `footer_gateway_img` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `bg_image` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `breadcrumb` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `image1` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `image2` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `image3` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `image4` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `image5` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `image6` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `is_section1` tinyint(4) DEFAULT 1,
  `is_section2` tinyint(4) DEFAULT 1,
  `is_section3` tinyint(4) DEFAULT 1,
  `is_section4` tinyint(4) DEFAULT 1,
  `is_section5` tinyint(4) DEFAULT 1,
  `is_section6` tinyint(4) DEFAULT 1,
  `is_section7` tinyint(4) DEFAULT 1,
  `is_section8` tinyint(4) DEFAULT 1,
  `title1` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `title2` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `title3` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `title4` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `title5` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `title6` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `title7` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `title8` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `category1` int(11) DEFAULT NULL,
  `category2` int(11) DEFAULT NULL,
  `category3` int(11) DEFAULT NULL,
  `category4` int(11) DEFAULT NULL,
  `category5` int(11) DEFAULT NULL,
  `category6` int(11) DEFAULT NULL,
  `category7` int(11) DEFAULT NULL,
  `category8` int(11) DEFAULT NULL,
  `meta_author` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `meta_title` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `meta_keywords` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `meta_description` longtext COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `info1` longtext COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `info2` longtext COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `info3` longtext COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `info4` longtext COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `info5` longtext COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `info6` longtext COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `info7` longtext COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `info8` longtext COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `mail_transport` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `mail_host` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `mail_port` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `mail_username` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `mail_password` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `mail_encryption` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `mail_from` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `mail_from_name` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `smtp_check` tinyint(4) DEFAULT 1,
  `to_email1` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `to_email2` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `to_email3` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `to_email4` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `recaptcha_site_key` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `recaptcha_secret_key` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `is_recaptcha` tinyint(4) NOT NULL DEFAULT 0,
  `facebook_client_id` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `facebook_client_secret` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `facebook_redirect` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `is_facebook` tinyint(4) DEFAULT 1,
  `google_client_id` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `google_client_secret` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `google_redirect` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `is_google` tinyint(4) NOT NULL DEFAULT 0,
  `google_analytic_id` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `facebook_analytic_id` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `paypal_app_id` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `paypal_client_id` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `paypal_secrey_id` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `paypal_mode` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `stripe_key` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `stripe_secret` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `stripe_mode` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `esewa_merchant_id` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `esewa_secret_key` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `esewa_service_url` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `khalti_public_key` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `khalti_secret_key` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `khalti_merchant_id` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `khalti_base_url` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `custom_css` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `custom_js_header` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `custom_js_body` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `custom_js_footer` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `custom_html_header` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `custom_html_body` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `custom_html_footer` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `settings`
--

INSERT INTO `settings` (`id`, `system_name`, `email`, `email1`, `phone`, `phone1`, `address`, `opening_hr`, `facebook`, `twitter`, `linkedin`, `instagram`, `youtube`, `tiktok`, `google_map`, `favicon`, `logo`, `loader`, `footer_gateway_img`, `bg_image`, `breadcrumb`, `image1`, `image2`, `image3`, `image4`, `image5`, `image6`, `is_section1`, `is_section2`, `is_section3`, `is_section4`, `is_section5`, `is_section6`, `is_section7`, `is_section8`, `title1`, `title2`, `title3`, `title4`, `title5`, `title6`, `title7`, `title8`, `category1`, `category2`, `category3`, `category4`, `category5`, `category6`, `category7`, `category8`, `meta_author`, `meta_title`, `meta_keywords`, `meta_description`, `info1`, `info2`, `info3`, `info4`, `info5`, `info6`, `info7`, `info8`, `mail_transport`, `mail_host`, `mail_port`, `mail_username`, `mail_password`, `mail_encryption`, `mail_from`, `mail_from_name`, `smtp_check`, `to_email1`, `to_email2`, `to_email3`, `to_email4`, `recaptcha_site_key`, `recaptcha_secret_key`, `is_recaptcha`, `facebook_client_id`, `facebook_client_secret`, `facebook_redirect`, `is_facebook`, `google_client_id`, `google_client_secret`, `google_redirect`, `is_google`, `google_analytic_id`, `facebook_analytic_id`, `paypal_app_id`, `paypal_client_id`, `paypal_secrey_id`, `paypal_mode`, `stripe_key`, `stripe_secret`, `stripe_mode`, `esewa_merchant_id`, `esewa_secret_key`, `esewa_service_url`, `khalti_public_key`, `khalti_secret_key`, `khalti_merchant_id`, `khalti_base_url`, `custom_css`, `custom_js_header`, `custom_js_body`, `custom_js_footer`, `custom_html_header`, `custom_html_body`, `custom_html_footer`, `created_at`, `updated_at`) VALUES
(1, 'Same Days Courier', 'transport@same-daycourier.com', 'accounts@same-daycourier.com', '(0330) 043 0093', '(0330) 043 2793', 'Pembroke House 8 St Christophers Pl Farnborough GU14 0NH', '(0330) 043 8103', 'https://www.facebook.com/SameDayCourierEuropeLtd', NULL, 'https://www.linkedin.com/company/same-day-courier-europe-ltd', 'https://www.instagram.com/sameday.courier/', NULL, NULL, 'https://www.google.com/maps/embed?pb=!1m14!1m8!1m3!1d79841.98416642843!2d-0.767968!3d51.291583!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x48742b6a2db17f73%3A0x89c00da665ac1691!2sFarnborough%20Airport!5e0!3m2!1sen!2sus!4v1732720600365!5m2!1sen!2sus', '1732562206logo.png', '1732562206logo.png', NULL, NULL, NULL, '1732652485banner.jpg', '1732562206abt1.jpg', '1732562262paraservice.jpg', '1732562488abt.jpg', '1733160703about image 1.jpg', '1733160703about image 22.jpg', '1733160703about image 3.jpg', 1, 1, 1, 1, 1, 1, 1, 1, 'What We Do', 'Same Day Courier', 'WHY CHOOSE', 'OUR TRANSPORT SERVICES', 'Subscribe to Our Newsletter', 'Reviews', 'Title 7', 'Title 8', 1, 2, 3, 4, 5, 6, 7, 8, 'Same Day Courier Europe Ltd', 'Same Days Dedicated Transport Services | UK & Europe Logistics', 'same day transport, UK transport services, European transport, dedicated transport, HIAB crane delivery, temperature-controlled transport, hazardous freight, AOG logistics, delivery services, multi-drop delivery, 24/7 transport', 'We offer same day, dedicated transport and delivery services across the UK & Europe. Specializing in temperature-controlled, hazardous freight, and AOG logistics. 24/7 availability, competitive rates, and fast collection within the hour.', '<h1 class=\"hidden-xs\" style=\"font-size: 40px!important;color: #000!important;margin-top: 10px;\"> Fully Dedicated Transport & Delivery Solutions <span style=\"color:#1470AF!important;\"> For A Wide Range Of Industries </span></h1>		\r\n\r\n		<h1 class=\"visible-xs\" style=\"font-size: 21px!important;color: #000!important;margin-top: 0px;\"> Fully Dedicated Transport & Delivery Solutions <span style=\"color:#1470AF!important;\"> For A Wide Range Of Industries </span></h1>\r\n\r\n		<p style=\"color:#000!important;\">\r\n			A fully dedicated transportation and delivery service provider operating all throughout the UK and Europe. Our aim is to provide simple, cost effective and reliable solutions to any type of logistical concern that you may come across in your business or industry.\r\n		</p>\r\n		<p style=\"color:#000!important;\">\r\n			We operate with an extremely reliable transport network, with access to thousands of vehicles on a daily basis including anything from small vans through to lorries of all sizes and capacities as well as specialist vehicles such as HIAB, Cranes, Moffetts and Flatbeds.\r\n		</p>\r\n\r\n		<p style=\"color:#1470AF!important;\">\r\n			Set Up A Trading Account Today\r\n		</p>\r\n\r\n		<p style=\"color:#000!important;\">\r\n			Complete all the requested details below and one of our transport team will be in touch very shortly.\r\n		</p>', '<h2 style=\"color:#1470AF;\">A Fully Dedicated Transport Service Provider.</h2>\r\n            <hr style=\"border-bottom: 1px solid #000; width: 25%;margin-top:0px;\" align=\"left\">\r\n            <p style=\"text-align: justify;margin-top:-7px!important;\">\r\n                We provide a fully dedicated vehicle and driver for your consignment only. After the collection, all consignments, no matter what type of service you choose, is collected and delivered direct to the respective consignee via the most efficient routes and without any unscheduled stops.\r\n            </p>\r\n\r\n            <p style=\"text-align: justify;margin-top:-7px!important;\">\r\n                We are part of a huge transport network with access to thousands of vehicles on a daily basis including weekends. This allows us to collect goods as quickly as within an hour of booking confirmation (vans only) from anywhere in the country and deliver them at the fastest road transit times.\r\n            </p>\r\n\r\n            <p style=\"text-align: justify;margin-top:-7px!important;\">\r\n                We are therefore perfectly suited to carry out any urgent and time sensitive consignments.\r\n            </p>', '<h2 style=\"color:#1470AF;\">We Find Transport & Delivery Solutions For You.</h2>\r\n            <hr style=\"border-bottom: 1px solid #000; width: 25%;margin-top:0px;\" align=\"left\">\r\n            <p style=\"text-align: justify;margin-top:-7px!important;\">\r\n                Whatever your transportation and delivery requirements are we aim to find the right solution for you using our vast network of vehicles, drivers and experienced transport team.\r\n            </p>\r\n\r\n            <p style=\"text-align: justify;margin-top:-7px!important;\">\r\n                Our aim is to make all your logistical needs simple by catering for and providing a wide range of services including, Same Day Delivery, Dedicated European Transport, Temperature Controlled Vehicles, AOG Situations, Hazardous Freight, FORS Transport as well as providing specialist vehicles such as Flatbeds, Hiabs and Moffetts. \r\n            </p>', '<h2 style=\"color:#1470AF;\">Delivery Solutions To Match Your Demands.</h2>\r\n            <hr style=\"border-bottom: 1px solid #000; width: 25%;margin-top:0px;\" align=\"left\">\r\n            <p style=\"text-align: justify;margin-top:-7px!important;\">\r\n                We understand that running a business can be a fluid situation from hour-to-hour and day-to-day. Therefore, we have a wide range of delivery solutions to match your specific needs including Timed Deliveries, Multi Drops, Vehicle & Driver Day Hires and 2-Man Delivery Crew.\r\n            </p>\r\n\r\n            <p style=\"text-align: justify;margin-top:-7px!important;\">\r\n                No matter what your industry, our team of experts will be on hand to answer all your queries and advise the best possible solution for your consignment.\r\n            </p>', 'At Same Days Courier Europe Ltd, we offer a wide range of vehicles, from small vans to large lorries of various capacities. With our versatile fleet, we can tailor transport solutions to meet your specific needs. Whether it\'s a small delivery or a large logistics project, we are committed to providing the right vehicle for the job.', 'For any consignments with on site restrictions, or too heavy, wide or generally considered unsuitable for delivery on our standard vehicles, we can offer specilist vehicles listed below. Please get in touch with us to discuss your requirements and a member of our transport team will be more than happy to advise the best option for you.', '<h2 style=\"text-align: center;\"> Fully Dedicated Transport &amp; Delivery <b style=\"color: #1470AF;\">  Solutions For A Wide Range Of Industries.</b></h2>\r\n <p>A fully dedicated transportation and delivery service provider operating all throughout the UK and Europe. Our aim is to provide simple, cost effective and reliable solutions to any type of logistical concern that you may come across in your business or industry. We operate with an extremely reliable transport network, with access to thousands of vehicles on a daily basis including anything from small vans through to lorries of all sizes and capacities as well as specialist vehicles such as HIAB, Cranes, Moffetts and Flatbeds.</p>', '<h3 class=\"hidden-xs\" style=\"font-size:46px;color: #1470AF;margin-left: 10%;\"><b>Same Day Courier</b></h3>\r\n		<h3 class=\"visible-xs\" style=\"font-size:26px;color: #1470AF;text-align: center;\"><b>Same Day Courier</b></h3>\r\n		<h3 class=\"hidden-xs\" style=\"font-size:40px;color: #fff;margin-top: -2px;margin-left: 10%;\"> A fully dedicated transport network with thousands of vehicles available daily throughout UK. </h3>\r\n		<h3 class=\"visible-xs\" style=\"font-size:24px;color: #fff;margin-top: -2px;text-align: center;\"> A fully dedicated transport network with thousands of vehicles available daily throughout UK. </h3>', 'smtp', 'smtp.gmail.com', '587', 'ezbooking43@gmail.com', 'ckaj oaea yjjp pame', 'tls', 'ezbooking43@gmail.com', 'Same Day Courier Europe Ltd', 1, 'test@gmail.com', 'test1@gmail.com', 'test3@gmail.com', 'test4@gmail.com', 'your_site_key', 'your_secret_key', 0, 'your_facebook_client_id', 'your_facebook_client_secret', 'your_facebook_redirect_url', 0, 'your_google_client_id', 'your_google_client_secret', 'your_google_redirect_url', 0, 'your_google_analytic_id', 'your_facebook_analytic_id', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', NULL, '2024-12-02 13:20:53');

-- --------------------------------------------------------

--
-- Table structure for table `subscribers`
--

CREATE TABLE `subscribers` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `status` tinyint(4) NOT NULL DEFAULT 1,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `subscribers`
--

INSERT INTO `subscribers` (`id`, `name`, `email`, `status`, `created_at`, `updated_at`) VALUES
(10, NULL, 'boharas371@gmail.com', 1, '2024-11-26 10:31:49', '2024-11-26 10:31:49');

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

-- --------------------------------------------------------

--
-- Table structure for table `why_chooses`
--

CREATE TABLE `why_chooses` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `display_on` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `slug` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `image` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `font_icon` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `description` longtext COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `excerpt` longtext COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `feature_image` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `order_level` int(11) NOT NULL DEFAULT 0,
  `status` tinyint(4) NOT NULL DEFAULT 1,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `why_chooses`
--

INSERT INTO `why_chooses` (`id`, `display_on`, `name`, `slug`, `image`, `font_icon`, `description`, `excerpt`, `feature_image`, `order_level`, `status`, `created_at`, `updated_at`) VALUES
(6, 'Home Page', 'Dedicated Service', NULL, '1732568457dedicated-service.png', NULL, '', 'Fully dedicated to your load only, which ensures they are delivered safely, securely & quickly.', NULL, 1, 1, '2024-11-25 15:15:57', '2024-11-25 15:15:57'),
(7, 'Home Page', 'Collect Within The Hour', NULL, '1732568511collect-within-the-hour.png', NULL, '', 'We aim to have a vehicle at collection within an hour of booking confirmation.', NULL, 2, 1, '2024-11-25 15:16:51', '2024-11-25 15:16:51'),
(8, 'Home Page', 'Tracked Vehicles', NULL, '1732568548tracked-vehicles.png', '3', '', 'Point to point tracking and proof of delivery via email on completion of all consignments.', NULL, 3, 1, '2024-11-25 15:17:28', '2024-11-25 15:17:28'),
(9, 'Home Page', 'Bespoke Service', NULL, '1732568576bespoke-service.png', NULL, '', 'Whatever and whenever your requirements are, we always aim to go the extra mile.', NULL, 4, 1, '2024-11-25 15:17:56', '2024-11-25 15:17:56'),
(10, 'Home Page', 'Competitive Rates', NULL, '1732568614Untitled-design.png', NULL, '', 'We aim to provide the best possible service at the most competitive rates.', NULL, 5, 1, '2024-11-25 15:18:34', '2024-11-25 15:18:34'),
(11, 'Home Page', 'Large Fleet', NULL, '1732568786Large-fleet.png', NULL, '', 'A huge and  reliable transport network which allows us access to thousands of vehicles on a daily basis.', NULL, 6, 1, '2024-11-25 15:21:26', '2024-11-25 15:21:26'),
(12, 'Home Page', 'Nationwide Service', NULL, '1732568828nationwide-service.png', NULL, '', 'We can collect and deliver from anywhere in the UK and Europe.', NULL, 7, 1, '2024-11-25 15:22:08', '2024-11-25 15:22:08'),
(13, 'Home Page', '24/7 Service', NULL, '1732568873Service24.png', NULL, '', 'We collect and deliver anytime during the day and through the night.', NULL, 8, 1, '2024-11-25 15:22:53', '2024-11-25 15:22:53'),
(14, 'Default', 'Safe & Secure', NULL, '1732570127Safe-Secure.png', NULL, '', 'The van and driver will be dedicated to your load only, which will also be fully secured during transit.', NULL, 9, 1, '2024-11-25 15:43:47', '2024-11-25 15:43:47'),
(15, 'Default', 'Complete Updates', NULL, '1732570181Complete Updates.png', NULL, '', 'We monitor all our consignments throughout and updates are sent after pick up and delivery', NULL, 10, 1, '2024-11-25 15:44:41', '2024-11-25 15:44:41'),
(16, 'Default', 'Fully Insured', NULL, '1732570218Fully Insuredserv.png', NULL, '', 'All your loads are fully insured and our goods in transit insurance cover goes up to £30,000.', NULL, 11, 1, '2024-11-25 15:45:18', '2024-11-25 15:45:18'),
(17, 'Default', 'EORI Number', NULL, NULL, NULL, '', 'A valid Economic Operators Registration and Identification number (EORI number) is required to move goods between the UK & EU.', NULL, 12, 1, '2024-11-25 15:48:14', '2024-11-25 15:48:14'),
(18, 'Default', 'Incoterms', NULL, NULL, NULL, '', 'A vital first step to ensure both importer and exporter are clear on who is responsible for customs, insurance, transport and other charges.', NULL, 13, 1, '2024-11-25 15:48:34', '2024-11-25 15:48:34'),
(19, 'Default', 'Commodity Codes', NULL, NULL, NULL, '', 'A commodity code describes a specific product when importing or exporting goods and is required on any customs declarations.', NULL, 14, 1, '2024-11-25 15:48:52', '2024-11-25 15:48:52'),
(20, 'Default', 'Validate UK VAT', NULL, NULL, NULL, '', 'Check that your UK VAT registration number is valid, the name and address of the business and the number it is registered to.', NULL, 15, 1, '2024-11-25 15:49:08', '2024-11-25 15:49:08'),
(21, 'Default', 'Validate EU VAT', NULL, NULL, NULL, '', 'Verify the validity of a VAT number issued by any EU member state.', NULL, 15, 1, '2024-11-25 15:49:21', '2024-11-25 15:49:21'),
(22, 'Default', 'Commercial Invoice', NULL, NULL, NULL, '', 'This is required with every shipment and includes vital details such as value, EORIs, incoterms, dimensions and weight of goods, country of origin and more.', NULL, 16, 1, '2024-11-25 15:49:35', '2024-11-25 15:49:35'),
(23, 'Default', 'Fully Dedicated', NULL, '1732570595Fully Dedicated.png', NULL, '', 'All consignments are dedicated to your load only and delivered direct/ASAP after collection.', NULL, 17, 1, '2024-11-25 15:51:35', '2024-11-25 15:51:35'),
(24, 'Default', 'Nationwide Service', NULL, '1732570623Nationwide Service.png', NULL, '', 'We can collect and deliver from anywhere in the UK and Europe.', NULL, 18, 1, '2024-11-25 15:52:03', '2024-11-25 15:52:03'),
(25, 'Default', 'Multi Temp Vans & Lorries', NULL, '1732570665Multi Temp Vans lorries.png', NULL, '', 'We have a large fleet of vehicles that are capable of moving goods between -25 to +25 degrees celsius.', NULL, 19, 1, '2024-11-25 15:52:45', '2024-11-25 15:52:45'),
(26, 'Default', 'Complete Updates', NULL, '1732570702Complete Updates.png', NULL, '', 'We monitor all our consignments throughout and updates are sent after pick up and delivery.', NULL, 20, 1, '2024-11-25 15:53:22', '2024-11-25 15:53:22'),
(27, 'Default', '100% Compliant', NULL, '1732570763100-Compliant.png', NULL, '', 'Fully compliant hazardous freight service throughout UK and Europe with fully certified ADR drivers.', NULL, 21, 1, '2024-11-25 15:54:23', '2024-11-25 15:54:23'),
(28, 'Default', 'Delivered Direct', NULL, '1732570876Delivered Direct.png', NULL, '', 'After collection all consignments are delivered direct with no unscheduled stops.', NULL, 22, 1, '2024-11-25 15:56:16', '2024-12-02 10:06:51'),
(29, 'Industry Page', 'Retail & E-Commerce', 'retail-ecommerce', '1733155043retail-ecommerce.png', NULL, '<p>Introducing our specialized dedicated transport service designed specifically for the retail and e-commerce industry. At Same Day Courier, we understand the critical importance of efficient and timely deliveries in this fast-paced sector.&nbsp;</p><p><br></p><p>Our comprehensive transportation solutions cater to the unique needs of retail and e-commerce businesses, ensuring seamless logistics and customer satisfaction. With our dedicated transport service, you can rely on a fleet of modern vehicles equipped with the latest technology for secure and reliable transportation.&nbsp;</p><p><br></p><p>Our skilled drivers are trained to handle sensitive retail products and understand the importance of handling goods with care. We offer flexible scheduling options, allowing you to meet your customers\' demands and optimize your supply chain.&nbsp;</p><p><br></p><p>Our advanced tracking system provides real-time visibility into your shipments, empowering you with up-to-date information on their whereabouts. We prioritize prompt and accurate deliveries, ensuring your products reach their destinations on time, every time.&nbsp;</p><p><br></p><p>As your trusted partner in the retail and e-commerce industry, we are committed to delivering exceptional customer service and exceeding your expectations. Let us handle your transport needs, so you can focus on growing your business and providing an exceptional experience to your customers.&nbsp;</p><p><br></p><p>Contact us today to discuss your specific requirements and discover how our dedicated transport service can elevate your retail and e-commerce operations.</p>', 'Streamline Your Retail & E-Commerce Operations With Our Dedicated Transport Solutions.', '1733155043retail-ecommerce2.jpg', 23, 1, '2024-12-02 10:12:23', '2024-12-02 10:12:23'),
(30, 'Industry Page', 'Printing & Advertising', 'printing', '1733155651Printing  Advertising.png', NULL, '<p>Introducing our specialized dedicated transport service tailored specifically for the printing and marketing industry. At Same Day Courier, we recognize the unique requirements and time-sensitive nature of this dynamic sector.&nbsp;</p><p><span style=\"background-color: var(--bs-offcanvas-bg); font-weight: var(--bs-body-font-weight); text-align: var(--bs-body-text-align);\">Our comprehensive transportation solutions are designed to ensure the smooth and efficient movement of your printed materials, marketing collateral, and promotional items.&nbsp;</span></p><p><br></p><p>With our dedicated transport service, you can rely on a fleet of well-equipped vehicles that are specifically designed to handle delicate and valuable items, ensuring their safe and secure transportation. Our experienced drivers understand the importance of handling printing and marketing materials with care, maintaining their quality and integrity throughout the journey.&nbsp;</p><p><br></p><p>We offer flexible scheduling options, allowing you to meet your tight deadlines and maintain your marketing campaigns\' momentum. Our advanced tracking system provides real-time updates, enabling you to monitor the progress of your shipments and maintain control over your logistics.&nbsp;</p><p><br></p><p>As your trusted partner in the printing and marketing industry, we are committed to delivering exceptional customer service and exceeding your expectations. Let us handle the transportation of your printed materials, promotional items, and marketing collateral, so you can focus on creating impactful campaigns and growing your business.&nbsp;</p><p><br></p><p>Contact us today to discuss your specific requirements and discover how our dedicated transport service can streamline your printing and marketing operations.</p>', 'Seamless Transport Solutions for the Printing and Marketing Industry with Our Dedicated Services.', '1733155651Printing  Advertising 1.png', 24, 1, '2024-12-02 10:22:31', '2024-12-02 10:22:49'),
(31, 'Industry Page', 'Aerospace & Aviation', 'aerospace', '1733155754Aerospace  Aviation.png', NULL, '<p>Introducing our specialized dedicated transport service exclusively designed for the aerospace and aviation industry. At Same Day Courier, we understand the criticality and precision required in transporting aerospace components, equipment, and materials.&nbsp;</p><p><br></p><p>Our comprehensive transportation solutions are tailored to meet the unique needs and stringent regulations of this industry. With our dedicated transport service, you can rely on a fleet of state-of-the-art vehicles equipped with advanced security systems to ensure the safe and secure transportation of aerospace goods.&nbsp;</p><p><br></p><p>Our highly trained drivers are well-versed in handling sensitive and high-value aerospace items, adhering to strict protocols and procedures. We understand the time-sensitive nature of the aerospace industry and offer flexible scheduling options to meet your demanding timelines.&nbsp;</p><p><br></p><p>Our advanced tracking system provides real-time visibility, enabling you to monitor the progress of your shipments and maintain control over your supply chain.&nbsp;</p><p><br></p><p>As a trusted partner in the aerospace and aviation industry, we are committed to delivering exceptional service, ensuring that your aerospace components and materials reach their destinations on time and in impeccable condition. Let us take care of your dedicated transport needs, so you can focus on advancing aerospace innovation and maintaining operational excellence.&nbsp;</p><p><br></p><p>Contact us today to discuss your specific requirements and experience the reliability and expertise of our dedicated transport service for the aerospace industry.</p>', 'Elevate Your Aerospace and Aviation Operations with Our Dedicated Transport Solutions', '1733155754Aerospace Aviation11.png', 24, 1, '2024-12-02 10:24:14', '2024-12-02 10:24:14'),
(32, 'Industry Page', 'Pharmaceutical', 'pharmaceutical', '1733155870Pharmaceutical.png', NULL, '<p>Introducing our specialized dedicated transport service exclusively designed for the pharmaceutical industry. At Same Day Courier, we understand the critical importance of maintaining the integrity, safety, and timely delivery of pharmaceutical products.&nbsp;</p><p><br></p><p>Our comprehensive transportation solutions are tailored to meet the unique requirements and regulations of this highly regulated sector. With our dedicated transport service, you can trust in a fleet of specialized vehicles equipped with temperature-controlled environments and advanced security systems to ensure the safe transportation of pharmaceutical goods.&nbsp;</p><p><br></p><p>Our drivers undergo rigorous training to handle sensitive pharmaceutical products, adhering to strict protocols and industry best practices. We prioritize the utmost care and compliance throughout the transportation process to safeguard the efficacy and quality of your pharmaceutical items.&nbsp;</p><p><br></p><p>Our advanced tracking system provides real-time visibility, allowing you to monitor the location and condition of your shipments, ensuring transparency and peace of mind.&nbsp;</p><p><br></p><p>As your trusted partner in the pharmaceutical industry, we are committed to delivering exceptional service and exceeding your expectations. Let us handle your dedicated transport needs, so you can focus on your core mission of providing vital healthcare products to patients around the world.&nbsp;</p><p><br></p><p>Contact us today to discuss your specific requirements and experience the reliability and expertise of our dedicated transport service for the pharmaceutical industry.</p>', 'Experience Reliable and Secure Transport Solutions for the Pharmaceutical Industry.', '1733155870Pharmaceuticalq1.png', 25, 1, '2024-12-02 10:26:10', '2024-12-02 10:26:10'),
(33, 'Industry Page', 'Events & Exhibitions', 'events-exhibitions', '1733155940Events  Exhibitions.png', NULL, '<p>Introducing our specialized dedicated transport service designed exclusively for the events and exhibition industry. At Same Day Courier, we understand the fast-paced and time-sensitive nature of this dynamic sector.&nbsp;</p><p><br></p><p>Our comprehensive transportation solutions are tailored to meet the unique demands of event organizers, exhibitors, and suppliers. With our dedicated transport service, you can trust in a fleet of well-maintained vehicles equipped with features to ensure the safe and efficient transport of event materials, exhibition displays, and promotional items.&nbsp;</p><p><br></p><p>Our experienced drivers are trained to handle delicate and valuable items, ensuring their proper care and handling throughout the journey. We offer flexible scheduling options to accommodate the specific timelines of events and exhibitions, allowing you to meet critical setup and teardown deadlines.&nbsp;</p><p><br></p><p>Our advanced tracking system provides real-time updates, enabling you to monitor the progress of your shipments and maintain control over your logistics.&nbsp;</p><p><br></p><p>As your trusted partner in the events and exhibition industry, we are dedicated to delivering exceptional customer service and exceeding your expectations. Let us handle the transportation of your event materials and exhibition displays, so you can focus on creating memorable experiences for your attendees.&nbsp;</p><p><br></p><p>Contact us today to discuss your specific requirements and discover how our dedicated transport service can streamline your event logistics and contribute to the success of your next event or exhibition.</p>', 'Seamless Transport Solutions For Your Events and Exhibitions.', '1733155940events-exhibitions.png', 26, 1, '2024-12-02 10:27:20', '2024-12-02 10:27:20'),
(34, 'Industry Page', 'Transport & Haulage', 'transport-haulage', '1733156020Transport & Haulage.png', NULL, '<p>Introducing our premium dedicated transport service designed exclusively for the transport and haulage industry. At Same Day Courier, we understand the unique demands and requirements of this sector, and our tailored solutions are crafted to meet your specific needs.&nbsp;</p><p><br></p><p>With our dedicated transport service, you can expect a seamless and reliable experience from start to finish. We provide a fleet of well-maintained vehicles, manned by skilled and experienced drivers who prioritize safety and efficiency. Whether you require transportation for goods, materials, or equipment, we ensure timely and secure deliveries to your desired destinations.&nbsp;</p><p><br></p><p>Our advanced tracking system allows real-time monitoring, providing you with complete visibility and peace of mind throughout the entire transportation process.&nbsp;</p><p><br></p><p>With our dedication to exceptional customer service and a commitment to excellence, we strive to be your trusted partner for all your transport and haulage needs.&nbsp;</p><p><br></p><p>Experience the difference with our dedicated transport service and let us take care of your transportation requirements, allowing you to focus on your core business operations.&nbsp;</p><p><br></p><p>Contact us today to discuss your specific needs and let us provide you with a tailored solution that exceeds your expectations.</p>', 'Reliable Transport & Haulage Solutions: Your Freight, Our Priority.', '1733156020transport-haulage111.png', 27, 1, '2024-12-02 10:28:40', '2024-12-02 10:28:40'),
(35, 'Industry Page', 'Film & Productions', 'film-production', '1733156112Film & Productions.png', NULL, '<p>Introducing our specialized dedicated transport service designed exclusively for the film and production industry. At Same Day Courier, we understand the unique logistical challenges and time-sensitive nature of this dynamic sector.&nbsp;</p><p><br></p><p>Our comprehensive transportation solutions are tailored to meet the specific needs of filmmakers, production crews, and equipment suppliers. With our dedicated transport service, you can rely on a fleet of specialized vehicles equipped to handle the transportation of film equipment, props, sets, and production materials.&nbsp;</p><p><br></p><p>Our experienced drivers are well-versed in the intricacies of film production logistics and prioritize safety and efficiency throughout the transportation process. We offer flexible scheduling options to accommodate the demanding timelines of film shoots, ensuring timely deliveries to set locations.&nbsp;</p><p><br></p><p>Our advanced tracking system provides real-time updates, enabling you to monitor the progress of your shipments and maintain control over your logistics.&nbsp;</p><p><br></p><p>As your trusted partner in the film and production industry, we are committed to delivering exceptional service and exceeding your expectations. Let us handle the transportation of your film equipment and production materials, so you can focus on bringing your creative vision to life.&nbsp;</p><p><br></p><p>Contact us today to discuss your specific requirements and discover how our dedicated transport service can streamline your film production logistics and contribute to the success of your next project.</p>', 'Seamless Transport Solutions for the Film and Production Industry.', '1733156112film-production11.jpg', 28, 1, '2024-12-02 10:30:12', '2024-12-02 10:30:12'),
(36, 'Industry Page', 'Construction', 'construction', '1733156176Construction11.png', NULL, '<p>Introducing our specialized dedicated transport service exclusively tailored for the construction and building industry. At Same Day Courier, we understand the unique challenges and time-sensitive nature of construction projects.&nbsp;</p><p><br></p><p>Our comprehensive transportation solutions are designed to meet your specific requirements, ensuring the seamless movement of equipment, materials, and supplies to and from your sites.&nbsp;</p><p><br></p><p>With our dedicated transport service, you can rely on a fleet of well-maintained vehicles specifically equipped to handle the demands of construction logistics. Our experienced drivers are trained in navigating construction sites and are committed to safety and efficiency.&nbsp;</p><p><br></p><p>We prioritize timely deliveries, allowing you to meet project deadlines and keep operations running smoothly. Our advanced tracking system provides real-time updates, enabling you to monitor the progress of your shipments and maintain full control over your supply chain.&nbsp;</p><p><br></p><p>As a trusted partner in the construction industry, we are dedicated to delivering exceptional customer service and exceeding your expectations. Let us take care of your transportation needs, so you can focus on what you do best—building and completing successful construction projects.&nbsp;</p><p><br></p><p>Contact us today to discuss your specific requirements and discover how our dedicated transport service can benefit your construction and building business.</p>', 'Efficient and Reliable Transport Solutions for the Construction & Building Industry.', '1733156176construction123.png', 29, 1, '2024-12-02 10:31:16', '2024-12-02 10:31:16'),
(37, 'Industry Page', 'Manufacturing', 'manufacturing', '1733156235Manufacturing1.png', NULL, '<p>Introducing our specialized dedicated transport service designed exclusively for the manufacturing industry. At Same Day Courier, we understand the unique logistics challenges and time-sensitive nature of manufacturing operations.&nbsp;</p><p><br></p><p>Our comprehensive transportation solutions are tailored to meet the specific needs of manufacturers, ensuring efficient and reliable transport of goods, materials, and equipment. With our dedicated transport service, you can trust in a fleet of well-maintained vehicles equipped with the necessary features to handle the transportation of your manufacturing products.&nbsp;</p><p><br></p><p>Our experienced drivers are trained to handle various types of cargo, ensuring safe and secure deliveries to your desired destinations. We offer flexible scheduling options to accommodate your production timelines and minimize downtime. Our advanced tracking system provides real-time visibility, allowing you to monitor the progress of your shipments and optimize your supply chain.&nbsp;</p><p><br></p><p>As your trusted partner in the manufacturing industry, we are dedicated to delivering exceptional customer service and exceeding your expectations. Let us handle your transportation needs, so you can focus on your core manufacturing operations and meet your production targets.&nbsp;</p><p><br></p><p>Contact us today to discuss your specific requirements and discover how our dedicated transport service can streamline your manufacturing logistics and contribute to the success of your business.</p>', 'Streamline Your Manufacturing Operations with Our Dedicated Transport Solutions.', '1733156235manufacturing12.jpg', 30, 1, '2024-12-02 10:32:15', '2024-12-02 10:32:15');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `admins`
--
ALTER TABLE `admins`
  ADD PRIMARY KEY (`id`),
  ADD KEY `admins_role_id_index` (`role_id`);

--
-- Indexes for table `banners`
--
ALTER TABLE `banners`
  ADD PRIMARY KEY (`id`),
  ADD KEY `banners_status_index` (`status`),
  ADD KEY `banners_order_level_index` (`order_level`);

--
-- Indexes for table `delivery_promises`
--
ALTER TABLE `delivery_promises`
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
-- Indexes for table `fleets`
--
ALTER TABLE `fleets`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `galleries`
--
ALTER TABLE `galleries`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `menus`
--
ALTER TABLE `menus`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `migrations`
--
ALTER TABLE `migrations`
  ADD PRIMARY KEY (`id`);

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
-- Indexes for table `password_reset_tokens`
--
ALTER TABLE `password_reset_tokens`
  ADD PRIMARY KEY (`email`);

--
-- Indexes for table `permissions`
--
ALTER TABLE `permissions`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `permissions_role_id_unique` (`role_id`);

--
-- Indexes for table `personal_access_tokens`
--
ALTER TABLE `personal_access_tokens`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `personal_access_tokens_token_unique` (`token`),
  ADD KEY `personal_access_tokens_tokenable_type_tokenable_id_index` (`tokenable_type`,`tokenable_id`);

--
-- Indexes for table `reviews`
--
ALTER TABLE `reviews`
  ADD PRIMARY KEY (`id`),
  ADD KEY `reviews_status_index` (`status`),
  ADD KEY `reviews_order_level_index` (`order_level`);

--
-- Indexes for table `roles`
--
ALTER TABLE `roles`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `roles_name_unique` (`name`);

--
-- Indexes for table `services`
--
ALTER TABLE `services`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `services_slug_unique` (`slug`),
  ADD KEY `services_status_index` (`status`),
  ADD KEY `services_order_level_index` (`order_level`);

--
-- Indexes for table `settings`
--
ALTER TABLE `settings`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `subscribers`
--
ALTER TABLE `subscribers`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `subscribers_email_unique` (`email`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `users_email_unique` (`email`);

--
-- Indexes for table `why_chooses`
--
ALTER TABLE `why_chooses`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `admins`
--
ALTER TABLE `admins`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `banners`
--
ALTER TABLE `banners`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `delivery_promises`
--
ALTER TABLE `delivery_promises`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `failed_jobs`
--
ALTER TABLE `failed_jobs`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `faqs`
--
ALTER TABLE `faqs`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `fleets`
--
ALTER TABLE `fleets`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT for table `galleries`
--
ALTER TABLE `galleries`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `menus`
--
ALTER TABLE `menus`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=31;

--
-- AUTO_INCREMENT for table `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=21;

--
-- AUTO_INCREMENT for table `pages`
--
ALTER TABLE `pages`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `permissions`
--
ALTER TABLE `permissions`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `personal_access_tokens`
--
ALTER TABLE `personal_access_tokens`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `reviews`
--
ALTER TABLE `reviews`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT for table `roles`
--
ALTER TABLE `roles`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `services`
--
ALTER TABLE `services`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT for table `settings`
--
ALTER TABLE `settings`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `subscribers`
--
ALTER TABLE `subscribers`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `why_chooses`
--
ALTER TABLE `why_chooses`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=38;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `admins`
--
ALTER TABLE `admins`
  ADD CONSTRAINT `admins_role_id_foreign` FOREIGN KEY (`role_id`) REFERENCES `roles` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `permissions`
--
ALTER TABLE `permissions`
  ADD CONSTRAINT `permissions_role_id_foreign` FOREIGN KEY (`role_id`) REFERENCES `roles` (`id`) ON DELETE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
