-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- 主機： 127.0.0.1
-- 產生時間： 2022-07-27 17:09:21
-- 伺服器版本： 10.4.21-MariaDB
-- PHP 版本： 8.0.11

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- 資料庫: `business`
--

-- --------------------------------------------------------

--
-- 資料表結構 `admin`
--

CREATE TABLE `admin` (
  `id` int(11) NOT NULL,
  `acc` text NOT NULL,
  `pw` text NOT NULL,
  `permit` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- 傾印資料表的資料 `admin`
--

INSERT INTO `admin` (`id`, `acc`, `pw`, `permit`) VALUES
(1, 'admin', '1234', 'a:5:{i:0;s:1:\"0\";i:1;s:1:\"1\";i:2;s:1:\"2\";i:3;s:1:\"3\";i:4;s:1:\"4\";}'),
(9, 'test', 'test', 'a:4:{i:0;s:1:\"1\";i:1;s:1:\"2\";i:2;s:1:\"3\";i:3;s:1:\"4\";}'),
(25, '101', '101', 'a:3:{i:0;s:1:\"1\";i:1;s:1:\"2\";i:2;s:1:\"4\";}'),
(30, 'admin123', '1234123', 'a:3:{i:0;s:1:\"1\";i:1;s:1:\"2\";i:2;s:1:\"3\";}');

-- --------------------------------------------------------

--
-- 資料表結構 `category`
--

CREATE TABLE `category` (
  `id` int(11) NOT NULL,
  `name` text NOT NULL,
  `parent` int(11) NOT NULL,
  `count` int(11) DEFAULT 0
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- 傾印資料表的資料 `category`
--

INSERT INTO `category` (`id`, `name`, `parent`, `count`) VALUES
(1, '男裝區', 0, 0),
(2, '女裝區', 0, 0),
(3, '鞋子', 0, 0),
(4, '皮包', 0, 0),
(13, '褲子', 1, 0),
(14, '上衣', 2, 0),
(15, '衣服', 1, 0),
(16, '襪子', 1, 0),
(17, '裙子', 2, 0),
(18, '內衣', 2, 0),
(19, '拖鞋', 3, 0),
(20, '男皮夾', 4, 0),
(25, '測試', 0, 0);

-- --------------------------------------------------------

--
-- 資料表結構 `foot`
--

CREATE TABLE `foot` (
  `foot` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- 傾印資料表的資料 `foot`
--

INSERT INTO `foot` (`foot`) VALUES
('頁尾測試');

-- --------------------------------------------------------

--
-- 資料表結構 `item_detail`
--

CREATE TABLE `item_detail` (
  `id` int(11) NOT NULL,
  `no` text NOT NULL,
  `name` text NOT NULL,
  `price` int(11) NOT NULL,
  `file_img` text NOT NULL,
  `primary` int(11) NOT NULL,
  `secondary` int(11) NOT NULL,
  `stock` int(11) DEFAULT 0,
  `type` text NOT NULL,
  `introduce` text NOT NULL,
  `sell_state` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- 傾印資料表的資料 `item_detail`
--

INSERT INTO `item_detail` (`id`, `no`, `name`, `price`, `file_img`, `primary`, `secondary`, `stock`, `type`, `introduce`, `sell_state`) VALUES
(1, '021447', '藍色外套', 1300, 'woman-ge2503113e_1280.jpg', 2, 14, 33, 's', '藍色很漂亮>>', 1),
(3, '021885', '蕾絲', 600, 'woman-g95b46493f_640.jpg', 2, 18, 99, 'D', '黑色的', 1),
(4, '\r\n011547', '夾克', 3600, 'man-gd6301cf0d_640.jpg', 1, 15, 6, 'L', '字母酷炫', 1),
(5, '\r\n011651', '彩虹襪', 50, 'read-gd436ed32d_640.jpg', 1, 16, 10, 'one size', '可愛', 1),
(7, '011399', '刷毛牛仔褲', 600, 'lonely-g5656f1907_640.jpg', 1, 13, 99, 'L', '酷炫的', 1);

-- --------------------------------------------------------

--
-- 資料表結構 `item_order`
--

CREATE TABLE `item_order` (
  `id` int(11) NOT NULL,
  `number` text NOT NULL,
  `total` int(11) NOT NULL,
  `acc` text NOT NULL,
  `name` text NOT NULL,
  `date` timestamp NULL DEFAULT current_timestamp(),
  `addr` text NOT NULL,
  `email` text NOT NULL,
  `tel` text NOT NULL,
  `items` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- 傾印資料表的資料 `item_order`
--

INSERT INTO `item_order` (`id`, `number`, `total`, `acc`, `name`, `date`, `addr`, `email`, `tel`, `items`) VALUES
(5, '20220712192983', 5600, '1', '1', '2022-07-12 17:29:20', '1', '1', '1', 'a:2:{i:1;s:1:\"2\";i:4;s:1:\"1\";}'),
(6, '20220712192944', 1000, '1', '1', '2022-07-12 17:29:53', '1', '1', '1', 'a:1:{i:1;s:1:\"1\";}'),
(15, '20220715171778', 3600, '1', '1', '2022-07-15 15:17:27', '50', '1', '1', 'a:1:{i:4;s:1:\"1\";}'),
(44, '20220716191279', 3000, '1', '7', '2022-07-16 17:12:32', '50', '1', '1', 'a:1:{i:1;s:1:\"3\";}'),
(49, '20220717162376', 3000, '1', 'test777', '2022-07-17 14:23:52', '50', '1', '1', 'a:1:{i:1;s:1:\"3\";}'),
(52, '20220725211595', 2600, '5', '5', '2022-07-25 19:15:41', '5', '5', '5', 'a:1:{i:1;s:1:\"2\";}'),
(54, '20220725211752', 3000, '5', '5', '2022-07-25 19:17:41', '5', '5', '5', 'a:1:{i:3;s:1:\"5\";}');

-- --------------------------------------------------------

--
-- 資料表結構 `user`
--

CREATE TABLE `user` (
  `id` int(11) NOT NULL,
  `acc` text NOT NULL,
  `name` text NOT NULL,
  `pw` text NOT NULL,
  `addr` text NOT NULL,
  `email` text NOT NULL,
  `tel` text NOT NULL,
  `total` int(11) NOT NULL,
  `register_data` timestamp NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- 傾印資料表的資料 `user`
--

INSERT INTO `user` (`id`, `acc`, `name`, `pw`, `addr`, `email`, `tel`, `total`, `register_data`) VALUES
(1, 'test123', 'test123', 'test123', 'test123', 'test123', 'test123', 0, NULL),
(2, '4444', '4444', '4444', '4444', '4444', '4444', 0, NULL),
(13, '5', '5', '5', '5', '5', '5', 0, '2022-07-04 18:32:04'),
(16, '1', '1', '1', '50', '1', '1', 0, '2022-07-12 18:23:30'),
(18, 'asdqwe', 'asd', 'asdqwe', '48', '222@yahoo.com', '0900000000', 0, '2022-07-13 17:47:16'),
(19, '88888888', '88888888', '88888888', '8', '584@yahoo.com', '0900888888', 0, '2022-07-14 09:45:20'),
(20, '123456', '報文', '123456', '55555', '1@yahoo.com', '0912345678', 0, '2022-07-15 07:59:41');

--
-- 已傾印資料表的索引
--

--
-- 資料表索引 `admin`
--
ALTER TABLE `admin`
  ADD PRIMARY KEY (`id`);

--
-- 資料表索引 `category`
--
ALTER TABLE `category`
  ADD PRIMARY KEY (`id`);

--
-- 資料表索引 `item_detail`
--
ALTER TABLE `item_detail`
  ADD PRIMARY KEY (`id`);

--
-- 資料表索引 `item_order`
--
ALTER TABLE `item_order`
  ADD PRIMARY KEY (`id`);

--
-- 資料表索引 `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`id`);

--
-- 在傾印的資料表使用自動遞增(AUTO_INCREMENT)
--

--
-- 使用資料表自動遞增(AUTO_INCREMENT) `admin`
--
ALTER TABLE `admin`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=32;

--
-- 使用資料表自動遞增(AUTO_INCREMENT) `category`
--
ALTER TABLE `category`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=26;

--
-- 使用資料表自動遞增(AUTO_INCREMENT) `item_detail`
--
ALTER TABLE `item_detail`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- 使用資料表自動遞增(AUTO_INCREMENT) `item_order`
--
ALTER TABLE `item_order`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=56;

--
-- 使用資料表自動遞增(AUTO_INCREMENT) `user`
--
ALTER TABLE `user`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=21;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
