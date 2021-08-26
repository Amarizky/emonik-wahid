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

 Date: 10/08/2021 08:40:52
*/

SET NAMES utf8mb4;
SET FOREIGN_KEY_CHECKS = 0;

-- ----------------------------
-- Table structure for settings
-- ----------------------------
DROP TABLE IF EXISTS `settings`;
CREATE TABLE `settings` (
  `setting_id` int(11) NOT NULL AUTO_INCREMENT,
  `setting_name` varchar(200) DEFAULT NULL,
  `setting_desc` text,
  `created_at` datetime DEFAULT NULL,
  `created_by` varchar(100) DEFAULT NULL,
  `updated_at` datetime DEFAULT NULL,
  `updated_by` varchar(100) DEFAULT NULL,
  PRIMARY KEY (`setting_id`)
) ENGINE=InnoDB AUTO_INCREMENT=7 DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of settings
-- ----------------------------
BEGIN;
INSERT INTO `settings` VALUES (1, 'faq', '1', '2020-12-20 11:35:36', 'admin', '2020-12-20 11:35:43', 'admin');
INSERT INTO `settings` VALUES (2, 'about_us', 'PT Pupuk Kujang adalah salah satu Anak Perusahaan BUMN yang bergerak dibidang industri pupuk dan agrokimia. ', '2020-12-20 15:07:07', 'admin', NULL, 'admin');
INSERT INTO `settings` VALUES (3, 'youtube_code', 'oUKatk3UXb4', '2020-12-20 15:08:18', 'admin', NULL, NULL);
INSERT INTO `settings` VALUES (4, 'email', 'rekrutmen.kujang@gmail.com', '2020-12-20 15:17:37', 'admin', NULL, NULL);
INSERT INTO `settings` VALUES (5, 'template_lolos_administratif', '<p style=\"margin: 10px 0px;\">\n          Kepada Yth, <br /><b>$name</b> <br />di Tempat\n          <br /><br />\n          Terima kasih atas lamaran yang telah Anda ajukan sebagai posisi <b>$job_title</b> di PT Pupuk Kujang.\n          <br /><br />\n          Berdasarkan lamaran yang Anda ajukan dan hasil seleksi panitia maka Anda dinyatakan <b>Lolos Seleksi Administrasi</b>.\n          Untuk itu kami berniat untuk mengundang Anda wawancara melalui [Datang Langsung / via Telepon / via Video Chat] supaya\n          dapat mengenal Anda lebih jauh dan menjelaskan kepada Anda lebih detail tentang pekerjaan ini.\n          <br /><br />\n          Adapun jadwal wawancara nya adalah sebagai berikut:\n        <ul>\n          <li>hari, tanggal : [Ganti Tanggal dan Hari]</li>\n          <li>pukul : [Ganti Waktu] WIB</li>\n          <li>tempat : Gedung Learning Center, PT Pupuk Kujang</li>\n        </ul>\n        <br /><br />\n        Kami berharap Anda dapat datang tepat waktu dan ketidakhadiran Anda kami anggap sebagai bentuk <b>mengundurkan diri</b>.\n        <br />\n        Atas perhatian dan kehadiran Anda disampaikan terimakasih\n        <br />\n        <p style=\"color: #009688;\"><span\n            style=\"font-family: -apple-system, BlinkMacSystemFont, &quot;Segoe UI&quot;, Roboto, Ubuntu, &quot;Open Sans&quot;, &quot;Helvetica Neue&quot;, sans-serif; font-size: small;\">Salam\n            Hangat,</span> <br> <span\n            style=\"font-family: -apple-system, BlinkMacSystemFont, &quot;Segoe UI&quot;, Roboto, Ubuntu, &quot;Open Sans&quot;, &quot;Helvetica Neue&quot;, sans-serif; font-size: small;\">\n            <strong> Panitia Rekrutmen Pupuk Kujang</strong>\n          </span></p>\n        </p>', '2020-12-28 14:29:36', 'admin', NULL, NULL);
INSERT INTO `settings` VALUES (6, 'template_tidak_lolos_administratif', '<p style=\"margin: 10px 0px;\">\n          Kepada Yth, <br /><b>$name</b> <br />di Tempat\n          <br /><br />\n          Terima kasih kami ucapkan atas lamaran Anda di PT Pupuk Kujang. Dengan berat hati, kami sampaikan bahwa Anda <b>tidak bisa\n          mengikuti tahapan seleksi selanjutnya</b> dikarenakan adanya kandidat lain yang lebih memenuhi\n          kualifikasi yang kami harapkan untuk posisi ini.\n          <br/>\n          <p style=\"color: #009688;\"><span\n              style=\"font-family: -apple-system, BlinkMacSystemFont, &quot;Segoe UI&quot;, Roboto, Ubuntu, &quot;Open Sans&quot;, &quot;Helvetica Neue&quot;, sans-serif; font-size: small;\">Salam\n              Hangat,</span> <br> <span\n              style=\"font-family: -apple-system, BlinkMacSystemFont, &quot;Segoe UI&quot;, Roboto, Ubuntu, &quot;Open Sans&quot;, &quot;Helvetica Neue&quot;, sans-serif; font-size: small;\">\n              <strong> Panitia Rekrutmen Pupuk Kujang</strong>\n            </span></p>\n        </p>', NULL, NULL, NULL, NULL);
COMMIT;

SET FOREIGN_KEY_CHECKS = 1;
