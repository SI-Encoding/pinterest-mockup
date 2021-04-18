-- phpMyAdmin SQL Dump
-- version 4.9.1
-- https://www.phpmyadmin.net/
--
-- Host: localhost
-- Generation Time: Apr 18, 2021 at 07:29 PM
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
  `username` varchar(100) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `email` varchar(100) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `password` varchar(100) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `created_at` timestamp NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `admins`
--

INSERT INTO `admins` (`id`, `username`, `email`, `password`, `created_at`) VALUES
(1, 'admin', 'test@test.com', '$2y$10$yb1Laf9t.TDsw9BA6J7ChOnqTPRrzaNEQ8SuMJn17avCOU4Y/4Uce', '2021-04-03 07:00:00');

-- --------------------------------------------------------

--
-- Table structure for table `ad_images`
--

CREATE TABLE `ad_images` (
  `id` int(11) NOT NULL,
  `listing_id` int(11) NOT NULL,
  `image` varchar(100) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `ad_images`
--

INSERT INTO `ad_images` (`id`, `listing_id`, `image`, `created_at`, `updated_at`) VALUES
(2, 7, 'bike.jpg', '2021-04-18 19:23:35', '2021-04-18 19:23:35'),
(6, 9, '606bb0294e9625.52247787.jpg', '2021-04-06 00:49:45', '2021-04-06 00:49:45'),
(7, 4, '60789677939263.41219116.jpg', '2021-04-06 01:56:54', '2021-04-06 01:56:54'),
(8, 49, '607c855e4c2c99.21055444.jpg', '2021-04-18 19:15:42', '2021-04-18 19:15:42'),
(9, 50, '607c86179b7508.93890607.jpg', '2021-04-18 19:18:47', '2021-04-18 19:18:47'),
(10, 8, 'iphone.jpg.png', '2021-04-18 19:26:22', '2021-04-18 19:26:22');

-- --------------------------------------------------------

--
-- Table structure for table `ad_listings`
--

CREATE TABLE `ad_listings` (
  `id` int(11) NOT NULL,
  `category_id` int(11) DEFAULT NULL,
  `user_id` int(11) NOT NULL,
  `title` varchar(100) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `content` text CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `price` decimal(12,2) NOT NULL,
  `phone` varchar(11) CHARACTER SET utf8 COLLATE utf8_unicode_ci DEFAULT NULL,
  `country` varchar(40) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `state` varchar(40) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `city` varchar(40) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `active_on` int(1) NOT NULL DEFAULT '1',
  `featured_on` int(1) NOT NULL DEFAULT '0',
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `ad_listings`
--

INSERT INTO `ad_listings` (`id`, `category_id`, `user_id`, `title`, `content`, `price`, `phone`, `country`, `state`, `city`, `active_on`, `featured_on`, `created_at`, `updated_at`) VALUES
(4, 1, 1, 'My Cozy bedroom', 'Dolor sit amet, consetetur sadipscing elitr, sed diam nonumy eirmod tempor invidunt. ut labore et dolore magna aliquyam erat, sed diam voluptua. At vero eos et accusam. et justo duo dolores et ea rebum. Stet clita kasd gubergren, no sea takimata sanctus est Lorem ipsum dolor sit amet. Lorem ipsum dolor sit amet, consetetur sadipscing elitr, sed diam nonumy eirmod tempor invidunt ut labore et dolore magna aliquyam erat, sed diam voluptua. At vero eos et accusam et justo duo dolores et ea rebum. Stet clita kasd gubergren, no sea takimata sanctus est Lorem ipsum dolor sit amet.\r\n\r\nLorem ipsum dolor sit amet, consetetur sadipscing elitr, sed diam nonumy eirmod tempor invidunt ut labore et dolore magna aliquyam erat, sed diam voluptua. At vero eos et accusam et justo duo dolores et ea rebum. Stet clita kasd gubergren, no sea takimata sanctus est Lorem ipsum dolor sit amet. Lorem ipsum dolor sit amet, consetetur sadipscing elitr, sed diam nonumy eirmod tempor invidunt ut labore', '78.00', '', 'Canada', 'British Columbia', 'Vancouver', 1, 1, '2021-03-31 02:20:52', '2021-04-13 05:37:30'),
(5, 2, 2, 'iPhone X Fresh', 'gfdjgdfjgdlkf klfdgjkldf', '897.00', '+7785458820', 'Canada', 'British Columbia', 'Vancouver', 0, 0, '2021-03-31 02:24:06', '2021-03-31 02:24:06'),
(6, 1, 2, 'High-performance Bi-Cycle', 'fdsgs', '234.00', '+7785458820', 'Canada', 'British Columbia', 'Vancouver', 0, 0, '2021-03-31 02:25:47', '2021-03-31 02:25:47'),
(7, 4, 2, 'KTM 800CC Bike', 'tertert', '555.00', '', 'Canada', 'British Columbia', 'Vancouver', 1, 0, '2021-04-01 20:48:20', '2021-04-01 20:48:20'),
(8, 5, 2, 'MacBook Pro - 8 GB / 256GB', 'fdsfsdf', '4444.00', '', 'Canada', 'British Columbia', 'Vancouver', 1, 0, '2021-04-01 20:52:49', '2021-04-01 20:52:49'),
(9, 6, 2, 'Samsung Glalaxy S8', '3453453dgfg', '100.00', '+7785458820', 'Canada', 'British Columbia', 'Vancouver', 1, 0, '2021-04-02 01:24:16', '2021-04-02 01:24:16'),
(10, 7, 2, 'Fresh Digital Camera', 'fsdfdsf2121212fdsfsdfsdfsd', '4000.00', '', 'Canada', 'British Columbia', 'Vancouver', 1, 0, '2021-04-02 01:28:07', '2021-04-02 01:28:07'),
(47, 8, 2, 'Spammed Ad', 'Try and catch me!', '45.00', '999999999', 'No COuntry', 'Fake State', 'Fake Street', 1, 0, '2021-04-18 18:57:13', '2021-04-18 18:57:13'),
(48, 3, 2, 'I love to spam ', 'I cant believe I am not banned yet', '45.00', '1111', 'Kanada', 'Los angels', 'php city', 1, 0, '2021-04-18 18:59:12', '2021-04-18 18:59:12'),
(49, 4, 1, 'My awesome dining room', 'This is where I treat my guests every occasion ;)', '450.00', NULL, 'Canada', 'British Columbia', 'Vancouver', 1, 0, '2021-04-18 19:15:42', '2021-04-18 19:15:42'),
(50, 2, 1, 'New garage storage space for rent', 'Hi, I am looking for renters who would be interested in looking for storage space. Only 550.00 a month!', '550.00', NULL, 'Canada', 'British Columbia', 'Vancouver', 0, 0, '2021-04-18 19:18:47', '2021-04-18 19:18:47');

-- --------------------------------------------------------

--
-- Table structure for table `category`
--

CREATE TABLE `category` (
  `id` int(11) NOT NULL,
  `name` varchar(250) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `description` varchar(250) CHARACTER SET utf8 COLLATE utf8_unicode_ci DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `category`
--

INSERT INTO `category` (`id`, `name`, `description`) VALUES
(1, 'Bedroom', 'This category is for posting bedroom only'),
(2, 'Garage', 'This category is for posting garage only'),
(3, 'Laundry Room', 'This category is for posting Laundry room only'),
(4, 'Dining Room', 'This category is for posting dining room only'),
(5, 'Kitchen', 'This category is for posting kitchen only'),
(6, 'Washroom', 'This category is for posting washroom only'),
(7, 'Living Room', 'This category is for posting living room only'),
(8, 'Recreational Room', 'This category is for posting recreational room only');

-- --------------------------------------------------------

--
-- Table structure for table `favourite_ad`
--

CREATE TABLE `favourite_ad` (
  `listing_id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `favourite_ad`
--

INSERT INTO `favourite_ad` (`listing_id`, `user_id`) VALUES
(6, 2),
(4, 2),
(8, 2),
(9, 2);

-- --------------------------------------------------------

--
-- Table structure for table `interact`
--

CREATE TABLE `interact` (
  `id` int(11) NOT NULL,
  `listing_id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `rating` varchar(50) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `comments` varchar(250) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `name` varchar(50) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `created_at` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `interact`
--

INSERT INTO `interact` (`id`, `listing_id`, `user_id`, `rating`, `comments`, `name`, `created_at`) VALUES
(1, 4, 11, '4', 'Test Comment! Very good camera', 'John Will', '2021-04-08 19:16:34'),
(2, 4, 11, '4', 'fdsfdsf', 'sdfsdfs', '2021-04-08 20:00:03'),
(3, 4, 11, '2', 'gfhfhfg', 'fsdfsdfsd', '2021-04-08 20:03:45'),
(4, 4, 11, '1', 'czxczczxczx', 'cxczxc', '2021-04-08 20:09:40'),
(5, 4, 11, '1', 'werwer', 'ewrwe', '2021-04-12 14:15:19'),
(6, 4, 11, '4', 'qq', 'testds', '2021-04-12 14:16:00'),
(7, 4, 11, '5', 'teee', 'teee', '2021-04-12 14:16:44'),
(8, 4, 11, '5', 'gerg', 'gerge', '2021-04-12 14:21:31'),
(9, 4, 1, '3', 'dsfs', 'fsdf', '2021-04-12 14:29:51');

-- --------------------------------------------------------

--
-- Table structure for table `logs`
--

CREATE TABLE `logs` (
  `id` int(11) NOT NULL,
  `action` varchar(50) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `info` varchar(100) CHARACTER SET utf8 COLLATE utf8_unicode_ci DEFAULT NULL,
  `date` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `user_id` int(11) DEFAULT NULL,
  `username` varchar(100) CHARACTER SET utf8 COLLATE utf8_unicode_ci DEFAULT NULL,
  `email` varchar(100) CHARACTER SET utf8 COLLATE utf8_unicode_ci DEFAULT NULL,
  `full_name` varchar(100) CHARACTER SET utf8 COLLATE utf8_unicode_ci DEFAULT NULL,
  `phone` varchar(100) CHARACTER SET utf8 COLLATE utf8_unicode_ci DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `logs`
--

INSERT INTO `logs` (`id`, `action`, `info`, `date`, `user_id`, `username`, `email`, `full_name`, `phone`) VALUES
(11, 'update', 'old info', '2021-04-12 19:20:08', 15, 'adew', 'as@a', 'gdgdf', NULL),
(12, 'update', 'old info', '2021-04-12 19:21:10', 15, 'adefwefew', 'as@afwefwef', 'gdgdf fewfwefwe', '2342342'),
(13, 'update', 'old info', '2021-04-12 19:33:46', 5, 'fsdfs', 'fsdfsd@gmail.com', '', '+6045558899'),
(14, 'deleted', 'user info was:', '2021-04-12 19:40:17', 15, 'iididi', 'oioio@afwefwef', 'fsdds fewfwefwe', '88894'),
(15, 'update', 'old info:', '2021-04-12 20:36:30', 1, 'HAggh232', 'test@test2.com', 'Angel Grand', '+17784549897'),
(16, 'update', 'old info:', '2021-04-12 21:28:37', 4, 'verif', 'riyo9102@nmeo.com', '', ''),
(17, 'update', 'old info:', '2021-04-12 21:29:16', 5, 'fsdfs', 'fsdfsd@gmail.com', '', '+6045558899'),
(18, 'update', 'old info:', '2021-04-12 21:55:22', 1, 'HAggh232', 'test@test2.com', 'Angel Grand', '+17784549897'),
(19, 'update', 'old info:', '2021-04-12 21:55:46', 1, 'HAggh232', 'test@test2.com', 'Angel Grand', '+17784549897'),
(20, 'update', 'old info:', '2021-04-12 22:01:08', 1, 'HAggh232', 'test@test2.com', 'Angel Grand', '+17784549897'),
(21, 'update', 'old info:', '2021-04-12 22:02:52', 1, 'HAggh232', 'test@test2.com', 'Angel Grand', '+17784549897'),
(22, 'update', 'old info:', '2021-04-13 21:28:35', 2, 'HAggh', 'test@test343.com', 'Angel Grand', '+17784549897'),
(23, 'update', 'old info:', '2021-04-13 22:19:13', 2, 'HAggh', 'test@test.com', 'Angel Grand', '+17784549897'),
(24, 'update', 'old info:', '2021-04-13 22:23:28', 2, 'HAggh', 'test@test.com', 'Angel Grand', '+17784549897'),
(25, 'update', 'old info:', '2021-04-13 22:23:48', 1, 'HAggh232', 'test@test2.com', 'Angel Grand', '+17784549897'),
(26, 'update', 'old info:', '2021-04-13 22:24:29', 2, 'HAggh', 'test@test.com', 'Angel Grand', '+17784549897'),
(27, 'update', 'old info:', '2021-04-13 22:28:10', 2, 'HAggh', 'test@test.com', 'Angel Grand', '+17784549897'),
(28, 'update', 'old info:', '2021-04-13 22:28:45', 2, 'HAggh', 'test@test.com', 'Angel Grand', '+17784549897');

-- --------------------------------------------------------

--
-- Table structure for table `moderate_user`
--

CREATE TABLE `moderate_user` (
  `user_id` int(11) NOT NULL,
  `admin_id` int(11) NOT NULL,
  `reason` text CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `moderate_user`
--

INSERT INTO `moderate_user` (`user_id`, `admin_id`, `reason`) VALUES
(4, 1, 'hahaha'),
(5, 1, 'no Reason'),
(2, 1, 'lol');

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
  `password` varchar(100) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `profile_image` varchar(255) CHARACTER SET utf8 COLLATE utf8_unicode_ci DEFAULT NULL,
  `code` mediumint(50) NOT NULL,
  `status` text CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `banned_on` int(1) NOT NULL DEFAULT '0',
  `updated_at` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `username`, `full_name`, `email`, `phone`, `password`, `profile_image`, `code`, `status`, `banned_on`, `updated_at`) VALUES
(1, 'HAggh232', 'Angel Grand', 'test@test2.com', '+17784549897', '$2y$10$1BI/t/Qukdkzy/Eq8RhgNe3DJsSSbz0XWsKe.bYLl9VXOE3ttcgjG', '6068c49cca6729.04468437.jpg', 0, 'verified', 0, '2021-04-11 18:53:50'),
(2, 'HAggh', 'Angel Grand', 'test@test.com', '+17784549897', '$2y$10$aKsR48NBazkZD.0xFG4LueE7eId3aLuBxClsII3SUCpNZNb.5skW.', NULL, 0, 'verified', 1, '2021-04-13 21:28:35'),
(3, 'dasdas', '', '9102@naymeo.com', '', '$2y$10$7STTArq87xmOqntEpfCU/O4dMR0E/ERwM7CXw5nEMOY/CHkhcxvn.', NULL, 0, 'verified', 0, '2021-04-11 18:37:52'),
(4, 'verif', '', 'riyo9102@nmeo.com', '', '$2y$10$BsBNl88sJ2AjM8y04xgTM.KpHmp6aZhmMZ8OgkCza5L0NTTJwE6g2', NULL, 0, 'verified', 1, '2021-04-11 18:37:52'),
(5, 'fsdfs', '', 'fsdfsd@gmail.com', '+6045558899', '$2y$10$Gd3x/JnJeoxuHrZxhNfME.JlbV4FeyWJX1WR.rc35fCcXOOGsGeIW', NULL, 0, 'verified', 1, '2021-04-11 18:37:52'),
(6, 'rwrew', 'John Lee', 'rew@dfg', '', '$2y$10$ZVXjCEugq7krfSs07xtLkeXxkMGxmO99XtstprEhOhzmf8HRKoeGC', NULL, 189396, 'notverified', 1, '2021-04-11 18:37:52'),
(8, '11', NULL, '11@11', NULL, '$2y$10$0qzAUiZ7c8JqHESe8OTYIu1I4VMfyhpA5nDkiHeQ6dkpHMacPxopO', NULL, 907439, 'verified', 0, '2021-04-11 18:37:52'),
(11, 'Jas', NULL, 'jas@test.com', NULL, '$2y$10$5.usCpyvH1M8zwzl0xWXBe1iW7iM8gD9D5dbLsKF1LPdv2N7HbFy6', NULL, 721622, 'notverified', 0, '2021-04-11 18:37:52'),
(12, 'tetst', NULL, '11@ss', NULL, '$2y$10$C8enn0BOiltJc4usokI8XO1CF8/1DcYss8aXlf9HQnMBru8LjneCG', NULL, 753967, 'notverified', 1, '2021-04-11 18:37:52'),
(13, '3232', NULL, '11@322', NULL, '$2y$10$fwaTmxga13SSnlmARr2s3eUl6jpy7Mnd4C93naBWS3qWEW4NPDc4C', NULL, 0, 'verified', 0, '2021-04-11 18:37:52'),
(14, 'admin', NULL, 'ad@ad', NULL, '$2y$10$A4iQ0/hMdHJVuQsGdbHr.OiEM8viHrpNI96/LHcS5rcGgxnTkxkhS', NULL, 0, 'verified', 0, '2021-04-12 17:00:56');

--
-- Triggers `users`
--
DELIMITER $$
CREATE TRIGGER `before_users_delete` BEFORE DELETE ON `users` FOR EACH ROW BEGIN
		
        INSERT INTO logs (action, info, user_id, username, email, full_name, phone) VALUES
        ("deleted", "user info was:", old.id, old.username, old.email, old.full_name, old.phone);

END
$$
DELIMITER ;
DELIMITER $$
CREATE TRIGGER `before_users_update` BEFORE UPDATE ON `users` FOR EACH ROW BEGIN
		
        INSERT INTO logs (action, info, user_id, username, email, full_name, phone) VALUES
        ("update", "old info:", old.id, old.username, old.email, old.full_name, old.phone);

END
$$
DELIMITER ;

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
-- Indexes for table `favourite_ad`
--
ALTER TABLE `favourite_ad`
  ADD KEY `recommended_ibfk_1` (`user_id`),
  ADD KEY `listing_id` (`listing_id`);

--
-- Indexes for table `interact`
--
ALTER TABLE `interact`
  ADD PRIMARY KEY (`id`),
  ADD KEY `user_id` (`user_id`),
  ADD KEY `listing_id` (`listing_id`);

--
-- Indexes for table `logs`
--
ALTER TABLE `logs`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `moderate_user`
--
ALTER TABLE `moderate_user`
  ADD KEY `admin_id` (`admin_id`),
  ADD KEY `user_id` (`user_id`);

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
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT for table `ad_listings`
--
ALTER TABLE `ad_listings`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=51;

--
-- AUTO_INCREMENT for table `category`
--
ALTER TABLE `category`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;

--
-- AUTO_INCREMENT for table `interact`
--
ALTER TABLE `interact`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT for table `logs`
--
ALTER TABLE `logs`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=29;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;

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
  ADD CONSTRAINT `ad_listings_ibfk_2` FOREIGN KEY (`category_id`) REFERENCES `category` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `favourite_ad`
--
ALTER TABLE `favourite_ad`
  ADD CONSTRAINT `favourite_ad_ibfk_1` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `favourite_ad_ibfk_2` FOREIGN KEY (`listing_id`) REFERENCES `ad_listings` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

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
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
