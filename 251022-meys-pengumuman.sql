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

/*Table structure for table `tb_announcements` */

DROP TABLE IF EXISTS `tb_announcements`;

CREATE TABLE `tb_announcements` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `permalink` varchar(255) DEFAULT NULL,
  `title` varchar(255) NOT NULL,
  `poster` varchar(255) NOT NULL,
  `content` text DEFAULT NULL,
  `tag` text DEFAULT NULL,
  `is_public` tinyint(1) DEFAULT 0,
  `is_member` tinyint(1) DEFAULT 0,
  `notification` tinyint(1) DEFAULT 0,
  `created_at` int(11) NOT NULL DEFAULT 0,
  `created_by` int(11) NOT NULL DEFAULT 0,
  `modified_at` int(11) NOT NULL DEFAULT 0,
  `modified_by` int(11) NOT NULL DEFAULT 0,
  `is_deleted` tinyint(1) NOT NULL DEFAULT 0,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8;

/*Data for the table `tb_announcements` */

insert  into `tb_announcements`(`id`,`permalink`,`title`,`poster`,`content`,`tag`,`is_public`,`is_member`,`notification`,`created_at`,`created_by`,`modified_at`,`modified_by`,`is_deleted`) values 
(1,'webinar-series-the-benefit-you-re-completely-unaware-of-being-self-funded-participant-of-the-istanbul-youth-summit-2023-y17p','Webinar Series: The Benefit You\'re Completely Unaware of Being Self Funded Participant of the Istanbul Youth Summit 2023','','<p>Webinar Series: The Benefit You&#39;re Completely Unaware of Being Self Funded Participant of the Istanbul Youth Summit 2023Webinar Series: The Benefit You&#39;re Completely Unaware of Being Self Funded Participant of the Istanbul Youth Summit 2023Webinar Series: The Benefit You&#39;re Completely Unaware of Being Self Funded Participant of the Istanbul Youth Summit 2023Webinar Series: The Benefit You&#39;re Completely Unaware of Being Self Funded Participant of the Istanbul Youth Summit 2023Webinar Series: The Benefit You&#39;re Completely Unaware of Being Self Funded Participant of the Istanbul Youth Summit 2023Webinar Series: The Benefit You&#39;re Completely Unaware of Being Self Funded Participant of the Istanbul Youth Summit 2023</p>\r\n',NULL,NULL,NULL,0,1666659648,0,1666660011,0,1);

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;
