-- --------------------------------------------------------
-- Host:                         127.0.0.1
-- Versión del servidor:         10.4.14-MariaDB - mariadb.org binary distribution
-- SO del servidor:              Win64
-- HeidiSQL Versión:             11.0.0.5919
-- --------------------------------------------------------

/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET NAMES utf8 */;
/*!50503 SET NAMES utf8mb4 */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;


-- Volcando estructura de base de datos para proy1
CREATE DATABASE IF NOT EXISTS `proy1` /*!40100 DEFAULT CHARACTER SET utf8mb4 */;
USE `proy1`;

-- Volcando estructura para tabla proy1.city
CREATE TABLE IF NOT EXISTS `city` (
  `idcity` int(11) NOT NULL,
  `name` varchar(45) NOT NULL,
  `idweather` int(11) NOT NULL,
  `size` varchar(45) NOT NULL,
  `nativelanguage` varchar(45) NOT NULL,
  `continent` varchar(45) NOT NULL,
  `nativelanguage_difficulty` varchar(45) NOT NULL,
  `cost_of_living` varchar(45) NOT NULL,
  `role` varchar(45) NOT NULL,
  `img` varchar(45) DEFAULT NULL,
  `country` varchar(45) NOT NULL,
  `video` varchar(200) DEFAULT NULL,
  PRIMARY KEY (`idcity`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- La exportación de datos fue deseleccionada.

-- Volcando estructura para tabla proy1.travel
CREATE TABLE IF NOT EXISTS `travel` (
  `id_User` int(11) NOT NULL,
  `id_City` int(11) NOT NULL,
  UNIQUE KEY `User_Id` (`id_User`),
  UNIQUE KEY `City_id` (`id_City`),
  CONSTRAINT `travel_ibfk_1` FOREIGN KEY (`id_City`) REFERENCES `city` (`idcity`),
  CONSTRAINT `travel_ibfk_2` FOREIGN KEY (`id_User`) REFERENCES `user` (`iduser`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- La exportación de datos fue deseleccionada.

-- Volcando estructura para tabla proy1.user
CREATE TABLE IF NOT EXISTS `user` (
  `iduser` int(11) NOT NULL,
  `role` varchar(45) NOT NULL,
  `nickname` varchar(45) NOT NULL,
  `pass` varchar(45) NOT NULL,
  `email` varchar(45) NOT NULL,
  `number` varchar(45) DEFAULT NULL,
  `favourite_weather` varchar(45) NOT NULL,
  `main_language` varchar(45) NOT NULL,
  `english` tinyint(1) NOT NULL,
  `budget` int(11) NOT NULL,
  `continent` varchar(45) NOT NULL,
  `country` varchar(45) NOT NULL,
  PRIMARY KEY (`iduser`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- La exportación de datos fue deseleccionada.

-- Volcando estructura para tabla proy1.weather
CREATE TABLE IF NOT EXISTS `weather` (
  `idweather` int(11) NOT NULL,
  `weather_type` varchar(45) NOT NULL,
  PRIMARY KEY (`idweather`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- La exportación de datos fue deseleccionada.

/*!40101 SET SQL_MODE=IFNULL(@OLD_SQL_MODE, '') */;
/*!40014 SET FOREIGN_KEY_CHECKS=IF(@OLD_FOREIGN_KEY_CHECKS IS NULL, 1, @OLD_FOREIGN_KEY_CHECKS) */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
