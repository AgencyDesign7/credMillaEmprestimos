-- phpMyAdmin SQL Dump
-- version 5.0.2
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Oct 23, 2020 at 08:26 PM
-- Server version: 10.4.11-MariaDB
-- PHP Version: 7.2.30

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `credmilla_db`
--

-- --------------------------------------------------------

--
-- Table structure for table `chat_teste`
--

CREATE TABLE `chat_teste` (
  `id` int(11) NOT NULL,
  `name` varchar(100) NOT NULL,
  `email` varchar(100) NOT NULL,
  `message` text NOT NULL,
  `last_time` time NOT NULL,
  `definedAuth` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `chat_teste`
--

INSERT INTO `chat_teste` (`id`, `name`, `email`, `message`, `last_time`, `definedAuth`) VALUES
(116, 'admin', 'admin@suporte.com.br', 'ola rapaz', '03:06:37', 1),
(117, 'zavera', 'zavera@gmail.com', 'ola', '03:06:55', 0);

-- --------------------------------------------------------

--
-- Table structure for table `queue_users`
--

CREATE TABLE `queue_users` (
  `id` int(11) NOT NULL,
  `name` varchar(100) NOT NULL,
  `session` text NOT NULL,
  `date_time` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `roomsupport`
--

CREATE TABLE `roomsupport` (
  `id` int(11) NOT NULL,
  `name` varchar(100) NOT NULL,
  `session` text NOT NULL,
  `date_time` time NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `roomsupport`
--

INSERT INTO `roomsupport` (`id`, `name`, `session`, `date_time`) VALUES
(5, 'adenilton', 'l09gs1sb2rlnv18c8ettubngh2', '19:50:51'),
(6, 'Av', 'l09gs1sb2rlnv18c8ettubngh2', '19:52:00'),
(7, 'Adenilton', 'l09gs1sb2rlnv18c8ettubngh2', '01:47:07');

-- --------------------------------------------------------

--
-- Table structure for table `supportlogin`
--

CREATE TABLE `supportlogin` (
  `id` int(11) NOT NULL,
  `name` varchar(100) NOT NULL,
  `email` varchar(100) NOT NULL,
  `login` varchar(100) NOT NULL,
  `password` text NOT NULL,
  `online` tinyint(1) NOT NULL,
  `available` tinyint(1) NOT NULL,
  `currentRoom` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `supportlogin`
--

INSERT INTO `supportlogin` (`id`, `name`, `email`, `login`, `password`, `online`, `available`, `currentRoom`) VALUES
(1, 'admin', 'admin@suporte.com.br', 'admin', '$2y$10$WMblVDDlXsDymnscf6zL/OHScC6eJsZZqI3dkjONoFdIgaUX.iIPW', 1, 0, '');

-- --------------------------------------------------------

--
-- Table structure for table `visitors`
--

CREATE TABLE `visitors` (
  `id` int(11) NOT NULL,
  `ip` varchar(100) NOT NULL,
  `date_time` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `visitors`
--

INSERT INTO `visitors` (`id`, `ip`, `date_time`) VALUES
(1, '::1', '2020-10-23 09:19:29'),
(2, '::1', '2020-10-23 09:23:00'),
(3, '::1', '2020-10-23 09:23:21'),
(4, '127.0.0.1', '2020-10-23 09:23:21'),
(5, '127.0.0.1', '2020-10-23 09:23:21'),
(6, '127.0.0.2', '2020-10-23 09:23:21'),
(7, '::1', '2020-10-23 12:24:12');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `chat_teste`
--
ALTER TABLE `chat_teste`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `queue_users`
--
ALTER TABLE `queue_users`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `roomsupport`
--
ALTER TABLE `roomsupport`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `supportlogin`
--
ALTER TABLE `supportlogin`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `visitors`
--
ALTER TABLE `visitors`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `chat_teste`
--
ALTER TABLE `chat_teste`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=118;

--
-- AUTO_INCREMENT for table `queue_users`
--
ALTER TABLE `queue_users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=45;

--
-- AUTO_INCREMENT for table `roomsupport`
--
ALTER TABLE `roomsupport`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `supportlogin`
--
ALTER TABLE `supportlogin`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `visitors`
--
ALTER TABLE `visitors`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
