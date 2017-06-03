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
--
-- 表的结构 `my`
--

CREATE TABLE IF NOT EXISTS `my` (
  `id` int(4) NOT NULL,
  `name` int(11) NOT NULL,
  `address` int(11) NOT NULL,
  `phone` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;
