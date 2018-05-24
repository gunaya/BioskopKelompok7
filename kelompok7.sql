/*
SQLyog Ultimate v12.5.0 (64 bit)
MySQL - 10.1.30-MariaDB : Database - dumb
*********************************************************************
*/

/*!40101 SET NAMES utf8 */;

/*!40101 SET SQL_MODE=''*/;

/*!40014 SET @OLD_UNIQUE_CHECKS=@@UNIQUE_CHECKS, UNIQUE_CHECKS=0 */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;
/*!40111 SET @OLD_SQL_NOTES=@@SQL_NOTES, SQL_NOTES=0 */;
CREATE DATABASE /*!32312 IF NOT EXISTS*/`dumb` /*!40100 DEFAULT CHARACTER SET latin1 */;

USE `dumb`;

/*Table structure for table `method_trans_kartu_kredit` */

DROP TABLE IF EXISTS `method_trans_kartu_kredit`;

CREATE TABLE `method_trans_kartu_kredit` (
  `id_kartu_kredit` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `no_kartu_kredit` varchar(50) COLLATE utf8mb4_unicode_ci NOT NULL,
  `atas_nama` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `id_transaksi` int(10) unsigned NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id_kartu_kredit`),
  KEY `method_trans_kartu_kredit_id_transaksi_foreign` (`id_transaksi`),
  CONSTRAINT `method_trans_kartu_kredit_id_transaksi_foreign` FOREIGN KEY (`id_transaksi`) REFERENCES `tb_transaksi` (`id_transaksi`) ON DELETE CASCADE
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

/*Data for the table `method_trans_kartu_kredit` */

insert  into `method_trans_kartu_kredit`(`id_kartu_kredit`,`no_kartu_kredit`,`atas_nama`,`id_transaksi`,`created_at`,`updated_at`) values 
(1,'','hjhadiugawa',12,'2018-05-14 04:10:02','2018-05-14 04:10:02'),
(2,'','hjhadiugawa',12,'2018-05-14 04:13:26','2018-05-14 04:13:26');

/*Table structure for table `method_trans_trf_bank` */

DROP TABLE IF EXISTS `method_trans_trf_bank`;

CREATE TABLE `method_trans_trf_bank` (
  `id_trf_bank` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `bank` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `nomor_rekening` varchar(50) COLLATE utf8mb4_unicode_ci NOT NULL,
  `bukti_pembayaran` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `atas_nama` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `id_transaksi` int(10) unsigned NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id_trf_bank`),
  KEY `method_trans_trf_bank_id_transaksi_foreign` (`id_transaksi`),
  CONSTRAINT `method_trans_trf_bank_id_transaksi_foreign` FOREIGN KEY (`id_transaksi`) REFERENCES `tb_transaksi` (`id_transaksi`) ON DELETE CASCADE
) ENGINE=InnoDB AUTO_INCREMENT=14 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

/*Data for the table `method_trans_trf_bank` */

insert  into `method_trans_trf_bank`(`id_trf_bank`,`bank`,`nomor_rekening`,`bukti_pembayaran`,`atas_nama`,`id_transaksi`,`created_at`,`updated_at`) values 
(7,'bni','','11_05-14-2018.png','adadaw',11,'2018-05-14 03:38:33','2018-05-14 03:38:33'),
(8,'bni','','11_05-14-2018.png','nsalwdhaidn',11,'2018-05-14 03:46:01','2018-05-14 03:46:01'),
(9,'bni','','11_05-14-2018.png','nsalwdhaidn',11,'2018-05-14 03:46:32','2018-05-14 03:46:32'),
(10,'bni','','119897868709778687_05-14-2018.png','8798798',11,'2018-05-14 03:49:57','2018-05-14 03:49:57'),
(11,'bni','','119897868709778687_05-14-2018.png','8798798',11,'2018-05-14 03:50:22','2018-05-14 03:50:22'),
(12,'bni','12314512123','13adawdaw_05-22-2018.png','adawdaw',13,'2018-05-22 11:28:08','2018-05-22 11:28:08'),
(13,'bni','1234567890','19gunaya_05-24-2018.jpg','gunaya',19,'2018-05-24 04:52:37','2018-05-24 04:52:37');

