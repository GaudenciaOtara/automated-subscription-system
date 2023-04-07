-- MySQL dump 10.17  Distrib 10.3.13-MariaDB, for Win64 (AMD64)
--
-- Host: localhost    Database: sub_system
-- ------------------------------------------------------
-- Server version	10.3.13-MariaDB

/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;
/*!40103 SET @OLD_TIME_ZONE=@@TIME_ZONE */;
/*!40103 SET TIME_ZONE='+00:00' */;
/*!40014 SET @OLD_UNIQUE_CHECKS=@@UNIQUE_CHECKS, UNIQUE_CHECKS=0 */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;
/*!40111 SET @OLD_SQL_NOTES=@@SQL_NOTES, SQL_NOTES=0 */;

--
-- Table structure for table `mpesa`
--

DROP TABLE IF EXISTS `mpesa`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `mpesa` (
  `id` int(7) NOT NULL AUTO_INCREMENT,
  `mpesanumber` varchar(12) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `mpesa`
--

LOCK TABLES `mpesa` WRITE;
/*!40000 ALTER TABLE `mpesa` DISABLE KEYS */;
/*!40000 ALTER TABLE `mpesa` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `registrations`
--

DROP TABLE IF EXISTS `registrations`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `registrations` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(250) NOT NULL,
  `email` varchar(250) NOT NULL,
  `password` blob DEFAULT NULL,
  `phone` varchar(250) NOT NULL,
  `plan` enum('basic','standart','premium') DEFAULT NULL,
  `date_created` datetime NOT NULL,
  `ip` varchar(15) DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `email` (`email`)
) ENGINE=MyISAM AUTO_INCREMENT=5 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `registrations`
--

LOCK TABLES `registrations` WRITE;
/*!40000 ALTER TABLE `registrations` DISABLE KEYS */;
INSERT INTO `registrations` VALUES (3,'Gaudencia','gaudenciaotara@gmail.com','xdf','0791958185','standart','2023-03-30 11:52:58','::1'),(4,'Gaudensia Otara','root@dfg.fth','1234','0791958185','standart','2023-04-05 05:36:57','::1');
/*!40000 ALTER TABLE `registrations` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `registrations_data`
--

DROP TABLE IF EXISTS `registrations_data`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `registrations_data` (
  `registration_date` varchar(30) NOT NULL,
  `day` varchar(30) NOT NULL,
  `count` varchar(30) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `registrations_data`
--

LOCK TABLES `registrations_data` WRITE;
/*!40000 ALTER TABLE `registrations_data` DISABLE KEYS */;
/*!40000 ALTER TABLE `registrations_data` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `transactions`
--

DROP TABLE IF EXISTS `transactions`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `transactions` (
  `id` int(7) NOT NULL AUTO_INCREMENT,
  `subscription_type` varchar(30) NOT NULL,
  `amount` int(5) NOT NULL,
  `payment_method` varchar(30) NOT NULL,
  `subscription_duration` int(10) NOT NULL,
  `day_time_started` varchar(30) NOT NULL,
  `subscription_date_end` varchar(30) NOT NULL,
  `subscription_autorenew` varchar(7) NOT NULL,
  `user_id` int(11) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=37 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `transactions`
--

LOCK TABLES `transactions` WRITE;
/*!40000 ALTER TABLE `transactions` DISABLE KEYS */;
INSERT INTO `transactions` VALUES (3,'Netflix',6,'mpesa',8,'4/5/2023 16:3:47','4/13/2023','0',2),(4,'Internet Subscription',500,'paypal',14,'4/5/2023 16:49:6','4/19/2023','0',3),(5,'HBO',100,'mpesa',31,'4/5/2023 17:5:21','5/6/2023','0',3),(6,'lloyds digest',300,'mpesa',2,'4/5/2023 21:52:5','4/7/2023','0',2),(7,'test',33,'mpesa',33,'4/5/2023 22:1:54','5/8/2023','0',3),(9,'Disney Plus',50,'paypal',7,'4/5/2023 22:13:13','4/12/2023','0',2),(10,'Books',333,'paypal',7,'4/5/2023 22:18:38','4/12/2023','0',2),(18,'Gaudencia Shop g',54,'mpesa',4,'4/5/2023 23:2:29','4/9/2023','0',2),(28,'Netflix',400,'mpesa',5,'4/6/2023 9:10:21','4/11/2023','0',2),(29,'Netflix',400,'mpesa',5,'4/6/2023 9:10:21','4/11/2023','0',2),(30,'Netflix',300,'mpesa',6,'4/6/2023 10:42:51','4/12/2023','0',19),(31,'Netflix',455,'mpesa',34,'4/6/2023 10:44:36','5/10/2023','0',2),(32,'Netflix',78,'mpesa',76,'4/6/2023 11:21:15','6/21/2023','0',2),(33,'Netflix',56,'mpesa',5,'4/6/2023 11:35:47','4/11/2023','0',19),(34,'HBO',500,'mpesa',125,'4/6/2023 12:39:33','8/9/2023','0',19),(35,'Books',300,'mpesa',52,'4/6/2023 12:54:43','5/28/2023','0',20),(36,'Netflix',400,'mpesa',45,'4/6/2023 12:55:33','5/21/2023','0',20);
/*!40000 ALTER TABLE `transactions` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `user_registrations`
--

DROP TABLE IF EXISTS `user_registrations`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `user_registrations` (
  `id` int(5) NOT NULL AUTO_INCREMENT,
  `fullname` char(35) DEFAULT NULL,
  `email` varchar(25) DEFAULT NULL,
  `password` varchar(10) DEFAULT NULL,
  `phonenumber` int(10) DEFAULT NULL,
  `mpesanumber` varchar(12) DEFAULT NULL,
  `registration_date` varchar(20) NOT NULL,
  `profile_picture` varchar(255) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=22 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `user_registrations`
--

LOCK TABLES `user_registrations` WRITE;
/*!40000 ALTER TABLE `user_registrations` DISABLE KEYS */;
INSERT INTO `user_registrations` VALUES (2,'Gaudencia Otara','gaudenciaotara@gmail.com','1234',791958185,'254791958185','','../Dashboard/profileimages/IMG_20220820_200927.jpg'),(3,'Rita Otara','oranyambura@gmail.com','1234',720226889,'25496562919','','../Dashboard/profileimages/IMG_20220921_233112.jpg'),(13,'Maria G','maria@gmail.com','1234',738059055,NULL,'2023-04-05 23:57:42',NULL),(18,'Esther O','estherr@gmail.com','1234',822389400,NULL,'2023-04-06 00:13:07',NULL),(19,'Kalani','kalani@gmail.com','1234',789654433,'254791958185','2023-04-06 09:40:02','../Dashboard/profileimages/IMG_20220813_174214.jpg'),(20,'Mike','kush21@gmail.com','0987',105081547,'254727433171','2023-04-06 11:47:47','../Dashboard/profileimages/IMG_20220627_124831.jpg'),(21,'Calvin','calvin12@gmail.com','000',712345678,'254710764518','2023-04-06 12:10:38','../Dashboard/profileimages/IMG_20220627_124831.jpg');
/*!40000 ALTER TABLE `user_registrations` ENABLE KEYS */;
UNLOCK TABLES;
/*!40103 SET TIME_ZONE=@OLD_TIME_ZONE */;

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;

-- Dump completed on 2023-04-07  9:04:47
