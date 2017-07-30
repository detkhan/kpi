-- phpMyAdmin SQL Dump
-- version 4.4.10
-- http://www.phpmyadmin.net
--
-- Host: localhost:3306
-- Generation Time: Jul 30, 2017 at 08:49 PM
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
  `date_login` datetime NOT NULL,
  `position_id` int(3) DEFAULT NULL,
  `account_type` enum('admin','user') COLLATE utf8_unicode_ci DEFAULT NULL
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `account`
--

INSERT INTO `account` (`employee_id`, `name`, `username`, `password`, `status`, `date_login`, `position_id`, `account_type`) VALUES
(1, 'Jin', 'supalerk@revoitmarketing.com', '011c945f30ce2cbafc452f39840f025693339c42', 'pass', '2017-07-12 09:38:52', 4, 'admin'),
(2, 'Watchapon Detkhan', 'nawacenter@hotmail.com', 'c984aed014aec7623a54f0591da07a85fd4b762d', 'pass', '2017-07-12 09:38:52', 1, 'admin');

-- --------------------------------------------------------

--
-- Table structure for table `criteria`
--

CREATE TABLE `criteria` (
  `id` mediumint(9) NOT NULL,
  `employee_id` smallint(6) NOT NULL,
  `position_criteria_id` int(3) NOT NULL,
  `criteria_detail` text COLLATE utf8_unicode_ci,
  `approver_id` smallint(6) NOT NULL,
  `progress` smallint(6) NOT NULL,
  `status` enum('You can Do it','Trying','Well Done') COLLATE utf8_unicode_ci NOT NULL,
  `color` varchar(20) COLLATE utf8_unicode_ci NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=10 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `criteria`
--

INSERT INTO `criteria` (`id`, `employee_id`, `position_criteria_id`, `criteria_detail`, `approver_id`, `progress`, `status`, `color`) VALUES
(8, 2, 4, 'Knowledge of SQL Command, MySQL, SQL Server, Oracle', 1, 20, 'You can Do it', 'col-yellow'),
(9, 2, 5, 'Knowledge in Object Oriented technologies, Having Team player, Fast learner.', 1, 0, 'You can Do it', 'col-yellow');

-- --------------------------------------------------------

--
-- Table structure for table `in_house_train`
--

CREATE TABLE `in_house_train` (
  `in_house_train_id` int(6) NOT NULL,
  `in_house_train_name` varchar(200) CHARACTER SET utf8 DEFAULT NULL,
  `employee_id` int(4) DEFAULT NULL,
  `in_house_train_day` date DEFAULT NULL
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `in_house_train`
--

INSERT INTO `in_house_train` (`in_house_train_id`, `in_house_train_name`, `employee_id`, `in_house_train_day`) VALUES
(1, 'PHP', 2, '2017-07-13'),
(2, 'HTML5', 2, '2017-07-20');

-- --------------------------------------------------------

--
-- Table structure for table `position`
--

CREATE TABLE `position` (
  `position_id` int(3) NOT NULL,
  `position_name` varchar(100) COLLATE utf8_unicode_ci DEFAULT NULL
) ENGINE=InnoDB AUTO_INCREMENT=9 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `position`
--

INSERT INTO `position` (`position_id`, `position_name`) VALUES
(1, 'Jr.Developer'),
(2, 'Sr.Developer'),
(3, 'System analyst'),
(4, 'Project Manager'),
(5, 'Jr.graphic design'),
(6, 'Sr.graphic design'),
(7, 'Jr.UX design'),
(8, 'Sr.UX design');

-- --------------------------------------------------------

--
-- Table structure for table `position_criteria`
--

CREATE TABLE `position_criteria` (
  `position_criteria_id` int(3) NOT NULL,
  `position_id` int(3) DEFAULT NULL,
  `criteria_detail` text COLLATE utf8_unicode_ci,
  `approver_id` int(3) DEFAULT NULL
) ENGINE=InnoDB AUTO_INCREMENT=17 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `position_criteria`
--

INSERT INTO `position_criteria` (`position_criteria_id`, `position_id`, `criteria_detail`, `approver_id`) VALUES
(4, 2, 'Knowledge of SQL Command, MySQL, SQL Server, Oracle', 1),
(5, 2, 'Knowledge in Object Oriented technologies, Having Team player, Fast learner.', 1),
(6, 3, 'Knowledge about Software engineering (Spiral model, Agile model etc.). ', 1),
(7, 3, 'Knowledge about Web application development. ', 1),
(8, 3, 'Knowledge about Software quality check & control management. ', 1),
(9, 3, 'Design software program specification & Documentation. ', 1),
(10, 4, 'Ability to participate in multi task assignment', 1),
(11, 4, 'Ability to identify the application problems and solution for solving problem', 1),
(12, 4, 'Escalating issues and risks, understanding business impact and priorities', 1),
(15, 1, 'PHP HTML CSS MYSQL', 1),
(16, 1, 'test', 1);

-- --------------------------------------------------------

--
-- Table structure for table `position_promote`
--

CREATE TABLE `position_promote` (
  `position_promote_id` int(3) NOT NULL,
  `position_id` int(3) DEFAULT NULL,
  `position_id_out` int(3) DEFAULT NULL
) ENGINE=InnoDB AUTO_INCREMENT=10 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `position_promote`
--

INSERT INTO `position_promote` (`position_promote_id`, `position_id`, `position_id_out`) VALUES
(1, 1, 2),
(2, 1, 3),
(3, 1, 4),
(5, 2, 3),
(6, 2, 4),
(7, 3, 4),
(8, 5, 6),
(9, 7, 8);

-- --------------------------------------------------------

--
-- Table structure for table `promote`
--

CREATE TABLE `promote` (
  `promote_id` int(4) NOT NULL,
  `employee_id` int(6) DEFAULT NULL,
  `position_id` int(3) DEFAULT NULL,
  `status` enum('not','yes') CHARACTER SET utf8 DEFAULT NULL,
  `datetime` timestamp NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB AUTO_INCREMENT=7 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `promote`
--

INSERT INTO `promote` (`promote_id`, `employee_id`, `position_id`, `status`, `datetime`) VALUES
(6, 2, 2, 'not', '2017-07-24 04:22:32');

-- --------------------------------------------------------

--
-- Table structure for table `train_course`
--

CREATE TABLE `train_course` (
  `train_course_id` int(6) NOT NULL,
  `train_course_name` varchar(200) CHARACTER SET utf8 DEFAULT NULL,
  `employee_id` int(4) DEFAULT NULL,
  `train_course_cost` int(4) DEFAULT NULL,
  `train_course_day` date DEFAULT NULL
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

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
-- Indexes for table `position`
--
ALTER TABLE `position`
  ADD PRIMARY KEY (`position_id`);

--
-- Indexes for table `position_criteria`
--
ALTER TABLE `position_criteria`
  ADD PRIMARY KEY (`position_criteria_id`);

--
-- Indexes for table `position_promote`
--
ALTER TABLE `position_promote`
  ADD PRIMARY KEY (`position_promote_id`);

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
  MODIFY `id` mediumint(9) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=10;
--
-- AUTO_INCREMENT for table `in_house_train`
--
ALTER TABLE `in_house_train`
  MODIFY `in_house_train_id` int(6) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=3;
--
-- AUTO_INCREMENT for table `position`
--
ALTER TABLE `position`
  MODIFY `position_id` int(3) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=9;
--
-- AUTO_INCREMENT for table `position_criteria`
--
ALTER TABLE `position_criteria`
  MODIFY `position_criteria_id` int(3) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=17;
--
-- AUTO_INCREMENT for table `position_promote`
--
ALTER TABLE `position_promote`
  MODIFY `position_promote_id` int(3) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=10;
--
-- AUTO_INCREMENT for table `promote`
--
ALTER TABLE `promote`
  MODIFY `promote_id` int(4) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=7;
--
-- AUTO_INCREMENT for table `train_course`
--
ALTER TABLE `train_course`
  MODIFY `train_course_id` int(6) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=3;
