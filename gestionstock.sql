-- MariaDB dump 10.19  Distrib 10.4.22-MariaDB, for Win64 (AMD64)
--
-- Host: localhost    Database: gestionstock
-- ------------------------------------------------------
-- Server version	10.4.22-MariaDB

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
-- Table structure for table `boncaisseretour`
--

DROP TABLE IF EXISTS `boncaisseretour`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `boncaisseretour` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `number` bigint(20) NOT NULL DEFAULT 0,
  `idcaisseretour` int(11) DEFAULT NULL,
  `idcompanie` int(11) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=49 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `boncaisseretour`
--

LOCK TABLES `boncaisseretour` WRITE;
/*!40000 ALTER TABLE `boncaisseretour` DISABLE KEYS */;
INSERT INTO `boncaisseretour` VALUES (13,1,NULL,NULL,'2024-02-04 16:41:14','2024-02-04 16:41:14'),(14,2,NULL,NULL,'2024-02-04 16:41:16','2024-02-04 16:41:16'),(15,1,37,9,NULL,NULL),(16,1,38,10,NULL,NULL),(17,2,39,10,NULL,NULL),(18,3,40,10,NULL,NULL),(19,4,41,10,NULL,NULL),(20,5,42,10,NULL,NULL),(21,6,43,10,NULL,NULL),(22,7,44,10,NULL,NULL),(23,8,45,10,NULL,NULL),(24,9,46,10,NULL,NULL),(25,10,47,10,NULL,NULL),(26,11,48,10,NULL,NULL),(28,12,50,10,NULL,NULL),(29,13,51,10,NULL,NULL),(30,14,52,10,NULL,NULL),(31,15,53,10,NULL,NULL),(32,16,54,10,NULL,NULL),(33,17,55,10,NULL,NULL),(34,18,56,10,NULL,NULL),(35,19,57,10,NULL,NULL),(36,20,58,10,NULL,NULL),(37,21,59,10,NULL,NULL),(47,22,69,10,NULL,NULL),(48,23,70,10,NULL,NULL);
/*!40000 ALTER TABLE `boncaisseretour` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `boncaissevides`
--

DROP TABLE IF EXISTS `boncaissevides`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `boncaissevides` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `number` bigint(20) NOT NULL DEFAULT 0,
  `idcaissevide` int(11) DEFAULT NULL,
  `idcompanie` int(11) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=123 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `boncaissevides`
--

LOCK TABLES `boncaissevides` WRITE;
/*!40000 ALTER TABLE `boncaissevides` DISABLE KEYS */;
INSERT INTO `boncaissevides` VALUES (46,1,NULL,NULL,'2024-02-01 04:02:15','2024-02-01 04:02:15'),(47,2,NULL,NULL,'2024-02-01 04:05:48','2024-02-01 04:05:48'),(48,3,NULL,NULL,'2024-02-01 19:04:45','2024-02-01 19:04:45'),(49,4,NULL,NULL,'2024-02-02 01:36:20','2024-02-02 01:36:20'),(50,5,NULL,NULL,'2024-02-02 01:37:30','2024-02-02 01:37:30'),(51,6,NULL,NULL,'2024-02-02 01:38:04','2024-02-02 01:38:04'),(52,7,NULL,NULL,'2024-02-02 23:06:16','2024-02-02 23:06:16'),(53,8,NULL,NULL,'2024-02-02 23:08:24','2024-02-02 23:08:24'),(54,9,NULL,NULL,'2024-02-02 23:08:44','2024-02-02 23:08:44'),(55,10,NULL,NULL,'2024-02-02 23:09:03','2024-02-02 23:09:03'),(56,11,NULL,NULL,'2024-02-03 18:43:05','2024-02-03 18:43:05'),(57,12,NULL,NULL,'2024-02-03 18:43:22','2024-02-03 18:43:22'),(58,13,NULL,NULL,'2024-02-04 16:35:53','2024-02-04 16:35:53'),(59,14,NULL,NULL,'2024-02-04 16:35:55','2024-02-04 16:35:55'),(60,15,NULL,NULL,'2024-02-05 22:40:02','2024-02-05 22:40:02'),(61,16,NULL,NULL,'2024-02-05 22:40:19','2024-02-05 22:40:19'),(62,17,NULL,NULL,'2024-02-05 22:41:09','2024-02-05 22:41:09'),(63,18,NULL,NULL,'2024-02-05 23:30:30','2024-02-05 23:30:30'),(64,19,NULL,NULL,'2024-02-06 16:13:06','2024-02-06 16:13:06'),(65,20,NULL,NULL,'2024-02-06 16:13:07','2024-02-06 16:13:07'),(66,21,70,NULL,'2024-02-06 16:16:44','2024-02-06 16:16:44'),(67,22,66,NULL,'2024-02-06 17:47:33','2024-02-06 17:47:33'),(68,23,65,NULL,'2024-02-06 17:48:18','2024-02-06 17:48:18'),(69,24,64,NULL,'2024-02-06 17:48:37','2024-02-06 17:48:37'),(70,25,71,NULL,'2024-02-06 17:50:38','2024-02-06 17:50:38'),(71,26,72,NULL,'2024-02-06 17:51:31','2024-02-06 17:51:31'),(72,27,80,NULL,'2024-02-11 16:44:22','2024-02-11 16:44:22'),(73,28,73,NULL,'2024-02-11 16:47:19','2024-02-11 16:47:19'),(74,29,77,NULL,'2024-02-11 16:47:55','2024-02-11 16:47:55'),(75,1,82,9,NULL,NULL),(76,2,83,9,NULL,NULL),(77,1,84,10,NULL,NULL),(78,2,85,10,NULL,NULL),(79,3,86,10,NULL,NULL),(80,4,87,10,NULL,NULL),(81,5,88,10,NULL,NULL),(82,6,89,10,NULL,NULL),(83,7,90,10,NULL,NULL),(84,8,91,10,NULL,NULL),(87,10,94,10,NULL,NULL),(88,11,95,10,NULL,NULL),(89,12,96,10,NULL,NULL),(90,13,97,10,NULL,NULL),(91,14,98,10,NULL,NULL),(92,15,99,10,NULL,NULL),(93,16,100,10,NULL,NULL),(94,17,101,10,NULL,NULL),(95,18,102,10,NULL,NULL),(97,3,104,9,NULL,NULL),(98,4,105,9,NULL,NULL),(99,19,106,10,NULL,NULL),(100,20,107,10,NULL,NULL),(104,22,110,10,NULL,NULL),(111,23,118,10,NULL,NULL),(112,24,119,10,NULL,NULL),(113,25,120,10,NULL,NULL),(114,26,121,10,NULL,NULL),(115,27,122,10,NULL,NULL),(116,28,123,10,NULL,NULL),(117,29,124,10,NULL,NULL),(118,30,125,10,NULL,NULL),(119,31,126,10,NULL,NULL),(120,32,127,10,NULL,NULL),(121,33,128,10,NULL,NULL),(122,34,129,10,NULL,NULL);
/*!40000 ALTER TABLE `boncaissevides` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `bonmarchandiseentree`
--

DROP TABLE IF EXISTS `bonmarchandiseentree`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `bonmarchandiseentree` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `number` bigint(20) NOT NULL DEFAULT 0,
  `idmarchandisentre` int(11) DEFAULT NULL,
  `idcompanie` int(11) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=80 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `bonmarchandiseentree`
--

LOCK TABLES `bonmarchandiseentree` WRITE;
/*!40000 ALTER TABLE `bonmarchandiseentree` DISABLE KEYS */;
INSERT INTO `bonmarchandiseentree` VALUES (39,1,NULL,NULL,'2024-02-01 19:07:57','2024-02-01 19:07:57'),(40,2,NULL,NULL,'2024-02-02 23:13:27','2024-02-02 23:13:27'),(41,3,NULL,NULL,'2024-02-02 23:13:46','2024-02-02 23:13:46'),(42,4,NULL,NULL,'2024-02-02 23:14:00','2024-02-02 23:14:00'),(43,5,NULL,NULL,'2024-02-02 23:14:13','2024-02-02 23:14:13'),(44,6,NULL,NULL,'2024-02-02 23:14:37','2024-02-02 23:14:37'),(45,7,NULL,NULL,'2024-02-03 18:52:30','2024-02-03 18:52:30'),(46,8,NULL,NULL,'2024-02-03 19:40:17','2024-02-03 19:40:17'),(47,9,NULL,NULL,'2024-02-04 16:39:22','2024-02-04 16:39:22'),(48,10,NULL,NULL,'2024-02-04 16:39:23','2024-02-04 16:39:23'),(49,11,59,NULL,'2024-02-06 16:25:45','2024-02-06 16:25:45'),(50,1,64,9,NULL,NULL),(51,2,65,9,NULL,NULL),(52,1,66,10,NULL,NULL),(53,2,67,10,NULL,NULL),(54,3,68,10,NULL,NULL),(55,4,69,10,NULL,NULL),(56,5,70,10,NULL,NULL),(57,6,71,10,NULL,NULL),(58,7,72,10,NULL,NULL),(59,8,73,10,NULL,NULL),(60,9,74,10,NULL,NULL),(61,10,75,10,NULL,NULL),(63,11,77,10,NULL,NULL),(65,13,79,10,NULL,NULL),(66,14,80,10,NULL,NULL),(67,15,81,10,NULL,NULL),(68,16,82,10,NULL,NULL),(69,17,83,10,NULL,NULL),(70,18,84,10,NULL,NULL),(71,19,85,10,NULL,NULL),(72,20,86,10,NULL,NULL),(73,21,87,10,NULL,NULL),(74,22,88,10,NULL,NULL),(76,24,90,10,NULL,NULL),(77,25,91,10,NULL,NULL),(78,26,92,10,NULL,NULL),(79,27,93,10,NULL,NULL);
/*!40000 ALTER TABLE `bonmarchandiseentree` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `bonmarchandisesortie`
--

DROP TABLE IF EXISTS `bonmarchandisesortie`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `bonmarchandisesortie` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `number` bigint(20) NOT NULL DEFAULT 0,
  `idmarchandisesortie` int(11) DEFAULT NULL,
  `idcompanie` int(11) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=43 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `bonmarchandisesortie`
--

LOCK TABLES `bonmarchandisesortie` WRITE;
/*!40000 ALTER TABLE `bonmarchandisesortie` DISABLE KEYS */;
INSERT INTO `bonmarchandisesortie` VALUES (13,1,NULL,NULL,'2024-02-01 19:43:03','2024-02-01 19:43:03'),(14,2,NULL,NULL,'2024-02-04 16:40:08','2024-02-04 16:40:08'),(15,3,NULL,NULL,'2024-02-04 16:40:09','2024-02-04 16:40:09'),(16,4,47,NULL,'2024-02-06 16:56:08','2024-02-06 16:56:08'),(17,5,48,NULL,'2024-02-11 17:22:10','2024-02-11 17:22:10'),(19,1,50,10,NULL,NULL),(20,2,51,10,NULL,NULL),(21,3,52,10,NULL,NULL),(22,4,53,10,NULL,NULL),(23,5,54,10,NULL,NULL),(24,6,55,10,NULL,NULL),(25,7,56,10,NULL,NULL),(26,8,57,10,NULL,NULL),(27,9,58,10,NULL,NULL),(28,10,59,10,NULL,NULL),(29,11,60,10,NULL,NULL),(30,12,61,10,NULL,NULL),(31,13,62,10,NULL,NULL),(32,14,63,10,NULL,NULL),(33,15,64,10,NULL,NULL),(34,16,65,10,NULL,NULL),(35,17,66,10,NULL,NULL),(36,18,67,10,NULL,NULL),(37,19,68,10,NULL,NULL),(38,20,69,10,NULL,NULL),(39,21,70,10,NULL,NULL),(40,22,71,10,NULL,NULL),(41,23,72,10,NULL,NULL),(42,24,73,10,NULL,NULL);
/*!40000 ALTER TABLE `bonmarchandisesortie` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `caisseretour`
--

DROP TABLE IF EXISTS `caisseretour`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `caisseretour` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `nbbox` decimal(10,2) DEFAULT NULL,
  `chauffeur` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `matricule` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `idclient` bigint(20) unsigned NOT NULL,
  `iduser` bigint(20) unsigned NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `cin` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `cloturer` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT '0',
  `compagnie` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `caisseretour_idclient_foreign` (`idclient`),
  KEY `caisseretour_iduser_foreign` (`iduser`),
  CONSTRAINT `caisseretour_idclient_foreign` FOREIGN KEY (`idclient`) REFERENCES `clients` (`id`) ON DELETE CASCADE,
  CONSTRAINT `caisseretour_iduser_foreign` FOREIGN KEY (`iduser`) REFERENCES `users` (`id`) ON DELETE CASCADE
) ENGINE=InnoDB AUTO_INCREMENT=71 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `caisseretour`
--

LOCK TABLES `caisseretour` WRITE;
/*!40000 ALTER TABLE `caisseretour` DISABLE KEYS */;
INSERT INTO `caisseretour` VALUES (32,5.00,'hassan','I1234',8,1,'2024-02-01 17:01:57','2024-02-01 17:01:57','Uc49379','1','7'),(33,2.00,'hassan','I1234',12,10,'2024-02-11 17:22:48','2024-02-11 17:22:48','Uc49379','0','9'),(34,3.00,'hassan','I1234',15,10,'2024-02-11 17:23:09','2024-02-11 17:23:09','Uc49379','0','9'),(38,6.00,'hassan','I1234',12,10,'2024-02-12 03:50:32','2024-02-12 03:50:32','Uc49379','1','10'),(39,123.00,'hassan','I1234',13,10,'2024-02-12 03:51:02','2024-02-12 03:51:02','Uc49379','1','10'),(40,45.00,'hassan','I1234',14,10,'2024-02-12 03:51:25','2024-02-12 03:51:25','Uc49379','1','10'),(41,23.00,'hassan','I1234',15,10,'2024-02-12 03:51:45','2024-02-12 03:51:45','Uc49379','1','10'),(42,89.00,'hassan','I1234',16,10,'2024-02-12 03:52:14','2024-02-12 03:52:14','Uc49379','1','10'),(43,65.00,'hassan','I1234',17,10,'2024-02-12 03:52:37','2024-02-12 03:52:37','Uc49379','1','10'),(44,45.00,'hassan','I1234',18,10,'2024-02-12 03:53:44','2024-02-12 03:53:44','Uc49379','0','10'),(45,56.00,'hassan','I1234',19,10,'2024-02-12 03:54:17','2024-02-12 03:54:17','Uc49379','1','10'),(48,5.00,'hassan','I1234',20,1,'2024-02-14 20:34:17','2024-02-14 20:34:17','Uc49379','1','10'),(50,175.00,'khalid',NULL,12,10,'2024-02-15 21:53:14','2024-02-15 21:53:14',NULL,'0','10'),(51,320.00,'aziz',NULL,13,10,'2024-02-15 21:54:20','2024-02-15 21:54:20',NULL,'0','10'),(52,45.00,'anouar',NULL,14,10,'2024-02-15 21:54:40','2024-02-15 21:54:40',NULL,'0','10'),(53,308.00,'anouar','I1234',15,10,'2024-02-15 21:55:14','2024-02-15 21:55:14','Uc49379','0','10'),(54,188.00,'anouar',NULL,16,10,'2024-02-15 21:55:52','2024-02-15 21:55:52',NULL,'0','10'),(55,65.00,'anouar','I1234',17,10,'2024-02-15 21:56:17','2024-02-15 21:56:17','Uc49379','0','10'),(56,30.00,'aziz',NULL,18,10,'2024-02-15 21:56:42','2024-02-15 21:56:42',NULL,'0','10'),(57,3.00,'bouaalam','I1234',19,10,'2024-02-15 21:56:56','2024-02-15 21:56:56','Uc49379','0','10'),(58,600.00,'aziz','I1234',17,10,'2024-02-15 21:57:34','2024-02-15 21:57:34','Uc49379','0','10'),(59,405.00,'anouar',NULL,14,10,'2024-02-15 21:58:40','2024-02-15 21:58:40',NULL,'1','10'),(69,200.00,'hassan','I1234',20,1,'2024-03-01 12:35:22','2024-03-01 12:35:22','Uc49379','0','10'),(70,5.00,'hassan','I1234',8,1,'2024-05-13 14:20:59','2024-05-13 14:20:59','Uc49379','1','10');
/*!40000 ALTER TABLE `caisseretour` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `chauffeurs`
--

DROP TABLE IF EXISTS `chauffeurs`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `chauffeurs` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `cin` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `matricule` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `idclient` bigint(20) unsigned NOT NULL,
  `iduser` bigint(20) unsigned NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `phone` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `chauffeurs_idclient_foreign` (`idclient`),
  KEY `chauffeurs_iduser_foreign` (`iduser`),
  CONSTRAINT `chauffeurs_idclient_foreign` FOREIGN KEY (`idclient`) REFERENCES `clients` (`id`) ON DELETE CASCADE,
  CONSTRAINT `chauffeurs_iduser_foreign` FOREIGN KEY (`iduser`) REFERENCES `users` (`id`) ON DELETE CASCADE
) ENGINE=InnoDB AUTO_INCREMENT=12 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `chauffeurs`
--

LOCK TABLES `chauffeurs` WRITE;
/*!40000 ALTER TABLE `chauffeurs` DISABLE KEYS */;
INSERT INTO `chauffeurs` VALUES (5,'hassan','Uc49379','I1234',8,1,'2024-02-01 00:12:15','2024-02-01 00:12:15','0662075492'),(6,'khalid','Uc49379','I1234',8,1,'2024-02-01 00:12:30','2024-02-01 00:12:30','0662075492'),(7,'aziz','Uc49379','I1234',8,1,'2024-02-01 00:12:47','2024-02-01 00:12:47','0662075492'),(8,'anouar','Uc49379','I1234',8,1,'2024-02-01 00:12:58','2024-02-01 00:12:58','0662075492'),(9,'bouaalam','Uc49379','I1234',8,1,'2024-02-01 00:13:10','2024-02-01 00:13:10','0662075492'),(10,'bouchaib assouissa','WB87311','29404/B/6',8,11,'2024-02-03 18:41:22','2024-02-03 18:41:22','0637612613'),(11,'said koundi','d382999','75637/a/40',8,11,'2024-02-21 20:39:07','2024-02-21 20:39:07','0661690949');
/*!40000 ALTER TABLE `chauffeurs` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `clients`
--

DROP TABLE IF EXISTS `clients`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `clients` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `nom` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `prenom` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `address` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `phone` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `reste` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `cin` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=23 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `clients`
--

LOCK TABLES `clients` WRITE;
/*!40000 ALTER TABLE `clients` DISABLE KEYS */;
INSERT INTO `clients` VALUES (8,'abbadi','hassan','agourai','0662075492','2024-02-01 00:08:23','2024-02-01 00:08:23','0','Y1234'),(9,'hammou','brahim','midelt','0662075492','2024-02-01 00:09:16','2024-02-01 00:09:16','-1','Y1234'),(10,'ojuik','driss','midelt','0662075492','2024-02-01 00:09:36','2024-02-01 00:09:36','-1','Y1234'),(11,'bouanaia','rachid','midelt','0662075492','2024-02-01 00:10:29','2024-02-01 00:10:29','-1','Y1234'),(12,'bssal','1','midelt','0662075492','2024-02-11 15:08:32','2024-02-11 15:08:32','0','Y1234'),(13,'bssal','2','midelt','0662075492','2024-02-11 15:08:50','2024-02-11 15:08:50','0','Y1234'),(14,'fttah','1','midelt','0662075492','2024-02-11 15:09:08','2024-02-11 15:09:08','-1','Y1234'),(15,'fttah','2','midelt','0662075492','2024-02-11 15:09:17','2024-02-11 15:09:17','1','Y1234'),(16,'fttah','3','midelt','0662075492','2024-02-11 15:09:28','2024-02-11 15:09:28','-1','Y1234'),(17,'boteyeb','1','midelt','0662075492','2024-02-11 15:09:49','2024-02-11 15:09:49','-1','Y1234'),(18,'boteyeb','2','midelt','0662075492','2024-02-11 15:09:56','2024-02-11 15:09:56','0','Y1234'),(19,'boteyeb','3','midelt','0662075492','2024-02-11 15:10:05','2024-02-11 15:10:05','1','Y1234'),(20,'test','test','KENITRA','01122333455','2024-02-11 18:01:23','2024-02-11 18:01:23','2','G123'),(21,'Ahouich','ali','midelt','0661871796','2024-02-14 19:44:21','2024-02-14 19:44:21','-1','VA21562'),(22,'Barghout','rachid','coop sidi larbi mejjat meknes','0661494677','2024-02-21 20:36:55','2024-02-21 20:36:55',NULL,'D4256874');
/*!40000 ALTER TABLE `clients` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `compagnies`
--

DROP TABLE IF EXISTS `compagnies`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `compagnies` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `active` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=11 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `compagnies`
--

LOCK TABLES `compagnies` WRITE;
/*!40000 ALTER TABLE `compagnies` DISABLE KEYS */;
INSERT INTO `compagnies` VALUES (7,'teste','Deactivate','2024-02-01 03:52:18','2024-02-11 16:19:14'),(8,'teste 2','Deactivate','2024-02-02 23:35:55','2024-02-02 23:35:55'),(9,'teste youssef','Deactivate','2024-02-11 15:07:11','2024-02-14 19:40:05'),(10,'youssef teste 2','Active','2024-02-12 03:20:44','2024-02-14 19:40:38');
/*!40000 ALTER TABLE `compagnies` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `failed_jobs`
--

DROP TABLE IF EXISTS `failed_jobs`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `failed_jobs` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `uuid` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `connection` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `queue` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `payload` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `exception` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `failed_at` timestamp NOT NULL DEFAULT current_timestamp(),
  PRIMARY KEY (`id`),
  UNIQUE KEY `failed_jobs_uuid_unique` (`uuid`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `failed_jobs`
--

LOCK TABLES `failed_jobs` WRITE;
/*!40000 ALTER TABLE `failed_jobs` DISABLE KEYS */;
/*!40000 ALTER TABLE `failed_jobs` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `historique`
--

DROP TABLE IF EXISTS `historique`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `historique` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `dateoperation` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `client` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `entree` decimal(10,2) DEFAULT 0.00,
  `sortie` decimal(10,2) DEFAULT 0.00,
  `status` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `total` decimal(10,2) DEFAULT 0.00,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=142 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `historique`
--

LOCK TABLES `historique` WRITE;
/*!40000 ALTER TABLE `historique` DISABLE KEYS */;
INSERT INTO `historique` VALUES (74,'2024-02-01','abbadi hassan',15.00,0.00,'ME',935.00,'2024-02-01 16:57:15','2024-02-01 16:57:15'),(75,'2024-02-02','abbadi hassan',0.00,2.00,'MS',-2.00,'2024-02-01 17:00:24','2024-02-01 17:00:24'),(76,'2024-02-02','abbadi hassan',0.00,5.00,'MS',0.00,'2024-02-01 17:01:09','2024-02-01 17:01:09'),(77,'2024-02-01','bouanaia rachid',500.00,0.00,'ME',0.00,'2024-02-01 19:07:54','2024-02-01 19:07:54'),(78,'2024-02-01','abbadi hassan',420.00,0.00,'ME',0.00,'2024-02-01 19:08:04','2024-02-01 19:08:04'),(79,'2024-02-02','bouanaia rachid',0.00,175.00,'MS',0.00,'2024-02-01 19:42:55','2024-02-01 19:42:55'),(80,'2024-02-03','ojuik driss',465.00,0.00,'ME',965.00,'2024-02-03 18:52:22','2024-02-03 18:52:22'),(81,'2024-02-03','ojuik driss',500.00,0.00,'ME',0.00,'2024-02-03 19:40:13','2024-02-03 19:40:13'),(82,'2024-02-06','abbadi hassan',10.00,0.00,'ME',10.00,'2024-02-06 16:25:15','2024-02-06 16:25:15'),(83,'2024-02-07','abbadi hassan',0.00,10.00,'MS',-10.00,'2024-02-06 16:55:44','2024-02-06 16:55:44'),(84,'2024-02-11','bssal 1',900.00,0.00,'ME',5741.00,'2024-02-11 17:12:10','2024-02-11 17:12:10'),(85,'2024-02-11','bssal 2',555.00,0.00,'ME',0.00,'2024-02-11 17:13:26','2024-02-11 17:13:26'),(86,'2024-02-12','bssal 1',0.00,9.00,'MS',-9.00,'2024-02-11 17:21:49','2024-02-11 17:21:49'),(87,'2024-02-11','test test',10.00,0.00,'ME',0.00,'2024-02-11 21:19:38','2024-02-11 21:19:38'),(88,'2024-02-11','test test',11.00,0.00,'ME',0.00,'2024-02-11 21:20:26','2024-02-11 21:20:26'),(89,'2024-02-12','test test',0.00,10.00,'MS',0.00,'2024-02-11 21:43:03','2024-02-11 21:43:03'),(90,'2024-02-11','bssal 1',210.00,0.00,'ME',0.00,'2024-02-12 03:30:19','2024-02-12 03:30:19'),(91,'2024-02-11','bssal 2',200.00,0.00,'ME',0.00,'2024-02-12 03:31:16','2024-02-12 03:31:16'),(92,'2024-02-11','fttah 1',555.00,0.00,'ME',0.00,'2024-02-12 03:34:41','2024-02-12 03:34:41'),(93,'2024-02-11','fttah 2',300.00,0.00,'ME',0.00,'2024-02-12 03:35:29','2024-02-12 03:35:29'),(94,'2024-02-11','fttah 3',600.00,0.00,'ME',0.00,'2024-02-12 03:36:29','2024-02-12 03:36:29'),(95,'2024-02-11','boteyeb 1',700.00,0.00,'ME',0.00,'2024-02-12 03:40:16','2024-02-12 03:40:16'),(96,'2024-02-11','boteyeb 2',800.00,0.00,'ME',0.00,'2024-02-12 03:41:01','2024-02-12 03:41:01'),(97,'2024-02-11','boteyeb 3',900.00,0.00,'ME',0.00,'2024-02-12 03:41:29','2024-02-12 03:41:29'),(98,'2024-02-12','bssal 1',0.00,33.00,'MS',0.00,'2024-02-12 03:42:54','2024-02-12 03:42:54'),(99,'2024-02-12','bssal 2',0.00,40.00,'MS',0.00,'2024-02-12 03:44:29','2024-02-12 03:44:29'),(100,'2024-02-12','fttah 1',0.00,300.00,'MS',0.00,'2024-02-12 03:45:22','2024-02-12 03:45:22'),(101,'2024-02-12','fttah 2',0.00,66.00,'MS',0.00,'2024-02-12 03:45:56','2024-02-12 03:45:56'),(102,'2024-02-12','fttah 3',0.00,10.00,'MS',0.00,'2024-02-12 03:46:40','2024-02-12 03:46:40'),(103,'2024-02-12','boteyeb 1',0.00,214.00,'MS',0.00,'2024-02-12 03:47:36','2024-02-12 03:47:36'),(104,'2024-02-12','boteyeb 2',0.00,302.00,'MS',0.00,'2024-02-12 03:49:01','2024-02-12 03:49:01'),(105,'2024-02-12','boteyeb 3',0.00,850.00,'MS',0.00,'2024-02-12 03:49:44','2024-02-12 03:49:44'),(106,'2024-02-13','bssal 1',454.00,0.00,'ME',2862.00,'2024-02-13 15:28:47','2024-02-13 15:28:47'),(107,'2024-02-13','bssal 2',78.00,0.00,'ME',0.00,'2024-02-13 15:29:34','2024-02-13 15:29:34'),(108,'2024-02-13','fttah 1',566.00,0.00,'ME',0.00,'2024-02-13 15:31:24','2024-02-13 15:31:24'),(109,'2024-02-13','fttah 1',123.00,0.00,'ME',0.00,'2024-02-13 15:33:31','2024-02-13 15:33:31'),(110,'2024-02-13','boteyeb 1',256.00,0.00,'ME',0.00,'2024-02-13 15:34:09','2024-02-13 15:34:09'),(111,'2024-02-13','fttah 2',232.00,0.00,'ME',0.00,'2024-02-13 15:35:28','2024-02-13 15:35:28'),(112,'2024-02-13','fttah 3',154.00,0.00,'ME',0.00,'2024-02-13 15:36:44','2024-02-13 15:36:44'),(113,'2024-02-13','boteyeb 1',111.00,0.00,'ME',0.00,'2024-02-13 15:41:12','2024-02-13 15:41:12'),(114,'2024-02-13','boteyeb 2',232.00,0.00,'ME',0.00,'2024-02-13 15:42:37','2024-02-13 15:42:37'),(115,'2024-02-13','boteyeb 1',656.00,0.00,'ME',0.00,'2024-02-13 16:11:29','2024-02-13 16:11:29'),(116,'2024-02-14','bouanaia rachid',1000.00,0.00,'ME',5160.00,'2024-02-14 13:36:28','2024-02-14 13:36:28'),(117,'2024-02-14','bouanaia rachid',977.00,0.00,'ME',0.00,'2024-02-14 13:38:27','2024-02-14 13:38:27'),(118,'2024-02-14','Ahouich ali',3163.00,0.00,'ME',0.00,'2024-02-14 19:46:54','2024-02-14 19:46:54'),(119,'2024-02-14','test test',10.00,0.00,'ME',0.00,'2024-02-14 20:18:54','2024-02-14 20:18:54'),(120,'2024-02-14','test test',10.00,0.00,'ME',0.00,'2024-02-14 20:19:33','2024-02-14 20:19:33'),(121,'2024-02-15','test test',0.00,20.00,'MS',-20.00,'2024-02-14 20:24:37','2024-02-14 20:24:37'),(122,'2024-02-15','test test',0.00,20.00,'MS',0.00,'2024-02-14 20:25:09','2024-02-14 20:25:09'),(123,'2024-02-16','bssal 1',0.00,180.00,'MS',-180.00,'2024-02-15 21:34:13','2024-02-15 21:34:13'),(124,'2024-02-16','bssal 2',0.00,80.00,'MS',0.00,'2024-02-15 21:35:24','2024-02-15 21:35:24'),(125,'2024-02-16','fttah 1',0.00,62.00,'MS',0.00,'2024-02-15 21:36:22','2024-02-15 21:36:22'),(126,'2024-02-16','fttah 2',0.00,63.00,'MS',0.00,'2024-02-15 21:36:41','2024-02-15 21:36:41'),(127,'2024-02-16','fttah 2',0.00,390.00,'MS',0.00,'2024-02-15 21:37:36','2024-02-15 21:37:36'),(128,'2024-02-16','fttah 3',0.00,280.00,'MS',0.00,'2024-02-15 21:38:24','2024-02-15 21:38:24'),(129,'2024-02-16','boteyeb 1',0.00,253.00,'MS',0.00,'2024-02-15 21:39:19','2024-02-15 21:39:19'),(130,'2024-02-16','boteyeb 1',0.00,323.00,'MS',0.00,'2024-02-15 21:40:34','2024-02-15 21:40:34'),(131,'2024-02-16','boteyeb 2',0.00,230.00,'MS',0.00,'2024-02-15 21:41:26','2024-02-15 21:41:26'),(132,'2024-02-16','boteyeb 3',0.00,12.00,'MS',0.00,'2024-02-15 21:41:58','2024-02-15 21:41:58'),(133,'2024-02-21','hammou brahim',0.00,221.00,'MS',-221.00,'2024-02-20 17:04:11','2024-02-20 17:04:11'),(134,'2024-02-21','hammou brahim',0.00,235.00,'MS',0.00,'2024-02-20 17:05:27','2024-02-20 17:05:27'),(135,'2024-02-20','ojuik driss',15.00,0.00,'ME',140.00,'2024-02-20 17:08:05','2024-02-20 17:08:05'),(136,'2024-02-20','ojuik driss',125.00,0.00,'ME',0.00,'2024-02-20 17:09:34','2024-02-20 17:09:34'),(137,'2024-03-01','test test',100.00,0.00,'ME',100.00,'2024-03-01 12:34:56','2024-03-01 12:34:56'),(138,'2024-03-02','test test',0.00,50.00,'MS',-50.00,'2024-03-01 12:35:11','2024-03-01 12:35:11'),(139,'2024-05-11','hammou brahim',10.00,0.00,'ME',10.00,'2024-05-11 16:22:54','2024-05-11 16:22:54'),(140,'2024-05-13','abbadi hassan',5.00,0.00,'ME',5.00,'2024-05-13 14:20:18','2024-05-13 14:20:18'),(141,'2024-05-14','abbadi hassan',0.00,5.00,'MS',-5.00,'2024-05-13 14:20:41','2024-05-13 14:20:41');
/*!40000 ALTER TABLE `historique` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `infos`
--

DROP TABLE IF EXISTS `infos`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `infos` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `telephone` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `ice` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `if` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `capital` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `title` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `cb` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `societe` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `user_id` bigint(20) unsigned NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `infos_user_id_foreign` (`user_id`),
  CONSTRAINT `infos_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `infos`
--

LOCK TABLES `infos` WRITE;
/*!40000 ALTER TABLE `infos` DISABLE KEYS */;
INSERT INTO `infos` VALUES (4,'FRIGO AGOURAI','+212662075492','1234567890','12345','500000','FRIGO AGOURAI','12345566677888899','SOCIETE',1,'2024-01-31 23:52:05','2024-02-04 16:31:28');
/*!40000 ALTER TABLE `infos` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `lignemarchandisesortie`
--

DROP TABLE IF EXISTS `lignemarchandisesortie`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `lignemarchandisesortie` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `qte` decimal(10,2) DEFAULT NULL,
  `produit` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `idmarchandisesortie` bigint(20) unsigned NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `lignemarchandisesortie_idmarchandisesortie_foreign` (`idmarchandisesortie`),
  CONSTRAINT `lignemarchandisesortie_idmarchandisesortie_foreign` FOREIGN KEY (`idmarchandisesortie`) REFERENCES `marchandisesortie` (`id`) ON DELETE CASCADE
) ENGINE=InnoDB AUTO_INCREMENT=96 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `lignemarchandisesortie`
--

LOCK TABLES `lignemarchandisesortie` WRITE;
/*!40000 ALTER TABLE `lignemarchandisesortie` DISABLE KEYS */;
INSERT INTO `lignemarchandisesortie` VALUES (50,2.00,'pomme story',44,'2024-02-01 17:00:24','2024-02-01 17:00:24'),(54,10.00,'pomme délicieuse',47,'2024-02-06 16:55:44','2024-02-06 16:55:44'),(55,5.00,'oignon rouge',48,'2024-02-11 17:21:49','2024-02-11 17:21:49'),(56,4.00,'oignon rouge PC',48,'2024-02-11 17:21:49','2024-02-11 17:21:49'),(58,16.00,'oignon rouge',50,'2024-02-12 03:42:54','2024-02-12 03:42:54'),(59,17.00,'oignon rouge PC',50,'2024-02-12 03:42:54','2024-02-12 03:42:54'),(60,20.00,'oignon jaune',51,'2024-02-12 03:44:29','2024-02-12 03:44:29'),(61,20.00,'oignon jaune PC',51,'2024-02-12 03:44:29','2024-02-12 03:44:29'),(62,150.00,'pomme story',52,'2024-02-12 03:45:22','2024-02-12 03:45:22'),(63,150.00,'pomme story PC',52,'2024-02-12 03:45:22','2024-02-12 03:45:22'),(64,33.00,'pomme délicieuse',53,'2024-02-12 03:45:56','2024-02-12 03:45:56'),(65,33.00,'pomme délicieuse PC',53,'2024-02-12 03:45:56','2024-02-12 03:45:56'),(66,5.00,'pomme starking',54,'2024-02-12 03:46:40','2024-02-12 03:46:40'),(67,5.00,'pomme starking PC',54,'2024-02-12 03:46:40','2024-02-12 03:46:40'),(68,107.00,'pomme de terre spounta',55,'2024-02-12 03:47:36','2024-02-12 03:47:36'),(69,107.00,'pomme de terre sponta pc',55,'2024-02-12 03:47:36','2024-02-12 03:47:36'),(70,151.00,'pomme de terre rouge',56,'2024-02-12 03:49:01','2024-02-12 03:49:01'),(71,151.00,'pomme de terre rouge pc',56,'2024-02-12 03:49:01','2024-02-12 03:49:01'),(72,850.00,'pomme de terre rouge',57,'2024-02-12 03:49:44','2024-02-12 03:49:44'),(73,20.00,'pomme délicieuse ST',58,'2024-02-14 20:24:37','2024-02-14 20:24:37'),(74,20.00,'pomme starking',59,'2024-02-14 20:25:09','2024-02-14 20:25:09'),(75,90.00,'oignon rouge',60,'2024-02-15 21:34:13','2024-02-15 21:34:13'),(76,90.00,'oignon rouge PC',60,'2024-02-15 21:34:13','2024-02-15 21:34:13'),(77,40.00,'oignon jaune',61,'2024-02-15 21:35:24','2024-02-15 21:35:24'),(78,40.00,'oignon jaune PC',61,'2024-02-15 21:35:24','2024-02-15 21:35:24'),(79,62.00,'pomme story',62,'2024-02-15 21:36:22','2024-02-15 21:36:22'),(80,63.00,'pomme story PC',63,'2024-02-15 21:36:41','2024-02-15 21:36:41'),(81,195.00,'pomme délicieuse',64,'2024-02-15 21:37:36','2024-02-15 21:37:36'),(82,195.00,'pomme délicieuse PC',64,'2024-02-15 21:37:36','2024-02-15 21:37:36'),(83,140.00,'pomme starking',65,'2024-02-15 21:38:24','2024-02-15 21:38:24'),(84,140.00,'pomme starking PC',65,'2024-02-15 21:38:24','2024-02-15 21:38:24'),(85,126.00,'pomme de terre spounta',66,'2024-02-15 21:39:19','2024-02-15 21:39:19'),(86,127.00,'pomme de terre sponta pc',66,'2024-02-15 21:39:19','2024-02-15 21:39:19'),(87,161.00,'pomme de terre spounta',67,'2024-02-15 21:40:34','2024-02-15 21:40:34'),(88,162.00,'pomme de terre sponta pc',67,'2024-02-15 21:40:34','2024-02-15 21:40:34'),(89,115.00,'pomme de terre rouge',68,'2024-02-15 21:41:26','2024-02-15 21:41:26'),(90,115.00,'pomme de terre rouge pc',68,'2024-02-15 21:41:26','2024-02-15 21:41:26'),(91,12.00,'pomme de terre rouge',69,'2024-02-15 21:41:58','2024-02-15 21:41:58'),(92,221.00,'pomme délicieuse',70,'2024-02-20 17:04:11','2024-02-20 17:04:11'),(93,235.00,'pomme story',71,'2024-02-20 17:05:27','2024-02-20 17:05:27'),(94,50.00,'pomme story PC',72,'2024-03-01 12:35:11','2024-03-01 12:35:11'),(95,5.00,'pomme story',73,'2024-05-13 14:20:41','2024-05-13 14:20:41');
/*!40000 ALTER TABLE `lignemarchandisesortie` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `lignemarchentree`
--

DROP TABLE IF EXISTS `lignemarchentree`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `lignemarchentree` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `produit` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `qteentree` decimal(10,2) DEFAULT NULL,
  `marchentree_id` bigint(20) unsigned NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `lignemarchentree_marchentree_id_foreign` (`marchentree_id`),
  CONSTRAINT `lignemarchentree_marchentree_id_foreign` FOREIGN KEY (`marchentree_id`) REFERENCES `marchentree` (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=130 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `lignemarchentree`
--

LOCK TABLES `lignemarchentree` WRITE;
/*!40000 ALTER TABLE `lignemarchentree` DISABLE KEYS */;
INSERT INTO `lignemarchentree` VALUES (71,'pomme délicieuse',300.00,56,'2024-02-01 19:08:04','2024-02-01 19:08:04'),(72,'pomme story PC',120.00,56,'2024-02-01 19:08:04','2024-02-01 19:08:04'),(73,'pomme délicieuse',145.00,57,'2024-02-03 18:52:22','2024-02-03 18:52:22'),(74,'pomme golden PC',100.00,57,'2024-02-03 18:52:22','2024-02-03 18:52:22'),(75,'pomme golden',220.00,57,'2024-02-03 18:52:22','2024-02-03 18:52:22'),(76,'pomme story ST',50.00,58,'2024-02-03 19:40:13','2024-02-03 19:40:13'),(77,'pomme story PC',150.00,58,'2024-02-03 19:40:13','2024-02-03 19:40:13'),(78,'pomme story',300.00,58,'2024-02-03 19:40:13','2024-02-03 19:40:13'),(79,'oignon rouge',10.00,59,'2024-02-06 16:25:15','2024-02-06 16:25:15'),(80,'oignon rouge PC',450.00,60,'2024-02-11 17:12:10','2024-02-11 17:12:10'),(81,'oignon rouge',450.00,60,'2024-02-11 17:12:10','2024-02-11 17:12:10'),(82,'oignon jaune PC',278.00,61,'2024-02-11 17:13:26','2024-02-11 17:13:26'),(83,'oignon jaune',277.00,61,'2024-02-11 17:13:26','2024-02-11 17:13:26'),(86,'oignon rouge PC',105.00,66,'2024-02-12 03:30:19','2024-02-12 03:30:19'),(87,'oignon rouge',105.00,66,'2024-02-12 03:30:19','2024-02-12 03:30:19'),(88,'oignon jaune PC',100.00,67,'2024-02-12 03:31:16','2024-02-12 03:31:16'),(89,'oignon jaune',100.00,67,'2024-02-12 03:31:16','2024-02-12 03:31:16'),(90,'pomme story PC',255.00,68,'2024-02-12 03:34:41','2024-02-12 03:34:41'),(91,'pomme story',300.00,68,'2024-02-12 03:34:41','2024-02-12 03:34:41'),(92,'pomme délicieuse PC',150.00,69,'2024-02-12 03:35:29','2024-02-12 03:35:29'),(93,'pomme délicieuse',150.00,69,'2024-02-12 03:35:29','2024-02-12 03:35:29'),(94,'pomme starking PC',300.00,70,'2024-02-12 03:36:29','2024-02-12 03:36:29'),(95,'pomme starking',300.00,70,'2024-02-12 03:36:29','2024-02-12 03:36:29'),(96,'pomme de terre sponta pc',350.00,71,'2024-02-12 03:40:16','2024-02-12 03:40:16'),(97,'pomme de terre spounta',350.00,71,'2024-02-12 03:40:16','2024-02-12 03:40:16'),(98,'pomme de terre rouge pc',400.00,72,'2024-02-12 03:41:01','2024-02-12 03:41:01'),(99,'pomme de terre rouge',400.00,72,'2024-02-12 03:41:01','2024-02-12 03:41:01'),(100,'pomme de terre rouge',900.00,73,'2024-02-12 03:41:29','2024-02-12 03:41:29'),(101,'oignon rouge PC',227.00,74,'2024-02-13 15:28:47','2024-02-13 15:28:47'),(102,'oignon rouge',227.00,74,'2024-02-13 15:28:47','2024-02-13 15:28:47'),(103,'oignon jaune PC',39.00,75,'2024-02-13 15:29:34','2024-02-13 15:29:34'),(104,'oignon jaune',39.00,75,'2024-02-13 15:29:34','2024-02-13 15:29:34'),(107,'pomme story PC',62.00,77,'2024-02-13 15:33:31','2024-02-13 15:33:31'),(108,'pomme story',61.00,77,'2024-02-13 15:33:31','2024-02-13 15:33:31'),(110,'pomme délicieuse PC',116.00,79,'2024-02-13 15:35:28','2024-02-13 15:35:28'),(111,'pomme délicieuse',116.00,79,'2024-02-13 15:35:28','2024-02-13 15:35:28'),(112,'pomme starking PC',77.00,80,'2024-02-13 15:36:44','2024-02-13 15:36:44'),(113,'pomme starking',77.00,80,'2024-02-13 15:36:44','2024-02-13 15:36:44'),(114,'pomme de terre sponta pc',111.00,81,'2024-02-13 15:41:12','2024-02-13 15:41:12'),(115,'pomme de terre rouge pc',116.00,82,'2024-02-13 15:42:37','2024-02-13 15:42:37'),(116,'pomme de terre rouge',116.00,82,'2024-02-13 15:42:37','2024-02-13 15:42:37'),(117,'pomme de terre rouge',656.00,83,'2024-02-13 16:11:29','2024-02-13 16:11:29'),(118,'pomme golden',1000.00,84,'2024-02-14 13:36:28','2024-02-14 13:36:28'),(119,'pomme délicieuse PC',377.00,85,'2024-02-14 13:38:27','2024-02-14 13:38:27'),(120,'pomme délicieuse',600.00,85,'2024-02-14 13:38:27','2024-02-14 13:38:27'),(121,'pomme délicieuse',700.00,86,'2024-02-14 19:46:54','2024-02-14 19:46:54'),(122,'pomme golden',2463.00,86,'2024-02-14 19:46:54','2024-02-14 19:46:54'),(123,'pomme story',10.00,87,'2024-02-14 20:18:54','2024-02-14 20:18:54'),(124,'pomme story',10.00,88,'2024-02-14 20:19:33','2024-02-14 20:19:33'),(126,NULL,125.00,90,'2024-02-20 17:09:34','2024-02-20 17:09:34'),(127,'pomme story',100.00,91,'2024-03-01 12:34:55','2024-03-01 12:34:55'),(128,'pomme story',10.00,92,'2024-05-11 16:22:54','2024-05-11 16:22:54'),(129,'pomme story PC',5.00,93,'2024-05-13 14:20:18','2024-05-13 14:20:18');
/*!40000 ALTER TABLE `lignemarchentree` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `listorigins`
--

DROP TABLE IF EXISTS `listorigins`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `listorigins` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `title` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=26 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `listorigins`
--

LOCK TABLES `listorigins` WRITE;
/*!40000 ALTER TABLE `listorigins` DISABLE KEYS */;
INSERT INTO `listorigins` VALUES (6,'pomme story','2024-01-31 23:54:32','2024-01-31 23:54:32'),(7,'pomme story PC','2024-01-31 23:54:48','2024-01-31 23:54:48'),(8,'pomme story ST','2024-01-31 23:54:58','2024-01-31 23:54:58'),(9,'pomme délicieuse','2024-01-31 23:56:04','2024-01-31 23:56:04'),(10,'pomme délicieuse PC','2024-01-31 23:56:17','2024-01-31 23:56:17'),(11,'pomme délicieuse ST','2024-01-31 23:56:28','2024-01-31 23:56:28'),(12,'pomme starking','2024-01-31 23:57:53','2024-01-31 23:57:53'),(13,'pomme starking PC','2024-01-31 23:58:11','2024-01-31 23:58:11'),(14,'pomme starking ST','2024-01-31 23:58:21','2024-01-31 23:58:21'),(15,'pomme golden','2024-01-31 23:59:08','2024-01-31 23:59:08'),(16,'pomme golden PC','2024-01-31 23:59:22','2024-01-31 23:59:22'),(17,'pomme golden ST','2024-01-31 23:59:34','2024-01-31 23:59:34'),(18,'oignon rouge','2024-02-01 00:00:08','2024-02-01 00:00:08'),(19,'oignon rouge PC','2024-02-01 00:00:23','2024-02-01 00:00:23'),(20,'oignon jaune','2024-02-01 00:01:17','2024-02-01 00:01:50'),(21,'oignon jaune PC','2024-02-01 00:02:05','2024-02-01 00:02:05'),(22,'pomme de terre spounta','2024-02-12 03:38:09','2024-02-12 03:38:09'),(23,'pomme de terre sponta pc','2024-02-12 03:38:41','2024-02-12 03:38:41'),(24,'pomme de terre rouge','2024-02-12 03:38:59','2024-02-12 03:38:59'),(25,'pomme de terre rouge pc','2024-02-12 03:39:18','2024-02-12 03:39:18');
/*!40000 ALTER TABLE `listorigins` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `marchandisesortie`
--

DROP TABLE IF EXISTS `marchandisesortie`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `marchandisesortie` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `totalsortie` decimal(10,2) DEFAULT NULL,
  `idclient` bigint(20) unsigned NOT NULL,
  `iduser` bigint(20) unsigned NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `matricule` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `chauffeur` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `cin` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `cloturer` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT '0',
  `compagnie` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `marchandisesortie_idclient_foreign` (`idclient`),
  KEY `marchandisesortie_iduser_foreign` (`iduser`),
  CONSTRAINT `marchandisesortie_idclient_foreign` FOREIGN KEY (`idclient`) REFERENCES `clients` (`id`) ON DELETE CASCADE,
  CONSTRAINT `marchandisesortie_iduser_foreign` FOREIGN KEY (`iduser`) REFERENCES `users` (`id`) ON DELETE CASCADE
) ENGINE=InnoDB AUTO_INCREMENT=74 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `marchandisesortie`
--

LOCK TABLES `marchandisesortie` WRITE;
/*!40000 ALTER TABLE `marchandisesortie` DISABLE KEYS */;
INSERT INTO `marchandisesortie` VALUES (44,2.00,8,1,'2024-02-01 17:00:24','2024-02-01 17:00:24','I1234','hassan','Uc49379','1','7'),(47,10.00,8,1,'2024-02-06 16:55:44','2024-02-06 16:55:44','I1234','hassan','Uc49379','1','7'),(48,9.00,12,10,'2024-02-11 17:21:49','2024-02-11 17:21:49','I1234','aziz','Uc49379','1','9'),(50,33.00,12,10,'2024-02-12 03:42:54','2024-02-12 03:42:54','I1234','aziz','Uc49379','1','10'),(51,40.00,13,10,'2024-02-12 03:44:29','2024-02-12 03:44:29','I1234','anouar','Uc49379','1','10'),(52,300.00,14,10,'2024-02-12 03:45:22','2024-02-12 03:45:22','I1234','anouar','Uc49379','1','10'),(53,66.00,15,10,'2024-02-12 03:45:56','2024-02-12 03:45:56','I1234','anouar','Uc49379','0','10'),(54,10.00,16,10,'2024-02-12 03:46:40','2024-02-12 03:46:40','I1234','anouar','Uc49379','0','10'),(55,214.00,17,10,'2024-02-12 03:47:36','2024-02-12 03:47:36','I1234','anouar','Uc49379','1','10'),(56,302.00,18,10,'2024-02-12 03:49:01','2024-02-12 03:49:01','I1234','bouaalam','Uc49379','0','10'),(57,850.00,19,10,'2024-02-12 03:49:44','2024-02-12 03:49:44','I1234','bouaalam','Uc49379','1','10'),(58,20.00,20,1,'2024-02-14 20:24:37','2024-02-14 20:24:37','I1234','hassan','Uc49379','0','10'),(59,20.00,20,1,'2024-02-14 20:25:09','2024-02-14 20:25:09','I1234','hassan','Uc49379','1','10'),(60,180.00,12,10,'2024-02-15 21:34:13','2024-02-15 21:34:13','I1234','khalid','Uc49379','0','10'),(61,80.00,13,10,'2024-02-15 21:35:24','2024-02-15 21:35:24','I1234','aziz','Uc49379','0','10'),(62,62.00,14,10,'2024-02-15 21:36:22','2024-02-15 21:36:22','I1234','aziz','Uc49379','0','10'),(63,63.00,15,10,'2024-02-15 21:36:41','2024-02-15 21:36:41','I1234','aziz','Uc49379','0','10'),(64,390.00,15,10,'2024-02-15 21:37:36','2024-02-15 21:37:36','I1234','aziz','Uc49379','0','10'),(65,280.00,16,10,'2024-02-15 21:38:24','2024-02-15 21:38:24','I1234','aziz','Uc49379','0','10'),(66,253.00,17,10,'2024-02-15 21:39:19','2024-02-15 21:39:19','I1234','aziz','Uc49379','0','10'),(67,323.00,17,10,'2024-02-15 21:40:34','2024-02-15 21:40:34','I1234','aziz','Uc49379','0','10'),(68,230.00,18,10,'2024-02-15 21:41:26','2024-02-15 21:41:26','I1234','aziz','Uc49379','0','10'),(69,12.00,19,10,'2024-02-15 21:41:58','2024-02-15 21:41:58','I1234','aziz','Uc49379','1','10'),(70,221.00,9,10,'2024-02-20 17:04:11','2024-02-20 17:04:11','I1234','khalid','Uc49379','0','10'),(71,235.00,9,10,'2024-02-20 17:05:27','2024-02-20 17:05:27','I1234','aziz','Uc49379','0','10'),(72,50.00,20,1,'2024-03-01 12:35:11','2024-03-01 12:35:11','I1234','khalid','Uc49379','0','10'),(73,5.00,8,1,'2024-05-13 14:20:41','2024-05-13 14:20:41','I1234','hassan','Uc49379','1','10');
/*!40000 ALTER TABLE `marchandisesortie` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `marchentree`
--

DROP TABLE IF EXISTS `marchentree`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `marchentree` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `totalentree` decimal(10,2) DEFAULT NULL,
  `user_id` bigint(20) unsigned NOT NULL,
  `client_id` bigint(20) unsigned NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `matricule` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `chauffeur` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `cin` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `cloturer` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT '0',
  `compagnie` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `marchentree_user_id_foreign` (`user_id`),
  KEY `marchentree_client_id_foreign` (`client_id`),
  CONSTRAINT `marchentree_client_id_foreign` FOREIGN KEY (`client_id`) REFERENCES `clients` (`id`),
  CONSTRAINT `marchentree_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=94 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `marchentree`
--

LOCK TABLES `marchentree` WRITE;
/*!40000 ALTER TABLE `marchentree` DISABLE KEYS */;
INSERT INTO `marchentree` VALUES (56,420.00,10,8,'2024-02-01 19:08:04','2024-02-01 19:08:04','I1234','aziz','Uc49379','1','7'),(57,465.00,11,10,'2024-02-03 18:52:22','2024-02-03 18:52:22','29404/B/6','bouchaib assouissa','WB87311','1','7'),(58,500.00,11,10,'2024-02-03 19:40:13','2024-02-03 19:40:13','29404/B/6','bouchaib assouissa','WB87311','1','7'),(59,10.00,1,8,'2024-02-06 16:25:15','2024-02-06 16:25:15','I1234','hassan','Uc49379','1','7'),(60,900.00,10,12,'2024-02-11 17:12:10','2024-02-11 17:12:10','I1234','aziz','Uc49379','0','9'),(61,555.00,10,13,'2024-02-11 17:13:26','2024-02-11 17:13:26','I1234','aziz','Uc49379','1','9'),(66,210.00,10,12,'2024-02-12 03:30:19','2024-02-12 03:30:19','I1234','khalid','Uc49379','1','10'),(67,200.00,10,13,'2024-02-12 03:31:16','2024-02-12 03:31:16','I1234','khalid','Uc49379','0','10'),(68,555.00,10,14,'2024-02-12 03:34:41','2024-02-12 03:34:41','I1234','khalid','Uc49379','0','10'),(69,300.00,10,15,'2024-02-12 03:35:29','2024-02-12 03:35:29','I1234','anouar','Uc49379','1','10'),(70,600.00,10,16,'2024-02-12 03:36:29','2024-02-12 03:36:29','I1234','anouar','Uc49379','1','10'),(71,700.00,10,17,'2024-02-12 03:40:16','2024-02-12 03:40:16','I1234','aziz','Uc49379','0','10'),(72,800.00,10,18,'2024-02-12 03:41:01','2024-02-12 03:41:01','I1234','bouaalam','Uc49379','0','10'),(73,900.00,10,19,'2024-02-12 03:41:29','2024-02-12 03:41:29','I1234','aziz','Uc49379','1','10'),(74,454.00,10,12,'2024-02-13 15:28:47','2024-02-13 15:28:47','I1234','khalid','Uc49379','0','10'),(75,78.00,10,13,'2024-02-13 15:29:34','2024-02-13 15:29:34','I1234','anouar','Uc49379','1','10'),(77,123.00,10,14,'2024-02-13 15:33:31','2024-02-13 15:33:31','I1234','aziz','Uc49379','1','10'),(79,232.00,10,15,'2024-02-13 15:35:28','2024-02-13 15:35:28','I1234','aziz','Uc49379','1','10'),(80,154.00,10,16,'2024-02-13 15:36:44','2024-02-13 15:36:44','I1234','khalid','Uc49379','0','10'),(81,111.00,10,17,'2024-02-13 15:41:12','2024-02-13 15:41:12','I1234','hassan','Uc49379','0','10'),(82,232.00,10,18,'2024-02-13 15:42:37','2024-02-13 15:42:37','I1234','anouar','Uc49379','0','10'),(83,656.00,10,17,'2024-02-13 16:11:29','2024-02-13 16:11:29','I1234','aziz','Uc49379','0','10'),(84,1000.00,11,11,'2024-02-14 13:36:28','2024-02-14 13:36:28','I1234','khalid','Uc49379','1','10'),(85,977.00,11,11,'2024-02-14 13:38:27','2024-02-14 13:38:27','I1234','khalid','Uc49379','1','10'),(86,3163.00,11,21,'2024-02-14 19:46:54','2024-02-14 19:46:54','I1234','hassan','Uc49379','0','10'),(87,10.00,1,20,'2024-02-14 20:18:54','2024-02-14 20:18:54','I1234','hassan','Uc49379','1','10'),(88,10.00,1,20,'2024-02-14 20:19:33','2024-02-14 20:19:33','I1234','hassan','Uc49379','1','10'),(90,125.00,10,10,'2024-02-20 17:09:34','2024-02-20 17:09:34','I1234','khalid','Uc49379','1','10'),(91,100.00,1,20,'2024-03-01 12:34:55','2024-03-01 12:34:55','I1234','hassan','Uc49379','0','10'),(92,10.00,1,9,'2024-05-11 16:22:54','2024-05-11 16:22:54','I1234','khalid','Uc49379','0','10'),(93,5.00,1,8,'2024-05-13 14:20:18','2024-05-13 14:20:18','I1234','hassan','Uc49379','1','10');
/*!40000 ALTER TABLE `marchentree` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `marchsorites`
--

DROP TABLE IF EXISTS `marchsorites`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `marchsorites` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `nbbox` decimal(10,2) DEFAULT NULL,
  `is_retour` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT '0',
  `user_id` bigint(20) unsigned NOT NULL,
  `client_id` bigint(20) unsigned NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `reste` decimal(10,2) DEFAULT NULL,
  `matricule` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `chauffeur` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `cin` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `cloturer` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT '0',
  `compagnie` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `marchsorites_user_id_foreign` (`user_id`),
  KEY `marchsorites_client_id_foreign` (`client_id`),
  CONSTRAINT `marchsorites_client_id_foreign` FOREIGN KEY (`client_id`) REFERENCES `clients` (`id`),
  CONSTRAINT `marchsorites_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=130 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `marchsorites`
--

LOCK TABLES `marchsorites` WRITE;
/*!40000 ALTER TABLE `marchsorites` DISABLE KEYS */;
INSERT INTO `marchsorites` VALUES (65,7000.00,'2',11,11,'2024-02-01 19:04:37','2024-02-01 19:04:37',4523.00,'I1234','hassan','Uc49379','1','7'),(73,100.00,'1',10,12,'2024-02-11 16:37:54','2024-02-11 16:37:54',0.00,'I1234','hassan','Uc49379','1','9'),(74,555.00,'1',10,13,'2024-02-11 16:38:09','2024-02-11 16:38:09',0.00,'I1234','hassan','Uc49379','0','9'),(75,655.00,'2',10,14,'2024-02-11 16:38:30','2024-02-11 16:38:30',0.00,'I1234','hassan','Uc49379','0','9'),(76,319.00,'2',10,15,'2024-02-11 16:38:43','2024-02-11 16:38:43',0.00,'I1234','hassan','Uc49379','0','9'),(77,647.00,'2',10,16,'2024-02-11 16:39:06','2024-02-11 16:39:06',0.00,'I1234','hassan','Uc49379','1','9'),(78,1089.00,'2',10,17,'2024-02-11 16:39:24','2024-02-11 16:43:52',0.00,'I1234','hassan','Uc49379','1','9'),(79,2016.00,'1',10,18,'2024-02-11 16:39:43','2024-02-11 16:39:43',984.00,'I1234','hassan','Uc49379','0','9'),(80,1550.00,'2',10,19,'2024-02-11 16:40:10','2024-02-11 16:40:10',650.00,'I1234','hassan','Uc49379','1','9'),(84,300.00,'1',10,12,'2024-02-12 03:22:33','2024-02-12 03:22:33',0.00,'I1234','khalid','Uc49379','1','10'),(85,555.00,'1',10,13,'2024-02-12 03:23:01','2024-02-12 03:26:57',222.00,'I1234','hassan','Uc49379','0','10'),(86,655.00,'2',10,14,'2024-02-12 03:23:26','2024-02-12 03:23:26',66.00,'I1234','khalid','Uc49379','0','10'),(87,319.00,'2',10,15,'2024-02-12 03:23:51','2024-02-12 03:23:51',106.00,'I1234','anouar','Uc49379','0','10'),(88,647.00,'2',10,16,'2024-02-12 03:24:11','2024-02-12 03:24:11',540.00,'I1234','anouar','Uc49379','1','10'),(89,1089.00,'2',10,17,'2024-02-12 03:24:30','2024-02-12 03:24:30',0.00,'I1234','bouaalam','Uc49379','0','10'),(90,2016.00,'1',10,18,'2024-02-12 03:24:51','2024-02-12 03:24:51',2016.00,'I1234','aziz','Uc49379','0','10'),(91,1550.00,'2',10,19,'2024-02-12 03:25:15','2024-02-12 03:25:15',1550.00,'I1234','bouaalam','Uc49379','0','10'),(94,240.00,'1',10,12,'2024-02-13 15:07:52','2024-02-13 15:07:52',0.00,'I1234','khalid','Uc49379','0','10'),(95,500.00,'1',10,13,'2024-02-13 15:08:23','2024-02-13 15:08:23',500.00,'I1234','aziz','Uc49379','0','10'),(96,566.00,'2',10,14,'2024-02-13 15:16:42','2024-02-13 15:16:42',566.00,'I1234','aziz','Uc49379','0','10'),(97,420.00,'2',10,15,'2024-02-13 15:17:07','2024-02-13 15:17:07',420.00,'I1234','anouar','Uc49379','0','10'),(98,333.00,'2',10,15,'2024-02-13 15:17:58','2024-02-13 15:18:45',647.00,'I1234','hassan','Uc49379','0','10'),(99,980.00,'2',10,17,'2024-02-13 15:18:31','2024-02-13 15:18:31',535.00,'I1234','khalid','Uc49379','0','10'),(100,325.00,'1',10,18,'2024-02-13 15:19:02','2024-02-13 15:19:02',325.00,'I1234','anouar','Uc49379','1','10'),(101,750.00,'0',10,19,'2024-02-13 15:19:26','2024-02-13 15:19:26',750.00,'I1234','anouar','Uc49379','1','10'),(102,10.00,'2',1,20,'2024-02-14 17:50:24','2024-02-14 17:50:24',0.00,'I1234','hassan','Uc49379','1','10'),(104,10.00,'2',1,20,'2024-02-14 17:58:29','2024-02-14 17:58:29',0.00,'I1234','hassan','Uc49379','0','9'),(105,10.00,'2',1,20,'2024-02-14 17:59:27','2024-02-14 17:59:27',0.00,'I1234','hassan','Uc49379','1','9'),(106,313.00,'0',10,12,'2024-02-15 22:20:47','2024-02-15 22:20:47',313.00,'I1234','bouaalam','Uc49379','0','10'),(107,515.00,'0',10,13,'2024-02-15 22:21:07','2024-02-15 22:21:07',515.00,'I1234','aziz','Uc49379','0','10'),(110,458.00,'0',10,14,'2024-02-15 22:26:04','2024-02-15 22:26:04',458.00,'I1234','aziz','Uc49379','0','10'),(118,621.00,'0',10,15,'2024-02-15 22:28:29','2024-02-15 22:28:29',621.00,'I1234','hassan','Uc49379','0','10'),(119,444.00,'0',10,16,'2024-02-15 22:28:45','2024-02-15 22:28:45',444.00,'I1234','khalid','Uc49379','0','10'),(120,1200.00,'0',10,17,'2024-02-15 22:29:06','2024-02-15 22:29:06',1200.00,'I1234','aziz','Uc49379','0','10'),(121,980.00,'0',10,18,'2024-02-15 22:29:28','2024-02-15 22:29:28',980.00,'I1234','anouar','Uc49379','0','10'),(122,616.00,'0',10,19,'2024-02-15 22:29:46','2024-02-15 22:29:46',616.00,'I1234','anouar','Uc49379','1','10'),(123,10.00,'2',1,20,'2024-02-16 16:10:27','2024-02-16 16:10:27',0.00,'I1234','hassan','Uc49379','0','10'),(124,10.00,'2',1,20,'2024-02-16 16:10:46','2024-02-16 16:10:46',0.00,'I1234','hassan','Uc49379','0','10'),(125,12.00,'0',10,11,'2024-02-20 17:06:38','2024-02-20 17:06:38',12.00,'I1234','aziz','Uc49379','0','10'),(126,12.00,'0',10,11,'2024-02-20 17:06:53','2024-02-20 17:06:53',12.00,'I1234','anouar','Uc49379','0','10'),(127,512.00,'0',11,22,'2024-02-21 20:39:32','2024-02-21 20:39:32',512.00,'75637/a/40','said koundi','d382999','1','10'),(128,500.00,'2',1,20,'2024-03-01 12:34:37','2024-03-01 12:34:37',430.00,'I1234','hassan','Uc49379','0','10'),(129,10.00,'1',1,8,'2024-05-13 14:19:53','2024-05-13 14:19:53',5.00,'I1234','hassan','Uc49379','1','10');
/*!40000 ALTER TABLE `marchsorites` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `migrations`
--

DROP TABLE IF EXISTS `migrations`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `migrations` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `migration` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `batch` int(11) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=144 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `migrations`
--

LOCK TABLES `migrations` WRITE;
/*!40000 ALTER TABLE `migrations` DISABLE KEYS */;
INSERT INTO `migrations` VALUES (8,'2023_11_15_121946_create_stock_table',4),(9,'2023_11_15_125158_create_stock_table',5),(11,'2023_11_15_142945_create_marchsorites_table',7),(13,'2023_11_15_190933_create_tmpmarchentree_table',9),(28,'2023_11_30_130345_add_column_matricul_and_chuaffeur_marchandise_sortie',23),(29,'2023_11_30_131417_add_column_matricul_and_chuaffeur_marchandise_sortie',24),(69,'2023_12_01_154702_add_column__quantitie_entree',28),(71,'2023_12_01_160707_create_table__bons',30),(73,'2023_12_18_111624_create_chauffeurs_table',32),(74,'2023_12_18_112102_create_chauffeurs_table',33),(77,'2023_12_18_152345_create_boncaisseretour_table',36),(82,'2014_10_12_000000_create_users_table',37),(83,'2014_10_12_100000_create_password_reset_tokens_table',37),(84,'2014_10_12_100000_create_password_resets_table',37),(85,'2019_08_19_000000_create_failed_jobs_table',37),(86,'2019_12_14_000001_create_personal_access_tokens_table',37),(87,'2023_11_13_184207_create_permission_tables',37),(88,'2023_11_13_184722_create_clients_table',37),(89,'2023_11_15_125441_create_stock_table',37),(90,'2023_11_15_153710_create_marchsorties_table',37),(91,'2023_11_15_210639_create_marchentree_table',37),(92,'2023_11_15_210831_create_lignemarchentree_table',37),(93,'2023_11_15_211614_create_tmpmarchentree_table',37),(94,'2023_11_16_110648_add_reste_box',37),(95,'2023_11_17_135155_add_reste_bon_sortie',37),(96,'2023_11_20_110649_create_infos_table',37),(97,'2023_11_25_112238_create_tmpmarchandisesortie_table',37),(98,'2023_11_25_151135_create_marchandisesortie_table',37),(99,'2023_11_25_151345_create_lignemarchandisesortie_table',37),(100,'2023_11_28_145023_add_column_matricul_and_chuaffeur',37),(101,'2023_11_28_171118_create_listorigins_table',37),(102,'2023_11_29_124213_add_column_matricul_and_chuaffeur_marchandise_entree',37),(103,'2023_11_29_124732_add_column_matricul_and_chuaffeur_t_m_p_marchandise_entree',37),(104,'2023_11_30_123224_add_column_matricul_and_chuaffeur_t_m_p_marchandise_sortie',37),(105,'2023_11_30_131451_add_column_matricul_and_chuaffeur_marchandise_sortie',37),(106,'2023_11_30_140625_create_caisseretour_table',37),(107,'2023_11_30_184316_add_column_cin_client',37),(108,'2023_11_30_184353_add_column_cin_chauffeur_caisse_sortie',37),(109,'2023_11_30_184410_add_column_cin_chauffeur_marchandise_entree',37),(110,'2023_11_30_184421_add_column_cin_chauffeur_marchandise_sortie',37),(111,'2023_11_30_184436_add_column_cin_chauffeur_caisse_entree',37),(112,'2023_12_01_145527_add_column_cin_tmp_marchandise_sortie',37),(113,'2023_12_01_151011_add_column_cin_tmp_marchandise_entree',37),(114,'2023_12_01_154821_add_column__quantitie_entree',37),(115,'2023_12_01_161335_create_table_bons',37),(116,'2023_12_18_115719_create_chauffeurs_table',37),(117,'2023_12_18_151832_create_boncaissevides_table',37),(118,'2023_12_18_152504_create_boncaisseretour_table',37),(119,'2023_12_18_152728_create_bonmarchandiseentree_table',37),(120,'2023_12_18_153146_create_bonmarchandisesortie_table',37),(121,'2023_12_18_154149_cloturer_caisse_vide',37),(122,'2023_12_19_115229_add_column_cloturer_machandiseentree',38),(123,'2023_12_19_120802_add_column_cloturer_machandisesortie',39),(124,'2023_12_19_122541_add_column_cloturer_caisseretour',40),(125,'2023_12_22_145334_create_historique_table',41),(126,'2023_12_25_123942_create_table_cumlcaissevides',42),(127,'2023_12_25_125826_add_column_nombre_cuml_vide',43),(128,'2023_12_25_143836_create_table_cumlcaisseretours',44),(129,'2023_12_25_185242_add_column_phone_chuaffeur',45),(130,'2023_12_26_105555_create_table_compagnies',46),(131,'2023_12_26_114639_add_column_compagnie_caissesortie',47),(132,'2023_12_26_115110_add_column_compagnie_marchandiseentree',48),(133,'2023_12_26_115618_add_column_compagnie_marchandisesortie',49),(134,'2023_12_26_121647_add_column_compagnie_caisseretour',50),(135,'2023_12_26_122844_add_column_compagnie_table_cumlcaisse_retours',51),(136,'2023_12_26_123306_add_column_compagnie_table_cumlcaisse_vide',52),(137,'2023_12_26_151106_create_table_marchandiseentree',53),(138,'2023_12_26_151407_create_table_cumlmarchandiseentree',54),(139,'2023_12_26_160218_create_table_cumlmarchandisesortie',55),(140,'2024_01_02_120957_add_column_idcaissevide',56),(141,'2024_01_02_125948_add_column_idcaisseretour',57),(142,'2024_01_02_132559_add_column_idmarchandiseentre',58),(143,'2024_01_02_135120_add_column_idmarchandisesortie',59);
/*!40000 ALTER TABLE `migrations` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `model_has_permissions`
--

DROP TABLE IF EXISTS `model_has_permissions`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `model_has_permissions` (
  `permission_id` bigint(20) unsigned NOT NULL,
  `model_type` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `model_id` bigint(20) unsigned NOT NULL,
  PRIMARY KEY (`permission_id`,`model_id`,`model_type`),
  KEY `model_has_permissions_model_id_model_type_index` (`model_id`,`model_type`),
  CONSTRAINT `model_has_permissions_permission_id_foreign` FOREIGN KEY (`permission_id`) REFERENCES `permissions` (`id`) ON DELETE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `model_has_permissions`
--

LOCK TABLES `model_has_permissions` WRITE;
/*!40000 ALTER TABLE `model_has_permissions` DISABLE KEYS */;
/*!40000 ALTER TABLE `model_has_permissions` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `model_has_roles`
--

DROP TABLE IF EXISTS `model_has_roles`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `model_has_roles` (
  `role_id` bigint(20) unsigned NOT NULL,
  `model_type` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `model_id` bigint(20) unsigned NOT NULL,
  PRIMARY KEY (`role_id`,`model_id`,`model_type`),
  KEY `model_has_roles_model_id_model_type_index` (`model_id`,`model_type`),
  CONSTRAINT `model_has_roles_role_id_foreign` FOREIGN KEY (`role_id`) REFERENCES `roles` (`id`) ON DELETE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `model_has_roles`
--

LOCK TABLES `model_has_roles` WRITE;
/*!40000 ALTER TABLE `model_has_roles` DISABLE KEYS */;
INSERT INTO `model_has_roles` VALUES (1,'App\\Models\\User',1),(2,'App\\Models\\User',3),(2,'App\\Models\\User',10),(3,'App\\Models\\User',4),(3,'App\\Models\\User',9),(3,'App\\Models\\User',11);
/*!40000 ALTER TABLE `model_has_roles` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `password_reset_tokens`
--

DROP TABLE IF EXISTS `password_reset_tokens`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `password_reset_tokens` (
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `token` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`email`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `password_reset_tokens`
--

LOCK TABLES `password_reset_tokens` WRITE;
/*!40000 ALTER TABLE `password_reset_tokens` DISABLE KEYS */;
/*!40000 ALTER TABLE `password_reset_tokens` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `password_resets`
--

DROP TABLE IF EXISTS `password_resets`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `password_resets` (
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `token` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  KEY `password_resets_email_index` (`email`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `password_resets`
--

LOCK TABLES `password_resets` WRITE;
/*!40000 ALTER TABLE `password_resets` DISABLE KEYS */;
/*!40000 ALTER TABLE `password_resets` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `permissions`
--

DROP TABLE IF EXISTS `permissions`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `permissions` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `guard_name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `permissions_name_guard_name_unique` (`name`,`guard_name`)
) ENGINE=InnoDB AUTO_INCREMENT=23 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `permissions`
--

LOCK TABLES `permissions` WRITE;
/*!40000 ALTER TABLE `permissions` DISABLE KEYS */;
INSERT INTO `permissions` VALUES (1,'role-list','web','2023-12-02 13:42:47','2023-12-02 13:42:47'),(2,'role-create','web','2023-12-02 13:42:48','2023-12-02 13:42:48'),(3,'role-edit','web','2023-12-02 13:42:48','2023-12-02 13:42:48'),(4,'role-delete','web','2023-12-02 13:42:48','2023-12-02 13:42:48'),(5,'client-list','web','2023-12-02 13:42:48','2023-12-02 13:42:48'),(6,'client-create','web','2023-12-02 13:42:48','2023-12-02 13:42:48'),(7,'client-edit','web','2023-12-02 13:42:48','2023-12-02 13:42:48'),(8,'client-delete','web','2023-12-02 13:42:48','2023-12-02 13:42:48'),(9,'information','web',NULL,NULL),(10,'dashboard','web',NULL,NULL),(11,'users','web',NULL,NULL),(12,'clients','web',NULL,NULL),(13,'caisseSortie','web',NULL,NULL),(14,'caisseEntree','web',NULL,NULL),(15,'Marchentree','web',NULL,NULL),(16,'MarchSorite','web',NULL,NULL),(17,'stock','web',NULL,NULL),(18,'listOrigine','web',NULL,NULL),(19,'roles','web',NULL,NULL),(20,'chauffeur','web',NULL,NULL),(21,'compagnie','web',NULL,NULL),(22,'situation stokage','web',NULL,NULL);
/*!40000 ALTER TABLE `permissions` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `personal_access_tokens`
--

DROP TABLE IF EXISTS `personal_access_tokens`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `personal_access_tokens` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `tokenable_type` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `tokenable_id` bigint(20) unsigned NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `token` varchar(64) COLLATE utf8mb4_unicode_ci NOT NULL,
  `abilities` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `last_used_at` timestamp NULL DEFAULT NULL,
  `expires_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `personal_access_tokens_token_unique` (`token`),
  KEY `personal_access_tokens_tokenable_type_tokenable_id_index` (`tokenable_type`,`tokenable_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `personal_access_tokens`
--

LOCK TABLES `personal_access_tokens` WRITE;
/*!40000 ALTER TABLE `personal_access_tokens` DISABLE KEYS */;
/*!40000 ALTER TABLE `personal_access_tokens` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `role_has_permissions`
--

DROP TABLE IF EXISTS `role_has_permissions`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `role_has_permissions` (
  `permission_id` bigint(20) unsigned NOT NULL,
  `role_id` bigint(20) unsigned NOT NULL,
  PRIMARY KEY (`permission_id`,`role_id`),
  KEY `role_has_permissions_role_id_foreign` (`role_id`),
  CONSTRAINT `role_has_permissions_permission_id_foreign` FOREIGN KEY (`permission_id`) REFERENCES `permissions` (`id`) ON DELETE CASCADE,
  CONSTRAINT `role_has_permissions_role_id_foreign` FOREIGN KEY (`role_id`) REFERENCES `roles` (`id`) ON DELETE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `role_has_permissions`
--

LOCK TABLES `role_has_permissions` WRITE;
/*!40000 ALTER TABLE `role_has_permissions` DISABLE KEYS */;
INSERT INTO `role_has_permissions` VALUES (1,2),(2,2),(3,2),(4,1),(4,2),(5,2),(6,2),(6,3),(7,2),(8,2),(9,1),(9,2),(10,1),(10,2),(11,1),(11,2),(12,1),(12,2),(12,3),(13,1),(13,2),(13,3),(14,1),(14,2),(14,3),(15,1),(15,2),(15,3),(16,1),(16,2),(16,3),(17,1),(17,2),(18,1),(18,2),(19,1),(19,2),(20,1),(20,2),(20,3),(21,1),(21,2),(22,1),(22,2);
/*!40000 ALTER TABLE `role_has_permissions` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `roles`
--

DROP TABLE IF EXISTS `roles`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `roles` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `guard_name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `roles_name_guard_name_unique` (`name`,`guard_name`)
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `roles`
--

LOCK TABLES `roles` WRITE;
/*!40000 ALTER TABLE `roles` DISABLE KEYS */;
INSERT INTO `roles` VALUES (1,'AdminSuper','web','2023-12-18 17:04:54','2023-12-18 17:04:54'),(2,'Admin','web','2023-12-18 17:04:55','2023-12-18 17:04:55'),(3,'user','web','2023-12-19 11:18:10','2023-12-19 11:18:10');
/*!40000 ALTER TABLE `roles` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `stock`
--

DROP TABLE IF EXISTS `stock`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `stock` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `Capacitstock` decimal(10,2) DEFAULT NULL,
  `Quantitesortie` decimal(10,2) DEFAULT NULL,
  `Quantiteactuelle` decimal(10,2) DEFAULT NULL,
  `user_id` bigint(20) unsigned NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `QuantitieEntree` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `stock_user_id_foreign` (`user_id`),
  CONSTRAINT `stock_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `stock`
--

LOCK TABLES `stock` WRITE;
/*!40000 ALTER TABLE `stock` DISABLE KEYS */;
INSERT INTO `stock` VALUES (1,50000.00,6438.00,43562.00,1,'2023-12-18 17:42:00','2023-12-18 17:42:00','525');
/*!40000 ALTER TABLE `stock` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `table_bons`
--

DROP TABLE IF EXISTS `table_bons`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `table_bons` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `number` bigint(20) NOT NULL DEFAULT 0,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `table_bons`
--

LOCK TABLES `table_bons` WRITE;
/*!40000 ALTER TABLE `table_bons` DISABLE KEYS */;
/*!40000 ALTER TABLE `table_bons` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `table_cumlcaisseretours`
--

DROP TABLE IF EXISTS `table_cumlcaisseretours`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `table_cumlcaisseretours` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `dateoperation` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `cuml` decimal(10,2) DEFAULT NULL,
  `nombre` decimal(10,2) DEFAULT NULL,
  `idclient` bigint(20) unsigned NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `compagnie` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `idcaissevide` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `table_cumlcaisseretours_idclient_foreign` (`idclient`),
  CONSTRAINT `table_cumlcaisseretours_idclient_foreign` FOREIGN KEY (`idclient`) REFERENCES `clients` (`id`) ON DELETE CASCADE
) ENGINE=InnoDB AUTO_INCREMENT=62 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `table_cumlcaisseretours`
--

LOCK TABLES `table_cumlcaisseretours` WRITE;
/*!40000 ALTER TABLE `table_cumlcaisseretours` DISABLE KEYS */;
INSERT INTO `table_cumlcaisseretours` VALUES (25,'2024-02-01',1005.00,5.00,8,'2024-02-01 17:01:57','2024-02-01 17:01:57','7','32'),(26,'2024-02-11',2.00,2.00,12,'2024-02-11 17:22:48','2024-02-11 17:22:48','9','33'),(27,'2024-02-11',3.00,3.00,15,'2024-02-11 17:23:09','2024-02-11 17:23:09','9','34'),(29,'2024-02-11',6.00,6.00,12,'2024-02-12 03:50:32','2024-02-12 03:50:32','10','38'),(30,'2024-02-11',123.00,123.00,13,'2024-02-12 03:51:02','2024-02-12 03:51:02','10','39'),(31,'2024-02-11',45.00,45.00,14,'2024-02-12 03:51:25','2024-02-12 03:51:25','10','40'),(32,'2024-02-11',23.00,23.00,15,'2024-02-12 03:51:45','2024-02-12 03:51:45','10','41'),(33,'2024-02-11',89.00,89.00,16,'2024-02-12 03:52:14','2024-02-12 03:52:14','10','42'),(34,'2024-02-11',65.00,65.00,17,'2024-02-12 03:52:37','2024-02-12 03:52:37','10','43'),(35,'2024-02-11',45.00,45.00,18,'2024-02-12 03:53:44','2024-02-12 03:53:44','10','44'),(36,'2024-02-11',56.00,56.00,19,'2024-02-12 03:54:17','2024-02-12 03:54:17','10','45'),(39,'2024-02-14',5.00,5.00,20,'2024-02-14 20:34:17','2024-02-14 20:34:17','10','48'),(41,'2024-02-15',181.00,175.00,12,'2024-02-15 21:53:14','2024-02-15 21:53:14','10','50'),(42,'2024-02-15',443.00,320.00,13,'2024-02-15 21:54:20','2024-02-15 21:54:20','10','51'),(43,'2024-02-15',90.00,45.00,14,'2024-02-15 21:54:40','2024-02-15 21:54:40','10','52'),(44,'2024-02-15',331.00,308.00,15,'2024-02-15 21:55:14','2024-02-15 21:55:14','10','53'),(45,'2024-02-15',277.00,188.00,16,'2024-02-15 21:55:52','2024-02-15 21:55:52','10','54'),(46,'2024-02-15',130.00,65.00,17,'2024-02-15 21:56:17','2024-02-15 21:56:17','10','55'),(47,'2024-02-15',75.00,30.00,18,'2024-02-15 21:56:42','2024-02-15 21:56:42','10','56'),(48,'2024-02-15',59.00,3.00,19,'2024-02-15 21:56:56','2024-02-15 21:56:56','10','57'),(49,'2024-02-15',730.00,600.00,17,'2024-02-15 21:57:34','2024-02-15 21:57:34','10','58'),(50,'2024-02-15',495.00,405.00,14,'2024-02-15 21:58:40','2024-02-15 21:58:40','10','59'),(60,'2024-03-01',205.00,200.00,20,'2024-03-01 12:35:23','2024-03-01 12:35:23','10','69'),(61,'2024-05-13',5.00,5.00,8,'2024-05-13 14:20:59','2024-05-13 14:20:59','10','70');
/*!40000 ALTER TABLE `table_cumlcaisseretours` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `table_cumlcaissevides`
--

DROP TABLE IF EXISTS `table_cumlcaissevides`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `table_cumlcaissevides` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `dateoperation` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `cuml` decimal(10,2) DEFAULT NULL,
  `idclient` bigint(20) unsigned NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `nombre` decimal(10,2) DEFAULT NULL,
  `compagnie` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `idcaissevide` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `table_cumlcaissevides_idclient_foreign` (`idclient`),
  CONSTRAINT `table_cumlcaissevides_idclient_foreign` FOREIGN KEY (`idclient`) REFERENCES `clients` (`id`) ON DELETE CASCADE
) ENGINE=InnoDB AUTO_INCREMENT=96 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `table_cumlcaissevides`
--

LOCK TABLES `table_cumlcaissevides` WRITE;
/*!40000 ALTER TABLE `table_cumlcaissevides` DISABLE KEYS */;
INSERT INTO `table_cumlcaissevides` VALUES (32,'2024-02-01',7000.00,11,'2024-02-01 19:04:37','2024-02-01 19:04:37',7000.00,'7','65'),(40,'2024-02-11',100.00,12,'2024-02-11 16:37:54','2024-02-11 16:37:54',100.00,'9','73'),(41,'2024-02-11',555.00,13,'2024-02-11 16:38:09','2024-02-11 16:38:09',555.00,'9','74'),(42,'2024-02-11',655.00,14,'2024-02-11 16:38:30','2024-02-11 16:38:30',655.00,'9','75'),(43,'2024-02-11',319.00,15,'2024-02-11 16:38:43','2024-02-11 16:38:43',319.00,'9','76'),(44,'2024-02-11',647.00,16,'2024-02-11 16:39:06','2024-02-11 16:39:06',647.00,'9','77'),(45,'2024-02-11',1089.00,17,'2024-02-11 16:39:24','2024-02-11 16:39:24',1089.00,'9','78'),(46,'2024-02-11',2016.00,18,'2024-02-11 16:39:43','2024-02-11 16:39:43',2016.00,'9','79'),(47,'2024-02-11',1550.00,19,'2024-02-11 16:40:10','2024-02-11 16:40:10',1550.00,'9','80'),(50,'2024-02-11',300.00,12,'2024-02-12 03:22:33','2024-02-12 03:22:33',300.00,'10','84'),(51,'2024-02-11',1110.00,13,'2024-02-12 03:23:01','2024-02-12 03:23:01',555.00,'10','85'),(52,'2024-02-11',655.00,14,'2024-02-12 03:23:26','2024-02-12 03:23:26',655.00,'10','86'),(53,'2024-02-11',319.00,15,'2024-02-12 03:23:51','2024-02-12 03:23:51',319.00,'10','87'),(54,'2024-02-11',647.00,16,'2024-02-12 03:24:11','2024-02-12 03:24:11',647.00,'10','88'),(55,'2024-02-11',1089.00,17,'2024-02-12 03:24:30','2024-02-12 03:24:30',1089.00,'10','89'),(56,'2024-02-11',2016.00,18,'2024-02-12 03:24:51','2024-02-12 03:24:51',2016.00,'10','90'),(57,'2024-02-11',1550.00,19,'2024-02-12 03:25:15','2024-02-12 03:25:15',1550.00,'10','91'),(60,'2024-02-13',640.00,12,'2024-02-13 15:07:52','2024-02-13 15:07:52',240.00,'10','94'),(61,'2024-02-13',1610.00,13,'2024-02-13 15:08:23','2024-02-13 15:08:23',500.00,'10','95'),(62,'2024-02-13',1876.00,14,'2024-02-13 15:16:42','2024-02-13 15:16:42',566.00,'10','96'),(63,'2024-02-13',1058.00,15,'2024-02-13 15:17:07','2024-02-13 15:17:07',420.00,'10','97'),(64,'2024-02-13',1391.00,15,'2024-02-13 15:17:58','2024-02-13 15:17:58',333.00,'10','98'),(65,'2024-02-13',3158.00,17,'2024-02-13 15:18:31','2024-02-13 15:18:31',980.00,'10','99'),(66,'2024-02-13',4357.00,18,'2024-02-13 15:19:02','2024-02-13 15:19:02',325.00,'10','100'),(67,'2024-02-13',3850.00,19,'2024-02-13 15:19:26','2024-02-13 15:19:26',750.00,'10','101'),(68,'2024-02-14',10.00,20,'2024-02-14 17:50:24','2024-02-14 17:50:24',10.00,'10','102'),(70,'2024-02-14',10.00,20,'2024-02-14 17:58:29','2024-02-14 17:58:29',10.00,'9','104'),(71,'2024-02-14',20.00,20,'2024-02-14 17:59:27','2024-02-14 17:59:27',10.00,'9','105'),(72,'2024-02-15',853.00,12,'2024-02-15 22:20:47','2024-02-15 22:20:47',313.00,'10','106'),(73,'2024-02-15',1570.00,13,'2024-02-15 22:21:07','2024-02-15 22:21:07',515.00,'10','107'),(78,'2024-02-15',3511.00,14,'2024-02-15 22:26:04','2024-02-15 22:26:04',458.00,'10','110'),(84,'2024-02-15',1693.00,15,'2024-02-15 22:28:29','2024-02-15 22:28:29',621.00,'10','118'),(85,'2024-02-15',1091.00,16,'2024-02-15 22:28:45','2024-02-15 22:28:45',444.00,'10','119'),(86,'2024-02-15',3269.00,17,'2024-02-15 22:29:06','2024-02-15 22:29:06',1200.00,'10','120'),(87,'2024-02-15',3321.00,18,'2024-02-15 22:29:29','2024-02-15 22:29:29',980.00,'10','121'),(88,'2024-02-15',2916.00,19,'2024-02-15 22:29:46','2024-02-15 22:29:46',616.00,'10','122'),(89,'2024-02-16',20.00,20,'2024-02-16 16:10:27','2024-02-16 16:10:27',10.00,'10','123'),(90,'2024-02-16',30.00,20,'2024-02-16 16:10:46','2024-02-16 16:10:46',10.00,'10','124'),(91,'2024-02-20',12.00,11,'2024-02-20 17:06:38','2024-02-20 17:06:38',12.00,'10','125'),(92,'2024-02-20',24.00,11,'2024-02-20 17:06:53','2024-02-20 17:06:53',12.00,'10','126'),(93,'2024-02-21',512.00,22,'2024-02-21 20:39:32','2024-02-21 20:39:32',512.00,'10','127'),(94,'2024-03-01',530.00,20,'2024-03-01 12:34:37','2024-03-01 12:34:37',500.00,'10','128'),(95,'2024-05-13',10.00,8,'2024-05-13 14:19:54','2024-05-13 14:19:54',10.00,'10','129');
/*!40000 ALTER TABLE `table_cumlcaissevides` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `table_cumlmarchandiseentree`
--

DROP TABLE IF EXISTS `table_cumlmarchandiseentree`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `table_cumlmarchandiseentree` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `dateoperation` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `cuml` decimal(10,2) DEFAULT NULL,
  `nombre` decimal(10,2) DEFAULT NULL,
  `idclient` bigint(20) unsigned NOT NULL,
  `compagnie` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `idmarchaentre` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `table_cumlmarchandiseentree_idclient_foreign` (`idclient`),
  CONSTRAINT `table_cumlmarchandiseentree_idclient_foreign` FOREIGN KEY (`idclient`) REFERENCES `clients` (`id`) ON DELETE CASCADE
) ENGINE=InnoDB AUTO_INCREMENT=56 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `table_cumlmarchandiseentree`
--

LOCK TABLES `table_cumlmarchandiseentree` WRITE;
/*!40000 ALTER TABLE `table_cumlmarchandiseentree` DISABLE KEYS */;
INSERT INTO `table_cumlmarchandiseentree` VALUES (20,'2024-02-01',435.00,420.00,8,'7','2024-02-01 19:08:04','2024-02-01 19:08:04','56'),(21,'2024-02-03',465.00,465.00,10,'7','2024-02-03 18:52:22','2024-02-03 18:52:22','57'),(22,'2024-02-03',965.00,500.00,10,'7','2024-02-03 19:40:13','2024-02-03 19:40:13','58'),(23,'2024-02-06',430.00,10.00,8,'7','2024-02-06 16:25:15','2024-02-06 16:25:15','59'),(24,'2024-02-11',900.00,900.00,12,'9','2024-02-11 17:12:10','2024-02-11 17:12:10','60'),(25,'2024-02-11',555.00,555.00,13,'9','2024-02-11 17:13:26','2024-02-11 17:13:26','61'),(28,'2024-02-11',210.00,210.00,12,'10','2024-02-12 03:30:19','2024-02-12 03:30:19','66'),(29,'2024-02-11',200.00,200.00,13,'10','2024-02-12 03:31:16','2024-02-12 03:31:16','67'),(30,'2024-02-11',555.00,555.00,14,'10','2024-02-12 03:34:41','2024-02-12 03:34:41','68'),(31,'2024-02-11',300.00,300.00,15,'10','2024-02-12 03:35:29','2024-02-12 03:35:29','69'),(32,'2024-02-11',600.00,600.00,16,'10','2024-02-12 03:36:29','2024-02-12 03:36:29','70'),(33,'2024-02-11',700.00,700.00,17,'10','2024-02-12 03:40:16','2024-02-12 03:40:16','71'),(34,'2024-02-11',800.00,800.00,18,'10','2024-02-12 03:41:01','2024-02-12 03:41:01','72'),(35,'2024-02-11',900.00,900.00,19,'10','2024-02-12 03:41:29','2024-02-12 03:41:29','73'),(36,'2024-02-13',1564.00,454.00,12,'10','2024-02-13 15:28:47','2024-02-13 15:28:47','74'),(37,'2024-02-13',833.00,78.00,13,'10','2024-02-13 15:29:34','2024-02-13 15:29:34','75'),(39,'2024-02-13',678.00,123.00,14,'10','2024-02-13 15:33:31','2024-02-13 15:33:31','77'),(41,'2024-02-13',532.00,232.00,15,'10','2024-02-13 15:35:28','2024-02-13 15:35:28','79'),(42,'2024-02-13',754.00,154.00,16,'10','2024-02-13 15:36:44','2024-02-13 15:36:44','80'),(43,'2024-02-13',811.00,111.00,17,'10','2024-02-13 15:41:12','2024-02-13 15:41:12','81'),(44,'2024-02-13',1032.00,232.00,18,'10','2024-02-13 15:42:37','2024-02-13 15:42:37','82'),(45,'2024-02-13',1467.00,656.00,17,'10','2024-02-13 16:11:29','2024-02-13 16:11:29','83'),(46,'2024-02-14',1000.00,1000.00,11,'10','2024-02-14 13:36:28','2024-02-14 13:36:28','84'),(47,'2024-02-14',1977.00,977.00,11,'10','2024-02-14 13:38:27','2024-02-14 13:38:27','85'),(48,'2024-02-14',3163.00,3163.00,21,'10','2024-02-14 19:46:54','2024-02-14 19:46:54','86'),(49,'2024-02-14',10.00,10.00,20,'10','2024-02-14 20:18:54','2024-02-14 20:18:54','87'),(50,'2024-02-14',20.00,10.00,20,'10','2024-02-14 20:19:33','2024-02-14 20:19:33','88'),(52,'2024-02-20',140.00,125.00,10,'10','2024-02-20 17:09:34','2024-02-20 17:09:34','90'),(53,'2024-03-01',120.00,100.00,20,'10','2024-03-01 12:34:56','2024-03-01 12:34:56','91'),(54,'2024-05-11',10.00,10.00,9,'10','2024-05-11 16:22:54','2024-05-11 16:22:54','92'),(55,'2024-05-13',5.00,5.00,8,'10','2024-05-13 14:20:19','2024-05-13 14:20:19','93');
/*!40000 ALTER TABLE `table_cumlmarchandiseentree` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `table_cumlmarchandisesortie`
--

DROP TABLE IF EXISTS `table_cumlmarchandisesortie`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `table_cumlmarchandisesortie` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `dateoperation` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `cuml` decimal(10,2) DEFAULT NULL,
  `nombre` decimal(10,2) DEFAULT NULL,
  `idclient` bigint(20) unsigned NOT NULL,
  `compagnie` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `idmarchasortie` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `table_cumlmarchandisesortie_idclient_foreign` (`idclient`),
  CONSTRAINT `table_cumlmarchandisesortie_idclient_foreign` FOREIGN KEY (`idclient`) REFERENCES `clients` (`id`) ON DELETE CASCADE
) ENGINE=InnoDB AUTO_INCREMENT=46 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `table_cumlmarchandisesortie`
--

LOCK TABLES `table_cumlmarchandisesortie` WRITE;
/*!40000 ALTER TABLE `table_cumlmarchandisesortie` DISABLE KEYS */;
INSERT INTO `table_cumlmarchandisesortie` VALUES (16,'2024-02-01',2.00,2.00,8,'7','2024-02-01 17:00:24','2024-02-01 17:00:24','44'),(19,'2024-02-06',12.00,10.00,8,'7','2024-02-06 16:55:44','2024-02-06 16:55:44','47'),(20,'2024-02-11',9.00,9.00,12,'9','2024-02-11 17:21:49','2024-02-11 17:21:49','48'),(22,'2024-02-11',33.00,33.00,12,'10','2024-02-12 03:42:54','2024-02-12 03:42:54','50'),(23,'2024-02-11',40.00,40.00,13,'10','2024-02-12 03:44:29','2024-02-12 03:44:29','51'),(24,'2024-02-11',300.00,300.00,14,'10','2024-02-12 03:45:22','2024-02-12 03:45:22','52'),(25,'2024-02-11',66.00,66.00,15,'10','2024-02-12 03:45:56','2024-02-12 03:45:56','53'),(26,'2024-02-11',10.00,10.00,16,'10','2024-02-12 03:46:40','2024-02-12 03:46:40','54'),(27,'2024-02-11',214.00,214.00,17,'10','2024-02-12 03:47:36','2024-02-12 03:47:36','55'),(28,'2024-02-11',302.00,302.00,18,'10','2024-02-12 03:49:01','2024-02-12 03:49:01','56'),(29,'2024-02-11',850.00,850.00,19,'10','2024-02-12 03:49:44','2024-02-12 03:49:44','57'),(30,'2024-02-14',20.00,20.00,20,'10','2024-02-14 20:24:37','2024-02-14 20:24:37','58'),(31,'2024-02-14',40.00,20.00,20,'10','2024-02-14 20:25:09','2024-02-14 20:25:09','59'),(32,'2024-02-15',213.00,180.00,12,'10','2024-02-15 21:34:13','2024-02-15 21:34:13','60'),(33,'2024-02-15',120.00,80.00,13,'10','2024-02-15 21:35:24','2024-02-15 21:35:24','61'),(34,'2024-02-15',362.00,62.00,14,'10','2024-02-15 21:36:22','2024-02-15 21:36:22','62'),(35,'2024-02-15',129.00,63.00,15,'10','2024-02-15 21:36:41','2024-02-15 21:36:41','63'),(36,'2024-02-15',519.00,390.00,15,'10','2024-02-15 21:37:36','2024-02-15 21:37:36','64'),(37,'2024-02-15',290.00,280.00,16,'10','2024-02-15 21:38:24','2024-02-15 21:38:24','65'),(38,'2024-02-15',467.00,253.00,17,'10','2024-02-15 21:39:19','2024-02-15 21:39:19','66'),(39,'2024-02-15',790.00,323.00,17,'10','2024-02-15 21:40:34','2024-02-15 21:40:34','67'),(40,'2024-02-15',532.00,230.00,18,'10','2024-02-15 21:41:26','2024-02-15 21:41:26','68'),(41,'2024-02-15',862.00,12.00,19,'10','2024-02-15 21:41:58','2024-02-15 21:41:58','69'),(42,'2024-02-20',221.00,221.00,9,'10','2024-02-20 17:04:11','2024-02-20 17:04:11','70'),(43,'2024-02-20',456.00,235.00,9,'10','2024-02-20 17:05:27','2024-02-20 17:05:27','71'),(44,'2024-03-01',90.00,50.00,20,'10','2024-03-01 12:35:11','2024-03-01 12:35:11','72'),(45,'2024-05-13',5.00,5.00,8,'10','2024-05-13 14:20:41','2024-05-13 14:20:41','73');
/*!40000 ALTER TABLE `table_cumlmarchandisesortie` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `tmpmarchandisesortie`
--

DROP TABLE IF EXISTS `tmpmarchandisesortie`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `tmpmarchandisesortie` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `nbbox` decimal(8,2) DEFAULT NULL,
  `produit` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `idclient` bigint(20) unsigned NOT NULL,
  `iduser` bigint(20) unsigned NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `matricule` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `chauffeur` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `cin` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `tmpmarchandisesortie_idclient_foreign` (`idclient`),
  KEY `tmpmarchandisesortie_iduser_foreign` (`iduser`),
  CONSTRAINT `tmpmarchandisesortie_idclient_foreign` FOREIGN KEY (`idclient`) REFERENCES `clients` (`id`) ON DELETE CASCADE,
  CONSTRAINT `tmpmarchandisesortie_iduser_foreign` FOREIGN KEY (`iduser`) REFERENCES `users` (`id`) ON DELETE CASCADE
) ENGINE=InnoDB AUTO_INCREMENT=97 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `tmpmarchandisesortie`
--

LOCK TABLES `tmpmarchandisesortie` WRITE;
/*!40000 ALTER TABLE `tmpmarchandisesortie` DISABLE KEYS */;
/*!40000 ALTER TABLE `tmpmarchandisesortie` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `tmpmarchentree`
--

DROP TABLE IF EXISTS `tmpmarchentree`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `tmpmarchentree` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `nbbox` decimal(10,2) DEFAULT NULL,
  `produit` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `idclient` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `user_id` bigint(20) unsigned NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `matricule` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `chauffeur` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `cin` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `tmpmarchentree_user_id_foreign` (`user_id`),
  CONSTRAINT `tmpmarchentree_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=141 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `tmpmarchentree`
--

LOCK TABLES `tmpmarchentree` WRITE;
/*!40000 ALTER TABLE `tmpmarchentree` DISABLE KEYS */;
/*!40000 ALTER TABLE `tmpmarchentree` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `users`
--

DROP TABLE IF EXISTS `users`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `users` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email_verified_at` timestamp NULL DEFAULT NULL,
  `password` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `role_name` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `remember_token` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `users_email_unique` (`email`)
) ENGINE=InnoDB AUTO_INCREMENT=12 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `users`
--

LOCK TABLES `users` WRITE;
/*!40000 ALTER TABLE `users` DISABLE KEYS */;
INSERT INTO `users` VALUES (1,'elhamra youssef','admin@gmail.com',NULL,'$2y$12$gVxtRoLJdBIOqkCaXly8suLvrC/z8TvbmLffyH5SighCdnWAKWY4S','AdminSuper',NULL,'2023-12-18 17:04:54','2023-12-18 17:04:54'),(10,'makhtari youssef','youssef.makhtari@gmail.com',NULL,'$2y$12$vTeXM6jhdmS7lGGpraDuQ.J7.dEZu3rTuSgBPuDAn23eQu7HvelLy','Admin',NULL,'2024-02-01 00:04:38','2024-02-01 00:04:38'),(11,'chokri anas','anas.chokri@gmail.com',NULL,'$2y$12$9K9sqqDmUJurbbPyZ.77DO6Zyjy.vxgk7LSBhloNIzzvbqLbryYWK','user',NULL,'2024-02-01 00:07:28','2024-02-01 00:07:28');
/*!40000 ALTER TABLE `users` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Dumping routines for database 'gestionstock'
--
/*!40103 SET TIME_ZONE=@OLD_TIME_ZONE */;

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;

-- Dump completed on 2024-05-13 16:34:08
