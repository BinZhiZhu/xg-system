/*
Navicat MySQL Data Transfer

Source Server         : feature/bin
Source Server Version : 50505
Source Host           : localhost:3306
Source Database       : xg_system

Target Server Type    : MYSQL
Target Server Version : 50505
File Encoding         : 65001

Date: 2018-11-25 01:37:54
*/

SET FOREIGN_KEY_CHECKS=0;

-- ----------------------------
-- Table structure for `topics_stu`
-- ----------------------------
DROP TABLE IF EXISTS `topics_stu`;
CREATE TABLE `topics_stu` (
  `id` int(255) NOT NULL AUTO_INCREMENT,
  `username` varchar(15) CHARACTER SET utf8 NOT NULL,
  `name` varchar(10) CHARACTER SET utf8 NOT NULL,
  `major` varchar(20) CHARACTER SET utf8 NOT NULL,
  `topic_id` varchar(15) CHARACTER SET utf8 NOT NULL,
  `topic_name` varchar(15) CHARACTER SET utf8 NOT NULL,
  `teacher_id` varchar(15) CHARACTER SET utf8 NOT NULL,
  `teacher_name` varchar(15) CHARACTER SET utf8 NOT NULL,
  `class` varchar(50) CHARACTER SET utf8 NOT NULL,
  `topic_type` varchar(5) CHARACTER SET utf8 NOT NULL,
  `will` int(5) NOT NULL,
  `content` text COLLATE utf8_unicode_ci NOT NULL,
  `status` varchar(10) CHARACTER SET utf8 NOT NULL DEFAULT '审核中',
  `index` int(10) NOT NULL DEFAULT '0',
  PRIMARY KEY (`id`),
  UNIQUE KEY `uid_will` (`username`,`will`) USING BTREE
) ENGINE=MyISAM AUTO_INCREMENT=25 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- ----------------------------
-- Records of topics_stu
-- ----------------------------
INSERT INTO `topics_stu` VALUES ('8', '201425220147', '朱志斌', '计算机科学与技术1401班(数字媒体)', '003', '基于ASP.net实现企业论坛', '1300', 'xx老师', '计算机科学与技术(数字媒体)', '网站系统', '2', '', '不通过', '0');
INSERT INTO `topics_stu` VALUES ('17', '201425220147', '朱志斌', '计算机科学与技术1401班(数字媒体)', '001', 'Java', '1300', 'xx老师', '计算机科学与技术(数字媒体)', '其他', '1', '', '通过', '0');
INSERT INTO `topics_stu` VALUES ('18', '201425220147', '朱志斌', '计算机科学与技术1401班(数字媒体)', '002', 'php', '1300', 'xx老师', '计算机科学与技术(数字媒体)', '其他', '3', '', '通过', '0');
INSERT INTO `topics_stu` VALUES ('22', '201425220145', '钟钦海', '计算机科学与技术(数字媒体)', '004', '测试测试', '1300', 'xx老师', '计算机科学与技术（数据库）', '手机app', '1', '', '通过', '0');
INSERT INTO `topics_stu` VALUES ('24', '201425220136', '谢文崇', '计算机科学与技术1401班(数字媒体)', '1001', '测试名称', '1300', 'xx老师', '电子信息工程', '学术论文', '1', '', '不通过', '0');
