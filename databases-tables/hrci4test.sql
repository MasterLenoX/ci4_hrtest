-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jun 15, 2024 at 04:41 AM
-- Server version: 10.4.32-MariaDB
-- PHP Version: 8.2.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `hrci4test`
--

-- --------------------------------------------------------

--
-- Table structure for table `employees`
--

CREATE TABLE `employees` (
  `id` int(10) UNSIGNED NOT NULL,
  `emp_id_no` varchar(100) NOT NULL,
  `emp_firstname` varchar(255) NOT NULL,
  `emp_midname` varchar(255) NOT NULL,
  `emp_lastname` varchar(255) NOT NULL,
  `emp_dob` date NOT NULL,
  `emp_pob` varchar(255) NOT NULL,
  `emp_location_add` varchar(255) NOT NULL,
  `emp_email_add` varchar(255) NOT NULL,
  `emp_contact_no` varchar(255) NOT NULL,
  `ordering` int(11) DEFAULT 10000,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `updated_at` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;

--
-- Dumping data for table `employees`
--

INSERT INTO `employees` (`id`, `emp_id_no`, `emp_firstname`, `emp_midname`, `emp_lastname`, `emp_dob`, `emp_pob`, `emp_location_add`, `emp_email_add`, `emp_contact_no`, `ordering`, `created_at`, `updated_at`) VALUES
(1, 'FFI-0941', 'Leonard James', 'Ternida', 'Emperado', '1997-09-02', 'Jeddah, Saudi Arabia', '#406 DRT Highway Capihan, San Rafael, Bulacan', 'lenoxemperado@google.com', '1235612367123', 10000, '2024-06-06 01:40:23', '2024-06-06 01:40:23'),
(2, 'FFI-0942', 'Gewel Gabrielle', 'Pinpin', 'Miniano', '2001-11-07', 'Arayat, Pampanga', 'Arayat, Pampanga', 'gewel.gabrielle@google.com', '4566879154384123', 10000, '2024-06-06 01:42:50', '2024-06-06 01:42:50'),
(3, 'FFI-0943', 'Gianni Oliver', 'Cruz', 'Villangca', '1999-01-05', 'Sampaloc, San Rafael, Bulacan', 'Sampaloc, San Rafael, Bulacan', 'yani.villangca@google.com', '44569899786524', 10000, '2024-06-06 03:25:01', '2024-06-06 03:25:01'),
(4, 'FFI-0944', 'Jayvee', 'Alcantara', 'Pontanares', '1996-10-22', 'Malamig, Bustos, Bulacan', 'Malamig, Bustos, Bulacan', 'jvreadytorock@google.com', '788334945564134', 10000, '2024-06-07 03:13:41', '2024-06-07 03:13:41'),
(5, 'FFI-0945', 'Danielle Grace', 'Ternida', 'Emperado', '2001-05-08', 'Jeddah, Saudi Arabia', '#406 DRT Highway Capihan, San Rafael, Bulacan', 'daniellevpnugget@google.com', '12351435443151135', 10000, '2024-06-07 03:15:30', '2024-06-07 03:15:30'),
(6, 'FFI-0946', 'Joseph Clint', 'Peo', 'Garcia', '1994-09-01', 'Sabang, Baliwag, Bulacan', 'Sabang, Baliwag, Bulacan', 'shiro.emo@google.com', '4533484343435453843', 10000, '2024-06-13 07:12:51', '2024-06-13 07:12:51'),
(7, 'FFI-0947', 'John Amiel', 'Delos Santos', 'Sayo', '1999-07-15', 'Malimpampang, San Ildefonso, Bulacan', 'Malimpampang, San Ildefonso, Bulacan', 'sayocurse@google.com', '43549483', 10000, '2024-06-13 07:23:47', '2024-06-13 07:23:47'),
(8, 'FFI-0948', 'Rialyn Joy', 'F.', 'Suarez', '2000-07-23', 'Pandi, Bulacan', 'Pandi, Bulacan', 'rialyn.suarez@google.com', '15484684484', 10000, '2024-06-13 08:14:13', '2024-06-13 08:14:13'),
(9, 'FFI-0949', 'Denver ', 'C', 'Cubos', '2000-06-13', 'Bulakan, Bulakan', 'Bulakan, Bulakan', 'denver.cubos@google.com', '43386959', 10000, '2024-06-13 08:15:04', '2024-06-13 08:15:04');

-- --------------------------------------------------------

--
-- Table structure for table `migrations`
--

CREATE TABLE `migrations` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `version` varchar(255) NOT NULL,
  `class` varchar(255) NOT NULL,
  `group` varchar(255) NOT NULL,
  `namespace` varchar(255) NOT NULL,
  `time` int(11) NOT NULL,
  `batch` int(11) UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;

--
-- Dumping data for table `migrations`
--

INSERT INTO `migrations` (`id`, `version`, `class`, `group`, `namespace`, `time`, `batch`) VALUES
(1, '2024-04-22-071603', 'App\\Database\\Migrations\\CreateUsersTable', 'default', 'App', 1713770809, 1),
(2, '2024-04-23-073328', 'App\\Database\\Migrations\\CreatePasswordResetTokensTable', 'default', 'App', 1713857818, 2),
(3, '2024-04-30-060843', 'App\\Database\\Migrations\\CreateUsersProfileTable', 'default', 'App', 1716458107, 3),
(4, '2024-05-23-094011', 'App\\Database\\Migrations\\CreateSettingsTable', 'default', 'App', 1716458107, 3),
(5, '2024-05-29-035725', 'App\\Database\\Migrations\\CreateSocialMediaTable', 'default', 'App', 1716963305, 4),
(6, '2024-06-05-035610', 'App\\Database\\Migrations\\CreateEmployeesTable', 'default', 'App', 1717570950, 5),
(7, '2024-06-13-064555', 'App\\Database\\Migrations\\UpdateEmployeesTable', 'default', 'App', 1718261357, 6);

-- --------------------------------------------------------

--
-- Table structure for table `password_reset_tokens`
--

CREATE TABLE `password_reset_tokens` (
  `email` varchar(255) NOT NULL,
  `token` varchar(255) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;

--
-- Dumping data for table `password_reset_tokens`
--

INSERT INTO `password_reset_tokens` (`email`, `token`, `created_at`) VALUES
('test_admin@fisherfarms.ph', 'da0238c17e4d0ebeb5c25263d45acabdf5c5221f1af0c54eec312b5ad80c98099ffcfe947cd0f5629b349c93e6ce4e7ce24618200888823be349309168f06ded0c', '2024-04-26 00:29:19');

-- --------------------------------------------------------

--
-- Table structure for table `settings`
--

CREATE TABLE `settings` (
  `id` int(10) UNSIGNED NOT NULL,
  `blog_title` varchar(255) NOT NULL,
  `blog_email` varchar(255) NOT NULL,
  `blog_phone` varchar(255) DEFAULT NULL,
  `blog_meta_keywords` varchar(255) DEFAULT NULL,
  `blog_meta_desc` text DEFAULT NULL,
  `blog_logo` varchar(255) DEFAULT NULL,
  `blog_favicon` varchar(255) DEFAULT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `updated_at` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;

--
-- Dumping data for table `settings`
--

INSERT INTO `settings` (`id`, `blog_title`, `blog_email`, `blog_phone`, `blog_meta_keywords`, `blog_meta_desc`, `blog_logo`, `blog_favicon`, `created_at`, `updated_at`) VALUES
(1, 'CI4 HRIS', 'info@ci4hradmin.test', '1234567890', 'TEST', 'This is a CodeIgniter ver 4.4.6 Human Resources Information System. This is a Test Site. Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum.', NULL, NULL, '2024-05-24 01:53:25', '2024-05-24 07:27:03');

-- --------------------------------------------------------

--
-- Table structure for table `social_media`
--

CREATE TABLE `social_media` (
  `id` int(10) UNSIGNED NOT NULL,
  `facebook_url` varchar(255) NOT NULL,
  `twitter_url` varchar(255) NOT NULL,
  `instagram_url` varchar(255) DEFAULT NULL,
  `youtube_url` varchar(255) DEFAULT NULL,
  `github_url` text DEFAULT NULL,
  `linkedin_url` varchar(255) DEFAULT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `updated_at` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;

--
-- Dumping data for table `social_media`
--

INSERT INTO `social_media` (`id`, `facebook_url`, `twitter_url`, `instagram_url`, `youtube_url`, `github_url`, `linkedin_url`, `created_at`, `updated_at`) VALUES
(1, '', '', '', '', 'https://github.com/MasterLenoX', 'https://www.linkedin.com/in/leonard-james-emperado-83b13a1b6', '2024-05-30 09:29:39', '2024-05-30 09:29:39');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` int(10) UNSIGNED NOT NULL,
  `name` varchar(255) NOT NULL,
  `username` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL,
  `picture` varchar(255) DEFAULT NULL,
  `bio` text DEFAULT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `updated_at` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `name`, `username`, `email`, `password`, `picture`, `bio`, `created_at`, `updated_at`) VALUES
(3, 'Test Test', 'testadmin1', 'test_admin@fisherfarms.ph', '$2y$10$OikOzdN2A5FlqYZDoACxfOPOwwNVcoMjToLnlCNYlTqB5XNckSOly', NULL, 'TEST BIOGRAPHY TEST', '2024-04-22 07:48:19', '2024-05-24 06:27:45'),
(4, 'Admin', 'adminffi', 'admin_ffi@fisherfarms.ph', '$2y$10$jD175QbgYT7LrYj1XR4IZuCE/G3TsMndyOfd1LZt5eB63dOW3F5M.', NULL, NULL, '2024-04-23 05:20:59', '2024-04-23 05:20:59');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `employees`
--
ALTER TABLE `employees`
  ADD KEY `id` (`id`);

--
-- Indexes for table `migrations`
--
ALTER TABLE `migrations`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `settings`
--
ALTER TABLE `settings`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `social_media`
--
ALTER TABLE `social_media`
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
-- AUTO_INCREMENT for table `employees`
--
ALTER TABLE `employees`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT for table `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `settings`
--
ALTER TABLE `settings`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `social_media`
--
ALTER TABLE `social_media`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
