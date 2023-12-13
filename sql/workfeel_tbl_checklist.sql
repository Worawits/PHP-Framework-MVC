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
-- Table structure for table `tbl_checklist`
--

DROP TABLE IF EXISTS `tbl_checklist`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `tbl_checklist` (
  `id` int NOT NULL AUTO_INCREMENT,
  `id_scope` int NOT NULL COMMENT 'รหัสขอบเขต',
  `topic` longtext NOT NULL COMMENT 'หัวข้อ',
  `status` int NOT NULL DEFAULT '0' COMMENT 'สถานะ 0รอดำเนิการ 1 กำลังทำ 2เสร็จสิ้น',
  `date_check` varchar(45) DEFAULT NULL COMMENT 'วันที่ตรวจ',
  `createdBy` int NOT NULL,
  `createdDtm` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `updatedBy` int DEFAULT NULL,
  `updatedDtm` datetime DEFAULT NULL,
  `isDeleted` tinyint DEFAULT '0',
  `check` int DEFAULT NULL COMMENT 'ผู้ตรวจ',
  `cus_check` tinyint DEFAULT '0' COMMENT 'สถานะลูกค้าตรวจ\n0ยังไม่เช็ค 1 เช็คแล้ว',
  `date_cus_check` varchar(45) DEFAULT NULL COMMENT 'วันที่ลูกค้าตรวจ',
  `status_test` tinyint DEFAULT '0',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=147 DEFAULT CHARSET=utf8mb3;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `tbl_checklist`
--

LOCK TABLES `tbl_checklist` WRITE;
/*!40000 ALTER TABLE `tbl_checklist` DISABLE KEYS */;
INSERT INTO `tbl_checklist` VALUES (1,1,'tests',1,'2023-02-17 04:31:55',1,'2023-02-16 14:10:40',4,'2023-02-17 08:45:56',0,1,1,'2023-02-17 08:45:56',0),(2,1,'test',0,NULL,1,'2023-02-20 08:03:12',NULL,NULL,0,NULL,0,NULL,0),(3,1,'test',0,NULL,1,'2023-02-20 08:03:27',NULL,NULL,0,NULL,0,NULL,0),(4,3,'ระบบตระกร้า สั่งซื้อ',1,'2023-02-21 06:44:37',1,'2023-02-21 03:05:43',1,'2023-02-21 06:44:37',0,1,0,NULL,0),(5,3,'ระบบสมาชิก',1,'2023-02-21 06:44:46',1,'2023-02-21 03:06:25',1,'2023-02-21 06:44:46',0,1,0,NULL,0),(6,3,'ระบบ pos',1,'2023-02-21 06:44:49',1,'2023-02-21 03:06:41',1,'2023-02-21 06:44:49',0,1,0,NULL,0),(7,3,'เช่ า server,play store',1,'2023-02-21 06:44:51',1,'2023-02-21 03:07:28',1,'2023-02-21 06:44:51',0,1,0,NULL,0),(8,4,'ระบบ Delivery',1,'2023-02-21 06:45:08',1,'2023-02-21 03:15:03',1,'2023-02-21 06:45:08',0,1,0,NULL,0),(9,4,'ระบบคิดคะแนน',1,'2023-02-21 06:45:10',1,'2023-02-21 03:15:18',1,'2023-02-21 06:45:10',0,1,0,NULL,0),(10,10,'KYC ด้วยบัตรประชาชนได้',1,'2023-02-22 04:55:08',1,'2023-02-22 04:31:12',1,'2023-02-22 04:55:08',0,1,0,NULL,0),(11,10,'เชือมต่อ api ของ appman',1,NULL,1,'2023-02-24 04:26:01',1,'2023-03-27 09:08:35',0,NULL,0,NULL,0),(12,13,'ชำระเงินได้',0,NULL,1,'2023-02-24 04:26:43',NULL,NULL,0,NULL,0,NULL,0),(13,13,'ตัดบัตรได้',0,NULL,1,'2023-02-24 04:26:49',NULL,NULL,0,NULL,0,NULL,0),(14,13,'โอนให้ host',0,NULL,1,'2023-02-24 04:27:07',NULL,NULL,0,NULL,0,NULL,0),(15,13,'เสียค่าธรรมเนียม',0,NULL,1,'2023-02-24 04:27:14',NULL,NULL,0,NULL,0,NULL,0),(16,13,'เก็บ log ได้',0,NULL,1,'2023-02-24 04:28:17',NULL,NULL,0,NULL,0,NULL,0),(17,13,'refund ได้',0,NULL,1,'2023-02-24 04:28:34',NULL,NULL,0,NULL,0,NULL,0),(18,19,'ยืนยันที่ท่องเที่ยวจริงได้',0,NULL,1,'2023-02-24 05:00:24',NULL,NULL,0,NULL,0,NULL,0),(19,19,'ปักหมุดได้',0,NULL,1,'2023-02-24 05:00:30',NULL,NULL,0,NULL,0,NULL,0),(20,27,'ขึ้นกระดิ่งเดือน ไกล้ถึงกำหนด 5 วัน สีเหลือง',1,'2023-03-20 01:54:29',1,'2023-03-01 04:48:16',1,'2023-03-20 01:54:29',0,1,0,NULL,1),(21,27,'ขึ้นกระดิ่งเดือน เมื่อเลยกำหนด เตือนสีแดง',1,'2023-03-20 01:54:33',1,'2023-03-01 04:48:35',1,'2023-03-20 01:54:33',0,1,0,NULL,1),(22,28,'หยุบรวมวันที่เริ่ม วันที่สิ้นสุด',1,'2023-03-08 09:51:45',1,'2023-03-01 04:49:43',1,'2023-03-08 09:51:45',0,1,0,NULL,1),(23,28,'เอาชื่อลูกค้ามาโชว์แทนรหัส',1,'2023-03-08 09:51:43',1,'2023-03-01 04:49:58',1,'2023-03-08 09:51:43',0,1,0,NULL,1),(24,28,'อัพโหลดไฟล์โปรเจคได้ ไม่บังคับ pdf',0,NULL,1,'2023-03-01 04:52:05',NULL,NULL,0,NULL,0,NULL,0),(25,29,'ดึงสถานะมาโชว์ dashboard',0,NULL,1,'2023-03-01 04:56:47',NULL,NULL,0,NULL,0,NULL,0),(26,28,'ดึงรายการโปรเจค',1,'2023-03-08 09:51:50',1,'2023-03-01 04:58:56',1,'2023-03-08 09:51:50',0,1,0,NULL,1),(27,28,'issue ที่เสร็จแล้วและยังไม่เสร็จ',1,NULL,1,'2023-03-01 05:00:15',3,'2023-03-01 09:03:20',0,NULL,0,NULL,0),(28,30,'เพิ่มสถานะชำระแล้วและรอชำระค้างชำระ',1,NULL,1,'2023-03-01 05:02:20',3,'2023-03-01 09:15:39',0,NULL,0,NULL,0),(29,28,'checklist ตรวจtester',1,NULL,3,'2023-03-01 08:23:58',3,'2023-03-01 08:32:56',0,NULL,0,NULL,0),(30,13,'เพิ่มได้หลายบัตร',0,NULL,1,'2023-03-01 11:28:18',1,'2023-03-01 11:28:35',0,NULL,0,NULL,0),(31,45,'สมัครสมาชิกได้ ชื่อ อีเมล์',0,NULL,1,'2023-03-02 03:20:40',NULL,NULL,0,NULL,0,NULL,0),(32,45,'ล็อกอินได้',0,NULL,1,'2023-03-02 03:21:01',NULL,NULL,0,NULL,0,NULL,0),(33,45,'จัดการโปรไฟล์ได้',0,NULL,1,'2023-03-02 03:21:13',NULL,NULL,0,NULL,0,NULL,0),(34,46,'เพิ่ม story ได้',1,'2023-03-30 07:30:52',1,'2023-03-02 03:21:42',1,'2023-03-30 07:30:52',0,1,0,NULL,1),(35,46,'แก้ไข story ได้',1,NULL,1,'2023-03-02 03:21:51',3,'2023-04-10 03:01:15',0,NULL,0,NULL,0),(36,46,'ตั้งสถานะส่วนตัว หรือ สาธารณะได้',0,NULL,1,'2023-03-02 03:22:11',NULL,NULL,0,NULL,0,NULL,0),(37,46,'ดูยอดวิวได้',1,NULL,1,'2023-03-02 03:22:33',3,'2023-04-10 03:01:26',0,NULL,0,NULL,0),(38,47,'สมาชิกเข้าอ่าน story ได้',0,NULL,1,'2023-03-02 03:22:49',NULL,NULL,0,NULL,0,NULL,0),(39,47,'แชร์ไปยัง facebook ได้',0,NULL,1,'2023-03-02 03:23:09',NULL,NULL,0,NULL,0,NULL,0),(40,50,'Login ด้วย Email Password',1,'2023-03-30 07:31:24',1,'2023-03-02 04:08:21',1,'2023-03-30 07:31:24',0,1,0,NULL,1),(41,51,'สมัครสมาชิกด้วย Email,Password,รูปโปรไฟล์,ที่อยู่,นามปากกา',1,'2023-03-30 07:31:41',1,'2023-03-02 04:11:27',1,'2023-03-30 07:31:41',0,1,0,NULL,1),(42,52,'แก้ไขโปรไฟล์ แก้ไขได้ทุกอย่างยกเว้น อีเมล',0,NULL,1,'2023-03-02 04:13:07',1,'2023-03-02 04:13:30',0,NULL,0,NULL,0),(43,52,'ดู Story ที่เคยโพสต์ แสดง ยอดอ่าน , และการแสดงความคิดเห็นของ Story นั้น ๆ พร้อม แสดงความคิดเห็นกลับได้',0,NULL,1,'2023-03-02 04:13:49',1,'2023-03-02 04:24:25',0,NULL,0,NULL,0),(44,52,'ดูยอดคนเข้าดูโปร์ไฟล์',0,NULL,1,'2023-03-02 04:14:12',NULL,NULL,0,NULL,0,NULL,0),(45,53,'หน้า check list เปลี่ยนชื่อ เป็น รายละเอียดและเปลี่ยนเป็น Textarea',1,NULL,1,'2023-03-02 04:18:22',3,'2023-03-02 07:32:20',0,NULL,0,NULL,0),(46,54,'เพิ่มขอบเขต',1,NULL,1,'2023-03-02 04:21:31',3,'2023-03-10 09:03:48',0,NULL,0,NULL,0),(47,48,'แสดงรูป โปรไฟล์พร้อม Banner',0,NULL,1,'2023-03-02 04:25:08',NULL,NULL,0,NULL,0,NULL,0),(48,48,'ดูรายการ Story เพื่อนทั้งหมด',1,NULL,1,'2023-03-02 04:25:30',1,'2023-03-30 07:40:35',0,NULL,0,NULL,0),(49,48,'แสดงความคิดเห็นได้',0,NULL,1,'2023-03-02 04:25:39',NULL,NULL,0,NULL,0,NULL,0),(50,56,'ปุ่ม Login / Register',1,'2023-04-04 03:34:03',1,'2023-03-02 04:27:21',1,'2023-04-04 03:34:03',0,1,0,NULL,1),(51,56,'ค้นหา หัวข้อ Story ได้แบบ autocomplete',0,NULL,1,'2023-03-02 04:28:01',NULL,NULL,0,NULL,0,NULL,0),(52,56,'แสดง Story ล่าสุด / แสดงยอดวิว / แสดงยอด Commet / และปุ่มกด ดู Story / แสดงวันที\r\n/ แชร์ ได้ \r\nการแสดงผล\r\n-รูปโปร์ไฟล์\r\n-หัวข้อ\r\n-เนื้อหา หาเกิน 2 บรรทัดให้ใส่เป็น ... แทน\r\n\r\n**ดึงรายการทีละ 20 เมื่อเลือนลงสุดค่อยดึงเพิ่ม**',0,NULL,1,'2023-03-02 04:29:03',1,'2023-03-02 04:36:16',0,NULL,0,NULL,0),(53,52,'แก้ไข banner และ รูปโปรไฟล์',0,NULL,1,'2023-03-02 04:32:39',1,'2023-03-02 04:32:52',0,NULL,0,NULL,0),(54,56,'Banner หน้าแรก',1,'2023-04-04 03:37:00',1,'2023-03-02 04:38:38',1,'2023-04-04 03:37:00',0,1,0,NULL,1),(55,56,'เมนูเพิ่ม Story แบบปกติ อัพโหลดรูป ได้ \r\nเมนูเพิ่ม Story แบบ Toppic อัพโหลดรูป ได้',1,NULL,1,'2023-03-02 04:45:12',1,'2023-03-30 07:34:42',0,NULL,0,NULL,0),(56,56,'ค้นหาแบบเลือก Toppic',0,NULL,1,'2023-03-02 04:45:44',NULL,NULL,0,NULL,0,NULL,0),(57,60,'-เพิ่มลบแก้ไข การประชุม แสดงผลเป็น ปฏิทิน \r\n-การเก็บข้อมูลดังนี้  ผู้เข้าประชุม / วันที่เวลา / link ประชุม / โปรเจค / หัวข้อประชุม / รายละเอียด / เอกสาร',0,NULL,1,'2023-03-02 10:49:02',1,'2023-03-02 10:50:28',0,NULL,0,NULL,0),(58,61,'เหมือนแอป Seven',0,NULL,1,'2023-03-03 04:13:18',NULL,NULL,0,NULL,0,NULL,0),(59,62,'ประชุม vokee ติดตามงาน 15.00',0,NULL,1,'2023-03-03 04:14:31',NULL,NULL,0,NULL,0,NULL,0),(60,64,'เมนูชิดเกินไป เล่นผ่านโทรศัพท์',0,NULL,1,'2023-03-07 02:31:00',4,'2023-03-07 10:28:42',0,NULL,1,'2023-03-07 10:28:42',0),(61,32,'แสดงร้านค้าได้',0,NULL,1,'2023-03-07 02:48:18',NULL,NULL,0,NULL,0,NULL,0),(62,32,'แสดงสินค้าในร้านค้าได้',0,NULL,1,'2023-03-07 02:48:31',NULL,NULL,0,NULL,0,NULL,0),(63,32,'ค้นหาสินค้าได้',0,NULL,1,'2023-03-07 02:48:41',NULL,NULL,0,NULL,0,NULL,0),(64,32,'ลูกค้าสมัครได้',0,NULL,1,'2023-03-07 02:48:59',NULL,NULL,0,NULL,0,NULL,0),(65,32,'ลูกค้าล็อกอินได้',0,NULL,1,'2023-03-07 02:49:08',NULL,NULL,0,NULL,0,NULL,0),(66,32,'เลือกสินค้าลงตระกร้าได้',0,NULL,1,'2023-03-07 02:49:23',NULL,NULL,0,NULL,0,NULL,0),(67,32,'ยืนยันที่อยู่จัดส่งได้',0,NULL,1,'2023-03-07 02:49:45',NULL,NULL,0,NULL,0,NULL,0),(68,32,'ขำระเงินได้',0,NULL,1,'2023-03-07 02:49:54',NULL,NULL,0,NULL,0,NULL,0),(69,65,'ค้นหาได้',0,NULL,1,'2023-03-07 03:18:22',NULL,NULL,0,NULL,0,NULL,0),(70,65,'คลิกหมุดไปอีกหน้า',0,NULL,1,'2023-03-07 03:18:50',NULL,NULL,0,NULL,0,NULL,0),(71,65,'แสดงสถานที่ popular ด้านล่าง',0,NULL,1,'2023-03-07 03:19:06',NULL,NULL,0,NULL,0,NULL,0),(72,17,'แสดงคนโพสได้ แสดงภาพ',1,NULL,1,'2023-03-07 03:19:31',1,'2023-03-20 07:10:32',0,NULL,0,NULL,0),(73,17,'โพสได้',1,NULL,1,'2023-03-07 03:19:41',1,'2023-03-20 07:10:30',0,NULL,0,NULL,0),(74,17,'slide ได้',0,NULL,1,'2023-03-07 03:20:04',NULL,NULL,0,NULL,0,NULL,0),(75,17,'comment ได้',0,NULL,1,'2023-03-07 03:20:24',NULL,NULL,0,NULL,0,NULL,0),(76,17,'report ได้',0,NULL,1,'2023-03-07 03:20:33',NULL,NULL,0,NULL,0,NULL,0),(77,17,'แชร์ได้',0,NULL,1,'2023-03-07 03:20:39',NULL,NULL,0,NULL,0,NULL,0),(78,17,'กดหัวใจได้',0,NULL,1,'2023-03-07 03:20:58',NULL,NULL,0,NULL,0,NULL,0),(79,18,'ล็อกอินได้',0,NULL,1,'2023-03-07 03:22:27',NULL,NULL,0,NULL,0,NULL,0),(80,18,'สมัครได้',0,NULL,1,'2023-03-07 03:22:34',NULL,NULL,0,NULL,0,NULL,0),(81,23,'แก้ไขโปรไฟล์ได้',0,NULL,1,'2023-03-07 03:23:13',NULL,NULL,0,NULL,0,NULL,0),(82,23,'อัพโหลดภาพโปรไฟล์ได้',0,NULL,1,'2023-03-07 03:23:21',NULL,NULL,0,NULL,0,NULL,0),(83,17,'ระบุพิกัดได้ ว่าภาพไปเที่ยวที่ไหน',0,NULL,1,'2023-03-07 03:23:59',NULL,NULL,0,NULL,0,NULL,0),(84,17,'กรณีเป็นใหม่ ให้ปักหมุดได้',0,NULL,1,'2023-03-07 03:24:29',NULL,NULL,0,NULL,0,NULL,0),(85,65,'ดึงสถานที่รอบ ๆ ไกล้เคียงได้',0,NULL,1,'2023-03-07 03:25:15',NULL,NULL,0,NULL,0,NULL,0),(86,66,'แชทได้ แต่ต้องติดตาม follow กันก่อน',0,NULL,1,'2023-03-07 03:26:26',NULL,NULL,0,NULL,0,NULL,0),(87,67,'ร้านกดต้องการรีวิวได้',0,NULL,1,'2023-03-07 03:41:27',NULL,NULL,0,NULL,0,NULL,0),(88,67,'ระบบส่งความต้องการไปยัง อินฟลูเซอร์ได้',0,NULL,1,'2023-03-07 03:41:51',NULL,NULL,0,NULL,0,NULL,0),(89,67,'นักรีวิว กดรับงานได้',0,NULL,1,'2023-03-07 03:42:23',NULL,NULL,0,NULL,0,NULL,0),(90,67,'เจ้าของ กดอนุมัติได้',0,NULL,1,'2023-03-07 03:42:40',NULL,NULL,0,NULL,0,NULL,0),(91,70,'front ใช้ react',1,'2023-03-07 09:00:52',1,'2023-03-07 03:52:37',1,'2023-03-07 09:00:52',0,1,0,NULL,1),(92,70,'database ใช้ mysql',1,'2023-03-07 09:00:54',1,'2023-03-07 03:53:03',1,'2023-03-07 09:00:54',0,1,0,NULL,1),(93,70,'php ci เป็น api',1,'2023-03-07 09:00:55',1,'2023-03-07 03:53:46',1,'2023-03-07 09:00:55',0,1,0,NULL,1),(94,71,'การสมัครสมาชิก',0,NULL,1,'2023-03-07 04:01:06',NULL,NULL,0,NULL,0,NULL,0),(95,72,'ล็อกอินได้',1,'2023-03-27 04:53:36',1,'2023-03-07 06:53:56',1,'2023-03-27 04:53:44',0,1,0,NULL,1),(96,73,'ล็อกอินได้',1,'2023-03-27 04:54:49',1,'2023-03-07 06:54:10',1,'2023-03-27 04:54:49',0,1,0,NULL,1),(97,73,'เพิ่มสมาชิกได้',1,'2023-03-27 04:55:50',1,'2023-03-07 06:54:16',1,'2023-03-27 04:55:50',0,1,0,NULL,1),(98,75,'เพิ่ม Request List ได้',0,NULL,1,'2023-03-07 06:54:56',NULL,NULL,0,NULL,0,NULL,0),(99,75,'บันทึกว่าใครเป็น คนสร้าง',0,NULL,1,'2023-03-07 06:55:11',NULL,NULL,0,NULL,0,NULL,0),(100,75,'ค้นหารายการได้',0,NULL,1,'2023-03-07 06:55:27',NULL,NULL,0,NULL,0,NULL,0),(101,75,'ดูรายละเอียดได้',0,NULL,1,'2023-03-07 06:55:47',NULL,NULL,0,NULL,0,NULL,0),(102,75,'comment ได้',0,NULL,1,'2023-03-07 06:55:54',NULL,NULL,0,NULL,0,NULL,0),(103,83,'ให้ดูได้ว่าใครเป็นคนรับผิดชอบปัจจุบัน',0,NULL,1,'2023-03-07 09:34:01',NULL,NULL,0,NULL,0,NULL,0),(104,83,'ให้ดูได้ว่าใครเป็น head ของโปรเจค',0,NULL,1,'2023-03-07 09:34:22',NULL,NULL,0,NULL,0,NULL,0),(105,85,'ปรับประเภทร้าน ให้เหลือแค่ นิติบุคคล',1,NULL,8,'2023-03-08 03:15:54',8,'2023-03-08 03:36:03',0,NULL,0,NULL,0),(106,85,'ตัดบุคคลธรรมดา หน้าร้าน Home',1,NULL,8,'2023-03-08 03:16:46',8,'2023-03-08 03:36:15',0,NULL,0,NULL,0),(107,86,'นำขึ้น server จริงกับ booktoyou',0,NULL,1,'2023-03-08 03:18:41',NULL,NULL,0,NULL,0,NULL,0),(108,85,'ที่อยู่ไม่ถูกไต้อง \r\nFormat\r\n00, หมากแข้ง,เมืองอุดรธานี,อุดรธานี, 41000',0,NULL,8,'2023-03-08 03:25:45',NULL,NULL,0,NULL,0,NULL,0),(109,33,'สมัครได้',0,NULL,1,'2023-03-08 03:33:38',NULL,NULL,0,NULL,0,NULL,0),(110,33,'เข้าระบบได้',0,NULL,1,'2023-03-08 03:33:44',NULL,NULL,0,NULL,0,NULL,0),(111,33,'จัดการข้อมูลร้านได้',0,NULL,1,'2023-03-08 03:33:55',NULL,NULL,0,NULL,0,NULL,0),(112,33,'จัดการพิกัดได้',0,NULL,1,'2023-03-08 03:34:01',NULL,NULL,0,NULL,0,NULL,0),(113,33,'จัดการภาพร้านได้',0,NULL,1,'2023-03-08 03:34:09',NULL,NULL,0,NULL,0,NULL,0),(114,33,'ดูรายการสั่งซื้อได้',0,NULL,1,'2023-03-08 03:34:19',NULL,NULL,0,NULL,0,NULL,0),(115,89,'แสดงงานของ ทีมที่ต้องทำแต่วัน',1,NULL,1,'2023-03-08 09:52:35',3,'2023-03-10 09:03:25',0,NULL,0,NULL,0),(116,76,'กรอก Left หมายถึงรายการที่ซื้อได้จริง',0,NULL,1,'2023-03-08 13:36:38',NULL,NULL,0,NULL,0,NULL,0),(117,76,'กรอก comment ได้',0,NULL,1,'2023-03-08 13:36:48',NULL,NULL,0,NULL,0,NULL,0),(118,79,'เลือกประเภทได้ เช่น cook',0,NULL,1,'2023-03-08 13:37:37',NULL,NULL,0,NULL,0,NULL,0),(119,79,'เลือกพนักงานได้',0,NULL,1,'2023-03-08 13:37:47',NULL,NULL,0,NULL,0,NULL,0),(120,78,'แสดง ปฏิทินได้',0,NULL,1,'2023-03-08 13:38:14',NULL,NULL,0,NULL,0,NULL,0),(121,78,'แสดงรายงานงานแต่ละวันได้',0,NULL,1,'2023-03-08 13:38:22',NULL,NULL,0,NULL,0,NULL,0),(122,81,'เพิ่มประเภท request ได้(for add category)',1,'2023-03-27 04:59:59',1,'2023-03-08 13:38:45',1,'2023-03-27 05:10:25',0,1,0,NULL,1),(123,81,'เพิ่มสถานที่ซื้อสินค้าได้ (for add market group)',1,'2023-03-27 05:00:19',1,'2023-03-08 13:38:56',1,'2023-03-27 05:10:56',0,1,0,NULL,1),(124,80,'เพิ่มความรับผิดชอบได้',0,NULL,1,'2023-03-08 13:39:20',NULL,NULL,0,NULL,0,NULL,0),(125,77,'แสดงรายได้',0,NULL,1,'2023-03-08 13:39:51',NULL,NULL,0,NULL,0,NULL,0),(126,91,'List ขึ้น',0,NULL,1,'2023-03-10 07:50:19',NULL,NULL,0,NULL,0,NULL,0),(127,92,'List ขึ้น',0,NULL,1,'2023-03-10 07:50:34',NULL,NULL,0,NULL,0,NULL,0),(128,93,'List ขึ้น',0,NULL,1,'2023-03-10 07:50:44',NULL,NULL,0,NULL,0,NULL,0),(129,94,'List ขึ้น',0,NULL,1,'2023-03-10 07:50:53',NULL,NULL,0,NULL,0,NULL,0),(130,95,'Coingetco',1,NULL,1,'2023-03-10 07:51:06',1,'2023-03-10 08:06:12',0,NULL,0,NULL,0),(131,96,'Coingetco',0,NULL,1,'2023-03-10 07:51:14',NULL,NULL,0,NULL,0,NULL,0),(132,97,'ปิดเปิดการคุย',0,NULL,1,'2023-03-10 07:57:13',NULL,NULL,0,NULL,0,NULL,0),(133,97,'ปิดเปิดกล้อง',0,NULL,1,'2023-03-10 07:57:31',NULL,NULL,0,NULL,0,NULL,0),(134,99,'export todolist shoppinglist to excel ได้',0,NULL,1,'2023-03-15 09:02:09',NULL,NULL,0,NULL,0,NULL,0),(135,61,'โทนสีฟ้า เหมือนเว็บ wink',0,NULL,1,'2023-03-20 07:02:08',NULL,NULL,0,NULL,0,NULL,0),(136,104,'Database เป็น mongo db',0,NULL,1,'2023-03-20 07:03:16',NULL,NULL,0,NULL,0,NULL,0),(137,104,'app เขียนด้วย flutter',0,NULL,1,'2023-03-20 07:03:31',NULL,NULL,0,NULL,0,NULL,0),(138,104,'API เขียนด้วย node',0,NULL,1,'2023-03-20 07:03:39',NULL,NULL,0,NULL,0,NULL,0),(139,104,'เว็บเขียน ด้วย react',0,NULL,1,'2023-03-20 07:03:50',NULL,NULL,0,NULL,0,NULL,0),(140,108,'เว็บ convert',0,NULL,1,'2023-03-24 10:52:45',NULL,NULL,0,NULL,0,NULL,0),(141,108,'สามารถ swap เหรียญ ผ่าน busd/usdt/bnb (ใช้เรตราคาไหน)',0,NULL,1,'2023-03-24 10:53:11',1,'2023-03-27 04:04:20',0,NULL,0,NULL,0),(142,108,'convert sdc token จาก BNB Smart chain ไป ERC 20',0,NULL,1,'2023-03-24 10:55:20',NULL,NULL,0,NULL,0,NULL,0),(143,109,'อัพเดตงานลูกค้า  28-29',0,NULL,1,'2023-03-27 03:27:50',NULL,NULL,0,NULL,0,NULL,0),(144,73,'แก้ไข ลบได้',1,'2023-03-27 04:56:11',1,'2023-03-27 04:02:03',1,'2023-03-27 04:56:11',0,1,0,NULL,1),(145,81,'for add list',1,'2023-03-27 06:10:14',1,'2023-03-27 05:11:30',1,'2023-03-27 06:14:26',0,1,0,NULL,1),(146,117,'Error cors',0,NULL,1,'2023-06-13 04:31:06',NULL,NULL,0,NULL,0,NULL,0);
/*!40000 ALTER TABLE `tbl_checklist` ENABLE KEYS */;
UNLOCK TABLES;
/*!40103 SET TIME_ZONE=@OLD_TIME_ZONE */;

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;

-- Dump completed on 2023-12-13 20:53:00
