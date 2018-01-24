/*
SQLyog Enterprise - MySQL GUI v8.18 
MySQL - 5.6.16-log : Database - purmusic_mudi
*********************************************************************
*/

/*!40101 SET NAMES utf8 */;

/*!40101 SET SQL_MODE=''*/;

/*!40014 SET @OLD_UNIQUE_CHECKS=@@UNIQUE_CHECKS, UNIQUE_CHECKS=0 */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;
/*!40111 SET @OLD_SQL_NOTES=@@SQL_NOTES, SQL_NOTES=0 */;
CREATE DATABASE /*!32312 IF NOT EXISTS*/`purmusic_mudi` /*!40100 DEFAULT CHARACTER SET utf8 COLLATE utf8_bin */;

USE `purmusic_mudi`;

/*Table structure for table `bands` */

DROP TABLE IF EXISTS `bands`;

CREATE TABLE `bands` (
  `band_id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `ref_user_id` smallint(5) unsigned NOT NULL,
  `band_name` varchar(100) DEFAULT NULL,
  `band_lead_name` varchar(100) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `band_logo` varchar(255) DEFAULT NULL,
  PRIMARY KEY (`band_id`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=latin1;

/*Data for the table `bands` */

insert  into `bands`(`band_id`,`ref_user_id`,`band_name`,`band_lead_name`,`created_at`,`updated_at`,`band_logo`) values (1,46,'ThirdEye','Siddiqui Noor','2015-10-06 07:11:18','2015-10-06 07:11:31',NULL),(2,47,'Saheb','Ali','2015-10-06 07:19:57','2015-10-06 07:20:37','upload/14441160159964.jpg');

/*Table structure for table `devices` */

DROP TABLE IF EXISTS `devices`;

CREATE TABLE `devices` (
  `device_id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `ref_band_id` int(10) unsigned DEFAULT NULL,
  `parent_id` int(10) unsigned DEFAULT NULL,
  `device_hardware_id` int(10) unsigned DEFAULT NULL,
  `current_status` tinyint(1) unsigned DEFAULT '0' COMMENT '1=active , 2=deleted',
  PRIMARY KEY (`device_id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

/*Data for the table `devices` */

/*Table structure for table `instrument_to_band` */

DROP TABLE IF EXISTS `instrument_to_band`;

CREATE TABLE `instrument_to_band` (
  `ref_band_id` int(10) unsigned DEFAULT NULL,
  `ref_instruments_id` int(10) unsigned DEFAULT NULL,
  `current_status` tinyint(1) unsigned DEFAULT '0' COMMENT '1=active , 2=deleted'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

/*Data for the table `instrument_to_band` */

/*Table structure for table `instruments` */

DROP TABLE IF EXISTS `instruments`;

CREATE TABLE `instruments` (
  `instruments_id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `instruments_name` varchar(100) DEFAULT NULL,
  `current_status` tinyint(1) unsigned DEFAULT '0' COMMENT '1=active , 2=deleted',
  PRIMARY KEY (`instruments_id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

/*Data for the table `instruments` */

/*Table structure for table `languages` */

DROP TABLE IF EXISTS `languages`;

CREATE TABLE `languages` (
  `language_id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(32) COLLATE utf8_bin NOT NULL DEFAULT '',
  `code` varchar(5) COLLATE utf8_bin NOT NULL,
  `locale` varchar(255) COLLATE utf8_bin NOT NULL,
  `image` varchar(64) COLLATE utf8_bin NOT NULL,
  `directory` varchar(32) COLLATE utf8_bin NOT NULL DEFAULT '',
  `filename` varchar(64) COLLATE utf8_bin NOT NULL DEFAULT '',
  `sort_order` int(3) NOT NULL DEFAULT '0',
  `current_status` tinyint(1) NOT NULL,
  PRIMARY KEY (`language_id`),
  KEY `name` (`name`)
) ENGINE=MyISAM AUTO_INCREMENT=3 DEFAULT CHARSET=utf8 COLLATE=utf8_bin;

/*Data for the table `languages` */

insert  into `languages`(`language_id`,`name`,`code`,`locale`,`image`,`directory`,`filename`,`sort_order`,`current_status`) values (1,'English','en','en_US.UTF-8,en_US,en-gb,english','en.png','english','english.php',1,1),(2,'Deutsch','de','de_DE.UTF-8,de_DE.UTF-8,de_DE,de_DE,de-de,deutsch','de.png','deutsch','deutsch.php',2,1);

/*Table structure for table `license_type` */

DROP TABLE IF EXISTS `license_type`;

CREATE TABLE `license_type` (
  `license_type_id` tinyint(3) unsigned NOT NULL AUTO_INCREMENT,
  `license_name` varchar(50) COLLATE utf8_bin NOT NULL,
  `validity` smallint(5) unsigned NOT NULL DEFAULT '1',
  `update_applicable_days` smallint(5) unsigned NOT NULL DEFAULT '1',
  `free_practice_total` smallint(5) unsigned DEFAULT NULL,
  `devices_allowed_total` tinyint(3) unsigned DEFAULT NULL,
  `current_status` tinyint(1) unsigned DEFAULT '0',
  PRIMARY KEY (`license_type_id`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=utf8 COLLATE=utf8_bin;

/*Data for the table `license_type` */

insert  into `license_type`(`license_type_id`,`license_name`,`validity`,`update_applicable_days`,`free_practice_total`,`devices_allowed_total`,`current_status`) values (1,'Free',30,30,10,10,1),(2,'Classic',360,360,0,30,1),(3,'Pro',720,720,0,60,1);

/*Table structure for table `licenses` */

DROP TABLE IF EXISTS `licenses`;

CREATE TABLE `licenses` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `ref_band_id` int(10) unsigned NOT NULL,
  `ref_license_type_id` tinyint(3) unsigned DEFAULT '0',
  `ref_band_key` varchar(100) DEFAULT NULL,
  `band_key` varchar(500) DEFAULT NULL,
  `install_date` timestamp NULL DEFAULT NULL,
  `expire_date` timestamp NULL DEFAULT NULL,
  `updates_applicable_until` timestamp NULL DEFAULT NULL COMMENT 'No date means update available whole lifetime',
  `free_practice_total` tinyint(3) unsigned DEFAULT NULL,
  `devices_allowed_total` tinyint(3) unsigned DEFAULT NULL COMMENT '0=means unlimited',
  `current_status` tinyint(1) unsigned DEFAULT '0' COMMENT '1=active , 2=deleted',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=latin1;

/*Data for the table `licenses` */

insert  into `licenses`(`id`,`ref_band_id`,`ref_license_type_id`,`ref_band_key`,`band_key`,`install_date`,`expire_date`,`updates_applicable_until`,`free_practice_total`,`devices_allowed_total`,`current_status`,`created_at`,`updated_at`) values (1,1,1,NULL,'EeKvVGjRccKVCXVFNGcAKDpC9wSf2wss','2015-10-06 00:00:00','2015-11-05 00:00:00',NULL,10,10,0,'2015-10-06 07:11:31','2015-10-06 07:11:31'),(2,2,2,'9br3ciF5Gim8qOZxL4uYuvnTfs0bLuZB','eyJpdiI6IjdKNWNWa2dXSnVJM29SRHl3cDN6VUE9PSIsInZhbHVlIjoieXRkWE8rNElXOFBvMm5MVGNTVTJuVjFabUN0NVpVb3g3OWJuRUo5ZWVzcHNSaVRUZkk3QUVSSGJsN0tzbFBjdiIsIm1hYyI6IjA3YjAyOTM2OTI1OWM1MDRjYzg2ZGQzYThmMzZlNzE5MjZjMGM4YmMzYWYzYTI3MDFmMDBhMTUxZjI5YWMyYWQifQ==','2015-10-19 00:00:00','2016-10-13 00:00:00',NULL,0,30,0,'2015-10-06 07:20:37','2015-10-19 10:51:12');

/*Table structure for table `menu` */

DROP TABLE IF EXISTS `menu`;

CREATE TABLE `menu` (
  `id` int(10) NOT NULL AUTO_INCREMENT,
  `controller` varchar(50) NOT NULL,
  `link` varchar(100) NOT NULL,
  `parent` tinyint(1) unsigned NOT NULL DEFAULT '0',
  `menu_icon` varchar(20) DEFAULT NULL,
  `sort_order` tinyint(1) unsigned NOT NULL DEFAULT '0',
  `is_active` tinyint(1) unsigned NOT NULL DEFAULT '1',
  PRIMARY KEY (`id`),
  UNIQUE KEY `id` (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=8 DEFAULT CHARSET=utf8;

/*Data for the table `menu` */

insert  into `menu`(`id`,`controller`,`link`,`parent`,`menu_icon`,`sort_order`,`is_active`) values (1,'managebandprofiles','managebandprofiles.index',0,'fa-user',0,1),(2,'getlicenses','getlicenses.create',0,'fa-key',0,1),(3,'getscores','getscores.index',0,'fa-music',0,1),(4,'uploadscores','uploadscores.create',0,'fa-music',0,1),(5,'uploadscores','uploadscores.index',0,'fa-music',0,1),(6,'managepublisherprofiles','managepublisherprofiles.index',0,'fa-male',0,1),(7,'dashboardcontroller','dashboards.index',0,'fa-desktop',0,1);

/*Table structure for table `menu_detail` */

DROP TABLE IF EXISTS `menu_detail`;

CREATE TABLE `menu_detail` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `lang_id` int(11) NOT NULL DEFAULT '0',
  `menu_id` int(11) NOT NULL,
  `title` varchar(255) COLLATE utf8_bin NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=15 DEFAULT CHARSET=utf8 COLLATE=utf8_bin;

/*Data for the table `menu_detail` */

insert  into `menu_detail`(`id`,`lang_id`,`menu_id`,`title`) values (1,1,1,'Mange Profile'),(2,1,2,'Get License'),(3,1,3,'Get Score'),(4,1,4,'Upload Score'),(5,1,5,'All Scores'),(6,1,6,'Mange Profile'),(7,1,7,'Dashboard'),(8,2,1,'Mange Profil'),(9,2,2,'Holen Lizenz'),(10,2,3,'Holen Score'),(11,2,4,'Hochladen von Score'),(12,2,5,'Alle Spielstände'),(13,2,6,'Mange Profil'),(14,2,7,'Armaturenbrett');

/*Table structure for table `musician_to_band` */

DROP TABLE IF EXISTS `musician_to_band`;

CREATE TABLE `musician_to_band` (
  `ref_band_id` int(10) unsigned NOT NULL,
  `ref_musician_id` int(10) unsigned NOT NULL,
  `current_status` tinyint(1) unsigned DEFAULT '0' COMMENT '1=active, 2=deleted'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

/*Data for the table `musician_to_band` */

/*Table structure for table `musician_to_instrument` */

DROP TABLE IF EXISTS `musician_to_instrument`;

CREATE TABLE `musician_to_instrument` (
  `ref_band_id` int(10) unsigned NOT NULL,
  `ref_musician_id` int(10) unsigned NOT NULL,
  `ref_instruments_id` int(10) unsigned NOT NULL,
  `current_status` tinyint(1) unsigned DEFAULT '0' COMMENT '1=active , 2=deleted'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

/*Data for the table `musician_to_instrument` */

/*Table structure for table `musicians` */

DROP TABLE IF EXISTS `musicians`;

CREATE TABLE `musicians` (
  `musician_id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `login_id` varchar(50) NOT NULL,
  `login_pass` varchar(50) NOT NULL,
  `musician_name` varchar(100) DEFAULT NULL,
  `current_status` tinyint(1) unsigned DEFAULT '0' COMMENT '1=active,2=deleted',
  PRIMARY KEY (`musician_id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

/*Data for the table `musicians` */

/*Table structure for table `playlist_to_band` */

DROP TABLE IF EXISTS `playlist_to_band`;

CREATE TABLE `playlist_to_band` (
  `ref_band_id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `ref_playlist_id` int(10) unsigned DEFAULT NULL,
  `played` int(10) unsigned DEFAULT NULL,
  `last_played_at` timestamp NULL DEFAULT NULL,
  `current_status` int(1) unsigned DEFAULT '0' COMMENT '1=active , 2=deleted',
  PRIMARY KEY (`ref_band_id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

/*Data for the table `playlist_to_band` */

/*Table structure for table `playlist_to_score` */

DROP TABLE IF EXISTS `playlist_to_score`;

CREATE TABLE `playlist_to_score` (
  `ref_band_id` int(10) unsigned DEFAULT NULL,
  `ref_playlist_id` int(10) unsigned DEFAULT NULL,
  `ref_score_id` int(10) unsigned DEFAULT NULL,
  `played` int(10) unsigned DEFAULT NULL,
  `last_payed_at` timestamp NULL DEFAULT NULL,
  `current_status` tinyint(1) unsigned DEFAULT '0' COMMENT '1=active , 2=deleted'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

/*Data for the table `playlist_to_score` */

/*Table structure for table `playlists` */

DROP TABLE IF EXISTS `playlists`;

CREATE TABLE `playlists` (
  `playlist_id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `playlist_name` varchar(100) DEFAULT NULL,
  `playlist_detail` varchar(100) DEFAULT NULL,
  `current_status` tinyint(1) unsigned DEFAULT '0' COMMENT '1=active, 2=deleted',
  PRIMARY KEY (`playlist_id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

/*Data for the table `playlists` */

/*Table structure for table `publishers` */

DROP TABLE IF EXISTS `publishers`;

CREATE TABLE `publishers` (
  `publisher_id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `ref_user_id` smallint(5) unsigned NOT NULL,
  `publisher_full_name` varchar(100) DEFAULT NULL,
  `publisher_key` varchar(100) DEFAULT NULL,
  `publisher_address` varchar(255) DEFAULT NULL,
  `publisher_link` varchar(255) DEFAULT NULL,
  `publisher_contact_person` text,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `publisher_logo` varchar(255) DEFAULT NULL,
  PRIMARY KEY (`publisher_id`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=latin1;

/*Data for the table `publishers` */

insert  into `publishers`(`publisher_id`,`ref_user_id`,`publisher_full_name`,`publisher_key`,`publisher_address`,`publisher_link`,`publisher_contact_person`,`created_at`,`updated_at`,`publisher_logo`) values (1,44,'Ali Saheb','VtM5gbcaQZUebBgPqe8N7APGnTbtNSzz',NULL,NULL,NULL,'2015-10-06 07:00:12','2015-10-06 07:17:33','upload/14441158539225.png'),(2,45,'Tutul','uJQZ2chcvvP9vmHj9XSE23BEcQMhj3G2',NULL,NULL,NULL,'2015-10-06 07:03:41','2015-10-06 07:19:27','upload/14441159674591.jpg');

/*Table structure for table `score_albums` */

DROP TABLE IF EXISTS `score_albums`;

CREATE TABLE `score_albums` (
  `album_id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `ref_publisher_id` int(10) unsigned NOT NULL,
  `album_name` varchar(100) DEFAULT NULL,
  `album_note` varchar(100) DEFAULT NULL,
  `current_status` tinyint(1) unsigned DEFAULT '0' COMMENT '1=active, 2=deleted',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`album_id`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=latin1;

/*Data for the table `score_albums` */

insert  into `score_albums`(`album_id`,`ref_publisher_id`,`album_name`,`album_note`,`current_status`,`created_at`,`updated_at`) values (1,1,'It my life',NULL,0,'2015-10-06 07:02:49','2015-10-06 07:02:49'),(2,2,'bon jovi',NULL,0,'2015-10-06 07:04:47','2015-10-06 07:04:47'),(3,2,'bed of roses',NULL,0,'2015-10-06 07:05:53','2015-10-06 07:05:53');

/*Table structure for table `score_to_band` */

DROP TABLE IF EXISTS `score_to_band`;

CREATE TABLE `score_to_band` (
  `ref_band_id` int(10) unsigned NOT NULL,
  `ref_album_id` int(10) unsigned NOT NULL,
  `ref_score_id` int(10) unsigned DEFAULT NULL,
  `played` int(10) unsigned DEFAULT NULL,
  `last_played_at` timestamp NULL DEFAULT NULL,
  `current_status` tinyint(1) unsigned DEFAULT '1' COMMENT '1=active , 2=deleted',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `sales_id` int(11) NOT NULL AUTO_INCREMENT,
  UNIQUE KEY `sales_id` (`sales_id`)
) ENGINE=InnoDB AUTO_INCREMENT=15 DEFAULT CHARSET=latin1;

/*Data for the table `score_to_band` */

insert  into `score_to_band`(`ref_band_id`,`ref_album_id`,`ref_score_id`,`played`,`last_played_at`,`current_status`,`created_at`,`updated_at`,`sales_id`) values (1,3,6,NULL,NULL,1,'2015-10-06 07:12:59','2015-10-06 07:12:59',1),(1,3,7,NULL,NULL,1,'2015-10-06 07:12:59','2015-10-06 07:12:59',2),(1,2,4,NULL,NULL,1,'2015-10-06 07:13:00','2015-10-06 07:13:00',3),(1,2,5,NULL,NULL,1,'2015-10-06 07:13:00','2015-10-06 07:13:00',4),(1,1,1,NULL,NULL,1,'2015-10-06 07:13:01','2015-10-06 07:13:01',5),(1,1,2,NULL,NULL,1,'2015-10-06 07:13:01','2015-10-06 07:13:01',6),(1,1,3,NULL,NULL,1,'2015-10-06 07:13:01','2015-10-06 07:13:01',7),(2,3,6,NULL,NULL,1,'2015-10-07 07:31:22','2015-10-07 07:31:22',8),(2,3,7,NULL,NULL,1,'2015-10-07 07:31:23','2015-10-07 07:31:23',9),(2,2,4,NULL,NULL,1,'2015-10-07 07:31:24','2015-10-07 07:31:24',10),(2,2,5,NULL,NULL,1,'2015-10-07 07:31:24','2015-10-07 07:31:24',11),(2,1,1,NULL,NULL,1,'2015-10-07 07:31:27','2015-10-07 07:31:27',12),(2,1,2,NULL,NULL,1,'2015-10-07 07:31:27','2015-10-07 07:31:27',13),(2,1,3,NULL,NULL,1,'2015-10-07 07:31:27','2015-10-07 07:31:27',14);

/*Table structure for table `scores` */

DROP TABLE IF EXISTS `scores`;

CREATE TABLE `scores` (
  `score_id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `ref_publisher_id` int(10) unsigned NOT NULL,
  `ref_album_id` int(10) unsigned NOT NULL,
  `drive_file_id` varchar(500) DEFAULT NULL,
  `score_title` varchar(100) DEFAULT NULL,
  `score_note` varchar(100) DEFAULT NULL,
  `file_path` varchar(1000) DEFAULT NULL,
  `current_status` tinyint(1) unsigned DEFAULT '1' COMMENT '1=active, 2=deleted',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`score_id`)
) ENGINE=InnoDB AUTO_INCREMENT=8 DEFAULT CHARSET=latin1;

/*Data for the table `scores` */

insert  into `scores`(`score_id`,`ref_publisher_id`,`ref_album_id`,`drive_file_id`,`score_title`,`score_note`,`file_path`,`current_status`,`created_at`,`updated_at`) values (1,1,1,'0ByF33WdyeLKeR3hUWVBLSzZZQkU','Livin\' On A Prayer',NULL,'https://doc-0o-7o-docs.googleusercontent.com/docs/securesc/igsq46vtfkfokkh9aopaajb86bavlnnp/q34rognvg8j05uh0bdramcb0ql12gno2/1444111200000/12327711454415882595/12327711454415882595/0ByF33WdyeLKeR3hUWVBLSzZZQkU?h=08688605400829896234&e=download&gd=true',1,'2015-10-06 07:02:56','2015-10-06 07:02:56'),(2,1,1,'0ByF33WdyeLKeSEdVZmpQeVRYT0E','always',NULL,'https://doc-0g-7o-docs.googleusercontent.com/docs/securesc/igsq46vtfkfokkh9aopaajb86bavlnnp/o5j64csb90npmskqi9tvgtpseo3do41q/1444111200000/12327711454415882595/12327711454415882595/0ByF33WdyeLKeSEdVZmpQeVRYT0E?h=08688605400829896234&e=download&gd=true',1,'2015-10-06 07:02:57','2015-10-06 07:02:57'),(3,1,1,'0ByF33WdyeLKeMlk1RURVT3RQTzg','you give love a bad name',NULL,'https://doc-00-7o-docs.googleusercontent.com/docs/securesc/igsq46vtfkfokkh9aopaajb86bavlnnp/4ckv2lpb4eqngg1qhremqog27oumbr26/1444111200000/12327711454415882595/12327711454415882595/0ByF33WdyeLKeMlk1RURVT3RQTzg?h=08688605400829896234&e=download&gd=true',1,'2015-10-06 07:02:57','2015-10-06 07:02:57'),(4,2,2,'0ByF33WdyeLKeSjVUSjNHXy1GWWM','i\'ll be there for you',NULL,'https://doc-0k-7o-docs.googleusercontent.com/docs/securesc/igsq46vtfkfokkh9aopaajb86bavlnnp/utjaig7pbhg2s8im39rc71sk4vqjggig/1444111200000/12327711454415882595/12327711454415882595/0ByF33WdyeLKeSjVUSjNHXy1GWWM?h=08688605400829896234&e=download&gd=true',1,'2015-10-06 07:04:52','2015-10-06 07:04:52'),(5,2,2,'0ByF33WdyeLKeSjA2ZDZKU2czMVU','thank you for loving me',NULL,'https://doc-04-7o-docs.googleusercontent.com/docs/securesc/igsq46vtfkfokkh9aopaajb86bavlnnp/keb70kjvc6177i6jg95irug4e4qr58o9/1444111200000/12327711454415882595/12327711454415882595/0ByF33WdyeLKeSjA2ZDZKU2czMVU?h=08688605400829896234&e=download&gd=true',1,'2015-10-06 07:04:52','2015-10-06 07:04:52'),(6,2,3,'0ByF33WdyeLKeeWRlZ1Y1UmRNR28','bed of roses',NULL,'https://doc-10-7o-docs.googleusercontent.com/docs/securesc/igsq46vtfkfokkh9aopaajb86bavlnnp/rkvgg3ccr0j95899goorpat1gvjmgt58/1444111200000/12327711454415882595/12327711454415882595/0ByF33WdyeLKeeWRlZ1Y1UmRNR28?h=08688605400829896234&e=download&gd=true',1,'2015-10-06 07:05:58','2015-10-06 07:05:58'),(7,2,3,'0ByF33WdyeLKeeTJyOUMwMnJDa1E','have a nice day',NULL,'https://doc-04-7o-docs.googleusercontent.com/docs/securesc/igsq46vtfkfokkh9aopaajb86bavlnnp/2hgjo3virdlndojcbn10lcobcpsgep86/1444111200000/12327711454415882595/12327711454415882595/0ByF33WdyeLKeeTJyOUMwMnJDa1E?h=08688605400829896234&e=download&gd=true',1,'2015-10-06 07:05:58','2015-10-06 07:05:58');

/*Table structure for table `user_login` */

DROP TABLE IF EXISTS `user_login`;

CREATE TABLE `user_login` (
  `user_id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `user_name` varchar(50) COLLATE utf8_bin DEFAULT NULL,
  `user_password` varchar(500) COLLATE utf8_bin NOT NULL,
  `user_email` varchar(50) COLLATE utf8_bin NOT NULL,
  `role` tinyint(1) unsigned NOT NULL DEFAULT '1' COMMENT '1=admin, 2=band, 3=publisher',
  `password_last_set` timestamp NULL DEFAULT NULL,
  `forgot_code` varchar(500) COLLATE utf8_bin DEFAULT NULL,
  `forgot_generated` timestamp NULL DEFAULT CURRENT_TIMESTAMP,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `current_status` tinyint(1) unsigned NOT NULL DEFAULT '1' COMMENT '1=active, 2=delete',
  PRIMARY KEY (`user_id`)
) ENGINE=InnoDB AUTO_INCREMENT=48 DEFAULT CHARSET=utf8 COLLATE=utf8_bin;

/*Data for the table `user_login` */

insert  into `user_login`(`user_id`,`user_name`,`user_password`,`user_email`,`role`,`password_last_set`,`forgot_code`,`forgot_generated`,`created_at`,`updated_at`,`current_status`) values (1,'admin','$2y$10$XVQZvNRW43qOlf9tlrqZJOtzoudBCO2jdMNuNkSlwXWphUWH6xJO.','admin@example.com',1,NULL,NULL,'2015-10-12 12:18:17',NULL,NULL,1),(44,NULL,'$2y$10$hU8pjm9QJETsMO92.J9xbuZcuYZKlDyw/aeh2kb4bf2g9HiL1OeBe','alisaheb@gmail.com',3,NULL,NULL,'2015-10-12 12:18:17','2015-10-06 07:00:12','2015-10-06 07:00:12',1),(45,NULL,'$2y$10$pmQO67UOl6HfbyaG4003deYHJ2Yni6r12uN6Sxw49xZ6VSuBcJKu2','ali.saheb.09@gmail.com',3,'2015-10-15 07:38:10','HGeQQeVvpemZRQHbbzKnRzFsRqcHBcz3','2015-10-12 12:18:17','2015-10-06 07:03:41','2015-10-20 06:32:54',1),(46,'uzR8Mp','$2y$10$pi1rqhzKCFMU.RUaMP7D0.7IAxyMx/r9TOPkVJlRaaX/HVddEuWP6','noor.s@rfsoftlab.com',2,NULL,NULL,'2015-10-12 12:18:17','2015-10-06 07:11:18','2015-10-06 07:11:31',1),(47,'mcyCxV','$2y$10$JgpuQ5zsAZMQC6TvUgkL3.VNMQtpk2NySRjJaL4za6XHkKRV.54Zi','kamal@gmail.com',2,'2015-10-15 07:23:51','','2015-10-12 12:18:17','2015-10-06 07:19:57','2015-11-20 06:11:10',1);

/*Table structure for table `user_roles` */

DROP TABLE IF EXISTS `user_roles`;

CREATE TABLE `user_roles` (
  `role_id` tinyint(3) unsigned NOT NULL AUTO_INCREMENT,
  `role_name` varchar(50) COLLATE utf8_bin NOT NULL,
  `roles` varchar(50) COLLATE utf8_bin NOT NULL,
  PRIMARY KEY (`role_id`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=utf8 COLLATE=utf8_bin;

/*Data for the table `user_roles` */

insert  into `user_roles`(`role_id`,`role_name`,`roles`) values (1,'admin','1111111'),(2,'band','1110001'),(3,'publisher','0001111');

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;
