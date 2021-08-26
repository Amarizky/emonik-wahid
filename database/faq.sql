/*
 Navicat Premium Data Transfer

 Source Server         : master data
 Source Server Type    : MySQL
 Source Server Version : 50651
 Source Host           : localhost:3306
 Source Schema         : rekrutmen_pkc

 Target Server Type    : MySQL
 Target Server Version : 50651
 File Encoding         : 65001

 Date: 10/08/2021 08:41:07
*/

SET NAMES utf8mb4;
SET FOREIGN_KEY_CHECKS = 0;

-- ----------------------------
-- Table structure for faq
-- ----------------------------
DROP TABLE IF EXISTS `faq`;
CREATE TABLE `faq` (
  `faq_id` int(11) NOT NULL AUTO_INCREMENT,
  `faq_question` text,
  `faq_answer` text,
  `created_at` datetime DEFAULT NULL,
  `created_by` varchar(100) DEFAULT NULL,
  PRIMARY KEY (`faq_id`)
) ENGINE=InnoDB AUTO_INCREMENT=6 DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of faq
-- ----------------------------
BEGIN;
INSERT INTO `faq` VALUES (1, 'Apakah pendaftaran hanya dilakukan secara online?', 'Ya. Perlu diketahui bahwa panitia tidak menerima lamaran melalui pos atau media pengiriman lainnya', '2020-12-20 11:46:57', NULL);
INSERT INTO `faq` VALUES (5, 'Apakah proses rekrutmen dan seleksi  ada biaya yang harus dibayar calon peserta?', 'Seluruh tahapan proses rekrutmen dan seleksi <b>tidak dipungut biaya apapun</b>. Apabila ada pihak yang berusaha meminta biaya/ menjanjikan sesuatu/ menawarkan bantuan atas proses rekrutmen dan seleksi dapat melapor ke panitia.', '2020-12-28 08:23:47', 'admin');
COMMIT;

SET FOREIGN_KEY_CHECKS = 1;
