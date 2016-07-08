-- MySQL dump 10.13  Distrib 5.6.28, for debian-linux-gnu (i686)
--
-- Host: localhost    Database: test
-- ------------------------------------------------------
-- Server version	5.6.28-0ubuntu0.15.10.1

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
-- Table structure for table `carriages`
--

DROP TABLE IF EXISTS `carriages`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `carriages` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `carriage_number` int(11) DEFAULT NULL,
  `carriage_kind` date DEFAULT NULL,
  `carriage_owner` int(11) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=22 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `carriages`
--

LOCK TABLES `carriages` WRITE;
/*!40000 ALTER TABLE `carriages` DISABLE KEYS */;
INSERT INTO `carriages` VALUES (13,12354311,'2016-07-11',19),(19,12312312,'2016-07-11',16),(20,33211231,'2012-12-30',17),(21,11233456,'2011-01-31',16);
/*!40000 ALTER TABLE `carriages` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `carriages_owners`
--

DROP TABLE IF EXISTS `carriages_owners`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `carriages_owners` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `carriage_id` int(11) DEFAULT NULL,
  `owner_id` int(11) DEFAULT NULL,
  `date_from` date DEFAULT NULL,
  `date_to` date DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=25 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `carriages_owners`
--

LOCK TABLES `carriages_owners` WRITE;
/*!40000 ALTER TABLE `carriages_owners` DISABLE KEYS */;
INSERT INTO `carriages_owners` VALUES (1,0,9,'2016-07-07',NULL),(2,1970,9,'2016-07-07',NULL),(3,0,9,'2016-07-07',NULL),(4,11122233,9,'2016-07-07',NULL),(5,11223344,9,'2016-07-07',NULL),(6,11223344,9,'2016-07-07',NULL),(7,11223344,9,'2016-07-07',NULL),(8,11223344,9,'2016-07-07',NULL),(9,11223344,9,'2016-07-07',NULL),(10,11223355,9,'2016-07-07',NULL),(11,12312333,9,'2016-07-07',NULL),(12,12353212,9,'2016-07-07',NULL),(13,12354311,10,'2016-07-07',NULL),(14,12333211,9,'2016-07-07',NULL),(15,11334455,10,'2016-07-07',NULL),(16,44123341,10,'2016-07-07',NULL),(17,11223344,10,'2016-07-07',NULL),(18,11233123,15,'2016-07-07',NULL),(19,12312312,11,'2016-07-07',NULL),(20,33211231,18,'2016-07-07',NULL),(21,11233456,19,'2016-07-07',NULL),(22,11233456,18,'2016-07-08',NULL),(23,33211231,17,'2016-07-08',NULL),(24,11233456,16,'2016-07-08',NULL);
/*!40000 ALTER TABLE `carriages_owners` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `owners`
--

DROP TABLE IF EXISTS `owners`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `owners` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` text,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=20 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `owners`
--

LOCK TABLES `owners` WRITE;
/*!40000 ALTER TABLE `owners` DISABLE KEYS */;
INSERT INTO `owners` VALUES (16,'Компания 1'),(17,'Компания 2'),(18,'Компания 3'),(19,'Компания 4');
/*!40000 ALTER TABLE `owners` ENABLE KEYS */;
UNLOCK TABLES;
/*!40103 SET TIME_ZONE=@OLD_TIME_ZONE */;

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;

-- Dump completed on 2016-07-08  8:35:46
