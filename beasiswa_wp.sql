/*
 Navicat Premium Data Transfer

 Source Server         : local
 Source Server Type    : MySQL
 Source Server Version : 50739 (5.7.39)
 Source Host           : localhost:3306
 Source Schema         : beasiswa_wp

 Target Server Type    : MySQL
 Target Server Version : 50739 (5.7.39)
 File Encoding         : 65001

 Date: 30/11/2024 12:24:43
*/

SET NAMES utf8mb4;
SET FOREIGN_KEY_CHECKS = 0;

-- ----------------------------
-- Table structure for kriteria
-- ----------------------------
DROP TABLE IF EXISTS `kriteria`;
CREATE TABLE `kriteria` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `nama` varchar(255) DEFAULT NULL,
  `bobot` decimal(10,2) DEFAULT NULL,
  `tipe` varchar(255) DEFAULT NULL,
  `jenis` varchar(255) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `keterangan` text,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=11 DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of kriteria
-- ----------------------------
BEGIN;
INSERT INTO `kriteria` (`id`, `nama`, `bobot`, `tipe`, `jenis`, `created_at`, `updated_at`, `keterangan`) VALUES (1, 'Penghasilan Orang Tua', 0.40, 'COST', 'BKM', '2024-11-27 00:17:15', '2024-11-27 02:47:51', 'Semakin rendah penghasilan, semakin baik');
INSERT INTO `kriteria` (`id`, `nama`, `bobot`, `tipe`, `jenis`, `created_at`, `updated_at`, `keterangan`) VALUES (2, 'Jumlah Tanggungan', 0.30, 'BENEFIT', 'BKM', '2024-11-27 00:17:39', '2024-11-27 00:17:39', 'Semakin banyak tanggungan, semakin baik');
INSERT INTO `kriteria` (`id`, `nama`, `bobot`, `tipe`, `jenis`, `created_at`, `updated_at`, `keterangan`) VALUES (3, 'Kondisi Rumah', 0.20, 'COST', 'BKM', '2024-11-27 00:17:57', '2024-11-27 02:47:58', 'Semakin buruk kondisi rumah, semakin baik');
INSERT INTO `kriteria` (`id`, `nama`, `bobot`, `tipe`, `jenis`, `created_at`, `updated_at`, `keterangan`) VALUES (4, 'Kepemilikan Asset', 0.10, 'COST', 'BKM', '2024-11-27 00:18:17', '2024-11-27 02:48:02', 'Semakin sedikit aset, semakin baik');
INSERT INTO `kriteria` (`id`, `nama`, `bobot`, `tipe`, `jenis`, `created_at`, `updated_at`, `keterangan`) VALUES (5, 'Nilai Raport', 0.40, 'BENEFIT', 'BKMP', '2024-11-27 00:20:21', '2024-11-27 00:20:21', 'Semakin tinggi nilai rapor, semakin baik');
INSERT INTO `kriteria` (`id`, `nama`, `bobot`, `tipe`, `jenis`, `created_at`, `updated_at`, `keterangan`) VALUES (6, 'Prestasi Akademik', 0.30, 'BENEFIT', 'BKMP', '2024-11-27 00:20:41', '2024-11-27 00:20:41', 'Prestasi di bidang akademik (olimpiade, dll.)');
INSERT INTO `kriteria` (`id`, `nama`, `bobot`, `tipe`, `jenis`, `created_at`, `updated_at`, `keterangan`) VALUES (7, 'Penghasilan Orang Tua', 0.20, 'COST', 'BKMP', '2024-11-27 00:23:36', '2024-11-27 00:23:36', 'Semakin rendah penghasilan, semakin baik');
INSERT INTO `kriteria` (`id`, `nama`, `bobot`, `tipe`, `jenis`, `created_at`, `updated_at`, `keterangan`) VALUES (8, 'Jumlah Tanggungan', 0.10, 'BENEFIT', 'BKMP', '2024-11-27 00:23:55', '2024-11-27 00:23:55', 'Semakin banyak tanggungan, semakin baik');
COMMIT;

-- ----------------------------
-- Table structure for nilai_bkm
-- ----------------------------
DROP TABLE IF EXISTS `nilai_bkm`;
CREATE TABLE `nilai_bkm` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `siswa_id` int(11) DEFAULT NULL,
  `kriteria_id` int(11) DEFAULT NULL,
  `nilai` int(11) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `nomor` varchar(255) DEFAULT NULL,
  `tanggal` date DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=11 DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of nilai_bkm
