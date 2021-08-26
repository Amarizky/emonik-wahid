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

 Date: 10/08/2021 08:41:35
*/

SET NAMES utf8mb4;
SET FOREIGN_KEY_CHECKS = 0;

-- ----------------------------
-- Table structure for _log_forgot_pass
-- ----------------------------
DROP TABLE IF EXISTS `_log_forgot_pass`;
CREATE TABLE `_log_forgot_pass` (
  `log_id` int(11) NOT NULL AUTO_INCREMENT,
  `username` varchar(255) DEFAULT NULL,
  `log_time` datetime DEFAULT NULL,
  `token` text,
  `token_exp` datetime DEFAULT NULL,
  `ip_address` varchar(255) DEFAULT NULL,
  `status` smallint(6) DEFAULT NULL,
  PRIMARY KEY (`log_id`)
) ENGINE=InnoDB AUTO_INCREMENT=17 DEFAULT CHARSET=utf8mb4;

-- ----------------------------
-- Records of _log_forgot_pass
-- ----------------------------
BEGIN;
INSERT INTO `_log_forgot_pass` VALUES (14, 'asep.saepul205@gmail.com', '2020-12-22 08:07:38', '0807eadaa43576b3e3872281d14a0722', '2020-12-22 10:07:38', '::1', 1);
INSERT INTO `_log_forgot_pass` VALUES (15, 'asep.16047@student.unsika.ac.id', '2020-12-22 09:24:32', '0924c762937539be97bbebbe0a222422', '2020-12-22 11:24:32', '127.0.0.1', 1);
INSERT INTO `_log_forgot_pass` VALUES (16, 'asep.saepul205@gmail.com', '2020-12-28 13:10:08', '1310ff5464c10ef5bb691983fd9b1028', '2020-12-28 15:10:08', '::1', 0);
COMMIT;

SET FOREIGN_KEY_CHECKS = 1;
