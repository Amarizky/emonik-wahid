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

 Date: 10/08/2021 08:41:17
*/

SET NAMES utf8mb4;
SET FOREIGN_KEY_CHECKS = 0;

-- ----------------------------
-- Table structure for _mail_send
-- ----------------------------
DROP TABLE IF EXISTS `_mail_send`;
CREATE TABLE `_mail_send` (
  `mail_id` int(11) NOT NULL AUTO_INCREMENT,
  `to` varchar(255) DEFAULT NULL,
  `cc` varchar(255) DEFAULT NULL,
  `subject` varchar(255) DEFAULT NULL,
  `text` text,
  `attachment` varchar(255) DEFAULT NULL,
  `status` enum('1','0','2') DEFAULT NULL,
  `date` datetime DEFAULT NULL,
  `send_date` datetime DEFAULT NULL,
  PRIMARY KEY (`mail_id`) USING BTREE
) ENGINE=InnoDB DEFAULT CHARSET=latin1 ROW_FORMAT=DYNAMIC;

SET FOREIGN_KEY_CHECKS = 1;
