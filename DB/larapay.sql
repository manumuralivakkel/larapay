-- phpMyAdmin SQL Dump
-- version 4.5.1
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: Jan 22, 2017 at 10:32 PM
-- Server version: 10.1.13-MariaDB
-- PHP Version: 5.6.21

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `larapay`
--

-- --------------------------------------------------------

--
-- Table structure for table `lpay_mmv_account`
--

CREATE TABLE `lpay_mmv_account` (
  `account_id` int(100) NOT NULL,
  `member_id` int(100) NOT NULL,
  `bank_name` varchar(200) NOT NULL,
  `ac_no` varchar(100) NOT NULL,
  `benef_name` varchar(200) NOT NULL,
  `balance` double NOT NULL,
  `created_at` date NOT NULL,
  `updated_at` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `lpay_mmv_account`
--

INSERT INTO `lpay_mmv_account` (`account_id`, `member_id`, `bank_name`, `ac_no`, `benef_name`, `balance`, `created_at`, `updated_at`) VALUES
(1, 1, 'NBK Kuwait', '68975632412565', 'Mohammed S', 100007, '2017-01-19', '2017-01-20'),
(2, 1, 'KFH Kuwait', '78956324879', 'Mohammed Salman', 50000, '2017-01-19', '2017-01-19'),
(3, 1, 'CBK Kuwait', '8585526324879', 'Mohammed Salman', 25001, '2017-01-19', '2017-01-19'),
(5, 1, 'Ahli United', '985632475800', 'Manu Murali', 2350.5, '2017-01-20', '2017-01-20'),
(6, 2, 'NBK Kuwait', '56897555632412565', 'Sathar', 100000, '2017-01-19', '2017-01-20'),
(7, 2, 'KFH Kuwait', '47895644324879', 'Sathar', 50000, '2017-01-19', '2017-01-19'),
(8, 2, 'CBK Kuwait', '2858552633224879', 'Sathar', 25000, '2017-01-19', '2017-01-19'),
(9, 2, 'Ahli United', '298563242275800', 'Fathima', 2000, '2017-01-20', '2017-01-20'),
(17, 3, 'NBK', '676365988552', 'Jon Joseph', 48500, '2017-01-22', '2017-01-22'),
(18, 5, 'NBK', '123456789', 'Monu ', 14700, '2017-01-22', '2017-01-22');

-- --------------------------------------------------------

--
-- Table structure for table `lpay_mmv_deposit`
--

CREATE TABLE `lpay_mmv_deposit` (
  `deposit_id` int(100) NOT NULL,
  `member_id` int(100) NOT NULL,
  `account_id` int(100) NOT NULL,
  `amount` double NOT NULL,
  `created_at` datetime NOT NULL,
  `updated_at` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `lpay_mmv_deposit`
--

INSERT INTO `lpay_mmv_deposit` (`deposit_id`, `member_id`, `account_id`, `amount`, `created_at`, `updated_at`) VALUES
(1, 1, 1, 100, '2017-01-20 12:03:35', '2017-01-20 12:03:35'),
(2, 1, 2, 100, '2017-01-20 12:17:05', '2017-01-20 12:17:05'),
(7, 1, 5, 500, '2017-01-20 13:21:48', '2017-01-20 13:21:48'),
(8, 1, 5, 150.5, '2017-01-20 13:23:19', '2017-01-20 13:23:19'),
(9, 1, 2, 45, '2017-01-20 17:25:52', '2017-01-20 17:25:52'),
(19, 3, 17, 1000, '2017-01-22 20:51:25', '2017-01-22 20:51:25'),
(20, 3, 17, 1000, '2017-01-22 20:51:35', '2017-01-22 20:51:35'),
(21, 5, 18, 500, '2017-01-22 21:17:31', '2017-01-22 21:17:31');

-- --------------------------------------------------------

--
-- Table structure for table `lpay_mmv_member_master`
--

CREATE TABLE `lpay_mmv_member_master` (
  `member_id` int(100) NOT NULL,
  `first_name` varchar(500) CHARACTER SET latin1 NOT NULL,
  `last_name` varchar(500) CHARACTER SET latin1 NOT NULL,
  `wallet` double NOT NULL,
  `email` varchar(500) CHARACTER SET latin1 NOT NULL,
  `password` text CHARACTER SET latin1 NOT NULL,
  `remember_token` text NOT NULL,
  `created_at` date NOT NULL,
  `updated_at` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `lpay_mmv_member_master`
--

INSERT INTO `lpay_mmv_member_master` (`member_id`, `first_name`, `last_name`, `wallet`, `email`, `password`, `remember_token`, `created_at`, `updated_at`) VALUES
(1, 'Manu', 'Murali', 100, 'manu@mail.com', '$2y$10$RJ50rZNlroiWHi2hYiAImeASuWfa62kI/PWVOg7WRKmHdFYz5f12G', 'QJyIoTFRWMdaYt4bYkUP7zey7ZtHFpvQSfDq8HgYISAYzBtYpqHMSzDkKk7t', '2017-01-22', '2017-01-22'),
(2, 'Suchithra', 'C', 0, 'such@mail.com', '$2y$10$R9.cxaRnwow78KK65a8czeAivz4w6.StguA3e49AQKufxfWQLwf0W', '', '2017-01-22', '2017-01-22'),
(3, 'Jon', 'J', 1000, 'jon@mail.com', '$2y$10$WZwljY.vKk0FSOsUWYL5fuakEAX3tomesCuGfkqeJ4JocQzdd6l5e', 'zzzSixMdsu5zvg55TJNZ8CEYazqAo8pv6ERQOtXxmKOo86blbDKr1B6P7nbK', '2017-01-22', '2017-01-22'),
(4, 'july', 'j', 500, 'july@mail.com', '$2y$10$HDUCm7QnDkZOWpbcMSkZdufAdoUhx55Xl4yztALxWCgFGBhNNR0IO', 'CniyQop33dWUfYKbb2JIH8v250QwvrlXLQqM6k1MshBTGx5xVxLG7NWHqx4e', '2017-01-22', '2017-01-22'),
(5, 'Monu', 'Murali', 200, 'monu@mail.com', '$2y$10$w3z6uwNmG7WIxe1g7PmoH.m45Qjd1NbMnxIDxRfDhDnrcU/Ookoi6', '6RNg2XVnGpU4gXdNd0HOmEFPXOXf7KOTmZef02fkA9DNg2gx9alPZINarQJE', '2017-01-22', '2017-01-22');

-- --------------------------------------------------------

--
-- Table structure for table `lpay_mmv_member_profile`
--

CREATE TABLE `lpay_mmv_member_profile` (
  `profile_id` int(100) NOT NULL,
  `member_id` int(100) NOT NULL,
  `phone` varchar(20) NOT NULL,
  `dob` date NOT NULL,
  `address` text NOT NULL,
  `country` varchar(200) NOT NULL,
  `mobile` varchar(20) NOT NULL,
  `created_at` date NOT NULL,
  `updated_at` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `lpay_mmv_member_profile`
--

INSERT INTO `lpay_mmv_member_profile` (`profile_id`, `member_id`, `phone`, `dob`, `address`, `country`, `mobile`, `created_at`, `updated_at`) VALUES
(1, 1, '22222222333', '1987-10-17', 'block 12,\r\nSalmiya,\r\nKuwait\r\n', 'Kuwait', '67638794', '2017-01-19', '2017-01-21'),
(2, 2, '22334455', '1988-10-11', 'Mangaf,Kuwait', 'Kuwait', '67638795', '2017-01-19', '2017-01-19'),
(7, 5, '11111111', '1990-01-09', 'Kerala,\r\nIndia', 'India', '11111111', '2017-01-22', '2017-01-22');

-- --------------------------------------------------------

--
-- Table structure for table `lpay_mmv_transaction`
--

CREATE TABLE `lpay_mmv_transaction` (
  `transaction_id` int(100) NOT NULL,
  `to_member` int(100) NOT NULL,
  `member_id` int(100) NOT NULL,
  `amount` double NOT NULL,
  `created_at` date NOT NULL,
  `updated_at` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `lpay_mmv_transaction`
--

INSERT INTO `lpay_mmv_transaction` (`transaction_id`, `to_member`, `member_id`, `amount`, `created_at`, `updated_at`) VALUES
(1, 2, 1, 5, '2017-01-20', '2017-01-20 20:18:50'),
(2, 2, 1, 1, '2017-01-20', '2017-01-20 20:20:54'),
(5, 2, 1, 0.5, '2017-01-20', '2017-01-20 20:28:37'),
(6, 2, 10, 5, '2017-01-22', '2017-01-22 17:03:19'),
(9, 4, 3, 500, '2017-01-22', '2017-01-22 20:52:05'),
(10, 1, 5, 100, '2017-01-22', '2017-01-22 21:18:17');

-- --------------------------------------------------------

--
-- Table structure for table `lpay_mmv_withdraw`
--

CREATE TABLE `lpay_mmv_withdraw` (
  `withdraw_id` int(100) NOT NULL,
  `member_id` int(100) NOT NULL,
  `account_id` int(100) NOT NULL,
  `amount` double NOT NULL,
  `created_at` date NOT NULL,
  `updated_at` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `lpay_mmv_withdraw`
--

INSERT INTO `lpay_mmv_withdraw` (`withdraw_id`, `member_id`, `account_id`, `amount`, `created_at`, `updated_at`) VALUES
(1, 1, 2, 45, '2017-01-20', '2017-01-20 19:29:37'),
(2, 1, 1, 1, '2017-01-20', '2017-01-20 19:30:14'),
(3, 1, 3, 1, '2017-01-20', '2017-01-20 19:30:20'),
(4, 1, 5, 1, '2017-01-20', '2017-01-20 19:30:28'),
(5, 1, 1, 5, '2017-01-21', '2017-01-21 16:24:03'),
(9, 3, 17, 500, '2017-01-22', '2017-01-22 20:51:42'),
(10, 5, 18, 200, '2017-01-22', '2017-01-22 21:17:43');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `lpay_mmv_account`
--
ALTER TABLE `lpay_mmv_account`
  ADD PRIMARY KEY (`account_id`),
  ADD UNIQUE KEY `account_id` (`account_id`);

--
-- Indexes for table `lpay_mmv_deposit`
--
ALTER TABLE `lpay_mmv_deposit`
  ADD PRIMARY KEY (`deposit_id`),
  ADD UNIQUE KEY `deposit_id` (`deposit_id`);

--
-- Indexes for table `lpay_mmv_member_master`
--
ALTER TABLE `lpay_mmv_member_master`
  ADD PRIMARY KEY (`member_id`),
  ADD UNIQUE KEY `member_id` (`member_id`);

--
-- Indexes for table `lpay_mmv_member_profile`
--
ALTER TABLE `lpay_mmv_member_profile`
  ADD PRIMARY KEY (`profile_id`),
  ADD UNIQUE KEY `profile_id` (`profile_id`);

--
-- Indexes for table `lpay_mmv_transaction`
--
ALTER TABLE `lpay_mmv_transaction`
  ADD PRIMARY KEY (`transaction_id`),
  ADD UNIQUE KEY `transaction_id` (`transaction_id`);

--
-- Indexes for table `lpay_mmv_withdraw`
--
ALTER TABLE `lpay_mmv_withdraw`
  ADD PRIMARY KEY (`withdraw_id`),
  ADD UNIQUE KEY `withdraw_id` (`withdraw_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `lpay_mmv_account`
--
ALTER TABLE `lpay_mmv_account`
  MODIFY `account_id` int(100) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=20;
--
-- AUTO_INCREMENT for table `lpay_mmv_deposit`
--
ALTER TABLE `lpay_mmv_deposit`
  MODIFY `deposit_id` int(100) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=22;
--
-- AUTO_INCREMENT for table `lpay_mmv_member_master`
--
ALTER TABLE `lpay_mmv_member_master`
  MODIFY `member_id` int(100) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;
--
-- AUTO_INCREMENT for table `lpay_mmv_member_profile`
--
ALTER TABLE `lpay_mmv_member_profile`
  MODIFY `profile_id` int(100) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;
--
-- AUTO_INCREMENT for table `lpay_mmv_transaction`
--
ALTER TABLE `lpay_mmv_transaction`
  MODIFY `transaction_id` int(100) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;
--
-- AUTO_INCREMENT for table `lpay_mmv_withdraw`
--
ALTER TABLE `lpay_mmv_withdraw`
  MODIFY `withdraw_id` int(100) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
