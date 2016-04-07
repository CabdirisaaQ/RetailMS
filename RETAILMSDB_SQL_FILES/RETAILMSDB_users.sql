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
-- Table structure for table `users`
--

DROP TABLE IF EXISTS `users`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `users` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `fname` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `lname` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `username` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `employment` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `permission` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `password` varchar(60) COLLATE utf8_unicode_ci NOT NULL,
  `remember_token` varchar(100) COLLATE utf8_unicode_ci DEFAULT NULL,
  `created_at` timestamp NOT NULL,
  `created_by` varchar(45) CHARACTER SET utf8 NOT NULL,
  `updated_by` varchar(45) CHARACTER SET utf8 DEFAULT NULL,
  `updated_at` varchar(45) COLLATE utf8_unicode_ci DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `users_username_unique` (`username`)
) ENGINE=InnoDB AUTO_INCREMENT=11 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `users`
--

LOCK TABLES `users` WRITE;
/*!40000 ALTER TABLE `users` DISABLE KEYS */;
INSERT INTO `users` VALUES (1,'cabdirisaaq','jaamac','qabile','manager','sa','$2y$10$giOC5vfu9sjUYc.NffnXWuAtNOWmx01B.eDRIGyQwg6VlnxgTjyUu','EOMfyp0hIM3g517AE82oWXdCJA9JiOxpsj28jOsPIxHzw1INAQOHreaafb9e','2016-02-01 16:14:42','qabile',NULL,'2016-03-18 07:21:16'),(2,'maxamed','dhakhtar','sandheere','manager','admin','$2y$10$TCeKihyXwa.sLUAg81URCurblBKeFjSlkb6MQvbnKAgezOTWFU8ta','F5v1ziWYizLKOllenJhOLb3D22nDTbwXF0lNt03MthtjdL8rFS9M4AaGRn32','2016-02-02 06:23:05','qabile',NULL,'2016-03-18 03:31:38'),(3,'cali','muuse','caabi','casheir','','$2y$10$IGSjAQen3jylUuTLxUeL3eiZe6nYOD.jOsmb.AMW7MM35jZ/hF62u','CSmKygbzi0PIQ5dhCzvC6Ddx8M2PbNEs70TlW70M2qIl7kN5jaezkaYYvK4a','2016-02-02 06:32:14','qabile','qabile','2016-03-16 06:01:18'),(4,'c.xamiid','cabdalle','ileeye','casheir','user','$2y$10$9Z8RewvfjW32Q/64EsBIwuPQO7CcrgVz0cfnrg0EBWbYPfX8/ngZi',NULL,'2016-02-03 06:32:44','qabile',NULL,NULL),(5,'xaaji','mataan','ina_mataan','casheir','user','$2y$10$jMK9ujCXWQuYt9Nkli3FDu0dEUKYuAYeJWrX89IYOo2u1U0F.Ki16',NULL,'2016-02-03 07:48:49','qabile',NULL,NULL),(6,'cawar','xaddi','xaddi','casheir','user','$2y$10$bao9MyM2ChO9KaSsn27f/uqqI1XxmR7HXVlplYGliQQrggVGTI3Va','4Fv2eEPhcbBZQaFlMQKvwxuPrZuCFCBFDw6KVghHT2EmzS5z5zcRR6se5KQy','2016-02-03 14:41:02','',NULL,'2016-02-10 16:59:53'),(7,'mukhtaar','nuur','cawad','casheir','user','$2y$10$.WcSH9zeCv7riLmUGlNSWuDo.vIAbQoyiczHWMdn814uoOCSYp.mq',NULL,'2016-02-04 04:32:01','',NULL,NULL),(8,'barcode','scanner','dhiidh','casheir','user','$2y$10$mokjN/gREMgkE5OWcgKs5.2skFFITjpRVPKpsWk3LSgRzsuerdWQa',NULL,'2016-02-04 04:44:52','',NULL,NULL),(9,'shukri','cumar','qurux','casheir','user','$2y$10$w1zUYfx9c6TKFbE.1t/I9u1h29Yqka3dgBYO8eyzNo/SUbQWdZb36','VjZWUbG5iHI7KlWJrfriUuhgWkhQKLLoeGt8sJDfnEbKclrP8p82p3lBHQuQ','2016-03-16 06:02:04','qabile',NULL,'2016-03-16 06:02:20'),(10,'ibrahin','ducaale','cawil','manager','admin','$2y$10$BJZ7UqsNinYq74NUWUd/6uGa.DsySYkgOd3B8.WJ0ggbccd3dTpbq','0yrXP15gKVTqHrxyJdQA2dVsW1q0VYgjn4q4TbsJTwJ2HNN16TY0v4Si8CaC','2016-03-16 06:04:08','sandheere',NULL,'2016-03-16 06:04:32');
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

-- Dump completed on 2016-03-19  6:29:24
