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
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `categoria`
--

LOCK TABLES `categoria` WRITE;
/*!40000 ALTER TABLE `categoria` DISABLE KEYS */;
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
  PRIMARY KEY (`Cod_Cli`)
) ENGINE=MyISAM AUTO_INCREMENT=10 DEFAULT CHARSET=utf8mb4;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `cliente`
--

LOCK TABLES `cliente` WRITE;
/*!40000 ALTER TABLE `cliente` DISABLE KEYS */;
INSERT INTO `cliente` VALUES (7,'Teste','0200-10-10','123.123.123-21','null','94532-2345','teste@email.com','null','$2y$10$PxyTuBXNwJo2TWWBMG6oteuFarwXNc508ZT9.okUPHVfyz3xDNFD2','Rua Teste','Bairro Teste','SP','1','00000-000','Teste'),(9,'TesteDois','0200-10-10','123.123.123-21','null','00000-0000','teste2@email.com','null','$2y$10$t550Q28Glgy5iZbjavTgj.t5Eh.IU4ajG9pQRufWw9MrFYruxADqK','Rua TesteDois','Bairro TesteDois','SP','2','00000-000','Teste');
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
  PRIMARY KEY (`Cod`)
) ENGINE=MyISAM AUTO_INCREMENT=23 DEFAULT CHARSET=utf8mb4;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `produto`
--

LOCK TABLES `produto` WRITE;
/*!40000 ALTER TABLE `produto` DISABLE KEYS */;
INSERT INTO `produto` VALUES (1,'Banana','Fruta','Hortifrut gui',5,10,4,'100','Frutas/Banana.jpg'),(14,'Sabonete','Higiene','Produtos Higiene',4,15,1,'300','Higiene/sabonete.jpg'),(13,'Detergente','Higiene','Produtos Higiene',1,9,1,'200','Higiene/Detergentejpg.jpg'),(5,'Refrigerante','Bebidas','bebidas',5,10,3,'300','Bebidas/refrigerante.png'),(6,'Suco','Bebidas','bebidas gui',7,8,3,'500','Bebidas/suco.jpg'),(7,'Vinho','Bebidas','bebidas gui',2,8,5,'300','Bebidas/vinho.jpg'),(8,'Whiskey','Bebidas','bebidas gui',8,16,1,'300','Bebidas/Whiskey.jpg'),(9,'Alcatra','Acougue','Acougues gui',20,30,1,'250','Acougue/Alcatra.jpg'),(4,'Melancia','Fruta','Hortfrut',33,23,1,'200','Frutas/Melancia.jpg'),(11,'Picanha','Acougue','Acougues gui',25,30,1,'230','Acougue/picanha.png'),(22,'Milho','Enlatado','Enlatados Gui',7,30,4,'500','Enlatado/milho.jpg'),(12,'Amaciante','Higiene','Produtos Higiene',2,8,1,'100','Higiene/Amaciante.jpg'),(15,'Shampoos','Higiene','Produtos Higiene',7,30,1,'240','Higiene/shampoos.jpg'),(16,'Bolo de chocolate','Padaria','Pães Gostosos',4,10,1,'200','Padaria/bolo_chocojpg.jpg'),(17,'Croissant','Padaria','Pães Gostosos',9,10,1,'100','Padaria/croissant.jpg'),(18,'Pão','Padaria','Pães Gostosos',10,5,1,'100','Padaria/pao.jpg'),(19,'Pao de queijo','Padaria','Pães Gostosos',12,8,8,'300','Padaria/PaodequeijoMineiro.jpg'),(20,'Ervilha','Enlatado','Enlatados Gui',10,15,2,'200','Enlatado/Ervilha.jpg'),(21,'Feijao','Enlatado','Enlatados Gui',11,20,4,'800','Enlatado/Feijao.jpg');
/*!40000 ALTER TABLE `produto` ENABLE KEYS */;
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

-- Dump completed on 2022-11-20 22:40:37
