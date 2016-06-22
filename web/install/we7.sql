/*
Navicat MySQL Data Transfer

Source Server         : windows_mysql1
Source Server Version : 50547
Source Host           : 127.0.0.1:3306
Source Database       : we08e52

Target Server Type    : MYSQL
Target Server Version : 50547
File Encoding         : 65001

Date: 2016-06-22 15:32:43
*/

SET FOREIGN_KEY_CHECKS=0;

-- ----------------------------
-- Table structure for we_auto_response
-- ----------------------------
DROP TABLE IF EXISTS `we_auto_response`;
CREATE TABLE `we_auto_response` (
  `ar_id` int(11) NOT NULL AUTO_INCREMENT,
  `pa_id` int(11) DEFAULT NULL,
  `ar_rule_name` varchar(50) DEFAULT NULL,
  `ar_type` varchar(50) DEFAULT NULL,
  `ar_wd` varchar(50) DEFAULT NULL,
  `ar_content` varchar(255) DEFAULT NULL,
  PRIMARY KEY (`ar_id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of we_auto_response
-- ----------------------------

-- ----------------------------
-- Table structure for we_custom_menu
-- ----------------------------
DROP TABLE IF EXISTS `we_custom_menu`;
CREATE TABLE `we_custom_menu` (
  `cm_id` int(11) NOT NULL AUTO_INCREMENT,
  `pa_id` int(11) DEFAULT NULL,
  `cm_name` varchar(50) DEFAULT NULL,
  `cm_parent_id` int(11) DEFAULT NULL,
  PRIMARY KEY (`cm_id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of we_custom_menu
-- ----------------------------

-- ----------------------------
-- Table structure for we_public_account
-- ----------------------------
DROP TABLE IF EXISTS `we_public_account`;
CREATE TABLE `we_public_account` (
  `pa_id` int(11) NOT NULL AUTO_INCREMENT,
  `u_id` int(11) DEFAULT NULL,
  `pa_name` varchar(50) DEFAULT NULL,
  `pa_type` varchar(50) DEFAULT NULL,
  `pa_appid` varchar(50) DEFAULT NULL,
  `pa_appsecret` varchar(50) DEFAULT NULL,
  `pa_weixin` varchar(50) DEFAULT NULL,
  `pa_wx_account` varchar(50) DEFAULT NULL,
  PRIMARY KEY (`pa_id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of we_public_account
-- ----------------------------

-- ----------------------------
-- Table structure for we_public_account_token
-- ----------------------------
DROP TABLE IF EXISTS `we_public_account_token`;
CREATE TABLE `we_public_account_token` (
  `pat_id` int(11) NOT NULL AUTO_INCREMENT,
  `pa_id` int(11) DEFAULT NULL,
  `pat_token` varchar(50) DEFAULT NULL,
  `pat_filemtime` datetime DEFAULT NULL,
  `pat_hash` varchar(10) DEFAULT NULL,
  `pat_api_link` varchar(255) DEFAULT NULL,
  PRIMARY KEY (`pat_id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of we_public_account_token
-- ----------------------------

-- ----------------------------
-- Table structure for we_user
-- ----------------------------
DROP TABLE IF EXISTS `we_user`;
CREATE TABLE `we_user` (
  `u_id` int(11) NOT NULL AUTO_INCREMENT,
  `u_name` varchar(50) DEFAULT NULL,
  `u_pwd` char(32) DEFAULT NULL,
  PRIMARY KEY (`u_id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of we_user
-- ----------------------------

-- ----------------------------
-- Table structure for we_user_privilege
-- ----------------------------
DROP TABLE IF EXISTS `we_user_privilege`;
CREATE TABLE `we_user_privilege` (
  `up_id` int(11) NOT NULL AUTO_INCREMENT,
  `pa_id` int(11) DEFAULT NULL,
  `up_privilege_name` varchar(50) DEFAULT NULL,
  `up_parent_id` int(11) DEFAULT NULL,
  PRIMARY KEY (`up_id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of we_user_privilege
-- ----------------------------
