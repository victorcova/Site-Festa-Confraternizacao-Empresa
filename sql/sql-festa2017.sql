/*
SQLyog Ultimate v12.09 (64 bit)
MySQL - 5.7.14 : Database - confra2018
*********************************************************************
*/


/*!40101 SET NAMES utf8 */;

/*!40101 SET SQL_MODE=''*/;

/*!40014 SET @OLD_UNIQUE_CHECKS=@@UNIQUE_CHECKS, UNIQUE_CHECKS=0 */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;
/*!40111 SET @OLD_SQL_NOTES=@@SQL_NOTES, SQL_NOTES=0 */;
CREATE DATABASE /*!32312 IF NOT EXISTS*/`confra2018` /*!40100 DEFAULT CHARACTER SET latin1 */;

USE `confra2018`;

/*Table structure for table `cadastro` */

DROP TABLE IF EXISTS `cadastro`;

CREATE TABLE `cadastro` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `coop_func` int(11) NOT NULL,
  `cpf_func` varchar(11) NOT NULL,
  `nome_func` varchar(100) NOT NULL,
  `dt_nasc_func` varchar(10) NOT NULL,
  `mail_func` varchar(150) NOT NULL,
  `camisa_func` varchar(5) NOT NULL,
  `cpf_conv` varchar(11) NOT NULL,
  `nome_conv` varchar(100) NOT NULL,
  `dt_nasc_conv` varchar(10) NOT NULL,
  `camiseta_conv` varchar(5) NOT NULL,
  `data_cadastro` varchar(20) NOT NULL,
  `ativo` int(11) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=2 DEFAULT CHARSET=latin1;

/*Table structure for table `colaboradores` */

DROP TABLE IF EXISTS `colaboradores`;

CREATE TABLE `colaboradores` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `nome_func` varchar(100) NOT NULL,
  `cpf_func` varchar(11) NOT NULL,
  `dt_nasc_func` varchar(10) NOT NULL,
  `mail_func` varchar(100) NOT NULL,
  `coop_func` int(10) NOT NULL,
  `ativo` int(11) NOT NULL DEFAULT '1',
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=876 DEFAULT CHARSET=latin1;

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;