-- ----------------------------
BEGIN;
INSERT INTO `nilai_bkm` (`id`, `siswa_id`, `kriteria_id`, `nilai`, `created_at`, `updated_at`, `nomor`, `tanggal`) VALUES (1, 3, 1, 8, '2024-11-27 01:20:13', '2024-11-27 03:01:27', NULL, NULL);
INSERT INTO `nilai_bkm` (`id`, `siswa_id`, `kriteria_id`, `nilai`, `created_at`, `updated_at`, `nomor`, `tanggal`) VALUES (2, 3, 2, 7, '2024-11-27 01:20:13', '2024-11-27 02:42:49', NULL, NULL);
INSERT INTO `nilai_bkm` (`id`, `siswa_id`, `kriteria_id`, `nilai`, `created_at`, `updated_at`, `nomor`, `tanggal`) VALUES (3, 3, 3, 9, '2024-11-27 01:20:13', '2024-11-27 02:42:49', NULL, NULL);
INSERT INTO `nilai_bkm` (`id`, `siswa_id`, `kriteria_id`, `nilai`, `created_at`, `updated_at`, `nomor`, `tanggal`) VALUES (4, 3, 4, 6, '2024-11-27 01:20:13', '2024-11-27 02:42:49', NULL, NULL);
INSERT INTO `nilai_bkm` (`id`, `siswa_id`, `kriteria_id`, `nilai`, `created_at`, `updated_at`, `nomor`, `tanggal`) VALUES (5, 4, 1, 7, '2024-11-27 01:22:28', '2024-11-27 02:44:19', NULL, NULL);
INSERT INTO `nilai_bkm` (`id`, `siswa_id`, `kriteria_id`, `nilai`, `created_at`, `updated_at`, `nomor`, `tanggal`) VALUES (6, 4, 2, 8, '2024-11-27 01:22:28', '2024-11-27 02:44:19', NULL, NULL);
INSERT INTO `nilai_bkm` (`id`, `siswa_id`, `kriteria_id`, `nilai`, `created_at`, `updated_at`, `nomor`, `tanggal`) VALUES (7, 4, 3, 8, '2024-11-27 01:22:28', '2024-11-27 02:44:19', NULL, NULL);
INSERT INTO `nilai_bkm` (`id`, `siswa_id`, `kriteria_id`, `nilai`, `created_at`, `updated_at`, `nomor`, `tanggal`) VALUES (8, 4, 4, 7, '2024-11-27 01:22:28', '2024-11-27 02:44:19', NULL, NULL);
INSERT INTO `nilai_bkm` (`id`, `siswa_id`, `kriteria_id`, `nilai`, `created_at`, `updated_at`, `nomor`, `tanggal`) VALUES (9, 3, 10, 10, '2024-11-27 03:00:56', '2024-11-27 03:00:56', NULL, NULL);
INSERT INTO `nilai_bkm` (`id`, `siswa_id`, `kriteria_id`, `nilai`, `created_at`, `updated_at`, `nomor`, `tanggal`) VALUES (10, 4, 10, 5, '2024-11-27 03:01:00', '2024-11-27 03:01:00', NULL, NULL);
COMMIT;

-- ----------------------------
-- Table structure for nilai_bkmp
-- ----------------------------
DROP TABLE IF EXISTS `nilai_bkmp`;
CREATE TABLE `nilai_bkmp` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `siswa_id` int(11) DEFAULT NULL,
  `kriteria_id` int(11) DEFAULT NULL,
  `nilai` int(10) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `nomor` varchar(255) DEFAULT NULL,
  `tanggal` date DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=9 DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of nilai_bkmp
