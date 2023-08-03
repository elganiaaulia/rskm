/*
 Navicat Premium Data Transfer

 Source Server         : mysql
 Source Server Type    : MySQL
 Source Server Version : 100422 (10.4.22-MariaDB)
 Source Host           : localhost:3306
 Source Schema         : db_rskm

 Target Server Type    : MySQL
 Target Server Version : 100422 (10.4.22-MariaDB)
 File Encoding         : 65001

 Date: 03/08/2023 09:24:47
*/

SET NAMES utf8mb4;
SET FOREIGN_KEY_CHECKS = 0;

-- ----------------------------
-- Table structure for tbl_admin
-- ----------------------------
DROP TABLE IF EXISTS `tbl_admin`;
CREATE TABLE `tbl_admin`  (
  `id` int NOT NULL AUTO_INCREMENT,
  `nik` int NOT NULL,
  `nama` varchar(150) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  `unit` varchar(150) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  PRIMARY KEY (`id`) USING BTREE
) ENGINE = InnoDB AUTO_INCREMENT = 1 CHARACTER SET = utf8mb4 COLLATE = utf8mb4_general_ci ROW_FORMAT = Dynamic;

-- ----------------------------
-- Records of tbl_admin
-- ----------------------------

-- ----------------------------
-- Table structure for tbl_edit
-- ----------------------------
DROP TABLE IF EXISTS `tbl_edit`;
CREATE TABLE `tbl_edit`  (
  `id` int NOT NULL AUTO_INCREMENT,
  `unit` varchar(150) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  `nilai_pelatihan` int NOT NULL,
  PRIMARY KEY (`id`) USING BTREE
) ENGINE = InnoDB AUTO_INCREMENT = 1 CHARACTER SET = utf8mb4 COLLATE = utf8mb4_general_ci ROW_FORMAT = Dynamic;

-- ----------------------------
-- Records of tbl_edit
-- ----------------------------

-- ----------------------------
-- Table structure for tbl_hasil
-- ----------------------------
DROP TABLE IF EXISTS `tbl_hasil`;
CREATE TABLE `tbl_hasil`  (
  `id` int NOT NULL AUTO_INCREMENT,
  `nik` int NOT NULL,
  `unit` varchar(150) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  `tanggal_pelatihan` date NOT NULL,
  `total_jam` int NOT NULL,
  `total_terendah` int NOT NULL,
  `total_tertinggi` int NOT NULL,
  `rata_rata` int NOT NULL,
  `hasil` int NOT NULL,
  PRIMARY KEY (`id`) USING BTREE
) ENGINE = InnoDB AUTO_INCREMENT = 1 CHARACTER SET = utf8mb4 COLLATE = utf8mb4_general_ci ROW_FORMAT = Dynamic;

-- ----------------------------
-- Records of tbl_hasil
-- ----------------------------

-- ----------------------------
-- Table structure for tbl_history
-- ----------------------------
DROP TABLE IF EXISTS `tbl_history`;
CREATE TABLE `tbl_history`  (
  `id` int NOT NULL AUTO_INCREMENT,
  `id_pelatihan` int NOT NULL,
  `nm_pelatihan` varchar(150) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NULL DEFAULT NULL,
  `id_pelkry` int NOT NULL,
  `durasi` int NULL DEFAULT NULL,
  `tgl_mulai` date NULL DEFAULT NULL,
  `tgl_selesai` date NULL DEFAULT NULL,
  PRIMARY KEY (`id`) USING BTREE
) ENGINE = InnoDB AUTO_INCREMENT = 43 CHARACTER SET = utf8mb4 COLLATE = utf8mb4_general_ci ROW_FORMAT = Dynamic;

