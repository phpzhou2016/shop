/*
Navicat MySQL Data Transfer

Source Server         : localhost_3306
Source Server Version : 50553
Source Host           : localhost:3306
Source Database       : shop

Target Server Type    : MYSQL
Target Server Version : 50553
File Encoding         : 65001

Date: 2016-11-16 17:24:14
*/

SET FOREIGN_KEY_CHECKS=0;

-- ----------------------------
-- Table structure for admin
-- ----------------------------
DROP TABLE IF EXISTS `admin`;
CREATE TABLE `admin` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT COMMENT '管理员ID',
  `name` varchar(255) COLLATE utf8_unicode_ci NOT NULL COMMENT '管理员名称',
  `password` varchar(255) COLLATE utf8_unicode_ci NOT NULL COMMENT '密码',
  `sex` varchar(1) COLLATE utf8_unicode_ci NOT NULL COMMENT '性别',
  `phone` varchar(11) COLLATE utf8_unicode_ci NOT NULL COMMENT '手机号码',
  `email` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL COMMENT '邮箱',
  `remarks` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL COMMENT '备注',
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=2 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- ----------------------------
-- Records of admin
-- ----------------------------
INSERT INTO `admin` VALUES ('1', 'admin', 'admin', '1', '15678197992', '547857825@qq.com', null);

-- ----------------------------
-- Table structure for goods
-- ----------------------------
DROP TABLE IF EXISTS `goods`;
CREATE TABLE `goods` (
  `goodsId` int(11) NOT NULL AUTO_INCREMENT COMMENT '商品ID',
  `goodsName` varchar(255) COLLATE utf8_unicode_ci NOT NULL COMMENT '商品名称',
  `goodsSize` varchar(255) COLLATE utf8_unicode_ci NOT NULL COMMENT '尺码',
  `goodsColor` varchar(255) COLLATE utf8_unicode_ci NOT NULL COMMENT '颜色',
  `goodsPrice` varchar(255) COLLATE utf8_unicode_ci NOT NULL COMMENT '价格',
  `goodsCloth` varchar(255) COLLATE utf8_unicode_ci NOT NULL COMMENT '布料',
  `goodsInfo` varchar(255) COLLATE utf8_unicode_ci DEFAULT '' COMMENT '商品介绍',
  `goodsPicture` varchar(255) COLLATE utf8_unicode_ci DEFAULT '' COMMENT '商品图片（json，多个路径）',
  `goodsSales` varchar(255) COLLATE utf8_unicode_ci DEFAULT '' COMMENT '销量',
  `goodsAbstract` varchar(255) COLLATE utf8_unicode_ci DEFAULT '' COMMENT '摘要',
  `goodsAddTime` date NOT NULL COMMENT '添加时间',
  `stateId` int(11) DEFAULT NULL COMMENT '状态ID',
  `goodsTypeId` int(11) NOT NULL COMMENT '商品类型ID',
  PRIMARY KEY (`goodsId`),
  KEY `typeID` (`goodsTypeId`),
  KEY `state` (`stateId`)
) ENGINE=MyISAM AUTO_INCREMENT=11 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci COMMENT='商品表';

-- ----------------------------
-- Records of goods
-- ----------------------------
INSERT INTO `goods` VALUES ('1', '外星人笔记本', '10mm*50mm*70mm', '黑色', '10000', '无', '<p style=\"text-align: center;\"><strong>梵蒂冈梵蒂冈的</strong></p><p></p>', '', '0', '看会计， ', '2016-11-16', null, '27');
INSERT INTO `goods` VALUES ('2', '阿迪达斯 中性 男鞋', '42', '红', '356', '纯棉', '', '', '0', '', '2016-11-16', null, '5');
INSERT INTO `goods` VALUES ('3', 'sad撒旦撒旦是', '', '', '', '', '', '', '', '', '0000-00-00', null, '1');
INSERT INTO `goods` VALUES ('4', '非官方多个', '', '', '', '', '', '', '', '', '0000-00-00', null, '1');
INSERT INTO `goods` VALUES ('5', '非官方的话', '', '', '', '', '', '', '', '', '0000-00-00', null, '1');
INSERT INTO `goods` VALUES ('9', '外星人笔记本撒旦撒旦撒', '10mm*50mm*70mm', '黑色', '10000', '无', '<p style=\"text-align: center;\"><strong>梵蒂冈梵蒂冈的</strong></p><p><br/></p>', '', '0', '看会计， ', '2016-11-03', null, '27');
INSERT INTO `goods` VALUES ('10', '外星人10-01', '10mm*50mm*70mm', '黑色', '10000', '无', '<p style=\"text-align: center;\"><strong>梵蒂冈梵蒂冈的</strong></p><p><br/></p>', '', '0', '看会计， ', '2016-11-03', null, '27');

