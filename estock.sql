-- phpMyAdmin SQL Dump
-- version 4.8.5
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: 16-Mar-2020 às 21:06
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
(9, 'Gertrudes deslogou do sistema', '2020-03-16 16:07:42');

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
(1, 1, '00010002344', 'Heineken 250ml ', 'Cerveja Heineken ', 22, '5e672815c4170.png', 5),
(4, 2, '1111123', 'Fofura', 'Fofura cebola', 1.25, '5e67969d24286.png', 1),
(6, 11, '11231221', 'Teclado Rayzer I1123I12II', 'Teclado Rayzer batenu certo', 333.99, '5e6f1223cbb8d.jpg', 3),
(2, 1, '1211221121344      ', 'Coca-Cola 300ml   ', 'Coca-Cola latinha', 323, '5e67283330a05.png', 2),
(5, 8, '1232112231', 'JBL', 'Caixinha de som JBL', 111, '5e679689bedbd.png', 3),
(7, 10, '231', '1231', '23123', 123123, '5e6fca26d03af.jpg', 1312),
(8, 10, '312313', 'teste1', 'teste2', 12312, '5e6fca70294c0.jpg', 12);

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
(1, 'adm@adm.com', 'teste1', 1, '', '', 1, 'Gertrudes'),
(2, 'func@func.com', 'teste', 0, '', '', 0, 'teste1'),
(4, 'felipepereira@felipe.com', 'teste', 1, '12345678900', '5e6d7b99293db.jpg', 2, 'Felipe pereira'),
(5, '5345@321312', '34534', 1, '543534', '5e6d7bf56a81b.jpg', 1, '4543');

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
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

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