/*Table structure for table `migrations` */

DROP TABLE IF EXISTS `migrations`;

CREATE TABLE `migrations` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `migration` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `batch` int(11) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=30 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

/*Data for the table `migrations` */

insert  into `migrations`(`id`,`migration`,`batch`) values 
(1,'2014_10_12_100000_create_password_resets_table',1),
(2,'2018_03_25_0_create_users_table',1),
(3,'2018_03_25_1_create_tb_genre_film',1),
(4,'2018_03_25_2_create_tb_kategori',1),
(5,'2018_03_25_3_create_tb_film',1),
(6,'2018_03_25_4_create_tb_studio',1),
(7,'2018_03_25_5_create_tb_tayang',1),
(8,'2018_03_25_6_create_tb_kursi',1),
(9,'2018_03_25_7_create_tb_list_kursi',1),
(10,'2018_03_25_8_create_tb_booking',1),
(11,'2018_03_25_90_create_tb_det_booking',1),
(12,'2018_03_25_91_create_tb_transaksi',1),
(13,'2018_03_25_92_create_method_trans_trf_bank',1),
(14,'2018_03_25_93_create_method_trans_kartu_kredit',1),
(15,'2018_03_25_043926_create_films_table',2),
(16,'2018_04_07_112448_add_image_to_tb_film',2),
(17,'2018_04_07_112820_add_image_to_users',2),
(18,'2018_04_19_110836_add_column_to_genre',3),
(19,'2018_05_08_003437_add_status_booking',4),
(20,'2018_05_08_015751_add_at_listkursi',5),
(21,'2018_05_08_111546_change_column_bukti_trf',6),
(22,'2018_05_08_111842_change_column_bukti_trf',7),
(23,'2018_05_09_033340_add_unique_code',8),
(24,'2018_05_10_065532_add_status_transaksi',9),
(25,'2018_05_10_074510_change_status_transaksi',10),
(26,'2018_05_14_044316_add_status_booking_dibayar',11),
(27,'2018_05_14_045300_change_data_type_trf',12),
(28,'2018_05_14_045518_change_data_type_kredit',12),
(29,'2018_05_23_021721_change_direksi_unique',13);

/*Table structure for table `password_resets` */

DROP TABLE IF EXISTS `password_resets`;

