/*
Navicat MySQL Data Transfer

Source Server         : localhost_3306
Source Server Version : 50617
Source Host           : localhost:3306
Source Database       : chihuo

Target Server Type    : MYSQL
Target Server Version : 50617
File Encoding         : 65001

Date: 2018-05-05 17:20:35
*/

SET FOREIGN_KEY_CHECKS=0;

-- ----------------------------
-- Table structure for `chihuo_category`
-- ----------------------------
DROP TABLE IF EXISTS `chihuo_category`;
CREATE TABLE `chihuo_category` (
  `id` int(11) NOT NULL AUTO_INCREMENT COMMENT '主键id',
  `name` varchar(50) NOT NULL COMMENT '商品类名',
  `parent_id` int(10) NOT NULL COMMENT '父类id',
  `path` varchar(255) NOT NULL COMMENT '路径',
  `level` int(255) NOT NULL COMMENT '等级',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=15 DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of chihuo_category
-- ----------------------------
INSERT INTO `chihuo_category` VALUES ('1', '坚果炒货', '0', '0,1', '1');
INSERT INTO `chihuo_category` VALUES ('2', '瓜子', '1', '0,1,2', '2');
INSERT INTO `chihuo_category` VALUES ('3', '花生', '1', '0,1,3', '2');
INSERT INTO `chihuo_category` VALUES ('4', '零食', '1', '0,1', '1');
INSERT INTO `chihuo_category` VALUES ('5', '杂货', '1', '0,1', '1');
INSERT INTO `chihuo_category` VALUES ('6', '中国', '1', '0,1', '1');
INSERT INTO `chihuo_category` VALUES ('7', '牛奶', '0', '0', '1');
INSERT INTO `chihuo_category` VALUES ('8', '牛', '0', '0', '1');
INSERT INTO `chihuo_category` VALUES ('9', '牛', '0', '0', '1');
INSERT INTO `chihuo_category` VALUES ('10', '啊', '1', '0,1', '1');
INSERT INTO `chihuo_category` VALUES ('11', '去', '0', '0', '1');
INSERT INTO `chihuo_category` VALUES ('12', '我', '0', '0,12', '1');
INSERT INTO `chihuo_category` VALUES ('13', '额', '1', '0,1,13', '1');
INSERT INTO `chihuo_category` VALUES ('14', '人', '1', '0,1,14', '2');


DROP TABLE IF EXISTS `chihuo_goods`;
CREATE TABLE `chihuo_goods` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT COMMENT '商品自增id',
  `goodsname` varchar(255) DEFAULT NULL COMMENT '商品的名字',
  `tid` int(11) DEFAULT NULL COMMENT '分类id',
  `tpid` int(255) DEFAULT NULL COMMENT '分类路径',
  `unit` char(255) DEFAULT NULL COMMENT '商品的单位',
  `attributes` enum('7','6','5','4','3','2','1') DEFAULT NULL COMMENT '商品的属性,1、推荐 2、新上 3、热卖 4、促销 5、包邮 6、限时卖 7、不参与会员折扣',
  `imagepath` varchar(255) DEFAULT NULL COMMENT '商品图片id',
  `number` int(11) DEFAULT NULL COMMENT '商品编号',
  `curprice` int(11) DEFAULT NULL COMMENT '现价',
  `oriprice` int(11) DEFAULT NULL COMMENT '市场价',
  `inventory` int(255) DEFAULT NULL COMMENT '库存量',
  `restrict` int(255) DEFAULT NULL COMMENT '限制购买量',
  `already` int(255) DEFAULT NULL COMMENT '已经购买量',
  `freight` int(255) DEFAULT NULL COMMENT '运费',
  `status` enum('1','0') DEFAULT NULL COMMENT '是否上架,0为上架,1为下架,默认0上架',
  `reorder` int(255) DEFAULT NULL,
  `text` text,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=utf8;