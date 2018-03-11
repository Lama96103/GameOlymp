-- MySQL dump 10.13  Distrib 5.7.17, for Win64 (x86_64)
--
-- Host: 127.0.0.1    Database: gameolymp
-- ------------------------------------------------------
-- Server version	5.5.5-10.1.30-MariaDB

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
-- Table structure for table `player`
--

DROP TABLE IF EXISTS `player`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `player` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(45) NOT NULL,
  `password` varchar(512) NOT NULL,
  `seasonpoints` int(11) DEFAULT '0',
  `dispoints` int(11) DEFAULT '0',
  `admin` bit(1) DEFAULT b'0',
  PRIMARY KEY (`id`),
  UNIQUE KEY `id_UNIQUE` (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=12 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `player`
--

LOCK TABLES `player` WRITE;
/*!40000 ALTER TABLE `player` DISABLE KEYS */;
INSERT INTO `player` VALUES (1,'Lars','$2y$10$wyC3O4yLNGbbNT9ighH6n.QTSc0HhMuKYYGJUXufAogmu3N8fgKZK',1,0,''),(2,'Tom','$2y$10$mnBKm2YvScPMCbamfalDpO4QIosIfbvVUZSkNmjUOkuP1D8FNGt7.',0,0,'\0'),(3,'Leon','$2y$10$u/z.92.OpmGy/oZPAnbyi.7dfQf2oQfNEzuBSpwuRqbP24QQBmN/q',0,0,'\0'),(4,'Simon','$2y$10$ER25erU4.4RM1CKq66p/ZudB3OZfqPQRFztRwCsZ0UePPRFvOZvvq',0,0,'\0'),(5,'Basti','$2y$10$LxteBQU1a.iE.4KmW3upheCjpW/zBkxX9RuLdXvraHw2NmpNh8lhG',0,0,'\0'),(6,'Leo','$2y$10$1yEmy9N4sWkF9yg4TDky1ugbcuNG/nocnLXKnUzK9viam/FXfm4ke',0,0,'\0'),(7,'Tim','$2y$10$zgF.XiwtW61WXPIGTTd8R.VGH2heXgUCHKKsR1N3cx81Ai2uMbz52',0,0,'\0'),(8,'Daniel','$2y$10$Oy1UTEUcvxSdzDwIMSmeleVabfKLaaBYUM6Sc85M2kGkb12M1W1ge',0,0,'\0'),(9,'Otto','$2y$10$I5iJw6nUSVgnk89PuIT9UeYRnUl1eUNoMQQO14K3H7965cXeIlmsK',0,0,'\0'),(10,'CaptainLama','$2y$10$fNTktokFaZEXbvW9I0isGeiksMoXIWVVNjk2xVD8c1HyRwyE51yaq',0,0,'\0'),(11,'Klaus','$2y$10$y/5bojvvAfdJmR.tS6.MhuFFC84AgpgwinZH1Kd3O9pBZrJ/qw9py',0,0,'\0');
/*!40000 ALTER TABLE `player` ENABLE KEYS */;
UNLOCK TABLES;
/*!40103 SET TIME_ZONE=@OLD_TIME_ZONE */;

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;

-- Dump completed on 2018-03-11 17:45:28
