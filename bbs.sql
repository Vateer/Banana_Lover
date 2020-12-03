-- phpMyAdmin SQL Dump
-- version 4.0.4
-- http://www.phpmyadmin.net
--
-- 主机: localhost
-- 生成日期: 2020 年 12 月 03 日 14:50
-- 服务器版本: 5.6.12-log
-- PHP 版本: 5.4.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- 数据库: `bbs`
--
CREATE DATABASE IF NOT EXISTS `bbs` DEFAULT CHARACTER SET latin1 COLLATE latin1_swedish_ci;
USE `bbs`;

-- --------------------------------------------------------

--
-- 表的结构 `content`
--

CREATE TABLE IF NOT EXISTS `content` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `module_id` int(10) unsigned NOT NULL,
  `title` varchar(255) NOT NULL,
  `content` text NOT NULL,
  `time` datetime NOT NULL,
  `member_id` int(10) unsigned NOT NULL,
  `times` int(10) unsigned NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 AUTO_INCREMENT=40 ;

--
-- 转存表中的数据 `content`
--

INSERT INTO `content` (`id`, `module_id`, `title`, `content`, `time`, `member_id`, `times`) VALUES
(22, 11, 'ooo', 'sss', '2019-05-18 09:31:44', 8, 2),
(23, 12, '蜘蛛侠', '蜘蛛侠', '2019-05-18 18:51:45', 3, 2),
(21, 5, '就算是日落，也有一万种颜色', 'ss8', '2019-05-18 09:22:16', 1, 18),
(20, 6, '黑寡妇', '11', '2019-05-18 09:19:01', 11, 7),
(19, 11, '小新很可爱', '可爱', '2019-05-18 09:10:36', 11, 2),
(29, 14, '荷兰弟即幽默又帅气', '作为这个世界上最具有吸引力、最受追捧的超级英雄之一，蜘蛛侠是很多人的童年记忆之一。荷兰弟饰演的蜘蛛侠真的好帅', '2019-05-26 12:08:43', 13, 3),
(28, 13, '布鲁斯.韦恩的简介', '布鲁斯·韦恩出生在哥谭市四大家族之一的韦恩家族中。一天晚上，父母带着年幼的布鲁斯看完电影《佐罗》回家，途经一条小径时遭遇歹徒抢劫。歹徒当着布鲁斯的面，残忍的杀了他的父母。<br />\r\n从此，布鲁斯便产生了亲手铲除罪恶的强烈愿望，为了不让其他人再遭受到与自己同样的悲剧，布鲁斯凭借过人天赋，用几十年时间游历世界各地，拜访东西方顶级或传说中的格斗大师，学习各流派格斗术。<br />\r\n后回到美国，利用强大的财力制造各种高科技装备。此后在白天，他是别人眼中的富二代、花花公子；夜晚，他是令罪犯闻风丧胆的黑暗骑士——蝙蝠侠。', '2019-05-25 15:27:37', 12, 4),
(17, 6, '钢铁侠', '钢铁侠战死f', '2019-05-18 09:07:05', 11, 4),
(0, 0, '', '', '0000-00-00 00:00:00', 0, 0),
(15, 6, 'Flag还是要立的，万一实现了呢？', 'dff', '2019-05-17 20:29:10', 8, 4),
(13, 11, '我感恩', 'sd', '2019-05-17 20:25:27', 8, 0),
(24, 1, 'Flag还是要立的，万一实现了哪？', '5669uu5', '2019-05-19 10:31:06', 3, 123),
(31, 15, '钢铁侠马克战甲', '复联四的战甲简直帅爆了', '2019-05-26 12:14:18', 14, 2),
(32, 16, ' 白金汉宫', '白金汉宫(Buckingham Palace）英国的王宫。建造在威斯敏斯特城内，是一座四层楼的正方形围院建筑，宫内有典礼厅、音乐厅、宴会厅、画廊等六百余个房间。在宫前广场有胜利女神像站在高高的大理石台上，金光闪闪。正面的大门富丽堂皇，外栅栏的金色装饰威严庄重，厚重铁门的浮雕营造出与宫殿十分和谐的氛围。围墙里面，可以看到那些著名的近卫军士兵纹丝不动地伫立着。周围占地广阔的御花园，为典型的英式风格园林。 白金汉宫建于1703年，最早称白金汉屋，意思是“他人的家”。1762年，王室将其买下，又不断加以改装、增建，最终形成了这座色调不尽一致，式样五花八门的“补丁宫殿”。 当女王住在宫中时，王室旗帜会在宫殿中央高高飘扬。55', '2019-05-26 12:15:38', 14, 2),
(33, 17, '迪拜赛车场', '迪拜赛车场是为那些喜欢赛车的人设计的，这是一个长5.4公里的赛道，你可以在那里实现你成为赛车手的梦想，他们有各种各样的跑车，让游客的体验更加放纵。', '2019-05-26 12:17:07', 14, 0),
(34, 19, '大叔吃饭的表情绝了', '看大叔吃饭也是一种享受', '2019-05-26 12:21:31', 15, 1),
(35, 21, '布鲁斯.韦恩的管家', '是前英国特种兵，冷静，幽默。', '2019-05-26 12:29:03', 15, 2),
(36, 13, '霸气', '小小的年纪，却有不一样的心胸', '2019-05-26 12:35:34', 16, 0),
(39, 20, '转眼就到大三了', '没挂过科\r\n没交过女朋友\r\n大学必做两件事都没做成\r\n', '2020-12-03 22:47:13', 18, 1);

