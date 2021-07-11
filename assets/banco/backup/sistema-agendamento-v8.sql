-- phpMyAdmin SQL Dump
-- version 5.0.2
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Tempo de geração: 11-Jul-2021 às 02:54
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
-- Estrutura da tabela `agenda`
--

CREATE TABLE `agenda` (
  `id` int(11) NOT NULL,
  `id_servico` varchar(255) NOT NULL,
  `id_barbeiro` varchar(255) NOT NULL,
  `data_agendada` varchar(255) NOT NULL,
  `hora_agendada` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

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
  `email` varchar(255) NOT NULL,
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
(1, 'Barbearia Cavalheiros', '123.321.123-32', '(19)987208587', 'barberia@teste.com', '13.131-133', 'Amparo', 'Jardim São Dimas', 'Rua Alicides Postali ', '63');

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
(1, '', '1', '1', '2021-07-30', '00:00:00', '1'),
(2, '', '1', '1', '2021-07-22', '00:00:00', '1'),
(3, '', '1', '1', '2021-07-22', '00:00:00', '1'),
(4, '', '1', '1', '2021-07-22', '00:00:00', '1'),
(5, '', '1', '1', '2021-07-12', '00:00:00', '2'),
(6, '', '1', '1', '2021-07-14', '00:00:00', '1'),
(7, '', '1', '1', '2021-07-21', '00:00:00', '1'),
(8, '', '1', '1', '2021-07-21', '00:00:00', '1');

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
(11, '18:00:00'),
(12, '19:00:00'),
(13, '20:00:00');

-- --------------------------------------------------------

--
-- Estrutura da tabela `informacoes_usuarios`
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

-- --------------------------------------------------------

--
-- Estrutura da tabela `notificacao_clientes`
--

CREATE TABLE `notificacao_clientes` (
  `id` int(11) NOT NULL,
  `id_agendamento` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `mensagem` text COLLATE utf8_unicode_ci NOT NULL,
  `numero` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `enviado` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `tipo` varchar(255) COLLATE utf8_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Extraindo dados da tabela `notificacao_clientes`
--

INSERT INTO `notificacao_clientes` (`id`, `id_agendamento`, `mensagem`, `numero`, `enviado`, `tipo`) VALUES
(1, '1', 'Olá , tudo bem ?\r\n\r\nSomos da Barbearia Cavalheiros , na Rua Alicides Postali ,63- Jardim São Dimas na cidade de Amparo.\r\nE é um prazer confirmar o seu horário agendado para dia: 30/07/2021 às 00:00 horas.\r\n\r\n\r\n*INFORMAÇÕES DO AGENDAMENTO*\r\n\r\nCÓDIGO DE AGENDAMENTO: 1\r\nNOME: ,\r\nDATA AGENDADA: 30/07/2021\r\nHORÁRIO: 00:00\r\nLOCAL: Rua Alicides Postali , 63, Jardim São Dimas, Amparo\r\n\r\n\r\nSe precisar *reagendar/cancelar* sua visita, entre em contato com a empresa no telefone: 19987208587.\r\n\r\nOu pelo WhatsApp : \r\nhttps://api.whatsapp.com/send?phone=5519987208587&text=Olá,%20preciso%20conversar%20a%20respeito%20do%20seu%20horário%20marcado%20para%20o%20dia%2030/07/2021%20às%2000:00%20horas.%20\r\n\r\nNossa equipe agradece sua a preferêcia!', '', '0', 'cliente'),
(2, '2', 'Olá , tudo bem ?\r\n\r\nSomos da Barbearia Cavalheiros , na Rua Alicides Postali ,63- Jardim São Dimas na cidade de Amparo.\r\nE é um prazer confirmar o seu horário agendado para dia: 22/07/2021 às 00:00 horas.\r\n\r\n\r\n*INFORMAÇÕES DO AGENDAMENTO*\r\n\r\nCÓDIGO DE AGENDAMENTO: 2\r\nNOME: ,\r\nDATA AGENDADA: 22/07/2021\r\nHORÁRIO: 00:00\r\nLOCAL: Rua Alicides Postali , 63, Jardim São Dimas, Amparo\r\n\r\n\r\nSe precisar *reagendar/cancelar* sua visita, entre em contato com a empresa no telefone: 19987208587.\r\n\r\nOu pelo WhatsApp : \r\nhttps://api.whatsapp.com/send?phone=5519987208587&text=Olá,%20preciso%20conversar%20a%20respeito%20do%20seu%20horário%20marcado%20para%20o%20dia%2022/07/2021%20às%2000:00%20horas.%20\r\n\r\nNossa equipe agradece sua a preferêcia!', '', '0', 'cliente'),
(3, '2', 'Olá , tudo bem ?\r\n\r\nSomos da Barbearia Cavalheiros , na Rua Alicides Postali ,63- Jardim São Dimas na cidade de Amparo.\r\nE é um prazer confirmar o seu horário agendado para dia: 22/07/2021 às 00:00 horas.\r\n\r\n\r\n*INFORMAÇÕES DO AGENDAMENTO*\r\n\r\nCÓDIGO DE AGENDAMENTO: 2\r\nNOME: ,\r\nDATA AGENDADA: 22/07/2021\r\nHORÁRIO: 00:00\r\nLOCAL: Rua Alicides Postali , 63, Jardim São Dimas, Amparo\r\n\r\n\r\nSe precisar *reagendar/cancelar* sua visita, entre em contato com a empresa no telefone: 19987208587.\r\n\r\nOu pelo WhatsApp : \r\nhttps://api.whatsapp.com/send?phone=5519987208587&text=Olá,%20preciso%20conversar%20a%20respeito%20do%20seu%20horário%20marcado%20para%20o%20dia%2022/07/2021%20às%2000:00%20horas.%20\r\n\r\nNossa equipe agradece sua a preferêcia!', '', '0', 'cliente'),
(4, '2', 'Olá , tudo bem ?\r\n\r\nSomos da Barbearia Cavalheiros , na Rua Alicides Postali ,63- Jardim São Dimas na cidade de Amparo.\r\nE é um prazer confirmar o seu horário agendado para dia: 22/07/2021 às 00:00 horas.\r\n\r\n\r\n*INFORMAÇÕES DO AGENDAMENTO*\r\n\r\nCÓDIGO DE AGENDAMENTO: 2\r\nNOME: ,\r\nDATA AGENDADA: 22/07/2021\r\nHORÁRIO: 00:00\r\nLOCAL: Rua Alicides Postali , 63, Jardim São Dimas, Amparo\r\n\r\n\r\nSe precisar *reagendar/cancelar* sua visita, entre em contato com a empresa no telefone: 19987208587.\r\n\r\nOu pelo WhatsApp : \r\nhttps://api.whatsapp.com/send?phone=5519987208587&text=Olá,%20preciso%20conversar%20a%20respeito%20do%20seu%20horário%20marcado%20para%20o%20dia%2022/07/2021%20às%2000:00%20horas.%20\r\n\r\nNossa equipe agradece sua a preferêcia!', '', '0', 'cliente'),
(5, '5', 'Olá , tudo bem ?\r\n\r\nSomos da Barbearia Cavalheiros , na Rua Alicides Postali ,63- Jardim São Dimas na cidade de Amparo.\r\nE é um prazer confirmar o seu horário agendado para dia: 12/07/2021 às 00:00 horas.\r\n\r\n\r\n*INFORMAÇÕES DO AGENDAMENTO*\r\n\r\nCÓDIGO DE AGENDAMENTO: 5\r\nNOME: ,\r\nDATA AGENDADA: 12/07/2021\r\nHORÁRIO: 00:00\r\nLOCAL: Rua Alicides Postali , 63, Jardim São Dimas, Amparo\r\n\r\n\r\nSe precisar *reagendar/cancelar* sua visita, entre em contato com a empresa no telefone: 19987208587.\r\n\r\nOu pelo WhatsApp : \r\nhttps://api.whatsapp.com/send?phone=5519987208587&text=Olá,%20preciso%20conversar%20a%20respeito%20do%20seu%20horário%20marcado%20para%20o%20dia%2012/07/2021%20às%2000:00%20horas.%20\r\n\r\nNossa equipe agradece sua a preferêcia!', '', '0', 'cliente'),
(6, '6', 'Olá , tudo bem ?\r\n\r\nSomos da Barbearia Cavalheiros , na Rua Alicides Postali ,63- Jardim São Dimas na cidade de Amparo.\r\nE é um prazer confirmar o seu horário agendado para dia: 14/07/2021 às 00:00 horas.\r\n\r\n\r\n*INFORMAÇÕES DO AGENDAMENTO*\r\n\r\nCÓDIGO DE AGENDAMENTO: 6\r\nNOME: ,\r\nDATA AGENDADA: 14/07/2021\r\nHORÁRIO: 00:00\r\nLOCAL: Rua Alicides Postali , 63, Jardim São Dimas, Amparo\r\n\r\n\r\nSe precisar *reagendar/cancelar* sua visita, entre em contato com a empresa no telefone: 19987208587.\r\n\r\nOu pelo WhatsApp : \r\nhttps://api.whatsapp.com/send?phone=5519987208587&text=Olá,%20preciso%20conversar%20a%20respeito%20do%20seu%20horário%20marcado%20para%20o%20dia%2014/07/2021%20às%2000:00%20horas.%20\r\n\r\nNossa equipe agradece sua a preferêcia!', '', '0', 'cliente'),
(7, '7', 'Olá , tudo bem ?\r\n\r\nSomos da Barbearia Cavalheiros , na Rua Alicides Postali ,63- Jardim São Dimas na cidade de Amparo.\r\nE é um prazer confirmar o seu horário agendado para dia: 21/07/2021 às 00:00 horas.\r\n\r\n\r\n*INFORMAÇÕES DO AGENDAMENTO*\r\n\r\nCÓDIGO DE AGENDAMENTO: 7\r\nNOME: ,\r\nDATA AGENDADA: 21/07/2021\r\nHORÁRIO: 00:00\r\nLOCAL: Rua Alicides Postali , 63, Jardim São Dimas, Amparo\r\n\r\n\r\nSe precisar *reagendar/cancelar* sua visita, entre em contato com a empresa no telefone: 19987208587.\r\n\r\nOu pelo WhatsApp : \r\nhttps://api.whatsapp.com/send?phone=5519987208587&text=Olá,%20preciso%20conversar%20a%20respeito%20do%20seu%20horário%20marcado%20para%20o%20dia%2021/07/2021%20às%2000:00%20horas.%20\r\n\r\nNossa equipe agradece sua a preferêcia!', '', '0', 'cliente');

-- --------------------------------------------------------

--
-- Estrutura da tabela `notificacao_empresas`
--

CREATE TABLE `notificacao_empresas` (
  `id` int(11) NOT NULL,
  `id_agendamento` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `mensagem` text COLLATE utf8_unicode_ci NOT NULL,
  `numero` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `enviado` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `tipo` varchar(255) COLLATE utf8_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Extraindo dados da tabela `notificacao_empresas`
--

INSERT INTO `notificacao_empresas` (`id`, `id_agendamento`, `mensagem`, `numero`, `enviado`, `tipo`) VALUES
(1, '1', '*NOVO AGENDAMENTO* \r\n\r\nBarbearia Cavalheiros, meu nome é  e acabei de realizar um agendamento para o dia: \r\n30/07/2021 às 00:00 horas.\r\n\r\n\r\n*INFORMAÇÕES DO AGENDAMENTO*\r\n\r\nCÓDIGO DE AGENDAMENTO: 1\r\nNOME: \r\nDATA AGENDADA: 30/07/2021\r\nHORÁRIO: 00:00 horas\r\nLOCAL: Rua Alicides Postali , 63, \r\nJardim São Dimas, Amparo\r\n\r\n\r\nSe precisar *reagendar/cancelar* a visita, entre em contato com o cliente no telefone: .\r\n\r\n\r\nOu pelo WhatsApp : \r\nhttps://api.whatsapp.com/send?phone=55&text=Olá,%20preciso%20conversar%20a%20respeito%20do%20meu%20horário%20marcado%20para%20o%20dia%2030/07/2021%20às%2000:00%20horas.%20', '', '0', 'empresa'),
(2, '2', '*NOVO AGENDAMENTO* \r\n\r\nBarbearia Cavalheiros, meu nome é  e acabei de realizar um agendamento para o dia: \r\n22/07/2021 às 00:00 horas.\r\n\r\n\r\n*INFORMAÇÕES DO AGENDAMENTO*\r\n\r\nCÓDIGO DE AGENDAMENTO: 2\r\nNOME: \r\nDATA AGENDADA: 22/07/2021\r\nHORÁRIO: 00:00 horas\r\nLOCAL: Rua Alicides Postali , 63, \r\nJardim São Dimas, Amparo\r\n\r\n\r\nSe precisar *reagendar/cancelar* a visita, entre em contato com o cliente no telefone: .\r\n\r\n\r\nOu pelo WhatsApp : \r\nhttps://api.whatsapp.com/send?phone=55&text=Olá,%20preciso%20conversar%20a%20respeito%20do%20meu%20horário%20marcado%20para%20o%20dia%2022/07/2021%20às%2000:00%20horas.%20', '19987208587', '0', 'empresa'),
(3, '5', '*NOVO AGENDAMENTO* \r\n\r\nBarbearia Cavalheiros, meu nome é  e acabei de realizar um agendamento para o dia: \r\n12/07/2021 às 00:00 horas.\r\n\r\n\r\n*INFORMAÇÕES DO AGENDAMENTO*\r\n\r\nCÓDIGO DE AGENDAMENTO: 5\r\nNOME: \r\nDATA AGENDADA: 12/07/2021\r\nHORÁRIO: 00:00 horas\r\nLOCAL: Rua Alicides Postali , 63, \r\nJardim São Dimas, Amparo\r\n\r\n\r\nSe precisar *reagendar/cancelar* a visita, entre em contato com o cliente no telefone: .\r\n\r\n\r\nOu pelo WhatsApp : \r\nhttps://api.whatsapp.com/send?phone=55&text=Olá,%20preciso%20conversar%20a%20respeito%20do%20meu%20horário%20marcado%20para%20o%20dia%2012/07/2021%20às%2000:00%20horas.%20', '19987208587', '0', 'empresa'),
(4, '6', '*NOVO AGENDAMENTO* \r\n\r\nBarbearia Cavalheiros, meu nome é  e acabei de realizar um agendamento para o dia: \r\n14/07/2021 às 00:00 horas.\r\n\r\n\r\n*INFORMAÇÕES DO AGENDAMENTO*\r\n\r\nCÓDIGO DE AGENDAMENTO: 6\r\nNOME: \r\nDATA AGENDADA: 14/07/2021\r\nHORÁRIO: 00:00 horas\r\nLOCAL: Rua Alicides Postali , 63, \r\nJardim São Dimas, Amparo\r\n\r\n\r\nSe precisar *reagendar/cancelar* a visita, entre em contato com o cliente no telefone: .\r\n\r\n\r\nOu pelo WhatsApp : \r\nhttps://api.whatsapp.com/send?phone=55&text=Olá,%20preciso%20conversar%20a%20respeito%20do%20meu%20horário%20marcado%20para%20o%20dia%2014/07/2021%20às%2000:00%20horas.%20', '19987208587', '0', 'empresa'),
(5, '7', '*NOVO AGENDAMENTO* \r\n\r\nBarbearia Cavalheiros, meu nome é  e acabei de realizar um agendamento para o dia: \r\n21/07/2021 às 00:00 horas.\r\n\r\n\r\n*INFORMAÇÕES DO AGENDAMENTO*\r\n\r\nCÓDIGO DE AGENDAMENTO: 7\r\nNOME: \r\nDATA AGENDADA: 21/07/2021\r\nHORÁRIO: 00:00 horas\r\nLOCAL: Rua Alicides Postali , 63, \r\nJardim São Dimas, Amparo\r\n\r\n\r\nSe precisar *reagendar/cancelar* a visita, entre em contato com o cliente no telefone: .\r\n\r\n\r\nOu pelo WhatsApp : \r\nhttps://api.whatsapp.com/send?phone=55&text=Olá,%20preciso%20conversar%20a%20respeito%20do%20meu%20horário%20marcado%20para%20o%20dia%2021/07/2021%20às%2000:00%20horas.%20', '19987208587', '0', 'empresa');

-- --------------------------------------------------------

--
-- Estrutura da tabela `servicos`
--

CREATE TABLE `servicos` (
  `id` int(11) NOT NULL,
  `nome_servico` varchar(255) NOT NULL,
  `valor_servico` varchar(255) NOT NULL,
  `tempo_servico` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Extraindo dados da tabela `servicos`
--

INSERT INTO `servicos` (`id`, `nome_servico`, `valor_servico`, `tempo_servico`) VALUES
(1, 'Corte Simples', '20,00', '30'),
(2, 'Barba', '20,00', '30');

-- --------------------------------------------------------

--
-- Estrutura da tabela `usuarios`
--

CREATE TABLE `usuarios` (
  `id` int(11) NOT NULL,
  `id_usuario` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `id_empresa` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `usuario` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `senha` varchar(255) COLLATE utf8_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Extraindo dados da tabela `usuarios`
--

INSERT INTO `usuarios` (`id`, `id_usuario`, `id_empresa`, `usuario`, `senha`) VALUES
(0, '1', '1', 'thiagop291@gmail.com', 'e10adc3949ba59abbe56e057f20f883e'),
(1, '0', '1', 'robguima89@gmail.com', '84e418b73e78ec1547e1754d775189bd'),
(3, '5', '1', 'airton.teleson2021@gmail.com', '827ccb0eea8a706c4c34a16891f84e7b'),
(4, '6', '1', 'francieleaparecida156@gmail.com', '36774f217c91d05d53afd093eaed53fd'),
(5, '7', '1', 'eufrosinorodrigo73@gmail.com', '23a6ad883be49af9da8cebb3787e7c79'),
(6, '8', '1', 'lopesn260@gmail.com', '760a61aada61f4a303df48e7c80654b5'),
(7, '9', '1', 'call@center.com', '202cb962ac59075b964b07152d234b70'),
(8, '10', '1', 'victor@vic.com', '81dc9bdb52d04dc20036dbd8313ed055'),
(9, '11', '1', 'olecram.carvalho@gmail.com', 'd83f746e9619f41bb5c195b26db1ee8a');

--
-- Índices para tabelas despejadas
--

--
-- Índices para tabela `agenda`
--
ALTER TABLE `agenda`
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
-- Índices para tabela `notificacao_clientes`
--
ALTER TABLE `notificacao_clientes`
  ADD PRIMARY KEY (`id`);

--
-- Índices para tabela `notificacao_empresas`
--
ALTER TABLE `notificacao_empresas`
  ADD PRIMARY KEY (`id`);

--
-- Índices para tabela `servicos`
--
ALTER TABLE `servicos`
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
-- AUTO_INCREMENT de tabela `agenda`
--
ALTER TABLE `agenda`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de tabela `codigos`
--
ALTER TABLE `codigos`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=33;

--
-- AUTO_INCREMENT de tabela `empresas`
--
ALTER TABLE `empresas`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT de tabela `horarios_cadastrados`
--
ALTER TABLE `horarios_cadastrados`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT de tabela `horarios_possiveis`
--
ALTER TABLE `horarios_possiveis`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;

--
-- AUTO_INCREMENT de tabela `informacoes_usuarios`
--
ALTER TABLE `informacoes_usuarios`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de tabela `notificacao_clientes`
--
ALTER TABLE `notificacao_clientes`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT de tabela `notificacao_empresas`
--
ALTER TABLE `notificacao_empresas`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT de tabela `servicos`
--
ALTER TABLE `servicos`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT de tabela `usuarios`
--
ALTER TABLE `usuarios`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
