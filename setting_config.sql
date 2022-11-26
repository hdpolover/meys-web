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

/*Table structure for table `m_payments_settings` */

DROP TABLE IF EXISTS `m_payments_settings`;

CREATE TABLE `m_payments_settings` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `payment_method` varchar(50) DEFAULT NULL,
  `type_method` varchar(50) DEFAULT NULL,
  `code_method` varchar(50) DEFAULT NULL,
  `img_method` varchar(255) DEFAULT NULL,
  `fee_method` varchar(255) DEFAULT NULL,
  `type_fee_method` int(5) DEFAULT 1 COMMENT '1: percentage; 2: flat; 3: determine by provider',
  `data` text DEFAULT NULL,
  `tutorial` text DEFAULT NULL,
  `active` tinyint(1) NOT NULL DEFAULT 0,
  `created_at` int(11) NOT NULL DEFAULT 0,
  `created_by` varchar(15) NOT NULL DEFAULT '0',
  `modified_at` int(11) NOT NULL DEFAULT 0,
  `modified_by` varchar(15) NOT NULL DEFAULT '0',
  `is_deleted` tinyint(1) NOT NULL DEFAULT 0,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=21 DEFAULT CHARSET=utf8;

/*Data for the table `m_payments_settings` */

insert  into `m_payments_settings`(`id`,`payment_method`,`type_method`,`code_method`,`img_method`,`fee_method`,`type_fee_method`,`data`,`tutorial`,`active`,`created_at`,`created_by`,`modified_at`,`modified_by`,`is_deleted`) values 
(9,'Permata Bank','gateway_midtrans','permata','assets/images/payments/permata.png',NULL,3,NULL,NULL,1,1667368547,'USER-ADM-01',1667368547,'USER-ADM-01',0),
(10,'BNI','geteway_midtrans','bni','assets/images/payments/bni.png',NULL,3,NULL,NULL,1,1667368547,'USER-ADM-01',1667368547,'USER-ADM-01',0),
(11,'BRI','gateway_midtrans','bri','assets/images/payments/bri.png',NULL,3,NULL,NULL,1,0,'0',0,'0',0),
(12,'BCA','gateway_midtrans','bca','assets/images/payments/bca.png',NULL,3,NULL,NULL,1,0,'0',0,'0',0),
(13,'MANDIRI','gateway_midtrans','mandiri','assets/images/payments/mandiri.png',NULL,3,NULL,NULL,1,1667368547,'USER-ADM-01',1667368547,'USER-ADM-01',0),
(14,'BRIVA','gateway_midtrans','briva','assets/images/payments/briva.png',NULL,3,NULL,NULL,1,1667368547,'USER-ADM-01',1667368547,'USER-ADM-01',0),
(15,'Gopay Merchant','gateway_midtrans','gopay','assets/images/payments/gopay.png',NULL,3,NULL,NULL,1,1667368547,'USER-ADM-01',1667368547,'USER-ADM-01',0),
(16,'Shoopepay Merchant','gateway_midtrans','shopeepay','assets/images/payments/qris.png',NULL,3,NULL,NULL,1,0,'0',0,'0',0),
(17,'Credit Card','gateway_midtrans','credit_card','assets/images/payments/credit_card.png',NULL,3,NULL,NULL,1,1667368547,'USER-ADM-01',1667368547,'USER-ADM-01',0),
(18,'Indomaret, I-Saku, Alfmaret, Alfamidi','gateway_midtrans','cstore','assets/images/payments/cstore.png',NULL,3,NULL,NULL,0,0,'0',0,'0',0);

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;