-- ----------------------------
-- Table structure for goods_type
-- ----------------------------
DROP TABLE IF EXISTS `goods_type`;
CREATE TABLE `goods_type` (
  `typeId` int(11) NOT NULL AUTO_INCREMENT COMMENT '商品类型ID',
  `typeName` varchar(255) COLLATE utf8_unicode_ci NOT NULL COMMENT '商品类型名称',
  `typeInfo` varchar(255) COLLATE utf8_unicode_ci DEFAULT '' COMMENT '商品类型说明',
  `level` int(11) DEFAULT NULL COMMENT '等级（区分级别）',
  `path` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `parentId` int(11) NOT NULL COMMENT '上级类型ID（取自typeId）',
  PRIMARY KEY (`typeId`)
) ENGINE=MyISAM AUTO_INCREMENT=28 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci COMMENT='商品分类表';

-- ----------------------------
-- Records of goods_type
-- ----------------------------
INSERT INTO `goods_type` VALUES ('1', '电脑', '电脑...', '1', '0,1', '0');
INSERT INTO `goods_type` VALUES ('2', '鞋子', '鞋子...', '1', '0,2', '0');
INSERT INTO `goods_type` VALUES ('3', '衣服', '衣服...', '1', '0,3', '0');
INSERT INTO `goods_type` VALUES ('4', '台式电脑', '台式电脑', '2', '0,1,4', '1');
INSERT INTO `goods_type` VALUES ('5', '男士跑鞋', '跑鞋', '2', '0,2,5', '2');
INSERT INTO `goods_type` VALUES ('27', '笔记本电脑', '', '2', '0,1,27', '1');

