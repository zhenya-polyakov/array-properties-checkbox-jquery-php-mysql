/*
Navicat MySQL Data Transfer

Source Server         : open-server
Source Server Version : 50541
Source Host           : localhost:3306
Source Database       : polyakov_site_array

Target Server Type    : MYSQL
Target Server Version : 50541
File Encoding         : 65001

Date: 2015-10-07 23:34:11
*/

SET FOREIGN_KEY_CHECKS=0;
-- ----------------------------
-- Table structure for `description`
-- ----------------------------
DROP TABLE IF EXISTS `description`;
CREATE TABLE `description` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(255) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=7 DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of description
-- ----------------------------
INSERT INTO `description` VALUES ('1', 'Ширина');
INSERT INTO `description` VALUES ('2', 'Длина');
INSERT INTO `description` VALUES ('3', 'Высота');
INSERT INTO `description` VALUES ('4', 'Качество');
INSERT INTO `description` VALUES ('5', 'Описание');
INSERT INTO `description` VALUES ('6', 'Отзывы');

-- ----------------------------
-- Table structure for `product_description`
-- ----------------------------
DROP TABLE IF EXISTS `product_description`;
CREATE TABLE `product_description` (
  `product_id` int(11) NOT NULL,
  `description_id` int(11) NOT NULL,
  `price` double(10,2) DEFAULT NULL,
  `description` varchar(500) DEFAULT NULL,
  PRIMARY KEY (`product_id`,`description_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of product_description
-- ----------------------------
