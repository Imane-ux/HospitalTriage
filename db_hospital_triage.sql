-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jul 23, 2024 at 06:49 PM
-- Server version: 10.4.22-MariaDB
-- PHP Version: 7.4.27

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `db_houspital_triage`
--

-- --------------------------------------------------------

--
-- Table structure for table `patients`
--

CREATE TABLE `patients` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `user_name` varchar(20) NOT NULL,
  `first_name` varchar(100) NOT NULL,
  `last_name` varchar(100) NOT NULL,
  `age` int(3) NOT NULL,
  `phone` varchar(10) NOT NULL,
  `code` char(3) NOT NULL,
  `severity` tinyint(1) NOT NULL,
  `time_in_queue` timestamp NULL DEFAULT NULL,
  `status` varchar(50) DEFAULT 'waiting'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `patients`
--

INSERT INTO `patients` (`id`, `user_name`, `first_name`, `last_name`, `age`, `phone`, `code`, `severity`, `time_in_queue`, `status`) VALUES
(1, 'jncm', 'Nuwan', 'Chamara', 30, '0770774465', 'AMS', 2, '2024-07-22 12:20:22', 'waiting'),
(2, 'saman', 'Saman', 'Kumara', 26, '0777077755', 'B41', 3, '2024-07-22 12:20:50', 'done'),
(3, 'kasun', 'Kasun', 'Silva', 25, '0770770770', '8X1', 1, '2024-07-22 12:21:13', 'waiting'),
(4, 'sani', 'Sanika', 'Perera', 23, '0777077755', 'ML2', 2, '2024-07-22 12:21:31', 'waiting');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` int(11) NOT NULL,
  `email` varchar(100) NOT NULL,
  `first_name` varchar(50) NOT NULL,
  `last_name` varchar(50) NOT NULL,
  `password` varchar(255) NOT NULL,
  `role` tinyint(4) NOT NULL DEFAULT 0,
  `status` tinyint(1) NOT NULL DEFAULT 1,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `email`, `first_name`, `last_name`, `password`, `role`, `status`, `created_at`) VALUES
(1, 'admin@gmail.com', 'Super', 'Admin', '$2y$10$OA1.Jq3sQXDZV07K/O86YeMWD.CCgu04rmhEFiQAp.bCRnrDSURRa', 1, 1, '2024-07-22 06:00:53'),
(2, 'saman@gmail.com', 'Saman', 'Kumara', '$2y$10$d0uEttYseWNFTayg4ncYwe137ne2gFaqiHFwc7u0330ukBbWvt6W.', 0, 1, '2024-07-22 17:32:35');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `patients`
--
ALTER TABLE `patients`
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
-- AUTO_INCREMENT for table `patients`
--
ALTER TABLE `patients`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