-- ----------------------------
-- Records of tbl_history
-- ----------------------------
INSERT INTO `tbl_history` VALUES (33, 0, '', 0, 0, '0000-00-00', NULL);
INSERT INTO `tbl_history` VALUES (34, 0, 'bidang sistem infromasi', 0, 9, '2023-07-01', NULL);
INSERT INTO `tbl_history` VALUES (35, 0, 'pelatihan komunikasi', 0, 8, '2022-01-28', NULL);
INSERT INTO `tbl_history` VALUES (36, 0, 'pemograman', 0, 10, '2023-08-01', NULL);
INSERT INTO `tbl_history` VALUES (37, 0, '6', 0, 0, '0000-00-00', NULL);
INSERT INTO `tbl_history` VALUES (38, 6, 'bidang sistem infromasi', 40, 9, '2023-07-01', '2023-07-03');
INSERT INTO `tbl_history` VALUES (39, 9, 'bidang sistem infromasi', 40, 8, '2023-08-02', '2023-08-31');
INSERT INTO `tbl_history` VALUES (41, 7, 'pelatihan komunikasi', 41, 8, '2022-01-28', '2022-02-28');

-- ----------------------------
-- Table structure for tbl_karyawan
-- ----------------------------
DROP TABLE IF EXISTS `tbl_karyawan`;
CREATE TABLE `tbl_karyawan`  (
  `id` int NOT NULL AUTO_INCREMENT,
  `nik` int NOT NULL,
  `nama` varchar(150) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  `id_unit` int NOT NULL,
  `unit` varchar(150) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  `jumlahjam` int NOT NULL,
  PRIMARY KEY (`id`) USING BTREE,
  INDEX `id_unit`(`id_unit` ASC) USING BTREE,
  CONSTRAINT `tbl_karyawan_ibfk_1` FOREIGN KEY (`id_unit`) REFERENCES `tbl_unit` (`id`) ON DELETE RESTRICT ON UPDATE NO ACTION
) ENGINE = InnoDB AUTO_INCREMENT = 44 CHARACTER SET = utf8mb4 COLLATE = utf8mb4_general_ci ROW_FORMAT = Dynamic;

-- ----------------------------
-- Records of tbl_karyawan
-- ----------------------------
INSERT INTO `tbl_karyawan` VALUES (36, 1, 'elgania', 32, 'Bidang Akuntansi Manajemen', 0);
INSERT INTO `tbl_karyawan` VALUES (37, 2, 'aulia', 27, 'Apotik Klinik KM Cilegon', 8);
INSERT INTO `tbl_karyawan` VALUES (38, 3, 'bima', 29, 'Apotik Serang', 3);
INSERT INTO `tbl_karyawan` VALUES (39, 4, 'aqilla', 30, 'Bidang Administrasi SDM &amp; HI', 7);
INSERT INTO `tbl_karyawan` VALUES (42, 1000073, 'Agus Wirawan', 30, 'Bidang Administrasi SDM &amp; HI', 0);

-- ----------------------------
-- Table structure for tbl_pelatihan
-- ----------------------------
DROP TABLE IF EXISTS `tbl_pelatihan`;
CREATE TABLE `tbl_pelatihan`  (
  `id` int NOT NULL AUTO_INCREMENT,
  `nama` varchar(150) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  `id_pelkry` int NULL DEFAULT NULL,
  `tgl_mulai` date NOT NULL,
  `tgl_selesai` date NOT NULL,
  `jumlah_jam` int NOT NULL,
  `bukti` varchar(100) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NULL DEFAULT NULL,
  PRIMARY KEY (`id`) USING BTREE
) ENGINE = InnoDB AUTO_INCREMENT = 10 CHARACTER SET = utf8mb4 COLLATE = utf8mb4_general_ci ROW_FORMAT = Dynamic;

