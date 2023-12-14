-- MariaDB dump 10.19-11.1.2-MariaDB, for debian-linux-gnu (x86_64)
--
-- Host: localhost    Database: AmigoInvisible
-- ------------------------------------------------------
-- Server version	11.1.2-MariaDB-1:11.1.2+maria~ubu2204

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
-- Table structure for table `AmigoInvisible_Participante`
--

DROP TABLE IF EXISTS `AmigoInvisible_Participante`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `AmigoInvisible_Participante` (
  `id_amigoinvisible` int(11) NOT NULL,
  `id_participante` int(11) NOT NULL,
  `estado` mediumtext DEFAULT NULL,
  PRIMARY KEY (`id_amigoinvisible`,`id_participante`),
  KEY `id_participante_idx` (`id_participante`),
  CONSTRAINT `id_amigoinvisible` FOREIGN KEY (`id_amigoinvisible`) REFERENCES `Amigoinvisible` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  CONSTRAINT `id_participante` FOREIGN KEY (`id_participante`) REFERENCES `Participante` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb3 COLLATE=utf8mb3_spanish_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `AmigoInvisible_Participante`
--

LOCK TABLES `AmigoInvisible_Participante` WRITE;
/*!40000 ALTER TABLE `AmigoInvisible_Participante` DISABLE KEYS */;
INSERT INTO `AmigoInvisible_Participante` VALUES
(4,1,NULL),
(4,2,NULL);
/*!40000 ALTER TABLE `AmigoInvisible_Participante` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `Amigoinvisible`
--

DROP TABLE IF EXISTS `Amigoinvisible`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `Amigoinvisible` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `nombre` varchar(45) DEFAULT NULL,
  `estado` varchar(45) DEFAULT NULL,
  `max_dinero` double DEFAULT NULL,
  `fecha_tope` date DEFAULT NULL,
  `lugar` varchar(45) DEFAULT NULL,
  `observaciones` mediumtext DEFAULT NULL,
  `emoji` varchar(100) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=7 DEFAULT CHARSET=utf8mb3 COLLATE=utf8mb3_spanish_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `Amigoinvisible`
--

LOCK TABLES `Amigoinvisible` WRITE;
/*!40000 ALTER TABLE `Amigoinvisible` DISABLE KEYS */;
INSERT INTO `Amigoinvisible` VALUES
(1,'Jose','Comprado',200,'2024-12-15','AQUI','HHH','.)'),
(2,'Manuel','activo',300,'2024-12-18','ahi','aaaa',':('),
(4,'RAFA','Comprado',250,'2023-12-21','Mojacar','Bueno',NULL),
(5,'Jaime','activo',233,'2023-12-31','Mojacar','Bueno',NULL);
/*!40000 ALTER TABLE `Amigoinvisible` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `Participante`
--

DROP TABLE IF EXISTS `Participante`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `Participante` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `email` varchar(45) DEFAULT NULL,
  `nombre` varchar(45) DEFAULT NULL,
  `telefono` int(11) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8mb3 COLLATE=utf8mb3_spanish_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `Participante`
--

LOCK TABLES `Participante` WRITE;
/*!40000 ALTER TABLE `Participante` DISABLE KEYS */;
INSERT INTO `Participante` VALUES
(1,'email21','Rafa',2222),
(2,'email3','Jose',2221);
/*!40000 ALTER TABLE `Participante` ENABLE KEYS */;
UNLOCK TABLES;
/*!40103 SET TIME_ZONE=@OLD_TIME_ZONE */;

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;

-- Dump completed on 2023-12-12 20:07:49
