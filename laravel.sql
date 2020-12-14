-- phpMyAdmin SQL Dump
-- version 5.0.2
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Nov 22, 2020 at 03:52 PM
-- Server version: 10.4.11-MariaDB
-- PHP Version: 7.4.6

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `laravel`
--

-- --------------------------------------------------------

--
-- Table structure for table `courses`
--

CREATE TABLE `courses` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `course_name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `course_des` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `course_fee` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `course_totalenroll` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `course_totalclass` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `course_link` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `course_img` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `courses`
--

INSERT INTO `courses` (`id`, `course_name`, `course_des`, `course_fee`, `course_totalenroll`, `course_totalclass`, `course_link`, `course_img`) VALUES
(1, 'লারাভেল এবং প্রোজেক্ট\r\n', 'আইটি কোর্স, প্রজেক্ট ভিত্তিক সোর্স কোড সহ আরো যে সকল সার্ভিস আমরা প্রদান করি\r\n', '1000', '200', '120', 'laravel.rabbil.com', 'images/android.jpg'),
(2, 'লারাভেল এবং প্রোজেক্ট\r\n', 'আইটি কোর্স, প্রজেক্ট ভিত্তিক সোর্স কোড সহ আরো যে সকল সার্ভিস আমরা প্রদান করি\r\n', '1000', '200', '120', 'laravel.rabbil.com', 'images/react.jpg'),
(3, 'লারাভেল এবং প্রোজেক্ট\r\n', 'আইটি কোর্স, প্রজেক্ট ভিত্তিক সোর্স কোড সহ আরো যে সকল সার্ভিস আমরা প্রদান করি\r\n', '1000', '200', '120', 'laravel.rabbil.com', 'images/jwt.png'),
(4, 'লারাভেল এবং প্রোজেক্ট\r\n', 'আইটি কোর্স, প্রজেক্ট ভিত্তিক সোর্স কোড সহ আরো যে সকল সার্ভিস আমরা প্রদান করি\r\n', '1000', '200', '120', 'laravel.rabbil.com', 'images/laravel.jpg'),
(5, 'লারাভেল এবং প্রোজেক্ট\r\n', 'আইটি কোর্স, প্রজেক্ট ভিত্তিক সোর্স কোড সহ আরো যে সকল সার্ভিস আমরা প্রদান করি\r\n', '1000', '200', '120', 'laravel.rabbil.com', 'images/android.jpg'),
(6, 'লারাভেল এবং প্রোজেক্ট\r\n', 'আইটি কোর্স, প্রজেক্ট ভিত্তিক সোর্স কোড সহ আরো যে সকল সার্ভিস আমরা প্রদান করি\r\n', '1000', '200', '120', 'laravel.rabbil.com', 'images/laravel.jpg');

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
(1, '2020_09_28_162510_visitor_table', 1),
(2, '2020_09_28_173849_service_table', 1),
(3, '2020_11_19_054459_courses_table', 2);

-- --------------------------------------------------------

--
-- Table structure for table `service`
--

CREATE TABLE `service` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `serivce_name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `service_des` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `service_img` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `service`
--

