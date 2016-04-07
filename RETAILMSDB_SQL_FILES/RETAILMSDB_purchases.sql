-- MySQL dump 10.13  Distrib 5.7.9, for linux-glibc2.5 (x86_64)
--
-- Host: 127.0.0.1    Database: RETAILMSDB
-- ------------------------------------------------------
-- Server version	5.7.10

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
-- Table structure for table `purchases`
--

DROP TABLE IF EXISTS `purchases`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `purchases` (
  `transactionId` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `purchasesNo` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `vendorId` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `productId` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `unitsInOrder` int(11) NOT NULL,
  `unitPrice` int(11) NOT NULL,
  `total` int(11) NOT NULL,
  `cash` int(11) DEFAULT NULL,
  `credit` int(11) DEFAULT NULL,
  `created_at` timestamp NOT NULL,
  `created_by` varchar(255) CHARACTER SET utf8 NOT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `updated_by` varchar(255) CHARACTER SET utf8 DEFAULT NULL,
  PRIMARY KEY (`transactionId`)
) ENGINE=InnoDB AUTO_INCREMENT=45 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `purchases`
--

LOCK TABLES `purchases` WRITE;
/*!40000 ALTER TABLE `purchases` DISABLE KEYS */;
INSERT INTO `purchases` VALUES (4,'000001','3','3',500,10,5000,5000,0,'2016-02-07 14:36:26','sandheere','2016-02-09 07:55:49','sandheere'),(6,'000001','3','3',500,10,5000,5000,0,'2016-02-07 14:39:06','sandheere','2016-02-09 07:55:49','sandheere'),(7,'000001','3','3',500,10,5000,5000,0,'2016-02-07 14:40:26','sandheere','2016-02-09 07:55:49','sandheere'),(8,'000001','3','3',500,10,5000,5000,0,'2016-02-07 14:40:34','sandheere','2016-02-09 07:55:49','sandheere'),(9,'000001','3','3',500,10,5000,5000,0,'2016-02-07 14:41:05','sandheere','2016-02-09 07:55:49','sandheere'),(10,'000001','3','3',500,10,5000,5000,0,'2016-02-07 14:41:14','sandheere','2016-02-09 07:55:49','sandheere'),(11,'000001','3','3',500,10,5000,5000,0,'2016-02-07 14:41:52','sandheere','2016-02-09 07:55:49','sandheere'),(12,'000001','3','1',30,10,5000,5000,0,'2016-02-07 14:52:18','sandheere','2016-02-09 07:55:49','sandheere'),(14,'000001','3','1',500,10,5000,5000,0,'2016-02-07 14:56:25','sandheere','2016-02-09 07:55:49','sandheere'),(15,'000001','0','1',30,5,5000,5000,0,'2016-02-07 14:57:13','sandheere','2016-02-09 07:55:49','sandheere'),(16,'000001','0','2',500,4,5000,5000,0,'2016-02-07 14:57:35','sandheere','2016-02-09 07:55:49','sandheere'),(19,'000002','2','1',500,10,289,289,0,'2016-02-08 14:54:09','sandheere','2016-02-09 07:56:07','sandheere'),(20,'000002','0','1',30,10,641,641,0,'2016-02-08 14:54:55','sandheere','2016-02-09 07:56:07','sandheere'),(21,'000003','5','4',45,10,450,450,0,'2016-02-08 14:56:41','sandheere','2016-02-09 08:35:28','sandheere'),(22,'000004','6','4',30,5,170,170,0,'2016-02-09 05:43:52','qabile','2016-02-09 05:43:52','sandheere'),(23,'000005','2','3',500,5,641,641,0,'2016-02-09 08:13:25','qabile','2016-02-09 08:50:09','qabile'),(24,'000005','2','3',500,5,641,641,0,'2016-02-09 08:16:37','qabile','2016-02-09 08:50:09','qabile'),(25,'000005','2','3',500,5,641,641,0,'2016-02-09 08:18:49','qabile','2016-02-09 08:50:09','qabile'),(26,'000005','2','3',500,5,641,641,0,'2016-02-09 08:22:23','qabile','2016-02-09 08:50:09','qabile'),(27,'000005','2','3',500,5,641,641,0,'2016-02-09 08:25:34','qabile','2016-02-09 08:50:09','qabile'),(28,'000005','2','3',500,5,641,641,0,'2016-02-09 08:30:46','sandheere','2016-02-09 08:50:09','qabile'),(29,'000006','1','2',45,4,170,170,0,'2016-02-09 08:33:30','sandheere','2016-02-09 08:52:12','qabile'),(30,'000007','3','2',30,4,170,170,0,'2016-02-09 08:54:35','sandheere','2016-02-09 14:56:55','qabile'),(31,'000008','6','1',30,10,170,170,0,'2016-02-09 08:59:14','sandheere','2016-02-09 14:57:42','qabile'),(32,'000009','6','1',30,4,170,170,0,'2016-02-09 09:00:11','sandheere','2016-02-09 14:57:54','qabile'),(33,'000010','3','1',500,10,170,170,0,'2016-02-09 09:01:39','sandheere','2016-02-09 14:59:58','qabile'),(34,'000011','3','3',30,10,641,641,0,'2016-02-09 14:52:36','qabile','2016-02-10 17:03:16','sandheere'),(35,'000012','1006','5',60,10,600,600,0,'2016-02-10 17:15:56','sandheere','2016-02-10 17:31:16','sandheere'),(37,'000012','0','4',668,66,87,87,0,'2016-02-10 17:16:55','sandheere','2016-02-10 17:31:16','sandheere'),(39,'000013','0','1',777,77,4444,4444,0,'2016-02-10 17:23:20','sandheere','2016-02-10 17:26:30','sandheere'),(40,'000014','2','2',45,44,1980,1500,480,'2016-03-12 18:42:13','qabile',NULL,NULL),(41,'000014','0','1',10,77,770,770,0,'2016-03-12 18:42:38','qabile',NULL,NULL),(42,'000014','0','3',14,55,770,600,170,'2016-03-12 18:42:53','qabile',NULL,NULL),(43,'000015','1007','6',6,20,120,50,70,'2016-03-16 06:19:01','sandheere',NULL,NULL),(44,'000015','0','5',5,44,220,220,0,'2016-03-16 06:19:22','sandheere',NULL,NULL);
/*!40000 ALTER TABLE `purchases` ENABLE KEYS */;
UNLOCK TABLES;
/*!40103 SET TIME_ZONE=@OLD_TIME_ZONE */;

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;

-- Dump completed on 2016-03-19  6:29:24
