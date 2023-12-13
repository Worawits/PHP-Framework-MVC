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
-- Table structure for table `tbl_project`
--

DROP TABLE IF EXISTS `tbl_project`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `tbl_project` (
  `id` int NOT NULL AUTO_INCREMENT,
  `name` varchar(250) NOT NULL COMMENT 'ชื่อโปรเจค',
  `type` varchar(45) CHARACTER SET utf8mb3 COLLATE utf8mb3_general_ci NOT NULL COMMENT 'ประเภทโปรเจค',
  `ins` int DEFAULT '0' COMMENT 'งวด',
  `start_date` varchar(45) DEFAULT NULL COMMENT 'วันที่เริ่ม',
  `end_date` varchar(45) DEFAULT NULL COMMENT 'วันที่สิ้นสุด',
  `cus_id` varchar(45) NOT NULL COMMENT 'รหัสลูกค้า',
  `date_dev` int DEFAULT '0' COMMENT 'จำนวนวันพัฒนาประมาณการ',
  `status` tinyint DEFAULT '0' COMMENT '0ยังไม่เริ่ม 1กำลังทำ 2เสร็จแล้ว 3รอsupport 4ยกเลิก',
  `line_token` varchar(100) DEFAULT NULL,
  `createdBy` int NOT NULL,
  `createdDtm` datetime DEFAULT CURRENT_TIMESTAMP,
  `updatedBy` int DEFAULT NULL,
  `updatedDtm` datetime DEFAULT NULL,
  `isDeleted` tinyint DEFAULT '0' COMMENT '0 active 1 unactive',
  `detail` longtext CHARACTER SET utf8mb3 COLLATE utf8mb3_general_ci COMMENT 'รายละเอียด',
  `backgroundColor` varchar(45) DEFAULT '#d2d6de',
  `borderColor` varchar(45) DEFAULT '#000',
  `textColor` varchar(45) DEFAULT '#000',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=42 DEFAULT CHARSET=utf8mb3;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `tbl_project`
--

LOCK TABLES `tbl_project` WRITE;
/*!40000 ALTER TABLE `tbl_project` DISABLE KEYS */;
INSERT INTO `tbl_project` VALUES (1,'test','test2',11,'2023-02-16','2023-02-17','test12',12,1,NULL,1,'2023-02-15 05:12:50',1,'2023-02-22 04:05:49',1,'',NULL,NULL,'#fff'),(2,'test','test',1,'2023-02-21','2023-02-22','112',1,0,NULL,1,'2023-02-21 02:36:54',1,'2023-02-22 04:05:53',1,'test',NULL,NULL,'#fff'),(3,'test','test',1,'2023-02-21','2023-02-21','12',1,0,NULL,1,'2023-02-21 02:37:27',1,'2023-02-22 04:28:12',1,'หฟกหกฟหกฟหกฟหก',NULL,NULL,'#fff'),(4,'Aladin Plaza','Web & Application',4,'2021-10-08','2023-03-23','5',30,3,'',1,'2023-02-21 02:53:18',1,'2023-03-08 09:15:49',0,'ประชุมอัพเดทงานตามงวดงาน 4 ครั้ง และหลังงวดสุดท้ายที่ขึ้นใช้จริงเต็มระบบไปแล้ว 15 วัน ประชุมครั้งที่ 5 จบงาน ',NULL,NULL,'#fff'),(5,'Booktoyou','web',3,'2028-11-28','2024-08-01','4',60,3,'',1,'2023-02-22 01:22:58',1,'2023-03-07 04:01:47',0,'',NULL,NULL,'#fff'),(6,'VOKKEE','web',4,'2028-03-08','2023-08-02','7',90,3,'IPhrZ0jpo2RraoQOH87cRUGbC8vWHXJSMgP10sH4K8b',1,'2023-02-22 04:05:43',1,'2023-05-02 07:58:23',0,'','','','#fff'),(7,'Sun spring','app',4,'2023-01-01','2023-02-28','forest',90,0,NULL,1,'2023-02-22 04:13:23',NULL,NULL,0,'',NULL,NULL,'#fff'),(8,'starhubtutor','web',4,'2023-01-03','2023-02-22','9',30,3,'',1,'2023-02-22 04:27:55',1,'2023-03-07 04:02:32',0,'',NULL,NULL,'#fff'),(9,'Beyond','App',4,'2024-11-01','2023-02-28','6',90,1,'cuY8pv8SaN9fQTw6Z2NwRm8xRfDZjJl7EiB01MVvZkt',1,'2023-02-22 04:54:34',1,'2023-03-02 06:55:34',0,'',NULL,NULL,'#fff'),(10,'Naenoi','App',9,'2023-02-24','2023-03-31','10',60,3,'',1,'2023-02-24 03:36:30',1,'2023-08-04 03:04:35',0,'','','','#fff'),(11,'mahasap','app',4,'2023-01-03','2023-02-28','sek',60,0,NULL,1,'2023-02-27 05:02:25',NULL,NULL,0,'',NULL,NULL,'#fff'),(12,'หหหห','หหห',10,'2023-02-27','2023-02-27','หห',10,0,NULL,1,'2023-02-27 06:42:51',1,'2023-02-27 06:42:58',1,'',NULL,NULL,'#fff'),(13,'COOMA','app',1,'2023-02-01','2024-05-28','10',30,3,'',1,'2023-02-28 07:55:22',1,'2023-03-07 04:06:46',0,'',NULL,NULL,'#fff'),(14,'Work feel','web',1,'2023-08-01','2023-06-08','10',100,3,'VNC65SsG1bgpIA4XLCXNOOIJZYysf1xKZXvPys4Syq2',1,'2023-03-01 04:46:43',1,'2023-03-10 11:33:13',0,'','#d2d6de','#000','#000'),(15,'WINK','web&app',5,'2023-04-04','2023-06-09','11',90,1,'',1,'2023-03-01 06:54:25',1,'2023-04-04 07:45:01',0,'Application และ Web','','','#fff'),(16,'WebTransfer','web',3,'2023-01-02','2023-02-01','12',30,3,'',1,'2023-03-01 07:43:09',1,'2023-03-07 04:02:18',0,'',NULL,NULL,'#fff'),(17,'StoryLog','web',1,'2023-03-01','2023-03-17','4',20,3,'wn1hc5hB1aS7pyWbnlAvOU12IBLvsWph5ailEO9P5DN',1,'2023-03-01 14:49:08',1,'2023-08-04 03:05:02',0,'เว็บเหมือน story log','','','#fff'),(18,'WebGame','web',2,'2023-03-02','2023-03-31','12',30,0,'',1,'2023-03-02 07:14:09',1,'2023-03-08 09:30:31',1,'',NULL,NULL,'#fff'),(19,'นัดประชุม  vokkee','web',1,'2023-03-07','2026-09-06','7',1,2,'',1,'2023-03-02 10:19:44',1,'2023-03-09 10:22:36',1,'',NULL,NULL,'#fff'),(20,'Smart Kitchen','app',3,'2023-03-07','2023-04-30','13',30,3,'ClzQLUwJzZW7Kmu4Vi5hlItrrEUmpjeMxdzRIOzfUzd',1,'2023-03-04 05:29:33',1,'2023-08-04 03:00:40',0,'','','','#fff'),(21,'Sun spring','app',4,'2021-03-07','2022-11-25','14',90,2,'',1,'2023-03-07 04:04:37',1,'2023-06-13 04:29:37',0,'','','','#fff'),(22,'Justnow','app',4,'2020-10-07','2023-03-31','15',90,3,'',1,'2023-03-07 09:29:59',1,'2023-03-07 09:37:24',0,'',NULL,NULL,'#fff'),(23,'BlockchainToken (LDT)','blockchain',2,'2027-01-10','2023-03-31','12',30,3,'dbonRuYU8ZpHBzfjqpxQn3qIM2i1aPB0ZDs6D3egOxK',1,'2023-03-09 04:58:09',1,'2023-04-10 03:48:16',0,'','','',''),(24,'TWD 13032023','web',2,'2023-03-13','2023-03-20','16',15,1,'',1,'2023-03-13 09:38:29',1,'2023-03-15 09:02:55',0,'','','',''),(25,'web loas','web',2,'2024-12-20','2023-03-28','12',7,3,'',1,'2023-03-20 02:12:36',1,'2023-04-12 06:51:02',0,'','','',''),(26,'MKTent','web',10,'2023-01-01','2024-05-31','10',30,3,'',1,'2023-03-22 02:03:11',1,'2023-03-22 02:03:24',0,'เต็นท์มังกร','','',''),(27,'Aris','web',1,'2023-07-24','2023-04-24','10',120,3,'',1,'2023-03-24 09:09:10',1,'2023-03-24 10:21:59',0,'','','',''),(28,'ceo link','web',1,'2023-05-24','2023-03-31','6',15,1,'',1,'2023-03-24 09:09:52',1,'2023-05-20 01:56:43',0,'','','',''),(29,'bridge chain project','blockchain',2,'2023-03-25','2023-03-31','6',15,2,'',1,'2023-03-24 10:21:48',1,'2023-04-05 04:01:31',0,'','','',''),(30,'nacci','web',1,'2023-11-13','2023-04-06','10',5,2,'',1,'2023-04-04 07:44:31',1,'2023-06-13 04:29:15',0,'','','',''),(31,'ระบบสินค้าการเกษตรลาว','Web',3,'2023-12-13','2023-04-21','12',15,1,'',1,'2023-04-09 04:57:36',1,'2023-06-13 04:27:14',0,'','','',''),(32,'แอพเกษตรกร ลาว','App',3,'2023-04-10','2023-04-21','12',15,1,'',1,'2023-04-09 04:58:35',1,'2023-04-12 06:46:59',0,'','','',''),(33,'Skill','web',1,'2023-04-10','2026-02-12','10',30,3,'',1,'2023-04-10 03:58:51',1,'2023-05-30 04:31:09',0,'','','',''),(34,'GURU app','app',3,'2023-05-02','2023-08-02','6',15,1,'',1,'2023-05-02 07:56:13',1,'2023-05-02 07:58:04',0,'','','',''),(35,'boonma new server','App',1,'2023-05-24','2023-05-25','10',3,3,'',1,'2023-05-20 01:55:10',1,'2023-08-04 03:00:07',0,'เพิ่ม spec server','','',''),(36,'Smart kichen Payment','app',1,'2023-05-25','2023-05-30','13',3,1,'',1,'2023-05-30 04:34:18',1,'2023-06-09 04:42:09',0,'','','',''),(37,'Pick Service','APP',4,'2026-05-30','2023-07-30','15',50,1,'',1,'2023-05-30 04:35:43',1,'2023-05-30 04:36:43',0,'','','',''),(38,'story log เชื่อมโดเมน','web',1,'2023-05-30','2023-05-31','4',30,2,'',1,'2023-05-30 15:41:55',1,'2023-06-09 04:40:50',0,'','','',''),(39,'WINK AI','app',4,'2023-06-16','2023-06-23','11',90,0,'',1,'2023-06-09 04:41:57',NULL,NULL,0,'','','',''),(40,'MCIC','web',3,'2023-07-17','2023-08-31','10',60,1,'',1,'2023-08-04 03:03:09',1,'2023-08-04 03:03:17',0,'','','',''),(41,'ปรับแก้ API','web',1,'2023-07-15','2023-07-15','17',1,0,'',1,'2023-08-31 04:54:53',1,'2023-08-31 04:55:40',0,'','','','');
/*!40000 ALTER TABLE `tbl_project` ENABLE KEYS */;
UNLOCK TABLES;
/*!40103 SET TIME_ZONE=@OLD_TIME_ZONE */;

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;

-- Dump completed on 2023-12-13 20:52:58
