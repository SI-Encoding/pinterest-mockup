-- phpMyAdmin SQL Dump
-- version 4.9.2
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Apr 06, 2021 at 02:29 AM
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
  `id` int(11) UNSIGNED NOT NULL,
  `role_id` int(11) NOT NULL,
  `username` varchar(100) COLLATE utf8_unicode_ci NOT NULL,
  `email` varchar(100) COLLATE utf8_unicode_ci NOT NULL,
  `password` varchar(100) COLLATE utf8_unicode_ci NOT NULL,
  `remember_token` varchar(100) COLLATE utf8_unicode_ci NOT NULL,
  `created_at` timestamp NOT NULL,
  `updated_at` timestamp NOT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `admins`
--

INSERT INTO `admins` (`id`, `role_id`, `username`, `email`, `password`, `remember_token`, `created_at`, `updated_at`, `deleted_at`) VALUES
(1, 0, 'admin', 'test@test.com', '$2y$10$yb1Laf9t.TDsw9BA6J7ChOnqTPRrzaNEQ8SuMJn17avCOU4Y/4Uce', '0', '2021-04-03 07:00:00', '2021-04-03 07:00:00', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `ad_images`
--

CREATE TABLE `ad_images` (
  `id` int(11) NOT NULL,
  `listing_id` int(11) NOT NULL,
  `image` varchar(100) COLLATE utf8_unicode_ci NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `deleted_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `ad_images`
--

INSERT INTO `ad_images` (`id`, `listing_id`, `image`, `created_at`, `updated_at`, `deleted_at`) VALUES
(6, 9, '606bb0294e9625.52247787.jpg', '2021-04-06 00:49:45', '2021-04-06 00:49:45', NULL),
(7, 4, '606bbfe6071325.01589710.png', '2021-04-06 01:56:54', '2021-04-06 01:56:54', NULL);

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
  `country` varchar(40) COLLATE utf8_unicode_ci NOT NULL,
  `state` varchar(40) COLLATE utf8_unicode_ci NOT NULL,
  `city` varchar(40) COLLATE utf8_unicode_ci NOT NULL,
  `approval_on` int(1) NOT NULL DEFAULT '0',
  `active_on` int(1) NOT NULL DEFAULT '1',
  `featured_on` int(1) NOT NULL DEFAULT '0',
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `deleted_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `ad_listings`
--

INSERT INTO `ad_listings` (`id`, `category_id`, `user_id`, `title`, `content`, `price`, `country`, `state`, `city`, `approval_on`, `active_on`, `featured_on`, `created_at`, `updated_at`, `deleted_at`) VALUES
(4, 2, 1, 'Nikon Camera', 'Lorem ipsum dolor sit amet, consetetur sadipscing elitr, sed diam nonumy eirmod tempor invidunt. ut labore et dolore magna aliquyam erat, sed diam voluptua. At vero eos et accusam. et justo duo dolores et ea rebum. Stet clita kasd gubergren, no sea takimata sanctus est Lorem ipsum dolor sit amet. Lorem ipsum dolor sit amet, consetetur sadipscing elitr, sed diam nonumy eirmod tempor invidunt ut labore et dolore magna aliquyam erat, sed diam voluptua. At vero eos et accusam et justo duo dolores et ea rebum. Stet clita kasd gubergren, no sea takimata sanctus est Lorem ipsum dolor sit amet.\r\n\r\nLorem ipsum dolor sit amet, consetetur sadipscing elitr, sed diam nonumy eirmod tempor invidunt ut labore et dolore magna aliquyam erat, sed diam voluptua. At vero eos et accusam et justo duo dolores et ea rebum. Stet clita kasd gubergren, no sea takimata sanctus est Lorem ipsum dolor sit amet. Lorem ipsum dolor sit amet, consetetur sadipscing elitr, sed diam nonumy eirmod tempor invidunt ut labore', '78.00', 'Canada', 'British Columbia', 'Vancouver', 0, 1, 1, '2021-03-31 02:20:52', '2021-03-31 02:20:52', NULL),
(5, 1, 2, 'iPhone X Fresh', 'gfdjgdfjgdlkf klfdgjkldf', '897.00', 'Canada', 'British Columbia', 'Vancouver', 0, 1, 0, '2021-03-31 02:24:06', '2021-03-31 02:24:06', NULL),
(6, 1, 2, 'High-performance Bi-Cycle', 'fdsgs', '234.00', 'Canada', 'British Columbia', 'Vancouver', 0, 1, 0, '2021-03-31 02:25:47', '2021-03-31 02:25:47', NULL),
(7, 1, 2, 'KTM 800CC Bike', 'tertert', '555.00', 'Canada', 'British Columbia', 'Vancouver', 0, 1, 0, '2021-04-01 20:48:20', '2021-04-01 20:48:20', NULL),
(8, 1, 2, 'MacBook Pro - 8 GB / 256GB', 'fdsfsdf', '4444.00', 'Canada', 'British Columbia', 'Vancouver', 0, 1, 0, '2021-04-01 20:52:49', '2021-04-01 20:52:49', NULL),
(9, 1, 1, 'Samsung Glalaxy S8', '3453453dgfg', '100.00', 'Canada', 'British Columbia', 'Vancouver', 0, 1, 0, '2021-04-02 01:24:16', '2021-04-02 01:24:16', NULL),
(10, 1, 1, 'Fresh Digital Camera', 'fsdfdsf2121212fdsfsdfsdfsd', '4000.00', 'Canada', 'British Columbia', 'Vancouver', 0, 0, 0, '2021-04-02 01:28:07', '2021-04-02 01:28:07', NULL),
(15, 1, 1, '8 GB DDR4 Ram, 4th Gen', 'dfsdf fdsfjh jdhsfkjshdf', '43.00', 'Canada', 'British Columbia', 'Vancouver', 0, 1, 0, '2021-04-03 23:29:59', '2021-04-03 23:29:59', NULL),
(16, 1, 1, 'wwwwww', 'fsdfsdkiid', '98.00', 'Canada', 'British Columbia', 'Vancouver', 0, 1, 0, '2021-04-03 23:40:03', '2021-04-03 23:40:03', NULL),
(17, 1, 1, 'wwwwww', 'popopop', '45.00', 'Canada', 'British Columbia', 'Vancouver', 0, 1, 0, '2021-04-03 23:42:06', '2021-04-03 23:42:06', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `ad_listings_tags`
--

CREATE TABLE `ad_listings_tags` (
  `listing_id` int(11) NOT NULL,
  `tags` varchar(250) COLLATE utf8_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

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
-- Table structure for table `intreact`
--

CREATE TABLE `intreact` (
  `listing_id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `likes` varchar(250) COLLATE utf8_unicode_ci NOT NULL,
  `comments` varchar(250) COLLATE utf8_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `recommended`
--

CREATE TABLE `recommended` (
  `id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `category_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `recommended_interests`
--

CREATE TABLE `recommended_interests` (
  `id` int(11) NOT NULL,
  `interests` varchar(250) COLLATE utf8_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `reviews`
--

CREATE TABLE `reviews` (
  `id` int(11) NOT NULL,
  `approval` int(1) NOT NULL,
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
  `banned_on` int(1) NOT NULL DEFAULT '0'
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `username`, `full_name`, `email`, `phone`, `password`, `profile_image`, `code`, `status`, `banned_on`) VALUES
(1, 'Sabri', 'sabri553 Isik', 'test@test.com', '+17784549898', '$2y$10$yb1Laf9t.TDsw9BA6J7ChOnqTPRrzaNEQ8SuMJn17avCOU4Y/4Uce', '6068c49cca6729.04468437.jpg', 0, 'verified', 0),
(2, 'maxdsjfhksdjf', '', 'axifgfyo@naymeo.com', '', '$2y$10$kzMdqNT5rteDeVS1/oHiQumOxRwUayO.Hz.6bJjMS0CLZMtz/avLe', NULL, 0, 'verified', 0),
(3, 'dasdas', '', '9102@naymeo.com', '', '$2y$10$7STTArq87xmOqntEpfCU/O4dMR0E/ERwM7CXw5nEMOY/CHkhcxvn.', NULL, 0, 'verified', 0),
(4, 'verif', '', 'riyo9102@nmeo.com', '', '$2y$10$BsBNl88sJ2AjM8y04xgTM.KpHmp6aZhmMZ8OgkCza5L0NTTJwE6g2', NULL, 0, 'verified', 0),
(5, 'fsdfs', '', 'fsdfsd@gmail.com', '+6045558899', '$2y$10$Gd3x/JnJeoxuHrZxhNfME.JlbV4FeyWJX1WR.rc35fCcXOOGsGeIW', NULL, 0, 'verified', 0),
(6, 'rwrew', 'John Lee', 'rew@dfg', '', '$2y$10$ZVXjCEugq7krfSs07xtLkeXxkMGxmO99XtstprEhOhzmf8HRKoeGC', NULL, 189396, 'notverified', 0),
(8, '11', NULL, '11@11', NULL, '$2y$10$0qzAUiZ7c8JqHESe8OTYIu1I4VMfyhpA5nDkiHeQ6dkpHMacPxopO', NULL, 907439, 'verified', 0);

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
-- Indexes for table `intreact`
--
ALTER TABLE `intreact`
  ADD KEY `user_id` (`user_id`);

--
-- Indexes for table `recommended`
--
ALTER TABLE `recommended`
  ADD PRIMARY KEY (`id`),
  ADD KEY `recommended_ibfk_1` (`user_id`);

--
-- Indexes for table `recommended_interests`
--
ALTER TABLE `recommended_interests`
  ADD KEY `id` (`id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `admins`
--
ALTER TABLE `admins`
  MODIFY `id` int(11) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `ad_images`
--
ALTER TABLE `ad_images`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `ad_listings`
--
ALTER TABLE `ad_listings`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=22;

--
-- AUTO_INCREMENT for table `category`
--
ALTER TABLE `category`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;

--
-- AUTO_INCREMENT for table `recommended`
--
ALTER TABLE `recommended`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

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
-- Constraints for table `intreact`
--
ALTER TABLE `intreact`
  ADD CONSTRAINT `intreact_ibfk_2` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `recommended`
--
ALTER TABLE `recommended`
  ADD CONSTRAINT `recommended_ibfk_1` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `recommended_interests`
--
ALTER TABLE `recommended_interests`
  ADD CONSTRAINT `recommended_interests_ibfk_1` FOREIGN KEY (`id`) REFERENCES `recommended` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
