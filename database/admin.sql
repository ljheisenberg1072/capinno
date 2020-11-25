-- MySQL dump 10.13  Distrib 5.7.24, for Linux (x86_64)
--
-- Host: 127.0.0.1    Database: capinno
-- ------------------------------------------------------
-- Server version	5.7.24-0ubuntu0.18.04.1

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
-- Dumping data for table `admin_menu`
--

LOCK TABLES `admin_menu` WRITE;
/*!40000 ALTER TABLE `admin_menu` DISABLE KEYS */;
INSERT INTO `admin_menu` VALUES (1,0,1,'首页','fa-bar-chart','/',NULL,NULL,'2019-06-09 23:58:49'),(2,0,9,'系统管理','fa-tasks',NULL,NULL,NULL,'2020-09-09 10:30:31'),(3,2,10,'管理员','fa-users','auth/users',NULL,NULL,'2020-09-09 10:30:31'),(4,2,11,'角色','fa-user','auth/roles',NULL,NULL,'2020-09-09 10:30:31'),(5,2,12,'权限','fa-ban','auth/permissions',NULL,NULL,'2020-09-09 10:30:31'),(6,2,13,'菜单','fa-bars','auth/menu',NULL,NULL,'2020-09-09 10:30:31'),(7,2,14,'操作日志','fa-history','auth/logs',NULL,NULL,'2020-09-09 10:30:31'),(8,0,8,'用户管理','fa-users','/users',NULL,'2019-06-10 00:18:30','2020-09-09 10:30:31'),(9,0,3,'大赛管理','fa-cubes','/campaigns',NULL,'2019-06-10 00:54:54','2020-08-28 09:27:23'),(10,13,5,'新闻分类','fa-book','/news_categories',NULL,'2019-12-13 12:47:37','2020-08-28 09:27:39'),(11,13,6,'新闻列表','fa-newspaper-o','/news_articles',NULL,'2019-12-13 12:49:03','2020-08-28 09:27:51'),(12,1,2,'轮播图','fa-image','/carousels',NULL,'2020-06-02 16:38:51','2020-08-28 09:27:23'),(13,0,4,'新闻管理','fa-hacker-news',NULL,NULL,'2020-08-28 09:26:44','2020-08-28 09:27:23'),(14,0,7,'评委管理','fa-sitemap','/judges',NULL,'2020-09-09 10:30:04','2020-09-09 10:30:31'),(15,14,0,'大赛评委','fa-male','/judges',NULL,'2020-09-09 10:32:01','2020-09-09 10:32:01');
/*!40000 ALTER TABLE `admin_menu` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Dumping data for table `admin_permissions`
--

LOCK TABLES `admin_permissions` WRITE;
/*!40000 ALTER TABLE `admin_permissions` DISABLE KEYS */;
INSERT INTO `admin_permissions` VALUES (1,'All permission','*','','*',NULL,NULL),(2,'Dashboard','dashboard','GET','/',NULL,NULL),(3,'Login','auth.login','','/auth/login\r\n/auth/logout',NULL,NULL),(4,'User setting','auth.setting','GET,PUT','/auth/setting',NULL,NULL),(5,'Auth management','auth.management','','/auth/roles\r\n/auth/permissions\r\n/auth/menu\r\n/auth/logs',NULL,NULL),(6,'用户管理','users','','/users*','2019-12-13 12:35:05','2019-12-13 12:36:44'),(7,'大赛管理','campaigns','','/campaigns*','2019-12-13 12:37:09','2019-12-13 12:39:50'),(8,'轮播图','carousels','','/carousels*','2020-06-02 23:09:40','2020-06-02 23:09:40');
/*!40000 ALTER TABLE `admin_permissions` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Dumping data for table `admin_role_menu`
--

LOCK TABLES `admin_role_menu` WRITE;
/*!40000 ALTER TABLE `admin_role_menu` DISABLE KEYS */;
INSERT INTO `admin_role_menu` VALUES (1,2,NULL,NULL);
/*!40000 ALTER TABLE `admin_role_menu` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Dumping data for table `admin_role_permissions`
--

LOCK TABLES `admin_role_permissions` WRITE;
/*!40000 ALTER TABLE `admin_role_permissions` DISABLE KEYS */;
INSERT INTO `admin_role_permissions` VALUES (1,1,NULL,NULL);
/*!40000 ALTER TABLE `admin_role_permissions` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Dumping data for table `admin_role_users`
--

LOCK TABLES `admin_role_users` WRITE;
/*!40000 ALTER TABLE `admin_role_users` DISABLE KEYS */;
INSERT INTO `admin_role_users` VALUES (1,1,NULL,NULL);
/*!40000 ALTER TABLE `admin_role_users` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Dumping data for table `admin_roles`
--

LOCK TABLES `admin_roles` WRITE;
/*!40000 ALTER TABLE `admin_roles` DISABLE KEYS */;
INSERT INTO `admin_roles` VALUES (1,'Administrator','administrator','2019-06-09 22:53:59','2019-06-09 22:53:59');
/*!40000 ALTER TABLE `admin_roles` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Dumping data for table `admin_user_permissions`
--

LOCK TABLES `admin_user_permissions` WRITE;
/*!40000 ALTER TABLE `admin_user_permissions` DISABLE KEYS */;
/*!40000 ALTER TABLE `admin_user_permissions` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Dumping data for table `admin_users`
--

LOCK TABLES `admin_users` WRITE;
/*!40000 ALTER TABLE `admin_users` DISABLE KEYS */;
INSERT INTO `admin_users` VALUES (1,'admin','$2y$10$rYEVlnMy9AR1vUaAD.Opj.ZAQDO7hdhQrqBJUGRa.KYWC4jx..CPy','Administrator',NULL,'PNeFdXNTEG9hyELvRGmmeMGTHeZMlf61SLsPBjFFhXvEwydq0U7jWQ8iCMHw','2019-06-09 22:53:59','2019-06-09 22:53:59');
/*!40000 ALTER TABLE `admin_users` ENABLE KEYS */;
UNLOCK TABLES;
/*!40103 SET TIME_ZONE=@OLD_TIME_ZONE */;

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;

-- Dump completed on 2020-09-20  8:31:33
