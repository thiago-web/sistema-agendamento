-- phpMyAdmin SQL Dump
-- version 5.0.2
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Tempo de geração: 04-Jul-2021 às 02:37
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
-- Estrutura da tabela `barbeiros`
--

CREATE TABLE `barbeiros` (
  `id` int(11) NOT NULL,
  `nome` varchar(255) NOT NULL,
  `telefone` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `loja` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Extraindo dados da tabela `barbeiros`
--

INSERT INTO `barbeiros` (`id`, `nome`, `telefone`, `email`, `loja`) VALUES
(1, 'Robson ', '19987208587', 'thiagop291@gmail.com', '1'),
(2, 'Lucas', '19987208587', 'thiagop291@gmail.com', '1');

-- --------------------------------------------------------

--
-- Estrutura da tabela `codigos`
--

CREATE TABLE `codigos` (
  `id` int(11) NOT NULL,
  `id_usuario` varchar(255) NOT NULL,
  `codigo` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Estrutura da tabela `empresas`
--

CREATE TABLE `empresas` (
  `id` int(11) NOT NULL,
  `proprietario` varchar(255) NOT NULL,
  `nome_estabelecimento` varchar(255) NOT NULL,
  `cpf_cnpj` varchar(255) NOT NULL,
  `telefone` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `cep` varchar(255) NOT NULL,
  `cidade` varchar(255) NOT NULL,
  `bairro` varchar(255) NOT NULL,
  `rua` varchar(255) NOT NULL,
  `num` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Extraindo dados da tabela `empresas`
--

INSERT INTO `empresas` (`id`, `proprietario`, `nome_estabelecimento`, `cpf_cnpj`, `telefone`, `email`, `cep`, `cidade`, `bairro`, `rua`, `num`) VALUES
(1, 'Robson ', 'Barbearia Cavalheiros', '123.321.123-32', '(19)91919-1919', 'barberia@teste.com', '13.131-133', 'Amparo', 'jardim San Dimas', 'Rua 02', '63');

-- --------------------------------------------------------

--
-- Estrutura da tabela `horarios_cadastrados`
--

CREATE TABLE `horarios_cadastrados` (
  `id` int(11) NOT NULL,
  `nome` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `id_usuario` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `id_empresa` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `data_cad` date NOT NULL,
  `horario` time NOT NULL,
  `id_barbeiro` varchar(255) COLLATE utf8_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Extraindo dados da tabela `horarios_cadastrados`
--

INSERT INTO `horarios_cadastrados` (`id`, `nome`, `id_usuario`, `id_empresa`, `data_cad`, `horario`, `id_barbeiro`) VALUES
(1, 'Igor Nathan', '1', '1', '2021-06-30', '14:00:00', ''),
(2, 'Franciele Aparecida de Oliveira', '1', '', '2021-06-23', '12:00:00', ''),
(3, 'Thiago Henrique', '1', '', '2021-06-23', '18:00:00', ''),
(4, 'Alessandro Ferreira', '1', '', '2021-06-23', '16:00:00', ''),
(5, 'Igor Nathan', '1', '1', '2021-06-29', '08:00:00', ''),
(6, '', '1', '1', '2021-06-30', '12:00:00', ''),
(7, '', '1', '1', '2021-06-30', '08:00:00', ''),
(8, '', '1', '1', '2021-06-29', '12:00:00', ''),
(9, '', '1', '1', '2021-06-29', '10:00:00', ''),
(10, '', '1', '1', '2021-07-05', '08:00:00', ''),
(11, '', '1', '1', '2021-07-05', '10:00:00', ''),
(12, '', '1', '1', '2021-07-05', '12:00:00', ''),
(13, '', '1', '1', '2021-07-05', '14:00:00', ''),
(14, '', '1', '1', '2021-07-05', '16:00:00', ''),
(15, '', '1', '1', '2021-07-21', '08:00:00', ''),
(16, '', '1', '1', '2021-07-21', '10:00:00', ''),
(17, '', '1', '1', '2021-07-21', '12:00:00', ''),
(18, '', '1', '1', '2021-07-05', '10:00:00', ''),
(19, '', '1', '1', '2021-07-06', '12:00:00', ''),
(20, '', '1', '1', '2021-07-06', '08:00:00', ''),
(21, '', '1', '1', '2021-07-06', '10:00:00', ''),
(22, '', '1', '1', '2021-07-07', '00:00:00', ''),
(23, '', '1', '1', '2021-07-07', '00:00:00', ''),
(24, '', '1', '1', '2021-07-07', '00:00:00', ''),
(25, '', '1', '1', '2021-07-07', '00:00:00', ''),
(26, '', '1', '1', '2021-07-07', '00:00:00', ''),
(27, '', '1', '1', '2021-07-07', '00:00:00', ''),
(28, '', '1', '1', '2021-07-07', '00:00:00', ''),
(29, '', '1', '1', '2021-07-07', '00:00:00', ''),
(30, '', '1', '1', '2021-07-07', '00:00:00', ''),
(31, '', '1', '1', '2021-07-07', '00:00:00', ''),
(32, '', '1', '1', '2021-07-07', '00:00:00', ''),
(33, '', '1', '1', '2021-07-07', '00:00:00', ''),
(34, '', '1', '1', '2021-07-07', '00:00:00', ''),
(35, '', '1', '1', '2021-07-07', '00:00:00', ''),
(36, '', '1', '1', '2021-07-07', '00:00:00', ''),
(37, '', '1', '1', '2021-07-07', '00:00:00', ''),
(38, '', '1', '1', '2021-07-07', '00:00:00', ''),
(39, '', '1', '1', '2021-07-07', '00:00:00', ''),
(40, '', '1', '1', '2021-07-07', '00:00:00', '');

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
(2, '09:00:00'),
(3, '10:00:00'),
(4, '11:00:00'),
(5, '12:00:00'),
(6, '13:00:00'),
(7, '14:00:00'),
(8, '15:00:00'),
(9, '16:00:00'),
(10, '17:00:00'),
(11, '18:00:00');

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
  `senha` varchar(255) NOT NULL,
  `id_empresa` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Extraindo dados da tabela `informacoes_usuarios`
--

INSERT INTO `informacoes_usuarios` (`id`, `nome`, `cpf`, `data_nascimento`, `telefone`, `cep`, `cidade`, `bairro`, `rua`, `num`, `email`, `senha`, `id_empresa`) VALUES
(1, 'Thiago Henrique', '490.127.828-21', '25/05/2000', '(19)98720-8587', '13.905-620', 'Amparo', 'Jardim San Dimas', 'Rua Alcides Postali', '69', 'thiagop291@gmail.com', '202cb962ac59075b964b07152d234b70', '1'),
(2, 'Ana Caroline da Silva Pinto', '490.127.828-23', '18/10/2000', '19987208587', '13.905-000', 'Amparo', 'Vale Verde', 'Rua 01', '82', 'carol@gmail.com', '202cb962ac59075b964b07152d234b70', '1'),
(3, 'Paulo ', '490.127.828-27', '00/00/0000', '19987208587', '13.905-620', 'Amparo', 'Parque Dona Virgínia', 'Isso é um teste', '206', 'teste@gmail.com', 'c4ca4238a0b923820dcc509a6f75849b', '1'),
(4, 'Rian 2', '490.127.828-99', '00/00/0000', '19987208587', '13.905-620', 'Amparo', 'Parque Dona Virgínia', 'Isso é um teste', '206', 'teste2@gmail.com', 'c4ca4238a0b923820dcc509a6f75849b', '1');

-- --------------------------------------------------------

--
-- Estrutura da tabela `usuarios`
--

CREATE TABLE `usuarios` (
  `id` int(11) NOT NULL,
  `id_usuario` varchar(255) NOT NULL,
  `id_empresa` varchar(255) NOT NULL,
  `usuario` varchar(255) NOT NULL,
  `senha` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Extraindo dados da tabela `usuarios`
--

INSERT INTO `usuarios` (`id`, `id_usuario`, `id_empresa`, `usuario`, `senha`) VALUES
(1, '1', '1', 'thiagop291@gmail.com', '202cb962ac59075b964b07152d234b70'),
(2, '2', '1', 'carol@gmail.com', '202cb962ac59075b964b07152d234b70'),
(3, '3', '1', 'teste@gmail.com\r\n', 'c4ca4238a0b923820dcc509a6f75849b'),
(4, '4', '1', 'teste2@gmail.com', 'c4ca4238a0b923820dcc509a6f75849b');

--
-- Índices para tabelas despejadas
--

--
-- Índices para tabela `barbeiros`
--
ALTER TABLE `barbeiros`
  ADD PRIMARY KEY (`id`);

--
-- Índices para tabela `codigos`
--
ALTER TABLE `codigos`
  ADD PRIMARY KEY (`id`);

--
-- Índices para tabela `empresas`
--
ALTER TABLE `empresas`
  ADD PRIMARY KEY (`id`);

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
-- AUTO_INCREMENT de tabela `barbeiros`
--
ALTER TABLE `barbeiros`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT de tabela `codigos`
--
ALTER TABLE `codigos`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de tabela `empresas`
--
ALTER TABLE `empresas`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT de tabela `horarios_cadastrados`
--
ALTER TABLE `horarios_cadastrados`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=41;

--
-- AUTO_INCREMENT de tabela `horarios_possiveis`
--
ALTER TABLE `horarios_possiveis`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT de tabela `informacoes_usuarios`
--
ALTER TABLE `informacoes_usuarios`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT de tabela `usuarios`
--
ALTER TABLE `usuarios`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