INSERT INTO `service` (`id`, `serivce_name`, `service_des`, `service_img`) VALUES
(2, 'আইটি কোর্স', 'মোবাইল এবং ওয়েব এপ্লিকেশন ডেভেলপমেন্ট', 'images/Knowledge.svg'),
(6, 'আইটি কোর্স', 'মোবাইল এবং ওয়েব এপ্লিকেশন ডেভেলপমেন্ট	', 'images/Knowledge.svg'),
(8, 'আইটি কোর্স 12121', 'মোবাইল এবং ওয়েব এপ্লিকেশন ডেভেলপমেন্ট', 'images/Knowledge.svg'),
(14, 'আইটি কোর্স', 'মোবাইল এবং ওয়েব এপ্লিকেশন ডেভেলপমেন্ট	', 'images/Knowledge.svg'),
(16, 'আইটি কোর্স', 'মোবাইল এবং ওয়েব এপ্লিকেশন ডেভেলপমেন্ট	', 'images/Knowledge.svg'),
(17, 'আইটি কোর্স', 'মোবাইল এবং ওয়েব এপ্লিকেশন ডেভেলপমেন্ট', 'images/Knowledge.svg'),
(18, 'আইটি কোর্স', 'মোবাইল এবং ওয়েব এপ্লিকেশন ডেভেলপমেন্ট	', 'images/Knowledge.svg'),
(19, 'আইটি কোর্স', 'মোবাইল এবং ওয়েব এপ্লিকেশন ডেভেলপমেন্ট	', 'images/Knowledge.svg'),
(20, 'আইটি কোর্স', 'মোবাইল এবং ওয়েব এপ্লিকেশন ডেভেলপমেন্ট	', 'images/Knowledge.svg'),
(21, 'আইটি কোর্স', 'মোবাইল এবং ওয়েব এপ্লিকেশন ডেভেলপমেন্ট	', 'images/Knowledge.svg'),
(22, 'আইটি কোর্স', 'মোবাইল এবং ওয়েব এপ্লিকেশন ডেভেলপমেন্ট', 'images/Knowledge.svg'),
(24, 'আইটি কোর্স', 'মোবাইল এবং ওয়েব এপ্লিকেশন ডেভেলপমেন্ট	', 'images/Knowledge.svg'),
(25, 'আইটি কোর্স', 'মোবাইল এবং ওয়েব এপ্লিকেশন ডেভেলপমেন্ট	', 'images/Knowledge.svg'),
(26, 'আইটি কোর্স', 'মোবাইল এবং ওয়েব এপ্লিকেশন ডেভেলপমেন্ট	', 'images/Knowledge.svg'),
(27, 'আইটি কোর্স', 'মোবাইল এবং ওয়েব এপ্লিকেশন ডেভেলপমেন্ট', 'images/Knowledge.svg'),
(28, 'আইটি কোর্স', 'মোবাইল এবং ওয়েব এপ্লিকেশন ডেভেলপমেন্ট	', 'images/Knowledge.svg'),
(30, 'আইটি কোর্স', 'মোবাইল এবং ওয়েব এপ্লিকেশন ডেভেলপমেন্ট	', 'images/Knowledge.svg');

-- --------------------------------------------------------

--
-- Table structure for table `visitor`
--

CREATE TABLE `visitor` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `ip_address` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `visit_time` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `visitor`
--

INSERT INTO `visitor` (`id`, `ip_address`, `visit_time`) VALUES
(1, '127.0.0.1', '2020-10-15 03:27:02pm'),
(2, '127.0.0.1', '2020-10-15 03:43:53pm'),
(3, '127.0.0.1', '2020-10-15 03:47:53pm'),
(4, '127.0.0.1', '2020-11-19 11:30:46am'),
(5, '127.0.0.1', '2020-11-19 11:33:39am'),
(6, '127.0.0.1', '2020-11-19 11:39:03am'),
(7, '127.0.0.1', '2020-11-19 11:42:59am'),
(8, '127.0.0.1', '2020-11-19 11:58:53am'),
(9, '127.0.0.1', '2020-11-19 12:07:53pm'),
(10, '127.0.0.1', '2020-11-19 12:10:53pm'),
(11, '127.0.0.1', '2020-11-19 12:15:02pm'),
(12, '127.0.0.1', '2020-11-19 12:16:05pm'),
(13, '127.0.0.1', '2020-11-19 12:16:10pm'),
(14, '127.0.0.1', '2020-11-19 12:20:55pm'),
(15, '127.0.0.1', '2020-11-19 12:21:59pm'),
(16, '127.0.0.1', '2020-11-19 12:22:41pm'),
(17, '127.0.0.1', '2020-11-19 12:25:54pm'),
(18, '127.0.0.1', '2020-11-19 12:27:02pm'),
(19, '127.0.0.1', '2020-11-19 12:27:48pm'),
(20, '127.0.0.1', '2020-11-19 12:29:27pm'),
(21, '127.0.0.1', '2020-11-19 12:30:40pm');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `courses`
--
ALTER TABLE `courses`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `migrations`
--
ALTER TABLE `migrations`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `service`
--
ALTER TABLE `service`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `visitor`
--
ALTER TABLE `visitor`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `courses`
--
ALTER TABLE `courses`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `service`
--
ALTER TABLE `service`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=33;

--
-- AUTO_INCREMENT for table `visitor`
--
ALTER TABLE `visitor`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=22;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
