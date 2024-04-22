-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Apr 08, 2024 at 11:44 AM
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
-- Database: `testweb`
--

-- --------------------------------------------------------

--
-- Table structure for table `employee`
--

CREATE TABLE `employee` (
  `id` int(10) NOT NULL,
  `emp_code` varchar(50) DEFAULT NULL,
  `emp_fname` varchar(100) DEFAULT NULL,
  `emp_lname` varchar(100) DEFAULT NULL,
  `emp_email` varchar(255) DEFAULT NULL,
  `emp_phone` varchar(255) DEFAULT NULL,
  `password` varchar(100) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Dumping data for table `employee`
--

INSERT INTO `employee` (`id`, `emp_code`, `emp_fname`, `emp_lname`, `emp_email`, `emp_phone`, `password`, `created_at`) VALUES
(1, 'FFI-003', 'Leon James', 'Emperado', 'lenoxemperado@gmail.com', '0935-2134521', '', '2024-03-19 02:53:33');

-- --------------------------------------------------------

--
-- Table structure for table `members`
--

CREATE TABLE `members` (
  `id` int(11) NOT NULL,
  `firstname` varchar(30) NOT NULL,
  `lastname` varchar(30) NOT NULL,
  `address` varchar(150) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Dumping data for table `members`
--

INSERT INTO `members` (`id`, `firstname`, `lastname`, `address`) VALUES
(1, 'Cairocoders', 'Ednalan', 'Olongapo City'),
(2, 'Clydey', 'Ednalan', 'Olongapo City'),
(4, 'cairty sdf', 'Mojica sdf ', 'Olongaposdf '),
(5, 'Airi', 'Satou', 'Tokyo'),
(6, 'Angelica', 'Ramos', 'London'),
(7, 'Ashton', 'Cox', 'San Francisco'),
(8, 'Bradley', 'Greer', 'London'),
(9, 'Brenden', 'Wagner', 'San Francisco'),
(10, 'Brielle', 'Williamson', 'London'),
(11, 'Caesar', 'Vance', 'New York'),
(12, 'Cara', 'Stevens', 'New York'),
(13, 'Gianni Oliver', 'Villangca', 'Sampaloc, San Rafael, Bulacan'),
(14, 'Cedric', 'Kelly', 'Edinburgh'),
(17, 'Leon James', 'Emperado', 'Capihan, San Rafael, Bulacan'),
(18, 'Gewel Gabrielle', 'Miniano', 'Arayat, Pampanga'),
(19, 'Jayvee IS READY TO ROCK N ROLL', 'Pontanares ', 'Malamig, Bustos, Bulacan'),
(20, 'Amiel John Cena', 'Sayo', 'Malipampang, San Ildefonso, Bulacan'),
(21, 'Leon', 'Kennedy', 'Washington, DC, USA');

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
(1, '2024-03-26-063940', 'App\\Database\\Migrations\\LoginusersTable', 'default', 'App', 1711436126, 1),
(2, '2024-04-01-060132', 'App\\Database\\Migrations\\CreatePasswordResetTokensTable', 'default', 'App', 1711952084, 2),
(3, '2024-04-05-091908', 'App\\Database\\Migrations\\CreateSettingsTable', 'default', 'App', 1712313254, 3);

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
('test.admin@gmail.com', '378eacbf6849de621af0b2c2f1a976deb462f59b5174b4c0de8d10954d64fdbb8dc8428b815b579976de9991c139c83e0f29e577a2639cf8ba918251f28ae4ab51', '2024-04-07 22:37:40');

-- --------------------------------------------------------

--
-- Table structure for table `settings`
--

CREATE TABLE `settings` (
  `id` int(10) UNSIGNED NOT NULL,
  `blog_title` varchar(255) NOT NULL,
  `blog_email` varchar(255) NOT NULL,
  `blog_phone_no` varchar(255) DEFAULT NULL,
  `blog_meta_keywords` varchar(255) DEFAULT NULL,
  `blog_meta_description` text DEFAULT NULL,
  `blog_logo` varchar(255) DEFAULT NULL,
  `blog_favicon` varchar(255) DEFAULT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `updated_at` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;

--
-- Dumping data for table `settings`
--

INSERT INTO `settings` (`id`, `blog_title`, `blog_email`, `blog_phone_no`, `blog_meta_keywords`, `blog_meta_description`, `blog_logo`, `blog_favicon`, `created_at`, `updated_at`) VALUES
(1, 'CI4Blog', 'info@ci4blog.test', NULL, NULL, NULL, NULL, NULL, '2024-04-05 10:49:54', '2024-04-05 10:49:54');

-- --------------------------------------------------------

--
-- Table structure for table `student`
--

CREATE TABLE `student` (
  `id` int(11) NOT NULL,
  `firstname` varchar(100) NOT NULL,
  `lastname` varchar(100) NOT NULL,
  `address` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `student`
--

INSERT INTO `student` (`id`, `firstname`, `lastname`, `address`) VALUES
(14, 'Leon James', 'Emperado', 'Capihan, San Rafael, Bulacan'),
(15, 'Gabrielle', 'Miniano', 'Arayat, Pampanga'),
(16, 'Dane', 'Emperado', 'Capihan, San Rafael, Bulacan'),
(17, 'Eldrick', 'Bobos', 'Bataan'),
(18, 'Gianni', 'Villangca', 'Sampaloc, San Rafael, Bulacan'),
(19, 'Jayvee', 'Pontanares', 'Malamig, Bustos, Bulacan'),
(20, 'Clint', 'Garcia', 'Sabang, Baliwag, Bulacan'),
(24, 'Amiel John Cena', 'Sayo', 'Malipampang, San Ildefonso, Bulacan');

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
(1, 'Admin', 'admin', 'test.admin@gmail.com', '$2y$10$O0iP/QEEkcWb4G7Un/S0i.JlyLV6dHuDah2NXuDsMuP94.4CItGVa', NULL, '', '2024-03-26 07:12:32', '2024-04-08 02:06:01');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `employee`
--
ALTER TABLE `employee`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `members`
--
ALTER TABLE `members`
  ADD PRIMARY KEY (`id`);

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
-- Indexes for table `student`
--
ALTER TABLE `student`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `employee`
--
ALTER TABLE `employee`
  MODIFY `id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `members`
--
ALTER TABLE `members`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=22;

--
-- AUTO_INCREMENT for table `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `settings`
--
ALTER TABLE `settings`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `student`
--
ALTER TABLE `student`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=29;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
