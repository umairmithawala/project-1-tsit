-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jun 06, 2022 at 12:17 PM
-- Server version: 10.4.22-MariaDB
-- PHP Version: 7.4.27

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `tsit_academy`
--

-- --------------------------------------------------------

--
-- Table structure for table `blog`
--

CREATE TABLE `blog` (
  `id` int(11) NOT NULL,
  `blog_title` varchar(500) DEFAULT NULL,
  `thumbnail_img` varchar(256) DEFAULT NULL,
  `blog_body` varchar(500) DEFAULT NULL,
  `publish_date` int(50) DEFAULT NULL,
  `keywords` varchar(256) DEFAULT NULL,
  `unique_link` varchar(55) DEFAULT NULL,
  `dislike` int(11) DEFAULT NULL,
  `is_deleted` int(11) DEFAULT 0,
  `added_by` varchar(55) DEFAULT NULL,
  `category_first_id` int(11) DEFAULT 0,
  `category_second_id` int(11) DEFAULT 0,
  `category_third_id` int(11) DEFAULT 0,
  `is_slider` varchar(256) DEFAULT '0',
  `likes` float DEFAULT NULL,
  `view` int(11) DEFAULT NULL,
  `comment` varchar(256) DEFAULT NULL,
  `sharing` varchar(256) DEFAULT NULL,
  `description` varchar(1000) DEFAULT NULL,
  `timestamp` int(50) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `blog`
--

INSERT INTO `blog` (`id`, `blog_title`, `thumbnail_img`, `blog_body`, `publish_date`, `keywords`, `unique_link`, `dislike`, `is_deleted`, `added_by`, `category_first_id`, `category_second_id`, `category_third_id`, `is_slider`, `likes`, `view`, `comment`, `sharing`, `description`, `timestamp`) VALUES
(1, 'Aut voluptatem inve', 'thumbnail_img1654510401akc1747125583.jpg', '&lt;p&gt;klsdjfkljdf&lt;/p&gt;', 1017529200, 'Dolore impedit cons', 'ut-odit-illo-dolor-c-ad ', NULL, 0, '1', 1, 13, 9, '0', 0, 0, NULL, NULL, 'Voluptatum voluptate', 1654510401),
(2, 'Velit consectetur', 'thumbnail_img1654510475akc1660073288.jpg', '&lt;p&gt;kdf&lt;/p&gt;', 1654466400, 'Culpa ut ducimus es', 'aspernatur-veniam-22 ', NULL, 0, '1', 1, 0, 0, '0', 120, 256, NULL, NULL, 'Impedit labore occa', 1654510475),
(3, 'Distinctio Similiqu', 'thumbnail_img1654510496akc279675019.jpg', '&lt;p&gt;MSDNsvmnfvdjkn&lt;/p&gt;', 1654466400, 'Aliquam dolorem even', 'dolor-nulla-eu-optio-35 ', NULL, 0, '1', 1, 18, 0, '0', 0, 0, NULL, NULL, 'Enim dignissimos ea ', 1654510496),
(4, 'Quod reprehenderit ', 'thumbnail_img1654510520akc1631945332.jpg', '&lt;p&gt;lks;ld;fl&lt;/p&gt;', 1654466400, 'Enim sunt error nihi', 'nihil-magni-dicta-ve-ce ', NULL, 0, '1', 1, 0, 0, '0', 0, 0, NULL, NULL, 'Velit est ullam non ', 1654510520);

-- --------------------------------------------------------

--
-- Table structure for table `category_list`
--

CREATE TABLE `category_list` (
  `id` int(11) NOT NULL,
  `name` varchar(256) DEFAULT NULL,
  `unique_link` varchar(256) DEFAULT NULL,
  `is_deleted` int(11) DEFAULT 0
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `category_list`
--

INSERT INTO `category_list` (`id`, `name`, `unique_link`, `is_deleted`) VALUES
(1, 'cate1', 'cate-10', 0),
(2, 'cate2', 'cate-2', 0),
(3, 'cate3', 'cate-3', 0),
(4, 'cate4', 'cate-4', 0),
(6, 'cate7', 'category-seven', 0),
(7, 'cate6', 'category-six', 0),
(8, 'cate5', 'category-five', 0),
(9, 'cate8', 'category-eight-7d', 0),
(10, 'cate9', 'category-eight-7d-f4', 0),
(11, 'cate9', 'category-eight-7d-37', 0),
(12, 'cate9', 'category-eight-7d-ba', 0),
(13, 'cate9', 'category-eight-7d-fe', 0),
(14, 'cate9', 'category-eight-7d-a1', 0),
(15, 'cate9', 'category-eight-7d-c3', 0),
(16, 'cate9', 'category-eight-7d-63', 0),
(17, 'cate9', 'category-eight-7d-6f', 0),
(18, 'cate10', 'category-ten-c3', 0),
(19, 'cate10', 'category-ten-b8', 0),
(20, 'cate10', 'category-ten-fd', 0),
(21, 'cate11', 'cate-eleven-70', 0),
(22, 'cate11', 'cate-eleven-57', 0);

-- --------------------------------------------------------

--
-- Table structure for table `comment`
--

CREATE TABLE `comment` (
  `id` int(11) NOT NULL,
  `blog_id` int(11) DEFAULT NULL,
  `user_id` int(11) DEFAULT NULL,
  `comment` varchar(256) DEFAULT NULL,
  `is_deleted` int(11) DEFAULT 0,
  `timestamp` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `comment`
--

INSERT INTO `comment` (`id`, `blog_id`, `user_id`, `comment`, `is_deleted`, `timestamp`) VALUES
(1, 23, 2, 'Very Helpfull blog', 0, 1651494898),
(2, 6, 3, 'I think this blog is very helpful', 0, 1650924000),
(3, 4, 4, 'this blog is good ', 0, 1651901032),
(4, 24, 5, 'I am happy to read this blog aaj ni savar.', 0, 1651901493),
(5, 24, 2, 'I am happy to read this blog aaj ni savar.', 0, 1651901519),
(6, 4, 2, 'helpfull blog', 0, 1652090586),
(7, 2, 2, 'umai', 0, 1652246235),
(8, 2, 2, 'hello', 0, 1652247685),
(9, 2, 1, 'hello', 0, 1652247745),
(10, 2, 3, 'i am new', 0, 1652247838),
(11, 2, 2, 'jgkjjg', 0, 1652351516);

-- --------------------------------------------------------

--
-- Table structure for table `dislike`
--

CREATE TABLE `dislike` (
  `id` int(11) NOT NULL,
  `user_id` int(11) DEFAULT NULL,
  `blog_id` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `dislike`
--

INSERT INTO `dislike` (`id`, `user_id`, `blog_id`) VALUES
(4, 2, 2);

-- --------------------------------------------------------

--
-- Table structure for table `like`
--

CREATE TABLE `like` (
  `id` int(11) NOT NULL,
  `user_id` int(11) DEFAULT NULL,
  `blog_id` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` int(11) NOT NULL,
  `user_role` int(11) DEFAULT NULL,
  `name` varchar(256) DEFAULT NULL,
  `email` varchar(55) DEFAULT NULL,
  `password` varchar(256) DEFAULT NULL,
  `user_img` varchar(256) DEFAULT 'no-image.png',
  `is_banned` int(11) DEFAULT 0,
  `is_verified` int(11) NOT NULL DEFAULT 0,
  `timestamp` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `user_role`, `name`, `email`, `password`, `user_img`, `is_banned`, `is_verified`, `timestamp`) VALUES
(1, 1, 'admin', 'admin@gmail.com', 'admin', 'user_img1651916898naisavar623141263.png', 0, 0, 1649768739),
(2, 2, 'john', 'test@testing.com', 'test', 'user_img1652339897naisavar1108823740.png', 0, 1, 1649768739),
(3, 2, 'Umair', 'u@gmail.com', 'u', 'user_img1651916432naisavar1481222131.png', 0, 1, 1649840259),
(4, 2, 'Shannon Keller ', 'z@mailinator.com ', ' Autem qui error qui  ', 'user_img1651916432naisavar1481222131.png', 0, 0, 1651916432),
(5, 2, 'Amery Wyatt', 't@mailinator.com', 'pass123', 'user_img1651916898naisavar623141263.png', 0, 0, 1651916898),
(6, 2, 'penerarame@mailinator.com', 'xypebir@mailinator.com', 'Pa$$w0rd!', NULL, 0, 0, 1652163953),
(7, 2, 'lateho@mailinator.com', 'hatizil@mailinator.com', 'Pa$$w0rd!', NULL, 0, 0, 1652163953),
(8, 2, 'jyfi@mailinator.com', 'puxydudi@mailinator.com', 'Pa$$w0rd!', NULL, 0, 0, 1652164114),
(9, 2, '', 'user@tsit.com', 'tsit', NULL, 0, 0, 1652269184),
(10, 2, 'fydyl@mailinator.com', 'gequhyxuse@mailinator.com', 'Pa$$w0rd!', 'no-image.png', 0, 0, 1652339826),
(11, 2, 'cexaqe@mailinator.com', 'sazo@mailinator.com', 'Pa$$w0rd!', 'no-image.png', 0, 0, 1652340135),
(12, 2, 'situpiilinator.com', 'qaxahuqi@mailinator.com', 'Pa$$w0rd!', 'no-image.png', 0, 0, 1652340308),
(13, 2, 'veatorcom', 'qyzuhaha@mailinator.com', 'Pa$$w0rd!', 'no-image.png', 0, 0, 1652340332),
(14, 2, 'Quinlan Holman', 'lifopysyda@mailinator.com', 'Pa$$w0rd!', 'no-image.png', 0, 0, 1652340402),
(15, 2, 'Ifeoma Fisher', 'javuc@mailinator.com', 'Pa$$w0rd!', 'no-image.png', 0, 0, 1652340452),
(16, 2, 'Kevyn Powers', 'puxydeb@mailinator.com', 'Pa$$w0rd!', 'no-image.png', 0, 0, 1652340651),
(17, 2, 'Andrew Hodge', 'hafovina@mailinator.com', 'Pa$$w0rd!', 'no-image.png', 0, 0, 1652341054),
(18, 2, 'Ivy Clay', 'nikacuqo@mailinator.com', 'Pa$$w0rd!', 'no-image.png', 0, 0, 1652352832),
(19, 2, 'guest_72d1e8', 'guest_68eb26@gmail.com', 'c76122', 'no-image.png', 0, 0, 1653380537),
(20, 2, 'guest_4aa959', 'guest_12cb64@gmail.com', '4bd55f', 'no-image.png', 0, 0, 1653383884),
(21, 2, 'guest_4172ef', 'guest_98f0a6@gmail.com', '7c816e', 'no-image.png', 0, 0, 1653570546);

-- --------------------------------------------------------

--
-- Table structure for table `user_role`
--

CREATE TABLE `user_role` (
  `id` int(11) NOT NULL,
  `user_role` varchar(55) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `user_role`
--

INSERT INTO `user_role` (`id`, `user_role`) VALUES
(1, 'admin'),
(2, 'reader');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `blog`
--
ALTER TABLE `blog`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `category_list`
--
ALTER TABLE `category_list`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `comment`
--
ALTER TABLE `comment`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `dislike`
--
ALTER TABLE `dislike`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `like`
--
ALTER TABLE `like`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `user_role`
--
ALTER TABLE `user_role`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `blog`
--
ALTER TABLE `blog`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `category_list`
--
ALTER TABLE `category_list`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=23;

--
-- AUTO_INCREMENT for table `comment`
--
ALTER TABLE `comment`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT for table `dislike`
--
ALTER TABLE `dislike`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `like`
--
ALTER TABLE `like`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=22;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
