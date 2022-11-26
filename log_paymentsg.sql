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

/*Table structure for table `log_payments` */

DROP TABLE IF EXISTS `log_payments`;

CREATE TABLE `log_payments` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `method_type` int(5) DEFAULT 1 COMMENT '1: Midtrans; 2: Xendit',
  `order_id` int(11) NOT NULL DEFAULT 0,
  `log` text DEFAULT NULL,
  `created_at` int(11) NOT NULL DEFAULT 0,
  `created_by` int(11) NOT NULL DEFAULT 0,
  `is_deleted` tinyint(1) NOT NULL DEFAULT 0,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=32 DEFAULT CHARSET=utf8;

/*Data for the table `log_payments` */

insert  into `log_payments`(`id`,`method_type`,`order_id`,`log`,`created_at`,`created_by`,`is_deleted`) values 
(1,1,78102170,'{\"transaction_details\":{\"order_id\":78102170,\"gross_amount\":\"150000\"},\"item_details\":{\"id\":\"2\",\"price\":\"150000\",\"quantity\":1,\"name\":\"Registration FEE (Early Bid)\"},\"customer_details\":{\"first_name\":\"MAHENDRA\",\"last_name\":\"PURWANTO\",\"email\":\"mahendradwipurwanto@gmail.com\",\"phone\":\"\",\"billing_address\":{\"first_name\":\"MAHENDRA\",\"last_name\":\"PURWANTO\",\"phone\":\"\",\"country_code\":\"IDN\"},\"shipping_address\":{\"first_name\":\"MAHENDRA\",\"last_name\":\"PURWANTO\",\"phone\":\"\",\"country_code\":\"IDN\"}},\"credit_card\":{\"secure\":true},\"expiry\":{\"start_time\":\"2022-11-25 19:12:15 +0700\",\"unit\":\"day\",\"duration\":1}}',1669378335,78102170,0),
(2,1,78102170,'739f98fa-c327-45e0-9b46-9aa457fc94b4',1669378336,78102170,0),
(3,1,557794585,'{\"transaction_details\":{\"order_id\":557794585,\"gross_amount\":\"150000\"},\"item_details\":{\"id\":\"2\",\"price\":\"150000\",\"quantity\":1,\"name\":\"Registration FEE (Early Bid)\"},\"customer_details\":{\"first_name\":\"MAHENDRA\",\"last_name\":\"PURWANTO\",\"email\":\"mahendradwipurwanto@gmail.com\",\"phone\":\"\",\"billing_address\":{\"first_name\":\"MAHENDRA\",\"last_name\":\"PURWANTO\",\"phone\":\"\",\"country_code\":\"IDN\"},\"shipping_address\":{\"first_name\":\"MAHENDRA\",\"last_name\":\"PURWANTO\",\"phone\":\"\",\"country_code\":\"IDN\"}},\"credit_card\":{\"secure\":true},\"expiry\":{\"start_time\":\"2022-11-25 19:13:30 +0700\",\"unit\":\"day\",\"duration\":1}}',1669378410,557794585,0),
(4,1,557794585,'fcc71785-924b-4530-b82f-2098ca950c76',1669378410,557794585,0),
(5,1,931136951,'{\"transaction_details\":{\"order_id\":931136951,\"gross_amount\":\"150000\"},\"item_details\":{\"id\":\"2\",\"price\":\"150000\",\"quantity\":1,\"name\":\"Registration FEE (Early Bid)\"},\"customer_details\":{\"first_name\":\"MAHENDRA\",\"last_name\":\"PURWANTO\",\"email\":\"mahendradwipurwanto@gmail.com\",\"phone\":\"\",\"billing_address\":{\"first_name\":\"MAHENDRA\",\"last_name\":\"PURWANTO\",\"phone\":\"\",\"country_code\":\"IDN\"},\"shipping_address\":{\"first_name\":\"MAHENDRA\",\"last_name\":\"PURWANTO\",\"phone\":\"\",\"country_code\":\"IDN\"}},\"credit_card\":{\"secure\":true},\"expiry\":{\"start_time\":\"2022-11-25 20:04:24 +0700\",\"unit\":\"day\",\"duration\":1}}',1669381464,931136951,0),
(6,1,931136951,'0660d624-74b4-4ded-9a5a-f470d0cb0410',1669381464,931136951,0),
(7,1,1169443776,'{\"transaction_details\":{\"order_id\":1169443776,\"gross_amount\":\"150000\"},\"item_details\":{\"id\":\"2\",\"price\":\"150000\",\"quantity\":1,\"name\":\"Registration FEE (Early Bid)\"},\"customer_details\":{\"first_name\":\"MAHENDRA\",\"last_name\":\"PURWANTO\",\"email\":\"mahendradwipurwanto@gmail.com\",\"phone\":\"\",\"billing_address\":{\"first_name\":\"MAHENDRA\",\"last_name\":\"PURWANTO\",\"phone\":\"\",\"country_code\":\"IDN\"},\"shipping_address\":{\"first_name\":\"MAHENDRA\",\"last_name\":\"PURWANTO\",\"phone\":\"\",\"country_code\":\"IDN\"}},\"credit_card\":{\"secure\":true},\"expiry\":{\"start_time\":\"2022-11-25 20:25:14 +0700\",\"unit\":\"day\",\"duration\":1}}',1669382714,0,0),
(8,1,1169443776,'10c22163-5990-4c6a-b240-0cc6eebc012d',1669382714,0,0),
(9,1,1169443776,'Success make payments, waiting payment from user if still pending',1669382821,0,0),
(10,1,518345373,'{\"transaction_details\":{\"order_id\":518345373,\"gross_amount\":\"150000\"},\"item_details\":{\"id\":\"2\",\"price\":\"150000\",\"quantity\":1,\"name\":\"Registration FEE (Early Bid)\"},\"customer_details\":{\"first_name\":\"MAHENDRA\",\"last_name\":\"PURWANTO\",\"email\":\"mahendradwipurwanto@gmail.com\",\"phone\":\"\",\"billing_address\":{\"first_name\":\"MAHENDRA\",\"last_name\":\"PURWANTO\",\"phone\":\"\",\"country_code\":\"IDN\"},\"shipping_address\":{\"first_name\":\"MAHENDRA\",\"last_name\":\"PURWANTO\",\"phone\":\"\",\"country_code\":\"IDN\"}},\"credit_card\":{\"secure\":true},\"expiry\":{\"start_time\":\"2022-11-26 13:07:56 +0700\",\"unit\":\"day\",\"duration\":1}}',1669442876,0,0),
(11,1,518345373,'8114c263-8e03-4759-9623-46f0b8671b21',1669442876,0,0),
(12,1,518345373,'Success make payments, waiting payment from user if still pending',1669442888,0,0),
(13,1,1659325082,'{\"transaction_details\":{\"order_id\":1659325082,\"gross_amount\":\"150000\"},\"item_details\":{\"id\":\"2\",\"price\":\"150000\",\"quantity\":1,\"name\":\"Registration FEE (Early Bid)\"},\"customer_details\":{\"first_name\":\"MAHENDRA\",\"last_name\":\"PURWANTO\",\"email\":\"mahendradwipurwanto@gmail.com\",\"phone\":\"\",\"billing_address\":{\"first_name\":\"MAHENDRA\",\"last_name\":\"PURWANTO\",\"phone\":\"\",\"country_code\":\"IDN\"},\"shipping_address\":{\"first_name\":\"MAHENDRA\",\"last_name\":\"PURWANTO\",\"phone\":\"\",\"country_code\":\"IDN\"}},\"credit_card\":{\"secure\":true},\"expiry\":{\"start_time\":\"2022-11-26 13:16:39 +0700\",\"unit\":\"day\",\"duration\":1}}',1669443399,0,0),
(14,1,1659325082,'aae5489d-48a9-4f13-9a30-6494d67c597d',1669443399,0,0),
(15,1,1659325082,'Success make payments, waiting payment from user if still pending',1669443409,0,0),
(16,1,1702367390,'{\"transaction_details\":{\"order_id\":1702367390,\"gross_amount\":\"150000\"},\"item_details\":{\"id\":\"2\",\"price\":\"150000\",\"quantity\":1,\"name\":\"Registration FEE (Early Bid)\"},\"customer_details\":{\"first_name\":\"MAHENDRA\",\"last_name\":\"PURWANTO\",\"email\":\"mahendradwipurwanto@gmail.com\",\"phone\":\"\",\"billing_address\":{\"first_name\":\"MAHENDRA\",\"last_name\":\"PURWANTO\",\"phone\":\"\",\"country_code\":\"IDN\"},\"shipping_address\":{\"first_name\":\"MAHENDRA\",\"last_name\":\"PURWANTO\",\"phone\":\"\",\"country_code\":\"IDN\"}},\"credit_card\":{\"secure\":true},\"expiry\":{\"start_time\":\"2022-11-26 13:17:08 +0700\",\"unit\":\"day\",\"duration\":1}}',1669443428,0,0),
(17,1,1702367390,'db7d84c4-450e-4149-9996-80f0f69668ea',1669443428,0,0),
(18,1,2029241541,'{\"transaction_details\":{\"order_id\":2029241541,\"gross_amount\":\"150000\"},\"item_details\":{\"id\":\"2\",\"price\":\"150000\",\"quantity\":1,\"name\":\"Registration FEE (Early Bid)\"},\"customer_details\":{\"first_name\":\"MAHENDRA\",\"last_name\":\"PURWANTO\",\"email\":\"mahendradwipurwanto@gmail.com\",\"phone\":\"\",\"billing_address\":{\"first_name\":\"MAHENDRA\",\"last_name\":\"PURWANTO\",\"phone\":\"\",\"country_code\":\"IDN\"},\"shipping_address\":{\"first_name\":\"MAHENDRA\",\"last_name\":\"PURWANTO\",\"phone\":\"\",\"country_code\":\"IDN\"}},\"credit_card\":{\"secure\":true},\"expiry\":{\"start_time\":\"2022-11-26 13:17:34 +0700\",\"unit\":\"day\",\"duration\":1}}',1669443454,0,0),
(19,1,2029241541,'616524c1-a6b0-422e-bfe8-08d138445960',1669443455,0,0),
(20,1,1799196683,'{\"transaction_details\":{\"order_id\":1799196683,\"gross_amount\":\"150000\"},\"item_details\":{\"id\":\"2\",\"price\":\"150000\",\"quantity\":1,\"name\":\"Registration FEE (Early Bid)\"},\"customer_details\":{\"first_name\":\"MAHENDRA\",\"last_name\":\"PURWANTO\",\"email\":\"mahendradwipurwanto@gmail.com\",\"phone\":\"\",\"billing_address\":{\"first_name\":\"MAHENDRA\",\"last_name\":\"PURWANTO\",\"phone\":\"\",\"country_code\":\"IDN\"},\"shipping_address\":{\"first_name\":\"MAHENDRA\",\"last_name\":\"PURWANTO\",\"phone\":\"\",\"country_code\":\"IDN\"}},\"credit_card\":{\"secure\":true},\"expiry\":{\"start_time\":\"2022-11-26 13:20:07 +0700\",\"unit\":\"day\",\"duration\":1}}',1669443607,0,0),
(21,1,1799196683,'751830bc-23d8-4f71-9808-f3370798f2e5',1669443607,0,0),
(22,1,765835469,'{\"transaction_details\":{\"order_id\":765835469,\"gross_amount\":\"150000\"},\"item_details\":{\"id\":\"2\",\"price\":\"150000\",\"quantity\":1,\"name\":\"Registration FEE (Early Bid)\"},\"customer_details\":{\"first_name\":\"MAHENDRA\",\"last_name\":\"PURWANTO\",\"email\":\"mahendradwipurwanto@gmail.com\",\"phone\":\"\",\"billing_address\":{\"first_name\":\"MAHENDRA\",\"last_name\":\"PURWANTO\",\"phone\":\"\",\"country_code\":\"IDN\"},\"shipping_address\":{\"first_name\":\"MAHENDRA\",\"last_name\":\"PURWANTO\",\"phone\":\"\",\"country_code\":\"IDN\"}},\"credit_card\":{\"secure\":true},\"expiry\":{\"start_time\":\"2022-11-26 13:20:23 +0700\",\"unit\":\"day\",\"duration\":1}}',1669443623,0,0),
(23,1,765835469,'a4d910ef-017d-4a26-9c39-d9d42770142d',1669443623,0,0),
(24,1,2027464122,'{\"transaction_details\":{\"order_id\":2027464122,\"gross_amount\":\"150000\"},\"item_details\":{\"id\":\"2\",\"price\":\"150000\",\"quantity\":1,\"name\":\"Registration FEE (Early Bid)\"},\"customer_details\":{\"first_name\":\"MAHENDRA\",\"last_name\":\"PURWANTO\",\"email\":\"mahendradwipurwanto@gmail.com\",\"phone\":\"\",\"billing_address\":{\"first_name\":\"MAHENDRA\",\"last_name\":\"PURWANTO\",\"phone\":\"\",\"country_code\":\"IDN\"},\"shipping_address\":{\"first_name\":\"MAHENDRA\",\"last_name\":\"PURWANTO\",\"phone\":\"\",\"country_code\":\"IDN\"}},\"credit_card\":{\"secure\":true},\"expiry\":{\"start_time\":\"2022-11-26 13:21:14 +0700\",\"unit\":\"day\",\"duration\":1}}',1669443674,0,0),
(25,1,2027464122,'94cae147-885d-4935-a4b1-fd591075b40a',1669443675,0,0),
(26,1,633328671,'{\"transaction_details\":{\"order_id\":633328671,\"gross_amount\":\"150000\"},\"item_details\":{\"id\":\"2\",\"price\":\"150000\",\"quantity\":1,\"name\":\"Registration FEE (Early Bid)\"},\"customer_details\":{\"first_name\":\"MAHENDRA\",\"last_name\":\"PURWANTO\",\"email\":\"mahendradwipurwanto@gmail.com\",\"phone\":\"\",\"billing_address\":{\"first_name\":\"MAHENDRA\",\"last_name\":\"PURWANTO\",\"phone\":\"\",\"country_code\":\"IDN\"},\"shipping_address\":{\"first_name\":\"MAHENDRA\",\"last_name\":\"PURWANTO\",\"phone\":\"\",\"country_code\":\"IDN\"}},\"credit_card\":{\"secure\":true},\"expiry\":{\"start_time\":\"2022-11-26 13:21:32 +0700\",\"unit\":\"day\",\"duration\":1}}',1669443692,0,0),
(27,1,633328671,'a1fd9a04-9c1d-47dc-a466-d01abf6a2550',1669443692,0,0),
(28,1,633328671,'Success make payments, waiting payment from user if still pending',1669443706,0,0),
(29,1,1877204733,'{\"transaction_details\":{\"order_id\":1877204733,\"gross_amount\":\"150000\"},\"item_details\":{\"id\":\"2\",\"price\":\"150000\",\"quantity\":1,\"name\":\"Registration FEE (Early Bid)\"},\"customer_details\":{\"first_name\":\"MAHENDRA\",\"last_name\":\"PURWANTO\",\"email\":\"mahendradwipurwanto@gmail.com\",\"phone\":\"\",\"billing_address\":{\"first_name\":\"MAHENDRA\",\"last_name\":\"PURWANTO\",\"phone\":\"\",\"country_code\":\"IDN\"},\"shipping_address\":{\"first_name\":\"MAHENDRA\",\"last_name\":\"PURWANTO\",\"phone\":\"\",\"country_code\":\"IDN\"}},\"credit_card\":{\"secure\":true},\"expiry\":{\"start_time\":\"2022-11-26 13:30:06 +0700\",\"unit\":\"day\",\"duration\":1}}',1669444206,0,0),
(30,1,1877204733,'c79dcea9-a30e-4698-bc5b-61f59c9c2d57',1669444207,0,0),
(31,1,1877204733,'Success make payments, waiting payment from user if still pending',1669444212,0,0);

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;
