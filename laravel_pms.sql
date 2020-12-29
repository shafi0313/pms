-- phpMyAdmin SQL Dump
-- version 5.0.2
-- https://www.phpmyadmin.net/
--
-- Host: localhost:3306
-- Generation Time: Dec 29, 2020 at 07:15 AM
-- Server version: 5.7.24
-- PHP Version: 7.4.7

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `laravel_pms`
--

-- --------------------------------------------------------

--
-- Table structure for table `appointments`
--

CREATE TABLE `appointments` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `patient_id` bigint(20) UNSIGNED NOT NULL,
  `doctor_id` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `p_status` int(11) NOT NULL DEFAULT '0',
  `t_status` int(11) NOT NULL DEFAULT '0',
  `a_status` int(191) NOT NULL DEFAULT '0',
  `date` date NOT NULL,
  `time` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `appointments`
--

INSERT INTO `appointments` (`id`, `patient_id`, `doctor_id`, `p_status`, `t_status`, `a_status`, `date`, `time`, `created_at`, `updated_at`) VALUES
(1, 11, '10', 1, 1, 0, '2020-12-08', '8AM to 10AM Sunday', '2020-12-08 05:00:14', '2020-12-08 05:14:32');

-- --------------------------------------------------------

--
-- Table structure for table `doctor_chambers`
--

CREATE TABLE `doctor_chambers` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `doctor_id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `address` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `phone` int(11) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `doctor_chambers`
--

INSERT INTO `doctor_chambers` (`id`, `doctor_id`, `name`, `address`, `phone`, `created_at`, `updated_at`) VALUES
(4, 1, 'Test 1', 'kuttfkufkgf', 1819284449, '2020-10-18 15:13:29', '2020-10-18 15:13:29'),
(5, 1, 'Prof. Dr. Md.Shahab Uddin', '‘Ismail Arcade’, Apt#3B, House#27, Road#14/A, Dhanmondi R/A, Dhaka- 1209.', 1819284449, '2020-10-18 15:42:23', '2020-10-18 15:42:23'),
(6, 9, 'Prof. Dr. Md.Shahab Uddin', '‘Ismail Arcade’, Apt#3B, House#27, Road#14/A, Dhanmondi R/A, Dhaka- 1209.', 1819284449, '2020-10-18 15:43:10', '2020-10-18 15:43:10');

-- --------------------------------------------------------

--
-- Table structure for table `doctor_specialists`
--

CREATE TABLE `doctor_specialists` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `specialist` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `specialist_id` int(11) NOT NULL DEFAULT '0',
  `doctor_id` int(11) DEFAULT NULL,
  `details` text COLLATE utf8mb4_unicode_ci,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `doctor_specialists`
--

INSERT INTO `doctor_specialists` (`id`, `specialist`, `specialist_id`, `doctor_id`, `details`, `created_at`, `updated_at`) VALUES
(1, 'MBBS', 0, NULL, NULL, '2020-09-04 03:32:36', '2020-09-04 03:32:36'),
(2, 'FCPS', 0, NULL, NULL, '2020-09-04 03:32:43', '2020-09-04 03:32:43'),
(3, 'FRCS', 0, NULL, NULL, '2020-09-04 03:32:52', '2020-09-04 03:32:52'),
(4, 'Dr. Hadiuzzaman', 1, 1, NULL, '2020-09-04 03:33:49', '2020-09-04 03:33:49'),
(11, 'Md Anwar Hossain', 2, 9, NULL, '2020-09-07 06:36:14', '2020-09-07 06:36:14'),
(12, 'Medicine', 0, NULL, NULL, '2020-09-13 10:43:12', '2020-09-13 10:43:12'),
(13, 'Eye Specialist & Surgeon', 0, NULL, 'MBBS, D.OPH, MS(Eye)', '2020-10-12 14:40:52', '2020-10-12 14:40:52'),
(14, 'Prof. Dr. Md.Shahab Uddin', 13, 10, NULL, '2020-10-12 14:43:14', '2020-10-12 14:43:14');

-- --------------------------------------------------------

--
-- Table structure for table `doctor_times`
--

CREATE TABLE `doctor_times` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `doctor_id` bigint(20) UNSIGNED NOT NULL,
  `chamber_id` int(11) NOT NULL DEFAULT '0',
  `day` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `time` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `doctor_times`
--

INSERT INTO `doctor_times` (`id`, `doctor_id`, `chamber_id`, `day`, `time`, `created_at`, `updated_at`) VALUES
(16, 10, 0, NULL, '8AM to 10AM Sunday', NULL, NULL),
(17, 11, 0, NULL, '7AM to 10AM Sunday', '2020-10-29 02:19:14', '2020-10-29 02:19:14'),
(18, 11, 0, NULL, '5PM to 9PM Monday', '2020-10-29 02:19:14', '2020-10-29 02:19:14');

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
  `failed_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `medical_tests`
--

CREATE TABLE `medical_tests` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `info` text COLLATE utf8mb4_unicode_ci,
  `amount` decimal(8,2) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `medical_tests`
--

INSERT INTO `medical_tests` (`id`, `name`, `info`, `amount`, `created_at`, `updated_at`) VALUES
(1, 'Boold Test', NULL, '100.00', '2020-09-09 07:52:57', '2020-09-09 07:52:57');

-- --------------------------------------------------------

--
-- Table structure for table `medicines`
--

CREATE TABLE `medicines` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `mg` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `type` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `medicine_group` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `company` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `price` varchar(222) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `info` text COLLATE utf8mb4_unicode_ci,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `medicines`
--