CREATE TABLE `password_resets` (
  `email` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `token` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  KEY `password_resets_email_index` (`email`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

/*Data for the table `password_resets` */

/*Table structure for table `tb_booking` */

DROP TABLE IF EXISTS `tb_booking`;

CREATE TABLE `tb_booking` (
  `id_booking` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `status` enum('belum_lunas','gagal','dibayar','lunas') COLLATE utf8mb4_unicode_ci NOT NULL,
  `total_pembayaran` int(11) NOT NULL,
  `batas_transaksi` datetime NOT NULL,
  `id_user` int(10) unsigned NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id_booking`),
  KEY `tb_booking_id_user_foreign` (`id_user`),
  CONSTRAINT `tb_booking_id_user_foreign` FOREIGN KEY (`id_user`) REFERENCES `users` (`id`) ON DELETE CASCADE
) ENGINE=InnoDB AUTO_INCREMENT=29 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

/*Data for the table `tb_booking` */

insert  into `tb_booking`(`id_booking`,`status`,`total_pembayaran`,`batas_transaksi`,`id_user`,`created_at`,`updated_at`) values 
(25,'lunas',280000,'2018-05-15 11:37:32',3,'2018-05-14 03:37:32','2018-05-14 04:51:01'),
(26,'gagal',70000,'2018-05-15 12:09:48',3,'2018-05-14 04:09:48','2018-05-14 04:09:55'),
(27,'lunas',70000,'2018-05-23 19:27:33',2,'2018-05-22 11:27:33','2018-05-22 11:30:26'),
(28,'gagal',70000,'2018-05-24 16:39:25',1,'2018-05-22 13:39:25','2018-05-24 04:53:20');

/*Table structure for table `tb_det_booking` */

DROP TABLE IF EXISTS `tb_det_booking`;

CREATE TABLE `tb_det_booking` (
  `id_det_booking` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `status` enum('deal','pending') COLLATE utf8mb4_unicode_ci NOT NULL,
  `harga` int(10) unsigned NOT NULL,
  `unique_code` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `id_list_kursi` int(10) unsigned DEFAULT NULL,
  `id_booking` int(10) unsigned DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id_det_booking`),
  KEY `tb_det_booking_id_list_kursi_foreign` (`id_list_kursi`),
  KEY `tb_det_booking_id_booking_foreign` (`id_booking`),
  CONSTRAINT `tb_det_booking_id_booking_foreign` FOREIGN KEY (`id_booking`) REFERENCES `tb_booking` (`id_booking`) ON DELETE SET NULL,
  CONSTRAINT `tb_det_booking_id_list_kursi_foreign` FOREIGN KEY (`id_list_kursi`) REFERENCES `tb_list_kursi` (`id_list_kursi`) ON DELETE SET NULL
) ENGINE=InnoDB AUTO_INCREMENT=54 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

/*Data for the table `tb_det_booking` */

insert  into `tb_det_booking`(`id_det_booking`,`status`,`harga`,`unique_code`,`id_list_kursi`,`id_booking`,`created_at`,`updated_at`) values 
(47,'deal',70000,'HcCxsNOpM1',7,25,'2018-05-14 03:37:33','2018-05-14 03:49:33'),
(48,'deal',70000,'RNkMgtiZJr',8,25,'2018-05-14 03:37:51','2018-05-14 03:49:33'),
(49,'deal',70000,'jdBKzseuGl',2,25,'2018-05-14 03:45:42','2018-05-14 03:49:33'),
(50,'deal',70000,'tEGyzkZNJX',5,25,'2018-05-14 03:49:26','2018-05-14 03:49:33'),
(51,'deal',70000,'2YlPDHN0yW',6,26,'2018-05-14 04:09:48','2018-05-14 04:09:55'),
(52,'deal',70000,'dzisoLOcql',7,27,'2018-05-22 11:27:33','2018-05-22 11:27:42'),
(53,'deal',70000,'qmjR9hH6JZ',4,28,'2018-05-22 13:39:25','2018-05-24 04:52:11');

/*Table structure for table `tb_film` */

DROP TABLE IF EXISTS `tb_film`;

CREATE TABLE `tb_film` (
  `id_film` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `nama_film` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `tahun_produksi` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `direksi` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `pemain` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `sinopsis` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `bahasa` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `negara` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `image` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `id_genre_film` int(10) unsigned NOT NULL,
  `id_kategori` int(10) unsigned NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id_film`),
  KEY `tb_film_id_genre_film_foreign` (`id_genre_film`),
  KEY `tb_film_id_kategori_foreign` (`id_kategori`),
  CONSTRAINT `tb_film_id_genre_film_foreign` FOREIGN KEY (`id_genre_film`) REFERENCES `tb_genre_film` (`id_genre_film`) ON DELETE CASCADE,
  CONSTRAINT `tb_film_id_kategori_foreign` FOREIGN KEY (`id_kategori`) REFERENCES `tb_kategori` (`id_kategori`) ON DELETE CASCADE
) ENGINE=InnoDB AUTO_INCREMENT=18 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

/*Data for the table `tb_film` */

insert  into `tb_film`(`id_film`,`nama_film`,`tahun_produksi`,`direksi`,`pemain`,`sinopsis`,`bahasa`,`negara`,`image`,`id_genre_film`,`id_kategori`,`created_at`,`updated_at`) values 
(1,'Black Panther','2019','','Ben Affleck','hahaha','indonesia','','31408338_592320664477163_8156096785261039461_n.jpg',1,1,'2018-03-26 08:49:07','2018-05-11 13:33:18'),
(2,'black wakanda','2019','','luiz van gigogh','gsgagydgasd','indonesia','indonesia','sW7pF.png',1,1,'2018-03-27 08:20:02','2018-04-19 08:10:20'),
(11,'wakanda forever','2018','','wakanda','wakanda','indonesia','indonesia','TrollFace.jpg',1,1,'2018-04-06 07:01:14','2018-04-14 09:02:42'),
(12,'Anu','1998','','aaaa','SSSSSSSSSSSSSSSSSSSSSSSSSSSSSSSSSSSSSSSSSSSSSSSSSSSSSSSSSSSSSSSSSSSSSSSSSSSSSSSSSSSSSSSSSSSSSSSSSSSSSSSSSSSSSSSSSSSSSSSSSSSSSSSSSSSSSSSSSSSSSSSSSSSSSSSSSSSSSSSSSSSSSSSSSSSSSSSSSSSSSSSSSSSSSSS','indonesia','indonesia','04-thumbnail.jpg',1,1,'2018-04-09 12:12:55','2018-04-09 12:24:59'),
(13,'aduh','2000','','aduh','aduh','indonesia','indonesia','68747470733a2f2f7261772e6769746875622e636f6d2f616e74696d617474657231352f63616d6572616d616e2f6d61737465722f63616d6572616d616e2e706e67.png',1,1,'2018-04-14 08:58:35','2018-04-19 08:08:05'),
(14,'Ready Player Two','3012','','col-xs-4','col-xs-4','indonesia','indonesia','lena-color-512.png',1,1,'2018-04-19 06:35:45','2018-04-19 08:11:16'),
(17,'ADUH','3030','','','','indonesia','','TrollFace.jpg',1,1,NULL,'2018-04-19 08:23:05');

/*Table structure for table `tb_genre_film` */

DROP TABLE IF EXISTS `tb_genre_film`;

CREATE TABLE `tb_genre_film` (
  `id_genre_film` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `genre_film` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id_genre_film`)
) ENGINE=InnoDB AUTO_INCREMENT=8 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

