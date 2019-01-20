-- MySQL dump 10.16  Distrib 10.1.37-MariaDB, for Linux (x86_64)
--
-- Host: localhost    Database: foodbook
-- ------------------------------------------------------
-- Server version	10.1.37-MariaDB

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
-- Table structure for table `comment`
--

DROP TABLE IF EXISTS `comment`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `comment` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `body` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `userID` int(11) NOT NULL,
  `recipeID` int(11) NOT NULL,
  `deleted` int(11) NOT NULL DEFAULT '0',
  `created` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `comment`
--

LOCK TABLES `comment` WRITE;
/*!40000 ALTER TABLE `comment` DISABLE KEYS */;
/*!40000 ALTER TABLE `comment` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `like`
--

DROP TABLE IF EXISTS `like`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `like` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `userID` int(11) NOT NULL,
  `recipeID` int(11) NOT NULL,
  `created` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `like`
--

LOCK TABLES `like` WRITE;
/*!40000 ALTER TABLE `like` DISABLE KEYS */;
/*!40000 ALTER TABLE `like` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `navigation`
--

DROP TABLE IF EXISTS `navigation`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `navigation` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `link` varchar(50) COLLATE utf8mb4_unicode_ci NOT NULL,
  `deleted` tinyint(1) NOT NULL DEFAULT '0',
  `created` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `navigation`
--

LOCK TABLES `navigation` WRITE;
/*!40000 ALTER TABLE `navigation` DISABLE KEYS */;
INSERT INTO `navigation` VALUES (1,'Home',0,'2019-01-10 19:54:50'),(2,'Recipes',0,'2019-01-10 19:54:50'),(3,'Contact',0,'2019-01-10 19:54:50');
/*!40000 ALTER TABLE `navigation` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `poll`
--

DROP TABLE IF EXISTS `poll`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `poll` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `userID` int(11) NOT NULL,
  `questionID` int(11) NOT NULL,
  `suggestionID` int(11) NOT NULL,
  `created` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `poll`
--

LOCK TABLES `poll` WRITE;
/*!40000 ALTER TABLE `poll` DISABLE KEYS */;
/*!40000 ALTER TABLE `poll` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `question`
--

DROP TABLE IF EXISTS `question`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `question` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `question` varchar(50) COLLATE utf8mb4_unicode_ci NOT NULL,
  `page` varchar(50) COLLATE utf8mb4_unicode_ci NOT NULL,
  `deleted` tinyint(1) DEFAULT '0',
  `created` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `question`
--

LOCK TABLES `question` WRITE;
/*!40000 ALTER TABLE `question` DISABLE KEYS */;
INSERT INTO `question` VALUES (1,'Which cuisine do you prefer ?','recipes',0,'2019-01-10 19:49:49'),(2,'What do you prefer more ?','profile',0,'2019-01-10 19:50:24');
/*!40000 ALTER TABLE `question` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `recipe`
--

DROP TABLE IF EXISTS `recipe`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `recipe` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `title` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL,
  `description` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `ingridients` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `slug` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `approximatedTime` int(11) NOT NULL,
  `image` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `userID` int(11) NOT NULL,
  `deleted` tinyint(1) DEFAULT '0',
  `created` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci COMMENT='spaggeti-carbonara';
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `recipe`
--

LOCK TABLES `recipe` WRITE;
/*!40000 ALTER TABLE `recipe` DISABLE KEYS */;
INSERT INTO `recipe` VALUES (1,'Kavurma','some description','salo,slanina,nogice','kavurma',15,'images/kavurma.jpeg',3,0,'2019-01-19 11:43:57'),(2,'Cvarci sa majonezom','cvarci majonez','cvarci,majonez','cvarci-sa-majonezom',1,'images/cvarci.jpeg',3,0,'2019-01-19 11:49:26'),(3,'Pomfrit','Pomfrit descir','krompir,kecap','pomfrit',10,'images/pomfrit.jpeg',4,0,'2019-01-19 13:42:54'),(4,'Princes krofne','Ставити у шерпу воду и уље да провре. Склонити са ватре па додати брашно помешано са прашком за пециво. Вратити на ватру и уз брзо мешање скувати компактно тесто. У прохлађено тесто додавати једно по једно јаје, стално мешајући. Шприцем или кашичицом формирати крофнице на плеху. Пећи у рерни 15 минута на 200 степени.\n\nЗа крем умутити жуманца са шећером и брашном, размутити са мало хладног млека. Остатак млека ставити да проври, па сипати крем од жуманаца и кувати да се згусне. Готов крем скинути са ватре и у охлађено додати путер и ванилин шећер. Мутити док крем не постане гладак. Охлађене крофне расећи, филовати кремом и посути шећером у праху. Преко основног крема може се додати и улупана слатка павлака или шлаг.','mleko krofne brasno ulje','princes-krofne',75,'images/princes.jpg',4,0,'2019-01-19 14:27:39');
/*!40000 ALTER TABLE `recipe` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `role`
--

DROP TABLE IF EXISTS `role`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `role` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `role` varchar(50) COLLATE utf8mb4_unicode_ci NOT NULL,
  `deleted` tinyint(1) NOT NULL DEFAULT '0',
  `created` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `role`
--

LOCK TABLES `role` WRITE;
/*!40000 ALTER TABLE `role` DISABLE KEYS */;
INSERT INTO `role` VALUES (1,'Admin',0,'2019-01-10 19:46:20'),(2,'User',0,'2019-01-10 19:46:20');
/*!40000 ALTER TABLE `role` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `socialnetwork`
--

DROP TABLE IF EXISTS `socialnetwork`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `socialnetwork` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `icon` varchar(50) COLLATE utf8mb4_unicode_ci NOT NULL,
  `url` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL,
  `tooltip` varchar(50) COLLATE utf8mb4_unicode_ci NOT NULL,
  `deleted` tinyint(1) DEFAULT '0',
  `created` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `socialnetwork`
--

LOCK TABLES `socialnetwork` WRITE;
/*!40000 ALTER TABLE `socialnetwork` DISABLE KEYS */;
INSERT INTO `socialnetwork` VALUES (1,'facebook','http://facebook.com/','Follow us on',0,'2019-01-14 18:45:10'),(2,'twitter','http://twitter.com/','Follow us on',0,'2019-01-14 18:45:39'),(3,'youtube','http://youtube.com/','Follow us on',0,'2019-01-14 18:46:03'),(4,'googleplus','https://plus.google.com/','Follow us on',0,'2019-01-14 18:46:38');
/*!40000 ALTER TABLE `socialnetwork` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `suggestion`
--

DROP TABLE IF EXISTS `suggestion`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `suggestion` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `suggestion` varchar(50) COLLATE utf8mb4_unicode_ci NOT NULL,
  `questionID` int(11) NOT NULL,
  `deleted` tinyint(1) DEFAULT '0',
  `created` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=7 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `suggestion`
--

LOCK TABLES `suggestion` WRITE;
/*!40000 ALTER TABLE `suggestion` DISABLE KEYS */;
INSERT INTO `suggestion` VALUES (1,'Serbian',1,0,'2019-01-10 19:50:56'),(2,'French',1,0,'2019-01-10 18:51:12'),(3,'Italian',1,0,'2019-01-10 19:51:45'),(4,'Asian',1,0,'2019-01-10 19:51:57'),(5,'Sweet',2,0,'2019-01-10 19:52:14'),(6,'Salty',2,0,'2019-01-10 19:52:27');
/*!40000 ALTER TABLE `suggestion` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `user`
--

DROP TABLE IF EXISTS `user`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `user` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `firstname` varchar(50) COLLATE utf8mb4_unicode_ci NOT NULL,
  `lastname` varchar(50) COLLATE utf8mb4_unicode_ci NOT NULL,
  `username` varchar(50) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(50) COLLATE utf8mb4_unicode_ci NOT NULL,
  `password` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `token` varchar(120) COLLATE utf8mb4_unicode_ci NOT NULL,
  `active` tinyint(1) NOT NULL DEFAULT '0',
  `roleID` tinyint(1) NOT NULL,
  `deleted` tinyint(1) DEFAULT '0',
  `created` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`),
  UNIQUE KEY `user_email_uindex` (`email`)
) ENGINE=InnoDB AUTO_INCREMENT=15 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `user`
--

LOCK TABLES `user` WRITE;
/*!40000 ALTER TABLE `user` DISABLE KEYS */;
INSERT INTO `user` VALUES (3,'Stefan','Bogdanovic','CerealKiller','bogdanovicstefan1997@gmail.com','$2y$10$nevfZNrID3x8yitCi7IqvuGoh19CCvMR7Ib6x1Q2i8EQGMNmIZw4K','e4bc317327ab54a3fb39071fc0624b68eec548b454564395bdf1f336ce67b652cd71db6107d66710b5d0bacadf243c0b915355c85e36171eb5e7ac0f',1,1,0,'2019-01-14 19:35:01'),(4,'Dwagoswaw','Daniwowic','daca1234','daca@gmail.com','$2y$10$vFxfBIWO3iwbAeAHu64x5.Oy8EmKT5aN1p8vB1CpCP2yiU4SjXKla','dc88f70a696561981776026924344380ae002d85529847a43c4025403da3da4acd22229d5b30563a83fa1f7a1bbd9f14b1ebcf6da8f81ab782350b9e',1,2,0,'2019-01-19 08:53:34'),(6,'Aleksandar','Genic','iguana','geni@gmail.com','$2y$10$7ETeY.Mf35M/TcX0jSxjTemxuEMIciJUVw3vGG3cdbQhsohmwAexq','47b13e87f286cdf2bbd2a2db247fb814792d87ee7fb47d036173102618bf7b9e6a72b2267b237d38b7daf40943332acf7de84ab47ff030096b1b4e5a',1,2,0,'2019-01-19 08:59:14'),(10,'Aleksandar','Genic','iguana','geni1@gmail.com','$2y$10$miH7kffMavux3hF6O1rRi.tGvCsDwJUS4ITszvLXQtiYBNsPeij4u','788d5a139e1034b1fee1ae9d6bbed818308d8bea0b7b386d4945c2b857d6000cff33be9cbceecaf5048fcf08187337f34765b9c2d585ad146a70e891',1,2,0,'2019-01-19 08:59:53'),(11,'Zoran','Bogdanovic','zoki1234','bzka53@gmail.com','$2y$10$kCMhtIpnEijNqkx7/Me4YuhpugGCaeySn/qq5JBHiaUODuGw3ON/i','ebb848791d623c33476275b4c484a2a4bf46d9ce4767530df78b5cc15d23b937eb228d93e7472e3fd8f7de39953a24acb7a80df2d379588f9b173515',1,2,0,'2019-01-19 09:02:33'),(12,'Bratina','Teofilovic','masterteo','teo@gmail.com','$2y$10$DuUtKME97grCPhmxbJ1eg.K4y.RV7iMovRTKKKSe87Q.ufGWoaF.C','8a8426e5277addbb6eea6d6269f23ded515a7de94bf13daedc5017cfadb8181c91534a5e3d52e697ad5fee6e0553aa9192a74d2231d0c2e65492d7f3',1,2,0,'2019-01-19 09:36:54'),(14,'Stefan','Stefanovic','Steff','stefan@gmail.com','$2y$10$90MV3GeADV68wPlmVzxqT.g.IAn4rt0tNSrshJI4/Ype5Sk8k17QG','41361dbac636279eea996ac77b2f49cdc1bc8c86537d8214e87ca2f428d0fc3a09b1f527d3c4b76a54180663ff20b29e8fc1210e2b6c2c8b2572d0cd',1,2,0,'2019-01-19 10:03:37');
/*!40000 ALTER TABLE `user` ENABLE KEYS */;
UNLOCK TABLES;
/*!40103 SET TIME_ZONE=@OLD_TIME_ZONE */;

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;

-- Dump completed on 2019-01-19 16:14:53