INSERT INTO `medicines` (`id`, `name`, `mg`, `type`, `medicine_group`, `company`, `price`, `info`, `created_at`, `updated_at`) VALUES
(1, 'Optimox E/D', '', '', '', 'Aristo Pharma', '0', '', '2020-10-06 18:00:00', '2020-10-06 18:00:00'),
(2, 'Optimox E/O', '', '', '', 'Aristo Pharma', '0', '', '2020-10-06 18:00:00', '2020-10-06 18:00:00'),
(3, 'Optimox XG E/D', '', '', '', 'Aristo Pharma', '0', '', '2020-10-06 18:00:00', '2020-10-06 18:00:00'),
(4, 'Besiflox E/D', '', '', '', 'Aristo Pharma', '0', '', '2020-10-06 18:00:00', '2020-10-06 18:00:00'),
(5, 'Fusithal V/D', '', '', '', 'Aristo Pharma', '0', '', '2020-10-06 18:00:00', '2020-10-06 18:00:00'),
(6, 'Ovel E/D', '', '', '', 'Aristo Pharma', '0', '', '2020-10-06 18:00:00', '2020-10-06 18:00:00'),
(7, 'Ovel Ts E/D', '', '', '', 'Aristo Pharma', '0', '', '2020-10-06 18:00:00', '2020-10-06 18:00:00'),
(8, 'Lomeflox E/D', '', '', '', 'Aristo Pharma', '0', '', '2020-10-06 18:00:00', '2020-10-06 18:00:00'),
(9, 'T-Mycin E/D', '', '', '', 'Aristo Pharma', '0', '', '2020-10-06 18:00:00', '2020-10-06 18:00:00'),
(10, 'T-Mycin E/O', '', '', '', 'Aristo Pharma', '0', '', '2020-10-06 18:00:00', '2020-10-06 18:00:00'),
(11, 'AZ E/D', '', '', '', 'Aristo Pharma', '0', '', '2020-10-06 18:00:00', '2020-10-06 18:00:00'),
(12, 'Aprocin E/D', '', '', '', 'Aristo Pharma', '0', '', '2020-10-06 18:00:00', '2020-10-06 18:00:00'),
(13, 'Aprocin E/O', '', '', '', 'Aristo Pharma', '0', '', '2020-10-06 18:00:00', '2020-10-06 18:00:00'),
(14, 'Drylief E/D', '', '', '', 'Aristo Pharma', '0', '', '2020-10-06 18:00:00', '2020-10-06 18:00:00'),
(15, 'Systear E/D', '', '', '', 'Aristo Pharma', '0', '', '2020-10-06 18:00:00', '2020-10-06 18:00:00'),
(16, 'Hypomer Gel', '', '', '', 'Aristo Pharma', '0', '', '2020-10-06 18:00:00', '2020-10-06 18:00:00'),
(17, 'Neotear E/D', '', '', '', 'Aristo Pharma', '0', '', '2020-10-06 18:00:00', '2020-10-06 18:00:00'),
(18, 'Optifusion E/D', '', '', '', 'Aristo Pharma', '0', '', '2020-10-06 18:00:00', '2020-10-06 18:00:00'),
(19, 'Hyloron E/D', '', '', '', 'Aristo Pharma', '0', '', '2020-10-06 18:00:00', '2020-10-06 18:00:00'),
(20, 'Protear E/D', '', '', '', 'Aristo Pharma', '0', '', '2020-10-06 18:00:00', '2020-10-06 18:00:00'),
(21, 'Cyporin E/D', '', '', '', 'Aristo Pharma', '0', '', '2020-10-06 18:00:00', '2020-10-06 18:00:00'),
(22, 'Liftear E/D', '', '', '', 'Aristo Pharma', '0', '', '2020-10-06 18:00:00', '2020-10-06 18:00:00'),
(23, 'Caftadin E/D', '', '', '', 'Aristo Pharma', '0', '', '2020-10-06 18:00:00', '2020-10-06 18:00:00'),
(24, 'Bepotas E/D', '', '', '', 'Aristo Pharma', '0', '', '2020-10-06 18:00:00', '2020-10-06 18:00:00'),
(25, 'Epinast E/D', '', '', '', 'Aristo Pharma', '0', '', '2020-10-06 18:00:00', '2020-10-06 18:00:00'),
(26, 'Olpadin E/D', '', '', '', 'Aristo Pharma', '0', '', '2020-10-06 18:00:00', '2020-10-06 18:00:00'),
(27, 'Olpadin Ds E/D', '', '', '', 'Aristo Pharma', '0', '', '2020-10-06 18:00:00', '2020-10-06 18:00:00'),
(28, 'Olpadin 7 E/D', '', '', '', 'Aristo Pharma', '0', '', '2020-10-06 18:00:00', '2020-10-06 18:00:00'),
(29, 'Stafen E/D', '', '', '', 'Aristo Pharma', '0', '', '2020-10-06 18:00:00', '2020-10-06 18:00:00'),
(30, 'Nazin E/D', '', '', '', 'Aristo Pharma', '0', '', '2020-10-06 18:00:00', '2020-10-06 18:00:00'),
(31, 'Neopred E/D', '', '', '', 'Aristo Pharma', '0', '', '2020-10-06 18:00:00', '2020-10-06 18:00:00'),
(32, 'Lotepred E/D', '', '', '', 'Aristo Pharma', '0', '', '2020-10-06 18:00:00', '2020-10-06 18:00:00'),
(33, 'Lotepred Gel', '', '', '', 'Aristo Pharma', '0', '', '2020-10-06 18:00:00', '2020-10-06 18:00:00'),
(34, 'Cortisol E/D', '', '', '', 'Aristo Pharma', '0', '', '2020-10-06 18:00:00', '2020-10-06 18:00:00'),
(35, 'AFM E/D', '', '', '', 'Aristo Pharma', '0', '', '2020-10-06 18:00:00', '2020-10-06 18:00:00'),
(36, 'Sonexa E/D', '', '', '', 'Aristo Pharma', '0', '', '2020-10-06 18:00:00', '2020-10-06 18:00:00'),
(37, 'Sonexa E/O', '', '', '', 'Aristo Pharma', '0', '', '2020-10-06 18:00:00', '2020-10-06 18:00:00'),
(38, 'Avatan E/D', '', '', '', 'Aristo Pharma', '0', '', '2020-10-06 18:00:00', '2020-10-06 18:00:00'),
(39, 'Taflan E/D', '', '', '', 'Aristo Pharma', '0', '', '2020-10-06 18:00:00', '2020-10-06 18:00:00'),
(40, 'Brinzopt E/D', '', '', '', 'Aristo Pharma', '0', '', '2020-10-06 18:00:00', '2020-10-06 18:00:00'),
(41, 'Zoladin E/D', '', '', '', 'Aristo Pharma', '0', '', '2020-10-06 18:00:00', '2020-10-06 18:00:00'),
(42, 'Cozopt E/D', '', '', '', 'Aristo Pharma', '0', '', '2020-10-06 18:00:00', '2020-10-06 18:00:00'),
(43, 'Combipres E/D', '', '', '', 'Aristo Pharma', '0', '', '2020-10-06 18:00:00', '2020-10-06 18:00:00'),
(44, 'Nevan E/D', '', '', '', 'Aristo Pharma', '0', '', '2020-10-06 18:00:00', '2020-10-06 18:00:00'),
(45, 'Nevan Ts E/D', '', '', '', 'Aristo Pharma', '0', '', '2020-10-06 18:00:00', '2020-10-06 18:00:00'),
(46, 'Xirom E/D', '', '', '', 'Aristo Pharma', '0', '', '2020-10-06 18:00:00', '2020-10-06 18:00:00'),
(47, 'Xoviral Eye Gel', '', '', '', 'Aristo Pharma', '0', '', '2020-10-06 18:00:00', '2020-10-06 18:00:00'),
(48, 'Acyvir E/O', '', '', '', 'Aristo Pharma', '0', '', '2020-10-06 18:00:00', '2020-10-06 18:00:00'),
(49, 'Fludin E/D', '', '', '', 'Aristo Pharma', '0', '', '2020-10-06 18:00:00', '2020-10-06 18:00:00'),
(50, 'N-Mycin E/D', '', '', '', 'Aristo Pharma', '0', '', '2020-10-06 18:00:00', '2020-10-06 18:00:00'),
(51, 'Aristen E/O', '', '', '', 'Aristo Pharma', '0', '', '2020-10-06 18:00:00', '2020-10-06 18:00:00'),
(52, 'Dexamox E/D', '', '', '', 'Aristo Pharma', '0', '', '2020-10-06 18:00:00', '2020-10-06 18:00:00'),
(53, 'Sonexa-C E/D', '', '', '', 'Aristo Pharma', '0', '', '2020-10-06 18:00:00', '2020-10-06 18:00:00'),
(54, 'Lotepred Plus E/D', '', '', '', 'Aristo Pharma', '0', '', '2020-10-06 18:00:00', '2020-10-06 18:00:00'),
(55, 'T-Mycin Plus E/D', '', '', '', 'Aristo Pharma', '0', '', '2020-10-06 18:00:00', '2020-10-06 18:00:00'),
(56, 'T-Mycin Plus E/O', '', '', '', 'Aristo Pharma', '0', '', '2020-10-06 18:00:00', '2020-10-06 18:00:00'),
(57, 'Gatison E/D', '', '', '', 'Aristo Pharma', '0', '', '2020-10-06 18:00:00', '2020-10-06 18:00:00'),
(58, 'Eye & Ear Drop', '', '', '', 'Aristo Pharma', '0', '', '2020-10-06 18:00:00', '2020-10-06 18:00:00'),
(59, 'AFM-T E/D', '', '', '', 'Aristo Pharma', '0', '', '2020-10-06 18:00:00', '2020-10-06 18:00:00'),
(60, 'AFM-Plus E/D', '', '', '', 'Aristo Pharma', '0', '', '2020-10-06 18:00:00', '2020-10-06 18:00:00'),
(61, 'I-Gold Cap.', '', '', '', 'Aristo Pharma', '0', '', '2020-10-06 18:00:00', '2020-10-06 18:00:00'),
(62, 'Phacovit E/D', '', '', '', 'Aristo Pharma', '0', '', '2020-10-06 18:00:00', '2020-10-06 18:00:00'),
(63, 'Tropicam E/D', '', '', '', 'Aristo Pharma', '0', '', '2020-10-06 18:00:00', '2020-10-06 18:00:00'),
(64, 'Tropicam E/D', '', '', '', 'Aristo Pharma', '0', '', '2020-10-06 18:00:00', '2020-10-06 18:00:00'),
(65, 'Trophen E/D', '', '', '', 'Aristo Pharma', '0', '', '2020-10-06 18:00:00', '2020-10-06 18:00:00'),
(66, 'Matropin E/D', '', '', '', 'Aristo Pharma', '0', '', '2020-10-06 18:00:00', '2020-10-06 18:00:00'),
(67, 'Procain E/D', '', '', '', 'Aristo Pharma', '0', '', '2020-10-06 18:00:00', '2020-10-06 18:00:00'),
(68, 'NCL E/D', '', '', '', 'Aristo Pharma', '0', '', '2020-10-06 18:00:00', '2020-10-06 18:00:00'),
(69, 'Moxibac E/D', '', '', '', 'Popular Pharmaceuticals Ltd.', '0', '', '2020-10-06 18:00:00', '2020-10-06 18:00:00'),
(70, 'Moxibac XG E/D', '', '', '', 'Popular Pharmaceuticals Ltd.', '0', '', '2020-10-06 18:00:00', '2020-10-06 18:00:00'),
(71, 'Besibac E/D', '', '', '', 'Popular Pharmaceuticals Ltd.', '0', '', '2020-10-06 18:00:00', '2020-10-06 18:00:00'),
(72, 'Levobac E/D', '', '', '', 'Popular Pharmaceuticals Ltd.', '0', '', '2020-10-06 18:00:00', '2020-10-06 18:00:00'),
(73, 'Levobac Ts E/D', '', '', '', 'Popular Pharmaceuticals Ltd.', '0', '', '2020-10-06 18:00:00', '2020-10-06 18:00:00'),
(74, 'Lomebac E/D', '', '', '', 'Popular Pharmaceuticals Ltd.', '0', '', '2020-10-06 18:00:00', '2020-10-06 18:00:00'),
(75, 'Tobrabac E/O', '', '', '', 'Popular Pharmaceuticals Ltd.', '0', '', '2020-10-06 18:00:00', '2020-10-06 18:00:00'),
(76, 'Zibac E/D', '', '', '', 'Popular Pharmaceuticals Ltd.', '0', '', '2020-10-06 18:00:00', '2020-10-06 18:00:00'),
(77, 'Civox E/D', '', '', '', 'Popular Pharmaceuticals Ltd.', '0', '', '2020-10-06 18:00:00', '2020-10-06 18:00:00'),
(78, 'Aquafresh E/D', '', '', '', 'Popular Pharmaceuticals Ltd.', '0', '', '2020-10-06 18:00:00', '2020-10-06 18:00:00'),
(79, 'Autotear E/D', '', '', '', 'Popular Pharmaceuticals Ltd.', '0', '', '2020-10-06 18:00:00', '2020-10-06 18:00:00'),
(80, 'Artear E/D', '', '', '', 'Popular Pharmaceuticals Ltd.', '0', '', '2020-10-06 18:00:00', '2020-10-06 18:00:00'),
(81, 'Aleadin E/D', '', '', '', 'Popular Pharmaceuticals Ltd.', '0', '', '2020-10-06 18:00:00', '2020-10-06 18:00:00'),
(82, 'Ocastin E/D', '', '', '', 'Popular Pharmaceuticals Ltd.', '0', '', '2020-10-06 18:00:00', '2020-10-06 18:00:00'),
(83, 'Patadin E/D', '', '', '', 'Popular Pharmaceuticals Ltd.', '0', '', '2020-10-06 18:00:00', '2020-10-06 18:00:00'),
(84, 'Patadin Ds E/D', '', '', '', 'Popular Pharmaceuticals Ltd.', '0', '', '2020-10-06 18:00:00', '2020-10-06 18:00:00'),
(85, 'Patadin Max E/D', '', '', '', 'Popular Pharmaceuticals Ltd.', '0', '', '2020-10-06 18:00:00', '2020-10-06 18:00:00'),
(86, 'Zadit E/D', '', '', '', 'Popular Pharmaceuticals Ltd.', '0', '', '2020-10-06 18:00:00', '2020-10-06 18:00:00'),
(87, 'Dipred E/D', '', '', '', 'Popular Pharmaceuticals Ltd.', '0', '', '2020-10-06 18:00:00', '2020-10-06 18:00:00'),
(88, 'Lotenol E/D', '', '', '', 'Popular Pharmaceuticals Ltd.', '0', '', '2020-10-06 18:00:00', '2020-10-06 18:00:00'),
(89, 'Lotenol gel', '', '', '', 'Popular Pharmaceuticals Ltd.', '0', '', '2020-10-06 18:00:00', '2020-10-06 18:00:00'),
(90, 'Ocasol E/D', '', '', '', 'Popular Pharmaceuticals Ltd.', '0', '', '2020-10-06 18:00:00', '2020-10-06 18:00:00'),
(91, 'Fluromet E/D', '', '', '', 'Popular Pharmaceuticals Ltd.', '0', '', '2020-10-06 18:00:00', '2020-10-06 18:00:00'),
(92, 'Orbidex E/D', '', '', '', 'Popular Pharmaceuticals Ltd.', '0', '', '2020-10-06 18:00:00', '2020-10-06 18:00:00'),
(93, 'Orbidex E/O', '', '', '', 'Popular Pharmaceuticals Ltd.', '0', '', '2020-10-06 18:00:00', '2020-10-06 18:00:00'),
(94, 'Benozol E/D', '', '', '', 'Popular Pharmaceuticals Ltd.', '0', '', '2020-10-06 18:00:00', '2020-10-06 18:00:00'),
(95, 'Benozol BR E/D', '', '', '', 'Popular Pharmaceuticals Ltd.', '0', '', '2020-10-06 18:00:00', '2020-10-06 18:00:00'),
(96, 'Brimopres E/D', '', '', '', 'Popular Pharmaceuticals Ltd.', '0', '', '2020-10-06 18:00:00', '2020-10-06 18:00:00'),
(97, 'Optafenac E/D', '', '', '', 'Popular Pharmaceuticals Ltd.', '0', '', '2020-10-06 18:00:00', '2020-10-06 18:00:00'),
(98, 'Optafenac Ts E/D', '', '', '', 'Popular Pharmaceuticals Ltd.', '0', '', '2020-10-06 18:00:00', '2020-10-06 18:00:00'),
(99, 'Bfenac E/D', '', '', '', 'Popular Pharmaceuticals Ltd.', '0', '', '2020-10-06 18:00:00', '2020-10-06 18:00:00'),
(100, 'Herpigel E/G', '', '', '', 'Popular Pharmaceuticals Ltd.', '0', '', '2020-10-06 18:00:00', '2020-10-06 18:00:00'),
(101, 'Natapro E/D', '', '', '', 'Popular Pharmaceuticals Ltd.', '0', '', '2020-10-06 18:00:00', '2020-10-06 18:00:00'),
(102, 'Moxidexe E/D', '', '', '', 'Popular Pharmaceuticals Ltd.', '0', '', '2020-10-06 18:00:00', '2020-10-06 18:00:00'),
(103, 'Orbidex C E/D', '', '', '', 'Popular Pharmaceuticals Ltd.', '0', '', '2020-10-06 18:00:00', '2020-10-06 18:00:00'),
(104, 'Lotenol T E/D', '', '', '', 'Popular Pharmaceuticals Ltd.', '0', '', '2020-10-06 18:00:00', '2020-10-06 18:00:00'),
(105, 'Tobrabac E/D', '', '', '', 'Popular Pharmaceuticals Ltd.', '0', '', '2020-10-06 18:00:00', '2020-10-06 18:00:00'),
(106, 'Tobrabac E/O', '', '', '', 'Popular Pharmaceuticals Ltd.', '0', '', '2020-10-06 18:00:00', '2020-10-06 18:00:00'),
(107, 'Gatibac E/D', '', '', '', 'Popular Pharmaceuticals Ltd.', '0', '', '2020-10-06 18:00:00', '2020-10-06 18:00:00'),
(108, 'Orbidex G', '', '', '', 'Popular Pharmaceuticals Ltd.', '0', '', '2020-10-06 18:00:00', '2020-10-06 18:00:00'),
(109, 'Fluromet E/D', '', '', '', 'Popular Pharmaceuticals Ltd.', '0', '', '2020-10-06 18:00:00', '2020-10-06 18:00:00'),
(110, 'Optavit Cap.', '', '', '', 'Popular Pharmaceuticals Ltd.', '0', '', '2020-10-06 18:00:00', '2020-10-06 18:00:00'),
(111, 'Vitafol E/D', '', '', '', 'Popular Pharmaceuticals Ltd.', '0', '', '2020-10-06 18:00:00', '2020-10-06 18:00:00'),
(112, 'Tropidil E/D', '', '', '', 'Popular Pharmaceuticals Ltd.', '0', '', '2020-10-06 18:00:00', '2020-10-06 18:00:00'),
(113, 'Tropidil plus E/D', '', '', '', 'Popular Pharmaceuticals Ltd.', '0', '', '2020-10-06 18:00:00', '2020-10-06 18:00:00'),
(114, 'P-Caire E/D', '', '', '', 'Popular Pharmaceuticals Ltd.', '0', '', '2020-10-06 18:00:00', '2020-10-06 18:00:00'),
(115, 'Nsol 5 E/D', '', '', '', 'Popular Pharmaceuticals Ltd.', '0', '', '2020-10-06 18:00:00', '2020-10-06 18:00:00'),
(116, 'Moxigen E/D', '', '', '', 'General Pharmaceuticals Ltd.', '0', '', '2020-10-06 18:00:00', '2020-10-06 18:00:00'),
(117, 'Moxigen E/O', '', '', '', 'General Pharmaceuticals Ltd.', '0', '', '2020-10-06 18:00:00', '2020-10-06 18:00:00'),
(118, 'Moxigen X/G', '', '', '', 'General Pharmaceuticals Ltd.', '0', '', '2020-10-06 18:00:00', '2020-10-06 18:00:00'),
(119, 'Besigen', '', '', '', 'General Pharmaceuticals Ltd.', '0', '', '2020-10-06 18:00:00', '2020-10-06 18:00:00'),
(120, 'Genolev E/D', '', '', '', 'General Pharmaceuticals Ltd.', '0', '', '2020-10-06 18:00:00', '2020-10-06 18:00:00'),
(121, 'Genolev Ts E/D', '', '', '', 'General Pharmaceuticals Ltd.', '0', '', '2020-10-06 18:00:00', '2020-10-06 18:00:00'),
(122, 'Loniegen E/D', '', '', '', 'General Pharmaceuticals Ltd.', '0', '', '2020-10-06 18:00:00', '2020-10-06 18:00:00'),
(123, 'Gentob E/D', '', '', '', 'General Pharmaceuticals Ltd.', '0', '', '2020-10-06 18:00:00', '2020-10-06 18:00:00'),
(124, 'Gentob E/O', '', '', '', 'General Pharmaceuticals Ltd.', '0', '', '2020-10-06 18:00:00', '2020-10-06 18:00:00'),
(125, 'Tearfresh Liquigel E/D', '', '', '', 'General Pharmaceuticals Ltd.', '0', '', '2020-10-06 18:00:00', '2020-10-06 18:00:00'),
(126, 'Glytear P E/D', '', '', '', 'General Pharmaceuticals Ltd.', '0', '', '2020-10-06 18:00:00', '2020-10-06 18:00:00'),
(127, 'Genagel', '', '', '', 'General Pharmaceuticals Ltd.', '0', '', '2020-10-06 18:00:00', '2020-10-06 18:00:00'),
(128, 'Teargen E/D', '', '', '', 'General Pharmaceuticals Ltd.', '0', '', '2020-10-06 18:00:00', '2020-10-06 18:00:00'),
(129, 'Eradra E/D', '', '', '', 'General Pharmaceuticals Ltd.', '0', '', '2020-10-06 18:00:00', '2020-10-06 18:00:00'),
(130, 'Genacaft E/D', '', '', '', 'General Pharmaceuticals Ltd.', '0', '', '2020-10-06 18:00:00', '2020-10-06 18:00:00'),
(131, 'Bepogen E/D', '', '', '', 'General Pharmaceuticals Ltd.', '0', '', '2020-10-06 18:00:00', '2020-10-06 18:00:00'),
(132, 'Ologen E/D', '', '', '', 'General Pharmaceuticals Ltd.', '0', '', '2020-10-06 18:00:00', '2020-10-06 18:00:00'),
(133, 'Ologen Ds E/D', '', '', '', 'General Pharmaceuticals Ltd.', '0', '', '2020-10-06 18:00:00', '2020-10-06 18:00:00'),
(134, 'Ologen Max E/D', '', '', '', 'General Pharmaceuticals Ltd.', '0', '', '2020-10-06 18:00:00', '2020-10-06 18:00:00'),
(135, 'Ocutifen E/D', '', '', '', 'General Pharmaceuticals Ltd.', '0', '', '2020-10-06 18:00:00', '2020-10-06 18:00:00'),
(136, 'Diflupred E/D', '', '', '', 'General Pharmaceuticals Ltd.', '0', '', '2020-10-06 18:00:00', '2020-10-06 18:00:00'),
(137, 'Loteflam E/D', '', '', '', 'General Pharmaceuticals Ltd.', '0', '', '2020-10-06 18:00:00', '2020-10-06 18:00:00'),
(138, 'Predflam E/D', '', '', '', 'General Pharmaceuticals Ltd.', '0', '', '2020-10-06 18:00:00', '2020-10-06 18:00:00'),
(139, 'Flurolon E/D', '', '', '', 'General Pharmaceuticals Ltd.', '0', '', '2020-10-06 18:00:00', '2020-10-06 18:00:00'),
(140, 'Dexagen E/D', '', '', '', 'General Pharmaceuticals Ltd.', '0', '', '2020-10-06 18:00:00', '2020-10-06 18:00:00'),
(141, 'Dexagen E/O', '', '', '', 'General Pharmaceuticals Ltd.', '0', '', '2020-10-06 18:00:00', '2020-10-06 18:00:00'),
(142, 'Travazen \'z\' E/D', '', '', '', 'General Pharmaceuticals Ltd.', '0', '', '2020-10-06 18:00:00', '2020-10-06 18:00:00'),
(143, 'Genazopt E/D', '', '', '', 'General Pharmaceuticals Ltd.', '0', '', '2020-10-06 18:00:00', '2020-10-06 18:00:00'),
(144, 'Genazopt \'T\' E/D', '', '', '', 'General Pharmaceuticals Ltd.', '0', '', '2020-10-06 18:00:00', '2020-10-06 18:00:00'),
(145, 'Genazopt plus E/D', '', '', '', 'General Pharmaceuticals Ltd.', '0', '', '2020-10-06 18:00:00', '2020-10-06 18:00:00'),
(146, 'Combat E/D', '', '', '', 'General Pharmaceuticals Ltd.', '0', '', '2020-10-06 18:00:00', '2020-10-06 18:00:00'),
(147, 'Nepagen E/D', '', '', '', 'General Pharmaceuticals Ltd.', '0', '', '2020-10-06 18:00:00', '2020-10-06 18:00:00'),
(148, 'Nepagen-TS E/D', '', '', '', 'General Pharmaceuticals Ltd.', '0', '', '2020-10-06 18:00:00', '2020-10-06 18:00:00'),
(149, 'Acunac E/D', '', '', '', 'General Pharmaceuticals Ltd.', '0', '', '2020-10-06 18:00:00', '2020-10-06 18:00:00'),
(150, 'Genclovir E/G', '', '', '', 'General Pharmaceuticals Ltd.', '0', '', '2020-10-06 18:00:00', '2020-10-06 18:00:00'),
(151, 'Cuvir E/O', '', '', '', 'General Pharmaceuticals Ltd.', '0', '', '2020-10-06 18:00:00', '2020-10-06 18:00:00'),
(152, 'Natagen E/D', '', '', '', 'General Pharmaceuticals Ltd.', '0', '', '2020-10-06 18:00:00', '2020-10-06 18:00:00'),
(153, 'Moxigen-D E/D', '', '', '', 'General Pharmaceuticals Ltd.', '0', '', '2020-10-06 18:00:00', '2020-10-06 18:00:00'),
(154, 'Dexagen-C E/D', '', '', '', 'General Pharmaceuticals Ltd.', '0', '', '2020-10-06 18:00:00', '2020-10-06 18:00:00'),
(155, 'Loteflam-T E/D', '', '', '', 'General Pharmaceuticals Ltd.', '0', '', '2020-10-06 18:00:00', '2020-10-06 18:00:00'),
(156, 'Dexagen T E/D', '', '', '', 'General Pharmaceuticals Ltd.', '0', '', '2020-10-06 18:00:00', '2020-10-06 18:00:00'),
(157, 'Dexagen-G E/D', '', '', '', 'General Pharmaceuticals Ltd.', '0', '', '2020-10-06 18:00:00', '2020-10-06 18:00:00'),
(158, 'Dexagen E&E/D', '', '', '', 'General Pharmaceuticals Ltd.', '0', '', '2020-10-06 18:00:00', '2020-10-06 18:00:00'),
(159, 'Lutin plus Cap', '', '', '', 'General Pharmaceuticals Ltd.', '0', '', '2020-10-06 18:00:00', '2020-10-06 18:00:00'),
(160, 'Vitalens E/D', '', '', '', 'General Pharmaceuticals Ltd.', '0', '', '2020-10-06 18:00:00', '2020-10-06 18:00:00'),
(161, 'Troplgen E/D', '', '', '', 'General Pharmaceuticals Ltd.', '0', '', '2020-10-06 18:00:00', '2020-10-06 18:00:00'),
(162, 'Troplgen-plus E/D', '', '', '', 'General Pharmaceuticals Ltd.', '0', '', '2020-10-06 18:00:00', '2020-10-06 18:00:00'),
(163, 'Floromax E/D', '', '', '', 'The IBN SINA Pharmaceutical Industry Ltd.', '0', '', '2020-10-06 18:00:00', '2020-10-06 18:00:00'),
(164, 'Florobex E/D', '', '', '', 'The IBN SINA Pharmaceutical Industry Ltd.', '0', '', '2020-10-06 18:00:00', '2020-10-06 18:00:00'),
(165, 'Levosina E/D', '', '', '', 'The IBN SINA Pharmaceutical Industry Ltd.', '0', '', '2020-10-06 18:00:00', '2020-10-06 18:00:00'),
(166, 'Levosina Ts E/D', '', '', '', 'The IBN SINA Pharmaceutical Industry Ltd.', '0', '', '2020-10-06 18:00:00', '2020-10-06 18:00:00'),
(167, 'Lyflox E/D', '', '', '', 'The IBN SINA Pharmaceutical Industry Ltd.', '0', '', '2020-10-06 18:00:00', '2020-10-06 18:00:00'),
(168, 'Tomycin E/D', '', '', '', 'The IBN SINA Pharmaceutical Industry Ltd.', '0', '', '2020-10-06 18:00:00', '2020-10-06 18:00:00'),
(169, 'Tomycin E/O', '', '', '', 'The IBN SINA Pharmaceutical Industry Ltd.', '0', '', '2020-10-06 18:00:00', '2020-10-06 18:00:00'),
(170, 'Romycin E/D', '', '', '', 'The IBN SINA Pharmaceutical Industry Ltd.', '0', '', '2020-10-06 18:00:00', '2020-10-06 18:00:00'),
(171, 'Bactin E/D', '', '', '', 'The IBN SINA Pharmaceutical Industry Ltd.', '0', '', '2020-10-06 18:00:00', '2020-10-06 18:00:00'),
(172, 'Bactin E/O', '', '', '', 'The IBN SINA Pharmaceutical Industry Ltd.', '0', '', '2020-10-06 18:00:00', '2020-10-06 18:00:00'),
(173, 'Sinafresh E/D', '', '', '', 'The IBN SINA Pharmaceutical Industry Ltd.', '0', '', '2020-10-06 18:00:00', '2020-10-06 18:00:00'),
(174, 'Polygel', '', '', '', 'The IBN SINA Pharmaceutical Industry Ltd.', '0', '', '2020-10-06 18:00:00', '2020-10-06 18:00:00'),
(175, 'Glamer', '', '', '', 'The IBN SINA Pharmaceutical Industry Ltd.', '0', '', '2020-10-06 18:00:00', '2020-10-06 18:00:00'),
(176, 'G-fresh E/D', '', '', '', 'The IBN SINA Pharmaceutical Industry Ltd.', '0', '', '2020-10-06 18:00:00', '2020-10-06 18:00:00'),
(177, 'Optear E/D', '', '', '', 'The IBN SINA Pharmaceutical Industry Ltd.', '0', '', '2020-10-06 18:00:00', '2020-10-06 18:00:00'),
(178, 'Cyclorin E/D', '', '', '', 'The IBN SINA Pharmaceutical Industry Ltd.', '0', '', '2020-10-06 18:00:00', '2020-10-06 18:00:00'),
(179, 'Betasil E/D', '', '', '', 'The IBN SINA Pharmaceutical Industry Ltd.', '0', '', '2020-10-06 18:00:00', '2020-10-06 18:00:00'),
(180, 'Patalon E/D', '', '', '', 'The IBN SINA Pharmaceutical Industry Ltd.', '0', '', '2020-10-06 18:00:00', '2020-10-06 18:00:00'),
(181, 'Patalon-Ds E/D', '', '', '', 'The IBN SINA Pharmaceutical Industry Ltd.', '0', '', '2020-10-06 18:00:00', '2020-10-06 18:00:00'),
(182, 'Ketof E/D', '', '', '', 'The IBN SINA Pharmaceutical Industry Ltd.', '0', '', '2020-10-06 18:00:00', '2020-10-06 18:00:00'),
(183, 'Loterex E/D', '', '', '', 'The IBN SINA Pharmaceutical Industry Ltd.', '0', '', '2020-10-06 18:00:00', '2020-10-06 18:00:00'),
(184, 'Isolon E/D', '', '', '', 'The IBN SINA Pharmaceutical Industry Ltd.', '0', '', '2020-10-06 18:00:00', '2020-10-06 18:00:00'),
(185, 'Eylon E/D', '', '', '', 'The IBN SINA Pharmaceutical Industry Ltd.', '0', '', '2020-10-06 18:00:00', '2020-10-06 18:00:00'),
(186, 'Dexon E/D', '', '', '', 'The IBN SINA Pharmaceutical Industry Ltd.', '0', '', '2020-10-06 18:00:00', '2020-10-06 18:00:00'),
(187, 'Dexon E/D', '', '', '', 'The IBN SINA Pharmaceutical Industry Ltd.', '0', '', '2020-10-06 18:00:00', '2020-10-06 18:00:00'),
(188, 'Avost E/D', '', '', '', 'The IBN SINA Pharmaceutical Industry Ltd.', '0', '', '2020-10-06 18:00:00', '2020-10-06 18:00:00'),
(189, 'Azopres E/D', '', '', '', 'The IBN SINA Pharmaceutical Industry Ltd.', '0', '', '2020-10-06 18:00:00', '2020-10-06 18:00:00'),
(190, 'Azopt E/D', '', '', '', 'The IBN SINA Pharmaceutical Industry Ltd.', '0', '', '2020-10-06 18:00:00', '2020-10-06 18:00:00'),
(191, 'Bimolate E/D', '', '', '', 'The IBN SINA Pharmaceutical Industry Ltd.', '0', '', '2020-10-06 18:00:00', '2020-10-06 18:00:00'),
(192, 'NEP-TS E/D', '', '', '', 'The IBN SINA Pharmaceutical Industry Ltd.', '0', '', '2020-10-06 18:00:00', '2020-10-06 18:00:00'),
(193, 'Bromofen E/D', '', '', '', 'The IBN SINA Pharmaceutical Industry Ltd.', '0', '', '2020-10-06 18:00:00', '2020-10-06 18:00:00'),
(194, 'Zirgan E/G', '', '', '', 'The IBN SINA Pharmaceutical Industry Ltd.', '0', '', '2020-10-06 18:00:00', '2020-10-06 18:00:00'),
(195, 'Clovir E/O', '', '', '', 'The IBN SINA Pharmaceutical Industry Ltd.', '0', '', '2020-10-06 18:00:00', '2020-10-06 18:00:00'),
(196, 'Netoph E/D', '', '', '', 'The IBN SINA Pharmaceutical Industry Ltd.', '0', '', '2020-10-06 18:00:00', '2020-10-06 18:00:00'),
(197, 'Fungin E/O', '', '', '', 'The IBN SINA Pharmaceutical Industry Ltd.', '0', '', '2020-10-06 18:00:00', '2020-10-06 18:00:00'),
(198, 'Dexon E/D', '', '', '', 'The IBN SINA Pharmaceutical Industry Ltd.', '0', '', '2020-10-06 18:00:00', '2020-10-06 18:00:00'),
(199, 'Loterex-T E/D', '', '', '', 'The IBN SINA Pharmaceutical Industry Ltd.', '0', '', '2020-10-06 18:00:00', '2020-10-06 18:00:00'),
(200, 'Dexon-G E/D', '', '', '', 'The IBN SINA Pharmaceutical Industry Ltd.', '0', '', '2020-10-06 18:00:00', '2020-10-06 18:00:00'),
(201, 'Gatsina E/D', '', '', '', 'The IBN SINA Pharmaceutical Industry Ltd.', '0', '', '2020-10-06 18:00:00', '2020-10-06 18:00:00'),
(202, 'Dexon E/D', '', '', '', 'The IBN SINA Pharmaceutical Industry Ltd.', '0', '', '2020-10-06 18:00:00', '2020-10-06 18:00:00'),
(203, 'Eyelon E/D', '', '', '', 'The IBN SINA Pharmaceutical Industry Ltd.', '0', '', '2020-10-06 18:00:00', '2020-10-06 18:00:00'),
(204, 'Optagold-Cap', '', '', '', 'The IBN SINA Pharmaceutical Industry Ltd.', '0', '', '2020-10-06 18:00:00', '2020-10-06 18:00:00'),
(205, 'Ractovit E/D', '', '', '', 'The IBN SINA Pharmaceutical Industry Ltd.', '0', '', '2020-10-06 18:00:00', '2020-10-06 18:00:00'),
(206, 'Inventi E/D', '', '', '', 'Square Pharmaceuticals Ltd.', '0', '', '2020-10-06 18:00:00', '2020-10-06 18:00:00'),
(207, 'Maxlo E/D', '', '', '', 'Square Pharmaceuticals Ltd.', '0', '', '2020-10-06 18:00:00', '2020-10-06 18:00:00'),
(208, 'Ciprocin E/D', '', '', '', 'Square Pharmaceuticals Ltd.', '0', '', '2020-10-06 18:00:00', '2020-10-06 18:00:00'),
(209, 'Lubgel E/D', '', '', '', 'Square Pharmaceuticals Ltd.', '0', '', '2020-10-06 18:00:00', '2020-10-06 18:00:00'),
(210, 'Lubtear E/D', '', '', '', 'Square Pharmaceuticals Ltd.', '0', '', '2020-10-06 18:00:00', '2020-10-06 18:00:00'),
(211, 'Alacot E/D', '', '', '', 'Square Pharmaceuticals Ltd.', '0', '', '2020-10-06 18:00:00', '2020-10-06 18:00:00'),
(212, 'Alacot Ds E/D', '', '', '', 'Square Pharmaceuticals Ltd.', '0', '', '2020-10-06 18:00:00', '2020-10-06 18:00:00'),
(213, 'Alacot Max E/D', '', '', '', 'Square Pharmaceuticals Ltd.', '0', '', '2020-10-06 18:00:00', '2020-10-06 18:00:00'),
(214, 'Alarid E/D', '', '', '', 'Square Pharmaceuticals Ltd.', '0', '', '2020-10-06 18:00:00', '2020-10-06 18:00:00'),
(215, 'Trabolar E/D', '', '', '', 'Square Pharmaceuticals Ltd.', '0', '', '2020-10-06 18:00:00', '2020-10-06 18:00:00'),
(216, 'Locular E/D', '', '', '', 'Square Pharmaceuticals Ltd.', '0', '', '2020-10-06 18:00:00', '2020-10-06 18:00:00'),
(217, 'Bimator E/D', '', '', '', 'Square Pharmaceuticals Ltd.', '0', '', '2020-10-06 18:00:00', '2020-10-06 18:00:00'),
(218, 'Locular Plus E/D', '', '', '', 'Square Pharmaceuticals Ltd.', '0', '', '2020-10-06 18:00:00', '2020-10-06 18:00:00'),
(219, 'Ocubrom E/D', '', '', '', 'Square Pharmaceuticals Ltd.', '0', '', '2020-10-06 18:00:00', '2020-10-06 18:00:00'),
(220, 'Inventi- D E/D', '', '', '', 'Square Pharmaceuticals Ltd.', '0', '', '2020-10-06 18:00:00', '2020-10-06 18:00:00'),
(221, 'Eyevi-Cap', '', '', '', 'Square Pharmaceuticals Ltd.', '0', '', '2020-10-06 18:00:00', '2020-10-06 18:00:00'),
(222, 'Ace plus Cap.', '', '', '', 'Square Pharmaceuticals Ltd.', '0', '', '2020-10-06 18:00:00', '2020-10-06 18:00:00'),
(223, 'Ace Tab.', '', '', '', 'Square Pharmaceuticals Ltd.', '0', '', '2020-10-06 18:00:00', '2020-10-06 18:00:00'),
(224, 'Ace Syrup', '', '', '', 'Square Pharmaceuticals Ltd.', '0', '', '2020-10-06 18:00:00', '2020-10-06 18:00:00'),
(225, 'Ace Power Tab.', '', '', '', 'Square Pharmaceuticals Ltd.', '0', '', '2020-10-06 18:00:00', '2020-10-06 18:00:00'),
(226, 'Alarid Tab.', '', '', '', 'Square Pharmaceuticals Ltd.', '0', '', '2020-10-06 18:00:00', '2020-10-06 18:00:00'),
(227, 'Alatrol Tab.', '', '', '', 'Square Pharmaceuticals Ltd.', '0', '', '2020-10-06 18:00:00', '2020-10-06 18:00:00'),
(228, 'Alice Tm Tab.', '', '', '', 'Square Pharmaceuticals Ltd.', '0', '', '2020-10-06 18:00:00', '2020-10-06 18:00:00'),
(229, 'Alice Tm  Lotion', '', '', '', 'Square Pharmaceuticals Ltd.', '0', '', '2020-10-06 18:00:00', '2020-10-06 18:00:00'),
(230, 'Almex Tab.', '', '', '', 'Square Pharmaceuticals Ltd.', '0', '', '2020-10-06 18:00:00', '2020-10-06 18:00:00'),
(231, 'Ambrisan Tm Tab.', '', '', '', 'Square Pharmaceuticals Ltd.', '0', '', '2020-10-06 18:00:00', '2020-10-06 18:00:00'),
(232, 'Ambrox P/D', '', '', '', 'Square Pharmaceuticals Ltd.', '0', '', '2020-10-06 18:00:00', '2020-10-06 18:00:00'),
(233, 'Amistar Tm IM/IV InJ.', '', '', '', 'Square Pharmaceuticals Ltd.', '0', '', '2020-10-06 18:00:00', '2020-10-06 18:00:00'),
(234, 'Anadol Cap.', '', '', '', 'Square Pharmaceuticals Ltd.', '0', '', '2020-10-06 18:00:00', '2020-10-06 18:00:00'),
(235, 'Anclog Plus Tab.', '', '', '', 'Square Pharmaceuticals Ltd.', '0', '', '2020-10-06 18:00:00', '2020-10-06 18:00:00'),
(236, 'Anclog  Tab.', '', '', '', 'Square Pharmaceuticals Ltd.', '0', '', '2020-10-06 18:00:00', '2020-10-06 18:00:00'),
(237, 'Anema Tm', '', '', '', 'Square Pharmaceuticals Ltd.', '0', '', '2020-10-06 18:00:00', '2020-10-06 18:00:00'),
(238, 'Angilock Tab.', '', '', '', 'Square Pharmaceuticals Ltd.', '0', '', '2020-10-06 18:00:00', '2020-10-06 18:00:00'),
(239, 'Angilock Plus Tab.', '', '', '', 'Square Pharmaceuticals Ltd.', '0', '', '2020-10-06 18:00:00', '2020-10-06 18:00:00'),
(240, 'Angivent MR Tab.', '', '', '', 'Square Pharmaceuticals Ltd.', '0', '', '2020-10-06 18:00:00', '2020-10-06 18:00:00'),
(241, 'Anleptic CR Tab.', '', '', '', 'Square Pharmaceuticals Ltd.', '0', '', '2020-10-06 18:00:00', '2020-10-06 18:00:00'),
(242, 'Antazol N/D', '', '', '', 'Square Pharmaceuticals Ltd.', '0', '', '2020-10-06 18:00:00', '2020-10-06 18:00:00'),
(243, 'Antazol Plus N/spray', '', '', '', 'Square Pharmaceuticals Ltd.', '0', '', '2020-10-06 18:00:00', '2020-10-06 18:00:00'),
(244, 'Antista Syrup', '', '', '', 'Square Pharmaceuticals Ltd.', '0', '', '2020-10-06 18:00:00', '2020-10-06 18:00:00'),
(245, 'Anzitor Tab.', '', '', '', 'Square Pharmaceuticals Ltd.', '0', '', '2020-10-06 18:00:00', '2020-10-06 18:00:00'),
(246, 'B-50 Forte Tab.', '', '', '', 'Square Pharmaceuticals Ltd.', '0', '', '2020-10-06 18:00:00', '2020-10-06 18:00:00'),
(247, 'B-50 Forte Syrup', '', '', '', 'Square Pharmaceuticals Ltd.', '0', '', '2020-10-06 18:00:00', '2020-10-06 18:00:00'),
(248, 'Betameson-CL Tm Cream', '', '', '', 'Square Pharmaceuticals Ltd.', '0', '', '2020-10-06 18:00:00', '2020-10-06 18:00:00'),
(249, 'Betameson-N Cream', '', '', '', 'Square Pharmaceuticals Ltd.', '0', '', '2020-10-06 18:00:00', '2020-10-06 18:00:00'),
(250, 'Betameson Tm Cream', '', '', '', 'Square Pharmaceuticals Ltd.', '0', '', '2020-10-06 18:00:00', '2020-10-06 18:00:00'),
(251, 'Bicozin-I Syrup', '', '', '', 'Square Pharmaceuticals Ltd.', '0', '', '2020-10-06 18:00:00', '2020-10-06 18:00:00'),
(252, 'Bicozin Tab.', '', '', '', 'Square Pharmaceuticals Ltd.', '0', '', '2020-10-06 18:00:00', '2020-10-06 18:00:00'),
(253, 'Bilista Tm Tab.', '', '', '', 'Square Pharmaceuticals Ltd.', '0', '', '2020-10-06 18:00:00', '2020-10-06 18:00:00'),
(254, 'Bisocam Tm 2.5/5 Tab.', '', '', '', 'Square Pharmaceuticals Ltd.', '0', '', '2020-10-06 18:00:00', '2020-10-06 18:00:00'),
(255, 'Bisocor 2.5 Tab.', '', '', '', 'Square Pharmaceuticals Ltd.', '0', '', '2020-10-06 18:00:00', '2020-10-06 18:00:00'),
(256, 'Bisocor Tm Plus Tab.', '', '', '', 'Square Pharmaceuticals Ltd.', '0', '', '2020-10-06 18:00:00', '2020-10-06 18:00:00'),
(257, 'Burna Cream ', '', '', '', 'Square Pharmaceuticals Ltd.', '0', '', '2020-10-06 18:00:00', '2020-10-06 18:00:00'),
(258, 'Calbo 500 Tab.', '', '', '', 'Square Pharmaceuticals Ltd.', '0', '', '2020-10-06 18:00:00', '2020-10-06 18:00:00'),
(259, 'Calbo Jr. Tab.', '', '', '', 'Square Pharmaceuticals Ltd.', '0', '', '2020-10-06 18:00:00', '2020-10-06 18:00:00'),
(260, 'Calbo-C Tab.', '', '', '', 'Square Pharmaceuticals Ltd.', '0', '', '2020-10-06 18:00:00', '2020-10-06 18:00:00'),
(261, 'Calbo-D Vita Tab.', '', '', '', 'Square Pharmaceuticals Ltd.', '0', '', '2020-10-06 18:00:00', '2020-10-06 18:00:00'),
(262, 'Calbo-D Tab.', '', '', '', 'Square Pharmaceuticals Ltd.', '0', '', '2020-10-06 18:00:00', '2020-10-06 18:00:00'),
(263, 'Calboplex Tab.', '', '', '', 'Square Pharmaceuticals Ltd.', '0', '', '2020-10-06 18:00:00', '2020-10-06 18:00:00'),
(264, 'Calboral-D Tm Tab.', '', '', '', 'Square Pharmaceuticals Ltd.', '0', '', '2020-10-06 18:00:00', '2020-10-06 18:00:00'),
(265, 'Calboral-DX Tm Tab.', '', '', '', 'Square Pharmaceuticals Ltd.', '0', '', '2020-10-06 18:00:00', '2020-10-06 18:00:00'),
(266, 'Camlodin 5 Tab.', '', '', '', 'Square Pharmaceuticals Ltd.', '0', '', '2020-10-06 18:00:00', '2020-10-06 18:00:00'),
(267, 'Camlodin Plus Tab.', '', '', '', 'Square Pharmaceuticals Ltd.', '0', '', '2020-10-06 18:00:00', '2020-10-06 18:00:00'),
(268, 'Camlopril 5/10 Cap.', '', '', '', 'Square Pharmaceuticals Ltd.', '0', '', '2020-10-06 18:00:00', '2020-10-06 18:00:00'),
(269, 'Camlosart Tm 5/20  Tab.', '', '', '', 'Square Pharmaceuticals Ltd.', '0', '', '2020-10-06 18:00:00', '2020-10-06 18:00:00'),
(270, 'Candex  Suspension', '', '', '', 'Square Pharmaceuticals Ltd.', '0', '', '2020-10-06 18:00:00', '2020-10-06 18:00:00'),
(271, 'Carbizol Tab.', '', '', '', 'Square Pharmaceuticals Ltd.', '0', '', '2020-10-06 18:00:00', '2020-10-06 18:00:00'),
(272, 'Carva Tab.', '', '', '', 'Square Pharmaceuticals Ltd.', '0', '', '2020-10-06 18:00:00', '2020-10-06 18:00:00'),
(273, 'Ceevit Forte', '', '', '', 'Square Pharmaceuticals Ltd.', '0', '', '2020-10-06 18:00:00', '2020-10-06 18:00:00'),
(274, 'Ceevit ', '', '', '', 'Square Pharmaceuticals Ltd.', '0', '', '2020-10-06 18:00:00', '2020-10-06 18:00:00'),
(275, 'Cef-3 Cap.', '', '', '', 'Square Pharmaceuticals Ltd.', '0', '', '2020-10-06 18:00:00', '2020-10-06 18:00:00'),
(276, 'Cefotil  Syrup', '', '', '', 'Square Pharmaceuticals Ltd.', '0', '', '2020-10-06 18:00:00', '2020-10-06 18:00:00'),
(277, 'Cefotil  Plus 250mg Tab.', '', '', '', 'Square Pharmaceuticals Ltd.', '0', '', '2020-10-06 18:00:00', '2020-10-06 18:00:00'),
(278, 'Ceftron Inj. 1gm', '', '', '', 'Square Pharmaceuticals Ltd.', '0', '', '2020-10-06 18:00:00', '2020-10-06 18:00:00'),
(279, 'Cerevas Tm Tab.', '', '', '', 'Square Pharmaceuticals Ltd.', '0', '', '2020-10-06 18:00:00', '2020-10-06 18:00:00'),
(280, 'Cinaron Tab.', '', '', '', 'Square Pharmaceuticals Ltd.', '0', '', '2020-10-06 18:00:00', '2020-10-06 18:00:00'),
(281, 'Cinaron Plus Tab.', '', '', '', 'Square Pharmaceuticals Ltd.', '0', '', '2020-10-06 18:00:00', '2020-10-06 18:00:00'),
(282, 'Ciprocin E/E/D', '', '', '', 'Square Pharmaceuticals Ltd.', '0', '', '2020-10-06 18:00:00', '2020-10-06 18:00:00'),
(283, 'Climycin 300 Cap.', '', '', '', 'Square Pharmaceuticals Ltd.', '0', '', '2020-10-06 18:00:00', '2020-10-06 18:00:00'),
(284, 'Clofenac  Tab.', '', '', '', 'Square Pharmaceuticals Ltd.', '0', '', '2020-10-06 18:00:00', '2020-10-06 18:00:00'),
(285, 'Clofenac  Plus Inj. ', '', '', '', 'Square Pharmaceuticals Ltd.', '0', '', '2020-10-06 18:00:00', '2020-10-06 18:00:00'),
(286, 'Comet Tab.', '', '', '', 'Square Pharmaceuticals Ltd.', '0', '', '2020-10-06 18:00:00', '2020-10-06 18:00:00'),
(287, 'Comprid Tm Tab.', '', '', '', 'Square Pharmaceuticals Ltd.', '0', '', '2020-10-06 18:00:00', '2020-10-06 18:00:00'),
(288, 'Contifil Tab.', '', '', '', 'Square Pharmaceuticals Ltd.', '0', '', '2020-10-06 18:00:00', '2020-10-06 18:00:00'),
(289, 'Contilex Tab.', '', '', '', 'Square Pharmaceuticals Ltd.', '0', '', '2020-10-06 18:00:00', '2020-10-06 18:00:00'),
(290, 'Cotrim Tab.', '', '', '', 'Square Pharmaceuticals Ltd.', '0', '', '2020-10-06 18:00:00', '2020-10-06 18:00:00'),
(291, 'D-balance Tm', '', '', '', 'Square Pharmaceuticals Ltd.', '0', '', '2020-10-06 18:00:00', '2020-10-06 18:00:00'),
(292, 'Deflacort Tm 6', '', '', '', 'Square Pharmaceuticals Ltd.', '0', '', '2020-10-06 18:00:00', '2020-10-06 18:00:00'),
(293, 'Dermasol-N Cream', '', '', '', 'Square Pharmaceuticals Ltd.', '0', '', '2020-10-06 18:00:00', '2020-10-06 18:00:00'),
(294, 'Dermasol Cream', '', '', '', 'Square Pharmaceuticals Ltd.', '0', '', '2020-10-06 18:00:00', '2020-10-06 18:00:00'),
(295, 'Dexonex Tab.', '', '', '', 'Square Pharmaceuticals Ltd.', '0', '', '2020-10-06 18:00:00', '2020-10-06 18:00:00'),
(296, 'Dibenol Tab.', '', '', '', 'Square Pharmaceuticals Ltd.', '0', '', '2020-10-06 18:00:00', '2020-10-06 18:00:00'),
(297, 'Diltizem SR 90 Tab.', '', '', '', 'Square Pharmaceuticals Ltd.', '0', '', '2020-10-06 18:00:00', '2020-10-06 18:00:00'),
(298, 'Entacyd Tab.', '', '', '', 'Square Pharmaceuticals Ltd.', '0', '', '2020-10-06 18:00:00', '2020-10-06 18:00:00'),
(299, 'Entacyd PlusTab.', '', '', '', 'Square Pharmaceuticals Ltd.', '0', '', '2020-10-06 18:00:00', '2020-10-06 18:00:00'),
(300, 'Epitra Tm Tab.', '', '', '', 'Square Pharmaceuticals Ltd.', '0', '', '2020-10-06 18:00:00', '2020-10-06 18:00:00'),
(301, 'Eromycin Ped. ', '', '', '', 'Square Pharmaceuticals Ltd.', '0', '', '2020-10-06 18:00:00', '2020-10-06 18:00:00'),
(302, 'Eromycin Lotion', '', '', '', 'Square Pharmaceuticals Ltd.', '0', '', '2020-10-06 18:00:00', '2020-10-06 18:00:00'),
(303, 'Evit Licap', '', '', '', 'Square Pharmaceuticals Ltd.', '0', '', '2020-10-06 18:00:00', '2020-10-06 18:00:00'),
(304, 'Famotack Tab.', '', '', '', 'Square Pharmaceuticals Ltd.', '0', '', '2020-10-06 18:00:00', '2020-10-06 18:00:00'),
(305, 'Fexo Suspension', '', '', '', 'Square Pharmaceuticals Ltd.', '0', '', '2020-10-06 18:00:00', '2020-10-06 18:00:00'),
(306, 'Filfresh Tab', '', '', '', 'Square Pharmaceuticals Ltd.', '0', '', '2020-10-06 18:00:00', '2020-10-06 18:00:00'),
(307, 'Filwel Gold Tab.', '', '', '', 'Square Pharmaceuticals Ltd.', '0', '', '2020-10-06 18:00:00', '2020-10-06 18:00:00'),
(308, 'Filwel Kids Syrup', '', '', '', 'Square Pharmaceuticals Ltd.', '0', '', '2020-10-06 18:00:00', '2020-10-06 18:00:00'),
(309, 'Filwel Silver Tab.', '', '', '', 'Square Pharmaceuticals Ltd.', '0', '', '2020-10-06 18:00:00', '2020-10-06 18:00:00'),
(310, 'Filwel Tm Teen hr Tab.', '', '', '', 'Square Pharmaceuticals Ltd.', '0', '', '2020-10-06 18:00:00', '2020-10-06 18:00:00'),
(311, 'Filwel Tm Teen hm Tab.', '', '', '', 'Square Pharmaceuticals Ltd.', '0', '', '2020-10-06 18:00:00', '2020-10-06 18:00:00'),
(312, 'Flexi Tab.', '', '', '', 'Square Pharmaceuticals Ltd.', '0', '', '2020-10-06 18:00:00', '2020-10-06 18:00:00'),
(313, 'Flugal 50 Cap.', '', '', '', 'Square Pharmaceuticals Ltd.', '0', '', '2020-10-06 18:00:00', '2020-10-06 18:00:00'),
(314, 'Flurizin 5 Tab.', '', '', '', 'Square Pharmaceuticals Ltd.', '0', '', '2020-10-06 18:00:00', '2020-10-06 18:00:00'),
(315, 'Fungidal HC Cream', '', '', '', 'Square Pharmaceuticals Ltd.', '0', '', '2020-10-06 18:00:00', '2020-10-06 18:00:00'),
(316, 'Fusid  Tab.', '', '', '', 'Square Pharmaceuticals Ltd.', '0', '', '2020-10-06 18:00:00', '2020-10-06 18:00:00'),
(317, 'Fusid Plus Tab.', '', '', '', 'Square Pharmaceuticals Ltd.', '0', '', '2020-10-06 18:00:00', '2020-10-06 18:00:00'),
(318, 'Gabastar Tab.', '', '', '', 'Square Pharmaceuticals Ltd.', '0', '', '2020-10-06 18:00:00', '2020-10-06 18:00:00'),
(319, 'Gelora Oral Gel', '', '', '', 'Square Pharmaceuticals Ltd.', '0', '', '2020-10-06 18:00:00', '2020-10-06 18:00:00'),
(320, 'Inflagic Tab.', '', '', '', 'Square Pharmaceuticals Ltd.', '0', '', '2020-10-06 18:00:00', '2020-10-06 18:00:00'),
(321, 'Imotil Cap.', '', '', '', 'Square Pharmaceuticals Ltd.', '0', '', '2020-10-06 18:00:00', '2020-10-06 18:00:00'),
(322, 'Itra Cap.', '', '', '', 'Square Pharmaceuticals Ltd.', '0', '', '2020-10-06 18:00:00', '2020-10-06 18:00:00'),
(323, 'Iventi Tablet', '', '', '', 'Square Pharmaceuticals Ltd.', '0', '', '2020-10-06 18:00:00', '2020-10-06 18:00:00'),
(324, 'Ketoral Tab.', '', '', '', 'Square Pharmaceuticals Ltd.', '0', '', '2020-10-06 18:00:00', '2020-10-06 18:00:00'),
(325, 'Kop SR Cap.', '', '', '', 'Square Pharmaceuticals Ltd.', '0', '', '2020-10-06 18:00:00', '2020-10-06 18:00:00'),
(326, 'Laxyl Tab.', '', '', '', 'Square Pharmaceuticals Ltd.', '0', '', '2020-10-06 18:00:00', '2020-10-06 18:00:00'),
(327, 'Lebac Tm Ped. Drops', '', '', '', 'Square Pharmaceuticals Ltd.', '0', '', '2020-10-06 18:00:00', '2020-10-06 18:00:00'),
(328, 'Levostar Tab.', '', '', '', 'Square Pharmaceuticals Ltd.', '0', '', '2020-10-06 18:00:00', '2020-10-06 18:00:00'),
(329, 'Loratin Tab.', '', '', '', 'Square Pharmaceuticals Ltd.', '0', '', '2020-10-06 18:00:00', '2020-10-06 18:00:00'),
(330, 'Maganta Plus Tab.', '', '', '', 'Square Pharmaceuticals Ltd.', '0', '', '2020-10-06 18:00:00', '2020-10-06 18:00:00'),
(331, 'Maxcef Tm Inj.', '', '', '', 'Square Pharmaceuticals Ltd.', '0', '', '2020-10-06 18:00:00', '2020-10-06 18:00:00'),
(332, 'Melixol Tab.', '', '', '', 'Square Pharmaceuticals Ltd.', '0', '', '2020-10-06 18:00:00', '2020-10-06 18:00:00'),
(333, 'Methicol  Tab.', '', '', '', 'Square Pharmaceuticals Ltd.', '0', '', '2020-10-06 18:00:00', '2020-10-06 18:00:00'),
(334, 'Mexlo Tab.', '', '', '', 'Square Pharmaceuticals Ltd.', '0', '', '2020-10-06 18:00:00', '2020-10-06 18:00:00'),
(335, 'Migranil Tab.', '', '', '', 'Square Pharmaceuticals Ltd.', '0', '', '2020-10-06 18:00:00', '2020-10-06 18:00:00'),
(336, 'Motigut  Ped. Drops', '', '', '', 'Square Pharmaceuticals Ltd.', '0', '', '2020-10-06 18:00:00', '2020-10-06 18:00:00'),
(337, 'Moxacil Syrup', '', '', '', 'Square Pharmaceuticals Ltd.', '0', '', '2020-10-06 18:00:00', '2020-10-06 18:00:00'),
(338, 'Moxaclave  Tab.', '', '', '', 'Square Pharmaceuticals Ltd.', '0', '', '2020-10-06 18:00:00', '2020-10-06 18:00:00'),
(339, 'Multivit Plus Tab.', '', '', '', 'Square Pharmaceuticals Ltd.', '0', '', '2020-10-06 18:00:00', '2020-10-06 18:00:00'),
(340, 'Nebanol Cream', '', '', '', 'Square Pharmaceuticals Ltd.', '0', '', '2020-10-06 18:00:00', '2020-10-06 18:00:00'),
(341, 'Nebanol Plus Ointment', '', '', '', 'Square Pharmaceuticals Ltd.', '0', '', '2020-10-06 18:00:00', '2020-10-06 18:00:00'),
(342, 'Neuro-B Tab/Inj.', '', '', '', 'Square Pharmaceuticals Ltd.', '0', '', '2020-10-06 18:00:00', '2020-10-06 18:00:00'),
(343, 'Neurolin Cap.', '', '', '', 'Square Pharmaceuticals Ltd.', '0', '', '2020-10-06 18:00:00', '2020-10-06 18:00:00'),
(344, 'Nexum Cap.', '', '', '', 'Square Pharmaceuticals Ltd.', '0', '', '2020-10-06 18:00:00', '2020-10-06 18:00:00'),
(345, 'Nidipine SR 20 Tab.', '', '', '', 'Square Pharmaceuticals Ltd.', '0', '', '2020-10-06 18:00:00', '2020-10-06 18:00:00'),
(346, 'Nomi Tab.', '', '', '', 'Square Pharmaceuticals Ltd.', '0', '', '2020-10-06 18:00:00', '2020-10-06 18:00:00'),
(347, 'Oculant Tm E/D', '', '', '', 'Square Pharmaceuticals Ltd.', '0', '', '2020-10-06 18:00:00', '2020-10-06 18:00:00'),
(348, 'Osmolax Solution', '', '', '', 'Square Pharmaceuticals Ltd.', '0', '', '2020-10-06 18:00:00', '2020-10-06 18:00:00'),
(349, 'Perkidopa Tm Tab.', '', '', '', 'Square Pharmaceuticals Ltd.', '0', '', '2020-10-06 18:00:00', '2020-10-06 18:00:00'),
(350, 'Perkinil Tab/Inj.', '', '', '', 'Square Pharmaceuticals Ltd.', '0', '', '2020-10-06 18:00:00', '2020-10-06 18:00:00'),
(351, 'Phylopen Syr.', '', '', '', 'Square Pharmaceuticals Ltd.', '0', '', '2020-10-06 18:00:00', '2020-10-06 18:00:00'),
(352, 'Promtil Tab.', '', '', '', 'Square Pharmaceuticals Ltd.', '0', '', '2020-10-06 18:00:00', '2020-10-06 18:00:00'),
(353, 'Rex Tab.', '', '', '', 'Square Pharmaceuticals Ltd.', '0', '', '2020-10-06 18:00:00', '2020-10-06 18:00:00'),
(354, 'Rupatrol Tm Tab.', '', '', '', 'Square Pharmaceuticals Ltd.', '0', '', '2020-10-06 18:00:00', '2020-10-06 18:00:00'),
(355, 'Scabex Cream', '', '', '', 'Square Pharmaceuticals Ltd.', '0', '', '2020-10-06 18:00:00', '2020-10-06 18:00:00'),
(356, 'Seclo Cap.', '', '', '', 'Square Pharmaceuticals Ltd.', '0', '', '2020-10-06 18:00:00', '2020-10-06 18:00:00'),
(357, 'Secrin Tab.', '', '', '', 'Square Pharmaceuticals Ltd.', '0', '', '2020-10-06 18:00:00', '2020-10-06 18:00:00'),
(358, 'Secrin M Tab.', '', '', '', 'Square Pharmaceuticals Ltd.', '0', '', '2020-10-06 18:00:00', '2020-10-06 18:00:00'),
(359, 'Sedil Tab.', '', '', '', 'Square Pharmaceuticals Ltd.', '0', '', '2020-10-06 18:00:00', '2020-10-06 18:00:00'),
(360, 'Sedno Tab.', '', '', '', 'Square Pharmaceuticals Ltd.', '0', '', '2020-10-06 18:00:00', '2020-10-06 18:00:00'),
(361, 'Solo Nasal Drops', '', '', '', 'Square Pharmaceuticals Ltd.', '0', '', '2020-10-06 18:00:00', '2020-10-06 18:00:00'),
(362, 'Tazid Inj.', '', '', '', 'Square Pharmaceuticals Ltd.', '0', '', '2020-10-06 18:00:00', '2020-10-06 18:00:00'),
(363, 'Tebast Tab.', '', '', '', 'Square Pharmaceuticals Ltd.', '0', '', '2020-10-06 18:00:00', '2020-10-06 18:00:00'),
(364, 'Tetrax Cap.', '', '', '', 'Square Pharmaceuticals Ltd.', '0', '', '2020-10-06 18:00:00', '2020-10-06 18:00:00'),
(365, 'Thyrin 25/50 Tab.', '', '', '', 'Square Pharmaceuticals Ltd.', '0', '', '2020-10-06 18:00:00', '2020-10-06 18:00:00'),
(366, 'Topicort Cream', '', '', '', 'Square Pharmaceuticals Ltd.', '0', '', '2020-10-06 18:00:00', '2020-10-06 18:00:00'),
(367, 'Torax Tab.', '', '', '', 'Square Pharmaceuticals Ltd.', '0', '', '2020-10-06 18:00:00', '2020-10-06 18:00:00'),
(368, 'Tory Tab.', '', '', '', 'Square Pharmaceuticals Ltd.', '0', '', '2020-10-06 18:00:00', '2020-10-06 18:00:00'),
(369, 'Trevox Tab.', '', '', '', 'Square Pharmaceuticals Ltd.', '0', '', '2020-10-06 18:00:00', '2020-10-06 18:00:00'),
(370, 'Trupan Tab.', '', '', '', 'Square Pharmaceuticals Ltd.', '0', '', '2020-10-06 18:00:00', '2020-10-06 18:00:00'),
(371, 'Tryptin Tab.', '', '', '', 'Square Pharmaceuticals Ltd.', '0', '', '2020-10-06 18:00:00', '2020-10-06 18:00:00'),
(372, 'Tusca Plus Syr.', '', '', '', 'Square Pharmaceuticals Ltd.', '0', '', '2020-10-06 18:00:00', '2020-10-06 18:00:00'),
(373, 'Virux Tab.', '', '', '', 'Square Pharmaceuticals Ltd.', '0', '', '2020-10-06 18:00:00', '2020-10-06 18:00:00'),
(374, 'Virux Syr.', '', '', '', 'Square Pharmaceuticals Ltd.', '0', '', '2020-10-06 18:00:00', '2020-10-06 18:00:00'),
(375, 'Vori Tab', '', '', '', 'Square Pharmaceuticals Ltd.', '0', '', '2020-10-06 18:00:00', '2020-10-06 18:00:00'),
(376, 'Zanthin Cap.', '', '', '', 'Square Pharmaceuticals Ltd.', '0', '', '2020-10-06 18:00:00', '2020-10-06 18:00:00'),
(377, 'Zimax Tab.', '', '', '', 'Square Pharmaceuticals Ltd.', '0', '', '2020-10-06 18:00:00', '2020-10-06 18:00:00'),
(378, 'Zox Syr.', '', '', '', 'Square Pharmaceuticals Ltd.', '0', '', '2020-10-06 18:00:00', '2020-10-06 18:00:00'),
(379, 'Nutrum Eye Cap.', '', '', '', 'Acme Pharma', '0', '', '2020-10-06 18:00:00', '2020-10-06 18:00:00'),
(380, 'Ketifen Tab.', '', '', '', 'Acme Pharma', '0', '', '2020-10-06 18:00:00', '2020-10-06 18:00:00'),
(381, 'Ben A', '', '', '', 'Acme Pharma', '0', '', '2020-10-06 18:00:00', '2020-10-06 18:00:00'),
(382, 'Losart Tab.', '', '', '', 'Acme Pharma', '0', '', '2020-10-06 18:00:00', '2020-10-06 18:00:00'),
(383, 'Rhinozol N/D', '', '', '', 'Acme Pharma', '0', '', '2020-10-06 18:00:00', '2020-10-06 18:00:00'),
(384, 'Lipitor Tab.', '', '', '', 'Acme Pharma', '0', '', '2020-10-06 18:00:00', '2020-10-06 18:00:00'),
(385, 'V-Plex Tab.', '', '', '', 'Acme Pharma', '0', '', '2020-10-06 18:00:00', '2020-10-06 18:00:00'),
(386, 'Z- Max 500 Tab.', '', '', '', 'Acme Pharma', '0', '', '2020-10-06 18:00:00', '2020-10-06 18:00:00'),
(387, 'A Cal Tab.', '', '', '', 'Acme Pharma', '0', '', '2020-10-06 18:00:00', '2020-10-06 18:00:00'),
(388, 'Amlopin Tab.', '', '', '', 'Acme Pharma', '0', '', '2020-10-06 18:00:00', '2020-10-06 18:00:00'),
(389, 'Amloten Tab.', '', '', '', 'Acme Pharma', '0', '', '2020-10-06 18:00:00', '2020-10-06 18:00:00'),
(390, 'A-fenac Tab.', '', '', '', 'Acme Pharma', '0', '', '2020-10-06 18:00:00', '2020-10-06 18:00:00'),
(391, 'Gliclid Tab.', '', '', '', 'Acme Pharma', '0', '', '2020-10-06 18:00:00', '2020-10-06 18:00:00'),
(392, 'Erocin 500 Tab.', '', '', '', 'Acme Pharma', '0', '', '2020-10-06 18:00:00', '2020-10-06 18:00:00'),
(393, 'Lifil-E Cap.', '', '', '', 'Acme Pharma', '0', '', '2020-10-06 18:00:00', '2020-10-06 18:00:00'),
(394, 'Alanil 120 Tab.', '', '', '', 'Acme Pharma', '0', '', '2020-10-06 18:00:00', '2020-10-06 18:00:00'),
(395, 'Apitac 100 Tab.', '', '', '', 'Acme Pharma', '0', '', '2020-10-06 18:00:00', '2020-10-06 18:00:00'),
(396, 'Fluconal Tab.', '', '', '', 'Acme Pharma', '0', '', '2020-10-06 18:00:00', '2020-10-06 18:00:00'),
(397, 'Fluzin Tab.', '', '', '', 'Acme Pharma', '0', '', '2020-10-06 18:00:00', '2020-10-06 18:00:00'),
(398, 'Cubimox Tab.', '', '', '', 'Acme Pharma', '0', '', '2020-10-06 18:00:00', '2020-10-06 18:00:00'),
(399, 'Maxima Cap.', '', '', '', 'Acme Pharma', '0', '', '2020-10-06 18:00:00', '2020-10-06 18:00:00'),
(400, 'Levopa Tab.', '', '', '', 'Acme Pharma', '0', '', '2020-10-06 18:00:00', '2020-10-06 18:00:00'),
(401, 'Rupastin Tab.', '', '', '', 'Acme Pharma', '0', '', '2020-10-06 18:00:00', '2020-10-06 18:00:00'),
(402, 'PPI Cap.', '', '', '', 'Acme Pharma', '0', '', '2020-10-06 18:00:00', '2020-10-06 18:00:00'),
(403, 'A-Tatra Cap.', '', '', '', 'Acme Pharma', '0', '', '2020-10-06 18:00:00', '2020-10-06 18:00:00'),
(404, 'Winop Tab.', '', '', '', 'Acme Pharma', '0', '', '2020-10-06 18:00:00', '2020-10-06 18:00:00'),
(405, 'Leo Tab.', '', '', '', 'Acme Pharma', '0', '', '2020-10-06 18:00:00', '2020-10-06 18:00:00'),
(406, 'Azin 500 Tab.', '', '', '', 'Acme Pharma', '0', '', '2020-10-06 18:00:00', '2020-10-06 18:00:00'),
(407, 'Nidozox Tab.', '', '', '', 'Acme Pharma', '0', '', '2020-10-06 18:00:00', '2020-10-06 18:00:00'),
(408, 'Acemox ', '', '', '', 'Acme Pharma', '0', '', '2020-10-06 18:00:00', '2020-10-06 18:00:00'),
(409, 'A-Cal-D', '', '', '', 'Acme Pharma', '0', '', '2020-10-06 18:00:00', '2020-10-06 18:00:00'),
(410, 'Aclox', '', '', '', 'Acme Pharma', '0', '', '2020-10-06 18:00:00', '2020-10-06 18:00:00'),
(411, 'A-fenac-K', '', '', '', 'Acme Pharma', '0', '', '2020-10-06 18:00:00', '2020-10-06 18:00:00'),
(412, 'Baby Zinc', '', '', '', 'Acme Pharma', '0', '', '2020-10-06 18:00:00', '2020-10-06 18:00:00'),
(413, 'A-flox Inj./ Cap.', '', '', '', 'Acme Pharma', '0', '', '2020-10-06 18:00:00', '2020-10-06 18:00:00'),
(414, 'Ferocit 200 Tab.', '', '', '', 'Acme Pharma', '0', '', '2020-10-06 18:00:00', '2020-10-06 18:00:00'),
(415, 'Glypes E/D', '', '', '', 'Acme Pharma', '0', '', '2020-10-06 18:00:00', '2020-10-06 18:00:00'),
(416, 'Indo-A ', '', '', '', 'Acme Pharma', '0', '', '2020-10-06 18:00:00', '2020-10-06 18:00:00'),
(417, 'Profen Tab.', '', '', '', 'Acme Pharma', '0', '', '2020-10-06 18:00:00', '2020-10-06 18:00:00'),
(418, 'Napro-A Tab.', '', '', '', 'Acme Pharma', '0', '', '2020-10-06 18:00:00', '2020-10-06 18:00:00'),
(419, 'Napro-A Plus Tab.', '', '', '', 'Acme Pharma', '0', '', '2020-10-06 18:00:00', '2020-10-06 18:00:00'),
(420, 'Norflu Tab.', '', '', '', 'Acme Pharma', '0', '', '2020-10-06 18:00:00', '2020-10-06 18:00:00'),
(421, 'Rabizol Tab.', '', '', '', 'Acme Pharma', '0', '', '2020-10-06 18:00:00', '2020-10-06 18:00:00'),
(422, 'Ranidin Tab.', '', '', '', 'Acme Pharma', '0', '', '2020-10-06 18:00:00', '2020-10-06 18:00:00'),
(423, 'Ranidin Tab.', '', '', '', 'Acme Pharma', '0', '', '2020-10-06 18:00:00', '2020-10-06 18:00:00'),
(424, 'Ranidin Syr.', '', '', '', 'Acme Pharma', '0', '', '2020-10-06 18:00:00', '2020-10-06 18:00:00'),
(425, 'Ranidin Inj.', '', '', '', 'Acme Pharma', '0', '', '2020-10-06 18:00:00', '2020-10-06 18:00:00'),
(426, 'A-B1 Tab.', '', '', '', 'Acme Pharma', '0', '', '2020-10-06 18:00:00', '2020-10-06 18:00:00'),
(427, 'Lifil-A Cap.', '', '', '', 'Acme Pharma', '0', '', '2020-10-06 18:00:00', '2020-10-06 18:00:00');
INSERT INTO `medicines` (`id`, `name`, `mg`, `type`, `medicine_group`, `company`, `price`, `info`, `created_at`, `updated_at`) VALUES
(428, 'Moxquin E/D', '', '', '', 'Incepta Pharmaceuticals', '0', '', '2020-10-06 18:00:00', '2020-10-06 18:00:00'),
(429, 'Besiven E/D', '', '', '', 'Incepta Pharmaceuticals', '0', '', '2020-10-06 18:00:00', '2020-10-06 18:00:00'),
(430, 'Levoxin E/D', '', '', '', 'Incepta Pharmaceuticals', '0', '', '2020-10-06 18:00:00', '2020-10-06 18:00:00'),
(431, 'Lomequin E/D', '', '', '', 'Incepta Pharmaceuticals', '0', '', '2020-10-06 18:00:00', '2020-10-06 18:00:00'),
(432, 'Beuflox E/D', '', '', '', 'Incepta Pharmaceuticals', '0', '', '2020-10-06 18:00:00', '2020-10-06 18:00:00'),
(433, 'Freshfil E/D', '', '', '', 'Incepta Pharmaceuticals', '0', '', '2020-10-06 18:00:00', '2020-10-06 18:00:00'),
(434, 'Filtear E/D', '', '', '', 'Incepta Pharmaceuticals', '0', '', '2020-10-06 18:00:00', '2020-10-06 18:00:00'),
(435, 'Lubric E/D', '', '', '', 'Incepta Pharmaceuticals', '0', '', '2020-10-06 18:00:00', '2020-10-06 18:00:00'),
(436, 'Lubric Extra', '', '', '', 'Incepta Pharmaceuticals', '0', '', '2020-10-06 18:00:00', '2020-10-06 18:00:00'),
(437, 'Sporium E/D', '', '', '', 'Incepta Pharmaceuticals', '0', '', '2020-10-06 18:00:00', '2020-10-06 18:00:00'),
(438, 'Alcafta E/D', '', '', '', 'Incepta Pharmaceuticals', '0', '', '2020-10-06 18:00:00', '2020-10-06 18:00:00'),
(439, 'Betastin E/D', '', '', '', 'Incepta Pharmaceuticals', '0', '', '2020-10-06 18:00:00', '2020-10-06 18:00:00'),
(440, 'Lopadin DS E/D', '', '', '', 'Incepta Pharmaceuticals', '0', '', '2020-10-06 18:00:00', '2020-10-06 18:00:00'),
(441, 'LOpadin Max E/D', '', '', '', 'Incepta Pharmaceuticals', '0', '', '2020-10-06 18:00:00', '2020-10-06 18:00:00'),
(442, 'Lotepred-DS E/D', '', '', '', 'Incepta Pharmaceuticals', '0', '', '2020-10-06 18:00:00', '2020-10-06 18:00:00'),
(443, 'Cortan E/D', '', '', '', 'Incepta Pharmaceuticals', '0', '', '2020-10-06 18:00:00', '2020-10-06 18:00:00'),
(444, 'Metalone E/D', '', '', '', 'Incepta Pharmaceuticals', '0', '', '2020-10-06 18:00:00', '2020-10-06 18:00:00'),
(445, 'Metadaxan E/D', '', '', '', 'Incepta Pharmaceuticals', '0', '', '2020-10-06 18:00:00', '2020-10-06 18:00:00'),
(446, 'Travast E/D', '', '', '', 'Incepta Pharmaceuticals', '0', '', '2020-10-06 18:00:00', '2020-10-06 18:00:00'),
(447, 'Brimodin E/D', '', '', '', 'Incepta Pharmaceuticals', '0', '', '2020-10-06 18:00:00', '2020-10-06 18:00:00'),
(448, 'Travast Plus E/D', '', '', '', 'Incepta Pharmaceuticals', '0', '', '2020-10-06 18:00:00', '2020-10-06 18:00:00'),
(449, 'Timopress E/D', '', '', '', 'Incepta Pharmaceuticals', '0', '', '2020-10-06 18:00:00', '2020-10-06 18:00:00'),
(450, 'Zolaren E/D', '', '', '', 'Incepta Pharmaceuticals', '0', '', '2020-10-06 18:00:00', '2020-10-06 18:00:00'),
(451, 'Zolaren Plus E/D', '', '', '', 'Incepta Pharmaceuticals', '0', '', '2020-10-06 18:00:00', '2020-10-06 18:00:00'),
(452, 'Brimondin Plus E/D', '', '', '', 'Incepta Pharmaceuticals', '0', '', '2020-10-06 18:00:00', '2020-10-06 18:00:00'),
(453, 'Xibrofen E/D', '', '', '', 'Incepta Pharmaceuticals', '0', '', '2020-10-06 18:00:00', '2020-10-06 18:00:00'),
(454, 'Lotepred Plus E/D', '', '', '', 'Incepta Pharmaceuticals', '0', '', '2020-10-06 18:00:00', '2020-10-06 18:00:00'),
(455, 'Gatiflox E/D', '', '', '', 'Incepta Pharmaceuticals', '0', '', '2020-10-06 18:00:00', '2020-10-06 18:00:00'),
(456, 'Metalone Plus E/D', '', '', '', 'Incepta Pharmaceuticals', '0', '', '2020-10-06 18:00:00', '2020-10-06 18:00:00'),
(457, 'Azecol Eye Cap.', '', '', '', 'Incepta Pharmaceuticals', '0', '', '2020-10-06 18:00:00', '2020-10-06 18:00:00'),
(458, 'Dilate E/D', '', '', '', 'Incepta Pharmaceuticals', '0', '', '2020-10-06 18:00:00', '2020-10-06 18:00:00'),
(459, 'Dilate Plus E/D', '', '', '', 'Incepta Pharmaceuticals', '0', '', '2020-10-06 18:00:00', '2020-10-06 18:00:00'),
(460, 'Visitear E/D', '', '', '', 'Incepta Pharmaceuticals', '0', '', '2020-10-06 18:00:00', '2020-10-06 18:00:00'),
(461, 'Reset Tab.', '', '', '', 'Incepta Pharmaceuticals', '0', '', '2020-10-06 18:00:00', '2020-10-06 18:00:00'),
(462, 'Reset ER Tab.', '', '', '', 'Incepta Pharmaceuticals', '0', '', '2020-10-06 18:00:00', '2020-10-06 18:00:00'),
(463, 'Osartil 25 Tab.', '', '', '', 'Incepta Pharmaceuticals', '0', '', '2020-10-06 18:00:00', '2020-10-06 18:00:00'),
(464, 'Tisinor Tab.', '', '', '', 'Incepta Pharmaceuticals', '0', '', '2020-10-06 18:00:00', '2020-10-06 18:00:00'),
(465, 'Calcicar 500 Tab.', '', '', '', 'Incepta Pharmaceuticals', '0', '', '2020-10-06 18:00:00', '2020-10-06 18:00:00'),
(466, 'Calvimax-D Tab.', '', '', '', 'Incepta Pharmaceuticals', '0', '', '2020-10-06 18:00:00', '2020-10-06 18:00:00'),
(467, 'Amlotab Tab.', '', '', '', 'Incepta Pharmaceuticals', '0', '', '2020-10-06 18:00:00', '2020-10-06 18:00:00'),
(468, 'Fixocard Tab.', '', '', '', 'Incepta Pharmaceuticals', '0', '', '2020-10-06 18:00:00', '2020-10-06 18:00:00'),
(469, 'Cefaclav Tab.', '', '', '', 'Incepta Pharmaceuticals', '0', '', '2020-10-06 18:00:00', '2020-10-06 18:00:00'),
(470, 'Vinsetine Tab.', '', '', '', 'Incepta Pharmaceuticals', '0', '', '2020-10-06 18:00:00', '2020-10-06 18:00:00'),
(471, 'Nobesit Tab.', '', '', '', 'Incepta Pharmaceuticals', '0', '', '2020-10-06 18:00:00', '2020-10-06 18:00:00'),
(472, 'Joinix Plus Tab.', '', '', '', 'Incepta Pharmaceuticals', '0', '', '2020-10-06 18:00:00', '2020-10-06 18:00:00'),
(473, 'DeflazitTab.', '', '', '', 'Incepta Pharmaceuticals', '0', '', '2020-10-06 18:00:00', '2020-10-06 18:00:00'),
(474, 'Inovit E Cap.', '', '', '', 'Incepta Pharmaceuticals', '0', '', '2020-10-06 18:00:00', '2020-10-06 18:00:00'),
(475, 'Reservix Tab.', '', '', '', 'Incepta Pharmaceuticals', '0', '', '2020-10-06 18:00:00', '2020-10-06 18:00:00'),
(476, 'Nispore  Cap.', '', '', '', 'Incepta Pharmaceuticals', '0', '', '2020-10-06 18:00:00', '2020-10-06 18:00:00'),
(477, 'Cortan Tab.', '', '', '', 'Incepta Pharmaceuticals', '0', '', '2020-10-06 18:00:00', '2020-10-06 18:00:00'),
(478, 'Mixquin Tab.', '', '', '', 'Incepta Pharmaceuticals', '0', '', '2020-10-06 18:00:00', '2020-10-06 18:00:00'),
(479, 'Mecolagin Tab.', '', '', '', 'Incepta Pharmaceuticals', '0', '', '2020-10-06 18:00:00', '2020-10-06 18:00:00'),
(480, 'Levoxin Tab.', '', '', '', 'Incepta Pharmaceuticals', '0', '', '2020-10-06 18:00:00', '2020-10-06 18:00:00'),
(481, 'Omidon Tab.', '', '', '', 'Incepta Pharmaceuticals', '0', '', '2020-10-06 18:00:00', '2020-10-06 18:00:00'),
(482, 'Vitabion Tab.', '', '', '', 'Incepta Pharmaceuticals', '0', '', '2020-10-06 18:00:00', '2020-10-06 18:00:00'),
(483, 'Esonix Tab.', '', '', '', 'Incepta Pharmaceuticals', '0', '', '2020-10-06 18:00:00', '2020-10-06 18:00:00'),
(484, 'Rupex Tab.', '', '', '', 'Incepta Pharmaceuticals', '0', '', '2020-10-06 18:00:00', '2020-10-06 18:00:00'),
(485, 'Etorac Tab.', '', '', '', 'Incepta Pharmaceuticals', '0', '', '2020-10-06 18:00:00', '2020-10-06 18:00:00'),
(486, 'Oricox Tab.', '', '', '', 'Incepta Pharmaceuticals', '0', '', '2020-10-06 18:00:00', '2020-10-06 18:00:00'),
(487, 'Simplovir Tab.', '', '', '', 'Incepta Pharmaceuticals', '0', '', '2020-10-06 18:00:00', '2020-10-06 18:00:00'),
(488, 'Azta Cap.', '', '', '', 'Incepta Pharmaceuticals', '0', '', '2020-10-06 18:00:00', '2020-10-06 18:00:00'),
(489, 'Tridosil Tab.', '', '', '', 'Incepta Pharmaceuticals', '0', '', '2020-10-06 18:00:00', '2020-10-06 18:00:00'),
(490, 'Intaflam Tab.', '', '', '', 'Incepta Pharmaceuticals', '0', '', '2020-10-06 18:00:00', '2020-10-06 18:00:00'),
(491, 'Amlosartan Tab.', '', '', '', 'Incepta Pharmaceuticals', '0', '', '2020-10-06 18:00:00', '2020-10-06 18:00:00'),
(492, 'Florium Tab.', '', '', '', 'Incepta Pharmaceuticals', '0', '', '2020-10-06 18:00:00', '2020-10-06 18:00:00'),
(493, 'Nispore  E/D', '', '', '', 'Incepta Pharmaceuticals', '0', '', '2020-10-06 18:00:00', '2020-10-06 18:00:00'),
(494, 'Joinix Tab.', '', '', '', 'Incepta Pharmaceuticals', '0', '', '2020-10-06 18:00:00', '2020-10-06 18:00:00'),
(495, 'Seasnix Tab.', '', '', '', 'Incepta Pharmaceuticals', '0', '', '2020-10-06 18:00:00', '2020-10-06 18:00:00'),
(496, 'Montair Tab.', '', '', '', 'Incepta Pharmaceuticals', '0', '', '2020-10-06 18:00:00', '2020-10-06 18:00:00'),
(497, 'Myolax Tab.', '', '', '', 'Incepta Pharmaceuticals', '0', '', '2020-10-06 18:00:00', '2020-10-06 18:00:00'),
(498, 'Sardopa Tab.', '', '', '', 'Incepta Pharmaceuticals', '0', '', '2020-10-06 18:00:00', '2020-10-06 18:00:00'),
(499, 'Topirva Tab.', '', '', '', 'Incepta Pharmaceuticals', '0', '', '2020-10-06 18:00:00', '2020-10-06 18:00:00'),
(500, 'Magfin Oral Emulsion', '', '', '', 'Incepta Pharmaceuticals', '0', '', '2020-10-06 18:00:00', '2020-10-06 18:00:00');

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
(3, '2019_08_19_000000_create_failed_jobs_table', 1),
(4, '2020_07_27_200640_create_doctor_specialists_table', 1),
(5, '2020_08_14_203753_create_patients_table', 1),
(6, '2020_08_16_090712_create_appointments_table', 1),
(7, '2020_08_19_231429_create_permission_tables', 1),
(17, '2020_08_24_210340_create_prescriptions_table', 2),
(18, '2020_09_05_155345_create_prescription_infos_table', 2),
(20, '2020_08_23_220813_create_medicines_table', 3),
(21, '2020_08_26_215731_create_medical_tests_table', 4),
(24, '2020_10_07_131454_create_visitor_infos_table', 6),
(26, '2020_10_13_075542_create_doctor_specialist_cats_table', 7),
(27, '2020_10_18_173756_create_doctor_chambers_table', 8),
(29, '2020_10_18_221227_create_doctor_times_table', 9),
(30, '2020_11_02_150555_create_test_cats_table', 10),
(31, '2020_09_09_224149_create_patient_tests_table', 11);

