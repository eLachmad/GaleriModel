/*
Navicat MySQL Data Transfer

Source Server         : localhost
Source Server Version : 50516
Source Host           : 127.0.0.1:3306
Source Database       : agency

Target Server Type    : MYSQL
Target Server Version : 50516
File Encoding         : 65001

Date: 2015-07-04 22:22:11
*/

SET FOREIGN_KEY_CHECKS=0;

-- ----------------------------
-- Table structure for booking
-- ----------------------------
DROP TABLE IF EXISTS `booking`;
CREATE TABLE `booking` (
  `ID_USER` int(11) NOT NULL,
  `ID_MODEL` int(11) NOT NULL,
  `TIMESTAMP` timestamp NULL DEFAULT NULL,
  `TANGGAL_BOOKING` datetime DEFAULT NULL,
  `TANGGAL_VERIFIKASI` datetime DEFAULT NULL,
  PRIMARY KEY (`ID_USER`,`ID_MODEL`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- ----------------------------
-- Records of booking
-- ----------------------------

-- ----------------------------
-- Table structure for model
-- ----------------------------
DROP TABLE IF EXISTS `model`;
CREATE TABLE `model` (
  `ID_MODEL` int(11) NOT NULL AUTO_INCREMENT,
  `ID_USER` int(11) DEFAULT NULL,
  `NAMA` varchar(100) DEFAULT NULL,
  `PHOTO` varchar(200) DEFAULT NULL,
  `STATUS` int(11) DEFAULT NULL,
  PRIMARY KEY (`ID_MODEL`),
  KEY `model_ID_USER` (`ID_USER`),
  CONSTRAINT `model_ID_USER` FOREIGN KEY (`ID_USER`) REFERENCES `user` (`ID_USER`) ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE=InnoDB AUTO_INCREMENT=10 DEFAULT CHARSET=latin1;

-- ----------------------------
-- Records of model
-- ----------------------------
INSERT INTO `model` VALUES ('2', '2', 'test', '2/2.jpg', '1');
INSERT INTO `model` VALUES ('3', '2', 'Model 2', '2/Desert.jpg', '1');
INSERT INTO `model` VALUES ('4', '2', 'coba lagi, yang kedua jkajsdkasjd', '2/3.jpg', '1');
INSERT INTO `model` VALUES ('7', '2', 'Model 1', '2/Chrysanthemum.jpg', '1');
INSERT INTO `model` VALUES ('8', '2', 'nama model', '2/Desert.jpg', '1');
INSERT INTO `model` VALUES ('9', '2', 'model  baru', '2/Hydrangeas.jpg', '1');

-- ----------------------------
-- Table structure for news_event
-- ----------------------------
DROP TABLE IF EXISTS `news_event`;
CREATE TABLE `news_event` (
  `ID_NEWS_EVENT` int(11) NOT NULL AUTO_INCREMENT,
  `ID_USER` int(11) DEFAULT NULL,
  `JUDUL` varchar(200) DEFAULT NULL,
  `ISI` longtext,
  `PHOTO` varchar(200) DEFAULT NULL,
  `JENIS` int(11) DEFAULT NULL,
  `STATUS` int(11) DEFAULT NULL,
  PRIMARY KEY (`ID_NEWS_EVENT`)
) ENGINE=InnoDB AUTO_INCREMENT=6 DEFAULT CHARSET=latin1;

-- ----------------------------
-- Records of news_event
-- ----------------------------
INSERT INTO `news_event` VALUES ('1', '2', 'asd asd', 'asdasdasd a a', '2/1/Hydrangeas.jpg', '1', '1');
INSERT INTO `news_event` VALUES ('2', '2', 'coba', 'test test test test test test test test test test test', '2/2/Chrysanthemum.jpg', '1', '1');
INSERT INTO `news_event` VALUES ('3', '2', 'coba 2', 'test test test test test test test test test test test', '2/3/Hydrangeas.jpg', '1', '1');
INSERT INTO `news_event` VALUES ('4', '2', 'event 1', 'test test test test test test test test test test test test test test test test test test test test test test', null, '2', '1');
INSERT INTO `news_event` VALUES ('5', '2', 'event  2', 'test test test test test test test test test test test test test test test test test test test test test test', null, '2', '1');

-- ----------------------------
-- Table structure for pesan
-- ----------------------------
DROP TABLE IF EXISTS `pesan`;
CREATE TABLE `pesan` (
  `ID_PENGIRIM` int(11) DEFAULT NULL,
  `ID_PENERIMA` int(11) DEFAULT NULL,
  `PESAN` longtext,
  `TGL_KIRIM` datetime DEFAULT NULL,
  `STATUS` int(11) DEFAULT NULL,
  KEY `pesan_ID_USER` (`ID_PENGIRIM`),
  KEY `pesan_ID_USER2` (`ID_PENERIMA`),
  CONSTRAINT `pesan_ID_USER` FOREIGN KEY (`ID_PENGIRIM`) REFERENCES `user` (`ID_USER`) ON DELETE CASCADE ON UPDATE CASCADE,
  CONSTRAINT `pesan_ID_USER2` FOREIGN KEY (`ID_PENERIMA`) REFERENCES `user` (`ID_USER`) ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- ----------------------------
-- Records of pesan
-- ----------------------------

-- ----------------------------
-- Table structure for user
-- ----------------------------
DROP TABLE IF EXISTS `user`;
CREATE TABLE `user` (
  `ID_USER` int(11) NOT NULL AUTO_INCREMENT,
  `NAMA_USER` varchar(100) NOT NULL,
  `USERNAME` varchar(100) DEFAULT NULL,
  `EMAIL` varchar(100) DEFAULT NULL,
  `ALAMAT` varchar(200) NOT NULL,
  `PASSWORD` varchar(100) DEFAULT NULL,
  `ROLE` int(11) DEFAULT NULL,
  `STATUS` int(11) DEFAULT NULL,
  PRIMARY KEY (`ID_USER`)
) ENGINE=InnoDB AUTO_INCREMENT=7 DEFAULT CHARSET=latin1;

-- ----------------------------
-- Records of user
-- ----------------------------
INSERT INTO `user` VALUES ('1', '', 'user', 'user@gmail.com', '', '81dc9bdb52d04dc20036dbd8313ed055', '3', '1');
INSERT INTO `user` VALUES ('2', 'Agency 1', 'agency', 'agency@gmail.com', '', '81dc9bdb52d04dc20036dbd8313ed055', '2', '1');
INSERT INTO `user` VALUES ('3', '', 'admin', 'admin@gmail.com', '', '81dc9bdb52d04dc20036dbd8313ed055', '1', '1');
INSERT INTO `user` VALUES ('4', '', 'user2', 'user2@gmail.com', '', '81dc9bdb52d04dc20036dbd8313ed055', '3', '1');
INSERT INTO `user` VALUES ('5', '', 'asd', 'asd@dd.dd', '', '7815696ecbf1c96e6894b779456d330e', '3', '1');
INSERT INTO `user` VALUES ('6', '', 'qweqw', 'aqweqw@dd.dd', 'adas asdas da', '202cb962ac59075b964b07152d234b70', '2', '1');
