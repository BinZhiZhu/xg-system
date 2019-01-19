/*
Navicat MySQL Data Transfer

Source Server         : 毕业论文选题系统
Source Server Version : 50553
Source Host           : localhost:3306
Source Database       : xg_system

Target Server Type    : MYSQL
Target Server Version : 50553
File Encoding         : 65001

Date: 2018-03-24 16:40:22
*/

SET FOREIGN_KEY_CHECKS=0;

-- ----------------------------
-- Table structure for `admin`
-- ----------------------------
DROP TABLE IF EXISTS `admin`;
CREATE TABLE `admin` (
  `id` int(100) NOT NULL AUTO_INCREMENT,
  `username` varchar(20) CHARACTER SET utf8 NOT NULL,
  `password` int(20) NOT NULL,
  `name` varchar(10) CHARACTER SET utf8 NOT NULL,
  `sex` varchar(2) CHARACTER SET utf8 NOT NULL,
  `phone` varchar(11) CHARACTER SET utf8 NOT NULL,
  `email` varchar(20) CHARACTER SET utf8 NOT NULL,
  `role_id` int(10) NOT NULL DEFAULT '4',
  `login_num` int(11) NOT NULL,
  `ip` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `wtime` datetime NOT NULL,
  `major` varchar(20) COLLATE utf8_unicode_ci NOT NULL DEFAULT '管理员',
  PRIMARY KEY (`username`),
  UNIQUE KEY `username` (`username`) USING BTREE,
  UNIQUE KEY `id` (`id`) USING BTREE
) ENGINE=MyISAM AUTO_INCREMENT=5 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- ----------------------------
-- Records of admin
-- ----------------------------
INSERT INTO `admin` VALUES ('1', '004', '123', '管理员', '男', '18814113493', '854767470@qq.com', '4', '5', '127.0.0.1', '2018-03-24 13:39:15', '管理员');
INSERT INTO `admin` VALUES ('2', '005', '123456', '11', '男', '123', '123', '4', '0', '', '0000-00-00 00:00:00', '管理员');

-- ----------------------------
-- Table structure for `auditor`
-- ----------------------------
DROP TABLE IF EXISTS `auditor`;
CREATE TABLE `auditor` (
  `id` int(255) NOT NULL AUTO_INCREMENT,
  `username` varchar(50) CHARACTER SET utf8 NOT NULL,
  `password` varchar(50) CHARACTER SET utf8 NOT NULL DEFAULT '123456',
  `name` varchar(50) CHARACTER SET utf8 NOT NULL,
  `sex` varchar(2) CHARACTER SET utf8 NOT NULL,
  `phone` varchar(15) CHARACTER SET utf8 NOT NULL,
  `email` varchar(50) CHARACTER SET utf8 NOT NULL,
  `role_id` int(50) NOT NULL DEFAULT '3',
  `login_num` int(11) NOT NULL,
  `wtime` datetime NOT NULL,
  `ip` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `major` varchar(20) COLLATE utf8_unicode_ci NOT NULL DEFAULT '审核员',
  PRIMARY KEY (`username`),
  UNIQUE KEY `username` (`username`) USING BTREE,
  UNIQUE KEY `id` (`id`) USING BTREE
) ENGINE=MyISAM AUTO_INCREMENT=16 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- ----------------------------
-- Records of auditor
-- ----------------------------
INSERT INTO `auditor` VALUES ('1', '003', '123', '审核员1', '女', '18811545698', '123456@qq.com', '3', '23', '2018-03-24 13:32:39', '127.0.0.1', '审核员');
INSERT INTO `auditor` VALUES ('2', '20142550147', '123', '审核员', '男', '13245699878', '123@qq.com', '3', '2', '2018-03-18 17:12:52', '127.0.0.1', '审核员');
INSERT INTO `auditor` VALUES ('3', '123', '123', '测试审核员', '男', '13245699878', '123@qq.com', '3', '2', '2018-03-18 17:12:52', '127.0.0.1', '审核员');

-- ----------------------------
-- Table structure for `major`
-- ----------------------------
DROP TABLE IF EXISTS `major`;
CREATE TABLE `major` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `major_name` varchar(255) NOT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `major_name` (`major_name`)
) ENGINE=MyISAM AUTO_INCREMENT=23 DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of major
-- ----------------------------
INSERT INTO `major` VALUES ('1', '计算机科学与技术1401班(数字媒体)');
INSERT INTO `major` VALUES ('2', '计算机科学与技术(数据库)');
INSERT INTO `major` VALUES ('3', '计算机科学与技术(Oracle)');
INSERT INTO `major` VALUES ('4', '信息管理技术1401');
INSERT INTO `major` VALUES ('5', '电子信息工程1401');
INSERT INTO `major` VALUES ('6', '电子商务1401');
INSERT INTO `major` VALUES ('7', '网络工程1401');
INSERT INTO `major` VALUES ('8', '电气及其自动化1401');
INSERT INTO `major` VALUES ('9', '电气及其自动化1402');
INSERT INTO `major` VALUES ('10', '电气及其自动化1403');
INSERT INTO `major` VALUES ('11', '计算机科学与技术方向(教师)');
INSERT INTO `major` VALUES ('12', '电动及其自动化方向(教师)');
INSERT INTO `major` VALUES ('13', '信息管理技术方向(教师)');
INSERT INTO `major` VALUES ('14', '电子信息工程方向(教师)');
INSERT INTO `major` VALUES ('15', '电子商务方向(教师)');
INSERT INTO `major` VALUES ('16', '网络工程方向(教师)');
INSERT INTO `major` VALUES ('22', '计算机科学与技术(数字媒体)');