-- --------------------------------------------------------

--
-- Table structure for table `model_has_permissions`
--

CREATE TABLE `model_has_permissions` (
  `permission_id` bigint(20) UNSIGNED NOT NULL,
  `model_type` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `model_id` bigint(20) UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `model_has_roles`
--

CREATE TABLE `model_has_roles` (
  `role_id` bigint(20) UNSIGNED NOT NULL,
  `model_type` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `model_id` bigint(20) UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `model_has_roles`
--

INSERT INTO `model_has_roles` (`role_id`, `model_type`, `model_id`) VALUES
(1, 'App\\User', 1),
(1, 'App\\User', 9),
(3, 'App\\User', 10),
(3, 'App\\User', 11);

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
-- Table structure for table `patients`
--

CREATE TABLE `patients` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `age` int(11) NOT NULL,
  `gender` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `phone` int(11) NOT NULL,
  `address` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `add_by` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `mdical_history` text COLLATE utf8mb4_unicode_ci,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `patients`
--

INSERT INTO `patients` (`id`, `name`, `age`, `gender`, `email`, `phone`, `address`, `add_by`, `mdical_history`, `created_at`, `updated_at`) VALUES
(1, 'Md. Shafiul Hasan', 22, 'Male', 'msh.shafiul@gmail.com', 1725848515, 'Dhaka', NULL, NULL, '2020-09-04 03:34:58', '2020-09-04 03:34:58'),
(2, 'Md Anwar Hossain', 22, 'Male', 'anwar@focustaxation.com.au', 433282508, 'Dhaka', NULL, NULL, '2020-09-04 03:35:47', '2020-09-04 03:35:47'),
(11, 'Md. Najmul Hasan', 24, 'Male', NULL, 1920962512, 'Meherpur', NULL, NULL, '2020-10-29 04:37:39', '2020-10-29 04:37:39');

-- --------------------------------------------------------

--
-- Table structure for table `patient_tests`
--

CREATE TABLE `patient_tests` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `doctor_id` bigint(20) UNSIGNED NOT NULL,
  `patient_id` bigint(20) UNSIGNED NOT NULL,
  `apnmt_id` bigint(20) UNSIGNED NOT NULL,
  `test_cat_id` bigint(20) UNSIGNED NOT NULL,
  `date` date NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `patient_tests`
--

INSERT INTO `patient_tests` (`id`, `doctor_id`, `patient_id`, `apnmt_id`, `test_cat_id`, `date`, `created_at`, `updated_at`) VALUES
(1, 10, 11, 1, 3, '2020-12-08', '2020-12-08 05:14:32', '2020-12-08 05:14:32'),
(2, 10, 11, 1, 2, '2020-12-08', '2020-12-08 05:14:32', '2020-12-08 05:14:32');

-- --------------------------------------------------------

--
-- Table structure for table `permissions`
--

CREATE TABLE `permissions` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `guard_name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `permissions`
--

INSERT INTO `permissions` (`id`, `name`, `guard_name`, `created_at`, `updated_at`) VALUES
(1, 'admin', 'web', NULL, NULL),
(2, 'counter', 'web', NULL, NULL),
(3, 'doctor', 'web', NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `prescriptions`
--

CREATE TABLE `prescriptions` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `doctor_id` int(11) NOT NULL,
  `patient_id` int(11) NOT NULL,
  `apnmt_id` int(11) NOT NULL,
  `medicine_id` int(11) NOT NULL,
  `eating_time` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `days` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `date` date NOT NULL,
  `note` text COLLATE utf8mb4_unicode_ci,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `prescriptions`
--

INSERT INTO `prescriptions` (`id`, `doctor_id`, `patient_id`, `apnmt_id`, `medicine_id`, `eating_time`, `days`, `date`, `note`, `created_at`, `updated_at`) VALUES
(1, 10, 11, 1, 5, '1+0+1', '3 Days', '2020-12-08', NULL, '2020-12-08 05:09:32', '2020-12-08 05:09:32'),
(2, 10, 11, 1, 12, '1+0+1', '5 Days', '2020-12-08', NULL, '2020-12-08 05:09:32', '2020-12-08 05:09:32'),
(3, 10, 11, 1, 1, '1+0+1', '7 Days', '2020-12-08', NULL, '2020-12-08 05:09:32', '2020-12-08 05:09:32');

-- --------------------------------------------------------

--
-- Table structure for table `prescription_infos`
--

CREATE TABLE `prescription_infos` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `apnmt_id` int(11) NOT NULL,
  `next_meet` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `advice` text COLLATE utf8mb4_unicode_ci,
  `symptoms` text COLLATE utf8mb4_unicode_ci,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `prescription_infos`
--

INSERT INTO `prescription_infos` (`id`, `apnmt_id`, `next_meet`, `advice`, `symptoms`, `created_at`, `updated_at`) VALUES
(1, 1, '1 Month', NULL, '<p><strong>BP:</strong></p><p>100/80</p><p>Diabetes:</p><p>7</p>', '2020-12-08 05:09:32', '2020-12-08 05:09:32');

-- --------------------------------------------------------

--
-- Table structure for table `roles`
--

CREATE TABLE `roles` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `guard_name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `roles`
--

INSERT INTO `roles` (`id`, `name`, `guard_name`, `created_at`, `updated_at`) VALUES
(1, 'admin', 'web', NULL, NULL),
(2, 'counter', 'web', NULL, NULL),
(3, 'doctor', 'web', NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `role_has_permissions`
--

CREATE TABLE `role_has_permissions` (
  `permission_id` bigint(20) UNSIGNED NOT NULL,
  `role_id` bigint(20) UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `role_has_permissions`
--

INSERT INTO `role_has_permissions` (`permission_id`, `role_id`) VALUES
(1, 1),
(1, 2),
(2, 2),
(1, 3),
(3, 3);

-- --------------------------------------------------------

--
-- Table structure for table `specialist_cats`
--

CREATE TABLE `specialist_cats` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `specialist` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `specialist_cats`
--

INSERT INTO `specialist_cats` (`id`, `specialist`, `created_at`, `updated_at`) VALUES
(1, 'Eye Specialist & Surgeon', NULL, NULL),
(2, 'Eye Specialist & Micro Surgeon', '2020-10-29 02:15:33', '2020-10-29 02:15:33');

-- --------------------------------------------------------

--
-- Table structure for table `specialist_sub_cats`
--

CREATE TABLE `specialist_sub_cats` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `doctor_id` bigint(20) UNSIGNED NOT NULL,
  `specialist_cat_id` bigint(20) UNSIGNED NOT NULL,
  `degree` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `info` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `specialist_sub_cats`
--

INSERT INTO `specialist_sub_cats` (`id`, `doctor_id`, `specialist_cat_id`, `degree`, `info`, `created_at`, `updated_at`) VALUES
(2, 1, 1, 'sadf', NULL, '2020-10-13 04:53:27', '2020-10-13 04:53:27'),
(3, 10, 1, 'FCPS', NULL, '2020-10-13 04:53:27', '2020-10-13 04:53:27'),
(4, 10, 1, 'MBBS, D.OPH, MS(Eye)', NULL, '2020-10-13 04:53:27', '2020-10-13 04:53:27'),
(5, 11, 2, 'MBBS, D.O, MS(Eye)', NULL, '2020-10-29 02:19:14', '2020-10-29 02:19:14');

-- --------------------------------------------------------

--
-- Table structure for table `test_cats`
--

CREATE TABLE `test_cats` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `info` text COLLATE utf8mb4_unicode_ci,
  `amount` decimal(8,2) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `test_cats`
--

INSERT INTO `test_cats` (`id`, `name`, `info`, `amount`, `created_at`, `updated_at`) VALUES
(1, 'name', NULL, NULL, NULL, NULL),
(2, 'OGTT', NULL, NULL, NULL, NULL),
(3, 'ACTH', NULL, NULL, NULL, NULL),
(4, 'AFB', NULL, NULL, NULL, NULL),
(5, 'a-Fetoprotien', NULL, NULL, NULL, NULL),
(6, 'AFP', NULL, NULL, NULL, NULL),
(7, 'Albumin', NULL, NULL, NULL, NULL),
(8, 'ANA', NULL, NULL, NULL, NULL),
(9, 'ANF', NULL, NULL, NULL, NULL),
(10, 'APTT', NULL, NULL, NULL, NULL),
(11, 'BCG', NULL, NULL, NULL, NULL),
(12, 'Benzodiazepine', NULL, NULL, NULL, NULL),
(13, 'Bones', NULL, NULL, NULL, NULL),
(14, 'Brain', NULL, NULL, NULL, NULL),
(15, 'Brain/Orbits', NULL, NULL, NULL, NULL),
(16, 'Breasts', NULL, NULL, NULL, NULL),
(17, 'BT', NULL, NULL, NULL, NULL),
(18, 'C/S', NULL, NULL, NULL, NULL),
(19, 'C/S', NULL, NULL, NULL, NULL),
(20, 'C/S', NULL, NULL, NULL, NULL),
(21, 'C/S', NULL, NULL, NULL, NULL),
(22, 'C/S', NULL, NULL, NULL, NULL),
(23, 'C/S', NULL, NULL, NULL, NULL),
(24, 'C/S', NULL, NULL, NULL, NULL),
(25, 'C/S', NULL, NULL, NULL, NULL),
(26, 'C3', NULL, NULL, NULL, NULL),
(27, 'CA-125', NULL, NULL, NULL, NULL),
(28, 'CA-15.3', NULL, NULL, NULL, NULL),
(29, 'Ca-19.9', NULL, NULL, NULL, NULL),
(30, 'Cannabinoids', NULL, NULL, NULL, NULL),
(31, 'Carbamazepine', NULL, NULL, NULL, NULL),
(32, 'CEA', NULL, NULL, NULL, NULL),
(33, 'Chest/Lungs', NULL, NULL, NULL, NULL),
(34, 'Chest/Lungs', NULL, NULL, NULL, NULL),
(35, 'Cortisol', NULL, NULL, NULL, NULL),
(36, 'CRP', NULL, NULL, NULL, NULL),
(37, 'Cycaosporyne', NULL, NULL, NULL, NULL),
(38, 'Diagnostic', NULL, NULL, NULL, NULL),
(39, 'Digoxin', NULL, NULL, NULL, NULL),
(40, 'DPT', NULL, NULL, NULL, NULL),
(41, 'E.C.G', NULL, NULL, NULL, NULL),
(42, 'E.E.G', NULL, NULL, NULL, NULL),
(43, 'E.M.G/N.C.V', NULL, NULL, NULL, NULL),
(44, 'ERCP', NULL, NULL, NULL, NULL),
(45, 'Estradiol', NULL, NULL, NULL, NULL),
(46, 'FDP', NULL, NULL, NULL, NULL),
(47, 'Feritin', NULL, NULL, NULL, NULL),
(48, 'Fibrinogen', NULL, NULL, NULL, NULL),
(49, 'FSH', NULL, NULL, NULL, NULL),
(50, 'FT3', NULL, NULL, NULL, NULL),
(51, 'FT4', NULL, NULL, NULL, NULL),
(52, 'GC', NULL, NULL, NULL, NULL),
(53, 'Gentamicin', NULL, NULL, NULL, NULL),
(54, 'GFR', NULL, NULL, NULL, NULL),
(55, 'Globulin', NULL, NULL, NULL, NULL),
(56, 'HCT/PCV', NULL, NULL, NULL, NULL),
(57, 'Homocysteine', NULL, NULL, NULL, NULL),
(58, 'IgA', NULL, NULL, NULL, NULL),
(59, 'IgE', NULL, NULL, NULL, NULL),
(60, 'IgG', NULL, NULL, NULL, NULL),
(61, 'IgM', NULL, NULL, NULL, NULL),
(62, 'Joint', NULL, NULL, NULL, NULL),
(63, 'KLB', NULL, NULL, NULL, NULL),
(64, 'LDH', NULL, NULL, NULL, NULL),
(65, 'LFT', NULL, NULL, NULL, NULL),
(66, 'LH', NULL, NULL, NULL, NULL),
(67, 'Lithium', NULL, NULL, NULL, NULL),
(68, 'Liver/Pancreas/Kidneys', NULL, NULL, NULL, NULL),
(69, 'MP', NULL, NULL, NULL, NULL),
(70, 'MRCP', NULL, NULL, NULL, NULL),
(71, 'Mumps', NULL, NULL, NULL, NULL),
(72, 'Myelogram', NULL, NULL, NULL, NULL),
(73, 'Myoglobin', NULL, NULL, NULL, NULL),
(74, 'Nasopharynx', NULL, NULL, NULL, NULL),
(75, 'Neck', NULL, NULL, NULL, NULL),
(76, 'OBT', NULL, NULL, NULL, NULL),
(77, 'Opiates', NULL, NULL, NULL, NULL),
(78, 'Orbits', NULL, NULL, NULL, NULL),
(79, 'Orbits', NULL, NULL, NULL, NULL),
(80, 'Osmolality', NULL, NULL, NULL, NULL),
(81, 'Phenytoin', NULL, NULL, NULL, NULL),
(82, 'PNS', NULL, NULL, NULL, NULL),
(83, 'Proctoscopy', NULL, NULL, NULL, NULL),
(84, 'Progresterone', NULL, NULL, NULL, NULL),
(85, 'Prolactin', NULL, NULL, NULL, NULL),
(86, 'PTH', NULL, NULL, NULL, NULL),
(87, 'PUS', NULL, NULL, NULL, NULL),
(88, 'R/E', NULL, NULL, NULL, NULL),
(89, 'R/E', NULL, NULL, NULL, NULL),
(90, 'R/E', NULL, NULL, NULL, NULL),
(91, 'R/E', NULL, NULL, NULL, NULL),
(92, 'R/E', NULL, NULL, NULL, NULL),
(93, 'R/E', NULL, NULL, NULL, NULL),
(94, 'R/E', NULL, NULL, NULL, NULL),
(95, 'R/E', NULL, NULL, NULL, NULL),
(96, 'Rubeola', NULL, NULL, NULL, NULL),
(97, 'S.Amylase', NULL, NULL, NULL, NULL),
(98, 'S.Calcium', NULL, NULL, NULL, NULL),
(99, 'Scrotum/Testes', NULL, NULL, NULL, NULL),
(100, 'Sialogram', NULL, NULL, NULL, NULL),
(101, 'Sigmoidoscopy', NULL, NULL, NULL, NULL),
(102, 'Sputum', NULL, NULL, NULL, NULL),
(103, 'T3', NULL, NULL, NULL, NULL),
(104, 'T4', NULL, NULL, NULL, NULL),
(105, 'TC', NULL, NULL, NULL, NULL),
(106, 'Testosterone', NULL, NULL, NULL, NULL),
(107, 'Thyroid', NULL, NULL, NULL, NULL),
(108, 'TIBC', NULL, NULL, NULL, NULL),
(109, 'TPHA', NULL, NULL, NULL, NULL),
(110, 'TSH', NULL, NULL, NULL, NULL),
(111, 'TVS', NULL, NULL, NULL, NULL),
(112, 'UGT', NULL, NULL, NULL, NULL),
(113, 'Uroflometry', NULL, NULL, NULL, NULL),
(114, 'Zinc', NULL, NULL, NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `role` int(11) NOT NULL DEFAULT '0',
  `is_` int(11) DEFAULT NULL COMMENT '1=Admin,2=Counter,3=Doctor',
  `age` int(11) DEFAULT NULL,
  `gender` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `phone` int(11) DEFAULT NULL,
  `address` text COLLATE utf8mb4_unicode_ci,
  `doctor_specialist` text COLLATE utf8mb4_unicode_ci,
  `fees` decimal(8,2) DEFAULT NULL,
  `photo` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `email_verified_at` timestamp NULL DEFAULT NULL,
  `password` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `remember_token` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `name`, `email`, `role`, `is_`, `age`, `gender`, `phone`, `address`, `doctor_specialist`, `fees`, `photo`, `email_verified_at`, `password`, `remember_token`, `created_at`, `updated_at`) VALUES
(1, 'Admin', 'msh.shafiul@gmail.com', 1, 1, NULL, NULL, NULL, NULL, '0', '0.00', NULL, NULL, '$2y$10$fRPS3dZq7vAME5sEUBu7teO.ZsqgHklWOSaZCRoPDKLJH0MXg73q6', NULL, '2020-09-04 03:31:32', '2020-09-04 03:31:32'),
(9, 'Admin', 'admin@gmail.com', 1, 1, 22, 'male', 433282508, 'Dhaka', '0', '500.00', NULL, NULL, '$2y$10$fRPS3dZq7vAME5sEUBu7teO.ZsqgHklWOSaZCRoPDKLJH0MXg73q6', NULL, '2020-09-07 06:36:14', '2020-09-07 06:36:14'),
(10, 'Prof. Dr. Md.Shahab Uddin', 'shahab@gmail.com', 1, 3, 50, 'male', 1819284449, '‘Ismail Arcade’, Apt#3B, House#27, Road#14/A, Dhanmondi R/A, Dhaka- 1209.', '1', '1000.00', NULL, NULL, '$2y$10$fRPS3dZq7vAME5sEUBu7teO.ZsqgHklWOSaZCRoPDKLJH0MXg73q6', NULL, '2020-10-12 14:43:14', '2020-10-12 14:43:14'),
(11, 'Prof. Dr. Malik Khairul Anam', 'malik@gmail.com', 1, 3, 50, 'male', 1920962512, 'VINCAROSEA, Apt#C4, House#17, Road#12, Dhanmondi R/A, Dhaka- 1209', '2', '1000.00', NULL, NULL, '$2y$10$fRPS3dZq7vAME5sEUBu7teO.ZsqgHklWOSaZCRoPDKLJH0MXg73q6', NULL, '2020-10-29 02:19:14', '2020-10-29 02:19:14');

-- --------------------------------------------------------

--
-- Table structure for table `visitor_infos`
--

CREATE TABLE `visitor_infos` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `ip` varchar(45) COLLATE utf8mb4_unicode_ci NOT NULL,
  `iso_code` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `country` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `city` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `state_name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `postal_code` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `lat` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `lon` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `currency` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `visitor_infos`
--

INSERT INTO `visitor_infos` (`id`, `ip`, `iso_code`, `country`, `city`, `state_name`, `postal_code`, `lat`, `lon`, `currency`, `created_at`, `updated_at`) VALUES
(1, '127.0.0.0', 'US', 'United States', 'New Haven', 'Connecticut', '06510', '41.31', '-72.92', 'USD', '2020-10-07 09:18:40', '2020-10-07 09:18:40');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `appointments`
--
ALTER TABLE `appointments`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `doctor_chambers`
--
ALTER TABLE `doctor_chambers`
  ADD PRIMARY KEY (`id`),
  ADD KEY `doctor_chambers_doctor_id_foreign` (`doctor_id`);

--
-- Indexes for table `doctor_specialists`
--
ALTER TABLE `doctor_specialists`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `doctor_times`
--
ALTER TABLE `doctor_times`
  ADD PRIMARY KEY (`id`),
  ADD KEY `doctor_times_doctor_id_foreign` (`doctor_id`);

--
-- Indexes for table `failed_jobs`
--
ALTER TABLE `failed_jobs`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `medical_tests`
--
ALTER TABLE `medical_tests`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `medicines`
--
ALTER TABLE `medicines`
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
-- Indexes for table `password_resets`
--
ALTER TABLE `password_resets`
  ADD KEY `password_resets_email_index` (`email`);

--
-- Indexes for table `patients`
--
ALTER TABLE `patients`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `patients_email_unique` (`email`);

--
-- Indexes for table `patient_tests`
--
ALTER TABLE `patient_tests`
  ADD PRIMARY KEY (`id`),
  ADD KEY `patient_tests_doctor_id_foreign` (`doctor_id`),
  ADD KEY `patient_tests_patient_id_foreign` (`patient_id`),
  ADD KEY `patient_tests_apnmt_id_foreign` (`apnmt_id`),
  ADD KEY `patient_tests_test_cat_id_foreign` (`test_cat_id`);

--
-- Indexes for table `permissions`
--
ALTER TABLE `permissions`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `prescriptions`
--
ALTER TABLE `prescriptions`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `prescription_infos`
--
ALTER TABLE `prescription_infos`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `roles`
--
ALTER TABLE `roles`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `role_has_permissions`
--
ALTER TABLE `role_has_permissions`
  ADD PRIMARY KEY (`permission_id`,`role_id`),
  ADD KEY `role_has_permissions_role_id_foreign` (`role_id`);

--
-- Indexes for table `specialist_cats`
--
ALTER TABLE `specialist_cats`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `specialist_sub_cats`
--
ALTER TABLE `specialist_sub_cats`
  ADD PRIMARY KEY (`id`),
  ADD KEY `specialist_sub_cats_doctor_id_foreign` (`doctor_id`),
  ADD KEY `specialist_sub_cats_specialist_cat_id_foreign` (`specialist_cat_id`);

--
-- Indexes for table `test_cats`
--
ALTER TABLE `test_cats`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `users_email_unique` (`email`);

--
-- Indexes for table `visitor_infos`
--
ALTER TABLE `visitor_infos`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `appointments`
--
ALTER TABLE `appointments`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `doctor_chambers`
--
ALTER TABLE `doctor_chambers`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `doctor_specialists`
--
ALTER TABLE `doctor_specialists`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;

--
-- AUTO_INCREMENT for table `doctor_times`
--
ALTER TABLE `doctor_times`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=19;

--
-- AUTO_INCREMENT for table `failed_jobs`
--
ALTER TABLE `failed_jobs`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `medical_tests`
--
ALTER TABLE `medical_tests`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `medicines`
--
ALTER TABLE `medicines`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=501;

--
-- AUTO_INCREMENT for table `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=32;

--
-- AUTO_INCREMENT for table `patients`
--
ALTER TABLE `patients`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT for table `patient_tests`
--
ALTER TABLE `patient_tests`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `permissions`
--
ALTER TABLE `permissions`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `prescriptions`
--
ALTER TABLE `prescriptions`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `prescription_infos`
--
ALTER TABLE `prescription_infos`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `roles`
--
ALTER TABLE `roles`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `specialist_cats`
--
ALTER TABLE `specialist_cats`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `specialist_sub_cats`
--
ALTER TABLE `specialist_sub_cats`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `test_cats`
--
ALTER TABLE `test_cats`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=115;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT for table `visitor_infos`
--
ALTER TABLE `visitor_infos`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `doctor_chambers`
--
ALTER TABLE `doctor_chambers`
  ADD CONSTRAINT `doctor_chambers_doctor_id_foreign` FOREIGN KEY (`doctor_id`) REFERENCES `users` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `doctor_times`
--
ALTER TABLE `doctor_times`
  ADD CONSTRAINT `doctor_times_doctor_id_foreign` FOREIGN KEY (`doctor_id`) REFERENCES `users` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

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
-- Constraints for table `patient_tests`
--
ALTER TABLE `patient_tests`
  ADD CONSTRAINT `patient_tests_apnmt_id_foreign` FOREIGN KEY (`apnmt_id`) REFERENCES `appointments` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `patient_tests_doctor_id_foreign` FOREIGN KEY (`doctor_id`) REFERENCES `users` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `patient_tests_patient_id_foreign` FOREIGN KEY (`patient_id`) REFERENCES `patients` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `patient_tests_test_cat_id_foreign` FOREIGN KEY (`test_cat_id`) REFERENCES `test_cats` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `role_has_permissions`
--
ALTER TABLE `role_has_permissions`
  ADD CONSTRAINT `role_has_permissions_permission_id_foreign` FOREIGN KEY (`permission_id`) REFERENCES `permissions` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `role_has_permissions_role_id_foreign` FOREIGN KEY (`role_id`) REFERENCES `roles` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `specialist_sub_cats`
--
ALTER TABLE `specialist_sub_cats`
  ADD CONSTRAINT `specialist_sub_cats_doctor_id_foreign` FOREIGN KEY (`doctor_id`) REFERENCES `users` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `specialist_sub_cats_specialist_cat_id_foreign` FOREIGN KEY (`specialist_cat_id`) REFERENCES `specialist_cats` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
