-- phpMyAdmin SQL Dump
-- version 4.9.2
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Apr 12, 2021 at 05:48 AM
-- Server version: 8.0.18
-- PHP Version: 7.3.11

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `database`
--

-- --------------------------------------------------------

--
-- Table structure for table `admins`
--

CREATE TABLE `admins` (
  `id` int(11) NOT NULL,
  `username` varchar(100) COLLATE utf8_unicode_ci NOT NULL,
  `email` varchar(100) COLLATE utf8_unicode_ci NOT NULL,
  `password` varchar(100) COLLATE utf8_unicode_ci NOT NULL,
  `created_at` timestamp NOT NULL,
  `updated_at` timestamp NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `admins`
--

INSERT INTO `admins` (`id`, `username`, `email`, `password`, `created_at`, `updated_at`) VALUES
(1, 'admin', 'test@test.com', '$2y$10$yb1Laf9t.TDsw9BA6J7ChOnqTPRrzaNEQ8SuMJn17avCOU4Y/4Uce', '2021-04-03 07:00:00', '2021-04-03 07:00:00');

-- --------------------------------------------------------

--
-- Table structure for table `ad_images`
--

CREATE TABLE `ad_images` (
  `id` int(11) NOT NULL,
  `listing_id` int(11) NOT NULL,
  `image` varchar(100) COLLATE utf8_unicode_ci NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `ad_images`
--

INSERT INTO `ad_images` (`id`, `listing_id`, `image`, `created_at`, `updated_at`) VALUES
(6, 9, '606bb0294e9625.52247787.jpg', '2021-04-06 00:49:45', '2021-04-06 00:49:45'),
(7, 4, '606bbfe6071325.01589710.png', '2021-04-06 01:56:54', '2021-04-06 01:56:54');

-- --------------------------------------------------------

--
-- Table structure for table `ad_listings`
--

CREATE TABLE `ad_listings` (
  `id` int(11) NOT NULL,
  `category_id` int(11) DEFAULT NULL,
  `user_id` int(11) NOT NULL,
  `title` varchar(100) COLLATE utf8_unicode_ci NOT NULL,
  `content` text COLLATE utf8_unicode_ci NOT NULL,
  `price` decimal(12,2) NOT NULL,
  `phone` varchar(11) CHARACTER SET utf8 COLLATE utf8_unicode_ci DEFAULT NULL,
  `country` varchar(40) COLLATE utf8_unicode_ci NOT NULL,
  `state` varchar(40) COLLATE utf8_unicode_ci NOT NULL,
  `city` varchar(40) COLLATE utf8_unicode_ci NOT NULL,
  `approval_on` int(1) NOT NULL DEFAULT '0',
  `active_on` int(1) NOT NULL DEFAULT '1',
  `featured_on` int(1) NOT NULL DEFAULT '0',
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `ad_listings`
--

INSERT INTO `ad_listings` (`id`, `category_id`, `user_id`, `title`, `content`, `price`, `phone`, `country`, `state`, `city`, `approval_on`, `active_on`, `featured_on`, `created_at`, `updated_at`) VALUES
(4, 2, 1, 'Nikon Camera', 'Dolor sit amet, consetetur sadipscing elitr, sed diam nonumy eirmod tempor invidunt. ut labore et dolore magna aliquyam erat, sed diam voluptua. At vero eos et accusam. et justo duo dolores et ea rebum. Stet clita kasd gubergren, no sea takimata sanctus est Lorem ipsum dolor sit amet. Lorem ipsum dolor sit amet, consetetur sadipscing elitr, sed diam nonumy eirmod tempor invidunt ut labore et dolore magna aliquyam erat, sed diam voluptua. At vero eos et accusam et justo duo dolores et ea rebum. Stet clita kasd gubergren, no sea takimata sanctus est Lorem ipsum dolor sit amet.\r\n\r\nLorem ipsum dolor sit amet, consetetur sadipscing elitr, sed diam nonumy eirmod tempor invidunt ut labore et dolore magna aliquyam erat, sed diam voluptua. At vero eos et accusam et justo duo dolores et ea rebum. Stet clita kasd gubergren, no sea takimata sanctus est Lorem ipsum dolor sit amet. Lorem ipsum dolor sit amet, consetetur sadipscing elitr, sed diam nonumy eirmod tempor invidunt ut labore', '78.00', '', 'Canada', 'British Columbia', 'Vancouver', 0, 1, 1, '2021-03-31 02:20:52', '2021-04-12 02:08:10'),
(5, 1, 2, 'iPhone X Fresh', 'gfdjgdfjgdlkf klfdgjkldf', '897.00', '+7785458820', 'Canada', 'British Columbia', 'Vancouver', 0, 1, 0, '2021-03-31 02:24:06', '2021-03-31 02:24:06'),
(6, 1, 2, 'High-performance Bi-Cycle', 'fdsgs', '234.00', '+7785458820', 'Canada', 'British Columbia', 'Vancouver', 1, 1, 0, '2021-03-31 02:25:47', '2021-03-31 02:25:47'),
(7, 1, 2, 'KTM 800CC Bike', 'tertert', '555.00', '', 'Canada', 'British Columbia', 'Vancouver', 1, 1, 0, '2021-04-01 20:48:20', '2021-04-01 20:48:20'),
(8, 1, 2, 'MacBook Pro - 8 GB / 256GB', 'fdsfsdf', '4444.00', '', 'Canada', 'British Columbia', 'Vancouver', 0, 1, 0, '2021-04-01 20:52:49', '2021-04-01 20:52:49'),
(9, 1, 1, 'Samsung Glalaxy S8', '3453453dgfg', '100.00', '+7785458820', 'Canada', 'British Columbia', 'Vancouver', 0, 1, 1, '2021-04-02 01:24:16', '2021-04-02 01:24:16'),
(10, 1, 1, 'Fresh Digital Camera', 'fsdfdsf2121212fdsfsdfsdfsd', '4000.00', '', 'Canada', 'British Columbia', 'Vancouver', 0, 1, 0, '2021-04-02 01:28:07', '2021-04-02 01:28:07'),
(15, 1, 1, '8 GB DDR4 Ram, 4th Gen', 'dfsdf fdsfjh jdhsfkjshdf', '43.00', '', 'Canada', 'British Columbia', 'Vancouver', 0, 1, 0, '2021-04-03 23:29:59', '2021-04-03 23:29:59'),
(16, 1, 1, 'wwwwww', 'Nam non maximus nulla. Etiam id sapien at turpis ultrices pharetra. Morbi ullamcorper sit amet purus in volutpat. Class aptent taciti sociosqu ad litora torquent per conubia nostra, per inceptos himenaeos. Nullam euismod nibh ac sapien aliquam convallis. Pellentesque a ipsum lorem. Phasellus orci leo, accumsan eget scelerisque non, porttitor vitae risus. Mauris congue vitae est blandit tristique.', '98.00', '', 'Canada', 'British Columbia', 'Vancouver', 0, 0, 1, '2021-04-03 23:40:03', '2021-04-03 23:40:03'),
(17, 1, 1, 'ererererere', 'popopoprere', '45.00', '', 'Canada', 'British Columbia', 'Vancouver', 0, 0, 0, '2021-04-03 23:42:06', '2021-04-03 23:42:06'),
(22, 3, 1, 'jhbhjh', 'nlknnjklnknkl', '324242.00', NULL, 'fsfsfsf', 'gfdgfd', 'fsfsfsf', 0, 0, 0, '2021-04-12 06:40:23', '2021-04-12 06:40:23'),
(23, 4, 1, 'dfsff', 'sfdgdgdg', '43434.00', NULL, 'fsfsfsf', 'gdgdgd', 'fsfsfsf', 0, 0, 0, '2021-04-12 06:41:05', '2021-04-12 06:41:05'),
(24, 5, 1, 'adsdss', 'fsfsf', '122.00', NULL, 'fsfsf', 'fdfdfdfdf', 'fsfsfsfsf', 0, 0, 0, '2021-04-12 06:41:33', '2021-04-12 06:41:33'),
(25, 5, 1, 'fsfsfsfsf', 'fgdgdgdgdgdg', '1232333.00', NULL, 'fsfsfsfsf', 'gdgdgdgdg', 'fsfsfsfsf', 0, 0, 0, '2021-04-12 06:41:54', '2021-04-12 06:41:54'),
(26, 6, 1, 'fsfsfsf', 'gdgdgdg', '13343.00', NULL, 'sfsfsddf', 'sdgsdgsdgsdg', 'sdgdsgsgs', 0, 0, 0, '2021-04-12 06:42:17', '2021-04-12 06:42:17'),
(27, 7, 1, 'fsfsfsfsf', 'adadsfdsfdd', '23321.00', NULL, 'dsaddfsdf', 'dssdgfgf', 'sdasddsfsdfs', 0, 0, 0, '2021-04-12 06:42:43', '2021-04-12 06:42:43'),
(28, 8, 1, 'dsffsfsf', 'fgdfgdgdd', '23133.00', NULL, 'dadaddsf', 'sdffsdfsdfds', 'gsdgfddfg', 0, 0, 0, '2021-04-12 06:43:06', '2021-04-12 06:43:06'),
(29, 9, 1, 'fdsfdsfsdfdsf', 'wdefsdfsdf', '3334.00', NULL, 'fsddfsfds', 'gfdffddsfds', 'fdsffsdfdsf', 0, 0, 0, '2021-04-12 06:43:25', '2021-04-12 06:43:25'),
(30, 10, 1, 'dfsfdsf', 'fdgfdfgfgd', '44344.00', NULL, 'fsdfdsfds', 'fdsdfsdgffgdf', 'dfsgfsgrggr', 0, 0, 0, '2021-04-12 06:43:50', '2021-04-12 06:43:50'),
(32, 12, 1, 'fsfsfs', 'fdsfdsfdsds', '344.00', NULL, 'dfsds', 'dfsfsg', 'sdasdaddsf', 0, 0, 0, '2021-04-12 07:23:39', '2021-04-12 07:23:39'),
(33, 2, 2, 'fsfsf', 'fdsfsdfsdf', '34233.00', NULL, 'dsadsadsad', 'fsdfsdfsdf', 'dasdasdasd', 0, 0, 0, '2021-04-12 07:27:53', '2021-04-12 07:27:53'),
(34, 3, 2, 'dasdsadsad', 'dsfsdfsfdsf', '233223.00', NULL, 'dsadasda', 'fdsfsdfds', 'sadsdadsads', 0, 0, 0, '2021-04-12 07:28:20', '2021-04-12 07:28:20'),
(35, 4, 2, 'dsadsasda', 'fdsfsdfsdfds', '123323.00', NULL, 'dsadasdasd', 'fdsfsdfds', 'dsdsadasd', 0, 0, 0, '2021-04-12 07:28:40', '2021-04-12 07:28:40'),
(36, 5, 2, 'dsfsfsdfd', 'dsfsdfdsfsfsf', '1232323.00', NULL, 'dsadsasddas', 'fdsfdsfsdf', 'asddsadsadd', 0, 0, 0, '2021-04-12 07:29:37', '2021-04-12 07:29:37'),
(37, 6, 2, 'fadfssdfdsf', 'sadadasdasd', '122333.00', NULL, 'dadasds', 'sfdfdsfds', 'asdsdfsdfsf', 0, 0, 0, '2021-04-12 07:29:53', '2021-04-12 07:29:53'),
(38, 7, 2, 'efsefsef', 'dawdsadesfsef', '32423423.00', NULL, 'wddsdfs', 'dassdads', 'fdsfsfsdf', 0, 1, 0, '2021-04-12 07:30:19', '2021-04-12 07:30:19'),
(39, 8, 2, 'fdsfsdfdsf', 'dsdsasdadaads', '3242434.00', NULL, 'dsdfsdf', 'dasdsasd', 'fdsfsdfsfd', 0, 1, 0, '2021-04-12 07:30:36', '2021-04-12 07:30:36'),
(40, 9, 2, 'fsefsdfsdf', 'dwadadsadsad', '3232424.00', NULL, 'fdsfsdfs', 'sdadasadd', 'dfsfsdfsf', 0, 1, 0, '2021-04-12 07:30:57', '2021-04-12 07:30:57'),
(41, 7, 2, 'dasdsads', 'fdsfsdfdsf', '123242.00', NULL, 'dsadsads', 'fdsfdfsdf', 'dsadsadad', 0, 1, 0, '2021-04-12 07:31:50', '2021-04-12 07:31:50'),
(42, 8, 2, 'fdsfdsfsdf', 'asddasdadads', '323233.00', NULL, 'dsadsadsa', 'fdsfdsfdsf', 'saddsadsasd', 0, 0, 0, '2021-04-12 07:32:08', '2021-04-12 07:32:08'),
(43, 9, 2, 'fdsfdsfdsf', 'dasdsadadwa', '4234233.00', NULL, 'dfdsdf', 'dsfsadad', 'dfsfsfdsf', 0, 0, 0, '2021-04-12 07:32:27', '2021-04-12 07:32:27'),
(44, 10, 2, 'fsefsdfds', 'dasdadadasd', '4242424.00', NULL, 'fdsfdsdf', 'sdfdsfsdf', 'dsadsdasdasd', 0, 0, 0, '2021-04-12 07:32:44', '2021-04-12 07:32:44'),
(45, 12, 2, 'dfsdfsff', 'dsadadasda', '3333.00', NULL, 'dsfdsdf', 'sdsadsad', 'fdsfdsfs', 0, 0, 0, '2021-04-12 07:33:02', '2021-04-12 07:33:02');

-- --------------------------------------------------------

--
-- Table structure for table `category`
--

CREATE TABLE `category` (
  `id` int(11) NOT NULL,
  `name` varchar(250) COLLATE utf8_unicode_ci NOT NULL,
  `description` varchar(250) COLLATE utf8_unicode_ci DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `category`
--

INSERT INTO `category` (`id`, `name`, `description`) VALUES
(1, 'Mobiles', 'Mobiles Phones and Accessories'),
(2, 'Electronics', 'Electronics'),
(3, 'Real Estate', 'Real Estate'),
(4, 'Vehicles', 'Vehicles'),
(5, 'Dining', 'Dining'),
(6, 'Kitchen', 'Kitchen'),
(7, 'Washroom', 'Washroom'),
(8, 'Laundry Room', 'Laundry Room'),
(9, 'Recreational Room', 'Recreational Room'),
(10, 'Bedroom', 'Bedroom'),
(12, 'Garage', 'Garage');

-- --------------------------------------------------------

--
-- Table structure for table `interact`
--

CREATE TABLE `interact` (
  `id` int(11) NOT NULL,
  `listing_id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `rating` varchar(50) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `comments` varchar(250) COLLATE utf8_unicode_ci NOT NULL,
  `name` varchar(50) COLLATE utf8_unicode_ci NOT NULL,
  `created_at` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `interact`
--

INSERT INTO `interact` (`id`, `listing_id`, `user_id`, `rating`, `comments`, `name`, `created_at`) VALUES
(1, 4, 11, '4', 'Test Comment! Very good camera', 'John Will', '2021-04-08 19:16:34'),
(2, 4, 11, '4', 'fdsfdsf', 'sdfsdfs', '2021-04-08 20:00:03'),
(3, 4, 11, '2', 'gfhfhfg', 'fsdfsdfsd', '2021-04-08 20:03:45'),
(4, 4, 11, '1', 'czxczczxczx', 'cxczxc', '2021-04-08 20:09:40');

-- --------------------------------------------------------

--
-- Table structure for table `moderate_user`
--

CREATE TABLE `moderate_user` (
  `user_id` int(11) NOT NULL,
  `admin_id` int(11) NOT NULL,
  `reason` text COLLATE utf8_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `recommended_ad`
--

CREATE TABLE `recommended_ad` (
  `listing_id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `review_ad`
--

CREATE TABLE `review_ad` (
  `listing_id` int(11) NOT NULL,
  `admin_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` int(11) NOT NULL,
  `username` varchar(30) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `full_name` varchar(100) CHARACTER SET utf8 COLLATE utf8_unicode_ci DEFAULT NULL,
  `email` varchar(255) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `phone` varchar(100) CHARACTER SET utf8 COLLATE utf8_unicode_ci DEFAULT NULL,
  `password` varchar(100) COLLATE utf8_unicode_ci NOT NULL,
  `profile_image` varchar(255) CHARACTER SET utf8 COLLATE utf8_unicode_ci DEFAULT NULL,
  `code` mediumint(50) NOT NULL,
  `status` text COLLATE utf8_unicode_ci NOT NULL,
  `banned_on` int(1) NOT NULL DEFAULT '0',
  `updated_at` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `username`, `full_name`, `email`, `phone`, `password`, `profile_image`, `code`, `status`, `banned_on`, `updated_at`) VALUES
(1, 'HAggh232', 'Angel Grand', 'test@test2.com', '+17784549897', '$2y$10$1BI/t/Qukdkzy/Eq8RhgNe3DJsSSbz0XWsKe.bYLl9VXOE3ttcgjG', '6068c49cca6729.04468437.jpg', 0, 'verified', 0, '2021-04-11 18:53:50'),
(2, 'HAggh', 'Angel Grand', 'test@test343.com', '+17784549897', '$2y$10$utmKlaqhfIaK/0qqnAhN9e00a3kMEAmOsfLaHwCwdA4BlgBZW/lcK', NULL, 0, 'verified', 0, '2021-04-11 18:37:52'),
(3, 'dasdas', '', '9102@naymeo.com', '', '$2y$10$7STTArq87xmOqntEpfCU/O4dMR0E/ERwM7CXw5nEMOY/CHkhcxvn.', NULL, 0, 'verified', 0, '2021-04-11 18:37:52'),
(4, 'verif', '', 'riyo9102@nmeo.com', '', '$2y$10$BsBNl88sJ2AjM8y04xgTM.KpHmp6aZhmMZ8OgkCza5L0NTTJwE6g2', NULL, 0, 'verified', 0, '2021-04-11 18:37:52'),
(5, 'fsdfs', '', 'fsdfsd@gmail.com', '+6045558899', '$2y$10$Gd3x/JnJeoxuHrZxhNfME.JlbV4FeyWJX1WR.rc35fCcXOOGsGeIW', NULL, 0, 'verified', 1, '2021-04-11 18:37:52'),
(6, 'rwrew', 'John Lee', 'rew@dfg', '', '$2y$10$ZVXjCEugq7krfSs07xtLkeXxkMGxmO99XtstprEhOhzmf8HRKoeGC', NULL, 189396, 'notverified', 1, '2021-04-11 18:37:52'),
(8, '11', NULL, '11@11', NULL, '$2y$10$0qzAUiZ7c8JqHESe8OTYIu1I4VMfyhpA5nDkiHeQ6dkpHMacPxopO', NULL, 907439, 'verified', 0, '2021-04-11 18:37:52'),
(11, 'Jas', NULL, 'jas@test.com', NULL, '$2y$10$5.usCpyvH1M8zwzl0xWXBe1iW7iM8gD9D5dbLsKF1LPdv2N7HbFy6', NULL, 721622, 'notverified', 0, '2021-04-11 18:37:52'),
(12, 'tetst', NULL, '11@ss', NULL, '$2y$10$C8enn0BOiltJc4usokI8XO1CF8/1DcYss8aXlf9HQnMBru8LjneCG', NULL, 753967, 'notverified', 1, '2021-04-11 18:37:52'),
(13, '3232', NULL, '11@322', NULL, '$2y$10$fwaTmxga13SSnlmARr2s3eUl6jpy7Mnd4C93naBWS3qWEW4NPDc4C', NULL, 0, 'verified', 0, '2021-04-11 18:37:52');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `admins`
--
ALTER TABLE `admins`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `ad_images`
--
ALTER TABLE `ad_images`
  ADD PRIMARY KEY (`id`),
  ADD KEY `ad_images_ibfk_1` (`listing_id`);

--
-- Indexes for table `ad_listings`
--
ALTER TABLE `ad_listings`
  ADD PRIMARY KEY (`id`),
  ADD KEY `ad_listings_ibfk_1` (`user_id`),
  ADD KEY `ad_listings_ibfk_2` (`category_id`);

--
-- Indexes for table `category`
--
ALTER TABLE `category`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `interact`
--
ALTER TABLE `interact`
  ADD PRIMARY KEY (`id`),
  ADD KEY `user_id` (`user_id`),
  ADD KEY `listing_id` (`listing_id`);

--
-- Indexes for table `moderate_user`
--
ALTER TABLE `moderate_user`
  ADD KEY `admin_id` (`admin_id`),
  ADD KEY `user_id` (`user_id`);

--
-- Indexes for table `recommended_ad`
--
ALTER TABLE `recommended_ad`
  ADD KEY `recommended_ibfk_1` (`user_id`),
  ADD KEY `listing_id` (`listing_id`);

--
-- Indexes for table `review_ad`
--
ALTER TABLE `review_ad`
  ADD KEY `review_ad_ibfk_1` (`listing_id`),
  ADD KEY `admin_id` (`admin_id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `email` (`email`),
  ADD UNIQUE KEY `username` (`username`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `admins`
--
ALTER TABLE `admins`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `ad_images`
--
ALTER TABLE `ad_images`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `ad_listings`
--
ALTER TABLE `ad_listings`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=46;

--
-- AUTO_INCREMENT for table `category`
--
ALTER TABLE `category`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;

--
-- AUTO_INCREMENT for table `interact`
--
ALTER TABLE `interact`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `ad_images`
--
ALTER TABLE `ad_images`
  ADD CONSTRAINT `ad_images_ibfk_1` FOREIGN KEY (`listing_id`) REFERENCES `ad_listings` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `ad_listings`
--
ALTER TABLE `ad_listings`
  ADD CONSTRAINT `ad_listings_ibfk_1` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`),
  ADD CONSTRAINT `ad_listings_ibfk_2` FOREIGN KEY (`category_id`) REFERENCES `category` (`id`);

--
-- Constraints for table `interact`
--
ALTER TABLE `interact`
  ADD CONSTRAINT `interact_ibfk_2` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `interact_ibfk_3` FOREIGN KEY (`listing_id`) REFERENCES `ad_listings` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `moderate_user`
--
ALTER TABLE `moderate_user`
  ADD CONSTRAINT `moderate_user_ibfk_1` FOREIGN KEY (`admin_id`) REFERENCES `admins` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `moderate_user_ibfk_2` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `recommended_ad`
--
ALTER TABLE `recommended_ad`
  ADD CONSTRAINT `recommended_ad_ibfk_1` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `recommended_ad_ibfk_2` FOREIGN KEY (`listing_id`) REFERENCES `ad_listings` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `review_ad`
--
ALTER TABLE `review_ad`
  ADD CONSTRAINT `review_ad_ibfk_1` FOREIGN KEY (`listing_id`) REFERENCES `ad_listings` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `review_ad_ibfk_2` FOREIGN KEY (`admin_id`) REFERENCES `admins` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
