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
-- Table structure for table `log_ins`
--

DROP TABLE IF EXISTS `log_ins`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `log_ins` (
  `id` int NOT NULL AUTO_INCREMENT,
  `data` longtext CHARACTER SET utf8mb3 COLLATE utf8mb3_general_ci NOT NULL,
  `change` tinyint NOT NULL COMMENT '0 สร้าง 1แก้ไข 2ลบ',
  `createdBy` int DEFAULT '0',
  `createdDtm` datetime DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=191 DEFAULT CHARSET=utf8mb3;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `log_ins`
--

LOCK TABLES `log_ins` WRITE;
/*!40000 ALTER TABLE `log_ins` DISABLE KEYS */;
INSERT INTO `log_ins` VALUES (1,'{\"id_project\":\"1\",\"ins_num\":\"1\",\"ins_col\":\"16\\/02\\/2023\",\"createdBy\":\"1\",\"createdDtm\":\"2023-02-16 04:23:11\"}',0,0,'2023-02-16 03:23:11'),(2,'{\"id_project\":\"1\",\"ins_num\":\"1\",\"ins_col\":\"16\\/02\\/2023\",\"createdBy\":\"1\",\"createdDtm\":\"2023-02-16 04:23:22\"}',0,0,'2023-02-16 03:23:22'),(3,'{\"id_project\":\"1\",\"ins_num\":\"1\",\"ins_col\":\"16\\/02\\/2023\",\"createdBy\":\"1\",\"createdDtm\":\"2023-02-16 04:23:37\"}',0,0,'2023-02-16 03:23:38'),(4,'{\"ins_num\":\"2\",\"ins_col\":\"17\\/02\\/2023\",\"updatedBy\":\"1\",\"updatedDtm\":\"2023-02-16 04:57:30\"}',1,0,'2023-02-16 03:57:30'),(5,'{\"id_project\":\"4\",\"ins_num\":\"IV650100029\",\"ins_col\":\"06\\/03\\/2023\",\"createdBy\":\"1\",\"createdDtm\":\"2023-02-21 02:55:39\"}',0,1,'2023-02-21 02:55:39'),(6,'{\"id_project\":\"4\",\"ins_num\":\"IV650100042\",\"ins_col\":\"17\\/03\\/2023\",\"createdBy\":\"1\",\"createdDtm\":\"2023-02-21 03:09:25\"}',0,1,'2023-02-21 03:09:25'),(7,'{\"id_project\":\"1\",\"id_ins\":\"3\",\"topic\":\"test\",\"start_date\":\"21\\/02\\/2023\",\"end_date\":\"21\\/02\\/2023\",\"createdBy\":\"1\",\"createdDtm\":\"2023-02-21 03:18:42\"}',0,1,'2023-02-21 03:18:42'),(8,'{\"id_project\":\"1\",\"id_ins\":\"3\",\"topic\":\"tses\",\"start_date\":\"21\\/02\\/2023\",\"end_date\":\"21\\/02\\/2023\",\"createdBy\":\"1\",\"createdDtm\":\"2023-02-21 03:18:57\"}',0,1,'2023-02-21 03:18:57'),(9,'{\"isDeleted\":1,\"updatedBy\":\"1\",\"updatedDtm\":\"2023-02-21 03:36:08\"}',2,1,'2023-02-21 03:36:08'),(10,'{\"topic\":\"\\u0e07\\u0e27\\u0e14\\u0e17\\u0e35\\u0e482\",\"start_date\":\"23\\/02\\/2023\",\"end_date\":\"06\\/02\\/2023\",\"updatedBy\":\"1\",\"updatedDtm\":\"2023-02-21 08:41:03\"}',1,1,'2023-02-21 08:41:03'),(11,'{\"topic\":\"\\u0e07\\u0e27\\u0e14\\u0e17\\u0e35\\u0e482\",\"start_date\":\"23\\/02\\/2023\",\"end_date\":\"06\\/02\\/2023\",\"updatedBy\":\"1\",\"updatedDtm\":\"2023-02-21 08:41:17\"}',1,1,'2023-02-21 08:41:17'),(12,'{\"topic\":\"\\u0e07\\u0e27\\u0e14\\u0e17\\u0e35\\u0e482\",\"start_date\":\"23\\/02\\/2023\",\"end_date\":\"06\\/02\\/2023\",\"updatedBy\":\"1\",\"updatedDtm\":\"2023-02-21 08:43:37\"}',1,1,'2023-02-21 08:43:37'),(13,'{\"topic\":\"\\u0e07\\u0e27\\u0e27\\u0e14\\u0e17\\u0e35\\u0e483\",\"start_date\":\"07\\/03\\/2023\",\"end_date\":\"20\\/02\\/2023\",\"updatedBy\":\"1\",\"updatedDtm\":\"2023-02-21 08:44:05\"}',1,1,'2023-02-21 08:44:05'),(14,'{\"id_project\":\"5\",\"ins_num\":\"1\",\"ins_col\":\"22\\/02\\/2023\",\"createdBy\":\"1\",\"createdDtm\":\"2023-02-22 01:23:29\"}',0,1,'2023-02-22 01:23:29'),(15,'{\"id_project\":\"5\",\"ins_num\":\"2\",\"ins_col\":\"22\\/02\\/2023\",\"createdBy\":\"1\",\"createdDtm\":\"2023-02-22 01:23:35\"}',0,1,'2023-02-22 01:23:35'),(16,'{\"id_project\":\"6\",\"ins_num\":\"1\",\"ins_col\":\"15\\/12\\/2022\",\"createdBy\":\"1\",\"createdDtm\":\"2023-02-22 04:28:27\"}',0,1,'2023-02-22 04:28:27'),(17,'{\"id_project\":\"6\",\"ins_num\":\"2\",\"ins_col\":\"22\\/02\\/2023\",\"createdBy\":\"1\",\"createdDtm\":\"2023-02-22 04:28:34\"}',0,1,'2023-02-22 04:28:34'),(18,'{\"id_project\":\"6\",\"ins_num\":\"3\",\"ins_col\":\"15\\/03\\/2023\",\"createdBy\":\"1\",\"createdDtm\":\"2023-02-22 04:28:59\"}',0,1,'2023-02-22 04:28:59'),(19,'{\"id_project\":\"6\",\"id_ins\":\"8\",\"topic\":\"\\u0e21\\u0e31\\u0e14\\u0e08\\u0e33\",\"start_date\":\"01\\/12\\/2022\",\"end_date\":\"31\\/01\\/2023\",\"createdBy\":\"1\",\"createdDtm\":\"2023-02-22 04:30:03\"}',0,1,'2023-02-22 04:30:03'),(20,'{\"id_project\":\"6\",\"id_ins\":\"9\",\"topic\":\"KYC\",\"start_date\":\"01\\/12\\/2022\",\"end_date\":\"22\\/02\\/2023\",\"createdBy\":\"1\",\"createdDtm\":\"2023-02-22 04:30:50\"}',0,1,'2023-02-22 04:30:50'),(21,'{\"id_project\":\"9\",\"ins_num\":\"1\",\"ins_col\":\"22\\/02\\/2023\",\"createdBy\":\"1\",\"createdDtm\":\"2023-02-22 04:54:44\"}',0,1,'2023-02-22 04:54:44'),(22,'{\"ins_num\":\"2\",\"ins_col\":\"22\\/02\\/2023\",\"updatedBy\":\"1\",\"updatedDtm\":\"2023-02-22 08:22:00\"}',1,1,'2023-02-22 08:22:00'),(23,'{\"ins_num\":\"2\",\"ins_col\":\"06\\/03\\/2023\",\"updatedBy\":\"1\",\"updatedDtm\":\"2023-02-22 08:27:41\"}',1,1,'2023-02-22 08:27:41'),(24,'{\"ins_num\":\"3\",\"ins_col\":\"17\\/03\\/2023\",\"updatedBy\":\"1\",\"updatedDtm\":\"2023-02-22 08:27:48\"}',1,1,'2023-02-22 08:27:48'),(25,'{\"id_project\":\"4\",\"ins_num\":\"1\",\"ins_col\":\"14\\/10\\/2022\",\"createdBy\":\"1\",\"createdDtm\":\"2023-02-22 08:32:26\"}',0,1,'2023-02-22 08:32:26'),(26,'{\"id_project\":\"4\",\"ins_num\":\"4\",\"ins_col\":\"15\\/03\\/2023\",\"createdBy\":\"1\",\"createdDtm\":\"2023-02-22 08:43:33\"}',0,1,'2023-02-22 08:43:33'),(27,'{\"ins_num\":\"3\",\"ins_col\":\"17\\/01\\/2023\",\"updatedBy\":\"1\",\"updatedDtm\":\"2023-02-22 08:44:04\"}',1,1,'2023-02-22 08:44:04'),(28,'{\"ins_num\":\"2\",\"ins_col\":\"16\\/01\\/2023\",\"updatedBy\":\"1\",\"updatedDtm\":\"2023-02-22 08:44:26\"}',1,1,'2023-02-22 08:44:26'),(29,'{\"ins_num\":\"3\",\"ins_col\":\"17\\/02\\/2023\",\"updatedBy\":\"1\",\"updatedDtm\":\"2023-02-22 08:44:38\"}',1,1,'2023-02-22 08:44:38'),(30,'{\"ins_num\":\"1\",\"ins_col\":\"15\\/03\\/2023\",\"updatedBy\":\"1\",\"updatedDtm\":\"2023-02-24 02:56:48\"}',1,1,'2023-02-24 02:56:48'),(31,'{\"id_project\":\"7\",\"ins_num\":\"4\",\"ins_col\":\"24\\/02\\/2023\",\"createdBy\":\"1\",\"createdDtm\":\"2023-02-24 02:58:04\"}',0,1,'2023-02-24 02:58:04'),(32,'{\"id_project\":\"8\",\"ins_num\":\"3\",\"ins_col\":\"28\\/02\\/2023\",\"createdBy\":\"1\",\"createdDtm\":\"2023-02-24 02:58:34\"}',0,1,'2023-02-24 02:58:34'),(33,'{\"id_project\":\"6\",\"ins_num\":\"4\",\"ins_col\":\"18\\/04\\/2023\",\"createdBy\":\"1\",\"createdDtm\":\"2023-02-24 03:29:55\"}',0,1,'2023-02-24 03:29:55'),(34,'{\"id_project\":\"9\",\"ins_num\":\"2\",\"ins_col\":\"02\\/01\\/2023\",\"createdBy\":\"1\",\"createdDtm\":\"2023-02-24 04:31:26\"}',0,1,'2023-02-24 04:31:26'),(35,'{\"id_project\":\"9\",\"ins_num\":\"3\",\"ins_col\":\"24\\/01\\/2023\",\"createdBy\":\"1\",\"createdDtm\":\"2023-02-24 04:31:33\"}',0,1,'2023-02-24 04:31:33'),(36,'{\"id_project\":\"9\",\"ins_num\":\"4\",\"ins_col\":\"28\\/02\\/2023\",\"createdBy\":\"1\",\"createdDtm\":\"2023-02-24 04:31:39\"}',0,1,'2023-02-24 04:31:39'),(37,'{\"id_project\":\"10\",\"ins_num\":\"5\",\"ins_col\":\"24\\/02\\/2023\",\"createdBy\":\"1\",\"createdDtm\":\"2023-02-24 04:34:00\"}',0,1,'2023-02-24 04:34:00'),(38,'{\"ins_num\":\"1\",\"ins_col\":\"24\\/02\\/2023\",\"updatedBy\":\"1\",\"updatedDtm\":\"2023-02-24 04:34:09\"}',1,1,'2023-02-24 04:34:09'),(39,'{\"id_project\":\"10\",\"ins_num\":\"2\",\"ins_col\":\"31\\/03\\/2023\",\"createdBy\":\"1\",\"createdDtm\":\"2023-02-24 04:43:38\"}',0,1,'2023-02-24 04:43:38'),(40,'{\"id_project\":\"9\",\"ins_num\":\"5\",\"ins_col\":\"15\\/03\\/2023\",\"createdBy\":\"1\",\"createdDtm\":\"2023-02-28 09:12:32\"}',0,1,'2023-02-28 09:12:32'),(41,'{\"ins_num\":\"2\",\"ins_col\":\"28\\/02\\/2023\",\"updatedBy\":\"1\",\"updatedDtm\":\"2023-02-28 09:13:13\"}',1,1,'2023-02-28 09:13:13'),(42,'{\"ins_num\":\"3\",\"ins_col\":\"10\\/03\\/2023\",\"updatedBy\":\"1\",\"updatedDtm\":\"2023-02-28 09:14:19\"}',1,1,'2023-02-28 09:14:19'),(43,'{\"ins_num\":\"4\",\"ins_col\":\"31\\/03\\/2023\",\"updatedBy\":\"1\",\"updatedDtm\":\"2023-02-28 09:14:39\"}',1,1,'2023-02-28 09:14:39'),(44,'{\"id_project\":\"14\",\"ins_num\":\"1\",\"ins_col\":\"28\\/02\\/2023\",\"createdBy\":\"1\",\"createdDtm\":\"2023-03-01 04:47:02\"}',0,1,'2023-03-01 04:47:02'),(45,'{\"id_project\":\"15\",\"ins_num\":\"1\",\"ins_col\":\"09\\/03\\/2023\",\"createdBy\":\"1\",\"createdDtm\":\"2023-03-01 07:02:25\"}',0,1,'2023-03-01 07:02:25'),(46,'{\"id_project\":\"15\",\"ins_num\":\"2\",\"ins_col\":\"14\\/04\\/2023\",\"createdBy\":\"1\",\"createdDtm\":\"2023-03-01 07:06:38\"}',0,1,'2023-03-01 07:06:38'),(47,'{\"id_project\":\"15\",\"ins_num\":\"3\",\"ins_col\":\"26\\/05\\/2023\",\"createdBy\":\"1\",\"createdDtm\":\"2023-03-01 07:19:56\"}',0,1,'2023-03-01 07:19:56'),(48,'{\"id_project\":\"15\",\"ins_num\":\"4\",\"ins_col\":\"28\\/04\\/2023\",\"createdBy\":\"1\",\"createdDtm\":\"2023-03-01 07:26:50\"}',0,1,'2023-03-01 07:26:50'),(49,'{\"ins_num\":\"4\",\"ins_col\":\"31\\/05\\/2023\",\"updatedBy\":\"1\",\"updatedDtm\":\"2023-03-01 07:27:12\"}',1,1,'2023-03-01 07:27:12'),(50,'{\"id_project\":\"15\",\"ins_num\":\"5\",\"ins_col\":\"15\\/12\\/2023\",\"createdBy\":\"1\",\"createdDtm\":\"2023-03-01 07:33:14\"}',0,1,'2023-03-01 07:33:14'),(51,'{\"id_project\":\"16\",\"ins_num\":\"3\",\"ins_col\":\"01\\/03\\/2023\",\"createdBy\":\"1\",\"createdDtm\":\"2023-03-01 07:43:27\"}',0,1,'2023-03-01 07:43:27'),(52,'{\"ins_num\":\"1\",\"ins_col\":\"28\\/02\\/2023\",\"payment_status\":\"1\",\"updatedBy\":\"3\",\"updatedDtm\":\"2023-03-01 09:13:46\"}',1,3,'2023-03-01 09:13:46'),(53,'{\"ins_num\":\"1\",\"ins_col\":\"28\\/02\\/2023\",\"payment_status\":\"0\",\"updatedBy\":\"3\",\"updatedDtm\":\"2023-03-01 09:13:49\"}',1,3,'2023-03-01 09:13:49'),(54,'{\"id_project\":\"17\",\"ins_num\":\"1\",\"ins_col\":\"10\\/03\\/2023\",\"createdBy\":\"1\",\"createdDtm\":\"2023-03-02 03:18:11\"}',0,1,'2023-03-02 03:18:11'),(55,'{\"ins_num\":\"1\",\"ins_col\":\"10\\/03\\/2023\",\"payment_status\":\"1\",\"updatedBy\":\"1\",\"updatedDtm\":\"2023-03-02 03:18:19\"}',1,1,'2023-03-02 03:18:19'),(56,'{\"ins_num\":\"1\",\"ins_col\":\"10\\/03\\/2023\",\"payment_status\":\"1\",\"updatedBy\":\"1\",\"updatedDtm\":\"2023-03-02 03:18:28\"}',1,1,'2023-03-02 03:18:28'),(57,'{\"ins_num\":\"1\",\"ins_col\":\"24\\/02\\/2023\",\"payment_status\":\"1\",\"updatedBy\":\"1\",\"updatedDtm\":\"2023-03-02 04:37:29\"}',1,1,'2023-03-02 04:37:29'),(58,'{\"ins_num\":\"2\",\"ins_col\":\"31\\/03\\/2023\",\"payment_status\":\"1\",\"updatedBy\":\"1\",\"updatedDtm\":\"2023-03-02 04:37:33\"}',1,1,'2023-03-02 04:37:33'),(59,'{\"ins_num\":\"1\",\"ins_col\":\"22\\/02\\/2023\",\"payment_status\":\"1\",\"updatedBy\":\"1\",\"updatedDtm\":\"2023-03-02 07:09:25\"}',1,1,'2023-03-02 07:09:25'),(60,'{\"ins_num\":\"2\",\"ins_col\":\"02\\/01\\/2023\",\"payment_status\":\"1\",\"updatedBy\":\"1\",\"updatedDtm\":\"2023-03-02 07:09:30\"}',1,1,'2023-03-02 07:09:30'),(61,'{\"ins_num\":\"3\",\"ins_col\":\"24\\/01\\/2023\",\"payment_status\":\"1\",\"updatedBy\":\"1\",\"updatedDtm\":\"2023-03-02 07:09:34\"}',1,1,'2023-03-02 07:09:34'),(62,'{\"ins_num\":\"4\",\"ins_col\":\"28\\/02\\/2023\",\"payment_status\":\"1\",\"updatedBy\":\"1\",\"updatedDtm\":\"2023-03-02 07:09:39\"}',1,1,'2023-03-02 07:09:39'),(63,'{\"ins_num\":\"2\",\"ins_col\":\"22\\/02\\/2023\",\"payment_status\":\"1\",\"updatedBy\":\"1\",\"updatedDtm\":\"2023-03-02 07:10:59\"}',1,1,'2023-03-02 07:10:59'),(64,'{\"ins_num\":\"1\",\"ins_col\":\"22\\/02\\/2023\",\"payment_status\":\"1\",\"updatedBy\":\"1\",\"updatedDtm\":\"2023-03-02 07:11:04\"}',1,1,'2023-03-02 07:11:04'),(65,'{\"ins_num\":\"1\",\"ins_col\":\"28\\/02\\/2023\",\"payment_status\":\"1\",\"updatedBy\":\"1\",\"updatedDtm\":\"2023-03-02 07:11:17\"}',1,1,'2023-03-02 07:11:17'),(66,'{\"id_project\":\"18\",\"ins_num\":\"1\",\"ins_col\":\"01\\/03\\/2023\",\"createdBy\":\"1\",\"createdDtm\":\"2023-03-02 07:14:21\"}',0,1,'2023-03-02 07:14:21'),(67,'{\"id_project\":\"14\",\"ins_num\":\"test\",\"ins_col\":\"07\\/03\\/2023\",\"createdBy\":\"3\",\"createdDtm\":\"2023-03-02 07:16:17\"}',0,3,'2023-03-02 07:16:17'),(68,'{\"ins_num\":\"test\",\"ins_col\":\"08\\/03\\/2023\",\"payment_status\":\"0\",\"updatedBy\":\"3\",\"updatedDtm\":\"2023-03-02 07:21:42\"}',1,3,'2023-03-02 07:21:42'),(69,'{\"ins_num\":\"test\",\"ins_col\":\"06\\/03\\/2023\",\"payment_status\":\"0\",\"updatedBy\":\"3\",\"updatedDtm\":\"2023-03-02 07:21:54\"}',1,3,'2023-03-02 07:21:54'),(70,'{\"ins_num\":\"test\",\"ins_col\":\"03\\/03\\/2023\",\"payment_status\":\"0\",\"updatedBy\":\"3\",\"updatedDtm\":\"2023-03-02 07:22:09\"}',1,3,'2023-03-02 07:22:09'),(71,'{\"ins_num\":\"test\",\"ins_col\":\"01\\/03\\/2023\",\"payment_status\":\"0\",\"updatedBy\":\"3\",\"updatedDtm\":\"2023-03-02 07:22:22\"}',1,3,'2023-03-02 07:22:22'),(72,'{\"ins_num\":\"test\",\"ins_col\":\"02\\/03\\/2023\",\"payment_status\":\"0\",\"updatedBy\":\"3\",\"updatedDtm\":\"2023-03-02 07:22:35\"}',1,3,'2023-03-02 07:22:35'),(73,'{\"isDeleted\":1,\"updatedBy\":\"3\",\"updatedDtm\":\"2023-03-02 07:22:42\"}',2,3,'2023-03-02 07:22:42'),(74,'{\"ins_num\":\"1\",\"ins_col\":\"15\\/03\\/2023\",\"payment_status\":\"1\",\"updatedBy\":\"1\",\"updatedDtm\":\"2023-03-02 07:28:43\"}',1,1,'2023-03-02 07:28:43'),(75,'{\"ins_num\":\"1\",\"ins_col\":\"14\\/10\\/2022\",\"payment_status\":\"1\",\"updatedBy\":\"1\",\"updatedDtm\":\"2023-03-02 08:19:37\"}',1,1,'2023-03-02 08:19:37'),(76,'{\"ins_num\":\"3\",\"ins_col\":\"17\\/02\\/2023\",\"payment_status\":\"1\",\"updatedBy\":\"1\",\"updatedDtm\":\"2023-03-02 08:19:42\"}',1,1,'2023-03-02 08:19:42'),(77,'{\"ins_num\":\"2\",\"ins_col\":\"16\\/01\\/2023\",\"payment_status\":\"1\",\"updatedBy\":\"1\",\"updatedDtm\":\"2023-03-02 08:19:46\"}',1,1,'2023-03-02 08:19:46'),(78,'{\"id_project\":\"19\",\"ins_num\":\"1\",\"ins_col\":\"05\\/03\\/2023\",\"createdBy\":\"1\",\"createdDtm\":\"2023-03-02 10:20:13\"}',0,1,'2023-03-02 10:20:13'),(79,'{\"id_project\":\"20\",\"ins_num\":\"1\",\"ins_col\":\"04\\/03\\/2023\",\"createdBy\":\"1\",\"createdDtm\":\"2023-03-04 05:30:37\"}',0,1,'2023-03-04 05:30:37'),(80,'{\"id_project\":\"20\",\"ins_num\":\"2\",\"ins_col\":\"10\\/03\\/2023\",\"createdBy\":\"1\",\"createdDtm\":\"2023-03-07 06:07:13\"}',0,1,'2023-03-07 06:07:13'),(81,'{\"ins_num\":\"2\",\"ins_col\":\"10\\/03\\/2023\",\"payment_status\":\"1\",\"updatedBy\":\"1\",\"updatedDtm\":\"2023-03-07 06:07:18\"}',1,1,'2023-03-07 06:07:18'),(82,'{\"ins_num\":\"2\",\"ins_col\":\"10\\/03\\/2023\",\"payment_status\":\"0\",\"updatedBy\":\"1\",\"updatedDtm\":\"2023-03-07 06:07:33\"}',1,1,'2023-03-07 06:07:33'),(83,'{\"ins_num\":\"1\",\"ins_col\":\"07\\/03\\/2023\",\"payment_status\":\"1\",\"updatedBy\":\"1\",\"updatedDtm\":\"2023-03-07 06:07:42\"}',1,1,'2023-03-07 06:07:42'),(84,'{\"id_project\":\"20\",\"ins_num\":\"3\",\"ins_col\":\"30\\/04\\/2023\",\"createdBy\":\"1\",\"createdDtm\":\"2023-03-07 06:09:53\"}',0,1,'2023-03-07 06:09:53'),(85,'{\"id_project\":\"21\",\"ins_num\":\"4\",\"ins_col\":\"06\\/03\\/2023\",\"createdBy\":\"1\",\"createdDtm\":\"2023-03-07 06:10:28\"}',0,1,'2023-03-07 06:10:28'),(86,'{\"ins_num\":\"1\",\"ins_col\":\"07\\/03\\/2023\",\"payment_status\":\"0\",\"updatedBy\":\"1\",\"updatedDtm\":\"2023-03-08 09:40:25\"}',1,1,'2023-03-08 09:40:25'),(87,'{\"ins_num\":\"1\",\"ins_col\":\"07\\/03\\/2023\",\"payment_status\":\"1\",\"updatedBy\":\"1\",\"updatedDtm\":\"2023-03-08 09:40:37\"}',1,1,'2023-03-08 09:40:37'),(88,'{\"id_project\":\"23\",\"ins_num\":\"1\",\"ins_col\":\"09\\/03\\/2023\",\"createdBy\":\"1\",\"createdDtm\":\"2023-03-10 07:48:05\"}',0,1,'2023-03-10 07:48:05'),(89,'{\"ins_num\":\"1\",\"ins_col\":\"09\\/03\\/2023\",\"payment_status\":\"1\",\"updatedBy\":\"1\",\"updatedDtm\":\"2023-03-10 07:48:14\"}',1,1,'2023-03-10 07:48:14'),(90,'{\"id_project\":\"23\",\"ins_num\":\"2\",\"ins_col\":\"31\\/03\\/2023\",\"createdBy\":\"1\",\"createdDtm\":\"2023-03-10 07:48:21\"}',0,1,'2023-03-10 07:48:21'),(91,'{\"id_project\":\"24\",\"ins_num\":\"1\",\"ins_col\":\"13\\/03\\/2023\",\"createdBy\":\"1\",\"createdDtm\":\"2023-03-13 09:38:38\"}',0,1,'2023-03-13 09:38:38'),(92,'{\"ins_num\":\"1\",\"ins_col\":\"13\\/03\\/2023\",\"payment_status\":\"1\",\"updatedBy\":\"1\",\"updatedDtm\":\"2023-03-13 09:38:43\"}',1,1,'2023-03-13 09:38:43'),(93,'{\"id_project\":\"24\",\"ins_num\":\"2\",\"ins_col\":\"20\\/03\\/2023\",\"createdBy\":\"1\",\"createdDtm\":\"2023-03-13 09:38:49\"}',0,1,'2023-03-13 09:38:49'),(94,'{\"ins_num\":\"3\",\"ins_col\":\"31\\/03\\/2023\",\"payment_status\":\"0\",\"updatedBy\":\"1\",\"updatedDtm\":\"2023-03-13 09:43:32\"}',1,1,'2023-03-13 09:43:32'),(95,'{\"id_project\":\"20\",\"ins_num\":\"4\",\"ins_col\":\"30\\/04\\/2023\",\"createdBy\":\"1\",\"createdDtm\":\"2023-03-13 09:43:43\"}',0,1,'2023-03-13 09:43:43'),(96,'{\"ins_num\":\"1\",\"ins_col\":\"17\\/03\\/2023\",\"payment_status\":\"0\",\"updatedBy\":\"1\",\"updatedDtm\":\"2023-03-15 09:01:00\"}',1,1,'2023-03-15 09:01:00'),(97,'{\"ins_num\":\"2\",\"ins_col\":\"17\\/03\\/2023\",\"payment_status\":\"0\",\"updatedBy\":\"1\",\"updatedDtm\":\"2023-03-15 09:01:20\"}',1,1,'2023-03-15 09:01:20'),(98,'{\"ins_num\":\"2\",\"ins_col\":\"17\\/03\\/2023\",\"payment_status\":\"0\",\"updatedBy\":\"1\",\"updatedDtm\":\"2023-03-15 09:02:40\"}',1,1,'2023-03-15 09:02:40'),(99,'{\"ins_num\":\"2\",\"ins_col\":\"17\\/03\\/2023\",\"payment_status\":\"1\",\"updatedBy\":\"1\",\"updatedDtm\":\"2023-03-20 01:53:16\"}',1,1,'2023-03-20 01:53:16'),(100,'{\"ins_num\":\"2\",\"ins_col\":\"23\\/03\\/2023\",\"payment_status\":\"0\",\"updatedBy\":\"1\",\"updatedDtm\":\"2023-03-20 01:55:14\"}',1,1,'2023-03-20 01:55:14'),(101,'{\"ins_num\":\"1\",\"ins_col\":\"20\\/03\\/2023\",\"payment_status\":\"0\",\"updatedBy\":\"1\",\"updatedDtm\":\"2023-03-20 02:13:20\"}',1,1,'2023-03-20 02:13:20'),(102,'{\"ins_num\":\"2\",\"ins_col\":\"22\\/03\\/2023\",\"payment_status\":\"0\",\"updatedBy\":\"1\",\"updatedDtm\":\"2023-03-20 02:23:13\"}',1,1,'2023-03-20 02:23:13'),(103,'{\"ins_num\":\"3\",\"ins_col\":\"21\\/04\\/2023\",\"payment_status\":\"0\",\"updatedBy\":\"1\",\"updatedDtm\":\"2023-03-20 02:24:12\"}',1,1,'2023-03-20 02:24:12'),(104,'{\"ins_num\":\"4\",\"ins_col\":\"15\\/06\\/2023\",\"payment_status\":\"0\",\"updatedBy\":\"1\",\"updatedDtm\":\"2023-03-20 02:24:25\"}',1,1,'2023-03-20 02:24:25'),(105,'{\"id_project\":\"26\",\"ins_num\":\"1\",\"ins_col\":\"22\\/03\\/2023\",\"createdBy\":\"1\",\"createdDtm\":\"2023-03-22 02:03:41\"}',0,1,'2023-03-22 02:03:41'),(106,'{\"ins_num\":\"1\",\"ins_col\":\"22\\/03\\/2023\",\"payment_status\":\"1\",\"updatedBy\":\"1\",\"updatedDtm\":\"2023-03-22 02:03:46\"}',1,1,'2023-03-22 02:03:46'),(107,'{\"id_project\":\"28\",\"ins_num\":\"1\",\"ins_col\":\"24\\/03\\/2023\",\"createdBy\":\"1\",\"createdDtm\":\"2023-03-24 10:18:29\"}',0,1,'2023-03-24 10:18:29'),(108,'{\"id_project\":\"29\",\"ins_num\":\"1\",\"ins_col\":\"24\\/03\\/2023\",\"createdBy\":\"1\",\"createdDtm\":\"2023-03-24 10:52:19\"}',0,1,'2023-03-24 10:52:19'),(109,'{\"ins_num\":\"2\",\"ins_col\":\"27\\/03\\/2023\",\"payment_status\":\"0\",\"updatedBy\":\"1\",\"updatedDtm\":\"2023-03-27 03:24:44\"}',1,1,'2023-03-27 03:24:44'),(110,'{\"id_project\":\"30\",\"ins_num\":\"1\",\"ins_col\":\"04\\/04\\/2023\",\"createdBy\":\"1\",\"createdDtm\":\"2023-04-04 07:45:26\"}',0,1,'2023-04-04 07:45:26'),(111,'{\"ins_num\":\"1\",\"ins_col\":\"04\\/04\\/2023\",\"payment_status\":\"1\",\"updatedBy\":\"1\",\"updatedDtm\":\"2023-04-04 07:45:30\"}',1,1,'2023-04-04 07:45:30'),(112,'{\"ins_num\":\"1\",\"ins_col\":\"20\\/03\\/2023\",\"payment_status\":\"1\",\"updatedBy\":\"1\",\"updatedDtm\":\"2023-04-04 07:46:26\"}',1,1,'2023-04-04 07:46:26'),(113,'{\"ins_num\":\"1\",\"ins_col\":\"04\\/04\\/2023\",\"payment_status\":\"1\",\"updatedBy\":\"1\",\"updatedDtm\":\"2023-04-04 07:47:26\"}',1,1,'2023-04-04 07:47:26'),(114,'{\"ins_num\":\"2\",\"ins_col\":\"31\\/03\\/2023\",\"payment_status\":\"1\",\"updatedBy\":\"1\",\"updatedDtm\":\"2023-04-05 01:22:53\"}',1,1,'2023-04-05 01:22:53'),(115,'{\"ins_num\":\"4\",\"ins_col\":\"16\\/04\\/2023\",\"payment_status\":\"0\",\"updatedBy\":\"1\",\"updatedDtm\":\"2023-04-05 01:23:51\"}',1,1,'2023-04-05 01:23:51'),(116,'{\"ins_num\":\"4\",\"ins_col\":\"30\\/04\\/2023\",\"payment_status\":\"0\",\"updatedBy\":\"1\",\"updatedDtm\":\"2023-04-05 01:24:12\"}',1,1,'2023-04-05 01:24:12'),(117,'{\"ins_num\":\"2\",\"ins_col\":\"26\\/05\\/2023\",\"payment_status\":\"0\",\"updatedBy\":\"1\",\"updatedDtm\":\"2023-04-10 02:01:26\"}',1,1,'2023-04-10 02:01:26'),(118,'{\"ins_num\":\"3\",\"ins_col\":\"29\\/06\\/2023\",\"payment_status\":\"0\",\"updatedBy\":\"1\",\"updatedDtm\":\"2023-04-10 02:01:58\"}',1,1,'2023-04-10 02:01:58'),(119,'{\"ins_num\":\"4\",\"ins_col\":\"10\\/08\\/2023\",\"payment_status\":\"0\",\"updatedBy\":\"1\",\"updatedDtm\":\"2023-04-10 02:02:15\"}',1,1,'2023-04-10 02:02:15'),(120,'{\"ins_num\":\"5\",\"ins_col\":\"08\\/11\\/2024\",\"payment_status\":\"0\",\"updatedBy\":\"1\",\"updatedDtm\":\"2023-04-10 02:02:43\"}',1,1,'2023-04-10 02:02:43'),(121,'{\"ins_num\":\"3\",\"ins_col\":\"12\\/04\\/2023\",\"payment_status\":\"1\",\"updatedBy\":\"1\",\"updatedDtm\":\"2023-04-12 06:47:28\"}',1,1,'2023-04-12 06:47:28'),(122,'{\"ins_num\":\"1\",\"ins_col\":\"24\\/03\\/2023\",\"payment_status\":\"1\",\"updatedBy\":\"1\",\"updatedDtm\":\"2023-04-12 06:47:56\"}',1,1,'2023-04-12 06:47:56'),(123,'{\"id_project\":\"32\",\"ins_num\":\"1\",\"ins_col\":\"09\\/04\\/2023\",\"createdBy\":\"1\",\"createdDtm\":\"2023-04-12 06:48:19\"}',0,1,'2023-04-12 06:48:19'),(124,'{\"ins_num\":\"1\",\"ins_col\":\"09\\/04\\/2023\",\"payment_status\":\"1\",\"updatedBy\":\"1\",\"updatedDtm\":\"2023-04-12 06:48:24\"}',1,1,'2023-04-12 06:48:24'),(125,'{\"id_project\":\"32\",\"ins_num\":\"2\",\"ins_col\":\"21\\/04\\/2023\",\"createdBy\":\"1\",\"createdDtm\":\"2023-04-12 06:48:37\"}',0,1,'2023-04-12 06:48:37'),(126,'{\"id_project\":\"31\",\"ins_num\":\"1\",\"ins_col\":\"09\\/04\\/2023\",\"createdBy\":\"1\",\"createdDtm\":\"2023-04-12 06:48:59\"}',0,1,'2023-04-12 06:48:59'),(127,'{\"ins_num\":\"1\",\"ins_col\":\"09\\/04\\/2023\",\"payment_status\":\"1\",\"updatedBy\":\"1\",\"updatedDtm\":\"2023-04-12 06:49:04\"}',1,1,'2023-04-12 06:49:04'),(128,'{\"id_project\":\"31\",\"ins_num\":\"2\",\"ins_col\":\"21\\/04\\/2023\",\"createdBy\":\"1\",\"createdDtm\":\"2023-04-12 06:49:12\"}',0,1,'2023-04-12 06:49:12'),(129,'{\"id_project\":\"31\",\"ins_num\":\"3\",\"ins_col\":\"05\\/05\\/2023\",\"createdBy\":\"1\",\"createdDtm\":\"2023-04-12 06:49:27\"}',0,1,'2023-04-12 06:49:27'),(130,'{\"id_project\":\"25\",\"ins_num\":\"1\",\"ins_col\":\"02\\/04\\/2023\",\"createdBy\":\"1\",\"createdDtm\":\"2023-04-12 06:50:26\"}',0,1,'2023-04-12 06:50:26'),(131,'{\"ins_num\":\"1\",\"ins_col\":\"02\\/04\\/2023\",\"payment_status\":\"1\",\"updatedBy\":\"1\",\"updatedDtm\":\"2023-04-12 06:50:32\"}',1,1,'2023-04-12 06:50:32'),(132,'{\"id_project\":\"25\",\"ins_num\":\"2\",\"ins_col\":\"11\\/04\\/2023\",\"createdBy\":\"1\",\"createdDtm\":\"2023-04-12 06:50:44\"}',0,1,'2023-04-12 06:50:44'),(133,'{\"ins_num\":\"3\",\"ins_col\":\"01\\/05\\/2023\",\"payment_status\":\"0\",\"updatedBy\":\"1\",\"updatedDtm\":\"2023-04-16 11:10:04\"}',1,1,'2023-04-16 11:10:04'),(134,'{\"id_project\":\"34\",\"ins_num\":\"1\",\"ins_col\":\"28\\/04\\/2023\",\"createdBy\":\"1\",\"createdDtm\":\"2023-05-02 07:56:28\"}',0,1,'2023-05-02 07:56:28'),(135,'{\"ins_num\":\"1\",\"ins_col\":\"28\\/04\\/2023\",\"payment_status\":\"1\",\"updatedBy\":\"1\",\"updatedDtm\":\"2023-05-02 07:56:32\"}',1,1,'2023-05-02 07:56:32'),(136,'{\"id_project\":\"34\",\"ins_num\":\"2\",\"ins_col\":\"12\\/05\\/2023\",\"createdBy\":\"1\",\"createdDtm\":\"2023-05-02 07:56:44\"}',0,1,'2023-05-02 07:56:44'),(137,'{\"id_project\":\"34\",\"ins_num\":\"3\",\"ins_col\":\"19\\/05\\/2023\",\"createdBy\":\"1\",\"createdDtm\":\"2023-05-02 07:56:52\"}',0,1,'2023-05-02 07:56:52'),(138,'{\"id_project\":\"20\",\"ins_num\":\"5\",\"ins_col\":\"19\\/05\\/2023\",\"createdBy\":\"1\",\"createdDtm\":\"2023-05-02 07:57:14\"}',0,1,'2023-05-02 07:57:14'),(139,'{\"ins_num\":\"4\",\"ins_col\":\"30\\/04\\/2023\",\"payment_status\":\"1\",\"updatedBy\":\"1\",\"updatedDtm\":\"2023-05-02 07:57:23\"}',1,1,'2023-05-02 07:57:23'),(140,'{\"ins_num\":\"3\",\"ins_col\":\"31\\/05\\/2023\",\"payment_status\":\"0\",\"updatedBy\":\"1\",\"updatedDtm\":\"2023-05-02 07:58:54\"}',1,1,'2023-05-02 07:58:54'),(141,'{\"ins_num\":\"4\",\"ins_col\":\"30\\/06\\/2023\",\"payment_status\":\"0\",\"updatedBy\":\"1\",\"updatedDtm\":\"2023-05-02 07:59:01\"}',1,1,'2023-05-02 07:59:01'),(142,'{\"ins_num\":\"4\",\"ins_col\":\"30\\/04\\/2023\",\"payment_status\":\"2\",\"updatedBy\":\"1\",\"updatedDtm\":\"2023-05-02 07:59:33\"}',1,1,'2023-05-02 07:59:33'),(143,'{\"ins_num\":\"4\",\"ins_col\":\"31\\/05\\/2023\",\"payment_status\":\"0\",\"updatedBy\":\"1\",\"updatedDtm\":\"2023-05-02 08:00:06\"}',1,1,'2023-05-02 08:00:06'),(144,'{\"ins_num\":\"5\",\"ins_col\":\"31\\/05\\/2023\",\"payment_status\":\"0\",\"updatedBy\":\"1\",\"updatedDtm\":\"2023-05-02 08:00:38\"}',1,1,'2023-05-02 08:00:38'),(145,'{\"ins_num\":\"4\",\"ins_col\":\"30\\/04\\/2023\",\"payment_status\":\"1\",\"updatedBy\":\"1\",\"updatedDtm\":\"2023-05-15 03:04:49\"}',1,1,'2023-05-15 03:04:49'),(146,'{\"id_project\":\"35\",\"ins_num\":\"1\",\"ins_col\":\"18\\/05\\/2023\",\"createdBy\":\"1\",\"createdDtm\":\"2023-05-20 01:55:26\"}',0,1,'2023-05-20 01:55:26'),(147,'{\"ins_num\":\"3\",\"ins_col\":\"26\\/05\\/2023\",\"payment_status\":\"0\",\"updatedBy\":\"1\",\"updatedDtm\":\"2023-05-20 01:57:45\"}',1,1,'2023-05-20 01:57:45'),(148,'{\"ins_num\":\"3\",\"ins_col\":\"30\\/06\\/2023\",\"payment_status\":\"0\",\"updatedBy\":\"1\",\"updatedDtm\":\"2023-05-25 08:12:31\"}',1,1,'2023-05-25 08:12:31'),(149,'{\"ins_num\":\"5\",\"ins_col\":\"19\\/05\\/2023\",\"payment_status\":\"1\",\"updatedBy\":\"1\",\"updatedDtm\":\"2023-05-25 08:12:47\"}',1,1,'2023-05-25 08:12:47'),(150,'{\"id_project\":\"20\",\"ins_num\":\"6\",\"ins_col\":\"30\\/05\\/2023\",\"createdBy\":\"1\",\"createdDtm\":\"2023-05-25 08:13:09\"}',0,1,'2023-05-25 08:13:09'),(151,'{\"ins_num\":\"2\",\"ins_col\":\"09\\/06\\/2023\",\"payment_status\":\"0\",\"updatedBy\":\"1\",\"updatedDtm\":\"2023-05-25 08:18:38\"}',1,1,'2023-05-25 08:18:38'),(152,'{\"ins_num\":\"3\",\"ins_col\":\"30\\/06\\/2023\",\"payment_status\":\"0\",\"updatedBy\":\"1\",\"updatedDtm\":\"2023-05-30 04:32:38\"}',1,1,'2023-05-30 04:32:38'),(153,'{\"ins_num\":\"4\",\"ins_col\":\"30\\/07\\/2023\",\"payment_status\":\"0\",\"updatedBy\":\"1\",\"updatedDtm\":\"2023-05-30 04:32:48\"}',1,1,'2023-05-30 04:32:48'),(154,'{\"ins_num\":\"4\",\"ins_col\":\"30\\/06\\/2023\",\"payment_status\":\"0\",\"updatedBy\":\"1\",\"updatedDtm\":\"2023-05-30 04:33:15\"}',1,1,'2023-05-30 04:33:15'),(155,'{\"ins_num\":\"3\",\"ins_col\":\"30\\/06\\/2023\",\"payment_status\":\"0\",\"updatedBy\":\"1\",\"updatedDtm\":\"2023-05-30 04:33:28\"}',1,1,'2023-05-30 04:33:28'),(156,'{\"isDeleted\":1,\"updatedBy\":\"1\",\"updatedDtm\":\"2023-05-30 04:33:46\"}',2,1,'2023-05-30 04:33:46'),(157,'{\"id_project\":\"36\",\"ins_num\":\"1\",\"ins_col\":\"30\\/05\\/2023\",\"createdBy\":\"1\",\"createdDtm\":\"2023-05-30 04:34:29\"}',0,1,'2023-05-30 04:34:29'),(158,'{\"id_project\":\"37\",\"ins_num\":\"1\",\"ins_col\":\"30\\/05\\/2023\",\"createdBy\":\"1\",\"createdDtm\":\"2023-05-30 04:35:54\"}',0,1,'2023-05-30 04:35:54'),(159,'{\"ins_num\":\"1\",\"ins_col\":\"30\\/05\\/2023\",\"payment_status\":\"1\",\"updatedBy\":\"1\",\"updatedDtm\":\"2023-05-30 04:36:00\"}',1,1,'2023-05-30 04:36:00'),(160,'{\"id_project\":\"37\",\"ins_num\":\"2\",\"ins_col\":\"16\\/06\\/2023\",\"createdBy\":\"1\",\"createdDtm\":\"2023-05-30 04:36:10\"}',0,1,'2023-05-30 04:36:10'),(161,'{\"id_project\":\"37\",\"ins_num\":\"3\",\"ins_col\":\"12\\/07\\/2023\",\"createdBy\":\"1\",\"createdDtm\":\"2023-05-30 04:36:22\"}',0,1,'2023-05-30 04:36:22'),(162,'{\"id_project\":\"37\",\"ins_num\":\"4\",\"ins_col\":\"30\\/07\\/2023\",\"createdBy\":\"1\",\"createdDtm\":\"2023-05-30 04:36:31\"}',0,1,'2023-05-30 04:36:31'),(163,'{\"ins_num\":\"1\",\"ins_col\":\"09\\/06\\/2023\",\"payment_status\":\"0\",\"updatedBy\":\"1\",\"updatedDtm\":\"2023-05-30 04:38:53\"}',1,1,'2023-05-30 04:38:53'),(164,'{\"ins_num\":\"1\",\"ins_col\":\"09\\/06\\/2023\",\"payment_status\":\"1\",\"updatedBy\":\"1\",\"updatedDtm\":\"2023-08-04 03:00:20\"}',1,1,'2023-08-04 03:00:20'),(165,'{\"ins_num\":\"2\",\"ins_col\":\"16\\/06\\/2023\",\"payment_status\":\"1\",\"updatedBy\":\"1\",\"updatedDtm\":\"2023-08-04 03:00:56\"}',1,1,'2023-08-04 03:00:56'),(166,'{\"id_project\":\"40\",\"ins_num\":\"1\",\"ins_col\":\"25\\/07\\/2023\",\"createdBy\":\"1\",\"createdDtm\":\"2023-08-04 03:03:34\"}',0,1,'2023-08-04 03:03:34'),(167,'{\"ins_num\":\"1\",\"ins_col\":\"25\\/07\\/2023\",\"payment_status\":\"1\",\"updatedBy\":\"1\",\"updatedDtm\":\"2023-08-04 03:03:40\"}',1,1,'2023-08-04 03:03:40'),(168,'{\"id_project\":\"40\",\"ins_num\":\"2\",\"ins_col\":\"25\\/08\\/2023\",\"createdBy\":\"1\",\"createdDtm\":\"2023-08-04 03:03:48\"}',0,1,'2023-08-04 03:03:48'),(169,'{\"id_project\":\"40\",\"ins_num\":\"3\",\"ins_col\":\"12\\/09\\/2023\",\"createdBy\":\"1\",\"createdDtm\":\"2023-08-04 03:04:04\"}',0,1,'2023-08-04 03:04:04'),(170,'{\"ins_num\":\"3\",\"ins_col\":\"30\\/11\\/2023\",\"payment_status\":\"0\",\"updatedBy\":\"1\",\"updatedDtm\":\"2023-08-31 04:44:27\"}',1,1,'2023-08-31 04:44:27'),(171,'{\"ins_num\":\"4\",\"ins_col\":\"30\\/11\\/2023\",\"payment_status\":\"0\",\"updatedBy\":\"1\",\"updatedDtm\":\"2023-08-31 04:44:33\"}',1,1,'2023-08-31 04:44:33'),(172,'{\"ins_num\":\"3\",\"ins_col\":\"05\\/11\\/2023\",\"payment_status\":\"0\",\"updatedBy\":\"1\",\"updatedDtm\":\"2023-08-31 04:45:33\"}',1,1,'2023-08-31 04:45:33'),(173,'{\"ins_num\":\"2\",\"ins_col\":\"21\\/11\\/2023\",\"payment_status\":\"0\",\"updatedBy\":\"1\",\"updatedDtm\":\"2023-08-31 04:45:39\"}',1,1,'2023-08-31 04:45:39'),(174,'{\"ins_num\":\"2\",\"ins_col\":\"21\\/11\\/2023\",\"payment_status\":\"0\",\"updatedBy\":\"1\",\"updatedDtm\":\"2023-08-31 04:46:03\"}',1,1,'2023-08-31 04:46:03'),(175,'{\"ins_num\":\"3\",\"ins_col\":\"30\\/11\\/2023\",\"payment_status\":\"0\",\"updatedBy\":\"1\",\"updatedDtm\":\"2023-08-31 04:46:16\"}',1,1,'2023-08-31 04:46:16'),(176,'{\"ins_num\":\"4\",\"ins_col\":\"30\\/11\\/2023\",\"payment_status\":\"0\",\"updatedBy\":\"1\",\"updatedDtm\":\"2023-08-31 04:47:08\"}',1,1,'2023-08-31 04:47:08'),(177,'{\"ins_num\":\"2\",\"ins_col\":\"09\\/11\\/2023\",\"payment_status\":\"0\",\"updatedBy\":\"1\",\"updatedDtm\":\"2023-08-31 04:47:26\"}',1,1,'2023-08-31 04:47:26'),(178,'{\"ins_num\":\"3\",\"ins_col\":\"30\\/11\\/2023\",\"payment_status\":\"0\",\"updatedBy\":\"1\",\"updatedDtm\":\"2023-08-31 04:47:49\"}',1,1,'2023-08-31 04:47:49'),(179,'{\"ins_num\":\"2\",\"ins_col\":\"06\\/09\\/2023\",\"payment_status\":\"0\",\"updatedBy\":\"1\",\"updatedDtm\":\"2023-08-31 04:48:16\"}',1,1,'2023-08-31 04:48:16'),(180,'{\"ins_num\":\"3\",\"ins_col\":\"06\\/09\\/2023\",\"payment_status\":\"0\",\"updatedBy\":\"1\",\"updatedDtm\":\"2023-08-31 04:48:39\"}',1,1,'2023-08-31 04:48:39'),(181,'{\"ins_num\":\"4\",\"ins_col\":\"06\\/09\\/2023\",\"payment_status\":\"0\",\"updatedBy\":\"1\",\"updatedDtm\":\"2023-08-31 04:48:47\"}',1,1,'2023-08-31 04:48:47'),(182,'{\"ins_num\":\"2\",\"ins_col\":\"02\\/09\\/2023\",\"payment_status\":\"0\",\"updatedBy\":\"1\",\"updatedDtm\":\"2023-08-31 04:49:42\"}',1,1,'2023-08-31 04:49:42'),(183,'{\"ins_num\":\"3\",\"ins_col\":\"25\\/09\\/2023\",\"payment_status\":\"0\",\"updatedBy\":\"1\",\"updatedDtm\":\"2023-08-31 04:49:50\"}',1,1,'2023-08-31 04:49:50'),(184,'{\"ins_num\":\"3\",\"ins_col\":\"30\\/09\\/2023\",\"payment_status\":\"0\",\"updatedBy\":\"1\",\"updatedDtm\":\"2023-08-31 04:50:51\"}',1,1,'2023-08-31 04:50:51'),(185,'{\"ins_num\":\"4\",\"ins_col\":\"06\\/10\\/2023\",\"payment_status\":\"0\",\"updatedBy\":\"1\",\"updatedDtm\":\"2023-08-31 04:50:59\"}',1,1,'2023-08-31 04:50:59'),(186,'{\"ins_num\":\"2\",\"ins_col\":\"11\\/09\\/2023\",\"payment_status\":\"0\",\"updatedBy\":\"1\",\"updatedDtm\":\"2023-08-31 04:51:07\"}',1,1,'2023-08-31 04:51:07'),(187,'{\"ins_num\":\"3\",\"ins_col\":\"05\\/09\\/2023\",\"payment_status\":\"0\",\"updatedBy\":\"1\",\"updatedDtm\":\"2023-08-31 05:02:01\"}',1,1,'2023-08-31 05:02:01'),(188,'{\"ins_num\":\"2\",\"ins_col\":\"12\\/05\\/2023\",\"payment_status\":\"1\",\"updatedBy\":\"1\",\"updatedDtm\":\"2023-08-31 05:13:16\"}',1,1,'2023-08-31 05:13:16'),(189,'{\"ins_num\":\"3\",\"ins_col\":\"19\\/05\\/2023\",\"payment_status\":\"1\",\"updatedBy\":\"1\",\"updatedDtm\":\"2023-08-31 05:13:20\"}',1,1,'2023-08-31 05:13:20'),(190,'{\"ins_num\":\"1\",\"ins_col\":\"24\\/03\\/2023\",\"payment_status\":\"1\",\"updatedBy\":\"1\",\"updatedDtm\":\"2023-08-31 05:13:34\"}',1,1,'2023-08-31 05:13:34');
/*!40000 ALTER TABLE `log_ins` ENABLE KEYS */;
UNLOCK TABLES;
/*!40103 SET TIME_ZONE=@OLD_TIME_ZONE */;

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;

-- Dump completed on 2023-12-13 20:52:53
