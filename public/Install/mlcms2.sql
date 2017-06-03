DROP TABLE IF EXISTS `mlcms_admin`;
CREATE TABLE `mlcms_admin` (
  `id` int(11) NOT NULL COMMENT '管理员ID',
  `username` varchar(50) CHARACTER SET utf8 NOT NULL COMMENT '用户名',
  `password` varchar(50) NOT NULL COMMENT '密码',
  `create_time` int(11) NOT NULL COMMENT '创建时间',
  `create_IP` varchar(20) NOT NULL COMMENT '创建时IP',
  `creator` varchar(50) NOT NULL COMMENT '创建者',
  `last_log_time` int(11) NOT NULL COMMENT '最近一次登陆时间',
  `last_log_IP` varchar(20) NOT NULL COMMENT '最近一次登陆IP',
  `expiry_time` int(11) NOT NULL COMMENT '账户有效期',
  `status` tinyint(4) NOT NULL DEFAULT '0' COMMENT '是否禁用',
  `autority` varchar(100) NOT NULL COMMENT '权限',
  `group_id` int(11) NOT NULL DEFAULT '0' COMMENT '所属用户组ID',
  `email` varchar(30) CHARACTER SET utf8 NOT NULL COMMENT '电子邮件地址',
  `telephone` int(11) NOT NULL COMMENT '电话',
  `QQ` int(11) NOT NULL COMMENT 'QQ号码',
  `address` varchar(80) CHARACTER SET utf8 NOT NULL COMMENT '地址',
  `sort` int(11) NOT NULL DEFAULT '0' COMMENT '管理员排序',
  `language_id` int(1) NOT NULL DEFAULT '1' COMMENT '中英文管理权限'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- 转存表中的数据 `mlcms_admin`
--

INSERT INTO `mlcms_admin` (`id`, `username`, `password`, `create_time`, `create_IP`, `creator`, `last_log_time`, `last_log_IP`, `expiry_time`, `status`, `autority`, `group_id`, `email`, `telephone`, `QQ`, `address`, `sort`, `language_id`) VALUES
(1, 'admin', '21232f297a57a5a743894a0e4a801fc3', 2147483647, '127.0.0.1', 'admin', 1496295271, '127.0.0.1', 1559577600, 1, '1,2,3', 0, '', 0, 0, '', 0, 1),
(3, 'EN-editor', 'f05097334ea1e84694a3da73bebb83fb', 1495079793, '127.0.0.1', 'admin', 1496044125, '127.0.0.1', 1511884800, 1, '', 0, 'asf@af.com', 0, 324324, 'adsfasfd', 0, 2),
(4, 'CH-editor', '21232f297a57a5a743894a0e4a801fc3', 1495079851, '127.0.0.1', 'admin', 1496043761, '127.0.0.1', 1494950400, 1, '', 0, '', 0, 0, '', 0, 1),
(5, 'enen', 'e10adc3949ba59abbe56e057f20f883e', 1495079906, '127.0.0.1', 'admin', 1496049657, '127.0.0.1', 1495209600, 1, '', 0, 'adf@asdf.com', 0, 23423, 'asdfsaf', 0, 2),
(6, 'chch', 'e10adc3949ba59abbe56e057f20f883e', 1495079947, '127.0.0.1', 'admin', 1496046824, '127.0.0.1', 1495555200, 1, '', 0, 'asdf@asf.com', 0, 0, 'adsfasdf', 0, 1),
(7, 'ff', '633de4b0c14ca52ea2432a3c8a5c4c31', 1495079997, '127.0.0.1', 'admin', 1495079997, '127.0.0.1', 1495641600, 1, '', 0, '', 0, 0, '', 3, 0);

-- --------------------------------------------------------

--
-- 表的结构 `mlcms_article`
--

CREATE TABLE `mlcms_article` (
  `id` int(11) NOT NULL COMMENT '文章ID',
  `title` varchar(50) CHARACTER SET utf8 NOT NULL DEFAULT '文章标题' COMMENT '文章标题',
  `key_words` varchar(100) CHARACTER SET utf8 DEFAULT NULL COMMENT '文章关键字',
  `description` varchar(200) CHARACTER SET utf8 DEFAULT NULL COMMENT '文章描述',
  `thumb` varchar(100) CHARACTER SET utf8 DEFAULT NULL COMMENT '缩略图',
  `author` varchar(20) CHARACTER SET utf8 DEFAULT NULL COMMENT '文章作者',
  `create_date` int(11) NOT NULL DEFAULT '0' COMMENT '创建日期',
  `release_date` int(11) DEFAULT NULL COMMENT '发布日期',
  `content` text CHARACTER SET utf8 COMMENT '文章内容',
  `editor` varchar(20) CHARACTER SET utf8 DEFAULT NULL COMMENT '文章编辑（文章发布者）',
  `language_id` tinyint(4) DEFAULT '1' COMMENT '语言ID,1为简体中文，2为美国英语',
  `category_id` tinyint(4) NOT NULL COMMENT '所属栏目',
  `status` tinyint(4) NOT NULL DEFAULT '0' COMMENT '审核状态',
  `clicks` mediumint(9) NOT NULL DEFAULT '0' COMMENT '点击次数',
  `is_recommend` tinyint(1) NOT NULL DEFAULT '0' COMMENT '是否推荐',
  `can_comment` tinyint(4) NOT NULL DEFAULT '0' COMMENT '是否可以评论',
  `sort` int(11) NOT NULL DEFAULT '0' COMMENT '排序',
  `zan` int(11) NOT NULL DEFAULT '0' COMMENT '点赞数'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- 转存表中的数据 `mlcms_article`
--

INSERT INTO `mlcms_article` (`id`, `title`, `key_words`, `description`, `thumb`, `author`, `create_date`, `release_date`, `content`, `editor`, `language_id`, `category_id`, `status`, `clicks`, `is_recommend`, `can_comment`, `sort`, `zan`) VALUES
(2, 'Humen Equipment', 'this article title is a test', 'this article title is a test', '/uploads\\images\\20170531\\f485f569b0bc6202b166b5470afea95d.jpg', 'tis a test', 1496199341, -28800, '<p>this articleZLQ title is a test</p>', 'ZLQ', 2, 70, 1, 30, 1, 1, 5, 0),
(9, 'Bicycle Equipment', 'asdfasdf', 'asdfasdfsa', '/uploads\\images\\20170531\\76db5a8b192a1db09c105f46c9b3e765.jpg', 'asfsf', 1496199252, 1495555200, '<p>asdfasdf</p>', 'ZLQ', 2, 71, 1, 0, 1, 0, 3, 0),
(18, '骑看世界：三个女孩的欧洲骑行之路', '骑看世界：三个女孩的欧洲骑行之路', '骑看世界：三个女孩的欧洲骑行之路', '/uploads\\images\\20170530\\59b6c067676671a76ceebed641aae8c2.jpg', 'ZLQ', 1496114714, 1494345600, '<p>经历了欧洲漫长的冬季，卡佳，凯茜和米歇尔三个女孩决定开始他们本年度第一次roadtrip，于是他们脱离了自己正常的生活模式，开始进入自行车模式开始他们的骑行之旅。她们的第一站是列支敦士登的Ell...</p><p style=\"text-align: center;\"><img src=\"/uploads/images/20170530/1496108310494736.jpg\" title=\"1496108310494736.jpg\" alt=\"352.jpg\"/></p>', 'ZLQ', 1, 53, 1, 83, 1, 0, 0, 21),
(19, '骑看世界：探索地中海科西嘉岛', '骑看世界：探索地中海科西嘉岛', '翻译：dracular 来源：pinkbike从波兰出发，驱车1800公里，再经过几个小时的轮渡就可以到达我们的目的地科西嘉岛了.', '/uploads\\images\\20170530\\8452947ad543e1f11f8b41d7f234b6a4.jpg', '', 1496108410, 1495123200, '<p><span style=\"color: rgb(85, 85, 85); font-family: &#39;Microsoft Yahei&#39;, &#39;Helvetica Neue&#39;, Arial, Helvetica, sans-serif; font-size: 12px; line-height: 25px; background-color: rgb(255, 255, 255);\">翻译：dracular 来源：pinkbike从波兰出发，驱车1800公里，再经过几个小时的轮渡就可以到达我们的目的地科西嘉岛了.</span></p>', NULL, 1, 53, 1, 13, 1, 0, 0, 0),
(20, 'Forward Set x Bicycle Belts联合出品U型锁腰带U-Lock Belt', 'Forward Set x Bicycle Belts联合出品U型锁腰带U-Lock Belt', 'Forward Set和Bicycle Belts似乎提供了一种新的可能，它们联手打造了一款U型锁腰带。这款腰带对于通勤和信使来说可谓相当便捷，腰带本身是采用二手的自行车轮胎改制而成。', '/uploads\\images\\20170530\\d4f4de7c0de01e8dac89c5d835c9d592.jpg', '', 1496108472, 1495036800, '<p><span style=\"color: rgb(85, 85, 85); font-family: &#39;Microsoft Yahei&#39;, &#39;Helvetica Neue&#39;, Arial, Helvetica, sans-serif; font-size: 12px; line-height: 25px; background-color: rgb(255, 255, 255);\">Forward Set和Bicycle Belts似乎提供了一种新的可能，它们联手打造了一款U型锁腰带。这款腰带对于通勤和信使来说可谓相当便捷，腰带本身是采用二手的自行车轮胎改制而成。</span></p><p style=\"text-align: center;\"><img src=\"/uploads/images/20170530/1496108459103977.jpg\" title=\"1496108459103977.jpg\" alt=\"320.jpg\"/></p>', NULL, 1, 53, 1, 3, 1, 0, 0, 0),
(21, '硅胶环保材质 Bone iPhone5 单车号角扬声器', '硅胶环保材质 Bone iPhone5 单车号角扬声器', '', '/uploads\\images\\20170530\\a59cbcae67adaf35031b01b645dd4ce9.jpg', '', 1496108518, 1496108518, '<p><span style=\"color: rgb(85, 85, 85); font-family: &#39;Microsoft Yahei&#39;, &#39;Helvetica Neue&#39;, Arial, Helvetica, sans-serif; font-size: 12px; line-height: 25px; background-color: rgb(255, 255, 255);\">这款Bone iPhone5 单车号角扬声器利用号角的原理，将音源集中后，引导音源传导方向，达到扩大音量的效果，使用后可提高13分贝，并且无需任何外接电源，响应环保，节能减碳。</span></p><p style=\"text-align: center;\"><span style=\"color: rgb(85, 85, 85); font-family: &#39;Microsoft Yahei&#39;, &#39;Helvetica Neue&#39;, Arial, Helvetica, sans-serif; font-size: 12px; line-height: 25px; background-color: rgb(255, 255, 255);\"><img src=\"/uploads/images/20170530/1496108508485355.jpg\" title=\"1496108508485355.jpg\" alt=\"319.jpg\"/></span></p>', NULL, 1, 53, 1, 3, 1, 0, 0, 0),
(22, 'Alain Massabova: 40 Years in Paris BMX 视频', 'Alain Massabova: 40 Years in Paris BMX 视频', 'Alain Massabova最近就走到巴黎，与导演JC Pieri合作，为《ART BMX Magazine》制作出最新的《40 Years in Paris》视频短片。这次Massabova...', '/uploads\\images\\20170530\\b3c11be79286c99180cff80c0f4438c5.jpg', '', 1496117314, 1496073600, '<p><span style=\"color: rgb(85, 85, 85); font-family: &#39;Microsoft Yahei&#39;, &#39;Helvetica Neue&#39;, Arial, Helvetica, sans-serif; font-size: 12px; line-height: 25px; background-color: rgb(255, 255, 255);\">Alain Massabova最近就走到巴黎，与导演JC Pieri合作，为《ART BMX Magazine》制作出最新的《40 Years in Paris》视频短片。这次Massabova...</span></p><p style=\"text-align: center;\"><span style=\"color: rgb(85, 85, 85); font-family: &#39;Microsoft Yahei&#39;, &#39;Helvetica Neue&#39;, Arial, Helvetica, sans-serif; font-size: 12px; line-height: 25px; background-color: rgb(255, 255, 255);\"><img src=\"/uploads/images/20170530/1496108564113393.jpg\" title=\"1496108564113393.jpg\" alt=\"200.jpg\"/></span></p>', 'ZLQ', 1, 53, 1, 1, 1, 0, 0, 0),
(23, 'Tyrell唯一的折叠小径车Tyrell FX', 'Tyrell唯一的折叠小径车Tyrell FX', '来自日本的Tyrell公司一直以生产高端轻量化小径车和顶级零配件著称，除了像AM-7这样的顶级小径车轮组，Tyrell的整车更是实力非凡，旗下产品诸如采用钛合金车架的20寸451轮组的“PK”系...', '/uploads\\images\\20170530\\eba206d3731a83438b430d342e57f400.jpg', '', 1496117345, 1495036800, '<p><span style=\"color: rgb(85, 85, 85); font-family: &#39;Microsoft Yahei&#39;, &#39;Helvetica Neue&#39;, Arial, Helvetica, sans-serif; font-size: 12px; line-height: 25px; background-color: rgb(255, 255, 255);\">来自日本的Tyrell公司一直以生产高端轻量化小径车和顶级零配件著称，除了像AM-7这样的顶级小径车轮组，Tyrell的整车更是实力非凡，旗下产品诸如采用钛合金车架的20寸451轮组的“PK”系...</span></p><p style=\"text-align: center;\"><span style=\"color: rgb(85, 85, 85); font-family: &#39;Microsoft Yahei&#39;, &#39;Helvetica Neue&#39;, Arial, Helvetica, sans-serif; font-size: 12px; line-height: 25px; background-color: rgb(255, 255, 255);\"><img src=\"/uploads/images/20170530/1496108645226045.jpg\" title=\"1496108645226045.jpg\" alt=\"237.jpg\"/></span></p>', 'ZLQ', 1, 53, 1, 3, 1, 1, 0, 0),
(26, 'asfasdf', '', '', NULL, '', 1496114189, 1496114189, '<p>adfasd</p>', 'admin', 1, 53, 1, 1, 1, 0, 0, 0),
(27, 'sdfg', 'asf', 'asdadsf', '/uploads\\images\\20170530\\ce72ed0591546b2274ee5a17a785ae5c.png', 'sdgf', 1496117514, 1496073600, '<p>asdfasdfasfasdf</p><p style=\"text-align: center;\"><img src=\"/uploads/images/20170530/1496117426891016.jpg\" title=\"1496117426891016.jpg\" alt=\"160.jpg\"/></p>', 'ZLQ', 1, 53, 1, 2, 1, 0, 0, 0),
(28, '死飞车', '测试', '测试', '/uploads\\images\\20170530\\17205a5a49cc3454ad9c64762fb39569.jpg', 'ZLQ', 1496143869, 1496073600, '<p style=\"text-align: left;\">水水水水水水水水水水水水水水水水水水水<br/></p><p style=\"text-align: center;\"><img src=\"/uploads/images/20170530/1496143305103555.jpg\" title=\"1496143305103555.jpg\" alt=\"335.jpg\"/></p>', 'ZLQ', 1, 57, 1, 19, 1, 0, 0, 0),
(29, '车身装备', '', '阿道夫阿斯蒂芬', '/uploads\\images\\20170530\\492b996facd436d10fccce450a48d88e.jpg', 'ZLQ', 1496149237, 1496073600, '<p>啊士大夫十分</p>', 'ZLQ', 1, 62, 1, 2, 1, 1, 0, 0),
(30, '人身装备', '啊方法', '收费的撒旦', '/uploads\\images\\20170530\\40cdb9ff665ca30285bce38f18b4cc0c.jpg', 'ZLQ', 1496149220, 1496073600, '<p>啊法撒旦</p>', 'ZLQ', 1, 63, 1, 11, 1, 1, 0, 12),
(31, '骑行装备', '爱的色放', '阿斯顿发生', '/uploads\\images\\20170530\\b8590572b76526911a80111b61fb8558.png', '阿飞', 1496148413, 1496148413, '<p><img src=\"/uploads/images/20170530/1496148408216708.png\" title=\"1496148408216708.png\" alt=\"181.png\"/></p>', 'admin', 1, 54, 1, 15, 1, 1, 0, 0),
(32, '阿斯蒂芬', '', '阿斯顿发生', '/uploads\\images\\20170530\\068415f6d3f92b457ca7b69658eb086d.jpg', '暗室逢灯', 1496150535, 1496073600, '', 'ZLQ', 1, 53, 1, 0, 1, 1, 0, 0),
(33, '阿斯顿发生', '', '阿斯顿发生', '/uploads\\images\\20170530\\a93107fe596538d1260b1f4930efa2c8.png', '啊士大夫但是', 1496150522, 1496073600, '', 'ZLQ', 1, 53, 1, 0, 1, 1, 0, 0),
(34, '啊士大夫撒旦', '啊书法大赛的', '啊十分大师傅', '/uploads\\images\\20170530\\8293f38909adf8c63df85cc81937f4e0.jpg', '', 1496150510, 1496073600, '', 'ZLQ', 1, 53, 1, 0, 1, 1, 0, 0),
(35, '单车生活2', '单车生活2', '单车生活2', '/uploads\\images\\20170530\\ec18d569ac841156f659a37fb071117f.jpg', '单车生活2', 1496151909, 1496151909, '<p>单车生活2</p>', 'admin', 1, 64, 1, 1, 1, 1, 0, 0),
(36, '单车生活2', '', '单车生活2', '/uploads\\images\\20170530\\387b5a4d46c830be975323cbf4f2e6ee.png', '单车生活2', 1496152045, 1496073600, '<p>单车生活2</p>', 'ZLQ', 1, 64, 1, 1, 1, 1, 0, 0),
(37, '单车生活2', '单车生活2', '单车生活2', '/uploads\\images\\20170530\\34faddc3f1f48f3f284c95bdbb28dbf5.jpg', '单车生活2', 1496153529, 1496073600, '<p>单车生活2</p>', 'ZLQ', 1, 64, 1, 1, 1, 1, 0, 0),
(38, '单车生活', '单车生活', '单车生活', '/uploads\\images\\20170530\\c5e163ddc6b7495f475a447e060bff4a.jpg', '单车生活', 1496151985, 1496151985, '<p>单车生活</p>', 'admin', 1, 55, 1, 0, 1, 0, 0, 0),
(39, '单车生活', '单车生活', '单车生活', '/uploads\\images\\20170530\\f943dcecb9470984b6a63eb3d704a954.jpg', '', 1496152023, 1496073600, '<p>v</p>', 'ZLQ', 1, 55, 1, 0, 1, 0, 0, 0),
(40, 'Equipment', 'asdfasdf', '', '/uploads\\images\\20170531\\619ae02180b208f07ee6f5c35bd48b01.jpg', 'adfa', 1496199322, 1496199322, '<p style=\"text-align: center;\"><img src=\"/uploads/images/20170531/1496199314104136.jpg\" title=\"1496199314104136.jpg\" alt=\"200.jpg\"/></p>', 'admin', 2, 70, 1, 0, 1, 0, 0, 0),
(41, 'Bicycle Classyfication', 'asdf', 'adsf', '/uploads\\images\\20170531\\6940b75557d1c3b6e11a8218beaba95c.png', 'adsf', 1496199475, 1496160000, '<p>asdfsaf<img src=\"/uploads/images/20170531/1496199473487722.jpg\" title=\"1496199473487722.jpg\" alt=\"344.jpg\"/></p>', 'ZLQ', 2, 3, 1, 0, 1, 0, 0, 0),
(42, 'Road Bicycle', '', '', '/uploads\\images\\20170531\\0bfc1cddd918e30b8389bb308b84814b.jpg', '', 1496199528, 1496160000, '<p>adsfadsfas</p>', 'ZLQ', 2, 4, 1, 0, 1, 0, 0, 0);

-- --------------------------------------------------------

--
-- 表的结构 `mlcms_auth_group`
--

CREATE TABLE `mlcms_auth_group` (
  `id` mediumint(8) UNSIGNED NOT NULL COMMENT '主键',
  `title` char(100) NOT NULL DEFAULT '' COMMENT '用户组中文名称',
  `status` tinyint(1) NOT NULL DEFAULT '1' COMMENT '状态：为1正常，为0禁用',
  `rules` varchar(150) NOT NULL DEFAULT '' COMMENT '用户组拥有的规则id， 多个规则","隔开'
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

--
-- 转存表中的数据 `mlcms_auth_group`
--

INSERT INTO `mlcms_auth_group` (`id`, `title`, `status`, `rules`) VALUES
(4, '超级管理员', 1, '46,28,30,33,32,31,29,34,35,36,38,37,39,43,42,41,40,45,7,8,5,14,15,17,16,23,27,26,25,24,18,22,21,20,19,1,11,10,9,12,13,3'),
(3, '中文编辑', 0, '46,5,14,15,17,16,18,22,21,20,19'),
(6, '英文编辑', 1, '45,5,14,15,17,16,23,27,26,25,24,18,22,21,20,19,1,11,10,9,12,13,3'),
(7, 'bbb', 1, '1'),
(8, 'dd', 1, '1'),
(9, 'sss', 1, '1'),
(16, 'sssa', 1, '7,8'),
(11, '22', 1, '1'),
(13, 'ddddf', 1, '1'),
(14, 'sssss', 1, '1,3,4,5,6'),
(15, 'dddd', 1, '1,3,4,5,6');

-- --------------------------------------------------------

--
-- 表的结构 `mlcms_auth_group_access`
--

CREATE TABLE `mlcms_auth_group_access` (
  `uid` mediumint(8) UNSIGNED NOT NULL COMMENT '用户id',
  `group_id` mediumint(8) UNSIGNED NOT NULL COMMENT '用户组id'
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

--
-- 转存表中的数据 `mlcms_auth_group_access`
--

INSERT INTO `mlcms_auth_group_access` (`uid`, `group_id`) VALUES
(1, 4),
(3, 3),
(5, 6),
(6, 3);

-- --------------------------------------------------------

--
-- 表的结构 `mlcms_auth_rule`
--

CREATE TABLE `mlcms_auth_rule` (
  `id` mediumint(8) UNSIGNED NOT NULL COMMENT '主键',
  `name` char(80) NOT NULL DEFAULT '' COMMENT '规则唯一标识',
  `title` char(20) NOT NULL DEFAULT '' COMMENT '规则中文名称 ',
  `type` tinyint(1) NOT NULL DEFAULT '1' COMMENT 'type为1， condition字段就可以定义规则表达式。 如定义{score}>5  and {score}<100  表示用户的分数在5-100之间时这条规则才会通过',
  `status` tinyint(1) NOT NULL DEFAULT '1' COMMENT '为1正常，为0禁用',
  `condition` char(100) NOT NULL DEFAULT '' COMMENT '规则表达式，为空表示存在就验证，不为空表示按照条件验证',
  `pid` int(11) NOT NULL DEFAULT '0' COMMENT '上级权限',
  `level` int(11) NOT NULL DEFAULT '0' COMMENT '层次',
  `sort` int(11) NOT NULL DEFAULT '0' COMMENT '排序'
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

--
-- 转存表中的数据 `mlcms_auth_rule`
--

INSERT INTO `mlcms_auth_rule` (`id`, `name`, `title`, `type`, `status`, `condition`, `pid`, `level`, `sort`) VALUES
(1, 'admin', '管理员', 1, 1, '{id}=1', 0, 0, 0),
(3, 'admin/add', '添加管理员', 1, 1, '{id}=1', 1, 1, 1),
(13, 'admin/del', '删除管理员', 1, 1, '{id}=1', 1, 1, 0),
(5, 'article', '文章管理', 1, 1, '{id}=1', 0, 0, 0),
(12, 'admin/edit', '编辑管理员', 1, 1, '{id}=1', 1, 1, 0),
(7, 'System', '系统', 1, 1, '{id}=1', 0, 0, 0),
(8, 'setting/edit', '系统设置', 1, 1, '{id}=1', 7, 1, 0),
(9, 'admin/lst', '管理员列表', 1, 1, '{id}=1', 1, 1, 0),
(10, 'index/index', '管理员列表', 1, 1, '{id}=1', 1, 1, 0),
(11, 'admin/index', '管理员列表', 1, 1, '{id}=1', 1, 1, 0),
(14, 'article/lst', '文章列表', 1, 1, '{id}=1', 5, 1, 0),
(15, 'article/edit', '编辑文章', 1, 1, '{id}=1', 5, 1, 0),
(16, 'article/del', '删除文章', 1, 1, '{id}=1', 5, 1, 0),
(17, 'article/add', '添加文章', 1, 1, '{id}=1', 5, 1, 0),
(18, 'category', '栏目管理', 1, 1, '{id}=1', 0, 0, 0),
(19, 'category/add', '添加栏目', 1, 1, '{id}=1', 18, 1, 0),
(20, 'category/edit', '编辑栏目', 1, 1, '{id}=1', 18, 1, 0),
(21, 'category/lst', '栏目列表', 1, 1, '{id}=1', 18, 1, 0),
(22, 'category/del', '删除栏目', 1, 1, '{id}=1', 18, 1, 0),
(23, 'link', '友情链接', 1, 1, '{id}=1', 0, 0, 0),
(24, 'links/add', '添加链接', 1, 1, '{id}=1', 23, 1, 0),
(25, 'links/edit', '编辑链接', 1, 1, '{id}=1', 23, 1, 0),
(26, 'links/lst', '链接列表', 1, 1, '{id}=1', 23, 1, 0),
(27, 'links/del', '删除链接', 1, 1, '{id}=1', 23, 1, 0),
(28, 'authgroup', '权限管理', 1, 1, '', 0, 0, 0),
(29, 'authgroup/lst', '用户组列表', 1, 1, '{uid}=1', 30, 2, 0),
(30, 'authgroup/', '用户组', 1, 1, '{uid}=1', 28, 1, 0),
(31, 'authgroup/add', '添加用户组', 1, 1, '', 30, 2, 0),
(32, 'authgroup/edit', '编辑用户组', 1, 1, '', 30, 2, 0),
(33, 'authgroup/del', '删除用户组', 1, 1, '', 30, 2, 0),
(34, 'authrule', '规则管理', 1, 1, '', 28, 1, 0),
(35, 'authrule/add', '添加规则', 1, 1, '', 34, 2, 0),
(36, 'authrule/edit', '修改规则', 1, 1, '', 34, 2, 0),
(37, 'authrule/lst', '规则列表', 1, 1, '', 34, 2, 0),
(38, 'authrule/del', '删除规则', 1, 1, '', 34, 2, 0),
(39, 'authgroupaccess', '用户权限管理', 1, 1, '', 28, 1, 0),
(40, 'authgroupaccess/add', '添加用户权限', 1, 1, '', 39, 2, 0),
(41, 'authgroupaccess/edit', '修改用户权限', 1, 1, '', 39, 2, 0),
(42, 'authgroupaccess/del', '删除用户权限', 1, 1, '', 39, 2, 0),
(43, 'authgroupaccess/lst', '用户权限列表', 1, 1, '', 39, 2, 0),
(45, 'en', '英文文章编辑', 1, 1, '', 0, 1, 0),
(46, 'ch', '中文编辑', 1, 1, '', 0, 1, 0);

-- --------------------------------------------------------

--
-- 表的结构 `mlcms_category`
--

CREATE TABLE `mlcms_category` (
  `id` int(11) NOT NULL COMMENT '栏目ID',
  `cate_name` varchar(20) CHARACTER SET utf8 NOT NULL COMMENT '栏目名称',
  `language_id` int(11) NOT NULL DEFAULT '0' COMMENT '语言类型ID',
  `pid` int(11) NOT NULL DEFAULT '0' COMMENT '上级栏目ID',
  `sort` int(11) NOT NULL DEFAULT '0' COMMENT '排序',
  `type` tinyint(4) NOT NULL DEFAULT '0' COMMENT '0表示文章列表，1表示图片列表，2表示单页',
  `status` tinyint(1) NOT NULL DEFAULT '1' COMMENT '栏目是否启用，0为禁用，1为启用',
  `is_recommond` int(11) NOT NULL DEFAULT '1' COMMENT '是否推荐',
  `is_footer` int(11) NOT NULL DEFAULT '1' COMMENT '是否底部显示'
) ENGINE=InnoDB DEFAULT CHARSET=latin1 ROW_FORMAT=COMPACT;

--
-- 转存表中的数据 `mlcms_category`
--

INSERT INTO `mlcms_category` (`id`, `cate_name`, `language_id`, `pid`, `sort`, `type`, `status`, `is_recommond`, `is_footer`) VALUES
(3, 'Bicycle Classificati', 2, 0, 5, 0, 1, 1, 1),
(4, 'Road Bicycle', 2, 3, 4, 0, 1, 1, 1),
(53, '单车分类', 1, 0, 0, 0, 1, 0, 1),
(54, '骑行装备', 1, 0, 0, 0, 1, 0, 1),
(55, '单车生活', 1, 0, 0, 1, 1, 1, 1),
(56, '行业资讯', 1, 0, 0, 2, 1, 0, 1),
(57, '死飞车', 1, 53, 0, 0, 1, 1, 1),
(58, '公路车', 1, 53, 0, 0, 1, 1, 1),
(59, '山地车', 1, 53, 0, 0, 1, 1, 1),
(60, 'BMX', 1, 53, 0, 0, 1, 1, 1),
(61, '折叠/小径车', 1, 53, 0, 0, 1, 1, 1),
(62, '车身装备', 1, 54, 0, 0, 1, 1, 1),
(63, '人身装备', 1, 54, 0, 0, 1, 1, 1),
(64, '单车生活2', 1, 55, 0, 1, 1, 1, 1),
(70, 'Equipment', 2, 0, 0, 0, 1, 1, 1),
(71, 'Bicycle Equipment', 2, 70, 0, 0, 1, 1, 1),
(72, 'Human Equipment', 2, 70, 0, 0, 1, 1, 1),
(73, 'Bycicle Life', 2, 0, 0, 1, 1, 1, 1),
(74, 'About US', 2, 0, 0, 2, 1, 1, 1);

-- --------------------------------------------------------

--
-- 表的结构 `mlcms_language`
--

CREATE TABLE `mlcms_language` (
  `id` int(11) NOT NULL COMMENT '语言ID',
  `brief_name` varchar(10) CHARACTER SET utf8 NOT NULL COMMENT '语言简写，用于在首页切换语言种类',
  `detail_name` varchar(20) CHARACTER SET utf8 NOT NULL COMMENT '语言全称',
  `en_name` varchar(20) NOT NULL COMMENT '英文名称',
  `lang_file_name` varchar(10) CHARACTER SET utf8 NOT NULL COMMENT '语言文件名称',
  `sort` tinyint(4) NOT NULL DEFAULT '0' COMMENT '排序'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- 转存表中的数据 `mlcms_language`
--

INSERT INTO `mlcms_language` (`id`, `brief_name`, `detail_name`, `en_name`, `lang_file_name`, `sort`) VALUES
(1, '简体中文', 'Simplified Chinese', 'Simplified Chinese', 'zh-cn', 0),
(2, 'English', 'American English', 'American English', 'en-us', 0),
(3, '中英文', 'CH-EN', 'ch-en', 'ch-en.php', 0);

-- --------------------------------------------------------

--
-- 表的结构 `mlcms_links`
--

CREATE TABLE `mlcms_links` (
  `id` int(11) NOT NULL COMMENT '友情链接ID',
  `name` varchar(50) CHARACTER SET utf8 NOT NULL DEFAULT '多语言系统' COMMENT '链接名称',
  `url` varchar(50) CHARACTER SET utf8 NOT NULL DEFAULT 'www.dyycms.cn' COMMENT '链接地址',
  `language_id` int(11) NOT NULL DEFAULT '2' COMMENT '1为中文链接，2为英文链接，3为中英文链接',
  `thumb` varchar(80) CHARACTER SET utf8 NOT NULL DEFAULT '' COMMENT '链接地址',
  `is_thumb` tinyint(2) NOT NULL DEFAULT '0' COMMENT '是否有图片，0为无图片，1为有图片',
  `is_recommond` tinyint(2) NOT NULL DEFAULT '0' COMMENT '是否推荐，0为不推荐，1为推荐',
  `sort` int(11) NOT NULL DEFAULT '0' COMMENT '排序'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- 转存表中的数据 `mlcms_links`
--

INSERT INTO `mlcms_links` (`id`, `name`, `url`, `language_id`, `thumb`, `is_thumb`, `is_recommond`, `sort`) VALUES
(6, '网易', 'www.wangyi.com', 2, '/uploads\\images\\20170525\\1f42b528ed60e3da6085c1aad43a1974.jpg', 1, 0, 0),
(7, '新浪', 'www.sina.com', 1, '/uploads\\images\\20170530\\12f8ac1e0b66422f7037d4d2a4e4d925.jpg', 1, 1, 0),
(8, '搜狐', 'www.souhu.com', 1, '', 0, 1, 0);

-- --------------------------------------------------------

--
-- 表的结构 `mlcms_setting`
--

CREATE TABLE `mlcms_setting` (
  `id` int(11) NOT NULL COMMENT '网站ID',
  `site_name` varchar(100) NOT NULL COMMENT '网站名称',
  `site_domain` varchar(50) NOT NULL COMMENT '网站域名',
  `site_switch` tinyint(4) NOT NULL DEFAULT '1' COMMENT '网站开启',
  `site_keywords` varchar(150) NOT NULL COMMENT '网站关键词',
  `site_desciption` varchar(150) NOT NULL COMMENT '网站描述',
  `site_templet` varchar(100) NOT NULL DEFAULT 'default' COMMENT '网站模板',
  `upload_size` int(11) NOT NULL DEFAULT '2048' COMMENT '上传文件大小',
  `upload_type` varchar(150) NOT NULL COMMENT '上传文件类型',
  `GD_test` tinyint(4) NOT NULL COMMENT 'GD库是否可用',
  `GD_test_switch` tinyint(4) NOT NULL DEFAULT '1' COMMENT '水印开关',
  `watermart_condition` varchar(150) NOT NULL COMMENT '水印条件',
  `watermark_image` varchar(100) NOT NULL COMMENT '水印图片',
  `watermark_transparency` smallint(6) NOT NULL DEFAULT '50' COMMENT '水印透明度',
  `watermark_position` tinyint(4) NOT NULL DEFAULT '9' COMMENT '水印位置',
  `site_type` varchar(20) NOT NULL COMMENT '网站类型：ch为中文网站；en为英文网站，language_id=0时为中文，1时为英文',
  `language_id` tinyint(4) NOT NULL COMMENT '语言类型ID'
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COMMENT='网站设置' ROW_FORMAT=COMPACT;

--
-- 转存表中的数据 `mlcms_setting`
--

INSERT INTO `mlcms_setting` (`id`, `site_name`, `site_domain`, `site_switch`, `site_keywords`, `site_desciption`, `site_templet`, `upload_size`, `upload_type`, `GD_test`, `GD_test_switch`, `watermart_condition`, `watermark_image`, `watermark_transparency`, `watermark_position`, `site_type`, `language_id`) VALUES
(1, '我的网站bb', 'http://www.a.com', 1, '关键字', '描述', 'Default', 2048, 'png|gif|jpeg', 1, 0, 'condition', 'image', 80, 7, 'ch', 1),
(2, 'abc', 'http://www.a.com', 1, 'keywords', 'description', 'Default', 2048, 'png|gif|jpeg', 1, 0, 'condition', 'image', 80, 6, 'en', 2);

-- --------------------------------------------------------

--
-- 表的结构 `my`
--

CREATE TABLE `my` (
  `id` int(4) NOT NULL,
  `name` int(11) NOT NULL,
  `address` int(11) NOT NULL,
  `phone` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Indexes for dumped tables
--

--
-- Indexes for table `mlcms_admin`
--
ALTER TABLE `mlcms_admin`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `mlcms_article`
--
ALTER TABLE `mlcms_article`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `mlcms_auth_group`
--
ALTER TABLE `mlcms_auth_group`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `mlcms_auth_group_access`
--
ALTER TABLE `mlcms_auth_group_access`
  ADD UNIQUE KEY `uid_group_id` (`uid`,`group_id`),
  ADD KEY `uid` (`uid`),
  ADD KEY `group_id` (`group_id`);

--
-- Indexes for table `mlcms_auth_rule`
--
ALTER TABLE `mlcms_auth_rule`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `name` (`name`);

--
-- Indexes for table `mlcms_category`
--
ALTER TABLE `mlcms_category`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `id` (`id`);

--
-- Indexes for table `mlcms_language`
--
ALTER TABLE `mlcms_language`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `mlcms_links`
--
ALTER TABLE `mlcms_links`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `mlcms_setting`
--
ALTER TABLE `mlcms_setting`
  ADD PRIMARY KEY (`id`);

--
-- 在导出的表使用AUTO_INCREMENT
--

--
-- 使用表AUTO_INCREMENT `mlcms_admin`
--
ALTER TABLE `mlcms_admin`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT COMMENT '管理员ID', AUTO_INCREMENT=8;
--
-- 使用表AUTO_INCREMENT `mlcms_article`
--
ALTER TABLE `mlcms_article`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT COMMENT '文章ID', AUTO_INCREMENT=43;
--
-- 使用表AUTO_INCREMENT `mlcms_auth_group`
--
ALTER TABLE `mlcms_auth_group`
  MODIFY `id` mediumint(8) UNSIGNED NOT NULL AUTO_INCREMENT COMMENT '主键', AUTO_INCREMENT=17;
--
-- 使用表AUTO_INCREMENT `mlcms_auth_rule`
--
ALTER TABLE `mlcms_auth_rule`
  MODIFY `id` mediumint(8) UNSIGNED NOT NULL AUTO_INCREMENT COMMENT '主键', AUTO_INCREMENT=47;
--
-- 使用表AUTO_INCREMENT `mlcms_category`
--
ALTER TABLE `mlcms_category`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT COMMENT '栏目ID', AUTO_INCREMENT=75;
--
-- 使用表AUTO_INCREMENT `mlcms_language`
--
ALTER TABLE `mlcms_language`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT COMMENT '语言ID', AUTO_INCREMENT=4;
--
-- 使用表AUTO_INCREMENT `mlcms_links`
--
ALTER TABLE `mlcms_links`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT COMMENT '友情链接ID', AUTO_INCREMENT=9;
--
-- 使用表AUTO_INCREMENT `mlcms_setting`
--
ALTER TABLE `mlcms_setting`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT COMMENT '网站ID', AUTO_INCREMENT=3;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
