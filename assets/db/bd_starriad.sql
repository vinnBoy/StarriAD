-- phpMyAdmin SQL Dump
-- version 4.8.3
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1:3306
-- Generation Time: 29-Dez-2018 às 22:15
-- Versão do servidor: 5.7.23
-- versão do PHP: 5.6.38

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `bd_starriad`
--

-- --------------------------------------------------------

--
-- Estrutura da tabela `campanhas`
--

DROP TABLE IF EXISTS `campanhas`;
CREATE TABLE IF NOT EXISTS `campanhas` (
  `id` int(10) NOT NULL AUTO_INCREMENT,
  `titulo` varchar(255) NOT NULL,
  `descricao` varchar(255) NOT NULL,
  `nome_arquivo` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `data_inicio` date NOT NULL,
  `data_encerramento` date NOT NULL,
  `investimento` double NOT NULL,
  `valor_desconto` double NOT NULL,
  `num_cupons` int(255) NOT NULL,
  `categoria` varchar(255) NOT NULL,
  `sub_categoria` varchar(255) NOT NULL,
  `palavras_chave` varchar(255) NOT NULL,
  `pergunta` varchar(255) NOT NULL,
  `resposta1` varchar(255) NOT NULL,
  `resposta2` varchar(255) NOT NULL,
  `resposta3` varchar(255) NOT NULL,
  `resposta4` varchar(255) NOT NULL,
  `resposta_correta` varchar(255) NOT NULL,
  `filiais` varchar(255) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=22 DEFAULT CHARSET=latin1;

--
-- Extraindo dados da tabela `campanhas`
--

INSERT INTO `campanhas` (`id`, `titulo`, `descricao`, `nome_arquivo`, `email`, `data_inicio`, `data_encerramento`, `investimento`, `valor_desconto`, `num_cupons`, `categoria`, `sub_categoria`, `palavras_chave`, `pergunta`, `resposta1`, `resposta2`, `resposta3`, `resposta4`, `resposta_correta`, `filiais`) VALUES
(7, 'asd', 's', 'Saving you $60+ in 15 seconds.MP4', 'vinicius.rmoraes@hotmail.com', '0000-00-00', '0000-00-00', 123, 123, 12, 'asd', 'asd', 'asd', 'asd', '', '', '', '', '', ''),
(18, 'Campanha 01', '', 'mgs5wtso143-1443209408831.jpg', 'admin@admin.com', '0000-00-00', '2019-09-10', 600, 55, 5, 'Cat2', 'SubCat1', 'Keyw', 'Pergunta', 'Res1', 'Res2', 'Res3', 'Res4', 'resposta4', 'asd'),
(21, 'Campanha 02', '', 'Russia in_15_seconds.MP4', 'admin@admin.com', '0000-00-00', '2019-09-10', 600, 55, 8, 'Cat1', 'SubCat1', 'Keyw', 'Pergunta', 'Res1', 'Res2', 'Res3', 'Res4', 'resposta4', 'asd');

-- --------------------------------------------------------

--
-- Estrutura da tabela `categorias`
--

DROP TABLE IF EXISTS `categorias`;
CREATE TABLE IF NOT EXISTS `categorias` (
  `id` int(255) NOT NULL AUTO_INCREMENT,
  `categoria` varchar(255) NOT NULL,
  `subcategoria` varchar(255) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=3 DEFAULT CHARSET=latin1;

--
-- Extraindo dados da tabela `categorias`
--

INSERT INTO `categorias` (`id`, `categoria`, `subcategoria`) VALUES
(1, 'Cat1', 'SubCat1'),
(2, 'Cat2', 'SubCat2');

-- --------------------------------------------------------

--
-- Estrutura da tabela `filiais`
--

DROP TABLE IF EXISTS `filiais`;
CREATE TABLE IF NOT EXISTS `filiais` (
  `id` int(255) NOT NULL AUTO_INCREMENT,
  `nome` varchar(255) NOT NULL,
  `cep` int(255) NOT NULL,
  `rua` varchar(255) NOT NULL,
  `numero` int(255) NOT NULL,
  `complemento` varchar(255) NOT NULL,
  `bairro` varchar(255) NOT NULL,
  `cidade` varchar(255) NOT NULL,
  `estado` varchar(255) NOT NULL,
  `centro_comercial` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=latin1;

--
-- Extraindo dados da tabela `filiais`
--

INSERT INTO `filiais` (`id`, `nome`, `cep`, `rua`, `numero`, `complemento`, `bairro`, `cidade`, `estado`, `centro_comercial`, `email`) VALUES
(1, 'sadas', 123, 'sda', 213, 'sad', 'asd', 'asd', 'asd', 'asd', 'admin@admin.com'),
(2, 'asd', 21251, 'asddas', 21, 'asd', 'asd', 'asd', 'asd', 'asd', 'admin@admin.com');

-- --------------------------------------------------------

--
-- Estrutura da tabela `users`
--

DROP TABLE IF EXISTS `users`;
CREATE TABLE IF NOT EXISTS `users` (
  `id` int(10) NOT NULL AUTO_INCREMENT,
  `nome` varchar(255) NOT NULL,
  `nome_empresa` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `telefone` varchar(15) NOT NULL,
  `razao_social` varchar(255) NOT NULL,
  `cnpj` varchar(255) NOT NULL,
  `banco` varchar(255) NOT NULL,
  `agencia` varchar(255) NOT NULL,
  `conta` varchar(255) NOT NULL,
  `cep` varchar(255) NOT NULL,
  `rua` varchar(255) NOT NULL,
  `numero` varchar(15) NOT NULL,
  `complemento` varchar(255) NOT NULL,
  `bairro` varchar(255) NOT NULL,
  `cidade` varchar(255) NOT NULL,
  `estado` varchar(255) NOT NULL,
  `senha` varchar(255) NOT NULL,
  `termos` int(1) DEFAULT NULL,
  `admin` int(1) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=7 DEFAULT CHARSET=latin1;

--
-- Extraindo dados da tabela `users`
--

INSERT INTO `users` (`id`, `nome`, `nome_empresa`, `email`, `telefone`, `razao_social`, `cnpj`, `banco`, `agencia`, `conta`, `cep`, `rua`, `numero`, `complemento`, `bairro`, `cidade`, `estado`, `senha`, `termos`, `admin`) VALUES
(1, 'User1', 'EmpresaNome1', 'nome@empresa.com', '1188884444', 'asds', '213', '123', '123', '123', '08021540', 'Rua Alfredo Albertini', '21', 'asd', 'Jardim São Vicente', 'São Paulo', 'SP', '81dc9bdb52d04dc20036dbd8313ed055', 1, 0),
(3, 'Admin', 'admin', 'admin@admin.com', '0022334455', 'asdas', '4242', '5454', '515', '216', '08021540', 'Rua Alfredo Albertini', '1651', 'asd', 'Jardim São Vicente', 'São Paulo', 'SP', '21232f297a57a5a743894a0e4a801fc3', 1, 1),
(5, 'Vinicius', 'Null', 'vinicius.rmoraes@hotmail.com', '1122222222', 'asds', '213', '123', '123', '123', '08021540', 'Rua Alfredo Albertini', '21', 'asd', 'Jardim São Vicente', 'São Paulo', 'SP', '827ccb0eea8a706c4c34a16891f84e7b', 1, 0),
(6, 'Usuário 01', 'Empresa 01', 'usuario@empresa.com', '112222222', '', '1111111', '', '', '', '', '', '', '', '', '', '', '827ccb0eea8a706c4c34a16891f84e7b', NULL, 0);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
