-- phpMyAdmin SQL Dump
-- version 4.7.4
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Mar 23, 2018 at 07:38 PM
-- Server version: 10.1.28-MariaDB
-- PHP Version: 7.1.11

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `loorate`
--

-- --------------------------------------------------------

--
-- Table structure for table `bathrooms`
--

CREATE TABLE `bathrooms` (
  `id` int(10) UNSIGNED NOT NULL,
  `title` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `address` varchar(300) COLLATE utf8mb4_unicode_ci NOT NULL,
  `longitude` double(9,7) NOT NULL,
  `latitude` double(9,7) NOT NULL,
  `price` decimal(4,2) NOT NULL,
  `rating` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `bathrooms`
--

INSERT INTO `bathrooms` (`id`, `title`, `address`, `longitude`, `latitude`, `price`, `rating`, `created_at`, `updated_at`) VALUES
(1, 'Three Tun Tavern', '1-5 Temple Road, Carysfort Avenue, Blackrock, Co. Dublin, Ireland', -6.1771710, 53.3005400, '2.00', '4', '2018-03-20 23:08:25', '2018-03-21 09:24:54'),
(2, 'The Forty Foot Wetherspoons', 'The Pavilion Centre, Marine Rd, Dún Laoghaire, Dublin 18, A96 X2H2, Ireland', -6.1340263, 53.2937518, '2.00', '4', '2018-03-21 09:26:30', '2018-03-21 09:26:30'),
(3, 'Baker\'s Corner', 'Kill-O-The Grange Garda Station, Rochestown Ave, Kill of the Grange, Dublin, Ireland', -6.1579280, 53.2810860, '2.00', '4', '2018-03-21 14:32:20', '2018-03-21 14:32:20'),
(4, 'People\'s Park', 'Park Rd, Glasthule, Dublin, Ireland', -6.1286576, 53.2898479, '0.00', '3', '2018-03-21 14:35:21', '2018-03-23 15:58:25'),
(5, 'Killiney Public Bathroom', 'Killiney, Co. Dublin, Ireland', -6.1134394, 53.2573824, '0.00', '2', '2018-03-21 14:37:02', '2018-03-23 18:08:51'),
(6, 'Greystones Public Bathroom', 'Killincarrig, Greystones, Co.Wicklow', -6.0591280, 53.1415260, '2.00', '2', '2018-03-21 14:40:50', '2018-03-21 14:40:50'),
(7, 'Public Bathroom in Supervalu Sundrive Complex', '169C Kimmage Rd Lower, Kimmage, Dublin 6W, Co. Dublin, Ireland', -6.3292841, 53.3321659, '0.00', '3', '2018-03-21 14:43:00', '2018-03-21 14:43:00'),
(8, 'St.Stephen\'s Green Shopping Centre (Top Floor)', 'Stephens Green West, Dublin 2, Ireland', -6.2628782, 53.3391885, '0.20', '3', '2018-03-21 14:45:10', '2018-03-21 14:45:10'),
(9, 'Dundrum Town Centre', '16 Sandyford Rd, Dundrum, Dublin, Ireland', -6.2444556, 53.2870112, '0.00', '5', '2018-03-21 14:46:08', '2018-03-21 14:46:08'),
(10, 'Dun Laoghaire Shopping Centre', 'Marine Rd Dún Laoghaire Dublin Ireland', -6.1356362, 53.2924935, '0.20', '2', '2018-03-21 14:47:44', '2018-03-23 15:55:15'),
(11, 'Howth Pier Restrooms', 'Howth, Co. Dublin, Ireland', -6.0836852, 53.3847549, '0.00', '2', '2018-03-21 14:49:59', '2018-03-21 14:49:59'),
(12, 'Kanturk Public Bathroom', '13 Church St, Kanturk, Co. Cork, P51 P7W5', -8.9118090, 52.1814095, '0.00', '1', '2018-03-21 14:53:27', '2018-03-21 14:53:27'),
(13, 'Belfast Council Public Toilet', '19-21 Church Ln, Belfast BT1 4QN, UK', -5.9286874, 54.6000008, '0.00', '4', '2018-03-21 14:56:06', '2018-03-21 15:00:35'),
(14, 'Public Toilets The Quay', 'Athol St, IM9 5DS, Isle of Man', -4.7378606, 54.0720537, '0.00', '3', '2018-03-21 14:57:09', '2018-03-21 15:03:01'),
(15, 'Gort Public Toilets', 'Coole, Co. Galway', -8.8208009, 53.0682186, '1.00', '3', '2018-03-21 14:59:16', '2018-03-21 14:59:16'),
(16, 'Cornelscourt Shopping Centre', 'Bray Rd Cabinteely Dublin 18', -6.1610780, 53.2664465, '0.00', '4', '2018-03-22 11:33:09', '2018-03-22 11:33:09');

-- --------------------------------------------------------

--
-- Table structure for table `comments`
--

CREATE TABLE `comments` (
  `id` int(10) UNSIGNED NOT NULL,
  `title` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `body` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `bathroom_id` int(10) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `comments`
--

INSERT INTO `comments` (`id`, `title`, `body`, `bathroom_id`, `created_at`, `updated_at`) VALUES
(1, 'no wheelchair accessible bathroom', 'my sister couldn\'t use the bathrooms facilities here as they are upstairs', 1, '2018-03-23 10:01:41', '2018-03-23 10:01:41');

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
(20, '2014_10_12_100000_create_password_resets_table', 7),
(21, '2018_01_18_140811_create_bathroom_table', 7),
(22, '2018_01_18_141033_create_role_table', 7),
(23, '2018_01_18_141112_create_role_user_table', 7),
(24, '2018_03_17_115142_create_comments_table', 7);

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
-- Table structure for table `roles`
--

CREATE TABLE `roles` (
  `id` int(10) UNSIGNED NOT NULL,
  `name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `description` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `roles`
--

INSERT INTO `roles` (`id`, `name`, `description`, `created_at`, `updated_at`) VALUES
(1, 'admin', 'administrator', NULL, NULL),
(2, 'user', 'user', NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `role_user`
--

CREATE TABLE `role_user` (
  `id` int(10) UNSIGNED NOT NULL,
  `role_id` int(10) UNSIGNED NOT NULL,
  `user_id` int(10) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `role_user`
--

INSERT INTO `role_user` (`id`, `role_id`, `user_id`, `created_at`, `updated_at`) VALUES
(1, 1, 2, NULL, NULL),
(2, 2, 1, NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` int(10) UNSIGNED NOT NULL,
  `name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `password` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `remember_token` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `name`, `email`, `password`, `remember_token`, `created_at`, `updated_at`) VALUES
(1, 'Joe Bloggs', 'joe@bloggs.com', '$2y$10$SU6kNgAELsfTW6LhPl5RN.AJDzGyqsdHMc2EjBZdbKUpgZRX.ZWVy', 'IgG5muuflMeOcWjNzVLGdkeDK9X8IsY8hNER16igF6AzIVUuHWwPp3AbASVB', '2018-01-25 18:19:30', '2018-01-25 18:19:30'),
(2, 'Mary Bloggs', 'mary@bloggs.com', '$2y$10$V5NTtJKC54Qf9QDFloGk2OyhX/CNUYnxExQQgutQw6oUJfJzsiI3i', 'UnYApeuFXspL45SBciJk4SGwCvzCK9J7RV83qNnCHZkcIvhu3Ha1Qxo8JUID', '2018-01-25 18:19:30', '2018-01-25 18:19:30');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `bathrooms`
--
ALTER TABLE `bathrooms`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `comments`
--
ALTER TABLE `comments`
  ADD PRIMARY KEY (`id`),
  ADD KEY `comments_bathroom_id_foreign` (`bathroom_id`);

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
-- Indexes for table `roles`
--
ALTER TABLE `roles`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `roles_name_unique` (`name`);

--
-- Indexes for table `role_user`
--
ALTER TABLE `role_user`
  ADD PRIMARY KEY (`id`),
  ADD KEY `role_user_role_id_foreign` (`role_id`),
  ADD KEY `role_user_user_id_foreign` (`user_id`);

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
-- AUTO_INCREMENT for table `bathrooms`
--
ALTER TABLE `bathrooms`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=17;

--
-- AUTO_INCREMENT for table `comments`
--
ALTER TABLE `comments`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=25;

--
-- AUTO_INCREMENT for table `roles`
--
ALTER TABLE `roles`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `role_user`
--
ALTER TABLE `role_user`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `comments`
--
ALTER TABLE `comments`
  ADD CONSTRAINT `comments_bathroom_id_foreign` FOREIGN KEY (`bathroom_id`) REFERENCES `bathrooms` (`id`);

--
-- Constraints for table `role_user`
--
ALTER TABLE `role_user`
  ADD CONSTRAINT `role_user_role_id_foreign` FOREIGN KEY (`role_id`) REFERENCES `roles` (`id`),
  ADD CONSTRAINT `role_user_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
