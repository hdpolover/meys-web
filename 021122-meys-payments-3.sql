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

/*Table structure for table `tb_payments` */

DROP TABLE IF EXISTS `tb_payments`;

CREATE TABLE `tb_payments` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `transaction_code` varchar(255) DEFAULT NULL,
  `user_id` varchar(15) NOT NULL DEFAULT '0',
  `payment_batch` int(11) NOT NULL DEFAULT 0,
  `payment_setting` int(11) NOT NULL DEFAULT 0,
  `evidance` varchar(255) DEFAULT NULL,
  `remarks` varchar(255) DEFAULT NULL,
  `status` int(5) NOT NULL DEFAULT 1,
  `amount` double NOT NULL DEFAULT 0,
  `amount_usd` double NOT NULL DEFAULT 0,
  `created_at` int(11) NOT NULL DEFAULT 0,
  `created_by` varchar(15) NOT NULL DEFAULT '0',
  `modified_at` int(11) NOT NULL DEFAULT 0,
  `modified_by` varchar(15) NOT NULL DEFAULT '0',
  `is_deleted` tinyint(1) NOT NULL DEFAULT 0,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=utf8;

/*Data for the table `tb_payments` */

insert  into `tb_payments`(`id`,`transaction_code`,`user_id`,`payment_batch`,`payment_setting`,`evidance`,`remarks`,`status`,`amount`,`amount_usd`,`created_at`,`created_by`,`modified_at`,`modified_by`,`is_deleted`) values 
(1,'manual-gram-5uc6','USR-MHNDR-ff76c',2,3,'berkas/user/USR-MHNDR-ff76c/payments/2/1667356504.jpg','Mahendra',3,0,0,1667356504,'USR-MHNDR-ff76c',0,'0',0),
(2,'manualmoney-gram-5uc6','USR-MHNDR-ff76c',2,1,'berkas/user/USR-MHNDR-ff76c/payments/2/1667358553.jpg','Mahendra',3,0,0,1667358553,'USR-MHNDR-ff76c',0,'0',0),
(3,'MNLMN-7b76df','USR-MHNDR-ff76c',2,1,'berkas/user/USR-MHNDR-ff76c/payments/2/1667358812.jpg','Mahendra',3,0,0,1667358812,'USR-MHNDR-ff76c',1667359441,'USR-MHNDR-ff76c',0);

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;
