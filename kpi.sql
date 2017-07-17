-- phpMyAdmin SQL Dump
-- version 4.4.10
-- http://www.phpmyadmin.net
--
-- Host: localhost:3306
-- Generation Time: Jul 18, 2017 at 12:00 AM
-- Server version: 5.5.42
-- PHP Version: 5.6.10

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";

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
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

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
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `criteria`
--

INSERT INTO `criteria` (`id`, `employee_id`, `criteria`, `approver_id`, `progress`, `status`, `color`) VALUES
(1, 1, 'test', 1, 30, 'You can Do it', 'col-yellow'),
(2, 2, 'test', 1, 70, 'You can Do it', 'col-red'),
(3, 2, 'test2', 1, 0, 'You can Do it', 'col-green');

-- --------------------------------------------------------

--
-- Table structure for table `in_house_train`
--

CREATE TABLE `in_house_train` (
  `in_house_train_id` int(6) NOT NULL,
  `in_house_train_name` varchar(200) DEFAULT NULL,
  `employee_id` int(4) DEFAULT NULL,
  `in_house_train_day` date DEFAULT NULL
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8;

--
-- Dumping data for table `in_house_train`
--

INSERT INTO `in_house_train` (`in_house_train_id`, `in_house_train_name`, `employee_id`, `in_house_train_day`) VALUES
(1, 'PHP', 2, '2017-07-13'),
(2, 'HTML5', 2, '2017-07-20');

-- --------------------------------------------------------

--
-- Table structure for table `promote`
--

CREATE TABLE `promote` (
  `promote_id` int(4) NOT NULL,
  `employee_id` int(6) DEFAULT NULL,
  `position` varchar(50) DEFAULT NULL,
  `status` enum('not','yes') DEFAULT NULL,
  `datetime` timestamp NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8;

--
-- Dumping data for table `promote`
--

INSERT INTO `promote` (`promote_id`, `employee_id`, `position`, `status`, `datetime`) VALUES
(2, 2, 'Develop', 'not', '2017-07-13 10:20:59');

-- --------------------------------------------------------

--
-- Table structure for table `train_course`
--

CREATE TABLE `train_course` (
  `train_course_id` int(6) NOT NULL,
  `train_course_name` varchar(200) DEFAULT NULL,
  `employee_id` int(4) DEFAULT NULL,
  `train_course_cost` int(4) DEFAULT NULL,
  `train_course_day` date DEFAULT NULL
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8;

--
-- Dumping data for table `train_course`
--

INSERT INTO `train_course` (`train_course_id`, `train_course_name`, `employee_id`, `train_course_cost`, `train_course_day`) VALUES
(1, 'IOS', 2, 3000, '2017-07-13'),
(2, 'Android', 2, 1000, '2017-08-02');

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
-- Indexes for table `in_house_train`
--
ALTER TABLE `in_house_train`
  ADD PRIMARY KEY (`in_house_train_id`);

--
-- Indexes for table `promote`
--
ALTER TABLE `promote`
  ADD PRIMARY KEY (`promote_id`);

--
-- Indexes for table `train_course`
--
ALTER TABLE `train_course`
  ADD PRIMARY KEY (`train_course_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `account`
--
ALTER TABLE `account`
  MODIFY `employee_id` smallint(6) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=3;
--
-- AUTO_INCREMENT for table `criteria`
--
ALTER TABLE `criteria`
  MODIFY `id` mediumint(9) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=4;
--
-- AUTO_INCREMENT for table `in_house_train`
--
ALTER TABLE `in_house_train`
  MODIFY `in_house_train_id` int(6) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=3;
--
-- AUTO_INCREMENT for table `promote`
--
ALTER TABLE `promote`
  MODIFY `promote_id` int(4) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=3;
--
-- AUTO_INCREMENT for table `train_course`
--
ALTER TABLE `train_course`
  MODIFY `train_course_id` int(6) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=3;
