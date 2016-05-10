-- MySQL dump 10.13  Distrib 5.5.47, for debian-linux-gnu (x86_64)
--
-- Host: localhost    Database: storeinventoryfinal1
-- ------------------------------------------------------
-- Server version	5.5.47-0ubuntu0.14.04.1

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
-- Table structure for table `Category`
--

DROP TABLE IF EXISTS `Category`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `Category` (
  `CategoryID` int(11) NOT NULL DEFAULT '0',
  `CategoryName` varchar(20) DEFAULT NULL,
  PRIMARY KEY (`CategoryID`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `Category`
--

LOCK TABLES `Category` WRITE;
/*!40000 ALTER TABLE `Category` DISABLE KEYS */;
INSERT INTO `Category` VALUES (1,'Food'),(2,'Book'),(3,'Cigarettes');
/*!40000 ALTER TABLE `Category` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `Inventory`
--

DROP TABLE IF EXISTS `Inventory`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `Inventory` (
  `ItemName` varchar(20) DEFAULT NULL,
  `CategoryID` int(11) DEFAULT NULL,
  `SupplierID` int(11) DEFAULT NULL,
  `ItemID` int(11) NOT NULL DEFAULT '0',
  `StockID` int(11) DEFAULT NULL,
  PRIMARY KEY (`ItemID`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `Inventory`
--

LOCK TABLES `Inventory` WRITE;
/*!40000 ALTER TABLE `Inventory` DISABLE KEYS */;
INSERT INTO `Inventory` VALUES ('CoolWater',1,1,1,1),('FruitWater',1,1,2,2),('CrispyCrackers',1,2,3,3),('SuperCookies',1,2,4,4),('CrispyChocolate',1,2,5,5),('CrispyChocolateP',1,2,6,6),('CrispyChocolateC',1,2,7,7),('USMagazine',2,3,8,8),('CelebCloseLook',2,3,9,9),('WorldTravelWonders',2,3,10,10),('GamerProListings',2,4,11,11),('FilmCulture',2,4,12,12),('SmokeStack',3,5,13,13),('CapeTown',3,5,14,14),('LittleGuys',1,6,15,15),('SuperChips',1,2,16,16),('NachoWorld',1,6,17,17),('NachoWorldDip',1,6,18,18),('MangoCity',1,6,19,19),('GoodBanana',1,7,20,20),('GoodWatermelon',1,7,21,21),('GoodApple',1,7,22,22),('GoodGrapes',1,7,23,23),('GoodCorn',1,7,24,24),('GoodOlives',1,7,25,25),('GoodBlueberries',1,7,26,26),('GrandeVistas',2,4,27,27),('MountainViews',2,4,28,28),('OceanAdventures',2,4,29,29),('DeepSeaCreatures',2,8,30,30),('LavaMonsters',2,8,31,31),('HealthyHouseIdeas',2,8,32,32);
/*!40000 ALTER TABLE `Inventory` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `Stock`
--

DROP TABLE IF EXISTS `Stock`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `Stock` (
  `InStock` varchar(1) NOT NULL,
  `Ordered` varchar(1) NOT NULL,
  `StillOffered` varchar(1) NOT NULL,
  `StockNumber` int(11) DEFAULT NULL,
  `LowWaterMark` int(11) DEFAULT NULL,
  `StockID` int(11) NOT NULL DEFAULT '0',
  PRIMARY KEY (`StockID`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `Stock`
--

LOCK TABLES `Stock` WRITE;
/*!40000 ALTER TABLE `Stock` DISABLE KEYS */;
INSERT INTO `Stock` VALUES ('Y','Y','Y',21,30,1),('Y','Y','Y',25,30,2),('Y','N','Y',30,30,3),('N','Y','Y',24,30,4),('Y','Y','Y',40,30,5),('Y','Y','Y',42,30,6),('N','Y','Y',21,30,7),('Y','N','Y',35,30,8),('Y','Y','Y',37,30,9),('Y','Y','Y',33,30,10),('Y','Y','Y',29,30,11),('Y','Y','Y',15,30,12),('Y','Y','Y',25,30,13),('Y','Y','Y',12,30,14),('Y','Y','Y',30,30,15),('Y','Y','Y',36,30,16),('Y','N','Y',22,30,17),('Y','N','Y',40,30,18),('Y','N','Y',32,30,19),('Y','Y','Y',12,30,20),('Y','Y','Y',17,30,21),('Y','Y','Y',21,30,22),('Y','Y','Y',26,30,23),('Y','Y','Y',31,30,24),('Y','Y','Y',42,30,25),('Y','Y','Y',24,30,26),('N','N','Y',30,30,27),('N','Y','Y',21,30,28),('N','Y','Y',20,30,29),('Y','N','Y',20,30,30),('Y','Y','Y',17,30,31),('Y','Y','Y',27,30,32);
/*!40000 ALTER TABLE `Stock` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `Supplier`
--

DROP TABLE IF EXISTS `Supplier`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `Supplier` (
  `SupplierID` int(11) NOT NULL DEFAULT '0',
  `SupplierName` varchar(20) DEFAULT NULL,
  PRIMARY KEY (`SupplierID`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `Supplier`
--

LOCK TABLES `Supplier` WRITE;
/*!40000 ALTER TABLE `Supplier` DISABLE KEYS */;
INSERT INTO `Supplier` VALUES (1,'Hydrate'),(2,'FoodTime'),(3,'USPublishing'),(4,'MediaCorp'),(5,'Brians'),(6,'HenrysHouse'),(7,'FreshestFarms'),(8,'TallHat');
/*!40000 ALTER TABLE `Supplier` ENABLE KEYS */;
UNLOCK TABLES;
/*!40103 SET TIME_ZONE=@OLD_TIME_ZONE */;

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;

-- Dump completed on 2016-05-09 20:40:10
