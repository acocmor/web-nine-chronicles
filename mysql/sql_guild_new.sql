-- --------------------------------------------------------
-- Host:                         127.0.0.1
-- Server version:               5.7.33 - MySQL Community Server (GPL)
-- Server OS:                    Win64
-- HeidiSQL Version:             11.2.0.6213
-- --------------------------------------------------------

/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET NAMES utf8 */;
/*!50503 SET NAMES utf8mb4 */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;
/*!40111 SET @OLD_SQL_NOTES=@@SQL_NOTES, SQL_NOTES=0 */;


-- Dumping database structure for block
CREATE DATABASE IF NOT EXISTS `block` /*!40100 DEFAULT CHARACTER SET latin1 */;
USE `block`;

-- Dumping structure for table block.guildplayers
CREATE TABLE IF NOT EXISTS `guildplayers` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `GuildId` int(11) DEFAULT NULL,
  `Address` text NOT NULL,
  `AvatarAddress` text NOT NULL,
  `Rank` int(11) NOT NULL DEFAULT '0',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- Dumping data for table block.guildplayers: ~0 rows (approximately)
/*!40000 ALTER TABLE `guildplayers` DISABLE KEYS */;
/*!40000 ALTER TABLE `guildplayers` ENABLE KEYS */;

-- Dumping structure for table block.guilds
CREATE TABLE IF NOT EXISTS `guilds` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `Tag` varchar(3) DEFAULT NULL,
  `Name` varchar(50) DEFAULT NULL,
  `Desc` text,
  `MinLevel` int(11) DEFAULT '0',
  `Type` tinyint(4) DEFAULT NULL,
  `Link` text,
  `Language` text,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- Dumping data for table block.guilds: ~0 rows (approximately)
/*!40000 ALTER TABLE `guilds` DISABLE KEYS */;
/*!40000 ALTER TABLE `guilds` ENABLE KEYS */;

-- Dumping structure for table block.server
CREATE TABLE IF NOT EXISTS `server` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `diceroll` int(11) DEFAULT '1',
  `TrialPremium` int(11) DEFAULT '3711461',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=latin1;

-- Dumping data for table block.server: ~1 rows (approximately)
/*!40000 ALTER TABLE `server` DISABLE KEYS */;
INSERT INTO `server` (`id`, `diceroll`, `TrialPremium`) VALUES
	(1, 1, 3711462);
/*!40000 ALTER TABLE `server` ENABLE KEYS */;

/*!40101 SET SQL_MODE=IFNULL(@OLD_SQL_MODE, '') */;
/*!40014 SET FOREIGN_KEY_CHECKS=IFNULL(@OLD_FOREIGN_KEY_CHECKS, 1) */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40111 SET SQL_NOTES=IFNULL(@OLD_SQL_NOTES, 1) */;
