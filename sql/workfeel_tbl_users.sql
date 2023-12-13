-- MySQL dump 10.13  Distrib 8.0.31, for Win64 (x86_64)
--
-- Host: 45.136.254.234    Database: workfeel
-- ------------------------------------------------------
-- Server version	8.0.35-0ubuntu0.20.04.1

/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!50503 SET NAMES utf8 */;
/*!40103 SET @OLD_TIME_ZONE=@@TIME_ZONE */;
/*!40103 SET TIME_ZONE='+00:00' */;
/*!40014 SET @OLD_UNIQUE_CHECKS=@@UNIQUE_CHECKS, UNIQUE_CHECKS=0 */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;
/*!40111 SET @OLD_SQL_NOTES=@@SQL_NOTES, SQL_NOTES=0 */;

--
-- Table structure for table `tbl_users`
--

DROP TABLE IF EXISTS `tbl_users`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `tbl_users` (
  `userId` int NOT NULL AUTO_INCREMENT,
  `email` varchar(128) NOT NULL COMMENT 'login email',
  `password` varchar(128) NOT NULL COMMENT 'hashed login password',
  `name` varchar(128) DEFAULT NULL COMMENT 'full name of user',
  `mobile` varchar(20) DEFAULT NULL,
  `code` varchar(45) DEFAULT NULL,
  `roleId` tinyint NOT NULL,
  `isDeleted` tinyint NOT NULL DEFAULT '0',
  `createdBy` int NOT NULL,
  `createdDtm` datetime NOT NULL,
  `updatedBy` int DEFAULT NULL,
  `updatedDtm` datetime DEFAULT NULL,
  `address` varchar(500) DEFAULT NULL,
  `taxid` varchar(45) DEFAULT NULL,
  PRIMARY KEY (`userId`)
) ENGINE=MyISAM AUTO_INCREMENT=18 DEFAULT CHARSET=utf8mb3;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `tbl_users`
--

