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
-- Table structure for table `tbl_issues`
--

DROP TABLE IF EXISTS `tbl_issues`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `tbl_issues` (
  `id` int NOT NULL AUTO_INCREMENT,
  `checklist_id` int NOT NULL,
  `topic` varchar(250) NOT NULL,
  `date` varchar(45) DEFAULT NULL,
  `status_dev` tinyint DEFAULT '0' COMMENT '0 ยังไม่ทำ 1 ทำแล้ว',
  `status_test` tinyint DEFAULT '0' COMMENT '0 ยังไม่ทำ 1 ทำแล้ว',
  `status_cus` tinyint DEFAULT '0',
  `date_success` varchar(45) DEFAULT NULL,
  `date_cus` varchar(45) DEFAULT NULL,
  `important` varchar(45) DEFAULT NULL COMMENT 'low medium high critical',
  `createdBy` int DEFAULT NULL,
  `createdDtm` datetime DEFAULT NULL,
  `updatedDtm` datetime DEFAULT NULL,
  `updatedBy` int DEFAULT NULL,
  `isDeleted` tinyint DEFAULT '0',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=10 DEFAULT CHARSET=utf8mb3;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `tbl_issues`
--

LOCK TABLES `tbl_issues` WRITE;
/*!40000 ALTER TABLE `tbl_issues` DISABLE KEYS */;
INSERT INTO `tbl_issues` VALUES (1,1,'test','2023-02-20',0,0,0,NULL,NULL,'low',1,'2023-02-20 08:34:41','2023-02-21 08:32:30',1,1),(2,1,'test','2023-02-22',0,0,0,NULL,NULL,'low',1,'2023-02-22 02:41:56',NULL,NULL,0),(3,25,'เพิ่มขนาด ฟิลด์ topic ทุกที่','2023-03-01',0,0,0,NULL,NULL,'critical',1,'2023-03-01 04:57:25',NULL,NULL,0),(4,25,'ชื่อหน้า issue เป็นรายละเอียด','2023-03-01',0,0,0,NULL,NULL,'low',1,'2023-03-01 04:57:46',NULL,NULL,0),(5,26,'สถานะ support ไม่ขึ้น','2023-03-01',1,0,0,'2023-03-01',NULL,'low',1,'2023-03-01 04:59:16','2023-03-01 09:02:38',3,0),(6,46,'อัพโหลดรูปไม่ได้','2023-03-02',0,0,0,NULL,NULL,'high',1,'2023-03-02 04:21:47',NULL,NULL,0),(7,60,'เมนูชิดฝั่งซ้ายเกินไป','2023-03-07',0,0,0,NULL,NULL,'medium',1,'2023-03-07 02:31:21',NULL,NULL,0),(8,94,'ลูกค้าแจ้งสมัครยาก','2023-03-07',0,0,0,NULL,NULL,'medium',1,'2023-03-07 04:01:23',NULL,NULL,0),(9,145,'ปุ่ม add ทับรายการที่จะเลือก และเลือกเสร็จแล้วกด add ไม่ได้','2023-03-27',0,0,0,NULL,NULL,'low',1,'2023-03-27 05:57:30',NULL,NULL,0);
/*!40000 ALTER TABLE `tbl_issues` ENABLE KEYS */;
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
