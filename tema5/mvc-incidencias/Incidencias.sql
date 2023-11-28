-- --------------------------------------------------------
-- Host:                         127.0.0.1
-- Versión del servidor:         11.1.2-MariaDB-1:11.1.2+maria~ubu2204 - mariadb.org binary distribution
-- SO del servidor:              debian-linux-gnu
-- HeidiSQL Versión:             12.5.0.6677
-- --------------------------------------------------------

/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET NAMES utf8 */;
/*!50503 SET NAMES utf8mb4 */;
/*!40103 SET @OLD_TIME_ZONE=@@TIME_ZONE */;
/*!40103 SET TIME_ZONE='+00:00' */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;
/*!40111 SET @OLD_SQL_NOTES=@@SQL_NOTES, SQL_NOTES=0 */;


-- Volcando estructura de base de datos para Incidencias
CREATE DATABASE IF NOT EXISTS `Incidencias` /*!40100 DEFAULT CHARACTER SET utf8mb4 COLLATE utf8mb4_spanish_ci */;
USE `Incidencias`;

-- Volcando estructura para tabla Incidencias.Clientes
CREATE TABLE IF NOT EXISTS `Clientes` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `nombre` varchar(50) DEFAULT NULL,
  `direccion` varchar(50) DEFAULT NULL,
  `localidad` varchar(50) DEFAULT NULL,
  `email` varchar(50) DEFAULT NULL,
  `movil` varchar(50) DEFAULT NULL,
  `dni` varchar(50) DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `id` (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=6 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_spanish_ci;

-- Volcando datos para la tabla Incidencias.Clientes: ~5 rows (aproximadamente)
INSERT INTO `Clientes` (`id`, `nombre`, `direccion`, `localidad`, `email`, `movil`, `dni`) VALUES
	(1, 'jhony', 'rio miño', 'la mojonera', 'jhony@gmail.com', '633556565', '53333433z'),
	(2, 'alfredo', 'san francisco', 'garrucha', 'alfred@gmail.com', '655454545', '53333333z'),
	(3, 'pepe', 'san antonio', 'cuevas', 'pepe@gmail.com', '633598565', '53367343z'),
	(4, 'erika', 'rio guadalquivir', 'cuevas', 'erika@gmail.com', '655454545', '53983333z'),
	(5, 'fran', 'guadalinfo', 'roquetas de mar', 'fran@gmail.com', '655454545', '53985233z');

-- Volcando estructura para tabla Incidencias.Incidencias
CREATE TABLE IF NOT EXISTS `Incidencias` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `latitud` double DEFAULT NULL,
  `longitud` double DEFAULT NULL,
  `ciudad` varchar(50) DEFAULT NULL,
  `direccion` varchar(50) DEFAULT NULL,
  `solucion` varchar(50) DEFAULT 'No se conoce',
  `estado` varchar(50) DEFAULT NULL,
  `idCliente` int(11) DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `id` (`id`),
  KEY `idUsuario` (`idCliente`) USING BTREE,
  CONSTRAINT `incidencias-cliente` FOREIGN KEY (`idCliente`) REFERENCES `Clientes` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION
) ENGINE=InnoDB AUTO_INCREMENT=6 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_spanish_ci;

-- Volcando datos para la tabla Incidencias.Incidencias: ~4 rows (aproximadamente)
INSERT INTO `Incidencias` (`id`, `latitud`, `longitud`, `ciudad`, `direccion`, `solucion`, `estado`, `idCliente`) VALUES
	(2, 0, 0, 'La Mojonera', 'Rio Miño', 'hola', 'Finalizado', 2),
	(3, 0, 0, 'garrucha', 'san francisco', 'realizado mantenimiento de material', 'pendiente', 1),
	(4, 22344, 43435, 'mojacar', 'san antonio', 'se ha realizado una instalacion', 'Apuntado', 2),
	(5, 0, 0, 'cuevas', 'guadalinfo', 'realizado mantenimiento de material', 'Comprado', 5);

/*!40103 SET TIME_ZONE=IFNULL(@OLD_TIME_ZONE, 'system') */;
/*!40101 SET SQL_MODE=IFNULL(@OLD_SQL_MODE, '') */;
/*!40014 SET FOREIGN_KEY_CHECKS=IFNULL(@OLD_FOREIGN_KEY_CHECKS, 1) */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40111 SET SQL_NOTES=IFNULL(@OLD_SQL_NOTES, 1) */;