-- --------------------------------------------------------

--
-- 表的结构 `father_module`
--

CREATE TABLE IF NOT EXISTS `father_module` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `module_name` varchar(66) NOT NULL,
  `sort` int(11) NOT NULL DEFAULT '0',
  PRIMARY KEY (`id`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 COMMENT='父板块信息表' AUTO_INCREMENT=20 ;

--
-- 转存表中的数据 `father_module`
--

INSERT INTO `father_module` (`id`, `module_name`, `sort`) VALUES
(19, '大学生活', 0);

-- --------------------------------------------------------

--
-- 表的结构 `info`
--

CREATE TABLE IF NOT EXISTS `info` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `title` varchar(255) NOT NULL,
  `keywords` varchar(255) NOT NULL,
  `description` varchar(255) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 AUTO_INCREMENT=2 ;

--
-- 转存表中的数据 `info`
--

INSERT INTO `info` (`id`, `title`, `keywords`, `description`) VALUES
(1, '且听风吟', '且听风吟', '豁达');

-- --------------------------------------------------------

--
-- 表的结构 `manage`
--

CREATE TABLE IF NOT EXISTS `manage` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(32) NOT NULL,
  `pw` varchar(32) NOT NULL,
  `create_time` datetime NOT NULL,
  `level` tinyint(4) NOT NULL DEFAULT '1',
  PRIMARY KEY (`id`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 AUTO_INCREMENT=6 ;

--
-- 转存表中的数据 `manage`
--

INSERT INTO `manage` (`id`, `name`, `pw`, `create_time`, `level`) VALUES
(5, '且听风吟', 'e10adc3949ba59abbe56e057f20f883e', '2019-05-26 14:14:49', 0),
(2, '戈登', 'e10adc3949ba59abbe56e057f20f883e', '2019-05-25 16:35:51', 0),
(4, '测试', 'e10adc3949ba59abbe56e057f20f883e', '2019-05-25 18:44:18', 1);

-- --------------------------------------------------------

--
-- 表的结构 `member`
--

CREATE TABLE IF NOT EXISTS `member` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(32) NOT NULL,
  `pw` varchar(32) NOT NULL,
  `photo` varchar(255) NOT NULL,
  `register_time` datetime NOT NULL,
  `last_time` datetime NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 AUTO_INCREMENT=19 ;

--
-- 转存表中的数据 `member`
--

INSERT INTO `member` (`id`, `name`, `pw`, `photo`, `register_time`, `last_time`) VALUES
(1, 'HN-PDSU-QT', 'e10adc3949ba59abbe56e057f20f883e', '', '2019-05-13 19:54:04', '0000-00-00 00:00:00'),
(2, 'HN-PDSU-QTFY', 'e10adc3949ba59abbe56e057f20f883e', '', '2019-05-13 19:57:48', '0000-00-00 00:00:00'),
(3, 'HN-赵志豪', 'e10adc3949ba59abbe56e057f20f883e', 'uploads/2019/05/25/2806105ce8b7fc67068361923372.jpg', '2019-05-13 21:05:04', '0000-00-00 00:00:00'),
(7, '测试', 'e10adc3949ba59abbe56e057f20f883e', '', '2019-05-17 20:14:09', '0000-00-00 00:00:00'),
(8, '测试2', 'e10adc3949ba59abbe56e057f20f883e', '', '2019-05-17 20:19:35', '0000-00-00 00:00:00'),
(9, 'cs3', 'e10adc3949ba59abbe56e057f20f883e', '', '2019-05-17 20:35:25', '0000-00-00 00:00:00'),
(10, 'C', 'e10adc3949ba59abbe56e057f20f883e', '', '2019-05-17 20:47:04', '0000-00-00 00:00:00'),
(11, '1', 'e10adc3949ba59abbe56e057f20f883e', '', '2019-05-18 09:06:23', '0000-00-00 00:00:00'),
(12, 'BeAlrigh', 'e10adc3949ba59abbe56e057f20f883e', 'uploads/2019/05/25/3602345ce8eed4507ae439192997.jpg', '2019-05-25 15:25:01', '0000-00-00 00:00:00'),
(13, '小苏', 'e10adc3949ba59abbe56e057f20f883e', 'uploads/2019/05/26/7395455cea10907b9fd174530219.jpg', '2019-05-26 12:03:21', '0000-00-00 00:00:00'),
(14, '小李', 'e10adc3949ba59abbe56e057f20f883e', 'uploads/2019/05/26/4145385cea125facc23996869485.jpg', '2019-05-26 12:11:11', '0000-00-00 00:00:00'),
(15, '队长', 'e10adc3949ba59abbe56e057f20f883e', 'uploads/2019/05/26/8513595cea13763b136127246247.jpg', '2019-05-26 12:17:40', '0000-00-00 00:00:00'),
(16, '且听风吟', 'e10adc3949ba59abbe56e057f20f883e', 'uploads/2019/05/26/3456785cea3432017a3387987666.jpeg', '2019-05-26 12:32:53', '0000-00-00 00:00:00'),
(17, 'vateer', '2e7b5fb2f94fee4e3df55487a99842aa', '', '2020-12-03 21:34:50', '0000-00-00 00:00:00'),
(18, '蔡泽炬', '2e7b5fb2f94fee4e3df55487a99842aa', '', '2020-12-03 22:46:23', '0000-00-00 00:00:00');

-- --------------------------------------------------------

--
-- 表的结构 `reply`
--

CREATE TABLE IF NOT EXISTS `reply` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `content_id` int(10) unsigned NOT NULL,
  `quote_id` int(10) unsigned NOT NULL DEFAULT '0',
  `content` text NOT NULL,
  `time` datetime NOT NULL,
  `member_id` int(10) unsigned NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 AUTO_INCREMENT=33 ;

--
-- 转存表中的数据 `reply`
--

INSERT INTO `reply` (`id`, `content_id`, `quote_id`, `content`, `time`, `member_id`) VALUES
(10, 24, 0, '奋斗吧', '2019-05-20 19:47:58', 3),
(9, 24, 0, '确立目标，才有动力！', '2019-05-20 19:25:17', 3),
(11, 24, 0, '做更好的自己', '2019-05-20 19:48:25', 3),
(12, 24, 0, '加油', '2019-05-20 19:58:05', 3),
(13, 24, 0, '顶顶顶', '2019-05-20 19:58:14', 3),
(14, 24, 0, '山东省', '2019-05-20 19:58:40', 3),
(15, 24, 0, '54445454', '2019-05-20 21:05:03', 3),
(16, 24, 14, '我是河南省', '2019-05-20 21:07:38', 3),
(17, 24, 16, '我是中国人', '2019-05-21 19:16:59', 3),
(18, 24, 15, '5555', '2019-05-21 20:38:13', 3),
(19, 21, 0, '递归', '2019-05-21 21:04:46', 3),
(20, 21, 0, '亏', '2019-05-21 21:06:14', 3),
(21, 21, 19, '发速度', '2019-05-21 21:06:29', 3),
(22, 21, 19, '为什么是递归', '2019-05-22 19:14:23', 2),
(23, 17, 0, '钢铁侠马克四战甲，与神比肩！！！', '2019-05-23 19:09:47', 3),
(24, 17, 23, '与灭霸五五开！！！', '2019-05-23 19:10:17', 3),
(25, 24, 12, '美好终会来临', '2019-05-24 16:47:40', 7),
(26, 24, 15, '歌谭', '2019-05-24 21:18:28', 7),
(27, 29, 0, '真的荷兰弟超帅', '2019-05-26 12:18:40', 15),
(28, 30, 0, '大学生活不应该整日待在宿舍中', '2019-05-26 12:19:46', 15),
(29, 32, 0, '以后有机会一定去', '2019-05-26 12:20:27', 15),
(30, 37, 0, '你说的很好', '2019-05-26 14:35:02', 16),
(31, 37, 30, '你说的更好', '2019-05-26 14:35:18', 16),
(32, 30, 0, '赞同', '2019-05-26 20:14:35', 16);

-- --------------------------------------------------------

--
-- 表的结构 `son_module`
--

CREATE TABLE IF NOT EXISTS `son_module` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `father_module_id` int(10) unsigned NOT NULL,
  `module_name` varchar(66) NOT NULL,
  `info` varchar(255) NOT NULL,
  `member_id` int(10) unsigned NOT NULL DEFAULT '0',
  `sort` int(10) unsigned NOT NULL DEFAULT '0',
  PRIMARY KEY (`id`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 AUTO_INCREMENT=22 ;

--
-- 转存表中的数据 `son_module`
--

INSERT INTO `son_module` (`id`, `father_module_id`, `module_name`, `info`, `member_id`, `sort`) VALUES
(16, 18, '英国', '在这里我们可以讨论大家对英国之旅的感受', 0, 0),
(4, 0, 'O9OO', 'OOO', 0, 0),
(15, 1, '钢铁侠', '钢铁侠比肩神明', 0, 0),
(14, 1, '荷兰弟', '荷兰弟特幽默', 0, 0),
(13, 16, '布鲁斯.韦恩', '亿万富翁，正直且冷静，少年就与众不同。', 0, 1),
(17, 18, '迪拜', '最富有的城市', 0, 0),
(18, 18, '美国', '美国时代广场\r\n\r\n', 0, 0),
(19, 17, '孤独的美食家', '日本大叔带你领略日本的美食', 0, 0),
(20, 19, '大学生活应该丰富多彩', '大家可以讨论如何将大学过的丰富多彩', 0, 0),
(21, 16, '阿福尔雷德', '布鲁斯.韦恩的管家', 0, 0);

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
