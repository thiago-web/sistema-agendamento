-- phpMyAdmin SQL Dump
-- version 5.0.2
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Tempo de geração: 28-Mar-2021 às 01:57
-- Versão do servidor: 10.4.14-MariaDB
-- versão do PHP: 7.4.10

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Banco de dados: `barbearia_cavalhers`
--

-- --------------------------------------------------------

--
-- Estrutura da tabela `horarios_cadastrados`
--

CREATE TABLE `horarios_cadastrados` (
  `id` int(11) NOT NULL,
  `nome` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `email` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `telefone` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `data_cad` date NOT NULL,
  `horario` time NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Estrutura da tabela `horarios_possiveis`
--

CREATE TABLE `horarios_possiveis` (
  `id` int(11) NOT NULL,
  `horario` time NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Extraindo dados da tabela `horarios_possiveis`
--

INSERT INTO `horarios_possiveis` (`id`, `horario`) VALUES
(1, '08:00:00'),
(2, '10:00:00'),
(3, '12:00:00'),
(4, '14:00:00'),
(5, '16:00:00'),
(6, '18:00:00');

-- --------------------------------------------------------

--
-- Estrutura da tabela `usuarios`
--

CREATE TABLE `usuarios` (
  `id` int(11) NOT NULL,
  `usuario` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `senha` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `acesso` varchar(255) COLLATE utf8_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Extraindo dados da tabela `usuarios`
--

INSERT INTO `usuarios` (`id`, `usuario`, `senha`, `acesso`) VALUES
(1, 'teste', '202cb962ac59075b964b07152d234b70', '12'),
(2, 'teste2', '202cb962ac59075b964b07152d234b70', '1');

--
-- Índices para tabelas despejadas
--

--
-- Índices para tabela `horarios_cadastrados`
--
ALTER TABLE `horarios_cadastrados`
  ADD PRIMARY KEY (`id`);

--
-- Índices para tabela `horarios_possiveis`
--
ALTER TABLE `horarios_possiveis`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `horario` (`horario`);

--
-- Índices para tabela `usuarios`
--
ALTER TABLE `usuarios`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT de tabelas despejadas
--

--
-- AUTO_INCREMENT de tabela `horarios_cadastrados`
--
ALTER TABLE `horarios_cadastrados`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de tabela `horarios_possiveis`
--
ALTER TABLE `horarios_possiveis`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT de tabela `usuarios`
--
ALTER TABLE `usuarios`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
