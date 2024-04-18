-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Apr 18, 2024 at 03:16 AM
-- Server version: 10.4.28-MariaDB
-- PHP Version: 8.2.4

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `bh_tracking`
--

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` int(11) NOT NULL,
  `first_name` varchar(255) NOT NULL,
  `last_name` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL,
  `approved` tinyint(1) NOT NULL DEFAULT 0,
  `registration_date` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  `role` enum('admin','super_admin') NOT NULL DEFAULT 'admin'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `first_name`, `last_name`, `email`, `password`, `approved`, `registration_date`, `role`) VALUES
(1, 'test', 'test', 'test@gmail.com', '$2y$10$xjhiUkdCnKBZVyNTv.178eZ.Su7wo87tIbp6ZA90XcSl6QjvPubJ2', 1, '2024-04-17 05:34:50', 'super_admin'),
(2, 'test2', 'test2', 'test2@gmail.com', '$2y$10$Z0wmTNLKqRXvqfI/t9nJs.0NO5GOP2JSCFU6rxz1h4DXPEaA1i7uC', 0, '2024-04-17 02:43:23', 'admin'),
(3, 'test', 'test', 'test@test.com', '$2y$10$g6qGlLvb0.DlWRPFc9PWbOlRu1jGRcWoscfVPKtcyN9yOIlBpNWsO', 0, '2024-04-17 01:02:08', 'admin'),
(4, 'hope', 'tabunlupa', 'hope@gmail.com', '$2y$10$el2fHp1bHJWY1lz2HFYJIegDYY6OrvXSi81zkEKj.JKXVelZUWyyC', 1, '2024-04-17 02:50:30', 'admin');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
