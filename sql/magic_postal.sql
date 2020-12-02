-- phpMyAdmin SQL Dump
-- version 5.0.2
-- https://www.phpmyadmin.net/
--
-- 主机： localhost
-- 生成日期： 2020-12-02 22:47:54
-- 服务器版本： 10.4.14-MariaDB
-- PHP 版本： 7.4.10

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- 数据库： `magic_postal`
--
CREATE DATABASE IF NOT EXISTS `magic_postal` DEFAULT CHARACTER SET utf8 COLLATE utf8_unicode_ci;
USE `magic_postal`;

-- --------------------------------------------------------

--
-- 表的结构 `about_info`
--

DROP TABLE IF EXISTS `about_info`;
CREATE TABLE `about_info` (
  `id` int(16) NOT NULL,
  `content` text COLLATE utf8_unicode_ci NOT NULL,
  `created_on` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  `created_by` int(16) NOT NULL,
  `modified_on` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  `modified_by` int(16) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- 表的结构 `contact`
--

DROP TABLE IF EXISTS `contact`;
CREATE TABLE `contact` (
  `id` int(16) NOT NULL,
  `name` varchar(50) COLLATE utf8_unicode_ci NOT NULL,
  `age` int(4) DEFAULT NULL,
  `email` varchar(200) COLLATE utf8_unicode_ci NOT NULL,
  `major` varchar(50) COLLATE utf8_unicode_ci DEFAULT NULL,
  `industry` varchar(50) COLLATE utf8_unicode_ci DEFAULT NULL,
  `commend` text COLLATE utf8_unicode_ci DEFAULT NULL,
  `created_on` timestamp NOT NULL DEFAULT current_timestamp(),
  `created_by` int(16) NOT NULL COMMENT 'relate user id'
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- 表的结构 `postcard_template`
--

DROP TABLE IF EXISTS `postcard_template`;
CREATE TABLE `postcard_template` (
  `id` int(16) NOT NULL,
  `card_name` varchar(50) COLLATE utf8_unicode_ci NOT NULL,
  `img_url` varchar(500) COLLATE utf8_unicode_ci NOT NULL,
  `order_no` int(2) NOT NULL,
  `description` varchar(500) COLLATE utf8_unicode_ci DEFAULT NULL COMMENT 'description about the card',
  `created_on` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp() COMMENT 'created date and time',
  `modified_on` timestamp NULL DEFAULT '0000-00-00 00:00:00' COMMENT 'last modified date and time'
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci COMMENT='postcard template information';

--
-- 转存表中的数据 `postcard_template`
--

INSERT INTO `postcard_template` (`id`, `card_name`, `img_url`, `order_no`, `description`, `created_on`, `modified_on`) VALUES
(1, 'Monday', 'card1.jpg', 1, 'Monday postcard', '2020-12-02 18:47:29', '0000-00-00 00:00:00'),
(2, 'Tuesday', 'card2.jpg', 2, 'Tuesday postcard', '2020-12-02 18:47:09', '0000-00-00 00:00:00'),
(3, 'Wednesday', 'card3.jpg', 3, 'Wednesday postcard', '2020-12-02 18:48:15', '0000-00-00 00:00:00'),
(4, 'Thursday', 'card4.jpg', 4, 'Thursday postcard', '2020-12-02 18:50:10', '0000-00-00 00:00:00'),
(5, 'Friday', 'card5.jpg', 5, 'Friday postcard', '2020-12-02 18:50:10', '0000-00-00 00:00:00'),
(6, 'Saturday', 'card6.jpg', 6, 'Saturday postcard', '2020-12-02 18:50:10', '0000-00-00 00:00:00'),
(7, 'Sunday', 'card7.jpg', 7, 'Sunday postcard', '2020-12-02 18:50:10', '0000-00-00 00:00:00');

-- --------------------------------------------------------

--
-- 表的结构 `postcard_user_like`
--

DROP TABLE IF EXISTS `postcard_user_like`;
CREATE TABLE `postcard_user_like` (
  `user_id` int(11) NOT NULL,
  `card_id` int(11) NOT NULL,
  `is_like` tinyint(1) NOT NULL COMMENT '1:like;0:unlike',
  `modified_on` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  `created_on` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- 表的结构 `stamp_template`
--

DROP TABLE IF EXISTS `stamp_template`;
CREATE TABLE `stamp_template` (
  `id` int(16) NOT NULL,
  `stamp_name` varchar(50) COLLATE utf8_unicode_ci NOT NULL,
  `img_url` varchar(500) COLLATE utf8_unicode_ci NOT NULL,
  `description` varchar(500) COLLATE utf8_unicode_ci DEFAULT NULL COMMENT 'description about the stamp',
  `order_no` int(2) NOT NULL,
  `created_on` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp() COMMENT 'created date and time',
  `modified_on` timestamp NULL DEFAULT '0000-00-00 00:00:00' COMMENT 'last modified date and time'
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci COMMENT='stamp template information';

--
-- 转存表中的数据 `stamp_template`
--

INSERT INTO `stamp_template` (`id`, `stamp_name`, `img_url`, `description`, `order_no`, `created_on`, `modified_on`) VALUES
(1, 'Sunny', 'stamp01.jpg', 'Sunny day', 1, '2020-12-02 19:22:47', '0000-00-00 00:00:00'),
(2, 'Rainy', 'stamp02.jpg', 'Rainy day', 2, '2020-12-02 19:27:01', '0000-00-00 00:00:00'),
(3, 'Snowy', 'stamp03.jpg', 'Snowy day', 3, '2020-12-02 19:27:01', '0000-00-00 00:00:00'),
(4, 'Cloudy', 'stamp04.jpg', 'Cloudy day', 4, '2020-12-02 19:27:01', '0000-00-00 00:00:00'),
(5, 'Windy', 'stamp05.jpg', 'Windy day', 5, '2020-12-02 19:31:41', '0000-00-00 00:00:00'),
(6, 'Frost', 'stamp06.jpg', 'Frost day', 6, '2020-12-02 19:27:01', '0000-00-00 00:00:00'),
(7, 'Foggy', 'stamp07.jpg', 'foggy day', 7, '2020-12-02 19:27:01', '0000-00-00 00:00:00');

-- --------------------------------------------------------

--
-- 表的结构 `user`
--

DROP TABLE IF EXISTS `user`;
CREATE TABLE `user` (
  `user_id` int(16) NOT NULL,
  `email` varchar(100) COLLATE utf8_unicode_ci NOT NULL,
  `password` varchar(8) COLLATE utf8_unicode_ci NOT NULL,
  `first_name` varchar(20) COLLATE utf8_unicode_ci DEFAULT NULL,
  `last_name` varchar(20) COLLATE utf8_unicode_ci DEFAULT NULL,
  `born_date` date DEFAULT NULL,
  `role_id` int(16) NOT NULL,
  `created_on` timestamp NOT NULL DEFAULT current_timestamp(),
  `modified_on` timestamp NULL DEFAULT '0000-00-00 00:00:00'
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci COMMENT='user basic info table';

--
-- 转存表中的数据 `user`
--

INSERT INTO `user` (`user_id`, `email`, `password`, `first_name`, `last_name`, `born_date`, `role_id`, `created_on`, `modified_on`) VALUES
(1, 'zhaolu@sheridancollege.ca', '123456', 'lubie', 'zhao', '2020-11-26', 1, '2020-11-26 17:22:18', NULL),
(2, 'icing808@aliyun.com', '123456', 'Zhao', 'Lu', '2020-12-03', 2, '2020-12-02 18:36:59', '0000-00-00 00:00:00'),
(3, 'jackli@163.com', '123456', 'Jack', 'Li', '2020-12-03', 2, '2020-12-02 20:37:47', '0000-00-00 00:00:00');

-- --------------------------------------------------------

--
-- 表的结构 `user_postcard`
--

DROP TABLE IF EXISTS `user_postcard`;
CREATE TABLE `user_postcard` (
  `id` int(16) NOT NULL,
  `user_id` int(16) NOT NULL COMMENT 'relate user table id',
  `card_id` int(16) NOT NULL COMMENT 'relate post_card_template table id',
  `content` text COLLATE utf8_unicode_ci DEFAULT NULL,
  `stamp_id` int(16) DEFAULT NULL COMMENT 'relate stamp_template table id',
  `send_ip` varchar(20) COLLATE utf8_unicode_ci NOT NULL,
  `country_code` varchar(10) COLLATE utf8_unicode_ci NOT NULL,
  `city_code` varchar(10) COLLATE utf8_unicode_ci NOT NULL,
  `area_code` varchar(10) COLLATE utf8_unicode_ci DEFAULT NULL,
  `status` int(2) NOT NULL COMMENT '1:pending;2:sent;3:deleted',
  `created_on` timestamp NOT NULL DEFAULT current_timestamp(),
  `modified_on` timestamp NULL DEFAULT NULL COMMENT 'last modified time'
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci COMMENT='user postcard information includes different status cards';

--
-- 转存表中的数据 `user_postcard`
--

INSERT INTO `user_postcard` (`id`, `user_id`, `card_id`, `content`, `stamp_id`, `send_ip`, `country_code`, `city_code`, `area_code`, `status`, `created_on`, `modified_on`) VALUES
(1, 2, 1, 'Monday is sunny!', 1, '192.21.12.123', 'China', 'Beijing', 'Chaoyang', 2, '2020-12-02 19:15:50', NULL),
(2, 2, 2, 'Tuesday is rainy!', 2, '192.21.12.123', 'China', 'Beijing', 'Chaoyang', 2, '2020-12-02 19:18:31', NULL),
(3, 2, 3, 'Wednesday is snowy!', 3, '192.21.12.123', 'China', 'Beijing', 'Chaoyang', 2, '2020-12-02 19:18:31', NULL);

-- --------------------------------------------------------

--
-- 表的结构 `user_postcard_reply`
--

DROP TABLE IF EXISTS `user_postcard_reply`;
CREATE TABLE `user_postcard_reply` (
  `id` int(16) NOT NULL,
  `reply_user_id` int(16) NOT NULL COMMENT 'relate user table id',
  `user_postcard_id` int(16) NOT NULL COMMENT 'relate user postcard table id',
  `reply_content` text COLLATE utf8_unicode_ci DEFAULT NULL,
  `send_ip` varchar(20) COLLATE utf8_unicode_ci DEFAULT NULL,
  `country_code` varchar(10) COLLATE utf8_unicode_ci DEFAULT NULL,
  `city_code` varchar(10) COLLATE utf8_unicode_ci DEFAULT NULL,
  `area_code` varchar(10) COLLATE utf8_unicode_ci DEFAULT NULL,
  `status` int(2) NOT NULL COMMENT '1:received;2:replied;3:thrown',
  `receive_on` timestamp NOT NULL DEFAULT current_timestamp(),
  `reply_on` timestamp NULL DEFAULT NULL,
  `modified_on` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci COMMENT='postcard replied by users';

--
-- 转存表中的数据 `user_postcard_reply`
--

INSERT INTO `user_postcard_reply` (`id`, `reply_user_id`, `user_postcard_id`, `reply_content`, `send_ip`, `country_code`, `city_code`, `area_code`, `status`, `receive_on`, `reply_on`, `modified_on`) VALUES
(1, 3, 1, 'Yes, today is sunny too.', '192.21.12.254', 'Canada', 'Toronto', 'North York', 2, '2020-12-02 20:38:59', '2020-12-03 04:41:43', NULL),
(2, 3, 2, 'Yes, today is rainy too.', '192.21.12.254', 'Canada', 'Toronto', 'North York', 2, '2020-12-02 20:40:08', '2020-12-03 04:42:17', NULL),
(3, 3, 3, 'No, today is sunny in Canada.', '192.21.12.254', 'Canada', 'Toronto', 'North York', 2, '2020-12-02 20:40:08', '2020-12-03 04:42:43', NULL);

-- --------------------------------------------------------

--
-- 表的结构 `user_role`
--

DROP TABLE IF EXISTS `user_role`;
CREATE TABLE `user_role` (
  `role_id` int(16) NOT NULL,
  `role_name` varchar(20) COLLATE utf8_unicode_ci NOT NULL,
  `created_on` timestamp NOT NULL DEFAULT current_timestamp(),
  `modified_on` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- 转存表中的数据 `user_role`
--

INSERT INTO `user_role` (`role_id`, `role_name`, `created_on`, `modified_on`) VALUES
(1, 'administrator', '2020-11-26 17:29:24', NULL),
(2, 'normal user', '2020-11-26 17:29:24', NULL);

--
-- 转储表的索引
--

--
-- 表的索引 `about_info`
--
ALTER TABLE `about_info`
  ADD PRIMARY KEY (`id`);

--
-- 表的索引 `contact`
--
ALTER TABLE `contact`
  ADD PRIMARY KEY (`id`);

--
-- 表的索引 `postcard_template`
--
ALTER TABLE `postcard_template`
  ADD PRIMARY KEY (`id`);

--
-- 表的索引 `stamp_template`
--
ALTER TABLE `stamp_template`
  ADD PRIMARY KEY (`id`);

--
-- 表的索引 `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`user_id`);

--
-- 表的索引 `user_postcard`
--
ALTER TABLE `user_postcard`
  ADD PRIMARY KEY (`id`);

--
-- 表的索引 `user_postcard_reply`
--
ALTER TABLE `user_postcard_reply`
  ADD PRIMARY KEY (`id`);

--
-- 表的索引 `user_role`
--
ALTER TABLE `user_role`
  ADD PRIMARY KEY (`role_id`);

--
-- 在导出的表使用AUTO_INCREMENT
--

--
-- 使用表AUTO_INCREMENT `about_info`
--
ALTER TABLE `about_info`
  MODIFY `id` int(16) NOT NULL AUTO_INCREMENT;

--
-- 使用表AUTO_INCREMENT `contact`
--
ALTER TABLE `contact`
  MODIFY `id` int(16) NOT NULL AUTO_INCREMENT;

--
-- 使用表AUTO_INCREMENT `postcard_template`
--
ALTER TABLE `postcard_template`
  MODIFY `id` int(16) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- 使用表AUTO_INCREMENT `stamp_template`
--
ALTER TABLE `stamp_template`
  MODIFY `id` int(16) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- 使用表AUTO_INCREMENT `user`
--
ALTER TABLE `user`
  MODIFY `user_id` int(16) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- 使用表AUTO_INCREMENT `user_postcard`
--
ALTER TABLE `user_postcard`
  MODIFY `id` int(16) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- 使用表AUTO_INCREMENT `user_postcard_reply`
--
ALTER TABLE `user_postcard_reply`
  MODIFY `id` int(16) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- 使用表AUTO_INCREMENT `user_role`
--
ALTER TABLE `user_role`
  MODIFY `role_id` int(16) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
