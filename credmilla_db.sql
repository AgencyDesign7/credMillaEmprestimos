-- phpMyAdmin SQL Dump
-- version 5.0.2
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Oct 16, 2020 at 05:15 PM
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

--
-- Dumping data for table `queue_users`
--

INSERT INTO `queue_users` (`id`, `name`, `session`, `date_time`) VALUES
(18, 'marcos', 'l09gs1sb2rlnv18c8ettubngh2', '2020-10-16 03:56:36'),
(19, 'jo', '304d3akjul5scs3b4aut8nh0mt', '2020-10-16 04:03:38');

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
(1, 'admin', 'admin@suporte.com.br', 'admin', '$2y$10$WMblVDDlXsDymnscf6zL/OHScC6eJsZZqI3dkjONoFdIgaUX.iIPW', 1, 0, '2020_l09gs1sb2rlnv18c8ettubngh2');

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
-- Indexes for table `supportlogin`
--
ALTER TABLE `supportlogin`
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
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=20;

--
-- AUTO_INCREMENT for table `supportlogin`
--
ALTER TABLE `supportlogin`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
