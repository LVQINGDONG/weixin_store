-- phpMyAdmin SQL Dump
-- version 4.8.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Sep 17, 2018 at 01:43 PM
-- Server version: 10.1.33-MariaDB
-- PHP Version: 7.2.6

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `zerg`
--
CREATE DATABASE IF NOT EXISTS `zerg` DEFAULT CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci;
USE `zerg`;

-- --------------------------------------------------------

--
-- Table structure for table `banner`
--

CREATE TABLE `banner` (
  `id` int(11) UNSIGNED NOT NULL,
  `name` varchar(50) CHARACTER SET utf8 DEFAULT NULL COMMENT 'banner的名称',
  `description` varchar(255) CHARACTER SET utf8 DEFAULT NULL COMMENT 'banner的描述',
  `delete_time` int(11) DEFAULT NULL,
  `update_time` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `banner`
--

INSERT INTO `banner` (`id`, `name`, `description`, `delete_time`, `update_time`) VALUES
(1, '首页banner', '首页顶部轮播图', NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `banner_item`
--

CREATE TABLE `banner_item` (
  `id` int(11) UNSIGNED NOT NULL,
  `img_id` int(11) UNSIGNED NOT NULL COMMENT '外键，关联到image表',
  `key_word` varchar(100) NOT NULL COMMENT '记录点击banner之后要跳转的商品的id号',
  `type` tinyint(4) NOT NULL DEFAULT '1' COMMENT '跳转的类型，可能是上商品也可能是专题，1为商品',
  `delete_time` int(11) DEFAULT NULL,
  `banner_id` int(11) UNSIGNED NOT NULL COMMENT '外键，关联banner表的id',
  `update_time` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `banner_item`
--

INSERT INTO `banner_item` (`id`, `img_id`, `key_word`, `type`, `delete_time`, `banner_id`, `update_time`) VALUES
(1, 1, '1', 1, NULL, 1, NULL),
(2, 2, '2', 1, NULL, 1, NULL),
(3, 3, '3', 1, NULL, 1, NULL),
(4, 4, '4', 1, NULL, 1, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `category`
--

CREATE TABLE `category` (
  `id` int(11) UNSIGNED NOT NULL,
  `name` varchar(50) CHARACTER SET utf8 DEFAULT NULL,
  `topic_img_id` int(11) UNSIGNED DEFAULT NULL,
  `delete_time` int(11) DEFAULT NULL,
  `update_time` int(11) DEFAULT NULL,
  `description` varchar(255) CHARACTER SET utf8 DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `category`
--

INSERT INTO `category` (`id`, `name`, `topic_img_id`, `delete_time`, `update_time`, `description`) VALUES
(1, '果味', 6, NULL, NULL, NULL),
(2, '蔬菜', 5, NULL, NULL, NULL),
(3, '炒货', 7, NULL, NULL, NULL),
(4, '点心', 4, NULL, NULL, NULL),
(5, '粗茶', 8, NULL, NULL, NULL),
(6, '淡饭', 7, NULL, NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `image`
--

CREATE TABLE `image` (
  `id` int(11) UNSIGNED NOT NULL,
  `url` varchar(100) CHARACTER SET utf8 NOT NULL,
  `from` int(11) NOT NULL DEFAULT '1',
  `delete_time` int(11) DEFAULT NULL,
  `update_time` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `image`
--

INSERT INTO `image` (`id`, `url`, `from`, `delete_time`, `update_time`) VALUES
(1, '/1@theme.png', 1, NULL, NULL),
(2, '/xxxx', 1, NULL, NULL),
(3, '/xxxx', 1, NULL, NULL),
(4, '/xxxx', 1, NULL, NULL),
(5, '/xxxx', 1, NULL, NULL),
(6, '/xxxx', 1, NULL, NULL),
(7, '/xxxx', 1, NULL, NULL),
(8, '/xxxx', 1, NULL, NULL),
(9, '/xxxx', 1, NULL, NULL),
(10, '/xxxx', 1, NULL, NULL),
(11, '/xxxx', 1, NULL, NULL),
(12, '/xxxx', 1, NULL, NULL),
(13, '/xxxx', 1, NULL, NULL),
(14, '/xxxx', 1, NULL, NULL),
(15, '/xxxx', 1, NULL, NULL),
(16, '/xxxx', 1, NULL, NULL),
(17, '/xxxx', 1, NULL, NULL),
(18, '/xxxx', 1, NULL, NULL),
(19, '/xxxx', 1, NULL, NULL),
(20, '/xxxx', 1, NULL, NULL),
(21, '/xxxx', 1, NULL, NULL),
(22, '/xxxx', 1, NULL, NULL),
(23, '/xxxx', 1, NULL, NULL),
(24, '/xxxx', 1, NULL, NULL),
(25, '/xxxx', 1, NULL, NULL),
(26, '/xxxx', 1, NULL, NULL),
(27, '/xxxx', 1, NULL, NULL),
(28, '/xxxx', 1, NULL, NULL),
(29, '/xxxx', 1, NULL, NULL),
(30, '/xxxx', 1, NULL, NULL),
(31, '/xxxx', 1, NULL, NULL),
(32, '/xxxx', 1, NULL, NULL),
(33, '/xxxx', 1, NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `order`
--

CREATE TABLE `order` (
  `id` int(11) UNSIGNED NOT NULL,
  `order_no` varchar(255) CHARACTER SET utf8 DEFAULT NULL COMMENT '订单编号',
  `user_id` int(11) UNSIGNED DEFAULT NULL,
  `delete_time` int(11) UNSIGNED DEFAULT NULL,
  `create_time` int(11) UNSIGNED DEFAULT NULL,
  `total_price` decimal(20,2) UNSIGNED DEFAULT NULL COMMENT '订单价格',
  `status` varchar(50) CHARACTER SET utf8 DEFAULT NULL,
  `snap_img` varchar(255) CHARACTER SET utf8 DEFAULT NULL,
  `snap_name` varchar(50) CHARACTER SET utf8 DEFAULT NULL,
  `total_count` int(11) UNSIGNED DEFAULT NULL,
  `update_time` int(11) UNSIGNED DEFAULT NULL,
  `snap_items` varchar(255) CHARACTER SET utf8 DEFAULT NULL,
  `snap_address` varchar(255) CHARACTER SET utf8 DEFAULT NULL,
  `prepay_id` int(11) UNSIGNED DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `order`
--

INSERT INTO `order` (`id`, `order_no`, `user_id`, `delete_time`, `create_time`, `total_price`, `status`, `snap_img`, `snap_name`, `total_count`, `update_time`, `snap_items`, `snap_address`, `prepay_id`) VALUES
(1, 'A917838157192633', 3, NULL, NULL, '0.06', NULL, 'localhost/zerg/public/images/xxxx', '商品1等', 4, NULL, '[{\"id\":1,\"haveStock\":true,\"count\":2,\"name\":\"\\u5546', '{\"name\":\"qingdong\",\"mobile\":\"13119890486\",\"province\":\"\\u5e7f\\u4e1c\\u7701\",\"city\":\"\\u4f5b\\u5c71\\u5e02\",\"country\":\"\\u987a\\u5fb7\\u533a\",\"detail\":\"sdpt25-306\",\"update_time\":\"1970-01-01 08:00:00\"}', NULL),
(2, 'A917842876510202', 3, NULL, NULL, '0.09', NULL, 'localhost/zerg/public/images/xxxx', '商品1等', 7, NULL, '[{\"id\":1,\"haveStock\":true,\"count\":2,\"name\":\"\\u5546\\u54c11\",\"totalPrice\":0.04},{\"id\":2,\"haveStock\":true,\"count\":2,\"name\":\"\\u5546\\u54c12\",\"totalPrice\":0.02},{\"id\":3,\"haveStock\":true,\"count\":3,\"name\":\"\\u5546\\u54c13\",\"totalPrice\":0.03}]', '{\"name\":\"qingdong\",\"mobile\":\"13119890486\",\"province\":\"\\u5e7f\\u4e1c\\u7701\",\"city\":\"\\u4f5b\\u5c71\\u5e02\",\"country\":\"\\u987a\\u5fb7\\u533a\",\"detail\":\"sdpt25-306\",\"update_time\":\"1970-01-01 08:00:00\"}', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `order_product`
--

CREATE TABLE `order_product` (
  `order_id` int(11) UNSIGNED DEFAULT NULL,
  `product_id` int(11) UNSIGNED DEFAULT NULL,
  `count` int(11) UNSIGNED DEFAULT NULL,
  `delete_time` int(11) UNSIGNED DEFAULT NULL,
  `update_time` int(11) UNSIGNED DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `order_product`
--

INSERT INTO `order_product` (`order_id`, `product_id`, `count`, `delete_time`, `update_time`) VALUES
(1, 1, 2, NULL, NULL),
(1, 2, 2, NULL, NULL),
(2, 1, 2, NULL, NULL),
(2, 2, 2, NULL, NULL),
(2, 3, 3, NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `product`
--

CREATE TABLE `product` (
  `id` int(11) UNSIGNED NOT NULL,
  `name` varchar(50) CHARACTER SET utf8 DEFAULT NULL COMMENT '商品名称',
  `price` decimal(20,2) UNSIGNED DEFAULT NULL COMMENT '商品价格',
  `stock` int(11) UNSIGNED DEFAULT NULL COMMENT '商品数量',
  `delete_time` int(11) DEFAULT NULL,
  `category_id` int(11) UNSIGNED DEFAULT NULL,
  `from` int(11) NOT NULL,
  `main_img_url` varchar(100) CHARACTER SET utf8 DEFAULT NULL,
  `create_time` int(11) DEFAULT NULL,
  `update_time` int(11) DEFAULT NULL,
  `summary` varchar(50) CHARACTER SET utf8 DEFAULT NULL,
  `img_id` int(11) UNSIGNED DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `product`
--

INSERT INTO `product` (`id`, `name`, `price`, `stock`, `delete_time`, `category_id`, `from`, `main_img_url`, `create_time`, `update_time`, `summary`, `img_id`) VALUES
(1, '商品1', '0.02', 999, NULL, 1, 1, '/xxxx', NULL, NULL, NULL, 1),
(2, '商品2', '0.01', 999, NULL, 1, 1, '/xxxx', NULL, NULL, NULL, 2),
(3, '商品3', '0.01', 999, NULL, 3, 1, '/xxxx', NULL, NULL, NULL, 3),
(4, '商品4', '0.01', 999, NULL, 1, 1, '/xxxx', NULL, NULL, NULL, 4),
(5, NULL, '0.01', 333, NULL, 1, 1, '/xxxx', NULL, NULL, NULL, 5),
(6, '商品', '0.01', 999, NULL, 2, 1, '/xxxx', NULL, NULL, NULL, 6),
(7, NULL, '0.01', 999, NULL, 1, 1, '/xxxx', NULL, NULL, NULL, 7),
(8, NULL, '0.01', 999, NULL, 1, 1, '/xxxx', NULL, NULL, NULL, 8),
(9, NULL, '0.01', 999, NULL, 2, 1, '/xxxx', NULL, NULL, NULL, 9),
(10, NULL, '0.01', 999, NULL, 2, 1, '/xxxx', NULL, NULL, NULL, 10),
(11, NULL, '0.01', 999, NULL, 2, 1, '/xxxx', NULL, NULL, NULL, 11),
(12, NULL, '0.01', 999, NULL, 2, 1, '/xxxx', NULL, NULL, NULL, 12),
(13, NULL, '0.01', 999, NULL, 2, 1, '/xxxx', NULL, NULL, NULL, 13),
(14, NULL, '0.01', 999, NULL, 2, 1, '/xxxx', NULL, NULL, NULL, 14),
(15, NULL, '0.01', 999, NULL, 3, 1, '/xxxx', NULL, NULL, NULL, 15),
(16, NULL, '0.01', 999, NULL, 6, 1, '/xxxx', NULL, NULL, NULL, 16),
(17, NULL, '0.01', 999, NULL, 6, 1, '/xxxx', NULL, NULL, NULL, 17),
(18, NULL, '0.01', 999, NULL, 6, 1, '/xxxx', NULL, NULL, NULL, 18),
(19, NULL, '0.01', 99, NULL, 6, 1, '/xxxx', NULL, NULL, NULL, 19),
(20, NULL, '0.01', 99, NULL, 3, 1, '/xxxx', NULL, NULL, NULL, 20),
(21, NULL, '0.01', 99, NULL, 3, 1, '/xxxx', NULL, NULL, NULL, 21),
(22, NULL, '0.01', 99, NULL, 1, 1, '/xxxx', NULL, NULL, NULL, 22),
(23, NULL, '0.01', 99, NULL, 1, 1, '/xxxx', NULL, NULL, NULL, 23),
(24, NULL, '0.01', 99, NULL, 1, 1, '/xxxx', NULL, NULL, NULL, 24),
(25, NULL, '0.01', 99, NULL, 2, 1, '/xxxx', NULL, NULL, NULL, 25),
(26, NULL, '0.01', 99, NULL, 4, 1, '/xxxx', NULL, NULL, NULL, 26),
(27, NULL, '0.01', 99, NULL, 4, 1, '/xxxx', NULL, NULL, NULL, 27),
(28, NULL, '0.01', 90, NULL, 4, 1, '/xxxx', NULL, NULL, NULL, 28),
(29, NULL, '0.01', 98, NULL, 4, 1, '/xxxx', NULL, NULL, NULL, 29),
(30, NULL, '0.01', 989, NULL, 5, 1, '/xxxx', NULL, NULL, NULL, 10),
(31, NULL, '0.01', 90, NULL, 5, 1, '/xxxx', NULL, NULL, NULL, 31),
(32, NULL, '0.01', 87, NULL, 5, 1, '/xxxx', NULL, NULL, NULL, 32),
(33, NULL, '0.01', 74, NULL, 5, 1, '/xxxx', NULL, NULL, NULL, 33);

-- --------------------------------------------------------

--
-- Table structure for table `product_image`
--

CREATE TABLE `product_image` (
  `id` int(11) UNSIGNED NOT NULL,
  `img_id` int(11) UNSIGNED DEFAULT NULL,
  `delete_time` int(11) DEFAULT NULL,
  `order` int(11) UNSIGNED DEFAULT NULL,
  `product_id` int(11) UNSIGNED DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `product_image`
--

INSERT INTO `product_image` (`id`, `img_id`, `delete_time`, `order`, `product_id`) VALUES
(1, 1, NULL, 1, 1),
(2, 1, NULL, 2, 1),
(3, 3, NULL, 3, 3),
(4, 4, NULL, 4, 4),
(5, 5, NULL, 5, 5),
(6, 6, NULL, 6, 6),
(7, 7, NULL, 7, 7);

-- --------------------------------------------------------

--
-- Table structure for table `product_property`
--

CREATE TABLE `product_property` (
  `id` int(11) UNSIGNED NOT NULL,
  `name` varchar(20) CHARACTER SET utf8 DEFAULT NULL,
  `detail` varchar(255) CHARACTER SET utf8 DEFAULT NULL,
  `product_id` int(11) UNSIGNED DEFAULT NULL,
  `delete_time` int(11) UNSIGNED DEFAULT NULL,
  `update_time` int(11) UNSIGNED DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `product_property`
--

INSERT INTO `product_property` (`id`, `name`, `detail`, `product_id`, `delete_time`, `update_time`) VALUES
(1, '品名', '杨梅', 1, NULL, NULL),
(2, '口味', '酸 甜 甘', 1, NULL, NULL),
(3, '产地', '广东', 1, NULL, NULL),
(4, '保质期', '12个月', 1, NULL, NULL),
(5, '品名', '梨子', 2, NULL, NULL),
(6, '产地', '湖南', 2, NULL, NULL),
(7, '净含量', '500g', 2, NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `theme`
--

CREATE TABLE `theme` (
  `id` int(11) UNSIGNED NOT NULL,
  `name` varchar(50) CHARACTER SET utf8 DEFAULT NULL COMMENT '专题栏位名称',
  `description` varchar(255) CHARACTER SET utf8 DEFAULT NULL COMMENT '专题栏位的描述',
  `topic_img_id` int(11) UNSIGNED NOT NULL COMMENT '首页专题栏位显示的图片，关联图片表的id',
  `delete_time` int(11) DEFAULT NULL,
  `head_img_id` int(11) UNSIGNED NOT NULL COMMENT '点击首页栏位图片进去新页面的头部图片，关联image表的id',
  `update_time` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `theme`
--

INSERT INTO `theme` (`id`, `name`, `description`, `topic_img_id`, `delete_time`, `head_img_id`, `update_time`) VALUES
(1, '专题栏位一', '水果世界', 16, NULL, 30, NULL),
(2, '专题栏位二', '新品推荐', 17, NULL, 31, NULL),
(3, '专题栏位三', '美味佳肴', 18, NULL, 32, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `theme_product`
--

CREATE TABLE `theme_product` (
  `theme_id` int(11) UNSIGNED NOT NULL COMMENT '关联theme表的id',
  `product_id` int(11) UNSIGNED NOT NULL COMMENT '关联product表的id'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `theme_product`
--

INSERT INTO `theme_product` (`theme_id`, `product_id`) VALUES
(1, 5),
(1, 2),
(1, 3),
(1, 10),
(1, 12),
(2, 1),
(2, 2),
(2, 3),
(2, 5),
(2, 6),
(2, 33),
(2, 16),
(3, 15),
(3, 18),
(3, 19),
(3, 27),
(3, 30),
(3, 31);

-- --------------------------------------------------------

--
-- Table structure for table `user`
--

CREATE TABLE `user` (
  `id` int(11) UNSIGNED NOT NULL,
  `openid` varchar(50) CHARACTER SET utf8 DEFAULT NULL,
  `nickname` varchar(50) CHARACTER SET utf8 DEFAULT NULL,
  `extend` varchar(255) CHARACTER SET utf8 DEFAULT NULL,
  `delete_time` int(11) DEFAULT NULL,
  `create_time` int(11) DEFAULT NULL,
  `update_time` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `user`
--

INSERT INTO `user` (`id`, `openid`, `nickname`, `extend`, `delete_time`, `create_time`, `update_time`) VALUES
(3, 'oHnQM5FKtBRd27BkeafLQN1dRc0s', NULL, NULL, NULL, NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `user_address`
--

CREATE TABLE `user_address` (
  `id` int(11) UNSIGNED NOT NULL,
  `name` varchar(50) CHARACTER SET utf8 DEFAULT NULL,
  `mobile` varchar(30) CHARACTER SET utf8 DEFAULT NULL,
  `province` varchar(50) CHARACTER SET utf8 DEFAULT NULL,
  `city` varchar(50) CHARACTER SET utf8 DEFAULT NULL,
  `country` varchar(50) CHARACTER SET utf8 DEFAULT NULL,
  `detail` varchar(255) CHARACTER SET utf8 DEFAULT NULL,
  `user_id` int(11) UNSIGNED DEFAULT NULL,
  `delete_time` int(11) UNSIGNED DEFAULT NULL,
  `update_time` int(11) UNSIGNED DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `user_address`
--

INSERT INTO `user_address` (`id`, `name`, `mobile`, `province`, `city`, `country`, `detail`, `user_id`, `delete_time`, `update_time`) VALUES
(1, 'qingdong', '13119890486', '广东省', '佛山市', '顺德区', 'sdpt25-306', 3, NULL, NULL);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `banner`
--
ALTER TABLE `banner`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `banner_item`
--
ALTER TABLE `banner_item`
  ADD PRIMARY KEY (`id`),
  ADD KEY `banner_item_ibfk_1` (`banner_id`),
  ADD KEY `img_id` (`img_id`);

--
-- Indexes for table `category`
--
ALTER TABLE `category`
  ADD PRIMARY KEY (`id`),
  ADD KEY `topic_img_id` (`topic_img_id`);

--
-- Indexes for table `image`
--
ALTER TABLE `image`
  ADD PRIMARY KEY (`id`),
  ADD KEY `id` (`id`);

--
-- Indexes for table `order`
--
ALTER TABLE `order`
  ADD PRIMARY KEY (`id`),
  ADD KEY `user_id` (`user_id`);

--
-- Indexes for table `order_product`
--
ALTER TABLE `order_product`
  ADD KEY `order_id` (`order_id`),
  ADD KEY `product_id` (`product_id`);

--
-- Indexes for table `product`
--
ALTER TABLE `product`
  ADD PRIMARY KEY (`id`),
  ADD KEY `img_id` (`img_id`);

--
-- Indexes for table `product_image`
--
ALTER TABLE `product_image`
  ADD PRIMARY KEY (`id`),
  ADD KEY `img_id` (`img_id`),
  ADD KEY `product_id` (`product_id`);

--
-- Indexes for table `product_property`
--
ALTER TABLE `product_property`
  ADD PRIMARY KEY (`id`),
  ADD KEY `product_id` (`product_id`);

--
-- Indexes for table `theme`
--
ALTER TABLE `theme`
  ADD PRIMARY KEY (`id`),
  ADD KEY `topic_img_id` (`topic_img_id`),
  ADD KEY `head_img_id` (`head_img_id`);

--
-- Indexes for table `theme_product`
--
ALTER TABLE `theme_product`
  ADD KEY `theme_id` (`theme_id`),
  ADD KEY `product_id` (`product_id`);

--
-- Indexes for table `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `user_address`
--
ALTER TABLE `user_address`
  ADD PRIMARY KEY (`id`),
  ADD KEY `user_id` (`user_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `banner`
--
ALTER TABLE `banner`
  MODIFY `id` int(11) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `banner_item`
--
ALTER TABLE `banner_item`
  MODIFY `id` int(11) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `category`
--
ALTER TABLE `category`
  MODIFY `id` int(11) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `image`
--
ALTER TABLE `image`
  MODIFY `id` int(11) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=34;

--
-- AUTO_INCREMENT for table `order`
--
ALTER TABLE `order`
  MODIFY `id` int(11) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `product`
--
ALTER TABLE `product`
  MODIFY `id` int(11) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=34;

--
-- AUTO_INCREMENT for table `product_image`
--
ALTER TABLE `product_image`
  MODIFY `id` int(11) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `product_property`
--
ALTER TABLE `product_property`
  MODIFY `id` int(11) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `theme`
--
ALTER TABLE `theme`
  MODIFY `id` int(11) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `user`
--
ALTER TABLE `user`
  MODIFY `id` int(11) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `user_address`
--
ALTER TABLE `user_address`
  MODIFY `id` int(11) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `banner_item`
--
ALTER TABLE `banner_item`
  ADD CONSTRAINT `banner_item_ibfk_1` FOREIGN KEY (`banner_id`) REFERENCES `banner` (`id`),
  ADD CONSTRAINT `banner_item_ibfk_2` FOREIGN KEY (`img_id`) REFERENCES `image` (`id`);

--
-- Constraints for table `category`
--
ALTER TABLE `category`
  ADD CONSTRAINT `category_ibfk_1` FOREIGN KEY (`topic_img_id`) REFERENCES `image` (`id`);

--
-- Constraints for table `order`
--
ALTER TABLE `order`
  ADD CONSTRAINT `order_ibfk_1` FOREIGN KEY (`user_id`) REFERENCES `user` (`id`);

--
-- Constraints for table `order_product`
--
ALTER TABLE `order_product`
  ADD CONSTRAINT `order_product_ibfk_1` FOREIGN KEY (`order_id`) REFERENCES `order` (`id`),
  ADD CONSTRAINT `order_product_ibfk_2` FOREIGN KEY (`product_id`) REFERENCES `product` (`id`);

--
-- Constraints for table `product`
--
ALTER TABLE `product`
  ADD CONSTRAINT `product_ibfk_1` FOREIGN KEY (`img_id`) REFERENCES `image` (`id`);

--
-- Constraints for table `product_image`
--
ALTER TABLE `product_image`
  ADD CONSTRAINT `product_image_ibfk_1` FOREIGN KEY (`img_id`) REFERENCES `image` (`id`),
  ADD CONSTRAINT `product_image_ibfk_2` FOREIGN KEY (`product_id`) REFERENCES `product` (`id`);

--
-- Constraints for table `product_property`
--
ALTER TABLE `product_property`
  ADD CONSTRAINT `product_property_ibfk_1` FOREIGN KEY (`product_id`) REFERENCES `product` (`id`);

--
-- Constraints for table `theme`
--
ALTER TABLE `theme`
  ADD CONSTRAINT `theme_ibfk_1` FOREIGN KEY (`topic_img_id`) REFERENCES `image` (`id`),
  ADD CONSTRAINT `theme_ibfk_2` FOREIGN KEY (`head_img_id`) REFERENCES `image` (`id`);

--
-- Constraints for table `theme_product`
--
ALTER TABLE `theme_product`
  ADD CONSTRAINT `theme_product_ibfk_1` FOREIGN KEY (`theme_id`) REFERENCES `theme` (`id`),
  ADD CONSTRAINT `theme_product_ibfk_2` FOREIGN KEY (`product_id`) REFERENCES `product` (`id`);

--
-- Constraints for table `user_address`
--
ALTER TABLE `user_address`
  ADD CONSTRAINT `user_address_ibfk_1` FOREIGN KEY (`user_id`) REFERENCES `user` (`id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
