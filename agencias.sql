-- MySQL dump 10.16  Distrib 10.2.14-MariaDB, for Linux (x86_64)
--
-- Host: localhost    Database: agencias
-- ------------------------------------------------------
-- Server version	10.2.14-MariaDB

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
-- Table structure for table `Agencia`
--

DROP TABLE IF EXISTS `Agencia`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `Agencia` (
  `nombreAgencia` varchar(20) NOT NULL,
  `pais` varchar(20) NOT NULL,
  PRIMARY KEY (`nombreAgencia`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Table structure for table `Agente`
--

DROP TABLE IF EXISTS `Agente`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `Agente` (
  `nombreAgencia` varchar(20) NOT NULL,
  `idAgente` varchar(10) NOT NULL,
  `nombreClave` varchar(100) NOT NULL,
  `hash` varchar(50) NOT NULL,
  PRIMARY KEY (`nombreAgencia`,`idAgente`),
  CONSTRAINT `Agente_ibfk_1` FOREIGN KEY (`nombreAgencia`) REFERENCES `Agencia` (`nombreAgencia`) ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Table structure for table `Agente_p_Sede`
--

DROP TABLE IF EXISTS `Agente_p_Sede`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `Agente_p_Sede` (
  `idAgente` varchar(10) NOT NULL,
  `nombreAgencia` varchar(20) NOT NULL,
  `nombreAgenciaS` varchar(20) NOT NULL,
  `nombreSede` varchar(30) DEFAULT NULL,
  `lidera` tinyint(1) NOT NULL,
  PRIMARY KEY (`idAgente`,`nombreAgencia`),
  KEY `nombreAgencia` (`nombreAgencia`,`idAgente`),
  KEY `nombreAgenciaS` (`nombreAgenciaS`,`nombreSede`),
  CONSTRAINT `Agente_p_Sede_ibfk_1` FOREIGN KEY (`nombreAgencia`, `idAgente`) REFERENCES `Agente` (`nombreAgencia`, `idAgente`) ON DELETE CASCADE ON UPDATE CASCADE,
  CONSTRAINT `Agente_p_Sede_ibfk_2` FOREIGN KEY (`nombreAgenciaS`, `nombreSede`) REFERENCES `Sede` (`nombreAgencia`, `nombreSede`) ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Table structure for table `Agente_t_Mision`
--

DROP TABLE IF EXISTS `Agente_t_Mision`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `Agente_t_Mision` (
  `idAgente` varchar(10) NOT NULL,
  `nombreAgencia` varchar(20) NOT NULL,
  `codigoMision` varchar(20) DEFAULT NULL,
  PRIMARY KEY (`idAgente`,`nombreAgencia`),
  KEY `nombreAgencia` (`nombreAgencia`,`idAgente`),
  KEY `codigoMision` (`codigoMision`),
  CONSTRAINT `Agente_t_Mision_ibfk_1` FOREIGN KEY (`nombreAgencia`, `idAgente`) REFERENCES `Agente` (`nombreAgencia`, `idAgente`) ON DELETE CASCADE ON UPDATE CASCADE,
  CONSTRAINT `Agente_t_Mision_ibfk_2` FOREIGN KEY (`codigoMision`) REFERENCES `Mision` (`codigoMision`) ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Table structure for table `Agente_tipo`
--

DROP TABLE IF EXISTS `Agente_tipo`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `Agente_tipo` (
  `idAgente` varchar(10) NOT NULL,
  `nombreAgencia` varchar(20) NOT NULL,
  `tipo` varchar(3) NOT NULL,
  PRIMARY KEY (`idAgente`,`nombreAgencia`,`tipo`),
  KEY `nombreAgencia` (`nombreAgencia`,`idAgente`),
  CONSTRAINT `Agente_tipo_ibfk_1` FOREIGN KEY (`nombreAgencia`, `idAgente`) REFERENCES `Agente` (`nombreAgencia`, `idAgente`) ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Table structure for table `Mision`
--

DROP TABLE IF EXISTS `Mision`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `Mision` (
  `codigoMision` varchar(20) NOT NULL,
  `descripcion` varchar(240) NOT NULL,
  PRIMARY KEY (`codigoMision`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Table structure for table `Sede`
--

DROP TABLE IF EXISTS `Sede`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `Sede` (
  `nombreAgencia` varchar(20) NOT NULL,
  `nombreSede` varchar(30) NOT NULL,
  PRIMARY KEY (`nombreAgencia`,`nombreSede`),
  CONSTRAINT `Sede_ibfk_1` FOREIGN KEY (`nombreAgencia`) REFERENCES `Agencia` (`nombreAgencia`) ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Table structure for table `Sede_dir`
--

DROP TABLE IF EXISTS `Sede_dir`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `Sede_dir` (
  `nombreAgencia` varchar(20) NOT NULL,
  `nombreSede` varchar(30) NOT NULL,
  `direccion` varchar(100) NOT NULL,
  PRIMARY KEY (`nombreAgencia`,`nombreSede`,`direccion`),
  CONSTRAINT `Sede_dir_ibfk_1` FOREIGN KEY (`nombreAgencia`, `nombreSede`) REFERENCES `Sede` (`nombreAgencia`, `nombreSede`) ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Table structure for table `Sede_tel`
--

DROP TABLE IF EXISTS `Sede_tel`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `Sede_tel` (
  `nombreAgencia` varchar(20) NOT NULL,
  `nombreSede` varchar(30) NOT NULL,
  `telefono` varchar(20) NOT NULL,
  PRIMARY KEY (`nombreAgencia`,`nombreSede`,`telefono`),
  CONSTRAINT `Sede_tel_ibfk_1` FOREIGN KEY (`nombreAgencia`, `nombreSede`) REFERENCES `Sede` (`nombreAgencia`, `nombreSede`) ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;
/*!40103 SET TIME_ZONE=@OLD_TIME_ZONE */;

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;

-- Dump completed on 2018-06-01 10:39:00
