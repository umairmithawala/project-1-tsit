-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1:3306
-- Generation Time: Apr 21, 2022 at 06:07 AM
-- Server version: 10.5.13-MariaDB-cll-lve
-- PHP Version: 7.2.34

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `u284700232_tsit`
--

-- --------------------------------------------------------

--
-- Table structure for table `dashboard_news`
--

CREATE TABLE `dashboard_news` (
  `id` int(11) NOT NULL,
  `title` varchar(1000) DEFAULT NULL,
  `added_by` int(11) DEFAULT NULL,
  `is_deleted` int(11) DEFAULT 0,
  `timestamp` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `dashboard_news`
--

INSERT INTO `dashboard_news` (`id`, `title`, `added_by`, `is_deleted`, `timestamp`) VALUES
(1, 'abcd has joined the community', 24, 0, 1649960662),
(2, 'anzar KYC approved', 10, 0, 1649961208),
(3, 'Jan Bender has joined the community', 25, 0, 1650019500),
(4, 'Muhammad Aslam has joined the community', 26, 0, 1650023539),
(5, 'Carmen Sandra Meyer KYC approved', 10, 0, 1650033655),
(6, 'Christian Heneka KYC approved', 10, 0, 1650033692),
(7, 'Reto Stauffacher KYC approved', 10, 0, 1650033768),
(8, 'Ferhat Gün KYC approved', 10, 0, 1650033842),
(9, 'Monika Maria Wagner KYC approved', 10, 0, 1650033892),
(10, 'Marcel Milli KYC approved', 10, 0, 1650033924),
(11, 'Caglar Kir has joined the community', 27, 0, 1650052244),
(12, 'Timo Heß KYC approved', 10, 0, 1650119461),
(13, 'Ajeet Kumar has joined the community', 28, 0, 1650139889),
(14, 'Soner has joined the community', 29, 0, 1650191891),
(15, 'Umair has joined the community', 30, 0, 1650276144),
(16, 'Senad Nadarevic has joined the community', 31, 0, 1650278191),
(17, 'Ajeet Kumar KYC approved', 10, 0, 1650347412),
(18, 'Salvatore KYC approved', 10, 0, 1650347441),
(19, 'Cem Kolcu KYC approved', 10, 0, 1650347481),
(20, 'Muhammad Aslam KYC approved', 10, 0, 1650347598),
(21, 'Waldemar Bayerbach  has joined the community', 32, 0, 1650368596),
(22, 'S KAZI has joined the community', 33, 0, 1650393639),
(23, 'Waldemar Bayerbach  KYC approved', 10, 0, 1650394279),
(24, 'Almost 50% of the private sale phase - 1 supply finished. please hurry up to get 1M TSIT at $1..', 10, 0, 1650394613),
(25, 'SAMIHUDDIN KAZI KYC approved', 10, 0, 1650435736),
(26, 'Pawan varma has joined the community', 34, 0, 1650437435),
(27, 'Ufuk Samur has joined the community', 35, 0, 1650456329),
(28, 'wasim noorani has joined the community', 36, 0, 1650467976),
(29, 'Mohsin khan has joined the community', 37, 0, 1650469435),
(30, 'Huzefa Yusuf Sayed  has joined the community', 38, 0, 1650482826),
(31, 'Moinuddin Shaikh has joined the community', 39, 0, 1650501897);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `dashboard_news`
--
ALTER TABLE `dashboard_news`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `dashboard_news`
--
ALTER TABLE `dashboard_news`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=32;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
