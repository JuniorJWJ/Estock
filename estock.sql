-- phpMyAdmin SQL Dump
-- version 4.8.5
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: 24-Mar-2020 às 05:25
-- Versão do servidor: 10.1.38-MariaDB
-- versão do PHP: 7.3.2

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `estock`
--

-- --------------------------------------------------------

--
-- Estrutura da tabela `cargo`
--

CREATE DATABASE estock;
USE estock;

CREATE TABLE `cargo` (
  `id` int(11) NOT NULL,
  `nome` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Extraindo dados da tabela `cargo`
--

INSERT INTO `cargo` (`id`, `nome`) VALUES
(1, 'Gerente'),
(2, 'Funcionario');

-- --------------------------------------------------------

--
-- Estrutura da tabela `categoria`
--

CREATE TABLE `categoria` (
  `id` int(11) NOT NULL,
  `nome` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Extraindo dados da tabela `categoria`
--

INSERT INTO `categoria` (`id`, `nome`) VALUES
(1, 'Bebida'),
(2, 'Alimento'),
(8, 'Som'),
(9, 'Brinquedo'),
(10, 'Enfeite'),
(11, 'Informatica');

-- --------------------------------------------------------

--
-- Estrutura da tabela `empresa`
--

CREATE TABLE `empresa` (
  `id` int(11) NOT NULL,
  `CNPJ` varchar(20) NOT NULL,
  `idEstoque` int(11) NOT NULL,
  `cidade` varchar(20) NOT NULL,
  `endereco` varchar(50) NOT NULL,
  `telefone` varchar(15) NOT NULL,
  `nome` varchar(30) NOT NULL,
  `login` varchar(20) NOT NULL,
  `senha` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Estrutura da tabela `estoque`
--

CREATE TABLE `estoque` (
  `id` int(11) NOT NULL,
  `idProduto` int(11) NOT NULL,
  `quantidade` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Estrutura da tabela `log`
--

CREATE TABLE `log` (
  `id` int(11) NOT NULL,
  `processo` varchar(120) NOT NULL,
  `horario` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Extraindo dados da tabela `log`
--

INSERT INTO `log` (`id`, `processo`, `horario`) VALUES
(4, 'Gertrudes cadastrou um novo produto no estoque (teste1) com 12 unidades', '2020-03-16 15:50:24'),
(6, 'Gertrudes entrou no sistema', '2020-03-16 16:03:48'),
(7, 'Gertrudes deslogou do sistema', '2020-03-16 16:03:50'),
(8, 'Gertrudes entrou no sistema', '2020-03-16 16:07:33'),
(9, 'Gertrudes deslogou do sistema', '2020-03-16 16:07:42'),
(10, 'Gertrudes entrou no sistema', '2020-03-17 12:19:16'),
(11, 'Gertrudes cadastrou um novo produto no estoque (43243342) com 23234 unidades', '2020-03-17 12:25:55'),
(12, 'Gertrudes cadastrou um novo produto no estoque (434234) com 3234432 unidades', '2020-03-17 12:26:28'),
(13, 'Gertrudes entrou no sistema', '2020-03-18 14:33:23'),
(14, 'Gertrudes apagou S no sistema', '2020-03-18 15:59:20'),
(15, 'Gertrudes apagou S no sistema', '2020-03-18 16:00:12'),
(16, 'Gertrudes apagou S no sistema', '2020-03-18 16:12:46'),
(17, 'Gertrudes apagou S no sistema', '2020-03-18 16:15:31'),
(18, 'Gertrudes apagou cobaiaaa no sistema', '2020-03-18 16:16:53'),
(19, 'Gertrudes cadastrou um novo produto no estoque (produtoteste) com 2112 unidades', '2020-03-19 00:55:48'),
(20, 'Gertrudes apagou produtoteste no sistema', '2020-03-19 00:55:55'),
(21, 'Gertrudes cadastrou um novo produto no estoque (testeproduto1) com 1232421 unidades', '2020-03-19 01:14:47'),
(22, 'Gertrudes cadastrou um novo funcionÃ¡rio no sistema (123teste)  ', '2020-03-19 01:15:15'),
(23, 'Gertrudes entrou no sistema', '2020-03-22 02:52:37'),
(24, 'Gertrudes apagou 123teste no sistema', '2020-03-22 02:53:23'),
(25, 'Gertrudes deslogou do sistema', '2020-03-22 02:58:29'),
(26, 'Gertrudes entrou no sistema', '2020-03-22 03:01:31'),
(27, 'Gertrudes deslogou do sistema', '2020-03-22 03:02:06'),
(28, 'Gertrudes entrou no sistema', '2020-03-22 18:08:48'),
(29, 'Gertrudes entrou no sistema', '2020-03-23 18:18:48'),
(30, 'Gertrudes cadastrou um novo funcionÃ¡rio no sistema (Gabriel pnc)  ', '2020-03-23 21:54:13'),
(31, 'Gertrudes entrou no sistema', '2020-03-23 21:54:21'),
(32, 'Gertrudes apagou testeproduto146554645645111111 no sistema', '2020-03-23 22:54:58');

-- --------------------------------------------------------

--
-- Estrutura da tabela `produto`
--

CREATE TABLE `produto` (
  `id` int(11) NOT NULL,
  `fk_categoria` int(11) NOT NULL,
  `codigo_barras` varchar(30) NOT NULL,
  `nome` varchar(30) NOT NULL,
  `detalhe` varchar(30) NOT NULL,
  `valor` float NOT NULL,
  `Foto` varchar(50) NOT NULL,
  `quantidade` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Extraindo dados da tabela `produto`
--

INSERT INTO `produto` (`id`, `fk_categoria`, `codigo_barras`, `nome`, `detalhe`, `valor`, `Foto`, `quantidade`) VALUES
(1, 1, '00010002344', 'Heineken 250ml ', 'Cerveja Heineken ', 22, '5e672815c4170.png', 4),
(4, 2, '1111123', 'Fofura', 'Fofura cebola', 1.25, '5e67969d24286.png', 0),
(6, 11, '11231221', 'Teclado Rayzer ', 'Teclado Rayzer batenu certo', 333.99, '5e726df5873e9.jpg', 3),
(2, 1, '1211221121344      ', 'Coca-Cola 300ml   ', 'Coca-Cola latinha', 323, '5e67283330a05.png', 5);

-- --------------------------------------------------------

--
-- Estrutura da tabela `usuario`
--

CREATE TABLE `usuario` (
  `id` int(11) NOT NULL,
  `email` varchar(30) NOT NULL,
  `senha` varchar(20) NOT NULL,
  `permissao` tinyint(1) NOT NULL,
  `cpf` varchar(20) NOT NULL,
  `foto` varchar(50) NOT NULL,
  `fk_cargo` int(11) NOT NULL,
  `nome` varchar(30) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Extraindo dados da tabela `usuario`
--

INSERT INTO `usuario` (`id`, `email`, `senha`, `permissao`, `cpf`, `foto`, `fk_cargo`, `nome`) VALUES
(1, 'adm@adm.com', 'teste1', 1, '22222222222', '', 1, 'Gertrudes'),
(2, 'func@func.com', 'teste', 0, '33333333333', '5e6d7b99293db.jpg', 0, 'teste1'),
(4, 'felipepereira@felipe.com', 'teste', 1, '12345678900', '', 2, 'Felipe pereirasa'),
(5, 'gabriel@bol.com', 'asdasdas', 0, '1112213213213', '5e795a350bf91.jpeg', 1, 'Gabriel pnc');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `cargo`
--
ALTER TABLE `cargo`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `categoria`
--
ALTER TABLE `categoria`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `empresa`
--
ALTER TABLE `empresa`
  ADD PRIMARY KEY (`CNPJ`),
  ADD UNIQUE KEY `id` (`id`),
  ADD KEY `idEstoque` (`idEstoque`);

--
-- Indexes for table `estoque`
--
ALTER TABLE `estoque`
  ADD PRIMARY KEY (`id`),
  ADD KEY `idProduto` (`idProduto`);

--
-- Indexes for table `log`
--
ALTER TABLE `log`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `produto`
--
ALTER TABLE `produto`
  ADD PRIMARY KEY (`codigo_barras`),
  ADD UNIQUE KEY `id` (`id`),
  ADD KEY `idCategoria` (`fk_categoria`);

--
-- Indexes for table `usuario`
--
ALTER TABLE `usuario`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `cargo`
--
ALTER TABLE `cargo`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `categoria`
--
ALTER TABLE `categoria`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT for table `empresa`
--
ALTER TABLE `empresa`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `log`
--
ALTER TABLE `log`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=33;

--
-- AUTO_INCREMENT for table `produto`
--
ALTER TABLE `produto`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `usuario`
--
ALTER TABLE `usuario`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- Constraints for dumped tables
--

--
-- Limitadores para a tabela `empresa`
--
ALTER TABLE `empresa`
  ADD CONSTRAINT `empresa_ibfk_1` FOREIGN KEY (`idEstoque`) REFERENCES `estoque` (`id`);

--
-- Limitadores para a tabela `estoque`
--
ALTER TABLE `estoque`
  ADD CONSTRAINT `estoque_ibfk_1` FOREIGN KEY (`idProduto`) REFERENCES `produto` (`id`);

--
-- Limitadores para a tabela `produto`
--
ALTER TABLE `produto`
  ADD CONSTRAINT `produto_ibfk_1` FOREIGN KEY (`fk_categoria`) REFERENCES `categoria` (`id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
