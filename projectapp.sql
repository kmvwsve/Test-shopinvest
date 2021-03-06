-- phpMyAdmin SQL Dump
-- version 5.1.0
-- https://www.phpmyadmin.net/
--
-- 主机： localhost
-- 生成日期： 2021-04-16 04:27:30
-- 服务器版本： 5.7.26
-- PHP 版本： 7.3.5

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- 数据库： `projectapp`
--

-- --------------------------------------------------------

--
-- 表的结构 `mark`
--

CREATE TABLE `mark` (
  `mark_id` int(11) NOT NULL,
  `name` varchar(64) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 ROW_FORMAT=DYNAMIC;

--
-- 转存表中的数据 `mark`
--

INSERT INTO `mark` (`mark_id`, `name`) VALUES
(1, 'H&M'),
(2, 'Celio'),
(3, 'ZARA'),
(4, 'Versace'),
(5, 'Hermes'),
(6, 'Gucci');

-- --------------------------------------------------------

--
-- 表的结构 `product`
--

CREATE TABLE `product` (
  `product_id` int(11) NOT NULL,
  `name` varchar(255) NOT NULL,
  `description` text,
  `quantity` int(4) NOT NULL DEFAULT '0',
  `image` varchar(255) DEFAULT NULL,
  `mark_id` int(11) DEFAULT NULL,
  `price` decimal(15,4) NOT NULL DEFAULT '0.0000',
  `special` decimal(15,4) NOT NULL DEFAULT '0.0000',
  `sort_order` int(3) NOT NULL DEFAULT '0'
) ENGINE=InnoDB DEFAULT CHARSET=utf8 ROW_FORMAT=DYNAMIC;

--
-- 转存表中的数据 `product`
--

INSERT INTO `product` (`product_id`, `name`, `description`, `quantity`, `image`, `mark_id`, `price`, `special`, `sort_order`) VALUES
(1, 'Blouson court sans col légèrement matelassés', 'Le blouson s\'offre un effet matelassé et un imprimé fleuri pour booster votre allure. Il se distingue par son raffinement, mais il n\'en oublie pas pour autant votre confort avec sa base élastiquée. Crush mode pour cette pièce de mi-saison.', 10, '1.jpg', 1, '59.9900', '49.9900', 0),
(16, 'xxxxxxxxxxxxx', 'ttttttttttttttttttttttt', 999, '2.jpg', 1, '100.0000', '70.0000', 0),
(17, 'Robe droite imprimé floral, longueur midi, 3/4', 'On aime cette robe twistée par des manches courtes bouffantes et une base volantée. Avec son tissu aérien et légèrement transparent, elle a un petit côté frais qui nous fait craquer !', 6, '10.jpg', 1, '69.9900', '0.0000', 0),
(18, 'Jupe courte imprimée fleurs, à volant', 'Succombez à cette jupe imprimée, dotée d\'un volant à la base pour encore plus de féminité. On aime son motif fleurs aquarellé tendance. Courte, elle met en valeur les jambes. Associez-lui un top uni et des sandales.s1111', 5, '12.jpg', 5, '29.9900', '0.0000', 0),
(19, 'Tee shirt en lin col rond manches courtes', 'On aime ce T-shirt col rond en pur lin : une matière naturelle, fraiche, et tellement à agréable à porter l\'été. Le lin sublime les couleurs de ce T-shirt basique.', 0, '11.jpg', 4, '24.9900', '20.9900', 0),
(22, 'qdsf', 'qsdfqsdf', 0, '', 1, '10.0000', '0.0000', 0),
(24, 'qsdfqsd', 'qsdfqsdfqsdfqsdf', 0, '', 1, '10.0000', '0.0000', 0),
(25, 'ssssssssssssss', '111111111111', 0, '', 1, '111.0000', '0.0000', 0);

-- --------------------------------------------------------

--
-- 表的结构 `product_image`
--

CREATE TABLE `product_image` (
  `product_image_id` int(11) NOT NULL,
  `product_id` int(11) NOT NULL,
  `image` varchar(255) DEFAULT NULL,
  `sort_order` int(3) NOT NULL DEFAULT '0'
) ENGINE=InnoDB DEFAULT CHARSET=utf8 ROW_FORMAT=DYNAMIC;

--
-- 转存表中的数据 `product_image`
--

INSERT INTO `product_image` (`product_image_id`, `product_id`, `image`, `sort_order`) VALUES
(16, 16, '10.jpg', 0),
(17, 16, '11.jpg', 0),
(26, 19, '', 0),
(39, 17, '', 0),
(46, 18, '', 0),
(53, 22, '', 0),
(55, 1, '2.jpg', 0),
(56, 1, '3.jpg', 0),
(57, 1, '4.jpg', 0),
(58, 24, '', 0),
(62, 25, '', 0);

-- --------------------------------------------------------

--
-- 表的结构 `spt_user`
--

CREATE TABLE `spt_user` (
  `user_id` int(11) NOT NULL,
  `username` varchar(20) NOT NULL,
  `password` varchar(40) NOT NULL,
  `salt` varchar(9) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 ROW_FORMAT=DYNAMIC;

--
-- 转存表中的数据 `spt_user`
--

INSERT INTO `spt_user` (`user_id`, `username`, `password`, `salt`) VALUES
(1, 'shopinvest', 'e75f8c560d8f3cf75e1a6eec8e7ed8a4', ''),
(2, 'kmvwsue', 'e10adc3949ba59abbe56e057f20f883e', '');

--
-- 转储表的索引
--

--
-- 表的索引 `mark`
--
ALTER TABLE `mark`
  ADD PRIMARY KEY (`mark_id`);

--
-- 表的索引 `product`
--
ALTER TABLE `product`
  ADD PRIMARY KEY (`product_id`);

--
-- 表的索引 `product_image`
--
ALTER TABLE `product_image`
  ADD PRIMARY KEY (`product_image_id`),
  ADD KEY `product_id` (`product_id`);

--
-- 表的索引 `spt_user`
--
ALTER TABLE `spt_user`
  ADD PRIMARY KEY (`user_id`);

--
-- 在导出的表使用AUTO_INCREMENT
--

--
-- 使用表AUTO_INCREMENT `mark`
--
ALTER TABLE `mark`
  MODIFY `mark_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- 使用表AUTO_INCREMENT `product`
--
ALTER TABLE `product`
  MODIFY `product_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=27;

--
-- 使用表AUTO_INCREMENT `product_image`
--
ALTER TABLE `product_image`
  MODIFY `product_image_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=63;

--
-- 使用表AUTO_INCREMENT `spt_user`
--
ALTER TABLE `spt_user`
  MODIFY `user_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
