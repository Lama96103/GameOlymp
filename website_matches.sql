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
-- Table structure for table `matches`
--

DROP TABLE IF EXISTS `matches`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `matches` (
  `id` int(10) NOT NULL AUTO_INCREMENT,
  `hostid` int(10) NOT NULL,
  `guestid` int(10) NOT NULL,
  `disid` int(11) NOT NULL,
  `pointshost` int(11) DEFAULT '0',
  `pointsguest` int(11) DEFAULT '0',
  `played` bit(1) DEFAULT b'0',
  `confirmed` bit(1) DEFAULT b'0',
  `round` int(11) DEFAULT '0',
  `expiredate` date DEFAULT NULL,
  `tourid` int(11) NOT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `id_UNIQUE` (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=37 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `matches`
--

LOCK TABLES `matches` WRITE;
/*!40000 ALTER TABLE `matches` DISABLE KEYS */;
INSERT INTO `matches` VALUES (20,1,-1,1,0,0,'','',0,'2018-03-15',14),(21,2,3,1,2,1,'','',0,'2018-03-15',14),(22,1,2,1,2,1,'','',1,'2018-03-15',14),(23,1,-1,1,0,0,'','',0,'2018-03-15',15),(24,1,-1,1,0,0,'','',0,'2018-03-15',16),(25,3,-1,1,0,0,'','',0,'2018-03-15',16),(26,2,-1,1,0,0,'','',0,'2018-03-15',16),(27,11,5,1,1,0,'','',0,'2018-03-15',16),(28,1,3,1,2,1,'','',2,'2018-03-15',16),(29,2,11,1,2,1,'','',2,'2018-03-15',16),(30,1,2,1,2,1,'','',3,'2018-03-15',16),(31,1,-1,1,0,0,'','',0,'2018-03-15',17),(32,2,3,1,2,1,'','',0,'2018-03-15',17),(33,1,2,1,2,1,'','',1,'2018-03-15',17),(34,1,-1,1,0,0,'','',0,'2018-03-16',18),(35,2,4,1,2,1,'','',0,'2018-03-16',18),(36,1,2,1,3,1,'','',1,'2018-03-16',18);
/*!40000 ALTER TABLE `matches` ENABLE KEYS */;
UNLOCK TABLES;
/*!40103 SET TIME_ZONE=@OLD_TIME_ZONE */;

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;

-- Dump completed on 2018-03-15 20:38:07
