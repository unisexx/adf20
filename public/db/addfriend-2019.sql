/*
Navicat MySQL Data Transfer

Source Server         : local
Source Server Version : 50724
Source Host           : localhost:3306
Source Database       : addfriend-2019

Target Server Type    : MYSQL
Target Server Version : 50724
File Encoding         : 65001

Date: 2020-02-17 21:44:01
*/

SET FOREIGN_KEY_CHECKS=0;

-- ----------------------------
-- Table structure for banners
-- ----------------------------
DROP TABLE IF EXISTS `banners`;
CREATE TABLE `banners` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `start_date` varchar(50) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `start_date_submit` date DEFAULT NULL,
  `end_date` varchar(50) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `end_date_submit` date DEFAULT NULL,
  `imgur` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `url` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `status` tinyint(4) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- ----------------------------
-- Records of banners
-- ----------------------------
INSERT INTO `banners` VALUES ('1', '2020-01-30 22:30:37', '2020-01-30 22:30:37', '30 มกราคม, 2020', '2020-01-30', '30 มกราคม, 2025', '2025-01-30', 'https://i.imgur.com/Idr7WjA.png', 'https://www.line2me.in.th', '1');
INSERT INTO `banners` VALUES ('2', '2020-01-30 22:31:58', '2020-01-30 22:31:58', '30 มกราคม, 2020', '2020-01-30', '31 ธันวาคม, 2020', '2020-12-31', 'https://i.imgur.com/Wn3Bz4l.png', 'https://www.linesticker.in.th', '1');

-- ----------------------------
-- Table structure for bans
-- ----------------------------
DROP TABLE IF EXISTS `bans`;
CREATE TABLE `bans` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `bannable_type` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `bannable_id` bigint(20) unsigned NOT NULL,
  `created_by_type` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_by_id` bigint(20) unsigned DEFAULT NULL,
  `comment` text COLLATE utf8mb4_unicode_ci,
  `expired_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `bans_bannable_type_bannable_id_index` (`bannable_type`,`bannable_id`),
  KEY `bans_created_by_type_created_by_id_index` (`created_by_type`,`created_by_id`),
  KEY `bans_expired_at_index` (`expired_at`)
) ENGINE=InnoDB AUTO_INCREMENT=15 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- ----------------------------
-- Records of bans
-- ----------------------------
INSERT INTO `bans` VALUES ('1', 'App\\User', '2', 'App\\User', '1', null, null, '2020-01-02 07:58:19', '2020-01-02 07:56:32', '2020-01-02 07:58:19');
INSERT INTO `bans` VALUES ('2', 'App\\User', '1', 'App\\User', '1', null, null, '2020-01-02 08:13:48', '2020-01-02 07:58:39', '2020-01-02 08:13:48');
INSERT INTO `bans` VALUES ('3', 'App\\User', '2', 'App\\User', '1', null, null, '2020-01-04 21:03:58', '2020-01-02 08:41:44', '2020-01-04 21:03:58');
INSERT INTO `bans` VALUES ('4', 'App\\User', '3', 'App\\User', '1', null, null, null, '2020-01-02 08:41:46', '2020-01-02 08:41:46');
INSERT INTO `bans` VALUES ('5', 'App\\User', '4', 'App\\User', '1', null, null, null, '2020-01-02 08:42:02', '2020-01-02 08:42:02');
INSERT INTO `bans` VALUES ('6', 'App\\User', '5', 'App\\User', '1', null, null, null, '2020-01-02 08:42:39', '2020-01-02 08:42:39');
INSERT INTO `bans` VALUES ('7', 'App\\User', '6', 'App\\User', '1', null, null, null, '2020-01-02 08:42:40', '2020-01-02 08:42:40');
INSERT INTO `bans` VALUES ('8', 'App\\User', '7', 'App\\User', '1', null, null, null, '2020-01-02 08:42:42', '2020-01-02 08:42:42');
INSERT INTO `bans` VALUES ('9', 'App\\User', '8', 'App\\User', '1', null, null, null, '2020-01-02 08:43:02', '2020-01-02 08:43:02');
INSERT INTO `bans` VALUES ('10', 'App\\User', '9', 'App\\User', '1', null, null, null, '2020-01-02 08:43:04', '2020-01-02 08:43:04');
INSERT INTO `bans` VALUES ('11', 'App\\User', '10', 'App\\User', '1', null, null, null, '2020-01-02 08:43:06', '2020-01-02 08:43:06');
INSERT INTO `bans` VALUES ('12', 'App\\User', '18', 'App\\User', '1', null, null, null, '2020-01-02 08:43:15', '2020-01-02 08:43:15');
INSERT INTO `bans` VALUES ('13', 'App\\User', '17', 'App\\User', '1', null, null, null, '2020-01-02 08:43:17', '2020-01-02 08:43:17');
INSERT INTO `bans` VALUES ('14', 'App\\User', '16', 'App\\User', '1', null, null, null, '2020-01-02 08:43:20', '2020-01-02 08:43:20');

-- ----------------------------
-- Table structure for blockers
-- ----------------------------
DROP TABLE IF EXISTS `blockers`;
CREATE TABLE `blockers` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `blockable_id` int(11) NOT NULL,
  `blockable_type` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `blocker_id` int(11) DEFAULT NULL,
  `blocker_type` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- ----------------------------
-- Records of blockers
-- ----------------------------

-- ----------------------------
-- Table structure for chat_msgs
-- ----------------------------
DROP TABLE IF EXISTS `chat_msgs`;
CREATE TABLE `chat_msgs` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `chat_room_id` int(11) DEFAULT NULL,
  `text` text COLLATE utf8mb4_unicode_ci,
  `user_id` int(11) DEFAULT NULL,
  `is_read` tinyint(1) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=90 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- ----------------------------
