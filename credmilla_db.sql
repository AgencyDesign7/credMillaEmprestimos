-- phpMyAdmin SQL Dump
-- version 4.9.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Tempo de geração: 01-Nov-2020 às 20:29
-- Versão do servidor: 10.4.8-MariaDB
-- versão do PHP: 7.1.33

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
-- Estrutura da tabela `queue_users`
--

CREATE TABLE `queue_users` (
  `id` int(11) NOT NULL,
  `name` varchar(100) NOT NULL,
  `session` text NOT NULL,
  `date_time` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

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
  `permissionsVisitors` tinyint(1) NOT NULL DEFAULT 0,
  `permissionsUsers` tinyint(1) NOT NULL DEFAULT 0,
  `permissionsChat` tinyint(1) NOT NULL DEFAULT 0,
  `currentRoom` text NOT NULL,
  `nameCurrentClient` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Extraindo dados da tabela `supportlogin`
--

INSERT INTO `supportlogin` (`id`, `name`, `email`, `login`, `password`, `online`, `permissionsVisitors`, `permissionsUsers`, `permissionsChat`, `currentRoom`, `nameCurrentClient`) VALUES
(1, 'admin', 'admin@support.com.br', 'admin', '$2y$10$WMblVDDlXsDymnscf6zL/OHScC6eJsZZqI3dkjONoFdIgaUX.iIPW', 0, 1, 1, 1, '', '');

-- --------------------------------------------------------

--
-- Estrutura da tabela `visitors`
--

CREATE TABLE `visitors` (
  `id` int(11) NOT NULL,
  `ip` varchar(100) NOT NULL,
  `date_time` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Extraindo dados da tabela `visitors`
--

INSERT INTO `visitors` (`id`, `ip`, `date_time`) VALUES
(1, '10.0.0.112', '2020-11-01 16:37:49');

--
-- Índices para tabelas despejadas
--

--
-- Índices para tabela `queue_users`
--
ALTER TABLE `queue_users`
  ADD PRIMARY KEY (`id`);

--
-- Índices para tabela `supportlogin`
--
ALTER TABLE `supportlogin`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `login` (`login`),
  ADD UNIQUE KEY `email` (`email`);

--
-- Índices para tabela `visitors`
--
ALTER TABLE `visitors`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT de tabelas despejadas
--

--
-- AUTO_INCREMENT de tabela `queue_users`
--
ALTER TABLE `queue_users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de tabela `supportlogin`
--
ALTER TABLE `supportlogin`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT de tabela `visitors`
--
ALTER TABLE `visitors`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
