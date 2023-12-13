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
-- Table structure for table `tbl_ins`
--

DROP TABLE IF EXISTS `tbl_ins`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `tbl_ins` (
  `id` int NOT NULL AUTO_INCREMENT,
  `id_project` int NOT NULL,
  `ins_num` varchar(45) DEFAULT NULL COMMENT 'เลขที่งวด',
  `ins_col` varchar(45) DEFAULT NULL COMMENT 'กำหนดเก็บงวด',
  `createdBy` int NOT NULL,
  `createdDtm` datetime DEFAULT CURRENT_TIMESTAMP,
  `updatedBy` int DEFAULT NULL,
  `updatedDtm` datetime DEFAULT NULL,
  `isDeleted` tinyint DEFAULT '0',
  `payment_status` tinyint DEFAULT '0' COMMENT '0ยังไม่ชำระ 1ชำระแล้ว',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=68 DEFAULT CHARSET=utf8mb3;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `tbl_ins`
--

LOCK TABLES `tbl_ins` WRITE;
/*!40000 ALTER TABLE `tbl_ins` DISABLE KEYS */;
INSERT INTO `tbl_ins` VALUES (1,1,'1','16/02/2023',1,'2023-02-16 04:23:11',1,'2023-02-16 05:22:59',1,0),(2,1,'1','16/02/2023',1,'2023-02-16 04:23:22',NULL,NULL,0,0),(3,1,'2','17/02/2023',1,'2023-02-16 04:23:37',1,'2023-02-16 04:57:30',0,0),(4,4,'2','16/01/2023',1,'2023-02-21 02:55:39',1,'2023-03-02 08:19:46',0,1),(5,4,'3','17/02/2023',1,'2023-02-21 03:09:25',1,'2023-03-02 08:19:42',0,1),(6,5,'1','22/02/2023',1,'2023-02-22 01:23:29',1,'2023-03-02 07:11:04',0,1),(7,5,'2','22/02/2023',1,'2023-02-22 01:23:35',1,'2023-03-02 07:10:59',0,1),(8,6,'1','15/03/2023',1,'2023-02-22 04:28:27',1,'2023-03-02 07:28:43',0,1),(9,6,'2','31/03/2023',1,'2023-02-22 04:28:34',1,'2023-04-05 01:22:53',0,1),(10,6,'3','30/11/2023',1,'2023-02-22 04:28:59',1,'2023-08-31 04:44:27',0,0),(11,9,'1','22/02/2023',1,'2023-02-22 04:54:44',1,'2023-03-02 07:09:25',0,1),(12,4,'1','14/10/2022',1,'2023-02-22 08:32:26',1,'2023-03-02 08:19:37',0,1),(13,4,'4','30/11/2023',1,'2023-02-22 08:43:33',1,'2023-08-31 04:47:08',0,0),(14,7,'4','24/02/2023',1,'2023-02-24 02:58:04',NULL,NULL,0,0),(15,8,'3','30/11/2023',1,'2023-02-24 02:58:34',1,'2023-08-31 04:46:16',0,0),(16,6,'4','30/11/2023',1,'2023-02-24 03:29:55',1,'2023-08-31 04:44:33',0,0),(17,9,'2','02/01/2023',1,'2023-02-24 04:31:26',1,'2023-03-02 07:09:30',0,1),(18,9,'3','24/01/2023',1,'2023-02-24 04:31:33',1,'2023-03-02 07:09:34',0,1),(19,9,'4','28/02/2023',1,'2023-02-24 04:31:39',1,'2023-03-02 07:09:39',0,1),(20,10,'1','24/02/2023',1,'2023-02-24 04:34:00',1,'2023-03-02 04:37:29',0,1),(21,10,'2','31/03/2023',1,'2023-02-24 04:43:38',1,'2023-03-02 04:37:33',0,1),(22,9,'5','31/05/2023',1,'2023-02-28 09:12:32',1,'2023-05-02 08:00:38',0,0),(23,14,'1','28/02/2023',1,'2023-03-01 04:47:02',1,'2023-03-02 07:11:17',0,1),(24,15,'1','04/04/2023',1,'2023-03-01 07:02:25',1,'2023-04-04 07:47:26',0,1),(25,15,'2','11/09/2023',1,'2023-03-01 07:06:38',1,'2023-08-31 04:51:07',0,0),(26,15,'3','30/09/2023',1,'2023-03-01 07:19:56',1,'2023-08-31 04:50:51',0,0),(27,15,'4','06/10/2023',1,'2023-03-01 07:26:50',1,'2023-08-31 04:50:59',0,0),(28,15,'5','08/11/2024',1,'2023-03-01 07:33:14',1,'2023-04-10 02:02:43',0,0),(29,16,'3','30/11/2023',1,'2023-03-01 07:43:27',1,'2023-08-31 04:47:49',0,0),(30,17,'1','10/03/2023',1,'2023-03-02 03:18:11',1,'2023-03-02 03:18:28',0,1),(31,18,'1','01/03/2023',1,'2023-03-02 07:14:21',NULL,NULL,0,0),(32,14,'test','02/03/2023',3,'2023-03-02 07:16:17',3,'2023-03-02 07:22:42',1,0),(33,19,'1','05/03/2023',1,'2023-03-02 10:20:13',NULL,NULL,0,0),(34,20,'1','07/03/2023',1,'2023-03-04 05:30:37',1,'2023-03-08 09:40:37',0,1),(35,20,'2','17/03/2023',1,'2023-03-07 06:07:13',1,'2023-03-20 01:53:16',0,1),(36,20,'3','12/04/2023',1,'2023-03-07 06:09:53',1,'2023-04-12 06:47:28',0,1),(37,21,'4','30/04/2023',1,'2023-03-07 06:10:28',1,'2023-05-15 03:04:49',0,1),(38,23,'1','09/03/2023',1,'2023-03-10 07:48:05',1,'2023-03-10 07:48:14',0,1),(39,23,'2','09/11/2023',1,'2023-03-10 07:48:21',1,'2023-08-31 04:47:26',0,0),(40,24,'1','13/03/2023',1,'2023-03-13 09:38:38',1,'2023-03-13 09:38:43',0,1),(41,24,'2','23/03/2023',1,'2023-03-13 09:38:49',1,'2023-03-20 01:55:14',0,0),(42,20,'4','30/04/2023',1,'2023-03-13 09:43:43',1,'2023-05-02 07:57:23',0,1),(43,26,'1','22/03/2023',1,'2023-03-22 02:03:41',1,'2023-03-22 02:03:46',0,1),(44,28,'1','24/03/2023',1,'2023-03-24 10:18:29',1,'2023-08-31 05:13:34',0,1),(45,29,'1','24/03/2023',1,'2023-03-24 10:52:19',1,'2023-04-12 06:47:56',0,1),(46,30,'1','04/04/2023',1,'2023-04-04 07:45:26',1,'2023-04-04 07:45:30',0,1),(47,32,'1','09/04/2023',1,'2023-04-12 06:48:19',1,'2023-04-12 06:48:24',0,1),(48,32,'2','21/11/2023',1,'2023-04-12 06:48:37',1,'2023-08-31 04:46:03',0,0),(49,31,'1','09/04/2023',1,'2023-04-12 06:48:59',1,'2023-04-12 06:49:04',0,1),(50,31,'2','21/11/2023',1,'2023-04-12 06:49:12',1,'2023-08-31 04:45:39',0,0),(51,31,'3','05/11/2023',1,'2023-04-12 06:49:27',1,'2023-08-31 04:45:33',0,0),(52,25,'1','02/04/2023',1,'2023-04-12 06:50:26',1,'2023-04-12 06:50:32',0,1),(53,25,'2','11/04/2023',1,'2023-04-12 06:50:44',NULL,NULL,0,0),(54,34,'1','28/04/2023',1,'2023-05-02 07:56:28',1,'2023-05-02 07:56:32',0,1),(55,34,'2','12/05/2023',1,'2023-05-02 07:56:44',1,'2023-08-31 05:13:16',0,1),(56,34,'3','19/05/2023',1,'2023-05-02 07:56:52',1,'2023-08-31 05:13:20',0,1),(57,20,'5','19/05/2023',1,'2023-05-02 07:57:14',1,'2023-05-25 08:12:47',0,1),(58,35,'1','09/06/2023',1,'2023-05-20 01:55:26',1,'2023-08-04 03:00:20',0,1),(59,20,'6','30/05/2023',1,'2023-05-25 08:13:09',1,'2023-05-30 04:33:46',1,0),(60,36,'1','30/05/2023',1,'2023-05-30 04:34:29',NULL,NULL,0,0),(61,37,'1','30/05/2023',1,'2023-05-30 04:35:54',1,'2023-05-30 04:36:00',0,1),(62,37,'2','16/06/2023',1,'2023-05-30 04:36:10',1,'2023-08-04 03:00:56',0,1),(63,37,'3','05/09/2023',1,'2023-05-30 04:36:22',1,'2023-08-31 05:02:01',0,0),(64,37,'4','30/07/2023',1,'2023-05-30 04:36:31',NULL,NULL,0,0),(65,40,'1','25/07/2023',1,'2023-08-04 03:03:34',1,'2023-08-04 03:03:40',0,1),(66,40,'2','02/09/2023',1,'2023-08-04 03:03:48',1,'2023-08-31 04:49:42',0,0),(67,40,'3','25/09/2023',1,'2023-08-04 03:04:04',1,'2023-08-31 04:49:50',0,0);
/*!40000 ALTER TABLE `tbl_ins` ENABLE KEYS */;
UNLOCK TABLES;
/*!40103 SET TIME_ZONE=@OLD_TIME_ZONE */;

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;

-- Dump completed on 2023-12-13 20:52:56
