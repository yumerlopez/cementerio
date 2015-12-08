CREATE DATABASE  IF NOT EXISTS `heavenlinks` /*!40100 DEFAULT CHARACTER SET utf8 COLLATE utf8_spanish_ci */;
USE `heavenlinks`;
-- MySQL dump 10.13  Distrib 5.5.46, for debian-linux-gnu (i686)
--
-- Host: 127.0.0.1    Database: heavenlinks
-- ------------------------------------------------------
-- Server version	5.5.46-0ubuntu0.14.04.2

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
-- Table structure for table `emails`
--

DROP TABLE IF EXISTS `emails`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `emails` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `email_address` varchar(1000) COLLATE utf8_spanish_ci DEFAULT NULL,
  `user_id` int(11) DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `emails_user_id_fkey` (`user_id`),
  CONSTRAINT `emails_user_id_fkey` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE ON UPDATE NO ACTION
) ENGINE=InnoDB AUTO_INCREMENT=56 DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `emails`
--

LOCK TABLES `emails` WRITE;
/*!40000 ALTER TABLE `emails` DISABLE KEYS */;
INSERT INTO `emails` VALUES (54,'lopezyumer@gmail.com',1),(55,'0437185@usb.ve',1);
/*!40000 ALTER TABLE `emails` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `event_comments`
--

DROP TABLE IF EXISTS `event_comments`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `event_comments` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `comment` longtext COLLATE utf8_spanish_ci,
  `created` timestamp NULL DEFAULT NULL,
  `event_id` int(11) DEFAULT NULL,
  `user_id` int(11) DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `event_comments_user_id_fkey` (`user_id`),
  KEY `event_comments_event_id_fkey` (`event_id`),
  CONSTRAINT `event_comments_event_id_fkey` FOREIGN KEY (`event_id`) REFERENCES `events` (`id`) ON DELETE CASCADE ON UPDATE NO ACTION,
  CONSTRAINT `event_comments_user_id_fkey` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE ON UPDATE NO ACTION
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `event_comments`
--

LOCK TABLES `event_comments` WRITE;
/*!40000 ALTER TABLE `event_comments` DISABLE KEYS */;
/*!40000 ALTER TABLE `event_comments` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `events`
--

DROP TABLE IF EXISTS `events`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `events` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `user_beloved_one_id` int(11) DEFAULT NULL,
  `name` varchar(1000) COLLATE utf8_spanish_ci DEFAULT NULL,
  `description` longtext COLLATE utf8_spanish_ci,
  `start` timestamp NULL DEFAULT NULL,
  `end` timestamp NULL DEFAULT NULL,
  `created` date DEFAULT NULL,
  `modified` date DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `events_user_beloved_one_fkey` (`user_beloved_one_id`),
  CONSTRAINT `events_user_beloved_one_fkey` FOREIGN KEY (`user_beloved_one_id`) REFERENCES `user_beloved_ones` (`id`) ON DELETE CASCADE ON UPDATE NO ACTION
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `events`
--

LOCK TABLES `events` WRITE;
/*!40000 ALTER TABLE `events` DISABLE KEYS */;
INSERT INTO `events` VALUES (3,12,'Evento Prueba 01','<p>Evento Prueba 01</p>','2015-11-30 18:58:00','2015-12-30 18:58:00','2015-11-30','2015-11-30');
/*!40000 ALTER TABLE `events` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `genders`
--

DROP TABLE IF EXISTS `genders`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `genders` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(1000) COLLATE utf8_spanish_ci DEFAULT NULL,
  `description` longtext COLLATE utf8_spanish_ci,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `genders`
--

LOCK TABLES `genders` WRITE;
/*!40000 ALTER TABLE `genders` DISABLE KEYS */;
INSERT INTO `genders` VALUES (1,'Masculino','Masculino'),(2,'Femenino','Femenino');
/*!40000 ALTER TABLE `genders` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `multimedia`
--

DROP TABLE IF EXISTS `multimedia`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `multimedia` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(1000) COLLATE utf8_spanish_ci DEFAULT NULL,
  `description` longtext COLLATE utf8_spanish_ci,
  `url` varchar(255) COLLATE utf8_spanish_ci DEFAULT NULL,
  `multimedia_type_id` int(11) DEFAULT NULL,
  `multimedia_collection_id` int(11) DEFAULT NULL,
  `modified` date DEFAULT NULL,
  `created` date DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `multimedia_type_id_fkey` (`multimedia_type_id`),
  KEY `multimedia_collection_id_fkey` (`multimedia_collection_id`),
  CONSTRAINT `multimedia_collection_id_fkey` FOREIGN KEY (`multimedia_collection_id`) REFERENCES `multimedia_collections` (`id`) ON DELETE CASCADE ON UPDATE NO ACTION,
  CONSTRAINT `multimedia_type_id_fkey` FOREIGN KEY (`multimedia_type_id`) REFERENCES `multimedia_types` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION
) ENGINE=InnoDB AUTO_INCREMENT=21 DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `multimedia`
--

LOCK TABLES `multimedia` WRITE;
/*!40000 ALTER TABLE `multimedia` DISABLE KEYS */;
INSERT INTO `multimedia` VALUES (1,'Foto Prueba','<p>Foto Prueba</p>','users/1/photos/nNWmspZYniNwZu11Dm8D6KIsxBWBSZ9f.png',1,7,'2015-12-02','2015-12-02'),(6,'Photo Prueba 2','<p>Photo Prueba 2</p>','users/1/photos/aO9yYnWzj2UePebCuzfvsEzkcljoTqw4.jpg',1,7,'2015-12-02','2015-12-02'),(9,'Anillo Prueba 01','Anillo Prueba 01','users/1/photos/oGzbBpU85F0iaEXgOODkarkdMKnAK1e9.jpg',1,9,'2015-12-02','2015-12-02'),(10,'Anillo Prueba 02','Anillo Prueba 02','users/1/photos/HNlidfrjVrB55zmUnZfxqzLck8N491dR.jpg',1,9,'2015-12-02','2015-12-02'),(18,'Prueba Video 01','Prueba Video 01','users/1/OIfSOKMrIumOWdunStGW72Ffp2x4c4W0.mp4',2,8,'2015-12-02','2015-12-02'),(19,'Prueba Video 02','Prueba Video 02','users/1/MbSBWF2Faot6CXuuqbqyd5OD8lHkqElc.mp4',2,8,'2015-12-02','2015-12-02'),(20,'Prueba Video 02','Prueba Video 02','users/1/PeNMUPr4eUbQSFkjQLR4RFIZ1qks4GFU.mp4',2,8,'2015-12-02','2015-12-02');
/*!40000 ALTER TABLE `multimedia` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `multimedia_collection_types`
--

DROP TABLE IF EXISTS `multimedia_collection_types`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `multimedia_collection_types` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(1000) COLLATE utf8_spanish_ci DEFAULT NULL,
  `description` longtext COLLATE utf8_spanish_ci,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `multimedia_collection_types`
--

LOCK TABLES `multimedia_collection_types` WRITE;
/*!40000 ALTER TABLE `multimedia_collection_types` DISABLE KEYS */;
INSERT INTO `multimedia_collection_types` VALUES (1,'Photo Album','Photo Album'),(2,'Video Collection','Video Collection');
/*!40000 ALTER TABLE `multimedia_collection_types` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `multimedia_collections`
--

DROP TABLE IF EXISTS `multimedia_collections`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `multimedia_collections` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(1000) COLLATE utf8_spanish_ci DEFAULT NULL,
  `description` longtext COLLATE utf8_spanish_ci,
  `multimedia_collection_type_id` int(11) DEFAULT NULL,
  `user_beloved_one_id` int(11) DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `multimedia_collection_type_id_fkey` (`multimedia_collection_type_id`),
  KEY `multimedia_collections_user_beloved_one_fkey` (`user_beloved_one_id`),
  CONSTRAINT `multimedia_collections_user_beloved_one_fkey` FOREIGN KEY (`user_beloved_one_id`) REFERENCES `user_beloved_ones` (`id`) ON DELETE CASCADE ON UPDATE NO ACTION,
  CONSTRAINT `multimedia_collection_type_id_fkey` FOREIGN KEY (`multimedia_collection_type_id`) REFERENCES `multimedia_collection_types` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION
) ENGINE=InnoDB AUTO_INCREMENT=10 DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `multimedia_collections`
--

LOCK TABLES `multimedia_collections` WRITE;
/*!40000 ALTER TABLE `multimedia_collections` DISABLE KEYS */;
INSERT INTO `multimedia_collections` VALUES (7,'General Photo Album','General Photo Album',1,12),(8,'General Video Collection','General Video Collection',2,12),(9,'Album de Prueba','<p>Album de Prueba</p>',1,12);
/*!40000 ALTER TABLE `multimedia_collections` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `multimedia_comments`
--

DROP TABLE IF EXISTS `multimedia_comments`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `multimedia_comments` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `comment` longtext COLLATE utf8_spanish_ci,
  `created` timestamp NULL DEFAULT NULL,
  `multimedia_id` int(11) DEFAULT NULL,
  `user_id` int(11) DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `multimedia_comments_user_id_fkey` (`user_id`),
  KEY `multimedia_comments_multimedia_id_fkey` (`multimedia_id`),
  CONSTRAINT `multimedia_comments_multimedia_id_fkey` FOREIGN KEY (`multimedia_id`) REFERENCES `multimedia` (`id`) ON DELETE CASCADE ON UPDATE NO ACTION,
  CONSTRAINT `multimedia_comments_user_id_fkey` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE ON UPDATE NO ACTION
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `multimedia_comments`
--

LOCK TABLES `multimedia_comments` WRITE;
/*!40000 ALTER TABLE `multimedia_comments` DISABLE KEYS */;
INSERT INTO `multimedia_comments` VALUES (1,'Photo Prueba 2 Comentario 01','2015-11-27 19:40:20',6,1);
/*!40000 ALTER TABLE `multimedia_comments` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `multimedia_types`
--

DROP TABLE IF EXISTS `multimedia_types`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `multimedia_types` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(1000) COLLATE utf8_spanish_ci DEFAULT NULL,
  `description` longtext COLLATE utf8_spanish_ci,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `multimedia_types`
--

LOCK TABLES `multimedia_types` WRITE;
/*!40000 ALTER TABLE `multimedia_types` DISABLE KEYS */;
INSERT INTO `multimedia_types` VALUES (1,'Photo','Photo'),(2,'Video','Video');
/*!40000 ALTER TABLE `multimedia_types` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `nationalities`
--

DROP TABLE IF EXISTS `nationalities`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `nationalities` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(1000) COLLATE utf8_spanish_ci DEFAULT NULL,
  `description` longtext COLLATE utf8_spanish_ci,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `nationalities`
--

LOCK TABLES `nationalities` WRITE;
/*!40000 ALTER TABLE `nationalities` DISABLE KEYS */;
INSERT INTO `nationalities` VALUES (1,'Venezuela','Venezuela');
/*!40000 ALTER TABLE `nationalities` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `post_comments`
--

DROP TABLE IF EXISTS `post_comments`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `post_comments` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `comment` longtext COLLATE utf8_spanish_ci,
  `created` timestamp NULL DEFAULT NULL,
  `post_id` int(11) DEFAULT NULL,
  `user_id` int(11) DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `post_comments_user_id_fkey` (`user_id`),
  KEY `post_comments_post_id_fkey` (`post_id`),
  CONSTRAINT `post_comments_post_id_fkey` FOREIGN KEY (`post_id`) REFERENCES `posts` (`id`) ON DELETE CASCADE ON UPDATE NO ACTION,
  CONSTRAINT `post_comments_user_id_fkey` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE ON UPDATE NO ACTION
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `post_comments`
--

LOCK TABLES `post_comments` WRITE;
/*!40000 ALTER TABLE `post_comments` DISABLE KEYS */;
/*!40000 ALTER TABLE `post_comments` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `posts`
--

DROP TABLE IF EXISTS `posts`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `posts` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `post` longtext COLLATE utf8_spanish_ci,
  `created` timestamp NULL DEFAULT NULL,
  `user_id` int(11) DEFAULT NULL,
  `modified` date DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `posts_user_id_fkey` (`user_id`),
  CONSTRAINT `posts_user_id_fkey` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE ON UPDATE NO ACTION
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `posts`
--

LOCK TABLES `posts` WRITE;
/*!40000 ALTER TABLE `posts` DISABLE KEYS */;
/*!40000 ALTER TABLE `posts` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `roles`
--

DROP TABLE IF EXISTS `roles`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `roles` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(1000) COLLATE utf8_spanish_ci DEFAULT NULL,
  `description` longtext COLLATE utf8_spanish_ci,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `roles`
--

LOCK TABLES `roles` WRITE;
/*!40000 ALTER TABLE `roles` DISABLE KEYS */;
INSERT INTO `roles` VALUES (3,'Administrador','Administrador'),(4,'User','User');
/*!40000 ALTER TABLE `roles` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `social_network_types`
--

DROP TABLE IF EXISTS `social_network_types`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `social_network_types` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(1000) COLLATE utf8_spanish_ci DEFAULT NULL,
  `description` longtext COLLATE utf8_spanish_ci,
  `url_image` varchar(255) COLLATE utf8_spanish_ci DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=9 DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `social_network_types`
--

LOCK TABLES `social_network_types` WRITE;
/*!40000 ALTER TABLE `social_network_types` DISABLE KEYS */;
INSERT INTO `social_network_types` VALUES (1,'Instagram','Instagram','msdropdown/icons/instagram.gif'),(2,'Google+','Google+','msdropdown/icons/google-plus.png'),(3,'Flickr','Flickr','msdropdown/icons/flickr.gif'),(4,'Facebook','Facebook','msdropdown/icons/facebook.png'),(5,'LinkedIn','LinkedIn','msdropdown/icons/linkedin.gif'),(6,'Pinterest','Pinterest','msdropdown/icons/pinterest.png'),(7,'Tumblr','Tumblr','msdropdown/icons/tumblr.png'),(8,'Twitter','Twitter','msdropdown/icons/twitter.png');
/*!40000 ALTER TABLE `social_network_types` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `social_networks`
--

DROP TABLE IF EXISTS `social_networks`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `social_networks` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `social_network_account` varchar(1000) COLLATE utf8_spanish_ci DEFAULT NULL,
  `user_id` int(11) DEFAULT NULL,
  `social_network_type_id` int(11) DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `social_networks_user_id_fkey` (`user_id`),
  KEY `social_network_type_id_fkey` (`social_network_type_id`),
  CONSTRAINT `social_networks_user_id_fkey` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE ON UPDATE NO ACTION,
  CONSTRAINT `social_network_type_id_fkey` FOREIGN KEY (`social_network_type_id`) REFERENCES `social_network_types` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION
) ENGINE=InnoDB AUTO_INCREMENT=37 DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `social_networks`
--

LOCK TABLES `social_networks` WRITE;
/*!40000 ALTER TABLE `social_networks` DISABLE KEYS */;
INSERT INTO `social_networks` VALUES (35,'@yumerlopez',1,1),(36,'@yumerlopez',1,8);
/*!40000 ALTER TABLE `social_networks` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `user_beloved_one_relationships`
--

DROP TABLE IF EXISTS `user_beloved_one_relationships`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `user_beloved_one_relationships` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(1000) COLLATE utf8_spanish_ci DEFAULT NULL,
  `description` longtext COLLATE utf8_spanish_ci,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `user_beloved_one_relationships`
--

LOCK TABLES `user_beloved_one_relationships` WRITE;
/*!40000 ALTER TABLE `user_beloved_one_relationships` DISABLE KEYS */;
INSERT INTO `user_beloved_one_relationships` VALUES (1,'Grandfather','Grandfather');
/*!40000 ALTER TABLE `user_beloved_one_relationships` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `user_beloved_ones`
--

DROP TABLE IF EXISTS `user_beloved_ones`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `user_beloved_ones` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `user_id` int(11) DEFAULT NULL,
  `name` varchar(1000) COLLATE utf8_spanish_ci DEFAULT NULL,
  `last_name` varchar(1000) COLLATE utf8_spanish_ci DEFAULT NULL,
  `birth` date DEFAULT NULL,
  `death` date DEFAULT NULL,
  `user_beloved_one_relationship_id` int(11) DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `user_beloved_ones_user_id_fkey` (`user_id`),
  KEY `user_beloved_ones_user_beloved_one_relationship_id_fkey` (`user_beloved_one_relationship_id`),
  CONSTRAINT `user_beloved_ones_user_beloved_one_relationship_id_fkey` FOREIGN KEY (`user_beloved_one_relationship_id`) REFERENCES `user_beloved_one_relationships` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  CONSTRAINT `user_beloved_ones_user_id_fkey` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE ON UPDATE NO ACTION
) ENGINE=InnoDB AUTO_INCREMENT=13 DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `user_beloved_ones`
--

LOCK TABLES `user_beloved_ones` WRITE;
/*!40000 ALTER TABLE `user_beloved_ones` DISABLE KEYS */;
INSERT INTO `user_beloved_ones` VALUES (12,1,'Mario','López','1996-11-18','2015-11-18',1);
/*!40000 ALTER TABLE `user_beloved_ones` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `user_phones`
--

DROP TABLE IF EXISTS `user_phones`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `user_phones` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `number` varchar(1000) COLLATE utf8_spanish_ci DEFAULT NULL,
  `user_id` int(11) DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `user_id_fkey` (`user_id`),
  CONSTRAINT `user_id_fkey` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE ON UPDATE NO ACTION
) ENGINE=InnoDB AUTO_INCREMENT=93 DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `user_phones`
--

LOCK TABLES `user_phones` WRITE;
/*!40000 ALTER TABLE `user_phones` DISABLE KEYS */;
INSERT INTO `user_phones` VALUES (90,'+584143936537',1),(91,'+12015555558',1),(92,'+584242160856',5);
/*!40000 ALTER TABLE `user_phones` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `user_statuses`
--

DROP TABLE IF EXISTS `user_statuses`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `user_statuses` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(1000) COLLATE utf8_spanish_ci DEFAULT NULL,
  `description` longtext COLLATE utf8_spanish_ci,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `user_statuses`
--

LOCK TABLES `user_statuses` WRITE;
/*!40000 ALTER TABLE `user_statuses` DISABLE KEYS */;
INSERT INTO `user_statuses` VALUES (1,'Activo','Activo');
/*!40000 ALTER TABLE `user_statuses` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `users`
--

DROP TABLE IF EXISTS `users`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `users` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(1000) COLLATE utf8_spanish_ci DEFAULT NULL,
  `last_name` varchar(1000) COLLATE utf8_spanish_ci DEFAULT NULL,
  `username` varchar(1000) COLLATE utf8_spanish_ci DEFAULT NULL,
  `password` varchar(1000) COLLATE utf8_spanish_ci DEFAULT NULL,
  `gender_id` int(11) DEFAULT NULL,
  `nationality_id` int(11) DEFAULT NULL,
  `user_status_id` int(11) DEFAULT NULL,
  `role_id` int(11) DEFAULT NULL,
  `created` date DEFAULT NULL,
  `modified` date DEFAULT NULL,
  `birth` date DEFAULT NULL,
  `url_image` varchar(255) COLLATE utf8_spanish_ci DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `gender_id_fkey` (`gender_id`),
  KEY `nationality_id_fkey` (`nationality_id`),
  KEY `user_status_id_fkey` (`user_status_id`),
  KEY `role_id_fkey` (`role_id`),
  CONSTRAINT `gender_id_fkey` FOREIGN KEY (`gender_id`) REFERENCES `genders` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  CONSTRAINT `nationality_id_fkey` FOREIGN KEY (`nationality_id`) REFERENCES `nationalities` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  CONSTRAINT `role_id_fkey` FOREIGN KEY (`role_id`) REFERENCES `roles` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  CONSTRAINT `user_status_id_fkey` FOREIGN KEY (`user_status_id`) REFERENCES `user_statuses` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION
) ENGINE=InnoDB AUTO_INCREMENT=6 DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `users`
--

LOCK TABLES `users` WRITE;
/*!40000 ALTER TABLE `users` DISABLE KEYS */;
INSERT INTO `users` VALUES (1,'Yumer','Lopez','admin@heavenlinks.com','$2a$10$X/oAkkv.rN..lSBwx3L3O.6a.hlUtMT4RxUZcBmVM2yfjzX58F.j2',1,1,1,3,'2015-10-23','2015-11-12','2015-11-02','users/1/profile/profile.jpeg'),(4,'Yumer','López','stratovarius48@gmail.com','$2a$10$G85ms5FqsEAj.PNm8sSk1eE0N7tN08jOKqOtzCFJqYyi4r2w9fa1O',1,1,1,4,'2015-10-29','2015-12-01',NULL,'users/4/profile/profile.jpeg'),(5,'Carolina','De Sousa','carolcat1786@gmail.com','$2a$10$ELm.ql.YGlLPWvT05fjvD.G0AAHnfcXgOS8pr/KYTcpwKL74vfSua',2,1,1,4,'2015-12-01','2015-12-01','1987-01-17','users/5/profile/profile.jpeg');
/*!40000 ALTER TABLE `users` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `users_users`
--

DROP TABLE IF EXISTS `users_users`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `users_users` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `user_id` int(11) DEFAULT NULL,
  `friend_id` int(11) DEFAULT NULL,
  `users_users_status_id` int(11) DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `users_users_user_id_fkey` (`user_id`),
  KEY `users_users_friend_id_fkey` (`friend_id`),
  KEY `users_users_status_id_fkey` (`users_users_status_id`),
  CONSTRAINT `users_users_friend_id_fkey` FOREIGN KEY (`friend_id`) REFERENCES `users` (`id`) ON DELETE CASCADE ON UPDATE NO ACTION,
  CONSTRAINT `users_users_status_id_fkey` FOREIGN KEY (`users_users_status_id`) REFERENCES `users_users_statuses` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  CONSTRAINT `users_users_user_id_fkey` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE ON UPDATE NO ACTION
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `users_users`
--

LOCK TABLES `users_users` WRITE;
/*!40000 ALTER TABLE `users_users` DISABLE KEYS */;
INSERT INTO `users_users` VALUES (1,5,1,3);
/*!40000 ALTER TABLE `users_users` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `users_users_statuses`
--

DROP TABLE IF EXISTS `users_users_statuses`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `users_users_statuses` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(1000) COLLATE utf8_spanish_ci DEFAULT NULL,
  `description` longtext COLLATE utf8_spanish_ci,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `users_users_statuses`
--

LOCK TABLES `users_users_statuses` WRITE;
/*!40000 ALTER TABLE `users_users_statuses` DISABLE KEYS */;
INSERT INTO `users_users_statuses` VALUES (1,'Aprobado','Aprobado'),(2,'Bloqueado','Bloqueado'),(3,'Por Aprobar','Por Aprobar');
/*!40000 ALTER TABLE `users_users_statuses` ENABLE KEYS */;
UNLOCK TABLES;
/*!40103 SET TIME_ZONE=@OLD_TIME_ZONE */;

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;

-- Dump completed on 2015-12-08 16:21:32
