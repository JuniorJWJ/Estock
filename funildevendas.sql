-- phpMyAdmin SQL Dump
-- version 4.1.14
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: May 30, 2016 at 02:37 AM
-- Server version: 5.6.17
-- PHP Version: 5.5.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Database: `funildevendas`
--

-- --------------------------------------------------------

--
-- Table structure for table `categorias`
--

CREATE TABLE IF NOT EXISTS `categorias` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `nome` varchar(220) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=3 ;

--
-- Dumping data for table `categorias`
--

INSERT INTO `categorias` (`id`, `nome`) VALUES
(1, 'Informatica'),
(2, 'Lideranca');

-- --------------------------------------------------------

--
-- Table structure for table `cursos`
--

CREATE TABLE IF NOT EXISTS `cursos` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `nome` varchar(220) NOT NULL,
  `categoria_id` int(11) NOT NULL,
  `detalhes` text NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=5 ;

--
-- Dumping data for table `cursos`
--

INSERT INTO `cursos` (`id`, `nome`, `categoria_id`, `detalhes`) VALUES
(1, 'Curso de HTML5, CSS3 e Bootstrap', 1, 'Fusce ut lorem commodo, semper libero eu, pharetra felis. Nunc sit amet vulputate turpis. Vestibulum tristique rutrum mauris, fringilla cursus tellus congue quis. Aliquam bibendum consectetur velit, quis consequat lectus convallis eget. Vivamus ornare sollicitudin diam, aliquet posuere nulla lobortis non. Praesent lobortis nisi eget luctus porttitor. Cras dignissim dolor vitae porta cursus. Suspendisse neque lectus, fermentum elementum tellus at, blandit ornare felis. Proin vel aliquam massa, et laoreet mi. Nam viverra libero id mi aliquam, non aliquet dolor luctus.'),
(2, 'Curso de PHP, MySQLi e Bootstrap', 1, 'Pellentesque eu porta velit. Cras ornare laoreet vehicula. Fusce sit amet hendrerit erat. Cras bibendum nisl eu tellus vestibulum pretium. Curabitur tortor tellus, porttitor ut erat sed, dictum tempor augue. Maecenas quis gravida elit, nec vehicula metus. Sed sit amet arcu in magna tincidunt posuere ac ac nisi. Aenean risus nulla, posuere in leo quis, molestie bibendum risus. Vivamus finibus a orci sit amet imperdiet. Proin pharetra sed nisl id tempor.'),
(3, 'Curso de Oratoria', 2, 'Proin aliquet, leo vehicula consectetur faucibus, quam augue congue nunc, eget blandit velit velit ac sem. Fusce nec imperdiet tortor, non ultrices libero. Aenean id quam eu enim semper egestas quis quis orci. Phasellus accumsan sed ex id tincidunt. Proin molestie dignissim quam id blandit. Quisque scelerisque venenatis ante a consequat. Donec dignissim eu nunc ut rutrum. Maecenas vehicula aliquam est, vel ultrices metus auctor sit amet. Phasellus pretium ligula a dapibus laoreet. Phasellus sed sodales nibh. Nullam sit amet erat at tortor ultrices rhoncus. Curabitur id luctus lacus.'),
(4, 'Curso de Marketing Pessoal', 2, 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Pellentesque et viverra nulla. Curabitur blandit purus quis est lobortis aliquet. Proin sit amet nulla tristique massa elementum ultricies. Integer lacinia in nisl et sodales. Sed ipsum lectus, lacinia eu velit in, tristique accumsan lectus. Donec quis risus nec orci placerat varius lobortis blandit nibh. Pellentesque pharetra nulla magna, sed pretium est gravida at. Nulla interdum erat egestas fermentum mattis. Donec hendrerit in magna quis pharetra. Integer auctor erat in lacus viverra, dapibus egestas ante congue. Phasellus ipsum lectus, faucibus vitae enim quis, aliquam pharetra ex. Quisque volutpat nulla sed sapien condimentum, et iaculis turpis efficitur. Maecenas et enim ultrices, blandit enim sed, ultricies dolor. Mauris faucibus tellus augue, euismod ultricies lectus imperdiet eget.');

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
