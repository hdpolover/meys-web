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

/*Table structure for table `m_countries` */

DROP TABLE IF EXISTS `m_countries`;

CREATE TABLE `m_countries` (
  `num_code` int(3) NOT NULL DEFAULT 0,
  `alpha_2_code` varchar(2) DEFAULT NULL,
  `alpha_3_code` varchar(3) DEFAULT NULL,
  `en_short_name` varchar(52) DEFAULT NULL,
  `nationality` varchar(39) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

/*Data for the table `m_countries` */

insert  into `m_countries`(`num_code`,`alpha_2_code`,`alpha_3_code`,`en_short_name`,`nationality`) values 
(4,'AF','AFG','Afghanistan','Afghan'),
(8,'AL','ALB','Albania','Albanian'),
(10,'AQ','ATA','Antarctica','Antarctic'),
(12,'DZ','DZA','Algeria','Algerian'),
(16,'AS','ASM','American Samoa','American Samoan'),
(20,'AD','AND','Andorra','Andorran'),
(24,'AO','AGO','Angola','Angolan'),
(28,'AG','ATG','Antigua and Barbuda','Antiguan or Barbudan'),
(31,'AZ','AZE','Azerbaijan','Azerbaijani, Azeri'),
(32,'AR','ARG','Argentina','Argentine'),
(36,'AU','AUS','Australia','Australian'),
(40,'AT','AUT','Austria','Austrian'),
(44,'BS','BHS','Bahamas','Bahamian'),
(48,'BH','BHR','Bahrain','Bahraini'),
(50,'BD','BGD','Bangladesh','Bangladeshi'),
(51,'AM','ARM','Armenia','Armenian'),
(52,'BB','BRB','Barbados','Barbadian'),
(56,'BE','BEL','Belgium','Belgian'),
(60,'BM','BMU','Bermuda','Bermudian, Bermudan'),
(64,'BT','BTN','Bhutan','Bhutanese'),
(68,'BO','BOL','Bolivia (Plurinational State of)','Bolivian'),
(70,'BA','BIH','Bosnia and Herzegovina','Bosnian or Herzegovinian'),
(72,'BW','BWA','Botswana','Motswana, Botswanan'),
(74,'BV','BVT','Bouvet Island','Bouvet Island'),
(76,'BR','BRA','Brazil','Brazilian'),
(84,'BZ','BLZ','Belize','Belizean'),
(86,'IO','IOT','British Indian Ocean Territory','BIOT'),
(90,'SB','SLB','Solomon Islands','Solomon Island'),
(92,'VG','VGB','Virgin Islands (British)','British Virgin Island'),
(96,'BN','BRN','Brunei Darussalam','Bruneian'),
(100,'BG','BGR','Bulgaria','Bulgarian'),
(104,'MM','MMR','Myanmar','Burmese'),
(108,'BI','BDI','Burundi','Burundian'),
(112,'BY','BLR','Belarus','Belarusian'),
(116,'KH','KHM','Cambodia','Cambodian'),
(120,'CM','CMR','Cameroon','Cameroonian'),
(124,'CA','CAN','Canada','Canadian'),
(132,'CV','CPV','Cabo Verde','Cabo Verdean'),
(136,'KY','CYM','Cayman Islands','Caymanian'),
(140,'CF','CAF','Central African Republic','Central African'),
(144,'LK','LKA','Sri Lanka','Sri Lankan'),
(148,'TD','TCD','Chad','Chadian'),
(152,'CL','CHL','Chile','Chilean'),
(156,'CN','CHN','China','Chinese'),
(158,'TW','TWN','Taiwan, Province of China','Chinese, Taiwanese'),
(162,'CX','CXR','Christmas Island','Christmas Island'),
(166,'CC','CCK','Cocos (Keeling) Islands','Cocos Island'),
(170,'CO','COL','Colombia','Colombian'),
(174,'KM','COM','Comoros','Comoran, Comorian'),
(175,'YT','MYT','Mayotte','Mahoran'),
(178,'CG','COG','Congo (Republic of the)','Congolese'),
(180,'CD','COD','Congo (Democratic Republic of the)','Congolese'),
(184,'CK','COK','Cook Islands','Cook Island'),
(188,'CR','CRI','Costa Rica','Costa Rican'),
(191,'HR','HRV','Croatia','Croatian'),
(192,'CU','CUB','Cuba','Cuban'),
(196,'CY','CYP','Cyprus','Cypriot'),
(203,'CZ','CZE','Czech Republic','Czech'),
(204,'BJ','BEN','Benin','Beninese, Beninois'),
(208,'DK','DNK','Denmark','Danish'),
(212,'DM','DMA','Dominica','Dominican'),
(214,'DO','DOM','Dominican Republic','Dominican'),
(218,'EC','ECU','Ecuador','Ecuadorian'),
(222,'SV','SLV','El Salvador','Salvadoran'),
(226,'GQ','GNQ','Equatorial Guinea','Equatorial Guinean, Equatoguinean'),
(231,'ET','ETH','Ethiopia','Ethiopian'),
(232,'ER','ERI','Eritrea','Eritrean'),
(233,'EE','EST','Estonia','Estonian'),
(234,'FO','FRO','Faroe Islands','Faroese'),
(238,'FK','FLK','Falkland Islands (Malvinas)','Falkland Island'),
(239,'GS','SGS','South Georgia and the South Sandwich Islands','South Georgia or South Sandwich Islands'),
(242,'FJ','FJI','Fiji','Fijian'),
(246,'FI','FIN','Finland','Finnish'),
(248,'AX','ALA','ÃƒÆ’Ã†â€™ÃƒÂ¢Ã¢â€šÂ¬Ã‚Â¦land Islands','ÃƒÆ’Ã†â€™ÃƒÂ¢Ã¢â€šÂ¬Ã‚Â¦land Island'),
(250,'FR','FRA','France','French'),
(254,'GF','GUF','French Guiana','French Guianese'),
(258,'PF','PYF','French Polynesia','French Polynesian'),
(260,'TF','ATF','French Southern Territories','French Southern Territories'),
(262,'DJ','DJI','Djibouti','Djiboutian'),
(266,'GA','GAB','Gabon','Gabonese'),
(268,'GE','GEO','Georgia','Georgian'),
(270,'GM','GMB','Gambia','Gambian'),
(275,'PS','PSE','Palestine, State of','Palestinian'),
(276,'DE','DEU','Germany','German'),
(288,'GH','GHA','Ghana','Ghanaian'),
(292,'GI','GIB','Gibraltar','Gibraltar'),
(296,'KI','KIR','Kiribati','I-Kiribati'),
(300,'GR','GRC','Greece','Greek, Hellenic'),
(304,'GL','GRL','Greenland','Greenlandic'),
(308,'GD','GRD','Grenada','Grenadian'),
(312,'GP','GLP','Guadeloupe','Guadeloupe'),
(316,'GU','GUM','Guam','Guamanian, Guambat'),
(320,'GT','GTM','Guatemala','Guatemalan'),
(324,'GN','GIN','Guinea','Guinean'),
(328,'GY','GUY','Guyana','Guyanese'),
(332,'HT','HTI','Haiti','Haitian'),
(334,'HM','HMD','Heard Island and McDonald Islands','Heard Island or McDonald Islands'),
(336,'VA','VAT','Vatican City State','Vatican'),
(340,'HN','HND','Honduras','Honduran'),
(344,'HK','HKG','Hong Kong','Hong Kong, Hong Kongese'),
(348,'HU','HUN','Hungary','Hungarian, Magyar'),
(352,'IS','ISL','Iceland','Icelandic'),
(356,'IN','IND','India','Indian'),
(360,'ID','IDN','Indonesia','Indonesian'),
(364,'IR','IRN','Iran','Iranian, Persian'),
(368,'IQ','IRQ','Iraq','Iraqi'),
(372,'IE','IRL','Ireland','Irish'),
(376,'IL','ISR','Israel','Israeli'),
(380,'IT','ITA','Italy','Italian'),
(384,'CI','CIV','CÃƒÆ’Ã†â€™Ãƒâ€šÃ‚Â´te d\'Ivoire','Ivorian'),
(388,'JM','JAM','Jamaica','Jamaican'),
(392,'JP','JPN','Japan','Japanese'),
(398,'KZ','KAZ','Kazakhstan','Kazakhstani, Kazakh'),
(400,'JO','JOR','Jordan','Jordanian'),
(404,'KE','KEN','Kenya','Kenyan'),
(408,'KP','PRK','Korea (Democratic People\'s Republic of)','North Korean'),
(410,'KR','KOR','Korea (Republic of)','South Korean'),
(414,'KW','KWT','Kuwait','Kuwaiti'),
(417,'KG','KGZ','Kyrgyzstan','Kyrgyzstani, Kyrgyz, Kirgiz, Kirghiz'),
(418,'LA','LAO','Lao People\'s Democratic Republic','Lao, Laotian'),
(422,'LB','LBN','Lebanon','Lebanese'),
(426,'LS','LSO','Lesotho','Basotho'),
(428,'LV','LVA','Latvia','Latvian'),
(430,'LR','LBR','Liberia','Liberian'),
(434,'LY','LBY','Libya','Libyan'),
(438,'LI','LIE','Liechtenstein','Liechtenstein'),
(440,'LT','LTU','Lithuania','Lithuanian'),
(442,'LU','LUX','Luxembourg','Luxembourg, Luxembourgish'),
(446,'MO','MAC','Macao','Macanese, Chinese'),
(450,'MG','MDG','Madagascar','Malagasy'),
(454,'MW','MWI','Malawi','Malawian'),
(458,'MY','MYS','Malaysia','Malaysian'),
(462,'MV','MDV','Maldives','Maldivian'),
(466,'ML','MLI','Mali','Malian, Malinese'),
(470,'MT','MLT','Malta','Maltese'),
(474,'MQ','MTQ','Martinique','Martiniquais, Martinican'),
(478,'MR','MRT','Mauritania','Mauritanian'),
(480,'MU','MUS','Mauritius','Mauritian'),
(484,'MX','MEX','Mexico','Mexican'),
(492,'MC','MCO','Monaco','MonÃƒÆ’Ã†â€™Ãƒâ€šÃ‚Â©gasque, Monacan'),
(496,'MN','MNG','Mongolia','Mongolian'),
(498,'MD','MDA','Moldova (Republic of)','Moldovan'),
(499,'ME','MNE','Montenegro','Montenegrin'),
(500,'MS','MSR','Montserrat','Montserratian'),
(504,'MA','MAR','Morocco','Moroccan'),
(508,'MZ','MOZ','Mozambique','Mozambican'),
(512,'OM','OMN','Oman','Omani'),
(516,'NA','NAM','Namibia','Namibian'),
(520,'NR','NRU','Nauru','Nauruan'),
(524,'NP','NPL','Nepal','Nepali, Nepalese'),
(528,'NL','NLD','Netherlands','Dutch, Netherlandic'),
(531,'CW','CUW','CuraÃƒÆ’Ã†â€™Ãƒâ€šÃ‚Â§ao','CuraÃƒÆ’Ã†â€™Ãƒâ€šÃ‚Â§aoan'),
(533,'AW','ABW','Aruba','Aruban'),
(534,'SX','SXM','Sint Maarten (Dutch part)','Sint Maarten'),
(535,'BQ','BES','Bonaire, Sint Eustatius and Saba','Bonaire'),
(540,'NC','NCL','New Caledonia','New Caledonian'),
(548,'VU','VUT','Vanuatu','Ni-Vanuatu, Vanuatuan'),
(554,'NZ','NZL','New Zealand','New Zealand, NZ'),
(558,'NI','NIC','Nicaragua','Nicaraguan'),
(562,'NE','NER','Niger','Nigerien'),
(566,'NG','NGA','Nigeria','Nigerian'),
(570,'NU','NIU','Niue','Niuean'),
(574,'NF','NFK','Norfolk Island','Norfolk Island'),
(578,'NO','NOR','Norway','Norwegian'),
(580,'MP','MNP','Northern Mariana Islands','Northern Marianan'),
(581,'UM','UMI','United States Minor Outlying Islands','American'),
(583,'FM','FSM','Micronesia (Federated States of)','Micronesian'),
(584,'MH','MHL','Marshall Islands','Marshallese'),
(585,'PW','PLW','Palau','Palauan'),
(586,'PK','PAK','Pakistan','Pakistani'),
(591,'PA','PAN','Panama','Panamanian'),
(598,'PG','PNG','Papua New Guinea','Papua New Guinean, Papuan'),
(600,'PY','PRY','Paraguay','Paraguayan'),
(604,'PE','PER','Peru','Peruvian'),
(608,'PH','PHL','Philippines','Philippine, Filipino'),
(612,'PN','PCN','Pitcairn','Pitcairn Island'),
(616,'PL','POL','Poland','Polish'),
(620,'PT','PRT','Portugal','Portuguese'),
(624,'GW','GNB','Guinea-Bissau','Bissau-Guinean'),
(626,'TL','TLS','Timor-Leste','Timorese'),
(630,'PR','PRI','Puerto Rico','Puerto Rican'),
(634,'QA','QAT','Qatar','Qatari'),
(638,'RE','REU','RÃƒÆ’Ã†â€™Ãƒâ€šÃ‚Â©union','RÃƒÆ’Ã†â€™Ãƒâ€šÃ‚Â©unionese, RÃƒÆ’Ã†â€™'),
(642,'RO','ROU','Romania','Romanian'),
(643,'RU','RUS','Russian Federation','Russian'),
(646,'RW','RWA','Rwanda','Rwandan'),
(652,'BL','BLM','Saint BarthÃƒÆ’Ã†â€™Ãƒâ€šÃ‚Â©lemy','BarthÃƒÆ’Ã†â€™Ãƒâ€šÃ‚Â©lemois'),
(654,'SH','SHN','Saint Helena, Ascension and Tristan da Cunha','Saint Helenian'),
(659,'KN','KNA','Saint Kitts and Nevis','Kittitian or Nevisian'),
(660,'AI','AIA','Anguilla','Anguillan'),
(662,'LC','LCA','Saint Lucia','Saint Lucian'),
(663,'MF','MAF','Saint Martin (French part)','Saint-Martinoise'),
(666,'PM','SPM','Saint Pierre and Miquelon','Saint-Pierrais or Miquelonnais'),
(670,'VC','VCT','Saint Vincent and the Grenadines','Saint Vincentian, Vincentian'),
(674,'SM','SMR','San Marino','Sammarinese'),
(678,'ST','STP','Sao Tome and Principe','SÃƒÆ’Ã†â€™Ãƒâ€šÃ‚Â£o TomÃƒÆ’Ã†â€™Ãƒâ€šÃ'),
(682,'SA','SAU','Saudi Arabia','Saudi, Saudi Arabian'),
(686,'SN','SEN','Senegal','Senegalese'),
(688,'RS','SRB','Serbia','Serbian'),
(690,'SC','SYC','Seychelles','Seychellois'),
(694,'SL','SLE','Sierra Leone','Sierra Leonean'),
(702,'SG','SGP','Singapore','Singaporean'),
(703,'SK','SVK','Slovakia','Slovak'),
(704,'VN','VNM','Vietnam','Vietnamese'),
(705,'SI','SVN','Slovenia','Slovenian, Slovene'),
(706,'SO','SOM','Somalia','Somali, Somalian'),
(710,'ZA','ZAF','South Africa','South African'),
(716,'ZW','ZWE','Zimbabwe','Zimbabwean'),
(724,'ES','ESP','Spain','Spanish'),
(728,'SS','SSD','South Sudan','South Sudanese'),
(729,'SD','SDN','Sudan','Sudanese'),
(732,'EH','ESH','Western Sahara','Sahrawi, Sahrawian, Sahraouian'),
(740,'SR','SUR','Suriname','Surinamese'),
(744,'SJ','SJM','Svalbard and Jan Mayen','Svalbard'),
(748,'SZ','SWZ','Swaziland','Swazi'),
(752,'SE','SWE','Sweden','Swedish'),
(756,'CH','CHE','Switzerland','Swiss'),
(760,'SY','SYR','Syrian Arab Republic','Syrian'),
(762,'TJ','TJK','Tajikistan','Tajikistani'),
(764,'TH','THA','Thailand','Thai'),
(768,'TG','TGO','Togo','Togolese'),
(772,'TK','TKL','Tokelau','Tokelauan'),
(776,'TO','TON','Tonga','Tongan'),
(780,'TT','TTO','Trinidad and Tobago','Trinidadian or Tobagonian'),
(784,'AE','ARE','United Arab Emirates','Emirati, Emirian, Emiri'),
(788,'TN','TUN','Tunisia','Tunisian'),
(792,'TR','TUR','Turkey','Turkish'),
(795,'TM','TKM','Turkmenistan','Turkmen'),
(796,'TC','TCA','Turks and Caicos Islands','Turks and Caicos Island'),
(798,'TV','TUV','Tuvalu','Tuvaluan'),
(800,'UG','UGA','Uganda','Ugandan'),
(804,'UA','UKR','Ukraine','Ukrainian'),
(807,'MK','MKD','Macedonia (the former Yugoslav Republic of)','Macedonian'),
(818,'EG','EGY','Egypt','Egyptian'),
(826,'GB','GBR','United Kingdom of Great Britain and Northern Ireland','British, UK'),
(831,'GG','GGY','Guernsey','Channel Island'),
(832,'JE','JEY','Jersey','Channel Island'),
(833,'IM','IMN','Isle of Man','Manx'),
(834,'TZ','TZA','Tanzania, United Republic of','Tanzanian'),
(840,'US','USA','United States of America','American'),
(850,'VI','VIR','Virgin Islands (U.S.)','U.S. Virgin Island'),
(854,'BF','BFA','Burkina Faso','BurkinabÃƒÆ’Ã†â€™Ãƒâ€šÃ‚Â©'),
(858,'UY','URY','Uruguay','Uruguayan'),
(860,'UZ','UZB','Uzbekistan','Uzbekistani, Uzbek'),
(862,'VE','VEN','Venezuela (Bolivarian Republic of)','Venezuelan'),
(876,'WF','WLF','Wallis and Futuna','Wallis and Futuna, Wallisian or Futunan'),
(882,'WS','WSM','Samoa','Samoan'),
(887,'YE','YEM','Yemen','Yemeni'),
(894,'ZM','ZMB','Zambia','Zambian');

/*Table structure for table `m_essay` */

DROP TABLE IF EXISTS `m_essay`;

CREATE TABLE `m_essay` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `summit_id` int(11) NOT NULL DEFAULT 0,
  `question` text DEFAULT NULL,
  `type` varchar(255) NOT NULL DEFAULT 'textarea',
  `desc` text DEFAULT NULL,
  `required` tinyint(1) NOT NULL DEFAULT 1,
  `created_at` int(11) NOT NULL DEFAULT 0,
  `created_by` varchar(15) NOT NULL DEFAULT '0',
  `modified_at` int(11) NOT NULL DEFAULT 0,
  `modified_by` varchar(15) NOT NULL DEFAULT '0',
  `is_deleted` tinyint(1) NOT NULL DEFAULT 0,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=utf8;

/*Data for the table `m_essay` */

insert  into `m_essay`(`id`,`summit_id`,`question`,`type`,`desc`,`required`,`created_at`,`created_by`,`modified_at`,`modified_by`,`is_deleted`) values 
(1,0,'In your view, what are the main problems of the world\'s Muslim community today? why?','textarea',NULL,1,0,'0',0,'0',0),
(2,0,'What o you think is the solution to the problem?','textarea',NULL,1,0,'0',0,'0',0),
(3,0,'What have you done to empower the Muslim community around you?','textarea',NULL,1,0,'0',0,'0',0);

/*Table structure for table `tb_ambassador` */

DROP TABLE IF EXISTS `tb_ambassador`;

CREATE TABLE `tb_ambassador` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `fullname` varchar(50) DEFAULT NULL,
  `referral_code` varchar(50) NOT NULL DEFAULT '0',
  `photo` varchar(255) DEFAULT NULL,
  `email` varchar(50) DEFAULT NULL,
  `address` text DEFAULT NULL,
  `whatsapp_number` varchar(20) DEFAULT NULL,
  `nationality` varchar(50) DEFAULT NULL,
  `instagram` varchar(255) DEFAULT NULL,
  `tiktok` varchar(255) DEFAULT NULL,
  `institution` varchar(255) DEFAULT NULL,
  `occupation` varchar(255) DEFAULT NULL,
  `status` int(5) NOT NULL DEFAULT 1,
  `created_at` int(11) NOT NULL DEFAULT 0,
  `created_by` varchar(255) NOT NULL DEFAULT '0',
  `modified_at` int(11) NOT NULL DEFAULT 0,
  `modified_by` varchar(255) NOT NULL DEFAULT '0',
  `is_deleted` tinyint(1) NOT NULL DEFAULT 0,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8;

/*Data for the table `tb_ambassador` */

insert  into `tb_ambassador`(`id`,`fullname`,`referral_code`,`photo`,`email`,`address`,`whatsapp_number`,`nationality`,`instagram`,`tiktok`,`institution`,`occupation`,`status`,`created_at`,`created_by`,`modified_at`,`modified_by`,`is_deleted`) values 
(1,'Ngodingin','N04 Code',NULL,'ngodingin.indonesia@gmail.com','','085785111746','4','ngodingin.indonesia','ngodingin.indonesia','Ngodingin','Founder',1,0,'0',1667279549,'USER-ADM-01',0),
(2,'Mahendra Dwi Purwanto','MAH001',NULL,'mahendradwipurwanto@gmail.com','','085785111746','360','mahendradwipurwanto','mahendradwipurwanto','STIKI MALANG','Founder',1,1667278465,'USER-ADM-01',1667279542,'USER-ADM-01',1);

/*Table structure for table `tb_participants` */

DROP TABLE IF EXISTS `tb_participants`;

CREATE TABLE `tb_participants` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `user_id` varchar(15) DEFAULT '0',
  `summit_id` int(11) DEFAULT 0,
  `referral_code` varchar(50) NOT NULL DEFAULT '0',
  `step` int(5) DEFAULT 1,
  `self_photo` varchar(255) DEFAULT NULL,
  `birthdate` int(11) DEFAULT NULL,
  `address` text DEFAULT NULL,
  `postal_code` varchar(20) DEFAULT NULL,
  `city` varchar(100) DEFAULT NULL,
  `province` varchar(100) DEFAULT NULL,
  `nationality` varchar(255) DEFAULT NULL,
  `occupation` varchar(150) DEFAULT NULL,
  `field_of_study` varchar(150) DEFAULT NULL,
  `institution_workplace` varchar(150) DEFAULT NULL,
  `whatsapp_number` varchar(18) DEFAULT NULL,
  `instagram` varchar(100) DEFAULT NULL,
  `emergency_contact` varchar(255) DEFAULT NULL,
  `contact_relation` varchar(255) DEFAULT NULL,
  `disease_history` text DEFAULT NULL,
  `tshirt_size` varchar(8) DEFAULT NULL,
  `experience` text DEFAULT NULL,
  `achievements` text DEFAULT NULL,
  `social_projects` text DEFAULT NULL,
  `talents` text DEFAULT NULL,
  `source` varchar(255) DEFAULT NULL,
  `source_account` varchar(255) DEFAULT NULL,
  `twibbon_link` varchar(255) DEFAULT NULL,
  `share_proof_link` varchar(255) DEFAULT NULL,
  `terms_condition` tinyint(1) NOT NULL DEFAULT 0,
  `is_payment` tinyint(1) NOT NULL DEFAULT 0,
  `status` int(5) NOT NULL DEFAULT 0,
  `created_by` varchar(15) NOT NULL DEFAULT '0',
  `created_at` int(11) NOT NULL DEFAULT 0,
  `modified_by` varchar(15) NOT NULL DEFAULT '0',
  `modified_at` int(11) NOT NULL DEFAULT 0,
  `is_deleted` tinyint(1) NOT NULL DEFAULT 0,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8mb4;

/*Data for the table `tb_participants` */

insert  into `tb_participants`(`id`,`user_id`,`summit_id`,`referral_code`,`step`,`self_photo`,`birthdate`,`address`,`postal_code`,`city`,`province`,`nationality`,`occupation`,`field_of_study`,`institution_workplace`,`whatsapp_number`,`instagram`,`emergency_contact`,`contact_relation`,`disease_history`,`tshirt_size`,`experience`,`achievements`,`social_projects`,`talents`,`source`,`source_account`,`twibbon_link`,`share_proof_link`,`terms_condition`,`is_payment`,`status`,`created_by`,`created_at`,`modified_by`,`modified_at`,`is_deleted`) values 
(1,'USR-MHNDR-ff76c',0,'N04',5,'berkas/user/participans/636094c630f45.jpeg',1667257200,'Singosari','65153','Malang','Jawa Timur','360','Student','Computer','STIKI','857851117465','mahendradwipurwanto','Ajeng','Wifee','                   -','L','TEST','TESTT','TESTTT','TESTTTT','Instagram','mahendradwipurwanto','http://localhost/front/documentation/step-forms.html','http://localhost/front/documentation/step-forms.html',0,0,0,'USR-MHNDR-ff76c',1667270495,'USR-MHNDR-ff76c',1667273926,0);

/*Table structure for table `tb_participants_essay` */

DROP TABLE IF EXISTS `tb_participants_essay`;

CREATE TABLE `tb_participants_essay` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `participans_id` int(11) NOT NULL DEFAULT 0,
  `user_id` varchar(15) NOT NULL DEFAULT '0',
  `m_essay_id` int(11) NOT NULL DEFAULT 0,
  `m_question` text DEFAULT NULL,
  `answer` text DEFAULT NULL,
  `is_deleted` tinyint(1) NOT NULL DEFAULT 0,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=19 DEFAULT CHARSET=utf8;

/*Data for the table `tb_participants_essay` */

insert  into `tb_participants_essay`(`id`,`participans_id`,`user_id`,`m_essay_id`,`m_question`,`answer`,`is_deleted`) values 
(13,1,'USR-MHNDR-ff76c',1,'What have you done to empower the Muslim community around you?','Still good',0),
(14,1,'USR-MHNDR-ff76c',2,'What have you done to empower the Muslim community around you?','Nothing',0),
(15,1,'USR-MHNDR-ff76c',3,'What have you done to empower the Muslim community around you?','Nope',0);

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;
