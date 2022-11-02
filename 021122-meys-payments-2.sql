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
  `active` tinyint(1) NOT NULL DEFAULT 0,
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

insert  into `m_payments_batch`(`id`,`summit`,`description`,`amount`,`amount_usd`,`active`,`start_date`,`end_date`,`created_at`,`created_by`,`modified_at`,`modified_by`,`is_deleted`) values 
(1,'Summt',NULL,4562414,0,0,1666648800,1668034800,1666675932,'USER-ADM-01',1666677377,'USER-ADM-01',1),
(2,'Registration FEE','',135000,10,1,1667257200,1669762800,1667321922,'USER-ADM-01',1667349596,'USER-ADM-01',0),
(3,'Payment Batch 1','',4000000,250,0,1672614000,1672614000,1667322015,'USER-ADM-01',0,'0',0),
(4,'Payment Batch 2','',4700000,300,0,1675292400,1675292400,1667322045,'USER-ADM-01',0,'0',0);

/*Table structure for table `m_payments_settings` */

DROP TABLE IF EXISTS `m_payments_settings`;

CREATE TABLE `m_payments_settings` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `payment_method` varchar(50) DEFAULT NULL,
  `type_method` varchar(50) DEFAULT NULL,
  `code_method` varchar(50) DEFAULT NULL,
  `img_method` varchar(255) DEFAULT NULL,
  `fee_method` varchar(255) DEFAULT NULL,
  `type_fee_method` int(5) DEFAULT 1 COMMENT '1: percentage; 2: flat',
  `data` text DEFAULT NULL,
  `tutorial` text DEFAULT NULL,
  `active` tinyint(1) NOT NULL DEFAULT 0,
  `created_at` int(11) NOT NULL DEFAULT 0,
  `created_by` varchar(15) NOT NULL DEFAULT '0',
  `modified_at` int(11) NOT NULL DEFAULT 0,
  `modified_by` varchar(15) NOT NULL DEFAULT '0',
  `is_deleted` tinyint(1) NOT NULL DEFAULT 0,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=7 DEFAULT CHARSET=utf8;

/*Data for the table `m_payments_settings` */