-- ----------------------------
-- Table structure for logistics
-- ----------------------------
DROP TABLE IF EXISTS `logistics`;
CREATE TABLE `logistics` (
  `logisticsId` int(11) NOT NULL AUTO_INCREMENT COMMENT 'ID',
  `logisticsName` varchar(255) COLLATE utf8_unicode_ci NOT NULL COMMENT '物流公司名称',
  `logisticsAbbreviation` varchar(255) COLLATE utf8_unicode_ci NOT NULL COMMENT '物流公司代号',
  `logisticsInfo` varchar(255) COLLATE utf8_unicode_ci DEFAULT '' COMMENT '物流公司介绍',
  PRIMARY KEY (`logisticsId`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci COMMENT='物流公司信息表';

-- ----------------------------
-- Records of logistics
-- ----------------------------

-- ----------------------------
-- Table structure for member
-- ----------------------------
DROP TABLE IF EXISTS `member`;
CREATE TABLE `member` (
  `memberId` int(11) NOT NULL AUTO_INCREMENT COMMENT '会员ID',
  `memberName` varchar(255) CHARACTER SET utf8 NOT NULL COMMENT '会员登录名称',
  `nickName` varchar(255) COLLATE utf8_unicode_ci NOT NULL COMMENT '会员昵称',
  `password` varchar(255) COLLATE utf8_unicode_ci NOT NULL COMMENT '密码',
  `headPicture` varchar(255) COLLATE utf8_unicode_ci NOT NULL COMMENT '头像（默认系统头像，存头像路径）',
  `sex` int(1) NOT NULL COMMENT '性别（0：男，1：女，默认0）',
  `phoneNumber` varchar(11) COLLATE utf8_unicode_ci DEFAULT '' COMMENT '手机号码',
  `email` varchar(255) COLLATE utf8_unicode_ci DEFAULT '' COMMENT '邮箱',
  `receiptAddress` varchar(255) COLLATE utf8_unicode_ci DEFAULT '' COMMENT '收货地址（json方式存，可以多个）',
  `introduction` varchar(255) COLLATE utf8_unicode_ci DEFAULT '' COMMENT '个人简介',
  PRIMARY KEY (`memberId`)
) ENGINE=MyISAM AUTO_INCREMENT=6 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci COMMENT='网站会员表';

-- ----------------------------
-- Records of member
-- ----------------------------
INSERT INTO `member` VALUES ('1', 'admin', '管理员', 'admin', 'images/1.png', '1', '13649482100', '547857825@qq.com', '', '我是管理员。');
INSERT INTO `member` VALUES ('3', 'test', '测试', 'test', 'images/2.png', '2', '13748484832', '123@out.com', '', '我是测试用户。');

-- ----------------------------
-- Table structure for orders
-- ----------------------------
DROP TABLE IF EXISTS `orders`;
CREATE TABLE `orders` (
  `orderNumber` varchar(255) COLLATE utf8_unicode_ci NOT NULL COMMENT '订单编号（日期+时间+毫秒）',
  `shuliang` varchar(255) COLLATE utf8_unicode_ci NOT NULL COMMENT '购买的数量',
  `price` varchar(255) COLLATE utf8_unicode_ci NOT NULL COMMENT '购买时的价格',
  `stateId` int(11) NOT NULL COMMENT '订单状态ID',
  `memberId` int(11) NOT NULL COMMENT '会员ID',
  `paymentId` int(11) NOT NULL COMMENT '付款方式ID',
  `logisticsId` int(11) NOT NULL COMMENT '物流ID',
  PRIMARY KEY (`orderNumber`),
  KEY `MEMBER` (`memberId`),
  KEY `PAY` (`paymentId`),
  KEY `LOG` (`logisticsId`),
  KEY `STATE` (`stateId`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci COMMENT='订单表';

-- ----------------------------
-- Records of orders
-- ----------------------------

-- ----------------------------
-- Table structure for payment
-- ----------------------------
DROP TABLE IF EXISTS `payment`;
CREATE TABLE `payment` (
  `payId` int(11) NOT NULL AUTO_INCREMENT COMMENT 'ID',
  `payName` varchar(255) COLLATE utf8_unicode_ci NOT NULL COMMENT '付款方式名称',
  `payPicture` varchar(255) COLLATE utf8_unicode_ci NOT NULL COMMENT 'LOGO',
  `payKey` varchar(255) COLLATE utf8_unicode_ci NOT NULL COMMENT 'KEY',
  `payInfo` varchar(255) COLLATE utf8_unicode_ci DEFAULT '' COMMENT '说明',
  PRIMARY KEY (`payId`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci COMMENT='支付方式信息表';

-- ----------------------------
-- Records of payment
-- ----------------------------

-- ----------------------------
-- Table structure for records
-- ----------------------------
DROP TABLE IF EXISTS `records`;
CREATE TABLE `records` (
  `recordId` int(11) NOT NULL AUTO_INCREMENT COMMENT '交易记录ID',
  `orderNumber` varchar(255) COLLATE utf8_unicode_ci NOT NULL COMMENT '订单编号',
  PRIMARY KEY (`recordId`),
  KEY `orders` (`orderNumber`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci COMMENT='网站交易记录表';

-- ----------------------------
-- Records of records
-- ----------------------------

-- ----------------------------
-- Table structure for shoppingcar
-- ----------------------------
DROP TABLE IF EXISTS `shoppingcar`;
CREATE TABLE `shoppingcar` (
  `carId` int(11) NOT NULL AUTO_INCREMENT COMMENT '购物车ID',
  `orderNumber` varchar(255) COLLATE utf8_unicode_ci NOT NULL COMMENT '订单编号',
  PRIMARY KEY (`carId`),
  KEY `orders` (`orderNumber`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci COMMENT='购物车表';

-- ----------------------------
-- Records of shoppingcar
-- ----------------------------

-- ----------------------------
-- Table structure for state
-- ----------------------------
DROP TABLE IF EXISTS `state`;
CREATE TABLE `state` (
  `stateId` int(11) NOT NULL AUTO_INCREMENT COMMENT '状态ID',
  `stateName` varchar(255) COLLATE utf8_unicode_ci NOT NULL COMMENT '状态名称',
  PRIMARY KEY (`stateId`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci COMMENT='状态表（订单，商品的各种状态）';

-- ----------------------------
-- Records of state
-- ----------------------------