-- Records of chat_msgs
-- ----------------------------
INSERT INTO `chat_msgs` VALUES ('1', '2020-01-12 14:59:25', '2020-01-12 14:59:25', '1', '123', '1', null);
INSERT INTO `chat_msgs` VALUES ('2', '2020-01-12 15:01:12', '2020-01-12 15:01:12', '1', '555', '2', null);
INSERT INTO `chat_msgs` VALUES ('3', '2020-01-12 15:32:58', '2020-01-12 15:32:58', '1', 'ทดสอบดิ๊\n555', '1', null);
INSERT INTO `chat_msgs` VALUES ('4', '2020-01-12 15:34:38', '2020-01-12 15:34:38', '1', '5555', '1', null);
INSERT INTO `chat_msgs` VALUES ('5', '2020-01-12 20:49:29', '2020-01-12 20:49:29', '1', '888', '1', null);
INSERT INTO `chat_msgs` VALUES ('6', '2020-01-12 21:07:49', '2020-01-12 21:07:49', '1', '123', '1', null);
INSERT INTO `chat_msgs` VALUES ('7', '2020-01-12 21:09:09', '2020-01-12 21:09:09', '1', '555', '1', null);
INSERT INTO `chat_msgs` VALUES ('8', '2020-01-12 21:10:08', '2020-01-12 21:10:08', '1', 'สวัสดีจ้า', '1', null);
INSERT INTO `chat_msgs` VALUES ('9', '2020-01-12 21:10:28', '2020-01-12 21:10:28', '1', '654654564', '1', null);
INSERT INTO `chat_msgs` VALUES ('10', '2020-01-12 21:10:56', '2020-01-12 21:10:56', '1', '555', '1', null);
INSERT INTO `chat_msgs` VALUES ('11', '2020-01-12 21:11:51', '2020-01-12 21:11:51', '1', '1212345456', '1', null);
INSERT INTO `chat_msgs` VALUES ('12', '2020-01-12 21:12:46', '2020-01-12 21:12:46', '1', '1212312121', '2', null);
INSERT INTO `chat_msgs` VALUES ('13', '2020-01-12 21:12:59', '2020-01-12 21:12:59', '1', 'สวัสดีจ้า', '2', null);
INSERT INTO `chat_msgs` VALUES ('14', '2020-01-12 21:15:33', '2020-01-12 21:15:33', '1', 'สวัสดีจ้า', '2', null);
INSERT INTO `chat_msgs` VALUES ('15', '2020-01-12 21:15:46', '2020-01-12 21:15:46', '1', 'ทดสอบ', '1', null);
INSERT INTO `chat_msgs` VALUES ('16', '2020-01-12 21:15:52', '2020-01-12 21:15:52', '1', 'สวัสดีจ้า', '2', null);
INSERT INTO `chat_msgs` VALUES ('17', '2020-01-12 21:16:13', '2020-01-12 21:16:13', '1', 'ทดสอบ ทดสอบ\nทดสอบ\nทดสอบ', '2', null);
INSERT INTO `chat_msgs` VALUES ('18', '2020-01-12 21:16:33', '2020-01-12 21:16:33', '1', 'test', '1', null);
INSERT INTO `chat_msgs` VALUES ('19', '2020-01-12 21:19:52', '2020-01-12 21:19:52', '1', '555\n666', '1', null);
INSERT INTO `chat_msgs` VALUES ('20', '2020-01-12 21:22:43', '2020-01-12 21:22:43', '1', 'สวัสดี', '1', null);
INSERT INTO `chat_msgs` VALUES ('21', '2020-01-12 21:22:52', '2020-01-12 21:22:52', '1', 'ทดสอบ', '1', null);
INSERT INTO `chat_msgs` VALUES ('22', '2020-01-12 21:41:12', '2020-01-12 21:41:12', '1', 'อ๋อ', '1', null);
INSERT INTO `chat_msgs` VALUES ('23', '2020-01-12 21:41:31', '2020-01-12 21:41:31', '1', '123123', '1', null);
INSERT INTO `chat_msgs` VALUES ('24', '2020-01-12 21:42:04', '2020-01-12 21:42:04', '1', 'อ้อ', '2', null);
INSERT INTO `chat_msgs` VALUES ('25', '2020-01-12 21:42:16', '2020-01-12 21:42:16', '1', 'ด่าวฟสาหก่ดวฟสาหด', '1', null);
INSERT INTO `chat_msgs` VALUES ('26', '2020-01-12 21:42:34', '2020-01-12 21:42:34', '1', 'ฟหกดฟหกด', '1', null);
INSERT INTO `chat_msgs` VALUES ('27', '2020-01-12 21:42:37', '2020-01-12 21:42:37', '1', 'กกกกก', '1', null);
INSERT INTO `chat_msgs` VALUES ('28', '2020-01-12 21:42:41', '2020-01-12 21:42:41', '1', 'ฟหกดฟหกด', '2', null);
INSERT INTO `chat_msgs` VALUES ('29', '2020-01-12 21:42:47', '2020-01-12 21:42:47', '1', 'กดกดกดกดกด', '2', null);
INSERT INTO `chat_msgs` VALUES ('30', '2020-01-12 21:42:49', '2020-01-12 21:42:49', '1', 'ฟหกดฟหกด', '2', null);
INSERT INTO `chat_msgs` VALUES ('31', '2020-01-12 21:42:52', '2020-01-12 21:42:52', '1', 'กดกดกดกด', '1', null);
INSERT INTO `chat_msgs` VALUES ('32', '2020-01-12 21:45:08', '2020-01-12 21:45:08', '1', '555', '2', null);
INSERT INTO `chat_msgs` VALUES ('33', '2020-01-12 21:45:12', '2020-01-12 21:45:12', '1', '999', '1', null);
INSERT INTO `chat_msgs` VALUES ('34', '2020-01-12 21:45:31', '2020-01-12 21:45:31', '1', 'งงเลยจ่ะ', '1', null);
INSERT INTO `chat_msgs` VALUES ('35', '2020-01-12 21:50:05', '2020-01-12 21:50:05', '1', 'ดีจ้า', '1', null);
INSERT INTO `chat_msgs` VALUES ('36', '2020-01-12 21:50:13', '2020-01-12 21:50:13', '1', 'ราคาเท่าไหร่', '1', null);
INSERT INTO `chat_msgs` VALUES ('37', '2020-01-12 21:51:27', '2020-01-12 21:51:27', '1', '123', '1', null);
INSERT INTO `chat_msgs` VALUES ('38', '2020-01-12 21:53:55', '2020-01-12 21:53:55', '1', '321321', '1', null);
INSERT INTO `chat_msgs` VALUES ('39', '2020-01-12 21:54:02', '2020-01-12 21:54:02', '1', '888', '1', null);
INSERT INTO `chat_msgs` VALUES ('40', '2020-01-12 21:54:07', '2020-01-12 21:54:07', '1', '654654564', '1', null);
INSERT INTO `chat_msgs` VALUES ('41', '2020-01-12 21:54:09', '2020-01-12 21:54:09', '1', '23123132123', '1', null);
INSERT INTO `chat_msgs` VALUES ('42', '2020-01-12 21:54:55', '2020-01-12 21:54:55', '1', '1231231231', '1', null);
INSERT INTO `chat_msgs` VALUES ('43', '2020-01-12 21:57:35', '2020-01-12 21:57:35', '1', '12132', '1', null);
INSERT INTO `chat_msgs` VALUES ('44', '2020-01-12 21:58:06', '2020-01-12 21:58:06', '1', '555', '2', null);
INSERT INTO `chat_msgs` VALUES ('45', '2020-01-12 21:58:18', '2020-01-12 21:58:18', '1', 'สวัสดีจ้า', '2', null);
INSERT INTO `chat_msgs` VALUES ('46', '2020-01-12 21:59:03', '2020-01-12 21:59:03', '1', '123123', '1', null);
INSERT INTO `chat_msgs` VALUES ('47', '2020-01-12 21:59:36', '2020-01-12 21:59:36', '1', '555', '1', null);
INSERT INTO `chat_msgs` VALUES ('48', '2020-01-12 22:00:10', '2020-01-12 22:00:10', '1', '1212312121', '1', null);
INSERT INTO `chat_msgs` VALUES ('49', '2020-01-12 22:00:16', '2020-01-12 22:00:16', '1', 'asdfasf', '2', null);
INSERT INTO `chat_msgs` VALUES ('50', '2020-01-12 22:00:20', '2020-01-12 22:00:20', '1', '555', '2', null);
INSERT INTO `chat_msgs` VALUES ('51', '2020-01-12 22:00:31', '2020-01-12 22:00:31', '1', '999', '2', null);
INSERT INTO `chat_msgs` VALUES ('52', '2020-01-12 22:02:01', '2020-01-12 22:02:01', '1', '787897897987', '2', null);
INSERT INTO `chat_msgs` VALUES ('53', '2020-01-12 22:02:09', '2020-01-12 22:02:09', '1', '123123123', '1', null);
INSERT INTO `chat_msgs` VALUES ('54', '2020-01-12 22:07:03', '2020-01-12 22:07:03', '1', '987', '1', null);
INSERT INTO `chat_msgs` VALUES ('55', '2020-01-12 22:07:18', '2020-01-12 22:07:18', '1', '897897897', '1', null);
INSERT INTO `chat_msgs` VALUES ('56', '2020-01-12 22:07:33', '2020-01-12 22:07:33', '1', '12132321', '2', null);
INSERT INTO `chat_msgs` VALUES ('61', '2020-01-12 22:14:30', '2020-01-12 22:14:30', '1', 'asdfasdfasdf', '1', null);
INSERT INTO `chat_msgs` VALUES ('62', '2020-01-12 22:17:07', '2020-01-12 22:17:07', '1', '...', '1', null);
INSERT INTO `chat_msgs` VALUES ('63', '2020-01-12 22:17:12', '2020-01-12 22:17:12', '1', '1212312121', '1', null);
INSERT INTO `chat_msgs` VALUES ('64', '2020-01-12 22:17:17', '2020-01-12 22:17:17', '1', '45456454544', '1', null);
INSERT INTO `chat_msgs` VALUES ('65', '2020-01-13 13:00:35', '2020-01-13 13:00:35', '1', 'สวัสดีจ้า', '1', null);
INSERT INTO `chat_msgs` VALUES ('66', '2020-01-13 13:01:45', '2020-01-13 13:01:45', '1', 'ทดสอบ', '1', null);
INSERT INTO `chat_msgs` VALUES ('67', '2020-01-13 13:02:33', '2020-01-13 13:02:33', '1', 'server', '1', null);
INSERT INTO `chat_msgs` VALUES ('68', '2020-01-13 14:51:05', '2020-01-13 14:51:05', '2', 'ดีจ้า', '1', null);
INSERT INTO `chat_msgs` VALUES ('69', '2020-01-13 15:23:12', '2020-01-13 15:23:12', '6', 'ดีจ้า', '2', null);
INSERT INTO `chat_msgs` VALUES ('70', '2020-01-13 15:23:39', '2020-01-13 15:23:39', '2', 'จ้า ชื่อไรอ่ะ', '2', null);
INSERT INTO `chat_msgs` VALUES ('71', '2020-01-13 15:23:49', '2020-01-13 15:23:49', '2', 'เราชื่อแมว', '1', null);
INSERT INTO `chat_msgs` VALUES ('72', '2020-01-13 15:23:53', '2020-01-13 15:23:53', '2', 'เธออ่ะ', '1', null);
INSERT INTO `chat_msgs` VALUES ('73', '2020-01-13 17:31:55', '2020-01-13 17:31:55', '2', 'เงียบเลย', '1', null);
INSERT INTO `chat_msgs` VALUES ('74', '2020-01-20 13:00:23', '2020-01-20 13:00:23', '2', 'ส่งข้อความหน่อย', '1', null);
INSERT INTO `chat_msgs` VALUES ('75', '2020-01-20 13:54:13', '2020-01-20 13:54:13', '2', 'ทดสอบ', '1', null);
INSERT INTO `chat_msgs` VALUES ('76', '2020-02-02 19:33:29', '2020-02-02 19:33:29', '1', 'ทดสอบ', '1', null);
INSERT INTO `chat_msgs` VALUES ('77', '2020-02-02 20:30:00', '2020-02-02 20:30:00', '1', '...', '1', null);
INSERT INTO `chat_msgs` VALUES ('78', '2020-02-02 20:30:13', '2020-02-02 20:30:13', '1', '...', '1', null);
INSERT INTO `chat_msgs` VALUES ('79', '2020-02-02 20:32:20', '2020-02-02 20:32:20', '1', '...', '1', null);
INSERT INTO `chat_msgs` VALUES ('80', '2020-02-02 20:32:29', '2020-02-02 20:32:29', '1', '...', '1', null);
INSERT INTO `chat_msgs` VALUES ('81', '2020-02-02 20:32:57', '2020-02-02 20:32:57', '1', '1231321231321', '1', null);
INSERT INTO `chat_msgs` VALUES ('82', '2020-02-02 20:33:06', '2020-02-02 20:33:06', '1', 'ทดสอบความเร็ว', '1', null);
INSERT INTO `chat_msgs` VALUES ('83', '2020-02-02 20:33:17', '2020-02-02 20:33:17', '1', '111', '1', null);
INSERT INTO `chat_msgs` VALUES ('84', '2020-02-02 20:33:19', '2020-02-02 20:33:19', '1', '222', '1', null);
INSERT INTO `chat_msgs` VALUES ('85', '2020-02-02 20:41:25', '2020-02-02 20:41:25', '2', 'ยังไง', '1', null);
INSERT INTO `chat_msgs` VALUES ('86', '2020-02-02 20:41:29', '2020-02-02 20:41:29', '2', 'ๆๆๆ', '1', null);
INSERT INTO `chat_msgs` VALUES ('87', '2020-02-15 20:27:31', '2020-02-15 20:27:31', '1', 'สวัสดีครับทุกคน', '1', null);
INSERT INTO `chat_msgs` VALUES ('88', '2020-02-15 20:27:47', '2020-02-15 20:27:47', '2', 'ยังอยู่ไหมครับ', '1', null);
INSERT INTO `chat_msgs` VALUES ('89', '2020-02-15 20:29:27', '2020-02-15 20:29:27', '7', 'สวัสดีครับ เป็นเกย์หรอครับ อยู่แถวไหน', '1', null);

