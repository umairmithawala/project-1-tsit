-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: May 25, 2022 at 08:00 AM
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
-- Database: `tsit`
--

-- --------------------------------------------------------

--
-- Table structure for table `buy_requests`
--

CREATE TABLE `buy_requests` (
  `id` int(11) NOT NULL,
  `user_id` int(11) DEFAULT NULL,
  `tsit_coin_price` double DEFAULT NULL,
  `amount_of_tsit_purchased` double DEFAULT NULL,
  `currency` varchar(100) DEFAULT NULL,
  `amount_in_currency` double DEFAULT NULL,
  `amount_in_dollar_on_submit` double DEFAULT NULL,
  `transaction_id` varchar(100) DEFAULT NULL,
  `sending_wallet_address` varchar(100) DEFAULT NULL,
  `payment_screenshot` varchar(150) DEFAULT NULL,
  `is_tsit_transfered` int(11) DEFAULT 0,
  `transfer_timestamp` int(11) DEFAULT NULL,
  `transfer_transaction_id` varchar(100) DEFAULT NULL,
  `more_then_ten_min_mark` int(11) NOT NULL DEFAULT 0,
  `is_rejected` int(11) NOT NULL DEFAULT 0,
  `err_reason_one` varchar(100) DEFAULT NULL,
  `err_reason_two` varchar(100) DEFAULT NULL,
  `err_reason_three` varchar(100) DEFAULT NULL,
  `transaction_table_id` int(11) DEFAULT 0,
  `request_timestamp` int(11) DEFAULT NULL,
  `is_fake` int(11) NOT NULL DEFAULT 0
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `buy_requests`
--

INSERT INTO `buy_requests` (`id`, `user_id`, `tsit_coin_price`, `amount_of_tsit_purchased`, `currency`, `amount_in_currency`, `amount_in_dollar_on_submit`, `transaction_id`, `sending_wallet_address`, `payment_screenshot`, `is_tsit_transfered`, `transfer_timestamp`, `transfer_transaction_id`, `more_then_ten_min_mark`, `is_rejected`, `err_reason_one`, `err_reason_two`, `err_reason_three`, `transaction_table_id`, `request_timestamp`, `is_fake`) VALUES
(1, 1, 0.000001, 100000000, 'btc', 0, 100, '1EUsXte5nQAnMMysHFu9xbN7VPQeqmzus3', '1EUsXte5nQAnMMysHFu9xbN7VPQeqmzus3', '1buy_request_ss1649859964akc1137405296.jpeg', 0, NULL, NULL, 0, 1, 'Testing', NULL, NULL, 0, 1649859964, 0),
(2, 4, 0.000001, 100000000, 'bnb', 0.237406, 100, 'Internal transfer 103315520885', '0x0ad8a0e8d9505a616f6f44c3de3116b098417ee9', '4buy_request_ss1649860137akc232612589.jpg', 0, NULL, NULL, 0, 1, 'Duplicate Transaction Id', NULL, NULL, 0, 1649860137, 0),
(3, 1, 0.000001, 100000000, 'btc', 0, 100, '1EUsXte5nQAnMMysHFu9xbN7VPQeqmzu', 'teiafhte3k5je1ks7lsfsdfok', '1buy_request_ss1649860475akc791927488.jpeg', 0, NULL, NULL, 0, 1, 'Testing', NULL, NULL, 0, 1649860475, 0),
(4, 1, 0.000001, 100000000, 'btc', 0, 100, 'jknkjkvdghv78563564ujbk,n,n', 'ghjfjygjhkljlkk;lk78657', '1buy_request_ss1649860509akc681733078.jpeg', 0, NULL, NULL, 0, 1, 'Testing ', NULL, NULL, 0, 1649860509, 0),
(5, 1, 0.000001, 20000000000, 'btc', 0.49086982, 20000, 'fdghfhghjg75674564rghjb', 'hdhgfjhgjh4535ehgvhj', '1buy_request_ss1649861462akc1822065278.jpeg', 0, NULL, NULL, 0, 1, 'Testing', NULL, NULL, 0, 1649861462, 0),
(6, 4, 0.000001, 100000000, 'bnb', 0.240333, 100, '0xd7bebb530d70473b0d1f79144655e5e1a8d8dac5', '0x0ad8a0e8d9505a616f6f44c3de3116b098417ee9', '4buy_request_ss1649863358akc625886118.jpg', 0, NULL, NULL, 0, 1, 'Duplicate Transaction Id', NULL, NULL, 0, 1649863358, 0),
(7, 4, 0.000001, 100000000, 'bnb', 0.238407, 100, '103315520885', '0x0ad8a0e8d9505a616f6f44c3de3116b098417ee9', '4buy_request_ss1649863832akc1038422797.jpg', 1, NULL, NULL, 0, 0, NULL, NULL, NULL, 7, 1649863832, 0),
(8, 23, 0.000001, 5000, 'usdt_bep', 0.01, 0.005, '7c909cf49989856f4d1e037be4ded7fc5c122fc496ce01db4cd018622c1b75b1', 'TNuKCgYuaZah8ysxV82wcYhYoeAHta9G6k', '23buy_request_ss1649962236akc797300120.png', 0, NULL, NULL, 0, 1, 'Testing', NULL, NULL, 0, 1649962236, 0),
(9, 23, 0.000001, 555, 'usdt_bep', 0, 0.000555, '9b764caef47fd13cfaa4004602768022d0fe2e7594f8bd70715c41c88312fa54', 'TNuKCgYuaZah8ysxV82wcYhYoeAHta9G6k', '23buy_request_ss1649962316akc71875683.png', 0, NULL, NULL, 0, 1, 'Testing', NULL, NULL, 0, 1649962316, 0),
(10, 23, 0.000001, 5000000000, 'Usdt bep', 5000, 5000, '9b764caef47fd13cfaa4a04602768022d0fe2e7594f8bd70715c41c88312fa54', 'TNuKCgYuaZah8ysxV82wcYhYoeAHta9G6k', '23buy_request_ss1649966696akc1746774642.jpg', 0, NULL, NULL, 0, 1, 'Testing', NULL, NULL, 0, 1649966696, 0),
(11, 14, 0.000001, 458000000, 'Usdt', 458, 458, '103485605644', 'TP5tdCWgcE5FgBEjuZd53v9ZE5oeNw4KDc', '14buy_request_ss1650058938akc1074380046.jpeg', 1, NULL, NULL, 0, 0, NULL, NULL, NULL, 6, 1650058938, 0),
(12, 20, 0.000001, 250000000, 'Bnb', 0.602453, 250, '0x8e66cc4f6d07d119ab2c73413ceb1a52410cba3cebd1ad1b7357e801bc94ef85', '0x4117cD0363DFDeD52E8Fa2900f25BEBD661f40CE', '20buy_request_ss1650185467akc664600812.jpg', 1, NULL, NULL, 0, 0, NULL, NULL, NULL, 35, 1650185467, 0),
(13, 1, 0.000001, 124192000000, 'Btc', 3.18253338, 124192, 'manual data entry', 'manual data entry', '1buy_request_ss1650267661akc1140012401.png', 1, NULL, NULL, 0, 0, NULL, NULL, NULL, 34, 1650267661, 0),
(14, 3, 0.000001, 100000000, 'Usdt', 100, 100, 'Internal transfer 103718129422', 'TY3g5AY6ueELVkGnCRrrDJD4xfvVdW7hMi', '3buy_request_ss1650348135akc801235660.jpg', 1, NULL, NULL, 0, 0, NULL, NULL, NULL, 104, 1650348135, 0),
(15, 9, 0.000001, 100000000, 'Bnb', 0.239705, 100, '0xa770240cb68e69e1ec7511ddd9a55561534a07275b2aa43b0b3bef29b8bd4621', '0x9692f175AD044030DfD20D21eb38Bda471B96819', '9buy_request_ss1650350213akc875475792.jpg', 0, NULL, NULL, 0, 1, 'transaction details not matching. Amount of BNB must be exact as per the transaction time', NULL, NULL, 0, 1650350213, 0),
(16, 4, 0.000001, 200000000, 'Bnb', 0.475545, 200, 'Internal transfer ', '0x0ad8a0e8d9505a616f6f44c3de3116b098417ee9', '4buy_request_ss1650397613akc213950850.jpg', 1, NULL, NULL, 0, 0, NULL, NULL, NULL, 109, 1650397613, 0),
(17, 28, 0.000001, 100000000, 'Btc', 0, 100, 'fd477d9955f2b73e7c74c09fb9ff71df5c6385d6f599c5686d4a2598d3ae48f0', 'TEnjrgtGFPAFoXsMvoWB9dicgwDqoLD3GE', '28buy_request_ss1650415669akc2055655040.png', 1, NULL, NULL, 0, 0, NULL, NULL, NULL, 115, 1650415669, 0),
(18, 1, 0.000001, 200000000000, 'Usdt', 200000, 200000, '1EUsXte5nQAnMMysHFu9xbN7VPQeqmzus32sfyrt', 'teiafhte3k5je1ks7lsfsdfokdssfd33', '1buy_request_ss1650435963akc1724797231.png', 1, NULL, NULL, 0, 0, NULL, NULL, NULL, 118, 1650435963, 0),
(19, 32, 0.000001, 100000000, 'Bnb', 0.236552, 100, '0xc0d5bd214ad0e9106c87d204cd315fa49da103d30d996eae23dd1444fc774ff4', '0x6Bbb396089C31Dc6513F304973858C533dDfE6aD', '32buy_request_ss1650439307akc1992945822.jpg', 1, NULL, NULL, 0, 0, NULL, NULL, NULL, 127, 1650439307, 0),
(20, 33, 0.000001, 100000000, 'Btc', 0.00240373, 100, 'adc767c932e2cc898da7776888281bc60d80108511c44168a79a7d5caf9ed8c6', 'bc1qweqs79jfk2xe223cgar5xm4d3hr36e32ut783j', '33buy_request_ss1650463515akc1102154077.jpeg', 1, NULL, NULL, 0, 0, NULL, NULL, NULL, 132, 1650463515, 0),
(21, 28, 0.000001, 100000000, 'Usdt', 100, 100, '14204aced28c333c205e88722825ed278f0155be5be1438f82af5fd83edc48d0', 'TAjKrB8XXPPg1gBMEkT1GkrQ3nW3U1FZae', '28buy_request_ss1650598393akc1790175094.jpg', 0, NULL, NULL, 0, 1, 'Duplicate entry', NULL, NULL, 0, 1650598393, 0),
(22, 7, 0.000001, 5000000000, 'Usdt', 5000, 5000, 'c1825c9fd94e9d252b1391de6d694fd8ab45ff114f52cd625e4faa0b5c859a36', 'TP3dwfHEE8F8YRfFjY61nZM2Q8rFnio71v', '7buy_request_ss1650663449akc261768244.jpg', 1, NULL, NULL, 0, 0, NULL, NULL, NULL, 124, 1650663449, 0),
(23, 1, 0.000002, 12000000000, 'Usdt', 24000, 24000, 'asklfjaskjfkl343245kljasdklfj6sdf5sf', '1EUsXte5nQAnMMysHFu9xbN7VPQeqmzus3sf34', '1buy_request_ss1650703091akc2087878492.png', 1, NULL, NULL, 0, 0, NULL, NULL, NULL, 134, 1650703091, 0),
(24, 44, 0.000001, 10000000000, 'Usdt', 10000, 10000, 'sgksjfkls35j34kljskljfkl57lkfkslj56kl', 'wefsgs234k23jklsj34kl5klsjfkl34', '44buy_request_ss1650704431akc227780694.png', 1, NULL, NULL, 0, 0, NULL, NULL, NULL, 135, 1650704431, 0),
(25, 44, 0.000001, 125000000000, 'Usdt bep', 125000, 125000, 'sgksjfkls35j34kljskljfkl57lkfkslj56klsdfsdf454', '0xfdfjksdfsf3435fdgdft6gdfgsdfy56464sdfdf', '44buy_request_ss1650704648akc465151368.png', 1, NULL, NULL, 0, 0, NULL, NULL, NULL, 137, 1650704648, 0),
(26, 15, 0.000001, 5271000000, 'Bnb', 12.98084, 5271, '0x093f32c2563cd38a2b380c7e5da9c5060ed2445c2c6158ad9034349d239a1865', ' 0x87cbc48075d7aa1760ac71c41e8bc289b6a31f56', '', 1, NULL, NULL, 0, 0, NULL, NULL, NULL, 144, 1650720074, 0),
(27, 13, 0.000001, 5000000000, 'Usdt', 5000, 5000, '104125034697 (TxId)', 'TB2sneK2rGZXZnnXRqqx3LD1VUsyNJv3kc', '13buy_request_ss1650720152akc650713422.jpg', 1, NULL, NULL, 0, 0, NULL, NULL, NULL, 140, 1650720152, 0),
(28, 44, 0.000002, 25000000000, 'Usdt', 50000, 50000, 'Nfnsnnfjfjjfkannxjdj1274fjdjkfk', 'Fhajnfkmfnzjjfkk34nfnd', '44buy_request_ss1651047268akc1771994782.jpeg', 1, NULL, NULL, 0, 0, NULL, NULL, NULL, 439, 1651047268, 0),
(29, 4, 0.000002, 200000000, 'Bnb', 1.050337, 400, '0x98e5ed6b686bf9f901aacf24eab57b7181db19ab604c09bb1cda327993929773', '0x91CaD216859dd22edF0b4e3C68f79caFF7ab9621', '4buy_request_ss1651768178akc893548401.jpg', 1, NULL, NULL, 0, 0, NULL, NULL, NULL, 742, 1651768178, 0),
(30, 47, 0.000002, 1500000000, 'Btc', 0.08086907, 3000, 'Internal transfer 105237552087', '1GsWzzde4ZwfkerPTC4aJsDRAbg3XzLAb6', '47buy_request_ss1651772039akc997143022.jpeg', 1, NULL, NULL, 0, 0, NULL, NULL, NULL, 738, 1651772039, 0),
(31, 4, 0.000002, 140000000, 'Bnb', 0.741997, 280, '0x8a700f723d2c9c39429a008a2c8053b2b9b4bcc6e09bc7990bfeb09e9cd3c583', '0x91CaD216859dd22edF0b4e3C68f79caFF7ab9621', '4buy_request_ss1651785066akc909062391.jpg', 1, NULL, NULL, 0, 0, NULL, NULL, NULL, 749, 1651785066, 0),
(32, 4, 0.000002, 160000000, 'Bnb', 0.841552, 320, '0xedcec5b69268ae860fd9f8ed241a6e681673b0bbe400dba1e03010250fc290e4', '0x91CaD216859dd22edF0b4e3C68f79caFF7ab9621', '4buy_request_ss1651854602akc1068393958.jpg', 1, NULL, NULL, 0, 0, NULL, NULL, NULL, 809, 1651854602, 0),
(33, 12, 0.000002, 100000000, 'Bnb', 0.606244, 200, '0x8f9eb8d1e29be37b84395912b9bdd7ba9ba0d0f4354eb28daa32fd6cb261d1c6', '0xfE26DBa64d799fA6B02a70636e5506475312D48b', '12buy_request_ss1652095941akc175745331.jpeg', 1, NULL, NULL, 0, 0, NULL, NULL, NULL, 1209, 1652095941, 0),
(34, 1, 0.000003, 234000000000, 'Usdt bep', 702000, 702000, '0xajfsdkgtsklgst65443fslgdkjsd56lfdg', 'asdf10sdfsadf445fsgfsyee6v', '', 1, NULL, NULL, 0, 0, NULL, NULL, NULL, 1212, 1652694833, 0),
(35, 52, 0.000003, 345000000000, 'Usdt', 1035000, 1035000, 'sadfnklsj454363lksjdfkljkl654wfc', 'dsjfkldsjfklsj43kj5kljklsdjakl54awklkflsdfmlk', '', 1, NULL, NULL, 0, 0, NULL, NULL, NULL, 1227, 1652695234, 0),
(36, 53, 0.000003, 34000000000, 'Usdt', 102000, 102000, 'hjghjgjkh876786kjjmnvgds435yrlijlkdsfgs', 'fgsgdg24545ehgvmbhm897tjmgjmv', '', 1, NULL, NULL, 0, 0, NULL, NULL, NULL, 1244, 1652701587, 0);

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
(31, 'Moinuddin Shaikh has joined the community', 39, 0, 1650501897),
(32, 'Alexander Adolf  has joined the community', 40, 0, 1650523008),
(33, 'Raj bahadur has joined the community', 41, 0, 1650540872),
(34, 'Mohsin Wajihuddin Kazi has joined the community', 42, 0, 1650576710),
(35, 'Niklas has joined the community', 43, 0, 1650643551),
(36, 'Pawan varma KYC approved', 10, 0, 1650692387),
(37, 'Ufuk Samur KYC approved', 10, 0, 1650692407),
(38, 'Mohsin khan KYC approved', 10, 0, 1650692458),
(39, 'Moinuddin Shaikh KYC approved', 10, 0, 1650692479),
(40, 'Mohsin Kazi KYC approved', 10, 0, 1650692515),
(41, 'Niklas KYC approved', 10, 0, 1650692535),
(42, 'TSIT buy request approved of Claudio Manuel', 7, 0, 1650692652),
(43, 'TSIT buy request approved of Waldemar Bayerbach ', 32, 0, 1650692734),
(44, 'TSIT buy request approved of S KAZI', 33, 0, 1650692774),
(45, 'TSIT buy request approved of S KAZI', 33, 0, 1650703110),
(46, 'TSIT buy request approved of Imran Khan', 1, 0, 1650703250),
(47, 'Max Lee has joined the community', 44, 0, 1650703407),
(48, 'Max Lee KYC approved', 10, 0, 1650704424),
(49, 'TSIT buy request approved of Max Lee', 44, 0, 1650704746),
(50, 'TSIT buy request approved of Max Lee', 44, 0, 1650704753),
(51, 'Hi Community! Thanks for your kind support for this big vision of Tesla Inu. We want to inform you that today is the last day of Private Sale Phase -1, Price of Tesla Inu Token will be increased to $2 from mid night today after 12:00 am. Hurry up..', 10, 0, 1650704883),
(52, 'TSIT buy request approved of Carmen Sandra Meyer', 13, 0, 1650724341),
(53, 'TSIT buy request approved of Reto Stauffacher', 15, 0, 1650724381),
(54, 'Hi Community! Thanks for your kind support for this big vision of Tesla Inu. We want to inform you that today is the last day of Private Sale Phase -1, Price of Tesla Inu Token will be increased to $2 from mid night today after 12:00 am. Hurry up..', 0, 0, 1650789996),
(55, 'Daniel Dischinger  has joined the community', 45, 0, 1650868062),
(56, 'Bennur YARDIMCI  has joined the community', 46, 0, 1650913140),
(57, 'Bennur YARDIMCI  KYC approved', 10, 0, 1650961372),
(58, 'TSIT buy request approved of Max Lee', 44, 0, 1651047285),
(59, 'Vanessa Buschauer has joined the community', 47, 0, 1651570078),
(60, 'Anton Djordjevic  has joined the community', 48, 0, 1651677357),
(61, 'Huzefa Yusuf Sayed  KYC approved', 10, 0, 1651725812),
(62, 'Vanessa Buschauer KYC approved', 10, 0, 1651725862),
(63, 'Agrie Ahmad has joined the community', 49, 0, 1651743056),
(64, 'Thomas has joined the community', 50, 0, 1651767084),
(65, 'TSIT buy request approved of Vanessa Buschauer', 47, 0, 1651776734),
(66, 'TSIT buy request approved of Kay Buschmann', 4, 0, 1651776749),
(67, 'TSIT buy request approved of Kay Buschmann', 4, 0, 1651796887),
(68, 'TSIT buy request approved of Kay Buschmann', 4, 0, 1651861419),
(69, 'Thomas KYC approved', 10, 0, 1651884938),
(70, 'TSIT buy request approved of Kay Buschmann', 4, 0, 1651884994),
(71, 'TSIT buy request approved of Kay Buschmann', 4, 0, 1652066570),
(72, 'Robin Plisch has joined the community', 51, 0, 1652365440),
(73, 'TSIT buy request approved of Timo Heß', 12, 0, 1652694713),
(74, 'TSIT buy request approved of Imran Khan', 1, 0, 1652694846),
(75, 'Roger Holdign has joined the community', 52, 0, 1652694944),
(76, 'Roger Holdign KYC approved', 10, 0, 1652695155),
(77, 'TSIT buy request approved of Roger Holdign', 52, 0, 1652695304),
(78, 'Fredrick Patro has joined the community', 53, 0, 1652695728),
(79, 'Fredrick Patro KYC approved', 10, 0, 1652701535),
(80, 'TSIT buy request approved of Fredrick Patro', 53, 0, 1652701603),
(81, 'Manu has joined the community', 54, 0, 1652701961),
(82, 'Manu KYC approved', 10, 0, 1652710331),
(83, 'Senad Nadarevic KYC approved', 10, 0, 1652785984);

-- --------------------------------------------------------

--
-- Table structure for table `forgot_password_otp`
--

CREATE TABLE `forgot_password_otp` (
  `id` int(11) NOT NULL,
  `email` varchar(80) DEFAULT NULL,
  `otp` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `forgot_password_otp`
--

INSERT INTO `forgot_password_otp` (`id`, `email`, `otp`) VALUES
(7, 'N21fyFCCddE@asdf.fgd', 876588);

-- --------------------------------------------------------

--
-- Table structure for table `mining_reward`
--

CREATE TABLE `mining_reward` (
  `id` int(56) NOT NULL,
  `voter_id` int(56) DEFAULT NULL,
  `votes_count` int(56) DEFAULT NULL,
  `corrnect_votes_count` int(56) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `pos`
--

CREATE TABLE `pos` (
  `id` int(50) NOT NULL,
  `user_id` int(50) DEFAULT NULL,
  `scam_id` int(50) DEFAULT NULL,
  `proof_of` varchar(1000) DEFAULT NULL,
  `file_name` varchar(1000) DEFAULT NULL,
  `timestamp` int(50) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `reports`
--

CREATE TABLE `reports` (
  `id` int(11) NOT NULL,
  `reporter_id` int(11) DEFAULT NULL,
  `image` varchar(250) DEFAULT NULL,
  `title` varchar(250) DEFAULT NULL,
  `description` varchar(250) DEFAULT NULL,
  `document` varchar(250) DEFAULT NULL,
  `scammer_detail` varchar(500) DEFAULT NULL,
  `scammer_img` varchar(150) DEFAULT NULL,
  `wallet_address` varchar(100) DEFAULT NULL,
  `scammer_website` varchar(150) DEFAULT NULL,
  `other_detail` varchar(250) DEFAULT NULL,
  `status` int(11) DEFAULT NULL COMMENT 'is_active',
  `is_approve` int(11) DEFAULT NULL,
  `timestamp` int(11) DEFAULT NULL,
  `approved_timestamp` int(100) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `report_tokens`
--

CREATE TABLE `report_tokens` (
  `id` int(11) NOT NULL,
  `report_id` int(11) DEFAULT NULL,
  `token` varchar(250) DEFAULT NULL,
  `timestamp` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `scams`
--

CREATE TABLE `scams` (
  `id` int(56) NOT NULL,
  `reported_by` int(56) DEFAULT NULL,
  `name` varchar(500) DEFAULT NULL,
  `email` varchar(500) DEFAULT NULL,
  `phone` varchar(500) DEFAULT NULL,
  `telegram_id` varchar(500) DEFAULT NULL,
  `telegram_bio` varchar(5000) DEFAULT NULL,
  `crypto_currency_demanded` varchar(500) DEFAULT NULL,
  `wallet_address` varchar(500) DEFAULT NULL,
  `website` varchar(500) DEFAULT NULL,
  `other_information` varchar(5000) DEFAULT NULL,
  `profile_image` varchar(1000) DEFAULT NULL,
  `screenshot_of_chat` varchar(1000) DEFAULT NULL,
  `mining_result` int(56) DEFAULT 0,
  `is_active` int(56) DEFAULT 0,
  `superadmin_approval` int(56) DEFAULT 0,
  `superadmin_approval_timestamp` int(56) DEFAULT 0,
  `superadmin_rejected` int(50) NOT NULL DEFAULT 0,
  `votes_count` int(50) NOT NULL DEFAULT 0,
  `timestamp` int(56) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `top_miner`
--

CREATE TABLE `top_miner` (
  `id` int(56) NOT NULL,
  `miner_id` int(56) DEFAULT NULL,
  `scam_count` int(56) DEFAULT NULL,
  `winning_scam_count` int(56) DEFAULT NULL,
  `mine_scam_list` varchar(2000) DEFAULT NULL,
  `winning_scam_list` varchar(2000) DEFAULT NULL,
  `timestamp` int(56) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `transactions`
--

CREATE TABLE `transactions` (
  `id` int(50) NOT NULL,
  `user_id` int(50) DEFAULT NULL,
  `transaction_type` int(50) DEFAULT NULL,
  `hash` varchar(1000) DEFAULT NULL,
  `note` varchar(3000) DEFAULT NULL,
  `to_address` varchar(1000) DEFAULT NULL,
  `from_address` varchar(500) DEFAULT NULL,
  `is_addition` int(50) DEFAULT NULL,
  `transaction_status` int(50) DEFAULT NULL,
  `amount` double DEFAULT NULL,
  `timestamp` int(50) DEFAULT NULL,
  `is_fake` int(11) NOT NULL DEFAULT 0
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `transactions`
--

INSERT INTO `transactions` (`id`, `user_id`, `transaction_type`, `hash`, `note`, `to_address`, `from_address`, `is_addition`, `transaction_status`, `amount`, `timestamp`, `is_fake`) VALUES
(1, 0, 5, 'Not Applied', 'Reward for reporting scam', 'Not Applied', 'Not Applied', 1, 1, 2500, 1649741402, 0),
(2, 0, 5, 'Not Applied', 'Reward for reporting scam', 'Not Applied', 'Not Applied', 1, 1, 2500, 1649829602, 0),
(3, 0, 5, 'Not Applied', 'Reward for reporting scam', 'Not Applied', 'Not Applied', 1, 1, 2500, 1649917802, 0),
(4, 0, 5, 'Not Applied', 'Reward for reporting scam', 'Not Applied', 'Not Applied', 1, 1, 2500, 1650006001, 0),
(5, 0, 5, 'Not Applied', 'Reward for reporting scam', 'Not Applied', 'Not Applied', 1, 1, 2500, 1650092402, 0),
(6, 14, 6, '', '', '', '', 1, 1, 458000000, 1650119723, 0),
(7, 4, 6, '', '', '', '', 1, 1, 100000000, 1650119866, 0),
(8, 0, 5, 'Not Applied', 'Reward for reporting scam', 'Not Applied', 'Not Applied', 1, 1, 2500, 1650180602, 0),
(9, 20, 6, '', '', '', '', 1, 1, 250000000, 1650188551, 0),
(10, 4, 8, '', 'Interest', '', '', 1, 1, 4000000, 1650240001, 0),
(11, 14, 8, '', 'Interest', '', '', 1, 1, 18320000, 1650240001, 0),
(12, 20, 8, '', 'Interest', '', '', 1, 1, 10000000, 1650240001, 0),
(13, 4, 8, '', 'Interest', '', '', 1, 1, 4000000, 1650243602, 0),
(14, 14, 8, '', 'Interest', '', '', 1, 1, 18320000, 1650243602, 0),
(15, 20, 8, '', 'Interest', '', '', 1, 1, 10000000, 1650243602, 0),
(16, 4, 8, '', 'Interest', '', '', 1, 1, 4000000, 1650247201, 0),
(17, 14, 8, '', 'Interest', '', '', 1, 1, 18320000, 1650247201, 0),
(18, 20, 8, '', 'Interest', '', '', 1, 1, 10000000, 1650247201, 0),
(19, 4, 8, '', 'Interest', '', '', 1, 1, 4000000, 1650250802, 0),
(20, 14, 8, '', 'Interest', '', '', 1, 1, 18320000, 1650250802, 0),
(21, 20, 8, '', 'Interest', '', '', 1, 1, 10000000, 1650250802, 0),
(22, 4, 8, '', 'Interest', '', '', 1, 1, 4000000, 1650254401, 0),
(23, 14, 8, '', 'Interest', '', '', 1, 1, 18320000, 1650254401, 0),
(24, 20, 8, '', 'Interest', '', '', 1, 1, 10000000, 1650254401, 0),
(25, 4, 8, '', 'Interest', '', '', 1, 1, 4000000, 1650258002, 0),
(26, 14, 8, '', 'Interest', '', '', 1, 1, 18320000, 1650258002, 0),
(27, 20, 8, '', 'Interest', '', '', 1, 1, 10000000, 1650258002, 0),
(28, 4, 8, '', 'Interest', '', '', 1, 1, 4000000, 1650261601, 0),
(29, 14, 8, '', 'Interest', '', '', 1, 1, 18320000, 1650261601, 0),
(30, 20, 8, '', 'Interest', '', '', 1, 1, 10000000, 1650261601, 0),
(31, 4, 8, '', 'Interest', '', '', 1, 1, 4000000, 1650265203, 0),
(32, 14, 8, '', 'Interest', '', '', 1, 1, 18320000, 1650265203, 0),
(33, 20, 8, '', 'Interest', '', '', 1, 1, 10000000, 1650265203, 0),
(34, 1, 6, '', '', '', '', 1, 1, 124192000000, 1650267851, 0),
(35, 20, 6, '', '', '', '', 1, 1, 250000000, 1650267969, 0),
(36, 1, 8, '', 'Interest', '', '', 1, 1, 4967680000, 1650268802, 0),
(37, 4, 8, '', 'Interest', '', '', 1, 1, 4000000, 1650268802, 0),
(38, 14, 8, '', 'Interest', '', '', 1, 1, 18320000, 1650268802, 0),
(39, 20, 8, '', 'Interest', '', '', 1, 1, 20000000, 1650268802, 0),
(40, 0, 5, 'Not Applied', 'Reward for reporting scam', 'Not Applied', 'Not Applied', 1, 1, 2500, 1650268802, 0),
(41, 1, 8, '', 'Interest', '', '', 1, 1, 4967680000, 1650272402, 0),
(42, 4, 8, '', 'Interest', '', '', 1, 1, 4000000, 1650272402, 0),
(43, 14, 8, '', 'Interest', '', '', 1, 1, 18320000, 1650272402, 0),
(44, 20, 8, '', 'Interest', '', '', 1, 1, 20000000, 1650272402, 0),
(45, 1, 8, '', 'Interest', '', '', 1, 1, 4967680000, 1650276002, 0),
(46, 4, 8, '', 'Interest', '', '', 1, 1, 4000000, 1650276002, 0),
(47, 14, 8, '', 'Interest', '', '', 1, 1, 18320000, 1650276002, 0),
(48, 20, 8, '', 'Interest', '', '', 1, 1, 20000000, 1650276002, 0),
(49, 1, 8, '', 'Interest', '', '', 1, 1, 4967680000, 1650279602, 0),
(50, 4, 8, '', 'Interest', '', '', 1, 1, 4000000, 1650279602, 0),
(51, 14, 8, '', 'Interest', '', '', 1, 1, 18320000, 1650279602, 0),
(52, 20, 8, '', 'Interest', '', '', 1, 1, 20000000, 1650279602, 0),
(53, 1, 8, '', 'Interest', '', '', 1, 1, 4967680000, 1650283202, 0),
(54, 4, 8, '', 'Interest', '', '', 1, 1, 4000000, 1650283202, 0),
(55, 14, 8, '', 'Interest', '', '', 1, 1, 18320000, 1650283202, 0),
(56, 20, 8, '', 'Interest', '', '', 1, 1, 20000000, 1650283202, 0),
(57, 1, 8, '', 'Interest', '', '', 1, 1, 4967680000, 1650286802, 0),
(58, 4, 8, '', 'Interest', '', '', 1, 1, 4000000, 1650286802, 0),
(59, 14, 8, '', 'Interest', '', '', 1, 1, 18320000, 1650286802, 0),
(60, 20, 8, '', 'Interest', '', '', 1, 1, 20000000, 1650286802, 0),
(61, 1, 8, '', 'Interest', '', '', 1, 1, 4967680000, 1650290402, 0),
(62, 4, 8, '', 'Interest', '', '', 1, 1, 4000000, 1650290402, 0),
(63, 14, 8, '', 'Interest', '', '', 1, 1, 18320000, 1650290402, 0),
(64, 20, 8, '', 'Interest', '', '', 1, 1, 20000000, 1650290402, 0),
(65, 1, 8, '', 'Interest', '', '', 1, 1, 4967680000, 1650294002, 0),
(66, 4, 8, '', 'Interest', '', '', 1, 1, 4000000, 1650294002, 0),
(67, 14, 8, '', 'Interest', '', '', 1, 1, 18320000, 1650294002, 0),
(68, 20, 8, '', 'Interest', '', '', 1, 1, 20000000, 1650294002, 0),
(69, 1, 8, '', 'Interest', '', '', 1, 1, 4967680000, 1650297602, 0),
(70, 4, 8, '', 'Interest', '', '', 1, 1, 4000000, 1650297602, 0),
(71, 14, 8, '', 'Interest', '', '', 1, 1, 18320000, 1650297602, 0),
(72, 20, 8, '', 'Interest', '', '', 1, 1, 20000000, 1650297602, 0),
(73, 1, 8, '', 'Interest', '', '', 1, 1, 4967680000, 1650301202, 0),
(74, 4, 8, '', 'Interest', '', '', 1, 1, 4000000, 1650301202, 0),
(75, 14, 8, '', 'Interest', '', '', 1, 1, 18320000, 1650301202, 0),
(76, 20, 8, '', 'Interest', '', '', 1, 1, 20000000, 1650301202, 0),
(77, 1, 8, '', 'Interest', '', '', 1, 1, 4967680000, 1650304802, 0),
(78, 4, 8, '', 'Interest', '', '', 1, 1, 4000000, 1650304802, 0),
(79, 14, 8, '', 'Interest', '', '', 1, 1, 18320000, 1650304802, 0),
(80, 20, 8, '', 'Interest', '', '', 1, 1, 20000000, 1650304802, 0),
(81, 1, 8, '', 'Interest', '', '', 1, 1, 4967680000, 1650308402, 0),
(82, 4, 8, '', 'Interest', '', '', 1, 1, 4000000, 1650308402, 0),
(83, 14, 8, '', 'Interest', '', '', 1, 1, 18320000, 1650308402, 0),
(84, 20, 8, '', 'Interest', '', '', 1, 1, 20000000, 1650308402, 0),
(85, 1, 8, '', 'Interest', '', '', 1, 1, 4967680000, 1650312002, 0),
(86, 4, 8, '', 'Interest', '', '', 1, 1, 4000000, 1650312002, 0),
(87, 14, 8, '', 'Interest', '', '', 1, 1, 18320000, 1650312002, 0),
(88, 20, 8, '', 'Interest', '', '', 1, 1, 20000000, 1650312002, 0),
(89, 1, 8, '', 'Interest', '', '', 1, 1, 4967680000, 1650315602, 0),
(90, 4, 8, '', 'Interest', '', '', 1, 1, 4000000, 1650315602, 0),
(91, 14, 8, '', 'Interest', '', '', 1, 1, 18320000, 1650315602, 0),
(92, 20, 8, '', 'Interest', '', '', 1, 1, 20000000, 1650315602, 0),
(93, 1, 8, '', 'Interest', '', '', 1, 1, 4967680000, 1650319202, 0),
(94, 4, 8, '', 'Interest', '', '', 1, 1, 4000000, 1650319202, 0),
(95, 14, 8, '', 'Interest', '', '', 1, 1, 18320000, 1650319202, 0),
(96, 20, 8, '', 'Interest', '', '', 1, 1, 20000000, 1650319202, 0),
(97, 1, 8, '', 'Interest', '', '', 1, 1, 4967680000, 1650322802, 0),
(98, 4, 8, '', 'Interest', '', '', 1, 1, 4000000, 1650322802, 0),
(99, 14, 8, '', 'Interest', '', '', 1, 1, 18320000, 1650322802, 0),
(100, 20, 8, '', 'Interest', '', '', 1, 1, 20000000, 1650322802, 0),
(101, 3, 6, '', '', '', '', 1, 1, 100000000, 1650348441, 0),
(102, 1, 7, '', '', '', '', 1, 1, 10000000, 1650348441, 0),
(103, 0, 5, 'Not Applied', 'Reward for reporting scam', 'Not Applied', 'Not Applied', 1, 1, 2500, 1650355203, 0),
(104, 3, 6, '', '', '', '', 1, 1, 100000000, 1650394167, 0),
(105, 1, 7, '', '', '', '', 1, 1, 10000000, 1650394167, 0),
(106, 4, 6, '', '', '', '', 1, 1, 200000000, 1650397926, 0),
(107, 3, 7, '', '', '', '', 1, 1, 20000000, 1650397926, 0),
(108, 1, 7, '', '', '', '', 1, 1, 10000000, 1650397926, 0),
(109, 4, 6, '', '', '', '', 1, 1, 200000000, 1650433509, 0),
(110, 3, 7, '', '', '', '', 1, 1, 20000000, 1650433509, 0),
(111, 1, 7, '', '', '', '', 1, 1, 10000000, 1650433509, 0),
(112, 28, 6, '', '', '', '', 1, 1, 100000000, 1650435806, 0),
(113, 3, 7, '', '', '', '', 1, 1, 10000000, 1650435806, 0),
(114, 1, 7, '', '', '', '', 1, 1, 5000000, 1650435806, 0),
(115, 28, 6, '', '', '', '', 1, 1, 100000000, 1650435988, 0),
(116, 3, 7, '', '', '', '', 1, 1, 10000000, 1650435988, 0),
(117, 1, 7, '', '', '', '', 1, 1, 5000000, 1650435988, 0),
(118, 1, 6, '', '', '', '', 1, 1, 200000000000, 1650435995, 0),
(119, 0, 5, 'Not Applied', 'Reward for reporting scam', 'Not Applied', 'Not Applied', 1, 1, 2500, 1650443402, 0),
(120, 0, 5, 'Not Applied', 'Reward for reporting scam', 'Not Applied', 'Not Applied', 1, 1, 2500, 1650531602, 0),
(121, 28, 9, 'Not Applied', 'Internal Transfer', 'Not Applied', 'Not Applied', 0, 3, 10100000, 1650604933, 0),
(122, 41, 10, 'Not Applied', 'Internal Transfer', 'Not Applied', 'Not Applied', 1, 3, 10000000, 1650604933, 0),
(123, 0, 5, 'Not Applied', 'Reward for reporting scam', 'Not Applied', 'Not Applied', 1, 1, 2500, 1650619801, 0),
(124, 7, 6, '', '', '', '', 1, 1, 5000000000, 1650692652, 0),
(125, 3, 7, '', '', '', '', 1, 1, 500000000, 1650692652, 0),
(126, 1, 7, '', '', '', '', 1, 1, 250000000, 1650692652, 0),
(127, 32, 6, '', '', '', '', 1, 1, 100000000, 1650692734, 0),
(128, 3, 7, '', '', '', '', 1, 1, 10000000, 1650692734, 0),
(129, 1, 7, '', '', '', '', 1, 1, 5000000, 1650692734, 0),
(130, 33, 6, '', '', '', '', 1, 1, 100000000, 1650692774, 0),
(131, 1, 7, '', '', '', '', 1, 1, 10000000, 1650692774, 0),
(132, 33, 6, '', '', '', '', 1, 1, 100000000, 1650703110, 0),
(133, 1, 7, '', '', '', '', 1, 1, 10000000, 1650703110, 0),
(134, 1, 6, '', '', '', '', 1, 1, 12000000000, 1650703250, 0),
(135, 44, 6, '', '', '', '', 1, 1, 10000000000, 1650704746, 0),
(136, 1, 7, '', '', '', '', 1, 1, 1000000000, 1650704746, 0),
(137, 44, 6, '', '', '', '', 1, 1, 125000000000, 1650704753, 0),
(138, 1, 7, '', '', '', '', 1, 1, 12500000000, 1650704753, 0),
(139, 0, 5, 'Not Applied', 'Reward for reporting scam', 'Not Applied', 'Not Applied', 1, 1, 2500, 1650706202, 0),
(140, 13, 6, '', '', '', '', 1, 1, 5000000000, 1650724341, 0),
(141, 7, 7, '', '', '', '', 1, 1, 500000000, 1650724341, 0),
(142, 3, 7, '', '', '', '', 1, 1, 250000000, 1650724341, 0),
(143, 1, 7, '', '', '', '', 1, 1, 150000000, 1650724341, 0),
(144, 15, 6, '', '', '', '', 1, 1, 5271000000, 1650724381, 0),
(145, 7, 7, '', '', '', '', 1, 1, 527100000, 1650724381, 0),
(146, 3, 7, '', '', '', '', 1, 1, 263550000, 1650724381, 0),
(147, 1, 7, '', '', '', '', 1, 1, 158130000, 1650724381, 0),
(148, 0, 5, 'Not Applied', 'Reward for reporting scam', 'Not Applied', 'Not Applied', 1, 1, 2500, 1650794402, 0),
(149, 1, 8, '', 'Interest', '', '', 1, 1, 13447680000, 1650844802, 0),
(150, 3, 8, '', 'Interest', '', '', 1, 1, 8000000, 1650844802, 0),
(151, 4, 8, '', 'Interest', '', '', 1, 1, 20000000, 1650844802, 0),
(152, 7, 8, '', 'Interest', '', '', 1, 1, 200000000, 1650844802, 0),
(153, 13, 8, '', 'Interest', '', '', 1, 1, 200000000, 1650844802, 0),
(154, 14, 8, '', 'Interest', '', '', 1, 1, 18320000, 1650844802, 0),
(155, 15, 8, '', 'Interest', '', '', 1, 1, 210840000, 1650844802, 0),
(156, 20, 8, '', 'Interest', '', '', 1, 1, 20000000, 1650844802, 0),
(157, 28, 8, '', 'Interest', '', '', 1, 1, 8000000, 1650844802, 0),
(158, 32, 8, '', 'Interest', '', '', 1, 1, 4000000, 1650844802, 0),
(159, 33, 8, '', 'Interest', '', '', 1, 1, 8000000, 1650844802, 0),
(160, 44, 8, '', 'Interest', '', '', 1, 1, 5400000000, 1650844802, 0),
(161, 1, 8, '', 'Interest', '', '', 1, 1, 13447680000, 1650848402, 0),
(162, 3, 8, '', 'Interest', '', '', 1, 1, 8000000, 1650848402, 0),
(163, 4, 8, '', 'Interest', '', '', 1, 1, 20000000, 1650848402, 0),
(164, 7, 8, '', 'Interest', '', '', 1, 1, 200000000, 1650848402, 0),
(165, 13, 8, '', 'Interest', '', '', 1, 1, 200000000, 1650848402, 0),
(166, 14, 8, '', 'Interest', '', '', 1, 1, 18320000, 1650848402, 0),
(167, 15, 8, '', 'Interest', '', '', 1, 1, 210840000, 1650848402, 0),
(168, 20, 8, '', 'Interest', '', '', 1, 1, 20000000, 1650848402, 0),
(169, 28, 8, '', 'Interest', '', '', 1, 1, 8000000, 1650848402, 0),
(170, 32, 8, '', 'Interest', '', '', 1, 1, 4000000, 1650848402, 0),
(171, 33, 8, '', 'Interest', '', '', 1, 1, 8000000, 1650848402, 0),
(172, 44, 8, '', 'Interest', '', '', 1, 1, 5400000000, 1650848402, 0),
(173, 1, 8, '', 'Interest', '', '', 1, 1, 13447680000, 1650852002, 0),
(174, 3, 8, '', 'Interest', '', '', 1, 1, 8000000, 1650852002, 0),
(175, 4, 8, '', 'Interest', '', '', 1, 1, 20000000, 1650852002, 0),
(176, 7, 8, '', 'Interest', '', '', 1, 1, 200000000, 1650852002, 0),
(177, 13, 8, '', 'Interest', '', '', 1, 1, 200000000, 1650852002, 0),
(178, 14, 8, '', 'Interest', '', '', 1, 1, 18320000, 1650852002, 0),
(179, 15, 8, '', 'Interest', '', '', 1, 1, 210840000, 1650852002, 0),
(180, 20, 8, '', 'Interest', '', '', 1, 1, 20000000, 1650852002, 0),
(181, 28, 8, '', 'Interest', '', '', 1, 1, 8000000, 1650852002, 0),
(182, 32, 8, '', 'Interest', '', '', 1, 1, 4000000, 1650852002, 0),
(183, 33, 8, '', 'Interest', '', '', 1, 1, 8000000, 1650852002, 0),
(184, 44, 8, '', 'Interest', '', '', 1, 1, 5400000000, 1650852002, 0),
(185, 1, 8, '', 'Interest', '', '', 1, 1, 13447680000, 1650855602, 0),
(186, 3, 8, '', 'Interest', '', '', 1, 1, 8000000, 1650855602, 0),
(187, 4, 8, '', 'Interest', '', '', 1, 1, 20000000, 1650855602, 0),
(188, 7, 8, '', 'Interest', '', '', 1, 1, 200000000, 1650855602, 0),
(189, 13, 8, '', 'Interest', '', '', 1, 1, 200000000, 1650855602, 0),
(190, 14, 8, '', 'Interest', '', '', 1, 1, 18320000, 1650855602, 0),
(191, 15, 8, '', 'Interest', '', '', 1, 1, 210840000, 1650855602, 0),
(192, 20, 8, '', 'Interest', '', '', 1, 1, 20000000, 1650855602, 0),
(193, 28, 8, '', 'Interest', '', '', 1, 1, 8000000, 1650855602, 0),
(194, 32, 8, '', 'Interest', '', '', 1, 1, 4000000, 1650855602, 0),
(195, 33, 8, '', 'Interest', '', '', 1, 1, 8000000, 1650855602, 0),
(196, 44, 8, '', 'Interest', '', '', 1, 1, 5400000000, 1650855602, 0),
(197, 1, 8, '', 'Interest', '', '', 1, 1, 13447680000, 1650859202, 0),
(198, 3, 8, '', 'Interest', '', '', 1, 1, 8000000, 1650859202, 0),
(199, 4, 8, '', 'Interest', '', '', 1, 1, 20000000, 1650859202, 0),
(200, 7, 8, '', 'Interest', '', '', 1, 1, 200000000, 1650859202, 0),
(201, 13, 8, '', 'Interest', '', '', 1, 1, 200000000, 1650859202, 0),
(202, 14, 8, '', 'Interest', '', '', 1, 1, 18320000, 1650859202, 0),
(203, 15, 8, '', 'Interest', '', '', 1, 1, 210840000, 1650859202, 0),
(204, 20, 8, '', 'Interest', '', '', 1, 1, 20000000, 1650859202, 0),
(205, 28, 8, '', 'Interest', '', '', 1, 1, 8000000, 1650859202, 0),
(206, 32, 8, '', 'Interest', '', '', 1, 1, 4000000, 1650859202, 0),
(207, 33, 8, '', 'Interest', '', '', 1, 1, 8000000, 1650859202, 0),
(208, 44, 8, '', 'Interest', '', '', 1, 1, 5400000000, 1650859202, 0),
(209, 1, 8, '', 'Interest', '', '', 1, 1, 13447680000, 1650862802, 0),
(210, 3, 8, '', 'Interest', '', '', 1, 1, 8000000, 1650862802, 0),
(211, 4, 8, '', 'Interest', '', '', 1, 1, 20000000, 1650862802, 0),
(212, 7, 8, '', 'Interest', '', '', 1, 1, 200000000, 1650862802, 0),
(213, 13, 8, '', 'Interest', '', '', 1, 1, 200000000, 1650862802, 0),
(214, 14, 8, '', 'Interest', '', '', 1, 1, 18320000, 1650862802, 0),
(215, 15, 8, '', 'Interest', '', '', 1, 1, 210840000, 1650862802, 0),
(216, 20, 8, '', 'Interest', '', '', 1, 1, 20000000, 1650862802, 0),
(217, 28, 8, '', 'Interest', '', '', 1, 1, 8000000, 1650862802, 0),
(218, 32, 8, '', 'Interest', '', '', 1, 1, 4000000, 1650862802, 0),
(219, 33, 8, '', 'Interest', '', '', 1, 1, 8000000, 1650862802, 0),
(220, 44, 8, '', 'Interest', '', '', 1, 1, 5400000000, 1650862802, 0),
(221, 1, 8, '', 'Interest', '', '', 1, 1, 13447680000, 1650866402, 0),
(222, 3, 8, '', 'Interest', '', '', 1, 1, 8000000, 1650866402, 0),
(223, 4, 8, '', 'Interest', '', '', 1, 1, 20000000, 1650866402, 0),
(224, 7, 8, '', 'Interest', '', '', 1, 1, 200000000, 1650866402, 0),
(225, 13, 8, '', 'Interest', '', '', 1, 1, 200000000, 1650866402, 0),
(226, 14, 8, '', 'Interest', '', '', 1, 1, 18320000, 1650866402, 0),
(227, 15, 8, '', 'Interest', '', '', 1, 1, 210840000, 1650866402, 0),
(228, 20, 8, '', 'Interest', '', '', 1, 1, 20000000, 1650866402, 0),
(229, 28, 8, '', 'Interest', '', '', 1, 1, 8000000, 1650866402, 0),
(230, 32, 8, '', 'Interest', '', '', 1, 1, 4000000, 1650866402, 0),
(231, 33, 8, '', 'Interest', '', '', 1, 1, 8000000, 1650866402, 0),
(232, 44, 8, '', 'Interest', '', '', 1, 1, 5400000000, 1650866402, 0),
(233, 1, 8, '', 'Interest', '', '', 1, 1, 13447680000, 1650870003, 0),
(234, 3, 8, '', 'Interest', '', '', 1, 1, 8000000, 1650870003, 0),
(235, 4, 8, '', 'Interest', '', '', 1, 1, 20000000, 1650870003, 0),
(236, 7, 8, '', 'Interest', '', '', 1, 1, 200000000, 1650870003, 0),
(237, 13, 8, '', 'Interest', '', '', 1, 1, 200000000, 1650870003, 0),
(238, 14, 8, '', 'Interest', '', '', 1, 1, 18320000, 1650870003, 0),
(239, 15, 8, '', 'Interest', '', '', 1, 1, 210840000, 1650870003, 0),
(240, 20, 8, '', 'Interest', '', '', 1, 1, 20000000, 1650870003, 0),
(241, 28, 8, '', 'Interest', '', '', 1, 1, 8000000, 1650870003, 0),
(242, 32, 8, '', 'Interest', '', '', 1, 1, 4000000, 1650870003, 0),
(243, 33, 8, '', 'Interest', '', '', 1, 1, 8000000, 1650870003, 0),
(244, 44, 8, '', 'Interest', '', '', 1, 1, 5400000000, 1650870003, 0),
(245, 1, 8, '', 'Interest', '', '', 1, 1, 13447680000, 1650873603, 0),
(246, 3, 8, '', 'Interest', '', '', 1, 1, 8000000, 1650873603, 0),
(247, 4, 8, '', 'Interest', '', '', 1, 1, 20000000, 1650873603, 0),
(248, 7, 8, '', 'Interest', '', '', 1, 1, 200000000, 1650873603, 0),
(249, 13, 8, '', 'Interest', '', '', 1, 1, 200000000, 1650873603, 0),
(250, 14, 8, '', 'Interest', '', '', 1, 1, 18320000, 1650873603, 0),
(251, 15, 8, '', 'Interest', '', '', 1, 1, 210840000, 1650873603, 0),
(252, 20, 8, '', 'Interest', '', '', 1, 1, 20000000, 1650873603, 0),
(253, 28, 8, '', 'Interest', '', '', 1, 1, 8000000, 1650873603, 0),
(254, 32, 8, '', 'Interest', '', '', 1, 1, 4000000, 1650873603, 0),
(255, 33, 8, '', 'Interest', '', '', 1, 1, 8000000, 1650873603, 0),
(256, 44, 8, '', 'Interest', '', '', 1, 1, 5400000000, 1650873603, 0),
(257, 1, 8, '', 'Interest', '', '', 1, 1, 13447680000, 1650877202, 0),
(258, 3, 8, '', 'Interest', '', '', 1, 1, 8000000, 1650877202, 0),
(259, 4, 8, '', 'Interest', '', '', 1, 1, 20000000, 1650877202, 0),
(260, 7, 8, '', 'Interest', '', '', 1, 1, 200000000, 1650877202, 0),
(261, 13, 8, '', 'Interest', '', '', 1, 1, 200000000, 1650877202, 0),
(262, 14, 8, '', 'Interest', '', '', 1, 1, 18320000, 1650877202, 0),
(263, 15, 8, '', 'Interest', '', '', 1, 1, 210840000, 1650877202, 0),
(264, 20, 8, '', 'Interest', '', '', 1, 1, 20000000, 1650877202, 0),
(265, 28, 8, '', 'Interest', '', '', 1, 1, 8000000, 1650877202, 0),
(266, 32, 8, '', 'Interest', '', '', 1, 1, 4000000, 1650877202, 0),
(267, 33, 8, '', 'Interest', '', '', 1, 1, 8000000, 1650877202, 0),
(268, 44, 8, '', 'Interest', '', '', 1, 1, 5400000000, 1650877202, 0),
(269, 1, 8, '', 'Interest', '', '', 1, 1, 13447680000, 1650880802, 0),
(270, 3, 8, '', 'Interest', '', '', 1, 1, 8000000, 1650880802, 0),
(271, 4, 8, '', 'Interest', '', '', 1, 1, 20000000, 1650880802, 0),
(272, 7, 8, '', 'Interest', '', '', 1, 1, 200000000, 1650880802, 0),
(273, 13, 8, '', 'Interest', '', '', 1, 1, 200000000, 1650880802, 0),
(274, 14, 8, '', 'Interest', '', '', 1, 1, 18320000, 1650880802, 0),
(275, 15, 8, '', 'Interest', '', '', 1, 1, 210840000, 1650880802, 0),
(276, 20, 8, '', 'Interest', '', '', 1, 1, 20000000, 1650880802, 0),
(277, 28, 8, '', 'Interest', '', '', 1, 1, 8000000, 1650880802, 0),
(278, 32, 8, '', 'Interest', '', '', 1, 1, 4000000, 1650880802, 0),
(279, 33, 8, '', 'Interest', '', '', 1, 1, 8000000, 1650880802, 0),
(280, 44, 8, '', 'Interest', '', '', 1, 1, 5400000000, 1650880802, 0),
(281, 0, 5, 'Not Applied', 'Reward for reporting scam', 'Not Applied', 'Not Applied', 1, 1, 2500, 1650882602, 0),
(282, 1, 8, '', 'Interest', '', '', 1, 1, 13447680000, 1650884402, 0),
(283, 3, 8, '', 'Interest', '', '', 1, 1, 8000000, 1650884402, 0),
(284, 4, 8, '', 'Interest', '', '', 1, 1, 20000000, 1650884402, 0),
(285, 7, 8, '', 'Interest', '', '', 1, 1, 200000000, 1650884402, 0),
(286, 13, 8, '', 'Interest', '', '', 1, 1, 200000000, 1650884402, 0),
(287, 14, 8, '', 'Interest', '', '', 1, 1, 18320000, 1650884402, 0),
(288, 15, 8, '', 'Interest', '', '', 1, 1, 210840000, 1650884402, 0),
(289, 20, 8, '', 'Interest', '', '', 1, 1, 20000000, 1650884402, 0),
(290, 28, 8, '', 'Interest', '', '', 1, 1, 8000000, 1650884402, 0),
(291, 32, 8, '', 'Interest', '', '', 1, 1, 4000000, 1650884402, 0),
(292, 33, 8, '', 'Interest', '', '', 1, 1, 8000000, 1650884402, 0),
(293, 44, 8, '', 'Interest', '', '', 1, 1, 5400000000, 1650884402, 0),
(294, 1, 8, '', 'Interest', '', '', 1, 1, 13447680000, 1650888002, 0),
(295, 3, 8, '', 'Interest', '', '', 1, 1, 8000000, 1650888002, 0),
(296, 4, 8, '', 'Interest', '', '', 1, 1, 20000000, 1650888002, 0),
(297, 7, 8, '', 'Interest', '', '', 1, 1, 200000000, 1650888002, 0),
(298, 13, 8, '', 'Interest', '', '', 1, 1, 200000000, 1650888002, 0),
(299, 14, 8, '', 'Interest', '', '', 1, 1, 18320000, 1650888002, 0),
(300, 15, 8, '', 'Interest', '', '', 1, 1, 210840000, 1650888002, 0),
(301, 20, 8, '', 'Interest', '', '', 1, 1, 20000000, 1650888002, 0),
(302, 28, 8, '', 'Interest', '', '', 1, 1, 8000000, 1650888002, 0),
(303, 32, 8, '', 'Interest', '', '', 1, 1, 4000000, 1650888002, 0),
(304, 33, 8, '', 'Interest', '', '', 1, 1, 8000000, 1650888002, 0),
(305, 44, 8, '', 'Interest', '', '', 1, 1, 5400000000, 1650888002, 0),
(306, 1, 8, '', 'Interest', '', '', 1, 1, 13447680000, 1650891602, 0),
(307, 3, 8, '', 'Interest', '', '', 1, 1, 8000000, 1650891602, 0),
(308, 4, 8, '', 'Interest', '', '', 1, 1, 20000000, 1650891602, 0),
(309, 7, 8, '', 'Interest', '', '', 1, 1, 200000000, 1650891602, 0),
(310, 13, 8, '', 'Interest', '', '', 1, 1, 200000000, 1650891602, 0),
(311, 14, 8, '', 'Interest', '', '', 1, 1, 18320000, 1650891602, 0),
(312, 15, 8, '', 'Interest', '', '', 1, 1, 210840000, 1650891602, 0),
(313, 20, 8, '', 'Interest', '', '', 1, 1, 20000000, 1650891602, 0),
(314, 28, 8, '', 'Interest', '', '', 1, 1, 8000000, 1650891602, 0),
(315, 32, 8, '', 'Interest', '', '', 1, 1, 4000000, 1650891602, 0),
(316, 33, 8, '', 'Interest', '', '', 1, 1, 8000000, 1650891602, 0),
(317, 44, 8, '', 'Interest', '', '', 1, 1, 5400000000, 1650891602, 0),
(318, 1, 8, '', 'Interest', '', '', 1, 1, 13447680000, 1650895202, 0),
(319, 3, 8, '', 'Interest', '', '', 1, 1, 8000000, 1650895202, 0),
(320, 4, 8, '', 'Interest', '', '', 1, 1, 20000000, 1650895202, 0),
(321, 7, 8, '', 'Interest', '', '', 1, 1, 200000000, 1650895202, 0),
(322, 13, 8, '', 'Interest', '', '', 1, 1, 200000000, 1650895202, 0),
(323, 14, 8, '', 'Interest', '', '', 1, 1, 18320000, 1650895202, 0),
(324, 15, 8, '', 'Interest', '', '', 1, 1, 210840000, 1650895202, 0),
(325, 20, 8, '', 'Interest', '', '', 1, 1, 20000000, 1650895202, 0),
(326, 28, 8, '', 'Interest', '', '', 1, 1, 8000000, 1650895202, 0),
(327, 32, 8, '', 'Interest', '', '', 1, 1, 4000000, 1650895202, 0),
(328, 33, 8, '', 'Interest', '', '', 1, 1, 8000000, 1650895202, 0),
(329, 44, 8, '', 'Interest', '', '', 1, 1, 5400000000, 1650895202, 0),
(330, 1, 8, '', 'Interest', '', '', 1, 1, 13447680000, 1650898802, 0),
(331, 3, 8, '', 'Interest', '', '', 1, 1, 8000000, 1650898802, 0),
(332, 4, 8, '', 'Interest', '', '', 1, 1, 20000000, 1650898802, 0),
(333, 7, 8, '', 'Interest', '', '', 1, 1, 200000000, 1650898802, 0),
(334, 13, 8, '', 'Interest', '', '', 1, 1, 200000000, 1650898802, 0),
(335, 14, 8, '', 'Interest', '', '', 1, 1, 18320000, 1650898802, 0),
(336, 15, 8, '', 'Interest', '', '', 1, 1, 210840000, 1650898802, 0),
(337, 20, 8, '', 'Interest', '', '', 1, 1, 20000000, 1650898802, 0),
(338, 28, 8, '', 'Interest', '', '', 1, 1, 8000000, 1650898802, 0),
(339, 32, 8, '', 'Interest', '', '', 1, 1, 4000000, 1650898802, 0),
(340, 33, 8, '', 'Interest', '', '', 1, 1, 8000000, 1650898802, 0),
(341, 44, 8, '', 'Interest', '', '', 1, 1, 5400000000, 1650898802, 0),
(342, 1, 8, '', 'Interest', '', '', 1, 1, 13447680000, 1650902402, 0),
(343, 3, 8, '', 'Interest', '', '', 1, 1, 8000000, 1650902402, 0),
(344, 4, 8, '', 'Interest', '', '', 1, 1, 20000000, 1650902402, 0),
(345, 7, 8, '', 'Interest', '', '', 1, 1, 200000000, 1650902402, 0),
(346, 13, 8, '', 'Interest', '', '', 1, 1, 200000000, 1650902402, 0),
(347, 14, 8, '', 'Interest', '', '', 1, 1, 18320000, 1650902402, 0),
(348, 15, 8, '', 'Interest', '', '', 1, 1, 210840000, 1650902402, 0),
(349, 20, 8, '', 'Interest', '', '', 1, 1, 20000000, 1650902402, 0),
(350, 28, 8, '', 'Interest', '', '', 1, 1, 8000000, 1650902402, 0),
(351, 32, 8, '', 'Interest', '', '', 1, 1, 4000000, 1650902402, 0),
(352, 33, 8, '', 'Interest', '', '', 1, 1, 8000000, 1650902402, 0),
(353, 44, 8, '', 'Interest', '', '', 1, 1, 5400000000, 1650902402, 0),
(354, 1, 8, '', 'Interest', '', '', 1, 1, 13447680000, 1650906002, 0),
(355, 3, 8, '', 'Interest', '', '', 1, 1, 8000000, 1650906002, 0),
(356, 4, 8, '', 'Interest', '', '', 1, 1, 20000000, 1650906002, 0),
(357, 7, 8, '', 'Interest', '', '', 1, 1, 200000000, 1650906002, 0),
(358, 13, 8, '', 'Interest', '', '', 1, 1, 200000000, 1650906002, 0),
(359, 14, 8, '', 'Interest', '', '', 1, 1, 18320000, 1650906002, 0),
(360, 15, 8, '', 'Interest', '', '', 1, 1, 210840000, 1650906002, 0),
(361, 20, 8, '', 'Interest', '', '', 1, 1, 20000000, 1650906002, 0),
(362, 28, 8, '', 'Interest', '', '', 1, 1, 8000000, 1650906002, 0),
(363, 32, 8, '', 'Interest', '', '', 1, 1, 4000000, 1650906002, 0),
(364, 33, 8, '', 'Interest', '', '', 1, 1, 8000000, 1650906002, 0),
(365, 44, 8, '', 'Interest', '', '', 1, 1, 5400000000, 1650906002, 0),
(366, 1, 8, '', 'Interest', '', '', 1, 1, 13447680000, 1650909603, 0),
(367, 3, 8, '', 'Interest', '', '', 1, 1, 8000000, 1650909603, 0),
(368, 4, 8, '', 'Interest', '', '', 1, 1, 20000000, 1650909603, 0),
(369, 7, 8, '', 'Interest', '', '', 1, 1, 200000000, 1650909603, 0),
(370, 13, 8, '', 'Interest', '', '', 1, 1, 200000000, 1650909603, 0),
(371, 14, 8, '', 'Interest', '', '', 1, 1, 18320000, 1650909603, 0),
(372, 15, 8, '', 'Interest', '', '', 1, 1, 210840000, 1650909603, 0),
(373, 20, 8, '', 'Interest', '', '', 1, 1, 20000000, 1650909603, 0),
(374, 28, 8, '', 'Interest', '', '', 1, 1, 8000000, 1650909603, 0),
(375, 32, 8, '', 'Interest', '', '', 1, 1, 4000000, 1650909603, 0),
(376, 33, 8, '', 'Interest', '', '', 1, 1, 8000000, 1650909603, 0),
(377, 44, 8, '', 'Interest', '', '', 1, 1, 5400000000, 1650909603, 0),
(378, 1, 8, '', 'Interest', '', '', 1, 1, 13447680000, 1650913202, 0),
(379, 3, 8, '', 'Interest', '', '', 1, 1, 8000000, 1650913202, 0),
(380, 4, 8, '', 'Interest', '', '', 1, 1, 20000000, 1650913202, 0),
(381, 7, 8, '', 'Interest', '', '', 1, 1, 200000000, 1650913202, 0),
(382, 13, 8, '', 'Interest', '', '', 1, 1, 200000000, 1650913202, 0),
(383, 14, 8, '', 'Interest', '', '', 1, 1, 18320000, 1650913202, 0),
(384, 15, 8, '', 'Interest', '', '', 1, 1, 210840000, 1650913202, 0),
(385, 20, 8, '', 'Interest', '', '', 1, 1, 20000000, 1650913202, 0),
(386, 28, 8, '', 'Interest', '', '', 1, 1, 8000000, 1650913202, 0),
(387, 32, 8, '', 'Interest', '', '', 1, 1, 4000000, 1650913202, 0),
(388, 33, 8, '', 'Interest', '', '', 1, 1, 8000000, 1650913202, 0),
(389, 44, 8, '', 'Interest', '', '', 1, 1, 5400000000, 1650913202, 0),
(390, 1, 8, '', 'Interest', '', '', 1, 1, 13447680000, 1650916802, 0),
(391, 3, 8, '', 'Interest', '', '', 1, 1, 8000000, 1650916802, 0),
(392, 4, 8, '', 'Interest', '', '', 1, 1, 20000000, 1650916802, 0),
(393, 7, 8, '', 'Interest', '', '', 1, 1, 200000000, 1650916802, 0),
(394, 13, 8, '', 'Interest', '', '', 1, 1, 200000000, 1650916802, 0),
(395, 14, 8, '', 'Interest', '', '', 1, 1, 18320000, 1650916802, 0),
(396, 15, 8, '', 'Interest', '', '', 1, 1, 210840000, 1650916802, 0),
(397, 20, 8, '', 'Interest', '', '', 1, 1, 20000000, 1650916802, 0),
(398, 28, 8, '', 'Interest', '', '', 1, 1, 8000000, 1650916802, 0),
(399, 32, 8, '', 'Interest', '', '', 1, 1, 4000000, 1650916802, 0),
(400, 33, 8, '', 'Interest', '', '', 1, 1, 8000000, 1650916802, 0),
(401, 44, 8, '', 'Interest', '', '', 1, 1, 5400000000, 1650916802, 0),
(402, 1, 8, '', 'Interest', '', '', 1, 1, 13447680000, 1650920402, 0),
(403, 3, 8, '', 'Interest', '', '', 1, 1, 8000000, 1650920402, 0),
(404, 4, 8, '', 'Interest', '', '', 1, 1, 20000000, 1650920402, 0),
(405, 7, 8, '', 'Interest', '', '', 1, 1, 200000000, 1650920402, 0),
(406, 13, 8, '', 'Interest', '', '', 1, 1, 200000000, 1650920402, 0),
(407, 14, 8, '', 'Interest', '', '', 1, 1, 18320000, 1650920402, 0),
(408, 15, 8, '', 'Interest', '', '', 1, 1, 210840000, 1650920402, 0),
(409, 20, 8, '', 'Interest', '', '', 1, 1, 20000000, 1650920402, 0),
(410, 28, 8, '', 'Interest', '', '', 1, 1, 8000000, 1650920402, 0),
(411, 32, 8, '', 'Interest', '', '', 1, 1, 4000000, 1650920402, 0),
(412, 33, 8, '', 'Interest', '', '', 1, 1, 8000000, 1650920402, 0),
(413, 44, 8, '', 'Interest', '', '', 1, 1, 5400000000, 1650920402, 0),
(414, 1, 8, '', 'Interest', '', '', 1, 1, 13447680000, 1650924003, 0),
(415, 3, 8, '', 'Interest', '', '', 1, 1, 8000000, 1650924003, 0),
(416, 4, 8, '', 'Interest', '', '', 1, 1, 20000000, 1650924003, 0),
(417, 7, 8, '', 'Interest', '', '', 1, 1, 200000000, 1650924003, 0),
(418, 13, 8, '', 'Interest', '', '', 1, 1, 200000000, 1650924003, 0),
(419, 14, 8, '', 'Interest', '', '', 1, 1, 18320000, 1650924003, 0),
(420, 15, 8, '', 'Interest', '', '', 1, 1, 210840000, 1650924003, 0),
(421, 20, 8, '', 'Interest', '', '', 1, 1, 20000000, 1650924003, 0),
(422, 28, 8, '', 'Interest', '', '', 1, 1, 8000000, 1650924003, 0),
(423, 32, 8, '', 'Interest', '', '', 1, 1, 4000000, 1650924003, 0),
(424, 33, 8, '', 'Interest', '', '', 1, 1, 8000000, 1650924003, 0),
(425, 44, 8, '', 'Interest', '', '', 1, 1, 5400000000, 1650924003, 0),
(426, 1, 8, '', 'Interest', '', '', 1, 1, 13447680000, 1650927602, 0),
(427, 3, 8, '', 'Interest', '', '', 1, 1, 8000000, 1650927602, 0),
(428, 4, 8, '', 'Interest', '', '', 1, 1, 20000000, 1650927602, 0),
(429, 7, 8, '', 'Interest', '', '', 1, 1, 200000000, 1650927602, 0),
(430, 13, 8, '', 'Interest', '', '', 1, 1, 200000000, 1650927602, 0),
(431, 14, 8, '', 'Interest', '', '', 1, 1, 18320000, 1650927602, 0),
(432, 15, 8, '', 'Interest', '', '', 1, 1, 210840000, 1650927602, 0),
(433, 20, 8, '', 'Interest', '', '', 1, 1, 20000000, 1650927602, 0),
(434, 28, 8, '', 'Interest', '', '', 1, 1, 8000000, 1650927602, 0),
(435, 32, 8, '', 'Interest', '', '', 1, 1, 4000000, 1650927602, 0),
(436, 33, 8, '', 'Interest', '', '', 1, 1, 8000000, 1650927602, 0),
(437, 44, 8, '', 'Interest', '', '', 1, 1, 5400000000, 1650927602, 0),
(438, 0, 5, 'Not Applied', 'Reward for reporting scam', 'Not Applied', 'Not Applied', 1, 1, 2500, 1650970803, 0),
(439, 44, 6, '', '', '', '', 1, 1, 25000000000, 1651047285, 0),
(440, 1, 7, '', '', '', '', 1, 1, 2500000000, 1651047285, 0),
(441, 0, 5, 'Not Applied', 'Reward for reporting scam', 'Not Applied', 'Not Applied', 1, 1, 2500, 1651059002, 0),
(442, 0, 5, 'Not Applied', 'Reward for reporting scam', 'Not Applied', 'Not Applied', 1, 1, 2500, 1651147201, 0),
(443, 0, 5, 'Not Applied', 'Reward for reporting scam', 'Not Applied', 'Not Applied', 1, 1, 2500, 1651233603, 0),
(444, 0, 5, 'Not Applied', 'Reward for reporting scam', 'Not Applied', 'Not Applied', 1, 1, 2500, 1651321802, 0),
(445, 0, 5, 'Not Applied', 'Reward for reporting scam', 'Not Applied', 'Not Applied', 1, 1, 2500, 1651410002, 0),
(446, 1, 8, '', 'Interest', '', '', 1, 1, 13447680000, 1651449602, 0),
(447, 3, 8, '', 'Interest', '', '', 1, 1, 8000000, 1651449602, 0),
(448, 4, 8, '', 'Interest', '', '', 1, 1, 20000000, 1651449602, 0),
(449, 7, 8, '', 'Interest', '', '', 1, 1, 200000000, 1651449602, 0),
(450, 13, 8, '', 'Interest', '', '', 1, 1, 200000000, 1651449602, 0),
(451, 14, 8, '', 'Interest', '', '', 1, 1, 18320000, 1651449602, 0),
(452, 15, 8, '', 'Interest', '', '', 1, 1, 210840000, 1651449602, 0),
(453, 20, 8, '', 'Interest', '', '', 1, 1, 20000000, 1651449602, 0),
(454, 28, 8, '', 'Interest', '', '', 1, 1, 8000000, 1651449602, 0),
(455, 32, 8, '', 'Interest', '', '', 1, 1, 4000000, 1651449602, 0),
(456, 33, 8, '', 'Interest', '', '', 1, 1, 8000000, 1651449602, 0),
(457, 44, 8, '', 'Interest', '', '', 1, 1, 6400000000, 1651449602, 0),
(458, 1, 8, '', 'Interest', '', '', 1, 1, 13447680000, 1651453201, 0),
(459, 3, 8, '', 'Interest', '', '', 1, 1, 8000000, 1651453201, 0),
(460, 4, 8, '', 'Interest', '', '', 1, 1, 20000000, 1651453201, 0),
(461, 7, 8, '', 'Interest', '', '', 1, 1, 200000000, 1651453201, 0),
(462, 13, 8, '', 'Interest', '', '', 1, 1, 200000000, 1651453201, 0),
(463, 14, 8, '', 'Interest', '', '', 1, 1, 18320000, 1651453201, 0),
(464, 15, 8, '', 'Interest', '', '', 1, 1, 210840000, 1651453201, 0),
(465, 20, 8, '', 'Interest', '', '', 1, 1, 20000000, 1651453201, 0),
(466, 28, 8, '', 'Interest', '', '', 1, 1, 8000000, 1651453201, 0),
(467, 32, 8, '', 'Interest', '', '', 1, 1, 4000000, 1651453201, 0),
(468, 33, 8, '', 'Interest', '', '', 1, 1, 8000000, 1651453201, 0),
(469, 44, 8, '', 'Interest', '', '', 1, 1, 6400000000, 1651453201, 0),
(470, 1, 8, '', 'Interest', '', '', 1, 1, 13447680000, 1651456802, 0),
(471, 3, 8, '', 'Interest', '', '', 1, 1, 8000000, 1651456802, 0),
(472, 4, 8, '', 'Interest', '', '', 1, 1, 20000000, 1651456802, 0),
(473, 7, 8, '', 'Interest', '', '', 1, 1, 200000000, 1651456802, 0),
(474, 13, 8, '', 'Interest', '', '', 1, 1, 200000000, 1651456802, 0),
(475, 14, 8, '', 'Interest', '', '', 1, 1, 18320000, 1651456802, 0),
(476, 15, 8, '', 'Interest', '', '', 1, 1, 210840000, 1651456802, 0),
(477, 20, 8, '', 'Interest', '', '', 1, 1, 20000000, 1651456802, 0),
(478, 28, 8, '', 'Interest', '', '', 1, 1, 8000000, 1651456802, 0),
(479, 32, 8, '', 'Interest', '', '', 1, 1, 4000000, 1651456802, 0),
(480, 33, 8, '', 'Interest', '', '', 1, 1, 8000000, 1651456802, 0),
(481, 44, 8, '', 'Interest', '', '', 1, 1, 6400000000, 1651456802, 0),
(482, 1, 8, '', 'Interest', '', '', 1, 1, 13447680000, 1651460401, 0),
(483, 3, 8, '', 'Interest', '', '', 1, 1, 8000000, 1651460401, 0),
(484, 4, 8, '', 'Interest', '', '', 1, 1, 20000000, 1651460401, 0),
(485, 7, 8, '', 'Interest', '', '', 1, 1, 200000000, 1651460401, 0),
(486, 13, 8, '', 'Interest', '', '', 1, 1, 200000000, 1651460401, 0),
(487, 14, 8, '', 'Interest', '', '', 1, 1, 18320000, 1651460401, 0),
(488, 15, 8, '', 'Interest', '', '', 1, 1, 210840000, 1651460401, 0),
(489, 20, 8, '', 'Interest', '', '', 1, 1, 20000000, 1651460401, 0),
(490, 28, 8, '', 'Interest', '', '', 1, 1, 8000000, 1651460401, 0),
(491, 32, 8, '', 'Interest', '', '', 1, 1, 4000000, 1651460401, 0),
(492, 33, 8, '', 'Interest', '', '', 1, 1, 8000000, 1651460401, 0),
(493, 44, 8, '', 'Interest', '', '', 1, 1, 6400000000, 1651460401, 0),
(494, 1, 8, '', 'Interest', '', '', 1, 1, 13447680000, 1651464002, 0),
(495, 3, 8, '', 'Interest', '', '', 1, 1, 8000000, 1651464002, 0),
(496, 4, 8, '', 'Interest', '', '', 1, 1, 20000000, 1651464002, 0),
(497, 7, 8, '', 'Interest', '', '', 1, 1, 200000000, 1651464002, 0),
(498, 13, 8, '', 'Interest', '', '', 1, 1, 200000000, 1651464002, 0),
(499, 14, 8, '', 'Interest', '', '', 1, 1, 18320000, 1651464002, 0),
(500, 15, 8, '', 'Interest', '', '', 1, 1, 210840000, 1651464002, 0),
(501, 20, 8, '', 'Interest', '', '', 1, 1, 20000000, 1651464002, 0),
(502, 28, 8, '', 'Interest', '', '', 1, 1, 8000000, 1651464002, 0),
(503, 32, 8, '', 'Interest', '', '', 1, 1, 4000000, 1651464002, 0),
(504, 33, 8, '', 'Interest', '', '', 1, 1, 8000000, 1651464002, 0),
(505, 44, 8, '', 'Interest', '', '', 1, 1, 6400000000, 1651464002, 0),
(506, 1, 8, '', 'Interest', '', '', 1, 1, 13447680000, 1651467602, 0),
(507, 3, 8, '', 'Interest', '', '', 1, 1, 8000000, 1651467602, 0),
(508, 4, 8, '', 'Interest', '', '', 1, 1, 20000000, 1651467602, 0),
(509, 7, 8, '', 'Interest', '', '', 1, 1, 200000000, 1651467602, 0),
(510, 13, 8, '', 'Interest', '', '', 1, 1, 200000000, 1651467602, 0),
(511, 14, 8, '', 'Interest', '', '', 1, 1, 18320000, 1651467602, 0),
(512, 15, 8, '', 'Interest', '', '', 1, 1, 210840000, 1651467602, 0),
(513, 20, 8, '', 'Interest', '', '', 1, 1, 20000000, 1651467602, 0),
(514, 28, 8, '', 'Interest', '', '', 1, 1, 8000000, 1651467602, 0),
(515, 32, 8, '', 'Interest', '', '', 1, 1, 4000000, 1651467602, 0),
(516, 33, 8, '', 'Interest', '', '', 1, 1, 8000000, 1651467602, 0),
(517, 44, 8, '', 'Interest', '', '', 1, 1, 6400000000, 1651467602, 0),
(518, 1, 8, '', 'Interest', '', '', 1, 1, 13447680000, 1651471202, 0),
(519, 3, 8, '', 'Interest', '', '', 1, 1, 8000000, 1651471202, 0),
(520, 4, 8, '', 'Interest', '', '', 1, 1, 20000000, 1651471202, 0),
(521, 7, 8, '', 'Interest', '', '', 1, 1, 200000000, 1651471202, 0),
(522, 13, 8, '', 'Interest', '', '', 1, 1, 200000000, 1651471202, 0),
(523, 14, 8, '', 'Interest', '', '', 1, 1, 18320000, 1651471202, 0),
(524, 15, 8, '', 'Interest', '', '', 1, 1, 210840000, 1651471202, 0),
(525, 20, 8, '', 'Interest', '', '', 1, 1, 20000000, 1651471202, 0),
(526, 28, 8, '', 'Interest', '', '', 1, 1, 8000000, 1651471202, 0),
(527, 32, 8, '', 'Interest', '', '', 1, 1, 4000000, 1651471202, 0),
(528, 33, 8, '', 'Interest', '', '', 1, 1, 8000000, 1651471202, 0),
(529, 44, 8, '', 'Interest', '', '', 1, 1, 6400000000, 1651471202, 0),
(530, 1, 8, '', 'Interest', '', '', 1, 1, 13447680000, 1651474809, 0),
(531, 3, 8, '', 'Interest', '', '', 1, 1, 8000000, 1651474809, 0),
(532, 4, 8, '', 'Interest', '', '', 1, 1, 20000000, 1651474809, 0),
(533, 7, 8, '', 'Interest', '', '', 1, 1, 200000000, 1651474809, 0),
(534, 13, 8, '', 'Interest', '', '', 1, 1, 200000000, 1651474809, 0),
(535, 14, 8, '', 'Interest', '', '', 1, 1, 18320000, 1651474809, 0),
(536, 15, 8, '', 'Interest', '', '', 1, 1, 210840000, 1651474809, 0),
(537, 20, 8, '', 'Interest', '', '', 1, 1, 20000000, 1651474809, 0),
(538, 28, 8, '', 'Interest', '', '', 1, 1, 8000000, 1651474809, 0),
(539, 32, 8, '', 'Interest', '', '', 1, 1, 4000000, 1651474809, 0),
(540, 33, 8, '', 'Interest', '', '', 1, 1, 8000000, 1651474809, 0),
(541, 44, 8, '', 'Interest', '', '', 1, 1, 6400000000, 1651474809, 0),
(542, 1, 8, '', 'Interest', '', '', 1, 1, 13447680000, 1651478402, 0),
(543, 3, 8, '', 'Interest', '', '', 1, 1, 8000000, 1651478402, 0),
(544, 4, 8, '', 'Interest', '', '', 1, 1, 20000000, 1651478402, 0),
(545, 7, 8, '', 'Interest', '', '', 1, 1, 200000000, 1651478402, 0),
(546, 13, 8, '', 'Interest', '', '', 1, 1, 200000000, 1651478402, 0),
(547, 14, 8, '', 'Interest', '', '', 1, 1, 18320000, 1651478402, 0),
(548, 15, 8, '', 'Interest', '', '', 1, 1, 210840000, 1651478402, 0),
(549, 20, 8, '', 'Interest', '', '', 1, 1, 20000000, 1651478402, 0),
(550, 28, 8, '', 'Interest', '', '', 1, 1, 8000000, 1651478402, 0),
(551, 32, 8, '', 'Interest', '', '', 1, 1, 4000000, 1651478402, 0),
(552, 33, 8, '', 'Interest', '', '', 1, 1, 8000000, 1651478402, 0),
(553, 44, 8, '', 'Interest', '', '', 1, 1, 6400000000, 1651478402, 0),
(554, 1, 8, '', 'Interest', '', '', 1, 1, 13447680000, 1651482003, 0),
(555, 3, 8, '', 'Interest', '', '', 1, 1, 8000000, 1651482003, 0),
(556, 4, 8, '', 'Interest', '', '', 1, 1, 20000000, 1651482003, 0),
(557, 7, 8, '', 'Interest', '', '', 1, 1, 200000000, 1651482003, 0),
(558, 13, 8, '', 'Interest', '', '', 1, 1, 200000000, 1651482003, 0),
(559, 14, 8, '', 'Interest', '', '', 1, 1, 18320000, 1651482003, 0),
(560, 15, 8, '', 'Interest', '', '', 1, 1, 210840000, 1651482003, 0),
(561, 20, 8, '', 'Interest', '', '', 1, 1, 20000000, 1651482003, 0),
(562, 28, 8, '', 'Interest', '', '', 1, 1, 8000000, 1651482003, 0),
(563, 32, 8, '', 'Interest', '', '', 1, 1, 4000000, 1651482003, 0),
(564, 33, 8, '', 'Interest', '', '', 1, 1, 8000000, 1651482003, 0),
(565, 44, 8, '', 'Interest', '', '', 1, 1, 6400000000, 1651482003, 0),
(566, 1, 8, '', 'Interest', '', '', 1, 1, 13447680000, 1651485603, 0),
(567, 3, 8, '', 'Interest', '', '', 1, 1, 8000000, 1651485603, 0),
(568, 4, 8, '', 'Interest', '', '', 1, 1, 20000000, 1651485603, 0),
(569, 7, 8, '', 'Interest', '', '', 1, 1, 200000000, 1651485603, 0),
(570, 13, 8, '', 'Interest', '', '', 1, 1, 200000000, 1651485603, 0),
(571, 14, 8, '', 'Interest', '', '', 1, 1, 18320000, 1651485603, 0),
(572, 15, 8, '', 'Interest', '', '', 1, 1, 210840000, 1651485603, 0),
(573, 20, 8, '', 'Interest', '', '', 1, 1, 20000000, 1651485603, 0),
(574, 28, 8, '', 'Interest', '', '', 1, 1, 8000000, 1651485603, 0),
(575, 32, 8, '', 'Interest', '', '', 1, 1, 4000000, 1651485603, 0),
(576, 33, 8, '', 'Interest', '', '', 1, 1, 8000000, 1651485603, 0),
(577, 44, 8, '', 'Interest', '', '', 1, 1, 6400000000, 1651485603, 0),
(578, 1, 8, '', 'Interest', '', '', 1, 1, 13447680000, 1651489202, 0),
(579, 3, 8, '', 'Interest', '', '', 1, 1, 8000000, 1651489202, 0),
(580, 4, 8, '', 'Interest', '', '', 1, 1, 20000000, 1651489202, 0),
(581, 7, 8, '', 'Interest', '', '', 1, 1, 200000000, 1651489202, 0),
(582, 13, 8, '', 'Interest', '', '', 1, 1, 200000000, 1651489202, 0),
(583, 14, 8, '', 'Interest', '', '', 1, 1, 18320000, 1651489202, 0),
(584, 15, 8, '', 'Interest', '', '', 1, 1, 210840000, 1651489202, 0),
(585, 20, 8, '', 'Interest', '', '', 1, 1, 20000000, 1651489202, 0),
(586, 28, 8, '', 'Interest', '', '', 1, 1, 8000000, 1651489202, 0),
(587, 32, 8, '', 'Interest', '', '', 1, 1, 4000000, 1651489202, 0),
(588, 33, 8, '', 'Interest', '', '', 1, 1, 8000000, 1651489202, 0),
(589, 44, 8, '', 'Interest', '', '', 1, 1, 6400000000, 1651489202, 0),
(590, 1, 8, '', 'Interest', '', '', 1, 1, 13447680000, 1651492802, 0),
(591, 3, 8, '', 'Interest', '', '', 1, 1, 8000000, 1651492802, 0),
(592, 4, 8, '', 'Interest', '', '', 1, 1, 20000000, 1651492802, 0),
(593, 7, 8, '', 'Interest', '', '', 1, 1, 200000000, 1651492802, 0),
(594, 13, 8, '', 'Interest', '', '', 1, 1, 200000000, 1651492802, 0),
(595, 14, 8, '', 'Interest', '', '', 1, 1, 18320000, 1651492802, 0),
(596, 15, 8, '', 'Interest', '', '', 1, 1, 210840000, 1651492802, 0),
(597, 20, 8, '', 'Interest', '', '', 1, 1, 20000000, 1651492802, 0),
(598, 28, 8, '', 'Interest', '', '', 1, 1, 8000000, 1651492802, 0),
(599, 32, 8, '', 'Interest', '', '', 1, 1, 4000000, 1651492802, 0),
(600, 33, 8, '', 'Interest', '', '', 1, 1, 8000000, 1651492802, 0),
(601, 44, 8, '', 'Interest', '', '', 1, 1, 6400000000, 1651492802, 0),
(602, 1, 8, '', 'Interest', '', '', 1, 1, 13447680000, 1651496402, 0),
(603, 3, 8, '', 'Interest', '', '', 1, 1, 8000000, 1651496402, 0),
(604, 4, 8, '', 'Interest', '', '', 1, 1, 20000000, 1651496402, 0),
(605, 7, 8, '', 'Interest', '', '', 1, 1, 200000000, 1651496402, 0),
(606, 13, 8, '', 'Interest', '', '', 1, 1, 200000000, 1651496402, 0),
(607, 14, 8, '', 'Interest', '', '', 1, 1, 18320000, 1651496402, 0),
(608, 15, 8, '', 'Interest', '', '', 1, 1, 210840000, 1651496402, 0),
(609, 20, 8, '', 'Interest', '', '', 1, 1, 20000000, 1651496402, 0),
(610, 28, 8, '', 'Interest', '', '', 1, 1, 8000000, 1651496402, 0),
(611, 32, 8, '', 'Interest', '', '', 1, 1, 4000000, 1651496402, 0),
(612, 33, 8, '', 'Interest', '', '', 1, 1, 8000000, 1651496402, 0),
(613, 44, 8, '', 'Interest', '', '', 1, 1, 6400000000, 1651496402, 0),
(614, 0, 5, 'Not Applied', 'Reward for reporting scam', 'Not Applied', 'Not Applied', 1, 1, 2500, 1651498202, 0),
(615, 1, 8, '', 'Interest', '', '', 1, 1, 13447680000, 1651500002, 0),
(616, 3, 8, '', 'Interest', '', '', 1, 1, 8000000, 1651500002, 0),
(617, 4, 8, '', 'Interest', '', '', 1, 1, 20000000, 1651500002, 0),
(618, 7, 8, '', 'Interest', '', '', 1, 1, 200000000, 1651500002, 0),
(619, 13, 8, '', 'Interest', '', '', 1, 1, 200000000, 1651500002, 0),
(620, 14, 8, '', 'Interest', '', '', 1, 1, 18320000, 1651500002, 0),
(621, 15, 8, '', 'Interest', '', '', 1, 1, 210840000, 1651500002, 0),
(622, 20, 8, '', 'Interest', '', '', 1, 1, 20000000, 1651500002, 0),
(623, 28, 8, '', 'Interest', '', '', 1, 1, 8000000, 1651500002, 0),
(624, 32, 8, '', 'Interest', '', '', 1, 1, 4000000, 1651500002, 0),
(625, 33, 8, '', 'Interest', '', '', 1, 1, 8000000, 1651500002, 0),
(626, 44, 8, '', 'Interest', '', '', 1, 1, 6400000000, 1651500002, 0),
(627, 1, 8, '', 'Interest', '', '', 1, 1, 13447680000, 1651503602, 0),
(628, 3, 8, '', 'Interest', '', '', 1, 1, 8000000, 1651503602, 0),
(629, 4, 8, '', 'Interest', '', '', 1, 1, 20000000, 1651503602, 0),
(630, 7, 8, '', 'Interest', '', '', 1, 1, 200000000, 1651503602, 0),
(631, 13, 8, '', 'Interest', '', '', 1, 1, 200000000, 1651503602, 0),
(632, 14, 8, '', 'Interest', '', '', 1, 1, 18320000, 1651503602, 0),
(633, 15, 8, '', 'Interest', '', '', 1, 1, 210840000, 1651503602, 0),
(634, 20, 8, '', 'Interest', '', '', 1, 1, 20000000, 1651503602, 0),
(635, 28, 8, '', 'Interest', '', '', 1, 1, 8000000, 1651503602, 0),
(636, 32, 8, '', 'Interest', '', '', 1, 1, 4000000, 1651503602, 0),
(637, 33, 8, '', 'Interest', '', '', 1, 1, 8000000, 1651503602, 0),
(638, 44, 8, '', 'Interest', '', '', 1, 1, 6400000000, 1651503602, 0),
(639, 1, 8, '', 'Interest', '', '', 1, 1, 13447680000, 1651507201, 0),
(640, 3, 8, '', 'Interest', '', '', 1, 1, 8000000, 1651507201, 0),
(641, 4, 8, '', 'Interest', '', '', 1, 1, 20000000, 1651507201, 0),
(642, 7, 8, '', 'Interest', '', '', 1, 1, 200000000, 1651507201, 0),
(643, 13, 8, '', 'Interest', '', '', 1, 1, 200000000, 1651507201, 0),
(644, 14, 8, '', 'Interest', '', '', 1, 1, 18320000, 1651507201, 0),
(645, 15, 8, '', 'Interest', '', '', 1, 1, 210840000, 1651507201, 0),
(646, 20, 8, '', 'Interest', '', '', 1, 1, 20000000, 1651507201, 0),
(647, 28, 8, '', 'Interest', '', '', 1, 1, 8000000, 1651507201, 0),
(648, 32, 8, '', 'Interest', '', '', 1, 1, 4000000, 1651507201, 0),
(649, 33, 8, '', 'Interest', '', '', 1, 1, 8000000, 1651507201, 0),
(650, 44, 8, '', 'Interest', '', '', 1, 1, 6400000000, 1651507201, 0),
(651, 1, 8, '', 'Interest', '', '', 1, 1, 13447680000, 1651510802, 0),
(652, 3, 8, '', 'Interest', '', '', 1, 1, 8000000, 1651510802, 0),
(653, 4, 8, '', 'Interest', '', '', 1, 1, 20000000, 1651510802, 0),
(654, 7, 8, '', 'Interest', '', '', 1, 1, 200000000, 1651510802, 0),
(655, 13, 8, '', 'Interest', '', '', 1, 1, 200000000, 1651510802, 0),
(656, 14, 8, '', 'Interest', '', '', 1, 1, 18320000, 1651510802, 0),
(657, 15, 8, '', 'Interest', '', '', 1, 1, 210840000, 1651510802, 0),
(658, 20, 8, '', 'Interest', '', '', 1, 1, 20000000, 1651510802, 0),
(659, 28, 8, '', 'Interest', '', '', 1, 1, 8000000, 1651510802, 0),
(660, 32, 8, '', 'Interest', '', '', 1, 1, 4000000, 1651510802, 0),
(661, 33, 8, '', 'Interest', '', '', 1, 1, 8000000, 1651510802, 0),
(662, 44, 8, '', 'Interest', '', '', 1, 1, 6400000000, 1651510802, 0),
(663, 1, 8, '', 'Interest', '', '', 1, 1, 13447680000, 1651514402, 0),
(664, 3, 8, '', 'Interest', '', '', 1, 1, 8000000, 1651514402, 0),
(665, 4, 8, '', 'Interest', '', '', 1, 1, 20000000, 1651514402, 0),
(666, 7, 8, '', 'Interest', '', '', 1, 1, 200000000, 1651514402, 0),
(667, 13, 8, '', 'Interest', '', '', 1, 1, 200000000, 1651514402, 0),
(668, 14, 8, '', 'Interest', '', '', 1, 1, 18320000, 1651514402, 0),
(669, 15, 8, '', 'Interest', '', '', 1, 1, 210840000, 1651514402, 0),
(670, 20, 8, '', 'Interest', '', '', 1, 1, 20000000, 1651514402, 0),
(671, 28, 8, '', 'Interest', '', '', 1, 1, 8000000, 1651514402, 0),
(672, 32, 8, '', 'Interest', '', '', 1, 1, 4000000, 1651514402, 0),
(673, 33, 8, '', 'Interest', '', '', 1, 1, 8000000, 1651514402, 0),
(674, 44, 8, '', 'Interest', '', '', 1, 1, 6400000000, 1651514402, 0),
(675, 1, 8, '', 'Interest', '', '', 1, 1, 13447680000, 1651518002, 0),
(676, 3, 8, '', 'Interest', '', '', 1, 1, 8000000, 1651518002, 0),
(677, 4, 8, '', 'Interest', '', '', 1, 1, 20000000, 1651518002, 0),
(678, 7, 8, '', 'Interest', '', '', 1, 1, 200000000, 1651518002, 0),
(679, 13, 8, '', 'Interest', '', '', 1, 1, 200000000, 1651518002, 0),
(680, 14, 8, '', 'Interest', '', '', 1, 1, 18320000, 1651518002, 0),
(681, 15, 8, '', 'Interest', '', '', 1, 1, 210840000, 1651518002, 0),
(682, 20, 8, '', 'Interest', '', '', 1, 1, 20000000, 1651518002, 0),
(683, 28, 8, '', 'Interest', '', '', 1, 1, 8000000, 1651518002, 0),
(684, 32, 8, '', 'Interest', '', '', 1, 1, 4000000, 1651518002, 0),
(685, 33, 8, '', 'Interest', '', '', 1, 1, 8000000, 1651518002, 0),
(686, 44, 8, '', 'Interest', '', '', 1, 1, 6400000000, 1651518002, 0),
(687, 1, 8, '', 'Interest', '', '', 1, 1, 13447680000, 1651521602, 0),
(688, 3, 8, '', 'Interest', '', '', 1, 1, 8000000, 1651521602, 0),
(689, 4, 8, '', 'Interest', '', '', 1, 1, 20000000, 1651521602, 0),
(690, 7, 8, '', 'Interest', '', '', 1, 1, 200000000, 1651521602, 0),
(691, 13, 8, '', 'Interest', '', '', 1, 1, 200000000, 1651521602, 0),
(692, 14, 8, '', 'Interest', '', '', 1, 1, 18320000, 1651521602, 0),
(693, 15, 8, '', 'Interest', '', '', 1, 1, 210840000, 1651521602, 0),
(694, 20, 8, '', 'Interest', '', '', 1, 1, 20000000, 1651521602, 0),
(695, 28, 8, '', 'Interest', '', '', 1, 1, 8000000, 1651521602, 0),
(696, 32, 8, '', 'Interest', '', '', 1, 1, 4000000, 1651521602, 0),
(697, 33, 8, '', 'Interest', '', '', 1, 1, 8000000, 1651521602, 0),
(698, 44, 8, '', 'Interest', '', '', 1, 1, 6400000000, 1651521602, 0),
(699, 1, 8, '', 'Interest', '', '', 1, 1, 13447680000, 1651525202, 0),
(700, 3, 8, '', 'Interest', '', '', 1, 1, 8000000, 1651525202, 0),
(701, 4, 8, '', 'Interest', '', '', 1, 1, 20000000, 1651525202, 0),
(702, 7, 8, '', 'Interest', '', '', 1, 1, 200000000, 1651525202, 0),
(703, 13, 8, '', 'Interest', '', '', 1, 1, 200000000, 1651525202, 0),
(704, 14, 8, '', 'Interest', '', '', 1, 1, 18320000, 1651525202, 0),
(705, 15, 8, '', 'Interest', '', '', 1, 1, 210840000, 1651525202, 0),
(706, 20, 8, '', 'Interest', '', '', 1, 1, 20000000, 1651525202, 0),
(707, 28, 8, '', 'Interest', '', '', 1, 1, 8000000, 1651525202, 0),
(708, 32, 8, '', 'Interest', '', '', 1, 1, 4000000, 1651525202, 0),
(709, 33, 8, '', 'Interest', '', '', 1, 1, 8000000, 1651525202, 0),
(710, 44, 8, '', 'Interest', '', '', 1, 1, 6400000000, 1651525202, 0),
(711, 1, 8, '', 'Interest', '', '', 1, 1, 13447680000, 1651528802, 0),
(712, 3, 8, '', 'Interest', '', '', 1, 1, 8000000, 1651528802, 0),
(713, 4, 8, '', 'Interest', '', '', 1, 1, 20000000, 1651528802, 0),
(714, 7, 8, '', 'Interest', '', '', 1, 1, 200000000, 1651528802, 0),
(715, 13, 8, '', 'Interest', '', '', 1, 1, 200000000, 1651528802, 0),
(716, 14, 8, '', 'Interest', '', '', 1, 1, 18320000, 1651528802, 0),
(717, 15, 8, '', 'Interest', '', '', 1, 1, 210840000, 1651528802, 0),
(718, 20, 8, '', 'Interest', '', '', 1, 1, 20000000, 1651528802, 0),
(719, 28, 8, '', 'Interest', '', '', 1, 1, 8000000, 1651528802, 0),
(720, 32, 8, '', 'Interest', '', '', 1, 1, 4000000, 1651528802, 0),
(721, 33, 8, '', 'Interest', '', '', 1, 1, 8000000, 1651528802, 0),
(722, 44, 8, '', 'Interest', '', '', 1, 1, 6400000000, 1651528802, 0),
(723, 1, 8, '', 'Interest', '', '', 1, 1, 13447680000, 1651532402, 0),
(724, 3, 8, '', 'Interest', '', '', 1, 1, 8000000, 1651532402, 0),
(725, 4, 8, '', 'Interest', '', '', 1, 1, 20000000, 1651532402, 0),
(726, 7, 8, '', 'Interest', '', '', 1, 1, 200000000, 1651532402, 0),
(727, 13, 8, '', 'Interest', '', '', 1, 1, 200000000, 1651532402, 0),
(728, 14, 8, '', 'Interest', '', '', 1, 1, 18320000, 1651532402, 0),
(729, 15, 8, '', 'Interest', '', '', 1, 1, 210840000, 1651532402, 0),
(730, 20, 8, '', 'Interest', '', '', 1, 1, 20000000, 1651532402, 0),
(731, 28, 8, '', 'Interest', '', '', 1, 1, 8000000, 1651532402, 0),
(732, 32, 8, '', 'Interest', '', '', 1, 1, 4000000, 1651532402, 0),
(733, 33, 8, '', 'Interest', '', '', 1, 1, 8000000, 1651532402, 0),
(734, 44, 8, '', 'Interest', '', '', 1, 1, 6400000000, 1651532402, 0);
INSERT INTO `transactions` (`id`, `user_id`, `transaction_type`, `hash`, `note`, `to_address`, `from_address`, `is_addition`, `transaction_status`, `amount`, `timestamp`, `is_fake`) VALUES
(735, 0, 5, 'Not Applied', 'Reward for reporting scam', 'Not Applied', 'Not Applied', 1, 1, 2500, 1651586402, 0),
(736, 0, 5, 'Not Applied', 'Reward for reporting scam', 'Not Applied', 'Not Applied', 1, 1, 2500, 1651674602, 0),
(737, 0, 5, 'Not Applied', 'Reward for reporting scam', 'Not Applied', 'Not Applied', 1, 1, 2500, 1651762803, 0),
(738, 47, 6, '', '', '', '', 1, 1, 1500000000, 1651776734, 0),
(739, 7, 7, '', '', '', '', 1, 1, 150000000, 1651776734, 0),
(740, 3, 7, '', '', '', '', 1, 1, 75000000, 1651776734, 0),
(741, 1, 7, '', '', '', '', 1, 1, 45000000, 1651776734, 0),
(742, 4, 6, '', '', '', '', 1, 1, 200000000, 1651776749, 0),
(743, 3, 7, '', '', '', '', 1, 1, 20000000, 1651776749, 0),
(744, 1, 7, '', '', '', '', 1, 1, 10000000, 1651776749, 0),
(745, 4, 6, '', '', '', '', 1, 1, 140000000, 1651796887, 0),
(746, 3, 7, '', '', '', '', 1, 1, 14000000, 1651796887, 0),
(747, 1, 7, '', '', '', '', 1, 1, 7000000, 1651796887, 0),
(748, 0, 5, 'Not Applied', 'Reward for reporting scam', 'Not Applied', 'Not Applied', 1, 1, 2500, 1651851002, 0),
(749, 4, 6, '', '', '', '', 1, 1, 140000000, 1651861419, 0),
(750, 3, 7, '', '', '', '', 1, 1, 14000000, 1651861419, 0),
(751, 1, 7, '', '', '', '', 1, 1, 7000000, 1651861419, 0),
(752, 4, 6, '', '', '', '', 1, 1, 160000000, 1651884994, 0),
(753, 3, 7, '', '', '', '', 1, 1, 16000000, 1651884994, 0),
(754, 1, 7, '', '', '', '', 1, 1, 8000000, 1651884994, 0),
(755, 0, 5, 'Not Applied', 'Reward for reporting scam', 'Not Applied', 'Not Applied', 1, 1, 2500, 1651939202, 0),
(756, 0, 5, 'Not Applied', 'Reward for reporting scam', 'Not Applied', 'Not Applied', 1, 1, 2500, 1652027402, 0),
(757, 1, 8, '', 'Interest', '', '', 1, 1, 13447680000, 1652054402, 0),
(758, 3, 8, '', 'Interest', '', '', 1, 1, 8000000, 1652054402, 0),
(759, 4, 8, '', 'Interest', '', '', 1, 1, 45600000, 1652054402, 0),
(760, 7, 8, '', 'Interest', '', '', 1, 1, 200000000, 1652054402, 0),
(761, 13, 8, '', 'Interest', '', '', 1, 1, 200000000, 1652054402, 0),
(762, 14, 8, '', 'Interest', '', '', 1, 1, 18320000, 1652054402, 0),
(763, 15, 8, '', 'Interest', '', '', 1, 1, 210840000, 1652054402, 0),
(764, 20, 8, '', 'Interest', '', '', 1, 1, 20000000, 1652054402, 0),
(765, 28, 8, '', 'Interest', '', '', 1, 1, 8000000, 1652054402, 0),
(766, 32, 8, '', 'Interest', '', '', 1, 1, 4000000, 1652054402, 0),
(767, 33, 8, '', 'Interest', '', '', 1, 1, 8000000, 1652054402, 0),
(768, 44, 8, '', 'Interest', '', '', 1, 1, 6400000000, 1652054402, 0),
(769, 47, 8, '', 'Interest', '', '', 1, 1, 60000000, 1652054402, 0),
(770, 1, 8, '', 'Interest', '', '', 1, 1, 13447680000, 1652058003, 0),
(771, 3, 8, '', 'Interest', '', '', 1, 1, 8000000, 1652058003, 0),
(772, 4, 8, '', 'Interest', '', '', 1, 1, 45600000, 1652058003, 0),
(773, 7, 8, '', 'Interest', '', '', 1, 1, 200000000, 1652058003, 0),
(774, 13, 8, '', 'Interest', '', '', 1, 1, 200000000, 1652058003, 0),
(775, 14, 8, '', 'Interest', '', '', 1, 1, 18320000, 1652058003, 0),
(776, 15, 8, '', 'Interest', '', '', 1, 1, 210840000, 1652058003, 0),
(777, 20, 8, '', 'Interest', '', '', 1, 1, 20000000, 1652058003, 0),
(778, 28, 8, '', 'Interest', '', '', 1, 1, 8000000, 1652058003, 0),
(779, 32, 8, '', 'Interest', '', '', 1, 1, 4000000, 1652058003, 0),
(780, 33, 8, '', 'Interest', '', '', 1, 1, 8000000, 1652058003, 0),
(781, 44, 8, '', 'Interest', '', '', 1, 1, 6400000000, 1652058003, 0),
(782, 47, 8, '', 'Interest', '', '', 1, 1, 60000000, 1652058003, 0),
(783, 1, 8, '', 'Interest', '', '', 1, 1, 13447680000, 1652061602, 0),
(784, 3, 8, '', 'Interest', '', '', 1, 1, 8000000, 1652061602, 0),
(785, 4, 8, '', 'Interest', '', '', 1, 1, 45600000, 1652061602, 0),
(786, 7, 8, '', 'Interest', '', '', 1, 1, 200000000, 1652061602, 0),
(787, 13, 8, '', 'Interest', '', '', 1, 1, 200000000, 1652061602, 0),
(788, 14, 8, '', 'Interest', '', '', 1, 1, 18320000, 1652061602, 0),
(789, 15, 8, '', 'Interest', '', '', 1, 1, 210840000, 1652061602, 0),
(790, 20, 8, '', 'Interest', '', '', 1, 1, 20000000, 1652061602, 0),
(791, 28, 8, '', 'Interest', '', '', 1, 1, 8000000, 1652061602, 0),
(792, 32, 8, '', 'Interest', '', '', 1, 1, 4000000, 1652061602, 0),
(793, 33, 8, '', 'Interest', '', '', 1, 1, 8000000, 1652061602, 0),
(794, 44, 8, '', 'Interest', '', '', 1, 1, 6400000000, 1652061602, 0),
(795, 47, 8, '', 'Interest', '', '', 1, 1, 60000000, 1652061602, 0),
(796, 1, 8, '', 'Interest', '', '', 1, 1, 13447680000, 1652065202, 0),
(797, 3, 8, '', 'Interest', '', '', 1, 1, 8000000, 1652065202, 0),
(798, 4, 8, '', 'Interest', '', '', 1, 1, 45600000, 1652065202, 0),
(799, 7, 8, '', 'Interest', '', '', 1, 1, 200000000, 1652065202, 0),
(800, 13, 8, '', 'Interest', '', '', 1, 1, 200000000, 1652065202, 0),
(801, 14, 8, '', 'Interest', '', '', 1, 1, 18320000, 1652065202, 0),
(802, 15, 8, '', 'Interest', '', '', 1, 1, 210840000, 1652065202, 0),
(803, 20, 8, '', 'Interest', '', '', 1, 1, 20000000, 1652065202, 0),
(804, 28, 8, '', 'Interest', '', '', 1, 1, 8000000, 1652065202, 0),
(805, 32, 8, '', 'Interest', '', '', 1, 1, 4000000, 1652065202, 0),
(806, 33, 8, '', 'Interest', '', '', 1, 1, 8000000, 1652065202, 0),
(807, 44, 8, '', 'Interest', '', '', 1, 1, 6400000000, 1652065202, 0),
(808, 47, 8, '', 'Interest', '', '', 1, 1, 60000000, 1652065202, 0),
(809, 4, 6, '', '', '', '', 1, 1, 160000000, 1652066570, 0),
(810, 3, 7, '', '', '', '', 1, 1, 16000000, 1652066570, 0),
(811, 1, 7, '', '', '', '', 1, 1, 8000000, 1652066570, 0),
(812, 1, 8, '', 'Interest', '', '', 1, 1, 13447680000, 1652068802, 0),
(813, 3, 8, '', 'Interest', '', '', 1, 1, 8000000, 1652068802, 0),
(814, 4, 8, '', 'Interest', '', '', 1, 1, 52000000, 1652068802, 0),
(815, 7, 8, '', 'Interest', '', '', 1, 1, 200000000, 1652068802, 0),
(816, 13, 8, '', 'Interest', '', '', 1, 1, 200000000, 1652068802, 0),
(817, 14, 8, '', 'Interest', '', '', 1, 1, 18320000, 1652068802, 0),
(818, 15, 8, '', 'Interest', '', '', 1, 1, 210840000, 1652068802, 0),
(819, 20, 8, '', 'Interest', '', '', 1, 1, 20000000, 1652068802, 0),
(820, 28, 8, '', 'Interest', '', '', 1, 1, 8000000, 1652068802, 0),
(821, 32, 8, '', 'Interest', '', '', 1, 1, 4000000, 1652068802, 0),
(822, 33, 8, '', 'Interest', '', '', 1, 1, 8000000, 1652068802, 0),
(823, 44, 8, '', 'Interest', '', '', 1, 1, 6400000000, 1652068802, 0),
(824, 47, 8, '', 'Interest', '', '', 1, 1, 60000000, 1652068802, 0),
(825, 1, 8, '', 'Interest', '', '', 1, 1, 13447680000, 1652072402, 0),
(826, 3, 8, '', 'Interest', '', '', 1, 1, 8000000, 1652072402, 0),
(827, 4, 8, '', 'Interest', '', '', 1, 1, 52000000, 1652072402, 0),
(828, 7, 8, '', 'Interest', '', '', 1, 1, 200000000, 1652072402, 0),
(829, 13, 8, '', 'Interest', '', '', 1, 1, 200000000, 1652072402, 0),
(830, 14, 8, '', 'Interest', '', '', 1, 1, 18320000, 1652072402, 0),
(831, 15, 8, '', 'Interest', '', '', 1, 1, 210840000, 1652072402, 0),
(832, 20, 8, '', 'Interest', '', '', 1, 1, 20000000, 1652072402, 0),
(833, 28, 8, '', 'Interest', '', '', 1, 1, 8000000, 1652072402, 0),
(834, 32, 8, '', 'Interest', '', '', 1, 1, 4000000, 1652072402, 0),
(835, 33, 8, '', 'Interest', '', '', 1, 1, 8000000, 1652072402, 0),
(836, 44, 8, '', 'Interest', '', '', 1, 1, 6400000000, 1652072402, 0),
(837, 47, 8, '', 'Interest', '', '', 1, 1, 60000000, 1652072402, 0),
(838, 1, 8, '', 'Interest', '', '', 1, 1, 13447680000, 1652076002, 0),
(839, 3, 8, '', 'Interest', '', '', 1, 1, 8000000, 1652076002, 0),
(840, 4, 8, '', 'Interest', '', '', 1, 1, 52000000, 1652076002, 0),
(841, 7, 8, '', 'Interest', '', '', 1, 1, 200000000, 1652076002, 0),
(842, 13, 8, '', 'Interest', '', '', 1, 1, 200000000, 1652076002, 0),
(843, 14, 8, '', 'Interest', '', '', 1, 1, 18320000, 1652076002, 0),
(844, 15, 8, '', 'Interest', '', '', 1, 1, 210840000, 1652076002, 0),
(845, 20, 8, '', 'Interest', '', '', 1, 1, 20000000, 1652076002, 0),
(846, 28, 8, '', 'Interest', '', '', 1, 1, 8000000, 1652076002, 0),
(847, 32, 8, '', 'Interest', '', '', 1, 1, 4000000, 1652076002, 0),
(848, 33, 8, '', 'Interest', '', '', 1, 1, 8000000, 1652076002, 0),
(849, 44, 8, '', 'Interest', '', '', 1, 1, 6400000000, 1652076002, 0),
(850, 47, 8, '', 'Interest', '', '', 1, 1, 60000000, 1652076002, 0),
(851, 1, 8, '', 'Interest', '', '', 1, 1, 13447680000, 1652079608, 0),
(852, 3, 8, '', 'Interest', '', '', 1, 1, 8000000, 1652079608, 0),
(853, 4, 8, '', 'Interest', '', '', 1, 1, 52000000, 1652079608, 0),
(854, 7, 8, '', 'Interest', '', '', 1, 1, 200000000, 1652079608, 0),
(855, 13, 8, '', 'Interest', '', '', 1, 1, 200000000, 1652079608, 0),
(856, 14, 8, '', 'Interest', '', '', 1, 1, 18320000, 1652079608, 0),
(857, 15, 8, '', 'Interest', '', '', 1, 1, 210840000, 1652079608, 0),
(858, 20, 8, '', 'Interest', '', '', 1, 1, 20000000, 1652079608, 0),
(859, 28, 8, '', 'Interest', '', '', 1, 1, 8000000, 1652079608, 0),
(860, 32, 8, '', 'Interest', '', '', 1, 1, 4000000, 1652079608, 0),
(861, 33, 8, '', 'Interest', '', '', 1, 1, 8000000, 1652079608, 0),
(862, 44, 8, '', 'Interest', '', '', 1, 1, 6400000000, 1652079608, 0),
(863, 47, 8, '', 'Interest', '', '', 1, 1, 60000000, 1652079608, 0),
(864, 1, 8, '', 'Interest', '', '', 1, 1, 13447680000, 1652083202, 0),
(865, 3, 8, '', 'Interest', '', '', 1, 1, 8000000, 1652083202, 0),
(866, 4, 8, '', 'Interest', '', '', 1, 1, 52000000, 1652083202, 0),
(867, 7, 8, '', 'Interest', '', '', 1, 1, 200000000, 1652083202, 0),
(868, 13, 8, '', 'Interest', '', '', 1, 1, 200000000, 1652083202, 0),
(869, 14, 8, '', 'Interest', '', '', 1, 1, 18320000, 1652083202, 0),
(870, 15, 8, '', 'Interest', '', '', 1, 1, 210840000, 1652083202, 0),
(871, 20, 8, '', 'Interest', '', '', 1, 1, 20000000, 1652083202, 0),
(872, 28, 8, '', 'Interest', '', '', 1, 1, 8000000, 1652083202, 0),
(873, 32, 8, '', 'Interest', '', '', 1, 1, 4000000, 1652083202, 0),
(874, 33, 8, '', 'Interest', '', '', 1, 1, 8000000, 1652083202, 0),
(875, 44, 8, '', 'Interest', '', '', 1, 1, 6400000000, 1652083202, 0),
(876, 47, 8, '', 'Interest', '', '', 1, 1, 60000000, 1652083202, 0),
(877, 1, 8, '', 'Interest', '', '', 1, 1, 13447680000, 1652086802, 0),
(878, 3, 8, '', 'Interest', '', '', 1, 1, 8000000, 1652086802, 0),
(879, 4, 8, '', 'Interest', '', '', 1, 1, 52000000, 1652086802, 0),
(880, 7, 8, '', 'Interest', '', '', 1, 1, 200000000, 1652086802, 0),
(881, 13, 8, '', 'Interest', '', '', 1, 1, 200000000, 1652086802, 0),
(882, 14, 8, '', 'Interest', '', '', 1, 1, 18320000, 1652086802, 0),
(883, 15, 8, '', 'Interest', '', '', 1, 1, 210840000, 1652086802, 0),
(884, 20, 8, '', 'Interest', '', '', 1, 1, 20000000, 1652086802, 0),
(885, 28, 8, '', 'Interest', '', '', 1, 1, 8000000, 1652086802, 0),
(886, 32, 8, '', 'Interest', '', '', 1, 1, 4000000, 1652086802, 0),
(887, 33, 8, '', 'Interest', '', '', 1, 1, 8000000, 1652086802, 0),
(888, 44, 8, '', 'Interest', '', '', 1, 1, 6400000000, 1652086802, 0),
(889, 47, 8, '', 'Interest', '', '', 1, 1, 60000000, 1652086802, 0),
(890, 1, 8, '', 'Interest', '', '', 1, 1, 13447680000, 1652090402, 0),
(891, 3, 8, '', 'Interest', '', '', 1, 1, 8000000, 1652090402, 0),
(892, 4, 8, '', 'Interest', '', '', 1, 1, 52000000, 1652090402, 0),
(893, 7, 8, '', 'Interest', '', '', 1, 1, 200000000, 1652090402, 0),
(894, 13, 8, '', 'Interest', '', '', 1, 1, 200000000, 1652090402, 0),
(895, 14, 8, '', 'Interest', '', '', 1, 1, 18320000, 1652090402, 0),
(896, 15, 8, '', 'Interest', '', '', 1, 1, 210840000, 1652090402, 0),
(897, 20, 8, '', 'Interest', '', '', 1, 1, 20000000, 1652090402, 0),
(898, 28, 8, '', 'Interest', '', '', 1, 1, 8000000, 1652090402, 0),
(899, 32, 8, '', 'Interest', '', '', 1, 1, 4000000, 1652090402, 0),
(900, 33, 8, '', 'Interest', '', '', 1, 1, 8000000, 1652090402, 0),
(901, 44, 8, '', 'Interest', '', '', 1, 1, 6400000000, 1652090402, 0),
(902, 47, 8, '', 'Interest', '', '', 1, 1, 60000000, 1652090402, 0),
(903, 1, 8, '', 'Interest', '', '', 1, 1, 13447680000, 1652094002, 0),
(904, 3, 8, '', 'Interest', '', '', 1, 1, 8000000, 1652094002, 0),
(905, 4, 8, '', 'Interest', '', '', 1, 1, 52000000, 1652094002, 0),
(906, 7, 8, '', 'Interest', '', '', 1, 1, 200000000, 1652094002, 0),
(907, 13, 8, '', 'Interest', '', '', 1, 1, 200000000, 1652094002, 0),
(908, 14, 8, '', 'Interest', '', '', 1, 1, 18320000, 1652094002, 0),
(909, 15, 8, '', 'Interest', '', '', 1, 1, 210840000, 1652094002, 0),
(910, 20, 8, '', 'Interest', '', '', 1, 1, 20000000, 1652094002, 0),
(911, 28, 8, '', 'Interest', '', '', 1, 1, 8000000, 1652094002, 0),
(912, 32, 8, '', 'Interest', '', '', 1, 1, 4000000, 1652094002, 0),
(913, 33, 8, '', 'Interest', '', '', 1, 1, 8000000, 1652094002, 0),
(914, 44, 8, '', 'Interest', '', '', 1, 1, 6400000000, 1652094002, 0),
(915, 47, 8, '', 'Interest', '', '', 1, 1, 60000000, 1652094002, 0),
(916, 1, 8, '', 'Interest', '', '', 1, 1, 13447680000, 1652097601, 0),
(917, 3, 8, '', 'Interest', '', '', 1, 1, 8000000, 1652097601, 0),
(918, 4, 8, '', 'Interest', '', '', 1, 1, 52000000, 1652097601, 0),
(919, 7, 8, '', 'Interest', '', '', 1, 1, 200000000, 1652097602, 0),
(920, 13, 8, '', 'Interest', '', '', 1, 1, 200000000, 1652097602, 0),
(921, 14, 8, '', 'Interest', '', '', 1, 1, 18320000, 1652097602, 0),
(922, 15, 8, '', 'Interest', '', '', 1, 1, 210840000, 1652097602, 0),
(923, 20, 8, '', 'Interest', '', '', 1, 1, 20000000, 1652097602, 0),
(924, 28, 8, '', 'Interest', '', '', 1, 1, 8000000, 1652097602, 0),
(925, 32, 8, '', 'Interest', '', '', 1, 1, 4000000, 1652097602, 0),
(926, 33, 8, '', 'Interest', '', '', 1, 1, 8000000, 1652097602, 0),
(927, 44, 8, '', 'Interest', '', '', 1, 1, 6400000000, 1652097602, 0),
(928, 47, 8, '', 'Interest', '', '', 1, 1, 60000000, 1652097602, 0),
(929, 1, 8, '', 'Interest', '', '', 1, 1, 13447680000, 1652101203, 0),
(930, 3, 8, '', 'Interest', '', '', 1, 1, 8000000, 1652101203, 0),
(931, 4, 8, '', 'Interest', '', '', 1, 1, 52000000, 1652101203, 0),
(932, 7, 8, '', 'Interest', '', '', 1, 1, 200000000, 1652101203, 0),
(933, 13, 8, '', 'Interest', '', '', 1, 1, 200000000, 1652101203, 0),
(934, 14, 8, '', 'Interest', '', '', 1, 1, 18320000, 1652101203, 0),
(935, 15, 8, '', 'Interest', '', '', 1, 1, 210840000, 1652101203, 0),
(936, 20, 8, '', 'Interest', '', '', 1, 1, 20000000, 1652101203, 0),
(937, 28, 8, '', 'Interest', '', '', 1, 1, 8000000, 1652101203, 0),
(938, 32, 8, '', 'Interest', '', '', 1, 1, 4000000, 1652101203, 0),
(939, 33, 8, '', 'Interest', '', '', 1, 1, 8000000, 1652101203, 0),
(940, 44, 8, '', 'Interest', '', '', 1, 1, 6400000000, 1652101203, 0),
(941, 47, 8, '', 'Interest', '', '', 1, 1, 60000000, 1652101203, 0),
(942, 1, 8, '', 'Interest', '', '', 1, 1, 13447680000, 1652104802, 0),
(943, 3, 8, '', 'Interest', '', '', 1, 1, 8000000, 1652104802, 0),
(944, 4, 8, '', 'Interest', '', '', 1, 1, 52000000, 1652104802, 0),
(945, 7, 8, '', 'Interest', '', '', 1, 1, 200000000, 1652104802, 0),
(946, 13, 8, '', 'Interest', '', '', 1, 1, 200000000, 1652104802, 0),
(947, 14, 8, '', 'Interest', '', '', 1, 1, 18320000, 1652104802, 0),
(948, 15, 8, '', 'Interest', '', '', 1, 1, 210840000, 1652104802, 0),
(949, 20, 8, '', 'Interest', '', '', 1, 1, 20000000, 1652104802, 0),
(950, 28, 8, '', 'Interest', '', '', 1, 1, 8000000, 1652104802, 0),
(951, 32, 8, '', 'Interest', '', '', 1, 1, 4000000, 1652104802, 0),
(952, 33, 8, '', 'Interest', '', '', 1, 1, 8000000, 1652104802, 0),
(953, 44, 8, '', 'Interest', '', '', 1, 1, 6400000000, 1652104802, 0),
(954, 47, 8, '', 'Interest', '', '', 1, 1, 60000000, 1652104802, 0),
(955, 1, 8, '', 'Interest', '', '', 1, 1, 13447680000, 1652108402, 0),
(956, 3, 8, '', 'Interest', '', '', 1, 1, 8000000, 1652108402, 0),
(957, 4, 8, '', 'Interest', '', '', 1, 1, 52000000, 1652108402, 0),
(958, 7, 8, '', 'Interest', '', '', 1, 1, 200000000, 1652108402, 0),
(959, 13, 8, '', 'Interest', '', '', 1, 1, 200000000, 1652108402, 0),
(960, 14, 8, '', 'Interest', '', '', 1, 1, 18320000, 1652108402, 0),
(961, 15, 8, '', 'Interest', '', '', 1, 1, 210840000, 1652108402, 0),
(962, 20, 8, '', 'Interest', '', '', 1, 1, 20000000, 1652108402, 0),
(963, 28, 8, '', 'Interest', '', '', 1, 1, 8000000, 1652108402, 0),
(964, 32, 8, '', 'Interest', '', '', 1, 1, 4000000, 1652108402, 0),
(965, 33, 8, '', 'Interest', '', '', 1, 1, 8000000, 1652108402, 0),
(966, 44, 8, '', 'Interest', '', '', 1, 1, 6400000000, 1652108402, 0),
(967, 47, 8, '', 'Interest', '', '', 1, 1, 60000000, 1652108402, 0),
(968, 1, 8, '', 'Interest', '', '', 1, 1, 13447680000, 1652112002, 0),
(969, 3, 8, '', 'Interest', '', '', 1, 1, 8000000, 1652112002, 0),
(970, 4, 8, '', 'Interest', '', '', 1, 1, 52000000, 1652112002, 0),
(971, 7, 8, '', 'Interest', '', '', 1, 1, 200000000, 1652112002, 0),
(972, 13, 8, '', 'Interest', '', '', 1, 1, 200000000, 1652112002, 0),
(973, 14, 8, '', 'Interest', '', '', 1, 1, 18320000, 1652112002, 0),
(974, 15, 8, '', 'Interest', '', '', 1, 1, 210840000, 1652112002, 0),
(975, 20, 8, '', 'Interest', '', '', 1, 1, 20000000, 1652112002, 0),
(976, 28, 8, '', 'Interest', '', '', 1, 1, 8000000, 1652112002, 0),
(977, 32, 8, '', 'Interest', '', '', 1, 1, 4000000, 1652112002, 0),
(978, 33, 8, '', 'Interest', '', '', 1, 1, 8000000, 1652112002, 0),
(979, 44, 8, '', 'Interest', '', '', 1, 1, 6400000000, 1652112002, 0),
(980, 47, 8, '', 'Interest', '', '', 1, 1, 60000000, 1652112002, 0),
(981, 1, 8, '', 'Interest', '', '', 1, 1, 13447680000, 1652115602, 0),
(982, 3, 8, '', 'Interest', '', '', 1, 1, 8000000, 1652115602, 0),
(983, 4, 8, '', 'Interest', '', '', 1, 1, 52000000, 1652115602, 0),
(984, 7, 8, '', 'Interest', '', '', 1, 1, 200000000, 1652115602, 0),
(985, 13, 8, '', 'Interest', '', '', 1, 1, 200000000, 1652115602, 0),
(986, 14, 8, '', 'Interest', '', '', 1, 1, 18320000, 1652115602, 0),
(987, 15, 8, '', 'Interest', '', '', 1, 1, 210840000, 1652115602, 0),
(988, 20, 8, '', 'Interest', '', '', 1, 1, 20000000, 1652115602, 0),
(989, 28, 8, '', 'Interest', '', '', 1, 1, 8000000, 1652115602, 0),
(990, 32, 8, '', 'Interest', '', '', 1, 1, 4000000, 1652115602, 0),
(991, 33, 8, '', 'Interest', '', '', 1, 1, 8000000, 1652115602, 0),
(992, 44, 8, '', 'Interest', '', '', 1, 1, 6400000000, 1652115602, 0),
(993, 47, 8, '', 'Interest', '', '', 1, 1, 60000000, 1652115602, 0),
(994, 0, 5, 'Not Applied', 'Reward for reporting scam', 'Not Applied', 'Not Applied', 1, 1, 2500, 1652115602, 0),
(995, 1, 8, '', 'Interest', '', '', 1, 1, 13447680000, 1652119202, 0),
(996, 3, 8, '', 'Interest', '', '', 1, 1, 8000000, 1652119202, 0),
(997, 4, 8, '', 'Interest', '', '', 1, 1, 52000000, 1652119202, 0),
(998, 7, 8, '', 'Interest', '', '', 1, 1, 200000000, 1652119202, 0),
(999, 13, 8, '', 'Interest', '', '', 1, 1, 200000000, 1652119202, 0),
(1000, 14, 8, '', 'Interest', '', '', 1, 1, 18320000, 1652119202, 0),
(1001, 15, 8, '', 'Interest', '', '', 1, 1, 210840000, 1652119202, 0),
(1002, 20, 8, '', 'Interest', '', '', 1, 1, 20000000, 1652119202, 0),
(1003, 28, 8, '', 'Interest', '', '', 1, 1, 8000000, 1652119202, 0),
(1004, 32, 8, '', 'Interest', '', '', 1, 1, 4000000, 1652119202, 0),
(1005, 33, 8, '', 'Interest', '', '', 1, 1, 8000000, 1652119202, 0),
(1006, 44, 8, '', 'Interest', '', '', 1, 1, 6400000000, 1652119202, 0),
(1007, 47, 8, '', 'Interest', '', '', 1, 1, 60000000, 1652119202, 0),
(1008, 1, 8, '', 'Interest', '', '', 1, 1, 13447680000, 1652122802, 0),
(1009, 3, 8, '', 'Interest', '', '', 1, 1, 8000000, 1652122802, 0),
(1010, 4, 8, '', 'Interest', '', '', 1, 1, 52000000, 1652122802, 0),
(1011, 7, 8, '', 'Interest', '', '', 1, 1, 200000000, 1652122802, 0),
(1012, 13, 8, '', 'Interest', '', '', 1, 1, 200000000, 1652122802, 0),
(1013, 14, 8, '', 'Interest', '', '', 1, 1, 18320000, 1652122802, 0),
(1014, 15, 8, '', 'Interest', '', '', 1, 1, 210840000, 1652122802, 0),
(1015, 20, 8, '', 'Interest', '', '', 1, 1, 20000000, 1652122802, 0),
(1016, 28, 8, '', 'Interest', '', '', 1, 1, 8000000, 1652122802, 0),
(1017, 32, 8, '', 'Interest', '', '', 1, 1, 4000000, 1652122802, 0),
(1018, 33, 8, '', 'Interest', '', '', 1, 1, 8000000, 1652122802, 0),
(1019, 44, 8, '', 'Interest', '', '', 1, 1, 6400000000, 1652122802, 0),
(1020, 47, 8, '', 'Interest', '', '', 1, 1, 60000000, 1652122802, 0),
(1021, 1, 8, '', 'Interest', '', '', 1, 1, 13447680000, 1652126403, 0),
(1022, 3, 8, '', 'Interest', '', '', 1, 1, 8000000, 1652126403, 0),
(1023, 4, 8, '', 'Interest', '', '', 1, 1, 52000000, 1652126403, 0),
(1024, 7, 8, '', 'Interest', '', '', 1, 1, 200000000, 1652126403, 0),
(1025, 13, 8, '', 'Interest', '', '', 1, 1, 200000000, 1652126403, 0),
(1026, 14, 8, '', 'Interest', '', '', 1, 1, 18320000, 1652126403, 0),
(1027, 15, 8, '', 'Interest', '', '', 1, 1, 210840000, 1652126403, 0),
(1028, 20, 8, '', 'Interest', '', '', 1, 1, 20000000, 1652126403, 0),
(1029, 28, 8, '', 'Interest', '', '', 1, 1, 8000000, 1652126403, 0),
(1030, 32, 8, '', 'Interest', '', '', 1, 1, 4000000, 1652126403, 0),
(1031, 33, 8, '', 'Interest', '', '', 1, 1, 8000000, 1652126403, 0),
(1032, 44, 8, '', 'Interest', '', '', 1, 1, 6400000000, 1652126403, 0),
(1033, 47, 8, '', 'Interest', '', '', 1, 1, 60000000, 1652126403, 0),
(1034, 1, 8, '', 'Interest', '', '', 1, 1, 13447680000, 1652130002, 0),
(1035, 3, 8, '', 'Interest', '', '', 1, 1, 8000000, 1652130002, 0),
(1036, 4, 8, '', 'Interest', '', '', 1, 1, 52000000, 1652130002, 0),
(1037, 7, 8, '', 'Interest', '', '', 1, 1, 200000000, 1652130002, 0),
(1038, 13, 8, '', 'Interest', '', '', 1, 1, 200000000, 1652130002, 0),
(1039, 14, 8, '', 'Interest', '', '', 1, 1, 18320000, 1652130002, 0),
(1040, 15, 8, '', 'Interest', '', '', 1, 1, 210840000, 1652130002, 0),
(1041, 20, 8, '', 'Interest', '', '', 1, 1, 20000000, 1652130002, 0),
(1042, 28, 8, '', 'Interest', '', '', 1, 1, 8000000, 1652130002, 0),
(1043, 32, 8, '', 'Interest', '', '', 1, 1, 4000000, 1652130002, 0),
(1044, 33, 8, '', 'Interest', '', '', 1, 1, 8000000, 1652130002, 0),
(1045, 44, 8, '', 'Interest', '', '', 1, 1, 6400000000, 1652130002, 0),
(1046, 47, 8, '', 'Interest', '', '', 1, 1, 60000000, 1652130002, 0),
(1047, 1, 8, '', 'Interest', '', '', 1, 1, 13447680000, 1652133603, 0),
(1048, 3, 8, '', 'Interest', '', '', 1, 1, 8000000, 1652133603, 0),
(1049, 4, 8, '', 'Interest', '', '', 1, 1, 52000000, 1652133603, 0),
(1050, 7, 8, '', 'Interest', '', '', 1, 1, 200000000, 1652133603, 0),
(1051, 13, 8, '', 'Interest', '', '', 1, 1, 200000000, 1652133603, 0),
(1052, 14, 8, '', 'Interest', '', '', 1, 1, 18320000, 1652133603, 0),
(1053, 15, 8, '', 'Interest', '', '', 1, 1, 210840000, 1652133603, 0),
(1054, 20, 8, '', 'Interest', '', '', 1, 1, 20000000, 1652133603, 0),
(1055, 28, 8, '', 'Interest', '', '', 1, 1, 8000000, 1652133603, 0),
(1056, 32, 8, '', 'Interest', '', '', 1, 1, 4000000, 1652133603, 0),
(1057, 33, 8, '', 'Interest', '', '', 1, 1, 8000000, 1652133603, 0),
(1058, 44, 8, '', 'Interest', '', '', 1, 1, 6400000000, 1652133603, 0),
(1059, 47, 8, '', 'Interest', '', '', 1, 1, 60000000, 1652133603, 0),
(1060, 1, 8, '', 'Interest', '', '', 1, 1, 13447680000, 1652137203, 0),
(1061, 3, 8, '', 'Interest', '', '', 1, 1, 8000000, 1652137203, 0),
(1062, 4, 8, '', 'Interest', '', '', 1, 1, 52000000, 1652137203, 0),
(1063, 7, 8, '', 'Interest', '', '', 1, 1, 200000000, 1652137203, 0),
(1064, 13, 8, '', 'Interest', '', '', 1, 1, 200000000, 1652137203, 0),
(1065, 14, 8, '', 'Interest', '', '', 1, 1, 18320000, 1652137203, 0),
(1066, 15, 8, '', 'Interest', '', '', 1, 1, 210840000, 1652137203, 0),
(1067, 20, 8, '', 'Interest', '', '', 1, 1, 20000000, 1652137203, 0),
(1068, 28, 8, '', 'Interest', '', '', 1, 1, 8000000, 1652137203, 0),
(1069, 32, 8, '', 'Interest', '', '', 1, 1, 4000000, 1652137203, 0),
(1070, 33, 8, '', 'Interest', '', '', 1, 1, 8000000, 1652137203, 0),
(1071, 44, 8, '', 'Interest', '', '', 1, 1, 6400000000, 1652137203, 0),
(1072, 47, 8, '', 'Interest', '', '', 1, 1, 60000000, 1652137203, 0),
(1073, 0, 5, 'Not Applied', 'Reward for reporting scam', 'Not Applied', 'Not Applied', 1, 1, 2500, 1652203802, 0),
(1074, 0, 5, 'Not Applied', 'Reward for reporting scam', 'Not Applied', 'Not Applied', 1, 1, 2500, 1652292002, 0),
(1075, 0, 5, 'Not Applied', 'Reward for reporting scam', 'Not Applied', 'Not Applied', 1, 1, 2500, 1652378403, 0),
(1076, 0, 5, 'Not Applied', 'Reward for reporting scam', 'Not Applied', 'Not Applied', 1, 1, 2500, 1652466603, 0),
(1077, 0, 5, 'Not Applied', 'Reward for reporting scam', 'Not Applied', 'Not Applied', 1, 1, 2500, 1652554801, 0),
(1078, 0, 5, 'Not Applied', 'Reward for reporting scam', 'Not Applied', 'Not Applied', 1, 1, 2500, 1652641202, 0),
(1079, 1, 8, '', 'Interest', '', '', 1, 1, 13447680000, 1652659201, 0),
(1080, 3, 8, '', 'Interest', '', '', 1, 1, 8000000, 1652659201, 0),
(1081, 4, 8, '', 'Interest', '', '', 1, 1, 52000000, 1652659201, 0),
(1082, 7, 8, '', 'Interest', '', '', 1, 1, 200000000, 1652659201, 0),
(1083, 13, 8, '', 'Interest', '', '', 1, 1, 200000000, 1652659201, 0),
(1084, 14, 8, '', 'Interest', '', '', 1, 1, 18320000, 1652659201, 0),
(1085, 15, 8, '', 'Interest', '', '', 1, 1, 210840000, 1652659201, 0),
(1086, 20, 8, '', 'Interest', '', '', 1, 1, 20000000, 1652659201, 0),
(1087, 28, 8, '', 'Interest', '', '', 1, 1, 8000000, 1652659201, 0),
(1088, 32, 8, '', 'Interest', '', '', 1, 1, 4000000, 1652659201, 0),
(1089, 33, 8, '', 'Interest', '', '', 1, 1, 8000000, 1652659201, 0),
(1090, 44, 8, '', 'Interest', '', '', 1, 1, 6400000000, 1652659201, 0),
(1091, 47, 8, '', 'Interest', '', '', 1, 1, 60000000, 1652659201, 0),
(1092, 1, 8, '', 'Interest', '', '', 1, 1, 13447680000, 1652662802, 0),
(1093, 3, 8, '', 'Interest', '', '', 1, 1, 8000000, 1652662802, 0),
(1094, 4, 8, '', 'Interest', '', '', 1, 1, 52000000, 1652662802, 0),
(1095, 7, 8, '', 'Interest', '', '', 1, 1, 200000000, 1652662802, 0),
(1096, 13, 8, '', 'Interest', '', '', 1, 1, 200000000, 1652662802, 0),
(1097, 14, 8, '', 'Interest', '', '', 1, 1, 18320000, 1652662802, 0),
(1098, 15, 8, '', 'Interest', '', '', 1, 1, 210840000, 1652662802, 0),
(1099, 20, 8, '', 'Interest', '', '', 1, 1, 20000000, 1652662802, 0),
(1100, 28, 8, '', 'Interest', '', '', 1, 1, 8000000, 1652662802, 0),
(1101, 32, 8, '', 'Interest', '', '', 1, 1, 4000000, 1652662802, 0),
(1102, 33, 8, '', 'Interest', '', '', 1, 1, 8000000, 1652662802, 0),
(1103, 44, 8, '', 'Interest', '', '', 1, 1, 6400000000, 1652662802, 0),
(1104, 47, 8, '', 'Interest', '', '', 1, 1, 60000000, 1652662802, 0),
(1105, 1, 8, '', 'Interest', '', '', 1, 1, 13447680000, 1652666402, 0),
(1106, 3, 8, '', 'Interest', '', '', 1, 1, 8000000, 1652666402, 0),
(1107, 4, 8, '', 'Interest', '', '', 1, 1, 52000000, 1652666402, 0),
(1108, 7, 8, '', 'Interest', '', '', 1, 1, 200000000, 1652666402, 0),
(1109, 13, 8, '', 'Interest', '', '', 1, 1, 200000000, 1652666402, 0),
(1110, 14, 8, '', 'Interest', '', '', 1, 1, 18320000, 1652666402, 0),
(1111, 15, 8, '', 'Interest', '', '', 1, 1, 210840000, 1652666402, 0),
(1112, 20, 8, '', 'Interest', '', '', 1, 1, 20000000, 1652666402, 0),
(1113, 28, 8, '', 'Interest', '', '', 1, 1, 8000000, 1652666402, 0),
(1114, 32, 8, '', 'Interest', '', '', 1, 1, 4000000, 1652666402, 0),
(1115, 33, 8, '', 'Interest', '', '', 1, 1, 8000000, 1652666402, 0),
(1116, 44, 8, '', 'Interest', '', '', 1, 1, 6400000000, 1652666402, 0),
(1117, 47, 8, '', 'Interest', '', '', 1, 1, 60000000, 1652666402, 0),
(1118, 1, 8, '', 'Interest', '', '', 1, 1, 13447680000, 1652670002, 0),
(1119, 3, 8, '', 'Interest', '', '', 1, 1, 8000000, 1652670002, 0),
(1120, 4, 8, '', 'Interest', '', '', 1, 1, 52000000, 1652670002, 0),
(1121, 7, 8, '', 'Interest', '', '', 1, 1, 200000000, 1652670002, 0),
(1122, 13, 8, '', 'Interest', '', '', 1, 1, 200000000, 1652670002, 0),
(1123, 14, 8, '', 'Interest', '', '', 1, 1, 18320000, 1652670002, 0),
(1124, 15, 8, '', 'Interest', '', '', 1, 1, 210840000, 1652670002, 0),
(1125, 20, 8, '', 'Interest', '', '', 1, 1, 20000000, 1652670002, 0),
(1126, 28, 8, '', 'Interest', '', '', 1, 1, 8000000, 1652670002, 0),
(1127, 32, 8, '', 'Interest', '', '', 1, 1, 4000000, 1652670002, 0),
(1128, 33, 8, '', 'Interest', '', '', 1, 1, 8000000, 1652670003, 0),
(1129, 44, 8, '', 'Interest', '', '', 1, 1, 6400000000, 1652670003, 0),
(1130, 47, 8, '', 'Interest', '', '', 1, 1, 60000000, 1652670003, 0),
(1131, 1, 8, '', 'Interest', '', '', 1, 1, 13447680000, 1652673602, 0),
(1132, 3, 8, '', 'Interest', '', '', 1, 1, 8000000, 1652673602, 0),
(1133, 4, 8, '', 'Interest', '', '', 1, 1, 52000000, 1652673602, 0),
(1134, 7, 8, '', 'Interest', '', '', 1, 1, 200000000, 1652673602, 0),
(1135, 13, 8, '', 'Interest', '', '', 1, 1, 200000000, 1652673602, 0),
(1136, 14, 8, '', 'Interest', '', '', 1, 1, 18320000, 1652673602, 0),
(1137, 15, 8, '', 'Interest', '', '', 1, 1, 210840000, 1652673602, 0),
(1138, 20, 8, '', 'Interest', '', '', 1, 1, 20000000, 1652673602, 0),
(1139, 28, 8, '', 'Interest', '', '', 1, 1, 8000000, 1652673602, 0),
(1140, 32, 8, '', 'Interest', '', '', 1, 1, 4000000, 1652673602, 0),
(1141, 33, 8, '', 'Interest', '', '', 1, 1, 8000000, 1652673602, 0),
(1142, 44, 8, '', 'Interest', '', '', 1, 1, 6400000000, 1652673602, 0),
(1143, 47, 8, '', 'Interest', '', '', 1, 1, 60000000, 1652673602, 0),
(1144, 1, 8, '', 'Interest', '', '', 1, 1, 13447680000, 1652677202, 0),
(1145, 3, 8, '', 'Interest', '', '', 1, 1, 8000000, 1652677202, 0),
(1146, 4, 8, '', 'Interest', '', '', 1, 1, 52000000, 1652677202, 0),
(1147, 7, 8, '', 'Interest', '', '', 1, 1, 200000000, 1652677202, 0),
(1148, 13, 8, '', 'Interest', '', '', 1, 1, 200000000, 1652677202, 0),
(1149, 14, 8, '', 'Interest', '', '', 1, 1, 18320000, 1652677202, 0),
(1150, 15, 8, '', 'Interest', '', '', 1, 1, 210840000, 1652677202, 0),
(1151, 20, 8, '', 'Interest', '', '', 1, 1, 20000000, 1652677202, 0),
(1152, 28, 8, '', 'Interest', '', '', 1, 1, 8000000, 1652677202, 0),
(1153, 32, 8, '', 'Interest', '', '', 1, 1, 4000000, 1652677202, 0),
(1154, 33, 8, '', 'Interest', '', '', 1, 1, 8000000, 1652677202, 0),
(1155, 44, 8, '', 'Interest', '', '', 1, 1, 6400000000, 1652677202, 0),
(1156, 47, 8, '', 'Interest', '', '', 1, 1, 60000000, 1652677202, 0),
(1157, 1, 8, '', 'Interest', '', '', 1, 1, 13447680000, 1652680803, 0),
(1158, 3, 8, '', 'Interest', '', '', 1, 1, 8000000, 1652680803, 0),
(1159, 4, 8, '', 'Interest', '', '', 1, 1, 52000000, 1652680803, 0),
(1160, 7, 8, '', 'Interest', '', '', 1, 1, 200000000, 1652680803, 0),
(1161, 13, 8, '', 'Interest', '', '', 1, 1, 200000000, 1652680803, 0),
(1162, 14, 8, '', 'Interest', '', '', 1, 1, 18320000, 1652680803, 0),
(1163, 15, 8, '', 'Interest', '', '', 1, 1, 210840000, 1652680803, 0),
(1164, 20, 8, '', 'Interest', '', '', 1, 1, 20000000, 1652680803, 0),
(1165, 28, 8, '', 'Interest', '', '', 1, 1, 8000000, 1652680803, 0),
(1166, 32, 8, '', 'Interest', '', '', 1, 1, 4000000, 1652680803, 0),
(1167, 33, 8, '', 'Interest', '', '', 1, 1, 8000000, 1652680803, 0),
(1168, 44, 8, '', 'Interest', '', '', 1, 1, 6400000000, 1652680803, 0),
(1169, 47, 8, '', 'Interest', '', '', 1, 1, 60000000, 1652680803, 0),
(1170, 1, 8, '', 'Interest', '', '', 1, 1, 13447680000, 1652684402, 0),
(1171, 3, 8, '', 'Interest', '', '', 1, 1, 8000000, 1652684402, 0),
(1172, 4, 8, '', 'Interest', '', '', 1, 1, 52000000, 1652684402, 0),
(1173, 7, 8, '', 'Interest', '', '', 1, 1, 200000000, 1652684402, 0),
(1174, 13, 8, '', 'Interest', '', '', 1, 1, 200000000, 1652684402, 0),
(1175, 14, 8, '', 'Interest', '', '', 1, 1, 18320000, 1652684402, 0),
(1176, 15, 8, '', 'Interest', '', '', 1, 1, 210840000, 1652684402, 0),
(1177, 20, 8, '', 'Interest', '', '', 1, 1, 20000000, 1652684402, 0),
(1178, 28, 8, '', 'Interest', '', '', 1, 1, 8000000, 1652684402, 0),
(1179, 32, 8, '', 'Interest', '', '', 1, 1, 4000000, 1652684402, 0),
(1180, 33, 8, '', 'Interest', '', '', 1, 1, 8000000, 1652684402, 0),
(1181, 44, 8, '', 'Interest', '', '', 1, 1, 6400000000, 1652684402, 0),
(1182, 47, 8, '', 'Interest', '', '', 1, 1, 60000000, 1652684402, 0),
(1183, 1, 8, '', 'Interest', '', '', 1, 1, 13447680000, 1652688003, 0),
(1184, 3, 8, '', 'Interest', '', '', 1, 1, 8000000, 1652688003, 0),
(1185, 4, 8, '', 'Interest', '', '', 1, 1, 52000000, 1652688003, 0),
(1186, 7, 8, '', 'Interest', '', '', 1, 1, 200000000, 1652688003, 0),
(1187, 13, 8, '', 'Interest', '', '', 1, 1, 200000000, 1652688003, 0),
(1188, 14, 8, '', 'Interest', '', '', 1, 1, 18320000, 1652688003, 0),
(1189, 15, 8, '', 'Interest', '', '', 1, 1, 210840000, 1652688003, 0),
(1190, 20, 8, '', 'Interest', '', '', 1, 1, 20000000, 1652688003, 0),
(1191, 28, 8, '', 'Interest', '', '', 1, 1, 8000000, 1652688003, 0),
(1192, 32, 8, '', 'Interest', '', '', 1, 1, 4000000, 1652688003, 0),
(1193, 33, 8, '', 'Interest', '', '', 1, 1, 8000000, 1652688003, 0),
(1194, 44, 8, '', 'Interest', '', '', 1, 1, 6400000000, 1652688003, 0),
(1195, 47, 8, '', 'Interest', '', '', 1, 1, 60000000, 1652688003, 0),
(1196, 1, 8, '', 'Interest', '', '', 1, 1, 13447680000, 1652691602, 0),
(1197, 3, 8, '', 'Interest', '', '', 1, 1, 8000000, 1652691602, 0),
(1198, 4, 8, '', 'Interest', '', '', 1, 1, 52000000, 1652691602, 0),
(1199, 7, 8, '', 'Interest', '', '', 1, 1, 200000000, 1652691602, 0),
(1200, 13, 8, '', 'Interest', '', '', 1, 1, 200000000, 1652691602, 0),
(1201, 14, 8, '', 'Interest', '', '', 1, 1, 18320000, 1652691602, 0),
(1202, 15, 8, '', 'Interest', '', '', 1, 1, 210840000, 1652691602, 0),
(1203, 20, 8, '', 'Interest', '', '', 1, 1, 20000000, 1652691602, 0),
(1204, 28, 8, '', 'Interest', '', '', 1, 1, 8000000, 1652691602, 0),
(1205, 32, 8, '', 'Interest', '', '', 1, 1, 4000000, 1652691602, 0),
(1206, 33, 8, '', 'Interest', '', '', 1, 1, 8000000, 1652691602, 0),
(1207, 44, 8, '', 'Interest', '', '', 1, 1, 6400000000, 1652691602, 0),
(1208, 47, 8, '', 'Interest', '', '', 1, 1, 60000000, 1652691602, 0),
(1209, 12, 6, '', '', '', '', 1, 1, 100000000, 1652694713, 0),
(1210, 3, 7, '', '', '', '', 1, 1, 10000000, 1652694713, 0),
(1211, 1, 7, '', '', '', '', 1, 1, 5000000, 1652694713, 0),
(1212, 1, 6, '', '', '', '', 1, 1, 234000000000, 1652694846, 0),
(1213, 1, 8, '', 'Interest', '', '', 1, 1, 22807680000, 1652695202, 0),
(1214, 3, 8, '', 'Interest', '', '', 1, 1, 8000000, 1652695202, 0),
(1215, 4, 8, '', 'Interest', '', '', 1, 1, 52000000, 1652695202, 0),
(1216, 7, 8, '', 'Interest', '', '', 1, 1, 200000000, 1652695202, 0),
(1217, 12, 8, '', 'Interest', '', '', 1, 1, 4000000, 1652695202, 0),
(1218, 13, 8, '', 'Interest', '', '', 1, 1, 200000000, 1652695202, 0),
(1219, 14, 8, '', 'Interest', '', '', 1, 1, 18320000, 1652695203, 0),
(1220, 15, 8, '', 'Interest', '', '', 1, 1, 210840000, 1652695203, 0),
(1221, 20, 8, '', 'Interest', '', '', 1, 1, 20000000, 1652695203, 0),
(1222, 28, 8, '', 'Interest', '', '', 1, 1, 8000000, 1652695203, 0),
(1223, 32, 8, '', 'Interest', '', '', 1, 1, 4000000, 1652695203, 0),
(1224, 33, 8, '', 'Interest', '', '', 1, 1, 8000000, 1652695203, 0),
(1225, 44, 8, '', 'Interest', '', '', 1, 1, 6400000000, 1652695203, 0),
(1226, 47, 8, '', 'Interest', '', '', 1, 1, 60000000, 1652695203, 0),
(1227, 52, 6, '', '', '', '', 1, 1, 345000000000, 1652695304, 0),
(1228, 1, 7, '', '', '', '', 1, 1, 34500000000, 1652695304, 0),
(1229, 1, 8, '', 'Interest', '', '', 1, 1, 22807680000, 1652698802, 0),
(1230, 3, 8, '', 'Interest', '', '', 1, 1, 8000000, 1652698802, 0),
(1231, 4, 8, '', 'Interest', '', '', 1, 1, 52000000, 1652698802, 0),
(1232, 7, 8, '', 'Interest', '', '', 1, 1, 200000000, 1652698802, 0),
(1233, 12, 8, '', 'Interest', '', '', 1, 1, 4000000, 1652698802, 0),
(1234, 13, 8, '', 'Interest', '', '', 1, 1, 200000000, 1652698802, 0),
(1235, 14, 8, '', 'Interest', '', '', 1, 1, 18320000, 1652698802, 0),
(1236, 15, 8, '', 'Interest', '', '', 1, 1, 210840000, 1652698802, 0),
(1237, 20, 8, '', 'Interest', '', '', 1, 1, 20000000, 1652698802, 0),
(1238, 28, 8, '', 'Interest', '', '', 1, 1, 8000000, 1652698802, 0),
(1239, 32, 8, '', 'Interest', '', '', 1, 1, 4000000, 1652698802, 0),
(1240, 33, 8, '', 'Interest', '', '', 1, 1, 8000000, 1652698802, 0),
(1241, 44, 8, '', 'Interest', '', '', 1, 1, 6400000000, 1652698802, 0),
(1242, 47, 8, '', 'Interest', '', '', 1, 1, 60000000, 1652698802, 0),
(1243, 52, 8, '', 'Interest', '', '', 1, 1, 13800000000, 1652698802, 0),
(1244, 53, 6, '', '', '', '', 1, 1, 34000000000, 1652701603, 0),
(1245, 52, 7, '', '', '', '', 1, 1, 3400000000, 1652701603, 0),
(1246, 1, 7, '', '', '', '', 1, 1, 1700000000, 1652701603, 0),
(1247, 1, 8, '', 'Interest', '', '', 1, 1, 22807680000, 1652702402, 0),
(1248, 3, 8, '', 'Interest', '', '', 1, 1, 8000000, 1652702402, 0),
(1249, 4, 8, '', 'Interest', '', '', 1, 1, 52000000, 1652702402, 0),
(1250, 7, 8, '', 'Interest', '', '', 1, 1, 200000000, 1652702402, 0),
(1251, 12, 8, '', 'Interest', '', '', 1, 1, 4000000, 1652702402, 0),
(1252, 13, 8, '', 'Interest', '', '', 1, 1, 200000000, 1652702402, 0),
(1253, 14, 8, '', 'Interest', '', '', 1, 1, 18320000, 1652702402, 0),
(1254, 15, 8, '', 'Interest', '', '', 1, 1, 210840000, 1652702402, 0),
(1255, 20, 8, '', 'Interest', '', '', 1, 1, 20000000, 1652702402, 0),
(1256, 28, 8, '', 'Interest', '', '', 1, 1, 8000000, 1652702402, 0),
(1257, 32, 8, '', 'Interest', '', '', 1, 1, 4000000, 1652702402, 0),
(1258, 33, 8, '', 'Interest', '', '', 1, 1, 8000000, 1652702402, 0),
(1259, 44, 8, '', 'Interest', '', '', 1, 1, 6400000000, 1652702402, 0),
(1260, 47, 8, '', 'Interest', '', '', 1, 1, 60000000, 1652702402, 0),
(1261, 52, 8, '', 'Interest', '', '', 1, 1, 13800000000, 1652702402, 0),
(1262, 53, 8, '', 'Interest', '', '', 1, 1, 1360000000, 1652702402, 0),
(1263, 1, 8, '', 'Interest', '', '', 1, 1, 22807680000, 1652706002, 0),
(1264, 3, 8, '', 'Interest', '', '', 1, 1, 8000000, 1652706003, 0),
(1265, 4, 8, '', 'Interest', '', '', 1, 1, 52000000, 1652706003, 0),
(1266, 7, 8, '', 'Interest', '', '', 1, 1, 200000000, 1652706003, 0),
(1267, 12, 8, '', 'Interest', '', '', 1, 1, 4000000, 1652706003, 0),
(1268, 13, 8, '', 'Interest', '', '', 1, 1, 200000000, 1652706003, 0),
(1269, 14, 8, '', 'Interest', '', '', 1, 1, 18320000, 1652706003, 0),
(1270, 15, 8, '', 'Interest', '', '', 1, 1, 210840000, 1652706003, 0),
(1271, 20, 8, '', 'Interest', '', '', 1, 1, 20000000, 1652706003, 0),
(1272, 28, 8, '', 'Interest', '', '', 1, 1, 8000000, 1652706003, 0),
(1273, 32, 8, '', 'Interest', '', '', 1, 1, 4000000, 1652706003, 0),
(1274, 33, 8, '', 'Interest', '', '', 1, 1, 8000000, 1652706003, 0),
(1275, 44, 8, '', 'Interest', '', '', 1, 1, 6400000000, 1652706003, 0),
(1276, 47, 8, '', 'Interest', '', '', 1, 1, 60000000, 1652706003, 0),
(1277, 52, 8, '', 'Interest', '', '', 1, 1, 13800000000, 1652706003, 0),
(1278, 53, 8, '', 'Interest', '', '', 1, 1, 1360000000, 1652706003, 0),
(1279, 1, 8, '', 'Interest', '', '', 1, 1, 22807680000, 1652709603, 0),
(1280, 3, 8, '', 'Interest', '', '', 1, 1, 8000000, 1652709603, 0),
(1281, 4, 8, '', 'Interest', '', '', 1, 1, 52000000, 1652709603, 0),
(1282, 7, 8, '', 'Interest', '', '', 1, 1, 200000000, 1652709603, 0),
(1283, 12, 8, '', 'Interest', '', '', 1, 1, 4000000, 1652709603, 0),
(1284, 13, 8, '', 'Interest', '', '', 1, 1, 200000000, 1652709603, 0),
(1285, 14, 8, '', 'Interest', '', '', 1, 1, 18320000, 1652709603, 0),
(1286, 15, 8, '', 'Interest', '', '', 1, 1, 210840000, 1652709603, 0),
(1287, 20, 8, '', 'Interest', '', '', 1, 1, 20000000, 1652709603, 0),
(1288, 28, 8, '', 'Interest', '', '', 1, 1, 8000000, 1652709603, 0),
(1289, 32, 8, '', 'Interest', '', '', 1, 1, 4000000, 1652709603, 0),
(1290, 33, 8, '', 'Interest', '', '', 1, 1, 8000000, 1652709603, 0),
(1291, 44, 8, '', 'Interest', '', '', 1, 1, 6400000000, 1652709603, 0),
(1292, 47, 8, '', 'Interest', '', '', 1, 1, 60000000, 1652709603, 0),
(1293, 52, 8, '', 'Interest', '', '', 1, 1, 13800000000, 1652709603, 0),
(1294, 53, 8, '', 'Interest', '', '', 1, 1, 1360000000, 1652709603, 0),
(1295, 1, 8, '', 'Interest', '', '', 1, 1, 22807680000, 1652713202, 0),
(1296, 3, 8, '', 'Interest', '', '', 1, 1, 8000000, 1652713202, 0),
(1297, 4, 8, '', 'Interest', '', '', 1, 1, 52000000, 1652713202, 0),
(1298, 7, 8, '', 'Interest', '', '', 1, 1, 200000000, 1652713202, 0),
(1299, 12, 8, '', 'Interest', '', '', 1, 1, 4000000, 1652713202, 0),
(1300, 13, 8, '', 'Interest', '', '', 1, 1, 200000000, 1652713202, 0),
(1301, 14, 8, '', 'Interest', '', '', 1, 1, 18320000, 1652713202, 0),
(1302, 15, 8, '', 'Interest', '', '', 1, 1, 210840000, 1652713202, 0),
(1303, 20, 8, '', 'Interest', '', '', 1, 1, 20000000, 1652713202, 0),
(1304, 28, 8, '', 'Interest', '', '', 1, 1, 8000000, 1652713202, 0),
(1305, 32, 8, '', 'Interest', '', '', 1, 1, 4000000, 1652713202, 0),
(1306, 33, 8, '', 'Interest', '', '', 1, 1, 8000000, 1652713202, 0),
(1307, 44, 8, '', 'Interest', '', '', 1, 1, 6400000000, 1652713202, 0),
(1308, 47, 8, '', 'Interest', '', '', 1, 1, 60000000, 1652713202, 0),
(1309, 52, 8, '', 'Interest', '', '', 1, 1, 13800000000, 1652713202, 0),
(1310, 53, 8, '', 'Interest', '', '', 1, 1, 1360000000, 1652713202, 0),
(1311, 1, 8, '', 'Interest', '', '', 1, 1, 22807680000, 1652716802, 0),
(1312, 3, 8, '', 'Interest', '', '', 1, 1, 8000000, 1652716802, 0),
(1313, 4, 8, '', 'Interest', '', '', 1, 1, 52000000, 1652716802, 0),
(1314, 7, 8, '', 'Interest', '', '', 1, 1, 200000000, 1652716802, 0),
(1315, 12, 8, '', 'Interest', '', '', 1, 1, 4000000, 1652716802, 0),
(1316, 13, 8, '', 'Interest', '', '', 1, 1, 200000000, 1652716802, 0),
(1317, 14, 8, '', 'Interest', '', '', 1, 1, 18320000, 1652716802, 0),
(1318, 15, 8, '', 'Interest', '', '', 1, 1, 210840000, 1652716802, 0),
(1319, 20, 8, '', 'Interest', '', '', 1, 1, 20000000, 1652716802, 0),
(1320, 28, 8, '', 'Interest', '', '', 1, 1, 8000000, 1652716802, 0),
(1321, 32, 8, '', 'Interest', '', '', 1, 1, 4000000, 1652716802, 0),
(1322, 33, 8, '', 'Interest', '', '', 1, 1, 8000000, 1652716802, 0),
(1323, 44, 8, '', 'Interest', '', '', 1, 1, 6400000000, 1652716802, 0),
(1324, 47, 8, '', 'Interest', '', '', 1, 1, 60000000, 1652716802, 0),
(1325, 52, 8, '', 'Interest', '', '', 1, 1, 13800000000, 1652716802, 0),
(1326, 53, 8, '', 'Interest', '', '', 1, 1, 1360000000, 1652716802, 0),
(1327, 1, 8, '', 'Interest', '', '', 1, 1, 22807680000, 1652720402, 0),
(1328, 3, 8, '', 'Interest', '', '', 1, 1, 8000000, 1652720402, 0),
(1329, 4, 8, '', 'Interest', '', '', 1, 1, 52000000, 1652720402, 0),
(1330, 7, 8, '', 'Interest', '', '', 1, 1, 200000000, 1652720402, 0),
(1331, 12, 8, '', 'Interest', '', '', 1, 1, 4000000, 1652720402, 0),
(1332, 13, 8, '', 'Interest', '', '', 1, 1, 200000000, 1652720402, 0),
(1333, 14, 8, '', 'Interest', '', '', 1, 1, 18320000, 1652720402, 0),
(1334, 15, 8, '', 'Interest', '', '', 1, 1, 210840000, 1652720402, 0),
(1335, 20, 8, '', 'Interest', '', '', 1, 1, 20000000, 1652720402, 0),
(1336, 28, 8, '', 'Interest', '', '', 1, 1, 8000000, 1652720402, 0),
(1337, 32, 8, '', 'Interest', '', '', 1, 1, 4000000, 1652720402, 0),
(1338, 33, 8, '', 'Interest', '', '', 1, 1, 8000000, 1652720402, 0),
(1339, 44, 8, '', 'Interest', '', '', 1, 1, 6400000000, 1652720402, 0),
(1340, 47, 8, '', 'Interest', '', '', 1, 1, 60000000, 1652720402, 0),
(1341, 52, 8, '', 'Interest', '', '', 1, 1, 13800000000, 1652720402, 0),
(1342, 53, 8, '', 'Interest', '', '', 1, 1, 1360000000, 1652720402, 0),
(1343, 1, 8, '', 'Interest', '', '', 1, 1, 22807680000, 1652724003, 0),
(1344, 3, 8, '', 'Interest', '', '', 1, 1, 8000000, 1652724003, 0),
(1345, 4, 8, '', 'Interest', '', '', 1, 1, 52000000, 1652724003, 0),
(1346, 7, 8, '', 'Interest', '', '', 1, 1, 200000000, 1652724003, 0),
(1347, 12, 8, '', 'Interest', '', '', 1, 1, 4000000, 1652724003, 0),
(1348, 13, 8, '', 'Interest', '', '', 1, 1, 200000000, 1652724003, 0),
(1349, 14, 8, '', 'Interest', '', '', 1, 1, 18320000, 1652724003, 0),
(1350, 15, 8, '', 'Interest', '', '', 1, 1, 210840000, 1652724003, 0),
(1351, 20, 8, '', 'Interest', '', '', 1, 1, 20000000, 1652724003, 0),
(1352, 28, 8, '', 'Interest', '', '', 1, 1, 8000000, 1652724003, 0),
(1353, 32, 8, '', 'Interest', '', '', 1, 1, 4000000, 1652724003, 0),
(1354, 33, 8, '', 'Interest', '', '', 1, 1, 8000000, 1652724003, 0),
(1355, 44, 8, '', 'Interest', '', '', 1, 1, 6400000000, 1652724003, 0),
(1356, 47, 8, '', 'Interest', '', '', 1, 1, 60000000, 1652724003, 0),
(1357, 52, 8, '', 'Interest', '', '', 1, 1, 13800000000, 1652724003, 0),
(1358, 53, 8, '', 'Interest', '', '', 1, 1, 1360000000, 1652724003, 0),
(1359, 1, 8, '', 'Interest', '', '', 1, 1, 22807680000, 1652727602, 0),
(1360, 3, 8, '', 'Interest', '', '', 1, 1, 8000000, 1652727602, 0),
(1361, 4, 8, '', 'Interest', '', '', 1, 1, 52000000, 1652727602, 0),
(1362, 7, 8, '', 'Interest', '', '', 1, 1, 200000000, 1652727602, 0),
(1363, 12, 8, '', 'Interest', '', '', 1, 1, 4000000, 1652727602, 0),
(1364, 13, 8, '', 'Interest', '', '', 1, 1, 200000000, 1652727602, 0),
(1365, 14, 8, '', 'Interest', '', '', 1, 1, 18320000, 1652727602, 0),
(1366, 15, 8, '', 'Interest', '', '', 1, 1, 210840000, 1652727602, 0),
(1367, 20, 8, '', 'Interest', '', '', 1, 1, 20000000, 1652727602, 0),
(1368, 28, 8, '', 'Interest', '', '', 1, 1, 8000000, 1652727602, 0),
(1369, 32, 8, '', 'Interest', '', '', 1, 1, 4000000, 1652727602, 0),
(1370, 33, 8, '', 'Interest', '', '', 1, 1, 8000000, 1652727602, 0),
(1371, 44, 8, '', 'Interest', '', '', 1, 1, 6400000000, 1652727602, 0),
(1372, 47, 8, '', 'Interest', '', '', 1, 1, 60000000, 1652727602, 0),
(1373, 52, 8, '', 'Interest', '', '', 1, 1, 13800000000, 1652727602, 0),
(1374, 53, 8, '', 'Interest', '', '', 1, 1, 1360000000, 1652727602, 0),
(1375, 0, 5, 'Not Applied', 'Reward for reporting scam', 'Not Applied', 'Not Applied', 1, 1, 2500, 1652729402, 0),
(1376, 1, 8, '', 'Interest', '', '', 1, 1, 22807680000, 1652731202, 0),
(1377, 3, 8, '', 'Interest', '', '', 1, 1, 8000000, 1652731202, 0),
(1378, 4, 8, '', 'Interest', '', '', 1, 1, 52000000, 1652731202, 0),
(1379, 7, 8, '', 'Interest', '', '', 1, 1, 200000000, 1652731202, 0),
(1380, 12, 8, '', 'Interest', '', '', 1, 1, 4000000, 1652731202, 0),
(1381, 13, 8, '', 'Interest', '', '', 1, 1, 200000000, 1652731202, 0),
(1382, 14, 8, '', 'Interest', '', '', 1, 1, 18320000, 1652731202, 0),
(1383, 15, 8, '', 'Interest', '', '', 1, 1, 210840000, 1652731202, 0),
(1384, 20, 8, '', 'Interest', '', '', 1, 1, 20000000, 1652731202, 0),
(1385, 28, 8, '', 'Interest', '', '', 1, 1, 8000000, 1652731202, 0),
(1386, 32, 8, '', 'Interest', '', '', 1, 1, 4000000, 1652731202, 0),
(1387, 33, 8, '', 'Interest', '', '', 1, 1, 8000000, 1652731202, 0),
(1388, 44, 8, '', 'Interest', '', '', 1, 1, 6400000000, 1652731202, 0),
(1389, 47, 8, '', 'Interest', '', '', 1, 1, 60000000, 1652731202, 0),
(1390, 52, 8, '', 'Interest', '', '', 1, 1, 13800000000, 1652731202, 0),
(1391, 53, 8, '', 'Interest', '', '', 1, 1, 1360000000, 1652731202, 0),
(1392, 1, 8, '', 'Interest', '', '', 1, 1, 22807680000, 1652734802, 0),
(1393, 3, 8, '', 'Interest', '', '', 1, 1, 8000000, 1652734802, 0),
(1394, 4, 8, '', 'Interest', '', '', 1, 1, 52000000, 1652734802, 0),
(1395, 7, 8, '', 'Interest', '', '', 1, 1, 200000000, 1652734802, 0),
(1396, 12, 8, '', 'Interest', '', '', 1, 1, 4000000, 1652734802, 0),
(1397, 13, 8, '', 'Interest', '', '', 1, 1, 200000000, 1652734802, 0),
(1398, 14, 8, '', 'Interest', '', '', 1, 1, 18320000, 1652734802, 0),
(1399, 15, 8, '', 'Interest', '', '', 1, 1, 210840000, 1652734802, 0),
(1400, 20, 8, '', 'Interest', '', '', 1, 1, 20000000, 1652734802, 0),
(1401, 28, 8, '', 'Interest', '', '', 1, 1, 8000000, 1652734802, 0),
(1402, 32, 8, '', 'Interest', '', '', 1, 1, 4000000, 1652734802, 0),
(1403, 33, 8, '', 'Interest', '', '', 1, 1, 8000000, 1652734802, 0),
(1404, 44, 8, '', 'Interest', '', '', 1, 1, 6400000000, 1652734802, 0),
(1405, 47, 8, '', 'Interest', '', '', 1, 1, 60000000, 1652734802, 0),
(1406, 52, 8, '', 'Interest', '', '', 1, 1, 13800000000, 1652734802, 0),
(1407, 53, 8, '', 'Interest', '', '', 1, 1, 1360000000, 1652734802, 0),
(1408, 1, 8, '', 'Interest', '', '', 1, 1, 22807680000, 1652738402, 0),
(1409, 3, 8, '', 'Interest', '', '', 1, 1, 8000000, 1652738402, 0),
(1410, 4, 8, '', 'Interest', '', '', 1, 1, 52000000, 1652738402, 0),
(1411, 7, 8, '', 'Interest', '', '', 1, 1, 200000000, 1652738402, 0),
(1412, 12, 8, '', 'Interest', '', '', 1, 1, 4000000, 1652738402, 0),
(1413, 13, 8, '', 'Interest', '', '', 1, 1, 200000000, 1652738402, 0),
(1414, 14, 8, '', 'Interest', '', '', 1, 1, 18320000, 1652738402, 0),
(1415, 15, 8, '', 'Interest', '', '', 1, 1, 210840000, 1652738402, 0),
(1416, 20, 8, '', 'Interest', '', '', 1, 1, 20000000, 1652738402, 0),
(1417, 28, 8, '', 'Interest', '', '', 1, 1, 8000000, 1652738402, 0),
(1418, 32, 8, '', 'Interest', '', '', 1, 1, 4000000, 1652738402, 0),
(1419, 33, 8, '', 'Interest', '', '', 1, 1, 8000000, 1652738402, 0),
(1420, 44, 8, '', 'Interest', '', '', 1, 1, 6400000000, 1652738402, 0),
(1421, 47, 8, '', 'Interest', '', '', 1, 1, 60000000, 1652738402, 0),
(1422, 52, 8, '', 'Interest', '', '', 1, 1, 13800000000, 1652738402, 0),
(1423, 53, 8, '', 'Interest', '', '', 1, 1, 1360000000, 1652738402, 0),
(1424, 1, 8, '', 'Interest', '', '', 1, 1, 22807680000, 1652742002, 0),
(1425, 3, 8, '', 'Interest', '', '', 1, 1, 8000000, 1652742002, 0),
(1426, 4, 8, '', 'Interest', '', '', 1, 1, 52000000, 1652742002, 0),
(1427, 7, 8, '', 'Interest', '', '', 1, 1, 200000000, 1652742002, 0),
(1428, 12, 8, '', 'Interest', '', '', 1, 1, 4000000, 1652742002, 0),
(1429, 13, 8, '', 'Interest', '', '', 1, 1, 200000000, 1652742002, 0),
(1430, 14, 8, '', 'Interest', '', '', 1, 1, 18320000, 1652742002, 0),
(1431, 15, 8, '', 'Interest', '', '', 1, 1, 210840000, 1652742002, 0),
(1432, 20, 8, '', 'Interest', '', '', 1, 1, 20000000, 1652742002, 0),
(1433, 28, 8, '', 'Interest', '', '', 1, 1, 8000000, 1652742002, 0),
(1434, 32, 8, '', 'Interest', '', '', 1, 1, 4000000, 1652742002, 0),
(1435, 33, 8, '', 'Interest', '', '', 1, 1, 8000000, 1652742002, 0),
(1436, 44, 8, '', 'Interest', '', '', 1, 1, 6400000000, 1652742002, 0),
(1437, 47, 8, '', 'Interest', '', '', 1, 1, 60000000, 1652742002, 0),
(1438, 52, 8, '', 'Interest', '', '', 1, 1, 13800000000, 1652742002, 0),
(1439, 53, 8, '', 'Interest', '', '', 1, 1, 1360000000, 1652742002, 0),
(1440, 0, 5, 'Not Applied', 'Reward for reporting scam', 'Not Applied', 'Not Applied', 1, 1, 2500, 1652817602, 0);

-- --------------------------------------------------------

--
-- Table structure for table `transaction_status`
--

CREATE TABLE `transaction_status` (
  `id` int(11) NOT NULL,
  `name` varchar(1000) DEFAULT NULL,
  `timestamp` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `transaction_status`
--

INSERT INTO `transaction_status` (`id`, `name`, `timestamp`) VALUES
(1, 'Completed', NULL),
(2, 'Rejected', NULL),
(3, 'Pending', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `transaction_type`
--

CREATE TABLE `transaction_type` (
  `id` int(11) NOT NULL,
  `name` varchar(1000) DEFAULT NULL,
  `timestamp` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `transaction_type`
--

INSERT INTO `transaction_type` (`id`, `name`, `timestamp`) VALUES
(1, 'TSIT Recieve', NULL),
(2, 'TSIT Send (Withdraw)', NULL),
(3, 'Scam Report Reward', NULL),
(4, 'Scam Mining fees ', NULL),
(5, 'Scam Mining Reward', NULL),
(6, 'TSIT Buy', NULL),
(7, 'Referral TSIT', NULL),
(8, 'Holding Bonus', NULL),
(9, 'Internal Send', NULL),
(10, 'Internal Receive', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `twenty_four_hour_scan`
--

CREATE TABLE `twenty_four_hour_scan` (
  `id` int(56) NOT NULL,
  `timestamp` int(56) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `twenty_four_hour_scan`
--

INSERT INTO `twenty_four_hour_scan` (`id`, `timestamp`) VALUES
(1, 1652817602);

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `user_role` int(11) DEFAULT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `email` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `email_verification` int(11) DEFAULT 0,
  `password` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `user_img` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT 'user.png',
  `my_referral_code` varchar(50) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `referred_by_id` int(11) DEFAULT 0,
  `kyc_first_name` varchar(500) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `kyc_last_name` varchar(500) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `kyc_dob` int(11) DEFAULT NULL,
  `kyc_country` varchar(500) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `kyc_identity_front` varchar(500) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `kyc_identity_back` varchar(500) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `kyc_user_image` varchar(500) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `kyc_approved` int(50) DEFAULT 0,
  `two_fa_enabled` int(50) DEFAULT 0,
  `two_fa_secret` varchar(500) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `is_banned` int(11) DEFAULT 0,
  `kyc_rejected_reason` varchar(1000) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `timestamp` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `user_role`, `name`, `email`, `email_verification`, `password`, `user_img`, `my_referral_code`, `referred_by_id`, `kyc_first_name`, `kyc_last_name`, `kyc_dob`, `kyc_country`, `kyc_identity_front`, `kyc_identity_back`, `kyc_user_image`, `kyc_approved`, `two_fa_enabled`, `two_fa_secret`, `is_banned`, `kyc_rejected_reason`, `timestamp`) VALUES
(1, 2, 'Imran Khan', 'imrankhannagori@gmail.com', 1, 'tsit', 'user.png', 'immy', 0, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 1, 0, NULL, 0, NULL, NULL),
(2, 2, 'Mohammadkhan', 'imnforex444@gmail.com', 1, 'Bela@260986', 'user.png', 'cf74', 1, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 1, 0, NULL, 0, NULL, 1649701658),
(3, 2, 'Cem Kolcu', 'cemk250@gmail.com', 1, 'Semih-2019', 'user.png', '809c', 1, 'Cem', 'Kolcu', 564364800, 'Germany', '3kyc_id_front1650223375akc262348261.jpg', '3kyc_id_back1650223375akc266115032.jpg', ' 3kyc_img1650223375akc467404288.jpg', 1, 0, NULL, 0, NULL, 1649703772),
(4, 2, 'Kay Buschmann', 'yak2@gmx.de', 1, 'Sommer2020.-', 'user.png', '5185', 3, 'Kay', 'Buschmann ', -101606400, 'Germany', '4kyc_id_front1649731315akc1092351506.jpg', '4kyc_id_back1649731315akc925318953.jpg', ' 4kyc_img1649731315akc624603082.jpg', 1, 1, 'RM2KN4O66O4LAOZF', 0, NULL, 1649706363),
(5, 2, 'Bernhard Schneider', 'beschnie92@gmail.com', 1, 'Anotifo!1187', 'user.png', 'f48b', 3, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 0, 0, NULL, 0, NULL, 1649708531),
(6, 2, 'amarh nsotse ', 'amarh@gmx.de', 1, 'fossil168', 'user.png', '2ce8', 3, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 0, 0, NULL, 0, NULL, 1649709062),
(7, 2, 'Claudio Manuel', 'claudio.stauffacher@gmail.com', 1, 'Wigoltingen12+\"', 'user.png', 'dff8', 3, 'Claudio Manuel', 'Stauffacher', 580694400, 'Switzerland', '7kyc_id_front1649713850akc109433784.jpg', '7kyc_id_back1649713850akc1268284142.jpg', ' 7kyc_img1649713850akc1086609573.jpg', 1, 0, NULL, 0, NULL, 1649712513),
(8, 2, 'Rene Böhm', 'anilrene@googlemail.com', 1, 'winner85', 'user.png', '8b5b', 3, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 0, 0, NULL, 0, NULL, 1649750850),
(9, 2, 'Salvatore Corio', 'salvatorecorio@gmail.com', 1, 'Alg290688', '9user_img1649870442akc57788333.jpeg', 'e673', 3, 'Salvatore', 'Corio', 583545600, 'Germany', '9kyc_id_front1650190735akc1361135188.jpg', '9kyc_id_back1650190735akc923974512.jpg', ' 9kyc_img1650190735akc1136268631.jpg', 1, 1, 'NZSDSBMDBHFZVMFP', 0, NULL, 1649753925),
(10, 1, 'Admin', 'admin@tsit.com', 1, '0473b@50d1', 'user.png', NULL, 0, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 1, 0, NULL, 0, NULL, NULL),
(11, 2, 'Emilio', 'emi.nistico@gmx.de', 1, 'Daniel933!', 'user.png', '24dd', 3, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 0, 0, NULL, 0, NULL, 1649762510),
(12, 2, 'Timo Heß', 'timo1811@gmx.de', 1, 'Mannheim1983', 'user.png', '25d1', 3, 'Timo', 'Heß', 437961600, 'Germany', '12kyc_id_front1649771725akc35203027.jpg', '12kyc_id_back1649771725akc373409579.jpg', ' 12kyc_img1649771725akc1751050253.jpg', 1, 0, NULL, 0, NULL, 1649770882),
(13, 2, 'Carmen Sandra Meyer', 'caememeyerli@gmail.com', 1, 'Claudio4ever-', 'user.png', 'b2d6', 7, 'Carmen Sandra', 'Meyer', 689558400, 'Switzerland', '13kyc_id_front1649780240akc408337575.jpg', '13kyc_id_back1649780240akc258100741.jpg', ' 13kyc_img1649780240akc1779214165.jpeg', 1, 0, NULL, 0, NULL, 1649779282),
(14, 2, 'Christian Heneka', 'christian.heneka83@gmail.com', 1, 'PlutoCody83!', 'user.png', 'c314', 3, 'Christian', 'Heneka', 419644800, 'Germany', '14kyc_id_front1649964621akc1365815817.jpg', '14kyc_id_back1649964621akc2024303952.jpg', ' 14kyc_img1649964621akc1876048627.jpg', 1, 0, NULL, 0, NULL, 1649827624),
(15, 2, 'Reto Stauffacher', 'reto@valesta.net', 1, 'Ice$eason1718', 'user.png', 'dd5b', 7, 'Reto', 'Stauffacher', 532396800, 'Switzerland', '15kyc_id_front1649835581akc1087931596.jpg', '15kyc_id_back1649835581akc1288766985.jpg', ' 15kyc_img1649835581akc1050377538.jpg', 1, 0, NULL, 0, NULL, 1649835336),
(16, 2, 'Hakan cömert ', 'hakancmert@gmail.com', 1, 'Frmm5355?', 'user.png', 'bd9f', 3, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 0, 0, NULL, 0, NULL, 1649844412),
(17, 2, 'anzar', 'anzarkhan.rain@gmail.com', 1, 'tsit', 'user.png', '1fbc', 1, 'Anzar', 'Balooch', 939600000, 'India', '17kyc_id_front1649850218akc826549966.png', '17kyc_id_back1649850218akc916837377.png', ' 17kyc_img1649850218akc317551622.jpg', 0, 0, NULL, 0, 'selfie is not in correct format', 1649847852),
(18, 2, 'baris', 'beskinova@gmail.com', 1, 'Mersin69', 'user.png', '7072', 3, 'baris', 'eskinova', 652665600, 'Germany', '', '', ' ', 0, 0, NULL, 0, 'your kyc is not accepted. pleas submit again', 1649853057),
(19, 2, 'Ferhat Gün', 'ferhatguen@gmail.com', 1, 'Cimbom1987!', '19user_img1649859504akc814124491.jpeg', '05fd', 3, 'Ferhat', 'Gün', 547257600, 'Germany', '19kyc_id_front1649859438akc914173005.jpeg', '19kyc_id_back1649859438akc798727155.jpeg', ' 19kyc_img1649859438akc1867723252.jpeg', 1, 0, NULL, 0, NULL, 1649858972),
(20, 2, 'Monika Maria Wagner', 'mowa76@gmx.de', 1, 'Kafuedog', 'user.png', 'be84', 3, 'Monika', 'Wagner', 200793600, 'Germany', '20kyc_id_front1650028610akc1639845740.jpg', '20kyc_id_back1650028610akc587041940.jpg', ' 20kyc_img1650028610akc281355646.jpg', 1, 0, NULL, 0, NULL, 1649874386),
(21, 2, 'Marcel Milli', 'marcelmilli@web.de', 1, '12Marcel90', 'user.png', 'ec67', 3, 'Marcel', 'Milli', 660960000, 'Germany', '21kyc_id_front1650003528akc494700163.jpg', '21kyc_id_back1650003528akc1122935333.jpg', ' 21kyc_img1650003528akc23281680.jpg', 1, 0, NULL, 0, NULL, 1649875772),
(22, 2, 'Monika Wagner', 'heikoundmonikawagner@freenet.de', 0, 'Bantudog2018', 'user.png', '0b70', 3, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 0, 0, NULL, 0, NULL, 1649916767),
(23, 2, 'anzar', 'anzarkhan1999@gmail.com', 0, 'anzar', 'user.png', 'ab41', 1, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 0, 0, NULL, 0, 'not', 1649956634),
(24, 2, 'abcd', 'test@user.com', 0, 'tsit', 'user.png', '82ee', 1, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 0, 0, NULL, 0, NULL, 1649960662),
(25, 2, 'Jan Bender', 'itsjanhe@gmx.de', 1, 'Maleen1213.,', 'user.png', '9480', 3, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 0, 0, NULL, 0, NULL, 1650019500),
(26, 2, 'Muhammad Aslam', 'asifali2660866@gmail.com', 1, 'Maskam123', 'user.png', 'b968', 25, 'Muhammad', 'Aslam', 953683200, 'Pakistan', '26kyc_id_front1650098299akc145736686.jpg', '26kyc_id_back1650098299akc114267163.jpg', ' 26kyc_img1650098299akc693149526.jpg', 0, 1, 'ENJUBZSZN6XUCJJ2', 0, 'User Image with Paper is not valid', 1650023539),
(27, 2, 'Caglar Kir', 'ck28@outlook.com', 1, 'Giresun28', 'user.png', 'cee2', 3, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 0, 0, NULL, 0, NULL, 1650052244),
(28, 2, 'Ajeet Kumar', 'masihajeet@gmail.com', 1, 'Jesus9452123044@', 'user.png', 'fb7b', 3, 'Ajeet', 'Kumar', 679536000, 'India', '28kyc_id_front1650298418akc433298266.jpg', '28kyc_id_back1650298418akc2040254880.jpg', ' 28kyc_img1650298418akc2077146180.jpg', 1, 1, 'LYAOTCBTROE4GOR4', 0, NULL, 1650139889),
(29, 2, 'Soner', 'bodysoni@yahoo.de', 1, 'Tunceli654321', 'user.png', 'fed4', 14, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 0, 0, NULL, 0, NULL, 1650191891),
(30, 2, 'Umair', 'umairmithawala007@gmail.com', 0, 'u', 'user.png', 'fdc1', 1, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 0, 0, NULL, 0, 'nothing reason for rejecting kyc just for testing', 1650276144),
(31, 2, 'Senad Nadarevic', 'senad.n@web.de', 1, 'Velikakladusa1987', 'user.png', '3b21', 14, 'Senad', 'Nadarevic', 207705600, 'Germany', '31kyc_id_front1652728723akc1814660958.jpeg', '31kyc_id_back1652728723akc970109250.jpeg', ' 31kyc_img1652728723akc1946674527.jpeg', 1, 0, NULL, 0, 'User Image with Paper is not Valid', 1650278191),
(32, 2, 'Waldemar Bayerbach ', 'amon77@web.de', 1, '$Lustig59599$!', 'user.png', '4e3a', 3, 'Waldemar', 'Bayerbach', 825120000, 'Germany', '32kyc_id_front1650387806akc1747063807.jpg', '32kyc_id_back1650387806akc2041588835.jpg', ' 32kyc_img1650387806akc958056848.jpg', 1, 1, 'WZLJSAUSKSDUDEVV', 0, NULL, 1650368596),
(33, 2, 'S KAZI', 'sami.kazi@yahoo.com', 1, 'S@mmansur123', 'user.png', '779f', 1, 'Samihuddin', 'Kazi', 292723200, 'India', '33kyc_id_front1650415210akc1676530708.jpeg', '33kyc_id_back1650415210akc1584825851.jpeg', ' 33kyc_img1650415210akc1736623743.jpeg', 1, 0, NULL, 0, NULL, 1650393639),
(34, 2, 'Pawan varma', 'pv2118000@gmail.com', 1, 'Pawan123@', 'user.png', 'd861', 28, 'Pawan', 'Varma', 799286400, 'India', '34kyc_id_front1650438055akc1695927949.jpg', '34kyc_id_back1650438055akc1464533464.jpg', ' 34kyc_img1650438055akc1124689349.jpg', 1, 0, NULL, 0, NULL, 1650437435),
(35, 2, 'Ufuk Samur', 'ufuk.samur@web.de', 1, 'deniz2402', 'user.png', 'b2f8', 3, 'Ufuk', 'Samur', 541123200, 'Germany', '35kyc_id_front1650456621akc133949852.jpeg', '35kyc_id_back1650456621akc858877330.jpeg', ' 35kyc_img1650456621akc393921265.jpeg', 1, 0, NULL, 0, NULL, 1650456329),
(36, 2, 'wasim noorani', 'wasim.noorani@gmail.com', 1, 'Sim@0741', 'user.png', 'bc7d', 33, 'wasim', 'noorani', 150422400, 'India', '', '', ' ', 0, 0, NULL, 0, 'KYC not accepted', 1650467976),
(37, 2, 'Mohsin khan', 'mohsin.khanstar@gmail.com', 1, 'M@Rtahakhan88789', 'user.png', '4fce', 33, 'Mohsin', 'khan', 580089600, 'United Arab Erimates', '37kyc_id_front1650470818akc560665584.jpg', '37kyc_id_back1650470818akc2007363327.jpg', ' 37kyc_img1650470818akc622500254.jpg', 1, 0, NULL, 0, NULL, 1650469435),
(38, 2, 'Huzefa Yusuf Sayed ', 'huzaifa.syed.hs@gmail.com', 1, 'Ibrahim.23', 'user.png', 'e8ad', 33, 'Huzefa ', 'Sayed ', 835315200, 'India', '38kyc_id_front1651593762akc1078160857.jpg', '38kyc_id_back1651593762akc1485220551.jpg', ' 38kyc_img1651593762akc1909188474.jpg', 1, 0, NULL, 0, NULL, 1650482826),
(39, 2, 'Moinuddin Shaikh', 'moinshaikh80@gmail.com', 1, 'Pulsar@180', 'user.png', 'e6c1', 33, 'Moinuddin', 'Shaikh', 317347200, 'India', '39kyc_id_front1650674097akc819715907.jpg', '39kyc_id_back1650674097akc143816398.jpg', ' 39kyc_img1650674097akc693822310.jpg', 1, 0, NULL, 0, NULL, 1650501897),
(40, 2, 'Alexander Adolf ', 'adolf.alexander1@web.de', 1, 'MisterN1', 'user.png', '03ac', 3, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 2, 0, NULL, 0, NULL, 1650523008),
(41, 2, 'Raj bahadur', 'rajbahadur8382809776@gmail.com', 1, 'Raj123@', 'user.png', '72e7', 28, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 2, 0, NULL, 0, NULL, 1650540872),
(42, 2, 'Mohsin Kazi', 'kazimoszin@yahoo.com', 1, 'Mohsin123', 'user.png', 'de97', 33, 'MOHSIN', 'KAZI', 392342400, 'India', '42kyc_id_front1650627313akc247327565.jpeg', '42kyc_id_back1650627313akc1899314353.jpeg', ' 42kyc_img1650627313akc1503170295.jpeg', 1, 0, NULL, 0, NULL, 1650576710),
(43, 2, 'Niklas', 'Niklas_1701@icloud.com', 1, 'Deivatter11', 'user.png', '79a9', 3, 'Niklas', 'Schneider ', 821836800, 'Germany', '43kyc_id_front1650645900akc1864658518.jpg', '43kyc_id_back1650645900akc1884012819.jpg', ' 43kyc_img1650645900akc1776788710.jpg', 1, 0, NULL, 0, NULL, 1650643551),
(44, 2, 'Max Lee', 'makstarsfilms@gmail.com', 1, 'Tsit@1234', 'user.png', '5f87', 1, 'Max ', 'Lee', 528076800, 'United Arab Erimates', '44kyc_id_front1650704308akc386759248.png', '44kyc_id_back1650704308akc540695402.png', ' 44kyc_img1650704308akc282414153.jpg', 1, 0, NULL, 0, NULL, 1650703407),
(45, 2, 'Daniel Dischinger ', 'la-haus@web.de', 1, 'Silver2022@', 'user.png', 'e70e', 14, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 2, 0, NULL, 0, NULL, 1650868062),
(46, 2, 'Bennur YARDIMCI ', 'bennurbulutyardimci@gmail.com', 1, 'runneb1', 'user.png', 'b0cd', 3, 'Bennur', 'YARDIMCI ', 357436800, 'Turkey', '46kyc_id_front1650914093akc151898871.jpg', '46kyc_id_back1650914093akc1372262115.jpg', ' 46kyc_img1650914093akc1410417237.jpg', 1, 0, NULL, 0, NULL, 1650913140),
(47, 2, 'Vanessa Buschauer', 'vanessa.buschauer@gmx.ch', 1, 'Alkasawydouely19862008!', 'user.png', '18d4', 7, 'Vanessa', 'Buschauer', 795830400, 'Switzerland', '47kyc_id_front1651678885akc1620209533.jpeg', '47kyc_id_back1651678885akc380979785.jpeg', ' 47kyc_img1651678885akc72389688.jpg', 1, 1, 'YRRDR4673VZPHKV3', 0, NULL, 1651570078),
(48, 2, 'Anton Djordjevic ', 'zef_555@hotmail.de', 1, 'Bayern123&', 'user.png', 'cfc6', 47, 'Anton', 'Djordjevic ', 952300800, 'Switzerland', '48kyc_id_front1651854623akc927364159.jpg', '48kyc_id_back1651854623akc639228610.jpg', ' 48kyc_img1651854623akc606128670.jpg', 0, 0, NULL, 0, 'Selfie image not as per instruction', 1651677357),
(49, 2, 'Agrie Ahmad', 'mail@agrie.de', 1, 'Teslainu123', 'user.png', '818b', 3, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 2, 0, NULL, 0, NULL, 1651743056),
(50, 2, 'Thomas', 'horvath-thomas@web.de', 1, 'Stebbach94#', 'user.png', '9e00', 3, 'Thomas', 'Horvath', 762393600, 'Germany', '50kyc_id_front1651839926akc1633858999.jpeg', '50kyc_id_back1651839926akc35290560.jpeg', ' 50kyc_img1651839926akc148423809.jpeg', 1, 0, NULL, 0, NULL, 1651767084),
(51, 2, 'Robin Plisch', 'plischx@gmail.com', 1, 'Xy73.-81', '51user_img1652365590akc1621019219.jpg', '5c41', 7, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 2, 0, NULL, 0, NULL, 1652365440),
(52, 2, 'Roger Holdign', 'kgnassociates92@gmail.com', 1, 'Bela@26098', 'user.png', '58d8', 1, 'ROger', 'HOlding', 454896000, 'France', '', '', ' ', 1, 0, NULL, 0, NULL, 1652694944),
(53, 2, 'Fredrick Patro', 'imrankhannagore@gmail.com', 1, 'Bela@260986', 'user.png', '516b', 52, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 1, 0, NULL, 0, NULL, 1652695728),
(54, 2, 'Manu', 'manukc1998@gmail.com', 1, 'mkc1998', 'user.png', '4e99', 1, 'Manu', 'Kumari', 1652659200, 'India', '54kyc_id_front1652710100akc629090358.jpg', '54kyc_id_back1652710100akc2059082623.jpg', ' 54kyc_img1652710100akc1403128917.jpg', 0, 0, NULL, 0, 'Invalid KYC', 1652701961);

-- --------------------------------------------------------

--
-- Table structure for table `user_roles`
--

CREATE TABLE `user_roles` (
  `id` int(11) NOT NULL,
  `user_role` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `user_roles`
--

INSERT INTO `user_roles` (`id`, `user_role`) VALUES
(1, 'superadmin'),
(2, 'user'),
(4, 'fake_voter');

-- --------------------------------------------------------

--
-- Table structure for table `votes`
--

CREATE TABLE `votes` (
  `id` int(50) NOT NULL,
  `voter_id` int(50) DEFAULT NULL,
  `scam_id` int(50) DEFAULT NULL,
  `vote` int(50) DEFAULT NULL,
  `vote_description` varchar(2000) DEFAULT NULL,
  `timestamp` int(50) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `wallets`
--

CREATE TABLE `wallets` (
  `id` int(50) NOT NULL,
  `user_id` int(50) DEFAULT NULL,
  `wallet_address_one` varchar(1000) DEFAULT NULL,
  `wallet_private_key_one` varchar(700) DEFAULT NULL,
  `wallet_hex_address_one` varchar(700) DEFAULT NULL,
  `wallet_public_key_one` varchar(700) DEFAULT NULL,
  `wallet_address_one_currency` varchar(1000) DEFAULT NULL,
  `wallet_address_one_blockchain` varchar(1000) DEFAULT NULL,
  `timestamp` int(50) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `wallets`
--

INSERT INTO `wallets` (`id`, `user_id`, `wallet_address_one`, `wallet_private_key_one`, `wallet_hex_address_one`, `wallet_public_key_one`, `wallet_address_one_currency`, `wallet_address_one_blockchain`, `timestamp`) VALUES
(20, 2, 'TKguxPAEEzGm8DxxMvk4N6Z6oqoxgnzztv', 'cbe6d931d0b66cb2e16b3b7187fe47a964fecc50bb2e8e91ad00aa624b2f591f', '416a9c5f8011bb61a2131f8913ab9ba88379db821a', '041682ec537b3452dacd269e054765ef1f0669de53a24082d2ec8404a07107faa4c2059fac0f30fa67919bfbb4a073b28bf5a941cbcdb95c7285900710a52b074c', 'TSIT', 'TRON', 1649701658),
(21, 3, 'TALRoGXXPrK5fTkj1GwQc6tMcDJSyTngpw', 'c6aa46ef09d7251ee3ee0792f01de8e494044a318f2c37a199b6c4472c14aed3', '4104036ad7f7c05d7f03f0a35a647fb7dcbe6f9663', '04101d3234817d77374a7636f5a0890bf70521901ec947c45f6036b65a5aed0feaf6e8debc3f6b13671635f95f671f99c248323dff7536c644de4beb635e4d0bc5', 'TSIT', 'TRON', 1649703772),
(22, 4, 'TBfo3jGoSNh5C2EKQD8beFuHR9vGXwyt9W', '8ed8fef8a9694c2fcc6271774b338444193c244ebc116e8b62dab811355e1a30', '4112a52f38f919f5cd8ddac0f39fc19556e80167c1', '04d16752e60606f04afdeafca9e9dd1c6f7c3047819381948d2bed5fc9303adbc176267526927a61867adfd2f8abb823797e39fb60dd2cf4586ef9ca340d8c45bb', 'TSIT', 'TRON', 1649706363),
(23, 5, 'TYpWfJnwSWjEzC6cJ9uFmFGm8PUVergtwo', '0753447f49e5be24435038e7d59c9ff5cfef355478df9f69b0bdde9cf439773a', '41faa5e407ceb46847a00977d1109ecbe772c95a20', '0419f4a31c8ecff508241c4f05f785c26ca39ecbebec669f77cb71fb0430c303f20dae20e49eaea97941acdb8f7609728c4aa4bfe9105ad030c16d9ebc017163c3', 'TSIT', 'TRON', 1649708531),
(24, 6, 'TV7V8C8TJUEDn4yzbhA4RKyfCxiqkp7Wjb', 'd27b48b7990b79ab3c05838078226f69fd4cd57730b23e3f13ebb72a886d3797', '41d1fb2d278425379e81836a6981c6e3c5d7f0c3ed', '04b69074640e05f8a232c53b6b71b50585f6719f3bc6cc10ad605eb7c76415b29e51911b1503debf6e4ecdf55276e0eab2f579706f6a7f301d0a5c2bd8982042c2', 'TSIT', 'TRON', 1649709062),
(25, 7, 'TSWaF4Pf2zUTreSXtv6tuoCSRwQickJVHE', 'a086e112ac647292130dfbc5967e964eb1b3e4a01a5e7bb209c109613cd3d9b9', '41b570a38674b7e1b614267e67d23bdd8f605a7e21', '04a03d33464d3689d4163afea71bfd359b107d88c13c66896785681f0612fb1f8ef2073680306800330511d18b221cfc429393dd3c4f5e4ac504e0c7fbfea6944c', 'TSIT', 'TRON', 1649712513),
(26, 8, 'TXY48dHQc67dNyn1xSQug3m3rnLWBbMqWC', '2b9d76e117e874014df9f6d50349e2cfafe0f8a6bfeb4ae04a86b13112b08732', '41ec90f6dbab29aa4cf8299d68327e98b2eda0212f', '04be08fab5bef2de910ea50c6dbddf3eef41e407033fb8e3581cc978e2882ae2f2371ef953568a5fa5113de5ae57f24bc2d14ae94f42645b47a2a7e458b95dab09', 'TSIT', 'TRON', 1649750850),
(27, 9, 'TUPjKvaf6GAPgiPZwp34kKKwGJEgqiLxkm', '2457c1e41ced28f7343a37a76ee2197fc3cade9b2ff790ad64064ab898d78e41', '41ca158fbb3e9d1dbac966a3e19b8daac46338fe87', '0451abd73aa7ecd17e3c576d53c9a6a82662067f18acba0ae30a59623630a7b94d18388f6a46984ad4a07719118f752ed905a499c519f9201d3dce37a61931e17b', 'TSIT', 'TRON', 1649753925),
(28, 11, 'TFgDpSQftgDEHTtJmQ6rqi8bWtkj7T6Dp5', 'e8a8e0841281f9547b6542b4033a35b2f54f9038df5b3f32b8a87ccefa913451', '413e9a5d81c7bd6a57698373e0299a8a6445e9adf9', '0450bc856775a77e17b137d011f789c10e2193e9406bcf2eee7047533b67594aaa8b900926951d54d757cc68e26c7cf3ef462787cfc13a1aa4a300ad6a01254386', 'TSIT', 'TRON', 1649762510),
(29, 12, 'TSUiVC7o1wW1wqwes8pBK41RU3wKqDPVon', 'b576e97fbc4341386dfa490984553566aa997222fd8ab935890d1a0fac90a36d', '41b516b035cfa85764f2fbc6a1fbd39942e5fc07da', '04a2cda5ec24235b1b65eedade936e40b4aec7ad1433c9523378a446f2f7568bed6d105fed046c3e9879660822d270fd474b59788161cafb234e0e136260c7956d', 'TSIT', 'TRON', 1649770882),
(30, 13, 'TLf82Bpv8NGmneXqrhv1af4FkWP2BddNUK', 'dfc2a35d4090526cf5e52b15583d4f67de3af49437026b61cfa19feb5c8eb2cd', '41753dbd1f7070081205412c649a6f4be54b8833d6', '046d92edc6ac6f386df4d9b9227166a3f655a58efdb1a15822b0d51e5d932098ddc71f1a45e3397a5d0f78d36610b7c74a2818f05d7e058322ec615ec841feb7a0', 'TSIT', 'TRON', 1649779282),
(31, 14, 'TJp1Sn5BwLtvMFVqt7SsWkeQYDNmm9Nonh', '9b41eeee487740f3d9b03cfb3daa278c8c54292a9acb9cb9150c2ba09877daf6', '4160fbbdd03f4f750d00afcd303960bd2837cfe709', '04357269c3b9ecbc55229a47fe9d48bba97dd0680d10451a659942faf790a291b6cbedc25c43975992a511c071569475c50fabf26c628eaef1fa5fc11a2c703dfd', 'TSIT', 'TRON', 1649827624),
(32, 15, 'TFohLqE7Dmd5P3zhYD2QusX3wPCK8Dvoa1', '81fe7cbd742ad4deefa53fb1c48bc0641202d809f6f543afde7f8bc2da1696bc', '41400440bd907e7c9714acfc0bd8f4da87f35886e7', '04dd546c4bce5bf93014d95c4c8c7c6140c208f33e81404a7607e85bcbe53d710384b6900a0d8780d7ff15b07c905e0cb4b20d488b7591da1a7adb809144993218', 'TSIT', 'TRON', 1649835336),
(33, 16, 'TZDT98kL7DpkJcWoA3PDaeD9ie2tdSbpXZ', 'b2d6aeb2471c42a8d306e64f22405eee69f7e30425a3333c08dfcb0ad8d52d0d', '41fefc84f2a48234ccb6d38bac240aea907469f93b', '04f0f0642ce04aa2701a6dd2fd903db64c25710fac2a7f1026e18665a762131b234e584a1034dfae818ca4addc3f28011a57a4b0553a81054dff538cbc70d29bc3', 'TSIT', 'TRON', 1649844412),
(34, 17, 'TNZyCmdmAJraQ782UVvb9F5q7pzq6q8BE3', '5368fee80fea387fb2f2ea908316dd2e6a8f02644919cf637df1c57e9dead766', '418a348ccd83b082d13f7e4a397dca16d9915d3440', '041b7a916f7d1f7440204cf31ba0bc8823589076f8ed56e56762622484514218abce7e7c167c3f61112a25480191a9ac89c6a20b1ced9645d6d2fb9b558593c669', 'TSIT', 'TRON', 1649847852),
(35, 18, 'TVDsPtviSii5dx1Kckob5vJ7cnY6HbYPXB', '8f6ed59a98ecb3b552366295ff2363d1521eb79e458a35c1e26e84d1285029a1', '41d330434972fe0de6fc253822b3106a6cf7a7b462', '04fc5aeef430f3ac51ee5e739a600cb5985c711fe588a21a3e1d8c85afeeda238ad2513d86ab8d2bd1a1e2bbcac3ef7ce02fd3f9cb861f3d37688e8142f57329f7', 'TSIT', 'TRON', 1649853057),
(36, 19, 'THPMvoxYADLDSt5cNxgUfpB66Eg2N4bYft', '33ddb7ff8704a4727e9a740a8cd5d9cf9e7bfc47235bbb817b6bd7ccfb1c5fc9', '41515a50b3d4ec4df4d2ef90da3bdfe2c6aa733d54', '04ff44e611768e802647262d73227b73d84fa7d18030ada3950f8407004041a0147a9971dddd1a783d928757df8cd43683d815d229ce48c20a312ab28c6ea1cb32', 'TSIT', 'TRON', 1649858972),
(37, 20, 'TMUGzQePc2FD5SrguutgQbzsJHQf15aCyd', '8f618f0b74b0bec418b8aeac588621f5991a0aace00de8b595720b01be8b07a9', '417e28c6b3eab355955a138d3dc15c441dd542fee6', '049b710f14d7b435bb6f1048e4b9289befc0870c35a4fbb6584ebb538b4dd1c7c3a74fa04c2fcb31f4823d83dba1731e1e193c4bca9a3c2b14dbef2130ca799183', 'TSIT', 'TRON', 1649874386),
(38, 21, 'THrnupagB1WGX9d87NcGVtatPYp5YKe2NA', '055ffdc68b8ea92669bb502412c5cb9ddc71fb427793d2d0c87a52aa16a4cc93', '41568a66a2edeba2002205aae4d9730c4b17f238ed', '04abcda6ee3ea3b112fafcfb624e768fad3290e1c4cfe9833bd426a062de52d11d17b54fd78cc5db87e8dee01bfb0194576877b769c929f2d77362e65f2b9fb742', 'TSIT', 'TRON', 1649875772),
(39, 22, 'TGQzBw4kABYozbddyVJ9eD4H9g5y7MBzaV', 'c01a78f1995d99ed463cd07fa3aec4f977b7add1730166e2418aad3b296012bc', '4146b0dfd5eb5a4d0b3693502fdbb62ceda40a6fa9', '0459cdd882c9a92a70c511fd6feefd009b6aa649e6198a9e33c71025b1fba808d98bfceb8d1f9e553f4896e48e47c6a8e25ded5761416340943db239acf9a46462', 'TSIT', 'TRON', 1649916767),
(40, 23, 'TGEmLmu3WWksFhc817wPuTVkWaYZPxMPjM', '1d84c5d8ff4fa3fbd3adbe819aea48f4c49098ccd01c2ec27fab0697279ac05b', '4144c1fd7a04c73efb4613f523881ae09d875f334a', '04cfce4a0acaaf5750d350bff1544f7d26dc4fa1128dbe8eb43565b55e46989b6cb0d7d4fa17e7b44475db97b32f8c33ca41a1e7c7a53e8f8d0e215613fbec2449', 'TSIT', 'TRON', 1649956634),
(41, 24, 'TEfc1qakM8sUeB8QhupyArrHCKSAqgqzcf', '295a8b50f6b718a11e5f0fb6f26973e211af19de0c2b325a5bc06f8aacf76429', '4133845a2d901649a290b67c3576026da17303137a', '047c23cb541092447a0dd56af5aac3ff996936e08a94796b6715b939e309055efa12e1f9da71d4d42d02cf837154b35eb514dc66f3cfb13df7ccbdbb1f0f51e6bc', 'TSIT', 'TRON', 1649960662),
(42, 25, 'TF9drRboWfjDUr8zyReSghV5ZvfDaCqabw', '26c80d8638d7847686d8acb4c693d5c23ad5a78ad74c95b245633ad4bdb00437', '4138d1888132807bdf84a7d8661e70403ca0f55702', '04b91f8858650c8688d8198475be9bccb3c3144a7c56770b97c554a900a7b1b1966bcfaa2b695bba5a53a859cfb5998ebcf65512874a177ade75613dab9c9191fc', 'TSIT', 'TRON', 1650019500),
(43, 26, 'TSt3FJkqfWDmm57c81PWZDnNgsU2Bu6J4p', 'eea241eae5579555c46d89a6127581694dd8029f520eaf598d69378e6ff5a6b2', '41b97fea7ed14a7aef6e66a593659aba5296cb7caa', '0467b3480136ed726113632986ecfc3b0e7c2c442b9930d988788abf060c064cebabd3fcfdf0346db30140ff6308c181664f3078bb527cc5f175b694ba1366725f', 'TSIT', 'TRON', 1650023539),
(44, 27, 'TKfjproAyPT5YYXMGvdUyzZx5ufXtC48xe', '566c421f971c26572aae5623f9d767b1004d1c915084e53393daf5c5f609d464', '416a6380504fb01e019c98128ebf82d82f3ea63b2d', '04509a40090bf31e31a83bf8cb573522447b51804ab78fdfdcc1283a44ab7d8f5e3b49bbac44d2c8cbc7a4d2229cc9602a8c9503e082311379fdda39b26860359b', 'TSIT', 'TRON', 1650052244),
(45, 28, 'TUvJ58gjUkM2sbGbHFmxqy7grhv4t5ywpp', 'a4d5b20d1bae7effeaa088365fd9b0ad27ca53ac69bf01bfee0329a8d41c7129', '41cfdd5fdafea2362d60242ab5e2d4cfc0ac4d98fb', '0493aa7f1c0810a69365487ee32c690213eab72d47df53a8fb80d67de8f32280353b8468ac106b771d5499be2bf54b50e7e4523255b45cf32b2ab166b7da5ddddf', 'TSIT', 'TRON', 1650139889),
(46, 29, 'TTWxfUJzvyqk7FRfDDhfzaaCUPu1pNbEZH', '9b2417c3e9318f677bc0f1c35f8aea689a64e92d5c75000e0f4bb5f7ee02b932', '41c07b7b076b40f369ea0be5c9e9cc9bd79015e4e9', '04153ebe63fe086c0706ae69c1c80e80113fdaf7d5131b4ccd35e04377ff0ae782e6c897d881258488dc8142b216f1e149a017e268a5b667f4c01bf9c80be914fd', 'TSIT', 'TRON', 1650191891),
(47, 30, 'TXPNqeSPPQvBp9DGqxNzi6PsoC6GQVhTCb', '5a0e9f2d12bba536f6b2784e8a943cde21c5c3a20f8f197cf7f5f610426f0c80', '41eaecd62ebd0a0e1c9e33c2ff5dd0f8934736d832', '04e788910b8bce83376e5e6f1cc4c95539dcf332943c25af08a914abbce5a1fb42841da7af5218509a9e459d287b39a8f99b3ae5faec825a91fd1d09d88037b660', 'TSIT', 'TRON', 1650276144),
(48, 31, 'TWCLjAtHxFBTWLKhnne8yy47xPmhkwUEEr', 'd1dc38402141077eb3c0a5b2212e05ada0780b7b3602bc898ac7c2398492e696', '41ddde5f6163eb069d8adc75a7c61cb785e58c8500', '047323b061a177645764a15ce27c5c1ebcc8cc940a4ebcc812ec0d14bbc2466b74730a45c4d76d698b0887aea554ad791e6ccd2b1ba62f7d5479fe2c34e0cd704a', 'TSIT', 'TRON', 1650278191),
(49, 32, 'TBr2gdDayLLzmiKL11HgiCBZxzjc7TNk6R', 'c15fff8610e904ba03a5f8d3a089074513c4b44235d8f915dc3d2475ebc18edf', '411494ba196316362c9645aada878598d669b678c7', '04028281de13ccc61119c19b1e5d00674603dc4d89f2c2d4638a6baf4b6047cd18a57457e074c0797168a8971e39a01cfaa6d4cfb11af2fd9be59c1ec689150ff3', 'TSIT', 'TRON', 1650368596),
(50, 33, 'TTWFt1mfrUaBqR6ePHfQxMWrT7H2A773Uu', 'e771519717edcda0ae2debda3797b9c63399f7932fb22a4490831fdaf619383c', '41c0596f9f0c952e4475caf062381228aab3eb3549', '04c2929c94af3794a8c1beab2a02442bbd49bb3c94c74a64069ada36999d65b4f5048a36a759cbc4ad27b349cd7d9c49a793499b799a3477a4c3a28431283a496f', 'TSIT', 'TRON', 1650393639),
(51, 34, 'TWp6nc1w8BYB23gTJ7w4PPzdimLQ3Fzap2', '3650d3487e47200a4711c74df2a9d3c8a0bffb4bb16fe1b55f3aa43a8be4adf0', '41e4a1b5c2f74421d9b0c5c64babea829903e81ed8', '04b726e659ce24930b2081b2f3f34cae6182623e7ea5a57e0cf8967f6bbb4f7fa3c0945d19281c0e12ef6f69018864e111509effb6b9b990747170f96ffe3335b0', 'TSIT', 'TRON', 1650437435),
(52, 35, 'TBjnii3DnrNLu3yZy3oAbHjCZxq9gXMj8P', '992c4068c70cb0a06d36d8a8dfec84fe62a33a4f14f522c1225dfd5c1636631a', '4113669315a171f782aead3eec7251806495668311', '0413c658aba895211c12f217d64233d848fc8acdd3b09926b12282941d849ed0b9329abb14fae11a6f8ff34a1547603ff285e1aa68bfa90b424bc7704f247cd283', 'TSIT', 'TRON', 1650456329),
(53, 36, 'TXjUAWCi8EsRMFMDoSWQhbD79Fyd5jWZap', '13ff8df38d2be1dabf3f0ed7fb91d62827ced16eae75ea91266ba4239dad1ed4', '41eeb999e0e3b34a966d86ecb3c254184f7547f5ec', '0418f539a0366c02e3fe25e7319aecf6dd7722cdf3344cd4fb80a3d28071d0b26b67ef3d158c16b0efa9bfb827c68893c42c8390242a194f5620a63ac1d9f2a463', 'TSIT', 'TRON', 1650467976),
(54, 37, 'TGYvNf5WbTYvi95vV8h2DexzF2e6rXMEN9', '9ad2411ef71e96fd6db7c0e19fe818414646847a205f1f63d84fadbe224465dc', '414831047253d3b4de77720a02b9e5dd5fdba53d65', '04806f2a5470695053b33394950f4aa682c2269c7cf905097d1c3b7b09b7058bc0af22d75ee15d26c3ce228a3e3eb6c794bf624458342072fe8c42ca726f0b2a66', 'TSIT', 'TRON', 1650469435),
(55, 38, 'TK5z2QB5NAAFYiqVqq1E8njTTS7TL4TbGb', 'ee49b70a8a38e6bf780a09374117cac278bf952ea76ce3b72139d587afcf3411', '4164013613b8e57e286c47b42df096219b1e194966', '04ad79ddfa0b41919bac8d7c089a6e42392b8cbe18fd98a23e5cc424a6a5527de5694b6ed4412cba9a9c75602894f2772ab1dd08b0bac91af5cdb37798e281562b', 'TSIT', 'TRON', 1650482826),
(56, 39, 'TKzVExCoAEnxZR1oihpcc5RWd4xryBk61Z', '96727f174b7886b65220db486f0387bdb8864d74281df5102957d9a392d59fe0', '416def3ad9ffc489bcee09092ebb528d8b46e22662', '042f71c101db9778d337f359f43c6c864ff1998eb861516c72d5b437166c1b391bf6d42ccc02d955352f90c76eccd399c97eccbd708b4d5c8c8f54a5a23c4d3a76', 'TSIT', 'TRON', 1650501897),
(57, 40, 'TVqEXNY6U5nQsC4xyfcGjcrQauZZqU429P', '013dc69ef1bd833e9f637a9047472bf40ad1fbe8af045d97629c57b4103ace48', '41d9e07582275798929616ff37f2083e2b4ea9156a', '0450aba0d263b4baef0d7e34347811afae92a99e41037330aad9712971fe5d6c036f38c39df858304480e9ecdc9ee32064f9f48b5db74a7efeca7e75b0d1310595', 'TSIT', 'TRON', 1650523008),
(58, 41, 'TRdd3ZmayxaKPaWMnw1pZPWo6HjXaNapLJ', 'e52ce100974a423985e05c374e47371f4eaa6a1f200966074bd2cd890b8beae3', '41abcdc3799e1dc07e9900d5454ccfaee3edb10760', '04fc50748f18845bfec8b7e7149ee080a3af084c7d3221efca976bef070a36e6cc4b24da748cd251d3ce43db2da79dfcb386d664d18f1ecedad2a425eeae6f52c1', 'TSIT', 'TRON', 1650540872),
(59, 42, 'TXY5EVhnkUi4G53kLnAYf2Ugqrw3tXonYx', '9154a4e1c38e3efa9bf152d3ee28f54ec0719c726e9b2109593dc9ef6868742f', '41ec91e22e6ac8219a312187cb68b35e82bd852e0d', '04139f6ec526feee1e94988fd1157ca5982f5721ea1dab66592895f14b71c6241b7e3b8f91a09e1909857def0b002282c94729aafc712994b93169d5fbc4aca747', 'TSIT', 'TRON', 1650576710),
(60, 43, 'TDSmqvK7e3WneRyp53wL54uZ5UXe2DdEdP', 'bfa8a6c05ff1b12ad592af62258145d50c33ee6100c353c7acd50bf21813bb9d', '41261f0617c7e6a05d79b273147305c7e0eff52500', '04b366b15b68a466c2d613b995a448485d2678a351efaa2d64e84842aea1106a2920e4a08224e8ee71bb3a919ac5b6166ee9ecd788a2e408a913ed0dbde597c804', 'TSIT', 'TRON', 1650643551),
(61, 44, 'TGXHJXrgiXGJAuQGedXgS466w8Ho13fMa3', '65a6220125e36ae2352b1fa83cbed67d4c977b245970f330efe0dcbeffc910c1', '4147e1a7efba94b20877e772fc3fde03c82b81fb09', '04386044a713fa90de1b16e81c631d2bc3848579608603299d57a2699572045c51e1bfc690fa9ce256f1129cb3e65167a8e91299d0247edf468952ec6ef6b262db', 'TSIT', 'TRON', 1650703407),
(62, 45, 'TVRZVrBxWWP3StdT1Szu5XzauVsykubPDm', '75adeb688464903503de6b773963870f2f95eb1bb7ec7d5a43f70a521d5e41b5', '41d566507d59daa981e6fec73deff713414cd886e7', '046bd608d0c730feb55d1a7899164e558dca047aa92e87dbc4c0e3b0938cd4cf6838c154f9865cf8fa5a9e3b0703fa4113a00085780bf1efe4cefa7abf48532a5b', 'TSIT', 'TRON', 1650868062),
(63, 46, 'TA9krU1tVrKX4xcFyi1X6kgv3f4Mmz7NGC', '61c59be2455744aac102e7d1b99c101fd818cea87ef2e65957413b46d42ff0a7', '4101febf8a881e64241edc517613f7d48289634840', '044c503c7f3f3fdedb73c28cb7b4a488f0c5a0ecf79817c87755bde48d2648e4ac8e1da4b668718978049be82975b83b5f802c0dd8a133e12e41b1996762112f2f', 'TSIT', 'TRON', 1650913140),
(64, 47, 'TXPGjJpzEqgRhx6X961M5rC5arWRE34bqM', '6c073d960559f3918a12735539a86eb860047a97a5c02725105c2a41faa7f6d7', '41eae7bca453c38f78920aa6fe2735ca2da14a081d', '04348c46f11c66ad8f7c863eb3d0aa98e82fb42c2c3c6cc8fec2fc5d323ef1407447d977ef23cf2bcb7eac5e46e38e60cc60b1a002394ab585ceb067b0f70cb3cd', 'TSIT', 'TRON', 1651570078),
(65, 48, 'TBdcCSmb3SaTrnHERDURfhf6vfUdvWxwzu', 'ddd6436eaef2c01fa59d940c90107bede744f9ed18371a8fd6b185395c183dbe', '41123b4baeef4350626cc951ce98c48f5179889e42', '048d4be825bc8bc289740c27695dde633f9a908cabb105b7c8b7eb66f12aa39c4a90106741e9b3673a54133e86137a236b3846449a7dea9aebdca60e42b47d6d3a', 'TSIT', 'TRON', 1651677357),
(66, 49, 'TRfB4mBDSgg7SjV6Q6FszYrfALoZbsS1ya', 'fa18602d91dbc0d58102ce9f15ef2d10b73d380c2a58084bc2d8d6584a896eb5', '41ac18e8b5262f67a75f0b8a7de560f86d4615a1fe', '042b70fa6a5a2bccf31c761ac2db0695ef09eaaa21a700ec1e926868ca91529fba2f82ca3daaa83a1232badf86ef66cd24e717a6763f34606059c65d41727c5fd7', 'TSIT', 'TRON', 1651743056),
(67, 50, 'TJ3eMqXdiXi2PVidK2kL5vsDQFQ9ewyc2t', 'bd9cc9fc481018198b4aff9a0e942a4fd1eb05d8ca62f60f5d4baca7ba1b83d8', '415897d68ef0d6cf600b81a30b1a407d10284674da', '04085df41d554596f7b9dcda09bef434e568dbfad70dbbb4e1d00a1d17655fd3491277bf025fa81f5d86e3b469dd7005b08f1d09e22931b71c40ea9bb166054d2f', 'TSIT', 'TRON', 1651767084),
(68, 51, 'TJHKn4hX11Xak2T4baWJZBtYBrtiZWTfQ7', '9aa6be38764c4159066849cd311355c78ba26fc2246906c899c9c349d92a1fe2', '415b2e265db99d97cbf568be1c8781bc7a20f1949a', '04a340dc600a5c17d34b11a48a4b17e26c3baac0884a11585e9772a163e293a85ac35974e126e5d605f920bc0e0bbe0b9b6780684d4eedd41b9eb747a6e7fca849', 'TSIT', 'TRON', 1652365440),
(69, 52, 'TFUBpzLyqy7nk5iEjHESRUip3yoUKT43oQ', '01361666e4c8d46218cbd9f6eb0b84b475ba0c847c23a9f76303bd1917ee1420', '413c53b64e15ae501d3b5f44fbd3b6b31081ff3fda', '04ee4a33ca47b97c13e2363c23191bbcb6410341a2d4f8a96541d3e50959c696a7027878dec941af0b4e133f50e49d0565670b30459d28327a335b5a5629d511f5', 'TSIT', 'TRON', 1652694944),
(70, 53, 'TBvznGtxiEQsdS3JZzQF8Km7Ym51VVjEVp', '3c66a48d5e9b1c07b2176abb244c2c0f04835cfd06723a602b998a07e2b617a7', '41158537f331aa1e9114b54c6db70038d7b58283b2', '0457ebd5d9b836e28a02b7ddc52c23993563dd24b5b64a6bc4f1900d7e5ee484c4966518869c29d45d891bf232e34a762052acc095a47de4cc6690992def5e0f05', 'TSIT', 'TRON', 1652695728),
(71, 54, 'TGJCZ31SVSFzr4mK62MnUevfTaS5L3QNmh', '5313aa36e18dcbcdddfe97c5b34393a55e8774314fd9a474436da42115020d67', '414568488f3c402227095e1536d6f6efa9fbb4221e', '04ab39fc97f916b421027e69b0f06483279058aa093d2dd7508541305b3796ef945304d2177c6aa513fe41107ea9273e47d3a8045983476a478cf7c924a6663441', 'TSIT', 'TRON', 1652701961);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `buy_requests`
--
ALTER TABLE `buy_requests`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `dashboard_news`
--
ALTER TABLE `dashboard_news`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `forgot_password_otp`
--
ALTER TABLE `forgot_password_otp`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `mining_reward`
--
ALTER TABLE `mining_reward`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `pos`
--
ALTER TABLE `pos`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `reports`
--
ALTER TABLE `reports`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `report_tokens`
--
ALTER TABLE `report_tokens`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `scams`
--
ALTER TABLE `scams`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `top_miner`
--
ALTER TABLE `top_miner`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `transactions`
--
ALTER TABLE `transactions`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `transaction_status`
--
ALTER TABLE `transaction_status`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `transaction_type`
--
ALTER TABLE `transaction_type`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `twenty_four_hour_scan`
--
ALTER TABLE `twenty_four_hour_scan`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `user_roles`
--
ALTER TABLE `user_roles`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `votes`
--
ALTER TABLE `votes`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `wallets`
--
ALTER TABLE `wallets`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `buy_requests`
--
ALTER TABLE `buy_requests`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=37;

--
-- AUTO_INCREMENT for table `dashboard_news`
--
ALTER TABLE `dashboard_news`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=84;

--
-- AUTO_INCREMENT for table `forgot_password_otp`
--
ALTER TABLE `forgot_password_otp`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `mining_reward`
--
ALTER TABLE `mining_reward`
  MODIFY `id` int(56) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `pos`
--
ALTER TABLE `pos`
  MODIFY `id` int(50) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `reports`
--
ALTER TABLE `reports`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `report_tokens`
--
ALTER TABLE `report_tokens`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `scams`
--
ALTER TABLE `scams`
  MODIFY `id` int(56) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `top_miner`
--
ALTER TABLE `top_miner`
  MODIFY `id` int(56) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `transactions`
--
ALTER TABLE `transactions`
  MODIFY `id` int(50) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=1441;

--
-- AUTO_INCREMENT for table `transaction_status`
--
ALTER TABLE `transaction_status`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `transaction_type`
--
ALTER TABLE `transaction_type`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT for table `twenty_four_hour_scan`
--
ALTER TABLE `twenty_four_hour_scan`
  MODIFY `id` int(56) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=55;

--
-- AUTO_INCREMENT for table `user_roles`
--
ALTER TABLE `user_roles`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `votes`
--
ALTER TABLE `votes`
  MODIFY `id` int(50) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `wallets`
--
ALTER TABLE `wallets`
  MODIFY `id` int(50) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=72;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
