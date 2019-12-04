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

 Date: 04/12/2019 14:17:03
*/

SET NAMES utf8mb4;
SET FOREIGN_KEY_CHECKS = 0;

-- ----------------------------
-- Table structure for browsers
-- ----------------------------
DROP TABLE IF EXISTS `browsers`;
CREATE TABLE `browsers` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT COMMENT '主键ID 此表用于保存用户设备信息',
  `user_id` int(10) unsigned NOT NULL COMMENT '用户ID 未登录为guest user id',
  `user_agent` varchar(255) NOT NULL DEFAULT '' COMMENT '访问时 请求头中带的UA',
  `ip_country` varchar(10) NOT NULL DEFAULT '' COMMENT '来自的国家 通过ip查找到的国家',
  `accept_lang` varchar(100) NOT NULL DEFAULT '' COMMENT '请求头中 accept_language',
  `resolution` varchar(20) NOT NULL DEFAULT '' COMMENT '设备分辨率 比如 1080x1920',
  `first_visited_time` int(10) unsigned NOT NULL COMMENT '首次访问时间戳',
  `latest_visited_time` int(10) unsigned NOT NULL COMMENT '上次访问时间戳',
  `latest_remember_time` int(10) unsigned NOT NULL COMMENT '上次记住密码时间戳',
  `device_id` varchar(40) DEFAULT 'ffffffff-ffff-ffff-ffff-ffffffffffff' COMMENT '设备的uuid 可认为是唯一id',
  `imei` varchar(15) DEFAULT '000000000000000' COMMENT '设备的串号 ios获取不到，android7+后获取需用户授权 故此字段基本没用了',
  `mac` varchar(20) DEFAULT '01:01:01:01:01:01' COMMENT '设备mac地址',
  `device_type` varchar(20) DEFAULT NULL COMMENT '设备类型【android、ios、iphone ios】',
  `channel_id` varchar(20) DEFAULT 'kaleoz' COMMENT '渠道id  多渠道推广分发时可以使用',
  `version_code` int(10) DEFAULT '0' COMMENT '用户安装app的版本号',
  `version_name` varchar(10) DEFAULT '1.0.0' COMMENT '用户安装app的版本名称',
  `user_token` varchar(255) DEFAULT 'none' COMMENT '用户的usertoken  首次访问会生成一个 登录成功后会更新',
  `created` int(10) DEFAULT NULL COMMENT '创建时间戳',
  `device_name` varchar(40) DEFAULT NULL COMMENT '设备的名称',
  PRIMARY KEY (`id`),
  KEY `user_id` (`user_id`,`user_agent`,`ip_country`,`accept_lang`,`resolution`) USING BTREE,
  KEY `device_id` (`device_id`,`user_id`,`imei`,`mac`,`version_code`,`user_token`) USING BTREE
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

SET FOREIGN_KEY_CHECKS = 1;
