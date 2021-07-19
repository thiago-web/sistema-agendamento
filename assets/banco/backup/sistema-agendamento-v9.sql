-- phpMyAdmin SQL Dump
-- version 4.9.7
-- https://www.phpmyadmin.net/
--
-- Host: localhost:3306
-- Tempo de geração: 19/07/2021 às 17:50
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
-- Estrutura para tabela `agenda`
--

CREATE TABLE `agenda` (
  `id` int(11) NOT NULL,
  `id_usuario` varchar(255) NOT NULL,
  `id_servico` varchar(255) NOT NULL,
  `id_barbeiro` varchar(255) NOT NULL,
  `id_empresa` varchar(255) NOT NULL,
  `data_agendada` date NOT NULL,
  `hora_agendada` time NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Despejando dados para a tabela `agenda`
--

INSERT INTO `agenda` (`id`, `id_usuario`, `id_servico`, `id_barbeiro`, `id_empresa`, `data_agendada`, `hora_agendada`) VALUES
(3, '1', '3', '1', '1', '2021-07-16', '20:00:00'),
(4, '3', '3', '2', '1', '2021-07-17', '09:00:00'),
(8, '3', '2', '1', '1', '2021-07-22', '14:00:00'),
(9, '1', '1', '1', '1', '2021-07-19', '18:00:00');

-- --------------------------------------------------------

--
-- Estrutura para tabela `barbeiros`
--

CREATE TABLE `barbeiros` (
  `id` int(11) NOT NULL,
  `nome` varchar(255) NOT NULL,
  `telefone` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `loja` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Despejando dados para a tabela `barbeiros`
--

INSERT INTO `barbeiros` (`id`, `nome`, `telefone`, `email`, `loja`) VALUES
(1, 'Thiago Henrique', '19987208587', 'thiagop291@gmail.com', '1'),
(2, 'Franciele Aparecida', '19987208587', 'thiagop291@gmail.com', '1');

-- --------------------------------------------------------

--
-- Estrutura para tabela `codigos`
--

CREATE TABLE `codigos` (
  `id` int(11) NOT NULL,
  `email` varchar(255) NOT NULL,
  `codigo` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Despejando dados para a tabela `codigos`
--

INSERT INTO `codigos` (`id`, `email`, `codigo`) VALUES
(34, 'thiagohenrique.teleson@gmail.com', '195-384');

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
(1, 'Barbearia Cavalheiros', '123.321.123-32', '19987208587', 'barberia@teste.com', '13.131-133', 'Amparo', 'Jardim São Dimas', 'Rua Alicides Postali ', '63');

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
  `horario` time NOT NULL,
  `id_barbeiro` varchar(255) COLLATE utf8_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Despejando dados para a tabela `horarios_cadastrados`
--

INSERT INTO `horarios_cadastrados` (`id`, `nome`, `id_usuario`, `id_empresa`, `data_cad`, `horario`, `id_barbeiro`) VALUES
(3, 'NULL', '1', '1', '2021-07-16', '20:00:00', '1'),
(4, 'NULL', '3', '1', '2021-07-17', '09:00:00', '2'),
(8, 'NULL', '3', '1', '2021-07-22', '14:00:00', '1'),
(9, 'NULL', '1', '1', '2021-07-19', '18:00:00', '1');

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
(1, 'Thiago Henrique da Silva ', '490.127.828-21', '25/05/2000', '(19)98720-8587', '13.905-620', 'Amparo-SP', 'Jardim São Dimas', 'Rua Alcides Postali', '69', 'thiagohenrique.teleson@gmail.com', '81dc9bdb52d04dc20036dbd8313ed055', '1'),
(2, 'Thiago Henrique', '000.000.000-00', '00/00/0000', '(19)98720-8587', '13.905-620', 'Amparo', 'Jardim São Dimas', 'Rua Alcides Postali', '69', 'admin@sws.com.br', '202cb962ac59075b964b07152d234b70', '1'),
(3, 'Call Center Teste', '098.765.432-11', '22/22/2222', '(19)99976-7500', '13.905-620', 'Amparo-SP', 'Jardim São Dimas', 'Rua Alcides Postali', '69', 'call@center.com', '202cb962ac59075b964b07152d234b70', '1');

-- --------------------------------------------------------

--
-- Estrutura para tabela `notificacao_clientes`
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
-- Despejando dados para a tabela `notificacao_clientes`
--

INSERT INTO `notificacao_clientes` (`id`, `id_agendamento`, `mensagem`, `numero`, `enviado`, `tipo`) VALUES
(1, '5', 'Olá Call Center Teste, tudo bem ?\n\nSomos da Barbearia Cavalheiros , na Rua Alicides Postali ,63- Jardim São Dimas na cidade de Amparo.\nE é um prazer confirmar o seu horário agendado para dia: 23/07/2021 às 08:00 horas.\n\n\n*INFORMAÇÕES DO AGENDAMENTO*\n\nCÓDIGO DE AGENDAMENTO: 5\nNOME: Call Center Teste,\nDATA AGENDADA: 23/07/2021\nHORÁRIO: 08:00\nLOCAL: Rua Alicides Postali , 63, Jardim São Dimas, Amparo\n\n\nSe precisar *reagendar/cancelar* sua visita, entre em contato com a empresa no telefone: 19987208587.\n\nOu pelo WhatsApp : \nhttps://api.whatsapp.com/send?phone=5519987208587&text=Olá,%20preciso%20conversar%20a%20respeito%20do%20seu%20horário%20marcado%20para%20o%20dia%2023/07/2021%20às%2008:00%20horas.%20\n\nNossa equipe agradece sua a preferêcia!', '19999767500', '0', 'cliente'),
(2, '6', 'Olá Thiago Henrique da Silva , tudo bem ?\n\nSomos da Barbearia Cavalheiros , na Rua Alicides Postali ,63- Jardim São Dimas na cidade de Amparo.\nE é um prazer confirmar o seu horário agendado para dia: 17/07/2021 às 11:00 horas.\n\n\n*INFORMAÇÕES DO AGENDAMENTO*\n\nCÓDIGO DE AGENDAMENTO: 6\nNOME: Thiago Henrique da Silva ,\nDATA AGENDADA: 17/07/2021\nHORÁRIO: 11:00\nLOCAL: Rua Alicides Postali , 63, Jardim São Dimas, Amparo\n\n\nSe precisar *reagendar/cancelar* sua visita, entre em contato com a empresa no telefone: 19987208587.\n\nOu pelo WhatsApp : \nhttps://api.whatsapp.com/send?phone=5519987208587&text=Olá,%20preciso%20conversar%20a%20respeito%20do%20seu%20horário%20marcado%20para%20o%20dia%2017/07/2021%20às%2011:00%20horas.%20\n\nNossa equipe agradece sua a preferêcia!', '19987208587', '0', 'cliente'),
(3, '7', 'Olá Thiago Henrique da Silva , tudo bem ?\n\nSomos da Barbearia Cavalheiros , na Rua Alicides Postali ,63- Jardim São Dimas na cidade de Amparo.\nE é um prazer confirmar o seu horário agendado para dia: 22/07/2021 às 20:00 horas.\n\n\n*INFORMAÇÕES DO AGENDAMENTO*\n\nCÓDIGO DE AGENDAMENTO: 7\nNOME: Thiago Henrique da Silva ,\nDATA AGENDADA: 22/07/2021\nHORÁRIO: 20:00\nLOCAL: Rua Alicides Postali , 63, Jardim São Dimas, Amparo\n\n\nSe precisar *reagendar/cancelar* sua visita, entre em contato com a empresa no telefone: 19987208587.\n\nOu pelo WhatsApp : \nhttps://api.whatsapp.com/send?phone=5519987208587&text=Olá,%20preciso%20conversar%20a%20respeito%20do%20seu%20horário%20marcado%20para%20o%20dia%2022/07/2021%20às%2020:00%20horas.%20\n\nNossa equipe agradece sua a preferêcia!', '19987208587', '0', 'cliente'),
(4, '8', 'Olá Call Center Teste, tudo bem ?\n\nSomos da Barbearia Cavalheiros , na Rua Alicides Postali ,63- Jardim São Dimas na cidade de Amparo.\nE é um prazer confirmar o seu horário agendado para dia: 22/07/2021 às 14:00 horas.\n\n\n*INFORMAÇÕES DO AGENDAMENTO*\n\nCÓDIGO DE AGENDAMENTO: 8\nNOME: Call Center Teste,\nDATA AGENDADA: 22/07/2021\nHORÁRIO: 14:00\nLOCAL: Rua Alicides Postali , 63, Jardim São Dimas, Amparo\n\n\nSe precisar *reagendar/cancelar* sua visita, entre em contato com a empresa no telefone: 19987208587.\n\nOu pelo WhatsApp : \nhttps://api.whatsapp.com/send?phone=5519987208587&text=Olá,%20preciso%20conversar%20a%20respeito%20do%20seu%20horário%20marcado%20para%20o%20dia%2022/07/2021%20às%2014:00%20horas.%20\n\nNossa equipe agradece sua a preferêcia!', '19999767500', '0', 'cliente'),
(5, '9', 'Olá Thiago Henrique da Silva , tudo bem ?\n\nSomos da Barbearia Cavalheiros , na Rua Alicides Postali ,63- Jardim São Dimas na cidade de Amparo.\nE é um prazer confirmar o seu horário agendado para dia: 19/07/2021 às 18:00 horas.\n\n\n*INFORMAÇÕES DO AGENDAMENTO*\n\nCÓDIGO DE AGENDAMENTO: 9\nNOME: Thiago Henrique da Silva ,\nDATA AGENDADA: 19/07/2021\nHORÁRIO: 18:00\nLOCAL: Rua Alicides Postali , 63, Jardim São Dimas, Amparo\n\n\nSe precisar *reagendar/cancelar* sua visita, entre em contato com a empresa no telefone: 19987208587.\n\nOu pelo WhatsApp : \nhttps://api.whatsapp.com/send?phone=5519987208587&text=Olá,%20preciso%20conversar%20a%20respeito%20do%20seu%20horário%20marcado%20para%20o%20dia%2019/07/2021%20às%2018:00%20horas.%20\n\nNossa equipe agradece sua a preferêcia!', '19987208587', '0', 'cliente');

-- --------------------------------------------------------

--
-- Estrutura para tabela `notificacao_empresas`
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
-- Despejando dados para a tabela `notificacao_empresas`
--

INSERT INTO `notificacao_empresas` (`id`, `id_agendamento`, `mensagem`, `numero`, `enviado`, `tipo`) VALUES
(1, '5', '*NOVO AGENDAMENTO* \n\nBarbearia Cavalheiros, meu nome é Call Center Teste e acabei de realizar um agendamento para o dia: \n23/07/2021 às 08:00 horas.\n\n\n*INFORMAÇÕES DO AGENDAMENTO*\n\nCÓDIGO DE AGENDAMENTO: 5\nNOME: Call Center Teste\nDATA AGENDADA: 23/07/2021\nHORÁRIO: 08:00 horas\nLOCAL: Rua Alicides Postali , 63, \nJardim São Dimas, Amparo\n\n\nSe precisar *reagendar/cancelar* a visita, entre em contato com o cliente no telefone: 19999767500.\n\n\nOu pelo WhatsApp : \nhttps://api.whatsapp.com/send?phone=5519999767500&text=Olá,%20preciso%20conversar%20a%20respeito%20do%20meu%20horário%20marcado%20para%20o%20dia%2023/07/2021%20às%2008:00%20horas.%20', '19987208587', '0', 'empresa'),
(2, '6', '*NOVO AGENDAMENTO* \n\nBarbearia Cavalheiros, meu nome é Thiago Henrique da Silva  e acabei de realizar um agendamento para o dia: \n17/07/2021 às 11:00 horas.\n\n\n*INFORMAÇÕES DO AGENDAMENTO*\n\nCÓDIGO DE AGENDAMENTO: 6\nNOME: Thiago Henrique da Silva \nDATA AGENDADA: 17/07/2021\nHORÁRIO: 11:00 horas\nLOCAL: Rua Alicides Postali , 63, \nJardim São Dimas, Amparo\n\n\nSe precisar *reagendar/cancelar* a visita, entre em contato com o cliente no telefone: 19987208587.\n\n\nOu pelo WhatsApp : \nhttps://api.whatsapp.com/send?phone=5519987208587&text=Olá,%20preciso%20conversar%20a%20respeito%20do%20meu%20horário%20marcado%20para%20o%20dia%2017/07/2021%20às%2011:00%20horas.%20', '19987208587', '0', 'empresa'),
(3, '7', '*NOVO AGENDAMENTO* \n\nBarbearia Cavalheiros, meu nome é Thiago Henrique da Silva  e acabei de realizar um agendamento para o dia: \n22/07/2021 às 20:00 horas.\n\n\n*INFORMAÇÕES DO AGENDAMENTO*\n\nCÓDIGO DE AGENDAMENTO: 7\nNOME: Thiago Henrique da Silva \nDATA AGENDADA: 22/07/2021\nHORÁRIO: 20:00 horas\nLOCAL: Rua Alicides Postali , 63, \nJardim São Dimas, Amparo\n\n\nSe precisar *reagendar/cancelar* a visita, entre em contato com o cliente no telefone: 19987208587.\n\n\nOu pelo WhatsApp : \nhttps://api.whatsapp.com/send?phone=5519987208587&text=Olá,%20preciso%20conversar%20a%20respeito%20do%20meu%20horário%20marcado%20para%20o%20dia%2022/07/2021%20às%2020:00%20horas.%20', '19987208587', '0', 'empresa'),
(4, '8', '*NOVO AGENDAMENTO* \n\nBarbearia Cavalheiros, meu nome é Call Center Teste e acabei de realizar um agendamento para o dia: \n22/07/2021 às 14:00 horas.\n\n\n*INFORMAÇÕES DO AGENDAMENTO*\n\nCÓDIGO DE AGENDAMENTO: 8\nNOME: Call Center Teste\nDATA AGENDADA: 22/07/2021\nHORÁRIO: 14:00 horas\nLOCAL: Rua Alicides Postali , 63, \nJardim São Dimas, Amparo\n\n\nSe precisar *reagendar/cancelar* a visita, entre em contato com o cliente no telefone: 19999767500.\n\n\nOu pelo WhatsApp : \nhttps://api.whatsapp.com/send?phone=5519999767500&text=Olá,%20preciso%20conversar%20a%20respeito%20do%20meu%20horário%20marcado%20para%20o%20dia%2022/07/2021%20às%2014:00%20horas.%20', '19987208587', '0', 'empresa'),
(5, '9', '*NOVO AGENDAMENTO* \n\nBarbearia Cavalheiros, meu nome é Thiago Henrique da Silva  e acabei de realizar um agendamento para o dia: \n19/07/2021 às 18:00 horas.\n\n\n*INFORMAÇÕES DO AGENDAMENTO*\n\nCÓDIGO DE AGENDAMENTO: 9\nNOME: Thiago Henrique da Silva \nDATA AGENDADA: 19/07/2021\nHORÁRIO: 18:00 horas\nLOCAL: Rua Alicides Postali , 63, \nJardim São Dimas, Amparo\n\n\nSe precisar *reagendar/cancelar* a visita, entre em contato com o cliente no telefone: 19987208587.\n\n\nOu pelo WhatsApp : \nhttps://api.whatsapp.com/send?phone=5519987208587&text=Olá,%20preciso%20conversar%20a%20respeito%20do%20meu%20horário%20marcado%20para%20o%20dia%2019/07/2021%20às%2018:00%20horas.%20', '19987208587', '0', 'empresa');

-- --------------------------------------------------------

--
-- Estrutura para tabela `servicos`
--

CREATE TABLE `servicos` (
  `id` int(11) NOT NULL,
  `nome_servico` varchar(255) NOT NULL,
  `valor_servico` varchar(255) NOT NULL,
  `tempo_servico` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Despejando dados para a tabela `servicos`
--

INSERT INTO `servicos` (`id`, `nome_servico`, `valor_servico`, `tempo_servico`) VALUES
(1, 'Corte Simples', '20,00', '30'),
(2, 'Barba', '20,00', '30'),
(3, 'Corte + Barba', '40,00', '50');

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
(1, '1', '1', 'thiagohenrique.teleson@gmail.com', '202cb962ac59075b964b07152d234b70'),
(2, '2', '1', 'admin@sws.com.br', '202cb962ac59075b964b07152d234b70'),
(3, '3', '1', 'call@center.com', '202cb962ac59075b964b07152d234b70');

--
-- Índices para tabelas despejadas
--

--
-- Índices de tabela `agenda`
--
ALTER TABLE `agenda`
  ADD PRIMARY KEY (`id`);

--
-- Índices de tabela `barbeiros`
--
ALTER TABLE `barbeiros`
  ADD PRIMARY KEY (`id`);

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
-- Índices de tabela `notificacao_clientes`
--
ALTER TABLE `notificacao_clientes`
  ADD PRIMARY KEY (`id`);

--
-- Índices de tabela `notificacao_empresas`
--
ALTER TABLE `notificacao_empresas`
  ADD PRIMARY KEY (`id`);

--
-- Índices de tabela `servicos`
--
ALTER TABLE `servicos`
  ADD PRIMARY KEY (`id`);

--
-- Índices de tabela `usuarios`
--
ALTER TABLE `usuarios`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT para tabelas despejadas
--

--
-- AUTO_INCREMENT de tabela `agenda`
--
ALTER TABLE `agenda`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT de tabela `barbeiros`
--
ALTER TABLE `barbeiros`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT de tabela `codigos`
--
ALTER TABLE `codigos`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=35;

--
-- AUTO_INCREMENT de tabela `empresas`
--
ALTER TABLE `empresas`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT de tabela `horarios_cadastrados`
--
ALTER TABLE `horarios_cadastrados`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT de tabela `horarios_possiveis`
--
ALTER TABLE `horarios_possiveis`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=18;

--
-- AUTO_INCREMENT de tabela `informacoes_usuarios`
--
ALTER TABLE `informacoes_usuarios`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT de tabela `notificacao_clientes`
--
ALTER TABLE `notificacao_clientes`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT de tabela `notificacao_empresas`
--
ALTER TABLE `notificacao_empresas`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT de tabela `servicos`
--
ALTER TABLE `servicos`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT de tabela `usuarios`
--
ALTER TABLE `usuarios`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
