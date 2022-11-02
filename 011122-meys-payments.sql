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

/*Table structure for table `m_payments_batch` */

DROP TABLE IF EXISTS `m_payments_batch`;

CREATE TABLE `m_payments_batch` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `summit` varchar(50) NOT NULL,
  `description` text DEFAULT NULL,
  `amount` int(11) NOT NULL DEFAULT 0,
  `amount_usd` int(11) NOT NULL DEFAULT 0,
  `start_date` int(11) NOT NULL DEFAULT 0,
  `end_date` int(11) NOT NULL DEFAULT 0,
  `created_at` int(11) NOT NULL DEFAULT 0,
  `created_by` varchar(255) NOT NULL DEFAULT '0',
  `modified_at` int(11) NOT NULL DEFAULT 0,
  `modified_by` varchar(255) NOT NULL DEFAULT '0',
  `is_deleted` tinyint(1) NOT NULL DEFAULT 0,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=utf8;

/*Data for the table `m_payments_batch` */

insert  into `m_payments_batch`(`id`,`summit`,`description`,`amount`,`amount_usd`,`start_date`,`end_date`,`created_at`,`created_by`,`modified_at`,`modified_by`,`is_deleted`) values 
(1,'Summt',NULL,4562414,0,1666648800,1668034800,1666675932,'USER-ADM-01',1666677377,'USER-ADM-01',1),
(2,'Registration FEE','',10,0,1667257200,1669762800,1667321922,'USER-ADM-01',1667321986,'USER-ADM-01',0),
(3,'Payment Batch 1','',4000000,250,1672614000,1672614000,1667322015,'USER-ADM-01',0,'0',0),
(4,'Payment Batch 2','',4700000,300,1675292400,1675292400,1667322045,'USER-ADM-01',0,'0',0);

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;
