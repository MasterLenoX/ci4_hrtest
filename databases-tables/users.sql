-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Mar 26, 2024 at 04:47 AM
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
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` int(11) NOT NULL COMMENT 'Primary Key',
  `name` varchar(100) NOT NULL COMMENT 'Name',
  `email` varchar(255) NOT NULL COMMENT 'Email Address'
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci COMMENT='datatable demo table';

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `name`, `email`) VALUES
(1, 'Airi Satou', 'AiriSatou@gmail.com'),
(2, 'Angelica Ramos', 'AngelicaRamos@gmail.com'),
(3, 'Ashton Cox', 'AshtonCox@gmail.com'),
(4, 'Bradley Greer', 'BradleyGreer@gmail.com'),
(5, 'Brielle Williamson', 'BrielleWilliamson@gmail.com'),
(6, 'Bruno Nash', 'BrunoNash@gmail.com'),
(7, 'Caesar Vance', 'CaesaVance@gmail.com'),
(8, 'cairocoders', 'cairocoders@gmail.com'),
(9, 'Cara Stevens', 'CaraStevens@gmail.com'),
(11, 'caity', 'caity@gmail.com'),
(12, 'Cedric Kelly', 'CedricKelly@gmail.com'),
(13, 'Leon James Emperado', 'lenoxemperado@gmail.com'),
(14, 'Gewel Gabriellle Miniano', 'gewel.gabrielle@gmail.com'),
(15, 'Danielle Emperado', 'danielle.emperado@gmail.com'),
(16, 'Eldrick John Bobos', 'ej.boboss@gmail.com');
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
CREATE TABLE `loginusers` (
  `id` int(11) NOT NULL COMMENT 'Primary Key',
  `userid` varchar(100) NOT NULL COMMENT 'User ID',
  `name` varchar(100) NOT NULL COMMENT 'Name',
  `username` varchar(100) NOT NULL COMMENT 'User Name',
  `userpass` varchar(100) NOT NULL COMMENT 'User Password'
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci COMMENT='datatable demo table';