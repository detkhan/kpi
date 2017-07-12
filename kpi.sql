-- phpMyAdmin SQL Dump
-- version 4.6.6
-- https://www.phpmyadmin.net/
--
-- Host: localhost
-- Generation Time: Jul 12, 2017 at 11:57 PM
-- Server version: 5.7.17-log
-- PHP Version: 5.6.30

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `kpi`
--

-- --------------------------------------------------------

--
-- Table structure for table `account`
--

CREATE TABLE `account` (
  `employee_id` smallint(6) NOT NULL,
  `name` varchar(50) COLLATE utf8_unicode_ci NOT NULL,
  `username` varchar(30) COLLATE utf8_unicode_ci NOT NULL,
  `password` varchar(64) COLLATE utf8_unicode_ci NOT NULL,
  `status` enum('pass','deny') COLLATE utf8_unicode_ci NOT NULL,
  `date_login` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `account`
--

INSERT INTO `account` (`employee_id`, `name`, `username`, `password`, `status`, `date_login`) VALUES
(1, 'Jin (Project Manager)', 'supalerk@revoitmarketing.com', '011c945f30ce2cbafc452f39840f025693339c42', 'pass', '2017-07-12 09:38:52'),
(2, 'wat(programmer)', 'nawacenter@hotmail.com', 'c984aed014aec7623a54f0591da07a85fd4b762d', 'pass', '2017-07-12 09:38:52');

-- --------------------------------------------------------

--
-- Table structure for table `criteria`
--

CREATE TABLE `criteria` (
  `id` mediumint(9) NOT NULL,
  `employee_id` smallint(6) NOT NULL,
  `criteria` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `approver_id` smallint(6) NOT NULL,
  `progress` smallint(6) NOT NULL,
  `status` enum('You can Do it','Trying','Well Done') COLLATE utf8_unicode_ci NOT NULL,
  `color` varchar(20) COLLATE utf8_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `criteria`
--

INSERT INTO `criteria` (`id`, `employee_id`, `criteria`, `approver_id`, `progress`, `status`, `color`) VALUES
(1, 1, 'test', 1, 30, 'You can Do it', 'col-yellow'),
(2, 2, 'test', 1, 70, 'You can Do it', 'col-red');

-- --------------------------------------------------------

--
-- Table structure for table `promote`
--

CREATE TABLE `promote` (
  `promote_id` int(4) NOT NULL,
  `employee_id` int(6) DEFAULT NULL,
  `position` varchar(50) DEFAULT NULL,
  `status` varchar(20) DEFAULT '',
  `datetime` timestamp NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `promote`
--

INSERT INTO `promote` (`promote_id`, `employee_id`, `position`, `status`, `datetime`) VALUES
(1, 2, 'Manager', 'not', '2017-07-12 16:04:42');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `account`
--
ALTER TABLE `account`
  ADD PRIMARY KEY (`employee_id`);

--
-- Indexes for table `criteria`
--
ALTER TABLE `criteria`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `promote`
--
ALTER TABLE `promote`
  ADD PRIMARY KEY (`promote_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `account`
--
ALTER TABLE `account`
  MODIFY `employee_id` smallint(6) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
--
-- AUTO_INCREMENT for table `criteria`
--
ALTER TABLE `criteria`
  MODIFY `id` mediumint(9) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
--
-- AUTO_INCREMENT for table `promote`
--
ALTER TABLE `promote`
  MODIFY `promote_id` int(4) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
