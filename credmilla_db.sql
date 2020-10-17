-- phpMyAdmin SQL Dump
-- version 4.9.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Tempo de geração: 17-Out-2020 às 03:18
-- Versão do servidor: 10.4.8-MariaDB
-- versão do PHP: 7.3.11

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Banco de dados: `credmilla_db`
--

-- --------------------------------------------------------

--
-- Estrutura da tabela `chat_teste`
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
-- Extraindo dados da tabela `chat_teste`
--

INSERT INTO `chat_teste` (`id`, `name`, `email`, `message`, `last_time`, `definedAuth`) VALUES
(116, 'admin', 'admin@suporte.com.br', 'ola rapaz', '03:06:37', 1),
(117, 'zavera', 'zavera@gmail.com', 'ola', '03:06:55', 0);

-- --------------------------------------------------------

--
-- Estrutura da tabela `queue_users`
--

CREATE TABLE `queue_users` (
  `id` int(11) NOT NULL,
  `name` varchar(100) NOT NULL,
  `session` text NOT NULL,
  `date_time` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Extraindo dados da tabela `queue_users`
--

INSERT INTO `queue_users` (`id`, `name`, `session`, `date_time`) VALUES
(30, 'juvenildo', 'jkslfsdf15', '2020-10-10 14:00:15'),
(31, 'silas', 'jkslfsdf15', '2020-10-10 14:00:15'),
(32, 'rogerio', 'jkslfsdf15', '2020-10-10 14:00:15'),
(33, 'hiago', 'r09v3cgocls3hj5ik6t99f86d8', '2020-10-16 21:57:06'),
(34, 'marcos', 'r09v3cgocls3hj5ik6t99f86d8', '2020-10-16 22:08:12'),
(37, 'adenilton', 'r09v3cgocls3hj5ik6t99f86d8', '2020-10-16 22:14:36');

-- --------------------------------------------------------

--
-- Estrutura da tabela `roomsupport`
--

CREATE TABLE `roomsupport` (
  `id` int(11) NOT NULL,
  `name` varchar(100) NOT NULL,
  `session` text NOT NULL,
  `date_time` time NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Extraindo dados da tabela `roomsupport`
--

INSERT INTO `roomsupport` (`id`, `name`, `session`, `date_time`) VALUES
(1, 'marcos', 'r09v3cgocls3hj5ik6t99f86d8', '04:58:55'),
(2, 'marcos', '1561sdf1sd61f', '00:00:00'),
(3, 'juvenildo', 'jkslfsdf15', '14:00:15');

-- --------------------------------------------------------

--
-- Estrutura da tabela `supportlogin`
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
-- Extraindo dados da tabela `supportlogin`
--

INSERT INTO `supportlogin` (`id`, `name`, `email`, `login`, `password`, `online`, `available`, `currentRoom`) VALUES
(1, 'admin', 'admin@suporte.com.br', 'admin', '$2y$10$WMblVDDlXsDymnscf6zL/OHScC6eJsZZqI3dkjONoFdIgaUX.iIPW', 1, 0, '');

--
-- Índices para tabelas despejadas
--

--
-- Índices para tabela `chat_teste`
--
ALTER TABLE `chat_teste`
  ADD PRIMARY KEY (`id`);

--
-- Índices para tabela `queue_users`
--
ALTER TABLE `queue_users`
  ADD PRIMARY KEY (`id`);

--
-- Índices para tabela `roomsupport`
--
ALTER TABLE `roomsupport`
  ADD PRIMARY KEY (`id`);

--
-- Índices para tabela `supportlogin`
--
ALTER TABLE `supportlogin`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT de tabelas despejadas
--

--
-- AUTO_INCREMENT de tabela `chat_teste`
--
ALTER TABLE `chat_teste`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=118;

--
-- AUTO_INCREMENT de tabela `queue_users`
--
ALTER TABLE `queue_users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=38;

--
-- AUTO_INCREMENT de tabela `roomsupport`
--
ALTER TABLE `roomsupport`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT de tabela `supportlogin`
--
ALTER TABLE `supportlogin`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