-- ----------------------------
BEGIN;
INSERT INTO `nilai_bkmp` (`id`, `siswa_id`, `kriteria_id`, `nilai`, `created_at`, `updated_at`, `nomor`, `tanggal`) VALUES (1, 5, 5, 10, '2024-11-27 01:30:00', '2024-11-27 01:30:12', NULL, NULL);
INSERT INTO `nilai_bkmp` (`id`, `siswa_id`, `kriteria_id`, `nilai`, `created_at`, `updated_at`, `nomor`, `tanggal`) VALUES (2, 5, 6, 5, '2024-11-27 01:30:00', '2024-11-27 02:56:19', NULL, NULL);
INSERT INTO `nilai_bkmp` (`id`, `siswa_id`, `kriteria_id`, `nilai`, `created_at`, `updated_at`, `nomor`, `tanggal`) VALUES (3, 5, 7, 2000000, '2024-11-27 01:30:00', '2024-11-27 01:30:00', NULL, NULL);
INSERT INTO `nilai_bkmp` (`id`, `siswa_id`, `kriteria_id`, `nilai`, `created_at`, `updated_at`, `nomor`, `tanggal`) VALUES (4, 5, 8, 5, '2024-11-27 01:30:00', '2024-11-27 02:56:34', NULL, NULL);
INSERT INTO `nilai_bkmp` (`id`, `siswa_id`, `kriteria_id`, `nilai`, `created_at`, `updated_at`, `nomor`, `tanggal`) VALUES (5, 2, 5, 10, '2024-11-27 02:56:09', '2024-11-27 02:56:25', NULL, NULL);
INSERT INTO `nilai_bkmp` (`id`, `siswa_id`, `kriteria_id`, `nilai`, `created_at`, `updated_at`, `nomor`, `tanggal`) VALUES (6, 2, 6, 10, '2024-11-27 02:56:09', '2024-11-27 02:56:25', NULL, NULL);
INSERT INTO `nilai_bkmp` (`id`, `siswa_id`, `kriteria_id`, `nilai`, `created_at`, `updated_at`, `nomor`, `tanggal`) VALUES (7, 2, 7, 2, '2024-11-27 02:56:09', '2024-11-27 02:56:09', NULL, NULL);
INSERT INTO `nilai_bkmp` (`id`, `siswa_id`, `kriteria_id`, `nilai`, `created_at`, `updated_at`, `nomor`, `tanggal`) VALUES (8, 2, 8, 20, '2024-11-27 02:56:09', '2024-11-27 02:56:32', NULL, NULL);
COMMIT;

