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
CREATE DATABASE IF NOT EXISTS `block` /*!40100 DEFAULT CHARACTER SET utf8mb4 COLLATE utf8mb4_vietnamese_ci */;
USE `block`;

-- Dumping structure for table block.guildplayers
CREATE TABLE IF NOT EXISTS `guildplayers` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `Guild` varchar(50) DEFAULT NULL,
  `Address` text NOT NULL,
  `AvatarAddress` text NOT NULL,
  `Rank` int(11) NOT NULL DEFAULT '0',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=latin1;

-- Dumping data for table block.guildplayers: ~4 rows (approximately)
/*!40000 ALTER TABLE `guildplayers` DISABLE KEYS */;
INSERT INTO `guildplayers` (`id`, `Guild`, `Address`, `AvatarAddress`, `Rank`) VALUES
	(1, 'Guild 1', '123123123213123123', '12312312312312312', 0),
	(2, NULL, 'ádasdasdasdas', 'ádasdasdasdasddcdcc', 0),
	(3, NULL, 'ádasdasf', 'ádasdasfasfada', 0),
	(4, 'GUF', 'adafased', 'adasfas', 0);
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
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=latin1;

-- Dumping data for table block.guilds: ~3 rows (approximately)
/*!40000 ALTER TABLE `guilds` DISABLE KEYS */;
INSERT INTO `guilds` (`id`, `Tag`, `Name`, `Desc`, `MinLevel`, `Type`, `Link`, `Language`) VALUES
	(2, 'GUF', 'Guild 1', '123123123123123', 0, 0, '1111', 'Vietnamese'),
	(3, 'aaa', 'aaaaaaaa', 'aaaaaaaa', 0, 0, 'aaaaaaa', 'aaaaaa'),
	(4, 'fff', 'ádasdasdadasd', 'ffffff', 0, 0, 'fffqwrfd1q2dfqd', 'âsasas');
/*!40000 ALTER TABLE `guilds` ENABLE KEYS */;

/*!40101 SET SQL_MODE=IFNULL(@OLD_SQL_MODE, '') */;
/*!40014 SET FOREIGN_KEY_CHECKS=IFNULL(@OLD_FOREIGN_KEY_CHECKS, 1) */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40111 SET SQL_NOTES=IFNULL(@OLD_SQL_NOTES, 1) */;
