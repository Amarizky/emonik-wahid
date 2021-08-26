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

 Date: 10/08/2021 08:41:27
*/

SET NAMES utf8mb4;
SET FOREIGN_KEY_CHECKS = 0;

-- ----------------------------
-- Table structure for _log_status_regis
-- ----------------------------
DROP TABLE IF EXISTS `_log_status_regis`;
CREATE TABLE `_log_status_regis` (
  `log_id` int(11) NOT NULL AUTO_INCREMENT,
  `datetime` datetime DEFAULT NULL,
  `regis_id` int(11) DEFAULT NULL,
  `status_regis_before` smallint(6) DEFAULT NULL,
  `status_regis_after` smallint(6) DEFAULT NULL,
  PRIMARY KEY (`log_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

SET FOREIGN_KEY_CHECKS = 1;
