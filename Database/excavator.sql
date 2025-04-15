-- --------------------------------------------------------
-- Host:                         127.0.0.1
-- Server version:               8.0.30 - MySQL Community Server - GPL
-- Server OS:                    Win64
-- HeidiSQL Version:             12.1.0.6537
-- --------------------------------------------------------

/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET NAMES utf8 */;
/*!50503 SET NAMES utf8mb4 */;
/*!40103 SET @OLD_TIME_ZONE=@@TIME_ZONE */;
/*!40103 SET TIME_ZONE='+00:00' */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;
/*!40111 SET @OLD_SQL_NOTES=@@SQL_NOTES, SQL_NOTES=0 */;


-- Dumping database structure for excavator
CREATE DATABASE IF NOT EXISTS `excavator` /*!40100 DEFAULT CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci */ /*!80016 DEFAULT ENCRYPTION='N' */;
USE `excavator`;

-- Dumping structure for table excavator.tbl_user
CREATE TABLE IF NOT EXISTS `tbl_user` (
  `id_pengguna` int NOT NULL AUTO_INCREMENT,
  `nama_awal` varchar(50) CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci NOT NULL DEFAULT '',
  `nama_akhir` varchar(25) CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci NOT NULL DEFAULT '',
  `email` varchar(50) CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci NOT NULL DEFAULT '',
  `password` varchar(50) NOT NULL DEFAULT '',
  `profile_path` varchar(50) CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci NOT NULL DEFAULT 'default_profile.png',
  `trn_date` datetime NOT NULL,
  `reset_token` varchar(255) DEFAULT NULL,
  `token_expiry` datetime DEFAULT NULL,
  PRIMARY KEY (`id_pengguna`)
) ENGINE=InnoDB AUTO_INCREMENT=31 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

-- Dumping data for table excavator.tbl_user: ~2 rows (approximately)
INSERT INTO `tbl_user` (`id_pengguna`, `nama_awal`, `nama_akhir`, `email`, `password`, `profile_path`, `trn_date`, `reset_token`, `token_expiry`) VALUES
	(4, 'Ilham', 'Fajriansyah', 'ilhamfaj123@gmail.com', '81b073de9370ea873f548e31b8adc081', 'default.png', '2025-04-01 22:56:05', '274f1622b9d6fa67db8b0680a972620b839d1ec84f2377a3217a0069db87d587ca0eceb0ecc7f5d39cb18534056b855b6614', '2025-04-09 13:42:54'),
	(30, 'Ilham', 'Fajriansyah', 'ilham@gmail.com', '827ccb0eea8a706c4c34a16891f84e7b', 'default_profile.png', '2025-04-15 00:16:47', NULL, NULL);

/*!40103 SET TIME_ZONE=IFNULL(@OLD_TIME_ZONE, 'system') */;
/*!40101 SET SQL_MODE=IFNULL(@OLD_SQL_MODE, '') */;
/*!40014 SET FOREIGN_KEY_CHECKS=IFNULL(@OLD_FOREIGN_KEY_CHECKS, 1) */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40111 SET SQL_NOTES=IFNULL(@OLD_SQL_NOTES, 1) */;
