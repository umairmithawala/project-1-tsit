-- phpMyAdmin SQL Dump
-- version 5.1.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Apr 06, 2022 at 08:17 PM
-- Server version: 10.4.18-MariaDB
-- PHP Version: 8.0.3

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
  `is_tsit_transfered` int(11) DEFAULT 0,
  `transfer_timestamp` int(11) DEFAULT NULL,
  `transfer_transaction_id` varchar(100) DEFAULT NULL,
  `more_then_ten_min_mark` int(11) NOT NULL DEFAULT 0,
  `is_rejected` int(11) NOT NULL DEFAULT 0,
  `err_reason_one` varchar(100) DEFAULT NULL,
  `err_reason_two` varchar(100) DEFAULT NULL,
  `err_reason_three` varchar(100) DEFAULT NULL,
  `transaction_table_id` int(11) DEFAULT 0,
  `is_approved` int(11) DEFAULT 0,
  `request_timestamp` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `buy_requests`
--

INSERT INTO `buy_requests` (`id`, `user_id`, `tsit_coin_price`, `amount_of_tsit_purchased`, `currency`, `amount_in_currency`, `amount_in_dollar_on_submit`, `transaction_id`, `sending_wallet_address`, `is_tsit_transfered`, `transfer_timestamp`, `transfer_transaction_id`, `more_then_ten_min_mark`, `is_rejected`, `err_reason_one`, `err_reason_two`, `err_reason_three`, `transaction_table_id`, `is_approved`, `request_timestamp`) VALUES
(1, 2, 1, 100, 'usdt', 0, 100, '9c909cf49989856f4d1e037be4ded7fc5c122fc496ce01db4cd018622c1b75b1', 'TFUf8QhwYoBWyZNZepFVUetn2kPgfCkTpd', 0, NULL, NULL, 0, 0, NULL, NULL, NULL, 0, 0, 1649250728),
(2, 2, 0.000001, 100000000000, 'bnb', 236.110783, 100000, '5b764caef47fd13cfaa4004602768022d0fe2e7594f8bd70715c41c88312fa54', 'TYg44cE1NaRGEP7JQX9JiuGk2mMLVWkXxU', 0, NULL, NULL, 0, 0, NULL, NULL, NULL, 0, 0, 1649267462),
(3, 2, 0.000001, 5000000000, 'bnb', 11.795235, 5000, '7c909cf49989856f4d1e037be4ded7fc5c122fc496ce01db4cd018622c1b75b1', 'TFUf8QhwYoBWyZNZepFVUetn2kPgfCkTpd', 0, NULL, NULL, 0, 0, NULL, NULL, NULL, 0, 0, 1649267556);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `buy_requests`
--
ALTER TABLE `buy_requests`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `buy_requests`
--
ALTER TABLE `buy_requests`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
