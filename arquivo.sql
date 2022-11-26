-- MySQL dump 10.13  Distrib 5.7.39, for Win64 (x86_64)
--
-- Host: localhost    Database: bd_minimercado
-- ------------------------------------------------------
-- Server version	5.7.39

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
-- Table structure for table `categoria`
--
CREATE DATABASE bd_minimercado;
USE bd_minimercado;
DROP TABLE IF EXISTS `categoria`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `categoria` (
  `Cod_Cat` int(11) NOT NULL AUTO_INCREMENT,
  `Descricao` varchar(50) NOT NULL,
  PRIMARY KEY (`Cod_Cat`)
) ENGINE=MyISAM AUTO_INCREMENT=7 DEFAULT CHARSET=utf8mb4;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `categoria`
--

LOCK TABLES `categoria` WRITE;
/*!40000 ALTER TABLE `categoria` DISABLE KEYS */;
INSERT INTO `categoria` VALUES (1,'Frutas'),(2,'Padaria'),(3,'Acougue'),(4,'Enlatado'),(5,'Higiene'),(6,'Bebidas');
/*!40000 ALTER TABLE `categoria` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `cliente`
--

DROP TABLE IF EXISTS `cliente`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `cliente` (
  `Cod_Cli` int(11) NOT NULL AUTO_INCREMENT,
  `Nome` varchar(50) NOT NULL,
  `Dt_Nasc` date NOT NULL,
  `CPF` char(14) NOT NULL,
  `RG` char(11) NOT NULL,
  `Telefone` char(15) NOT NULL,
  `Email` varchar(50) NOT NULL,
  `Comp_Res` varchar(80) NOT NULL,
  `Senha` varchar(200) DEFAULT NULL,
  `NomeRua` varchar(200) NOT NULL,
  `NomeBairro` varchar(200) NOT NULL,
  `Cidade` varchar(200) NOT NULL,
  `NumerReside` varchar(50) NOT NULL,
  `CEP` varchar(10) NOT NULL,
  `Comple` varchar(100) NOT NULL,
  `Imagem` blob,
  PRIMARY KEY (`Cod_Cli`)
) ENGINE=MyISAM AUTO_INCREMENT=18 DEFAULT CHARSET=utf8mb4;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `cliente`
--

LOCK TABLES `cliente` WRITE;
/*!40000 ALTER TABLE `cliente` DISABLE KEYS */;
INSERT INTO `cliente` VALUES (7,'Teste','0200-10-10','123.123.123-21','null','94532-2345','teste@email.com','null','$2y$10$PxyTuBXNwJo2TWWBMG6oteuFarwXNc508ZT9.okUPHVfyz3xDNFD2','Rua Teste','Bairro Teste','SP','1','00000-000','Teste',NULL),(9,'TesteDois','0200-10-10','123.123.123-21','null','00000-0000','teste2@email.com','null','$2y$10$t550Q28Glgy5iZbjavTgj.t5Eh.IU4ajG9pQRufWw9MrFYruxADqK','Rua TesteDois','Bairro TesteDois','SP','2','00000-000','Teste',NULL),(10,'Guilherme','2020-12-15','123.123.123-21','null','94532-2345','teste5@email.com','null','$2y$10$DLrBEtfNx3Rby2q0DRPnSOkGdUnYtREorOyDfM2Jw0UzfassCgIUC','Rua Almeida','Vila Jacui','SP','11','08050-410','Nenhum',NULL),(11,'Guilherme','2000-10-10','123.123.123-21','null','94532-2345','teste15@email.com','null','$2y$10$XyKDKG4jkX4pZaHtBJ0RmOB/SVRo6syhDB4uvkEBbbRF4pQ4d26QG','t','Vila Jacui','SP','1','08060-410','Nenhum',NULL),(12,'Guilherme','2000-10-10','123.123.123-21','null','94532-2345','teste154@email.com','null','$2y$10$v7t222QZIa.qtZUU8E65Yu69e93am7XYxJN84qd1Ue22CumeSPAb6','t','Vila Jacui','SP','1','08060-410','Nenhum',NULL),(13,'Guilherme','2020-12-15','123.123.123-21','null','94532-2345','teste19@email.com','null','$2y$10$gfM5sdZZkXauMDOVmutd5uTjP215aXZkK1sNRgp7EneaUvQWnIAJC','Rua Almeida','Vila Jacui','SP','11','08050-410','Nenhum',NULL),(14,'Guilherme','2020-12-15','123.123.123-21','null','94532-2345','teste21@email.com','null','$2y$10$yemt3BtFY7zpwYxfzunMA.9ixWW5QsuPAMdLc2OC8mEvuF4E9frE.','Rua Almeida','Vila Jacui','SP','11','08050-410','Nenhum',NULL),(15,'Guilherme','2020-12-15','123.123.123-21','null','94532-2345','teste22@email.com','null','$2y$10$iqWHbxpzQ38Yz.tSSo5smejVwehZ9ByWPOPgKz11jw2H5k90rqRwa','Rua Almeida','Vila Jacui','SP','11','08050-410','Nenhum',NULL),(16,'Guilherme','2020-12-15','123.123.123-21','null','94532-2345','teste23@email.com','null','$2y$10$YLQAfNkAFEa1b.TIuIEOiuzllW/G0YwrX0Jg7dhZaWrUvpPDy/0oG','Rua Almeida','Vila Jacui','SP','11','08050-410','Nenhum',NULL),(17,'Guilherme','2020-12-15','123.123.123-21','null','94532-2345','teste24@email.com','null','$2y$10$.OGvUSVRX1nHV1mSSymmeOdC2b6Dl6fTk8qwVXcOlHKppjC9GsMb6','Rua Almeida','Vila Jacui','SP','11','08050-410','Nenhum',NULL);
/*!40000 ALTER TABLE `cliente` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `contato_fornc`
--

DROP TABLE IF EXISTS `contato_fornc`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `contato_fornc` (
  `Cod_For` int(11) NOT NULL AUTO_INCREMENT,
  `Nome` varchar(50) NOT NULL,
  `CPF` char(14) NOT NULL,
  `RG` char(11) NOT NULL,
  `Telefone` char(15) NOT NULL,
  `Email` varchar(50) NOT NULL,
  `Comp_Res` varchar(80) NOT NULL,
  `Cod_Empresa` int(11) NOT NULL,
  PRIMARY KEY (`Cod_For`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `contato_fornc`
--

LOCK TABLES `contato_fornc` WRITE;
/*!40000 ALTER TABLE `contato_fornc` DISABLE KEYS */;
/*!40000 ALTER TABLE `contato_fornc` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `empresa`
--

DROP TABLE IF EXISTS `empresa`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `empresa` (
  `Cod_Empresa` int(11) NOT NULL AUTO_INCREMENT,
  `Nome_Fantasia` char(50) NOT NULL,
  `CNPJ` char(20) NOT NULL,
  `Endereco` varchar(70) NOT NULL,
  `Email` varchar(50) NOT NULL,
  `Telefone` char(15) NOT NULL,
  PRIMARY KEY (`Cod_Empresa`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `empresa`
--

LOCK TABLES `empresa` WRITE;
/*!40000 ALTER TABLE `empresa` DISABLE KEYS */;
/*!40000 ALTER TABLE `empresa` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `fornece`
--

DROP TABLE IF EXISTS `fornece`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `fornece` (
  `Cod_Fornece` int(11) NOT NULL AUTO_INCREMENT,
  `Cod_For` int(11) NOT NULL,
  `Cod_Pro` int(11) NOT NULL,
  PRIMARY KEY (`Cod_Fornece`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `fornece`
--

LOCK TABLES `fornece` WRITE;
/*!40000 ALTER TABLE `fornece` DISABLE KEYS */;
/*!40000 ALTER TABLE `fornece` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `funcionario`
--

DROP TABLE IF EXISTS `funcionario`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `funcionario` (
  `Cod_Fun` int(11) NOT NULL,
  `Nome` varchar(50) NOT NULL,
  `CPF` char(14) NOT NULL,
  `RG` char(11) NOT NULL,
  `CTPS` char(10) NOT NULL,
  `Comp_Res` varchar(80) NOT NULL,
  `Cod_Tipo` int(11) NOT NULL,
  PRIMARY KEY (`Cod_Fun`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `funcionario`
--

LOCK TABLES `funcionario` WRITE;
/*!40000 ALTER TABLE `funcionario` DISABLE KEYS */;
/*!40000 ALTER TABLE `funcionario` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `itens_nota_fiscal`
--

DROP TABLE IF EXISTS `itens_nota_fiscal`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `itens_nota_fiscal` (
  `N_PDV` int(11) NOT NULL,
  `Cod_Pro` int(11) NOT NULL,
  `Qtde_do_Produto` varchar(70) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `itens_nota_fiscal`
--

LOCK TABLES `itens_nota_fiscal` WRITE;
/*!40000 ALTER TABLE `itens_nota_fiscal` DISABLE KEYS */;
/*!40000 ALTER TABLE `itens_nota_fiscal` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `nota_fiscal`
--

DROP TABLE IF EXISTS `nota_fiscal`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `nota_fiscal` (
  `N_PDV` int(11) NOT NULL AUTO_INCREMENT,
  `Cod_Cli` int(11) NOT NULL,
  `Cod_Fun` int(11) NOT NULL,
  `HCompra` datetime NOT NULL,
  PRIMARY KEY (`N_PDV`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `nota_fiscal`
--

LOCK TABLES `nota_fiscal` WRITE;
/*!40000 ALTER TABLE `nota_fiscal` DISABLE KEYS */;
/*!40000 ALTER TABLE `nota_fiscal` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `produto`
--

DROP TABLE IF EXISTS `produto`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `produto` (
  `Cod` int(11) NOT NULL AUTO_INCREMENT,
  `Nome` varchar(50) NOT NULL,
  `Caracteristica` varchar(70) NOT NULL,
  `Fabricante` varchar(50) NOT NULL,
  `Preco_de_Custo` decimal(10,0) NOT NULL,
  `Preco_de_Venda` decimal(10,0) NOT NULL,
  `Cod_Cat` int(11) NOT NULL,
  `Quantidade` varchar(50) NOT NULL,
  `Imagem` varchar(45) DEFAULT NULL,
  `CodDes` int(11) DEFAULT NULL,
  PRIMARY KEY (`Cod`)
) ENGINE=MyISAM AUTO_INCREMENT=24 DEFAULT CHARSET=utf8mb4;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `produto`
--

LOCK TABLES `produto` WRITE;
/*!40000 ALTER TABLE `produto` DISABLE KEYS */;
INSERT INTO `produto` VALUES (1,'Banana','Fruta','Hortifrut gui',5,10,1,'100','Frutas/BananaP.png',1),(14,'Sabonete','Higiene','Produtos Higiene',4,15,5,'300','Higiene/Sabao.png',1),(13,'Detergente','Higiene','Produtos Higiene',1,9,5,'200','Higiene/Detergente.png',1),(5,'Refrigerante','Bebidas','bebidas',5,10,6,'300','Bebidas/refrigerante.png',1),(6,'Suco','Bebidas','bebidas gui',7,8,6,'500','Bebidas/suco.png',1),(7,'Vinho','Bebidas','bebidas gui',2,8,6,'300','Bebidas/vinho.png',1),(8,'Whiskey','Bebidas','bebidas gui',8,16,6,'300','Bebidas/Whiskey.png',1),(9,'Alcatra','Acougue','Acougues gui',20,30,3,'250','Acougue/Alcatra.png',1),(4,'Melancia','Fruta','Hortfrut',33,23,1,'200','Frutas/Melancia.png',1),(11,'Picanha','Acougue','Acougues gui',25,30,3,'230','Acougue/picanha.png',1),(22,'Milho','Enlatado','Enlatados Gui',7,30,4,'500','Enlatado/milho.png',1),(12,'Amaciante','Higiene','Produtos Higiene',2,8,5,'100','Higiene/Amaciante.png',1),(15,'Shampoos','Higiene','Produtos Higiene',7,30,5,'240','Higiene/Shampoo.png',0),(16,'Bolo de chocolate','Padaria','Pães Gostosos',4,10,2,'200','Padaria/BoloDeChoc.png',0),(17,'Croissant','Padaria','Pães Gostosos',9,10,2,'100','Padaria/Croissant.png',0),(18,'Pao','Padaria','Pães Gostosos',10,5,2,'100','Padaria/Pao.png',0),(19,'Pao de queijo','Padaria','Pães Gostosos',12,8,2,'300','Padaria/PaoDeQueijo.png',0),(20,'Ervilha','Enlatado','Enlatados Gui',10,15,4,'200','Enlatado/Ervilha.png',0),(21,'Feijao','Enlatado','Enlatados Gui',11,20,4,'800','Enlatado/Feijao.png',0),(23,'Sardinha','Enlatado','Enlatados GUI',9,15,4,'500','Enlatado/Sardinha.png',1);
/*!40000 ALTER TABLE `produto` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `promocao`
--

DROP TABLE IF EXISTS `promocao`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `promocao` (
  `CodDes` int(11) NOT NULL,
  `Desconto` varchar(45) NOT NULL,
  `Data_Inicio` varchar(45) DEFAULT NULL,
  `Data_Final` varchar(45) DEFAULT NULL,
  `Categoria` varchar(45) DEFAULT NULL,
  PRIMARY KEY (`CodDes`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `promocao`
--

LOCK TABLES `promocao` WRITE;
/*!40000 ALTER TABLE `promocao` DISABLE KEYS */;
INSERT INTO `promocao` VALUES (1,'10','20/10/2022','10/01/2023','Geral');
/*!40000 ALTER TABLE `promocao` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `tipo_func`
--

DROP TABLE IF EXISTS `tipo_func`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `tipo_func` (
  `Cod_Tipo` int(11) NOT NULL,
  `Cargo` varchar(50) NOT NULL,
  `Funcao` varchar(50) NOT NULL,
  `Salario` decimal(10,0) NOT NULL,
  PRIMARY KEY (`Cod_Tipo`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `tipo_func`
--

LOCK TABLES `tipo_func` WRITE;
/*!40000 ALTER TABLE `tipo_func` DISABLE KEYS */;
/*!40000 ALTER TABLE `tipo_func` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `usuario`
--

DROP TABLE IF EXISTS `usuario`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `usuario` (
  `Usuario` char(10) NOT NULL,
  `Senha` varchar(50) NOT NULL,
  PRIMARY KEY (`Usuario`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `usuario`
--

LOCK TABLES `usuario` WRITE;
/*!40000 ALTER TABLE `usuario` DISABLE KEYS */;
INSERT INTO `usuario` VALUES ('Cliente','123'),('Func','456');
/*!40000 ALTER TABLE `usuario` ENABLE KEYS */;
UNLOCK TABLES;
/*!40103 SET TIME_ZONE=@OLD_TIME_ZONE */;

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;

-- Dump completed on 2022-11-24 23:19:39