-- ----------------------------
-- Table structure for chat_rooms
-- ----------------------------
DROP TABLE IF EXISTS `chat_rooms`;
CREATE TABLE `chat_rooms` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `from_user_id` int(11) DEFAULT NULL,
  `to_user_id` int(11) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=8 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- ----------------------------
-- Records of chat_rooms
-- ----------------------------
INSERT INTO `chat_rooms` VALUES ('1', '2020-01-12 14:13:46', '2020-01-12 14:13:49', null, null);
INSERT INTO `chat_rooms` VALUES ('2', '2020-01-13 14:48:18', '2020-01-13 14:48:18', '1', '2');
INSERT INTO `chat_rooms` VALUES ('6', '2020-01-13 15:22:43', '2020-01-13 15:22:43', '2', '15');
INSERT INTO `chat_rooms` VALUES ('7', '2020-02-15 20:29:12', '2020-02-15 20:29:12', '1', '10');

-- ----------------------------
-- Table structure for failed_jobs
-- ----------------------------
DROP TABLE IF EXISTS `failed_jobs`;
CREATE TABLE `failed_jobs` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `connection` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `queue` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `payload` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `exception` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `failed_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- ----------------------------
-- Records of failed_jobs
-- ----------------------------

-- ----------------------------
-- Table structure for followers
-- ----------------------------
DROP TABLE IF EXISTS `followers`;
CREATE TABLE `followers` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `followable_id` int(11) NOT NULL,
  `followable_type` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `follower_id` int(11) DEFAULT NULL,
  `follower_type` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=10 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- ----------------------------
-- Records of followers
-- ----------------------------
INSERT INTO `followers` VALUES ('4', '16', 'App\\User', '1', 'App\\User', '2019-12-28 13:36:55', '2019-12-28 13:36:55');
INSERT INTO `followers` VALUES ('5', '13', 'App\\User', '1', 'App\\User', '2019-12-28 13:36:57', '2019-12-28 13:36:57');
INSERT INTO `followers` VALUES ('6', '2', 'App\\User', '1', 'App\\User', '2019-12-28 13:41:09', '2019-12-28 13:41:09');
INSERT INTO `followers` VALUES ('7', '3', 'App\\User', '1', 'App\\User', '2019-12-28 14:00:11', '2019-12-28 14:00:11');
INSERT INTO `followers` VALUES ('8', '14', 'App\\User', '1', 'App\\User', '2020-01-02 20:26:13', '2020-01-02 20:26:13');
INSERT INTO `followers` VALUES ('9', '1', 'App\\User', '2', 'App\\User', '2020-01-04 21:05:36', '2020-01-04 21:05:36');

-- ----------------------------
-- Table structure for likers
-- ----------------------------
DROP TABLE IF EXISTS `likers`;
CREATE TABLE `likers` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `likeable_id` int(11) NOT NULL,
  `likeable_type` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `liker_id` int(11) DEFAULT NULL,
  `liker_type` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- ----------------------------
-- Records of likers
-- ----------------------------
INSERT INTO `likers` VALUES ('1', '1', 'App\\User', '2', 'App\\User', '2020-01-04 21:05:39', '2020-01-04 21:05:39');

-- ----------------------------
-- Table structure for login_histories
-- ----------------------------
DROP TABLE IF EXISTS `login_histories`;
CREATE TABLE `login_histories` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `user_id` int(11) DEFAULT NULL,
  `ip` varchar(50) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `country_name` varchar(50) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `country_code` varchar(5) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `region_code` varchar(5) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `region_name` varchar(50) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `city_name` varchar(50) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `zip_code` varchar(10) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `iso_code` varchar(20) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `postal_code` varchar(20) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `latitude` varchar(20) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `longitude` varchar(20) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `metro_code` varchar(20) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `area_code` varchar(10) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=30 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- ----------------------------
-- Records of login_histories
-- ----------------------------
INSERT INTO `login_histories` VALUES ('1', '2020-01-03 20:59:49', '2020-01-03 20:59:49', '1', '66.102.0.0', 'United States', 'US', 'VA', 'Virginia', 'Ashburn', '20149', null, null, '39.0438', '-77.4874', null, 'VA');
INSERT INTO `login_histories` VALUES ('2', '2020-01-03 21:04:09', '2020-01-03 21:04:09', '1', '171.7.71.222', 'Thailand', 'TH', '10', 'Bangkok', 'Bangkok', '10220', null, null, '13.8638', '100.5998', null, '10');
INSERT INTO `login_histories` VALUES ('3', '2020-01-03 21:29:52', '2020-01-03 21:29:52', '1', null, null, null, null, null, null, null, null, null, null, null, null, null);
INSERT INTO `login_histories` VALUES ('4', '2020-01-03 21:33:05', '2020-01-03 21:33:05', '1', '66.102.0.0', 'United States', 'US', 'VA', 'Virginia', 'Ashburn', '20149', null, null, '39.0438', '-77.4874', null, 'VA');
INSERT INTO `login_histories` VALUES ('5', '2020-01-03 21:40:16', '2020-01-03 21:40:16', '1', '66.102.0.0', 'United States', 'US', 'VA', 'Virginia', 'Ashburn', '20149', null, null, '39.0438', '-77.4874', null, 'VA');
INSERT INTO `login_histories` VALUES ('6', '2020-01-04 18:36:42', '2020-01-04 18:36:42', '1', '66.102.0.0', 'United States', 'US', 'VA', 'Virginia', 'Ashburn', '20149', null, null, '39.0438', '-77.4874', null, 'VA');
INSERT INTO `login_histories` VALUES ('7', '2020-01-04 20:56:04', '2020-01-04 20:56:04', '1', '66.102.0.0', 'United States', 'US', 'VA', 'Virginia', 'Ashburn', '20149', null, null, '39.0438', '-77.4874', null, 'VA');
INSERT INTO `login_histories` VALUES ('8', '2020-01-04 20:59:32', '2020-01-04 20:59:32', '1', '66.102.0.0', 'United States', 'US', 'VA', 'Virginia', 'Ashburn', '20149', null, null, '39.0438', '-77.4874', null, 'VA');
INSERT INTO `login_histories` VALUES ('9', '2020-01-04 21:02:50', '2020-01-04 21:02:50', '1', '66.102.0.0', 'United States', 'US', 'VA', 'Virginia', 'Ashburn', '20149', null, null, '39.0438', '-77.4874', null, 'VA');
INSERT INTO `login_histories` VALUES ('10', '2020-01-05 09:59:58', '2020-01-05 09:59:58', '1', '66.102.0.0', 'United States', 'US', 'VA', 'Virginia', 'Ashburn', '20149', null, null, '39.0438', '-77.4874', null, 'VA');
INSERT INTO `login_histories` VALUES ('11', '2020-01-05 20:45:14', '2020-01-05 20:45:14', '1', '66.102.0.0', 'United States', 'US', 'VA', 'Virginia', 'Ashburn', '20149', null, null, '39.0438', '-77.4874', null, 'VA');
INSERT INTO `login_histories` VALUES ('12', '2020-01-09 20:10:55', '2020-01-09 20:10:55', '1', '66.102.0.0', 'United States', 'US', 'VA', 'Virginia', 'Ashburn', '20149', null, null, '39.0438', '-77.4874', null, 'VA');
INSERT INTO `login_histories` VALUES ('13', '2020-01-11 15:36:48', '2020-01-11 15:36:48', '1', '66.102.0.0', 'United States', 'US', 'VA', 'Virginia', 'Ashburn', '20149', null, null, '39.0438', '-77.4874', null, 'VA');
INSERT INTO `login_histories` VALUES ('14', '2020-01-11 15:47:16', '2020-01-11 15:47:16', '1', '66.102.0.0', 'United States', 'US', 'VA', 'Virginia', 'Ashburn', '20149', null, null, '39.0438', '-77.4874', null, 'VA');
INSERT INTO `login_histories` VALUES ('15', '2020-01-11 15:56:04', '2020-01-11 15:56:04', '1', '66.102.0.0', 'United States', 'US', 'VA', 'Virginia', 'Ashburn', '20149', null, null, '39.0438', '-77.4874', null, 'VA');
INSERT INTO `login_histories` VALUES ('16', '2020-01-11 16:00:38', '2020-01-11 16:00:38', '1', '66.102.0.0', 'United States', 'US', 'VA', 'Virginia', 'Ashburn', '20149', null, null, '39.0438', '-77.4874', null, 'VA');
INSERT INTO `login_histories` VALUES ('17', '2020-01-11 19:33:40', '2020-01-11 19:33:40', '1', '66.102.0.0', 'United States', 'US', 'VA', 'Virginia', 'Ashburn', '20149', null, null, '39.0438', '-77.4874', null, 'VA');
INSERT INTO `login_histories` VALUES ('18', '2020-01-12 11:49:58', '2020-01-12 11:49:58', '1', '66.102.0.0', 'United States', 'US', 'VA', 'Virginia', 'Ashburn', '20149', null, null, '39.0438', '-77.4874', null, 'VA');
INSERT INTO `login_histories` VALUES ('19', '2020-01-12 14:40:50', '2020-01-12 14:40:50', '1', '66.102.0.0', 'United States', 'US', 'VA', 'Virginia', 'Ashburn', '20149', null, null, '39.0438', '-77.4874', null, 'VA');
INSERT INTO `login_histories` VALUES ('20', '2020-01-12 20:30:12', '2020-01-12 20:30:12', '1', '66.102.0.0', 'United States', 'US', 'VA', 'Virginia', 'Ashburn', '20149', null, null, '39.0438', '-77.4874', null, 'VA');
INSERT INTO `login_histories` VALUES ('21', '2020-01-13 13:00:13', '2020-01-13 13:00:13', '1', '66.102.0.0', 'United States', 'US', 'VA', 'Virginia', 'Ashburn', '20149', null, null, '39.0438', '-77.4874', null, 'VA');
INSERT INTO `login_histories` VALUES ('22', '2020-01-20 12:59:40', '2020-01-20 12:59:40', '1', '66.102.0.0', 'United States', 'US', 'VA', 'Virginia', 'Ashburn', '20149', null, null, '39.0438', '-77.4874', null, 'VA');
INSERT INTO `login_histories` VALUES ('23', '2020-01-20 17:08:14', '2020-01-20 17:08:14', '1', '66.102.0.0', 'United States', 'US', 'VA', 'Virginia', 'Ashburn', '20149', null, null, '39.0438', '-77.4874', null, 'VA');
INSERT INTO `login_histories` VALUES ('24', '2020-01-21 22:26:10', '2020-01-21 22:26:10', '1', '66.102.0.0', 'United States', 'US', 'VA', 'Virginia', 'Ashburn', '20149', null, null, '39.0438', '-77.4874', null, 'VA');
INSERT INTO `login_histories` VALUES ('25', '2020-01-30 22:10:24', '2020-01-30 22:10:24', '1', '66.102.0.0', 'United States', 'US', 'VA', 'Virginia', 'Ashburn', '20149', null, null, '39.0438', '-77.4874', null, 'VA');
INSERT INTO `login_histories` VALUES ('26', '2020-02-02 18:08:58', '2020-02-02 18:08:58', '1', '66.102.0.0', 'United States', 'US', 'VA', 'Virginia', 'Ashburn', '20149', null, null, '39.0438', '-77.4874', null, 'VA');
INSERT INTO `login_histories` VALUES ('27', '2020-02-15 19:47:34', '2020-02-15 19:47:34', '1', '66.102.0.0', 'United States', 'US', 'VA', 'Virginia', 'Ashburn', '20149', null, null, '39.0438', '-77.4874', null, 'VA');
INSERT INTO `login_histories` VALUES ('28', '2020-02-16 17:47:36', '2020-02-16 17:47:36', '1', '66.102.0.0', 'United States', 'US', 'VA', 'Virginia', 'Ashburn', '20149', null, null, '39.0438', '-77.4874', null, 'VA');
INSERT INTO `login_histories` VALUES ('29', '2020-02-16 17:51:22', '2020-02-16 17:51:22', '1', '66.102.0.0', null, 'US', null, 'California', 'Mountain View', '94043', null, null, '37.4056', '-122.0775', null, null);

-- ----------------------------
-- Table structure for migrations
-- ----------------------------
DROP TABLE IF EXISTS `migrations`;
CREATE TABLE `migrations` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `migration` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `batch` int(11) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=28 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- ----------------------------
-- Records of migrations
-- ----------------------------
INSERT INTO `migrations` VALUES ('1', '2014_10_12_000000_create_users_table', '1');
INSERT INTO `migrations` VALUES ('2', '2014_10_12_100000_create_password_resets_table', '1');
INSERT INTO `migrations` VALUES ('3', '2017_03_04_000000_create_bans_table', '1');
INSERT INTO `migrations` VALUES ('7', '2019_08_19_000000_create_failed_jobs_table', '1');
INSERT INTO `migrations` VALUES ('8', '2019_12_16_054625_create_social_facebook_accounts_table', '1');
INSERT INTO `migrations` VALUES ('9', '2019_12_19_041440_create_profiles_table', '1');
INSERT INTO `migrations` VALUES ('10', '2019_12_20_091558_add_banned_at_column_to_users_table', '1');
INSERT INTO `migrations` VALUES ('11', '2019_12_21_083724_create_sexes_table', '1');
INSERT INTO `migrations` VALUES ('12', '2019_12_27_034228_create_social_infos_table', '2');
INSERT INTO `migrations` VALUES ('13', '2018_06_29_032244_create_laravel_follow_tables', '3');
INSERT INTO `migrations` VALUES ('14', '2018_07_14_183253_followers', '4');
INSERT INTO `migrations` VALUES ('15', '2018_07_14_183254_blockers', '4');
INSERT INTO `migrations` VALUES ('16', '2018_07_14_183255_likers', '4');
INSERT INTO `migrations` VALUES ('17', '2020_01_03_093136_create_banners_table', '5');
INSERT INTO `migrations` VALUES ('18', '2020_01_03_200525_create_login_histories_table', '5');
INSERT INTO `migrations` VALUES ('19', '2014_10_28_175635_create_threads_table', '6');
INSERT INTO `migrations` VALUES ('20', '2014_10_28_175710_create_messages_table', '6');
INSERT INTO `migrations` VALUES ('21', '2014_10_28_180224_create_participants_table', '6');
INSERT INTO `migrations` VALUES ('22', '2014_11_03_154831_add_soft_deletes_to_participants_table', '6');
INSERT INTO `migrations` VALUES ('23', '2014_12_04_124531_add_softdeletes_to_threads_table', '6');
INSERT INTO `migrations` VALUES ('24', '2017_03_30_152742_add_soft_deletes_to_messages_table', '6');
INSERT INTO `migrations` VALUES ('25', '2020_01_11_134039_create_message_sockets_table', '7');
INSERT INTO `migrations` VALUES ('26', '2020_01_12_140043_create_chat_rooms_table', '8');
INSERT INTO `migrations` VALUES ('27', '2020_01_12_140526_create_chat_msgs_table', '9');

-- ----------------------------
-- Table structure for password_resets
-- ----------------------------
DROP TABLE IF EXISTS `password_resets`;
CREATE TABLE `password_resets` (
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `token` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  KEY `password_resets_email_index` (`email`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- ----------------------------
-- Records of password_resets
-- ----------------------------

-- ----------------------------
-- Table structure for profiles
-- ----------------------------
DROP TABLE IF EXISTS `profiles`;
CREATE TABLE `profiles` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `user_id` bigint(20) NOT NULL,
  `display_name` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `introduce` text COLLATE utf8mb4_unicode_ci,
  `imgur` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `publish` tinyint(4) DEFAULT NULL,
  `province_id` tinyint(4) DEFAULT NULL,
  `sex_id` tinyint(4) DEFAULT NULL,
  `birth_date` varchar(50) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `birth_date_submit` date DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `imgur_cover` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `imgur_cover_status` tinyint(4) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=21 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- ----------------------------
-- Records of profiles
-- ----------------------------
INSERT INTO `profiles` VALUES ('1', '1', 'line2me.in.th', 'ยินดีคลายเหงาวันนี้ให้สุภาพสตรีที่พักในกรุงเทพที่\r\nเหงาสะอาดต้องการสนใจที่จะแลกเปลี่ยนความเหงา\r\nเติมส่วนที่ขาดกันจริงอย่างป้องกันสุภาพสะอาดไม่หยาบคาย', 'https://i.imgur.com/Divo7E0.jpg', '1', '1', '1', '14 สิงหาคม, 1984', '1984-08-14', '2019-12-28 11:25:37', '2020-01-21 23:03:12', 'https://i.imgur.com/cr2RJeA.jpg', '1');
INSERT INTO `profiles` VALUES ('2', '2', 'krabi', 'test', 'https://i.imgur.com/jwbE0V1.png', '1', '65', '2', '1 มกราคม, 2002', '2002-01-01', '2020-01-04 21:04:48', '2020-01-04 21:05:03', null, null);
INSERT INTO `profiles` VALUES ('3', '3', 'krabi', 'test', 'https://i.imgur.com/jwbE0V1.png', '1', '65', '3', '1 มกราคม, 2002', '2002-01-01', '2020-01-04 21:04:48', '2020-01-04 21:05:03', '', null);
INSERT INTO `profiles` VALUES ('4', '4', 'krabi', 'test', 'https://i.imgur.com/jwbE0V1.png', '1', '65', '4', '1 มกราคม, 2002', '2002-01-01', '2020-01-04 21:04:48', '2020-01-04 21:05:03', '', null);
INSERT INTO `profiles` VALUES ('5', '5', 'krabi', 'test', 'https://i.imgur.com/jwbE0V1.png', '1', '65', '5', '1 มกราคม, 2002', '2002-01-01', '2020-01-04 21:04:48', '2020-01-04 21:05:03', '', null);
INSERT INTO `profiles` VALUES ('6', '6', 'krabi', 'test', 'https://i.imgur.com/jwbE0V1.png', '1', '65', '6', '1 มกราคม, 2002', '2002-01-01', '2020-01-04 21:04:48', '2020-01-04 21:05:03', '', null);
INSERT INTO `profiles` VALUES ('7', '7', 'krabi', 'test', 'https://i.imgur.com/jwbE0V1.png', '1', '65', '7', '1 มกราคม, 2002', '2002-01-01', '2020-01-04 21:04:48', '2020-01-04 21:05:03', '', null);
INSERT INTO `profiles` VALUES ('8', '8', 'krabi', 'test', 'https://i.imgur.com/jwbE0V1.png', '1', '65', '8', '1 มกราคม, 2002', '2002-01-01', '2020-01-04 21:04:48', '2020-01-04 21:05:03', '', null);
INSERT INTO `profiles` VALUES ('9', '9', 'krabi', 'test', 'https://i.imgur.com/jwbE0V1.png', '1', '65', '9', '1 มกราคม, 2002', '2002-01-01', '2020-01-04 21:04:48', '2020-01-04 21:05:03', '', null);
INSERT INTO `profiles` VALUES ('10', '10', 'krabi', 'test', 'https://i.imgur.com/jwbE0V1.png', '1', '65', '10', '1 มกราคม, 2002', '2002-01-01', '2020-01-04 21:04:48', '2020-01-04 21:05:03', '', null);
INSERT INTO `profiles` VALUES ('11', '11', 'krabi', 'test', 'https://i.imgur.com/jwbE0V1.png', '1', '65', '11', '1 มกราคม, 2002', '2002-01-01', '2020-01-04 21:04:48', '2020-01-04 21:05:03', '', null);
INSERT INTO `profiles` VALUES ('12', '12', 'krabi', 'test', 'https://i.imgur.com/jwbE0V1.png', '1', '65', '12', '1 มกราคม, 2002', '2002-01-01', '2020-01-04 21:04:48', '2020-01-04 21:05:03', '', null);
INSERT INTO `profiles` VALUES ('13', '13', 'krabi', 'test', 'https://i.imgur.com/jwbE0V1.png', '1', '65', '13', '1 มกราคม, 2002', '2002-01-01', '2020-01-04 21:04:48', '2020-01-04 21:05:03', '', null);
INSERT INTO `profiles` VALUES ('14', '14', 'krabi', 'test', 'https://i.imgur.com/jwbE0V1.png', '1', '65', '14', '1 มกราคม, 2002', '2002-01-01', '2020-01-04 21:04:48', '2020-01-04 21:05:03', '', null);
INSERT INTO `profiles` VALUES ('15', '15', 'krabi', 'test', 'https://i.imgur.com/jwbE0V1.png', '1', '65', '15', '1 มกราคม, 2002', '2002-01-01', '2020-01-04 21:04:48', '2020-01-04 21:05:03', '', null);
INSERT INTO `profiles` VALUES ('16', '16', 'krabi', 'test', 'https://i.imgur.com/jwbE0V1.png', '1', '65', '16', '1 มกราคม, 2002', '2002-01-01', '2020-01-04 21:04:48', '2020-01-04 21:05:03', '', null);
INSERT INTO `profiles` VALUES ('17', '17', 'krabi', 'test', 'https://i.imgur.com/jwbE0V1.png', '1', '65', '17', '1 มกราคม, 2002', '2002-01-01', '2020-01-04 21:04:48', '2020-01-04 21:05:03', '', null);
INSERT INTO `profiles` VALUES ('18', '18', 'krabi', 'test', 'https://i.imgur.com/jwbE0V1.png', '1', '65', '18', '1 มกราคม, 2002', '2002-01-01', '2020-01-04 21:04:48', '2020-01-04 21:05:03', '', null);
INSERT INTO `profiles` VALUES ('19', '19', 'krabi', 'test', 'https://i.imgur.com/jwbE0V1.png', '1', '65', '19', '1 มกราคม, 2002', '2002-01-01', '2020-01-04 21:04:48', '2020-01-04 21:05:03', '', null);
INSERT INTO `profiles` VALUES ('20', '20', 'krabi', 'test', 'https://i.imgur.com/jwbE0V1.png', '1', '65', '20', '1 มกราคม, 2002', '2002-01-01', '2020-01-04 21:04:48', '2020-01-04 21:05:03', '', null);

-- ----------------------------
-- Table structure for provinces
-- ----------------------------
DROP TABLE IF EXISTS `provinces`;
CREATE TABLE `provinces` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `code` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `title` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `region` int(11) DEFAULT NULL COMMENT '1=ตะวันออกเฉียงเหนือ, 2=เหนือ, 3=กลาง, 4=ใต้',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=78 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- ----------------------------
-- Records of provinces
-- ----------------------------
INSERT INTO `provinces` VALUES ('1', '10', 'กรุงเทพมหานคร', '3');
INSERT INTO `provinces` VALUES ('2', '11', 'สมุทรปราการ', '3');
INSERT INTO `provinces` VALUES ('3', '12', 'นนทบุรี', '3');
INSERT INTO `provinces` VALUES ('4', '13', 'ปทุมธานี', '3');
INSERT INTO `provinces` VALUES ('5', '14', 'พระนครศรีอยุธยา', '3');
INSERT INTO `provinces` VALUES ('6', '15', 'อ่างทอง', '3');
INSERT INTO `provinces` VALUES ('7', '16', 'ลพบุรี', '3');
INSERT INTO `provinces` VALUES ('8', '17', 'สิงห์บุรี', '3');
INSERT INTO `provinces` VALUES ('9', '18', 'ชัยนาท', '3');
INSERT INTO `provinces` VALUES ('10', '19', 'สระบุรี', '3');
INSERT INTO `provinces` VALUES ('11', '20', 'ชลบุรี', '3');
INSERT INTO `provinces` VALUES ('12', '21', 'ระยอง', '3');
INSERT INTO `provinces` VALUES ('13', '22', 'จันทบุรี', '3');
INSERT INTO `provinces` VALUES ('14', '23', 'ตราด', '3');
INSERT INTO `provinces` VALUES ('15', '24', 'ฉะเชิงเทรา', '3');
INSERT INTO `provinces` VALUES ('16', '25', 'ปราจีนบุรี', '3');
INSERT INTO `provinces` VALUES ('17', '26', 'นครนายก', '3');
INSERT INTO `provinces` VALUES ('18', '27', 'สระแก้ว', '3');
INSERT INTO `provinces` VALUES ('19', '30', 'นครราชสีมา', '1');
INSERT INTO `provinces` VALUES ('20', '31', 'บุรีรัมย์', '1');
INSERT INTO `provinces` VALUES ('21', '32', 'สุรินทร์', '1');
INSERT INTO `provinces` VALUES ('22', '33', 'ศรีสะเกษ', '1');
INSERT INTO `provinces` VALUES ('23', '34', 'อุบลราชธานี', '1');
INSERT INTO `provinces` VALUES ('24', '35', 'ยโสธร', '1');
INSERT INTO `provinces` VALUES ('25', '36', 'ชัยภูมิ', '1');
INSERT INTO `provinces` VALUES ('26', '37', 'อำนาจเจริญ', '1');
INSERT INTO `provinces` VALUES ('27', '38', 'บึงกาฬ', '1');
INSERT INTO `provinces` VALUES ('28', '39', 'หนองบัวลำภู', '1');
INSERT INTO `provinces` VALUES ('29', '40', 'ขอนแก่น', '1');
INSERT INTO `provinces` VALUES ('30', '41', 'อุดรธานี', '1');
INSERT INTO `provinces` VALUES ('31', '42', 'เลย', '1');
INSERT INTO `provinces` VALUES ('32', '43', 'หนองคาย', '1');
INSERT INTO `provinces` VALUES ('33', '44', 'มหาสารคาม', '1');
INSERT INTO `provinces` VALUES ('34', '45', 'ร้อยเอ็ด', '1');
INSERT INTO `provinces` VALUES ('35', '46', 'กาฬสินธุ์', '1');
INSERT INTO `provinces` VALUES ('36', '47', 'สกลนคร', '1');
INSERT INTO `provinces` VALUES ('37', '48', 'นครพนม', '1');
INSERT INTO `provinces` VALUES ('38', '49', 'มุกดาหาร', '1');
INSERT INTO `provinces` VALUES ('39', '50', 'เชียงใหม่', '2');
INSERT INTO `provinces` VALUES ('40', '51', 'ลำพูน', '2');
INSERT INTO `provinces` VALUES ('41', '52', 'ลำปาง', '2');
INSERT INTO `provinces` VALUES ('42', '53', 'อุตรดิตถ์', '2');
INSERT INTO `provinces` VALUES ('43', '54', 'แพร่', '2');
INSERT INTO `provinces` VALUES ('44', '55', 'น่าน', '2');
INSERT INTO `provinces` VALUES ('45', '56', 'พะเยา', '2');
INSERT INTO `provinces` VALUES ('46', '57', 'เชียงราย', '2');
INSERT INTO `provinces` VALUES ('47', '58', 'แม่ฮ่องสอน', '2');
INSERT INTO `provinces` VALUES ('48', '60', 'นครสวรรค์', '2');
INSERT INTO `provinces` VALUES ('49', '61', 'อุทัยธานี', '2');
INSERT INTO `provinces` VALUES ('50', '62', 'กำแพงเพชร', '2');
INSERT INTO `provinces` VALUES ('51', '63', 'ตาก', '2');
INSERT INTO `provinces` VALUES ('52', '64', 'สุโขทัย', '2');
INSERT INTO `provinces` VALUES ('53', '65', 'พิษณุโลก', '2');
INSERT INTO `provinces` VALUES ('54', '66', 'พิจิตร', '2');
INSERT INTO `provinces` VALUES ('55', '67', 'เพชรบูรณ์', '2');
INSERT INTO `provinces` VALUES ('56', '70', 'ราชบุรี', '3');
INSERT INTO `provinces` VALUES ('57', '71', 'กาญจนบุรี', '3');
INSERT INTO `provinces` VALUES ('58', '72', 'สุพรรณบุรี', '3');
INSERT INTO `provinces` VALUES ('59', '73', 'นครปฐม', '3');
INSERT INTO `provinces` VALUES ('60', '74', 'สมุทรสาคร', '3');
INSERT INTO `provinces` VALUES ('61', '75', 'สมุทรสงคราม', '3');
INSERT INTO `provinces` VALUES ('62', '76', 'เพชรบุรี', '3');
INSERT INTO `provinces` VALUES ('63', '77', 'ประจวบคีรีขันธ์', '3');
INSERT INTO `provinces` VALUES ('64', '80', 'นครศรีธรรมราช', '4');
INSERT INTO `provinces` VALUES ('65', '81', 'กระบี่', '4');
INSERT INTO `provinces` VALUES ('66', '82', 'พังงา', '4');
INSERT INTO `provinces` VALUES ('67', '83', 'ภูเก็ต', '4');
INSERT INTO `provinces` VALUES ('68', '84', 'สุราษฎร์ธานี', '4');
INSERT INTO `provinces` VALUES ('69', '85', 'ระนอง', '4');
INSERT INTO `provinces` VALUES ('70', '86', 'ชุมพร', '4');
INSERT INTO `provinces` VALUES ('71', '90', 'สงขลา', '4');
INSERT INTO `provinces` VALUES ('72', '91', 'สตูล', '4');
INSERT INTO `provinces` VALUES ('73', '92', 'ตรัง', '4');
INSERT INTO `provinces` VALUES ('74', '93', 'พัทลุง', '4');
INSERT INTO `provinces` VALUES ('75', '94', 'ปัตตานี', '4');
INSERT INTO `provinces` VALUES ('76', '95', 'ยะลา', '4');
INSERT INTO `provinces` VALUES ('77', '96', 'นราธิวาส', '4');

-- ----------------------------
-- Table structure for sexes
-- ----------------------------
DROP TABLE IF EXISTS `sexes`;
CREATE TABLE `sexes` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `sort` tinyint(4) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=22 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- ----------------------------
-- Records of sexes
-- ----------------------------
INSERT INTO `sexes` VALUES ('1', 'ชาย', null, null, '1');
INSERT INTO `sexes` VALUES ('2', 'หญิง', null, null, '2');
INSERT INTO `sexes` VALUES ('3', 'ทอม', null, null, '3');
INSERT INTO `sexes` VALUES ('4', 'ดี้', null, null, '4');
INSERT INTO `sexes` VALUES ('5', 'ทอมเกย์', null, null, '7');
INSERT INTO `sexes` VALUES ('6', 'ทอมเกย์คิง', null, null, '8');
INSERT INTO `sexes` VALUES ('7', 'ทอมเกย์ควีน', null, null, '9');
INSERT INTO `sexes` VALUES ('8', 'ทอมเกย์ทูเวย์', null, null, '10');
INSERT INTO `sexes` VALUES ('9', 'เกย์คิง', null, null, '11');
INSERT INTO `sexes` VALUES ('10', 'เกย์ควีน', null, null, '12');
INSERT INTO `sexes` VALUES ('11', 'โบ๊ท', null, null, '13');
INSERT INTO `sexes` VALUES ('12', 'ไบท์', null, null, '14');
INSERT INTO `sexes` VALUES ('13', 'เลสเบี้ยน', null, null, '15');
INSERT INTO `sexes` VALUES ('14', 'สาวประเภทสอง', null, null, '5');
INSERT INTO `sexes` VALUES ('15', 'อดัม', null, null, '16');
INSERT INTO `sexes` VALUES ('16', 'แองจี้', null, null, '17');
INSERT INTO `sexes` VALUES ('17', 'เชอร์รี่', null, null, '18');
INSERT INTO `sexes` VALUES ('18', 'สามย่าน', null, null, '19');
INSERT INTO `sexes` VALUES ('19', 'ผู้หญิงข้ามเพศ', null, null, '20');
INSERT INTO `sexes` VALUES ('20', 'ผู้ชายข้ามเพศ', null, null, '21');
INSERT INTO `sexes` VALUES ('21', 'เกย์', null, null, '6');

-- ----------------------------
-- Table structure for social_facebook_accounts
-- ----------------------------
DROP TABLE IF EXISTS `social_facebook_accounts`;
CREATE TABLE `social_facebook_accounts` (
  `user_id` int(11) NOT NULL,
  `provider_user_id` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `provider` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- ----------------------------
-- Records of social_facebook_accounts
-- ----------------------------
INSERT INTO `social_facebook_accounts` VALUES ('1', '2948943208471492', 'facebook', '2019-12-21 08:53:40', '2019-12-21 08:53:40');

-- ----------------------------
-- Table structure for social_infos
-- ----------------------------
DROP TABLE IF EXISTS `social_infos`;
CREATE TABLE `social_infos` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `provider` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `link` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `status` tinyint(4) DEFAULT NULL,
  `user_id` int(11) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=14 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- ----------------------------
-- Records of social_infos
-- ----------------------------
INSERT INTO `social_infos` VALUES ('1', '2020-01-02 22:28:44', '2020-01-02 22:28:44', 'facebook', null, '1', '1');
INSERT INTO `social_infos` VALUES ('2', '2020-01-02 22:28:45', '2020-01-02 22:28:45', 'twitter', null, '1', '1');
INSERT INTO `social_infos` VALUES ('3', '2020-01-02 22:28:45', '2020-01-02 22:28:45', 'line', null, '1', '1');
INSERT INTO `social_infos` VALUES ('4', '2020-01-02 22:28:45', '2020-01-02 22:28:45', 'instagram', null, '1', '1');
INSERT INTO `social_infos` VALUES ('5', '2020-01-02 22:28:45', '2020-01-02 22:28:45', 'youtube', null, '1', '1');
INSERT INTO `social_infos` VALUES ('6', '2020-01-02 22:28:45', '2020-01-02 22:28:45', 'tiktok', null, '1', '1');
INSERT INTO `social_infos` VALUES ('7', '2020-01-04 21:04:48', '2020-01-04 21:04:48', 'facebook', null, '0', '2');
INSERT INTO `social_infos` VALUES ('8', '2020-01-04 21:04:48', '2020-01-04 21:04:48', 'twitter', null, '0', '2');
INSERT INTO `social_infos` VALUES ('9', '2020-01-04 21:04:48', '2020-01-04 21:04:48', 'line', null, '0', '2');
INSERT INTO `social_infos` VALUES ('10', '2020-01-04 21:04:48', '2020-01-04 21:04:48', 'instagram', null, '0', '2');
INSERT INTO `social_infos` VALUES ('11', '2020-01-04 21:04:48', '2020-01-04 21:04:48', 'youtube', null, '0', '2');
INSERT INTO `social_infos` VALUES ('12', '2020-01-04 21:04:48', '2020-01-04 21:04:48', 'tiktok', null, '0', '2');
INSERT INTO `social_infos` VALUES ('13', '2020-01-30 23:45:45', '2020-01-30 23:45:45', 'tinder', null, '1', '1');

-- ----------------------------
-- Table structure for users
-- ----------------------------
DROP TABLE IF EXISTS `users`;
CREATE TABLE `users` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email_verified_at` timestamp NULL DEFAULT NULL,
  `password` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `remember_token` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `is_admin` tinyint(4) DEFAULT NULL,
  `banned_at` timestamp NULL DEFAULT NULL,
  `last_login_at` timestamp NULL DEFAULT NULL,
  `last_login_ip` varchar(50) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `users_email_unique` (`email`)
) ENGINE=InnoDB AUTO_INCREMENT=21 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- ----------------------------
-- Records of users
-- ----------------------------
INSERT INTO `users` VALUES ('1', 'เดียร์ ชริลแมว', 'unisexx@hotmail.com', null, '26c0a195973b46ba52a013c89dd82315', null, '2019-12-21 08:53:40', '2020-02-16 17:47:35', '1', null, '2020-02-16 17:47:35', '127.0.0.1');
INSERT INTO `users` VALUES ('2', 'พมจ จังหวัด กระบี่', 'krabi@gmail.com', '2019-12-28 12:08:09', '$2y$10$HHDE90LdMDM9bjijyYwCVevgpAnYNeUmNrPYcVsRVqm9iconE.aKi', 'VPBnLu97mlPAfgYyYWXi8cvdt4NlrPVTlTFi7TIgJvILk07BPOY80Yy1HaEO', '2019-09-05 06:17:27', '2020-01-04 21:03:58', null, null, null, null);
INSERT INTO `users` VALUES ('3', 'เจ้าหน้าที่ ส่วนกลาง', 'central@fd.com', '2019-12-28 12:08:24', '$2y$10$EfoXKE0yVjvL7dWkeZuCFOlJ//NzlksgD70rpuIsh/sx7fLp6Wj6q', 'o91o0lkgVF6MfIE84tvnaIQG7fGjfkz9vCfKXuhmWY6xTWJN78tpJPq7TG3u', '2019-09-05 06:23:00', '2020-01-02 08:41:46', null, null, null, null);
INSERT INTO `users` VALUES ('4', 'พมจ จังหวัด กาญจนบุรี', 'aaa@aaa.com', '2019-12-28 12:08:21', '$2y$10$MeOpK5L8pomd3IlzhgFhT.KUrPBaHbn7NEOjyAs1/CNEZzJ1lc5ie', 'VNAKNn0IeulPwxLOPkCl3s9rx17AHnVLfSzh3AEpoh1o0S4cLD8WMuxFj0Wm', '2019-09-11 00:42:44', '2020-01-02 08:42:02', null, null, null, null);
INSERT INTO `users` VALUES ('5', 'พมจ.จันทบุรี', 'jantraburi@gmail.com', '2019-12-28 12:08:26', '$2y$10$hJMIUQ1kz1ILrlQVwXDKHO6n8FmQMjM7bjTXqrLDs9EdpGlQfEh9G', '', '2019-09-16 10:05:57', '2020-01-02 08:42:39', null, null, null, null);
INSERT INTO `users` VALUES ('6', 'นางวัฒนา	มังคะดานะรา', 'wattanr@gmail.com', '2019-12-28 12:08:28', '$2y$10$KyJMTb8P12TJRvE5w0sVYesMIPF6u4QHZ6QXWyPjYZ/YAcz/cz7Ea', 'pfpLcIYu03hWufFnE0Z3MSkCa92oWhLiHXfq7xCWI67KFUEmOJq28rKsqYKM', '2019-09-17 13:30:27', '2020-01-02 08:42:40', null, null, null, null);
INSERT INTO `users` VALUES ('7', 'นางวิภารัตน์  วังสุทธิสมศรี', 'wi_nnub@hotmail.com', '2019-12-28 12:08:30', '$2y$10$jhE2FlirwgqV5AuJkvjpEOjbAqr/1LHMa/6xfke1uldVXrPTM35ty', '', '2019-09-17 14:13:32', '2020-01-02 08:42:42', null, null, null, null);
INSERT INTO `users` VALUES ('8', 'นางสาวดรุณี	พจนานุกูลกิจ', 'darunee.p@dcy.go.th', '2019-12-28 12:08:37', '$2y$10$COCQaReIZ/m4mZpMXvGVHeTnc353z2sfA07XJQ2NE362Xnr.7uzFS', '', '2019-09-17 14:44:32', '2020-01-02 08:43:02', null, null, null, null);
INSERT INTO `users` VALUES ('9', 'นางเรณู บุญวัฒน์พุฒิ', 'ranoo.b@dcy.go.th', '2019-12-28 12:08:41', '$2y$10$BlXKkGjihO8TqisQ.UmfzOy8EIbO.x9J/QN7Wy9gEAz9ipXbogkJa', '', '2019-09-17 14:45:28', '2020-01-02 08:43:04', null, null, null, null);
INSERT INTO `users` VALUES ('10', 'นางสาวปณิฏฐา แก้วมะโน', 'kaewmano_poo@hotmail.com', '2019-12-28 12:08:44', '$2y$10$kWRfzncymSHpkBmHJ.gQ7eveCS7deEJBM3c.flAXb6UF0GxOONdoy', '', '2019-09-17 14:47:21', '2020-01-02 08:43:06', null, null, null, null);
INSERT INTO `users` VALUES ('11', 'นายกอบชัย ตงลิ้ม', 'kobchai.t@dcy.go.th', '2019-12-28 12:08:45', '$2y$10$YuVBEZhWQ1N28.MWbdjd0ONdk9xRZOYaU1hiVWNCjxGNVk3L.WAqu', '', '2019-09-17 14:48:16', '2019-09-17 14:48:16', null, null, null, null);
INSERT INTO `users` VALUES ('12', 'นายภูริพัฒน์	ดำสง', 'joeybaby-97@hotmail.com', '2019-12-28 12:08:48', '$2y$10$pJVNH79t4Uztd0qT2ai93.pSCqUNITee.b398pLDRQXsmNmjmCmuS', '', '2019-09-17 14:49:26', '2019-09-17 14:49:26', null, null, null, null);
INSERT INTO `users` VALUES ('13', 'นายจิรัฐ ปรีชาวุฒิคุณ', 'Childrenfund@hotmail.com', '2019-12-28 12:08:49', '$2y$10$qUc/89K1gCKE4OCF/Xaw8Oo6i6Zaln2RQBFCKIh8SV06AXDA4H1EC', '', '2019-09-17 14:50:18', '2019-09-17 14:51:16', null, null, null, null);
INSERT INTO `users` VALUES ('14', 'นายภูชิต วิชชุอินทุตานนท์', 'socialwork_sw@hotmail.com', '2019-12-28 12:08:51', '$2y$10$3tVPtXjvGweHdCCj7ggk8eIMU2Ndk9zD0ZJtGxJmxvCO78LzlokBi', '', '2019-09-17 14:51:08', '2019-09-17 14:51:08', null, null, null, null);
INSERT INTO `users` VALUES ('15', 'นางสาวนุชวรา เพ็ชรกาล', 'nuchwara.pk@gmail.com', '2019-12-28 12:08:52', '$2y$10$zCPhNsefcU6ToEBb5hjuweV8m8KLU8uVh151q4mmjSB3POiGwxSxu', '', '2019-09-17 14:51:53', '2019-09-17 14:51:53', null, null, null, null);
INSERT INTO `users` VALUES ('16', 'นางสาวพัชรียา คางคำ', 'angel_demon1462@hotmail.com', '2019-12-28 12:08:54', '$2y$10$5aEf1DHDVHUMXGdhGk96tugv7yPV2t768VwtYe.kDMm4J/vCM5/u.', '', '2019-09-17 14:52:36', '2020-01-02 08:43:20', null, null, null, null);
INSERT INTO `users` VALUES ('17', 'นายสุเมธ แสงอาทิตย์', 'jub_bae@hotmail.com', '2019-12-28 12:08:56', '$2y$10$HL9FFuVi.iAqX4SD4YyRX.1Nhzw56Ahews1X/k6AchpFHTzQ0PnoG', '', '2019-09-17 14:53:15', '2020-01-02 08:43:17', null, null, null, null);
INSERT INTO `users` VALUES ('18', 'นายอภิสิทธิ์	วงศ์ศิริ', 'caneshiro08@gmail.com', '2019-12-28 12:08:58', '$2y$10$/0mQkCnz9/27nzR47LDp0OVELsY4wbtko/ZyEvnE8KegrKLlmqpDC', '', '2019-09-17 14:53:47', '2020-01-02 08:43:15', null, null, null, null);
INSERT INTO `users` VALUES ('19', 'นายอภิสิทธิ์	วงศ์ศิริ', 'caneshiro081@gmail.com', '2019-12-28 12:08:58', '$2y$10$/0mQkCnz9/27nzR47LDp0OVELsY4wbtko/ZyEvnE8KegrKLlmqpDC', '', '2019-09-17 14:53:47', '2020-01-02 08:43:15', null, null, '2020-01-20 19:22:41', '');
INSERT INTO `users` VALUES ('20', 'นายอภิสิทธิ์	วงศ์ศิริ', 'caneshiro082@gmail.com', '2019-12-28 12:08:58', '$2y$10$/0mQkCnz9/27nzR47LDp0OVELsY4wbtko/ZyEvnE8KegrKLlmqpDC', '', '2019-09-17 14:53:47', '2020-01-02 08:43:15', null, null, '2020-01-20 19:23:11', '');
