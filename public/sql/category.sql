/*
Navicat MySQL Data Transfer

Source Server         : local
Source Server Version : 50553
Source Host           : localhost:3306
Source Database       : blog

Target Server Type    : MYSQL
Target Server Version : 50553
File Encoding         : 65001

Date: 2019-09-10 18:03:04
*/

SET FOREIGN_KEY_CHECKS=0;

-- ----------------------------
-- Table structure for category
-- ----------------------------
DROP TABLE IF EXISTS `category`;
CREATE TABLE `category` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(50) DEFAULT NULL,
  `code` varchar(50) DEFAULT NULL,
  `created` int(11) DEFAULT NULL,
  `update` int(11) DEFAULT NULL,
  `deleted` int(1) DEFAULT '1',
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=20 DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of category
-- ----------------------------
INSERT INTO `category` VALUES ('1', 'PHP', 'php', null, null, '1');
INSERT INTO `category` VALUES ('2', 'Javascript', 'js', null, null, '1');
INSERT INTO `category` VALUES ('3', 'MySql', 'mysql', null, null, '1');
INSERT INTO `category` VALUES ('4', 'Linux', 'linux', null, null, '1');
INSERT INTO `category` VALUES ('5', 'Python', 'phthon', null, null, '1');
INSERT INTO `category` VALUES ('6', 'Go', 'go', null, null, '1');
INSERT INTO `category` VALUES ('7', 'Vue', 'vue', null, null, '1');
INSERT INTO `category` VALUES ('8', 'test', 'test', '1568103093', null, '1');
INSERT INTO `category` VALUES ('16', 'test', 'tse', '1568105211', null, '0');
INSERT INTO `category` VALUES ('15', 'test', 'test', '1568105103', null, '0');
INSERT INTO `category` VALUES ('14', 'test', 'test', '1568104956', null, '1');
INSERT INTO `category` VALUES ('17', 'test', 'test', '1568105357', null, '0');
INSERT INTO `category` VALUES ('18', 'test', 'tse', '1568105372', null, '0');
INSERT INTO `category` VALUES ('19', 'aaaa', 'aaa', '1568105452', null, '0');
