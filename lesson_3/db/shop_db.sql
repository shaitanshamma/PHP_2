-- MySQL dump 10.13  Distrib 8.0.18, for Win64 (x86_64)
--
-- Host: 127.0.0.1    Database: store
-- ------------------------------------------------------
-- Server version	8.0.18

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
-- Table structure for table `cart`
--

DROP TABLE IF EXISTS `cart`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `cart` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `prod_id` int(11) NOT NULL,
  `quant` tinyint(128) unsigned NOT NULL DEFAULT '1',
  `session_uid` varchar(255) NOT NULL,
  PRIMARY KEY (`id`),
  KEY `prod_id_from_cart_idx` (`prod_id`),
  CONSTRAINT `prod_id_from_cart` FOREIGN KEY (`prod_id`) REFERENCES `products` (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=296 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `cart`
--

LOCK TABLES `cart` WRITE;
/*!40000 ALTER TABLE `cart` DISABLE KEYS */;
INSERT INTO `cart` VALUES (184,1,1,'t83blffj2gim2lvgjn9h01cl8s3rtrog'),(201,1,1,'6lvnmaagjgjklc8kne9q2qu5fcssm9ls'),(202,2,1,'6lvnmaagjgjklc8kne9q2qu5fcssm9ls'),(203,2,1,'9na70lqftjkkekh4j39f31m9c6k4i1jn'),(204,1,1,'9na70lqftjkkekh4j39f31m9c6k4i1jn'),(205,1,2,'uqmdpqvs6baj5q6lof97p5rvoul6c0ui'),(206,1,2,'m3mjsqb9420noahevjasp3c4fpe2l9ki'),(207,1,1,'q5b6kpbkvc227g7e5ufgp4u1g82j2jkj'),(208,1,1,'lgotf3lc8cutji98vi2npum15bsc183o'),(209,1,1,'0fb9hbo1iiip2vgg4ci9v2iq1os7s9f9'),(210,2,1,'1cajsdn58g9euk7j3dpc2qj0onbc8pks'),(211,3,1,'1cajsdn58g9euk7j3dpc2qj0onbc8pks'),(212,1,1,'k7609mucjhnop49dok71gqgn3fs0fks6'),(213,2,1,'k7609mucjhnop49dok71gqgn3fs0fks6'),(214,2,1,'mpm6ni5vgsmnveg04sq09j1psfnjc4ms'),(215,1,1,'mpm6ni5vgsmnveg04sq09j1psfnjc4ms'),(216,1,1,'mpm6ni5vgsmnveg04sq09j1psfnjc4ms'),(217,1,1,'mpm6ni5vgsmnveg04sq09j1psfnjc4ms'),(218,1,1,'mpm6ni5vgsmnveg04sq09j1psfnjc4ms'),(219,1,1,'mpm6ni5vgsmnveg04sq09j1psfnjc4ms'),(220,1,1,'mpm6ni5vgsmnveg04sq09j1psfnjc4ms'),(221,1,1,'l1m2pejaa2l20ogjva6qc0894br5evgi'),(252,1,1,'r6ubirtp0qa50am9bjmmql4no94lf4kb'),(253,3,1,'sr1r552oq88nhfgd43mc0ucmd3s8v4it'),(254,4,1,'sr1r552oq88nhfgd43mc0ucmd3s8v4it'),(255,1,1,'sr1r552oq88nhfgd43mc0ucmd3s8v4it'),(278,1,1,'bk26gn8hs0mqbsehg9j80lm2l6og7q14'),(279,1,1,'fd8slch68hq6epbsc5p6anjvv2tt2ucg'),(280,2,1,'fd8slch68hq6epbsc5p6anjvv2tt2ucg'),(281,2,1,'fd8slch68hq6epbsc5p6anjvv2tt2ucg'),(282,1,1,'fd8slch68hq6epbsc5p6anjvv2tt2ucg'),(284,1,1,'o3i2v9iobtgodn18bmi0mqemgpp5pcd6'),(285,2,1,'o3i2v9iobtgodn18bmi0mqemgpp5pcd6'),(286,1,1,'gu4emun7ta06mfbedtviqlpua643b67v'),(287,1,1,'b8ripp5j25nq48u054ri5f7hksn9l6f2'),(288,2,1,'b8ripp5j25nq48u054ri5f7hksn9l6f2'),(289,1,1,'ikcqbrpirovl9qdv46b5t1eaqjagn6l0'),(290,2,1,'ikcqbrpirovl9qdv46b5t1eaqjagn6l0'),(292,1,1,'1ej2qrkrr9min02902rbua4gcuil6ihf'),(293,1,1,'pt4phfcqlg4k4mskflfknfihcno0ce9d'),(294,2,1,'pt4phfcqlg4k4mskflfknfihcno0ce9d'),(295,3,1,'pt4phfcqlg4k4mskflfknfihcno0ce9d');
/*!40000 ALTER TABLE `cart` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `comments`
--

DROP TABLE IF EXISTS `comments`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `comments` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(255) NOT NULL,
  `text` tinytext NOT NULL,
  `product_id` int(11) NOT NULL,
  PRIMARY KEY (`id`),
  KEY `id_prod_from_prod_tbl_idx` (`product_id`),
  CONSTRAINT `id_prod_from_prod_tbl` FOREIGN KEY (`product_id`) REFERENCES `products` (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `comments`
--

LOCK TABLES `comments` WRITE;
/*!40000 ALTER TABLE `comments` DISABLE KEYS */;
INSERT INTO `comments` VALUES (1,'Вася','Стильно, модно, молодежно!',1),(2,'Админ','У меня точно такая же!',1),(3,'Света','Не штаны, а может юбка, а мечта!',2);
/*!40000 ALTER TABLE `comments` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `orders`
--

DROP TABLE IF EXISTS `orders`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `orders` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `session_uid` varchar(255) NOT NULL,
  `name` varchar(255) NOT NULL,
  `phone` varchar(255) NOT NULL,
  `date` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `total` decimal(20,2) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=19 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `orders`
--

LOCK TABLES `orders` WRITE;
/*!40000 ALTER TABLE `orders` DISABLE KEYS */;
INSERT INTO `orders` VALUES (6,'k7609mucjhnop49dok71gqgn3fs0fks6','12','122','2021-10-06 17:02:10',146.44),(8,'bk26gn8hs0mqbsehg9j80lm2l6og7q14','122','1333','2021-11-06 10:32:57',123.22),(9,'bk26gn8hs0mqbsehg9j80lm2l6og7q14','12212','33333','2021-11-06 10:34:28',123.22),(10,'bk26gn8hs0mqbsehg9j80lm2l6og7q14','12212','33333','2021-11-06 10:34:52',123.22),(11,'fd8slch68hq6epbsc5p6anjvv2tt2ucg','12212','33311','2021-11-06 10:35:14',292.88),(12,'o3i2v9iobtgodn18bmi0mqemgpp5pcd6','qwwqw','1122','2021-11-06 10:36:17',146.44),(13,'gu4emun7ta06mfbedtviqlpua643b67v','1212','3133','2021-11-06 10:47:57',123.22),(14,'b8ripp5j25nq48u054ri5f7hksn9l6f2','1221','1212','2021-11-06 10:59:37',146.44),(15,'ikcqbrpirovl9qdv46b5t1eaqjagn6l0','2223','2223','2021-11-07 17:07:25',146.44),(16,'1ej2qrkrr9min02902rbua4gcuil6ihf','122','33','2021-11-07 17:10:05',123.22),(17,'1ej2qrkrr9min02902rbua4gcuil6ihf','','','2021-11-09 14:15:32',123.22),(18,'pt4phfcqlg4k4mskflfknfihcno0ce9d','12333','444','2021-11-10 16:12:51',246.43);
/*!40000 ALTER TABLE `orders` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `products`
--

DROP TABLE IF EXISTS `products`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `products` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `img` varchar(255) NOT NULL,
  `title` varchar(255) NOT NULL,
  `description` mediumtext NOT NULL,
  `price` decimal(10,2) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=36 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `products`
--

LOCK TABLES `products` WRITE;
/*!40000 ALTER TABLE `products` DISABLE KEYS */;
INSERT INTO `products` VALUES (1,'feature_1.png','Рубашка','Стильно, модно, молодежно!',123.22),(2,'feature_2.png','Штанцы','А может юбка',23.22),(3,'feature_3.png','Бриджи','Белый и стильные!',99.99),(4,'feature_4.png','Рубашка','В горошек, что может быть лучше!',123.44),(5,'feature_5.png','Пинджак','С карманами',223.22),(17,'1.png','shoes','nice boots',32.00),(18,'1.png','shoes','nice boots',32.00),(19,'1.png','shoes','nice boots',32.00),(20,'1.png','NEW','nice boots',77777.00),(21,'1.png','shoes','nice boots',32.00);
/*!40000 ALTER TABLE `products` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `roles`
--

DROP TABLE IF EXISTS `roles`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `roles` (
  `id` tinyint(8) unsigned NOT NULL AUTO_INCREMENT,
  `title` varchar(45) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `roles`
--

LOCK TABLES `roles` WRITE;
/*!40000 ALTER TABLE `roles` DISABLE KEYS */;
INSERT INTO `roles` VALUES (1,'admin'),(2,'client'),(3,'manager');
/*!40000 ALTER TABLE `roles` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `users`
--

DROP TABLE IF EXISTS `users`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `users` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `login` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL,
  `role` tinyint(8) unsigned NOT NULL,
  PRIMARY KEY (`id`),
  KEY `role_from_role_tbl_idx` (`role`),
  CONSTRAINT `role_from_role_tbl` FOREIGN KEY (`role`) REFERENCES `roles` (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `users`
--

LOCK TABLES `users` WRITE;
/*!40000 ALTER TABLE `users` DISABLE KEYS */;
INSERT INTO `users` VALUES (1,'admin','$2y$10$DMMzFPwxZNv4NO2ayLCsOOBIxmJLL3ro6ZLbAhRoQ5JqnHybNx8jy',1),(2,'user','$2y$10$IJa2aYy7Ca1v1aHjykjixu.m91qKnxZAwU9j/fkZNJJd5GGoCUBOG',2);
/*!40000 ALTER TABLE `users` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Dumping events for database 'store'
--

--
-- Dumping routines for database 'store'
--
/*!40103 SET TIME_ZONE=@OLD_TIME_ZONE */;

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;

-- Dump completed on 2021-11-10 19:21:29
