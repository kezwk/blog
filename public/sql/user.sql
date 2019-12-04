/*
 Navicat MySQL Data Transfer

 Source Server         : localhost
 Source Server Type    : MySQL
 Source Server Version : 50728
 Source Host           : localhost:3306
 Source Schema         : kaleoz

 Target Server Type    : MySQL
 Target Server Version : 50728
 File Encoding         : 65001

 Date: 02/12/2019 23:13:07
*/

SET NAMES utf8mb4;
SET FOREIGN_KEY_CHECKS = 0;

-- ----------------------------
-- Table structure for user
-- ----------------------------
DROP TABLE IF EXISTS `user`;
CREATE TABLE `user` (
  `id` int(11) unsigned NOT NULL,
  `sess_id` varchar(50) DEFAULT NULL,
  `group_id` smallint(5) unsigned NOT NULL DEFAULT '0',
  `avatar_id` int(11) unsigned NOT NULL DEFAULT '0',
  `username` char(16) DEFAULT NULL,
  `name` varchar(45) NOT NULL DEFAULT '',
  `email` varchar(45) NOT NULL DEFAULT '',
  `mobile` varchar(20) DEFAULT NULL,
  `mobile_verified` tinyint(4) DEFAULT '0',
  `password` varchar(100) NOT NULL DEFAULT '',
  `password_sha512` varchar(128) NOT NULL DEFAULT '',
  `country` char(2) NOT NULL DEFAULT '' COMMENT '国家或地区',
  `timezone` tinyint(4) NOT NULL DEFAULT '8' COMMENT '时区',
  `language` char(2) NOT NULL DEFAULT 'en' COMMENT '语言',
  `currency` char(3) DEFAULT '' COMMENT '客户账户币种',
  `balance` decimal(11,2) NOT NULL DEFAULT '0.00' COMMENT '客户账户余额',
  `frozen_balance` decimal(11,2) NOT NULL DEFAULT '0.00' COMMENT '客户冻结资金',
  `withdraw_limits` decimal(11,2) NOT NULL DEFAULT '0.00' COMMENT '客户可提现额度',
  `joined` int(11) unsigned NOT NULL DEFAULT '0' COMMENT '注册时间',
  `last_visit` int(11) unsigned NOT NULL DEFAULT '0' COMMENT '最后访问',
  `status` tinyint(4) unsigned NOT NULL DEFAULT '1',
  `bank_id` mediumint(6) unsigned DEFAULT NULL,
  `bank_account_id` varchar(50) DEFAULT NULL,
  `bank_account_verified` tinyint(2) DEFAULT '0',
  `bank_account_number` varchar(50) DEFAULT NULL,
  `bank_holder_name` varchar(50) DEFAULT NULL,
  `bank_account_type` varchar(50) DEFAULT NULL,
  `seller_credit` smallint(6) unsigned NOT NULL DEFAULT '0' COMMENT '卖家信誉',
  `buyer_credit` smallint(6) unsigned NOT NULL DEFAULT '0' COMMENT '买家信誉',
  `trade_count` smallint(6) unsigned NOT NULL DEFAULT '0' COMMENT '交易成功的数量',
  `trade_total_count` smallint(6) unsigned NOT NULL DEFAULT '0' COMMENT '所有交易过的数量（成功/退款）',
  `ip_address` int(11) unsigned NOT NULL COMMENT '注册的ip地址',
  `email_notification` tinyint(4) NOT NULL DEFAULT '0',
  `birthday` date DEFAULT NULL,
  `gender` enum('male','female') DEFAULT NULL,
  `adv_email` tinyint(4) DEFAULT '0',
  `address` varchar(200) DEFAULT NULL,
  `seller_verify` tinyint(4) unsigned DEFAULT '0' COMMENT '卖家是否验证',
  `last_heart` int(11) unsigned DEFAULT NULL,
  `notify_browser` tinyint(4) NOT NULL DEFAULT '1',
  `notify_sound` tinyint(4) NOT NULL DEFAULT '1',
  `notify_offline` tinyint(4) NOT NULL DEFAULT '1',
  `notify_with_email` tinyint(4) NOT NULL DEFAULT '1',
  `introduction` varchar(200) DEFAULT NULL,
  `quick_reply` text,
  `country_mobile_code` varchar(10) NOT NULL DEFAULT '',
  `authy_id` int(11) unsigned DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `email` (`email`) USING BTREE
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

SET FOREIGN_KEY_CHECKS = 1;
