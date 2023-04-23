-- phpMyAdmin SQL Dump
-- version 5.1.3
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Sep 30, 2022 at 08:00 PM
-- Server version: 10.4.24-MariaDB
-- PHP Version: 8.1.4

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";

--
-- Database: `triumph`
--

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` int(11) NOT NULL,
  `email` varchar(255) NOT NULL,
  `password` int(11) NOT NULL,
  `status` int(11) NOT NULL,
  `username` varchar(255) NOT NULL,
  `oap_name` varchar(255) NOT NULL,
  `first_name` varchar(50) NOT NULL DEFAULT 'FirstName',
  `last_name` varchar(50) NOT NULL DEFAULT 'LastName',
  `level` int(5) NOT NULL DEFAULT 300,
  `admin_id` int(11) DEFAULT NULL,
  `position` varchar(50) NOT NULL DEFAULT 'OAP',
  `no_of_shows` int(11) NOT NULL,
  `created_at` datetime NOT NULL DEFAULT current_timestamp(),
  `deleted_at` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `email`, `password`, `status`, `username`, `oap_name`, `first_name`, `last_name`, `level`, `admin_id`, `position`, `no_of_shows`, `created_at`, `deleted_at`) VALUES
(1, 'williams@triumpheduradio.com', 0, 0, 'directorgreat', 'Director Great', 'FirstName', 'LastName', 0, NULL, 'OAP', 0, '2022-09-30 17:23:11', NULL),
(2, 'chapo@triumpheduradio.com', 0, 0, 'chapo', 'ISG', 'Chapo', 'ISG', 300, NULL, 'OAP', 0, '2022-09-12 16:33:27', NULL);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `employee_id` (`admin_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;
COMMIT;
