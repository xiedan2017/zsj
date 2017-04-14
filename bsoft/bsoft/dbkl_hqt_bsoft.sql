/*
Navicat MySQL Data Transfer

Source Server         : localhost_3306
Source Server Version : 50540
Source Host           : localhost:3306
Source Database       : dbkl_hqt_bsoft

Target Server Type    : MYSQL
Target Server Version : 50540
File Encoding         : 65001

Date: 2016-09-21 18:16:49
*/

SET FOREIGN_KEY_CHECKS=0;

-- ----------------------------
-- Table structure for klwl_access
-- ----------------------------
DROP TABLE IF EXISTS `klwl_access`;
CREATE TABLE `klwl_access` (
  `role_id` smallint(6) unsigned NOT NULL,
  `node_id` smallint(6) unsigned NOT NULL,
  `level` tinyint(1) NOT NULL,
  `module` varchar(50) DEFAULT NULL,
  KEY `groupId` (`role_id`),
  KEY `nodeId` (`node_id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8 COMMENT='权限表';

-- ----------------------------
-- Records of klwl_access
-- ----------------------------
INSERT INTO `klwl_access` VALUES ('8', '43', '3', null);
INSERT INTO `klwl_access` VALUES ('8', '42', '3', null);
INSERT INTO `klwl_access` VALUES ('8', '41', '3', null);
INSERT INTO `klwl_access` VALUES ('8', '40', '2', null);
INSERT INTO `klwl_access` VALUES ('8', '39', '1', null);
INSERT INTO `klwl_access` VALUES ('9', '39', '1', null);
INSERT INTO `klwl_access` VALUES ('9', '40', '2', null);
INSERT INTO `klwl_access` VALUES ('9', '41', '3', null);
INSERT INTO `klwl_access` VALUES ('9', '42', '3', null);
INSERT INTO `klwl_access` VALUES ('9', '43', '3', null);
INSERT INTO `klwl_access` VALUES ('9', '44', '3', null);
INSERT INTO `klwl_access` VALUES ('9', '60', '3', null);
INSERT INTO `klwl_access` VALUES ('9', '47', '3', null);
INSERT INTO `klwl_access` VALUES ('9', '50', '2', null);
INSERT INTO `klwl_access` VALUES ('11', '60', '3', null);
INSERT INTO `klwl_access` VALUES ('11', '44', '3', null);
INSERT INTO `klwl_access` VALUES ('11', '42', '3', null);
INSERT INTO `klwl_access` VALUES ('11', '41', '3', null);
INSERT INTO `klwl_access` VALUES ('11', '40', '2', null);
INSERT INTO `klwl_access` VALUES ('11', '39', '1', null);
INSERT INTO `klwl_access` VALUES ('8', '44', '3', null);
INSERT INTO `klwl_access` VALUES ('8', '60', '3', null);
INSERT INTO `klwl_access` VALUES ('8', '47', '3', null);
INSERT INTO `klwl_access` VALUES ('8', '50', '2', null);

-- ----------------------------
-- Table structure for klwl_admin
-- ----------------------------
DROP TABLE IF EXISTS `klwl_admin`;
CREATE TABLE `klwl_admin` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` char(20) NOT NULL,
  `password` char(50) NOT NULL,
  `logintime` datetime DEFAULT NULL,
  `loginip` char(20) DEFAULT NULL,
  `lock` int(2) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=33 DEFAULT CHARSET=utf8 COMMENT='管理员';

-- ----------------------------
-- Records of klwl_admin
-- ----------------------------
INSERT INTO `klwl_admin` VALUES ('31', 'admin', '21232f297a57a5a743894a0e4a801fc3', '2016-09-20 09:19:20', '0.0.0.0', '0');
INSERT INTO `klwl_admin` VALUES ('26', 'admin1', 'e00cf25ad42683b3df678c61f42c6bda', '2016-04-11 19:20:01', '127.0.0.1', '1');

-- ----------------------------
-- Table structure for klwl_company
-- ----------------------------
DROP TABLE IF EXISTS `klwl_company`;
CREATE TABLE `klwl_company` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `attr` varchar(200) DEFAULT NULL,
  `value` varchar(200) DEFAULT NULL,
  `status` int(11) DEFAULT '1' COMMENT '是否显示',
  `sort` int(11) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=38 DEFAULT CHARSET=utf8 COMMENT='企业公共信息';

-- ----------------------------
-- Records of klwl_company
-- ----------------------------

-- ----------------------------
-- Table structure for klwl_friendslink
-- ----------------------------
DROP TABLE IF EXISTS `klwl_friendslink`;
CREATE TABLE `klwl_friendslink` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `cnname` varchar(20) DEFAULT NULL COMMENT '中文链接名称',
  `enname` varchar(20) DEFAULT NULL COMMENT '英文连接名称',
  `url` varchar(100) DEFAULT NULL COMMENT '链接地址URL',
  `status` smallint(3) DEFAULT '0' COMMENT '状态',
  `sort` int(11) DEFAULT NULL COMMENT '排序',
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=15 DEFAULT CHARSET=utf8 COMMENT='友情链接';

-- ----------------------------
-- Records of klwl_friendslink
-- ----------------------------
INSERT INTO `klwl_friendslink` VALUES ('6', '啊里巴巴平台', 'alibaba', 'https://www.1688.com/', '0', '2');
INSERT INTO `klwl_friendslink` VALUES ('5', '官方微信', 'weixin', 'https://wx.qq.com/', '0', '1');
INSERT INTO `klwl_friendslink` VALUES ('14', '天猫旗舰店', 'tmall', 'https://www.tmall.com/', '0', '3');

-- ----------------------------
-- Table structure for klwl_logo
-- ----------------------------
DROP TABLE IF EXISTS `klwl_logo`;
CREATE TABLE `klwl_logo` (
  `id` int(11) NOT NULL DEFAULT '1',
  `pic` varchar(255) DEFAULT NULL,
  `time` datetime DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8 COMMENT='LOGO记录';

-- ----------------------------
-- Records of klwl_logo
-- ----------------------------
INSERT INTO `klwl_logo` VALUES ('1', 'Uploads/logo/57a3272d360ab.jpg', '2016-08-04 19:29:49');

-- ----------------------------
-- Table structure for klwl_menu
-- ----------------------------
DROP TABLE IF EXISTS `klwl_menu`;
CREATE TABLE `klwl_menu` (
  `id` int(8) NOT NULL AUTO_INCREMENT,
  `name` varchar(20) DEFAULT NULL,
  `pic` varchar(50) DEFAULT NULL,
  `controller` varchar(25) DEFAULT NULL,
  `methods` varchar(25) DEFAULT NULL,
  `pid` int(5) DEFAULT NULL,
  `sort` int(8) DEFAULT NULL,
  `status` tinyint(2) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=18 DEFAULT CHARSET=utf8 COMMENT='后台菜单表';

-- ----------------------------
-- Records of klwl_menu
-- ----------------------------
INSERT INTO `klwl_menu` VALUES ('1', '内容管理', 'Uploads/menuico/5720ac6fd6679.png', '', '', '0', '1', '0');
INSERT INTO `klwl_menu` VALUES ('2', '快速设置', null, 'Index', 'welcome', '1', '1', '0');
INSERT INTO `klwl_menu` VALUES ('3', '页面管理', null, 'Product', 'index', '1', '2', '0');
INSERT INTO `klwl_menu` VALUES ('4', '留言管理', null, 'Messages', 'index', '1', '3', '0');
INSERT INTO `klwl_menu` VALUES ('5', '栏目管理', 'Uploads/menuico/5720ac0011496.png', '', '', '0', '2', '0');
INSERT INTO `klwl_menu` VALUES ('6', '主菜单管理', null, 'Productcate', 'index', '5', '1', '0');
INSERT INTO `klwl_menu` VALUES ('11', '企业管理', 'Uploads/menuico/5720ac61938e0.png', '', '', '0', '4', '0');
INSERT INTO `klwl_menu` VALUES ('12', '企业信息管理', null, 'Company', 'index', '11', '1', '0');
INSERT INTO `klwl_menu` VALUES ('13', '友情链接管理', null, 'Friendslink', 'index', '11', '2', '0');
INSERT INTO `klwl_menu` VALUES ('14', '客服管理', null, 'Service', 'index', '11', '3', '0');
INSERT INTO `klwl_menu` VALUES ('16', '邮件管理', null, 'SendEmail', 'index', '11', '4', '0');
INSERT INTO `klwl_menu` VALUES ('17', '新闻管理', null, 'News', 'index', '1', '3', '0');

-- ----------------------------
-- Table structure for klwl_messages
-- ----------------------------
DROP TABLE IF EXISTS `klwl_messages`;
CREATE TABLE `klwl_messages` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(25) DEFAULT NULL COMMENT '留言姓名',
  `phone` int(11) DEFAULT NULL COMMENT '电话',
  `email` varchar(50) DEFAULT NULL COMMENT '邮箱',
  `job` varchar(255) DEFAULT NULL COMMENT '工作',
  `school` varchar(255) DEFAULT NULL,
  `content` text COMMENT '留言内容',
  `ip` varchar(20) DEFAULT NULL COMMENT 'IP地址',
  `time` int(20) DEFAULT NULL COMMENT '时间',
  `status` smallint(2) DEFAULT '1' COMMENT '处理状态',
  `copytitle` varchar(50) DEFAULT NULL COMMENT '回复标题',
  `copytime` int(20) DEFAULT NULL COMMENT '回复时间',
  `copyContent` text COMMENT '回复内容',
  `admin` varchar(10) DEFAULT NULL COMMENT '回复管理员',
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=6 DEFAULT CHARSET=utf8 COMMENT='留言表';

-- ----------------------------
-- Records of klwl_messages
-- ----------------------------
INSERT INTO `klwl_messages` VALUES ('1', '韩万林', '1818955495', '1902672259@qq.com', null, null, '我有问题咨询您', '127.0.0.1', '1470391352', '0', '氛围让分', '1470391352', '飞安慰法安慰 ', 'admin');
INSERT INTO `klwl_messages` VALUES ('2', '1', '1', '1', '1', '1', null, null, '1474443674', '0', null, null, null, null);
INSERT INTO `klwl_messages` VALUES ('3', '姓名', '2147483647', '1902672259qq.com', '程序员', '兰芝', '这是内容', null, '1474443717', '0', null, null, null, null);
INSERT INTO `klwl_messages` VALUES ('4', '', '0', '', '', '', '', null, '1474443940', '1', null, null, null, null);
INSERT INTO `klwl_messages` VALUES ('5', '', '0', '', '', '', '', null, '1474444010', '1', null, null, null, null);

-- ----------------------------
-- Table structure for klwl_news
-- ----------------------------
DROP TABLE IF EXISTS `klwl_news`;
CREATE TABLE `klwl_news` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(25) DEFAULT NULL COMMENT '产品名称',
  `title` varchar(150) DEFAULT NULL COMMENT '简述',
  `url` varchar(255) DEFAULT NULL,
  `time` int(20) DEFAULT NULL COMMENT '时间',
  `status` smallint(3) DEFAULT NULL COMMENT '状态',
  `sort` int(10) DEFAULT NULL COMMENT '排序',
  `cate` int(20) DEFAULT NULL COMMENT 'l类型',
  `content` text COMMENT '详情',
  `pic` varchar(255) DEFAULT NULL,
  `red` smallint(2) DEFAULT '1' COMMENT '是否推荐0推荐 1不推荐',
  PRIMARY KEY (`id`),
  KEY `index_name` (`name`,`cate`) USING BTREE
) ENGINE=MyISAM AUTO_INCREMENT=35 DEFAULT CHARSET=utf8 COMMENT='产品表';

-- ----------------------------
-- Records of klwl_news
-- ----------------------------
INSERT INTO `klwl_news` VALUES ('20', '企业定位新闻', '测试产品了', null, '1474437747', '0', '3', '35', '', null, '0');
INSERT INTO `klwl_news` VALUES ('26', '公司架构新闻', '粉色发frf', null, '1474437756', '0', '2', '35', '', null, '1');
INSERT INTO `klwl_news` VALUES ('28', '公司简介新闻', '测试的描述', null, '1474438407', '0', '1', '35', '<p>&nbsp;&nbsp;<span style=\"padding: 0px; margin: 0px; font-size: 13px;\">广州碧软信息科技有限公司，注册资本金1700万人民币，是华南地区发展最快的软件服务供应商之一，广东省软件行业协会会员单位，总部位于广州市天河软件园高科园区(国家十大软件产业基地之一)，是广东省规划布局内重点软件企业、软件园区内优秀企业及广东省信息产业厅认定的双软企业单位、广州科技</span><span style=\"padding: 0px; margin: 0px; font-size: 13px;\">创新</span><span style=\"padding: 0px; margin: 0px; font-size: 13px;\">小巨人企业，通过ISO9001:2008软件质量标准认证，面向全球客户提供软件技术服务与咨询。 &nbsp; &nbsp;</span></p><p><span style=\"padding: 0px; margin: 0px; font-size: 13px;\">&nbsp;&nbsp;&nbsp;&nbsp;广州碧软提供以互联网+、大数据、IT运维管理等技术为核心的综合性IT解决方案与服务，业务范围涵盖互联网+、平台设计与构建、IT系统建设规划与咨询、软件服务外包（ITO）、IT应用开发及维护、大型数据中心运维管理、智慧城市及产品增值服务等，是制造、金融/高科技、能源/交通/公用事业等行业重要的IT综合服务提供商和合作伙伴。</span></p><p><span style=\"padding: 0px; margin: 0px; font-size: 13px;\">&nbsp;&nbsp;&nbsp;&nbsp;作为中国优秀软件企业单位，目前碧软已成为中国恒大、长虹集团</span><span style=\"padding: 0px; margin: 0px; font-size: 13px;\">、埃森哲</span><span style=\"padding: 0px; margin: 0px; font-size: 13px;\">等多家世界500强企业的核心供应商，并已与微软、IBM、Oracle等一大批知名企业结成了合作伙伴。旗下有</span><span style=\"padding: 0px; margin: 0px; font-size: 13px;\">广州碧达信息科技有限公司、</span><span style=\"padding: 0px; margin: 0px; font-size: 13px;\">广州碧新信息科技有限公司\\</span><span style=\"padding: 0px; margin: 0px; font-size: 13px;\">广州碧联信息科技有限公司、</span><span style=\"padding: 0px; margin: 0px; font-size: 13px;\">广州碧兴信息科技有限公司</span><span style=\"padding: 0px; margin: 0px; font-size: 13px;\">。&nbsp;</span></p><p><span style=\"padding: 0px; margin: 0px; font-size: 13px;\">&nbsp;&nbsp;&nbsp;&nbsp;以“创新进取，诚信交付”为价值理念，立足华南，服务全球，不断优化资源配置，持续提升其在产业价值链的地位和作用，致力于成为全国卓越的软件外包服务商，服务数百家中国及海外客户。</span></p><p><br/></p>', '/klwl_hqt_bsoft/Uploads/product/147437254728435.jpg', '0');
INSERT INTO `klwl_news` VALUES ('30', '行业覆盖新闻', '行业覆盖。。。', null, '1474437816', '0', '1', '35', '', null, '0');
INSERT INTO `klwl_news` VALUES ('31', '服务范围新闻', '服务范围。。。', null, '1474437822', '0', '1', '35', '', null, '0');
INSERT INTO `klwl_news` VALUES ('32', '公司产品新闻', '公司产品。。', null, '1474437826', '0', '1', '35', '', null, '0');
INSERT INTO `klwl_news` VALUES ('33', '联盟与伙伴新闻', '联盟与伙伴', null, '1474437833', '0', '1', '35', '', null, '0');

-- ----------------------------
-- Table structure for klwl_node
-- ----------------------------
DROP TABLE IF EXISTS `klwl_node`;
CREATE TABLE `klwl_node` (
  `id` smallint(6) unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(20) NOT NULL,
  `title` varchar(50) DEFAULT NULL,
  `status` tinyint(1) DEFAULT '0',
  `remark` varchar(255) DEFAULT NULL,
  `sort` smallint(6) unsigned DEFAULT NULL,
  `pid` smallint(6) unsigned NOT NULL,
  `level` tinyint(1) unsigned NOT NULL,
  PRIMARY KEY (`id`),
  KEY `level` (`level`),
  KEY `pid` (`pid`),
  KEY `status` (`status`),
  KEY `name` (`name`)
) ENGINE=MyISAM AUTO_INCREMENT=69 DEFAULT CHARSET=utf8 COMMENT='节点表';

-- ----------------------------
-- Records of klwl_node
-- ----------------------------
INSERT INTO `klwl_node` VALUES ('39', 'Admin', '后台应用', '1', null, '1', '0', '1');
INSERT INTO `klwl_node` VALUES ('40', 'Rbac', 'RBAC权限控制', '1', null, '1', '39', '2');
INSERT INTO `klwl_node` VALUES ('41', 'index', '用户列表', '1', null, '1', '40', '3');
INSERT INTO `klwl_node` VALUES ('42', 'role', '角色列表', '1', null, '2', '40', '3');
INSERT INTO `klwl_node` VALUES ('43', 'node', '节点列表', '1', null, '3', '40', '3');
INSERT INTO `klwl_node` VALUES ('44', 'addUser', '添加用户', '1', null, '4', '40', '3');
INSERT INTO `klwl_node` VALUES ('50', 'System', '系统设置', '1', null, '2', '39', '2');
INSERT INTO `klwl_node` VALUES ('47', 'addNode', '添加节点', '1', null, '6', '40', '3');
INSERT INTO `klwl_node` VALUES ('60', 'addRole', '添加角色', '1', null, '5', '40', '3');

-- ----------------------------
-- Table structure for klwl_product
-- ----------------------------
DROP TABLE IF EXISTS `klwl_product`;
CREATE TABLE `klwl_product` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(25) DEFAULT NULL COMMENT '产品名称',
  `title` varchar(150) DEFAULT NULL COMMENT '简述',
  `url` varchar(255) DEFAULT NULL,
  `time` int(20) DEFAULT NULL COMMENT '时间',
  `status` smallint(3) DEFAULT NULL COMMENT '状态',
  `sort` int(10) DEFAULT NULL COMMENT '排序',
  `cate` int(20) DEFAULT NULL COMMENT 'l类型',
  `content` text COMMENT '详情',
  `pic` varchar(255) DEFAULT NULL,
  `red` smallint(2) DEFAULT '1' COMMENT '是否推荐0推荐 1不推荐',
  PRIMARY KEY (`id`),
  KEY `index_name` (`name`,`cate`) USING BTREE
) ENGINE=MyISAM AUTO_INCREMENT=37 DEFAULT CHARSET=utf8 COMMENT='产品表';

-- ----------------------------
-- Records of klwl_product
-- ----------------------------
INSERT INTO `klwl_product` VALUES ('20', '企业定位', '测试产品了', null, '1474437709', '0', '3', '1', '', null, '0');
INSERT INTO `klwl_product` VALUES ('26', '公司架构', '粉色发frf', null, '1474427530', '0', '2', '1', '', null, '1');
INSERT INTO `klwl_product` VALUES ('28', '公司简介', '测试的描述', null, '1474437566', '0', '1', '1', '<p>&nbsp;&nbsp;<span style=\"padding: 0px; margin: 0px; font-size: 13px;\">广州碧软信息科技有限公司，注册资本金1700万人民币，是华南地区发展最快的软件服务供应商之一，广东省软件行业协会会员单位，总部位于广州市天河软件园高科园区(国家十大软件产业基地之一)，是广东省规划布局内重点软件企业、软件园区内优秀企业及广东省信息产业厅认定的双软企业单位、广州科技</span><span style=\"padding: 0px; margin: 0px; font-size: 13px;\">创新</span><span style=\"padding: 0px; margin: 0px; font-size: 13px;\">小巨人企业，通过ISO9001:2008软件质量标准认证，面向全球客户提供软件技术服务与咨询。 &nbsp; &nbsp;</span></p><p><span style=\"padding: 0px; margin: 0px; font-size: 13px;\">&nbsp;&nbsp;&nbsp;&nbsp;广州碧软提供以互联网+、大数据、IT运维管理等技术为核心的综合性IT解决方案与服务，业务范围涵盖互联网+、平台设计与构建、IT系统建设规划与咨询、软件服务外包（ITO）、IT应用开发及维护、大型数据中心运维管理、智慧城市及产品增值服务等，是制造、金融/高科技、能源/交通/公用事业等行业重要的IT综合服务提供商和合作伙伴。</span></p><p><span style=\"padding: 0px; margin: 0px; font-size: 13px;\">&nbsp;&nbsp;&nbsp;&nbsp;作为中国优秀软件企业单位，目前碧软已成为中国恒大、长虹集团</span><span style=\"padding: 0px; margin: 0px; font-size: 13px;\">、埃森哲</span><span style=\"padding: 0px; margin: 0px; font-size: 13px;\">等多家世界500强企业的核心供应商，并已与微软、IBM、Oracle等一大批知名企业结成了合作伙伴。旗下有</span><span style=\"padding: 0px; margin: 0px; font-size: 13px;\">广州碧达信息科技有限公司、</span><span style=\"padding: 0px; margin: 0px; font-size: 13px;\">广州碧新信息科技有限公司\\</span><span style=\"padding: 0px; margin: 0px; font-size: 13px;\">广州碧联信息科技有限公司、</span><span style=\"padding: 0px; margin: 0px; font-size: 13px;\">广州碧兴信息科技有限公司</span><span style=\"padding: 0px; margin: 0px; font-size: 13px;\">。&nbsp;</span></p><p><span style=\"padding: 0px; margin: 0px; font-size: 13px;\">&nbsp;&nbsp;&nbsp;&nbsp;以“创新进取，诚信交付”为价值理念，立足华南，服务全球，不断优化资源配置，持续提升其在产业价值链的地位和作用，致力于成为全国卓越的软件外包服务商，服务数百家中国及海外客户。</span></p><p><br/></p>', '/klwl_hqt_bsoft/Uploads/product/147437254728435.jpg', '0');
INSERT INTO `klwl_product` VALUES ('30', '行业覆盖', '行业覆盖。。。', null, '1474334481', '0', '1', '2', '', null, null);
INSERT INTO `klwl_product` VALUES ('31', '服务范围', '服务范围。。。', null, '1474419637', '0', '1', '2', '', null, null);
INSERT INTO `klwl_product` VALUES ('32', '公司产品', '公司产品。。', null, '1474334779', '0', '1', '2', '', null, null);
INSERT INTO `klwl_product` VALUES ('33', '联盟与伙伴', '联盟与伙伴', null, '1474343585', '0', '1', '3', '', null, null);
INSERT INTO `klwl_product` VALUES ('35', '新闻中心', '新闻中心列表', null, '1474429746', '0', '4', '1', '', null, '0');
INSERT INTO `klwl_product` VALUES ('36', '职业发展', '广州碧软是全球增长最快的IT服务及行业解决方案提供商之一。我们深知人才是公司最宝贵的财富，因此，成为全球最佳雇主 一直是我们的努力方向。', null, '1474448097', '0', '6', '4', '<p><span style=\"color: rgb(51, 51, 51); font-family: 宋体; font-size: 12px; line-height: 23px;\">&nbsp; &nbsp; &nbsp;广州碧软是全球增长最快的IT服务及行业解决方案提供商之一。我们深知人才是公司最宝贵的财富，因此，成为全球最佳雇主 一直是我们的努力方向。</span><br style=\"padding: 0px; margin: 0px; color: rgb(51, 51, 51); font-family: 宋体; font-size: 12px; line-height: 23px; white-space: normal;\"/><span style=\"color: rgb(51, 51, 51); font-family: 宋体; font-size: 12px; line-height: 23px;\">&nbsp; &nbsp; &nbsp;我们为实干的员工提供成长的土壤，我们为诚信的员工创造无忧工作的乐园，我们鼓励攻坚克难、高效执行，我们倡导包容大 爱、团队导向。</span><br style=\"padding: 0px; margin: 0px; color: rgb(51, 51, 51); font-family: 宋体; font-size: 12px; line-height: 23px; white-space: normal;\"/><span style=\"color: rgb(51, 51, 51); font-family: 宋体; font-size: 12px; line-height: 23px;\">&nbsp; &nbsp; &nbsp;我们与员工不断超越。永不满足于自己的过去和现在，永远给自己树立新的更高的目标，不断求索，不断学习，不断挑战自己 ，不断否定自己，不断创造生存发展的新天地和新境界——碧软让你不断发展</span><br style=\"padding: 0px; margin: 0px; color: rgb(51, 51, 51); font-family: 宋体; font-size: 12px; line-height: 23px; white-space: normal;\"/><span style=\"color: rgb(51, 51, 51); font-family: 宋体; font-size: 12px; line-height: 23px;\">&nbsp; &nbsp; &nbsp;我们同员工共担责任。既要创造企业的价值和企业人的价值，还要创造社会价值和人类的价值。为企业做出业绩、创造价值， 将个人的价值创造融入企业的价值创造之中——碧软让你实现更高意义的个人价值！</span><br style=\"padding: 0px; margin: 0px; color: rgb(51, 51, 51); font-family: 宋体; font-size: 12px; line-height: 23px; white-space: normal;\"/><span style=\"color: rgb(51, 51, 51); font-family: 宋体; font-size: 12px; line-height: 23px;\">&nbsp; &nbsp; &nbsp;我们给员工阳光的文化。合理合法的经营，遵守规则，坚守原则，诚实守信，对社会、对客户、对消费者、对员工真诚负责， 追求阳光利润，创造阳光价值，做一个让社会尊敬的真正的企业公民——碧软给你时时刻刻阳光下的透明和温暖。</span><br style=\"padding: 0px; margin: 0px; color: rgb(51, 51, 51); font-family: 宋体; font-size: 12px; line-height: 23px; white-space: normal;\"/><span style=\"color: rgb(51, 51, 51); font-family: 宋体; font-size: 12px; line-height: 23px;\">&nbsp; &nbsp; &nbsp;广州碧软，以人性化的管理模式，着力于实现企业与员工的双赢。工作在碧软，成长在碧软，这里是你释放激情、实现梦想的 地方！</span></p>', null, '1');

-- ----------------------------
-- Table structure for klwl_productcate
-- ----------------------------
DROP TABLE IF EXISTS `klwl_productcate`;
CREATE TABLE `klwl_productcate` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(25) DEFAULT NULL,
  `time` int(11) DEFAULT NULL,
  `status` smallint(3) DEFAULT NULL,
  `sort` int(5) DEFAULT NULL,
  `pic` varchar(255) DEFAULT NULL COMMENT '宣传主图',
  `red` smallint(2) DEFAULT '1' COMMENT '是否推荐1：否，0：是',
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=5 DEFAULT CHARSET=utf8 COMMENT='产品分类';

-- ----------------------------
-- Records of klwl_productcate
-- ----------------------------
INSERT INTO `klwl_productcate` VALUES ('1', '关于我们', '1474373641', '0', '1', '/klwl_hqt_bsoft/Uploads/product/147437364092320.jpg', null);
INSERT INTO `klwl_productcate` VALUES ('2', '信息技术服务', '1474428720', '0', '2', '/klwl_hqt_bsoft/Uploads/product/147437365025067.png', '0');
INSERT INTO `klwl_productcate` VALUES ('3', '合作伙伴与案例', '1474373936', '0', '3', '/klwl_hqt_bsoft/Uploads/product/147437393569103.jpg', null);
INSERT INTO `klwl_productcate` VALUES ('4', '加入碧软', '1474373979', '0', '4', '/klwl_hqt_bsoft/Uploads/product/147437397884577.jpg', null);

-- ----------------------------
-- Table structure for klwl_role
-- ----------------------------
DROP TABLE IF EXISTS `klwl_role`;
CREATE TABLE `klwl_role` (
  `id` smallint(6) unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(20) NOT NULL,
  `pid` smallint(6) DEFAULT NULL,
  `status` tinyint(1) unsigned DEFAULT NULL,
  `remark` varchar(255) DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `pid` (`pid`),
  KEY `status` (`status`)
) ENGINE=MyISAM AUTO_INCREMENT=14 DEFAULT CHARSET=utf8 COMMENT='角色表';

-- ----------------------------
-- Records of klwl_role
-- ----------------------------
INSERT INTO `klwl_role` VALUES ('8', 'Manager', null, '1', '普通管理员');
INSERT INTO `klwl_role` VALUES ('9', 'Editor', null, '1', '网站管理员');

-- ----------------------------
-- Table structure for klwl_role_user
-- ----------------------------
DROP TABLE IF EXISTS `klwl_role_user`;
CREATE TABLE `klwl_role_user` (
  `role_id` mediumint(9) unsigned DEFAULT NULL,
  `user_id` char(32) DEFAULT NULL,
  KEY `group_id` (`role_id`),
  KEY `user_id` (`user_id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8 COMMENT='角色和用户的中间表';

-- ----------------------------
-- Records of klwl_role_user
-- ----------------------------
INSERT INTO `klwl_role_user` VALUES ('8', '26');
INSERT INTO `klwl_role_user` VALUES ('9', '27');
INSERT INTO `klwl_role_user` VALUES ('8', '28');
INSERT INTO `klwl_role_user` VALUES ('9', '28');
INSERT INTO `klwl_role_user` VALUES ('11', '29');
INSERT INTO `klwl_role_user` VALUES ('0', '29');
INSERT INTO `klwl_role_user` VALUES ('0', '30');
INSERT INTO `klwl_role_user` VALUES ('8', '32');
INSERT INTO `klwl_role_user` VALUES ('9', '32');

-- ----------------------------
-- Table structure for klwl_sendemail
-- ----------------------------
DROP TABLE IF EXISTS `klwl_sendemail`;
CREATE TABLE `klwl_sendemail` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `send` varchar(255) DEFAULT NULL,
  `title` varchar(255) DEFAULT NULL,
  `content` text,
  `status` int(2) DEFAULT NULL,
  `time` int(11) DEFAULT NULL,
  `admin` varchar(255) DEFAULT NULL COMMENT '管理员',
  `name` varchar(255) DEFAULT NULL COMMENT '收件人姓名',
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=5 DEFAULT CHARSET=utf8 COMMENT='邮件';

-- ----------------------------
-- Records of klwl_sendemail
-- ----------------------------
INSERT INTO `klwl_sendemail` VALUES ('1', '1902672259@qq.com', '额度流量提醒', '尊敬的韩万林先生/女士：<br/>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;您好<br/>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;您在流量额度已不足1.60元，为避免您的正常使用，请您及时充值,谢谢...<br/><br/>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;开利网络', '0', '1469262700', null, '韩万林');
INSERT INTO `klwl_sendemail` VALUES ('2', '1902672259@qq.com', '额度流量提醒', '尊敬的韩万林先生/女士：<br/>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;您好<br/>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;您在流量额度已不足1.60元，为避免您的正常使用，请您及时充值,谢谢...<br/><br/>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;开利网络', '0', '1469410726', null, '韩万林');
INSERT INTO `klwl_sendemail` VALUES ('3', '2941126087@qq.com', '额度流量提醒', '尊敬的王勋先生/女士：<br/>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;您好<br/>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;您在流量额度已不足0.00元，为避免您的正常使用，请您及时充值,谢谢...<br/><br/>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;开利网络', '0', '1469441132', null, '王勋');
INSERT INTO `klwl_sendemail` VALUES ('4', '1902672259@qq.com', '测试邮件', '测试邮件测试邮件测试邮件测试邮件测试邮件测试邮件测试邮件测试邮件测试邮件测试邮件测试邮件测试邮件测试邮件测试邮件测试邮件测试邮件测试邮件测试邮件测试邮件测试邮件测试邮件', '0', '1470379865', 'admin', '韩全涛');

-- ----------------------------
-- Table structure for klwl_service
-- ----------------------------
DROP TABLE IF EXISTS `klwl_service`;
CREATE TABLE `klwl_service` (
  `id` int(5) NOT NULL AUTO_INCREMENT,
  `name` varchar(15) DEFAULT NULL,
  `title` varchar(50) DEFAULT NULL,
  `servicenum` varchar(20) DEFAULT NULL,
  `qq` varchar(20) DEFAULT NULL,
  `phone` varchar(20) DEFAULT NULL,
  `status` int(2) DEFAULT '0',
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=3 DEFAULT CHARSET=utf8 COMMENT='客服';

-- ----------------------------
-- Records of klwl_service
-- ----------------------------
INSERT INTO `klwl_service` VALUES ('1', '张三', '售前咨询', '1902672259', '1902672259', '18189554955', '0');
INSERT INTO `klwl_service` VALUES ('2', '李四', '售后咨询', '18189554955', '1818955495', '18189554954', '0');