LOCK TABLES `tbl_users` WRITE;
/*!40000 ALTER TABLE `tbl_users` DISABLE KEYS */;
INSERT INTO `tbl_users` VALUES (1,'admin@admin.com','$2y$10$SAvFim22ptA9gHVORtIaru1dn9rhgerJlJCPxRNA02MjQaJnkxawq','System Administrator','9890098900',NULL,1,0,0,'2015-07-01 18:56:49',1,'2017-06-19 09:22:53',NULL,NULL),(2,'manager@admin.com','$2y$10$Gkl9ILEdGNoTIV9w/xpf3.mSKs0LB1jkvvPKK7K0PSYDsQY7GE9JK','สราวุธ','9890098900','M001',2,0,1,'2016-12-09 17:49:56',1,'2023-02-28 07:23:33','',''),(3,'employee@admin.com','$2y$10$DAOl11FzTbDVZ079JojgIu2D.ZdgoouzShPvMcXKsk.3n1oJPsBTq','วรวิช','9890098900','P001',4,0,1,'2016-12-09 17:50:22',1,'2023-03-09 08:17:22','',''),(4,'testcus@gmail.com','$2y$10$lpPickJlulHBAb.hb0yeveAcX7Z62evpKBSCuabwlxmy/.Nnhxhte','คุณวุฒิ','1234567890','wut',6,0,1,'2023-02-17 07:41:34',1,'2023-03-09 08:17:41','อุดร','-'),(5,'aladin@admin.com','$2y$10$AC8Pt3PU4xAiR9iR7zkktOJ8IMPIZxfjy/4x0yOWtsq6P91RB8N4q','อลาดิน พลาซ่า','0652132452','aladin',6,0,1,'2023-02-28 03:57:11',1,'2023-03-09 08:17:50','ddd','1234'),(6,'boom@admin.com','$2y$10$8mzCVDUnF0metho12j1ih.k0tnWz7yqAKkG13cUb3OwtXHhMWtuaG','คุณบูม','0626948583','ASB',6,0,1,'2023-02-28 07:22:37',1,'2023-03-09 08:17:57','กรุงเทพ','-'),(7,'weget@workfeel.com','$2y$10$DvKhjieTu3oRraJ25xEM6etDoipNIdbeO2Ynx.6.ueAxOkMtqrf7O','วีเก็ท','0918637865','weget',6,0,1,'2023-02-28 07:25:05',1,'2023-03-07 10:27:30','กรุงเทพ','-'),(8,'aniwat@admin.com','$2y$10$/RhCNI0GXmH3KrytHG9zjOEhhEfU/QuLmNQ3IXXvt9RUOHzNSRxwq','อนิวัตต์','0626948583','P001',4,0,1,'2023-02-28 07:26:15',NULL,NULL,'',''),(9,'pingpong@admin.com','$2y$10$VQKcBOB7Qx6UpkHWU9odMeK3P5noNxnuGj.rd6LephK9YoZMtXuzq','คุณปิงปอง','0626948583','ping',6,0,1,'2023-02-28 07:29:09',NULL,NULL,'กรุงเทพ','-'),(10,'dynamictechasia@gmail.com','$2y$10$vDvcdzISlT76VoIwIDmmB.OxCRYrpcWhfdMp7JSzfw4cRIfk80hG2','Product ไดนามิค เทค','0626948583','dmt02',6,0,1,'2023-02-28 07:47:50',NULL,NULL,'340 หมู่ 6\r\nต.กุดสระ','-'),(11,'wink@workfeel.com','$2y$10$WOuREK8zyumBrh10azDW7.j.XYqtp9yxS4uUh60j3NV2RJ4psaeuO','WINK','0626948583','wink',6,0,1,'2023-03-01 06:53:22',1,'2023-03-07 02:45:46','-','-'),(12,'warwut@gmail.com','$2y$10$MoPv/IJnh5dvUb.Auh25d.HQbY2ECpW5aqWju5y2rE.7vThgTxE.y','พี่โอ','0626948583','OO',6,0,1,'2023-03-01 07:42:05',NULL,NULL,'-','-'),(13,'smartkitchen@gmail.com','$2y$10$xuaMl3sybKVjG.O.lBY9CO.zyr/Be07s7r4MXVUQngvPmTdOfloL.','คุณนุ','0626948583','nu',6,0,1,'2023-03-04 05:30:09',1,'2023-03-07 08:55:49','340 หมู่ 6\r\nต.กุดสระ','-'),(14,'forest@workfeel.com','$2y$10$R53Dq4Pr7rmg7AL0BnGxQOGQt8FrRkzOw7vbzSqCxRnfWFx7hVnbG','forest','0626948583','forest',6,0,1,'2023-03-07 06:11:32',NULL,NULL,'340 หมู่ 6\r\nต.กุดสระ','-'),(15,'bat@workfeel.com','$2y$10$j/.k/dgx1tRrMm19/lWwxeLe4niessBqhMfRGwkH63/o0uy5xJhIa','BAT','0626948583','bat',6,0,1,'2023-03-07 09:30:55',NULL,NULL,'มหาสารคาม','-'),(16,'twd@workfeel.com','$2y$10$R27qVaW4yoXiK3OlMA8lAegtn1HpjlfzEWb6lcIE5u/qSs88QlQCO','TWD','0626948583','twd',6,0,1,'2023-03-13 09:39:25',1,'2023-03-13 09:39:56','',''),(17,'Grammick@gmail.com','$2y$10$6cEwpuq8DhG0AHudMt1AR.EUQynYobpDytIVerWwiyeP9/UN8a5i6','Grammick','0652132452','Grammick',6,0,1,'2023-08-31 04:55:23',NULL,NULL,'','');
/*!40000 ALTER TABLE `tbl_users` ENABLE KEYS */;
UNLOCK TABLES;
/*!40103 SET TIME_ZONE=@OLD_TIME_ZONE */;

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;

-- Dump completed on 2023-12-13 20:52:54
