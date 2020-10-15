-- phpMyAdmin SQL Dump
-- version 4.9.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Tempo de geração: 15-Out-2020 às 05:04
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
-- Estrutura da tabela `chat_teste`
--

CREATE TABLE `chat_teste` (
  `id` int(11) NOT NULL,
  `name` varchar(100) NOT NULL,
  `email` varchar(100) NOT NULL,
  `message` text NOT NULL,
  `last_time` datetime NOT NULL,
  `definedAuth` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Extraindo dados da tabela `chat_teste`
--

INSERT INTO `chat_teste` (`id`, `name`, `email`, `message`, `last_time`, `definedAuth`) VALUES
(94, 'admin', 'admin@suporte.com.br', 'boa tarde', '2020-10-14 07:18:32', 1),
(95, 'admin', 'admin@suporte.com.br', 'como esta?', '2020-10-14 07:24:49', 1),
(96, 'admin', 'admin@suporte.com.br', 'estamos com erro?', '2020-10-14 07:45:45', 1),
(97, 'admin', 'admin@suporte.com.br', 'agora esta funcionando corretamente?', '2020-10-14 08:04:22', 1),
(98, 'admin', 'admin@suporte.com.br', 'so esta dando erro', '2020-10-14 08:06:47', 1),
(99, 'admin', 'admin@suporte.com.br', 'provavelmente agora vai dar certo', '2020-10-14 08:08:25', 1),
(100, 'admin', 'admin@suporte.com.br', 'erros de novo', '2020-10-14 08:10:01', 1),
(101, 'admin', 'admin@suporte.com.br', '255', '2020-10-14 08:15:39', 1),
(102, 'admin', 'admin@suporte.com.br', 'agora vai porra', '2020-10-14 08:23:25', 1),
(103, 'admin', 'admin@suporte.com.br', 'ja vi aqui o erro, agora ta certo', '2020-10-14 08:24:19', 1),
(104, 'admin', 'admin@suporte.com.br', 'bacana demais agoras', '2020-10-14 08:24:33', 1),
(105, 'admin', 'admin@suporte.com.br', 'precisa da um scroll ainda', '2020-10-14 08:33:05', 1),
(106, 'admin', 'admin@suporte.com.br', 'parece que funciona', '2020-10-14 08:35:33', 1),
(107, 'admin', 'admin@suporte.com.br', 'estranho', '2020-10-14 08:35:44', 1),
(108, 'admin', 'admin@suporte.com.br', 'vamos verificar', '2020-10-14 08:36:26', 1),
(109, 'Aurelio', 'aure', 'fala meu amigo', '2020-10-14 08:38:41', 0),
(110, 'Aurelio', 'aure', 'como vc esta hj?', '2020-10-14 08:39:10', 0),
(111, 'admin', 'admin@suporte.com.br', 'bem e vc?', '2020-10-14 08:39:40', 1),
(112, 'marcos', 'marcos@gmail.com', 'funciona de boa?', '2020-10-14 13:26:34', 0),
(113, 'marcos', 'marcos@gmail.com', 'o que vai acontecer se eu mandar uma mensagem muito grande, provavelmente vai ter uma quebra de linha se eu nao me engano', '2020-10-14 13:30:35', 0),
(114, 'marcos', 'marcos@gmail.com', 'menor agoras', '2020-10-14 13:44:19', 0);

-- --------------------------------------------------------

--
-- Estrutura da tabela `queue_users`
--

CREATE TABLE `queue_users` (
  `id` int(11) NOT NULL,
  `name` varchar(100) NOT NULL,
  `session` int(255) NOT NULL,
  `date_time` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Extraindo dados da tabela `queue_users`
--

INSERT INTO `queue_users` (`id`, `name`, `session`, `date_time`) VALUES
(10, 'marcos', 0, '2020-10-15 22:26:15'),
(11, 'amarildo', 0, '2020-10-15 22:26:15'),
(12, 'juvenil', 0, '2020-10-15 22:26:15');

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
  `online` tinyint(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Extraindo dados da tabela `supportlogin`
--

INSERT INTO `supportlogin` (`id`, `name`, `email`, `login`, `password`, `online`) VALUES
(1, 'admin', 'admin@suporte.com.br', 'admin', '$2y$10$WMblVDDlXsDymnscf6zL/OHScC6eJsZZqI3dkjONoFdIgaUX.iIPW', 1);

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
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=115;

--
-- AUTO_INCREMENT de tabela `queue_users`
--
ALTER TABLE `queue_users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT de tabela `supportlogin`
--
ALTER TABLE `supportlogin`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
