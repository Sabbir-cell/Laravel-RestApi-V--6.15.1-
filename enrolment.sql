/*
SQLyog Ultimate v11.11 (64 bit)
MySQL - 5.5.5-10.4.6-MariaDB : Database - enrolment
*********************************************************************
*/

/*!40101 SET NAMES utf8 */;

/*!40101 SET SQL_MODE=''*/;

/*!40014 SET @OLD_UNIQUE_CHECKS=@@UNIQUE_CHECKS, UNIQUE_CHECKS=0 */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;
/*!40111 SET @OLD_SQL_NOTES=@@SQL_NOTES, SQL_NOTES=0 */;
/*Table structure for table `classes` */

DROP TABLE IF EXISTS `classes`;

CREATE TABLE `classes` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `class_name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=8 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

/*Data for the table `classes` */

insert  into `classes`(`id`,`class_name`,`created_at`,`updated_at`) values (1,'one',NULL,NULL),(2,'two',NULL,NULL),(3,'three',NULL,NULL),(6,'six',NULL,NULL),(7,'five',NULL,NULL);

/*Table structure for table `failed_jobs` */

DROP TABLE IF EXISTS `failed_jobs`;

CREATE TABLE `failed_jobs` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `connection` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `queue` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `payload` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `exception` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `failed_at` timestamp NOT NULL DEFAULT current_timestamp(),
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

/*Data for the table `failed_jobs` */

/*Table structure for table `migrations` */

DROP TABLE IF EXISTS `migrations`;

CREATE TABLE `migrations` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `migration` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `batch` int(11) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=6 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

/*Data for the table `migrations` */

insert  into `migrations`(`id`,`migration`,`batch`) values (1,'2014_10_12_000000_create_users_table',1),(2,'2014_10_12_100000_create_password_resets_table',1),(3,'2019_08_19_000000_create_failed_jobs_table',1),(4,'2020_02_17_055239_create_classes_table',2),(5,'2020_02_18_045730_create_students_table',3);

/*Table structure for table `password_resets` */

DROP TABLE IF EXISTS `password_resets`;

CREATE TABLE `password_resets` (
  `email` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `token` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  KEY `password_resets_email_index` (`email`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

/*Data for the table `password_resets` */

/*Table structure for table `students` */

DROP TABLE IF EXISTS `students`;

CREATE TABLE `students` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `class_id` int(11) NOT NULL,
  `section_id` int(11) NOT NULL,
  `name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `phone` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `password` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `photo` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `address` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `gender` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=23 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

/*Data for the table `students` */

