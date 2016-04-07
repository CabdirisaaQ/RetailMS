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
-- Table structure for table `products`
--

DROP TABLE IF EXISTS `products`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `products` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `descripiton` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `barcode` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `itemInStock` int(11) NOT NULL,
  `quantityPerUnit` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `unitPrice` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `unitShelfPrice` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `itemPrice` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `itemShelfPrice` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `created_at` timestamp NOT NULL,
  `created_by` varchar(45) COLLATE utf8_unicode_ci NOT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `updated_by` varchar(45) CHARACTER SET utf8 DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `products_descripiton_unique` (`descripiton`),
  UNIQUE KEY `products_barcode_unique` (`barcode`)
) ENGINE=InnoDB AUTO_INCREMENT=7 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `products`
--

LOCK TABLES `products` WRITE;
/*!40000 ALTER TABLE `products` DISABLE KEYS */;
INSERT INTO `products` VALUES (1,'Bavaria 400ML','5410441100057',586,'24','16','24','0.6','1','2016-02-07 07:17:43','qabile','2016-03-18 08:18:56','qabile'),(2,'Rani 750ML','8805001108258',393,'24','8','12','0.3','0.5','2016-02-07 07:15:53','qabile','2016-03-16 08:45:33','qabile'),(3,'saxansaxo 1.00ML','6281100516071',800,'24','4.8','7.2','0.2','0.3','2016-02-07 07:14:26','qabile','2016-03-16 06:12:53','qabile'),(4,'saxansaxo 1.500ML','6281100516057',400,'12','66','66','88','0.5','2016-02-07 07:06:53','qabile','2016-03-15 06:00:25','qabile'),(5,'fanto','6281007025652',11,'24','44','444','44','21','2016-02-10 17:12:09','sandheere','2016-03-18 06:19:22','sandheere'),(6,'Today Donuts','7891000071809',4,'20','20','30','1','1.5','2016-03-16 06:15:50','sandheere','2016-03-18 06:19:22','sandheere');
/*!40000 ALTER TABLE `products` ENABLE KEYS */;
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
