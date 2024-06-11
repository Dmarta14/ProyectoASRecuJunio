-- Adminer 4.8.1 MySQL 8.4.0 dump

SET NAMES utf8;
SET time_zone = '+00:00';
SET foreign_key_checks = 0;
SET sql_mode = 'NO_AUTO_VALUE_ON_ZERO';

SET NAMES utf8mb4;

DROP TABLE IF EXISTS `comandas`;
CREATE TABLE `comandas` (
  `id` int NOT NULL AUTO_INCREMENT,
  `primerplato` varchar(255) NOT NULL,
  `segundoplato` varchar(255) NOT NULL,
  `nmesa` int NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;


-- 2024-06-11 11:54:36