/*Data for the table `tb_genre_film` */

insert  into `tb_genre_film`(`id_genre_film`,`genre_film`,`created_at`,`updated_at`) values 
(1,'Horror',NULL,NULL),
(2,'Comedy',NULL,NULL),
(3,'Action',NULL,NULL),
(4,'Scifi','2018-04-19 11:11:02','2018-04-19 11:11:02'),
(5,'Historical','2018-04-19 11:16:39','2018-04-19 11:16:39'),
(6,'Documentary','2018-04-19 11:25:44','2018-04-19 11:25:44'),
(7,'Romance','2018-04-19 11:27:02','2018-04-19 11:27:02');

/*Table structure for table `tb_kategori` */

DROP TABLE IF EXISTS `tb_kategori`;

CREATE TABLE `tb_kategori` (
  `id_kategori` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `kategori` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `min_umur` int(11) NOT NULL,
  `max_umur` int(11) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id_kategori`)
) ENGINE=InnoDB AUTO_INCREMENT=6 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

/*Data for the table `tb_kategori` */

insert  into `tb_kategori`(`id_kategori`,`kategori`,`min_umur`,`max_umur`,`created_at`,`updated_at`) values 
(1,'Dewasa',18,100,NULL,'2018-05-02 11:32:04'),
(2,'Anak',0,12,NULL,'2018-05-02 11:31:56'),
(3,'Remaja',12,18,NULL,'2018-05-02 11:31:49'),
(4,'Semua Umur',0,100,'2018-04-19 08:44:31','2018-04-19 08:44:31'),
(5,'Orang Tua',30,100,'2018-04-19 08:52:08','2018-04-19 08:52:08');

/*Table structure for table `tb_kursi` */

DROP TABLE IF EXISTS `tb_kursi`;

CREATE TABLE `tb_kursi` (
  `id_kursi` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `kode_kursi` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id_kursi`)
) ENGINE=InnoDB AUTO_INCREMENT=12 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