-- ----------------------------
-- Table structure for `message`
-- ----------------------------
DROP TABLE IF EXISTS `message`;
CREATE TABLE `message` (
  `id` int(255) NOT NULL AUTO_INCREMENT,
  `username` varchar(20) CHARACTER SET utf8 NOT NULL,
  `sender` varchar(10) CHARACTER SET utf8 NOT NULL,
  `sendee` varchar(20) CHARACTER SET utf8 NOT NULL,
  `title` varchar(20) CHARACTER SET utf8 NOT NULL,
  `content` text CHARACTER SET utf8 NOT NULL,
  `date` datetime NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=39 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- ----------------------------
-- Records of message
-- ----------------------------
INSERT INTO `message` VALUES ('2', '003', '李四', '002', '继续测试', '我们继续测试', '2017-11-04 12:42:40');
INSERT INTO `message` VALUES ('3', '002', '测试2', '003', '测试中', '我们正在测试！', '2017-11-02 12:42:36');
INSERT INTO `message` VALUES ('4', '004', '管理员', '201425220147', '测试回复', '朱志斌同学，我收到了！', '2017-11-01 12:42:27');
INSERT INTO `message` VALUES ('7', '004', '管理员', '201425220148', '我弄欧尼', '弄弄拍马屁', '2017-11-05 17:05:16');
INSERT INTO `message` VALUES ('8', '003', '朱志斌', '002', '检查开题报告', '老师，请帮我检查下开题报告谢谢！', '2017-11-05 17:08:19');
INSERT INTO `message` VALUES ('16', '004', '管理员', '201425220147', '测试', '123', '2017-11-13 19:24:56');
INSERT INTO `message` VALUES ('18', '004', '管理员', '201425220147', '测试测试111', '测试测试233', '2017-11-16 20:03:25');
INSERT INTO `message` VALUES ('19', '004', '管理员', '201425220147', '测试测试111', '测试测试', '2017-11-18 11:43:24');
INSERT INTO `message` VALUES ('29', '201425220147', '朱志斌', '201425220147', '自己', '测试自己', '2017-11-24 17:13:53');
INSERT INTO `message` VALUES ('30', '201425220147', '朱志斌', '1300', '测试', '你是教师编号1300吧', '2018-02-14 20:01:03');
INSERT INTO `message` VALUES ('31', '201425220147', '朱志斌', '111', '111', '111', '2018-03-01 17:00:46');
INSERT INTO `message` VALUES ('32', '201425220147', '朱志斌', '1300', '2改论文', '老师2改论文已经发给你了收到回复', '2018-03-18 12:16:00');
INSERT INTO `message` VALUES ('33', '201425220147', '朱志斌', '1300', 'sdasd', 'asdasd', '2018-03-18 12:49:31');
INSERT INTO `message` VALUES ('38', '201425220147', '朱志斌', '1300', '1300老师好', '1300老师好', '2018-03-18 16:29:40');

-- ----------------------------
-- Table structure for `news`
-- ----------------------------
DROP TABLE IF EXISTS `news`;
CREATE TABLE `news` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `title` varchar(50) NOT NULL,
  `content` text NOT NULL,
  `wtime` date NOT NULL,
  `author` varchar(20) NOT NULL,
  `num` int(11) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=31 DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of news
-- ----------------------------
INSERT INTO `news` VALUES ('21', '关于做好2017-2018学年第一学期2017级新生《体育》课程项目选修工作的通知', '<table width=\"100%\" height=\"100%\" cellspacing=\"0\" cellpadding=\"0\" align=\"center\" style=\"font-family:&quot;\">\r\n	<tbody>\r\n		<tr>\r\n			<td height=\"10px\" align=\"center\">\r\n				<table width=\"100%\">\r\n					<tbody>\r\n						<tr>\r\n							<td height=\"5px\" align=\"center\">\r\n								<span id=\"lbl_title\" style=\"color:#ff0000;font-weight:bolder;\">关于做好2017-2018学年第一学期2017级新生《体育》课程项目选修工作的通知</span>\r\n							</td>\r\n						</tr>\r\n						<tr>\r\n							<td width=\"100%\" height=\"1px\" valign=\"top\" align=\"center\">\r\n								<hr />\r\n							</td>\r\n						</tr>\r\n					</tbody>\r\n				</table>\r\n			</td>\r\n		</tr>\r\n		<tr>\r\n			<td valign=\"top\" align=\"center\" colspan=\"2\">\r\n				<table width=\"100%\" height=\"100%\" border=\"0\" cellspacing=\"0\" cellpadding=\"0\" align=\"center\" class=\"ke-zeroborder\">\r\n					<tbody>\r\n						<tr>\r\n							<td width=\"100%\">\r\n							</td>\r\n						</tr>\r\n						<tr>\r\n							<td valign=\"top\" align=\"left\" width=\"100%\" style=\"font-size:14px;\">\r\n								<p class=\"msonormal\">\r\n									<span style=\"font-family:宋体;font-size:10.5pt;\">各</span><span style=\"font-family:宋体;font-size:10.5pt;\">二级学院（部）</span><span style=\"font-family:宋体;font-size:10.5pt;\">、各</span><span style=\"font-family:宋体;font-size:10.5pt;\">2017</span><span style=\"font-family:宋体;font-size:10.5pt;\">级学生班</span><span style=\"font-family:宋体;font-size:10.5pt;\">：</span><span style=\"font-family:宋体;font-size:10.5pt;\"></span>\r\n								</p>\r\n								<p class=\"msonormal\" style=\"text-indent:21pt;\">\r\n									<span style=\"font-family:宋体;font-size:10.5pt;\"><span>为做好</span>2017-2018学年第一学期201</span><span style=\"font-family:宋体;font-size:10.5pt;\">7</span><span style=\"font-family:宋体;font-size:10.5pt;\">级新生《体育》课程项目选修工作，现将有关事宜通知如下：</span><span style=\"font-family:宋体;font-size:10.5pt;\"></span>\r\n								</p>\r\n								<p class=\"msonormal\" style=\"text-indent:21pt;\">\r\n									<span style=\"font-family:宋体;font-size:10.5pt;\">一、选课时间</span><span style=\"font-family:宋体;font-size:10.5pt;\"></span>\r\n								</p>\r\n								<p class=\"msonormal\" style=\"text-indent:21pt;\">\r\n									<span style=\"font-family:宋体;font-size:10.5pt;\">9月2</span><span style=\"font-family:宋体;font-size:10.5pt;\">8日</span><span style=\"font-family:宋体;font-size:10.5pt;\">12:30</span><span style=\"font-family:宋体;font-size:10.5pt;\">-9月29</span><span style=\"font-family:宋体;font-size:10.5pt;\">日</span><span style=\"font-family:宋体;font-size:10.5pt;\">16</span><span style=\"font-family:宋体;font-size:10.5pt;\">:</span><span style=\"font-family:宋体;font-size:10.5pt;\">00</span><span style=\"font-family:宋体;font-size:10.5pt;\">。学生必须于选课时间内选课，逾期不再予以安排选课。</span><span style=\"font-family:宋体;font-size:10.5pt;\"></span>\r\n								</p>\r\n								<p class=\"msonormal\" style=\"text-indent:21pt;\">\r\n									<span style=\"font-family:宋体;font-size:10.5pt;\">二、《体育》课程项目</span><span style=\"font-family:宋体;font-size:10.5pt;\"></span>\r\n								</p>\r\n								<p class=\"msonormal\" style=\"text-indent:21pt;\">\r\n									<span style=\"font-family:宋体;font-size:10.5pt;\">《体育》课程项目分别有：篮球、足球、排球、乒乓球、羽毛球、毽球、啦啦操、散打。</span><span style=\"font-family:宋体;font-size:10.5pt;\"></span>\r\n								</p>\r\n								<p class=\"msonormal\" style=\"text-indent:21pt;\">\r\n									<span style=\"font-family:宋体;font-size:10.5pt;\">三、选课方法和程序</span><span style=\"font-family:宋体;font-size:10.5pt;\"></span>\r\n								</p>\r\n								<p class=\"msonormal\" style=\"text-indent:21pt;\">\r\n									<span style=\"font-family:宋体;font-size:10.5pt;\">1.打开浏览器，在地址栏输入网址</span><a href=\"http://192.21.100.7:8081/jwweb\"><u><span class=\"15\" style=\"color:#0000ff;font-family:宋体;\">http://192.21.100.7:8081/jwweb</span></u></a><span style=\"font-family:宋体;font-size:10.5pt;\"><span>，点击</span>“用户登录”，接着选择“身份”－“学生”，并输入本人的学号、密码（</span><span style=\"font-family:&quot;font-size:10.5pt;\"><span>初始密码为本人身份证号</span></span><span style=\"font-family:宋体;font-size:10.5pt;\">码</span><span style=\"font-family:&quot;font-size:10.5pt;\"><span>后六位</span></span><span style=\"font-family:宋体;font-size:10.5pt;\">数字</span><span style=\"font-family:宋体;font-size:10.5pt;\">，</span><u><span style=\"font-family:宋体;font-size:10.5pt;\">务必妥善保管个人密码</span></u><span style=\"font-family:宋体;font-size:10.5pt;\">）以及验证码，然后点击登录进入系统；</span><span style=\"font-family:宋体;font-size:10.5pt;\"></span>\r\n								</p>\r\n								<p class=\"msonormal\" style=\"text-indent:21pt;\">\r\n									<span style=\"font-family:宋体;font-size:10.5pt;\">2.点击系统左侧“网上选课”，进入网上选课页面→点击“正选”按钮→选择选修课程范围“</span><b><u><span style=\"font-family:宋体;font-size:10.5pt;\"><span>主修（本年级</span>/专业）</span></u></b><span style=\"font-family:宋体;font-size:10.5pt;\">”→点击“检索”；</span><span style=\"font-family:宋体;font-size:10.5pt;\"></span>\r\n								</p>\r\n								<p class=\"msonormal\" style=\"text-indent:21pt;\">\r\n									<span style=\"font-family:宋体;font-size:10.5pt;\">3.点击课程右面的“选择”按钮进行“选定”选修班级→完成后点击“确定”；</span><span style=\"font-family:宋体;font-size:10.5pt;\"></span>\r\n								</p>\r\n								<p class=\"msonormal\" style=\"text-indent:21pt;\">\r\n									<span style=\"font-family:宋体;font-size:10.5pt;\">4.把所选择的课程项目用“√”选定后点击</span><b><span style=\"font-family:宋体;font-size:10.5pt;\">“提交”</span></b><span style=\"font-family:宋体;font-size:10.5pt;\">按钮进行提交（每名学生只能选一项课程项目，如选两项，系统会提示提交失败）；</span><span style=\"font-family:宋体;font-size:10.5pt;\"></span>\r\n								</p>\r\n								<p class=\"msonormal\" style=\"text-indent:21pt;\">\r\n									<span style=\"font-family:宋体;font-size:10.5pt;\">5.提交后务必留意查看课程项目的提交信息，确认选课成功与否及原因；</span><span style=\"font-family:宋体;font-size:10.5pt;\"></span>\r\n								</p>\r\n								<p class=\"msonormal\" style=\"text-indent:21pt;\">\r\n									<span style=\"font-family:宋体;font-size:10.5pt;\">6.要退选课程项目的学生，进入“退选”用“√”选定退选课程项目，点击右上侧的“退选”按钮进行退选。退选后学生可再按选课程序选修其它课程项目；</span><span style=\"font-family:宋体;font-size:10.5pt;\"></span>\r\n								</p>\r\n								<p class=\"msonormal\" style=\"text-indent:21pt;\">\r\n									<span style=\"font-family:宋体;font-size:10.5pt;\">7.</span><b><u><span style=\"font-family:宋体;font-size:10.5pt;\"><span>选课完毕后学生应当重新登录系统，查看</span>“正选”，以核定最终已选定选修项目</span></u></b><span style=\"font-family:宋体;font-size:10.5pt;\">。</span><span style=\"font-family:宋体;font-size:10.5pt;\"></span>\r\n								</p>\r\n								<p class=\"msonormal\" style=\"text-indent:21pt;\">\r\n									<span style=\"font-family:宋体;font-size:10.5pt;\"><span>四、</span>2017-2018</span><span style=\"font-family:宋体;font-size:10.5pt;\"><span>学年第一学期</span>201</span><span style=\"font-family:宋体;font-size:10.5pt;\">7</span><span style=\"font-family:宋体;font-size:10.5pt;\"><span>级新生《体育》课程上课（含考核）时间为</span>5-17周。学生必须按选课方法和程序办理选课手续后，方可参加《体育》课程的学习和考核。</span><b><u><span style=\"font-family:宋体;font-size:10.5pt;\"><span>学生在学期间应当至少选修</span>2个课程项目进行学习，方可获得《体育》课程学分。</span></u></b><b><u><span style=\"font-family:宋体;font-size:10.5pt;\"></span></u></b>\r\n								</p>\r\n								<p class=\"msonormal\" style=\"text-indent:21pt;\">\r\n									<span style=\"font-family:宋体;font-size:10.5pt;\">五、《</span><span style=\"font-family:宋体;font-size:10.5pt;\">体育》课程选课教学管理负责人为</span><span style=\"font-family:宋体;font-size:10.5pt;\">教务处</span><span style=\"font-family:宋体;font-size:10.5pt;\">黄</span><span style=\"font-family:宋体;font-size:10.5pt;\">老师。学生可向</span><span style=\"font-family:宋体;font-size:10.5pt;\">黄</span><span style=\"font-family:宋体;font-size:10.5pt;\"><span>老师咨询选课有关问题，咨询电话为</span>87983355。 &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</span><span style=\"font-family:宋体;font-size:10.5pt;\"></span>\r\n								</p>\r\n								<p class=\"msonormal\" style=\"text-indent:325.5pt;\">\r\n									<span style=\"font-family:宋体;font-size:10.5pt;\">教务处</span><span style=\"font-family:宋体;font-size:10.5pt;\"></span>\r\n								</p>\r\n								<p class=\"msonormal\" align=\"center\" style=\"text-align:center;text-indent:21pt;\">\r\n									<span style=\"font-family:宋体;font-size:10.5pt;\">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;201</span><span style=\"font-family:宋体;font-size:10.5pt;\">7</span><span style=\"font-family:宋体;font-size:10.5pt;\"><span>年</span>9月</span><span style=\"font-family:宋体;font-size:10.5pt;\">26</span><span style=\"font-family:宋体;font-size:10.5pt;\">日</span><span style=\"font-family:宋体;font-size:10.5pt;\"></span>\r\n								</p>\r\n							</td>\r\n						</tr>\r\n						<tr>\r\n							<td height=\"10%\" align=\"right\">\r\n								<table height=\"100%\">\r\n									<tbody>\r\n										<tr>\r\n											<td height=\"100%\" style=\"font-size:16px;\">\r\n												教务处\r\n											</td>\r\n										</tr>\r\n									</tbody>\r\n								</table>\r\n							</td>\r\n						</tr>\r\n						<tr>\r\n							<td height=\"10%\" align=\"right\">\r\n								<table height=\"100%\">\r\n									<tbody>\r\n										<tr>\r\n											<td height=\"100%\">\r\n												2017-09-27 09:01:52\r\n											</td>\r\n										</tr>\r\n									</tbody>\r\n								</table>\r\n							</td>\r\n						</tr>\r\n					</tbody>\r\n				</table>\r\n			</td>\r\n		</tr>\r\n	</tbody>\r\n</table>', '2018-03-10', '张三', '0');
INSERT INTO `news` VALUES ('19', '企业家姜惊涛进校园--我人生中的“惊涛骇浪', '<span style=\"font-family:arial, helvetica, sans-serif, 宋体;font-size:16px;\">3月6日，中国湾区经济两栖房产资深研究者、三亚市互联网协会常务副会长——姜惊涛先生莅临珠江学院，给经济与管理学院师生分享《我的人生规划——五个阶段的认识和体会》。</span><img src=\"/yuanzhipeng/btjx/edit_file/image/20180310/20180310171654_19888.jpg\" alt=\"\" /><br />\r\n<span style=\"font-family:arial, helvetica, sans-serif, 宋体;font-size:16px;\">姜惊涛先生以三个新奇有趣的问题引起了同学们强烈的好奇心，大家对所提问题给予热烈的响应，踊跃举手回答。讲座中，姜先生分享了他对人生规划五个阶段的定义：学业阶段——职业规划阶段——事业发展阶段——生活养生阶段——思想传承阶段。他建议处于学业阶段的同学们要充分学习，形成良好的知识储备，为事业发展打下夯实知识基础；对于职业规划阶段，同学们应结交志同道合的良师益友，打下积极正面的人脉积累基础，好的人脉资源即智慧资源；进入事业发展阶段之后，同学们应选择自己兴趣所向，释放生产力，不断优化升级专业能力。</span>', '2018-03-10', '张三', '0');
INSERT INTO `news` VALUES ('20', '关于做好2017-2018学年第一学期《课程教学进度表》录入工作的通知', '<table width=\"100%\" height=\"100%\" cellspacing=\"0\" cellpadding=\"0\" align=\"center\" style=\"font-family:&quot;\">\r\n	<tbody>\r\n		<tr>\r\n			<td height=\"10px\" align=\"center\">\r\n				<table width=\"100%\">\r\n					<tbody>\r\n						<tr>\r\n							<td height=\"5px\" align=\"center\">\r\n								<span id=\"lbl_title\" style=\"color:#ff0000;font-weight:bolder;\">关于做好2017-2018学年第一学期《课程教学进度表》录入工作的通知</span>\r\n							</td>\r\n						</tr>\r\n						<tr>\r\n							<td width=\"100%\" height=\"1px\" valign=\"top\" align=\"center\">\r\n								<hr />\r\n							</td>\r\n						</tr>\r\n					</tbody>\r\n				</table>\r\n			</td>\r\n		</tr>\r\n		<tr>\r\n			<td valign=\"top\" align=\"center\" colspan=\"2\">\r\n				<table width=\"100%\" height=\"100%\" border=\"0\" cellspacing=\"0\" cellpadding=\"0\" align=\"center\" class=\"ke-zeroborder\">\r\n					<tbody>\r\n						<tr>\r\n							<td width=\"100%\">\r\n							</td>\r\n						</tr>\r\n						<tr>\r\n							<td valign=\"top\" align=\"left\" width=\"100%\" style=\"font-size:14px;\">\r\n								&nbsp;\r\n								<p class=\"msonormal\" align=\"left\">\r\n									<span style=\"line-height:21px;font-family:宋体;\">各二级学院<span>(</span>部<span>)</span>、各任课教师：<span></span></span>\r\n								</p>\r\n								<p class=\"msonormal\" align=\"left\" style=\"text-indent:21pt;\">\r\n									<span style=\"line-height:21px;font-family:宋体;\">为做好<span>2017-2018</span>学年第一学期《课程教学进度表》录入工作，现将有关事宜通知如下：<span></span></span>\r\n								</p>\r\n								<p class=\"msonormal\" style=\"text-indent:21pt;\">\r\n									<span style=\"line-height:21px;font-family:宋体;\">一、录入时间<span></span></span>\r\n								</p>\r\n								<p class=\"msonormal\" style=\"text-indent:21pt;\">\r\n									<span style=\"line-height:21px;font-family:宋体;\">2014</span><span style=\"line-height:21px;font-family:宋体;\">、<span>2015</span>、<span>2016</span>级学生《课程教学进度表》录入时间为<span>9</span>月<span>11</span>日<span>8:00</span>至<span>9</span>月<span>17</span>日<span>23:59</span>；教师应当于系统开放时间内录入，以确保录入工作的顺利进行。<span></span></span>\r\n								</p>\r\n								<p class=\"msonormal\" style=\"text-indent:21pt;\">\r\n									<span style=\"line-height:21px;font-family:宋体;\">二、录入方法和程序<span></span></span>\r\n								</p>\r\n								<p class=\"msonormal\" style=\"text-indent:21pt;\">\r\n									<span style=\"line-height:21px;font-family:宋体;\">1.</span><span style=\"line-height:21px;font-family:宋体;\">打开浏览器，在地址栏输入网址<u><span style=\"color:blue;\"><a href=\"http://192.21.100.7:8081/jwweb\"><span>http://192.21.100.7:8081/jwweb</span></a></span></u>，点击“用户登录”，接着选择“身份”－“教师教辅人员”，并输入本人的工号、密码以及验证码，然后点击登录进入系统；<span></span></span>\r\n								</p>\r\n								<p class=\"msonormal\" style=\"text-indent:21pt;\">\r\n									<span style=\"line-height:21px;font-family:宋体;\">2.</span><span style=\"line-height:21px;font-family:宋体;\">点击系统左侧“教学安排”，进入“录入教学进度表”页面→选择“学年学期”按钮→点击“检索”；<span></span></span>\r\n								</p>\r\n								<p class=\"msonormal\" style=\"text-indent:21pt;\">\r\n									<span style=\"line-height:21px;font-family:宋体;\">3.</span><span style=\"line-height:21px;font-family:宋体;\">点击课程右面的“录入”按钮进行录入→完成后点击“保存”；<span></span></span>\r\n								</p>\r\n								<p class=\"msonormal\" style=\"text-indent:21pt;\">\r\n									<span style=\"line-height:21px;font-family:宋体;\">4.</span><span style=\"line-height:21px;font-family:宋体;\">录入完成后，教师可直接在教务管理系统的登录界面“教学安排”处查询《课程教学进度表》。<b><u><span></span></u></b></span>\r\n								</p>\r\n								<p class=\"msonormal\" style=\"text-indent:21pt;\">\r\n									<span style=\"line-height:21px;font-family:宋体;\">三、</span><span style=\"line-height:21px;font-family:宋体;\">《课程教学进度表》是课程教学档案的重要内容。各二级学院<span>(</span>部<span>)</span>、任课教师务必高度重视，认真做好录入工作，保证录入工作质量。<b><u><span></span></u></b></span>\r\n								</p>\r\n								<p class=\"msonormal\" align=\"left\" style=\"text-indent:21pt;\">\r\n									<span style=\"line-height:21px;font-family:宋体;\">四、《课程教学进度表》录入工作</span><span style=\"line-height:21px;font-family:宋体;\">管理负责人为</span><span style=\"line-height:21px;font-family:宋体;\">教务处祝老师。教师可向祝老师咨询有关录入问题，咨询电话为<span>87983355</span>。<span></span></span>\r\n								</p>\r\n							</td>\r\n						</tr>\r\n						<tr>\r\n							<td height=\"10%\" align=\"right\">\r\n								<table height=\"100%\">\r\n									<tbody>\r\n										<tr>\r\n											<td height=\"100%\" style=\"font-size:16px;\">\r\n												教务处\r\n											</td>\r\n										</tr>\r\n									</tbody>\r\n								</table>\r\n							</td>\r\n						</tr>\r\n						<tr>\r\n							<td height=\"10%\" align=\"right\">\r\n								<table height=\"100%\">\r\n									<tbody>\r\n										<tr>\r\n											<td height=\"100%\">\r\n												2017-09-11 09:39:13\r\n											</td>\r\n										</tr>\r\n									</tbody>\r\n								</table>\r\n							</td>\r\n						</tr>\r\n					</tbody>\r\n				</table>\r\n			</td>\r\n		</tr>\r\n	</tbody>\r\n</table>', '2018-03-10', '张三', '0');
INSERT INTO `news` VALUES ('22', '关于做好2016-2017学年第二学期教学信息网络反映和反馈工作的通知', '<table width=\"630px\" height=\"100%\" cellspacing=\"0\" cellpadding=\"0\" align=\"center\" border=\"0\" style=\"font-family:&quot;background-color:#cdf2e3;\" class=\"ke-zeroborder\">\r\n	<tbody>\r\n		<tr>\r\n			<td bgcolor=\"#cdf2e3\" width=\"5%\" height=\"100%\">\r\n				<br />\r\n			</td>\r\n			<td width=\"90%\" align=\"center\" height=\"100%\" bgcolor=\"#ffffff\">\r\n				<table width=\"100%\" height=\"100%\" cellspacing=\"0\" cellpadding=\"0\" align=\"center\">\r\n					<tbody>\r\n						<tr>\r\n							<td height=\"5px\">\r\n							</td>\r\n						</tr>\r\n						<tr>\r\n							<td height=\"10px\" align=\"center\">\r\n								<table width=\"100%\">\r\n									<tbody>\r\n										<tr>\r\n											<td height=\"5px\" align=\"center\">\r\n												<span id=\"lbl_title\" style=\"color:#ff0000;font-weight:bolder;\">关于做好2016-2017学年第二学期教学信息网络反映和反馈工作的通知</span>\r\n											</td>\r\n										</tr>\r\n										<tr>\r\n											<td width=\"100%\" height=\"1px\" valign=\"top\" align=\"center\">\r\n												<hr />\r\n											</td>\r\n										</tr>\r\n									</tbody>\r\n								</table>\r\n							</td>\r\n						</tr>\r\n						<tr>\r\n							<td valign=\"top\" align=\"center\" colspan=\"2\">\r\n								<table width=\"100%\" height=\"100%\" border=\"0\" cellspacing=\"0\" cellpadding=\"0\" align=\"center\" class=\"ke-zeroborder\">\r\n									<tbody>\r\n										<tr>\r\n											<td width=\"100%\">\r\n											</td>\r\n										</tr>\r\n										<tr>\r\n											<td valign=\"top\" align=\"left\" width=\"100%\" style=\"font-size:14px;\">\r\n												&nbsp;&nbsp;&nbsp;\r\n												<p class=\"msonormal\" align=\"left\">\r\n													<span style=\"font-size:12pt;font-family:宋体;\">各系<span>(</span>部<span>)</span>、各任课教师、各学生教学信息员：<span></span></span>\r\n												</p>\r\n												<p class=\"msonormal\" align=\"left\" style=\"text-indent:28.5pt;\">\r\n													<span style=\"font-size:12pt;font-family:宋体;\">学院建立了教学信息网络反映和反馈制度，并开通了《教学信息网络管理系统》，用于学生教学信息员反映教学信息和任课教师反馈教学信息。为做好<span>2016-2017</span>学年第二学期教学信息网络反映和反馈工作，现将有关事宜通知如下：<span></span></span>\r\n												</p>\r\n												<p class=\"msonormal\" align=\"left\" style=\"text-indent:28.5pt;\">\r\n													<span style=\"font-size:12pt;font-family:宋体;\">一、《教学信息网络管理系统》登陆网址为<span>http://192.21.100.3:8090/</span>，用户名为本人中文姓名（任课教师、学生教学信息员），初始密码为<span>12345</span>（登录后可自行更改密码）。<span></span></span>\r\n												</p>\r\n												<p class=\"msonormal\" align=\"left\" style=\"text-indent:28.5pt;\">\r\n													<span style=\"font-size:12pt;font-family:宋体;\">二、学生教学信息员应当收集和整理所在班级学生对任课教师反映的意见和建议等教学信息，并按时登陆《教学信息网络管理系统》，用<b>中文</b>客观、准确地反映教学信息（反馈方法为：①输入网址并进入网页“<span>http://192.21.100.3:8090/</span>” →②输入用户名和密码→③点击“确认”进入学生留言界面→④在学生留言界面选择任课教师和课程名称<span>,</span>“在留言界面输入反映的内容”→ ⑤点击“提交”，即完成反映→⑥若继续对下一位教师反映教学信息，可点击“继续留言”）。本学期学生教学信息员反映教学信息的时间为<b><span>4</span>月<span>24</span>日至<span>5</span>月<span>7</span>日</b>。<span></span></span>\r\n												</p>\r\n												<p class=\"msonormal\" align=\"left\" style=\"text-indent:28.5pt;\">\r\n													<span style=\"font-size:12pt;font-family:宋体;\">三、任课教师（选修课、体育课任课教师除外）应当高度重视教学信息反馈工作，按时登陆《教学信息网络管理系统》，用<b>中文</b>反馈学生教学信息员反映的教学信息（反馈方法为：①输入网址并进入网页“<span>http://192.21.100.3:8090/</span>” →②输入用户名和密码→③点击“确认”进入教师留言信息一览表→④在教师留言信息一览表中查看学生留言信息并点击“反馈”进入反馈界面<span>,</span>输入“反馈内容”→ ⑤点击“提交”，即完成反馈）。本学期任课教师反馈教学信息的时间为<b><span>5</span>月<span>8</span>日至<span>21</span>日。<span></span></b></span>\r\n												</p>\r\n												<p class=\"msonormal\" align=\"left\" style=\"text-indent:28.5pt;\">\r\n													<span style=\"font-size:12pt;font-family:宋体;\">四、任课教师和学生教学信息员可在校内登陆系统。任课教师、学生教学信息员若在反映和反馈教学信息过程中遇到系统本身的技术问题，可与系统管理员祝老师联系，联系电话为<span>87983355</span>。<span></span></span>\r\n												</p>\r\n											</td>\r\n										</tr>\r\n										<tr>\r\n											<td height=\"10%\" align=\"right\">\r\n												<table height=\"100%\">\r\n													<tbody>\r\n														<tr>\r\n															<td height=\"100%\" style=\"font-size:16px;\">\r\n																教务处\r\n															</td>\r\n														</tr>\r\n													</tbody>\r\n												</table>\r\n											</td>\r\n										</tr>\r\n										<tr>\r\n											<td height=\"10%\" align=\"right\">\r\n												<table height=\"100%\">\r\n													<tbody>\r\n														<tr>\r\n															<td height=\"100%\">\r\n																2017-04-21 15:42:49\r\n															</td>\r\n														</tr>\r\n													</tbody>\r\n												</table>\r\n											</td>\r\n										</tr>\r\n									</tbody>\r\n								</table>\r\n							</td>\r\n						</tr>\r\n						<tr>\r\n							<td height=\"5\">\r\n								<br />\r\n							</td>\r\n						</tr>\r\n					</tbody>\r\n				</table>\r\n			</td>\r\n			<td bgcolor=\"#cdf2e3\" width=\"5%\" height=\"100%\">\r\n				<br />\r\n			</td>\r\n		</tr>\r\n	</tbody>\r\n</table>', '2018-03-10', '张三', '0');
INSERT INTO `news` VALUES ('23', '关于做好2016-2017学年第一学期教学信息网络反映和反馈工作的通知', '<table width=\"100%\" height=\"100%\" cellspacing=\"0\" cellpadding=\"0\" align=\"center\">\r\n	<tbody>\r\n		<tr>\r\n			<td height=\"10px\" align=\"center\">\r\n				<table width=\"100%\">\r\n					<tbody>\r\n						<tr>\r\n							<td height=\"5px\" align=\"center\">\r\n								<span id=\"lbl_title\" style=\"color:#ff0000;font-weight:bolder;\">\r\n								<table width=\"100%\" height=\"100%\" cellspacing=\"0\" cellpadding=\"0\" align=\"center\">\r\n									<tbody>\r\n										<tr>\r\n											<td height=\"10px\" align=\"center\">\r\n												<table width=\"100%\">\r\n													<tbody>\r\n														<tr>\r\n															<td height=\"5px\" align=\"center\">\r\n																<span id=\"lbl_title\" style=\"color:#ff0000;font-weight:bolder;\">关于做好2016-2017学年第一学期教学信息网络反映和反馈工作的通知</span>\r\n															</td>\r\n														</tr>\r\n														<tr>\r\n															<td width=\"100%\" height=\"1px\" valign=\"top\" align=\"center\">\r\n																<hr />\r\n															</td>\r\n														</tr>\r\n													</tbody>\r\n												</table>\r\n											</td>\r\n										</tr>\r\n										<tr>\r\n											<td valign=\"top\" align=\"center\" colspan=\"2\">\r\n												<table width=\"100%\" height=\"100%\" border=\"0\" cellspacing=\"0\" cellpadding=\"0\" align=\"center\" class=\"ke-zeroborder\">\r\n													<tbody>\r\n														<tr>\r\n															<td width=\"100%\">\r\n															</td>\r\n														</tr>\r\n														<tr>\r\n															<td valign=\"top\" align=\"left\" width=\"100%\" style=\"font-size:14px;\">\r\n																&nbsp;\r\n																<p class=\"msonormal\" align=\"left\">\r\n																	<span style=\"font-size:12pt;font-family:宋体;\">各系<span>(</span>部<span>)</span>、各任课教师、各学生教学信息员：<span></span></span>\r\n																</p>\r\n																<p class=\"msonormal\" align=\"left\" style=\"text-indent:28.5pt;\">\r\n																	<span style=\"font-size:12pt;font-family:宋体;\">学院建立了教学信息网络反映和反馈制度，并开通了《教学信息网络管理系统》，用于学生教学信息员反映教学信息和任课教师反馈教学信息。为做好<span>2016-2017</span>学年第一学期教学信息网络反映和反馈工作，现将有关事宜通知如下：<span></span></span>\r\n																</p>\r\n																<p class=\"msonormal\" align=\"left\" style=\"text-indent:28.5pt;\">\r\n																	<span style=\"font-size:12pt;font-family:宋体;\">一、《教学信息网络管理系统》登陆网址为<span>http://192.21.100.3:8090/</span>，用户名为本人中文姓名（任课教师、学生教学信息员），初始密码为<span>12345</span>（登录后可自行更改密码）。<span></span></span>\r\n																</p>\r\n																<p class=\"msonormal\" align=\"left\" style=\"text-indent:28.5pt;\">\r\n																	<span style=\"font-size:12pt;font-family:宋体;\">二、学生教学信息员应当收集和整理所在班级学生对任课教师反映的意见和建议等教学信息，并按时登陆《教学信息网络管理系统》，用<b>中文</b>客观、准确地反映教学信息（反馈方法为：①输入网址并进入网页“<span>http://192.21.100.3:8090/</span>” →②输入用户名和密码→③点击“确认”进入学生留言界面→④在学生留言界面选择任课教师和课程名称<span>,</span>“在留言界面输入反映的内容”→ ⑤点击“提交”，即完成反映→⑥若继续对下一位教师反映教学信息，可点击“继续留言”）。本学期学生教学信息员反映教学信息的时间为<b><span>11</span>月<span>21</span>日至<span>12</span>月<span>2</span>日</b>。<span></span></span>\r\n																</p>\r\n																<p class=\"msonormal\" align=\"left\" style=\"text-indent:28.5pt;\">\r\n																	<span style=\"font-size:12pt;font-family:宋体;\">三、任课教师（选修课、体育课任课教师除外）应当高度重视教学信息反馈工作，按时登陆《教学信息网络管理系统》，用<b>中文</b>反馈学生教学信息员反映的教学信息（反馈方法为：①输入网址并进入网页“<span>http://192.21.100.3:8090/</span>” →②输入用户名和密码→③点击“确认”进入教师留言信息一览表→④在教师留言信息一览表中查看学生留言信息并点击“反馈”进入反馈界面<span>,</span>输入“反馈内容”→ ⑤点击“提交”，即完成反馈）。本学期任课教师反馈教学信息的时间为<b><span>12</span>月<span>5</span>日至<span>16</span>日。<span></span></b></span>\r\n																</p>\r\n																<p class=\"msonormal\" align=\"left\" style=\"text-indent:28.5pt;\">\r\n																	<span style=\"font-size:12pt;font-family:宋体;\">四、任课教师和学生教学信息员可在校内或校外登陆系统。任课教师、学生教学信息员若在反映和反馈教学信息过程中遇到系统本身的技术问题，可与系统管理员祝老师联系，联系电话为<span>87983355</span>。<span></span></span>\r\n																</p>\r\n															</td>\r\n														</tr>\r\n														<tr>\r\n															<td height=\"10%\" align=\"right\">\r\n																<table height=\"100%\">\r\n																	<tbody>\r\n																		<tr>\r\n																			<td height=\"100%\" style=\"font-size:16px;\">\r\n																				教务处\r\n																			</td>\r\n																		</tr>\r\n																	</tbody>\r\n																</table>\r\n															</td>\r\n														</tr>\r\n														<tr>\r\n															<td height=\"10%\" align=\"right\">\r\n																<table height=\"100%\">\r\n																	<tbody>\r\n																		<tr>\r\n																			<td height=\"100%\">\r\n																				2016-11-22 09:50:24\r\n																			</td>\r\n																		</tr>\r\n																	</tbody>\r\n																</table>\r\n															</td>\r\n														</tr>\r\n													</tbody>\r\n												</table>\r\n											</td>\r\n										</tr>\r\n										<tr>\r\n											<td height=\"5\">\r\n												<br />\r\n											</td>\r\n										</tr>\r\n									</tbody>\r\n								</table>\r\n<br />\r\n</span>\r\n							</td>\r\n						</tr>\r\n						<tr>\r\n							<td width=\"100%\" height=\"1px\" valign=\"top\" align=\"center\">\r\n								<hr />\r\n							</td>\r\n						</tr>\r\n					</tbody>\r\n				</table>\r\n			</td>\r\n		</tr>\r\n		<tr>\r\n			<td valign=\"top\" align=\"center\" colspan=\"2\">\r\n				<table width=\"100%\" height=\"100%\" border=\"0\" cellspacing=\"0\" cellpadding=\"0\" align=\"center\" class=\"ke-zeroborder\">\r\n					<tbody>\r\n						<tr>\r\n							<td width=\"100%\">\r\n							</td>\r\n						</tr>\r\n						<tr>\r\n							<td valign=\"top\" align=\"left\" width=\"100%\" style=\"font-size:14px;\">\r\n								&nbsp;\r\n								<p class=\"msonormal\" align=\"left\">\r\n									<span style=\"font-size:12pt;font-family:宋体;\">各系<span>(</span>部<span>)</span>、各任课教师、各学生教学信息员：<span></span></span>\r\n								</p>\r\n								<p class=\"msonormal\" align=\"left\" style=\"text-indent:28.5pt;\">\r\n									<span style=\"font-size:12pt;font-family:宋体;\">学院建立了教学信息网络反映和反馈制度，并开通了《教学信息网络管理系统》，用于学生教学信息员反映教学信息和任课教师反馈教学信息。为做好<span>2016-2017</span>学年第一学期教学信息网络反映和反馈工作，现将有关事宜通知如下：<span></span></span>\r\n								</p>\r\n								<p class=\"msonormal\" align=\"left\" style=\"text-indent:28.5pt;\">\r\n									<span style=\"font-size:12pt;font-family:宋体;\">一、《教学信息网络管理系统》登陆网址为<span>http://192.21.100.3:8090/</span>，用户名为本人中文姓名（任课教师、学生教学信息员），初始密码为<span>12345</span>（登录后可自行更改密码）。<span></span></span>\r\n								</p>\r\n								<p class=\"msonormal\" align=\"left\" style=\"text-indent:28.5pt;\">\r\n									<span style=\"font-size:12pt;font-family:宋体;\">二、学生教学信息员应当收集和整理所在班级学生对任课教师反映的意见和建议等教学信息，并按时登陆《教学信息网络管理系统》，用<b>中文</b>客观、准确地反映教学信息（反馈方法为：①输入网址并进入网页“<span>http://192.21.100.3:8090/</span>” →②输入用户名和密码→③点击“确认”进入学生留言界面→④在学生留言界面选择任课教师和课程名称<span>,</span>“在留言界面输入反映的内容”→ ⑤点击“提交”，即完成反映→⑥若继续对下一位教师反映教学信息，可点击“继续留言”）。本学期学生教学信息员反映教学信息的时间为<b><span>11</span>月<span>21</span>日至<span>12</span>月<span>2</span>日</b>。<span></span></span>\r\n								</p>\r\n								<p class=\"msonormal\" align=\"left\" style=\"text-indent:28.5pt;\">\r\n									<span style=\"font-size:12pt;font-family:宋体;\">三、任课教师（选修课、体育课任课教师除外）应当高度重视教学信息反馈工作，按时登陆《教学信息网络管理系统》，用<b>中文</b>反馈学生教学信息员反映的教学信息（反馈方法为：①输入网址并进入网页“<span>http://192.21.100.3:8090/</span>” →②输入用户名和密码→③点击“确认”进入教师留言信息一览表→④在教师留言信息一览表中查看学生留言信息并点击“反馈”进入反馈界面<span>,</span>输入“反馈内容”→ ⑤点击“提交”，即完成反馈）。本学期任课教师反馈教学信息的时间为<b><span>12</span>月<span>5</span>日至<span>16</span>日。<span></span></b></span>\r\n								</p>\r\n								<p class=\"msonormal\" align=\"left\" style=\"text-indent:28.5pt;\">\r\n									<span style=\"font-size:12pt;font-family:宋体;\">四、任课教师和学生教学信息员可在校内或校外登陆系统。任课教师、学生教学信息员若在反映和反馈教学信息过程中遇到系统本身的技术问题，可与系统管理员祝老师联系，联系电话为<span>87983355</span>。<span></span></span>\r\n								</p>\r\n							</td>\r\n						</tr>\r\n						<tr>\r\n							<td height=\"10%\" align=\"right\">\r\n								<table height=\"100%\">\r\n									<tbody>\r\n										<tr>\r\n											<td height=\"100%\" style=\"font-size:16px;\">\r\n												教务处\r\n											</td>\r\n										</tr>\r\n									</tbody>\r\n								</table>\r\n							</td>\r\n						</tr>\r\n						<tr>\r\n							<td height=\"10%\" align=\"right\">\r\n								<table height=\"100%\">\r\n									<tbody>\r\n										<tr>\r\n											<td height=\"100%\">\r\n												2016-11-22 09:50:24\r\n											</td>\r\n										</tr>\r\n									</tbody>\r\n								</table>\r\n							</td>\r\n						</tr>\r\n					</tbody>\r\n				</table>\r\n			</td>\r\n		</tr>\r\n		<tr>\r\n			<td height=\"5\">\r\n				<br />\r\n			</td>\r\n		</tr>\r\n	</tbody>\r\n</table>\r\n<br />', '2018-03-10', '张三', '0');
INSERT INTO `news` VALUES ('24', '关于做好2016学年度上学期公共选修课教学工作的通知', '<table width=\"100%\" height=\"100%\" cellspacing=\"0\" cellpadding=\"0\" align=\"center\">\r\n	<tbody>\r\n		<tr>\r\n			<td height=\"10px\" align=\"center\">\r\n				<table width=\"100%\">\r\n					<tbody>\r\n						<tr>\r\n							<td height=\"5px\" align=\"center\">\r\n								<span id=\"lbl_title\" style=\"color:#ff0000;font-weight:bolder;\">关于做好2016学年度上学期公共选修课教学工作的通知</span>\r\n							</td>\r\n						</tr>\r\n						<tr>\r\n							<td width=\"100%\" height=\"1px\" valign=\"top\" align=\"center\">\r\n								<hr />\r\n							</td>\r\n						</tr>\r\n					</tbody>\r\n				</table>\r\n			</td>\r\n		</tr>\r\n		<tr>\r\n			<td valign=\"top\" align=\"center\" colspan=\"2\">\r\n				<table width=\"100%\" height=\"100%\" border=\"0\" cellspacing=\"0\" cellpadding=\"0\" align=\"center\" class=\"ke-zeroborder\">\r\n					<tbody>\r\n						<tr>\r\n							<td width=\"100%\">\r\n								下载附件：&nbsp;<span id=\"lbl_down\" style=\"color:#0000ff;\">2016-2017（1）公选课表.xls</span>\r\n							</td>\r\n						</tr>\r\n						<tr>\r\n							<td valign=\"top\" align=\"left\" width=\"100%\" style=\"font-size:14px;\">\r\n								&nbsp;\r\n								<p class=\"msonormal\" align=\"left\">\r\n									<span style=\"font-family:宋体;\">各系<span>(</span>部<span>)</span>、各任课教师、各学生班：<span></span></span>\r\n								</p>\r\n								<p class=\"msonormal\" align=\"left\" style=\"text-indent:21pt;\">\r\n									<span style=\"font-family:宋体;\">为做好<span>2016</span>学年度上学期公共选修课教学工作，现将有关事宜通知如下：<span></span></span>\r\n								</p>\r\n								<p class=\"msonormal\" align=\"left\" style=\"text-indent:21pt;\">\r\n									<span style=\"font-family:宋体;\">一、教学管理工作<span></span></span>\r\n								</p>\r\n								<p class=\"msonormal\" align=\"left\" style=\"text-indent:21pt;\">\r\n									<span style=\"font-family:宋体;\">1.2016</span><span style=\"font-family:宋体;\">学年度上学期公共选修课上课（含考核）时间为<span>2-15</span>周。任课教师应当于上课（考核）时间内完成选修课的授课、考核、成绩评定等教学环节的各项工作。同时，任课教师应加强对所任选修课程的教学管理，认真备课，尤其应当加强学生上课的管理，切实维护课堂教学秩序，促进学风建设。<span></span></span>\r\n								</p>\r\n								<p class=\"msonormal\" align=\"left\" style=\"text-indent:21pt;\">\r\n									<span style=\"font-family:宋体;\">2.</span><span style=\"font-family:宋体;\">承担公共选修课教师不得随意调课和停课。学生必须按选课要求办理选课手续后，方可参与选修课程的学习和考核。同时，学生必须按照选修课教学要求，认真学习选修课程，不得随意缺课。否则，不得参加选修课程考核，不给予记载成绩和学分。<span></span></span>\r\n								</p>\r\n								<p class=\"msonormal\" align=\"left\" style=\"text-indent:21pt;\">\r\n									<span style=\"font-family:宋体;\">3.</span><span style=\"font-family:宋体;\">公共选修课程教学管理负责人为</span><span style=\"font-family:宋体;\">教务处祝老师，有关选修课程教学和选课等问题，任课教师和学生均可向祝老师咨询，电话<span>87983355</span>。<span></span></span>\r\n								</p>\r\n								<p class=\"msonormal\" style=\"text-indent:21pt;\">\r\n									<span style=\"font-family:宋体;\">二、学生选课时间、方法和程序<span></span></span>\r\n								</p>\r\n								<p class=\"msonormal\" style=\"text-indent:21pt;\">\r\n									<span style=\"font-family:宋体;\">1.</span><span style=\"font-family:宋体;\">选课时间<span></span></span>\r\n								</p>\r\n								<p class=\"msonormal\" style=\"text-indent:21pt;\">\r\n									<span style=\"font-family:宋体;\">2016</span><span style=\"font-family:宋体;\">学年度上学期公共选修课学生网上选课时间为<span>2016</span>年<span>9</span>月<span>1</span>日<span>13:00-9</span>月<span>2</span>日<span>22:30</span>，学生必须于选课时间内选课，逾期不再予以安排选课。<span></span></span>\r\n								</p>\r\n								<p class=\"msonormal\" style=\"text-indent:21pt;\">\r\n									<span style=\"font-family:宋体;\">2.</span><span style=\"font-family:宋体;\">方法和程序<span></span></span>\r\n								</p>\r\n								<p class=\"msonormal\" style=\"text-indent:21pt;\">\r\n									<span style=\"font-family:宋体;\">①</span><span style=\"font-family:宋体;\">打开浏览器，在地址栏输入网址：</span>&nbsp;<span><a href=\"http://192.21.100.7:8081/jwweb\"><span style=\"color:purple;\">http://192.21.100.7:8081/jwweb</span></a>&nbsp;</span><span style=\"font-family:宋体;\">（内网）或者</span><span><a href=\"http://192.21.100.8:8081/jwweb\">http://192.21.100.8:8081/jwweb</a></span><span style=\"font-family:宋体;\">（内网），</span><span style=\"font-family:宋体;\">点击“用户登录”，接着选择“身份”－“学生”，并输入学生本人的学号、密码以及验证码，然后点击登录进入系统。<span></span></span>\r\n								</p>\r\n								<p class=\"msonormal\" style=\"text-indent:21pt;\">\r\n									<span style=\"font-family:宋体;\">②点击系统左侧“网上选课”，进入网上选课页面→点击“正选”按钮→选择选修课程范围“<b>主修（公共任选）</b>”→点击“检索”。<span></span></span>\r\n								</p>\r\n								<p class=\"msonormal\" style=\"text-indent:21pt;\">\r\n									<span style=\"font-family:宋体;\">③点击课程右面的“选择”按钮进行“选定”选修班级→完成后点击“确定”。<span></span></span>\r\n								</p>\r\n								<p class=\"msonormal\" style=\"text-indent:21pt;\">\r\n									<span style=\"font-family:宋体;\">④把所选择的课程用“√”选定后点击“提交”按钮进行提交（每名学生只能选一门课程，如选两门，其中一门将作无效处理）。<b><u>学生不得选修已经修读且取得有效成绩的课程。否则，按选课无效处理。<span></span></u></b></span>\r\n								</p>\r\n								<p class=\"msonormal\" style=\"text-indent:21pt;\">\r\n									<span style=\"font-family:宋体;\">⑤提交后务必留意查看课程的提交信息，确认选课成功与否及原因。<span></span></span>\r\n								</p>\r\n								<p class=\"msonormal\" style=\"text-indent:21pt;\">\r\n									<span style=\"font-family:宋体;\">⑥要退选课程的学生，进入“退选”用“√”选定退选课程，点击右上侧的“退选”按钮进行退选。退选后学生可再按选课程序选修其它课程。<span></span></span>\r\n								</p>\r\n								<p class=\"msonormal\" style=\"text-indent:21pt;\">\r\n									<span style=\"font-family:宋体;\">⑦<b><u>退出系统后，学生应重新登录查看正选，以最终确定已选定选修课程</u>。</b><span></span></span>\r\n								</p>\r\n								<p class=\"msonormal\" style=\"text-indent:21pt;\">\r\n									<span style=\"font-family:宋体;\">附件：华南农业大学珠江学院任选课表（<span>2016</span>学年度上学期）<span></span></span>\r\n								</p>\r\n							</td>\r\n						</tr>\r\n						<tr>\r\n							<td height=\"10%\" align=\"right\">\r\n								<table height=\"100%\">\r\n									<tbody>\r\n										<tr>\r\n											<td height=\"100%\" style=\"font-size:16px;\">\r\n												教务处\r\n											</td>\r\n										</tr>\r\n									</tbody>\r\n								</table>\r\n							</td>\r\n						</tr>\r\n						<tr>\r\n							<td height=\"10%\" align=\"right\">\r\n								<table height=\"100%\">\r\n									<tbody>\r\n										<tr>\r\n											<td height=\"100%\">\r\n												2016-08-30 09:48:27\r\n											</td>\r\n										</tr>\r\n									</tbody>\r\n								</table>\r\n							</td>\r\n						</tr>\r\n					</tbody>\r\n				</table>\r\n			</td>\r\n		</tr>\r\n		<tr>\r\n			<td height=\"5\">\r\n				<br />\r\n			</td>\r\n		</tr>\r\n	</tbody>\r\n</table>\r\n<br />', '2018-03-10', '张三', '0');
INSERT INTO `news` VALUES ('25', '关于做好2016-2017学年第一学期公共选修课申报工作的通知', '<table width=\"100%\" height=\"100%\" cellspacing=\"0\" cellpadding=\"0\" align=\"center\">\r\n	<tbody>\r\n		<tr>\r\n			<td height=\"10px\" align=\"center\">\r\n				<table width=\"100%\">\r\n					<tbody>\r\n						<tr>\r\n							<td height=\"5px\" align=\"center\">\r\n								<span id=\"lbl_title\" style=\"color:#ff0000;font-weight:bolder;\">关于做好2016-2017学年第一学期公共选修课申报工作的通知</span>\r\n							</td>\r\n						</tr>\r\n						<tr>\r\n							<td width=\"100%\" height=\"1px\" valign=\"top\" align=\"center\">\r\n								<hr />\r\n							</td>\r\n						</tr>\r\n					</tbody>\r\n				</table>\r\n			</td>\r\n		</tr>\r\n		<tr>\r\n			<td valign=\"top\" align=\"center\" colspan=\"2\">\r\n				<table width=\"100%\" height=\"100%\" border=\"0\" cellspacing=\"0\" cellpadding=\"0\" align=\"center\" class=\"ke-zeroborder\">\r\n					<tbody>\r\n						<tr>\r\n							<td width=\"100%\">\r\n								下载附件：&nbsp;<span id=\"lbl_down\" style=\"color:#0000ff;\">华南农业大学珠江学院公共选修课开课申请表.doc</span>\r\n							</td>\r\n						</tr>\r\n						<tr>\r\n							<td valign=\"top\" align=\"left\" width=\"100%\" style=\"font-size:14px;\">\r\n								&nbsp;&nbsp;&nbsp;\r\n								<p class=\"msonormal\">\r\n									<span style=\"font-size:12pt;line-height:24px;font-family:宋体;\">各系（部）、各单位：<span></span></span>\r\n								</p>\r\n								<p class=\"msonormal\" style=\"text-indent:24pt;\">\r\n									<span style=\"font-size:12pt;line-height:24px;font-family:宋体;\">为做好<span>2016-2017</span>学年第一学期公共选修课申报工作，现将有关事宜通知如下：<span></span></span>\r\n								</p>\r\n								<p class=\"msonormal\" style=\"text-indent:24pt;\">\r\n									<span style=\"font-size:12pt;line-height:24px;font-family:宋体;\">一、申报条件<span></span></span>\r\n								</p>\r\n								<p class=\"msonormal\" style=\"text-indent:24pt;\">\r\n									<span style=\"font-size:12pt;line-height:24px;font-family:宋体;\">1.</span><span style=\"font-size:12pt;line-height:24px;font-family:宋体;\">申报教师应当具有良好的职业道德和敬业精神，能胜任本科专业学生公共选修课的教学工作。<span></span></span>\r\n								</p>\r\n								<p class=\"msonormal\" style=\"text-indent:24pt;\">\r\n									<span style=\"font-size:12pt;line-height:24px;font-family:宋体;\">2.</span><span style=\"font-size:12pt;line-height:24px;font-family:宋体;\">申报课程应当体现本科应用型人才培养目标定位，能够开拓学生视野、增强学生创新创业思维和培养学生专业应用能力以及提升学生综合素质。<span></span></span>\r\n								</p>\r\n								<p class=\"msonormal\" style=\"text-indent:24pt;\">\r\n									<span style=\"font-size:12pt;line-height:24px;font-family:宋体;\">3.</span><span style=\"font-size:12pt;line-height:24px;font-family:宋体;\">除有专业特长外，申报教师应具有普通全日制学士（含学士）以上学位。<span></span></span>\r\n								</p>\r\n								<p class=\"msonormal\" style=\"text-indent:24pt;\">\r\n									<span style=\"font-size:12pt;line-height:24px;font-family:宋体;\">二、具体要求<span></span></span>\r\n								</p>\r\n								<p class=\"msonormal\" style=\"text-indent:24pt;\">\r\n									<span style=\"font-size:12pt;line-height:24px;font-family:宋体;\">1.</span><span style=\"font-size:12pt;line-height:24px;font-family:宋体;\">各系（部）、各单位应当高度重视公共选修课的申报工作，认真组织</span><span style=\"font-size:12pt;line-height:24px;font-family:宋体;\">符合条件的教师或行政管理人员申报，以充实公共选修课程资源。同时，</span><span style=\"font-size:12pt;line-height:24px;font-family:宋体;\">按照课程归口管理原则，各系（部）、各单位应当对申报教师或行政管理人员及其申报课程进行评估和审核，以确保公共选修课程质量。</span><span style=\"font-size:12pt;line-height:24px;font-family:宋体;\"></span>\r\n								</p>\r\n								<p class=\"msonormal\" style=\"text-indent:24pt;\">\r\n									<span style=\"font-size:12pt;line-height:24px;font-family:宋体;\">2.2016-2017</span><span style=\"font-size:12pt;line-height:24px;font-family:宋体;\">学年第一学期公共选修课教学时间拟为<span>2-15</span>周，其中<span>15</span>周为考核时间。选修课</span><span style=\"font-size:12pt;line-height:24px;font-family:宋体;\">课时不得超过</span><span style=\"font-size:12pt;line-height:24px;font-family:宋体;\">28</span><span style=\"font-size:12pt;line-height:24px;font-family:宋体;\">学时。</span><span style=\"font-size:12pt;line-height:24px;font-family:宋体;\"></span>\r\n								</p>\r\n								<p class=\"msonormal\" style=\"text-indent:24pt;\">\r\n									<span style=\"font-size:12pt;line-height:24px;font-family:宋体;\">3.</span><span style=\"font-size:12pt;line-height:24px;font-family:宋体;\">申报教师或行政管理人员应当规范填写《公共选修课开课申请表》，并提供该课程的内容简介、教学大纲、教学进程表等教学文件和课程建设资料。各系（部）、各单位应当将审核通过的公共选修课申报材料统一于<span>6</span>月<span>3</span>日前送教务处，以便由教务处组织评估和审核。<span></span></span>\r\n								</p>\r\n								<p class=\"msonormal\" style=\"text-indent:24pt;\">\r\n									<span style=\"font-size:12pt;line-height:24px;font-family:宋体;\">附件：公共选修课开课申请表<span></span></span>\r\n								</p>\r\n								<p class=\"msonormal\">\r\n									<span style=\"font-size:12pt;line-height:24px;font-family:宋体;\">&nbsp;</span>\r\n								</p>\r\n								<p class=\"msonormal\" align=\"left\" style=\"text-indent:24pt;\">\r\n									<span style=\"font-size:12pt;line-height:24px;font-family:宋体;\">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</span>\r\n								</p>\r\n							</td>\r\n						</tr>\r\n						<tr>\r\n							<td height=\"10%\" align=\"right\">\r\n								<table height=\"100%\">\r\n									<tbody>\r\n										<tr>\r\n											<td height=\"100%\" style=\"font-size:16px;\">\r\n												教务处\r\n											</td>\r\n										</tr>\r\n									</tbody>\r\n								</table>\r\n							</td>\r\n						</tr>\r\n						<tr>\r\n							<td height=\"10%\" align=\"right\">\r\n								<table height=\"100%\">\r\n									<tbody>\r\n										<tr>\r\n											<td height=\"100%\">\r\n												2016-05-11 16:34:09\r\n											</td>\r\n										</tr>\r\n									</tbody>\r\n								</table>\r\n							</td>\r\n						</tr>\r\n					</tbody>\r\n				</table>\r\n			</td>\r\n		</tr>\r\n		<tr>\r\n			<td height=\"5\">\r\n				<br />\r\n			</td>\r\n		</tr>\r\n	</tbody>\r\n</table>\r\n<br />', '2018-03-10', '张三', '0');
INSERT INTO `news` VALUES ('26', '通识教育网络视频课程简介', '<table width=\"100%\" height=\"100%\" cellspacing=\"0\" cellpadding=\"0\" align=\"center\">\r\n	<tbody>\r\n		<tr>\r\n			<td height=\"10px\" align=\"center\">\r\n				<table width=\"100%\">\r\n					<tbody>\r\n						<tr>\r\n							<td height=\"5px\" align=\"center\">\r\n								<span id=\"lbl_title\" style=\"color:#ff0000;font-weight:bolder;\">通识教育网络视频课程简介</span> \r\n							</td>\r\n						</tr>\r\n						<tr>\r\n							<td width=\"100%\" height=\"1px\" valign=\"top\" align=\"center\">\r\n								<hr />\r\n							</td>\r\n						</tr>\r\n					</tbody>\r\n				</table>\r\n			</td>\r\n		</tr>\r\n		<tr>\r\n			<td valign=\"top\" align=\"center\" colspan=\"2\">\r\n				<table width=\"100%\" height=\"100%\" border=\"0\" cellspacing=\"0\" cellpadding=\"0\" align=\"center\" class=\"ke-zeroborder\">\r\n					<tbody>\r\n						<tr>\r\n							<td width=\"100%\">\r\n							</td>\r\n						</tr>\r\n						<tr>\r\n							<td valign=\"top\" align=\"left\" width=\"100%\" style=\"font-size:14px;\">\r\n								<p class=\"msonormal\">\r\n									<b><span style=\"line-height:28px;background:#e5e5e5;font-size:14pt;\">1</span></b><b><span style=\"line-height:28px;font-family:宋体;background:#e5e5e5;font-size:14pt;\">、儒学与生活</span></b><b><span style=\"line-height:28px;background:#e5e5e5;font-size:14pt;\"></span></b> \r\n								</p>\r\n								<p class=\"msonormal\">\r\n									<b><span style=\"line-height:24px;font-family:宋体;font-size:12pt;\">课程简介：</span></b><b><span style=\"line-height:24px;font-size:12pt;\"></span></b> \r\n								</p>\r\n								<p class=\"msonormal\" style=\"text-indent:21pt;\">\r\n									<span>&nbsp;</span><span style=\"font-family:宋体;\">本系列介绍了黄玉顺老师对于儒学与生活的一些具体理解，其内容主要包括周易概说、中庸、孔子、孟子、大学净胜、儒学与生活、儒学与中国、爱，所以在几个方面，表述了生活儒学是对儒学的一种当代阐释，主要是通过追溯当代前沿的哲学思想观念，然后回溯到儒学的孔孟之道——原典儒学，由此重建儒学的一种新的当代形态，以切入我们当下的现实生活。是对生活儒学的基本观念的阐述，具有一定的</span><span>...</span> \r\n								</p>\r\n								<p class=\"msonormal\">\r\n									<b><span style=\"line-height:24px;font-family:宋体;font-size:12pt;\">主讲人简介：</span></b><b><span style=\"line-height:24px;font-size:12pt;\"></span></b> \r\n								</p>\r\n								<p class=\"msonormal\" style=\"text-indent:21pt;\">\r\n									<span style=\"font-family:宋体;\">黄玉顺，当代中国“儒学复兴运动”代表人物之一，在海内外具有广泛影响。当今儒学重要学派“生活儒学”创立者；易学重大成果“易经古歌”发现者、诠释者；哲学最新研究领域“儒学与现象学比较研究”开拓者之一；中国政治哲学最新研究领域“中国正义论”提出者。中国社会科学院哲学博士。现任：山东大学儒学高等研究院副院长、教授、博士生导师；四川大学博士生导师。</span><span></span> \r\n								</p>\r\n								<p class=\"msonormal\">\r\n									<b><span style=\"line-height:28px;background:#e5e5e5;font-size:14pt;\">2</span></b><b><span style=\"line-height:28px;font-family:宋体;background:#e5e5e5;font-size:14pt;\">、园林艺术概论</span></b><b><span style=\"line-height:28px;background:#e5e5e5;font-size:14pt;\"></span></b> \r\n								</p>\r\n								<p class=\"msonormal\">\r\n									<b><span style=\"line-height:24px;font-family:宋体;font-size:12pt;\">课程简介：</span></b><b><span style=\"line-height:24px;font-size:12pt;\"></span></b> \r\n								</p>\r\n								<p class=\"msonormal\" style=\"text-indent:21pt;\">\r\n									<span style=\"font-family:宋体;\">园林艺术概论此课程中，唐学山教授重在讲述中国风景园林艺术与设计。讲课方式是通过著名的、典型的园林设计案例来进行分析，介绍中国风景园林的风格、学派等。旨在让学生全面掌握中国风景园林的设计方式，并学会欣赏。</span><span></span> \r\n								</p>\r\n								<p class=\"msonormal\">\r\n									<b><span style=\"line-height:24px;font-family:宋体;font-size:12pt;\">主讲人简介：</span></b><b><span style=\"line-height:24px;font-size:12pt;\"></span></b> \r\n								</p>\r\n								<p class=\"msonormal\" style=\"text-indent:21pt;\">\r\n									<span style=\"font-family:宋体;\">唐学山：全国园林专业指导委员会委员；建设部风景园林专家顾问；中外园林总公司顾问；《中国园林杂志》顾问编委。</span><span></span> \r\n								</p>\r\n								<p class=\"msonormal\">\r\n									<b><span style=\"line-height:28px;background:#e5e5e5;font-size:14pt;\">3</span></b><b><span style=\"line-height:28px;font-family:宋体;background:#e5e5e5;font-size:14pt;\">、逻辑和批判性思维</span></b><b><span style=\"line-height:28px;background:#e5e5e5;font-size:14pt;\"></span></b> \r\n								</p>\r\n								<p class=\"msonormal\">\r\n									<b><span style=\"line-height:24px;font-family:宋体;font-size:12pt;\">课程简介：</span></b><b><span style=\"line-height:24px;font-size:12pt;\"></span></b> \r\n								</p>\r\n								<p class=\"msonormal\" style=\"text-indent:21pt;\">\r\n									<span style=\"font-family:宋体;\">《逻辑和批判性思维》先介绍推理，后介绍论证，系统论述了逻辑和批判性思维。在推理部分，先考察演绎推理再考祭归纳推理，先考察简单句的推理，再考察复合句的推理，最后是考察如何推出结论的一些重要方法。在论证部分，先考察对论证的削弱、加强和假设，后考察解释和评价，最后考察论证的有效性分析。</span><span>&nbsp;</span> \r\n								</p>\r\n								<p class=\"msonormal\">\r\n									<b><span style=\"line-height:24px;font-family:宋体;font-size:12pt;\">主讲人简介：</span></b><b><span style=\"line-height:24px;font-size:12pt;\"></span></b> \r\n								</p>\r\n								<p class=\"msonormal\" style=\"text-indent:21pt;\">\r\n									<span style=\"font-family:宋体;\">杨武金：逻辑学博士，中国社会科学院逻辑学专业博士后，中国人民大学哲学院教授，硕士生导师；兼任北京市逻辑学会秘书长，中国辩证逻辑专业委员会秘书长，中华考试网讲师。</span><b><span style=\"background:#e5e5e5;font-size:14pt;\"></span></b> \r\n								</p>\r\n								<p class=\"msonormal\">\r\n									<b><span style=\"line-height:28px;background:#e5e5e5;font-size:14pt;\">4</span></b><b><span style=\"line-height:28px;font-family:宋体;background:#e5e5e5;font-size:14pt;\">、中国经济热点问题研究</span></b><b><span style=\"line-height:28px;background:#e5e5e5;font-size:14pt;\"></span></b> \r\n								</p>\r\n								<p class=\"msonormal\">\r\n									<b><span style=\"line-height:24px;font-family:宋体;font-size:12pt;\">课程简介：</span></b><b><span style=\"line-height:24px;font-size:12pt;\"></span></b> \r\n								</p>\r\n								<p class=\"msonormal\" style=\"text-indent:21pt;\">\r\n									<span style=\"font-family:宋体;\">温铁军</span><span style=\"font-family:宋体;\">教授有着</span><span>11</span><span style=\"font-family:宋体;\">年基层工农兵经历和</span><span>20</span><span style=\"font-family:宋体;\">多年政策研究经历。</span><span>1998</span><span style=\"font-family:宋体;\">年获国务院授予的“政府特殊津贴专家”证书，温铁军认为，整个第三世界，本来就没有西方主流意识形态中孤立存在的农业问题。发展中国家首先考虑的是农民生计问题，其次才是农村可持续发展问题和农业稳定问题。他独到的视角、新颖的见解、深刻的思想以及充盈在字里行间的忧国忧民之情，让不少中国人牢牢记住了他的名字</span><span>...</span> \r\n								</p>\r\n								<p class=\"msonormal\">\r\n									<b><span style=\"line-height:24px;font-family:宋体;font-size:12pt;\">主讲人简介：</span></b><b><span style=\"line-height:24px;font-size:12pt;\"></span></b> \r\n								</p>\r\n								<p class=\"msonormal\" style=\"text-indent:21pt;\">\r\n									<span style=\"font-family:宋体;\">温铁军：男，汉族，祖籍河北昌黎，</span><span>1951</span><span style=\"font-family:宋体;\">年</span><span>5</span><span style=\"font-family:宋体;\">月出生于北京。农业部农村经济研究中心研究员，科研处长，学术委员会委员。政府特殊津贴专家。</span><span>1979</span><span style=\"font-family:宋体;\">－</span><span>83</span><span style=\"font-family:宋体;\">年，中国人民大学新闻系本科学习期满，获法学士学位。</span><span>1987</span><span style=\"font-family:宋体;\">年公派赴美国密执安大学社会调查研究所</span><span>(isr)</span><span style=\"font-family:宋体;\">和世界银行进修，获抽样调查专业结业证书。</span><span>1991</span><span style=\"font-family:宋体;\">年，自费公派赴美国哥伦比亚大学进修，并到康奈尔大学和南加州大学讲学交流，其间参加密执安大学夏季学院量化分析培训，获</span><span>icpsr</span><span style=\"font-family:宋体;\">（国际社科联）颁发的统计分析专业结业证书。</span><span>1995</span><span style=\"font-family:宋体;\">－</span><span>99</span><span style=\"font-family:宋体;\">年，在中国农业大学研究生院和经管学院在职攻读硕士、博士学位，</span><span>1996</span><span style=\"font-family:宋体;\">年</span><span>7</span><span style=\"font-family:宋体;\">月</span><span>-97</span><span style=\"font-family:宋体;\">年</span><span>2</span><span style=\"font-family:宋体;\">月通过硕士研究生必修课考试和教委外语统考后转修博士课程，</span><span>1998</span><span style=\"font-family:宋体;\">年</span><span>7</span><span style=\"font-family:宋体;\">月修满学分通过各科考试获得博士论文答辩资格。温铁军</span><span>1983</span><span style=\"font-family:宋体;\">年毕业分配到中央军委总政治部研究室。</span><span>1985</span><span style=\"font-family:宋体;\">年末调入中央农村政策研究室、国务院农村发展研究中心联络室从事农村调查研究工作。</span><span>1987</span><span style=\"font-family:宋体;\">年全国农村改革试验区办公室正式组建后调入，</span><span>1988</span><span style=\"font-family:宋体;\">年任监测处副处长，</span><span>1993</span><span style=\"font-family:宋体;\">年任调研处长，</span><span>1995</span><span style=\"font-family:宋体;\">年任主持工作的副主任，</span><span>1998</span><span style=\"font-family:宋体;\">年试验区办公室机构变动，调任农研中心科研处长，现任中国经济体制改革研究会副秘书长。主要研究课题与成果包括：国情与增长、农村产权问题、乡镇企业与小城镇发展、农村政治体制与税费改革、农业的稳定性等问题。曾经获国务院农研中心、国家体改委、国家科委等中央五单位联合颁发的“农村改革十周年优秀论文奖”、农业部农研中心优秀科研成果一等奖等多项奖励，</span><span>1998</span><span style=\"font-family:宋体;\">年获国务院授予的“政府特殊津贴专家”证书。</span><b><span style=\"font-size:12pt;\"></span></b> \r\n								</p>\r\n								<p class=\"msonormal\">\r\n									<b><span style=\"background:#e5e5e5;font-size:14pt;\">5</span></b><b><span style=\"font-family:宋体;background:#e5e5e5;font-size:14pt;\">、心理、行为与文化</span></b><b><span style=\"background:#e5e5e5;font-size:14pt;\"></span></b> \r\n								</p>\r\n								<p class=\"msonormal\">\r\n									<b><span style=\"line-height:24px;font-family:宋体;font-size:12pt;\">课程简介：</span></b><b><span style=\"line-height:24px;font-size:12pt;\"></span></b> \r\n								</p>\r\n								<p class=\"msonormal\" style=\"text-indent:21pt;\">\r\n									<span style=\"font-family:宋体;\">本系列介绍了本系列介绍了心理、行为与文化，此课程共有有八章，在此系列中主讲人主要讲了方法及意义、社会要求、</span><span>psh</span><span style=\"font-family:宋体;\">原理、亲属集团、次级集团与人际关系、交换模式六章内容。</span><span></span> \r\n								</p>\r\n								<p class=\"msonormal\">\r\n									<b><span style=\"line-height:24px;font-family:宋体;font-size:12pt;\">主讲人简介：</span></b><b><span style=\"line-height:24px;font-size:12pt;\"></span></b> \r\n								</p>\r\n								<p class=\"msonormal\">\r\n									<span style=\"font-family:宋体;\">尚会鹏：北京大学国际关系学院教授、博士生导师。主要从事印度社会与文化，比较社会文化研究，对日本也政治与文化也有所涉猎，主要著作有《印度文化史》、《种姓与印度教社会》、《中国人与日本人：社会集团、行为方式和文化心理的比较研究》等。</span> \r\n								</p>\r\n							</td>\r\n						</tr>\r\n						<tr>\r\n							<td height=\"10%\" align=\"right\">\r\n								<table height=\"100%\">\r\n									<tbody>\r\n										<tr>\r\n											<td height=\"100%\" style=\"font-size:16px;\">\r\n												教务处\r\n											</td>\r\n										</tr>\r\n									</tbody>\r\n								</table>\r\n							</td>\r\n						</tr>\r\n						<tr>\r\n							<td height=\"10%\" align=\"right\">\r\n								<table height=\"100%\">\r\n									<tbody>\r\n										<tr>\r\n											<td height=\"100%\">\r\n												2014-03-04 09:46:59\r\n											</td>\r\n										</tr>\r\n									</tbody>\r\n								</table>\r\n							</td>\r\n						</tr>\r\n					</tbody>\r\n				</table>\r\n			</td>\r\n		</tr>\r\n		<tr>\r\n			<td height=\"5\">\r\n				<br />\r\n			</td>\r\n		</tr>\r\n	</tbody>\r\n</table>\r\n<br />', '2018-03-24', '张三', '0');
INSERT INTO `news` VALUES ('30', '实习模板下载', '<a class=\"ke-insertfile\" href=\"/yuanzhipeng/btjx/edit_file/file/20180324/20180324122318_65100.doc\" target=\"_blank\">实习报告模板</a>', '2018-03-24', '管理员', '0');

-- ----------------------------
-- Table structure for `reply`
-- ----------------------------
DROP TABLE IF EXISTS `reply`;
CREATE TABLE `reply` (
  `id` int(255) NOT NULL AUTO_INCREMENT,
  `username` varchar(20) CHARACTER SET utf8 DEFAULT NULL,
  `sender` varchar(10) CHARACTER SET utf8 DEFAULT NULL,
  `sendee` varchar(15) COLLATE utf8_unicode_ci DEFAULT NULL,
  `rpname` varchar(10) COLLATE utf8_unicode_ci DEFAULT NULL,
  `title` varchar(20) COLLATE utf8_unicode_ci DEFAULT NULL,
  `content` text CHARACTER SET utf8,
  `date` datetime DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `username` (`username`,`sendee`)
) ENGINE=MyISAM AUTO_INCREMENT=12 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- ----------------------------
-- Records of reply
-- ----------------------------
INSERT INTO `reply` VALUES ('1', '201425220147', '朱志斌', '003', null, null, '好的知道啦 李四', '2017-11-24 17:21:42');
INSERT INTO `reply` VALUES ('4', '201425220147', '朱志斌', '005', null, null, '收到就好啦~~', '2018-03-18 16:04:13');
INSERT INTO `reply` VALUES ('9', '201425220147', '朱志斌', '004', '张三', '速度', '按时', '2018-03-18 16:26:21');
INSERT INTO `reply` VALUES ('10', '1300', 'xx老师', '201425220147', '朱志斌', '怎么了？', '找老师有事吗？', '2018-03-18 16:34:31');
INSERT INTO `reply` VALUES ('11', '201425220147', '朱志斌', '1300', 'xx老师', '回复标题', '没有就是问问你有没有空', '2018-03-18 16:43:18');

-- ----------------------------
-- Table structure for `role`
-- ----------------------------
DROP TABLE IF EXISTS `role`;
CREATE TABLE `role` (
  `id` int(10) NOT NULL AUTO_INCREMENT,
  `role_id` int(10) DEFAULT NULL,
  `role` varchar(10) CHARACTER SET utf8 DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=5 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- ----------------------------
-- Records of role
-- ----------------------------
INSERT INTO `role` VALUES ('1', '1', '学生');
INSERT INTO `role` VALUES ('2', '2', '教师');
INSERT INTO `role` VALUES ('3', '3', '审核员');
INSERT INTO `role` VALUES ('4', '4', '管理员');

-- ----------------------------
-- Table structure for `status`
-- ----------------------------
DROP TABLE IF EXISTS `status`;
CREATE TABLE `status` (
  `id` int(255) NOT NULL AUTO_INCREMENT,
  `status` varchar(10) CHARACTER SET utf8 DEFAULT '审核中',
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=2 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- ----------------------------
-- Records of status
-- ----------------------------
INSERT INTO `status` VALUES ('1', '审核中');

-- ----------------------------
-- Table structure for `student`
-- ----------------------------
DROP TABLE IF EXISTS `student`;
CREATE TABLE `student` (
  `id` int(255) NOT NULL AUTO_INCREMENT,
  `username` varchar(20) CHARACTER SET utf8 NOT NULL DEFAULT '',
  `password` varchar(10) CHARACTER SET utf8 DEFAULT '123456',
  `name` varchar(10) CHARACTER SET utf8 DEFAULT NULL,
  `sex` varchar(2) CHARACTER SET utf8 DEFAULT NULL,
  `major` varchar(20) CHARACTER SET utf8 DEFAULT NULL,
  `phone` varchar(11) CHARACTER SET utf8 DEFAULT NULL,
  `email` varchar(20) CHARACTER SET utf8 DEFAULT NULL,
  `role_id` int(10) NOT NULL DEFAULT '1',
  `login_num` int(11) unsigned NOT NULL,
  `ip` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `wtime` datetime NOT NULL,
  `z_index` varchar(10) COLLATE utf8_unicode_ci NOT NULL DEFAULT 'no',
  PRIMARY KEY (`username`),
  UNIQUE KEY `index_id` (`id`) USING BTREE,
  UNIQUE KEY `index_username` (`username`) USING BTREE,
  KEY `index_major` (`major`) USING BTREE,
  FULLTEXT KEY `index_name` (`name`)
) ENGINE=MyISAM AUTO_INCREMENT=112 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- ----------------------------
-- Records of student
-- ----------------------------
INSERT INTO `student` VALUES ('1', '201425220147', '960816', '朱志斌', '男', '计算机科学与技术1401班(数字媒体)', '13242301527', '854767470@qq.com', '1', '141', '127.0.0.1', '2018-03-23 10:29:39', 'yes');
INSERT INTO `student` VALUES ('63', '201425220136', '123456', '谢文崇', '女', '计算机科学与技术1401班(数字媒体)', '13245699878', '123@qq.com', '1', '4', '127.0.0.1', '2018-03-24 13:38:47', 'no');
INSERT INTO `student` VALUES ('65', '201425220113', '123456', '李俊杰', '男', '计算机科学与技术1401班(数字媒体)', '13245699878', '123@qq.com', '1', '0', '127.0.0.1', '0000-00-00 00:00:00', 'no');
INSERT INTO `student` VALUES ('66', '201425220144', '123456', '郑哲豪', '男', '计算机科学与技术1401班(数字媒体)', '13245699878', '123@qq.com', '1', '0', '127.0.0.1', '0000-00-00 00:00:00', 'no');
INSERT INTO `student` VALUES ('67', '201425220103', '123456', '陈慧冲', '女', '计算机科学与技术1401班(数字媒体)', '13245699878', '123@qq.com', '1', '0', '127.0.0.1', '0000-00-00 00:00:00', 'no');
INSERT INTO `student` VALUES ('68', '201425220133', '123456', '王国基', '男', '计算机科学与技术1401班(数字媒体)', '13245699878', '123@qq.com', '1', '1', '127.0.0.1', '2018-03-18 13:21:41', 'no');
INSERT INTO `student` VALUES ('69', '201425220104', '123456', '陈宇鹏', '男', '计算机科学与技术1401班(数字媒体)', '13245699878', '123@qq.com', '1', '0', '127.0.0.1', '0000-00-00 00:00:00', 'no');
INSERT INTO `student` VALUES ('70', '201425220107', '123456', '甘汉昌', '男', '计算机科学与技术1401班(数字媒体)', '13245699878', '123@qq.com', '1', '0', '127.0.0.1', '0000-00-00 00:00:00', 'no');
INSERT INTO `student` VALUES ('71', '201425220119', '123456', '李紫娴', '女', '计算机科学与技术1401班(数字媒体)', '13245699878', '123@qq.com', '1', '0', '127.0.0.1', '0000-00-00 00:00:00', 'no');
INSERT INTO `student` VALUES ('72', '201425220128', '123456', '刘俊键', '男', '计算机科学与技术1401班(数字媒体)', '13245699878', '123@qq.com', '1', '0', '127.0.0.1', '0000-00-00 00:00:00', 'no');
INSERT INTO `student` VALUES ('73', '201425220145', '123456', '钟钦海', '男', '计算机科学与技术1401班(数字媒体)', '13245699878', '123@qq.com', '1', '3', '127.0.0.1', '2018-03-20 22:03:43', 'yes');
INSERT INTO `student` VALUES ('74', '201425220114', '123456', '李世欣', '男', '计算机科学与技术1401班(数字媒体)', '13245699878', '123@qq.com', '1', '0', '127.0.0.1', '0000-00-00 00:00:00', 'no');
INSERT INTO `student` VALUES ('75', '201425220127', '123456', '刘键薇', '女', '计算机科学与技术1401班(数字媒体)', '13245699878', '123@qq.com', '1', '0', '127.0.0.1', '0000-00-00 00:00:00', 'no');
INSERT INTO `student` VALUES ('76', '201425220115', '123456', '李小亮', '男', '计算机科学与技术1401班(数字媒体)', '13245699878', '123@qq.com', '1', '0', '127.0.0.1', '0000-00-00 00:00:00', 'no');
INSERT INTO `student` VALUES ('77', '201425220143', '123456', '张炜增', '男', '计算机科学与技术1401班(数字媒体)', '13245699878', '123@qq.com', '1', '0', '127.0.0.1', '0000-00-00 00:00:00', 'no');
INSERT INTO `student` VALUES ('78', '201425220111', '123456', '江文杰', '女', '计算机科学与技术1401班(数字媒体)', '13245699878', '123@qq.com', '1', '0', '127.0.0.1', '0000-00-00 00:00:00', 'no');
INSERT INTO `student` VALUES ('79', '201425220105', '123456', '陈泽伟', '男', '计算机科学与技术1401班(数字媒体)', '13245699878', '123@qq.com', '1', '0', '127.0.0.1', '0000-00-00 00:00:00', 'no');
INSERT INTO `student` VALUES ('80', '201425220146', '123456', '周伟', '男', '计算机科学与技术1401班(数字媒体)', '13245699878', '123@qq.com', '1', '0', '127.0.0.1', '0000-00-00 00:00:00', 'no');
INSERT INTO `student` VALUES ('81', '201425220130', '123456', '刘钰', '男', '计算机科学与技术1401班(数字媒体)', '13245699878', '123@qq.com', '1', '0', '127.0.0.1', '0000-00-00 00:00:00', 'no');
INSERT INTO `student` VALUES ('82', '201425220102', '123456', '陈焕培', '男', '计算机科学与技术1401班(数字媒体)', '13245699878', '123@qq.com', '1', '0', '127.0.0.1', '0000-00-00 00:00:00', 'no');
INSERT INTO `student` VALUES ('83', '201425220124', '123456', '林润杰', '男', '计算机科学与技术1401班(数字媒体)', '13245699878', '123@qq.com', '1', '0', '127.0.0.1', '0000-00-00 00:00:00', 'no');
INSERT INTO `student` VALUES ('84', '201425220121', '123456', '梁育天', '男', '计算机科学与技术1401班(数字媒体)', '13245699878', '123@qq.com', '1', '0', '127.0.0.1', '0000-00-00 00:00:00', 'no');
INSERT INTO `student` VALUES ('85', '201425220108', '123456', '郭健海', '男', '计算机科学与技术1401班(数字媒体)', '13245699878', '123@qq.com', '1', '0', '127.0.0.1', '0000-00-00 00:00:00', 'no');
INSERT INTO `student` VALUES ('86', '201425220125', '123456', '林仰宏', '男', '计算机科学与技术1401班(数字媒体)', '13245699878', '123@qq.com', '1', '0', '127.0.0.1', '0000-00-00 00:00:00', 'no');
INSERT INTO `student` VALUES ('87', '201425220139', '123456', '阳鑫', '男', '计算机科学与技术1401班(数字媒体)', '13245699878', '123@qq.com', '1', '0', '127.0.0.1', '0000-00-00 00:00:00', 'no');
INSERT INTO `student` VALUES ('88', '201425220135', '123456', '肖文悦', '男', '计算机科学与技术1401班(数字媒体)', '13245699878', '123@qq.com', '1', '0', '127.0.0.1', '0000-00-00 00:00:00', 'no');
INSERT INTO `student` VALUES ('89', '201425220131', '123456', '彭子文', '男', '计算机科学与技术1401班(数字媒体)', '13245699878', '123@qq.com', '1', '0', '127.0.0.1', '0000-00-00 00:00:00', 'no');
INSERT INTO `student` VALUES ('90', '201425220140', '123456', '曾城', '男', '计算机科学与技术1401班(数字媒体)', '13245699878', '123@qq.com', '1', '0', '127.0.0.1', '0000-00-00 00:00:00', 'no');
INSERT INTO `student` VALUES ('91', '201425220138', '123456', '杨智钧', '男', '计算机科学与技术1401班(数字媒体)', '13245699878', '123@qq.com', '1', '0', '127.0.0.1', '0000-00-00 00:00:00', 'no');
INSERT INTO `student` VALUES ('92', '201425220132', '123456', '丘雄', '男', '计算机科学与技术1401班(数字媒体)', '13245699878', '123@qq.com', '1', '0', '127.0.0.1', '0000-00-00 00:00:00', 'no');
INSERT INTO `student` VALUES ('93', '201425220112', '123456', '黎传书', '男', '计算机科学与技术1401班(数字媒体)', '13245699878', '123@qq.com', '1', '0', '127.0.0.1', '0000-00-00 00:00:00', 'no');
INSERT INTO `student` VALUES ('94', '201425220123', '123456', '林国洪', '男', '计算机科学与技术1401班(数字媒体)', '13245699878', '123@qq.com', '1', '0', '127.0.0.1', '0000-00-00 00:00:00', 'no');
INSERT INTO `student` VALUES ('95', '201425220134', '123456', '肖帝鑫', '男', '计算机科学与技术1401班(数字媒体)', '13245699878', '123@qq.com', '1', '0', '127.0.0.1', '0000-00-00 00:00:00', 'no');
INSERT INTO `student` VALUES ('96', '201425220129', '123456', '刘远山', '男', '计算机科学与技术1401班(数字媒体)', '13245699878', '123@qq.com', '1', '0', '127.0.0.1', '0000-00-00 00:00:00', 'no');
INSERT INTO `student` VALUES ('97', '201425220122', '123456', '梁志毅', '男', '计算机科学与技术1401班(数字媒体)', '13245699878', '123@qq.com', '1', '0', '127.0.0.1', '0000-00-00 00:00:00', 'no');
INSERT INTO `student` VALUES ('98', '201425220141', '123456', '张钧', '男', '计算机科学与技术1401班(数字媒体)', '13245699878', '123@qq.com', '1', '0', '127.0.0.1', '0000-00-00 00:00:00', 'no');
INSERT INTO `student` VALUES ('99', '201425220109', '123456', '何健平', '男', '计算机科学与技术1401班(数字媒体)', '13245699878', '123@qq.com', '1', '0', '127.0.0.1', '0000-00-00 00:00:00', 'no');
INSERT INTO `student` VALUES ('100', '201425220137', '123456', '谢文杰', '男', '计算机科学与技术1401班(数字媒体)', '13245699878', '123@qq.com', '1', '0', '127.0.0.1', '0000-00-00 00:00:00', 'no');
INSERT INTO `student` VALUES ('101', '201425220120', '123456', '梁家玮', '男', '计算机科学与技术1401班(数字媒体)', '13245699878', '123@qq.com', '1', '0', '127.0.0.1', '0000-00-00 00:00:00', 'no');
INSERT INTO `student` VALUES ('102', '201425220110', '123456', '黄俊恒', '男', '计算机科学与技术1401班(数字媒体)', '13245699878', '123@qq.com', '1', '0', '127.0.0.1', '0000-00-00 00:00:00', 'no');
INSERT INTO `student` VALUES ('103', '201425220142', '123456', '张名绚', '男', '计算机科学与技术1401班(数字媒体)', '13245699878', '123@qq.com', '1', '0', '127.0.0.1', '0000-00-00 00:00:00', 'no');
INSERT INTO `student` VALUES ('104', '201425220106', '123456', '陈懿彬', '男', '计算机科学与技术1401班(数字媒体)', '13245699878', '123@qq.com', '1', '0', '127.0.0.1', '0000-00-00 00:00:00', 'no');
INSERT INTO `student` VALUES ('105', '201425220101', '123456', '蔡潇涛', '男', '计算机科学与技术1401班(数字媒体)', '13245699878', '123@qq.com', '1', '1', '127.0.0.1', '2018-03-18 13:23:59', 'no');
INSERT INTO `student` VALUES ('106', '201425220117', '123456', '李逸', '男', '计算机科学与技术1401班(数字媒体)', '13245699878', '123@qq.com', '1', '0', '127.0.0.1', '0000-00-00 00:00:00', 'no');
INSERT INTO `student` VALUES ('107', '201425220116', '123456', '李亚齐', '男', '计算机科学与技术1401班(数字媒体)', '13245699878', '123@qq.com', '1', '0', '127.0.0.1', '0000-00-00 00:00:00', 'no');

-- ----------------------------
-- Table structure for `teacher`
-- ----------------------------
DROP TABLE IF EXISTS `teacher`;
CREATE TABLE `teacher` (
  `id` int(255) NOT NULL AUTO_INCREMENT,
  `username` varchar(20) CHARACTER SET utf8 NOT NULL,
  `password` int(20) NOT NULL DEFAULT '123456',
  `name` varchar(10) CHARACTER SET utf8 NOT NULL,
  `sex` varchar(2) CHARACTER SET utf8 NOT NULL,
  `major` varchar(50) CHARACTER SET utf8 NOT NULL,
  `phone` varchar(15) CHARACTER SET utf8 NOT NULL,
  `email` varchar(50) CHARACTER SET utf8 NOT NULL,
  `role_id` int(50) NOT NULL DEFAULT '2',
  `login_num` int(11) unsigned NOT NULL,
  `wtime` datetime NOT NULL,
  `ip` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  PRIMARY KEY (`username`),
  UNIQUE KEY `id` (`id`),
  UNIQUE KEY `username` (`username`) USING BTREE
) ENGINE=MyISAM AUTO_INCREMENT=18 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- ----------------------------
-- Records of teacher
-- ----------------------------
INSERT INTO `teacher` VALUES ('1', '1000', '123456', '朱老师', '男', '数字媒体', '13242301527', '18814113493@qq.com', '2', '0', '0000-00-00 00:00:00', '');
INSERT INTO `teacher` VALUES ('2', '1200', '123', '测试', '女', '计科', '13245699878', '18814113493@qq.com', '2', '0', '0000-00-00 00:00:00', '');
INSERT INTO `teacher` VALUES ('3', '1400', '123456', '李老师', '男', '信管 计科', '13245699878', '123@qq.com', '2', '0', '0000-00-00 00:00:00', '');
INSERT INTO `teacher` VALUES ('13', '1300', '123', 'xx老师', '女', '计算机科学与技术', '13245623698', '123@qq.com', '2', '33', '2018-03-24 13:38:15', '127.0.0.1');
INSERT INTO `teacher` VALUES ('14', '1500', '123456', '教师', '男', '计算机', '13245699878', '123@qq.com', '2', '0', '0000-00-00 00:00:00', '');
INSERT INTO `teacher` VALUES ('15', '1600', '123456', '是是是', '男', '计算机科学与技术1401班(数字媒体)', '13245699878', '123@qq.com', '2', '0', '0000-00-00 00:00:00', '127.0.0.1');
INSERT INTO `teacher` VALUES ('17', '1700', '123456', '', '', '', '', '', '2', '0', '0000-00-00 00:00:00', '');

-- ----------------------------
-- Table structure for `topics`
-- ----------------------------
DROP TABLE IF EXISTS `topics`;
CREATE TABLE `topics` (
  `id` int(255) NOT NULL AUTO_INCREMENT,
  `topic_id` varchar(20) CHARACTER SET utf8 NOT NULL,
  `topic_name` varchar(50) CHARACTER SET utf8 NOT NULL,
  `teacher_id` varchar(20) CHARACTER SET utf8 NOT NULL,
  `teacher_name` varchar(20) CHARACTER SET utf8 NOT NULL,
  `class` varchar(20) CHARACTER SET utf8 NOT NULL,
  `topic_type` varchar(15) CHARACTER SET utf8 NOT NULL,
  `content` text COLLATE utf8_unicode_ci NOT NULL,
  `total_stu` int(10) NOT NULL,
  `status` varchar(10) COLLATE utf8_unicode_ci NOT NULL DEFAULT '审核中',
  `z_index` varchar(10) COLLATE utf8_unicode_ci NOT NULL DEFAULT 'no',
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=42 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- ----------------------------
-- Records of topics
-- ----------------------------
INSERT INTO `topics` VALUES ('1', '002', '基于Android实现音乐软件开发', '1004', '朱老师', '计算机科学与技术', '音乐软件', '课题介绍：该课题主要提倡计算节科学与技术专业的同学选择，类型为企业网站，技术是基于PHP+mysql实现动态网站的建设，难度不是很高，但是细节很多。课题介绍：该课题主要提倡计算节科学与技术专业的同学选择，类型为企业网站，技术是基于PHP+mysql实现动态网站的建设，难度不是很高，但是细节很多。课题介绍：该课题主要提倡计算节科学与技术专业的同学选择，类型为企业网站，技术是基于PHP+mysql实现动态网站的建设，难度不是很高，但是细节很多。课题介绍：该课题主要提倡计算节科学与技术专业的同学选择，类型为企业网站，技术是基于PHP+mysql实现动态网站的建设，难度不是很高，但是细节很多。', '4', '通过', 'no');
INSERT INTO `topics` VALUES ('2', '014', '智能小车', '1006', 'xx老师', '电气及其自动化', '智能车', '课题介绍：该课题主要提倡计算节科学与技术专业的同学选择，类型为企业网站，技术是基于PHP+mysql实现动态网站的建设，难度不是很高，但是细节很多。课题介绍：该课题主要提倡计算节科学与技术专业的同学选择，类型为企业网站，技术是基于PHP+mysql实现动态网站的建设，难度不是很高，但是细节很多。课题介绍：该课题主要提倡计算节科学与技术专业的同学选择，类型为企业网站，技术是基于PHP+mysql实现动态网站的建设，难度不是很高，但是细节很多。课题介绍：该课题主要提倡计算节科学与技术专业的同学选择，类型为企业网站，技术是基于PHP+mysql实现动态网站的建设，难度不是很高，但是细节很多。', '3', '审核中', 'no');
INSERT INTO `topics` VALUES ('3', '015', '电子商城', '1009', 'xx老师', '信息管理', '电商', '课题介绍：该课题主要提倡计算节科学与技术专业的同学选择，类型为企业网站，技术是基于PHP+mysql实现动态网站的建设，难度不是很高，但是细节很多。课题介绍：该课题主要提倡计算节科学与技术专业的同学选择，类型为企业网站，技术是基于PHP+mysql实现动态网站的建设，难度不是很高，但是细节很多。课题介绍：该课题主要提倡计算节科学与技术专业的同学选择，类型为企业网站，技术是基于PHP+mysql实现动态网站的建设，难度不是很高，但是细节很多。课题介绍：该课题主要提倡计算节科学与技术专业的同学选择，类型为企业网站，技术是基于PHP+mysql实现动态网站的建设，难度不是很高，但是细节很多。', '5', '不通过', 'no');
INSERT INTO `topics` VALUES ('4', '005', '基于php+mysql实现毕业论文选题系统', '1100', 'xx老师', '计算机科学与技术', '软件系统', '课题介绍：该课题主要提倡计算节科学与技术专业的同学选择，类型为企业网站，技术是基于PHP+mysql实现动态网站的建设，难度不是很高，但是细节很多。课题介绍：该课题主要提倡计算节科学与技术专业的同学选择，类型为企业网站，技术是基于PHP+mysql实现动态网站的建设，难度不是很高，但是细节很多。课题介绍：该课题主要提倡计算节科学与技术专业的同学选择，类型为企业网站，技术是基于PHP+mysql实现动态网站的建设，难度不是很高，但是细节很多。课题介绍：该课题主要提倡计算节科学与技术专业的同学选择，类型为企业网站，技术是基于PHP+mysql实现动态网站的建设，难度不是很高，但是细节很多。', '6', '审核中', 'no');
INSERT INTO `topics` VALUES ('5', '006', '基于jsp实现企业网站', '1200', 'xx老师', '计算机科学与技术', '软件系统', '课题介绍：该课题主要提倡计算节科学与技术专业的同学选择，类型为企业网站，技术是基于PHP+mysql实现动态网站的建设，难度不是很高，但是细节很多。课题介绍：该课题主要提倡计算节科学与技术专业的同学选择，类型为企业网站，技术是基于PHP+mysql实现动态网站的建设，难度不是很高，但是细节很多。课题介绍：该课题主要提倡计算节科学与技术专业的同学选择，类型为企业网站，技术是基于PHP+mysql实现动态网站的建设，难度不是很高，但是细节很多。课题介绍：该课题主要提倡计算节科学与技术专业的同学选择，类型为企业网站，技术是基于PHP+mysql实现动态网站的建设，难度不是很高，但是细节很多。', '5', '审核中', 'no');
INSERT INTO `topics` VALUES ('6', '013', '在线商城的实现', '1101', 'xx老师', '信息管理', '电子商城', '课题介绍：该课题主要提倡计算节科学与技术专业的同学选择，类型为企业网站，技术是基于PHP+mysql实现动态网站的建设，难度不是很高，但是细节很多。课题介绍：该课题主要提倡计算节科学与技术专业的同学选择，类型为企业网站，技术是基于PHP+mysql实现动态网站的建设，难度不是很高，但是细节很多。课题介绍：该课题主要提倡计算节科学与技术专业的同学选择，类型为企业网站，技术是基于PHP+mysql实现动态网站的建设，难度不是很高，但是细节很多。课题介绍：该课题主要提倡计算节科学与技术专业的同学选择，类型为企业网站，技术是基于PHP+mysql实现动态网站的建设，难度不是很高，但是细节很多。', '4', '审核中', 'no');
INSERT INTO `topics` VALUES ('7', '012', '基于Linux以及xx实现电子相册', '1008', 'xx老师', '电子信息', '嵌入式开发', '课题介绍：该课题主要提倡计算节科学与技术专业的同学选择，类型为企业网站，技术是基于PHP+mysql实现动态网站的建设，难度不是很高，但是细节很多。课题介绍：该课题主要提倡计算节科学与技术专业的同学选择，类型为企业网站，技术是基于PHP+mysql实现动态网站的建设，难度不是很高，但是细节很多。课题介绍：该课题主要提倡计算节科学与技术专业的同学选择，类型为企业网站，技术是基于PHP+mysql实现动态网站的建设，难度不是很高，但是细节很多。课题介绍：该课题主要提倡计算节科学与技术专业的同学选择，类型为企业网站，技术是基于PHP+mysql实现动态网站的建设，难度不是很高，但是细节很多。', '4', '审核中', 'no');
INSERT INTO `topics` VALUES ('8', '004', '基于unity3d实现xx游戏', '1105', 'xx老师', '计算机科学与技术', '游戏', '课题介绍：该课题主要提倡计算节科学与技术专业的同学选择，类型为企业网站，技术是基于PHP+mysql实现动态网站的建设，难度不是很高，但是细节很多。课题介绍：该课题主要提倡计算节科学与技术专业的同学选择，类型为企业网站，技术是基于PHP+mysql实现动态网站的建设，难度不是很高，但是细节很多。课题介绍：该课题主要提倡计算节科学与技术专业的同学选择，类型为企业网站，技术是基于PHP+mysql实现动态网站的建设，难度不是很高，但是细节很多。课题介绍：该课题主要提倡计算节科学与技术专业的同学选择，类型为企业网站，技术是基于PHP+mysql实现动态网站的建设，难度不是很高，但是细节很多。', '5', '审核中', 'no');
INSERT INTO `topics` VALUES ('9', '003', '基于ASP.NET实现xx管理系统', '1300', 'xx老师', '计算机科学与技术', '软件系统', '课题介绍：该课题主要提倡计算节科学与技术专业的同学选择，类型为企业网站，技术是基于PHP+mysql实现动态网站的建设，难度不是很高，但是细节很多。课题介绍：该课题主要提倡计算节科学与技术专业的同学选择，类型为企业网站，技术是基于PHP+mysql实现动态网站的建设，难度不是很高，但是细节很多。课题介绍：该课题主要提倡计算节科学与技术专业的同学选择，类型为企业网站，技术是基于PHP+mysql实现动态网站的建设，难度不是很高，但是细节很多。课题介绍：该课题主要提倡计算节科学与技术专业的同学选择，类型为企业网站，技术是基于PHP+mysql实现动态网站的建设，难度不是很高，但是细节很多。', '5', '通过', 'no');
INSERT INTO `topics` VALUES ('10', '001', '基于HTML5+jQuery Mobile实现xxApp开发', '1201', 'xx老师', '计算机科学与技术', 'App', '课题介绍：该课题主要提倡计算节科学与技术专业的同学选择，类型为企业网站，技术是基于PHP+mysql实现动态网站的建设，难度不是很高，但是细节很多。课题介绍：该课题主要提倡计算节科学与技术专业的同学选择，类型为企业网站，技术是基于PHP+mysql实现动态网站的建设，难度不是很高，但是细节很多。课题介绍：该课题主要提倡计算节科学与技术专业的同学选择，类型为企业网站，技术是基于PHP+mysql实现动态网站的建设，难度不是很高，但是细节很多。课题介绍：该课题主要提倡计算节科学与技术专业的同学选择，类型为企业网站，技术是基于PHP+mysql实现动态网站的建设，难度不是很高，但是细节很多。', '4', '审核中', 'no');
INSERT INTO `topics` VALUES ('12', '008', '基于c++实现xx', '1201', 'xx老师', '计算机科学与技术', '游戏开发', '课题介绍：该课题主要提倡计算节科学与技术专业的同学选择，类型为企业网站，技术是基于PHP+mysql实现动态网站的建设，难度不是很高，但是细节很多。课题介绍：该课题主要提倡计算节科学与技术专业的同学选择，类型为企业网站，技术是基于PHP+mysql实现动态网站的建设，难度不是很高，但是细节很多。课题介绍：该课题主要提倡计算节科学与技术专业的同学选择，类型为企业网站，技术是基于PHP+mysql实现动态网站的建设，难度不是很高，但是细节很多。课题介绍：该课题主要提倡计算节科学与技术专业的同学选择，类型为企业网站，技术是基于PHP+mysql实现动态网站的建设，难度不是很高，但是细节很多。', '5', '审核中', 'no');
INSERT INTO `topics` VALUES ('13', '009', '探究xx原理', '1118', 'xx老师', '计算机科学与技术', '学术论文', '课题介绍：该课题主要提倡计算节科学与技术专业的同学选择，类型为企业网站，技术是基于PHP+mysql实现动态网站的建设，难度不是很高，但是细节很多。课题介绍：该课题主要提倡计算节科学与技术专业的同学选择，类型为企业网站，技术是基于PHP+mysql实现动态网站的建设，难度不是很高，但是细节很多。课题介绍：该课题主要提倡计算节科学与技术专业的同学选择，类型为企业网站，技术是基于PHP+mysql实现动态网站的建设，难度不是很高，但是细节很多。课题介绍：该课题主要提倡计算节科学与技术专业的同学选择，类型为企业网站，技术是基于PHP+mysql实现动态网站的建设，难度不是很高，但是细节很多。', '2', '审核中', 'no');
INSERT INTO `topics` VALUES ('14', '010', '基于xx实现xx', '1201', 'xx老师', '计算机科学与技术', '游戏开发', '课题介绍：该课题主要提倡计算节科学与技术专业的同学选择，类型为企业网站，技术是基于PHP+mysql实现动态网站的建设，难度不是很高，但是细节很多。课题介绍：该课题主要提倡计算节科学与技术专业的同学选择，类型为企业网站，技术是基于PHP+mysql实现动态网站的建设，难度不是很高，但是细节很多。课题介绍：该课题主要提倡计算节科学与技术专业的同学选择，类型为企业网站，技术是基于PHP+mysql实现动态网站的建设，难度不是很高，但是细节很多。课题介绍：该课题主要提倡计算节科学与技术专业的同学选择，类型为企业网站，技术是基于PHP+mysql实现动态网站的建设，难度不是很高，但是细节很多。', '5', '审核中', 'no');
INSERT INTO `topics` VALUES ('15', '011', '基于Java实现xx', '1208', 'xx老师', '计算机科学与技术', '游戏', '课题介绍：该课题主要提倡计算节科学与技术专业的同学选择，类型为企业网站，技术是基于PHP+mysql实现动态网站的建设，难度不是很高，但是细节很多。课题介绍：该课题主要提倡计算节科学与技术专业的同学选择，类型为企业网站，技术是基于PHP+mysql实现动态网站的建设，难度不是很高，但是细节很多。课题介绍：该课题主要提倡计算节科学与技术专业的同学选择，类型为企业网站，技术是基于PHP+mysql实现动态网站的建设，难度不是很高，但是细节很多。课题介绍：该课题主要提倡计算节科学与技术专业的同学选择，类型为企业网站，技术是基于PHP+mysql实现动态网站的建设，难度不是很高，但是细节很多。', '5', '审核中', 'no');
INSERT INTO `topics` VALUES ('16', '016', '基于xx实现xxxx', '1312', 'xx老师', '计算机科学与技术', 'xxx', '课题介绍：该课题主要提倡计算节科学与技术专业的同学选择，类型为企业网站，技术是基于PHP+mysql实现动态网站的建设，难度不是很高，但是细节很多。课题介绍：该课题主要提倡计算节科学与技术专业的同学选择，类型为企业网站，技术是基于PHP+mysql实现动态网站的建设，难度不是很高，但是细节很多。课题介绍：该课题主要提倡计算节科学与技术专业的同学选择，类型为企业网站，技术是基于PHP+mysql实现动态网站的建设，难度不是很高，但是细节很多。课题介绍：该课题主要提倡计算节科学与技术专业的同学选择，类型为企业网站，技术是基于PHP+mysql实现动态网站的建设，难度不是很高，但是细节很多。', '4', '审核中', 'no');
INSERT INTO `topics` VALUES ('17', '017', 'xxx实现xxx', '1319', 'xx老师', '计算机科学与技术', 'xx', '课题介绍：该课题主要提倡计算节科学与技术专业的同学选择，类型为企业网站，技术是基于PHP+mysql实现动态网站的建设，难度不是很高，但是细节很多。课题介绍：该课题主要提倡计算节科学与技术专业的同学选择，类型为企业网站，技术是基于PHP+mysql实现动态网站的建设，难度不是很高，但是细节很多。课题介绍：该课题主要提倡计算节科学与技术专业的同学选择，类型为企业网站，技术是基于PHP+mysql实现动态网站的建设，难度不是很高，但是细节很多。课题介绍：该课题主要提倡计算节科学与技术专业的同学选择，类型为企业网站，技术是基于PHP+mysql实现动态网站的建设，难度不是很高，但是细节很多。', '6', '审核中', 'no');
INSERT INTO `topics` VALUES ('20', '1300', '基于ASP.net实现企业论坛类网站', '1300', 'xx老师', '计算机科学与技术(数据库)', '网站系统', '课题介绍：该课题主要提倡计算节科学与技术专业的同学选择，类型为企业网站，技术是基于PHP+mysql实现动态网站的建设，难度不是很高，但是细节很多。课题介绍：该课题主要提倡计算节科学与技术专业的同学选择，类型为企业网站，技术是基于PHP+mysql实现动态网站的建设，难度不是很高，但是细节很多。课题介绍：该课题主要提倡计算节科学与技术专业的同学选择，类型为企业网站，技术是基于PHP+mysql实现动态网站的建设，难度不是很高，但是细节很多。课题介绍：该课题主要提倡计算节科学与技术专业的同学选择，类型为企业网站，技术是基于PHP+mysql实现动态网站的建设，难度不是很高，但是细节很多。', '4', '通过', 'no');
INSERT INTO `topics` VALUES ('23', '002', 'PHP', '1300', 'xx老师', '计算机科学与技术(数字媒体)', '软件', '课题介绍：该课题主要提倡计算节科学与技术专业的同学选择，类型为企业网站，技术是基于PHP+mysql实现动态网站的建设，难度不是很高，但是细节很多。课题介绍：该课题主要提倡计算节科学与技术专业的同学选择，类型为企业网站，技术是基于PHP+mysql实现动态网站的建设，难度不是很高，但是细节很多。课题介绍：该课题主要提倡计算节科学与技术专业的同学选择，类型为企业网站，技术是基于PHP+mysql实现动态网站的建设，难度不是很高，但是细节很多。课题介绍：该课题主要提倡计算节科学与技术专业的同学选择，类型为企业网站，技术是基于PHP+mysql实现动态网站的建设，难度不是很高，但是细节很多。', '1', '通过', 'no');
INSERT INTO `topics` VALUES ('24', '001', 'Java', '1300', 'xx老师', '计算机科学与技术（Oracle）', '其他', '课题介绍：该课题主要提倡计算节科学与技术专业的同学选择，类型为企业网站，技术是基于PHP+mysql实现动态网站的建设，难度不是很高，但是细节很多。课题介绍：该课题主要提倡计算节科学与技术专业的同学选择，类型为企业网站，技术是基于PHP+mysql实现动态网站的建设，难度不是很高，但是细节很多。课题介绍：该课题主要提倡计算节科学与技术专业的同学选择，类型为企业网站，技术是基于PHP+mysql实现动态网站的建设，难度不是很高，但是细节很多。课题介绍：该课题主要提倡计算节科学与技术专业的同学选择，类型为企业网站，技术是基于PHP+mysql实现动态网站的建设，难度不是很高，但是细节很多。', '5', '通过', 'yes');
INSERT INTO `topics` VALUES ('25', '1456', '测试名称', '1300', 'xx老师', '计算机科学与技术(数据库)', '网站系统', '课题介绍：该课题主要提倡计算节科学与技术专业的同学选择，类型为企业网站，技术是基于PHP+mysql实现动态网站的建设，难度不是很高，但是细节很多。课题介绍：该课题主要提倡计算节科学与技术专业的同学选择，类型为企业网站，技术是基于PHP+mysql实现动态网站的建设，难度不是很高，但是细节很多。课题介绍：该课题主要提倡计算节科学与技术专业的同学选择，类型为企业网站，技术是基于PHP+mysql实现动态网站的建设，难度不是很高，但是细节很多。课题介绍：该课题主要提倡计算节科学与技术专业的同学选择，类型为企业网站，技术是基于PHP+mysql实现动态网站的建设，难度不是很高，但是细节很多。', '3', '不通过', 'no');
INSERT INTO `topics` VALUES ('26', '101010', '嵌入式电子车', '1300', 'xx老师', '电气及其自动化', '嵌入式开发', '课题介绍：该课题主要提倡计算节科学与技术专业的同学选择，类型为企业网站，技术是基于PHP+mysql实现动态网站的建设，难度不是很高，但是细节很多。课题介绍：该课题主要提倡计算节科学与技术专业的同学选择，类型为企业网站，技术是基于PHP+mysql实现动态网站的建设，难度不是很高，但是细节很多。课题介绍：该课题主要提倡计算节科学与技术专业的同学选择，类型为企业网站，技术是基于PHP+mysql实现动态网站的建设，难度不是很高，但是细节很多。课题介绍：该课题主要提倡计算节科学与技术专业的同学选择，类型为企业网站，技术是基于PHP+mysql实现动态网站的建设，难度不是很高，但是细节很多。', '5', '通过', 'no');
INSERT INTO `topics` VALUES ('38', '10012', '基于jsp办公自动化系统oa', '1300', 'xx老师', '计算机科学与技术(数据库)', '网站系统', '基于jsp办公oa系统：主要是xxxxxx', '4', '通过', 'no');
INSERT INTO `topics` VALUES ('39', '123456789', '测试课题', '1300', 'xx老师', '计算机科学与技术(数据库)', '软件', '课题介绍<span>课题介绍</span><span>课题介绍</span><span>课题介绍</span><span>课题介绍</span><span>课题介绍</span><span>课题介绍</span><span>课题介绍</span><span>课题介绍</span><span>课题介绍</span><span>课题介绍</span><span>课题介绍</span><span>课题介绍</span><span>课题介绍</span><span>课题介绍</span><span>课题介绍</span><span>课题介绍</span><span>课题介绍</span><span>课题介绍</span><span>课题介绍</span><span>课题介绍</span>', '3', '审核中', 'no');
INSERT INTO `topics` VALUES ('40', '004', '测试测试', '1300', 'xx老师', '计算机科学与技术（数据库）', '手机app', '测试测试', '3', '通过', 'yes');
INSERT INTO `topics` VALUES ('41', '1001', '测试名称', '1300', 'xx老师', '电子信息工程', '学术论文', '这里是测试', '5', '通过', 'no');

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
