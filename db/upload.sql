/*
Navicat MySQL Data Transfer

Source Server         : feature/bin
Source Server Version : 50505
Source Host           : localhost:3306
Source Database       : xg_system

Target Server Type    : MYSQL
Target Server Version : 50505
File Encoding         : 65001

Date: 2018-11-25 01:37:07
*/

SET FOREIGN_KEY_CHECKS=0;

-- ----------------------------
-- Table structure for `upload`
-- ----------------------------
DROP TABLE IF EXISTS `upload`;
CREATE TABLE `upload` (
  `uploadid` int(11) NOT NULL AUTO_INCREMENT,
  `title` varchar(20) NOT NULL,
  `pic` varchar(100) NOT NULL,
  `wtime` date NOT NULL,
  `ip` varchar(255) NOT NULL,
  PRIMARY KEY (`uploadid`)
) ENGINE=MyISAM AUTO_INCREMENT=37 DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of upload
-- ----------------------------
INSERT INTO `upload` VALUES ('15', '实习报告模板', 'upfiles/实习报告模板.doc', '0000-00-00', '');
INSERT INTO `upload` VALUES ('20', '创青春', 'upfiles/“创青春”.doc', '0000-00-00', '');
INSERT INTO `upload` VALUES ('19', '信息工程学院论文样例', 'upfiles/信工系论文撰写与印制规范-论文样例.doc', '0000-00-00', '');
INSERT INTO `upload` VALUES ('18', '论文初稿框架', 'upfiles/论文初稿框架-朱志斌.docx', '0000-00-00', '');
INSERT INTO `upload` VALUES ('21', '个人先进材料', 'upfiles/个人先进材料.docx', '0000-00-00', '');
INSERT INTO `upload` VALUES ('22', '毕业设计检查表', 'upfiles/2018届毕业设计检查表.xlsx', '0000-00-00', '');
INSERT INTO `upload` VALUES ('24', '开题报告封面', 'upfiles/4.开题报告封面.doc', '0000-00-00', '');
INSERT INTO `upload` VALUES ('25', '大创申报书', 'upfiles/大创申报书.doc', '0000-00-00', '');
INSERT INTO `upload` VALUES ('26', '学生证补办申请', 'upfiles/学生证补办申请表.doc', '0000-00-00', '');
INSERT INTO `upload` VALUES ('27', 'php基础笔记', 'upfiles/php基础笔记.docx', '2018-01-18', '127.0.0.1');
INSERT INTO `upload` VALUES ('28', '毕业设计任务书', 'upfiles/2.毕业设计任务书(朱志斌).doc', '2018-01-18', '127.0.0.1');
