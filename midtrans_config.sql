/*
SQLyog Ultimate v12.5.1 (64 bit)
MySQL - 10.4.22-MariaDB : Database - db_meysv2
*********************************************************************
*/

/*!40101 SET NAMES utf8 */;

/*!40101 SET SQL_MODE=''*/;

/*!40014 SET @OLD_UNIQUE_CHECKS=@@UNIQUE_CHECKS, UNIQUE_CHECKS=0 */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;
/*!40111 SET @OLD_SQL_NOTES=@@SQL_NOTES, SQL_NOTES=0 */;

/*Table structure for table `m_midtrans_config` */

DROP TABLE IF EXISTS `m_midtrans_config`;

CREATE TABLE `m_midtrans_config` (
  `key` varchar(255) NOT NULL,
  `value` text DEFAULT NULL,
  `created_at` int(11) NOT NULL,
  `modified_at` int(11) NOT NULL,
  `is_deleted` tinyint(1) NOT NULL DEFAULT 0,
  PRIMARY KEY (`key`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

/*Data for the table `m_midtrans_config` */

insert  into `m_midtrans_config`(`key`,`value`,`created_at`,`modified_at`,`is_deleted`) values 
('_client_key_production',NULL,0,0,0),
('_client_key_sandbox','SB-Mid-client-LAEwpi34CdNrwLgt',0,0,0),
('_midtrans_prod','false',0,0,0),
('_server_key_production',NULL,0,0,0),
('_server_key_sandbox','SB-Mid-server-qC8YfWnkcF_fjPrZmuNEwb8P',0,0,0),
('_user_testflight','USER-ADM-01,USR-MHNDR-b6331',0,0,0);

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;
