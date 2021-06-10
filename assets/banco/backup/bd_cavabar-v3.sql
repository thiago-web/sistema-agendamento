-- phpMyAdmin SQL Dump
-- version 5.0.2
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Tempo de geração: 10-Jun-2021 às 03:06
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
-- Banco de dados: `bd_cavabar`
--

-- --------------------------------------------------------

--
-- Estrutura da tabela `horarios_cadastrados`
--

CREATE TABLE `horarios_cadastrados` (
  `id` int(11) NOT NULL,
  `nome` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `id_usuario` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `data_cad` date NOT NULL,
  `horario` time NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Extraindo dados da tabela `horarios_cadastrados`
--

INSERT INTO `horarios_cadastrados` (`id`, `nome`, `id_usuario`, `data_cad`, `horario`) VALUES
(1, '', '', '2021-03-27', '08:00:00'),
(3, 'LUCAS MOREIRA', '', '2021-03-29', '08:00:00'),
(4, 'Thiago Henrique ', '', '2021-03-29', '10:00:00'),
(5, 'LUCAS MOREIRA', '', '2021-03-29', '12:00:00'),
(6, 'Robson', '', '2021-03-29', '16:00:00'),
(7, 'Naiane barbosa', '', '2021-03-31', '10:00:00'),
(8, 'PAULO ROBERTO DA SILVA', '', '2021-03-30', '08:00:00'),
(9, 'Thiago Henrique', '', '2021-03-29', '14:00:00'),
(10, 'Thiago Henrique', '', '2021-03-30', '16:00:00'),
(11, 'Thiago Henrique', '', '2021-03-30', '16:00:00'),
(12, 'Thiago Henrique da Silva Pinto', '', '2021-03-31', '08:00:00'),
(13, 'Thiago Henrique', '', '2021-06-10', '10:00:00'),
(14, 'Thiago Henrique', '', '2021-06-10', '08:00:00'),
(15, 'Alessandro Ferreira', '1', '2021-06-10', '12:00:00'),
(16, 'Alessandro Ferreira', '1', '2021-06-10', '14:00:00'),
(17, 'Alessandro Ferreira', '1', '2021-06-11', '08:00:00'),
(18, 'Alessandro Ferreira', '1', '2021-06-11', '10:00:00');

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
-- Estrutura da tabela `informacoes_usuarios`
--

CREATE TABLE `informacoes_usuarios` (
  `id` int(11) NOT NULL,
  `nome` varchar(255) NOT NULL,
  `cpf` varchar(255) NOT NULL,
  `data_nascimento` varchar(255) NOT NULL,
  `telefone` varchar(255) NOT NULL,
  `cep` varchar(255) NOT NULL,
  `cidade` varchar(255) NOT NULL,
  `bairro` varchar(255) NOT NULL,
  `rua` varchar(255) NOT NULL,
  `num` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `senha` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Extraindo dados da tabela `informacoes_usuarios`
--

INSERT INTO `informacoes_usuarios` (`id`, `nome`, `cpf`, `data_nascimento`, `telefone`, `cep`, `cidade`, `bairro`, `rua`, `num`, `email`, `senha`) VALUES
(1, 'Thiago Henrique', '490.127.828-21', '25/05/2000', '19987208587', '13.905-620', 'Amparo', 'Jardim San Dimas', 'Rua Alcides Postali', '69', 'thiago@um.com', '202cb962ac59075b964b07152d234b70'),
(2, 'Thiago Henrique', '490.127.828-29', '25/05/2000', '19987208587', '13.905-620', 'Amparo', 'Jardim San Dimas', 'Rua Alcides Postali', '69', 'thiago@dois.com', '202cb962ac59075b964b07152d234b70'),
(3, 'Thiago Henrique', '490.127.828-30', '25/05/2000', '19987208587', '13.905-620', 'Amparo', 'Jardim San Dimas', 'Rua Alcides Postali', '69', 'thiagop291@gmail.com', '202cb962ac59075b964b07152d234b70'),
(4, 'Thiago Henrique', '490.127.828-31', '25/05/2000', '19987208587', '13.905-620', 'Amparo', 'Jardim San Dimas', 'Rua Alcides Postali', '69', 'thiago@quatro.com', '202cb962ac59075b964b07152d234b70'),
(5, 'Thiago Henrique', '490.127.828-31', '25/05/2000', '19987208587', '13.905-620', 'Amparo', 'Jardim San Dimas', 'Rua Alcides Postali', '69', 'thiago@quatro.com', '202cb962ac59075b964b07152d234b70'),
(6, 'Thiago Henrique', '490.127.828-31', '25/05/2000', '19987208587', '13.905-620', 'Amparo', 'Jardim San Dimas', 'Rua Alcides Postali', '69', 'thiago@quatro.com', '202cb962ac59075b964b07152d234b70'),
(7, 'Thiago Henrique', '490.127.828-31', '25/05/2000', '19987208587', '13.905-620', 'Amparo', 'Jardim San Dimas', 'Rua Alcides Postali', '69', 'thiago@quatro.com', '202cb962ac59075b964b07152d234b70'),
(8, 'Thiago Henrique', '490.127.828-31', '25/05/2000', '19987208587', '13.905-620', 'Amparo', 'Jardim San Dimas', 'Rua Alcides Postali', '69', 'thiago@quatro.com', '202cb962ac59075b964b07152d234b70'),
(10, 'Thiago Henrique', '490.127.828-31', '25/05/2000', '19987208587', '13.905-620', 'Amparo', 'Jardim San Dimas', 'Rua Alcides Postali', '69', 'thiago@cinco.com', '202cb962ac59075b964b07152d234b70');

-- --------------------------------------------------------

--
-- Estrutura da tabela `usuarios`
--

CREATE TABLE `usuarios` (
  `id` int(11) NOT NULL,
  `id_usuario` varchar(255) NOT NULL,
  `usuario` varchar(255) NOT NULL,
  `senha` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Extraindo dados da tabela `usuarios`
--

INSERT INTO `usuarios` (`id`, `id_usuario`, `usuario`, `senha`) VALUES
(1, '1', 'thiago@um.com', '202cb962ac59075b964b07152d234b70'),
(2, '2', 'thiago@dois.com', '202cb962ac59075b964b07152d234b70'),
(3, '3', 'thiagop291@gmail.com', '202cb962ac59075b964b07152d234b70'),
(4, '4', 'thiago@quatro.com', '202cb962ac59075b964b07152d234b70'),
(5, '5', 'thiago@quatro.com', '202cb962ac59075b964b07152d234b70'),
(6, '6', 'thiago@quatro.com', '202cb962ac59075b964b07152d234b70'),
(7, '7', 'thiago@quatro.com', '202cb962ac59075b964b07152d234b70'),
(8, '8', 'thiago@quatro.com', '202cb962ac59075b964b07152d234b70'),
(9, '10', 'thiago@cinco.com', '202cb962ac59075b964b07152d234b70');

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
-- Índices para tabela `informacoes_usuarios`
--
ALTER TABLE `informacoes_usuarios`
  ADD PRIMARY KEY (`id`);

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
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=19;

--
-- AUTO_INCREMENT de tabela `horarios_possiveis`
--
ALTER TABLE `horarios_possiveis`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT de tabela `informacoes_usuarios`
--
ALTER TABLE `informacoes_usuarios`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT de tabela `usuarios`
--
ALTER TABLE `usuarios`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