insert  into `m_payments_settings`(`id`,`payment_method`,`type_method`,`code_method`,`img_method`,`fee_method`,`type_fee_method`,`data`,`tutorial`,`active`,`created_at`,`created_by`,`modified_at`,`modified_by`,`is_deleted`) values 
(1,'Paypal','manual','paypal','assets/images/payments/paypal.png',NULL,2,NULL,NULL,1,0,'0',0,'0',0),
(2,'Xendit','gateway','xnd',NULL,NULL,3,NULL,NULL,1,0,'0',0,'0',0),
(3,'Western Union','manual','western_union','assets/images/payments/western_union.png',NULL,3,'{\r\n    \"first_name\": \"Meldi Latifah\",\r\n    \"last_name\": \"Saraswati\",\r\n    \"id_number\": \"99429734658\",\r\n    \"city\": \"IZMIT\",\r\n    \"state\": \"KOCAELI\",\r\n    \"country\": \"Turkiye\"\r\n}','<p>Western Union / Moneygram Payment for Foreign Participants:</p>\r\n\r\n<p>1. Go directly to the nearest Western Union in your area<br />\r\n2. Fill &quot;To Send Money&quot; form<br />\r\n3. Fill the receiver data according to the:</p>\r\n\r\n<p><strong>First Name </strong>: Meldi Latifah<br />\r\n<strong>Last Name </strong>: Saraswati<br />\r\n<strong>ID Number </strong>: 99429734658<br />\r\n<strong>City </strong>: IZMIT<br />\r\n<strong>State</strong>: KOCAELI<br />\r\n<strong>Country </strong>: Turkiye</p>\r\n\r\n<p>4. Give your cash to the officer<br />\r\n5. Take a photo of your filled &quot;To Send Money&quot; form and keep your MTCN in order to do your payment confirmation<br />\r\n6. Please pay attention to filling in the receiver data. The data filled must be exactly the same and should not be false even one letter according to the information above. Otherwise, your payment will not be acknowledged.<br />\r\n7. The amount that should be paid for the registration fee is $10. This amount has not included the charge from&nbsp;Western&nbsp;Union.</p>\r\n',1,0,'0',1667348707,'USER-ADM-01',0),
(4,'Money Gram','manual','money_gram','assets/images/payments/money_gram.png',NULL,3,'{\r\n    \"first_name\": \"Meldi Latifah\",\r\n    \"last_name\": \"Saraswati\",\r\n    \"id_number\": \"99429734658\",\r\n    \"city\": \"IZMIT\",\r\n    \"state\": \"KOCAELI\",\r\n    \"country\": \"Turkiye\"\r\n}','<p>Western Union / Moneygram Payment for Foreign Participants:</p>\r\n\r\n<p>1. Go directly to the nearest Western Union in your area<br />\r\n2. Fill &quot;To Send Money&quot; form<br />\r\n3. Fill the receiver data according to the:</p>\r\n\r\n<p><strong>First Name </strong>: Meldi Latifah<br />\r\n<strong>Last Name </strong>: Saraswati<br />\r\n<strong>ID Number </strong>: 99429734658<br />\r\n<strong>City </strong>: IZMIT<br />\r\n<strong>State</strong>: KOCAELI<br />\r\n<strong>Country </strong>: Turkiye</p>\r\n\r\n<p>4. Give your cash to the officer<br />\r\n5. Take a photo of your filled &quot;To Send Money&quot; form and keep your MTCN in order to do your payment confirmation<br />\r\n6. Please pay attention to filling in the receiver data. The data filled must be exactly the same and should not be false even one letter according to the information above. Otherwise, your payment will not be acknowledged.<br />\r\n7. The amount that should be paid for the registration fee is $10. This amount has not included the charge from&nbsp;Western&nbsp;Union.</p>\r\n',1,0,'0',1667355885,'USER-ADM-01',0),
(5,'Wise','manual','wise','assets/images/payments/wise.png',NULL,3,'','',0,0,'0',1667347932,'USER-ADM-01',0),
(6,'Ziraat Bank','manual','ziraat','assets/images/payments/ziraat.png',NULL,3,'','',0,0,'0',1667347932,'USER-ADM-01',0);

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
  `created_at` int(11) NOT NULL DEFAULT 0,
  `created_by` varchar(15) NOT NULL DEFAULT '0',
  `modified_at` int(11) NOT NULL DEFAULT 0,
  `modified_by` varchar(15) NOT NULL DEFAULT '0',
  `is_deleted` tinyint(1) NOT NULL DEFAULT 0,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=utf8;

/*Data for the table `tb_payments` */

insert  into `tb_payments`(`id`,`transaction_code`,`user_id`,`payment_batch`,`payment_setting`,`evidance`,`remarks`,`status`,`created_at`,`created_by`,`modified_at`,`modified_by`,`is_deleted`) values 
(1,'manual-gram-5uc6','USR-MHNDR-ff76c',2,3,'berkas/user/USR-MHNDR-ff76c/payments/2/1667356504.jpg','Mahendra',3,1667356504,'USR-MHNDR-ff76c',0,'0',0),
(2,'manualmoney-gram-5uc6','USR-MHNDR-ff76c',2,1,'berkas/user/USR-MHNDR-ff76c/payments/2/1667358553.jpg','Mahendra',3,1667358553,'USR-MHNDR-ff76c',0,'0',0),
(3,'MNLMN-7b76df','USR-MHNDR-ff76c',2,1,'berkas/user/USR-MHNDR-ff76c/payments/2/1667358812.jpg','Mahendra',3,1667358812,'USR-MHNDR-ff76c',1667359441,'USR-MHNDR-ff76c',0);

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;