insert  into `students`(`id`,`class_id`,`section_id`,`name`,`phone`,`email`,`password`,`photo`,`address`,`gender`,`created_at`,`updated_at`) values (1,1,1,'Json','09876543','json@gmail.com','1234','students/','Dhaka','male','2020-02-18 06:28:05','2020-02-18 06:28:05'),(2,1,1,'Json','09876543','json@gmail.com','1234','students/','Dhaka','male','2020-02-18 06:31:53','2020-02-18 06:31:53'),(3,9,9,'Json 9','098765439','json9@gmail.com','1234','public/students/','Dhaka','male','2020-02-18 06:39:07','2020-02-18 06:39:07'),(4,1,1,'json','1232121','json@gmail.com','321','student/1.jpg','Dhaka','Male','2020-02-18 06:46:39','2020-02-18 06:46:39'),(5,1,1,'json','1232121','json@gmail.com','321','student/1.jpg','Dhaka','Male','2020-02-18 06:47:20','2020-02-18 06:47:20'),(6,1,1,'json','1232121','json@gmail.com','321','student/1.jpg','Dhaka','Male','2020-02-18 06:50:02','2020-02-18 06:50:02'),(7,1,1,'json','1232121','json@gmail.com','321','student/1.jpg','Dhaka','Male','2020-02-18 06:50:21','2020-02-18 06:50:21'),(8,1,1,'json','1232121','json@gmail.com','321','student/1.jpg','Dhaka','Male','2020-02-18 06:50:49','2020-02-18 06:50:49'),(12,1,1,'json','1232121','json@gmail.com','321','12-20200218065638-1462812117-809906438.png','Dhaka','Male','2020-02-18 06:56:38','2020-02-18 06:56:38'),(13,1,1,'json','1232121','json@gmail.com','321','E:\\xampp\\tmp\\php9312.tmp','Dhaka','Male','2020-02-18 06:57:23','2020-02-18 06:57:23'),(14,1,1,'json','1232121','json@gmail.com','321','E:\\xampp\\tmp\\phpFAE0.tmp','Dhaka','Male','2020-02-18 06:58:55','2020-02-18 06:58:55'),(15,1,1,'json','1232121','json@gmail.com','321','E:\\xampp\\tmp\\php27E8.tmp','Dhaka','Male','2020-02-18 07:00:12','2020-02-18 07:00:12'),(16,1,1,'json','1232121','json@gmail.com','321','16-20200218070133-1776389004-616737207.png','Dhaka','Male','2020-02-18 07:01:33','2020-02-18 07:01:33'),(17,1,1,'json','1232121','json@gmail.com','321','17-20200218071146-1584675294-255641697.png','Dhaka','Male','2020-02-18 07:11:46','2020-02-18 07:11:46'),(18,1,1,'json','1232121','json@gmail.com','321','18-20200218071222-53957959-1051755544.png','Dhaka','Male','2020-02-18 07:12:22','2020-02-18 07:12:22'),(19,9,9,'Json 9','098765439','json9@gmail.com','1234','public/students/','Dhaka','male','2020-02-18 07:13:01','2020-02-18 07:13:01'),(21,19,19,'json 19','0172222222222','json19@gmail.com','123','21-20200218093901-1911509672-1347315586.jpg','Dhaka 19','Male','2020-02-18 09:39:01','2020-02-18 09:39:01'),(22,22,22,'zxc','123423','sa@ff.dd','123','22-20200219044949-1204654289-1560776675.png','as','aa','2020-02-19 04:49:49','2020-02-19 04:49:49');

/*Table structure for table `subjects` */

DROP TABLE IF EXISTS `subjects`;

CREATE TABLE `subjects` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `class_id` int(11) DEFAULT NULL,
  `subject_name` varchar(20) COLLATE utf8_unicode_ci DEFAULT NULL,
  `subject_code` varchar(20) COLLATE utf8_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `id` (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=10 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

/*Data for the table `subjects` */

insert  into `subjects`(`id`,`class_id`,`subject_name`,`subject_code`,`created_at`,`updated_at`) values (1,1,'Bangla 2','00982','2020-02-17 11:40:01','2020-02-18 06:10:36'),(2,3,'Data Structures','333223','2020-02-17 11:40:35','2020-02-17 11:40:35'),(3,3,'Bangla','123912','2020-02-17 12:01:03','2020-02-18 08:27:10'),(7,5,'english 23','122333','2020-02-18 06:13:15','2020-02-18 06:14:38'),(8,8,'cse2','12341111','2020-02-18 06:17:54','2020-02-18 06:18:27');

/*Table structure for table `users` */

DROP TABLE IF EXISTS `users`;

CREATE TABLE `users` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email_verified_at` timestamp NULL DEFAULT NULL,
  `password` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `remember_token` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `users_email_unique` (`email`)
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

/*Data for the table `users` */

insert  into `users`(`id`,`name`,`email`,`email_verified_at`,`password`,`remember_token`,`created_at`,`updated_at`) values (1,'sabbir','sabbir@gmail.com','2020-02-19 11:31:38','$1$7E9uTbHm$3YBzFWapNG21hcHdfG8MJ0',NULL,NULL,NULL),(2,'sabbir biswas','sabbir123@gmail.com',NULL,'$2y$10$tkIO3YmLzu6l/DK75sDFCeEwjAoks9wOq06awtRYoszep.IgmBa4C',NULL,NULL,NULL),(3,'sabbir biswas','sabbir1234@gmail.com',NULL,'$2y$10$pzrwATk/j7OCZxTcU42vP.jSAM7NdLC8bo9RLoBRFIYDHcQWRvl/e',NULL,NULL,NULL),(4,'sabbir biswas','sabbir12345@gmail.com',NULL,'$2y$10$Ei59W4VBob8plF9VlvKksOR5636YZIs41Z1idV2l8IhtwC..C48m.',NULL,NULL,NULL);

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;
