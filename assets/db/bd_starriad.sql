-- phpMyAdmin SQL Dump
-- version 4.8.4
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: 05-Fev-2019 às 19:19
-- Versão do servidor: 10.1.37-MariaDB
-- versão do PHP: 7.3.0

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
  `titulo` varchar(255) DEFAULT NULL,
  `descricao` varchar(255) DEFAULT NULL,
  `nome_arquivo` varchar(255) DEFAULT NULL,
  `nome_thumbnail` varchar(255) DEFAULT NULL,
  `email` varchar(255) DEFAULT NULL,
  `data_inicio` date DEFAULT NULL,
  `data_encerramento` date DEFAULT NULL,
  `investimento` double DEFAULT NULL,
  `valor_desconto` double DEFAULT NULL,
  `num_cupons` int(255) DEFAULT NULL,
  `categoria` varchar(255) DEFAULT NULL,
  `sub_categoria` varchar(255) DEFAULT NULL,
  `palavras_chave` varchar(255) DEFAULT NULL,
  `pergunta` varchar(255) DEFAULT NULL,
  `resposta1` varchar(255) DEFAULT NULL,
  `resposta2` varchar(255) DEFAULT NULL,
  `resposta3` varchar(255) DEFAULT NULL,
  `resposta4` varchar(255) DEFAULT NULL,
  `resposta_correta` varchar(255) DEFAULT NULL,
  `filiais` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Extraindo dados da tabela `campanhas`
--

INSERT INTO `campanhas` (`id`, `titulo`, `descricao`, `nome_arquivo`, `nome_thumbnail`, `email`, `data_inicio`, `data_encerramento`, `investimento`, `valor_desconto`, `num_cupons`, `categoria`, `sub_categoria`, `palavras_chave`, `pergunta`, `resposta1`, `resposta2`, `resposta3`, `resposta4`, `resposta_correta`, `filiais`) VALUES
(35, 'Campanha 1', 'Descrição', '5c3f8bd48df10.mp4', '5c3f8bd48df10.jpg', 'admin@admin.com', '0000-00-00', '2019-10-10', 250, 50, 3, 'Cat2', 'SubCat2', 'Imagem', 'Pergunta', 'Resposta 1 ', 'Resposta 2', 'Resposta 3', 'Resposta 4', 'resposta3', 'asd'),
(36, 'Campanha 2', 'Descrição', '5c3f8c1e34b07.mp4', '5c3f8c1e34b07.jpg', 'admin@admin.com', '0000-00-00', '2019-10-10', 200, 25, 4, 'Cat1', 'SubCat1', 'Imagem', 'Pergunta', 'Resposta 1 ', 'Resposta 2', 'Resposta 3', 'Resposta 4', 'resposta2', 'asd');

-- --------------------------------------------------------

--
-- Estrutura da tabela `categorias`
--

CREATE TABLE `categorias` (
  `id` int(255) NOT NULL,
  `categoria` varchar(255) NOT NULL,
  `subcategoria` varchar(255) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Extraindo dados da tabela `categorias`
--

INSERT INTO `categorias` (`id`, `categoria`, `subcategoria`) VALUES
(1, 'Cat1', 'SubCat1'),
(2, 'Cat2', 'SubCat2'),
(3, 'cat3', 'c');

-- --------------------------------------------------------

--
-- Estrutura da tabela `cupom`
--

CREATE TABLE `cupom` (
  `id` int(11) NOT NULL,
  `valor` varchar(200) NOT NULL,
  `user_id` int(11) NOT NULL,
  `empresa_id` int(11) NOT NULL,
  `datacad` varchar(200) NOT NULL,
  `status` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

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
  `nome` varchar(255) DEFAULT NULL,
  `nome_empresa` varchar(255) DEFAULT NULL,
  `email` varchar(255) DEFAULT NULL,
  `telefone` varchar(15) DEFAULT NULL,
  `razao_social` varchar(255) DEFAULT NULL,
  `cnpj` varchar(255) DEFAULT NULL,
  `banco` varchar(255) DEFAULT NULL,
  `agencia` varchar(255) DEFAULT NULL,
  `conta` varchar(255) DEFAULT NULL,
  `cep` varchar(255) DEFAULT NULL,
  `rua` varchar(255) DEFAULT NULL,
  `numero` varchar(15) DEFAULT NULL,
  `complemento` varchar(255) DEFAULT NULL,
  `bairro` varchar(255) DEFAULT NULL,
  `cidade` varchar(255) DEFAULT NULL,
  `estado` varchar(255) DEFAULT NULL,
  `senha` varchar(255) DEFAULT NULL,
  `termos` int(1) DEFAULT NULL,
  `admin` int(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Extraindo dados da tabela `users`
--

INSERT INTO `users` (`id`, `nome`, `nome_empresa`, `email`, `telefone`, `razao_social`, `cnpj`, `banco`, `agencia`, `conta`, `cep`, `rua`, `numero`, `complemento`, `bairro`, `cidade`, `estado`, `senha`, `termos`, `admin`) VALUES
(1, 'User1', 'EmpresaNome1', 'nome@empresa.com', '1188884444', 'asds', '213', '123', '123', '123', '08021540', 'Rua Alfredo Albertini', '21', 'asd', 'Jardim São Vicente', 'São Paulo', 'SP', '81dc9bdb52d04dc20036dbd8313ed055', 1, 0),
(3, 'Admin', 'admin', 'admin@admin.com', '0022334455', 'asdas', '4242', '5454', '515', '216', '08021540', 'Rua Alfredo Albertini', '1651', 'asd', 'Jardim São Vicente', 'São Paulo', 'SP', '21232f297a57a5a743894a0e4a801fc3', 1, 1),
(5, 'Vinicius', 'Null', 'vinicius.rmoraes@hotmail.com', '1122222222', 'asds', '213', '123', '123', '123', '08021540', 'Rua Alfredo Albertini', '21', 'asd', 'Jardim São Vicente', 'São Paulo', 'SP', '827ccb0eea8a706c4c34a16891f84e7b', 1, 0),
(6, 'Usuário 01', 'Empresa 01', 'usuario@empresa.com', '112222222', '', '1111111', '', '', '', '', '', '', '', '', '', '', '827ccb0eea8a706c4c34a16891f84e7b', NULL, 0);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `campanhas`
--
ALTER TABLE `campanhas`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `categorias`
--
ALTER TABLE `categorias`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `cupom`
--
ALTER TABLE `cupom`
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
  MODIFY `id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=39;

--
-- AUTO_INCREMENT for table `categorias`
--
ALTER TABLE `categorias`
  MODIFY `id` int(255) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `cupom`
--
ALTER TABLE `cupom`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `filiais`
--
ALTER TABLE `filiais`
  MODIFY `id` int(255) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
