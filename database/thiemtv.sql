-- phpMyAdmin SQL Dump
-- version 4.2.11
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: Jun 29, 2015 at 02:36 AM
-- Server version: 5.6.21
-- PHP Version: 5.6.3

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Database: `thiemtv`
--

-- --------------------------------------------------------

--
-- Table structure for table `cat_news`
--

CREATE TABLE IF NOT EXISTS `cat_news` (
`id` int(11) NOT NULL,
  `name` varchar(100) NOT NULL,
  `des` text NOT NULL,
  `created_date` date NOT NULL,
  `image` varchar(255) NOT NULL,
  `record_status` int(11) NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=14 DEFAULT CHARSET=utf8;

--
-- Dumping data for table `cat_news`
--

INSERT INTO `cat_news` (`id`, `name`, `des`, `created_date`, `image`, `record_status`) VALUES
(1, 'Xã Hội', 'Đây là tin tức về xã hội 2', '2001-07-11', '@web/uploads/news_1_1435530883.jpg', 0),
(2, 'Xe', 'Đây là các bài viết về xe', '2015-06-03', '@web/upload/news/2.jpg', 0),
(8, 'Bóng đá', 'Đây là chuyên mục bóng đá', '2015-06-12', '@web/uploads/station_8_1435502617.jpg', 0),
(9, 'Nước Ngoài', 'đây là tin nước ngoài', '2015-06-20', '@web/uploads/news_9_1435530895.jpg', 0),
(10, 'Ngoại hạng anh', 'NGoại hạng anh', '2015-06-20', '@web/uploads/news_10_1435530905.jpg', 0);

-- --------------------------------------------------------

--
-- Table structure for table `companies`
--

CREATE TABLE IF NOT EXISTS `companies` (
`id` int(11) NOT NULL,
  `user_id` int(255) DEFAULT NULL,
  `name` varchar(255) DEFAULT NULL,
  `description` text,
  `image` varchar(255) DEFAULT NULL,
  `record_status` int(11) NOT NULL DEFAULT '0'
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=utf8;

--
-- Dumping data for table `companies`
--

INSERT INTO `companies` (`id`, `user_id`, `name`, `description`, `image`, `record_status`) VALUES
(1, 12, 'Công ty bus 10/10', 'Đây là công ty Bus 10/10', '@web/uploads/line_22.jpg', 1),
(2, 12, 'Xe bus Thăng Long', 'Đây là xe bus Thăng Long', '@web/upload/news/2.jpg', 0),
(3, 13, 'Xe bus Thủ Đô', 'Đây là xe bus Thủ Đô', '@web/upload/news/4.jpg', 0);

-- --------------------------------------------------------

--
-- Table structure for table `lines`
--

CREATE TABLE IF NOT EXISTS `lines` (
`id` int(11) NOT NULL,
  `name` varchar(255) DEFAULT NULL,
  `description` text,
  `start_time` time DEFAULT NULL,
  `end_time` time DEFAULT NULL,
  `image` varchar(255) DEFAULT NULL,
  `record_status` int(11) DEFAULT '0'
) ENGINE=InnoDB AUTO_INCREMENT=40 DEFAULT CHARSET=utf8;

--
-- Dumping data for table `lines`
--

INSERT INTO `lines` (`id`, `name`, `description`, `start_time`, `end_time`, `image`, `record_status`) VALUES
(22, 'Hà Nội', 'giáp bát', '06:05:00', '06:05:00', '@web/uploads/line_22.jpg', 1),
(30, 'hà nội', 'chim sẻ', '06:25:00', '06:25:00', '@web/uploads/line_30_1435467731.jpg', 1),
(31, 'Chim se di nang', 'đây la 1 tuyến đường', '01:10:15', '01:15:23', NULL, 1),
(32, 'hà nội 2', 'tuyến đường hàn ội 2', '06:25:00', '06:25:00', '@web/uploads/line_32_1435467754.jpg', 1),
(33, 'sdfasdf', 'ádfasdfa', '03:21:00', '07:21:00', '@web/uploads/line_33.jpg', 1),
(34, 'ádfasd', 'f asdfasdf ', '06:21:00', '07:21:00', '@web/uploads/line_34.jpg', 1),
(35, 'ádfasdf', 'ádfasdf', '02:44:00', '03:44:00', '@web/uploads/line_35.jpg', 1),
(36, 'ádfasdfa', 'sdfasdfasdf', '03:51:00', '03:51:00', '@web/uploads/line_36.jpg', 1),
(37, 'ádfasd', 'fasdfasdf', '03:51:00', '03:51:00', '@web/uploads/line_37.jpg', 1),
(38, 'Hồ Tùng Mậu', 'Đoạn đường này dài 2km', '07:00:00', '15:00:00', '@web/uploads/line_38.jpg', 0),
(39, 'Lê Văn Lương', 'THis is a street', '07:30:00', '10:30:00', '@web/uploads/line_39.jpg', 0);

-- --------------------------------------------------------

--
-- Table structure for table `post_news`
--

CREATE TABLE IF NOT EXISTS `post_news` (
`id` int(11) NOT NULL,
  `cat_id` int(11) DEFAULT NULL,
  `title` varchar(200) NOT NULL,
  `img` varchar(200) DEFAULT NULL,
  `des` text NOT NULL,
  `content` text NOT NULL,
  `time` date NOT NULL,
  `author` varchar(100) NOT NULL,
  `record_status` int(11) NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=24 DEFAULT CHARSET=utf8;

--
-- Dumping data for table `post_news`
--

INSERT INTO `post_news` (`id`, `cat_id`, `title`, `img`, `des`, `content`, `time`, `author`, `record_status`) VALUES
(1, 9, 'Đây là một tin mẫu', '@web/uploads/detailnews_1_1435538141.jpg', 'The largest transport company in Leipzig, LVB (Leipziger VerkehrsBetriebe) translated into English as the “Leipzig Transport Company”, operates the tramway and bus transport services in Leipzig.', 'The largest transport company in Leipzig, LVB (Leipziger VerkehrsBetriebe) translated into English as the “Leipzig Transport Company”, operates the tramway and bus transport services in Leipzig.\r\n\r\nThe LVB route network is a part of the regional public transport association and was formed by merger, from January 1917. Public transport in Leipzig is characterized by a dense light-rail system.\r\n\r\n13 tram lines serve a transport area of about 152 kilometers, complemented by more than 30 bus lines in large part being en-route in the suburban area.', '2015-06-29', 'Trần văn thiêm', 1),
(2, 1, 'The largest transport company in Leipzig', '@web/upload/news/2.jpg', 'ádasdasd', 'The largest transport company in Leipzig, LVB (Leipziger VerkehrsBetriebe) translated into English as the “Leipzig Transport Company”, operates the tramway and bus transport services in Leipzig.', '2015-06-29', 'Nguyễn văn a', 1),
(3, 2, 'This is news 2', '@web/upload/news/3.jpg', 'This is a des of news 2, was sdfasd ádf', 'asdf asdf asdf asdf asdf asdf ádf', '2015-06-29', 'Chim sẻ đi nắng', 1),
(4, 2, 'This is news 3', '@web/upload/news/4.jpg', 'This is a des of news 4, was sdfasd ádf', 'asdf asdf asdf asdf asdf asdf ádf', '2015-06-29', 'Bác sĩ máy tính', 1),
(5, 1, 'Welcome to LVB Leipzig', '@web/upload/news/1.jpg', 'The largest transport company in Leipzig, LVB (Leipziger VerkehrsBetriebe) translated into English as the “Leipzig Transport Company”, operates the tramway and bus transport services in Leipzig.', 'The largest transport company in Leipzig, LVB (Leipziger VerkehrsBetriebe) translated into English as the “Leipzig Transport Company”, operates the tramway and bus transport services in Leipzig.\r\n\r\nThe LVB route network is a part of the regional public transport association and was formed by merger, from January 1917. Public transport in Leipzig is characterized by a dense light-rail system.\r\n\r\n13 tram lines serve a transport area of about 152 kilometers, complemented by more than 30 bus lines in large part being en-route in the suburban area.', '2015-06-29', 'Trần văn thiêm', 1),
(23, 1, 'WorlCup 2018', '@web/uploads/news_23_1435537379.jpg', 'ádfasdfasdfasdf', 'ádfasdfasdfasdfadsfasdfadsf', '2015-06-04', 'Trần Văn Thiêm', 1);

-- --------------------------------------------------------

--
-- Table structure for table `roles`
--

CREATE TABLE IF NOT EXISTS `roles` (
`id` int(11) NOT NULL,
  `name` varchar(255) DEFAULT NULL,
  `prority` int(11) DEFAULT NULL,
  `record_status` int(11) DEFAULT '0'
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=utf8;

--
-- Dumping data for table `roles`
--

INSERT INTO `roles` (`id`, `name`, `prority`, `record_status`) VALUES
(1, 'Member', 1, 1),
(2, 'Driver', 5, 1),
(3, 'Business owner', 10, 1),
(4, 'Admin', 20, 1);

-- --------------------------------------------------------

--
-- Table structure for table `stations`
--

CREATE TABLE IF NOT EXISTS `stations` (
`id` int(255) NOT NULL,
  `line_id` int(11) DEFAULT NULL,
  `name` varchar(255) DEFAULT NULL,
  `description` text,
  `image` varchar(255) DEFAULT NULL,
  `record_status` int(11) NOT NULL DEFAULT '0'
) ENGINE=InnoDB AUTO_INCREMENT=16 DEFAULT CHARSET=utf8;

--
-- Dumping data for table `stations`
--

INSERT INTO `stations` (`id`, `line_id`, `name`, `description`, `image`, `record_status`) VALUES
(4, 22, 'Bến xe Mỹ ĐÌnh', 'ádlfasdf', 'ádfadf', 1),
(5, 22, 'Bến xe Giáp Bát', 'ádfasfasdfasdf', 'ádfasdfasdf', 1),
(6, 34, 'fadfasdf', 'ádfasdf', 'ádfasdf', 1),
(7, 36, 'Kim Sơn Station', 'Đây là bến xe kim sơn', '@web/uploads/station_7_1435293577.jpg', 0),
(8, 38, 'Lương Yên  Station', 'Đây là bên xe Lương Yên 1', '@web/uploads/station_8_1435293683.jpg', 0),
(9, 39, 'Bến xe Nước Ngầm', 'trần văn thiêm', '@web/uploads/station_9_1435393868.jpg', 0),
(10, 30, 'Bên xe Yên Nghĩa', 'Đây là bến xe Yên Nghĩa', '@web/uploads/station_10_1435414692.jpg', 0),
(11, 39, 'Nam Ánh Station 2', 'Đây là bến xe Lê Văn Lương', '@web/uploads/station_11_1435512247.jpg', 0),
(12, 30, 'dà', 'ádfasdf', '@web/uploads/station_12_1435488563.jpg', 1),
(13, 32, 'Kim Anh Station', 'ĐÂsd', '@web/uploads/station_13_1435488891.jpg', 1),
(14, 39, 'Bến xe Nam Thăng Long', 'Lê Văn Lương', '@web/uploads/station_14_1435516243.jpg', 0),
(15, 39, 'Bên xe Hà Đông', 'Trần văn thiêm', '@web/uploads/station_15_1435533054.jpg', 0);

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE IF NOT EXISTS `users` (
`id` int(11) NOT NULL,
  `username` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL,
  `auth_key` varchar(255) DEFAULT NULL,
  `password_reset_token` varchar(255) DEFAULT NULL,
  `record_status` int(11) NOT NULL DEFAULT '0'
) ENGINE=InnoDB AUTO_INCREMENT=15 DEFAULT CHARSET=utf8;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `username`, `password`, `auth_key`, `password_reset_token`, `record_status`) VALUES
(12, 'thienth@gmail.com', 'd033e22ae348aeb5660fc2140aec35850c4da997', NULL, NULL, 1),
(13, 'thiemksb@gmail.com', '811ca17256bbe49cb163c7ed5643d3c86e1b9e51', NULL, NULL, 1),
(14, 'thiemksb@gmail.com', '811ca17256bbe49cb163c7ed5643d3c86e1b9e51', NULL, NULL, 1);

-- --------------------------------------------------------

--
-- Table structure for table `user_info`
--

CREATE TABLE IF NOT EXISTS `user_info` (
`id` int(11) NOT NULL,
  `account_id` int(11) DEFAULT NULL,
  `first_name` varchar(255) DEFAULT NULL,
  `last_name` varchar(255) DEFAULT NULL,
  `note` text,
  `birth_date` datetime DEFAULT NULL,
  `create_at` timestamp NULL DEFAULT NULL ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB AUTO_INCREMENT=7 DEFAULT CHARSET=utf8;

--
-- Dumping data for table `user_info`
--

INSERT INTO `user_info` (`id`, `account_id`, `first_name`, `last_name`, `note`, `birth_date`, `create_at`) VALUES
(6, 12, 'Thiện', '', NULL, NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `user_role`
--

CREATE TABLE IF NOT EXISTS `user_role` (
  `user_id` int(11) NOT NULL,
  `role_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `user_role`
--

INSERT INTO `user_role` (`user_id`, `role_id`) VALUES
(12, 1);

-- --------------------------------------------------------

--
-- Table structure for table `vehicles`
--

CREATE TABLE IF NOT EXISTS `vehicles` (
`id` int(11) NOT NULL,
  `company_id` int(11) DEFAULT NULL,
  `line_id` int(11) DEFAULT NULL,
  `user_id` int(11) DEFAULT NULL,
  `vehicle_type_id` int(255) DEFAULT NULL,
  `name` varchar(255) NOT NULL,
  `image` varchar(255) DEFAULT NULL,
  `record_status` int(11) NOT NULL DEFAULT '0'
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=utf8;

--
-- Dumping data for table `vehicles`
--

INSERT INTO `vehicles` (`id`, `company_id`, `line_id`, `user_id`, `vehicle_type_id`, `name`, `image`, `record_status`) VALUES
(3, 1, 22, 13, 2, 'Xe bus 1', '@web/uploads/line_22.jpg', 0),
(4, 3, 30, 14, 2, 'Xe Bus 2', '@web/uploads/line_22.jpg', 0);

-- --------------------------------------------------------

--
-- Table structure for table `vehicle_type`
--

CREATE TABLE IF NOT EXISTS `vehicle_type` (
`id` int(11) NOT NULL,
  `name` varchar(255) DEFAULT NULL,
  `description` text,
  `image` varchar(255) DEFAULT NULL,
  `record_status` int(11) NOT NULL DEFAULT '0'
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8;

--
-- Dumping data for table `vehicle_type`
--

INSERT INTO `vehicle_type` (`id`, `name`, `description`, `image`, `record_status`) VALUES
(1, '35K1 - 01543', 'Đây là xe Dream', '@web/upload/2.jpg', 0),
(2, '35K1 - 07707', 'Đây là xe Way', '@web/upload/1.jpg', 0);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `cat_news`
--
ALTER TABLE `cat_news`
 ADD PRIMARY KEY (`id`), ADD KEY `id` (`id`);

--
-- Indexes for table `companies`
--
ALTER TABLE `companies`
 ADD PRIMARY KEY (`id`), ADD KEY `user_id` (`user_id`);

--
-- Indexes for table `lines`
--
ALTER TABLE `lines`
 ADD PRIMARY KEY (`id`);

--
-- Indexes for table `post_news`
--
ALTER TABLE `post_news`
 ADD PRIMARY KEY (`id`), ADD KEY `cat_id` (`cat_id`), ADD KEY `cat_id_2` (`cat_id`);

--
-- Indexes for table `roles`
--
ALTER TABLE `roles`
 ADD PRIMARY KEY (`id`);

--
-- Indexes for table `stations`
--
ALTER TABLE `stations`
 ADD PRIMARY KEY (`id`), ADD KEY `line_id` (`line_id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
 ADD PRIMARY KEY (`id`);

--
-- Indexes for table `user_info`
--
ALTER TABLE `user_info`
 ADD PRIMARY KEY (`id`), ADD KEY `account_id` (`account_id`);

--
-- Indexes for table `user_role`
--
ALTER TABLE `user_role`
 ADD PRIMARY KEY (`user_id`,`role_id`), ADD KEY `role_id` (`role_id`);

--
-- Indexes for table `vehicles`
--
ALTER TABLE `vehicles`
 ADD PRIMARY KEY (`id`), ADD KEY `company_id` (`company_id`), ADD KEY `line_id` (`line_id`), ADD KEY `user_id` (`user_id`), ADD KEY `vehicle_type_id` (`vehicle_type_id`);

--
-- Indexes for table `vehicle_type`
--
ALTER TABLE `vehicle_type`
 ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `cat_news`
--
ALTER TABLE `cat_news`
MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=14;
--
-- AUTO_INCREMENT for table `companies`
--
ALTER TABLE `companies`
MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=4;
--
-- AUTO_INCREMENT for table `lines`
--
ALTER TABLE `lines`
MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=40;
--
-- AUTO_INCREMENT for table `post_news`
--
ALTER TABLE `post_news`
MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=24;
--
-- AUTO_INCREMENT for table `roles`
--
ALTER TABLE `roles`
MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=5;
--
-- AUTO_INCREMENT for table `stations`
--
ALTER TABLE `stations`
MODIFY `id` int(255) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=16;
--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=15;
--
-- AUTO_INCREMENT for table `user_info`
--
ALTER TABLE `user_info`
MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=7;
--
-- AUTO_INCREMENT for table `vehicles`
--
ALTER TABLE `vehicles`
MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=5;
--
-- AUTO_INCREMENT for table `vehicle_type`
--
ALTER TABLE `vehicle_type`
MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=3;
--
-- Constraints for dumped tables
--

--
-- Constraints for table `companies`
--
ALTER TABLE `companies`
ADD CONSTRAINT `companies_ibfk_1` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `post_news`
--
ALTER TABLE `post_news`
ADD CONSTRAINT `post_news_ibfk_1` FOREIGN KEY (`cat_id`) REFERENCES `cat_news` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `stations`
--
ALTER TABLE `stations`
ADD CONSTRAINT `stations_ibfk_1` FOREIGN KEY (`line_id`) REFERENCES `lines` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `user_info`
--
ALTER TABLE `user_info`
ADD CONSTRAINT `user_info_ibfk_1` FOREIGN KEY (`account_id`) REFERENCES `users` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `user_role`
--
ALTER TABLE `user_role`
ADD CONSTRAINT `user_role_ibfk_1` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
ADD CONSTRAINT `user_role_ibfk_2` FOREIGN KEY (`role_id`) REFERENCES `roles` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `vehicles`
--
ALTER TABLE `vehicles`
ADD CONSTRAINT `vehicles_ibfk_1` FOREIGN KEY (`company_id`) REFERENCES `companies` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
ADD CONSTRAINT `vehicles_ibfk_3` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
ADD CONSTRAINT `vehicles_ibfk_4` FOREIGN KEY (`vehicle_type_id`) REFERENCES `vehicle_type` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
ADD CONSTRAINT `vehicles_ibfk_5` FOREIGN KEY (`line_id`) REFERENCES `lines` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
