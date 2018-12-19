-- phpMyAdmin SQL Dump
-- version 4.8.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: 19-Dez-2018 às 18:24
-- Versão do servidor: 10.1.31-MariaDB
-- PHP Version: 7.2.4

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

CREATE TABLE `campanhas` (
  `id` int(10) NOT NULL,
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
  `filiais` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Extraindo dados da tabela `campanhas`
--

INSERT INTO `campanhas` (`id`, `titulo`, `descricao`, `nome_arquivo`, `email`, `data_inicio`, `data_encerramento`, `investimento`, `valor_desconto`, `num_cupons`, `categoria`, `sub_categoria`, `palavras_chave`, `pergunta`, `filiais`) VALUES
(1, 'Russia in 15 seconds', 'asdasd', 'Russia in_15_seconds.MP4', 'admin@admin.com', '0000-00-00', '0000-00-00', 0, 0, 0, 'asdsad', '', '', '', ''),
(7, 'asd', 's', 'Saving you $60+ in 15 seconds.MP4', 'vinicius.rmoraes@hotmail.com', '0000-00-00', '0000-00-00', 123, 123, 12, 'asd', 'asd', 'asd', 'asd', '');

-- --------------------------------------------------------

--
-- Estrutura da tabela `filiais`
--

CREATE TABLE `filiais` (
  `id` int(255) NOT NULL,
  `nome` varchar(255) NOT NULL,
  `cep` int(255) NOT NULL,
  `rua` varchar(255) NOT NULL,
  `numero` int(255) NOT NULL,
  `complemento` varchar(255) NOT NULL,
  `bairro` varchar(255) NOT NULL,
  `cidade` varchar(255) NOT NULL,
  `estado` varchar(255) NOT NULL,
  `centro_comercial` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

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

CREATE TABLE `users` (
  `id` int(10) NOT NULL,
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
  `admin` int(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Extraindo dados da tabela `users`
--

INSERT INTO `users` (`id`, `nome`, `nome_empresa`, `email`, `telefone`, `razao_social`, `cnpj`, `banco`, `agencia`, `conta`, `cep`, `rua`, `numero`, `complemento`, `bairro`, `cidade`, `estado`, `senha`, `termos`, `admin`) VALUES
(1, 'User1', 'EmpresaNome1', 'nome@empresa.com', '1188884444', 'asds', '213', '123', '123', '123', '08021540', 'Rua Alfredo Albertini', '21', 'asd', 'Jardim São Vicente', 'São Paulo', 'SP', '81dc9bdb52d04dc20036dbd8313ed055', 1, 0),
(3, 'Admin', 'admin', 'admin@admin.com', '0022334455', 'asdas', '4242', '5454', '515', '216', '08021540', 'Rua Alfredo Albertini', '1651', 'asd', 'Jardim São Vicente', 'São Paulo', 'SP', '21232f297a57a5a743894a0e4a801fc3', 1, 1),
(5, 'Vinicius', 'Null', 'vinicius.rmoraes@hotmail.com', '1122222222', 'asds', '213', '123', '123', '123', '08021540', 'Rua Alfredo Albertini', '21', 'asd', 'Jardim São Vicente', 'São Paulo', 'SP', '827ccb0eea8a706c4c34a16891f84e7b', 1, 0);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `campanhas`
--
ALTER TABLE `campanhas`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `filiais`
--
ALTER TABLE `filiais`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `campanhas`
--
ALTER TABLE `campanhas`
  MODIFY `id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `filiais`
--
ALTER TABLE `filiais`
  MODIFY `id` int(255) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
