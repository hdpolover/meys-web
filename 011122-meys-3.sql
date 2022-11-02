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

/*Table structure for table `m_eligilibity_countries` */

DROP TABLE IF EXISTS `m_eligilibity_countries`;

CREATE TABLE `m_eligilibity_countries` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `nationality` varchar(50) DEFAULT NULL,
  `continent` varchar(50) DEFAULT NULL,
  `type_visa` varchar(50) DEFAULT NULL,
  `issued_from` varchar(50) DEFAULT NULL,
  `created_at` int(11) NOT NULL DEFAULT 0,
  `created_by` varchar(15) NOT NULL DEFAULT '0',
  `modified_at` int(11) NOT NULL DEFAULT 0,
  `modified_by` varchar(15) NOT NULL DEFAULT '0',
  `is_deleted` tinyint(1) NOT NULL DEFAULT 0,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=135 DEFAULT CHARSET=utf8;

/*Data for the table `m_eligilibity_countries` */

insert  into `m_eligilibity_countries`(`id`,`nationality`,`continent`,`type_visa`,`issued_from`,`created_at`,`created_by`,`modified_at`,`modified_by`,`is_deleted`) values 
(1,'Algeria','Afrika','Need Visa','Travel Agent',1667318639,'USER-ADM-01',0,'0',0),
(2,'Angola','Afrika','Need Visa','Travel Agent',1667318654,'USER-ADM-01',0,'0',0),
(3,'Benin','Afrika','Need Visa','Travel Agent',1667318655,'USER-ADM-01',0,'0',0),
(4,'Botswana','Afrika','Need Visa','Travel Agent',1667318656,'USER-ADM-01',0,'0',0),
(5,'Burkina Faso','Afrika','Need Visa','Travel Agent',1667318657,'USER-ADM-01',0,'0',0),
(6,'Burundi','Afrika','Need Visa','Travel Agent',1667318658,'USER-ADM-01',0,'0',0),
(7,'Cabo Verde','Afrika','Need Visa','Travel Agent',1667318659,'USER-ADM-01',0,'0',0),
(8,'Cameroon','Afrika','Need Visa','Travel Agent',1667318660,'USER-ADM-01',0,'0',0),
(9,'Central African Republic','Afrika','Need Visa','Travel Agent',1667318661,'USER-ADM-01',0,'0',0),
(10,'Chad','Afrika','Need Visa','Travel Agent',1667318662,'USER-ADM-01',0,'0',0),
(11,'Comoros','Afrika','Need Visa','Travel Agent',1667318663,'USER-ADM-01',0,'0',0),
(12,'Congo (Democratic Republic of the)','Afrika','Need Visa','Travel Agent',1667318664,'USER-ADM-01',0,'0',0),
(13,'Congo (Republic of the)','Afrika','Need Visa','Travel Agent',1667318665,'USER-ADM-01',0,'0',0),
(14,'C?te d?Ivoire','Afrika','Need Visa','Travel Agent',1667318666,'USER-ADM-01',0,'0',0),
(15,'Democratic Republic of the Congo','Afrika','Need Visa','Travel Agent',1667318667,'USER-ADM-01',0,'0',0),
(16,'Djibouti','Afrika','Need Visa','Travel Agent',1667318668,'USER-ADM-01',0,'0',0),
(17,'Egypt','Afrika','Need Visa','Travel Agent',1667318669,'USER-ADM-01',0,'0',0),
(18,'Eritrea','Afrika','Need Visa','Travel Agent',1667318670,'USER-ADM-01',0,'0',0),
(19,'Ethiopia','Afrika','Need Visa','Travel Agent',1667318671,'USER-ADM-01',0,'0',0),
(20,'Gambia','Afrika','Need Visa','Travel Agent',1667318672,'USER-ADM-01',0,'0',0),
(21,'Ghana','Afrika','Need Visa','Travel Agent',1667318673,'USER-ADM-01',0,'0',0),
(22,'Guinea','Afrika','Need Visa','Travel Agent',1667318674,'USER-ADM-01',0,'0',0),
(23,'Guinea-Bissau','Afrika','Need Visa','Travel Agent',1667318675,'USER-ADM-01',0,'0',0),
(24,'Kenya','Afrika','Need Visa','Travel Agent',1667318676,'USER-ADM-01',0,'0',0),
(25,'Lesotho','Afrika','Need Visa','Travel Agent',1667318677,'USER-ADM-01',0,'0',0),
(26,'Liberia','Afrika','Need Visa','Travel Agent',1667318678,'USER-ADM-01',0,'0',0),
(27,'Libya','Afrika','Need Visa','Travel Agent',1667318679,'USER-ADM-01',0,'0',0),
(28,'Madagascar','Afrika','Need Visa','Travel Agent',1667318680,'USER-ADM-01',0,'0',0),
(29,'Malawi','Afrika','Need Visa','Travel Agent',1667318681,'USER-ADM-01',0,'0',0),
(30,'Mali','Afrika','Need Visa','Travel Agent',1667318682,'USER-ADM-01',0,'0',0),
(31,'Mauritania','Afrika','Need Visa','Travel Agent',1667318683,'USER-ADM-01',0,'0',0),
(32,'Mauritius','Afrika','Need Visa','Travel Agent',1667318684,'USER-ADM-01',0,'0',0),
(33,'Morocco','Afrika','Need Visa','Travel Agent',1667318685,'USER-ADM-01',0,'0',0),
(34,'Mozambique','Afrika','Need Visa','Travel Agent',1667318686,'USER-ADM-01',0,'0',0),
(35,'Namibia','Afrika','Need Visa','Travel Agent',1667318687,'USER-ADM-01',0,'0',0),
(36,'Nicaragua','Afrika','Need Visa','Travel Agent',1667318688,'USER-ADM-01',0,'0',0),
(37,'Niger','Afrika','Need Visa','Travel Agent',1667318689,'USER-ADM-01',0,'0',0),
(38,'Nigeria','Afrika','Need Visa','Travel Agent',1667318690,'USER-ADM-01',0,'0',0),
(39,'Rwanda','Afrika','Need Visa','Travel Agent',1667318691,'USER-ADM-01',0,'0',0),
(40,'Senegal','Afrika','Need Visa','Travel Agent',1667318692,'USER-ADM-01',0,'0',0),
(41,'Sierra Leone','Afrika','Need Visa','Travel Agent',1667318693,'USER-ADM-01',0,'0',0),
(42,'Somalia','Afrika','Need Visa','Travel Agent',1667318694,'USER-ADM-01',0,'0',0),
(43,'South Africa','Afrika','Need Visa','Travel Agent',1667318695,'USER-ADM-01',0,'0',0),
(44,'South Sudan','Afrika','Need Visa','Travel Agent',1667318696,'USER-ADM-01',0,'0',0),
(45,'Sudan','Afrika','Need Visa','Travel Agent',1667318697,'USER-ADM-01',0,'0',0),
(46,'Swaziland','Afrika','Need Visa','Travel Agent',1667318698,'USER-ADM-01',0,'0',0),
(47,'Tanzania, United Republic of','Afrika','Need Visa','Travel Agent',1667318699,'USER-ADM-01',0,'0',0),
(48,'Tanzania, United Republic of','Afrika','Need Visa','Travel Agent',1667318700,'USER-ADM-01',0,'0',0),
(49,'Togo','Afrika','Need Visa','Travel Agent',1667318701,'USER-ADM-01',0,'0',0),
(50,'Tunisia','Afrika','Need Visa','Travel Agent',1667318702,'USER-ADM-01',0,'0',0),
(51,'Uganda','Afrika','Need Visa','Travel Agent',1667318703,'USER-ADM-01',0,'0',0),
(52,'Zambia','Afrika','Need Visa','Travel Agent',1667318704,'USER-ADM-01',0,'0',0),
(53,'Zimbabwe','Afrika','Need Visa','Travel Agent',1667318705,'USER-ADM-01',0,'0',0),
(54,'Antigua and Barbuda','America','Need Visa','Travel Agent',1667318706,'USER-ADM-01',0,'0',0),
(55,'Cuba','America','Need Visa','Travel Agent',1667318707,'USER-ADM-01',0,'0',0),
(56,'Grenada','America','Need Visa','Travel Agent',1667318708,'USER-ADM-01',0,'0',0),
(57,'Haiti','America','Need Visa','Travel Agent',1667318709,'USER-ADM-01',0,'0',0),
(58,'Mexico','America','Need Visa','Travel Agent',1667318710,'USER-ADM-01',0,'0',0),
(59,'Canada','America','VoA','Direct Travel',1667318711,'USER-ADM-01',0,'0',0),
(60,'The United States of America','America','VoA','Direct Travel',1667318712,'USER-ADM-01',0,'0',0),
(61,'Argentina','Amerika','Need Visa','Travel Agent',1667318713,'USER-ADM-01',0,'0',0),
(62,'Brazil','Amerika','Need Visa','Travel Agent',1667318714,'USER-ADM-01',0,'0',0),
(63,'Panama','Amerika','Need Visa','Travel Agent',1667318715,'USER-ADM-01',0,'0',0),
(64,'Bahamas','Amerika','Need Visa','Travel Agent',1667318716,'USER-ADM-01',0,'0',0),
(65,'Barbados','Amerika','Need Visa','Travel Agent',1667318717,'USER-ADM-01',0,'0',0),
(66,'Belize','Amerika','Need Visa','Travel Agent',1667318718,'USER-ADM-01',0,'0',0),
(67,'Bolivia','Amerika','Need Visa','Travel Agent',1667318719,'USER-ADM-01',0,'0',0),
(68,'Chile','Amerika','Need Visa','Travel Agent',1667318720,'USER-ADM-01',0,'0',0),
(69,'Colombia','Amerika','Need Visa','Travel Agent',1667318721,'USER-ADM-01',0,'0',0),
(70,'Dominican Republic','Amerika','Need Visa','Travel Agent',1667318722,'USER-ADM-01',0,'0',0),
(71,'El Salvador','Amerika','Need Visa','Travel Agent',1667318723,'USER-ADM-01',0,'0',0),
(72,'Honduras','Amerika','Need Visa','Travel Agent',1667318724,'USER-ADM-01',0,'0',0),
(73,'Jamaica','Amerika','Need Visa','Travel Agent',1667318725,'USER-ADM-01',0,'0',0),
(74,'Peru','Amerika','Need Visa','Travel Agent',1667318726,'USER-ADM-01',0,'0',0),
(75,'Suriname','Amerika','Need Visa','Travel Agent',1667318727,'USER-ADM-01',0,'0',0),
(76,'Trinidad and Tobago','Amerika','Need Visa','Travel Agent',1667318728,'USER-ADM-01',0,'0',0),
(77,'United States of America','Amerika','Need Visa','Travel Agent',1667318729,'USER-ADM-01',0,'0',0),
(78,'Uruguay','Amerika','Need Visa','Travel Agent',1667318730,'USER-ADM-01',0,'0',0),
(79,'Venezuela','Amerika','Need Visa','Travel Agent',1667318731,'USER-ADM-01',0,'0',0),
(80,'Bahrain','Asia','Free Visa','Direct Travel',1667318732,'USER-ADM-01',0,'0',0),
(81,'Kuwait','Asia','Free Visa','Direct Travel',1667318733,'USER-ADM-01',0,'0',0),
(82,'Oman','Asia','Free Visa','Direct Travel',1667318734,'USER-ADM-01',0,'0',0),
(83,'Qatar','Asia','Free Visa','Direct Travel',1667318735,'USER-ADM-01',0,'0',0),
(84,'United Arab Emirate','Asia','Free Visa','Direct Travel',1667318736,'USER-ADM-01',0,'0',0),
(85,'Afghanistan','Asia','Need Visa','Travel Agent',1667318737,'USER-ADM-01',0,'0',0),
(86,'Armenia','Asia','Need Visa','Travel Agent',1667318738,'USER-ADM-01',0,'0',0),
(87,'Bangladesh','Asia','Need Visa','Travel Agent',1667318739,'USER-ADM-01',0,'0',0),
(88,'Bhutan','Asia','Need Visa','Travel Agent',1667318740,'USER-ADM-01',0,'0',0),
(89,'Brunei Darussalam','Asia','Need Visa','Travel Agent',1667318741,'USER-ADM-01',0,'0',0),
(90,'Cambodia','Asia','Need Visa','Travel Agent',1667318742,'USER-ADM-01',0,'0',0),
(91,'China','Asia','Need Visa','Travel Agent',1667318743,'USER-ADM-01',0,'0',0),
(92,'Georgia','Asia','Need Visa','Travel Agent',1667318744,'USER-ADM-01',0,'0',0),
(93,'Indonesia','Asia','Need Visa','YBB Foundation',1667318745,'USER-ADM-01',0,'0',0),
(94,'Iran','Asia','Need Visa','Travel Agent',1667318746,'USER-ADM-01',0,'0',0),
(95,'Iraq','Asia','Need Visa','Travel Agent',1667318747,'USER-ADM-01',0,'0',0),
(96,'Israel','Asia','Need Visa','Travel Agent',1667318748,'USER-ADM-01',0,'0',0),
(97,'Korea (Republic of)','Asia','Need Visa','Travel Agent',1667318749,'USER-ADM-01',0,'0',0),
(98,'Kyrgyzstan','Asia','Need Visa','Travel Agent',1667318750,'USER-ADM-01',0,'0',0),
(99,'Lao People\'s Democratic Republic','Asia','Need Visa','Travel Agent',1667318751,'USER-ADM-01',0,'0',0),
(100,'Lebanon','Asia','Need Visa','Travel Agent',1667318752,'USER-ADM-01',0,'0',0),
(101,'Mongolia','Asia','Need Visa','Travel Agent',1667318753,'USER-ADM-01',0,'0',0),
(102,'Myanmar','Asia','Need Visa','Travel Agent',1667318754,'USER-ADM-01',0,'0',0),
(103,'Nepal','Asia','Need Visa','Travel Agent',1667318755,'USER-ADM-01',0,'0',0),
(104,'Pakistan','Asia','Need Visa','Travel Agent',1667318756,'USER-ADM-01',0,'0',0),
(105,'Palestine, State of','Asia','Need Visa','Travel Agent',1667318757,'USER-ADM-01',0,'0',0),
(106,'Papua New Guinea','Asia','Need Visa','Travel Agent',1667318758,'USER-ADM-01',0,'0',0),
(107,'Philippines','Asia','Need Visa','Travel Agent',1667318759,'USER-ADM-01',0,'0',0),
(108,'Sri Lanka','Asia','Need Visa','Travel Agent',1667318760,'USER-ADM-01',0,'0',0),
(109,'Syrian Arab Republic','Asia','Need Visa','Travel Agent',1667318761,'USER-ADM-01',0,'0',0),
(110,'Taiwan, Province of China','Asia','Need Visa','Travel Agent',1667318762,'USER-ADM-01',0,'0',0),
(111,'Tajikistan','Asia','Need Visa','Travel Agent',1667318763,'USER-ADM-01',0,'0',0),
(112,'Thailand','Asia','Need Visa','Travel Agent',1667318764,'USER-ADM-01',0,'0',0),
(113,'Timor-Leste','Asia','Need Visa','Travel Agent',1667318765,'USER-ADM-01',0,'0',0),
(114,'Turkey','Asia','Need Visa','Travel Agent',1667318766,'USER-ADM-01',0,'0',0),
(115,'Turkmenistan','Asia','Need Visa','Travel Agent',1667318767,'USER-ADM-01',0,'0',0),
(116,'Vietnam','Asia','Need Visa','Travel Agent',1667318768,'USER-ADM-01',0,'0',0),
(117,'Yemen','Asia','Need Visa','Travel Agent',1667318769,'USER-ADM-01',0,'0',0),
(118,'Saudi Arabia','Asia','No Need','No Need',1667318770,'USER-ADM-01',0,'0',0),
(119,'Brunei','Asia','VoA','Direct Travel',1667318771,'USER-ADM-01',0,'0',0),
(120,'China','Asia','VoA','Direct Travel',1667318772,'USER-ADM-01',0,'0',0),
(121,'Japan','Asia','VoA','Direct Travel',1667318773,'USER-ADM-01',0,'0',0),
(122,'Kazakhstan','Asia','VoA','Direct Travel',1667318774,'USER-ADM-01',0,'0',0),
(123,'Malaysia','Asia','VoA','Direct Travel',1667318775,'USER-ADM-01',0,'0',0),
(124,'Singapore','Asia','VoA','Direct Travel',1667318776,'USER-ADM-01',0,'0',0),
(125,'South Korea','Asia','VoA','Direct Travel',1667318777,'USER-ADM-01',0,'0',0),
(126,'India','Asia','Need Visa','Travel Agent',1667318778,'USER-ADM-01',0,'0',0),
(127,'Jordan','Asia','Need Visa','Travel Agent',1667318779,'USER-ADM-01',0,'0',0),
(128,'Fiji','Australia and Oceania','Need Visa','Travel Agent',1667318780,'USER-ADM-01',0,'0',0),
(129,'Salomon Island','Australia and Oceania','Need Visa','Travel Agent',1667318781,'USER-ADM-01',0,'0',0),
(130,'Tonga','Australia and Oceania','Need Visa','Travel Agent',1667318782,'USER-ADM-01',0,'0',0),
(131,'Tuvalu','Australia and Oceania','Need Visa','Travel Agent',1667318783,'USER-ADM-01',0,'0',0),
(132,'Vanuatu','Australia and Oceania','Need Visa','Travel Agent',1667318784,'USER-ADM-01',0,'0',0),
(133,'Australia','Australia and Oceania','VoA','Direct Travel',1667318785,'USER-ADM-01',0,'0',0),
(134,'New Zealand','Australia and Oceania','VoA','Direct Travel',1667318786,'USER-ADM-01',0,'0',0);

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
  `active` tinyint(1) NOT NULL DEFAULT 0,
  `created_at` int(11) NOT NULL DEFAULT 0,
  `created_by` varchar(15) NOT NULL DEFAULT '0',
  `modified_at` int(11) NOT NULL DEFAULT 0,
  `modified_by` varchar(15) NOT NULL DEFAULT '0',
  `is_deleted` tinyint(1) NOT NULL DEFAULT 0,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=utf8;

/*Data for the table `m_payments_settings` */

insert  into `m_payments_settings`(`id`,`payment_method`,`type_method`,`code_method`,`img_method`,`fee_method`,`type_fee_method`,`data`,`active`,`created_at`,`created_by`,`modified_at`,`modified_by`,`is_deleted`) values 
(1,'Paypal','manual','paypal',NULL,NULL,2,NULL,1,0,'0',0,'0',0),
(2,'Xendit','gateway','xnd',NULL,NULL,3,NULL,1,0,'0',0,'0',0),
(3,'Western Union','manual','western_union',NULL,NULL,3,'{\"first_name\":\"Meldi Latifah\",\"last_name\":\"Saraswati\",\"id_number\":\"99429734658\",\"city\":\"IZMIT\",\"state\":\"KOCAELI\",\"country\":\"Turkiye\"}',1,0,'0',0,'0',0);

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;
