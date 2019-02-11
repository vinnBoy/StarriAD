-- MySQL dump 10.13  Distrib 5.7.17, for macos10.12 (x86_64)
--
-- Host: localhost    Database: bd_starriad
-- ------------------------------------------------------
-- Server version	5.6.35

/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;
/*!40103 SET @OLD_TIME_ZONE=@@TIME_ZONE */;
/*!40103 SET TIME_ZONE='+00:00' */;
/*!40014 SET @OLD_UNIQUE_CHECKS=@@UNIQUE_CHECKS, UNIQUE_CHECKS=0 */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;
/*!40111 SET @OLD_SQL_NOTES=@@SQL_NOTES, SQL_NOTES=0 */;

--
-- Table structure for table `campanhas`
--

DROP TABLE IF EXISTS `campanhas`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `campanhas` (
  `id` int(10) NOT NULL AUTO_INCREMENT,
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
  `filiais` varchar(255) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=39 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `campanhas`
--

LOCK TABLES `campanhas` WRITE;
/*!40000 ALTER TABLE `campanhas` DISABLE KEYS */;
INSERT INTO `campanhas` VALUES (35,'Campanha 1','Descrição','5c3f8bd48df10.mp4','5c3f8bd48df10.jpg','admin@admin.com','0000-00-00','2019-10-10',250,50,3,'Cat2','SubCat2','Imagem','Pergunta','Resposta 1 ','Resposta 2','Resposta 3','Resposta 4','resposta3','asd'),(36,'Campanha 2','Descrição','5c3f8c1e34b07.mp4','5c3f8c1e34b07.jpg','admin@admin.com','0000-00-00','2019-10-10',200,25,4,'Cat1','SubCat1','Imagem','Pergunta','Resposta 1 ','Resposta 2','Resposta 3','Resposta 4','resposta2','asd');
/*!40000 ALTER TABLE `campanhas` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `categorias`
--

DROP TABLE IF EXISTS `categorias`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `categorias` (
  `id` int(255) NOT NULL AUTO_INCREMENT,
  `categoria` varchar(255) NOT NULL,
  `subcategoria` varchar(255) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=4 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `categorias`
--

LOCK TABLES `categorias` WRITE;
/*!40000 ALTER TABLE `categorias` DISABLE KEYS */;
INSERT INTO `categorias` VALUES (1,'Cat1','SubCat1'),(2,'Cat2','SubCat2'),(3,'cat3','c');
/*!40000 ALTER TABLE `categorias` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `cupom`
--

DROP TABLE IF EXISTS `cupom`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `cupom` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `valor` varchar(200) NOT NULL,
  `user_id` int(11) NOT NULL,
  `empresa_id` int(11) NOT NULL,
  `datacad` varchar(200) NOT NULL,
  `status` int(11) NOT NULL,
  `codigo` varchar(45) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `cupom`
--

LOCK TABLES `cupom` WRITE;
/*!40000 ALTER TABLE `cupom` DISABLE KEYS */;
INSERT INTO `cupom` VALUES (1,'25',1,3,'2019-02-11',2,'5c6070df16cef');
/*!40000 ALTER TABLE `cupom` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `filiais`
--

DROP TABLE IF EXISTS `filiais`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `filiais` (
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
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `filiais`
--

LOCK TABLES `filiais` WRITE;
/*!40000 ALTER TABLE `filiais` DISABLE KEYS */;
INSERT INTO `filiais` VALUES (1,'sadas',123,'sda',213,'sad','asd','asd','asd','asd','admin@admin.com'),(2,'asd',21251,'asddas',21,'asd','asd','asd','asd','asd','admin@admin.com');
/*!40000 ALTER TABLE `filiais` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `users`
--

DROP TABLE IF EXISTS `users`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `users` (
  `id` int(10) NOT NULL AUTO_INCREMENT,
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
  `admin` int(1) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=7 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `users`
--

LOCK TABLES `users` WRITE;
/*!40000 ALTER TABLE `users` DISABLE KEYS */;
INSERT INTO `users` VALUES (1,'User1','EmpresaNome1','nome@empresa.com','1188884444','asds','213','123','123','123','08021540','Rua Alfredo Albertini','21','asd','Jardim São Vicente','São Paulo','SP','81dc9bdb52d04dc20036dbd8313ed055',1,0),(3,'Admin','admin','admin@admin.com','0022334455','asdas','4242','5454','515','216','08021540','Rua Alfredo Albertini','1651','asd','Jardim São Vicente','São Paulo','SP','21232f297a57a5a743894a0e4a801fc3',1,1),(5,'Vinicius','Null','vinicius.rmoraes@hotmail.com','1122222222','asds','213','123','123','123','08021540','Rua Alfredo Albertini','21','asd','Jardim São Vicente','São Paulo','SP','827ccb0eea8a706c4c34a16891f84e7b',1,0),(6,'Usuário 01','Empresa 01','usuario@empresa.com','112222222','','1111111','','','','','','','','','','','827ccb0eea8a706c4c34a16891f84e7b',NULL,0);
/*!40000 ALTER TABLE `users` ENABLE KEYS */;
UNLOCK TABLES;
/*!40103 SET TIME_ZONE=@OLD_TIME_ZONE */;

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;

-- Dump completed on 2019-02-11 11:13:37
