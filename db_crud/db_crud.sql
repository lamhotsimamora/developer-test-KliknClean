-- MariaDB dump 10.19  Distrib 10.4.18-MariaDB, for Win64 (AMD64)
--
-- Host: localhost    Database: db_crud
-- ------------------------------------------------------
-- Server version	10.4.18-MariaDB

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
-- Table structure for table `companies`
--

DROP TABLE IF EXISTS `companies`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `companies` (
  `company_id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `company_name` varchar(45) NOT NULL,
  `company_email` varchar(45) NOT NULL,
  `company_address` varchar(45) NOT NULL,
  `company_phone` varchar(45) NOT NULL,
  `update_at` datetime NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  `created_at` datetime DEFAULT NULL,
  PRIMARY KEY (`company_id`)
) ENGINE=InnoDB AUTO_INCREMENT=129 DEFAULT CHARSET=utf8mb4;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `companies`
--

LOCK TABLES `companies` WRITE;
/*!40000 ALTER TABLE `companies` DISABLE KEYS */;
INSERT INTO `companies` VALUES (1,'PT Sinarmas TBK','sinarmas@gmail.com','Jakarta Pusat','0211231231','2021-05-26 00:12:58','2021-05-25 17:07:11'),(2,'PT Gudang Garam','gudanggaram@yahoo.com','Semarang','021313112','2021-05-26 00:13:01','2021-05-25 17:07:26'),(3,'PT Mitshubisi','mitshubisi@gmail.com','Bandung','021212121','2021-05-26 21:53:41','2021-05-25 17:50:28'),(4,'PT Citra Raya','citra@gmail.com','Jakarta','021123212','2021-05-26 21:53:44','2021-05-26 14:33:00'),(5,'PT Honda','honda@gmail.com','Bandung','023121','2021-05-26 21:53:46','2021-05-26 14:33:16'),(6,'PT Yamaha','yamaha@gmail.com','Semarang','0113213','2021-05-26 21:53:47','2021-05-26 14:33:39'),(7,'PT Unilever','unilever@gmail.com','Jogja','012312312','2021-05-26 21:53:49','2021-05-26 14:34:13'),(8,'PT INDOFOOD','indofood@yahoo.com','Semarang','012312321','2021-05-26 21:53:51','2021-05-26 14:34:32'),(9,'PT BUMN','bumn@gmail.com','Medan','01231231','2021-05-26 21:53:53','2021-05-26 14:34:49'),(10,'PT Surya','surya@gmail.com','Jakarta','0123123','2021-05-26 21:53:58','2021-05-26 14:35:02'),(11,'PT Tokopedia','tokopedia@gmail.com','Bandung','123123213','2021-05-26 21:54:01','2021-05-26 14:35:16'),(12,'PT Samsung Indo','samsung@indo.com','Jepang','0123123','2021-05-26 21:54:04','2021-05-26 14:35:39'),(13,'PT Suzuki','suzuki@gmail.com','Palembang','0123123','2021-05-26 21:54:06','2021-05-26 14:36:04'),(124,'PT Teh Botol Sosro','sosro@yahoo.com','Surabaya','213213123','2021-05-26 16:45:49','2021-05-26 16:45:49'),(127,'PT Asus Indonesia','asus@gmail.com','Bali','123123123','2021-05-26 17:07:02','2021-05-26 17:07:02');
/*!40000 ALTER TABLE `companies` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `employees`
--

DROP TABLE IF EXISTS `employees`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `employees` (
  `employees_id` int(11) NOT NULL AUTO_INCREMENT,
  `fullname` varchar(35) NOT NULL,
  `company_id` int(11) NOT NULL,
  `department` varchar(55) NOT NULL,
  `email` varchar(45) NOT NULL,
  `created_at` datetime NOT NULL,
  `update_at` datetime NOT NULL,
  PRIMARY KEY (`employees_id`),
  UNIQUE KEY `email` (`email`)
) ENGINE=InnoDB AUTO_INCREMENT=24 DEFAULT CHARSET=utf8mb4;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `employees`
--

LOCK TABLES `employees` WRITE;
/*!40000 ALTER TABLE `employees` DISABLE KEYS */;
INSERT INTO `employees` VALUES (3,'Lamhot Simamora',1,'Accounting','lamhot@gmail.com','2021-05-25 17:17:24','2021-05-25 17:17:24'),(4,'Elfrida',1,'Kasir','elfrida@gmail.com','2021-05-25 17:44:42','2021-05-25 17:44:42'),(5,'Veronyca',2,'Teknisi','vero@gmail.com','2021-05-25 17:45:02','2021-05-25 17:45:02'),(6,'Tina',1,'Kasir','tina@gmail.com','2021-05-25 17:50:50','2021-05-25 17:50:50'),(7,'Andi',1,'Teknisi','andi@gmail.com','2021-05-26 15:35:26','2021-05-26 15:35:26'),(8,'Putra',3,'Montir','putra@gmail.com','2021-05-26 15:35:41','2021-05-26 15:35:41'),(9,'Agung',4,'Asisstant','agung@gmail.com','2021-05-26 15:35:58','2021-05-26 15:35:58'),(10,'Ahmad',6,'Keuangan','ahmad@gmail.com','2021-05-26 15:36:16','2021-05-26 15:36:16'),(11,'Brodu',4,'Keuangan','brodu@gmail.com','2021-05-26 15:36:31','2021-05-26 15:36:31'),(12,'Yuli',7,'Keuangan','yuli@gmail.com','2021-05-26 15:36:52','2021-05-26 15:36:52'),(13,'Saputra',7,'Keuangan','saputra@gmail.com','2021-05-26 15:37:09','2021-05-26 15:37:09'),(14,'Birdi',5,'Teknisi','birdi@yahoo.com','2021-05-26 15:37:28','2021-05-26 15:37:28'),(15,'Soleh',1,'Manager','soleh@gmail.com','2021-05-26 15:37:41','2021-05-26 15:37:41'),(16,'Rian',2,'Keamanan','rian@yahoo.com','2021-05-26 15:38:00','2021-05-26 15:38:00'),(17,'Rendi',8,'Kebersihan','rendi@yahoo.com','2021-05-26 15:38:17','2021-05-26 15:38:17'),(18,'Syiar',9,'Keamanan','siar@gmail.com','2021-05-26 15:38:36','2021-05-26 15:38:36'),(19,'Loren',11,'Programmer','loren@yahoo.com','2021-05-26 15:38:53','2021-05-26 15:38:53'),(20,'Yuki',7,'Sales','yuki@gmail.com','2021-05-26 16:50:24','2021-05-26 16:50:24'),(22,'Tomi',12,'Sales','tomi@gmail.com','2021-05-26 17:07:48','2021-05-26 17:07:48');
/*!40000 ALTER TABLE `employees` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Temporary table structure for view `view_employees`
--

DROP TABLE IF EXISTS `view_employees`;
/*!50001 DROP VIEW IF EXISTS `view_employees`*/;
SET @saved_cs_client     = @@character_set_client;
SET character_set_client = utf8;
/*!50001 CREATE TABLE `view_employees` (
  `employees_id` tinyint NOT NULL,
  `fullname` tinyint NOT NULL,
  `company_id` tinyint NOT NULL,
  `department` tinyint NOT NULL,
  `email` tinyint NOT NULL,
  `created_at` tinyint NOT NULL,
  `update_at` tinyint NOT NULL,
  `company_name` tinyint NOT NULL
) ENGINE=MyISAM */;
SET character_set_client = @saved_cs_client;

--
-- Temporary table structure for view `view_report_employees`
--

DROP TABLE IF EXISTS `view_report_employees`;
/*!50001 DROP VIEW IF EXISTS `view_report_employees`*/;
SET @saved_cs_client     = @@character_set_client;
SET character_set_client = utf8;
/*!50001 CREATE TABLE `view_report_employees` (
  `company_id` tinyint NOT NULL,
  `company_name` tinyint NOT NULL,
  `employees_id` tinyint NOT NULL,
  `total_employees` tinyint NOT NULL
) ENGINE=MyISAM */;
SET character_set_client = @saved_cs_client;

--
-- Final view structure for view `view_employees`
--

/*!50001 DROP TABLE IF EXISTS `view_employees`*/;
/*!50001 DROP VIEW IF EXISTS `view_employees`*/;
/*!50001 SET @saved_cs_client          = @@character_set_client */;
/*!50001 SET @saved_cs_results         = @@character_set_results */;
/*!50001 SET @saved_col_connection     = @@collation_connection */;
/*!50001 SET character_set_client      = utf8mb4 */;
/*!50001 SET character_set_results     = utf8mb4 */;
/*!50001 SET collation_connection      = utf8mb4_unicode_ci */;
/*!50001 CREATE ALGORITHM=UNDEFINED */
/*!50013 DEFINER=`root`@`localhost` SQL SECURITY DEFINER */
/*!50001 VIEW `view_employees` AS select `employees`.`employees_id` AS `employees_id`,`employees`.`fullname` AS `fullname`,`employees`.`company_id` AS `company_id`,`employees`.`department` AS `department`,`employees`.`email` AS `email`,`employees`.`created_at` AS `created_at`,`employees`.`update_at` AS `update_at`,`companies`.`company_name` AS `company_name` from (`employees` join `companies` on(`companies`.`company_id` = `employees`.`company_id`)) */;
/*!50001 SET character_set_client      = @saved_cs_client */;
/*!50001 SET character_set_results     = @saved_cs_results */;
/*!50001 SET collation_connection      = @saved_col_connection */;

--
-- Final view structure for view `view_report_employees`
--

/*!50001 DROP TABLE IF EXISTS `view_report_employees`*/;
/*!50001 DROP VIEW IF EXISTS `view_report_employees`*/;
/*!50001 SET @saved_cs_client          = @@character_set_client */;
/*!50001 SET @saved_cs_results         = @@character_set_results */;
/*!50001 SET @saved_col_connection     = @@collation_connection */;
/*!50001 SET character_set_client      = utf8mb4 */;
/*!50001 SET character_set_results     = utf8mb4 */;
/*!50001 SET collation_connection      = utf8mb4_unicode_ci */;
/*!50001 CREATE ALGORITHM=UNDEFINED */
/*!50013 DEFINER=`root`@`localhost` SQL SECURITY DEFINER */
/*!50001 VIEW `view_report_employees` AS select `companies`.`company_id` AS `company_id`,`companies`.`company_name` AS `company_name`,`employees`.`employees_id` AS `employees_id`,count(`employees`.`company_id`) AS `total_employees` from (`companies` join `employees` on(`companies`.`company_id` = `employees`.`company_id`)) group by `employees`.`company_id` */;
/*!50001 SET character_set_client      = @saved_cs_client */;
/*!50001 SET character_set_results     = @saved_cs_results */;
/*!50001 SET collation_connection      = @saved_col_connection */;
/*!40103 SET TIME_ZONE=@OLD_TIME_ZONE */;

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;

-- Dump completed on 2021-05-27  0:14:53
