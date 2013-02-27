-- phpMyAdmin SQL Dump
-- version 3.5.2.2
-- http://www.phpmyadmin.net
--
-- Servidor: 127.0.0.1
-- Tempo de Geração: 
-- Versão do Servidor: 5.5.27-log
-- Versão do PHP: 5.4.6

SET SQL_MODE="NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Banco de Dados: `crm`
--

-- --------------------------------------------------------

--
-- Estrutura da tabela `atendimentos`
--

CREATE TABLE IF NOT EXISTS `atendimentos` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `protocolo` varchar(50) NOT NULL,
  `data_hora` datetime NOT NULL,
  `status` varchar(50) NOT NULL,
  `prioridade` varchar(50) NOT NULL,
  `plano_atendimento` text NOT NULL,
  `observacoes` text,
  `nota` varchar(50) NOT NULL,
  `empresa_id` int(11) NOT NULL,
  `usuario_id` int(11) NOT NULL,
  `cliente_id` int(11) NOT NULL,
  `categoria_id` int(11) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=8 ;

-- --------------------------------------------------------

--
-- Estrutura da tabela `categorias`
--

CREATE TABLE IF NOT EXISTS `categorias` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `descricao` varchar(150) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=5 ;

-- --------------------------------------------------------

--
-- Estrutura da tabela `clientes`
--

CREATE TABLE IF NOT EXISTS `clientes` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `nome` varchar(150) NOT NULL,
  `matricula` varchar(50) NOT NULL,
  `status` varchar(50) NOT NULL,
  `data_cadastro` datetime NOT NULL,
  `email` varchar(100) NOT NULL,
  `telefone1` varchar(50) NOT NULL,
  `telefone2` varchar(50) DEFAULT NULL,
  `empresa_id` int(11) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=8 ;

-- --------------------------------------------------------

--
-- Estrutura da tabela `empresas`
--

CREATE TABLE IF NOT EXISTS `empresas` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `nome` varchar(150) NOT NULL,
  `razao_social` varchar(150) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=8 ;

-- --------------------------------------------------------

--
-- Estrutura da tabela `parametros`
--

CREATE TABLE IF NOT EXISTS `parametros` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `descricao` varchar(150) NOT NULL,
  `valor` varchar(50) NOT NULL,
  `empresa_id` int(11) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=3 ;

-- --------------------------------------------------------

--
-- Estrutura da tabela `usuarios`
--

CREATE TABLE IF NOT EXISTS `usuarios` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `nome` varchar(150) NOT NULL,
  `matricula` varchar(50) NOT NULL,
  `status` int(11) NOT NULL,
  `empresa_id` int(11) NOT NULL,
  `username` varchar(100) NOT NULL,
  `password` varchar(100) NOT NULL,
  `nivel_acesso` int(11) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=10 ;

--
-- Extraindo dados da tabela `usuarios`
--

INSERT INTO `usuarios` (`id`, `nome`, `matricula`, `status`, `empresa_id`, `username`, `password`, `nivel_acesso`) VALUES
(1, 'Administrador', '', 1, 0, 'admin', '26a17a3f33f2793903a6ba4e4fd24721f3f50e92', 1);

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
