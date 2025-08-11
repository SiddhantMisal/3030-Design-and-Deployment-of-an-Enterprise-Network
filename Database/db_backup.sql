/*M!999999\- enable the sandbox mode */ 
-- MariaDB dump 10.19  Distrib 10.11.11-MariaDB, for debian-linux-gnu (x86_64)
--
-- Host: localhost    Database: DITISS2025
-- ------------------------------------------------------
-- Server version	10.11.11-MariaDB-0+deb12u1

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
-- Table structure for table `users`
--

DROP TABLE IF EXISTS `users`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8mb4 */;
CREATE TABLE `users` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `username` varchar(50) NOT NULL,
  `password` varchar(255) NOT NULL,
  `created_at` timestamp NULL DEFAULT current_timestamp(),
  PRIMARY KEY (`id`),
  UNIQUE KEY `username` (`username`)
) ENGINE=InnoDB AUTO_INCREMENT=17 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `users`
--

LOCK TABLES `users` WRITE;
/*!40000 ALTER TABLE `users` DISABLE KEYS */;
INSERT INTO `users` VALUES
(1,'vipul','hashed_password_here','2025-07-23 07:11:11'),
(2,'shraddha','$2y$10$YZsFDT6Xqv.D1oTwKfv2vuls5foTI4wQ70nkMrihUiT/uze0atCwC','2025-07-23 07:20:23'),
(3,'vipulmore','$2y$10$ykokfBHB4FeNi1o2VcQjHOTBZ5WSvRZgzYT1ZZpnvTO4E/q9JwwD6','2025-07-23 13:49:55'),
(4,'siddhant','$2y$10$RrwTqxVhUs.Kv/xpHw/9zu.wVxUV8ZyGAAWXyso9Fty06GV/fJuSe','2025-07-24 03:02:14'),
(5,'siddhant1','$2y$10$vTJlYal5.VY4pphdXbsFceD/pkUYZIqQc7K25lzCUTcxl6FhVhka2','2025-07-24 03:18:13'),
(6,'sid','$2y$10$arK7trRuVGUAel39G9TAi.9/sysrem8RqAIXAD7ZiqQvPwgg4POH2','2025-07-24 03:19:45'),
(7,'abc','$2y$10$QQRB0rz1gpnNnTL6DHJYcOxygSb2raMKvan2Go2S51meXXJLGF962','2025-07-29 18:27:03'),
(8,'demo1','$2y$10$a0zjEDxFfTq3bHSDTAl0sOXHp2fTJ6VPvl0KXu4r9K5ThEK8A0Lf.','2025-07-29 18:28:01'),
(9,'siddhant10','$2y$10$N2Ln9V.Bgj8TxkRW4lN4OeEujbc6M/OUiMwLTBBUObspcZ25kZFi2','2025-08-05 06:39:20'),
(10,'misal','$2y$10$M90UDUZQh7qMitJdDFDSD.fwvY/ObSIa6Y7HtXz4/WRJAtMEohLyC','2025-08-05 06:40:07'),
(11,'sejal','$2y$10$I0ZnxGmjx3Of6Qdduvti8Ov..yJsBa47EUmODcaAx8lWClxoVkOpq','2025-08-06 05:08:40'),
(12,'tina','$2y$10$AFczrWt.BvQkQTVsjBy1hOT3dMD1EX/Htp1YCk5G29LJWirJfjRiy','2025-08-06 05:09:43'),
(13,'sid10','$2y$10$WQA.KyTzdrcE6asKzt7ize26LukmpCglvg235lrnKACa1K.b3YjhG','2025-08-07 13:21:33'),
(14,'tinku','$2y$10$/aKnSQe40/yJS/uY4PxaW.18qhR4TtYnAZf9cHv9V78eFzo7MYtw.','2025-08-10 07:24:23'),
(15,'pinki','$2y$10$L9wJcojKnItvyNwRpI4trea553js5Z9jZAB4999XbJ5gCSM3CqQd2','2025-08-10 08:00:45'),
(16,'minku','$2y$10$tk6SgkGoOOTP5LDlcePJfO06oJPMUYXxt4Up8OFOdArEf2y.yrxpu','2025-08-10 08:18:59');
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

-- Dump completed on 2025-08-13 10:46:05
