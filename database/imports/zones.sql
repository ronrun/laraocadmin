/*
Navicat MySQL Data Transfer

Source Server         : localhost
Source Server Version : 50505
Source Host           : localhost:3306
Source Database       : wwwprojbonus_stage

Target Server Type    : MYSQL
Target Server Version : 50505
File Encoding         : 65001

Date: 2017-07-03 19:46:28
*/

SET FOREIGN_KEY_CHECKS=0;

-- ----------------------------
-- Table structure for `zones`
-- ----------------------------
DROP TABLE IF EXISTS `zones`;
CREATE TABLE `zones` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `parent_id` int(11) DEFAULT NULL,
  `postcode` varchar(5) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `zone` varchar(128) COLLATE utf8mb4_unicode_ci NOT NULL,
  `country_id` int(11) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=259 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- ----------------------------
-- Records of zones
-- ----------------------------
INSERT INTO `zones` VALUES ('1', null, '', '台北市', '0');
INSERT INTO `zones` VALUES ('2', '1', '100', '中正區', '0');
INSERT INTO `zones` VALUES ('3', '1', '103', '大同區', '0');
INSERT INTO `zones` VALUES ('4', '1', '104', '中山區', '0');
INSERT INTO `zones` VALUES ('5', '1', '105', '松山區', '0');
INSERT INTO `zones` VALUES ('6', '1', '106', '大安區', '0');
INSERT INTO `zones` VALUES ('7', '1', '108', '萬華區', '0');
INSERT INTO `zones` VALUES ('8', '1', '110', '信義區', '0');
INSERT INTO `zones` VALUES ('9', '1', '111', '士林區', '0');
INSERT INTO `zones` VALUES ('10', '1', '112', '北投區', '0');
INSERT INTO `zones` VALUES ('11', '1', '114', '內湖區', '0');
INSERT INTO `zones` VALUES ('12', '1', '115', '南港區', '0');
INSERT INTO `zones` VALUES ('13', '1', '116', '文山區', '0');
INSERT INTO `zones` VALUES ('14', null, '', '基隆市', '0');
INSERT INTO `zones` VALUES ('15', '14', '200', '仁愛區', '0');
INSERT INTO `zones` VALUES ('16', '14', '201', '信義區', '0');
INSERT INTO `zones` VALUES ('17', '14', '202', '中正區', '0');
INSERT INTO `zones` VALUES ('18', '14', '203', '中山區', '0');
INSERT INTO `zones` VALUES ('19', '14', '204', '安樂區', '0');
INSERT INTO `zones` VALUES ('20', '14', '205', '暖暖區', '0');
INSERT INTO `zones` VALUES ('21', '14', '206', '七堵區', '0');
INSERT INTO `zones` VALUES ('22', null, '', '新北市', '0');
INSERT INTO `zones` VALUES ('23', '22', '207', '萬里區', '0');
INSERT INTO `zones` VALUES ('24', '22', '208', '金山區', '0');
INSERT INTO `zones` VALUES ('25', '22', '220', '板橋區', '0');
INSERT INTO `zones` VALUES ('26', '22', '221', '汐止區', '0');
INSERT INTO `zones` VALUES ('27', '22', '222', '深坑區', '0');
INSERT INTO `zones` VALUES ('28', '22', '223', '石碇區', '0');
INSERT INTO `zones` VALUES ('29', '22', '224', '瑞芳區', '0');
INSERT INTO `zones` VALUES ('30', '22', '226', '平溪區', '0');
INSERT INTO `zones` VALUES ('31', '22', '227', '雙溪區', '0');
INSERT INTO `zones` VALUES ('32', '22', '228', '貢寮區', '0');
INSERT INTO `zones` VALUES ('33', '22', '231', '新店區', '0');
INSERT INTO `zones` VALUES ('34', '22', '232', '坪林區', '0');
INSERT INTO `zones` VALUES ('35', '22', '233', '烏來區', '0');
INSERT INTO `zones` VALUES ('36', '22', '234', '永和區', '0');
INSERT INTO `zones` VALUES ('37', '22', '235', '中和區', '0');
INSERT INTO `zones` VALUES ('38', '22', '236', '土城區', '0');
INSERT INTO `zones` VALUES ('39', '22', '237', '三峽區', '0');
INSERT INTO `zones` VALUES ('40', '22', '238', '樹林區', '0');
INSERT INTO `zones` VALUES ('41', '22', '239', '鶯歌區', '0');
INSERT INTO `zones` VALUES ('42', '22', '241', '三重區', '0');
INSERT INTO `zones` VALUES ('43', '22', '242', '新莊區', '0');
INSERT INTO `zones` VALUES ('44', '22', '243', '泰山區', '0');
INSERT INTO `zones` VALUES ('45', '22', '244', '林口區', '0');
INSERT INTO `zones` VALUES ('46', '22', '247', '蘆洲區', '0');
INSERT INTO `zones` VALUES ('47', '22', '248', '五股區', '0');
INSERT INTO `zones` VALUES ('48', '22', '249', '八里區', '0');
INSERT INTO `zones` VALUES ('49', '22', '251', '淡水區', '0');
INSERT INTO `zones` VALUES ('50', '22', '252', '三芝區', '0');
INSERT INTO `zones` VALUES ('51', '22', '253', '石門區', '0');
INSERT INTO `zones` VALUES ('52', null, '', '宜蘭縣', '0');
INSERT INTO `zones` VALUES ('53', '52', '260', '宜   蘭', '0');
INSERT INTO `zones` VALUES ('54', '52', '261', '頭   城', '0');
INSERT INTO `zones` VALUES ('55', '52', '262', '礁   溪', '0');
INSERT INTO `zones` VALUES ('56', '52', '263', '壯   圍', '0');
INSERT INTO `zones` VALUES ('57', '52', '264', '員   山', '0');
INSERT INTO `zones` VALUES ('58', '52', '265', '羅   東', '0');
INSERT INTO `zones` VALUES ('59', '52', '266', '三   星', '0');
INSERT INTO `zones` VALUES ('60', '52', '267', '大   同', '0');
INSERT INTO `zones` VALUES ('61', '52', '268', '五   結', '0');
INSERT INTO `zones` VALUES ('62', '52', '269', '冬   山', '0');
INSERT INTO `zones` VALUES ('63', '52', '270', '蘇   澳', '0');
INSERT INTO `zones` VALUES ('64', '52', '272', '南   澳', '0');
INSERT INTO `zones` VALUES ('65', '52', '290', '釣魚臺列嶼', '0');
INSERT INTO `zones` VALUES ('66', null, '300', '新竹市', '0');
INSERT INTO `zones` VALUES ('67', null, '', '新竹縣', '0');
INSERT INTO `zones` VALUES ('68', '67', '302', '竹   北', '0');
INSERT INTO `zones` VALUES ('69', '67', '303', '湖   口', '0');
INSERT INTO `zones` VALUES ('70', '67', '304', '新   豐', '0');
INSERT INTO `zones` VALUES ('71', '67', '305', '新   埔', '0');
INSERT INTO `zones` VALUES ('72', '67', '306', '關   西', '0');
INSERT INTO `zones` VALUES ('73', '67', '307', '芎   林', '0');
INSERT INTO `zones` VALUES ('74', '67', '308', '寶   山', '0');
INSERT INTO `zones` VALUES ('75', '67', '310', '竹   東', '0');
INSERT INTO `zones` VALUES ('76', '67', '311', '五   峰', '0');
INSERT INTO `zones` VALUES ('77', '67', '312', '橫   山', '0');
INSERT INTO `zones` VALUES ('78', '67', '313', '尖   石', '0');
INSERT INTO `zones` VALUES ('79', '67', '314', '北   埔', '0');
INSERT INTO `zones` VALUES ('80', '67', '315', '峨   眉', '0');
INSERT INTO `zones` VALUES ('81', null, '', '桃園市', '0');
INSERT INTO `zones` VALUES ('82', '81', '320', '中壢區', '0');
INSERT INTO `zones` VALUES ('83', '81', '324', '平鎮區', '0');
INSERT INTO `zones` VALUES ('84', '81', '325', '龍潭區', '0');
INSERT INTO `zones` VALUES ('85', '81', '326', '楊梅區', '0');
INSERT INTO `zones` VALUES ('86', '81', '327', '新屋區', '0');
INSERT INTO `zones` VALUES ('87', '81', '328', '觀音區', '0');
INSERT INTO `zones` VALUES ('88', '81', '330', '桃園區', '0');
INSERT INTO `zones` VALUES ('89', '81', '333', '龜山區', '0');
INSERT INTO `zones` VALUES ('90', '81', '334', '八德區', '0');
INSERT INTO `zones` VALUES ('91', '81', '335', '大溪區', '0');
INSERT INTO `zones` VALUES ('92', '81', '336', '復興區', '0');
INSERT INTO `zones` VALUES ('93', '81', '337', '大園區', '0');
INSERT INTO `zones` VALUES ('94', '81', '338', '蘆竹區', '0');
INSERT INTO `zones` VALUES ('95', null, '', '苗栗縣', '0');
INSERT INTO `zones` VALUES ('96', '95', '350', '竹   南', '0');
INSERT INTO `zones` VALUES ('97', '95', '351', '頭   份', '0');
INSERT INTO `zones` VALUES ('98', '95', '352', '三   灣', '0');
INSERT INTO `zones` VALUES ('99', '95', '353', '南   庄', '0');
INSERT INTO `zones` VALUES ('100', '95', '354', '獅   潭', '0');
INSERT INTO `zones` VALUES ('101', '95', '356', '後   龍', '0');
INSERT INTO `zones` VALUES ('102', '95', '357', '通   霄', '0');
INSERT INTO `zones` VALUES ('103', '95', '358', '苑   裡', '0');
INSERT INTO `zones` VALUES ('104', '95', '360', '苗   栗', '0');
INSERT INTO `zones` VALUES ('105', '95', '361', '造   橋', '0');
INSERT INTO `zones` VALUES ('106', '95', '362', '頭   屋', '0');
INSERT INTO `zones` VALUES ('107', '95', '363', '公   館', '0');
INSERT INTO `zones` VALUES ('108', '95', '364', '大   湖', '0');
INSERT INTO `zones` VALUES ('109', '95', '365', '泰   安', '0');
INSERT INTO `zones` VALUES ('110', '95', '366', '銅   鑼', '0');
INSERT INTO `zones` VALUES ('111', '95', '367', '三   義', '0');
INSERT INTO `zones` VALUES ('112', '95', '368', '西   湖', '0');
INSERT INTO `zones` VALUES ('113', '95', '369', '卓   蘭', '0');
INSERT INTO `zones` VALUES ('114', null, '', '台中市', '0');
INSERT INTO `zones` VALUES ('115', '114', '400', '中   區', '0');
INSERT INTO `zones` VALUES ('116', '114', '401', '東   區', '0');
INSERT INTO `zones` VALUES ('117', '114', '402', '南   區', '0');
INSERT INTO `zones` VALUES ('118', '114', '403', '西   區', '0');
INSERT INTO `zones` VALUES ('119', '114', '404', '北   區', '0');
INSERT INTO `zones` VALUES ('120', '114', '406', '北屯區', '0');
INSERT INTO `zones` VALUES ('121', '114', '407', '西屯區', '0');
INSERT INTO `zones` VALUES ('122', '114', '408', '南屯區', '0');
INSERT INTO `zones` VALUES ('123', '114', '411', '太平區', '0');
INSERT INTO `zones` VALUES ('124', '114', '412', '大里區', '0');
INSERT INTO `zones` VALUES ('125', '114', '413', '霧峰區', '0');
INSERT INTO `zones` VALUES ('126', '114', '414', '烏日區', '0');
INSERT INTO `zones` VALUES ('127', '114', '420', '豐原區', '0');
INSERT INTO `zones` VALUES ('128', '114', '421', '后里區', '0');
INSERT INTO `zones` VALUES ('129', '114', '422', '石岡區', '0');
INSERT INTO `zones` VALUES ('130', '114', '423', '東勢區', '0');
INSERT INTO `zones` VALUES ('131', '114', '424', '和平區', '0');
INSERT INTO `zones` VALUES ('132', '114', '426', '新社區', '0');
INSERT INTO `zones` VALUES ('133', '114', '427', '潭子區', '0');
INSERT INTO `zones` VALUES ('134', '114', '428', '大雅區', '0');
INSERT INTO `zones` VALUES ('135', '114', '429', '神岡區', '0');
INSERT INTO `zones` VALUES ('136', '114', '432', '大肚區', '0');
INSERT INTO `zones` VALUES ('137', '114', '433', '沙鹿區', '0');
INSERT INTO `zones` VALUES ('138', '114', '434', '龍井區', '0');
INSERT INTO `zones` VALUES ('139', '114', '435', '梧棲區', '0');
INSERT INTO `zones` VALUES ('140', '114', '436', '清水區', '0');
INSERT INTO `zones` VALUES ('141', '114', '437', '大甲區', '0');
INSERT INTO `zones` VALUES ('142', '114', '438', '外埔區', '0');
INSERT INTO `zones` VALUES ('143', '114', '439', '大安區', '0');
INSERT INTO `zones` VALUES ('144', null, '', '彰化縣', '0');
INSERT INTO `zones` VALUES ('145', '145', '500', '彰   化', '0');
INSERT INTO `zones` VALUES ('146', '145', '502', '芬   園', '0');
INSERT INTO `zones` VALUES ('147', '145', '503', '花   壇', '0');
INSERT INTO `zones` VALUES ('148', '145', '504', '秀   水', '0');
INSERT INTO `zones` VALUES ('149', '145', '505', '鹿   港', '0');
INSERT INTO `zones` VALUES ('150', '145', '506', '福   興', '0');
INSERT INTO `zones` VALUES ('151', '145', '507', '線   西', '0');
INSERT INTO `zones` VALUES ('152', '145', '508', '和   美', '0');
INSERT INTO `zones` VALUES ('153', '145', '509', '伸   港', '0');
INSERT INTO `zones` VALUES ('154', '145', '510', '員   林', '0');
INSERT INTO `zones` VALUES ('155', '145', '511', '社   頭', '0');
INSERT INTO `zones` VALUES ('156', '145', '512', '永   靖', '0');
INSERT INTO `zones` VALUES ('157', '145', '513', '埔   心', '0');
INSERT INTO `zones` VALUES ('158', '145', '514', '溪   湖', '0');
INSERT INTO `zones` VALUES ('159', '145', '515', '大   村', '0');
INSERT INTO `zones` VALUES ('160', '145', '516', '埔   鹽', '0');
INSERT INTO `zones` VALUES ('161', '145', '520', '田   中', '0');
INSERT INTO `zones` VALUES ('162', '145', '521', '北   斗', '0');
INSERT INTO `zones` VALUES ('163', '145', '522', '田   尾', '0');
INSERT INTO `zones` VALUES ('164', '145', '523', '埤   頭', '0');
INSERT INTO `zones` VALUES ('165', '145', '524', '溪   州', '0');
INSERT INTO `zones` VALUES ('166', '145', '525', '竹   塘', '0');
INSERT INTO `zones` VALUES ('167', '145', '526', '二   林', '0');
INSERT INTO `zones` VALUES ('168', '145', '527', '大   城', '0');
INSERT INTO `zones` VALUES ('169', '145', '528', '芳   苑', '0');
INSERT INTO `zones` VALUES ('170', '145', '530', '二   水', '0');
INSERT INTO `zones` VALUES ('171', null, '', '南投縣', '0');
INSERT INTO `zones` VALUES ('172', '172', '540', '南   投', '0');
INSERT INTO `zones` VALUES ('173', '172', '541', '中   寮', '0');
INSERT INTO `zones` VALUES ('174', '172', '542', '草   屯', '0');
INSERT INTO `zones` VALUES ('175', '172', '544', '國   姓', '0');
INSERT INTO `zones` VALUES ('176', '172', '545', '埔   里', '0');
INSERT INTO `zones` VALUES ('177', '172', '546', '仁   愛', '0');
INSERT INTO `zones` VALUES ('178', '172', '551', '名   間', '0');
INSERT INTO `zones` VALUES ('179', '172', '552', '集   集', '0');
INSERT INTO `zones` VALUES ('180', '172', '553', '水   里', '0');
INSERT INTO `zones` VALUES ('181', '172', '555', '魚   池', '0');
INSERT INTO `zones` VALUES ('182', '172', '556', '信   義', '0');
INSERT INTO `zones` VALUES ('183', '172', '557', '竹   山', '0');
INSERT INTO `zones` VALUES ('184', '172', '558', '鹿   谷', '0');
INSERT INTO `zones` VALUES ('185', '172', '600', '嘉義市', '0');
INSERT INTO `zones` VALUES ('186', null, '', '嘉義縣', '0');
INSERT INTO `zones` VALUES ('187', '186', '602', '番   路', '0');
INSERT INTO `zones` VALUES ('188', '186', '603', '梅   山', '0');
INSERT INTO `zones` VALUES ('189', '186', '604', '竹   崎', '0');
INSERT INTO `zones` VALUES ('190', '186', '605', '阿里山', '0');
INSERT INTO `zones` VALUES ('191', '186', '606', '中   埔', '0');
INSERT INTO `zones` VALUES ('192', '186', '607', '大   埔', '0');
INSERT INTO `zones` VALUES ('193', '186', '608', '水   上', '0');
INSERT INTO `zones` VALUES ('194', '186', '611', '鹿   草', '0');
INSERT INTO `zones` VALUES ('195', '186', '612', '太   保', '0');
INSERT INTO `zones` VALUES ('196', '186', '613', '朴   子', '0');
INSERT INTO `zones` VALUES ('197', '186', '614', '東   石', '0');
INSERT INTO `zones` VALUES ('198', null, '', '台南市', '0');
INSERT INTO `zones` VALUES ('199', '198', '923', '萬   巒', '0');
INSERT INTO `zones` VALUES ('200', '198', '924', '崁   頂', '0');
INSERT INTO `zones` VALUES ('201', '198', '925', '新   埤', '0');
INSERT INTO `zones` VALUES ('202', '198', '926', '南   州', '0');
INSERT INTO `zones` VALUES ('203', '198', '927', '林   邊', '0');
INSERT INTO `zones` VALUES ('204', '198', '928', '東   港', '0');
INSERT INTO `zones` VALUES ('205', '198', '929', '琉   球', '0');
INSERT INTO `zones` VALUES ('206', '198', '931', '佳   冬', '0');
INSERT INTO `zones` VALUES ('207', '198', '932', '新   園', '0');
INSERT INTO `zones` VALUES ('208', '198', '940', '枋   寮', '0');
INSERT INTO `zones` VALUES ('209', '198', '941', '枋   山', '0');
INSERT INTO `zones` VALUES ('210', '198', '942', '春   日', '0');
INSERT INTO `zones` VALUES ('211', '198', '943', '獅   子', '0');
INSERT INTO `zones` VALUES ('212', '198', '944', '車   城', '0');
INSERT INTO `zones` VALUES ('213', '198', '945', '牡   丹', '0');
INSERT INTO `zones` VALUES ('214', '198', '946', '恆   春', '0');
INSERT INTO `zones` VALUES ('215', '198', '947', '滿   州', '0');
INSERT INTO `zones` VALUES ('216', null, '', '台東縣', '0');
INSERT INTO `zones` VALUES ('217', '216', '950', '臺   東', '0');
INSERT INTO `zones` VALUES ('218', '216', '951', '綠   島', '0');
INSERT INTO `zones` VALUES ('219', '216', '952', '蘭   嶼', '0');
INSERT INTO `zones` VALUES ('220', '216', '953', '延   平', '0');
INSERT INTO `zones` VALUES ('221', '216', '954', '卑   南', '0');
INSERT INTO `zones` VALUES ('222', '216', '955', '鹿   野', '0');
INSERT INTO `zones` VALUES ('223', '216', '956', '關   山', '0');
INSERT INTO `zones` VALUES ('224', '216', '957', '海   端', '0');
INSERT INTO `zones` VALUES ('225', '216', '958', '池   上', '0');
INSERT INTO `zones` VALUES ('226', '216', '959', '東   河', '0');
INSERT INTO `zones` VALUES ('227', '216', '961', '成   功', '0');
INSERT INTO `zones` VALUES ('228', '216', '962', '長   濱', '0');
INSERT INTO `zones` VALUES ('229', '216', '963', '太麻里', '0');
INSERT INTO `zones` VALUES ('230', '216', '964', '金   峰', '0');
INSERT INTO `zones` VALUES ('231', '216', '965', '大   武', '0');
INSERT INTO `zones` VALUES ('232', '216', '966', '達   仁', '0');
INSERT INTO `zones` VALUES ('233', null, '', '花蓮縣', '0');
INSERT INTO `zones` VALUES ('234', '233', '970', '花   蓮', '0');
INSERT INTO `zones` VALUES ('235', '233', '971', '新   城', '0');
INSERT INTO `zones` VALUES ('236', '233', '972', '秀   林', '0');
INSERT INTO `zones` VALUES ('237', '233', '973', '吉   安', '0');
INSERT INTO `zones` VALUES ('238', '233', '974', '壽   豐', '0');
INSERT INTO `zones` VALUES ('239', '233', '975', '鳳   林', '0');
INSERT INTO `zones` VALUES ('240', '233', '976', '光   復', '0');
INSERT INTO `zones` VALUES ('241', '233', '977', '豐   濱', '0');
INSERT INTO `zones` VALUES ('242', '233', '978', '瑞   穗', '0');
INSERT INTO `zones` VALUES ('243', '233', '979', '萬   榮', '0');
INSERT INTO `zones` VALUES ('244', '233', '981', '玉   里', '0');
INSERT INTO `zones` VALUES ('245', '233', '982', '卓   溪', '0');
INSERT INTO `zones` VALUES ('246', '233', '983', '富   里', '0');
INSERT INTO `zones` VALUES ('247', null, '', '金門縣', '0');
INSERT INTO `zones` VALUES ('248', '247', '890', '金   沙', '0');
INSERT INTO `zones` VALUES ('249', '247', '891', '金   湖', '0');
INSERT INTO `zones` VALUES ('250', '247', '892', '金   寧', '0');
INSERT INTO `zones` VALUES ('251', '247', '893', '金   城', '0');
INSERT INTO `zones` VALUES ('252', '247', '894', '烈   嶼', '0');
INSERT INTO `zones` VALUES ('253', '247', '896', '烏   坵', '0');
INSERT INTO `zones` VALUES ('254', null, '', '連江縣', '0');
INSERT INTO `zones` VALUES ('255', '254', '209', '南   竿', '0');
INSERT INTO `zones` VALUES ('256', '254', '210', '北   竿', '0');
INSERT INTO `zones` VALUES ('257', '254', '211', '莒   光', '0');
INSERT INTO `zones` VALUES ('258', '254', '212', '東   引', '0');