-- ----------------------------
-- Table structure for role_users
-- ----------------------------
DROP TABLE IF EXISTS `role_users`;
CREATE TABLE `role_users` (
  `user_id` bigint(20) unsigned NOT NULL,
  `role_id` bigint(20) unsigned NOT NULL,
  UNIQUE KEY `role_users_user_id_role_id_unique` (`user_id`,`role_id`) USING BTREE,
  KEY `role_users_role_id_foreign` (`role_id`) USING BTREE,
  CONSTRAINT `role_users_ibfk_1` FOREIGN KEY (`role_id`) REFERENCES `roles` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  CONSTRAINT `role_users_ibfk_2` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 ROW_FORMAT=DYNAMIC;

-- ----------------------------
-- Records of role_users
-- ----------------------------
BEGIN;
INSERT INTO `role_users` (`user_id`, `role_id`) VALUES (1, 1);
COMMIT;

-- ----------------------------
-- Table structure for roles
-- ----------------------------
DROP TABLE IF EXISTS `roles`;
CREATE TABLE `roles` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(50) NOT NULL,
  `created_at` timestamp NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `updated_at` timestamp NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`) USING BTREE
) ENGINE=InnoDB AUTO_INCREMENT=7 DEFAULT CHARSET=utf8mb4 ROW_FORMAT=DYNAMIC;

-- ----------------------------
-- Records of roles
-- ----------------------------
BEGIN;
INSERT INTO `roles` (`id`, `name`, `created_at`, `updated_at`) VALUES (1, 'superadmin', '2020-12-23 23:17:35', '2020-12-23 23:17:35');
INSERT INTO `roles` (`id`, `name`, `created_at`, `updated_at`) VALUES (2, 'user', '2023-05-15 16:36:37', '2023-05-15 16:36:37');
INSERT INTO `roles` (`id`, `name`, `created_at`, `updated_at`) VALUES (3, 'petugas', '2024-11-10 17:28:18', '2024-11-10 17:28:18');
INSERT INTO `roles` (`id`, `name`, `created_at`, `updated_at`) VALUES (4, 'saksi', '2024-11-20 22:51:33', '2024-11-20 22:51:33');
INSERT INTO `roles` (`id`, `name`, `created_at`, `updated_at`) VALUES (5, 'kelurahan', '2024-11-21 03:07:06', '2024-11-21 03:07:06');
INSERT INTO `roles` (`id`, `name`, `created_at`, `updated_at`) VALUES (6, 'kecamatan', '2024-11-21 03:07:11', '2024-11-21 03:07:11');
COMMIT;

-- ----------------------------
-- Table structure for siswa
-- ----------------------------
DROP TABLE IF EXISTS `siswa`;
CREATE TABLE `siswa` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `nis` varchar(255) DEFAULT NULL,
  `nama` varchar(255) DEFAULT NULL,
  `alamat` text,
  `tanggal_lahir` date DEFAULT NULL,
  `telp` varchar(255) DEFAULT NULL,
  `jenis` varchar(255) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `nomor` varchar(255) DEFAULT NULL,
  `tanggal` date DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=6 DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of siswa
-- ----------------------------
BEGIN;
INSERT INTO `siswa` (`id`, `nis`, `nama`, `alamat`, `tanggal_lahir`, `telp`, `jenis`, `created_at`, `updated_at`, `nomor`, `tanggal`) VALUES (2, '11234', 'Adi', 'dfgf', '2024-11-01', '234534', 'BKMP', '2024-11-26 23:49:57', '2024-11-27 01:00:12', '132454', '2024-11-27');
INSERT INTO `siswa` (`id`, `nis`, `nama`, `alamat`, `tanggal_lahir`, `telp`, `jenis`, `created_at`, `updated_at`, `nomor`, `tanggal`) VALUES (3, '11245', 'Budi', 'dfg', '2024-11-11', 'w324', 'BKM', '2024-11-26 23:50:48', '2024-11-27 01:01:31', '2314322', '2024-12-03');
INSERT INTO `siswa` (`id`, `nis`, `nama`, `alamat`, `tanggal_lahir`, `telp`, `jenis`, `created_at`, `updated_at`, `nomor`, `tanggal`) VALUES (4, '3245', 'Rani', 'jl pramuka', '1990-11-06', '0987656789', 'BKM', '2024-11-27 01:22:21', '2024-11-27 01:22:21', '324565543', '2024-11-27');
INSERT INTO `siswa` (`id`, `nis`, `nama`, `alamat`, `tanggal_lahir`, `telp`, `jenis`, `created_at`, `updated_at`, `nomor`, `tanggal`) VALUES (5, '23456554', 'Samsudin', 'jl mana aja', '2024-11-12', '098765567', 'BKMP', '2024-11-27 01:29:23', '2024-11-27 01:29:23', '34567', '2024-11-27');
COMMIT;

-- ----------------------------
-- Table structure for users
-- ----------------------------
DROP TABLE IF EXISTS `users`;
CREATE TABLE `users` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(255) NOT NULL,
  `email` varchar(255) DEFAULT NULL,
  `username` varchar(255) NOT NULL,
  `email_verified_at` timestamp NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `password` varchar(255) NOT NULL,
  `password_superadmin` varchar(255) DEFAULT NULL,
  `remember_token` varchar(100) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `updated_at` timestamp NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `api_token` varchar(255) DEFAULT NULL,
  `last_session` varchar(255) DEFAULT NULL,
  `change_password` int(1) unsigned DEFAULT '0' COMMENT '0: belum, 1: sudah',
  `pendaftar_id` char(36) DEFAULT NULL,
  `pengumpul_id` int(11) DEFAULT NULL,
  `suara_id` int(11) DEFAULT NULL,
  `kelurahan_id` int(11) DEFAULT NULL,
  `kecamatan_id` int(11) DEFAULT NULL,
  `nama_kec` varchar(255) DEFAULT NULL,
  PRIMARY KEY (`id`) USING BTREE,
  UNIQUE KEY `users_username_unique` (`username`) USING BTREE,
  UNIQUE KEY `users_email_unique` (`email`) USING BTREE
) ENGINE=InnoDB AUTO_INCREMENT=1165 DEFAULT CHARSET=utf8mb4 ROW_FORMAT=DYNAMIC;

-- ----------------------------
-- Records of users
-- ----------------------------
BEGIN;
INSERT INTO `users` (`id`, `name`, `email`, `username`, `email_verified_at`, `password`, `password_superadmin`, `remember_token`, `created_at`, `updated_at`, `api_token`, `last_session`, `change_password`, `pendaftar_id`, `pengumpul_id`, `suara_id`, `kelurahan_id`, `kecamatan_id`, `nama_kec`) VALUES (1, 'admin', NULL, 'admin', '2024-11-30 12:23:56', '$2y$10$E9xG1OtIFvBRbHqlwHCC3u48vO5eBf2OQ9wFNpi.qKOAzVqNDUdW2', NULL, '6VRMw5TjCiNFvZjjRZ78KlOJfHfYFAWoCDP0a0iK1CPXdz20MssaqBIfIKFq', '2024-11-30 12:23:56', '2024-11-30 12:23:56', '$2y$10$tjMANlV25IUwvKuPxEODW.3qE3zPSKjwhmgTcZUgsPDZRGcpgGAN.', NULL, 0, NULL, 5, NULL, NULL, NULL, NULL);
COMMIT;

SET FOREIGN_KEY_CHECKS = 1;
