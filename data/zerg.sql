-- phpMyAdmin SQL Dump
-- version 4.8.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jul 13, 2018 at 04:46 PM
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
  `img_id` int(11) NOT NULL COMMENT '外键，关联到image表',
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
  ADD KEY `banner_item_ibfk_1` (`banner_id`);

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
-- Constraints for dumped tables
--

--
-- Constraints for table `banner_item`
--
ALTER TABLE `banner_item`
  ADD CONSTRAINT `banner_item_ibfk_1` FOREIGN KEY (`banner_id`) REFERENCES `banner_item` (`id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
