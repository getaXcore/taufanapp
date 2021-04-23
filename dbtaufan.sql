-- Adminer 4.2.5 MySQL dump

SET NAMES utf8;
SET time_zone = '+00:00';
SET foreign_key_checks = 0;
SET sql_mode = 'NO_AUTO_VALUE_ON_ZERO';

SET NAMES utf8mb4;

CREATE DATABASE `dbtaufan` /*!40100 DEFAULT CHARACTER SET utf8mb4 */;
USE `dbtaufan`;

DROP TABLE IF EXISTS `master_session`;
CREATE TABLE `master_session` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `userid` varchar(50) DEFAULT NULL,
  `lastlogin` datetime DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;


DROP TABLE IF EXISTS `master_user`;
CREATE TABLE `master_user` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `userid` varchar(50) DEFAULT NULL,
  `password` varchar(50) DEFAULT NULL,
  `level` char(1) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

INSERT INTO `master_user` (`id`, `userid`, `password`, `level`) VALUES
(1,	'admin01',	'e10adc3949ba59abbe56e057f20f883e',	'0'),
(2,	'taufan',	'e10adc3949ba59abbe56e057f20f883e',	'1'),
(3,	'getaufan',	'e10adc3949ba59abbe56e057f20f883e',	'S');

-- 2021-04-23 22:25:08
