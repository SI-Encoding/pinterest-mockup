

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";

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
  `username` varchar(100) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `email` varchar(100) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `password` varchar(100) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `remember_token` varchar(100) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `created_at` timestamp NOT NULL,
  `updated_at` timestamp NOT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `admins`
--

INSERT INTO `admins` (`id`, `role_id`, `username`, `email`, `password`, `remember_token`, `created_at`, `updated_at`, `deleted_at`) VALUES
(1, 1, 'Owner', 'test@gmail.com', '123', '123', '2021-03-18 07:00:00', '2021-03-18 07:00:00', NULL),
(2, 2, 'Admin', 'test2@gmail.com', '123', '123', '2021-03-18 07:00:00', '2021-03-18 07:00:00', NULL),
(3, 2, 'Admin', 'test3@gmail.com', '123', '123', '2021-03-18 07:00:00', '2021-03-18 07:00:00', NULL),
(4, 3, 'Moderator', 'test4@gmail.com', '123', '123', '2021-03-18 07:00:00', '2021-03-18 07:00:00', NULL),
(5, 3, 'Moderator', 'test5@gmail.com', '123', '123', '2021-03-18 07:00:00', '2021-03-18 07:00:00', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `ad_images`
--

CREATE TABLE `ad_images` (
  `id` int(11) NOT NULL,
  `listing_id` int(11) NOT NULL,
  `image` varchar(100) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_at` timestamp NOT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `ad_images`
--

INSERT INTO `ad_images` (`id`, `listing_id`, `image`, `created_at`, `updated_at`, `deleted_at`) VALUES
(1, 1, 'test.jpg', '2021-03-19 02:11:17', '2021-03-18 07:00:00', '2021-03-18 07:00:00'),
(2, 2, 'test2.png', '2021-03-19 02:12:43', '2021-03-18 07:00:00', NULL),
(3, 3, 'test3.png', '2021-03-19 02:12:43', '2021-03-18 07:00:00', NULL),
(4, 4, 'test4.png', '2021-03-19 02:12:43', '2021-03-18 07:00:00', NULL),
(5, 5, 'test5.png', '2021-03-19 02:12:43', '2021-03-18 07:00:00', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `ad_listings`
--

CREATE TABLE `ad_listings` (
  `id` int(11) NOT NULL,
  `category_id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `title` varchar(100) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `content` text CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `price` decimal(12,2) NOT NULL,
  `tags` varchar(100) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `country` varchar(40) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `state` varchar(40) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `city` varchar(40) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `active_on` int(1) NOT NULL,
  `featured_on` int(1) NOT NULL,
  `created_at` timestamp NOT NULL,
  `updated_at` timestamp NOT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `ad_listings`
--

INSERT INTO `ad_listings` (`id`, `category_id`, `user_id`, `title`, `content`, `price`, `tags`, `country`, `state`, `city`, `active_on`, `featured_on`, `created_at`, `updated_at`, `deleted_at`) VALUES
(1, 1, 7, 'Bedroom', 'Blue room for sale', '550.00', 'bedroom, blue, for sale', 'Canada', 'Ontario', 'New York', 1, 0, '2021-03-18 07:00:00', '2021-03-18 07:00:00', '2021-03-18 07:00:00'),
(2, 2, 7, 'Garage', 'Garage can be used for storage', '1000.00', 'Garage, storage, space', 'Canada', 'Alberta', 'Calgary', 1, 0, '2021-03-18 07:00:00', '2021-03-18 07:00:00', NULL),
(3, 2, 8, 'Washroom', 'Nice shower stall', '1000.00', 'Washroom, clean', 'Canada', 'Quebec', 'Montreal', 1, 0, '2021-03-18 07:00:00', '2021-03-18 07:00:00', NULL),
(4, 2, 8, 'Dining Room', 'Nice family sized dinner table', '1000.00', 'Dinner, guest food', 'Canada', 'British Columbia', 'Vancouver', 1, 0, '2021-03-18 07:00:00', '2021-03-18 07:00:00', NULL),
(5, 2, 3, 'Recreational Room', 'Nice pool table to play games with friend', '2000.00', 'Play, fun', 'Canada', 'Newfoundland', 'Labrador', 1, 0, '2021-03-18 07:00:00', '2021-03-18 07:00:00', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` int(11) NOT NULL,
  `username` varchar(30) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `email` varchar(255) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `password` varchar(100) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `profile_image` varchar(255) CHARACTER SET utf8 COLLATE utf8_unicode_ci DEFAULT NULL,
  `code` mediumint(50) NOT NULL,
  `status` text CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `username`, `email`, `password`, `profile_image`, `code`, `status`) VALUES
(1, 'User2', 'user2@gmail.com', '$2y$10$yj8npKK6dXkfiXYee/k9kuf.am.QGplx8jMCqmAQNbtwuidDWUBgK', NULL, 0, 'verified'),
(2, 'User3', 'user3@gmail.com', '$2y$10$yj8npKK6dXkfiXYee/k9kuf.am.QGplx8jMCqmAQNbtwuidDWUBgK', NULL, 0, 'verified'),
(3, 'User4', 'user4@gmail.com', '$2y$10$yj8npKK6dXkfiXYee/k9kuf.am.QGplx8jMCqmAQNbtwuidDWUBgK', NULL, 0, 'verified'),
(7, 'User1', 'user@gmail.com', '$2y$10$yj8npKK6dXkfiXYee/k9kuf.am.QGplx8jMCqmAQNbtwuidDWUBgK', NULL, 546281, 'notverified'),
(8, 'User5', 'user5@gmail.com', '$2y$10$yj8npKK6dXkfiXYee/k9kuf.am.QGplx8jMCqmAQNbtwuidDWUBgK', NULL, 0, 'verified');

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
  ADD KEY `listing_id` (`listing_id`);

--
-- Indexes for table `ad_listings`
--
ALTER TABLE `ad_listings`
  ADD PRIMARY KEY (`id`),
  ADD KEY `user_id` (`user_id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `ad_images`
--
ALTER TABLE `ad_images`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `ad_images`
--
ALTER TABLE `ad_images`
  ADD CONSTRAINT `ad_images_ibfk_1` FOREIGN KEY (`listing_id`) REFERENCES `ad_listings` (`id`) ON DELETE RESTRICT ON UPDATE RESTRICT;

--
-- Constraints for table `ad_listings`
--
ALTER TABLE `ad_listings`
  ADD CONSTRAINT `ad_listings_ibfk_1` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE RESTRICT ON UPDATE RESTRICT;
COMMIT;

