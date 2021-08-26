/*
 Navicat Premium Data Transfer

 Source Server         : master data
 Source Server Type    : MySQL
 Source Server Version : 50651
 Source Host           : localhost:3306
 Source Schema         : db_templatekit

 Target Server Type    : MySQL
 Target Server Version : 50651
 File Encoding         : 65001

 Date: 10/08/2021 09:20:01
*/

SET NAMES utf8mb4;
SET FOREIGN_KEY_CHECKS = 0;

-- ----------------------------
-- Table structure for _log_activity
-- ----------------------------
DROP TABLE IF EXISTS `_log_activity`;
CREATE TABLE `_log_activity` (
  `log_id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `activity` varchar(50) COLLATE utf8_unicode_ci NOT NULL,
  `userid` varchar(10) COLLATE utf8_unicode_ci NOT NULL,
  `table` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `log_json` text COLLATE utf8_unicode_ci,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  PRIMARY KEY (`log_id`)
) ENGINE=InnoDB AUTO_INCREMENT=12 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- ----------------------------
-- Records of _log_activity
-- ----------------------------
BEGIN;
INSERT INTO `_log_activity` VALUES (1, 'update', '1', 'users', '{\"id\":\"1\",\"username\":\"admin\",\"name\":\"Administrator\",\"avatar\":\"avatar.png\",\"phone_number\":\"089648338115\",\"email\":\"admin@example.com\",\"password\":\"$2y$10$UymeeVc9B5GEQQV4n0ADfOI7Hy5PYMkE1796SnFYqmzXapTyfsDte\",\"is_active\":\"1\",\"roleid\":\"1\",\"remember_token\":\"56V30s1lTY\",\"created_at\":\"2021-04-30 00:00:00\",\"created_by\":null,\"updated_at\":\"2021-08-09 14:23:29\",\"updated_by\":\"admin\",\"is_deleted\":\"0\",\"deleted_at\":null,\"deleted_by\":null,\"is_recovered\":\"0\",\"recovered_at\":null,\"recovered_by\":null,\"last_login\":\"2021-08-09 14:23:29\"}', '2021-08-10 08:46:22');
INSERT INTO `_log_activity` VALUES (2, 'delete', '1', 'users', '', '2021-08-10 08:58:25');
INSERT INTO `_log_activity` VALUES (3, 'delete', '1', 'users', '', '2021-08-10 08:58:29');
INSERT INTO `_log_activity` VALUES (4, 'update', '1', 'users', '{\"id\":\"1\",\"username\":\"admin\",\"name\":\"Administrator\",\"avatar\":\"avatar.png\",\"phone_number\":\"089648338115\",\"email\":\"admin@example.com\",\"password\":\"$2y$10$UymeeVc9B5GEQQV4n0ADfOI7Hy5PYMkE1796SnFYqmzXapTyfsDte\",\"is_active\":\"1\",\"roleid\":\"1\",\"remember_token\":\"56V30s1lTY\",\"created_at\":\"2021-04-30 00:00:00\",\"created_by\":null,\"updated_at\":\"2021-08-10 08:46:22\",\"updated_by\":\"admin\",\"is_deleted\":\"0\",\"deleted_at\":null,\"deleted_by\":null,\"is_recovered\":\"0\",\"recovered_at\":null,\"recovered_by\":null,\"last_login\":\"2021-08-10 08:46:22\"}', '2021-08-10 09:07:40');
INSERT INTO `_log_activity` VALUES (5, 'update', '1', 'users', '{\"id\":\"1\",\"username\":\"admin\",\"name\":\"Administrator\",\"avatar\":\"avatar.png\",\"phone_number\":\"089648338115\",\"email\":\"admin@example.com\",\"password\":\"$2y$10$UymeeVc9B5GEQQV4n0ADfOI7Hy5PYMkE1796SnFYqmzXapTyfsDte\",\"is_active\":\"1\",\"roleid\":\"1\",\"remember_token\":\"56V30s1lTY\",\"created_at\":\"2021-04-30 00:00:00\",\"created_by\":null,\"updated_at\":\"2021-08-10 09:07:40\",\"updated_by\":\"admin\",\"is_deleted\":\"0\",\"deleted_at\":null,\"deleted_by\":null,\"is_recovered\":\"0\",\"recovered_at\":null,\"recovered_by\":null,\"last_login\":\"2021-08-10 08:46:22\"}', '2021-08-10 09:07:42');
INSERT INTO `_log_activity` VALUES (6, 'update', '1', 'users', '{\"id\":\"1\",\"username\":\"admin\",\"name\":\"Administrator\",\"avatar\":\"avatar.png\",\"phone_number\":\"089648338115\",\"email\":\"admin@example.com\",\"password\":\"$2y$10$UymeeVc9B5GEQQV4n0ADfOI7Hy5PYMkE1796SnFYqmzXapTyfsDte\",\"is_active\":\"1\",\"roleid\":\"1\",\"remember_token\":\"56V30s1lTY\",\"created_at\":\"2021-04-30 00:00:00\",\"created_by\":null,\"updated_at\":\"2021-08-10 09:07:42\",\"updated_by\":\"admin\",\"is_deleted\":\"0\",\"deleted_at\":null,\"deleted_by\":null,\"is_recovered\":\"0\",\"recovered_at\":null,\"recovered_by\":null,\"last_login\":\"2021-08-10 08:46:22\"}', '2021-08-10 09:11:50');
INSERT INTO `_log_activity` VALUES (7, 'update', '1', 'users', '{\"id\":\"1\",\"username\":\"admin\",\"name\":\"Administrator\",\"avatar\":\"avatar.png\",\"phone_number\":\"089648338115\",\"email\":\"admin@example.com\",\"password\":\"$2y$10$UymeeVc9B5GEQQV4n0ADfOI7Hy5PYMkE1796SnFYqmzXapTyfsDte\",\"is_active\":\"1\",\"roleid\":\"2\",\"remember_token\":\"56V30s1lTY\",\"created_at\":\"2021-04-30 00:00:00\",\"created_by\":null,\"updated_at\":\"2021-08-10 09:11:50\",\"updated_by\":\"admin\",\"is_deleted\":\"0\",\"deleted_at\":null,\"deleted_by\":null,\"is_recovered\":\"0\",\"recovered_at\":null,\"recovered_by\":null,\"last_login\":\"2021-08-10 08:46:22\"}', '2021-08-10 09:16:25');
INSERT INTO `_log_activity` VALUES (8, 'update', '1', 'users', '{\"id\":\"1\",\"username\":\"admin\",\"name\":\"Administrator\",\"avatar\":\"avatar.png\",\"phone_number\":\"089648338115\",\"email\":\"admin@example.com\",\"password\":\"$2y$10$UymeeVc9B5GEQQV4n0ADfOI7Hy5PYMkE1796SnFYqmzXapTyfsDte\",\"is_active\":\"1\",\"roleid\":\"1\",\"remember_token\":\"56V30s1lTY\",\"created_at\":\"2021-04-30 00:00:00\",\"created_by\":null,\"updated_at\":\"2021-08-10 09:16:25\",\"updated_by\":\"admin\",\"is_deleted\":\"0\",\"deleted_at\":null,\"deleted_by\":null,\"is_recovered\":\"0\",\"recovered_at\":null,\"recovered_by\":null,\"last_login\":\"2021-08-10 08:46:22\"}', '2021-08-10 09:16:28');
INSERT INTO `_log_activity` VALUES (9, 'delete_all_permanent', '1', 'users', '[{\"id\":\"2\",\"username\":\"V0001\",\"name\":\"Vendor X\",\"avatar\":\"avatar.png\",\"phone_number\":\"0\",\"email\":\"example@example.com\",\"password\":\"$2y$10$1vAEdtA68Wb1u2ZzLOKpQ.0Q3INRjqtmjvZV8PQNexw\\/8mFjoe1ay\",\"is_active\":\"1\",\"roleid\":\"2\",\"remember_token\":null,\"created_at\":null,\"created_by\":null,\"updated_at\":\"2021-08-09 14:24:40\",\"updated_by\":\"V0001\",\"is_deleted\":\"1\",\"deleted_at\":\"2021-08-10 08:58:25\",\"deleted_by\":\"admin\",\"is_recovered\":\"0\",\"recovered_at\":\"2021-08-06 11:01:12\",\"recovered_by\":\"admin\",\"last_login\":\"2021-08-09 14:24:40\"},{\"id\":\"5\",\"username\":\"V0002\",\"name\":\"Vendor Y\",\"avatar\":\"avatar.png\",\"phone_number\":\"0\",\"email\":\"example1@example.com\",\"password\":\"$2y$10$jAmYQ\\/oQpF5Iqk08bEx43es7ddqA.6ObxEjn0hB67BNFYoV3vwYQi\",\"is_active\":\"1\",\"roleid\":\"2\",\"remember_token\":null,\"created_at\":null,\"created_by\":null,\"updated_at\":\"2021-08-07 11:49:15\",\"updated_by\":\"V0002\",\"is_deleted\":\"1\",\"deleted_at\":\"2021-08-10 08:58:29\",\"deleted_by\":\"admin\",\"is_recovered\":\"0\",\"recovered_at\":null,\"recovered_by\":null,\"last_login\":\"2021-08-07 11:49:15\"}]', '2021-08-10 09:17:18');
INSERT INTO `_log_activity` VALUES (10, 'delete', '1', 'users', '', '2021-08-10 09:18:17');
INSERT INTO `_log_activity` VALUES (11, 'update', '1', 'users', '{\"id\":\"1\",\"username\":\"admin\",\"name\":\"Administrator\",\"avatar\":\"avatar.png\",\"phone_number\":\"089648338115\",\"email\":\"admin@example.com\",\"password\":\"$2y$10$UymeeVc9B5GEQQV4n0ADfOI7Hy5PYMkE1796SnFYqmzXapTyfsDte\",\"is_active\":\"1\",\"roleid\":\"1\",\"remember_token\":\"56V30s1lTY\",\"created_at\":\"2021-04-30 00:00:00\",\"created_by\":null,\"updated_at\":\"2021-08-10 09:16:28\",\"updated_by\":\"admin\",\"is_deleted\":\"0\",\"deleted_at\":null,\"deleted_by\":null,\"is_recovered\":\"0\",\"recovered_at\":null,\"recovered_by\":null,\"last_login\":\"2021-08-10 08:46:22\"}', '2021-08-10 09:18:33');
COMMIT;

-- ----------------------------
-- Table structure for roles
-- ----------------------------
DROP TABLE IF EXISTS `roles`;
CREATE TABLE `roles` (
  `roleid` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `rolename` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `desc` text COLLATE utf8_unicode_ci,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `is_deleted` tinyint(1) DEFAULT '0',
  `deleted_at` datetime DEFAULT NULL,
  `deleted_by` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `is_recovered` tinyint(1) DEFAULT '0',
  `recovered_at` datetime DEFAULT NULL,
  `recovered_by` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  PRIMARY KEY (`roleid`),
  UNIQUE KEY `roles_rolename_unique` (`rolename`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- ----------------------------
-- Records of roles
-- ----------------------------
BEGIN;
INSERT INTO `roles` VALUES (1, 'admin', 'Administrator', '2021-04-30 11:03:58', NULL, 0, NULL, NULL, 0, NULL, NULL);
INSERT INTO `roles` VALUES (2, 'user', 'Pengguna', '2021-04-30 11:03:58', NULL, 0, NULL, NULL, 0, NULL, NULL);
COMMIT;

-- ----------------------------
-- Table structure for users
-- ----------------------------
DROP TABLE IF EXISTS `users`;
CREATE TABLE `users` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `username` varchar(100) CHARACTER SET utf8 NOT NULL,
  `name` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `avatar` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `phone_number` varchar(15) COLLATE utf8_unicode_ci DEFAULT NULL,
  `email` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `password` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `is_active` tinyint(1) NOT NULL,
  `roleid` int(11) NOT NULL,
  `remember_token` varchar(100) COLLATE utf8_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `created_by` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `updated_by` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `is_deleted` tinyint(1) DEFAULT '0',
  `deleted_at` datetime DEFAULT NULL,
  `deleted_by` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `is_recovered` tinyint(1) DEFAULT '0',
  `recovered_at` datetime DEFAULT NULL,
  `recovered_by` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `last_login` datetime DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `users_username_unique` (`username`),
  UNIQUE KEY `users_email_unique` (`email`)
) ENGINE=InnoDB AUTO_INCREMENT=8 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- ----------------------------
-- Records of users
-- ----------------------------
BEGIN;
INSERT INTO `users` VALUES (1, 'admin', 'Administrator', 'avatar.png', '089648338115', 'admin@example.com', '$2y$10$UymeeVc9B5GEQQV4n0ADfOI7Hy5PYMkE1796SnFYqmzXapTyfsDte', 1, 1, '56V30s1lTY', '2021-04-30 00:00:00', NULL, '2021-08-10 09:18:33', 'admin', 0, NULL, NULL, 0, NULL, NULL, '2021-08-10 09:18:33');
INSERT INTO `users` VALUES (6, 'user1', 'Pengguna 1', 'avatar.png', '0', 'user1@example.com', '$2y$10$.HVUaz.wUgAf5lL..xEESuXf7FtUmfmAYCeKZMMP3DFdZpy0tXTkq', 1, 2, NULL, NULL, NULL, NULL, NULL, 1, '2021-08-10 09:18:17', 'admin', 0, NULL, NULL, NULL);
INSERT INTO `users` VALUES (7, 'user2', 'Pengguna 2', 'avatar.png', '0', 'user2@example.com', '$2y$10$ypjVa8P9qhco8Fra4sTFueGItUpZBD0xrk7Ht6dM4WVK5lRe1jth2', 1, 2, NULL, NULL, NULL, NULL, NULL, 0, NULL, NULL, 0, NULL, NULL, NULL);
COMMIT;

SET FOREIGN_KEY_CHECKS = 1;