/*Data for the table `tb_kursi` */

insert  into `tb_kursi`(`id_kursi`,`kode_kursi`,`created_at`,`updated_at`) values 
(1,'A1',NULL,NULL),
(2,'A2',NULL,NULL),
(3,'A3',NULL,NULL),
(4,'A4',NULL,NULL),
(5,'A5',NULL,NULL),
(6,'B1',NULL,NULL),
(7,'B2',NULL,NULL),
(8,'B3','2018-05-16 01:31:43','2018-05-16 01:31:43'),
(9,'B4','2018-05-16 01:31:53','2018-05-16 01:31:53'),
(10,'B5','2018-05-16 01:31:58','2018-05-16 01:31:58'),
(11,'C1','2018-05-16 01:32:05','2018-05-16 01:32:05');

/*Table structure for table `tb_list_kursi` */

DROP TABLE IF EXISTS `tb_list_kursi`;

CREATE TABLE `tb_list_kursi` (
  `id_list_kursi` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `id_kursi` int(10) unsigned NOT NULL,
  `id_tayang` int(10) unsigned NOT NULL,
  `status` enum('tersedia','terpesan','sold') COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id_list_kursi`),
  KEY `tb_list_kursi_id_kursi_foreign` (`id_kursi`),
  KEY `tb_list_kursi_id_tayang_foreign` (`id_tayang`),
  CONSTRAINT `tb_list_kursi_id_kursi_foreign` FOREIGN KEY (`id_kursi`) REFERENCES `tb_kursi` (`id_kursi`) ON DELETE CASCADE,
  CONSTRAINT `tb_list_kursi_id_tayang_foreign` FOREIGN KEY (`id_tayang`) REFERENCES `tb_tayang` (`id_tayang`) ON DELETE CASCADE
) ENGINE=InnoDB AUTO_INCREMENT=13 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

/*Data for the table `tb_list_kursi` */

insert  into `tb_list_kursi`(`id_list_kursi`,`id_kursi`,`id_tayang`,`status`,`created_at`,`updated_at`) values 
(2,1,2,'terpesan',NULL,'2018-05-14 03:45:42'),
(3,2,2,'terpesan',NULL,'2018-05-12 08:53:16'),
(4,3,2,'tersedia',NULL,'2018-05-22 13:39:25'),
(5,4,2,'terpesan',NULL,'2018-05-14 03:49:26'),
(6,5,2,'terpesan',NULL,'2018-05-14 04:09:48'),
(7,6,2,'terpesan',NULL,'2018-05-22 11:27:33'),
(8,7,2,'tersedia',NULL,'2018-05-14 03:37:51'),
(9,1,8,'tersedia','2018-05-16 02:27:27','2018-05-16 02:27:27'),
(10,1,5,'tersedia','2018-05-24 04:50:35','2018-05-24 04:50:35'),
(11,2,5,'tersedia','2018-05-24 04:50:42','2018-05-24 04:50:42'),
(12,3,5,'tersedia','2018-05-24 04:50:48','2018-05-24 04:50:48');

/*Table structure for table `tb_studio` */

DROP TABLE IF EXISTS `tb_studio`;

CREATE TABLE `tb_studio` (
  `id_studio` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `nama_studio` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id_studio`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

/*Data for the table `tb_studio` */

insert  into `tb_studio`(`id_studio`,`nama_studio`,`created_at`,`updated_at`) values 
(1,'A1',NULL,NULL),
(2,'B1',NULL,NULL),
(3,'C1','2018-05-23 02:36:17','2018-05-23 02:36:17');

/*Table structure for table `tb_tayang` */

DROP TABLE IF EXISTS `tb_tayang`;

CREATE TABLE `tb_tayang` (
  `id_tayang` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `waktu_tayang` datetime NOT NULL,
  `harga_tiket` int(11) NOT NULL,
  `id_film` int(10) unsigned NOT NULL,
  `id_studio` int(10) unsigned NOT NULL,
  `id_user` int(10) unsigned NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id_tayang`),
  KEY `tb_tayang_id_user_foreign` (`id_user`),
  KEY `tb_tayang_id_film_foreign` (`id_film`),
  KEY `tb_tayang_id_studio_foreign` (`id_studio`),
  CONSTRAINT `tb_tayang_id_film_foreign` FOREIGN KEY (`id_film`) REFERENCES `tb_film` (`id_film`) ON DELETE CASCADE,
  CONSTRAINT `tb_tayang_id_studio_foreign` FOREIGN KEY (`id_studio`) REFERENCES `tb_studio` (`id_studio`) ON DELETE CASCADE,
  CONSTRAINT `tb_tayang_id_user_foreign` FOREIGN KEY (`id_user`) REFERENCES `users` (`id`) ON DELETE CASCADE
) ENGINE=InnoDB AUTO_INCREMENT=15 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

/*Data for the table `tb_tayang` */

insert  into `tb_tayang`(`id_tayang`,`waktu_tayang`,`harga_tiket`,`id_film`,`id_studio`,`id_user`,`created_at`,`updated_at`) values 
(2,'2018-05-24 15:03:38',70000,1,1,1,NULL,NULL),
(5,'2018-04-20 15:47:34',0,1,1,1,NULL,NULL),
(6,'2018-04-21 15:48:06',0,1,1,1,NULL,NULL),
(7,'2018-04-22 15:48:15',0,1,1,1,NULL,NULL),
(8,'2018-04-23 15:48:31',0,1,1,1,NULL,NULL),
(9,'2018-04-24 15:48:39',0,1,1,1,NULL,NULL),
(10,'2018-04-25 15:48:47',0,1,1,1,NULL,NULL),
(12,'0000-00-00 00:00:00',78000,2,1,1,'2018-05-16 01:17:01','2018-05-16 01:17:01'),
(13,'2018-05-24 09:13:00',89000,1,1,1,'2018-05-16 01:21:21','2018-05-16 01:21:21'),
(14,'2018-05-24 09:13:00',89000,1,1,1,'2018-05-16 01:21:47','2018-05-16 01:21:47');

/*Table structure for table `tb_transaksi` */

DROP TABLE IF EXISTS `tb_transaksi`;

CREATE TABLE `tb_transaksi` (
  `id_transaksi` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `method` enum('transfer','kartu_kredit') COLLATE utf8mb4_unicode_ci NOT NULL,
  `waktu_transaksi` datetime NOT NULL,
  `id_booking` int(10) unsigned NOT NULL,
  `id_user` int(10) unsigned NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `status` enum('belum_dibayar','dibayar','lunas') COLLATE utf8mb4_unicode_ci NOT NULL,
  PRIMARY KEY (`id_transaksi`),
  KEY `tb_transaksi_id_booking_foreign` (`id_booking`),
  KEY `tb_transaksi_id_user_foreign` (`id_user`),
  CONSTRAINT `tb_transaksi_id_booking_foreign` FOREIGN KEY (`id_booking`) REFERENCES `tb_booking` (`id_booking`) ON DELETE CASCADE,
  CONSTRAINT `tb_transaksi_id_user_foreign` FOREIGN KEY (`id_user`) REFERENCES `users` (`id`) ON DELETE CASCADE
) ENGINE=InnoDB AUTO_INCREMENT=20 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

/*Data for the table `tb_transaksi` */

insert  into `tb_transaksi`(`id_transaksi`,`method`,`waktu_transaksi`,`id_booking`,`id_user`,`created_at`,`updated_at`,`status`) values 
(11,'transfer','2017-05-14 11:38:06',25,3,'2017-05-14 03:38:06','2018-05-14 04:51:00','lunas'),
(12,'kartu_kredit','2018-05-14 12:09:55',26,3,'2018-05-14 04:09:55','2018-05-14 04:47:25','lunas'),
(13,'transfer','2018-05-22 19:27:42',27,2,'2018-05-22 11:27:42','2018-05-22 11:30:26','lunas'),
(15,'transfer','2018-04-01 11:55:08',25,1,'2018-04-01 10:34:32',NULL,'belum_dibayar'),
(16,'transfer','2018-06-01 12:34:52',25,1,NULL,NULL,'belum_dibayar'),
(18,'transfer','2018-07-01 12:34:58',25,1,NULL,NULL,'belum_dibayar'),
(19,'transfer','2018-05-24 12:52:11',28,1,'2018-05-24 04:52:11','2018-05-24 04:53:20','lunas');

/*Table structure for table `users` */

DROP TABLE IF EXISTS `users`;

CREATE TABLE `users` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `password` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `alamat` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `telepon` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `tgl_daftar` date NOT NULL,
  `admin` tinyint(1) NOT NULL DEFAULT '0',
  `status` enum('online','offline') COLLATE utf8mb4_unicode_ci NOT NULL,
  `image` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `remember_token` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `users_id_unique` (`id`),
  UNIQUE KEY `users_email_unique` (`email`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

/*Data for the table `users` */

insert  into `users`(`id`,`name`,`email`,`password`,`alamat`,`telepon`,`tgl_daftar`,`admin`,`status`,`image`,`remember_token`,`created_at`,`updated_at`) values 
(1,'Wayan Gunaya','gunayahokage@gmail.com','$2y$10$Q5ffwJtl9BikEqwHE2qgzeG6Fk4BKtaMAUbVox5Ol0K.IkQKKmko.','Jl Kampus Unud Bukit Jimbaran','081234567890','0000-00-00',1,'online','gunayahokage@gmail.com_05-03-2018.jpg','rguixbQGleE2uJ5Cn1FsEkhUE1hQTRJSmJ6PLCeJd53sfaZb3vDdkF9J0uSf','2018-03-26 08:32:12','2018-05-03 06:50:59'),
(2,'widiari','widiariayyu@gmail.com','$2y$10$IAemPwho.cdzUXAOfX47ze6IS.8/Vw4gKhZHoCKUByX55LOinPTvO','aaa','','0000-00-00',0,'online','AurlZ.png','acndH92vjllPgUal39hI6vKJYHg5Ga1R5LQKhcpDzLnqwrXgD3OQPLvDxTu6','2018-03-27 08:16:18','2018-05-01 06:50:49'),
(3,'dummy','dummy@email.com','$2y$10$T/LJ/DzbmnoZ9AlG2rw3leWm9TsMcTV5R8Ft1lHHU4FseKbBNNA0C','','','0000-00-00',0,'online','','klIhqmFh7ct702azV5tAmkftrYaLsTqQD2lvfumE0Qc8tvD8eEDGyy7BwUeb','2018-05-12 08:50:59','2018-05-12 08:50:59');

/*!50106 set global event_scheduler = 1*/;

/* Event structure for event `auto_cancel` */

/*!50106 DROP EVENT IF EXISTS `auto_cancel`*/;

DELIMITER $$

/*!50106 CREATE DEFINER=`root`@`localhost` EVENT `auto_cancel` ON SCHEDULE EVERY 1 SECOND STARTS '2018-05-24 19:13:07' ON COMPLETION NOT PRESERVE ENABLE DO BEGIN
		UPDATE tb_booking
		JOIN tb_det_booking ON tb_booking.`id_booking` = tb_det_booking.`id_booking`
		JOIN tb_list_kursi ON tb_list_kursi.`id_list_kursi` = tb_det_booking.`id_list_kursi`
		SET tb_booking.`status` = 'gagal', tb_list_kursi.`status` = 'tersedia'
		WHERE TIMESTAMPDIFF(SECOND, tb_booking.`batas_transaksi`, NOW()) > 1 AND tb_booking.`status` ='belum_lunas';
	END */$$
DELIMITER ;

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;
