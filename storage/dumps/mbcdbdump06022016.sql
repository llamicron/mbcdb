-- MySQL dump 10.13  Distrib 5.7.9, for osx10.9 (x86_64)
--
-- Host: localhost    Database: mbcdb
-- ------------------------------------------------------
-- Server version	5.5.42

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
-- Table structure for table `badge_counselor`
--

DROP TABLE IF EXISTS `badge_counselor`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `badge_counselor` (
  `badge_id` int(10) unsigned NOT NULL,
  `counselor_id` int(10) unsigned NOT NULL,
  PRIMARY KEY (`badge_id`,`counselor_id`),
  KEY `badge_counselor_badge_id_index` (`badge_id`),
  KEY `badge_counselor_counselor_id_index` (`counselor_id`),
  CONSTRAINT `badge_counselor_badge_id_foreign` FOREIGN KEY (`badge_id`) REFERENCES `badges` (`id`) ON DELETE CASCADE,
  CONSTRAINT `badge_counselor_counselor_id_foreign` FOREIGN KEY (`counselor_id`) REFERENCES `counselors` (`id`) ON DELETE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `badge_counselor`
--

LOCK TABLES `badge_counselor` WRITE;
/*!40000 ALTER TABLE `badge_counselor` DISABLE KEYS */;
INSERT INTO `badge_counselor` VALUES (1,12),(2,12),(3,12),(4,12),(4,19),(14,12),(15,25),(19,12),(21,19),(23,12),(25,25),(26,12),(27,19),(30,12),(33,12),(33,26),(35,12),(36,12),(38,12),(38,13),(60,12),(61,12),(105,12),(111,12),(112,12),(120,12),(121,12),(131,26),(133,26),(139,25),(157,19),(160,12),(160,14);
/*!40000 ALTER TABLE `badge_counselor` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `badges`
--

DROP TABLE IF EXISTS `badges`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `badges` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `code` int(10) unsigned NOT NULL,
  `name` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=161 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `badges`
--

LOCK TABLES `badges` WRITE;
/*!40000 ALTER TABLE `badges` DISABLE KEYS */;
INSERT INTO `badges` VALUES (1,1,'Camping','2016-05-07 07:39:41','2016-05-07 07:39:41'),(2,2,'Citizenship in the Community','2016-05-07 16:34:36','2016-05-07 16:34:36'),(3,3,'Citizenship in the Nation','2016-05-07 16:34:48','2016-05-07 16:34:48'),(4,4,'Citizenship in the World','2016-05-07 16:35:12','2016-05-07 16:35:12'),(5,5,'Communications','2016-05-07 16:35:23','2016-05-07 16:35:23'),(6,6,'Emergency Preparedness','2016-05-07 16:35:49','2016-05-07 16:35:49'),(7,7,'Environmental Science','2016-05-07 16:36:04','2016-05-07 16:36:04'),(8,8,'First Aid','2016-05-07 16:36:13','2016-05-07 16:36:13'),(9,9,'Lifesaving','2016-05-07 16:36:23','2016-05-07 16:36:23'),(10,10,'Personal Fitness','2016-05-07 16:36:34','2016-05-07 16:36:34'),(11,11,'Personal Management','2016-05-07 16:36:47','2016-05-07 16:36:47'),(12,12,'Safety','2016-05-07 16:36:57','2016-05-07 16:36:57'),(13,13,'Sports','2016-05-07 16:37:06','2016-05-07 16:37:06'),(14,14,'Swimming','2016-05-07 16:37:14','2016-05-07 16:37:14'),(15,15,'American Business','2016-05-07 16:37:25','2016-05-07 16:37:25'),(16,16,'American Heritage','2016-05-07 16:37:36','2016-05-07 16:37:36'),(17,17,'American Cultures','2016-05-07 16:39:23','2016-05-07 16:39:23'),(18,18,'Animal Science','2016-05-07 16:39:40','2016-05-07 16:39:40'),(19,19,'Archery','2016-05-07 16:39:46','2016-05-07 16:39:46'),(20,20,'Architecture','2016-05-07 16:40:37','2016-05-07 16:40:37'),(21,21,'Art','2016-05-07 16:40:44','2016-05-07 16:40:44'),(22,22,'Astronomy','2016-05-07 16:41:00','2016-05-07 16:41:00'),(23,23,'Athletics','2016-05-07 16:41:08','2016-05-07 16:41:08'),(24,24,'Nuclear Science','2016-05-07 16:41:23','2016-05-07 16:41:23'),(25,25,'Aviation','2016-05-07 16:41:32','2016-05-07 16:41:32'),(26,26,'Backpacking','2016-05-07 16:41:41','2016-05-07 16:41:41'),(27,27,'Basketry','2016-05-07 16:42:07','2016-05-07 16:42:07'),(28,28,'Beekeeping','2016-05-07 16:42:16','2016-05-07 16:42:16'),(29,29,'Bird Study','2016-05-07 16:42:26','2016-05-07 16:42:26'),(30,30,'Bookbinding','2016-05-07 16:42:38','2016-05-07 16:42:38'),(31,31,'Botany','2016-05-07 16:42:51','2016-05-07 16:42:51'),(32,32,'Bugling','2016-05-07 16:43:01','2016-05-07 16:43:01'),(33,33,'Canoeing','2016-05-07 16:43:12','2016-05-07 16:43:12'),(34,34,'Chemistry','2016-05-07 16:43:20','2016-05-07 16:43:20'),(35,35,'Coin Collecting','2016-05-07 16:43:28','2016-05-07 16:43:28'),(36,36,'Computers','2016-05-07 16:43:38','2016-05-07 16:43:38'),(37,37,'Consumer Buying','2016-05-07 16:43:49','2016-05-07 16:43:49'),(38,38,'Cooking','2016-05-07 16:44:00','2016-05-07 16:44:00'),(39,39,'Cycling','2016-05-07 16:44:19','2016-05-07 16:44:19'),(40,40,'Dentistry','2016-05-07 16:45:02','2016-05-07 16:45:02'),(41,41,'Dog Care','2016-05-07 16:45:10','2016-05-07 16:45:10'),(42,42,'Drafting','2016-05-07 16:45:19','2016-05-07 16:45:19'),(43,43,'Electricity','2016-05-07 16:45:30','2016-05-07 16:45:30'),(44,44,'Electronics','2016-05-07 16:45:40','2016-05-07 16:45:40'),(45,45,'Energy','2016-05-07 16:46:00','2016-05-07 16:46:00'),(46,46,'Engineering','2016-05-07 16:46:10','2016-05-07 16:46:10'),(47,47,'Farm and Ranch Management','2016-05-07 16:47:11','2016-05-07 16:47:11'),(48,48,'Farm Mechanics','2016-05-07 16:47:23','2016-05-07 16:47:23'),(49,49,'Fingerprinting','2016-05-07 16:47:35','2016-05-07 16:47:35'),(50,50,'Fire Safety','2016-05-07 16:47:44','2016-05-07 16:47:44'),(51,51,'Fish and Wildlife Management','2016-05-07 16:48:02','2016-05-07 16:48:02'),(52,52,'Fishing','2016-05-07 16:48:07','2016-05-07 16:48:07'),(53,53,'Food Systems','2016-05-07 16:49:13','2016-05-07 16:49:13'),(54,54,'Forestry','2016-05-07 16:49:23','2016-05-07 16:49:23'),(55,55,'Gardening','2016-05-07 16:49:31','2016-05-07 16:49:31'),(56,56,'Genealogy','2016-05-07 16:49:43','2016-05-07 16:49:43'),(57,57,'General Science','2016-05-07 16:49:52','2016-05-07 16:49:52'),(58,58,'Geology','2016-05-07 16:49:59','2016-05-07 16:49:59'),(59,59,'Golf','2016-05-07 16:50:06','2016-05-07 16:50:06'),(60,60,'Disabilities Awareness','2016-05-07 16:50:47','2016-05-07 16:50:47'),(61,61,'Hiking','2016-05-07 16:51:18','2016-05-07 16:51:18'),(62,62,'Home Repairs','2016-05-07 16:51:32','2016-05-07 16:51:32'),(63,63,'Horsemanship','2016-05-07 16:51:45','2016-05-07 16:51:45'),(64,64,'Indian Lore','2016-05-07 16:51:53','2016-05-07 16:51:53'),(65,65,'Insect Study','2016-05-07 16:52:03','2016-05-07 16:52:03'),(66,66,'Journalism','2016-05-07 16:52:17','2016-05-07 16:52:17'),(67,67,'Landscape Architecture','2016-05-07 16:52:29','2016-05-07 16:52:29'),(68,68,'Law','2016-05-07 16:52:42','2016-05-07 16:52:42'),(69,69,'Leatherwork','2016-05-07 16:52:50','2016-05-07 16:52:50'),(70,70,'Machinery','2016-05-07 16:52:58','2016-05-07 16:52:58'),(71,71,'Mammal Study','2016-05-07 16:53:07','2016-05-07 16:53:07'),(72,72,'Masonry','2016-05-07 16:53:19','2016-05-07 16:53:19'),(73,73,'Metals Engineering','2016-05-07 16:53:32','2016-05-07 16:53:32'),(74,74,'Metalwork','2016-05-07 16:53:49','2016-05-07 16:53:49'),(75,75,'Model Design and Building','2016-05-07 16:54:07','2016-05-07 16:54:07'),(76,76,'Motor Boating','2016-05-07 16:54:19','2016-05-07 16:54:19'),(77,77,'Music','2016-05-07 16:54:26','2016-05-07 16:54:26'),(78,78,'Nature','2016-05-07 16:54:33','2016-05-07 16:54:33'),(79,79,'Oceanography','2016-05-07 16:54:44','2016-05-07 16:54:44'),(80,80,'Orienteering','2016-05-07 16:54:54','2016-05-07 16:54:54'),(81,81,'Painting','2016-05-07 16:55:00','2016-05-07 16:55:00'),(82,82,'Pets','2016-05-07 16:55:07','2016-05-07 16:55:07'),(83,83,'Photography','2016-05-07 16:55:19','2016-05-07 16:55:19'),(84,84,'Pioneering','2016-05-07 16:55:27','2016-05-07 16:55:27'),(85,85,'Plant Science','2016-05-07 16:55:37','2016-05-07 16:55:37'),(86,86,'Plumbing','2016-05-07 16:55:44','2016-05-07 16:55:44'),(87,87,'Pottery','2016-05-07 16:56:04','2016-05-07 16:56:04'),(88,88,'Printing','2016-05-07 16:56:15','2016-05-07 16:56:15'),(89,89,'Public Health','2016-05-07 16:56:24','2016-05-07 16:56:24'),(90,90,'Public Speaking','2016-05-07 16:56:33','2016-05-07 16:56:33'),(91,91,'Pulp and Paper','2016-05-07 16:56:42','2016-05-07 16:56:42'),(92,92,'Rabbit Raising','2016-05-07 16:57:11','2016-05-07 16:57:11'),(93,93,'Radio','2016-05-07 16:57:19','2016-05-07 16:57:19'),(94,94,'Railroading','2016-05-07 16:57:27','2016-05-07 16:57:27'),(95,95,'Reading','2016-05-07 16:57:36','2016-05-07 16:57:36'),(96,96,'Reptile and Amphibian Study','2016-05-07 16:58:35','2016-05-07 16:58:35'),(97,97,'Rifle and Shotgun Shooting','2016-05-07 16:58:54','2016-05-07 16:58:54'),(98,98,'Rowing','2016-05-07 16:59:01','2016-05-07 16:59:01'),(99,99,'Salesmanship','2016-05-07 16:59:15','2016-05-07 16:59:15'),(100,100,'Scholarship','2016-05-07 16:59:27','2016-05-07 16:59:27'),(101,101,'Sculpture','2016-05-07 17:00:03','2016-05-07 17:00:03'),(102,102,'Signaling','2016-05-07 17:00:23','2016-05-07 17:00:23'),(103,103,'Skating','2016-05-07 17:00:33','2016-05-07 17:00:33'),(104,104,'Skiing','2016-05-07 17:00:42','2016-05-07 17:00:42'),(105,105,'Small-Boat Sailing','2016-05-07 17:00:58','2016-05-07 17:00:58'),(106,106,'Soil and Water Conservation','2016-05-07 17:01:13','2016-05-07 17:01:13'),(107,107,'Space Exploration','2016-05-07 17:01:21','2016-05-07 17:01:21'),(108,108,'Stamp Collecting','2016-05-07 17:01:30','2016-05-07 17:01:30'),(109,109,'Surveying','2016-05-07 17:01:44','2016-05-07 17:01:44'),(110,110,'Textile','2016-05-07 17:01:52','2016-05-07 17:01:52'),(111,111,'Theater','2016-05-07 17:02:03','2016-05-07 17:02:03'),(112,112,'Traffic Safety','2016-05-07 17:02:12','2016-05-07 17:02:12'),(113,113,'Truck Transportation','2016-05-07 17:02:22','2016-05-07 17:02:22'),(114,114,'Veterinary Medicine','2016-05-07 17:02:37','2016-05-07 17:02:37'),(115,115,'Water Sports','2016-05-07 17:02:47','2016-05-07 17:02:47'),(116,116,'Weather','2016-05-07 17:02:54','2016-05-07 17:02:54'),(117,117,'Wilderness Survival','2016-05-07 17:03:04','2016-05-07 17:03:04'),(118,118,'Wood Carving','2016-05-07 17:03:11','2016-05-07 17:03:11'),(119,119,'Woodwork','2016-05-07 17:03:18','2016-05-07 17:03:18'),(120,120,'Agribusiness','2016-05-07 17:03:32','2016-05-07 17:03:32'),(121,121,'American Labor','2016-05-07 17:03:42','2016-05-07 17:03:42'),(122,122,'Graphic Arts','2016-05-07 17:03:54','2016-05-07 17:03:54'),(123,123,'Rifle Shooting','2016-05-07 17:04:03','2016-05-07 17:04:03'),(124,124,'Shotgun Shooting','2016-05-07 17:04:13','2016-05-07 17:04:13'),(125,125,'Whitewater','2016-05-07 17:04:22','2016-05-07 17:04:22'),(126,126,'Cinematography','2016-05-07 17:04:33','2016-05-07 17:04:33'),(127,127,'Auto Mechanics','2016-05-07 17:05:07','2016-05-07 17:05:07'),(128,128,'Collections','2016-05-07 17:05:17','2016-05-07 17:05:17'),(129,129,'Family Life','2016-05-07 17:05:26','2016-05-07 17:05:26'),(130,130,'Medicine','2016-05-07 17:05:52','2016-05-07 17:05:52'),(131,131,'Crime Prevention','2016-05-07 17:06:08','2016-05-07 17:06:08'),(132,132,'Archaeology','2016-05-07 17:06:17','2016-05-07 17:07:22'),(133,133,'Climbing','2016-05-07 17:07:51','2016-05-07 17:07:51'),(134,134,'Entrepreneurship','2016-05-07 17:08:15','2016-05-07 17:08:15'),(135,135,'Snow Sports','2016-05-07 17:08:25','2016-05-07 17:08:25'),(136,136,'Fly Fishing','2016-05-07 17:08:35','2016-05-07 17:08:35'),(137,137,'Composite Materials','2016-05-07 17:09:22','2016-05-07 17:09:22'),(138,138,'Scuba Diving','2016-05-07 17:09:32','2016-05-07 17:09:32'),(139,139,'Carpentry (Centennial Merit Badge)','2016-05-07 17:10:15','2016-05-07 17:10:15'),(140,140,'Pathfinding (Centennial Merit Badge)','2016-05-07 17:10:33','2016-05-07 17:10:33'),(141,141,'Signaling (Centennial Merit Badge)','2016-05-07 17:11:04','2016-05-07 17:11:04'),(142,142,'Tracking (Centennial Merit Badge)','2016-05-07 17:11:21','2016-05-07 17:11:21'),(143,143,'Scouting Heritage','2016-05-07 17:11:31','2016-05-07 17:11:31'),(144,144,'Inventing','2016-05-07 17:11:53','2016-05-07 17:11:53'),(145,145,'Geocaching','2016-05-07 17:12:08','2016-05-07 17:12:08'),(146,146,'Robotics','2016-05-07 17:12:16','2016-05-07 17:12:16'),(147,147,'Chess','2016-05-07 17:12:33','2016-05-07 17:12:33'),(148,148,'Welding','2016-05-07 17:12:40','2016-05-07 17:12:40'),(149,149,'Kayaking','2016-05-07 17:12:47','2016-05-07 17:12:47'),(150,150,'Search and Rescue','2016-05-07 17:12:55','2016-05-07 17:12:55'),(151,151,'Game Design','2016-05-07 17:13:03','2016-05-07 17:13:03'),(152,152,'Sustainability','2016-05-07 17:13:14','2016-05-07 17:13:14'),(153,153,'Programming','2016-05-07 17:13:21','2016-05-07 17:13:21'),(154,154,'Digital Technology','2016-05-07 17:13:32','2016-05-07 17:13:32'),(155,155,'Mining in Society','2016-05-07 17:13:45','2016-05-07 17:13:45'),(156,156,'Moviemaking','2016-05-07 17:13:56','2016-05-07 17:13:56'),(157,157,'Animation','2016-05-07 17:14:02','2016-05-07 17:14:02'),(158,158,'Signs, Signals, and Codes','2016-05-07 17:14:18','2016-05-07 17:14:18'),(159,159,'Computer-Aided Design','2016-05-07 17:14:38','2016-05-07 17:14:38'),(160,160,'Advanced Computing','2016-05-07 17:14:46','2016-05-07 17:14:46');
/*!40000 ALTER TABLE `badges` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `code_counselor`
--

DROP TABLE IF EXISTS `code_counselor`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `code_counselor` (
  `code_id` int(10) unsigned NOT NULL,
  `counselor_id` int(10) unsigned NOT NULL,
  PRIMARY KEY (`code_id`,`counselor_id`),
  KEY `code_counselor_code_id_index` (`code_id`),
  KEY `code_counselor_counselor_id_index` (`counselor_id`),
  CONSTRAINT `code_counselor_code_id_foreign` FOREIGN KEY (`code_id`) REFERENCES `codes` (`id`) ON DELETE CASCADE,
  CONSTRAINT `code_counselor_counselor_id_foreign` FOREIGN KEY (`counselor_id`) REFERENCES `counselors` (`id`) ON DELETE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `code_counselor`
--

LOCK TABLES `code_counselor` WRITE;
/*!40000 ALTER TABLE `code_counselor` DISABLE KEYS */;
INSERT INTO `code_counselor` VALUES (1,12),(4,12);
/*!40000 ALTER TABLE `code_counselor` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `codes`
--

DROP TABLE IF EXISTS `codes`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `codes` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `codes`
--

LOCK TABLES `codes` WRITE;
/*!40000 ALTER TABLE `codes` DISABLE KEYS */;
INSERT INTO `codes` VALUES (1,'AED','2016-05-18 03:04:21','2016-05-18 03:04:21'),(2,'CPR','2016-05-18 03:06:05','2016-05-18 03:06:05'),(3,'Red Cross First Aid CERT','2016-05-18 03:07:03','2016-05-18 03:07:03'),(4,'Wilderness First Aid','2016-05-18 03:07:45','2016-05-18 03:07:45');
/*!40000 ALTER TABLE `codes` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `councils`
--

DROP TABLE IF EXISTS `councils`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `councils` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `councils`
--

LOCK TABLES `councils` WRITE;
/*!40000 ALTER TABLE `councils` DISABLE KEYS */;
INSERT INTO `councils` VALUES (1,'Sam Houston Area Council','2016-05-06 14:59:49','2016-05-06 14:59:49');
/*!40000 ALTER TABLE `councils` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `counselors`
--

DROP TABLE IF EXISTS `counselors`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `counselors` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `first_name` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `last_name` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `address` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `city` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `state` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `zip` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `email` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `primary_phone` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `secondary_phone` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `unit_num` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `bsa_id` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `unit_only` tinyint(1) NOT NULL,
  `district_id` int(11) NOT NULL,
  `user_id` int(10) unsigned NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=27 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `counselors`
--

LOCK TABLES `counselors` WRITE;
/*!40000 ALTER TABLE `counselors` DISABLE KEYS */;
INSERT INTO `counselors` VALUES (12,'Luke','Sweeney','24888 Old Hwy. 6','Navasota','Texas','77868','luke@thesweeneys.org','979-383-9991','936-727-2027','159','123456789',0,1,1,'2016-05-11 02:03:34','2016-05-12 01:10:42'),(13,'David','Sweeney','24888 old Hwy. 6','Navasota','Tx','77868','david@thesweeneys.org','979-492-9598','936-727-2027','159','123456789',0,1,1,'2016-05-11 02:06:11','2016-05-11 02:06:14'),(14,'Tester','Tested','24888 Old Hwy. 6','test','test','test','test','test','test','test','test',0,1,2,'2016-05-11 02:40:37','2016-05-11 02:40:40'),(16,'Tester','Tested','test','test','test','test','luke@thesweeneys.org','test','test','test','test',0,1,1,'2016-05-13 19:58:19','2016-05-13 20:06:14'),(18,'Hannah','Sweeney','test','test','test','test','hannah@thesweeneys.rog','test','test','test','tets',0,2,1,'2016-05-13 20:17:43','2016-05-13 20:17:43'),(19,'Hannah','Sweeney','test','test','test','test','hannah@thesweeneys.rog','test','test','test','tets',0,2,1,'2016-05-13 20:18:17','2016-05-13 20:18:17'),(25,'Tester','3 Tested','test','test','test','test','test@test.test','test','test','test','test',0,1,6,'2016-05-18 01:13:31','2016-05-18 01:13:31'),(26,'David','Sweeney','test','test','tetshjasg','jhg','david@lskdjf.org','kajhsd','skdjfh','sdkjfh','sdkfjh',0,1,7,'2016-05-28 23:27:12','2016-05-28 23:27:12');
/*!40000 ALTER TABLE `counselors` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `districts`
--

DROP TABLE IF EXISTS `districts`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `districts` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `council_id` int(11) NOT NULL,
  `name` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `districts`
--

LOCK TABLES `districts` WRITE;
/*!40000 ALTER TABLE `districts` DISABLE KEYS */;
INSERT INTO `districts` VALUES (1,1,'Arrowmoon','2016-05-06 15:00:41','2016-05-06 15:00:41'),(2,1,'Brahmen','2016-05-06 15:01:43','2016-05-06 15:01:43');
/*!40000 ALTER TABLE `districts` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `migrations`
--

DROP TABLE IF EXISTS `migrations`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `migrations` (
  `migration` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `batch` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `migrations`
--

LOCK TABLES `migrations` WRITE;
/*!40000 ALTER TABLE `migrations` DISABLE KEYS */;
INSERT INTO `migrations` VALUES ('2014_10_12_000000_create_users_table',1),('2014_10_12_100000_create_password_resets_table',1),('2016_05_02_060406_create_badges_table',1),('2016_05_03_005222_create_counselors_table',1),('2016_05_04_045728_create_badge_counselor_pivot_table',1),('2016_05_04_191020_create_districts_table',1),('2016_05_04_194016_create_council_table',1),('2016_05_17_215253_create_codes_table',2),('2016_05_17_220003_create_code_counselor_pivot_table',2);
/*!40000 ALTER TABLE `migrations` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `password_resets`
--

DROP TABLE IF EXISTS `password_resets`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `password_resets` (
  `email` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `token` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  KEY `password_resets_email_index` (`email`),
  KEY `password_resets_token_index` (`token`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `password_resets`
--

LOCK TABLES `password_resets` WRITE;
/*!40000 ALTER TABLE `password_resets` DISABLE KEYS */;
/*!40000 ALTER TABLE `password_resets` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `users`
--

DROP TABLE IF EXISTS `users`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `users` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `email` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `password` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `isAdmin` int(11) NOT NULL,
  `remember_token` varchar(100) COLLATE utf8_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `users_email_unique` (`email`)
) ENGINE=InnoDB AUTO_INCREMENT=12 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `users`
--

LOCK TABLES `users` WRITE;
/*!40000 ALTER TABLE `users` DISABLE KEYS */;
INSERT INTO `users` VALUES (1,'Luke Sweeney','luke@thesweeneys.org','$2y$10$GlYRkN5xSsk2WNgXAlw8N.WY1ORe3oZg8u53DanUwMWQpjW4tIRNa',1,'w75I8MxXGC06GSQcKPqgpwypCqWUBGjomriuKJ92Kz2r0lszj7fnqCz5VkCu','2016-05-08 05:37:29','2016-05-31 21:09:48');
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

-- Dump completed on 2016-06-02 23:20:25
