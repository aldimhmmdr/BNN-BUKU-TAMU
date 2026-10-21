-- --------------------------------------------------------
-- Host:                         127.0.0.1
-- Server version:               8.4.3 - MySQL Community Server - GPL
-- Server OS:                    Win64
-- HeidiSQL Version:             12.8.0.6908
-- --------------------------------------------------------

/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET NAMES utf8 */;
/*!50503 SET NAMES utf8mb4 */;
/*!40103 SET @OLD_TIME_ZONE=@@TIME_ZONE */;
/*!40103 SET TIME_ZONE='+00:00' */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;
/*!40111 SET @OLD_SQL_NOTES=@@SQL_NOTES, SQL_NOTES=0 */;


-- Dumping database structure for buku_kunjungan
CREATE DATABASE IF NOT EXISTS `buku_kunjungan` /*!40100 DEFAULT CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci */ /*!80016 DEFAULT ENCRYPTION='N' */;
USE `buku_kunjungan`;

-- Dumping structure for table buku_kunjungan.cache
CREATE TABLE IF NOT EXISTS `cache` (
  `key` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `value` mediumtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `expiration` bigint NOT NULL,
  PRIMARY KEY (`key`),
  KEY `cache_expiration_index` (`expiration`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- Dumping data for table buku_kunjungan.cache: ~0 rows (approximately)

-- Dumping structure for table buku_kunjungan.cache_locks
CREATE TABLE IF NOT EXISTS `cache_locks` (
  `key` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `owner` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `expiration` bigint NOT NULL,
  PRIMARY KEY (`key`),
  KEY `cache_locks_expiration_index` (`expiration`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- Dumping data for table buku_kunjungan.cache_locks: ~0 rows (approximately)

-- Dumping structure for table buku_kunjungan.failed_jobs
CREATE TABLE IF NOT EXISTS `failed_jobs` (
  `id` bigint unsigned NOT NULL AUTO_INCREMENT,
  `uuid` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `connection` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `queue` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `payload` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `exception` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `failed_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`),
  UNIQUE KEY `failed_jobs_uuid_unique` (`uuid`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- Dumping data for table buku_kunjungan.failed_jobs: ~0 rows (approximately)

-- Dumping structure for table buku_kunjungan.guests
CREATE TABLE IF NOT EXISTS `guests` (
  `id` bigint unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `phone` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `address` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `purpose` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `purpose_lainnya` text COLLATE utf8mb4_unicode_ci,
  `status` enum('menunggu','dilayani','selesai') COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'menunggu',
  `duration_seconds` int NOT NULL DEFAULT '0',
  `completed_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=88 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- Dumping data for table buku_kunjungan.guests: ~87 rows (approximately)
INSERT INTO `guests` (`id`, `name`, `email`, `phone`, `address`, `purpose`, `purpose_lainnya`, `status`, `duration_seconds`, `completed_at`, `created_at`, `updated_at`) VALUES
	(1, 'Cecilia Schuppe', 'pouros.candida@jast.info', '083982460878', '9055 Giovanni Club Suite 903\nVolkmanland, NY 31995', 'skhpn', NULL, 'selesai', 780, '2026-04-30 22:29:22', '2026-04-30 22:16:22', '2026-04-30 22:29:22'),
	(2, 'Ellis Kerluke', 'katelin73@kuphal.info', '088283352038', '62329 Zieme Underpass\nSouth Paige, FL 93313-8732', 'lainnya', 'Diskusi program', 'selesai', 1140, '2026-05-04 22:35:22', '2026-05-04 22:16:22', '2026-05-04 22:35:22'),
	(3, 'Dr. Clovis Bradtke Jr.', 'raynor.luella@yahoo.com', '089966684741', '3526 Webster Corner Suite 722\nSeamustown, PA 24337-6214', 'pemberantasan', NULL, 'selesai', 1260, '2026-05-11 22:37:22', '2026-05-11 22:16:22', '2026-05-11 22:37:22'),
	(4, 'Yvette Rempel DDS', NULL, '087948223749', '784 O\'Reilly Run Apt. 318\nPort Declan, IA 26541', 'pemberantasan', NULL, 'dilayani', 1800, NULL, '2026-04-22 22:16:22', '2026-04-22 22:16:22'),
	(5, 'Roy Mante', 'adaline.dickinson@gmail.com', '086294128349', '257 Doris Motorway Apt. 007\nClaireville, MA 98634-5304', 'pemberantasan', NULL, 'selesai', 2040, '2026-04-30 22:50:22', '2026-04-30 22:16:22', '2026-04-30 22:50:22'),
	(6, 'Aurore Koch Jr.', NULL, '088283914995', '2774 Goodwin Lane\nGeoview, ND 15407', 'skhpn', NULL, 'selesai', 1140, '2026-01-18 22:35:22', '2026-01-18 22:16:22', '2026-01-18 22:35:22'),
	(7, 'Ms. Ivy Howe III', 'kasandra78@gmail.com', '089521071320', '5918 Beier Port Suite 518\nBeerfort, HI 66800-6725', 'lainnya', 'Keperluan pribadi', 'dilayani', 3480, NULL, '2026-03-11 22:16:22', '2026-03-11 22:16:22'),
	(8, 'Ignatius Hettinger', 'demarcus.mraz@bernier.com', '088564116669', '1138 Sammie Mountains Suite 622\nWymanville, NE 20079-5614', 'pemberantasan', NULL, 'dilayani', 1620, NULL, '2026-05-17 01:52:22', '2026-05-17 01:52:22'),
	(9, 'Mr. Jedediah Bergstrom', 'sadye97@gmail.com', '084416248620', '706 Albert Road Suite 973\nAbdullahborough, NV 53776-7184', 'rehabilitas', NULL, 'dilayani', 2460, NULL, '2026-05-13 22:16:22', '2026-05-13 22:16:22'),
	(10, 'Ms. Elaina McCullough Sr.', 'kirk00@corwin.com', '087419200502', '67909 Elvera Pike Suite 029\nNew Salvatoreberg, CT 58452', 'pemberantasan', NULL, 'selesai', 60, '2026-05-17 17:05:22', '2026-05-17 17:04:22', '2026-05-17 17:05:22'),
	(11, 'Leonardo Schoen DDS', 'qlindgren@yahoo.com', '088707769984', '2549 Yadira Ridges Suite 924\nWest Leopoldohaven, OK 28855', 'bagian umum', NULL, 'menunggu', 1320, NULL, '2026-04-17 22:16:22', '2026-04-17 22:16:22'),
	(12, 'Lois Little', 'wromaguera@yahoo.com', '085208440455', '105 Lempi Springs Suite 209\nPort Leta, DE 85234', 'lainnya', 'Diskusi program', 'selesai', 540, '2025-11-07 22:25:22', '2025-11-07 22:16:22', '2025-11-07 22:25:22'),
	(13, 'Miss Alvina Monahan II', NULL, '086696545757', '78905 Taryn Skyway\nSouth Schuyler, AZ 78084', 'rehabilitas', NULL, 'selesai', 1740, '2025-06-29 22:45:22', '2025-06-29 22:16:22', '2025-06-29 22:45:22'),
	(14, 'Emmy Murphy', 'langosh.casper@kuhic.com', '082581008324', '907 White Shore Apt. 589\nMayerburgh, OH 13198-6304', 'bagian umum', NULL, 'menunggu', 2580, NULL, '2025-05-25 22:16:22', '2025-05-25 22:16:22'),
	(15, 'Enola Ratke', 'buster.weissnat@gmail.com', '085816593336', '643 Wisoky Shores\nLakinland, MS 14247-8155', 'rehabilitas', NULL, 'menunggu', 300, NULL, '2026-04-20 22:16:22', '2026-04-20 22:16:22'),
	(16, 'Ms. Hassie Rohan II', 'zetta88@veum.info', '087045607226', '2165 Noemie Mountain Apt. 900\nMannport, AL 54206', 'skhpn', NULL, 'selesai', 3420, '2026-05-17 00:45:22', '2026-05-16 23:48:22', '2026-05-17 00:45:22'),
	(17, 'Piper Gutmann', 'alden.volkman@dietrich.com', '084224311686', '70995 Wayne Lake\nSouth Kali, OR 37067-1170', 'pemberantasan', NULL, 'selesai', 2520, '2026-05-16 22:58:22', '2026-05-16 22:16:22', '2026-05-16 22:58:22'),
	(18, 'Madalyn Ruecker', 'althea.jerde@davis.com', '081614294594', '6156 Marcus Landing Apt. 476\nNew Leolaborough, VT 15486-0865', 'pemberantasan', NULL, 'selesai', 180, '2026-01-28 22:19:22', '2026-01-28 22:16:22', '2026-01-28 22:19:22'),
	(19, 'Dolly Rath', 'runte.ericka@smith.com', '083135033454', '79910 Rory Common\nAbbottside, NE 56791', 'lainnya', 'Keperluan pribadi', 'selesai', 2820, '2026-05-17 17:48:22', '2026-05-17 17:01:22', '2026-05-17 17:48:22'),
	(20, 'Miss Kathryne Kirlin MD', 'jace.schowalter@hotmail.com', '084732253499', '2710 Parisian Street Suite 302\nWest Norberto, OH 37379-5854', 'rehabilitas', NULL, 'selesai', 2880, '2026-05-17 04:21:22', '2026-05-17 03:33:22', '2026-05-17 04:21:22'),
	(21, 'George Reichel', 'djerde@yahoo.com', '080264704518', '4050 Conroy Point Apt. 227\nPort Deven, UT 07587-8439', 'bagian umum', NULL, 'selesai', 540, '2026-05-17 14:31:22', '2026-05-17 14:22:22', '2026-05-17 14:31:22'),
	(22, 'Dr. Ed O\'Reilly MD', 'okon.cecile@gmail.com', '084245779762', '42645 Schuppe Stream Suite 560\nNorth Kendallview, UT 51417-0639', 'rehabilitas', NULL, 'dilayani', 3060, NULL, '2025-10-07 22:16:22', '2025-10-07 22:16:22'),
	(23, 'Dr. Tania Haag', 'fritsch.kirstin@yahoo.com', '082592918382', '29618 Karson Ports\nChanelmouth, WI 96000', 'lainnya', 'Pelatihan staf', 'selesai', 180, '2026-05-17 22:09:22', '2026-05-17 22:06:22', '2026-05-17 22:09:22'),
	(24, 'Jarrett Hamill', NULL, '088682295592', '23437 Cummerata Inlet\nWest Warren, ND 75352-7481', 'bagian umum', NULL, 'dilayani', 720, NULL, '2026-05-08 22:16:22', '2026-05-08 22:16:22'),
	(25, 'Miss Della Wuckert II', NULL, '082101003519', '89917 Sam Roads Suite 478\nWest Gussieview, KS 17979-3482', 'rehabilitas', NULL, 'menunggu', 180, NULL, '2026-05-14 22:16:22', '2026-05-14 22:16:22'),
	(26, 'Mr. Chadrick Balistreri II', NULL, '082800487063', '3988 Rempel Lake Suite 785\nEast Zaneside, NY 80530', 'pemberantasan', NULL, 'selesai', 1320, '2026-05-17 20:35:22', '2026-05-17 20:13:22', '2026-05-17 20:35:22'),
	(27, 'Prof. Silas Grady', 'jerod61@hilpert.com', '080459703056', '6961 Cronin Underpass\nAuerport, SC 98160', 'rehabilitas', NULL, 'dilayani', 540, NULL, '2025-11-24 22:16:22', '2025-11-24 22:16:22'),
	(28, 'Scot Renner', 'carroll08@marks.com', '083570875180', '122 Christiansen Port Apt. 693\nEast Kristofershire, DE 73222-9638', 'lainnya', 'Keperluan pribadi', 'selesai', 2640, '2025-09-26 23:00:22', '2025-09-26 22:16:22', '2025-09-26 23:00:22'),
	(29, 'Nellie Kling', NULL, '086708038579', '415 Lebsack Valley\nWaelchifort, WA 36169-1311', 'rehabilitas', NULL, 'menunggu', 3300, NULL, '2026-05-10 22:16:22', '2026-05-10 22:16:22'),
	(30, 'Afton Dickens III', NULL, '082702588114', '83812 Janie Estate\nIkeburgh, MI 79537-1262', 'pemberantasan', NULL, 'selesai', 2580, '2025-08-31 22:59:22', '2025-08-31 22:16:22', '2025-08-31 22:59:22'),
	(31, 'Prof. Kelsie Rowe V', NULL, '082435343384', '9387 Hoppe Forge\nWardmouth, GA 78157-4701', 'rehabilitas', NULL, 'selesai', 300, '2026-05-05 22:21:22', '2026-05-05 22:16:22', '2026-05-05 22:21:22'),
	(32, 'Ellis Heller DVM', NULL, '088600356321', '244 Crystal Flats\nLake Amira, LA 29826', 'bagian umum', NULL, 'selesai', 720, '2026-05-13 22:28:22', '2026-05-13 22:16:22', '2026-05-13 22:28:22'),
	(33, 'Luigi Crooks', 'ffarrell@gmail.com', '084036161434', '137 Hillary Course Apt. 298\nTaliaborough, KY 84064-4652', 'skhpn', NULL, 'selesai', 360, '2025-07-25 22:22:22', '2025-07-25 22:16:22', '2025-07-25 22:22:22'),
	(34, 'Lucious Gleason', 'marcia.greenholt@schumm.info', '083105941822', '295 Faye Lakes Apt. 884\nWest Wellington, FL 88450-7981', 'lainnya', 'Pertemuan formal', 'dilayani', 1440, NULL, '2026-05-13 22:16:22', '2026-05-13 22:16:22'),
	(35, 'Ms. Michelle Hill', 'angie42@hotmail.com', '087548324406', '460 Rusty Course Apt. 136\nPourosland, IA 30926', 'lainnya', 'Keperluan pribadi', 'menunggu', 3180, NULL, '2026-04-19 22:16:22', '2026-04-19 22:16:22'),
	(36, 'Prof. Fredrick Abshire', 'ottilie67@hotmail.com', '083760473294', '581 Bud Stravenue Suite 444\nEast Jamarshire, OR 66089', 'pemberantasan', NULL, 'menunggu', 720, NULL, '2026-05-17 03:14:22', '2026-05-17 03:14:22'),
	(37, 'Lionel Kuhic', 'ida.hayes@renner.com', '085956887949', '9607 Eladio Run\nWest Daphnetown, NJ 49748-5021', 'pemberantasan', NULL, 'selesai', 2040, '2026-05-17 04:08:22', '2026-05-17 03:34:22', '2026-05-17 04:08:22'),
	(38, 'Emely Parker', 'raynor.eulah@stokes.com', '088400501946', '2989 Gennaro Club Suite 407\nLake Madyson, UT 22263', 'bagian umum', NULL, 'dilayani', 3120, NULL, '2025-09-25 22:16:22', '2025-09-25 22:16:22'),
	(39, 'Mafalda Smitham Jr.', NULL, '089491101836', '780 Graham Glens\nGerholdchester, TN 10389', 'rehabilitas', NULL, 'dilayani', 1800, NULL, '2026-02-25 22:16:22', '2026-02-25 22:16:22'),
	(40, 'Dock Olson PhD', NULL, '082806105205', '709 Thiel Villages Suite 159\nWest Oliver, CA 67905', 'lainnya', 'Diskusi program', 'selesai', 960, '2025-07-07 22:32:22', '2025-07-07 22:16:22', '2025-07-07 22:32:22'),
	(41, 'Dr. Carole Kunze', 'okling@ruecker.net', '084599985013', '703 Keegan Inlet Suite 392\nHagenesmouth, NJ 20842-7725', 'rehabilitas', NULL, 'selesai', 1980, '2025-07-02 22:49:22', '2025-07-02 22:16:22', '2025-07-02 22:49:22'),
	(42, 'Dr. Kristian Bergnaum Jr.', NULL, '088831099295', '219 Claudie Mills Suite 899\nPort Hannahburgh, NM 84420', 'lainnya', 'Pelatihan staf', 'selesai', 3300, '2026-05-10 23:11:22', '2026-05-10 22:16:22', '2026-05-10 23:11:22'),
	(43, 'Alverta Gottlieb', NULL, '087064179641', '130 Alek Flat Suite 737\nSouth Leonie, NH 42538-9438', 'bagian umum', NULL, 'selesai', 2940, '2025-10-05 23:05:22', '2025-10-05 22:16:22', '2025-10-05 23:05:22'),
	(44, 'Prof. Joey Yost I', NULL, '086877651896', '50123 Wolff Park Apt. 970\nEast Amara, MA 86037', 'skhpn', NULL, 'selesai', 1020, '2026-05-10 22:33:22', '2026-05-10 22:16:22', '2026-05-10 22:33:22'),
	(45, 'Maci Feil', NULL, '084318973792', '39684 Viola Pass\nNew Evalyn, ND 76688', 'lainnya', 'Konsultasi khusus', 'selesai', 2520, '2025-06-16 22:58:22', '2025-06-16 22:16:22', '2025-06-16 22:58:22'),
	(46, 'Waldo Harber', 'lockman.david@price.org', '080740283347', '738 Aufderhar Dam\nJalenmouth, IL 34438', 'lainnya', 'Diskusi program', 'selesai', 3180, '2026-04-23 23:09:22', '2026-04-23 22:16:22', '2026-04-23 23:09:22'),
	(47, 'Miss Laura Ankunding I', 'luther88@dicki.com', '088655563714', '326 Labadie Light Suite 638\nEast Myrtiston, NH 39842-6249', 'bagian umum', NULL, 'selesai', 120, '2026-04-30 22:18:22', '2026-04-30 22:16:22', '2026-04-30 22:18:22'),
	(48, 'Margarita Nienow', 'miller.gretchen@considine.com', '085572605539', '18571 Chaya Island Apt. 890\nMetzfort, RI 57753', 'skhpn', NULL, 'dilayani', 840, NULL, '2026-05-16 22:55:22', '2026-05-16 22:55:22'),
	(49, 'Vidal Douglas V', 'hermiston.george@grimes.biz', '085011007212', '464 Ward Island Suite 450\nMcDermotttown, TX 40425', 'lainnya', 'Konsultasi khusus', 'dilayani', 1500, NULL, '2026-05-11 22:16:22', '2026-05-11 22:16:22'),
	(50, 'Dorcas Rippin I', NULL, '080602640528', '5099 Dickens Court\nNorth Travon, MD 12326', 'skhpn', NULL, 'selesai', 11367, '2026-05-17 22:19:48', '2026-05-17 19:10:22', '2026-05-17 22:19:48'),
	(51, 'Leon Larson', 'slarkin@gmail.com', '080779214138', '316 Cartwright Cliffs\nWest Doris, MT 78621', 'bagian umum', NULL, 'selesai', 2640, '2025-12-16 23:00:22', '2025-12-16 22:16:22', '2025-12-16 23:00:22'),
	(52, 'Rubie Christiansen', 'shyann.streich@lind.com', '086319989023', '9146 Lexie Land\nLake Judsonfurt, KY 91390-1610', 'rehabilitas', NULL, 'selesai', 2220, '2026-05-16 22:53:22', '2026-05-16 22:16:22', '2026-05-16 22:53:22'),
	(53, 'Prof. Lyric Rohan Jr.', NULL, '087550125568', '809 Dooley Alley Suite 372\nSchadentown, NJ 13683-6191', 'rehabilitas', NULL, 'selesai', 2940, '2026-05-15 23:05:22', '2026-05-15 22:16:22', '2026-05-15 23:05:22'),
	(54, 'Curt Thompson', NULL, '088984690431', '78411 Von Haven\nWest Charlieton, AL 53817', 'lainnya', 'Audit internal', 'dilayani', 360, NULL, '2026-04-27 22:16:22', '2026-04-27 22:16:22'),
	(55, 'Dr. Abdiel Kub', 'maximo50@legros.com', '081793596742', '8143 Ruthie Hill\nPort Pink, KY 05795', 'pemberantasan', NULL, 'menunggu', 2760, NULL, '2025-07-27 22:16:22', '2025-07-27 22:16:22'),
	(56, 'Friedrich Lebsack III', NULL, '085963142897', '741 Hildegard Freeway Suite 603\nLake Jaclynfurt, UT 68286-3246', 'lainnya', 'Diskusi program', 'selesai', 2520, '2026-05-15 22:58:22', '2026-05-15 22:16:22', '2026-05-15 22:58:22'),
	(57, 'aldi muhammad r', 'aldimhmmd12@gmail.com', '0812345675432', 'JL. Jupiter raya no.123 rt08 rw12. gedebage', 'bagian umum', NULL, 'selesai', 12893669, '2026-10-14 03:58:00', '2026-05-17 22:23:31', '2026-10-14 03:58:00'),
	(58, 'dika', 'dika123@gmail.com', '08233421323', 'JL. Teratai 5 No.23 RT09 RW10', 'rehabilitas', NULL, 'selesai', 466, '2026-05-20 00:29:54', '2026-05-20 00:22:09', '2026-05-20 00:29:54'),
	(59, 'dika', NULL, '08233421323', 'Jl. Terati 4 NO.123 Rt09 rw01', 'wawancara', 'wawancara', 'selesai', 533, '2026-05-20 00:32:26', '2026-05-20 00:23:34', '2026-05-20 00:32:26'),
	(60, 'muhammad dika', NULL, '0912399921', 'di bandung', 'pemberantasan', NULL, 'selesai', 124, '2026-05-20 00:44:47', '2026-05-20 00:42:44', '2026-05-20 00:44:47'),
	(61, 'syahidan fitrah', 'syahidan@gmail.com', '08976542131', 'JL. Sekeloa Timur No.123 Rt07 Rw12', 'rehabilitas', NULL, 'selesai', 51, '2026-05-20 16:24:12', '2026-05-20 16:23:22', '2026-05-20 16:24:12'),
	(62, 'aldi muhammad', 'aldimhmmd12@gmail.com', '08543123712', 'JL. Setiabudi No.45 Rt10 Rw09', 'magang', 'magang', 'selesai', 12655623, '2026-10-14 03:57:55', '2026-05-20 16:30:52', '2026-10-14 03:57:55'),
	(63, 'akmal', 'akmal@gmail.com', '081234992102', 'jl. raya rancaekek-garut no 433 rt01 rw12', 'rehabilitas', NULL, 'selesai', 38, '2026-05-27 07:49:07', '2026-05-27 07:48:29', '2026-05-27 07:49:07'),
	(64, 'aldi muhammad r', 'aldimhmmd@gmail.com', '08543123712', 'JL. Setiabudi no.23', 'rehabilitas', NULL, 'selesai', 119, '2026-06-01 23:49:07', '2026-06-01 23:47:08', '2026-06-01 23:49:07'),
	(65, 'adan', 'adanahmad@gmail.com', '081212764321', 'Jl. Setiabudi 123 rt7 rw25', 'wawancara', 'wawancara', 'selesai', 85, '2026-06-09 02:56:14', '2026-06-09 02:54:50', '2026-06-09 02:56:14'),
	(66, 'adan ahmad', 'adanahmad@gmail.com', '0812345676543', 'JL. Setiabudi No.123 Bandung', 'rehabilitas', NULL, 'selesai', 1376, '2026-06-11 00:47:34', '2026-06-11 00:24:39', '2026-06-11 00:47:34'),
	(67, 'aldi', 'aldimr@gmail.com', '081212764321', 'Jalan Teratai 1 no 23', 'bagian umum', NULL, 'selesai', 215, '2026-06-11 00:41:11', '2026-06-11 00:37:37', '2026-06-11 00:41:11'),
	(68, 'ahmad saeful', 'ahmads@gmail.com', '08123456761', 'JL. Baleendah Selatan No.125', 'skhpn', NULL, 'selesai', 93, '2026-06-11 00:40:53', '2026-06-11 00:39:20', '2026-06-11 00:40:53'),
	(69, 'consina', 'consina@gmail.com', '08765329871', 'JL. Jupiter raya no.32', 'rehabilitas', NULL, 'selesai', 83, '2026-06-12 17:27:15', '2026-06-12 17:25:52', '2026-06-12 17:27:15'),
	(70, 'adzam maulana', 'maulana@gmail.com', '08765329871', 'JL. Saturnus No.45', 'bagian umum', NULL, 'selesai', 186, '2026-06-12 17:31:52', '2026-06-12 17:28:46', '2026-06-12 17:31:52'),
	(71, 'aldi muhammad r', 'aldimhmmd@gmail.com', '081234992102', 'JL. SUKARASA NO.123 RT5 RW3 SUKAJADI BANDUNG', 'rehabilitas', NULL, 'selesai', 2917, '2026-06-24 03:22:18', '2026-06-24 02:33:41', '2026-06-24 03:22:18'),
	(72, 'aldi muhammad r', 'aldimhmmd12@gmail.com', '08976542131', '-', 'rehabilitas', NULL, 'selesai', 7258810, '2026-10-14 03:58:14', '2026-07-22 03:38:05', '2026-10-14 03:58:14'),
	(73, 'aldi muhammad r', 'aldimhmmd@gmail.com', '08233421323', 'JL SETIABUDI NO.23', 'wawancara', 'wawancara', 'selesai', 7257732, '2026-10-14 03:58:09', '2026-07-22 03:55:58', '2026-10-14 03:58:09'),
	(74, 'dika', 'dika123@gmail.com', '08976542131', 'jl a', 'pemberantasan', NULL, 'dilayani', 0, NULL, '2026-07-22 03:56:43', '2026-07-22 04:00:22'),
	(75, 'aldi', 'aldim.ramdhani80s@gmail.com', '08814566371', 'Jalan Teratai 1 no 23', 'skhpn', NULL, 'selesai', 5961728, '2026-10-14 03:58:05', '2026-08-06 03:55:57', '2026-10-14 03:58:05'),
	(76, 'testing123', 'testing@gmail.com', '08814566371', 'TEST', 'pemberantasan', NULL, 'selesai', 5672, '2026-08-09 17:16:16', '2026-08-09 15:41:45', '2026-08-09 17:16:16'),
	(77, 'testing123', 'testing@gmail.com', '08765329871', 'test', 'rehabilitas', NULL, 'selesai', 5288, '2026-08-09 17:16:12', '2026-08-09 15:48:05', '2026-08-09 17:16:12'),
	(78, 'abc12', 'abc@gmail.com', '08765329871', 'abc', 'rehabilitas', NULL, 'selesai', 4396, '2026-08-09 17:16:07', '2026-08-09 16:02:52', '2026-08-09 17:16:07'),
	(79, 'ini lagi', 'adalagi@gmail.com', '21234985732', 'ada terus', 'skhpn', NULL, 'selesai', 3732, '2026-08-09 17:16:03', '2026-08-09 16:13:51', '2026-08-09 17:16:03'),
	(80, 'aduh test lagi', 'testing@gmail.com', '08765329871', 'test terus', 'bagian umum', NULL, 'selesai', 1769, '2026-08-09 17:15:59', '2026-08-09 16:46:30', '2026-08-09 17:15:59'),
	(81, 'test mulu', 'testing@gmail.com', '08123456761', 'test mulu nih', 'magang', 'magang', 'selesai', 138, '2026-08-09 17:06:23', '2026-08-09 17:04:06', '2026-08-09 17:06:23'),
	(82, 'assswaaer', 'testing@gmail.com', '08765329871', 'awqqqsaqw', 'wawancara', 'wawancara', 'selesai', 490, '2026-08-09 17:16:32', '2026-08-09 17:08:22', '2026-08-09 17:16:32'),
	(83, 'Aldi Mhmmd R', 'aldim.rs@gmail.com', '08121276437819', 'Jalan Teratai 1 no 23', 'skhpn', NULL, 'selesai', 361, '2026-08-09 17:16:27', '2026-08-09 17:10:27', '2026-08-09 17:16:27'),
	(84, 'final test', 'testing@gmail.com', '08123456761', 'final test', 'bagian umum', NULL, 'selesai', 32, '2026-08-09 17:53:13', '2026-08-09 17:52:42', '2026-08-09 17:53:13'),
	(85, 'aldi muhammmad r', 'ramdani.aldi93@gmail.com', '08814566371', 'Jalan Teratai 1 no 23', 'rehabilitas', NULL, 'selesai', 220, '2026-09-11 07:45:22', '2026-09-11 07:41:43', '2026-09-11 07:45:22'),
	(86, 'Aldi Mhmmd R', 'aldim.ramdhani80s@gmail.com', '08814566371', 'Jalan Teratai 1 no 23', 'skhpn', NULL, 'selesai', 29, '2026-10-14 03:39:20', '2026-10-14 03:38:51', '2026-10-14 03:39:20'),
	(87, 'kurniawan', 'kurniawan@gmail.com', '0845644114', 'cimahi', 'wawancara', 'wawancara', 'selesai', 84, '2026-10-14 03:48:18', '2026-10-14 03:46:55', '2026-10-14 03:48:18');

-- Dumping structure for table buku_kunjungan.jobs
CREATE TABLE IF NOT EXISTS `jobs` (
  `id` bigint unsigned NOT NULL AUTO_INCREMENT,
  `queue` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `payload` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `attempts` smallint unsigned NOT NULL,
  `reserved_at` int unsigned DEFAULT NULL,
  `available_at` int unsigned NOT NULL,
  `created_at` int unsigned NOT NULL,
  PRIMARY KEY (`id`),
  KEY `jobs_queue_index` (`queue`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- Dumping data for table buku_kunjungan.jobs: ~0 rows (approximately)

-- Dumping structure for table buku_kunjungan.job_batches
CREATE TABLE IF NOT EXISTS `job_batches` (
  `id` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `total_jobs` int NOT NULL,
  `pending_jobs` int NOT NULL,
  `failed_jobs` int NOT NULL,
  `failed_job_ids` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `options` mediumtext COLLATE utf8mb4_unicode_ci,
  `cancelled_at` int DEFAULT NULL,
  `created_at` int NOT NULL,
  `finished_at` int DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- Dumping data for table buku_kunjungan.job_batches: ~0 rows (approximately)

-- Dumping structure for table buku_kunjungan.migrations
CREATE TABLE IF NOT EXISTS `migrations` (
  `id` int unsigned NOT NULL AUTO_INCREMENT,
  `migration` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `batch` int NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=13 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- Dumping data for table buku_kunjungan.migrations: ~12 rows (approximately)
INSERT INTO `migrations` (`id`, `migration`, `batch`) VALUES
	(1, '0001_01_01_000000_create_users_table', 1),
	(2, '0001_01_01_000001_create_cache_table', 1),
	(3, '0001_01_01_000002_create_jobs_table', 1),
	(4, '2024_01_01_000003_create_guests_table', 1),
	(5, '2024_01_01_000004_add_email_and_duration_to_guests_table', 1),
	(6, '2024_01_01_000004_add_purpose_lainnya_to_guests_table', 1),
	(7, '2024_01_01_000005_add_duration_minutes_to_guests_table', 1),
	(8, '2026_05_17_000006_drop_duration_minutes_from_guests_table', 1),
	(9, '2026_08_08_225344_create_otp_verifications_table', 2),
	(10, '2026_08_08_230913_add_fields_to_otp_verifications_table', 3),
	(11, '2026_08_08_232936_add_attempts_to_otp_verifications_table', 4),
	(12, '2026_08_09_223513_create_visit_notifications_table', 5);

-- Dumping structure for table buku_kunjungan.otp_verifications
CREATE TABLE IF NOT EXISTS `otp_verifications` (
  `id` bigint unsigned NOT NULL AUTO_INCREMENT,
  `user_id` bigint unsigned NOT NULL,
  `otp` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `attempts` tinyint unsigned NOT NULL DEFAULT '0',
  `expires_at` timestamp NOT NULL,
  `verified_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `otp_verifications_user_id_foreign` (`user_id`),
  CONSTRAINT `otp_verifications_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE
) ENGINE=InnoDB AUTO_INCREMENT=23 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- Dumping data for table buku_kunjungan.otp_verifications: ~7 rows (approximately)
INSERT INTO `otp_verifications` (`id`, `user_id`, `otp`, `attempts`, `expires_at`, `verified_at`, `created_at`, `updated_at`) VALUES
	(1, 1, '$2y$12$4irswDPFntd4tHX7TLOE5epqe9HM5cjgXY8PrqcExcBDlirCrULZO', 0, '2026-08-08 16:16:17', '2026-08-08 16:14:48', '2026-08-08 16:11:17', '2026-08-08 16:14:48'),
	(9, 1, '$2y$12$J8zbUjOUmBurxPaUACDZ7.nhiZyt1e9EB8ek0EqhTAorJXB8Xfc7C', 1, '2026-08-08 17:29:41', '2026-08-08 17:25:08', '2026-08-08 17:24:41', '2026-08-08 17:25:08'),
	(18, 1, '$2y$12$UnUVW5xyEiaEYcd7gOLGO.ssbs46nVYs/AWdtLidU6OqSLZ88CZNC', 0, '2026-08-09 16:03:50', '2026-08-09 15:59:40', '2026-08-09 15:58:50', '2026-08-09 15:59:40'),
	(19, 1, '$2y$12$2YIfsTvL12bY30WBmNdR8OTpLYahnjvgn0ADcpaB16V32OgkHaS.q', 0, '2026-08-18 15:12:12', '2026-08-18 15:08:49', '2026-08-18 15:07:12', '2026-08-18 15:08:49'),
	(20, 1, '$2y$12$Rnzj74j.ZN3FKGKI53elu.RQSykY./mxMoK4t4V3c8RJymY8Neob6', 0, '2026-09-11 07:47:14', '2026-09-11 07:43:37', '2026-09-11 07:42:14', '2026-09-11 07:43:37'),
	(21, 1, '$2y$12$z5t/MFNhDvLfXWKGd8GQme/d0mUNf1eQ2Z/GjNECZ3/avoJWZjEOy', 0, '2026-10-14 03:38:03', '2026-10-14 03:36:56', '2026-10-14 03:33:03', '2026-10-14 03:36:56'),
	(22, 1, '$2y$12$qw2l29H7frp5spWeQFmad./fpj1M/o1X1.JCMtV0.7kcVL6JTKsqK', 0, '2026-10-14 03:58:00', '2026-10-14 03:53:41', '2026-10-14 03:53:00', '2026-10-14 03:53:41');

-- Dumping structure for table buku_kunjungan.password_reset_tokens
CREATE TABLE IF NOT EXISTS `password_reset_tokens` (
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `token` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`email`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- Dumping data for table buku_kunjungan.password_reset_tokens: ~0 rows (approximately)

-- Dumping structure for table buku_kunjungan.sessions
CREATE TABLE IF NOT EXISTS `sessions` (
  `id` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `user_id` bigint unsigned DEFAULT NULL,
  `ip_address` varchar(45) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `user_agent` text COLLATE utf8mb4_unicode_ci,
  `payload` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `last_activity` int NOT NULL,
  PRIMARY KEY (`id`),
  KEY `sessions_user_id_index` (`user_id`),
  KEY `sessions_last_activity_index` (`last_activity`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- Dumping data for table buku_kunjungan.sessions: ~4 rows (approximately)
INSERT INTO `sessions` (`id`, `user_id`, `ip_address`, `user_agent`, `payload`, `last_activity`) VALUES
	('0tZumlFe9XBiUudjrejdDS2ywzPmPQFlsEYc2Lsk', NULL, '127.0.0.1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/155.0.0.0 Safari/537.36', 'eyJfdG9rZW4iOiJpMENYWTZaOUlDdWVIZlJIY0NJWlZXS2lWdHRwUG5zVU01RjlRdUNyIiwiX3ByZXZpb3VzIjp7InVybCI6Imh0dHA6XC9cL2J1a3Uta3VuanVuZ2FuLnRlc3QiLCJyb3V0ZSI6Imd1ZXN0cy5mb3JtIn0sIl9mbGFzaCI6eyJvbGQiOltdLCJuZXciOltdfX0=', 1791949131),
	('6lZG6cpu1x33Zmyo0PUuS9aajI1BluNSHmLPsUyT', NULL, '172.40.3.108', 'Mozilla/5.0 (Android 16; Mobile; rv:157.0) Gecko/157.0 Firefox/157.0', 'eyJfdG9rZW4iOiJUSjNzVHJMd3BKTmlMVlYzb1MzbzhJRFVLdXdleGU3M2lHTHgyWjR1IiwiX3ByZXZpb3VzIjp7InVybCI6Imh0dHA6XC9cLzE3Mi40MC4wLjE5OFwvYnVrdS1rdW5qdW5nYW5cL3B1YmxpYyIsInJvdXRlIjoiZ3Vlc3RzLmZvcm0ifSwiX2ZsYXNoIjp7Im9sZCI6W10sIm5ldyI6W119fQ==', 1791949464),
	('lvSaV1O63zshkNU8JISS8PyFjmWryrqKKbLbm51p', NULL, '172.40.2.219', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/155.0.0.0 Safari/537.36', 'eyJfdG9rZW4iOiJWMlhaU3dIejJjcEgwYUV5T1MwTjlnWVNVZzg3MXNyS2FTMmdFR0loIiwiX2ZsYXNoIjp7Im5ldyI6W10sIm9sZCI6W119LCJfcHJldmlvdXMiOnsidXJsIjoiaHR0cDpcL1wvMTcyLjQwLjAuMTk4XC9idWt1LWt1bmp1bmdhblwvcHVibGljIiwicm91dGUiOiJndWVzdHMuZm9ybSJ9fQ==', 1791950783),
	('wMWVPhoKod0JAbNUd9Y7BADUOyNJDxMzgb6MhTA3', 1, '127.0.0.1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/155.0.0.0 Safari/537.36 Edg/155.0.0.0', 'eyJfdG9rZW4iOiJ2d1MzRXFKRW1CckJnRXh0bng0bDZRZGk4RmQ3RHZIazVuaURISHlKIiwiX3ByZXZpb3VzIjp7InVybCI6Imh0dHA6XC9cL2J1a3Uta3VuanVuZ2FuLnRlc3RcL2d1ZXN0cz9ndWVzdF9pZD04NyIsInJvdXRlIjoiZ3Vlc3RzLmluZGV4In0sIl9mbGFzaCI6eyJvbGQiOltdLCJuZXciOltdfSwibG9naW5fd2ViXzU5YmEzNmFkZGMyYjJmOTQwMTU4MGYwMTRjN2Y1OGVhNGUzMDk4OWQiOjF9', 1791949698);

-- Dumping structure for table buku_kunjungan.users
CREATE TABLE IF NOT EXISTS `users` (
  `id` bigint unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email_verified_at` timestamp NULL DEFAULT NULL,
  `password` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `remember_token` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `users_email_unique` (`email`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- Dumping data for table buku_kunjungan.users: ~1 rows (approximately)
INSERT INTO `users` (`id`, `name`, `email`, `email_verified_at`, `password`, `remember_token`, `created_at`, `updated_at`) VALUES
	(1, 'Petugas Admin', 'petugas@example.com', NULL, '$2y$12$Ff5GSIdULtMLPCm1aGJBqudptvhcl8nSlbWbiBdtc76RUei93fEAi', NULL, '2026-05-17 22:16:20', '2026-05-17 22:16:20');

-- Dumping structure for table buku_kunjungan.visit_notifications
CREATE TABLE IF NOT EXISTS `visit_notifications` (
  `id` bigint unsigned NOT NULL AUTO_INCREMENT,
  `guest_id` bigint unsigned NOT NULL,
  `type` varchar(50) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'guest_registered',
  `title` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `message` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `is_read` tinyint(1) NOT NULL DEFAULT '0',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `visit_notifications_guest_id_foreign` (`guest_id`),
  KEY `visit_notifications_is_read_created_at_index` (`is_read`,`created_at`),
  CONSTRAINT `visit_notifications_guest_id_foreign` FOREIGN KEY (`guest_id`) REFERENCES `guests` (`id`) ON DELETE CASCADE
) ENGINE=InnoDB AUTO_INCREMENT=12 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- Dumping data for table buku_kunjungan.visit_notifications: ~11 rows (approximately)
INSERT INTO `visit_notifications` (`id`, `guest_id`, `type`, `title`, `message`, `is_read`, `created_at`, `updated_at`) VALUES
	(1, 77, 'guest_registered', 'Tamu Baru', 'Tamu baru telah melakukan registrasi kunjungan.', 1, '2026-08-09 15:48:05', '2026-08-09 16:43:14'),
	(2, 78, 'guest_registered', 'Tamu Baru', 'Tamu baru telah melakukan registrasi kunjungan.', 1, '2026-08-09 16:02:52', '2026-08-09 16:43:14'),
	(3, 79, 'guest_registered', 'Tamu Baru', 'Tamu baru telah melakukan registrasi kunjungan.', 1, '2026-08-09 16:13:51', '2026-08-09 16:43:14'),
	(4, 80, 'guest_registered', 'Tamu Baru', 'Tamu baru telah melakukan registrasi kunjungan.', 1, '2026-08-09 16:46:30', '2026-08-09 16:46:37'),
	(5, 81, 'guest_registered', 'Tamu Baru', 'Tamu baru telah melakukan registrasi kunjungan.', 1, '2026-08-09 17:04:06', '2026-08-09 17:15:22'),
	(6, 82, 'guest_registered', 'Tamu Baru', 'Tamu baru telah melakukan registrasi kunjungan.', 1, '2026-08-09 17:08:23', '2026-08-09 17:15:19'),
	(7, 83, 'guest_registered', 'Tamu Baru', 'Tamu baru telah melakukan registrasi kunjungan.', 1, '2026-08-09 17:10:27', '2026-08-09 17:15:11'),
	(8, 84, 'guest_registered', 'Tamu Baru', 'Tamu baru telah melakukan registrasi kunjungan.', 1, '2026-08-09 17:52:42', '2026-08-09 17:53:10'),
	(9, 85, 'guest_registered', 'Tamu Baru', 'Tamu baru telah melakukan registrasi kunjungan.', 1, '2026-09-11 07:41:44', '2026-10-14 03:37:03'),
	(10, 86, 'guest_registered', 'Tamu Baru', 'Tamu baru telah melakukan registrasi kunjungan.', 1, '2026-10-14 03:38:51', '2026-10-14 03:39:02'),
	(11, 87, 'guest_registered', 'Tamu Baru', 'Tamu baru telah melakukan registrasi kunjungan.', 1, '2026-10-14 03:46:55', '2026-10-14 03:47:32');

/*!40103 SET TIME_ZONE=IFNULL(@OLD_TIME_ZONE, 'system') */;
/*!40101 SET SQL_MODE=IFNULL(@OLD_SQL_MODE, '') */;
/*!40014 SET FOREIGN_KEY_CHECKS=IFNULL(@OLD_FOREIGN_KEY_CHECKS, 1) */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40111 SET SQL_NOTES=IFNULL(@OLD_SQL_NOTES, 1) */;
