-- phpMyAdmin SQL Dump
-- version 4.9.5
-- https://www.phpmyadmin.net/
--
-- Host: localhost:3306
-- Tempo de geração: 16/06/2021 às 02:46
-- Versão do servidor: 5.7.21-21
-- Versão do PHP: 7.3.28

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Banco de dados: `dueeme66_barberia_cavalheiros`
--

-- --------------------------------------------------------

--
-- Estrutura para tabela `codigos`
--

CREATE TABLE `codigos` (
  `id` int(11) NOT NULL,
  `id_usuario` varchar(255) NOT NULL,
  `codigo` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Estrutura para tabela `empresas`
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
-- Despejando dados para a tabela `empresas`
--

INSERT INTO `empresas` (`id`, `nome_estabelecimento`, `cpf_cnpj`, `telefone`, `email`, `cep`, `cidade`, `bairro`, `rua`, `num`) VALUES
(1, 'Barbearia Cavalheiros', '123.321.123-32', '(19)99771-3938', 'barberia@teste.com', '13.131-133', 'Amparo', 'jardim San Dimas', 'Rua 02', '63');

-- --------------------------------------------------------

--
-- Estrutura para tabela `horarios_cadastrados`
--

CREATE TABLE `horarios_cadastrados` (
  `id` int(11) NOT NULL,
  `nome` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `id_usuario` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `id_empresa` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `data_cad` date NOT NULL,
  `horario` time NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Despejando dados para a tabela `horarios_cadastrados`
--

INSERT INTO `horarios_cadastrados` (`id`, `nome`, `id_usuario`, `id_empresa`, `data_cad`, `horario`) VALUES
(1, 'Franciele Aparecida de Oliveira', '1', '1', '2021-06-24', '12:00:00'),
(2, 'Teste 01', '1', '1', '2021-06-17', '08:00:00'),
(3, 'Teste 01', '1', '1', '2021-06-17', '10:00:00'),
(4, 'teste 02', '1', '1', '2021-06-26', '12:00:00'),
(5, 'teste 03', '1', '1', '2021-06-30', '12:00:00'),
(6, 'teste 03', '1', '1', '2021-06-30', '08:00:00'),
(7, 'Cinco mil', '1', '1', '2021-06-24', '08:00:00'),
(8, 'Cinco mil', '1', '1', '2021-06-24', '10:00:00'),
(9, 'Cinco mil', '1', '1', '2021-06-24', '14:00:00'),
(10, 'Cinco mil', '1', '1', '2021-06-24', '16:00:00'),
(11, 'Franciele Aparecida de Oliveira ', '6', '1', '2021-06-19', '08:00:00'),
(12, 'Cinco mil', '1', '1', '2021-06-24', '18:00:00'),
(13, 'Cinco mil', '1', '1', '2021-06-25', '08:00:00'),
(14, 'Cinco mil', '1', '1', '2021-06-25', '10:00:00'),
(15, 'Franciele Aparecida de Oliveira ', '6', '1', '2021-06-19', '10:00:00'),
(16, 'Franciele Aparecida de Oliveira ', '6', '1', '2021-06-19', '12:00:00'),
(17, 'Cinco mil', '1', '1', '2021-06-25', '12:00:00');

-- --------------------------------------------------------

--
-- Estrutura para tabela `horarios_possiveis`
--

CREATE TABLE `horarios_possiveis` (
  `id` int(11) NOT NULL,
  `horario` time NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Despejando dados para a tabela `horarios_possiveis`
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
-- Estrutura para tabela `informacoes_usuarios`
--

CREATE TABLE `informacoes_usuarios` (
  `id` int(11) NOT NULL,
  `nome` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `cpf` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `data_nascimento` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `telefone` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `cep` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `cidade` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `bairro` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `rua` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `num` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `email` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `senha` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `id_empresa` varchar(255) COLLATE utf8_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Despejando dados para a tabela `informacoes_usuarios`
--

INSERT INTO `informacoes_usuarios` (`id`, `nome`, `cpf`, `data_nascimento`, `telefone`, `cep`, `cidade`, `bairro`, `rua`, `num`, `email`, `senha`, `id_empresa`) VALUES
(0, 'Robson Aparecido dos santos Guimarães', '370.665.208-07', '05/01/1989', '(19)99771-3938', '13.904-807', 'Amparo', 'Vale verde', 'Casa', '231', 'robguima89@gmail.com', '84e418b73e78ec1547e1754d775189bd', '1'),
(1, 'Thiago Henrique da Silva Pinto', '490.127.828-21', '25/05/2000', '(19)98720-8587', '13.064-400', 'Amparo', 'Jardim San Dimas', 'Rua Alcides Postali', '68', 'thiagop291@gmail.com', '202cb962ac59075b964b07152d234b70', '1'),
(5, 'Airtão rei da adesão', '519.707.070-70', '25/08/2019', '(19)99943-6382', '13.901-310', 'Amparo City', 'Zona nobre da cidade', 'Rua Airtão', '01', 'airton.teleson2021@gmail.com', '827ccb0eea8a706c4c34a16891f84e7b', '1'),
(6, 'Franciele Aparecida de Oliveira', '482.176.868-23', '18/10/2000', '(19)98200-1237', '13.903-240', 'Amparo', 'Parque Dona Virgínia ', 'Casa', '206', 'francieleaparecida156@gmail.com', 'e10adc3949ba59abbe56e057f20f883e', '1');

-- --------------------------------------------------------

--
-- Estrutura para tabela `usuarios`
--

CREATE TABLE `usuarios` (
  `id` int(11) NOT NULL,
  `id_usuario` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `id_empresa` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `usuario` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `senha` varchar(255) COLLATE utf8_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Despejando dados para a tabela `usuarios`
--

INSERT INTO `usuarios` (`id`, `id_usuario`, `id_empresa`, `usuario`, `senha`) VALUES
(0, '1', '1', 'thiagop291@gmail.com', '81dc9bdb52d04dc20036dbd8313ed055'),
(1, '0', '1', 'robguima89@gmail.com', '84e418b73e78ec1547e1754d775189bd'),
(3, '5', '1', 'airton.teleson2021@gmail.com', '827ccb0eea8a706c4c34a16891f84e7b'),
(4, '6', '1', 'francieleaparecida156@gmail.com', '36774f217c91d05d53afd093eaed53fd');

--
-- Índices de tabelas apagadas
--

--
-- Índices de tabela `codigos`
--
ALTER TABLE `codigos`
  ADD PRIMARY KEY (`id`);

--
-- Índices de tabela `empresas`
--
ALTER TABLE `empresas`
  ADD PRIMARY KEY (`id`);

--
-- Índices de tabela `horarios_cadastrados`
--
ALTER TABLE `horarios_cadastrados`
  ADD PRIMARY KEY (`id`);

--
-- Índices de tabela `horarios_possiveis`
--
ALTER TABLE `horarios_possiveis`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `horario` (`horario`);

--
-- Índices de tabela `informacoes_usuarios`
--
ALTER TABLE `informacoes_usuarios`
  ADD PRIMARY KEY (`id`);

--
-- Índices de tabela `usuarios`
--
ALTER TABLE `usuarios`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT de tabelas apagadas
--

--
-- AUTO_INCREMENT de tabela `codigos`
--
ALTER TABLE `codigos`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=19;

--
-- AUTO_INCREMENT de tabela `empresas`
--
ALTER TABLE `empresas`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT de tabela `horarios_cadastrados`
--
ALTER TABLE `horarios_cadastrados`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=18;

--
-- AUTO_INCREMENT de tabela `horarios_possiveis`
--
ALTER TABLE `horarios_possiveis`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT de tabela `informacoes_usuarios`
--
ALTER TABLE `informacoes_usuarios`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT de tabela `usuarios`
--
ALTER TABLE `usuarios`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