-- ----------------------------
-- Records of tbl_pelatihan
-- ----------------------------
INSERT INTO `tbl_pelatihan` VALUES (4, 'pelatihan sistem infromasi', 0, '2019-01-01', '2019-01-08', 20, '');
INSERT INTO `tbl_pelatihan` VALUES (5, 'pelatihan test', 0, '2019-02-01', '2019-02-07', 20, '');
INSERT INTO `tbl_pelatihan` VALUES (6, 'bidang sistem infromasi', 0, '2023-07-01', '2023-07-03', 9, '');
INSERT INTO `tbl_pelatihan` VALUES (7, 'pelatihan komunikasi', 0, '2022-01-28', '2022-02-28', 8, '');
INSERT INTO `tbl_pelatihan` VALUES (8, 'pemograman', NULL, '2023-08-01', '2023-08-02', 10, '');
INSERT INTO `tbl_pelatihan` VALUES (9, 'bidang sistem infromasi', NULL, '2023-08-02', '2023-08-31', 8, '');

-- ----------------------------
-- Table structure for tbl_pelkry
-- ----------------------------
DROP TABLE IF EXISTS `tbl_pelkry`;
CREATE TABLE `tbl_pelkry`  (
  `id` int NOT NULL AUTO_INCREMENT,
  `id_karyawan` int NOT NULL,
  `nm_karyawan` varchar(150) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  `id_periode` int NOT NULL,
  `nm_periode` varchar(150) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  `id_unit` int NOT NULL,
  `unit` varchar(150) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  `total_durasi` int NOT NULL,
  PRIMARY KEY (`id`) USING BTREE,
  INDEX `id_periode`(`id_periode` ASC) USING BTREE,
  INDEX `id_periode_2`(`id_periode` ASC) USING BTREE,
  INDEX `id_unit`(`id_unit` ASC) USING BTREE,
  INDEX `fk_karyawan`(`id_karyawan` ASC) USING BTREE,
  CONSTRAINT `fk_karyawan` FOREIGN KEY (`id_karyawan`) REFERENCES `tbl_karyawan` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  CONSTRAINT `fk_periode` FOREIGN KEY (`id_periode`) REFERENCES `tbl_periode` (`id`) ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE = InnoDB AUTO_INCREMENT = 48 CHARACTER SET = utf8mb4 COLLATE = utf8mb4_general_ci ROW_FORMAT = Dynamic;

-- ----------------------------
-- Records of tbl_pelkry
-- ----------------------------
INSERT INTO `tbl_pelkry` VALUES (40, 36, 'elgania', 38, '2019', 32, 'Bidang Akuntansi Manajemen', 0);
INSERT INTO `tbl_pelkry` VALUES (41, 37, 'aulia', 39, '2020', 27, 'Apotik Klinik KM Cilegon', 0);
INSERT INTO `tbl_pelkry` VALUES (43, 38, 'bima', 40, '2021', 29, 'Apotik Serang', 0);
INSERT INTO `tbl_pelkry` VALUES (44, 42, 'Agus Wirawan', 38, '2019', 30, 'Bidang Administrasi SDM &amp; HI', 0);

-- ----------------------------
-- Table structure for tbl_periode
-- ----------------------------
DROP TABLE IF EXISTS `tbl_periode`;
CREATE TABLE `tbl_periode`  (
  `id` int NOT NULL AUTO_INCREMENT,
  `nama` varchar(150) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  `tgl_mulai` date NOT NULL,
  `tgl_selesai` date NOT NULL,
  PRIMARY KEY (`id`) USING BTREE
) ENGINE = InnoDB AUTO_INCREMENT = 43 CHARACTER SET = utf8mb4 COLLATE = utf8mb4_general_ci ROW_FORMAT = Dynamic;

-- ----------------------------
-- Records of tbl_periode
-- ----------------------------
INSERT INTO `tbl_periode` VALUES (38, '2019', '2019-01-01', '2019-01-31');
INSERT INTO `tbl_periode` VALUES (39, '2020', '2020-02-01', '2020-02-29');
INSERT INTO `tbl_periode` VALUES (40, '2021', '2021-03-01', '2021-03-31');
INSERT INTO `tbl_periode` VALUES (41, '2022', '2022-06-28', '2022-06-30');

-- ----------------------------
-- Table structure for tbl_unit
-- ----------------------------
DROP TABLE IF EXISTS `tbl_unit`;
CREATE TABLE `tbl_unit`  (
  `id` int NOT NULL AUTO_INCREMENT,
  `nama` varchar(150) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  `statusaktif` varchar(10) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  PRIMARY KEY (`id`) USING BTREE
) ENGINE = InnoDB AUTO_INCREMENT = 37 CHARACTER SET = utf8mb4 COLLATE = utf8mb4_general_ci ROW_FORMAT = Dynamic;

-- ----------------------------
-- Records of tbl_unit
-- ----------------------------
INSERT INTO `tbl_unit` VALUES (26, 'Anggrek Nurse Pratama', 'Ya');
INSERT INTO `tbl_unit` VALUES (27, 'Apotik Klinik KM Cilegon', 'Ya');
INSERT INTO `tbl_unit` VALUES (28, 'Apotik Klinik KM Pandeglang', 'Ya');
INSERT INTO `tbl_unit` VALUES (29, 'Apotik Serang', 'Ya');
INSERT INTO `tbl_unit` VALUES (30, 'Bidang Administrasi SDM &amp; HI', 'Ya');
INSERT INTO `tbl_unit` VALUES (31, 'Bidang Akuntansi Keuangan', 'Ya');
INSERT INTO `tbl_unit` VALUES (32, 'Bidang Akuntansi Manajemen', 'Ya');
INSERT INTO `tbl_unit` VALUES (33, 'Bidang Case Management Madya', 'Ya');

-- ----------------------------
-- Table structure for tbl_user
-- ----------------------------
DROP TABLE IF EXISTS `tbl_user`;
CREATE TABLE `tbl_user`  (
  `id` int NOT NULL AUTO_INCREMENT,
  `username` varchar(150) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  `password` varchar(50) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  `nama` varchar(150) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  `unit` varchar(150) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  PRIMARY KEY (`id`) USING BTREE
) ENGINE = InnoDB AUTO_INCREMENT = 24 CHARACTER SET = utf8mb4 COLLATE = utf8mb4_general_ci ROW_FORMAT = Dynamic;

-- ----------------------------
-- Records of tbl_user
-- ----------------------------
INSERT INTO `tbl_user` VALUES (1, 'elganiaaulia', '853f0d277c9ebfda2c8dd35b270d041a', 'elgania', 'Bidang Pemeliharaan Sarana & Umum');
INSERT INTO `tbl_user` VALUES (5, 'aulia', 'daf38cbfcdd9d89491586e2823af1e15', 'aulia', 'Bidang Perdagangan Obat dan Alkes');
INSERT INTO `tbl_user` VALUES (17, 'test', '098f6bcd4621d373cade4e832627b4f6', 'abc', 'testing');
INSERT INTO `tbl_user` VALUES (18, 'test2', '$2y$10$T.zbl7BkacuPqmgg0Ob/Ju12pGsh8U.itxom0t0eWnu', 'test2', 'Bidang Sistim Informasi');
INSERT INTO `tbl_user` VALUES (19, 'test3', '$2y$10$UjVfvQ.ZrpBo4/KyhPQtMuoKq65N53s31WmIN13zz8j', 'test3', 'Bidang Pengembangan SDM & Org');
INSERT INTO `tbl_user` VALUES (20, 'test4', 'd41d8cd98f00b204e9800998ecf8427e', 'test4', 'Bidang Perbendaharaan');
INSERT INTO `tbl_user` VALUES (21, 'test5', 'e3d704f3542b44a621ebed70dc0efe13', 'test5', 'Bidang Pemeliharaan Sarana & Umum');
INSERT INTO `tbl_user` VALUES (22, 'test7', 'b04083e53e242626595e2b8ea327e525', 'test7', 'Bidang Logistik');
INSERT INTO `tbl_user` VALUES (23, 'test9', 'ff6318dc6c65118aa503c43e44a81fb9', 'test9', 'Business Support');

SET FOREIGN_KEY_CHECKS = 1;
