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
-- Table structure for table `log_issues`
--

DROP TABLE IF EXISTS `log_issues`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `log_issues` (
  `id` int NOT NULL AUTO_INCREMENT,
  `data` longtext NOT NULL,
  `change` tinyint NOT NULL,
  `createdBy` int DEFAULT '0',
  `createdDtm` datetime DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=12 DEFAULT CHARSET=utf8mb3;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `log_issues`
--

LOCK TABLES `log_issues` WRITE;
/*!40000 ALTER TABLE `log_issues` DISABLE KEYS */;
INSERT INTO `log_issues` VALUES (1,'{\"checklist_id\":\"1\",\"topic\":\"test\",\"date\":\"2023-02-20\",\"important\":\"low\",\"createdBy\":\"1\",\"createdDtm\":\"2023-02-20 08:34:41\"}',0,1,'2023-02-20 08:34:41'),(2,'{\"isDeleted\":1,\"updatedBy\":\"1\",\"updatedDtm\":\"2023-02-21 08:31:17\"}',2,1,'2023-02-21 08:31:17'),(3,'{\"isDeleted\":1,\"updatedBy\":\"1\",\"updatedDtm\":\"2023-02-21 08:32:30\"}',2,1,'2023-02-21 08:32:30'),(4,'{\"checklist_id\":\"1\",\"topic\":\"test\",\"date\":\"2023-02-22\",\"important\":\"low\",\"createdBy\":\"1\",\"createdDtm\":\"2023-02-22 02:41:56\"}',0,1,'2023-02-22 02:41:56'),(5,'{\"checklist_id\":\"25\",\"topic\":\"\\u0e40\\u0e1e\\u0e34\\u0e48\\u0e21\\u0e02\\u0e19\\u0e32\\u0e14 \\u0e1f\\u0e34\\u0e25\\u0e14\\u0e4c topic \\u0e17\\u0e38\\u0e01\\u0e17\\u0e35\\u0e48\",\"date\":\"2023-03-01\",\"important\":\"critical\",\"createdBy\":\"1\",\"createdDtm\":\"2023-03-01 04:57:25\"}',0,1,'2023-03-01 04:57:25'),(6,'{\"checklist_id\":\"25\",\"topic\":\"\\u0e0a\\u0e37\\u0e48\\u0e2d\\u0e2b\\u0e19\\u0e49\\u0e32 issue \\u0e40\\u0e1b\\u0e47\\u0e19\\u0e23\\u0e32\\u0e22\\u0e25\\u0e30\\u0e40\\u0e2d\\u0e35\\u0e22\\u0e14\",\"date\":\"2023-03-01\",\"important\":\"low\",\"createdBy\":\"1\",\"createdDtm\":\"2023-03-01 04:57:46\"}',0,1,'2023-03-01 04:57:46'),(7,'{\"checklist_id\":\"26\",\"topic\":\"\\u0e2a\\u0e16\\u0e32\\u0e19\\u0e30 support \\u0e44\\u0e21\\u0e48\\u0e02\\u0e36\\u0e49\\u0e19\",\"date\":\"2023-03-01\",\"important\":\"low\",\"createdBy\":\"1\",\"createdDtm\":\"2023-03-01 04:59:16\"}',0,1,'2023-03-01 04:59:16'),(8,'{\"checklist_id\":\"46\",\"topic\":\"\\u0e2d\\u0e31\\u0e1e\\u0e42\\u0e2b\\u0e25\\u0e14\\u0e23\\u0e39\\u0e1b\\u0e44\\u0e21\\u0e48\\u0e44\\u0e14\\u0e49\",\"date\":\"2023-03-02\",\"important\":\"high\",\"createdBy\":\"1\",\"createdDtm\":\"2023-03-02 04:21:47\"}',0,1,'2023-03-02 04:21:47'),(9,'{\"checklist_id\":\"60\",\"topic\":\"\\u0e40\\u0e21\\u0e19\\u0e39\\u0e0a\\u0e34\\u0e14\\u0e1d\\u0e31\\u0e48\\u0e07\\u0e0b\\u0e49\\u0e32\\u0e22\\u0e40\\u0e01\\u0e34\\u0e19\\u0e44\\u0e1b\",\"date\":\"2023-03-07\",\"important\":\"medium\",\"createdBy\":\"1\",\"createdDtm\":\"2023-03-07 02:31:21\"}',0,1,'2023-03-07 02:31:21'),(10,'{\"checklist_id\":\"94\",\"topic\":\"\\u0e25\\u0e39\\u0e01\\u0e04\\u0e49\\u0e32\\u0e41\\u0e08\\u0e49\\u0e07\\u0e2a\\u0e21\\u0e31\\u0e04\\u0e23\\u0e22\\u0e32\\u0e01\",\"date\":\"2023-03-07\",\"important\":\"medium\",\"createdBy\":\"1\",\"createdDtm\":\"2023-03-07 04:01:23\"}',0,1,'2023-03-07 04:01:23'),(11,'{\"checklist_id\":\"145\",\"topic\":\"\\u0e1b\\u0e38\\u0e48\\u0e21 add \\u0e17\\u0e31\\u0e1a\\u0e23\\u0e32\\u0e22\\u0e01\\u0e32\\u0e23\\u0e17\\u0e35\\u0e48\\u0e08\\u0e30\\u0e40\\u0e25\\u0e37\\u0e2d\\u0e01 \\u0e41\\u0e25\\u0e30\\u0e40\\u0e25\\u0e37\\u0e2d\\u0e01\\u0e40\\u0e2a\\u0e23\\u0e47\\u0e08\\u0e41\\u0e25\\u0e49\\u0e27\\u0e01\\u0e14 add \\u0e44\\u0e21\\u0e48\\u0e44\\u0e14\\u0e49\",\"date\":\"2023-03-27\",\"important\":\"low\",\"createdBy\":\"1\",\"createdDtm\":\"2023-03-27 05:57:30\"}',0,1,'2023-03-27 05:57:30');
/*!40000 ALTER TABLE `log_issues` ENABLE KEYS */;
UNLOCK TABLES;
/*!40103 SET TIME_ZONE=@OLD_TIME_ZONE */;

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;

-- Dump completed on 2023-12-13 20:52:55
