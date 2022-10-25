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

/*Table structure for table `m_faq` */

DROP TABLE IF EXISTS `m_faq`;

CREATE TABLE `m_faq` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `title` varchar(255) NOT NULL,
  `order` int(5) NOT NULL DEFAULT 0,
  `created_at` int(11) NOT NULL DEFAULT 0,
  `created_by` int(11) NOT NULL DEFAULT 0,
  `modified_at` int(11) NOT NULL DEFAULT 0,
  `modified_by` int(11) NOT NULL DEFAULT 0,
  `is_deleted` tinyint(1) NOT NULL DEFAULT 0,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=utf8;

/*Data for the table `m_faq` */

insert  into `m_faq`(`id`,`title`,`order`,`created_at`,`created_by`,`modified_at`,`modified_by`,`is_deleted`) values 
(1,'Event Details',1,0,0,0,0,0),
(2,'Registration',2,0,0,0,0,0),
(3,'Payments',3,0,0,0,0,0);

/*Table structure for table `m_home` */

DROP TABLE IF EXISTS `m_home`;

CREATE TABLE `m_home` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `key` varchar(255) NOT NULL,
  `value` text DEFAULT NULL,
  `desc` text DEFAULT NULL,
  `is_deleted` tinyint(1) NOT NULL DEFAULT 0,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8;

/*Data for the table `m_home` */

insert  into `m_home`(`id`,`key`,`value`,`desc`,`is_deleted`) values 
(1,'hero','swiper','swiper, hero, image',0);

/*Table structure for table `tb_auth` */

DROP TABLE IF EXISTS `tb_auth`;

