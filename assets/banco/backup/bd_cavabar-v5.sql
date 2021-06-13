-- phpMyAdmin SQL Dump
-- version 5.0.2
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Tempo de geração: 13-Jun-2021 às 01:49
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

INSERT INTO `empresas` (`id`, `nome_estabelecimento`, `cpf_cnpj`, `telefone`, `email`, `cep`, `cidade`, `bairro`, `rua`, `num`) VALUES
(1, 'Barbearia Cavalheiros', '123.321.123-32', '(19)91919-1919', 'barberia@teste.com', '13.131-133', 'Amparo', 'jardim San Dimas', 'Rua 02', '63');

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
(1, 'Igor Nathan', '1', '2021-06-30', '14:00:00');

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
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT de tabela `horarios_possiveis`
--
ALTER TABLE `horarios_possiveis`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

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
