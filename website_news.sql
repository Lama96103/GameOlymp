-- MySQL dump 10.13  Distrib 5.7.17, for Win64 (x86_64)
--
-- Host: 127.0.0.1    Database: website
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
-- Table structure for table `news`
--

DROP TABLE IF EXISTS `news`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `news` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `header` varchar(45) CHARACTER SET latin1 DEFAULT NULL,
  `info` varchar(200) CHARACTER SET latin1 DEFAULT NULL,
  `key` varchar(10) DEFAULT '-1',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=26 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `news`
--

LOCK TABLES `news` WRITE;
/*!40000 ALTER TABLE `news` DISABLE KEYS */;
INSERT INTO `news` VALUES (1,'Alles Neu','Willkommen auf der Seite','-1'),(2,'Match','Lars gewinnt gegen Tom in HearthstoneLars gewinnt gegen Tom in HearthstoneLars gewinnt gegen Tom in HearthstoneLars gewinnt gegen Tom in HearthstoneLars gewinnt gegen Tom in HearthstoneLars gewinnt ge','-1'),(3,'Willkomen Leon','Herzlich Willkommen Leon, du hast es auf die Seite geschaft und hast nun die Möglichkeit diesen super tollen Text zu lesen','-1'),(4,'Counter Strike: Global Offensive','A new Tournament has started','-1'),(5,'wert','asdf','-1'),(6,'asdf','asdf','-1'),(7,'sdf','asdf','-1'),(8,'asdf','asdf','-1'),(9,'asdf','asdf','-1'),(10,'adfasdf','234','-1'),(11,'asdf','qwer','-1'),(12,'asdf','asdf','-1'),(13,'asdf','asdf','-1'),(14,'Civilisation V','A new Tournament has started','#'),(15,'Hearthstone','A new Tournament has started','#1'),(16,'Hearthstone','A new Tournament has started','#2'),(17,'Hearthstone','Round 1 has started','#3'),(18,'Hearthstone','A new Tournament has started','#4'),(19,'Hearthstone','A new Tournament has started','#5'),(20,'Hearthstone','1 has started','#6'),(21,'Hearthstone','Round 4 has started','#7'),(22,'Hearthstone','A new Tournament has started','#8'),(23,'Hearthstone','Round 5 has started','#9'),(24,'Hearthstone','A new Tournament has started','#18'),(25,'Hearthstone','Round 2 has started','#18');
/*!40000 ALTER TABLE `news` ENABLE KEYS */;
UNLOCK TABLES;
/*!40103 SET TIME_ZONE=@OLD_TIME_ZONE */;

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;

-- Dump completed on 2018-03-15 20:38:08