CREATE TABLE `tb_auth` (
  `user_id` int(11) NOT NULL AUTO_INCREMENT,
  `email` varchar(50) COLLATE utf8mb4_unicode_ci NOT NULL,
  `password` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `role` int(5) NOT NULL DEFAULT 2 COMMENT '0: SU; 1: Admin; 2: User',
  `status` int(5) NOT NULL COMMENT '0: unverified; 1: verified; 2: suspend',
  `created_at` int(11) NOT NULL DEFAULT 0,
  PRIMARY KEY (`user_id`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

/*Data for the table `tb_auth` */

insert  into `tb_auth`(`user_id`,`email`,`password`,`role`,`status`,`created_at`) values 
(1,'ngodingin.indonesia@gmail.com','$2y$10$1hg1pDmFo9NYLXLuKxr86.qZpBwWcFo.gQgLLye5Hsk9VXmZqdW12',0,1,1666572892),
(2,'info@admin.com','$2y$10$1hg1pDmFo9NYLXLuKxr86.qZpBwWcFo.gQgLLye5Hsk9VXmZqdW12',1,1,1666572892),
(3,'user@user.com','$2y$10$1hg1pDmFo9NYLXLuKxr86.qZpBwWcFo.gQgLLye5Hsk9VXmZqdW12',2,1,1666572892);

/*Table structure for table `tb_faq` */

DROP TABLE IF EXISTS `tb_faq`;

CREATE TABLE `tb_faq` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `m_faq_id` int(11) NOT NULL DEFAULT 0,
  `faq` varchar(255) NOT NULL,
  `content` text NOT NULL,
  `order` int(5) DEFAULT 0,
  `created_at` int(11) NOT NULL DEFAULT 0,
  `created_by` int(11) NOT NULL DEFAULT 0,
  `modified_at` int(11) NOT NULL DEFAULT 0,
  `modified_by` int(11) NOT NULL DEFAULT 0,
  `is_deleted` tinyint(1) NOT NULL DEFAULT 0,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=8 DEFAULT CHARSET=utf8;

/*Data for the table `tb_faq` */

insert  into `tb_faq`(`id`,`m_faq_id`,`faq`,`content`,`order`,`created_at`,`created_by`,`modified_at`,`modified_by`,`is_deleted`) values 
(1,1,'What is Middle East Youth Summit?','Middle East Youth Summit is an annual international youth summit organized by Youth Break the Boundaries Foundation. Middle East Youth Summit 2023 will be held in Mecca, Medina, and Jeddah on March 2-6 2023.',1,0,0,0,0,0),
(2,1,'What is the theme of the Middle East Youth Summit?','The Middle East Youth Summit 2023 will bring the theme “Building World Civilization with Islamic Brotherhood”',2,0,0,0,0,0),
(3,1,'What is the agenda of the Middle East Youth Summit?','Middle East Youth Summit 2023 will be held for five days starting from March 2, 2023, to March 6, 2023. The program will consist of umrah, a city tour of Mecca, Madinah, and Jeddah, an international symposium on Muslim community development, and a campfire.',3,0,0,0,0,0),
(4,1,'What is the goal of the Middle East Youth Summit?','The goal of The Middle East Youth Summit 2023 is to connect young Muslim leaders from various countries and backgrounds, give spiritual experiences to young Muslim leaders,  and develop and empower an impactful Muslim community.',4,0,0,0,0,0),
(5,2,'When will I get the announcement for the selected participants?','The registration will be held on November 1-30, 2022\r\nIf the application of participants is accepted, the committee will send the mail of acceptance in 5 working days after submission.\r\n',5,0,0,0,0,0),
(6,2,'Why can\'t I register myself?','Please read the guideline for the registration process [Guideline]. The registration is on this website middleeastyouthsummit.com',6,0,0,0,0,0),
(7,3,'I made a payment but it is still pending, why?','Make sure that you have made a purchase with the selected payment method on our website. The process is automatic. Please contact middleeastyouthsummit@gmail.com or Whatsapp +62 851-7338-6622 ',7,0,0,0,0,0);

/*Table structure for table `tb_settings` */

DROP TABLE IF EXISTS `tb_settings`;

CREATE TABLE `tb_settings` (
  `key` varchar(30) COLLATE utf8mb4_unicode_ci NOT NULL,
  `value` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `desc` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` int(11) NOT NULL DEFAULT 0,
  `modified_at` int(11) NOT NULL DEFAULT 0,
  `is_deleted` tinyint(1) NOT NULL DEFAULT 0,
  PRIMARY KEY (`key`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

/*Data for the table `tb_settings` */

insert  into `tb_settings`(`key`,`value`,`desc`,`created_at`,`modified_at`,`is_deleted`) values 
('bypass_otp','true',NULL,1653641032,0,0),
('kode','1234123412341234',NULL,1653641032,0,0),
('leader_daftar','0',NULL,1653641032,0,0),
('mailer_alias','Middle East Youth Summit',NULL,1653641032,0,0),
('mailer_connection','ssl',NULL,1653641032,0,0),
('mailer_host','smtp.googlemail.com',NULL,1653641032,0,0),
('mailer_mode','0',NULL,1653641032,0,0),
('mailer_password','ctzpmwrozzycessd',NULL,1653641032,0,0),
('mailer_port','465',NULL,1653641032,0,0),
('mailer_smtp','1',NULL,1653641032,0,0),
('mailer_username','ngodingin.indonesia@gmail.com',NULL,1653641032,0,0),
('master_password','1234',NULL,1653641032,0,0),
('max_upload_size','5',NULL,1653641032,0,0),
('sosmed_facebook','mahendradwipurwanto',NULL,1653641032,0,0),
('sosmed_ig','mahendradwipurwanto',NULL,1653641032,0,0),
('sosmed_twitter','mahendradwipurwanto',NULL,1653641032,0,0),
('sosmed_yt','mahendradwipurwanto',NULL,1653641032,0,0),
('upload_size','5',NULL,1653641032,0,0),
('upload_type','{\"pdf\":true,\"jpg\":true,\"jpeg\":true,\"png\":true,\"docx\":true,\"pptx\":true,\"xlsx\":true}',NULL,1653641032,0,0),
('web_alamat','Malang, Jawa Timur - Indonesia',NULL,1653641032,0,0),
('web_desc','<p>This is Base Project Template</p>\r\n',NULL,1653641032,0,0),
('web_icon','assets/images/icon.png',NULL,1653641032,0,0),
('web_logo','assets/images/logo.png',NULL,1653641032,0,0),
('web_logo_white','assets/images/logo-white.png',NULL,0,0,0),
('web_telepon','085157444518',NULL,1653641032,0,0),
('web_title','Sistem Monitoring Kinerja Karyawan',NULL,1653641032,0,0);

/*Table structure for table `tb_swiper` */

DROP TABLE IF EXISTS `tb_swiper`;

CREATE TABLE `tb_swiper` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `page_code` varchar(50) NOT NULL,
  `background` varchar(255) NOT NULL DEFAULT 'assets/images/placeholder.jpg',
  `style` tinyint(1) NOT NULL DEFAULT 1 COMMENT '1: light mode; 2: dark mode',
  `title` varchar(255) NOT NULL,
  `is_subtitle` tinyint(1) NOT NULL DEFAULT 0,
  `subtitle` varchar(255) DEFAULT NULL,
  `is_countdown` tinyint(1) NOT NULL DEFAULT 0,
  `countdown` varchar(50) DEFAULT 'December 30, 2022 00:00:00',
  `is_btn` tinyint(1) NOT NULL DEFAULT 0,
  `btn_style` varchar(50) DEFAULT 'btn btn-outline-light',
  `btn_text` varchar(50) DEFAULT 'Sign up',
  `is_btn_link` tinyint(1) NOT NULL DEFAULT 0,
  `is_link_external` tinyint(1) NOT NULL DEFAULT 0,
  `btn_link` varchar(255) DEFAULT NULL,
  `is_btn_second` tinyint(1) NOT NULL DEFAULT 0,
  `btn_second_style` varchar(50) DEFAULT 'btn btn-soft-warning',
  `btn_second_text` varchar(50) DEFAULT 'Sign in',
  `is_btn_second_link` tinyint(1) NOT NULL DEFAULT 0,
  `is_second_link_external` tinyint(1) NOT NULL DEFAULT 0,
  `btn_second_link` varchar(255) DEFAULT NULL,
  `order` int(5) NOT NULL DEFAULT 0,
  `is_custom` tinyint(1) NOT NULL DEFAULT 0,
  `custom_script` text DEFAULT NULL,
  `created_at` int(11) NOT NULL DEFAULT 0,
  `created_by` int(11) NOT NULL DEFAULT 0,
  `modified_at` int(11) NOT NULL DEFAULT 0,
  `modified_by` int(11) NOT NULL DEFAULT 0,
  `is_deleted` tinyint(1) NOT NULL DEFAULT 0,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=utf8;

/*Data for the table `tb_swiper` */

insert  into `tb_swiper`(`id`,`page_code`,`background`,`style`,`title`,`is_subtitle`,`subtitle`,`is_countdown`,`countdown`,`is_btn`,`btn_style`,`btn_text`,`is_btn_link`,`is_link_external`,`btn_link`,`is_btn_second`,`btn_second_style`,`btn_second_text`,`is_btn_second_link`,`is_second_link_external`,`btn_second_link`,`order`,`is_custom`,`custom_script`,`created_at`,`created_by`,`modified_at`,`modified_by`,`is_deleted`) values 
(1,'home','assets/images/placeholder.jpg',2,'Middle East Youth Summit 2022',1,'November 1-30, 2022 (Registration Process)',1,'November 30, 2022 00:00:00',1,'btn btn-outline-light','Sign up',1,0,'sign-up',0,'btn btn-warning','Sign in',0,0,NULL,1,0,NULL,0,0,0,0,0),
(2,'home','assets/images/placeholder.jpg',2,'Middle East Yout Summit 2022',1,'March 2-6, 2023 (Date of Program)',1,'March 2, 2023 00:00:00',1,'btn btn-outline-light','Sign in',1,0,'sign-in',1,'btn btn-warning','Sign up',0,0,NULL,2,0,NULL,0,0,0,0,0),
(3,'home','assets/images/placeholder.jpg',3,'Registration Guidelines',0,NULL,0,'December 30, 2022 00:00:00',1,'btn btn-outline-light','Guidelines',1,1,'https://docs.google.com/document/d/1dOPFPTq58WyDr6-55yKB4u6TctFEnCcrCSe8WcHMglg/edit?usp=sharing',0,'btn btn-warning','Sign in',0,0,NULL,3,0,NULL,0,0,0,0,0);

/*Table structure for table `tb_user` */

DROP TABLE IF EXISTS `tb_user`;

CREATE TABLE `tb_user` (
  `user_id` int(11) NOT NULL,
  `name` varchar(50) COLLATE utf8mb4_unicode_ci NOT NULL,
  `gender` char(1) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `address` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `phone` varchar(20) COLLATE utf8mb4_unicode_ci DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

/*Data for the table `tb_user` */

insert  into `tb_user`(`user_id`,`name`,`gender`,`address`,`phone`) values 
(1,'Super Admin',NULL,NULL,NULL),
(2,'Admin',NULL,NULL,NULL),
(2,'Test User',NULL,NULL,NULL);

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;
